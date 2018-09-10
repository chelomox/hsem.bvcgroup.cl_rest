<?php

namespace Base;

use \EvaluacionMarcador as ChildEvaluacionMarcador;
use \EvaluacionMarcadorQuery as ChildEvaluacionMarcadorQuery;
use \Exception;
use \PDO;
use Map\EvaluacionMarcadorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'evaluacion_marcador' table.
 *
 *
 *
 * @method     ChildEvaluacionMarcadorQuery orderByEvmaCEvaluacion($order = Criteria::ASC) Order by the evma_c_evaluacion column
 * @method     ChildEvaluacionMarcadorQuery orderByEvmaCMarcador($order = Criteria::ASC) Order by the evma_c_marcador column
 * @method     ChildEvaluacionMarcadorQuery orderByEvmaVigente($order = Criteria::ASC) Order by the evma_vigente column
 * @method     ChildEvaluacionMarcadorQuery orderByEvmaRFechaCreacion($order = Criteria::ASC) Order by the evma_r_fecha_creacion column
 * @method     ChildEvaluacionMarcadorQuery orderByEvmaRFechaModificacion($order = Criteria::ASC) Order by the evma_r_fecha_modificacion column
 * @method     ChildEvaluacionMarcadorQuery orderByEvmaRUsuario($order = Criteria::ASC) Order by the evma_r_usuario column
 *
 * @method     ChildEvaluacionMarcadorQuery groupByEvmaCEvaluacion() Group by the evma_c_evaluacion column
 * @method     ChildEvaluacionMarcadorQuery groupByEvmaCMarcador() Group by the evma_c_marcador column
 * @method     ChildEvaluacionMarcadorQuery groupByEvmaVigente() Group by the evma_vigente column
 * @method     ChildEvaluacionMarcadorQuery groupByEvmaRFechaCreacion() Group by the evma_r_fecha_creacion column
 * @method     ChildEvaluacionMarcadorQuery groupByEvmaRFechaModificacion() Group by the evma_r_fecha_modificacion column
 * @method     ChildEvaluacionMarcadorQuery groupByEvmaRUsuario() Group by the evma_r_usuario column
 *
 * @method     ChildEvaluacionMarcadorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEvaluacionMarcadorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEvaluacionMarcadorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEvaluacionMarcadorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEvaluacionMarcadorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEvaluacionMarcadorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEvaluacionMarcadorQuery leftJoinEvaluacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Evaluacion relation
 * @method     ChildEvaluacionMarcadorQuery rightJoinEvaluacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Evaluacion relation
 * @method     ChildEvaluacionMarcadorQuery innerJoinEvaluacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Evaluacion relation
 *
 * @method     ChildEvaluacionMarcadorQuery joinWithEvaluacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Evaluacion relation
 *
 * @method     ChildEvaluacionMarcadorQuery leftJoinWithEvaluacion() Adds a LEFT JOIN clause and with to the query using the Evaluacion relation
 * @method     ChildEvaluacionMarcadorQuery rightJoinWithEvaluacion() Adds a RIGHT JOIN clause and with to the query using the Evaluacion relation
 * @method     ChildEvaluacionMarcadorQuery innerJoinWithEvaluacion() Adds a INNER JOIN clause and with to the query using the Evaluacion relation
 *
 * @method     ChildEvaluacionMarcadorQuery leftJoinMarcador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marcador relation
 * @method     ChildEvaluacionMarcadorQuery rightJoinMarcador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marcador relation
 * @method     ChildEvaluacionMarcadorQuery innerJoinMarcador($relationAlias = null) Adds a INNER JOIN clause to the query using the Marcador relation
 *
 * @method     ChildEvaluacionMarcadorQuery joinWithMarcador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Marcador relation
 *
 * @method     ChildEvaluacionMarcadorQuery leftJoinWithMarcador() Adds a LEFT JOIN clause and with to the query using the Marcador relation
 * @method     ChildEvaluacionMarcadorQuery rightJoinWithMarcador() Adds a RIGHT JOIN clause and with to the query using the Marcador relation
 * @method     ChildEvaluacionMarcadorQuery innerJoinWithMarcador() Adds a INNER JOIN clause and with to the query using the Marcador relation
 *
 * @method     \EvaluacionQuery|\MarcadorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEvaluacionMarcador findOne(ConnectionInterface $con = null) Return the first ChildEvaluacionMarcador matching the query
 * @method     ChildEvaluacionMarcador findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEvaluacionMarcador matching the query, or a new ChildEvaluacionMarcador object populated from the query conditions when no match is found
 *
 * @method     ChildEvaluacionMarcador findOneByEvmaCEvaluacion(int $evma_c_evaluacion) Return the first ChildEvaluacionMarcador filtered by the evma_c_evaluacion column
 * @method     ChildEvaluacionMarcador findOneByEvmaCMarcador(int $evma_c_marcador) Return the first ChildEvaluacionMarcador filtered by the evma_c_marcador column
 * @method     ChildEvaluacionMarcador findOneByEvmaVigente(int $evma_vigente) Return the first ChildEvaluacionMarcador filtered by the evma_vigente column
 * @method     ChildEvaluacionMarcador findOneByEvmaRFechaCreacion(string $evma_r_fecha_creacion) Return the first ChildEvaluacionMarcador filtered by the evma_r_fecha_creacion column
 * @method     ChildEvaluacionMarcador findOneByEvmaRFechaModificacion(string $evma_r_fecha_modificacion) Return the first ChildEvaluacionMarcador filtered by the evma_r_fecha_modificacion column
 * @method     ChildEvaluacionMarcador findOneByEvmaRUsuario(int $evma_r_usuario) Return the first ChildEvaluacionMarcador filtered by the evma_r_usuario column *

 * @method     ChildEvaluacionMarcador requirePk($key, ConnectionInterface $con = null) Return the ChildEvaluacionMarcador by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionMarcador requireOne(ConnectionInterface $con = null) Return the first ChildEvaluacionMarcador matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEvaluacionMarcador requireOneByEvmaCEvaluacion(int $evma_c_evaluacion) Return the first ChildEvaluacionMarcador filtered by the evma_c_evaluacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionMarcador requireOneByEvmaCMarcador(int $evma_c_marcador) Return the first ChildEvaluacionMarcador filtered by the evma_c_marcador column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionMarcador requireOneByEvmaVigente(int $evma_vigente) Return the first ChildEvaluacionMarcador filtered by the evma_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionMarcador requireOneByEvmaRFechaCreacion(string $evma_r_fecha_creacion) Return the first ChildEvaluacionMarcador filtered by the evma_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionMarcador requireOneByEvmaRFechaModificacion(string $evma_r_fecha_modificacion) Return the first ChildEvaluacionMarcador filtered by the evma_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionMarcador requireOneByEvmaRUsuario(int $evma_r_usuario) Return the first ChildEvaluacionMarcador filtered by the evma_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEvaluacionMarcador[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEvaluacionMarcador objects based on current ModelCriteria
 * @method     ChildEvaluacionMarcador[]|ObjectCollection findByEvmaCEvaluacion(int $evma_c_evaluacion) Return ChildEvaluacionMarcador objects filtered by the evma_c_evaluacion column
 * @method     ChildEvaluacionMarcador[]|ObjectCollection findByEvmaCMarcador(int $evma_c_marcador) Return ChildEvaluacionMarcador objects filtered by the evma_c_marcador column
 * @method     ChildEvaluacionMarcador[]|ObjectCollection findByEvmaVigente(int $evma_vigente) Return ChildEvaluacionMarcador objects filtered by the evma_vigente column
 * @method     ChildEvaluacionMarcador[]|ObjectCollection findByEvmaRFechaCreacion(string $evma_r_fecha_creacion) Return ChildEvaluacionMarcador objects filtered by the evma_r_fecha_creacion column
 * @method     ChildEvaluacionMarcador[]|ObjectCollection findByEvmaRFechaModificacion(string $evma_r_fecha_modificacion) Return ChildEvaluacionMarcador objects filtered by the evma_r_fecha_modificacion column
 * @method     ChildEvaluacionMarcador[]|ObjectCollection findByEvmaRUsuario(int $evma_r_usuario) Return ChildEvaluacionMarcador objects filtered by the evma_r_usuario column
 * @method     ChildEvaluacionMarcador[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EvaluacionMarcadorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EvaluacionMarcadorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\EvaluacionMarcador', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEvaluacionMarcadorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEvaluacionMarcadorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEvaluacionMarcadorQuery) {
            return $criteria;
        }
        $query = new ChildEvaluacionMarcadorQuery();
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
     * @param array[$evma_c_evaluacion, $evma_c_marcador] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildEvaluacionMarcador|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EvaluacionMarcadorTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EvaluacionMarcadorTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildEvaluacionMarcador A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT evma_c_evaluacion, evma_c_marcador, evma_vigente, evma_r_fecha_creacion, evma_r_fecha_modificacion, evma_r_usuario FROM evaluacion_marcador WHERE evma_c_evaluacion = :p0 AND evma_c_marcador = :p1';
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
            /** @var ChildEvaluacionMarcador $obj */
            $obj = new ChildEvaluacionMarcador();
            $obj->hydrate($row);
            EvaluacionMarcadorTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildEvaluacionMarcador|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the evma_c_evaluacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvmaCEvaluacion(1234); // WHERE evma_c_evaluacion = 1234
     * $query->filterByEvmaCEvaluacion(array(12, 34)); // WHERE evma_c_evaluacion IN (12, 34)
     * $query->filterByEvmaCEvaluacion(array('min' => 12)); // WHERE evma_c_evaluacion > 12
     * </code>
     *
     * @see       filterByEvaluacion()
     *
     * @param     mixed $evmaCEvaluacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function filterByEvmaCEvaluacion($evmaCEvaluacion = null, $comparison = null)
    {
        if (is_array($evmaCEvaluacion)) {
            $useMinMax = false;
            if (isset($evmaCEvaluacion['min'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION, $evmaCEvaluacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evmaCEvaluacion['max'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION, $evmaCEvaluacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION, $evmaCEvaluacion, $comparison);
    }

    /**
     * Filter the query on the evma_c_marcador column
     *
     * Example usage:
     * <code>
     * $query->filterByEvmaCMarcador(1234); // WHERE evma_c_marcador = 1234
     * $query->filterByEvmaCMarcador(array(12, 34)); // WHERE evma_c_marcador IN (12, 34)
     * $query->filterByEvmaCMarcador(array('min' => 12)); // WHERE evma_c_marcador > 12
     * </code>
     *
     * @see       filterByMarcador()
     *
     * @param     mixed $evmaCMarcador The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function filterByEvmaCMarcador($evmaCMarcador = null, $comparison = null)
    {
        if (is_array($evmaCMarcador)) {
            $useMinMax = false;
            if (isset($evmaCMarcador['min'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR, $evmaCMarcador['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evmaCMarcador['max'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR, $evmaCMarcador['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR, $evmaCMarcador, $comparison);
    }

    /**
     * Filter the query on the evma_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByEvmaVigente(1234); // WHERE evma_vigente = 1234
     * $query->filterByEvmaVigente(array(12, 34)); // WHERE evma_vigente IN (12, 34)
     * $query->filterByEvmaVigente(array('min' => 12)); // WHERE evma_vigente > 12
     * </code>
     *
     * @param     mixed $evmaVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function filterByEvmaVigente($evmaVigente = null, $comparison = null)
    {
        if (is_array($evmaVigente)) {
            $useMinMax = false;
            if (isset($evmaVigente['min'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_VIGENTE, $evmaVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evmaVigente['max'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_VIGENTE, $evmaVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_VIGENTE, $evmaVigente, $comparison);
    }

    /**
     * Filter the query on the evma_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvmaRFechaCreacion('2011-03-14'); // WHERE evma_r_fecha_creacion = '2011-03-14'
     * $query->filterByEvmaRFechaCreacion('now'); // WHERE evma_r_fecha_creacion = '2011-03-14'
     * $query->filterByEvmaRFechaCreacion(array('max' => 'yesterday')); // WHERE evma_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $evmaRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function filterByEvmaRFechaCreacion($evmaRFechaCreacion = null, $comparison = null)
    {
        if (is_array($evmaRFechaCreacion)) {
            $useMinMax = false;
            if (isset($evmaRFechaCreacion['min'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_CREACION, $evmaRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evmaRFechaCreacion['max'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_CREACION, $evmaRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_CREACION, $evmaRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the evma_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvmaRFechaModificacion('2011-03-14'); // WHERE evma_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEvmaRFechaModificacion('now'); // WHERE evma_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEvmaRFechaModificacion(array('max' => 'yesterday')); // WHERE evma_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $evmaRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function filterByEvmaRFechaModificacion($evmaRFechaModificacion = null, $comparison = null)
    {
        if (is_array($evmaRFechaModificacion)) {
            $useMinMax = false;
            if (isset($evmaRFechaModificacion['min'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_MODIFICACION, $evmaRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evmaRFechaModificacion['max'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_MODIFICACION, $evmaRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_MODIFICACION, $evmaRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the evma_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEvmaRUsuario(1234); // WHERE evma_r_usuario = 1234
     * $query->filterByEvmaRUsuario(array(12, 34)); // WHERE evma_r_usuario IN (12, 34)
     * $query->filterByEvmaRUsuario(array('min' => 12)); // WHERE evma_r_usuario > 12
     * </code>
     *
     * @param     mixed $evmaRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function filterByEvmaRUsuario($evmaRUsuario = null, $comparison = null)
    {
        if (is_array($evmaRUsuario)) {
            $useMinMax = false;
            if (isset($evmaRUsuario['min'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_R_USUARIO, $evmaRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evmaRUsuario['max'])) {
                $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_R_USUARIO, $evmaRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_R_USUARIO, $evmaRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Evaluacion object
     *
     * @param \Evaluacion|ObjectCollection $evaluacion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function filterByEvaluacion($evaluacion, $comparison = null)
    {
        if ($evaluacion instanceof \Evaluacion) {
            return $this
                ->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION, $evaluacion->getEvalCodigo(), $comparison);
        } elseif ($evaluacion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION, $evaluacion->toKeyValue('PrimaryKey', 'EvalCodigo'), $comparison);
        } else {
            throw new PropelException('filterByEvaluacion() only accepts arguments of type \Evaluacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Evaluacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function joinEvaluacion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Evaluacion');

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
            $this->addJoinObject($join, 'Evaluacion');
        }

        return $this;
    }

    /**
     * Use the Evaluacion relation Evaluacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EvaluacionQuery A secondary query class using the current class as primary query
     */
    public function useEvaluacionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvaluacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Evaluacion', '\EvaluacionQuery');
    }

    /**
     * Filter the query by a related \Marcador object
     *
     * @param \Marcador|ObjectCollection $marcador The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function filterByMarcador($marcador, $comparison = null)
    {
        if ($marcador instanceof \Marcador) {
            return $this
                ->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR, $marcador->getMarcCodigo(), $comparison);
        } elseif ($marcador instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR, $marcador->toKeyValue('PrimaryKey', 'MarcCodigo'), $comparison);
        } else {
            throw new PropelException('filterByMarcador() only accepts arguments of type \Marcador or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Marcador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function joinMarcador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Marcador');

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
            $this->addJoinObject($join, 'Marcador');
        }

        return $this;
    }

    /**
     * Use the Marcador relation Marcador object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MarcadorQuery A secondary query class using the current class as primary query
     */
    public function useMarcadorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMarcador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Marcador', '\MarcadorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEvaluacionMarcador $evaluacionMarcador Object to remove from the list of results
     *
     * @return $this|ChildEvaluacionMarcadorQuery The current query, for fluid interface
     */
    public function prune($evaluacionMarcador = null)
    {
        if ($evaluacionMarcador) {
            $this->addCond('pruneCond0', $this->getAliasedColName(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION), $evaluacionMarcador->getEvmaCEvaluacion(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR), $evaluacionMarcador->getEvmaCMarcador(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the evaluacion_marcador table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionMarcadorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EvaluacionMarcadorTableMap::clearInstancePool();
            EvaluacionMarcadorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionMarcadorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EvaluacionMarcadorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EvaluacionMarcadorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EvaluacionMarcadorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EvaluacionMarcadorQuery
