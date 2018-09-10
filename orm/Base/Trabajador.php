<?php

namespace Base;

use \AniosExperienciaCargo as ChildAniosExperienciaCargo;
use \AniosExperienciaCargoQuery as ChildAniosExperienciaCargoQuery;
use \Area as ChildArea;
use \AreaQuery as ChildAreaQuery;
use \Cargo as ChildCargo;
use \CargoQuery as ChildCargoQuery;
use \Gerencia as ChildGerencia;
use \GerenciaQuery as ChildGerenciaQuery;
use \Inscripcion as ChildInscripcion;
use \InscripcionQuery as ChildInscripcionQuery;
use \Persona as ChildPersona;
use \PersonaQuery as ChildPersonaQuery;
use \Trabajador as ChildTrabajador;
use \TrabajadorQuery as ChildTrabajadorQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\InscripcionTableMap;
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
 * Base class that represents a row from the 'trabajador' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Trabajador implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\TrabajadorTableMap';


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
     * The value for the trab_codigo field.
     *
     * @var        int
     */
    protected $trab_codigo;

    /**
     * The value for the trab_c_persona field.
     *
     * @var        int
     */
    protected $trab_c_persona;

    /**
     * The value for the trab_c_cargo field.
     *
     * @var        int
     */
    protected $trab_c_cargo;

    /**
     * The value for the trab_c_gerencia field.
     *
     * @var        int
     */
    protected $trab_c_gerencia;

    /**
     * The value for the trab_c_area field.
     *
     * @var        int
     */
    protected $trab_c_area;

    /**
     * The value for the trab_c_anios_experiencia_cargo field.
     *
     * @var        int
     */
    protected $trab_c_anios_experiencia_cargo;

    /**
     * The value for the trab_fecha_inicio field.
     *
     * @var        string
     */
    protected $trab_fecha_inicio;

    /**
     * The value for the trab_fecha_termino field.
     *
     * @var        string
     */
    protected $trab_fecha_termino;

    /**
     * The value for the trab_vigente field.
     *
     * @var        int
     */
    protected $trab_vigente;

    /**
     * The value for the trab_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $trab_r_fecha_creacion;

    /**
     * The value for the trab_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $trab_r_fecha_modificacion;

    /**
     * The value for the trab_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $trab_r_usuario;

    /**
     * @var        ChildAniosExperienciaCargo
     */
    protected $aAniosExperienciaCargo;

    /**
     * @var        ChildArea
     */
    protected $aArea;

    /**
     * @var        ChildCargo
     */
    protected $aCargo;

    /**
     * @var        ChildGerencia
     */
    protected $aGerencia;

    /**
     * @var        ChildPersona
     */
    protected $aPersona;

    /**
     * @var        ObjectCollection|ChildInscripcion[] Collection to store aggregation of ChildInscripcion objects.
     */
    protected $collInscripcions;
    protected $collInscripcionsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInscripcion[]
     */
    protected $inscripcionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->trab_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Trabajador object.
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
     * Compares this with another <code>Trabajador</code> instance.  If
     * <code>obj</code> is an instance of <code>Trabajador</code>, delegates to
     * <code>equals(Trabajador)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Trabajador The current object, for fluid interface
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
     * Get the [trab_codigo] column value.
     *
     * @return int
     */
    public function getTrabCodigo()
    {
        return $this->trab_codigo;
    }

    /**
     * Get the [trab_c_persona] column value.
     *
     * @return int
     */
    public function getTrabCPersona()
    {
        return $this->trab_c_persona;
    }

    /**
     * Get the [trab_c_cargo] column value.
     *
     * @return int
     */
    public function getTrabCCargo()
    {
        return $this->trab_c_cargo;
    }

    /**
     * Get the [trab_c_gerencia] column value.
     *
     * @return int
     */
    public function getTrabCGerencia()
    {
        return $this->trab_c_gerencia;
    }

    /**
     * Get the [trab_c_area] column value.
     *
     * @return int
     */
    public function getTrabCArea()
    {
        return $this->trab_c_area;
    }

    /**
     * Get the [trab_c_anios_experiencia_cargo] column value.
     *
     * @return int
     */
    public function getTrabCAniosExperienciaCargo()
    {
        return $this->trab_c_anios_experiencia_cargo;
    }

    /**
     * Get the [trab_fecha_inicio] column value.
     *
     * @return string
     */
    public function getTrabFechaInicio()
    {
        return $this->trab_fecha_inicio;
    }

    /**
     * Get the [trab_fecha_termino] column value.
     *
     * @return string
     */
    public function getTrabFechaTermino()
    {
        return $this->trab_fecha_termino;
    }

    /**
     * Get the [trab_vigente] column value.
     *
     * @return int
     */
    public function getTrabVigente()
    {
        return $this->trab_vigente;
    }

    /**
     * Get the [optionally formatted] temporal [trab_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTrabRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->trab_r_fecha_creacion;
        } else {
            return $this->trab_r_fecha_creacion instanceof \DateTimeInterface ? $this->trab_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [trab_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTrabRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->trab_r_fecha_modificacion;
        } else {
            return $this->trab_r_fecha_modificacion instanceof \DateTimeInterface ? $this->trab_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [trab_r_usuario] column value.
     *
     * @return int
     */
    public function getTrabRUsuario()
    {
        return $this->trab_r_usuario;
    }

    /**
     * Set the value of [trab_codigo] column.
     *
     * @param int $v new value
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabCodigo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trab_codigo !== $v) {
            $this->trab_codigo = $v;
            $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_CODIGO] = true;
        }

        return $this;
    } // setTrabCodigo()

    /**
     * Set the value of [trab_c_persona] column.
     *
     * @param int $v new value
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabCPersona($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trab_c_persona !== $v) {
            $this->trab_c_persona = $v;
            $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_C_PERSONA] = true;
        }

        if ($this->aPersona !== null && $this->aPersona->getPersCodigo() !== $v) {
            $this->aPersona = null;
        }

        return $this;
    } // setTrabCPersona()

    /**
     * Set the value of [trab_c_cargo] column.
     *
     * @param int $v new value
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabCCargo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trab_c_cargo !== $v) {
            $this->trab_c_cargo = $v;
            $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_C_CARGO] = true;
        }

        if ($this->aCargo !== null && $this->aCargo->getCargCodigo() !== $v) {
            $this->aCargo = null;
        }

        return $this;
    } // setTrabCCargo()

    /**
     * Set the value of [trab_c_gerencia] column.
     *
     * @param int $v new value
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabCGerencia($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trab_c_gerencia !== $v) {
            $this->trab_c_gerencia = $v;
            $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_C_GERENCIA] = true;
        }

        if ($this->aGerencia !== null && $this->aGerencia->getGereCodigo() !== $v) {
            $this->aGerencia = null;
        }

        return $this;
    } // setTrabCGerencia()

    /**
     * Set the value of [trab_c_area] column.
     *
     * @param int $v new value
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabCArea($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trab_c_area !== $v) {
            $this->trab_c_area = $v;
            $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_C_AREA] = true;
        }

        if ($this->aArea !== null && $this->aArea->getAreaCodigo() !== $v) {
            $this->aArea = null;
        }

        return $this;
    } // setTrabCArea()

    /**
     * Set the value of [trab_c_anios_experiencia_cargo] column.
     *
     * @param int $v new value
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabCAniosExperienciaCargo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trab_c_anios_experiencia_cargo !== $v) {
            $this->trab_c_anios_experiencia_cargo = $v;
            $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO] = true;
        }

        if ($this->aAniosExperienciaCargo !== null && $this->aAniosExperienciaCargo->getAnexcaCodigo() !== $v) {
            $this->aAniosExperienciaCargo = null;
        }

        return $this;
    } // setTrabCAniosExperienciaCargo()

    /**
     * Set the value of [trab_fecha_inicio] column.
     *
     * @param string $v new value
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabFechaInicio($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->trab_fecha_inicio !== $v) {
            $this->trab_fecha_inicio = $v;
            $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_FECHA_INICIO] = true;
        }

        return $this;
    } // setTrabFechaInicio()

    /**
     * Set the value of [trab_fecha_termino] column.
     *
     * @param string $v new value
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabFechaTermino($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->trab_fecha_termino !== $v) {
            $this->trab_fecha_termino = $v;
            $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_FECHA_TERMINO] = true;
        }

        return $this;
    } // setTrabFechaTermino()

    /**
     * Set the value of [trab_vigente] column.
     *
     * @param int $v new value
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabVigente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trab_vigente !== $v) {
            $this->trab_vigente = $v;
            $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_VIGENTE] = true;
        }

        return $this;
    } // setTrabVigente()

    /**
     * Sets the value of [trab_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->trab_r_fecha_creacion !== null || $dt !== null) {
            if ($this->trab_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->trab_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->trab_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setTrabRFechaCreacion()

    /**
     * Sets the value of [trab_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->trab_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->trab_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->trab_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->trab_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setTrabRFechaModificacion()

    /**
     * Set the value of [trab_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function setTrabRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trab_r_usuario !== $v) {
            $this->trab_r_usuario = $v;
            $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_R_USUARIO] = true;
        }

        return $this;
    } // setTrabRUsuario()

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
            if ($this->trab_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TrabajadorTableMap::translateFieldName('TrabCodigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trab_codigo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TrabajadorTableMap::translateFieldName('TrabCPersona', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trab_c_persona = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TrabajadorTableMap::translateFieldName('TrabCCargo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trab_c_cargo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TrabajadorTableMap::translateFieldName('TrabCGerencia', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trab_c_gerencia = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TrabajadorTableMap::translateFieldName('TrabCArea', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trab_c_area = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TrabajadorTableMap::translateFieldName('TrabCAniosExperienciaCargo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trab_c_anios_experiencia_cargo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : TrabajadorTableMap::translateFieldName('TrabFechaInicio', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trab_fecha_inicio = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : TrabajadorTableMap::translateFieldName('TrabFechaTermino', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trab_fecha_termino = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : TrabajadorTableMap::translateFieldName('TrabVigente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trab_vigente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : TrabajadorTableMap::translateFieldName('TrabRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->trab_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : TrabajadorTableMap::translateFieldName('TrabRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->trab_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : TrabajadorTableMap::translateFieldName('TrabRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trab_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = TrabajadorTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Trabajador'), 0, $e);
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
        if ($this->aPersona !== null && $this->trab_c_persona !== $this->aPersona->getPersCodigo()) {
            $this->aPersona = null;
        }
        if ($this->aCargo !== null && $this->trab_c_cargo !== $this->aCargo->getCargCodigo()) {
            $this->aCargo = null;
        }
        if ($this->aGerencia !== null && $this->trab_c_gerencia !== $this->aGerencia->getGereCodigo()) {
            $this->aGerencia = null;
        }
        if ($this->aArea !== null && $this->trab_c_area !== $this->aArea->getAreaCodigo()) {
            $this->aArea = null;
        }
        if ($this->aAniosExperienciaCargo !== null && $this->trab_c_anios_experiencia_cargo !== $this->aAniosExperienciaCargo->getAnexcaCodigo()) {
            $this->aAniosExperienciaCargo = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(TrabajadorTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTrabajadorQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAniosExperienciaCargo = null;
            $this->aArea = null;
            $this->aCargo = null;
            $this->aGerencia = null;
            $this->aPersona = null;
            $this->collInscripcions = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Trabajador::setDeleted()
     * @see Trabajador::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TrabajadorTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTrabajadorQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(TrabajadorTableMap::DATABASE_NAME);
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
                TrabajadorTableMap::addInstanceToPool($this);
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

            if ($this->aAniosExperienciaCargo !== null) {
                if ($this->aAniosExperienciaCargo->isModified() || $this->aAniosExperienciaCargo->isNew()) {
                    $affectedRows += $this->aAniosExperienciaCargo->save($con);
                }
                $this->setAniosExperienciaCargo($this->aAniosExperienciaCargo);
            }

            if ($this->aArea !== null) {
                if ($this->aArea->isModified() || $this->aArea->isNew()) {
                    $affectedRows += $this->aArea->save($con);
                }
                $this->setArea($this->aArea);
            }

            if ($this->aCargo !== null) {
                if ($this->aCargo->isModified() || $this->aCargo->isNew()) {
                    $affectedRows += $this->aCargo->save($con);
                }
                $this->setCargo($this->aCargo);
            }

            if ($this->aGerencia !== null) {
                if ($this->aGerencia->isModified() || $this->aGerencia->isNew()) {
                    $affectedRows += $this->aGerencia->save($con);
                }
                $this->setGerencia($this->aGerencia);
            }

            if ($this->aPersona !== null) {
                if ($this->aPersona->isModified() || $this->aPersona->isNew()) {
                    $affectedRows += $this->aPersona->save($con);
                }
                $this->setPersona($this->aPersona);
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

            if ($this->inscripcionsScheduledForDeletion !== null) {
                if (!$this->inscripcionsScheduledForDeletion->isEmpty()) {
                    \InscripcionQuery::create()
                        ->filterByPrimaryKeys($this->inscripcionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->inscripcionsScheduledForDeletion = null;
                }
            }

            if ($this->collInscripcions !== null) {
                foreach ($this->collInscripcions as $referrerFK) {
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

        $this->modifiedColumns[TrabajadorTableMap::COL_TRAB_CODIGO] = true;
        if (null !== $this->trab_codigo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TrabajadorTableMap::COL_TRAB_CODIGO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'trab_codigo';
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_C_PERSONA)) {
            $modifiedColumns[':p' . $index++]  = 'trab_c_persona';
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_C_CARGO)) {
            $modifiedColumns[':p' . $index++]  = 'trab_c_cargo';
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_C_GERENCIA)) {
            $modifiedColumns[':p' . $index++]  = 'trab_c_gerencia';
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_C_AREA)) {
            $modifiedColumns[':p' . $index++]  = 'trab_c_area';
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO)) {
            $modifiedColumns[':p' . $index++]  = 'trab_c_anios_experiencia_cargo';
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_FECHA_INICIO)) {
            $modifiedColumns[':p' . $index++]  = 'trab_fecha_inicio';
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_FECHA_TERMINO)) {
            $modifiedColumns[':p' . $index++]  = 'trab_fecha_termino';
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_VIGENTE)) {
            $modifiedColumns[':p' . $index++]  = 'trab_vigente';
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'trab_r_fecha_creacion';
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'trab_r_fecha_modificacion';
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'trab_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO trabajador (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'trab_codigo':
                        $stmt->bindValue($identifier, $this->trab_codigo, PDO::PARAM_INT);
                        break;
                    case 'trab_c_persona':
                        $stmt->bindValue($identifier, $this->trab_c_persona, PDO::PARAM_INT);
                        break;
                    case 'trab_c_cargo':
                        $stmt->bindValue($identifier, $this->trab_c_cargo, PDO::PARAM_INT);
                        break;
                    case 'trab_c_gerencia':
                        $stmt->bindValue($identifier, $this->trab_c_gerencia, PDO::PARAM_INT);
                        break;
                    case 'trab_c_area':
                        $stmt->bindValue($identifier, $this->trab_c_area, PDO::PARAM_INT);
                        break;
                    case 'trab_c_anios_experiencia_cargo':
                        $stmt->bindValue($identifier, $this->trab_c_anios_experiencia_cargo, PDO::PARAM_INT);
                        break;
                    case 'trab_fecha_inicio':
                        $stmt->bindValue($identifier, $this->trab_fecha_inicio, PDO::PARAM_STR);
                        break;
                    case 'trab_fecha_termino':
                        $stmt->bindValue($identifier, $this->trab_fecha_termino, PDO::PARAM_STR);
                        break;
                    case 'trab_vigente':
                        $stmt->bindValue($identifier, $this->trab_vigente, PDO::PARAM_INT);
                        break;
                    case 'trab_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->trab_r_fecha_creacion ? $this->trab_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'trab_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->trab_r_fecha_modificacion ? $this->trab_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'trab_r_usuario':
                        $stmt->bindValue($identifier, $this->trab_r_usuario, PDO::PARAM_INT);
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
        $this->setTrabCodigo($pk);

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
        $pos = TrabajadorTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getTrabCodigo();
                break;
            case 1:
                return $this->getTrabCPersona();
                break;
            case 2:
                return $this->getTrabCCargo();
                break;
            case 3:
                return $this->getTrabCGerencia();
                break;
            case 4:
                return $this->getTrabCArea();
                break;
            case 5:
                return $this->getTrabCAniosExperienciaCargo();
                break;
            case 6:
                return $this->getTrabFechaInicio();
                break;
            case 7:
                return $this->getTrabFechaTermino();
                break;
            case 8:
                return $this->getTrabVigente();
                break;
            case 9:
                return $this->getTrabRFechaCreacion();
                break;
            case 10:
                return $this->getTrabRFechaModificacion();
                break;
            case 11:
                return $this->getTrabRUsuario();
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

        if (isset($alreadyDumpedObjects['Trabajador'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Trabajador'][$this->hashCode()] = true;
        $keys = TrabajadorTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTrabCodigo(),
            $keys[1] => $this->getTrabCPersona(),
            $keys[2] => $this->getTrabCCargo(),
            $keys[3] => $this->getTrabCGerencia(),
            $keys[4] => $this->getTrabCArea(),
            $keys[5] => $this->getTrabCAniosExperienciaCargo(),
            $keys[6] => $this->getTrabFechaInicio(),
            $keys[7] => $this->getTrabFechaTermino(),
            $keys[8] => $this->getTrabVigente(),
            $keys[9] => $this->getTrabRFechaCreacion(),
            $keys[10] => $this->getTrabRFechaModificacion(),
            $keys[11] => $this->getTrabRUsuario(),
        );
        if ($result[$keys[9]] instanceof \DateTimeInterface) {
            $result[$keys[9]] = $result[$keys[9]]->format('c');
        }

        if ($result[$keys[10]] instanceof \DateTimeInterface) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aAniosExperienciaCargo) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'aniosExperienciaCargo';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'anios_experiencia_cargo';
                        break;
                    default:
                        $key = 'AniosExperienciaCargo';
                }

                $result[$key] = $this->aAniosExperienciaCargo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aArea) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'area';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'area';
                        break;
                    default:
                        $key = 'Area';
                }

                $result[$key] = $this->aArea->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->aGerencia) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'gerencia';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'gerencia';
                        break;
                    default:
                        $key = 'Gerencia';
                }

                $result[$key] = $this->aGerencia->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collInscripcions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'inscripcions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'inscripcions';
                        break;
                    default:
                        $key = 'Inscripcions';
                }

                $result[$key] = $this->collInscripcions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Trabajador
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TrabajadorTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Trabajador
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setTrabCodigo($value);
                break;
            case 1:
                $this->setTrabCPersona($value);
                break;
            case 2:
                $this->setTrabCCargo($value);
                break;
            case 3:
                $this->setTrabCGerencia($value);
                break;
            case 4:
                $this->setTrabCArea($value);
                break;
            case 5:
                $this->setTrabCAniosExperienciaCargo($value);
                break;
            case 6:
                $this->setTrabFechaInicio($value);
                break;
            case 7:
                $this->setTrabFechaTermino($value);
                break;
            case 8:
                $this->setTrabVigente($value);
                break;
            case 9:
                $this->setTrabRFechaCreacion($value);
                break;
            case 10:
                $this->setTrabRFechaModificacion($value);
                break;
            case 11:
                $this->setTrabRUsuario($value);
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
        $keys = TrabajadorTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setTrabCodigo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTrabCPersona($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setTrabCCargo($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTrabCGerencia($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTrabCArea($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTrabCAniosExperienciaCargo($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setTrabFechaInicio($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTrabFechaTermino($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setTrabVigente($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTrabRFechaCreacion($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setTrabRFechaModificacion($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTrabRUsuario($arr[$keys[11]]);
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
     * @return $this|\Trabajador The current object, for fluid interface
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
        $criteria = new Criteria(TrabajadorTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_CODIGO)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_CODIGO, $this->trab_codigo);
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_C_PERSONA)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_C_PERSONA, $this->trab_c_persona);
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_C_CARGO)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_C_CARGO, $this->trab_c_cargo);
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_C_GERENCIA)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_C_GERENCIA, $this->trab_c_gerencia);
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_C_AREA)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_C_AREA, $this->trab_c_area);
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO, $this->trab_c_anios_experiencia_cargo);
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_FECHA_INICIO)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_FECHA_INICIO, $this->trab_fecha_inicio);
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_FECHA_TERMINO)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_FECHA_TERMINO, $this->trab_fecha_termino);
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_VIGENTE)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_VIGENTE, $this->trab_vigente);
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_R_FECHA_CREACION)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_R_FECHA_CREACION, $this->trab_r_fecha_creacion);
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_R_FECHA_MODIFICACION)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_R_FECHA_MODIFICACION, $this->trab_r_fecha_modificacion);
        }
        if ($this->isColumnModified(TrabajadorTableMap::COL_TRAB_R_USUARIO)) {
            $criteria->add(TrabajadorTableMap::COL_TRAB_R_USUARIO, $this->trab_r_usuario);
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
        $criteria = ChildTrabajadorQuery::create();
        $criteria->add(TrabajadorTableMap::COL_TRAB_CODIGO, $this->trab_codigo);

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
        $validPk = null !== $this->getTrabCodigo();

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
        return $this->getTrabCodigo();
    }

    /**
     * Generic method to set the primary key (trab_codigo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTrabCodigo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getTrabCodigo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Trabajador (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTrabCPersona($this->getTrabCPersona());
        $copyObj->setTrabCCargo($this->getTrabCCargo());
        $copyObj->setTrabCGerencia($this->getTrabCGerencia());
        $copyObj->setTrabCArea($this->getTrabCArea());
        $copyObj->setTrabCAniosExperienciaCargo($this->getTrabCAniosExperienciaCargo());
        $copyObj->setTrabFechaInicio($this->getTrabFechaInicio());
        $copyObj->setTrabFechaTermino($this->getTrabFechaTermino());
        $copyObj->setTrabVigente($this->getTrabVigente());
        $copyObj->setTrabRFechaCreacion($this->getTrabRFechaCreacion());
        $copyObj->setTrabRFechaModificacion($this->getTrabRFechaModificacion());
        $copyObj->setTrabRUsuario($this->getTrabRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getInscripcions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInscripcion($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTrabCodigo(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Trabajador Clone of current object.
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
     * Declares an association between this object and a ChildAniosExperienciaCargo object.
     *
     * @param  ChildAniosExperienciaCargo $v
     * @return $this|\Trabajador The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAniosExperienciaCargo(ChildAniosExperienciaCargo $v = null)
    {
        if ($v === null) {
            $this->setTrabCAniosExperienciaCargo(NULL);
        } else {
            $this->setTrabCAniosExperienciaCargo($v->getAnexcaCodigo());
        }

        $this->aAniosExperienciaCargo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildAniosExperienciaCargo object, it will not be re-added.
        if ($v !== null) {
            $v->addTrabajador($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildAniosExperienciaCargo object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildAniosExperienciaCargo The associated ChildAniosExperienciaCargo object.
     * @throws PropelException
     */
    public function getAniosExperienciaCargo(ConnectionInterface $con = null)
    {
        if ($this->aAniosExperienciaCargo === null && ($this->trab_c_anios_experiencia_cargo != 0)) {
            $this->aAniosExperienciaCargo = ChildAniosExperienciaCargoQuery::create()->findPk($this->trab_c_anios_experiencia_cargo, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAniosExperienciaCargo->addTrabajadors($this);
             */
        }

        return $this->aAniosExperienciaCargo;
    }

    /**
     * Declares an association between this object and a ChildArea object.
     *
     * @param  ChildArea $v
     * @return $this|\Trabajador The current object (for fluent API support)
     * @throws PropelException
     */
    public function setArea(ChildArea $v = null)
    {
        if ($v === null) {
            $this->setTrabCArea(NULL);
        } else {
            $this->setTrabCArea($v->getAreaCodigo());
        }

        $this->aArea = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildArea object, it will not be re-added.
        if ($v !== null) {
            $v->addTrabajador($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildArea object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildArea The associated ChildArea object.
     * @throws PropelException
     */
    public function getArea(ConnectionInterface $con = null)
    {
        if ($this->aArea === null && ($this->trab_c_area != 0)) {
            $this->aArea = ChildAreaQuery::create()->findPk($this->trab_c_area, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aArea->addTrabajadors($this);
             */
        }

        return $this->aArea;
    }

    /**
     * Declares an association between this object and a ChildCargo object.
     *
     * @param  ChildCargo $v
     * @return $this|\Trabajador The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCargo(ChildCargo $v = null)
    {
        if ($v === null) {
            $this->setTrabCCargo(NULL);
        } else {
            $this->setTrabCCargo($v->getCargCodigo());
        }

        $this->aCargo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCargo object, it will not be re-added.
        if ($v !== null) {
            $v->addTrabajador($this);
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
        if ($this->aCargo === null && ($this->trab_c_cargo != 0)) {
            $this->aCargo = ChildCargoQuery::create()->findPk($this->trab_c_cargo, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCargo->addTrabajadors($this);
             */
        }

        return $this->aCargo;
    }

    /**
     * Declares an association between this object and a ChildGerencia object.
     *
     * @param  ChildGerencia $v
     * @return $this|\Trabajador The current object (for fluent API support)
     * @throws PropelException
     */
    public function setGerencia(ChildGerencia $v = null)
    {
        if ($v === null) {
            $this->setTrabCGerencia(NULL);
        } else {
            $this->setTrabCGerencia($v->getGereCodigo());
        }

        $this->aGerencia = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildGerencia object, it will not be re-added.
        if ($v !== null) {
            $v->addTrabajador($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildGerencia object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildGerencia The associated ChildGerencia object.
     * @throws PropelException
     */
    public function getGerencia(ConnectionInterface $con = null)
    {
        if ($this->aGerencia === null && ($this->trab_c_gerencia != 0)) {
            $this->aGerencia = ChildGerenciaQuery::create()->findPk($this->trab_c_gerencia, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aGerencia->addTrabajadors($this);
             */
        }

        return $this->aGerencia;
    }

    /**
     * Declares an association between this object and a ChildPersona object.
     *
     * @param  ChildPersona $v
     * @return $this|\Trabajador The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersona(ChildPersona $v = null)
    {
        if ($v === null) {
            $this->setTrabCPersona(NULL);
        } else {
            $this->setTrabCPersona($v->getPersCodigo());
        }

        $this->aPersona = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPersona object, it will not be re-added.
        if ($v !== null) {
            $v->addTrabajador($this);
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
        if ($this->aPersona === null && ($this->trab_c_persona != 0)) {
            $this->aPersona = ChildPersonaQuery::create()->findPk($this->trab_c_persona, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersona->addTrabajadors($this);
             */
        }

        return $this->aPersona;
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
        if ('Inscripcion' == $relationName) {
            $this->initInscripcions();
            return;
        }
    }

    /**
     * Clears out the collInscripcions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInscripcions()
     */
    public function clearInscripcions()
    {
        $this->collInscripcions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInscripcions collection loaded partially.
     */
    public function resetPartialInscripcions($v = true)
    {
        $this->collInscripcionsPartial = $v;
    }

    /**
     * Initializes the collInscripcions collection.
     *
     * By default this just sets the collInscripcions collection to an empty array (like clearcollInscripcions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInscripcions($overrideExisting = true)
    {
        if (null !== $this->collInscripcions && !$overrideExisting) {
            return;
        }

        $collectionClassName = InscripcionTableMap::getTableMap()->getCollectionClassName();

        $this->collInscripcions = new $collectionClassName;
        $this->collInscripcions->setModel('\Inscripcion');
    }

    /**
     * Gets an array of ChildInscripcion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTrabajador is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInscripcion[] List of ChildInscripcion objects
     * @throws PropelException
     */
    public function getInscripcions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInscripcionsPartial && !$this->isNew();
        if (null === $this->collInscripcions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInscripcions) {
                // return empty collection
                $this->initInscripcions();
            } else {
                $collInscripcions = ChildInscripcionQuery::create(null, $criteria)
                    ->filterByTrabajador($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInscripcionsPartial && count($collInscripcions)) {
                        $this->initInscripcions(false);

                        foreach ($collInscripcions as $obj) {
                            if (false == $this->collInscripcions->contains($obj)) {
                                $this->collInscripcions->append($obj);
                            }
                        }

                        $this->collInscripcionsPartial = true;
                    }

                    return $collInscripcions;
                }

                if ($partial && $this->collInscripcions) {
                    foreach ($this->collInscripcions as $obj) {
                        if ($obj->isNew()) {
                            $collInscripcions[] = $obj;
                        }
                    }
                }

                $this->collInscripcions = $collInscripcions;
                $this->collInscripcionsPartial = false;
            }
        }

        return $this->collInscripcions;
    }

    /**
     * Sets a collection of ChildInscripcion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $inscripcions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTrabajador The current object (for fluent API support)
     */
    public function setInscripcions(Collection $inscripcions, ConnectionInterface $con = null)
    {
        /** @var ChildInscripcion[] $inscripcionsToDelete */
        $inscripcionsToDelete = $this->getInscripcions(new Criteria(), $con)->diff($inscripcions);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->inscripcionsScheduledForDeletion = clone $inscripcionsToDelete;

        foreach ($inscripcionsToDelete as $inscripcionRemoved) {
            $inscripcionRemoved->setTrabajador(null);
        }

        $this->collInscripcions = null;
        foreach ($inscripcions as $inscripcion) {
            $this->addInscripcion($inscripcion);
        }

        $this->collInscripcions = $inscripcions;
        $this->collInscripcionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Inscripcion objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Inscripcion objects.
     * @throws PropelException
     */
    public function countInscripcions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInscripcionsPartial && !$this->isNew();
        if (null === $this->collInscripcions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInscripcions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInscripcions());
            }

            $query = ChildInscripcionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTrabajador($this)
                ->count($con);
        }

        return count($this->collInscripcions);
    }

    /**
     * Method called to associate a ChildInscripcion object to this object
     * through the ChildInscripcion foreign key attribute.
     *
     * @param  ChildInscripcion $l ChildInscripcion
     * @return $this|\Trabajador The current object (for fluent API support)
     */
    public function addInscripcion(ChildInscripcion $l)
    {
        if ($this->collInscripcions === null) {
            $this->initInscripcions();
            $this->collInscripcionsPartial = true;
        }

        if (!$this->collInscripcions->contains($l)) {
            $this->doAddInscripcion($l);

            if ($this->inscripcionsScheduledForDeletion and $this->inscripcionsScheduledForDeletion->contains($l)) {
                $this->inscripcionsScheduledForDeletion->remove($this->inscripcionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInscripcion $inscripcion The ChildInscripcion object to add.
     */
    protected function doAddInscripcion(ChildInscripcion $inscripcion)
    {
        $this->collInscripcions[]= $inscripcion;
        $inscripcion->setTrabajador($this);
    }

    /**
     * @param  ChildInscripcion $inscripcion The ChildInscripcion object to remove.
     * @return $this|ChildTrabajador The current object (for fluent API support)
     */
    public function removeInscripcion(ChildInscripcion $inscripcion)
    {
        if ($this->getInscripcions()->contains($inscripcion)) {
            $pos = $this->collInscripcions->search($inscripcion);
            $this->collInscripcions->remove($pos);
            if (null === $this->inscripcionsScheduledForDeletion) {
                $this->inscripcionsScheduledForDeletion = clone $this->collInscripcions;
                $this->inscripcionsScheduledForDeletion->clear();
            }
            $this->inscripcionsScheduledForDeletion[]= clone $inscripcion;
            $inscripcion->setTrabajador(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Trabajador is new, it will return
     * an empty collection; or if this Trabajador has previously
     * been saved, it will retrieve related Inscripcions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Trabajador.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInscripcion[] List of ChildInscripcion objects
     */
    public function getInscripcionsJoinDictacion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInscripcionQuery::create(null, $criteria);
        $query->joinWith('Dictacion', $joinBehavior);

        return $this->getInscripcions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Trabajador is new, it will return
     * an empty collection; or if this Trabajador has previously
     * been saved, it will retrieve related Inscripcions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Trabajador.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInscripcion[] List of ChildInscripcion objects
     */
    public function getInscripcionsJoinEFinalizacion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInscripcionQuery::create(null, $criteria);
        $query->joinWith('EFinalizacion', $joinBehavior);

        return $this->getInscripcions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Trabajador is new, it will return
     * an empty collection; or if this Trabajador has previously
     * been saved, it will retrieve related Inscripcions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Trabajador.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInscripcion[] List of ChildInscripcion objects
     */
    public function getInscripcionsJoinEInscripcion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInscripcionQuery::create(null, $criteria);
        $query->joinWith('EInscripcion', $joinBehavior);

        return $this->getInscripcions($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aAniosExperienciaCargo) {
            $this->aAniosExperienciaCargo->removeTrabajador($this);
        }
        if (null !== $this->aArea) {
            $this->aArea->removeTrabajador($this);
        }
        if (null !== $this->aCargo) {
            $this->aCargo->removeTrabajador($this);
        }
        if (null !== $this->aGerencia) {
            $this->aGerencia->removeTrabajador($this);
        }
        if (null !== $this->aPersona) {
            $this->aPersona->removeTrabajador($this);
        }
        $this->trab_codigo = null;
        $this->trab_c_persona = null;
        $this->trab_c_cargo = null;
        $this->trab_c_gerencia = null;
        $this->trab_c_area = null;
        $this->trab_c_anios_experiencia_cargo = null;
        $this->trab_fecha_inicio = null;
        $this->trab_fecha_termino = null;
        $this->trab_vigente = null;
        $this->trab_r_fecha_creacion = null;
        $this->trab_r_fecha_modificacion = null;
        $this->trab_r_usuario = null;
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
            if ($this->collInscripcions) {
                foreach ($this->collInscripcions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collInscripcions = null;
        $this->aAniosExperienciaCargo = null;
        $this->aArea = null;
        $this->aCargo = null;
        $this->aGerencia = null;
        $this->aPersona = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TrabajadorTableMap::DEFAULT_STRING_FORMAT);
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
