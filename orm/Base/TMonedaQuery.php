<?php

namespace Base;

use \TMoneda as ChildTMoneda;
use \TMonedaQuery as ChildTMonedaQuery;
use \Exception;
use \PDO;
use Map\TMonedaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_moneda' table.
 *
 *
 *
 * @method     ChildTMonedaQuery orderByTmonTipo($order = Criteria::ASC) Order by the tmon_tipo column
 * @method     ChildTMonedaQuery orderByTmonDescripcion($order = Criteria::ASC) Order by the tmon_descripcion column
 * @method     ChildTMonedaQuery orderByTmonRFechaCreacion($order = Criteria::ASC) Order by the tmon_r_fecha_creacion column
 * @method     ChildTMonedaQuery orderByTmonRFechaModificacion($order = Criteria::ASC) Order by the tmon_r_fecha_modificacion column
 * @method     ChildTMonedaQuery orderByTmonRUsuario($order = Criteria::ASC) Order by the tmon_r_usuario column
 *
 * @method     ChildTMonedaQuery groupByTmonTipo() Group by the tmon_tipo column
 * @method     ChildTMonedaQuery groupByTmonDescripcion() Group by the tmon_descripcion column
 * @method     ChildTMonedaQuery groupByTmonRFechaCreacion() Group by the tmon_r_fecha_creacion column
 * @method     ChildTMonedaQuery groupByTmonRFechaModificacion() Group by the tmon_r_fecha_modificacion column
 * @method     ChildTMonedaQuery groupByTmonRUsuario() Group by the tmon_r_usuario column
 *
 * @method     ChildTMonedaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTMonedaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTMonedaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTMonedaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTMonedaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTMonedaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTMonedaQuery leftJoinDictacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dictacion relation
 * @method     ChildTMonedaQuery rightJoinDictacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dictacion relation
 * @method     ChildTMonedaQuery innerJoinDictacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Dictacion relation
 *
 * @method     ChildTMonedaQuery joinWithDictacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dictacion relation
 *
 * @method     ChildTMonedaQuery leftJoinWithDictacion() Adds a LEFT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildTMonedaQuery rightJoinWithDictacion() Adds a RIGHT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildTMonedaQuery innerJoinWithDictacion() Adds a INNER JOIN clause and with to the query using the Dictacion relation
 *
 * @method     \DictacionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTMoneda findOne(ConnectionInterface $con = null) Return the first ChildTMoneda matching the query
 * @method     ChildTMoneda findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTMoneda matching the query, or a new ChildTMoneda object populated from the query conditions when no match is found
 *
 * @method     ChildTMoneda findOneByTmonTipo(int $tmon_tipo) Return the first ChildTMoneda filtered by the tmon_tipo column
 * @method     ChildTMoneda findOneByTmonDescripcion(string $tmon_descripcion) Return the first ChildTMoneda filtered by the tmon_descripcion column
 * @method     ChildTMoneda findOneByTmonRFechaCreacion(string $tmon_r_fecha_creacion) Return the first ChildTMoneda filtered by the tmon_r_fecha_creacion column
 * @method     ChildTMoneda findOneByTmonRFechaModificacion(string $tmon_r_fecha_modificacion) Return the first ChildTMoneda filtered by the tmon_r_fecha_modificacion column
 * @method     ChildTMoneda findOneByTmonRUsuario(int $tmon_r_usuario) Return the first ChildTMoneda filtered by the tmon_r_usuario column *

 * @method     ChildTMoneda requirePk($key, ConnectionInterface $con = null) Return the ChildTMoneda by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTMoneda requireOne(ConnectionInterface $con = null) Return the first ChildTMoneda matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTMoneda requireOneByTmonTipo(int $tmon_tipo) Return the first ChildTMoneda filtered by the tmon_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTMoneda requireOneByTmonDescripcion(string $tmon_descripcion) Return the first ChildTMoneda filtered by the tmon_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTMoneda requireOneByTmonRFechaCreacion(string $tmon_r_fecha_creacion) Return the first ChildTMoneda filtered by the tmon_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTMoneda requireOneByTmonRFechaModificacion(string $tmon_r_fecha_modificacion) Return the first ChildTMoneda filtered by the tmon_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTMoneda requireOneByTmonRUsuario(int $tmon_r_usuario) Return the first ChildTMoneda filtered by the tmon_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTMoneda[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTMoneda objects based on current ModelCriteria
 * @method     ChildTMoneda[]|ObjectCollection findByTmonTipo(int $tmon_tipo) Return ChildTMoneda objects filtered by the tmon_tipo column
 * @method     ChildTMoneda[]|ObjectCollection findByTmonDescripcion(string $tmon_descripcion) Return ChildTMoneda objects filtered by the tmon_descripcion column
 * @method     ChildTMoneda[]|ObjectCollection findByTmonRFechaCreacion(string $tmon_r_fecha_creacion) Return ChildTMoneda objects filtered by the tmon_r_fecha_creacion column
 * @method     ChildTMoneda[]|ObjectCollection findByTmonRFechaModificacion(string $tmon_r_fecha_modificacion) Return ChildTMoneda objects filtered by the tmon_r_fecha_modificacion column
 * @method     ChildTMoneda[]|ObjectCollection findByTmonRUsuario(int $tmon_r_usuario) Return ChildTMoneda objects filtered by the tmon_r_usuario column
 * @method     ChildTMoneda[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TMonedaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TMonedaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TMoneda', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTMonedaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTMonedaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTMonedaQuery) {
            return $criteria;
        }
        $query = new ChildTMonedaQuery();
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
     * @return ChildTMoneda|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TMonedaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TMonedaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTMoneda A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tmon_tipo, tmon_descripcion, tmon_r_fecha_creacion, tmon_r_fecha_modificacion, tmon_r_usuario FROM t_moneda WHERE tmon_tipo = :p0';
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
            /** @var ChildTMoneda $obj */
            $obj = new ChildTMoneda();
            $obj->hydrate($row);
            TMonedaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTMoneda|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTMonedaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TMonedaTableMap::COL_TMON_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTMonedaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TMonedaTableMap::COL_TMON_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tmon_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTmonTipo(1234); // WHERE tmon_tipo = 1234
     * $query->filterByTmonTipo(array(12, 34)); // WHERE tmon_tipo IN (12, 34)
     * $query->filterByTmonTipo(array('min' => 12)); // WHERE tmon_tipo > 12
     * </code>
     *
     * @param     mixed $tmonTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTMonedaQuery The current query, for fluid interface
     */
    public function filterByTmonTipo($tmonTipo = null, $comparison = null)
    {
        if (is_array($tmonTipo)) {
            $useMinMax = false;
            if (isset($tmonTipo['min'])) {
                $this->addUsingAlias(TMonedaTableMap::COL_TMON_TIPO, $tmonTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmonTipo['max'])) {
                $this->addUsingAlias(TMonedaTableMap::COL_TMON_TIPO, $tmonTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TMonedaTableMap::COL_TMON_TIPO, $tmonTipo, $comparison);
    }

    /**
     * Filter the query on the tmon_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByTmonDescripcion('fooValue');   // WHERE tmon_descripcion = 'fooValue'
     * $query->filterByTmonDescripcion('%fooValue%', Criteria::LIKE); // WHERE tmon_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tmonDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTMonedaQuery The current query, for fluid interface
     */
    public function filterByTmonDescripcion($tmonDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tmonDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TMonedaTableMap::COL_TMON_DESCRIPCION, $tmonDescripcion, $comparison);
    }

    /**
     * Filter the query on the tmon_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTmonRFechaCreacion('2011-03-14'); // WHERE tmon_r_fecha_creacion = '2011-03-14'
     * $query->filterByTmonRFechaCreacion('now'); // WHERE tmon_r_fecha_creacion = '2011-03-14'
     * $query->filterByTmonRFechaCreacion(array('max' => 'yesterday')); // WHERE tmon_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmonRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTMonedaQuery The current query, for fluid interface
     */
    public function filterByTmonRFechaCreacion($tmonRFechaCreacion = null, $comparison = null)
    {
        if (is_array($tmonRFechaCreacion)) {
            $useMinMax = false;
            if (isset($tmonRFechaCreacion['min'])) {
                $this->addUsingAlias(TMonedaTableMap::COL_TMON_R_FECHA_CREACION, $tmonRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmonRFechaCreacion['max'])) {
                $this->addUsingAlias(TMonedaTableMap::COL_TMON_R_FECHA_CREACION, $tmonRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TMonedaTableMap::COL_TMON_R_FECHA_CREACION, $tmonRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the tmon_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTmonRFechaModificacion('2011-03-14'); // WHERE tmon_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTmonRFechaModificacion('now'); // WHERE tmon_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTmonRFechaModificacion(array('max' => 'yesterday')); // WHERE tmon_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmonRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTMonedaQuery The current query, for fluid interface
     */
    public function filterByTmonRFechaModificacion($tmonRFechaModificacion = null, $comparison = null)
    {
        if (is_array($tmonRFechaModificacion)) {
            $useMinMax = false;
            if (isset($tmonRFechaModificacion['min'])) {
                $this->addUsingAlias(TMonedaTableMap::COL_TMON_R_FECHA_MODIFICACION, $tmonRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmonRFechaModificacion['max'])) {
                $this->addUsingAlias(TMonedaTableMap::COL_TMON_R_FECHA_MODIFICACION, $tmonRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TMonedaTableMap::COL_TMON_R_FECHA_MODIFICACION, $tmonRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the tmon_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTmonRUsuario(1234); // WHERE tmon_r_usuario = 1234
     * $query->filterByTmonRUsuario(array(12, 34)); // WHERE tmon_r_usuario IN (12, 34)
     * $query->filterByTmonRUsuario(array('min' => 12)); // WHERE tmon_r_usuario > 12
     * </code>
     *
     * @param     mixed $tmonRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTMonedaQuery The current query, for fluid interface
     */
    public function filterByTmonRUsuario($tmonRUsuario = null, $comparison = null)
    {
        if (is_array($tmonRUsuario)) {
            $useMinMax = false;
            if (isset($tmonRUsuario['min'])) {
                $this->addUsingAlias(TMonedaTableMap::COL_TMON_R_USUARIO, $tmonRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmonRUsuario['max'])) {
                $this->addUsingAlias(TMonedaTableMap::COL_TMON_R_USUARIO, $tmonRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TMonedaTableMap::COL_TMON_R_USUARIO, $tmonRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Dictacion object
     *
     * @param \Dictacion|ObjectCollection $dictacion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTMonedaQuery The current query, for fluid interface
     */
    public function filterByDictacion($dictacion, $comparison = null)
    {
        if ($dictacion instanceof \Dictacion) {
            return $this
                ->addUsingAlias(TMonedaTableMap::COL_TMON_TIPO, $dictacion->getDictTMoneda(), $comparison);
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
     * @return $this|ChildTMonedaQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildTMoneda $tMoneda Object to remove from the list of results
     *
     * @return $this|ChildTMonedaQuery The current query, for fluid interface
     */
    public function prune($tMoneda = null)
    {
        if ($tMoneda) {
            $this->addUsingAlias(TMonedaTableMap::COL_TMON_TIPO, $tMoneda->getTmonTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_moneda table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TMonedaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TMonedaTableMap::clearInstancePool();
            TMonedaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TMonedaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TMonedaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TMonedaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TMonedaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TMonedaQuery
