<?php

namespace Base;

use \DetallePreguntaQuery as ChildDetallePreguntaQuery;
use \OpcionPregunta as ChildOpcionPregunta;
use \OpcionPreguntaQuery as ChildOpcionPreguntaQuery;
use \Pregunta as ChildPregunta;
use \PreguntaQuery as ChildPreguntaQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\DetallePreguntaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'detalle_pregunta' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class DetallePregunta implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\DetallePreguntaTableMap';


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
     * The value for the depr_c_pregunta field.
     *
     * @var        int
     */
    protected $depr_c_pregunta;

    /**
     * The value for the depr_c_opcion_pregunta field.
     *
     * @var        int
     */
    protected $depr_c_opcion_pregunta;

    /**
     * The value for the depr_es_correcta field.
     *
     * @var        int
     */
    protected $depr_es_correcta;

    /**
     * The value for the depr_orden field.
     *
     * @var        int
     */
    protected $depr_orden;

    /**
     * The value for the depr_vigente field.
     *
     * @var        int
     */
    protected $depr_vigente;

    /**
     * The value for the depr_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $depr_r_fecha_creacion;

    /**
     * The value for the depr_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $depr_r_fecha_modificacion;

    /**
     * The value for the depr_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $depr_r_usuario;

    /**
     * @var        ChildOpcionPregunta
     */
    protected $aOpcionPregunta;

    /**
     * @var        ChildPregunta
     */
    protected $aPregunta;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->depr_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\DetallePregunta object.
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
     * Compares this with another <code>DetallePregunta</code> instance.  If
     * <code>obj</code> is an instance of <code>DetallePregunta</code>, delegates to
     * <code>equals(DetallePregunta)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|DetallePregunta The current object, for fluid interface
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
     * Get the [depr_c_pregunta] column value.
     *
     * @return int
     */
    public function getDeprCPregunta()
    {
        return $this->depr_c_pregunta;
    }

    /**
     * Get the [depr_c_opcion_pregunta] column value.
     *
     * @return int
     */
    public function getDeprCOpcionPregunta()
    {
        return $this->depr_c_opcion_pregunta;
    }

    /**
     * Get the [depr_es_correcta] column value.
     *
     * @return int
     */
    public function getDeprEsCorrecta()
    {
        return $this->depr_es_correcta;
    }

    /**
     * Get the [depr_orden] column value.
     *
     * @return int
     */
    public function getDeprOrden()
    {
        return $this->depr_orden;
    }

    /**
     * Get the [depr_vigente] column value.
     *
     * @return int
     */
    public function getDeprVigente()
    {
        return $this->depr_vigente;
    }

    /**
     * Get the [optionally formatted] temporal [depr_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDeprRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->depr_r_fecha_creacion;
        } else {
            return $this->depr_r_fecha_creacion instanceof \DateTimeInterface ? $this->depr_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [depr_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDeprRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->depr_r_fecha_modificacion;
        } else {
            return $this->depr_r_fecha_modificacion instanceof \DateTimeInterface ? $this->depr_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [depr_r_usuario] column value.
     *
     * @return int
     */
    public function getDeprRUsuario()
    {
        return $this->depr_r_usuario;
    }

    /**
     * Set the value of [depr_c_pregunta] column.
     *
     * @param int $v new value
     * @return $this|\DetallePregunta The current object (for fluent API support)
     */
    public function setDeprCPregunta($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->depr_c_pregunta !== $v) {
            $this->depr_c_pregunta = $v;
            $this->modifiedColumns[DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA] = true;
        }

        if ($this->aPregunta !== null && $this->aPregunta->getPregCodigo() !== $v) {
            $this->aPregunta = null;
        }

        return $this;
    } // setDeprCPregunta()

    /**
     * Set the value of [depr_c_opcion_pregunta] column.
     *
     * @param int $v new value
     * @return $this|\DetallePregunta The current object (for fluent API support)
     */
    public function setDeprCOpcionPregunta($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->depr_c_opcion_pregunta !== $v) {
            $this->depr_c_opcion_pregunta = $v;
            $this->modifiedColumns[DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA] = true;
        }

        if ($this->aOpcionPregunta !== null && $this->aOpcionPregunta->getOpprCodigo() !== $v) {
            $this->aOpcionPregunta = null;
        }

        return $this;
    } // setDeprCOpcionPregunta()

    /**
     * Set the value of [depr_es_correcta] column.
     *
     * @param int $v new value
     * @return $this|\DetallePregunta The current object (for fluent API support)
     */
    public function setDeprEsCorrecta($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->depr_es_correcta !== $v) {
            $this->depr_es_correcta = $v;
            $this->modifiedColumns[DetallePreguntaTableMap::COL_DEPR_ES_CORRECTA] = true;
        }

        return $this;
    } // setDeprEsCorrecta()

    /**
     * Set the value of [depr_orden] column.
     *
     * @param int $v new value
     * @return $this|\DetallePregunta The current object (for fluent API support)
     */
    public function setDeprOrden($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->depr_orden !== $v) {
            $this->depr_orden = $v;
            $this->modifiedColumns[DetallePreguntaTableMap::COL_DEPR_ORDEN] = true;
        }

        return $this;
    } // setDeprOrden()

    /**
     * Set the value of [depr_vigente] column.
     *
     * @param int $v new value
     * @return $this|\DetallePregunta The current object (for fluent API support)
     */
    public function setDeprVigente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->depr_vigente !== $v) {
            $this->depr_vigente = $v;
            $this->modifiedColumns[DetallePreguntaTableMap::COL_DEPR_VIGENTE] = true;
        }

        return $this;
    } // setDeprVigente()

    /**
     * Sets the value of [depr_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\DetallePregunta The current object (for fluent API support)
     */
    public function setDeprRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->depr_r_fecha_creacion !== null || $dt !== null) {
            if ($this->depr_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->depr_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->depr_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[DetallePreguntaTableMap::COL_DEPR_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setDeprRFechaCreacion()

    /**
     * Sets the value of [depr_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\DetallePregunta The current object (for fluent API support)
     */
    public function setDeprRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->depr_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->depr_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->depr_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->depr_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[DetallePreguntaTableMap::COL_DEPR_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setDeprRFechaModificacion()

    /**
     * Set the value of [depr_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\DetallePregunta The current object (for fluent API support)
     */
    public function setDeprRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->depr_r_usuario !== $v) {
            $this->depr_r_usuario = $v;
            $this->modifiedColumns[DetallePreguntaTableMap::COL_DEPR_R_USUARIO] = true;
        }

        return $this;
    } // setDeprRUsuario()

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
            if ($this->depr_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : DetallePreguntaTableMap::translateFieldName('DeprCPregunta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->depr_c_pregunta = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : DetallePreguntaTableMap::translateFieldName('DeprCOpcionPregunta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->depr_c_opcion_pregunta = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : DetallePreguntaTableMap::translateFieldName('DeprEsCorrecta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->depr_es_correcta = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : DetallePreguntaTableMap::translateFieldName('DeprOrden', TableMap::TYPE_PHPNAME, $indexType)];
            $this->depr_orden = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : DetallePreguntaTableMap::translateFieldName('DeprVigente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->depr_vigente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : DetallePreguntaTableMap::translateFieldName('DeprRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->depr_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : DetallePreguntaTableMap::translateFieldName('DeprRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->depr_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : DetallePreguntaTableMap::translateFieldName('DeprRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->depr_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = DetallePreguntaTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\DetallePregunta'), 0, $e);
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
        if ($this->aPregunta !== null && $this->depr_c_pregunta !== $this->aPregunta->getPregCodigo()) {
            $this->aPregunta = null;
        }
        if ($this->aOpcionPregunta !== null && $this->depr_c_opcion_pregunta !== $this->aOpcionPregunta->getOpprCodigo()) {
            $this->aOpcionPregunta = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(DetallePreguntaTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildDetallePreguntaQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOpcionPregunta = null;
            $this->aPregunta = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see DetallePregunta::setDeleted()
     * @see DetallePregunta::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(DetallePreguntaTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildDetallePreguntaQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(DetallePreguntaTableMap::DATABASE_NAME);
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
                DetallePreguntaTableMap::addInstanceToPool($this);
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

            if ($this->aOpcionPregunta !== null) {
                if ($this->aOpcionPregunta->isModified() || $this->aOpcionPregunta->isNew()) {
                    $affectedRows += $this->aOpcionPregunta->save($con);
                }
                $this->setOpcionPregunta($this->aOpcionPregunta);
            }

            if ($this->aPregunta !== null) {
                if ($this->aPregunta->isModified() || $this->aPregunta->isNew()) {
                    $affectedRows += $this->aPregunta->save($con);
                }
                $this->setPregunta($this->aPregunta);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA)) {
            $modifiedColumns[':p' . $index++]  = 'depr_c_pregunta';
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA)) {
            $modifiedColumns[':p' . $index++]  = 'depr_c_opcion_pregunta';
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_ES_CORRECTA)) {
            $modifiedColumns[':p' . $index++]  = 'depr_es_correcta';
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_ORDEN)) {
            $modifiedColumns[':p' . $index++]  = 'depr_orden';
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_VIGENTE)) {
            $modifiedColumns[':p' . $index++]  = 'depr_vigente';
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'depr_r_fecha_creacion';
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'depr_r_fecha_modificacion';
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'depr_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO detalle_pregunta (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'depr_c_pregunta':
                        $stmt->bindValue($identifier, $this->depr_c_pregunta, PDO::PARAM_INT);
                        break;
                    case 'depr_c_opcion_pregunta':
                        $stmt->bindValue($identifier, $this->depr_c_opcion_pregunta, PDO::PARAM_INT);
                        break;
                    case 'depr_es_correcta':
                        $stmt->bindValue($identifier, $this->depr_es_correcta, PDO::PARAM_INT);
                        break;
                    case 'depr_orden':
                        $stmt->bindValue($identifier, $this->depr_orden, PDO::PARAM_INT);
                        break;
                    case 'depr_vigente':
                        $stmt->bindValue($identifier, $this->depr_vigente, PDO::PARAM_INT);
                        break;
                    case 'depr_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->depr_r_fecha_creacion ? $this->depr_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'depr_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->depr_r_fecha_modificacion ? $this->depr_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'depr_r_usuario':
                        $stmt->bindValue($identifier, $this->depr_r_usuario, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

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
        $pos = DetallePreguntaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getDeprCPregunta();
                break;
            case 1:
                return $this->getDeprCOpcionPregunta();
                break;
            case 2:
                return $this->getDeprEsCorrecta();
                break;
            case 3:
                return $this->getDeprOrden();
                break;
            case 4:
                return $this->getDeprVigente();
                break;
            case 5:
                return $this->getDeprRFechaCreacion();
                break;
            case 6:
                return $this->getDeprRFechaModificacion();
                break;
            case 7:
                return $this->getDeprRUsuario();
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

        if (isset($alreadyDumpedObjects['DetallePregunta'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['DetallePregunta'][$this->hashCode()] = true;
        $keys = DetallePreguntaTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getDeprCPregunta(),
            $keys[1] => $this->getDeprCOpcionPregunta(),
            $keys[2] => $this->getDeprEsCorrecta(),
            $keys[3] => $this->getDeprOrden(),
            $keys[4] => $this->getDeprVigente(),
            $keys[5] => $this->getDeprRFechaCreacion(),
            $keys[6] => $this->getDeprRFechaModificacion(),
            $keys[7] => $this->getDeprRUsuario(),
        );
        if ($result[$keys[5]] instanceof \DateTimeInterface) {
            $result[$keys[5]] = $result[$keys[5]]->format('c');
        }

        if ($result[$keys[6]] instanceof \DateTimeInterface) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aOpcionPregunta) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'opcionPregunta';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'opcion_pregunta';
                        break;
                    default:
                        $key = 'OpcionPregunta';
                }

                $result[$key] = $this->aOpcionPregunta->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPregunta) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'pregunta';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'pregunta';
                        break;
                    default:
                        $key = 'Pregunta';
                }

                $result[$key] = $this->aPregunta->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\DetallePregunta
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = DetallePreguntaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\DetallePregunta
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setDeprCPregunta($value);
                break;
            case 1:
                $this->setDeprCOpcionPregunta($value);
                break;
            case 2:
                $this->setDeprEsCorrecta($value);
                break;
            case 3:
                $this->setDeprOrden($value);
                break;
            case 4:
                $this->setDeprVigente($value);
                break;
            case 5:
                $this->setDeprRFechaCreacion($value);
                break;
            case 6:
                $this->setDeprRFechaModificacion($value);
                break;
            case 7:
                $this->setDeprRUsuario($value);
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
        $keys = DetallePreguntaTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setDeprCPregunta($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setDeprCOpcionPregunta($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDeprEsCorrecta($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDeprOrden($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDeprVigente($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDeprRFechaCreacion($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDeprRFechaModificacion($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setDeprRUsuario($arr[$keys[7]]);
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
     * @return $this|\DetallePregunta The current object, for fluid interface
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
        $criteria = new Criteria(DetallePreguntaTableMap::DATABASE_NAME);

        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA)) {
            $criteria->add(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA, $this->depr_c_pregunta);
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA)) {
            $criteria->add(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA, $this->depr_c_opcion_pregunta);
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_ES_CORRECTA)) {
            $criteria->add(DetallePreguntaTableMap::COL_DEPR_ES_CORRECTA, $this->depr_es_correcta);
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_ORDEN)) {
            $criteria->add(DetallePreguntaTableMap::COL_DEPR_ORDEN, $this->depr_orden);
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_VIGENTE)) {
            $criteria->add(DetallePreguntaTableMap::COL_DEPR_VIGENTE, $this->depr_vigente);
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_R_FECHA_CREACION)) {
            $criteria->add(DetallePreguntaTableMap::COL_DEPR_R_FECHA_CREACION, $this->depr_r_fecha_creacion);
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_R_FECHA_MODIFICACION)) {
            $criteria->add(DetallePreguntaTableMap::COL_DEPR_R_FECHA_MODIFICACION, $this->depr_r_fecha_modificacion);
        }
        if ($this->isColumnModified(DetallePreguntaTableMap::COL_DEPR_R_USUARIO)) {
            $criteria->add(DetallePreguntaTableMap::COL_DEPR_R_USUARIO, $this->depr_r_usuario);
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
        $criteria = ChildDetallePreguntaQuery::create();
        $criteria->add(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA, $this->depr_c_pregunta);
        $criteria->add(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA, $this->depr_c_opcion_pregunta);

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
        $validPk = null !== $this->getDeprCPregunta() &&
            null !== $this->getDeprCOpcionPregunta();

        $validPrimaryKeyFKs = 2;
        $primaryKeyFKs = [];

        //relation detalle_pregunta_opcion_pregunta_fk to table opcion_pregunta
        if ($this->aOpcionPregunta && $hash = spl_object_hash($this->aOpcionPregunta)) {
            $primaryKeyFKs[] = $hash;
        } else {
            $validPrimaryKeyFKs = false;
        }

        //relation detalle_pregunta_pregunta_fk to table pregunta
        if ($this->aPregunta && $hash = spl_object_hash($this->aPregunta)) {
            $primaryKeyFKs[] = $hash;
        } else {
            $validPrimaryKeyFKs = false;
        }

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getDeprCPregunta();
        $pks[1] = $this->getDeprCOpcionPregunta();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param      array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setDeprCPregunta($keys[0]);
        $this->setDeprCOpcionPregunta($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getDeprCPregunta()) && (null === $this->getDeprCOpcionPregunta());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \DetallePregunta (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDeprCPregunta($this->getDeprCPregunta());
        $copyObj->setDeprCOpcionPregunta($this->getDeprCOpcionPregunta());
        $copyObj->setDeprEsCorrecta($this->getDeprEsCorrecta());
        $copyObj->setDeprOrden($this->getDeprOrden());
        $copyObj->setDeprVigente($this->getDeprVigente());
        $copyObj->setDeprRFechaCreacion($this->getDeprRFechaCreacion());
        $copyObj->setDeprRFechaModificacion($this->getDeprRFechaModificacion());
        $copyObj->setDeprRUsuario($this->getDeprRUsuario());
        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return \DetallePregunta Clone of current object.
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
     * Declares an association between this object and a ChildOpcionPregunta object.
     *
     * @param  ChildOpcionPregunta $v
     * @return $this|\DetallePregunta The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOpcionPregunta(ChildOpcionPregunta $v = null)
    {
        if ($v === null) {
            $this->setDeprCOpcionPregunta(NULL);
        } else {
            $this->setDeprCOpcionPregunta($v->getOpprCodigo());
        }

        $this->aOpcionPregunta = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildOpcionPregunta object, it will not be re-added.
        if ($v !== null) {
            $v->addDetallePregunta($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildOpcionPregunta object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildOpcionPregunta The associated ChildOpcionPregunta object.
     * @throws PropelException
     */
    public function getOpcionPregunta(ConnectionInterface $con = null)
    {
        if ($this->aOpcionPregunta === null && ($this->depr_c_opcion_pregunta != 0)) {
            $this->aOpcionPregunta = ChildOpcionPreguntaQuery::create()->findPk($this->depr_c_opcion_pregunta, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOpcionPregunta->addDetallePreguntas($this);
             */
        }

        return $this->aOpcionPregunta;
    }

    /**
     * Declares an association between this object and a ChildPregunta object.
     *
     * @param  ChildPregunta $v
     * @return $this|\DetallePregunta The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPregunta(ChildPregunta $v = null)
    {
        if ($v === null) {
            $this->setDeprCPregunta(NULL);
        } else {
            $this->setDeprCPregunta($v->getPregCodigo());
        }

        $this->aPregunta = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPregunta object, it will not be re-added.
        if ($v !== null) {
            $v->addDetallePregunta($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildPregunta object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildPregunta The associated ChildPregunta object.
     * @throws PropelException
     */
    public function getPregunta(ConnectionInterface $con = null)
    {
        if ($this->aPregunta === null && ($this->depr_c_pregunta != 0)) {
            $this->aPregunta = ChildPreguntaQuery::create()->findPk($this->depr_c_pregunta, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPregunta->addDetallePreguntas($this);
             */
        }

        return $this->aPregunta;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aOpcionPregunta) {
            $this->aOpcionPregunta->removeDetallePregunta($this);
        }
        if (null !== $this->aPregunta) {
            $this->aPregunta->removeDetallePregunta($this);
        }
        $this->depr_c_pregunta = null;
        $this->depr_c_opcion_pregunta = null;
        $this->depr_es_correcta = null;
        $this->depr_orden = null;
        $this->depr_vigente = null;
        $this->depr_r_fecha_creacion = null;
        $this->depr_r_fecha_modificacion = null;
        $this->depr_r_usuario = null;
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
        } // if ($deep)

        $this->aOpcionPregunta = null;
        $this->aPregunta = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DetallePreguntaTableMap::DEFAULT_STRING_FORMAT);
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
