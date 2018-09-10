<?php

namespace Base;

use \THora as ChildTHora;
use \THoraQuery as ChildTHoraQuery;
use \Exception;
use \PDO;
use Map\THoraTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_hora' table.
 *
 *
 *
 * @method     ChildTHoraQuery orderByThoTipo($order = Criteria::ASC) Order by the tho_tipo column
 * @method     ChildTHoraQuery orderByThoDescripcion($order = Criteria::ASC) Order by the tho_descripcion column
 * @method     ChildTHoraQuery orderByThoRFechaCreacion($order = Criteria::ASC) Order by the tho_r_fecha_creacion column
 * @method     ChildTHoraQuery orderByThoRFechaModificacion($order = Criteria::ASC) Order by the tho_r_fecha_modificacion column
 * @method     ChildTHoraQuery orderByThoRUsuario($order = Criteria::ASC) Order by the tho_r_usuario column
 *
 * @method     ChildTHoraQuery groupByThoTipo() Group by the tho_tipo column
 * @method     ChildTHoraQuery groupByThoDescripcion() Group by the tho_descripcion column
 * @method     ChildTHoraQuery groupByThoRFechaCreacion() Group by the tho_r_fecha_creacion column
 * @method     ChildTHoraQuery groupByThoRFechaModificacion() Group by the tho_r_fecha_modificacion column
 * @method     ChildTHoraQuery groupByThoRUsuario() Group by the tho_r_usuario column
 *
 * @method     ChildTHoraQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTHoraQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTHoraQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTHoraQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTHoraQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTHoraQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTHoraQuery leftJoinActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actividad relation
 * @method     ChildTHoraQuery rightJoinActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actividad relation
 * @method     ChildTHoraQuery innerJoinActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the Actividad relation
 *
 * @method     ChildTHoraQuery joinWithActividad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Actividad relation
 *
 * @method     ChildTHoraQuery leftJoinWithActividad() Adds a LEFT JOIN clause and with to the query using the Actividad relation
 * @method     ChildTHoraQuery rightJoinWithActividad() Adds a RIGHT JOIN clause and with to the query using the Actividad relation
 * @method     ChildTHoraQuery innerJoinWithActividad() Adds a INNER JOIN clause and with to the query using the Actividad relation
 *
 * @method     \ActividadQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTHora findOne(ConnectionInterface $con = null) Return the first ChildTHora matching the query
 * @method     ChildTHora findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTHora matching the query, or a new ChildTHora object populated from the query conditions when no match is found
 *
 * @method     ChildTHora findOneByThoTipo(int $tho_tipo) Return the first ChildTHora filtered by the tho_tipo column
 * @method     ChildTHora findOneByThoDescripcion(string $tho_descripcion) Return the first ChildTHora filtered by the tho_descripcion column
 * @method     ChildTHora findOneByThoRFechaCreacion(string $tho_r_fecha_creacion) Return the first ChildTHora filtered by the tho_r_fecha_creacion column
 * @method     ChildTHora findOneByThoRFechaModificacion(string $tho_r_fecha_modificacion) Return the first ChildTHora filtered by the tho_r_fecha_modificacion column
 * @method     ChildTHora findOneByThoRUsuario(int $tho_r_usuario) Return the first ChildTHora filtered by the tho_r_usuario column *

 * @method     ChildTHora requirePk($key, ConnectionInterface $con = null) Return the ChildTHora by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTHora requireOne(ConnectionInterface $con = null) Return the first ChildTHora matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTHora requireOneByThoTipo(int $tho_tipo) Return the first ChildTHora filtered by the tho_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTHora requireOneByThoDescripcion(string $tho_descripcion) Return the first ChildTHora filtered by the tho_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTHora requireOneByThoRFechaCreacion(string $tho_r_fecha_creacion) Return the first ChildTHora filtered by the tho_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTHora requireOneByThoRFechaModificacion(string $tho_r_fecha_modificacion) Return the first ChildTHora filtered by the tho_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTHora requireOneByThoRUsuario(int $tho_r_usuario) Return the first ChildTHora filtered by the tho_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTHora[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTHora objects based on current ModelCriteria
 * @method     ChildTHora[]|ObjectCollection findByThoTipo(int $tho_tipo) Return ChildTHora objects filtered by the tho_tipo column
 * @method     ChildTHora[]|ObjectCollection findByThoDescripcion(string $tho_descripcion) Return ChildTHora objects filtered by the tho_descripcion column
 * @method     ChildTHora[]|ObjectCollection findByThoRFechaCreacion(string $tho_r_fecha_creacion) Return ChildTHora objects filtered by the tho_r_fecha_creacion column
 * @method     ChildTHora[]|ObjectCollection findByThoRFechaModificacion(string $tho_r_fecha_modificacion) Return ChildTHora objects filtered by the tho_r_fecha_modificacion column
 * @method     ChildTHora[]|ObjectCollection findByThoRUsuario(int $tho_r_usuario) Return ChildTHora objects filtered by the tho_r_usuario column
 * @method     ChildTHora[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class THoraQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\THoraQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\THora', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTHoraQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTHoraQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTHoraQuery) {
            return $criteria;
        }
        $query = new ChildTHoraQuery();
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
     * @return ChildTHora|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(THoraTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = THoraTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTHora A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tho_tipo, tho_descripcion, tho_r_fecha_creacion, tho_r_fecha_modificacion, tho_r_usuario FROM t_hora WHERE tho_tipo = :p0';
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
            /** @var ChildTHora $obj */
            $obj = new ChildTHora();
            $obj->hydrate($row);
            THoraTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTHora|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTHoraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(THoraTableMap::COL_THO_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTHoraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(THoraTableMap::COL_THO_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tho_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByThoTipo(1234); // WHERE tho_tipo = 1234
     * $query->filterByThoTipo(array(12, 34)); // WHERE tho_tipo IN (12, 34)
     * $query->filterByThoTipo(array('min' => 12)); // WHERE tho_tipo > 12
     * </code>
     *
     * @param     mixed $thoTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTHoraQuery The current query, for fluid interface
     */
    public function filterByThoTipo($thoTipo = null, $comparison = null)
    {
        if (is_array($thoTipo)) {
            $useMinMax = false;
            if (isset($thoTipo['min'])) {
                $this->addUsingAlias(THoraTableMap::COL_THO_TIPO, $thoTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thoTipo['max'])) {
                $this->addUsingAlias(THoraTableMap::COL_THO_TIPO, $thoTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(THoraTableMap::COL_THO_TIPO, $thoTipo, $comparison);
    }

    /**
     * Filter the query on the tho_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByThoDescripcion('fooValue');   // WHERE tho_descripcion = 'fooValue'
     * $query->filterByThoDescripcion('%fooValue%', Criteria::LIKE); // WHERE tho_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $thoDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTHoraQuery The current query, for fluid interface
     */
    public function filterByThoDescripcion($thoDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thoDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(THoraTableMap::COL_THO_DESCRIPCION, $thoDescripcion, $comparison);
    }

    /**
     * Filter the query on the tho_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByThoRFechaCreacion('2011-03-14'); // WHERE tho_r_fecha_creacion = '2011-03-14'
     * $query->filterByThoRFechaCreacion('now'); // WHERE tho_r_fecha_creacion = '2011-03-14'
     * $query->filterByThoRFechaCreacion(array('max' => 'yesterday')); // WHERE tho_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $thoRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTHoraQuery The current query, for fluid interface
     */
    public function filterByThoRFechaCreacion($thoRFechaCreacion = null, $comparison = null)
    {
        if (is_array($thoRFechaCreacion)) {
            $useMinMax = false;
            if (isset($thoRFechaCreacion['min'])) {
                $this->addUsingAlias(THoraTableMap::COL_THO_R_FECHA_CREACION, $thoRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thoRFechaCreacion['max'])) {
                $this->addUsingAlias(THoraTableMap::COL_THO_R_FECHA_CREACION, $thoRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(THoraTableMap::COL_THO_R_FECHA_CREACION, $thoRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the tho_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByThoRFechaModificacion('2011-03-14'); // WHERE tho_r_fecha_modificacion = '2011-03-14'
     * $query->filterByThoRFechaModificacion('now'); // WHERE tho_r_fecha_modificacion = '2011-03-14'
     * $query->filterByThoRFechaModificacion(array('max' => 'yesterday')); // WHERE tho_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $thoRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTHoraQuery The current query, for fluid interface
     */
    public function filterByThoRFechaModificacion($thoRFechaModificacion = null, $comparison = null)
    {
        if (is_array($thoRFechaModificacion)) {
            $useMinMax = false;
            if (isset($thoRFechaModificacion['min'])) {
                $this->addUsingAlias(THoraTableMap::COL_THO_R_FECHA_MODIFICACION, $thoRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thoRFechaModificacion['max'])) {
                $this->addUsingAlias(THoraTableMap::COL_THO_R_FECHA_MODIFICACION, $thoRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(THoraTableMap::COL_THO_R_FECHA_MODIFICACION, $thoRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the tho_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByThoRUsuario(1234); // WHERE tho_r_usuario = 1234
     * $query->filterByThoRUsuario(array(12, 34)); // WHERE tho_r_usuario IN (12, 34)
     * $query->filterByThoRUsuario(array('min' => 12)); // WHERE tho_r_usuario > 12
     * </code>
     *
     * @param     mixed $thoRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTHoraQuery The current query, for fluid interface
     */
    public function filterByThoRUsuario($thoRUsuario = null, $comparison = null)
    {
        if (is_array($thoRUsuario)) {
            $useMinMax = false;
            if (isset($thoRUsuario['min'])) {
                $this->addUsingAlias(THoraTableMap::COL_THO_R_USUARIO, $thoRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thoRUsuario['max'])) {
                $this->addUsingAlias(THoraTableMap::COL_THO_R_USUARIO, $thoRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(THoraTableMap::COL_THO_R_USUARIO, $thoRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Actividad object
     *
     * @param \Actividad|ObjectCollection $actividad the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTHoraQuery The current query, for fluid interface
     */
    public function filterByActividad($actividad, $comparison = null)
    {
        if ($actividad instanceof \Actividad) {
            return $this
                ->addUsingAlias(THoraTableMap::COL_THO_TIPO, $actividad->getActiTHora(), $comparison);
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
     * @return $this|ChildTHoraQuery The current query, for fluid interface
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
     * @param   ChildTHora $tHora Object to remove from the list of results
     *
     * @return $this|ChildTHoraQuery The current query, for fluid interface
     */
    public function prune($tHora = null)
    {
        if ($tHora) {
            $this->addUsingAlias(THoraTableMap::COL_THO_TIPO, $tHora->getThoTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_hora table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(THoraTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            THoraTableMap::clearInstancePool();
            THoraTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(THoraTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(THoraTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            THoraTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            THoraTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // THoraQuery
