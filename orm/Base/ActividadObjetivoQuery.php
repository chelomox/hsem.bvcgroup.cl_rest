<?php

namespace Base;

use \ActividadObjetivo as ChildActividadObjetivo;
use \ActividadObjetivoQuery as ChildActividadObjetivoQuery;
use \Exception;
use \PDO;
use Map\ActividadObjetivoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'actividad_objetivo' table.
 *
 *
 *
 * @method     ChildActividadObjetivoQuery orderByAcobCActividad($order = Criteria::ASC) Order by the acob_c_actividad column
 * @method     ChildActividadObjetivoQuery orderByAcobCObjetivo($order = Criteria::ASC) Order by the acob_c_objetivo column
 * @method     ChildActividadObjetivoQuery orderByAcobCantidadPreguntas($order = Criteria::ASC) Order by the acob_cantidad_preguntas column
 * @method     ChildActividadObjetivoQuery orderByAcobVigente($order = Criteria::ASC) Order by the acob_vigente column
 * @method     ChildActividadObjetivoQuery orderByAcobRFechaCreacion($order = Criteria::ASC) Order by the acob_r_fecha_creacion column
 * @method     ChildActividadObjetivoQuery orderByAcobRFechaModificacion($order = Criteria::ASC) Order by the acob_r_fecha_modificacion column
 * @method     ChildActividadObjetivoQuery orderByAcobRUsuario($order = Criteria::ASC) Order by the acob_r_usuario column
 *
 * @method     ChildActividadObjetivoQuery groupByAcobCActividad() Group by the acob_c_actividad column
 * @method     ChildActividadObjetivoQuery groupByAcobCObjetivo() Group by the acob_c_objetivo column
 * @method     ChildActividadObjetivoQuery groupByAcobCantidadPreguntas() Group by the acob_cantidad_preguntas column
 * @method     ChildActividadObjetivoQuery groupByAcobVigente() Group by the acob_vigente column
 * @method     ChildActividadObjetivoQuery groupByAcobRFechaCreacion() Group by the acob_r_fecha_creacion column
 * @method     ChildActividadObjetivoQuery groupByAcobRFechaModificacion() Group by the acob_r_fecha_modificacion column
 * @method     ChildActividadObjetivoQuery groupByAcobRUsuario() Group by the acob_r_usuario column
 *
 * @method     ChildActividadObjetivoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildActividadObjetivoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildActividadObjetivoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildActividadObjetivoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildActividadObjetivoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildActividadObjetivoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildActividadObjetivoQuery leftJoinActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actividad relation
 * @method     ChildActividadObjetivoQuery rightJoinActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actividad relation
 * @method     ChildActividadObjetivoQuery innerJoinActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the Actividad relation
 *
 * @method     ChildActividadObjetivoQuery joinWithActividad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Actividad relation
 *
 * @method     ChildActividadObjetivoQuery leftJoinWithActividad() Adds a LEFT JOIN clause and with to the query using the Actividad relation
 * @method     ChildActividadObjetivoQuery rightJoinWithActividad() Adds a RIGHT JOIN clause and with to the query using the Actividad relation
 * @method     ChildActividadObjetivoQuery innerJoinWithActividad() Adds a INNER JOIN clause and with to the query using the Actividad relation
 *
 * @method     ChildActividadObjetivoQuery leftJoinObjetivo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Objetivo relation
 * @method     ChildActividadObjetivoQuery rightJoinObjetivo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Objetivo relation
 * @method     ChildActividadObjetivoQuery innerJoinObjetivo($relationAlias = null) Adds a INNER JOIN clause to the query using the Objetivo relation
 *
 * @method     ChildActividadObjetivoQuery joinWithObjetivo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Objetivo relation
 *
 * @method     ChildActividadObjetivoQuery leftJoinWithObjetivo() Adds a LEFT JOIN clause and with to the query using the Objetivo relation
 * @method     ChildActividadObjetivoQuery rightJoinWithObjetivo() Adds a RIGHT JOIN clause and with to the query using the Objetivo relation
 * @method     ChildActividadObjetivoQuery innerJoinWithObjetivo() Adds a INNER JOIN clause and with to the query using the Objetivo relation
 *
 * @method     \ActividadQuery|\ObjetivoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildActividadObjetivo findOne(ConnectionInterface $con = null) Return the first ChildActividadObjetivo matching the query
 * @method     ChildActividadObjetivo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildActividadObjetivo matching the query, or a new ChildActividadObjetivo object populated from the query conditions when no match is found
 *
 * @method     ChildActividadObjetivo findOneByAcobCActividad(int $acob_c_actividad) Return the first ChildActividadObjetivo filtered by the acob_c_actividad column
 * @method     ChildActividadObjetivo findOneByAcobCObjetivo(int $acob_c_objetivo) Return the first ChildActividadObjetivo filtered by the acob_c_objetivo column
 * @method     ChildActividadObjetivo findOneByAcobCantidadPreguntas(int $acob_cantidad_preguntas) Return the first ChildActividadObjetivo filtered by the acob_cantidad_preguntas column
 * @method     ChildActividadObjetivo findOneByAcobVigente(int $acob_vigente) Return the first ChildActividadObjetivo filtered by the acob_vigente column
 * @method     ChildActividadObjetivo findOneByAcobRFechaCreacion(string $acob_r_fecha_creacion) Return the first ChildActividadObjetivo filtered by the acob_r_fecha_creacion column
 * @method     ChildActividadObjetivo findOneByAcobRFechaModificacion(string $acob_r_fecha_modificacion) Return the first ChildActividadObjetivo filtered by the acob_r_fecha_modificacion column
 * @method     ChildActividadObjetivo findOneByAcobRUsuario(int $acob_r_usuario) Return the first ChildActividadObjetivo filtered by the acob_r_usuario column *

 * @method     ChildActividadObjetivo requirePk($key, ConnectionInterface $con = null) Return the ChildActividadObjetivo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadObjetivo requireOne(ConnectionInterface $con = null) Return the first ChildActividadObjetivo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActividadObjetivo requireOneByAcobCActividad(int $acob_c_actividad) Return the first ChildActividadObjetivo filtered by the acob_c_actividad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadObjetivo requireOneByAcobCObjetivo(int $acob_c_objetivo) Return the first ChildActividadObjetivo filtered by the acob_c_objetivo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadObjetivo requireOneByAcobCantidadPreguntas(int $acob_cantidad_preguntas) Return the first ChildActividadObjetivo filtered by the acob_cantidad_preguntas column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadObjetivo requireOneByAcobVigente(int $acob_vigente) Return the first ChildActividadObjetivo filtered by the acob_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadObjetivo requireOneByAcobRFechaCreacion(string $acob_r_fecha_creacion) Return the first ChildActividadObjetivo filtered by the acob_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadObjetivo requireOneByAcobRFechaModificacion(string $acob_r_fecha_modificacion) Return the first ChildActividadObjetivo filtered by the acob_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividadObjetivo requireOneByAcobRUsuario(int $acob_r_usuario) Return the first ChildActividadObjetivo filtered by the acob_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActividadObjetivo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildActividadObjetivo objects based on current ModelCriteria
 * @method     ChildActividadObjetivo[]|ObjectCollection findByAcobCActividad(int $acob_c_actividad) Return ChildActividadObjetivo objects filtered by the acob_c_actividad column
 * @method     ChildActividadObjetivo[]|ObjectCollection findByAcobCObjetivo(int $acob_c_objetivo) Return ChildActividadObjetivo objects filtered by the acob_c_objetivo column
 * @method     ChildActividadObjetivo[]|ObjectCollection findByAcobCantidadPreguntas(int $acob_cantidad_preguntas) Return ChildActividadObjetivo objects filtered by the acob_cantidad_preguntas column
 * @method     ChildActividadObjetivo[]|ObjectCollection findByAcobVigente(int $acob_vigente) Return ChildActividadObjetivo objects filtered by the acob_vigente column
 * @method     ChildActividadObjetivo[]|ObjectCollection findByAcobRFechaCreacion(string $acob_r_fecha_creacion) Return ChildActividadObjetivo objects filtered by the acob_r_fecha_creacion column
 * @method     ChildActividadObjetivo[]|ObjectCollection findByAcobRFechaModificacion(string $acob_r_fecha_modificacion) Return ChildActividadObjetivo objects filtered by the acob_r_fecha_modificacion column
 * @method     ChildActividadObjetivo[]|ObjectCollection findByAcobRUsuario(int $acob_r_usuario) Return ChildActividadObjetivo objects filtered by the acob_r_usuario column
 * @method     ChildActividadObjetivo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ActividadObjetivoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ActividadObjetivoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ActividadObjetivo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildActividadObjetivoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildActividadObjetivoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildActividadObjetivoQuery) {
            return $criteria;
        }
        $query = new ChildActividadObjetivoQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$acob_c_actividad, $acob_c_objetivo] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildActividadObjetivo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ActividadObjetivoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ActividadObjetivoTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildActividadObjetivo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT acob_c_actividad, acob_c_objetivo, acob_cantidad_preguntas, acob_vigente, acob_r_fecha_creacion, acob_r_fecha_modificacion, acob_r_usuario FROM actividad_objetivo WHERE acob_c_actividad = :p0 AND acob_c_objetivo = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildActividadObjetivo $obj */
            $obj = new ChildActividadObjetivo();
            $obj->hydrate($row);
            ActividadObjetivoTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildActividadObjetivo|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the acob_c_actividad column
     *
     * Example usage:
     * <code>
     * $query->filterByAcobCActividad(1234); // WHERE acob_c_actividad = 1234
     * $query->filterByAcobCActividad(array(12, 34)); // WHERE acob_c_actividad IN (12, 34)
     * $query->filterByAcobCActividad(array('min' => 12)); // WHERE acob_c_actividad > 12
     * </code>
     *
     * @see       filterByActividad()
     *
     * @param     mixed $acobCActividad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function filterByAcobCActividad($acobCActividad = null, $comparison = null)
    {
        if (is_array($acobCActividad)) {
            $useMinMax = false;
            if (isset($acobCActividad['min'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD, $acobCActividad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($acobCActividad['max'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD, $acobCActividad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD, $acobCActividad, $comparison);
    }

    /**
     * Filter the query on the acob_c_objetivo column
     *
     * Example usage:
     * <code>
     * $query->filterByAcobCObjetivo(1234); // WHERE acob_c_objetivo = 1234
     * $query->filterByAcobCObjetivo(array(12, 34)); // WHERE acob_c_objetivo IN (12, 34)
     * $query->filterByAcobCObjetivo(array('min' => 12)); // WHERE acob_c_objetivo > 12
     * </code>
     *
     * @see       filterByObjetivo()
     *
     * @param     mixed $acobCObjetivo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function filterByAcobCObjetivo($acobCObjetivo = null, $comparison = null)
    {
        if (is_array($acobCObjetivo)) {
            $useMinMax = false;
            if (isset($acobCObjetivo['min'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO, $acobCObjetivo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($acobCObjetivo['max'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO, $acobCObjetivo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO, $acobCObjetivo, $comparison);
    }

    /**
     * Filter the query on the acob_cantidad_preguntas column
     *
     * Example usage:
     * <code>
     * $query->filterByAcobCantidadPreguntas(1234); // WHERE acob_cantidad_preguntas = 1234
     * $query->filterByAcobCantidadPreguntas(array(12, 34)); // WHERE acob_cantidad_preguntas IN (12, 34)
     * $query->filterByAcobCantidadPreguntas(array('min' => 12)); // WHERE acob_cantidad_preguntas > 12
     * </code>
     *
     * @param     mixed $acobCantidadPreguntas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function filterByAcobCantidadPreguntas($acobCantidadPreguntas = null, $comparison = null)
    {
        if (is_array($acobCantidadPreguntas)) {
            $useMinMax = false;
            if (isset($acobCantidadPreguntas['min'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_CANTIDAD_PREGUNTAS, $acobCantidadPreguntas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($acobCantidadPreguntas['max'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_CANTIDAD_PREGUNTAS, $acobCantidadPreguntas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_CANTIDAD_PREGUNTAS, $acobCantidadPreguntas, $comparison);
    }

    /**
     * Filter the query on the acob_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByAcobVigente(1234); // WHERE acob_vigente = 1234
     * $query->filterByAcobVigente(array(12, 34)); // WHERE acob_vigente IN (12, 34)
     * $query->filterByAcobVigente(array('min' => 12)); // WHERE acob_vigente > 12
     * </code>
     *
     * @param     mixed $acobVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function filterByAcobVigente($acobVigente = null, $comparison = null)
    {
        if (is_array($acobVigente)) {
            $useMinMax = false;
            if (isset($acobVigente['min'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_VIGENTE, $acobVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($acobVigente['max'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_VIGENTE, $acobVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_VIGENTE, $acobVigente, $comparison);
    }

    /**
     * Filter the query on the acob_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByAcobRFechaCreacion('2011-03-14'); // WHERE acob_r_fecha_creacion = '2011-03-14'
     * $query->filterByAcobRFechaCreacion('now'); // WHERE acob_r_fecha_creacion = '2011-03-14'
     * $query->filterByAcobRFechaCreacion(array('max' => 'yesterday')); // WHERE acob_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $acobRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function filterByAcobRFechaCreacion($acobRFechaCreacion = null, $comparison = null)
    {
        if (is_array($acobRFechaCreacion)) {
            $useMinMax = false;
            if (isset($acobRFechaCreacion['min'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_R_FECHA_CREACION, $acobRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($acobRFechaCreacion['max'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_R_FECHA_CREACION, $acobRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_R_FECHA_CREACION, $acobRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the acob_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByAcobRFechaModificacion('2011-03-14'); // WHERE acob_r_fecha_modificacion = '2011-03-14'
     * $query->filterByAcobRFechaModificacion('now'); // WHERE acob_r_fecha_modificacion = '2011-03-14'
     * $query->filterByAcobRFechaModificacion(array('max' => 'yesterday')); // WHERE acob_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $acobRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function filterByAcobRFechaModificacion($acobRFechaModificacion = null, $comparison = null)
    {
        if (is_array($acobRFechaModificacion)) {
            $useMinMax = false;
            if (isset($acobRFechaModificacion['min'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_R_FECHA_MODIFICACION, $acobRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($acobRFechaModificacion['max'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_R_FECHA_MODIFICACION, $acobRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_R_FECHA_MODIFICACION, $acobRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the acob_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByAcobRUsuario(1234); // WHERE acob_r_usuario = 1234
     * $query->filterByAcobRUsuario(array(12, 34)); // WHERE acob_r_usuario IN (12, 34)
     * $query->filterByAcobRUsuario(array('min' => 12)); // WHERE acob_r_usuario > 12
     * </code>
     *
     * @param     mixed $acobRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function filterByAcobRUsuario($acobRUsuario = null, $comparison = null)
    {
        if (is_array($acobRUsuario)) {
            $useMinMax = false;
            if (isset($acobRUsuario['min'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_R_USUARIO, $acobRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($acobRUsuario['max'])) {
                $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_R_USUARIO, $acobRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_R_USUARIO, $acobRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Actividad object
     *
     * @param \Actividad|ObjectCollection $actividad The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function filterByActividad($actividad, $comparison = null)
    {
        if ($actividad instanceof \Actividad) {
            return $this
                ->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD, $actividad->getActiCodigo(), $comparison);
        } elseif ($actividad instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD, $actividad->toKeyValue('PrimaryKey', 'ActiCodigo'), $comparison);
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
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function joinActividad($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useActividadQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActividad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Actividad', '\ActividadQuery');
    }

    /**
     * Filter the query by a related \Objetivo object
     *
     * @param \Objetivo|ObjectCollection $objetivo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function filterByObjetivo($objetivo, $comparison = null)
    {
        if ($objetivo instanceof \Objetivo) {
            return $this
                ->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO, $objetivo->getObjeCodigo(), $comparison);
        } elseif ($objetivo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO, $objetivo->toKeyValue('PrimaryKey', 'ObjeCodigo'), $comparison);
        } else {
            throw new PropelException('filterByObjetivo() only accepts arguments of type \Objetivo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Objetivo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function joinObjetivo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Objetivo');

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
            $this->addJoinObject($join, 'Objetivo');
        }

        return $this;
    }

    /**
     * Use the Objetivo relation Objetivo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ObjetivoQuery A secondary query class using the current class as primary query
     */
    public function useObjetivoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinObjetivo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Objetivo', '\ObjetivoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildActividadObjetivo $actividadObjetivo Object to remove from the list of results
     *
     * @return $this|ChildActividadObjetivoQuery The current query, for fluid interface
     */
    public function prune($actividadObjetivo = null)
    {
        if ($actividadObjetivo) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD), $actividadObjetivo->getAcobCActividad(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO), $actividadObjetivo->getAcobCObjetivo(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the actividad_objetivo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadObjetivoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ActividadObjetivoTableMap::clearInstancePool();
            ActividadObjetivoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadObjetivoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ActividadObjetivoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ActividadObjetivoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ActividadObjetivoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ActividadObjetivoQuery
