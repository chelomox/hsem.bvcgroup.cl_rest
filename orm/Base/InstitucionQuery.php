<?php

namespace Base;

use \Institucion as ChildInstitucion;
use \InstitucionQuery as ChildInstitucionQuery;
use \Exception;
use \PDO;
use Map\InstitucionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'institucion' table.
 *
 *
 *
 * @method     ChildInstitucionQuery orderByInstCodigo($order = Criteria::ASC) Order by the inst_codigo column
 * @method     ChildInstitucionQuery orderByInstIdentificador($order = Criteria::ASC) Order by the inst_identificador column
 * @method     ChildInstitucionQuery orderByInstDv($order = Criteria::ASC) Order by the inst_dv column
 * @method     ChildInstitucionQuery orderByInstNombre($order = Criteria::ASC) Order by the inst_nombre column
 * @method     ChildInstitucionQuery orderByInstTInstitucion($order = Criteria::ASC) Order by the inst_t_institucion column
 * @method     ChildInstitucionQuery orderByInstCComuna($order = Criteria::ASC) Order by the inst_c_comuna column
 * @method     ChildInstitucionQuery orderByInstCPais($order = Criteria::ASC) Order by the inst_c_pais column
 * @method     ChildInstitucionQuery orderByInstTelefono($order = Criteria::ASC) Order by the inst_telefono column
 * @method     ChildInstitucionQuery orderByInstEmail($order = Criteria::ASC) Order by the inst_email column
 * @method     ChildInstitucionQuery orderByInstTratamiento($order = Criteria::ASC) Order by the inst_tratamiento column
 * @method     ChildInstitucionQuery orderByInstDireccion($order = Criteria::ASC) Order by the inst_direccion column
 * @method     ChildInstitucionQuery orderByInstGiro($order = Criteria::ASC) Order by the inst_giro column
 * @method     ChildInstitucionQuery orderByInstRFechaCreacion($order = Criteria::ASC) Order by the inst_r_fecha_creacion column
 * @method     ChildInstitucionQuery orderByInstRFechaModificacion($order = Criteria::ASC) Order by the inst_r_fecha_modificacion column
 * @method     ChildInstitucionQuery orderByInstRUsuario($order = Criteria::ASC) Order by the inst_r_usuario column
 *
 * @method     ChildInstitucionQuery groupByInstCodigo() Group by the inst_codigo column
 * @method     ChildInstitucionQuery groupByInstIdentificador() Group by the inst_identificador column
 * @method     ChildInstitucionQuery groupByInstDv() Group by the inst_dv column
 * @method     ChildInstitucionQuery groupByInstNombre() Group by the inst_nombre column
 * @method     ChildInstitucionQuery groupByInstTInstitucion() Group by the inst_t_institucion column
 * @method     ChildInstitucionQuery groupByInstCComuna() Group by the inst_c_comuna column
 * @method     ChildInstitucionQuery groupByInstCPais() Group by the inst_c_pais column
 * @method     ChildInstitucionQuery groupByInstTelefono() Group by the inst_telefono column
 * @method     ChildInstitucionQuery groupByInstEmail() Group by the inst_email column
 * @method     ChildInstitucionQuery groupByInstTratamiento() Group by the inst_tratamiento column
 * @method     ChildInstitucionQuery groupByInstDireccion() Group by the inst_direccion column
 * @method     ChildInstitucionQuery groupByInstGiro() Group by the inst_giro column
 * @method     ChildInstitucionQuery groupByInstRFechaCreacion() Group by the inst_r_fecha_creacion column
 * @method     ChildInstitucionQuery groupByInstRFechaModificacion() Group by the inst_r_fecha_modificacion column
 * @method     ChildInstitucionQuery groupByInstRUsuario() Group by the inst_r_usuario column
 *
 * @method     ChildInstitucionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInstitucionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInstitucionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInstitucionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInstitucionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInstitucionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInstitucionQuery leftJoinTInstitucion($relationAlias = null) Adds a LEFT JOIN clause to the query using the TInstitucion relation
 * @method     ChildInstitucionQuery rightJoinTInstitucion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TInstitucion relation
 * @method     ChildInstitucionQuery innerJoinTInstitucion($relationAlias = null) Adds a INNER JOIN clause to the query using the TInstitucion relation
 *
 * @method     ChildInstitucionQuery joinWithTInstitucion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TInstitucion relation
 *
 * @method     ChildInstitucionQuery leftJoinWithTInstitucion() Adds a LEFT JOIN clause and with to the query using the TInstitucion relation
 * @method     ChildInstitucionQuery rightJoinWithTInstitucion() Adds a RIGHT JOIN clause and with to the query using the TInstitucion relation
 * @method     ChildInstitucionQuery innerJoinWithTInstitucion() Adds a INNER JOIN clause and with to the query using the TInstitucion relation
 *
 * @method     ChildInstitucionQuery leftJoinArea($relationAlias = null) Adds a LEFT JOIN clause to the query using the Area relation
 * @method     ChildInstitucionQuery rightJoinArea($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Area relation
 * @method     ChildInstitucionQuery innerJoinArea($relationAlias = null) Adds a INNER JOIN clause to the query using the Area relation
 *
 * @method     ChildInstitucionQuery joinWithArea($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Area relation
 *
 * @method     ChildInstitucionQuery leftJoinWithArea() Adds a LEFT JOIN clause and with to the query using the Area relation
 * @method     ChildInstitucionQuery rightJoinWithArea() Adds a RIGHT JOIN clause and with to the query using the Area relation
 * @method     ChildInstitucionQuery innerJoinWithArea() Adds a INNER JOIN clause and with to the query using the Area relation
 *
 * @method     ChildInstitucionQuery leftJoinEspecialidad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Especialidad relation
 * @method     ChildInstitucionQuery rightJoinEspecialidad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Especialidad relation
 * @method     ChildInstitucionQuery innerJoinEspecialidad($relationAlias = null) Adds a INNER JOIN clause to the query using the Especialidad relation
 *
 * @method     ChildInstitucionQuery joinWithEspecialidad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Especialidad relation
 *
 * @method     ChildInstitucionQuery leftJoinWithEspecialidad() Adds a LEFT JOIN clause and with to the query using the Especialidad relation
 * @method     ChildInstitucionQuery rightJoinWithEspecialidad() Adds a RIGHT JOIN clause and with to the query using the Especialidad relation
 * @method     ChildInstitucionQuery innerJoinWithEspecialidad() Adds a INNER JOIN clause and with to the query using the Especialidad relation
 *
 * @method     ChildInstitucionQuery leftJoinGerencia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Gerencia relation
 * @method     ChildInstitucionQuery rightJoinGerencia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Gerencia relation
 * @method     ChildInstitucionQuery innerJoinGerencia($relationAlias = null) Adds a INNER JOIN clause to the query using the Gerencia relation
 *
 * @method     ChildInstitucionQuery joinWithGerencia($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Gerencia relation
 *
 * @method     ChildInstitucionQuery leftJoinWithGerencia() Adds a LEFT JOIN clause and with to the query using the Gerencia relation
 * @method     ChildInstitucionQuery rightJoinWithGerencia() Adds a RIGHT JOIN clause and with to the query using the Gerencia relation
 * @method     ChildInstitucionQuery innerJoinWithGerencia() Adds a INNER JOIN clause and with to the query using the Gerencia relation
 *
 * @method     \TInstitucionQuery|\AreaQuery|\EspecialidadQuery|\GerenciaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInstitucion findOne(ConnectionInterface $con = null) Return the first ChildInstitucion matching the query
 * @method     ChildInstitucion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInstitucion matching the query, or a new ChildInstitucion object populated from the query conditions when no match is found
 *
 * @method     ChildInstitucion findOneByInstCodigo(int $inst_codigo) Return the first ChildInstitucion filtered by the inst_codigo column
 * @method     ChildInstitucion findOneByInstIdentificador(int $inst_identificador) Return the first ChildInstitucion filtered by the inst_identificador column
 * @method     ChildInstitucion findOneByInstDv(string $inst_dv) Return the first ChildInstitucion filtered by the inst_dv column
 * @method     ChildInstitucion findOneByInstNombre(string $inst_nombre) Return the first ChildInstitucion filtered by the inst_nombre column
 * @method     ChildInstitucion findOneByInstTInstitucion(int $inst_t_institucion) Return the first ChildInstitucion filtered by the inst_t_institucion column
 * @method     ChildInstitucion findOneByInstCComuna(string $inst_c_comuna) Return the first ChildInstitucion filtered by the inst_c_comuna column
 * @method     ChildInstitucion findOneByInstCPais(string $inst_c_pais) Return the first ChildInstitucion filtered by the inst_c_pais column
 * @method     ChildInstitucion findOneByInstTelefono(string $inst_telefono) Return the first ChildInstitucion filtered by the inst_telefono column
 * @method     ChildInstitucion findOneByInstEmail(string $inst_email) Return the first ChildInstitucion filtered by the inst_email column
 * @method     ChildInstitucion findOneByInstTratamiento(string $inst_tratamiento) Return the first ChildInstitucion filtered by the inst_tratamiento column
 * @method     ChildInstitucion findOneByInstDireccion(string $inst_direccion) Return the first ChildInstitucion filtered by the inst_direccion column
 * @method     ChildInstitucion findOneByInstGiro(string $inst_giro) Return the first ChildInstitucion filtered by the inst_giro column
 * @method     ChildInstitucion findOneByInstRFechaCreacion(string $inst_r_fecha_creacion) Return the first ChildInstitucion filtered by the inst_r_fecha_creacion column
 * @method     ChildInstitucion findOneByInstRFechaModificacion(string $inst_r_fecha_modificacion) Return the first ChildInstitucion filtered by the inst_r_fecha_modificacion column
 * @method     ChildInstitucion findOneByInstRUsuario(int $inst_r_usuario) Return the first ChildInstitucion filtered by the inst_r_usuario column *

 * @method     ChildInstitucion requirePk($key, ConnectionInterface $con = null) Return the ChildInstitucion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOne(ConnectionInterface $con = null) Return the first ChildInstitucion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInstitucion requireOneByInstCodigo(int $inst_codigo) Return the first ChildInstitucion filtered by the inst_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstIdentificador(int $inst_identificador) Return the first ChildInstitucion filtered by the inst_identificador column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstDv(string $inst_dv) Return the first ChildInstitucion filtered by the inst_dv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstNombre(string $inst_nombre) Return the first ChildInstitucion filtered by the inst_nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstTInstitucion(int $inst_t_institucion) Return the first ChildInstitucion filtered by the inst_t_institucion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstCComuna(string $inst_c_comuna) Return the first ChildInstitucion filtered by the inst_c_comuna column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstCPais(string $inst_c_pais) Return the first ChildInstitucion filtered by the inst_c_pais column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstTelefono(string $inst_telefono) Return the first ChildInstitucion filtered by the inst_telefono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstEmail(string $inst_email) Return the first ChildInstitucion filtered by the inst_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstTratamiento(string $inst_tratamiento) Return the first ChildInstitucion filtered by the inst_tratamiento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstDireccion(string $inst_direccion) Return the first ChildInstitucion filtered by the inst_direccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstGiro(string $inst_giro) Return the first ChildInstitucion filtered by the inst_giro column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstRFechaCreacion(string $inst_r_fecha_creacion) Return the first ChildInstitucion filtered by the inst_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstRFechaModificacion(string $inst_r_fecha_modificacion) Return the first ChildInstitucion filtered by the inst_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstitucion requireOneByInstRUsuario(int $inst_r_usuario) Return the first ChildInstitucion filtered by the inst_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInstitucion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInstitucion objects based on current ModelCriteria
 * @method     ChildInstitucion[]|ObjectCollection findByInstCodigo(int $inst_codigo) Return ChildInstitucion objects filtered by the inst_codigo column
 * @method     ChildInstitucion[]|ObjectCollection findByInstIdentificador(int $inst_identificador) Return ChildInstitucion objects filtered by the inst_identificador column
 * @method     ChildInstitucion[]|ObjectCollection findByInstDv(string $inst_dv) Return ChildInstitucion objects filtered by the inst_dv column
 * @method     ChildInstitucion[]|ObjectCollection findByInstNombre(string $inst_nombre) Return ChildInstitucion objects filtered by the inst_nombre column
 * @method     ChildInstitucion[]|ObjectCollection findByInstTInstitucion(int $inst_t_institucion) Return ChildInstitucion objects filtered by the inst_t_institucion column
 * @method     ChildInstitucion[]|ObjectCollection findByInstCComuna(string $inst_c_comuna) Return ChildInstitucion objects filtered by the inst_c_comuna column
 * @method     ChildInstitucion[]|ObjectCollection findByInstCPais(string $inst_c_pais) Return ChildInstitucion objects filtered by the inst_c_pais column
 * @method     ChildInstitucion[]|ObjectCollection findByInstTelefono(string $inst_telefono) Return ChildInstitucion objects filtered by the inst_telefono column
 * @method     ChildInstitucion[]|ObjectCollection findByInstEmail(string $inst_email) Return ChildInstitucion objects filtered by the inst_email column
 * @method     ChildInstitucion[]|ObjectCollection findByInstTratamiento(string $inst_tratamiento) Return ChildInstitucion objects filtered by the inst_tratamiento column
 * @method     ChildInstitucion[]|ObjectCollection findByInstDireccion(string $inst_direccion) Return ChildInstitucion objects filtered by the inst_direccion column
 * @method     ChildInstitucion[]|ObjectCollection findByInstGiro(string $inst_giro) Return ChildInstitucion objects filtered by the inst_giro column
 * @method     ChildInstitucion[]|ObjectCollection findByInstRFechaCreacion(string $inst_r_fecha_creacion) Return ChildInstitucion objects filtered by the inst_r_fecha_creacion column
 * @method     ChildInstitucion[]|ObjectCollection findByInstRFechaModificacion(string $inst_r_fecha_modificacion) Return ChildInstitucion objects filtered by the inst_r_fecha_modificacion column
 * @method     ChildInstitucion[]|ObjectCollection findByInstRUsuario(int $inst_r_usuario) Return ChildInstitucion objects filtered by the inst_r_usuario column
 * @method     ChildInstitucion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InstitucionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\InstitucionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Institucion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInstitucionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInstitucionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInstitucionQuery) {
            return $criteria;
        }
        $query = new ChildInstitucionQuery();
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
     * @return ChildInstitucion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InstitucionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InstitucionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildInstitucion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT inst_codigo, inst_identificador, inst_dv, inst_nombre, inst_t_institucion, inst_c_comuna, inst_c_pais, inst_telefono, inst_email, inst_tratamiento, inst_direccion, inst_giro, inst_r_fecha_creacion, inst_r_fecha_modificacion, inst_r_usuario FROM institucion WHERE inst_codigo = :p0';
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
            /** @var ChildInstitucion $obj */
            $obj = new ChildInstitucion();
            $obj->hydrate($row);
            InstitucionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildInstitucion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the inst_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByInstCodigo(1234); // WHERE inst_codigo = 1234
     * $query->filterByInstCodigo(array(12, 34)); // WHERE inst_codigo IN (12, 34)
     * $query->filterByInstCodigo(array('min' => 12)); // WHERE inst_codigo > 12
     * </code>
     *
     * @param     mixed $instCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstCodigo($instCodigo = null, $comparison = null)
    {
        if (is_array($instCodigo)) {
            $useMinMax = false;
            if (isset($instCodigo['min'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_CODIGO, $instCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($instCodigo['max'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_CODIGO, $instCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_CODIGO, $instCodigo, $comparison);
    }

    /**
     * Filter the query on the inst_identificador column
     *
     * Example usage:
     * <code>
     * $query->filterByInstIdentificador(1234); // WHERE inst_identificador = 1234
     * $query->filterByInstIdentificador(array(12, 34)); // WHERE inst_identificador IN (12, 34)
     * $query->filterByInstIdentificador(array('min' => 12)); // WHERE inst_identificador > 12
     * </code>
     *
     * @param     mixed $instIdentificador The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstIdentificador($instIdentificador = null, $comparison = null)
    {
        if (is_array($instIdentificador)) {
            $useMinMax = false;
            if (isset($instIdentificador['min'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_IDENTIFICADOR, $instIdentificador['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($instIdentificador['max'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_IDENTIFICADOR, $instIdentificador['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_IDENTIFICADOR, $instIdentificador, $comparison);
    }

    /**
     * Filter the query on the inst_dv column
     *
     * Example usage:
     * <code>
     * $query->filterByInstDv('fooValue');   // WHERE inst_dv = 'fooValue'
     * $query->filterByInstDv('%fooValue%', Criteria::LIKE); // WHERE inst_dv LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instDv The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstDv($instDv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instDv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_DV, $instDv, $comparison);
    }

    /**
     * Filter the query on the inst_nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByInstNombre('fooValue');   // WHERE inst_nombre = 'fooValue'
     * $query->filterByInstNombre('%fooValue%', Criteria::LIKE); // WHERE inst_nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instNombre The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstNombre($instNombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instNombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_NOMBRE, $instNombre, $comparison);
    }

    /**
     * Filter the query on the inst_t_institucion column
     *
     * Example usage:
     * <code>
     * $query->filterByInstTInstitucion(1234); // WHERE inst_t_institucion = 1234
     * $query->filterByInstTInstitucion(array(12, 34)); // WHERE inst_t_institucion IN (12, 34)
     * $query->filterByInstTInstitucion(array('min' => 12)); // WHERE inst_t_institucion > 12
     * </code>
     *
     * @see       filterByTInstitucion()
     *
     * @param     mixed $instTInstitucion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstTInstitucion($instTInstitucion = null, $comparison = null)
    {
        if (is_array($instTInstitucion)) {
            $useMinMax = false;
            if (isset($instTInstitucion['min'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_T_INSTITUCION, $instTInstitucion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($instTInstitucion['max'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_T_INSTITUCION, $instTInstitucion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_T_INSTITUCION, $instTInstitucion, $comparison);
    }

    /**
     * Filter the query on the inst_c_comuna column
     *
     * Example usage:
     * <code>
     * $query->filterByInstCComuna('fooValue');   // WHERE inst_c_comuna = 'fooValue'
     * $query->filterByInstCComuna('%fooValue%', Criteria::LIKE); // WHERE inst_c_comuna LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instCComuna The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstCComuna($instCComuna = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instCComuna)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_C_COMUNA, $instCComuna, $comparison);
    }

    /**
     * Filter the query on the inst_c_pais column
     *
     * Example usage:
     * <code>
     * $query->filterByInstCPais('fooValue');   // WHERE inst_c_pais = 'fooValue'
     * $query->filterByInstCPais('%fooValue%', Criteria::LIKE); // WHERE inst_c_pais LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instCPais The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstCPais($instCPais = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instCPais)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_C_PAIS, $instCPais, $comparison);
    }

    /**
     * Filter the query on the inst_telefono column
     *
     * Example usage:
     * <code>
     * $query->filterByInstTelefono('fooValue');   // WHERE inst_telefono = 'fooValue'
     * $query->filterByInstTelefono('%fooValue%', Criteria::LIKE); // WHERE inst_telefono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instTelefono The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstTelefono($instTelefono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instTelefono)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_TELEFONO, $instTelefono, $comparison);
    }

    /**
     * Filter the query on the inst_email column
     *
     * Example usage:
     * <code>
     * $query->filterByInstEmail('fooValue');   // WHERE inst_email = 'fooValue'
     * $query->filterByInstEmail('%fooValue%', Criteria::LIKE); // WHERE inst_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstEmail($instEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_EMAIL, $instEmail, $comparison);
    }

    /**
     * Filter the query on the inst_tratamiento column
     *
     * Example usage:
     * <code>
     * $query->filterByInstTratamiento('fooValue');   // WHERE inst_tratamiento = 'fooValue'
     * $query->filterByInstTratamiento('%fooValue%', Criteria::LIKE); // WHERE inst_tratamiento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instTratamiento The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstTratamiento($instTratamiento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instTratamiento)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_TRATAMIENTO, $instTratamiento, $comparison);
    }

    /**
     * Filter the query on the inst_direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByInstDireccion('fooValue');   // WHERE inst_direccion = 'fooValue'
     * $query->filterByInstDireccion('%fooValue%', Criteria::LIKE); // WHERE inst_direccion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instDireccion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstDireccion($instDireccion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instDireccion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_DIRECCION, $instDireccion, $comparison);
    }

    /**
     * Filter the query on the inst_giro column
     *
     * Example usage:
     * <code>
     * $query->filterByInstGiro('fooValue');   // WHERE inst_giro = 'fooValue'
     * $query->filterByInstGiro('%fooValue%', Criteria::LIKE); // WHERE inst_giro LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instGiro The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstGiro($instGiro = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instGiro)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_GIRO, $instGiro, $comparison);
    }

    /**
     * Filter the query on the inst_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByInstRFechaCreacion('2011-03-14'); // WHERE inst_r_fecha_creacion = '2011-03-14'
     * $query->filterByInstRFechaCreacion('now'); // WHERE inst_r_fecha_creacion = '2011-03-14'
     * $query->filterByInstRFechaCreacion(array('max' => 'yesterday')); // WHERE inst_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $instRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstRFechaCreacion($instRFechaCreacion = null, $comparison = null)
    {
        if (is_array($instRFechaCreacion)) {
            $useMinMax = false;
            if (isset($instRFechaCreacion['min'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_R_FECHA_CREACION, $instRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($instRFechaCreacion['max'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_R_FECHA_CREACION, $instRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_R_FECHA_CREACION, $instRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the inst_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByInstRFechaModificacion('2011-03-14'); // WHERE inst_r_fecha_modificacion = '2011-03-14'
     * $query->filterByInstRFechaModificacion('now'); // WHERE inst_r_fecha_modificacion = '2011-03-14'
     * $query->filterByInstRFechaModificacion(array('max' => 'yesterday')); // WHERE inst_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $instRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstRFechaModificacion($instRFechaModificacion = null, $comparison = null)
    {
        if (is_array($instRFechaModificacion)) {
            $useMinMax = false;
            if (isset($instRFechaModificacion['min'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_R_FECHA_MODIFICACION, $instRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($instRFechaModificacion['max'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_R_FECHA_MODIFICACION, $instRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_R_FECHA_MODIFICACION, $instRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the inst_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByInstRUsuario(1234); // WHERE inst_r_usuario = 1234
     * $query->filterByInstRUsuario(array(12, 34)); // WHERE inst_r_usuario IN (12, 34)
     * $query->filterByInstRUsuario(array('min' => 12)); // WHERE inst_r_usuario > 12
     * </code>
     *
     * @param     mixed $instRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstRUsuario($instRUsuario = null, $comparison = null)
    {
        if (is_array($instRUsuario)) {
            $useMinMax = false;
            if (isset($instRUsuario['min'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_R_USUARIO, $instRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($instRUsuario['max'])) {
                $this->addUsingAlias(InstitucionTableMap::COL_INST_R_USUARIO, $instRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstitucionTableMap::COL_INST_R_USUARIO, $instRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \TInstitucion object
     *
     * @param \TInstitucion|ObjectCollection $tInstitucion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByTInstitucion($tInstitucion, $comparison = null)
    {
        if ($tInstitucion instanceof \TInstitucion) {
            return $this
                ->addUsingAlias(InstitucionTableMap::COL_INST_T_INSTITUCION, $tInstitucion->getTinsTipo(), $comparison);
        } elseif ($tInstitucion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InstitucionTableMap::COL_INST_T_INSTITUCION, $tInstitucion->toKeyValue('PrimaryKey', 'TinsTipo'), $comparison);
        } else {
            throw new PropelException('filterByTInstitucion() only accepts arguments of type \TInstitucion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TInstitucion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function joinTInstitucion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TInstitucion');

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
            $this->addJoinObject($join, 'TInstitucion');
        }

        return $this;
    }

    /**
     * Use the TInstitucion relation TInstitucion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TInstitucionQuery A secondary query class using the current class as primary query
     */
    public function useTInstitucionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTInstitucion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TInstitucion', '\TInstitucionQuery');
    }

    /**
     * Filter the query by a related \Area object
     *
     * @param \Area|ObjectCollection $area the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByArea($area, $comparison = null)
    {
        if ($area instanceof \Area) {
            return $this
                ->addUsingAlias(InstitucionTableMap::COL_INST_CODIGO, $area->getAreaCInstitucion(), $comparison);
        } elseif ($area instanceof ObjectCollection) {
            return $this
                ->useAreaQuery()
                ->filterByPrimaryKeys($area->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArea() only accepts arguments of type \Area or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Area relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function joinArea($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Area');

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
            $this->addJoinObject($join, 'Area');
        }

        return $this;
    }

    /**
     * Use the Area relation Area object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AreaQuery A secondary query class using the current class as primary query
     */
    public function useAreaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArea($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Area', '\AreaQuery');
    }

    /**
     * Filter the query by a related \Especialidad object
     *
     * @param \Especialidad|ObjectCollection $especialidad the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByEspecialidad($especialidad, $comparison = null)
    {
        if ($especialidad instanceof \Especialidad) {
            return $this
                ->addUsingAlias(InstitucionTableMap::COL_INST_CODIGO, $especialidad->getEspeCInstitucion(), $comparison);
        } elseif ($especialidad instanceof ObjectCollection) {
            return $this
                ->useEspecialidadQuery()
                ->filterByPrimaryKeys($especialidad->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEspecialidad() only accepts arguments of type \Especialidad or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Especialidad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function joinEspecialidad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Especialidad');

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
            $this->addJoinObject($join, 'Especialidad');
        }

        return $this;
    }

    /**
     * Use the Especialidad relation Especialidad object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EspecialidadQuery A secondary query class using the current class as primary query
     */
    public function useEspecialidadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEspecialidad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Especialidad', '\EspecialidadQuery');
    }

    /**
     * Filter the query by a related \Gerencia object
     *
     * @param \Gerencia|ObjectCollection $gerencia the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInstitucionQuery The current query, for fluid interface
     */
    public function filterByGerencia($gerencia, $comparison = null)
    {
        if ($gerencia instanceof \Gerencia) {
            return $this
                ->addUsingAlias(InstitucionTableMap::COL_INST_CODIGO, $gerencia->getGereCInstitucion(), $comparison);
        } elseif ($gerencia instanceof ObjectCollection) {
            return $this
                ->useGerenciaQuery()
                ->filterByPrimaryKeys($gerencia->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGerencia() only accepts arguments of type \Gerencia or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Gerencia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function joinGerencia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Gerencia');

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
            $this->addJoinObject($join, 'Gerencia');
        }

        return $this;
    }

    /**
     * Use the Gerencia relation Gerencia object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \GerenciaQuery A secondary query class using the current class as primary query
     */
    public function useGerenciaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinGerencia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Gerencia', '\GerenciaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInstitucion $institucion Object to remove from the list of results
     *
     * @return $this|ChildInstitucionQuery The current query, for fluid interface
     */
    public function prune($institucion = null)
    {
        if ($institucion) {
            $this->addUsingAlias(InstitucionTableMap::COL_INST_CODIGO, $institucion->getInstCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the institucion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstitucionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InstitucionTableMap::clearInstancePool();
            InstitucionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InstitucionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InstitucionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InstitucionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InstitucionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InstitucionQuery
