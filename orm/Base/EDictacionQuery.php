<?php

namespace Base;

use \EDictacion as ChildEDictacion;
use \EDictacionQuery as ChildEDictacionQuery;
use \Exception;
use \PDO;
use Map\EDictacionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'e_dictacion' table.
 *
 *
 *
 * @method     ChildEDictacionQuery orderByEdiEstado($order = Criteria::ASC) Order by the edi_estado column
 * @method     ChildEDictacionQuery orderByEdiDescripcion($order = Criteria::ASC) Order by the edi_descripcion column
 * @method     ChildEDictacionQuery orderByEdiRFechaCreacion($order = Criteria::ASC) Order by the edi_r_fecha_creacion column
 * @method     ChildEDictacionQuery orderByEdiRFechaModificacion($order = Criteria::ASC) Order by the edi_r_fecha_modificacion column
 * @method     ChildEDictacionQuery orderByEdiRUsuario($order = Criteria::ASC) Order by the edi_r_usuario column
 *
 * @method     ChildEDictacionQuery groupByEdiEstado() Group by the edi_estado column
 * @method     ChildEDictacionQuery groupByEdiDescripcion() Group by the edi_descripcion column
 * @method     ChildEDictacionQuery groupByEdiRFechaCreacion() Group by the edi_r_fecha_creacion column
 * @method     ChildEDictacionQuery groupByEdiRFechaModificacion() Group by the edi_r_fecha_modificacion column
 * @method     ChildEDictacionQuery groupByEdiRUsuario() Group by the edi_r_usuario column
 *
 * @method     ChildEDictacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEDictacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEDictacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEDictacionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEDictacionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEDictacionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEDictacionQuery leftJoinDictacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dictacion relation
 * @method     ChildEDictacionQuery rightJoinDictacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dictacion relation
 * @method     ChildEDictacionQuery innerJoinDictacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Dictacion relation
 *
 * @method     ChildEDictacionQuery joinWithDictacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dictacion relation
 *
 * @method     ChildEDictacionQuery leftJoinWithDictacion() Adds a LEFT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildEDictacionQuery rightJoinWithDictacion() Adds a RIGHT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildEDictacionQuery innerJoinWithDictacion() Adds a INNER JOIN clause and with to the query using the Dictacion relation
 *
 * @method     \DictacionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEDictacion findOne(ConnectionInterface $con = null) Return the first ChildEDictacion matching the query
 * @method     ChildEDictacion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEDictacion matching the query, or a new ChildEDictacion object populated from the query conditions when no match is found
 *
 * @method     ChildEDictacion findOneByEdiEstado(int $edi_estado) Return the first ChildEDictacion filtered by the edi_estado column
 * @method     ChildEDictacion findOneByEdiDescripcion(string $edi_descripcion) Return the first ChildEDictacion filtered by the edi_descripcion column
 * @method     ChildEDictacion findOneByEdiRFechaCreacion(string $edi_r_fecha_creacion) Return the first ChildEDictacion filtered by the edi_r_fecha_creacion column
 * @method     ChildEDictacion findOneByEdiRFechaModificacion(string $edi_r_fecha_modificacion) Return the first ChildEDictacion filtered by the edi_r_fecha_modificacion column
 * @method     ChildEDictacion findOneByEdiRUsuario(int $edi_r_usuario) Return the first ChildEDictacion filtered by the edi_r_usuario column *

 * @method     ChildEDictacion requirePk($key, ConnectionInterface $con = null) Return the ChildEDictacion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEDictacion requireOne(ConnectionInterface $con = null) Return the first ChildEDictacion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEDictacion requireOneByEdiEstado(int $edi_estado) Return the first ChildEDictacion filtered by the edi_estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEDictacion requireOneByEdiDescripcion(string $edi_descripcion) Return the first ChildEDictacion filtered by the edi_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEDictacion requireOneByEdiRFechaCreacion(string $edi_r_fecha_creacion) Return the first ChildEDictacion filtered by the edi_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEDictacion requireOneByEdiRFechaModificacion(string $edi_r_fecha_modificacion) Return the first ChildEDictacion filtered by the edi_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEDictacion requireOneByEdiRUsuario(int $edi_r_usuario) Return the first ChildEDictacion filtered by the edi_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEDictacion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEDictacion objects based on current ModelCriteria
 * @method     ChildEDictacion[]|ObjectCollection findByEdiEstado(int $edi_estado) Return ChildEDictacion objects filtered by the edi_estado column
 * @method     ChildEDictacion[]|ObjectCollection findByEdiDescripcion(string $edi_descripcion) Return ChildEDictacion objects filtered by the edi_descripcion column
 * @method     ChildEDictacion[]|ObjectCollection findByEdiRFechaCreacion(string $edi_r_fecha_creacion) Return ChildEDictacion objects filtered by the edi_r_fecha_creacion column
 * @method     ChildEDictacion[]|ObjectCollection findByEdiRFechaModificacion(string $edi_r_fecha_modificacion) Return ChildEDictacion objects filtered by the edi_r_fecha_modificacion column
 * @method     ChildEDictacion[]|ObjectCollection findByEdiRUsuario(int $edi_r_usuario) Return ChildEDictacion objects filtered by the edi_r_usuario column
 * @method     ChildEDictacion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EDictacionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EDictacionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\EDictacion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEDictacionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEDictacionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEDictacionQuery) {
            return $criteria;
        }
        $query = new ChildEDictacionQuery();
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
     * @return ChildEDictacion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EDictacionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EDictacionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEDictacion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT edi_estado, edi_descripcion, edi_r_fecha_creacion, edi_r_fecha_modificacion, edi_r_usuario FROM e_dictacion WHERE edi_estado = :p0';
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
            /** @var ChildEDictacion $obj */
            $obj = new ChildEDictacion();
            $obj->hydrate($row);
            EDictacionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEDictacion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEDictacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EDictacionTableMap::COL_EDI_ESTADO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEDictacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EDictacionTableMap::COL_EDI_ESTADO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the edi_estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEdiEstado(1234); // WHERE edi_estado = 1234
     * $query->filterByEdiEstado(array(12, 34)); // WHERE edi_estado IN (12, 34)
     * $query->filterByEdiEstado(array('min' => 12)); // WHERE edi_estado > 12
     * </code>
     *
     * @param     mixed $ediEstado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEDictacionQuery The current query, for fluid interface
     */
    public function filterByEdiEstado($ediEstado = null, $comparison = null)
    {
        if (is_array($ediEstado)) {
            $useMinMax = false;
            if (isset($ediEstado['min'])) {
                $this->addUsingAlias(EDictacionTableMap::COL_EDI_ESTADO, $ediEstado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ediEstado['max'])) {
                $this->addUsingAlias(EDictacionTableMap::COL_EDI_ESTADO, $ediEstado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EDictacionTableMap::COL_EDI_ESTADO, $ediEstado, $comparison);
    }

    /**
     * Filter the query on the edi_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEdiDescripcion('fooValue');   // WHERE edi_descripcion = 'fooValue'
     * $query->filterByEdiDescripcion('%fooValue%', Criteria::LIKE); // WHERE edi_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ediDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEDictacionQuery The current query, for fluid interface
     */
    public function filterByEdiDescripcion($ediDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ediDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EDictacionTableMap::COL_EDI_DESCRIPCION, $ediDescripcion, $comparison);
    }

    /**
     * Filter the query on the edi_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEdiRFechaCreacion('2011-03-14'); // WHERE edi_r_fecha_creacion = '2011-03-14'
     * $query->filterByEdiRFechaCreacion('now'); // WHERE edi_r_fecha_creacion = '2011-03-14'
     * $query->filterByEdiRFechaCreacion(array('max' => 'yesterday')); // WHERE edi_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $ediRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEDictacionQuery The current query, for fluid interface
     */
    public function filterByEdiRFechaCreacion($ediRFechaCreacion = null, $comparison = null)
    {
        if (is_array($ediRFechaCreacion)) {
            $useMinMax = false;
            if (isset($ediRFechaCreacion['min'])) {
                $this->addUsingAlias(EDictacionTableMap::COL_EDI_R_FECHA_CREACION, $ediRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ediRFechaCreacion['max'])) {
                $this->addUsingAlias(EDictacionTableMap::COL_EDI_R_FECHA_CREACION, $ediRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EDictacionTableMap::COL_EDI_R_FECHA_CREACION, $ediRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the edi_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEdiRFechaModificacion('2011-03-14'); // WHERE edi_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEdiRFechaModificacion('now'); // WHERE edi_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEdiRFechaModificacion(array('max' => 'yesterday')); // WHERE edi_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $ediRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEDictacionQuery The current query, for fluid interface
     */
    public function filterByEdiRFechaModificacion($ediRFechaModificacion = null, $comparison = null)
    {
        if (is_array($ediRFechaModificacion)) {
            $useMinMax = false;
            if (isset($ediRFechaModificacion['min'])) {
                $this->addUsingAlias(EDictacionTableMap::COL_EDI_R_FECHA_MODIFICACION, $ediRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ediRFechaModificacion['max'])) {
                $this->addUsingAlias(EDictacionTableMap::COL_EDI_R_FECHA_MODIFICACION, $ediRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EDictacionTableMap::COL_EDI_R_FECHA_MODIFICACION, $ediRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the edi_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEdiRUsuario(1234); // WHERE edi_r_usuario = 1234
     * $query->filterByEdiRUsuario(array(12, 34)); // WHERE edi_r_usuario IN (12, 34)
     * $query->filterByEdiRUsuario(array('min' => 12)); // WHERE edi_r_usuario > 12
     * </code>
     *
     * @param     mixed $ediRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEDictacionQuery The current query, for fluid interface
     */
    public function filterByEdiRUsuario($ediRUsuario = null, $comparison = null)
    {
        if (is_array($ediRUsuario)) {
            $useMinMax = false;
            if (isset($ediRUsuario['min'])) {
                $this->addUsingAlias(EDictacionTableMap::COL_EDI_R_USUARIO, $ediRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ediRUsuario['max'])) {
                $this->addUsingAlias(EDictacionTableMap::COL_EDI_R_USUARIO, $ediRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EDictacionTableMap::COL_EDI_R_USUARIO, $ediRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Dictacion object
     *
     * @param \Dictacion|ObjectCollection $dictacion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEDictacionQuery The current query, for fluid interface
     */
    public function filterByDictacion($dictacion, $comparison = null)
    {
        if ($dictacion instanceof \Dictacion) {
            return $this
                ->addUsingAlias(EDictacionTableMap::COL_EDI_ESTADO, $dictacion->getDictEDictacion(), $comparison);
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
     * @return $this|ChildEDictacionQuery The current query, for fluid interface
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
     * @param   ChildEDictacion $eDictacion Object to remove from the list of results
     *
     * @return $this|ChildEDictacionQuery The current query, for fluid interface
     */
    public function prune($eDictacion = null)
    {
        if ($eDictacion) {
            $this->addUsingAlias(EDictacionTableMap::COL_EDI_ESTADO, $eDictacion->getEdiEstado(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the e_dictacion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EDictacionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EDictacionTableMap::clearInstancePool();
            EDictacionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EDictacionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EDictacionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EDictacionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EDictacionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EDictacionQuery
