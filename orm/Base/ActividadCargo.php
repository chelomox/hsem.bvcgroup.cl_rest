<?php

namespace Base;

use \Actividad as ChildActividad;
use \ActividadCargoQuery as ChildActividadCargoQuery;
use \ActividadQuery as ChildActividadQuery;
use \Cargo as ChildCargo;
use \CargoQuery as ChildCargoQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ActividadCargoTableMap;
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
 * Base class that represents a row from the 'actividad_cargo' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class ActividadCargo implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ActividadCargoTableMap';


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
     * The value for the acca_c_actividad field.
     *
     * @var        int
     */
    protected $acca_c_actividad;

    /**
     * The value for the acca_c_cargo field.
     *
     * @var        int
     */
    protected $acca_c_cargo;

    /**
     * The value for the acca_vigente field.
     *
     * @var        int
     */
    protected $acca_vigente;

    /**
     * The value for the acca_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $acca_r_fecha_creacion;

    /**
     * The value for the acca_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $acca_r_fecha_modificacion;

    /**
     * The value for the acca_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $acca_r_usuario;

    /**
     * @var        ChildActividad
     */
    protected $aActividad;

    /**
     * @var        ChildCargo
     */
    protected $aCargo;

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
        $this->acca_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\ActividadCargo object.
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
     * Compares this with another <code>ActividadCargo</code> instance.  If
     * <code>obj</code> is an instance of <code>ActividadCargo</code>, delegates to
     * <code>equals(ActividadCargo)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|ActividadCargo The current object, for fluid interface
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
     * Get the [acca_c_actividad] column value.
     *
     * @return int
     */
    public function getAccaCActividad()
    {
        return $this->acca_c_actividad;
    }

    /**
     * Get the [acca_c_cargo] column value.
     *
     * @return int
     */
    public function getAccaCCargo()
    {
        return $this->acca_c_cargo;
    }

    /**
     * Get the [acca_vigente] column value.
     *
     * @return int
     */
    public function getAccaVigente()
    {
        return $this->acca_vigente;
    }

    /**
     * Get the [optionally formatted] temporal [acca_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getAccaRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->acca_r_fecha_creacion;
        } else {
            return $this->acca_r_fecha_creacion instanceof \DateTimeInterface ? $this->acca_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [acca_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getAccaRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->acca_r_fecha_modificacion;
        } else {
            return $this->acca_r_fecha_modificacion instanceof \DateTimeInterface ? $this->acca_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [acca_r_usuario] column value.
     *
     * @return int
     */
    public function getAccaRUsuario()
    {
        return $this->acca_r_usuario;
    }

    /**
     * Set the value of [acca_c_actividad] column.
     *
     * @param int $v new value
     * @return $this|\ActividadCargo The current object (for fluent API support)
     */
    public function setAccaCActividad($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acca_c_actividad !== $v) {
            $this->acca_c_actividad = $v;
            $this->modifiedColumns[ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD] = true;
        }

        if ($this->aActividad !== null && $this->aActividad->getActiCodigo() !== $v) {
            $this->aActividad = null;
        }

        return $this;
    } // setAccaCActividad()

    /**
     * Set the value of [acca_c_cargo] column.
     *
     * @param int $v new value
     * @return $this|\ActividadCargo The current object (for fluent API support)
     */
    public function setAccaCCargo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acca_c_cargo !== $v) {
            $this->acca_c_cargo = $v;
            $this->modifiedColumns[ActividadCargoTableMap::COL_ACCA_C_CARGO] = true;
        }

        if ($this->aCargo !== null && $this->aCargo->getCargCodigo() !== $v) {
            $this->aCargo = null;
        }

        return $this;
    } // setAccaCCargo()

    /**
     * Set the value of [acca_vigente] column.
     *
     * @param int $v new value
     * @return $this|\ActividadCargo The current object (for fluent API support)
     */
    public function setAccaVigente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acca_vigente !== $v) {
            $this->acca_vigente = $v;
            $this->modifiedColumns[ActividadCargoTableMap::COL_ACCA_VIGENTE] = true;
        }

        return $this;
    } // setAccaVigente()

    /**
     * Sets the value of [acca_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\ActividadCargo The current object (for fluent API support)
     */
    public function setAccaRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->acca_r_fecha_creacion !== null || $dt !== null) {
            if ($this->acca_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->acca_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->acca_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ActividadCargoTableMap::COL_ACCA_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setAccaRFechaCreacion()

    /**
     * Sets the value of [acca_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\ActividadCargo The current object (for fluent API support)
     */
    public function setAccaRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->acca_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->acca_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->acca_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->acca_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ActividadCargoTableMap::COL_ACCA_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setAccaRFechaModificacion()

    /**
     * Set the value of [acca_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\ActividadCargo The current object (for fluent API support)
     */
    public function setAccaRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acca_r_usuario !== $v) {
            $this->acca_r_usuario = $v;
            $this->modifiedColumns[ActividadCargoTableMap::COL_ACCA_R_USUARIO] = true;
        }

        return $this;
    } // setAccaRUsuario()

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
            if ($this->acca_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ActividadCargoTableMap::translateFieldName('AccaCActividad', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acca_c_actividad = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ActividadCargoTableMap::translateFieldName('AccaCCargo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acca_c_cargo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ActividadCargoTableMap::translateFieldName('AccaVigente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acca_vigente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ActividadCargoTableMap::translateFieldName('AccaRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->acca_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ActividadCargoTableMap::translateFieldName('AccaRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->acca_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ActividadCargoTableMap::translateFieldName('AccaRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acca_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = ActividadCargoTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\ActividadCargo'), 0, $e);
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
        if ($this->aActividad !== null && $this->acca_c_actividad !== $this->aActividad->getActiCodigo()) {
            $this->aActividad = null;
        }
        if ($this->aCargo !== null && $this->acca_c_cargo !== $this->aCargo->getCargCodigo()) {
            $this->aCargo = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(ActividadCargoTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildActividadCargoQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aActividad = null;
            $this->aCargo = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see ActividadCargo::setDeleted()
     * @see ActividadCargo::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadCargoTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildActividadCargoQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadCargoTableMap::DATABASE_NAME);
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
                ActividadCargoTableMap::addInstanceToPool($this);
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

            if ($this->aActividad !== null) {
                if ($this->aActividad->isModified() || $this->aActividad->isNew()) {
                    $affectedRows += $this->aActividad->save($con);
                }
                $this->setActividad($this->aActividad);
            }

            if ($this->aCargo !== null) {
                if ($this->aCargo->isModified() || $this->aCargo->isNew()) {
                    $affectedRows += $this->aCargo->save($con);
                }
                $this->setCargo($this->aCargo);
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
        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD)) {
            $modifiedColumns[':p' . $index++]  = 'acca_c_actividad';
        }
        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_C_CARGO)) {
            $modifiedColumns[':p' . $index++]  = 'acca_c_cargo';
        }
        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_VIGENTE)) {
            $modifiedColumns[':p' . $index++]  = 'acca_vigente';
        }
        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'acca_r_fecha_creacion';
        }
        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'acca_r_fecha_modificacion';
        }
        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'acca_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO actividad_cargo (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'acca_c_actividad':
                        $stmt->bindValue($identifier, $this->acca_c_actividad, PDO::PARAM_INT);
                        break;
                    case 'acca_c_cargo':
                        $stmt->bindValue($identifier, $this->acca_c_cargo, PDO::PARAM_INT);
                        break;
                    case 'acca_vigente':
                        $stmt->bindValue($identifier, $this->acca_vigente, PDO::PARAM_INT);
                        break;
                    case 'acca_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->acca_r_fecha_creacion ? $this->acca_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'acca_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->acca_r_fecha_modificacion ? $this->acca_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'acca_r_usuario':
                        $stmt->bindValue($identifier, $this->acca_r_usuario, PDO::PARAM_INT);
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
        $pos = ActividadCargoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getAccaCActividad();
                break;
            case 1:
                return $this->getAccaCCargo();
                break;
            case 2:
                return $this->getAccaVigente();
                break;
            case 3:
                return $this->getAccaRFechaCreacion();
                break;
            case 4:
                return $this->getAccaRFechaModificacion();
                break;
            case 5:
                return $this->getAccaRUsuario();
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

        if (isset($alreadyDumpedObjects['ActividadCargo'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ActividadCargo'][$this->hashCode()] = true;
        $keys = ActividadCargoTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getAccaCActividad(),
            $keys[1] => $this->getAccaCCargo(),
            $keys[2] => $this->getAccaVigente(),
            $keys[3] => $this->getAccaRFechaCreacion(),
            $keys[4] => $this->getAccaRFechaModificacion(),
            $keys[5] => $this->getAccaRUsuario(),
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
            if (null !== $this->aActividad) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'actividad';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'actividad';
                        break;
                    default:
                        $key = 'Actividad';
                }

                $result[$key] = $this->aActividad->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCargo) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cargo';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'cargo';
                        break;
                    default:
                        $key = 'Cargo';
                }

                $result[$key] = $this->aCargo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\ActividadCargo
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ActividadCargoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\ActividadCargo
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setAccaCActividad($value);
                break;
            case 1:
                $this->setAccaCCargo($value);
                break;
            case 2:
                $this->setAccaVigente($value);
                break;
            case 3:
                $this->setAccaRFechaCreacion($value);
                break;
            case 4:
                $this->setAccaRFechaModificacion($value);
                break;
            case 5:
                $this->setAccaRUsuario($value);
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
        $keys = ActividadCargoTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setAccaCActividad($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setAccaCCargo($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAccaVigente($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAccaRFechaCreacion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setAccaRFechaModificacion($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setAccaRUsuario($arr[$keys[5]]);
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
     * @return $this|\ActividadCargo The current object, for fluid interface
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
        $criteria = new Criteria(ActividadCargoTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD)) {
            $criteria->add(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD, $this->acca_c_actividad);
        }
        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_C_CARGO)) {
            $criteria->add(ActividadCargoTableMap::COL_ACCA_C_CARGO, $this->acca_c_cargo);
        }
        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_VIGENTE)) {
            $criteria->add(ActividadCargoTableMap::COL_ACCA_VIGENTE, $this->acca_vigente);
        }
        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_R_FECHA_CREACION)) {
            $criteria->add(ActividadCargoTableMap::COL_ACCA_R_FECHA_CREACION, $this->acca_r_fecha_creacion);
        }
        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_R_FECHA_MODIFICACION)) {
            $criteria->add(ActividadCargoTableMap::COL_ACCA_R_FECHA_MODIFICACION, $this->acca_r_fecha_modificacion);
        }
        if ($this->isColumnModified(ActividadCargoTableMap::COL_ACCA_R_USUARIO)) {
            $criteria->add(ActividadCargoTableMap::COL_ACCA_R_USUARIO, $this->acca_r_usuario);
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
        $criteria = ChildActividadCargoQuery::create();
        $criteria->add(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD, $this->acca_c_actividad);
        $criteria->add(ActividadCargoTableMap::COL_ACCA_C_CARGO, $this->acca_c_cargo);

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
        $validPk = null !== $this->getAccaCActividad() &&
            null !== $this->getAccaCCargo();

        $validPrimaryKeyFKs = 2;
        $primaryKeyFKs = [];

        //relation actividad_cargo_actividad_fk to table actividad
        if ($this->aActividad && $hash = spl_object_hash($this->aActividad)) {
            $primaryKeyFKs[] = $hash;
        } else {
            $validPrimaryKeyFKs = false;
        }

        //relation actividad_cargo_cargo_fk to table cargo
        if ($this->aCargo && $hash = spl_object_hash($this->aCargo)) {
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
        $pks[0] = $this->getAccaCActividad();
        $pks[1] = $this->getAccaCCargo();

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
        $this->setAccaCActividad($keys[0]);
        $this->setAccaCCargo($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getAccaCActividad()) && (null === $this->getAccaCCargo());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \ActividadCargo (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setAccaCActividad($this->getAccaCActividad());
        $copyObj->setAccaCCargo($this->getAccaCCargo());
        $copyObj->setAccaVigente($this->getAccaVigente());
        $copyObj->setAccaRFechaCreacion($this->getAccaRFechaCreacion());
        $copyObj->setAccaRFechaModificacion($this->getAccaRFechaModificacion());
        $copyObj->setAccaRUsuario($this->getAccaRUsuario());
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
     * @return \ActividadCargo Clone of current object.
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
     * Declares an association between this object and a ChildActividad object.
     *
     * @param  ChildActividad $v
     * @return $this|\ActividadCargo The current object (for fluent API support)
     * @throws PropelException
     */
    public function setActividad(ChildActividad $v = null)
    {
        if ($v === null) {
            $this->setAccaCActividad(NULL);
        } else {
            $this->setAccaCActividad($v->getActiCodigo());
        }

        $this->aActividad = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildActividad object, it will not be re-added.
        if ($v !== null) {
            $v->addActividadCargo($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildActividad object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildActividad The associated ChildActividad object.
     * @throws PropelException
     */
    public function getActividad(ConnectionInterface $con = null)
    {
        if ($this->aActividad === null && ($this->acca_c_actividad != 0)) {
            $this->aActividad = ChildActividadQuery::create()->findPk($this->acca_c_actividad, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aActividad->addActividadCargos($this);
             */
        }

        return $this->aActividad;
    }

    /**
     * Declares an association between this object and a ChildCargo object.
     *
     * @param  ChildCargo $v
     * @return $this|\ActividadCargo The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCargo(ChildCargo $v = null)
    {
        if ($v === null) {
            $this->setAccaCCargo(NULL);
        } else {
            $this->setAccaCCargo($v->getCargCodigo());
        }

        $this->aCargo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCargo object, it will not be re-added.
        if ($v !== null) {
            $v->addActividadCargo($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCargo object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCargo The associated ChildCargo object.
     * @throws PropelException
     */
    public function getCargo(ConnectionInterface $con = null)
    {
        if ($this->aCargo === null && ($this->acca_c_cargo != 0)) {
            $this->aCargo = ChildCargoQuery::create()->findPk($this->acca_c_cargo, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCargo->addActividadCargos($this);
             */
        }

        return $this->aCargo;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aActividad) {
            $this->aActividad->removeActividadCargo($this);
        }
        if (null !== $this->aCargo) {
            $this->aCargo->removeActividadCargo($this);
        }
        $this->acca_c_actividad = null;
        $this->acca_c_cargo = null;
        $this->acca_vigente = null;
        $this->acca_r_fecha_creacion = null;
        $this->acca_r_fecha_modificacion = null;
        $this->acca_r_usuario = null;
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

        $this->aActividad = null;
        $this->aCargo = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ActividadCargoTableMap::DEFAULT_STRING_FORMAT);
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
