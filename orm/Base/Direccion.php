<?php

namespace Base;

use \Comuna as ChildComuna;
use \ComunaQuery as ChildComunaQuery;
use \DireccionQuery as ChildDireccionQuery;
use \Pais as ChildPais;
use \PaisQuery as ChildPaisQuery;
use \Persona as ChildPersona;
use \PersonaQuery as ChildPersonaQuery;
use \TDireccion as ChildTDireccion;
use \TDireccionQuery as ChildTDireccionQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\DireccionTableMap;
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
 * Base class that represents a row from the 'direccion' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Direccion implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\DireccionTableMap';


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
     * The value for the dire_c_persona field.
     *
     * @var        int
     */
    protected $dire_c_persona;

    /**
     * The value for the dire_t_direccion field.
     *
     * @var        int
     */
    protected $dire_t_direccion;

    /**
     * The value for the dire_c_comuna field.
     *
     * @var        int
     */
    protected $dire_c_comuna;

    /**
     * The value for the dire_c_pais field.
     *
     * @var        int
     */
    protected $dire_c_pais;

    /**
     * The value for the dire_detalle field.
     *
     * @var        string
     */
    protected $dire_detalle;

    /**
     * The value for the dire_codigo_postal field.
     *
     * @var        string
     */
    protected $dire_codigo_postal;

    /**
     * The value for the dire_telefono field.
     *
     * @var        string
     */
    protected $dire_telefono;

    /**
     * The value for the dire_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $dire_r_fecha_creacion;

    /**
     * The value for the dire_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $dire_r_fecha_modificacion;

    /**
     * The value for the dire_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $dire_r_usuario;

    /**
     * @var        ChildComuna
     */
    protected $aComuna;

    /**
     * @var        ChildPais
     */
    protected $aPais;

    /**
     * @var        ChildPersona
     */
    protected $aPersona;

    /**
     * @var        ChildTDireccion
     */
    protected $aTDireccion;

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
        $this->dire_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Direccion object.
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
     * Compares this with another <code>Direccion</code> instance.  If
     * <code>obj</code> is an instance of <code>Direccion</code>, delegates to
     * <code>equals(Direccion)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Direccion The current object, for fluid interface
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
     * Get the [dire_c_persona] column value.
     *
     * @return int
     */
    public function getDireCPersona()
    {
        return $this->dire_c_persona;
    }

    /**
     * Get the [dire_t_direccion] column value.
     *
     * @return int
     */
    public function getDireTDireccion()
    {
        return $this->dire_t_direccion;
    }

    /**
     * Get the [dire_c_comuna] column value.
     *
     * @return int
     */
    public function getDireCComuna()
    {
        return $this->dire_c_comuna;
    }

    /**
     * Get the [dire_c_pais] column value.
     *
     * @return int
     */
    public function getDireCPais()
    {
        return $this->dire_c_pais;
    }

    /**
     * Get the [dire_detalle] column value.
     *
     * @return string
     */
    public function getDireDetalle()
    {
        return $this->dire_detalle;
    }

    /**
     * Get the [dire_codigo_postal] column value.
     *
     * @return string
     */
    public function getDireCodigoPostal()
    {
        return $this->dire_codigo_postal;
    }

    /**
     * Get the [dire_telefono] column value.
     *
     * @return string
     */
    public function getDireTelefono()
    {
        return $this->dire_telefono;
    }

    /**
     * Get the [optionally formatted] temporal [dire_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDireRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->dire_r_fecha_creacion;
        } else {
            return $this->dire_r_fecha_creacion instanceof \DateTimeInterface ? $this->dire_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [dire_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDireRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->dire_r_fecha_modificacion;
        } else {
            return $this->dire_r_fecha_modificacion instanceof \DateTimeInterface ? $this->dire_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [dire_r_usuario] column value.
     *
     * @return int
     */
    public function getDireRUsuario()
    {
        return $this->dire_r_usuario;
    }

    /**
     * Set the value of [dire_c_persona] column.
     *
     * @param int $v new value
     * @return $this|\Direccion The current object (for fluent API support)
     */
    public function setDireCPersona($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dire_c_persona !== $v) {
            $this->dire_c_persona = $v;
            $this->modifiedColumns[DireccionTableMap::COL_DIRE_C_PERSONA] = true;
        }

        if ($this->aPersona !== null && $this->aPersona->getPersCodigo() !== $v) {
            $this->aPersona = null;
        }

        return $this;
    } // setDireCPersona()

    /**
     * Set the value of [dire_t_direccion] column.
     *
     * @param int $v new value
     * @return $this|\Direccion The current object (for fluent API support)
     */
    public function setDireTDireccion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dire_t_direccion !== $v) {
            $this->dire_t_direccion = $v;
            $this->modifiedColumns[DireccionTableMap::COL_DIRE_T_DIRECCION] = true;
        }

        if ($this->aTDireccion !== null && $this->aTDireccion->getTdirTipo() !== $v) {
            $this->aTDireccion = null;
        }

        return $this;
    } // setDireTDireccion()

    /**
     * Set the value of [dire_c_comuna] column.
     *
     * @param int $v new value
     * @return $this|\Direccion The current object (for fluent API support)
     */
    public function setDireCComuna($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dire_c_comuna !== $v) {
            $this->dire_c_comuna = $v;
            $this->modifiedColumns[DireccionTableMap::COL_DIRE_C_COMUNA] = true;
        }

        if ($this->aComuna !== null && $this->aComuna->getComuCodigo() !== $v) {
            $this->aComuna = null;
        }

        return $this;
    } // setDireCComuna()

    /**
     * Set the value of [dire_c_pais] column.
     *
     * @param int $v new value
     * @return $this|\Direccion The current object (for fluent API support)
     */
    public function setDireCPais($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dire_c_pais !== $v) {
            $this->dire_c_pais = $v;
            $this->modifiedColumns[DireccionTableMap::COL_DIRE_C_PAIS] = true;
        }

        if ($this->aPais !== null && $this->aPais->getPaisCodigo() !== $v) {
            $this->aPais = null;
        }

        return $this;
    } // setDireCPais()

    /**
     * Set the value of [dire_detalle] column.
     *
     * @param string $v new value
     * @return $this|\Direccion The current object (for fluent API support)
     */
    public function setDireDetalle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dire_detalle !== $v) {
            $this->dire_detalle = $v;
            $this->modifiedColumns[DireccionTableMap::COL_DIRE_DETALLE] = true;
        }

        return $this;
    } // setDireDetalle()

    /**
     * Set the value of [dire_codigo_postal] column.
     *
     * @param string $v new value
     * @return $this|\Direccion The current object (for fluent API support)
     */
    public function setDireCodigoPostal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dire_codigo_postal !== $v) {
            $this->dire_codigo_postal = $v;
            $this->modifiedColumns[DireccionTableMap::COL_DIRE_CODIGO_POSTAL] = true;
        }

        return $this;
    } // setDireCodigoPostal()

    /**
     * Set the value of [dire_telefono] column.
     *
     * @param string $v new value
     * @return $this|\Direccion The current object (for fluent API support)
     */
    public function setDireTelefono($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dire_telefono !== $v) {
            $this->dire_telefono = $v;
            $this->modifiedColumns[DireccionTableMap::COL_DIRE_TELEFONO] = true;
        }

        return $this;
    } // setDireTelefono()

    /**
     * Sets the value of [dire_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Direccion The current object (for fluent API support)
     */
    public function setDireRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dire_r_fecha_creacion !== null || $dt !== null) {
            if ($this->dire_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->dire_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->dire_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[DireccionTableMap::COL_DIRE_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setDireRFechaCreacion()

    /**
     * Sets the value of [dire_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Direccion The current object (for fluent API support)
     */
    public function setDireRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dire_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->dire_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->dire_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->dire_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[DireccionTableMap::COL_DIRE_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setDireRFechaModificacion()

    /**
     * Set the value of [dire_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Direccion The current object (for fluent API support)
     */
    public function setDireRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dire_r_usuario !== $v) {
            $this->dire_r_usuario = $v;
            $this->modifiedColumns[DireccionTableMap::COL_DIRE_R_USUARIO] = true;
        }

        return $this;
    } // setDireRUsuario()

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
            if ($this->dire_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : DireccionTableMap::translateFieldName('DireCPersona', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dire_c_persona = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : DireccionTableMap::translateFieldName('DireTDireccion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dire_t_direccion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : DireccionTableMap::translateFieldName('DireCComuna', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dire_c_comuna = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : DireccionTableMap::translateFieldName('DireCPais', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dire_c_pais = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : DireccionTableMap::translateFieldName('DireDetalle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dire_detalle = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : DireccionTableMap::translateFieldName('DireCodigoPostal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dire_codigo_postal = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : DireccionTableMap::translateFieldName('DireTelefono', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dire_telefono = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : DireccionTableMap::translateFieldName('DireRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->dire_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : DireccionTableMap::translateFieldName('DireRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->dire_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : DireccionTableMap::translateFieldName('DireRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dire_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = DireccionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Direccion'), 0, $e);
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
        if ($this->aPersona !== null && $this->dire_c_persona !== $this->aPersona->getPersCodigo()) {
            $this->aPersona = null;
        }
        if ($this->aTDireccion !== null && $this->dire_t_direccion !== $this->aTDireccion->getTdirTipo()) {
            $this->aTDireccion = null;
        }
        if ($this->aComuna !== null && $this->dire_c_comuna !== $this->aComuna->getComuCodigo()) {
            $this->aComuna = null;
        }
        if ($this->aPais !== null && $this->dire_c_pais !== $this->aPais->getPaisCodigo()) {
            $this->aPais = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(DireccionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildDireccionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aComuna = null;
            $this->aPais = null;
            $this->aPersona = null;
            $this->aTDireccion = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Direccion::setDeleted()
     * @see Direccion::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(DireccionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildDireccionQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(DireccionTableMap::DATABASE_NAME);
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
                DireccionTableMap::addInstanceToPool($this);
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

            if ($this->aComuna !== null) {
                if ($this->aComuna->isModified() || $this->aComuna->isNew()) {
                    $affectedRows += $this->aComuna->save($con);
                }
                $this->setComuna($this->aComuna);
            }

            if ($this->aPais !== null) {
                if ($this->aPais->isModified() || $this->aPais->isNew()) {
                    $affectedRows += $this->aPais->save($con);
                }
                $this->setPais($this->aPais);
            }

            if ($this->aPersona !== null) {
                if ($this->aPersona->isModified() || $this->aPersona->isNew()) {
                    $affectedRows += $this->aPersona->save($con);
                }
                $this->setPersona($this->aPersona);
            }

            if ($this->aTDireccion !== null) {
                if ($this->aTDireccion->isModified() || $this->aTDireccion->isNew()) {
                    $affectedRows += $this->aTDireccion->save($con);
                }
                $this->setTDireccion($this->aTDireccion);
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
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_C_PERSONA)) {
            $modifiedColumns[':p' . $index++]  = 'dire_c_persona';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_T_DIRECCION)) {
            $modifiedColumns[':p' . $index++]  = 'dire_t_direccion';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_C_COMUNA)) {
            $modifiedColumns[':p' . $index++]  = 'dire_c_comuna';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_C_PAIS)) {
            $modifiedColumns[':p' . $index++]  = 'dire_c_pais';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_DETALLE)) {
            $modifiedColumns[':p' . $index++]  = 'dire_detalle';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_CODIGO_POSTAL)) {
            $modifiedColumns[':p' . $index++]  = 'dire_codigo_postal';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_TELEFONO)) {
            $modifiedColumns[':p' . $index++]  = 'dire_telefono';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'dire_r_fecha_creacion';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'dire_r_fecha_modificacion';
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'dire_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO direccion (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'dire_c_persona':
                        $stmt->bindValue($identifier, $this->dire_c_persona, PDO::PARAM_INT);
                        break;
                    case 'dire_t_direccion':
                        $stmt->bindValue($identifier, $this->dire_t_direccion, PDO::PARAM_INT);
                        break;
                    case 'dire_c_comuna':
                        $stmt->bindValue($identifier, $this->dire_c_comuna, PDO::PARAM_INT);
                        break;
                    case 'dire_c_pais':
                        $stmt->bindValue($identifier, $this->dire_c_pais, PDO::PARAM_INT);
                        break;
                    case 'dire_detalle':
                        $stmt->bindValue($identifier, $this->dire_detalle, PDO::PARAM_STR);
                        break;
                    case 'dire_codigo_postal':
                        $stmt->bindValue($identifier, $this->dire_codigo_postal, PDO::PARAM_STR);
                        break;
                    case 'dire_telefono':
                        $stmt->bindValue($identifier, $this->dire_telefono, PDO::PARAM_STR);
                        break;
                    case 'dire_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->dire_r_fecha_creacion ? $this->dire_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'dire_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->dire_r_fecha_modificacion ? $this->dire_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'dire_r_usuario':
                        $stmt->bindValue($identifier, $this->dire_r_usuario, PDO::PARAM_INT);
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
        $pos = DireccionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getDireCPersona();
                break;
            case 1:
                return $this->getDireTDireccion();
                break;
            case 2:
                return $this->getDireCComuna();
                break;
            case 3:
                return $this->getDireCPais();
                break;
            case 4:
                return $this->getDireDetalle();
                break;
            case 5:
                return $this->getDireCodigoPostal();
                break;
            case 6:
                return $this->getDireTelefono();
                break;
            case 7:
                return $this->getDireRFechaCreacion();
                break;
            case 8:
                return $this->getDireRFechaModificacion();
                break;
            case 9:
                return $this->getDireRUsuario();
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

        if (isset($alreadyDumpedObjects['Direccion'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Direccion'][$this->hashCode()] = true;
        $keys = DireccionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getDireCPersona(),
            $keys[1] => $this->getDireTDireccion(),
            $keys[2] => $this->getDireCComuna(),
            $keys[3] => $this->getDireCPais(),
            $keys[4] => $this->getDireDetalle(),
            $keys[5] => $this->getDireCodigoPostal(),
            $keys[6] => $this->getDireTelefono(),
            $keys[7] => $this->getDireRFechaCreacion(),
            $keys[8] => $this->getDireRFechaModificacion(),
            $keys[9] => $this->getDireRUsuario(),
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
            if (null !== $this->aComuna) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'comuna';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'comuna';
                        break;
                    default:
                        $key = 'Comuna';
                }

                $result[$key] = $this->aComuna->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPais) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'pais';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'pais';
                        break;
                    default:
                        $key = 'Pais';
                }

                $result[$key] = $this->aPais->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersona) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'persona';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'persona';
                        break;
                    default:
                        $key = 'Persona';
                }

                $result[$key] = $this->aPersona->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTDireccion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tDireccion';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_direccion';
                        break;
                    default:
                        $key = 'TDireccion';
                }

                $result[$key] = $this->aTDireccion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Direccion
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = DireccionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Direccion
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setDireCPersona($value);
                break;
            case 1:
                $this->setDireTDireccion($value);
                break;
            case 2:
                $this->setDireCComuna($value);
                break;
            case 3:
                $this->setDireCPais($value);
                break;
            case 4:
                $this->setDireDetalle($value);
                break;
            case 5:
                $this->setDireCodigoPostal($value);
                break;
            case 6:
                $this->setDireTelefono($value);
                break;
            case 7:
                $this->setDireRFechaCreacion($value);
                break;
            case 8:
                $this->setDireRFechaModificacion($value);
                break;
            case 9:
                $this->setDireRUsuario($value);
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
        $keys = DireccionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setDireCPersona($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setDireTDireccion($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDireCComuna($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDireCPais($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDireDetalle($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDireCodigoPostal($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDireTelefono($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setDireRFechaCreacion($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setDireRFechaModificacion($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setDireRUsuario($arr[$keys[9]]);
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
     * @return $this|\Direccion The current object, for fluid interface
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
        $criteria = new Criteria(DireccionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_C_PERSONA)) {
            $criteria->add(DireccionTableMap::COL_DIRE_C_PERSONA, $this->dire_c_persona);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_T_DIRECCION)) {
            $criteria->add(DireccionTableMap::COL_DIRE_T_DIRECCION, $this->dire_t_direccion);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_C_COMUNA)) {
            $criteria->add(DireccionTableMap::COL_DIRE_C_COMUNA, $this->dire_c_comuna);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_C_PAIS)) {
            $criteria->add(DireccionTableMap::COL_DIRE_C_PAIS, $this->dire_c_pais);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_DETALLE)) {
            $criteria->add(DireccionTableMap::COL_DIRE_DETALLE, $this->dire_detalle);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_CODIGO_POSTAL)) {
            $criteria->add(DireccionTableMap::COL_DIRE_CODIGO_POSTAL, $this->dire_codigo_postal);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_TELEFONO)) {
            $criteria->add(DireccionTableMap::COL_DIRE_TELEFONO, $this->dire_telefono);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_R_FECHA_CREACION)) {
            $criteria->add(DireccionTableMap::COL_DIRE_R_FECHA_CREACION, $this->dire_r_fecha_creacion);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_R_FECHA_MODIFICACION)) {
            $criteria->add(DireccionTableMap::COL_DIRE_R_FECHA_MODIFICACION, $this->dire_r_fecha_modificacion);
        }
        if ($this->isColumnModified(DireccionTableMap::COL_DIRE_R_USUARIO)) {
            $criteria->add(DireccionTableMap::COL_DIRE_R_USUARIO, $this->dire_r_usuario);
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
        $criteria = ChildDireccionQuery::create();
        $criteria->add(DireccionTableMap::COL_DIRE_C_PERSONA, $this->dire_c_persona);
        $criteria->add(DireccionTableMap::COL_DIRE_T_DIRECCION, $this->dire_t_direccion);

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
        $validPk = null !== $this->getDireCPersona() &&
            null !== $this->getDireTDireccion();

        $validPrimaryKeyFKs = 2;
        $primaryKeyFKs = [];

        //relation direccion_persona_fk to table persona
        if ($this->aPersona && $hash = spl_object_hash($this->aPersona)) {
            $primaryKeyFKs[] = $hash;
        } else {
            $validPrimaryKeyFKs = false;
        }

        //relation direccion_t_direccion_fk to table t_direccion
        if ($this->aTDireccion && $hash = spl_object_hash($this->aTDireccion)) {
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
        $pks[0] = $this->getDireCPersona();
        $pks[1] = $this->getDireTDireccion();

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
        $this->setDireCPersona($keys[0]);
        $this->setDireTDireccion($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getDireCPersona()) && (null === $this->getDireTDireccion());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Direccion (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDireCPersona($this->getDireCPersona());
        $copyObj->setDireTDireccion($this->getDireTDireccion());
        $copyObj->setDireCComuna($this->getDireCComuna());
        $copyObj->setDireCPais($this->getDireCPais());
        $copyObj->setDireDetalle($this->getDireDetalle());
        $copyObj->setDireCodigoPostal($this->getDireCodigoPostal());
        $copyObj->setDireTelefono($this->getDireTelefono());
        $copyObj->setDireRFechaCreacion($this->getDireRFechaCreacion());
        $copyObj->setDireRFechaModificacion($this->getDireRFechaModificacion());
        $copyObj->setDireRUsuario($this->getDireRUsuario());
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
     * @return \Direccion Clone of current object.
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
     * Declares an association between this object and a ChildComuna object.
     *
     * @param  ChildComuna $v
     * @return $this|\Direccion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setComuna(ChildComuna $v = null)
    {
        if ($v === null) {
            $this->setDireCComuna(NULL);
        } else {
            $this->setDireCComuna($v->getComuCodigo());
        }

        $this->aComuna = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildComuna object, it will not be re-added.
        if ($v !== null) {
            $v->addDireccion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildComuna object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildComuna The associated ChildComuna object.
     * @throws PropelException
     */
    public function getComuna(ConnectionInterface $con = null)
    {
        if ($this->aComuna === null && ($this->dire_c_comuna != 0)) {
            $this->aComuna = ChildComunaQuery::create()->findPk($this->dire_c_comuna, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aComuna->addDireccions($this);
             */
        }

        return $this->aComuna;
    }

    /**
     * Declares an association between this object and a ChildPais object.
     *
     * @param  ChildPais $v
     * @return $this|\Direccion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPais(ChildPais $v = null)
    {
        if ($v === null) {
            $this->setDireCPais(NULL);
        } else {
            $this->setDireCPais($v->getPaisCodigo());
        }

        $this->aPais = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPais object, it will not be re-added.
        if ($v !== null) {
            $v->addDireccion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildPais object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildPais The associated ChildPais object.
     * @throws PropelException
     */
    public function getPais(ConnectionInterface $con = null)
    {
        if ($this->aPais === null && ($this->dire_c_pais != 0)) {
            $this->aPais = ChildPaisQuery::create()->findPk($this->dire_c_pais, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPais->addDireccions($this);
             */
        }

        return $this->aPais;
    }

    /**
     * Declares an association between this object and a ChildPersona object.
     *
     * @param  ChildPersona $v
     * @return $this|\Direccion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersona(ChildPersona $v = null)
    {
        if ($v === null) {
            $this->setDireCPersona(NULL);
        } else {
            $this->setDireCPersona($v->getPersCodigo());
        }

        $this->aPersona = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPersona object, it will not be re-added.
        if ($v !== null) {
            $v->addDireccion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildPersona object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildPersona The associated ChildPersona object.
     * @throws PropelException
     */
    public function getPersona(ConnectionInterface $con = null)
    {
        if ($this->aPersona === null && ($this->dire_c_persona != 0)) {
            $this->aPersona = ChildPersonaQuery::create()->findPk($this->dire_c_persona, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersona->addDireccions($this);
             */
        }

        return $this->aPersona;
    }

    /**
     * Declares an association between this object and a ChildTDireccion object.
     *
     * @param  ChildTDireccion $v
     * @return $this|\Direccion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTDireccion(ChildTDireccion $v = null)
    {
        if ($v === null) {
            $this->setDireTDireccion(NULL);
        } else {
            $this->setDireTDireccion($v->getTdirTipo());
        }

        $this->aTDireccion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTDireccion object, it will not be re-added.
        if ($v !== null) {
            $v->addDireccion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTDireccion object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTDireccion The associated ChildTDireccion object.
     * @throws PropelException
     */
    public function getTDireccion(ConnectionInterface $con = null)
    {
        if ($this->aTDireccion === null && ($this->dire_t_direccion != 0)) {
            $this->aTDireccion = ChildTDireccionQuery::create()->findPk($this->dire_t_direccion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTDireccion->addDireccions($this);
             */
        }

        return $this->aTDireccion;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aComuna) {
            $this->aComuna->removeDireccion($this);
        }
        if (null !== $this->aPais) {
            $this->aPais->removeDireccion($this);
        }
        if (null !== $this->aPersona) {
            $this->aPersona->removeDireccion($this);
        }
        if (null !== $this->aTDireccion) {
            $this->aTDireccion->removeDireccion($this);
        }
        $this->dire_c_persona = null;
        $this->dire_t_direccion = null;
        $this->dire_c_comuna = null;
        $this->dire_c_pais = null;
        $this->dire_detalle = null;
        $this->dire_codigo_postal = null;
        $this->dire_telefono = null;
        $this->dire_r_fecha_creacion = null;
        $this->dire_r_fecha_modificacion = null;
        $this->dire_r_usuario = null;
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

        $this->aComuna = null;
        $this->aPais = null;
        $this->aPersona = null;
        $this->aTDireccion = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DireccionTableMap::DEFAULT_STRING_FORMAT);
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
