<?php

namespace Base;

use \EstadoCivil as ChildEstadoCivil;
use \EstadoCivilQuery as ChildEstadoCivilQuery;
use \Exception;
use \PDO;
use Map\EstadoCivilTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'estado_civil' table.
 *
 *
 *
 * @method     ChildEstadoCivilQuery orderByEsciCodigo($order = Criteria::ASC) Order by the esci_codigo column
 * @method     ChildEstadoCivilQuery orderByEsciDescripcion($order = Criteria::ASC) Order by the esci_descripcion column
 * @method     ChildEstadoCivilQuery orderByEsciRFechaCreacion($order = Criteria::ASC) Order by the esci_r_fecha_creacion column
 * @method     ChildEstadoCivilQuery orderByEsciRFechaModificacion($order = Criteria::ASC) Order by the esci_r_fecha_modificacion column
 * @method     ChildEstadoCivilQuery orderByEsciRUsuario($order = Criteria::ASC) Order by the esci_r_usuario column
 *
 * @method     ChildEstadoCivilQuery groupByEsciCodigo() Group by the esci_codigo column
 * @method     ChildEstadoCivilQuery groupByEsciDescripcion() Group by the esci_descripcion column
 * @method     ChildEstadoCivilQuery groupByEsciRFechaCreacion() Group by the esci_r_fecha_creacion column
 * @method     ChildEstadoCivilQuery groupByEsciRFechaModificacion() Group by the esci_r_fecha_modificacion column
 * @method     ChildEstadoCivilQuery groupByEsciRUsuario() Group by the esci_r_usuario column
 *
 * @method     ChildEstadoCivilQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEstadoCivilQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEstadoCivilQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEstadoCivilQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEstadoCivilQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEstadoCivilQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEstadoCivilQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     ChildEstadoCivilQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     ChildEstadoCivilQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     ChildEstadoCivilQuery joinWithPersona($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Persona relation
 *
 * @method     ChildEstadoCivilQuery leftJoinWithPersona() Adds a LEFT JOIN clause and with to the query using the Persona relation
 * @method     ChildEstadoCivilQuery rightJoinWithPersona() Adds a RIGHT JOIN clause and with to the query using the Persona relation
 * @method     ChildEstadoCivilQuery innerJoinWithPersona() Adds a INNER JOIN clause and with to the query using the Persona relation
 *
 * @method     \PersonaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEstadoCivil findOne(ConnectionInterface $con = null) Return the first ChildEstadoCivil matching the query
 * @method     ChildEstadoCivil findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEstadoCivil matching the query, or a new ChildEstadoCivil object populated from the query conditions when no match is found
 *
 * @method     ChildEstadoCivil findOneByEsciCodigo(int $esci_codigo) Return the first ChildEstadoCivil filtered by the esci_codigo column
 * @method     ChildEstadoCivil findOneByEsciDescripcion(string $esci_descripcion) Return the first ChildEstadoCivil filtered by the esci_descripcion column
 * @method     ChildEstadoCivil findOneByEsciRFechaCreacion(string $esci_r_fecha_creacion) Return the first ChildEstadoCivil filtered by the esci_r_fecha_creacion column
 * @method     ChildEstadoCivil findOneByEsciRFechaModificacion(string $esci_r_fecha_modificacion) Return the first ChildEstadoCivil filtered by the esci_r_fecha_modificacion column
 * @method     ChildEstadoCivil findOneByEsciRUsuario(int $esci_r_usuario) Return the first ChildEstadoCivil filtered by the esci_r_usuario column *

 * @method     ChildEstadoCivil requirePk($key, ConnectionInterface $con = null) Return the ChildEstadoCivil by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEstadoCivil requireOne(ConnectionInterface $con = null) Return the first ChildEstadoCivil matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEstadoCivil requireOneByEsciCodigo(int $esci_codigo) Return the first ChildEstadoCivil filtered by the esci_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEstadoCivil requireOneByEsciDescripcion(string $esci_descripcion) Return the first ChildEstadoCivil filtered by the esci_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEstadoCivil requireOneByEsciRFechaCreacion(string $esci_r_fecha_creacion) Return the first ChildEstadoCivil filtered by the esci_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEstadoCivil requireOneByEsciRFechaModificacion(string $esci_r_fecha_modificacion) Return the first ChildEstadoCivil filtered by the esci_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEstadoCivil requireOneByEsciRUsuario(int $esci_r_usuario) Return the first ChildEstadoCivil filtered by the esci_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEstadoCivil[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEstadoCivil objects based on current ModelCriteria
 * @method     ChildEstadoCivil[]|ObjectCollection findByEsciCodigo(int $esci_codigo) Return ChildEstadoCivil objects filtered by the esci_codigo column
 * @method     ChildEstadoCivil[]|ObjectCollection findByEsciDescripcion(string $esci_descripcion) Return ChildEstadoCivil objects filtered by the esci_descripcion column
 * @method     ChildEstadoCivil[]|ObjectCollection findByEsciRFechaCreacion(string $esci_r_fecha_creacion) Return ChildEstadoCivil objects filtered by the esci_r_fecha_creacion column
 * @method     ChildEstadoCivil[]|ObjectCollection findByEsciRFechaModificacion(string $esci_r_fecha_modificacion) Return ChildEstadoCivil objects filtered by the esci_r_fecha_modificacion column
 * @method     ChildEstadoCivil[]|ObjectCollection findByEsciRUsuario(int $esci_r_usuario) Return ChildEstadoCivil objects filtered by the esci_r_usuario column
 * @method     ChildEstadoCivil[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EstadoCivilQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EstadoCivilQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\EstadoCivil', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEstadoCivilQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEstadoCivilQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEstadoCivilQuery) {
            return $criteria;
        }
        $query = new ChildEstadoCivilQuery();
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
     * @return ChildEstadoCivil|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EstadoCivilTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EstadoCivilTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEstadoCivil A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT esci_codigo, esci_descripcion, esci_r_fecha_creacion, esci_r_fecha_modificacion, esci_r_usuario FROM estado_civil WHERE esci_codigo = :p0';
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
            /** @var ChildEstadoCivil $obj */
            $obj = new ChildEstadoCivil();
            $obj->hydrate($row);
            EstadoCivilTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEstadoCivil|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEstadoCivilQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEstadoCivilQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the esci_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByEsciCodigo(1234); // WHERE esci_codigo = 1234
     * $query->filterByEsciCodigo(array(12, 34)); // WHERE esci_codigo IN (12, 34)
     * $query->filterByEsciCodigo(array('min' => 12)); // WHERE esci_codigo > 12
     * </code>
     *
     * @param     mixed $esciCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEstadoCivilQuery The current query, for fluid interface
     */
    public function filterByEsciCodigo($esciCodigo = null, $comparison = null)
    {
        if (is_array($esciCodigo)) {
            $useMinMax = false;
            if (isset($esciCodigo['min'])) {
                $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_CODIGO, $esciCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($esciCodigo['max'])) {
                $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_CODIGO, $esciCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_CODIGO, $esciCodigo, $comparison);
    }

    /**
     * Filter the query on the esci_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEsciDescripcion('fooValue');   // WHERE esci_descripcion = 'fooValue'
     * $query->filterByEsciDescripcion('%fooValue%', Criteria::LIKE); // WHERE esci_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $esciDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEstadoCivilQuery The current query, for fluid interface
     */
    public function filterByEsciDescripcion($esciDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($esciDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_DESCRIPCION, $esciDescripcion, $comparison);
    }

    /**
     * Filter the query on the esci_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEsciRFechaCreacion('2011-03-14'); // WHERE esci_r_fecha_creacion = '2011-03-14'
     * $query->filterByEsciRFechaCreacion('now'); // WHERE esci_r_fecha_creacion = '2011-03-14'
     * $query->filterByEsciRFechaCreacion(array('max' => 'yesterday')); // WHERE esci_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $esciRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEstadoCivilQuery The current query, for fluid interface
     */
    public function filterByEsciRFechaCreacion($esciRFechaCreacion = null, $comparison = null)
    {
        if (is_array($esciRFechaCreacion)) {
            $useMinMax = false;
            if (isset($esciRFechaCreacion['min'])) {
                $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_R_FECHA_CREACION, $esciRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($esciRFechaCreacion['max'])) {
                $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_R_FECHA_CREACION, $esciRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_R_FECHA_CREACION, $esciRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the esci_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEsciRFechaModificacion('2011-03-14'); // WHERE esci_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEsciRFechaModificacion('now'); // WHERE esci_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEsciRFechaModificacion(array('max' => 'yesterday')); // WHERE esci_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $esciRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEstadoCivilQuery The current query, for fluid interface
     */
    public function filterByEsciRFechaModificacion($esciRFechaModificacion = null, $comparison = null)
    {
        if (is_array($esciRFechaModificacion)) {
            $useMinMax = false;
            if (isset($esciRFechaModificacion['min'])) {
                $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_R_FECHA_MODIFICACION, $esciRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($esciRFechaModificacion['max'])) {
                $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_R_FECHA_MODIFICACION, $esciRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_R_FECHA_MODIFICACION, $esciRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the esci_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEsciRUsuario(1234); // WHERE esci_r_usuario = 1234
     * $query->filterByEsciRUsuario(array(12, 34)); // WHERE esci_r_usuario IN (12, 34)
     * $query->filterByEsciRUsuario(array('min' => 12)); // WHERE esci_r_usuario > 12
     * </code>
     *
     * @param     mixed $esciRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEstadoCivilQuery The current query, for fluid interface
     */
    public function filterByEsciRUsuario($esciRUsuario = null, $comparison = null)
    {
        if (is_array($esciRUsuario)) {
            $useMinMax = false;
            if (isset($esciRUsuario['min'])) {
                $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_R_USUARIO, $esciRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($esciRUsuario['max'])) {
                $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_R_USUARIO, $esciRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_R_USUARIO, $esciRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Persona object
     *
     * @param \Persona|ObjectCollection $persona the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEstadoCivilQuery The current query, for fluid interface
     */
    public function filterByPersona($persona, $comparison = null)
    {
        if ($persona instanceof \Persona) {
            return $this
                ->addUsingAlias(EstadoCivilTableMap::COL_ESCI_CODIGO, $persona->getPersCEstadoCivil(), $comparison);
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
     * @return $this|ChildEstadoCivilQuery The current query, for fluid interface
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
     * @param   ChildEstadoCivil $estadoCivil Object to remove from the list of results
     *
     * @return $this|ChildEstadoCivilQuery The current query, for fluid interface
     */
    public function prune($estadoCivil = null)
    {
        if ($estadoCivil) {
            $this->addUsingAlias(EstadoCivilTableMap::COL_ESCI_CODIGO, $estadoCivil->getEsciCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the estado_civil table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EstadoCivilTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EstadoCivilTableMap::clearInstancePool();
            EstadoCivilTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EstadoCivilTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EstadoCivilTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EstadoCivilTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EstadoCivilTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EstadoCivilQuery
