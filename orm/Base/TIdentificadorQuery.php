<?php

namespace Base;

use \TIdentificador as ChildTIdentificador;
use \TIdentificadorQuery as ChildTIdentificadorQuery;
use \Exception;
use \PDO;
use Map\TIdentificadorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_identificador' table.
 *
 *
 *
 * @method     ChildTIdentificadorQuery orderByTideTipo($order = Criteria::ASC) Order by the tide_tipo column
 * @method     ChildTIdentificadorQuery orderByTideDescripcion($order = Criteria::ASC) Order by the tide_descripcion column
 * @method     ChildTIdentificadorQuery orderByTideRFechaCreacion($order = Criteria::ASC) Order by the tide_r_fecha_creacion column
 * @method     ChildTIdentificadorQuery orderByTideRFechaModificacion($order = Criteria::ASC) Order by the tide_r_fecha_modificacion column
 * @method     ChildTIdentificadorQuery orderByTideRUsuario($order = Criteria::ASC) Order by the tide_r_usuario column
 *
 * @method     ChildTIdentificadorQuery groupByTideTipo() Group by the tide_tipo column
 * @method     ChildTIdentificadorQuery groupByTideDescripcion() Group by the tide_descripcion column
 * @method     ChildTIdentificadorQuery groupByTideRFechaCreacion() Group by the tide_r_fecha_creacion column
 * @method     ChildTIdentificadorQuery groupByTideRFechaModificacion() Group by the tide_r_fecha_modificacion column
 * @method     ChildTIdentificadorQuery groupByTideRUsuario() Group by the tide_r_usuario column
 *
 * @method     ChildTIdentificadorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTIdentificadorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTIdentificadorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTIdentificadorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTIdentificadorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTIdentificadorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTIdentificadorQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     ChildTIdentificadorQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     ChildTIdentificadorQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     ChildTIdentificadorQuery joinWithPersona($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Persona relation
 *
 * @method     ChildTIdentificadorQuery leftJoinWithPersona() Adds a LEFT JOIN clause and with to the query using the Persona relation
 * @method     ChildTIdentificadorQuery rightJoinWithPersona() Adds a RIGHT JOIN clause and with to the query using the Persona relation
 * @method     ChildTIdentificadorQuery innerJoinWithPersona() Adds a INNER JOIN clause and with to the query using the Persona relation
 *
 * @method     \PersonaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTIdentificador findOne(ConnectionInterface $con = null) Return the first ChildTIdentificador matching the query
 * @method     ChildTIdentificador findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTIdentificador matching the query, or a new ChildTIdentificador object populated from the query conditions when no match is found
 *
 * @method     ChildTIdentificador findOneByTideTipo(int $tide_tipo) Return the first ChildTIdentificador filtered by the tide_tipo column
 * @method     ChildTIdentificador findOneByTideDescripcion(string $tide_descripcion) Return the first ChildTIdentificador filtered by the tide_descripcion column
 * @method     ChildTIdentificador findOneByTideRFechaCreacion(string $tide_r_fecha_creacion) Return the first ChildTIdentificador filtered by the tide_r_fecha_creacion column
 * @method     ChildTIdentificador findOneByTideRFechaModificacion(string $tide_r_fecha_modificacion) Return the first ChildTIdentificador filtered by the tide_r_fecha_modificacion column
 * @method     ChildTIdentificador findOneByTideRUsuario(int $tide_r_usuario) Return the first ChildTIdentificador filtered by the tide_r_usuario column *

 * @method     ChildTIdentificador requirePk($key, ConnectionInterface $con = null) Return the ChildTIdentificador by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTIdentificador requireOne(ConnectionInterface $con = null) Return the first ChildTIdentificador matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTIdentificador requireOneByTideTipo(int $tide_tipo) Return the first ChildTIdentificador filtered by the tide_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTIdentificador requireOneByTideDescripcion(string $tide_descripcion) Return the first ChildTIdentificador filtered by the tide_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTIdentificador requireOneByTideRFechaCreacion(string $tide_r_fecha_creacion) Return the first ChildTIdentificador filtered by the tide_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTIdentificador requireOneByTideRFechaModificacion(string $tide_r_fecha_modificacion) Return the first ChildTIdentificador filtered by the tide_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTIdentificador requireOneByTideRUsuario(int $tide_r_usuario) Return the first ChildTIdentificador filtered by the tide_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTIdentificador[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTIdentificador objects based on current ModelCriteria
 * @method     ChildTIdentificador[]|ObjectCollection findByTideTipo(int $tide_tipo) Return ChildTIdentificador objects filtered by the tide_tipo column
 * @method     ChildTIdentificador[]|ObjectCollection findByTideDescripcion(string $tide_descripcion) Return ChildTIdentificador objects filtered by the tide_descripcion column
 * @method     ChildTIdentificador[]|ObjectCollection findByTideRFechaCreacion(string $tide_r_fecha_creacion) Return ChildTIdentificador objects filtered by the tide_r_fecha_creacion column
 * @method     ChildTIdentificador[]|ObjectCollection findByTideRFechaModificacion(string $tide_r_fecha_modificacion) Return ChildTIdentificador objects filtered by the tide_r_fecha_modificacion column
 * @method     ChildTIdentificador[]|ObjectCollection findByTideRUsuario(int $tide_r_usuario) Return ChildTIdentificador objects filtered by the tide_r_usuario column
 * @method     ChildTIdentificador[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TIdentificadorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TIdentificadorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TIdentificador', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTIdentificadorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTIdentificadorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTIdentificadorQuery) {
            return $criteria;
        }
        $query = new ChildTIdentificadorQuery();
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
     * @return ChildTIdentificador|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TIdentificadorTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TIdentificadorTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTIdentificador A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tide_tipo, tide_descripcion, tide_r_fecha_creacion, tide_r_fecha_modificacion, tide_r_usuario FROM t_identificador WHERE tide_tipo = :p0';
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
            /** @var ChildTIdentificador $obj */
            $obj = new ChildTIdentificador();
            $obj->hydrate($row);
            TIdentificadorTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTIdentificador|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTIdentificadorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTIdentificadorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tide_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTideTipo(1234); // WHERE tide_tipo = 1234
     * $query->filterByTideTipo(array(12, 34)); // WHERE tide_tipo IN (12, 34)
     * $query->filterByTideTipo(array('min' => 12)); // WHERE tide_tipo > 12
     * </code>
     *
     * @param     mixed $tideTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTIdentificadorQuery The current query, for fluid interface
     */
    public function filterByTideTipo($tideTipo = null, $comparison = null)
    {
        if (is_array($tideTipo)) {
            $useMinMax = false;
            if (isset($tideTipo['min'])) {
                $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_TIPO, $tideTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tideTipo['max'])) {
                $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_TIPO, $tideTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_TIPO, $tideTipo, $comparison);
    }

    /**
     * Filter the query on the tide_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByTideDescripcion('fooValue');   // WHERE tide_descripcion = 'fooValue'
     * $query->filterByTideDescripcion('%fooValue%', Criteria::LIKE); // WHERE tide_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tideDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTIdentificadorQuery The current query, for fluid interface
     */
    public function filterByTideDescripcion($tideDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tideDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_DESCRIPCION, $tideDescripcion, $comparison);
    }

    /**
     * Filter the query on the tide_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTideRFechaCreacion('2011-03-14'); // WHERE tide_r_fecha_creacion = '2011-03-14'
     * $query->filterByTideRFechaCreacion('now'); // WHERE tide_r_fecha_creacion = '2011-03-14'
     * $query->filterByTideRFechaCreacion(array('max' => 'yesterday')); // WHERE tide_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tideRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTIdentificadorQuery The current query, for fluid interface
     */
    public function filterByTideRFechaCreacion($tideRFechaCreacion = null, $comparison = null)
    {
        if (is_array($tideRFechaCreacion)) {
            $useMinMax = false;
            if (isset($tideRFechaCreacion['min'])) {
                $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_R_FECHA_CREACION, $tideRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tideRFechaCreacion['max'])) {
                $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_R_FECHA_CREACION, $tideRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_R_FECHA_CREACION, $tideRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the tide_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTideRFechaModificacion('2011-03-14'); // WHERE tide_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTideRFechaModificacion('now'); // WHERE tide_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTideRFechaModificacion(array('max' => 'yesterday')); // WHERE tide_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tideRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTIdentificadorQuery The current query, for fluid interface
     */
    public function filterByTideRFechaModificacion($tideRFechaModificacion = null, $comparison = null)
    {
        if (is_array($tideRFechaModificacion)) {
            $useMinMax = false;
            if (isset($tideRFechaModificacion['min'])) {
                $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_R_FECHA_MODIFICACION, $tideRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tideRFechaModificacion['max'])) {
                $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_R_FECHA_MODIFICACION, $tideRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_R_FECHA_MODIFICACION, $tideRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the tide_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTideRUsuario(1234); // WHERE tide_r_usuario = 1234
     * $query->filterByTideRUsuario(array(12, 34)); // WHERE tide_r_usuario IN (12, 34)
     * $query->filterByTideRUsuario(array('min' => 12)); // WHERE tide_r_usuario > 12
     * </code>
     *
     * @param     mixed $tideRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTIdentificadorQuery The current query, for fluid interface
     */
    public function filterByTideRUsuario($tideRUsuario = null, $comparison = null)
    {
        if (is_array($tideRUsuario)) {
            $useMinMax = false;
            if (isset($tideRUsuario['min'])) {
                $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_R_USUARIO, $tideRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tideRUsuario['max'])) {
                $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_R_USUARIO, $tideRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_R_USUARIO, $tideRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Persona object
     *
     * @param \Persona|ObjectCollection $persona the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTIdentificadorQuery The current query, for fluid interface
     */
    public function filterByPersona($persona, $comparison = null)
    {
        if ($persona instanceof \Persona) {
            return $this
                ->addUsingAlias(TIdentificadorTableMap::COL_TIDE_TIPO, $persona->getPersTIdentificador(), $comparison);
        } elseif ($persona instanceof ObjectCollection) {
            return $this
                ->usePersonaQuery()
                ->filterByPrimaryKeys($persona->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPersona() only accepts arguments of type \Persona or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Persona relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTIdentificadorQuery The current query, for fluid interface
     */
    public function joinPersona($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Persona');

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
            $this->addJoinObject($join, 'Persona');
        }

        return $this;
    }

    /**
     * Use the Persona relation Persona object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PersonaQuery A secondary query class using the current class as primary query
     */
    public function usePersonaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersona($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Persona', '\PersonaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTIdentificador $tIdentificador Object to remove from the list of results
     *
     * @return $this|ChildTIdentificadorQuery The current query, for fluid interface
     */
    public function prune($tIdentificador = null)
    {
        if ($tIdentificador) {
            $this->addUsingAlias(TIdentificadorTableMap::COL_TIDE_TIPO, $tIdentificador->getTideTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_identificador table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TIdentificadorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TIdentificadorTableMap::clearInstancePool();
            TIdentificadorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TIdentificadorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TIdentificadorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TIdentificadorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TIdentificadorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TIdentificadorQuery
