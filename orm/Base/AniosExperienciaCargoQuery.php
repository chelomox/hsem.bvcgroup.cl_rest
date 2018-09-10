<?php

namespace Base;

use \AniosExperienciaCargo as ChildAniosExperienciaCargo;
use \AniosExperienciaCargoQuery as ChildAniosExperienciaCargoQuery;
use \Exception;
use \PDO;
use Map\AniosExperienciaCargoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'anios_experiencia_cargo' table.
 *
 *
 *
 * @method     ChildAniosExperienciaCargoQuery orderByAnexcaCodigo($order = Criteria::ASC) Order by the anexca_codigo column
 * @method     ChildAniosExperienciaCargoQuery orderByAnexcaDescripcion($order = Criteria::ASC) Order by the anexca_descripcion column
 * @method     ChildAniosExperienciaCargoQuery orderByAnexcaVigente($order = Criteria::ASC) Order by the anexca_vigente column
 * @method     ChildAniosExperienciaCargoQuery orderByAnexcaRFechaCreacion($order = Criteria::ASC) Order by the anexca_r_fecha_creacion column
 * @method     ChildAniosExperienciaCargoQuery orderByAnexcaRFechaModificacion($order = Criteria::ASC) Order by the anexca_r_fecha_modificacion column
 * @method     ChildAniosExperienciaCargoQuery orderByAnexcaRUsuario($order = Criteria::ASC) Order by the anexca_r_usuario column
 *
 * @method     ChildAniosExperienciaCargoQuery groupByAnexcaCodigo() Group by the anexca_codigo column
 * @method     ChildAniosExperienciaCargoQuery groupByAnexcaDescripcion() Group by the anexca_descripcion column
 * @method     ChildAniosExperienciaCargoQuery groupByAnexcaVigente() Group by the anexca_vigente column
 * @method     ChildAniosExperienciaCargoQuery groupByAnexcaRFechaCreacion() Group by the anexca_r_fecha_creacion column
 * @method     ChildAniosExperienciaCargoQuery groupByAnexcaRFechaModificacion() Group by the anexca_r_fecha_modificacion column
 * @method     ChildAniosExperienciaCargoQuery groupByAnexcaRUsuario() Group by the anexca_r_usuario column
 *
 * @method     ChildAniosExperienciaCargoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAniosExperienciaCargoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAniosExperienciaCargoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAniosExperienciaCargoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAniosExperienciaCargoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAniosExperienciaCargoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAniosExperienciaCargoQuery leftJoinTrabajador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trabajador relation
 * @method     ChildAniosExperienciaCargoQuery rightJoinTrabajador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trabajador relation
 * @method     ChildAniosExperienciaCargoQuery innerJoinTrabajador($relationAlias = null) Adds a INNER JOIN clause to the query using the Trabajador relation
 *
 * @method     ChildAniosExperienciaCargoQuery joinWithTrabajador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Trabajador relation
 *
 * @method     ChildAniosExperienciaCargoQuery leftJoinWithTrabajador() Adds a LEFT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildAniosExperienciaCargoQuery rightJoinWithTrabajador() Adds a RIGHT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildAniosExperienciaCargoQuery innerJoinWithTrabajador() Adds a INNER JOIN clause and with to the query using the Trabajador relation
 *
 * @method     \TrabajadorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAniosExperienciaCargo findOne(ConnectionInterface $con = null) Return the first ChildAniosExperienciaCargo matching the query
 * @method     ChildAniosExperienciaCargo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAniosExperienciaCargo matching the query, or a new ChildAniosExperienciaCargo object populated from the query conditions when no match is found
 *
 * @method     ChildAniosExperienciaCargo findOneByAnexcaCodigo(int $anexca_codigo) Return the first ChildAniosExperienciaCargo filtered by the anexca_codigo column
 * @method     ChildAniosExperienciaCargo findOneByAnexcaDescripcion(string $anexca_descripcion) Return the first ChildAniosExperienciaCargo filtered by the anexca_descripcion column
 * @method     ChildAniosExperienciaCargo findOneByAnexcaVigente(int $anexca_vigente) Return the first ChildAniosExperienciaCargo filtered by the anexca_vigente column
 * @method     ChildAniosExperienciaCargo findOneByAnexcaRFechaCreacion(string $anexca_r_fecha_creacion) Return the first ChildAniosExperienciaCargo filtered by the anexca_r_fecha_creacion column
 * @method     ChildAniosExperienciaCargo findOneByAnexcaRFechaModificacion(string $anexca_r_fecha_modificacion) Return the first ChildAniosExperienciaCargo filtered by the anexca_r_fecha_modificacion column
 * @method     ChildAniosExperienciaCargo findOneByAnexcaRUsuario(int $anexca_r_usuario) Return the first ChildAniosExperienciaCargo filtered by the anexca_r_usuario column *

 * @method     ChildAniosExperienciaCargo requirePk($key, ConnectionInterface $con = null) Return the ChildAniosExperienciaCargo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAniosExperienciaCargo requireOne(ConnectionInterface $con = null) Return the first ChildAniosExperienciaCargo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAniosExperienciaCargo requireOneByAnexcaCodigo(int $anexca_codigo) Return the first ChildAniosExperienciaCargo filtered by the anexca_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAniosExperienciaCargo requireOneByAnexcaDescripcion(string $anexca_descripcion) Return the first ChildAniosExperienciaCargo filtered by the anexca_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAniosExperienciaCargo requireOneByAnexcaVigente(int $anexca_vigente) Return the first ChildAniosExperienciaCargo filtered by the anexca_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAniosExperienciaCargo requireOneByAnexcaRFechaCreacion(string $anexca_r_fecha_creacion) Return the first ChildAniosExperienciaCargo filtered by the anexca_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAniosExperienciaCargo requireOneByAnexcaRFechaModificacion(string $anexca_r_fecha_modificacion) Return the first ChildAniosExperienciaCargo filtered by the anexca_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAniosExperienciaCargo requireOneByAnexcaRUsuario(int $anexca_r_usuario) Return the first ChildAniosExperienciaCargo filtered by the anexca_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAniosExperienciaCargo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAniosExperienciaCargo objects based on current ModelCriteria
 * @method     ChildAniosExperienciaCargo[]|ObjectCollection findByAnexcaCodigo(int $anexca_codigo) Return ChildAniosExperienciaCargo objects filtered by the anexca_codigo column
 * @method     ChildAniosExperienciaCargo[]|ObjectCollection findByAnexcaDescripcion(string $anexca_descripcion) Return ChildAniosExperienciaCargo objects filtered by the anexca_descripcion column
 * @method     ChildAniosExperienciaCargo[]|ObjectCollection findByAnexcaVigente(int $anexca_vigente) Return ChildAniosExperienciaCargo objects filtered by the anexca_vigente column
 * @method     ChildAniosExperienciaCargo[]|ObjectCollection findByAnexcaRFechaCreacion(string $anexca_r_fecha_creacion) Return ChildAniosExperienciaCargo objects filtered by the anexca_r_fecha_creacion column
 * @method     ChildAniosExperienciaCargo[]|ObjectCollection findByAnexcaRFechaModificacion(string $anexca_r_fecha_modificacion) Return ChildAniosExperienciaCargo objects filtered by the anexca_r_fecha_modificacion column
 * @method     ChildAniosExperienciaCargo[]|ObjectCollection findByAnexcaRUsuario(int $anexca_r_usuario) Return ChildAniosExperienciaCargo objects filtered by the anexca_r_usuario column
 * @method     ChildAniosExperienciaCargo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AniosExperienciaCargoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AniosExperienciaCargoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AniosExperienciaCargo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAniosExperienciaCargoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAniosExperienciaCargoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAniosExperienciaCargoQuery) {
            return $criteria;
        }
        $query = new ChildAniosExperienciaCargoQuery();
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
     * @return ChildAniosExperienciaCargo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AniosExperienciaCargoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AniosExperienciaCargoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAniosExperienciaCargo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT anexca_codigo, anexca_descripcion, anexca_vigente, anexca_r_fecha_creacion, anexca_r_fecha_modificacion, anexca_r_usuario FROM anios_experiencia_cargo WHERE anexca_codigo = :p0';
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
            /** @var ChildAniosExperienciaCargo $obj */
            $obj = new ChildAniosExperienciaCargo();
            $obj->hydrate($row);
            AniosExperienciaCargoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAniosExperienciaCargo|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAniosExperienciaCargoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAniosExperienciaCargoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the anexca_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByAnexcaCodigo(1234); // WHERE anexca_codigo = 1234
     * $query->filterByAnexcaCodigo(array(12, 34)); // WHERE anexca_codigo IN (12, 34)
     * $query->filterByAnexcaCodigo(array('min' => 12)); // WHERE anexca_codigo > 12
     * </code>
     *
     * @param     mixed $anexcaCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAniosExperienciaCargoQuery The current query, for fluid interface
     */
    public function filterByAnexcaCodigo($anexcaCodigo = null, $comparison = null)
    {
        if (is_array($anexcaCodigo)) {
            $useMinMax = false;
            if (isset($anexcaCodigo['min'])) {
                $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO, $anexcaCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($anexcaCodigo['max'])) {
                $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO, $anexcaCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO, $anexcaCodigo, $comparison);
    }

    /**
     * Filter the query on the anexca_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByAnexcaDescripcion('fooValue');   // WHERE anexca_descripcion = 'fooValue'
     * $query->filterByAnexcaDescripcion('%fooValue%', Criteria::LIKE); // WHERE anexca_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $anexcaDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAniosExperienciaCargoQuery The current query, for fluid interface
     */
    public function filterByAnexcaDescripcion($anexcaDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($anexcaDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_DESCRIPCION, $anexcaDescripcion, $comparison);
    }

    /**
     * Filter the query on the anexca_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByAnexcaVigente(1234); // WHERE anexca_vigente = 1234
     * $query->filterByAnexcaVigente(array(12, 34)); // WHERE anexca_vigente IN (12, 34)
     * $query->filterByAnexcaVigente(array('min' => 12)); // WHERE anexca_vigente > 12
     * </code>
     *
     * @param     mixed $anexcaVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAniosExperienciaCargoQuery The current query, for fluid interface
     */
    public function filterByAnexcaVigente($anexcaVigente = null, $comparison = null)
    {
        if (is_array($anexcaVigente)) {
            $useMinMax = false;
            if (isset($anexcaVigente['min'])) {
                $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_VIGENTE, $anexcaVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($anexcaVigente['max'])) {
                $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_VIGENTE, $anexcaVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_VIGENTE, $anexcaVigente, $comparison);
    }

    /**
     * Filter the query on the anexca_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByAnexcaRFechaCreacion('2011-03-14'); // WHERE anexca_r_fecha_creacion = '2011-03-14'
     * $query->filterByAnexcaRFechaCreacion('now'); // WHERE anexca_r_fecha_creacion = '2011-03-14'
     * $query->filterByAnexcaRFechaCreacion(array('max' => 'yesterday')); // WHERE anexca_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $anexcaRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAniosExperienciaCargoQuery The current query, for fluid interface
     */
    public function filterByAnexcaRFechaCreacion($anexcaRFechaCreacion = null, $comparison = null)
    {
        if (is_array($anexcaRFechaCreacion)) {
            $useMinMax = false;
            if (isset($anexcaRFechaCreacion['min'])) {
                $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_CREACION, $anexcaRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($anexcaRFechaCreacion['max'])) {
                $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_CREACION, $anexcaRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_CREACION, $anexcaRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the anexca_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByAnexcaRFechaModificacion('2011-03-14'); // WHERE anexca_r_fecha_modificacion = '2011-03-14'
     * $query->filterByAnexcaRFechaModificacion('now'); // WHERE anexca_r_fecha_modificacion = '2011-03-14'
     * $query->filterByAnexcaRFechaModificacion(array('max' => 'yesterday')); // WHERE anexca_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $anexcaRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAniosExperienciaCargoQuery The current query, for fluid interface
     */
    public function filterByAnexcaRFechaModificacion($anexcaRFechaModificacion = null, $comparison = null)
    {
        if (is_array($anexcaRFechaModificacion)) {
            $useMinMax = false;
            if (isset($anexcaRFechaModificacion['min'])) {
                $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_MODIFICACION, $anexcaRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($anexcaRFechaModificacion['max'])) {
                $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_MODIFICACION, $anexcaRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_MODIFICACION, $anexcaRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the anexca_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByAnexcaRUsuario(1234); // WHERE anexca_r_usuario = 1234
     * $query->filterByAnexcaRUsuario(array(12, 34)); // WHERE anexca_r_usuario IN (12, 34)
     * $query->filterByAnexcaRUsuario(array('min' => 12)); // WHERE anexca_r_usuario > 12
     * </code>
     *
     * @param     mixed $anexcaRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAniosExperienciaCargoQuery The current query, for fluid interface
     */
    public function filterByAnexcaRUsuario($anexcaRUsuario = null, $comparison = null)
    {
        if (is_array($anexcaRUsuario)) {
            $useMinMax = false;
            if (isset($anexcaRUsuario['min'])) {
                $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_R_USUARIO, $anexcaRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($anexcaRUsuario['max'])) {
                $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_R_USUARIO, $anexcaRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_R_USUARIO, $anexcaRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Trabajador object
     *
     * @param \Trabajador|ObjectCollection $trabajador the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAniosExperienciaCargoQuery The current query, for fluid interface
     */
    public function filterByTrabajador($trabajador, $comparison = null)
    {
        if ($trabajador instanceof \Trabajador) {
            return $this
                ->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO, $trabajador->getTrabCAniosExperienciaCargo(), $comparison);
        } elseif ($trabajador instanceof ObjectCollection) {
            return $this
                ->useTrabajadorQuery()
                ->filterByPrimaryKeys($trabajador->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrabajador() only accepts arguments of type \Trabajador or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Trabajador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAniosExperienciaCargoQuery The current query, for fluid interface
     */
    public function joinTrabajador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Trabajador');

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
            $this->addJoinObject($join, 'Trabajador');
        }

        return $this;
    }

    /**
     * Use the Trabajador relation Trabajador object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TrabajadorQuery A secondary query class using the current class as primary query
     */
    public function useTrabajadorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrabajador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Trabajador', '\TrabajadorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAniosExperienciaCargo $aniosExperienciaCargo Object to remove from the list of results
     *
     * @return $this|ChildAniosExperienciaCargoQuery The current query, for fluid interface
     */
    public function prune($aniosExperienciaCargo = null)
    {
        if ($aniosExperienciaCargo) {
            $this->addUsingAlias(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO, $aniosExperienciaCargo->getAnexcaCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the anios_experiencia_cargo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AniosExperienciaCargoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AniosExperienciaCargoTableMap::clearInstancePool();
            AniosExperienciaCargoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AniosExperienciaCargoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AniosExperienciaCargoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AniosExperienciaCargoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AniosExperienciaCargoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AniosExperienciaCargoQuery
