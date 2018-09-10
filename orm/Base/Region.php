<?php

namespace Base;

use \Provincia as ChildProvincia;
use \ProvinciaQuery as ChildProvinciaQuery;
use \Region as ChildRegion;
use \RegionQuery as ChildRegionQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ProvinciaTableMap;
use Map\RegionTableMap;
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
 * Base class that represents a row from the 'region' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Region implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\RegionTableMap';


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
     * The value for the regi_codigo field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $regi_codigo;

    /**
     * The value for the regi_nombre field.
     *
     * @var        string
     */
    protected $regi_nombre;

    /**
     * The value for the regi_iso_3166_2_cl field.
     *
     * @var        string
     */
    protected $regi_iso_3166_2_cl;

    /**
     * The value for the regi_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $regi_r_fecha_creacion;

    /**
     * The value for the regi_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $regi_r_fecha_modificacion;

    /**
     * The value for the regi_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $regi_r_usuario;

    /**
     * @var        ObjectCollection|ChildProvincia[] Collection to store aggregation of ChildProvincia objects.
     */
    protected $collProvincias;
    protected $collProvinciasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildProvincia[]
     */
    protected $provinciasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->regi_codigo = 0;
        $this->regi_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Region object.
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
     * Compares this with another <code>Region</code> instance.  If
     * <code>obj</code> is an instance of <code>Region</code>, delegates to
     * <code>equals(Region)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Region The current object, for fluid interface
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
     * Get the [regi_codigo] column value.
     *
     * @return int
     */
    public function getRegiCodigo()
    {
        return $this->regi_codigo;
    }

    /**
     * Get the [regi_nombre] column value.
     *
     * @return string
     */
    public function getRegiNombre()
    {
        return $this->regi_nombre;
    }

    /**
     * Get the [regi_iso_3166_2_cl] column value.
     *
     * @return string
     */
    public function getRegiIso31662Cl()
    {
        return $this->regi_iso_3166_2_cl;
    }

    /**
     * Get the [optionally formatted] temporal [regi_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRegiRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->regi_r_fecha_creacion;
        } else {
            return $this->regi_r_fecha_creacion instanceof \DateTimeInterface ? $this->regi_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [regi_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRegiRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->regi_r_fecha_modificacion;
        } else {
            return $this->regi_r_fecha_modificacion instanceof \DateTimeInterface ? $this->regi_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [regi_r_usuario] column value.
     *
     * @return int
     */
    public function getRegiRUsuario()
    {
        return $this->regi_r_usuario;
    }

    /**
     * Set the value of [regi_codigo] column.
     *
     * @param int $v new value
     * @return $this|\Region The current object (for fluent API support)
     */
    public function setRegiCodigo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->regi_codigo !== $v) {
            $this->regi_codigo = $v;
            $this->modifiedColumns[RegionTableMap::COL_REGI_CODIGO] = true;
        }

        return $this;
    } // setRegiCodigo()

    /**
     * Set the value of [regi_nombre] column.
     *
     * @param string $v new value
     * @return $this|\Region The current object (for fluent API support)
     */
    public function setRegiNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->regi_nombre !== $v) {
            $this->regi_nombre = $v;
            $this->modifiedColumns[RegionTableMap::COL_REGI_NOMBRE] = true;
        }

        return $this;
    } // setRegiNombre()

    /**
     * Set the value of [regi_iso_3166_2_cl] column.
     *
     * @param string $v new value
     * @return $this|\Region The current object (for fluent API support)
     */
    public function setRegiIso31662Cl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->regi_iso_3166_2_cl !== $v) {
            $this->regi_iso_3166_2_cl = $v;
            $this->modifiedColumns[RegionTableMap::COL_REGI_ISO_3166_2_CL] = true;
        }

        return $this;
    } // setRegiIso31662Cl()

    /**
     * Sets the value of [regi_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Region The current object (for fluent API support)
     */
    public function setRegiRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->regi_r_fecha_creacion !== null || $dt !== null) {
            if ($this->regi_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->regi_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->regi_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[RegionTableMap::COL_REGI_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setRegiRFechaCreacion()

    /**
     * Sets the value of [regi_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Region The current object (for fluent API support)
     */
    public function setRegiRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->regi_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->regi_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->regi_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->regi_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[RegionTableMap::COL_REGI_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setRegiRFechaModificacion()

    /**
     * Set the value of [regi_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Region The current object (for fluent API support)
     */
    public function setRegiRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->regi_r_usuario !== $v) {
            $this->regi_r_usuario = $v;
            $this->modifiedColumns[RegionTableMap::COL_REGI_R_USUARIO] = true;
        }

        return $this;
    } // setRegiRUsuario()

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
            if ($this->regi_codigo !== 0) {
                return false;
            }

            if ($this->regi_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : RegionTableMap::translateFieldName('RegiCodigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regi_codigo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : RegionTableMap::translateFieldName('RegiNombre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regi_nombre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : RegionTableMap::translateFieldName('RegiIso31662Cl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regi_iso_3166_2_cl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : RegionTableMap::translateFieldName('RegiRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->regi_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : RegionTableMap::translateFieldName('RegiRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->regi_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : RegionTableMap::translateFieldName('RegiRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regi_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = RegionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Region'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(RegionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildRegionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collProvincias = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Region::setDeleted()
     * @see Region::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(RegionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildRegionQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(RegionTableMap::DATABASE_NAME);
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
                RegionTableMap::addInstanceToPool($this);
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

            if ($this->provinciasScheduledForDeletion !== null) {
                if (!$this->provinciasScheduledForDeletion->isEmpty()) {
                    foreach ($this->provinciasScheduledForDeletion as $provincia) {
                        // need to save related object because we set the relation to null
                        $provincia->save($con);
                    }
                    $this->provinciasScheduledForDeletion = null;
                }
            }

            if ($this->collProvincias !== null) {
                foreach ($this->collProvincias as $referrerFK) {
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RegionTableMap::COL_REGI_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'regi_codigo';
        }
        if ($this->isColumnModified(RegionTableMap::COL_REGI_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = 'regi_nombre';
        }
        if ($this->isColumnModified(RegionTableMap::COL_REGI_ISO_3166_2_CL)) {
            $modifiedColumns[':p' . $index++]  = 'regi_iso_3166_2_cl';
        }
        if ($this->isColumnModified(RegionTableMap::COL_REGI_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'regi_r_fecha_creacion';
        }
        if ($this->isColumnModified(RegionTableMap::COL_REGI_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'regi_r_fecha_modificacion';
        }
        if ($this->isColumnModified(RegionTableMap::COL_REGI_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'regi_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO region (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'regi_codigo':
                        $stmt->bindValue($identifier, $this->regi_codigo, PDO::PARAM_INT);
                        break;
                    case 'regi_nombre':
                        $stmt->bindValue($identifier, $this->regi_nombre, PDO::PARAM_STR);
                        break;
                    case 'regi_iso_3166_2_cl':
                        $stmt->bindValue($identifier, $this->regi_iso_3166_2_cl, PDO::PARAM_STR);
                        break;
                    case 'regi_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->regi_r_fecha_creacion ? $this->regi_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'regi_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->regi_r_fecha_modificacion ? $this->regi_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'regi_r_usuario':
                        $stmt->bindValue($identifier, $this->regi_r_usuario, PDO::PARAM_INT);
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
        $pos = RegionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getRegiCodigo();
                break;
            case 1:
                return $this->getRegiNombre();
                break;
            case 2:
                return $this->getRegiIso31662Cl();
                break;
            case 3:
                return $this->getRegiRFechaCreacion();
                break;
            case 4:
                return $this->getRegiRFechaModificacion();
                break;
            case 5:
                return $this->getRegiRUsuario();
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

        if (isset($alreadyDumpedObjects['Region'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Region'][$this->hashCode()] = true;
        $keys = RegionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRegiCodigo(),
            $keys[1] => $this->getRegiNombre(),
            $keys[2] => $this->getRegiIso31662Cl(),
            $keys[3] => $this->getRegiRFechaCreacion(),
            $keys[4] => $this->getRegiRFechaModificacion(),
            $keys[5] => $this->getRegiRUsuario(),
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
            if (null !== $this->collProvincias) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'provincias';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'provincias';
                        break;
                    default:
                        $key = 'Provincias';
                }

                $result[$key] = $this->collProvincias->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Region
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = RegionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Region
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setRegiCodigo($value);
                break;
            case 1:
                $this->setRegiNombre($value);
                break;
            case 2:
                $this->setRegiIso31662Cl($value);
                break;
            case 3:
                $this->setRegiRFechaCreacion($value);
                break;
            case 4:
                $this->setRegiRFechaModificacion($value);
                break;
            case 5:
                $this->setRegiRUsuario($value);
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
        $keys = RegionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setRegiCodigo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRegiNombre($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setRegiIso31662Cl($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setRegiRFechaCreacion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setRegiRFechaModificacion($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setRegiRUsuario($arr[$keys[5]]);
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
     * @return $this|\Region The current object, for fluid interface
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
        $criteria = new Criteria(RegionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(RegionTableMap::COL_REGI_CODIGO)) {
            $criteria->add(RegionTableMap::COL_REGI_CODIGO, $this->regi_codigo);
        }
        if ($this->isColumnModified(RegionTableMap::COL_REGI_NOMBRE)) {
            $criteria->add(RegionTableMap::COL_REGI_NOMBRE, $this->regi_nombre);
        }
        if ($this->isColumnModified(RegionTableMap::COL_REGI_ISO_3166_2_CL)) {
            $criteria->add(RegionTableMap::COL_REGI_ISO_3166_2_CL, $this->regi_iso_3166_2_cl);
        }
        if ($this->isColumnModified(RegionTableMap::COL_REGI_R_FECHA_CREACION)) {
            $criteria->add(RegionTableMap::COL_REGI_R_FECHA_CREACION, $this->regi_r_fecha_creacion);
        }
        if ($this->isColumnModified(RegionTableMap::COL_REGI_R_FECHA_MODIFICACION)) {
            $criteria->add(RegionTableMap::COL_REGI_R_FECHA_MODIFICACION, $this->regi_r_fecha_modificacion);
        }
        if ($this->isColumnModified(RegionTableMap::COL_REGI_R_USUARIO)) {
            $criteria->add(RegionTableMap::COL_REGI_R_USUARIO, $this->regi_r_usuario);
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
        $criteria = ChildRegionQuery::create();
        $criteria->add(RegionTableMap::COL_REGI_CODIGO, $this->regi_codigo);

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
        $validPk = null !== $this->getRegiCodigo();

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
        return $this->getRegiCodigo();
    }

    /**
     * Generic method to set the primary key (regi_codigo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRegiCodigo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getRegiCodigo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Region (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRegiCodigo($this->getRegiCodigo());
        $copyObj->setRegiNombre($this->getRegiNombre());
        $copyObj->setRegiIso31662Cl($this->getRegiIso31662Cl());
        $copyObj->setRegiRFechaCreacion($this->getRegiRFechaCreacion());
        $copyObj->setRegiRFechaModificacion($this->getRegiRFechaModificacion());
        $copyObj->setRegiRUsuario($this->getRegiRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getProvincias() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProvincia($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

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
     * @return \Region Clone of current object.
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
        if ('Provincia' == $relationName) {
            $this->initProvincias();
            return;
        }
    }

    /**
     * Clears out the collProvincias collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProvincias()
     */
    public function clearProvincias()
    {
        $this->collProvincias = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collProvincias collection loaded partially.
     */
    public function resetPartialProvincias($v = true)
    {
        $this->collProvinciasPartial = $v;
    }

    /**
     * Initializes the collProvincias collection.
     *
     * By default this just sets the collProvincias collection to an empty array (like clearcollProvincias());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProvincias($overrideExisting = true)
    {
        if (null !== $this->collProvincias && !$overrideExisting) {
            return;
        }

        $collectionClassName = ProvinciaTableMap::getTableMap()->getCollectionClassName();

        $this->collProvincias = new $collectionClassName;
        $this->collProvincias->setModel('\Provincia');
    }

    /**
     * Gets an array of ChildProvincia objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildRegion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildProvincia[] List of ChildProvincia objects
     * @throws PropelException
     */
    public function getProvincias(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collProvinciasPartial && !$this->isNew();
        if (null === $this->collProvincias || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProvincias) {
                // return empty collection
                $this->initProvincias();
            } else {
                $collProvincias = ChildProvinciaQuery::create(null, $criteria)
                    ->filterByRegion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collProvinciasPartial && count($collProvincias)) {
                        $this->initProvincias(false);

                        foreach ($collProvincias as $obj) {
                            if (false == $this->collProvincias->contains($obj)) {
                                $this->collProvincias->append($obj);
                            }
                        }

                        $this->collProvinciasPartial = true;
                    }

                    return $collProvincias;
                }

                if ($partial && $this->collProvincias) {
                    foreach ($this->collProvincias as $obj) {
                        if ($obj->isNew()) {
                            $collProvincias[] = $obj;
                        }
                    }
                }

                $this->collProvincias = $collProvincias;
                $this->collProvinciasPartial = false;
            }
        }

        return $this->collProvincias;
    }

    /**
     * Sets a collection of ChildProvincia objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $provincias A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildRegion The current object (for fluent API support)
     */
    public function setProvincias(Collection $provincias, ConnectionInterface $con = null)
    {
        /** @var ChildProvincia[] $provinciasToDelete */
        $provinciasToDelete = $this->getProvincias(new Criteria(), $con)->diff($provincias);


        $this->provinciasScheduledForDeletion = $provinciasToDelete;

        foreach ($provinciasToDelete as $provinciaRemoved) {
            $provinciaRemoved->setRegion(null);
        }

        $this->collProvincias = null;
        foreach ($provincias as $provincia) {
            $this->addProvincia($provincia);
        }

        $this->collProvincias = $provincias;
        $this->collProvinciasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Provincia objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Provincia objects.
     * @throws PropelException
     */
    public function countProvincias(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collProvinciasPartial && !$this->isNew();
        if (null === $this->collProvincias || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProvincias) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProvincias());
            }

            $query = ChildProvinciaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRegion($this)
                ->count($con);
        }

        return count($this->collProvincias);
    }

    /**
     * Method called to associate a ChildProvincia object to this object
     * through the ChildProvincia foreign key attribute.
     *
     * @param  ChildProvincia $l ChildProvincia
     * @return $this|\Region The current object (for fluent API support)
     */
    public function addProvincia(ChildProvincia $l)
    {
        if ($this->collProvincias === null) {
            $this->initProvincias();
            $this->collProvinciasPartial = true;
        }

        if (!$this->collProvincias->contains($l)) {
            $this->doAddProvincia($l);

            if ($this->provinciasScheduledForDeletion and $this->provinciasScheduledForDeletion->contains($l)) {
                $this->provinciasScheduledForDeletion->remove($this->provinciasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildProvincia $provincia The ChildProvincia object to add.
     */
    protected function doAddProvincia(ChildProvincia $provincia)
    {
        $this->collProvincias[]= $provincia;
        $provincia->setRegion($this);
    }

    /**
     * @param  ChildProvincia $provincia The ChildProvincia object to remove.
     * @return $this|ChildRegion The current object (for fluent API support)
     */
    public function removeProvincia(ChildProvincia $provincia)
    {
        if ($this->getProvincias()->contains($provincia)) {
            $pos = $this->collProvincias->search($provincia);
            $this->collProvincias->remove($pos);
            if (null === $this->provinciasScheduledForDeletion) {
                $this->provinciasScheduledForDeletion = clone $this->collProvincias;
                $this->provinciasScheduledForDeletion->clear();
            }
            $this->provinciasScheduledForDeletion[]= $provincia;
            $provincia->setRegion(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->regi_codigo = null;
        $this->regi_nombre = null;
        $this->regi_iso_3166_2_cl = null;
        $this->regi_r_fecha_creacion = null;
        $this->regi_r_fecha_modificacion = null;
        $this->regi_r_usuario = null;
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
            if ($this->collProvincias) {
                foreach ($this->collProvincias as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collProvincias = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RegionTableMap::DEFAULT_STRING_FORMAT);
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
