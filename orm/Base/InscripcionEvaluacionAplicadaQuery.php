<?php

namespace Base;

use \InscripcionEvaluacionAplicada as ChildInscripcionEvaluacionAplicada;
use \InscripcionEvaluacionAplicadaQuery as ChildInscripcionEvaluacionAplicadaQuery;
use \Exception;
use \PDO;
use Map\InscripcionEvaluacionAplicadaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'inscripcion_evaluacion_aplicada' table.
 *
 *
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery orderByInevapCActividad($order = Criteria::ASC) Order by the inevap_c_actividad column
 * @method     ChildInscripcionEvaluacionAplicadaQuery orderByInevapNumeroDictacion($order = Criteria::ASC) Order by the inevap_numero_dictacion column
 * @method     ChildInscripcionEvaluacionAplicadaQuery orderByInevapCEvaluacion($order = Criteria::ASC) Order by the inevap_c_evaluacion column
 * @method     ChildInscripcionEvaluacionAplicadaQuery orderByInevapNumeroEvaluacion($order = Criteria::ASC) Order by the inevap_numero_evaluacion column
 * @method     ChildInscripcionEvaluacionAplicadaQuery orderByInevapCTrabajador($order = Criteria::ASC) Order by the inevap_c_trabajador column
 * @method     ChildInscripcionEvaluacionAplicadaQuery orderByInevapEInscripcionEvaluacionAplicada($order = Criteria::ASC) Order by the inevap_e_inscripcion_evaluacion_aplicada column
 * @method     ChildInscripcionEvaluacionAplicadaQuery orderByInevapVigente($order = Criteria::ASC) Order by the inevap_vigente column
 * @method     ChildInscripcionEvaluacionAplicadaQuery orderByInevapRFechaCreacion($order = Criteria::ASC) Order by the inevap_r_fecha_creacion column
 * @method     ChildInscripcionEvaluacionAplicadaQuery orderByInevapRFechaModificacion($order = Criteria::ASC) Order by the inevap_r_fecha_modificacion column
 * @method     ChildInscripcionEvaluacionAplicadaQuery orderByInevapRUsuario($order = Criteria::ASC) Order by the inevap_r_usuario column
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery groupByInevapCActividad() Group by the inevap_c_actividad column
 * @method     ChildInscripcionEvaluacionAplicadaQuery groupByInevapNumeroDictacion() Group by the inevap_numero_dictacion column
 * @method     ChildInscripcionEvaluacionAplicadaQuery groupByInevapCEvaluacion() Group by the inevap_c_evaluacion column
 * @method     ChildInscripcionEvaluacionAplicadaQuery groupByInevapNumeroEvaluacion() Group by the inevap_numero_evaluacion column
 * @method     ChildInscripcionEvaluacionAplicadaQuery groupByInevapCTrabajador() Group by the inevap_c_trabajador column
 * @method     ChildInscripcionEvaluacionAplicadaQuery groupByInevapEInscripcionEvaluacionAplicada() Group by the inevap_e_inscripcion_evaluacion_aplicada column
 * @method     ChildInscripcionEvaluacionAplicadaQuery groupByInevapVigente() Group by the inevap_vigente column
 * @method     ChildInscripcionEvaluacionAplicadaQuery groupByInevapRFechaCreacion() Group by the inevap_r_fecha_creacion column
 * @method     ChildInscripcionEvaluacionAplicadaQuery groupByInevapRFechaModificacion() Group by the inevap_r_fecha_modificacion column
 * @method     ChildInscripcionEvaluacionAplicadaQuery groupByInevapRUsuario() Group by the inevap_r_usuario column
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInscripcionEvaluacionAplicadaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInscripcionEvaluacionAplicadaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInscripcionEvaluacionAplicadaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInscripcionEvaluacionAplicadaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery leftJoinEInscripcionEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the EInscripcionEvaluacionAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery rightJoinEInscripcionEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EInscripcionEvaluacionAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery innerJoinEInscripcionEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the EInscripcionEvaluacionAplicada relation
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery joinWithEInscripcionEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EInscripcionEvaluacionAplicada relation
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery leftJoinWithEInscripcionEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the EInscripcionEvaluacionAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery rightJoinWithEInscripcionEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the EInscripcionEvaluacionAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery innerJoinWithEInscripcionEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the EInscripcionEvaluacionAplicada relation
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery leftJoinEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the EvaluacionAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery rightJoinEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EvaluacionAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery innerJoinEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the EvaluacionAplicada relation
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery joinWithEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EvaluacionAplicada relation
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery leftJoinWithEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the EvaluacionAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery rightJoinWithEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the EvaluacionAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery innerJoinWithEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the EvaluacionAplicada relation
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery leftJoinInscripcion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inscripcion relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery rightJoinInscripcion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inscripcion relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery innerJoinInscripcion($relationAlias = null) Adds a INNER JOIN clause to the query using the Inscripcion relation
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery joinWithInscripcion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Inscripcion relation
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery leftJoinWithInscripcion() Adds a LEFT JOIN clause and with to the query using the Inscripcion relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery rightJoinWithInscripcion() Adds a RIGHT JOIN clause and with to the query using the Inscripcion relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery innerJoinWithInscripcion() Adds a INNER JOIN clause and with to the query using the Inscripcion relation
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery leftJoinRespuestaAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the RespuestaAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery rightJoinRespuestaAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RespuestaAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery innerJoinRespuestaAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the RespuestaAplicada relation
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery joinWithRespuestaAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the RespuestaAplicada relation
 *
 * @method     ChildInscripcionEvaluacionAplicadaQuery leftJoinWithRespuestaAplicada() Adds a LEFT JOIN clause and with to the query using the RespuestaAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery rightJoinWithRespuestaAplicada() Adds a RIGHT JOIN clause and with to the query using the RespuestaAplicada relation
 * @method     ChildInscripcionEvaluacionAplicadaQuery innerJoinWithRespuestaAplicada() Adds a INNER JOIN clause and with to the query using the RespuestaAplicada relation
 *
 * @method     \EInscripcionEvaluacionAplicadaQuery|\EvaluacionAplicadaQuery|\InscripcionQuery|\RespuestaAplicadaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInscripcionEvaluacionAplicada findOne(ConnectionInterface $con = null) Return the first ChildInscripcionEvaluacionAplicada matching the query
 * @method     ChildInscripcionEvaluacionAplicada findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInscripcionEvaluacionAplicada matching the query, or a new ChildInscripcionEvaluacionAplicada object populated from the query conditions when no match is found
 *
 * @method     ChildInscripcionEvaluacionAplicada findOneByInevapCActividad(int $inevap_c_actividad) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_c_actividad column
 * @method     ChildInscripcionEvaluacionAplicada findOneByInevapNumeroDictacion(int $inevap_numero_dictacion) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_numero_dictacion column
 * @method     ChildInscripcionEvaluacionAplicada findOneByInevapCEvaluacion(int $inevap_c_evaluacion) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_c_evaluacion column
 * @method     ChildInscripcionEvaluacionAplicada findOneByInevapNumeroEvaluacion(int $inevap_numero_evaluacion) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_numero_evaluacion column
 * @method     ChildInscripcionEvaluacionAplicada findOneByInevapCTrabajador(int $inevap_c_trabajador) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_c_trabajador column
 * @method     ChildInscripcionEvaluacionAplicada findOneByInevapEInscripcionEvaluacionAplicada(int $inevap_e_inscripcion_evaluacion_aplicada) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_e_inscripcion_evaluacion_aplicada column
 * @method     ChildInscripcionEvaluacionAplicada findOneByInevapVigente(int $inevap_vigente) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_vigente column
 * @method     ChildInscripcionEvaluacionAplicada findOneByInevapRFechaCreacion(string $inevap_r_fecha_creacion) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_r_fecha_creacion column
 * @method     ChildInscripcionEvaluacionAplicada findOneByInevapRFechaModificacion(string $inevap_r_fecha_modificacion) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_r_fecha_modificacion column
 * @method     ChildInscripcionEvaluacionAplicada findOneByInevapRUsuario(int $inevap_r_usuario) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_r_usuario column *

 * @method     ChildInscripcionEvaluacionAplicada requirePk($key, ConnectionInterface $con = null) Return the ChildInscripcionEvaluacionAplicada by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcionEvaluacionAplicada requireOne(ConnectionInterface $con = null) Return the first ChildInscripcionEvaluacionAplicada matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInscripcionEvaluacionAplicada requireOneByInevapCActividad(int $inevap_c_actividad) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_c_actividad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcionEvaluacionAplicada requireOneByInevapNumeroDictacion(int $inevap_numero_dictacion) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_numero_dictacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcionEvaluacionAplicada requireOneByInevapCEvaluacion(int $inevap_c_evaluacion) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_c_evaluacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcionEvaluacionAplicada requireOneByInevapNumeroEvaluacion(int $inevap_numero_evaluacion) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_numero_evaluacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcionEvaluacionAplicada requireOneByInevapCTrabajador(int $inevap_c_trabajador) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_c_trabajador column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcionEvaluacionAplicada requireOneByInevapEInscripcionEvaluacionAplicada(int $inevap_e_inscripcion_evaluacion_aplicada) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_e_inscripcion_evaluacion_aplicada column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcionEvaluacionAplicada requireOneByInevapVigente(int $inevap_vigente) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcionEvaluacionAplicada requireOneByInevapRFechaCreacion(string $inevap_r_fecha_creacion) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcionEvaluacionAplicada requireOneByInevapRFechaModificacion(string $inevap_r_fecha_modificacion) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInscripcionEvaluacionAplicada requireOneByInevapRUsuario(int $inevap_r_usuario) Return the first ChildInscripcionEvaluacionAplicada filtered by the inevap_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInscripcionEvaluacionAplicada[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInscripcionEvaluacionAplicada objects based on current ModelCriteria
 * @method     ChildInscripcionEvaluacionAplicada[]|ObjectCollection findByInevapCActividad(int $inevap_c_actividad) Return ChildInscripcionEvaluacionAplicada objects filtered by the inevap_c_actividad column
 * @method     ChildInscripcionEvaluacionAplicada[]|ObjectCollection findByInevapNumeroDictacion(int $inevap_numero_dictacion) Return ChildInscripcionEvaluacionAplicada objects filtered by the inevap_numero_dictacion column
 * @method     ChildInscripcionEvaluacionAplicada[]|ObjectCollection findByInevapCEvaluacion(int $inevap_c_evaluacion) Return ChildInscripcionEvaluacionAplicada objects filtered by the inevap_c_evaluacion column
 * @method     ChildInscripcionEvaluacionAplicada[]|ObjectCollection findByInevapNumeroEvaluacion(int $inevap_numero_evaluacion) Return ChildInscripcionEvaluacionAplicada objects filtered by the inevap_numero_evaluacion column
 * @method     ChildInscripcionEvaluacionAplicada[]|ObjectCollection findByInevapCTrabajador(int $inevap_c_trabajador) Return ChildInscripcionEvaluacionAplicada objects filtered by the inevap_c_trabajador column
 * @method     ChildInscripcionEvaluacionAplicada[]|ObjectCollection findByInevapEInscripcionEvaluacionAplicada(int $inevap_e_inscripcion_evaluacion_aplicada) Return ChildInscripcionEvaluacionAplicada objects filtered by the inevap_e_inscripcion_evaluacion_aplicada column
 * @method     ChildInscripcionEvaluacionAplicada[]|ObjectCollection findByInevapVigente(int $inevap_vigente) Return ChildInscripcionEvaluacionAplicada objects filtered by the inevap_vigente column
 * @method     ChildInscripcionEvaluacionAplicada[]|ObjectCollection findByInevapRFechaCreacion(string $inevap_r_fecha_creacion) Return ChildInscripcionEvaluacionAplicada objects filtered by the inevap_r_fecha_creacion column
 * @method     ChildInscripcionEvaluacionAplicada[]|ObjectCollection findByInevapRFechaModificacion(string $inevap_r_fecha_modificacion) Return ChildInscripcionEvaluacionAplicada objects filtered by the inevap_r_fecha_modificacion column
 * @method     ChildInscripcionEvaluacionAplicada[]|ObjectCollection findByInevapRUsuario(int $inevap_r_usuario) Return ChildInscripcionEvaluacionAplicada objects filtered by the inevap_r_usuario column
 * @method     ChildInscripcionEvaluacionAplicada[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InscripcionEvaluacionAplicadaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\InscripcionEvaluacionAplicadaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\InscripcionEvaluacionAplicada', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInscripcionEvaluacionAplicadaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInscripcionEvaluacionAplicadaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInscripcionEvaluacionAplicadaQuery) {
            return $criteria;
        }
        $query = new ChildInscripcionEvaluacionAplicadaQuery();
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
     * $obj = $c->findPk(array(12, 34, 56, 78, 91), $con);
     * </code>
     *
     * @param array[$inevap_c_actividad, $inevap_numero_dictacion, $inevap_c_evaluacion, $inevap_numero_evaluacion, $inevap_c_trabajador] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildInscripcionEvaluacionAplicada|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InscripcionEvaluacionAplicadaTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4])]))))) {
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
     * @return ChildInscripcionEvaluacionAplicada A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT inevap_c_actividad, inevap_numero_dictacion, inevap_c_evaluacion, inevap_numero_evaluacion, inevap_c_trabajador, inevap_e_inscripcion_evaluacion_aplicada, inevap_vigente, inevap_r_fecha_creacion, inevap_r_fecha_modificacion, inevap_r_usuario FROM inscripcion_evaluacion_aplicada WHERE inevap_c_actividad = :p0 AND inevap_numero_dictacion = :p1 AND inevap_c_evaluacion = :p2 AND inevap_numero_evaluacion = :p3 AND inevap_c_trabajador = :p4';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_INT);
            $stmt->bindValue(':p4', $key[4], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildInscripcionEvaluacionAplicada $obj */
            $obj = new ChildInscripcionEvaluacionAplicada();
            $obj->hydrate($row);
            InscripcionEvaluacionAplicadaTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4])]));
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
     * @return ChildInscripcionEvaluacionAplicada|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION, $key[3], Criteria::EQUAL);
        $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR, $key[4], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $cton4 = $this->getNewCriterion(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR, $key[4], Criteria::EQUAL);
            $cton0->addAnd($cton4);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the inevap_c_actividad column
     *
     * Example usage:
     * <code>
     * $query->filterByInevapCActividad(1234); // WHERE inevap_c_actividad = 1234
     * $query->filterByInevapCActividad(array(12, 34)); // WHERE inevap_c_actividad IN (12, 34)
     * $query->filterByInevapCActividad(array('min' => 12)); // WHERE inevap_c_actividad > 12
     * </code>
     *
     * @see       filterByEvaluacionAplicada()
     *
     * @see       filterByInscripcion()
     *
     * @param     mixed $inevapCActividad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInevapCActividad($inevapCActividad = null, $comparison = null)
    {
        if (is_array($inevapCActividad)) {
            $useMinMax = false;
            if (isset($inevapCActividad['min'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD, $inevapCActividad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inevapCActividad['max'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD, $inevapCActividad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD, $inevapCActividad, $comparison);
    }

    /**
     * Filter the query on the inevap_numero_dictacion column
     *
     * Example usage:
     * <code>
     * $query->filterByInevapNumeroDictacion(1234); // WHERE inevap_numero_dictacion = 1234
     * $query->filterByInevapNumeroDictacion(array(12, 34)); // WHERE inevap_numero_dictacion IN (12, 34)
     * $query->filterByInevapNumeroDictacion(array('min' => 12)); // WHERE inevap_numero_dictacion > 12
     * </code>
     *
     * @see       filterByEvaluacionAplicada()
     *
     * @see       filterByInscripcion()
     *
     * @param     mixed $inevapNumeroDictacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInevapNumeroDictacion($inevapNumeroDictacion = null, $comparison = null)
    {
        if (is_array($inevapNumeroDictacion)) {
            $useMinMax = false;
            if (isset($inevapNumeroDictacion['min'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION, $inevapNumeroDictacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inevapNumeroDictacion['max'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION, $inevapNumeroDictacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION, $inevapNumeroDictacion, $comparison);
    }

    /**
     * Filter the query on the inevap_c_evaluacion column
     *
     * Example usage:
     * <code>
     * $query->filterByInevapCEvaluacion(1234); // WHERE inevap_c_evaluacion = 1234
     * $query->filterByInevapCEvaluacion(array(12, 34)); // WHERE inevap_c_evaluacion IN (12, 34)
     * $query->filterByInevapCEvaluacion(array('min' => 12)); // WHERE inevap_c_evaluacion > 12
     * </code>
     *
     * @see       filterByEvaluacionAplicada()
     *
     * @param     mixed $inevapCEvaluacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInevapCEvaluacion($inevapCEvaluacion = null, $comparison = null)
    {
        if (is_array($inevapCEvaluacion)) {
            $useMinMax = false;
            if (isset($inevapCEvaluacion['min'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION, $inevapCEvaluacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inevapCEvaluacion['max'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION, $inevapCEvaluacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION, $inevapCEvaluacion, $comparison);
    }

    /**
     * Filter the query on the inevap_numero_evaluacion column
     *
     * Example usage:
     * <code>
     * $query->filterByInevapNumeroEvaluacion(1234); // WHERE inevap_numero_evaluacion = 1234
     * $query->filterByInevapNumeroEvaluacion(array(12, 34)); // WHERE inevap_numero_evaluacion IN (12, 34)
     * $query->filterByInevapNumeroEvaluacion(array('min' => 12)); // WHERE inevap_numero_evaluacion > 12
     * </code>
     *
     * @see       filterByEvaluacionAplicada()
     *
     * @param     mixed $inevapNumeroEvaluacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInevapNumeroEvaluacion($inevapNumeroEvaluacion = null, $comparison = null)
    {
        if (is_array($inevapNumeroEvaluacion)) {
            $useMinMax = false;
            if (isset($inevapNumeroEvaluacion['min'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION, $inevapNumeroEvaluacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inevapNumeroEvaluacion['max'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION, $inevapNumeroEvaluacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION, $inevapNumeroEvaluacion, $comparison);
    }

    /**
     * Filter the query on the inevap_c_trabajador column
     *
     * Example usage:
     * <code>
     * $query->filterByInevapCTrabajador(1234); // WHERE inevap_c_trabajador = 1234
     * $query->filterByInevapCTrabajador(array(12, 34)); // WHERE inevap_c_trabajador IN (12, 34)
     * $query->filterByInevapCTrabajador(array('min' => 12)); // WHERE inevap_c_trabajador > 12
     * </code>
     *
     * @see       filterByInscripcion()
     *
     * @param     mixed $inevapCTrabajador The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInevapCTrabajador($inevapCTrabajador = null, $comparison = null)
    {
        if (is_array($inevapCTrabajador)) {
            $useMinMax = false;
            if (isset($inevapCTrabajador['min'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR, $inevapCTrabajador['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inevapCTrabajador['max'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR, $inevapCTrabajador['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR, $inevapCTrabajador, $comparison);
    }

    /**
     * Filter the query on the inevap_e_inscripcion_evaluacion_aplicada column
     *
     * Example usage:
     * <code>
     * $query->filterByInevapEInscripcionEvaluacionAplicada(1234); // WHERE inevap_e_inscripcion_evaluacion_aplicada = 1234
     * $query->filterByInevapEInscripcionEvaluacionAplicada(array(12, 34)); // WHERE inevap_e_inscripcion_evaluacion_aplicada IN (12, 34)
     * $query->filterByInevapEInscripcionEvaluacionAplicada(array('min' => 12)); // WHERE inevap_e_inscripcion_evaluacion_aplicada > 12
     * </code>
     *
     * @see       filterByEInscripcionEvaluacionAplicada()
     *
     * @param     mixed $inevapEInscripcionEvaluacionAplicada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInevapEInscripcionEvaluacionAplicada($inevapEInscripcionEvaluacionAplicada = null, $comparison = null)
    {
        if (is_array($inevapEInscripcionEvaluacionAplicada)) {
            $useMinMax = false;
            if (isset($inevapEInscripcionEvaluacionAplicada['min'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_E_INSCRIPCION_EVALUACION_APLICADA, $inevapEInscripcionEvaluacionAplicada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inevapEInscripcionEvaluacionAplicada['max'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_E_INSCRIPCION_EVALUACION_APLICADA, $inevapEInscripcionEvaluacionAplicada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_E_INSCRIPCION_EVALUACION_APLICADA, $inevapEInscripcionEvaluacionAplicada, $comparison);
    }

    /**
     * Filter the query on the inevap_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByInevapVigente(1234); // WHERE inevap_vigente = 1234
     * $query->filterByInevapVigente(array(12, 34)); // WHERE inevap_vigente IN (12, 34)
     * $query->filterByInevapVigente(array('min' => 12)); // WHERE inevap_vigente > 12
     * </code>
     *
     * @param     mixed $inevapVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInevapVigente($inevapVigente = null, $comparison = null)
    {
        if (is_array($inevapVigente)) {
            $useMinMax = false;
            if (isset($inevapVigente['min'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_VIGENTE, $inevapVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inevapVigente['max'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_VIGENTE, $inevapVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_VIGENTE, $inevapVigente, $comparison);
    }

    /**
     * Filter the query on the inevap_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByInevapRFechaCreacion('2011-03-14'); // WHERE inevap_r_fecha_creacion = '2011-03-14'
     * $query->filterByInevapRFechaCreacion('now'); // WHERE inevap_r_fecha_creacion = '2011-03-14'
     * $query->filterByInevapRFechaCreacion(array('max' => 'yesterday')); // WHERE inevap_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $inevapRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInevapRFechaCreacion($inevapRFechaCreacion = null, $comparison = null)
    {
        if (is_array($inevapRFechaCreacion)) {
            $useMinMax = false;
            if (isset($inevapRFechaCreacion['min'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_CREACION, $inevapRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inevapRFechaCreacion['max'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_CREACION, $inevapRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_CREACION, $inevapRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the inevap_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByInevapRFechaModificacion('2011-03-14'); // WHERE inevap_r_fecha_modificacion = '2011-03-14'
     * $query->filterByInevapRFechaModificacion('now'); // WHERE inevap_r_fecha_modificacion = '2011-03-14'
     * $query->filterByInevapRFechaModificacion(array('max' => 'yesterday')); // WHERE inevap_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $inevapRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInevapRFechaModificacion($inevapRFechaModificacion = null, $comparison = null)
    {
        if (is_array($inevapRFechaModificacion)) {
            $useMinMax = false;
            if (isset($inevapRFechaModificacion['min'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_MODIFICACION, $inevapRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inevapRFechaModificacion['max'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_MODIFICACION, $inevapRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_MODIFICACION, $inevapRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the inevap_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByInevapRUsuario(1234); // WHERE inevap_r_usuario = 1234
     * $query->filterByInevapRUsuario(array(12, 34)); // WHERE inevap_r_usuario IN (12, 34)
     * $query->filterByInevapRUsuario(array('min' => 12)); // WHERE inevap_r_usuario > 12
     * </code>
     *
     * @param     mixed $inevapRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInevapRUsuario($inevapRUsuario = null, $comparison = null)
    {
        if (is_array($inevapRUsuario)) {
            $useMinMax = false;
            if (isset($inevapRUsuario['min'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_USUARIO, $inevapRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inevapRUsuario['max'])) {
                $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_USUARIO, $inevapRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_USUARIO, $inevapRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \EInscripcionEvaluacionAplicada object
     *
     * @param \EInscripcionEvaluacionAplicada|ObjectCollection $eInscripcionEvaluacionAplicada The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEInscripcionEvaluacionAplicada($eInscripcionEvaluacionAplicada, $comparison = null)
    {
        if ($eInscripcionEvaluacionAplicada instanceof \EInscripcionEvaluacionAplicada) {
            return $this
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_E_INSCRIPCION_EVALUACION_APLICADA, $eInscripcionEvaluacionAplicada->getEieaEstado(), $comparison);
        } elseif ($eInscripcionEvaluacionAplicada instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_E_INSCRIPCION_EVALUACION_APLICADA, $eInscripcionEvaluacionAplicada->toKeyValue('PrimaryKey', 'EieaEstado'), $comparison);
        } else {
            throw new PropelException('filterByEInscripcionEvaluacionAplicada() only accepts arguments of type \EInscripcionEvaluacionAplicada or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EInscripcionEvaluacionAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function joinEInscripcionEvaluacionAplicada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EInscripcionEvaluacionAplicada');

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
            $this->addJoinObject($join, 'EInscripcionEvaluacionAplicada');
        }

        return $this;
    }

    /**
     * Use the EInscripcionEvaluacionAplicada relation EInscripcionEvaluacionAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EInscripcionEvaluacionAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useEInscripcionEvaluacionAplicadaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEInscripcionEvaluacionAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EInscripcionEvaluacionAplicada', '\EInscripcionEvaluacionAplicadaQuery');
    }

    /**
     * Filter the query by a related \EvaluacionAplicada object
     *
     * @param \EvaluacionAplicada $evaluacionAplicada The related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvaluacionAplicada($evaluacionAplicada, $comparison = null)
    {
        if ($evaluacionAplicada instanceof \EvaluacionAplicada) {
            return $this
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD, $evaluacionAplicada->getEvapCActividad(), $comparison)
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION, $evaluacionAplicada->getEvapNumeroDictacion(), $comparison)
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION, $evaluacionAplicada->getEvapCEvaluacion(), $comparison)
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION, $evaluacionAplicada->getEvapNumeroEvaluacion(), $comparison);
        } else {
            throw new PropelException('filterByEvaluacionAplicada() only accepts arguments of type \EvaluacionAplicada');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EvaluacionAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function joinEvaluacionAplicada($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EvaluacionAplicada');

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
            $this->addJoinObject($join, 'EvaluacionAplicada');
        }

        return $this;
    }

    /**
     * Use the EvaluacionAplicada relation EvaluacionAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EvaluacionAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useEvaluacionAplicadaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvaluacionAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EvaluacionAplicada', '\EvaluacionAplicadaQuery');
    }

    /**
     * Filter the query by a related \Inscripcion object
     *
     * @param \Inscripcion $inscripcion The related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInscripcion($inscripcion, $comparison = null)
    {
        if ($inscripcion instanceof \Inscripcion) {
            return $this
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD, $inscripcion->getInscCActividad(), $comparison)
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION, $inscripcion->getInscNumeroDictacion(), $comparison)
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR, $inscripcion->getInscCTrabajador(), $comparison);
        } else {
            throw new PropelException('filterByInscripcion() only accepts arguments of type \Inscripcion');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Inscripcion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function joinInscripcion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useInscripcionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInscripcion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Inscripcion', '\InscripcionQuery');
    }

    /**
     * Filter the query by a related \RespuestaAplicada object
     *
     * @param \RespuestaAplicada|ObjectCollection $respuestaAplicada the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByRespuestaAplicada($respuestaAplicada, $comparison = null)
    {
        if ($respuestaAplicada instanceof \RespuestaAplicada) {
            return $this
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD, $respuestaAplicada->getReapCActividad(), $comparison)
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION, $respuestaAplicada->getReapNumeroDictacion(), $comparison)
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION, $respuestaAplicada->getReapCEvaluacion(), $comparison)
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION, $respuestaAplicada->getReapNumeroEvaluacion(), $comparison)
                ->addUsingAlias(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR, $respuestaAplicada->getReapCTrabajador(), $comparison);
        } else {
            throw new PropelException('filterByRespuestaAplicada() only accepts arguments of type \RespuestaAplicada');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RespuestaAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function joinRespuestaAplicada($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RespuestaAplicada');

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
            $this->addJoinObject($join, 'RespuestaAplicada');
        }

        return $this;
    }

    /**
     * Use the RespuestaAplicada relation RespuestaAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RespuestaAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useRespuestaAplicadaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRespuestaAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RespuestaAplicada', '\RespuestaAplicadaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInscripcionEvaluacionAplicada $inscripcionEvaluacionAplicada Object to remove from the list of results
     *
     * @return $this|ChildInscripcionEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function prune($inscripcionEvaluacionAplicada = null)
    {
        if ($inscripcionEvaluacionAplicada) {
            $this->addCond('pruneCond0', $this->getAliasedColName(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD), $inscripcionEvaluacionAplicada->getInevapCActividad(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION), $inscripcionEvaluacionAplicada->getInevapNumeroDictacion(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION), $inscripcionEvaluacionAplicada->getInevapCEvaluacion(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION), $inscripcionEvaluacionAplicada->getInevapNumeroEvaluacion(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond4', $this->getAliasedColName(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR), $inscripcionEvaluacionAplicada->getInevapCTrabajador(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3', 'pruneCond4'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the inscripcion_evaluacion_aplicada table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InscripcionEvaluacionAplicadaTableMap::clearInstancePool();
            InscripcionEvaluacionAplicadaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InscripcionEvaluacionAplicadaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InscripcionEvaluacionAplicadaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InscripcionEvaluacionAplicadaQuery
