<?php

namespace Base;

use \OpcionPregunta as ChildOpcionPregunta;
use \OpcionPreguntaQuery as ChildOpcionPreguntaQuery;
use \Exception;
use \PDO;
use Map\OpcionPreguntaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'opcion_pregunta' table.
 *
 *
 *
 * @method     ChildOpcionPreguntaQuery orderByOpprCodigo($order = Criteria::ASC) Order by the oppr_codigo column
 * @method     ChildOpcionPreguntaQuery orderByOpprValor($order = Criteria::ASC) Order by the oppr_valor column
 * @method     ChildOpcionPreguntaQuery orderByOpprNoProcesaPromedio($order = Criteria::ASC) Order by the oppr_no_procesa_promedio column
 * @method     ChildOpcionPreguntaQuery orderByOpprRFechaCreacion($order = Criteria::ASC) Order by the oppr_r_fecha_creacion column
 * @method     ChildOpcionPreguntaQuery orderByOpprRFechaModificacion($order = Criteria::ASC) Order by the oppr_r_fecha_modificacion column
 * @method     ChildOpcionPreguntaQuery orderByOpprRUsuario($order = Criteria::ASC) Order by the oppr_r_usuario column
 *
 * @method     ChildOpcionPreguntaQuery groupByOpprCodigo() Group by the oppr_codigo column
 * @method     ChildOpcionPreguntaQuery groupByOpprValor() Group by the oppr_valor column
 * @method     ChildOpcionPreguntaQuery groupByOpprNoProcesaPromedio() Group by the oppr_no_procesa_promedio column
 * @method     ChildOpcionPreguntaQuery groupByOpprRFechaCreacion() Group by the oppr_r_fecha_creacion column
 * @method     ChildOpcionPreguntaQuery groupByOpprRFechaModificacion() Group by the oppr_r_fecha_modificacion column
 * @method     ChildOpcionPreguntaQuery groupByOpprRUsuario() Group by the oppr_r_usuario column
 *
 * @method     ChildOpcionPreguntaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOpcionPreguntaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOpcionPreguntaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOpcionPreguntaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOpcionPreguntaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOpcionPreguntaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOpcionPreguntaQuery leftJoinDetallePregunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the DetallePregunta relation
 * @method     ChildOpcionPreguntaQuery rightJoinDetallePregunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DetallePregunta relation
 * @method     ChildOpcionPreguntaQuery innerJoinDetallePregunta($relationAlias = null) Adds a INNER JOIN clause to the query using the DetallePregunta relation
 *
 * @method     ChildOpcionPreguntaQuery joinWithDetallePregunta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DetallePregunta relation
 *
 * @method     ChildOpcionPreguntaQuery leftJoinWithDetallePregunta() Adds a LEFT JOIN clause and with to the query using the DetallePregunta relation
 * @method     ChildOpcionPreguntaQuery rightJoinWithDetallePregunta() Adds a RIGHT JOIN clause and with to the query using the DetallePregunta relation
 * @method     ChildOpcionPreguntaQuery innerJoinWithDetallePregunta() Adds a INNER JOIN clause and with to the query using the DetallePregunta relation
 *
 * @method     \DetallePreguntaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildOpcionPregunta findOne(ConnectionInterface $con = null) Return the first ChildOpcionPregunta matching the query
 * @method     ChildOpcionPregunta findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOpcionPregunta matching the query, or a new ChildOpcionPregunta object populated from the query conditions when no match is found
 *
 * @method     ChildOpcionPregunta findOneByOpprCodigo(int $oppr_codigo) Return the first ChildOpcionPregunta filtered by the oppr_codigo column
 * @method     ChildOpcionPregunta findOneByOpprValor(string $oppr_valor) Return the first ChildOpcionPregunta filtered by the oppr_valor column
 * @method     ChildOpcionPregunta findOneByOpprNoProcesaPromedio(int $oppr_no_procesa_promedio) Return the first ChildOpcionPregunta filtered by the oppr_no_procesa_promedio column
 * @method     ChildOpcionPregunta findOneByOpprRFechaCreacion(string $oppr_r_fecha_creacion) Return the first ChildOpcionPregunta filtered by the oppr_r_fecha_creacion column
 * @method     ChildOpcionPregunta findOneByOpprRFechaModificacion(string $oppr_r_fecha_modificacion) Return the first ChildOpcionPregunta filtered by the oppr_r_fecha_modificacion column
 * @method     ChildOpcionPregunta findOneByOpprRUsuario(int $oppr_r_usuario) Return the first ChildOpcionPregunta filtered by the oppr_r_usuario column *

 * @method     ChildOpcionPregunta requirePk($key, ConnectionInterface $con = null) Return the ChildOpcionPregunta by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOpcionPregunta requireOne(ConnectionInterface $con = null) Return the first ChildOpcionPregunta matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOpcionPregunta requireOneByOpprCodigo(int $oppr_codigo) Return the first ChildOpcionPregunta filtered by the oppr_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOpcionPregunta requireOneByOpprValor(string $oppr_valor) Return the first ChildOpcionPregunta filtered by the oppr_valor column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOpcionPregunta requireOneByOpprNoProcesaPromedio(int $oppr_no_procesa_promedio) Return the first ChildOpcionPregunta filtered by the oppr_no_procesa_promedio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOpcionPregunta requireOneByOpprRFechaCreacion(string $oppr_r_fecha_creacion) Return the first ChildOpcionPregunta filtered by the oppr_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOpcionPregunta requireOneByOpprRFechaModificacion(string $oppr_r_fecha_modificacion) Return the first ChildOpcionPregunta filtered by the oppr_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOpcionPregunta requireOneByOpprRUsuario(int $oppr_r_usuario) Return the first ChildOpcionPregunta filtered by the oppr_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOpcionPregunta[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOpcionPregunta objects based on current ModelCriteria
 * @method     ChildOpcionPregunta[]|ObjectCollection findByOpprCodigo(int $oppr_codigo) Return ChildOpcionPregunta objects filtered by the oppr_codigo column
 * @method     ChildOpcionPregunta[]|ObjectCollection findByOpprValor(string $oppr_valor) Return ChildOpcionPregunta objects filtered by the oppr_valor column
 * @method     ChildOpcionPregunta[]|ObjectCollection findByOpprNoProcesaPromedio(int $oppr_no_procesa_promedio) Return ChildOpcionPregunta objects filtered by the oppr_no_procesa_promedio column
 * @method     ChildOpcionPregunta[]|ObjectCollection findByOpprRFechaCreacion(string $oppr_r_fecha_creacion) Return ChildOpcionPregunta objects filtered by the oppr_r_fecha_creacion column
 * @method     ChildOpcionPregunta[]|ObjectCollection findByOpprRFechaModificacion(string $oppr_r_fecha_modificacion) Return ChildOpcionPregunta objects filtered by the oppr_r_fecha_modificacion column
 * @method     ChildOpcionPregunta[]|ObjectCollection findByOpprRUsuario(int $oppr_r_usuario) Return ChildOpcionPregunta objects filtered by the oppr_r_usuario column
 * @method     ChildOpcionPregunta[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OpcionPreguntaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OpcionPreguntaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OpcionPregunta', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOpcionPreguntaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOpcionPreguntaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOpcionPreguntaQuery) {
            return $criteria;
        }
        $query = new ChildOpcionPreguntaQuery();
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
     * @return ChildOpcionPregunta|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OpcionPreguntaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OpcionPreguntaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOpcionPregunta A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT oppr_codigo, oppr_valor, oppr_no_procesa_promedio, oppr_r_fecha_creacion, oppr_r_fecha_modificacion, oppr_r_usuario FROM opcion_pregunta WHERE oppr_codigo = :p0';
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
            /** @var ChildOpcionPregunta $obj */
            $obj = new ChildOpcionPregunta();
            $obj->hydrate($row);
            OpcionPreguntaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOpcionPregunta|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOpcionPreguntaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOpcionPreguntaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the oppr_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByOpprCodigo(1234); // WHERE oppr_codigo = 1234
     * $query->filterByOpprCodigo(array(12, 34)); // WHERE oppr_codigo IN (12, 34)
     * $query->filterByOpprCodigo(array('min' => 12)); // WHERE oppr_codigo > 12
     * </code>
     *
     * @param     mixed $opprCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOpcionPreguntaQuery The current query, for fluid interface
     */
    public function filterByOpprCodigo($opprCodigo = null, $comparison = null)
    {
        if (is_array($opprCodigo)) {
            $useMinMax = false;
            if (isset($opprCodigo['min'])) {
                $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_CODIGO, $opprCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($opprCodigo['max'])) {
                $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_CODIGO, $opprCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_CODIGO, $opprCodigo, $comparison);
    }

    /**
     * Filter the query on the oppr_valor column
     *
     * Example usage:
     * <code>
     * $query->filterByOpprValor('fooValue');   // WHERE oppr_valor = 'fooValue'
     * $query->filterByOpprValor('%fooValue%', Criteria::LIKE); // WHERE oppr_valor LIKE '%fooValue%'
     * </code>
     *
     * @param     string $opprValor The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOpcionPreguntaQuery The current query, for fluid interface
     */
    public function filterByOpprValor($opprValor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($opprValor)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_VALOR, $opprValor, $comparison);
    }

    /**
     * Filter the query on the oppr_no_procesa_promedio column
     *
     * Example usage:
     * <code>
     * $query->filterByOpprNoProcesaPromedio(1234); // WHERE oppr_no_procesa_promedio = 1234
     * $query->filterByOpprNoProcesaPromedio(array(12, 34)); // WHERE oppr_no_procesa_promedio IN (12, 34)
     * $query->filterByOpprNoProcesaPromedio(array('min' => 12)); // WHERE oppr_no_procesa_promedio > 12
     * </code>
     *
     * @param     mixed $opprNoProcesaPromedio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOpcionPreguntaQuery The current query, for fluid interface
     */
    public function filterByOpprNoProcesaPromedio($opprNoProcesaPromedio = null, $comparison = null)
    {
        if (is_array($opprNoProcesaPromedio)) {
            $useMinMax = false;
            if (isset($opprNoProcesaPromedio['min'])) {
                $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_NO_PROCESA_PROMEDIO, $opprNoProcesaPromedio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($opprNoProcesaPromedio['max'])) {
                $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_NO_PROCESA_PROMEDIO, $opprNoProcesaPromedio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_NO_PROCESA_PROMEDIO, $opprNoProcesaPromedio, $comparison);
    }

    /**
     * Filter the query on the oppr_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByOpprRFechaCreacion('fooValue');   // WHERE oppr_r_fecha_creacion = 'fooValue'
     * $query->filterByOpprRFechaCreacion('%fooValue%', Criteria::LIKE); // WHERE oppr_r_fecha_creacion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $opprRFechaCreacion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOpcionPreguntaQuery The current query, for fluid interface
     */
    public function filterByOpprRFechaCreacion($opprRFechaCreacion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($opprRFechaCreacion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_R_FECHA_CREACION, $opprRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the oppr_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByOpprRFechaModificacion('2011-03-14'); // WHERE oppr_r_fecha_modificacion = '2011-03-14'
     * $query->filterByOpprRFechaModificacion('now'); // WHERE oppr_r_fecha_modificacion = '2011-03-14'
     * $query->filterByOpprRFechaModificacion(array('max' => 'yesterday')); // WHERE oppr_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $opprRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOpcionPreguntaQuery The current query, for fluid interface
     */
    public function filterByOpprRFechaModificacion($opprRFechaModificacion = null, $comparison = null)
    {
        if (is_array($opprRFechaModificacion)) {
            $useMinMax = false;
            if (isset($opprRFechaModificacion['min'])) {
                $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_R_FECHA_MODIFICACION, $opprRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($opprRFechaModificacion['max'])) {
                $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_R_FECHA_MODIFICACION, $opprRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_R_FECHA_MODIFICACION, $opprRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the oppr_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByOpprRUsuario(1234); // WHERE oppr_r_usuario = 1234
     * $query->filterByOpprRUsuario(array(12, 34)); // WHERE oppr_r_usuario IN (12, 34)
     * $query->filterByOpprRUsuario(array('min' => 12)); // WHERE oppr_r_usuario > 12
     * </code>
     *
     * @param     mixed $opprRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOpcionPreguntaQuery The current query, for fluid interface
     */
    public function filterByOpprRUsuario($opprRUsuario = null, $comparison = null)
    {
        if (is_array($opprRUsuario)) {
            $useMinMax = false;
            if (isset($opprRUsuario['min'])) {
                $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_R_USUARIO, $opprRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($opprRUsuario['max'])) {
                $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_R_USUARIO, $opprRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_R_USUARIO, $opprRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \DetallePregunta object
     *
     * @param \DetallePregunta|ObjectCollection $detallePregunta the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOpcionPreguntaQuery The current query, for fluid interface
     */
    public function filterByDetallePregunta($detallePregunta, $comparison = null)
    {
        if ($detallePregunta instanceof \DetallePregunta) {
            return $this
                ->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_CODIGO, $detallePregunta->getDeprCOpcionPregunta(), $comparison);
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
     * @return $this|ChildOpcionPreguntaQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildOpcionPregunta $opcionPregunta Object to remove from the list of results
     *
     * @return $this|ChildOpcionPreguntaQuery The current query, for fluid interface
     */
    public function prune($opcionPregunta = null)
    {
        if ($opcionPregunta) {
            $this->addUsingAlias(OpcionPreguntaTableMap::COL_OPPR_CODIGO, $opcionPregunta->getOpprCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the opcion_pregunta table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OpcionPreguntaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OpcionPreguntaTableMap::clearInstancePool();
            OpcionPreguntaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OpcionPreguntaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OpcionPreguntaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OpcionPreguntaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OpcionPreguntaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OpcionPreguntaQuery
