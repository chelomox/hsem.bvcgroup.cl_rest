<?php

namespace Base;

use \Pregunta as ChildPregunta;
use \PreguntaQuery as ChildPreguntaQuery;
use \Exception;
use \PDO;
use Map\PreguntaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'pregunta' table.
 *
 *
 *
 * @method     ChildPreguntaQuery orderByPregCodigo($order = Criteria::ASC) Order by the preg_codigo column
 * @method     ChildPreguntaQuery orderByPregTPregunta($order = Criteria::ASC) Order by the preg_t_pregunta column
 * @method     ChildPreguntaQuery orderByPregContexto($order = Criteria::ASC) Order by the preg_contexto column
 * @method     ChildPreguntaQuery orderByPregDescripcion($order = Criteria::ASC) Order by the preg_descripcion column
 * @method     ChildPreguntaQuery orderByPregRFechaCreacion($order = Criteria::ASC) Order by the preg_r_fecha_creacion column
 * @method     ChildPreguntaQuery orderByPregRFechaModificacion($order = Criteria::ASC) Order by the preg_r_fecha_modificacion column
 * @method     ChildPreguntaQuery orderByPregRUsuario($order = Criteria::ASC) Order by the preg_r_usuario column
 *
 * @method     ChildPreguntaQuery groupByPregCodigo() Group by the preg_codigo column
 * @method     ChildPreguntaQuery groupByPregTPregunta() Group by the preg_t_pregunta column
 * @method     ChildPreguntaQuery groupByPregContexto() Group by the preg_contexto column
 * @method     ChildPreguntaQuery groupByPregDescripcion() Group by the preg_descripcion column
 * @method     ChildPreguntaQuery groupByPregRFechaCreacion() Group by the preg_r_fecha_creacion column
 * @method     ChildPreguntaQuery groupByPregRFechaModificacion() Group by the preg_r_fecha_modificacion column
 * @method     ChildPreguntaQuery groupByPregRUsuario() Group by the preg_r_usuario column
 *
 * @method     ChildPreguntaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPreguntaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPreguntaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPreguntaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPreguntaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPreguntaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPreguntaQuery leftJoinTPregunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the TPregunta relation
 * @method     ChildPreguntaQuery rightJoinTPregunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TPregunta relation
 * @method     ChildPreguntaQuery innerJoinTPregunta($relationAlias = null) Adds a INNER JOIN clause to the query using the TPregunta relation
 *
 * @method     ChildPreguntaQuery joinWithTPregunta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TPregunta relation
 *
 * @method     ChildPreguntaQuery leftJoinWithTPregunta() Adds a LEFT JOIN clause and with to the query using the TPregunta relation
 * @method     ChildPreguntaQuery rightJoinWithTPregunta() Adds a RIGHT JOIN clause and with to the query using the TPregunta relation
 * @method     ChildPreguntaQuery innerJoinWithTPregunta() Adds a INNER JOIN clause and with to the query using the TPregunta relation
 *
 * @method     ChildPreguntaQuery leftJoinDetallePregunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the DetallePregunta relation
 * @method     ChildPreguntaQuery rightJoinDetallePregunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DetallePregunta relation
 * @method     ChildPreguntaQuery innerJoinDetallePregunta($relationAlias = null) Adds a INNER JOIN clause to the query using the DetallePregunta relation
 *
 * @method     ChildPreguntaQuery joinWithDetallePregunta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DetallePregunta relation
 *
 * @method     ChildPreguntaQuery leftJoinWithDetallePregunta() Adds a LEFT JOIN clause and with to the query using the DetallePregunta relation
 * @method     ChildPreguntaQuery rightJoinWithDetallePregunta() Adds a RIGHT JOIN clause and with to the query using the DetallePregunta relation
 * @method     ChildPreguntaQuery innerJoinWithDetallePregunta() Adds a INNER JOIN clause and with to the query using the DetallePregunta relation
 *
 * @method     ChildPreguntaQuery leftJoinEvaluacionPregunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the EvaluacionPregunta relation
 * @method     ChildPreguntaQuery rightJoinEvaluacionPregunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EvaluacionPregunta relation
 * @method     ChildPreguntaQuery innerJoinEvaluacionPregunta($relationAlias = null) Adds a INNER JOIN clause to the query using the EvaluacionPregunta relation
 *
 * @method     ChildPreguntaQuery joinWithEvaluacionPregunta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EvaluacionPregunta relation
 *
 * @method     ChildPreguntaQuery leftJoinWithEvaluacionPregunta() Adds a LEFT JOIN clause and with to the query using the EvaluacionPregunta relation
 * @method     ChildPreguntaQuery rightJoinWithEvaluacionPregunta() Adds a RIGHT JOIN clause and with to the query using the EvaluacionPregunta relation
 * @method     ChildPreguntaQuery innerJoinWithEvaluacionPregunta() Adds a INNER JOIN clause and with to the query using the EvaluacionPregunta relation
 *
 * @method     ChildPreguntaQuery leftJoinRespuestaAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the RespuestaAplicada relation
 * @method     ChildPreguntaQuery rightJoinRespuestaAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RespuestaAplicada relation
 * @method     ChildPreguntaQuery innerJoinRespuestaAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the RespuestaAplicada relation
 *
 * @method     ChildPreguntaQuery joinWithRespuestaAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the RespuestaAplicada relation
 *
 * @method     ChildPreguntaQuery leftJoinWithRespuestaAplicada() Adds a LEFT JOIN clause and with to the query using the RespuestaAplicada relation
 * @method     ChildPreguntaQuery rightJoinWithRespuestaAplicada() Adds a RIGHT JOIN clause and with to the query using the RespuestaAplicada relation
 * @method     ChildPreguntaQuery innerJoinWithRespuestaAplicada() Adds a INNER JOIN clause and with to the query using the RespuestaAplicada relation
 *
 * @method     \TPreguntaQuery|\DetallePreguntaQuery|\EvaluacionPreguntaQuery|\RespuestaAplicadaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPregunta findOne(ConnectionInterface $con = null) Return the first ChildPregunta matching the query
 * @method     ChildPregunta findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPregunta matching the query, or a new ChildPregunta object populated from the query conditions when no match is found
 *
 * @method     ChildPregunta findOneByPregCodigo(int $preg_codigo) Return the first ChildPregunta filtered by the preg_codigo column
 * @method     ChildPregunta findOneByPregTPregunta(int $preg_t_pregunta) Return the first ChildPregunta filtered by the preg_t_pregunta column
 * @method     ChildPregunta findOneByPregContexto(string $preg_contexto) Return the first ChildPregunta filtered by the preg_contexto column
 * @method     ChildPregunta findOneByPregDescripcion(string $preg_descripcion) Return the first ChildPregunta filtered by the preg_descripcion column
 * @method     ChildPregunta findOneByPregRFechaCreacion(string $preg_r_fecha_creacion) Return the first ChildPregunta filtered by the preg_r_fecha_creacion column
 * @method     ChildPregunta findOneByPregRFechaModificacion(string $preg_r_fecha_modificacion) Return the first ChildPregunta filtered by the preg_r_fecha_modificacion column
 * @method     ChildPregunta findOneByPregRUsuario(int $preg_r_usuario) Return the first ChildPregunta filtered by the preg_r_usuario column *

 * @method     ChildPregunta requirePk($key, ConnectionInterface $con = null) Return the ChildPregunta by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPregunta requireOne(ConnectionInterface $con = null) Return the first ChildPregunta matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPregunta requireOneByPregCodigo(int $preg_codigo) Return the first ChildPregunta filtered by the preg_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPregunta requireOneByPregTPregunta(int $preg_t_pregunta) Return the first ChildPregunta filtered by the preg_t_pregunta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPregunta requireOneByPregContexto(string $preg_contexto) Return the first ChildPregunta filtered by the preg_contexto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPregunta requireOneByPregDescripcion(string $preg_descripcion) Return the first ChildPregunta filtered by the preg_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPregunta requireOneByPregRFechaCreacion(string $preg_r_fecha_creacion) Return the first ChildPregunta filtered by the preg_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPregunta requireOneByPregRFechaModificacion(string $preg_r_fecha_modificacion) Return the first ChildPregunta filtered by the preg_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPregunta requireOneByPregRUsuario(int $preg_r_usuario) Return the first ChildPregunta filtered by the preg_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPregunta[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPregunta objects based on current ModelCriteria
 * @method     ChildPregunta[]|ObjectCollection findByPregCodigo(int $preg_codigo) Return ChildPregunta objects filtered by the preg_codigo column
 * @method     ChildPregunta[]|ObjectCollection findByPregTPregunta(int $preg_t_pregunta) Return ChildPregunta objects filtered by the preg_t_pregunta column
 * @method     ChildPregunta[]|ObjectCollection findByPregContexto(string $preg_contexto) Return ChildPregunta objects filtered by the preg_contexto column
 * @method     ChildPregunta[]|ObjectCollection findByPregDescripcion(string $preg_descripcion) Return ChildPregunta objects filtered by the preg_descripcion column
 * @method     ChildPregunta[]|ObjectCollection findByPregRFechaCreacion(string $preg_r_fecha_creacion) Return ChildPregunta objects filtered by the preg_r_fecha_creacion column
 * @method     ChildPregunta[]|ObjectCollection findByPregRFechaModificacion(string $preg_r_fecha_modificacion) Return ChildPregunta objects filtered by the preg_r_fecha_modificacion column
 * @method     ChildPregunta[]|ObjectCollection findByPregRUsuario(int $preg_r_usuario) Return ChildPregunta objects filtered by the preg_r_usuario column
 * @method     ChildPregunta[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PreguntaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PreguntaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Pregunta', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPreguntaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPreguntaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPreguntaQuery) {
            return $criteria;
        }
        $query = new ChildPreguntaQuery();
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
     * @return ChildPregunta|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PreguntaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PreguntaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPregunta A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT preg_codigo, preg_t_pregunta, preg_contexto, preg_descripcion, preg_r_fecha_creacion, preg_r_fecha_modificacion, preg_r_usuario FROM pregunta WHERE preg_codigo = :p0';
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
            /** @var ChildPregunta $obj */
            $obj = new ChildPregunta();
            $obj->hydrate($row);
            PreguntaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPregunta|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PreguntaTableMap::COL_PREG_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PreguntaTableMap::COL_PREG_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the preg_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByPregCodigo(1234); // WHERE preg_codigo = 1234
     * $query->filterByPregCodigo(array(12, 34)); // WHERE preg_codigo IN (12, 34)
     * $query->filterByPregCodigo(array('min' => 12)); // WHERE preg_codigo > 12
     * </code>
     *
     * @param     mixed $pregCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByPregCodigo($pregCodigo = null, $comparison = null)
    {
        if (is_array($pregCodigo)) {
            $useMinMax = false;
            if (isset($pregCodigo['min'])) {
                $this->addUsingAlias(PreguntaTableMap::COL_PREG_CODIGO, $pregCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pregCodigo['max'])) {
                $this->addUsingAlias(PreguntaTableMap::COL_PREG_CODIGO, $pregCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PreguntaTableMap::COL_PREG_CODIGO, $pregCodigo, $comparison);
    }

    /**
     * Filter the query on the preg_t_pregunta column
     *
     * Example usage:
     * <code>
     * $query->filterByPregTPregunta(1234); // WHERE preg_t_pregunta = 1234
     * $query->filterByPregTPregunta(array(12, 34)); // WHERE preg_t_pregunta IN (12, 34)
     * $query->filterByPregTPregunta(array('min' => 12)); // WHERE preg_t_pregunta > 12
     * </code>
     *
     * @see       filterByTPregunta()
     *
     * @param     mixed $pregTPregunta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByPregTPregunta($pregTPregunta = null, $comparison = null)
    {
        if (is_array($pregTPregunta)) {
            $useMinMax = false;
            if (isset($pregTPregunta['min'])) {
                $this->addUsingAlias(PreguntaTableMap::COL_PREG_T_PREGUNTA, $pregTPregunta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pregTPregunta['max'])) {
                $this->addUsingAlias(PreguntaTableMap::COL_PREG_T_PREGUNTA, $pregTPregunta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PreguntaTableMap::COL_PREG_T_PREGUNTA, $pregTPregunta, $comparison);
    }

    /**
     * Filter the query on the preg_contexto column
     *
     * Example usage:
     * <code>
     * $query->filterByPregContexto('fooValue');   // WHERE preg_contexto = 'fooValue'
     * $query->filterByPregContexto('%fooValue%', Criteria::LIKE); // WHERE preg_contexto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pregContexto The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByPregContexto($pregContexto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pregContexto)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PreguntaTableMap::COL_PREG_CONTEXTO, $pregContexto, $comparison);
    }

    /**
     * Filter the query on the preg_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByPregDescripcion('fooValue');   // WHERE preg_descripcion = 'fooValue'
     * $query->filterByPregDescripcion('%fooValue%', Criteria::LIKE); // WHERE preg_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pregDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByPregDescripcion($pregDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pregDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PreguntaTableMap::COL_PREG_DESCRIPCION, $pregDescripcion, $comparison);
    }

    /**
     * Filter the query on the preg_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByPregRFechaCreacion('2011-03-14'); // WHERE preg_r_fecha_creacion = '2011-03-14'
     * $query->filterByPregRFechaCreacion('now'); // WHERE preg_r_fecha_creacion = '2011-03-14'
     * $query->filterByPregRFechaCreacion(array('max' => 'yesterday')); // WHERE preg_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $pregRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByPregRFechaCreacion($pregRFechaCreacion = null, $comparison = null)
    {
        if (is_array($pregRFechaCreacion)) {
            $useMinMax = false;
            if (isset($pregRFechaCreacion['min'])) {
                $this->addUsingAlias(PreguntaTableMap::COL_PREG_R_FECHA_CREACION, $pregRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pregRFechaCreacion['max'])) {
                $this->addUsingAlias(PreguntaTableMap::COL_PREG_R_FECHA_CREACION, $pregRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PreguntaTableMap::COL_PREG_R_FECHA_CREACION, $pregRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the preg_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByPregRFechaModificacion('2011-03-14'); // WHERE preg_r_fecha_modificacion = '2011-03-14'
     * $query->filterByPregRFechaModificacion('now'); // WHERE preg_r_fecha_modificacion = '2011-03-14'
     * $query->filterByPregRFechaModificacion(array('max' => 'yesterday')); // WHERE preg_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $pregRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByPregRFechaModificacion($pregRFechaModificacion = null, $comparison = null)
    {
        if (is_array($pregRFechaModificacion)) {
            $useMinMax = false;
            if (isset($pregRFechaModificacion['min'])) {
                $this->addUsingAlias(PreguntaTableMap::COL_PREG_R_FECHA_MODIFICACION, $pregRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pregRFechaModificacion['max'])) {
                $this->addUsingAlias(PreguntaTableMap::COL_PREG_R_FECHA_MODIFICACION, $pregRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PreguntaTableMap::COL_PREG_R_FECHA_MODIFICACION, $pregRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the preg_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByPregRUsuario(1234); // WHERE preg_r_usuario = 1234
     * $query->filterByPregRUsuario(array(12, 34)); // WHERE preg_r_usuario IN (12, 34)
     * $query->filterByPregRUsuario(array('min' => 12)); // WHERE preg_r_usuario > 12
     * </code>
     *
     * @param     mixed $pregRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByPregRUsuario($pregRUsuario = null, $comparison = null)
    {
        if (is_array($pregRUsuario)) {
            $useMinMax = false;
            if (isset($pregRUsuario['min'])) {
                $this->addUsingAlias(PreguntaTableMap::COL_PREG_R_USUARIO, $pregRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pregRUsuario['max'])) {
                $this->addUsingAlias(PreguntaTableMap::COL_PREG_R_USUARIO, $pregRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PreguntaTableMap::COL_PREG_R_USUARIO, $pregRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \TPregunta object
     *
     * @param \TPregunta|ObjectCollection $tPregunta The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByTPregunta($tPregunta, $comparison = null)
    {
        if ($tPregunta instanceof \TPregunta) {
            return $this
                ->addUsingAlias(PreguntaTableMap::COL_PREG_T_PREGUNTA, $tPregunta->getTpreTipo(), $comparison);
        } elseif ($tPregunta instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PreguntaTableMap::COL_PREG_T_PREGUNTA, $tPregunta->toKeyValue('PrimaryKey', 'TpreTipo'), $comparison);
        } else {
            throw new PropelException('filterByTPregunta() only accepts arguments of type \TPregunta or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TPregunta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function joinTPregunta($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TPregunta');

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
            $this->addJoinObject($join, 'TPregunta');
        }

        return $this;
    }

    /**
     * Use the TPregunta relation TPregunta object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TPreguntaQuery A secondary query class using the current class as primary query
     */
    public function useTPreguntaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTPregunta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TPregunta', '\TPreguntaQuery');
    }

    /**
     * Filter the query by a related \DetallePregunta object
     *
     * @param \DetallePregunta|ObjectCollection $detallePregunta the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByDetallePregunta($detallePregunta, $comparison = null)
    {
        if ($detallePregunta instanceof \DetallePregunta) {
            return $this
                ->addUsingAlias(PreguntaTableMap::COL_PREG_CODIGO, $detallePregunta->getDeprCPregunta(), $comparison);
        } elseif ($detallePregunta instanceof ObjectCollection) {
            return $this
                ->useDetallePreguntaQuery()
                ->filterByPrimaryKeys($detallePregunta->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDetallePregunta() only accepts arguments of type \DetallePregunta or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DetallePregunta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function joinDetallePregunta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DetallePregunta');

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
            $this->addJoinObject($join, 'DetallePregunta');
        }

        return $this;
    }

    /**
     * Use the DetallePregunta relation DetallePregunta object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DetallePreguntaQuery A secondary query class using the current class as primary query
     */
    public function useDetallePreguntaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDetallePregunta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DetallePregunta', '\DetallePreguntaQuery');
    }

    /**
     * Filter the query by a related \EvaluacionPregunta object
     *
     * @param \EvaluacionPregunta|ObjectCollection $evaluacionPregunta the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByEvaluacionPregunta($evaluacionPregunta, $comparison = null)
    {
        if ($evaluacionPregunta instanceof \EvaluacionPregunta) {
            return $this
                ->addUsingAlias(PreguntaTableMap::COL_PREG_CODIGO, $evaluacionPregunta->getEvprCPregunta(), $comparison);
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
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
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
     * Filter the query by a related \RespuestaAplicada object
     *
     * @param \RespuestaAplicada|ObjectCollection $respuestaAplicada the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPreguntaQuery The current query, for fluid interface
     */
    public function filterByRespuestaAplicada($respuestaAplicada, $comparison = null)
    {
        if ($respuestaAplicada instanceof \RespuestaAplicada) {
            return $this
                ->addUsingAlias(PreguntaTableMap::COL_PREG_CODIGO, $respuestaAplicada->getReapCPregunta(), $comparison);
        } elseif ($respuestaAplicada instanceof ObjectCollection) {
            return $this
                ->useRespuestaAplicadaQuery()
                ->filterByPrimaryKeys($respuestaAplicada->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRespuestaAplicada() only accepts arguments of type \RespuestaAplicada or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RespuestaAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function joinRespuestaAplicada($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RespuestaAplicada');

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
            $this->addJoinObject($join, 'RespuestaAplicada');
        }

        return $this;
    }

    /**
     * Use the RespuestaAplicada relation RespuestaAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RespuestaAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useRespuestaAplicadaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRespuestaAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RespuestaAplicada', '\RespuestaAplicadaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPregunta $pregunta Object to remove from the list of results
     *
     * @return $this|ChildPreguntaQuery The current query, for fluid interface
     */
    public function prune($pregunta = null)
    {
        if ($pregunta) {
            $this->addUsingAlias(PreguntaTableMap::COL_PREG_CODIGO, $pregunta->getPregCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the pregunta table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PreguntaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PreguntaTableMap::clearInstancePool();
            PreguntaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PreguntaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PreguntaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PreguntaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PreguntaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PreguntaQuery
