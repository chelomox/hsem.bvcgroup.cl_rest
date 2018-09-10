<?php

namespace Base;

use \TCalificacion as ChildTCalificacion;
use \TCalificacionQuery as ChildTCalificacionQuery;
use \Exception;
use \PDO;
use Map\TCalificacionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_calificacion' table.
 *
 *
 *
 * @method     ChildTCalificacionQuery orderByTcalTipo($order = Criteria::ASC) Order by the tcal_tipo column
 * @method     ChildTCalificacionQuery orderByTcalDescripcion($order = Criteria::ASC) Order by the tcal_descripcion column
 * @method     ChildTCalificacionQuery orderByTcalRFechaModificacion($order = Criteria::ASC) Order by the tcal_r_fecha_modificacion column
 * @method     ChildTCalificacionQuery orderByTcalRFechaCreacion($order = Criteria::ASC) Order by the tcal_r_fecha_creacion column
 * @method     ChildTCalificacionQuery orderByTcalRUsuario($order = Criteria::ASC) Order by the tcal_r_usuario column
 *
 * @method     ChildTCalificacionQuery groupByTcalTipo() Group by the tcal_tipo column
 * @method     ChildTCalificacionQuery groupByTcalDescripcion() Group by the tcal_descripcion column
 * @method     ChildTCalificacionQuery groupByTcalRFechaModificacion() Group by the tcal_r_fecha_modificacion column
 * @method     ChildTCalificacionQuery groupByTcalRFechaCreacion() Group by the tcal_r_fecha_creacion column
 * @method     ChildTCalificacionQuery groupByTcalRUsuario() Group by the tcal_r_usuario column
 *
 * @method     ChildTCalificacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTCalificacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTCalificacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTCalificacionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTCalificacionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTCalificacionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTCalificacionQuery leftJoinDictacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dictacion relation
 * @method     ChildTCalificacionQuery rightJoinDictacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dictacion relation
 * @method     ChildTCalificacionQuery innerJoinDictacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Dictacion relation
 *
 * @method     ChildTCalificacionQuery joinWithDictacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dictacion relation
 *
 * @method     ChildTCalificacionQuery leftJoinWithDictacion() Adds a LEFT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildTCalificacionQuery rightJoinWithDictacion() Adds a RIGHT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildTCalificacionQuery innerJoinWithDictacion() Adds a INNER JOIN clause and with to the query using the Dictacion relation
 *
 * @method     ChildTCalificacionQuery leftJoinEFinalizacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the EFinalizacion relation
 * @method     ChildTCalificacionQuery rightJoinEFinalizacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EFinalizacion relation
 * @method     ChildTCalificacionQuery innerJoinEFinalizacion($relationAlias = null) Adds a INNER JOIN clause to the query using the EFinalizacion relation
 *
 * @method     ChildTCalificacionQuery joinWithEFinalizacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EFinalizacion relation
 *
 * @method     ChildTCalificacionQuery leftJoinWithEFinalizacion() Adds a LEFT JOIN clause and with to the query using the EFinalizacion relation
 * @method     ChildTCalificacionQuery rightJoinWithEFinalizacion() Adds a RIGHT JOIN clause and with to the query using the EFinalizacion relation
 * @method     ChildTCalificacionQuery innerJoinWithEFinalizacion() Adds a INNER JOIN clause and with to the query using the EFinalizacion relation
 *
 * @method     \DictacionQuery|\EFinalizacionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTCalificacion findOne(ConnectionInterface $con = null) Return the first ChildTCalificacion matching the query
 * @method     ChildTCalificacion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTCalificacion matching the query, or a new ChildTCalificacion object populated from the query conditions when no match is found
 *
 * @method     ChildTCalificacion findOneByTcalTipo(int $tcal_tipo) Return the first ChildTCalificacion filtered by the tcal_tipo column
 * @method     ChildTCalificacion findOneByTcalDescripcion(string $tcal_descripcion) Return the first ChildTCalificacion filtered by the tcal_descripcion column
 * @method     ChildTCalificacion findOneByTcalRFechaModificacion(string $tcal_r_fecha_modificacion) Return the first ChildTCalificacion filtered by the tcal_r_fecha_modificacion column
 * @method     ChildTCalificacion findOneByTcalRFechaCreacion(string $tcal_r_fecha_creacion) Return the first ChildTCalificacion filtered by the tcal_r_fecha_creacion column
 * @method     ChildTCalificacion findOneByTcalRUsuario(int $tcal_r_usuario) Return the first ChildTCalificacion filtered by the tcal_r_usuario column *

 * @method     ChildTCalificacion requirePk($key, ConnectionInterface $con = null) Return the ChildTCalificacion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTCalificacion requireOne(ConnectionInterface $con = null) Return the first ChildTCalificacion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTCalificacion requireOneByTcalTipo(int $tcal_tipo) Return the first ChildTCalificacion filtered by the tcal_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTCalificacion requireOneByTcalDescripcion(string $tcal_descripcion) Return the first ChildTCalificacion filtered by the tcal_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTCalificacion requireOneByTcalRFechaModificacion(string $tcal_r_fecha_modificacion) Return the first ChildTCalificacion filtered by the tcal_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTCalificacion requireOneByTcalRFechaCreacion(string $tcal_r_fecha_creacion) Return the first ChildTCalificacion filtered by the tcal_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTCalificacion requireOneByTcalRUsuario(int $tcal_r_usuario) Return the first ChildTCalificacion filtered by the tcal_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTCalificacion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTCalificacion objects based on current ModelCriteria
 * @method     ChildTCalificacion[]|ObjectCollection findByTcalTipo(int $tcal_tipo) Return ChildTCalificacion objects filtered by the tcal_tipo column
 * @method     ChildTCalificacion[]|ObjectCollection findByTcalDescripcion(string $tcal_descripcion) Return ChildTCalificacion objects filtered by the tcal_descripcion column
 * @method     ChildTCalificacion[]|ObjectCollection findByTcalRFechaModificacion(string $tcal_r_fecha_modificacion) Return ChildTCalificacion objects filtered by the tcal_r_fecha_modificacion column
 * @method     ChildTCalificacion[]|ObjectCollection findByTcalRFechaCreacion(string $tcal_r_fecha_creacion) Return ChildTCalificacion objects filtered by the tcal_r_fecha_creacion column
 * @method     ChildTCalificacion[]|ObjectCollection findByTcalRUsuario(int $tcal_r_usuario) Return ChildTCalificacion objects filtered by the tcal_r_usuario column
 * @method     ChildTCalificacion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TCalificacionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TCalificacionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TCalificacion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTCalificacionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTCalificacionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTCalificacionQuery) {
            return $criteria;
        }
        $query = new ChildTCalificacionQuery();
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
     * @return ChildTCalificacion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TCalificacionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TCalificacionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTCalificacion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tcal_tipo, tcal_descripcion, tcal_r_fecha_modificacion, tcal_r_fecha_creacion, tcal_r_usuario FROM t_calificacion WHERE tcal_tipo = :p0';
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
            /** @var ChildTCalificacion $obj */
            $obj = new ChildTCalificacion();
            $obj->hydrate($row);
            TCalificacionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTCalificacion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTCalificacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTCalificacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tcal_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTcalTipo(1234); // WHERE tcal_tipo = 1234
     * $query->filterByTcalTipo(array(12, 34)); // WHERE tcal_tipo IN (12, 34)
     * $query->filterByTcalTipo(array('min' => 12)); // WHERE tcal_tipo > 12
     * </code>
     *
     * @param     mixed $tcalTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTCalificacionQuery The current query, for fluid interface
     */
    public function filterByTcalTipo($tcalTipo = null, $comparison = null)
    {
        if (is_array($tcalTipo)) {
            $useMinMax = false;
            if (isset($tcalTipo['min'])) {
                $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_TIPO, $tcalTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tcalTipo['max'])) {
                $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_TIPO, $tcalTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_TIPO, $tcalTipo, $comparison);
    }

    /**
     * Filter the query on the tcal_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByTcalDescripcion('fooValue');   // WHERE tcal_descripcion = 'fooValue'
     * $query->filterByTcalDescripcion('%fooValue%', Criteria::LIKE); // WHERE tcal_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tcalDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTCalificacionQuery The current query, for fluid interface
     */
    public function filterByTcalDescripcion($tcalDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tcalDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_DESCRIPCION, $tcalDescripcion, $comparison);
    }

    /**
     * Filter the query on the tcal_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTcalRFechaModificacion('2011-03-14'); // WHERE tcal_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTcalRFechaModificacion('now'); // WHERE tcal_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTcalRFechaModificacion(array('max' => 'yesterday')); // WHERE tcal_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tcalRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTCalificacionQuery The current query, for fluid interface
     */
    public function filterByTcalRFechaModificacion($tcalRFechaModificacion = null, $comparison = null)
    {
        if (is_array($tcalRFechaModificacion)) {
            $useMinMax = false;
            if (isset($tcalRFechaModificacion['min'])) {
                $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_R_FECHA_MODIFICACION, $tcalRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tcalRFechaModificacion['max'])) {
                $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_R_FECHA_MODIFICACION, $tcalRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_R_FECHA_MODIFICACION, $tcalRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the tcal_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTcalRFechaCreacion('2011-03-14'); // WHERE tcal_r_fecha_creacion = '2011-03-14'
     * $query->filterByTcalRFechaCreacion('now'); // WHERE tcal_r_fecha_creacion = '2011-03-14'
     * $query->filterByTcalRFechaCreacion(array('max' => 'yesterday')); // WHERE tcal_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tcalRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTCalificacionQuery The current query, for fluid interface
     */
    public function filterByTcalRFechaCreacion($tcalRFechaCreacion = null, $comparison = null)
    {
        if (is_array($tcalRFechaCreacion)) {
            $useMinMax = false;
            if (isset($tcalRFechaCreacion['min'])) {
                $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_R_FECHA_CREACION, $tcalRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tcalRFechaCreacion['max'])) {
                $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_R_FECHA_CREACION, $tcalRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_R_FECHA_CREACION, $tcalRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the tcal_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTcalRUsuario(1234); // WHERE tcal_r_usuario = 1234
     * $query->filterByTcalRUsuario(array(12, 34)); // WHERE tcal_r_usuario IN (12, 34)
     * $query->filterByTcalRUsuario(array('min' => 12)); // WHERE tcal_r_usuario > 12
     * </code>
     *
     * @param     mixed $tcalRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTCalificacionQuery The current query, for fluid interface
     */
    public function filterByTcalRUsuario($tcalRUsuario = null, $comparison = null)
    {
        if (is_array($tcalRUsuario)) {
            $useMinMax = false;
            if (isset($tcalRUsuario['min'])) {
                $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_R_USUARIO, $tcalRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tcalRUsuario['max'])) {
                $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_R_USUARIO, $tcalRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_R_USUARIO, $tcalRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Dictacion object
     *
     * @param \Dictacion|ObjectCollection $dictacion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTCalificacionQuery The current query, for fluid interface
     */
    public function filterByDictacion($dictacion, $comparison = null)
    {
        if ($dictacion instanceof \Dictacion) {
            return $this
                ->addUsingAlias(TCalificacionTableMap::COL_TCAL_TIPO, $dictacion->getDictTCalificacion(), $comparison);
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
     * @return $this|ChildTCalificacionQuery The current query, for fluid interface
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
     * Filter the query by a related \EFinalizacion object
     *
     * @param \EFinalizacion|ObjectCollection $eFinalizacion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTCalificacionQuery The current query, for fluid interface
     */
    public function filterByEFinalizacion($eFinalizacion, $comparison = null)
    {
        if ($eFinalizacion instanceof \EFinalizacion) {
            return $this
                ->addUsingAlias(TCalificacionTableMap::COL_TCAL_TIPO, $eFinalizacion->getEfinTCalificacion(), $comparison);
        } elseif ($eFinalizacion instanceof ObjectCollection) {
            return $this
                ->useEFinalizacionQuery()
                ->filterByPrimaryKeys($eFinalizacion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEFinalizacion() only accepts arguments of type \EFinalizacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EFinalizacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTCalificacionQuery The current query, for fluid interface
     */
    public function joinEFinalizacion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EFinalizacion');

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
            $this->addJoinObject($join, 'EFinalizacion');
        }

        return $this;
    }

    /**
     * Use the EFinalizacion relation EFinalizacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EFinalizacionQuery A secondary query class using the current class as primary query
     */
    public function useEFinalizacionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEFinalizacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EFinalizacion', '\EFinalizacionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTCalificacion $tCalificacion Object to remove from the list of results
     *
     * @return $this|ChildTCalificacionQuery The current query, for fluid interface
     */
    public function prune($tCalificacion = null)
    {
        if ($tCalificacion) {
            $this->addUsingAlias(TCalificacionTableMap::COL_TCAL_TIPO, $tCalificacion->getTcalTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_calificacion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TCalificacionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TCalificacionTableMap::clearInstancePool();
            TCalificacionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TCalificacionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TCalificacionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TCalificacionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TCalificacionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TCalificacionQuery
