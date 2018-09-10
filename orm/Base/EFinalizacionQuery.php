<?php

namespace Base;

use \EFinalizacion as ChildEFinalizacion;
use \EFinalizacionQuery as ChildEFinalizacionQuery;
use \Exception;
use \PDO;
use Map\EFinalizacionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'e_finalizacion' table.
 *
 *
 *
 * @method     ChildEFinalizacionQuery orderByEfinEstado($order = Criteria::ASC) Order by the efin_estado column
 * @method     ChildEFinalizacionQuery orderByEfinTCalificacion($order = Criteria::ASC) Order by the efin_t_calificacion column
 * @method     ChildEFinalizacionQuery orderByEfinResultado($order = Criteria::ASC) Order by the efin_resultado column
 * @method     ChildEFinalizacionQuery orderByEfinDescripcion($order = Criteria::ASC) Order by the efin_descripcion column
 * @method     ChildEFinalizacionQuery orderByEfinCotaInferior($order = Criteria::ASC) Order by the efin_cota_inferior column
 * @method     ChildEFinalizacionQuery orderByEfinCotaSuperior($order = Criteria::ASC) Order by the efin_cota_superior column
 * @method     ChildEFinalizacionQuery orderByEfinRFechaCreacion($order = Criteria::ASC) Order by the efin_r_fecha_creacion column
 * @method     ChildEFinalizacionQuery orderByEfinRFechaModificacion($order = Criteria::ASC) Order by the efin_r_fecha_modificacion column
 * @method     ChildEFinalizacionQuery orderByEfinRUsuario($order = Criteria::ASC) Order by the efin_r_usuario column
 *
 * @method     ChildEFinalizacionQuery groupByEfinEstado() Group by the efin_estado column
 * @method     ChildEFinalizacionQuery groupByEfinTCalificacion() Group by the efin_t_calificacion column
 * @method     ChildEFinalizacionQuery groupByEfinResultado() Group by the efin_resultado column
 * @method     ChildEFinalizacionQuery groupByEfinDescripcion() Group by the efin_descripcion column
 * @method     ChildEFinalizacionQuery groupByEfinCotaInferior() Group by the efin_cota_inferior column
 * @method     ChildEFinalizacionQuery groupByEfinCotaSuperior() Group by the efin_cota_superior column
 * @method     ChildEFinalizacionQuery groupByEfinRFechaCreacion() Group by the efin_r_fecha_creacion column
 * @method     ChildEFinalizacionQuery groupByEfinRFechaModificacion() Group by the efin_r_fecha_modificacion column
 * @method     ChildEFinalizacionQuery groupByEfinRUsuario() Group by the efin_r_usuario column
 *
 * @method     ChildEFinalizacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEFinalizacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEFinalizacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEFinalizacionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEFinalizacionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEFinalizacionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEFinalizacionQuery leftJoinTCalificacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the TCalificacion relation
 * @method     ChildEFinalizacionQuery rightJoinTCalificacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TCalificacion relation
 * @method     ChildEFinalizacionQuery innerJoinTCalificacion($relationAlias = null) Adds a INNER JOIN clause to the query using the TCalificacion relation
 *
 * @method     ChildEFinalizacionQuery joinWithTCalificacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TCalificacion relation
 *
 * @method     ChildEFinalizacionQuery leftJoinWithTCalificacion() Adds a LEFT JOIN clause and with to the query using the TCalificacion relation
 * @method     ChildEFinalizacionQuery rightJoinWithTCalificacion() Adds a RIGHT JOIN clause and with to the query using the TCalificacion relation
 * @method     ChildEFinalizacionQuery innerJoinWithTCalificacion() Adds a INNER JOIN clause and with to the query using the TCalificacion relation
 *
 * @method     ChildEFinalizacionQuery leftJoinInscripcion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inscripcion relation
 * @method     ChildEFinalizacionQuery rightJoinInscripcion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inscripcion relation
 * @method     ChildEFinalizacionQuery innerJoinInscripcion($relationAlias = null) Adds a INNER JOIN clause to the query using the Inscripcion relation
 *
 * @method     ChildEFinalizacionQuery joinWithInscripcion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Inscripcion relation
 *
 * @method     ChildEFinalizacionQuery leftJoinWithInscripcion() Adds a LEFT JOIN clause and with to the query using the Inscripcion relation
 * @method     ChildEFinalizacionQuery rightJoinWithInscripcion() Adds a RIGHT JOIN clause and with to the query using the Inscripcion relation
 * @method     ChildEFinalizacionQuery innerJoinWithInscripcion() Adds a INNER JOIN clause and with to the query using the Inscripcion relation
 *
 * @method     \TCalificacionQuery|\InscripcionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEFinalizacion findOne(ConnectionInterface $con = null) Return the first ChildEFinalizacion matching the query
 * @method     ChildEFinalizacion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEFinalizacion matching the query, or a new ChildEFinalizacion object populated from the query conditions when no match is found
 *
 * @method     ChildEFinalizacion findOneByEfinEstado(int $efin_estado) Return the first ChildEFinalizacion filtered by the efin_estado column
 * @method     ChildEFinalizacion findOneByEfinTCalificacion(int $efin_t_calificacion) Return the first ChildEFinalizacion filtered by the efin_t_calificacion column
 * @method     ChildEFinalizacion findOneByEfinResultado(string $efin_resultado) Return the first ChildEFinalizacion filtered by the efin_resultado column
 * @method     ChildEFinalizacion findOneByEfinDescripcion(string $efin_descripcion) Return the first ChildEFinalizacion filtered by the efin_descripcion column
 * @method     ChildEFinalizacion findOneByEfinCotaInferior(int $efin_cota_inferior) Return the first ChildEFinalizacion filtered by the efin_cota_inferior column
 * @method     ChildEFinalizacion findOneByEfinCotaSuperior(string $efin_cota_superior) Return the first ChildEFinalizacion filtered by the efin_cota_superior column
 * @method     ChildEFinalizacion findOneByEfinRFechaCreacion(string $efin_r_fecha_creacion) Return the first ChildEFinalizacion filtered by the efin_r_fecha_creacion column
 * @method     ChildEFinalizacion findOneByEfinRFechaModificacion(string $efin_r_fecha_modificacion) Return the first ChildEFinalizacion filtered by the efin_r_fecha_modificacion column
 * @method     ChildEFinalizacion findOneByEfinRUsuario(int $efin_r_usuario) Return the first ChildEFinalizacion filtered by the efin_r_usuario column *

 * @method     ChildEFinalizacion requirePk($key, ConnectionInterface $con = null) Return the ChildEFinalizacion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEFinalizacion requireOne(ConnectionInterface $con = null) Return the first ChildEFinalizacion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEFinalizacion requireOneByEfinEstado(int $efin_estado) Return the first ChildEFinalizacion filtered by the efin_estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEFinalizacion requireOneByEfinTCalificacion(int $efin_t_calificacion) Return the first ChildEFinalizacion filtered by the efin_t_calificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEFinalizacion requireOneByEfinResultado(string $efin_resultado) Return the first ChildEFinalizacion filtered by the efin_resultado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEFinalizacion requireOneByEfinDescripcion(string $efin_descripcion) Return the first ChildEFinalizacion filtered by the efin_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEFinalizacion requireOneByEfinCotaInferior(int $efin_cota_inferior) Return the first ChildEFinalizacion filtered by the efin_cota_inferior column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEFinalizacion requireOneByEfinCotaSuperior(string $efin_cota_superior) Return the first ChildEFinalizacion filtered by the efin_cota_superior column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEFinalizacion requireOneByEfinRFechaCreacion(string $efin_r_fecha_creacion) Return the first ChildEFinalizacion filtered by the efin_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEFinalizacion requireOneByEfinRFechaModificacion(string $efin_r_fecha_modificacion) Return the first ChildEFinalizacion filtered by the efin_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEFinalizacion requireOneByEfinRUsuario(int $efin_r_usuario) Return the first ChildEFinalizacion filtered by the efin_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEFinalizacion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEFinalizacion objects based on current ModelCriteria
 * @method     ChildEFinalizacion[]|ObjectCollection findByEfinEstado(int $efin_estado) Return ChildEFinalizacion objects filtered by the efin_estado column
 * @method     ChildEFinalizacion[]|ObjectCollection findByEfinTCalificacion(int $efin_t_calificacion) Return ChildEFinalizacion objects filtered by the efin_t_calificacion column
 * @method     ChildEFinalizacion[]|ObjectCollection findByEfinResultado(string $efin_resultado) Return ChildEFinalizacion objects filtered by the efin_resultado column
 * @method     ChildEFinalizacion[]|ObjectCollection findByEfinDescripcion(string $efin_descripcion) Return ChildEFinalizacion objects filtered by the efin_descripcion column
 * @method     ChildEFinalizacion[]|ObjectCollection findByEfinCotaInferior(int $efin_cota_inferior) Return ChildEFinalizacion objects filtered by the efin_cota_inferior column
 * @method     ChildEFinalizacion[]|ObjectCollection findByEfinCotaSuperior(string $efin_cota_superior) Return ChildEFinalizacion objects filtered by the efin_cota_superior column
 * @method     ChildEFinalizacion[]|ObjectCollection findByEfinRFechaCreacion(string $efin_r_fecha_creacion) Return ChildEFinalizacion objects filtered by the efin_r_fecha_creacion column
 * @method     ChildEFinalizacion[]|ObjectCollection findByEfinRFechaModificacion(string $efin_r_fecha_modificacion) Return ChildEFinalizacion objects filtered by the efin_r_fecha_modificacion column
 * @method     ChildEFinalizacion[]|ObjectCollection findByEfinRUsuario(int $efin_r_usuario) Return ChildEFinalizacion objects filtered by the efin_r_usuario column
 * @method     ChildEFinalizacion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EFinalizacionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EFinalizacionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\EFinalizacion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEFinalizacionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEFinalizacionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEFinalizacionQuery) {
            return $criteria;
        }
        $query = new ChildEFinalizacionQuery();
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
     * @return ChildEFinalizacion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EFinalizacionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EFinalizacionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEFinalizacion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT efin_estado, efin_t_calificacion, efin_resultado, efin_descripcion, efin_cota_inferior, efin_cota_superior, efin_r_fecha_creacion, efin_r_fecha_modificacion, efin_r_usuario FROM e_finalizacion WHERE efin_estado = :p0';
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
            /** @var ChildEFinalizacion $obj */
            $obj = new ChildEFinalizacion();
            $obj->hydrate($row);
            EFinalizacionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEFinalizacion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_ESTADO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_ESTADO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the efin_estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEfinEstado(1234); // WHERE efin_estado = 1234
     * $query->filterByEfinEstado(array(12, 34)); // WHERE efin_estado IN (12, 34)
     * $query->filterByEfinEstado(array('min' => 12)); // WHERE efin_estado > 12
     * </code>
     *
     * @param     mixed $efinEstado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByEfinEstado($efinEstado = null, $comparison = null)
    {
        if (is_array($efinEstado)) {
            $useMinMax = false;
            if (isset($efinEstado['min'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_ESTADO, $efinEstado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($efinEstado['max'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_ESTADO, $efinEstado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_ESTADO, $efinEstado, $comparison);
    }

    /**
     * Filter the query on the efin_t_calificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEfinTCalificacion(1234); // WHERE efin_t_calificacion = 1234
     * $query->filterByEfinTCalificacion(array(12, 34)); // WHERE efin_t_calificacion IN (12, 34)
     * $query->filterByEfinTCalificacion(array('min' => 12)); // WHERE efin_t_calificacion > 12
     * </code>
     *
     * @see       filterByTCalificacion()
     *
     * @param     mixed $efinTCalificacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByEfinTCalificacion($efinTCalificacion = null, $comparison = null)
    {
        if (is_array($efinTCalificacion)) {
            $useMinMax = false;
            if (isset($efinTCalificacion['min'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_T_CALIFICACION, $efinTCalificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($efinTCalificacion['max'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_T_CALIFICACION, $efinTCalificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_T_CALIFICACION, $efinTCalificacion, $comparison);
    }

    /**
     * Filter the query on the efin_resultado column
     *
     * Example usage:
     * <code>
     * $query->filterByEfinResultado('fooValue');   // WHERE efin_resultado = 'fooValue'
     * $query->filterByEfinResultado('%fooValue%', Criteria::LIKE); // WHERE efin_resultado LIKE '%fooValue%'
     * </code>
     *
     * @param     string $efinResultado The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByEfinResultado($efinResultado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($efinResultado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_RESULTADO, $efinResultado, $comparison);
    }

    /**
     * Filter the query on the efin_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEfinDescripcion('fooValue');   // WHERE efin_descripcion = 'fooValue'
     * $query->filterByEfinDescripcion('%fooValue%', Criteria::LIKE); // WHERE efin_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $efinDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByEfinDescripcion($efinDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($efinDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_DESCRIPCION, $efinDescripcion, $comparison);
    }

    /**
     * Filter the query on the efin_cota_inferior column
     *
     * Example usage:
     * <code>
     * $query->filterByEfinCotaInferior(1234); // WHERE efin_cota_inferior = 1234
     * $query->filterByEfinCotaInferior(array(12, 34)); // WHERE efin_cota_inferior IN (12, 34)
     * $query->filterByEfinCotaInferior(array('min' => 12)); // WHERE efin_cota_inferior > 12
     * </code>
     *
     * @param     mixed $efinCotaInferior The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByEfinCotaInferior($efinCotaInferior = null, $comparison = null)
    {
        if (is_array($efinCotaInferior)) {
            $useMinMax = false;
            if (isset($efinCotaInferior['min'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_COTA_INFERIOR, $efinCotaInferior['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($efinCotaInferior['max'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_COTA_INFERIOR, $efinCotaInferior['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_COTA_INFERIOR, $efinCotaInferior, $comparison);
    }

    /**
     * Filter the query on the efin_cota_superior column
     *
     * Example usage:
     * <code>
     * $query->filterByEfinCotaSuperior('fooValue');   // WHERE efin_cota_superior = 'fooValue'
     * $query->filterByEfinCotaSuperior('%fooValue%', Criteria::LIKE); // WHERE efin_cota_superior LIKE '%fooValue%'
     * </code>
     *
     * @param     string $efinCotaSuperior The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByEfinCotaSuperior($efinCotaSuperior = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($efinCotaSuperior)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_COTA_SUPERIOR, $efinCotaSuperior, $comparison);
    }

    /**
     * Filter the query on the efin_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEfinRFechaCreacion('2011-03-14'); // WHERE efin_r_fecha_creacion = '2011-03-14'
     * $query->filterByEfinRFechaCreacion('now'); // WHERE efin_r_fecha_creacion = '2011-03-14'
     * $query->filterByEfinRFechaCreacion(array('max' => 'yesterday')); // WHERE efin_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $efinRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByEfinRFechaCreacion($efinRFechaCreacion = null, $comparison = null)
    {
        if (is_array($efinRFechaCreacion)) {
            $useMinMax = false;
            if (isset($efinRFechaCreacion['min'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_R_FECHA_CREACION, $efinRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($efinRFechaCreacion['max'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_R_FECHA_CREACION, $efinRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_R_FECHA_CREACION, $efinRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the efin_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEfinRFechaModificacion('2011-03-14'); // WHERE efin_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEfinRFechaModificacion('now'); // WHERE efin_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEfinRFechaModificacion(array('max' => 'yesterday')); // WHERE efin_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $efinRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByEfinRFechaModificacion($efinRFechaModificacion = null, $comparison = null)
    {
        if (is_array($efinRFechaModificacion)) {
            $useMinMax = false;
            if (isset($efinRFechaModificacion['min'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_R_FECHA_MODIFICACION, $efinRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($efinRFechaModificacion['max'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_R_FECHA_MODIFICACION, $efinRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_R_FECHA_MODIFICACION, $efinRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the efin_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEfinRUsuario(1234); // WHERE efin_r_usuario = 1234
     * $query->filterByEfinRUsuario(array(12, 34)); // WHERE efin_r_usuario IN (12, 34)
     * $query->filterByEfinRUsuario(array('min' => 12)); // WHERE efin_r_usuario > 12
     * </code>
     *
     * @param     mixed $efinRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByEfinRUsuario($efinRUsuario = null, $comparison = null)
    {
        if (is_array($efinRUsuario)) {
            $useMinMax = false;
            if (isset($efinRUsuario['min'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_R_USUARIO, $efinRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($efinRUsuario['max'])) {
                $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_R_USUARIO, $efinRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_R_USUARIO, $efinRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \TCalificacion object
     *
     * @param \TCalificacion|ObjectCollection $tCalificacion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByTCalificacion($tCalificacion, $comparison = null)
    {
        if ($tCalificacion instanceof \TCalificacion) {
            return $this
                ->addUsingAlias(EFinalizacionTableMap::COL_EFIN_T_CALIFICACION, $tCalificacion->getTcalTipo(), $comparison);
        } elseif ($tCalificacion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EFinalizacionTableMap::COL_EFIN_T_CALIFICACION, $tCalificacion->toKeyValue('PrimaryKey', 'TcalTipo'), $comparison);
        } else {
            throw new PropelException('filterByTCalificacion() only accepts arguments of type \TCalificacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TCalificacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function joinTCalificacion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TCalificacion');

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
            $this->addJoinObject($join, 'TCalificacion');
        }

        return $this;
    }

    /**
     * Use the TCalificacion relation TCalificacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TCalificacionQuery A secondary query class using the current class as primary query
     */
    public function useTCalificacionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTCalificacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TCalificacion', '\TCalificacionQuery');
    }

    /**
     * Filter the query by a related \Inscripcion object
     *
     * @param \Inscripcion|ObjectCollection $inscripcion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function filterByInscripcion($inscripcion, $comparison = null)
    {
        if ($inscripcion instanceof \Inscripcion) {
            return $this
                ->addUsingAlias(EFinalizacionTableMap::COL_EFIN_ESTADO, $inscripcion->getInscEFinalizacion(), $comparison);
        } elseif ($inscripcion instanceof ObjectCollection) {
            return $this
                ->useInscripcionQuery()
                ->filterByPrimaryKeys($inscripcion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInscripcion() only accepts arguments of type \Inscripcion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Inscripcion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function joinInscripcion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Inscripcion');

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
            $this->addJoinObject($join, 'Inscripcion');
        }

        return $this;
    }

    /**
     * Use the Inscripcion relation Inscripcion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InscripcionQuery A secondary query class using the current class as primary query
     */
    public function useInscripcionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinInscripcion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Inscripcion', '\InscripcionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEFinalizacion $eFinalizacion Object to remove from the list of results
     *
     * @return $this|ChildEFinalizacionQuery The current query, for fluid interface
     */
    public function prune($eFinalizacion = null)
    {
        if ($eFinalizacion) {
            $this->addUsingAlias(EFinalizacionTableMap::COL_EFIN_ESTADO, $eFinalizacion->getEfinEstado(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the e_finalizacion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EFinalizacionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EFinalizacionTableMap::clearInstancePool();
            EFinalizacionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EFinalizacionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EFinalizacionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EFinalizacionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EFinalizacionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EFinalizacionQuery
