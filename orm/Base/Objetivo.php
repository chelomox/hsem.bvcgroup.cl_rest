<?php

namespace Base;

use \ActividadObjetivo as ChildActividadObjetivo;
use \ActividadObjetivoQuery as ChildActividadObjetivoQuery;
use \EvaluacionPregunta as ChildEvaluacionPregunta;
use \EvaluacionPreguntaQuery as ChildEvaluacionPreguntaQuery;
use \Objetivo as ChildObjetivo;
use \ObjetivoQuery as ChildObjetivoQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ActividadObjetivoTableMap;
use Map\EvaluacionPreguntaTableMap;
use Map\ObjetivoTableMap;
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
 * Base class that represents a row from the 'objetivo' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Objetivo implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ObjetivoTableMap';


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
     * The value for the obje_codigo field.
     *
     * @var        int
     */
    protected $obje_codigo;

    /**
     * The value for the obje_sigla field.
     *
     * @var        string
     */
    protected $obje_sigla;

    /**
     * The value for the obje_descripcion field.
     *
     * @var        string
     */
    protected $obje_descripcion;

    /**
     * The value for the obje_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $obje_r_fecha_creacion;

    /**
     * The value for the obje_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $obje_r_fecha_modificacion;

    /**
     * The value for the obje_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $obje_r_usuario;

    /**
     * @var        ObjectCollection|ChildActividadObjetivo[] Collection to store aggregation of ChildActividadObjetivo objects.
     */
    protected $collActividadObjetivos;
    protected $collActividadObjetivosPartial;

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
     * @var ObjectCollection|ChildActividadObjetivo[]
     */
    protected $actividadObjetivosScheduledForDeletion = null;

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
        $this->obje_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Objetivo object.
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
     * Compares this with another <code>Objetivo</code> instance.  If
     * <code>obj</code> is an instance of <code>Objetivo</code>, delegates to
     * <code>equals(Objetivo)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Objetivo The current object, for fluid interface
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
     * Get the [obje_codigo] column value.
     *
     * @return int
     */
    public function getObjeCodigo()
    {
        return $this->obje_codigo;
    }

    /**
     * Get the [obje_sigla] column value.
     *
     * @return string
     */
    public function getObjeSigla()
    {
        return $this->obje_sigla;
    }

    /**
     * Get the [obje_descripcion] column value.
     *
     * @return string
     */
    public function getObjeDescripcion()
    {
        return $this->obje_descripcion;
    }

    /**
     * Get the [optionally formatted] temporal [obje_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getObjeRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->obje_r_fecha_creacion;
        } else {
            return $this->obje_r_fecha_creacion instanceof \DateTimeInterface ? $this->obje_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [obje_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getObjeRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->obje_r_fecha_modificacion;
        } else {
            return $this->obje_r_fecha_modificacion instanceof \DateTimeInterface ? $this->obje_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [obje_r_usuario] column value.
     *
     * @return int
     */
    public function getObjeRUsuario()
    {
        return $this->obje_r_usuario;
    }

    /**
     * Set the value of [obje_codigo] column.
     *
     * @param int $v new value
     * @return $this|\Objetivo The current object (for fluent API support)
     */
    public function setObjeCodigo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->obje_codigo !== $v) {
            $this->obje_codigo = $v;
            $this->modifiedColumns[ObjetivoTableMap::COL_OBJE_CODIGO] = true;
        }

        return $this;
    } // setObjeCodigo()

    /**
     * Set the value of [obje_sigla] column.
     *
     * @param string $v new value
     * @return $this|\Objetivo The current object (for fluent API support)
     */
    public function setObjeSigla($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->obje_sigla !== $v) {
            $this->obje_sigla = $v;
            $this->modifiedColumns[ObjetivoTableMap::COL_OBJE_SIGLA] = true;
        }

        return $this;
    } // setObjeSigla()

    /**
     * Set the value of [obje_descripcion] column.
     *
     * @param string $v new value
     * @return $this|\Objetivo The current object (for fluent API support)
     */
    public function setObjeDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->obje_descripcion !== $v) {
            $this->obje_descripcion = $v;
            $this->modifiedColumns[ObjetivoTableMap::COL_OBJE_DESCRIPCION] = true;
        }

        return $this;
    } // setObjeDescripcion()

    /**
     * Sets the value of [obje_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Objetivo The current object (for fluent API support)
     */
    public function setObjeRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->obje_r_fecha_creacion !== null || $dt !== null) {
            if ($this->obje_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->obje_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->obje_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ObjetivoTableMap::COL_OBJE_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setObjeRFechaCreacion()

    /**
     * Sets the value of [obje_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Objetivo The current object (for fluent API support)
     */
    public function setObjeRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->obje_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->obje_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->obje_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->obje_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ObjetivoTableMap::COL_OBJE_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setObjeRFechaModificacion()

    /**
     * Set the value of [obje_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Objetivo The current object (for fluent API support)
     */
    public function setObjeRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->obje_r_usuario !== $v) {
            $this->obje_r_usuario = $v;
            $this->modifiedColumns[ObjetivoTableMap::COL_OBJE_R_USUARIO] = true;
        }

        return $this;
    } // setObjeRUsuario()

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
            if ($this->obje_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ObjetivoTableMap::translateFieldName('ObjeCodigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->obje_codigo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ObjetivoTableMap::translateFieldName('ObjeSigla', TableMap::TYPE_PHPNAME, $indexType)];
            $this->obje_sigla = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ObjetivoTableMap::translateFieldName('ObjeDescripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->obje_descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ObjetivoTableMap::translateFieldName('ObjeRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->obje_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ObjetivoTableMap::translateFieldName('ObjeRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->obje_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ObjetivoTableMap::translateFieldName('ObjeRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->obje_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = ObjetivoTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Objetivo'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(ObjetivoTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildObjetivoQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collActividadObjetivos = null;

            $this->collEvaluacionPreguntas = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Objetivo::setDeleted()
     * @see Objetivo::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ObjetivoTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildObjetivoQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ObjetivoTableMap::DATABASE_NAME);
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
                ObjetivoTableMap::addInstanceToPool($this);
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

            if ($this->actividadObjetivosScheduledForDeletion !== null) {
                if (!$this->actividadObjetivosScheduledForDeletion->isEmpty()) {
                    \ActividadObjetivoQuery::create()
                        ->filterByPrimaryKeys($this->actividadObjetivosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actividadObjetivosScheduledForDeletion = null;
                }
            }

            if ($this->collActividadObjetivos !== null) {
                foreach ($this->collActividadObjetivos as $referrerFK) {
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

        $this->modifiedColumns[ObjetivoTableMap::COL_OBJE_CODIGO] = true;
        if (null !== $this->obje_codigo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ObjetivoTableMap::COL_OBJE_CODIGO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'obje_codigo';
        }
        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_SIGLA)) {
            $modifiedColumns[':p' . $index++]  = 'obje_sigla';
        }
        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'obje_descripcion';
        }
        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'obje_r_fecha_creacion';
        }
        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'obje_r_fecha_modificacion';
        }
        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'obje_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO objetivo (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'obje_codigo':
                        $stmt->bindValue($identifier, $this->obje_codigo, PDO::PARAM_INT);
                        break;
                    case 'obje_sigla':
                        $stmt->bindValue($identifier, $this->obje_sigla, PDO::PARAM_STR);
                        break;
                    case 'obje_descripcion':
                        $stmt->bindValue($identifier, $this->obje_descripcion, PDO::PARAM_STR);
                        break;
                    case 'obje_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->obje_r_fecha_creacion ? $this->obje_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'obje_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->obje_r_fecha_modificacion ? $this->obje_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'obje_r_usuario':
                        $stmt->bindValue($identifier, $this->obje_r_usuario, PDO::PARAM_INT);
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
        $this->setObjeCodigo($pk);

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
        $pos = ObjetivoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getObjeCodigo();
                break;
            case 1:
                return $this->getObjeSigla();
                break;
            case 2:
                return $this->getObjeDescripcion();
                break;
            case 3:
                return $this->getObjeRFechaCreacion();
                break;
            case 4:
                return $this->getObjeRFechaModificacion();
                break;
            case 5:
                return $this->getObjeRUsuario();
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

        if (isset($alreadyDumpedObjects['Objetivo'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Objetivo'][$this->hashCode()] = true;
        $keys = ObjetivoTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getObjeCodigo(),
            $keys[1] => $this->getObjeSigla(),
            $keys[2] => $this->getObjeDescripcion(),
            $keys[3] => $this->getObjeRFechaCreacion(),
            $keys[4] => $this->getObjeRFechaModificacion(),
            $keys[5] => $this->getObjeRUsuario(),
        );
        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collActividadObjetivos) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'actividadObjetivos';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'actividad_objetivos';
                        break;
                    default:
                        $key = 'ActividadObjetivos';
                }

                $result[$key] = $this->collActividadObjetivos->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Objetivo
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ObjetivoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Objetivo
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setObjeCodigo($value);
                break;
            case 1:
                $this->setObjeSigla($value);
                break;
            case 2:
                $this->setObjeDescripcion($value);
                break;
            case 3:
                $this->setObjeRFechaCreacion($value);
                break;
            case 4:
                $this->setObjeRFechaModificacion($value);
                break;
            case 5:
                $this->setObjeRUsuario($value);
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
        $keys = ObjetivoTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setObjeCodigo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setObjeSigla($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setObjeDescripcion($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setObjeRFechaCreacion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setObjeRFechaModificacion($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setObjeRUsuario($arr[$keys[5]]);
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
     * @return $this|\Objetivo The current object, for fluid interface
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
        $criteria = new Criteria(ObjetivoTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_CODIGO)) {
            $criteria->add(ObjetivoTableMap::COL_OBJE_CODIGO, $this->obje_codigo);
        }
        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_SIGLA)) {
            $criteria->add(ObjetivoTableMap::COL_OBJE_SIGLA, $this->obje_sigla);
        }
        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_DESCRIPCION)) {
            $criteria->add(ObjetivoTableMap::COL_OBJE_DESCRIPCION, $this->obje_descripcion);
        }
        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_R_FECHA_CREACION)) {
            $criteria->add(ObjetivoTableMap::COL_OBJE_R_FECHA_CREACION, $this->obje_r_fecha_creacion);
        }
        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_R_FECHA_MODIFICACION)) {
            $criteria->add(ObjetivoTableMap::COL_OBJE_R_FECHA_MODIFICACION, $this->obje_r_fecha_modificacion);
        }
        if ($this->isColumnModified(ObjetivoTableMap::COL_OBJE_R_USUARIO)) {
            $criteria->add(ObjetivoTableMap::COL_OBJE_R_USUARIO, $this->obje_r_usuario);
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
        $criteria = ChildObjetivoQuery::create();
        $criteria->add(ObjetivoTableMap::COL_OBJE_CODIGO, $this->obje_codigo);

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
        $validPk = null !== $this->getObjeCodigo();

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
        return $this->getObjeCodigo();
    }

    /**
     * Generic method to set the primary key (obje_codigo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setObjeCodigo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getObjeCodigo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Objetivo (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setObjeSigla($this->getObjeSigla());
        $copyObj->setObjeDescripcion($this->getObjeDescripcion());
        $copyObj->setObjeRFechaCreacion($this->getObjeRFechaCreacion());
        $copyObj->setObjeRFechaModificacion($this->getObjeRFechaModificacion());
        $copyObj->setObjeRUsuario($this->getObjeRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getActividadObjetivos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActividadObjetivo($relObj->copy($deepCopy));
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
            $copyObj->setObjeCodigo(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Objetivo Clone of current object.
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
        if ('ActividadObjetivo' == $relationName) {
            $this->initActividadObjetivos();
            return;
        }
        if ('EvaluacionPregunta' == $relationName) {
            $this->initEvaluacionPreguntas();
            return;
        }
    }

    /**
     * Clears out the collActividadObjetivos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addActividadObjetivos()
     */
    public function clearActividadObjetivos()
    {
        $this->collActividadObjetivos = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collActividadObjetivos collection loaded partially.
     */
    public function resetPartialActividadObjetivos($v = true)
    {
        $this->collActividadObjetivosPartial = $v;
    }

    /**
     * Initializes the collActividadObjetivos collection.
     *
     * By default this just sets the collActividadObjetivos collection to an empty array (like clearcollActividadObjetivos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActividadObjetivos($overrideExisting = true)
    {
        if (null !== $this->collActividadObjetivos && !$overrideExisting) {
            return;
        }

        $collectionClassName = ActividadObjetivoTableMap::getTableMap()->getCollectionClassName();

        $this->collActividadObjetivos = new $collectionClassName;
        $this->collActividadObjetivos->setModel('\ActividadObjetivo');
    }

    /**
     * Gets an array of ChildActividadObjetivo objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildObjetivo is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildActividadObjetivo[] List of ChildActividadObjetivo objects
     * @throws PropelException
     */
    public function getActividadObjetivos(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collActividadObjetivosPartial && !$this->isNew();
        if (null === $this->collActividadObjetivos || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActividadObjetivos) {
                // return empty collection
                $this->initActividadObjetivos();
            } else {
                $collActividadObjetivos = ChildActividadObjetivoQuery::create(null, $criteria)
                    ->filterByObjetivo($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collActividadObjetivosPartial && count($collActividadObjetivos)) {
                        $this->initActividadObjetivos(false);

                        foreach ($collActividadObjetivos as $obj) {
                            if (false == $this->collActividadObjetivos->contains($obj)) {
                                $this->collActividadObjetivos->append($obj);
                            }
                        }

                        $this->collActividadObjetivosPartial = true;
                    }

                    return $collActividadObjetivos;
                }

                if ($partial && $this->collActividadObjetivos) {
                    foreach ($this->collActividadObjetivos as $obj) {
                        if ($obj->isNew()) {
                            $collActividadObjetivos[] = $obj;
                        }
                    }
                }

                $this->collActividadObjetivos = $collActividadObjetivos;
                $this->collActividadObjetivosPartial = false;
            }
        }

        return $this->collActividadObjetivos;
    }

    /**
     * Sets a collection of ChildActividadObjetivo objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $actividadObjetivos A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildObjetivo The current object (for fluent API support)
     */
    public function setActividadObjetivos(Collection $actividadObjetivos, ConnectionInterface $con = null)
    {
        /** @var ChildActividadObjetivo[] $actividadObjetivosToDelete */
        $actividadObjetivosToDelete = $this->getActividadObjetivos(new Criteria(), $con)->diff($actividadObjetivos);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->actividadObjetivosScheduledForDeletion = clone $actividadObjetivosToDelete;

        foreach ($actividadObjetivosToDelete as $actividadObjetivoRemoved) {
            $actividadObjetivoRemoved->setObjetivo(null);
        }

        $this->collActividadObjetivos = null;
        foreach ($actividadObjetivos as $actividadObjetivo) {
            $this->addActividadObjetivo($actividadObjetivo);
        }

        $this->collActividadObjetivos = $actividadObjetivos;
        $this->collActividadObjetivosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActividadObjetivo objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ActividadObjetivo objects.
     * @throws PropelException
     */
    public function countActividadObjetivos(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collActividadObjetivosPartial && !$this->isNew();
        if (null === $this->collActividadObjetivos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActividadObjetivos) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getActividadObjetivos());
            }

            $query = ChildActividadObjetivoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByObjetivo($this)
                ->count($con);
        }

        return count($this->collActividadObjetivos);
    }

    /**
     * Method called to associate a ChildActividadObjetivo object to this object
     * through the ChildActividadObjetivo foreign key attribute.
     *
     * @param  ChildActividadObjetivo $l ChildActividadObjetivo
     * @return $this|\Objetivo The current object (for fluent API support)
     */
    public function addActividadObjetivo(ChildActividadObjetivo $l)
    {
        if ($this->collActividadObjetivos === null) {
            $this->initActividadObjetivos();
            $this->collActividadObjetivosPartial = true;
        }

        if (!$this->collActividadObjetivos->contains($l)) {
            $this->doAddActividadObjetivo($l);

            if ($this->actividadObjetivosScheduledForDeletion and $this->actividadObjetivosScheduledForDeletion->contains($l)) {
                $this->actividadObjetivosScheduledForDeletion->remove($this->actividadObjetivosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildActividadObjetivo $actividadObjetivo The ChildActividadObjetivo object to add.
     */
    protected function doAddActividadObjetivo(ChildActividadObjetivo $actividadObjetivo)
    {
        $this->collActividadObjetivos[]= $actividadObjetivo;
        $actividadObjetivo->setObjetivo($this);
    }

    /**
     * @param  ChildActividadObjetivo $actividadObjetivo The ChildActividadObjetivo object to remove.
     * @return $this|ChildObjetivo The current object (for fluent API support)
     */
    public function removeActividadObjetivo(ChildActividadObjetivo $actividadObjetivo)
    {
        if ($this->getActividadObjetivos()->contains($actividadObjetivo)) {
            $pos = $this->collActividadObjetivos->search($actividadObjetivo);
            $this->collActividadObjetivos->remove($pos);
            if (null === $this->actividadObjetivosScheduledForDeletion) {
                $this->actividadObjetivosScheduledForDeletion = clone $this->collActividadObjetivos;
                $this->actividadObjetivosScheduledForDeletion->clear();
            }
            $this->actividadObjetivosScheduledForDeletion[]= clone $actividadObjetivo;
            $actividadObjetivo->setObjetivo(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Objetivo is new, it will return
     * an empty collection; or if this Objetivo has previously
     * been saved, it will retrieve related ActividadObjetivos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Objetivo.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildActividadObjetivo[] List of ChildActividadObjetivo objects
     */
    public function getActividadObjetivosJoinActividad(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildActividadObjetivoQuery::create(null, $criteria);
        $query->joinWith('Actividad', $joinBehavior);

        return $this->getActividadObjetivos($query, $con);
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
     * If this ChildObjetivo is new, it will return
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
                    ->filterByObjetivo($this)
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
     * @return $this|ChildObjetivo The current object (for fluent API support)
     */
    public function setEvaluacionPreguntas(Collection $evaluacionPreguntas, ConnectionInterface $con = null)
    {
        /** @var ChildEvaluacionPregunta[] $evaluacionPreguntasToDelete */
        $evaluacionPreguntasToDelete = $this->getEvaluacionPreguntas(new Criteria(), $con)->diff($evaluacionPreguntas);


        $this->evaluacionPreguntasScheduledForDeletion = $evaluacionPreguntasToDelete;

        foreach ($evaluacionPreguntasToDelete as $evaluacionPreguntaRemoved) {
            $evaluacionPreguntaRemoved->setObjetivo(null);
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
                ->filterByObjetivo($this)
                ->count($con);
        }

        return count($this->collEvaluacionPreguntas);
    }

    /**
     * Method called to associate a ChildEvaluacionPregunta object to this object
     * through the ChildEvaluacionPregunta foreign key attribute.
     *
     * @param  ChildEvaluacionPregunta $l ChildEvaluacionPregunta
     * @return $this|\Objetivo The current object (for fluent API support)
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
        $evaluacionPregunta->setObjetivo($this);
    }

    /**
     * @param  ChildEvaluacionPregunta $evaluacionPregunta The ChildEvaluacionPregunta object to remove.
     * @return $this|ChildObjetivo The current object (for fluent API support)
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
            $evaluacionPregunta->setObjetivo(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Objetivo is new, it will return
     * an empty collection; or if this Objetivo has previously
     * been saved, it will retrieve related EvaluacionPreguntas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Objetivo.
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
     * Otherwise if this Objetivo is new, it will return
     * an empty collection; or if this Objetivo has previously
     * been saved, it will retrieve related EvaluacionPreguntas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Objetivo.
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
     * Otherwise if this Objetivo is new, it will return
     * an empty collection; or if this Objetivo has previously
     * been saved, it will retrieve related EvaluacionPreguntas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Objetivo.
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
        $this->obje_codigo = null;
        $this->obje_sigla = null;
        $this->obje_descripcion = null;
        $this->obje_r_fecha_creacion = null;
        $this->obje_r_fecha_modificacion = null;
        $this->obje_r_usuario = null;
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
            if ($this->collActividadObjetivos) {
                foreach ($this->collActividadObjetivos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEvaluacionPreguntas) {
                foreach ($this->collEvaluacionPreguntas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collActividadObjetivos = null;
        $this->collEvaluacionPreguntas = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ObjetivoTableMap::DEFAULT_STRING_FORMAT);
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
