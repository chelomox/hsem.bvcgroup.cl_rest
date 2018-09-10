<?php

namespace Base;

use \TInstitucion as ChildTInstitucion;
use \TInstitucionQuery as ChildTInstitucionQuery;
use \Exception;
use \PDO;
use Map\TInstitucionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_institucion' table.
 *
 *
 *
 * @method     ChildTInstitucionQuery orderByTinsTipo($order = Criteria::ASC) Order by the tins_tipo column
 * @method     ChildTInstitucionQuery orderByTinsDescripcion($order = Criteria::ASC) Order by the tins_descripcion column
 * @method     ChildTInstitucionQuery orderByTinsRFechaCreacion($order = Criteria::ASC) Order by the tins_r_fecha_creacion column
 * @method     ChildTInstitucionQuery orderByTinsRFechaModificacion($order = Criteria::ASC) Order by the tins_r_fecha_modificacion column
 * @method     ChildTInstitucionQuery orderByTinsRUsuario($order = Criteria::ASC) Order by the tins_r_usuario column
 *
 * @method     ChildTInstitucionQuery groupByTinsTipo() Group by the tins_tipo column
 * @method     ChildTInstitucionQuery groupByTinsDescripcion() Group by the tins_descripcion column
 * @method     ChildTInstitucionQuery groupByTinsRFechaCreacion() Group by the tins_r_fecha_creacion column
 * @method     ChildTInstitucionQuery groupByTinsRFechaModificacion() Group by the tins_r_fecha_modificacion column
 * @method     ChildTInstitucionQuery groupByTinsRUsuario() Group by the tins_r_usuario column
 *
 * @method     ChildTInstitucionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTInstitucionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTInstitucionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTInstitucionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTInstitucionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTInstitucionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTInstitucionQuery leftJoinInstitucion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Institucion relation
 * @method     ChildTInstitucionQuery rightJoinInstitucion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Institucion relation
 * @method     ChildTInstitucionQuery innerJoinInstitucion($relationAlias = null) Adds a INNER JOIN clause to the query using the Institucion relation
 *
 * @method     ChildTInstitucionQuery joinWithInstitucion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Institucion relation
 *
 * @method     ChildTInstitucionQuery leftJoinWithInstitucion() Adds a LEFT JOIN clause and with to the query using the Institucion relation
 * @method     ChildTInstitucionQuery rightJoinWithInstitucion() Adds a RIGHT JOIN clause and with to the query using the Institucion relation
 * @method     ChildTInstitucionQuery innerJoinWithInstitucion() Adds a INNER JOIN clause and with to the query using the Institucion relation
 *
 * @method     \InstitucionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTInstitucion findOne(ConnectionInterface $con = null) Return the first ChildTInstitucion matching the query
 * @method     ChildTInstitucion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTInstitucion matching the query, or a new ChildTInstitucion object populated from the query conditions when no match is found
 *
 * @method     ChildTInstitucion findOneByTinsTipo(int $tins_tipo) Return the first ChildTInstitucion filtered by the tins_tipo column
 * @method     ChildTInstitucion findOneByTinsDescripcion(string $tins_descripcion) Return the first ChildTInstitucion filtered by the tins_descripcion column
 * @method     ChildTInstitucion findOneByTinsRFechaCreacion(string $tins_r_fecha_creacion) Return the first ChildTInstitucion filtered by the tins_r_fecha_creacion column
 * @method     ChildTInstitucion findOneByTinsRFechaModificacion(string $tins_r_fecha_modificacion) Return the first ChildTInstitucion filtered by the tins_r_fecha_modificacion column
 * @method     ChildTInstitucion findOneByTinsRUsuario(int $tins_r_usuario) Return the first ChildTInstitucion filtered by the tins_r_usuario column *

 * @method     ChildTInstitucion requirePk($key, ConnectionInterface $con = null) Return the ChildTInstitucion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTInstitucion requireOne(ConnectionInterface $con = null) Return the first ChildTInstitucion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTInstitucion requireOneByTinsTipo(int $tins_tipo) Return the first ChildTInstitucion filtered by the tins_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTInstitucion requireOneByTinsDescripcion(string $tins_descripcion) Return the first ChildTInstitucion filtered by the tins_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTInstitucion requireOneByTinsRFechaCreacion(string $tins_r_fecha_creacion) Return the first ChildTInstitucion filtered by the tins_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTInstitucion requireOneByTinsRFechaModificacion(string $tins_r_fecha_modificacion) Return the first ChildTInstitucion filtered by the tins_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTInstitucion requireOneByTinsRUsuario(int $tins_r_usuario) Return the first ChildTInstitucion filtered by the tins_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTInstitucion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTInstitucion objects based on current ModelCriteria
 * @method     ChildTInstitucion[]|ObjectCollection findByTinsTipo(int $tins_tipo) Return ChildTInstitucion objects filtered by the tins_tipo column
 * @method     ChildTInstitucion[]|ObjectCollection findByTinsDescripcion(string $tins_descripcion) Return ChildTInstitucion objects filtered by the tins_descripcion column
 * @method     ChildTInstitucion[]|ObjectCollection findByTinsRFechaCreacion(string $tins_r_fecha_creacion) Return ChildTInstitucion objects filtered by the tins_r_fecha_creacion column
 * @method     ChildTInstitucion[]|ObjectCollection findByTinsRFechaModificacion(string $tins_r_fecha_modificacion) Return ChildTInstitucion objects filtered by the tins_r_fecha_modificacion column
 * @method     ChildTInstitucion[]|ObjectCollection findByTinsRUsuario(int $tins_r_usuario) Return ChildTInstitucion objects filtered by the tins_r_usuario column
 * @method     ChildTInstitucion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TInstitucionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TInstitucionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TInstitucion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTInstitucionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTInstitucionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTInstitucionQuery) {
            return $criteria;
        }
        $query = new ChildTInstitucionQuery();
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
     * @return ChildTInstitucion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TInstitucionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TInstitucionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTInstitucion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tins_tipo, tins_descripcion, tins_r_fecha_creacion, tins_r_fecha_modificacion, tins_r_usuario FROM t_institucion WHERE tins_tipo = :p0';
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
            /** @var ChildTInstitucion $obj */
            $obj = new ChildTInstitucion();
            $obj->hydrate($row);
            TInstitucionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTInstitucion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTInstitucionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TInstitucionTableMap::COL_TINS_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTInstitucionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TInstitucionTableMap::COL_TINS_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tins_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTinsTipo(1234); // WHERE tins_tipo = 1234
     * $query->filterByTinsTipo(array(12, 34)); // WHERE tins_tipo IN (12, 34)
     * $query->filterByTinsTipo(array('min' => 12)); // WHERE tins_tipo > 12
     * </code>
     *
     * @param     mixed $tinsTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTInstitucionQuery The current query, for fluid interface
     */
    public function filterByTinsTipo($tinsTipo = null, $comparison = null)
    {
        if (is_array($tinsTipo)) {
            $useMinMax = false;
            if (isset($tinsTipo['min'])) {
                $this->addUsingAlias(TInstitucionTableMap::COL_TINS_TIPO, $tinsTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tinsTipo['max'])) {
                $this->addUsingAlias(TInstitucionTableMap::COL_TINS_TIPO, $tinsTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TInstitucionTableMap::COL_TINS_TIPO, $tinsTipo, $comparison);
    }

    /**
     * Filter the query on the tins_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByTinsDescripcion('fooValue');   // WHERE tins_descripcion = 'fooValue'
     * $query->filterByTinsDescripcion('%fooValue%', Criteria::LIKE); // WHERE tins_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tinsDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTInstitucionQuery The current query, for fluid interface
     */
    public function filterByTinsDescripcion($tinsDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tinsDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TInstitucionTableMap::COL_TINS_DESCRIPCION, $tinsDescripcion, $comparison);
    }

    /**
     * Filter the query on the tins_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTinsRFechaCreacion('2011-03-14'); // WHERE tins_r_fecha_creacion = '2011-03-14'
     * $query->filterByTinsRFechaCreacion('now'); // WHERE tins_r_fecha_creacion = '2011-03-14'
     * $query->filterByTinsRFechaCreacion(array('max' => 'yesterday')); // WHERE tins_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tinsRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTInstitucionQuery The current query, for fluid interface
     */
    public function filterByTinsRFechaCreacion($tinsRFechaCreacion = null, $comparison = null)
    {
        if (is_array($tinsRFechaCreacion)) {
            $useMinMax = false;
            if (isset($tinsRFechaCreacion['min'])) {
                $this->addUsingAlias(TInstitucionTableMap::COL_TINS_R_FECHA_CREACION, $tinsRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tinsRFechaCreacion['max'])) {
                $this->addUsingAlias(TInstitucionTableMap::COL_TINS_R_FECHA_CREACION, $tinsRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TInstitucionTableMap::COL_TINS_R_FECHA_CREACION, $tinsRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the tins_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTinsRFechaModificacion('2011-03-14'); // WHERE tins_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTinsRFechaModificacion('now'); // WHERE tins_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTinsRFechaModificacion(array('max' => 'yesterday')); // WHERE tins_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tinsRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTInstitucionQuery The current query, for fluid interface
     */
    public function filterByTinsRFechaModificacion($tinsRFechaModificacion = null, $comparison = null)
    {
        if (is_array($tinsRFechaModificacion)) {
            $useMinMax = false;
            if (isset($tinsRFechaModificacion['min'])) {
                $this->addUsingAlias(TInstitucionTableMap::COL_TINS_R_FECHA_MODIFICACION, $tinsRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tinsRFechaModificacion['max'])) {
                $this->addUsingAlias(TInstitucionTableMap::COL_TINS_R_FECHA_MODIFICACION, $tinsRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TInstitucionTableMap::COL_TINS_R_FECHA_MODIFICACION, $tinsRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the tins_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTinsRUsuario(1234); // WHERE tins_r_usuario = 1234
     * $query->filterByTinsRUsuario(array(12, 34)); // WHERE tins_r_usuario IN (12, 34)
     * $query->filterByTinsRUsuario(array('min' => 12)); // WHERE tins_r_usuario > 12
     * </code>
     *
     * @param     mixed $tinsRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTInstitucionQuery The current query, for fluid interface
     */
    public function filterByTinsRUsuario($tinsRUsuario = null, $comparison = null)
    {
        if (is_array($tinsRUsuario)) {
            $useMinMax = false;
            if (isset($tinsRUsuario['min'])) {
                $this->addUsingAlias(TInstitucionTableMap::COL_TINS_R_USUARIO, $tinsRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tinsRUsuario['max'])) {
                $this->addUsingAlias(TInstitucionTableMap::COL_TINS_R_USUARIO, $tinsRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TInstitucionTableMap::COL_TINS_R_USUARIO, $tinsRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Institucion object
     *
     * @param \Institucion|ObjectCollection $institucion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTInstitucionQuery The current query, for fluid interface
     */
    public function filterByInstitucion($institucion, $comparison = null)
    {
        if ($institucion instanceof \Institucion) {
            return $this
                ->addUsingAlias(TInstitucionTableMap::COL_TINS_TIPO, $institucion->getInstTInstitucion(), $comparison);
        } elseif ($institucion instanceof ObjectCollection) {
            return $this
                ->useInstitucionQuery()
                ->filterByPrimaryKeys($institucion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInstitucion() only accepts arguments of type \Institucion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Institucion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTInstitucionQuery The current query, for fluid interface
     */
    public function joinInstitucion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Institucion');

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
            $this->addJoinObject($join, 'Institucion');
        }

        return $this;
    }

    /**
     * Use the Institucion relation Institucion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InstitucionQuery A secondary query class using the current class as primary query
     */
    public function useInstitucionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinInstitucion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Institucion', '\InstitucionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTInstitucion $tInstitucion Object to remove from the list of results
     *
     * @return $this|ChildTInstitucionQuery The current query, for fluid interface
     */
    public function prune($tInstitucion = null)
    {
        if ($tInstitucion) {
            $this->addUsingAlias(TInstitucionTableMap::COL_TINS_TIPO, $tInstitucion->getTinsTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_institucion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TInstitucionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TInstitucionTableMap::clearInstancePool();
            TInstitucionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TInstitucionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TInstitucionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TInstitucionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TInstitucionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TInstitucionQuery
