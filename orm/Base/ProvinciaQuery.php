<?php

namespace Base;

use \Provincia as ChildProvincia;
use \ProvinciaQuery as ChildProvinciaQuery;
use \Exception;
use \PDO;
use Map\ProvinciaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'provincia' table.
 *
 *
 *
 * @method     ChildProvinciaQuery orderByProvCodigo($order = Criteria::ASC) Order by the prov_codigo column
 * @method     ChildProvinciaQuery orderByProvNombre($order = Criteria::ASC) Order by the prov_nombre column
 * @method     ChildProvinciaQuery orderByProvCRegion($order = Criteria::ASC) Order by the prov_c_region column
 * @method     ChildProvinciaQuery orderByProvRFechaCreacion($order = Criteria::ASC) Order by the prov_r_fecha_creacion column
 * @method     ChildProvinciaQuery orderByProvRFechaModificacion($order = Criteria::ASC) Order by the prov_r_fecha_modificacion column
 * @method     ChildProvinciaQuery orderByProvRUsuario($order = Criteria::ASC) Order by the prov_r_usuario column
 *
 * @method     ChildProvinciaQuery groupByProvCodigo() Group by the prov_codigo column
 * @method     ChildProvinciaQuery groupByProvNombre() Group by the prov_nombre column
 * @method     ChildProvinciaQuery groupByProvCRegion() Group by the prov_c_region column
 * @method     ChildProvinciaQuery groupByProvRFechaCreacion() Group by the prov_r_fecha_creacion column
 * @method     ChildProvinciaQuery groupByProvRFechaModificacion() Group by the prov_r_fecha_modificacion column
 * @method     ChildProvinciaQuery groupByProvRUsuario() Group by the prov_r_usuario column
 *
 * @method     ChildProvinciaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProvinciaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProvinciaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProvinciaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProvinciaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProvinciaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProvinciaQuery leftJoinRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Region relation
 * @method     ChildProvinciaQuery rightJoinRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Region relation
 * @method     ChildProvinciaQuery innerJoinRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the Region relation
 *
 * @method     ChildProvinciaQuery joinWithRegion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Region relation
 *
 * @method     ChildProvinciaQuery leftJoinWithRegion() Adds a LEFT JOIN clause and with to the query using the Region relation
 * @method     ChildProvinciaQuery rightJoinWithRegion() Adds a RIGHT JOIN clause and with to the query using the Region relation
 * @method     ChildProvinciaQuery innerJoinWithRegion() Adds a INNER JOIN clause and with to the query using the Region relation
 *
 * @method     ChildProvinciaQuery leftJoinComuna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comuna relation
 * @method     ChildProvinciaQuery rightJoinComuna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comuna relation
 * @method     ChildProvinciaQuery innerJoinComuna($relationAlias = null) Adds a INNER JOIN clause to the query using the Comuna relation
 *
 * @method     ChildProvinciaQuery joinWithComuna($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Comuna relation
 *
 * @method     ChildProvinciaQuery leftJoinWithComuna() Adds a LEFT JOIN clause and with to the query using the Comuna relation
 * @method     ChildProvinciaQuery rightJoinWithComuna() Adds a RIGHT JOIN clause and with to the query using the Comuna relation
 * @method     ChildProvinciaQuery innerJoinWithComuna() Adds a INNER JOIN clause and with to the query using the Comuna relation
 *
 * @method     \RegionQuery|\ComunaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildProvincia findOne(ConnectionInterface $con = null) Return the first ChildProvincia matching the query
 * @method     ChildProvincia findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProvincia matching the query, or a new ChildProvincia object populated from the query conditions when no match is found
 *
 * @method     ChildProvincia findOneByProvCodigo(int $prov_codigo) Return the first ChildProvincia filtered by the prov_codigo column
 * @method     ChildProvincia findOneByProvNombre(string $prov_nombre) Return the first ChildProvincia filtered by the prov_nombre column
 * @method     ChildProvincia findOneByProvCRegion(int $prov_c_region) Return the first ChildProvincia filtered by the prov_c_region column
 * @method     ChildProvincia findOneByProvRFechaCreacion(string $prov_r_fecha_creacion) Return the first ChildProvincia filtered by the prov_r_fecha_creacion column
 * @method     ChildProvincia findOneByProvRFechaModificacion(string $prov_r_fecha_modificacion) Return the first ChildProvincia filtered by the prov_r_fecha_modificacion column
 * @method     ChildProvincia findOneByProvRUsuario(int $prov_r_usuario) Return the first ChildProvincia filtered by the prov_r_usuario column *

 * @method     ChildProvincia requirePk($key, ConnectionInterface $con = null) Return the ChildProvincia by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvincia requireOne(ConnectionInterface $con = null) Return the first ChildProvincia matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProvincia requireOneByProvCodigo(int $prov_codigo) Return the first ChildProvincia filtered by the prov_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvincia requireOneByProvNombre(string $prov_nombre) Return the first ChildProvincia filtered by the prov_nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvincia requireOneByProvCRegion(int $prov_c_region) Return the first ChildProvincia filtered by the prov_c_region column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvincia requireOneByProvRFechaCreacion(string $prov_r_fecha_creacion) Return the first ChildProvincia filtered by the prov_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvincia requireOneByProvRFechaModificacion(string $prov_r_fecha_modificacion) Return the first ChildProvincia filtered by the prov_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvincia requireOneByProvRUsuario(int $prov_r_usuario) Return the first ChildProvincia filtered by the prov_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProvincia[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProvincia objects based on current ModelCriteria
 * @method     ChildProvincia[]|ObjectCollection findByProvCodigo(int $prov_codigo) Return ChildProvincia objects filtered by the prov_codigo column
 * @method     ChildProvincia[]|ObjectCollection findByProvNombre(string $prov_nombre) Return ChildProvincia objects filtered by the prov_nombre column
 * @method     ChildProvincia[]|ObjectCollection findByProvCRegion(int $prov_c_region) Return ChildProvincia objects filtered by the prov_c_region column
 * @method     ChildProvincia[]|ObjectCollection findByProvRFechaCreacion(string $prov_r_fecha_creacion) Return ChildProvincia objects filtered by the prov_r_fecha_creacion column
 * @method     ChildProvincia[]|ObjectCollection findByProvRFechaModificacion(string $prov_r_fecha_modificacion) Return ChildProvincia objects filtered by the prov_r_fecha_modificacion column
 * @method     ChildProvincia[]|ObjectCollection findByProvRUsuario(int $prov_r_usuario) Return ChildProvincia objects filtered by the prov_r_usuario column
 * @method     ChildProvincia[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProvinciaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ProvinciaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Provincia', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProvinciaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProvinciaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProvinciaQuery) {
            return $criteria;
        }
        $query = new ChildProvinciaQuery();
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
     * @return ChildProvincia|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProvinciaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProvinciaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildProvincia A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT prov_codigo, prov_nombre, prov_c_region, prov_r_fecha_creacion, prov_r_fecha_modificacion, prov_r_usuario FROM provincia WHERE prov_codigo = :p0';
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
            /** @var ChildProvincia $obj */
            $obj = new ChildProvincia();
            $obj->hydrate($row);
            ProvinciaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildProvincia|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildProvinciaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProvinciaTableMap::COL_PROV_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProvinciaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProvinciaTableMap::COL_PROV_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the prov_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByProvCodigo(1234); // WHERE prov_codigo = 1234
     * $query->filterByProvCodigo(array(12, 34)); // WHERE prov_codigo IN (12, 34)
     * $query->filterByProvCodigo(array('min' => 12)); // WHERE prov_codigo > 12
     * </code>
     *
     * @param     mixed $provCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinciaQuery The current query, for fluid interface
     */
    public function filterByProvCodigo($provCodigo = null, $comparison = null)
    {
        if (is_array($provCodigo)) {
            $useMinMax = false;
            if (isset($provCodigo['min'])) {
                $this->addUsingAlias(ProvinciaTableMap::COL_PROV_CODIGO, $provCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provCodigo['max'])) {
                $this->addUsingAlias(ProvinciaTableMap::COL_PROV_CODIGO, $provCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinciaTableMap::COL_PROV_CODIGO, $provCodigo, $comparison);
    }

    /**
     * Filter the query on the prov_nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByProvNombre('fooValue');   // WHERE prov_nombre = 'fooValue'
     * $query->filterByProvNombre('%fooValue%', Criteria::LIKE); // WHERE prov_nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $provNombre The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinciaQuery The current query, for fluid interface
     */
    public function filterByProvNombre($provNombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($provNombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinciaTableMap::COL_PROV_NOMBRE, $provNombre, $comparison);
    }

    /**
     * Filter the query on the prov_c_region column
     *
     * Example usage:
     * <code>
     * $query->filterByProvCRegion(1234); // WHERE prov_c_region = 1234
     * $query->filterByProvCRegion(array(12, 34)); // WHERE prov_c_region IN (12, 34)
     * $query->filterByProvCRegion(array('min' => 12)); // WHERE prov_c_region > 12
     * </code>
     *
     * @see       filterByRegion()
     *
     * @param     mixed $provCRegion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinciaQuery The current query, for fluid interface
     */
    public function filterByProvCRegion($provCRegion = null, $comparison = null)
    {
        if (is_array($provCRegion)) {
            $useMinMax = false;
            if (isset($provCRegion['min'])) {
                $this->addUsingAlias(ProvinciaTableMap::COL_PROV_C_REGION, $provCRegion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provCRegion['max'])) {
                $this->addUsingAlias(ProvinciaTableMap::COL_PROV_C_REGION, $provCRegion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinciaTableMap::COL_PROV_C_REGION, $provCRegion, $comparison);
    }

    /**
     * Filter the query on the prov_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByProvRFechaCreacion('2011-03-14'); // WHERE prov_r_fecha_creacion = '2011-03-14'
     * $query->filterByProvRFechaCreacion('now'); // WHERE prov_r_fecha_creacion = '2011-03-14'
     * $query->filterByProvRFechaCreacion(array('max' => 'yesterday')); // WHERE prov_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $provRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinciaQuery The current query, for fluid interface
     */
    public function filterByProvRFechaCreacion($provRFechaCreacion = null, $comparison = null)
    {
        if (is_array($provRFechaCreacion)) {
            $useMinMax = false;
            if (isset($provRFechaCreacion['min'])) {
                $this->addUsingAlias(ProvinciaTableMap::COL_PROV_R_FECHA_CREACION, $provRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provRFechaCreacion['max'])) {
                $this->addUsingAlias(ProvinciaTableMap::COL_PROV_R_FECHA_CREACION, $provRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinciaTableMap::COL_PROV_R_FECHA_CREACION, $provRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the prov_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByProvRFechaModificacion('2011-03-14'); // WHERE prov_r_fecha_modificacion = '2011-03-14'
     * $query->filterByProvRFechaModificacion('now'); // WHERE prov_r_fecha_modificacion = '2011-03-14'
     * $query->filterByProvRFechaModificacion(array('max' => 'yesterday')); // WHERE prov_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $provRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinciaQuery The current query, for fluid interface
     */
    public function filterByProvRFechaModificacion($provRFechaModificacion = null, $comparison = null)
    {
        if (is_array($provRFechaModificacion)) {
            $useMinMax = false;
            if (isset($provRFechaModificacion['min'])) {
                $this->addUsingAlias(ProvinciaTableMap::COL_PROV_R_FECHA_MODIFICACION, $provRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provRFechaModificacion['max'])) {
                $this->addUsingAlias(ProvinciaTableMap::COL_PROV_R_FECHA_MODIFICACION, $provRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinciaTableMap::COL_PROV_R_FECHA_MODIFICACION, $provRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the prov_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByProvRUsuario(1234); // WHERE prov_r_usuario = 1234
     * $query->filterByProvRUsuario(array(12, 34)); // WHERE prov_r_usuario IN (12, 34)
     * $query->filterByProvRUsuario(array('min' => 12)); // WHERE prov_r_usuario > 12
     * </code>
     *
     * @param     mixed $provRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProvinciaQuery The current query, for fluid interface
     */
    public function filterByProvRUsuario($provRUsuario = null, $comparison = null)
    {
        if (is_array($provRUsuario)) {
            $useMinMax = false;
            if (isset($provRUsuario['min'])) {
                $this->addUsingAlias(ProvinciaTableMap::COL_PROV_R_USUARIO, $provRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provRUsuario['max'])) {
                $this->addUsingAlias(ProvinciaTableMap::COL_PROV_R_USUARIO, $provRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProvinciaTableMap::COL_PROV_R_USUARIO, $provRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Region object
     *
     * @param \Region|ObjectCollection $region The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProvinciaQuery The current query, for fluid interface
     */
    public function filterByRegion($region, $comparison = null)
    {
        if ($region instanceof \Region) {
            return $this
                ->addUsingAlias(ProvinciaTableMap::COL_PROV_C_REGION, $region->getRegiCodigo(), $comparison);
        } elseif ($region instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProvinciaTableMap::COL_PROV_C_REGION, $region->toKeyValue('PrimaryKey', 'RegiCodigo'), $comparison);
        } else {
            throw new PropelException('filterByRegion() only accepts arguments of type \Region or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Region relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProvinciaQuery The current query, for fluid interface
     */
    public function joinRegion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Region');

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
            $this->addJoinObject($join, 'Region');
        }

        return $this;
    }

    /**
     * Use the Region relation Region object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RegionQuery A secondary query class using the current class as primary query
     */
    public function useRegionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRegion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Region', '\RegionQuery');
    }

    /**
     * Filter the query by a related \Comuna object
     *
     * @param \Comuna|ObjectCollection $comuna the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProvinciaQuery The current query, for fluid interface
     */
    public function filterByComuna($comuna, $comparison = null)
    {
        if ($comuna instanceof \Comuna) {
            return $this
                ->addUsingAlias(ProvinciaTableMap::COL_PROV_CODIGO, $comuna->getComuCProvincia(), $comparison);
        } elseif ($comuna instanceof ObjectCollection) {
            return $this
                ->useComunaQuery()
                ->filterByPrimaryKeys($comuna->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByComuna() only accepts arguments of type \Comuna or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Comuna relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProvinciaQuery The current query, for fluid interface
     */
    public function joinComuna($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Comuna');

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
            $this->addJoinObject($join, 'Comuna');
        }

        return $this;
    }

    /**
     * Use the Comuna relation Comuna object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ComunaQuery A secondary query class using the current class as primary query
     */
    public function useComunaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinComuna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Comuna', '\ComunaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProvincia $provincia Object to remove from the list of results
     *
     * @return $this|ChildProvinciaQuery The current query, for fluid interface
     */
    public function prune($provincia = null)
    {
        if ($provincia) {
            $this->addUsingAlias(ProvinciaTableMap::COL_PROV_CODIGO, $provincia->getProvCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the provincia table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProvinciaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProvinciaTableMap::clearInstancePool();
            ProvinciaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ProvinciaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProvinciaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProvinciaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProvinciaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProvinciaQuery
