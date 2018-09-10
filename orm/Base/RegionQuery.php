<?php

namespace Base;

use \Region as ChildRegion;
use \RegionQuery as ChildRegionQuery;
use \Exception;
use \PDO;
use Map\RegionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'region' table.
 *
 *
 *
 * @method     ChildRegionQuery orderByRegiCodigo($order = Criteria::ASC) Order by the regi_codigo column
 * @method     ChildRegionQuery orderByRegiNombre($order = Criteria::ASC) Order by the regi_nombre column
 * @method     ChildRegionQuery orderByRegiIso31662Cl($order = Criteria::ASC) Order by the regi_iso_3166_2_cl column
 * @method     ChildRegionQuery orderByRegiRFechaCreacion($order = Criteria::ASC) Order by the regi_r_fecha_creacion column
 * @method     ChildRegionQuery orderByRegiRFechaModificacion($order = Criteria::ASC) Order by the regi_r_fecha_modificacion column
 * @method     ChildRegionQuery orderByRegiRUsuario($order = Criteria::ASC) Order by the regi_r_usuario column
 *
 * @method     ChildRegionQuery groupByRegiCodigo() Group by the regi_codigo column
 * @method     ChildRegionQuery groupByRegiNombre() Group by the regi_nombre column
 * @method     ChildRegionQuery groupByRegiIso31662Cl() Group by the regi_iso_3166_2_cl column
 * @method     ChildRegionQuery groupByRegiRFechaCreacion() Group by the regi_r_fecha_creacion column
 * @method     ChildRegionQuery groupByRegiRFechaModificacion() Group by the regi_r_fecha_modificacion column
 * @method     ChildRegionQuery groupByRegiRUsuario() Group by the regi_r_usuario column
 *
 * @method     ChildRegionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRegionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRegionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRegionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRegionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRegionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRegionQuery leftJoinProvincia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Provincia relation
 * @method     ChildRegionQuery rightJoinProvincia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Provincia relation
 * @method     ChildRegionQuery innerJoinProvincia($relationAlias = null) Adds a INNER JOIN clause to the query using the Provincia relation
 *
 * @method     ChildRegionQuery joinWithProvincia($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Provincia relation
 *
 * @method     ChildRegionQuery leftJoinWithProvincia() Adds a LEFT JOIN clause and with to the query using the Provincia relation
 * @method     ChildRegionQuery rightJoinWithProvincia() Adds a RIGHT JOIN clause and with to the query using the Provincia relation
 * @method     ChildRegionQuery innerJoinWithProvincia() Adds a INNER JOIN clause and with to the query using the Provincia relation
 *
 * @method     \ProvinciaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildRegion findOne(ConnectionInterface $con = null) Return the first ChildRegion matching the query
 * @method     ChildRegion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRegion matching the query, or a new ChildRegion object populated from the query conditions when no match is found
 *
 * @method     ChildRegion findOneByRegiCodigo(int $regi_codigo) Return the first ChildRegion filtered by the regi_codigo column
 * @method     ChildRegion findOneByRegiNombre(string $regi_nombre) Return the first ChildRegion filtered by the regi_nombre column
 * @method     ChildRegion findOneByRegiIso31662Cl(string $regi_iso_3166_2_cl) Return the first ChildRegion filtered by the regi_iso_3166_2_cl column
 * @method     ChildRegion findOneByRegiRFechaCreacion(string $regi_r_fecha_creacion) Return the first ChildRegion filtered by the regi_r_fecha_creacion column
 * @method     ChildRegion findOneByRegiRFechaModificacion(string $regi_r_fecha_modificacion) Return the first ChildRegion filtered by the regi_r_fecha_modificacion column
 * @method     ChildRegion findOneByRegiRUsuario(int $regi_r_usuario) Return the first ChildRegion filtered by the regi_r_usuario column *

 * @method     ChildRegion requirePk($key, ConnectionInterface $con = null) Return the ChildRegion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegion requireOne(ConnectionInterface $con = null) Return the first ChildRegion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRegion requireOneByRegiCodigo(int $regi_codigo) Return the first ChildRegion filtered by the regi_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegion requireOneByRegiNombre(string $regi_nombre) Return the first ChildRegion filtered by the regi_nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegion requireOneByRegiIso31662Cl(string $regi_iso_3166_2_cl) Return the first ChildRegion filtered by the regi_iso_3166_2_cl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegion requireOneByRegiRFechaCreacion(string $regi_r_fecha_creacion) Return the first ChildRegion filtered by the regi_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegion requireOneByRegiRFechaModificacion(string $regi_r_fecha_modificacion) Return the first ChildRegion filtered by the regi_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegion requireOneByRegiRUsuario(int $regi_r_usuario) Return the first ChildRegion filtered by the regi_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRegion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRegion objects based on current ModelCriteria
 * @method     ChildRegion[]|ObjectCollection findByRegiCodigo(int $regi_codigo) Return ChildRegion objects filtered by the regi_codigo column
 * @method     ChildRegion[]|ObjectCollection findByRegiNombre(string $regi_nombre) Return ChildRegion objects filtered by the regi_nombre column
 * @method     ChildRegion[]|ObjectCollection findByRegiIso31662Cl(string $regi_iso_3166_2_cl) Return ChildRegion objects filtered by the regi_iso_3166_2_cl column
 * @method     ChildRegion[]|ObjectCollection findByRegiRFechaCreacion(string $regi_r_fecha_creacion) Return ChildRegion objects filtered by the regi_r_fecha_creacion column
 * @method     ChildRegion[]|ObjectCollection findByRegiRFechaModificacion(string $regi_r_fecha_modificacion) Return ChildRegion objects filtered by the regi_r_fecha_modificacion column
 * @method     ChildRegion[]|ObjectCollection findByRegiRUsuario(int $regi_r_usuario) Return ChildRegion objects filtered by the regi_r_usuario column
 * @method     ChildRegion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RegionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RegionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Region', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRegionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRegionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRegionQuery) {
            return $criteria;
        }
        $query = new ChildRegionQuery();
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
     * @return ChildRegion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RegionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = RegionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildRegion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT regi_codigo, regi_nombre, regi_iso_3166_2_cl, regi_r_fecha_creacion, regi_r_fecha_modificacion, regi_r_usuario FROM region WHERE regi_codigo = :p0';
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
            /** @var ChildRegion $obj */
            $obj = new ChildRegion();
            $obj->hydrate($row);
            RegionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildRegion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRegionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RegionTableMap::COL_REGI_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRegionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RegionTableMap::COL_REGI_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the regi_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByRegiCodigo(1234); // WHERE regi_codigo = 1234
     * $query->filterByRegiCodigo(array(12, 34)); // WHERE regi_codigo IN (12, 34)
     * $query->filterByRegiCodigo(array('min' => 12)); // WHERE regi_codigo > 12
     * </code>
     *
     * @param     mixed $regiCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegionQuery The current query, for fluid interface
     */
    public function filterByRegiCodigo($regiCodigo = null, $comparison = null)
    {
        if (is_array($regiCodigo)) {
            $useMinMax = false;
            if (isset($regiCodigo['min'])) {
                $this->addUsingAlias(RegionTableMap::COL_REGI_CODIGO, $regiCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regiCodigo['max'])) {
                $this->addUsingAlias(RegionTableMap::COL_REGI_CODIGO, $regiCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegionTableMap::COL_REGI_CODIGO, $regiCodigo, $comparison);
    }

    /**
     * Filter the query on the regi_nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByRegiNombre('fooValue');   // WHERE regi_nombre = 'fooValue'
     * $query->filterByRegiNombre('%fooValue%', Criteria::LIKE); // WHERE regi_nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regiNombre The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegionQuery The current query, for fluid interface
     */
    public function filterByRegiNombre($regiNombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regiNombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegionTableMap::COL_REGI_NOMBRE, $regiNombre, $comparison);
    }

    /**
     * Filter the query on the regi_iso_3166_2_cl column
     *
     * Example usage:
     * <code>
     * $query->filterByRegiIso31662Cl('fooValue');   // WHERE regi_iso_3166_2_cl = 'fooValue'
     * $query->filterByRegiIso31662Cl('%fooValue%', Criteria::LIKE); // WHERE regi_iso_3166_2_cl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regiIso31662Cl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegionQuery The current query, for fluid interface
     */
    public function filterByRegiIso31662Cl($regiIso31662Cl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regiIso31662Cl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegionTableMap::COL_REGI_ISO_3166_2_CL, $regiIso31662Cl, $comparison);
    }

    /**
     * Filter the query on the regi_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByRegiRFechaCreacion('2011-03-14'); // WHERE regi_r_fecha_creacion = '2011-03-14'
     * $query->filterByRegiRFechaCreacion('now'); // WHERE regi_r_fecha_creacion = '2011-03-14'
     * $query->filterByRegiRFechaCreacion(array('max' => 'yesterday')); // WHERE regi_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $regiRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegionQuery The current query, for fluid interface
     */
    public function filterByRegiRFechaCreacion($regiRFechaCreacion = null, $comparison = null)
    {
        if (is_array($regiRFechaCreacion)) {
            $useMinMax = false;
            if (isset($regiRFechaCreacion['min'])) {
                $this->addUsingAlias(RegionTableMap::COL_REGI_R_FECHA_CREACION, $regiRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regiRFechaCreacion['max'])) {
                $this->addUsingAlias(RegionTableMap::COL_REGI_R_FECHA_CREACION, $regiRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegionTableMap::COL_REGI_R_FECHA_CREACION, $regiRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the regi_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByRegiRFechaModificacion('2011-03-14'); // WHERE regi_r_fecha_modificacion = '2011-03-14'
     * $query->filterByRegiRFechaModificacion('now'); // WHERE regi_r_fecha_modificacion = '2011-03-14'
     * $query->filterByRegiRFechaModificacion(array('max' => 'yesterday')); // WHERE regi_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $regiRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegionQuery The current query, for fluid interface
     */
    public function filterByRegiRFechaModificacion($regiRFechaModificacion = null, $comparison = null)
    {
        if (is_array($regiRFechaModificacion)) {
            $useMinMax = false;
            if (isset($regiRFechaModificacion['min'])) {
                $this->addUsingAlias(RegionTableMap::COL_REGI_R_FECHA_MODIFICACION, $regiRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regiRFechaModificacion['max'])) {
                $this->addUsingAlias(RegionTableMap::COL_REGI_R_FECHA_MODIFICACION, $regiRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegionTableMap::COL_REGI_R_FECHA_MODIFICACION, $regiRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the regi_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByRegiRUsuario(1234); // WHERE regi_r_usuario = 1234
     * $query->filterByRegiRUsuario(array(12, 34)); // WHERE regi_r_usuario IN (12, 34)
     * $query->filterByRegiRUsuario(array('min' => 12)); // WHERE regi_r_usuario > 12
     * </code>
     *
     * @param     mixed $regiRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegionQuery The current query, for fluid interface
     */
    public function filterByRegiRUsuario($regiRUsuario = null, $comparison = null)
    {
        if (is_array($regiRUsuario)) {
            $useMinMax = false;
            if (isset($regiRUsuario['min'])) {
                $this->addUsingAlias(RegionTableMap::COL_REGI_R_USUARIO, $regiRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regiRUsuario['max'])) {
                $this->addUsingAlias(RegionTableMap::COL_REGI_R_USUARIO, $regiRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegionTableMap::COL_REGI_R_USUARIO, $regiRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Provincia object
     *
     * @param \Provincia|ObjectCollection $provincia the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRegionQuery The current query, for fluid interface
     */
    public function filterByProvincia($provincia, $comparison = null)
    {
        if ($provincia instanceof \Provincia) {
            return $this
                ->addUsingAlias(RegionTableMap::COL_REGI_CODIGO, $provincia->getProvCRegion(), $comparison);
        } elseif ($provincia instanceof ObjectCollection) {
            return $this
                ->useProvinciaQuery()
                ->filterByPrimaryKeys($provincia->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProvincia() only accepts arguments of type \Provincia or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Provincia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRegionQuery The current query, for fluid interface
     */
    public function joinProvincia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Provincia');

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
            $this->addJoinObject($join, 'Provincia');
        }

        return $this;
    }

    /**
     * Use the Provincia relation Provincia object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProvinciaQuery A secondary query class using the current class as primary query
     */
    public function useProvinciaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProvincia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Provincia', '\ProvinciaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRegion $region Object to remove from the list of results
     *
     * @return $this|ChildRegionQuery The current query, for fluid interface
     */
    public function prune($region = null)
    {
        if ($region) {
            $this->addUsingAlias(RegionTableMap::COL_REGI_CODIGO, $region->getRegiCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the region table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RegionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RegionTableMap::clearInstancePool();
            RegionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RegionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RegionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RegionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RegionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RegionQuery
