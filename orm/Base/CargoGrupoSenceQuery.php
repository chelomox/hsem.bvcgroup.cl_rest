<?php

namespace Base;

use \CargoGrupoSence as ChildCargoGrupoSence;
use \CargoGrupoSenceQuery as ChildCargoGrupoSenceQuery;
use \Exception;
use \PDO;
use Map\CargoGrupoSenceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cargo_grupo_sence' table.
 *
 *
 *
 * @method     ChildCargoGrupoSenceQuery orderByCagrseCCargo($order = Criteria::ASC) Order by the cagrse_c_cargo column
 * @method     ChildCargoGrupoSenceQuery orderByCagrseGGrupoSence($order = Criteria::ASC) Order by the cagrse_g_grupo_sence column
 * @method     ChildCargoGrupoSenceQuery orderByCagrseVigente($order = Criteria::ASC) Order by the cagrse_vigente column
 * @method     ChildCargoGrupoSenceQuery orderByCagrseRFechaCreacion($order = Criteria::ASC) Order by the cagrse_r_fecha_creacion column
 * @method     ChildCargoGrupoSenceQuery orderByCagrseRFechaModificacion($order = Criteria::ASC) Order by the cagrse_r_fecha_modificacion column
 * @method     ChildCargoGrupoSenceQuery orderByCagrseRUsuario($order = Criteria::ASC) Order by the cagrse_r_usuario column
 *
 * @method     ChildCargoGrupoSenceQuery groupByCagrseCCargo() Group by the cagrse_c_cargo column
 * @method     ChildCargoGrupoSenceQuery groupByCagrseGGrupoSence() Group by the cagrse_g_grupo_sence column
 * @method     ChildCargoGrupoSenceQuery groupByCagrseVigente() Group by the cagrse_vigente column
 * @method     ChildCargoGrupoSenceQuery groupByCagrseRFechaCreacion() Group by the cagrse_r_fecha_creacion column
 * @method     ChildCargoGrupoSenceQuery groupByCagrseRFechaModificacion() Group by the cagrse_r_fecha_modificacion column
 * @method     ChildCargoGrupoSenceQuery groupByCagrseRUsuario() Group by the cagrse_r_usuario column
 *
 * @method     ChildCargoGrupoSenceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCargoGrupoSenceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCargoGrupoSenceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCargoGrupoSenceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCargoGrupoSenceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCargoGrupoSenceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCargoGrupoSenceQuery leftJoinCargo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cargo relation
 * @method     ChildCargoGrupoSenceQuery rightJoinCargo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cargo relation
 * @method     ChildCargoGrupoSenceQuery innerJoinCargo($relationAlias = null) Adds a INNER JOIN clause to the query using the Cargo relation
 *
 * @method     ChildCargoGrupoSenceQuery joinWithCargo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cargo relation
 *
 * @method     ChildCargoGrupoSenceQuery leftJoinWithCargo() Adds a LEFT JOIN clause and with to the query using the Cargo relation
 * @method     ChildCargoGrupoSenceQuery rightJoinWithCargo() Adds a RIGHT JOIN clause and with to the query using the Cargo relation
 * @method     ChildCargoGrupoSenceQuery innerJoinWithCargo() Adds a INNER JOIN clause and with to the query using the Cargo relation
 *
 * @method     ChildCargoGrupoSenceQuery leftJoinGrupoSence($relationAlias = null) Adds a LEFT JOIN clause to the query using the GrupoSence relation
 * @method     ChildCargoGrupoSenceQuery rightJoinGrupoSence($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GrupoSence relation
 * @method     ChildCargoGrupoSenceQuery innerJoinGrupoSence($relationAlias = null) Adds a INNER JOIN clause to the query using the GrupoSence relation
 *
 * @method     ChildCargoGrupoSenceQuery joinWithGrupoSence($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the GrupoSence relation
 *
 * @method     ChildCargoGrupoSenceQuery leftJoinWithGrupoSence() Adds a LEFT JOIN clause and with to the query using the GrupoSence relation
 * @method     ChildCargoGrupoSenceQuery rightJoinWithGrupoSence() Adds a RIGHT JOIN clause and with to the query using the GrupoSence relation
 * @method     ChildCargoGrupoSenceQuery innerJoinWithGrupoSence() Adds a INNER JOIN clause and with to the query using the GrupoSence relation
 *
 * @method     \CargoQuery|\GrupoSenceQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCargoGrupoSence findOne(ConnectionInterface $con = null) Return the first ChildCargoGrupoSence matching the query
 * @method     ChildCargoGrupoSence findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCargoGrupoSence matching the query, or a new ChildCargoGrupoSence object populated from the query conditions when no match is found
 *
 * @method     ChildCargoGrupoSence findOneByCagrseCCargo(int $cagrse_c_cargo) Return the first ChildCargoGrupoSence filtered by the cagrse_c_cargo column
 * @method     ChildCargoGrupoSence findOneByCagrseGGrupoSence(int $cagrse_g_grupo_sence) Return the first ChildCargoGrupoSence filtered by the cagrse_g_grupo_sence column
 * @method     ChildCargoGrupoSence findOneByCagrseVigente(int $cagrse_vigente) Return the first ChildCargoGrupoSence filtered by the cagrse_vigente column
 * @method     ChildCargoGrupoSence findOneByCagrseRFechaCreacion(string $cagrse_r_fecha_creacion) Return the first ChildCargoGrupoSence filtered by the cagrse_r_fecha_creacion column
 * @method     ChildCargoGrupoSence findOneByCagrseRFechaModificacion(string $cagrse_r_fecha_modificacion) Return the first ChildCargoGrupoSence filtered by the cagrse_r_fecha_modificacion column
 * @method     ChildCargoGrupoSence findOneByCagrseRUsuario(int $cagrse_r_usuario) Return the first ChildCargoGrupoSence filtered by the cagrse_r_usuario column *

 * @method     ChildCargoGrupoSence requirePk($key, ConnectionInterface $con = null) Return the ChildCargoGrupoSence by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargoGrupoSence requireOne(ConnectionInterface $con = null) Return the first ChildCargoGrupoSence matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCargoGrupoSence requireOneByCagrseCCargo(int $cagrse_c_cargo) Return the first ChildCargoGrupoSence filtered by the cagrse_c_cargo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargoGrupoSence requireOneByCagrseGGrupoSence(int $cagrse_g_grupo_sence) Return the first ChildCargoGrupoSence filtered by the cagrse_g_grupo_sence column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargoGrupoSence requireOneByCagrseVigente(int $cagrse_vigente) Return the first ChildCargoGrupoSence filtered by the cagrse_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargoGrupoSence requireOneByCagrseRFechaCreacion(string $cagrse_r_fecha_creacion) Return the first ChildCargoGrupoSence filtered by the cagrse_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargoGrupoSence requireOneByCagrseRFechaModificacion(string $cagrse_r_fecha_modificacion) Return the first ChildCargoGrupoSence filtered by the cagrse_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargoGrupoSence requireOneByCagrseRUsuario(int $cagrse_r_usuario) Return the first ChildCargoGrupoSence filtered by the cagrse_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCargoGrupoSence[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCargoGrupoSence objects based on current ModelCriteria
 * @method     ChildCargoGrupoSence[]|ObjectCollection findByCagrseCCargo(int $cagrse_c_cargo) Return ChildCargoGrupoSence objects filtered by the cagrse_c_cargo column
 * @method     ChildCargoGrupoSence[]|ObjectCollection findByCagrseGGrupoSence(int $cagrse_g_grupo_sence) Return ChildCargoGrupoSence objects filtered by the cagrse_g_grupo_sence column
 * @method     ChildCargoGrupoSence[]|ObjectCollection findByCagrseVigente(int $cagrse_vigente) Return ChildCargoGrupoSence objects filtered by the cagrse_vigente column
 * @method     ChildCargoGrupoSence[]|ObjectCollection findByCagrseRFechaCreacion(string $cagrse_r_fecha_creacion) Return ChildCargoGrupoSence objects filtered by the cagrse_r_fecha_creacion column
 * @method     ChildCargoGrupoSence[]|ObjectCollection findByCagrseRFechaModificacion(string $cagrse_r_fecha_modificacion) Return ChildCargoGrupoSence objects filtered by the cagrse_r_fecha_modificacion column
 * @method     ChildCargoGrupoSence[]|ObjectCollection findByCagrseRUsuario(int $cagrse_r_usuario) Return ChildCargoGrupoSence objects filtered by the cagrse_r_usuario column
 * @method     ChildCargoGrupoSence[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CargoGrupoSenceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CargoGrupoSenceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CargoGrupoSence', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCargoGrupoSenceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCargoGrupoSenceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCargoGrupoSenceQuery) {
            return $criteria;
        }
        $query = new ChildCargoGrupoSenceQuery();
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
     * @param array[$cagrse_c_cargo, $cagrse_g_grupo_sence] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCargoGrupoSence|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CargoGrupoSenceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CargoGrupoSenceTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCargoGrupoSence A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT cagrse_c_cargo, cagrse_g_grupo_sence, cagrse_vigente, cagrse_r_fecha_creacion, cagrse_r_fecha_modificacion, cagrse_r_usuario FROM cargo_grupo_sence WHERE cagrse_c_cargo = :p0 AND cagrse_g_grupo_sence = :p1';
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
            /** @var ChildCargoGrupoSence $obj */
            $obj = new ChildCargoGrupoSence();
            $obj->hydrate($row);
            CargoGrupoSenceTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCargoGrupoSence|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the cagrse_c_cargo column
     *
     * Example usage:
     * <code>
     * $query->filterByCagrseCCargo(1234); // WHERE cagrse_c_cargo = 1234
     * $query->filterByCagrseCCargo(array(12, 34)); // WHERE cagrse_c_cargo IN (12, 34)
     * $query->filterByCagrseCCargo(array('min' => 12)); // WHERE cagrse_c_cargo > 12
     * </code>
     *
     * @see       filterByCargo()
     *
     * @param     mixed $cagrseCCargo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByCagrseCCargo($cagrseCCargo = null, $comparison = null)
    {
        if (is_array($cagrseCCargo)) {
            $useMinMax = false;
            if (isset($cagrseCCargo['min'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO, $cagrseCCargo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cagrseCCargo['max'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO, $cagrseCCargo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO, $cagrseCCargo, $comparison);
    }

    /**
     * Filter the query on the cagrse_g_grupo_sence column
     *
     * Example usage:
     * <code>
     * $query->filterByCagrseGGrupoSence(1234); // WHERE cagrse_g_grupo_sence = 1234
     * $query->filterByCagrseGGrupoSence(array(12, 34)); // WHERE cagrse_g_grupo_sence IN (12, 34)
     * $query->filterByCagrseGGrupoSence(array('min' => 12)); // WHERE cagrse_g_grupo_sence > 12
     * </code>
     *
     * @see       filterByGrupoSence()
     *
     * @param     mixed $cagrseGGrupoSence The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByCagrseGGrupoSence($cagrseGGrupoSence = null, $comparison = null)
    {
        if (is_array($cagrseGGrupoSence)) {
            $useMinMax = false;
            if (isset($cagrseGGrupoSence['min'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE, $cagrseGGrupoSence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cagrseGGrupoSence['max'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE, $cagrseGGrupoSence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE, $cagrseGGrupoSence, $comparison);
    }

    /**
     * Filter the query on the cagrse_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByCagrseVigente(1234); // WHERE cagrse_vigente = 1234
     * $query->filterByCagrseVigente(array(12, 34)); // WHERE cagrse_vigente IN (12, 34)
     * $query->filterByCagrseVigente(array('min' => 12)); // WHERE cagrse_vigente > 12
     * </code>
     *
     * @param     mixed $cagrseVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByCagrseVigente($cagrseVigente = null, $comparison = null)
    {
        if (is_array($cagrseVigente)) {
            $useMinMax = false;
            if (isset($cagrseVigente['min'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_VIGENTE, $cagrseVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cagrseVigente['max'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_VIGENTE, $cagrseVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_VIGENTE, $cagrseVigente, $comparison);
    }

    /**
     * Filter the query on the cagrse_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByCagrseRFechaCreacion('2011-03-14'); // WHERE cagrse_r_fecha_creacion = '2011-03-14'
     * $query->filterByCagrseRFechaCreacion('now'); // WHERE cagrse_r_fecha_creacion = '2011-03-14'
     * $query->filterByCagrseRFechaCreacion(array('max' => 'yesterday')); // WHERE cagrse_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $cagrseRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByCagrseRFechaCreacion($cagrseRFechaCreacion = null, $comparison = null)
    {
        if (is_array($cagrseRFechaCreacion)) {
            $useMinMax = false;
            if (isset($cagrseRFechaCreacion['min'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION, $cagrseRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cagrseRFechaCreacion['max'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION, $cagrseRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION, $cagrseRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the cagrse_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByCagrseRFechaModificacion('2011-03-14'); // WHERE cagrse_r_fecha_modificacion = '2011-03-14'
     * $query->filterByCagrseRFechaModificacion('now'); // WHERE cagrse_r_fecha_modificacion = '2011-03-14'
     * $query->filterByCagrseRFechaModificacion(array('max' => 'yesterday')); // WHERE cagrse_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $cagrseRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByCagrseRFechaModificacion($cagrseRFechaModificacion = null, $comparison = null)
    {
        if (is_array($cagrseRFechaModificacion)) {
            $useMinMax = false;
            if (isset($cagrseRFechaModificacion['min'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION, $cagrseRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cagrseRFechaModificacion['max'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION, $cagrseRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION, $cagrseRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the cagrse_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByCagrseRUsuario(1234); // WHERE cagrse_r_usuario = 1234
     * $query->filterByCagrseRUsuario(array(12, 34)); // WHERE cagrse_r_usuario IN (12, 34)
     * $query->filterByCagrseRUsuario(array('min' => 12)); // WHERE cagrse_r_usuario > 12
     * </code>
     *
     * @param     mixed $cagrseRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByCagrseRUsuario($cagrseRUsuario = null, $comparison = null)
    {
        if (is_array($cagrseRUsuario)) {
            $useMinMax = false;
            if (isset($cagrseRUsuario['min'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_R_USUARIO, $cagrseRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cagrseRUsuario['max'])) {
                $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_R_USUARIO, $cagrseRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_R_USUARIO, $cagrseRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Cargo object
     *
     * @param \Cargo|ObjectCollection $cargo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByCargo($cargo, $comparison = null)
    {
        if ($cargo instanceof \Cargo) {
            return $this
                ->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO, $cargo->getCargCodigo(), $comparison);
        } elseif ($cargo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO, $cargo->toKeyValue('PrimaryKey', 'CargCodigo'), $comparison);
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
     * @return $this|ChildCargoGrupoSenceQuery The current query, for fluid interface
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
     * Filter the query by a related \GrupoSence object
     *
     * @param \GrupoSence|ObjectCollection $grupoSence The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByGrupoSence($grupoSence, $comparison = null)
    {
        if ($grupoSence instanceof \GrupoSence) {
            return $this
                ->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE, $grupoSence->getGrseGrupo(), $comparison);
        } elseif ($grupoSence instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE, $grupoSence->toKeyValue('PrimaryKey', 'GrseGrupo'), $comparison);
        } else {
            throw new PropelException('filterByGrupoSence() only accepts arguments of type \GrupoSence or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GrupoSence relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function joinGrupoSence($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GrupoSence');

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
            $this->addJoinObject($join, 'GrupoSence');
        }

        return $this;
    }

    /**
     * Use the GrupoSence relation GrupoSence object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \GrupoSenceQuery A secondary query class using the current class as primary query
     */
    public function useGrupoSenceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGrupoSence($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GrupoSence', '\GrupoSenceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCargoGrupoSence $cargoGrupoSence Object to remove from the list of results
     *
     * @return $this|ChildCargoGrupoSenceQuery The current query, for fluid interface
     */
    public function prune($cargoGrupoSence = null)
    {
        if ($cargoGrupoSence) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO), $cargoGrupoSence->getCagrseCCargo(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE), $cargoGrupoSence->getCagrseGGrupoSence(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cargo_grupo_sence table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CargoGrupoSenceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CargoGrupoSenceTableMap::clearInstancePool();
            CargoGrupoSenceTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CargoGrupoSenceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CargoGrupoSenceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CargoGrupoSenceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CargoGrupoSenceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CargoGrupoSenceQuery
