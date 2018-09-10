<?php

namespace Base;

use \TModalidad as ChildTModalidad;
use \TModalidadQuery as ChildTModalidadQuery;
use \Exception;
use \PDO;
use Map\TModalidadTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_modalidad' table.
 *
 *
 *
 * @method     ChildTModalidadQuery orderByTmoTipo($order = Criteria::ASC) Order by the tmo_tipo column
 * @method     ChildTModalidadQuery orderByTmoDescripcion($order = Criteria::ASC) Order by the tmo_descripcion column
 * @method     ChildTModalidadQuery orderByTmoRFechaCreacion($order = Criteria::ASC) Order by the tmo_r_fecha_creacion column
 * @method     ChildTModalidadQuery orderByTmoRFechaModificacion($order = Criteria::ASC) Order by the tmo_r_fecha_modificacion column
 * @method     ChildTModalidadQuery orderByTmoRUsuario($order = Criteria::ASC) Order by the tmo_r_usuario column
 *
 * @method     ChildTModalidadQuery groupByTmoTipo() Group by the tmo_tipo column
 * @method     ChildTModalidadQuery groupByTmoDescripcion() Group by the tmo_descripcion column
 * @method     ChildTModalidadQuery groupByTmoRFechaCreacion() Group by the tmo_r_fecha_creacion column
 * @method     ChildTModalidadQuery groupByTmoRFechaModificacion() Group by the tmo_r_fecha_modificacion column
 * @method     ChildTModalidadQuery groupByTmoRUsuario() Group by the tmo_r_usuario column
 *
 * @method     ChildTModalidadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTModalidadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTModalidadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTModalidadQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTModalidadQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTModalidadQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTModalidadQuery leftJoinActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actividad relation
 * @method     ChildTModalidadQuery rightJoinActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actividad relation
 * @method     ChildTModalidadQuery innerJoinActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the Actividad relation
 *
 * @method     ChildTModalidadQuery joinWithActividad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Actividad relation
 *
 * @method     ChildTModalidadQuery leftJoinWithActividad() Adds a LEFT JOIN clause and with to the query using the Actividad relation
 * @method     ChildTModalidadQuery rightJoinWithActividad() Adds a RIGHT JOIN clause and with to the query using the Actividad relation
 * @method     ChildTModalidadQuery innerJoinWithActividad() Adds a INNER JOIN clause and with to the query using the Actividad relation
 *
 * @method     \ActividadQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTModalidad findOne(ConnectionInterface $con = null) Return the first ChildTModalidad matching the query
 * @method     ChildTModalidad findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTModalidad matching the query, or a new ChildTModalidad object populated from the query conditions when no match is found
 *
 * @method     ChildTModalidad findOneByTmoTipo(int $tmo_tipo) Return the first ChildTModalidad filtered by the tmo_tipo column
 * @method     ChildTModalidad findOneByTmoDescripcion(string $tmo_descripcion) Return the first ChildTModalidad filtered by the tmo_descripcion column
 * @method     ChildTModalidad findOneByTmoRFechaCreacion(string $tmo_r_fecha_creacion) Return the first ChildTModalidad filtered by the tmo_r_fecha_creacion column
 * @method     ChildTModalidad findOneByTmoRFechaModificacion(string $tmo_r_fecha_modificacion) Return the first ChildTModalidad filtered by the tmo_r_fecha_modificacion column
 * @method     ChildTModalidad findOneByTmoRUsuario(int $tmo_r_usuario) Return the first ChildTModalidad filtered by the tmo_r_usuario column *

 * @method     ChildTModalidad requirePk($key, ConnectionInterface $con = null) Return the ChildTModalidad by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTModalidad requireOne(ConnectionInterface $con = null) Return the first ChildTModalidad matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTModalidad requireOneByTmoTipo(int $tmo_tipo) Return the first ChildTModalidad filtered by the tmo_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTModalidad requireOneByTmoDescripcion(string $tmo_descripcion) Return the first ChildTModalidad filtered by the tmo_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTModalidad requireOneByTmoRFechaCreacion(string $tmo_r_fecha_creacion) Return the first ChildTModalidad filtered by the tmo_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTModalidad requireOneByTmoRFechaModificacion(string $tmo_r_fecha_modificacion) Return the first ChildTModalidad filtered by the tmo_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTModalidad requireOneByTmoRUsuario(int $tmo_r_usuario) Return the first ChildTModalidad filtered by the tmo_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTModalidad[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTModalidad objects based on current ModelCriteria
 * @method     ChildTModalidad[]|ObjectCollection findByTmoTipo(int $tmo_tipo) Return ChildTModalidad objects filtered by the tmo_tipo column
 * @method     ChildTModalidad[]|ObjectCollection findByTmoDescripcion(string $tmo_descripcion) Return ChildTModalidad objects filtered by the tmo_descripcion column
 * @method     ChildTModalidad[]|ObjectCollection findByTmoRFechaCreacion(string $tmo_r_fecha_creacion) Return ChildTModalidad objects filtered by the tmo_r_fecha_creacion column
 * @method     ChildTModalidad[]|ObjectCollection findByTmoRFechaModificacion(string $tmo_r_fecha_modificacion) Return ChildTModalidad objects filtered by the tmo_r_fecha_modificacion column
 * @method     ChildTModalidad[]|ObjectCollection findByTmoRUsuario(int $tmo_r_usuario) Return ChildTModalidad objects filtered by the tmo_r_usuario column
 * @method     ChildTModalidad[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TModalidadQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TModalidadQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TModalidad', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTModalidadQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTModalidadQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTModalidadQuery) {
            return $criteria;
        }
        $query = new ChildTModalidadQuery();
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
     * @return ChildTModalidad|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TModalidadTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TModalidadTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTModalidad A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tmo_tipo, tmo_descripcion, tmo_r_fecha_creacion, tmo_r_fecha_modificacion, tmo_r_usuario FROM t_modalidad WHERE tmo_tipo = :p0';
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
            /** @var ChildTModalidad $obj */
            $obj = new ChildTModalidad();
            $obj->hydrate($row);
            TModalidadTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTModalidad|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTModalidadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TModalidadTableMap::COL_TMO_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTModalidadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TModalidadTableMap::COL_TMO_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tmo_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTmoTipo(1234); // WHERE tmo_tipo = 1234
     * $query->filterByTmoTipo(array(12, 34)); // WHERE tmo_tipo IN (12, 34)
     * $query->filterByTmoTipo(array('min' => 12)); // WHERE tmo_tipo > 12
     * </code>
     *
     * @param     mixed $tmoTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTModalidadQuery The current query, for fluid interface
     */
    public function filterByTmoTipo($tmoTipo = null, $comparison = null)
    {
        if (is_array($tmoTipo)) {
            $useMinMax = false;
            if (isset($tmoTipo['min'])) {
                $this->addUsingAlias(TModalidadTableMap::COL_TMO_TIPO, $tmoTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmoTipo['max'])) {
                $this->addUsingAlias(TModalidadTableMap::COL_TMO_TIPO, $tmoTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TModalidadTableMap::COL_TMO_TIPO, $tmoTipo, $comparison);
    }

    /**
     * Filter the query on the tmo_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByTmoDescripcion('fooValue');   // WHERE tmo_descripcion = 'fooValue'
     * $query->filterByTmoDescripcion('%fooValue%', Criteria::LIKE); // WHERE tmo_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tmoDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTModalidadQuery The current query, for fluid interface
     */
    public function filterByTmoDescripcion($tmoDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tmoDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TModalidadTableMap::COL_TMO_DESCRIPCION, $tmoDescripcion, $comparison);
    }

    /**
     * Filter the query on the tmo_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTmoRFechaCreacion('2011-03-14'); // WHERE tmo_r_fecha_creacion = '2011-03-14'
     * $query->filterByTmoRFechaCreacion('now'); // WHERE tmo_r_fecha_creacion = '2011-03-14'
     * $query->filterByTmoRFechaCreacion(array('max' => 'yesterday')); // WHERE tmo_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmoRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTModalidadQuery The current query, for fluid interface
     */
    public function filterByTmoRFechaCreacion($tmoRFechaCreacion = null, $comparison = null)
    {
        if (is_array($tmoRFechaCreacion)) {
            $useMinMax = false;
            if (isset($tmoRFechaCreacion['min'])) {
                $this->addUsingAlias(TModalidadTableMap::COL_TMO_R_FECHA_CREACION, $tmoRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmoRFechaCreacion['max'])) {
                $this->addUsingAlias(TModalidadTableMap::COL_TMO_R_FECHA_CREACION, $tmoRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TModalidadTableMap::COL_TMO_R_FECHA_CREACION, $tmoRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the tmo_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTmoRFechaModificacion('2011-03-14'); // WHERE tmo_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTmoRFechaModificacion('now'); // WHERE tmo_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTmoRFechaModificacion(array('max' => 'yesterday')); // WHERE tmo_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmoRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTModalidadQuery The current query, for fluid interface
     */
    public function filterByTmoRFechaModificacion($tmoRFechaModificacion = null, $comparison = null)
    {
        if (is_array($tmoRFechaModificacion)) {
            $useMinMax = false;
            if (isset($tmoRFechaModificacion['min'])) {
                $this->addUsingAlias(TModalidadTableMap::COL_TMO_R_FECHA_MODIFICACION, $tmoRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmoRFechaModificacion['max'])) {
                $this->addUsingAlias(TModalidadTableMap::COL_TMO_R_FECHA_MODIFICACION, $tmoRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TModalidadTableMap::COL_TMO_R_FECHA_MODIFICACION, $tmoRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the tmo_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTmoRUsuario(1234); // WHERE tmo_r_usuario = 1234
     * $query->filterByTmoRUsuario(array(12, 34)); // WHERE tmo_r_usuario IN (12, 34)
     * $query->filterByTmoRUsuario(array('min' => 12)); // WHERE tmo_r_usuario > 12
     * </code>
     *
     * @param     mixed $tmoRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTModalidadQuery The current query, for fluid interface
     */
    public function filterByTmoRUsuario($tmoRUsuario = null, $comparison = null)
    {
        if (is_array($tmoRUsuario)) {
            $useMinMax = false;
            if (isset($tmoRUsuario['min'])) {
                $this->addUsingAlias(TModalidadTableMap::COL_TMO_R_USUARIO, $tmoRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmoRUsuario['max'])) {
                $this->addUsingAlias(TModalidadTableMap::COL_TMO_R_USUARIO, $tmoRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TModalidadTableMap::COL_TMO_R_USUARIO, $tmoRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Actividad object
     *
     * @param \Actividad|ObjectCollection $actividad the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTModalidadQuery The current query, for fluid interface
     */
    public function filterByActividad($actividad, $comparison = null)
    {
        if ($actividad instanceof \Actividad) {
            return $this
                ->addUsingAlias(TModalidadTableMap::COL_TMO_TIPO, $actividad->getActiTModalidad(), $comparison);
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
     * @return $this|ChildTModalidadQuery The current query, for fluid interface
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
     * @param   ChildTModalidad $tModalidad Object to remove from the list of results
     *
     * @return $this|ChildTModalidadQuery The current query, for fluid interface
     */
    public function prune($tModalidad = null)
    {
        if ($tModalidad) {
            $this->addUsingAlias(TModalidadTableMap::COL_TMO_TIPO, $tModalidad->getTmoTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_modalidad table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TModalidadTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TModalidadTableMap::clearInstancePool();
            TModalidadTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TModalidadTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TModalidadTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TModalidadTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TModalidadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TModalidadQuery
