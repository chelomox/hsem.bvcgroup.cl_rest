<?php

namespace Base;

use \Dictacion as ChildDictacion;
use \DictacionQuery as ChildDictacionQuery;
use \EEvaluacionAplicada as ChildEEvaluacionAplicada;
use \EEvaluacionAplicadaQuery as ChildEEvaluacionAplicadaQuery;
use \Evaluacion as ChildEvaluacion;
use \EvaluacionAplicada as ChildEvaluacionAplicada;
use \EvaluacionAplicadaQuery as ChildEvaluacionAplicadaQuery;
use \EvaluacionQuery as ChildEvaluacionQuery;
use \InscripcionEvaluacionAplicada as ChildInscripcionEvaluacionAplicada;
use \InscripcionEvaluacionAplicadaQuery as ChildInscripcionEvaluacionAplicadaQuery;
use \TEvaluacionAplicada as ChildTEvaluacionAplicada;
use \TEvaluacionAplicadaQuery as ChildTEvaluacionAplicadaQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\EvaluacionAplicadaTableMap;
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
 * Base class that represents a row from the 'evaluacion_aplicada' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class EvaluacionAplicada implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\EvaluacionAplicadaTableMap';


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
     * The value for the evap_c_actividad field.
     *
     * @var        int
     */
    protected $evap_c_actividad;

    /**
     * The value for the evap_numero_dictacion field.
     *
     * @var        int
     */
    protected $evap_numero_dictacion;

    /**
     * The value for the evap_c_evaluacion field.
     *
     * @var        int
     */
    protected $evap_c_evaluacion;

    /**
     * The value for the evap_numero_evaluacion field.
     *
     * @var        int
     */
    protected $evap_numero_evaluacion;

    /**
     * The value for the evap_titulo field.
     *
     * @var        string
     */
    protected $evap_titulo;

    /**
     * The value for the evap_descripcion field.
     *
     * @var        string
     */
    protected $evap_descripcion;

    /**
     * The value for the evap_orden field.
     *
     * @var        int
     */
    protected $evap_orden;

    /**
     * The value for the evap_e_evaluacion_aplicada field.
     *
     * @var        int
     */
    protected $evap_e_evaluacion_aplicada;

    /**
     * The value for the evap_t_evaluacion_aplicada field.
     *
     * @var        int
     */
    protected $evap_t_evaluacion_aplicada;

    /**
     * The value for the evap_vigente field.
     *
     * @var        int
     */
    protected $evap_vigente;

    /**
     * The value for the evap_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $evap_r_fecha_creacion;

    /**
     * The value for the evap_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $evap_r_fecha_modificacion;

    /**
     * The value for the evap_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $evap_r_usuario;

    /**
     * @var        ChildDictacion
     */
    protected $aDictacion;

    /**
     * @var        ChildEEvaluacionAplicada
     */
    protected $aEEvaluacionAplicada;

    /**
     * @var        ChildEvaluacion
     */
    protected $aEvaluacion;

    /**
     * @var        ChildTEvaluacionAplicada
     */
    protected $aTEvaluacionAplicada;

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
        $this->evap_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\EvaluacionAplicada object.
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
     * Compares this with another <code>EvaluacionAplicada</code> instance.  If
     * <code>obj</code> is an instance of <code>EvaluacionAplicada</code>, delegates to
     * <code>equals(EvaluacionAplicada)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|EvaluacionAplicada The current object, for fluid interface
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
     * Get the [evap_c_actividad] column value.
     *
     * @return int
     */
    public function getEvapCActividad()
    {
        return $this->evap_c_actividad;
    }

    /**
     * Get the [evap_numero_dictacion] column value.
     *
     * @return int
     */
    public function getEvapNumeroDictacion()
    {
        return $this->evap_numero_dictacion;
    }

    /**
     * Get the [evap_c_evaluacion] column value.
     *
     * @return int
     */
    public function getEvapCEvaluacion()
    {
        return $this->evap_c_evaluacion;
    }

    /**
     * Get the [evap_numero_evaluacion] column value.
     *
     * @return int
     */
    public function getEvapNumeroEvaluacion()
    {
        return $this->evap_numero_evaluacion;
    }

    /**
     * Get the [evap_titulo] column value.
     *
     * @return string
     */
    public function getEvapTitulo()
    {
        return $this->evap_titulo;
    }

    /**
     * Get the [evap_descripcion] column value.
     *
     * @return string
     */
    public function getEvapDescripcion()
    {
        return $this->evap_descripcion;
    }

    /**
     * Get the [evap_orden] column value.
     *
     * @return int
     */
    public function getEvapOrden()
    {
        return $this->evap_orden;
    }

    /**
     * Get the [evap_e_evaluacion_aplicada] column value.
     *
     * @return int
     */
    public function getEvapEEvaluacionAplicada()
    {
        return $this->evap_e_evaluacion_aplicada;
    }

    /**
     * Get the [evap_t_evaluacion_aplicada] column value.
     *
     * @return int
     */
    public function getEvapTEvaluacionAplicada()
    {
        return $this->evap_t_evaluacion_aplicada;
    }

    /**
     * Get the [evap_vigente] column value.
     *
     * @return int
     */
    public function getEvapVigente()
    {
        return $this->evap_vigente;
    }

    /**
     * Get the [optionally formatted] temporal [evap_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEvapRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->evap_r_fecha_creacion;
        } else {
            return $this->evap_r_fecha_creacion instanceof \DateTimeInterface ? $this->evap_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [evap_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEvapRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->evap_r_fecha_modificacion;
        } else {
            return $this->evap_r_fecha_modificacion instanceof \DateTimeInterface ? $this->evap_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [evap_r_usuario] column value.
     *
     * @return int
     */
    public function getEvapRUsuario()
    {
        return $this->evap_r_usuario;
    }

    /**
     * Set the value of [evap_c_actividad] column.
     *
     * @param int $v new value
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapCActividad($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->evap_c_actividad !== $v) {
            $this->evap_c_actividad = $v;
            $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD] = true;
        }

        if ($this->aDictacion !== null && $this->aDictacion->getDictCActividad() !== $v) {
            $this->aDictacion = null;
        }

        return $this;
    } // setEvapCActividad()

    /**
     * Set the value of [evap_numero_dictacion] column.
     *
     * @param int $v new value
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapNumeroDictacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->evap_numero_dictacion !== $v) {
            $this->evap_numero_dictacion = $v;
            $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION] = true;
        }

        if ($this->aDictacion !== null && $this->aDictacion->getDictNumero() !== $v) {
            $this->aDictacion = null;
        }

        return $this;
    } // setEvapNumeroDictacion()

    /**
     * Set the value of [evap_c_evaluacion] column.
     *
     * @param int $v new value
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapCEvaluacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->evap_c_evaluacion !== $v) {
            $this->evap_c_evaluacion = $v;
            $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION] = true;
        }

        if ($this->aEvaluacion !== null && $this->aEvaluacion->getEvalCodigo() !== $v) {
            $this->aEvaluacion = null;
        }

        return $this;
    } // setEvapCEvaluacion()

    /**
     * Set the value of [evap_numero_evaluacion] column.
     *
     * @param int $v new value
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapNumeroEvaluacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->evap_numero_evaluacion !== $v) {
            $this->evap_numero_evaluacion = $v;
            $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION] = true;
        }

        return $this;
    } // setEvapNumeroEvaluacion()

    /**
     * Set the value of [evap_titulo] column.
     *
     * @param string $v new value
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapTitulo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->evap_titulo !== $v) {
            $this->evap_titulo = $v;
            $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_TITULO] = true;
        }

        return $this;
    } // setEvapTitulo()

    /**
     * Set the value of [evap_descripcion] column.
     *
     * @param string $v new value
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->evap_descripcion !== $v) {
            $this->evap_descripcion = $v;
            $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_DESCRIPCION] = true;
        }

        return $this;
    } // setEvapDescripcion()

    /**
     * Set the value of [evap_orden] column.
     *
     * @param int $v new value
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapOrden($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->evap_orden !== $v) {
            $this->evap_orden = $v;
            $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_ORDEN] = true;
        }

        return $this;
    } // setEvapOrden()

    /**
     * Set the value of [evap_e_evaluacion_aplicada] column.
     *
     * @param int $v new value
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapEEvaluacionAplicada($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->evap_e_evaluacion_aplicada !== $v) {
            $this->evap_e_evaluacion_aplicada = $v;
            $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA] = true;
        }

        if ($this->aEEvaluacionAplicada !== null && $this->aEEvaluacionAplicada->getEevaEstado() !== $v) {
            $this->aEEvaluacionAplicada = null;
        }

        return $this;
    } // setEvapEEvaluacionAplicada()

    /**
     * Set the value of [evap_t_evaluacion_aplicada] column.
     *
     * @param int $v new value
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapTEvaluacionAplicada($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->evap_t_evaluacion_aplicada !== $v) {
            $this->evap_t_evaluacion_aplicada = $v;
            $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA] = true;
        }

        if ($this->aTEvaluacionAplicada !== null && $this->aTEvaluacionAplicada->getTevaTipo() !== $v) {
            $this->aTEvaluacionAplicada = null;
        }

        return $this;
    } // setEvapTEvaluacionAplicada()

    /**
     * Set the value of [evap_vigente] column.
     *
     * @param int $v new value
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapVigente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->evap_vigente !== $v) {
            $this->evap_vigente = $v;
            $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_VIGENTE] = true;
        }

        return $this;
    } // setEvapVigente()

    /**
     * Sets the value of [evap_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->evap_r_fecha_creacion !== null || $dt !== null) {
            if ($this->evap_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->evap_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->evap_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setEvapRFechaCreacion()

    /**
     * Sets the value of [evap_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->evap_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->evap_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->evap_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->evap_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setEvapRFechaModificacion()

    /**
     * Set the value of [evap_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     */
    public function setEvapRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->evap_r_usuario !== $v) {
            $this->evap_r_usuario = $v;
            $this->modifiedColumns[EvaluacionAplicadaTableMap::COL_EVAP_R_USUARIO] = true;
        }

        return $this;
    } // setEvapRUsuario()

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
            if ($this->evap_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapCActividad', TableMap::TYPE_PHPNAME, $indexType)];
            $this->evap_c_actividad = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->evap_numero_dictacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->evap_c_evaluacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->evap_numero_evaluacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapTitulo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->evap_titulo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapDescripcion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->evap_descripcion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapOrden', TableMap::TYPE_PHPNAME, $indexType)];
            $this->evap_orden = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapEEvaluacionAplicada', TableMap::TYPE_PHPNAME, $indexType)];
            $this->evap_e_evaluacion_aplicada = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapTEvaluacionAplicada', TableMap::TYPE_PHPNAME, $indexType)];
            $this->evap_t_evaluacion_aplicada = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapVigente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->evap_vigente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->evap_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->evap_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : EvaluacionAplicadaTableMap::translateFieldName('EvapRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->evap_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 13; // 13 = EvaluacionAplicadaTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\EvaluacionAplicada'), 0, $e);
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
        if ($this->aDictacion !== null && $this->evap_c_actividad !== $this->aDictacion->getDictCActividad()) {
            $this->aDictacion = null;
        }
        if ($this->aDictacion !== null && $this->evap_numero_dictacion !== $this->aDictacion->getDictNumero()) {
            $this->aDictacion = null;
        }
        if ($this->aEvaluacion !== null && $this->evap_c_evaluacion !== $this->aEvaluacion->getEvalCodigo()) {
            $this->aEvaluacion = null;
        }
        if ($this->aEEvaluacionAplicada !== null && $this->evap_e_evaluacion_aplicada !== $this->aEEvaluacionAplicada->getEevaEstado()) {
            $this->aEEvaluacionAplicada = null;
        }
        if ($this->aTEvaluacionAplicada !== null && $this->evap_t_evaluacion_aplicada !== $this->aTEvaluacionAplicada->getTevaTipo()) {
            $this->aTEvaluacionAplicada = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(EvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEvaluacionAplicadaQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDictacion = null;
            $this->aEEvaluacionAplicada = null;
            $this->aEvaluacion = null;
            $this->aTEvaluacionAplicada = null;
            $this->collInscripcionEvaluacionAplicadas = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see EvaluacionAplicada::setDeleted()
     * @see EvaluacionAplicada::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEvaluacionAplicadaQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionAplicadaTableMap::DATABASE_NAME);
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
                EvaluacionAplicadaTableMap::addInstanceToPool($this);
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

            if ($this->aDictacion !== null) {
                if ($this->aDictacion->isModified() || $this->aDictacion->isNew()) {
                    $affectedRows += $this->aDictacion->save($con);
                }
                $this->setDictacion($this->aDictacion);
            }

            if ($this->aEEvaluacionAplicada !== null) {
                if ($this->aEEvaluacionAplicada->isModified() || $this->aEEvaluacionAplicada->isNew()) {
                    $affectedRows += $this->aEEvaluacionAplicada->save($con);
                }
                $this->setEEvaluacionAplicada($this->aEEvaluacionAplicada);
            }

            if ($this->aEvaluacion !== null) {
                if ($this->aEvaluacion->isModified() || $this->aEvaluacion->isNew()) {
                    $affectedRows += $this->aEvaluacion->save($con);
                }
                $this->setEvaluacion($this->aEvaluacion);
            }

            if ($this->aTEvaluacionAplicada !== null) {
                if ($this->aTEvaluacionAplicada->isModified() || $this->aTEvaluacionAplicada->isNew()) {
                    $affectedRows += $this->aTEvaluacionAplicada->save($con);
                }
                $this->setTEvaluacionAplicada($this->aTEvaluacionAplicada);
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

            if ($this->inscripcionEvaluacionAplicadasScheduledForDeletion !== null) {
                if (!$this->inscripcionEvaluacionAplicadasScheduledForDeletion->isEmpty()) {
                    \InscripcionEvaluacionAplicadaQuery::create()
                        ->filterByPrimaryKeys($this->inscripcionEvaluacionAplicadasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD)) {
            $modifiedColumns[':p' . $index++]  = 'evap_c_actividad';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION)) {
            $modifiedColumns[':p' . $index++]  = 'evap_numero_dictacion';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION)) {
            $modifiedColumns[':p' . $index++]  = 'evap_c_evaluacion';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION)) {
            $modifiedColumns[':p' . $index++]  = 'evap_numero_evaluacion';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_TITULO)) {
            $modifiedColumns[':p' . $index++]  = 'evap_titulo';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = 'evap_descripcion';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_ORDEN)) {
            $modifiedColumns[':p' . $index++]  = 'evap_orden';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA)) {
            $modifiedColumns[':p' . $index++]  = 'evap_e_evaluacion_aplicada';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA)) {
            $modifiedColumns[':p' . $index++]  = 'evap_t_evaluacion_aplicada';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_VIGENTE)) {
            $modifiedColumns[':p' . $index++]  = 'evap_vigente';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'evap_r_fecha_creacion';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'evap_r_fecha_modificacion';
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'evap_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO evaluacion_aplicada (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'evap_c_actividad':
                        $stmt->bindValue($identifier, $this->evap_c_actividad, PDO::PARAM_INT);
                        break;
                    case 'evap_numero_dictacion':
                        $stmt->bindValue($identifier, $this->evap_numero_dictacion, PDO::PARAM_INT);
                        break;
                    case 'evap_c_evaluacion':
                        $stmt->bindValue($identifier, $this->evap_c_evaluacion, PDO::PARAM_INT);
                        break;
                    case 'evap_numero_evaluacion':
                        $stmt->bindValue($identifier, $this->evap_numero_evaluacion, PDO::PARAM_INT);
                        break;
                    case 'evap_titulo':
                        $stmt->bindValue($identifier, $this->evap_titulo, PDO::PARAM_STR);
                        break;
                    case 'evap_descripcion':
                        $stmt->bindValue($identifier, $this->evap_descripcion, PDO::PARAM_STR);
                        break;
                    case 'evap_orden':
                        $stmt->bindValue($identifier, $this->evap_orden, PDO::PARAM_INT);
                        break;
                    case 'evap_e_evaluacion_aplicada':
                        $stmt->bindValue($identifier, $this->evap_e_evaluacion_aplicada, PDO::PARAM_INT);
                        break;
                    case 'evap_t_evaluacion_aplicada':
                        $stmt->bindValue($identifier, $this->evap_t_evaluacion_aplicada, PDO::PARAM_INT);
                        break;
                    case 'evap_vigente':
                        $stmt->bindValue($identifier, $this->evap_vigente, PDO::PARAM_INT);
                        break;
                    case 'evap_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->evap_r_fecha_creacion ? $this->evap_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'evap_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->evap_r_fecha_modificacion ? $this->evap_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'evap_r_usuario':
                        $stmt->bindValue($identifier, $this->evap_r_usuario, PDO::PARAM_INT);
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
        $pos = EvaluacionAplicadaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getEvapCActividad();
                break;
            case 1:
                return $this->getEvapNumeroDictacion();
                break;
            case 2:
                return $this->getEvapCEvaluacion();
                break;
            case 3:
                return $this->getEvapNumeroEvaluacion();
                break;
            case 4:
                return $this->getEvapTitulo();
                break;
            case 5:
                return $this->getEvapDescripcion();
                break;
            case 6:
                return $this->getEvapOrden();
                break;
            case 7:
                return $this->getEvapEEvaluacionAplicada();
                break;
            case 8:
                return $this->getEvapTEvaluacionAplicada();
                break;
            case 9:
                return $this->getEvapVigente();
                break;
            case 10:
                return $this->getEvapRFechaCreacion();
                break;
            case 11:
                return $this->getEvapRFechaModificacion();
                break;
            case 12:
                return $this->getEvapRUsuario();
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

        if (isset($alreadyDumpedObjects['EvaluacionAplicada'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EvaluacionAplicada'][$this->hashCode()] = true;
        $keys = EvaluacionAplicadaTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getEvapCActividad(),
            $keys[1] => $this->getEvapNumeroDictacion(),
            $keys[2] => $this->getEvapCEvaluacion(),
            $keys[3] => $this->getEvapNumeroEvaluacion(),
            $keys[4] => $this->getEvapTitulo(),
            $keys[5] => $this->getEvapDescripcion(),
            $keys[6] => $this->getEvapOrden(),
            $keys[7] => $this->getEvapEEvaluacionAplicada(),
            $keys[8] => $this->getEvapTEvaluacionAplicada(),
            $keys[9] => $this->getEvapVigente(),
            $keys[10] => $this->getEvapRFechaCreacion(),
            $keys[11] => $this->getEvapRFechaModificacion(),
            $keys[12] => $this->getEvapRUsuario(),
        );
        if ($result[$keys[10]] instanceof \DateTimeInterface) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
        }

        if ($result[$keys[11]] instanceof \DateTimeInterface) {
            $result[$keys[11]] = $result[$keys[11]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aDictacion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'dictacion';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'dictacion';
                        break;
                    default:
                        $key = 'Dictacion';
                }

                $result[$key] = $this->aDictacion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEEvaluacionAplicada) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'eEvaluacionAplicada';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'e_evaluacion_aplicada';
                        break;
                    default:
                        $key = 'EEvaluacionAplicada';
                }

                $result[$key] = $this->aEEvaluacionAplicada->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEvaluacion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'evaluacion';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'evaluacion';
                        break;
                    default:
                        $key = 'Evaluacion';
                }

                $result[$key] = $this->aEvaluacion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTEvaluacionAplicada) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tEvaluacionAplicada';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_evaluacion_aplicada';
                        break;
                    default:
                        $key = 'TEvaluacionAplicada';
                }

                $result[$key] = $this->aTEvaluacionAplicada->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
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
     * @return $this|\EvaluacionAplicada
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EvaluacionAplicadaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\EvaluacionAplicada
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setEvapCActividad($value);
                break;
            case 1:
                $this->setEvapNumeroDictacion($value);
                break;
            case 2:
                $this->setEvapCEvaluacion($value);
                break;
            case 3:
                $this->setEvapNumeroEvaluacion($value);
                break;
            case 4:
                $this->setEvapTitulo($value);
                break;
            case 5:
                $this->setEvapDescripcion($value);
                break;
            case 6:
                $this->setEvapOrden($value);
                break;
            case 7:
                $this->setEvapEEvaluacionAplicada($value);
                break;
            case 8:
                $this->setEvapTEvaluacionAplicada($value);
                break;
            case 9:
                $this->setEvapVigente($value);
                break;
            case 10:
                $this->setEvapRFechaCreacion($value);
                break;
            case 11:
                $this->setEvapRFechaModificacion($value);
                break;
            case 12:
                $this->setEvapRUsuario($value);
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
        $keys = EvaluacionAplicadaTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setEvapCActividad($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setEvapNumeroDictacion($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setEvapCEvaluacion($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setEvapNumeroEvaluacion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEvapTitulo($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setEvapDescripcion($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEvapOrden($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setEvapEEvaluacionAplicada($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setEvapTEvaluacionAplicada($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setEvapVigente($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setEvapRFechaCreacion($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setEvapRFechaModificacion($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setEvapRUsuario($arr[$keys[12]]);
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
     * @return $this|\EvaluacionAplicada The current object, for fluid interface
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
        $criteria = new Criteria(EvaluacionAplicadaTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD, $this->evap_c_actividad);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION, $this->evap_numero_dictacion);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, $this->evap_c_evaluacion);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION, $this->evap_numero_evaluacion);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_TITULO)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_TITULO, $this->evap_titulo);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_DESCRIPCION)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_DESCRIPCION, $this->evap_descripcion);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_ORDEN)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_ORDEN, $this->evap_orden);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA, $this->evap_e_evaluacion_aplicada);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA, $this->evap_t_evaluacion_aplicada);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_VIGENTE)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_VIGENTE, $this->evap_vigente);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_CREACION)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_CREACION, $this->evap_r_fecha_creacion);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_MODIFICACION)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_MODIFICACION, $this->evap_r_fecha_modificacion);
        }
        if ($this->isColumnModified(EvaluacionAplicadaTableMap::COL_EVAP_R_USUARIO)) {
            $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_R_USUARIO, $this->evap_r_usuario);
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
        $criteria = ChildEvaluacionAplicadaQuery::create();
        $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD, $this->evap_c_actividad);
        $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION, $this->evap_numero_dictacion);
        $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, $this->evap_c_evaluacion);
        $criteria->add(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION, $this->evap_numero_evaluacion);

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
        $validPk = null !== $this->getEvapCActividad() &&
            null !== $this->getEvapNumeroDictacion() &&
            null !== $this->getEvapCEvaluacion() &&
            null !== $this->getEvapNumeroEvaluacion();

        $validPrimaryKeyFKs = 3;
        $primaryKeyFKs = [];

        //relation evaluacion_aplicada_dictacion_fk to table dictacion
        if ($this->aDictacion && $hash = spl_object_hash($this->aDictacion)) {
            $primaryKeyFKs[] = $hash;
        } else {
            $validPrimaryKeyFKs = false;
        }

        //relation evaluacion_aplicada_evaluacion_fk to table evaluacion
        if ($this->aEvaluacion && $hash = spl_object_hash($this->aEvaluacion)) {
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
        $pks[0] = $this->getEvapCActividad();
        $pks[1] = $this->getEvapNumeroDictacion();
        $pks[2] = $this->getEvapCEvaluacion();
        $pks[3] = $this->getEvapNumeroEvaluacion();

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
        $this->setEvapCActividad($keys[0]);
        $this->setEvapNumeroDictacion($keys[1]);
        $this->setEvapCEvaluacion($keys[2]);
        $this->setEvapNumeroEvaluacion($keys[3]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getEvapCActividad()) && (null === $this->getEvapNumeroDictacion()) && (null === $this->getEvapCEvaluacion()) && (null === $this->getEvapNumeroEvaluacion());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \EvaluacionAplicada (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEvapCActividad($this->getEvapCActividad());
        $copyObj->setEvapNumeroDictacion($this->getEvapNumeroDictacion());
        $copyObj->setEvapCEvaluacion($this->getEvapCEvaluacion());
        $copyObj->setEvapNumeroEvaluacion($this->getEvapNumeroEvaluacion());
        $copyObj->setEvapTitulo($this->getEvapTitulo());
        $copyObj->setEvapDescripcion($this->getEvapDescripcion());
        $copyObj->setEvapOrden($this->getEvapOrden());
        $copyObj->setEvapEEvaluacionAplicada($this->getEvapEEvaluacionAplicada());
        $copyObj->setEvapTEvaluacionAplicada($this->getEvapTEvaluacionAplicada());
        $copyObj->setEvapVigente($this->getEvapVigente());
        $copyObj->setEvapRFechaCreacion($this->getEvapRFechaCreacion());
        $copyObj->setEvapRFechaModificacion($this->getEvapRFechaModificacion());
        $copyObj->setEvapRUsuario($this->getEvapRUsuario());

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
     * @return \EvaluacionAplicada Clone of current object.
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
     * Declares an association between this object and a ChildDictacion object.
     *
     * @param  ChildDictacion $v
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDictacion(ChildDictacion $v = null)
    {
        if ($v === null) {
            $this->setEvapCActividad(NULL);
        } else {
            $this->setEvapCActividad($v->getDictCActividad());
        }

        if ($v === null) {
            $this->setEvapNumeroDictacion(NULL);
        } else {
            $this->setEvapNumeroDictacion($v->getDictNumero());
        }

        $this->aDictacion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildDictacion object, it will not be re-added.
        if ($v !== null) {
            $v->addEvaluacionAplicada($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildDictacion object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildDictacion The associated ChildDictacion object.
     * @throws PropelException
     */
    public function getDictacion(ConnectionInterface $con = null)
    {
        if ($this->aDictacion === null && ($this->evap_c_actividad != 0 && $this->evap_numero_dictacion != 0)) {
            $this->aDictacion = ChildDictacionQuery::create()->findPk(array($this->evap_c_actividad, $this->evap_numero_dictacion), $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDictacion->addEvaluacionAplicadas($this);
             */
        }

        return $this->aDictacion;
    }

    /**
     * Declares an association between this object and a ChildEEvaluacionAplicada object.
     *
     * @param  ChildEEvaluacionAplicada $v
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEEvaluacionAplicada(ChildEEvaluacionAplicada $v = null)
    {
        if ($v === null) {
            $this->setEvapEEvaluacionAplicada(NULL);
        } else {
            $this->setEvapEEvaluacionAplicada($v->getEevaEstado());
        }

        $this->aEEvaluacionAplicada = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEEvaluacionAplicada object, it will not be re-added.
        if ($v !== null) {
            $v->addEvaluacionAplicada($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEEvaluacionAplicada object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEEvaluacionAplicada The associated ChildEEvaluacionAplicada object.
     * @throws PropelException
     */
    public function getEEvaluacionAplicada(ConnectionInterface $con = null)
    {
        if ($this->aEEvaluacionAplicada === null && ($this->evap_e_evaluacion_aplicada != 0)) {
            $this->aEEvaluacionAplicada = ChildEEvaluacionAplicadaQuery::create()->findPk($this->evap_e_evaluacion_aplicada, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEEvaluacionAplicada->addEvaluacionAplicadas($this);
             */
        }

        return $this->aEEvaluacionAplicada;
    }

    /**
     * Declares an association between this object and a ChildEvaluacion object.
     *
     * @param  ChildEvaluacion $v
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEvaluacion(ChildEvaluacion $v = null)
    {
        if ($v === null) {
            $this->setEvapCEvaluacion(NULL);
        } else {
            $this->setEvapCEvaluacion($v->getEvalCodigo());
        }

        $this->aEvaluacion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEvaluacion object, it will not be re-added.
        if ($v !== null) {
            $v->addEvaluacionAplicada($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEvaluacion object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEvaluacion The associated ChildEvaluacion object.
     * @throws PropelException
     */
    public function getEvaluacion(ConnectionInterface $con = null)
    {
        if ($this->aEvaluacion === null && ($this->evap_c_evaluacion != 0)) {
            $this->aEvaluacion = ChildEvaluacionQuery::create()->findPk($this->evap_c_evaluacion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEvaluacion->addEvaluacionAplicadas($this);
             */
        }

        return $this->aEvaluacion;
    }

    /**
     * Declares an association between this object and a ChildTEvaluacionAplicada object.
     *
     * @param  ChildTEvaluacionAplicada $v
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTEvaluacionAplicada(ChildTEvaluacionAplicada $v = null)
    {
        if ($v === null) {
            $this->setEvapTEvaluacionAplicada(NULL);
        } else {
            $this->setEvapTEvaluacionAplicada($v->getTevaTipo());
        }

        $this->aTEvaluacionAplicada = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTEvaluacionAplicada object, it will not be re-added.
        if ($v !== null) {
            $v->addEvaluacionAplicada($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTEvaluacionAplicada object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTEvaluacionAplicada The associated ChildTEvaluacionAplicada object.
     * @throws PropelException
     */
    public function getTEvaluacionAplicada(ConnectionInterface $con = null)
    {
        if ($this->aTEvaluacionAplicada === null && ($this->evap_t_evaluacion_aplicada != 0)) {
            $this->aTEvaluacionAplicada = ChildTEvaluacionAplicadaQuery::create()->findPk($this->evap_t_evaluacion_aplicada, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTEvaluacionAplicada->addEvaluacionAplicadas($this);
             */
        }

        return $this->aTEvaluacionAplicada;
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
     * If this ChildEvaluacionAplicada is new, it will return
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
                    ->filterByEvaluacionAplicada($this)
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
     * @return $this|ChildEvaluacionAplicada The current object (for fluent API support)
     */
    public function setInscripcionEvaluacionAplicadas(Collection $inscripcionEvaluacionAplicadas, ConnectionInterface $con = null)
    {
        /** @var ChildInscripcionEvaluacionAplicada[] $inscripcionEvaluacionAplicadasToDelete */
        $inscripcionEvaluacionAplicadasToDelete = $this->getInscripcionEvaluacionAplicadas(new Criteria(), $con)->diff($inscripcionEvaluacionAplicadas);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->inscripcionEvaluacionAplicadasScheduledForDeletion = clone $inscripcionEvaluacionAplicadasToDelete;

        foreach ($inscripcionEvaluacionAplicadasToDelete as $inscripcionEvaluacionAplicadaRemoved) {
            $inscripcionEvaluacionAplicadaRemoved->setEvaluacionAplicada(null);
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
                ->filterByEvaluacionAplicada($this)
                ->count($con);
        }

        return count($this->collInscripcionEvaluacionAplicadas);
    }

    /**
     * Method called to associate a ChildInscripcionEvaluacionAplicada object to this object
     * through the ChildInscripcionEvaluacionAplicada foreign key attribute.
     *
     * @param  ChildInscripcionEvaluacionAplicada $l ChildInscripcionEvaluacionAplicada
     * @return $this|\EvaluacionAplicada The current object (for fluent API support)
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
        $inscripcionEvaluacionAplicada->setEvaluacionAplicada($this);
    }

    /**
     * @param  ChildInscripcionEvaluacionAplicada $inscripcionEvaluacionAplicada The ChildInscripcionEvaluacionAplicada object to remove.
     * @return $this|ChildEvaluacionAplicada The current object (for fluent API support)
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
            $this->inscripcionEvaluacionAplicadasScheduledForDeletion[]= clone $inscripcionEvaluacionAplicada;
            $inscripcionEvaluacionAplicada->setEvaluacionAplicada(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EvaluacionAplicada is new, it will return
     * an empty collection; or if this EvaluacionAplicada has previously
     * been saved, it will retrieve related InscripcionEvaluacionAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EvaluacionAplicada.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInscripcionEvaluacionAplicada[] List of ChildInscripcionEvaluacionAplicada objects
     */
    public function getInscripcionEvaluacionAplicadasJoinEInscripcionEvaluacionAplicada(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInscripcionEvaluacionAplicadaQuery::create(null, $criteria);
        $query->joinWith('EInscripcionEvaluacionAplicada', $joinBehavior);

        return $this->getInscripcionEvaluacionAplicadas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EvaluacionAplicada is new, it will return
     * an empty collection; or if this EvaluacionAplicada has previously
     * been saved, it will retrieve related InscripcionEvaluacionAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EvaluacionAplicada.
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
        if (null !== $this->aDictacion) {
            $this->aDictacion->removeEvaluacionAplicada($this);
        }
        if (null !== $this->aEEvaluacionAplicada) {
            $this->aEEvaluacionAplicada->removeEvaluacionAplicada($this);
        }
        if (null !== $this->aEvaluacion) {
            $this->aEvaluacion->removeEvaluacionAplicada($this);
        }
        if (null !== $this->aTEvaluacionAplicada) {
            $this->aTEvaluacionAplicada->removeEvaluacionAplicada($this);
        }
        $this->evap_c_actividad = null;
        $this->evap_numero_dictacion = null;
        $this->evap_c_evaluacion = null;
        $this->evap_numero_evaluacion = null;
        $this->evap_titulo = null;
        $this->evap_descripcion = null;
        $this->evap_orden = null;
        $this->evap_e_evaluacion_aplicada = null;
        $this->evap_t_evaluacion_aplicada = null;
        $this->evap_vigente = null;
        $this->evap_r_fecha_creacion = null;
        $this->evap_r_fecha_modificacion = null;
        $this->evap_r_usuario = null;
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
        $this->aDictacion = null;
        $this->aEEvaluacionAplicada = null;
        $this->aEvaluacion = null;
        $this->aTEvaluacionAplicada = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EvaluacionAplicadaTableMap::DEFAULT_STRING_FORMAT);
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
