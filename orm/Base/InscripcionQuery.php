<?php

namespace Base;

use \Inscripcion as ChildInscripcion;
use \InscripcionQuery as ChildInscripcionQuery;
use \Exception;
use \PDO;
use Map\InscripcionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'inscripcion' table.
 *
 *
 *
 * @method     ChildInscripcionQuery orderByInscCActividad($order = Criteria::ASC) Order by the insc_c_actividad column
 * @method     ChildInscripcionQuery orderByInscNumeroDictacion($order = Criteria::ASC) Order by the insc_numero_dictacion column
 * @method     ChildInscripcionQuery orderByInscCTrabajador($order = Criteria::ASC) Order by the insc_c_trabajador column
 * @method     ChildInscripcionQuery orderByInscEInscripcion($order = Criteria::ASC) Order by the insc_e_inscripcion column
 * @method     ChildInscripcionQuery orderByInscEFinalizacion($order = Criteria::ASC) Order by the insc_e_finalizacion column
 * @method     ChildInscripcionQuery orderByInscGrupo($order = Criteria::ASC) Order by the insc_grupo column
 * @method     ChildInscripcionQuery orderByInscAsistencia($order = Criteria::ASC) Order by the insc_asistencia column
 * @method     ChildInscripcionQuery orderByInscNota($order = Criteria::ASC) Order by the insc_nota column
 * @method     ChildInscripcionQuery orderByInscResultado($order = Criteria::ASC) Order by the insc_resultado column
 * @method     ChildInscripcionQuery orderByInscRFechaCreacion($order = Criteria::ASC) Order by the insc_r_fecha_creacion column
 * @method     ChildInscripcionQuery orderByInscRFechaModificacion($order = Criteria::ASC) Order by the insc_r_fecha_modificacion column
 * @method     ChildInscripcionQuery orderByInscRUsuario($order = Criteria::ASC) Order by the insc_r_usuario column
 *
 * @method     ChildInscripcionQuery groupByInscCActividad() Group by the insc_c_actividad column
 * @method     ChildInscripcionQuery groupByInscNumeroDictacion() Group by the insc_numero_dictacion column
 * @method     ChildInscripcionQuery groupByInscCTrabajador() Group by the insc_c_trabajador column
 * @method     ChildInscripcionQuery groupByInscEInscripcion() Group by the insc_e_inscripcion column
 * @method     ChildInscripcionQuery groupByInscEFinalizacion() Group by the insc_e_finalizacion column
 * @method     ChildInscripcionQuery groupByInscGrupo() Group by the insc_grupo column
 * @method     ChildInscripcionQuery groupByInscAsistencia() Group by the insc_asistencia column
 * @method     ChildInscripcionQuery groupByInscNota() Group by the insc_nota column
 * @method     ChildInscripcionQuery groupByInscResultado() Group by the insc_resultado column
 * @method     ChildInscripcionQuery groupByInscRFechaCreacion() Group by the insc_r_fecha_creacion column
 * @method     ChildInscripcionQuery groupByInscRFechaModificacion() Group by the insc_r_fecha_modificacion column
 * @method     ChildInscripcionQuery groupByInscRUsuario() Group by the insc_r_usuario column
 *
 * @method     ChildInscripcionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInscripcionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInscripcionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInscripcionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInscripcionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInscripcionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInscripcionQuery leftJoinDictacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dictacion relation
 * @method     ChildInscripcionQuery rightJoinDictacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dictacion relation
 * @method     ChildInscripcionQuery innerJoinDictacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Dictacion relation
 *
 * @method     ChildInscripcionQuery joinWithDictacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dictacion relation
 *
 * @method     ChildInscripcionQuery leftJoinWithDictacion() Adds a LEFT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildInscripcionQuery rightJoinWithDictacion() Adds a RIGHT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildInscripcionQuery innerJoinWithDictacion() Adds a INNER JOIN clause and with to the query using the Dictacion relation
 *
 * @method     ChildInscripcionQuery leftJoinEFinalizacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the EFinalizacion relation
 * @method     ChildInscripcionQuery rightJoinEFinalizacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EFinalizacion relation
 * @method     ChildInscripcionQuery innerJoinEFinalizacion($relationAlias = null) Adds a INNER JOIN clause to the query using the EFinalizacion relation
 *
 * @method     ChildInscripcionQuery joinWithEFinalizacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EFinalizacion relation
 *
 * @method     ChildInscripcionQuery leftJoinWithEFinalizacion() Adds a LEFT JOIN clause and with to the query using the EFinalizacion relation
 * @method     ChildInscripcionQuery rightJoinWithEFinalizacion() Adds a RIGHT JOIN clause and with to the query using the EFinalizacion relation
 * @method     ChildInscripcionQuery innerJoinWithEFinalizacion() Adds a INNER JOIN clause and with to the query using the EFinalizacion relation
 *
 * @method     ChildInscripcionQuery leftJoinEInscripcion($relationAlias = null) Adds a LEFT JOIN clause to the query using the EInscripcion relation
 * @method     ChildInscripcionQuery rightJoinEInscripcion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EInscripcion relation
 * @method     ChildInscripcionQuery innerJoinEInscripcion($relationAlias = null) Adds a INNER JOIN clause to the query using the EInscripcion relation
 *
 * @method     ChildInscripcionQuery joinWithEInscripcion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EInscripcion relation
 *
 * @method     ChildInscripcionQuery leftJoinWithEInscripcion() Adds a LEFT JOIN clause and with to the query using the EInscripcion relation
 * @method     ChildInscripcionQuery rightJoinWithEInscripcion() Adds a RIGHT JOIN clause and with to the query using the EInscripcion relation
 * @method     ChildInscripcionQuery innerJoinWithEInscripcion() Adds a INNER JOIN clause and with to the query using the EInscripcion relation
 *
 * @method     ChildInscripcionQuery leftJoinTrabajador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trabajador relation
 * @method     ChildInscripcionQuery rightJoinTrabajador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trabajador relation
 * @method     ChildInscripcionQuery innerJoinTrabajador($relationAlias = null) Adds a INNER JOIN clause to the query using the Trabajador relation
 *
 * @method     ChildInscripcionQuery joinWithTrabajador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Trabajador relation
 *
 * @method     ChildInscripcionQuery leftJoinWithTrabajador() Adds a LEFT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildInscripcionQuery rightJoinWithTrabajador() Adds a RIGHT JOIN clause and with to the query using the Trabajador relation
 * @method     ChildInscripcionQuery innerJoinWithTrabajador() Adds a INNER JOIN clause and with to the query using the Trabajador relation
 *
 * @method     ChildInscripcionQuery leftJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildInscripcionQuery rightJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildInscripcionQuery innerJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     ChildInscripcionQuery joinWithInscripcionEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     ChildInscripcionQuery leftJoinWithInscripcionEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildInscripcionQuery rightJoinWithInscripcionEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildInscripcionQuery innerJoinWithInscripcionEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     \DictacionQuery|\EFinalizacionQuery|\EInscripcionQuery|\TrabajadorQuery|\InscripcionEvaluacionAplicadaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInscripcion findOne(ConnectionInterface $con = null) Return the first ChildInscripcion matching the query
 * @method     ChildInscripcion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInscripcion matching the query, or a new ChildInscripcion object populated from the query conditions when no match is found
 *
 * @method     ChildInscripcion findOneByInscCActividad(int $insc_c_actividad) Return the first ChildInscripcion filtered by the insc_c_actividad column
 * @method     ChildInscripcion findOneByInscNumeroDictacion(int $insc_numero_dictacion) Return the first ChildInscripcion filtered by the insc_numero_dictacion column
 * @method     ChildInscripcion findOneByInscCTrabajador(int $insc_c_trabajador) Return the first ChildInscripcion filtered by the insc_c_trabajador column
 * @method     ChildInscripcion findOneByInscEInscripcion(int $insc_e_inscripcion) Return the first ChildInscripcion filtered by the insc_e_inscripcion column
 * @method     ChildInscripcion findOneByInscEFinalizacion(int $insc_e_finalizacion) Return the first ChildInscripcion filtered by the insc_e_finalizacion column
 * @method     ChildInscripcion findOneByInscGrupo(int $insc_grupo) Return the first ChildInscripcion filtered by the insc_grupo column
 * @method     ChildInscripcion findOneByInscAsistencia(int $insc_asistencia) Return the first ChildInscripcion filtered by the insc_asistencia column
 * @method     ChildInscripcion findOneByInscNota(string $insc_nota) Return the first ChildInscripcion filtered by the insc_nota column
 * @method     ChildInscripcion findOneByInscResultado(string $insc_resultado) Return the first ChildInscripcion filtered by the insc_resultado column
 * @method     ChildInscripcion findOneByInscRFechaCreacion(string $insc_r_fecha_creacion) Return the first ChildInscripcion filtered by the insc_r_fecha_creacion column
 * @method     ChildInscripcion findOneByInscRFechaModificacion(string $insc_r_fecha_modificacion) Return the first ChildInscripcion filtered by the insc_r_fecha_modificacion column
 * @method     ChildInscripcion findOneByInscRUsuario(int $insc_r_usuario) Return the first ChildInscripcion filtered by the insc_r_usuario column *

 * @method     ChildInscripcion requirePk($key, ConnectionInterface $con = null) Return the ChildInscripcion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOne(ConnectionInterface $con = null) Return the first ChildInscripcion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInscripcion requireOneByInscCActividad(int $insc_c_actividad) Return the first ChildInscripcion filtered by the insc_c_actividad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOneByInscNumeroDictacion(int $insc_numero_dictacion) Return the first ChildInscripcion filtered by the insc_numero_dictacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOneByInscCTrabajador(int $insc_c_trabajador) Return the first ChildInscripcion filtered by the insc_c_trabajador column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOneByInscEInscripcion(int $insc_e_inscripcion) Return the first ChildInscripcion filtered by the insc_e_inscripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOneByInscEFinalizacion(int $insc_e_finalizacion) Return the first ChildInscripcion filtered by the insc_e_finalizacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOneByInscGrupo(int $insc_grupo) Return the first ChildInscripcion filtered by the insc_grupo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOneByInscAsistencia(int $insc_asistencia) Return the first ChildInscripcion filtered by the insc_asistencia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOneByInscNota(string $insc_nota) Return the first ChildInscripcion filtered by the insc_nota column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOneByInscResultado(string $insc_resultado) Return the first ChildInscripcion filtered by the insc_resultado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOneByInscRFechaCreacion(string $insc_r_fecha_creacion) Return the first ChildInscripcion filtered by the insc_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOneByInscRFechaModificacion(string $insc_r_fecha_modificacion) Return the first ChildInscripcion filtered by the insc_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcion requireOneByInscRUsuario(int $insc_r_usuario) Return the first ChildInscripcion filtered by the insc_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInscripcion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInscripcion objects based on current ModelCriteria
 * @method     ChildInscripcion[]|ObjectCollection findByInscCActividad(int $insc_c_actividad) Return ChildInscripcion objects filtered by the insc_c_actividad column
 * @method     ChildInscripcion[]|ObjectCollection findByInscNumeroDictacion(int $insc_numero_dictacion) Return ChildInscripcion objects filtered by the insc_numero_dictacion column
 * @method     ChildInscripcion[]|ObjectCollection findByInscCTrabajador(int $insc_c_trabajador) Return ChildInscripcion objects filtered by the insc_c_trabajador column
 * @method     ChildInscripcion[]|ObjectCollection findByInscEInscripcion(int $insc_e_inscripcion) Return ChildInscripcion objects filtered by the insc_e_inscripcion column
 * @method     ChildInscripcion[]|ObjectCollection findByInscEFinalizacion(int $insc_e_finalizacion) Return ChildInscripcion objects filtered by the insc_e_finalizacion column
 * @method     ChildInscripcion[]|ObjectCollection findByInscGrupo(int $insc_grupo) Return ChildInscripcion objects filtered by the insc_grupo column
 * @method     ChildInscripcion[]|ObjectCollection findByInscAsistencia(int $insc_asistencia) Return ChildInscripcion objects filtered by the insc_asistencia column
 * @method     ChildInscripcion[]|ObjectCollection findByInscNota(string $insc_nota) Return ChildInscripcion objects filtered by the insc_nota column
 * @method     ChildInscripcion[]|ObjectCollection findByInscResultado(string $insc_resultado) Return ChildInscripcion objects filtered by the insc_resultado column
 * @method     ChildInscripcion[]|ObjectCollection findByInscRFechaCreacion(string $insc_r_fecha_creacion) Return ChildInscripcion objects filtered by the insc_r_fecha_creacion column
 * @method     ChildInscripcion[]|ObjectCollection findByInscRFechaModificacion(string $insc_r_fecha_modificacion) Return ChildInscripcion objects filtered by the insc_r_fecha_modificacion column
 * @method     ChildInscripcion[]|ObjectCollection findByInscRUsuario(int $insc_r_usuario) Return ChildInscripcion objects filtered by the insc_r_usuario column
 * @method     ChildInscripcion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InscripcionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\InscripcionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Inscripcion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInscripcionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInscripcionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInscripcionQuery) {
            return $criteria;
        }
        $query = new ChildInscripcionQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$insc_c_actividad, $insc_numero_dictacion, $insc_c_trabajador] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildInscripcion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InscripcionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InscripcionTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildInscripcion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT insc_c_actividad, insc_numero_dictacion, insc_c_trabajador, insc_e_inscripcion, insc_e_finalizacion, insc_grupo, insc_asistencia, insc_nota, insc_resultado, insc_r_fecha_creacion, insc_r_fecha_modificacion, insc_r_usuario FROM inscripcion WHERE insc_c_actividad = :p0 AND insc_numero_dictacion = :p1 AND insc_c_trabajador = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildInscripcion $obj */
            $obj = new ChildInscripcion();
            $obj->hydrate($row);
            InscripcionTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildInscripcion|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(InscripcionTableMap::COL_INSC_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(InscripcionTableMap::COL_INSC_NUMERO_DICTACION, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(InscripcionTableMap::COL_INSC_C_TRABAJADOR, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(InscripcionTableMap::COL_INSC_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(InscripcionTableMap::COL_INSC_NUMERO_DICTACION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(InscripcionTableMap::COL_INSC_C_TRABAJADOR, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the insc_c_actividad column
     *
     * Example usage:
     * <code>
     * $query->filterByInscCActividad(1234); // WHERE insc_c_actividad = 1234
     * $query->filterByInscCActividad(array(12, 34)); // WHERE insc_c_actividad IN (12, 34)
     * $query->filterByInscCActividad(array('min' => 12)); // WHERE insc_c_actividad > 12
     * </code>
     *
     * @see       filterByDictacion()
     *
     * @param     mixed $inscCActividad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscCActividad($inscCActividad = null, $comparison = null)
    {
        if (is_array($inscCActividad)) {
            $useMinMax = false;
            if (isset($inscCActividad['min'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_C_ACTIVIDAD, $inscCActividad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inscCActividad['max'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_C_ACTIVIDAD, $inscCActividad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_C_ACTIVIDAD, $inscCActividad, $comparison);
    }

    /**
     * Filter the query on the insc_numero_dictacion column
     *
     * Example usage:
     * <code>
     * $query->filterByInscNumeroDictacion(1234); // WHERE insc_numero_dictacion = 1234
     * $query->filterByInscNumeroDictacion(array(12, 34)); // WHERE insc_numero_dictacion IN (12, 34)
     * $query->filterByInscNumeroDictacion(array('min' => 12)); // WHERE insc_numero_dictacion > 12
     * </code>
     *
     * @see       filterByDictacion()
     *
     * @param     mixed $inscNumeroDictacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscNumeroDictacion($inscNumeroDictacion = null, $comparison = null)
    {
        if (is_array($inscNumeroDictacion)) {
            $useMinMax = false;
            if (isset($inscNumeroDictacion['min'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_NUMERO_DICTACION, $inscNumeroDictacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inscNumeroDictacion['max'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_NUMERO_DICTACION, $inscNumeroDictacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_NUMERO_DICTACION, $inscNumeroDictacion, $comparison);
    }

    /**
     * Filter the query on the insc_c_trabajador column
     *
     * Example usage:
     * <code>
     * $query->filterByInscCTrabajador(1234); // WHERE insc_c_trabajador = 1234
     * $query->filterByInscCTrabajador(array(12, 34)); // WHERE insc_c_trabajador IN (12, 34)
     * $query->filterByInscCTrabajador(array('min' => 12)); // WHERE insc_c_trabajador > 12
     * </code>
     *
     * @see       filterByTrabajador()
     *
     * @param     mixed $inscCTrabajador The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscCTrabajador($inscCTrabajador = null, $comparison = null)
    {
        if (is_array($inscCTrabajador)) {
            $useMinMax = false;
            if (isset($inscCTrabajador['min'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_C_TRABAJADOR, $inscCTrabajador['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inscCTrabajador['max'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_C_TRABAJADOR, $inscCTrabajador['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_C_TRABAJADOR, $inscCTrabajador, $comparison);
    }

    /**
     * Filter the query on the insc_e_inscripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByInscEInscripcion(1234); // WHERE insc_e_inscripcion = 1234
     * $query->filterByInscEInscripcion(array(12, 34)); // WHERE insc_e_inscripcion IN (12, 34)
     * $query->filterByInscEInscripcion(array('min' => 12)); // WHERE insc_e_inscripcion > 12
     * </code>
     *
     * @see       filterByEInscripcion()
     *
     * @param     mixed $inscEInscripcion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscEInscripcion($inscEInscripcion = null, $comparison = null)
    {
        if (is_array($inscEInscripcion)) {
            $useMinMax = false;
            if (isset($inscEInscripcion['min'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_E_INSCRIPCION, $inscEInscripcion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inscEInscripcion['max'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_E_INSCRIPCION, $inscEInscripcion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_E_INSCRIPCION, $inscEInscripcion, $comparison);
    }

    /**
     * Filter the query on the insc_e_finalizacion column
     *
     * Example usage:
     * <code>
     * $query->filterByInscEFinalizacion(1234); // WHERE insc_e_finalizacion = 1234
     * $query->filterByInscEFinalizacion(array(12, 34)); // WHERE insc_e_finalizacion IN (12, 34)
     * $query->filterByInscEFinalizacion(array('min' => 12)); // WHERE insc_e_finalizacion > 12
     * </code>
     *
     * @see       filterByEFinalizacion()
     *
     * @param     mixed $inscEFinalizacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscEFinalizacion($inscEFinalizacion = null, $comparison = null)
    {
        if (is_array($inscEFinalizacion)) {
            $useMinMax = false;
            if (isset($inscEFinalizacion['min'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_E_FINALIZACION, $inscEFinalizacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inscEFinalizacion['max'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_E_FINALIZACION, $inscEFinalizacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_E_FINALIZACION, $inscEFinalizacion, $comparison);
    }

    /**
     * Filter the query on the insc_grupo column
     *
     * Example usage:
     * <code>
     * $query->filterByInscGrupo(1234); // WHERE insc_grupo = 1234
     * $query->filterByInscGrupo(array(12, 34)); // WHERE insc_grupo IN (12, 34)
     * $query->filterByInscGrupo(array('min' => 12)); // WHERE insc_grupo > 12
     * </code>
     *
     * @param     mixed $inscGrupo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscGrupo($inscGrupo = null, $comparison = null)
    {
        if (is_array($inscGrupo)) {
            $useMinMax = false;
            if (isset($inscGrupo['min'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_GRUPO, $inscGrupo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inscGrupo['max'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_GRUPO, $inscGrupo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_GRUPO, $inscGrupo, $comparison);
    }

    /**
     * Filter the query on the insc_asistencia column
     *
     * Example usage:
     * <code>
     * $query->filterByInscAsistencia(1234); // WHERE insc_asistencia = 1234
     * $query->filterByInscAsistencia(array(12, 34)); // WHERE insc_asistencia IN (12, 34)
     * $query->filterByInscAsistencia(array('min' => 12)); // WHERE insc_asistencia > 12
     * </code>
     *
     * @param     mixed $inscAsistencia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscAsistencia($inscAsistencia = null, $comparison = null)
    {
        if (is_array($inscAsistencia)) {
            $useMinMax = false;
            if (isset($inscAsistencia['min'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_ASISTENCIA, $inscAsistencia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inscAsistencia['max'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_ASISTENCIA, $inscAsistencia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_ASISTENCIA, $inscAsistencia, $comparison);
    }

    /**
     * Filter the query on the insc_nota column
     *
     * Example usage:
     * <code>
     * $query->filterByInscNota('fooValue');   // WHERE insc_nota = 'fooValue'
     * $query->filterByInscNota('%fooValue%', Criteria::LIKE); // WHERE insc_nota LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inscNota The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscNota($inscNota = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inscNota)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_NOTA, $inscNota, $comparison);
    }

    /**
     * Filter the query on the insc_resultado column
     *
     * Example usage:
     * <code>
     * $query->filterByInscResultado('fooValue');   // WHERE insc_resultado = 'fooValue'
     * $query->filterByInscResultado('%fooValue%', Criteria::LIKE); // WHERE insc_resultado LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inscResultado The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscResultado($inscResultado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inscResultado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_RESULTADO, $inscResultado, $comparison);
    }

    /**
     * Filter the query on the insc_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByInscRFechaCreacion('2011-03-14'); // WHERE insc_r_fecha_creacion = '2011-03-14'
     * $query->filterByInscRFechaCreacion('now'); // WHERE insc_r_fecha_creacion = '2011-03-14'
     * $query->filterByInscRFechaCreacion(array('max' => 'yesterday')); // WHERE insc_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $inscRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscRFechaCreacion($inscRFechaCreacion = null, $comparison = null)
    {
        if (is_array($inscRFechaCreacion)) {
            $useMinMax = false;
            if (isset($inscRFechaCreacion['min'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_R_FECHA_CREACION, $inscRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inscRFechaCreacion['max'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_R_FECHA_CREACION, $inscRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_R_FECHA_CREACION, $inscRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the insc_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByInscRFechaModificacion('2011-03-14'); // WHERE insc_r_fecha_modificacion = '2011-03-14'
     * $query->filterByInscRFechaModificacion('now'); // WHERE insc_r_fecha_modificacion = '2011-03-14'
     * $query->filterByInscRFechaModificacion(array('max' => 'yesterday')); // WHERE insc_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $inscRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscRFechaModificacion($inscRFechaModificacion = null, $comparison = null)
    {
        if (is_array($inscRFechaModificacion)) {
            $useMinMax = false;
            if (isset($inscRFechaModificacion['min'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_R_FECHA_MODIFICACION, $inscRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inscRFechaModificacion['max'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_R_FECHA_MODIFICACION, $inscRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_R_FECHA_MODIFICACION, $inscRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the insc_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByInscRUsuario(1234); // WHERE insc_r_usuario = 1234
     * $query->filterByInscRUsuario(array(12, 34)); // WHERE insc_r_usuario IN (12, 34)
     * $query->filterByInscRUsuario(array('min' => 12)); // WHERE insc_r_usuario > 12
     * </code>
     *
     * @param     mixed $inscRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscRUsuario($inscRUsuario = null, $comparison = null)
    {
        if (is_array($inscRUsuario)) {
            $useMinMax = false;
            if (isset($inscRUsuario['min'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_R_USUARIO, $inscRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inscRUsuario['max'])) {
                $this->addUsingAlias(InscripcionTableMap::COL_INSC_R_USUARIO, $inscRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionTableMap::COL_INSC_R_USUARIO, $inscRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Dictacion object
     *
     * @param \Dictacion $dictacion The related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByDictacion($dictacion, $comparison = null)
    {
        if ($dictacion instanceof \Dictacion) {
            return $this
                ->addUsingAlias(InscripcionTableMap::COL_INSC_C_ACTIVIDAD, $dictacion->getDictCActividad(), $comparison)
                ->addUsingAlias(InscripcionTableMap::COL_INSC_NUMERO_DICTACION, $dictacion->getDictNumero(), $comparison);
        } else {
            throw new PropelException('filterByDictacion() only accepts arguments of type \Dictacion');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dictacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function joinDictacion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useDictacionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDictacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dictacion', '\DictacionQuery');
    }

    /**
     * Filter the query by a related \EFinalizacion object
     *
     * @param \EFinalizacion|ObjectCollection $eFinalizacion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByEFinalizacion($eFinalizacion, $comparison = null)
    {
        if ($eFinalizacion instanceof \EFinalizacion) {
            return $this
                ->addUsingAlias(InscripcionTableMap::COL_INSC_E_FINALIZACION, $eFinalizacion->getEfinEstado(), $comparison);
        } elseif ($eFinalizacion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InscripcionTableMap::COL_INSC_E_FINALIZACION, $eFinalizacion->toKeyValue('PrimaryKey', 'EfinEstado'), $comparison);
        } else {
            throw new PropelException('filterByEFinalizacion() only accepts arguments of type \EFinalizacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EFinalizacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function joinEFinalizacion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EFinalizacion');

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
            $this->addJoinObject($join, 'EFinalizacion');
        }

        return $this;
    }

    /**
     * Use the EFinalizacion relation EFinalizacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EFinalizacionQuery A secondary query class using the current class as primary query
     */
    public function useEFinalizacionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEFinalizacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EFinalizacion', '\EFinalizacionQuery');
    }

    /**
     * Filter the query by a related \EInscripcion object
     *
     * @param \EInscripcion|ObjectCollection $eInscripcion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByEInscripcion($eInscripcion, $comparison = null)
    {
        if ($eInscripcion instanceof \EInscripcion) {
            return $this
                ->addUsingAlias(InscripcionTableMap::COL_INSC_E_INSCRIPCION, $eInscripcion->getEinsEstado(), $comparison);
        } elseif ($eInscripcion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InscripcionTableMap::COL_INSC_E_INSCRIPCION, $eInscripcion->toKeyValue('PrimaryKey', 'EinsEstado'), $comparison);
        } else {
            throw new PropelException('filterByEInscripcion() only accepts arguments of type \EInscripcion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EInscripcion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function joinEInscripcion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EInscripcion');

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
            $this->addJoinObject($join, 'EInscripcion');
        }

        return $this;
    }

    /**
     * Use the EInscripcion relation EInscripcion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EInscripcionQuery A secondary query class using the current class as primary query
     */
    public function useEInscripcionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEInscripcion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EInscripcion', '\EInscripcionQuery');
    }

    /**
     * Filter the query by a related \Trabajador object
     *
     * @param \Trabajador|ObjectCollection $trabajador The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByTrabajador($trabajador, $comparison = null)
    {
        if ($trabajador instanceof \Trabajador) {
            return $this
                ->addUsingAlias(InscripcionTableMap::COL_INSC_C_TRABAJADOR, $trabajador->getTrabCodigo(), $comparison);
        } elseif ($trabajador instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InscripcionTableMap::COL_INSC_C_TRABAJADOR, $trabajador->toKeyValue('PrimaryKey', 'TrabCodigo'), $comparison);
        } else {
            throw new PropelException('filterByTrabajador() only accepts arguments of type \Trabajador or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Trabajador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function joinTrabajador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Trabajador');

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
            $this->addJoinObject($join, 'Trabajador');
        }

        return $this;
    }

    /**
     * Use the Trabajador relation Trabajador object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TrabajadorQuery A secondary query class using the current class as primary query
     */
    public function useTrabajadorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrabajador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Trabajador', '\TrabajadorQuery');
    }

    /**
     * Filter the query by a related \InscripcionEvaluacionAplicada object
     *
     * @param \InscripcionEvaluacionAplicada|ObjectCollection $inscripcionEvaluacionAplicada the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInscripcionQuery The current query, for fluid interface
     */
    public function filterByInscripcionEvaluacionAplicada($inscripcionEvaluacionAplicada, $comparison = null)
    {
        if ($inscripcionEvaluacionAplicada instanceof \InscripcionEvaluacionAplicada) {
            return $this
                ->addUsingAlias(InscripcionTableMap::COL_INSC_C_ACTIVIDAD, $inscripcionEvaluacionAplicada->getInevapCActividad(), $comparison)
                ->addUsingAlias(InscripcionTableMap::COL_INSC_NUMERO_DICTACION, $inscripcionEvaluacionAplicada->getInevapNumeroDictacion(), $comparison)
                ->addUsingAlias(InscripcionTableMap::COL_INSC_C_TRABAJADOR, $inscripcionEvaluacionAplicada->getInevapCTrabajador(), $comparison);
        } else {
            throw new PropelException('filterByInscripcionEvaluacionAplicada() only accepts arguments of type \InscripcionEvaluacionAplicada');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InscripcionEvaluacionAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function joinInscripcionEvaluacionAplicada($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useInscripcionEvaluacionAplicadaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInscripcionEvaluacionAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InscripcionEvaluacionAplicada', '\InscripcionEvaluacionAplicadaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInscripcion $inscripcion Object to remove from the list of results
     *
     * @return $this|ChildInscripcionQuery The current query, for fluid interface
     */
    public function prune($inscripcion = null)
    {
        if ($inscripcion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(InscripcionTableMap::COL_INSC_C_ACTIVIDAD), $inscripcion->getInscCActividad(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(InscripcionTableMap::COL_INSC_NUMERO_DICTACION), $inscripcion->getInscNumeroDictacion(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(InscripcionTableMap::COL_INSC_C_TRABAJADOR), $inscripcion->getInscCTrabajador(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the inscripcion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InscripcionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InscripcionTableMap::clearInstancePool();
            InscripcionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InscripcionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InscripcionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InscripcionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InscripcionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InscripcionQuery
