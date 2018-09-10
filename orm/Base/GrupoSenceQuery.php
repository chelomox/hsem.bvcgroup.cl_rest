<?php

namespace Base;

use \GrupoSence as ChildGrupoSence;
use \GrupoSenceQuery as ChildGrupoSenceQuery;
use \Exception;
use \PDO;
use Map\GrupoSenceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'grupo_sence' table.
 *
 *
 *
 * @method     ChildGrupoSenceQuery orderByGrseGrupo($order = Criteria::ASC) Order by the grse_grupo column
 * @method     ChildGrupoSenceQuery orderByGrseCodigoSence($order = Criteria::ASC) Order by the grse_codigo_sence column
 * @method     ChildGrupoSenceQuery orderByGrseNombreGrupo($order = Criteria::ASC) Order by the grse_nombre_grupo column
 * @method     ChildGrupoSenceQuery orderByGrseVigente($order = Criteria::ASC) Order by the grse_vigente column
 * @method     ChildGrupoSenceQuery orderByCagrseRFechaCreacion($order = Criteria::ASC) Order by the cagrse_r_fecha_creacion column
 * @method     ChildGrupoSenceQuery orderByCagrseRFechaModificacion($order = Criteria::ASC) Order by the cagrse_r_fecha_modificacion column
 * @method     ChildGrupoSenceQuery orderByCagrseRUsuario($order = Criteria::ASC) Order by the cagrse_r_usuario column
 *
 * @method     ChildGrupoSenceQuery groupByGrseGrupo() Group by the grse_grupo column
 * @method     ChildGrupoSenceQuery groupByGrseCodigoSence() Group by the grse_codigo_sence column
 * @method     ChildGrupoSenceQuery groupByGrseNombreGrupo() Group by the grse_nombre_grupo column
 * @method     ChildGrupoSenceQuery groupByGrseVigente() Group by the grse_vigente column
 * @method     ChildGrupoSenceQuery groupByCagrseRFechaCreacion() Group by the cagrse_r_fecha_creacion column
 * @method     ChildGrupoSenceQuery groupByCagrseRFechaModificacion() Group by the cagrse_r_fecha_modificacion column
 * @method     ChildGrupoSenceQuery groupByCagrseRUsuario() Group by the cagrse_r_usuario column
 *
 * @method     ChildGrupoSenceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGrupoSenceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGrupoSenceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGrupoSenceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGrupoSenceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGrupoSenceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGrupoSenceQuery leftJoinCargoGrupoSence($relationAlias = null) Adds a LEFT JOIN clause to the query using the CargoGrupoSence relation
 * @method     ChildGrupoSenceQuery rightJoinCargoGrupoSence($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CargoGrupoSence relation
 * @method     ChildGrupoSenceQuery innerJoinCargoGrupoSence($relationAlias = null) Adds a INNER JOIN clause to the query using the CargoGrupoSence relation
 *
 * @method     ChildGrupoSenceQuery joinWithCargoGrupoSence($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CargoGrupoSence relation
 *
 * @method     ChildGrupoSenceQuery leftJoinWithCargoGrupoSence() Adds a LEFT JOIN clause and with to the query using the CargoGrupoSence relation
 * @method     ChildGrupoSenceQuery rightJoinWithCargoGrupoSence() Adds a RIGHT JOIN clause and with to the query using the CargoGrupoSence relation
 * @method     ChildGrupoSenceQuery innerJoinWithCargoGrupoSence() Adds a INNER JOIN clause and with to the query using the CargoGrupoSence relation
 *
 * @method     \CargoGrupoSenceQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildGrupoSence findOne(ConnectionInterface $con = null) Return the first ChildGrupoSence matching the query
 * @method     ChildGrupoSence findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGrupoSence matching the query, or a new ChildGrupoSence object populated from the query conditions when no match is found
 *
 * @method     ChildGrupoSence findOneByGrseGrupo(int $grse_grupo) Return the first ChildGrupoSence filtered by the grse_grupo column
 * @method     ChildGrupoSence findOneByGrseCodigoSence(string $grse_codigo_sence) Return the first ChildGrupoSence filtered by the grse_codigo_sence column
 * @method     ChildGrupoSence findOneByGrseNombreGrupo(string $grse_nombre_grupo) Return the first ChildGrupoSence filtered by the grse_nombre_grupo column
 * @method     ChildGrupoSence findOneByGrseVigente(int $grse_vigente) Return the first ChildGrupoSence filtered by the grse_vigente column
 * @method     ChildGrupoSence findOneByCagrseRFechaCreacion(string $cagrse_r_fecha_creacion) Return the first ChildGrupoSence filtered by the cagrse_r_fecha_creacion column
 * @method     ChildGrupoSence findOneByCagrseRFechaModificacion(string $cagrse_r_fecha_modificacion) Return the first ChildGrupoSence filtered by the cagrse_r_fecha_modificacion column
 * @method     ChildGrupoSence findOneByCagrseRUsuario(int $cagrse_r_usuario) Return the first ChildGrupoSence filtered by the cagrse_r_usuario column *

 * @method     ChildGrupoSence requirePk($key, ConnectionInterface $con = null) Return the ChildGrupoSence by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrupoSence requireOne(ConnectionInterface $con = null) Return the first ChildGrupoSence matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGrupoSence requireOneByGrseGrupo(int $grse_grupo) Return the first ChildGrupoSence filtered by the grse_grupo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrupoSence requireOneByGrseCodigoSence(string $grse_codigo_sence) Return the first ChildGrupoSence filtered by the grse_codigo_sence column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrupoSence requireOneByGrseNombreGrupo(string $grse_nombre_grupo) Return the first ChildGrupoSence filtered by the grse_nombre_grupo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrupoSence requireOneByGrseVigente(int $grse_vigente) Return the first ChildGrupoSence filtered by the grse_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrupoSence requireOneByCagrseRFechaCreacion(string $cagrse_r_fecha_creacion) Return the first ChildGrupoSence filtered by the cagrse_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrupoSence requireOneByCagrseRFechaModificacion(string $cagrse_r_fecha_modificacion) Return the first ChildGrupoSence filtered by the cagrse_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGrupoSence requireOneByCagrseRUsuario(int $cagrse_r_usuario) Return the first ChildGrupoSence filtered by the cagrse_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGrupoSence[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGrupoSence objects based on current ModelCriteria
 * @method     ChildGrupoSence[]|ObjectCollection findByGrseGrupo(int $grse_grupo) Return ChildGrupoSence objects filtered by the grse_grupo column
 * @method     ChildGrupoSence[]|ObjectCollection findByGrseCodigoSence(string $grse_codigo_sence) Return ChildGrupoSence objects filtered by the grse_codigo_sence column
 * @method     ChildGrupoSence[]|ObjectCollection findByGrseNombreGrupo(string $grse_nombre_grupo) Return ChildGrupoSence objects filtered by the grse_nombre_grupo column
 * @method     ChildGrupoSence[]|ObjectCollection findByGrseVigente(int $grse_vigente) Return ChildGrupoSence objects filtered by the grse_vigente column
 * @method     ChildGrupoSence[]|ObjectCollection findByCagrseRFechaCreacion(string $cagrse_r_fecha_creacion) Return ChildGrupoSence objects filtered by the cagrse_r_fecha_creacion column
 * @method     ChildGrupoSence[]|ObjectCollection findByCagrseRFechaModificacion(string $cagrse_r_fecha_modificacion) Return ChildGrupoSence objects filtered by the cagrse_r_fecha_modificacion column
 * @method     ChildGrupoSence[]|ObjectCollection findByCagrseRUsuario(int $cagrse_r_usuario) Return ChildGrupoSence objects filtered by the cagrse_r_usuario column
 * @method     ChildGrupoSence[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GrupoSenceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\GrupoSenceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\GrupoSence', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGrupoSenceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGrupoSenceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGrupoSenceQuery) {
            return $criteria;
        }
        $query = new ChildGrupoSenceQuery();
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
     * @return ChildGrupoSence|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GrupoSenceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GrupoSenceTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildGrupoSence A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT grse_grupo, grse_codigo_sence, grse_nombre_grupo, grse_vigente, cagrse_r_fecha_creacion, cagrse_r_fecha_modificacion, cagrse_r_usuario FROM grupo_sence WHERE grse_grupo = :p0';
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
            /** @var ChildGrupoSence $obj */
            $obj = new ChildGrupoSence();
            $obj->hydrate($row);
            GrupoSenceTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildGrupoSence|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GrupoSenceTableMap::COL_GRSE_GRUPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GrupoSenceTableMap::COL_GRSE_GRUPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the grse_grupo column
     *
     * Example usage:
     * <code>
     * $query->filterByGrseGrupo(1234); // WHERE grse_grupo = 1234
     * $query->filterByGrseGrupo(array(12, 34)); // WHERE grse_grupo IN (12, 34)
     * $query->filterByGrseGrupo(array('min' => 12)); // WHERE grse_grupo > 12
     * </code>
     *
     * @param     mixed $grseGrupo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByGrseGrupo($grseGrupo = null, $comparison = null)
    {
        if (is_array($grseGrupo)) {
            $useMinMax = false;
            if (isset($grseGrupo['min'])) {
                $this->addUsingAlias(GrupoSenceTableMap::COL_GRSE_GRUPO, $grseGrupo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grseGrupo['max'])) {
                $this->addUsingAlias(GrupoSenceTableMap::COL_GRSE_GRUPO, $grseGrupo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrupoSenceTableMap::COL_GRSE_GRUPO, $grseGrupo, $comparison);
    }

    /**
     * Filter the query on the grse_codigo_sence column
     *
     * Example usage:
     * <code>
     * $query->filterByGrseCodigoSence('fooValue');   // WHERE grse_codigo_sence = 'fooValue'
     * $query->filterByGrseCodigoSence('%fooValue%', Criteria::LIKE); // WHERE grse_codigo_sence LIKE '%fooValue%'
     * </code>
     *
     * @param     string $grseCodigoSence The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByGrseCodigoSence($grseCodigoSence = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($grseCodigoSence)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrupoSenceTableMap::COL_GRSE_CODIGO_SENCE, $grseCodigoSence, $comparison);
    }

    /**
     * Filter the query on the grse_nombre_grupo column
     *
     * Example usage:
     * <code>
     * $query->filterByGrseNombreGrupo('fooValue');   // WHERE grse_nombre_grupo = 'fooValue'
     * $query->filterByGrseNombreGrupo('%fooValue%', Criteria::LIKE); // WHERE grse_nombre_grupo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $grseNombreGrupo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByGrseNombreGrupo($grseNombreGrupo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($grseNombreGrupo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrupoSenceTableMap::COL_GRSE_NOMBRE_GRUPO, $grseNombreGrupo, $comparison);
    }

    /**
     * Filter the query on the grse_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByGrseVigente(1234); // WHERE grse_vigente = 1234
     * $query->filterByGrseVigente(array(12, 34)); // WHERE grse_vigente IN (12, 34)
     * $query->filterByGrseVigente(array('min' => 12)); // WHERE grse_vigente > 12
     * </code>
     *
     * @param     mixed $grseVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByGrseVigente($grseVigente = null, $comparison = null)
    {
        if (is_array($grseVigente)) {
            $useMinMax = false;
            if (isset($grseVigente['min'])) {
                $this->addUsingAlias(GrupoSenceTableMap::COL_GRSE_VIGENTE, $grseVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grseVigente['max'])) {
                $this->addUsingAlias(GrupoSenceTableMap::COL_GRSE_VIGENTE, $grseVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrupoSenceTableMap::COL_GRSE_VIGENTE, $grseVigente, $comparison);
    }

    /**
     * Filter the query on the cagrse_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByCagrseRFechaCreacion('2011-03-14'); // WHERE cagrse_r_fecha_creacion = '2011-03-14'
     * $query->filterByCagrseRFechaCreacion('now'); // WHERE cagrse_r_fecha_creacion = '2011-03-14'
     * $query->filterByCagrseRFechaCreacion(array('max' => 'yesterday')); // WHERE cagrse_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $cagrseRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByCagrseRFechaCreacion($cagrseRFechaCreacion = null, $comparison = null)
    {
        if (is_array($cagrseRFechaCreacion)) {
            $useMinMax = false;
            if (isset($cagrseRFechaCreacion['min'])) {
                $this->addUsingAlias(GrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION, $cagrseRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cagrseRFechaCreacion['max'])) {
                $this->addUsingAlias(GrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION, $cagrseRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION, $cagrseRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the cagrse_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByCagrseRFechaModificacion('2011-03-14'); // WHERE cagrse_r_fecha_modificacion = '2011-03-14'
     * $query->filterByCagrseRFechaModificacion('now'); // WHERE cagrse_r_fecha_modificacion = '2011-03-14'
     * $query->filterByCagrseRFechaModificacion(array('max' => 'yesterday')); // WHERE cagrse_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $cagrseRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByCagrseRFechaModificacion($cagrseRFechaModificacion = null, $comparison = null)
    {
        if (is_array($cagrseRFechaModificacion)) {
            $useMinMax = false;
            if (isset($cagrseRFechaModificacion['min'])) {
                $this->addUsingAlias(GrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION, $cagrseRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cagrseRFechaModificacion['max'])) {
                $this->addUsingAlias(GrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION, $cagrseRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION, $cagrseRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the cagrse_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByCagrseRUsuario(1234); // WHERE cagrse_r_usuario = 1234
     * $query->filterByCagrseRUsuario(array(12, 34)); // WHERE cagrse_r_usuario IN (12, 34)
     * $query->filterByCagrseRUsuario(array('min' => 12)); // WHERE cagrse_r_usuario > 12
     * </code>
     *
     * @param     mixed $cagrseRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByCagrseRUsuario($cagrseRUsuario = null, $comparison = null)
    {
        if (is_array($cagrseRUsuario)) {
            $useMinMax = false;
            if (isset($cagrseRUsuario['min'])) {
                $this->addUsingAlias(GrupoSenceTableMap::COL_CAGRSE_R_USUARIO, $cagrseRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cagrseRUsuario['max'])) {
                $this->addUsingAlias(GrupoSenceTableMap::COL_CAGRSE_R_USUARIO, $cagrseRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GrupoSenceTableMap::COL_CAGRSE_R_USUARIO, $cagrseRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \CargoGrupoSence object
     *
     * @param \CargoGrupoSence|ObjectCollection $cargoGrupoSence the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function filterByCargoGrupoSence($cargoGrupoSence, $comparison = null)
    {
        if ($cargoGrupoSence instanceof \CargoGrupoSence) {
            return $this
                ->addUsingAlias(GrupoSenceTableMap::COL_GRSE_GRUPO, $cargoGrupoSence->getCagrseGGrupoSence(), $comparison);
        } elseif ($cargoGrupoSence instanceof ObjectCollection) {
            return $this
                ->useCargoGrupoSenceQuery()
                ->filterByPrimaryKeys($cargoGrupoSence->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCargoGrupoSence() only accepts arguments of type \CargoGrupoSence or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CargoGrupoSence relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function joinCargoGrupoSence($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CargoGrupoSence');

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
            $this->addJoinObject($join, 'CargoGrupoSence');
        }

        return $this;
    }

    /**
     * Use the CargoGrupoSence relation CargoGrupoSence object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CargoGrupoSenceQuery A secondary query class using the current class as primary query
     */
    public function useCargoGrupoSenceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCargoGrupoSence($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CargoGrupoSence', '\CargoGrupoSenceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGrupoSence $grupoSence Object to remove from the list of results
     *
     * @return $this|ChildGrupoSenceQuery The current query, for fluid interface
     */
    public function prune($grupoSence = null)
    {
        if ($grupoSence) {
            $this->addUsingAlias(GrupoSenceTableMap::COL_GRSE_GRUPO, $grupoSence->getGrseGrupo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the grupo_sence table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GrupoSenceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GrupoSenceTableMap::clearInstancePool();
            GrupoSenceTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(GrupoSenceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GrupoSenceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GrupoSenceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GrupoSenceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GrupoSenceQuery
