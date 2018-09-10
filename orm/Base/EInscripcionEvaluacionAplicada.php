<?php

namespace Base;

use \EInscripcionEvaluacionAplicada as ChildEInscripcionEvaluacionAplicada;
use \EInscripcionEvaluacionAplicadaQuery as ChildEInscripcionEvaluacionAplicadaQuery;
use \InscripcionEvaluacionAplicada as ChildInscripcionEvaluacionAplicada;
use \InscripcionEvaluacionAplicadaQuery as ChildInscripcionEvaluacionAplicadaQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\EInscripcionEvaluacionAplicadaTableMap;
use Map\InscripcionEvaluacionAplicadaTableMap;
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
 * Base class that represents a row from the 'e_inscripcion_evaluacion_aplicada' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class EInscripcionEvaluacionAplicada implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\EInscripcionEvaluacionAplicadaTableMap';


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
     * The value for the eiea_estado field.
     *
     * @var        int
     */
    protected $eiea_estado;

    /**
     * The value for the eiea_descripcion field.
     *
     * @var        string
     */
    protected $eiea_descripcion;

    /**
     * The value for the eiea_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $eiea_r_fecha_creacion;

    /**
     * The value for the eiea_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $eiea_r_fecha_modificacion;

    /**
     * The value for the eiea_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $eiea_r_usuario;

    /**
     * @var        ObjectCollection|ChildInscripcionEvaluacionAplicada[] Collection to store aggregation of ChildInscripcionEvaluacionAplicada objects.
     */
    protected $collInscripcionEvaluacionAplicadas;
    protected $collInscripcionEvaluacionAplicadasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInscripcionEvaluacionAplicada[]
     */
    protected $inscripcionEvaluacionAplicadasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->eiea_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\EInscripcionEvaluacionAplicada object.
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
     * Compares this with another <code>EInscripcionEvaluacionAplicada</code> instance.  If
     * <code>obj</code> is an instance of <code>EInscripcionEvaluacionAplicada</code>, delegates to
     * <code>equals(EInscripcionEvaluacionAplicada)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|EInscripcionEvaluacionAplicada The current object, for fluid interface
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
     * Get the [eiea_estado] column value.
     *
     * @return int
     */
    public function getEieaEstado()
    {
        return $this->eiea_estado;
    }

    /**
     * Get the [eiea_descripcion] column value.
     *
     * @return string
     */
    public function getEieaDescripcion()
    {
        return $this->eiea_descripcion;
    }

    /**
     * Get the [optionally formatted] temporal [eiea_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEieaRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->eiea_r_fecha_creacion;
        } else {
            return $this->eiea_r_fecha_creacion instanceof \DateTimeInterface ? $this->eiea_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [eiea_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEieaRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->eiea_r_fecha_modificacion;
        } else {
            return $this->eiea_r_fecha_modificacion instanceof \DateTimeInterface ? $this->eiea_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [eiea_r_usuario] column value.
     *
     * @return int
     */
    public function getEieaRUsuario()
    {
        return $this->eiea_r_usuario;
    }

    /**
     * Set the value of [eiea_estado] column.
     *
     * @param int $v new value
     * @return $this|\EInscripcionEvaluacionAplicada The current object (for fluent API support)
     */
    public function setEieaEstado($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->eiea_estado !== $v) {
            $this->eiea_estado = $v;
            $this->modifiedColumns[EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO] = true;
        }

        return $this;
    } // setEieaEstado()

    /**
     * Set the value of [eiea_descripcion] column.
     *
     * @param string $v new value
     * @return $this|\EInscripcionEvaluacionAplicada The current object (for fluent API support)
     */
    public function setEieaDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->eiea_descripcion !== $v) {
            $this->eiea_descripcion = $v;
            $this->modifiedColumns[EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_DESCRIPCION] = true;
        }

        return $this;
    } // setEieaDescripcion()

    /**
     * Sets the value of [eiea_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EInscripcionEvaluacionAplicada The current object (for fluent API support)
     */
    public function setEieaRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->eiea_r_fecha_creacion !== null || $dt !== null) {
            if ($this->eiea_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->eiea_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->eiea_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setEieaRFechaCreacion()

    /**
     * Sets the value of [eiea_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EInscripcionEvaluacionAplicada The current object (for fluent API support)
     */
    public function setEieaRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->eiea_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->eiea_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->eiea_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->eiea_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setEieaRFechaModificacion()

    /**
     * Set the value of [eiea_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\EInscripcionEvaluacionAplicada The current object (for fluent API support)
     */
    public function setEieaRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->eiea_r_usuario !== $v) {
            $this->eiea_r_usuario = $v;
            $this->modifiedColumns[EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_USUARIO] = true;
        }

        return $this;
    } // setEieaRUsuario()

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
            if ($this->eiea_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EInscripcionEvaluacionAplicadaTableMap::translateFieldName('EieaEstado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->eiea_estado = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EInscripcionEvaluacionAplicadaTableMap::translateFieldName('EieaDescripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->eiea_descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EInscripcionEvaluacionAplicadaTableMap::translateFieldName('EieaRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->eiea_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EInscripcionEvaluacionAplicadaTableMap::translateFieldName('EieaRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->eiea_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EInscripcionEvaluacionAplicadaTableMap::translateFieldName('EieaRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->eiea_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = EInscripcionEvaluacionAplicadaTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\EInscripcionEvaluacionAplicada'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(EInscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEInscripcionEvaluacionAplicadaQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collInscripcionEvaluacionAplicadas = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see EInscripcionEvaluacionAplicada::setDeleted()
     * @see EInscripcionEvaluacionAplicada::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EInscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEInscripcionEvaluacionAplicadaQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(EInscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
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
                EInscripcionEvaluacionAplicadaTableMap::addInstanceToPool($this);
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

            if ($this->inscripcionEvaluacionAplicadasScheduledForDeletion !== null) {
                if (!$this->inscripcionEvaluacionAplicadasScheduledForDeletion->isEmpty()) {
                    foreach ($this->inscripcionEvaluacionAplicadasScheduledForDeletion as $inscripcionEvaluacionAplicada) {
                        // need to save related object because we set the relation to null
                        $inscripcionEvaluacionAplicada->save($con);
                    }
                    $this->inscripcionEvaluacionAplicadasScheduledForDeletion = null;
                }
            }

            if ($this->collInscripcionEvaluacionAplicadas !== null) {
                foreach ($this->collInscripcionEvaluacionAplicadas as $referrerFK) {
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

        $this->modifiedColumns[EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO] = true;
        if (null !== $this->eiea_estado) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO)) {
            $modifiedColumns[':p' . $index++]  = 'eiea_estado';
        }
        if ($this->isColumnModified(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'eiea_descripcion';
        }
        if ($this->isColumnModified(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'eiea_r_fecha_creacion';
        }
        if ($this->isColumnModified(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'eiea_r_fecha_modificacion';
        }
        if ($this->isColumnModified(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'eiea_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO e_inscripcion_evaluacion_aplicada (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'eiea_estado':
                        $stmt->bindValue($identifier, $this->eiea_estado, PDO::PARAM_INT);
                        break;
                    case 'eiea_descripcion':
                        $stmt->bindValue($identifier, $this->eiea_descripcion, PDO::PARAM_STR);
                        break;
                    case 'eiea_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->eiea_r_fecha_creacion ? $this->eiea_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'eiea_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->eiea_r_fecha_modificacion ? $this->eiea_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'eiea_r_usuario':
                        $stmt->bindValue($identifier, $this->eiea_r_usuario, PDO::PARAM_INT);
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
        $this->setEieaEstado($pk);

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
        $pos = EInscripcionEvaluacionAplicadaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getEieaEstado();
                break;
            case 1:
                return $this->getEieaDescripcion();
                break;
            case 2:
                return $this->getEieaRFechaCreacion();
                break;
            case 3:
                return $this->getEieaRFechaModificacion();
                break;
            case 4:
                return $this->getEieaRUsuario();
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

        if (isset($alreadyDumpedObjects['EInscripcionEvaluacionAplicada'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EInscripcionEvaluacionAplicada'][$this->hashCode()] = true;
        $keys = EInscripcionEvaluacionAplicadaTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getEieaEstado(),
            $keys[1] => $this->getEieaDescripcion(),
            $keys[2] => $this->getEieaRFechaCreacion(),
            $keys[3] => $this->getEieaRFechaModificacion(),
            $keys[4] => $this->getEieaRUsuario(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collInscripcionEvaluacionAplicadas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'inscripcionEvaluacionAplicadas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'inscripcion_evaluacion_aplicadas';
                        break;
                    default:
                        $key = 'InscripcionEvaluacionAplicadas';
                }

                $result[$key] = $this->collInscripcionEvaluacionAplicadas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\EInscripcionEvaluacionAplicada
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EInscripcionEvaluacionAplicadaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\EInscripcionEvaluacionAplicada
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setEieaEstado($value);
                break;
            case 1:
                $this->setEieaDescripcion($value);
                break;
            case 2:
                $this->setEieaRFechaCreacion($value);
                break;
            case 3:
                $this->setEieaRFechaModificacion($value);
                break;
            case 4:
                $this->setEieaRUsuario($value);
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
        $keys = EInscripcionEvaluacionAplicadaTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setEieaEstado($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setEieaDescripcion($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setEieaRFechaCreacion($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setEieaRFechaModificacion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEieaRUsuario($arr[$keys[4]]);
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
     * @return $this|\EInscripcionEvaluacionAplicada The current object, for fluid interface
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
        $criteria = new Criteria(EInscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO)) {
            $criteria->add(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO, $this->eiea_estado);
        }
        if ($this->isColumnModified(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_DESCRIPCION)) {
            $criteria->add(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_DESCRIPCION, $this->eiea_descripcion);
        }
        if ($this->isColumnModified(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_CREACION)) {
            $criteria->add(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_CREACION, $this->eiea_r_fecha_creacion);
        }
        if ($this->isColumnModified(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_MODIFICACION)) {
            $criteria->add(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_MODIFICACION, $this->eiea_r_fecha_modificacion);
        }
        if ($this->isColumnModified(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_USUARIO)) {
            $criteria->add(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_USUARIO, $this->eiea_r_usuario);
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
        $criteria = ChildEInscripcionEvaluacionAplicadaQuery::create();
        $criteria->add(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO, $this->eiea_estado);

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
        $validPk = null !== $this->getEieaEstado();

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
        return $this->getEieaEstado();
    }

    /**
     * Generic method to set the primary key (eiea_estado column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setEieaEstado($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getEieaEstado();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \EInscripcionEvaluacionAplicada (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEieaDescripcion($this->getEieaDescripcion());
        $copyObj->setEieaRFechaCreacion($this->getEieaRFechaCreacion());
        $copyObj->setEieaRFechaModificacion($this->getEieaRFechaModificacion());
        $copyObj->setEieaRUsuario($this->getEieaRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getInscripcionEvaluacionAplicadas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInscripcionEvaluacionAplicada($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setEieaEstado(NULL); // this is a auto-increment column, so set to default value
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
     * @return \EInscripcionEvaluacionAplicada Clone of current object.
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
        if ('InscripcionEvaluacionAplicada' == $relationName) {
            $this->initInscripcionEvaluacionAplicadas();
            return;
        }
    }

    /**
     * Clears out the collInscripcionEvaluacionAplicadas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInscripcionEvaluacionAplicadas()
     */
    public function clearInscripcionEvaluacionAplicadas()
    {
        $this->collInscripcionEvaluacionAplicadas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInscripcionEvaluacionAplicadas collection loaded partially.
     */
    public function resetPartialInscripcionEvaluacionAplicadas($v = true)
    {
        $this->collInscripcionEvaluacionAplicadasPartial = $v;
    }

    /**
     * Initializes the collInscripcionEvaluacionAplicadas collection.
     *
     * By default this just sets the collInscripcionEvaluacionAplicadas collection to an empty array (like clearcollInscripcionEvaluacionAplicadas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInscripcionEvaluacionAplicadas($overrideExisting = true)
    {
        if (null !== $this->collInscripcionEvaluacionAplicadas && !$overrideExisting) {
            return;
        }

        $collectionClassName = InscripcionEvaluacionAplicadaTableMap::getTableMap()->getCollectionClassName();

        $this->collInscripcionEvaluacionAplicadas = new $collectionClassName;
        $this->collInscripcionEvaluacionAplicadas->setModel('\InscripcionEvaluacionAplicada');
    }

    /**
     * Gets an array of ChildInscripcionEvaluacionAplicada objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEInscripcionEvaluacionAplicada is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInscripcionEvaluacionAplicada[] List of ChildInscripcionEvaluacionAplicada objects
     * @throws PropelException
     */
    public function getInscripcionEvaluacionAplicadas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInscripcionEvaluacionAplicadasPartial && !$this->isNew();
        if (null === $this->collInscripcionEvaluacionAplicadas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInscripcionEvaluacionAplicadas) {
                // return empty collection
                $this->initInscripcionEvaluacionAplicadas();
            } else {
                $collInscripcionEvaluacionAplicadas = ChildInscripcionEvaluacionAplicadaQuery::create(null, $criteria)
                    ->filterByEInscripcionEvaluacionAplicada($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInscripcionEvaluacionAplicadasPartial && count($collInscripcionEvaluacionAplicadas)) {
                        $this->initInscripcionEvaluacionAplicadas(false);

                        foreach ($collInscripcionEvaluacionAplicadas as $obj) {
                            if (false == $this->collInscripcionEvaluacionAplicadas->contains($obj)) {
                                $this->collInscripcionEvaluacionAplicadas->append($obj);
                            }
                        }

                        $this->collInscripcionEvaluacionAplicadasPartial = true;
                    }

                    return $collInscripcionEvaluacionAplicadas;
                }

                if ($partial && $this->collInscripcionEvaluacionAplicadas) {
                    foreach ($this->collInscripcionEvaluacionAplicadas as $obj) {
                        if ($obj->isNew()) {
                            $collInscripcionEvaluacionAplicadas[] = $obj;
                        }
                    }
                }

                $this->collInscripcionEvaluacionAplicadas = $collInscripcionEvaluacionAplicadas;
                $this->collInscripcionEvaluacionAplicadasPartial = false;
            }
        }

        return $this->collInscripcionEvaluacionAplicadas;
    }

    /**
     * Sets a collection of ChildInscripcionEvaluacionAplicada objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $inscripcionEvaluacionAplicadas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEInscripcionEvaluacionAplicada The current object (for fluent API support)
     */
    public function setInscripcionEvaluacionAplicadas(Collection $inscripcionEvaluacionAplicadas, ConnectionInterface $con = null)
    {
        /** @var ChildInscripcionEvaluacionAplicada[] $inscripcionEvaluacionAplicadasToDelete */
        $inscripcionEvaluacionAplicadasToDelete = $this->getInscripcionEvaluacionAplicadas(new Criteria(), $con)->diff($inscripcionEvaluacionAplicadas);


        $this->inscripcionEvaluacionAplicadasScheduledForDeletion = $inscripcionEvaluacionAplicadasToDelete;

        foreach ($inscripcionEvaluacionAplicadasToDelete as $inscripcionEvaluacionAplicadaRemoved) {
            $inscripcionEvaluacionAplicadaRemoved->setEInscripcionEvaluacionAplicada(null);
        }

        $this->collInscripcionEvaluacionAplicadas = null;
        foreach ($inscripcionEvaluacionAplicadas as $inscripcionEvaluacionAplicada) {
            $this->addInscripcionEvaluacionAplicada($inscripcionEvaluacionAplicada);
        }

        $this->collInscripcionEvaluacionAplicadas = $inscripcionEvaluacionAplicadas;
        $this->collInscripcionEvaluacionAplicadasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InscripcionEvaluacionAplicada objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related InscripcionEvaluacionAplicada objects.
     * @throws PropelException
     */
    public function countInscripcionEvaluacionAplicadas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInscripcionEvaluacionAplicadasPartial && !$this->isNew();
        if (null === $this->collInscripcionEvaluacionAplicadas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInscripcionEvaluacionAplicadas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInscripcionEvaluacionAplicadas());
            }

            $query = ChildInscripcionEvaluacionAplicadaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEInscripcionEvaluacionAplicada($this)
                ->count($con);
        }

        return count($this->collInscripcionEvaluacionAplicadas);
    }

    /**
     * Method called to associate a ChildInscripcionEvaluacionAplicada object to this object
     * through the ChildInscripcionEvaluacionAplicada foreign key attribute.
     *
     * @param  ChildInscripcionEvaluacionAplicada $l ChildInscripcionEvaluacionAplicada
     * @return $this|\EInscripcionEvaluacionAplicada The current object (for fluent API support)
     */
    public function addInscripcionEvaluacionAplicada(ChildInscripcionEvaluacionAplicada $l)
    {
        if ($this->collInscripcionEvaluacionAplicadas === null) {
            $this->initInscripcionEvaluacionAplicadas();
            $this->collInscripcionEvaluacionAplicadasPartial = true;
        }

        if (!$this->collInscripcionEvaluacionAplicadas->contains($l)) {
            $this->doAddInscripcionEvaluacionAplicada($l);

            if ($this->inscripcionEvaluacionAplicadasScheduledForDeletion and $this->inscripcionEvaluacionAplicadasScheduledForDeletion->contains($l)) {
                $this->inscripcionEvaluacionAplicadasScheduledForDeletion->remove($this->inscripcionEvaluacionAplicadasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInscripcionEvaluacionAplicada $inscripcionEvaluacionAplicada The ChildInscripcionEvaluacionAplicada object to add.
     */
    protected function doAddInscripcionEvaluacionAplicada(ChildInscripcionEvaluacionAplicada $inscripcionEvaluacionAplicada)
    {
        $this->collInscripcionEvaluacionAplicadas[]= $inscripcionEvaluacionAplicada;
        $inscripcionEvaluacionAplicada->setEInscripcionEvaluacionAplicada($this);
    }

    /**
     * @param  ChildInscripcionEvaluacionAplicada $inscripcionEvaluacionAplicada The ChildInscripcionEvaluacionAplicada object to remove.
     * @return $this|ChildEInscripcionEvaluacionAplicada The current object (for fluent API support)
     */
    public function removeInscripcionEvaluacionAplicada(ChildInscripcionEvaluacionAplicada $inscripcionEvaluacionAplicada)
    {
        if ($this->getInscripcionEvaluacionAplicadas()->contains($inscripcionEvaluacionAplicada)) {
            $pos = $this->collInscripcionEvaluacionAplicadas->search($inscripcionEvaluacionAplicada);
            $this->collInscripcionEvaluacionAplicadas->remove($pos);
            if (null === $this->inscripcionEvaluacionAplicadasScheduledForDeletion) {
                $this->inscripcionEvaluacionAplicadasScheduledForDeletion = clone $this->collInscripcionEvaluacionAplicadas;
                $this->inscripcionEvaluacionAplicadasScheduledForDeletion->clear();
            }
            $this->inscripcionEvaluacionAplicadasScheduledForDeletion[]= $inscripcionEvaluacionAplicada;
            $inscripcionEvaluacionAplicada->setEInscripcionEvaluacionAplicada(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EInscripcionEvaluacionAplicada is new, it will return
     * an empty collection; or if this EInscripcionEvaluacionAplicada has previously
     * been saved, it will retrieve related InscripcionEvaluacionAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EInscripcionEvaluacionAplicada.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInscripcionEvaluacionAplicada[] List of ChildInscripcionEvaluacionAplicada objects
     */
    public function getInscripcionEvaluacionAplicadasJoinEvaluacionAplicada(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInscripcionEvaluacionAplicadaQuery::create(null, $criteria);
        $query->joinWith('EvaluacionAplicada', $joinBehavior);

        return $this->getInscripcionEvaluacionAplicadas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EInscripcionEvaluacionAplicada is new, it will return
     * an empty collection; or if this EInscripcionEvaluacionAplicada has previously
     * been saved, it will retrieve related InscripcionEvaluacionAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EInscripcionEvaluacionAplicada.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInscripcionEvaluacionAplicada[] List of ChildInscripcionEvaluacionAplicada objects
     */
    public function getInscripcionEvaluacionAplicadasJoinInscripcion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInscripcionEvaluacionAplicadaQuery::create(null, $criteria);
        $query->joinWith('Inscripcion', $joinBehavior);

        return $this->getInscripcionEvaluacionAplicadas($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->eiea_estado = null;
        $this->eiea_descripcion = null;
        $this->eiea_r_fecha_creacion = null;
        $this->eiea_r_fecha_modificacion = null;
        $this->eiea_r_usuario = null;
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
            if ($this->collInscripcionEvaluacionAplicadas) {
                foreach ($this->collInscripcionEvaluacionAplicadas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collInscripcionEvaluacionAplicadas = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EInscripcionEvaluacionAplicadaTableMap::DEFAULT_STRING_FORMAT);
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
