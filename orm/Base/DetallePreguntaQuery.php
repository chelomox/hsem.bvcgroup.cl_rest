<?php

namespace Base;

use \DetallePregunta as ChildDetallePregunta;
use \DetallePreguntaQuery as ChildDetallePreguntaQuery;
use \Exception;
use \PDO;
use Map\DetallePreguntaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'detalle_pregunta' table.
 *
 *
 *
 * @method     ChildDetallePreguntaQuery orderByDeprCPregunta($order = Criteria::ASC) Order by the depr_c_pregunta column
 * @method     ChildDetallePreguntaQuery orderByDeprCOpcionPregunta($order = Criteria::ASC) Order by the depr_c_opcion_pregunta column
 * @method     ChildDetallePreguntaQuery orderByDeprEsCorrecta($order = Criteria::ASC) Order by the depr_es_correcta column
 * @method     ChildDetallePreguntaQuery orderByDeprOrden($order = Criteria::ASC) Order by the depr_orden column
 * @method     ChildDetallePreguntaQuery orderByDeprVigente($order = Criteria::ASC) Order by the depr_vigente column
 * @method     ChildDetallePreguntaQuery orderByDeprRFechaCreacion($order = Criteria::ASC) Order by the depr_r_fecha_creacion column
 * @method     ChildDetallePreguntaQuery orderByDeprRFechaModificacion($order = Criteria::ASC) Order by the depr_r_fecha_modificacion column
 * @method     ChildDetallePreguntaQuery orderByDeprRUsuario($order = Criteria::ASC) Order by the depr_r_usuario column
 *
 * @method     ChildDetallePreguntaQuery groupByDeprCPregunta() Group by the depr_c_pregunta column
 * @method     ChildDetallePreguntaQuery groupByDeprCOpcionPregunta() Group by the depr_c_opcion_pregunta column
 * @method     ChildDetallePreguntaQuery groupByDeprEsCorrecta() Group by the depr_es_correcta column
 * @method     ChildDetallePreguntaQuery groupByDeprOrden() Group by the depr_orden column
 * @method     ChildDetallePreguntaQuery groupByDeprVigente() Group by the depr_vigente column
 * @method     ChildDetallePreguntaQuery groupByDeprRFechaCreacion() Group by the depr_r_fecha_creacion column
 * @method     ChildDetallePreguntaQuery groupByDeprRFechaModificacion() Group by the depr_r_fecha_modificacion column
 * @method     ChildDetallePreguntaQuery groupByDeprRUsuario() Group by the depr_r_usuario column
 *
 * @method     ChildDetallePreguntaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDetallePreguntaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDetallePreguntaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDetallePreguntaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDetallePreguntaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDetallePreguntaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDetallePreguntaQuery leftJoinOpcionPregunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the OpcionPregunta relation
 * @method     ChildDetallePreguntaQuery rightJoinOpcionPregunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OpcionPregunta relation
 * @method     ChildDetallePreguntaQuery innerJoinOpcionPregunta($relationAlias = null) Adds a INNER JOIN clause to the query using the OpcionPregunta relation
 *
 * @method     ChildDetallePreguntaQuery joinWithOpcionPregunta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the OpcionPregunta relation
 *
 * @method     ChildDetallePreguntaQuery leftJoinWithOpcionPregunta() Adds a LEFT JOIN clause and with to the query using the OpcionPregunta relation
 * @method     ChildDetallePreguntaQuery rightJoinWithOpcionPregunta() Adds a RIGHT JOIN clause and with to the query using the OpcionPregunta relation
 * @method     ChildDetallePreguntaQuery innerJoinWithOpcionPregunta() Adds a INNER JOIN clause and with to the query using the OpcionPregunta relation
 *
 * @method     ChildDetallePreguntaQuery leftJoinPregunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pregunta relation
 * @method     ChildDetallePreguntaQuery rightJoinPregunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pregunta relation
 * @method     ChildDetallePreguntaQuery innerJoinPregunta($relationAlias = null) Adds a INNER JOIN clause to the query using the Pregunta relation
 *
 * @method     ChildDetallePreguntaQuery joinWithPregunta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pregunta relation
 *
 * @method     ChildDetallePreguntaQuery leftJoinWithPregunta() Adds a LEFT JOIN clause and with to the query using the Pregunta relation
 * @method     ChildDetallePreguntaQuery rightJoinWithPregunta() Adds a RIGHT JOIN clause and with to the query using the Pregunta relation
 * @method     ChildDetallePreguntaQuery innerJoinWithPregunta() Adds a INNER JOIN clause and with to the query using the Pregunta relation
 *
 * @method     \OpcionPreguntaQuery|\PreguntaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDetallePregunta findOne(ConnectionInterface $con = null) Return the first ChildDetallePregunta matching the query
 * @method     ChildDetallePregunta findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDetallePregunta matching the query, or a new ChildDetallePregunta object populated from the query conditions when no match is found
 *
 * @method     ChildDetallePregunta findOneByDeprCPregunta(int $depr_c_pregunta) Return the first ChildDetallePregunta filtered by the depr_c_pregunta column
 * @method     ChildDetallePregunta findOneByDeprCOpcionPregunta(int $depr_c_opcion_pregunta) Return the first ChildDetallePregunta filtered by the depr_c_opcion_pregunta column
 * @method     ChildDetallePregunta findOneByDeprEsCorrecta(int $depr_es_correcta) Return the first ChildDetallePregunta filtered by the depr_es_correcta column
 * @method     ChildDetallePregunta findOneByDeprOrden(int $depr_orden) Return the first ChildDetallePregunta filtered by the depr_orden column
 * @method     ChildDetallePregunta findOneByDeprVigente(int $depr_vigente) Return the first ChildDetallePregunta filtered by the depr_vigente column
 * @method     ChildDetallePregunta findOneByDeprRFechaCreacion(string $depr_r_fecha_creacion) Return the first ChildDetallePregunta filtered by the depr_r_fecha_creacion column
 * @method     ChildDetallePregunta findOneByDeprRFechaModificacion(string $depr_r_fecha_modificacion) Return the first ChildDetallePregunta filtered by the depr_r_fecha_modificacion column
 * @method     ChildDetallePregunta findOneByDeprRUsuario(int $depr_r_usuario) Return the first ChildDetallePregunta filtered by the depr_r_usuario column *

 * @method     ChildDetallePregunta requirePk($key, ConnectionInterface $con = null) Return the ChildDetallePregunta by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDetallePregunta requireOne(ConnectionInterface $con = null) Return the first ChildDetallePregunta matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDetallePregunta requireOneByDeprCPregunta(int $depr_c_pregunta) Return the first ChildDetallePregunta filtered by the depr_c_pregunta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDetallePregunta requireOneByDeprCOpcionPregunta(int $depr_c_opcion_pregunta) Return the first ChildDetallePregunta filtered by the depr_c_opcion_pregunta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDetallePregunta requireOneByDeprEsCorrecta(int $depr_es_correcta) Return the first ChildDetallePregunta filtered by the depr_es_correcta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDetallePregunta requireOneByDeprOrden(int $depr_orden) Return the first ChildDetallePregunta filtered by the depr_orden column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDetallePregunta requireOneByDeprVigente(int $depr_vigente) Return the first ChildDetallePregunta filtered by the depr_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDetallePregunta requireOneByDeprRFechaCreacion(string $depr_r_fecha_creacion) Return the first ChildDetallePregunta filtered by the depr_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDetallePregunta requireOneByDeprRFechaModificacion(string $depr_r_fecha_modificacion) Return the first ChildDetallePregunta filtered by the depr_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDetallePregunta requireOneByDeprRUsuario(int $depr_r_usuario) Return the first ChildDetallePregunta filtered by the depr_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDetallePregunta[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDetallePregunta objects based on current ModelCriteria
 * @method     ChildDetallePregunta[]|ObjectCollection findByDeprCPregunta(int $depr_c_pregunta) Return ChildDetallePregunta objects filtered by the depr_c_pregunta column
 * @method     ChildDetallePregunta[]|ObjectCollection findByDeprCOpcionPregunta(int $depr_c_opcion_pregunta) Return ChildDetallePregunta objects filtered by the depr_c_opcion_pregunta column
 * @method     ChildDetallePregunta[]|ObjectCollection findByDeprEsCorrecta(int $depr_es_correcta) Return ChildDetallePregunta objects filtered by the depr_es_correcta column
 * @method     ChildDetallePregunta[]|ObjectCollection findByDeprOrden(int $depr_orden) Return ChildDetallePregunta objects filtered by the depr_orden column
 * @method     ChildDetallePregunta[]|ObjectCollection findByDeprVigente(int $depr_vigente) Return ChildDetallePregunta objects filtered by the depr_vigente column
 * @method     ChildDetallePregunta[]|ObjectCollection findByDeprRFechaCreacion(string $depr_r_fecha_creacion) Return ChildDetallePregunta objects filtered by the depr_r_fecha_creacion column
 * @method     ChildDetallePregunta[]|ObjectCollection findByDeprRFechaModificacion(string $depr_r_fecha_modificacion) Return ChildDetallePregunta objects filtered by the depr_r_fecha_modificacion column
 * @method     ChildDetallePregunta[]|ObjectCollection findByDeprRUsuario(int $depr_r_usuario) Return ChildDetallePregunta objects filtered by the depr_r_usuario column
 * @method     ChildDetallePregunta[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DetallePreguntaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DetallePreguntaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DetallePregunta', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDetallePreguntaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDetallePreguntaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDetallePreguntaQuery) {
            return $criteria;
        }
        $query = new ChildDetallePreguntaQuery();
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
     * @param array[$depr_c_pregunta, $depr_c_opcion_pregunta] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDetallePregunta|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DetallePreguntaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DetallePreguntaTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildDetallePregunta A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT depr_c_pregunta, depr_c_opcion_pregunta, depr_es_correcta, depr_orden, depr_vigente, depr_r_fecha_creacion, depr_r_fecha_modificacion, depr_r_usuario FROM detalle_pregunta WHERE depr_c_pregunta = :p0 AND depr_c_opcion_pregunta = :p1';
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
            /** @var ChildDetallePregunta $obj */
            $obj = new ChildDetallePregunta();
            $obj->hydrate($row);
            DetallePreguntaTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildDetallePregunta|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the depr_c_pregunta column
     *
     * Example usage:
     * <code>
     * $query->filterByDeprCPregunta(1234); // WHERE depr_c_pregunta = 1234
     * $query->filterByDeprCPregunta(array(12, 34)); // WHERE depr_c_pregunta IN (12, 34)
     * $query->filterByDeprCPregunta(array('min' => 12)); // WHERE depr_c_pregunta > 12
     * </code>
     *
     * @see       filterByPregunta()
     *
     * @param     mixed $deprCPregunta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByDeprCPregunta($deprCPregunta = null, $comparison = null)
    {
        if (is_array($deprCPregunta)) {
            $useMinMax = false;
            if (isset($deprCPregunta['min'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA, $deprCPregunta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deprCPregunta['max'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA, $deprCPregunta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA, $deprCPregunta, $comparison);
    }

    /**
     * Filter the query on the depr_c_opcion_pregunta column
     *
     * Example usage:
     * <code>
     * $query->filterByDeprCOpcionPregunta(1234); // WHERE depr_c_opcion_pregunta = 1234
     * $query->filterByDeprCOpcionPregunta(array(12, 34)); // WHERE depr_c_opcion_pregunta IN (12, 34)
     * $query->filterByDeprCOpcionPregunta(array('min' => 12)); // WHERE depr_c_opcion_pregunta > 12
     * </code>
     *
     * @see       filterByOpcionPregunta()
     *
     * @param     mixed $deprCOpcionPregunta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByDeprCOpcionPregunta($deprCOpcionPregunta = null, $comparison = null)
    {
        if (is_array($deprCOpcionPregunta)) {
            $useMinMax = false;
            if (isset($deprCOpcionPregunta['min'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA, $deprCOpcionPregunta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deprCOpcionPregunta['max'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA, $deprCOpcionPregunta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA, $deprCOpcionPregunta, $comparison);
    }

    /**
     * Filter the query on the depr_es_correcta column
     *
     * Example usage:
     * <code>
     * $query->filterByDeprEsCorrecta(1234); // WHERE depr_es_correcta = 1234
     * $query->filterByDeprEsCorrecta(array(12, 34)); // WHERE depr_es_correcta IN (12, 34)
     * $query->filterByDeprEsCorrecta(array('min' => 12)); // WHERE depr_es_correcta > 12
     * </code>
     *
     * @param     mixed $deprEsCorrecta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByDeprEsCorrecta($deprEsCorrecta = null, $comparison = null)
    {
        if (is_array($deprEsCorrecta)) {
            $useMinMax = false;
            if (isset($deprEsCorrecta['min'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_ES_CORRECTA, $deprEsCorrecta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deprEsCorrecta['max'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_ES_CORRECTA, $deprEsCorrecta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_ES_CORRECTA, $deprEsCorrecta, $comparison);
    }

    /**
     * Filter the query on the depr_orden column
     *
     * Example usage:
     * <code>
     * $query->filterByDeprOrden(1234); // WHERE depr_orden = 1234
     * $query->filterByDeprOrden(array(12, 34)); // WHERE depr_orden IN (12, 34)
     * $query->filterByDeprOrden(array('min' => 12)); // WHERE depr_orden > 12
     * </code>
     *
     * @param     mixed $deprOrden The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByDeprOrden($deprOrden = null, $comparison = null)
    {
        if (is_array($deprOrden)) {
            $useMinMax = false;
            if (isset($deprOrden['min'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_ORDEN, $deprOrden['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deprOrden['max'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_ORDEN, $deprOrden['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_ORDEN, $deprOrden, $comparison);
    }

    /**
     * Filter the query on the depr_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByDeprVigente(1234); // WHERE depr_vigente = 1234
     * $query->filterByDeprVigente(array(12, 34)); // WHERE depr_vigente IN (12, 34)
     * $query->filterByDeprVigente(array('min' => 12)); // WHERE depr_vigente > 12
     * </code>
     *
     * @param     mixed $deprVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByDeprVigente($deprVigente = null, $comparison = null)
    {
        if (is_array($deprVigente)) {
            $useMinMax = false;
            if (isset($deprVigente['min'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_VIGENTE, $deprVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deprVigente['max'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_VIGENTE, $deprVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_VIGENTE, $deprVigente, $comparison);
    }

    /**
     * Filter the query on the depr_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDeprRFechaCreacion('2011-03-14'); // WHERE depr_r_fecha_creacion = '2011-03-14'
     * $query->filterByDeprRFechaCreacion('now'); // WHERE depr_r_fecha_creacion = '2011-03-14'
     * $query->filterByDeprRFechaCreacion(array('max' => 'yesterday')); // WHERE depr_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $deprRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByDeprRFechaCreacion($deprRFechaCreacion = null, $comparison = null)
    {
        if (is_array($deprRFechaCreacion)) {
            $useMinMax = false;
            if (isset($deprRFechaCreacion['min'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_R_FECHA_CREACION, $deprRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deprRFechaCreacion['max'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_R_FECHA_CREACION, $deprRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_R_FECHA_CREACION, $deprRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the depr_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDeprRFechaModificacion('2011-03-14'); // WHERE depr_r_fecha_modificacion = '2011-03-14'
     * $query->filterByDeprRFechaModificacion('now'); // WHERE depr_r_fecha_modificacion = '2011-03-14'
     * $query->filterByDeprRFechaModificacion(array('max' => 'yesterday')); // WHERE depr_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $deprRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByDeprRFechaModificacion($deprRFechaModificacion = null, $comparison = null)
    {
        if (is_array($deprRFechaModificacion)) {
            $useMinMax = false;
            if (isset($deprRFechaModificacion['min'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_R_FECHA_MODIFICACION, $deprRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deprRFechaModificacion['max'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_R_FECHA_MODIFICACION, $deprRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_R_FECHA_MODIFICACION, $deprRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the depr_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByDeprRUsuario(1234); // WHERE depr_r_usuario = 1234
     * $query->filterByDeprRUsuario(array(12, 34)); // WHERE depr_r_usuario IN (12, 34)
     * $query->filterByDeprRUsuario(array('min' => 12)); // WHERE depr_r_usuario > 12
     * </code>
     *
     * @param     mixed $deprRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByDeprRUsuario($deprRUsuario = null, $comparison = null)
    {
        if (is_array($deprRUsuario)) {
            $useMinMax = false;
            if (isset($deprRUsuario['min'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_R_USUARIO, $deprRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deprRUsuario['max'])) {
                $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_R_USUARIO, $deprRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_R_USUARIO, $deprRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \OpcionPregunta object
     *
     * @param \OpcionPregunta|ObjectCollection $opcionPregunta The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByOpcionPregunta($opcionPregunta, $comparison = null)
    {
        if ($opcionPregunta instanceof \OpcionPregunta) {
            return $this
                ->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA, $opcionPregunta->getOpprCodigo(), $comparison);
        } elseif ($opcionPregunta instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA, $opcionPregunta->toKeyValue('PrimaryKey', 'OpprCodigo'), $comparison);
        } else {
            throw new PropelException('filterByOpcionPregunta() only accepts arguments of type \OpcionPregunta or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OpcionPregunta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function joinOpcionPregunta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OpcionPregunta');

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
            $this->addJoinObject($join, 'OpcionPregunta');
        }

        return $this;
    }

    /**
     * Use the OpcionPregunta relation OpcionPregunta object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \OpcionPreguntaQuery A secondary query class using the current class as primary query
     */
    public function useOpcionPreguntaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOpcionPregunta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OpcionPregunta', '\OpcionPreguntaQuery');
    }

    /**
     * Filter the query by a related \Pregunta object
     *
     * @param \Pregunta|ObjectCollection $pregunta The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function filterByPregunta($pregunta, $comparison = null)
    {
        if ($pregunta instanceof \Pregunta) {
            return $this
                ->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA, $pregunta->getPregCodigo(), $comparison);
        } elseif ($pregunta instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA, $pregunta->toKeyValue('PrimaryKey', 'PregCodigo'), $comparison);
        } else {
            throw new PropelException('filterByPregunta() only accepts arguments of type \Pregunta or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pregunta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function joinPregunta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pregunta');

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
            $this->addJoinObject($join, 'Pregunta');
        }

        return $this;
    }

    /**
     * Use the Pregunta relation Pregunta object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PreguntaQuery A secondary query class using the current class as primary query
     */
    public function usePreguntaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPregunta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pregunta', '\PreguntaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDetallePregunta $detallePregunta Object to remove from the list of results
     *
     * @return $this|ChildDetallePreguntaQuery The current query, for fluid interface
     */
    public function prune($detallePregunta = null)
    {
        if ($detallePregunta) {
            $this->addCond('pruneCond0', $this->getAliasedColName(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA), $detallePregunta->getDeprCPregunta(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA), $detallePregunta->getDeprCOpcionPregunta(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the detalle_pregunta table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DetallePreguntaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DetallePreguntaTableMap::clearInstancePool();
            DetallePreguntaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DetallePreguntaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DetallePreguntaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DetallePreguntaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DetallePreguntaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DetallePreguntaQuery
