<?php

namespace Base;

use \Direccion as ChildDireccion;
use \DireccionQuery as ChildDireccionQuery;
use \Escolaridad as ChildEscolaridad;
use \EscolaridadQuery as ChildEscolaridadQuery;
use \EstadoCivil as ChildEstadoCivil;
use \EstadoCivilQuery as ChildEstadoCivilQuery;
use \Facilitador as ChildFacilitador;
use \FacilitadorQuery as ChildFacilitadorQuery;
use \Pais as ChildPais;
use \PaisQuery as ChildPaisQuery;
use \Persona as ChildPersona;
use \PersonaQuery as ChildPersonaQuery;
use \TIdentificador as ChildTIdentificador;
use \TIdentificadorQuery as ChildTIdentificadorQuery;
use \Trabajador as ChildTrabajador;
use \TrabajadorQuery as ChildTrabajadorQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\DireccionTableMap;
use Map\FacilitadorTableMap;
use Map\PersonaTableMap;
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
 * Base class that represents a row from the 'persona' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Persona implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\PersonaTableMap';


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
     * The value for the pers_codigo field.
     *
     * @var        int
     */
    protected $pers_codigo;

    /**
     * The value for the pers_t_identificador field.
     *
     * @var        int
     */
    protected $pers_t_identificador;

    /**
     * The value for the pers_identificador field.
     *
     * @var        int
     */
    protected $pers_identificador;

    /**
     * The value for the pers_dv field.
     *
     * @var        string
     */
    protected $pers_dv;

    /**
     * The value for the pers_nombre1 field.
     *
     * @var        string
     */
    protected $pers_nombre1;

    /**
     * The value for the pers_nombre2 field.
     *
     * @var        string
     */
    protected $pers_nombre2;

    /**
     * The value for the pers_apellido_paterno field.
     *
     * @var        string
     */
    protected $pers_apellido_paterno;

    /**
     * The value for the pers_apellido_materno field.
     *
     * @var        string
     */
    protected $pers_apellido_materno;

    /**
     * The value for the pers_sexo field.
     *
     * @var        string
     */
    protected $pers_sexo;

    /**
     * The value for the pers_fecha_nacimiento field.
     *
     * @var        string
     */
    protected $pers_fecha_nacimiento;

    /**
     * The value for the pers_c_estado_civil field.
     *
     * @var        int
     */
    protected $pers_c_estado_civil;

    /**
     * The value for the pers_c_escolaridad field.
     *
     * @var        int
     */
    protected $pers_c_escolaridad;

    /**
     * The value for the pers_c_pais_origen field.
     *
     * @var        int
     */
    protected $pers_c_pais_origen;

    /**
     * The value for the pers_email field.
     *
     * @var        string
     */
    protected $pers_email;

    /**
     * The value for the pers_movil field.
     *
     * @var        string
     */
    protected $pers_movil;

    /**
     * The value for the pers_titulo field.
     *
     * @var        string
     */
    protected $pers_titulo;

    /**
     * The value for the pers_grado field.
     *
     * @var        string
     */
    protected $pers_grado;

    /**
     * The value for the pers_r_fecha_creacion field.
     *
     * @var        DateTime
     */
    protected $pers_r_fecha_creacion;

    /**
     * The value for the pers_r_fecha_modificacion field.
     *
     * @var        DateTime
     */
    protected $pers_r_fecha_modificacion;

    /**
     * The value for the pers_r_usuario field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $pers_r_usuario;

    /**
     * @var        ChildEscolaridad
     */
    protected $aEscolaridad;

    /**
     * @var        ChildEstadoCivil
     */
    protected $aEstadoCivil;

    /**
     * @var        ChildPais
     */
    protected $aPais;

    /**
     * @var        ChildTIdentificador
     */
    protected $aTIdentificador;

    /**
     * @var        ObjectCollection|ChildDireccion[] Collection to store aggregation of ChildDireccion objects.
     */
    protected $collDireccions;
    protected $collDireccionsPartial;

    /**
     * @var        ObjectCollection|ChildFacilitador[] Collection to store aggregation of ChildFacilitador objects.
     */
    protected $collFacilitadors;
    protected $collFacilitadorsPartial;

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
     * @var ObjectCollection|ChildDireccion[]
     */
    protected $direccionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildFacilitador[]
     */
    protected $facilitadorsScheduledForDeletion = null;

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
        $this->pers_r_usuario = 1;
    }

    /**
     * Initializes internal state of Base\Persona object.
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
     * Compares this with another <code>Persona</code> instance.  If
     * <code>obj</code> is an instance of <code>Persona</code>, delegates to
     * <code>equals(Persona)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Persona The current object, for fluid interface
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
     * Get the [pers_codigo] column value.
     *
     * @return int
     */
    public function getPersCodigo()
    {
        return $this->pers_codigo;
    }

    /**
     * Get the [pers_t_identificador] column value.
     *
     * @return int
     */
    public function getPersTIdentificador()
    {
        return $this->pers_t_identificador;
    }

    /**
     * Get the [pers_identificador] column value.
     *
     * @return int
     */
    public function getPersIdentificador()
    {
        return $this->pers_identificador;
    }

    /**
     * Get the [pers_dv] column value.
     *
     * @return string
     */
    public function getPersDv()
    {
        return $this->pers_dv;
    }

    /**
     * Get the [pers_nombre1] column value.
     *
     * @return string
     */
    public function getPersNombre1()
    {
        return $this->pers_nombre1;
    }

    /**
     * Get the [pers_nombre2] column value.
     *
     * @return string
     */
    public function getPersNombre2()
    {
        return $this->pers_nombre2;
    }

    /**
     * Get the [pers_apellido_paterno] column value.
     *
     * @return string
     */
    public function getPersApellidoPaterno()
    {
        return $this->pers_apellido_paterno;
    }

    /**
     * Get the [pers_apellido_materno] column value.
     *
     * @return string
     */
    public function getPersApellidoMaterno()
    {
        return $this->pers_apellido_materno;
    }

    /**
     * Get the [pers_sexo] column value.
     *
     * @return string
     */
    public function getPersSexo()
    {
        return $this->pers_sexo;
    }

    /**
     * Get the [pers_fecha_nacimiento] column value.
     *
     * @return string
     */
    public function getPersFechaNacimiento()
    {
        return $this->pers_fecha_nacimiento;
    }

    /**
     * Get the [pers_c_estado_civil] column value.
     *
     * @return int
     */
    public function getPersCEstadoCivil()
    {
        return $this->pers_c_estado_civil;
    }

    /**
     * Get the [pers_c_escolaridad] column value.
     *
     * @return int
     */
    public function getPersCEscolaridad()
    {
        return $this->pers_c_escolaridad;
    }

    /**
     * Get the [pers_c_pais_origen] column value.
     *
     * @return int
     */
    public function getPersCPaisOrigen()
    {
        return $this->pers_c_pais_origen;
    }

    /**
     * Get the [pers_email] column value.
     *
     * @return string
     */
    public function getPersEmail()
    {
        return $this->pers_email;
    }

    /**
     * Get the [pers_movil] column value.
     *
     * @return string
     */
    public function getPersMovil()
    {
        return $this->pers_movil;
    }

    /**
     * Get the [pers_titulo] column value.
     *
     * @return string
     */
    public function getPersTitulo()
    {
        return $this->pers_titulo;
    }

    /**
     * Get the [pers_grado] column value.
     *
     * @return string
     */
    public function getPersGrado()
    {
        return $this->pers_grado;
    }

    /**
     * Get the [optionally formatted] temporal [pers_r_fecha_creacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPersRFechaCreacion($format = NULL)
    {
        if ($format === null) {
            return $this->pers_r_fecha_creacion;
        } else {
            return $this->pers_r_fecha_creacion instanceof \DateTimeInterface ? $this->pers_r_fecha_creacion->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [pers_r_fecha_modificacion] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPersRFechaModificacion($format = NULL)
    {
        if ($format === null) {
            return $this->pers_r_fecha_modificacion;
        } else {
            return $this->pers_r_fecha_modificacion instanceof \DateTimeInterface ? $this->pers_r_fecha_modificacion->format($format) : null;
        }
    }

    /**
     * Get the [pers_r_usuario] column value.
     *
     * @return int
     */
    public function getPersRUsuario()
    {
        return $this->pers_r_usuario;
    }

    /**
     * Set the value of [pers_codigo] column.
     *
     * @param int $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersCodigo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pers_codigo !== $v) {
            $this->pers_codigo = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_CODIGO] = true;
        }

        return $this;
    } // setPersCodigo()

    /**
     * Set the value of [pers_t_identificador] column.
     *
     * @param int $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersTIdentificador($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pers_t_identificador !== $v) {
            $this->pers_t_identificador = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_T_IDENTIFICADOR] = true;
        }

        if ($this->aTIdentificador !== null && $this->aTIdentificador->getTideTipo() !== $v) {
            $this->aTIdentificador = null;
        }

        return $this;
    } // setPersTIdentificador()

    /**
     * Set the value of [pers_identificador] column.
     *
     * @param int $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersIdentificador($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pers_identificador !== $v) {
            $this->pers_identificador = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_IDENTIFICADOR] = true;
        }

        return $this;
    } // setPersIdentificador()

    /**
     * Set the value of [pers_dv] column.
     *
     * @param string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersDv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pers_dv !== $v) {
            $this->pers_dv = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_DV] = true;
        }

        return $this;
    } // setPersDv()

    /**
     * Set the value of [pers_nombre1] column.
     *
     * @param string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersNombre1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pers_nombre1 !== $v) {
            $this->pers_nombre1 = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_NOMBRE1] = true;
        }

        return $this;
    } // setPersNombre1()

    /**
     * Set the value of [pers_nombre2] column.
     *
     * @param string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersNombre2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pers_nombre2 !== $v) {
            $this->pers_nombre2 = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_NOMBRE2] = true;
        }

        return $this;
    } // setPersNombre2()

    /**
     * Set the value of [pers_apellido_paterno] column.
     *
     * @param string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersApellidoPaterno($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pers_apellido_paterno !== $v) {
            $this->pers_apellido_paterno = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_APELLIDO_PATERNO] = true;
        }

        return $this;
    } // setPersApellidoPaterno()

    /**
     * Set the value of [pers_apellido_materno] column.
     *
     * @param string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersApellidoMaterno($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pers_apellido_materno !== $v) {
            $this->pers_apellido_materno = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_APELLIDO_MATERNO] = true;
        }

        return $this;
    } // setPersApellidoMaterno()

    /**
     * Set the value of [pers_sexo] column.
     *
     * @param string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersSexo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pers_sexo !== $v) {
            $this->pers_sexo = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_SEXO] = true;
        }

        return $this;
    } // setPersSexo()

    /**
     * Set the value of [pers_fecha_nacimiento] column.
     *
     * @param string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersFechaNacimiento($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pers_fecha_nacimiento !== $v) {
            $this->pers_fecha_nacimiento = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_FECHA_NACIMIENTO] = true;
        }

        return $this;
    } // setPersFechaNacimiento()

    /**
     * Set the value of [pers_c_estado_civil] column.
     *
     * @param int $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersCEstadoCivil($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pers_c_estado_civil !== $v) {
            $this->pers_c_estado_civil = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_C_ESTADO_CIVIL] = true;
        }

        if ($this->aEstadoCivil !== null && $this->aEstadoCivil->getEsciCodigo() !== $v) {
            $this->aEstadoCivil = null;
        }

        return $this;
    } // setPersCEstadoCivil()

    /**
     * Set the value of [pers_c_escolaridad] column.
     *
     * @param int $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersCEscolaridad($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pers_c_escolaridad !== $v) {
            $this->pers_c_escolaridad = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_C_ESCOLARIDAD] = true;
        }

        if ($this->aEscolaridad !== null && $this->aEscolaridad->getEscoCodigo() !== $v) {
            $this->aEscolaridad = null;
        }

        return $this;
    } // setPersCEscolaridad()

    /**
     * Set the value of [pers_c_pais_origen] column.
     *
     * @param int $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersCPaisOrigen($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pers_c_pais_origen !== $v) {
            $this->pers_c_pais_origen = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_C_PAIS_ORIGEN] = true;
        }

        if ($this->aPais !== null && $this->aPais->getPaisCodigo() !== $v) {
            $this->aPais = null;
        }

        return $this;
    } // setPersCPaisOrigen()

    /**
     * Set the value of [pers_email] column.
     *
     * @param string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pers_email !== $v) {
            $this->pers_email = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_EMAIL] = true;
        }

        return $this;
    } // setPersEmail()

    /**
     * Set the value of [pers_movil] column.
     *
     * @param string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersMovil($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pers_movil !== $v) {
            $this->pers_movil = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_MOVIL] = true;
        }

        return $this;
    } // setPersMovil()

    /**
     * Set the value of [pers_titulo] column.
     *
     * @param string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersTitulo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pers_titulo !== $v) {
            $this->pers_titulo = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_TITULO] = true;
        }

        return $this;
    } // setPersTitulo()

    /**
     * Set the value of [pers_grado] column.
     *
     * @param string $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersGrado($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pers_grado !== $v) {
            $this->pers_grado = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_GRADO] = true;
        }

        return $this;
    } // setPersGrado()

    /**
     * Sets the value of [pers_r_fecha_creacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersRFechaCreacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->pers_r_fecha_creacion !== null || $dt !== null) {
            if ($this->pers_r_fecha_creacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->pers_r_fecha_creacion->format("Y-m-d H:i:s.u")) {
                $this->pers_r_fecha_creacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PersonaTableMap::COL_PERS_R_FECHA_CREACION] = true;
            }
        } // if either are not null

        return $this;
    } // setPersRFechaCreacion()

    /**
     * Sets the value of [pers_r_fecha_modificacion] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersRFechaModificacion($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->pers_r_fecha_modificacion !== null || $dt !== null) {
            if ($this->pers_r_fecha_modificacion === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->pers_r_fecha_modificacion->format("Y-m-d H:i:s.u")) {
                $this->pers_r_fecha_modificacion = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PersonaTableMap::COL_PERS_R_FECHA_MODIFICACION] = true;
            }
        } // if either are not null

        return $this;
    } // setPersRFechaModificacion()

    /**
     * Set the value of [pers_r_usuario] column.
     *
     * @param int $v new value
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function setPersRUsuario($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pers_r_usuario !== $v) {
            $this->pers_r_usuario = $v;
            $this->modifiedColumns[PersonaTableMap::COL_PERS_R_USUARIO] = true;
        }

        return $this;
    } // setPersRUsuario()

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
            if ($this->pers_r_usuario !== 1) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PersonaTableMap::translateFieldName('PersCodigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_codigo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PersonaTableMap::translateFieldName('PersTIdentificador', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_t_identificador = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PersonaTableMap::translateFieldName('PersIdentificador', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_identificador = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PersonaTableMap::translateFieldName('PersDv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_dv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PersonaTableMap::translateFieldName('PersNombre1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_nombre1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PersonaTableMap::translateFieldName('PersNombre2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_nombre2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PersonaTableMap::translateFieldName('PersApellidoPaterno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_apellido_paterno = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PersonaTableMap::translateFieldName('PersApellidoMaterno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_apellido_materno = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PersonaTableMap::translateFieldName('PersSexo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_sexo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : PersonaTableMap::translateFieldName('PersFechaNacimiento', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_fecha_nacimiento = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : PersonaTableMap::translateFieldName('PersCEstadoCivil', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_c_estado_civil = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : PersonaTableMap::translateFieldName('PersCEscolaridad', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_c_escolaridad = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : PersonaTableMap::translateFieldName('PersCPaisOrigen', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_c_pais_origen = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : PersonaTableMap::translateFieldName('PersEmail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : PersonaTableMap::translateFieldName('PersMovil', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_movil = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : PersonaTableMap::translateFieldName('PersTitulo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_titulo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : PersonaTableMap::translateFieldName('PersGrado', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_grado = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : PersonaTableMap::translateFieldName('PersRFechaCreacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->pers_r_fecha_creacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : PersonaTableMap::translateFieldName('PersRFechaModificacion', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->pers_r_fecha_modificacion = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : PersonaTableMap::translateFieldName('PersRUsuario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pers_r_usuario = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 20; // 20 = PersonaTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Persona'), 0, $e);
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
        if ($this->aTIdentificador !== null && $this->pers_t_identificador !== $this->aTIdentificador->getTideTipo()) {
            $this->aTIdentificador = null;
        }
        if ($this->aEstadoCivil !== null && $this->pers_c_estado_civil !== $this->aEstadoCivil->getEsciCodigo()) {
            $this->aEstadoCivil = null;
        }
        if ($this->aEscolaridad !== null && $this->pers_c_escolaridad !== $this->aEscolaridad->getEscoCodigo()) {
            $this->aEscolaridad = null;
        }
        if ($this->aPais !== null && $this->pers_c_pais_origen !== $this->aPais->getPaisCodigo()) {
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
            $con = Propel::getServiceContainer()->getReadConnection(PersonaTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPersonaQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEscolaridad = null;
            $this->aEstadoCivil = null;
            $this->aPais = null;
            $this->aTIdentificador = null;
            $this->collDireccions = null;

            $this->collFacilitadors = null;

            $this->collTrabajadors = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Persona::setDeleted()
     * @see Persona::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPersonaQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaTableMap::DATABASE_NAME);
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
                PersonaTableMap::addInstanceToPool($this);
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

            if ($this->aEscolaridad !== null) {
                if ($this->aEscolaridad->isModified() || $this->aEscolaridad->isNew()) {
                    $affectedRows += $this->aEscolaridad->save($con);
                }
                $this->setEscolaridad($this->aEscolaridad);
            }

            if ($this->aEstadoCivil !== null) {
                if ($this->aEstadoCivil->isModified() || $this->aEstadoCivil->isNew()) {
                    $affectedRows += $this->aEstadoCivil->save($con);
                }
                $this->setEstadoCivil($this->aEstadoCivil);
            }

            if ($this->aPais !== null) {
                if ($this->aPais->isModified() || $this->aPais->isNew()) {
                    $affectedRows += $this->aPais->save($con);
                }
                $this->setPais($this->aPais);
            }

            if ($this->aTIdentificador !== null) {
                if ($this->aTIdentificador->isModified() || $this->aTIdentificador->isNew()) {
                    $affectedRows += $this->aTIdentificador->save($con);
                }
                $this->setTIdentificador($this->aTIdentificador);
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

            if ($this->direccionsScheduledForDeletion !== null) {
                if (!$this->direccionsScheduledForDeletion->isEmpty()) {
                    \DireccionQuery::create()
                        ->filterByPrimaryKeys($this->direccionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->direccionsScheduledForDeletion = null;
                }
            }

            if ($this->collDireccions !== null) {
                foreach ($this->collDireccions as $referrerFK) {
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

        $this->modifiedColumns[PersonaTableMap::COL_PERS_CODIGO] = true;
        if (null !== $this->pers_codigo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PersonaTableMap::COL_PERS_CODIGO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'pers_codigo';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_T_IDENTIFICADOR)) {
            $modifiedColumns[':p' . $index++]  = 'pers_t_identificador';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_IDENTIFICADOR)) {
            $modifiedColumns[':p' . $index++]  = 'pers_identificador';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_DV)) {
            $modifiedColumns[':p' . $index++]  = 'pers_dv';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_NOMBRE1)) {
            $modifiedColumns[':p' . $index++]  = 'pers_nombre1';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_NOMBRE2)) {
            $modifiedColumns[':p' . $index++]  = 'pers_nombre2';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_APELLIDO_PATERNO)) {
            $modifiedColumns[':p' . $index++]  = 'pers_apellido_paterno';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_APELLIDO_MATERNO)) {
            $modifiedColumns[':p' . $index++]  = 'pers_apellido_materno';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_SEXO)) {
            $modifiedColumns[':p' . $index++]  = 'pers_sexo';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_FECHA_NACIMIENTO)) {
            $modifiedColumns[':p' . $index++]  = 'pers_fecha_nacimiento';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_C_ESTADO_CIVIL)) {
            $modifiedColumns[':p' . $index++]  = 'pers_c_estado_civil';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_C_ESCOLARIDAD)) {
            $modifiedColumns[':p' . $index++]  = 'pers_c_escolaridad';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_C_PAIS_ORIGEN)) {
            $modifiedColumns[':p' . $index++]  = 'pers_c_pais_origen';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'pers_email';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_MOVIL)) {
            $modifiedColumns[':p' . $index++]  = 'pers_movil';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_TITULO)) {
            $modifiedColumns[':p' . $index++]  = 'pers_titulo';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_GRADO)) {
            $modifiedColumns[':p' . $index++]  = 'pers_grado';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_R_FECHA_CREACION)) {
            $modifiedColumns[':p' . $index++]  = 'pers_r_fecha_creacion';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_R_FECHA_MODIFICACION)) {
            $modifiedColumns[':p' . $index++]  = 'pers_r_fecha_modificacion';
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_R_USUARIO)) {
            $modifiedColumns[':p' . $index++]  = 'pers_r_usuario';
        }

        $sql = sprintf(
            'INSERT INTO persona (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'pers_codigo':
                        $stmt->bindValue($identifier, $this->pers_codigo, PDO::PARAM_INT);
                        break;
                    case 'pers_t_identificador':
                        $stmt->bindValue($identifier, $this->pers_t_identificador, PDO::PARAM_INT);
                        break;
                    case 'pers_identificador':
                        $stmt->bindValue($identifier, $this->pers_identificador, PDO::PARAM_INT);
                        break;
                    case 'pers_dv':
                        $stmt->bindValue($identifier, $this->pers_dv, PDO::PARAM_STR);
                        break;
                    case 'pers_nombre1':
                        $stmt->bindValue($identifier, $this->pers_nombre1, PDO::PARAM_STR);
                        break;
                    case 'pers_nombre2':
                        $stmt->bindValue($identifier, $this->pers_nombre2, PDO::PARAM_STR);
                        break;
                    case 'pers_apellido_paterno':
                        $stmt->bindValue($identifier, $this->pers_apellido_paterno, PDO::PARAM_STR);
                        break;
                    case 'pers_apellido_materno':
                        $stmt->bindValue($identifier, $this->pers_apellido_materno, PDO::PARAM_STR);
                        break;
                    case 'pers_sexo':
                        $stmt->bindValue($identifier, $this->pers_sexo, PDO::PARAM_STR);
                        break;
                    case 'pers_fecha_nacimiento':
                        $stmt->bindValue($identifier, $this->pers_fecha_nacimiento, PDO::PARAM_STR);
                        break;
                    case 'pers_c_estado_civil':
                        $stmt->bindValue($identifier, $this->pers_c_estado_civil, PDO::PARAM_INT);
                        break;
                    case 'pers_c_escolaridad':
                        $stmt->bindValue($identifier, $this->pers_c_escolaridad, PDO::PARAM_INT);
                        break;
                    case 'pers_c_pais_origen':
                        $stmt->bindValue($identifier, $this->pers_c_pais_origen, PDO::PARAM_INT);
                        break;
                    case 'pers_email':
                        $stmt->bindValue($identifier, $this->pers_email, PDO::PARAM_STR);
                        break;
                    case 'pers_movil':
                        $stmt->bindValue($identifier, $this->pers_movil, PDO::PARAM_STR);
                        break;
                    case 'pers_titulo':
                        $stmt->bindValue($identifier, $this->pers_titulo, PDO::PARAM_STR);
                        break;
                    case 'pers_grado':
                        $stmt->bindValue($identifier, $this->pers_grado, PDO::PARAM_STR);
                        break;
                    case 'pers_r_fecha_creacion':
                        $stmt->bindValue($identifier, $this->pers_r_fecha_creacion ? $this->pers_r_fecha_creacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'pers_r_fecha_modificacion':
                        $stmt->bindValue($identifier, $this->pers_r_fecha_modificacion ? $this->pers_r_fecha_modificacion->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'pers_r_usuario':
                        $stmt->bindValue($identifier, $this->pers_r_usuario, PDO::PARAM_INT);
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
        $this->setPersCodigo($pk);

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
        $pos = PersonaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getPersCodigo();
                break;
            case 1:
                return $this->getPersTIdentificador();
                break;
            case 2:
                return $this->getPersIdentificador();
                break;
            case 3:
                return $this->getPersDv();
                break;
            case 4:
                return $this->getPersNombre1();
                break;
            case 5:
                return $this->getPersNombre2();
                break;
            case 6:
                return $this->getPersApellidoPaterno();
                break;
            case 7:
                return $this->getPersApellidoMaterno();
                break;
            case 8:
                return $this->getPersSexo();
                break;
            case 9:
                return $this->getPersFechaNacimiento();
                break;
            case 10:
                return $this->getPersCEstadoCivil();
                break;
            case 11:
                return $this->getPersCEscolaridad();
                break;
            case 12:
                return $this->getPersCPaisOrigen();
                break;
            case 13:
                return $this->getPersEmail();
                break;
            case 14:
                return $this->getPersMovil();
                break;
            case 15:
                return $this->getPersTitulo();
                break;
            case 16:
                return $this->getPersGrado();
                break;
            case 17:
                return $this->getPersRFechaCreacion();
                break;
            case 18:
                return $this->getPersRFechaModificacion();
                break;
            case 19:
                return $this->getPersRUsuario();
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

        if (isset($alreadyDumpedObjects['Persona'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Persona'][$this->hashCode()] = true;
        $keys = PersonaTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPersCodigo(),
            $keys[1] => $this->getPersTIdentificador(),
            $keys[2] => $this->getPersIdentificador(),
            $keys[3] => $this->getPersDv(),
            $keys[4] => $this->getPersNombre1(),
            $keys[5] => $this->getPersNombre2(),
            $keys[6] => $this->getPersApellidoPaterno(),
            $keys[7] => $this->getPersApellidoMaterno(),
            $keys[8] => $this->getPersSexo(),
            $keys[9] => $this->getPersFechaNacimiento(),
            $keys[10] => $this->getPersCEstadoCivil(),
            $keys[11] => $this->getPersCEscolaridad(),
            $keys[12] => $this->getPersCPaisOrigen(),
            $keys[13] => $this->getPersEmail(),
            $keys[14] => $this->getPersMovil(),
            $keys[15] => $this->getPersTitulo(),
            $keys[16] => $this->getPersGrado(),
            $keys[17] => $this->getPersRFechaCreacion(),
            $keys[18] => $this->getPersRFechaModificacion(),
            $keys[19] => $this->getPersRUsuario(),
        );
        if ($result[$keys[17]] instanceof \DateTimeInterface) {
            $result[$keys[17]] = $result[$keys[17]]->format('c');
        }

        if ($result[$keys[18]] instanceof \DateTimeInterface) {
            $result[$keys[18]] = $result[$keys[18]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aEscolaridad) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'escolaridad';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'escolaridad';
                        break;
                    default:
                        $key = 'Escolaridad';
                }

                $result[$key] = $this->aEscolaridad->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEstadoCivil) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'estadoCivil';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'estado_civil';
                        break;
                    default:
                        $key = 'EstadoCivil';
                }

                $result[$key] = $this->aEstadoCivil->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->aTIdentificador) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tIdentificador';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 't_identificador';
                        break;
                    default:
                        $key = 'TIdentificador';
                }

                $result[$key] = $this->aTIdentificador->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDireccions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'direccions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'direccions';
                        break;
                    default:
                        $key = 'Direccions';
                }

                $result[$key] = $this->collDireccions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Persona
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PersonaTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Persona
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setPersCodigo($value);
                break;
            case 1:
                $this->setPersTIdentificador($value);
                break;
            case 2:
                $this->setPersIdentificador($value);
                break;
            case 3:
                $this->setPersDv($value);
                break;
            case 4:
                $this->setPersNombre1($value);
                break;
            case 5:
                $this->setPersNombre2($value);
                break;
            case 6:
                $this->setPersApellidoPaterno($value);
                break;
            case 7:
                $this->setPersApellidoMaterno($value);
                break;
            case 8:
                $this->setPersSexo($value);
                break;
            case 9:
                $this->setPersFechaNacimiento($value);
                break;
            case 10:
                $this->setPersCEstadoCivil($value);
                break;
            case 11:
                $this->setPersCEscolaridad($value);
                break;
            case 12:
                $this->setPersCPaisOrigen($value);
                break;
            case 13:
                $this->setPersEmail($value);
                break;
            case 14:
                $this->setPersMovil($value);
                break;
            case 15:
                $this->setPersTitulo($value);
                break;
            case 16:
                $this->setPersGrado($value);
                break;
            case 17:
                $this->setPersRFechaCreacion($value);
                break;
            case 18:
                $this->setPersRFechaModificacion($value);
                break;
            case 19:
                $this->setPersRUsuario($value);
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
        $keys = PersonaTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setPersCodigo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setPersTIdentificador($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPersIdentificador($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPersDv($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPersNombre1($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPersNombre2($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPersApellidoPaterno($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPersApellidoMaterno($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPersSexo($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPersFechaNacimiento($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setPersCEstadoCivil($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setPersCEscolaridad($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPersCPaisOrigen($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setPersEmail($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPersMovil($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setPersTitulo($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setPersGrado($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setPersRFechaCreacion($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setPersRFechaModificacion($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setPersRUsuario($arr[$keys[19]]);
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
     * @return $this|\Persona The current object, for fluid interface
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
        $criteria = new Criteria(PersonaTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PersonaTableMap::COL_PERS_CODIGO)) {
            $criteria->add(PersonaTableMap::COL_PERS_CODIGO, $this->pers_codigo);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_T_IDENTIFICADOR)) {
            $criteria->add(PersonaTableMap::COL_PERS_T_IDENTIFICADOR, $this->pers_t_identificador);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_IDENTIFICADOR)) {
            $criteria->add(PersonaTableMap::COL_PERS_IDENTIFICADOR, $this->pers_identificador);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_DV)) {
            $criteria->add(PersonaTableMap::COL_PERS_DV, $this->pers_dv);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_NOMBRE1)) {
            $criteria->add(PersonaTableMap::COL_PERS_NOMBRE1, $this->pers_nombre1);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_NOMBRE2)) {
            $criteria->add(PersonaTableMap::COL_PERS_NOMBRE2, $this->pers_nombre2);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_APELLIDO_PATERNO)) {
            $criteria->add(PersonaTableMap::COL_PERS_APELLIDO_PATERNO, $this->pers_apellido_paterno);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_APELLIDO_MATERNO)) {
            $criteria->add(PersonaTableMap::COL_PERS_APELLIDO_MATERNO, $this->pers_apellido_materno);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_SEXO)) {
            $criteria->add(PersonaTableMap::COL_PERS_SEXO, $this->pers_sexo);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_FECHA_NACIMIENTO)) {
            $criteria->add(PersonaTableMap::COL_PERS_FECHA_NACIMIENTO, $this->pers_fecha_nacimiento);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_C_ESTADO_CIVIL)) {
            $criteria->add(PersonaTableMap::COL_PERS_C_ESTADO_CIVIL, $this->pers_c_estado_civil);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_C_ESCOLARIDAD)) {
            $criteria->add(PersonaTableMap::COL_PERS_C_ESCOLARIDAD, $this->pers_c_escolaridad);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_C_PAIS_ORIGEN)) {
            $criteria->add(PersonaTableMap::COL_PERS_C_PAIS_ORIGEN, $this->pers_c_pais_origen);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_EMAIL)) {
            $criteria->add(PersonaTableMap::COL_PERS_EMAIL, $this->pers_email);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_MOVIL)) {
            $criteria->add(PersonaTableMap::COL_PERS_MOVIL, $this->pers_movil);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_TITULO)) {
            $criteria->add(PersonaTableMap::COL_PERS_TITULO, $this->pers_titulo);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_GRADO)) {
            $criteria->add(PersonaTableMap::COL_PERS_GRADO, $this->pers_grado);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_R_FECHA_CREACION)) {
            $criteria->add(PersonaTableMap::COL_PERS_R_FECHA_CREACION, $this->pers_r_fecha_creacion);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_R_FECHA_MODIFICACION)) {
            $criteria->add(PersonaTableMap::COL_PERS_R_FECHA_MODIFICACION, $this->pers_r_fecha_modificacion);
        }
        if ($this->isColumnModified(PersonaTableMap::COL_PERS_R_USUARIO)) {
            $criteria->add(PersonaTableMap::COL_PERS_R_USUARIO, $this->pers_r_usuario);
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
        $criteria = ChildPersonaQuery::create();
        $criteria->add(PersonaTableMap::COL_PERS_CODIGO, $this->pers_codigo);

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
        $validPk = null !== $this->getPersCodigo();

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
        return $this->getPersCodigo();
    }

    /**
     * Generic method to set the primary key (pers_codigo column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPersCodigo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getPersCodigo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Persona (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPersTIdentificador($this->getPersTIdentificador());
        $copyObj->setPersIdentificador($this->getPersIdentificador());
        $copyObj->setPersDv($this->getPersDv());
        $copyObj->setPersNombre1($this->getPersNombre1());
        $copyObj->setPersNombre2($this->getPersNombre2());
        $copyObj->setPersApellidoPaterno($this->getPersApellidoPaterno());
        $copyObj->setPersApellidoMaterno($this->getPersApellidoMaterno());
        $copyObj->setPersSexo($this->getPersSexo());
        $copyObj->setPersFechaNacimiento($this->getPersFechaNacimiento());
        $copyObj->setPersCEstadoCivil($this->getPersCEstadoCivil());
        $copyObj->setPersCEscolaridad($this->getPersCEscolaridad());
        $copyObj->setPersCPaisOrigen($this->getPersCPaisOrigen());
        $copyObj->setPersEmail($this->getPersEmail());
        $copyObj->setPersMovil($this->getPersMovil());
        $copyObj->setPersTitulo($this->getPersTitulo());
        $copyObj->setPersGrado($this->getPersGrado());
        $copyObj->setPersRFechaCreacion($this->getPersRFechaCreacion());
        $copyObj->setPersRFechaModificacion($this->getPersRFechaModificacion());
        $copyObj->setPersRUsuario($this->getPersRUsuario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getDireccions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDireccion($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFacilitadors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFacilitador($relObj->copy($deepCopy));
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
            $copyObj->setPersCodigo(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Persona Clone of current object.
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
     * Declares an association between this object and a ChildEscolaridad object.
     *
     * @param  ChildEscolaridad $v
     * @return $this|\Persona The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEscolaridad(ChildEscolaridad $v = null)
    {
        if ($v === null) {
            $this->setPersCEscolaridad(NULL);
        } else {
            $this->setPersCEscolaridad($v->getEscoCodigo());
        }

        $this->aEscolaridad = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEscolaridad object, it will not be re-added.
        if ($v !== null) {
            $v->addPersona($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEscolaridad object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEscolaridad The associated ChildEscolaridad object.
     * @throws PropelException
     */
    public function getEscolaridad(ConnectionInterface $con = null)
    {
        if ($this->aEscolaridad === null && ($this->pers_c_escolaridad != 0)) {
            $this->aEscolaridad = ChildEscolaridadQuery::create()->findPk($this->pers_c_escolaridad, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEscolaridad->addPersonas($this);
             */
        }

        return $this->aEscolaridad;
    }

    /**
     * Declares an association between this object and a ChildEstadoCivil object.
     *
     * @param  ChildEstadoCivil $v
     * @return $this|\Persona The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEstadoCivil(ChildEstadoCivil $v = null)
    {
        if ($v === null) {
            $this->setPersCEstadoCivil(NULL);
        } else {
            $this->setPersCEstadoCivil($v->getEsciCodigo());
        }

        $this->aEstadoCivil = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEstadoCivil object, it will not be re-added.
        if ($v !== null) {
            $v->addPersona($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEstadoCivil object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEstadoCivil The associated ChildEstadoCivil object.
     * @throws PropelException
     */
    public function getEstadoCivil(ConnectionInterface $con = null)
    {
        if ($this->aEstadoCivil === null && ($this->pers_c_estado_civil != 0)) {
            $this->aEstadoCivil = ChildEstadoCivilQuery::create()->findPk($this->pers_c_estado_civil, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEstadoCivil->addPersonas($this);
             */
        }

        return $this->aEstadoCivil;
    }

    /**
     * Declares an association between this object and a ChildPais object.
     *
     * @param  ChildPais $v
     * @return $this|\Persona The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPais(ChildPais $v = null)
    {
        if ($v === null) {
            $this->setPersCPaisOrigen(NULL);
        } else {
            $this->setPersCPaisOrigen($v->getPaisCodigo());
        }

        $this->aPais = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPais object, it will not be re-added.
        if ($v !== null) {
            $v->addPersona($this);
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
        if ($this->aPais === null && ($this->pers_c_pais_origen != 0)) {
            $this->aPais = ChildPaisQuery::create()->findPk($this->pers_c_pais_origen, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPais->addPersonas($this);
             */
        }

        return $this->aPais;
    }

    /**
     * Declares an association between this object and a ChildTIdentificador object.
     *
     * @param  ChildTIdentificador $v
     * @return $this|\Persona The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTIdentificador(ChildTIdentificador $v = null)
    {
        if ($v === null) {
            $this->setPersTIdentificador(NULL);
        } else {
            $this->setPersTIdentificador($v->getTideTipo());
        }

        $this->aTIdentificador = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTIdentificador object, it will not be re-added.
        if ($v !== null) {
            $v->addPersona($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTIdentificador object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTIdentificador The associated ChildTIdentificador object.
     * @throws PropelException
     */
    public function getTIdentificador(ConnectionInterface $con = null)
    {
        if ($this->aTIdentificador === null && ($this->pers_t_identificador != 0)) {
            $this->aTIdentificador = ChildTIdentificadorQuery::create()->findPk($this->pers_t_identificador, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTIdentificador->addPersonas($this);
             */
        }

        return $this->aTIdentificador;
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
        if ('Direccion' == $relationName) {
            $this->initDireccions();
            return;
        }
        if ('Facilitador' == $relationName) {
            $this->initFacilitadors();
            return;
        }
        if ('Trabajador' == $relationName) {
            $this->initTrabajadors();
            return;
        }
    }

    /**
     * Clears out the collDireccions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDireccions()
     */
    public function clearDireccions()
    {
        $this->collDireccions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDireccions collection loaded partially.
     */
    public function resetPartialDireccions($v = true)
    {
        $this->collDireccionsPartial = $v;
    }

    /**
     * Initializes the collDireccions collection.
     *
     * By default this just sets the collDireccions collection to an empty array (like clearcollDireccions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDireccions($overrideExisting = true)
    {
        if (null !== $this->collDireccions && !$overrideExisting) {
            return;
        }

        $collectionClassName = DireccionTableMap::getTableMap()->getCollectionClassName();

        $this->collDireccions = new $collectionClassName;
        $this->collDireccions->setModel('\Direccion');
    }

    /**
     * Gets an array of ChildDireccion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPersona is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDireccion[] List of ChildDireccion objects
     * @throws PropelException
     */
    public function getDireccions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDireccionsPartial && !$this->isNew();
        if (null === $this->collDireccions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDireccions) {
                // return empty collection
                $this->initDireccions();
            } else {
                $collDireccions = ChildDireccionQuery::create(null, $criteria)
                    ->filterByPersona($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDireccionsPartial && count($collDireccions)) {
                        $this->initDireccions(false);

                        foreach ($collDireccions as $obj) {
                            if (false == $this->collDireccions->contains($obj)) {
                                $this->collDireccions->append($obj);
                            }
                        }

                        $this->collDireccionsPartial = true;
                    }

                    return $collDireccions;
                }

                if ($partial && $this->collDireccions) {
                    foreach ($this->collDireccions as $obj) {
                        if ($obj->isNew()) {
                            $collDireccions[] = $obj;
                        }
                    }
                }

                $this->collDireccions = $collDireccions;
                $this->collDireccionsPartial = false;
            }
        }

        return $this->collDireccions;
    }

    /**
     * Sets a collection of ChildDireccion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $direccions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPersona The current object (for fluent API support)
     */
    public function setDireccions(Collection $direccions, ConnectionInterface $con = null)
    {
        /** @var ChildDireccion[] $direccionsToDelete */
        $direccionsToDelete = $this->getDireccions(new Criteria(), $con)->diff($direccions);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->direccionsScheduledForDeletion = clone $direccionsToDelete;

        foreach ($direccionsToDelete as $direccionRemoved) {
            $direccionRemoved->setPersona(null);
        }

        $this->collDireccions = null;
        foreach ($direccions as $direccion) {
            $this->addDireccion($direccion);
        }

        $this->collDireccions = $direccions;
        $this->collDireccionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Direccion objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Direccion objects.
     * @throws PropelException
     */
    public function countDireccions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDireccionsPartial && !$this->isNew();
        if (null === $this->collDireccions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDireccions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDireccions());
            }

            $query = ChildDireccionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersona($this)
                ->count($con);
        }

        return count($this->collDireccions);
    }

    /**
     * Method called to associate a ChildDireccion object to this object
     * through the ChildDireccion foreign key attribute.
     *
     * @param  ChildDireccion $l ChildDireccion
     * @return $this|\Persona The current object (for fluent API support)
     */
    public function addDireccion(ChildDireccion $l)
    {
        if ($this->collDireccions === null) {
            $this->initDireccions();
            $this->collDireccionsPartial = true;
        }

        if (!$this->collDireccions->contains($l)) {
            $this->doAddDireccion($l);

            if ($this->direccionsScheduledForDeletion and $this->direccionsScheduledForDeletion->contains($l)) {
                $this->direccionsScheduledForDeletion->remove($this->direccionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDireccion $direccion The ChildDireccion object to add.
     */
    protected function doAddDireccion(ChildDireccion $direccion)
    {
        $this->collDireccions[]= $direccion;
        $direccion->setPersona($this);
    }

    /**
     * @param  ChildDireccion $direccion The ChildDireccion object to remove.
     * @return $this|ChildPersona The current object (for fluent API support)
     */
    public function removeDireccion(ChildDireccion $direccion)
    {
        if ($this->getDireccions()->contains($direccion)) {
            $pos = $this->collDireccions->search($direccion);
            $this->collDireccions->remove($pos);
            if (null === $this->direccionsScheduledForDeletion) {
                $this->direccionsScheduledForDeletion = clone $this->collDireccions;
                $this->direccionsScheduledForDeletion->clear();
            }
            $this->direccionsScheduledForDeletion[]= clone $direccion;
            $direccion->setPersona(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related Direccions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDireccion[] List of ChildDireccion objects
     */
    public function getDireccionsJoinComuna(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDireccionQuery::create(null, $criteria);
        $query->joinWith('Comuna', $joinBehavior);

        return $this->getDireccions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related Direccions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDireccion[] List of ChildDireccion objects
     */
    public function getDireccionsJoinPais(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDireccionQuery::create(null, $criteria);
        $query->joinWith('Pais', $joinBehavior);

        return $this->getDireccions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related Direccions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDireccion[] List of ChildDireccion objects
     */
    public function getDireccionsJoinTDireccion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDireccionQuery::create(null, $criteria);
        $query->joinWith('TDireccion', $joinBehavior);

        return $this->getDireccions($query, $con);
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
     * If this ChildPersona is new, it will return
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
                    ->filterByPersona($this)
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
     * @return $this|ChildPersona The current object (for fluent API support)
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
            $facilitadorRemoved->setPersona(null);
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
                ->filterByPersona($this)
                ->count($con);
        }

        return count($this->collFacilitadors);
    }

    /**
     * Method called to associate a ChildFacilitador object to this object
     * through the ChildFacilitador foreign key attribute.
     *
     * @param  ChildFacilitador $l ChildFacilitador
     * @return $this|\Persona The current object (for fluent API support)
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
        $facilitador->setPersona($this);
    }

    /**
     * @param  ChildFacilitador $facilitador The ChildFacilitador object to remove.
     * @return $this|ChildPersona The current object (for fluent API support)
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
            $facilitador->setPersona(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related Facilitadors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildFacilitador[] List of ChildFacilitador objects
     */
    public function getFacilitadorsJoinDictacion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildFacilitadorQuery::create(null, $criteria);
        $query->joinWith('Dictacion', $joinBehavior);

        return $this->getFacilitadors($query, $con);
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
     * If this ChildPersona is new, it will return
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
                    ->filterByPersona($this)
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
     * @return $this|ChildPersona The current object (for fluent API support)
     */
    public function setTrabajadors(Collection $trabajadors, ConnectionInterface $con = null)
    {
        /** @var ChildTrabajador[] $trabajadorsToDelete */
        $trabajadorsToDelete = $this->getTrabajadors(new Criteria(), $con)->diff($trabajadors);


        $this->trabajadorsScheduledForDeletion = $trabajadorsToDelete;

        foreach ($trabajadorsToDelete as $trabajadorRemoved) {
            $trabajadorRemoved->setPersona(null);
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
                ->filterByPersona($this)
                ->count($con);
        }

        return count($this->collTrabajadors);
    }

    /**
     * Method called to associate a ChildTrabajador object to this object
     * through the ChildTrabajador foreign key attribute.
     *
     * @param  ChildTrabajador $l ChildTrabajador
     * @return $this|\Persona The current object (for fluent API support)
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
        $trabajador->setPersona($this);
    }

    /**
     * @param  ChildTrabajador $trabajador The ChildTrabajador object to remove.
     * @return $this|ChildPersona The current object (for fluent API support)
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
            $trabajador->setPersona(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related Trabajadors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
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
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related Trabajadors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
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
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related Trabajadors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTrabajador[] List of ChildTrabajador objects
     */
    public function getTrabajadorsJoinCargo(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTrabajadorQuery::create(null, $criteria);
        $query->joinWith('Cargo', $joinBehavior);

        return $this->getTrabajadors($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related Trabajadors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aEscolaridad) {
            $this->aEscolaridad->removePersona($this);
        }
        if (null !== $this->aEstadoCivil) {
            $this->aEstadoCivil->removePersona($this);
        }
        if (null !== $this->aPais) {
            $this->aPais->removePersona($this);
        }
        if (null !== $this->aTIdentificador) {
            $this->aTIdentificador->removePersona($this);
        }
        $this->pers_codigo = null;
        $this->pers_t_identificador = null;
        $this->pers_identificador = null;
        $this->pers_dv = null;
        $this->pers_nombre1 = null;
        $this->pers_nombre2 = null;
        $this->pers_apellido_paterno = null;
        $this->pers_apellido_materno = null;
        $this->pers_sexo = null;
        $this->pers_fecha_nacimiento = null;
        $this->pers_c_estado_civil = null;
        $this->pers_c_escolaridad = null;
        $this->pers_c_pais_origen = null;
        $this->pers_email = null;
        $this->pers_movil = null;
        $this->pers_titulo = null;
        $this->pers_grado = null;
        $this->pers_r_fecha_creacion = null;
        $this->pers_r_fecha_modificacion = null;
        $this->pers_r_usuario = null;
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
            if ($this->collDireccions) {
                foreach ($this->collDireccions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFacilitadors) {
                foreach ($this->collFacilitadors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTrabajadors) {
                foreach ($this->collTrabajadors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collDireccions = null;
        $this->collFacilitadors = null;
        $this->collTrabajadors = null;
        $this->aEscolaridad = null;
        $this->aEstadoCivil = null;
        $this->aPais = null;
        $this->aTIdentificador = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PersonaTableMap::DEFAULT_STRING_FORMAT);
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
