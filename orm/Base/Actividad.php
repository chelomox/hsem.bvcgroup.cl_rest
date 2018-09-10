<?php

namespace Base;

use \Actividad as ChildActividad;
use \ActividadCargo as ChildActividadCargo;
use \ActividadCargoQuery as ChildActividadCargoQuery;
use \ActividadObjetivo as ChildActividadObjetivo;
use \ActividadObjetivoQuery as ChildActividadObjetivoQuery;
use \ActividadQuery as ChildActividadQuery;
use \Dictacion as ChildDictacion;
use \DictacionQuery as ChildDictacionQuery;
use \EActividad as ChildEActividad;
use \EActividadQuery as ChildEActividadQuery;
use \TActividad as ChildTActividad;
use \TActividadQuery as ChildTActividadQuery;
use \THora as ChildTHora;
use \THoraQuery as ChildTHoraQuery;
use \TModalidad as ChildTModalidad;
use \TModalidadQuery as ChildTModalidadQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ActividadCargoTableMap;
use Map\ActividadObjetivoTableMap;
use Map\ActividadTableMap;
use Map\DictacionTableMap;
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
 * Base class that represents a row from the 'actividad' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Actividad implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ActividadTableMap';


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
     * The value for the acti_codigo field.
     *
     * @var        int
     */
    protected $acti_codigo;

    /**
     * The value for the acti_nombre field.
     *
     * @var        string
     */
    protected $acti_nombre;

    /**
     * The value for the acti_imagen field.
     *
     * @var        string
     */
    protected $acti_imagen;

    /**
     * The value for the acti_t_actividad field.
     *
     * @var        int
     */
    protected $acti_t_actividad;

    /**
     * The value for the acti_hora field.
     *
     * @var        int
     */
    protected $acti_hora;

    /**
     * The value for the acti_hora_teorica field.
     *
     * @var        int
     */
    protected $acti_hora_teorica;

    /**
     * The value for the acti_hora_practica field.
     *
     * @var        int
     */
    protected $acti_hora_practica;

    /**
     * The value for the acti_t_hora field.
     *
     * @var        int
     */
    protected $acti_t_hora;

    /**
     * The value for the acti_e_actividad field.
     *
     * @var        int
     */
    protected $acti_e_actividad;

    /**
     * The value for the acti_t_modalidad field.
     *
     * @var        int
     */
    protected $acti_t_modalidad;

    /**
     * The value for the acti_observacion field.
     *
     * @var        string
     */
    protected $acti_observacion;

    /**
     * The value for the acti_vigente field.
     *
     * @var        int
     */
    protected $acti_vigente;

    /**
     * The value for the acti_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $acti_r_fecha_creacion;

    /**
     * The value for the acti_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $acti_r_fecha_modificacion;

    /**
     * The value for the acti_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $acti_r_usuario;

    /**
     * @var        ChildEActividad
     */
    protected $aEActividad;

    /**
     * @var        ChildTActividad
     */
    protected $aTActividad;

    /**
     * @var        ChildTHora
     */
    protected $aTHora;

    /**
     * @var        ChildTModalidad
     */
    protected $aTModalidad;

    /**
     * @var        ObjectCollection|ChildActividadCargo[] Collection to store aggregation of ChildActividadCargo objects.
     */
    protected $collActividadCargos;
    protected $collActividadCargosPartial;

    /**
     * @var        ObjectCollection|ChildActividadObjetivo[] Collection to store aggregation of ChildActividadObjetivo objects.
     */
    protected $collActividadObjetivos;
    protected $collActividadObjetivosPartial;

    /**
     * @var        ObjectCollection|ChildDictacion[] Collection to store aggregation of ChildDictacion objects.
     */
    protected $collDictacions;
    protected $collDictacionsPartial;

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
     * @var ObjectCollection|ChildActividadObjetivo[]
     */
    protected $actividadObjetivosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDictacion[]
     */
    protected $dictacionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->acti_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Actividad object.
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
     * Compares this with another <code>Actividad</code> instance.  If
     * <code>obj</code> is an instance of <code>Actividad</code>, delegates to
     * <code>equals(Actividad)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Actividad The current object, for fluid interface
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
     * Get the [acti_codigo] column value.
     *
     * @return int
     */
    public function getActiCodigo()
    {
        return $this->acti_codigo;
    }

    /**
     * Get the [acti_nombre] column value.
     *
     * @return string
     */
    public function getActiNombre()
    {
        return $this->acti_nombre;
    }

    /**
     * Get the [acti_imagen] column value.
     *
     * @return string
     */
    public function getActiImagen()
    {
        return $this->acti_imagen;
    }

    /**
     * Get the [acti_t_actividad] column value.
     *
     * @return int
     */
    public function getActiTActividad()
    {
        return $this->acti_t_actividad;
    }

    /**
     * Get the [acti_hora] column value.
     *
     * @return int
     */
    public function getActiHora()
    {
        return $this->acti_hora;
    }

    /**
     * Get the [acti_hora_teorica] column value.
     *
     * @return int
     */
    public function getActiHoraTeorica()
    {
        return $this->acti_hora_teorica;
    }

    /**
     * Get the [acti_hora_practica] column value.
     *
     * @return int
     */
    public function getActiHoraPractica()
    {
        return $this->acti_hora_practica;
    }

    /**
     * Get the [acti_t_hora] column value.
     *
     * @return int
     */
    public function getActiTHora()
    {
        return $this->acti_t_hora;
    }

    /**
     * Get the [acti_e_actividad] column value.
     *
     * @return int
     */
    public function getActiEActividad()
    {
        return $this->acti_e_actividad;
    }

    /**
     * Get the [acti_t_modalidad] column value.
     *
     * @return int
     */
    public function getActiTModalidad()
    {
        return $this->acti_t_modalidad;
    }

    /**
     * Get the [acti_observacion] column value.
     *
     * @return string
     */
    public function getActiObservacion()
    {
        return $this->acti_observacion;
    }

    /**
     * Get the [acti_vigente] column value.
     *
     * @return int
     */
    public function getActiVigente()
    {
        return $this->acti_vigente;
    }

    /**
     * Get the [optionally formatted] temporal [acti_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getActiRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->acti_r_fecha_creacion;
        } else {
            return $this->acti_r_fecha_creacion instanceof \DateTimeInterface ? $this->acti_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [acti_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getActiRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->acti_r_fecha_modificacion;
        } else {
            return $this->acti_r_fecha_modificacion instanceof \DateTimeInterface ? $this->acti_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [acti_r_usuario] column value.
     *
     * @return int
     */
    public function getActiRUsuario()
    {
        return $this->acti_r_usuario;
    }

    /**
     * Set the value of [acti_codigo] column.
     *
     * @param int $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiCodigo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acti_codigo !== $v) {
            $this->acti_codigo = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_CODIGO] = true;
        }

        return $this;
    } // setActiCodigo()

    /**
     * Set the value of [acti_nombre] column.
     *
     * @param string $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->acti_nombre !== $v) {
            $this->acti_nombre = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_NOMBRE] = true;
        }

        return $this;
    } // setActiNombre()

    /**
     * Set the value of [acti_imagen] column.
     *
     * @param string $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiImagen($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->acti_imagen !== $v) {
            $this->acti_imagen = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_IMAGEN] = true;
        }

        return $this;
    } // setActiImagen()

    /**
     * Set the value of [acti_t_actividad] column.
     *
     * @param int $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiTActividad($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acti_t_actividad !== $v) {
            $this->acti_t_actividad = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_T_ACTIVIDAD] = true;
        }

        if ($this->aTActividad !== null && $this->aTActividad->getTacTipo() !== $v) {
            $this->aTActividad = null;
        }

        return $this;
    } // setActiTActividad()

    /**
     * Set the value of [acti_hora] column.
     *
     * @param int $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiHora($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acti_hora !== $v) {
            $this->acti_hora = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_HORA] = true;
        }

        return $this;
    } // setActiHora()

    /**
     * Set the value of [acti_hora_teorica] column.
     *
     * @param int $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiHoraTeorica($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acti_hora_teorica !== $v) {
            $this->acti_hora_teorica = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_HORA_TEORICA] = true;
        }

        return $this;
    } // setActiHoraTeorica()

    /**
     * Set the value of [acti_hora_practica] column.
     *
     * @param int $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiHoraPractica($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acti_hora_practica !== $v) {
            $this->acti_hora_practica = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_HORA_PRACTICA] = true;
        }

        return $this;
    } // setActiHoraPractica()

    /**
     * Set the value of [acti_t_hora] column.
     *
     * @param int $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiTHora($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acti_t_hora !== $v) {
            $this->acti_t_hora = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_T_HORA] = true;
        }

        if ($this->aTHora !== null && $this->aTHora->getThoTipo() !== $v) {
            $this->aTHora = null;
        }

        return $this;
    } // setActiTHora()

    /**
     * Set the value of [acti_e_actividad] column.
     *
     * @param int $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiEActividad($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acti_e_actividad !== $v) {
            $this->acti_e_actividad = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_E_ACTIVIDAD] = true;
        }

        if ($this->aEActividad !== null && $this->aEActividad->getEacEstado() !== $v) {
            $this->aEActividad = null;
        }

        return $this;
    } // setActiEActividad()

    /**
     * Set the value of [acti_t_modalidad] column.
     *
     * @param int $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiTModalidad($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acti_t_modalidad !== $v) {
            $this->acti_t_modalidad = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_T_MODALIDAD] = true;
        }

        if ($this->aTModalidad !== null && $this->aTModalidad->getTmoTipo() !== $v) {
            $this->aTModalidad = null;
        }

        return $this;
    } // setActiTModalidad()

    /**
     * Set the value of [acti_observacion] column.
     *
     * @param string $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiObservacion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->acti_observacion !== $v) {
            $this->acti_observacion = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_OBSERVACION] = true;
        }

        return $this;
    } // setActiObservacion()

    /**
     * Set the value of [acti_vigente] column.
     *
     * @param int $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiVigente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acti_vigente !== $v) {
            $this->acti_vigente = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_VIGENTE] = true;
        }

        return $this;
    } // setActiVigente()

    /**
     * Sets the value of [acti_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->acti_r_fecha_creacion !== null || $dt !== null) {
            if ($this->acti_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->acti_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->acti_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ActividadTableMap::COL_ACTI_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setActiRFechaCreacion()

    /**
     * Sets the value of [acti_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->acti_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->acti_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->acti_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->acti_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ActividadTableMap::COL_ACTI_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setActiRFechaModificacion()

    /**
     * Set the value of [acti_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function setActiRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->acti_r_usuario !== $v) {
            $this->acti_r_usuario = $v;
            $this->modifiedColumns[ActividadTableMap::COL_ACTI_R_USUARIO] = true;
        }

        return $this;
    } // setActiRUsuario()

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
            if ($this->acti_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ActividadTableMap::translateFieldName('ActiCodigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_codigo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ActividadTableMap::translateFieldName('ActiNombre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_nombre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ActividadTableMap::translateFieldName('ActiImagen', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_imagen = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ActividadTableMap::translateFieldName('ActiTActividad', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_t_actividad = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ActividadTableMap::translateFieldName('ActiHora', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_hora = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ActividadTableMap::translateFieldName('ActiHoraTeorica', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_hora_teorica = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ActividadTableMap::translateFieldName('ActiHoraPractica', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_hora_practica = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ActividadTableMap::translateFieldName('ActiTHora', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_t_hora = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ActividadTableMap::translateFieldName('ActiEActividad', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_e_actividad = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ActividadTableMap::translateFieldName('ActiTModalidad', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_t_modalidad = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ActividadTableMap::translateFieldName('ActiObservacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_observacion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ActividadTableMap::translateFieldName('ActiVigente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_vigente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ActividadTableMap::translateFieldName('ActiRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->acti_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : ActividadTableMap::translateFieldName('ActiRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->acti_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : ActividadTableMap::translateFieldName('ActiRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->acti_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = ActividadTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Actividad'), 0, $e);
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
        if ($this->aTActividad !== null && $this->acti_t_actividad !== $this->aTActividad->getTacTipo()) {
            $this->aTActividad = null;
        }
        if ($this->aTHora !== null && $this->acti_t_hora !== $this->aTHora->getThoTipo()) {
            $this->aTHora = null;
        }
        if ($this->aEActividad !== null && $this->acti_e_actividad !== $this->aEActividad->getEacEstado()) {
            $this->aEActividad = null;
        }
        if ($this->aTModalidad !== null && $this->acti_t_modalidad !== $this->aTModalidad->getTmoTipo()) {
            $this->aTModalidad = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(ActividadTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildActividadQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEActividad = null;
            $this->aTActividad = null;
            $this->aTHora = null;
            $this->aTModalidad = null;
            $this->collActividadCargos = null;

            $this->collActividadObjetivos = null;

            $this->collDictacions = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Actividad::setDeleted()
     * @see Actividad::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildActividadQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadTableMap::DATABASE_NAME);
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
                ActividadTableMap::addInstanceToPool($this);
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

            if ($this->aEActividad !== null) {
                if ($this->aEActividad->isModified() || $this->aEActividad->isNew()) {
                    $affectedRows += $this->aEActividad->save($con);
                }
                $this->setEActividad($this->aEActividad);
            }

            if ($this->aTActividad !== null) {
                if ($this->aTActividad->isModified() || $this->aTActividad->isNew()) {
                    $affectedRows += $this->aTActividad->save($con);
                }
                $this->setTActividad($this->aTActividad);
            }

            if ($this->aTHora !== null) {
                if ($this->aTHora->isModified() || $this->aTHora->isNew()) {
                    $affectedRows += $this->aTHora->save($con);
                }
                $this->setTHora($this->aTHora);
            }

            if ($this->aTModalidad !== null) {
                if ($this->aTModalidad->isModified() || $this->aTModalidad->isNew()) {
                    $affectedRows += $this->aTModalidad->save($con);
                }
                $this->setTModalidad($this->aTModalidad);
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

            if ($this->dictacionsScheduledForDeletion !== null) {
                if (!$this->dictacionsScheduledForDeletion->isEmpty()) {
                    \DictacionQuery::create()
                        ->filterByPrimaryKeys($this->dictacionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->dictacionsScheduledForDeletion = null;
                }
            }

            if ($this->collDictacions !== null) {
                foreach ($this->collDictacions as $referrerFK) {
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

        $this->modifiedColumns[ActividadTableMap::COL_ACTI_CODIGO] = true;
        if (null !== $this->acti_codigo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ActividadTableMap::COL_ACTI_CODIGO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'acti_codigo';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = 'acti_nombre';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_IMAGEN)) {
            $modifiedColumns[':p' . $index++]  = 'acti_imagen';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_T_ACTIVIDAD)) {
            $modifiedColumns[':p' . $index++]  = 'acti_t_actividad';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_HORA)) {
            $modifiedColumns[':p' . $index++]  = 'acti_hora';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_HORA_TEORICA)) {
            $modifiedColumns[':p' . $index++]  = 'acti_hora_teorica';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_HORA_PRACTICA)) {
            $modifiedColumns[':p' . $index++]  = 'acti_hora_practica';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_T_HORA)) {
            $modifiedColumns[':p' . $index++]  = 'acti_t_hora';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_E_ACTIVIDAD)) {
            $modifiedColumns[':p' . $index++]  = 'acti_e_actividad';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_T_MODALIDAD)) {
            $modifiedColumns[':p' . $index++]  = 'acti_t_modalidad';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_OBSERVACION)) {
            $modifiedColumns[':p' . $index++]  = 'acti_observacion';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_VIGENTE)) {
            $modifiedColumns[':p' . $index++]  = 'acti_vigente';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'acti_r_fecha_creacion';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'acti_r_fecha_modificacion';
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'acti_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO actividad (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'acti_codigo':
                        $stmt->bindValue($identifier, $this->acti_codigo, PDO::PARAM_INT);
                        break;
                    case 'acti_nombre':
                        $stmt->bindValue($identifier, $this->acti_nombre, PDO::PARAM_STR);
                        break;
                    case 'acti_imagen':
                        $stmt->bindValue($identifier, $this->acti_imagen, PDO::PARAM_STR);
                        break;
                    case 'acti_t_actividad':
                        $stmt->bindValue($identifier, $this->acti_t_actividad, PDO::PARAM_INT);
                        break;
                    case 'acti_hora':
                        $stmt->bindValue($identifier, $this->acti_hora, PDO::PARAM_INT);
                        break;
                    case 'acti_hora_teorica':
                        $stmt->bindValue($identifier, $this->acti_hora_teorica, PDO::PARAM_INT);
                        break;
                    case 'acti_hora_practica':
                        $stmt->bindValue($identifier, $this->acti_hora_practica, PDO::PARAM_INT);
                        break;
                    case 'acti_t_hora':
                        $stmt->bindValue($identifier, $this->acti_t_hora, PDO::PARAM_INT);
                        break;
                    case 'acti_e_actividad':
                        $stmt->bindValue($identifier, $this->acti_e_actividad, PDO::PARAM_INT);
                        break;
                    case 'acti_t_modalidad':
                        $stmt->bindValue($identifier, $this->acti_t_modalidad, PDO::PARAM_INT);
                        break;
                    case 'acti_observacion':
                        $stmt->bindValue($identifier, $this->acti_observacion, PDO::PARAM_STR);
                        break;
                    case 'acti_vigente':
                        $stmt->bindValue($identifier, $this->acti_vigente, PDO::PARAM_INT);
                        break;
                    case 'acti_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->acti_r_fecha_creacion ? $this->acti_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'acti_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->acti_r_fecha_modificacion ? $this->acti_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'acti_r_usuario':
                        $stmt->bindValue($identifier, $this->acti_r_usuario, PDO::PARAM_INT);
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
        $this->setActiCodigo($pk);

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
        $pos = ActividadTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getActiCodigo();
                break;
            case 1:
                return $this->getActiNombre();
                break;
            case 2:
                return $this->getActiImagen();
                break;
            case 3:
                return $this->getActiTActividad();
                break;
            case 4:
                return $this->getActiHora();
                break;
            case 5:
                return $this->getActiHoraTeorica();
                break;
            case 6:
                return $this->getActiHoraPractica();
                break;
            case 7:
                return $this->getActiTHora();
                break;
            case 8:
                return $this->getActiEActividad();
                break;
            case 9:
                return $this->getActiTModalidad();
                break;
            case 10:
                return $this->getActiObservacion();
                break;
            case 11:
                return $this->getActiVigente();
                break;
            case 12:
                return $this->getActiRFechaCreacion();
                break;
            case 13:
                return $this->getActiRFechaModificacion();
                break;
            case 14:
                return $this->getActiRUsuario();
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

        if (isset($alreadyDumpedObjects['Actividad'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Actividad'][$this->hashCode()] = true;
        $keys = ActividadTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getActiCodigo(),
            $keys[1] => $this->getActiNombre(),
            $keys[2] => $this->getActiImagen(),
            $keys[3] => $this->getActiTActividad(),
            $keys[4] => $this->getActiHora(),
            $keys[5] => $this->getActiHoraTeorica(),
            $keys[6] => $this->getActiHoraPractica(),
            $keys[7] => $this->getActiTHora(),
            $keys[8] => $this->getActiEActividad(),
            $keys[9] => $this->getActiTModalidad(),
            $keys[10] => $this->getActiObservacion(),
            $keys[11] => $this->getActiVigente(),
            $keys[12] => $this->getActiRFechaCreacion(),
            $keys[13] => $this->getActiRFechaModificacion(),
            $keys[14] => $this->getActiRUsuario(),
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
            if (null !== $this->aEActividad) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'eActividad';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'e_actividad';
                        break;
                    default:
                        $key = 'EActividad';
                }

                $result[$key] = $this->aEActividad->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTActividad) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tActividad';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_actividad';
                        break;
                    default:
                        $key = 'TActividad';
                }

                $result[$key] = $this->aTActividad->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTHora) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tHora';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_hora';
                        break;
                    default:
                        $key = 'THora';
                }

                $result[$key] = $this->aTHora->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTModalidad) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tModalidad';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_modalidad';
                        break;
                    default:
                        $key = 'TModalidad';
                }

                $result[$key] = $this->aTModalidad->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collDictacions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'dictacions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'dictacions';
                        break;
                    default:
                        $key = 'Dictacions';
                }

                $result[$key] = $this->collDictacions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Actividad
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ActividadTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Actividad
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setActiCodigo($value);
                break;
            case 1:
                $this->setActiNombre($value);
                break;
            case 2:
                $this->setActiImagen($value);
                break;
            case 3:
                $this->setActiTActividad($value);
                break;
            case 4:
                $this->setActiHora($value);
                break;
            case 5:
                $this->setActiHoraTeorica($value);
                break;
            case 6:
                $this->setActiHoraPractica($value);
                break;
            case 7:
                $this->setActiTHora($value);
                break;
            case 8:
                $this->setActiEActividad($value);
                break;
            case 9:
                $this->setActiTModalidad($value);
                break;
            case 10:
                $this->setActiObservacion($value);
                break;
            case 11:
                $this->setActiVigente($value);
                break;
            case 12:
                $this->setActiRFechaCreacion($value);
                break;
            case 13:
                $this->setActiRFechaModificacion($value);
                break;
            case 14:
                $this->setActiRUsuario($value);
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
        $keys = ActividadTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setActiCodigo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setActiNombre($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setActiImagen($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setActiTActividad($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setActiHora($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setActiHoraTeorica($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setActiHoraPractica($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setActiTHora($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setActiEActividad($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setActiTModalidad($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setActiObservacion($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setActiVigente($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setActiRFechaCreacion($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setActiRFechaModificacion($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setActiRUsuario($arr[$keys[14]]);
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
     * @return $this|\Actividad The current object, for fluid interface
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
        $criteria = new Criteria(ActividadTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_CODIGO)) {
            $criteria->add(ActividadTableMap::COL_ACTI_CODIGO, $this->acti_codigo);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_NOMBRE)) {
            $criteria->add(ActividadTableMap::COL_ACTI_NOMBRE, $this->acti_nombre);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_IMAGEN)) {
            $criteria->add(ActividadTableMap::COL_ACTI_IMAGEN, $this->acti_imagen);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_T_ACTIVIDAD)) {
            $criteria->add(ActividadTableMap::COL_ACTI_T_ACTIVIDAD, $this->acti_t_actividad);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_HORA)) {
            $criteria->add(ActividadTableMap::COL_ACTI_HORA, $this->acti_hora);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_HORA_TEORICA)) {
            $criteria->add(ActividadTableMap::COL_ACTI_HORA_TEORICA, $this->acti_hora_teorica);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_HORA_PRACTICA)) {
            $criteria->add(ActividadTableMap::COL_ACTI_HORA_PRACTICA, $this->acti_hora_practica);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_T_HORA)) {
            $criteria->add(ActividadTableMap::COL_ACTI_T_HORA, $this->acti_t_hora);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_E_ACTIVIDAD)) {
            $criteria->add(ActividadTableMap::COL_ACTI_E_ACTIVIDAD, $this->acti_e_actividad);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_T_MODALIDAD)) {
            $criteria->add(ActividadTableMap::COL_ACTI_T_MODALIDAD, $this->acti_t_modalidad);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_OBSERVACION)) {
            $criteria->add(ActividadTableMap::COL_ACTI_OBSERVACION, $this->acti_observacion);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_VIGENTE)) {
            $criteria->add(ActividadTableMap::COL_ACTI_VIGENTE, $this->acti_vigente);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_R_FECHA_CREACION)) {
            $criteria->add(ActividadTableMap::COL_ACTI_R_FECHA_CREACION, $this->acti_r_fecha_creacion);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_R_FECHA_MODIFICACION)) {
            $criteria->add(ActividadTableMap::COL_ACTI_R_FECHA_MODIFICACION, $this->acti_r_fecha_modificacion);
        }
        if ($this->isColumnModified(ActividadTableMap::COL_ACTI_R_USUARIO)) {
            $criteria->add(ActividadTableMap::COL_ACTI_R_USUARIO, $this->acti_r_usuario);
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
        $criteria = ChildActividadQuery::create();
        $criteria->add(ActividadTableMap::COL_ACTI_CODIGO, $this->acti_codigo);

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
        $validPk = null !== $this->getActiCodigo();

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
        return $this->getActiCodigo();
    }

    /**
     * Generic method to set the primary key (acti_codigo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setActiCodigo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getActiCodigo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Actividad (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setActiNombre($this->getActiNombre());
        $copyObj->setActiImagen($this->getActiImagen());
        $copyObj->setActiTActividad($this->getActiTActividad());
        $copyObj->setActiHora($this->getActiHora());
        $copyObj->setActiHoraTeorica($this->getActiHoraTeorica());
        $copyObj->setActiHoraPractica($this->getActiHoraPractica());
        $copyObj->setActiTHora($this->getActiTHora());
        $copyObj->setActiEActividad($this->getActiEActividad());
        $copyObj->setActiTModalidad($this->getActiTModalidad());
        $copyObj->setActiObservacion($this->getActiObservacion());
        $copyObj->setActiVigente($this->getActiVigente());
        $copyObj->setActiRFechaCreacion($this->getActiRFechaCreacion());
        $copyObj->setActiRFechaModificacion($this->getActiRFechaModificacion());
        $copyObj->setActiRUsuario($this->getActiRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getActividadCargos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActividadCargo($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActividadObjetivos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActividadObjetivo($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDictacions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDictacion($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setActiCodigo(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Actividad Clone of current object.
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
     * Declares an association between this object and a ChildEActividad object.
     *
     * @param  ChildEActividad $v
     * @return $this|\Actividad The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEActividad(ChildEActividad $v = null)
    {
        if ($v === null) {
            $this->setActiEActividad(NULL);
        } else {
            $this->setActiEActividad($v->getEacEstado());
        }

        $this->aEActividad = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEActividad object, it will not be re-added.
        if ($v !== null) {
            $v->addActividad($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEActividad object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEActividad The associated ChildEActividad object.
     * @throws PropelException
     */
    public function getEActividad(ConnectionInterface $con = null)
    {
        if ($this->aEActividad === null && ($this->acti_e_actividad != 0)) {
            $this->aEActividad = ChildEActividadQuery::create()->findPk($this->acti_e_actividad, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEActividad->addActividads($this);
             */
        }

        return $this->aEActividad;
    }

    /**
     * Declares an association between this object and a ChildTActividad object.
     *
     * @param  ChildTActividad $v
     * @return $this|\Actividad The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTActividad(ChildTActividad $v = null)
    {
        if ($v === null) {
            $this->setActiTActividad(NULL);
        } else {
            $this->setActiTActividad($v->getTacTipo());
        }

        $this->aTActividad = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTActividad object, it will not be re-added.
        if ($v !== null) {
            $v->addActividad($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTActividad object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTActividad The associated ChildTActividad object.
     * @throws PropelException
     */
    public function getTActividad(ConnectionInterface $con = null)
    {
        if ($this->aTActividad === null && ($this->acti_t_actividad != 0)) {
            $this->aTActividad = ChildTActividadQuery::create()->findPk($this->acti_t_actividad, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTActividad->addActividads($this);
             */
        }

        return $this->aTActividad;
    }

    /**
     * Declares an association between this object and a ChildTHora object.
     *
     * @param  ChildTHora $v
     * @return $this|\Actividad The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTHora(ChildTHora $v = null)
    {
        if ($v === null) {
            $this->setActiTHora(NULL);
        } else {
            $this->setActiTHora($v->getThoTipo());
        }

        $this->aTHora = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTHora object, it will not be re-added.
        if ($v !== null) {
            $v->addActividad($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTHora object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTHora The associated ChildTHora object.
     * @throws PropelException
     */
    public function getTHora(ConnectionInterface $con = null)
    {
        if ($this->aTHora === null && ($this->acti_t_hora != 0)) {
            $this->aTHora = ChildTHoraQuery::create()->findPk($this->acti_t_hora, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTHora->addActividads($this);
             */
        }

        return $this->aTHora;
    }

    /**
     * Declares an association between this object and a ChildTModalidad object.
     *
     * @param  ChildTModalidad $v
     * @return $this|\Actividad The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTModalidad(ChildTModalidad $v = null)
    {
        if ($v === null) {
            $this->setActiTModalidad(NULL);
        } else {
            $this->setActiTModalidad($v->getTmoTipo());
        }

        $this->aTModalidad = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTModalidad object, it will not be re-added.
        if ($v !== null) {
            $v->addActividad($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTModalidad object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTModalidad The associated ChildTModalidad object.
     * @throws PropelException
     */
    public function getTModalidad(ConnectionInterface $con = null)
    {
        if ($this->aTModalidad === null && ($this->acti_t_modalidad != 0)) {
            $this->aTModalidad = ChildTModalidadQuery::create()->findPk($this->acti_t_modalidad, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTModalidad->addActividads($this);
             */
        }

        return $this->aTModalidad;
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
        if ('ActividadObjetivo' == $relationName) {
            $this->initActividadObjetivos();
            return;
        }
        if ('Dictacion' == $relationName) {
            $this->initDictacions();
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
     * If this ChildActividad is new, it will return
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
                    ->filterByActividad($this)
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
     * @return $this|ChildActividad The current object (for fluent API support)
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
            $actividadCargoRemoved->setActividad(null);
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
                ->filterByActividad($this)
                ->count($con);
        }

        return count($this->collActividadCargos);
    }

    /**
     * Method called to associate a ChildActividadCargo object to this object
     * through the ChildActividadCargo foreign key attribute.
     *
     * @param  ChildActividadCargo $l ChildActividadCargo
     * @return $this|\Actividad The current object (for fluent API support)
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
        $actividadCargo->setActividad($this);
    }

    /**
     * @param  ChildActividadCargo $actividadCargo The ChildActividadCargo object to remove.
     * @return $this|ChildActividad The current object (for fluent API support)
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
            $actividadCargo->setActividad(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actividad is new, it will return
     * an empty collection; or if this Actividad has previously
     * been saved, it will retrieve related ActividadCargos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actividad.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildActividadCargo[] List of ChildActividadCargo objects
     */
    public function getActividadCargosJoinCargo(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildActividadCargoQuery::create(null, $criteria);
        $query->joinWith('Cargo', $joinBehavior);

        return $this->getActividadCargos($query, $con);
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
     * If this ChildActividad is new, it will return
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
                    ->filterByActividad($this)
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
     * @return $this|ChildActividad The current object (for fluent API support)
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
            $actividadObjetivoRemoved->setActividad(null);
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
                ->filterByActividad($this)
                ->count($con);
        }

        return count($this->collActividadObjetivos);
    }

    /**
     * Method called to associate a ChildActividadObjetivo object to this object
     * through the ChildActividadObjetivo foreign key attribute.
     *
     * @param  ChildActividadObjetivo $l ChildActividadObjetivo
     * @return $this|\Actividad The current object (for fluent API support)
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
        $actividadObjetivo->setActividad($this);
    }

    /**
     * @param  ChildActividadObjetivo $actividadObjetivo The ChildActividadObjetivo object to remove.
     * @return $this|ChildActividad The current object (for fluent API support)
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
            $actividadObjetivo->setActividad(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actividad is new, it will return
     * an empty collection; or if this Actividad has previously
     * been saved, it will retrieve related ActividadObjetivos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actividad.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildActividadObjetivo[] List of ChildActividadObjetivo objects
     */
    public function getActividadObjetivosJoinObjetivo(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildActividadObjetivoQuery::create(null, $criteria);
        $query->joinWith('Objetivo', $joinBehavior);

        return $this->getActividadObjetivos($query, $con);
    }

    /**
     * Clears out the collDictacions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDictacions()
     */
    public function clearDictacions()
    {
        $this->collDictacions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDictacions collection loaded partially.
     */
    public function resetPartialDictacions($v = true)
    {
        $this->collDictacionsPartial = $v;
    }

    /**
     * Initializes the collDictacions collection.
     *
     * By default this just sets the collDictacions collection to an empty array (like clearcollDictacions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDictacions($overrideExisting = true)
    {
        if (null !== $this->collDictacions && !$overrideExisting) {
            return;
        }

        $collectionClassName = DictacionTableMap::getTableMap()->getCollectionClassName();

        $this->collDictacions = new $collectionClassName;
        $this->collDictacions->setModel('\Dictacion');
    }

    /**
     * Gets an array of ChildDictacion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildActividad is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDictacion[] List of ChildDictacion objects
     * @throws PropelException
     */
    public function getDictacions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDictacionsPartial && !$this->isNew();
        if (null === $this->collDictacions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDictacions) {
                // return empty collection
                $this->initDictacions();
            } else {
                $collDictacions = ChildDictacionQuery::create(null, $criteria)
                    ->filterByActividad($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDictacionsPartial && count($collDictacions)) {
                        $this->initDictacions(false);

                        foreach ($collDictacions as $obj) {
                            if (false == $this->collDictacions->contains($obj)) {
                                $this->collDictacions->append($obj);
                            }
                        }

                        $this->collDictacionsPartial = true;
                    }

                    return $collDictacions;
                }

                if ($partial && $this->collDictacions) {
                    foreach ($this->collDictacions as $obj) {
                        if ($obj->isNew()) {
                            $collDictacions[] = $obj;
                        }
                    }
                }

                $this->collDictacions = $collDictacions;
                $this->collDictacionsPartial = false;
            }
        }

        return $this->collDictacions;
    }

    /**
     * Sets a collection of ChildDictacion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $dictacions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildActividad The current object (for fluent API support)
     */
    public function setDictacions(Collection $dictacions, ConnectionInterface $con = null)
    {
        /** @var ChildDictacion[] $dictacionsToDelete */
        $dictacionsToDelete = $this->getDictacions(new Criteria(), $con)->diff($dictacions);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->dictacionsScheduledForDeletion = clone $dictacionsToDelete;

        foreach ($dictacionsToDelete as $dictacionRemoved) {
            $dictacionRemoved->setActividad(null);
        }

        $this->collDictacions = null;
        foreach ($dictacions as $dictacion) {
            $this->addDictacion($dictacion);
        }

        $this->collDictacions = $dictacions;
        $this->collDictacionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Dictacion objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Dictacion objects.
     * @throws PropelException
     */
    public function countDictacions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDictacionsPartial && !$this->isNew();
        if (null === $this->collDictacions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDictacions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDictacions());
            }

            $query = ChildDictacionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByActividad($this)
                ->count($con);
        }

        return count($this->collDictacions);
    }

    /**
     * Method called to associate a ChildDictacion object to this object
     * through the ChildDictacion foreign key attribute.
     *
     * @param  ChildDictacion $l ChildDictacion
     * @return $this|\Actividad The current object (for fluent API support)
     */
    public function addDictacion(ChildDictacion $l)
    {
        if ($this->collDictacions === null) {
            $this->initDictacions();
            $this->collDictacionsPartial = true;
        }

        if (!$this->collDictacions->contains($l)) {
            $this->doAddDictacion($l);

            if ($this->dictacionsScheduledForDeletion and $this->dictacionsScheduledForDeletion->contains($l)) {
                $this->dictacionsScheduledForDeletion->remove($this->dictacionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDictacion $dictacion The ChildDictacion object to add.
     */
    protected function doAddDictacion(ChildDictacion $dictacion)
    {
        $this->collDictacions[]= $dictacion;
        $dictacion->setActividad($this);
    }

    /**
     * @param  ChildDictacion $dictacion The ChildDictacion object to remove.
     * @return $this|ChildActividad The current object (for fluent API support)
     */
    public function removeDictacion(ChildDictacion $dictacion)
    {
        if ($this->getDictacions()->contains($dictacion)) {
            $pos = $this->collDictacions->search($dictacion);
            $this->collDictacions->remove($pos);
            if (null === $this->dictacionsScheduledForDeletion) {
                $this->dictacionsScheduledForDeletion = clone $this->collDictacions;
                $this->dictacionsScheduledForDeletion->clear();
            }
            $this->dictacionsScheduledForDeletion[]= clone $dictacion;
            $dictacion->setActividad(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actividad is new, it will return
     * an empty collection; or if this Actividad has previously
     * been saved, it will retrieve related Dictacions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actividad.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDictacion[] List of ChildDictacion objects
     */
    public function getDictacionsJoinComuna(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDictacionQuery::create(null, $criteria);
        $query->joinWith('Comuna', $joinBehavior);

        return $this->getDictacions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actividad is new, it will return
     * an empty collection; or if this Actividad has previously
     * been saved, it will retrieve related Dictacions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actividad.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDictacion[] List of ChildDictacion objects
     */
    public function getDictacionsJoinEDictacion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDictacionQuery::create(null, $criteria);
        $query->joinWith('EDictacion', $joinBehavior);

        return $this->getDictacions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actividad is new, it will return
     * an empty collection; or if this Actividad has previously
     * been saved, it will retrieve related Dictacions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actividad.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDictacion[] List of ChildDictacion objects
     */
    public function getDictacionsJoinTCalificacion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDictacionQuery::create(null, $criteria);
        $query->joinWith('TCalificacion', $joinBehavior);

        return $this->getDictacions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actividad is new, it will return
     * an empty collection; or if this Actividad has previously
     * been saved, it will retrieve related Dictacions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actividad.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDictacion[] List of ChildDictacion objects
     */
    public function getDictacionsJoinTCertificado(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDictacionQuery::create(null, $criteria);
        $query->joinWith('TCertificado', $joinBehavior);

        return $this->getDictacions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actividad is new, it will return
     * an empty collection; or if this Actividad has previously
     * been saved, it will retrieve related Dictacions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actividad.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDictacion[] List of ChildDictacion objects
     */
    public function getDictacionsJoinTEvaluacion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDictacionQuery::create(null, $criteria);
        $query->joinWith('TEvaluacion', $joinBehavior);

        return $this->getDictacions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Actividad is new, it will return
     * an empty collection; or if this Actividad has previously
     * been saved, it will retrieve related Dictacions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Actividad.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDictacion[] List of ChildDictacion objects
     */
    public function getDictacionsJoinTMoneda(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDictacionQuery::create(null, $criteria);
        $query->joinWith('TMoneda', $joinBehavior);

        return $this->getDictacions($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aEActividad) {
            $this->aEActividad->removeActividad($this);
        }
        if (null !== $this->aTActividad) {
            $this->aTActividad->removeActividad($this);
        }
        if (null !== $this->aTHora) {
            $this->aTHora->removeActividad($this);
        }
        if (null !== $this->aTModalidad) {
            $this->aTModalidad->removeActividad($this);
        }
        $this->acti_codigo = null;
        $this->acti_nombre = null;
        $this->acti_imagen = null;
        $this->acti_t_actividad = null;
        $this->acti_hora = null;
        $this->acti_hora_teorica = null;
        $this->acti_hora_practica = null;
        $this->acti_t_hora = null;
        $this->acti_e_actividad = null;
        $this->acti_t_modalidad = null;
        $this->acti_observacion = null;
        $this->acti_vigente = null;
        $this->acti_r_fecha_creacion = null;
        $this->acti_r_fecha_modificacion = null;
        $this->acti_r_usuario = null;
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
            if ($this->collActividadObjetivos) {
                foreach ($this->collActividadObjetivos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDictacions) {
                foreach ($this->collDictacions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collActividadCargos = null;
        $this->collActividadObjetivos = null;
        $this->collDictacions = null;
        $this->aEActividad = null;
        $this->aTActividad = null;
        $this->aTHora = null;
        $this->aTModalidad = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ActividadTableMap::DEFAULT_STRING_FORMAT);
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
