<?php

namespace Base;

use \TEvaluacion as ChildTEvaluacion;
use \TEvaluacionQuery as ChildTEvaluacionQuery;
use \Exception;
use \PDO;
use Map\TEvaluacionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_evaluacion' table.
 *
 *
 *
 * @method     ChildTEvaluacionQuery orderByTevTipo($order = Criteria::ASC) Order by the tev_tipo column
 * @method     ChildTEvaluacionQuery orderByTevDescripcion($order = Criteria::ASC) Order by the tev_descripcion column
 * @method     ChildTEvaluacionQuery orderByTevRFechaCreacion($order = Criteria::ASC) Order by the tev_r_fecha_creacion column
 * @method     ChildTEvaluacionQuery orderByTevRFechaModificacion($order = Criteria::ASC) Order by the tev_r_fecha_modificacion column
 * @method     ChildTEvaluacionQuery orderByTevRUsuario($order = Criteria::ASC) Order by the tev_r_usuario column
 *
 * @method     ChildTEvaluacionQuery groupByTevTipo() Group by the tev_tipo column
 * @method     ChildTEvaluacionQuery groupByTevDescripcion() Group by the tev_descripcion column
 * @method     ChildTEvaluacionQuery groupByTevRFechaCreacion() Group by the tev_r_fecha_creacion column
 * @method     ChildTEvaluacionQuery groupByTevRFechaModificacion() Group by the tev_r_fecha_modificacion column
 * @method     ChildTEvaluacionQuery groupByTevRUsuario() Group by the tev_r_usuario column
 *
 * @method     ChildTEvaluacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTEvaluacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTEvaluacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTEvaluacionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTEvaluacionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTEvaluacionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTEvaluacionQuery leftJoinDictacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dictacion relation
 * @method     ChildTEvaluacionQuery rightJoinDictacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dictacion relation
 * @method     ChildTEvaluacionQuery innerJoinDictacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Dictacion relation
 *
 * @method     ChildTEvaluacionQuery joinWithDictacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dictacion relation
 *
 * @method     ChildTEvaluacionQuery leftJoinWithDictacion() Adds a LEFT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildTEvaluacionQuery rightJoinWithDictacion() Adds a RIGHT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildTEvaluacionQuery innerJoinWithDictacion() Adds a INNER JOIN clause and with to the query using the Dictacion relation
 *
 * @method     ChildTEvaluacionQuery leftJoinEvaluacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Evaluacion relation
 * @method     ChildTEvaluacionQuery rightJoinEvaluacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Evaluacion relation
 * @method     ChildTEvaluacionQuery innerJoinEvaluacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Evaluacion relation
 *
 * @method     ChildTEvaluacionQuery joinWithEvaluacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Evaluacion relation
 *
 * @method     ChildTEvaluacionQuery leftJoinWithEvaluacion() Adds a LEFT JOIN clause and with to the query using the Evaluacion relation
 * @method     ChildTEvaluacionQuery rightJoinWithEvaluacion() Adds a RIGHT JOIN clause and with to the query using the Evaluacion relation
 * @method     ChildTEvaluacionQuery innerJoinWithEvaluacion() Adds a INNER JOIN clause and with to the query using the Evaluacion relation
 *
 * @method     \DictacionQuery|\EvaluacionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTEvaluacion findOne(ConnectionInterface $con = null) Return the first ChildTEvaluacion matching the query
 * @method     ChildTEvaluacion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTEvaluacion matching the query, or a new ChildTEvaluacion object populated from the query conditions when no match is found
 *
 * @method     ChildTEvaluacion findOneByTevTipo(int $tev_tipo) Return the first ChildTEvaluacion filtered by the tev_tipo column
 * @method     ChildTEvaluacion findOneByTevDescripcion(string $tev_descripcion) Return the first ChildTEvaluacion filtered by the tev_descripcion column
 * @method     ChildTEvaluacion findOneByTevRFechaCreacion(string $tev_r_fecha_creacion) Return the first ChildTEvaluacion filtered by the tev_r_fecha_creacion column
 * @method     ChildTEvaluacion findOneByTevRFechaModificacion(string $tev_r_fecha_modificacion) Return the first ChildTEvaluacion filtered by the tev_r_fecha_modificacion column
 * @method     ChildTEvaluacion findOneByTevRUsuario(int $tev_r_usuario) Return the first ChildTEvaluacion filtered by the tev_r_usuario column *

 * @method     ChildTEvaluacion requirePk($key, ConnectionInterface $con = null) Return the ChildTEvaluacion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTEvaluacion requireOne(ConnectionInterface $con = null) Return the first ChildTEvaluacion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTEvaluacion requireOneByTevTipo(int $tev_tipo) Return the first ChildTEvaluacion filtered by the tev_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTEvaluacion requireOneByTevDescripcion(string $tev_descripcion) Return the first ChildTEvaluacion filtered by the tev_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTEvaluacion requireOneByTevRFechaCreacion(string $tev_r_fecha_creacion) Return the first ChildTEvaluacion filtered by the tev_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTEvaluacion requireOneByTevRFechaModificacion(string $tev_r_fecha_modificacion) Return the first ChildTEvaluacion filtered by the tev_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTEvaluacion requireOneByTevRUsuario(int $tev_r_usuario) Return the first ChildTEvaluacion filtered by the tev_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTEvaluacion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTEvaluacion objects based on current ModelCriteria
 * @method     ChildTEvaluacion[]|ObjectCollection findByTevTipo(int $tev_tipo) Return ChildTEvaluacion objects filtered by the tev_tipo column
 * @method     ChildTEvaluacion[]|ObjectCollection findByTevDescripcion(string $tev_descripcion) Return ChildTEvaluacion objects filtered by the tev_descripcion column
 * @method     ChildTEvaluacion[]|ObjectCollection findByTevRFechaCreacion(string $tev_r_fecha_creacion) Return ChildTEvaluacion objects filtered by the tev_r_fecha_creacion column
 * @method     ChildTEvaluacion[]|ObjectCollection findByTevRFechaModificacion(string $tev_r_fecha_modificacion) Return ChildTEvaluacion objects filtered by the tev_r_fecha_modificacion column
 * @method     ChildTEvaluacion[]|ObjectCollection findByTevRUsuario(int $tev_r_usuario) Return ChildTEvaluacion objects filtered by the tev_r_usuario column
 * @method     ChildTEvaluacion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TEvaluacionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TEvaluacionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TEvaluacion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTEvaluacionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTEvaluacionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTEvaluacionQuery) {
            return $criteria;
        }
        $query = new ChildTEvaluacionQuery();
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
     * @return ChildTEvaluacion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TEvaluacionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TEvaluacionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTEvaluacion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tev_tipo, tev_descripcion, tev_r_fecha_creacion, tev_r_fecha_modificacion, tev_r_usuario FROM t_evaluacion WHERE tev_tipo = :p0';
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
            /** @var ChildTEvaluacion $obj */
            $obj = new ChildTEvaluacion();
            $obj->hydrate($row);
            TEvaluacionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTEvaluacion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tev_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTevTipo(1234); // WHERE tev_tipo = 1234
     * $query->filterByTevTipo(array(12, 34)); // WHERE tev_tipo IN (12, 34)
     * $query->filterByTevTipo(array('min' => 12)); // WHERE tev_tipo > 12
     * </code>
     *
     * @param     mixed $tevTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function filterByTevTipo($tevTipo = null, $comparison = null)
    {
        if (is_array($tevTipo)) {
            $useMinMax = false;
            if (isset($tevTipo['min'])) {
                $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_TIPO, $tevTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tevTipo['max'])) {
                $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_TIPO, $tevTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_TIPO, $tevTipo, $comparison);
    }

    /**
     * Filter the query on the tev_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByTevDescripcion('fooValue');   // WHERE tev_descripcion = 'fooValue'
     * $query->filterByTevDescripcion('%fooValue%', Criteria::LIKE); // WHERE tev_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tevDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function filterByTevDescripcion($tevDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tevDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_DESCRIPCION, $tevDescripcion, $comparison);
    }

    /**
     * Filter the query on the tev_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTevRFechaCreacion('2011-03-14'); // WHERE tev_r_fecha_creacion = '2011-03-14'
     * $query->filterByTevRFechaCreacion('now'); // WHERE tev_r_fecha_creacion = '2011-03-14'
     * $query->filterByTevRFechaCreacion(array('max' => 'yesterday')); // WHERE tev_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tevRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function filterByTevRFechaCreacion($tevRFechaCreacion = null, $comparison = null)
    {
        if (is_array($tevRFechaCreacion)) {
            $useMinMax = false;
            if (isset($tevRFechaCreacion['min'])) {
                $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_R_FECHA_CREACION, $tevRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tevRFechaCreacion['max'])) {
                $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_R_FECHA_CREACION, $tevRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_R_FECHA_CREACION, $tevRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the tev_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTevRFechaModificacion('2011-03-14'); // WHERE tev_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTevRFechaModificacion('now'); // WHERE tev_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTevRFechaModificacion(array('max' => 'yesterday')); // WHERE tev_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tevRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function filterByTevRFechaModificacion($tevRFechaModificacion = null, $comparison = null)
    {
        if (is_array($tevRFechaModificacion)) {
            $useMinMax = false;
            if (isset($tevRFechaModificacion['min'])) {
                $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_R_FECHA_MODIFICACION, $tevRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tevRFechaModificacion['max'])) {
                $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_R_FECHA_MODIFICACION, $tevRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_R_FECHA_MODIFICACION, $tevRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the tev_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTevRUsuario(1234); // WHERE tev_r_usuario = 1234
     * $query->filterByTevRUsuario(array(12, 34)); // WHERE tev_r_usuario IN (12, 34)
     * $query->filterByTevRUsuario(array('min' => 12)); // WHERE tev_r_usuario > 12
     * </code>
     *
     * @param     mixed $tevRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function filterByTevRUsuario($tevRUsuario = null, $comparison = null)
    {
        if (is_array($tevRUsuario)) {
            $useMinMax = false;
            if (isset($tevRUsuario['min'])) {
                $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_R_USUARIO, $tevRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tevRUsuario['max'])) {
                $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_R_USUARIO, $tevRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_R_USUARIO, $tevRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Dictacion object
     *
     * @param \Dictacion|ObjectCollection $dictacion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function filterByDictacion($dictacion, $comparison = null)
    {
        if ($dictacion instanceof \Dictacion) {
            return $this
                ->addUsingAlias(TEvaluacionTableMap::COL_TEV_TIPO, $dictacion->getDictTEvaluacion(), $comparison);
        } elseif ($dictacion instanceof ObjectCollection) {
            return $this
                ->useDictacionQuery()
                ->filterByPrimaryKeys($dictacion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDictacion() only accepts arguments of type \Dictacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dictacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function joinDictacion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Dictacion');

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
            $this->addJoinObject($join, 'Dictacion');
        }

        return $this;
    }

    /**
     * Use the Dictacion relation Dictacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DictacionQuery A secondary query class using the current class as primary query
     */
    public function useDictacionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDictacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dictacion', '\DictacionQuery');
    }

    /**
     * Filter the query by a related \Evaluacion object
     *
     * @param \Evaluacion|ObjectCollection $evaluacion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function filterByEvaluacion($evaluacion, $comparison = null)
    {
        if ($evaluacion instanceof \Evaluacion) {
            return $this
                ->addUsingAlias(TEvaluacionTableMap::COL_TEV_TIPO, $evaluacion->getEvalTEvaluacion(), $comparison);
        } elseif ($evaluacion instanceof ObjectCollection) {
            return $this
                ->useEvaluacionQuery()
                ->filterByPrimaryKeys($evaluacion->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function joinEvaluacion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useEvaluacionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEvaluacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Evaluacion', '\EvaluacionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTEvaluacion $tEvaluacion Object to remove from the list of results
     *
     * @return $this|ChildTEvaluacionQuery The current query, for fluid interface
     */
    public function prune($tEvaluacion = null)
    {
        if ($tEvaluacion) {
            $this->addUsingAlias(TEvaluacionTableMap::COL_TEV_TIPO, $tEvaluacion->getTevTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_evaluacion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TEvaluacionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TEvaluacionTableMap::clearInstancePool();
            TEvaluacionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TEvaluacionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TEvaluacionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TEvaluacionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TEvaluacionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TEvaluacionQuery
