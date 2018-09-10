<?php

namespace Base;

use \Gerencia as ChildGerencia;
use \GerenciaQuery as ChildGerenciaQuery;
use \Exception;
use \PDO;
use Map\GerenciaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'gerencia' table.
 *
 *
 *
 * @method     ChildGerenciaQuery orderByGereCodigo($order = Criteria::ASC) Order by the gere_codigo column
 * @method     ChildGerenciaQuery orderByGereCInstitucion($order = Criteria::ASC) Order by the gere_c_institucion column
 * @method     ChildGerenciaQuery orderByGereSigla($order = Criteria::ASC) Order by the gere_sigla column
 * @method     ChildGerenciaQuery orderByGereDescripcion($order = Criteria::ASC) Order by the gere_descripcion column
 * @method     ChildGerenciaQuery orderByGereRFechaCreacion($order = Criteria::ASC) Order by the gere_r_fecha_creacion column
 * @method     ChildGerenciaQuery orderByGereRFechaModificacion($order = Criteria::ASC) Order by the gere_r_fecha_modificacion column
 * @method     ChildGerenciaQuery orderByGereRUsuario($order = Criteria::ASC) Order by the gere_r_usuario column
 *
 * @method     ChildGerenciaQuery groupByGereCodigo() Group by the gere_codigo column
 * @method     ChildGerenciaQuery groupByGereCInstitucion() Group by the gere_c_institucion column
 * @method     ChildGerenciaQuery groupByGereSigla() Group by the gere_sigla column
 * @method     ChildGerenciaQuery groupByGereDescripcion() Group by the gere_descripcion column
 * @method     ChildGerenciaQuery groupByGereRFechaCreacion() Group by the gere_r_fecha_creacion column
 * @method     ChildGerenciaQuery groupByGereRFechaModificacion() Group by the gere_r_fecha_modificacion column
 * @method     ChildGerenciaQuery groupByGereRUsuario() Group by the gere_r_usuario column
 *
 * @method     ChildGerenciaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGerenciaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGerenciaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGerenciaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGerenciaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGerenciaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGerenciaQuery leftJoinInstitucion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Institucion relation
 * @method     ChildGerenciaQuery rightJoinInstitucion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Institucion relation
 * @method     ChildGerenciaQuery innerJoinInstitucion($relationAlias = null) Adds a INNER JOIN clause to the query using the Institucion relation
 *
 * @method     ChildGerenciaQuery joinWithInstitucion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Institucion relation
 *
 * @method     ChildGerenciaQuery leftJoinWithInstitucion() Adds a LEFT JOIN clause and with to the query using the Institucion relation
 * @method     ChildGerenciaQuery rightJoinWithInstitucion() Adds a RIGHT JOIN clause and with to the query using the Institucion relation
 * @method     ChildGerenciaQuery innerJoinWithInstitucion() Adds a INNER JOIN clause and with to the query using the Institucion relation
 *
 * @method     ChildGerenciaQuery leftJoinTrabajador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trabajador relation
 * @method     ChildGerenciaQuery rightJoinTrabajador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trabajador relation
 * @method     ChildGerenciaQuery innerJoinTrabajador($relationAlias = null) Adds a INNER JOIN clause to the query using the Trabajador relation
 *
 * @method     ChildGerenciaQuery joinWithTrabajador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Trabajador relation
 *
 * @method     ChildGerenciaQuery leftJoinWithTrabajador() Adds a LEFT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildGerenciaQuery rightJoinWithTrabajador() Adds a RIGHT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildGerenciaQuery innerJoinWithTrabajador() Adds a INNER JOIN clause and with to the query using the Trabajador relation
 *
 * @method     \InstitucionQuery|\TrabajadorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildGerencia findOne(ConnectionInterface $con = null) Return the first ChildGerencia matching the query
 * @method     ChildGerencia findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGerencia matching the query, or a new ChildGerencia object populated from the query conditions when no match is found
 *
 * @method     ChildGerencia findOneByGereCodigo(int $gere_codigo) Return the first ChildGerencia filtered by the gere_codigo column
 * @method     ChildGerencia findOneByGereCInstitucion(int $gere_c_institucion) Return the first ChildGerencia filtered by the gere_c_institucion column
 * @method     ChildGerencia findOneByGereSigla(string $gere_sigla) Return the first ChildGerencia filtered by the gere_sigla column
 * @method     ChildGerencia findOneByGereDescripcion(string $gere_descripcion) Return the first ChildGerencia filtered by the gere_descripcion column
 * @method     ChildGerencia findOneByGereRFechaCreacion(string $gere_r_fecha_creacion) Return the first ChildGerencia filtered by the gere_r_fecha_creacion column
 * @method     ChildGerencia findOneByGereRFechaModificacion(string $gere_r_fecha_modificacion) Return the first ChildGerencia filtered by the gere_r_fecha_modificacion column
 * @method     ChildGerencia findOneByGereRUsuario(int $gere_r_usuario) Return the first ChildGerencia filtered by the gere_r_usuario column *

 * @method     ChildGerencia requirePk($key, ConnectionInterface $con = null) Return the ChildGerencia by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGerencia requireOne(ConnectionInterface $con = null) Return the first ChildGerencia matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGerencia requireOneByGereCodigo(int $gere_codigo) Return the first ChildGerencia filtered by the gere_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGerencia requireOneByGereCInstitucion(int $gere_c_institucion) Return the first ChildGerencia filtered by the gere_c_institucion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGerencia requireOneByGereSigla(string $gere_sigla) Return the first ChildGerencia filtered by the gere_sigla column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGerencia requireOneByGereDescripcion(string $gere_descripcion) Return the first ChildGerencia filtered by the gere_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGerencia requireOneByGereRFechaCreacion(string $gere_r_fecha_creacion) Return the first ChildGerencia filtered by the gere_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGerencia requireOneByGereRFechaModificacion(string $gere_r_fecha_modificacion) Return the first ChildGerencia filtered by the gere_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGerencia requireOneByGereRUsuario(int $gere_r_usuario) Return the first ChildGerencia filtered by the gere_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGerencia[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGerencia objects based on current ModelCriteria
 * @method     ChildGerencia[]|ObjectCollection findByGereCodigo(int $gere_codigo) Return ChildGerencia objects filtered by the gere_codigo column
 * @method     ChildGerencia[]|ObjectCollection findByGereCInstitucion(int $gere_c_institucion) Return ChildGerencia objects filtered by the gere_c_institucion column
 * @method     ChildGerencia[]|ObjectCollection findByGereSigla(string $gere_sigla) Return ChildGerencia objects filtered by the gere_sigla column
 * @method     ChildGerencia[]|ObjectCollection findByGereDescripcion(string $gere_descripcion) Return ChildGerencia objects filtered by the gere_descripcion column
 * @method     ChildGerencia[]|ObjectCollection findByGereRFechaCreacion(string $gere_r_fecha_creacion) Return ChildGerencia objects filtered by the gere_r_fecha_creacion column
 * @method     ChildGerencia[]|ObjectCollection findByGereRFechaModificacion(string $gere_r_fecha_modificacion) Return ChildGerencia objects filtered by the gere_r_fecha_modificacion column
 * @method     ChildGerencia[]|ObjectCollection findByGereRUsuario(int $gere_r_usuario) Return ChildGerencia objects filtered by the gere_r_usuario column
 * @method     ChildGerencia[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GerenciaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\GerenciaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Gerencia', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGerenciaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGerenciaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGerenciaQuery) {
            return $criteria;
        }
        $query = new ChildGerenciaQuery();
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
     * @return ChildGerencia|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GerenciaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GerenciaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildGerencia A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT gere_codigo, gere_c_institucion, gere_sigla, gere_descripcion, gere_r_fecha_creacion, gere_r_fecha_modificacion, gere_r_usuario FROM gerencia WHERE gere_codigo = :p0';
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
            /** @var ChildGerencia $obj */
            $obj = new ChildGerencia();
            $obj->hydrate($row);
            GerenciaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildGerencia|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GerenciaTableMap::COL_GERE_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GerenciaTableMap::COL_GERE_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the gere_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByGereCodigo(1234); // WHERE gere_codigo = 1234
     * $query->filterByGereCodigo(array(12, 34)); // WHERE gere_codigo IN (12, 34)
     * $query->filterByGereCodigo(array('min' => 12)); // WHERE gere_codigo > 12
     * </code>
     *
     * @param     mixed $gereCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
     */
    public function filterByGereCodigo($gereCodigo = null, $comparison = null)
    {
        if (is_array($gereCodigo)) {
            $useMinMax = false;
            if (isset($gereCodigo['min'])) {
                $this->addUsingAlias(GerenciaTableMap::COL_GERE_CODIGO, $gereCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gereCodigo['max'])) {
                $this->addUsingAlias(GerenciaTableMap::COL_GERE_CODIGO, $gereCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GerenciaTableMap::COL_GERE_CODIGO, $gereCodigo, $comparison);
    }

    /**
     * Filter the query on the gere_c_institucion column
     *
     * Example usage:
     * <code>
     * $query->filterByGereCInstitucion(1234); // WHERE gere_c_institucion = 1234
     * $query->filterByGereCInstitucion(array(12, 34)); // WHERE gere_c_institucion IN (12, 34)
     * $query->filterByGereCInstitucion(array('min' => 12)); // WHERE gere_c_institucion > 12
     * </code>
     *
     * @see       filterByInstitucion()
     *
     * @param     mixed $gereCInstitucion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
     */
    public function filterByGereCInstitucion($gereCInstitucion = null, $comparison = null)
    {
        if (is_array($gereCInstitucion)) {
            $useMinMax = false;
            if (isset($gereCInstitucion['min'])) {
                $this->addUsingAlias(GerenciaTableMap::COL_GERE_C_INSTITUCION, $gereCInstitucion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gereCInstitucion['max'])) {
                $this->addUsingAlias(GerenciaTableMap::COL_GERE_C_INSTITUCION, $gereCInstitucion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GerenciaTableMap::COL_GERE_C_INSTITUCION, $gereCInstitucion, $comparison);
    }

    /**
     * Filter the query on the gere_sigla column
     *
     * Example usage:
     * <code>
     * $query->filterByGereSigla('fooValue');   // WHERE gere_sigla = 'fooValue'
     * $query->filterByGereSigla('%fooValue%', Criteria::LIKE); // WHERE gere_sigla LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gereSigla The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
     */
    public function filterByGereSigla($gereSigla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gereSigla)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GerenciaTableMap::COL_GERE_SIGLA, $gereSigla, $comparison);
    }

    /**
     * Filter the query on the gere_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByGereDescripcion('fooValue');   // WHERE gere_descripcion = 'fooValue'
     * $query->filterByGereDescripcion('%fooValue%', Criteria::LIKE); // WHERE gere_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gereDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
     */
    public function filterByGereDescripcion($gereDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gereDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GerenciaTableMap::COL_GERE_DESCRIPCION, $gereDescripcion, $comparison);
    }

    /**
     * Filter the query on the gere_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByGereRFechaCreacion('2011-03-14'); // WHERE gere_r_fecha_creacion = '2011-03-14'
     * $query->filterByGereRFechaCreacion('now'); // WHERE gere_r_fecha_creacion = '2011-03-14'
     * $query->filterByGereRFechaCreacion(array('max' => 'yesterday')); // WHERE gere_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $gereRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
     */
    public function filterByGereRFechaCreacion($gereRFechaCreacion = null, $comparison = null)
    {
        if (is_array($gereRFechaCreacion)) {
            $useMinMax = false;
            if (isset($gereRFechaCreacion['min'])) {
                $this->addUsingAlias(GerenciaTableMap::COL_GERE_R_FECHA_CREACION, $gereRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gereRFechaCreacion['max'])) {
                $this->addUsingAlias(GerenciaTableMap::COL_GERE_R_FECHA_CREACION, $gereRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GerenciaTableMap::COL_GERE_R_FECHA_CREACION, $gereRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the gere_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByGereRFechaModificacion('2011-03-14'); // WHERE gere_r_fecha_modificacion = '2011-03-14'
     * $query->filterByGereRFechaModificacion('now'); // WHERE gere_r_fecha_modificacion = '2011-03-14'
     * $query->filterByGereRFechaModificacion(array('max' => 'yesterday')); // WHERE gere_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $gereRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
     */
    public function filterByGereRFechaModificacion($gereRFechaModificacion = null, $comparison = null)
    {
        if (is_array($gereRFechaModificacion)) {
            $useMinMax = false;
            if (isset($gereRFechaModificacion['min'])) {
                $this->addUsingAlias(GerenciaTableMap::COL_GERE_R_FECHA_MODIFICACION, $gereRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gereRFechaModificacion['max'])) {
                $this->addUsingAlias(GerenciaTableMap::COL_GERE_R_FECHA_MODIFICACION, $gereRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GerenciaTableMap::COL_GERE_R_FECHA_MODIFICACION, $gereRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the gere_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByGereRUsuario(1234); // WHERE gere_r_usuario = 1234
     * $query->filterByGereRUsuario(array(12, 34)); // WHERE gere_r_usuario IN (12, 34)
     * $query->filterByGereRUsuario(array('min' => 12)); // WHERE gere_r_usuario > 12
     * </code>
     *
     * @param     mixed $gereRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
     */
    public function filterByGereRUsuario($gereRUsuario = null, $comparison = null)
    {
        if (is_array($gereRUsuario)) {
            $useMinMax = false;
            if (isset($gereRUsuario['min'])) {
                $this->addUsingAlias(GerenciaTableMap::COL_GERE_R_USUARIO, $gereRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gereRUsuario['max'])) {
                $this->addUsingAlias(GerenciaTableMap::COL_GERE_R_USUARIO, $gereRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GerenciaTableMap::COL_GERE_R_USUARIO, $gereRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Institucion object
     *
     * @param \Institucion|ObjectCollection $institucion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGerenciaQuery The current query, for fluid interface
     */
    public function filterByInstitucion($institucion, $comparison = null)
    {
        if ($institucion instanceof \Institucion) {
            return $this
                ->addUsingAlias(GerenciaTableMap::COL_GERE_C_INSTITUCION, $institucion->getInstCodigo(), $comparison);
        } elseif ($institucion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GerenciaTableMap::COL_GERE_C_INSTITUCION, $institucion->toKeyValue('PrimaryKey', 'InstCodigo'), $comparison);
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
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
     */
    public function joinInstitucion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useInstitucionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
     * @return ChildGerenciaQuery The current query, for fluid interface
     */
    public function filterByTrabajador($trabajador, $comparison = null)
    {
        if ($trabajador instanceof \Trabajador) {
            return $this
                ->addUsingAlias(GerenciaTableMap::COL_GERE_CODIGO, $trabajador->getTrabCGerencia(), $comparison);
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
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
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
     * @param   ChildGerencia $gerencia Object to remove from the list of results
     *
     * @return $this|ChildGerenciaQuery The current query, for fluid interface
     */
    public function prune($gerencia = null)
    {
        if ($gerencia) {
            $this->addUsingAlias(GerenciaTableMap::COL_GERE_CODIGO, $gerencia->getGereCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the gerencia table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GerenciaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GerenciaTableMap::clearInstancePool();
            GerenciaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(GerenciaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GerenciaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GerenciaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GerenciaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GerenciaQuery
