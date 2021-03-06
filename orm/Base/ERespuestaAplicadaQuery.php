<?php

namespace Base;

use \ERespuestaAplicada as ChildERespuestaAplicada;
use \ERespuestaAplicadaQuery as ChildERespuestaAplicadaQuery;
use \Exception;
use \PDO;
use Map\ERespuestaAplicadaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'e_respuesta_aplicada' table.
 *
 *
 *
 * @method     ChildERespuestaAplicadaQuery orderByEreaEstado($order = Criteria::ASC) Order by the erea_estado column
 * @method     ChildERespuestaAplicadaQuery orderByEreaDescripcion($order = Criteria::ASC) Order by the erea_descripcion column
 * @method     ChildERespuestaAplicadaQuery orderByEreaRFechaCreacion($order = Criteria::ASC) Order by the erea_r_fecha_creacion column
 * @method     ChildERespuestaAplicadaQuery orderByEreaRFechaModificacion($order = Criteria::ASC) Order by the erea_r_fecha_modificacion column
 * @method     ChildERespuestaAplicadaQuery orderByEreaRUsuario($order = Criteria::ASC) Order by the erea_r_usuario column
 *
 * @method     ChildERespuestaAplicadaQuery groupByEreaEstado() Group by the erea_estado column
 * @method     ChildERespuestaAplicadaQuery groupByEreaDescripcion() Group by the erea_descripcion column
 * @method     ChildERespuestaAplicadaQuery groupByEreaRFechaCreacion() Group by the erea_r_fecha_creacion column
 * @method     ChildERespuestaAplicadaQuery groupByEreaRFechaModificacion() Group by the erea_r_fecha_modificacion column
 * @method     ChildERespuestaAplicadaQuery groupByEreaRUsuario() Group by the erea_r_usuario column
 *
 * @method     ChildERespuestaAplicadaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildERespuestaAplicadaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildERespuestaAplicadaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildERespuestaAplicadaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildERespuestaAplicadaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildERespuestaAplicadaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildERespuestaAplicadaQuery leftJoinRespuestaAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the RespuestaAplicada relation
 * @method     ChildERespuestaAplicadaQuery rightJoinRespuestaAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RespuestaAplicada relation
 * @method     ChildERespuestaAplicadaQuery innerJoinRespuestaAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the RespuestaAplicada relation
 *
 * @method     ChildERespuestaAplicadaQuery joinWithRespuestaAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the RespuestaAplicada relation
 *
 * @method     ChildERespuestaAplicadaQuery leftJoinWithRespuestaAplicada() Adds a LEFT JOIN clause and with to the query using the RespuestaAplicada relation
 * @method     ChildERespuestaAplicadaQuery rightJoinWithRespuestaAplicada() Adds a RIGHT JOIN clause and with to the query using the RespuestaAplicada relation
 * @method     ChildERespuestaAplicadaQuery innerJoinWithRespuestaAplicada() Adds a INNER JOIN clause and with to the query using the RespuestaAplicada relation
 *
 * @method     \RespuestaAplicadaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildERespuestaAplicada findOne(ConnectionInterface $con = null) Return the first ChildERespuestaAplicada matching the query
 * @method     ChildERespuestaAplicada findOneOrCreate(ConnectionInterface $con = null) Return the first ChildERespuestaAplicada matching the query, or a new ChildERespuestaAplicada object populated from the query conditions when no match is found
 *
 * @method     ChildERespuestaAplicada findOneByEreaEstado(int $erea_estado) Return the first ChildERespuestaAplicada filtered by the erea_estado column
 * @method     ChildERespuestaAplicada findOneByEreaDescripcion(string $erea_descripcion) Return the first ChildERespuestaAplicada filtered by the erea_descripcion column
 * @method     ChildERespuestaAplicada findOneByEreaRFechaCreacion(string $erea_r_fecha_creacion) Return the first ChildERespuestaAplicada filtered by the erea_r_fecha_creacion column
 * @method     ChildERespuestaAplicada findOneByEreaRFechaModificacion(string $erea_r_fecha_modificacion) Return the first ChildERespuestaAplicada filtered by the erea_r_fecha_modificacion column
 * @method     ChildERespuestaAplicada findOneByEreaRUsuario(int $erea_r_usuario) Return the first ChildERespuestaAplicada filtered by the erea_r_usuario column *

 * @method     ChildERespuestaAplicada requirePk($key, ConnectionInterface $con = null) Return the ChildERespuestaAplicada by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildERespuestaAplicada requireOne(ConnectionInterface $con = null) Return the first ChildERespuestaAplicada matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildERespuestaAplicada requireOneByEreaEstado(int $erea_estado) Return the first ChildERespuestaAplicada filtered by the erea_estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildERespuestaAplicada requireOneByEreaDescripcion(string $erea_descripcion) Return the first ChildERespuestaAplicada filtered by the erea_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildERespuestaAplicada requireOneByEreaRFechaCreacion(string $erea_r_fecha_creacion) Return the first ChildERespuestaAplicada filtered by the erea_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildERespuestaAplicada requireOneByEreaRFechaModificacion(string $erea_r_fecha_modificacion) Return the first ChildERespuestaAplicada filtered by the erea_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildERespuestaAplicada requireOneByEreaRUsuario(int $erea_r_usuario) Return the first ChildERespuestaAplicada filtered by the erea_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildERespuestaAplicada[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildERespuestaAplicada objects based on current ModelCriteria
 * @method     ChildERespuestaAplicada[]|ObjectCollection findByEreaEstado(int $erea_estado) Return ChildERespuestaAplicada objects filtered by the erea_estado column
 * @method     ChildERespuestaAplicada[]|ObjectCollection findByEreaDescripcion(string $erea_descripcion) Return ChildERespuestaAplicada objects filtered by the erea_descripcion column
 * @method     ChildERespuestaAplicada[]|ObjectCollection findByEreaRFechaCreacion(string $erea_r_fecha_creacion) Return ChildERespuestaAplicada objects filtered by the erea_r_fecha_creacion column
 * @method     ChildERespuestaAplicada[]|ObjectCollection findByEreaRFechaModificacion(string $erea_r_fecha_modificacion) Return ChildERespuestaAplicada objects filtered by the erea_r_fecha_modificacion column
 * @method     ChildERespuestaAplicada[]|ObjectCollection findByEreaRUsuario(int $erea_r_usuario) Return ChildERespuestaAplicada objects filtered by the erea_r_usuario column
 * @method     ChildERespuestaAplicada[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ERespuestaAplicadaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ERespuestaAplicadaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ERespuestaAplicada', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildERespuestaAplicadaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildERespuestaAplicadaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildERespuestaAplicadaQuery) {
            return $criteria;
        }
        $query = new ChildERespuestaAplicadaQuery();
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
     * @return ChildERespuestaAplicada|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ERespuestaAplicadaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ERespuestaAplicadaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildERespuestaAplicada A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT erea_estado, erea_descripcion, erea_r_fecha_creacion, erea_r_fecha_modificacion, erea_r_usuario FROM e_respuesta_aplicada WHERE erea_estado = :p0';
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
            /** @var ChildERespuestaAplicada $obj */
            $obj = new ChildERespuestaAplicada();
            $obj->hydrate($row);
            ERespuestaAplicadaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildERespuestaAplicada|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildERespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_ESTADO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildERespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_ESTADO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the erea_estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEreaEstado(1234); // WHERE erea_estado = 1234
     * $query->filterByEreaEstado(array(12, 34)); // WHERE erea_estado IN (12, 34)
     * $query->filterByEreaEstado(array('min' => 12)); // WHERE erea_estado > 12
     * </code>
     *
     * @param     mixed $ereaEstado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildERespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByEreaEstado($ereaEstado = null, $comparison = null)
    {
        if (is_array($ereaEstado)) {
            $useMinMax = false;
            if (isset($ereaEstado['min'])) {
                $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_ESTADO, $ereaEstado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ereaEstado['max'])) {
                $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_ESTADO, $ereaEstado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_ESTADO, $ereaEstado, $comparison);
    }

    /**
     * Filter the query on the erea_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEreaDescripcion('fooValue');   // WHERE erea_descripcion = 'fooValue'
     * $query->filterByEreaDescripcion('%fooValue%', Criteria::LIKE); // WHERE erea_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ereaDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildERespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByEreaDescripcion($ereaDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ereaDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_DESCRIPCION, $ereaDescripcion, $comparison);
    }

    /**
     * Filter the query on the erea_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEreaRFechaCreacion('2011-03-14'); // WHERE erea_r_fecha_creacion = '2011-03-14'
     * $query->filterByEreaRFechaCreacion('now'); // WHERE erea_r_fecha_creacion = '2011-03-14'
     * $query->filterByEreaRFechaCreacion(array('max' => 'yesterday')); // WHERE erea_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $ereaRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildERespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByEreaRFechaCreacion($ereaRFechaCreacion = null, $comparison = null)
    {
        if (is_array($ereaRFechaCreacion)) {
            $useMinMax = false;
            if (isset($ereaRFechaCreacion['min'])) {
                $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_R_FECHA_CREACION, $ereaRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ereaRFechaCreacion['max'])) {
                $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_R_FECHA_CREACION, $ereaRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_R_FECHA_CREACION, $ereaRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the erea_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEreaRFechaModificacion('2011-03-14'); // WHERE erea_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEreaRFechaModificacion('now'); // WHERE erea_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEreaRFechaModificacion(array('max' => 'yesterday')); // WHERE erea_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $ereaRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildERespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByEreaRFechaModificacion($ereaRFechaModificacion = null, $comparison = null)
    {
        if (is_array($ereaRFechaModificacion)) {
            $useMinMax = false;
            if (isset($ereaRFechaModificacion['min'])) {
                $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_R_FECHA_MODIFICACION, $ereaRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ereaRFechaModificacion['max'])) {
                $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_R_FECHA_MODIFICACION, $ereaRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_R_FECHA_MODIFICACION, $ereaRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the erea_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEreaRUsuario(1234); // WHERE erea_r_usuario = 1234
     * $query->filterByEreaRUsuario(array(12, 34)); // WHERE erea_r_usuario IN (12, 34)
     * $query->filterByEreaRUsuario(array('min' => 12)); // WHERE erea_r_usuario > 12
     * </code>
     *
     * @param     mixed $ereaRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildERespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByEreaRUsuario($ereaRUsuario = null, $comparison = null)
    {
        if (is_array($ereaRUsuario)) {
            $useMinMax = false;
            if (isset($ereaRUsuario['min'])) {
                $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_R_USUARIO, $ereaRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ereaRUsuario['max'])) {
                $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_R_USUARIO, $ereaRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_R_USUARIO, $ereaRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \RespuestaAplicada object
     *
     * @param \RespuestaAplicada|ObjectCollection $respuestaAplicada the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildERespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByRespuestaAplicada($respuestaAplicada, $comparison = null)
    {
        if ($respuestaAplicada instanceof \RespuestaAplicada) {
            return $this
                ->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_ESTADO, $respuestaAplicada->getReapERespuestaAplicada(), $comparison);
        } elseif ($respuestaAplicada instanceof ObjectCollection) {
            return $this
                ->useRespuestaAplicadaQuery()
                ->filterByPrimaryKeys($respuestaAplicada->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRespuestaAplicada() only accepts arguments of type \RespuestaAplicada or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RespuestaAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildERespuestaAplicadaQuery The current query, for fluid interface
     */
    public function joinRespuestaAplicada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RespuestaAplicada');

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
            $this->addJoinObject($join, 'RespuestaAplicada');
        }

        return $this;
    }

    /**
     * Use the RespuestaAplicada relation RespuestaAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RespuestaAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useRespuestaAplicadaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRespuestaAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RespuestaAplicada', '\RespuestaAplicadaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildERespuestaAplicada $eRespuestaAplicada Object to remove from the list of results
     *
     * @return $this|ChildERespuestaAplicadaQuery The current query, for fluid interface
     */
    public function prune($eRespuestaAplicada = null)
    {
        if ($eRespuestaAplicada) {
            $this->addUsingAlias(ERespuestaAplicadaTableMap::COL_EREA_ESTADO, $eRespuestaAplicada->getEreaEstado(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the e_respuesta_aplicada table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ERespuestaAplicadaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ERespuestaAplicadaTableMap::clearInstancePool();
            ERespuestaAplicadaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ERespuestaAplicadaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ERespuestaAplicadaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ERespuestaAplicadaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ERespuestaAplicadaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ERespuestaAplicadaQuery
