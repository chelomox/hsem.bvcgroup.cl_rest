<?php

namespace Base;

use \TDireccion as ChildTDireccion;
use \TDireccionQuery as ChildTDireccionQuery;
use \Exception;
use \PDO;
use Map\TDireccionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_direccion' table.
 *
 *
 *
 * @method     ChildTDireccionQuery orderByTdirTipo($order = Criteria::ASC) Order by the tdir_tipo column
 * @method     ChildTDireccionQuery orderByTdirDescripcion($order = Criteria::ASC) Order by the tdir_descripcion column
 * @method     ChildTDireccionQuery orderByTdirRFechaCreacion($order = Criteria::ASC) Order by the tdir_r_fecha_creacion column
 * @method     ChildTDireccionQuery orderByTdirRFechaModificacion($order = Criteria::ASC) Order by the tdir_r_fecha_modificacion column
 * @method     ChildTDireccionQuery orderByTdirRUsuario($order = Criteria::ASC) Order by the tdir_r_usuario column
 *
 * @method     ChildTDireccionQuery groupByTdirTipo() Group by the tdir_tipo column
 * @method     ChildTDireccionQuery groupByTdirDescripcion() Group by the tdir_descripcion column
 * @method     ChildTDireccionQuery groupByTdirRFechaCreacion() Group by the tdir_r_fecha_creacion column
 * @method     ChildTDireccionQuery groupByTdirRFechaModificacion() Group by the tdir_r_fecha_modificacion column
 * @method     ChildTDireccionQuery groupByTdirRUsuario() Group by the tdir_r_usuario column
 *
 * @method     ChildTDireccionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTDireccionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTDireccionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTDireccionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTDireccionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTDireccionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTDireccionQuery leftJoinDireccion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Direccion relation
 * @method     ChildTDireccionQuery rightJoinDireccion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Direccion relation
 * @method     ChildTDireccionQuery innerJoinDireccion($relationAlias = null) Adds a INNER JOIN clause to the query using the Direccion relation
 *
 * @method     ChildTDireccionQuery joinWithDireccion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Direccion relation
 *
 * @method     ChildTDireccionQuery leftJoinWithDireccion() Adds a LEFT JOIN clause and with to the query using the Direccion relation
 * @method     ChildTDireccionQuery rightJoinWithDireccion() Adds a RIGHT JOIN clause and with to the query using the Direccion relation
 * @method     ChildTDireccionQuery innerJoinWithDireccion() Adds a INNER JOIN clause and with to the query using the Direccion relation
 *
 * @method     \DireccionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTDireccion findOne(ConnectionInterface $con = null) Return the first ChildTDireccion matching the query
 * @method     ChildTDireccion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTDireccion matching the query, or a new ChildTDireccion object populated from the query conditions when no match is found
 *
 * @method     ChildTDireccion findOneByTdirTipo(int $tdir_tipo) Return the first ChildTDireccion filtered by the tdir_tipo column
 * @method     ChildTDireccion findOneByTdirDescripcion(string $tdir_descripcion) Return the first ChildTDireccion filtered by the tdir_descripcion column
 * @method     ChildTDireccion findOneByTdirRFechaCreacion(string $tdir_r_fecha_creacion) Return the first ChildTDireccion filtered by the tdir_r_fecha_creacion column
 * @method     ChildTDireccion findOneByTdirRFechaModificacion(string $tdir_r_fecha_modificacion) Return the first ChildTDireccion filtered by the tdir_r_fecha_modificacion column
 * @method     ChildTDireccion findOneByTdirRUsuario(int $tdir_r_usuario) Return the first ChildTDireccion filtered by the tdir_r_usuario column *

 * @method     ChildTDireccion requirePk($key, ConnectionInterface $con = null) Return the ChildTDireccion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTDireccion requireOne(ConnectionInterface $con = null) Return the first ChildTDireccion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTDireccion requireOneByTdirTipo(int $tdir_tipo) Return the first ChildTDireccion filtered by the tdir_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTDireccion requireOneByTdirDescripcion(string $tdir_descripcion) Return the first ChildTDireccion filtered by the tdir_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTDireccion requireOneByTdirRFechaCreacion(string $tdir_r_fecha_creacion) Return the first ChildTDireccion filtered by the tdir_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTDireccion requireOneByTdirRFechaModificacion(string $tdir_r_fecha_modificacion) Return the first ChildTDireccion filtered by the tdir_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTDireccion requireOneByTdirRUsuario(int $tdir_r_usuario) Return the first ChildTDireccion filtered by the tdir_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTDireccion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTDireccion objects based on current ModelCriteria
 * @method     ChildTDireccion[]|ObjectCollection findByTdirTipo(int $tdir_tipo) Return ChildTDireccion objects filtered by the tdir_tipo column
 * @method     ChildTDireccion[]|ObjectCollection findByTdirDescripcion(string $tdir_descripcion) Return ChildTDireccion objects filtered by the tdir_descripcion column
 * @method     ChildTDireccion[]|ObjectCollection findByTdirRFechaCreacion(string $tdir_r_fecha_creacion) Return ChildTDireccion objects filtered by the tdir_r_fecha_creacion column
 * @method     ChildTDireccion[]|ObjectCollection findByTdirRFechaModificacion(string $tdir_r_fecha_modificacion) Return ChildTDireccion objects filtered by the tdir_r_fecha_modificacion column
 * @method     ChildTDireccion[]|ObjectCollection findByTdirRUsuario(int $tdir_r_usuario) Return ChildTDireccion objects filtered by the tdir_r_usuario column
 * @method     ChildTDireccion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TDireccionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TDireccionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TDireccion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTDireccionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTDireccionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTDireccionQuery) {
            return $criteria;
        }
        $query = new ChildTDireccionQuery();
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
     * @return ChildTDireccion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TDireccionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TDireccionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTDireccion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tdir_tipo, tdir_descripcion, tdir_r_fecha_creacion, tdir_r_fecha_modificacion, tdir_r_usuario FROM t_direccion WHERE tdir_tipo = :p0';
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
            /** @var ChildTDireccion $obj */
            $obj = new ChildTDireccion();
            $obj->hydrate($row);
            TDireccionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTDireccion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTDireccionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TDireccionTableMap::COL_TDIR_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTDireccionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TDireccionTableMap::COL_TDIR_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tdir_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTdirTipo(1234); // WHERE tdir_tipo = 1234
     * $query->filterByTdirTipo(array(12, 34)); // WHERE tdir_tipo IN (12, 34)
     * $query->filterByTdirTipo(array('min' => 12)); // WHERE tdir_tipo > 12
     * </code>
     *
     * @param     mixed $tdirTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTDireccionQuery The current query, for fluid interface
     */
    public function filterByTdirTipo($tdirTipo = null, $comparison = null)
    {
        if (is_array($tdirTipo)) {
            $useMinMax = false;
            if (isset($tdirTipo['min'])) {
                $this->addUsingAlias(TDireccionTableMap::COL_TDIR_TIPO, $tdirTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdirTipo['max'])) {
                $this->addUsingAlias(TDireccionTableMap::COL_TDIR_TIPO, $tdirTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TDireccionTableMap::COL_TDIR_TIPO, $tdirTipo, $comparison);
    }

    /**
     * Filter the query on the tdir_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByTdirDescripcion('fooValue');   // WHERE tdir_descripcion = 'fooValue'
     * $query->filterByTdirDescripcion('%fooValue%', Criteria::LIKE); // WHERE tdir_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tdirDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTDireccionQuery The current query, for fluid interface
     */
    public function filterByTdirDescripcion($tdirDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tdirDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TDireccionTableMap::COL_TDIR_DESCRIPCION, $tdirDescripcion, $comparison);
    }

    /**
     * Filter the query on the tdir_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTdirRFechaCreacion('2011-03-14'); // WHERE tdir_r_fecha_creacion = '2011-03-14'
     * $query->filterByTdirRFechaCreacion('now'); // WHERE tdir_r_fecha_creacion = '2011-03-14'
     * $query->filterByTdirRFechaCreacion(array('max' => 'yesterday')); // WHERE tdir_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tdirRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTDireccionQuery The current query, for fluid interface
     */
    public function filterByTdirRFechaCreacion($tdirRFechaCreacion = null, $comparison = null)
    {
        if (is_array($tdirRFechaCreacion)) {
            $useMinMax = false;
            if (isset($tdirRFechaCreacion['min'])) {
                $this->addUsingAlias(TDireccionTableMap::COL_TDIR_R_FECHA_CREACION, $tdirRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdirRFechaCreacion['max'])) {
                $this->addUsingAlias(TDireccionTableMap::COL_TDIR_R_FECHA_CREACION, $tdirRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TDireccionTableMap::COL_TDIR_R_FECHA_CREACION, $tdirRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the tdir_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTdirRFechaModificacion('2011-03-14'); // WHERE tdir_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTdirRFechaModificacion('now'); // WHERE tdir_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTdirRFechaModificacion(array('max' => 'yesterday')); // WHERE tdir_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tdirRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTDireccionQuery The current query, for fluid interface
     */
    public function filterByTdirRFechaModificacion($tdirRFechaModificacion = null, $comparison = null)
    {
        if (is_array($tdirRFechaModificacion)) {
            $useMinMax = false;
            if (isset($tdirRFechaModificacion['min'])) {
                $this->addUsingAlias(TDireccionTableMap::COL_TDIR_R_FECHA_MODIFICACION, $tdirRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdirRFechaModificacion['max'])) {
                $this->addUsingAlias(TDireccionTableMap::COL_TDIR_R_FECHA_MODIFICACION, $tdirRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TDireccionTableMap::COL_TDIR_R_FECHA_MODIFICACION, $tdirRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the tdir_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTdirRUsuario(1234); // WHERE tdir_r_usuario = 1234
     * $query->filterByTdirRUsuario(array(12, 34)); // WHERE tdir_r_usuario IN (12, 34)
     * $query->filterByTdirRUsuario(array('min' => 12)); // WHERE tdir_r_usuario > 12
     * </code>
     *
     * @param     mixed $tdirRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTDireccionQuery The current query, for fluid interface
     */
    public function filterByTdirRUsuario($tdirRUsuario = null, $comparison = null)
    {
        if (is_array($tdirRUsuario)) {
            $useMinMax = false;
            if (isset($tdirRUsuario['min'])) {
                $this->addUsingAlias(TDireccionTableMap::COL_TDIR_R_USUARIO, $tdirRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdirRUsuario['max'])) {
                $this->addUsingAlias(TDireccionTableMap::COL_TDIR_R_USUARIO, $tdirRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TDireccionTableMap::COL_TDIR_R_USUARIO, $tdirRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Direccion object
     *
     * @param \Direccion|ObjectCollection $direccion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTDireccionQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion, $comparison = null)
    {
        if ($direccion instanceof \Direccion) {
            return $this
                ->addUsingAlias(TDireccionTableMap::COL_TDIR_TIPO, $direccion->getDireTDireccion(), $comparison);
        } elseif ($direccion instanceof ObjectCollection) {
            return $this
                ->useDireccionQuery()
                ->filterByPrimaryKeys($direccion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDireccion() only accepts arguments of type \Direccion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Direccion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTDireccionQuery The current query, for fluid interface
     */
    public function joinDireccion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Direccion');

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
            $this->addJoinObject($join, 'Direccion');
        }

        return $this;
    }

    /**
     * Use the Direccion relation Direccion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DireccionQuery A secondary query class using the current class as primary query
     */
    public function useDireccionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDireccion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Direccion', '\DireccionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTDireccion $tDireccion Object to remove from the list of results
     *
     * @return $this|ChildTDireccionQuery The current query, for fluid interface
     */
    public function prune($tDireccion = null)
    {
        if ($tDireccion) {
            $this->addUsingAlias(TDireccionTableMap::COL_TDIR_TIPO, $tDireccion->getTdirTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_direccion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TDireccionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TDireccionTableMap::clearInstancePool();
            TDireccionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TDireccionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TDireccionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TDireccionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TDireccionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TDireccionQuery
