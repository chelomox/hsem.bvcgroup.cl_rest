<?php

namespace Base;

use \Direccion as ChildDireccion;
use \DireccionQuery as ChildDireccionQuery;
use \Exception;
use \PDO;
use Map\DireccionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'direccion' table.
 *
 *
 *
 * @method     ChildDireccionQuery orderByDireCPersona($order = Criteria::ASC) Order by the dire_c_persona column
 * @method     ChildDireccionQuery orderByDireTDireccion($order = Criteria::ASC) Order by the dire_t_direccion column
 * @method     ChildDireccionQuery orderByDireCComuna($order = Criteria::ASC) Order by the dire_c_comuna column
 * @method     ChildDireccionQuery orderByDireCPais($order = Criteria::ASC) Order by the dire_c_pais column
 * @method     ChildDireccionQuery orderByDireDetalle($order = Criteria::ASC) Order by the dire_detalle column
 * @method     ChildDireccionQuery orderByDireCodigoPostal($order = Criteria::ASC) Order by the dire_codigo_postal column
 * @method     ChildDireccionQuery orderByDireTelefono($order = Criteria::ASC) Order by the dire_telefono column
 * @method     ChildDireccionQuery orderByDireRFechaCreacion($order = Criteria::ASC) Order by the dire_r_fecha_creacion column
 * @method     ChildDireccionQuery orderByDireRFechaModificacion($order = Criteria::ASC) Order by the dire_r_fecha_modificacion column
 * @method     ChildDireccionQuery orderByDireRUsuario($order = Criteria::ASC) Order by the dire_r_usuario column
 *
 * @method     ChildDireccionQuery groupByDireCPersona() Group by the dire_c_persona column
 * @method     ChildDireccionQuery groupByDireTDireccion() Group by the dire_t_direccion column
 * @method     ChildDireccionQuery groupByDireCComuna() Group by the dire_c_comuna column
 * @method     ChildDireccionQuery groupByDireCPais() Group by the dire_c_pais column
 * @method     ChildDireccionQuery groupByDireDetalle() Group by the dire_detalle column
 * @method     ChildDireccionQuery groupByDireCodigoPostal() Group by the dire_codigo_postal column
 * @method     ChildDireccionQuery groupByDireTelefono() Group by the dire_telefono column
 * @method     ChildDireccionQuery groupByDireRFechaCreacion() Group by the dire_r_fecha_creacion column
 * @method     ChildDireccionQuery groupByDireRFechaModificacion() Group by the dire_r_fecha_modificacion column
 * @method     ChildDireccionQuery groupByDireRUsuario() Group by the dire_r_usuario column
 *
 * @method     ChildDireccionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDireccionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDireccionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDireccionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDireccionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDireccionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDireccionQuery leftJoinComuna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comuna relation
 * @method     ChildDireccionQuery rightJoinComuna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comuna relation
 * @method     ChildDireccionQuery innerJoinComuna($relationAlias = null) Adds a INNER JOIN clause to the query using the Comuna relation
 *
 * @method     ChildDireccionQuery joinWithComuna($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Comuna relation
 *
 * @method     ChildDireccionQuery leftJoinWithComuna() Adds a LEFT JOIN clause and with to the query using the Comuna relation
 * @method     ChildDireccionQuery rightJoinWithComuna() Adds a RIGHT JOIN clause and with to the query using the Comuna relation
 * @method     ChildDireccionQuery innerJoinWithComuna() Adds a INNER JOIN clause and with to the query using the Comuna relation
 *
 * @method     ChildDireccionQuery leftJoinPais($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pais relation
 * @method     ChildDireccionQuery rightJoinPais($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pais relation
 * @method     ChildDireccionQuery innerJoinPais($relationAlias = null) Adds a INNER JOIN clause to the query using the Pais relation
 *
 * @method     ChildDireccionQuery joinWithPais($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pais relation
 *
 * @method     ChildDireccionQuery leftJoinWithPais() Adds a LEFT JOIN clause and with to the query using the Pais relation
 * @method     ChildDireccionQuery rightJoinWithPais() Adds a RIGHT JOIN clause and with to the query using the Pais relation
 * @method     ChildDireccionQuery innerJoinWithPais() Adds a INNER JOIN clause and with to the query using the Pais relation
 *
 * @method     ChildDireccionQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     ChildDireccionQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     ChildDireccionQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     ChildDireccionQuery joinWithPersona($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Persona relation
 *
 * @method     ChildDireccionQuery leftJoinWithPersona() Adds a LEFT JOIN clause and with to the query using the Persona relation
 * @method     ChildDireccionQuery rightJoinWithPersona() Adds a RIGHT JOIN clause and with to the query using the Persona relation
 * @method     ChildDireccionQuery innerJoinWithPersona() Adds a INNER JOIN clause and with to the query using the Persona relation
 *
 * @method     ChildDireccionQuery leftJoinTDireccion($relationAlias = null) Adds a LEFT JOIN clause to the query using the TDireccion relation
 * @method     ChildDireccionQuery rightJoinTDireccion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TDireccion relation
 * @method     ChildDireccionQuery innerJoinTDireccion($relationAlias = null) Adds a INNER JOIN clause to the query using the TDireccion relation
 *
 * @method     ChildDireccionQuery joinWithTDireccion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TDireccion relation
 *
 * @method     ChildDireccionQuery leftJoinWithTDireccion() Adds a LEFT JOIN clause and with to the query using the TDireccion relation
 * @method     ChildDireccionQuery rightJoinWithTDireccion() Adds a RIGHT JOIN clause and with to the query using the TDireccion relation
 * @method     ChildDireccionQuery innerJoinWithTDireccion() Adds a INNER JOIN clause and with to the query using the TDireccion relation
 *
 * @method     \ComunaQuery|\PaisQuery|\PersonaQuery|\TDireccionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDireccion findOne(ConnectionInterface $con = null) Return the first ChildDireccion matching the query
 * @method     ChildDireccion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDireccion matching the query, or a new ChildDireccion object populated from the query conditions when no match is found
 *
 * @method     ChildDireccion findOneByDireCPersona(int $dire_c_persona) Return the first ChildDireccion filtered by the dire_c_persona column
 * @method     ChildDireccion findOneByDireTDireccion(int $dire_t_direccion) Return the first ChildDireccion filtered by the dire_t_direccion column
 * @method     ChildDireccion findOneByDireCComuna(int $dire_c_comuna) Return the first ChildDireccion filtered by the dire_c_comuna column
 * @method     ChildDireccion findOneByDireCPais(int $dire_c_pais) Return the first ChildDireccion filtered by the dire_c_pais column
 * @method     ChildDireccion findOneByDireDetalle(string $dire_detalle) Return the first ChildDireccion filtered by the dire_detalle column
 * @method     ChildDireccion findOneByDireCodigoPostal(string $dire_codigo_postal) Return the first ChildDireccion filtered by the dire_codigo_postal column
 * @method     ChildDireccion findOneByDireTelefono(string $dire_telefono) Return the first ChildDireccion filtered by the dire_telefono column
 * @method     ChildDireccion findOneByDireRFechaCreacion(string $dire_r_fecha_creacion) Return the first ChildDireccion filtered by the dire_r_fecha_creacion column
 * @method     ChildDireccion findOneByDireRFechaModificacion(string $dire_r_fecha_modificacion) Return the first ChildDireccion filtered by the dire_r_fecha_modificacion column
 * @method     ChildDireccion findOneByDireRUsuario(int $dire_r_usuario) Return the first ChildDireccion filtered by the dire_r_usuario column *

 * @method     ChildDireccion requirePk($key, ConnectionInterface $con = null) Return the ChildDireccion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOne(ConnectionInterface $con = null) Return the first ChildDireccion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDireccion requireOneByDireCPersona(int $dire_c_persona) Return the first ChildDireccion filtered by the dire_c_persona column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByDireTDireccion(int $dire_t_direccion) Return the first ChildDireccion filtered by the dire_t_direccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByDireCComuna(int $dire_c_comuna) Return the first ChildDireccion filtered by the dire_c_comuna column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByDireCPais(int $dire_c_pais) Return the first ChildDireccion filtered by the dire_c_pais column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByDireDetalle(string $dire_detalle) Return the first ChildDireccion filtered by the dire_detalle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByDireCodigoPostal(string $dire_codigo_postal) Return the first ChildDireccion filtered by the dire_codigo_postal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByDireTelefono(string $dire_telefono) Return the first ChildDireccion filtered by the dire_telefono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByDireRFechaCreacion(string $dire_r_fecha_creacion) Return the first ChildDireccion filtered by the dire_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByDireRFechaModificacion(string $dire_r_fecha_modificacion) Return the first ChildDireccion filtered by the dire_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDireccion requireOneByDireRUsuario(int $dire_r_usuario) Return the first ChildDireccion filtered by the dire_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDireccion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDireccion objects based on current ModelCriteria
 * @method     ChildDireccion[]|ObjectCollection findByDireCPersona(int $dire_c_persona) Return ChildDireccion objects filtered by the dire_c_persona column
 * @method     ChildDireccion[]|ObjectCollection findByDireTDireccion(int $dire_t_direccion) Return ChildDireccion objects filtered by the dire_t_direccion column
 * @method     ChildDireccion[]|ObjectCollection findByDireCComuna(int $dire_c_comuna) Return ChildDireccion objects filtered by the dire_c_comuna column
 * @method     ChildDireccion[]|ObjectCollection findByDireCPais(int $dire_c_pais) Return ChildDireccion objects filtered by the dire_c_pais column
 * @method     ChildDireccion[]|ObjectCollection findByDireDetalle(string $dire_detalle) Return ChildDireccion objects filtered by the dire_detalle column
 * @method     ChildDireccion[]|ObjectCollection findByDireCodigoPostal(string $dire_codigo_postal) Return ChildDireccion objects filtered by the dire_codigo_postal column
 * @method     ChildDireccion[]|ObjectCollection findByDireTelefono(string $dire_telefono) Return ChildDireccion objects filtered by the dire_telefono column
 * @method     ChildDireccion[]|ObjectCollection findByDireRFechaCreacion(string $dire_r_fecha_creacion) Return ChildDireccion objects filtered by the dire_r_fecha_creacion column
 * @method     ChildDireccion[]|ObjectCollection findByDireRFechaModificacion(string $dire_r_fecha_modificacion) Return ChildDireccion objects filtered by the dire_r_fecha_modificacion column
 * @method     ChildDireccion[]|ObjectCollection findByDireRUsuario(int $dire_r_usuario) Return ChildDireccion objects filtered by the dire_r_usuario column
 * @method     ChildDireccion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DireccionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DireccionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Direccion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDireccionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDireccionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDireccionQuery) {
            return $criteria;
        }
        $query = new ChildDireccionQuery();
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
     * @param array[$dire_c_persona, $dire_t_direccion] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDireccion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DireccionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DireccionTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildDireccion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT dire_c_persona, dire_t_direccion, dire_c_comuna, dire_c_pais, dire_detalle, dire_codigo_postal, dire_telefono, dire_r_fecha_creacion, dire_r_fecha_modificacion, dire_r_usuario FROM direccion WHERE dire_c_persona = :p0 AND dire_t_direccion = :p1';
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
            /** @var ChildDireccion $obj */
            $obj = new ChildDireccion();
            $obj->hydrate($row);
            DireccionTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildDireccion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(DireccionTableMap::COL_DIRE_C_PERSONA, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(DireccionTableMap::COL_DIRE_T_DIRECCION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(DireccionTableMap::COL_DIRE_C_PERSONA, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(DireccionTableMap::COL_DIRE_T_DIRECCION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the dire_c_persona column
     *
     * Example usage:
     * <code>
     * $query->filterByDireCPersona(1234); // WHERE dire_c_persona = 1234
     * $query->filterByDireCPersona(array(12, 34)); // WHERE dire_c_persona IN (12, 34)
     * $query->filterByDireCPersona(array('min' => 12)); // WHERE dire_c_persona > 12
     * </code>
     *
     * @see       filterByPersona()
     *
     * @param     mixed $direCPersona The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByDireCPersona($direCPersona = null, $comparison = null)
    {
        if (is_array($direCPersona)) {
            $useMinMax = false;
            if (isset($direCPersona['min'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_C_PERSONA, $direCPersona['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($direCPersona['max'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_C_PERSONA, $direCPersona['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_DIRE_C_PERSONA, $direCPersona, $comparison);
    }

    /**
     * Filter the query on the dire_t_direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireTDireccion(1234); // WHERE dire_t_direccion = 1234
     * $query->filterByDireTDireccion(array(12, 34)); // WHERE dire_t_direccion IN (12, 34)
     * $query->filterByDireTDireccion(array('min' => 12)); // WHERE dire_t_direccion > 12
     * </code>
     *
     * @see       filterByTDireccion()
     *
     * @param     mixed $direTDireccion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByDireTDireccion($direTDireccion = null, $comparison = null)
    {
        if (is_array($direTDireccion)) {
            $useMinMax = false;
            if (isset($direTDireccion['min'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_T_DIRECCION, $direTDireccion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($direTDireccion['max'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_T_DIRECCION, $direTDireccion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_DIRE_T_DIRECCION, $direTDireccion, $comparison);
    }

    /**
     * Filter the query on the dire_c_comuna column
     *
     * Example usage:
     * <code>
     * $query->filterByDireCComuna(1234); // WHERE dire_c_comuna = 1234
     * $query->filterByDireCComuna(array(12, 34)); // WHERE dire_c_comuna IN (12, 34)
     * $query->filterByDireCComuna(array('min' => 12)); // WHERE dire_c_comuna > 12
     * </code>
     *
     * @see       filterByComuna()
     *
     * @param     mixed $direCComuna The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByDireCComuna($direCComuna = null, $comparison = null)
    {
        if (is_array($direCComuna)) {
            $useMinMax = false;
            if (isset($direCComuna['min'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_C_COMUNA, $direCComuna['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($direCComuna['max'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_C_COMUNA, $direCComuna['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_DIRE_C_COMUNA, $direCComuna, $comparison);
    }

    /**
     * Filter the query on the dire_c_pais column
     *
     * Example usage:
     * <code>
     * $query->filterByDireCPais(1234); // WHERE dire_c_pais = 1234
     * $query->filterByDireCPais(array(12, 34)); // WHERE dire_c_pais IN (12, 34)
     * $query->filterByDireCPais(array('min' => 12)); // WHERE dire_c_pais > 12
     * </code>
     *
     * @see       filterByPais()
     *
     * @param     mixed $direCPais The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByDireCPais($direCPais = null, $comparison = null)
    {
        if (is_array($direCPais)) {
            $useMinMax = false;
            if (isset($direCPais['min'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_C_PAIS, $direCPais['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($direCPais['max'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_C_PAIS, $direCPais['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_DIRE_C_PAIS, $direCPais, $comparison);
    }

    /**
     * Filter the query on the dire_detalle column
     *
     * Example usage:
     * <code>
     * $query->filterByDireDetalle('fooValue');   // WHERE dire_detalle = 'fooValue'
     * $query->filterByDireDetalle('%fooValue%', Criteria::LIKE); // WHERE dire_detalle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direDetalle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByDireDetalle($direDetalle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direDetalle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_DIRE_DETALLE, $direDetalle, $comparison);
    }

    /**
     * Filter the query on the dire_codigo_postal column
     *
     * Example usage:
     * <code>
     * $query->filterByDireCodigoPostal('fooValue');   // WHERE dire_codigo_postal = 'fooValue'
     * $query->filterByDireCodigoPostal('%fooValue%', Criteria::LIKE); // WHERE dire_codigo_postal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direCodigoPostal The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByDireCodigoPostal($direCodigoPostal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direCodigoPostal)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_DIRE_CODIGO_POSTAL, $direCodigoPostal, $comparison);
    }

    /**
     * Filter the query on the dire_telefono column
     *
     * Example usage:
     * <code>
     * $query->filterByDireTelefono('fooValue');   // WHERE dire_telefono = 'fooValue'
     * $query->filterByDireTelefono('%fooValue%', Criteria::LIKE); // WHERE dire_telefono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direTelefono The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByDireTelefono($direTelefono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direTelefono)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_DIRE_TELEFONO, $direTelefono, $comparison);
    }

    /**
     * Filter the query on the dire_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireRFechaCreacion('2011-03-14'); // WHERE dire_r_fecha_creacion = '2011-03-14'
     * $query->filterByDireRFechaCreacion('now'); // WHERE dire_r_fecha_creacion = '2011-03-14'
     * $query->filterByDireRFechaCreacion(array('max' => 'yesterday')); // WHERE dire_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $direRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByDireRFechaCreacion($direRFechaCreacion = null, $comparison = null)
    {
        if (is_array($direRFechaCreacion)) {
            $useMinMax = false;
            if (isset($direRFechaCreacion['min'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_R_FECHA_CREACION, $direRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($direRFechaCreacion['max'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_R_FECHA_CREACION, $direRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_DIRE_R_FECHA_CREACION, $direRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the dire_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireRFechaModificacion('2011-03-14'); // WHERE dire_r_fecha_modificacion = '2011-03-14'
     * $query->filterByDireRFechaModificacion('now'); // WHERE dire_r_fecha_modificacion = '2011-03-14'
     * $query->filterByDireRFechaModificacion(array('max' => 'yesterday')); // WHERE dire_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $direRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByDireRFechaModificacion($direRFechaModificacion = null, $comparison = null)
    {
        if (is_array($direRFechaModificacion)) {
            $useMinMax = false;
            if (isset($direRFechaModificacion['min'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_R_FECHA_MODIFICACION, $direRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($direRFechaModificacion['max'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_R_FECHA_MODIFICACION, $direRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_DIRE_R_FECHA_MODIFICACION, $direRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the dire_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByDireRUsuario(1234); // WHERE dire_r_usuario = 1234
     * $query->filterByDireRUsuario(array(12, 34)); // WHERE dire_r_usuario IN (12, 34)
     * $query->filterByDireRUsuario(array('min' => 12)); // WHERE dire_r_usuario > 12
     * </code>
     *
     * @param     mixed $direRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByDireRUsuario($direRUsuario = null, $comparison = null)
    {
        if (is_array($direRUsuario)) {
            $useMinMax = false;
            if (isset($direRUsuario['min'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_R_USUARIO, $direRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($direRUsuario['max'])) {
                $this->addUsingAlias(DireccionTableMap::COL_DIRE_R_USUARIO, $direRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DireccionTableMap::COL_DIRE_R_USUARIO, $direRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Comuna object
     *
     * @param \Comuna|ObjectCollection $comuna The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByComuna($comuna, $comparison = null)
    {
        if ($comuna instanceof \Comuna) {
            return $this
                ->addUsingAlias(DireccionTableMap::COL_DIRE_C_COMUNA, $comuna->getComuCodigo(), $comparison);
        } elseif ($comuna instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DireccionTableMap::COL_DIRE_C_COMUNA, $comuna->toKeyValue('PrimaryKey', 'ComuCodigo'), $comparison);
        } else {
            throw new PropelException('filterByComuna() only accepts arguments of type \Comuna or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Comuna relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function joinComuna($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Comuna');

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
            $this->addJoinObject($join, 'Comuna');
        }

        return $this;
    }

    /**
     * Use the Comuna relation Comuna object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ComunaQuery A secondary query class using the current class as primary query
     */
    public function useComunaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinComuna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Comuna', '\ComunaQuery');
    }

    /**
     * Filter the query by a related \Pais object
     *
     * @param \Pais|ObjectCollection $pais The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByPais($pais, $comparison = null)
    {
        if ($pais instanceof \Pais) {
            return $this
                ->addUsingAlias(DireccionTableMap::COL_DIRE_C_PAIS, $pais->getPaisCodigo(), $comparison);
        } elseif ($pais instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DireccionTableMap::COL_DIRE_C_PAIS, $pais->toKeyValue('PrimaryKey', 'PaisCodigo'), $comparison);
        } else {
            throw new PropelException('filterByPais() only accepts arguments of type \Pais or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pais relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function joinPais($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pais');

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
            $this->addJoinObject($join, 'Pais');
        }

        return $this;
    }

    /**
     * Use the Pais relation Pais object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PaisQuery A secondary query class using the current class as primary query
     */
    public function usePaisQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPais($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pais', '\PaisQuery');
    }

    /**
     * Filter the query by a related \Persona object
     *
     * @param \Persona|ObjectCollection $persona The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByPersona($persona, $comparison = null)
    {
        if ($persona instanceof \Persona) {
            return $this
                ->addUsingAlias(DireccionTableMap::COL_DIRE_C_PERSONA, $persona->getPersCodigo(), $comparison);
        } elseif ($persona instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DireccionTableMap::COL_DIRE_C_PERSONA, $persona->toKeyValue('PrimaryKey', 'PersCodigo'), $comparison);
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
     * @return $this|ChildDireccionQuery The current query, for fluid interface
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
     * Filter the query by a related \TDireccion object
     *
     * @param \TDireccion|ObjectCollection $tDireccion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDireccionQuery The current query, for fluid interface
     */
    public function filterByTDireccion($tDireccion, $comparison = null)
    {
        if ($tDireccion instanceof \TDireccion) {
            return $this
                ->addUsingAlias(DireccionTableMap::COL_DIRE_T_DIRECCION, $tDireccion->getTdirTipo(), $comparison);
        } elseif ($tDireccion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DireccionTableMap::COL_DIRE_T_DIRECCION, $tDireccion->toKeyValue('PrimaryKey', 'TdirTipo'), $comparison);
        } else {
            throw new PropelException('filterByTDireccion() only accepts arguments of type \TDireccion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TDireccion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function joinTDireccion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TDireccion');

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
            $this->addJoinObject($join, 'TDireccion');
        }

        return $this;
    }

    /**
     * Use the TDireccion relation TDireccion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TDireccionQuery A secondary query class using the current class as primary query
     */
    public function useTDireccionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTDireccion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TDireccion', '\TDireccionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDireccion $direccion Object to remove from the list of results
     *
     * @return $this|ChildDireccionQuery The current query, for fluid interface
     */
    public function prune($direccion = null)
    {
        if ($direccion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(DireccionTableMap::COL_DIRE_C_PERSONA), $direccion->getDireCPersona(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(DireccionTableMap::COL_DIRE_T_DIRECCION), $direccion->getDireTDireccion(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the direccion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DireccionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DireccionTableMap::clearInstancePool();
            DireccionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DireccionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DireccionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DireccionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DireccionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DireccionQuery
