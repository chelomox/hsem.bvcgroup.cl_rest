<?php

namespace Base;

use \Escolaridad as ChildEscolaridad;
use \EscolaridadQuery as ChildEscolaridadQuery;
use \Exception;
use \PDO;
use Map\EscolaridadTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'escolaridad' table.
 *
 *
 *
 * @method     ChildEscolaridadQuery orderByEscoCodigo($order = Criteria::ASC) Order by the esco_codigo column
 * @method     ChildEscolaridadQuery orderByEscoDescripcion($order = Criteria::ASC) Order by the esco_descripcion column
 * @method     ChildEscolaridadQuery orderByEscoVigente($order = Criteria::ASC) Order by the esco_vigente column
 * @method     ChildEscolaridadQuery orderByEscoRFechaCreacion($order = Criteria::ASC) Order by the esco_r_fecha_creacion column
 * @method     ChildEscolaridadQuery orderByEscoRFechaModificacion($order = Criteria::ASC) Order by the esco_r_fecha_modificacion column
 * @method     ChildEscolaridadQuery orderByEscoRUsuario($order = Criteria::ASC) Order by the esco_r_usuario column
 *
 * @method     ChildEscolaridadQuery groupByEscoCodigo() Group by the esco_codigo column
 * @method     ChildEscolaridadQuery groupByEscoDescripcion() Group by the esco_descripcion column
 * @method     ChildEscolaridadQuery groupByEscoVigente() Group by the esco_vigente column
 * @method     ChildEscolaridadQuery groupByEscoRFechaCreacion() Group by the esco_r_fecha_creacion column
 * @method     ChildEscolaridadQuery groupByEscoRFechaModificacion() Group by the esco_r_fecha_modificacion column
 * @method     ChildEscolaridadQuery groupByEscoRUsuario() Group by the esco_r_usuario column
 *
 * @method     ChildEscolaridadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEscolaridadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEscolaridadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEscolaridadQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEscolaridadQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEscolaridadQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEscolaridadQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     ChildEscolaridadQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     ChildEscolaridadQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     ChildEscolaridadQuery joinWithPersona($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Persona relation
 *
 * @method     ChildEscolaridadQuery leftJoinWithPersona() Adds a LEFT JOIN clause and with to the query using the Persona relation
 * @method     ChildEscolaridadQuery rightJoinWithPersona() Adds a RIGHT JOIN clause and with to the query using the Persona relation
 * @method     ChildEscolaridadQuery innerJoinWithPersona() Adds a INNER JOIN clause and with to the query using the Persona relation
 *
 * @method     \PersonaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEscolaridad findOne(ConnectionInterface $con = null) Return the first ChildEscolaridad matching the query
 * @method     ChildEscolaridad findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEscolaridad matching the query, or a new ChildEscolaridad object populated from the query conditions when no match is found
 *
 * @method     ChildEscolaridad findOneByEscoCodigo(int $esco_codigo) Return the first ChildEscolaridad filtered by the esco_codigo column
 * @method     ChildEscolaridad findOneByEscoDescripcion(string $esco_descripcion) Return the first ChildEscolaridad filtered by the esco_descripcion column
 * @method     ChildEscolaridad findOneByEscoVigente(int $esco_vigente) Return the first ChildEscolaridad filtered by the esco_vigente column
 * @method     ChildEscolaridad findOneByEscoRFechaCreacion(string $esco_r_fecha_creacion) Return the first ChildEscolaridad filtered by the esco_r_fecha_creacion column
 * @method     ChildEscolaridad findOneByEscoRFechaModificacion(string $esco_r_fecha_modificacion) Return the first ChildEscolaridad filtered by the esco_r_fecha_modificacion column
 * @method     ChildEscolaridad findOneByEscoRUsuario(int $esco_r_usuario) Return the first ChildEscolaridad filtered by the esco_r_usuario column *

 * @method     ChildEscolaridad requirePk($key, ConnectionInterface $con = null) Return the ChildEscolaridad by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEscolaridad requireOne(ConnectionInterface $con = null) Return the first ChildEscolaridad matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEscolaridad requireOneByEscoCodigo(int $esco_codigo) Return the first ChildEscolaridad filtered by the esco_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEscolaridad requireOneByEscoDescripcion(string $esco_descripcion) Return the first ChildEscolaridad filtered by the esco_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEscolaridad requireOneByEscoVigente(int $esco_vigente) Return the first ChildEscolaridad filtered by the esco_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEscolaridad requireOneByEscoRFechaCreacion(string $esco_r_fecha_creacion) Return the first ChildEscolaridad filtered by the esco_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEscolaridad requireOneByEscoRFechaModificacion(string $esco_r_fecha_modificacion) Return the first ChildEscolaridad filtered by the esco_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEscolaridad requireOneByEscoRUsuario(int $esco_r_usuario) Return the first ChildEscolaridad filtered by the esco_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEscolaridad[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEscolaridad objects based on current ModelCriteria
 * @method     ChildEscolaridad[]|ObjectCollection findByEscoCodigo(int $esco_codigo) Return ChildEscolaridad objects filtered by the esco_codigo column
 * @method     ChildEscolaridad[]|ObjectCollection findByEscoDescripcion(string $esco_descripcion) Return ChildEscolaridad objects filtered by the esco_descripcion column
 * @method     ChildEscolaridad[]|ObjectCollection findByEscoVigente(int $esco_vigente) Return ChildEscolaridad objects filtered by the esco_vigente column
 * @method     ChildEscolaridad[]|ObjectCollection findByEscoRFechaCreacion(string $esco_r_fecha_creacion) Return ChildEscolaridad objects filtered by the esco_r_fecha_creacion column
 * @method     ChildEscolaridad[]|ObjectCollection findByEscoRFechaModificacion(string $esco_r_fecha_modificacion) Return ChildEscolaridad objects filtered by the esco_r_fecha_modificacion column
 * @method     ChildEscolaridad[]|ObjectCollection findByEscoRUsuario(int $esco_r_usuario) Return ChildEscolaridad objects filtered by the esco_r_usuario column
 * @method     ChildEscolaridad[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EscolaridadQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EscolaridadQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Escolaridad', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEscolaridadQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEscolaridadQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEscolaridadQuery) {
            return $criteria;
        }
        $query = new ChildEscolaridadQuery();
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
     * @return ChildEscolaridad|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EscolaridadTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EscolaridadTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEscolaridad A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT esco_codigo, esco_descripcion, esco_vigente, esco_r_fecha_creacion, esco_r_fecha_modificacion, esco_r_usuario FROM escolaridad WHERE esco_codigo = :p0';
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
            /** @var ChildEscolaridad $obj */
            $obj = new ChildEscolaridad();
            $obj->hydrate($row);
            EscolaridadTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEscolaridad|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEscolaridadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEscolaridadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the esco_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByEscoCodigo(1234); // WHERE esco_codigo = 1234
     * $query->filterByEscoCodigo(array(12, 34)); // WHERE esco_codigo IN (12, 34)
     * $query->filterByEscoCodigo(array('min' => 12)); // WHERE esco_codigo > 12
     * </code>
     *
     * @param     mixed $escoCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEscolaridadQuery The current query, for fluid interface
     */
    public function filterByEscoCodigo($escoCodigo = null, $comparison = null)
    {
        if (is_array($escoCodigo)) {
            $useMinMax = false;
            if (isset($escoCodigo['min'])) {
                $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_CODIGO, $escoCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($escoCodigo['max'])) {
                $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_CODIGO, $escoCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_CODIGO, $escoCodigo, $comparison);
    }

    /**
     * Filter the query on the esco_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEscoDescripcion('fooValue');   // WHERE esco_descripcion = 'fooValue'
     * $query->filterByEscoDescripcion('%fooValue%', Criteria::LIKE); // WHERE esco_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $escoDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEscolaridadQuery The current query, for fluid interface
     */
    public function filterByEscoDescripcion($escoDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($escoDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_DESCRIPCION, $escoDescripcion, $comparison);
    }

    /**
     * Filter the query on the esco_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByEscoVigente(1234); // WHERE esco_vigente = 1234
     * $query->filterByEscoVigente(array(12, 34)); // WHERE esco_vigente IN (12, 34)
     * $query->filterByEscoVigente(array('min' => 12)); // WHERE esco_vigente > 12
     * </code>
     *
     * @param     mixed $escoVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEscolaridadQuery The current query, for fluid interface
     */
    public function filterByEscoVigente($escoVigente = null, $comparison = null)
    {
        if (is_array($escoVigente)) {
            $useMinMax = false;
            if (isset($escoVigente['min'])) {
                $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_VIGENTE, $escoVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($escoVigente['max'])) {
                $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_VIGENTE, $escoVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_VIGENTE, $escoVigente, $comparison);
    }

    /**
     * Filter the query on the esco_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEscoRFechaCreacion('2011-03-14'); // WHERE esco_r_fecha_creacion = '2011-03-14'
     * $query->filterByEscoRFechaCreacion('now'); // WHERE esco_r_fecha_creacion = '2011-03-14'
     * $query->filterByEscoRFechaCreacion(array('max' => 'yesterday')); // WHERE esco_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $escoRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEscolaridadQuery The current query, for fluid interface
     */
    public function filterByEscoRFechaCreacion($escoRFechaCreacion = null, $comparison = null)
    {
        if (is_array($escoRFechaCreacion)) {
            $useMinMax = false;
            if (isset($escoRFechaCreacion['min'])) {
                $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_R_FECHA_CREACION, $escoRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($escoRFechaCreacion['max'])) {
                $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_R_FECHA_CREACION, $escoRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_R_FECHA_CREACION, $escoRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the esco_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEscoRFechaModificacion('2011-03-14'); // WHERE esco_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEscoRFechaModificacion('now'); // WHERE esco_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEscoRFechaModificacion(array('max' => 'yesterday')); // WHERE esco_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $escoRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEscolaridadQuery The current query, for fluid interface
     */
    public function filterByEscoRFechaModificacion($escoRFechaModificacion = null, $comparison = null)
    {
        if (is_array($escoRFechaModificacion)) {
            $useMinMax = false;
            if (isset($escoRFechaModificacion['min'])) {
                $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_R_FECHA_MODIFICACION, $escoRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($escoRFechaModificacion['max'])) {
                $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_R_FECHA_MODIFICACION, $escoRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_R_FECHA_MODIFICACION, $escoRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the esco_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEscoRUsuario(1234); // WHERE esco_r_usuario = 1234
     * $query->filterByEscoRUsuario(array(12, 34)); // WHERE esco_r_usuario IN (12, 34)
     * $query->filterByEscoRUsuario(array('min' => 12)); // WHERE esco_r_usuario > 12
     * </code>
     *
     * @param     mixed $escoRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEscolaridadQuery The current query, for fluid interface
     */
    public function filterByEscoRUsuario($escoRUsuario = null, $comparison = null)
    {
        if (is_array($escoRUsuario)) {
            $useMinMax = false;
            if (isset($escoRUsuario['min'])) {
                $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_R_USUARIO, $escoRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($escoRUsuario['max'])) {
                $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_R_USUARIO, $escoRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_R_USUARIO, $escoRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Persona object
     *
     * @param \Persona|ObjectCollection $persona the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEscolaridadQuery The current query, for fluid interface
     */
    public function filterByPersona($persona, $comparison = null)
    {
        if ($persona instanceof \Persona) {
            return $this
                ->addUsingAlias(EscolaridadTableMap::COL_ESCO_CODIGO, $persona->getPersCEscolaridad(), $comparison);
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
     * @return $this|ChildEscolaridadQuery The current query, for fluid interface
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
     * @param   ChildEscolaridad $escolaridad Object to remove from the list of results
     *
     * @return $this|ChildEscolaridadQuery The current query, for fluid interface
     */
    public function prune($escolaridad = null)
    {
        if ($escolaridad) {
            $this->addUsingAlias(EscolaridadTableMap::COL_ESCO_CODIGO, $escolaridad->getEscoCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the escolaridad table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EscolaridadTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EscolaridadTableMap::clearInstancePool();
            EscolaridadTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EscolaridadTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EscolaridadTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EscolaridadTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EscolaridadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EscolaridadQuery
