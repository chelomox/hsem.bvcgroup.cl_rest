<?php

namespace Base;

use \EFinalizacion as ChildEFinalizacion;
use \EFinalizacionQuery as ChildEFinalizacionQuery;
use \Inscripcion as ChildInscripcion;
use \InscripcionQuery as ChildInscripcionQuery;
use \TCalificacion as ChildTCalificacion;
use \TCalificacionQuery as ChildTCalificacionQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\EFinalizacionTableMap;
use Map\InscripcionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'e_finalizacion' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class EFinalizacion implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\EFinalizacionTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the efin_estado field.
     *
     * @var        int
     */
    protected $efin_estado;

    /**
     * The value for the efin_t_calificacion field.
     *
     * @var        int
     */
    protected $efin_t_calificacion;

    /**
     * The value for the efin_resultado field.
     *
     * @var        string
     */
    protected $efin_resultado;

    /**
     * The value for the efin_descripcion field.
     *
     * @var        string
     */
    protected $efin_descripcion;

    /**
     * The value for the efin_cota_inferior field.
     *
     * @var        int
     */
    protected $efin_cota_inferior;

    /**
     * The value for the efin_cota_superior field.
     *
     * @var        string
     */
    protected $efin_cota_superior;

    /**
     * The value for the efin_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $efin_r_fecha_creacion;

    /**
     * The value for the efin_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $efin_r_fecha_modificacion;

    /**
     * The value for the efin_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $efin_r_usuario;

    /**
     * @var        ChildTCalificacion
     */
    protected $aTCalificacion;

    /**
     * @var        ObjectCollection|ChildInscripcion[] Collection to store aggregation of ChildInscripcion objects.
     */
    protected $collInscripcions;
    protected $collInscripcionsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInscripcion[]
     */
    protected $inscripcionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->efin_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\EFinalizacion object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>EFinalizacion</code> instance.  If
     * <code>obj</code> is an instance of <code>EFinalizacion</code>, delegates to
     * <code>equals(EFinalizacion)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|EFinalizacion The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [efin_estado] column value.
     *
     * @return int
     */
    public function getEfinEstado()
    {
        return $this->efin_estado;
    }

    /**
     * Get the [efin_t_calificacion] column value.
     *
     * @return int
     */
    public function getEfinTCalificacion()
    {
        return $this->efin_t_calificacion;
    }

    /**
     * Get the [efin_resultado] column value.
     *
     * @return string
     */
    public function getEfinResultado()
    {
        return $this->efin_resultado;
    }

    /**
     * Get the [efin_descripcion] column value.
     *
     * @return string
     */
    public function getEfinDescripcion()
    {
        return $this->efin_descripcion;
    }

    /**
     * Get the [efin_cota_inferior] column value.
     *
     * @return int
     */
    public function getEfinCotaInferior()
    {
        return $this->efin_cota_inferior;
    }

    /**
     * Get the [efin_cota_superior] column value.
     *
     * @return string
     */
    public function getEfinCotaSuperior()
    {
        return $this->efin_cota_superior;
    }

    /**
     * Get the [optionally formatted] temporal [efin_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEfinRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->efin_r_fecha_creacion;
        } else {
            return $this->efin_r_fecha_creacion instanceof \DateTimeInterface ? $this->efin_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [efin_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEfinRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->efin_r_fecha_modificacion;
        } else {
            return $this->efin_r_fecha_modificacion instanceof \DateTimeInterface ? $this->efin_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [efin_r_usuario] column value.
     *
     * @return int
     */
    public function getEfinRUsuario()
    {
        return $this->efin_r_usuario;
    }

    /**
     * Set the value of [efin_estado] column.
     *
     * @param int $v new value
     * @return $this|\EFinalizacion The current object (for fluent API support)
     */
    public function setEfinEstado($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->efin_estado !== $v) {
            $this->efin_estado = $v;
            $this->modifiedColumns[EFinalizacionTableMap::COL_EFIN_ESTADO] = true;
        }

        return $this;
    } // setEfinEstado()

    /**
     * Set the value of [efin_t_calificacion] column.
     *
     * @param int $v new value
     * @return $this|\EFinalizacion The current object (for fluent API support)
     */
    public function setEfinTCalificacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->efin_t_calificacion !== $v) {
            $this->efin_t_calificacion = $v;
            $this->modifiedColumns[EFinalizacionTableMap::COL_EFIN_T_CALIFICACION] = true;
        }

        if ($this->aTCalificacion !== null && $this->aTCalificacion->getTcalTipo() !== $v) {
            $this->aTCalificacion = null;
        }

        return $this;
    } // setEfinTCalificacion()

    /**
     * Set the value of [efin_resultado] column.
     *
     * @param string $v new value
     * @return $this|\EFinalizacion The current object (for fluent API support)
     */
    public function setEfinResultado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->efin_resultado !== $v) {
            $this->efin_resultado = $v;
            $this->modifiedColumns[EFinalizacionTableMap::COL_EFIN_RESULTADO] = true;
        }

        return $this;
    } // setEfinResultado()

    /**
     * Set the value of [efin_descripcion] column.
     *
     * @param string $v new value
     * @return $this|\EFinalizacion The current object (for fluent API support)
     */
    public function setEfinDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->efin_descripcion !== $v) {
            $this->efin_descripcion = $v;
            $this->modifiedColumns[EFinalizacionTableMap::COL_EFIN_DESCRIPCION] = true;
        }

        return $this;
    } // setEfinDescripcion()

    /**
     * Set the value of [efin_cota_inferior] column.
     *
     * @param int $v new value
     * @return $this|\EFinalizacion The current object (for fluent API support)
     */
    public function setEfinCotaInferior($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->efin_cota_inferior !== $v) {
            $this->efin_cota_inferior = $v;
            $this->modifiedColumns[EFinalizacionTableMap::COL_EFIN_COTA_INFERIOR] = true;
        }

        return $this;
    } // setEfinCotaInferior()

    /**
     * Set the value of [efin_cota_superior] column.
     *
     * @param string $v new value
     * @return $this|\EFinalizacion The current object (for fluent API support)
     */
    public function setEfinCotaSuperior($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->efin_cota_superior !== $v) {
            $this->efin_cota_superior = $v;
            $this->modifiedColumns[EFinalizacionTableMap::COL_EFIN_COTA_SUPERIOR] = true;
        }

        return $this;
    } // setEfinCotaSuperior()

    /**
     * Sets the value of [efin_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EFinalizacion The current object (for fluent API support)
     */
    public function setEfinRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->efin_r_fecha_creacion !== null || $dt !== null) {
            if ($this->efin_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->efin_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->efin_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EFinalizacionTableMap::COL_EFIN_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setEfinRFechaCreacion()

    /**
     * Sets the value of [efin_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EFinalizacion The current object (for fluent API support)
     */
    public function setEfinRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->efin_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->efin_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->efin_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->efin_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EFinalizacionTableMap::COL_EFIN_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setEfinRFechaModificacion()

    /**
     * Set the value of [efin_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\EFinalizacion The current object (for fluent API support)
     */
    public function setEfinRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->efin_r_usuario !== $v) {
            $this->efin_r_usuario = $v;
            $this->modifiedColumns[EFinalizacionTableMap::COL_EFIN_R_USUARIO] = true;
        }

        return $this;
    } // setEfinRUsuario()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->efin_r_usuario !== 1) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EFinalizacionTableMap::translateFieldName('EfinEstado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->efin_estado = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EFinalizacionTableMap::translateFieldName('EfinTCalificacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->efin_t_calificacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EFinalizacionTableMap::translateFieldName('EfinResultado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->efin_resultado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EFinalizacionTableMap::translateFieldName('EfinDescripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->efin_descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EFinalizacionTableMap::translateFieldName('EfinCotaInferior', TableMap::TYPE_PHPNAME, $indexType)];
            $this->efin_cota_inferior = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EFinalizacionTableMap::translateFieldName('EfinCotaSuperior', TableMap::TYPE_PHPNAME, $indexType)];
            $this->efin_cota_superior = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EFinalizacionTableMap::translateFieldName('EfinRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->efin_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EFinalizacionTableMap::translateFieldName('EfinRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->efin_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : EFinalizacionTableMap::translateFieldName('EfinRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->efin_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = EFinalizacionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\EFinalizacion'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aTCalificacion !== null && $this->efin_t_calificacion !== $this->aTCalificacion->getTcalTipo()) {
            $this->aTCalificacion = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EFinalizacionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEFinalizacionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTCalificacion = null;
            $this->collInscripcions = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see EFinalizacion::setDeleted()
     * @see EFinalizacion::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EFinalizacionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEFinalizacionQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EFinalizacionTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                EFinalizacionTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aTCalificacion !== null) {
                if ($this->aTCalificacion->isModified() || $this->aTCalificacion->isNew()) {
                    $affectedRows += $this->aTCalificacion->save($con);
                }
                $this->setTCalificacion($this->aTCalificacion);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->inscripcionsScheduledForDeletion !== null) {
                if (!$this->inscripcionsScheduledForDeletion->isEmpty()) {
                    foreach ($this->inscripcionsScheduledForDeletion as $inscripcion) {
                        // need to save related object because we set the relation to null
                        $inscripcion->save($con);
                    }
                    $this->inscripcionsScheduledForDeletion = null;
                }
            }

            if ($this->collInscripcions !== null) {
                foreach ($this->collInscripcions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[EFinalizacionTableMap::COL_EFIN_ESTADO] = true;
        if (null !== $this->efin_estado) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EFinalizacionTableMap::COL_EFIN_ESTADO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'efin_estado';
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_T_CALIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'efin_t_calificacion';
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_RESULTADO)) {
            $modifiedColumns[':p' . $index++]  = 'efin_resultado';
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'efin_descripcion';
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_COTA_INFERIOR)) {
            $modifiedColumns[':p' . $index++]  = 'efin_cota_inferior';
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_COTA_SUPERIOR)) {
            $modifiedColumns[':p' . $index++]  = 'efin_cota_superior';
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'efin_r_fecha_creacion';
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'efin_r_fecha_modificacion';
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'efin_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO e_finalizacion (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'efin_estado':
                        $stmt->bindValue($identifier, $this->efin_estado, PDO::PARAM_INT);
                        break;
                    case 'efin_t_calificacion':
                        $stmt->bindValue($identifier, $this->efin_t_calificacion, PDO::PARAM_INT);
                        break;
                    case 'efin_resultado':
                        $stmt->bindValue($identifier, $this->efin_resultado, PDO::PARAM_STR);
                        break;
                    case 'efin_descripcion':
                        $stmt->bindValue($identifier, $this->efin_descripcion, PDO::PARAM_STR);
                        break;
                    case 'efin_cota_inferior':
                        $stmt->bindValue($identifier, $this->efin_cota_inferior, PDO::PARAM_INT);
                        break;
                    case 'efin_cota_superior':
                        $stmt->bindValue($identifier, $this->efin_cota_superior, PDO::PARAM_STR);
                        break;
                    case 'efin_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->efin_r_fecha_creacion ? $this->efin_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'efin_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->efin_r_fecha_modificacion ? $this->efin_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'efin_r_usuario':
                        $stmt->bindValue($identifier, $this->efin_r_usuario, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setEfinEstado($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EFinalizacionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getEfinEstado();
                break;
            case 1:
                return $this->getEfinTCalificacion();
                break;
            case 2:
                return $this->getEfinResultado();
                break;
            case 3:
                return $this->getEfinDescripcion();
                break;
            case 4:
                return $this->getEfinCotaInferior();
                break;
            case 5:
                return $this->getEfinCotaSuperior();
                break;
            case 6:
                return $this->getEfinRFechaCreacion();
                break;
            case 7:
                return $this->getEfinRFechaModificacion();
                break;
            case 8:
                return $this->getEfinRUsuario();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['EFinalizacion'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EFinalizacion'][$this->hashCode()] = true;
        $keys = EFinalizacionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getEfinEstado(),
            $keys[1] => $this->getEfinTCalificacion(),
            $keys[2] => $this->getEfinResultado(),
            $keys[3] => $this->getEfinDescripcion(),
            $keys[4] => $this->getEfinCotaInferior(),
            $keys[5] => $this->getEfinCotaSuperior(),
            $keys[6] => $this->getEfinRFechaCreacion(),
            $keys[7] => $this->getEfinRFechaModificacion(),
            $keys[8] => $this->getEfinRUsuario(),
        );
        if ($result[$keys[6]] instanceof \DateTimeInterface) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }

        if ($result[$keys[7]] instanceof \DateTimeInterface) {
            $result[$keys[7]] = $result[$keys[7]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aTCalificacion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tCalificacion';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_calificacion';
                        break;
                    default:
                        $key = 'TCalificacion';
                }

                $result[$key] = $this->aTCalificacion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collInscripcions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'inscripcions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'inscripcions';
                        break;
                    default:
                        $key = 'Inscripcions';
                }

                $result[$key] = $this->collInscripcions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\EFinalizacion
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EFinalizacionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\EFinalizacion
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setEfinEstado($value);
                break;
            case 1:
                $this->setEfinTCalificacion($value);
                break;
            case 2:
                $this->setEfinResultado($value);
                break;
            case 3:
                $this->setEfinDescripcion($value);
                break;
            case 4:
                $this->setEfinCotaInferior($value);
                break;
            case 5:
                $this->setEfinCotaSuperior($value);
                break;
            case 6:
                $this->setEfinRFechaCreacion($value);
                break;
            case 7:
                $this->setEfinRFechaModificacion($value);
                break;
            case 8:
                $this->setEfinRUsuario($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = EFinalizacionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setEfinEstado($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setEfinTCalificacion($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setEfinResultado($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setEfinDescripcion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEfinCotaInferior($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setEfinCotaSuperior($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEfinRFechaCreacion($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setEfinRFechaModificacion($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setEfinRUsuario($arr[$keys[8]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\EFinalizacion The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EFinalizacionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_ESTADO)) {
            $criteria->add(EFinalizacionTableMap::COL_EFIN_ESTADO, $this->efin_estado);
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_T_CALIFICACION)) {
            $criteria->add(EFinalizacionTableMap::COL_EFIN_T_CALIFICACION, $this->efin_t_calificacion);
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_RESULTADO)) {
            $criteria->add(EFinalizacionTableMap::COL_EFIN_RESULTADO, $this->efin_resultado);
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_DESCRIPCION)) {
            $criteria->add(EFinalizacionTableMap::COL_EFIN_DESCRIPCION, $this->efin_descripcion);
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_COTA_INFERIOR)) {
            $criteria->add(EFinalizacionTableMap::COL_EFIN_COTA_INFERIOR, $this->efin_cota_inferior);
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_COTA_SUPERIOR)) {
            $criteria->add(EFinalizacionTableMap::COL_EFIN_COTA_SUPERIOR, $this->efin_cota_superior);
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_R_FECHA_CREACION)) {
            $criteria->add(EFinalizacionTableMap::COL_EFIN_R_FECHA_CREACION, $this->efin_r_fecha_creacion);
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_R_FECHA_MODIFICACION)) {
            $criteria->add(EFinalizacionTableMap::COL_EFIN_R_FECHA_MODIFICACION, $this->efin_r_fecha_modificacion);
        }
        if ($this->isColumnModified(EFinalizacionTableMap::COL_EFIN_R_USUARIO)) {
            $criteria->add(EFinalizacionTableMap::COL_EFIN_R_USUARIO, $this->efin_r_usuario);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildEFinalizacionQuery::create();
        $criteria->add(EFinalizacionTableMap::COL_EFIN_ESTADO, $this->efin_estado);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getEfinEstado();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getEfinEstado();
    }

    /**
     * Generic method to set the primary key (efin_estado column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setEfinEstado($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getEfinEstado();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \EFinalizacion (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEfinTCalificacion($this->getEfinTCalificacion());
        $copyObj->setEfinResultado($this->getEfinResultado());
        $copyObj->setEfinDescripcion($this->getEfinDescripcion());
        $copyObj->setEfinCotaInferior($this->getEfinCotaInferior());
        $copyObj->setEfinCotaSuperior($this->getEfinCotaSuperior());
        $copyObj->setEfinRFechaCreacion($this->getEfinRFechaCreacion());
        $copyObj->setEfinRFechaModificacion($this->getEfinRFechaModificacion());
        $copyObj->setEfinRUsuario($this->getEfinRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getInscripcions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInscripcion($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setEfinEstado(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \EFinalizacion Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildTCalificacion object.
     *
     * @param  ChildTCalificacion $v
     * @return $this|\EFinalizacion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTCalificacion(ChildTCalificacion $v = null)
    {
        if ($v === null) {
            $this->setEfinTCalificacion(NULL);
        } else {
            $this->setEfinTCalificacion($v->getTcalTipo());
        }

        $this->aTCalificacion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTCalificacion object, it will not be re-added.
        if ($v !== null) {
            $v->addEFinalizacion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTCalificacion object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTCalificacion The associated ChildTCalificacion object.
     * @throws PropelException
     */
    public function getTCalificacion(ConnectionInterface $con = null)
    {
        if ($this->aTCalificacion === null && ($this->efin_t_calificacion != 0)) {
            $this->aTCalificacion = ChildTCalificacionQuery::create()->findPk($this->efin_t_calificacion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTCalificacion->addEFinalizacions($this);
             */
        }

        return $this->aTCalificacion;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Inscripcion' == $relationName) {
            $this->initInscripcions();
            return;
        }
    }

    /**
     * Clears out the collInscripcions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInscripcions()
     */
    public function clearInscripcions()
    {
        $this->collInscripcions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInscripcions collection loaded partially.
     */
    public function resetPartialInscripcions($v = true)
    {
        $this->collInscripcionsPartial = $v;
    }

    /**
     * Initializes the collInscripcions collection.
     *
     * By default this just sets the collInscripcions collection to an empty array (like clearcollInscripcions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInscripcions($overrideExisting = true)
    {
        if (null !== $this->collInscripcions && !$overrideExisting) {
            return;
        }

        $collectionClassName = InscripcionTableMap::getTableMap()->getCollectionClassName();

        $this->collInscripcions = new $collectionClassName;
        $this->collInscripcions->setModel('\Inscripcion');
    }

    /**
     * Gets an array of ChildInscripcion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEFinalizacion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInscripcion[] List of ChildInscripcion objects
     * @throws PropelException
     */
    public function getInscripcions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInscripcionsPartial && !$this->isNew();
        if (null === $this->collInscripcions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInscripcions) {
                // return empty collection
                $this->initInscripcions();
            } else {
                $collInscripcions = ChildInscripcionQuery::create(null, $criteria)
                    ->filterByEFinalizacion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInscripcionsPartial && count($collInscripcions)) {
                        $this->initInscripcions(false);

                        foreach ($collInscripcions as $obj) {
                            if (false == $this->collInscripcions->contains($obj)) {
                                $this->collInscripcions->append($obj);
                            }
                        }

                        $this->collInscripcionsPartial = true;
                    }

                    return $collInscripcions;
                }

                if ($partial && $this->collInscripcions) {
                    foreach ($this->collInscripcions as $obj) {
                        if ($obj->isNew()) {
                            $collInscripcions[] = $obj;
                        }
                    }
                }

                $this->collInscripcions = $collInscripcions;
                $this->collInscripcionsPartial = false;
            }
        }

        return $this->collInscripcions;
    }

    /**
     * Sets a collection of ChildInscripcion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $inscripcions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEFinalizacion The current object (for fluent API support)
     */
    public function setInscripcions(Collection $inscripcions, ConnectionInterface $con = null)
    {
        /** @var ChildInscripcion[] $inscripcionsToDelete */
        $inscripcionsToDelete = $this->getInscripcions(new Criteria(), $con)->diff($inscripcions);


        $this->inscripcionsScheduledForDeletion = $inscripcionsToDelete;

        foreach ($inscripcionsToDelete as $inscripcionRemoved) {
            $inscripcionRemoved->setEFinalizacion(null);
        }

        $this->collInscripcions = null;
        foreach ($inscripcions as $inscripcion) {
            $this->addInscripcion($inscripcion);
        }

        $this->collInscripcions = $inscripcions;
        $this->collInscripcionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Inscripcion objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Inscripcion objects.
     * @throws PropelException
     */
    public function countInscripcions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInscripcionsPartial && !$this->isNew();
        if (null === $this->collInscripcions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInscripcions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInscripcions());
            }

            $query = ChildInscripcionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEFinalizacion($this)
                ->count($con);
        }

        return count($this->collInscripcions);
    }

    /**
     * Method called to associate a ChildInscripcion object to this object
     * through the ChildInscripcion foreign key attribute.
     *
     * @param  ChildInscripcion $l ChildInscripcion
     * @return $this|\EFinalizacion The current object (for fluent API support)
     */
    public function addInscripcion(ChildInscripcion $l)
    {
        if ($this->collInscripcions === null) {
            $this->initInscripcions();
            $this->collInscripcionsPartial = true;
        }

        if (!$this->collInscripcions->contains($l)) {
            $this->doAddInscripcion($l);

            if ($this->inscripcionsScheduledForDeletion and $this->inscripcionsScheduledForDeletion->contains($l)) {
                $this->inscripcionsScheduledForDeletion->remove($this->inscripcionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInscripcion $inscripcion The ChildInscripcion object to add.
     */
    protected function doAddInscripcion(ChildInscripcion $inscripcion)
    {
        $this->collInscripcions[]= $inscripcion;
        $inscripcion->setEFinalizacion($this);
    }

    /**
     * @param  ChildInscripcion $inscripcion The ChildInscripcion object to remove.
     * @return $this|ChildEFinalizacion The current object (for fluent API support)
     */
    public function removeInscripcion(ChildInscripcion $inscripcion)
    {
        if ($this->getInscripcions()->contains($inscripcion)) {
            $pos = $this->collInscripcions->search($inscripcion);
            $this->collInscripcions->remove($pos);
            if (null === $this->inscripcionsScheduledForDeletion) {
                $this->inscripcionsScheduledForDeletion = clone $this->collInscripcions;
                $this->inscripcionsScheduledForDeletion->clear();
            }
            $this->inscripcionsScheduledForDeletion[]= $inscripcion;
            $inscripcion->setEFinalizacion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EFinalizacion is new, it will return
     * an empty collection; or if this EFinalizacion has previously
     * been saved, it will retrieve related Inscripcions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EFinalizacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInscripcion[] List of ChildInscripcion objects
     */
    public function getInscripcionsJoinDictacion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInscripcionQuery::create(null, $criteria);
        $query->joinWith('Dictacion', $joinBehavior);

        return $this->getInscripcions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EFinalizacion is new, it will return
     * an empty collection; or if this EFinalizacion has previously
     * been saved, it will retrieve related Inscripcions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EFinalizacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInscripcion[] List of ChildInscripcion objects
     */
    public function getInscripcionsJoinEInscripcion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInscripcionQuery::create(null, $criteria);
        $query->joinWith('EInscripcion', $joinBehavior);

        return $this->getInscripcions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EFinalizacion is new, it will return
     * an empty collection; or if this EFinalizacion has previously
     * been saved, it will retrieve related Inscripcions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EFinalizacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInscripcion[] List of ChildInscripcion objects
     */
    public function getInscripcionsJoinTrabajador(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInscripcionQuery::create(null, $criteria);
        $query->joinWith('Trabajador', $joinBehavior);

        return $this->getInscripcions($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aTCalificacion) {
            $this->aTCalificacion->removeEFinalizacion($this);
        }
        $this->efin_estado = null;
        $this->efin_t_calificacion = null;
        $this->efin_resultado = null;
        $this->efin_descripcion = null;
        $this->efin_cota_inferior = null;
        $this->efin_cota_superior = null;
        $this->efin_r_fecha_creacion = null;
        $this->efin_r_fecha_modificacion = null;
        $this->efin_r_usuario = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collInscripcions) {
                foreach ($this->collInscripcions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collInscripcions = null;
        $this->aTCalificacion = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EFinalizacionTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
