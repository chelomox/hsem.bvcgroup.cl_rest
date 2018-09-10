<?php

namespace Base;

use \Seccion as ChildSeccion;
use \SeccionQuery as ChildSeccionQuery;
use \Exception;
use \PDO;
use Map\SeccionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'seccion' table.
 *
 *
 *
 * @method     ChildSeccionQuery orderBySeccCodigo($order = Criteria::ASC) Order by the secc_codigo column
 * @method     ChildSeccionQuery orderBySeccDescripcion($order = Criteria::ASC) Order by the secc_descripcion column
 * @method     ChildSeccionQuery orderBySeccVigente($order = Criteria::ASC) Order by the secc_vigente column
 * @method     ChildSeccionQuery orderBySeccRFechaCreacion($order = Criteria::ASC) Order by the secc_r_fecha_creacion column
 * @method     ChildSeccionQuery orderBySeccRFechaModificacion($order = Criteria::ASC) Order by the secc_r_fecha_modificacion column
 * @method     ChildSeccionQuery orderBySeccRUsuario($order = Criteria::ASC) Order by the secc_r_usuario column
 *
 * @method     ChildSeccionQuery groupBySeccCodigo() Group by the secc_codigo column
 * @method     ChildSeccionQuery groupBySeccDescripcion() Group by the secc_descripcion column
 * @method     ChildSeccionQuery groupBySeccVigente() Group by the secc_vigente column
 * @method     ChildSeccionQuery groupBySeccRFechaCreacion() Group by the secc_r_fecha_creacion column
 * @method     ChildSeccionQuery groupBySeccRFechaModificacion() Group by the secc_r_fecha_modificacion column
 * @method     ChildSeccionQuery groupBySeccRUsuario() Group by the secc_r_usuario column
 *
 * @method     ChildSeccionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSeccionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSeccionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSeccionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSeccionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSeccionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSeccionQuery leftJoinEvaluacionPregunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the EvaluacionPregunta relation
 * @method     ChildSeccionQuery rightJoinEvaluacionPregunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EvaluacionPregunta relation
 * @method     ChildSeccionQuery innerJoinEvaluacionPregunta($relationAlias = null) Adds a INNER JOIN clause to the query using the EvaluacionPregunta relation
 *
 * @method     ChildSeccionQuery joinWithEvaluacionPregunta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EvaluacionPregunta relation
 *
 * @method     ChildSeccionQuery leftJoinWithEvaluacionPregunta() Adds a LEFT JOIN clause and with to the query using the EvaluacionPregunta relation
 * @method     ChildSeccionQuery rightJoinWithEvaluacionPregunta() Adds a RIGHT JOIN clause and with to the query using the EvaluacionPregunta relation
 * @method     ChildSeccionQuery innerJoinWithEvaluacionPregunta() Adds a INNER JOIN clause and with to the query using the EvaluacionPregunta relation
 *
 * @method     \EvaluacionPreguntaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSeccion findOne(ConnectionInterface $con = null) Return the first ChildSeccion matching the query
 * @method     ChildSeccion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSeccion matching the query, or a new ChildSeccion object populated from the query conditions when no match is found
 *
 * @method     ChildSeccion findOneBySeccCodigo(int $secc_codigo) Return the first ChildSeccion filtered by the secc_codigo column
 * @method     ChildSeccion findOneBySeccDescripcion(string $secc_descripcion) Return the first ChildSeccion filtered by the secc_descripcion column
 * @method     ChildSeccion findOneBySeccVigente(int $secc_vigente) Return the first ChildSeccion filtered by the secc_vigente column
 * @method     ChildSeccion findOneBySeccRFechaCreacion(string $secc_r_fecha_creacion) Return the first ChildSeccion filtered by the secc_r_fecha_creacion column
 * @method     ChildSeccion findOneBySeccRFechaModificacion(string $secc_r_fecha_modificacion) Return the first ChildSeccion filtered by the secc_r_fecha_modificacion column
 * @method     ChildSeccion findOneBySeccRUsuario(int $secc_r_usuario) Return the first ChildSeccion filtered by the secc_r_usuario column *

 * @method     ChildSeccion requirePk($key, ConnectionInterface $con = null) Return the ChildSeccion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSeccion requireOne(ConnectionInterface $con = null) Return the first ChildSeccion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSeccion requireOneBySeccCodigo(int $secc_codigo) Return the first ChildSeccion filtered by the secc_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSeccion requireOneBySeccDescripcion(string $secc_descripcion) Return the first ChildSeccion filtered by the secc_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSeccion requireOneBySeccVigente(int $secc_vigente) Return the first ChildSeccion filtered by the secc_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSeccion requireOneBySeccRFechaCreacion(string $secc_r_fecha_creacion) Return the first ChildSeccion filtered by the secc_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSeccion requireOneBySeccRFechaModificacion(string $secc_r_fecha_modificacion) Return the first ChildSeccion filtered by the secc_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSeccion requireOneBySeccRUsuario(int $secc_r_usuario) Return the first ChildSeccion filtered by the secc_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSeccion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSeccion objects based on current ModelCriteria
 * @method     ChildSeccion[]|ObjectCollection findBySeccCodigo(int $secc_codigo) Return ChildSeccion objects filtered by the secc_codigo column
 * @method     ChildSeccion[]|ObjectCollection findBySeccDescripcion(string $secc_descripcion) Return ChildSeccion objects filtered by the secc_descripcion column
 * @method     ChildSeccion[]|ObjectCollection findBySeccVigente(int $secc_vigente) Return ChildSeccion objects filtered by the secc_vigente column
 * @method     ChildSeccion[]|ObjectCollection findBySeccRFechaCreacion(string $secc_r_fecha_creacion) Return ChildSeccion objects filtered by the secc_r_fecha_creacion column
 * @method     ChildSeccion[]|ObjectCollection findBySeccRFechaModificacion(string $secc_r_fecha_modificacion) Return ChildSeccion objects filtered by the secc_r_fecha_modificacion column
 * @method     ChildSeccion[]|ObjectCollection findBySeccRUsuario(int $secc_r_usuario) Return ChildSeccion objects filtered by the secc_r_usuario column
 * @method     ChildSeccion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SeccionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SeccionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Seccion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSeccionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSeccionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSeccionQuery) {
            return $criteria;
        }
        $query = new ChildSeccionQuery();
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
     * @return ChildSeccion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SeccionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SeccionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSeccion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT secc_codigo, secc_descripcion, secc_vigente, secc_r_fecha_creacion, secc_r_fecha_modificacion, secc_r_usuario FROM seccion WHERE secc_codigo = :p0';
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
            /** @var ChildSeccion $obj */
            $obj = new ChildSeccion();
            $obj->hydrate($row);
            SeccionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSeccion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSeccionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SeccionTableMap::COL_SECC_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSeccionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SeccionTableMap::COL_SECC_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the secc_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterBySeccCodigo(1234); // WHERE secc_codigo = 1234
     * $query->filterBySeccCodigo(array(12, 34)); // WHERE secc_codigo IN (12, 34)
     * $query->filterBySeccCodigo(array('min' => 12)); // WHERE secc_codigo > 12
     * </code>
     *
     * @param     mixed $seccCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeccionQuery The current query, for fluid interface
     */
    public function filterBySeccCodigo($seccCodigo = null, $comparison = null)
    {
        if (is_array($seccCodigo)) {
            $useMinMax = false;
            if (isset($seccCodigo['min'])) {
                $this->addUsingAlias(SeccionTableMap::COL_SECC_CODIGO, $seccCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seccCodigo['max'])) {
                $this->addUsingAlias(SeccionTableMap::COL_SECC_CODIGO, $seccCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeccionTableMap::COL_SECC_CODIGO, $seccCodigo, $comparison);
    }

    /**
     * Filter the query on the secc_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterBySeccDescripcion('fooValue');   // WHERE secc_descripcion = 'fooValue'
     * $query->filterBySeccDescripcion('%fooValue%', Criteria::LIKE); // WHERE secc_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $seccDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeccionQuery The current query, for fluid interface
     */
    public function filterBySeccDescripcion($seccDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($seccDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeccionTableMap::COL_SECC_DESCRIPCION, $seccDescripcion, $comparison);
    }

    /**
     * Filter the query on the secc_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterBySeccVigente(1234); // WHERE secc_vigente = 1234
     * $query->filterBySeccVigente(array(12, 34)); // WHERE secc_vigente IN (12, 34)
     * $query->filterBySeccVigente(array('min' => 12)); // WHERE secc_vigente > 12
     * </code>
     *
     * @param     mixed $seccVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeccionQuery The current query, for fluid interface
     */
    public function filterBySeccVigente($seccVigente = null, $comparison = null)
    {
        if (is_array($seccVigente)) {
            $useMinMax = false;
            if (isset($seccVigente['min'])) {
                $this->addUsingAlias(SeccionTableMap::COL_SECC_VIGENTE, $seccVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seccVigente['max'])) {
                $this->addUsingAlias(SeccionTableMap::COL_SECC_VIGENTE, $seccVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeccionTableMap::COL_SECC_VIGENTE, $seccVigente, $comparison);
    }

    /**
     * Filter the query on the secc_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterBySeccRFechaCreacion('2011-03-14'); // WHERE secc_r_fecha_creacion = '2011-03-14'
     * $query->filterBySeccRFechaCreacion('now'); // WHERE secc_r_fecha_creacion = '2011-03-14'
     * $query->filterBySeccRFechaCreacion(array('max' => 'yesterday')); // WHERE secc_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $seccRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeccionQuery The current query, for fluid interface
     */
    public function filterBySeccRFechaCreacion($seccRFechaCreacion = null, $comparison = null)
    {
        if (is_array($seccRFechaCreacion)) {
            $useMinMax = false;
            if (isset($seccRFechaCreacion['min'])) {
                $this->addUsingAlias(SeccionTableMap::COL_SECC_R_FECHA_CREACION, $seccRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seccRFechaCreacion['max'])) {
                $this->addUsingAlias(SeccionTableMap::COL_SECC_R_FECHA_CREACION, $seccRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeccionTableMap::COL_SECC_R_FECHA_CREACION, $seccRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the secc_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterBySeccRFechaModificacion('2011-03-14'); // WHERE secc_r_fecha_modificacion = '2011-03-14'
     * $query->filterBySeccRFechaModificacion('now'); // WHERE secc_r_fecha_modificacion = '2011-03-14'
     * $query->filterBySeccRFechaModificacion(array('max' => 'yesterday')); // WHERE secc_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $seccRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeccionQuery The current query, for fluid interface
     */
    public function filterBySeccRFechaModificacion($seccRFechaModificacion = null, $comparison = null)
    {
        if (is_array($seccRFechaModificacion)) {
            $useMinMax = false;
            if (isset($seccRFechaModificacion['min'])) {
                $this->addUsingAlias(SeccionTableMap::COL_SECC_R_FECHA_MODIFICACION, $seccRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seccRFechaModificacion['max'])) {
                $this->addUsingAlias(SeccionTableMap::COL_SECC_R_FECHA_MODIFICACION, $seccRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeccionTableMap::COL_SECC_R_FECHA_MODIFICACION, $seccRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the secc_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterBySeccRUsuario(1234); // WHERE secc_r_usuario = 1234
     * $query->filterBySeccRUsuario(array(12, 34)); // WHERE secc_r_usuario IN (12, 34)
     * $query->filterBySeccRUsuario(array('min' => 12)); // WHERE secc_r_usuario > 12
     * </code>
     *
     * @param     mixed $seccRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSeccionQuery The current query, for fluid interface
     */
    public function filterBySeccRUsuario($seccRUsuario = null, $comparison = null)
    {
        if (is_array($seccRUsuario)) {
            $useMinMax = false;
            if (isset($seccRUsuario['min'])) {
                $this->addUsingAlias(SeccionTableMap::COL_SECC_R_USUARIO, $seccRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seccRUsuario['max'])) {
                $this->addUsingAlias(SeccionTableMap::COL_SECC_R_USUARIO, $seccRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SeccionTableMap::COL_SECC_R_USUARIO, $seccRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \EvaluacionPregunta object
     *
     * @param \EvaluacionPregunta|ObjectCollection $evaluacionPregunta the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSeccionQuery The current query, for fluid interface
     */
    public function filterByEvaluacionPregunta($evaluacionPregunta, $comparison = null)
    {
        if ($evaluacionPregunta instanceof \EvaluacionPregunta) {
            return $this
                ->addUsingAlias(SeccionTableMap::COL_SECC_CODIGO, $evaluacionPregunta->getEvprCSeccion(), $comparison);
        } elseif ($evaluacionPregunta instanceof ObjectCollection) {
            return $this
                ->useEvaluacionPreguntaQuery()
                ->filterByPrimaryKeys($evaluacionPregunta->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEvaluacionPregunta() only accepts arguments of type \EvaluacionPregunta or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EvaluacionPregunta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSeccionQuery The current query, for fluid interface
     */
    public function joinEvaluacionPregunta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EvaluacionPregunta');

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
            $this->addJoinObject($join, 'EvaluacionPregunta');
        }

        return $this;
    }

    /**
     * Use the EvaluacionPregunta relation EvaluacionPregunta object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EvaluacionPreguntaQuery A secondary query class using the current class as primary query
     */
    public function useEvaluacionPreguntaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvaluacionPregunta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EvaluacionPregunta', '\EvaluacionPreguntaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSeccion $seccion Object to remove from the list of results
     *
     * @return $this|ChildSeccionQuery The current query, for fluid interface
     */
    public function prune($seccion = null)
    {
        if ($seccion) {
            $this->addUsingAlias(SeccionTableMap::COL_SECC_CODIGO, $seccion->getSeccCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the seccion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SeccionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SeccionTableMap::clearInstancePool();
            SeccionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SeccionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SeccionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SeccionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SeccionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SeccionQuery
