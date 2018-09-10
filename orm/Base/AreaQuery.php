<?php

namespace Base;

use \Area as ChildArea;
use \AreaQuery as ChildAreaQuery;
use \Exception;
use \PDO;
use Map\AreaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'area' table.
 *
 *
 *
 * @method     ChildAreaQuery orderByAreaCodigo($order = Criteria::ASC) Order by the area_codigo column
 * @method     ChildAreaQuery orderByAreaCInstitucion($order = Criteria::ASC) Order by the area_c_institucion column
 * @method     ChildAreaQuery orderByAreaSigla($order = Criteria::ASC) Order by the area_sigla column
 * @method     ChildAreaQuery orderByAreaDescripcion($order = Criteria::ASC) Order by the area_descripcion column
 * @method     ChildAreaQuery orderByAreaRFechaCreacion($order = Criteria::ASC) Order by the area_r_fecha_creacion column
 * @method     ChildAreaQuery orderByAreaRFechaModificacion($order = Criteria::ASC) Order by the area_r_fecha_modificacion column
 * @method     ChildAreaQuery orderByAreaRUsuario($order = Criteria::ASC) Order by the area_r_usuario column
 *
 * @method     ChildAreaQuery groupByAreaCodigo() Group by the area_codigo column
 * @method     ChildAreaQuery groupByAreaCInstitucion() Group by the area_c_institucion column
 * @method     ChildAreaQuery groupByAreaSigla() Group by the area_sigla column
 * @method     ChildAreaQuery groupByAreaDescripcion() Group by the area_descripcion column
 * @method     ChildAreaQuery groupByAreaRFechaCreacion() Group by the area_r_fecha_creacion column
 * @method     ChildAreaQuery groupByAreaRFechaModificacion() Group by the area_r_fecha_modificacion column
 * @method     ChildAreaQuery groupByAreaRUsuario() Group by the area_r_usuario column
 *
 * @method     ChildAreaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAreaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAreaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAreaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAreaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAreaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAreaQuery leftJoinInstitucion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Institucion relation
 * @method     ChildAreaQuery rightJoinInstitucion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Institucion relation
 * @method     ChildAreaQuery innerJoinInstitucion($relationAlias = null) Adds a INNER JOIN clause to the query using the Institucion relation
 *
 * @method     ChildAreaQuery joinWithInstitucion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Institucion relation
 *
 * @method     ChildAreaQuery leftJoinWithInstitucion() Adds a LEFT JOIN clause and with to the query using the Institucion relation
 * @method     ChildAreaQuery rightJoinWithInstitucion() Adds a RIGHT JOIN clause and with to the query using the Institucion relation
 * @method     ChildAreaQuery innerJoinWithInstitucion() Adds a INNER JOIN clause and with to the query using the Institucion relation
 *
 * @method     ChildAreaQuery leftJoinTrabajador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trabajador relation
 * @method     ChildAreaQuery rightJoinTrabajador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trabajador relation
 * @method     ChildAreaQuery innerJoinTrabajador($relationAlias = null) Adds a INNER JOIN clause to the query using the Trabajador relation
 *
 * @method     ChildAreaQuery joinWithTrabajador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Trabajador relation
 *
 * @method     ChildAreaQuery leftJoinWithTrabajador() Adds a LEFT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildAreaQuery rightJoinWithTrabajador() Adds a RIGHT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildAreaQuery innerJoinWithTrabajador() Adds a INNER JOIN clause and with to the query using the Trabajador relation
 *
 * @method     \InstitucionQuery|\TrabajadorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildArea findOne(ConnectionInterface $con = null) Return the first ChildArea matching the query
 * @method     ChildArea findOneOrCreate(ConnectionInterface $con = null) Return the first ChildArea matching the query, or a new ChildArea object populated from the query conditions when no match is found
 *
 * @method     ChildArea findOneByAreaCodigo(int $area_codigo) Return the first ChildArea filtered by the area_codigo column
 * @method     ChildArea findOneByAreaCInstitucion(int $area_c_institucion) Return the first ChildArea filtered by the area_c_institucion column
 * @method     ChildArea findOneByAreaSigla(string $area_sigla) Return the first ChildArea filtered by the area_sigla column
 * @method     ChildArea findOneByAreaDescripcion(string $area_descripcion) Return the first ChildArea filtered by the area_descripcion column
 * @method     ChildArea findOneByAreaRFechaCreacion(string $area_r_fecha_creacion) Return the first ChildArea filtered by the area_r_fecha_creacion column
 * @method     ChildArea findOneByAreaRFechaModificacion(string $area_r_fecha_modificacion) Return the first ChildArea filtered by the area_r_fecha_modificacion column
 * @method     ChildArea findOneByAreaRUsuario(int $area_r_usuario) Return the first ChildArea filtered by the area_r_usuario column *

 * @method     ChildArea requirePk($key, ConnectionInterface $con = null) Return the ChildArea by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArea requireOne(ConnectionInterface $con = null) Return the first ChildArea matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArea requireOneByAreaCodigo(int $area_codigo) Return the first ChildArea filtered by the area_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArea requireOneByAreaCInstitucion(int $area_c_institucion) Return the first ChildArea filtered by the area_c_institucion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArea requireOneByAreaSigla(string $area_sigla) Return the first ChildArea filtered by the area_sigla column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArea requireOneByAreaDescripcion(string $area_descripcion) Return the first ChildArea filtered by the area_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArea requireOneByAreaRFechaCreacion(string $area_r_fecha_creacion) Return the first ChildArea filtered by the area_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArea requireOneByAreaRFechaModificacion(string $area_r_fecha_modificacion) Return the first ChildArea filtered by the area_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildArea requireOneByAreaRUsuario(int $area_r_usuario) Return the first ChildArea filtered by the area_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildArea[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildArea objects based on current ModelCriteria
 * @method     ChildArea[]|ObjectCollection findByAreaCodigo(int $area_codigo) Return ChildArea objects filtered by the area_codigo column
 * @method     ChildArea[]|ObjectCollection findByAreaCInstitucion(int $area_c_institucion) Return ChildArea objects filtered by the area_c_institucion column
 * @method     ChildArea[]|ObjectCollection findByAreaSigla(string $area_sigla) Return ChildArea objects filtered by the area_sigla column
 * @method     ChildArea[]|ObjectCollection findByAreaDescripcion(string $area_descripcion) Return ChildArea objects filtered by the area_descripcion column
 * @method     ChildArea[]|ObjectCollection findByAreaRFechaCreacion(string $area_r_fecha_creacion) Return ChildArea objects filtered by the area_r_fecha_creacion column
 * @method     ChildArea[]|ObjectCollection findByAreaRFechaModificacion(string $area_r_fecha_modificacion) Return ChildArea objects filtered by the area_r_fecha_modificacion column
 * @method     ChildArea[]|ObjectCollection findByAreaRUsuario(int $area_r_usuario) Return ChildArea objects filtered by the area_r_usuario column
 * @method     ChildArea[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AreaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AreaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Area', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAreaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAreaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAreaQuery) {
            return $criteria;
        }
        $query = new ChildAreaQuery();
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
     * @return ChildArea|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AreaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AreaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildArea A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT area_codigo, area_c_institucion, area_sigla, area_descripcion, area_r_fecha_creacion, area_r_fecha_modificacion, area_r_usuario FROM area WHERE area_codigo = :p0';
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
            /** @var ChildArea $obj */
            $obj = new ChildArea();
            $obj->hydrate($row);
            AreaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildArea|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAreaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AreaTableMap::COL_AREA_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAreaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AreaTableMap::COL_AREA_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the area_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByAreaCodigo(1234); // WHERE area_codigo = 1234
     * $query->filterByAreaCodigo(array(12, 34)); // WHERE area_codigo IN (12, 34)
     * $query->filterByAreaCodigo(array('min' => 12)); // WHERE area_codigo > 12
     * </code>
     *
     * @param     mixed $areaCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAreaQuery The current query, for fluid interface
     */
    public function filterByAreaCodigo($areaCodigo = null, $comparison = null)
    {
        if (is_array($areaCodigo)) {
            $useMinMax = false;
            if (isset($areaCodigo['min'])) {
                $this->addUsingAlias(AreaTableMap::COL_AREA_CODIGO, $areaCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($areaCodigo['max'])) {
                $this->addUsingAlias(AreaTableMap::COL_AREA_CODIGO, $areaCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AreaTableMap::COL_AREA_CODIGO, $areaCodigo, $comparison);
    }

    /**
     * Filter the query on the area_c_institucion column
     *
     * Example usage:
     * <code>
     * $query->filterByAreaCInstitucion(1234); // WHERE area_c_institucion = 1234
     * $query->filterByAreaCInstitucion(array(12, 34)); // WHERE area_c_institucion IN (12, 34)
     * $query->filterByAreaCInstitucion(array('min' => 12)); // WHERE area_c_institucion > 12
     * </code>
     *
     * @see       filterByInstitucion()
     *
     * @param     mixed $areaCInstitucion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAreaQuery The current query, for fluid interface
     */
    public function filterByAreaCInstitucion($areaCInstitucion = null, $comparison = null)
    {
        if (is_array($areaCInstitucion)) {
            $useMinMax = false;
            if (isset($areaCInstitucion['min'])) {
                $this->addUsingAlias(AreaTableMap::COL_AREA_C_INSTITUCION, $areaCInstitucion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($areaCInstitucion['max'])) {
                $this->addUsingAlias(AreaTableMap::COL_AREA_C_INSTITUCION, $areaCInstitucion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AreaTableMap::COL_AREA_C_INSTITUCION, $areaCInstitucion, $comparison);
    }

    /**
     * Filter the query on the area_sigla column
     *
     * Example usage:
     * <code>
     * $query->filterByAreaSigla('fooValue');   // WHERE area_sigla = 'fooValue'
     * $query->filterByAreaSigla('%fooValue%', Criteria::LIKE); // WHERE area_sigla LIKE '%fooValue%'
     * </code>
     *
     * @param     string $areaSigla The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAreaQuery The current query, for fluid interface
     */
    public function filterByAreaSigla($areaSigla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($areaSigla)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AreaTableMap::COL_AREA_SIGLA, $areaSigla, $comparison);
    }

    /**
     * Filter the query on the area_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByAreaDescripcion('fooValue');   // WHERE area_descripcion = 'fooValue'
     * $query->filterByAreaDescripcion('%fooValue%', Criteria::LIKE); // WHERE area_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $areaDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAreaQuery The current query, for fluid interface
     */
    public function filterByAreaDescripcion($areaDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($areaDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AreaTableMap::COL_AREA_DESCRIPCION, $areaDescripcion, $comparison);
    }

    /**
     * Filter the query on the area_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByAreaRFechaCreacion('2011-03-14'); // WHERE area_r_fecha_creacion = '2011-03-14'
     * $query->filterByAreaRFechaCreacion('now'); // WHERE area_r_fecha_creacion = '2011-03-14'
     * $query->filterByAreaRFechaCreacion(array('max' => 'yesterday')); // WHERE area_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $areaRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAreaQuery The current query, for fluid interface
     */
    public function filterByAreaRFechaCreacion($areaRFechaCreacion = null, $comparison = null)
    {
        if (is_array($areaRFechaCreacion)) {
            $useMinMax = false;
            if (isset($areaRFechaCreacion['min'])) {
                $this->addUsingAlias(AreaTableMap::COL_AREA_R_FECHA_CREACION, $areaRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($areaRFechaCreacion['max'])) {
                $this->addUsingAlias(AreaTableMap::COL_AREA_R_FECHA_CREACION, $areaRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AreaTableMap::COL_AREA_R_FECHA_CREACION, $areaRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the area_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByAreaRFechaModificacion('2011-03-14'); // WHERE area_r_fecha_modificacion = '2011-03-14'
     * $query->filterByAreaRFechaModificacion('now'); // WHERE area_r_fecha_modificacion = '2011-03-14'
     * $query->filterByAreaRFechaModificacion(array('max' => 'yesterday')); // WHERE area_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $areaRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAreaQuery The current query, for fluid interface
     */
    public function filterByAreaRFechaModificacion($areaRFechaModificacion = null, $comparison = null)
    {
        if (is_array($areaRFechaModificacion)) {
            $useMinMax = false;
            if (isset($areaRFechaModificacion['min'])) {
                $this->addUsingAlias(AreaTableMap::COL_AREA_R_FECHA_MODIFICACION, $areaRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($areaRFechaModificacion['max'])) {
                $this->addUsingAlias(AreaTableMap::COL_AREA_R_FECHA_MODIFICACION, $areaRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AreaTableMap::COL_AREA_R_FECHA_MODIFICACION, $areaRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the area_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByAreaRUsuario(1234); // WHERE area_r_usuario = 1234
     * $query->filterByAreaRUsuario(array(12, 34)); // WHERE area_r_usuario IN (12, 34)
     * $query->filterByAreaRUsuario(array('min' => 12)); // WHERE area_r_usuario > 12
     * </code>
     *
     * @param     mixed $areaRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAreaQuery The current query, for fluid interface
     */
    public function filterByAreaRUsuario($areaRUsuario = null, $comparison = null)
    {
        if (is_array($areaRUsuario)) {
            $useMinMax = false;
            if (isset($areaRUsuario['min'])) {
                $this->addUsingAlias(AreaTableMap::COL_AREA_R_USUARIO, $areaRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($areaRUsuario['max'])) {
                $this->addUsingAlias(AreaTableMap::COL_AREA_R_USUARIO, $areaRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AreaTableMap::COL_AREA_R_USUARIO, $areaRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Institucion object
     *
     * @param \Institucion|ObjectCollection $institucion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAreaQuery The current query, for fluid interface
     */
    public function filterByInstitucion($institucion, $comparison = null)
    {
        if ($institucion instanceof \Institucion) {
            return $this
                ->addUsingAlias(AreaTableMap::COL_AREA_C_INSTITUCION, $institucion->getInstCodigo(), $comparison);
        } elseif ($institucion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AreaTableMap::COL_AREA_C_INSTITUCION, $institucion->toKeyValue('PrimaryKey', 'InstCodigo'), $comparison);
        } else {
            throw new PropelException('filterByInstitucion() only accepts arguments of type \Institucion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Institucion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAreaQuery The current query, for fluid interface
     */
    public function joinInstitucion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Institucion');

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
            $this->addJoinObject($join, 'Institucion');
        }

        return $this;
    }

    /**
     * Use the Institucion relation Institucion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InstitucionQuery A secondary query class using the current class as primary query
     */
    public function useInstitucionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInstitucion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Institucion', '\InstitucionQuery');
    }

    /**
     * Filter the query by a related \Trabajador object
     *
     * @param \Trabajador|ObjectCollection $trabajador the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAreaQuery The current query, for fluid interface
     */
    public function filterByTrabajador($trabajador, $comparison = null)
    {
        if ($trabajador instanceof \Trabajador) {
            return $this
                ->addUsingAlias(AreaTableMap::COL_AREA_CODIGO, $trabajador->getTrabCArea(), $comparison);
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
     * @return $this|ChildAreaQuery The current query, for fluid interface
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
     * @param   ChildArea $area Object to remove from the list of results
     *
     * @return $this|ChildAreaQuery The current query, for fluid interface
     */
    public function prune($area = null)
    {
        if ($area) {
            $this->addUsingAlias(AreaTableMap::COL_AREA_CODIGO, $area->getAreaCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the area table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AreaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AreaTableMap::clearInstancePool();
            AreaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AreaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AreaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AreaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AreaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AreaQuery
