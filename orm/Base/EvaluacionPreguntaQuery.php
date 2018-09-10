<?php

namespace Base;

use \EvaluacionPregunta as ChildEvaluacionPregunta;
use \EvaluacionPreguntaQuery as ChildEvaluacionPreguntaQuery;
use \Exception;
use \PDO;
use Map\EvaluacionPreguntaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'evaluacion_pregunta' table.
 *
 *
 *
 * @method     ChildEvaluacionPreguntaQuery orderByEvprCodigo($order = Criteria::ASC) Order by the evpr_codigo column
 * @method     ChildEvaluacionPreguntaQuery orderByEvprCEvaluacion($order = Criteria::ASC) Order by the evpr_c_evaluacion column
 * @method     ChildEvaluacionPreguntaQuery orderByEvprCPregunta($order = Criteria::ASC) Order by the evpr_c_pregunta column
 * @method     ChildEvaluacionPreguntaQuery orderByEvprCObjetivo($order = Criteria::ASC) Order by the evpr_c_objetivo column
 * @method     ChildEvaluacionPreguntaQuery orderByEvprCSeccion($order = Criteria::ASC) Order by the evpr_c_seccion column
 * @method     ChildEvaluacionPreguntaQuery orderByEvprOrden($order = Criteria::ASC) Order by the evpr_orden column
 * @method     ChildEvaluacionPreguntaQuery orderByEvprRFechaCreacion($order = Criteria::ASC) Order by the evpr_r_fecha_creacion column
 * @method     ChildEvaluacionPreguntaQuery orderByEvprRFechaModificacion($order = Criteria::ASC) Order by the evpr_r_fecha_modificacion column
 * @method     ChildEvaluacionPreguntaQuery orderByEvprRUsuario($order = Criteria::ASC) Order by the evpr_r_usuario column
 *
 * @method     ChildEvaluacionPreguntaQuery groupByEvprCodigo() Group by the evpr_codigo column
 * @method     ChildEvaluacionPreguntaQuery groupByEvprCEvaluacion() Group by the evpr_c_evaluacion column
 * @method     ChildEvaluacionPreguntaQuery groupByEvprCPregunta() Group by the evpr_c_pregunta column
 * @method     ChildEvaluacionPreguntaQuery groupByEvprCObjetivo() Group by the evpr_c_objetivo column
 * @method     ChildEvaluacionPreguntaQuery groupByEvprCSeccion() Group by the evpr_c_seccion column
 * @method     ChildEvaluacionPreguntaQuery groupByEvprOrden() Group by the evpr_orden column
 * @method     ChildEvaluacionPreguntaQuery groupByEvprRFechaCreacion() Group by the evpr_r_fecha_creacion column
 * @method     ChildEvaluacionPreguntaQuery groupByEvprRFechaModificacion() Group by the evpr_r_fecha_modificacion column
 * @method     ChildEvaluacionPreguntaQuery groupByEvprRUsuario() Group by the evpr_r_usuario column
 *
 * @method     ChildEvaluacionPreguntaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEvaluacionPreguntaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEvaluacionPreguntaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEvaluacionPreguntaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEvaluacionPreguntaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEvaluacionPreguntaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEvaluacionPreguntaQuery leftJoinEvaluacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Evaluacion relation
 * @method     ChildEvaluacionPreguntaQuery rightJoinEvaluacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Evaluacion relation
 * @method     ChildEvaluacionPreguntaQuery innerJoinEvaluacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Evaluacion relation
 *
 * @method     ChildEvaluacionPreguntaQuery joinWithEvaluacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Evaluacion relation
 *
 * @method     ChildEvaluacionPreguntaQuery leftJoinWithEvaluacion() Adds a LEFT JOIN clause and with to the query using the Evaluacion relation
 * @method     ChildEvaluacionPreguntaQuery rightJoinWithEvaluacion() Adds a RIGHT JOIN clause and with to the query using the Evaluacion relation
 * @method     ChildEvaluacionPreguntaQuery innerJoinWithEvaluacion() Adds a INNER JOIN clause and with to the query using the Evaluacion relation
 *
 * @method     ChildEvaluacionPreguntaQuery leftJoinObjetivo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Objetivo relation
 * @method     ChildEvaluacionPreguntaQuery rightJoinObjetivo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Objetivo relation
 * @method     ChildEvaluacionPreguntaQuery innerJoinObjetivo($relationAlias = null) Adds a INNER JOIN clause to the query using the Objetivo relation
 *
 * @method     ChildEvaluacionPreguntaQuery joinWithObjetivo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Objetivo relation
 *
 * @method     ChildEvaluacionPreguntaQuery leftJoinWithObjetivo() Adds a LEFT JOIN clause and with to the query using the Objetivo relation
 * @method     ChildEvaluacionPreguntaQuery rightJoinWithObjetivo() Adds a RIGHT JOIN clause and with to the query using the Objetivo relation
 * @method     ChildEvaluacionPreguntaQuery innerJoinWithObjetivo() Adds a INNER JOIN clause and with to the query using the Objetivo relation
 *
 * @method     ChildEvaluacionPreguntaQuery leftJoinPregunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pregunta relation
 * @method     ChildEvaluacionPreguntaQuery rightJoinPregunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pregunta relation
 * @method     ChildEvaluacionPreguntaQuery innerJoinPregunta($relationAlias = null) Adds a INNER JOIN clause to the query using the Pregunta relation
 *
 * @method     ChildEvaluacionPreguntaQuery joinWithPregunta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pregunta relation
 *
 * @method     ChildEvaluacionPreguntaQuery leftJoinWithPregunta() Adds a LEFT JOIN clause and with to the query using the Pregunta relation
 * @method     ChildEvaluacionPreguntaQuery rightJoinWithPregunta() Adds a RIGHT JOIN clause and with to the query using the Pregunta relation
 * @method     ChildEvaluacionPreguntaQuery innerJoinWithPregunta() Adds a INNER JOIN clause and with to the query using the Pregunta relation
 *
 * @method     ChildEvaluacionPreguntaQuery leftJoinSeccion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Seccion relation
 * @method     ChildEvaluacionPreguntaQuery rightJoinSeccion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Seccion relation
 * @method     ChildEvaluacionPreguntaQuery innerJoinSeccion($relationAlias = null) Adds a INNER JOIN clause to the query using the Seccion relation
 *
 * @method     ChildEvaluacionPreguntaQuery joinWithSeccion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Seccion relation
 *
 * @method     ChildEvaluacionPreguntaQuery leftJoinWithSeccion() Adds a LEFT JOIN clause and with to the query using the Seccion relation
 * @method     ChildEvaluacionPreguntaQuery rightJoinWithSeccion() Adds a RIGHT JOIN clause and with to the query using the Seccion relation
 * @method     ChildEvaluacionPreguntaQuery innerJoinWithSeccion() Adds a INNER JOIN clause and with to the query using the Seccion relation
 *
 * @method     \EvaluacionQuery|\ObjetivoQuery|\PreguntaQuery|\SeccionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEvaluacionPregunta findOne(ConnectionInterface $con = null) Return the first ChildEvaluacionPregunta matching the query
 * @method     ChildEvaluacionPregunta findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEvaluacionPregunta matching the query, or a new ChildEvaluacionPregunta object populated from the query conditions when no match is found
 *
 * @method     ChildEvaluacionPregunta findOneByEvprCodigo(int $evpr_codigo) Return the first ChildEvaluacionPregunta filtered by the evpr_codigo column
 * @method     ChildEvaluacionPregunta findOneByEvprCEvaluacion(int $evpr_c_evaluacion) Return the first ChildEvaluacionPregunta filtered by the evpr_c_evaluacion column
 * @method     ChildEvaluacionPregunta findOneByEvprCPregunta(int $evpr_c_pregunta) Return the first ChildEvaluacionPregunta filtered by the evpr_c_pregunta column
 * @method     ChildEvaluacionPregunta findOneByEvprCObjetivo(int $evpr_c_objetivo) Return the first ChildEvaluacionPregunta filtered by the evpr_c_objetivo column
 * @method     ChildEvaluacionPregunta findOneByEvprCSeccion(int $evpr_c_seccion) Return the first ChildEvaluacionPregunta filtered by the evpr_c_seccion column
 * @method     ChildEvaluacionPregunta findOneByEvprOrden(int $evpr_orden) Return the first ChildEvaluacionPregunta filtered by the evpr_orden column
 * @method     ChildEvaluacionPregunta findOneByEvprRFechaCreacion(string $evpr_r_fecha_creacion) Return the first ChildEvaluacionPregunta filtered by the evpr_r_fecha_creacion column
 * @method     ChildEvaluacionPregunta findOneByEvprRFechaModificacion(string $evpr_r_fecha_modificacion) Return the first ChildEvaluacionPregunta filtered by the evpr_r_fecha_modificacion column
 * @method     ChildEvaluacionPregunta findOneByEvprRUsuario(int $evpr_r_usuario) Return the first ChildEvaluacionPregunta filtered by the evpr_r_usuario column *

 * @method     ChildEvaluacionPregunta requirePk($key, ConnectionInterface $con = null) Return the ChildEvaluacionPregunta by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionPregunta requireOne(ConnectionInterface $con = null) Return the first ChildEvaluacionPregunta matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEvaluacionPregunta requireOneByEvprCodigo(int $evpr_codigo) Return the first ChildEvaluacionPregunta filtered by the evpr_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionPregunta requireOneByEvprCEvaluacion(int $evpr_c_evaluacion) Return the first ChildEvaluacionPregunta filtered by the evpr_c_evaluacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionPregunta requireOneByEvprCPregunta(int $evpr_c_pregunta) Return the first ChildEvaluacionPregunta filtered by the evpr_c_pregunta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionPregunta requireOneByEvprCObjetivo(int $evpr_c_objetivo) Return the first ChildEvaluacionPregunta filtered by the evpr_c_objetivo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionPregunta requireOneByEvprCSeccion(int $evpr_c_seccion) Return the first ChildEvaluacionPregunta filtered by the evpr_c_seccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionPregunta requireOneByEvprOrden(int $evpr_orden) Return the first ChildEvaluacionPregunta filtered by the evpr_orden column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionPregunta requireOneByEvprRFechaCreacion(string $evpr_r_fecha_creacion) Return the first ChildEvaluacionPregunta filtered by the evpr_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionPregunta requireOneByEvprRFechaModificacion(string $evpr_r_fecha_modificacion) Return the first ChildEvaluacionPregunta filtered by the evpr_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionPregunta requireOneByEvprRUsuario(int $evpr_r_usuario) Return the first ChildEvaluacionPregunta filtered by the evpr_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEvaluacionPregunta[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEvaluacionPregunta objects based on current ModelCriteria
 * @method     ChildEvaluacionPregunta[]|ObjectCollection findByEvprCodigo(int $evpr_codigo) Return ChildEvaluacionPregunta objects filtered by the evpr_codigo column
 * @method     ChildEvaluacionPregunta[]|ObjectCollection findByEvprCEvaluacion(int $evpr_c_evaluacion) Return ChildEvaluacionPregunta objects filtered by the evpr_c_evaluacion column
 * @method     ChildEvaluacionPregunta[]|ObjectCollection findByEvprCPregunta(int $evpr_c_pregunta) Return ChildEvaluacionPregunta objects filtered by the evpr_c_pregunta column
 * @method     ChildEvaluacionPregunta[]|ObjectCollection findByEvprCObjetivo(int $evpr_c_objetivo) Return ChildEvaluacionPregunta objects filtered by the evpr_c_objetivo column
 * @method     ChildEvaluacionPregunta[]|ObjectCollection findByEvprCSeccion(int $evpr_c_seccion) Return ChildEvaluacionPregunta objects filtered by the evpr_c_seccion column
 * @method     ChildEvaluacionPregunta[]|ObjectCollection findByEvprOrden(int $evpr_orden) Return ChildEvaluacionPregunta objects filtered by the evpr_orden column
 * @method     ChildEvaluacionPregunta[]|ObjectCollection findByEvprRFechaCreacion(string $evpr_r_fecha_creacion) Return ChildEvaluacionPregunta objects filtered by the evpr_r_fecha_creacion column
 * @method     ChildEvaluacionPregunta[]|ObjectCollection findByEvprRFechaModificacion(string $evpr_r_fecha_modificacion) Return ChildEvaluacionPregunta objects filtered by the evpr_r_fecha_modificacion column
 * @method     ChildEvaluacionPregunta[]|ObjectCollection findByEvprRUsuario(int $evpr_r_usuario) Return ChildEvaluacionPregunta objects filtered by the evpr_r_usuario column
 * @method     ChildEvaluacionPregunta[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EvaluacionPreguntaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EvaluacionPreguntaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\EvaluacionPregunta', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEvaluacionPreguntaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEvaluacionPreguntaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEvaluacionPreguntaQuery) {
            return $criteria;
        }
        $query = new ChildEvaluacionPreguntaQuery();
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
     * @return ChildEvaluacionPregunta|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EvaluacionPreguntaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EvaluacionPreguntaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEvaluacionPregunta A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT evpr_codigo, evpr_c_evaluacion, evpr_c_pregunta, evpr_c_objetivo, evpr_c_seccion, evpr_orden, evpr_r_fecha_creacion, evpr_r_fecha_modificacion, evpr_r_usuario FROM evaluacion_pregunta WHERE evpr_codigo = :p0';
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
            /** @var ChildEvaluacionPregunta $obj */
            $obj = new ChildEvaluacionPregunta();
            $obj->hydrate($row);
            EvaluacionPreguntaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEvaluacionPregunta|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the evpr_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByEvprCodigo(1234); // WHERE evpr_codigo = 1234
     * $query->filterByEvprCodigo(array(12, 34)); // WHERE evpr_codigo IN (12, 34)
     * $query->filterByEvprCodigo(array('min' => 12)); // WHERE evpr_codigo > 12
     * </code>
     *
     * @param     mixed $evprCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByEvprCodigo($evprCodigo = null, $comparison = null)
    {
        if (is_array($evprCodigo)) {
            $useMinMax = false;
            if (isset($evprCodigo['min'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO, $evprCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evprCodigo['max'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO, $evprCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO, $evprCodigo, $comparison);
    }

    /**
     * Filter the query on the evpr_c_evaluacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvprCEvaluacion(1234); // WHERE evpr_c_evaluacion = 1234
     * $query->filterByEvprCEvaluacion(array(12, 34)); // WHERE evpr_c_evaluacion IN (12, 34)
     * $query->filterByEvprCEvaluacion(array('min' => 12)); // WHERE evpr_c_evaluacion > 12
     * </code>
     *
     * @see       filterByEvaluacion()
     *
     * @param     mixed $evprCEvaluacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByEvprCEvaluacion($evprCEvaluacion = null, $comparison = null)
    {
        if (is_array($evprCEvaluacion)) {
            $useMinMax = false;
            if (isset($evprCEvaluacion['min'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_EVALUACION, $evprCEvaluacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evprCEvaluacion['max'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_EVALUACION, $evprCEvaluacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_EVALUACION, $evprCEvaluacion, $comparison);
    }

    /**
     * Filter the query on the evpr_c_pregunta column
     *
     * Example usage:
     * <code>
     * $query->filterByEvprCPregunta(1234); // WHERE evpr_c_pregunta = 1234
     * $query->filterByEvprCPregunta(array(12, 34)); // WHERE evpr_c_pregunta IN (12, 34)
     * $query->filterByEvprCPregunta(array('min' => 12)); // WHERE evpr_c_pregunta > 12
     * </code>
     *
     * @see       filterByPregunta()
     *
     * @param     mixed $evprCPregunta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByEvprCPregunta($evprCPregunta = null, $comparison = null)
    {
        if (is_array($evprCPregunta)) {
            $useMinMax = false;
            if (isset($evprCPregunta['min'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_PREGUNTA, $evprCPregunta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evprCPregunta['max'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_PREGUNTA, $evprCPregunta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_PREGUNTA, $evprCPregunta, $comparison);
    }

    /**
     * Filter the query on the evpr_c_objetivo column
     *
     * Example usage:
     * <code>
     * $query->filterByEvprCObjetivo(1234); // WHERE evpr_c_objetivo = 1234
     * $query->filterByEvprCObjetivo(array(12, 34)); // WHERE evpr_c_objetivo IN (12, 34)
     * $query->filterByEvprCObjetivo(array('min' => 12)); // WHERE evpr_c_objetivo > 12
     * </code>
     *
     * @see       filterByObjetivo()
     *
     * @param     mixed $evprCObjetivo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByEvprCObjetivo($evprCObjetivo = null, $comparison = null)
    {
        if (is_array($evprCObjetivo)) {
            $useMinMax = false;
            if (isset($evprCObjetivo['min'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_OBJETIVO, $evprCObjetivo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evprCObjetivo['max'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_OBJETIVO, $evprCObjetivo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_OBJETIVO, $evprCObjetivo, $comparison);
    }

    /**
     * Filter the query on the evpr_c_seccion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvprCSeccion(1234); // WHERE evpr_c_seccion = 1234
     * $query->filterByEvprCSeccion(array(12, 34)); // WHERE evpr_c_seccion IN (12, 34)
     * $query->filterByEvprCSeccion(array('min' => 12)); // WHERE evpr_c_seccion > 12
     * </code>
     *
     * @see       filterBySeccion()
     *
     * @param     mixed $evprCSeccion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByEvprCSeccion($evprCSeccion = null, $comparison = null)
    {
        if (is_array($evprCSeccion)) {
            $useMinMax = false;
            if (isset($evprCSeccion['min'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_SECCION, $evprCSeccion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evprCSeccion['max'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_SECCION, $evprCSeccion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_SECCION, $evprCSeccion, $comparison);
    }

    /**
     * Filter the query on the evpr_orden column
     *
     * Example usage:
     * <code>
     * $query->filterByEvprOrden(1234); // WHERE evpr_orden = 1234
     * $query->filterByEvprOrden(array(12, 34)); // WHERE evpr_orden IN (12, 34)
     * $query->filterByEvprOrden(array('min' => 12)); // WHERE evpr_orden > 12
     * </code>
     *
     * @param     mixed $evprOrden The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByEvprOrden($evprOrden = null, $comparison = null)
    {
        if (is_array($evprOrden)) {
            $useMinMax = false;
            if (isset($evprOrden['min'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_ORDEN, $evprOrden['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evprOrden['max'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_ORDEN, $evprOrden['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_ORDEN, $evprOrden, $comparison);
    }

    /**
     * Filter the query on the evpr_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvprRFechaCreacion('2011-03-14'); // WHERE evpr_r_fecha_creacion = '2011-03-14'
     * $query->filterByEvprRFechaCreacion('now'); // WHERE evpr_r_fecha_creacion = '2011-03-14'
     * $query->filterByEvprRFechaCreacion(array('max' => 'yesterday')); // WHERE evpr_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $evprRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByEvprRFechaCreacion($evprRFechaCreacion = null, $comparison = null)
    {
        if (is_array($evprRFechaCreacion)) {
            $useMinMax = false;
            if (isset($evprRFechaCreacion['min'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_CREACION, $evprRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evprRFechaCreacion['max'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_CREACION, $evprRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_CREACION, $evprRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the evpr_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvprRFechaModificacion('2011-03-14'); // WHERE evpr_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEvprRFechaModificacion('now'); // WHERE evpr_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEvprRFechaModificacion(array('max' => 'yesterday')); // WHERE evpr_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $evprRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByEvprRFechaModificacion($evprRFechaModificacion = null, $comparison = null)
    {
        if (is_array($evprRFechaModificacion)) {
            $useMinMax = false;
            if (isset($evprRFechaModificacion['min'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_MODIFICACION, $evprRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evprRFechaModificacion['max'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_MODIFICACION, $evprRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_MODIFICACION, $evprRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the evpr_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEvprRUsuario(1234); // WHERE evpr_r_usuario = 1234
     * $query->filterByEvprRUsuario(array(12, 34)); // WHERE evpr_r_usuario IN (12, 34)
     * $query->filterByEvprRUsuario(array('min' => 12)); // WHERE evpr_r_usuario > 12
     * </code>
     *
     * @param     mixed $evprRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByEvprRUsuario($evprRUsuario = null, $comparison = null)
    {
        if (is_array($evprRUsuario)) {
            $useMinMax = false;
            if (isset($evprRUsuario['min'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_R_USUARIO, $evprRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evprRUsuario['max'])) {
                $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_R_USUARIO, $evprRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_R_USUARIO, $evprRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Evaluacion object
     *
     * @param \Evaluacion|ObjectCollection $evaluacion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByEvaluacion($evaluacion, $comparison = null)
    {
        if ($evaluacion instanceof \Evaluacion) {
            return $this
                ->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_EVALUACION, $evaluacion->getEvalCodigo(), $comparison);
        } elseif ($evaluacion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_EVALUACION, $evaluacion->toKeyValue('PrimaryKey', 'EvalCodigo'), $comparison);
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
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
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
     * Filter the query by a related \Objetivo object
     *
     * @param \Objetivo|ObjectCollection $objetivo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByObjetivo($objetivo, $comparison = null)
    {
        if ($objetivo instanceof \Objetivo) {
            return $this
                ->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_OBJETIVO, $objetivo->getObjeCodigo(), $comparison);
        } elseif ($objetivo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_OBJETIVO, $objetivo->toKeyValue('PrimaryKey', 'ObjeCodigo'), $comparison);
        } else {
            throw new PropelException('filterByObjetivo() only accepts arguments of type \Objetivo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Objetivo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function joinObjetivo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Objetivo');

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
            $this->addJoinObject($join, 'Objetivo');
        }

        return $this;
    }

    /**
     * Use the Objetivo relation Objetivo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ObjetivoQuery A secondary query class using the current class as primary query
     */
    public function useObjetivoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinObjetivo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Objetivo', '\ObjetivoQuery');
    }

    /**
     * Filter the query by a related \Pregunta object
     *
     * @param \Pregunta|ObjectCollection $pregunta The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterByPregunta($pregunta, $comparison = null)
    {
        if ($pregunta instanceof \Pregunta) {
            return $this
                ->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_PREGUNTA, $pregunta->getPregCodigo(), $comparison);
        } elseif ($pregunta instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_PREGUNTA, $pregunta->toKeyValue('PrimaryKey', 'PregCodigo'), $comparison);
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
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
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
     * Filter the query by a related \Seccion object
     *
     * @param \Seccion|ObjectCollection $seccion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function filterBySeccion($seccion, $comparison = null)
    {
        if ($seccion instanceof \Seccion) {
            return $this
                ->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_SECCION, $seccion->getSeccCodigo(), $comparison);
        } elseif ($seccion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_C_SECCION, $seccion->toKeyValue('PrimaryKey', 'SeccCodigo'), $comparison);
        } else {
            throw new PropelException('filterBySeccion() only accepts arguments of type \Seccion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Seccion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function joinSeccion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Seccion');

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
            $this->addJoinObject($join, 'Seccion');
        }

        return $this;
    }

    /**
     * Use the Seccion relation Seccion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SeccionQuery A secondary query class using the current class as primary query
     */
    public function useSeccionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSeccion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Seccion', '\SeccionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEvaluacionPregunta $evaluacionPregunta Object to remove from the list of results
     *
     * @return $this|ChildEvaluacionPreguntaQuery The current query, for fluid interface
     */
    public function prune($evaluacionPregunta = null)
    {
        if ($evaluacionPregunta) {
            $this->addUsingAlias(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO, $evaluacionPregunta->getEvprCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the evaluacion_pregunta table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionPreguntaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EvaluacionPreguntaTableMap::clearInstancePool();
            EvaluacionPreguntaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionPreguntaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EvaluacionPreguntaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EvaluacionPreguntaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EvaluacionPreguntaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EvaluacionPreguntaQuery
