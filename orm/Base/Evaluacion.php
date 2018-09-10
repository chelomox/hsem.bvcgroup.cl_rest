<?php

namespace Base;

use \Evaluacion as ChildEvaluacion;
use \EvaluacionAplicada as ChildEvaluacionAplicada;
use \EvaluacionAplicadaQuery as ChildEvaluacionAplicadaQuery;
use \EvaluacionMarcador as ChildEvaluacionMarcador;
use \EvaluacionMarcadorQuery as ChildEvaluacionMarcadorQuery;
use \EvaluacionPregunta as ChildEvaluacionPregunta;
use \EvaluacionPreguntaQuery as ChildEvaluacionPreguntaQuery;
use \EvaluacionQuery as ChildEvaluacionQuery;
use \TEvaluacion as ChildTEvaluacion;
use \TEvaluacionQuery as ChildTEvaluacionQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\EvaluacionAplicadaTableMap;
use Map\EvaluacionMarcadorTableMap;
use Map\EvaluacionPreguntaTableMap;
use Map\EvaluacionTableMap;
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
 * Base class that represents a row from the 'evaluacion' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Evaluacion implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\EvaluacionTableMap';


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
     * The value for the eval_codigo field.
     *
     * @var        int
     */
    protected $eval_codigo;

    /**
     * The value for the eval_t_evaluacion field.
     *
     * @var        int
     */
    protected $eval_t_evaluacion;

    /**
     * The value for the eval_titulo field.
     *
     * @var        string
     */
    protected $eval_titulo;

    /**
     * The value for the eval_descripcion field.
     *
     * @var        string
     */
    protected $eval_descripcion;

    /**
     * The value for the eval_vigente field.
     *
     * @var        int
     */
    protected $eval_vigente;

    /**
     * The value for the eval_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $eval_r_fecha_creacion;

    /**
     * The value for the eval_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $eval_r_fecha_modificacion;

    /**
     * The value for the eval_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $eval_r_usuario;

    /**
     * @var        ChildTEvaluacion
     */
    protected $aTEvaluacion;

    /**
     * @var        ObjectCollection|ChildEvaluacionAplicada[] Collection to store aggregation of ChildEvaluacionAplicada objects.
     */
    protected $collEvaluacionAplicadas;
    protected $collEvaluacionAplicadasPartial;

    /**
     * @var        ObjectCollection|ChildEvaluacionMarcador[] Collection to store aggregation of ChildEvaluacionMarcador objects.
     */
    protected $collEvaluacionMarcadors;
    protected $collEvaluacionMarcadorsPartial;

    /**
     * @var        ObjectCollection|ChildEvaluacionPregunta[] Collection to store aggregation of ChildEvaluacionPregunta objects.
     */
    protected $collEvaluacionPreguntas;
    protected $collEvaluacionPreguntasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEvaluacionAplicada[]
     */
    protected $evaluacionAplicadasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEvaluacionMarcador[]
     */
    protected $evaluacionMarcadorsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEvaluacionPregunta[]
     */
    protected $evaluacionPreguntasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->eval_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Evaluacion object.
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
     * Compares this with another <code>Evaluacion</code> instance.  If
     * <code>obj</code> is an instance of <code>Evaluacion</code>, delegates to
     * <code>equals(Evaluacion)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Evaluacion The current object, for fluid interface
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
     * Get the [eval_codigo] column value.
     *
     * @return int
     */
    public function getEvalCodigo()
    {
        return $this->eval_codigo;
    }

    /**
     * Get the [eval_t_evaluacion] column value.
     *
     * @return int
     */
    public function getEvalTEvaluacion()
    {
        return $this->eval_t_evaluacion;
    }

    /**
     * Get the [eval_titulo] column value.
     *
     * @return string
     */
    public function getEvalTitulo()
    {
        return $this->eval_titulo;
    }

    /**
     * Get the [eval_descripcion] column value.
     *
     * @return string
     */
    public function getEvalDescripcion()
    {
        return $this->eval_descripcion;
    }

    /**
     * Get the [eval_vigente] column value.
     *
     * @return int
     */
    public function getEvalVigente()
    {
        return $this->eval_vigente;
    }

    /**
     * Get the [optionally formatted] temporal [eval_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEvalRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->eval_r_fecha_creacion;
        } else {
            return $this->eval_r_fecha_creacion instanceof \DateTimeInterface ? $this->eval_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [eval_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEvalRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->eval_r_fecha_modificacion;
        } else {
            return $this->eval_r_fecha_modificacion instanceof \DateTimeInterface ? $this->eval_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [eval_r_usuario] column value.
     *
     * @return int
     */
    public function getEvalRUsuario()
    {
        return $this->eval_r_usuario;
    }

    /**
     * Set the value of [eval_codigo] column.
     *
     * @param int $v new value
     * @return $this|\Evaluacion The current object (for fluent API support)
     */
    public function setEvalCodigo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->eval_codigo !== $v) {
            $this->eval_codigo = $v;
            $this->modifiedColumns[EvaluacionTableMap::COL_EVAL_CODIGO] = true;
        }

        return $this;
    } // setEvalCodigo()

    /**
     * Set the value of [eval_t_evaluacion] column.
     *
     * @param int $v new value
     * @return $this|\Evaluacion The current object (for fluent API support)
     */
    public function setEvalTEvaluacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->eval_t_evaluacion !== $v) {
            $this->eval_t_evaluacion = $v;
            $this->modifiedColumns[EvaluacionTableMap::COL_EVAL_T_EVALUACION] = true;
        }

        if ($this->aTEvaluacion !== null && $this->aTEvaluacion->getTevTipo() !== $v) {
            $this->aTEvaluacion = null;
        }

        return $this;
    } // setEvalTEvaluacion()

    /**
     * Set the value of [eval_titulo] column.
     *
     * @param string $v new value
     * @return $this|\Evaluacion The current object (for fluent API support)
     */
    public function setEvalTitulo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->eval_titulo !== $v) {
            $this->eval_titulo = $v;
            $this->modifiedColumns[EvaluacionTableMap::COL_EVAL_TITULO] = true;
        }

        return $this;
    } // setEvalTitulo()

    /**
     * Set the value of [eval_descripcion] column.
     *
     * @param string $v new value
     * @return $this|\Evaluacion The current object (for fluent API support)
     */
    public function setEvalDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->eval_descripcion !== $v) {
            $this->eval_descripcion = $v;
            $this->modifiedColumns[EvaluacionTableMap::COL_EVAL_DESCRIPCION] = true;
        }

        return $this;
    } // setEvalDescripcion()

    /**
     * Set the value of [eval_vigente] column.
     *
     * @param int $v new value
     * @return $this|\Evaluacion The current object (for fluent API support)
     */
    public function setEvalVigente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->eval_vigente !== $v) {
            $this->eval_vigente = $v;
            $this->modifiedColumns[EvaluacionTableMap::COL_EVAL_VIGENTE] = true;
        }

        return $this;
    } // setEvalVigente()

    /**
     * Sets the value of [eval_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Evaluacion The current object (for fluent API support)
     */
    public function setEvalRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->eval_r_fecha_creacion !== null || $dt !== null) {
            if ($this->eval_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->eval_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->eval_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EvaluacionTableMap::COL_EVAL_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setEvalRFechaCreacion()

    /**
     * Sets the value of [eval_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Evaluacion The current object (for fluent API support)
     */
    public function setEvalRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->eval_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->eval_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->eval_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->eval_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EvaluacionTableMap::COL_EVAL_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setEvalRFechaModificacion()

    /**
     * Set the value of [eval_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Evaluacion The current object (for fluent API support)
     */
    public function setEvalRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->eval_r_usuario !== $v) {
            $this->eval_r_usuario = $v;
            $this->modifiedColumns[EvaluacionTableMap::COL_EVAL_R_USUARIO] = true;
        }

        return $this;
    } // setEvalRUsuario()

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
            if ($this->eval_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EvaluacionTableMap::translateFieldName('EvalCodigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->eval_codigo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EvaluacionTableMap::translateFieldName('EvalTEvaluacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->eval_t_evaluacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EvaluacionTableMap::translateFieldName('EvalTitulo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->eval_titulo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EvaluacionTableMap::translateFieldName('EvalDescripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->eval_descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EvaluacionTableMap::translateFieldName('EvalVigente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->eval_vigente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EvaluacionTableMap::translateFieldName('EvalRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->eval_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EvaluacionTableMap::translateFieldName('EvalRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->eval_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EvaluacionTableMap::translateFieldName('EvalRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->eval_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = EvaluacionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Evaluacion'), 0, $e);
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
        if ($this->aTEvaluacion !== null && $this->eval_t_evaluacion !== $this->aTEvaluacion->getTevTipo()) {
            $this->aTEvaluacion = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(EvaluacionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEvaluacionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTEvaluacion = null;
            $this->collEvaluacionAplicadas = null;

            $this->collEvaluacionMarcadors = null;

            $this->collEvaluacionPreguntas = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Evaluacion::setDeleted()
     * @see Evaluacion::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEvaluacionQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionTableMap::DATABASE_NAME);
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
                EvaluacionTableMap::addInstanceToPool($this);
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

            if ($this->aTEvaluacion !== null) {
                if ($this->aTEvaluacion->isModified() || $this->aTEvaluacion->isNew()) {
                    $affectedRows += $this->aTEvaluacion->save($con);
                }
                $this->setTEvaluacion($this->aTEvaluacion);
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

            if ($this->evaluacionAplicadasScheduledForDeletion !== null) {
                if (!$this->evaluacionAplicadasScheduledForDeletion->isEmpty()) {
                    \EvaluacionAplicadaQuery::create()
                        ->filterByPrimaryKeys($this->evaluacionAplicadasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->evaluacionAplicadasScheduledForDeletion = null;
                }
            }

            if ($this->collEvaluacionAplicadas !== null) {
                foreach ($this->collEvaluacionAplicadas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->evaluacionMarcadorsScheduledForDeletion !== null) {
                if (!$this->evaluacionMarcadorsScheduledForDeletion->isEmpty()) {
                    \EvaluacionMarcadorQuery::create()
                        ->filterByPrimaryKeys($this->evaluacionMarcadorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->evaluacionMarcadorsScheduledForDeletion = null;
                }
            }

            if ($this->collEvaluacionMarcadors !== null) {
                foreach ($this->collEvaluacionMarcadors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->evaluacionPreguntasScheduledForDeletion !== null) {
                if (!$this->evaluacionPreguntasScheduledForDeletion->isEmpty()) {
                    \EvaluacionPreguntaQuery::create()
                        ->filterByPrimaryKeys($this->evaluacionPreguntasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->evaluacionPreguntasScheduledForDeletion = null;
                }
            }

            if ($this->collEvaluacionPreguntas !== null) {
                foreach ($this->collEvaluacionPreguntas as $referrerFK) {
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

        $this->modifiedColumns[EvaluacionTableMap::COL_EVAL_CODIGO] = true;
        if (null !== $this->eval_codigo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EvaluacionTableMap::COL_EVAL_CODIGO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'eval_codigo';
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_T_EVALUACION)) {
            $modifiedColumns[':p' . $index++]  = 'eval_t_evaluacion';
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_TITULO)) {
            $modifiedColumns[':p' . $index++]  = 'eval_titulo';
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'eval_descripcion';
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_VIGENTE)) {
            $modifiedColumns[':p' . $index++]  = 'eval_vigente';
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'eval_r_fecha_creacion';
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'eval_r_fecha_modificacion';
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'eval_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO evaluacion (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'eval_codigo':
                        $stmt->bindValue($identifier, $this->eval_codigo, PDO::PARAM_INT);
                        break;
                    case 'eval_t_evaluacion':
                        $stmt->bindValue($identifier, $this->eval_t_evaluacion, PDO::PARAM_INT);
                        break;
                    case 'eval_titulo':
                        $stmt->bindValue($identifier, $this->eval_titulo, PDO::PARAM_STR);
                        break;
                    case 'eval_descripcion':
                        $stmt->bindValue($identifier, $this->eval_descripcion, PDO::PARAM_STR);
                        break;
                    case 'eval_vigente':
                        $stmt->bindValue($identifier, $this->eval_vigente, PDO::PARAM_INT);
                        break;
                    case 'eval_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->eval_r_fecha_creacion ? $this->eval_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'eval_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->eval_r_fecha_modificacion ? $this->eval_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'eval_r_usuario':
                        $stmt->bindValue($identifier, $this->eval_r_usuario, PDO::PARAM_INT);
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
        $this->setEvalCodigo($pk);

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
        $pos = EvaluacionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getEvalCodigo();
                break;
            case 1:
                return $this->getEvalTEvaluacion();
                break;
            case 2:
                return $this->getEvalTitulo();
                break;
            case 3:
                return $this->getEvalDescripcion();
                break;
            case 4:
                return $this->getEvalVigente();
                break;
            case 5:
                return $this->getEvalRFechaCreacion();
                break;
            case 6:
                return $this->getEvalRFechaModificacion();
                break;
            case 7:
                return $this->getEvalRUsuario();
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

        if (isset($alreadyDumpedObjects['Evaluacion'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Evaluacion'][$this->hashCode()] = true;
        $keys = EvaluacionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getEvalCodigo(),
            $keys[1] => $this->getEvalTEvaluacion(),
            $keys[2] => $this->getEvalTitulo(),
            $keys[3] => $this->getEvalDescripcion(),
            $keys[4] => $this->getEvalVigente(),
            $keys[5] => $this->getEvalRFechaCreacion(),
            $keys[6] => $this->getEvalRFechaModificacion(),
            $keys[7] => $this->getEvalRUsuario(),
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
            if (null !== $this->aTEvaluacion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tEvaluacion';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_evaluacion';
                        break;
                    default:
                        $key = 'TEvaluacion';
                }

                $result[$key] = $this->aTEvaluacion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collEvaluacionAplicadas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'evaluacionAplicadas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'evaluacion_aplicadas';
                        break;
                    default:
                        $key = 'EvaluacionAplicadas';
                }

                $result[$key] = $this->collEvaluacionAplicadas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEvaluacionMarcadors) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'evaluacionMarcadors';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'evaluacion_marcadors';
                        break;
                    default:
                        $key = 'EvaluacionMarcadors';
                }

                $result[$key] = $this->collEvaluacionMarcadors->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEvaluacionPreguntas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'evaluacionPreguntas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'evaluacion_preguntas';
                        break;
                    default:
                        $key = 'EvaluacionPreguntas';
                }

                $result[$key] = $this->collEvaluacionPreguntas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Evaluacion
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EvaluacionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Evaluacion
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setEvalCodigo($value);
                break;
            case 1:
                $this->setEvalTEvaluacion($value);
                break;
            case 2:
                $this->setEvalTitulo($value);
                break;
            case 3:
                $this->setEvalDescripcion($value);
                break;
            case 4:
                $this->setEvalVigente($value);
                break;
            case 5:
                $this->setEvalRFechaCreacion($value);
                break;
            case 6:
                $this->setEvalRFechaModificacion($value);
                break;
            case 7:
                $this->setEvalRUsuario($value);
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
        $keys = EvaluacionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setEvalCodigo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setEvalTEvaluacion($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setEvalTitulo($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setEvalDescripcion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEvalVigente($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setEvalRFechaCreacion($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEvalRFechaModificacion($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setEvalRUsuario($arr[$keys[7]]);
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
     * @return $this|\Evaluacion The current object, for fluid interface
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
        $criteria = new Criteria(EvaluacionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_CODIGO)) {
            $criteria->add(EvaluacionTableMap::COL_EVAL_CODIGO, $this->eval_codigo);
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_T_EVALUACION)) {
            $criteria->add(EvaluacionTableMap::COL_EVAL_T_EVALUACION, $this->eval_t_evaluacion);
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_TITULO)) {
            $criteria->add(EvaluacionTableMap::COL_EVAL_TITULO, $this->eval_titulo);
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_DESCRIPCION)) {
            $criteria->add(EvaluacionTableMap::COL_EVAL_DESCRIPCION, $this->eval_descripcion);
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_VIGENTE)) {
            $criteria->add(EvaluacionTableMap::COL_EVAL_VIGENTE, $this->eval_vigente);
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_R_FECHA_CREACION)) {
            $criteria->add(EvaluacionTableMap::COL_EVAL_R_FECHA_CREACION, $this->eval_r_fecha_creacion);
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_R_FECHA_MODIFICACION)) {
            $criteria->add(EvaluacionTableMap::COL_EVAL_R_FECHA_MODIFICACION, $this->eval_r_fecha_modificacion);
        }
        if ($this->isColumnModified(EvaluacionTableMap::COL_EVAL_R_USUARIO)) {
            $criteria->add(EvaluacionTableMap::COL_EVAL_R_USUARIO, $this->eval_r_usuario);
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
        $criteria = ChildEvaluacionQuery::create();
        $criteria->add(EvaluacionTableMap::COL_EVAL_CODIGO, $this->eval_codigo);

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
        $validPk = null !== $this->getEvalCodigo();

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
        return $this->getEvalCodigo();
    }

    /**
     * Generic method to set the primary key (eval_codigo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setEvalCodigo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getEvalCodigo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Evaluacion (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEvalTEvaluacion($this->getEvalTEvaluacion());
        $copyObj->setEvalTitulo($this->getEvalTitulo());
        $copyObj->setEvalDescripcion($this->getEvalDescripcion());
        $copyObj->setEvalVigente($this->getEvalVigente());
        $copyObj->setEvalRFechaCreacion($this->getEvalRFechaCreacion());
        $copyObj->setEvalRFechaModificacion($this->getEvalRFechaModificacion());
        $copyObj->setEvalRUsuario($this->getEvalRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getEvaluacionAplicadas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEvaluacionAplicada($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEvaluacionMarcadors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEvaluacionMarcador($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEvaluacionPreguntas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEvaluacionPregunta($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setEvalCodigo(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Evaluacion Clone of current object.
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
     * Declares an association between this object and a ChildTEvaluacion object.
     *
     * @param  ChildTEvaluacion $v
     * @return $this|\Evaluacion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTEvaluacion(ChildTEvaluacion $v = null)
    {
        if ($v === null) {
            $this->setEvalTEvaluacion(NULL);
        } else {
            $this->setEvalTEvaluacion($v->getTevTipo());
        }

        $this->aTEvaluacion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTEvaluacion object, it will not be re-added.
        if ($v !== null) {
            $v->addEvaluacion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTEvaluacion object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTEvaluacion The associated ChildTEvaluacion object.
     * @throws PropelException
     */
    public function getTEvaluacion(ConnectionInterface $con = null)
    {
        if ($this->aTEvaluacion === null && ($this->eval_t_evaluacion != 0)) {
            $this->aTEvaluacion = ChildTEvaluacionQuery::create()->findPk($this->eval_t_evaluacion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTEvaluacion->addEvaluacions($this);
             */
        }

        return $this->aTEvaluacion;
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
        if ('EvaluacionAplicada' == $relationName) {
            $this->initEvaluacionAplicadas();
            return;
        }
        if ('EvaluacionMarcador' == $relationName) {
            $this->initEvaluacionMarcadors();
            return;
        }
        if ('EvaluacionPregunta' == $relationName) {
            $this->initEvaluacionPreguntas();
            return;
        }
    }

    /**
     * Clears out the collEvaluacionAplicadas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEvaluacionAplicadas()
     */
    public function clearEvaluacionAplicadas()
    {
        $this->collEvaluacionAplicadas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEvaluacionAplicadas collection loaded partially.
     */
    public function resetPartialEvaluacionAplicadas($v = true)
    {
        $this->collEvaluacionAplicadasPartial = $v;
    }

    /**
     * Initializes the collEvaluacionAplicadas collection.
     *
     * By default this just sets the collEvaluacionAplicadas collection to an empty array (like clearcollEvaluacionAplicadas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEvaluacionAplicadas($overrideExisting = true)
    {
        if (null !== $this->collEvaluacionAplicadas && !$overrideExisting) {
            return;
        }

        $collectionClassName = EvaluacionAplicadaTableMap::getTableMap()->getCollectionClassName();

        $this->collEvaluacionAplicadas = new $collectionClassName;
        $this->collEvaluacionAplicadas->setModel('\EvaluacionAplicada');
    }

    /**
     * Gets an array of ChildEvaluacionAplicada objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEvaluacion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEvaluacionAplicada[] List of ChildEvaluacionAplicada objects
     * @throws PropelException
     */
    public function getEvaluacionAplicadas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEvaluacionAplicadasPartial && !$this->isNew();
        if (null === $this->collEvaluacionAplicadas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEvaluacionAplicadas) {
                // return empty collection
                $this->initEvaluacionAplicadas();
            } else {
                $collEvaluacionAplicadas = ChildEvaluacionAplicadaQuery::create(null, $criteria)
                    ->filterByEvaluacion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEvaluacionAplicadasPartial && count($collEvaluacionAplicadas)) {
                        $this->initEvaluacionAplicadas(false);

                        foreach ($collEvaluacionAplicadas as $obj) {
                            if (false == $this->collEvaluacionAplicadas->contains($obj)) {
                                $this->collEvaluacionAplicadas->append($obj);
                            }
                        }

                        $this->collEvaluacionAplicadasPartial = true;
                    }

                    return $collEvaluacionAplicadas;
                }

                if ($partial && $this->collEvaluacionAplicadas) {
                    foreach ($this->collEvaluacionAplicadas as $obj) {
                        if ($obj->isNew()) {
                            $collEvaluacionAplicadas[] = $obj;
                        }
                    }
                }

                $this->collEvaluacionAplicadas = $collEvaluacionAplicadas;
                $this->collEvaluacionAplicadasPartial = false;
            }
        }

        return $this->collEvaluacionAplicadas;
    }

    /**
     * Sets a collection of ChildEvaluacionAplicada objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $evaluacionAplicadas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEvaluacion The current object (for fluent API support)
     */
    public function setEvaluacionAplicadas(Collection $evaluacionAplicadas, ConnectionInterface $con = null)
    {
        /** @var ChildEvaluacionAplicada[] $evaluacionAplicadasToDelete */
        $evaluacionAplicadasToDelete = $this->getEvaluacionAplicadas(new Criteria(), $con)->diff($evaluacionAplicadas);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->evaluacionAplicadasScheduledForDeletion = clone $evaluacionAplicadasToDelete;

        foreach ($evaluacionAplicadasToDelete as $evaluacionAplicadaRemoved) {
            $evaluacionAplicadaRemoved->setEvaluacion(null);
        }

        $this->collEvaluacionAplicadas = null;
        foreach ($evaluacionAplicadas as $evaluacionAplicada) {
            $this->addEvaluacionAplicada($evaluacionAplicada);
        }

        $this->collEvaluacionAplicadas = $evaluacionAplicadas;
        $this->collEvaluacionAplicadasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EvaluacionAplicada objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EvaluacionAplicada objects.
     * @throws PropelException
     */
    public function countEvaluacionAplicadas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEvaluacionAplicadasPartial && !$this->isNew();
        if (null === $this->collEvaluacionAplicadas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEvaluacionAplicadas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEvaluacionAplicadas());
            }

            $query = ChildEvaluacionAplicadaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEvaluacion($this)
                ->count($con);
        }

        return count($this->collEvaluacionAplicadas);
    }

    /**
     * Method called to associate a ChildEvaluacionAplicada object to this object
     * through the ChildEvaluacionAplicada foreign key attribute.
     *
     * @param  ChildEvaluacionAplicada $l ChildEvaluacionAplicada
     * @return $this|\Evaluacion The current object (for fluent API support)
     */
    public function addEvaluacionAplicada(ChildEvaluacionAplicada $l)
    {
        if ($this->collEvaluacionAplicadas === null) {
            $this->initEvaluacionAplicadas();
            $this->collEvaluacionAplicadasPartial = true;
        }

        if (!$this->collEvaluacionAplicadas->contains($l)) {
            $this->doAddEvaluacionAplicada($l);

            if ($this->evaluacionAplicadasScheduledForDeletion and $this->evaluacionAplicadasScheduledForDeletion->contains($l)) {
                $this->evaluacionAplicadasScheduledForDeletion->remove($this->evaluacionAplicadasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEvaluacionAplicada $evaluacionAplicada The ChildEvaluacionAplicada object to add.
     */
    protected function doAddEvaluacionAplicada(ChildEvaluacionAplicada $evaluacionAplicada)
    {
        $this->collEvaluacionAplicadas[]= $evaluacionAplicada;
        $evaluacionAplicada->setEvaluacion($this);
    }

    /**
     * @param  ChildEvaluacionAplicada $evaluacionAplicada The ChildEvaluacionAplicada object to remove.
     * @return $this|ChildEvaluacion The current object (for fluent API support)
     */
    public function removeEvaluacionAplicada(ChildEvaluacionAplicada $evaluacionAplicada)
    {
        if ($this->getEvaluacionAplicadas()->contains($evaluacionAplicada)) {
            $pos = $this->collEvaluacionAplicadas->search($evaluacionAplicada);
            $this->collEvaluacionAplicadas->remove($pos);
            if (null === $this->evaluacionAplicadasScheduledForDeletion) {
                $this->evaluacionAplicadasScheduledForDeletion = clone $this->collEvaluacionAplicadas;
                $this->evaluacionAplicadasScheduledForDeletion->clear();
            }
            $this->evaluacionAplicadasScheduledForDeletion[]= clone $evaluacionAplicada;
            $evaluacionAplicada->setEvaluacion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Evaluacion is new, it will return
     * an empty collection; or if this Evaluacion has previously
     * been saved, it will retrieve related EvaluacionAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Evaluacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEvaluacionAplicada[] List of ChildEvaluacionAplicada objects
     */
    public function getEvaluacionAplicadasJoinDictacion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEvaluacionAplicadaQuery::create(null, $criteria);
        $query->joinWith('Dictacion', $joinBehavior);

        return $this->getEvaluacionAplicadas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Evaluacion is new, it will return
     * an empty collection; or if this Evaluacion has previously
     * been saved, it will retrieve related EvaluacionAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Evaluacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEvaluacionAplicada[] List of ChildEvaluacionAplicada objects
     */
    public function getEvaluacionAplicadasJoinEEvaluacionAplicada(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEvaluacionAplicadaQuery::create(null, $criteria);
        $query->joinWith('EEvaluacionAplicada', $joinBehavior);

        return $this->getEvaluacionAplicadas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Evaluacion is new, it will return
     * an empty collection; or if this Evaluacion has previously
     * been saved, it will retrieve related EvaluacionAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Evaluacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEvaluacionAplicada[] List of ChildEvaluacionAplicada objects
     */
    public function getEvaluacionAplicadasJoinTEvaluacionAplicada(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEvaluacionAplicadaQuery::create(null, $criteria);
        $query->joinWith('TEvaluacionAplicada', $joinBehavior);

        return $this->getEvaluacionAplicadas($query, $con);
    }

    /**
     * Clears out the collEvaluacionMarcadors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEvaluacionMarcadors()
     */
    public function clearEvaluacionMarcadors()
    {
        $this->collEvaluacionMarcadors = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEvaluacionMarcadors collection loaded partially.
     */
    public function resetPartialEvaluacionMarcadors($v = true)
    {
        $this->collEvaluacionMarcadorsPartial = $v;
    }

    /**
     * Initializes the collEvaluacionMarcadors collection.
     *
     * By default this just sets the collEvaluacionMarcadors collection to an empty array (like clearcollEvaluacionMarcadors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEvaluacionMarcadors($overrideExisting = true)
    {
        if (null !== $this->collEvaluacionMarcadors && !$overrideExisting) {
            return;
        }

        $collectionClassName = EvaluacionMarcadorTableMap::getTableMap()->getCollectionClassName();

        $this->collEvaluacionMarcadors = new $collectionClassName;
        $this->collEvaluacionMarcadors->setModel('\EvaluacionMarcador');
    }

    /**
     * Gets an array of ChildEvaluacionMarcador objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEvaluacion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEvaluacionMarcador[] List of ChildEvaluacionMarcador objects
     * @throws PropelException
     */
    public function getEvaluacionMarcadors(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEvaluacionMarcadorsPartial && !$this->isNew();
        if (null === $this->collEvaluacionMarcadors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEvaluacionMarcadors) {
                // return empty collection
                $this->initEvaluacionMarcadors();
            } else {
                $collEvaluacionMarcadors = ChildEvaluacionMarcadorQuery::create(null, $criteria)
                    ->filterByEvaluacion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEvaluacionMarcadorsPartial && count($collEvaluacionMarcadors)) {
                        $this->initEvaluacionMarcadors(false);

                        foreach ($collEvaluacionMarcadors as $obj) {
                            if (false == $this->collEvaluacionMarcadors->contains($obj)) {
                                $this->collEvaluacionMarcadors->append($obj);
                            }
                        }

                        $this->collEvaluacionMarcadorsPartial = true;
                    }

                    return $collEvaluacionMarcadors;
                }

                if ($partial && $this->collEvaluacionMarcadors) {
                    foreach ($this->collEvaluacionMarcadors as $obj) {
                        if ($obj->isNew()) {
                            $collEvaluacionMarcadors[] = $obj;
                        }
                    }
                }

                $this->collEvaluacionMarcadors = $collEvaluacionMarcadors;
                $this->collEvaluacionMarcadorsPartial = false;
            }
        }

        return $this->collEvaluacionMarcadors;
    }

    /**
     * Sets a collection of ChildEvaluacionMarcador objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $evaluacionMarcadors A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEvaluacion The current object (for fluent API support)
     */
    public function setEvaluacionMarcadors(Collection $evaluacionMarcadors, ConnectionInterface $con = null)
    {
        /** @var ChildEvaluacionMarcador[] $evaluacionMarcadorsToDelete */
        $evaluacionMarcadorsToDelete = $this->getEvaluacionMarcadors(new Criteria(), $con)->diff($evaluacionMarcadors);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->evaluacionMarcadorsScheduledForDeletion = clone $evaluacionMarcadorsToDelete;

        foreach ($evaluacionMarcadorsToDelete as $evaluacionMarcadorRemoved) {
            $evaluacionMarcadorRemoved->setEvaluacion(null);
        }

        $this->collEvaluacionMarcadors = null;
        foreach ($evaluacionMarcadors as $evaluacionMarcador) {
            $this->addEvaluacionMarcador($evaluacionMarcador);
        }

        $this->collEvaluacionMarcadors = $evaluacionMarcadors;
        $this->collEvaluacionMarcadorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EvaluacionMarcador objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EvaluacionMarcador objects.
     * @throws PropelException
     */
    public function countEvaluacionMarcadors(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEvaluacionMarcadorsPartial && !$this->isNew();
        if (null === $this->collEvaluacionMarcadors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEvaluacionMarcadors) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEvaluacionMarcadors());
            }

            $query = ChildEvaluacionMarcadorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEvaluacion($this)
                ->count($con);
        }

        return count($this->collEvaluacionMarcadors);
    }

    /**
     * Method called to associate a ChildEvaluacionMarcador object to this object
     * through the ChildEvaluacionMarcador foreign key attribute.
     *
     * @param  ChildEvaluacionMarcador $l ChildEvaluacionMarcador
     * @return $this|\Evaluacion The current object (for fluent API support)
     */
    public function addEvaluacionMarcador(ChildEvaluacionMarcador $l)
    {
        if ($this->collEvaluacionMarcadors === null) {
            $this->initEvaluacionMarcadors();
            $this->collEvaluacionMarcadorsPartial = true;
        }

        if (!$this->collEvaluacionMarcadors->contains($l)) {
            $this->doAddEvaluacionMarcador($l);

            if ($this->evaluacionMarcadorsScheduledForDeletion and $this->evaluacionMarcadorsScheduledForDeletion->contains($l)) {
                $this->evaluacionMarcadorsScheduledForDeletion->remove($this->evaluacionMarcadorsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEvaluacionMarcador $evaluacionMarcador The ChildEvaluacionMarcador object to add.
     */
    protected function doAddEvaluacionMarcador(ChildEvaluacionMarcador $evaluacionMarcador)
    {
        $this->collEvaluacionMarcadors[]= $evaluacionMarcador;
        $evaluacionMarcador->setEvaluacion($this);
    }

    /**
     * @param  ChildEvaluacionMarcador $evaluacionMarcador The ChildEvaluacionMarcador object to remove.
     * @return $this|ChildEvaluacion The current object (for fluent API support)
     */
    public function removeEvaluacionMarcador(ChildEvaluacionMarcador $evaluacionMarcador)
    {
        if ($this->getEvaluacionMarcadors()->contains($evaluacionMarcador)) {
            $pos = $this->collEvaluacionMarcadors->search($evaluacionMarcador);
            $this->collEvaluacionMarcadors->remove($pos);
            if (null === $this->evaluacionMarcadorsScheduledForDeletion) {
                $this->evaluacionMarcadorsScheduledForDeletion = clone $this->collEvaluacionMarcadors;
                $this->evaluacionMarcadorsScheduledForDeletion->clear();
            }
            $this->evaluacionMarcadorsScheduledForDeletion[]= clone $evaluacionMarcador;
            $evaluacionMarcador->setEvaluacion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Evaluacion is new, it will return
     * an empty collection; or if this Evaluacion has previously
     * been saved, it will retrieve related EvaluacionMarcadors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Evaluacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEvaluacionMarcador[] List of ChildEvaluacionMarcador objects
     */
    public function getEvaluacionMarcadorsJoinMarcador(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEvaluacionMarcadorQuery::create(null, $criteria);
        $query->joinWith('Marcador', $joinBehavior);

        return $this->getEvaluacionMarcadors($query, $con);
    }

    /**
     * Clears out the collEvaluacionPreguntas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEvaluacionPreguntas()
     */
    public function clearEvaluacionPreguntas()
    {
        $this->collEvaluacionPreguntas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEvaluacionPreguntas collection loaded partially.
     */
    public function resetPartialEvaluacionPreguntas($v = true)
    {
        $this->collEvaluacionPreguntasPartial = $v;
    }

    /**
     * Initializes the collEvaluacionPreguntas collection.
     *
     * By default this just sets the collEvaluacionPreguntas collection to an empty array (like clearcollEvaluacionPreguntas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEvaluacionPreguntas($overrideExisting = true)
    {
        if (null !== $this->collEvaluacionPreguntas && !$overrideExisting) {
            return;
        }

        $collectionClassName = EvaluacionPreguntaTableMap::getTableMap()->getCollectionClassName();

        $this->collEvaluacionPreguntas = new $collectionClassName;
        $this->collEvaluacionPreguntas->setModel('\EvaluacionPregunta');
    }

    /**
     * Gets an array of ChildEvaluacionPregunta objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEvaluacion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEvaluacionPregunta[] List of ChildEvaluacionPregunta objects
     * @throws PropelException
     */
    public function getEvaluacionPreguntas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEvaluacionPreguntasPartial && !$this->isNew();
        if (null === $this->collEvaluacionPreguntas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEvaluacionPreguntas) {
                // return empty collection
                $this->initEvaluacionPreguntas();
            } else {
                $collEvaluacionPreguntas = ChildEvaluacionPreguntaQuery::create(null, $criteria)
                    ->filterByEvaluacion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEvaluacionPreguntasPartial && count($collEvaluacionPreguntas)) {
                        $this->initEvaluacionPreguntas(false);

                        foreach ($collEvaluacionPreguntas as $obj) {
                            if (false == $this->collEvaluacionPreguntas->contains($obj)) {
                                $this->collEvaluacionPreguntas->append($obj);
                            }
                        }

                        $this->collEvaluacionPreguntasPartial = true;
                    }

                    return $collEvaluacionPreguntas;
                }

                if ($partial && $this->collEvaluacionPreguntas) {
                    foreach ($this->collEvaluacionPreguntas as $obj) {
                        if ($obj->isNew()) {
                            $collEvaluacionPreguntas[] = $obj;
                        }
                    }
                }

                $this->collEvaluacionPreguntas = $collEvaluacionPreguntas;
                $this->collEvaluacionPreguntasPartial = false;
            }
        }

        return $this->collEvaluacionPreguntas;
    }

    /**
     * Sets a collection of ChildEvaluacionPregunta objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $evaluacionPreguntas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEvaluacion The current object (for fluent API support)
     */
    public function setEvaluacionPreguntas(Collection $evaluacionPreguntas, ConnectionInterface $con = null)
    {
        /** @var ChildEvaluacionPregunta[] $evaluacionPreguntasToDelete */
        $evaluacionPreguntasToDelete = $this->getEvaluacionPreguntas(new Criteria(), $con)->diff($evaluacionPreguntas);


        $this->evaluacionPreguntasScheduledForDeletion = $evaluacionPreguntasToDelete;

        foreach ($evaluacionPreguntasToDelete as $evaluacionPreguntaRemoved) {
            $evaluacionPreguntaRemoved->setEvaluacion(null);
        }

        $this->collEvaluacionPreguntas = null;
        foreach ($evaluacionPreguntas as $evaluacionPregunta) {
            $this->addEvaluacionPregunta($evaluacionPregunta);
        }

        $this->collEvaluacionPreguntas = $evaluacionPreguntas;
        $this->collEvaluacionPreguntasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EvaluacionPregunta objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EvaluacionPregunta objects.
     * @throws PropelException
     */
    public function countEvaluacionPreguntas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEvaluacionPreguntasPartial && !$this->isNew();
        if (null === $this->collEvaluacionPreguntas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEvaluacionPreguntas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEvaluacionPreguntas());
            }

            $query = ChildEvaluacionPreguntaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEvaluacion($this)
                ->count($con);
        }

        return count($this->collEvaluacionPreguntas);
    }

    /**
     * Method called to associate a ChildEvaluacionPregunta object to this object
     * through the ChildEvaluacionPregunta foreign key attribute.
     *
     * @param  ChildEvaluacionPregunta $l ChildEvaluacionPregunta
     * @return $this|\Evaluacion The current object (for fluent API support)
     */
    public function addEvaluacionPregunta(ChildEvaluacionPregunta $l)
    {
        if ($this->collEvaluacionPreguntas === null) {
            $this->initEvaluacionPreguntas();
            $this->collEvaluacionPreguntasPartial = true;
        }

        if (!$this->collEvaluacionPreguntas->contains($l)) {
            $this->doAddEvaluacionPregunta($l);

            if ($this->evaluacionPreguntasScheduledForDeletion and $this->evaluacionPreguntasScheduledForDeletion->contains($l)) {
                $this->evaluacionPreguntasScheduledForDeletion->remove($this->evaluacionPreguntasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEvaluacionPregunta $evaluacionPregunta The ChildEvaluacionPregunta object to add.
     */
    protected function doAddEvaluacionPregunta(ChildEvaluacionPregunta $evaluacionPregunta)
    {
        $this->collEvaluacionPreguntas[]= $evaluacionPregunta;
        $evaluacionPregunta->setEvaluacion($this);
    }

    /**
     * @param  ChildEvaluacionPregunta $evaluacionPregunta The ChildEvaluacionPregunta object to remove.
     * @return $this|ChildEvaluacion The current object (for fluent API support)
     */
    public function removeEvaluacionPregunta(ChildEvaluacionPregunta $evaluacionPregunta)
    {
        if ($this->getEvaluacionPreguntas()->contains($evaluacionPregunta)) {
            $pos = $this->collEvaluacionPreguntas->search($evaluacionPregunta);
            $this->collEvaluacionPreguntas->remove($pos);
            if (null === $this->evaluacionPreguntasScheduledForDeletion) {
                $this->evaluacionPreguntasScheduledForDeletion = clone $this->collEvaluacionPreguntas;
                $this->evaluacionPreguntasScheduledForDeletion->clear();
            }
            $this->evaluacionPreguntasScheduledForDeletion[]= clone $evaluacionPregunta;
            $evaluacionPregunta->setEvaluacion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Evaluacion is new, it will return
     * an empty collection; or if this Evaluacion has previously
     * been saved, it will retrieve related EvaluacionPreguntas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Evaluacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEvaluacionPregunta[] List of ChildEvaluacionPregunta objects
     */
    public function getEvaluacionPreguntasJoinObjetivo(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEvaluacionPreguntaQuery::create(null, $criteria);
        $query->joinWith('Objetivo', $joinBehavior);

        return $this->getEvaluacionPreguntas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Evaluacion is new, it will return
     * an empty collection; or if this Evaluacion has previously
     * been saved, it will retrieve related EvaluacionPreguntas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Evaluacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEvaluacionPregunta[] List of ChildEvaluacionPregunta objects
     */
    public function getEvaluacionPreguntasJoinPregunta(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEvaluacionPreguntaQuery::create(null, $criteria);
        $query->joinWith('Pregunta', $joinBehavior);

        return $this->getEvaluacionPreguntas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Evaluacion is new, it will return
     * an empty collection; or if this Evaluacion has previously
     * been saved, it will retrieve related EvaluacionPreguntas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Evaluacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEvaluacionPregunta[] List of ChildEvaluacionPregunta objects
     */
    public function getEvaluacionPreguntasJoinSeccion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEvaluacionPreguntaQuery::create(null, $criteria);
        $query->joinWith('Seccion', $joinBehavior);

        return $this->getEvaluacionPreguntas($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aTEvaluacion) {
            $this->aTEvaluacion->removeEvaluacion($this);
        }
        $this->eval_codigo = null;
        $this->eval_t_evaluacion = null;
        $this->eval_titulo = null;
        $this->eval_descripcion = null;
        $this->eval_vigente = null;
        $this->eval_r_fecha_creacion = null;
        $this->eval_r_fecha_modificacion = null;
        $this->eval_r_usuario = null;
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
            if ($this->collEvaluacionAplicadas) {
                foreach ($this->collEvaluacionAplicadas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEvaluacionMarcadors) {
                foreach ($this->collEvaluacionMarcadors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEvaluacionPreguntas) {
                foreach ($this->collEvaluacionPreguntas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collEvaluacionAplicadas = null;
        $this->collEvaluacionMarcadors = null;
        $this->collEvaluacionPreguntas = null;
        $this->aTEvaluacion = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EvaluacionTableMap::DEFAULT_STRING_FORMAT);
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
