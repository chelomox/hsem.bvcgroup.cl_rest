<?php

namespace Base;

use \Trabajador as ChildTrabajador;
use \TrabajadorQuery as ChildTrabajadorQuery;
use \Exception;
use \PDO;
use Map\TrabajadorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'trabajador' table.
 *
 *
 *
 * @method     ChildTrabajadorQuery orderByTrabCodigo($order = Criteria::ASC) Order by the trab_codigo column
 * @method     ChildTrabajadorQuery orderByTrabCPersona($order = Criteria::ASC) Order by the trab_c_persona column
 * @method     ChildTrabajadorQuery orderByTrabCCargo($order = Criteria::ASC) Order by the trab_c_cargo column
 * @method     ChildTrabajadorQuery orderByTrabCGerencia($order = Criteria::ASC) Order by the trab_c_gerencia column
 * @method     ChildTrabajadorQuery orderByTrabCArea($order = Criteria::ASC) Order by the trab_c_area column
 * @method     ChildTrabajadorQuery orderByTrabCAniosExperienciaCargo($order = Criteria::ASC) Order by the trab_c_anios_experiencia_cargo column
 * @method     ChildTrabajadorQuery orderByTrabFechaInicio($order = Criteria::ASC) Order by the trab_fecha_inicio column
 * @method     ChildTrabajadorQuery orderByTrabFechaTermino($order = Criteria::ASC) Order by the trab_fecha_termino column
 * @method     ChildTrabajadorQuery orderByTrabVigente($order = Criteria::ASC) Order by the trab_vigente column
 * @method     ChildTrabajadorQuery orderByTrabRFechaCreacion($order = Criteria::ASC) Order by the trab_r_fecha_creacion column
 * @method     ChildTrabajadorQuery orderByTrabRFechaModificacion($order = Criteria::ASC) Order by the trab_r_fecha_modificacion column
 * @method     ChildTrabajadorQuery orderByTrabRUsuario($order = Criteria::ASC) Order by the trab_r_usuario column
 *
 * @method     ChildTrabajadorQuery groupByTrabCodigo() Group by the trab_codigo column
 * @method     ChildTrabajadorQuery groupByTrabCPersona() Group by the trab_c_persona column
 * @method     ChildTrabajadorQuery groupByTrabCCargo() Group by the trab_c_cargo column
 * @method     ChildTrabajadorQuery groupByTrabCGerencia() Group by the trab_c_gerencia column
 * @method     ChildTrabajadorQuery groupByTrabCArea() Group by the trab_c_area column
 * @method     ChildTrabajadorQuery groupByTrabCAniosExperienciaCargo() Group by the trab_c_anios_experiencia_cargo column
 * @method     ChildTrabajadorQuery groupByTrabFechaInicio() Group by the trab_fecha_inicio column
 * @method     ChildTrabajadorQuery groupByTrabFechaTermino() Group by the trab_fecha_termino column
 * @method     ChildTrabajadorQuery groupByTrabVigente() Group by the trab_vigente column
 * @method     ChildTrabajadorQuery groupByTrabRFechaCreacion() Group by the trab_r_fecha_creacion column
 * @method     ChildTrabajadorQuery groupByTrabRFechaModificacion() Group by the trab_r_fecha_modificacion column
 * @method     ChildTrabajadorQuery groupByTrabRUsuario() Group by the trab_r_usuario column
 *
 * @method     ChildTrabajadorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTrabajadorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTrabajadorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTrabajadorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTrabajadorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTrabajadorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTrabajadorQuery leftJoinAniosExperienciaCargo($relationAlias = null) Adds a LEFT JOIN clause to the query using the AniosExperienciaCargo relation
 * @method     ChildTrabajadorQuery rightJoinAniosExperienciaCargo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AniosExperienciaCargo relation
 * @method     ChildTrabajadorQuery innerJoinAniosExperienciaCargo($relationAlias = null) Adds a INNER JOIN clause to the query using the AniosExperienciaCargo relation
 *
 * @method     ChildTrabajadorQuery joinWithAniosExperienciaCargo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AniosExperienciaCargo relation
 *
 * @method     ChildTrabajadorQuery leftJoinWithAniosExperienciaCargo() Adds a LEFT JOIN clause and with to the query using the AniosExperienciaCargo relation
 * @method     ChildTrabajadorQuery rightJoinWithAniosExperienciaCargo() Adds a RIGHT JOIN clause and with to the query using the AniosExperienciaCargo relation
 * @method     ChildTrabajadorQuery innerJoinWithAniosExperienciaCargo() Adds a INNER JOIN clause and with to the query using the AniosExperienciaCargo relation
 *
 * @method     ChildTrabajadorQuery leftJoinArea($relationAlias = null) Adds a LEFT JOIN clause to the query using the Area relation
 * @method     ChildTrabajadorQuery rightJoinArea($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Area relation
 * @method     ChildTrabajadorQuery innerJoinArea($relationAlias = null) Adds a INNER JOIN clause to the query using the Area relation
 *
 * @method     ChildTrabajadorQuery joinWithArea($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Area relation
 *
 * @method     ChildTrabajadorQuery leftJoinWithArea() Adds a LEFT JOIN clause and with to the query using the Area relation
 * @method     ChildTrabajadorQuery rightJoinWithArea() Adds a RIGHT JOIN clause and with to the query using the Area relation
 * @method     ChildTrabajadorQuery innerJoinWithArea() Adds a INNER JOIN clause and with to the query using the Area relation
 *
 * @method     ChildTrabajadorQuery leftJoinCargo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cargo relation
 * @method     ChildTrabajadorQuery rightJoinCargo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cargo relation
 * @method     ChildTrabajadorQuery innerJoinCargo($relationAlias = null) Adds a INNER JOIN clause to the query using the Cargo relation
 *
 * @method     ChildTrabajadorQuery joinWithCargo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cargo relation
 *
 * @method     ChildTrabajadorQuery leftJoinWithCargo() Adds a LEFT JOIN clause and with to the query using the Cargo relation
 * @method     ChildTrabajadorQuery rightJoinWithCargo() Adds a RIGHT JOIN clause and with to the query using the Cargo relation
 * @method     ChildTrabajadorQuery innerJoinWithCargo() Adds a INNER JOIN clause and with to the query using the Cargo relation
 *
 * @method     ChildTrabajadorQuery leftJoinGerencia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Gerencia relation
 * @method     ChildTrabajadorQuery rightJoinGerencia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Gerencia relation
 * @method     ChildTrabajadorQuery innerJoinGerencia($relationAlias = null) Adds a INNER JOIN clause to the query using the Gerencia relation
 *
 * @method     ChildTrabajadorQuery joinWithGerencia($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Gerencia relation
 *
 * @method     ChildTrabajadorQuery leftJoinWithGerencia() Adds a LEFT JOIN clause and with to the query using the Gerencia relation
 * @method     ChildTrabajadorQuery rightJoinWithGerencia() Adds a RIGHT JOIN clause and with to the query using the Gerencia relation
 * @method     ChildTrabajadorQuery innerJoinWithGerencia() Adds a INNER JOIN clause and with to the query using the Gerencia relation
 *
 * @method     ChildTrabajadorQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     ChildTrabajadorQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     ChildTrabajadorQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     ChildTrabajadorQuery joinWithPersona($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Persona relation
 *
 * @method     ChildTrabajadorQuery leftJoinWithPersona() Adds a LEFT JOIN clause and with to the query using the Persona relation
 * @method     ChildTrabajadorQuery rightJoinWithPersona() Adds a RIGHT JOIN clause and with to the query using the Persona relation
 * @method     ChildTrabajadorQuery innerJoinWithPersona() Adds a INNER JOIN clause and with to the query using the Persona relation
 *
 * @method     ChildTrabajadorQuery leftJoinInscripcion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inscripcion relation
 * @method     ChildTrabajadorQuery rightJoinInscripcion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inscripcion relation
 * @method     ChildTrabajadorQuery innerJoinInscripcion($relationAlias = null) Adds a INNER JOIN clause to the query using the Inscripcion relation
 *
 * @method     ChildTrabajadorQuery joinWithInscripcion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Inscripcion relation
 *
 * @method     ChildTrabajadorQuery leftJoinWithInscripcion() Adds a LEFT JOIN clause and with to the query using the Inscripcion relation
 * @method     ChildTrabajadorQuery rightJoinWithInscripcion() Adds a RIGHT JOIN clause and with to the query using the Inscripcion relation
 * @method     ChildTrabajadorQuery innerJoinWithInscripcion() Adds a INNER JOIN clause and with to the query using the Inscripcion relation
 *
 * @method     \AniosExperienciaCargoQuery|\AreaQuery|\CargoQuery|\GerenciaQuery|\PersonaQuery|\InscripcionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTrabajador findOne(ConnectionInterface $con = null) Return the first ChildTrabajador matching the query
 * @method     ChildTrabajador findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTrabajador matching the query, or a new ChildTrabajador object populated from the query conditions when no match is found
 *
 * @method     ChildTrabajador findOneByTrabCodigo(int $trab_codigo) Return the first ChildTrabajador filtered by the trab_codigo column
 * @method     ChildTrabajador findOneByTrabCPersona(int $trab_c_persona) Return the first ChildTrabajador filtered by the trab_c_persona column
 * @method     ChildTrabajador findOneByTrabCCargo(int $trab_c_cargo) Return the first ChildTrabajador filtered by the trab_c_cargo column
 * @method     ChildTrabajador findOneByTrabCGerencia(int $trab_c_gerencia) Return the first ChildTrabajador filtered by the trab_c_gerencia column
 * @method     ChildTrabajador findOneByTrabCArea(int $trab_c_area) Return the first ChildTrabajador filtered by the trab_c_area column
 * @method     ChildTrabajador findOneByTrabCAniosExperienciaCargo(int $trab_c_anios_experiencia_cargo) Return the first ChildTrabajador filtered by the trab_c_anios_experiencia_cargo column
 * @method     ChildTrabajador findOneByTrabFechaInicio(string $trab_fecha_inicio) Return the first ChildTrabajador filtered by the trab_fecha_inicio column
 * @method     ChildTrabajador findOneByTrabFechaTermino(string $trab_fecha_termino) Return the first ChildTrabajador filtered by the trab_fecha_termino column
 * @method     ChildTrabajador findOneByTrabVigente(int $trab_vigente) Return the first ChildTrabajador filtered by the trab_vigente column
 * @method     ChildTrabajador findOneByTrabRFechaCreacion(string $trab_r_fecha_creacion) Return the first ChildTrabajador filtered by the trab_r_fecha_creacion column
 * @method     ChildTrabajador findOneByTrabRFechaModificacion(string $trab_r_fecha_modificacion) Return the first ChildTrabajador filtered by the trab_r_fecha_modificacion column
 * @method     ChildTrabajador findOneByTrabRUsuario(int $trab_r_usuario) Return the first ChildTrabajador filtered by the trab_r_usuario column *

 * @method     ChildTrabajador requirePk($key, ConnectionInterface $con = null) Return the ChildTrabajador by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOne(ConnectionInterface $con = null) Return the first ChildTrabajador matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTrabajador requireOneByTrabCodigo(int $trab_codigo) Return the first ChildTrabajador filtered by the trab_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOneByTrabCPersona(int $trab_c_persona) Return the first ChildTrabajador filtered by the trab_c_persona column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOneByTrabCCargo(int $trab_c_cargo) Return the first ChildTrabajador filtered by the trab_c_cargo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOneByTrabCGerencia(int $trab_c_gerencia) Return the first ChildTrabajador filtered by the trab_c_gerencia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOneByTrabCArea(int $trab_c_area) Return the first ChildTrabajador filtered by the trab_c_area column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOneByTrabCAniosExperienciaCargo(int $trab_c_anios_experiencia_cargo) Return the first ChildTrabajador filtered by the trab_c_anios_experiencia_cargo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOneByTrabFechaInicio(string $trab_fecha_inicio) Return the first ChildTrabajador filtered by the trab_fecha_inicio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOneByTrabFechaTermino(string $trab_fecha_termino) Return the first ChildTrabajador filtered by the trab_fecha_termino column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOneByTrabVigente(int $trab_vigente) Return the first ChildTrabajador filtered by the trab_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOneByTrabRFechaCreacion(string $trab_r_fecha_creacion) Return the first ChildTrabajador filtered by the trab_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOneByTrabRFechaModificacion(string $trab_r_fecha_modificacion) Return the first ChildTrabajador filtered by the trab_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTrabajador requireOneByTrabRUsuario(int $trab_r_usuario) Return the first ChildTrabajador filtered by the trab_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTrabajador[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTrabajador objects based on current ModelCriteria
 * @method     ChildTrabajador[]|ObjectCollection findByTrabCodigo(int $trab_codigo) Return ChildTrabajador objects filtered by the trab_codigo column
 * @method     ChildTrabajador[]|ObjectCollection findByTrabCPersona(int $trab_c_persona) Return ChildTrabajador objects filtered by the trab_c_persona column
 * @method     ChildTrabajador[]|ObjectCollection findByTrabCCargo(int $trab_c_cargo) Return ChildTrabajador objects filtered by the trab_c_cargo column
 * @method     ChildTrabajador[]|ObjectCollection findByTrabCGerencia(int $trab_c_gerencia) Return ChildTrabajador objects filtered by the trab_c_gerencia column
 * @method     ChildTrabajador[]|ObjectCollection findByTrabCArea(int $trab_c_area) Return ChildTrabajador objects filtered by the trab_c_area column
 * @method     ChildTrabajador[]|ObjectCollection findByTrabCAniosExperienciaCargo(int $trab_c_anios_experiencia_cargo) Return ChildTrabajador objects filtered by the trab_c_anios_experiencia_cargo column
 * @method     ChildTrabajador[]|ObjectCollection findByTrabFechaInicio(string $trab_fecha_inicio) Return ChildTrabajador objects filtered by the trab_fecha_inicio column
 * @method     ChildTrabajador[]|ObjectCollection findByTrabFechaTermino(string $trab_fecha_termino) Return ChildTrabajador objects filtered by the trab_fecha_termino column
 * @method     ChildTrabajador[]|ObjectCollection findByTrabVigente(int $trab_vigente) Return ChildTrabajador objects filtered by the trab_vigente column
 * @method     ChildTrabajador[]|ObjectCollection findByTrabRFechaCreacion(string $trab_r_fecha_creacion) Return ChildTrabajador objects filtered by the trab_r_fecha_creacion column
 * @method     ChildTrabajador[]|ObjectCollection findByTrabRFechaModificacion(string $trab_r_fecha_modificacion) Return ChildTrabajador objects filtered by the trab_r_fecha_modificacion column
 * @method     ChildTrabajador[]|ObjectCollection findByTrabRUsuario(int $trab_r_usuario) Return ChildTrabajador objects filtered by the trab_r_usuario column
 * @method     ChildTrabajador[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TrabajadorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TrabajadorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Trabajador', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTrabajadorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTrabajadorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTrabajadorQuery) {
            return $criteria;
        }
        $query = new ChildTrabajadorQuery();
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
     * @return ChildTrabajador|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TrabajadorTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TrabajadorTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTrabajador A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT trab_codigo, trab_c_persona, trab_c_cargo, trab_c_gerencia, trab_c_area, trab_c_anios_experiencia_cargo, trab_fecha_inicio, trab_fecha_termino, trab_vigente, trab_r_fecha_creacion, trab_r_fecha_modificacion, trab_r_usuario FROM trabajador WHERE trab_codigo = :p0';
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
            /** @var ChildTrabajador $obj */
            $obj = new ChildTrabajador();
            $obj->hydrate($row);
            TrabajadorTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTrabajador|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the trab_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabCodigo(1234); // WHERE trab_codigo = 1234
     * $query->filterByTrabCodigo(array(12, 34)); // WHERE trab_codigo IN (12, 34)
     * $query->filterByTrabCodigo(array('min' => 12)); // WHERE trab_codigo > 12
     * </code>
     *
     * @param     mixed $trabCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabCodigo($trabCodigo = null, $comparison = null)
    {
        if (is_array($trabCodigo)) {
            $useMinMax = false;
            if (isset($trabCodigo['min'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_CODIGO, $trabCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trabCodigo['max'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_CODIGO, $trabCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_CODIGO, $trabCodigo, $comparison);
    }

    /**
     * Filter the query on the trab_c_persona column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabCPersona(1234); // WHERE trab_c_persona = 1234
     * $query->filterByTrabCPersona(array(12, 34)); // WHERE trab_c_persona IN (12, 34)
     * $query->filterByTrabCPersona(array('min' => 12)); // WHERE trab_c_persona > 12
     * </code>
     *
     * @see       filterByPersona()
     *
     * @param     mixed $trabCPersona The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabCPersona($trabCPersona = null, $comparison = null)
    {
        if (is_array($trabCPersona)) {
            $useMinMax = false;
            if (isset($trabCPersona['min'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_PERSONA, $trabCPersona['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trabCPersona['max'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_PERSONA, $trabCPersona['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_PERSONA, $trabCPersona, $comparison);
    }

    /**
     * Filter the query on the trab_c_cargo column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabCCargo(1234); // WHERE trab_c_cargo = 1234
     * $query->filterByTrabCCargo(array(12, 34)); // WHERE trab_c_cargo IN (12, 34)
     * $query->filterByTrabCCargo(array('min' => 12)); // WHERE trab_c_cargo > 12
     * </code>
     *
     * @see       filterByCargo()
     *
     * @param     mixed $trabCCargo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabCCargo($trabCCargo = null, $comparison = null)
    {
        if (is_array($trabCCargo)) {
            $useMinMax = false;
            if (isset($trabCCargo['min'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_CARGO, $trabCCargo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trabCCargo['max'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_CARGO, $trabCCargo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_CARGO, $trabCCargo, $comparison);
    }

    /**
     * Filter the query on the trab_c_gerencia column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabCGerencia(1234); // WHERE trab_c_gerencia = 1234
     * $query->filterByTrabCGerencia(array(12, 34)); // WHERE trab_c_gerencia IN (12, 34)
     * $query->filterByTrabCGerencia(array('min' => 12)); // WHERE trab_c_gerencia > 12
     * </code>
     *
     * @see       filterByGerencia()
     *
     * @param     mixed $trabCGerencia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabCGerencia($trabCGerencia = null, $comparison = null)
    {
        if (is_array($trabCGerencia)) {
            $useMinMax = false;
            if (isset($trabCGerencia['min'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_GERENCIA, $trabCGerencia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trabCGerencia['max'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_GERENCIA, $trabCGerencia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_GERENCIA, $trabCGerencia, $comparison);
    }

    /**
     * Filter the query on the trab_c_area column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabCArea(1234); // WHERE trab_c_area = 1234
     * $query->filterByTrabCArea(array(12, 34)); // WHERE trab_c_area IN (12, 34)
     * $query->filterByTrabCArea(array('min' => 12)); // WHERE trab_c_area > 12
     * </code>
     *
     * @see       filterByArea()
     *
     * @param     mixed $trabCArea The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabCArea($trabCArea = null, $comparison = null)
    {
        if (is_array($trabCArea)) {
            $useMinMax = false;
            if (isset($trabCArea['min'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_AREA, $trabCArea['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trabCArea['max'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_AREA, $trabCArea['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_AREA, $trabCArea, $comparison);
    }

    /**
     * Filter the query on the trab_c_anios_experiencia_cargo column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabCAniosExperienciaCargo(1234); // WHERE trab_c_anios_experiencia_cargo = 1234
     * $query->filterByTrabCAniosExperienciaCargo(array(12, 34)); // WHERE trab_c_anios_experiencia_cargo IN (12, 34)
     * $query->filterByTrabCAniosExperienciaCargo(array('min' => 12)); // WHERE trab_c_anios_experiencia_cargo > 12
     * </code>
     *
     * @see       filterByAniosExperienciaCargo()
     *
     * @param     mixed $trabCAniosExperienciaCargo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabCAniosExperienciaCargo($trabCAniosExperienciaCargo = null, $comparison = null)
    {
        if (is_array($trabCAniosExperienciaCargo)) {
            $useMinMax = false;
            if (isset($trabCAniosExperienciaCargo['min'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO, $trabCAniosExperienciaCargo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trabCAniosExperienciaCargo['max'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO, $trabCAniosExperienciaCargo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO, $trabCAniosExperienciaCargo, $comparison);
    }

    /**
     * Filter the query on the trab_fecha_inicio column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabFechaInicio('fooValue');   // WHERE trab_fecha_inicio = 'fooValue'
     * $query->filterByTrabFechaInicio('%fooValue%', Criteria::LIKE); // WHERE trab_fecha_inicio LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trabFechaInicio The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabFechaInicio($trabFechaInicio = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trabFechaInicio)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_FECHA_INICIO, $trabFechaInicio, $comparison);
    }

    /**
     * Filter the query on the trab_fecha_termino column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabFechaTermino('fooValue');   // WHERE trab_fecha_termino = 'fooValue'
     * $query->filterByTrabFechaTermino('%fooValue%', Criteria::LIKE); // WHERE trab_fecha_termino LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trabFechaTermino The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabFechaTermino($trabFechaTermino = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trabFechaTermino)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_FECHA_TERMINO, $trabFechaTermino, $comparison);
    }

    /**
     * Filter the query on the trab_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabVigente(1234); // WHERE trab_vigente = 1234
     * $query->filterByTrabVigente(array(12, 34)); // WHERE trab_vigente IN (12, 34)
     * $query->filterByTrabVigente(array('min' => 12)); // WHERE trab_vigente > 12
     * </code>
     *
     * @param     mixed $trabVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabVigente($trabVigente = null, $comparison = null)
    {
        if (is_array($trabVigente)) {
            $useMinMax = false;
            if (isset($trabVigente['min'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_VIGENTE, $trabVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trabVigente['max'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_VIGENTE, $trabVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_VIGENTE, $trabVigente, $comparison);
    }

    /**
     * Filter the query on the trab_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabRFechaCreacion('2011-03-14'); // WHERE trab_r_fecha_creacion = '2011-03-14'
     * $query->filterByTrabRFechaCreacion('now'); // WHERE trab_r_fecha_creacion = '2011-03-14'
     * $query->filterByTrabRFechaCreacion(array('max' => 'yesterday')); // WHERE trab_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $trabRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabRFechaCreacion($trabRFechaCreacion = null, $comparison = null)
    {
        if (is_array($trabRFechaCreacion)) {
            $useMinMax = false;
            if (isset($trabRFechaCreacion['min'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_R_FECHA_CREACION, $trabRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trabRFechaCreacion['max'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_R_FECHA_CREACION, $trabRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_R_FECHA_CREACION, $trabRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the trab_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabRFechaModificacion('2011-03-14'); // WHERE trab_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTrabRFechaModificacion('now'); // WHERE trab_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTrabRFechaModificacion(array('max' => 'yesterday')); // WHERE trab_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $trabRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabRFechaModificacion($trabRFechaModificacion = null, $comparison = null)
    {
        if (is_array($trabRFechaModificacion)) {
            $useMinMax = false;
            if (isset($trabRFechaModificacion['min'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_R_FECHA_MODIFICACION, $trabRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trabRFechaModificacion['max'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_R_FECHA_MODIFICACION, $trabRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_R_FECHA_MODIFICACION, $trabRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the trab_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTrabRUsuario(1234); // WHERE trab_r_usuario = 1234
     * $query->filterByTrabRUsuario(array(12, 34)); // WHERE trab_r_usuario IN (12, 34)
     * $query->filterByTrabRUsuario(array('min' => 12)); // WHERE trab_r_usuario > 12
     * </code>
     *
     * @param     mixed $trabRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByTrabRUsuario($trabRUsuario = null, $comparison = null)
    {
        if (is_array($trabRUsuario)) {
            $useMinMax = false;
            if (isset($trabRUsuario['min'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_R_USUARIO, $trabRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trabRUsuario['max'])) {
                $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_R_USUARIO, $trabRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_R_USUARIO, $trabRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \AniosExperienciaCargo object
     *
     * @param \AniosExperienciaCargo|ObjectCollection $aniosExperienciaCargo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByAniosExperienciaCargo($aniosExperienciaCargo, $comparison = null)
    {
        if ($aniosExperienciaCargo instanceof \AniosExperienciaCargo) {
            return $this
                ->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO, $aniosExperienciaCargo->getAnexcaCodigo(), $comparison);
        } elseif ($aniosExperienciaCargo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO, $aniosExperienciaCargo->toKeyValue('PrimaryKey', 'AnexcaCodigo'), $comparison);
        } else {
            throw new PropelException('filterByAniosExperienciaCargo() only accepts arguments of type \AniosExperienciaCargo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AniosExperienciaCargo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function joinAniosExperienciaCargo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AniosExperienciaCargo');

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
            $this->addJoinObject($join, 'AniosExperienciaCargo');
        }

        return $this;
    }

    /**
     * Use the AniosExperienciaCargo relation AniosExperienciaCargo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AniosExperienciaCargoQuery A secondary query class using the current class as primary query
     */
    public function useAniosExperienciaCargoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAniosExperienciaCargo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AniosExperienciaCargo', '\AniosExperienciaCargoQuery');
    }

    /**
     * Filter the query by a related \Area object
     *
     * @param \Area|ObjectCollection $area The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByArea($area, $comparison = null)
    {
        if ($area instanceof \Area) {
            return $this
                ->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_AREA, $area->getAreaCodigo(), $comparison);
        } elseif ($area instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_AREA, $area->toKeyValue('PrimaryKey', 'AreaCodigo'), $comparison);
        } else {
            throw new PropelException('filterByArea() only accepts arguments of type \Area or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Area relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function joinArea($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Area');

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
            $this->addJoinObject($join, 'Area');
        }

        return $this;
    }

    /**
     * Use the Area relation Area object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AreaQuery A secondary query class using the current class as primary query
     */
    public function useAreaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArea($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Area', '\AreaQuery');
    }

    /**
     * Filter the query by a related \Cargo object
     *
     * @param \Cargo|ObjectCollection $cargo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByCargo($cargo, $comparison = null)
    {
        if ($cargo instanceof \Cargo) {
            return $this
                ->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_CARGO, $cargo->getCargCodigo(), $comparison);
        } elseif ($cargo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_CARGO, $cargo->toKeyValue('PrimaryKey', 'CargCodigo'), $comparison);
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
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function joinCargo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useCargoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCargo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cargo', '\CargoQuery');
    }

    /**
     * Filter the query by a related \Gerencia object
     *
     * @param \Gerencia|ObjectCollection $gerencia The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByGerencia($gerencia, $comparison = null)
    {
        if ($gerencia instanceof \Gerencia) {
            return $this
                ->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_GERENCIA, $gerencia->getGereCodigo(), $comparison);
        } elseif ($gerencia instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_GERENCIA, $gerencia->toKeyValue('PrimaryKey', 'GereCodigo'), $comparison);
        } else {
            throw new PropelException('filterByGerencia() only accepts arguments of type \Gerencia or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Gerencia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function joinGerencia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Gerencia');

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
            $this->addJoinObject($join, 'Gerencia');
        }

        return $this;
    }

    /**
     * Use the Gerencia relation Gerencia object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \GerenciaQuery A secondary query class using the current class as primary query
     */
    public function useGerenciaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGerencia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Gerencia', '\GerenciaQuery');
    }

    /**
     * Filter the query by a related \Persona object
     *
     * @param \Persona|ObjectCollection $persona The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByPersona($persona, $comparison = null)
    {
        if ($persona instanceof \Persona) {
            return $this
                ->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_PERSONA, $persona->getPersCodigo(), $comparison);
        } elseif ($persona instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrabajadorTableMap::COL_TRAB_C_PERSONA, $persona->toKeyValue('PrimaryKey', 'PersCodigo'), $comparison);
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
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
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
     * Filter the query by a related \Inscripcion object
     *
     * @param \Inscripcion|ObjectCollection $inscripcion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTrabajadorQuery The current query, for fluid interface
     */
    public function filterByInscripcion($inscripcion, $comparison = null)
    {
        if ($inscripcion instanceof \Inscripcion) {
            return $this
                ->addUsingAlias(TrabajadorTableMap::COL_TRAB_CODIGO, $inscripcion->getInscCTrabajador(), $comparison);
        } elseif ($inscripcion instanceof ObjectCollection) {
            return $this
                ->useInscripcionQuery()
                ->filterByPrimaryKeys($inscripcion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInscripcion() only accepts arguments of type \Inscripcion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Inscripcion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function joinInscripcion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Inscripcion');

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
            $this->addJoinObject($join, 'Inscripcion');
        }

        return $this;
    }

    /**
     * Use the Inscripcion relation Inscripcion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InscripcionQuery A secondary query class using the current class as primary query
     */
    public function useInscripcionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInscripcion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Inscripcion', '\InscripcionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTrabajador $trabajador Object to remove from the list of results
     *
     * @return $this|ChildTrabajadorQuery The current query, for fluid interface
     */
    public function prune($trabajador = null)
    {
        if ($trabajador) {
            $this->addUsingAlias(TrabajadorTableMap::COL_TRAB_CODIGO, $trabajador->getTrabCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the trabajador table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TrabajadorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TrabajadorTableMap::clearInstancePool();
            TrabajadorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TrabajadorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TrabajadorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TrabajadorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TrabajadorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TrabajadorQuery
