<?php

namespace Base;

use \EActividad as ChildEActividad;
use \EActividadQuery as ChildEActividadQuery;
use \Exception;
use \PDO;
use Map\EActividadTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'e_actividad' table.
 *
 *
 *
 * @method     ChildEActividadQuery orderByEacEstado($order = Criteria::ASC) Order by the eac_estado column
 * @method     ChildEActividadQuery orderByEacDescripcion($order = Criteria::ASC) Order by the eac_descripcion column
 * @method     ChildEActividadQuery orderByEacRFechaCreacion($order = Criteria::ASC) Order by the eac_r_fecha_creacion column
 * @method     ChildEActividadQuery orderByEacRFechaModificacion($order = Criteria::ASC) Order by the eac_r_fecha_modificacion column
 * @method     ChildEActividadQuery orderByEacRUsuario($order = Criteria::ASC) Order by the eac_r_usuario column
 *
 * @method     ChildEActividadQuery groupByEacEstado() Group by the eac_estado column
 * @method     ChildEActividadQuery groupByEacDescripcion() Group by the eac_descripcion column
 * @method     ChildEActividadQuery groupByEacRFechaCreacion() Group by the eac_r_fecha_creacion column
 * @method     ChildEActividadQuery groupByEacRFechaModificacion() Group by the eac_r_fecha_modificacion column
 * @method     ChildEActividadQuery groupByEacRUsuario() Group by the eac_r_usuario column
 *
 * @method     ChildEActividadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEActividadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEActividadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEActividadQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEActividadQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEActividadQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEActividadQuery leftJoinActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actividad relation
 * @method     ChildEActividadQuery rightJoinActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actividad relation
 * @method     ChildEActividadQuery innerJoinActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the Actividad relation
 *
 * @method     ChildEActividadQuery joinWithActividad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Actividad relation
 *
 * @method     ChildEActividadQuery leftJoinWithActividad() Adds a LEFT JOIN clause and with to the query using the Actividad relation
 * @method     ChildEActividadQuery rightJoinWithActividad() Adds a RIGHT JOIN clause and with to the query using the Actividad relation
 * @method     ChildEActividadQuery innerJoinWithActividad() Adds a INNER JOIN clause and with to the query using the Actividad relation
 *
 * @method     \ActividadQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEActividad findOne(ConnectionInterface $con = null) Return the first ChildEActividad matching the query
 * @method     ChildEActividad findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEActividad matching the query, or a new ChildEActividad object populated from the query conditions when no match is found
 *
 * @method     ChildEActividad findOneByEacEstado(int $eac_estado) Return the first ChildEActividad filtered by the eac_estado column
 * @method     ChildEActividad findOneByEacDescripcion(string $eac_descripcion) Return the first ChildEActividad filtered by the eac_descripcion column
 * @method     ChildEActividad findOneByEacRFechaCreacion(string $eac_r_fecha_creacion) Return the first ChildEActividad filtered by the eac_r_fecha_creacion column
 * @method     ChildEActividad findOneByEacRFechaModificacion(string $eac_r_fecha_modificacion) Return the first ChildEActividad filtered by the eac_r_fecha_modificacion column
 * @method     ChildEActividad findOneByEacRUsuario(int $eac_r_usuario) Return the first ChildEActividad filtered by the eac_r_usuario column *

 * @method     ChildEActividad requirePk($key, ConnectionInterface $con = null) Return the ChildEActividad by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEActividad requireOne(ConnectionInterface $con = null) Return the first ChildEActividad matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEActividad requireOneByEacEstado(int $eac_estado) Return the first ChildEActividad filtered by the eac_estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEActividad requireOneByEacDescripcion(string $eac_descripcion) Return the first ChildEActividad filtered by the eac_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEActividad requireOneByEacRFechaCreacion(string $eac_r_fecha_creacion) Return the first ChildEActividad filtered by the eac_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEActividad requireOneByEacRFechaModificacion(string $eac_r_fecha_modificacion) Return the first ChildEActividad filtered by the eac_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEActividad requireOneByEacRUsuario(int $eac_r_usuario) Return the first ChildEActividad filtered by the eac_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEActividad[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEActividad objects based on current ModelCriteria
 * @method     ChildEActividad[]|ObjectCollection findByEacEstado(int $eac_estado) Return ChildEActividad objects filtered by the eac_estado column
 * @method     ChildEActividad[]|ObjectCollection findByEacDescripcion(string $eac_descripcion) Return ChildEActividad objects filtered by the eac_descripcion column
 * @method     ChildEActividad[]|ObjectCollection findByEacRFechaCreacion(string $eac_r_fecha_creacion) Return ChildEActividad objects filtered by the eac_r_fecha_creacion column
 * @method     ChildEActividad[]|ObjectCollection findByEacRFechaModificacion(string $eac_r_fecha_modificacion) Return ChildEActividad objects filtered by the eac_r_fecha_modificacion column
 * @method     ChildEActividad[]|ObjectCollection findByEacRUsuario(int $eac_r_usuario) Return ChildEActividad objects filtered by the eac_r_usuario column
 * @method     ChildEActividad[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EActividadQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EActividadQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\EActividad', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEActividadQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEActividadQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEActividadQuery) {
            return $criteria;
        }
        $query = new ChildEActividadQuery();
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
     * @return ChildEActividad|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EActividadTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EActividadTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEActividad A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT eac_estado, eac_descripcion, eac_r_fecha_creacion, eac_r_fecha_modificacion, eac_r_usuario FROM e_actividad WHERE eac_estado = :p0';
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
            /** @var ChildEActividad $obj */
            $obj = new ChildEActividad();
            $obj->hydrate($row);
            EActividadTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEActividad|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEActividadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EActividadTableMap::COL_EAC_ESTADO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEActividadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EActividadTableMap::COL_EAC_ESTADO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the eac_estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEacEstado(1234); // WHERE eac_estado = 1234
     * $query->filterByEacEstado(array(12, 34)); // WHERE eac_estado IN (12, 34)
     * $query->filterByEacEstado(array('min' => 12)); // WHERE eac_estado > 12
     * </code>
     *
     * @param     mixed $eacEstado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEActividadQuery The current query, for fluid interface
     */
    public function filterByEacEstado($eacEstado = null, $comparison = null)
    {
        if (is_array($eacEstado)) {
            $useMinMax = false;
            if (isset($eacEstado['min'])) {
                $this->addUsingAlias(EActividadTableMap::COL_EAC_ESTADO, $eacEstado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eacEstado['max'])) {
                $this->addUsingAlias(EActividadTableMap::COL_EAC_ESTADO, $eacEstado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EActividadTableMap::COL_EAC_ESTADO, $eacEstado, $comparison);
    }

    /**
     * Filter the query on the eac_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEacDescripcion('fooValue');   // WHERE eac_descripcion = 'fooValue'
     * $query->filterByEacDescripcion('%fooValue%', Criteria::LIKE); // WHERE eac_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eacDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEActividadQuery The current query, for fluid interface
     */
    public function filterByEacDescripcion($eacDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eacDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EActividadTableMap::COL_EAC_DESCRIPCION, $eacDescripcion, $comparison);
    }

    /**
     * Filter the query on the eac_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEacRFechaCreacion('2011-03-14'); // WHERE eac_r_fecha_creacion = '2011-03-14'
     * $query->filterByEacRFechaCreacion('now'); // WHERE eac_r_fecha_creacion = '2011-03-14'
     * $query->filterByEacRFechaCreacion(array('max' => 'yesterday')); // WHERE eac_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $eacRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEActividadQuery The current query, for fluid interface
     */
    public function filterByEacRFechaCreacion($eacRFechaCreacion = null, $comparison = null)
    {
        if (is_array($eacRFechaCreacion)) {
            $useMinMax = false;
            if (isset($eacRFechaCreacion['min'])) {
                $this->addUsingAlias(EActividadTableMap::COL_EAC_R_FECHA_CREACION, $eacRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eacRFechaCreacion['max'])) {
                $this->addUsingAlias(EActividadTableMap::COL_EAC_R_FECHA_CREACION, $eacRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EActividadTableMap::COL_EAC_R_FECHA_CREACION, $eacRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the eac_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEacRFechaModificacion('2011-03-14'); // WHERE eac_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEacRFechaModificacion('now'); // WHERE eac_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEacRFechaModificacion(array('max' => 'yesterday')); // WHERE eac_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $eacRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEActividadQuery The current query, for fluid interface
     */
    public function filterByEacRFechaModificacion($eacRFechaModificacion = null, $comparison = null)
    {
        if (is_array($eacRFechaModificacion)) {
            $useMinMax = false;
            if (isset($eacRFechaModificacion['min'])) {
                $this->addUsingAlias(EActividadTableMap::COL_EAC_R_FECHA_MODIFICACION, $eacRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eacRFechaModificacion['max'])) {
                $this->addUsingAlias(EActividadTableMap::COL_EAC_R_FECHA_MODIFICACION, $eacRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EActividadTableMap::COL_EAC_R_FECHA_MODIFICACION, $eacRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the eac_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEacRUsuario(1234); // WHERE eac_r_usuario = 1234
     * $query->filterByEacRUsuario(array(12, 34)); // WHERE eac_r_usuario IN (12, 34)
     * $query->filterByEacRUsuario(array('min' => 12)); // WHERE eac_r_usuario > 12
     * </code>
     *
     * @param     mixed $eacRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEActividadQuery The current query, for fluid interface
     */
    public function filterByEacRUsuario($eacRUsuario = null, $comparison = null)
    {
        if (is_array($eacRUsuario)) {
            $useMinMax = false;
            if (isset($eacRUsuario['min'])) {
                $this->addUsingAlias(EActividadTableMap::COL_EAC_R_USUARIO, $eacRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eacRUsuario['max'])) {
                $this->addUsingAlias(EActividadTableMap::COL_EAC_R_USUARIO, $eacRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EActividadTableMap::COL_EAC_R_USUARIO, $eacRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Actividad object
     *
     * @param \Actividad|ObjectCollection $actividad the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEActividadQuery The current query, for fluid interface
     */
    public function filterByActividad($actividad, $comparison = null)
    {
        if ($actividad instanceof \Actividad) {
            return $this
                ->addUsingAlias(EActividadTableMap::COL_EAC_ESTADO, $actividad->getActiEActividad(), $comparison);
        } elseif ($actividad instanceof ObjectCollection) {
            return $this
                ->useActividadQuery()
                ->filterByPrimaryKeys($actividad->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActividad() only accepts arguments of type \Actividad or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Actividad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEActividadQuery The current query, for fluid interface
     */
    public function joinActividad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Actividad');

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
            $this->addJoinObject($join, 'Actividad');
        }

        return $this;
    }

    /**
     * Use the Actividad relation Actividad object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ActividadQuery A secondary query class using the current class as primary query
     */
    public function useActividadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinActividad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Actividad', '\ActividadQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEActividad $eActividad Object to remove from the list of results
     *
     * @return $this|ChildEActividadQuery The current query, for fluid interface
     */
    public function prune($eActividad = null)
    {
        if ($eActividad) {
            $this->addUsingAlias(EActividadTableMap::COL_EAC_ESTADO, $eActividad->getEacEstado(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the e_actividad table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EActividadTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EActividadTableMap::clearInstancePool();
            EActividadTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EActividadTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EActividadTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EActividadTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EActividadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EActividadQuery
