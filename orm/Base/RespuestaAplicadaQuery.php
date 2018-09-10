<?php

namespace Base;

use \RespuestaAplicada as ChildRespuestaAplicada;
use \RespuestaAplicadaQuery as ChildRespuestaAplicadaQuery;
use \Exception;
use \PDO;
use Map\RespuestaAplicadaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'respuesta_aplicada' table.
 *
 *
 *
 * @method     ChildRespuestaAplicadaQuery orderByReapCActividad($order = Criteria::ASC) Order by the reap_c_actividad column
 * @method     ChildRespuestaAplicadaQuery orderByReapNumeroDictacion($order = Criteria::ASC) Order by the reap_numero_dictacion column
 * @method     ChildRespuestaAplicadaQuery orderByReapCEvaluacion($order = Criteria::ASC) Order by the reap_c_evaluacion column
 * @method     ChildRespuestaAplicadaQuery orderByReapNumeroEvaluacion($order = Criteria::ASC) Order by the reap_numero_evaluacion column
 * @method     ChildRespuestaAplicadaQuery orderByReapCTrabajador($order = Criteria::ASC) Order by the reap_c_trabajador column
 * @method     ChildRespuestaAplicadaQuery orderByReapCPregunta($order = Criteria::ASC) Order by the reap_c_pregunta column
 * @method     ChildRespuestaAplicadaQuery orderByReapCOpcionPregunta($order = Criteria::ASC) Order by the reap_c_opcion_pregunta column
 * @method     ChildRespuestaAplicadaQuery orderByReapERespuestaAplicada($order = Criteria::ASC) Order by the reap_e_respuesta_aplicada column
 * @method     ChildRespuestaAplicadaQuery orderByReapVigente($order = Criteria::ASC) Order by the reap_vigente column
 * @method     ChildRespuestaAplicadaQuery orderByReapHashMd5($order = Criteria::ASC) Order by the reap_hash_md5 column
 * @method     ChildRespuestaAplicadaQuery orderByReapRFechaCreacion($order = Criteria::ASC) Order by the reap_r_fecha_creacion column
 * @method     ChildRespuestaAplicadaQuery orderByReapRFechaModificacion($order = Criteria::ASC) Order by the reap_r_fecha_modificacion column
 * @method     ChildRespuestaAplicadaQuery orderByReapRUsuario($order = Criteria::ASC) Order by the reap_r_usuario column
 *
 * @method     ChildRespuestaAplicadaQuery groupByReapCActividad() Group by the reap_c_actividad column
 * @method     ChildRespuestaAplicadaQuery groupByReapNumeroDictacion() Group by the reap_numero_dictacion column
 * @method     ChildRespuestaAplicadaQuery groupByReapCEvaluacion() Group by the reap_c_evaluacion column
 * @method     ChildRespuestaAplicadaQuery groupByReapNumeroEvaluacion() Group by the reap_numero_evaluacion column
 * @method     ChildRespuestaAplicadaQuery groupByReapCTrabajador() Group by the reap_c_trabajador column
 * @method     ChildRespuestaAplicadaQuery groupByReapCPregunta() Group by the reap_c_pregunta column
 * @method     ChildRespuestaAplicadaQuery groupByReapCOpcionPregunta() Group by the reap_c_opcion_pregunta column
 * @method     ChildRespuestaAplicadaQuery groupByReapERespuestaAplicada() Group by the reap_e_respuesta_aplicada column
 * @method     ChildRespuestaAplicadaQuery groupByReapVigente() Group by the reap_vigente column
 * @method     ChildRespuestaAplicadaQuery groupByReapHashMd5() Group by the reap_hash_md5 column
 * @method     ChildRespuestaAplicadaQuery groupByReapRFechaCreacion() Group by the reap_r_fecha_creacion column
 * @method     ChildRespuestaAplicadaQuery groupByReapRFechaModificacion() Group by the reap_r_fecha_modificacion column
 * @method     ChildRespuestaAplicadaQuery groupByReapRUsuario() Group by the reap_r_usuario column
 *
 * @method     ChildRespuestaAplicadaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRespuestaAplicadaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRespuestaAplicadaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRespuestaAplicadaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRespuestaAplicadaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRespuestaAplicadaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRespuestaAplicadaQuery leftJoinERespuestaAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the ERespuestaAplicada relation
 * @method     ChildRespuestaAplicadaQuery rightJoinERespuestaAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ERespuestaAplicada relation
 * @method     ChildRespuestaAplicadaQuery innerJoinERespuestaAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the ERespuestaAplicada relation
 *
 * @method     ChildRespuestaAplicadaQuery joinWithERespuestaAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ERespuestaAplicada relation
 *
 * @method     ChildRespuestaAplicadaQuery leftJoinWithERespuestaAplicada() Adds a LEFT JOIN clause and with to the query using the ERespuestaAplicada relation
 * @method     ChildRespuestaAplicadaQuery rightJoinWithERespuestaAplicada() Adds a RIGHT JOIN clause and with to the query using the ERespuestaAplicada relation
 * @method     ChildRespuestaAplicadaQuery innerJoinWithERespuestaAplicada() Adds a INNER JOIN clause and with to the query using the ERespuestaAplicada relation
 *
 * @method     ChildRespuestaAplicadaQuery leftJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildRespuestaAplicadaQuery rightJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildRespuestaAplicadaQuery innerJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     ChildRespuestaAplicadaQuery joinWithInscripcionEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     ChildRespuestaAplicadaQuery leftJoinWithInscripcionEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildRespuestaAplicadaQuery rightJoinWithInscripcionEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildRespuestaAplicadaQuery innerJoinWithInscripcionEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     ChildRespuestaAplicadaQuery leftJoinPregunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pregunta relation
 * @method     ChildRespuestaAplicadaQuery rightJoinPregunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pregunta relation
 * @method     ChildRespuestaAplicadaQuery innerJoinPregunta($relationAlias = null) Adds a INNER JOIN clause to the query using the Pregunta relation
 *
 * @method     ChildRespuestaAplicadaQuery joinWithPregunta($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pregunta relation
 *
 * @method     ChildRespuestaAplicadaQuery leftJoinWithPregunta() Adds a LEFT JOIN clause and with to the query using the Pregunta relation
 * @method     ChildRespuestaAplicadaQuery rightJoinWithPregunta() Adds a RIGHT JOIN clause and with to the query using the Pregunta relation
 * @method     ChildRespuestaAplicadaQuery innerJoinWithPregunta() Adds a INNER JOIN clause and with to the query using the Pregunta relation
 *
 * @method     \ERespuestaAplicadaQuery|\InscripcionEvaluacionAplicadaQuery|\PreguntaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildRespuestaAplicada findOne(ConnectionInterface $con = null) Return the first ChildRespuestaAplicada matching the query
 * @method     ChildRespuestaAplicada findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRespuestaAplicada matching the query, or a new ChildRespuestaAplicada object populated from the query conditions when no match is found
 *
 * @method     ChildRespuestaAplicada findOneByReapCActividad(int $reap_c_actividad) Return the first ChildRespuestaAplicada filtered by the reap_c_actividad column
 * @method     ChildRespuestaAplicada findOneByReapNumeroDictacion(int $reap_numero_dictacion) Return the first ChildRespuestaAplicada filtered by the reap_numero_dictacion column
 * @method     ChildRespuestaAplicada findOneByReapCEvaluacion(int $reap_c_evaluacion) Return the first ChildRespuestaAplicada filtered by the reap_c_evaluacion column
 * @method     ChildRespuestaAplicada findOneByReapNumeroEvaluacion(int $reap_numero_evaluacion) Return the first ChildRespuestaAplicada filtered by the reap_numero_evaluacion column
 * @method     ChildRespuestaAplicada findOneByReapCTrabajador(int $reap_c_trabajador) Return the first ChildRespuestaAplicada filtered by the reap_c_trabajador column
 * @method     ChildRespuestaAplicada findOneByReapCPregunta(int $reap_c_pregunta) Return the first ChildRespuestaAplicada filtered by the reap_c_pregunta column
 * @method     ChildRespuestaAplicada findOneByReapCOpcionPregunta(int $reap_c_opcion_pregunta) Return the first ChildRespuestaAplicada filtered by the reap_c_opcion_pregunta column
 * @method     ChildRespuestaAplicada findOneByReapERespuestaAplicada(int $reap_e_respuesta_aplicada) Return the first ChildRespuestaAplicada filtered by the reap_e_respuesta_aplicada column
 * @method     ChildRespuestaAplicada findOneByReapVigente(int $reap_vigente) Return the first ChildRespuestaAplicada filtered by the reap_vigente column
 * @method     ChildRespuestaAplicada findOneByReapHashMd5(string $reap_hash_md5) Return the first ChildRespuestaAplicada filtered by the reap_hash_md5 column
 * @method     ChildRespuestaAplicada findOneByReapRFechaCreacion(string $reap_r_fecha_creacion) Return the first ChildRespuestaAplicada filtered by the reap_r_fecha_creacion column
 * @method     ChildRespuestaAplicada findOneByReapRFechaModificacion(string $reap_r_fecha_modificacion) Return the first ChildRespuestaAplicada filtered by the reap_r_fecha_modificacion column
 * @method     ChildRespuestaAplicada findOneByReapRUsuario(int $reap_r_usuario) Return the first ChildRespuestaAplicada filtered by the reap_r_usuario column *

 * @method     ChildRespuestaAplicada requirePk($key, ConnectionInterface $con = null) Return the ChildRespuestaAplicada by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOne(ConnectionInterface $con = null) Return the first ChildRespuestaAplicada matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRespuestaAplicada requireOneByReapCActividad(int $reap_c_actividad) Return the first ChildRespuestaAplicada filtered by the reap_c_actividad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapNumeroDictacion(int $reap_numero_dictacion) Return the first ChildRespuestaAplicada filtered by the reap_numero_dictacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapCEvaluacion(int $reap_c_evaluacion) Return the first ChildRespuestaAplicada filtered by the reap_c_evaluacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapNumeroEvaluacion(int $reap_numero_evaluacion) Return the first ChildRespuestaAplicada filtered by the reap_numero_evaluacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapCTrabajador(int $reap_c_trabajador) Return the first ChildRespuestaAplicada filtered by the reap_c_trabajador column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapCPregunta(int $reap_c_pregunta) Return the first ChildRespuestaAplicada filtered by the reap_c_pregunta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapCOpcionPregunta(int $reap_c_opcion_pregunta) Return the first ChildRespuestaAplicada filtered by the reap_c_opcion_pregunta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapERespuestaAplicada(int $reap_e_respuesta_aplicada) Return the first ChildRespuestaAplicada filtered by the reap_e_respuesta_aplicada column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapVigente(int $reap_vigente) Return the first ChildRespuestaAplicada filtered by the reap_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapHashMd5(string $reap_hash_md5) Return the first ChildRespuestaAplicada filtered by the reap_hash_md5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapRFechaCreacion(string $reap_r_fecha_creacion) Return the first ChildRespuestaAplicada filtered by the reap_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapRFechaModificacion(string $reap_r_fecha_modificacion) Return the first ChildRespuestaAplicada filtered by the reap_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRespuestaAplicada requireOneByReapRUsuario(int $reap_r_usuario) Return the first ChildRespuestaAplicada filtered by the reap_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRespuestaAplicada[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRespuestaAplicada objects based on current ModelCriteria
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapCActividad(int $reap_c_actividad) Return ChildRespuestaAplicada objects filtered by the reap_c_actividad column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapNumeroDictacion(int $reap_numero_dictacion) Return ChildRespuestaAplicada objects filtered by the reap_numero_dictacion column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapCEvaluacion(int $reap_c_evaluacion) Return ChildRespuestaAplicada objects filtered by the reap_c_evaluacion column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapNumeroEvaluacion(int $reap_numero_evaluacion) Return ChildRespuestaAplicada objects filtered by the reap_numero_evaluacion column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapCTrabajador(int $reap_c_trabajador) Return ChildRespuestaAplicada objects filtered by the reap_c_trabajador column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapCPregunta(int $reap_c_pregunta) Return ChildRespuestaAplicada objects filtered by the reap_c_pregunta column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapCOpcionPregunta(int $reap_c_opcion_pregunta) Return ChildRespuestaAplicada objects filtered by the reap_c_opcion_pregunta column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapERespuestaAplicada(int $reap_e_respuesta_aplicada) Return ChildRespuestaAplicada objects filtered by the reap_e_respuesta_aplicada column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapVigente(int $reap_vigente) Return ChildRespuestaAplicada objects filtered by the reap_vigente column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapHashMd5(string $reap_hash_md5) Return ChildRespuestaAplicada objects filtered by the reap_hash_md5 column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapRFechaCreacion(string $reap_r_fecha_creacion) Return ChildRespuestaAplicada objects filtered by the reap_r_fecha_creacion column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapRFechaModificacion(string $reap_r_fecha_modificacion) Return ChildRespuestaAplicada objects filtered by the reap_r_fecha_modificacion column
 * @method     ChildRespuestaAplicada[]|ObjectCollection findByReapRUsuario(int $reap_r_usuario) Return ChildRespuestaAplicada objects filtered by the reap_r_usuario column
 * @method     ChildRespuestaAplicada[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RespuestaAplicadaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RespuestaAplicadaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\RespuestaAplicada', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRespuestaAplicadaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRespuestaAplicadaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRespuestaAplicadaQuery) {
            return $criteria;
        }
        $query = new ChildRespuestaAplicadaQuery();
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
     * @param array[$reap_c_actividad, $reap_numero_dictacion, $reap_c_evaluacion, $reap_numero_evaluacion, $reap_c_trabajador, $reap_c_pregunta] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildRespuestaAplicada|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RespuestaAplicadaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = RespuestaAplicadaTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4]), (null === $key[5] || is_scalar($key[5]) || is_callable([$key[5], '__toString']) ? (string) $key[5] : $key[5])]))))) {
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
     * @return ChildRespuestaAplicada A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT reap_c_actividad, reap_numero_dictacion, reap_c_evaluacion, reap_numero_evaluacion, reap_c_trabajador, reap_c_pregunta, reap_c_opcion_pregunta, reap_e_respuesta_aplicada, reap_vigente, reap_hash_md5, reap_r_fecha_creacion, reap_r_fecha_modificacion, reap_r_usuario FROM respuesta_aplicada WHERE reap_c_actividad = :p0 AND reap_numero_dictacion = :p1 AND reap_c_evaluacion = :p2 AND reap_numero_evaluacion = :p3 AND reap_c_trabajador = :p4 AND reap_c_pregunta = :p5';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_INT);
            $stmt->bindValue(':p4', $key[4], PDO::PARAM_INT);
            $stmt->bindValue(':p5', $key[5], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildRespuestaAplicada $obj */
            $obj = new ChildRespuestaAplicada();
            $obj->hydrate($row);
            RespuestaAplicadaTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4]), (null === $key[5] || is_scalar($key[5]) || is_callable([$key[5], '__toString']) ? (string) $key[5] : $key[5])]));
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
     * @return ChildRespuestaAplicada|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION, $key[3], Criteria::EQUAL);
        $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR, $key[4], Criteria::EQUAL);
        $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA, $key[5], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $cton4 = $this->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR, $key[4], Criteria::EQUAL);
            $cton0->addAnd($cton4);
            $cton5 = $this->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA, $key[5], Criteria::EQUAL);
            $cton0->addAnd($cton5);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the reap_c_actividad column
     *
     * Example usage:
     * <code>
     * $query->filterByReapCActividad(1234); // WHERE reap_c_actividad = 1234
     * $query->filterByReapCActividad(array(12, 34)); // WHERE reap_c_actividad IN (12, 34)
     * $query->filterByReapCActividad(array('min' => 12)); // WHERE reap_c_actividad > 12
     * </code>
     *
     * @see       filterByInscripcionEvaluacionAplicada()
     *
     * @param     mixed $reapCActividad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapCActividad($reapCActividad = null, $comparison = null)
    {
        if (is_array($reapCActividad)) {
            $useMinMax = false;
            if (isset($reapCActividad['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD, $reapCActividad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapCActividad['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD, $reapCActividad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD, $reapCActividad, $comparison);
    }

    /**
     * Filter the query on the reap_numero_dictacion column
     *
     * Example usage:
     * <code>
     * $query->filterByReapNumeroDictacion(1234); // WHERE reap_numero_dictacion = 1234
     * $query->filterByReapNumeroDictacion(array(12, 34)); // WHERE reap_numero_dictacion IN (12, 34)
     * $query->filterByReapNumeroDictacion(array('min' => 12)); // WHERE reap_numero_dictacion > 12
     * </code>
     *
     * @see       filterByInscripcionEvaluacionAplicada()
     *
     * @param     mixed $reapNumeroDictacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapNumeroDictacion($reapNumeroDictacion = null, $comparison = null)
    {
        if (is_array($reapNumeroDictacion)) {
            $useMinMax = false;
            if (isset($reapNumeroDictacion['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION, $reapNumeroDictacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapNumeroDictacion['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION, $reapNumeroDictacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION, $reapNumeroDictacion, $comparison);
    }

    /**
     * Filter the query on the reap_c_evaluacion column
     *
     * Example usage:
     * <code>
     * $query->filterByReapCEvaluacion(1234); // WHERE reap_c_evaluacion = 1234
     * $query->filterByReapCEvaluacion(array(12, 34)); // WHERE reap_c_evaluacion IN (12, 34)
     * $query->filterByReapCEvaluacion(array('min' => 12)); // WHERE reap_c_evaluacion > 12
     * </code>
     *
     * @see       filterByInscripcionEvaluacionAplicada()
     *
     * @param     mixed $reapCEvaluacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapCEvaluacion($reapCEvaluacion = null, $comparison = null)
    {
        if (is_array($reapCEvaluacion)) {
            $useMinMax = false;
            if (isset($reapCEvaluacion['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION, $reapCEvaluacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapCEvaluacion['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION, $reapCEvaluacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION, $reapCEvaluacion, $comparison);
    }

    /**
     * Filter the query on the reap_numero_evaluacion column
     *
     * Example usage:
     * <code>
     * $query->filterByReapNumeroEvaluacion(1234); // WHERE reap_numero_evaluacion = 1234
     * $query->filterByReapNumeroEvaluacion(array(12, 34)); // WHERE reap_numero_evaluacion IN (12, 34)
     * $query->filterByReapNumeroEvaluacion(array('min' => 12)); // WHERE reap_numero_evaluacion > 12
     * </code>
     *
     * @see       filterByInscripcionEvaluacionAplicada()
     *
     * @param     mixed $reapNumeroEvaluacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapNumeroEvaluacion($reapNumeroEvaluacion = null, $comparison = null)
    {
        if (is_array($reapNumeroEvaluacion)) {
            $useMinMax = false;
            if (isset($reapNumeroEvaluacion['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION, $reapNumeroEvaluacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapNumeroEvaluacion['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION, $reapNumeroEvaluacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION, $reapNumeroEvaluacion, $comparison);
    }

    /**
     * Filter the query on the reap_c_trabajador column
     *
     * Example usage:
     * <code>
     * $query->filterByReapCTrabajador(1234); // WHERE reap_c_trabajador = 1234
     * $query->filterByReapCTrabajador(array(12, 34)); // WHERE reap_c_trabajador IN (12, 34)
     * $query->filterByReapCTrabajador(array('min' => 12)); // WHERE reap_c_trabajador > 12
     * </code>
     *
     * @see       filterByInscripcionEvaluacionAplicada()
     *
     * @param     mixed $reapCTrabajador The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapCTrabajador($reapCTrabajador = null, $comparison = null)
    {
        if (is_array($reapCTrabajador)) {
            $useMinMax = false;
            if (isset($reapCTrabajador['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR, $reapCTrabajador['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapCTrabajador['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR, $reapCTrabajador['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR, $reapCTrabajador, $comparison);
    }

    /**
     * Filter the query on the reap_c_pregunta column
     *
     * Example usage:
     * <code>
     * $query->filterByReapCPregunta(1234); // WHERE reap_c_pregunta = 1234
     * $query->filterByReapCPregunta(array(12, 34)); // WHERE reap_c_pregunta IN (12, 34)
     * $query->filterByReapCPregunta(array('min' => 12)); // WHERE reap_c_pregunta > 12
     * </code>
     *
     * @see       filterByPregunta()
     *
     * @param     mixed $reapCPregunta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapCPregunta($reapCPregunta = null, $comparison = null)
    {
        if (is_array($reapCPregunta)) {
            $useMinMax = false;
            if (isset($reapCPregunta['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA, $reapCPregunta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapCPregunta['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA, $reapCPregunta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA, $reapCPregunta, $comparison);
    }

    /**
     * Filter the query on the reap_c_opcion_pregunta column
     *
     * Example usage:
     * <code>
     * $query->filterByReapCOpcionPregunta(1234); // WHERE reap_c_opcion_pregunta = 1234
     * $query->filterByReapCOpcionPregunta(array(12, 34)); // WHERE reap_c_opcion_pregunta IN (12, 34)
     * $query->filterByReapCOpcionPregunta(array('min' => 12)); // WHERE reap_c_opcion_pregunta > 12
     * </code>
     *
     * @param     mixed $reapCOpcionPregunta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapCOpcionPregunta($reapCOpcionPregunta = null, $comparison = null)
    {
        if (is_array($reapCOpcionPregunta)) {
            $useMinMax = false;
            if (isset($reapCOpcionPregunta['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_OPCION_PREGUNTA, $reapCOpcionPregunta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapCOpcionPregunta['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_OPCION_PREGUNTA, $reapCOpcionPregunta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_OPCION_PREGUNTA, $reapCOpcionPregunta, $comparison);
    }

    /**
     * Filter the query on the reap_e_respuesta_aplicada column
     *
     * Example usage:
     * <code>
     * $query->filterByReapERespuestaAplicada(1234); // WHERE reap_e_respuesta_aplicada = 1234
     * $query->filterByReapERespuestaAplicada(array(12, 34)); // WHERE reap_e_respuesta_aplicada IN (12, 34)
     * $query->filterByReapERespuestaAplicada(array('min' => 12)); // WHERE reap_e_respuesta_aplicada > 12
     * </code>
     *
     * @see       filterByERespuestaAplicada()
     *
     * @param     mixed $reapERespuestaAplicada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapERespuestaAplicada($reapERespuestaAplicada = null, $comparison = null)
    {
        if (is_array($reapERespuestaAplicada)) {
            $useMinMax = false;
            if (isset($reapERespuestaAplicada['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA, $reapERespuestaAplicada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapERespuestaAplicada['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA, $reapERespuestaAplicada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA, $reapERespuestaAplicada, $comparison);
    }

    /**
     * Filter the query on the reap_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByReapVigente(1234); // WHERE reap_vigente = 1234
     * $query->filterByReapVigente(array(12, 34)); // WHERE reap_vigente IN (12, 34)
     * $query->filterByReapVigente(array('min' => 12)); // WHERE reap_vigente > 12
     * </code>
     *
     * @param     mixed $reapVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapVigente($reapVigente = null, $comparison = null)
    {
        if (is_array($reapVigente)) {
            $useMinMax = false;
            if (isset($reapVigente['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_VIGENTE, $reapVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapVigente['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_VIGENTE, $reapVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_VIGENTE, $reapVigente, $comparison);
    }

    /**
     * Filter the query on the reap_hash_md5 column
     *
     * Example usage:
     * <code>
     * $query->filterByReapHashMd5('fooValue');   // WHERE reap_hash_md5 = 'fooValue'
     * $query->filterByReapHashMd5('%fooValue%', Criteria::LIKE); // WHERE reap_hash_md5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reapHashMd5 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapHashMd5($reapHashMd5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reapHashMd5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_HASH_MD5, $reapHashMd5, $comparison);
    }

    /**
     * Filter the query on the reap_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByReapRFechaCreacion('2011-03-14'); // WHERE reap_r_fecha_creacion = '2011-03-14'
     * $query->filterByReapRFechaCreacion('now'); // WHERE reap_r_fecha_creacion = '2011-03-14'
     * $query->filterByReapRFechaCreacion(array('max' => 'yesterday')); // WHERE reap_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $reapRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapRFechaCreacion($reapRFechaCreacion = null, $comparison = null)
    {
        if (is_array($reapRFechaCreacion)) {
            $useMinMax = false;
            if (isset($reapRFechaCreacion['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_CREACION, $reapRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapRFechaCreacion['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_CREACION, $reapRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_CREACION, $reapRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the reap_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByReapRFechaModificacion('2011-03-14'); // WHERE reap_r_fecha_modificacion = '2011-03-14'
     * $query->filterByReapRFechaModificacion('now'); // WHERE reap_r_fecha_modificacion = '2011-03-14'
     * $query->filterByReapRFechaModificacion(array('max' => 'yesterday')); // WHERE reap_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $reapRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapRFechaModificacion($reapRFechaModificacion = null, $comparison = null)
    {
        if (is_array($reapRFechaModificacion)) {
            $useMinMax = false;
            if (isset($reapRFechaModificacion['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_MODIFICACION, $reapRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapRFechaModificacion['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_MODIFICACION, $reapRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_MODIFICACION, $reapRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the reap_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByReapRUsuario(1234); // WHERE reap_r_usuario = 1234
     * $query->filterByReapRUsuario(array(12, 34)); // WHERE reap_r_usuario IN (12, 34)
     * $query->filterByReapRUsuario(array('min' => 12)); // WHERE reap_r_usuario > 12
     * </code>
     *
     * @param     mixed $reapRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByReapRUsuario($reapRUsuario = null, $comparison = null)
    {
        if (is_array($reapRUsuario)) {
            $useMinMax = false;
            if (isset($reapRUsuario['min'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_R_USUARIO, $reapRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reapRUsuario['max'])) {
                $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_R_USUARIO, $reapRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_R_USUARIO, $reapRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \ERespuestaAplicada object
     *
     * @param \ERespuestaAplicada|ObjectCollection $eRespuestaAplicada The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByERespuestaAplicada($eRespuestaAplicada, $comparison = null)
    {
        if ($eRespuestaAplicada instanceof \ERespuestaAplicada) {
            return $this
                ->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA, $eRespuestaAplicada->getEreaEstado(), $comparison);
        } elseif ($eRespuestaAplicada instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA, $eRespuestaAplicada->toKeyValue('PrimaryKey', 'EreaEstado'), $comparison);
        } else {
            throw new PropelException('filterByERespuestaAplicada() only accepts arguments of type \ERespuestaAplicada or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ERespuestaAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function joinERespuestaAplicada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ERespuestaAplicada');

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
            $this->addJoinObject($join, 'ERespuestaAplicada');
        }

        return $this;
    }

    /**
     * Use the ERespuestaAplicada relation ERespuestaAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ERespuestaAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useERespuestaAplicadaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinERespuestaAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ERespuestaAplicada', '\ERespuestaAplicadaQuery');
    }

    /**
     * Filter the query by a related \InscripcionEvaluacionAplicada object
     *
     * @param \InscripcionEvaluacionAplicada $inscripcionEvaluacionAplicada The related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByInscripcionEvaluacionAplicada($inscripcionEvaluacionAplicada, $comparison = null)
    {
        if ($inscripcionEvaluacionAplicada instanceof \InscripcionEvaluacionAplicada) {
            return $this
                ->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD, $inscripcionEvaluacionAplicada->getInevapCActividad(), $comparison)
                ->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION, $inscripcionEvaluacionAplicada->getInevapNumeroDictacion(), $comparison)
                ->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION, $inscripcionEvaluacionAplicada->getInevapCEvaluacion(), $comparison)
                ->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION, $inscripcionEvaluacionAplicada->getInevapNumeroEvaluacion(), $comparison)
                ->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR, $inscripcionEvaluacionAplicada->getInevapCTrabajador(), $comparison);
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
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
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
     * Filter the query by a related \Pregunta object
     *
     * @param \Pregunta|ObjectCollection $pregunta The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function filterByPregunta($pregunta, $comparison = null)
    {
        if ($pregunta instanceof \Pregunta) {
            return $this
                ->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA, $pregunta->getPregCodigo(), $comparison);
        } elseif ($pregunta instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA, $pregunta->toKeyValue('PrimaryKey', 'PregCodigo'), $comparison);
        } else {
            throw new PropelException('filterByPregunta() only accepts arguments of type \Pregunta or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pregunta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function joinPregunta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pregunta');

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
            $this->addJoinObject($join, 'Pregunta');
        }

        return $this;
    }

    /**
     * Use the Pregunta relation Pregunta object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PreguntaQuery A secondary query class using the current class as primary query
     */
    public function usePreguntaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPregunta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pregunta', '\PreguntaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRespuestaAplicada $respuestaAplicada Object to remove from the list of results
     *
     * @return $this|ChildRespuestaAplicadaQuery The current query, for fluid interface
     */
    public function prune($respuestaAplicada = null)
    {
        if ($respuestaAplicada) {
            $this->addCond('pruneCond0', $this->getAliasedColName(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD), $respuestaAplicada->getReapCActividad(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION), $respuestaAplicada->getReapNumeroDictacion(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION), $respuestaAplicada->getReapCEvaluacion(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION), $respuestaAplicada->getReapNumeroEvaluacion(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond4', $this->getAliasedColName(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR), $respuestaAplicada->getReapCTrabajador(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond5', $this->getAliasedColName(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA), $respuestaAplicada->getReapCPregunta(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3', 'pruneCond4', 'pruneCond5'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the respuesta_aplicada table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RespuestaAplicadaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RespuestaAplicadaTableMap::clearInstancePool();
            RespuestaAplicadaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RespuestaAplicadaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RespuestaAplicadaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RespuestaAplicadaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RespuestaAplicadaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RespuestaAplicadaQuery
