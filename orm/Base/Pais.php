<?php

namespace Base;

use \Direccion as ChildDireccion;
use \DireccionQuery as ChildDireccionQuery;
use \Pais as ChildPais;
use \PaisQuery as ChildPaisQuery;
use \Persona as ChildPersona;
use \PersonaQuery as ChildPersonaQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\DireccionTableMap;
use Map\PaisTableMap;
use Map\PersonaTableMap;
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
 * Base class that represents a row from the 'pais' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Pais implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\PaisTableMap';


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
     * The value for the pais_codigo field.
     *
     * @var        int
     */
    protected $pais_codigo;

    /**
     * The value for the nombre_comun field.
     *
     * @var        string
     */
    protected $nombre_comun;

    /**
     * The value for the nombre_iso field.
     *
     * @var        string
     */
    protected $nombre_iso;

    /**
     * The value for the codigo_alfa2 field.
     *
     * @var        string
     */
    protected $codigo_alfa2;

    /**
     * The value for the codigo_alfa3 field.
     *
     * @var        string
     */
    protected $codigo_alfa3;

    /**
     * The value for the codigo_numerico field.
     *
     * @var        int
     */
    protected $codigo_numerico;

    /**
     * The value for the observaciones field.
     *
     * @var        string
     */
    protected $observaciones;

    /**
     * The value for the pais_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $pais_r_fecha_creacion;

    /**
     * The value for the pais_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $pais_r_fecha_modificacion;

    /**
     * The value for the pais_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $pais_r_usuario;

    /**
     * @var        ObjectCollection|ChildDireccion[] Collection to store aggregation of ChildDireccion objects.
     */
    protected $collDireccions;
    protected $collDireccionsPartial;

    /**
     * @var        ObjectCollection|ChildPersona[] Collection to store aggregation of ChildPersona objects.
     */
    protected $collPersonas;
    protected $collPersonasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDireccion[]
     */
    protected $direccionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPersona[]
     */
    protected $personasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->pais_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Pais object.
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
     * Compares this with another <code>Pais</code> instance.  If
     * <code>obj</code> is an instance of <code>Pais</code>, delegates to
     * <code>equals(Pais)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Pais The current object, for fluid interface
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
     * Get the [pais_codigo] column value.
     *
     * @return int
     */
    public function getPaisCodigo()
    {
        return $this->pais_codigo;
    }

    /**
     * Get the [nombre_comun] column value.
     *
     * @return string
     */
    public function getNombreComun()
    {
        return $this->nombre_comun;
    }

    /**
     * Get the [nombre_iso] column value.
     *
     * @return string
     */
    public function getNombreIso()
    {
        return $this->nombre_iso;
    }

    /**
     * Get the [codigo_alfa2] column value.
     *
     * @return string
     */
    public function getCodigoAlfa2()
    {
        return $this->codigo_alfa2;
    }

    /**
     * Get the [codigo_alfa3] column value.
     *
     * @return string
     */
    public function getCodigoAlfa3()
    {
        return $this->codigo_alfa3;
    }

    /**
     * Get the [codigo_numerico] column value.
     *
     * @return int
     */
    public function getCodigoNumerico()
    {
        return $this->codigo_numerico;
    }

    /**
     * Get the [observaciones] column value.
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Get the [optionally formatted] temporal [pais_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPaisRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->pais_r_fecha_creacion;
        } else {
            return $this->pais_r_fecha_creacion instanceof \DateTimeInterface ? $this->pais_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [pais_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPaisRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->pais_r_fecha_modificacion;
        } else {
            return $this->pais_r_fecha_modificacion instanceof \DateTimeInterface ? $this->pais_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [pais_r_usuario] column value.
     *
     * @return int
     */
    public function getPaisRUsuario()
    {
        return $this->pais_r_usuario;
    }

    /**
     * Set the value of [pais_codigo] column.
     *
     * @param int $v new value
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function setPaisCodigo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pais_codigo !== $v) {
            $this->pais_codigo = $v;
            $this->modifiedColumns[PaisTableMap::COL_PAIS_CODIGO] = true;
        }

        return $this;
    } // setPaisCodigo()

    /**
     * Set the value of [nombre_comun] column.
     *
     * @param string $v new value
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function setNombreComun($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre_comun !== $v) {
            $this->nombre_comun = $v;
            $this->modifiedColumns[PaisTableMap::COL_NOMBRE_COMUN] = true;
        }

        return $this;
    } // setNombreComun()

    /**
     * Set the value of [nombre_iso] column.
     *
     * @param string $v new value
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function setNombreIso($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre_iso !== $v) {
            $this->nombre_iso = $v;
            $this->modifiedColumns[PaisTableMap::COL_NOMBRE_ISO] = true;
        }

        return $this;
    } // setNombreIso()

    /**
     * Set the value of [codigo_alfa2] column.
     *
     * @param string $v new value
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function setCodigoAlfa2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->codigo_alfa2 !== $v) {
            $this->codigo_alfa2 = $v;
            $this->modifiedColumns[PaisTableMap::COL_CODIGO_ALFA2] = true;
        }

        return $this;
    } // setCodigoAlfa2()

    /**
     * Set the value of [codigo_alfa3] column.
     *
     * @param string $v new value
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function setCodigoAlfa3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->codigo_alfa3 !== $v) {
            $this->codigo_alfa3 = $v;
            $this->modifiedColumns[PaisTableMap::COL_CODIGO_ALFA3] = true;
        }

        return $this;
    } // setCodigoAlfa3()

    /**
     * Set the value of [codigo_numerico] column.
     *
     * @param int $v new value
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function setCodigoNumerico($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->codigo_numerico !== $v) {
            $this->codigo_numerico = $v;
            $this->modifiedColumns[PaisTableMap::COL_CODIGO_NUMERICO] = true;
        }

        return $this;
    } // setCodigoNumerico()

    /**
     * Set the value of [observaciones] column.
     *
     * @param string $v new value
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function setObservaciones($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->observaciones !== $v) {
            $this->observaciones = $v;
            $this->modifiedColumns[PaisTableMap::COL_OBSERVACIONES] = true;
        }

        return $this;
    } // setObservaciones()

    /**
     * Sets the value of [pais_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function setPaisRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->pais_r_fecha_creacion !== null || $dt !== null) {
            if ($this->pais_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->pais_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->pais_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PaisTableMap::COL_PAIS_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setPaisRFechaCreacion()

    /**
     * Sets the value of [pais_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function setPaisRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->pais_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->pais_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->pais_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->pais_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PaisTableMap::COL_PAIS_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setPaisRFechaModificacion()

    /**
     * Set the value of [pais_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function setPaisRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pais_r_usuario !== $v) {
            $this->pais_r_usuario = $v;
            $this->modifiedColumns[PaisTableMap::COL_PAIS_R_USUARIO] = true;
        }

        return $this;
    } // setPaisRUsuario()

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
            if ($this->pais_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PaisTableMap::translateFieldName('PaisCodigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pais_codigo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PaisTableMap::translateFieldName('NombreComun', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nombre_comun = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PaisTableMap::translateFieldName('NombreIso', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nombre_iso = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PaisTableMap::translateFieldName('CodigoAlfa2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->codigo_alfa2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PaisTableMap::translateFieldName('CodigoAlfa3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->codigo_alfa3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PaisTableMap::translateFieldName('CodigoNumerico', TableMap::TYPE_PHPNAME, $indexType)];
            $this->codigo_numerico = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PaisTableMap::translateFieldName('Observaciones', TableMap::TYPE_PHPNAME, $indexType)];
            $this->observaciones = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PaisTableMap::translateFieldName('PaisRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->pais_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PaisTableMap::translateFieldName('PaisRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->pais_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : PaisTableMap::translateFieldName('PaisRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pais_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = PaisTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Pais'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(PaisTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPaisQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collDireccions = null;

            $this->collPersonas = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Pais::setDeleted()
     * @see Pais::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaisTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPaisQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PaisTableMap::DATABASE_NAME);
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
                PaisTableMap::addInstanceToPool($this);
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

            if ($this->direccionsScheduledForDeletion !== null) {
                if (!$this->direccionsScheduledForDeletion->isEmpty()) {
                    foreach ($this->direccionsScheduledForDeletion as $direccion) {
                        // need to save related object because we set the relation to null
                        $direccion->save($con);
                    }
                    $this->direccionsScheduledForDeletion = null;
                }
            }

            if ($this->collDireccions !== null) {
                foreach ($this->collDireccions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->personasScheduledForDeletion !== null) {
                if (!$this->personasScheduledForDeletion->isEmpty()) {
                    foreach ($this->personasScheduledForDeletion as $persona) {
                        // need to save related object because we set the relation to null
                        $persona->save($con);
                    }
                    $this->personasScheduledForDeletion = null;
                }
            }

            if ($this->collPersonas !== null) {
                foreach ($this->collPersonas as $referrerFK) {
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

        $this->modifiedColumns[PaisTableMap::COL_PAIS_CODIGO] = true;
        if (null !== $this->pais_codigo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PaisTableMap::COL_PAIS_CODIGO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PaisTableMap::COL_PAIS_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'pais_codigo';
        }
        if ($this->isColumnModified(PaisTableMap::COL_NOMBRE_COMUN)) {
            $modifiedColumns[':p' . $index++]  = 'nombre_comun';
        }
        if ($this->isColumnModified(PaisTableMap::COL_NOMBRE_ISO)) {
            $modifiedColumns[':p' . $index++]  = 'nombre_iso';
        }
        if ($this->isColumnModified(PaisTableMap::COL_CODIGO_ALFA2)) {
            $modifiedColumns[':p' . $index++]  = 'codigo_alfa2';
        }
        if ($this->isColumnModified(PaisTableMap::COL_CODIGO_ALFA3)) {
            $modifiedColumns[':p' . $index++]  = 'codigo_alfa3';
        }
        if ($this->isColumnModified(PaisTableMap::COL_CODIGO_NUMERICO)) {
            $modifiedColumns[':p' . $index++]  = 'codigo_numerico';
        }
        if ($this->isColumnModified(PaisTableMap::COL_OBSERVACIONES)) {
            $modifiedColumns[':p' . $index++]  = 'observaciones';
        }
        if ($this->isColumnModified(PaisTableMap::COL_PAIS_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'pais_r_fecha_creacion';
        }
        if ($this->isColumnModified(PaisTableMap::COL_PAIS_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'pais_r_fecha_modificacion';
        }
        if ($this->isColumnModified(PaisTableMap::COL_PAIS_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'pais_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO pais (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'pais_codigo':
                        $stmt->bindValue($identifier, $this->pais_codigo, PDO::PARAM_INT);
                        break;
                    case 'nombre_comun':
                        $stmt->bindValue($identifier, $this->nombre_comun, PDO::PARAM_STR);
                        break;
                    case 'nombre_iso':
                        $stmt->bindValue($identifier, $this->nombre_iso, PDO::PARAM_STR);
                        break;
                    case 'codigo_alfa2':
                        $stmt->bindValue($identifier, $this->codigo_alfa2, PDO::PARAM_STR);
                        break;
                    case 'codigo_alfa3':
                        $stmt->bindValue($identifier, $this->codigo_alfa3, PDO::PARAM_STR);
                        break;
                    case 'codigo_numerico':
                        $stmt->bindValue($identifier, $this->codigo_numerico, PDO::PARAM_INT);
                        break;
                    case 'observaciones':
                        $stmt->bindValue($identifier, $this->observaciones, PDO::PARAM_STR);
                        break;
                    case 'pais_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->pais_r_fecha_creacion ? $this->pais_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'pais_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->pais_r_fecha_modificacion ? $this->pais_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'pais_r_usuario':
                        $stmt->bindValue($identifier, $this->pais_r_usuario, PDO::PARAM_INT);
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
        $this->setPaisCodigo($pk);

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
        $pos = PaisTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getPaisCodigo();
                break;
            case 1:
                return $this->getNombreComun();
                break;
            case 2:
                return $this->getNombreIso();
                break;
            case 3:
                return $this->getCodigoAlfa2();
                break;
            case 4:
                return $this->getCodigoAlfa3();
                break;
            case 5:
                return $this->getCodigoNumerico();
                break;
            case 6:
                return $this->getObservaciones();
                break;
            case 7:
                return $this->getPaisRFechaCreacion();
                break;
            case 8:
                return $this->getPaisRFechaModificacion();
                break;
            case 9:
                return $this->getPaisRUsuario();
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

        if (isset($alreadyDumpedObjects['Pais'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Pais'][$this->hashCode()] = true;
        $keys = PaisTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPaisCodigo(),
            $keys[1] => $this->getNombreComun(),
            $keys[2] => $this->getNombreIso(),
            $keys[3] => $this->getCodigoAlfa2(),
            $keys[4] => $this->getCodigoAlfa3(),
            $keys[5] => $this->getCodigoNumerico(),
            $keys[6] => $this->getObservaciones(),
            $keys[7] => $this->getPaisRFechaCreacion(),
            $keys[8] => $this->getPaisRFechaModificacion(),
            $keys[9] => $this->getPaisRUsuario(),
        );
        if ($result[$keys[7]] instanceof \DateTimeInterface) {
            $result[$keys[7]] = $result[$keys[7]]->format('c');
        }

        if ($result[$keys[8]] instanceof \DateTimeInterface) {
            $result[$keys[8]] = $result[$keys[8]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collDireccions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'direccions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'direccions';
                        break;
                    default:
                        $key = 'Direccions';
                }

                $result[$key] = $this->collDireccions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPersonas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'personas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'personas';
                        break;
                    default:
                        $key = 'Personas';
                }

                $result[$key] = $this->collPersonas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Pais
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PaisTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Pais
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setPaisCodigo($value);
                break;
            case 1:
                $this->setNombreComun($value);
                break;
            case 2:
                $this->setNombreIso($value);
                break;
            case 3:
                $this->setCodigoAlfa2($value);
                break;
            case 4:
                $this->setCodigoAlfa3($value);
                break;
            case 5:
                $this->setCodigoNumerico($value);
                break;
            case 6:
                $this->setObservaciones($value);
                break;
            case 7:
                $this->setPaisRFechaCreacion($value);
                break;
            case 8:
                $this->setPaisRFechaModificacion($value);
                break;
            case 9:
                $this->setPaisRUsuario($value);
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
        $keys = PaisTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setPaisCodigo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNombreComun($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setNombreIso($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCodigoAlfa2($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCodigoAlfa3($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCodigoNumerico($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setObservaciones($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPaisRFechaCreacion($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPaisRFechaModificacion($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPaisRUsuario($arr[$keys[9]]);
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
     * @return $this|\Pais The current object, for fluid interface
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
        $criteria = new Criteria(PaisTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PaisTableMap::COL_PAIS_CODIGO)) {
            $criteria->add(PaisTableMap::COL_PAIS_CODIGO, $this->pais_codigo);
        }
        if ($this->isColumnModified(PaisTableMap::COL_NOMBRE_COMUN)) {
            $criteria->add(PaisTableMap::COL_NOMBRE_COMUN, $this->nombre_comun);
        }
        if ($this->isColumnModified(PaisTableMap::COL_NOMBRE_ISO)) {
            $criteria->add(PaisTableMap::COL_NOMBRE_ISO, $this->nombre_iso);
        }
        if ($this->isColumnModified(PaisTableMap::COL_CODIGO_ALFA2)) {
            $criteria->add(PaisTableMap::COL_CODIGO_ALFA2, $this->codigo_alfa2);
        }
        if ($this->isColumnModified(PaisTableMap::COL_CODIGO_ALFA3)) {
            $criteria->add(PaisTableMap::COL_CODIGO_ALFA3, $this->codigo_alfa3);
        }
        if ($this->isColumnModified(PaisTableMap::COL_CODIGO_NUMERICO)) {
            $criteria->add(PaisTableMap::COL_CODIGO_NUMERICO, $this->codigo_numerico);
        }
        if ($this->isColumnModified(PaisTableMap::COL_OBSERVACIONES)) {
            $criteria->add(PaisTableMap::COL_OBSERVACIONES, $this->observaciones);
        }
        if ($this->isColumnModified(PaisTableMap::COL_PAIS_R_FECHA_CREACION)) {
            $criteria->add(PaisTableMap::COL_PAIS_R_FECHA_CREACION, $this->pais_r_fecha_creacion);
        }
        if ($this->isColumnModified(PaisTableMap::COL_PAIS_R_FECHA_MODIFICACION)) {
            $criteria->add(PaisTableMap::COL_PAIS_R_FECHA_MODIFICACION, $this->pais_r_fecha_modificacion);
        }
        if ($this->isColumnModified(PaisTableMap::COL_PAIS_R_USUARIO)) {
            $criteria->add(PaisTableMap::COL_PAIS_R_USUARIO, $this->pais_r_usuario);
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
        $criteria = ChildPaisQuery::create();
        $criteria->add(PaisTableMap::COL_PAIS_CODIGO, $this->pais_codigo);

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
        $validPk = null !== $this->getPaisCodigo();

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
        return $this->getPaisCodigo();
    }

    /**
     * Generic method to set the primary key (pais_codigo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPaisCodigo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getPaisCodigo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Pais (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombreComun($this->getNombreComun());
        $copyObj->setNombreIso($this->getNombreIso());
        $copyObj->setCodigoAlfa2($this->getCodigoAlfa2());
        $copyObj->setCodigoAlfa3($this->getCodigoAlfa3());
        $copyObj->setCodigoNumerico($this->getCodigoNumerico());
        $copyObj->setObservaciones($this->getObservaciones());
        $copyObj->setPaisRFechaCreacion($this->getPaisRFechaCreacion());
        $copyObj->setPaisRFechaModificacion($this->getPaisRFechaModificacion());
        $copyObj->setPaisRUsuario($this->getPaisRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getDireccions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDireccion($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPersonas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPersona($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPaisCodigo(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Pais Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Direccion' == $relationName) {
            $this->initDireccions();
            return;
        }
        if ('Persona' == $relationName) {
            $this->initPersonas();
            return;
        }
    }

    /**
     * Clears out the collDireccions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDireccions()
     */
    public function clearDireccions()
    {
        $this->collDireccions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDireccions collection loaded partially.
     */
    public function resetPartialDireccions($v = true)
    {
        $this->collDireccionsPartial = $v;
    }

    /**
     * Initializes the collDireccions collection.
     *
     * By default this just sets the collDireccions collection to an empty array (like clearcollDireccions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDireccions($overrideExisting = true)
    {
        if (null !== $this->collDireccions && !$overrideExisting) {
            return;
        }

        $collectionClassName = DireccionTableMap::getTableMap()->getCollectionClassName();

        $this->collDireccions = new $collectionClassName;
        $this->collDireccions->setModel('\Direccion');
    }

    /**
     * Gets an array of ChildDireccion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPais is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDireccion[] List of ChildDireccion objects
     * @throws PropelException
     */
    public function getDireccions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDireccionsPartial && !$this->isNew();
        if (null === $this->collDireccions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDireccions) {
                // return empty collection
                $this->initDireccions();
            } else {
                $collDireccions = ChildDireccionQuery::create(null, $criteria)
                    ->filterByPais($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDireccionsPartial && count($collDireccions)) {
                        $this->initDireccions(false);

                        foreach ($collDireccions as $obj) {
                            if (false == $this->collDireccions->contains($obj)) {
                                $this->collDireccions->append($obj);
                            }
                        }

                        $this->collDireccionsPartial = true;
                    }

                    return $collDireccions;
                }

                if ($partial && $this->collDireccions) {
                    foreach ($this->collDireccions as $obj) {
                        if ($obj->isNew()) {
                            $collDireccions[] = $obj;
                        }
                    }
                }

                $this->collDireccions = $collDireccions;
                $this->collDireccionsPartial = false;
            }
        }

        return $this->collDireccions;
    }

    /**
     * Sets a collection of ChildDireccion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $direccions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPais The current object (for fluent API support)
     */
    public function setDireccions(Collection $direccions, ConnectionInterface $con = null)
    {
        /** @var ChildDireccion[] $direccionsToDelete */
        $direccionsToDelete = $this->getDireccions(new Criteria(), $con)->diff($direccions);


        $this->direccionsScheduledForDeletion = $direccionsToDelete;

        foreach ($direccionsToDelete as $direccionRemoved) {
            $direccionRemoved->setPais(null);
        }

        $this->collDireccions = null;
        foreach ($direccions as $direccion) {
            $this->addDireccion($direccion);
        }

        $this->collDireccions = $direccions;
        $this->collDireccionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Direccion objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Direccion objects.
     * @throws PropelException
     */
    public function countDireccions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDireccionsPartial && !$this->isNew();
        if (null === $this->collDireccions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDireccions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDireccions());
            }

            $query = ChildDireccionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPais($this)
                ->count($con);
        }

        return count($this->collDireccions);
    }

    /**
     * Method called to associate a ChildDireccion object to this object
     * through the ChildDireccion foreign key attribute.
     *
     * @param  ChildDireccion $l ChildDireccion
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function addDireccion(ChildDireccion $l)
    {
        if ($this->collDireccions === null) {
            $this->initDireccions();
            $this->collDireccionsPartial = true;
        }

        if (!$this->collDireccions->contains($l)) {
            $this->doAddDireccion($l);

            if ($this->direccionsScheduledForDeletion and $this->direccionsScheduledForDeletion->contains($l)) {
                $this->direccionsScheduledForDeletion->remove($this->direccionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDireccion $direccion The ChildDireccion object to add.
     */
    protected function doAddDireccion(ChildDireccion $direccion)
    {
        $this->collDireccions[]= $direccion;
        $direccion->setPais($this);
    }

    /**
     * @param  ChildDireccion $direccion The ChildDireccion object to remove.
     * @return $this|ChildPais The current object (for fluent API support)
     */
    public function removeDireccion(ChildDireccion $direccion)
    {
        if ($this->getDireccions()->contains($direccion)) {
            $pos = $this->collDireccions->search($direccion);
            $this->collDireccions->remove($pos);
            if (null === $this->direccionsScheduledForDeletion) {
                $this->direccionsScheduledForDeletion = clone $this->collDireccions;
                $this->direccionsScheduledForDeletion->clear();
            }
            $this->direccionsScheduledForDeletion[]= $direccion;
            $direccion->setPais(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pais is new, it will return
     * an empty collection; or if this Pais has previously
     * been saved, it will retrieve related Direccions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pais.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDireccion[] List of ChildDireccion objects
     */
    public function getDireccionsJoinComuna(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDireccionQuery::create(null, $criteria);
        $query->joinWith('Comuna', $joinBehavior);

        return $this->getDireccions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pais is new, it will return
     * an empty collection; or if this Pais has previously
     * been saved, it will retrieve related Direccions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pais.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDireccion[] List of ChildDireccion objects
     */
    public function getDireccionsJoinPersona(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDireccionQuery::create(null, $criteria);
        $query->joinWith('Persona', $joinBehavior);

        return $this->getDireccions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pais is new, it will return
     * an empty collection; or if this Pais has previously
     * been saved, it will retrieve related Direccions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pais.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDireccion[] List of ChildDireccion objects
     */
    public function getDireccionsJoinTDireccion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDireccionQuery::create(null, $criteria);
        $query->joinWith('TDireccion', $joinBehavior);

        return $this->getDireccions($query, $con);
    }

    /**
     * Clears out the collPersonas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPersonas()
     */
    public function clearPersonas()
    {
        $this->collPersonas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPersonas collection loaded partially.
     */
    public function resetPartialPersonas($v = true)
    {
        $this->collPersonasPartial = $v;
    }

    /**
     * Initializes the collPersonas collection.
     *
     * By default this just sets the collPersonas collection to an empty array (like clearcollPersonas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPersonas($overrideExisting = true)
    {
        if (null !== $this->collPersonas && !$overrideExisting) {
            return;
        }

        $collectionClassName = PersonaTableMap::getTableMap()->getCollectionClassName();

        $this->collPersonas = new $collectionClassName;
        $this->collPersonas->setModel('\Persona');
    }

    /**
     * Gets an array of ChildPersona objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPais is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPersona[] List of ChildPersona objects
     * @throws PropelException
     */
    public function getPersonas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPersonasPartial && !$this->isNew();
        if (null === $this->collPersonas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPersonas) {
                // return empty collection
                $this->initPersonas();
            } else {
                $collPersonas = ChildPersonaQuery::create(null, $criteria)
                    ->filterByPais($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPersonasPartial && count($collPersonas)) {
                        $this->initPersonas(false);

                        foreach ($collPersonas as $obj) {
                            if (false == $this->collPersonas->contains($obj)) {
                                $this->collPersonas->append($obj);
                            }
                        }

                        $this->collPersonasPartial = true;
                    }

                    return $collPersonas;
                }

                if ($partial && $this->collPersonas) {
                    foreach ($this->collPersonas as $obj) {
                        if ($obj->isNew()) {
                            $collPersonas[] = $obj;
                        }
                    }
                }

                $this->collPersonas = $collPersonas;
                $this->collPersonasPartial = false;
            }
        }

        return $this->collPersonas;
    }

    /**
     * Sets a collection of ChildPersona objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $personas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPais The current object (for fluent API support)
     */
    public function setPersonas(Collection $personas, ConnectionInterface $con = null)
    {
        /** @var ChildPersona[] $personasToDelete */
        $personasToDelete = $this->getPersonas(new Criteria(), $con)->diff($personas);


        $this->personasScheduledForDeletion = $personasToDelete;

        foreach ($personasToDelete as $personaRemoved) {
            $personaRemoved->setPais(null);
        }

        $this->collPersonas = null;
        foreach ($personas as $persona) {
            $this->addPersona($persona);
        }

        $this->collPersonas = $personas;
        $this->collPersonasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Persona objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Persona objects.
     * @throws PropelException
     */
    public function countPersonas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPersonasPartial && !$this->isNew();
        if (null === $this->collPersonas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPersonas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPersonas());
            }

            $query = ChildPersonaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPais($this)
                ->count($con);
        }

        return count($this->collPersonas);
    }

    /**
     * Method called to associate a ChildPersona object to this object
     * through the ChildPersona foreign key attribute.
     *
     * @param  ChildPersona $l ChildPersona
     * @return $this|\Pais The current object (for fluent API support)
     */
    public function addPersona(ChildPersona $l)
    {
        if ($this->collPersonas === null) {
            $this->initPersonas();
            $this->collPersonasPartial = true;
        }

        if (!$this->collPersonas->contains($l)) {
            $this->doAddPersona($l);

            if ($this->personasScheduledForDeletion and $this->personasScheduledForDeletion->contains($l)) {
                $this->personasScheduledForDeletion->remove($this->personasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPersona $persona The ChildPersona object to add.
     */
    protected function doAddPersona(ChildPersona $persona)
    {
        $this->collPersonas[]= $persona;
        $persona->setPais($this);
    }

    /**
     * @param  ChildPersona $persona The ChildPersona object to remove.
     * @return $this|ChildPais The current object (for fluent API support)
     */
    public function removePersona(ChildPersona $persona)
    {
        if ($this->getPersonas()->contains($persona)) {
            $pos = $this->collPersonas->search($persona);
            $this->collPersonas->remove($pos);
            if (null === $this->personasScheduledForDeletion) {
                $this->personasScheduledForDeletion = clone $this->collPersonas;
                $this->personasScheduledForDeletion->clear();
            }
            $this->personasScheduledForDeletion[]= $persona;
            $persona->setPais(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pais is new, it will return
     * an empty collection; or if this Pais has previously
     * been saved, it will retrieve related Personas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pais.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPersona[] List of ChildPersona objects
     */
    public function getPersonasJoinEscolaridad(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPersonaQuery::create(null, $criteria);
        $query->joinWith('Escolaridad', $joinBehavior);

        return $this->getPersonas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pais is new, it will return
     * an empty collection; or if this Pais has previously
     * been saved, it will retrieve related Personas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pais.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPersona[] List of ChildPersona objects
     */
    public function getPersonasJoinEstadoCivil(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPersonaQuery::create(null, $criteria);
        $query->joinWith('EstadoCivil', $joinBehavior);

        return $this->getPersonas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pais is new, it will return
     * an empty collection; or if this Pais has previously
     * been saved, it will retrieve related Personas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pais.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPersona[] List of ChildPersona objects
     */
    public function getPersonasJoinTIdentificador(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPersonaQuery::create(null, $criteria);
        $query->joinWith('TIdentificador', $joinBehavior);

        return $this->getPersonas($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->pais_codigo = null;
        $this->nombre_comun = null;
        $this->nombre_iso = null;
        $this->codigo_alfa2 = null;
        $this->codigo_alfa3 = null;
        $this->codigo_numerico = null;
        $this->observaciones = null;
        $this->pais_r_fecha_creacion = null;
        $this->pais_r_fecha_modificacion = null;
        $this->pais_r_usuario = null;
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
            if ($this->collDireccions) {
                foreach ($this->collDireccions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPersonas) {
                foreach ($this->collPersonas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collDireccions = null;
        $this->collPersonas = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PaisTableMap::DEFAULT_STRING_FORMAT);
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
