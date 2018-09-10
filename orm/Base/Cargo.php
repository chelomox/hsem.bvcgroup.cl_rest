<?php

namespace Base;

use \ActividadCargo as ChildActividadCargo;
use \ActividadCargoQuery as ChildActividadCargoQuery;
use \Cargo as ChildCargo;
use \CargoGrupoSence as ChildCargoGrupoSence;
use \CargoGrupoSenceQuery as ChildCargoGrupoSenceQuery;
use \CargoQuery as ChildCargoQuery;
use \Especialidad as ChildEspecialidad;
use \EspecialidadQuery as ChildEspecialidadQuery;
use \TRelacionFaena as ChildTRelacionFaena;
use \TRelacionFaenaQuery as ChildTRelacionFaenaQuery;
use \Trabajador as ChildTrabajador;
use \TrabajadorQuery as ChildTrabajadorQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ActividadCargoTableMap;
use Map\CargoGrupoSenceTableMap;
use Map\CargoTableMap;
use Map\TrabajadorTableMap;
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
 * Base class that represents a row from the 'cargo' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Cargo implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CargoTableMap';


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
     * The value for the carg_codigo field.
     *
     * @var        int
     */
    protected $carg_codigo;

    /**
     * The value for the carg_c_especialidad field.
     *
     * @var        int
     */
    protected $carg_c_especialidad;

    /**
     * The value for the carg_t_relacion_faena field.
     *
     * @var        int
     */
    protected $carg_t_relacion_faena;

    /**
     * The value for the carg_sigla field.
     *
     * @var        string
     */
    protected $carg_sigla;

    /**
     * The value for the carg_descripcion field.
     *
     * @var        string
     */
    protected $carg_descripcion;

    /**
     * The value for the carg_vigente field.
     *
     * @var        int
     */
    protected $carg_vigente;

    /**
     * The value for the carg_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $carg_r_fecha_creacion;

    /**
     * The value for the carg_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $carg_r_fecha_modificacion;

    /**
     * The value for the carg_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $carg_r_usuario;

    /**
     * @var        ChildEspecialidad
     */
    protected $aEspecialidad;

    /**
     * @var        ChildTRelacionFaena
     */
    protected $aTRelacionFaena;

    /**
     * @var        ObjectCollection|ChildActividadCargo[] Collection to store aggregation of ChildActividadCargo objects.
     */
    protected $collActividadCargos;
    protected $collActividadCargosPartial;

    /**
     * @var        ObjectCollection|ChildCargoGrupoSence[] Collection to store aggregation of ChildCargoGrupoSence objects.
     */
    protected $collCargoGrupoSences;
    protected $collCargoGrupoSencesPartial;

    /**
     * @var        ObjectCollection|ChildTrabajador[] Collection to store aggregation of ChildTrabajador objects.
     */
    protected $collTrabajadors;
    protected $collTrabajadorsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildActividadCargo[]
     */
    protected $actividadCargosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCargoGrupoSence[]
     */
    protected $cargoGrupoSencesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTrabajador[]
     */
    protected $trabajadorsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->carg_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Cargo object.
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
     * Compares this with another <code>Cargo</code> instance.  If
     * <code>obj</code> is an instance of <code>Cargo</code>, delegates to
     * <code>equals(Cargo)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Cargo The current object, for fluid interface
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
     * Get the [carg_codigo] column value.
     *
     * @return int
     */
    public function getCargCodigo()
    {
        return $this->carg_codigo;
    }

    /**
     * Get the [carg_c_especialidad] column value.
     *
     * @return int
     */
    public function getCargCEspecialidad()
    {
        return $this->carg_c_especialidad;
    }

    /**
     * Get the [carg_t_relacion_faena] column value.
     *
     * @return int
     */
    public function getCargTRelacionFaena()
    {
        return $this->carg_t_relacion_faena;
    }

    /**
     * Get the [carg_sigla] column value.
     *
     * @return string
     */
    public function getCargSigla()
    {
        return $this->carg_sigla;
    }

    /**
     * Get the [carg_descripcion] column value.
     *
     * @return string
     */
    public function getCargDescripcion()
    {
        return $this->carg_descripcion;
    }

    /**
     * Get the [carg_vigente] column value.
     *
     * @return int
     */
    public function getCargVigente()
    {
        return $this->carg_vigente;
    }

    /**
     * Get the [optionally formatted] temporal [carg_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCargRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->carg_r_fecha_creacion;
        } else {
            return $this->carg_r_fecha_creacion instanceof \DateTimeInterface ? $this->carg_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [carg_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCargRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->carg_r_fecha_modificacion;
        } else {
            return $this->carg_r_fecha_modificacion instanceof \DateTimeInterface ? $this->carg_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [carg_r_usuario] column value.
     *
     * @return int
     */
    public function getCargRUsuario()
    {
        return $this->carg_r_usuario;
    }

    /**
     * Set the value of [carg_codigo] column.
     *
     * @param int $v new value
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function setCargCodigo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->carg_codigo !== $v) {
            $this->carg_codigo = $v;
            $this->modifiedColumns[CargoTableMap::COL_CARG_CODIGO] = true;
        }

        return $this;
    } // setCargCodigo()

    /**
     * Set the value of [carg_c_especialidad] column.
     *
     * @param int $v new value
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function setCargCEspecialidad($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->carg_c_especialidad !== $v) {
            $this->carg_c_especialidad = $v;
            $this->modifiedColumns[CargoTableMap::COL_CARG_C_ESPECIALIDAD] = true;
        }

        if ($this->aEspecialidad !== null && $this->aEspecialidad->getEspeCodigo() !== $v) {
            $this->aEspecialidad = null;
        }

        return $this;
    } // setCargCEspecialidad()

    /**
     * Set the value of [carg_t_relacion_faena] column.
     *
     * @param int $v new value
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function setCargTRelacionFaena($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->carg_t_relacion_faena !== $v) {
            $this->carg_t_relacion_faena = $v;
            $this->modifiedColumns[CargoTableMap::COL_CARG_T_RELACION_FAENA] = true;
        }

        if ($this->aTRelacionFaena !== null && $this->aTRelacionFaena->getTrefaTipo() !== $v) {
            $this->aTRelacionFaena = null;
        }

        return $this;
    } // setCargTRelacionFaena()

    /**
     * Set the value of [carg_sigla] column.
     *
     * @param string $v new value
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function setCargSigla($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->carg_sigla !== $v) {
            $this->carg_sigla = $v;
            $this->modifiedColumns[CargoTableMap::COL_CARG_SIGLA] = true;
        }

        return $this;
    } // setCargSigla()

    /**
     * Set the value of [carg_descripcion] column.
     *
     * @param string $v new value
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function setCargDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->carg_descripcion !== $v) {
            $this->carg_descripcion = $v;
            $this->modifiedColumns[CargoTableMap::COL_CARG_DESCRIPCION] = true;
        }

        return $this;
    } // setCargDescripcion()

    /**
     * Set the value of [carg_vigente] column.
     *
     * @param int $v new value
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function setCargVigente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->carg_vigente !== $v) {
            $this->carg_vigente = $v;
            $this->modifiedColumns[CargoTableMap::COL_CARG_VIGENTE] = true;
        }

        return $this;
    } // setCargVigente()

    /**
     * Sets the value of [carg_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function setCargRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->carg_r_fecha_creacion !== null || $dt !== null) {
            if ($this->carg_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->carg_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->carg_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CargoTableMap::COL_CARG_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setCargRFechaCreacion()

    /**
     * Sets the value of [carg_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function setCargRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->carg_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->carg_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->carg_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->carg_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CargoTableMap::COL_CARG_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setCargRFechaModificacion()

    /**
     * Set the value of [carg_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function setCargRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->carg_r_usuario !== $v) {
            $this->carg_r_usuario = $v;
            $this->modifiedColumns[CargoTableMap::COL_CARG_R_USUARIO] = true;
        }

        return $this;
    } // setCargRUsuario()

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
            if ($this->carg_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CargoTableMap::translateFieldName('CargCodigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carg_codigo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CargoTableMap::translateFieldName('CargCEspecialidad', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carg_c_especialidad = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CargoTableMap::translateFieldName('CargTRelacionFaena', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carg_t_relacion_faena = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CargoTableMap::translateFieldName('CargSigla', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carg_sigla = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CargoTableMap::translateFieldName('CargDescripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carg_descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CargoTableMap::translateFieldName('CargVigente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carg_vigente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CargoTableMap::translateFieldName('CargRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->carg_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CargoTableMap::translateFieldName('CargRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->carg_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CargoTableMap::translateFieldName('CargRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carg_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = CargoTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Cargo'), 0, $e);
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
        if ($this->aEspecialidad !== null && $this->carg_c_especialidad !== $this->aEspecialidad->getEspeCodigo()) {
            $this->aEspecialidad = null;
        }
        if ($this->aTRelacionFaena !== null && $this->carg_t_relacion_faena !== $this->aTRelacionFaena->getTrefaTipo()) {
            $this->aTRelacionFaena = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(CargoTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCargoQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEspecialidad = null;
            $this->aTRelacionFaena = null;
            $this->collActividadCargos = null;

            $this->collCargoGrupoSences = null;

            $this->collTrabajadors = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Cargo::setDeleted()
     * @see Cargo::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CargoTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCargoQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CargoTableMap::DATABASE_NAME);
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
                CargoTableMap::addInstanceToPool($this);
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

            if ($this->aEspecialidad !== null) {
                if ($this->aEspecialidad->isModified() || $this->aEspecialidad->isNew()) {
                    $affectedRows += $this->aEspecialidad->save($con);
                }
                $this->setEspecialidad($this->aEspecialidad);
            }

            if ($this->aTRelacionFaena !== null) {
                if ($this->aTRelacionFaena->isModified() || $this->aTRelacionFaena->isNew()) {
                    $affectedRows += $this->aTRelacionFaena->save($con);
                }
                $this->setTRelacionFaena($this->aTRelacionFaena);
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

            if ($this->actividadCargosScheduledForDeletion !== null) {
                if (!$this->actividadCargosScheduledForDeletion->isEmpty()) {
                    \ActividadCargoQuery::create()
                        ->filterByPrimaryKeys($this->actividadCargosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actividadCargosScheduledForDeletion = null;
                }
            }

            if ($this->collActividadCargos !== null) {
                foreach ($this->collActividadCargos as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cargoGrupoSencesScheduledForDeletion !== null) {
                if (!$this->cargoGrupoSencesScheduledForDeletion->isEmpty()) {
                    \CargoGrupoSenceQuery::create()
                        ->filterByPrimaryKeys($this->cargoGrupoSencesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cargoGrupoSencesScheduledForDeletion = null;
                }
            }

            if ($this->collCargoGrupoSences !== null) {
                foreach ($this->collCargoGrupoSences as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->trabajadorsScheduledForDeletion !== null) {
                if (!$this->trabajadorsScheduledForDeletion->isEmpty()) {
                    \TrabajadorQuery::create()
                        ->filterByPrimaryKeys($this->trabajadorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->trabajadorsScheduledForDeletion = null;
                }
            }

            if ($this->collTrabajadors !== null) {
                foreach ($this->collTrabajadors as $referrerFK) {
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

        $this->modifiedColumns[CargoTableMap::COL_CARG_CODIGO] = true;
        if (null !== $this->carg_codigo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CargoTableMap::COL_CARG_CODIGO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CargoTableMap::COL_CARG_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'carg_codigo';
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_C_ESPECIALIDAD)) {
            $modifiedColumns[':p' . $index++]  = 'carg_c_especialidad';
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_T_RELACION_FAENA)) {
            $modifiedColumns[':p' . $index++]  = 'carg_t_relacion_faena';
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_SIGLA)) {
            $modifiedColumns[':p' . $index++]  = 'carg_sigla';
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'carg_descripcion';
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_VIGENTE)) {
            $modifiedColumns[':p' . $index++]  = 'carg_vigente';
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'carg_r_fecha_creacion';
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'carg_r_fecha_modificacion';
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'carg_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO cargo (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'carg_codigo':
                        $stmt->bindValue($identifier, $this->carg_codigo, PDO::PARAM_INT);
                        break;
                    case 'carg_c_especialidad':
                        $stmt->bindValue($identifier, $this->carg_c_especialidad, PDO::PARAM_INT);
                        break;
                    case 'carg_t_relacion_faena':
                        $stmt->bindValue($identifier, $this->carg_t_relacion_faena, PDO::PARAM_INT);
                        break;
                    case 'carg_sigla':
                        $stmt->bindValue($identifier, $this->carg_sigla, PDO::PARAM_STR);
                        break;
                    case 'carg_descripcion':
                        $stmt->bindValue($identifier, $this->carg_descripcion, PDO::PARAM_STR);
                        break;
                    case 'carg_vigente':
                        $stmt->bindValue($identifier, $this->carg_vigente, PDO::PARAM_INT);
                        break;
                    case 'carg_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->carg_r_fecha_creacion ? $this->carg_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'carg_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->carg_r_fecha_modificacion ? $this->carg_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'carg_r_usuario':
                        $stmt->bindValue($identifier, $this->carg_r_usuario, PDO::PARAM_INT);
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
        $this->setCargCodigo($pk);

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
        $pos = CargoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getCargCodigo();
                break;
            case 1:
                return $this->getCargCEspecialidad();
                break;
            case 2:
                return $this->getCargTRelacionFaena();
                break;
            case 3:
                return $this->getCargSigla();
                break;
            case 4:
                return $this->getCargDescripcion();
                break;
            case 5:
                return $this->getCargVigente();
                break;
            case 6:
                return $this->getCargRFechaCreacion();
                break;
            case 7:
                return $this->getCargRFechaModificacion();
                break;
            case 8:
                return $this->getCargRUsuario();
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

        if (isset($alreadyDumpedObjects['Cargo'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Cargo'][$this->hashCode()] = true;
        $keys = CargoTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCargCodigo(),
            $keys[1] => $this->getCargCEspecialidad(),
            $keys[2] => $this->getCargTRelacionFaena(),
            $keys[3] => $this->getCargSigla(),
            $keys[4] => $this->getCargDescripcion(),
            $keys[5] => $this->getCargVigente(),
            $keys[6] => $this->getCargRFechaCreacion(),
            $keys[7] => $this->getCargRFechaModificacion(),
            $keys[8] => $this->getCargRUsuario(),
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
            if (null !== $this->aEspecialidad) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'especialidad';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'especialidad';
                        break;
                    default:
                        $key = 'Especialidad';
                }

                $result[$key] = $this->aEspecialidad->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTRelacionFaena) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tRelacionFaena';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_relacion_faena';
                        break;
                    default:
                        $key = 'TRelacionFaena';
                }

                $result[$key] = $this->aTRelacionFaena->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collActividadCargos) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'actividadCargos';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'actividad_cargos';
                        break;
                    default:
                        $key = 'ActividadCargos';
                }

                $result[$key] = $this->collActividadCargos->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCargoGrupoSences) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cargoGrupoSences';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'cargo_grupo_sences';
                        break;
                    default:
                        $key = 'CargoGrupoSences';
                }

                $result[$key] = $this->collCargoGrupoSences->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTrabajadors) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'trabajadors';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'trabajadors';
                        break;
                    default:
                        $key = 'Trabajadors';
                }

                $result[$key] = $this->collTrabajadors->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Cargo
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CargoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Cargo
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setCargCodigo($value);
                break;
            case 1:
                $this->setCargCEspecialidad($value);
                break;
            case 2:
                $this->setCargTRelacionFaena($value);
                break;
            case 3:
                $this->setCargSigla($value);
                break;
            case 4:
                $this->setCargDescripcion($value);
                break;
            case 5:
                $this->setCargVigente($value);
                break;
            case 6:
                $this->setCargRFechaCreacion($value);
                break;
            case 7:
                $this->setCargRFechaModificacion($value);
                break;
            case 8:
                $this->setCargRUsuario($value);
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
        $keys = CargoTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setCargCodigo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCargCEspecialidad($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCargTRelacionFaena($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCargSigla($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCargDescripcion($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCargVigente($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCargRFechaCreacion($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCargRFechaModificacion($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setCargRUsuario($arr[$keys[8]]);
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
     * @return $this|\Cargo The current object, for fluid interface
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
        $criteria = new Criteria(CargoTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CargoTableMap::COL_CARG_CODIGO)) {
            $criteria->add(CargoTableMap::COL_CARG_CODIGO, $this->carg_codigo);
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_C_ESPECIALIDAD)) {
            $criteria->add(CargoTableMap::COL_CARG_C_ESPECIALIDAD, $this->carg_c_especialidad);
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_T_RELACION_FAENA)) {
            $criteria->add(CargoTableMap::COL_CARG_T_RELACION_FAENA, $this->carg_t_relacion_faena);
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_SIGLA)) {
            $criteria->add(CargoTableMap::COL_CARG_SIGLA, $this->carg_sigla);
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_DESCRIPCION)) {
            $criteria->add(CargoTableMap::COL_CARG_DESCRIPCION, $this->carg_descripcion);
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_VIGENTE)) {
            $criteria->add(CargoTableMap::COL_CARG_VIGENTE, $this->carg_vigente);
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_R_FECHA_CREACION)) {
            $criteria->add(CargoTableMap::COL_CARG_R_FECHA_CREACION, $this->carg_r_fecha_creacion);
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_R_FECHA_MODIFICACION)) {
            $criteria->add(CargoTableMap::COL_CARG_R_FECHA_MODIFICACION, $this->carg_r_fecha_modificacion);
        }
        if ($this->isColumnModified(CargoTableMap::COL_CARG_R_USUARIO)) {
            $criteria->add(CargoTableMap::COL_CARG_R_USUARIO, $this->carg_r_usuario);
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
        $criteria = ChildCargoQuery::create();
        $criteria->add(CargoTableMap::COL_CARG_CODIGO, $this->carg_codigo);

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
        $validPk = null !== $this->getCargCodigo();

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
        return $this->getCargCodigo();
    }

    /**
     * Generic method to set the primary key (carg_codigo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCargCodigo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getCargCodigo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Cargo (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCargCEspecialidad($this->getCargCEspecialidad());
        $copyObj->setCargTRelacionFaena($this->getCargTRelacionFaena());
        $copyObj->setCargSigla($this->getCargSigla());
        $copyObj->setCargDescripcion($this->getCargDescripcion());
        $copyObj->setCargVigente($this->getCargVigente());
        $copyObj->setCargRFechaCreacion($this->getCargRFechaCreacion());
        $copyObj->setCargRFechaModificacion($this->getCargRFechaModificacion());
        $copyObj->setCargRUsuario($this->getCargRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getActividadCargos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActividadCargo($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCargoGrupoSences() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCargoGrupoSence($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTrabajadors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTrabajador($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setCargCodigo(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Cargo Clone of current object.
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
     * Declares an association between this object and a ChildEspecialidad object.
     *
     * @param  ChildEspecialidad $v
     * @return $this|\Cargo The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEspecialidad(ChildEspecialidad $v = null)
    {
        if ($v === null) {
            $this->setCargCEspecialidad(NULL);
        } else {
            $this->setCargCEspecialidad($v->getEspeCodigo());
        }

        $this->aEspecialidad = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEspecialidad object, it will not be re-added.
        if ($v !== null) {
            $v->addCargo($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEspecialidad object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEspecialidad The associated ChildEspecialidad object.
     * @throws PropelException
     */
    public function getEspecialidad(ConnectionInterface $con = null)
    {
        if ($this->aEspecialidad === null && ($this->carg_c_especialidad != 0)) {
            $this->aEspecialidad = ChildEspecialidadQuery::create()->findPk($this->carg_c_especialidad, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEspecialidad->addCargos($this);
             */
        }

        return $this->aEspecialidad;
    }

    /**
     * Declares an association between this object and a ChildTRelacionFaena object.
     *
     * @param  ChildTRelacionFaena $v
     * @return $this|\Cargo The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTRelacionFaena(ChildTRelacionFaena $v = null)
    {
        if ($v === null) {
            $this->setCargTRelacionFaena(NULL);
        } else {
            $this->setCargTRelacionFaena($v->getTrefaTipo());
        }

        $this->aTRelacionFaena = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTRelacionFaena object, it will not be re-added.
        if ($v !== null) {
            $v->addCargo($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTRelacionFaena object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTRelacionFaena The associated ChildTRelacionFaena object.
     * @throws PropelException
     */
    public function getTRelacionFaena(ConnectionInterface $con = null)
    {
        if ($this->aTRelacionFaena === null && ($this->carg_t_relacion_faena != 0)) {
            $this->aTRelacionFaena = ChildTRelacionFaenaQuery::create()->findPk($this->carg_t_relacion_faena, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTRelacionFaena->addCargos($this);
             */
        }

        return $this->aTRelacionFaena;
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
        if ('ActividadCargo' == $relationName) {
            $this->initActividadCargos();
            return;
        }
        if ('CargoGrupoSence' == $relationName) {
            $this->initCargoGrupoSences();
            return;
        }
        if ('Trabajador' == $relationName) {
            $this->initTrabajadors();
            return;
        }
    }

    /**
     * Clears out the collActividadCargos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addActividadCargos()
     */
    public function clearActividadCargos()
    {
        $this->collActividadCargos = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collActividadCargos collection loaded partially.
     */
    public function resetPartialActividadCargos($v = true)
    {
        $this->collActividadCargosPartial = $v;
    }

    /**
     * Initializes the collActividadCargos collection.
     *
     * By default this just sets the collActividadCargos collection to an empty array (like clearcollActividadCargos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActividadCargos($overrideExisting = true)
    {
        if (null !== $this->collActividadCargos && !$overrideExisting) {
            return;
        }

        $collectionClassName = ActividadCargoTableMap::getTableMap()->getCollectionClassName();

        $this->collActividadCargos = new $collectionClassName;
        $this->collActividadCargos->setModel('\ActividadCargo');
    }

    /**
     * Gets an array of ChildActividadCargo objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCargo is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildActividadCargo[] List of ChildActividadCargo objects
     * @throws PropelException
     */
    public function getActividadCargos(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collActividadCargosPartial && !$this->isNew();
        if (null === $this->collActividadCargos || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActividadCargos) {
                // return empty collection
                $this->initActividadCargos();
            } else {
                $collActividadCargos = ChildActividadCargoQuery::create(null, $criteria)
                    ->filterByCargo($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collActividadCargosPartial && count($collActividadCargos)) {
                        $this->initActividadCargos(false);

                        foreach ($collActividadCargos as $obj) {
                            if (false == $this->collActividadCargos->contains($obj)) {
                                $this->collActividadCargos->append($obj);
                            }
                        }

                        $this->collActividadCargosPartial = true;
                    }

                    return $collActividadCargos;
                }

                if ($partial && $this->collActividadCargos) {
                    foreach ($this->collActividadCargos as $obj) {
                        if ($obj->isNew()) {
                            $collActividadCargos[] = $obj;
                        }
                    }
                }

                $this->collActividadCargos = $collActividadCargos;
                $this->collActividadCargosPartial = false;
            }
        }

        return $this->collActividadCargos;
    }

    /**
     * Sets a collection of ChildActividadCargo objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $actividadCargos A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCargo The current object (for fluent API support)
     */
    public function setActividadCargos(Collection $actividadCargos, ConnectionInterface $con = null)
    {
        /** @var ChildActividadCargo[] $actividadCargosToDelete */
        $actividadCargosToDelete = $this->getActividadCargos(new Criteria(), $con)->diff($actividadCargos);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->actividadCargosScheduledForDeletion = clone $actividadCargosToDelete;

        foreach ($actividadCargosToDelete as $actividadCargoRemoved) {
            $actividadCargoRemoved->setCargo(null);
        }

        $this->collActividadCargos = null;
        foreach ($actividadCargos as $actividadCargo) {
            $this->addActividadCargo($actividadCargo);
        }

        $this->collActividadCargos = $actividadCargos;
        $this->collActividadCargosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActividadCargo objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ActividadCargo objects.
     * @throws PropelException
     */
    public function countActividadCargos(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collActividadCargosPartial && !$this->isNew();
        if (null === $this->collActividadCargos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActividadCargos) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getActividadCargos());
            }

            $query = ChildActividadCargoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCargo($this)
                ->count($con);
        }

        return count($this->collActividadCargos);
    }

    /**
     * Method called to associate a ChildActividadCargo object to this object
     * through the ChildActividadCargo foreign key attribute.
     *
     * @param  ChildActividadCargo $l ChildActividadCargo
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function addActividadCargo(ChildActividadCargo $l)
    {
        if ($this->collActividadCargos === null) {
            $this->initActividadCargos();
            $this->collActividadCargosPartial = true;
        }

        if (!$this->collActividadCargos->contains($l)) {
            $this->doAddActividadCargo($l);

            if ($this->actividadCargosScheduledForDeletion and $this->actividadCargosScheduledForDeletion->contains($l)) {
                $this->actividadCargosScheduledForDeletion->remove($this->actividadCargosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildActividadCargo $actividadCargo The ChildActividadCargo object to add.
     */
    protected function doAddActividadCargo(ChildActividadCargo $actividadCargo)
    {
        $this->collActividadCargos[]= $actividadCargo;
        $actividadCargo->setCargo($this);
    }

    /**
     * @param  ChildActividadCargo $actividadCargo The ChildActividadCargo object to remove.
     * @return $this|ChildCargo The current object (for fluent API support)
     */
    public function removeActividadCargo(ChildActividadCargo $actividadCargo)
    {
        if ($this->getActividadCargos()->contains($actividadCargo)) {
            $pos = $this->collActividadCargos->search($actividadCargo);
            $this->collActividadCargos->remove($pos);
            if (null === $this->actividadCargosScheduledForDeletion) {
                $this->actividadCargosScheduledForDeletion = clone $this->collActividadCargos;
                $this->actividadCargosScheduledForDeletion->clear();
            }
            $this->actividadCargosScheduledForDeletion[]= clone $actividadCargo;
            $actividadCargo->setCargo(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cargo is new, it will return
     * an empty collection; or if this Cargo has previously
     * been saved, it will retrieve related ActividadCargos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cargo.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildActividadCargo[] List of ChildActividadCargo objects
     */
    public function getActividadCargosJoinActividad(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildActividadCargoQuery::create(null, $criteria);
        $query->joinWith('Actividad', $joinBehavior);

        return $this->getActividadCargos($query, $con);
    }

    /**
     * Clears out the collCargoGrupoSences collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCargoGrupoSences()
     */
    public function clearCargoGrupoSences()
    {
        $this->collCargoGrupoSences = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCargoGrupoSences collection loaded partially.
     */
    public function resetPartialCargoGrupoSences($v = true)
    {
        $this->collCargoGrupoSencesPartial = $v;
    }

    /**
     * Initializes the collCargoGrupoSences collection.
     *
     * By default this just sets the collCargoGrupoSences collection to an empty array (like clearcollCargoGrupoSences());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCargoGrupoSences($overrideExisting = true)
    {
        if (null !== $this->collCargoGrupoSences && !$overrideExisting) {
            return;
        }

        $collectionClassName = CargoGrupoSenceTableMap::getTableMap()->getCollectionClassName();

        $this->collCargoGrupoSences = new $collectionClassName;
        $this->collCargoGrupoSences->setModel('\CargoGrupoSence');
    }

    /**
     * Gets an array of ChildCargoGrupoSence objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCargo is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCargoGrupoSence[] List of ChildCargoGrupoSence objects
     * @throws PropelException
     */
    public function getCargoGrupoSences(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCargoGrupoSencesPartial && !$this->isNew();
        if (null === $this->collCargoGrupoSences || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCargoGrupoSences) {
                // return empty collection
                $this->initCargoGrupoSences();
            } else {
                $collCargoGrupoSences = ChildCargoGrupoSenceQuery::create(null, $criteria)
                    ->filterByCargo($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCargoGrupoSencesPartial && count($collCargoGrupoSences)) {
                        $this->initCargoGrupoSences(false);

                        foreach ($collCargoGrupoSences as $obj) {
                            if (false == $this->collCargoGrupoSences->contains($obj)) {
                                $this->collCargoGrupoSences->append($obj);
                            }
                        }

                        $this->collCargoGrupoSencesPartial = true;
                    }

                    return $collCargoGrupoSences;
                }

                if ($partial && $this->collCargoGrupoSences) {
                    foreach ($this->collCargoGrupoSences as $obj) {
                        if ($obj->isNew()) {
                            $collCargoGrupoSences[] = $obj;
                        }
                    }
                }

                $this->collCargoGrupoSences = $collCargoGrupoSences;
                $this->collCargoGrupoSencesPartial = false;
            }
        }

        return $this->collCargoGrupoSences;
    }

    /**
     * Sets a collection of ChildCargoGrupoSence objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $cargoGrupoSences A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCargo The current object (for fluent API support)
     */
    public function setCargoGrupoSences(Collection $cargoGrupoSences, ConnectionInterface $con = null)
    {
        /** @var ChildCargoGrupoSence[] $cargoGrupoSencesToDelete */
        $cargoGrupoSencesToDelete = $this->getCargoGrupoSences(new Criteria(), $con)->diff($cargoGrupoSences);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->cargoGrupoSencesScheduledForDeletion = clone $cargoGrupoSencesToDelete;

        foreach ($cargoGrupoSencesToDelete as $cargoGrupoSenceRemoved) {
            $cargoGrupoSenceRemoved->setCargo(null);
        }

        $this->collCargoGrupoSences = null;
        foreach ($cargoGrupoSences as $cargoGrupoSence) {
            $this->addCargoGrupoSence($cargoGrupoSence);
        }

        $this->collCargoGrupoSences = $cargoGrupoSences;
        $this->collCargoGrupoSencesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CargoGrupoSence objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related CargoGrupoSence objects.
     * @throws PropelException
     */
    public function countCargoGrupoSences(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCargoGrupoSencesPartial && !$this->isNew();
        if (null === $this->collCargoGrupoSences || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCargoGrupoSences) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCargoGrupoSences());
            }

            $query = ChildCargoGrupoSenceQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCargo($this)
                ->count($con);
        }

        return count($this->collCargoGrupoSences);
    }

    /**
     * Method called to associate a ChildCargoGrupoSence object to this object
     * through the ChildCargoGrupoSence foreign key attribute.
     *
     * @param  ChildCargoGrupoSence $l ChildCargoGrupoSence
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function addCargoGrupoSence(ChildCargoGrupoSence $l)
    {
        if ($this->collCargoGrupoSences === null) {
            $this->initCargoGrupoSences();
            $this->collCargoGrupoSencesPartial = true;
        }

        if (!$this->collCargoGrupoSences->contains($l)) {
            $this->doAddCargoGrupoSence($l);

            if ($this->cargoGrupoSencesScheduledForDeletion and $this->cargoGrupoSencesScheduledForDeletion->contains($l)) {
                $this->cargoGrupoSencesScheduledForDeletion->remove($this->cargoGrupoSencesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildCargoGrupoSence $cargoGrupoSence The ChildCargoGrupoSence object to add.
     */
    protected function doAddCargoGrupoSence(ChildCargoGrupoSence $cargoGrupoSence)
    {
        $this->collCargoGrupoSences[]= $cargoGrupoSence;
        $cargoGrupoSence->setCargo($this);
    }

    /**
     * @param  ChildCargoGrupoSence $cargoGrupoSence The ChildCargoGrupoSence object to remove.
     * @return $this|ChildCargo The current object (for fluent API support)
     */
    public function removeCargoGrupoSence(ChildCargoGrupoSence $cargoGrupoSence)
    {
        if ($this->getCargoGrupoSences()->contains($cargoGrupoSence)) {
            $pos = $this->collCargoGrupoSences->search($cargoGrupoSence);
            $this->collCargoGrupoSences->remove($pos);
            if (null === $this->cargoGrupoSencesScheduledForDeletion) {
                $this->cargoGrupoSencesScheduledForDeletion = clone $this->collCargoGrupoSences;
                $this->cargoGrupoSencesScheduledForDeletion->clear();
            }
            $this->cargoGrupoSencesScheduledForDeletion[]= clone $cargoGrupoSence;
            $cargoGrupoSence->setCargo(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cargo is new, it will return
     * an empty collection; or if this Cargo has previously
     * been saved, it will retrieve related CargoGrupoSences from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cargo.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildCargoGrupoSence[] List of ChildCargoGrupoSence objects
     */
    public function getCargoGrupoSencesJoinGrupoSence(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCargoGrupoSenceQuery::create(null, $criteria);
        $query->joinWith('GrupoSence', $joinBehavior);

        return $this->getCargoGrupoSences($query, $con);
    }

    /**
     * Clears out the collTrabajadors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTrabajadors()
     */
    public function clearTrabajadors()
    {
        $this->collTrabajadors = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTrabajadors collection loaded partially.
     */
    public function resetPartialTrabajadors($v = true)
    {
        $this->collTrabajadorsPartial = $v;
    }

    /**
     * Initializes the collTrabajadors collection.
     *
     * By default this just sets the collTrabajadors collection to an empty array (like clearcollTrabajadors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTrabajadors($overrideExisting = true)
    {
        if (null !== $this->collTrabajadors && !$overrideExisting) {
            return;
        }

        $collectionClassName = TrabajadorTableMap::getTableMap()->getCollectionClassName();

        $this->collTrabajadors = new $collectionClassName;
        $this->collTrabajadors->setModel('\Trabajador');
    }

    /**
     * Gets an array of ChildTrabajador objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCargo is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTrabajador[] List of ChildTrabajador objects
     * @throws PropelException
     */
    public function getTrabajadors(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTrabajadorsPartial && !$this->isNew();
        if (null === $this->collTrabajadors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTrabajadors) {
                // return empty collection
                $this->initTrabajadors();
            } else {
                $collTrabajadors = ChildTrabajadorQuery::create(null, $criteria)
                    ->filterByCargo($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTrabajadorsPartial && count($collTrabajadors)) {
                        $this->initTrabajadors(false);

                        foreach ($collTrabajadors as $obj) {
                            if (false == $this->collTrabajadors->contains($obj)) {
                                $this->collTrabajadors->append($obj);
                            }
                        }

                        $this->collTrabajadorsPartial = true;
                    }

                    return $collTrabajadors;
                }

                if ($partial && $this->collTrabajadors) {
                    foreach ($this->collTrabajadors as $obj) {
                        if ($obj->isNew()) {
                            $collTrabajadors[] = $obj;
                        }
                    }
                }

                $this->collTrabajadors = $collTrabajadors;
                $this->collTrabajadorsPartial = false;
            }
        }

        return $this->collTrabajadors;
    }

    /**
     * Sets a collection of ChildTrabajador objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $trabajadors A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCargo The current object (for fluent API support)
     */
    public function setTrabajadors(Collection $trabajadors, ConnectionInterface $con = null)
    {
        /** @var ChildTrabajador[] $trabajadorsToDelete */
        $trabajadorsToDelete = $this->getTrabajadors(new Criteria(), $con)->diff($trabajadors);


        $this->trabajadorsScheduledForDeletion = $trabajadorsToDelete;

        foreach ($trabajadorsToDelete as $trabajadorRemoved) {
            $trabajadorRemoved->setCargo(null);
        }

        $this->collTrabajadors = null;
        foreach ($trabajadors as $trabajador) {
            $this->addTrabajador($trabajador);
        }

        $this->collTrabajadors = $trabajadors;
        $this->collTrabajadorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Trabajador objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Trabajador objects.
     * @throws PropelException
     */
    public function countTrabajadors(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTrabajadorsPartial && !$this->isNew();
        if (null === $this->collTrabajadors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTrabajadors) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTrabajadors());
            }

            $query = ChildTrabajadorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCargo($this)
                ->count($con);
        }

        return count($this->collTrabajadors);
    }

    /**
     * Method called to associate a ChildTrabajador object to this object
     * through the ChildTrabajador foreign key attribute.
     *
     * @param  ChildTrabajador $l ChildTrabajador
     * @return $this|\Cargo The current object (for fluent API support)
     */
    public function addTrabajador(ChildTrabajador $l)
    {
        if ($this->collTrabajadors === null) {
            $this->initTrabajadors();
            $this->collTrabajadorsPartial = true;
        }

        if (!$this->collTrabajadors->contains($l)) {
            $this->doAddTrabajador($l);

            if ($this->trabajadorsScheduledForDeletion and $this->trabajadorsScheduledForDeletion->contains($l)) {
                $this->trabajadorsScheduledForDeletion->remove($this->trabajadorsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTrabajador $trabajador The ChildTrabajador object to add.
     */
    protected function doAddTrabajador(ChildTrabajador $trabajador)
    {
        $this->collTrabajadors[]= $trabajador;
        $trabajador->setCargo($this);
    }

    /**
     * @param  ChildTrabajador $trabajador The ChildTrabajador object to remove.
     * @return $this|ChildCargo The current object (for fluent API support)
     */
    public function removeTrabajador(ChildTrabajador $trabajador)
    {
        if ($this->getTrabajadors()->contains($trabajador)) {
            $pos = $this->collTrabajadors->search($trabajador);
            $this->collTrabajadors->remove($pos);
            if (null === $this->trabajadorsScheduledForDeletion) {
                $this->trabajadorsScheduledForDeletion = clone $this->collTrabajadors;
                $this->trabajadorsScheduledForDeletion->clear();
            }
            $this->trabajadorsScheduledForDeletion[]= clone $trabajador;
            $trabajador->setCargo(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cargo is new, it will return
     * an empty collection; or if this Cargo has previously
     * been saved, it will retrieve related Trabajadors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cargo.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTrabajador[] List of ChildTrabajador objects
     */
    public function getTrabajadorsJoinAniosExperienciaCargo(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTrabajadorQuery::create(null, $criteria);
        $query->joinWith('AniosExperienciaCargo', $joinBehavior);

        return $this->getTrabajadors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cargo is new, it will return
     * an empty collection; or if this Cargo has previously
     * been saved, it will retrieve related Trabajadors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cargo.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTrabajador[] List of ChildTrabajador objects
     */
    public function getTrabajadorsJoinArea(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTrabajadorQuery::create(null, $criteria);
        $query->joinWith('Area', $joinBehavior);

        return $this->getTrabajadors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cargo is new, it will return
     * an empty collection; or if this Cargo has previously
     * been saved, it will retrieve related Trabajadors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cargo.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTrabajador[] List of ChildTrabajador objects
     */
    public function getTrabajadorsJoinGerencia(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTrabajadorQuery::create(null, $criteria);
        $query->joinWith('Gerencia', $joinBehavior);

        return $this->getTrabajadors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cargo is new, it will return
     * an empty collection; or if this Cargo has previously
     * been saved, it will retrieve related Trabajadors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cargo.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTrabajador[] List of ChildTrabajador objects
     */
    public function getTrabajadorsJoinPersona(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTrabajadorQuery::create(null, $criteria);
        $query->joinWith('Persona', $joinBehavior);

        return $this->getTrabajadors($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aEspecialidad) {
            $this->aEspecialidad->removeCargo($this);
        }
        if (null !== $this->aTRelacionFaena) {
            $this->aTRelacionFaena->removeCargo($this);
        }
        $this->carg_codigo = null;
        $this->carg_c_especialidad = null;
        $this->carg_t_relacion_faena = null;
        $this->carg_sigla = null;
        $this->carg_descripcion = null;
        $this->carg_vigente = null;
        $this->carg_r_fecha_creacion = null;
        $this->carg_r_fecha_modificacion = null;
        $this->carg_r_usuario = null;
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
            if ($this->collActividadCargos) {
                foreach ($this->collActividadCargos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCargoGrupoSences) {
                foreach ($this->collCargoGrupoSences as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTrabajadors) {
                foreach ($this->collTrabajadors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collActividadCargos = null;
        $this->collCargoGrupoSences = null;
        $this->collTrabajadors = null;
        $this->aEspecialidad = null;
        $this->aTRelacionFaena = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CargoTableMap::DEFAULT_STRING_FORMAT);
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
