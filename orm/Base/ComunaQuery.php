<?php

namespace Base;

use \Comuna as ChildComuna;
use \ComunaQuery as ChildComunaQuery;
use \Exception;
use \PDO;
use Map\ComunaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'comuna' table.
 *
 *
 *
 * @method     ChildComunaQuery orderByComuCodigo($order = Criteria::ASC) Order by the comu_codigo column
 * @method     ChildComunaQuery orderByComuNombre($order = Criteria::ASC) Order by the comu_nombre column
 * @method     ChildComunaQuery orderByComuCProvincia($order = Criteria::ASC) Order by the comu_c_provincia column
 * @method     ChildComunaQuery orderByComuRFechaCreacion($order = Criteria::ASC) Order by the comu_r_fecha_creacion column
 * @method     ChildComunaQuery orderByComuRFechaModificacion($order = Criteria::ASC) Order by the comu_r_fecha_modificacion column
 * @method     ChildComunaQuery orderByComuRUsuario($order = Criteria::ASC) Order by the comu_r_usuario column
 *
 * @method     ChildComunaQuery groupByComuCodigo() Group by the comu_codigo column
 * @method     ChildComunaQuery groupByComuNombre() Group by the comu_nombre column
 * @method     ChildComunaQuery groupByComuCProvincia() Group by the comu_c_provincia column
 * @method     ChildComunaQuery groupByComuRFechaCreacion() Group by the comu_r_fecha_creacion column
 * @method     ChildComunaQuery groupByComuRFechaModificacion() Group by the comu_r_fecha_modificacion column
 * @method     ChildComunaQuery groupByComuRUsuario() Group by the comu_r_usuario column
 *
 * @method     ChildComunaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildComunaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildComunaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildComunaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildComunaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildComunaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildComunaQuery leftJoinProvincia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Provincia relation
 * @method     ChildComunaQuery rightJoinProvincia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Provincia relation
 * @method     ChildComunaQuery innerJoinProvincia($relationAlias = null) Adds a INNER JOIN clause to the query using the Provincia relation
 *
 * @method     ChildComunaQuery joinWithProvincia($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Provincia relation
 *
 * @method     ChildComunaQuery leftJoinWithProvincia() Adds a LEFT JOIN clause and with to the query using the Provincia relation
 * @method     ChildComunaQuery rightJoinWithProvincia() Adds a RIGHT JOIN clause and with to the query using the Provincia relation
 * @method     ChildComunaQuery innerJoinWithProvincia() Adds a INNER JOIN clause and with to the query using the Provincia relation
 *
 * @method     ChildComunaQuery leftJoinDictacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dictacion relation
 * @method     ChildComunaQuery rightJoinDictacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dictacion relation
 * @method     ChildComunaQuery innerJoinDictacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Dictacion relation
 *
 * @method     ChildComunaQuery joinWithDictacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dictacion relation
 *
 * @method     ChildComunaQuery leftJoinWithDictacion() Adds a LEFT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildComunaQuery rightJoinWithDictacion() Adds a RIGHT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildComunaQuery innerJoinWithDictacion() Adds a INNER JOIN clause and with to the query using the Dictacion relation
 *
 * @method     ChildComunaQuery leftJoinDireccion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Direccion relation
 * @method     ChildComunaQuery rightJoinDireccion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Direccion relation
 * @method     ChildComunaQuery innerJoinDireccion($relationAlias = null) Adds a INNER JOIN clause to the query using the Direccion relation
 *
 * @method     ChildComunaQuery joinWithDireccion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Direccion relation
 *
 * @method     ChildComunaQuery leftJoinWithDireccion() Adds a LEFT JOIN clause and with to the query using the Direccion relation
 * @method     ChildComunaQuery rightJoinWithDireccion() Adds a RIGHT JOIN clause and with to the query using the Direccion relation
 * @method     ChildComunaQuery innerJoinWithDireccion() Adds a INNER JOIN clause and with to the query using the Direccion relation
 *
 * @method     \ProvinciaQuery|\DictacionQuery|\DireccionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildComuna findOne(ConnectionInterface $con = null) Return the first ChildComuna matching the query
 * @method     ChildComuna findOneOrCreate(ConnectionInterface $con = null) Return the first ChildComuna matching the query, or a new ChildComuna object populated from the query conditions when no match is found
 *
 * @method     ChildComuna findOneByComuCodigo(int $comu_codigo) Return the first ChildComuna filtered by the comu_codigo column
 * @method     ChildComuna findOneByComuNombre(string $comu_nombre) Return the first ChildComuna filtered by the comu_nombre column
 * @method     ChildComuna findOneByComuCProvincia(int $comu_c_provincia) Return the first ChildComuna filtered by the comu_c_provincia column
 * @method     ChildComuna findOneByComuRFechaCreacion(string $comu_r_fecha_creacion) Return the first ChildComuna filtered by the comu_r_fecha_creacion column
 * @method     ChildComuna findOneByComuRFechaModificacion(string $comu_r_fecha_modificacion) Return the first ChildComuna filtered by the comu_r_fecha_modificacion column
 * @method     ChildComuna findOneByComuRUsuario(int $comu_r_usuario) Return the first ChildComuna filtered by the comu_r_usuario column *

 * @method     ChildComuna requirePk($key, ConnectionInterface $con = null) Return the ChildComuna by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComuna requireOne(ConnectionInterface $con = null) Return the first ChildComuna matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildComuna requireOneByComuCodigo(int $comu_codigo) Return the first ChildComuna filtered by the comu_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComuna requireOneByComuNombre(string $comu_nombre) Return the first ChildComuna filtered by the comu_nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComuna requireOneByComuCProvincia(int $comu_c_provincia) Return the first ChildComuna filtered by the comu_c_provincia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComuna requireOneByComuRFechaCreacion(string $comu_r_fecha_creacion) Return the first ChildComuna filtered by the comu_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComuna requireOneByComuRFechaModificacion(string $comu_r_fecha_modificacion) Return the first ChildComuna filtered by the comu_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildComuna requireOneByComuRUsuario(int $comu_r_usuario) Return the first ChildComuna filtered by the comu_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildComuna[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildComuna objects based on current ModelCriteria
 * @method     ChildComuna[]|ObjectCollection findByComuCodigo(int $comu_codigo) Return ChildComuna objects filtered by the comu_codigo column
 * @method     ChildComuna[]|ObjectCollection findByComuNombre(string $comu_nombre) Return ChildComuna objects filtered by the comu_nombre column
 * @method     ChildComuna[]|ObjectCollection findByComuCProvincia(int $comu_c_provincia) Return ChildComuna objects filtered by the comu_c_provincia column
 * @method     ChildComuna[]|ObjectCollection findByComuRFechaCreacion(string $comu_r_fecha_creacion) Return ChildComuna objects filtered by the comu_r_fecha_creacion column
 * @method     ChildComuna[]|ObjectCollection findByComuRFechaModificacion(string $comu_r_fecha_modificacion) Return ChildComuna objects filtered by the comu_r_fecha_modificacion column
 * @method     ChildComuna[]|ObjectCollection findByComuRUsuario(int $comu_r_usuario) Return ChildComuna objects filtered by the comu_r_usuario column
 * @method     ChildComuna[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ComunaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ComunaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Comuna', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildComunaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildComunaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildComunaQuery) {
            return $criteria;
        }
        $query = new ChildComunaQuery();
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
     * @return ChildComuna|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ComunaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ComunaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildComuna A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT comu_codigo, comu_nombre, comu_c_provincia, comu_r_fecha_creacion, comu_r_fecha_modificacion, comu_r_usuario FROM comuna WHERE comu_codigo = :p0';
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
            /** @var ChildComuna $obj */
            $obj = new ChildComuna();
            $obj->hydrate($row);
            ComunaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildComuna|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ComunaTableMap::COL_COMU_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ComunaTableMap::COL_COMU_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the comu_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByComuCodigo(1234); // WHERE comu_codigo = 1234
     * $query->filterByComuCodigo(array(12, 34)); // WHERE comu_codigo IN (12, 34)
     * $query->filterByComuCodigo(array('min' => 12)); // WHERE comu_codigo > 12
     * </code>
     *
     * @param     mixed $comuCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function filterByComuCodigo($comuCodigo = null, $comparison = null)
    {
        if (is_array($comuCodigo)) {
            $useMinMax = false;
            if (isset($comuCodigo['min'])) {
                $this->addUsingAlias(ComunaTableMap::COL_COMU_CODIGO, $comuCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comuCodigo['max'])) {
                $this->addUsingAlias(ComunaTableMap::COL_COMU_CODIGO, $comuCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComunaTableMap::COL_COMU_CODIGO, $comuCodigo, $comparison);
    }

    /**
     * Filter the query on the comu_nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByComuNombre('fooValue');   // WHERE comu_nombre = 'fooValue'
     * $query->filterByComuNombre('%fooValue%', Criteria::LIKE); // WHERE comu_nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comuNombre The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function filterByComuNombre($comuNombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comuNombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComunaTableMap::COL_COMU_NOMBRE, $comuNombre, $comparison);
    }

    /**
     * Filter the query on the comu_c_provincia column
     *
     * Example usage:
     * <code>
     * $query->filterByComuCProvincia(1234); // WHERE comu_c_provincia = 1234
     * $query->filterByComuCProvincia(array(12, 34)); // WHERE comu_c_provincia IN (12, 34)
     * $query->filterByComuCProvincia(array('min' => 12)); // WHERE comu_c_provincia > 12
     * </code>
     *
     * @see       filterByProvincia()
     *
     * @param     mixed $comuCProvincia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function filterByComuCProvincia($comuCProvincia = null, $comparison = null)
    {
        if (is_array($comuCProvincia)) {
            $useMinMax = false;
            if (isset($comuCProvincia['min'])) {
                $this->addUsingAlias(ComunaTableMap::COL_COMU_C_PROVINCIA, $comuCProvincia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comuCProvincia['max'])) {
                $this->addUsingAlias(ComunaTableMap::COL_COMU_C_PROVINCIA, $comuCProvincia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComunaTableMap::COL_COMU_C_PROVINCIA, $comuCProvincia, $comparison);
    }

    /**
     * Filter the query on the comu_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByComuRFechaCreacion('2011-03-14'); // WHERE comu_r_fecha_creacion = '2011-03-14'
     * $query->filterByComuRFechaCreacion('now'); // WHERE comu_r_fecha_creacion = '2011-03-14'
     * $query->filterByComuRFechaCreacion(array('max' => 'yesterday')); // WHERE comu_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $comuRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function filterByComuRFechaCreacion($comuRFechaCreacion = null, $comparison = null)
    {
        if (is_array($comuRFechaCreacion)) {
            $useMinMax = false;
            if (isset($comuRFechaCreacion['min'])) {
                $this->addUsingAlias(ComunaTableMap::COL_COMU_R_FECHA_CREACION, $comuRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comuRFechaCreacion['max'])) {
                $this->addUsingAlias(ComunaTableMap::COL_COMU_R_FECHA_CREACION, $comuRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComunaTableMap::COL_COMU_R_FECHA_CREACION, $comuRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the comu_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByComuRFechaModificacion('2011-03-14'); // WHERE comu_r_fecha_modificacion = '2011-03-14'
     * $query->filterByComuRFechaModificacion('now'); // WHERE comu_r_fecha_modificacion = '2011-03-14'
     * $query->filterByComuRFechaModificacion(array('max' => 'yesterday')); // WHERE comu_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $comuRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function filterByComuRFechaModificacion($comuRFechaModificacion = null, $comparison = null)
    {
        if (is_array($comuRFechaModificacion)) {
            $useMinMax = false;
            if (isset($comuRFechaModificacion['min'])) {
                $this->addUsingAlias(ComunaTableMap::COL_COMU_R_FECHA_MODIFICACION, $comuRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comuRFechaModificacion['max'])) {
                $this->addUsingAlias(ComunaTableMap::COL_COMU_R_FECHA_MODIFICACION, $comuRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComunaTableMap::COL_COMU_R_FECHA_MODIFICACION, $comuRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the comu_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByComuRUsuario(1234); // WHERE comu_r_usuario = 1234
     * $query->filterByComuRUsuario(array(12, 34)); // WHERE comu_r_usuario IN (12, 34)
     * $query->filterByComuRUsuario(array('min' => 12)); // WHERE comu_r_usuario > 12
     * </code>
     *
     * @param     mixed $comuRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function filterByComuRUsuario($comuRUsuario = null, $comparison = null)
    {
        if (is_array($comuRUsuario)) {
            $useMinMax = false;
            if (isset($comuRUsuario['min'])) {
                $this->addUsingAlias(ComunaTableMap::COL_COMU_R_USUARIO, $comuRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comuRUsuario['max'])) {
                $this->addUsingAlias(ComunaTableMap::COL_COMU_R_USUARIO, $comuRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComunaTableMap::COL_COMU_R_USUARIO, $comuRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Provincia object
     *
     * @param \Provincia|ObjectCollection $provincia The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildComunaQuery The current query, for fluid interface
     */
    public function filterByProvincia($provincia, $comparison = null)
    {
        if ($provincia instanceof \Provincia) {
            return $this
                ->addUsingAlias(ComunaTableMap::COL_COMU_C_PROVINCIA, $provincia->getProvCodigo(), $comparison);
        } elseif ($provincia instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ComunaTableMap::COL_COMU_C_PROVINCIA, $provincia->toKeyValue('PrimaryKey', 'ProvCodigo'), $comparison);
        } else {
            throw new PropelException('filterByProvincia() only accepts arguments of type \Provincia or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Provincia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function joinProvincia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Provincia');

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
            $this->addJoinObject($join, 'Provincia');
        }

        return $this;
    }

    /**
     * Use the Provincia relation Provincia object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProvinciaQuery A secondary query class using the current class as primary query
     */
    public function useProvinciaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProvincia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Provincia', '\ProvinciaQuery');
    }

    /**
     * Filter the query by a related \Dictacion object
     *
     * @param \Dictacion|ObjectCollection $dictacion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildComunaQuery The current query, for fluid interface
     */
    public function filterByDictacion($dictacion, $comparison = null)
    {
        if ($dictacion instanceof \Dictacion) {
            return $this
                ->addUsingAlias(ComunaTableMap::COL_COMU_CODIGO, $dictacion->getDictCComuna(), $comparison);
        } elseif ($dictacion instanceof ObjectCollection) {
            return $this
                ->useDictacionQuery()
                ->filterByPrimaryKeys($dictacion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDictacion() only accepts arguments of type \Dictacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dictacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function joinDictacion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Dictacion');

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
            $this->addJoinObject($join, 'Dictacion');
        }

        return $this;
    }

    /**
     * Use the Dictacion relation Dictacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DictacionQuery A secondary query class using the current class as primary query
     */
    public function useDictacionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDictacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dictacion', '\DictacionQuery');
    }

    /**
     * Filter the query by a related \Direccion object
     *
     * @param \Direccion|ObjectCollection $direccion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildComunaQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion, $comparison = null)
    {
        if ($direccion instanceof \Direccion) {
            return $this
                ->addUsingAlias(ComunaTableMap::COL_COMU_CODIGO, $direccion->getDireCComuna(), $comparison);
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
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function joinDireccion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useDireccionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDireccion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Direccion', '\DireccionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildComuna $comuna Object to remove from the list of results
     *
     * @return $this|ChildComunaQuery The current query, for fluid interface
     */
    public function prune($comuna = null)
    {
        if ($comuna) {
            $this->addUsingAlias(ComunaTableMap::COL_COMU_CODIGO, $comuna->getComuCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the comuna table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ComunaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ComunaTableMap::clearInstancePool();
            ComunaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ComunaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ComunaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ComunaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ComunaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ComunaQuery
