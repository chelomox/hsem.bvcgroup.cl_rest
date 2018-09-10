<?php

namespace Base;

use \Marcador as ChildMarcador;
use \MarcadorQuery as ChildMarcadorQuery;
use \Exception;
use \PDO;
use Map\MarcadorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'marcador' table.
 *
 *
 *
 * @method     ChildMarcadorQuery orderByMarcCodigo($order = Criteria::ASC) Order by the marc_codigo column
 * @method     ChildMarcadorQuery orderByMarcCodigoMarcador($order = Criteria::ASC) Order by the marc_codigo_marcador column
 * @method     ChildMarcadorQuery orderByMarcDescripcion($order = Criteria::ASC) Order by the marc_descripcion column
 * @method     ChildMarcadorQuery orderByMarcImagen($order = Criteria::ASC) Order by the marc_imagen column
 * @method     ChildMarcadorQuery orderByMarcVigente($order = Criteria::ASC) Order by the marc_vigente column
 * @method     ChildMarcadorQuery orderByMarcRFechaCreacion($order = Criteria::ASC) Order by the marc_r_fecha_creacion column
 * @method     ChildMarcadorQuery orderByMarcRFechaModificacion($order = Criteria::ASC) Order by the marc_r_fecha_modificacion column
 * @method     ChildMarcadorQuery orderByMarcRUsuario($order = Criteria::ASC) Order by the marc_r_usuario column
 *
 * @method     ChildMarcadorQuery groupByMarcCodigo() Group by the marc_codigo column
 * @method     ChildMarcadorQuery groupByMarcCodigoMarcador() Group by the marc_codigo_marcador column
 * @method     ChildMarcadorQuery groupByMarcDescripcion() Group by the marc_descripcion column
 * @method     ChildMarcadorQuery groupByMarcImagen() Group by the marc_imagen column
 * @method     ChildMarcadorQuery groupByMarcVigente() Group by the marc_vigente column
 * @method     ChildMarcadorQuery groupByMarcRFechaCreacion() Group by the marc_r_fecha_creacion column
 * @method     ChildMarcadorQuery groupByMarcRFechaModificacion() Group by the marc_r_fecha_modificacion column
 * @method     ChildMarcadorQuery groupByMarcRUsuario() Group by the marc_r_usuario column
 *
 * @method     ChildMarcadorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMarcadorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMarcadorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMarcadorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMarcadorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMarcadorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMarcadorQuery leftJoinEvaluacionMarcador($relationAlias = null) Adds a LEFT JOIN clause to the query using the EvaluacionMarcador relation
 * @method     ChildMarcadorQuery rightJoinEvaluacionMarcador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EvaluacionMarcador relation
 * @method     ChildMarcadorQuery innerJoinEvaluacionMarcador($relationAlias = null) Adds a INNER JOIN clause to the query using the EvaluacionMarcador relation
 *
 * @method     ChildMarcadorQuery joinWithEvaluacionMarcador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EvaluacionMarcador relation
 *
 * @method     ChildMarcadorQuery leftJoinWithEvaluacionMarcador() Adds a LEFT JOIN clause and with to the query using the EvaluacionMarcador relation
 * @method     ChildMarcadorQuery rightJoinWithEvaluacionMarcador() Adds a RIGHT JOIN clause and with to the query using the EvaluacionMarcador relation
 * @method     ChildMarcadorQuery innerJoinWithEvaluacionMarcador() Adds a INNER JOIN clause and with to the query using the EvaluacionMarcador relation
 *
 * @method     \EvaluacionMarcadorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMarcador findOne(ConnectionInterface $con = null) Return the first ChildMarcador matching the query
 * @method     ChildMarcador findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMarcador matching the query, or a new ChildMarcador object populated from the query conditions when no match is found
 *
 * @method     ChildMarcador findOneByMarcCodigo(int $marc_codigo) Return the first ChildMarcador filtered by the marc_codigo column
 * @method     ChildMarcador findOneByMarcCodigoMarcador(string $marc_codigo_marcador) Return the first ChildMarcador filtered by the marc_codigo_marcador column
 * @method     ChildMarcador findOneByMarcDescripcion(string $marc_descripcion) Return the first ChildMarcador filtered by the marc_descripcion column
 * @method     ChildMarcador findOneByMarcImagen(string $marc_imagen) Return the first ChildMarcador filtered by the marc_imagen column
 * @method     ChildMarcador findOneByMarcVigente(int $marc_vigente) Return the first ChildMarcador filtered by the marc_vigente column
 * @method     ChildMarcador findOneByMarcRFechaCreacion(string $marc_r_fecha_creacion) Return the first ChildMarcador filtered by the marc_r_fecha_creacion column
 * @method     ChildMarcador findOneByMarcRFechaModificacion(string $marc_r_fecha_modificacion) Return the first ChildMarcador filtered by the marc_r_fecha_modificacion column
 * @method     ChildMarcador findOneByMarcRUsuario(int $marc_r_usuario) Return the first ChildMarcador filtered by the marc_r_usuario column *

 * @method     ChildMarcador requirePk($key, ConnectionInterface $con = null) Return the ChildMarcador by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMarcador requireOne(ConnectionInterface $con = null) Return the first ChildMarcador matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMarcador requireOneByMarcCodigo(int $marc_codigo) Return the first ChildMarcador filtered by the marc_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMarcador requireOneByMarcCodigoMarcador(string $marc_codigo_marcador) Return the first ChildMarcador filtered by the marc_codigo_marcador column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMarcador requireOneByMarcDescripcion(string $marc_descripcion) Return the first ChildMarcador filtered by the marc_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMarcador requireOneByMarcImagen(string $marc_imagen) Return the first ChildMarcador filtered by the marc_imagen column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMarcador requireOneByMarcVigente(int $marc_vigente) Return the first ChildMarcador filtered by the marc_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMarcador requireOneByMarcRFechaCreacion(string $marc_r_fecha_creacion) Return the first ChildMarcador filtered by the marc_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMarcador requireOneByMarcRFechaModificacion(string $marc_r_fecha_modificacion) Return the first ChildMarcador filtered by the marc_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMarcador requireOneByMarcRUsuario(int $marc_r_usuario) Return the first ChildMarcador filtered by the marc_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMarcador[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMarcador objects based on current ModelCriteria
 * @method     ChildMarcador[]|ObjectCollection findByMarcCodigo(int $marc_codigo) Return ChildMarcador objects filtered by the marc_codigo column
 * @method     ChildMarcador[]|ObjectCollection findByMarcCodigoMarcador(string $marc_codigo_marcador) Return ChildMarcador objects filtered by the marc_codigo_marcador column
 * @method     ChildMarcador[]|ObjectCollection findByMarcDescripcion(string $marc_descripcion) Return ChildMarcador objects filtered by the marc_descripcion column
 * @method     ChildMarcador[]|ObjectCollection findByMarcImagen(string $marc_imagen) Return ChildMarcador objects filtered by the marc_imagen column
 * @method     ChildMarcador[]|ObjectCollection findByMarcVigente(int $marc_vigente) Return ChildMarcador objects filtered by the marc_vigente column
 * @method     ChildMarcador[]|ObjectCollection findByMarcRFechaCreacion(string $marc_r_fecha_creacion) Return ChildMarcador objects filtered by the marc_r_fecha_creacion column
 * @method     ChildMarcador[]|ObjectCollection findByMarcRFechaModificacion(string $marc_r_fecha_modificacion) Return ChildMarcador objects filtered by the marc_r_fecha_modificacion column
 * @method     ChildMarcador[]|ObjectCollection findByMarcRUsuario(int $marc_r_usuario) Return ChildMarcador objects filtered by the marc_r_usuario column
 * @method     ChildMarcador[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MarcadorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MarcadorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Marcador', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMarcadorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMarcadorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMarcadorQuery) {
            return $criteria;
        }
        $query = new ChildMarcadorQuery();
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
     * @return ChildMarcador|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MarcadorTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MarcadorTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMarcador A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT marc_codigo, marc_codigo_marcador, marc_descripcion, marc_imagen, marc_vigente, marc_r_fecha_creacion, marc_r_fecha_modificacion, marc_r_usuario FROM marcador WHERE marc_codigo = :p0';
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
            /** @var ChildMarcador $obj */
            $obj = new ChildMarcador();
            $obj->hydrate($row);
            MarcadorTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMarcador|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MarcadorTableMap::COL_MARC_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MarcadorTableMap::COL_MARC_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the marc_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByMarcCodigo(1234); // WHERE marc_codigo = 1234
     * $query->filterByMarcCodigo(array(12, 34)); // WHERE marc_codigo IN (12, 34)
     * $query->filterByMarcCodigo(array('min' => 12)); // WHERE marc_codigo > 12
     * </code>
     *
     * @param     mixed $marcCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function filterByMarcCodigo($marcCodigo = null, $comparison = null)
    {
        if (is_array($marcCodigo)) {
            $useMinMax = false;
            if (isset($marcCodigo['min'])) {
                $this->addUsingAlias(MarcadorTableMap::COL_MARC_CODIGO, $marcCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marcCodigo['max'])) {
                $this->addUsingAlias(MarcadorTableMap::COL_MARC_CODIGO, $marcCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarcadorTableMap::COL_MARC_CODIGO, $marcCodigo, $comparison);
    }

    /**
     * Filter the query on the marc_codigo_marcador column
     *
     * Example usage:
     * <code>
     * $query->filterByMarcCodigoMarcador('fooValue');   // WHERE marc_codigo_marcador = 'fooValue'
     * $query->filterByMarcCodigoMarcador('%fooValue%', Criteria::LIKE); // WHERE marc_codigo_marcador LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marcCodigoMarcador The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function filterByMarcCodigoMarcador($marcCodigoMarcador = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marcCodigoMarcador)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarcadorTableMap::COL_MARC_CODIGO_MARCADOR, $marcCodigoMarcador, $comparison);
    }

    /**
     * Filter the query on the marc_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByMarcDescripcion('fooValue');   // WHERE marc_descripcion = 'fooValue'
     * $query->filterByMarcDescripcion('%fooValue%', Criteria::LIKE); // WHERE marc_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marcDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function filterByMarcDescripcion($marcDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marcDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarcadorTableMap::COL_MARC_DESCRIPCION, $marcDescripcion, $comparison);
    }

    /**
     * Filter the query on the marc_imagen column
     *
     * Example usage:
     * <code>
     * $query->filterByMarcImagen('fooValue');   // WHERE marc_imagen = 'fooValue'
     * $query->filterByMarcImagen('%fooValue%', Criteria::LIKE); // WHERE marc_imagen LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marcImagen The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function filterByMarcImagen($marcImagen = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marcImagen)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarcadorTableMap::COL_MARC_IMAGEN, $marcImagen, $comparison);
    }

    /**
     * Filter the query on the marc_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByMarcVigente(1234); // WHERE marc_vigente = 1234
     * $query->filterByMarcVigente(array(12, 34)); // WHERE marc_vigente IN (12, 34)
     * $query->filterByMarcVigente(array('min' => 12)); // WHERE marc_vigente > 12
     * </code>
     *
     * @param     mixed $marcVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function filterByMarcVigente($marcVigente = null, $comparison = null)
    {
        if (is_array($marcVigente)) {
            $useMinMax = false;
            if (isset($marcVigente['min'])) {
                $this->addUsingAlias(MarcadorTableMap::COL_MARC_VIGENTE, $marcVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marcVigente['max'])) {
                $this->addUsingAlias(MarcadorTableMap::COL_MARC_VIGENTE, $marcVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarcadorTableMap::COL_MARC_VIGENTE, $marcVigente, $comparison);
    }

    /**
     * Filter the query on the marc_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByMarcRFechaCreacion('2011-03-14'); // WHERE marc_r_fecha_creacion = '2011-03-14'
     * $query->filterByMarcRFechaCreacion('now'); // WHERE marc_r_fecha_creacion = '2011-03-14'
     * $query->filterByMarcRFechaCreacion(array('max' => 'yesterday')); // WHERE marc_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $marcRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function filterByMarcRFechaCreacion($marcRFechaCreacion = null, $comparison = null)
    {
        if (is_array($marcRFechaCreacion)) {
            $useMinMax = false;
            if (isset($marcRFechaCreacion['min'])) {
                $this->addUsingAlias(MarcadorTableMap::COL_MARC_R_FECHA_CREACION, $marcRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marcRFechaCreacion['max'])) {
                $this->addUsingAlias(MarcadorTableMap::COL_MARC_R_FECHA_CREACION, $marcRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarcadorTableMap::COL_MARC_R_FECHA_CREACION, $marcRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the marc_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByMarcRFechaModificacion('2011-03-14'); // WHERE marc_r_fecha_modificacion = '2011-03-14'
     * $query->filterByMarcRFechaModificacion('now'); // WHERE marc_r_fecha_modificacion = '2011-03-14'
     * $query->filterByMarcRFechaModificacion(array('max' => 'yesterday')); // WHERE marc_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $marcRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function filterByMarcRFechaModificacion($marcRFechaModificacion = null, $comparison = null)
    {
        if (is_array($marcRFechaModificacion)) {
            $useMinMax = false;
            if (isset($marcRFechaModificacion['min'])) {
                $this->addUsingAlias(MarcadorTableMap::COL_MARC_R_FECHA_MODIFICACION, $marcRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marcRFechaModificacion['max'])) {
                $this->addUsingAlias(MarcadorTableMap::COL_MARC_R_FECHA_MODIFICACION, $marcRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarcadorTableMap::COL_MARC_R_FECHA_MODIFICACION, $marcRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the marc_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByMarcRUsuario(1234); // WHERE marc_r_usuario = 1234
     * $query->filterByMarcRUsuario(array(12, 34)); // WHERE marc_r_usuario IN (12, 34)
     * $query->filterByMarcRUsuario(array('min' => 12)); // WHERE marc_r_usuario > 12
     * </code>
     *
     * @param     mixed $marcRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function filterByMarcRUsuario($marcRUsuario = null, $comparison = null)
    {
        if (is_array($marcRUsuario)) {
            $useMinMax = false;
            if (isset($marcRUsuario['min'])) {
                $this->addUsingAlias(MarcadorTableMap::COL_MARC_R_USUARIO, $marcRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marcRUsuario['max'])) {
                $this->addUsingAlias(MarcadorTableMap::COL_MARC_R_USUARIO, $marcRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarcadorTableMap::COL_MARC_R_USUARIO, $marcRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \EvaluacionMarcador object
     *
     * @param \EvaluacionMarcador|ObjectCollection $evaluacionMarcador the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMarcadorQuery The current query, for fluid interface
     */
    public function filterByEvaluacionMarcador($evaluacionMarcador, $comparison = null)
    {
        if ($evaluacionMarcador instanceof \EvaluacionMarcador) {
            return $this
                ->addUsingAlias(MarcadorTableMap::COL_MARC_CODIGO, $evaluacionMarcador->getEvmaCMarcador(), $comparison);
        } elseif ($evaluacionMarcador instanceof ObjectCollection) {
            return $this
                ->useEvaluacionMarcadorQuery()
                ->filterByPrimaryKeys($evaluacionMarcador->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEvaluacionMarcador() only accepts arguments of type \EvaluacionMarcador or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EvaluacionMarcador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function joinEvaluacionMarcador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EvaluacionMarcador');

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
            $this->addJoinObject($join, 'EvaluacionMarcador');
        }

        return $this;
    }

    /**
     * Use the EvaluacionMarcador relation EvaluacionMarcador object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EvaluacionMarcadorQuery A secondary query class using the current class as primary query
     */
    public function useEvaluacionMarcadorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvaluacionMarcador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EvaluacionMarcador', '\EvaluacionMarcadorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMarcador $marcador Object to remove from the list of results
     *
     * @return $this|ChildMarcadorQuery The current query, for fluid interface
     */
    public function prune($marcador = null)
    {
        if ($marcador) {
            $this->addUsingAlias(MarcadorTableMap::COL_MARC_CODIGO, $marcador->getMarcCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the marcador table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MarcadorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MarcadorTableMap::clearInstancePool();
            MarcadorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MarcadorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MarcadorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MarcadorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MarcadorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MarcadorQuery
