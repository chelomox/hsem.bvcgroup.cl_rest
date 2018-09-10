<?php

namespace Base;

use \TEvaluacionAplicada as ChildTEvaluacionAplicada;
use \TEvaluacionAplicadaQuery as ChildTEvaluacionAplicadaQuery;
use \Exception;
use \PDO;
use Map\TEvaluacionAplicadaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_evaluacion_aplicada' table.
 *
 *
 *
 * @method     ChildTEvaluacionAplicadaQuery orderByTevaTipo($order = Criteria::ASC) Order by the teva_tipo column
 * @method     ChildTEvaluacionAplicadaQuery orderByTevaDescripcion($order = Criteria::ASC) Order by the teva_descripcion column
 * @method     ChildTEvaluacionAplicadaQuery orderByTevaRFechaModificacion($order = Criteria::ASC) Order by the teva_r_fecha_modificacion column
 * @method     ChildTEvaluacionAplicadaQuery orderByTevaRFechaCreacion($order = Criteria::ASC) Order by the teva_r_fecha_creacion column
 * @method     ChildTEvaluacionAplicadaQuery orderByTevaRUsuario($order = Criteria::ASC) Order by the teva_r_usuario column
 *
 * @method     ChildTEvaluacionAplicadaQuery groupByTevaTipo() Group by the teva_tipo column
 * @method     ChildTEvaluacionAplicadaQuery groupByTevaDescripcion() Group by the teva_descripcion column
 * @method     ChildTEvaluacionAplicadaQuery groupByTevaRFechaModificacion() Group by the teva_r_fecha_modificacion column
 * @method     ChildTEvaluacionAplicadaQuery groupByTevaRFechaCreacion() Group by the teva_r_fecha_creacion column
 * @method     ChildTEvaluacionAplicadaQuery groupByTevaRUsuario() Group by the teva_r_usuario column
 *
 * @method     ChildTEvaluacionAplicadaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTEvaluacionAplicadaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTEvaluacionAplicadaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTEvaluacionAplicadaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTEvaluacionAplicadaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTEvaluacionAplicadaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTEvaluacionAplicadaQuery leftJoinEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the EvaluacionAplicada relation
 * @method     ChildTEvaluacionAplicadaQuery rightJoinEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EvaluacionAplicada relation
 * @method     ChildTEvaluacionAplicadaQuery innerJoinEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the EvaluacionAplicada relation
 *
 * @method     ChildTEvaluacionAplicadaQuery joinWithEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EvaluacionAplicada relation
 *
 * @method     ChildTEvaluacionAplicadaQuery leftJoinWithEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the EvaluacionAplicada relation
 * @method     ChildTEvaluacionAplicadaQuery rightJoinWithEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the EvaluacionAplicada relation
 * @method     ChildTEvaluacionAplicadaQuery innerJoinWithEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the EvaluacionAplicada relation
 *
 * @method     \EvaluacionAplicadaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTEvaluacionAplicada findOne(ConnectionInterface $con = null) Return the first ChildTEvaluacionAplicada matching the query
 * @method     ChildTEvaluacionAplicada findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTEvaluacionAplicada matching the query, or a new ChildTEvaluacionAplicada object populated from the query conditions when no match is found
 *
 * @method     ChildTEvaluacionAplicada findOneByTevaTipo(int $teva_tipo) Return the first ChildTEvaluacionAplicada filtered by the teva_tipo column
 * @method     ChildTEvaluacionAplicada findOneByTevaDescripcion(string $teva_descripcion) Return the first ChildTEvaluacionAplicada filtered by the teva_descripcion column
 * @method     ChildTEvaluacionAplicada findOneByTevaRFechaModificacion(string $teva_r_fecha_modificacion) Return the first ChildTEvaluacionAplicada filtered by the teva_r_fecha_modificacion column
 * @method     ChildTEvaluacionAplicada findOneByTevaRFechaCreacion(string $teva_r_fecha_creacion) Return the first ChildTEvaluacionAplicada filtered by the teva_r_fecha_creacion column
 * @method     ChildTEvaluacionAplicada findOneByTevaRUsuario(int $teva_r_usuario) Return the first ChildTEvaluacionAplicada filtered by the teva_r_usuario column *

 * @method     ChildTEvaluacionAplicada requirePk($key, ConnectionInterface $con = null) Return the ChildTEvaluacionAplicada by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTEvaluacionAplicada requireOne(ConnectionInterface $con = null) Return the first ChildTEvaluacionAplicada matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTEvaluacionAplicada requireOneByTevaTipo(int $teva_tipo) Return the first ChildTEvaluacionAplicada filtered by the teva_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTEvaluacionAplicada requireOneByTevaDescripcion(string $teva_descripcion) Return the first ChildTEvaluacionAplicada filtered by the teva_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTEvaluacionAplicada requireOneByTevaRFechaModificacion(string $teva_r_fecha_modificacion) Return the first ChildTEvaluacionAplicada filtered by the teva_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTEvaluacionAplicada requireOneByTevaRFechaCreacion(string $teva_r_fecha_creacion) Return the first ChildTEvaluacionAplicada filtered by the teva_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTEvaluacionAplicada requireOneByTevaRUsuario(int $teva_r_usuario) Return the first ChildTEvaluacionAplicada filtered by the teva_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTEvaluacionAplicada[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTEvaluacionAplicada objects based on current ModelCriteria
 * @method     ChildTEvaluacionAplicada[]|ObjectCollection findByTevaTipo(int $teva_tipo) Return ChildTEvaluacionAplicada objects filtered by the teva_tipo column
 * @method     ChildTEvaluacionAplicada[]|ObjectCollection findByTevaDescripcion(string $teva_descripcion) Return ChildTEvaluacionAplicada objects filtered by the teva_descripcion column
 * @method     ChildTEvaluacionAplicada[]|ObjectCollection findByTevaRFechaModificacion(string $teva_r_fecha_modificacion) Return ChildTEvaluacionAplicada objects filtered by the teva_r_fecha_modificacion column
 * @method     ChildTEvaluacionAplicada[]|ObjectCollection findByTevaRFechaCreacion(string $teva_r_fecha_creacion) Return ChildTEvaluacionAplicada objects filtered by the teva_r_fecha_creacion column
 * @method     ChildTEvaluacionAplicada[]|ObjectCollection findByTevaRUsuario(int $teva_r_usuario) Return ChildTEvaluacionAplicada objects filtered by the teva_r_usuario column
 * @method     ChildTEvaluacionAplicada[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TEvaluacionAplicadaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TEvaluacionAplicadaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TEvaluacionAplicada', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTEvaluacionAplicadaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTEvaluacionAplicadaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTEvaluacionAplicadaQuery) {
            return $criteria;
        }
        $query = new ChildTEvaluacionAplicadaQuery();
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
     * @return ChildTEvaluacionAplicada|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TEvaluacionAplicadaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTEvaluacionAplicada A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT teva_tipo, teva_descripcion, teva_r_fecha_modificacion, teva_r_fecha_creacion, teva_r_usuario FROM t_evaluacion_aplicada WHERE teva_tipo = :p0';
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
            /** @var ChildTEvaluacionAplicada $obj */
            $obj = new ChildTEvaluacionAplicada();
            $obj->hydrate($row);
            TEvaluacionAplicadaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTEvaluacionAplicada|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the teva_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTevaTipo(1234); // WHERE teva_tipo = 1234
     * $query->filterByTevaTipo(array(12, 34)); // WHERE teva_tipo IN (12, 34)
     * $query->filterByTevaTipo(array('min' => 12)); // WHERE teva_tipo > 12
     * </code>
     *
     * @param     mixed $tevaTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByTevaTipo($tevaTipo = null, $comparison = null)
    {
        if (is_array($tevaTipo)) {
            $useMinMax = false;
            if (isset($tevaTipo['min'])) {
                $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_TIPO, $tevaTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tevaTipo['max'])) {
                $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_TIPO, $tevaTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_TIPO, $tevaTipo, $comparison);
    }

    /**
     * Filter the query on the teva_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByTevaDescripcion('fooValue');   // WHERE teva_descripcion = 'fooValue'
     * $query->filterByTevaDescripcion('%fooValue%', Criteria::LIKE); // WHERE teva_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tevaDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByTevaDescripcion($tevaDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tevaDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_DESCRIPCION, $tevaDescripcion, $comparison);
    }

    /**
     * Filter the query on the teva_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTevaRFechaModificacion('2011-03-14'); // WHERE teva_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTevaRFechaModificacion('now'); // WHERE teva_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTevaRFechaModificacion(array('max' => 'yesterday')); // WHERE teva_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tevaRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByTevaRFechaModificacion($tevaRFechaModificacion = null, $comparison = null)
    {
        if (is_array($tevaRFechaModificacion)) {
            $useMinMax = false;
            if (isset($tevaRFechaModificacion['min'])) {
                $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_R_FECHA_MODIFICACION, $tevaRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tevaRFechaModificacion['max'])) {
                $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_R_FECHA_MODIFICACION, $tevaRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_R_FECHA_MODIFICACION, $tevaRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the teva_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTevaRFechaCreacion('2011-03-14'); // WHERE teva_r_fecha_creacion = '2011-03-14'
     * $query->filterByTevaRFechaCreacion('now'); // WHERE teva_r_fecha_creacion = '2011-03-14'
     * $query->filterByTevaRFechaCreacion(array('max' => 'yesterday')); // WHERE teva_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tevaRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByTevaRFechaCreacion($tevaRFechaCreacion = null, $comparison = null)
    {
        if (is_array($tevaRFechaCreacion)) {
            $useMinMax = false;
            if (isset($tevaRFechaCreacion['min'])) {
                $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_R_FECHA_CREACION, $tevaRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tevaRFechaCreacion['max'])) {
                $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_R_FECHA_CREACION, $tevaRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_R_FECHA_CREACION, $tevaRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the teva_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTevaRUsuario(1234); // WHERE teva_r_usuario = 1234
     * $query->filterByTevaRUsuario(array(12, 34)); // WHERE teva_r_usuario IN (12, 34)
     * $query->filterByTevaRUsuario(array('min' => 12)); // WHERE teva_r_usuario > 12
     * </code>
     *
     * @param     mixed $tevaRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByTevaRUsuario($tevaRUsuario = null, $comparison = null)
    {
        if (is_array($tevaRUsuario)) {
            $useMinMax = false;
            if (isset($tevaRUsuario['min'])) {
                $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_R_USUARIO, $tevaRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tevaRUsuario['max'])) {
                $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_R_USUARIO, $tevaRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_R_USUARIO, $tevaRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \EvaluacionAplicada object
     *
     * @param \EvaluacionAplicada|ObjectCollection $evaluacionAplicada the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvaluacionAplicada($evaluacionAplicada, $comparison = null)
    {
        if ($evaluacionAplicada instanceof \EvaluacionAplicada) {
            return $this
                ->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_TIPO, $evaluacionAplicada->getEvapTEvaluacionAplicada(), $comparison);
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
     * @return $this|ChildTEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function joinEvaluacionAplicada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useEvaluacionAplicadaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEvaluacionAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EvaluacionAplicada', '\EvaluacionAplicadaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTEvaluacionAplicada $tEvaluacionAplicada Object to remove from the list of results
     *
     * @return $this|ChildTEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function prune($tEvaluacionAplicada = null)
    {
        if ($tEvaluacionAplicada) {
            $this->addUsingAlias(TEvaluacionAplicadaTableMap::COL_TEVA_TIPO, $tEvaluacionAplicada->getTevaTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_evaluacion_aplicada table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TEvaluacionAplicadaTableMap::clearInstancePool();
            TEvaluacionAplicadaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TEvaluacionAplicadaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TEvaluacionAplicadaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TEvaluacionAplicadaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TEvaluacionAplicadaQuery
