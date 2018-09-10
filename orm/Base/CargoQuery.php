<?php

namespace Base;

use \Cargo as ChildCargo;
use \CargoQuery as ChildCargoQuery;
use \Exception;
use \PDO;
use Map\CargoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cargo' table.
 *
 *
 *
 * @method     ChildCargoQuery orderByCargCodigo($order = Criteria::ASC) Order by the carg_codigo column
 * @method     ChildCargoQuery orderByCargCEspecialidad($order = Criteria::ASC) Order by the carg_c_especialidad column
 * @method     ChildCargoQuery orderByCargTRelacionFaena($order = Criteria::ASC) Order by the carg_t_relacion_faena column
 * @method     ChildCargoQuery orderByCargSigla($order = Criteria::ASC) Order by the carg_sigla column
 * @method     ChildCargoQuery orderByCargDescripcion($order = Criteria::ASC) Order by the carg_descripcion column
 * @method     ChildCargoQuery orderByCargVigente($order = Criteria::ASC) Order by the carg_vigente column
 * @method     ChildCargoQuery orderByCargRFechaCreacion($order = Criteria::ASC) Order by the carg_r_fecha_creacion column
 * @method     ChildCargoQuery orderByCargRFechaModificacion($order = Criteria::ASC) Order by the carg_r_fecha_modificacion column
 * @method     ChildCargoQuery orderByCargRUsuario($order = Criteria::ASC) Order by the carg_r_usuario column
 *
 * @method     ChildCargoQuery groupByCargCodigo() Group by the carg_codigo column
 * @method     ChildCargoQuery groupByCargCEspecialidad() Group by the carg_c_especialidad column
 * @method     ChildCargoQuery groupByCargTRelacionFaena() Group by the carg_t_relacion_faena column
 * @method     ChildCargoQuery groupByCargSigla() Group by the carg_sigla column
 * @method     ChildCargoQuery groupByCargDescripcion() Group by the carg_descripcion column
 * @method     ChildCargoQuery groupByCargVigente() Group by the carg_vigente column
 * @method     ChildCargoQuery groupByCargRFechaCreacion() Group by the carg_r_fecha_creacion column
 * @method     ChildCargoQuery groupByCargRFechaModificacion() Group by the carg_r_fecha_modificacion column
 * @method     ChildCargoQuery groupByCargRUsuario() Group by the carg_r_usuario column
 *
 * @method     ChildCargoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCargoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCargoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCargoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCargoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCargoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCargoQuery leftJoinEspecialidad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Especialidad relation
 * @method     ChildCargoQuery rightJoinEspecialidad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Especialidad relation
 * @method     ChildCargoQuery innerJoinEspecialidad($relationAlias = null) Adds a INNER JOIN clause to the query using the Especialidad relation
 *
 * @method     ChildCargoQuery joinWithEspecialidad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Especialidad relation
 *
 * @method     ChildCargoQuery leftJoinWithEspecialidad() Adds a LEFT JOIN clause and with to the query using the Especialidad relation
 * @method     ChildCargoQuery rightJoinWithEspecialidad() Adds a RIGHT JOIN clause and with to the query using the Especialidad relation
 * @method     ChildCargoQuery innerJoinWithEspecialidad() Adds a INNER JOIN clause and with to the query using the Especialidad relation
 *
 * @method     ChildCargoQuery leftJoinTRelacionFaena($relationAlias = null) Adds a LEFT JOIN clause to the query using the TRelacionFaena relation
 * @method     ChildCargoQuery rightJoinTRelacionFaena($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TRelacionFaena relation
 * @method     ChildCargoQuery innerJoinTRelacionFaena($relationAlias = null) Adds a INNER JOIN clause to the query using the TRelacionFaena relation
 *
 * @method     ChildCargoQuery joinWithTRelacionFaena($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TRelacionFaena relation
 *
 * @method     ChildCargoQuery leftJoinWithTRelacionFaena() Adds a LEFT JOIN clause and with to the query using the TRelacionFaena relation
 * @method     ChildCargoQuery rightJoinWithTRelacionFaena() Adds a RIGHT JOIN clause and with to the query using the TRelacionFaena relation
 * @method     ChildCargoQuery innerJoinWithTRelacionFaena() Adds a INNER JOIN clause and with to the query using the TRelacionFaena relation
 *
 * @method     ChildCargoQuery leftJoinActividadCargo($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActividadCargo relation
 * @method     ChildCargoQuery rightJoinActividadCargo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActividadCargo relation
 * @method     ChildCargoQuery innerJoinActividadCargo($relationAlias = null) Adds a INNER JOIN clause to the query using the ActividadCargo relation
 *
 * @method     ChildCargoQuery joinWithActividadCargo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ActividadCargo relation
 *
 * @method     ChildCargoQuery leftJoinWithActividadCargo() Adds a LEFT JOIN clause and with to the query using the ActividadCargo relation
 * @method     ChildCargoQuery rightJoinWithActividadCargo() Adds a RIGHT JOIN clause and with to the query using the ActividadCargo relation
 * @method     ChildCargoQuery innerJoinWithActividadCargo() Adds a INNER JOIN clause and with to the query using the ActividadCargo relation
 *
 * @method     ChildCargoQuery leftJoinCargoGrupoSence($relationAlias = null) Adds a LEFT JOIN clause to the query using the CargoGrupoSence relation
 * @method     ChildCargoQuery rightJoinCargoGrupoSence($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CargoGrupoSence relation
 * @method     ChildCargoQuery innerJoinCargoGrupoSence($relationAlias = null) Adds a INNER JOIN clause to the query using the CargoGrupoSence relation
 *
 * @method     ChildCargoQuery joinWithCargoGrupoSence($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CargoGrupoSence relation
 *
 * @method     ChildCargoQuery leftJoinWithCargoGrupoSence() Adds a LEFT JOIN clause and with to the query using the CargoGrupoSence relation
 * @method     ChildCargoQuery rightJoinWithCargoGrupoSence() Adds a RIGHT JOIN clause and with to the query using the CargoGrupoSence relation
 * @method     ChildCargoQuery innerJoinWithCargoGrupoSence() Adds a INNER JOIN clause and with to the query using the CargoGrupoSence relation
 *
 * @method     ChildCargoQuery leftJoinTrabajador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trabajador relation
 * @method     ChildCargoQuery rightJoinTrabajador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trabajador relation
 * @method     ChildCargoQuery innerJoinTrabajador($relationAlias = null) Adds a INNER JOIN clause to the query using the Trabajador relation
 *
 * @method     ChildCargoQuery joinWithTrabajador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Trabajador relation
 *
 * @method     ChildCargoQuery leftJoinWithTrabajador() Adds a LEFT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildCargoQuery rightJoinWithTrabajador() Adds a RIGHT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildCargoQuery innerJoinWithTrabajador() Adds a INNER JOIN clause and with to the query using the Trabajador relation
 *
 * @method     \EspecialidadQuery|\TRelacionFaenaQuery|\ActividadCargoQuery|\CargoGrupoSenceQuery|\TrabajadorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCargo findOne(ConnectionInterface $con = null) Return the first ChildCargo matching the query
 * @method     ChildCargo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCargo matching the query, or a new ChildCargo object populated from the query conditions when no match is found
 *
 * @method     ChildCargo findOneByCargCodigo(int $carg_codigo) Return the first ChildCargo filtered by the carg_codigo column
 * @method     ChildCargo findOneByCargCEspecialidad(int $carg_c_especialidad) Return the first ChildCargo filtered by the carg_c_especialidad column
 * @method     ChildCargo findOneByCargTRelacionFaena(int $carg_t_relacion_faena) Return the first ChildCargo filtered by the carg_t_relacion_faena column
 * @method     ChildCargo findOneByCargSigla(string $carg_sigla) Return the first ChildCargo filtered by the carg_sigla column
 * @method     ChildCargo findOneByCargDescripcion(string $carg_descripcion) Return the first ChildCargo filtered by the carg_descripcion column
 * @method     ChildCargo findOneByCargVigente(int $carg_vigente) Return the first ChildCargo filtered by the carg_vigente column
 * @method     ChildCargo findOneByCargRFechaCreacion(string $carg_r_fecha_creacion) Return the first ChildCargo filtered by the carg_r_fecha_creacion column
 * @method     ChildCargo findOneByCargRFechaModificacion(string $carg_r_fecha_modificacion) Return the first ChildCargo filtered by the carg_r_fecha_modificacion column
 * @method     ChildCargo findOneByCargRUsuario(int $carg_r_usuario) Return the first ChildCargo filtered by the carg_r_usuario column *

 * @method     ChildCargo requirePk($key, ConnectionInterface $con = null) Return the ChildCargo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargo requireOne(ConnectionInterface $con = null) Return the first ChildCargo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCargo requireOneByCargCodigo(int $carg_codigo) Return the first ChildCargo filtered by the carg_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargo requireOneByCargCEspecialidad(int $carg_c_especialidad) Return the first ChildCargo filtered by the carg_c_especialidad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargo requireOneByCargTRelacionFaena(int $carg_t_relacion_faena) Return the first ChildCargo filtered by the carg_t_relacion_faena column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargo requireOneByCargSigla(string $carg_sigla) Return the first ChildCargo filtered by the carg_sigla column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargo requireOneByCargDescripcion(string $carg_descripcion) Return the first ChildCargo filtered by the carg_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargo requireOneByCargVigente(int $carg_vigente) Return the first ChildCargo filtered by the carg_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargo requireOneByCargRFechaCreacion(string $carg_r_fecha_creacion) Return the first ChildCargo filtered by the carg_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargo requireOneByCargRFechaModificacion(string $carg_r_fecha_modificacion) Return the first ChildCargo filtered by the carg_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCargo requireOneByCargRUsuario(int $carg_r_usuario) Return the first ChildCargo filtered by the carg_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCargo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCargo objects based on current ModelCriteria
 * @method     ChildCargo[]|ObjectCollection findByCargCodigo(int $carg_codigo) Return ChildCargo objects filtered by the carg_codigo column
 * @method     ChildCargo[]|ObjectCollection findByCargCEspecialidad(int $carg_c_especialidad) Return ChildCargo objects filtered by the carg_c_especialidad column
 * @method     ChildCargo[]|ObjectCollection findByCargTRelacionFaena(int $carg_t_relacion_faena) Return ChildCargo objects filtered by the carg_t_relacion_faena column
 * @method     ChildCargo[]|ObjectCollection findByCargSigla(string $carg_sigla) Return ChildCargo objects filtered by the carg_sigla column
 * @method     ChildCargo[]|ObjectCollection findByCargDescripcion(string $carg_descripcion) Return ChildCargo objects filtered by the carg_descripcion column
 * @method     ChildCargo[]|ObjectCollection findByCargVigente(int $carg_vigente) Return ChildCargo objects filtered by the carg_vigente column
 * @method     ChildCargo[]|ObjectCollection findByCargRFechaCreacion(string $carg_r_fecha_creacion) Return ChildCargo objects filtered by the carg_r_fecha_creacion column
 * @method     ChildCargo[]|ObjectCollection findByCargRFechaModificacion(string $carg_r_fecha_modificacion) Return ChildCargo objects filtered by the carg_r_fecha_modificacion column
 * @method     ChildCargo[]|ObjectCollection findByCargRUsuario(int $carg_r_usuario) Return ChildCargo objects filtered by the carg_r_usuario column
 * @method     ChildCargo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CargoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CargoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Cargo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCargoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCargoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCargoQuery) {
            return $criteria;
        }
        $query = new ChildCargoQuery();
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
     * @return ChildCargo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CargoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CargoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCargo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT carg_codigo, carg_c_especialidad, carg_t_relacion_faena, carg_sigla, carg_descripcion, carg_vigente, carg_r_fecha_creacion, carg_r_fecha_modificacion, carg_r_usuario FROM cargo WHERE carg_codigo = :p0';
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
            /** @var ChildCargo $obj */
            $obj = new ChildCargo();
            $obj->hydrate($row);
            CargoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCargo|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CargoTableMap::COL_CARG_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CargoTableMap::COL_CARG_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the carg_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByCargCodigo(1234); // WHERE carg_codigo = 1234
     * $query->filterByCargCodigo(array(12, 34)); // WHERE carg_codigo IN (12, 34)
     * $query->filterByCargCodigo(array('min' => 12)); // WHERE carg_codigo > 12
     * </code>
     *
     * @param     mixed $cargCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function filterByCargCodigo($cargCodigo = null, $comparison = null)
    {
        if (is_array($cargCodigo)) {
            $useMinMax = false;
            if (isset($cargCodigo['min'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_CODIGO, $cargCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cargCodigo['max'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_CODIGO, $cargCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoTableMap::COL_CARG_CODIGO, $cargCodigo, $comparison);
    }

    /**
     * Filter the query on the carg_c_especialidad column
     *
     * Example usage:
     * <code>
     * $query->filterByCargCEspecialidad(1234); // WHERE carg_c_especialidad = 1234
     * $query->filterByCargCEspecialidad(array(12, 34)); // WHERE carg_c_especialidad IN (12, 34)
     * $query->filterByCargCEspecialidad(array('min' => 12)); // WHERE carg_c_especialidad > 12
     * </code>
     *
     * @see       filterByEspecialidad()
     *
     * @param     mixed $cargCEspecialidad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function filterByCargCEspecialidad($cargCEspecialidad = null, $comparison = null)
    {
        if (is_array($cargCEspecialidad)) {
            $useMinMax = false;
            if (isset($cargCEspecialidad['min'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_C_ESPECIALIDAD, $cargCEspecialidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cargCEspecialidad['max'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_C_ESPECIALIDAD, $cargCEspecialidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoTableMap::COL_CARG_C_ESPECIALIDAD, $cargCEspecialidad, $comparison);
    }

    /**
     * Filter the query on the carg_t_relacion_faena column
     *
     * Example usage:
     * <code>
     * $query->filterByCargTRelacionFaena(1234); // WHERE carg_t_relacion_faena = 1234
     * $query->filterByCargTRelacionFaena(array(12, 34)); // WHERE carg_t_relacion_faena IN (12, 34)
     * $query->filterByCargTRelacionFaena(array('min' => 12)); // WHERE carg_t_relacion_faena > 12
     * </code>
     *
     * @see       filterByTRelacionFaena()
     *
     * @param     mixed $cargTRelacionFaena The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function filterByCargTRelacionFaena($cargTRelacionFaena = null, $comparison = null)
    {
        if (is_array($cargTRelacionFaena)) {
            $useMinMax = false;
            if (isset($cargTRelacionFaena['min'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_T_RELACION_FAENA, $cargTRelacionFaena['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cargTRelacionFaena['max'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_T_RELACION_FAENA, $cargTRelacionFaena['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoTableMap::COL_CARG_T_RELACION_FAENA, $cargTRelacionFaena, $comparison);
    }

    /**
     * Filter the query on the carg_sigla column
     *
     * Example usage:
     * <code>
     * $query->filterByCargSigla('fooValue');   // WHERE carg_sigla = 'fooValue'
     * $query->filterByCargSigla('%fooValue%', Criteria::LIKE); // WHERE carg_sigla LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cargSigla The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function filterByCargSigla($cargSigla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cargSigla)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoTableMap::COL_CARG_SIGLA, $cargSigla, $comparison);
    }

    /**
     * Filter the query on the carg_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByCargDescripcion('fooValue');   // WHERE carg_descripcion = 'fooValue'
     * $query->filterByCargDescripcion('%fooValue%', Criteria::LIKE); // WHERE carg_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cargDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function filterByCargDescripcion($cargDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cargDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoTableMap::COL_CARG_DESCRIPCION, $cargDescripcion, $comparison);
    }

    /**
     * Filter the query on the carg_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByCargVigente(1234); // WHERE carg_vigente = 1234
     * $query->filterByCargVigente(array(12, 34)); // WHERE carg_vigente IN (12, 34)
     * $query->filterByCargVigente(array('min' => 12)); // WHERE carg_vigente > 12
     * </code>
     *
     * @param     mixed $cargVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function filterByCargVigente($cargVigente = null, $comparison = null)
    {
        if (is_array($cargVigente)) {
            $useMinMax = false;
            if (isset($cargVigente['min'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_VIGENTE, $cargVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cargVigente['max'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_VIGENTE, $cargVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoTableMap::COL_CARG_VIGENTE, $cargVigente, $comparison);
    }

    /**
     * Filter the query on the carg_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByCargRFechaCreacion('2011-03-14'); // WHERE carg_r_fecha_creacion = '2011-03-14'
     * $query->filterByCargRFechaCreacion('now'); // WHERE carg_r_fecha_creacion = '2011-03-14'
     * $query->filterByCargRFechaCreacion(array('max' => 'yesterday')); // WHERE carg_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $cargRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function filterByCargRFechaCreacion($cargRFechaCreacion = null, $comparison = null)
    {
        if (is_array($cargRFechaCreacion)) {
            $useMinMax = false;
            if (isset($cargRFechaCreacion['min'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_R_FECHA_CREACION, $cargRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cargRFechaCreacion['max'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_R_FECHA_CREACION, $cargRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoTableMap::COL_CARG_R_FECHA_CREACION, $cargRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the carg_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByCargRFechaModificacion('2011-03-14'); // WHERE carg_r_fecha_modificacion = '2011-03-14'
     * $query->filterByCargRFechaModificacion('now'); // WHERE carg_r_fecha_modificacion = '2011-03-14'
     * $query->filterByCargRFechaModificacion(array('max' => 'yesterday')); // WHERE carg_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $cargRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function filterByCargRFechaModificacion($cargRFechaModificacion = null, $comparison = null)
    {
        if (is_array($cargRFechaModificacion)) {
            $useMinMax = false;
            if (isset($cargRFechaModificacion['min'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_R_FECHA_MODIFICACION, $cargRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cargRFechaModificacion['max'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_R_FECHA_MODIFICACION, $cargRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoTableMap::COL_CARG_R_FECHA_MODIFICACION, $cargRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the carg_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByCargRUsuario(1234); // WHERE carg_r_usuario = 1234
     * $query->filterByCargRUsuario(array(12, 34)); // WHERE carg_r_usuario IN (12, 34)
     * $query->filterByCargRUsuario(array('min' => 12)); // WHERE carg_r_usuario > 12
     * </code>
     *
     * @param     mixed $cargRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function filterByCargRUsuario($cargRUsuario = null, $comparison = null)
    {
        if (is_array($cargRUsuario)) {
            $useMinMax = false;
            if (isset($cargRUsuario['min'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_R_USUARIO, $cargRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cargRUsuario['max'])) {
                $this->addUsingAlias(CargoTableMap::COL_CARG_R_USUARIO, $cargRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoTableMap::COL_CARG_R_USUARIO, $cargRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Especialidad object
     *
     * @param \Especialidad|ObjectCollection $especialidad The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCargoQuery The current query, for fluid interface
     */
    public function filterByEspecialidad($especialidad, $comparison = null)
    {
        if ($especialidad instanceof \Especialidad) {
            return $this
                ->addUsingAlias(CargoTableMap::COL_CARG_C_ESPECIALIDAD, $especialidad->getEspeCodigo(), $comparison);
        } elseif ($especialidad instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CargoTableMap::COL_CARG_C_ESPECIALIDAD, $especialidad->toKeyValue('PrimaryKey', 'EspeCodigo'), $comparison);
        } else {
            throw new PropelException('filterByEspecialidad() only accepts arguments of type \Especialidad or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Especialidad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function joinEspecialidad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Especialidad');

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
            $this->addJoinObject($join, 'Especialidad');
        }

        return $this;
    }

    /**
     * Use the Especialidad relation Especialidad object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EspecialidadQuery A secondary query class using the current class as primary query
     */
    public function useEspecialidadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEspecialidad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Especialidad', '\EspecialidadQuery');
    }

    /**
     * Filter the query by a related \TRelacionFaena object
     *
     * @param \TRelacionFaena|ObjectCollection $tRelacionFaena The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCargoQuery The current query, for fluid interface
     */
    public function filterByTRelacionFaena($tRelacionFaena, $comparison = null)
    {
        if ($tRelacionFaena instanceof \TRelacionFaena) {
            return $this
                ->addUsingAlias(CargoTableMap::COL_CARG_T_RELACION_FAENA, $tRelacionFaena->getTrefaTipo(), $comparison);
        } elseif ($tRelacionFaena instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CargoTableMap::COL_CARG_T_RELACION_FAENA, $tRelacionFaena->toKeyValue('PrimaryKey', 'TrefaTipo'), $comparison);
        } else {
            throw new PropelException('filterByTRelacionFaena() only accepts arguments of type \TRelacionFaena or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TRelacionFaena relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function joinTRelacionFaena($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TRelacionFaena');

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
            $this->addJoinObject($join, 'TRelacionFaena');
        }

        return $this;
    }

    /**
     * Use the TRelacionFaena relation TRelacionFaena object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TRelacionFaenaQuery A secondary query class using the current class as primary query
     */
    public function useTRelacionFaenaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTRelacionFaena($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TRelacionFaena', '\TRelacionFaenaQuery');
    }

    /**
     * Filter the query by a related \ActividadCargo object
     *
     * @param \ActividadCargo|ObjectCollection $actividadCargo the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCargoQuery The current query, for fluid interface
     */
    public function filterByActividadCargo($actividadCargo, $comparison = null)
    {
        if ($actividadCargo instanceof \ActividadCargo) {
            return $this
                ->addUsingAlias(CargoTableMap::COL_CARG_CODIGO, $actividadCargo->getAccaCCargo(), $comparison);
        } elseif ($actividadCargo instanceof ObjectCollection) {
            return $this
                ->useActividadCargoQuery()
                ->filterByPrimaryKeys($actividadCargo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActividadCargo() only accepts arguments of type \ActividadCargo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActividadCargo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function joinActividadCargo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActividadCargo');

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
            $this->addJoinObject($join, 'ActividadCargo');
        }

        return $this;
    }

    /**
     * Use the ActividadCargo relation ActividadCargo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ActividadCargoQuery A secondary query class using the current class as primary query
     */
    public function useActividadCargoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActividadCargo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActividadCargo', '\ActividadCargoQuery');
    }

    /**
     * Filter the query by a related \CargoGrupoSence object
     *
     * @param \CargoGrupoSence|ObjectCollection $cargoGrupoSence the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCargoQuery The current query, for fluid interface
     */
    public function filterByCargoGrupoSence($cargoGrupoSence, $comparison = null)
    {
        if ($cargoGrupoSence instanceof \CargoGrupoSence) {
            return $this
                ->addUsingAlias(CargoTableMap::COL_CARG_CODIGO, $cargoGrupoSence->getCagrseCCargo(), $comparison);
        } elseif ($cargoGrupoSence instanceof ObjectCollection) {
            return $this
                ->useCargoGrupoSenceQuery()
                ->filterByPrimaryKeys($cargoGrupoSence->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCargoGrupoSence() only accepts arguments of type \CargoGrupoSence or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CargoGrupoSence relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function joinCargoGrupoSence($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CargoGrupoSence');

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
            $this->addJoinObject($join, 'CargoGrupoSence');
        }

        return $this;
    }

    /**
     * Use the CargoGrupoSence relation CargoGrupoSence object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CargoGrupoSenceQuery A secondary query class using the current class as primary query
     */
    public function useCargoGrupoSenceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCargoGrupoSence($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CargoGrupoSence', '\CargoGrupoSenceQuery');
    }

    /**
     * Filter the query by a related \Trabajador object
     *
     * @param \Trabajador|ObjectCollection $trabajador the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCargoQuery The current query, for fluid interface
     */
    public function filterByTrabajador($trabajador, $comparison = null)
    {
        if ($trabajador instanceof \Trabajador) {
            return $this
                ->addUsingAlias(CargoTableMap::COL_CARG_CODIGO, $trabajador->getTrabCCargo(), $comparison);
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
     * @return $this|ChildCargoQuery The current query, for fluid interface
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
     * @param   ChildCargo $cargo Object to remove from the list of results
     *
     * @return $this|ChildCargoQuery The current query, for fluid interface
     */
    public function prune($cargo = null)
    {
        if ($cargo) {
            $this->addUsingAlias(CargoTableMap::COL_CARG_CODIGO, $cargo->getCargCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cargo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CargoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CargoTableMap::clearInstancePool();
            CargoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CargoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CargoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CargoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CargoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CargoQuery
