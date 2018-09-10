<?php

namespace Base;

use \DetallePregunta as ChildDetallePregunta;
use \DetallePreguntaQuery as ChildDetallePreguntaQuery;
use \EvaluacionPregunta as ChildEvaluacionPregunta;
use \EvaluacionPreguntaQuery as ChildEvaluacionPreguntaQuery;
use \Pregunta as ChildPregunta;
use \PreguntaQuery as ChildPreguntaQuery;
use \RespuestaAplicada as ChildRespuestaAplicada;
use \RespuestaAplicadaQuery as ChildRespuestaAplicadaQuery;
use \TPregunta as ChildTPregunta;
use \TPreguntaQuery as ChildTPreguntaQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\DetallePreguntaTableMap;
use Map\EvaluacionPreguntaTableMap;
use Map\PreguntaTableMap;
use Map\RespuestaAplicadaTableMap;
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
 * Base class that represents a row from the 'pregunta' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Pregunta implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\PreguntaTableMap';


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
     * The value for the preg_codigo field.
     *
     * @var        int
     */
    protected $preg_codigo;

    /**
     * The value for the preg_t_pregunta field.
     *
     * @var        int
     */
    protected $preg_t_pregunta;

    /**
     * The value for the preg_contexto field.
     *
     * @var        string
     */
    protected $preg_contexto;

    /**
     * The value for the preg_descripcion field.
     *
     * @var        string
     */
    protected $preg_descripcion;

    /**
     * The value for the preg_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $preg_r_fecha_creacion;

    /**
     * The value for the preg_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $preg_r_fecha_modificacion;

    /**
     * The value for the preg_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $preg_r_usuario;

    /**
     * @var        ChildTPregunta
     */
    protected $aTPregunta;

    /**
     * @var        ObjectCollection|ChildDetallePregunta[] Collection to store aggregation of ChildDetallePregunta objects.
     */
    protected $collDetallePreguntas;
    protected $collDetallePreguntasPartial;

    /**
     * @var        ObjectCollection|ChildEvaluacionPregunta[] Collection to store aggregation of ChildEvaluacionPregunta objects.
     */
    protected $collEvaluacionPreguntas;
    protected $collEvaluacionPreguntasPartial;

    /**
     * @var        ObjectCollection|ChildRespuestaAplicada[] Collection to store aggregation of ChildRespuestaAplicada objects.
     */
    protected $collRespuestaAplicadas;
    protected $collRespuestaAplicadasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDetallePregunta[]
     */
    protected $detallePreguntasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEvaluacionPregunta[]
     */
    protected $evaluacionPreguntasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildRespuestaAplicada[]
     */
    protected $respuestaAplicadasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->preg_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Pregunta object.
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
     * Compares this with another <code>Pregunta</code> instance.  If
     * <code>obj</code> is an instance of <code>Pregunta</code>, delegates to
     * <code>equals(Pregunta)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Pregunta The current object, for fluid interface
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
     * Get the [preg_codigo] column value.
     *
     * @return int
     */
    public function getPregCodigo()
    {
        return $this->preg_codigo;
    }

    /**
     * Get the [preg_t_pregunta] column value.
     *
     * @return int
     */
    public function getPregTPregunta()
    {
        return $this->preg_t_pregunta;
    }

    /**
     * Get the [preg_contexto] column value.
     *
     * @return string
     */
    public function getPregContexto()
    {
        return $this->preg_contexto;
    }

    /**
     * Get the [preg_descripcion] column value.
     *
     * @return string
     */
    public function getPregDescripcion()
    {
        return $this->preg_descripcion;
    }

    /**
     * Get the [optionally formatted] temporal [preg_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPregRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->preg_r_fecha_creacion;
        } else {
            return $this->preg_r_fecha_creacion instanceof \DateTimeInterface ? $this->preg_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [preg_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPregRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->preg_r_fecha_modificacion;
        } else {
            return $this->preg_r_fecha_modificacion instanceof \DateTimeInterface ? $this->preg_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [preg_r_usuario] column value.
     *
     * @return int
     */
    public function getPregRUsuario()
    {
        return $this->preg_r_usuario;
    }

    /**
     * Set the value of [preg_codigo] column.
     *
     * @param int $v new value
     * @return $this|\Pregunta The current object (for fluent API support)
     */
    public function setPregCodigo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->preg_codigo !== $v) {
            $this->preg_codigo = $v;
            $this->modifiedColumns[PreguntaTableMap::COL_PREG_CODIGO] = true;
        }

        return $this;
    } // setPregCodigo()

    /**
     * Set the value of [preg_t_pregunta] column.
     *
     * @param int $v new value
     * @return $this|\Pregunta The current object (for fluent API support)
     */
    public function setPregTPregunta($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->preg_t_pregunta !== $v) {
            $this->preg_t_pregunta = $v;
            $this->modifiedColumns[PreguntaTableMap::COL_PREG_T_PREGUNTA] = true;
        }

        if ($this->aTPregunta !== null && $this->aTPregunta->getTpreTipo() !== $v) {
            $this->aTPregunta = null;
        }

        return $this;
    } // setPregTPregunta()

    /**
     * Set the value of [preg_contexto] column.
     *
     * @param string $v new value
     * @return $this|\Pregunta The current object (for fluent API support)
     */
    public function setPregContexto($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->preg_contexto !== $v) {
            $this->preg_contexto = $v;
            $this->modifiedColumns[PreguntaTableMap::COL_PREG_CONTEXTO] = true;
        }

        return $this;
    } // setPregContexto()

    /**
     * Set the value of [preg_descripcion] column.
     *
     * @param string $v new value
     * @return $this|\Pregunta The current object (for fluent API support)
     */
    public function setPregDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->preg_descripcion !== $v) {
            $this->preg_descripcion = $v;
            $this->modifiedColumns[PreguntaTableMap::COL_PREG_DESCRIPCION] = true;
        }

        return $this;
    } // setPregDescripcion()

    /**
     * Sets the value of [preg_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Pregunta The current object (for fluent API support)
     */
    public function setPregRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->preg_r_fecha_creacion !== null || $dt !== null) {
            if ($this->preg_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->preg_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->preg_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PreguntaTableMap::COL_PREG_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setPregRFechaCreacion()

    /**
     * Sets the value of [preg_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Pregunta The current object (for fluent API support)
     */
    public function setPregRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->preg_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->preg_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->preg_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->preg_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PreguntaTableMap::COL_PREG_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setPregRFechaModificacion()

    /**
     * Set the value of [preg_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Pregunta The current object (for fluent API support)
     */
    public function setPregRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->preg_r_usuario !== $v) {
            $this->preg_r_usuario = $v;
            $this->modifiedColumns[PreguntaTableMap::COL_PREG_R_USUARIO] = true;
        }

        return $this;
    } // setPregRUsuario()

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
            if ($this->preg_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PreguntaTableMap::translateFieldName('PregCodigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->preg_codigo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PreguntaTableMap::translateFieldName('PregTPregunta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->preg_t_pregunta = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PreguntaTableMap::translateFieldName('PregContexto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->preg_contexto = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PreguntaTableMap::translateFieldName('PregDescripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->preg_descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PreguntaTableMap::translateFieldName('PregRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->preg_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PreguntaTableMap::translateFieldName('PregRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->preg_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PreguntaTableMap::translateFieldName('PregRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->preg_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = PreguntaTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Pregunta'), 0, $e);
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
        if ($this->aTPregunta !== null && $this->preg_t_pregunta !== $this->aTPregunta->getTpreTipo()) {
            $this->aTPregunta = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(PreguntaTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPreguntaQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTPregunta = null;
            $this->collDetallePreguntas = null;

            $this->collEvaluacionPreguntas = null;

            $this->collRespuestaAplicadas = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Pregunta::setDeleted()
     * @see Pregunta::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PreguntaTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPreguntaQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PreguntaTableMap::DATABASE_NAME);
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
                PreguntaTableMap::addInstanceToPool($this);
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

            if ($this->aTPregunta !== null) {
                if ($this->aTPregunta->isModified() || $this->aTPregunta->isNew()) {
                    $affectedRows += $this->aTPregunta->save($con);
                }
                $this->setTPregunta($this->aTPregunta);
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

            if ($this->detallePreguntasScheduledForDeletion !== null) {
                if (!$this->detallePreguntasScheduledForDeletion->isEmpty()) {
                    \DetallePreguntaQuery::create()
                        ->filterByPrimaryKeys($this->detallePreguntasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->detallePreguntasScheduledForDeletion = null;
                }
            }

            if ($this->collDetallePreguntas !== null) {
                foreach ($this->collDetallePreguntas as $referrerFK) {
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

            if ($this->respuestaAplicadasScheduledForDeletion !== null) {
                if (!$this->respuestaAplicadasScheduledForDeletion->isEmpty()) {
                    \RespuestaAplicadaQuery::create()
                        ->filterByPrimaryKeys($this->respuestaAplicadasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->respuestaAplicadasScheduledForDeletion = null;
                }
            }

            if ($this->collRespuestaAplicadas !== null) {
                foreach ($this->collRespuestaAplicadas as $referrerFK) {
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

        $this->modifiedColumns[PreguntaTableMap::COL_PREG_CODIGO] = true;
        if (null !== $this->preg_codigo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PreguntaTableMap::COL_PREG_CODIGO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'preg_codigo';
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_T_PREGUNTA)) {
            $modifiedColumns[':p' . $index++]  = 'preg_t_pregunta';
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_CONTEXTO)) {
            $modifiedColumns[':p' . $index++]  = 'preg_contexto';
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'preg_descripcion';
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'preg_r_fecha_creacion';
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'preg_r_fecha_modificacion';
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'preg_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO pregunta (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'preg_codigo':
                        $stmt->bindValue($identifier, $this->preg_codigo, PDO::PARAM_INT);
                        break;
                    case 'preg_t_pregunta':
                        $stmt->bindValue($identifier, $this->preg_t_pregunta, PDO::PARAM_INT);
                        break;
                    case 'preg_contexto':
                        $stmt->bindValue($identifier, $this->preg_contexto, PDO::PARAM_STR);
                        break;
                    case 'preg_descripcion':
                        $stmt->bindValue($identifier, $this->preg_descripcion, PDO::PARAM_STR);
                        break;
                    case 'preg_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->preg_r_fecha_creacion ? $this->preg_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'preg_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->preg_r_fecha_modificacion ? $this->preg_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'preg_r_usuario':
                        $stmt->bindValue($identifier, $this->preg_r_usuario, PDO::PARAM_INT);
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
        $this->setPregCodigo($pk);

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
        $pos = PreguntaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getPregCodigo();
                break;
            case 1:
                return $this->getPregTPregunta();
                break;
            case 2:
                return $this->getPregContexto();
                break;
            case 3:
                return $this->getPregDescripcion();
                break;
            case 4:
                return $this->getPregRFechaCreacion();
                break;
            case 5:
                return $this->getPregRFechaModificacion();
                break;
            case 6:
                return $this->getPregRUsuario();
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

        if (isset($alreadyDumpedObjects['Pregunta'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Pregunta'][$this->hashCode()] = true;
        $keys = PreguntaTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPregCodigo(),
            $keys[1] => $this->getPregTPregunta(),
            $keys[2] => $this->getPregContexto(),
            $keys[3] => $this->getPregDescripcion(),
            $keys[4] => $this->getPregRFechaCreacion(),
            $keys[5] => $this->getPregRFechaModificacion(),
            $keys[6] => $this->getPregRUsuario(),
        );
        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        if ($result[$keys[5]] instanceof \DateTimeInterface) {
            $result[$keys[5]] = $result[$keys[5]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aTPregunta) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tPregunta';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_pregunta';
                        break;
                    default:
                        $key = 'TPregunta';
                }

                $result[$key] = $this->aTPregunta->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDetallePreguntas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'detallePreguntas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'detalle_preguntas';
                        break;
                    default:
                        $key = 'DetallePreguntas';
                }

                $result[$key] = $this->collDetallePreguntas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collRespuestaAplicadas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'respuestaAplicadas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'respuesta_aplicadas';
                        break;
                    default:
                        $key = 'RespuestaAplicadas';
                }

                $result[$key] = $this->collRespuestaAplicadas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Pregunta
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PreguntaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Pregunta
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setPregCodigo($value);
                break;
            case 1:
                $this->setPregTPregunta($value);
                break;
            case 2:
                $this->setPregContexto($value);
                break;
            case 3:
                $this->setPregDescripcion($value);
                break;
            case 4:
                $this->setPregRFechaCreacion($value);
                break;
            case 5:
                $this->setPregRFechaModificacion($value);
                break;
            case 6:
                $this->setPregRUsuario($value);
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
        $keys = PreguntaTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setPregCodigo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setPregTPregunta($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPregContexto($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPregDescripcion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPregRFechaCreacion($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPregRFechaModificacion($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPregRUsuario($arr[$keys[6]]);
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
     * @return $this|\Pregunta The current object, for fluid interface
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
        $criteria = new Criteria(PreguntaTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_CODIGO)) {
            $criteria->add(PreguntaTableMap::COL_PREG_CODIGO, $this->preg_codigo);
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_T_PREGUNTA)) {
            $criteria->add(PreguntaTableMap::COL_PREG_T_PREGUNTA, $this->preg_t_pregunta);
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_CONTEXTO)) {
            $criteria->add(PreguntaTableMap::COL_PREG_CONTEXTO, $this->preg_contexto);
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_DESCRIPCION)) {
            $criteria->add(PreguntaTableMap::COL_PREG_DESCRIPCION, $this->preg_descripcion);
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_R_FECHA_CREACION)) {
            $criteria->add(PreguntaTableMap::COL_PREG_R_FECHA_CREACION, $this->preg_r_fecha_creacion);
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_R_FECHA_MODIFICACION)) {
            $criteria->add(PreguntaTableMap::COL_PREG_R_FECHA_MODIFICACION, $this->preg_r_fecha_modificacion);
        }
        if ($this->isColumnModified(PreguntaTableMap::COL_PREG_R_USUARIO)) {
            $criteria->add(PreguntaTableMap::COL_PREG_R_USUARIO, $this->preg_r_usuario);
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
        $criteria = ChildPreguntaQuery::create();
        $criteria->add(PreguntaTableMap::COL_PREG_CODIGO, $this->preg_codigo);

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
        $validPk = null !== $this->getPregCodigo();

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
        return $this->getPregCodigo();
    }

    /**
     * Generic method to set the primary key (preg_codigo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPregCodigo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getPregCodigo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Pregunta (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPregTPregunta($this->getPregTPregunta());
        $copyObj->setPregContexto($this->getPregContexto());
        $copyObj->setPregDescripcion($this->getPregDescripcion());
        $copyObj->setPregRFechaCreacion($this->getPregRFechaCreacion());
        $copyObj->setPregRFechaModificacion($this->getPregRFechaModificacion());
        $copyObj->setPregRUsuario($this->getPregRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getDetallePreguntas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDetallePregunta($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEvaluacionPreguntas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEvaluacionPregunta($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRespuestaAplicadas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRespuestaAplicada($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPregCodigo(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Pregunta Clone of current object.
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
     * Declares an association between this object and a ChildTPregunta object.
     *
     * @param  ChildTPregunta $v
     * @return $this|\Pregunta The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTPregunta(ChildTPregunta $v = null)
    {
        if ($v === null) {
            $this->setPregTPregunta(NULL);
        } else {
            $this->setPregTPregunta($v->getTpreTipo());
        }

        $this->aTPregunta = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTPregunta object, it will not be re-added.
        if ($v !== null) {
            $v->addPregunta($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTPregunta object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTPregunta The associated ChildTPregunta object.
     * @throws PropelException
     */
    public function getTPregunta(ConnectionInterface $con = null)
    {
        if ($this->aTPregunta === null && ($this->preg_t_pregunta != 0)) {
            $this->aTPregunta = ChildTPreguntaQuery::create()->findPk($this->preg_t_pregunta, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTPregunta->addPreguntas($this);
             */
        }

        return $this->aTPregunta;
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
        if ('DetallePregunta' == $relationName) {
            $this->initDetallePreguntas();
            return;
        }
        if ('EvaluacionPregunta' == $relationName) {
            $this->initEvaluacionPreguntas();
            return;
        }
        if ('RespuestaAplicada' == $relationName) {
            $this->initRespuestaAplicadas();
            return;
        }
    }

    /**
     * Clears out the collDetallePreguntas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDetallePreguntas()
     */
    public function clearDetallePreguntas()
    {
        $this->collDetallePreguntas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDetallePreguntas collection loaded partially.
     */
    public function resetPartialDetallePreguntas($v = true)
    {
        $this->collDetallePreguntasPartial = $v;
    }

    /**
     * Initializes the collDetallePreguntas collection.
     *
     * By default this just sets the collDetallePreguntas collection to an empty array (like clearcollDetallePreguntas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDetallePreguntas($overrideExisting = true)
    {
        if (null !== $this->collDetallePreguntas && !$overrideExisting) {
            return;
        }

        $collectionClassName = DetallePreguntaTableMap::getTableMap()->getCollectionClassName();

        $this->collDetallePreguntas = new $collectionClassName;
        $this->collDetallePreguntas->setModel('\DetallePregunta');
    }

    /**
     * Gets an array of ChildDetallePregunta objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPregunta is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDetallePregunta[] List of ChildDetallePregunta objects
     * @throws PropelException
     */
    public function getDetallePreguntas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDetallePreguntasPartial && !$this->isNew();
        if (null === $this->collDetallePreguntas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDetallePreguntas) {
                // return empty collection
                $this->initDetallePreguntas();
            } else {
                $collDetallePreguntas = ChildDetallePreguntaQuery::create(null, $criteria)
                    ->filterByPregunta($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDetallePreguntasPartial && count($collDetallePreguntas)) {
                        $this->initDetallePreguntas(false);

                        foreach ($collDetallePreguntas as $obj) {
                            if (false == $this->collDetallePreguntas->contains($obj)) {
                                $this->collDetallePreguntas->append($obj);
                            }
                        }

                        $this->collDetallePreguntasPartial = true;
                    }

                    return $collDetallePreguntas;
                }

                if ($partial && $this->collDetallePreguntas) {
                    foreach ($this->collDetallePreguntas as $obj) {
                        if ($obj->isNew()) {
                            $collDetallePreguntas[] = $obj;
                        }
                    }
                }

                $this->collDetallePreguntas = $collDetallePreguntas;
                $this->collDetallePreguntasPartial = false;
            }
        }

        return $this->collDetallePreguntas;
    }

    /**
     * Sets a collection of ChildDetallePregunta objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $detallePreguntas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPregunta The current object (for fluent API support)
     */
    public function setDetallePreguntas(Collection $detallePreguntas, ConnectionInterface $con = null)
    {
        /** @var ChildDetallePregunta[] $detallePreguntasToDelete */
        $detallePreguntasToDelete = $this->getDetallePreguntas(new Criteria(), $con)->diff($detallePreguntas);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->detallePreguntasScheduledForDeletion = clone $detallePreguntasToDelete;

        foreach ($detallePreguntasToDelete as $detallePreguntaRemoved) {
            $detallePreguntaRemoved->setPregunta(null);
        }

        $this->collDetallePreguntas = null;
        foreach ($detallePreguntas as $detallePregunta) {
            $this->addDetallePregunta($detallePregunta);
        }

        $this->collDetallePreguntas = $detallePreguntas;
        $this->collDetallePreguntasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DetallePregunta objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DetallePregunta objects.
     * @throws PropelException
     */
    public function countDetallePreguntas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDetallePreguntasPartial && !$this->isNew();
        if (null === $this->collDetallePreguntas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDetallePreguntas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDetallePreguntas());
            }

            $query = ChildDetallePreguntaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPregunta($this)
                ->count($con);
        }

        return count($this->collDetallePreguntas);
    }

    /**
     * Method called to associate a ChildDetallePregunta object to this object
     * through the ChildDetallePregunta foreign key attribute.
     *
     * @param  ChildDetallePregunta $l ChildDetallePregunta
     * @return $this|\Pregunta The current object (for fluent API support)
     */
    public function addDetallePregunta(ChildDetallePregunta $l)
    {
        if ($this->collDetallePreguntas === null) {
            $this->initDetallePreguntas();
            $this->collDetallePreguntasPartial = true;
        }

        if (!$this->collDetallePreguntas->contains($l)) {
            $this->doAddDetallePregunta($l);

            if ($this->detallePreguntasScheduledForDeletion and $this->detallePreguntasScheduledForDeletion->contains($l)) {
                $this->detallePreguntasScheduledForDeletion->remove($this->detallePreguntasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDetallePregunta $detallePregunta The ChildDetallePregunta object to add.
     */
    protected function doAddDetallePregunta(ChildDetallePregunta $detallePregunta)
    {
        $this->collDetallePreguntas[]= $detallePregunta;
        $detallePregunta->setPregunta($this);
    }

    /**
     * @param  ChildDetallePregunta $detallePregunta The ChildDetallePregunta object to remove.
     * @return $this|ChildPregunta The current object (for fluent API support)
     */
    public function removeDetallePregunta(ChildDetallePregunta $detallePregunta)
    {
        if ($this->getDetallePreguntas()->contains($detallePregunta)) {
            $pos = $this->collDetallePreguntas->search($detallePregunta);
            $this->collDetallePreguntas->remove($pos);
            if (null === $this->detallePreguntasScheduledForDeletion) {
                $this->detallePreguntasScheduledForDeletion = clone $this->collDetallePreguntas;
                $this->detallePreguntasScheduledForDeletion->clear();
            }
            $this->detallePreguntasScheduledForDeletion[]= clone $detallePregunta;
            $detallePregunta->setPregunta(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pregunta is new, it will return
     * an empty collection; or if this Pregunta has previously
     * been saved, it will retrieve related DetallePreguntas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pregunta.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDetallePregunta[] List of ChildDetallePregunta objects
     */
    public function getDetallePreguntasJoinOpcionPregunta(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDetallePreguntaQuery::create(null, $criteria);
        $query->joinWith('OpcionPregunta', $joinBehavior);

        return $this->getDetallePreguntas($query, $con);
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
     * If this ChildPregunta is new, it will return
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
                    ->filterByPregunta($this)
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
     * @return $this|ChildPregunta The current object (for fluent API support)
     */
    public function setEvaluacionPreguntas(Collection $evaluacionPreguntas, ConnectionInterface $con = null)
    {
        /** @var ChildEvaluacionPregunta[] $evaluacionPreguntasToDelete */
        $evaluacionPreguntasToDelete = $this->getEvaluacionPreguntas(new Criteria(), $con)->diff($evaluacionPreguntas);


        $this->evaluacionPreguntasScheduledForDeletion = $evaluacionPreguntasToDelete;

        foreach ($evaluacionPreguntasToDelete as $evaluacionPreguntaRemoved) {
            $evaluacionPreguntaRemoved->setPregunta(null);
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
                ->filterByPregunta($this)
                ->count($con);
        }

        return count($this->collEvaluacionPreguntas);
    }

    /**
     * Method called to associate a ChildEvaluacionPregunta object to this object
     * through the ChildEvaluacionPregunta foreign key attribute.
     *
     * @param  ChildEvaluacionPregunta $l ChildEvaluacionPregunta
     * @return $this|\Pregunta The current object (for fluent API support)
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
        $evaluacionPregunta->setPregunta($this);
    }

    /**
     * @param  ChildEvaluacionPregunta $evaluacionPregunta The ChildEvaluacionPregunta object to remove.
     * @return $this|ChildPregunta The current object (for fluent API support)
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
            $evaluacionPregunta->setPregunta(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pregunta is new, it will return
     * an empty collection; or if this Pregunta has previously
     * been saved, it will retrieve related EvaluacionPreguntas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pregunta.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEvaluacionPregunta[] List of ChildEvaluacionPregunta objects
     */
    public function getEvaluacionPreguntasJoinEvaluacion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEvaluacionPreguntaQuery::create(null, $criteria);
        $query->joinWith('Evaluacion', $joinBehavior);

        return $this->getEvaluacionPreguntas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pregunta is new, it will return
     * an empty collection; or if this Pregunta has previously
     * been saved, it will retrieve related EvaluacionPreguntas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pregunta.
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
     * Otherwise if this Pregunta is new, it will return
     * an empty collection; or if this Pregunta has previously
     * been saved, it will retrieve related EvaluacionPreguntas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pregunta.
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
     * Clears out the collRespuestaAplicadas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRespuestaAplicadas()
     */
    public function clearRespuestaAplicadas()
    {
        $this->collRespuestaAplicadas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collRespuestaAplicadas collection loaded partially.
     */
    public function resetPartialRespuestaAplicadas($v = true)
    {
        $this->collRespuestaAplicadasPartial = $v;
    }

    /**
     * Initializes the collRespuestaAplicadas collection.
     *
     * By default this just sets the collRespuestaAplicadas collection to an empty array (like clearcollRespuestaAplicadas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRespuestaAplicadas($overrideExisting = true)
    {
        if (null !== $this->collRespuestaAplicadas && !$overrideExisting) {
            return;
        }

        $collectionClassName = RespuestaAplicadaTableMap::getTableMap()->getCollectionClassName();

        $this->collRespuestaAplicadas = new $collectionClassName;
        $this->collRespuestaAplicadas->setModel('\RespuestaAplicada');
    }

    /**
     * Gets an array of ChildRespuestaAplicada objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPregunta is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildRespuestaAplicada[] List of ChildRespuestaAplicada objects
     * @throws PropelException
     */
    public function getRespuestaAplicadas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collRespuestaAplicadasPartial && !$this->isNew();
        if (null === $this->collRespuestaAplicadas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRespuestaAplicadas) {
                // return empty collection
                $this->initRespuestaAplicadas();
            } else {
                $collRespuestaAplicadas = ChildRespuestaAplicadaQuery::create(null, $criteria)
                    ->filterByPregunta($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collRespuestaAplicadasPartial && count($collRespuestaAplicadas)) {
                        $this->initRespuestaAplicadas(false);

                        foreach ($collRespuestaAplicadas as $obj) {
                            if (false == $this->collRespuestaAplicadas->contains($obj)) {
                                $this->collRespuestaAplicadas->append($obj);
                            }
                        }

                        $this->collRespuestaAplicadasPartial = true;
                    }

                    return $collRespuestaAplicadas;
                }

                if ($partial && $this->collRespuestaAplicadas) {
                    foreach ($this->collRespuestaAplicadas as $obj) {
                        if ($obj->isNew()) {
                            $collRespuestaAplicadas[] = $obj;
                        }
                    }
                }

                $this->collRespuestaAplicadas = $collRespuestaAplicadas;
                $this->collRespuestaAplicadasPartial = false;
            }
        }

        return $this->collRespuestaAplicadas;
    }

    /**
     * Sets a collection of ChildRespuestaAplicada objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $respuestaAplicadas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPregunta The current object (for fluent API support)
     */
    public function setRespuestaAplicadas(Collection $respuestaAplicadas, ConnectionInterface $con = null)
    {
        /** @var ChildRespuestaAplicada[] $respuestaAplicadasToDelete */
        $respuestaAplicadasToDelete = $this->getRespuestaAplicadas(new Criteria(), $con)->diff($respuestaAplicadas);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->respuestaAplicadasScheduledForDeletion = clone $respuestaAplicadasToDelete;

        foreach ($respuestaAplicadasToDelete as $respuestaAplicadaRemoved) {
            $respuestaAplicadaRemoved->setPregunta(null);
        }

        $this->collRespuestaAplicadas = null;
        foreach ($respuestaAplicadas as $respuestaAplicada) {
            $this->addRespuestaAplicada($respuestaAplicada);
        }

        $this->collRespuestaAplicadas = $respuestaAplicadas;
        $this->collRespuestaAplicadasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RespuestaAplicada objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related RespuestaAplicada objects.
     * @throws PropelException
     */
    public function countRespuestaAplicadas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collRespuestaAplicadasPartial && !$this->isNew();
        if (null === $this->collRespuestaAplicadas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRespuestaAplicadas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getRespuestaAplicadas());
            }

            $query = ChildRespuestaAplicadaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPregunta($this)
                ->count($con);
        }

        return count($this->collRespuestaAplicadas);
    }

    /**
     * Method called to associate a ChildRespuestaAplicada object to this object
     * through the ChildRespuestaAplicada foreign key attribute.
     *
     * @param  ChildRespuestaAplicada $l ChildRespuestaAplicada
     * @return $this|\Pregunta The current object (for fluent API support)
     */
    public function addRespuestaAplicada(ChildRespuestaAplicada $l)
    {
        if ($this->collRespuestaAplicadas === null) {
            $this->initRespuestaAplicadas();
            $this->collRespuestaAplicadasPartial = true;
        }

        if (!$this->collRespuestaAplicadas->contains($l)) {
            $this->doAddRespuestaAplicada($l);

            if ($this->respuestaAplicadasScheduledForDeletion and $this->respuestaAplicadasScheduledForDeletion->contains($l)) {
                $this->respuestaAplicadasScheduledForDeletion->remove($this->respuestaAplicadasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildRespuestaAplicada $respuestaAplicada The ChildRespuestaAplicada object to add.
     */
    protected function doAddRespuestaAplicada(ChildRespuestaAplicada $respuestaAplicada)
    {
        $this->collRespuestaAplicadas[]= $respuestaAplicada;
        $respuestaAplicada->setPregunta($this);
    }

    /**
     * @param  ChildRespuestaAplicada $respuestaAplicada The ChildRespuestaAplicada object to remove.
     * @return $this|ChildPregunta The current object (for fluent API support)
     */
    public function removeRespuestaAplicada(ChildRespuestaAplicada $respuestaAplicada)
    {
        if ($this->getRespuestaAplicadas()->contains($respuestaAplicada)) {
            $pos = $this->collRespuestaAplicadas->search($respuestaAplicada);
            $this->collRespuestaAplicadas->remove($pos);
            if (null === $this->respuestaAplicadasScheduledForDeletion) {
                $this->respuestaAplicadasScheduledForDeletion = clone $this->collRespuestaAplicadas;
                $this->respuestaAplicadasScheduledForDeletion->clear();
            }
            $this->respuestaAplicadasScheduledForDeletion[]= clone $respuestaAplicada;
            $respuestaAplicada->setPregunta(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pregunta is new, it will return
     * an empty collection; or if this Pregunta has previously
     * been saved, it will retrieve related RespuestaAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pregunta.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildRespuestaAplicada[] List of ChildRespuestaAplicada objects
     */
    public function getRespuestaAplicadasJoinERespuestaAplicada(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildRespuestaAplicadaQuery::create(null, $criteria);
        $query->joinWith('ERespuestaAplicada', $joinBehavior);

        return $this->getRespuestaAplicadas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pregunta is new, it will return
     * an empty collection; or if this Pregunta has previously
     * been saved, it will retrieve related RespuestaAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pregunta.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildRespuestaAplicada[] List of ChildRespuestaAplicada objects
     */
    public function getRespuestaAplicadasJoinInscripcionEvaluacionAplicada(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildRespuestaAplicadaQuery::create(null, $criteria);
        $query->joinWith('InscripcionEvaluacionAplicada', $joinBehavior);

        return $this->getRespuestaAplicadas($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aTPregunta) {
            $this->aTPregunta->removePregunta($this);
        }
        $this->preg_codigo = null;
        $this->preg_t_pregunta = null;
        $this->preg_contexto = null;
        $this->preg_descripcion = null;
        $this->preg_r_fecha_creacion = null;
        $this->preg_r_fecha_modificacion = null;
        $this->preg_r_usuario = null;
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
            if ($this->collDetallePreguntas) {
                foreach ($this->collDetallePreguntas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEvaluacionPreguntas) {
                foreach ($this->collEvaluacionPreguntas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRespuestaAplicadas) {
                foreach ($this->collRespuestaAplicadas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collDetallePreguntas = null;
        $this->collEvaluacionPreguntas = null;
        $this->collRespuestaAplicadas = null;
        $this->aTPregunta = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PreguntaTableMap::DEFAULT_STRING_FORMAT);
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
