<?php

namespace Base;

use \ActividadCargo as ChildActividadCargo;
use \ActividadCargoQuery as ChildActividadCargoQuery;
use \Exception;
use \PDO;
use Map\ActividadCargoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'actividad_cargo' table.
 *
 *
 *
 * @method     ChildActividadCargoQuery orderByAccaCActividad($order = Criteria::ASC) Order by the acca_c_actividad column
 * @method     ChildActividadCargoQuery orderByAccaCCargo($order = Criteria::ASC) Order by the acca_c_cargo column
 * @method     ChildActividadCargoQuery orderByAccaVigente($order = Criteria::ASC) Order by the acca_vigente column
 * @method     ChildActividadCargoQuery orderByAccaRFechaCreacion($order = Criteria::ASC) Order by the acca_r_fecha_creacion column
 * @method     ChildActividadCargoQuery orderByAccaRFechaModificacion($order = Criteria::ASC) Order by the acca_r_fecha_modificacion column
 * @method     ChildActividadCargoQuery orderByAccaRUsuario($order = Criteria::ASC) Order by the acca_r_usuario column
 *
 * @method     ChildActividadCargoQuery groupByAccaCActividad() Group by the acca_c_actividad column
 * @method     ChildActividadCargoQuery groupByAccaCCargo() Group by the acca_c_cargo column
 * @method     ChildActividadCargoQuery groupByAccaVigente() Group by the acca_vigente column
 * @method     ChildActividadCargoQuery groupByAccaRFechaCreacion() Group by the acca_r_fecha_creacion column
 * @method     ChildActividadCargoQuery groupByAccaRFechaModificacion() Group by the acca_r_fecha_modificacion column
 * @method     ChildActividadCargoQuery groupByAccaRUsuario() Group by the acca_r_usuario column
 *
 * @method     ChildActividadCargoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildActividadCargoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildActividadCargoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildActividadCargoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildActividadCargoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildActividadCargoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildActividadCargoQuery leftJoinActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actividad relation
 * @method     ChildActividadCargoQuery rightJoinActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actividad relation
 * @method     ChildActividadCargoQuery innerJoinActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the Actividad relation
 *
 * @method     ChildActividadCargoQuery joinWithActividad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Actividad relation
 *
 * @method     ChildActividadCargoQuery leftJoinWithActividad() Adds a LEFT JOIN clause and with to the query using the Actividad relation
 * @method     ChildActividadCargoQuery rightJoinWithActividad() Adds a RIGHT JOIN clause and with to the query using the Actividad relation
 * @method     ChildActividadCargoQuery innerJoinWithActividad() Adds a INNER JOIN clause and with to the query using the Actividad relation
 *
 * @method     ChildActividadCargoQuery leftJoinCargo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cargo relation
 * @method     ChildActividadCargoQuery rightJoinCargo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cargo relation
 * @method     ChildActividadCargoQuery innerJoinCargo($relationAlias = null) Adds a INNER JOIN clause to the query using the Cargo relation
 *
 * @method     ChildActividadCargoQuery joinWithCargo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cargo relation
 *
 * @method     ChildActividadCargoQuery leftJoinWithCargo() Adds a LEFT JOIN clause and with to the query using the Cargo relation
 * @method     ChildActividadCargoQuery rightJoinWithCargo() Adds a RIGHT JOIN clause and with to the query using the Cargo relation
 * @method     ChildActividadCargoQuery innerJoinWithCargo() Adds a INNER JOIN clause and with to the query using the Cargo relation
 *
 * @method     \ActividadQuery|\CargoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildActividadCargo findOne(ConnectionInterface $con = null) Return the first ChildActividadCargo matching the query
 * @method     ChildActividadCargo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildActividadCargo matching the query, or a new ChildActividadCargo object populated from the query conditions when no match is found
 *
 * @method     ChildActividadCargo findOneByAccaCActividad(int $acca_c_actividad) Return the first ChildActividadCargo filtered by the acca_c_actividad column
 * @method     ChildActividadCargo findOneByAccaCCargo(int $acca_c_cargo) Return the first ChildActividadCargo filtered by the acca_c_cargo column
 * @method     ChildActividadCargo findOneByAccaVigente(int $acca_vigente) Return the first ChildActividadCargo filtered by the acca_vigente column
 * @method     ChildActividadCargo findOneByAccaRFechaCreacion(string $acca_r_fecha_creacion) Return the first ChildActividadCargo filtered by the acca_r_fecha_creacion column
 * @method     ChildActividadCargo findOneByAccaRFechaModificacion(string $acca_r_fecha_modificacion) Return the first ChildActividadCargo filtered by the acca_r_fecha_modificacion column
 * @method     ChildActividadCargo findOneByAccaRUsuario(int $acca_r_usuario) Return the first ChildActividadCargo filtered by the acca_r_usuario column *

 * @method     ChildActividadCargo requirePk($key, ConnectionInterface $con = null) Return the ChildActividadCargo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadCargo requireOne(ConnectionInterface $con = null) Return the first ChildActividadCargo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActividadCargo requireOneByAccaCActividad(int $acca_c_actividad) Return the first ChildActividadCargo filtered by the acca_c_actividad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadCargo requireOneByAccaCCargo(int $acca_c_cargo) Return the first ChildActividadCargo filtered by the acca_c_cargo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadCargo requireOneByAccaVigente(int $acca_vigente) Return the first ChildActividadCargo filtered by the acca_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadCargo requireOneByAccaRFechaCreacion(string $acca_r_fecha_creacion) Return the first ChildActividadCargo filtered by the acca_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadCargo requireOneByAccaRFechaModificacion(string $acca_r_fecha_modificacion) Return the first ChildActividadCargo filtered by the acca_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadCargo requireOneByAccaRUsuario(int $acca_r_usuario) Return the first ChildActividadCargo filtered by the acca_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActividadCargo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildActividadCargo objects based on current ModelCriteria
 * @method     ChildActividadCargo[]|ObjectCollection findByAccaCActividad(int $acca_c_actividad) Return ChildActividadCargo objects filtered by the acca_c_actividad column
 * @method     ChildActividadCargo[]|ObjectCollection findByAccaCCargo(int $acca_c_cargo) Return ChildActividadCargo objects filtered by the acca_c_cargo column
 * @method     ChildActividadCargo[]|ObjectCollection findByAccaVigente(int $acca_vigente) Return ChildActividadCargo objects filtered by the acca_vigente column
 * @method     ChildActividadCargo[]|ObjectCollection findByAccaRFechaCreacion(string $acca_r_fecha_creacion) Return ChildActividadCargo objects filtered by the acca_r_fecha_creacion column
 * @method     ChildActividadCargo[]|ObjectCollection findByAccaRFechaModificacion(string $acca_r_fecha_modificacion) Return ChildActividadCargo objects filtered by the acca_r_fecha_modificacion column
 * @method     ChildActividadCargo[]|ObjectCollection findByAccaRUsuario(int $acca_r_usuario) Return ChildActividadCargo objects filtered by the acca_r_usuario column
 * @method     ChildActividadCargo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ActividadCargoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ActividadCargoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ActividadCargo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildActividadCargoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildActividadCargoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildActividadCargoQuery) {
            return $criteria;
        }
        $query = new ChildActividadCargoQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$acca_c_actividad, $acca_c_cargo] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildActividadCargo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ActividadCargoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ActividadCargoTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildActividadCargo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT acca_c_actividad, acca_c_cargo, acca_vigente, acca_r_fecha_creacion, acca_r_fecha_modificacion, acca_r_usuario FROM actividad_cargo WHERE acca_c_actividad = :p0 AND acca_c_cargo = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildActividadCargo $obj */
            $obj = new ChildActividadCargo();
            $obj->hydrate($row);
            ActividadCargoTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildActividadCargo|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildActividadCargoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_CARGO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildActividadCargoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ActividadCargoTableMap::COL_ACCA_C_CARGO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the acca_c_actividad column
     *
     * Example usage:
     * <code>
     * $query->filterByAccaCActividad(1234); // WHERE acca_c_actividad = 1234
     * $query->filterByAccaCActividad(array(12, 34)); // WHERE acca_c_actividad IN (12, 34)
     * $query->filterByAccaCActividad(array('min' => 12)); // WHERE acca_c_actividad > 12
     * </code>
     *
     * @see       filterByActividad()
     *
     * @param     mixed $accaCActividad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadCargoQuery The current query, for fluid interface
     */
    public function filterByAccaCActividad($accaCActividad = null, $comparison = null)
    {
        if (is_array($accaCActividad)) {
            $useMinMax = false;
            if (isset($accaCActividad['min'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD, $accaCActividad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accaCActividad['max'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD, $accaCActividad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD, $accaCActividad, $comparison);
    }

    /**
     * Filter the query on the acca_c_cargo column
     *
     * Example usage:
     * <code>
     * $query->filterByAccaCCargo(1234); // WHERE acca_c_cargo = 1234
     * $query->filterByAccaCCargo(array(12, 34)); // WHERE acca_c_cargo IN (12, 34)
     * $query->filterByAccaCCargo(array('min' => 12)); // WHERE acca_c_cargo > 12
     * </code>
     *
     * @see       filterByCargo()
     *
     * @param     mixed $accaCCargo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadCargoQuery The current query, for fluid interface
     */
    public function filterByAccaCCargo($accaCCargo = null, $comparison = null)
    {
        if (is_array($accaCCargo)) {
            $useMinMax = false;
            if (isset($accaCCargo['min'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_CARGO, $accaCCargo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accaCCargo['max'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_CARGO, $accaCCargo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_CARGO, $accaCCargo, $comparison);
    }

    /**
     * Filter the query on the acca_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByAccaVigente(1234); // WHERE acca_vigente = 1234
     * $query->filterByAccaVigente(array(12, 34)); // WHERE acca_vigente IN (12, 34)
     * $query->filterByAccaVigente(array('min' => 12)); // WHERE acca_vigente > 12
     * </code>
     *
     * @param     mixed $accaVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadCargoQuery The current query, for fluid interface
     */
    public function filterByAccaVigente($accaVigente = null, $comparison = null)
    {
        if (is_array($accaVigente)) {
            $useMinMax = false;
            if (isset($accaVigente['min'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_VIGENTE, $accaVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accaVigente['max'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_VIGENTE, $accaVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_VIGENTE, $accaVigente, $comparison);
    }

    /**
     * Filter the query on the acca_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByAccaRFechaCreacion('2011-03-14'); // WHERE acca_r_fecha_creacion = '2011-03-14'
     * $query->filterByAccaRFechaCreacion('now'); // WHERE acca_r_fecha_creacion = '2011-03-14'
     * $query->filterByAccaRFechaCreacion(array('max' => 'yesterday')); // WHERE acca_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $accaRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadCargoQuery The current query, for fluid interface
     */
    public function filterByAccaRFechaCreacion($accaRFechaCreacion = null, $comparison = null)
    {
        if (is_array($accaRFechaCreacion)) {
            $useMinMax = false;
            if (isset($accaRFechaCreacion['min'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_R_FECHA_CREACION, $accaRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accaRFechaCreacion['max'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_R_FECHA_CREACION, $accaRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_R_FECHA_CREACION, $accaRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the acca_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByAccaRFechaModificacion('2011-03-14'); // WHERE acca_r_fecha_modificacion = '2011-03-14'
     * $query->filterByAccaRFechaModificacion('now'); // WHERE acca_r_fecha_modificacion = '2011-03-14'
     * $query->filterByAccaRFechaModificacion(array('max' => 'yesterday')); // WHERE acca_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $accaRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadCargoQuery The current query, for fluid interface
     */
    public function filterByAccaRFechaModificacion($accaRFechaModificacion = null, $comparison = null)
    {
        if (is_array($accaRFechaModificacion)) {
            $useMinMax = false;
            if (isset($accaRFechaModificacion['min'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_R_FECHA_MODIFICACION, $accaRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accaRFechaModificacion['max'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_R_FECHA_MODIFICACION, $accaRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_R_FECHA_MODIFICACION, $accaRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the acca_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByAccaRUsuario(1234); // WHERE acca_r_usuario = 1234
     * $query->filterByAccaRUsuario(array(12, 34)); // WHERE acca_r_usuario IN (12, 34)
     * $query->filterByAccaRUsuario(array('min' => 12)); // WHERE acca_r_usuario > 12
     * </code>
     *
     * @param     mixed $accaRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadCargoQuery The current query, for fluid interface
     */
    public function filterByAccaRUsuario($accaRUsuario = null, $comparison = null)
    {
        if (is_array($accaRUsuario)) {
            $useMinMax = false;
            if (isset($accaRUsuario['min'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_R_USUARIO, $accaRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accaRUsuario['max'])) {
                $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_R_USUARIO, $accaRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadCargoTableMap::COL_ACCA_R_USUARIO, $accaRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Actividad object
     *
     * @param \Actividad|ObjectCollection $actividad The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActividadCargoQuery The current query, for fluid interface
     */
    public function filterByActividad($actividad, $comparison = null)
    {
        if ($actividad instanceof \Actividad) {
            return $this
                ->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD, $actividad->getActiCodigo(), $comparison);
        } elseif ($actividad instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD, $actividad->toKeyValue('PrimaryKey', 'ActiCodigo'), $comparison);
        } else {
            throw new PropelException('filterByActividad() only accepts arguments of type \Actividad or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Actividad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildActividadCargoQuery The current query, for fluid interface
     */
    public function joinActividad($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Actividad');

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
            $this->addJoinObject($join, 'Actividad');
        }

        return $this;
    }

    /**
     * Use the Actividad relation Actividad object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ActividadQuery A secondary query class using the current class as primary query
     */
    public function useActividadQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActividad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Actividad', '\ActividadQuery');
    }

    /**
     * Filter the query by a related \Cargo object
     *
     * @param \Cargo|ObjectCollection $cargo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActividadCargoQuery The current query, for fluid interface
     */
    public function filterByCargo($cargo, $comparison = null)
    {
        if ($cargo instanceof \Cargo) {
            return $this
                ->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_CARGO, $cargo->getCargCodigo(), $comparison);
        } elseif ($cargo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActividadCargoTableMap::COL_ACCA_C_CARGO, $cargo->toKeyValue('PrimaryKey', 'CargCodigo'), $comparison);
        } else {
            throw new PropelException('filterByCargo() only accepts arguments of type \Cargo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cargo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildActividadCargoQuery The current query, for fluid interface
     */
    public function joinCargo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cargo');

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
            $this->addJoinObject($join, 'Cargo');
        }

        return $this;
    }

    /**
     * Use the Cargo relation Cargo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CargoQuery A secondary query class using the current class as primary query
     */
    public function useCargoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCargo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cargo', '\CargoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildActividadCargo $actividadCargo Object to remove from the list of results
     *
     * @return $this|ChildActividadCargoQuery The current query, for fluid interface
     */
    public function prune($actividadCargo = null)
    {
        if ($actividadCargo) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD), $actividadCargo->getAccaCActividad(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ActividadCargoTableMap::COL_ACCA_C_CARGO), $actividadCargo->getAccaCCargo(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the actividad_cargo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadCargoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ActividadCargoTableMap::clearInstancePool();
            ActividadCargoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadCargoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ActividadCargoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ActividadCargoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ActividadCargoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ActividadCargoQuery
