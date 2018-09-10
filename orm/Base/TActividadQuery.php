<?php

namespace Base;

use \TActividad as ChildTActividad;
use \TActividadQuery as ChildTActividadQuery;
use \Exception;
use \PDO;
use Map\TActividadTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_actividad' table.
 *
 *
 *
 * @method     ChildTActividadQuery orderByTacTipo($order = Criteria::ASC) Order by the tac_tipo column
 * @method     ChildTActividadQuery orderByTacDescripcion($order = Criteria::ASC) Order by the tac_descripcion column
 * @method     ChildTActividadQuery orderByTacTratamiento($order = Criteria::ASC) Order by the tac_tratamiento column
 * @method     ChildTActividadQuery orderByTacRFechaCreacion($order = Criteria::ASC) Order by the tac_r_fecha_creacion column
 * @method     ChildTActividadQuery orderByTacRFechaModificacion($order = Criteria::ASC) Order by the tac_r_fecha_modificacion column
 * @method     ChildTActividadQuery orderByTacRUsuario($order = Criteria::ASC) Order by the tac_r_usuario column
 *
 * @method     ChildTActividadQuery groupByTacTipo() Group by the tac_tipo column
 * @method     ChildTActividadQuery groupByTacDescripcion() Group by the tac_descripcion column
 * @method     ChildTActividadQuery groupByTacTratamiento() Group by the tac_tratamiento column
 * @method     ChildTActividadQuery groupByTacRFechaCreacion() Group by the tac_r_fecha_creacion column
 * @method     ChildTActividadQuery groupByTacRFechaModificacion() Group by the tac_r_fecha_modificacion column
 * @method     ChildTActividadQuery groupByTacRUsuario() Group by the tac_r_usuario column
 *
 * @method     ChildTActividadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTActividadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTActividadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTActividadQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTActividadQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTActividadQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTActividadQuery leftJoinActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actividad relation
 * @method     ChildTActividadQuery rightJoinActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actividad relation
 * @method     ChildTActividadQuery innerJoinActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the Actividad relation
 *
 * @method     ChildTActividadQuery joinWithActividad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Actividad relation
 *
 * @method     ChildTActividadQuery leftJoinWithActividad() Adds a LEFT JOIN clause and with to the query using the Actividad relation
 * @method     ChildTActividadQuery rightJoinWithActividad() Adds a RIGHT JOIN clause and with to the query using the Actividad relation
 * @method     ChildTActividadQuery innerJoinWithActividad() Adds a INNER JOIN clause and with to the query using the Actividad relation
 *
 * @method     \ActividadQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTActividad findOne(ConnectionInterface $con = null) Return the first ChildTActividad matching the query
 * @method     ChildTActividad findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTActividad matching the query, or a new ChildTActividad object populated from the query conditions when no match is found
 *
 * @method     ChildTActividad findOneByTacTipo(int $tac_tipo) Return the first ChildTActividad filtered by the tac_tipo column
 * @method     ChildTActividad findOneByTacDescripcion(string $tac_descripcion) Return the first ChildTActividad filtered by the tac_descripcion column
 * @method     ChildTActividad findOneByTacTratamiento(string $tac_tratamiento) Return the first ChildTActividad filtered by the tac_tratamiento column
 * @method     ChildTActividad findOneByTacRFechaCreacion(string $tac_r_fecha_creacion) Return the first ChildTActividad filtered by the tac_r_fecha_creacion column
 * @method     ChildTActividad findOneByTacRFechaModificacion(string $tac_r_fecha_modificacion) Return the first ChildTActividad filtered by the tac_r_fecha_modificacion column
 * @method     ChildTActividad findOneByTacRUsuario(int $tac_r_usuario) Return the first ChildTActividad filtered by the tac_r_usuario column *

 * @method     ChildTActividad requirePk($key, ConnectionInterface $con = null) Return the ChildTActividad by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTActividad requireOne(ConnectionInterface $con = null) Return the first ChildTActividad matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTActividad requireOneByTacTipo(int $tac_tipo) Return the first ChildTActividad filtered by the tac_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTActividad requireOneByTacDescripcion(string $tac_descripcion) Return the first ChildTActividad filtered by the tac_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTActividad requireOneByTacTratamiento(string $tac_tratamiento) Return the first ChildTActividad filtered by the tac_tratamiento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTActividad requireOneByTacRFechaCreacion(string $tac_r_fecha_creacion) Return the first ChildTActividad filtered by the tac_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTActividad requireOneByTacRFechaModificacion(string $tac_r_fecha_modificacion) Return the first ChildTActividad filtered by the tac_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTActividad requireOneByTacRUsuario(int $tac_r_usuario) Return the first ChildTActividad filtered by the tac_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTActividad[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTActividad objects based on current ModelCriteria
 * @method     ChildTActividad[]|ObjectCollection findByTacTipo(int $tac_tipo) Return ChildTActividad objects filtered by the tac_tipo column
 * @method     ChildTActividad[]|ObjectCollection findByTacDescripcion(string $tac_descripcion) Return ChildTActividad objects filtered by the tac_descripcion column
 * @method     ChildTActividad[]|ObjectCollection findByTacTratamiento(string $tac_tratamiento) Return ChildTActividad objects filtered by the tac_tratamiento column
 * @method     ChildTActividad[]|ObjectCollection findByTacRFechaCreacion(string $tac_r_fecha_creacion) Return ChildTActividad objects filtered by the tac_r_fecha_creacion column
 * @method     ChildTActividad[]|ObjectCollection findByTacRFechaModificacion(string $tac_r_fecha_modificacion) Return ChildTActividad objects filtered by the tac_r_fecha_modificacion column
 * @method     ChildTActividad[]|ObjectCollection findByTacRUsuario(int $tac_r_usuario) Return ChildTActividad objects filtered by the tac_r_usuario column
 * @method     ChildTActividad[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TActividadQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TActividadQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TActividad', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTActividadQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTActividadQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTActividadQuery) {
            return $criteria;
        }
        $query = new ChildTActividadQuery();
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
     * @return ChildTActividad|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TActividadTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TActividadTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTActividad A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tac_tipo, tac_descripcion, tac_tratamiento, tac_r_fecha_creacion, tac_r_fecha_modificacion, tac_r_usuario FROM t_actividad WHERE tac_tipo = :p0';
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
            /** @var ChildTActividad $obj */
            $obj = new ChildTActividad();
            $obj->hydrate($row);
            TActividadTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTActividad|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTActividadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TActividadTableMap::COL_TAC_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTActividadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TActividadTableMap::COL_TAC_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tac_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTacTipo(1234); // WHERE tac_tipo = 1234
     * $query->filterByTacTipo(array(12, 34)); // WHERE tac_tipo IN (12, 34)
     * $query->filterByTacTipo(array('min' => 12)); // WHERE tac_tipo > 12
     * </code>
     *
     * @param     mixed $tacTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTActividadQuery The current query, for fluid interface
     */
    public function filterByTacTipo($tacTipo = null, $comparison = null)
    {
        if (is_array($tacTipo)) {
            $useMinMax = false;
            if (isset($tacTipo['min'])) {
                $this->addUsingAlias(TActividadTableMap::COL_TAC_TIPO, $tacTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tacTipo['max'])) {
                $this->addUsingAlias(TActividadTableMap::COL_TAC_TIPO, $tacTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TActividadTableMap::COL_TAC_TIPO, $tacTipo, $comparison);
    }

    /**
     * Filter the query on the tac_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByTacDescripcion('fooValue');   // WHERE tac_descripcion = 'fooValue'
     * $query->filterByTacDescripcion('%fooValue%', Criteria::LIKE); // WHERE tac_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tacDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTActividadQuery The current query, for fluid interface
     */
    public function filterByTacDescripcion($tacDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tacDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TActividadTableMap::COL_TAC_DESCRIPCION, $tacDescripcion, $comparison);
    }

    /**
     * Filter the query on the tac_tratamiento column
     *
     * Example usage:
     * <code>
     * $query->filterByTacTratamiento('fooValue');   // WHERE tac_tratamiento = 'fooValue'
     * $query->filterByTacTratamiento('%fooValue%', Criteria::LIKE); // WHERE tac_tratamiento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tacTratamiento The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTActividadQuery The current query, for fluid interface
     */
    public function filterByTacTratamiento($tacTratamiento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tacTratamiento)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TActividadTableMap::COL_TAC_TRATAMIENTO, $tacTratamiento, $comparison);
    }

    /**
     * Filter the query on the tac_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTacRFechaCreacion('2011-03-14'); // WHERE tac_r_fecha_creacion = '2011-03-14'
     * $query->filterByTacRFechaCreacion('now'); // WHERE tac_r_fecha_creacion = '2011-03-14'
     * $query->filterByTacRFechaCreacion(array('max' => 'yesterday')); // WHERE tac_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tacRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTActividadQuery The current query, for fluid interface
     */
    public function filterByTacRFechaCreacion($tacRFechaCreacion = null, $comparison = null)
    {
        if (is_array($tacRFechaCreacion)) {
            $useMinMax = false;
            if (isset($tacRFechaCreacion['min'])) {
                $this->addUsingAlias(TActividadTableMap::COL_TAC_R_FECHA_CREACION, $tacRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tacRFechaCreacion['max'])) {
                $this->addUsingAlias(TActividadTableMap::COL_TAC_R_FECHA_CREACION, $tacRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TActividadTableMap::COL_TAC_R_FECHA_CREACION, $tacRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the tac_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTacRFechaModificacion('2011-03-14'); // WHERE tac_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTacRFechaModificacion('now'); // WHERE tac_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTacRFechaModificacion(array('max' => 'yesterday')); // WHERE tac_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tacRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTActividadQuery The current query, for fluid interface
     */
    public function filterByTacRFechaModificacion($tacRFechaModificacion = null, $comparison = null)
    {
        if (is_array($tacRFechaModificacion)) {
            $useMinMax = false;
            if (isset($tacRFechaModificacion['min'])) {
                $this->addUsingAlias(TActividadTableMap::COL_TAC_R_FECHA_MODIFICACION, $tacRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tacRFechaModificacion['max'])) {
                $this->addUsingAlias(TActividadTableMap::COL_TAC_R_FECHA_MODIFICACION, $tacRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TActividadTableMap::COL_TAC_R_FECHA_MODIFICACION, $tacRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the tac_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTacRUsuario(1234); // WHERE tac_r_usuario = 1234
     * $query->filterByTacRUsuario(array(12, 34)); // WHERE tac_r_usuario IN (12, 34)
     * $query->filterByTacRUsuario(array('min' => 12)); // WHERE tac_r_usuario > 12
     * </code>
     *
     * @param     mixed $tacRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTActividadQuery The current query, for fluid interface
     */
    public function filterByTacRUsuario($tacRUsuario = null, $comparison = null)
    {
        if (is_array($tacRUsuario)) {
            $useMinMax = false;
            if (isset($tacRUsuario['min'])) {
                $this->addUsingAlias(TActividadTableMap::COL_TAC_R_USUARIO, $tacRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tacRUsuario['max'])) {
                $this->addUsingAlias(TActividadTableMap::COL_TAC_R_USUARIO, $tacRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TActividadTableMap::COL_TAC_R_USUARIO, $tacRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Actividad object
     *
     * @param \Actividad|ObjectCollection $actividad the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTActividadQuery The current query, for fluid interface
     */
    public function filterByActividad($actividad, $comparison = null)
    {
        if ($actividad instanceof \Actividad) {
            return $this
                ->addUsingAlias(TActividadTableMap::COL_TAC_TIPO, $actividad->getActiTActividad(), $comparison);
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
     * @return $this|ChildTActividadQuery The current query, for fluid interface
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
     * @param   ChildTActividad $tActividad Object to remove from the list of results
     *
     * @return $this|ChildTActividadQuery The current query, for fluid interface
     */
    public function prune($tActividad = null)
    {
        if ($tActividad) {
            $this->addUsingAlias(TActividadTableMap::COL_TAC_TIPO, $tActividad->getTacTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_actividad table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TActividadTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TActividadTableMap::clearInstancePool();
            TActividadTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TActividadTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TActividadTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TActividadTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TActividadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TActividadQuery
