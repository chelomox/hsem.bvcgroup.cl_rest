<?php

namespace Base;

use \Area as ChildArea;
use \AreaQuery as ChildAreaQuery;
use \Especialidad as ChildEspecialidad;
use \EspecialidadQuery as ChildEspecialidadQuery;
use \Gerencia as ChildGerencia;
use \GerenciaQuery as ChildGerenciaQuery;
use \Institucion as ChildInstitucion;
use \InstitucionQuery as ChildInstitucionQuery;
use \TInstitucion as ChildTInstitucion;
use \TInstitucionQuery as ChildTInstitucionQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\AreaTableMap;
use Map\EspecialidadTableMap;
use Map\GerenciaTableMap;
use Map\InstitucionTableMap;
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
 * Base class that represents a row from the 'institucion' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Institucion implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\InstitucionTableMap';


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
     * The value for the inst_codigo field.
     *
     * @var        int
     */
    protected $inst_codigo;

    /**
     * The value for the inst_identificador field.
     *
     * @var        int
     */
    protected $inst_identificador;

    /**
     * The value for the inst_dv field.
     *
     * @var        string
     */
    protected $inst_dv;

    /**
     * The value for the inst_nombre field.
     *
     * @var        string
     */
    protected $inst_nombre;

    /**
     * The value for the inst_t_institucion field.
     *
     * @var        int
     */
    protected $inst_t_institucion;

    /**
     * The value for the inst_c_comuna field.
     *
     * @var        string
     */
    protected $inst_c_comuna;

    /**
     * The value for the inst_c_pais field.
     *
     * @var        string
     */
    protected $inst_c_pais;

    /**
     * The value for the inst_telefono field.
     *
     * @var        string
     */
    protected $inst_telefono;

    /**
     * The value for the inst_email field.
     *
     * @var        string
     */
    protected $inst_email;

    /**
     * The value for the inst_tratamiento field.
     *
     * @var        string
     */
    protected $inst_tratamiento;

    /**
     * The value for the inst_direccion field.
     *
     * @var        string
     */
    protected $inst_direccion;

    /**
     * The value for the inst_giro field.
     *
     * @var        string
     */
    protected $inst_giro;

    /**
     * The value for the inst_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $inst_r_fecha_creacion;

    /**
     * The value for the inst_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $inst_r_fecha_modificacion;

    /**
     * The value for the inst_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $inst_r_usuario;

    /**
     * @var        ChildTInstitucion
     */
    protected $aTInstitucion;

    /**
     * @var        ObjectCollection|ChildArea[] Collection to store aggregation of ChildArea objects.
     */
    protected $collAreas;
    protected $collAreasPartial;

    /**
     * @var        ObjectCollection|ChildEspecialidad[] Collection to store aggregation of ChildEspecialidad objects.
     */
    protected $collEspecialidads;
    protected $collEspecialidadsPartial;

    /**
     * @var        ObjectCollection|ChildGerencia[] Collection to store aggregation of ChildGerencia objects.
     */
    protected $collGerencias;
    protected $collGerenciasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildArea[]
     */
    protected $areasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEspecialidad[]
     */
    protected $especialidadsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildGerencia[]
     */
    protected $gerenciasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->inst_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Institucion object.
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
     * Compares this with another <code>Institucion</code> instance.  If
     * <code>obj</code> is an instance of <code>Institucion</code>, delegates to
     * <code>equals(Institucion)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Institucion The current object, for fluid interface
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
     * Get the [inst_codigo] column value.
     *
     * @return int
     */
    public function getInstCodigo()
    {
        return $this->inst_codigo;
    }

    /**
     * Get the [inst_identificador] column value.
     *
     * @return int
     */
    public function getInstIdentificador()
    {
        return $this->inst_identificador;
    }

    /**
     * Get the [inst_dv] column value.
     *
     * @return string
     */
    public function getInstDv()
    {
        return $this->inst_dv;
    }

    /**
     * Get the [inst_nombre] column value.
     *
     * @return string
     */
    public function getInstNombre()
    {
        return $this->inst_nombre;
    }

    /**
     * Get the [inst_t_institucion] column value.
     *
     * @return int
     */
    public function getInstTInstitucion()
    {
        return $this->inst_t_institucion;
    }

    /**
     * Get the [inst_c_comuna] column value.
     *
     * @return string
     */
    public function getInstCComuna()
    {
        return $this->inst_c_comuna;
    }

    /**
     * Get the [inst_c_pais] column value.
     *
     * @return string
     */
    public function getInstCPais()
    {
        return $this->inst_c_pais;
    }

    /**
     * Get the [inst_telefono] column value.
     *
     * @return string
     */
    public function getInstTelefono()
    {
        return $this->inst_telefono;
    }

    /**
     * Get the [inst_email] column value.
     *
     * @return string
     */
    public function getInstEmail()
    {
        return $this->inst_email;
    }

    /**
     * Get the [inst_tratamiento] column value.
     *
     * @return string
     */
    public function getInstTratamiento()
    {
        return $this->inst_tratamiento;
    }

    /**
     * Get the [inst_direccion] column value.
     *
     * @return string
     */
    public function getInstDireccion()
    {
        return $this->inst_direccion;
    }

    /**
     * Get the [inst_giro] column value.
     *
     * @return string
     */
    public function getInstGiro()
    {
        return $this->inst_giro;
    }

    /**
     * Get the [optionally formatted] temporal [inst_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getInstRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->inst_r_fecha_creacion;
        } else {
            return $this->inst_r_fecha_creacion instanceof \DateTimeInterface ? $this->inst_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [inst_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getInstRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->inst_r_fecha_modificacion;
        } else {
            return $this->inst_r_fecha_modificacion instanceof \DateTimeInterface ? $this->inst_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [inst_r_usuario] column value.
     *
     * @return int
     */
    public function getInstRUsuario()
    {
        return $this->inst_r_usuario;
    }

    /**
     * Set the value of [inst_codigo] column.
     *
     * @param int $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstCodigo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->inst_codigo !== $v) {
            $this->inst_codigo = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_CODIGO] = true;
        }

        return $this;
    } // setInstCodigo()

    /**
     * Set the value of [inst_identificador] column.
     *
     * @param int $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstIdentificador($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->inst_identificador !== $v) {
            $this->inst_identificador = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_IDENTIFICADOR] = true;
        }

        return $this;
    } // setInstIdentificador()

    /**
     * Set the value of [inst_dv] column.
     *
     * @param string $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstDv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inst_dv !== $v) {
            $this->inst_dv = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_DV] = true;
        }

        return $this;
    } // setInstDv()

    /**
     * Set the value of [inst_nombre] column.
     *
     * @param string $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inst_nombre !== $v) {
            $this->inst_nombre = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_NOMBRE] = true;
        }

        return $this;
    } // setInstNombre()

    /**
     * Set the value of [inst_t_institucion] column.
     *
     * @param int $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstTInstitucion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->inst_t_institucion !== $v) {
            $this->inst_t_institucion = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_T_INSTITUCION] = true;
        }

        if ($this->aTInstitucion !== null && $this->aTInstitucion->getTinsTipo() !== $v) {
            $this->aTInstitucion = null;
        }

        return $this;
    } // setInstTInstitucion()

    /**
     * Set the value of [inst_c_comuna] column.
     *
     * @param string $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstCComuna($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inst_c_comuna !== $v) {
            $this->inst_c_comuna = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_C_COMUNA] = true;
        }

        return $this;
    } // setInstCComuna()

    /**
     * Set the value of [inst_c_pais] column.
     *
     * @param string $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstCPais($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inst_c_pais !== $v) {
            $this->inst_c_pais = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_C_PAIS] = true;
        }

        return $this;
    } // setInstCPais()

    /**
     * Set the value of [inst_telefono] column.
     *
     * @param string $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstTelefono($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inst_telefono !== $v) {
            $this->inst_telefono = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_TELEFONO] = true;
        }

        return $this;
    } // setInstTelefono()

    /**
     * Set the value of [inst_email] column.
     *
     * @param string $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inst_email !== $v) {
            $this->inst_email = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_EMAIL] = true;
        }

        return $this;
    } // setInstEmail()

    /**
     * Set the value of [inst_tratamiento] column.
     *
     * @param string $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstTratamiento($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inst_tratamiento !== $v) {
            $this->inst_tratamiento = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_TRATAMIENTO] = true;
        }

        return $this;
    } // setInstTratamiento()

    /**
     * Set the value of [inst_direccion] column.
     *
     * @param string $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstDireccion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inst_direccion !== $v) {
            $this->inst_direccion = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_DIRECCION] = true;
        }

        return $this;
    } // setInstDireccion()

    /**
     * Set the value of [inst_giro] column.
     *
     * @param string $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstGiro($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inst_giro !== $v) {
            $this->inst_giro = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_GIRO] = true;
        }

        return $this;
    } // setInstGiro()

    /**
     * Sets the value of [inst_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->inst_r_fecha_creacion !== null || $dt !== null) {
            if ($this->inst_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->inst_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->inst_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[InstitucionTableMap::COL_INST_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setInstRFechaCreacion()

    /**
     * Sets the value of [inst_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->inst_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->inst_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->inst_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->inst_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[InstitucionTableMap::COL_INST_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setInstRFechaModificacion()

    /**
     * Set the value of [inst_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function setInstRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->inst_r_usuario !== $v) {
            $this->inst_r_usuario = $v;
            $this->modifiedColumns[InstitucionTableMap::COL_INST_R_USUARIO] = true;
        }

        return $this;
    } // setInstRUsuario()

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
            if ($this->inst_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : InstitucionTableMap::translateFieldName('InstCodigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_codigo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : InstitucionTableMap::translateFieldName('InstIdentificador', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_identificador = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : InstitucionTableMap::translateFieldName('InstDv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_dv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : InstitucionTableMap::translateFieldName('InstNombre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_nombre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : InstitucionTableMap::translateFieldName('InstTInstitucion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_t_institucion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : InstitucionTableMap::translateFieldName('InstCComuna', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_c_comuna = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : InstitucionTableMap::translateFieldName('InstCPais', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_c_pais = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : InstitucionTableMap::translateFieldName('InstTelefono', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_telefono = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : InstitucionTableMap::translateFieldName('InstEmail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : InstitucionTableMap::translateFieldName('InstTratamiento', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_tratamiento = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : InstitucionTableMap::translateFieldName('InstDireccion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_direccion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : InstitucionTableMap::translateFieldName('InstGiro', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_giro = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : InstitucionTableMap::translateFieldName('InstRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->inst_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : InstitucionTableMap::translateFieldName('InstRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->inst_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : InstitucionTableMap::translateFieldName('InstRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inst_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = InstitucionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Institucion'), 0, $e);
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
        if ($this->aTInstitucion !== null && $this->inst_t_institucion !== $this->aTInstitucion->getTinsTipo()) {
            $this->aTInstitucion = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(InstitucionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildInstitucionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTInstitucion = null;
            $this->collAreas = null;

            $this->collEspecialidads = null;

            $this->collGerencias = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Institucion::setDeleted()
     * @see Institucion::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstitucionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildInstitucionQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(InstitucionTableMap::DATABASE_NAME);
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
                InstitucionTableMap::addInstanceToPool($this);
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

            if ($this->aTInstitucion !== null) {
                if ($this->aTInstitucion->isModified() || $this->aTInstitucion->isNew()) {
                    $affectedRows += $this->aTInstitucion->save($con);
                }
                $this->setTInstitucion($this->aTInstitucion);
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

            if ($this->areasScheduledForDeletion !== null) {
                if (!$this->areasScheduledForDeletion->isEmpty()) {
                    \AreaQuery::create()
                        ->filterByPrimaryKeys($this->areasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->areasScheduledForDeletion = null;
                }
            }

            if ($this->collAreas !== null) {
                foreach ($this->collAreas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->especialidadsScheduledForDeletion !== null) {
                if (!$this->especialidadsScheduledForDeletion->isEmpty()) {
                    foreach ($this->especialidadsScheduledForDeletion as $especialidad) {
                        // need to save related object because we set the relation to null
                        $especialidad->save($con);
                    }
                    $this->especialidadsScheduledForDeletion = null;
                }
            }

            if ($this->collEspecialidads !== null) {
                foreach ($this->collEspecialidads as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->gerenciasScheduledForDeletion !== null) {
                if (!$this->gerenciasScheduledForDeletion->isEmpty()) {
                    foreach ($this->gerenciasScheduledForDeletion as $gerencia) {
                        // need to save related object because we set the relation to null
                        $gerencia->save($con);
                    }
                    $this->gerenciasScheduledForDeletion = null;
                }
            }

            if ($this->collGerencias !== null) {
                foreach ($this->collGerencias as $referrerFK) {
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

        $this->modifiedColumns[InstitucionTableMap::COL_INST_CODIGO] = true;
        if (null !== $this->inst_codigo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . InstitucionTableMap::COL_INST_CODIGO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'inst_codigo';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_IDENTIFICADOR)) {
            $modifiedColumns[':p' . $index++]  = 'inst_identificador';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_DV)) {
            $modifiedColumns[':p' . $index++]  = 'inst_dv';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = 'inst_nombre';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_T_INSTITUCION)) {
            $modifiedColumns[':p' . $index++]  = 'inst_t_institucion';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_C_COMUNA)) {
            $modifiedColumns[':p' . $index++]  = 'inst_c_comuna';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_C_PAIS)) {
            $modifiedColumns[':p' . $index++]  = 'inst_c_pais';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_TELEFONO)) {
            $modifiedColumns[':p' . $index++]  = 'inst_telefono';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'inst_email';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_TRATAMIENTO)) {
            $modifiedColumns[':p' . $index++]  = 'inst_tratamiento';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_DIRECCION)) {
            $modifiedColumns[':p' . $index++]  = 'inst_direccion';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_GIRO)) {
            $modifiedColumns[':p' . $index++]  = 'inst_giro';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'inst_r_fecha_creacion';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'inst_r_fecha_modificacion';
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'inst_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO institucion (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'inst_codigo':
                        $stmt->bindValue($identifier, $this->inst_codigo, PDO::PARAM_INT);
                        break;
                    case 'inst_identificador':
                        $stmt->bindValue($identifier, $this->inst_identificador, PDO::PARAM_INT);
                        break;
                    case 'inst_dv':
                        $stmt->bindValue($identifier, $this->inst_dv, PDO::PARAM_STR);
                        break;
                    case 'inst_nombre':
                        $stmt->bindValue($identifier, $this->inst_nombre, PDO::PARAM_STR);
                        break;
                    case 'inst_t_institucion':
                        $stmt->bindValue($identifier, $this->inst_t_institucion, PDO::PARAM_INT);
                        break;
                    case 'inst_c_comuna':
                        $stmt->bindValue($identifier, $this->inst_c_comuna, PDO::PARAM_STR);
                        break;
                    case 'inst_c_pais':
                        $stmt->bindValue($identifier, $this->inst_c_pais, PDO::PARAM_STR);
                        break;
                    case 'inst_telefono':
                        $stmt->bindValue($identifier, $this->inst_telefono, PDO::PARAM_STR);
                        break;
                    case 'inst_email':
                        $stmt->bindValue($identifier, $this->inst_email, PDO::PARAM_STR);
                        break;
                    case 'inst_tratamiento':
                        $stmt->bindValue($identifier, $this->inst_tratamiento, PDO::PARAM_STR);
                        break;
                    case 'inst_direccion':
                        $stmt->bindValue($identifier, $this->inst_direccion, PDO::PARAM_STR);
                        break;
                    case 'inst_giro':
                        $stmt->bindValue($identifier, $this->inst_giro, PDO::PARAM_STR);
                        break;
                    case 'inst_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->inst_r_fecha_creacion ? $this->inst_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'inst_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->inst_r_fecha_modificacion ? $this->inst_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'inst_r_usuario':
                        $stmt->bindValue($identifier, $this->inst_r_usuario, PDO::PARAM_INT);
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
        $this->setInstCodigo($pk);

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
        $pos = InstitucionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getInstCodigo();
                break;
            case 1:
                return $this->getInstIdentificador();
                break;
            case 2:
                return $this->getInstDv();
                break;
            case 3:
                return $this->getInstNombre();
                break;
            case 4:
                return $this->getInstTInstitucion();
                break;
            case 5:
                return $this->getInstCComuna();
                break;
            case 6:
                return $this->getInstCPais();
                break;
            case 7:
                return $this->getInstTelefono();
                break;
            case 8:
                return $this->getInstEmail();
                break;
            case 9:
                return $this->getInstTratamiento();
                break;
            case 10:
                return $this->getInstDireccion();
                break;
            case 11:
                return $this->getInstGiro();
                break;
            case 12:
                return $this->getInstRFechaCreacion();
                break;
            case 13:
                return $this->getInstRFechaModificacion();
                break;
            case 14:
                return $this->getInstRUsuario();
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

        if (isset($alreadyDumpedObjects['Institucion'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Institucion'][$this->hashCode()] = true;
        $keys = InstitucionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getInstCodigo(),
            $keys[1] => $this->getInstIdentificador(),
            $keys[2] => $this->getInstDv(),
            $keys[3] => $this->getInstNombre(),
            $keys[4] => $this->getInstTInstitucion(),
            $keys[5] => $this->getInstCComuna(),
            $keys[6] => $this->getInstCPais(),
            $keys[7] => $this->getInstTelefono(),
            $keys[8] => $this->getInstEmail(),
            $keys[9] => $this->getInstTratamiento(),
            $keys[10] => $this->getInstDireccion(),
            $keys[11] => $this->getInstGiro(),
            $keys[12] => $this->getInstRFechaCreacion(),
            $keys[13] => $this->getInstRFechaModificacion(),
            $keys[14] => $this->getInstRUsuario(),
        );
        if ($result[$keys[12]] instanceof \DateTimeInterface) {
            $result[$keys[12]] = $result[$keys[12]]->format('c');
        }

        if ($result[$keys[13]] instanceof \DateTimeInterface) {
            $result[$keys[13]] = $result[$keys[13]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aTInstitucion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tInstitucion';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_institucion';
                        break;
                    default:
                        $key = 'TInstitucion';
                }

                $result[$key] = $this->aTInstitucion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAreas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'areas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'areas';
                        break;
                    default:
                        $key = 'Areas';
                }

                $result[$key] = $this->collAreas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEspecialidads) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'especialidads';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'especialidads';
                        break;
                    default:
                        $key = 'Especialidads';
                }

                $result[$key] = $this->collEspecialidads->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collGerencias) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'gerencias';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'gerencias';
                        break;
                    default:
                        $key = 'Gerencias';
                }

                $result[$key] = $this->collGerencias->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Institucion
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = InstitucionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Institucion
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setInstCodigo($value);
                break;
            case 1:
                $this->setInstIdentificador($value);
                break;
            case 2:
                $this->setInstDv($value);
                break;
            case 3:
                $this->setInstNombre($value);
                break;
            case 4:
                $this->setInstTInstitucion($value);
                break;
            case 5:
                $this->setInstCComuna($value);
                break;
            case 6:
                $this->setInstCPais($value);
                break;
            case 7:
                $this->setInstTelefono($value);
                break;
            case 8:
                $this->setInstEmail($value);
                break;
            case 9:
                $this->setInstTratamiento($value);
                break;
            case 10:
                $this->setInstDireccion($value);
                break;
            case 11:
                $this->setInstGiro($value);
                break;
            case 12:
                $this->setInstRFechaCreacion($value);
                break;
            case 13:
                $this->setInstRFechaModificacion($value);
                break;
            case 14:
                $this->setInstRUsuario($value);
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
        $keys = InstitucionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setInstCodigo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setInstIdentificador($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setInstDv($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setInstNombre($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setInstTInstitucion($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setInstCComuna($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setInstCPais($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setInstTelefono($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setInstEmail($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setInstTratamiento($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setInstDireccion($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setInstGiro($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setInstRFechaCreacion($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setInstRFechaModificacion($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setInstRUsuario($arr[$keys[14]]);
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
     * @return $this|\Institucion The current object, for fluid interface
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
        $criteria = new Criteria(InstitucionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(InstitucionTableMap::COL_INST_CODIGO)) {
            $criteria->add(InstitucionTableMap::COL_INST_CODIGO, $this->inst_codigo);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_IDENTIFICADOR)) {
            $criteria->add(InstitucionTableMap::COL_INST_IDENTIFICADOR, $this->inst_identificador);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_DV)) {
            $criteria->add(InstitucionTableMap::COL_INST_DV, $this->inst_dv);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_NOMBRE)) {
            $criteria->add(InstitucionTableMap::COL_INST_NOMBRE, $this->inst_nombre);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_T_INSTITUCION)) {
            $criteria->add(InstitucionTableMap::COL_INST_T_INSTITUCION, $this->inst_t_institucion);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_C_COMUNA)) {
            $criteria->add(InstitucionTableMap::COL_INST_C_COMUNA, $this->inst_c_comuna);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_C_PAIS)) {
            $criteria->add(InstitucionTableMap::COL_INST_C_PAIS, $this->inst_c_pais);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_TELEFONO)) {
            $criteria->add(InstitucionTableMap::COL_INST_TELEFONO, $this->inst_telefono);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_EMAIL)) {
            $criteria->add(InstitucionTableMap::COL_INST_EMAIL, $this->inst_email);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_TRATAMIENTO)) {
            $criteria->add(InstitucionTableMap::COL_INST_TRATAMIENTO, $this->inst_tratamiento);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_DIRECCION)) {
            $criteria->add(InstitucionTableMap::COL_INST_DIRECCION, $this->inst_direccion);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_GIRO)) {
            $criteria->add(InstitucionTableMap::COL_INST_GIRO, $this->inst_giro);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_R_FECHA_CREACION)) {
            $criteria->add(InstitucionTableMap::COL_INST_R_FECHA_CREACION, $this->inst_r_fecha_creacion);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_R_FECHA_MODIFICACION)) {
            $criteria->add(InstitucionTableMap::COL_INST_R_FECHA_MODIFICACION, $this->inst_r_fecha_modificacion);
        }
        if ($this->isColumnModified(InstitucionTableMap::COL_INST_R_USUARIO)) {
            $criteria->add(InstitucionTableMap::COL_INST_R_USUARIO, $this->inst_r_usuario);
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
        $criteria = ChildInstitucionQuery::create();
        $criteria->add(InstitucionTableMap::COL_INST_CODIGO, $this->inst_codigo);

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
        $validPk = null !== $this->getInstCodigo();

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
        return $this->getInstCodigo();
    }

    /**
     * Generic method to set the primary key (inst_codigo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setInstCodigo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getInstCodigo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Institucion (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setInstIdentificador($this->getInstIdentificador());
        $copyObj->setInstDv($this->getInstDv());
        $copyObj->setInstNombre($this->getInstNombre());
        $copyObj->setInstTInstitucion($this->getInstTInstitucion());
        $copyObj->setInstCComuna($this->getInstCComuna());
        $copyObj->setInstCPais($this->getInstCPais());
        $copyObj->setInstTelefono($this->getInstTelefono());
        $copyObj->setInstEmail($this->getInstEmail());
        $copyObj->setInstTratamiento($this->getInstTratamiento());
        $copyObj->setInstDireccion($this->getInstDireccion());
        $copyObj->setInstGiro($this->getInstGiro());
        $copyObj->setInstRFechaCreacion($this->getInstRFechaCreacion());
        $copyObj->setInstRFechaModificacion($this->getInstRFechaModificacion());
        $copyObj->setInstRUsuario($this->getInstRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getAreas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addArea($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEspecialidads() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEspecialidad($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getGerencias() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGerencia($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setInstCodigo(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Institucion Clone of current object.
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
     * Declares an association between this object and a ChildTInstitucion object.
     *
     * @param  ChildTInstitucion $v
     * @return $this|\Institucion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTInstitucion(ChildTInstitucion $v = null)
    {
        if ($v === null) {
            $this->setInstTInstitucion(NULL);
        } else {
            $this->setInstTInstitucion($v->getTinsTipo());
        }

        $this->aTInstitucion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTInstitucion object, it will not be re-added.
        if ($v !== null) {
            $v->addInstitucion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTInstitucion object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTInstitucion The associated ChildTInstitucion object.
     * @throws PropelException
     */
    public function getTInstitucion(ConnectionInterface $con = null)
    {
        if ($this->aTInstitucion === null && ($this->inst_t_institucion != 0)) {
            $this->aTInstitucion = ChildTInstitucionQuery::create()->findPk($this->inst_t_institucion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTInstitucion->addInstitucions($this);
             */
        }

        return $this->aTInstitucion;
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
        if ('Area' == $relationName) {
            $this->initAreas();
            return;
        }
        if ('Especialidad' == $relationName) {
            $this->initEspecialidads();
            return;
        }
        if ('Gerencia' == $relationName) {
            $this->initGerencias();
            return;
        }
    }

    /**
     * Clears out the collAreas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAreas()
     */
    public function clearAreas()
    {
        $this->collAreas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAreas collection loaded partially.
     */
    public function resetPartialAreas($v = true)
    {
        $this->collAreasPartial = $v;
    }

    /**
     * Initializes the collAreas collection.
     *
     * By default this just sets the collAreas collection to an empty array (like clearcollAreas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAreas($overrideExisting = true)
    {
        if (null !== $this->collAreas && !$overrideExisting) {
            return;
        }

        $collectionClassName = AreaTableMap::getTableMap()->getCollectionClassName();

        $this->collAreas = new $collectionClassName;
        $this->collAreas->setModel('\Area');
    }

    /**
     * Gets an array of ChildArea objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInstitucion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildArea[] List of ChildArea objects
     * @throws PropelException
     */
    public function getAreas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAreasPartial && !$this->isNew();
        if (null === $this->collAreas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAreas) {
                // return empty collection
                $this->initAreas();
            } else {
                $collAreas = ChildAreaQuery::create(null, $criteria)
                    ->filterByInstitucion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAreasPartial && count($collAreas)) {
                        $this->initAreas(false);

                        foreach ($collAreas as $obj) {
                            if (false == $this->collAreas->contains($obj)) {
                                $this->collAreas->append($obj);
                            }
                        }

                        $this->collAreasPartial = true;
                    }

                    return $collAreas;
                }

                if ($partial && $this->collAreas) {
                    foreach ($this->collAreas as $obj) {
                        if ($obj->isNew()) {
                            $collAreas[] = $obj;
                        }
                    }
                }

                $this->collAreas = $collAreas;
                $this->collAreasPartial = false;
            }
        }

        return $this->collAreas;
    }

    /**
     * Sets a collection of ChildArea objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $areas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildInstitucion The current object (for fluent API support)
     */
    public function setAreas(Collection $areas, ConnectionInterface $con = null)
    {
        /** @var ChildArea[] $areasToDelete */
        $areasToDelete = $this->getAreas(new Criteria(), $con)->diff($areas);


        $this->areasScheduledForDeletion = $areasToDelete;

        foreach ($areasToDelete as $areaRemoved) {
            $areaRemoved->setInstitucion(null);
        }

        $this->collAreas = null;
        foreach ($areas as $area) {
            $this->addArea($area);
        }

        $this->collAreas = $areas;
        $this->collAreasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Area objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Area objects.
     * @throws PropelException
     */
    public function countAreas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAreasPartial && !$this->isNew();
        if (null === $this->collAreas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAreas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAreas());
            }

            $query = ChildAreaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInstitucion($this)
                ->count($con);
        }

        return count($this->collAreas);
    }

    /**
     * Method called to associate a ChildArea object to this object
     * through the ChildArea foreign key attribute.
     *
     * @param  ChildArea $l ChildArea
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function addArea(ChildArea $l)
    {
        if ($this->collAreas === null) {
            $this->initAreas();
            $this->collAreasPartial = true;
        }

        if (!$this->collAreas->contains($l)) {
            $this->doAddArea($l);

            if ($this->areasScheduledForDeletion and $this->areasScheduledForDeletion->contains($l)) {
                $this->areasScheduledForDeletion->remove($this->areasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildArea $area The ChildArea object to add.
     */
    protected function doAddArea(ChildArea $area)
    {
        $this->collAreas[]= $area;
        $area->setInstitucion($this);
    }

    /**
     * @param  ChildArea $area The ChildArea object to remove.
     * @return $this|ChildInstitucion The current object (for fluent API support)
     */
    public function removeArea(ChildArea $area)
    {
        if ($this->getAreas()->contains($area)) {
            $pos = $this->collAreas->search($area);
            $this->collAreas->remove($pos);
            if (null === $this->areasScheduledForDeletion) {
                $this->areasScheduledForDeletion = clone $this->collAreas;
                $this->areasScheduledForDeletion->clear();
            }
            $this->areasScheduledForDeletion[]= clone $area;
            $area->setInstitucion(null);
        }

        return $this;
    }

    /**
     * Clears out the collEspecialidads collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEspecialidads()
     */
    public function clearEspecialidads()
    {
        $this->collEspecialidads = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEspecialidads collection loaded partially.
     */
    public function resetPartialEspecialidads($v = true)
    {
        $this->collEspecialidadsPartial = $v;
    }

    /**
     * Initializes the collEspecialidads collection.
     *
     * By default this just sets the collEspecialidads collection to an empty array (like clearcollEspecialidads());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEspecialidads($overrideExisting = true)
    {
        if (null !== $this->collEspecialidads && !$overrideExisting) {
            return;
        }

        $collectionClassName = EspecialidadTableMap::getTableMap()->getCollectionClassName();

        $this->collEspecialidads = new $collectionClassName;
        $this->collEspecialidads->setModel('\Especialidad');
    }

    /**
     * Gets an array of ChildEspecialidad objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInstitucion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEspecialidad[] List of ChildEspecialidad objects
     * @throws PropelException
     */
    public function getEspecialidads(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEspecialidadsPartial && !$this->isNew();
        if (null === $this->collEspecialidads || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEspecialidads) {
                // return empty collection
                $this->initEspecialidads();
            } else {
                $collEspecialidads = ChildEspecialidadQuery::create(null, $criteria)
                    ->filterByInstitucion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEspecialidadsPartial && count($collEspecialidads)) {
                        $this->initEspecialidads(false);

                        foreach ($collEspecialidads as $obj) {
                            if (false == $this->collEspecialidads->contains($obj)) {
                                $this->collEspecialidads->append($obj);
                            }
                        }

                        $this->collEspecialidadsPartial = true;
                    }

                    return $collEspecialidads;
                }

                if ($partial && $this->collEspecialidads) {
                    foreach ($this->collEspecialidads as $obj) {
                        if ($obj->isNew()) {
                            $collEspecialidads[] = $obj;
                        }
                    }
                }

                $this->collEspecialidads = $collEspecialidads;
                $this->collEspecialidadsPartial = false;
            }
        }

        return $this->collEspecialidads;
    }

    /**
     * Sets a collection of ChildEspecialidad objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $especialidads A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildInstitucion The current object (for fluent API support)
     */
    public function setEspecialidads(Collection $especialidads, ConnectionInterface $con = null)
    {
        /** @var ChildEspecialidad[] $especialidadsToDelete */
        $especialidadsToDelete = $this->getEspecialidads(new Criteria(), $con)->diff($especialidads);


        $this->especialidadsScheduledForDeletion = $especialidadsToDelete;

        foreach ($especialidadsToDelete as $especialidadRemoved) {
            $especialidadRemoved->setInstitucion(null);
        }

        $this->collEspecialidads = null;
        foreach ($especialidads as $especialidad) {
            $this->addEspecialidad($especialidad);
        }

        $this->collEspecialidads = $especialidads;
        $this->collEspecialidadsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Especialidad objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Especialidad objects.
     * @throws PropelException
     */
    public function countEspecialidads(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEspecialidadsPartial && !$this->isNew();
        if (null === $this->collEspecialidads || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEspecialidads) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEspecialidads());
            }

            $query = ChildEspecialidadQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInstitucion($this)
                ->count($con);
        }

        return count($this->collEspecialidads);
    }

    /**
     * Method called to associate a ChildEspecialidad object to this object
     * through the ChildEspecialidad foreign key attribute.
     *
     * @param  ChildEspecialidad $l ChildEspecialidad
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function addEspecialidad(ChildEspecialidad $l)
    {
        if ($this->collEspecialidads === null) {
            $this->initEspecialidads();
            $this->collEspecialidadsPartial = true;
        }

        if (!$this->collEspecialidads->contains($l)) {
            $this->doAddEspecialidad($l);

            if ($this->especialidadsScheduledForDeletion and $this->especialidadsScheduledForDeletion->contains($l)) {
                $this->especialidadsScheduledForDeletion->remove($this->especialidadsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEspecialidad $especialidad The ChildEspecialidad object to add.
     */
    protected function doAddEspecialidad(ChildEspecialidad $especialidad)
    {
        $this->collEspecialidads[]= $especialidad;
        $especialidad->setInstitucion($this);
    }

    /**
     * @param  ChildEspecialidad $especialidad The ChildEspecialidad object to remove.
     * @return $this|ChildInstitucion The current object (for fluent API support)
     */
    public function removeEspecialidad(ChildEspecialidad $especialidad)
    {
        if ($this->getEspecialidads()->contains($especialidad)) {
            $pos = $this->collEspecialidads->search($especialidad);
            $this->collEspecialidads->remove($pos);
            if (null === $this->especialidadsScheduledForDeletion) {
                $this->especialidadsScheduledForDeletion = clone $this->collEspecialidads;
                $this->especialidadsScheduledForDeletion->clear();
            }
            $this->especialidadsScheduledForDeletion[]= $especialidad;
            $especialidad->setInstitucion(null);
        }

        return $this;
    }

    /**
     * Clears out the collGerencias collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addGerencias()
     */
    public function clearGerencias()
    {
        $this->collGerencias = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collGerencias collection loaded partially.
     */
    public function resetPartialGerencias($v = true)
    {
        $this->collGerenciasPartial = $v;
    }

    /**
     * Initializes the collGerencias collection.
     *
     * By default this just sets the collGerencias collection to an empty array (like clearcollGerencias());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initGerencias($overrideExisting = true)
    {
        if (null !== $this->collGerencias && !$overrideExisting) {
            return;
        }

        $collectionClassName = GerenciaTableMap::getTableMap()->getCollectionClassName();

        $this->collGerencias = new $collectionClassName;
        $this->collGerencias->setModel('\Gerencia');
    }

    /**
     * Gets an array of ChildGerencia objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildInstitucion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildGerencia[] List of ChildGerencia objects
     * @throws PropelException
     */
    public function getGerencias(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collGerenciasPartial && !$this->isNew();
        if (null === $this->collGerencias || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collGerencias) {
                // return empty collection
                $this->initGerencias();
            } else {
                $collGerencias = ChildGerenciaQuery::create(null, $criteria)
                    ->filterByInstitucion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collGerenciasPartial && count($collGerencias)) {
                        $this->initGerencias(false);

                        foreach ($collGerencias as $obj) {
                            if (false == $this->collGerencias->contains($obj)) {
                                $this->collGerencias->append($obj);
                            }
                        }

                        $this->collGerenciasPartial = true;
                    }

                    return $collGerencias;
                }

                if ($partial && $this->collGerencias) {
                    foreach ($this->collGerencias as $obj) {
                        if ($obj->isNew()) {
                            $collGerencias[] = $obj;
                        }
                    }
                }

                $this->collGerencias = $collGerencias;
                $this->collGerenciasPartial = false;
            }
        }

        return $this->collGerencias;
    }

    /**
     * Sets a collection of ChildGerencia objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $gerencias A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildInstitucion The current object (for fluent API support)
     */
    public function setGerencias(Collection $gerencias, ConnectionInterface $con = null)
    {
        /** @var ChildGerencia[] $gerenciasToDelete */
        $gerenciasToDelete = $this->getGerencias(new Criteria(), $con)->diff($gerencias);


        $this->gerenciasScheduledForDeletion = $gerenciasToDelete;

        foreach ($gerenciasToDelete as $gerenciaRemoved) {
            $gerenciaRemoved->setInstitucion(null);
        }

        $this->collGerencias = null;
        foreach ($gerencias as $gerencia) {
            $this->addGerencia($gerencia);
        }

        $this->collGerencias = $gerencias;
        $this->collGerenciasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Gerencia objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Gerencia objects.
     * @throws PropelException
     */
    public function countGerencias(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collGerenciasPartial && !$this->isNew();
        if (null === $this->collGerencias || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collGerencias) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getGerencias());
            }

            $query = ChildGerenciaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInstitucion($this)
                ->count($con);
        }

        return count($this->collGerencias);
    }

    /**
     * Method called to associate a ChildGerencia object to this object
     * through the ChildGerencia foreign key attribute.
     *
     * @param  ChildGerencia $l ChildGerencia
     * @return $this|\Institucion The current object (for fluent API support)
     */
    public function addGerencia(ChildGerencia $l)
    {
        if ($this->collGerencias === null) {
            $this->initGerencias();
            $this->collGerenciasPartial = true;
        }

        if (!$this->collGerencias->contains($l)) {
            $this->doAddGerencia($l);

            if ($this->gerenciasScheduledForDeletion and $this->gerenciasScheduledForDeletion->contains($l)) {
                $this->gerenciasScheduledForDeletion->remove($this->gerenciasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildGerencia $gerencia The ChildGerencia object to add.
     */
    protected function doAddGerencia(ChildGerencia $gerencia)
    {
        $this->collGerencias[]= $gerencia;
        $gerencia->setInstitucion($this);
    }

    /**
     * @param  ChildGerencia $gerencia The ChildGerencia object to remove.
     * @return $this|ChildInstitucion The current object (for fluent API support)
     */
    public function removeGerencia(ChildGerencia $gerencia)
    {
        if ($this->getGerencias()->contains($gerencia)) {
            $pos = $this->collGerencias->search($gerencia);
            $this->collGerencias->remove($pos);
            if (null === $this->gerenciasScheduledForDeletion) {
                $this->gerenciasScheduledForDeletion = clone $this->collGerencias;
                $this->gerenciasScheduledForDeletion->clear();
            }
            $this->gerenciasScheduledForDeletion[]= $gerencia;
            $gerencia->setInstitucion(null);
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
        if (null !== $this->aTInstitucion) {
            $this->aTInstitucion->removeInstitucion($this);
        }
        $this->inst_codigo = null;
        $this->inst_identificador = null;
        $this->inst_dv = null;
        $this->inst_nombre = null;
        $this->inst_t_institucion = null;
        $this->inst_c_comuna = null;
        $this->inst_c_pais = null;
        $this->inst_telefono = null;
        $this->inst_email = null;
        $this->inst_tratamiento = null;
        $this->inst_direccion = null;
        $this->inst_giro = null;
        $this->inst_r_fecha_creacion = null;
        $this->inst_r_fecha_modificacion = null;
        $this->inst_r_usuario = null;
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
            if ($this->collAreas) {
                foreach ($this->collAreas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEspecialidads) {
                foreach ($this->collEspecialidads as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collGerencias) {
                foreach ($this->collGerencias as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collAreas = null;
        $this->collEspecialidads = null;
        $this->collGerencias = null;
        $this->aTInstitucion = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(InstitucionTableMap::DEFAULT_STRING_FORMAT);
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
