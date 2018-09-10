<?php

namespace Base;

use \Actividad as ChildActividad;
use \ActividadQuery as ChildActividadQuery;
use \TModalidad as ChildTModalidad;
use \TModalidadQuery as ChildTModalidadQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ActividadTableMap;
use Map\TModalidadTableMap;
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
 * Base class that represents a row from the 't_modalidad' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class TModalidad implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\TModalidadTableMap';


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
     * The value for the tmo_tipo field.
     *
     * @var        int
     */
    protected $tmo_tipo;

    /**
     * The value for the tmo_descripcion field.
     *
     * @var        string
     */
    protected $tmo_descripcion;

    /**
     * The value for the tmo_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $tmo_r_fecha_creacion;

    /**
     * The value for the tmo_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $tmo_r_fecha_modificacion;

    /**
     * The value for the tmo_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $tmo_r_usuario;

    /**
     * @var        ObjectCollection|ChildActividad[] Collection to store aggregation of ChildActividad objects.
     */
    protected $collActividads;
    protected $collActividadsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildActividad[]
     */
    protected $actividadsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->tmo_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\TModalidad object.
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
     * Compares this with another <code>TModalidad</code> instance.  If
     * <code>obj</code> is an instance of <code>TModalidad</code>, delegates to
     * <code>equals(TModalidad)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|TModalidad The current object, for fluid interface
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
     * Get the [tmo_tipo] column value.
     *
     * @return int
     */
    public function getTmoTipo()
    {
        return $this->tmo_tipo;
    }

    /**
     * Get the [tmo_descripcion] column value.
     *
     * @return string
     */
    public function getTmoDescripcion()
    {
        return $this->tmo_descripcion;
    }

    /**
     * Get the [optionally formatted] temporal [tmo_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmoRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->tmo_r_fecha_creacion;
        } else {
            return $this->tmo_r_fecha_creacion instanceof \DateTimeInterface ? $this->tmo_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [tmo_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmoRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->tmo_r_fecha_modificacion;
        } else {
            return $this->tmo_r_fecha_modificacion instanceof \DateTimeInterface ? $this->tmo_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [tmo_r_usuario] column value.
     *
     * @return int
     */
    public function getTmoRUsuario()
    {
        return $this->tmo_r_usuario;
    }

    /**
     * Set the value of [tmo_tipo] column.
     *
     * @param int $v new value
     * @return $this|\TModalidad The current object (for fluent API support)
     */
    public function setTmoTipo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tmo_tipo !== $v) {
            $this->tmo_tipo = $v;
            $this->modifiedColumns[TModalidadTableMap::COL_TMO_TIPO] = true;
        }

        return $this;
    } // setTmoTipo()

    /**
     * Set the value of [tmo_descripcion] column.
     *
     * @param string $v new value
     * @return $this|\TModalidad The current object (for fluent API support)
     */
    public function setTmoDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tmo_descripcion !== $v) {
            $this->tmo_descripcion = $v;
            $this->modifiedColumns[TModalidadTableMap::COL_TMO_DESCRIPCION] = true;
        }

        return $this;
    } // setTmoDescripcion()

    /**
     * Sets the value of [tmo_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\TModalidad The current object (for fluent API support)
     */
    public function setTmoRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmo_r_fecha_creacion !== null || $dt !== null) {
            if ($this->tmo_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->tmo_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->tmo_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TModalidadTableMap::COL_TMO_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setTmoRFechaCreacion()

    /**
     * Sets the value of [tmo_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\TModalidad The current object (for fluent API support)
     */
    public function setTmoRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmo_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->tmo_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->tmo_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->tmo_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TModalidadTableMap::COL_TMO_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setTmoRFechaModificacion()

    /**
     * Set the value of [tmo_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\TModalidad The current object (for fluent API support)
     */
    public function setTmoRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tmo_r_usuario !== $v) {
            $this->tmo_r_usuario = $v;
            $this->modifiedColumns[TModalidadTableMap::COL_TMO_R_USUARIO] = true;
        }

        return $this;
    } // setTmoRUsuario()

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
            if ($this->tmo_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TModalidadTableMap::translateFieldName('TmoTipo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tmo_tipo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TModalidadTableMap::translateFieldName('TmoDescripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tmo_descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TModalidadTableMap::translateFieldName('TmoRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->tmo_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TModalidadTableMap::translateFieldName('TmoRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->tmo_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TModalidadTableMap::translateFieldName('TmoRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tmo_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = TModalidadTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\TModalidad'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(TModalidadTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTModalidadQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collActividads = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see TModalidad::setDeleted()
     * @see TModalidad::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TModalidadTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTModalidadQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(TModalidadTableMap::DATABASE_NAME);
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
                TModalidadTableMap::addInstanceToPool($this);
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

            if ($this->actividadsScheduledForDeletion !== null) {
                if (!$this->actividadsScheduledForDeletion->isEmpty()) {
                    foreach ($this->actividadsScheduledForDeletion as $actividad) {
                        // need to save related object because we set the relation to null
                        $actividad->save($con);
                    }
                    $this->actividadsScheduledForDeletion = null;
                }
            }

            if ($this->collActividads !== null) {
                foreach ($this->collActividads as $referrerFK) {
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

        $this->modifiedColumns[TModalidadTableMap::COL_TMO_TIPO] = true;
        if (null !== $this->tmo_tipo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TModalidadTableMap::COL_TMO_TIPO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TModalidadTableMap::COL_TMO_TIPO)) {
            $modifiedColumns[':p' . $index++]  = 'tmo_tipo';
        }
        if ($this->isColumnModified(TModalidadTableMap::COL_TMO_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'tmo_descripcion';
        }
        if ($this->isColumnModified(TModalidadTableMap::COL_TMO_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'tmo_r_fecha_creacion';
        }
        if ($this->isColumnModified(TModalidadTableMap::COL_TMO_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'tmo_r_fecha_modificacion';
        }
        if ($this->isColumnModified(TModalidadTableMap::COL_TMO_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'tmo_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO t_modalidad (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'tmo_tipo':
                        $stmt->bindValue($identifier, $this->tmo_tipo, PDO::PARAM_INT);
                        break;
                    case 'tmo_descripcion':
                        $stmt->bindValue($identifier, $this->tmo_descripcion, PDO::PARAM_STR);
                        break;
                    case 'tmo_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->tmo_r_fecha_creacion ? $this->tmo_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tmo_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->tmo_r_fecha_modificacion ? $this->tmo_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tmo_r_usuario':
                        $stmt->bindValue($identifier, $this->tmo_r_usuario, PDO::PARAM_INT);
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
        $this->setTmoTipo($pk);

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
        $pos = TModalidadTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getTmoTipo();
                break;
            case 1:
                return $this->getTmoDescripcion();
                break;
            case 2:
                return $this->getTmoRFechaCreacion();
                break;
            case 3:
                return $this->getTmoRFechaModificacion();
                break;
            case 4:
                return $this->getTmoRUsuario();
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

        if (isset($alreadyDumpedObjects['TModalidad'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['TModalidad'][$this->hashCode()] = true;
        $keys = TModalidadTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTmoTipo(),
            $keys[1] => $this->getTmoDescripcion(),
            $keys[2] => $this->getTmoRFechaCreacion(),
            $keys[3] => $this->getTmoRFechaModificacion(),
            $keys[4] => $this->getTmoRUsuario(),
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
            if (null !== $this->collActividads) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'actividads';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'actividads';
                        break;
                    default:
                        $key = 'Actividads';
                }

                $result[$key] = $this->collActividads->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\TModalidad
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TModalidadTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\TModalidad
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setTmoTipo($value);
                break;
            case 1:
                $this->setTmoDescripcion($value);
                break;
            case 2:
                $this->setTmoRFechaCreacion($value);
                break;
            case 3:
                $this->setTmoRFechaModificacion($value);
                break;
            case 4:
                $this->setTmoRUsuario($value);
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
        $keys = TModalidadTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setTmoTipo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTmoDescripcion($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setTmoRFechaCreacion($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTmoRFechaModificacion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTmoRUsuario($arr[$keys[4]]);
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
     * @return $this|\TModalidad The current object, for fluid interface
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
        $criteria = new Criteria(TModalidadTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TModalidadTableMap::COL_TMO_TIPO)) {
            $criteria->add(TModalidadTableMap::COL_TMO_TIPO, $this->tmo_tipo);
        }
        if ($this->isColumnModified(TModalidadTableMap::COL_TMO_DESCRIPCION)) {
            $criteria->add(TModalidadTableMap::COL_TMO_DESCRIPCION, $this->tmo_descripcion);
        }
        if ($this->isColumnModified(TModalidadTableMap::COL_TMO_R_FECHA_CREACION)) {
            $criteria->add(TModalidadTableMap::COL_TMO_R_FECHA_CREACION, $this->tmo_r_fecha_creacion);
        }
        if ($this->isColumnModified(TModalidadTableMap::COL_TMO_R_FECHA_MODIFICACION)) {
            $criteria->add(TModalidadTableMap::COL_TMO_R_FECHA_MODIFICACION, $this->tmo_r_fecha_modificacion);
        }
        if ($this->isColumnModified(TModalidadTableMap::COL_TMO_R_USUARIO)) {
            $criteria->add(TModalidadTableMap::COL_TMO_R_USUARIO, $this->tmo_r_usuario);
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
        $criteria = ChildTModalidadQuery::create();
        $criteria->add(TModalidadTableMap::COL_TMO_TIPO, $this->tmo_tipo);

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
        $validPk = null !== $this->getTmoTipo();

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
        return $this->getTmoTipo();
    }

    /**
     * Generic method to set the primary key (tmo_tipo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTmoTipo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getTmoTipo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \TModalidad (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTmoDescripcion($this->getTmoDescripcion());
        $copyObj->setTmoRFechaCreacion($this->getTmoRFechaCreacion());
        $copyObj->setTmoRFechaModificacion($this->getTmoRFechaModificacion());
        $copyObj->setTmoRUsuario($this->getTmoRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getActividads() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActividad($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTmoTipo(NULL); // this is a auto-increment column, so set to default value
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
     * @return \TModalidad Clone of current object.
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
        if ('Actividad' == $relationName) {
            $this->initActividads();
            return;
        }
    }

    /**
     * Clears out the collActividads collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addActividads()
     */
    public function clearActividads()
    {
        $this->collActividads = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collActividads collection loaded partially.
     */
    public function resetPartialActividads($v = true)
    {
        $this->collActividadsPartial = $v;
    }

    /**
     * Initializes the collActividads collection.
     *
     * By default this just sets the collActividads collection to an empty array (like clearcollActividads());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActividads($overrideExisting = true)
    {
        if (null !== $this->collActividads && !$overrideExisting) {
            return;
        }

        $collectionClassName = ActividadTableMap::getTableMap()->getCollectionClassName();

        $this->collActividads = new $collectionClassName;
        $this->collActividads->setModel('\Actividad');
    }

    /**
     * Gets an array of ChildActividad objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTModalidad is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildActividad[] List of ChildActividad objects
     * @throws PropelException
     */
    public function getActividads(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collActividadsPartial && !$this->isNew();
        if (null === $this->collActividads || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActividads) {
                // return empty collection
                $this->initActividads();
            } else {
                $collActividads = ChildActividadQuery::create(null, $criteria)
                    ->filterByTModalidad($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collActividadsPartial && count($collActividads)) {
                        $this->initActividads(false);

                        foreach ($collActividads as $obj) {
                            if (false == $this->collActividads->contains($obj)) {
                                $this->collActividads->append($obj);
                            }
                        }

                        $this->collActividadsPartial = true;
                    }

                    return $collActividads;
                }

                if ($partial && $this->collActividads) {
                    foreach ($this->collActividads as $obj) {
                        if ($obj->isNew()) {
                            $collActividads[] = $obj;
                        }
                    }
                }

                $this->collActividads = $collActividads;
                $this->collActividadsPartial = false;
            }
        }

        return $this->collActividads;
    }

    /**
     * Sets a collection of ChildActividad objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $actividads A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTModalidad The current object (for fluent API support)
     */
    public function setActividads(Collection $actividads, ConnectionInterface $con = null)
    {
        /** @var ChildActividad[] $actividadsToDelete */
        $actividadsToDelete = $this->getActividads(new Criteria(), $con)->diff($actividads);


        $this->actividadsScheduledForDeletion = $actividadsToDelete;

        foreach ($actividadsToDelete as $actividadRemoved) {
            $actividadRemoved->setTModalidad(null);
        }

        $this->collActividads = null;
        foreach ($actividads as $actividad) {
            $this->addActividad($actividad);
        }

        $this->collActividads = $actividads;
        $this->collActividadsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Actividad objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Actividad objects.
     * @throws PropelException
     */
    public function countActividads(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collActividadsPartial && !$this->isNew();
        if (null === $this->collActividads || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActividads) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getActividads());
            }

            $query = ChildActividadQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTModalidad($this)
                ->count($con);
        }

        return count($this->collActividads);
    }

    /**
     * Method called to associate a ChildActividad object to this object
     * through the ChildActividad foreign key attribute.
     *
     * @param  ChildActividad $l ChildActividad
     * @return $this|\TModalidad The current object (for fluent API support)
     */
    public function addActividad(ChildActividad $l)
    {
        if ($this->collActividads === null) {
            $this->initActividads();
            $this->collActividadsPartial = true;
        }

        if (!$this->collActividads->contains($l)) {
            $this->doAddActividad($l);

            if ($this->actividadsScheduledForDeletion and $this->actividadsScheduledForDeletion->contains($l)) {
                $this->actividadsScheduledForDeletion->remove($this->actividadsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildActividad $actividad The ChildActividad object to add.
     */
    protected function doAddActividad(ChildActividad $actividad)
    {
        $this->collActividads[]= $actividad;
        $actividad->setTModalidad($this);
    }

    /**
     * @param  ChildActividad $actividad The ChildActividad object to remove.
     * @return $this|ChildTModalidad The current object (for fluent API support)
     */
    public function removeActividad(ChildActividad $actividad)
    {
        if ($this->getActividads()->contains($actividad)) {
            $pos = $this->collActividads->search($actividad);
            $this->collActividads->remove($pos);
            if (null === $this->actividadsScheduledForDeletion) {
                $this->actividadsScheduledForDeletion = clone $this->collActividads;
                $this->actividadsScheduledForDeletion->clear();
            }
            $this->actividadsScheduledForDeletion[]= $actividad;
            $actividad->setTModalidad(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TModalidad is new, it will return
     * an empty collection; or if this TModalidad has previously
     * been saved, it will retrieve related Actividads from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TModalidad.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildActividad[] List of ChildActividad objects
     */
    public function getActividadsJoinEActividad(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildActividadQuery::create(null, $criteria);
        $query->joinWith('EActividad', $joinBehavior);

        return $this->getActividads($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TModalidad is new, it will return
     * an empty collection; or if this TModalidad has previously
     * been saved, it will retrieve related Actividads from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TModalidad.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildActividad[] List of ChildActividad objects
     */
    public function getActividadsJoinTActividad(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildActividadQuery::create(null, $criteria);
        $query->joinWith('TActividad', $joinBehavior);

        return $this->getActividads($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TModalidad is new, it will return
     * an empty collection; or if this TModalidad has previously
     * been saved, it will retrieve related Actividads from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TModalidad.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildActividad[] List of ChildActividad objects
     */
    public function getActividadsJoinTHora(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildActividadQuery::create(null, $criteria);
        $query->joinWith('THora', $joinBehavior);

        return $this->getActividads($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->tmo_tipo = null;
        $this->tmo_descripcion = null;
        $this->tmo_r_fecha_creacion = null;
        $this->tmo_r_fecha_modificacion = null;
        $this->tmo_r_usuario = null;
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
            if ($this->collActividads) {
                foreach ($this->collActividads as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collActividads = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TModalidadTableMap::DEFAULT_STRING_FORMAT);
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
