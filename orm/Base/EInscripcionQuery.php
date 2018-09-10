<?php

namespace Base;

use \EInscripcion as ChildEInscripcion;
use \EInscripcionQuery as ChildEInscripcionQuery;
use \Exception;
use \PDO;
use Map\EInscripcionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'e_inscripcion' table.
 *
 *
 *
 * @method     ChildEInscripcionQuery orderByEinsEstado($order = Criteria::ASC) Order by the eins_estado column
 * @method     ChildEInscripcionQuery orderByEinsDescripcion($order = Criteria::ASC) Order by the eins_descripcion column
 * @method     ChildEInscripcionQuery orderByEinsRFechaCreacion($order = Criteria::ASC) Order by the eins_r_fecha_creacion column
 * @method     ChildEInscripcionQuery orderByEinsRFechaModificacion($order = Criteria::ASC) Order by the eins_r_fecha_modificacion column
 * @method     ChildEInscripcionQuery orderByEinsRUsuario($order = Criteria::ASC) Order by the eins_r_usuario column
 *
 * @method     ChildEInscripcionQuery groupByEinsEstado() Group by the eins_estado column
 * @method     ChildEInscripcionQuery groupByEinsDescripcion() Group by the eins_descripcion column
 * @method     ChildEInscripcionQuery groupByEinsRFechaCreacion() Group by the eins_r_fecha_creacion column
 * @method     ChildEInscripcionQuery groupByEinsRFechaModificacion() Group by the eins_r_fecha_modificacion column
 * @method     ChildEInscripcionQuery groupByEinsRUsuario() Group by the eins_r_usuario column
 *
 * @method     ChildEInscripcionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEInscripcionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEInscripcionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEInscripcionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEInscripcionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEInscripcionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEInscripcionQuery leftJoinInscripcion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inscripcion relation
 * @method     ChildEInscripcionQuery rightJoinInscripcion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inscripcion relation
 * @method     ChildEInscripcionQuery innerJoinInscripcion($relationAlias = null) Adds a INNER JOIN clause to the query using the Inscripcion relation
 *
 * @method     ChildEInscripcionQuery joinWithInscripcion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Inscripcion relation
 *
 * @method     ChildEInscripcionQuery leftJoinWithInscripcion() Adds a LEFT JOIN clause and with to the query using the Inscripcion relation
 * @method     ChildEInscripcionQuery rightJoinWithInscripcion() Adds a RIGHT JOIN clause and with to the query using the Inscripcion relation
 * @method     ChildEInscripcionQuery innerJoinWithInscripcion() Adds a INNER JOIN clause and with to the query using the Inscripcion relation
 *
 * @method     \InscripcionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEInscripcion findOne(ConnectionInterface $con = null) Return the first ChildEInscripcion matching the query
 * @method     ChildEInscripcion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEInscripcion matching the query, or a new ChildEInscripcion object populated from the query conditions when no match is found
 *
 * @method     ChildEInscripcion findOneByEinsEstado(int $eins_estado) Return the first ChildEInscripcion filtered by the eins_estado column
 * @method     ChildEInscripcion findOneByEinsDescripcion(string $eins_descripcion) Return the first ChildEInscripcion filtered by the eins_descripcion column
 * @method     ChildEInscripcion findOneByEinsRFechaCreacion(string $eins_r_fecha_creacion) Return the first ChildEInscripcion filtered by the eins_r_fecha_creacion column
 * @method     ChildEInscripcion findOneByEinsRFechaModificacion(string $eins_r_fecha_modificacion) Return the first ChildEInscripcion filtered by the eins_r_fecha_modificacion column
 * @method     ChildEInscripcion findOneByEinsRUsuario(int $eins_r_usuario) Return the first ChildEInscripcion filtered by the eins_r_usuario column *

 * @method     ChildEInscripcion requirePk($key, ConnectionInterface $con = null) Return the ChildEInscripcion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEInscripcion requireOne(ConnectionInterface $con = null) Return the first ChildEInscripcion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEInscripcion requireOneByEinsEstado(int $eins_estado) Return the first ChildEInscripcion filtered by the eins_estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEInscripcion requireOneByEinsDescripcion(string $eins_descripcion) Return the first ChildEInscripcion filtered by the eins_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEInscripcion requireOneByEinsRFechaCreacion(string $eins_r_fecha_creacion) Return the first ChildEInscripcion filtered by the eins_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEInscripcion requireOneByEinsRFechaModificacion(string $eins_r_fecha_modificacion) Return the first ChildEInscripcion filtered by the eins_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEInscripcion requireOneByEinsRUsuario(int $eins_r_usuario) Return the first ChildEInscripcion filtered by the eins_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEInscripcion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEInscripcion objects based on current ModelCriteria
 * @method     ChildEInscripcion[]|ObjectCollection findByEinsEstado(int $eins_estado) Return ChildEInscripcion objects filtered by the eins_estado column
 * @method     ChildEInscripcion[]|ObjectCollection findByEinsDescripcion(string $eins_descripcion) Return ChildEInscripcion objects filtered by the eins_descripcion column
 * @method     ChildEInscripcion[]|ObjectCollection findByEinsRFechaCreacion(string $eins_r_fecha_creacion) Return ChildEInscripcion objects filtered by the eins_r_fecha_creacion column
 * @method     ChildEInscripcion[]|ObjectCollection findByEinsRFechaModificacion(string $eins_r_fecha_modificacion) Return ChildEInscripcion objects filtered by the eins_r_fecha_modificacion column
 * @method     ChildEInscripcion[]|ObjectCollection findByEinsRUsuario(int $eins_r_usuario) Return ChildEInscripcion objects filtered by the eins_r_usuario column
 * @method     ChildEInscripcion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EInscripcionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EInscripcionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\EInscripcion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEInscripcionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEInscripcionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEInscripcionQuery) {
            return $criteria;
        }
        $query = new ChildEInscripcionQuery();
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
     * @return ChildEInscripcion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EInscripcionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EInscripcionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEInscripcion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT eins_estado, eins_descripcion, eins_r_fecha_creacion, eins_r_fecha_modificacion, eins_r_usuario FROM e_inscripcion WHERE eins_estado = :p0';
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
            /** @var ChildEInscripcion $obj */
            $obj = new ChildEInscripcion();
            $obj->hydrate($row);
            EInscripcionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEInscripcion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEInscripcionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EInscripcionTableMap::COL_EINS_ESTADO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEInscripcionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EInscripcionTableMap::COL_EINS_ESTADO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the eins_estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEinsEstado(1234); // WHERE eins_estado = 1234
     * $query->filterByEinsEstado(array(12, 34)); // WHERE eins_estado IN (12, 34)
     * $query->filterByEinsEstado(array('min' => 12)); // WHERE eins_estado > 12
     * </code>
     *
     * @param     mixed $einsEstado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEInscripcionQuery The current query, for fluid interface
     */
    public function filterByEinsEstado($einsEstado = null, $comparison = null)
    {
        if (is_array($einsEstado)) {
            $useMinMax = false;
            if (isset($einsEstado['min'])) {
                $this->addUsingAlias(EInscripcionTableMap::COL_EINS_ESTADO, $einsEstado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($einsEstado['max'])) {
                $this->addUsingAlias(EInscripcionTableMap::COL_EINS_ESTADO, $einsEstado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EInscripcionTableMap::COL_EINS_ESTADO, $einsEstado, $comparison);
    }

    /**
     * Filter the query on the eins_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEinsDescripcion('fooValue');   // WHERE eins_descripcion = 'fooValue'
     * $query->filterByEinsDescripcion('%fooValue%', Criteria::LIKE); // WHERE eins_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $einsDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEInscripcionQuery The current query, for fluid interface
     */
    public function filterByEinsDescripcion($einsDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($einsDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EInscripcionTableMap::COL_EINS_DESCRIPCION, $einsDescripcion, $comparison);
    }

    /**
     * Filter the query on the eins_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEinsRFechaCreacion('2011-03-14'); // WHERE eins_r_fecha_creacion = '2011-03-14'
     * $query->filterByEinsRFechaCreacion('now'); // WHERE eins_r_fecha_creacion = '2011-03-14'
     * $query->filterByEinsRFechaCreacion(array('max' => 'yesterday')); // WHERE eins_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $einsRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEInscripcionQuery The current query, for fluid interface
     */
    public function filterByEinsRFechaCreacion($einsRFechaCreacion = null, $comparison = null)
    {
        if (is_array($einsRFechaCreacion)) {
            $useMinMax = false;
            if (isset($einsRFechaCreacion['min'])) {
                $this->addUsingAlias(EInscripcionTableMap::COL_EINS_R_FECHA_CREACION, $einsRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($einsRFechaCreacion['max'])) {
                $this->addUsingAlias(EInscripcionTableMap::COL_EINS_R_FECHA_CREACION, $einsRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EInscripcionTableMap::COL_EINS_R_FECHA_CREACION, $einsRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the eins_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEinsRFechaModificacion('2011-03-14'); // WHERE eins_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEinsRFechaModificacion('now'); // WHERE eins_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEinsRFechaModificacion(array('max' => 'yesterday')); // WHERE eins_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $einsRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEInscripcionQuery The current query, for fluid interface
     */
    public function filterByEinsRFechaModificacion($einsRFechaModificacion = null, $comparison = null)
    {
        if (is_array($einsRFechaModificacion)) {
            $useMinMax = false;
            if (isset($einsRFechaModificacion['min'])) {
                $this->addUsingAlias(EInscripcionTableMap::COL_EINS_R_FECHA_MODIFICACION, $einsRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($einsRFechaModificacion['max'])) {
                $this->addUsingAlias(EInscripcionTableMap::COL_EINS_R_FECHA_MODIFICACION, $einsRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EInscripcionTableMap::COL_EINS_R_FECHA_MODIFICACION, $einsRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the eins_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEinsRUsuario(1234); // WHERE eins_r_usuario = 1234
     * $query->filterByEinsRUsuario(array(12, 34)); // WHERE eins_r_usuario IN (12, 34)
     * $query->filterByEinsRUsuario(array('min' => 12)); // WHERE eins_r_usuario > 12
     * </code>
     *
     * @param     mixed $einsRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEInscripcionQuery The current query, for fluid interface
     */
    public function filterByEinsRUsuario($einsRUsuario = null, $comparison = null)
    {
        if (is_array($einsRUsuario)) {
            $useMinMax = false;
            if (isset($einsRUsuario['min'])) {
                $this->addUsingAlias(EInscripcionTableMap::COL_EINS_R_USUARIO, $einsRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($einsRUsuario['max'])) {
                $this->addUsingAlias(EInscripcionTableMap::COL_EINS_R_USUARIO, $einsRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EInscripcionTableMap::COL_EINS_R_USUARIO, $einsRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Inscripcion object
     *
     * @param \Inscripcion|ObjectCollection $inscripcion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscripcion($inscripcion, $comparison = null)
    {
        if ($inscripcion instanceof \Inscripcion) {
            return $this
                ->addUsingAlias(EInscripcionTableMap::COL_EINS_ESTADO, $inscripcion->getInscEInscripcion(), $comparison);
        } elseif ($inscripcion instanceof ObjectCollection) {
            return $this
                ->useInscripcionQuery()
                ->filterByPrimaryKeys($inscripcion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInscripcion() only accepts arguments of type \Inscripcion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Inscripcion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEInscripcionQuery The current query, for fluid interface
     */
    public function joinInscripcion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Inscripcion');

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
            $this->addJoinObject($join, 'Inscripcion');
        }

        return $this;
    }

    /**
     * Use the Inscripcion relation Inscripcion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InscripcionQuery A secondary query class using the current class as primary query
     */
    public function useInscripcionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinInscripcion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Inscripcion', '\InscripcionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEInscripcion $eInscripcion Object to remove from the list of results
     *
     * @return $this|ChildEInscripcionQuery The current query, for fluid interface
     */
    public function prune($eInscripcion = null)
    {
        if ($eInscripcion) {
            $this->addUsingAlias(EInscripcionTableMap::COL_EINS_ESTADO, $eInscripcion->getEinsEstado(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the e_inscripcion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EInscripcionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EInscripcionTableMap::clearInstancePool();
            EInscripcionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EInscripcionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EInscripcionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EInscripcionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EInscripcionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EInscripcionQuery
