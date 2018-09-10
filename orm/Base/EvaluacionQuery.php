<?php

namespace Base;

use \Evaluacion as ChildEvaluacion;
use \EvaluacionQuery as ChildEvaluacionQuery;
use \Exception;
use \PDO;
use Map\EvaluacionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'evaluacion' table.
 *
 *
 *
 * @method     ChildEvaluacionQuery orderByEvalCodigo($order = Criteria::ASC) Order by the eval_codigo column
 * @method     ChildEvaluacionQuery orderByEvalTEvaluacion($order = Criteria::ASC) Order by the eval_t_evaluacion column
 * @method     ChildEvaluacionQuery orderByEvalTitulo($order = Criteria::ASC) Order by the eval_titulo column
 * @method     ChildEvaluacionQuery orderByEvalDescripcion($order = Criteria::ASC) Order by the eval_descripcion column
 * @method     ChildEvaluacionQuery orderByEvalVigente($order = Criteria::ASC) Order by the eval_vigente column
 * @method     ChildEvaluacionQuery orderByEvalRFechaCreacion($order = Criteria::ASC) Order by the eval_r_fecha_creacion column
 * @method     ChildEvaluacionQuery orderByEvalRFechaModificacion($order = Criteria::ASC) Order by the eval_r_fecha_modificacion column
 * @method     ChildEvaluacionQuery orderByEvalRUsuario($order = Criteria::ASC) Order by the eval_r_usuario column
 *
 * @method     ChildEvaluacionQuery groupByEvalCodigo() Group by the eval_codigo column
 * @method     ChildEvaluacionQuery groupByEvalTEvaluacion() Group by the eval_t_evaluacion column
 * @method     ChildEvaluacionQuery groupByEvalTitulo() Group by the eval_titulo column
 * @method     ChildEvaluacionQuery groupByEvalDescripcion() Group by the eval_descripcion column
 * @method     ChildEvaluacionQuery groupByEvalVigente() Group by the eval_vigente column
 * @method     ChildEvaluacionQuery groupByEvalRFechaCreacion() Group by the eval_r_fecha_creacion column
 * @method     ChildEvaluacionQuery groupByEvalRFechaModificacion() Group by the eval_r_fecha_modificacion column
 * @method     ChildEvaluacionQuery groupByEvalRUsuario() Group by the eval_r_usuario column
 *
 * @method     ChildEvaluacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEvaluacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEvaluacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEvaluacionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEvaluacionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEvaluacionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEvaluacionQuery leftJoinTEvaluacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the TEvaluacion relation
 * @method     ChildEvaluacionQuery rightJoinTEvaluacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TEvaluacion relation
 * @method     ChildEvaluacionQuery innerJoinTEvaluacion($relationAlias = null) Adds a INNER JOIN clause to the query using the TEvaluacion relation
 *
 * @method     ChildEvaluacionQuery joinWithTEvaluacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TEvaluacion relation
 *
 * @method     ChildEvaluacionQuery leftJoinWithTEvaluacion() Adds a LEFT JOIN clause and with to the query using the TEvaluacion relation
 * @method     ChildEvaluacionQuery rightJoinWithTEvaluacion() Adds a RIGHT JOIN clause and with to the query using the TEvaluacion relation
 * @method     ChildEvaluacionQuery innerJoinWithTEvaluacion() Adds a INNER JOIN clause and with to the query using the TEvaluacion relation
 *
 * @method     ChildEvaluacionQuery leftJoinEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the EvaluacionAplicada relation
 * @method     ChildEvaluacionQuery rightJoinEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EvaluacionAplicada relation
 * @method     ChildEvaluacionQuery innerJoinEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the EvaluacionAplicada relation
 *
 * @method     ChildEvaluacionQuery joinWithEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EvaluacionAplicada relation
 *
 * @method     ChildEvaluacionQuery leftJoinWithEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the EvaluacionAplicada relation
 * @method     ChildEvaluacionQuery rightJoinWithEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the EvaluacionAplicada relation
 * @method     ChildEvaluacionQuery innerJoinWithEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the EvaluacionAplicada relation
 *
 * @method     ChildEvaluacionQuery leftJoinEvaluacionMarcador($relationAlias = null) Adds a LEFT JOIN clause to the query using the EvaluacionMarcador relation
 * @method     ChildEvaluacionQuery rightJoinEvaluacionMarcador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EvaluacionMarcador relation
 * @method     ChildEvaluacionQuery innerJoinEvaluacionMarcador($relationAlias = null) Adds a INNER JOIN clause to the query using the EvaluacionMarcador relation
 *
 * @method     ChildEvaluacionQuery joinWithEvaluacionMarcador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EvaluacionMarcador relation
 *
 * @method     ChildEvaluacionQuery leftJoinWithEvaluacionMarcador() Adds a LEFT JOIN clause and with to the query using the EvaluacionMarcador relation
 * @method     ChildEvaluacionQuery rightJoinWithEvaluacionMarcador() Adds a RIGHT JOIN clause and with to the query using the EvaluacionMarcador relation
 * @method     ChildEvaluacionQuery innerJoinWithEvaluacionMarcador() Adds a INNER JOIN clause and with to the query using the EvaluacionMarcador relation
 *
 * @method     ChildEvaluacionQuery leftJoinEvaluacionPregunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the EvaluacionPregunta relation
 * @method     ChildEvaluacionQuery rightJoinEvaluacionPregunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EvaluacionPregunta relation
 * @method     ChildEvaluacionQuery innerJoinEvaluacionPregunta($relationAlias = null) Adds a INNER JOIN clause to the query using the EvaluacionPregunta relation
 *
 * @method     ChildEvaluacionQuery joinWithEvaluacionPregunta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EvaluacionPregunta relation
 *
 * @method     ChildEvaluacionQuery leftJoinWithEvaluacionPregunta() Adds a LEFT JOIN clause and with to the query using the EvaluacionPregunta relation
 * @method     ChildEvaluacionQuery rightJoinWithEvaluacionPregunta() Adds a RIGHT JOIN clause and with to the query using the EvaluacionPregunta relation
 * @method     ChildEvaluacionQuery innerJoinWithEvaluacionPregunta() Adds a INNER JOIN clause and with to the query using the EvaluacionPregunta relation
 *
 * @method     \TEvaluacionQuery|\EvaluacionAplicadaQuery|\EvaluacionMarcadorQuery|\EvaluacionPreguntaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEvaluacion findOne(ConnectionInterface $con = null) Return the first ChildEvaluacion matching the query
 * @method     ChildEvaluacion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEvaluacion matching the query, or a new ChildEvaluacion object populated from the query conditions when no match is found
 *
 * @method     ChildEvaluacion findOneByEvalCodigo(int $eval_codigo) Return the first ChildEvaluacion filtered by the eval_codigo column
 * @method     ChildEvaluacion findOneByEvalTEvaluacion(int $eval_t_evaluacion) Return the first ChildEvaluacion filtered by the eval_t_evaluacion column
 * @method     ChildEvaluacion findOneByEvalTitulo(string $eval_titulo) Return the first ChildEvaluacion filtered by the eval_titulo column
 * @method     ChildEvaluacion findOneByEvalDescripcion(string $eval_descripcion) Return the first ChildEvaluacion filtered by the eval_descripcion column
 * @method     ChildEvaluacion findOneByEvalVigente(int $eval_vigente) Return the first ChildEvaluacion filtered by the eval_vigente column
 * @method     ChildEvaluacion findOneByEvalRFechaCreacion(string $eval_r_fecha_creacion) Return the first ChildEvaluacion filtered by the eval_r_fecha_creacion column
 * @method     ChildEvaluacion findOneByEvalRFechaModificacion(string $eval_r_fecha_modificacion) Return the first ChildEvaluacion filtered by the eval_r_fecha_modificacion column
 * @method     ChildEvaluacion findOneByEvalRUsuario(int $eval_r_usuario) Return the first ChildEvaluacion filtered by the eval_r_usuario column *

 * @method     ChildEvaluacion requirePk($key, ConnectionInterface $con = null) Return the ChildEvaluacion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacion requireOne(ConnectionInterface $con = null) Return the first ChildEvaluacion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEvaluacion requireOneByEvalCodigo(int $eval_codigo) Return the first ChildEvaluacion filtered by the eval_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacion requireOneByEvalTEvaluacion(int $eval_t_evaluacion) Return the first ChildEvaluacion filtered by the eval_t_evaluacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacion requireOneByEvalTitulo(string $eval_titulo) Return the first ChildEvaluacion filtered by the eval_titulo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacion requireOneByEvalDescripcion(string $eval_descripcion) Return the first ChildEvaluacion filtered by the eval_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacion requireOneByEvalVigente(int $eval_vigente) Return the first ChildEvaluacion filtered by the eval_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacion requireOneByEvalRFechaCreacion(string $eval_r_fecha_creacion) Return the first ChildEvaluacion filtered by the eval_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacion requireOneByEvalRFechaModificacion(string $eval_r_fecha_modificacion) Return the first ChildEvaluacion filtered by the eval_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacion requireOneByEvalRUsuario(int $eval_r_usuario) Return the first ChildEvaluacion filtered by the eval_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEvaluacion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEvaluacion objects based on current ModelCriteria
 * @method     ChildEvaluacion[]|ObjectCollection findByEvalCodigo(int $eval_codigo) Return ChildEvaluacion objects filtered by the eval_codigo column
 * @method     ChildEvaluacion[]|ObjectCollection findByEvalTEvaluacion(int $eval_t_evaluacion) Return ChildEvaluacion objects filtered by the eval_t_evaluacion column
 * @method     ChildEvaluacion[]|ObjectCollection findByEvalTitulo(string $eval_titulo) Return ChildEvaluacion objects filtered by the eval_titulo column
 * @method     ChildEvaluacion[]|ObjectCollection findByEvalDescripcion(string $eval_descripcion) Return ChildEvaluacion objects filtered by the eval_descripcion column
 * @method     ChildEvaluacion[]|ObjectCollection findByEvalVigente(int $eval_vigente) Return ChildEvaluacion objects filtered by the eval_vigente column
 * @method     ChildEvaluacion[]|ObjectCollection findByEvalRFechaCreacion(string $eval_r_fecha_creacion) Return ChildEvaluacion objects filtered by the eval_r_fecha_creacion column
 * @method     ChildEvaluacion[]|ObjectCollection findByEvalRFechaModificacion(string $eval_r_fecha_modificacion) Return ChildEvaluacion objects filtered by the eval_r_fecha_modificacion column
 * @method     ChildEvaluacion[]|ObjectCollection findByEvalRUsuario(int $eval_r_usuario) Return ChildEvaluacion objects filtered by the eval_r_usuario column
 * @method     ChildEvaluacion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EvaluacionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EvaluacionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Evaluacion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEvaluacionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEvaluacionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEvaluacionQuery) {
            return $criteria;
        }
        $query = new ChildEvaluacionQuery();
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
     * @return ChildEvaluacion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EvaluacionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EvaluacionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEvaluacion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT eval_codigo, eval_t_evaluacion, eval_titulo, eval_descripcion, eval_vigente, eval_r_fecha_creacion, eval_r_fecha_modificacion, eval_r_usuario FROM evaluacion WHERE eval_codigo = :p0';
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
            /** @var ChildEvaluacion $obj */
            $obj = new ChildEvaluacion();
            $obj->hydrate($row);
            EvaluacionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEvaluacion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the eval_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByEvalCodigo(1234); // WHERE eval_codigo = 1234
     * $query->filterByEvalCodigo(array(12, 34)); // WHERE eval_codigo IN (12, 34)
     * $query->filterByEvalCodigo(array('min' => 12)); // WHERE eval_codigo > 12
     * </code>
     *
     * @param     mixed $evalCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvalCodigo($evalCodigo = null, $comparison = null)
    {
        if (is_array($evalCodigo)) {
            $useMinMax = false;
            if (isset($evalCodigo['min'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_CODIGO, $evalCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evalCodigo['max'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_CODIGO, $evalCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_CODIGO, $evalCodigo, $comparison);
    }

    /**
     * Filter the query on the eval_t_evaluacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvalTEvaluacion(1234); // WHERE eval_t_evaluacion = 1234
     * $query->filterByEvalTEvaluacion(array(12, 34)); // WHERE eval_t_evaluacion IN (12, 34)
     * $query->filterByEvalTEvaluacion(array('min' => 12)); // WHERE eval_t_evaluacion > 12
     * </code>
     *
     * @see       filterByTEvaluacion()
     *
     * @param     mixed $evalTEvaluacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvalTEvaluacion($evalTEvaluacion = null, $comparison = null)
    {
        if (is_array($evalTEvaluacion)) {
            $useMinMax = false;
            if (isset($evalTEvaluacion['min'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_T_EVALUACION, $evalTEvaluacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evalTEvaluacion['max'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_T_EVALUACION, $evalTEvaluacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_T_EVALUACION, $evalTEvaluacion, $comparison);
    }

    /**
     * Filter the query on the eval_titulo column
     *
     * Example usage:
     * <code>
     * $query->filterByEvalTitulo('fooValue');   // WHERE eval_titulo = 'fooValue'
     * $query->filterByEvalTitulo('%fooValue%', Criteria::LIKE); // WHERE eval_titulo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $evalTitulo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvalTitulo($evalTitulo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($evalTitulo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_TITULO, $evalTitulo, $comparison);
    }

    /**
     * Filter the query on the eval_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvalDescripcion('fooValue');   // WHERE eval_descripcion = 'fooValue'
     * $query->filterByEvalDescripcion('%fooValue%', Criteria::LIKE); // WHERE eval_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $evalDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvalDescripcion($evalDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($evalDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_DESCRIPCION, $evalDescripcion, $comparison);
    }

    /**
     * Filter the query on the eval_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByEvalVigente(1234); // WHERE eval_vigente = 1234
     * $query->filterByEvalVigente(array(12, 34)); // WHERE eval_vigente IN (12, 34)
     * $query->filterByEvalVigente(array('min' => 12)); // WHERE eval_vigente > 12
     * </code>
     *
     * @param     mixed $evalVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvalVigente($evalVigente = null, $comparison = null)
    {
        if (is_array($evalVigente)) {
            $useMinMax = false;
            if (isset($evalVigente['min'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_VIGENTE, $evalVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evalVigente['max'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_VIGENTE, $evalVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_VIGENTE, $evalVigente, $comparison);
    }

    /**
     * Filter the query on the eval_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvalRFechaCreacion('2011-03-14'); // WHERE eval_r_fecha_creacion = '2011-03-14'
     * $query->filterByEvalRFechaCreacion('now'); // WHERE eval_r_fecha_creacion = '2011-03-14'
     * $query->filterByEvalRFechaCreacion(array('max' => 'yesterday')); // WHERE eval_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $evalRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvalRFechaCreacion($evalRFechaCreacion = null, $comparison = null)
    {
        if (is_array($evalRFechaCreacion)) {
            $useMinMax = false;
            if (isset($evalRFechaCreacion['min'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_R_FECHA_CREACION, $evalRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evalRFechaCreacion['max'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_R_FECHA_CREACION, $evalRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_R_FECHA_CREACION, $evalRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the eval_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvalRFechaModificacion('2011-03-14'); // WHERE eval_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEvalRFechaModificacion('now'); // WHERE eval_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEvalRFechaModificacion(array('max' => 'yesterday')); // WHERE eval_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $evalRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvalRFechaModificacion($evalRFechaModificacion = null, $comparison = null)
    {
        if (is_array($evalRFechaModificacion)) {
            $useMinMax = false;
            if (isset($evalRFechaModificacion['min'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_R_FECHA_MODIFICACION, $evalRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evalRFechaModificacion['max'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_R_FECHA_MODIFICACION, $evalRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_R_FECHA_MODIFICACION, $evalRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the eval_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEvalRUsuario(1234); // WHERE eval_r_usuario = 1234
     * $query->filterByEvalRUsuario(array(12, 34)); // WHERE eval_r_usuario IN (12, 34)
     * $query->filterByEvalRUsuario(array('min' => 12)); // WHERE eval_r_usuario > 12
     * </code>
     *
     * @param     mixed $evalRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvalRUsuario($evalRUsuario = null, $comparison = null)
    {
        if (is_array($evalRUsuario)) {
            $useMinMax = false;
            if (isset($evalRUsuario['min'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_R_USUARIO, $evalRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evalRUsuario['max'])) {
                $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_R_USUARIO, $evalRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_R_USUARIO, $evalRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \TEvaluacion object
     *
     * @param \TEvaluacion|ObjectCollection $tEvaluacion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByTEvaluacion($tEvaluacion, $comparison = null)
    {
        if ($tEvaluacion instanceof \TEvaluacion) {
            return $this
                ->addUsingAlias(EvaluacionTableMap::COL_EVAL_T_EVALUACION, $tEvaluacion->getTevTipo(), $comparison);
        } elseif ($tEvaluacion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EvaluacionTableMap::COL_EVAL_T_EVALUACION, $tEvaluacion->toKeyValue('PrimaryKey', 'TevTipo'), $comparison);
        } else {
            throw new PropelException('filterByTEvaluacion() only accepts arguments of type \TEvaluacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TEvaluacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function joinTEvaluacion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TEvaluacion');

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
            $this->addJoinObject($join, 'TEvaluacion');
        }

        return $this;
    }

    /**
     * Use the TEvaluacion relation TEvaluacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TEvaluacionQuery A secondary query class using the current class as primary query
     */
    public function useTEvaluacionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTEvaluacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TEvaluacion', '\TEvaluacionQuery');
    }

    /**
     * Filter the query by a related \EvaluacionAplicada object
     *
     * @param \EvaluacionAplicada|ObjectCollection $evaluacionAplicada the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvaluacionAplicada($evaluacionAplicada, $comparison = null)
    {
        if ($evaluacionAplicada instanceof \EvaluacionAplicada) {
            return $this
                ->addUsingAlias(EvaluacionTableMap::COL_EVAL_CODIGO, $evaluacionAplicada->getEvapCEvaluacion(), $comparison);
        } elseif ($evaluacionAplicada instanceof ObjectCollection) {
            return $this
                ->useEvaluacionAplicadaQuery()
                ->filterByPrimaryKeys($evaluacionAplicada->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEvaluacionAplicada() only accepts arguments of type \EvaluacionAplicada or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EvaluacionAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function joinEvaluacionAplicada($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EvaluacionAplicada');

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
            $this->addJoinObject($join, 'EvaluacionAplicada');
        }

        return $this;
    }

    /**
     * Use the EvaluacionAplicada relation EvaluacionAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EvaluacionAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useEvaluacionAplicadaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvaluacionAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EvaluacionAplicada', '\EvaluacionAplicadaQuery');
    }

    /**
     * Filter the query by a related \EvaluacionMarcador object
     *
     * @param \EvaluacionMarcador|ObjectCollection $evaluacionMarcador the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvaluacionMarcador($evaluacionMarcador, $comparison = null)
    {
        if ($evaluacionMarcador instanceof \EvaluacionMarcador) {
            return $this
                ->addUsingAlias(EvaluacionTableMap::COL_EVAL_CODIGO, $evaluacionMarcador->getEvmaCEvaluacion(), $comparison);
        } elseif ($evaluacionMarcador instanceof ObjectCollection) {
            return $this
                ->useEvaluacionMarcadorQuery()
                ->filterByPrimaryKeys($evaluacionMarcador->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEvaluacionMarcador() only accepts arguments of type \EvaluacionMarcador or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EvaluacionMarcador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function joinEvaluacionMarcador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EvaluacionMarcador');

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
            $this->addJoinObject($join, 'EvaluacionMarcador');
        }

        return $this;
    }

    /**
     * Use the EvaluacionMarcador relation EvaluacionMarcador object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EvaluacionMarcadorQuery A secondary query class using the current class as primary query
     */
    public function useEvaluacionMarcadorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvaluacionMarcador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EvaluacionMarcador', '\EvaluacionMarcadorQuery');
    }

    /**
     * Filter the query by a related \EvaluacionPregunta object
     *
     * @param \EvaluacionPregunta|ObjectCollection $evaluacionPregunta the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvaluacionPregunta($evaluacionPregunta, $comparison = null)
    {
        if ($evaluacionPregunta instanceof \EvaluacionPregunta) {
            return $this
                ->addUsingAlias(EvaluacionTableMap::COL_EVAL_CODIGO, $evaluacionPregunta->getEvprCEvaluacion(), $comparison);
        } elseif ($evaluacionPregunta instanceof ObjectCollection) {
            return $this
                ->useEvaluacionPreguntaQuery()
                ->filterByPrimaryKeys($evaluacionPregunta->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEvaluacionPregunta() only accepts arguments of type \EvaluacionPregunta or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EvaluacionPregunta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function joinEvaluacionPregunta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EvaluacionPregunta');

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
            $this->addJoinObject($join, 'EvaluacionPregunta');
        }

        return $this;
    }

    /**
     * Use the EvaluacionPregunta relation EvaluacionPregunta object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EvaluacionPreguntaQuery A secondary query class using the current class as primary query
     */
    public function useEvaluacionPreguntaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvaluacionPregunta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EvaluacionPregunta', '\EvaluacionPreguntaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEvaluacion $evaluacion Object to remove from the list of results
     *
     * @return $this|ChildEvaluacionQuery The current query, for fluid interface
     */
    public function prune($evaluacion = null)
    {
        if ($evaluacion) {
            $this->addUsingAlias(EvaluacionTableMap::COL_EVAL_CODIGO, $evaluacion->getEvalCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the evaluacion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EvaluacionTableMap::clearInstancePool();
            EvaluacionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EvaluacionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EvaluacionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EvaluacionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EvaluacionQuery
