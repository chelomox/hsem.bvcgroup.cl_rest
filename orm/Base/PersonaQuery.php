<?php

namespace Base;

use \Persona as ChildPersona;
use \PersonaQuery as ChildPersonaQuery;
use \Exception;
use \PDO;
use Map\PersonaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'persona' table.
 *
 *
 *
 * @method     ChildPersonaQuery orderByPersCodigo($order = Criteria::ASC) Order by the pers_codigo column
 * @method     ChildPersonaQuery orderByPersTIdentificador($order = Criteria::ASC) Order by the pers_t_identificador column
 * @method     ChildPersonaQuery orderByPersIdentificador($order = Criteria::ASC) Order by the pers_identificador column
 * @method     ChildPersonaQuery orderByPersDv($order = Criteria::ASC) Order by the pers_dv column
 * @method     ChildPersonaQuery orderByPersNombre1($order = Criteria::ASC) Order by the pers_nombre1 column
 * @method     ChildPersonaQuery orderByPersNombre2($order = Criteria::ASC) Order by the pers_nombre2 column
 * @method     ChildPersonaQuery orderByPersApellidoPaterno($order = Criteria::ASC) Order by the pers_apellido_paterno column
 * @method     ChildPersonaQuery orderByPersApellidoMaterno($order = Criteria::ASC) Order by the pers_apellido_materno column
 * @method     ChildPersonaQuery orderByPersSexo($order = Criteria::ASC) Order by the pers_sexo column
 * @method     ChildPersonaQuery orderByPersFechaNacimiento($order = Criteria::ASC) Order by the pers_fecha_nacimiento column
 * @method     ChildPersonaQuery orderByPersCEstadoCivil($order = Criteria::ASC) Order by the pers_c_estado_civil column
 * @method     ChildPersonaQuery orderByPersCEscolaridad($order = Criteria::ASC) Order by the pers_c_escolaridad column
 * @method     ChildPersonaQuery orderByPersCPaisOrigen($order = Criteria::ASC) Order by the pers_c_pais_origen column
 * @method     ChildPersonaQuery orderByPersEmail($order = Criteria::ASC) Order by the pers_email column
 * @method     ChildPersonaQuery orderByPersMovil($order = Criteria::ASC) Order by the pers_movil column
 * @method     ChildPersonaQuery orderByPersTitulo($order = Criteria::ASC) Order by the pers_titulo column
 * @method     ChildPersonaQuery orderByPersGrado($order = Criteria::ASC) Order by the pers_grado column
 * @method     ChildPersonaQuery orderByPersRFechaCreacion($order = Criteria::ASC) Order by the pers_r_fecha_creacion column
 * @method     ChildPersonaQuery orderByPersRFechaModificacion($order = Criteria::ASC) Order by the pers_r_fecha_modificacion column
 * @method     ChildPersonaQuery orderByPersRUsuario($order = Criteria::ASC) Order by the pers_r_usuario column
 *
 * @method     ChildPersonaQuery groupByPersCodigo() Group by the pers_codigo column
 * @method     ChildPersonaQuery groupByPersTIdentificador() Group by the pers_t_identificador column
 * @method     ChildPersonaQuery groupByPersIdentificador() Group by the pers_identificador column
 * @method     ChildPersonaQuery groupByPersDv() Group by the pers_dv column
 * @method     ChildPersonaQuery groupByPersNombre1() Group by the pers_nombre1 column
 * @method     ChildPersonaQuery groupByPersNombre2() Group by the pers_nombre2 column
 * @method     ChildPersonaQuery groupByPersApellidoPaterno() Group by the pers_apellido_paterno column
 * @method     ChildPersonaQuery groupByPersApellidoMaterno() Group by the pers_apellido_materno column
 * @method     ChildPersonaQuery groupByPersSexo() Group by the pers_sexo column
 * @method     ChildPersonaQuery groupByPersFechaNacimiento() Group by the pers_fecha_nacimiento column
 * @method     ChildPersonaQuery groupByPersCEstadoCivil() Group by the pers_c_estado_civil column
 * @method     ChildPersonaQuery groupByPersCEscolaridad() Group by the pers_c_escolaridad column
 * @method     ChildPersonaQuery groupByPersCPaisOrigen() Group by the pers_c_pais_origen column
 * @method     ChildPersonaQuery groupByPersEmail() Group by the pers_email column
 * @method     ChildPersonaQuery groupByPersMovil() Group by the pers_movil column
 * @method     ChildPersonaQuery groupByPersTitulo() Group by the pers_titulo column
 * @method     ChildPersonaQuery groupByPersGrado() Group by the pers_grado column
 * @method     ChildPersonaQuery groupByPersRFechaCreacion() Group by the pers_r_fecha_creacion column
 * @method     ChildPersonaQuery groupByPersRFechaModificacion() Group by the pers_r_fecha_modificacion column
 * @method     ChildPersonaQuery groupByPersRUsuario() Group by the pers_r_usuario column
 *
 * @method     ChildPersonaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPersonaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPersonaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPersonaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPersonaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPersonaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPersonaQuery leftJoinEscolaridad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Escolaridad relation
 * @method     ChildPersonaQuery rightJoinEscolaridad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Escolaridad relation
 * @method     ChildPersonaQuery innerJoinEscolaridad($relationAlias = null) Adds a INNER JOIN clause to the query using the Escolaridad relation
 *
 * @method     ChildPersonaQuery joinWithEscolaridad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Escolaridad relation
 *
 * @method     ChildPersonaQuery leftJoinWithEscolaridad() Adds a LEFT JOIN clause and with to the query using the Escolaridad relation
 * @method     ChildPersonaQuery rightJoinWithEscolaridad() Adds a RIGHT JOIN clause and with to the query using the Escolaridad relation
 * @method     ChildPersonaQuery innerJoinWithEscolaridad() Adds a INNER JOIN clause and with to the query using the Escolaridad relation
 *
 * @method     ChildPersonaQuery leftJoinEstadoCivil($relationAlias = null) Adds a LEFT JOIN clause to the query using the EstadoCivil relation
 * @method     ChildPersonaQuery rightJoinEstadoCivil($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EstadoCivil relation
 * @method     ChildPersonaQuery innerJoinEstadoCivil($relationAlias = null) Adds a INNER JOIN clause to the query using the EstadoCivil relation
 *
 * @method     ChildPersonaQuery joinWithEstadoCivil($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EstadoCivil relation
 *
 * @method     ChildPersonaQuery leftJoinWithEstadoCivil() Adds a LEFT JOIN clause and with to the query using the EstadoCivil relation
 * @method     ChildPersonaQuery rightJoinWithEstadoCivil() Adds a RIGHT JOIN clause and with to the query using the EstadoCivil relation
 * @method     ChildPersonaQuery innerJoinWithEstadoCivil() Adds a INNER JOIN clause and with to the query using the EstadoCivil relation
 *
 * @method     ChildPersonaQuery leftJoinPais($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pais relation
 * @method     ChildPersonaQuery rightJoinPais($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pais relation
 * @method     ChildPersonaQuery innerJoinPais($relationAlias = null) Adds a INNER JOIN clause to the query using the Pais relation
 *
 * @method     ChildPersonaQuery joinWithPais($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pais relation
 *
 * @method     ChildPersonaQuery leftJoinWithPais() Adds a LEFT JOIN clause and with to the query using the Pais relation
 * @method     ChildPersonaQuery rightJoinWithPais() Adds a RIGHT JOIN clause and with to the query using the Pais relation
 * @method     ChildPersonaQuery innerJoinWithPais() Adds a INNER JOIN clause and with to the query using the Pais relation
 *
 * @method     ChildPersonaQuery leftJoinTIdentificador($relationAlias = null) Adds a LEFT JOIN clause to the query using the TIdentificador relation
 * @method     ChildPersonaQuery rightJoinTIdentificador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TIdentificador relation
 * @method     ChildPersonaQuery innerJoinTIdentificador($relationAlias = null) Adds a INNER JOIN clause to the query using the TIdentificador relation
 *
 * @method     ChildPersonaQuery joinWithTIdentificador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TIdentificador relation
 *
 * @method     ChildPersonaQuery leftJoinWithTIdentificador() Adds a LEFT JOIN clause and with to the query using the TIdentificador relation
 * @method     ChildPersonaQuery rightJoinWithTIdentificador() Adds a RIGHT JOIN clause and with to the query using the TIdentificador relation
 * @method     ChildPersonaQuery innerJoinWithTIdentificador() Adds a INNER JOIN clause and with to the query using the TIdentificador relation
 *
 * @method     ChildPersonaQuery leftJoinDireccion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Direccion relation
 * @method     ChildPersonaQuery rightJoinDireccion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Direccion relation
 * @method     ChildPersonaQuery innerJoinDireccion($relationAlias = null) Adds a INNER JOIN clause to the query using the Direccion relation
 *
 * @method     ChildPersonaQuery joinWithDireccion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Direccion relation
 *
 * @method     ChildPersonaQuery leftJoinWithDireccion() Adds a LEFT JOIN clause and with to the query using the Direccion relation
 * @method     ChildPersonaQuery rightJoinWithDireccion() Adds a RIGHT JOIN clause and with to the query using the Direccion relation
 * @method     ChildPersonaQuery innerJoinWithDireccion() Adds a INNER JOIN clause and with to the query using the Direccion relation
 *
 * @method     ChildPersonaQuery leftJoinFacilitador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Facilitador relation
 * @method     ChildPersonaQuery rightJoinFacilitador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Facilitador relation
 * @method     ChildPersonaQuery innerJoinFacilitador($relationAlias = null) Adds a INNER JOIN clause to the query using the Facilitador relation
 *
 * @method     ChildPersonaQuery joinWithFacilitador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Facilitador relation
 *
 * @method     ChildPersonaQuery leftJoinWithFacilitador() Adds a LEFT JOIN clause and with to the query using the Facilitador relation
 * @method     ChildPersonaQuery rightJoinWithFacilitador() Adds a RIGHT JOIN clause and with to the query using the Facilitador relation
 * @method     ChildPersonaQuery innerJoinWithFacilitador() Adds a INNER JOIN clause and with to the query using the Facilitador relation
 *
 * @method     ChildPersonaQuery leftJoinTrabajador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trabajador relation
 * @method     ChildPersonaQuery rightJoinTrabajador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trabajador relation
 * @method     ChildPersonaQuery innerJoinTrabajador($relationAlias = null) Adds a INNER JOIN clause to the query using the Trabajador relation
 *
 * @method     ChildPersonaQuery joinWithTrabajador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Trabajador relation
 *
 * @method     ChildPersonaQuery leftJoinWithTrabajador() Adds a LEFT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildPersonaQuery rightJoinWithTrabajador() Adds a RIGHT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildPersonaQuery innerJoinWithTrabajador() Adds a INNER JOIN clause and with to the query using the Trabajador relation
 *
 * @method     \EscolaridadQuery|\EstadoCivilQuery|\PaisQuery|\TIdentificadorQuery|\DireccionQuery|\FacilitadorQuery|\TrabajadorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPersona findOne(ConnectionInterface $con = null) Return the first ChildPersona matching the query
 * @method     ChildPersona findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPersona matching the query, or a new ChildPersona object populated from the query conditions when no match is found
 *
 * @method     ChildPersona findOneByPersCodigo(int $pers_codigo) Return the first ChildPersona filtered by the pers_codigo column
 * @method     ChildPersona findOneByPersTIdentificador(int $pers_t_identificador) Return the first ChildPersona filtered by the pers_t_identificador column
 * @method     ChildPersona findOneByPersIdentificador(int $pers_identificador) Return the first ChildPersona filtered by the pers_identificador column
 * @method     ChildPersona findOneByPersDv(string $pers_dv) Return the first ChildPersona filtered by the pers_dv column
 * @method     ChildPersona findOneByPersNombre1(string $pers_nombre1) Return the first ChildPersona filtered by the pers_nombre1 column
 * @method     ChildPersona findOneByPersNombre2(string $pers_nombre2) Return the first ChildPersona filtered by the pers_nombre2 column
 * @method     ChildPersona findOneByPersApellidoPaterno(string $pers_apellido_paterno) Return the first ChildPersona filtered by the pers_apellido_paterno column
 * @method     ChildPersona findOneByPersApellidoMaterno(string $pers_apellido_materno) Return the first ChildPersona filtered by the pers_apellido_materno column
 * @method     ChildPersona findOneByPersSexo(string $pers_sexo) Return the first ChildPersona filtered by the pers_sexo column
 * @method     ChildPersona findOneByPersFechaNacimiento(string $pers_fecha_nacimiento) Return the first ChildPersona filtered by the pers_fecha_nacimiento column
 * @method     ChildPersona findOneByPersCEstadoCivil(int $pers_c_estado_civil) Return the first ChildPersona filtered by the pers_c_estado_civil column
 * @method     ChildPersona findOneByPersCEscolaridad(int $pers_c_escolaridad) Return the first ChildPersona filtered by the pers_c_escolaridad column
 * @method     ChildPersona findOneByPersCPaisOrigen(int $pers_c_pais_origen) Return the first ChildPersona filtered by the pers_c_pais_origen column
 * @method     ChildPersona findOneByPersEmail(string $pers_email) Return the first ChildPersona filtered by the pers_email column
 * @method     ChildPersona findOneByPersMovil(string $pers_movil) Return the first ChildPersona filtered by the pers_movil column
 * @method     ChildPersona findOneByPersTitulo(string $pers_titulo) Return the first ChildPersona filtered by the pers_titulo column
 * @method     ChildPersona findOneByPersGrado(string $pers_grado) Return the first ChildPersona filtered by the pers_grado column
 * @method     ChildPersona findOneByPersRFechaCreacion(string $pers_r_fecha_creacion) Return the first ChildPersona filtered by the pers_r_fecha_creacion column
 * @method     ChildPersona findOneByPersRFechaModificacion(string $pers_r_fecha_modificacion) Return the first ChildPersona filtered by the pers_r_fecha_modificacion column
 * @method     ChildPersona findOneByPersRUsuario(int $pers_r_usuario) Return the first ChildPersona filtered by the pers_r_usuario column *

 * @method     ChildPersona requirePk($key, ConnectionInterface $con = null) Return the ChildPersona by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOne(ConnectionInterface $con = null) Return the first ChildPersona matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersona requireOneByPersCodigo(int $pers_codigo) Return the first ChildPersona filtered by the pers_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersTIdentificador(int $pers_t_identificador) Return the first ChildPersona filtered by the pers_t_identificador column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersIdentificador(int $pers_identificador) Return the first ChildPersona filtered by the pers_identificador column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersDv(string $pers_dv) Return the first ChildPersona filtered by the pers_dv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersNombre1(string $pers_nombre1) Return the first ChildPersona filtered by the pers_nombre1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersNombre2(string $pers_nombre2) Return the first ChildPersona filtered by the pers_nombre2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersApellidoPaterno(string $pers_apellido_paterno) Return the first ChildPersona filtered by the pers_apellido_paterno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersApellidoMaterno(string $pers_apellido_materno) Return the first ChildPersona filtered by the pers_apellido_materno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersSexo(string $pers_sexo) Return the first ChildPersona filtered by the pers_sexo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersFechaNacimiento(string $pers_fecha_nacimiento) Return the first ChildPersona filtered by the pers_fecha_nacimiento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersCEstadoCivil(int $pers_c_estado_civil) Return the first ChildPersona filtered by the pers_c_estado_civil column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersCEscolaridad(int $pers_c_escolaridad) Return the first ChildPersona filtered by the pers_c_escolaridad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersCPaisOrigen(int $pers_c_pais_origen) Return the first ChildPersona filtered by the pers_c_pais_origen column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersEmail(string $pers_email) Return the first ChildPersona filtered by the pers_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersMovil(string $pers_movil) Return the first ChildPersona filtered by the pers_movil column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersTitulo(string $pers_titulo) Return the first ChildPersona filtered by the pers_titulo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersGrado(string $pers_grado) Return the first ChildPersona filtered by the pers_grado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersRFechaCreacion(string $pers_r_fecha_creacion) Return the first ChildPersona filtered by the pers_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersRFechaModificacion(string $pers_r_fecha_modificacion) Return the first ChildPersona filtered by the pers_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersona requireOneByPersRUsuario(int $pers_r_usuario) Return the first ChildPersona filtered by the pers_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersona[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPersona objects based on current ModelCriteria
 * @method     ChildPersona[]|ObjectCollection findByPersCodigo(int $pers_codigo) Return ChildPersona objects filtered by the pers_codigo column
 * @method     ChildPersona[]|ObjectCollection findByPersTIdentificador(int $pers_t_identificador) Return ChildPersona objects filtered by the pers_t_identificador column
 * @method     ChildPersona[]|ObjectCollection findByPersIdentificador(int $pers_identificador) Return ChildPersona objects filtered by the pers_identificador column
 * @method     ChildPersona[]|ObjectCollection findByPersDv(string $pers_dv) Return ChildPersona objects filtered by the pers_dv column
 * @method     ChildPersona[]|ObjectCollection findByPersNombre1(string $pers_nombre1) Return ChildPersona objects filtered by the pers_nombre1 column
 * @method     ChildPersona[]|ObjectCollection findByPersNombre2(string $pers_nombre2) Return ChildPersona objects filtered by the pers_nombre2 column
 * @method     ChildPersona[]|ObjectCollection findByPersApellidoPaterno(string $pers_apellido_paterno) Return ChildPersona objects filtered by the pers_apellido_paterno column
 * @method     ChildPersona[]|ObjectCollection findByPersApellidoMaterno(string $pers_apellido_materno) Return ChildPersona objects filtered by the pers_apellido_materno column
 * @method     ChildPersona[]|ObjectCollection findByPersSexo(string $pers_sexo) Return ChildPersona objects filtered by the pers_sexo column
 * @method     ChildPersona[]|ObjectCollection findByPersFechaNacimiento(string $pers_fecha_nacimiento) Return ChildPersona objects filtered by the pers_fecha_nacimiento column
 * @method     ChildPersona[]|ObjectCollection findByPersCEstadoCivil(int $pers_c_estado_civil) Return ChildPersona objects filtered by the pers_c_estado_civil column
 * @method     ChildPersona[]|ObjectCollection findByPersCEscolaridad(int $pers_c_escolaridad) Return ChildPersona objects filtered by the pers_c_escolaridad column
 * @method     ChildPersona[]|ObjectCollection findByPersCPaisOrigen(int $pers_c_pais_origen) Return ChildPersona objects filtered by the pers_c_pais_origen column
 * @method     ChildPersona[]|ObjectCollection findByPersEmail(string $pers_email) Return ChildPersona objects filtered by the pers_email column
 * @method     ChildPersona[]|ObjectCollection findByPersMovil(string $pers_movil) Return ChildPersona objects filtered by the pers_movil column
 * @method     ChildPersona[]|ObjectCollection findByPersTitulo(string $pers_titulo) Return ChildPersona objects filtered by the pers_titulo column
 * @method     ChildPersona[]|ObjectCollection findByPersGrado(string $pers_grado) Return ChildPersona objects filtered by the pers_grado column
 * @method     ChildPersona[]|ObjectCollection findByPersRFechaCreacion(string $pers_r_fecha_creacion) Return ChildPersona objects filtered by the pers_r_fecha_creacion column
 * @method     ChildPersona[]|ObjectCollection findByPersRFechaModificacion(string $pers_r_fecha_modificacion) Return ChildPersona objects filtered by the pers_r_fecha_modificacion column
 * @method     ChildPersona[]|ObjectCollection findByPersRUsuario(int $pers_r_usuario) Return ChildPersona objects filtered by the pers_r_usuario column
 * @method     ChildPersona[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PersonaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PersonaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Persona', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPersonaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPersonaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPersonaQuery) {
            return $criteria;
        }
        $query = new ChildPersonaQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPersona|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PersonaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PersonaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPersona A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT pers_codigo, pers_t_identificador, pers_identificador, pers_dv, pers_nombre1, pers_nombre2, pers_apellido_paterno, pers_apellido_materno, pers_sexo, pers_fecha_nacimiento, pers_c_estado_civil, pers_c_escolaridad, pers_c_pais_origen, pers_email, pers_movil, pers_titulo, pers_grado, pers_r_fecha_creacion, pers_r_fecha_modificacion, pers_r_usuario FROM persona WHERE pers_codigo = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPersona $obj */
            $obj = new ChildPersona();
            $obj->hydrate($row);
            PersonaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPersona|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pers_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByPersCodigo(1234); // WHERE pers_codigo = 1234
     * $query->filterByPersCodigo(array(12, 34)); // WHERE pers_codigo IN (12, 34)
     * $query->filterByPersCodigo(array('min' => 12)); // WHERE pers_codigo > 12
     * </code>
     *
     * @param     mixed $persCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersCodigo($persCodigo = null, $comparison = null)
    {
        if (is_array($persCodigo)) {
            $useMinMax = false;
            if (isset($persCodigo['min'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_CODIGO, $persCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persCodigo['max'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_CODIGO, $persCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_CODIGO, $persCodigo, $comparison);
    }

    /**
     * Filter the query on the pers_t_identificador column
     *
     * Example usage:
     * <code>
     * $query->filterByPersTIdentificador(1234); // WHERE pers_t_identificador = 1234
     * $query->filterByPersTIdentificador(array(12, 34)); // WHERE pers_t_identificador IN (12, 34)
     * $query->filterByPersTIdentificador(array('min' => 12)); // WHERE pers_t_identificador > 12
     * </code>
     *
     * @see       filterByTIdentificador()
     *
     * @param     mixed $persTIdentificador The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersTIdentificador($persTIdentificador = null, $comparison = null)
    {
        if (is_array($persTIdentificador)) {
            $useMinMax = false;
            if (isset($persTIdentificador['min'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_T_IDENTIFICADOR, $persTIdentificador['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persTIdentificador['max'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_T_IDENTIFICADOR, $persTIdentificador['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_T_IDENTIFICADOR, $persTIdentificador, $comparison);
    }

    /**
     * Filter the query on the pers_identificador column
     *
     * Example usage:
     * <code>
     * $query->filterByPersIdentificador(1234); // WHERE pers_identificador = 1234
     * $query->filterByPersIdentificador(array(12, 34)); // WHERE pers_identificador IN (12, 34)
     * $query->filterByPersIdentificador(array('min' => 12)); // WHERE pers_identificador > 12
     * </code>
     *
     * @param     mixed $persIdentificador The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersIdentificador($persIdentificador = null, $comparison = null)
    {
        if (is_array($persIdentificador)) {
            $useMinMax = false;
            if (isset($persIdentificador['min'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_IDENTIFICADOR, $persIdentificador['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persIdentificador['max'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_IDENTIFICADOR, $persIdentificador['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_IDENTIFICADOR, $persIdentificador, $comparison);
    }

    /**
     * Filter the query on the pers_dv column
     *
     * Example usage:
     * <code>
     * $query->filterByPersDv('fooValue');   // WHERE pers_dv = 'fooValue'
     * $query->filterByPersDv('%fooValue%', Criteria::LIKE); // WHERE pers_dv LIKE '%fooValue%'
     * </code>
     *
     * @param     string $persDv The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersDv($persDv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($persDv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_DV, $persDv, $comparison);
    }

    /**
     * Filter the query on the pers_nombre1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPersNombre1('fooValue');   // WHERE pers_nombre1 = 'fooValue'
     * $query->filterByPersNombre1('%fooValue%', Criteria::LIKE); // WHERE pers_nombre1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $persNombre1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersNombre1($persNombre1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($persNombre1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_NOMBRE1, $persNombre1, $comparison);
    }

    /**
     * Filter the query on the pers_nombre2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPersNombre2('fooValue');   // WHERE pers_nombre2 = 'fooValue'
     * $query->filterByPersNombre2('%fooValue%', Criteria::LIKE); // WHERE pers_nombre2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $persNombre2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersNombre2($persNombre2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($persNombre2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_NOMBRE2, $persNombre2, $comparison);
    }

    /**
     * Filter the query on the pers_apellido_paterno column
     *
     * Example usage:
     * <code>
     * $query->filterByPersApellidoPaterno('fooValue');   // WHERE pers_apellido_paterno = 'fooValue'
     * $query->filterByPersApellidoPaterno('%fooValue%', Criteria::LIKE); // WHERE pers_apellido_paterno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $persApellidoPaterno The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersApellidoPaterno($persApellidoPaterno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($persApellidoPaterno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_APELLIDO_PATERNO, $persApellidoPaterno, $comparison);
    }

    /**
     * Filter the query on the pers_apellido_materno column
     *
     * Example usage:
     * <code>
     * $query->filterByPersApellidoMaterno('fooValue');   // WHERE pers_apellido_materno = 'fooValue'
     * $query->filterByPersApellidoMaterno('%fooValue%', Criteria::LIKE); // WHERE pers_apellido_materno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $persApellidoMaterno The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersApellidoMaterno($persApellidoMaterno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($persApellidoMaterno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_APELLIDO_MATERNO, $persApellidoMaterno, $comparison);
    }

    /**
     * Filter the query on the pers_sexo column
     *
     * Example usage:
     * <code>
     * $query->filterByPersSexo('fooValue');   // WHERE pers_sexo = 'fooValue'
     * $query->filterByPersSexo('%fooValue%', Criteria::LIKE); // WHERE pers_sexo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $persSexo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersSexo($persSexo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($persSexo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_SEXO, $persSexo, $comparison);
    }

    /**
     * Filter the query on the pers_fecha_nacimiento column
     *
     * Example usage:
     * <code>
     * $query->filterByPersFechaNacimiento('fooValue');   // WHERE pers_fecha_nacimiento = 'fooValue'
     * $query->filterByPersFechaNacimiento('%fooValue%', Criteria::LIKE); // WHERE pers_fecha_nacimiento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $persFechaNacimiento The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersFechaNacimiento($persFechaNacimiento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($persFechaNacimiento)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_FECHA_NACIMIENTO, $persFechaNacimiento, $comparison);
    }

    /**
     * Filter the query on the pers_c_estado_civil column
     *
     * Example usage:
     * <code>
     * $query->filterByPersCEstadoCivil(1234); // WHERE pers_c_estado_civil = 1234
     * $query->filterByPersCEstadoCivil(array(12, 34)); // WHERE pers_c_estado_civil IN (12, 34)
     * $query->filterByPersCEstadoCivil(array('min' => 12)); // WHERE pers_c_estado_civil > 12
     * </code>
     *
     * @see       filterByEstadoCivil()
     *
     * @param     mixed $persCEstadoCivil The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersCEstadoCivil($persCEstadoCivil = null, $comparison = null)
    {
        if (is_array($persCEstadoCivil)) {
            $useMinMax = false;
            if (isset($persCEstadoCivil['min'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_C_ESTADO_CIVIL, $persCEstadoCivil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persCEstadoCivil['max'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_C_ESTADO_CIVIL, $persCEstadoCivil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_C_ESTADO_CIVIL, $persCEstadoCivil, $comparison);
    }

    /**
     * Filter the query on the pers_c_escolaridad column
     *
     * Example usage:
     * <code>
     * $query->filterByPersCEscolaridad(1234); // WHERE pers_c_escolaridad = 1234
     * $query->filterByPersCEscolaridad(array(12, 34)); // WHERE pers_c_escolaridad IN (12, 34)
     * $query->filterByPersCEscolaridad(array('min' => 12)); // WHERE pers_c_escolaridad > 12
     * </code>
     *
     * @see       filterByEscolaridad()
     *
     * @param     mixed $persCEscolaridad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersCEscolaridad($persCEscolaridad = null, $comparison = null)
    {
        if (is_array($persCEscolaridad)) {
            $useMinMax = false;
            if (isset($persCEscolaridad['min'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_C_ESCOLARIDAD, $persCEscolaridad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persCEscolaridad['max'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_C_ESCOLARIDAD, $persCEscolaridad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_C_ESCOLARIDAD, $persCEscolaridad, $comparison);
    }

    /**
     * Filter the query on the pers_c_pais_origen column
     *
     * Example usage:
     * <code>
     * $query->filterByPersCPaisOrigen(1234); // WHERE pers_c_pais_origen = 1234
     * $query->filterByPersCPaisOrigen(array(12, 34)); // WHERE pers_c_pais_origen IN (12, 34)
     * $query->filterByPersCPaisOrigen(array('min' => 12)); // WHERE pers_c_pais_origen > 12
     * </code>
     *
     * @see       filterByPais()
     *
     * @param     mixed $persCPaisOrigen The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersCPaisOrigen($persCPaisOrigen = null, $comparison = null)
    {
        if (is_array($persCPaisOrigen)) {
            $useMinMax = false;
            if (isset($persCPaisOrigen['min'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_C_PAIS_ORIGEN, $persCPaisOrigen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persCPaisOrigen['max'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_C_PAIS_ORIGEN, $persCPaisOrigen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_C_PAIS_ORIGEN, $persCPaisOrigen, $comparison);
    }

    /**
     * Filter the query on the pers_email column
     *
     * Example usage:
     * <code>
     * $query->filterByPersEmail('fooValue');   // WHERE pers_email = 'fooValue'
     * $query->filterByPersEmail('%fooValue%', Criteria::LIKE); // WHERE pers_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $persEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersEmail($persEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($persEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_EMAIL, $persEmail, $comparison);
    }

    /**
     * Filter the query on the pers_movil column
     *
     * Example usage:
     * <code>
     * $query->filterByPersMovil('fooValue');   // WHERE pers_movil = 'fooValue'
     * $query->filterByPersMovil('%fooValue%', Criteria::LIKE); // WHERE pers_movil LIKE '%fooValue%'
     * </code>
     *
     * @param     string $persMovil The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersMovil($persMovil = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($persMovil)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_MOVIL, $persMovil, $comparison);
    }

    /**
     * Filter the query on the pers_titulo column
     *
     * Example usage:
     * <code>
     * $query->filterByPersTitulo('fooValue');   // WHERE pers_titulo = 'fooValue'
     * $query->filterByPersTitulo('%fooValue%', Criteria::LIKE); // WHERE pers_titulo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $persTitulo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersTitulo($persTitulo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($persTitulo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_TITULO, $persTitulo, $comparison);
    }

    /**
     * Filter the query on the pers_grado column
     *
     * Example usage:
     * <code>
     * $query->filterByPersGrado('fooValue');   // WHERE pers_grado = 'fooValue'
     * $query->filterByPersGrado('%fooValue%', Criteria::LIKE); // WHERE pers_grado LIKE '%fooValue%'
     * </code>
     *
     * @param     string $persGrado The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersGrado($persGrado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($persGrado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_GRADO, $persGrado, $comparison);
    }

    /**
     * Filter the query on the pers_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByPersRFechaCreacion('2011-03-14'); // WHERE pers_r_fecha_creacion = '2011-03-14'
     * $query->filterByPersRFechaCreacion('now'); // WHERE pers_r_fecha_creacion = '2011-03-14'
     * $query->filterByPersRFechaCreacion(array('max' => 'yesterday')); // WHERE pers_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $persRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersRFechaCreacion($persRFechaCreacion = null, $comparison = null)
    {
        if (is_array($persRFechaCreacion)) {
            $useMinMax = false;
            if (isset($persRFechaCreacion['min'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_R_FECHA_CREACION, $persRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persRFechaCreacion['max'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_R_FECHA_CREACION, $persRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_R_FECHA_CREACION, $persRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the pers_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByPersRFechaModificacion('2011-03-14'); // WHERE pers_r_fecha_modificacion = '2011-03-14'
     * $query->filterByPersRFechaModificacion('now'); // WHERE pers_r_fecha_modificacion = '2011-03-14'
     * $query->filterByPersRFechaModificacion(array('max' => 'yesterday')); // WHERE pers_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $persRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersRFechaModificacion($persRFechaModificacion = null, $comparison = null)
    {
        if (is_array($persRFechaModificacion)) {
            $useMinMax = false;
            if (isset($persRFechaModificacion['min'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_R_FECHA_MODIFICACION, $persRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persRFechaModificacion['max'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_R_FECHA_MODIFICACION, $persRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_R_FECHA_MODIFICACION, $persRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the pers_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByPersRUsuario(1234); // WHERE pers_r_usuario = 1234
     * $query->filterByPersRUsuario(array(12, 34)); // WHERE pers_r_usuario IN (12, 34)
     * $query->filterByPersRUsuario(array('min' => 12)); // WHERE pers_r_usuario > 12
     * </code>
     *
     * @param     mixed $persRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPersRUsuario($persRUsuario = null, $comparison = null)
    {
        if (is_array($persRUsuario)) {
            $useMinMax = false;
            if (isset($persRUsuario['min'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_R_USUARIO, $persRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persRUsuario['max'])) {
                $this->addUsingAlias(PersonaTableMap::COL_PERS_R_USUARIO, $persRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaTableMap::COL_PERS_R_USUARIO, $persRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Escolaridad object
     *
     * @param \Escolaridad|ObjectCollection $escolaridad The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByEscolaridad($escolaridad, $comparison = null)
    {
        if ($escolaridad instanceof \Escolaridad) {
            return $this
                ->addUsingAlias(PersonaTableMap::COL_PERS_C_ESCOLARIDAD, $escolaridad->getEscoCodigo(), $comparison);
        } elseif ($escolaridad instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonaTableMap::COL_PERS_C_ESCOLARIDAD, $escolaridad->toKeyValue('PrimaryKey', 'EscoCodigo'), $comparison);
        } else {
            throw new PropelException('filterByEscolaridad() only accepts arguments of type \Escolaridad or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Escolaridad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function joinEscolaridad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Escolaridad');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Escolaridad');
        }

        return $this;
    }

    /**
     * Use the Escolaridad relation Escolaridad object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EscolaridadQuery A secondary query class using the current class as primary query
     */
    public function useEscolaridadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEscolaridad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Escolaridad', '\EscolaridadQuery');
    }

    /**
     * Filter the query by a related \EstadoCivil object
     *
     * @param \EstadoCivil|ObjectCollection $estadoCivil The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByEstadoCivil($estadoCivil, $comparison = null)
    {
        if ($estadoCivil instanceof \EstadoCivil) {
            return $this
                ->addUsingAlias(PersonaTableMap::COL_PERS_C_ESTADO_CIVIL, $estadoCivil->getEsciCodigo(), $comparison);
        } elseif ($estadoCivil instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonaTableMap::COL_PERS_C_ESTADO_CIVIL, $estadoCivil->toKeyValue('PrimaryKey', 'EsciCodigo'), $comparison);
        } else {
            throw new PropelException('filterByEstadoCivil() only accepts arguments of type \EstadoCivil or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EstadoCivil relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function joinEstadoCivil($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EstadoCivil');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'EstadoCivil');
        }

        return $this;
    }

    /**
     * Use the EstadoCivil relation EstadoCivil object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EstadoCivilQuery A secondary query class using the current class as primary query
     */
    public function useEstadoCivilQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEstadoCivil($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EstadoCivil', '\EstadoCivilQuery');
    }

    /**
     * Filter the query by a related \Pais object
     *
     * @param \Pais|ObjectCollection $pais The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByPais($pais, $comparison = null)
    {
        if ($pais instanceof \Pais) {
            return $this
                ->addUsingAlias(PersonaTableMap::COL_PERS_C_PAIS_ORIGEN, $pais->getPaisCodigo(), $comparison);
        } elseif ($pais instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonaTableMap::COL_PERS_C_PAIS_ORIGEN, $pais->toKeyValue('PrimaryKey', 'PaisCodigo'), $comparison);
        } else {
            throw new PropelException('filterByPais() only accepts arguments of type \Pais or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pais relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function joinPais($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pais');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Pais');
        }

        return $this;
    }

    /**
     * Use the Pais relation Pais object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PaisQuery A secondary query class using the current class as primary query
     */
    public function usePaisQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPais($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pais', '\PaisQuery');
    }

    /**
     * Filter the query by a related \TIdentificador object
     *
     * @param \TIdentificador|ObjectCollection $tIdentificador The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByTIdentificador($tIdentificador, $comparison = null)
    {
        if ($tIdentificador instanceof \TIdentificador) {
            return $this
                ->addUsingAlias(PersonaTableMap::COL_PERS_T_IDENTIFICADOR, $tIdentificador->getTideTipo(), $comparison);
        } elseif ($tIdentificador instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonaTableMap::COL_PERS_T_IDENTIFICADOR, $tIdentificador->toKeyValue('PrimaryKey', 'TideTipo'), $comparison);
        } else {
            throw new PropelException('filterByTIdentificador() only accepts arguments of type \TIdentificador or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TIdentificador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function joinTIdentificador($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TIdentificador');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'TIdentificador');
        }

        return $this;
    }

    /**
     * Use the TIdentificador relation TIdentificador object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TIdentificadorQuery A secondary query class using the current class as primary query
     */
    public function useTIdentificadorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTIdentificador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TIdentificador', '\TIdentificadorQuery');
    }

    /**
     * Filter the query by a related \Direccion object
     *
     * @param \Direccion|ObjectCollection $direccion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion, $comparison = null)
    {
        if ($direccion instanceof \Direccion) {
            return $this
                ->addUsingAlias(PersonaTableMap::COL_PERS_CODIGO, $direccion->getDireCPersona(), $comparison);
        } elseif ($direccion instanceof ObjectCollection) {
            return $this
                ->useDireccionQuery()
                ->filterByPrimaryKeys($direccion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDireccion() only accepts arguments of type \Direccion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Direccion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function joinDireccion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Direccion');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Direccion');
        }

        return $this;
    }

    /**
     * Use the Direccion relation Direccion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DireccionQuery A secondary query class using the current class as primary query
     */
    public function useDireccionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDireccion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Direccion', '\DireccionQuery');
    }

    /**
     * Filter the query by a related \Facilitador object
     *
     * @param \Facilitador|ObjectCollection $facilitador the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByFacilitador($facilitador, $comparison = null)
    {
        if ($facilitador instanceof \Facilitador) {
            return $this
                ->addUsingAlias(PersonaTableMap::COL_PERS_CODIGO, $facilitador->getFaciCPersona(), $comparison);
        } elseif ($facilitador instanceof ObjectCollection) {
            return $this
                ->useFacilitadorQuery()
                ->filterByPrimaryKeys($facilitador->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFacilitador() only accepts arguments of type \Facilitador or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Facilitador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function joinFacilitador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Facilitador');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Facilitador');
        }

        return $this;
    }

    /**
     * Use the Facilitador relation Facilitador object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FacilitadorQuery A secondary query class using the current class as primary query
     */
    public function useFacilitadorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFacilitador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Facilitador', '\FacilitadorQuery');
    }

    /**
     * Filter the query by a related \Trabajador object
     *
     * @param \Trabajador|ObjectCollection $trabajador the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersonaQuery The current query, for fluid interface
     */
    public function filterByTrabajador($trabajador, $comparison = null)
    {
        if ($trabajador instanceof \Trabajador) {
            return $this
                ->addUsingAlias(PersonaTableMap::COL_PERS_CODIGO, $trabajador->getTrabCPersona(), $comparison);
        } elseif ($trabajador instanceof ObjectCollection) {
            return $this
                ->useTrabajadorQuery()
                ->filterByPrimaryKeys($trabajador->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrabajador() only accepts arguments of type \Trabajador or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Trabajador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function joinTrabajador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Trabajador');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Trabajador');
        }

        return $this;
    }

    /**
     * Use the Trabajador relation Trabajador object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TrabajadorQuery A secondary query class using the current class as primary query
     */
    public function useTrabajadorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrabajador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Trabajador', '\TrabajadorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPersona $persona Object to remove from the list of results
     *
     * @return $this|ChildPersonaQuery The current query, for fluid interface
     */
    public function prune($persona = null)
    {
        if ($persona) {
            $this->addUsingAlias(PersonaTableMap::COL_PERS_CODIGO, $persona->getPersCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the persona table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PersonaTableMap::clearInstancePool();
            PersonaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PersonaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PersonaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PersonaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PersonaQuery
