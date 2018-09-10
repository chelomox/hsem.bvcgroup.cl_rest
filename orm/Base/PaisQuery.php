<?php

namespace Base;

use \Pais as ChildPais;
use \PaisQuery as ChildPaisQuery;
use \Exception;
use \PDO;
use Map\PaisTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'pais' table.
 *
 *
 *
 * @method     ChildPaisQuery orderByPaisCodigo($order = Criteria::ASC) Order by the pais_codigo column
 * @method     ChildPaisQuery orderByNombreComun($order = Criteria::ASC) Order by the nombre_comun column
 * @method     ChildPaisQuery orderByNombreIso($order = Criteria::ASC) Order by the nombre_iso column
 * @method     ChildPaisQuery orderByCodigoAlfa2($order = Criteria::ASC) Order by the codigo_alfa2 column
 * @method     ChildPaisQuery orderByCodigoAlfa3($order = Criteria::ASC) Order by the codigo_alfa3 column
 * @method     ChildPaisQuery orderByCodigoNumerico($order = Criteria::ASC) Order by the codigo_numerico column
 * @method     ChildPaisQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method     ChildPaisQuery orderByPaisRFechaCreacion($order = Criteria::ASC) Order by the pais_r_fecha_creacion column
 * @method     ChildPaisQuery orderByPaisRFechaModificacion($order = Criteria::ASC) Order by the pais_r_fecha_modificacion column
 * @method     ChildPaisQuery orderByPaisRUsuario($order = Criteria::ASC) Order by the pais_r_usuario column
 *
 * @method     ChildPaisQuery groupByPaisCodigo() Group by the pais_codigo column
 * @method     ChildPaisQuery groupByNombreComun() Group by the nombre_comun column
 * @method     ChildPaisQuery groupByNombreIso() Group by the nombre_iso column
 * @method     ChildPaisQuery groupByCodigoAlfa2() Group by the codigo_alfa2 column
 * @method     ChildPaisQuery groupByCodigoAlfa3() Group by the codigo_alfa3 column
 * @method     ChildPaisQuery groupByCodigoNumerico() Group by the codigo_numerico column
 * @method     ChildPaisQuery groupByObservaciones() Group by the observaciones column
 * @method     ChildPaisQuery groupByPaisRFechaCreacion() Group by the pais_r_fecha_creacion column
 * @method     ChildPaisQuery groupByPaisRFechaModificacion() Group by the pais_r_fecha_modificacion column
 * @method     ChildPaisQuery groupByPaisRUsuario() Group by the pais_r_usuario column
 *
 * @method     ChildPaisQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPaisQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPaisQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPaisQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPaisQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPaisQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPaisQuery leftJoinDireccion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Direccion relation
 * @method     ChildPaisQuery rightJoinDireccion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Direccion relation
 * @method     ChildPaisQuery innerJoinDireccion($relationAlias = null) Adds a INNER JOIN clause to the query using the Direccion relation
 *
 * @method     ChildPaisQuery joinWithDireccion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Direccion relation
 *
 * @method     ChildPaisQuery leftJoinWithDireccion() Adds a LEFT JOIN clause and with to the query using the Direccion relation
 * @method     ChildPaisQuery rightJoinWithDireccion() Adds a RIGHT JOIN clause and with to the query using the Direccion relation
 * @method     ChildPaisQuery innerJoinWithDireccion() Adds a INNER JOIN clause and with to the query using the Direccion relation
 *
 * @method     ChildPaisQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     ChildPaisQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     ChildPaisQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     ChildPaisQuery joinWithPersona($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Persona relation
 *
 * @method     ChildPaisQuery leftJoinWithPersona() Adds a LEFT JOIN clause and with to the query using the Persona relation
 * @method     ChildPaisQuery rightJoinWithPersona() Adds a RIGHT JOIN clause and with to the query using the Persona relation
 * @method     ChildPaisQuery innerJoinWithPersona() Adds a INNER JOIN clause and with to the query using the Persona relation
 *
 * @method     \DireccionQuery|\PersonaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPais findOne(ConnectionInterface $con = null) Return the first ChildPais matching the query
 * @method     ChildPais findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPais matching the query, or a new ChildPais object populated from the query conditions when no match is found
 *
 * @method     ChildPais findOneByPaisCodigo(int $pais_codigo) Return the first ChildPais filtered by the pais_codigo column
 * @method     ChildPais findOneByNombreComun(string $nombre_comun) Return the first ChildPais filtered by the nombre_comun column
 * @method     ChildPais findOneByNombreIso(string $nombre_iso) Return the first ChildPais filtered by the nombre_iso column
 * @method     ChildPais findOneByCodigoAlfa2(string $codigo_alfa2) Return the first ChildPais filtered by the codigo_alfa2 column
 * @method     ChildPais findOneByCodigoAlfa3(string $codigo_alfa3) Return the first ChildPais filtered by the codigo_alfa3 column
 * @method     ChildPais findOneByCodigoNumerico(int $codigo_numerico) Return the first ChildPais filtered by the codigo_numerico column
 * @method     ChildPais findOneByObservaciones(string $observaciones) Return the first ChildPais filtered by the observaciones column
 * @method     ChildPais findOneByPaisRFechaCreacion(string $pais_r_fecha_creacion) Return the first ChildPais filtered by the pais_r_fecha_creacion column
 * @method     ChildPais findOneByPaisRFechaModificacion(string $pais_r_fecha_modificacion) Return the first ChildPais filtered by the pais_r_fecha_modificacion column
 * @method     ChildPais findOneByPaisRUsuario(int $pais_r_usuario) Return the first ChildPais filtered by the pais_r_usuario column *

 * @method     ChildPais requirePk($key, ConnectionInterface $con = null) Return the ChildPais by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPais requireOne(ConnectionInterface $con = null) Return the first ChildPais matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPais requireOneByPaisCodigo(int $pais_codigo) Return the first ChildPais filtered by the pais_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPais requireOneByNombreComun(string $nombre_comun) Return the first ChildPais filtered by the nombre_comun column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPais requireOneByNombreIso(string $nombre_iso) Return the first ChildPais filtered by the nombre_iso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPais requireOneByCodigoAlfa2(string $codigo_alfa2) Return the first ChildPais filtered by the codigo_alfa2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPais requireOneByCodigoAlfa3(string $codigo_alfa3) Return the first ChildPais filtered by the codigo_alfa3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPais requireOneByCodigoNumerico(int $codigo_numerico) Return the first ChildPais filtered by the codigo_numerico column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPais requireOneByObservaciones(string $observaciones) Return the first ChildPais filtered by the observaciones column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPais requireOneByPaisRFechaCreacion(string $pais_r_fecha_creacion) Return the first ChildPais filtered by the pais_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPais requireOneByPaisRFechaModificacion(string $pais_r_fecha_modificacion) Return the first ChildPais filtered by the pais_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPais requireOneByPaisRUsuario(int $pais_r_usuario) Return the first ChildPais filtered by the pais_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPais[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPais objects based on current ModelCriteria
 * @method     ChildPais[]|ObjectCollection findByPaisCodigo(int $pais_codigo) Return ChildPais objects filtered by the pais_codigo column
 * @method     ChildPais[]|ObjectCollection findByNombreComun(string $nombre_comun) Return ChildPais objects filtered by the nombre_comun column
 * @method     ChildPais[]|ObjectCollection findByNombreIso(string $nombre_iso) Return ChildPais objects filtered by the nombre_iso column
 * @method     ChildPais[]|ObjectCollection findByCodigoAlfa2(string $codigo_alfa2) Return ChildPais objects filtered by the codigo_alfa2 column
 * @method     ChildPais[]|ObjectCollection findByCodigoAlfa3(string $codigo_alfa3) Return ChildPais objects filtered by the codigo_alfa3 column
 * @method     ChildPais[]|ObjectCollection findByCodigoNumerico(int $codigo_numerico) Return ChildPais objects filtered by the codigo_numerico column
 * @method     ChildPais[]|ObjectCollection findByObservaciones(string $observaciones) Return ChildPais objects filtered by the observaciones column
 * @method     ChildPais[]|ObjectCollection findByPaisRFechaCreacion(string $pais_r_fecha_creacion) Return ChildPais objects filtered by the pais_r_fecha_creacion column
 * @method     ChildPais[]|ObjectCollection findByPaisRFechaModificacion(string $pais_r_fecha_modificacion) Return ChildPais objects filtered by the pais_r_fecha_modificacion column
 * @method     ChildPais[]|ObjectCollection findByPaisRUsuario(int $pais_r_usuario) Return ChildPais objects filtered by the pais_r_usuario column
 * @method     ChildPais[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PaisQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PaisQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Pais', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPaisQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPaisQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPaisQuery) {
            return $criteria;
        }
        $query = new ChildPaisQuery();
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
     * @return ChildPais|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PaisTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PaisTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPais A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT pais_codigo, nombre_comun, nombre_iso, codigo_alfa2, codigo_alfa3, codigo_numerico, observaciones, pais_r_fecha_creacion, pais_r_fecha_modificacion, pais_r_usuario FROM pais WHERE pais_codigo = :p0';
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
            /** @var ChildPais $obj */
            $obj = new ChildPais();
            $obj->hydrate($row);
            PaisTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPais|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PaisTableMap::COL_PAIS_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PaisTableMap::COL_PAIS_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pais_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByPaisCodigo(1234); // WHERE pais_codigo = 1234
     * $query->filterByPaisCodigo(array(12, 34)); // WHERE pais_codigo IN (12, 34)
     * $query->filterByPaisCodigo(array('min' => 12)); // WHERE pais_codigo > 12
     * </code>
     *
     * @param     mixed $paisCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByPaisCodigo($paisCodigo = null, $comparison = null)
    {
        if (is_array($paisCodigo)) {
            $useMinMax = false;
            if (isset($paisCodigo['min'])) {
                $this->addUsingAlias(PaisTableMap::COL_PAIS_CODIGO, $paisCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paisCodigo['max'])) {
                $this->addUsingAlias(PaisTableMap::COL_PAIS_CODIGO, $paisCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaisTableMap::COL_PAIS_CODIGO, $paisCodigo, $comparison);
    }

    /**
     * Filter the query on the nombre_comun column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreComun('fooValue');   // WHERE nombre_comun = 'fooValue'
     * $query->filterByNombreComun('%fooValue%', Criteria::LIKE); // WHERE nombre_comun LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombreComun The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByNombreComun($nombreComun = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreComun)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaisTableMap::COL_NOMBRE_COMUN, $nombreComun, $comparison);
    }

    /**
     * Filter the query on the nombre_iso column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreIso('fooValue');   // WHERE nombre_iso = 'fooValue'
     * $query->filterByNombreIso('%fooValue%', Criteria::LIKE); // WHERE nombre_iso LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombreIso The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByNombreIso($nombreIso = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreIso)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaisTableMap::COL_NOMBRE_ISO, $nombreIso, $comparison);
    }

    /**
     * Filter the query on the codigo_alfa2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCodigoAlfa2('fooValue');   // WHERE codigo_alfa2 = 'fooValue'
     * $query->filterByCodigoAlfa2('%fooValue%', Criteria::LIKE); // WHERE codigo_alfa2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codigoAlfa2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByCodigoAlfa2($codigoAlfa2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codigoAlfa2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaisTableMap::COL_CODIGO_ALFA2, $codigoAlfa2, $comparison);
    }

    /**
     * Filter the query on the codigo_alfa3 column
     *
     * Example usage:
     * <code>
     * $query->filterByCodigoAlfa3('fooValue');   // WHERE codigo_alfa3 = 'fooValue'
     * $query->filterByCodigoAlfa3('%fooValue%', Criteria::LIKE); // WHERE codigo_alfa3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codigoAlfa3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByCodigoAlfa3($codigoAlfa3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codigoAlfa3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaisTableMap::COL_CODIGO_ALFA3, $codigoAlfa3, $comparison);
    }

    /**
     * Filter the query on the codigo_numerico column
     *
     * Example usage:
     * <code>
     * $query->filterByCodigoNumerico(1234); // WHERE codigo_numerico = 1234
     * $query->filterByCodigoNumerico(array(12, 34)); // WHERE codigo_numerico IN (12, 34)
     * $query->filterByCodigoNumerico(array('min' => 12)); // WHERE codigo_numerico > 12
     * </code>
     *
     * @param     mixed $codigoNumerico The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByCodigoNumerico($codigoNumerico = null, $comparison = null)
    {
        if (is_array($codigoNumerico)) {
            $useMinMax = false;
            if (isset($codigoNumerico['min'])) {
                $this->addUsingAlias(PaisTableMap::COL_CODIGO_NUMERICO, $codigoNumerico['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($codigoNumerico['max'])) {
                $this->addUsingAlias(PaisTableMap::COL_CODIGO_NUMERICO, $codigoNumerico['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaisTableMap::COL_CODIGO_NUMERICO, $codigoNumerico, $comparison);
    }

    /**
     * Filter the query on the observaciones column
     *
     * Example usage:
     * <code>
     * $query->filterByObservaciones('fooValue');   // WHERE observaciones = 'fooValue'
     * $query->filterByObservaciones('%fooValue%', Criteria::LIKE); // WHERE observaciones LIKE '%fooValue%'
     * </code>
     *
     * @param     string $observaciones The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByObservaciones($observaciones = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($observaciones)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaisTableMap::COL_OBSERVACIONES, $observaciones, $comparison);
    }

    /**
     * Filter the query on the pais_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByPaisRFechaCreacion('2011-03-14'); // WHERE pais_r_fecha_creacion = '2011-03-14'
     * $query->filterByPaisRFechaCreacion('now'); // WHERE pais_r_fecha_creacion = '2011-03-14'
     * $query->filterByPaisRFechaCreacion(array('max' => 'yesterday')); // WHERE pais_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $paisRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByPaisRFechaCreacion($paisRFechaCreacion = null, $comparison = null)
    {
        if (is_array($paisRFechaCreacion)) {
            $useMinMax = false;
            if (isset($paisRFechaCreacion['min'])) {
                $this->addUsingAlias(PaisTableMap::COL_PAIS_R_FECHA_CREACION, $paisRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paisRFechaCreacion['max'])) {
                $this->addUsingAlias(PaisTableMap::COL_PAIS_R_FECHA_CREACION, $paisRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaisTableMap::COL_PAIS_R_FECHA_CREACION, $paisRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the pais_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByPaisRFechaModificacion('2011-03-14'); // WHERE pais_r_fecha_modificacion = '2011-03-14'
     * $query->filterByPaisRFechaModificacion('now'); // WHERE pais_r_fecha_modificacion = '2011-03-14'
     * $query->filterByPaisRFechaModificacion(array('max' => 'yesterday')); // WHERE pais_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $paisRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByPaisRFechaModificacion($paisRFechaModificacion = null, $comparison = null)
    {
        if (is_array($paisRFechaModificacion)) {
            $useMinMax = false;
            if (isset($paisRFechaModificacion['min'])) {
                $this->addUsingAlias(PaisTableMap::COL_PAIS_R_FECHA_MODIFICACION, $paisRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paisRFechaModificacion['max'])) {
                $this->addUsingAlias(PaisTableMap::COL_PAIS_R_FECHA_MODIFICACION, $paisRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaisTableMap::COL_PAIS_R_FECHA_MODIFICACION, $paisRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the pais_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByPaisRUsuario(1234); // WHERE pais_r_usuario = 1234
     * $query->filterByPaisRUsuario(array(12, 34)); // WHERE pais_r_usuario IN (12, 34)
     * $query->filterByPaisRUsuario(array('min' => 12)); // WHERE pais_r_usuario > 12
     * </code>
     *
     * @param     mixed $paisRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function filterByPaisRUsuario($paisRUsuario = null, $comparison = null)
    {
        if (is_array($paisRUsuario)) {
            $useMinMax = false;
            if (isset($paisRUsuario['min'])) {
                $this->addUsingAlias(PaisTableMap::COL_PAIS_R_USUARIO, $paisRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paisRUsuario['max'])) {
                $this->addUsingAlias(PaisTableMap::COL_PAIS_R_USUARIO, $paisRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaisTableMap::COL_PAIS_R_USUARIO, $paisRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Direccion object
     *
     * @param \Direccion|ObjectCollection $direccion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPaisQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion, $comparison = null)
    {
        if ($direccion instanceof \Direccion) {
            return $this
                ->addUsingAlias(PaisTableMap::COL_PAIS_CODIGO, $direccion->getDireCPais(), $comparison);
        } elseif ($direccion instanceof ObjectCollection) {
            return $this
                ->useDireccionQuery()
                ->filterByPrimaryKeys($direccion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDireccion() only accepts arguments of type \Direccion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Direccion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function joinDireccion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Direccion');

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
            $this->addJoinObject($join, 'Direccion');
        }

        return $this;
    }

    /**
     * Use the Direccion relation Direccion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DireccionQuery A secondary query class using the current class as primary query
     */
    public function useDireccionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDireccion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Direccion', '\DireccionQuery');
    }

    /**
     * Filter the query by a related \Persona object
     *
     * @param \Persona|ObjectCollection $persona the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPaisQuery The current query, for fluid interface
     */
    public function filterByPersona($persona, $comparison = null)
    {
        if ($persona instanceof \Persona) {
            return $this
                ->addUsingAlias(PaisTableMap::COL_PAIS_CODIGO, $persona->getPersCPaisOrigen(), $comparison);
        } elseif ($persona instanceof ObjectCollection) {
            return $this
                ->usePersonaQuery()
                ->filterByPrimaryKeys($persona->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function joinPersona($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function usePersonaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersona($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Persona', '\PersonaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPais $pais Object to remove from the list of results
     *
     * @return $this|ChildPaisQuery The current query, for fluid interface
     */
    public function prune($pais = null)
    {
        if ($pais) {
            $this->addUsingAlias(PaisTableMap::COL_PAIS_CODIGO, $pais->getPaisCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the pais table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaisTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PaisTableMap::clearInstancePool();
            PaisTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PaisTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PaisTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PaisTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PaisTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PaisQuery
