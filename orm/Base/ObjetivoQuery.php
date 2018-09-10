<?php

namespace Base;

use \Objetivo as ChildObjetivo;
use \ObjetivoQuery as ChildObjetivoQuery;
use \Exception;
use \PDO;
use Map\ObjetivoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'objetivo' table.
 *
 *
 *
 * @method     ChildObjetivoQuery orderByObjeCodigo($order = Criteria::ASC) Order by the obje_codigo column
 * @method     ChildObjetivoQuery orderByObjeSigla($order = Criteria::ASC) Order by the obje_sigla column
 * @method     ChildObjetivoQuery orderByObjeDescripcion($order = Criteria::ASC) Order by the obje_descripcion column
 * @method     ChildObjetivoQuery orderByObjeRFechaCreacion($order = Criteria::ASC) Order by the obje_r_fecha_creacion column
 * @method     ChildObjetivoQuery orderByObjeRFechaModificacion($order = Criteria::ASC) Order by the obje_r_fecha_modificacion column
 * @method     ChildObjetivoQuery orderByObjeRUsuario($order = Criteria::ASC) Order by the obje_r_usuario column
 *
 * @method     ChildObjetivoQuery groupByObjeCodigo() Group by the obje_codigo column
 * @method     ChildObjetivoQuery groupByObjeSigla() Group by the obje_sigla column
 * @method     ChildObjetivoQuery groupByObjeDescripcion() Group by the obje_descripcion column
 * @method     ChildObjetivoQuery groupByObjeRFechaCreacion() Group by the obje_r_fecha_creacion column
 * @method     ChildObjetivoQuery groupByObjeRFechaModificacion() Group by the obje_r_fecha_modificacion column
 * @method     ChildObjetivoQuery groupByObjeRUsuario() Group by the obje_r_usuario column
 *
 * @method     ChildObjetivoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildObjetivoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildObjetivoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildObjetivoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildObjetivoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildObjetivoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildObjetivoQuery leftJoinActividadObjetivo($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActividadObjetivo relation
 * @method     ChildObjetivoQuery rightJoinActividadObjetivo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActividadObjetivo relation
 * @method     ChildObjetivoQuery innerJoinActividadObjetivo($relationAlias = null) Adds a INNER JOIN clause to the query using the ActividadObjetivo relation
 *
 * @method     ChildObjetivoQuery joinWithActividadObjetivo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ActividadObjetivo relation
 *
 * @method     ChildObjetivoQuery leftJoinWithActividadObjetivo() Adds a LEFT JOIN clause and with to the query using the ActividadObjetivo relation
 * @method     ChildObjetivoQuery rightJoinWithActividadObjetivo() Adds a RIGHT JOIN clause and with to the query using the ActividadObjetivo relation
 * @method     ChildObjetivoQuery innerJoinWithActividadObjetivo() Adds a INNER JOIN clause and with to the query using the ActividadObjetivo relation
 *
 * @method     ChildObjetivoQuery leftJoinEvaluacionPregunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the EvaluacionPregunta relation
 * @method     ChildObjetivoQuery rightJoinEvaluacionPregunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EvaluacionPregunta relation
 * @method     ChildObjetivoQuery innerJoinEvaluacionPregunta($relationAlias = null) Adds a INNER JOIN clause to the query using the EvaluacionPregunta relation
 *
 * @method     ChildObjetivoQuery joinWithEvaluacionPregunta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EvaluacionPregunta relation
 *
 * @method     ChildObjetivoQuery leftJoinWithEvaluacionPregunta() Adds a LEFT JOIN clause and with to the query using the EvaluacionPregunta relation
 * @method     ChildObjetivoQuery rightJoinWithEvaluacionPregunta() Adds a RIGHT JOIN clause and with to the query using the EvaluacionPregunta relation
 * @method     ChildObjetivoQuery innerJoinWithEvaluacionPregunta() Adds a INNER JOIN clause and with to the query using the EvaluacionPregunta relation
 *
 * @method     \ActividadObjetivoQuery|\EvaluacionPreguntaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildObjetivo findOne(ConnectionInterface $con = null) Return the first ChildObjetivo matching the query
 * @method     ChildObjetivo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildObjetivo matching the query, or a new ChildObjetivo object populated from the query conditions when no match is found
 *
 * @method     ChildObjetivo findOneByObjeCodigo(int $obje_codigo) Return the first ChildObjetivo filtered by the obje_codigo column
 * @method     ChildObjetivo findOneByObjeSigla(string $obje_sigla) Return the first ChildObjetivo filtered by the obje_sigla column
 * @method     ChildObjetivo findOneByObjeDescripcion(string $obje_descripcion) Return the first ChildObjetivo filtered by the obje_descripcion column
 * @method     ChildObjetivo findOneByObjeRFechaCreacion(string $obje_r_fecha_creacion) Return the first ChildObjetivo filtered by the obje_r_fecha_creacion column
 * @method     ChildObjetivo findOneByObjeRFechaModificacion(string $obje_r_fecha_modificacion) Return the first ChildObjetivo filtered by the obje_r_fecha_modificacion column
 * @method     ChildObjetivo findOneByObjeRUsuario(int $obje_r_usuario) Return the first ChildObjetivo filtered by the obje_r_usuario column *

 * @method     ChildObjetivo requirePk($key, ConnectionInterface $con = null) Return the ChildObjetivo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildObjetivo requireOne(ConnectionInterface $con = null) Return the first ChildObjetivo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildObjetivo requireOneByObjeCodigo(int $obje_codigo) Return the first ChildObjetivo filtered by the obje_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildObjetivo requireOneByObjeSigla(string $obje_sigla) Return the first ChildObjetivo filtered by the obje_sigla column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildObjetivo requireOneByObjeDescripcion(string $obje_descripcion) Return the first ChildObjetivo filtered by the obje_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildObjetivo requireOneByObjeRFechaCreacion(string $obje_r_fecha_creacion) Return the first ChildObjetivo filtered by the obje_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildObjetivo requireOneByObjeRFechaModificacion(string $obje_r_fecha_modificacion) Return the first ChildObjetivo filtered by the obje_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildObjetivo requireOneByObjeRUsuario(int $obje_r_usuario) Return the first ChildObjetivo filtered by the obje_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildObjetivo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildObjetivo objects based on current ModelCriteria
 * @method     ChildObjetivo[]|ObjectCollection findByObjeCodigo(int $obje_codigo) Return ChildObjetivo objects filtered by the obje_codigo column
 * @method     ChildObjetivo[]|ObjectCollection findByObjeSigla(string $obje_sigla) Return ChildObjetivo objects filtered by the obje_sigla column
 * @method     ChildObjetivo[]|ObjectCollection findByObjeDescripcion(string $obje_descripcion) Return ChildObjetivo objects filtered by the obje_descripcion column
 * @method     ChildObjetivo[]|ObjectCollection findByObjeRFechaCreacion(string $obje_r_fecha_creacion) Return ChildObjetivo objects filtered by the obje_r_fecha_creacion column
 * @method     ChildObjetivo[]|ObjectCollection findByObjeRFechaModificacion(string $obje_r_fecha_modificacion) Return ChildObjetivo objects filtered by the obje_r_fecha_modificacion column
 * @method     ChildObjetivo[]|ObjectCollection findByObjeRUsuario(int $obje_r_usuario) Return ChildObjetivo objects filtered by the obje_r_usuario column
 * @method     ChildObjetivo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ObjetivoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ObjetivoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Objetivo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildObjetivoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildObjetivoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildObjetivoQuery) {
            return $criteria;
        }
        $query = new ChildObjetivoQuery();
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
     * @return ChildObjetivo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ObjetivoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ObjetivoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildObjetivo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT obje_codigo, obje_sigla, obje_descripcion, obje_r_fecha_creacion, obje_r_fecha_modificacion, obje_r_usuario FROM objetivo WHERE obje_codigo = :p0';
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
            /** @var ChildObjetivo $obj */
            $obj = new ChildObjetivo();
            $obj->hydrate($row);
            ObjetivoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildObjetivo|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildObjetivoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildObjetivoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the obje_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByObjeCodigo(1234); // WHERE obje_codigo = 1234
     * $query->filterByObjeCodigo(array(12, 34)); // WHERE obje_codigo IN (12, 34)
     * $query->filterByObjeCodigo(array('min' => 12)); // WHERE obje_codigo > 12
     * </code>
     *
     * @param     mixed $objeCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildObjetivoQuery The current query, for fluid interface
     */
    public function filterByObjeCodigo($objeCodigo = null, $comparison = null)
    {
        if (is_array($objeCodigo)) {
            $useMinMax = false;
            if (isset($objeCodigo['min'])) {
                $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_CODIGO, $objeCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($objeCodigo['max'])) {
                $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_CODIGO, $objeCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_CODIGO, $objeCodigo, $comparison);
    }

    /**
     * Filter the query on the obje_sigla column
     *
     * Example usage:
     * <code>
     * $query->filterByObjeSigla('fooValue');   // WHERE obje_sigla = 'fooValue'
     * $query->filterByObjeSigla('%fooValue%', Criteria::LIKE); // WHERE obje_sigla LIKE '%fooValue%'
     * </code>
     *
     * @param     string $objeSigla The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildObjetivoQuery The current query, for fluid interface
     */
    public function filterByObjeSigla($objeSigla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($objeSigla)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_SIGLA, $objeSigla, $comparison);
    }

    /**
     * Filter the query on the obje_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByObjeDescripcion('fooValue');   // WHERE obje_descripcion = 'fooValue'
     * $query->filterByObjeDescripcion('%fooValue%', Criteria::LIKE); // WHERE obje_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $objeDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildObjetivoQuery The current query, for fluid interface
     */
    public function filterByObjeDescripcion($objeDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($objeDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_DESCRIPCION, $objeDescripcion, $comparison);
    }

    /**
     * Filter the query on the obje_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByObjeRFechaCreacion('2011-03-14'); // WHERE obje_r_fecha_creacion = '2011-03-14'
     * $query->filterByObjeRFechaCreacion('now'); // WHERE obje_r_fecha_creacion = '2011-03-14'
     * $query->filterByObjeRFechaCreacion(array('max' => 'yesterday')); // WHERE obje_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $objeRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildObjetivoQuery The current query, for fluid interface
     */
    public function filterByObjeRFechaCreacion($objeRFechaCreacion = null, $comparison = null)
    {
        if (is_array($objeRFechaCreacion)) {
            $useMinMax = false;
            if (isset($objeRFechaCreacion['min'])) {
                $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_R_FECHA_CREACION, $objeRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($objeRFechaCreacion['max'])) {
                $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_R_FECHA_CREACION, $objeRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_R_FECHA_CREACION, $objeRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the obje_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByObjeRFechaModificacion('2011-03-14'); // WHERE obje_r_fecha_modificacion = '2011-03-14'
     * $query->filterByObjeRFechaModificacion('now'); // WHERE obje_r_fecha_modificacion = '2011-03-14'
     * $query->filterByObjeRFechaModificacion(array('max' => 'yesterday')); // WHERE obje_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $objeRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildObjetivoQuery The current query, for fluid interface
     */
    public function filterByObjeRFechaModificacion($objeRFechaModificacion = null, $comparison = null)
    {
        if (is_array($objeRFechaModificacion)) {
            $useMinMax = false;
            if (isset($objeRFechaModificacion['min'])) {
                $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_R_FECHA_MODIFICACION, $objeRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($objeRFechaModificacion['max'])) {
                $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_R_FECHA_MODIFICACION, $objeRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_R_FECHA_MODIFICACION, $objeRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the obje_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByObjeRUsuario(1234); // WHERE obje_r_usuario = 1234
     * $query->filterByObjeRUsuario(array(12, 34)); // WHERE obje_r_usuario IN (12, 34)
     * $query->filterByObjeRUsuario(array('min' => 12)); // WHERE obje_r_usuario > 12
     * </code>
     *
     * @param     mixed $objeRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildObjetivoQuery The current query, for fluid interface
     */
    public function filterByObjeRUsuario($objeRUsuario = null, $comparison = null)
    {
        if (is_array($objeRUsuario)) {
            $useMinMax = false;
            if (isset($objeRUsuario['min'])) {
                $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_R_USUARIO, $objeRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($objeRUsuario['max'])) {
                $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_R_USUARIO, $objeRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_R_USUARIO, $objeRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \ActividadObjetivo object
     *
     * @param \ActividadObjetivo|ObjectCollection $actividadObjetivo the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildObjetivoQuery The current query, for fluid interface
     */
    public function filterByActividadObjetivo($actividadObjetivo, $comparison = null)
    {
        if ($actividadObjetivo instanceof \ActividadObjetivo) {
            return $this
                ->addUsingAlias(ObjetivoTableMap::COL_OBJE_CODIGO, $actividadObjetivo->getAcobCObjetivo(), $comparison);
        } elseif ($actividadObjetivo instanceof ObjectCollection) {
            return $this
                ->useActividadObjetivoQuery()
                ->filterByPrimaryKeys($actividadObjetivo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActividadObjetivo() only accepts arguments of type \ActividadObjetivo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActividadObjetivo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildObjetivoQuery The current query, for fluid interface
     */
    public function joinActividadObjetivo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActividadObjetivo');

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
            $this->addJoinObject($join, 'ActividadObjetivo');
        }

        return $this;
    }

    /**
     * Use the ActividadObjetivo relation ActividadObjetivo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ActividadObjetivoQuery A secondary query class using the current class as primary query
     */
    public function useActividadObjetivoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActividadObjetivo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActividadObjetivo', '\ActividadObjetivoQuery');
    }

    /**
     * Filter the query by a related \EvaluacionPregunta object
     *
     * @param \EvaluacionPregunta|ObjectCollection $evaluacionPregunta the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildObjetivoQuery The current query, for fluid interface
     */
    public function filterByEvaluacionPregunta($evaluacionPregunta, $comparison = null)
    {
        if ($evaluacionPregunta instanceof \EvaluacionPregunta) {
            return $this
                ->addUsingAlias(ObjetivoTableMap::COL_OBJE_CODIGO, $evaluacionPregunta->getEvprCObjetivo(), $comparison);
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
     * @return $this|ChildObjetivoQuery The current query, for fluid interface
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
     * @param   ChildObjetivo $objetivo Object to remove from the list of results
     *
     * @return $this|ChildObjetivoQuery The current query, for fluid interface
     */
    public function prune($objetivo = null)
    {
        if ($objetivo) {
            $this->addUsingAlias(ObjetivoTableMap::COL_OBJE_CODIGO, $objetivo->getObjeCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the objetivo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ObjetivoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ObjetivoTableMap::clearInstancePool();
            ObjetivoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ObjetivoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ObjetivoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ObjetivoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ObjetivoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ObjetivoQuery
