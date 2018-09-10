<?php

namespace Base;

use \Especialidad as ChildEspecialidad;
use \EspecialidadQuery as ChildEspecialidadQuery;
use \Exception;
use \PDO;
use Map\EspecialidadTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'especialidad' table.
 *
 *
 *
 * @method     ChildEspecialidadQuery orderByEspeCodigo($order = Criteria::ASC) Order by the espe_codigo column
 * @method     ChildEspecialidadQuery orderByEspeCInstitucion($order = Criteria::ASC) Order by the espe_c_institucion column
 * @method     ChildEspecialidadQuery orderByEspeSigla($order = Criteria::ASC) Order by the espe_sigla column
 * @method     ChildEspecialidadQuery orderByEspeDescripcion($order = Criteria::ASC) Order by the espe_descripcion column
 * @method     ChildEspecialidadQuery orderByEspeVigente($order = Criteria::ASC) Order by the espe_vigente column
 * @method     ChildEspecialidadQuery orderByEspeRFechaCreacion($order = Criteria::ASC) Order by the espe_r_fecha_creacion column
 * @method     ChildEspecialidadQuery orderByEspeRFechaModificacion($order = Criteria::ASC) Order by the espe_r_fecha_modificacion column
 * @method     ChildEspecialidadQuery orderByEspeRUsuario($order = Criteria::ASC) Order by the espe_r_usuario column
 *
 * @method     ChildEspecialidadQuery groupByEspeCodigo() Group by the espe_codigo column
 * @method     ChildEspecialidadQuery groupByEspeCInstitucion() Group by the espe_c_institucion column
 * @method     ChildEspecialidadQuery groupByEspeSigla() Group by the espe_sigla column
 * @method     ChildEspecialidadQuery groupByEspeDescripcion() Group by the espe_descripcion column
 * @method     ChildEspecialidadQuery groupByEspeVigente() Group by the espe_vigente column
 * @method     ChildEspecialidadQuery groupByEspeRFechaCreacion() Group by the espe_r_fecha_creacion column
 * @method     ChildEspecialidadQuery groupByEspeRFechaModificacion() Group by the espe_r_fecha_modificacion column
 * @method     ChildEspecialidadQuery groupByEspeRUsuario() Group by the espe_r_usuario column
 *
 * @method     ChildEspecialidadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEspecialidadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEspecialidadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEspecialidadQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEspecialidadQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEspecialidadQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEspecialidadQuery leftJoinInstitucion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Institucion relation
 * @method     ChildEspecialidadQuery rightJoinInstitucion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Institucion relation
 * @method     ChildEspecialidadQuery innerJoinInstitucion($relationAlias = null) Adds a INNER JOIN clause to the query using the Institucion relation
 *
 * @method     ChildEspecialidadQuery joinWithInstitucion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Institucion relation
 *
 * @method     ChildEspecialidadQuery leftJoinWithInstitucion() Adds a LEFT JOIN clause and with to the query using the Institucion relation
 * @method     ChildEspecialidadQuery rightJoinWithInstitucion() Adds a RIGHT JOIN clause and with to the query using the Institucion relation
 * @method     ChildEspecialidadQuery innerJoinWithInstitucion() Adds a INNER JOIN clause and with to the query using the Institucion relation
 *
 * @method     ChildEspecialidadQuery leftJoinCargo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cargo relation
 * @method     ChildEspecialidadQuery rightJoinCargo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cargo relation
 * @method     ChildEspecialidadQuery innerJoinCargo($relationAlias = null) Adds a INNER JOIN clause to the query using the Cargo relation
 *
 * @method     ChildEspecialidadQuery joinWithCargo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cargo relation
 *
 * @method     ChildEspecialidadQuery leftJoinWithCargo() Adds a LEFT JOIN clause and with to the query using the Cargo relation
 * @method     ChildEspecialidadQuery rightJoinWithCargo() Adds a RIGHT JOIN clause and with to the query using the Cargo relation
 * @method     ChildEspecialidadQuery innerJoinWithCargo() Adds a INNER JOIN clause and with to the query using the Cargo relation
 *
 * @method     \InstitucionQuery|\CargoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEspecialidad findOne(ConnectionInterface $con = null) Return the first ChildEspecialidad matching the query
 * @method     ChildEspecialidad findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEspecialidad matching the query, or a new ChildEspecialidad object populated from the query conditions when no match is found
 *
 * @method     ChildEspecialidad findOneByEspeCodigo(int $espe_codigo) Return the first ChildEspecialidad filtered by the espe_codigo column
 * @method     ChildEspecialidad findOneByEspeCInstitucion(int $espe_c_institucion) Return the first ChildEspecialidad filtered by the espe_c_institucion column
 * @method     ChildEspecialidad findOneByEspeSigla(string $espe_sigla) Return the first ChildEspecialidad filtered by the espe_sigla column
 * @method     ChildEspecialidad findOneByEspeDescripcion(string $espe_descripcion) Return the first ChildEspecialidad filtered by the espe_descripcion column
 * @method     ChildEspecialidad findOneByEspeVigente(int $espe_vigente) Return the first ChildEspecialidad filtered by the espe_vigente column
 * @method     ChildEspecialidad findOneByEspeRFechaCreacion(string $espe_r_fecha_creacion) Return the first ChildEspecialidad filtered by the espe_r_fecha_creacion column
 * @method     ChildEspecialidad findOneByEspeRFechaModificacion(string $espe_r_fecha_modificacion) Return the first ChildEspecialidad filtered by the espe_r_fecha_modificacion column
 * @method     ChildEspecialidad findOneByEspeRUsuario(int $espe_r_usuario) Return the first ChildEspecialidad filtered by the espe_r_usuario column *

 * @method     ChildEspecialidad requirePk($key, ConnectionInterface $con = null) Return the ChildEspecialidad by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEspecialidad requireOne(ConnectionInterface $con = null) Return the first ChildEspecialidad matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEspecialidad requireOneByEspeCodigo(int $espe_codigo) Return the first ChildEspecialidad filtered by the espe_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEspecialidad requireOneByEspeCInstitucion(int $espe_c_institucion) Return the first ChildEspecialidad filtered by the espe_c_institucion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEspecialidad requireOneByEspeSigla(string $espe_sigla) Return the first ChildEspecialidad filtered by the espe_sigla column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEspecialidad requireOneByEspeDescripcion(string $espe_descripcion) Return the first ChildEspecialidad filtered by the espe_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEspecialidad requireOneByEspeVigente(int $espe_vigente) Return the first ChildEspecialidad filtered by the espe_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEspecialidad requireOneByEspeRFechaCreacion(string $espe_r_fecha_creacion) Return the first ChildEspecialidad filtered by the espe_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEspecialidad requireOneByEspeRFechaModificacion(string $espe_r_fecha_modificacion) Return the first ChildEspecialidad filtered by the espe_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEspecialidad requireOneByEspeRUsuario(int $espe_r_usuario) Return the first ChildEspecialidad filtered by the espe_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEspecialidad[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEspecialidad objects based on current ModelCriteria
 * @method     ChildEspecialidad[]|ObjectCollection findByEspeCodigo(int $espe_codigo) Return ChildEspecialidad objects filtered by the espe_codigo column
 * @method     ChildEspecialidad[]|ObjectCollection findByEspeCInstitucion(int $espe_c_institucion) Return ChildEspecialidad objects filtered by the espe_c_institucion column
 * @method     ChildEspecialidad[]|ObjectCollection findByEspeSigla(string $espe_sigla) Return ChildEspecialidad objects filtered by the espe_sigla column
 * @method     ChildEspecialidad[]|ObjectCollection findByEspeDescripcion(string $espe_descripcion) Return ChildEspecialidad objects filtered by the espe_descripcion column
 * @method     ChildEspecialidad[]|ObjectCollection findByEspeVigente(int $espe_vigente) Return ChildEspecialidad objects filtered by the espe_vigente column
 * @method     ChildEspecialidad[]|ObjectCollection findByEspeRFechaCreacion(string $espe_r_fecha_creacion) Return ChildEspecialidad objects filtered by the espe_r_fecha_creacion column
 * @method     ChildEspecialidad[]|ObjectCollection findByEspeRFechaModificacion(string $espe_r_fecha_modificacion) Return ChildEspecialidad objects filtered by the espe_r_fecha_modificacion column
 * @method     ChildEspecialidad[]|ObjectCollection findByEspeRUsuario(int $espe_r_usuario) Return ChildEspecialidad objects filtered by the espe_r_usuario column
 * @method     ChildEspecialidad[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EspecialidadQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EspecialidadQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Especialidad', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEspecialidadQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEspecialidadQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEspecialidadQuery) {
            return $criteria;
        }
        $query = new ChildEspecialidadQuery();
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
     * @return ChildEspecialidad|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EspecialidadTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EspecialidadTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEspecialidad A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT espe_codigo, espe_c_institucion, espe_sigla, espe_descripcion, espe_vigente, espe_r_fecha_creacion, espe_r_fecha_modificacion, espe_r_usuario FROM especialidad WHERE espe_codigo = :p0';
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
            /** @var ChildEspecialidad $obj */
            $obj = new ChildEspecialidad();
            $obj->hydrate($row);
            EspecialidadTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEspecialidad|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the espe_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByEspeCodigo(1234); // WHERE espe_codigo = 1234
     * $query->filterByEspeCodigo(array(12, 34)); // WHERE espe_codigo IN (12, 34)
     * $query->filterByEspeCodigo(array('min' => 12)); // WHERE espe_codigo > 12
     * </code>
     *
     * @param     mixed $espeCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByEspeCodigo($espeCodigo = null, $comparison = null)
    {
        if (is_array($espeCodigo)) {
            $useMinMax = false;
            if (isset($espeCodigo['min'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_CODIGO, $espeCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($espeCodigo['max'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_CODIGO, $espeCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_CODIGO, $espeCodigo, $comparison);
    }

    /**
     * Filter the query on the espe_c_institucion column
     *
     * Example usage:
     * <code>
     * $query->filterByEspeCInstitucion(1234); // WHERE espe_c_institucion = 1234
     * $query->filterByEspeCInstitucion(array(12, 34)); // WHERE espe_c_institucion IN (12, 34)
     * $query->filterByEspeCInstitucion(array('min' => 12)); // WHERE espe_c_institucion > 12
     * </code>
     *
     * @see       filterByInstitucion()
     *
     * @param     mixed $espeCInstitucion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByEspeCInstitucion($espeCInstitucion = null, $comparison = null)
    {
        if (is_array($espeCInstitucion)) {
            $useMinMax = false;
            if (isset($espeCInstitucion['min'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_C_INSTITUCION, $espeCInstitucion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($espeCInstitucion['max'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_C_INSTITUCION, $espeCInstitucion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_C_INSTITUCION, $espeCInstitucion, $comparison);
    }

    /**
     * Filter the query on the espe_sigla column
     *
     * Example usage:
     * <code>
     * $query->filterByEspeSigla('fooValue');   // WHERE espe_sigla = 'fooValue'
     * $query->filterByEspeSigla('%fooValue%', Criteria::LIKE); // WHERE espe_sigla LIKE '%fooValue%'
     * </code>
     *
     * @param     string $espeSigla The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByEspeSigla($espeSigla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($espeSigla)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_SIGLA, $espeSigla, $comparison);
    }

    /**
     * Filter the query on the espe_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEspeDescripcion('fooValue');   // WHERE espe_descripcion = 'fooValue'
     * $query->filterByEspeDescripcion('%fooValue%', Criteria::LIKE); // WHERE espe_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $espeDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByEspeDescripcion($espeDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($espeDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_DESCRIPCION, $espeDescripcion, $comparison);
    }

    /**
     * Filter the query on the espe_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByEspeVigente(1234); // WHERE espe_vigente = 1234
     * $query->filterByEspeVigente(array(12, 34)); // WHERE espe_vigente IN (12, 34)
     * $query->filterByEspeVigente(array('min' => 12)); // WHERE espe_vigente > 12
     * </code>
     *
     * @param     mixed $espeVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByEspeVigente($espeVigente = null, $comparison = null)
    {
        if (is_array($espeVigente)) {
            $useMinMax = false;
            if (isset($espeVigente['min'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_VIGENTE, $espeVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($espeVigente['max'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_VIGENTE, $espeVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_VIGENTE, $espeVigente, $comparison);
    }

    /**
     * Filter the query on the espe_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEspeRFechaCreacion('2011-03-14'); // WHERE espe_r_fecha_creacion = '2011-03-14'
     * $query->filterByEspeRFechaCreacion('now'); // WHERE espe_r_fecha_creacion = '2011-03-14'
     * $query->filterByEspeRFechaCreacion(array('max' => 'yesterday')); // WHERE espe_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $espeRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByEspeRFechaCreacion($espeRFechaCreacion = null, $comparison = null)
    {
        if (is_array($espeRFechaCreacion)) {
            $useMinMax = false;
            if (isset($espeRFechaCreacion['min'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_R_FECHA_CREACION, $espeRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($espeRFechaCreacion['max'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_R_FECHA_CREACION, $espeRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_R_FECHA_CREACION, $espeRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the espe_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEspeRFechaModificacion('2011-03-14'); // WHERE espe_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEspeRFechaModificacion('now'); // WHERE espe_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEspeRFechaModificacion(array('max' => 'yesterday')); // WHERE espe_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $espeRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByEspeRFechaModificacion($espeRFechaModificacion = null, $comparison = null)
    {
        if (is_array($espeRFechaModificacion)) {
            $useMinMax = false;
            if (isset($espeRFechaModificacion['min'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_R_FECHA_MODIFICACION, $espeRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($espeRFechaModificacion['max'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_R_FECHA_MODIFICACION, $espeRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_R_FECHA_MODIFICACION, $espeRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the espe_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEspeRUsuario(1234); // WHERE espe_r_usuario = 1234
     * $query->filterByEspeRUsuario(array(12, 34)); // WHERE espe_r_usuario IN (12, 34)
     * $query->filterByEspeRUsuario(array('min' => 12)); // WHERE espe_r_usuario > 12
     * </code>
     *
     * @param     mixed $espeRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByEspeRUsuario($espeRUsuario = null, $comparison = null)
    {
        if (is_array($espeRUsuario)) {
            $useMinMax = false;
            if (isset($espeRUsuario['min'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_R_USUARIO, $espeRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($espeRUsuario['max'])) {
                $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_R_USUARIO, $espeRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_R_USUARIO, $espeRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Institucion object
     *
     * @param \Institucion|ObjectCollection $institucion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByInstitucion($institucion, $comparison = null)
    {
        if ($institucion instanceof \Institucion) {
            return $this
                ->addUsingAlias(EspecialidadTableMap::COL_ESPE_C_INSTITUCION, $institucion->getInstCodigo(), $comparison);
        } elseif ($institucion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EspecialidadTableMap::COL_ESPE_C_INSTITUCION, $institucion->toKeyValue('PrimaryKey', 'InstCodigo'), $comparison);
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
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
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
     * Filter the query by a related \Cargo object
     *
     * @param \Cargo|ObjectCollection $cargo the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEspecialidadQuery The current query, for fluid interface
     */
    public function filterByCargo($cargo, $comparison = null)
    {
        if ($cargo instanceof \Cargo) {
            return $this
                ->addUsingAlias(EspecialidadTableMap::COL_ESPE_CODIGO, $cargo->getCargCEspecialidad(), $comparison);
        } elseif ($cargo instanceof ObjectCollection) {
            return $this
                ->useCargoQuery()
                ->filterByPrimaryKeys($cargo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCargo() only accepts arguments of type \Cargo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cargo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function joinCargo($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cargo');

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
            $this->addJoinObject($join, 'Cargo');
        }

        return $this;
    }

    /**
     * Use the Cargo relation Cargo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CargoQuery A secondary query class using the current class as primary query
     */
    public function useCargoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCargo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cargo', '\CargoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEspecialidad $especialidad Object to remove from the list of results
     *
     * @return $this|ChildEspecialidadQuery The current query, for fluid interface
     */
    public function prune($especialidad = null)
    {
        if ($especialidad) {
            $this->addUsingAlias(EspecialidadTableMap::COL_ESPE_CODIGO, $especialidad->getEspeCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the especialidad table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EspecialidadTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EspecialidadTableMap::clearInstancePool();
            EspecialidadTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EspecialidadTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EspecialidadTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EspecialidadTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EspecialidadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EspecialidadQuery
