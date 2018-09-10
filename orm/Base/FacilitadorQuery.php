<?php

namespace Base;

use \Facilitador as ChildFacilitador;
use \FacilitadorQuery as ChildFacilitadorQuery;
use \Exception;
use \PDO;
use Map\FacilitadorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'facilitador' table.
 *
 *
 *
 * @method     ChildFacilitadorQuery orderByFaciCActividad($order = Criteria::ASC) Order by the faci_c_actividad column
 * @method     ChildFacilitadorQuery orderByFaciNumeroDictacion($order = Criteria::ASC) Order by the faci_numero_dictacion column
 * @method     ChildFacilitadorQuery orderByFaciCPersona($order = Criteria::ASC) Order by the faci_c_persona column
 * @method     ChildFacilitadorQuery orderByFaciRFechaCreacion($order = Criteria::ASC) Order by the faci_r_fecha_creacion column
 * @method     ChildFacilitadorQuery orderByFaciRFechaModificacion($order = Criteria::ASC) Order by the faci_r_fecha_modificacion column
 * @method     ChildFacilitadorQuery orderByFaciRUsuario($order = Criteria::ASC) Order by the faci_r_usuario column
 *
 * @method     ChildFacilitadorQuery groupByFaciCActividad() Group by the faci_c_actividad column
 * @method     ChildFacilitadorQuery groupByFaciNumeroDictacion() Group by the faci_numero_dictacion column
 * @method     ChildFacilitadorQuery groupByFaciCPersona() Group by the faci_c_persona column
 * @method     ChildFacilitadorQuery groupByFaciRFechaCreacion() Group by the faci_r_fecha_creacion column
 * @method     ChildFacilitadorQuery groupByFaciRFechaModificacion() Group by the faci_r_fecha_modificacion column
 * @method     ChildFacilitadorQuery groupByFaciRUsuario() Group by the faci_r_usuario column
 *
 * @method     ChildFacilitadorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFacilitadorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFacilitadorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFacilitadorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFacilitadorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFacilitadorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFacilitadorQuery leftJoinDictacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dictacion relation
 * @method     ChildFacilitadorQuery rightJoinDictacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dictacion relation
 * @method     ChildFacilitadorQuery innerJoinDictacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Dictacion relation
 *
 * @method     ChildFacilitadorQuery joinWithDictacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dictacion relation
 *
 * @method     ChildFacilitadorQuery leftJoinWithDictacion() Adds a LEFT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildFacilitadorQuery rightJoinWithDictacion() Adds a RIGHT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildFacilitadorQuery innerJoinWithDictacion() Adds a INNER JOIN clause and with to the query using the Dictacion relation
 *
 * @method     ChildFacilitadorQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     ChildFacilitadorQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     ChildFacilitadorQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     ChildFacilitadorQuery joinWithPersona($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Persona relation
 *
 * @method     ChildFacilitadorQuery leftJoinWithPersona() Adds a LEFT JOIN clause and with to the query using the Persona relation
 * @method     ChildFacilitadorQuery rightJoinWithPersona() Adds a RIGHT JOIN clause and with to the query using the Persona relation
 * @method     ChildFacilitadorQuery innerJoinWithPersona() Adds a INNER JOIN clause and with to the query using the Persona relation
 *
 * @method     \DictacionQuery|\PersonaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFacilitador findOne(ConnectionInterface $con = null) Return the first ChildFacilitador matching the query
 * @method     ChildFacilitador findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFacilitador matching the query, or a new ChildFacilitador object populated from the query conditions when no match is found
 *
 * @method     ChildFacilitador findOneByFaciCActividad(int $faci_c_actividad) Return the first ChildFacilitador filtered by the faci_c_actividad column
 * @method     ChildFacilitador findOneByFaciNumeroDictacion(int $faci_numero_dictacion) Return the first ChildFacilitador filtered by the faci_numero_dictacion column
 * @method     ChildFacilitador findOneByFaciCPersona(int $faci_c_persona) Return the first ChildFacilitador filtered by the faci_c_persona column
 * @method     ChildFacilitador findOneByFaciRFechaCreacion(string $faci_r_fecha_creacion) Return the first ChildFacilitador filtered by the faci_r_fecha_creacion column
 * @method     ChildFacilitador findOneByFaciRFechaModificacion(string $faci_r_fecha_modificacion) Return the first ChildFacilitador filtered by the faci_r_fecha_modificacion column
 * @method     ChildFacilitador findOneByFaciRUsuario(int $faci_r_usuario) Return the first ChildFacilitador filtered by the faci_r_usuario column *

 * @method     ChildFacilitador requirePk($key, ConnectionInterface $con = null) Return the ChildFacilitador by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFacilitador requireOne(ConnectionInterface $con = null) Return the first ChildFacilitador matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFacilitador requireOneByFaciCActividad(int $faci_c_actividad) Return the first ChildFacilitador filtered by the faci_c_actividad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFacilitador requireOneByFaciNumeroDictacion(int $faci_numero_dictacion) Return the first ChildFacilitador filtered by the faci_numero_dictacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFacilitador requireOneByFaciCPersona(int $faci_c_persona) Return the first ChildFacilitador filtered by the faci_c_persona column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFacilitador requireOneByFaciRFechaCreacion(string $faci_r_fecha_creacion) Return the first ChildFacilitador filtered by the faci_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFacilitador requireOneByFaciRFechaModificacion(string $faci_r_fecha_modificacion) Return the first ChildFacilitador filtered by the faci_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFacilitador requireOneByFaciRUsuario(int $faci_r_usuario) Return the first ChildFacilitador filtered by the faci_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFacilitador[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFacilitador objects based on current ModelCriteria
 * @method     ChildFacilitador[]|ObjectCollection findByFaciCActividad(int $faci_c_actividad) Return ChildFacilitador objects filtered by the faci_c_actividad column
 * @method     ChildFacilitador[]|ObjectCollection findByFaciNumeroDictacion(int $faci_numero_dictacion) Return ChildFacilitador objects filtered by the faci_numero_dictacion column
 * @method     ChildFacilitador[]|ObjectCollection findByFaciCPersona(int $faci_c_persona) Return ChildFacilitador objects filtered by the faci_c_persona column
 * @method     ChildFacilitador[]|ObjectCollection findByFaciRFechaCreacion(string $faci_r_fecha_creacion) Return ChildFacilitador objects filtered by the faci_r_fecha_creacion column
 * @method     ChildFacilitador[]|ObjectCollection findByFaciRFechaModificacion(string $faci_r_fecha_modificacion) Return ChildFacilitador objects filtered by the faci_r_fecha_modificacion column
 * @method     ChildFacilitador[]|ObjectCollection findByFaciRUsuario(int $faci_r_usuario) Return ChildFacilitador objects filtered by the faci_r_usuario column
 * @method     ChildFacilitador[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FacilitadorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FacilitadorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Facilitador', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFacilitadorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFacilitadorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFacilitadorQuery) {
            return $criteria;
        }
        $query = new ChildFacilitadorQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$faci_c_actividad, $faci_numero_dictacion, $faci_c_persona] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildFacilitador|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FacilitadorTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FacilitadorTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildFacilitador A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT faci_c_actividad, faci_numero_dictacion, faci_c_persona, faci_r_fecha_creacion, faci_r_fecha_modificacion, faci_r_usuario FROM facilitador WHERE faci_c_actividad = :p0 AND faci_numero_dictacion = :p1 AND faci_c_persona = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildFacilitador $obj */
            $obj = new ChildFacilitador();
            $obj->hydrate($row);
            FacilitadorTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildFacilitador|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFacilitadorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(FacilitadorTableMap::COL_FACI_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(FacilitadorTableMap::COL_FACI_NUMERO_DICTACION, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(FacilitadorTableMap::COL_FACI_C_PERSONA, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFacilitadorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(FacilitadorTableMap::COL_FACI_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(FacilitadorTableMap::COL_FACI_NUMERO_DICTACION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(FacilitadorTableMap::COL_FACI_C_PERSONA, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the faci_c_actividad column
     *
     * Example usage:
     * <code>
     * $query->filterByFaciCActividad(1234); // WHERE faci_c_actividad = 1234
     * $query->filterByFaciCActividad(array(12, 34)); // WHERE faci_c_actividad IN (12, 34)
     * $query->filterByFaciCActividad(array('min' => 12)); // WHERE faci_c_actividad > 12
     * </code>
     *
     * @see       filterByDictacion()
     *
     * @param     mixed $faciCActividad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacilitadorQuery The current query, for fluid interface
     */
    public function filterByFaciCActividad($faciCActividad = null, $comparison = null)
    {
        if (is_array($faciCActividad)) {
            $useMinMax = false;
            if (isset($faciCActividad['min'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_C_ACTIVIDAD, $faciCActividad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($faciCActividad['max'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_C_ACTIVIDAD, $faciCActividad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacilitadorTableMap::COL_FACI_C_ACTIVIDAD, $faciCActividad, $comparison);
    }

    /**
     * Filter the query on the faci_numero_dictacion column
     *
     * Example usage:
     * <code>
     * $query->filterByFaciNumeroDictacion(1234); // WHERE faci_numero_dictacion = 1234
     * $query->filterByFaciNumeroDictacion(array(12, 34)); // WHERE faci_numero_dictacion IN (12, 34)
     * $query->filterByFaciNumeroDictacion(array('min' => 12)); // WHERE faci_numero_dictacion > 12
     * </code>
     *
     * @see       filterByDictacion()
     *
     * @param     mixed $faciNumeroDictacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacilitadorQuery The current query, for fluid interface
     */
    public function filterByFaciNumeroDictacion($faciNumeroDictacion = null, $comparison = null)
    {
        if (is_array($faciNumeroDictacion)) {
            $useMinMax = false;
            if (isset($faciNumeroDictacion['min'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_NUMERO_DICTACION, $faciNumeroDictacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($faciNumeroDictacion['max'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_NUMERO_DICTACION, $faciNumeroDictacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacilitadorTableMap::COL_FACI_NUMERO_DICTACION, $faciNumeroDictacion, $comparison);
    }

    /**
     * Filter the query on the faci_c_persona column
     *
     * Example usage:
     * <code>
     * $query->filterByFaciCPersona(1234); // WHERE faci_c_persona = 1234
     * $query->filterByFaciCPersona(array(12, 34)); // WHERE faci_c_persona IN (12, 34)
     * $query->filterByFaciCPersona(array('min' => 12)); // WHERE faci_c_persona > 12
     * </code>
     *
     * @see       filterByPersona()
     *
     * @param     mixed $faciCPersona The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacilitadorQuery The current query, for fluid interface
     */
    public function filterByFaciCPersona($faciCPersona = null, $comparison = null)
    {
        if (is_array($faciCPersona)) {
            $useMinMax = false;
            if (isset($faciCPersona['min'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_C_PERSONA, $faciCPersona['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($faciCPersona['max'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_C_PERSONA, $faciCPersona['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacilitadorTableMap::COL_FACI_C_PERSONA, $faciCPersona, $comparison);
    }

    /**
     * Filter the query on the faci_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByFaciRFechaCreacion('2011-03-14'); // WHERE faci_r_fecha_creacion = '2011-03-14'
     * $query->filterByFaciRFechaCreacion('now'); // WHERE faci_r_fecha_creacion = '2011-03-14'
     * $query->filterByFaciRFechaCreacion(array('max' => 'yesterday')); // WHERE faci_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $faciRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacilitadorQuery The current query, for fluid interface
     */
    public function filterByFaciRFechaCreacion($faciRFechaCreacion = null, $comparison = null)
    {
        if (is_array($faciRFechaCreacion)) {
            $useMinMax = false;
            if (isset($faciRFechaCreacion['min'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_R_FECHA_CREACION, $faciRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($faciRFechaCreacion['max'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_R_FECHA_CREACION, $faciRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacilitadorTableMap::COL_FACI_R_FECHA_CREACION, $faciRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the faci_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByFaciRFechaModificacion('2011-03-14'); // WHERE faci_r_fecha_modificacion = '2011-03-14'
     * $query->filterByFaciRFechaModificacion('now'); // WHERE faci_r_fecha_modificacion = '2011-03-14'
     * $query->filterByFaciRFechaModificacion(array('max' => 'yesterday')); // WHERE faci_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $faciRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacilitadorQuery The current query, for fluid interface
     */
    public function filterByFaciRFechaModificacion($faciRFechaModificacion = null, $comparison = null)
    {
        if (is_array($faciRFechaModificacion)) {
            $useMinMax = false;
            if (isset($faciRFechaModificacion['min'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_R_FECHA_MODIFICACION, $faciRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($faciRFechaModificacion['max'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_R_FECHA_MODIFICACION, $faciRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacilitadorTableMap::COL_FACI_R_FECHA_MODIFICACION, $faciRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the faci_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByFaciRUsuario(1234); // WHERE faci_r_usuario = 1234
     * $query->filterByFaciRUsuario(array(12, 34)); // WHERE faci_r_usuario IN (12, 34)
     * $query->filterByFaciRUsuario(array('min' => 12)); // WHERE faci_r_usuario > 12
     * </code>
     *
     * @param     mixed $faciRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFacilitadorQuery The current query, for fluid interface
     */
    public function filterByFaciRUsuario($faciRUsuario = null, $comparison = null)
    {
        if (is_array($faciRUsuario)) {
            $useMinMax = false;
            if (isset($faciRUsuario['min'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_R_USUARIO, $faciRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($faciRUsuario['max'])) {
                $this->addUsingAlias(FacilitadorTableMap::COL_FACI_R_USUARIO, $faciRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FacilitadorTableMap::COL_FACI_R_USUARIO, $faciRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Dictacion object
     *
     * @param \Dictacion $dictacion The related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFacilitadorQuery The current query, for fluid interface
     */
    public function filterByDictacion($dictacion, $comparison = null)
    {
        if ($dictacion instanceof \Dictacion) {
            return $this
                ->addUsingAlias(FacilitadorTableMap::COL_FACI_C_ACTIVIDAD, $dictacion->getDictCActividad(), $comparison)
                ->addUsingAlias(FacilitadorTableMap::COL_FACI_NUMERO_DICTACION, $dictacion->getDictNumero(), $comparison);
        } else {
            throw new PropelException('filterByDictacion() only accepts arguments of type \Dictacion');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dictacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFacilitadorQuery The current query, for fluid interface
     */
    public function joinDictacion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useDictacionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDictacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dictacion', '\DictacionQuery');
    }

    /**
     * Filter the query by a related \Persona object
     *
     * @param \Persona|ObjectCollection $persona The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFacilitadorQuery The current query, for fluid interface
     */
    public function filterByPersona($persona, $comparison = null)
    {
        if ($persona instanceof \Persona) {
            return $this
                ->addUsingAlias(FacilitadorTableMap::COL_FACI_C_PERSONA, $persona->getPersCodigo(), $comparison);
        } elseif ($persona instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FacilitadorTableMap::COL_FACI_C_PERSONA, $persona->toKeyValue('PrimaryKey', 'PersCodigo'), $comparison);
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
     * @return $this|ChildFacilitadorQuery The current query, for fluid interface
     */
    public function joinPersona($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function usePersonaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersona($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Persona', '\PersonaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFacilitador $facilitador Object to remove from the list of results
     *
     * @return $this|ChildFacilitadorQuery The current query, for fluid interface
     */
    public function prune($facilitador = null)
    {
        if ($facilitador) {
            $this->addCond('pruneCond0', $this->getAliasedColName(FacilitadorTableMap::COL_FACI_C_ACTIVIDAD), $facilitador->getFaciCActividad(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(FacilitadorTableMap::COL_FACI_NUMERO_DICTACION), $facilitador->getFaciNumeroDictacion(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(FacilitadorTableMap::COL_FACI_C_PERSONA), $facilitador->getFaciCPersona(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the facilitador table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FacilitadorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FacilitadorTableMap::clearInstancePool();
            FacilitadorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FacilitadorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FacilitadorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FacilitadorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FacilitadorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FacilitadorQuery
