<?php

namespace Base;

use \ERespuestaAplicada as ChildERespuestaAplicada;
use \ERespuestaAplicadaQuery as ChildERespuestaAplicadaQuery;
use \InscripcionEvaluacionAplicada as ChildInscripcionEvaluacionAplicada;
use \InscripcionEvaluacionAplicadaQuery as ChildInscripcionEvaluacionAplicadaQuery;
use \Pregunta as ChildPregunta;
use \PreguntaQuery as ChildPreguntaQuery;
use \RespuestaAplicadaQuery as ChildRespuestaAplicadaQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\RespuestaAplicadaTableMap;
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
 * Base class that represents a row from the 'respuesta_aplicada' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class RespuestaAplicada implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\RespuestaAplicadaTableMap';


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
     * The value for the reap_c_actividad field.
     *
     * @var        int
     */
    protected $reap_c_actividad;

    /**
     * The value for the reap_numero_dictacion field.
     *
     * @var        int
     */
    protected $reap_numero_dictacion;

    /**
     * The value for the reap_c_evaluacion field.
     *
     * @var        int
     */
    protected $reap_c_evaluacion;

    /**
     * The value for the reap_numero_evaluacion field.
     *
     * @var        int
     */
    protected $reap_numero_evaluacion;

    /**
     * The value for the reap_c_trabajador field.
     *
     * @var        int
     */
    protected $reap_c_trabajador;

    /**
     * The value for the reap_c_pregunta field.
     *
     * @var        int
     */
    protected $reap_c_pregunta;

    /**
     * The value for the reap_c_opcion_pregunta field.
     *
     * @var        int
     */
    protected $reap_c_opcion_pregunta;

    /**
     * The value for the reap_e_respuesta_aplicada field.
     *
     * @var        int
     */
    protected $reap_e_respuesta_aplicada;

    /**
     * The value for the reap_vigente field.
     *
     * @var        int
     */
    protected $reap_vigente;

    /**
     * The value for the reap_hash_md5 field.
     *
     * @var        string
     */
    protected $reap_hash_md5;

    /**
     * The value for the reap_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $reap_r_fecha_creacion;

    /**
     * The value for the reap_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $reap_r_fecha_modificacion;

    /**
     * The value for the reap_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $reap_r_usuario;

    /**
     * @var        ChildERespuestaAplicada
     */
    protected $aERespuestaAplicada;

    /**
     * @var        ChildInscripcionEvaluacionAplicada
     */
    protected $aInscripcionEvaluacionAplicada;

    /**
     * @var        ChildPregunta
     */
    protected $aPregunta;

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
        $this->reap_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\RespuestaAplicada object.
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
     * Compares this with another <code>RespuestaAplicada</code> instance.  If
     * <code>obj</code> is an instance of <code>RespuestaAplicada</code>, delegates to
     * <code>equals(RespuestaAplicada)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|RespuestaAplicada The current object, for fluid interface
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
     * Get the [reap_c_actividad] column value.
     *
     * @return int
     */
    public function getReapCActividad()
    {
        return $this->reap_c_actividad;
    }

    /**
     * Get the [reap_numero_dictacion] column value.
     *
     * @return int
     */
    public function getReapNumeroDictacion()
    {
        return $this->reap_numero_dictacion;
    }

    /**
     * Get the [reap_c_evaluacion] column value.
     *
     * @return int
     */
    public function getReapCEvaluacion()
    {
        return $this->reap_c_evaluacion;
    }

    /**
     * Get the [reap_numero_evaluacion] column value.
     *
     * @return int
     */
    public function getReapNumeroEvaluacion()
    {
        return $this->reap_numero_evaluacion;
    }

    /**
     * Get the [reap_c_trabajador] column value.
     *
     * @return int
     */
    public function getReapCTrabajador()
    {
        return $this->reap_c_trabajador;
    }

    /**
     * Get the [reap_c_pregunta] column value.
     *
     * @return int
     */
    public function getReapCPregunta()
    {
        return $this->reap_c_pregunta;
    }

    /**
     * Get the [reap_c_opcion_pregunta] column value.
     *
     * @return int
     */
    public function getReapCOpcionPregunta()
    {
        return $this->reap_c_opcion_pregunta;
    }

    /**
     * Get the [reap_e_respuesta_aplicada] column value.
     *
     * @return int
     */
    public function getReapERespuestaAplicada()
    {
        return $this->reap_e_respuesta_aplicada;
    }

    /**
     * Get the [reap_vigente] column value.
     *
     * @return int
     */
    public function getReapVigente()
    {
        return $this->reap_vigente;
    }

    /**
     * Get the [reap_hash_md5] column value.
     *
     * @return string
     */
    public function getReapHashMd5()
    {
        return $this->reap_hash_md5;
    }

    /**
     * Get the [optionally formatted] temporal [reap_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getReapRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->reap_r_fecha_creacion;
        } else {
            return $this->reap_r_fecha_creacion instanceof \DateTimeInterface ? $this->reap_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [reap_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getReapRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->reap_r_fecha_modificacion;
        } else {
            return $this->reap_r_fecha_modificacion instanceof \DateTimeInterface ? $this->reap_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [reap_r_usuario] column value.
     *
     * @return int
     */
    public function getReapRUsuario()
    {
        return $this->reap_r_usuario;
    }

    /**
     * Set the value of [reap_c_actividad] column.
     *
     * @param int $v new value
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapCActividad($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reap_c_actividad !== $v) {
            $this->reap_c_actividad = $v;
            $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD] = true;
        }

        if ($this->aInscripcionEvaluacionAplicada !== null && $this->aInscripcionEvaluacionAplicada->getInevapCActividad() !== $v) {
            $this->aInscripcionEvaluacionAplicada = null;
        }

        return $this;
    } // setReapCActividad()

    /**
     * Set the value of [reap_numero_dictacion] column.
     *
     * @param int $v new value
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapNumeroDictacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reap_numero_dictacion !== $v) {
            $this->reap_numero_dictacion = $v;
            $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION] = true;
        }

        if ($this->aInscripcionEvaluacionAplicada !== null && $this->aInscripcionEvaluacionAplicada->getInevapNumeroDictacion() !== $v) {
            $this->aInscripcionEvaluacionAplicada = null;
        }

        return $this;
    } // setReapNumeroDictacion()

    /**
     * Set the value of [reap_c_evaluacion] column.
     *
     * @param int $v new value
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapCEvaluacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reap_c_evaluacion !== $v) {
            $this->reap_c_evaluacion = $v;
            $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION] = true;
        }

        if ($this->aInscripcionEvaluacionAplicada !== null && $this->aInscripcionEvaluacionAplicada->getInevapCEvaluacion() !== $v) {
            $this->aInscripcionEvaluacionAplicada = null;
        }

        return $this;
    } // setReapCEvaluacion()

    /**
     * Set the value of [reap_numero_evaluacion] column.
     *
     * @param int $v new value
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapNumeroEvaluacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reap_numero_evaluacion !== $v) {
            $this->reap_numero_evaluacion = $v;
            $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION] = true;
        }

        if ($this->aInscripcionEvaluacionAplicada !== null && $this->aInscripcionEvaluacionAplicada->getInevapNumeroEvaluacion() !== $v) {
            $this->aInscripcionEvaluacionAplicada = null;
        }

        return $this;
    } // setReapNumeroEvaluacion()

    /**
     * Set the value of [reap_c_trabajador] column.
     *
     * @param int $v new value
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapCTrabajador($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reap_c_trabajador !== $v) {
            $this->reap_c_trabajador = $v;
            $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR] = true;
        }

        if ($this->aInscripcionEvaluacionAplicada !== null && $this->aInscripcionEvaluacionAplicada->getInevapCTrabajador() !== $v) {
            $this->aInscripcionEvaluacionAplicada = null;
        }

        return $this;
    } // setReapCTrabajador()

    /**
     * Set the value of [reap_c_pregunta] column.
     *
     * @param int $v new value
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapCPregunta($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reap_c_pregunta !== $v) {
            $this->reap_c_pregunta = $v;
            $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA] = true;
        }

        if ($this->aPregunta !== null && $this->aPregunta->getPregCodigo() !== $v) {
            $this->aPregunta = null;
        }

        return $this;
    } // setReapCPregunta()

    /**
     * Set the value of [reap_c_opcion_pregunta] column.
     *
     * @param int $v new value
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapCOpcionPregunta($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reap_c_opcion_pregunta !== $v) {
            $this->reap_c_opcion_pregunta = $v;
            $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_C_OPCION_PREGUNTA] = true;
        }

        return $this;
    } // setReapCOpcionPregunta()

    /**
     * Set the value of [reap_e_respuesta_aplicada] column.
     *
     * @param int $v new value
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapERespuestaAplicada($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reap_e_respuesta_aplicada !== $v) {
            $this->reap_e_respuesta_aplicada = $v;
            $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA] = true;
        }

        if ($this->aERespuestaAplicada !== null && $this->aERespuestaAplicada->getEreaEstado() !== $v) {
            $this->aERespuestaAplicada = null;
        }

        return $this;
    } // setReapERespuestaAplicada()

    /**
     * Set the value of [reap_vigente] column.
     *
     * @param int $v new value
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapVigente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reap_vigente !== $v) {
            $this->reap_vigente = $v;
            $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_VIGENTE] = true;
        }

        return $this;
    } // setReapVigente()

    /**
     * Set the value of [reap_hash_md5] column.
     *
     * @param string $v new value
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapHashMd5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->reap_hash_md5 !== $v) {
            $this->reap_hash_md5 = $v;
            $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_HASH_MD5] = true;
        }

        return $this;
    } // setReapHashMd5()

    /**
     * Sets the value of [reap_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->reap_r_fecha_creacion !== null || $dt !== null) {
            if ($this->reap_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->reap_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->reap_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setReapRFechaCreacion()

    /**
     * Sets the value of [reap_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->reap_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->reap_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->reap_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->reap_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setReapRFechaModificacion()

    /**
     * Set the value of [reap_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     */
    public function setReapRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reap_r_usuario !== $v) {
            $this->reap_r_usuario = $v;
            $this->modifiedColumns[RespuestaAplicadaTableMap::COL_REAP_R_USUARIO] = true;
        }

        return $this;
    } // setReapRUsuario()

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
            if ($this->reap_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapCActividad', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reap_c_actividad = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reap_numero_dictacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reap_c_evaluacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reap_numero_evaluacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reap_c_trabajador = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapCPregunta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reap_c_pregunta = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapCOpcionPregunta', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reap_c_opcion_pregunta = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapERespuestaAplicada', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reap_e_respuesta_aplicada = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapVigente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reap_vigente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapHashMd5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reap_hash_md5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->reap_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->reap_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : RespuestaAplicadaTableMap::translateFieldName('ReapRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reap_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 13; // 13 = RespuestaAplicadaTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\RespuestaAplicada'), 0, $e);
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
        if ($this->aInscripcionEvaluacionAplicada !== null && $this->reap_c_actividad !== $this->aInscripcionEvaluacionAplicada->getInevapCActividad()) {
            $this->aInscripcionEvaluacionAplicada = null;
        }
        if ($this->aInscripcionEvaluacionAplicada !== null && $this->reap_numero_dictacion !== $this->aInscripcionEvaluacionAplicada->getInevapNumeroDictacion()) {
            $this->aInscripcionEvaluacionAplicada = null;
        }
        if ($this->aInscripcionEvaluacionAplicada !== null && $this->reap_c_evaluacion !== $this->aInscripcionEvaluacionAplicada->getInevapCEvaluacion()) {
            $this->aInscripcionEvaluacionAplicada = null;
        }
        if ($this->aInscripcionEvaluacionAplicada !== null && $this->reap_numero_evaluacion !== $this->aInscripcionEvaluacionAplicada->getInevapNumeroEvaluacion()) {
            $this->aInscripcionEvaluacionAplicada = null;
        }
        if ($this->aInscripcionEvaluacionAplicada !== null && $this->reap_c_trabajador !== $this->aInscripcionEvaluacionAplicada->getInevapCTrabajador()) {
            $this->aInscripcionEvaluacionAplicada = null;
        }
        if ($this->aPregunta !== null && $this->reap_c_pregunta !== $this->aPregunta->getPregCodigo()) {
            $this->aPregunta = null;
        }
        if ($this->aERespuestaAplicada !== null && $this->reap_e_respuesta_aplicada !== $this->aERespuestaAplicada->getEreaEstado()) {
            $this->aERespuestaAplicada = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(RespuestaAplicadaTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildRespuestaAplicadaQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aERespuestaAplicada = null;
            $this->aInscripcionEvaluacionAplicada = null;
            $this->aPregunta = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see RespuestaAplicada::setDeleted()
     * @see RespuestaAplicada::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(RespuestaAplicadaTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildRespuestaAplicadaQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(RespuestaAplicadaTableMap::DATABASE_NAME);
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
                RespuestaAplicadaTableMap::addInstanceToPool($this);
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

            if ($this->aERespuestaAplicada !== null) {
                if ($this->aERespuestaAplicada->isModified() || $this->aERespuestaAplicada->isNew()) {
                    $affectedRows += $this->aERespuestaAplicada->save($con);
                }
                $this->setERespuestaAplicada($this->aERespuestaAplicada);
            }

            if ($this->aInscripcionEvaluacionAplicada !== null) {
                if ($this->aInscripcionEvaluacionAplicada->isModified() || $this->aInscripcionEvaluacionAplicada->isNew()) {
                    $affectedRows += $this->aInscripcionEvaluacionAplicada->save($con);
                }
                $this->setInscripcionEvaluacionAplicada($this->aInscripcionEvaluacionAplicada);
            }

            if ($this->aPregunta !== null) {
                if ($this->aPregunta->isModified() || $this->aPregunta->isNew()) {
                    $affectedRows += $this->aPregunta->save($con);
                }
                $this->setPregunta($this->aPregunta);
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
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD)) {
            $modifiedColumns[':p' . $index++]  = 'reap_c_actividad';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION)) {
            $modifiedColumns[':p' . $index++]  = 'reap_numero_dictacion';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION)) {
            $modifiedColumns[':p' . $index++]  = 'reap_c_evaluacion';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION)) {
            $modifiedColumns[':p' . $index++]  = 'reap_numero_evaluacion';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR)) {
            $modifiedColumns[':p' . $index++]  = 'reap_c_trabajador';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA)) {
            $modifiedColumns[':p' . $index++]  = 'reap_c_pregunta';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_C_OPCION_PREGUNTA)) {
            $modifiedColumns[':p' . $index++]  = 'reap_c_opcion_pregunta';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA)) {
            $modifiedColumns[':p' . $index++]  = 'reap_e_respuesta_aplicada';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_VIGENTE)) {
            $modifiedColumns[':p' . $index++]  = 'reap_vigente';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_HASH_MD5)) {
            $modifiedColumns[':p' . $index++]  = 'reap_hash_md5';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'reap_r_fecha_creacion';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'reap_r_fecha_modificacion';
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'reap_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO respuesta_aplicada (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'reap_c_actividad':
                        $stmt->bindValue($identifier, $this->reap_c_actividad, PDO::PARAM_INT);
                        break;
                    case 'reap_numero_dictacion':
                        $stmt->bindValue($identifier, $this->reap_numero_dictacion, PDO::PARAM_INT);
                        break;
                    case 'reap_c_evaluacion':
                        $stmt->bindValue($identifier, $this->reap_c_evaluacion, PDO::PARAM_INT);
                        break;
                    case 'reap_numero_evaluacion':
                        $stmt->bindValue($identifier, $this->reap_numero_evaluacion, PDO::PARAM_INT);
                        break;
                    case 'reap_c_trabajador':
                        $stmt->bindValue($identifier, $this->reap_c_trabajador, PDO::PARAM_INT);
                        break;
                    case 'reap_c_pregunta':
                        $stmt->bindValue($identifier, $this->reap_c_pregunta, PDO::PARAM_INT);
                        break;
                    case 'reap_c_opcion_pregunta':
                        $stmt->bindValue($identifier, $this->reap_c_opcion_pregunta, PDO::PARAM_INT);
                        break;
                    case 'reap_e_respuesta_aplicada':
                        $stmt->bindValue($identifier, $this->reap_e_respuesta_aplicada, PDO::PARAM_INT);
                        break;
                    case 'reap_vigente':
                        $stmt->bindValue($identifier, $this->reap_vigente, PDO::PARAM_INT);
                        break;
                    case 'reap_hash_md5':
                        $stmt->bindValue($identifier, $this->reap_hash_md5, PDO::PARAM_STR);
                        break;
                    case 'reap_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->reap_r_fecha_creacion ? $this->reap_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'reap_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->reap_r_fecha_modificacion ? $this->reap_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'reap_r_usuario':
                        $stmt->bindValue($identifier, $this->reap_r_usuario, PDO::PARAM_INT);
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
        $pos = RespuestaAplicadaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getReapCActividad();
                break;
            case 1:
                return $this->getReapNumeroDictacion();
                break;
            case 2:
                return $this->getReapCEvaluacion();
                break;
            case 3:
                return $this->getReapNumeroEvaluacion();
                break;
            case 4:
                return $this->getReapCTrabajador();
                break;
            case 5:
                return $this->getReapCPregunta();
                break;
            case 6:
                return $this->getReapCOpcionPregunta();
                break;
            case 7:
                return $this->getReapERespuestaAplicada();
                break;
            case 8:
                return $this->getReapVigente();
                break;
            case 9:
                return $this->getReapHashMd5();
                break;
            case 10:
                return $this->getReapRFechaCreacion();
                break;
            case 11:
                return $this->getReapRFechaModificacion();
                break;
            case 12:
                return $this->getReapRUsuario();
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

        if (isset($alreadyDumpedObjects['RespuestaAplicada'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['RespuestaAplicada'][$this->hashCode()] = true;
        $keys = RespuestaAplicadaTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getReapCActividad(),
            $keys[1] => $this->getReapNumeroDictacion(),
            $keys[2] => $this->getReapCEvaluacion(),
            $keys[3] => $this->getReapNumeroEvaluacion(),
            $keys[4] => $this->getReapCTrabajador(),
            $keys[5] => $this->getReapCPregunta(),
            $keys[6] => $this->getReapCOpcionPregunta(),
            $keys[7] => $this->getReapERespuestaAplicada(),
            $keys[8] => $this->getReapVigente(),
            $keys[9] => $this->getReapHashMd5(),
            $keys[10] => $this->getReapRFechaCreacion(),
            $keys[11] => $this->getReapRFechaModificacion(),
            $keys[12] => $this->getReapRUsuario(),
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
            if (null !== $this->aERespuestaAplicada) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'eRespuestaAplicada';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'e_respuesta_aplicada';
                        break;
                    default:
                        $key = 'ERespuestaAplicada';
                }

                $result[$key] = $this->aERespuestaAplicada->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aInscripcionEvaluacionAplicada) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'inscripcionEvaluacionAplicada';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'inscripcion_evaluacion_aplicada';
                        break;
                    default:
                        $key = 'InscripcionEvaluacionAplicada';
                }

                $result[$key] = $this->aInscripcionEvaluacionAplicada->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPregunta) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'pregunta';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'pregunta';
                        break;
                    default:
                        $key = 'Pregunta';
                }

                $result[$key] = $this->aPregunta->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\RespuestaAplicada
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = RespuestaAplicadaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\RespuestaAplicada
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setReapCActividad($value);
                break;
            case 1:
                $this->setReapNumeroDictacion($value);
                break;
            case 2:
                $this->setReapCEvaluacion($value);
                break;
            case 3:
                $this->setReapNumeroEvaluacion($value);
                break;
            case 4:
                $this->setReapCTrabajador($value);
                break;
            case 5:
                $this->setReapCPregunta($value);
                break;
            case 6:
                $this->setReapCOpcionPregunta($value);
                break;
            case 7:
                $this->setReapERespuestaAplicada($value);
                break;
            case 8:
                $this->setReapVigente($value);
                break;
            case 9:
                $this->setReapHashMd5($value);
                break;
            case 10:
                $this->setReapRFechaCreacion($value);
                break;
            case 11:
                $this->setReapRFechaModificacion($value);
                break;
            case 12:
                $this->setReapRUsuario($value);
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
        $keys = RespuestaAplicadaTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setReapCActividad($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setReapNumeroDictacion($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setReapCEvaluacion($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setReapNumeroEvaluacion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setReapCTrabajador($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setReapCPregunta($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setReapCOpcionPregunta($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setReapERespuestaAplicada($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setReapVigente($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setReapHashMd5($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setReapRFechaCreacion($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setReapRFechaModificacion($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setReapRUsuario($arr[$keys[12]]);
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
     * @return $this|\RespuestaAplicada The current object, for fluid interface
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
        $criteria = new Criteria(RespuestaAplicadaTableMap::DATABASE_NAME);

        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD, $this->reap_c_actividad);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION, $this->reap_numero_dictacion);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION, $this->reap_c_evaluacion);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION, $this->reap_numero_evaluacion);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR, $this->reap_c_trabajador);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA, $this->reap_c_pregunta);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_C_OPCION_PREGUNTA)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_C_OPCION_PREGUNTA, $this->reap_c_opcion_pregunta);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA, $this->reap_e_respuesta_aplicada);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_VIGENTE)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_VIGENTE, $this->reap_vigente);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_HASH_MD5)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_HASH_MD5, $this->reap_hash_md5);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_CREACION)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_CREACION, $this->reap_r_fecha_creacion);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_MODIFICACION)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_MODIFICACION, $this->reap_r_fecha_modificacion);
        }
        if ($this->isColumnModified(RespuestaAplicadaTableMap::COL_REAP_R_USUARIO)) {
            $criteria->add(RespuestaAplicadaTableMap::COL_REAP_R_USUARIO, $this->reap_r_usuario);
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
        $criteria = ChildRespuestaAplicadaQuery::create();
        $criteria->add(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD, $this->reap_c_actividad);
        $criteria->add(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION, $this->reap_numero_dictacion);
        $criteria->add(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION, $this->reap_c_evaluacion);
        $criteria->add(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION, $this->reap_numero_evaluacion);
        $criteria->add(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR, $this->reap_c_trabajador);
        $criteria->add(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA, $this->reap_c_pregunta);

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
        $validPk = null !== $this->getReapCActividad() &&
            null !== $this->getReapNumeroDictacion() &&
            null !== $this->getReapCEvaluacion() &&
            null !== $this->getReapNumeroEvaluacion() &&
            null !== $this->getReapCTrabajador() &&
            null !== $this->getReapCPregunta();

        $validPrimaryKeyFKs = 6;
        $primaryKeyFKs = [];

        //relation respuesta_aplicada_inscripcion_evaluacion_aplicada_fk to table inscripcion_evaluacion_aplicada
        if ($this->aInscripcionEvaluacionAplicada && $hash = spl_object_hash($this->aInscripcionEvaluacionAplicada)) {
            $primaryKeyFKs[] = $hash;
        } else {
            $validPrimaryKeyFKs = false;
        }

        //relation respuesta_aplicada_pregunta to table pregunta
        if ($this->aPregunta && $hash = spl_object_hash($this->aPregunta)) {
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
        $pks[0] = $this->getReapCActividad();
        $pks[1] = $this->getReapNumeroDictacion();
        $pks[2] = $this->getReapCEvaluacion();
        $pks[3] = $this->getReapNumeroEvaluacion();
        $pks[4] = $this->getReapCTrabajador();
        $pks[5] = $this->getReapCPregunta();

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
        $this->setReapCActividad($keys[0]);
        $this->setReapNumeroDictacion($keys[1]);
        $this->setReapCEvaluacion($keys[2]);
        $this->setReapNumeroEvaluacion($keys[3]);
        $this->setReapCTrabajador($keys[4]);
        $this->setReapCPregunta($keys[5]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getReapCActividad()) && (null === $this->getReapNumeroDictacion()) && (null === $this->getReapCEvaluacion()) && (null === $this->getReapNumeroEvaluacion()) && (null === $this->getReapCTrabajador()) && (null === $this->getReapCPregunta());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \RespuestaAplicada (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setReapCActividad($this->getReapCActividad());
        $copyObj->setReapNumeroDictacion($this->getReapNumeroDictacion());
        $copyObj->setReapCEvaluacion($this->getReapCEvaluacion());
        $copyObj->setReapNumeroEvaluacion($this->getReapNumeroEvaluacion());
        $copyObj->setReapCTrabajador($this->getReapCTrabajador());
        $copyObj->setReapCPregunta($this->getReapCPregunta());
        $copyObj->setReapCOpcionPregunta($this->getReapCOpcionPregunta());
        $copyObj->setReapERespuestaAplicada($this->getReapERespuestaAplicada());
        $copyObj->setReapVigente($this->getReapVigente());
        $copyObj->setReapHashMd5($this->getReapHashMd5());
        $copyObj->setReapRFechaCreacion($this->getReapRFechaCreacion());
        $copyObj->setReapRFechaModificacion($this->getReapRFechaModificacion());
        $copyObj->setReapRUsuario($this->getReapRUsuario());
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
     * @return \RespuestaAplicada Clone of current object.
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
     * Declares an association between this object and a ChildERespuestaAplicada object.
     *
     * @param  ChildERespuestaAplicada $v
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     * @throws PropelException
     */
    public function setERespuestaAplicada(ChildERespuestaAplicada $v = null)
    {
        if ($v === null) {
            $this->setReapERespuestaAplicada(NULL);
        } else {
            $this->setReapERespuestaAplicada($v->getEreaEstado());
        }

        $this->aERespuestaAplicada = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildERespuestaAplicada object, it will not be re-added.
        if ($v !== null) {
            $v->addRespuestaAplicada($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildERespuestaAplicada object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildERespuestaAplicada The associated ChildERespuestaAplicada object.
     * @throws PropelException
     */
    public function getERespuestaAplicada(ConnectionInterface $con = null)
    {
        if ($this->aERespuestaAplicada === null && ($this->reap_e_respuesta_aplicada != 0)) {
            $this->aERespuestaAplicada = ChildERespuestaAplicadaQuery::create()->findPk($this->reap_e_respuesta_aplicada, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aERespuestaAplicada->addRespuestaAplicadas($this);
             */
        }

        return $this->aERespuestaAplicada;
    }

    /**
     * Declares an association between this object and a ChildInscripcionEvaluacionAplicada object.
     *
     * @param  ChildInscripcionEvaluacionAplicada $v
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     * @throws PropelException
     */
    public function setInscripcionEvaluacionAplicada(ChildInscripcionEvaluacionAplicada $v = null)
    {
        if ($v === null) {
            $this->setReapCActividad(NULL);
        } else {
            $this->setReapCActividad($v->getInevapCActividad());
        }

        if ($v === null) {
            $this->setReapNumeroDictacion(NULL);
        } else {
            $this->setReapNumeroDictacion($v->getInevapNumeroDictacion());
        }

        if ($v === null) {
            $this->setReapCEvaluacion(NULL);
        } else {
            $this->setReapCEvaluacion($v->getInevapCEvaluacion());
        }

        if ($v === null) {
            $this->setReapNumeroEvaluacion(NULL);
        } else {
            $this->setReapNumeroEvaluacion($v->getInevapNumeroEvaluacion());
        }

        if ($v === null) {
            $this->setReapCTrabajador(NULL);
        } else {
            $this->setReapCTrabajador($v->getInevapCTrabajador());
        }

        $this->aInscripcionEvaluacionAplicada = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildInscripcionEvaluacionAplicada object, it will not be re-added.
        if ($v !== null) {
            $v->addRespuestaAplicada($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildInscripcionEvaluacionAplicada object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildInscripcionEvaluacionAplicada The associated ChildInscripcionEvaluacionAplicada object.
     * @throws PropelException
     */
    public function getInscripcionEvaluacionAplicada(ConnectionInterface $con = null)
    {
        if ($this->aInscripcionEvaluacionAplicada === null && ($this->reap_c_actividad != 0 && $this->reap_numero_dictacion != 0 && $this->reap_c_evaluacion != 0 && $this->reap_numero_evaluacion != 0 && $this->reap_c_trabajador != 0)) {
            $this->aInscripcionEvaluacionAplicada = ChildInscripcionEvaluacionAplicadaQuery::create()->findPk(array($this->reap_c_actividad, $this->reap_numero_dictacion, $this->reap_c_evaluacion, $this->reap_numero_evaluacion, $this->reap_c_trabajador), $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aInscripcionEvaluacionAplicada->addRespuestaAplicadas($this);
             */
        }

        return $this->aInscripcionEvaluacionAplicada;
    }

    /**
     * Declares an association between this object and a ChildPregunta object.
     *
     * @param  ChildPregunta $v
     * @return $this|\RespuestaAplicada The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPregunta(ChildPregunta $v = null)
    {
        if ($v === null) {
            $this->setReapCPregunta(NULL);
        } else {
            $this->setReapCPregunta($v->getPregCodigo());
        }

        $this->aPregunta = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPregunta object, it will not be re-added.
        if ($v !== null) {
            $v->addRespuestaAplicada($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildPregunta object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildPregunta The associated ChildPregunta object.
     * @throws PropelException
     */
    public function getPregunta(ConnectionInterface $con = null)
    {
        if ($this->aPregunta === null && ($this->reap_c_pregunta != 0)) {
            $this->aPregunta = ChildPreguntaQuery::create()->findPk($this->reap_c_pregunta, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPregunta->addRespuestaAplicadas($this);
             */
        }

        return $this->aPregunta;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aERespuestaAplicada) {
            $this->aERespuestaAplicada->removeRespuestaAplicada($this);
        }
        if (null !== $this->aInscripcionEvaluacionAplicada) {
            $this->aInscripcionEvaluacionAplicada->removeRespuestaAplicada($this);
        }
        if (null !== $this->aPregunta) {
            $this->aPregunta->removeRespuestaAplicada($this);
        }
        $this->reap_c_actividad = null;
        $this->reap_numero_dictacion = null;
        $this->reap_c_evaluacion = null;
        $this->reap_numero_evaluacion = null;
        $this->reap_c_trabajador = null;
        $this->reap_c_pregunta = null;
        $this->reap_c_opcion_pregunta = null;
        $this->reap_e_respuesta_aplicada = null;
        $this->reap_vigente = null;
        $this->reap_hash_md5 = null;
        $this->reap_r_fecha_creacion = null;
        $this->reap_r_fecha_modificacion = null;
        $this->reap_r_usuario = null;
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

        $this->aERespuestaAplicada = null;
        $this->aInscripcionEvaluacionAplicada = null;
        $this->aPregunta = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RespuestaAplicadaTableMap::DEFAULT_STRING_FORMAT);
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
