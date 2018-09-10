<?php

namespace Base;

use \EEvaluacionAplicada as ChildEEvaluacionAplicada;
use \EEvaluacionAplicadaQuery as ChildEEvaluacionAplicadaQuery;
use \Exception;
use \PDO;
use Map\EEvaluacionAplicadaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'e_evaluacion_aplicada' table.
 *
 *
 *
 * @method     ChildEEvaluacionAplicadaQuery orderByEevaEstado($order = Criteria::ASC) Order by the eeva_estado column
 * @method     ChildEEvaluacionAplicadaQuery orderByEevaDescripcion($order = Criteria::ASC) Order by the eeva_descripcion column
 * @method     ChildEEvaluacionAplicadaQuery orderByEevaVigente($order = Criteria::ASC) Order by the eeva_vigente column
 * @method     ChildEEvaluacionAplicadaQuery orderByEevaRFechaCreacion($order = Criteria::ASC) Order by the eeva_r_fecha_creacion column
 * @method     ChildEEvaluacionAplicadaQuery orderByEevaRFechaModificacion($order = Criteria::ASC) Order by the eeva_r_fecha_modificacion column
 * @method     ChildEEvaluacionAplicadaQuery orderByEevaRUsuario($order = Criteria::ASC) Order by the eeva_r_usuario column
 *
 * @method     ChildEEvaluacionAplicadaQuery groupByEevaEstado() Group by the eeva_estado column
 * @method     ChildEEvaluacionAplicadaQuery groupByEevaDescripcion() Group by the eeva_descripcion column
 * @method     ChildEEvaluacionAplicadaQuery groupByEevaVigente() Group by the eeva_vigente column
 * @method     ChildEEvaluacionAplicadaQuery groupByEevaRFechaCreacion() Group by the eeva_r_fecha_creacion column
 * @method     ChildEEvaluacionAplicadaQuery groupByEevaRFechaModificacion() Group by the eeva_r_fecha_modificacion column
 * @method     ChildEEvaluacionAplicadaQuery groupByEevaRUsuario() Group by the eeva_r_usuario column
 *
 * @method     ChildEEvaluacionAplicadaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEEvaluacionAplicadaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEEvaluacionAplicadaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEEvaluacionAplicadaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEEvaluacionAplicadaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEEvaluacionAplicadaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEEvaluacionAplicadaQuery leftJoinEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the EvaluacionAplicada relation
 * @method     ChildEEvaluacionAplicadaQuery rightJoinEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EvaluacionAplicada relation
 * @method     ChildEEvaluacionAplicadaQuery innerJoinEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the EvaluacionAplicada relation
 *
 * @method     ChildEEvaluacionAplicadaQuery joinWithEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EvaluacionAplicada relation
 *
 * @method     ChildEEvaluacionAplicadaQuery leftJoinWithEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the EvaluacionAplicada relation
 * @method     ChildEEvaluacionAplicadaQuery rightJoinWithEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the EvaluacionAplicada relation
 * @method     ChildEEvaluacionAplicadaQuery innerJoinWithEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the EvaluacionAplicada relation
 *
 * @method     \EvaluacionAplicadaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEEvaluacionAplicada findOne(ConnectionInterface $con = null) Return the first ChildEEvaluacionAplicada matching the query
 * @method     ChildEEvaluacionAplicada findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEEvaluacionAplicada matching the query, or a new ChildEEvaluacionAplicada object populated from the query conditions when no match is found
 *
 * @method     ChildEEvaluacionAplicada findOneByEevaEstado(int $eeva_estado) Return the first ChildEEvaluacionAplicada filtered by the eeva_estado column
 * @method     ChildEEvaluacionAplicada findOneByEevaDescripcion(string $eeva_descripcion) Return the first ChildEEvaluacionAplicada filtered by the eeva_descripcion column
 * @method     ChildEEvaluacionAplicada findOneByEevaVigente(int $eeva_vigente) Return the first ChildEEvaluacionAplicada filtered by the eeva_vigente column
 * @method     ChildEEvaluacionAplicada findOneByEevaRFechaCreacion(string $eeva_r_fecha_creacion) Return the first ChildEEvaluacionAplicada filtered by the eeva_r_fecha_creacion column
 * @method     ChildEEvaluacionAplicada findOneByEevaRFechaModificacion(string $eeva_r_fecha_modificacion) Return the first ChildEEvaluacionAplicada filtered by the eeva_r_fecha_modificacion column
 * @method     ChildEEvaluacionAplicada findOneByEevaRUsuario(int $eeva_r_usuario) Return the first ChildEEvaluacionAplicada filtered by the eeva_r_usuario column *

 * @method     ChildEEvaluacionAplicada requirePk($key, ConnectionInterface $con = null) Return the ChildEEvaluacionAplicada by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEEvaluacionAplicada requireOne(ConnectionInterface $con = null) Return the first ChildEEvaluacionAplicada matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEEvaluacionAplicada requireOneByEevaEstado(int $eeva_estado) Return the first ChildEEvaluacionAplicada filtered by the eeva_estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEEvaluacionAplicada requireOneByEevaDescripcion(string $eeva_descripcion) Return the first ChildEEvaluacionAplicada filtered by the eeva_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEEvaluacionAplicada requireOneByEevaVigente(int $eeva_vigente) Return the first ChildEEvaluacionAplicada filtered by the eeva_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEEvaluacionAplicada requireOneByEevaRFechaCreacion(string $eeva_r_fecha_creacion) Return the first ChildEEvaluacionAplicada filtered by the eeva_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEEvaluacionAplicada requireOneByEevaRFechaModificacion(string $eeva_r_fecha_modificacion) Return the first ChildEEvaluacionAplicada filtered by the eeva_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEEvaluacionAplicada requireOneByEevaRUsuario(int $eeva_r_usuario) Return the first ChildEEvaluacionAplicada filtered by the eeva_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEEvaluacionAplicada[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEEvaluacionAplicada objects based on current ModelCriteria
 * @method     ChildEEvaluacionAplicada[]|ObjectCollection findByEevaEstado(int $eeva_estado) Return ChildEEvaluacionAplicada objects filtered by the eeva_estado column
 * @method     ChildEEvaluacionAplicada[]|ObjectCollection findByEevaDescripcion(string $eeva_descripcion) Return ChildEEvaluacionAplicada objects filtered by the eeva_descripcion column
 * @method     ChildEEvaluacionAplicada[]|ObjectCollection findByEevaVigente(int $eeva_vigente) Return ChildEEvaluacionAplicada objects filtered by the eeva_vigente column
 * @method     ChildEEvaluacionAplicada[]|ObjectCollection findByEevaRFechaCreacion(string $eeva_r_fecha_creacion) Return ChildEEvaluacionAplicada objects filtered by the eeva_r_fecha_creacion column
 * @method     ChildEEvaluacionAplicada[]|ObjectCollection findByEevaRFechaModificacion(string $eeva_r_fecha_modificacion) Return ChildEEvaluacionAplicada objects filtered by the eeva_r_fecha_modificacion column
 * @method     ChildEEvaluacionAplicada[]|ObjectCollection findByEevaRUsuario(int $eeva_r_usuario) Return ChildEEvaluacionAplicada objects filtered by the eeva_r_usuario column
 * @method     ChildEEvaluacionAplicada[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EEvaluacionAplicadaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EEvaluacionAplicadaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\EEvaluacionAplicada', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEEvaluacionAplicadaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEEvaluacionAplicadaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEEvaluacionAplicadaQuery) {
            return $criteria;
        }
        $query = new ChildEEvaluacionAplicadaQuery();
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
     * @return ChildEEvaluacionAplicada|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EEvaluacionAplicadaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEEvaluacionAplicada A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT eeva_estado, eeva_descripcion, eeva_vigente, eeva_r_fecha_creacion, eeva_r_fecha_modificacion, eeva_r_usuario FROM e_evaluacion_aplicada WHERE eeva_estado = :p0';
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
            /** @var ChildEEvaluacionAplicada $obj */
            $obj = new ChildEEvaluacionAplicada();
            $obj->hydrate($row);
            EEvaluacionAplicadaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEEvaluacionAplicada|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_ESTADO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_ESTADO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the eeva_estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEevaEstado(1234); // WHERE eeva_estado = 1234
     * $query->filterByEevaEstado(array(12, 34)); // WHERE eeva_estado IN (12, 34)
     * $query->filterByEevaEstado(array('min' => 12)); // WHERE eeva_estado > 12
     * </code>
     *
     * @param     mixed $eevaEstado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEevaEstado($eevaEstado = null, $comparison = null)
    {
        if (is_array($eevaEstado)) {
            $useMinMax = false;
            if (isset($eevaEstado['min'])) {
                $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_ESTADO, $eevaEstado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eevaEstado['max'])) {
                $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_ESTADO, $eevaEstado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_ESTADO, $eevaEstado, $comparison);
    }

    /**
     * Filter the query on the eeva_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEevaDescripcion('fooValue');   // WHERE eeva_descripcion = 'fooValue'
     * $query->filterByEevaDescripcion('%fooValue%', Criteria::LIKE); // WHERE eeva_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eevaDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEevaDescripcion($eevaDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eevaDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_DESCRIPCION, $eevaDescripcion, $comparison);
    }

    /**
     * Filter the query on the eeva_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByEevaVigente(1234); // WHERE eeva_vigente = 1234
     * $query->filterByEevaVigente(array(12, 34)); // WHERE eeva_vigente IN (12, 34)
     * $query->filterByEevaVigente(array('min' => 12)); // WHERE eeva_vigente > 12
     * </code>
     *
     * @param     mixed $eevaVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEevaVigente($eevaVigente = null, $comparison = null)
    {
        if (is_array($eevaVigente)) {
            $useMinMax = false;
            if (isset($eevaVigente['min'])) {
                $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_VIGENTE, $eevaVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eevaVigente['max'])) {
                $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_VIGENTE, $eevaVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_VIGENTE, $eevaVigente, $comparison);
    }

    /**
     * Filter the query on the eeva_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEevaRFechaCreacion('2011-03-14'); // WHERE eeva_r_fecha_creacion = '2011-03-14'
     * $query->filterByEevaRFechaCreacion('now'); // WHERE eeva_r_fecha_creacion = '2011-03-14'
     * $query->filterByEevaRFechaCreacion(array('max' => 'yesterday')); // WHERE eeva_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $eevaRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEevaRFechaCreacion($eevaRFechaCreacion = null, $comparison = null)
    {
        if (is_array($eevaRFechaCreacion)) {
            $useMinMax = false;
            if (isset($eevaRFechaCreacion['min'])) {
                $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_R_FECHA_CREACION, $eevaRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eevaRFechaCreacion['max'])) {
                $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_R_FECHA_CREACION, $eevaRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_R_FECHA_CREACION, $eevaRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the eeva_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEevaRFechaModificacion('2011-03-14'); // WHERE eeva_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEevaRFechaModificacion('now'); // WHERE eeva_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEevaRFechaModificacion(array('max' => 'yesterday')); // WHERE eeva_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $eevaRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEevaRFechaModificacion($eevaRFechaModificacion = null, $comparison = null)
    {
        if (is_array($eevaRFechaModificacion)) {
            $useMinMax = false;
            if (isset($eevaRFechaModificacion['min'])) {
                $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_R_FECHA_MODIFICACION, $eevaRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eevaRFechaModificacion['max'])) {
                $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_R_FECHA_MODIFICACION, $eevaRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_R_FECHA_MODIFICACION, $eevaRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the eeva_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEevaRUsuario(1234); // WHERE eeva_r_usuario = 1234
     * $query->filterByEevaRUsuario(array(12, 34)); // WHERE eeva_r_usuario IN (12, 34)
     * $query->filterByEevaRUsuario(array('min' => 12)); // WHERE eeva_r_usuario > 12
     * </code>
     *
     * @param     mixed $eevaRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEevaRUsuario($eevaRUsuario = null, $comparison = null)
    {
        if (is_array($eevaRUsuario)) {
            $useMinMax = false;
            if (isset($eevaRUsuario['min'])) {
                $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_R_USUARIO, $eevaRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eevaRUsuario['max'])) {
                $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_R_USUARIO, $eevaRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_R_USUARIO, $eevaRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \EvaluacionAplicada object
     *
     * @param \EvaluacionAplicada|ObjectCollection $evaluacionAplicada the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvaluacionAplicada($evaluacionAplicada, $comparison = null)
    {
        if ($evaluacionAplicada instanceof \EvaluacionAplicada) {
            return $this
                ->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_ESTADO, $evaluacionAplicada->getEvapEEvaluacionAplicada(), $comparison);
        } elseif ($evaluacionAplicada instanceof ObjectCollection) {
            return $this
                ->useEvaluacionAplicadaQuery()
                ->filterByPrimaryKeys($evaluacionAplicada->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEvaluacionAplicada() only accepts arguments of type \EvaluacionAplicada or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EvaluacionAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function joinEvaluacionAplicada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EvaluacionAplicada');

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
            $this->addJoinObject($join, 'EvaluacionAplicada');
        }

        return $this;
    }

    /**
     * Use the EvaluacionAplicada relation EvaluacionAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EvaluacionAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useEvaluacionAplicadaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEvaluacionAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EvaluacionAplicada', '\EvaluacionAplicadaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEEvaluacionAplicada $eEvaluacionAplicada Object to remove from the list of results
     *
     * @return $this|ChildEEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function prune($eEvaluacionAplicada = null)
    {
        if ($eEvaluacionAplicada) {
            $this->addUsingAlias(EEvaluacionAplicadaTableMap::COL_EEVA_ESTADO, $eEvaluacionAplicada->getEevaEstado(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the e_evaluacion_aplicada table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EEvaluacionAplicadaTableMap::clearInstancePool();
            EEvaluacionAplicadaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EEvaluacionAplicadaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EEvaluacionAplicadaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EEvaluacionAplicadaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EEvaluacionAplicadaQuery
