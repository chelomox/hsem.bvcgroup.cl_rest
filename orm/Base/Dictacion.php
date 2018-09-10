<?php

namespace Base;

use \Actividad as ChildActividad;
use \ActividadQuery as ChildActividadQuery;
use \Comuna as ChildComuna;
use \ComunaQuery as ChildComunaQuery;
use \Dictacion as ChildDictacion;
use \DictacionQuery as ChildDictacionQuery;
use \EDictacion as ChildEDictacion;
use \EDictacionQuery as ChildEDictacionQuery;
use \EvaluacionAplicada as ChildEvaluacionAplicada;
use \EvaluacionAplicadaQuery as ChildEvaluacionAplicadaQuery;
use \Facilitador as ChildFacilitador;
use \FacilitadorQuery as ChildFacilitadorQuery;
use \Inscripcion as ChildInscripcion;
use \InscripcionQuery as ChildInscripcionQuery;
use \TCalificacion as ChildTCalificacion;
use \TCalificacionQuery as ChildTCalificacionQuery;
use \TCertificado as ChildTCertificado;
use \TCertificadoQuery as ChildTCertificadoQuery;
use \TEvaluacion as ChildTEvaluacion;
use \TEvaluacionQuery as ChildTEvaluacionQuery;
use \TMoneda as ChildTMoneda;
use \TMonedaQuery as ChildTMonedaQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\DictacionTableMap;
use Map\EvaluacionAplicadaTableMap;
use Map\FacilitadorTableMap;
use Map\InscripcionTableMap;
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
 * Base class that represents a row from the 'dictacion' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Dictacion implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\DictacionTableMap';


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
     * The value for the dict_c_actividad field.
     *
     * @var        int
     */
    protected $dict_c_actividad;

    /**
     * The value for the dict_numero field.
     *
     * @var        int
     */
    protected $dict_numero;

    /**
     * The value for the dict_fecha_inicio field.
     *
     * @var        string
     */
    protected $dict_fecha_inicio;

    /**
     * The value for the dict_fecha_termino field.
     *
     * @var        string
     */
    protected $dict_fecha_termino;

    /**
     * The value for the dict_e_dictacion field.
     *
     * @var        int
     */
    protected $dict_e_dictacion;

    /**
     * The value for the dict_c_resolucion field.
     *
     * @var        int
     */
    protected $dict_c_resolucion;

    /**
     * The value for the dict_t_certificado field.
     *
     * @var        int
     */
    protected $dict_t_certificado;

    /**
     * The value for the dict_certificado_participacion field.
     *
     * @var        int
     */
    protected $dict_certificado_participacion;

    /**
     * The value for the dict_t_calificacion field.
     *
     * @var        int
     */
    protected $dict_t_calificacion;

    /**
     * The value for the dict_asistencia_minima field.
     *
     * @var        int
     */
    protected $dict_asistencia_minima;

    /**
     * The value for the dict_nota_minima field.
     *
     * @var        int
     */
    protected $dict_nota_minima;

    /**
     * The value for the dict_cobertura field.
     *
     * @var        string
     */
    protected $dict_cobertura;

    /**
     * The value for the dict_valor field.
     *
     * @var        string
     */
    protected $dict_valor;

    /**
     * The value for the dict_t_moneda field.
     *
     * @var        int
     */
    protected $dict_t_moneda;

    /**
     * The value for the dict_c_comuna field.
     *
     * @var        int
     */
    protected $dict_c_comuna;

    /**
     * The value for the dict_direccion field.
     *
     * @var        string
     */
    protected $dict_direccion;

    /**
     * The value for the dict_telefono field.
     *
     * @var        string
     */
    protected $dict_telefono;

    /**
     * The value for the dict_fax field.
     *
     * @var        string
     */
    protected $dict_fax;

    /**
     * The value for the dict_email field.
     *
     * @var        string
     */
    protected $dict_email;

    /**
     * The value for the dict_cupo field.
     *
     * @var        int
     */
    protected $dict_cupo;

    /**
     * The value for the dict_t_evaluacion field.
     *
     * @var        int
     */
    protected $dict_t_evaluacion;

    /**
     * The value for the dict_t_capacitacion field.
     *
     * @var        int
     */
    protected $dict_t_capacitacion;

    /**
     * The value for the dict_observacion field.
     *
     * @var        string
     */
    protected $dict_observacion;

    /**
     * The value for the dict_vigente field.
     *
     * @var        int
     */
    protected $dict_vigente;

    /**
     * The value for the dict_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $dict_r_fecha_creacion;

    /**
     * The value for the dict_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $dict_r_fecha_modificacion;

    /**
     * The value for the dict_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $dict_r_usuario;

    /**
     * @var        ChildActividad
     */
    protected $aActividad;

    /**
     * @var        ChildComuna
     */
    protected $aComuna;

    /**
     * @var        ChildEDictacion
     */
    protected $aEDictacion;

    /**
     * @var        ChildTCalificacion
     */
    protected $aTCalificacion;

    /**
     * @var        ChildTCertificado
     */
    protected $aTCertificado;

    /**
     * @var        ChildTEvaluacion
     */
    protected $aTEvaluacion;

    /**
     * @var        ChildTMoneda
     */
    protected $aTMoneda;

    /**
     * @var        ObjectCollection|ChildEvaluacionAplicada[] Collection to store aggregation of ChildEvaluacionAplicada objects.
     */
    protected $collEvaluacionAplicadas;
    protected $collEvaluacionAplicadasPartial;

    /**
     * @var        ObjectCollection|ChildFacilitador[] Collection to store aggregation of ChildFacilitador objects.
     */
    protected $collFacilitadors;
    protected $collFacilitadorsPartial;

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
     * @var ObjectCollection|ChildEvaluacionAplicada[]
     */
    protected $evaluacionAplicadasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildFacilitador[]
     */
    protected $facilitadorsScheduledForDeletion = null;

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
        $this->dict_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Dictacion object.
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
     * Compares this with another <code>Dictacion</code> instance.  If
     * <code>obj</code> is an instance of <code>Dictacion</code>, delegates to
     * <code>equals(Dictacion)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Dictacion The current object, for fluid interface
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
     * Get the [dict_c_actividad] column value.
     *
     * @return int
     */
    public function getDictCActividad()
    {
        return $this->dict_c_actividad;
    }

    /**
     * Get the [dict_numero] column value.
     *
     * @return int
     */
    public function getDictNumero()
    {
        return $this->dict_numero;
    }

    /**
     * Get the [dict_fecha_inicio] column value.
     *
     * @return string
     */
    public function getDictFechaInicio()
    {
        return $this->dict_fecha_inicio;
    }

    /**
     * Get the [dict_fecha_termino] column value.
     *
     * @return string
     */
    public function getDictFechaTermino()
    {
        return $this->dict_fecha_termino;
    }

    /**
     * Get the [dict_e_dictacion] column value.
     *
     * @return int
     */
    public function getDictEDictacion()
    {
        return $this->dict_e_dictacion;
    }

    /**
     * Get the [dict_c_resolucion] column value.
     *
     * @return int
     */
    public function getDictCResolucion()
    {
        return $this->dict_c_resolucion;
    }

    /**
     * Get the [dict_t_certificado] column value.
     *
     * @return int
     */
    public function getDictTCertificado()
    {
        return $this->dict_t_certificado;
    }

    /**
     * Get the [dict_certificado_participacion] column value.
     *
     * @return int
     */
    public function getDictCertificadoParticipacion()
    {
        return $this->dict_certificado_participacion;
    }

    /**
     * Get the [dict_t_calificacion] column value.
     *
     * @return int
     */
    public function getDictTCalificacion()
    {
        return $this->dict_t_calificacion;
    }

    /**
     * Get the [dict_asistencia_minima] column value.
     *
     * @return int
     */
    public function getDictAsistenciaMinima()
    {
        return $this->dict_asistencia_minima;
    }

    /**
     * Get the [dict_nota_minima] column value.
     *
     * @return int
     */
    public function getDictNotaMinima()
    {
        return $this->dict_nota_minima;
    }

    /**
     * Get the [dict_cobertura] column value.
     *
     * @return string
     */
    public function getDictCobertura()
    {
        return $this->dict_cobertura;
    }

    /**
     * Get the [dict_valor] column value.
     *
     * @return string
     */
    public function getDictValor()
    {
        return $this->dict_valor;
    }

    /**
     * Get the [dict_t_moneda] column value.
     *
     * @return int
     */
    public function getDictTMoneda()
    {
        return $this->dict_t_moneda;
    }

    /**
     * Get the [dict_c_comuna] column value.
     *
     * @return int
     */
    public function getDictCComuna()
    {
        return $this->dict_c_comuna;
    }

    /**
     * Get the [dict_direccion] column value.
     *
     * @return string
     */
    public function getDictDireccion()
    {
        return $this->dict_direccion;
    }

    /**
     * Get the [dict_telefono] column value.
     *
     * @return string
     */
    public function getDictTelefono()
    {
        return $this->dict_telefono;
    }

    /**
     * Get the [dict_fax] column value.
     *
     * @return string
     */
    public function getDictFax()
    {
        return $this->dict_fax;
    }

    /**
     * Get the [dict_email] column value.
     *
     * @return string
     */
    public function getDictEmail()
    {
        return $this->dict_email;
    }

    /**
     * Get the [dict_cupo] column value.
     *
     * @return int
     */
    public function getDictCupo()
    {
        return $this->dict_cupo;
    }

    /**
     * Get the [dict_t_evaluacion] column value.
     *
     * @return int
     */
    public function getDictTEvaluacion()
    {
        return $this->dict_t_evaluacion;
    }

    /**
     * Get the [dict_t_capacitacion] column value.
     *
     * @return int
     */
    public function getDictTCapacitacion()
    {
        return $this->dict_t_capacitacion;
    }

    /**
     * Get the [dict_observacion] column value.
     *
     * @return string
     */
    public function getDictObservacion()
    {
        return $this->dict_observacion;
    }

    /**
     * Get the [dict_vigente] column value.
     *
     * @return int
     */
    public function getDictVigente()
    {
        return $this->dict_vigente;
    }

    /**
     * Get the [optionally formatted] temporal [dict_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDictRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->dict_r_fecha_creacion;
        } else {
            return $this->dict_r_fecha_creacion instanceof \DateTimeInterface ? $this->dict_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [dict_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDictRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->dict_r_fecha_modificacion;
        } else {
            return $this->dict_r_fecha_modificacion instanceof \DateTimeInterface ? $this->dict_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [dict_r_usuario] column value.
     *
     * @return int
     */
    public function getDictRUsuario()
    {
        return $this->dict_r_usuario;
    }

    /**
     * Set the value of [dict_c_actividad] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictCActividad($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_c_actividad !== $v) {
            $this->dict_c_actividad = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_C_ACTIVIDAD] = true;
        }

        if ($this->aActividad !== null && $this->aActividad->getActiCodigo() !== $v) {
            $this->aActividad = null;
        }

        return $this;
    } // setDictCActividad()

    /**
     * Set the value of [dict_numero] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictNumero($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_numero !== $v) {
            $this->dict_numero = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_NUMERO] = true;
        }

        return $this;
    } // setDictNumero()

    /**
     * Set the value of [dict_fecha_inicio] column.
     *
     * @param string $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictFechaInicio($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dict_fecha_inicio !== $v) {
            $this->dict_fecha_inicio = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_FECHA_INICIO] = true;
        }

        return $this;
    } // setDictFechaInicio()

    /**
     * Set the value of [dict_fecha_termino] column.
     *
     * @param string $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictFechaTermino($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dict_fecha_termino !== $v) {
            $this->dict_fecha_termino = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_FECHA_TERMINO] = true;
        }

        return $this;
    } // setDictFechaTermino()

    /**
     * Set the value of [dict_e_dictacion] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictEDictacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_e_dictacion !== $v) {
            $this->dict_e_dictacion = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_E_DICTACION] = true;
        }

        if ($this->aEDictacion !== null && $this->aEDictacion->getEdiEstado() !== $v) {
            $this->aEDictacion = null;
        }

        return $this;
    } // setDictEDictacion()

    /**
     * Set the value of [dict_c_resolucion] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictCResolucion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_c_resolucion !== $v) {
            $this->dict_c_resolucion = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_C_RESOLUCION] = true;
        }

        return $this;
    } // setDictCResolucion()

    /**
     * Set the value of [dict_t_certificado] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictTCertificado($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_t_certificado !== $v) {
            $this->dict_t_certificado = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_T_CERTIFICADO] = true;
        }

        if ($this->aTCertificado !== null && $this->aTCertificado->getTceTipo() !== $v) {
            $this->aTCertificado = null;
        }

        return $this;
    } // setDictTCertificado()

    /**
     * Set the value of [dict_certificado_participacion] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictCertificadoParticipacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_certificado_participacion !== $v) {
            $this->dict_certificado_participacion = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_CERTIFICADO_PARTICIPACION] = true;
        }

        return $this;
    } // setDictCertificadoParticipacion()

    /**
     * Set the value of [dict_t_calificacion] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictTCalificacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_t_calificacion !== $v) {
            $this->dict_t_calificacion = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_T_CALIFICACION] = true;
        }

        if ($this->aTCalificacion !== null && $this->aTCalificacion->getTcalTipo() !== $v) {
            $this->aTCalificacion = null;
        }

        return $this;
    } // setDictTCalificacion()

    /**
     * Set the value of [dict_asistencia_minima] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictAsistenciaMinima($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_asistencia_minima !== $v) {
            $this->dict_asistencia_minima = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_ASISTENCIA_MINIMA] = true;
        }

        return $this;
    } // setDictAsistenciaMinima()

    /**
     * Set the value of [dict_nota_minima] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictNotaMinima($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_nota_minima !== $v) {
            $this->dict_nota_minima = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_NOTA_MINIMA] = true;
        }

        return $this;
    } // setDictNotaMinima()

    /**
     * Set the value of [dict_cobertura] column.
     *
     * @param string $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictCobertura($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dict_cobertura !== $v) {
            $this->dict_cobertura = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_COBERTURA] = true;
        }

        return $this;
    } // setDictCobertura()

    /**
     * Set the value of [dict_valor] column.
     *
     * @param string $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictValor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dict_valor !== $v) {
            $this->dict_valor = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_VALOR] = true;
        }

        return $this;
    } // setDictValor()

    /**
     * Set the value of [dict_t_moneda] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictTMoneda($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_t_moneda !== $v) {
            $this->dict_t_moneda = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_T_MONEDA] = true;
        }

        if ($this->aTMoneda !== null && $this->aTMoneda->getTmonTipo() !== $v) {
            $this->aTMoneda = null;
        }

        return $this;
    } // setDictTMoneda()

    /**
     * Set the value of [dict_c_comuna] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictCComuna($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_c_comuna !== $v) {
            $this->dict_c_comuna = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_C_COMUNA] = true;
        }

        if ($this->aComuna !== null && $this->aComuna->getComuCodigo() !== $v) {
            $this->aComuna = null;
        }

        return $this;
    } // setDictCComuna()

    /**
     * Set the value of [dict_direccion] column.
     *
     * @param string $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictDireccion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dict_direccion !== $v) {
            $this->dict_direccion = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_DIRECCION] = true;
        }

        return $this;
    } // setDictDireccion()

    /**
     * Set the value of [dict_telefono] column.
     *
     * @param string $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictTelefono($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dict_telefono !== $v) {
            $this->dict_telefono = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_TELEFONO] = true;
        }

        return $this;
    } // setDictTelefono()

    /**
     * Set the value of [dict_fax] column.
     *
     * @param string $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictFax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dict_fax !== $v) {
            $this->dict_fax = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_FAX] = true;
        }

        return $this;
    } // setDictFax()

    /**
     * Set the value of [dict_email] column.
     *
     * @param string $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dict_email !== $v) {
            $this->dict_email = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_EMAIL] = true;
        }

        return $this;
    } // setDictEmail()

    /**
     * Set the value of [dict_cupo] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictCupo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_cupo !== $v) {
            $this->dict_cupo = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_CUPO] = true;
        }

        return $this;
    } // setDictCupo()

    /**
     * Set the value of [dict_t_evaluacion] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictTEvaluacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_t_evaluacion !== $v) {
            $this->dict_t_evaluacion = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_T_EVALUACION] = true;
        }

        if ($this->aTEvaluacion !== null && $this->aTEvaluacion->getTevTipo() !== $v) {
            $this->aTEvaluacion = null;
        }

        return $this;
    } // setDictTEvaluacion()

    /**
     * Set the value of [dict_t_capacitacion] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictTCapacitacion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_t_capacitacion !== $v) {
            $this->dict_t_capacitacion = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_T_CAPACITACION] = true;
        }

        return $this;
    } // setDictTCapacitacion()

    /**
     * Set the value of [dict_observacion] column.
     *
     * @param string $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictObservacion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dict_observacion !== $v) {
            $this->dict_observacion = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_OBSERVACION] = true;
        }

        return $this;
    } // setDictObservacion()

    /**
     * Set the value of [dict_vigente] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictVigente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_vigente !== $v) {
            $this->dict_vigente = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_VIGENTE] = true;
        }

        return $this;
    } // setDictVigente()

    /**
     * Sets the value of [dict_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dict_r_fecha_creacion !== null || $dt !== null) {
            if ($this->dict_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->dict_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->dict_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[DictacionTableMap::COL_DICT_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setDictRFechaCreacion()

    /**
     * Sets the value of [dict_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dict_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->dict_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->dict_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->dict_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[DictacionTableMap::COL_DICT_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setDictRFechaModificacion()

    /**
     * Set the value of [dict_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function setDictRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dict_r_usuario !== $v) {
            $this->dict_r_usuario = $v;
            $this->modifiedColumns[DictacionTableMap::COL_DICT_R_USUARIO] = true;
        }

        return $this;
    } // setDictRUsuario()

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
            if ($this->dict_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : DictacionTableMap::translateFieldName('DictCActividad', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_c_actividad = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : DictacionTableMap::translateFieldName('DictNumero', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_numero = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : DictacionTableMap::translateFieldName('DictFechaInicio', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_fecha_inicio = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : DictacionTableMap::translateFieldName('DictFechaTermino', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_fecha_termino = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : DictacionTableMap::translateFieldName('DictEDictacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_e_dictacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : DictacionTableMap::translateFieldName('DictCResolucion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_c_resolucion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : DictacionTableMap::translateFieldName('DictTCertificado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_t_certificado = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : DictacionTableMap::translateFieldName('DictCertificadoParticipacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_certificado_participacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : DictacionTableMap::translateFieldName('DictTCalificacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_t_calificacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : DictacionTableMap::translateFieldName('DictAsistenciaMinima', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_asistencia_minima = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : DictacionTableMap::translateFieldName('DictNotaMinima', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_nota_minima = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : DictacionTableMap::translateFieldName('DictCobertura', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_cobertura = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : DictacionTableMap::translateFieldName('DictValor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_valor = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : DictacionTableMap::translateFieldName('DictTMoneda', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_t_moneda = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : DictacionTableMap::translateFieldName('DictCComuna', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_c_comuna = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : DictacionTableMap::translateFieldName('DictDireccion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_direccion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : DictacionTableMap::translateFieldName('DictTelefono', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_telefono = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : DictacionTableMap::translateFieldName('DictFax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_fax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : DictacionTableMap::translateFieldName('DictEmail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : DictacionTableMap::translateFieldName('DictCupo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_cupo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : DictacionTableMap::translateFieldName('DictTEvaluacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_t_evaluacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : DictacionTableMap::translateFieldName('DictTCapacitacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_t_capacitacion = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : DictacionTableMap::translateFieldName('DictObservacion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_observacion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : DictacionTableMap::translateFieldName('DictVigente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_vigente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : DictacionTableMap::translateFieldName('DictRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->dict_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : DictacionTableMap::translateFieldName('DictRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->dict_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : DictacionTableMap::translateFieldName('DictRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dict_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 27; // 27 = DictacionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Dictacion'), 0, $e);
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
        if ($this->aActividad !== null && $this->dict_c_actividad !== $this->aActividad->getActiCodigo()) {
            $this->aActividad = null;
        }
        if ($this->aEDictacion !== null && $this->dict_e_dictacion !== $this->aEDictacion->getEdiEstado()) {
            $this->aEDictacion = null;
        }
        if ($this->aTCertificado !== null && $this->dict_t_certificado !== $this->aTCertificado->getTceTipo()) {
            $this->aTCertificado = null;
        }
        if ($this->aTCalificacion !== null && $this->dict_t_calificacion !== $this->aTCalificacion->getTcalTipo()) {
            $this->aTCalificacion = null;
        }
        if ($this->aTMoneda !== null && $this->dict_t_moneda !== $this->aTMoneda->getTmonTipo()) {
            $this->aTMoneda = null;
        }
        if ($this->aComuna !== null && $this->dict_c_comuna !== $this->aComuna->getComuCodigo()) {
            $this->aComuna = null;
        }
        if ($this->aTEvaluacion !== null && $this->dict_t_evaluacion !== $this->aTEvaluacion->getTevTipo()) {
            $this->aTEvaluacion = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(DictacionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildDictacionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aActividad = null;
            $this->aComuna = null;
            $this->aEDictacion = null;
            $this->aTCalificacion = null;
            $this->aTCertificado = null;
            $this->aTEvaluacion = null;
            $this->aTMoneda = null;
            $this->collEvaluacionAplicadas = null;

            $this->collFacilitadors = null;

            $this->collInscripcions = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Dictacion::setDeleted()
     * @see Dictacion::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(DictacionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildDictacionQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(DictacionTableMap::DATABASE_NAME);
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
                DictacionTableMap::addInstanceToPool($this);
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

            if ($this->aComuna !== null) {
                if ($this->aComuna->isModified() || $this->aComuna->isNew()) {
                    $affectedRows += $this->aComuna->save($con);
                }
                $this->setComuna($this->aComuna);
            }

            if ($this->aEDictacion !== null) {
                if ($this->aEDictacion->isModified() || $this->aEDictacion->isNew()) {
                    $affectedRows += $this->aEDictacion->save($con);
                }
                $this->setEDictacion($this->aEDictacion);
            }

            if ($this->aTCalificacion !== null) {
                if ($this->aTCalificacion->isModified() || $this->aTCalificacion->isNew()) {
                    $affectedRows += $this->aTCalificacion->save($con);
                }
                $this->setTCalificacion($this->aTCalificacion);
            }

            if ($this->aTCertificado !== null) {
                if ($this->aTCertificado->isModified() || $this->aTCertificado->isNew()) {
                    $affectedRows += $this->aTCertificado->save($con);
                }
                $this->setTCertificado($this->aTCertificado);
            }

            if ($this->aTEvaluacion !== null) {
                if ($this->aTEvaluacion->isModified() || $this->aTEvaluacion->isNew()) {
                    $affectedRows += $this->aTEvaluacion->save($con);
                }
                $this->setTEvaluacion($this->aTEvaluacion);
            }

            if ($this->aTMoneda !== null) {
                if ($this->aTMoneda->isModified() || $this->aTMoneda->isNew()) {
                    $affectedRows += $this->aTMoneda->save($con);
                }
                $this->setTMoneda($this->aTMoneda);
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

            if ($this->evaluacionAplicadasScheduledForDeletion !== null) {
                if (!$this->evaluacionAplicadasScheduledForDeletion->isEmpty()) {
                    \EvaluacionAplicadaQuery::create()
                        ->filterByPrimaryKeys($this->evaluacionAplicadasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->evaluacionAplicadasScheduledForDeletion = null;
                }
            }

            if ($this->collEvaluacionAplicadas !== null) {
                foreach ($this->collEvaluacionAplicadas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->facilitadorsScheduledForDeletion !== null) {
                if (!$this->facilitadorsScheduledForDeletion->isEmpty()) {
                    \FacilitadorQuery::create()
                        ->filterByPrimaryKeys($this->facilitadorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->facilitadorsScheduledForDeletion = null;
                }
            }

            if ($this->collFacilitadors !== null) {
                foreach ($this->collFacilitadors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_C_ACTIVIDAD)) {
            $modifiedColumns[':p' . $index++]  = 'dict_c_actividad';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_NUMERO)) {
            $modifiedColumns[':p' . $index++]  = 'dict_numero';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_FECHA_INICIO)) {
            $modifiedColumns[':p' . $index++]  = 'dict_fecha_inicio';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_FECHA_TERMINO)) {
            $modifiedColumns[':p' . $index++]  = 'dict_fecha_termino';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_E_DICTACION)) {
            $modifiedColumns[':p' . $index++]  = 'dict_e_dictacion';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_C_RESOLUCION)) {
            $modifiedColumns[':p' . $index++]  = 'dict_c_resolucion';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_T_CERTIFICADO)) {
            $modifiedColumns[':p' . $index++]  = 'dict_t_certificado';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_CERTIFICADO_PARTICIPACION)) {
            $modifiedColumns[':p' . $index++]  = 'dict_certificado_participacion';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_T_CALIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'dict_t_calificacion';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_ASISTENCIA_MINIMA)) {
            $modifiedColumns[':p' . $index++]  = 'dict_asistencia_minima';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_NOTA_MINIMA)) {
            $modifiedColumns[':p' . $index++]  = 'dict_nota_minima';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_COBERTURA)) {
            $modifiedColumns[':p' . $index++]  = 'dict_cobertura';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_VALOR)) {
            $modifiedColumns[':p' . $index++]  = 'dict_valor';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_T_MONEDA)) {
            $modifiedColumns[':p' . $index++]  = 'dict_t_moneda';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_C_COMUNA)) {
            $modifiedColumns[':p' . $index++]  = 'dict_c_comuna';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_DIRECCION)) {
            $modifiedColumns[':p' . $index++]  = 'dict_direccion';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_TELEFONO)) {
            $modifiedColumns[':p' . $index++]  = 'dict_telefono';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_FAX)) {
            $modifiedColumns[':p' . $index++]  = 'dict_fax';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'dict_email';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_CUPO)) {
            $modifiedColumns[':p' . $index++]  = 'dict_cupo';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_T_EVALUACION)) {
            $modifiedColumns[':p' . $index++]  = 'dict_t_evaluacion';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_T_CAPACITACION)) {
            $modifiedColumns[':p' . $index++]  = 'dict_t_capacitacion';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_OBSERVACION)) {
            $modifiedColumns[':p' . $index++]  = 'dict_observacion';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_VIGENTE)) {
            $modifiedColumns[':p' . $index++]  = 'dict_vigente';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'dict_r_fecha_creacion';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'dict_r_fecha_modificacion';
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'dict_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO dictacion (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'dict_c_actividad':
                        $stmt->bindValue($identifier, $this->dict_c_actividad, PDO::PARAM_INT);
                        break;
                    case 'dict_numero':
                        $stmt->bindValue($identifier, $this->dict_numero, PDO::PARAM_INT);
                        break;
                    case 'dict_fecha_inicio':
                        $stmt->bindValue($identifier, $this->dict_fecha_inicio, PDO::PARAM_STR);
                        break;
                    case 'dict_fecha_termino':
                        $stmt->bindValue($identifier, $this->dict_fecha_termino, PDO::PARAM_STR);
                        break;
                    case 'dict_e_dictacion':
                        $stmt->bindValue($identifier, $this->dict_e_dictacion, PDO::PARAM_INT);
                        break;
                    case 'dict_c_resolucion':
                        $stmt->bindValue($identifier, $this->dict_c_resolucion, PDO::PARAM_INT);
                        break;
                    case 'dict_t_certificado':
                        $stmt->bindValue($identifier, $this->dict_t_certificado, PDO::PARAM_INT);
                        break;
                    case 'dict_certificado_participacion':
                        $stmt->bindValue($identifier, $this->dict_certificado_participacion, PDO::PARAM_INT);
                        break;
                    case 'dict_t_calificacion':
                        $stmt->bindValue($identifier, $this->dict_t_calificacion, PDO::PARAM_INT);
                        break;
                    case 'dict_asistencia_minima':
                        $stmt->bindValue($identifier, $this->dict_asistencia_minima, PDO::PARAM_INT);
                        break;
                    case 'dict_nota_minima':
                        $stmt->bindValue($identifier, $this->dict_nota_minima, PDO::PARAM_INT);
                        break;
                    case 'dict_cobertura':
                        $stmt->bindValue($identifier, $this->dict_cobertura, PDO::PARAM_STR);
                        break;
                    case 'dict_valor':
                        $stmt->bindValue($identifier, $this->dict_valor, PDO::PARAM_STR);
                        break;
                    case 'dict_t_moneda':
                        $stmt->bindValue($identifier, $this->dict_t_moneda, PDO::PARAM_INT);
                        break;
                    case 'dict_c_comuna':
                        $stmt->bindValue($identifier, $this->dict_c_comuna, PDO::PARAM_INT);
                        break;
                    case 'dict_direccion':
                        $stmt->bindValue($identifier, $this->dict_direccion, PDO::PARAM_STR);
                        break;
                    case 'dict_telefono':
                        $stmt->bindValue($identifier, $this->dict_telefono, PDO::PARAM_STR);
                        break;
                    case 'dict_fax':
                        $stmt->bindValue($identifier, $this->dict_fax, PDO::PARAM_STR);
                        break;
                    case 'dict_email':
                        $stmt->bindValue($identifier, $this->dict_email, PDO::PARAM_STR);
                        break;
                    case 'dict_cupo':
                        $stmt->bindValue($identifier, $this->dict_cupo, PDO::PARAM_INT);
                        break;
                    case 'dict_t_evaluacion':
                        $stmt->bindValue($identifier, $this->dict_t_evaluacion, PDO::PARAM_INT);
                        break;
                    case 'dict_t_capacitacion':
                        $stmt->bindValue($identifier, $this->dict_t_capacitacion, PDO::PARAM_INT);
                        break;
                    case 'dict_observacion':
                        $stmt->bindValue($identifier, $this->dict_observacion, PDO::PARAM_STR);
                        break;
                    case 'dict_vigente':
                        $stmt->bindValue($identifier, $this->dict_vigente, PDO::PARAM_INT);
                        break;
                    case 'dict_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->dict_r_fecha_creacion ? $this->dict_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'dict_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->dict_r_fecha_modificacion ? $this->dict_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'dict_r_usuario':
                        $stmt->bindValue($identifier, $this->dict_r_usuario, PDO::PARAM_INT);
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
        $pos = DictacionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getDictCActividad();
                break;
            case 1:
                return $this->getDictNumero();
                break;
            case 2:
                return $this->getDictFechaInicio();
                break;
            case 3:
                return $this->getDictFechaTermino();
                break;
            case 4:
                return $this->getDictEDictacion();
                break;
            case 5:
                return $this->getDictCResolucion();
                break;
            case 6:
                return $this->getDictTCertificado();
                break;
            case 7:
                return $this->getDictCertificadoParticipacion();
                break;
            case 8:
                return $this->getDictTCalificacion();
                break;
            case 9:
                return $this->getDictAsistenciaMinima();
                break;
            case 10:
                return $this->getDictNotaMinima();
                break;
            case 11:
                return $this->getDictCobertura();
                break;
            case 12:
                return $this->getDictValor();
                break;
            case 13:
                return $this->getDictTMoneda();
                break;
            case 14:
                return $this->getDictCComuna();
                break;
            case 15:
                return $this->getDictDireccion();
                break;
            case 16:
                return $this->getDictTelefono();
                break;
            case 17:
                return $this->getDictFax();
                break;
            case 18:
                return $this->getDictEmail();
                break;
            case 19:
                return $this->getDictCupo();
                break;
            case 20:
                return $this->getDictTEvaluacion();
                break;
            case 21:
                return $this->getDictTCapacitacion();
                break;
            case 22:
                return $this->getDictObservacion();
                break;
            case 23:
                return $this->getDictVigente();
                break;
            case 24:
                return $this->getDictRFechaCreacion();
                break;
            case 25:
                return $this->getDictRFechaModificacion();
                break;
            case 26:
                return $this->getDictRUsuario();
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

        if (isset($alreadyDumpedObjects['Dictacion'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Dictacion'][$this->hashCode()] = true;
        $keys = DictacionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getDictCActividad(),
            $keys[1] => $this->getDictNumero(),
            $keys[2] => $this->getDictFechaInicio(),
            $keys[3] => $this->getDictFechaTermino(),
            $keys[4] => $this->getDictEDictacion(),
            $keys[5] => $this->getDictCResolucion(),
            $keys[6] => $this->getDictTCertificado(),
            $keys[7] => $this->getDictCertificadoParticipacion(),
            $keys[8] => $this->getDictTCalificacion(),
            $keys[9] => $this->getDictAsistenciaMinima(),
            $keys[10] => $this->getDictNotaMinima(),
            $keys[11] => $this->getDictCobertura(),
            $keys[12] => $this->getDictValor(),
            $keys[13] => $this->getDictTMoneda(),
            $keys[14] => $this->getDictCComuna(),
            $keys[15] => $this->getDictDireccion(),
            $keys[16] => $this->getDictTelefono(),
            $keys[17] => $this->getDictFax(),
            $keys[18] => $this->getDictEmail(),
            $keys[19] => $this->getDictCupo(),
            $keys[20] => $this->getDictTEvaluacion(),
            $keys[21] => $this->getDictTCapacitacion(),
            $keys[22] => $this->getDictObservacion(),
            $keys[23] => $this->getDictVigente(),
            $keys[24] => $this->getDictRFechaCreacion(),
            $keys[25] => $this->getDictRFechaModificacion(),
            $keys[26] => $this->getDictRUsuario(),
        );
        if ($result[$keys[24]] instanceof \DateTimeInterface) {
            $result[$keys[24]] = $result[$keys[24]]->format('c');
        }

        if ($result[$keys[25]] instanceof \DateTimeInterface) {
            $result[$keys[25]] = $result[$keys[25]]->format('c');
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
            if (null !== $this->aEDictacion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'eDictacion';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'e_dictacion';
                        break;
                    default:
                        $key = 'EDictacion';
                }

                $result[$key] = $this->aEDictacion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTCalificacion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tCalificacion';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_calificacion';
                        break;
                    default:
                        $key = 'TCalificacion';
                }

                $result[$key] = $this->aTCalificacion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTCertificado) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tCertificado';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_certificado';
                        break;
                    default:
                        $key = 'TCertificado';
                }

                $result[$key] = $this->aTCertificado->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTEvaluacion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tEvaluacion';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_evaluacion';
                        break;
                    default:
                        $key = 'TEvaluacion';
                }

                $result[$key] = $this->aTEvaluacion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTMoneda) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tMoneda';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_moneda';
                        break;
                    default:
                        $key = 'TMoneda';
                }

                $result[$key] = $this->aTMoneda->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collEvaluacionAplicadas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'evaluacionAplicadas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'evaluacion_aplicadas';
                        break;
                    default:
                        $key = 'EvaluacionAplicadas';
                }

                $result[$key] = $this->collEvaluacionAplicadas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFacilitadors) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'facilitadors';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'facilitadors';
                        break;
                    default:
                        $key = 'Facilitadors';
                }

                $result[$key] = $this->collFacilitadors->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Dictacion
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = DictacionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Dictacion
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setDictCActividad($value);
                break;
            case 1:
                $this->setDictNumero($value);
                break;
            case 2:
                $this->setDictFechaInicio($value);
                break;
            case 3:
                $this->setDictFechaTermino($value);
                break;
            case 4:
                $this->setDictEDictacion($value);
                break;
            case 5:
                $this->setDictCResolucion($value);
                break;
            case 6:
                $this->setDictTCertificado($value);
                break;
            case 7:
                $this->setDictCertificadoParticipacion($value);
                break;
            case 8:
                $this->setDictTCalificacion($value);
                break;
            case 9:
                $this->setDictAsistenciaMinima($value);
                break;
            case 10:
                $this->setDictNotaMinima($value);
                break;
            case 11:
                $this->setDictCobertura($value);
                break;
            case 12:
                $this->setDictValor($value);
                break;
            case 13:
                $this->setDictTMoneda($value);
                break;
            case 14:
                $this->setDictCComuna($value);
                break;
            case 15:
                $this->setDictDireccion($value);
                break;
            case 16:
                $this->setDictTelefono($value);
                break;
            case 17:
                $this->setDictFax($value);
                break;
            case 18:
                $this->setDictEmail($value);
                break;
            case 19:
                $this->setDictCupo($value);
                break;
            case 20:
                $this->setDictTEvaluacion($value);
                break;
            case 21:
                $this->setDictTCapacitacion($value);
                break;
            case 22:
                $this->setDictObservacion($value);
                break;
            case 23:
                $this->setDictVigente($value);
                break;
            case 24:
                $this->setDictRFechaCreacion($value);
                break;
            case 25:
                $this->setDictRFechaModificacion($value);
                break;
            case 26:
                $this->setDictRUsuario($value);
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
        $keys = DictacionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setDictCActividad($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setDictNumero($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDictFechaInicio($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDictFechaTermino($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDictEDictacion($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDictCResolucion($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDictTCertificado($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setDictCertificadoParticipacion($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setDictTCalificacion($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setDictAsistenciaMinima($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDictNotaMinima($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setDictCobertura($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setDictValor($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setDictTMoneda($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setDictCComuna($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setDictDireccion($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setDictTelefono($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setDictFax($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setDictEmail($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setDictCupo($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setDictTEvaluacion($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setDictTCapacitacion($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setDictObservacion($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setDictVigente($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setDictRFechaCreacion($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setDictRFechaModificacion($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setDictRUsuario($arr[$keys[26]]);
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
     * @return $this|\Dictacion The current object, for fluid interface
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
        $criteria = new Criteria(DictacionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(DictacionTableMap::COL_DICT_C_ACTIVIDAD)) {
            $criteria->add(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $this->dict_c_actividad);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_NUMERO)) {
            $criteria->add(DictacionTableMap::COL_DICT_NUMERO, $this->dict_numero);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_FECHA_INICIO)) {
            $criteria->add(DictacionTableMap::COL_DICT_FECHA_INICIO, $this->dict_fecha_inicio);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_FECHA_TERMINO)) {
            $criteria->add(DictacionTableMap::COL_DICT_FECHA_TERMINO, $this->dict_fecha_termino);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_E_DICTACION)) {
            $criteria->add(DictacionTableMap::COL_DICT_E_DICTACION, $this->dict_e_dictacion);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_C_RESOLUCION)) {
            $criteria->add(DictacionTableMap::COL_DICT_C_RESOLUCION, $this->dict_c_resolucion);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_T_CERTIFICADO)) {
            $criteria->add(DictacionTableMap::COL_DICT_T_CERTIFICADO, $this->dict_t_certificado);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_CERTIFICADO_PARTICIPACION)) {
            $criteria->add(DictacionTableMap::COL_DICT_CERTIFICADO_PARTICIPACION, $this->dict_certificado_participacion);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_T_CALIFICACION)) {
            $criteria->add(DictacionTableMap::COL_DICT_T_CALIFICACION, $this->dict_t_calificacion);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_ASISTENCIA_MINIMA)) {
            $criteria->add(DictacionTableMap::COL_DICT_ASISTENCIA_MINIMA, $this->dict_asistencia_minima);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_NOTA_MINIMA)) {
            $criteria->add(DictacionTableMap::COL_DICT_NOTA_MINIMA, $this->dict_nota_minima);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_COBERTURA)) {
            $criteria->add(DictacionTableMap::COL_DICT_COBERTURA, $this->dict_cobertura);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_VALOR)) {
            $criteria->add(DictacionTableMap::COL_DICT_VALOR, $this->dict_valor);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_T_MONEDA)) {
            $criteria->add(DictacionTableMap::COL_DICT_T_MONEDA, $this->dict_t_moneda);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_C_COMUNA)) {
            $criteria->add(DictacionTableMap::COL_DICT_C_COMUNA, $this->dict_c_comuna);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_DIRECCION)) {
            $criteria->add(DictacionTableMap::COL_DICT_DIRECCION, $this->dict_direccion);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_TELEFONO)) {
            $criteria->add(DictacionTableMap::COL_DICT_TELEFONO, $this->dict_telefono);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_FAX)) {
            $criteria->add(DictacionTableMap::COL_DICT_FAX, $this->dict_fax);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_EMAIL)) {
            $criteria->add(DictacionTableMap::COL_DICT_EMAIL, $this->dict_email);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_CUPO)) {
            $criteria->add(DictacionTableMap::COL_DICT_CUPO, $this->dict_cupo);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_T_EVALUACION)) {
            $criteria->add(DictacionTableMap::COL_DICT_T_EVALUACION, $this->dict_t_evaluacion);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_T_CAPACITACION)) {
            $criteria->add(DictacionTableMap::COL_DICT_T_CAPACITACION, $this->dict_t_capacitacion);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_OBSERVACION)) {
            $criteria->add(DictacionTableMap::COL_DICT_OBSERVACION, $this->dict_observacion);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_VIGENTE)) {
            $criteria->add(DictacionTableMap::COL_DICT_VIGENTE, $this->dict_vigente);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_R_FECHA_CREACION)) {
            $criteria->add(DictacionTableMap::COL_DICT_R_FECHA_CREACION, $this->dict_r_fecha_creacion);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_R_FECHA_MODIFICACION)) {
            $criteria->add(DictacionTableMap::COL_DICT_R_FECHA_MODIFICACION, $this->dict_r_fecha_modificacion);
        }
        if ($this->isColumnModified(DictacionTableMap::COL_DICT_R_USUARIO)) {
            $criteria->add(DictacionTableMap::COL_DICT_R_USUARIO, $this->dict_r_usuario);
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
        $criteria = ChildDictacionQuery::create();
        $criteria->add(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $this->dict_c_actividad);
        $criteria->add(DictacionTableMap::COL_DICT_NUMERO, $this->dict_numero);

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
        $validPk = null !== $this->getDictCActividad() &&
            null !== $this->getDictNumero();

        $validPrimaryKeyFKs = 1;
        $primaryKeyFKs = [];

        //relation dictacion_actividad_fk to table actividad
        if ($this->aActividad && $hash = spl_object_hash($this->aActividad)) {
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
        $pks[0] = $this->getDictCActividad();
        $pks[1] = $this->getDictNumero();

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
        $this->setDictCActividad($keys[0]);
        $this->setDictNumero($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getDictCActividad()) && (null === $this->getDictNumero());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Dictacion (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDictCActividad($this->getDictCActividad());
        $copyObj->setDictNumero($this->getDictNumero());
        $copyObj->setDictFechaInicio($this->getDictFechaInicio());
        $copyObj->setDictFechaTermino($this->getDictFechaTermino());
        $copyObj->setDictEDictacion($this->getDictEDictacion());
        $copyObj->setDictCResolucion($this->getDictCResolucion());
        $copyObj->setDictTCertificado($this->getDictTCertificado());
        $copyObj->setDictCertificadoParticipacion($this->getDictCertificadoParticipacion());
        $copyObj->setDictTCalificacion($this->getDictTCalificacion());
        $copyObj->setDictAsistenciaMinima($this->getDictAsistenciaMinima());
        $copyObj->setDictNotaMinima($this->getDictNotaMinima());
        $copyObj->setDictCobertura($this->getDictCobertura());
        $copyObj->setDictValor($this->getDictValor());
        $copyObj->setDictTMoneda($this->getDictTMoneda());
        $copyObj->setDictCComuna($this->getDictCComuna());
        $copyObj->setDictDireccion($this->getDictDireccion());
        $copyObj->setDictTelefono($this->getDictTelefono());
        $copyObj->setDictFax($this->getDictFax());
        $copyObj->setDictEmail($this->getDictEmail());
        $copyObj->setDictCupo($this->getDictCupo());
        $copyObj->setDictTEvaluacion($this->getDictTEvaluacion());
        $copyObj->setDictTCapacitacion($this->getDictTCapacitacion());
        $copyObj->setDictObservacion($this->getDictObservacion());
        $copyObj->setDictVigente($this->getDictVigente());
        $copyObj->setDictRFechaCreacion($this->getDictRFechaCreacion());
        $copyObj->setDictRFechaModificacion($this->getDictRFechaModificacion());
        $copyObj->setDictRUsuario($this->getDictRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getEvaluacionAplicadas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEvaluacionAplicada($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFacilitadors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFacilitador($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInscripcions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInscripcion($relObj->copy($deepCopy));
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
     * @return \Dictacion Clone of current object.
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
     * @return $this|\Dictacion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setActividad(ChildActividad $v = null)
    {
        if ($v === null) {
            $this->setDictCActividad(NULL);
        } else {
            $this->setDictCActividad($v->getActiCodigo());
        }

        $this->aActividad = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildActividad object, it will not be re-added.
        if ($v !== null) {
            $v->addDictacion($this);
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
        if ($this->aActividad === null && ($this->dict_c_actividad != 0)) {
            $this->aActividad = ChildActividadQuery::create()->findPk($this->dict_c_actividad, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aActividad->addDictacions($this);
             */
        }

        return $this->aActividad;
    }

    /**
     * Declares an association between this object and a ChildComuna object.
     *
     * @param  ChildComuna $v
     * @return $this|\Dictacion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setComuna(ChildComuna $v = null)
    {
        if ($v === null) {
            $this->setDictCComuna(NULL);
        } else {
            $this->setDictCComuna($v->getComuCodigo());
        }

        $this->aComuna = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildComuna object, it will not be re-added.
        if ($v !== null) {
            $v->addDictacion($this);
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
        if ($this->aComuna === null && ($this->dict_c_comuna != 0)) {
            $this->aComuna = ChildComunaQuery::create()->findPk($this->dict_c_comuna, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aComuna->addDictacions($this);
             */
        }

        return $this->aComuna;
    }

    /**
     * Declares an association between this object and a ChildEDictacion object.
     *
     * @param  ChildEDictacion $v
     * @return $this|\Dictacion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEDictacion(ChildEDictacion $v = null)
    {
        if ($v === null) {
            $this->setDictEDictacion(NULL);
        } else {
            $this->setDictEDictacion($v->getEdiEstado());
        }

        $this->aEDictacion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEDictacion object, it will not be re-added.
        if ($v !== null) {
            $v->addDictacion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEDictacion object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEDictacion The associated ChildEDictacion object.
     * @throws PropelException
     */
    public function getEDictacion(ConnectionInterface $con = null)
    {
        if ($this->aEDictacion === null && ($this->dict_e_dictacion != 0)) {
            $this->aEDictacion = ChildEDictacionQuery::create()->findPk($this->dict_e_dictacion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEDictacion->addDictacions($this);
             */
        }

        return $this->aEDictacion;
    }

    /**
     * Declares an association between this object and a ChildTCalificacion object.
     *
     * @param  ChildTCalificacion $v
     * @return $this|\Dictacion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTCalificacion(ChildTCalificacion $v = null)
    {
        if ($v === null) {
            $this->setDictTCalificacion(NULL);
        } else {
            $this->setDictTCalificacion($v->getTcalTipo());
        }

        $this->aTCalificacion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTCalificacion object, it will not be re-added.
        if ($v !== null) {
            $v->addDictacion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTCalificacion object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTCalificacion The associated ChildTCalificacion object.
     * @throws PropelException
     */
    public function getTCalificacion(ConnectionInterface $con = null)
    {
        if ($this->aTCalificacion === null && ($this->dict_t_calificacion != 0)) {
            $this->aTCalificacion = ChildTCalificacionQuery::create()->findPk($this->dict_t_calificacion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTCalificacion->addDictacions($this);
             */
        }

        return $this->aTCalificacion;
    }

    /**
     * Declares an association between this object and a ChildTCertificado object.
     *
     * @param  ChildTCertificado $v
     * @return $this|\Dictacion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTCertificado(ChildTCertificado $v = null)
    {
        if ($v === null) {
            $this->setDictTCertificado(NULL);
        } else {
            $this->setDictTCertificado($v->getTceTipo());
        }

        $this->aTCertificado = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTCertificado object, it will not be re-added.
        if ($v !== null) {
            $v->addDictacion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTCertificado object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTCertificado The associated ChildTCertificado object.
     * @throws PropelException
     */
    public function getTCertificado(ConnectionInterface $con = null)
    {
        if ($this->aTCertificado === null && ($this->dict_t_certificado != 0)) {
            $this->aTCertificado = ChildTCertificadoQuery::create()->findPk($this->dict_t_certificado, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTCertificado->addDictacions($this);
             */
        }

        return $this->aTCertificado;
    }

    /**
     * Declares an association between this object and a ChildTEvaluacion object.
     *
     * @param  ChildTEvaluacion $v
     * @return $this|\Dictacion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTEvaluacion(ChildTEvaluacion $v = null)
    {
        if ($v === null) {
            $this->setDictTEvaluacion(NULL);
        } else {
            $this->setDictTEvaluacion($v->getTevTipo());
        }

        $this->aTEvaluacion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTEvaluacion object, it will not be re-added.
        if ($v !== null) {
            $v->addDictacion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTEvaluacion object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTEvaluacion The associated ChildTEvaluacion object.
     * @throws PropelException
     */
    public function getTEvaluacion(ConnectionInterface $con = null)
    {
        if ($this->aTEvaluacion === null && ($this->dict_t_evaluacion != 0)) {
            $this->aTEvaluacion = ChildTEvaluacionQuery::create()->findPk($this->dict_t_evaluacion, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTEvaluacion->addDictacions($this);
             */
        }

        return $this->aTEvaluacion;
    }

    /**
     * Declares an association between this object and a ChildTMoneda object.
     *
     * @param  ChildTMoneda $v
     * @return $this|\Dictacion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTMoneda(ChildTMoneda $v = null)
    {
        if ($v === null) {
            $this->setDictTMoneda(NULL);
        } else {
            $this->setDictTMoneda($v->getTmonTipo());
        }

        $this->aTMoneda = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTMoneda object, it will not be re-added.
        if ($v !== null) {
            $v->addDictacion($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTMoneda object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTMoneda The associated ChildTMoneda object.
     * @throws PropelException
     */
    public function getTMoneda(ConnectionInterface $con = null)
    {
        if ($this->aTMoneda === null && ($this->dict_t_moneda != 0)) {
            $this->aTMoneda = ChildTMonedaQuery::create()->findPk($this->dict_t_moneda, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTMoneda->addDictacions($this);
             */
        }

        return $this->aTMoneda;
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
        if ('EvaluacionAplicada' == $relationName) {
            $this->initEvaluacionAplicadas();
            return;
        }
        if ('Facilitador' == $relationName) {
            $this->initFacilitadors();
            return;
        }
        if ('Inscripcion' == $relationName) {
            $this->initInscripcions();
            return;
        }
    }

    /**
     * Clears out the collEvaluacionAplicadas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEvaluacionAplicadas()
     */
    public function clearEvaluacionAplicadas()
    {
        $this->collEvaluacionAplicadas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEvaluacionAplicadas collection loaded partially.
     */
    public function resetPartialEvaluacionAplicadas($v = true)
    {
        $this->collEvaluacionAplicadasPartial = $v;
    }

    /**
     * Initializes the collEvaluacionAplicadas collection.
     *
     * By default this just sets the collEvaluacionAplicadas collection to an empty array (like clearcollEvaluacionAplicadas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEvaluacionAplicadas($overrideExisting = true)
    {
        if (null !== $this->collEvaluacionAplicadas && !$overrideExisting) {
            return;
        }

        $collectionClassName = EvaluacionAplicadaTableMap::getTableMap()->getCollectionClassName();

        $this->collEvaluacionAplicadas = new $collectionClassName;
        $this->collEvaluacionAplicadas->setModel('\EvaluacionAplicada');
    }

    /**
     * Gets an array of ChildEvaluacionAplicada objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildDictacion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEvaluacionAplicada[] List of ChildEvaluacionAplicada objects
     * @throws PropelException
     */
    public function getEvaluacionAplicadas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEvaluacionAplicadasPartial && !$this->isNew();
        if (null === $this->collEvaluacionAplicadas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEvaluacionAplicadas) {
                // return empty collection
                $this->initEvaluacionAplicadas();
            } else {
                $collEvaluacionAplicadas = ChildEvaluacionAplicadaQuery::create(null, $criteria)
                    ->filterByDictacion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEvaluacionAplicadasPartial && count($collEvaluacionAplicadas)) {
                        $this->initEvaluacionAplicadas(false);

                        foreach ($collEvaluacionAplicadas as $obj) {
                            if (false == $this->collEvaluacionAplicadas->contains($obj)) {
                                $this->collEvaluacionAplicadas->append($obj);
                            }
                        }

                        $this->collEvaluacionAplicadasPartial = true;
                    }

                    return $collEvaluacionAplicadas;
                }

                if ($partial && $this->collEvaluacionAplicadas) {
                    foreach ($this->collEvaluacionAplicadas as $obj) {
                        if ($obj->isNew()) {
                            $collEvaluacionAplicadas[] = $obj;
                        }
                    }
                }

                $this->collEvaluacionAplicadas = $collEvaluacionAplicadas;
                $this->collEvaluacionAplicadasPartial = false;
            }
        }

        return $this->collEvaluacionAplicadas;
    }

    /**
     * Sets a collection of ChildEvaluacionAplicada objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $evaluacionAplicadas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildDictacion The current object (for fluent API support)
     */
    public function setEvaluacionAplicadas(Collection $evaluacionAplicadas, ConnectionInterface $con = null)
    {
        /** @var ChildEvaluacionAplicada[] $evaluacionAplicadasToDelete */
        $evaluacionAplicadasToDelete = $this->getEvaluacionAplicadas(new Criteria(), $con)->diff($evaluacionAplicadas);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->evaluacionAplicadasScheduledForDeletion = clone $evaluacionAplicadasToDelete;

        foreach ($evaluacionAplicadasToDelete as $evaluacionAplicadaRemoved) {
            $evaluacionAplicadaRemoved->setDictacion(null);
        }

        $this->collEvaluacionAplicadas = null;
        foreach ($evaluacionAplicadas as $evaluacionAplicada) {
            $this->addEvaluacionAplicada($evaluacionAplicada);
        }

        $this->collEvaluacionAplicadas = $evaluacionAplicadas;
        $this->collEvaluacionAplicadasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EvaluacionAplicada objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EvaluacionAplicada objects.
     * @throws PropelException
     */
    public function countEvaluacionAplicadas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEvaluacionAplicadasPartial && !$this->isNew();
        if (null === $this->collEvaluacionAplicadas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEvaluacionAplicadas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEvaluacionAplicadas());
            }

            $query = ChildEvaluacionAplicadaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDictacion($this)
                ->count($con);
        }

        return count($this->collEvaluacionAplicadas);
    }

    /**
     * Method called to associate a ChildEvaluacionAplicada object to this object
     * through the ChildEvaluacionAplicada foreign key attribute.
     *
     * @param  ChildEvaluacionAplicada $l ChildEvaluacionAplicada
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function addEvaluacionAplicada(ChildEvaluacionAplicada $l)
    {
        if ($this->collEvaluacionAplicadas === null) {
            $this->initEvaluacionAplicadas();
            $this->collEvaluacionAplicadasPartial = true;
        }

        if (!$this->collEvaluacionAplicadas->contains($l)) {
            $this->doAddEvaluacionAplicada($l);

            if ($this->evaluacionAplicadasScheduledForDeletion and $this->evaluacionAplicadasScheduledForDeletion->contains($l)) {
                $this->evaluacionAplicadasScheduledForDeletion->remove($this->evaluacionAplicadasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEvaluacionAplicada $evaluacionAplicada The ChildEvaluacionAplicada object to add.
     */
    protected function doAddEvaluacionAplicada(ChildEvaluacionAplicada $evaluacionAplicada)
    {
        $this->collEvaluacionAplicadas[]= $evaluacionAplicada;
        $evaluacionAplicada->setDictacion($this);
    }

    /**
     * @param  ChildEvaluacionAplicada $evaluacionAplicada The ChildEvaluacionAplicada object to remove.
     * @return $this|ChildDictacion The current object (for fluent API support)
     */
    public function removeEvaluacionAplicada(ChildEvaluacionAplicada $evaluacionAplicada)
    {
        if ($this->getEvaluacionAplicadas()->contains($evaluacionAplicada)) {
            $pos = $this->collEvaluacionAplicadas->search($evaluacionAplicada);
            $this->collEvaluacionAplicadas->remove($pos);
            if (null === $this->evaluacionAplicadasScheduledForDeletion) {
                $this->evaluacionAplicadasScheduledForDeletion = clone $this->collEvaluacionAplicadas;
                $this->evaluacionAplicadasScheduledForDeletion->clear();
            }
            $this->evaluacionAplicadasScheduledForDeletion[]= clone $evaluacionAplicada;
            $evaluacionAplicada->setDictacion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Dictacion is new, it will return
     * an empty collection; or if this Dictacion has previously
     * been saved, it will retrieve related EvaluacionAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dictacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEvaluacionAplicada[] List of ChildEvaluacionAplicada objects
     */
    public function getEvaluacionAplicadasJoinEEvaluacionAplicada(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEvaluacionAplicadaQuery::create(null, $criteria);
        $query->joinWith('EEvaluacionAplicada', $joinBehavior);

        return $this->getEvaluacionAplicadas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Dictacion is new, it will return
     * an empty collection; or if this Dictacion has previously
     * been saved, it will retrieve related EvaluacionAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dictacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEvaluacionAplicada[] List of ChildEvaluacionAplicada objects
     */
    public function getEvaluacionAplicadasJoinEvaluacion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEvaluacionAplicadaQuery::create(null, $criteria);
        $query->joinWith('Evaluacion', $joinBehavior);

        return $this->getEvaluacionAplicadas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Dictacion is new, it will return
     * an empty collection; or if this Dictacion has previously
     * been saved, it will retrieve related EvaluacionAplicadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dictacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEvaluacionAplicada[] List of ChildEvaluacionAplicada objects
     */
    public function getEvaluacionAplicadasJoinTEvaluacionAplicada(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEvaluacionAplicadaQuery::create(null, $criteria);
        $query->joinWith('TEvaluacionAplicada', $joinBehavior);

        return $this->getEvaluacionAplicadas($query, $con);
    }

    /**
     * Clears out the collFacilitadors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFacilitadors()
     */
    public function clearFacilitadors()
    {
        $this->collFacilitadors = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collFacilitadors collection loaded partially.
     */
    public function resetPartialFacilitadors($v = true)
    {
        $this->collFacilitadorsPartial = $v;
    }

    /**
     * Initializes the collFacilitadors collection.
     *
     * By default this just sets the collFacilitadors collection to an empty array (like clearcollFacilitadors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFacilitadors($overrideExisting = true)
    {
        if (null !== $this->collFacilitadors && !$overrideExisting) {
            return;
        }

        $collectionClassName = FacilitadorTableMap::getTableMap()->getCollectionClassName();

        $this->collFacilitadors = new $collectionClassName;
        $this->collFacilitadors->setModel('\Facilitador');
    }

    /**
     * Gets an array of ChildFacilitador objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildDictacion is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildFacilitador[] List of ChildFacilitador objects
     * @throws PropelException
     */
    public function getFacilitadors(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collFacilitadorsPartial && !$this->isNew();
        if (null === $this->collFacilitadors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFacilitadors) {
                // return empty collection
                $this->initFacilitadors();
            } else {
                $collFacilitadors = ChildFacilitadorQuery::create(null, $criteria)
                    ->filterByDictacion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collFacilitadorsPartial && count($collFacilitadors)) {
                        $this->initFacilitadors(false);

                        foreach ($collFacilitadors as $obj) {
                            if (false == $this->collFacilitadors->contains($obj)) {
                                $this->collFacilitadors->append($obj);
                            }
                        }

                        $this->collFacilitadorsPartial = true;
                    }

                    return $collFacilitadors;
                }

                if ($partial && $this->collFacilitadors) {
                    foreach ($this->collFacilitadors as $obj) {
                        if ($obj->isNew()) {
                            $collFacilitadors[] = $obj;
                        }
                    }
                }

                $this->collFacilitadors = $collFacilitadors;
                $this->collFacilitadorsPartial = false;
            }
        }

        return $this->collFacilitadors;
    }

    /**
     * Sets a collection of ChildFacilitador objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $facilitadors A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildDictacion The current object (for fluent API support)
     */
    public function setFacilitadors(Collection $facilitadors, ConnectionInterface $con = null)
    {
        /** @var ChildFacilitador[] $facilitadorsToDelete */
        $facilitadorsToDelete = $this->getFacilitadors(new Criteria(), $con)->diff($facilitadors);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->facilitadorsScheduledForDeletion = clone $facilitadorsToDelete;

        foreach ($facilitadorsToDelete as $facilitadorRemoved) {
            $facilitadorRemoved->setDictacion(null);
        }

        $this->collFacilitadors = null;
        foreach ($facilitadors as $facilitador) {
            $this->addFacilitador($facilitador);
        }

        $this->collFacilitadors = $facilitadors;
        $this->collFacilitadorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Facilitador objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Facilitador objects.
     * @throws PropelException
     */
    public function countFacilitadors(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collFacilitadorsPartial && !$this->isNew();
        if (null === $this->collFacilitadors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFacilitadors) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getFacilitadors());
            }

            $query = ChildFacilitadorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDictacion($this)
                ->count($con);
        }

        return count($this->collFacilitadors);
    }

    /**
     * Method called to associate a ChildFacilitador object to this object
     * through the ChildFacilitador foreign key attribute.
     *
     * @param  ChildFacilitador $l ChildFacilitador
     * @return $this|\Dictacion The current object (for fluent API support)
     */
    public function addFacilitador(ChildFacilitador $l)
    {
        if ($this->collFacilitadors === null) {
            $this->initFacilitadors();
            $this->collFacilitadorsPartial = true;
        }

        if (!$this->collFacilitadors->contains($l)) {
            $this->doAddFacilitador($l);

            if ($this->facilitadorsScheduledForDeletion and $this->facilitadorsScheduledForDeletion->contains($l)) {
                $this->facilitadorsScheduledForDeletion->remove($this->facilitadorsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildFacilitador $facilitador The ChildFacilitador object to add.
     */
    protected function doAddFacilitador(ChildFacilitador $facilitador)
    {
        $this->collFacilitadors[]= $facilitador;
        $facilitador->setDictacion($this);
    }

    /**
     * @param  ChildFacilitador $facilitador The ChildFacilitador object to remove.
     * @return $this|ChildDictacion The current object (for fluent API support)
     */
    public function removeFacilitador(ChildFacilitador $facilitador)
    {
        if ($this->getFacilitadors()->contains($facilitador)) {
            $pos = $this->collFacilitadors->search($facilitador);
            $this->collFacilitadors->remove($pos);
            if (null === $this->facilitadorsScheduledForDeletion) {
                $this->facilitadorsScheduledForDeletion = clone $this->collFacilitadors;
                $this->facilitadorsScheduledForDeletion->clear();
            }
            $this->facilitadorsScheduledForDeletion[]= clone $facilitador;
            $facilitador->setDictacion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Dictacion is new, it will return
     * an empty collection; or if this Dictacion has previously
     * been saved, it will retrieve related Facilitadors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dictacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildFacilitador[] List of ChildFacilitador objects
     */
    public function getFacilitadorsJoinPersona(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildFacilitadorQuery::create(null, $criteria);
        $query->joinWith('Persona', $joinBehavior);

        return $this->getFacilitadors($query, $con);
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
     * If this ChildDictacion is new, it will return
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
                    ->filterByDictacion($this)
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
     * @return $this|ChildDictacion The current object (for fluent API support)
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
            $inscripcionRemoved->setDictacion(null);
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
                ->filterByDictacion($this)
                ->count($con);
        }

        return count($this->collInscripcions);
    }

    /**
     * Method called to associate a ChildInscripcion object to this object
     * through the ChildInscripcion foreign key attribute.
     *
     * @param  ChildInscripcion $l ChildInscripcion
     * @return $this|\Dictacion The current object (for fluent API support)
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
        $inscripcion->setDictacion($this);
    }

    /**
     * @param  ChildInscripcion $inscripcion The ChildInscripcion object to remove.
     * @return $this|ChildDictacion The current object (for fluent API support)
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
            $inscripcion->setDictacion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Dictacion is new, it will return
     * an empty collection; or if this Dictacion has previously
     * been saved, it will retrieve related Inscripcions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dictacion.
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
     * Otherwise if this Dictacion is new, it will return
     * an empty collection; or if this Dictacion has previously
     * been saved, it will retrieve related Inscripcions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dictacion.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Dictacion is new, it will return
     * an empty collection; or if this Dictacion has previously
     * been saved, it will retrieve related Inscripcions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Dictacion.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildInscripcion[] List of ChildInscripcion objects
     */
    public function getInscripcionsJoinTrabajador(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildInscripcionQuery::create(null, $criteria);
        $query->joinWith('Trabajador', $joinBehavior);

        return $this->getInscripcions($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aActividad) {
            $this->aActividad->removeDictacion($this);
        }
        if (null !== $this->aComuna) {
            $this->aComuna->removeDictacion($this);
        }
        if (null !== $this->aEDictacion) {
            $this->aEDictacion->removeDictacion($this);
        }
        if (null !== $this->aTCalificacion) {
            $this->aTCalificacion->removeDictacion($this);
        }
        if (null !== $this->aTCertificado) {
            $this->aTCertificado->removeDictacion($this);
        }
        if (null !== $this->aTEvaluacion) {
            $this->aTEvaluacion->removeDictacion($this);
        }
        if (null !== $this->aTMoneda) {
            $this->aTMoneda->removeDictacion($this);
        }
        $this->dict_c_actividad = null;
        $this->dict_numero = null;
        $this->dict_fecha_inicio = null;
        $this->dict_fecha_termino = null;
        $this->dict_e_dictacion = null;
        $this->dict_c_resolucion = null;
        $this->dict_t_certificado = null;
        $this->dict_certificado_participacion = null;
        $this->dict_t_calificacion = null;
        $this->dict_asistencia_minima = null;
        $this->dict_nota_minima = null;
        $this->dict_cobertura = null;
        $this->dict_valor = null;
        $this->dict_t_moneda = null;
        $this->dict_c_comuna = null;
        $this->dict_direccion = null;
        $this->dict_telefono = null;
        $this->dict_fax = null;
        $this->dict_email = null;
        $this->dict_cupo = null;
        $this->dict_t_evaluacion = null;
        $this->dict_t_capacitacion = null;
        $this->dict_observacion = null;
        $this->dict_vigente = null;
        $this->dict_r_fecha_creacion = null;
        $this->dict_r_fecha_modificacion = null;
        $this->dict_r_usuario = null;
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
            if ($this->collEvaluacionAplicadas) {
                foreach ($this->collEvaluacionAplicadas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFacilitadors) {
                foreach ($this->collFacilitadors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInscripcions) {
                foreach ($this->collInscripcions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collEvaluacionAplicadas = null;
        $this->collFacilitadors = null;
        $this->collInscripcions = null;
        $this->aActividad = null;
        $this->aComuna = null;
        $this->aEDictacion = null;
        $this->aTCalificacion = null;
        $this->aTCertificado = null;
        $this->aTEvaluacion = null;
        $this->aTMoneda = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DictacionTableMap::DEFAULT_STRING_FORMAT);
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
