<?php

namespace Base;

use \EInscripcionEvaluacionAplicada as ChildEInscripcionEvaluacionAplicada;
use \EInscripcionEvaluacionAplicadaQuery as ChildEInscripcionEvaluacionAplicadaQuery;
use \Exception;
use \PDO;
use Map\EInscripcionEvaluacionAplicadaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'e_inscripcion_evaluacion_aplicada' table.
 *
 *
 *
 * @method     ChildEInscripcionEvaluacionAplicadaQuery orderByEieaEstado($order = Criteria::ASC) Order by the eiea_estado column
 * @method     ChildEInscripcionEvaluacionAplicadaQuery orderByEieaDescripcion($order = Criteria::ASC) Order by the eiea_descripcion column
 * @method     ChildEInscripcionEvaluacionAplicadaQuery orderByEieaRFechaCreacion($order = Criteria::ASC) Order by the eiea_r_fecha_creacion column
 * @method     ChildEInscripcionEvaluacionAplicadaQuery orderByEieaRFechaModificacion($order = Criteria::ASC) Order by the eiea_r_fecha_modificacion column
 * @method     ChildEInscripcionEvaluacionAplicadaQuery orderByEieaRUsuario($order = Criteria::ASC) Order by the eiea_r_usuario column
 *
 * @method     ChildEInscripcionEvaluacionAplicadaQuery groupByEieaEstado() Group by the eiea_estado column
 * @method     ChildEInscripcionEvaluacionAplicadaQuery groupByEieaDescripcion() Group by the eiea_descripcion column
 * @method     ChildEInscripcionEvaluacionAplicadaQuery groupByEieaRFechaCreacion() Group by the eiea_r_fecha_creacion column
 * @method     ChildEInscripcionEvaluacionAplicadaQuery groupByEieaRFechaModificacion() Group by the eiea_r_fecha_modificacion column
 * @method     ChildEInscripcionEvaluacionAplicadaQuery groupByEieaRUsuario() Group by the eiea_r_usuario column
 *
 * @method     ChildEInscripcionEvaluacionAplicadaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEInscripcionEvaluacionAplicadaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEInscripcionEvaluacionAplicadaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEInscripcionEvaluacionAplicadaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEInscripcionEvaluacionAplicadaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEInscripcionEvaluacionAplicadaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEInscripcionEvaluacionAplicadaQuery leftJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildEInscripcionEvaluacionAplicadaQuery rightJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildEInscripcionEvaluacionAplicadaQuery innerJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     ChildEInscripcionEvaluacionAplicadaQuery joinWithInscripcionEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     ChildEInscripcionEvaluacionAplicadaQuery leftJoinWithInscripcionEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildEInscripcionEvaluacionAplicadaQuery rightJoinWithInscripcionEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildEInscripcionEvaluacionAplicadaQuery innerJoinWithInscripcionEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     \InscripcionEvaluacionAplicadaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEInscripcionEvaluacionAplicada findOne(ConnectionInterface $con = null) Return the first ChildEInscripcionEvaluacionAplicada matching the query
 * @method     ChildEInscripcionEvaluacionAplicada findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEInscripcionEvaluacionAplicada matching the query, or a new ChildEInscripcionEvaluacionAplicada object populated from the query conditions when no match is found
 *
 * @method     ChildEInscripcionEvaluacionAplicada findOneByEieaEstado(int $eiea_estado) Return the first ChildEInscripcionEvaluacionAplicada filtered by the eiea_estado column
 * @method     ChildEInscripcionEvaluacionAplicada findOneByEieaDescripcion(string $eiea_descripcion) Return the first ChildEInscripcionEvaluacionAplicada filtered by the eiea_descripcion column
 * @method     ChildEInscripcionEvaluacionAplicada findOneByEieaRFechaCreacion(string $eiea_r_fecha_creacion) Return the first ChildEInscripcionEvaluacionAplicada filtered by the eiea_r_fecha_creacion column
 * @method     ChildEInscripcionEvaluacionAplicada findOneByEieaRFechaModificacion(string $eiea_r_fecha_modificacion) Return the first ChildEInscripcionEvaluacionAplicada filtered by the eiea_r_fecha_modificacion column
 * @method     ChildEInscripcionEvaluacionAplicada findOneByEieaRUsuario(int $eiea_r_usuario) Return the first ChildEInscripcionEvaluacionAplicada filtered by the eiea_r_usuario column *

 * @method     ChildEInscripcionEvaluacionAplicada requirePk($key, ConnectionInterface $con = null) Return the ChildEInscripcionEvaluacionAplicada by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEInscripcionEvaluacionAplicada requireOne(ConnectionInterface $con = null) Return the first ChildEInscripcionEvaluacionAplicada matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEInscripcionEvaluacionAplicada requireOneByEieaEstado(int $eiea_estado) Return the first ChildEInscripcionEvaluacionAplicada filtered by the eiea_estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEInscripcionEvaluacionAplicada requireOneByEieaDescripcion(string $eiea_descripcion) Return the first ChildEInscripcionEvaluacionAplicada filtered by the eiea_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEInscripcionEvaluacionAplicada requireOneByEieaRFechaCreacion(string $eiea_r_fecha_creacion) Return the first ChildEInscripcionEvaluacionAplicada filtered by the eiea_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEInscripcionEvaluacionAplicada requireOneByEieaRFechaModificacion(string $eiea_r_fecha_modificacion) Return the first ChildEInscripcionEvaluacionAplicada filtered by the eiea_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEInscripcionEvaluacionAplicada requireOneByEieaRUsuario(int $eiea_r_usuario) Return the first ChildEInscripcionEvaluacionAplicada filtered by the eiea_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEInscripcionEvaluacionAplicada[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEInscripcionEvaluacionAplicada objects based on current ModelCriteria
 * @method     ChildEInscripcionEvaluacionAplicada[]|ObjectCollection findByEieaEstado(int $eiea_estado) Return ChildEInscripcionEvaluacionAplicada objects filtered by the eiea_estado column
 * @method     ChildEInscripcionEvaluacionAplicada[]|ObjectCollection findByEieaDescripcion(string $eiea_descripcion) Return ChildEInscripcionEvaluacionAplicada objects filtered by the eiea_descripcion column
 * @method     ChildEInscripcionEvaluacionAplicada[]|ObjectCollection findByEieaRFechaCreacion(string $eiea_r_fecha_creacion) Return ChildEInscripcionEvaluacionAplicada objects filtered by the eiea_r_fecha_creacion column
 * @method     ChildEInscripcionEvaluacionAplicada[]|ObjectCollection findByEieaRFechaModificacion(string $eiea_r_fecha_modificacion) Return ChildEInscripcionEvaluacionAplicada objects filtered by the eiea_r_fecha_modificacion column
 * @method     ChildEInscripcionEvaluacionAplicada[]|ObjectCollection findByEieaRUsuario(int $eiea_r_usuario) Return ChildEInscripcionEvaluacionAplicada objects filtered by the eiea_r_usuario column
 * @method     ChildEInscripcionEvaluacionAplicada[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EInscripcionEvaluacionAplicadaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EInscripcionEvaluacionAplicadaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\EInscripcionEvaluacionAplicada', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEInscripcionEvaluacionAplicadaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEInscripcionEvaluacionAplicadaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEInscripcionEvaluacionAplicadaQuery) {
            return $criteria;
        }
        $query = new ChildEInscripcionEvaluacionAplicadaQuery();
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
     * @return ChildEInscripcionEvaluacionAplicada|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EInscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EInscripcionEvaluacionAplicadaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEInscripcionEvaluacionAplicada A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT eiea_estado, eiea_descripcion, eiea_r_fecha_creacion, eiea_r_fecha_modificacion, eiea_r_usuario FROM e_inscripcion_evaluacion_aplicada WHERE eiea_estado = :p0';
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
            /** @var ChildEInscripcionEvaluacionAplicada $obj */
            $obj = new ChildEInscripcionEvaluacionAplicada();
            $obj->hydrate($row);
            EInscripcionEvaluacionAplicadaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEInscripcionEvaluacionAplicada|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the eiea_estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEieaEstado(1234); // WHERE eiea_estado = 1234
     * $query->filterByEieaEstado(array(12, 34)); // WHERE eiea_estado IN (12, 34)
     * $query->filterByEieaEstado(array('min' => 12)); // WHERE eiea_estado > 12
     * </code>
     *
     * @param     mixed $eieaEstado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEieaEstado($eieaEstado = null, $comparison = null)
    {
        if (is_array($eieaEstado)) {
            $useMinMax = false;
            if (isset($eieaEstado['min'])) {
                $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO, $eieaEstado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eieaEstado['max'])) {
                $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO, $eieaEstado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO, $eieaEstado, $comparison);
    }

    /**
     * Filter the query on the eiea_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEieaDescripcion('fooValue');   // WHERE eiea_descripcion = 'fooValue'
     * $query->filterByEieaDescripcion('%fooValue%', Criteria::LIKE); // WHERE eiea_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eieaDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEieaDescripcion($eieaDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eieaDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_DESCRIPCION, $eieaDescripcion, $comparison);
    }

    /**
     * Filter the query on the eiea_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEieaRFechaCreacion('2011-03-14'); // WHERE eiea_r_fecha_creacion = '2011-03-14'
     * $query->filterByEieaRFechaCreacion('now'); // WHERE eiea_r_fecha_creacion = '2011-03-14'
     * $query->filterByEieaRFechaCreacion(array('max' => 'yesterday')); // WHERE eiea_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $eieaRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEieaRFechaCreacion($eieaRFechaCreacion = null, $comparison = null)
    {
        if (is_array($eieaRFechaCreacion)) {
            $useMinMax = false;
            if (isset($eieaRFechaCreacion['min'])) {
                $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_CREACION, $eieaRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eieaRFechaCreacion['max'])) {
                $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_CREACION, $eieaRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_CREACION, $eieaRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the eiea_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEieaRFechaModificacion('2011-03-14'); // WHERE eiea_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEieaRFechaModificacion('now'); // WHERE eiea_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEieaRFechaModificacion(array('max' => 'yesterday')); // WHERE eiea_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $eieaRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEieaRFechaModificacion($eieaRFechaModificacion = null, $comparison = null)
    {
        if (is_array($eieaRFechaModificacion)) {
            $useMinMax = false;
            if (isset($eieaRFechaModificacion['min'])) {
                $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_MODIFICACION, $eieaRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eieaRFechaModificacion['max'])) {
                $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_MODIFICACION, $eieaRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_FECHA_MODIFICACION, $eieaRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the eiea_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEieaRUsuario(1234); // WHERE eiea_r_usuario = 1234
     * $query->filterByEieaRUsuario(array(12, 34)); // WHERE eiea_r_usuario IN (12, 34)
     * $query->filterByEieaRUsuario(array('min' => 12)); // WHERE eiea_r_usuario > 12
     * </code>
     *
     * @param     mixed $eieaRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEieaRUsuario($eieaRUsuario = null, $comparison = null)
    {
        if (is_array($eieaRUsuario)) {
            $useMinMax = false;
            if (isset($eieaRUsuario['min'])) {
                $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_USUARIO, $eieaRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eieaRUsuario['max'])) {
                $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_USUARIO, $eieaRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_R_USUARIO, $eieaRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \InscripcionEvaluacionAplicada object
     *
     * @param \InscripcionEvaluacionAplicada|ObjectCollection $inscripcionEvaluacionAplicada the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInscripcionEvaluacionAplicada($inscripcionEvaluacionAplicada, $comparison = null)
    {
        if ($inscripcionEvaluacionAplicada instanceof \InscripcionEvaluacionAplicada) {
            return $this
                ->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO, $inscripcionEvaluacionAplicada->getInevapEInscripcionEvaluacionAplicada(), $comparison);
        } elseif ($inscripcionEvaluacionAplicada instanceof ObjectCollection) {
            return $this
                ->useInscripcionEvaluacionAplicadaQuery()
                ->filterByPrimaryKeys($inscripcionEvaluacionAplicada->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInscripcionEvaluacionAplicada() only accepts arguments of type \InscripcionEvaluacionAplicada or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InscripcionEvaluacionAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function joinInscripcionEvaluacionAplicada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InscripcionEvaluacionAplicada');

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
            $this->addJoinObject($join, 'InscripcionEvaluacionAplicada');
        }

        return $this;
    }

    /**
     * Use the InscripcionEvaluacionAplicada relation InscripcionEvaluacionAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InscripcionEvaluacionAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useInscripcionEvaluacionAplicadaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinInscripcionEvaluacionAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InscripcionEvaluacionAplicada', '\InscripcionEvaluacionAplicadaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEInscripcionEvaluacionAplicada $eInscripcionEvaluacionAplicada Object to remove from the list of results
     *
     * @return $this|ChildEInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function prune($eInscripcionEvaluacionAplicada = null)
    {
        if ($eInscripcionEvaluacionAplicada) {
            $this->addUsingAlias(EInscripcionEvaluacionAplicadaTableMap::COL_EIEA_ESTADO, $eInscripcionEvaluacionAplicada->getEieaEstado(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the e_inscripcion_evaluacion_aplicada table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EInscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EInscripcionEvaluacionAplicadaTableMap::clearInstancePool();
            EInscripcionEvaluacionAplicadaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EInscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EInscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EInscripcionEvaluacionAplicadaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EInscripcionEvaluacionAplicadaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EInscripcionEvaluacionAplicadaQuery
