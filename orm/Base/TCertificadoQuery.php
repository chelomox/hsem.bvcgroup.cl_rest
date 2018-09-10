<?php

namespace Base;

use \TCertificado as ChildTCertificado;
use \TCertificadoQuery as ChildTCertificadoQuery;
use \Exception;
use \PDO;
use Map\TCertificadoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_certificado' table.
 *
 *
 *
 * @method     ChildTCertificadoQuery orderByTceTipo($order = Criteria::ASC) Order by the tce_tipo column
 * @method     ChildTCertificadoQuery orderByTceDescripcion($order = Criteria::ASC) Order by the tce_descripcion column
 * @method     ChildTCertificadoQuery orderByTceRFechaCreacion($order = Criteria::ASC) Order by the tce_r_fecha_creacion column
 * @method     ChildTCertificadoQuery orderByTceRFechaModificacion($order = Criteria::ASC) Order by the tce_r_fecha_modificacion column
 * @method     ChildTCertificadoQuery orderByTceRUsuario($order = Criteria::ASC) Order by the tce_r_usuario column
 *
 * @method     ChildTCertificadoQuery groupByTceTipo() Group by the tce_tipo column
 * @method     ChildTCertificadoQuery groupByTceDescripcion() Group by the tce_descripcion column
 * @method     ChildTCertificadoQuery groupByTceRFechaCreacion() Group by the tce_r_fecha_creacion column
 * @method     ChildTCertificadoQuery groupByTceRFechaModificacion() Group by the tce_r_fecha_modificacion column
 * @method     ChildTCertificadoQuery groupByTceRUsuario() Group by the tce_r_usuario column
 *
 * @method     ChildTCertificadoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTCertificadoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTCertificadoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTCertificadoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTCertificadoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTCertificadoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTCertificadoQuery leftJoinDictacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dictacion relation
 * @method     ChildTCertificadoQuery rightJoinDictacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dictacion relation
 * @method     ChildTCertificadoQuery innerJoinDictacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Dictacion relation
 *
 * @method     ChildTCertificadoQuery joinWithDictacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dictacion relation
 *
 * @method     ChildTCertificadoQuery leftJoinWithDictacion() Adds a LEFT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildTCertificadoQuery rightJoinWithDictacion() Adds a RIGHT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildTCertificadoQuery innerJoinWithDictacion() Adds a INNER JOIN clause and with to the query using the Dictacion relation
 *
 * @method     \DictacionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTCertificado findOne(ConnectionInterface $con = null) Return the first ChildTCertificado matching the query
 * @method     ChildTCertificado findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTCertificado matching the query, or a new ChildTCertificado object populated from the query conditions when no match is found
 *
 * @method     ChildTCertificado findOneByTceTipo(int $tce_tipo) Return the first ChildTCertificado filtered by the tce_tipo column
 * @method     ChildTCertificado findOneByTceDescripcion(string $tce_descripcion) Return the first ChildTCertificado filtered by the tce_descripcion column
 * @method     ChildTCertificado findOneByTceRFechaCreacion(string $tce_r_fecha_creacion) Return the first ChildTCertificado filtered by the tce_r_fecha_creacion column
 * @method     ChildTCertificado findOneByTceRFechaModificacion(string $tce_r_fecha_modificacion) Return the first ChildTCertificado filtered by the tce_r_fecha_modificacion column
 * @method     ChildTCertificado findOneByTceRUsuario(int $tce_r_usuario) Return the first ChildTCertificado filtered by the tce_r_usuario column *

 * @method     ChildTCertificado requirePk($key, ConnectionInterface $con = null) Return the ChildTCertificado by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTCertificado requireOne(ConnectionInterface $con = null) Return the first ChildTCertificado matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTCertificado requireOneByTceTipo(int $tce_tipo) Return the first ChildTCertificado filtered by the tce_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTCertificado requireOneByTceDescripcion(string $tce_descripcion) Return the first ChildTCertificado filtered by the tce_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTCertificado requireOneByTceRFechaCreacion(string $tce_r_fecha_creacion) Return the first ChildTCertificado filtered by the tce_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTCertificado requireOneByTceRFechaModificacion(string $tce_r_fecha_modificacion) Return the first ChildTCertificado filtered by the tce_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTCertificado requireOneByTceRUsuario(int $tce_r_usuario) Return the first ChildTCertificado filtered by the tce_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTCertificado[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTCertificado objects based on current ModelCriteria
 * @method     ChildTCertificado[]|ObjectCollection findByTceTipo(int $tce_tipo) Return ChildTCertificado objects filtered by the tce_tipo column
 * @method     ChildTCertificado[]|ObjectCollection findByTceDescripcion(string $tce_descripcion) Return ChildTCertificado objects filtered by the tce_descripcion column
 * @method     ChildTCertificado[]|ObjectCollection findByTceRFechaCreacion(string $tce_r_fecha_creacion) Return ChildTCertificado objects filtered by the tce_r_fecha_creacion column
 * @method     ChildTCertificado[]|ObjectCollection findByTceRFechaModificacion(string $tce_r_fecha_modificacion) Return ChildTCertificado objects filtered by the tce_r_fecha_modificacion column
 * @method     ChildTCertificado[]|ObjectCollection findByTceRUsuario(int $tce_r_usuario) Return ChildTCertificado objects filtered by the tce_r_usuario column
 * @method     ChildTCertificado[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TCertificadoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TCertificadoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TCertificado', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTCertificadoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTCertificadoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTCertificadoQuery) {
            return $criteria;
        }
        $query = new ChildTCertificadoQuery();
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
     * @return ChildTCertificado|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TCertificadoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TCertificadoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTCertificado A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tce_tipo, tce_descripcion, tce_r_fecha_creacion, tce_r_fecha_modificacion, tce_r_usuario FROM t_certificado WHERE tce_tipo = :p0';
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
            /** @var ChildTCertificado $obj */
            $obj = new ChildTCertificado();
            $obj->hydrate($row);
            TCertificadoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTCertificado|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTCertificadoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TCertificadoTableMap::COL_TCE_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTCertificadoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TCertificadoTableMap::COL_TCE_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tce_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTceTipo(1234); // WHERE tce_tipo = 1234
     * $query->filterByTceTipo(array(12, 34)); // WHERE tce_tipo IN (12, 34)
     * $query->filterByTceTipo(array('min' => 12)); // WHERE tce_tipo > 12
     * </code>
     *
     * @param     mixed $tceTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTCertificadoQuery The current query, for fluid interface
     */
    public function filterByTceTipo($tceTipo = null, $comparison = null)
    {
        if (is_array($tceTipo)) {
            $useMinMax = false;
            if (isset($tceTipo['min'])) {
                $this->addUsingAlias(TCertificadoTableMap::COL_TCE_TIPO, $tceTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tceTipo['max'])) {
                $this->addUsingAlias(TCertificadoTableMap::COL_TCE_TIPO, $tceTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TCertificadoTableMap::COL_TCE_TIPO, $tceTipo, $comparison);
    }

    /**
     * Filter the query on the tce_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByTceDescripcion('fooValue');   // WHERE tce_descripcion = 'fooValue'
     * $query->filterByTceDescripcion('%fooValue%', Criteria::LIKE); // WHERE tce_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tceDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTCertificadoQuery The current query, for fluid interface
     */
    public function filterByTceDescripcion($tceDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tceDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TCertificadoTableMap::COL_TCE_DESCRIPCION, $tceDescripcion, $comparison);
    }

    /**
     * Filter the query on the tce_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTceRFechaCreacion('2011-03-14'); // WHERE tce_r_fecha_creacion = '2011-03-14'
     * $query->filterByTceRFechaCreacion('now'); // WHERE tce_r_fecha_creacion = '2011-03-14'
     * $query->filterByTceRFechaCreacion(array('max' => 'yesterday')); // WHERE tce_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tceRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTCertificadoQuery The current query, for fluid interface
     */
    public function filterByTceRFechaCreacion($tceRFechaCreacion = null, $comparison = null)
    {
        if (is_array($tceRFechaCreacion)) {
            $useMinMax = false;
            if (isset($tceRFechaCreacion['min'])) {
                $this->addUsingAlias(TCertificadoTableMap::COL_TCE_R_FECHA_CREACION, $tceRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tceRFechaCreacion['max'])) {
                $this->addUsingAlias(TCertificadoTableMap::COL_TCE_R_FECHA_CREACION, $tceRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TCertificadoTableMap::COL_TCE_R_FECHA_CREACION, $tceRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the tce_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTceRFechaModificacion('2011-03-14'); // WHERE tce_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTceRFechaModificacion('now'); // WHERE tce_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTceRFechaModificacion(array('max' => 'yesterday')); // WHERE tce_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $tceRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTCertificadoQuery The current query, for fluid interface
     */
    public function filterByTceRFechaModificacion($tceRFechaModificacion = null, $comparison = null)
    {
        if (is_array($tceRFechaModificacion)) {
            $useMinMax = false;
            if (isset($tceRFechaModificacion['min'])) {
                $this->addUsingAlias(TCertificadoTableMap::COL_TCE_R_FECHA_MODIFICACION, $tceRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tceRFechaModificacion['max'])) {
                $this->addUsingAlias(TCertificadoTableMap::COL_TCE_R_FECHA_MODIFICACION, $tceRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TCertificadoTableMap::COL_TCE_R_FECHA_MODIFICACION, $tceRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the tce_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTceRUsuario(1234); // WHERE tce_r_usuario = 1234
     * $query->filterByTceRUsuario(array(12, 34)); // WHERE tce_r_usuario IN (12, 34)
     * $query->filterByTceRUsuario(array('min' => 12)); // WHERE tce_r_usuario > 12
     * </code>
     *
     * @param     mixed $tceRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTCertificadoQuery The current query, for fluid interface
     */
    public function filterByTceRUsuario($tceRUsuario = null, $comparison = null)
    {
        if (is_array($tceRUsuario)) {
            $useMinMax = false;
            if (isset($tceRUsuario['min'])) {
                $this->addUsingAlias(TCertificadoTableMap::COL_TCE_R_USUARIO, $tceRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tceRUsuario['max'])) {
                $this->addUsingAlias(TCertificadoTableMap::COL_TCE_R_USUARIO, $tceRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TCertificadoTableMap::COL_TCE_R_USUARIO, $tceRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Dictacion object
     *
     * @param \Dictacion|ObjectCollection $dictacion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTCertificadoQuery The current query, for fluid interface
     */
    public function filterByDictacion($dictacion, $comparison = null)
    {
        if ($dictacion instanceof \Dictacion) {
            return $this
                ->addUsingAlias(TCertificadoTableMap::COL_TCE_TIPO, $dictacion->getDictTCertificado(), $comparison);
        } elseif ($dictacion instanceof ObjectCollection) {
            return $this
                ->useDictacionQuery()
                ->filterByPrimaryKeys($dictacion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDictacion() only accepts arguments of type \Dictacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dictacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTCertificadoQuery The current query, for fluid interface
     */
    public function joinDictacion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Dictacion');

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
            $this->addJoinObject($join, 'Dictacion');
        }

        return $this;
    }

    /**
     * Use the Dictacion relation Dictacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DictacionQuery A secondary query class using the current class as primary query
     */
    public function useDictacionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDictacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dictacion', '\DictacionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTCertificado $tCertificado Object to remove from the list of results
     *
     * @return $this|ChildTCertificadoQuery The current query, for fluid interface
     */
    public function prune($tCertificado = null)
    {
        if ($tCertificado) {
            $this->addUsingAlias(TCertificadoTableMap::COL_TCE_TIPO, $tCertificado->getTceTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_certificado table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TCertificadoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TCertificadoTableMap::clearInstancePool();
            TCertificadoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TCertificadoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TCertificadoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TCertificadoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TCertificadoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TCertificadoQuery
