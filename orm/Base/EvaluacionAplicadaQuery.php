<?php

namespace Base;

use \EvaluacionAplicada as ChildEvaluacionAplicada;
use \EvaluacionAplicadaQuery as ChildEvaluacionAplicadaQuery;
use \Exception;
use \PDO;
use Map\EvaluacionAplicadaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'evaluacion_aplicada' table.
 *
 *
 *
 * @method     ChildEvaluacionAplicadaQuery orderByEvapCActividad($order = Criteria::ASC) Order by the evap_c_actividad column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapNumeroDictacion($order = Criteria::ASC) Order by the evap_numero_dictacion column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapCEvaluacion($order = Criteria::ASC) Order by the evap_c_evaluacion column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapNumeroEvaluacion($order = Criteria::ASC) Order by the evap_numero_evaluacion column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapTitulo($order = Criteria::ASC) Order by the evap_titulo column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapDescripcion($order = Criteria::ASC) Order by the evap_descripcion column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapOrden($order = Criteria::ASC) Order by the evap_orden column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapEEvaluacionAplicada($order = Criteria::ASC) Order by the evap_e_evaluacion_aplicada column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapTEvaluacionAplicada($order = Criteria::ASC) Order by the evap_t_evaluacion_aplicada column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapVigente($order = Criteria::ASC) Order by the evap_vigente column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapRFechaCreacion($order = Criteria::ASC) Order by the evap_r_fecha_creacion column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapRFechaModificacion($order = Criteria::ASC) Order by the evap_r_fecha_modificacion column
 * @method     ChildEvaluacionAplicadaQuery orderByEvapRUsuario($order = Criteria::ASC) Order by the evap_r_usuario column
 *
 * @method     ChildEvaluacionAplicadaQuery groupByEvapCActividad() Group by the evap_c_actividad column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapNumeroDictacion() Group by the evap_numero_dictacion column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapCEvaluacion() Group by the evap_c_evaluacion column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapNumeroEvaluacion() Group by the evap_numero_evaluacion column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapTitulo() Group by the evap_titulo column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapDescripcion() Group by the evap_descripcion column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapOrden() Group by the evap_orden column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapEEvaluacionAplicada() Group by the evap_e_evaluacion_aplicada column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapTEvaluacionAplicada() Group by the evap_t_evaluacion_aplicada column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapVigente() Group by the evap_vigente column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapRFechaCreacion() Group by the evap_r_fecha_creacion column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapRFechaModificacion() Group by the evap_r_fecha_modificacion column
 * @method     ChildEvaluacionAplicadaQuery groupByEvapRUsuario() Group by the evap_r_usuario column
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEvaluacionAplicadaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEvaluacionAplicadaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEvaluacionAplicadaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEvaluacionAplicadaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoinDictacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dictacion relation
 * @method     ChildEvaluacionAplicadaQuery rightJoinDictacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dictacion relation
 * @method     ChildEvaluacionAplicadaQuery innerJoinDictacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Dictacion relation
 *
 * @method     ChildEvaluacionAplicadaQuery joinWithDictacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dictacion relation
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoinWithDictacion() Adds a LEFT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildEvaluacionAplicadaQuery rightJoinWithDictacion() Adds a RIGHT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildEvaluacionAplicadaQuery innerJoinWithDictacion() Adds a INNER JOIN clause and with to the query using the Dictacion relation
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoinEEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the EEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery rightJoinEEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery innerJoinEEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the EEvaluacionAplicada relation
 *
 * @method     ChildEvaluacionAplicadaQuery joinWithEEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EEvaluacionAplicada relation
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoinWithEEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the EEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery rightJoinWithEEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the EEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery innerJoinWithEEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the EEvaluacionAplicada relation
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoinEvaluacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Evaluacion relation
 * @method     ChildEvaluacionAplicadaQuery rightJoinEvaluacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Evaluacion relation
 * @method     ChildEvaluacionAplicadaQuery innerJoinEvaluacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Evaluacion relation
 *
 * @method     ChildEvaluacionAplicadaQuery joinWithEvaluacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Evaluacion relation
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoinWithEvaluacion() Adds a LEFT JOIN clause and with to the query using the Evaluacion relation
 * @method     ChildEvaluacionAplicadaQuery rightJoinWithEvaluacion() Adds a RIGHT JOIN clause and with to the query using the Evaluacion relation
 * @method     ChildEvaluacionAplicadaQuery innerJoinWithEvaluacion() Adds a INNER JOIN clause and with to the query using the Evaluacion relation
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoinTEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the TEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery rightJoinTEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery innerJoinTEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the TEvaluacionAplicada relation
 *
 * @method     ChildEvaluacionAplicadaQuery joinWithTEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TEvaluacionAplicada relation
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoinWithTEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the TEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery rightJoinWithTEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the TEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery innerJoinWithTEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the TEvaluacionAplicada relation
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery rightJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery innerJoinInscripcionEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     ChildEvaluacionAplicadaQuery joinWithInscripcionEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     ChildEvaluacionAplicadaQuery leftJoinWithInscripcionEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery rightJoinWithInscripcionEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 * @method     ChildEvaluacionAplicadaQuery innerJoinWithInscripcionEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the InscripcionEvaluacionAplicada relation
 *
 * @method     \DictacionQuery|\EEvaluacionAplicadaQuery|\EvaluacionQuery|\TEvaluacionAplicadaQuery|\InscripcionEvaluacionAplicadaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEvaluacionAplicada findOne(ConnectionInterface $con = null) Return the first ChildEvaluacionAplicada matching the query
 * @method     ChildEvaluacionAplicada findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEvaluacionAplicada matching the query, or a new ChildEvaluacionAplicada object populated from the query conditions when no match is found
 *
 * @method     ChildEvaluacionAplicada findOneByEvapCActividad(int $evap_c_actividad) Return the first ChildEvaluacionAplicada filtered by the evap_c_actividad column
 * @method     ChildEvaluacionAplicada findOneByEvapNumeroDictacion(int $evap_numero_dictacion) Return the first ChildEvaluacionAplicada filtered by the evap_numero_dictacion column
 * @method     ChildEvaluacionAplicada findOneByEvapCEvaluacion(int $evap_c_evaluacion) Return the first ChildEvaluacionAplicada filtered by the evap_c_evaluacion column
 * @method     ChildEvaluacionAplicada findOneByEvapNumeroEvaluacion(int $evap_numero_evaluacion) Return the first ChildEvaluacionAplicada filtered by the evap_numero_evaluacion column
 * @method     ChildEvaluacionAplicada findOneByEvapTitulo(string $evap_titulo) Return the first ChildEvaluacionAplicada filtered by the evap_titulo column
 * @method     ChildEvaluacionAplicada findOneByEvapDescripcion(string $evap_descripcion) Return the first ChildEvaluacionAplicada filtered by the evap_descripcion column
 * @method     ChildEvaluacionAplicada findOneByEvapOrden(int $evap_orden) Return the first ChildEvaluacionAplicada filtered by the evap_orden column
 * @method     ChildEvaluacionAplicada findOneByEvapEEvaluacionAplicada(int $evap_e_evaluacion_aplicada) Return the first ChildEvaluacionAplicada filtered by the evap_e_evaluacion_aplicada column
 * @method     ChildEvaluacionAplicada findOneByEvapTEvaluacionAplicada(int $evap_t_evaluacion_aplicada) Return the first ChildEvaluacionAplicada filtered by the evap_t_evaluacion_aplicada column
 * @method     ChildEvaluacionAplicada findOneByEvapVigente(int $evap_vigente) Return the first ChildEvaluacionAplicada filtered by the evap_vigente column
 * @method     ChildEvaluacionAplicada findOneByEvapRFechaCreacion(string $evap_r_fecha_creacion) Return the first ChildEvaluacionAplicada filtered by the evap_r_fecha_creacion column
 * @method     ChildEvaluacionAplicada findOneByEvapRFechaModificacion(string $evap_r_fecha_modificacion) Return the first ChildEvaluacionAplicada filtered by the evap_r_fecha_modificacion column
 * @method     ChildEvaluacionAplicada findOneByEvapRUsuario(int $evap_r_usuario) Return the first ChildEvaluacionAplicada filtered by the evap_r_usuario column *

 * @method     ChildEvaluacionAplicada requirePk($key, ConnectionInterface $con = null) Return the ChildEvaluacionAplicada by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOne(ConnectionInterface $con = null) Return the first ChildEvaluacionAplicada matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEvaluacionAplicada requireOneByEvapCActividad(int $evap_c_actividad) Return the first ChildEvaluacionAplicada filtered by the evap_c_actividad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapNumeroDictacion(int $evap_numero_dictacion) Return the first ChildEvaluacionAplicada filtered by the evap_numero_dictacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapCEvaluacion(int $evap_c_evaluacion) Return the first ChildEvaluacionAplicada filtered by the evap_c_evaluacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapNumeroEvaluacion(int $evap_numero_evaluacion) Return the first ChildEvaluacionAplicada filtered by the evap_numero_evaluacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapTitulo(string $evap_titulo) Return the first ChildEvaluacionAplicada filtered by the evap_titulo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapDescripcion(string $evap_descripcion) Return the first ChildEvaluacionAplicada filtered by the evap_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapOrden(int $evap_orden) Return the first ChildEvaluacionAplicada filtered by the evap_orden column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapEEvaluacionAplicada(int $evap_e_evaluacion_aplicada) Return the first ChildEvaluacionAplicada filtered by the evap_e_evaluacion_aplicada column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapTEvaluacionAplicada(int $evap_t_evaluacion_aplicada) Return the first ChildEvaluacionAplicada filtered by the evap_t_evaluacion_aplicada column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapVigente(int $evap_vigente) Return the first ChildEvaluacionAplicada filtered by the evap_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapRFechaCreacion(string $evap_r_fecha_creacion) Return the first ChildEvaluacionAplicada filtered by the evap_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapRFechaModificacion(string $evap_r_fecha_modificacion) Return the first ChildEvaluacionAplicada filtered by the evap_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEvaluacionAplicada requireOneByEvapRUsuario(int $evap_r_usuario) Return the first ChildEvaluacionAplicada filtered by the evap_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEvaluacionAplicada[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEvaluacionAplicada objects based on current ModelCriteria
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapCActividad(int $evap_c_actividad) Return ChildEvaluacionAplicada objects filtered by the evap_c_actividad column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapNumeroDictacion(int $evap_numero_dictacion) Return ChildEvaluacionAplicada objects filtered by the evap_numero_dictacion column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapCEvaluacion(int $evap_c_evaluacion) Return ChildEvaluacionAplicada objects filtered by the evap_c_evaluacion column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapNumeroEvaluacion(int $evap_numero_evaluacion) Return ChildEvaluacionAplicada objects filtered by the evap_numero_evaluacion column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapTitulo(string $evap_titulo) Return ChildEvaluacionAplicada objects filtered by the evap_titulo column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapDescripcion(string $evap_descripcion) Return ChildEvaluacionAplicada objects filtered by the evap_descripcion column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapOrden(int $evap_orden) Return ChildEvaluacionAplicada objects filtered by the evap_orden column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapEEvaluacionAplicada(int $evap_e_evaluacion_aplicada) Return ChildEvaluacionAplicada objects filtered by the evap_e_evaluacion_aplicada column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapTEvaluacionAplicada(int $evap_t_evaluacion_aplicada) Return ChildEvaluacionAplicada objects filtered by the evap_t_evaluacion_aplicada column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapVigente(int $evap_vigente) Return ChildEvaluacionAplicada objects filtered by the evap_vigente column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapRFechaCreacion(string $evap_r_fecha_creacion) Return ChildEvaluacionAplicada objects filtered by the evap_r_fecha_creacion column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapRFechaModificacion(string $evap_r_fecha_modificacion) Return ChildEvaluacionAplicada objects filtered by the evap_r_fecha_modificacion column
 * @method     ChildEvaluacionAplicada[]|ObjectCollection findByEvapRUsuario(int $evap_r_usuario) Return ChildEvaluacionAplicada objects filtered by the evap_r_usuario column
 * @method     ChildEvaluacionAplicada[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EvaluacionAplicadaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EvaluacionAplicadaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\EvaluacionAplicada', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEvaluacionAplicadaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEvaluacionAplicadaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEvaluacionAplicadaQuery) {
            return $criteria;
        }
        $query = new ChildEvaluacionAplicadaQuery();
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
     * $obj = $c->findPk(array(12, 34, 56, 78), $con);
     * </code>
     *
     * @param array[$evap_c_actividad, $evap_numero_dictacion, $evap_c_evaluacion, $evap_numero_evaluacion] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildEvaluacionAplicada|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EvaluacionAplicadaTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3])]))))) {
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
     * @return ChildEvaluacionAplicada A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT evap_c_actividad, evap_numero_dictacion, evap_c_evaluacion, evap_numero_evaluacion, evap_titulo, evap_descripcion, evap_orden, evap_e_evaluacion_aplicada, evap_t_evaluacion_aplicada, evap_vigente, evap_r_fecha_creacion, evap_r_fecha_modificacion, evap_r_usuario FROM evaluacion_aplicada WHERE evap_c_actividad = :p0 AND evap_numero_dictacion = :p1 AND evap_c_evaluacion = :p2 AND evap_numero_evaluacion = :p3';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildEvaluacionAplicada $obj */
            $obj = new ChildEvaluacionAplicada();
            $obj->hydrate($row);
            EvaluacionAplicadaTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3])]));
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
     * @return ChildEvaluacionAplicada|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION, $key[3], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the evap_c_actividad column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapCActividad(1234); // WHERE evap_c_actividad = 1234
     * $query->filterByEvapCActividad(array(12, 34)); // WHERE evap_c_actividad IN (12, 34)
     * $query->filterByEvapCActividad(array('min' => 12)); // WHERE evap_c_actividad > 12
     * </code>
     *
     * @see       filterByDictacion()
     *
     * @param     mixed $evapCActividad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapCActividad($evapCActividad = null, $comparison = null)
    {
        if (is_array($evapCActividad)) {
            $useMinMax = false;
            if (isset($evapCActividad['min'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD, $evapCActividad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evapCActividad['max'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD, $evapCActividad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD, $evapCActividad, $comparison);
    }

    /**
     * Filter the query on the evap_numero_dictacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapNumeroDictacion(1234); // WHERE evap_numero_dictacion = 1234
     * $query->filterByEvapNumeroDictacion(array(12, 34)); // WHERE evap_numero_dictacion IN (12, 34)
     * $query->filterByEvapNumeroDictacion(array('min' => 12)); // WHERE evap_numero_dictacion > 12
     * </code>
     *
     * @see       filterByDictacion()
     *
     * @param     mixed $evapNumeroDictacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapNumeroDictacion($evapNumeroDictacion = null, $comparison = null)
    {
        if (is_array($evapNumeroDictacion)) {
            $useMinMax = false;
            if (isset($evapNumeroDictacion['min'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION, $evapNumeroDictacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evapNumeroDictacion['max'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION, $evapNumeroDictacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION, $evapNumeroDictacion, $comparison);
    }

    /**
     * Filter the query on the evap_c_evaluacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapCEvaluacion(1234); // WHERE evap_c_evaluacion = 1234
     * $query->filterByEvapCEvaluacion(array(12, 34)); // WHERE evap_c_evaluacion IN (12, 34)
     * $query->filterByEvapCEvaluacion(array('min' => 12)); // WHERE evap_c_evaluacion > 12
     * </code>
     *
     * @see       filterByEvaluacion()
     *
     * @param     mixed $evapCEvaluacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapCEvaluacion($evapCEvaluacion = null, $comparison = null)
    {
        if (is_array($evapCEvaluacion)) {
            $useMinMax = false;
            if (isset($evapCEvaluacion['min'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, $evapCEvaluacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evapCEvaluacion['max'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, $evapCEvaluacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, $evapCEvaluacion, $comparison);
    }

    /**
     * Filter the query on the evap_numero_evaluacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapNumeroEvaluacion(1234); // WHERE evap_numero_evaluacion = 1234
     * $query->filterByEvapNumeroEvaluacion(array(12, 34)); // WHERE evap_numero_evaluacion IN (12, 34)
     * $query->filterByEvapNumeroEvaluacion(array('min' => 12)); // WHERE evap_numero_evaluacion > 12
     * </code>
     *
     * @param     mixed $evapNumeroEvaluacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapNumeroEvaluacion($evapNumeroEvaluacion = null, $comparison = null)
    {
        if (is_array($evapNumeroEvaluacion)) {
            $useMinMax = false;
            if (isset($evapNumeroEvaluacion['min'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION, $evapNumeroEvaluacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evapNumeroEvaluacion['max'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION, $evapNumeroEvaluacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION, $evapNumeroEvaluacion, $comparison);
    }

    /**
     * Filter the query on the evap_titulo column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapTitulo('fooValue');   // WHERE evap_titulo = 'fooValue'
     * $query->filterByEvapTitulo('%fooValue%', Criteria::LIKE); // WHERE evap_titulo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $evapTitulo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapTitulo($evapTitulo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($evapTitulo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_TITULO, $evapTitulo, $comparison);
    }

    /**
     * Filter the query on the evap_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapDescripcion('fooValue');   // WHERE evap_descripcion = 'fooValue'
     * $query->filterByEvapDescripcion('%fooValue%', Criteria::LIKE); // WHERE evap_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $evapDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapDescripcion($evapDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($evapDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_DESCRIPCION, $evapDescripcion, $comparison);
    }

    /**
     * Filter the query on the evap_orden column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapOrden(1234); // WHERE evap_orden = 1234
     * $query->filterByEvapOrden(array(12, 34)); // WHERE evap_orden IN (12, 34)
     * $query->filterByEvapOrden(array('min' => 12)); // WHERE evap_orden > 12
     * </code>
     *
     * @param     mixed $evapOrden The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapOrden($evapOrden = null, $comparison = null)
    {
        if (is_array($evapOrden)) {
            $useMinMax = false;
            if (isset($evapOrden['min'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_ORDEN, $evapOrden['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evapOrden['max'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_ORDEN, $evapOrden['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_ORDEN, $evapOrden, $comparison);
    }

    /**
     * Filter the query on the evap_e_evaluacion_aplicada column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapEEvaluacionAplicada(1234); // WHERE evap_e_evaluacion_aplicada = 1234
     * $query->filterByEvapEEvaluacionAplicada(array(12, 34)); // WHERE evap_e_evaluacion_aplicada IN (12, 34)
     * $query->filterByEvapEEvaluacionAplicada(array('min' => 12)); // WHERE evap_e_evaluacion_aplicada > 12
     * </code>
     *
     * @see       filterByEEvaluacionAplicada()
     *
     * @param     mixed $evapEEvaluacionAplicada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapEEvaluacionAplicada($evapEEvaluacionAplicada = null, $comparison = null)
    {
        if (is_array($evapEEvaluacionAplicada)) {
            $useMinMax = false;
            if (isset($evapEEvaluacionAplicada['min'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA, $evapEEvaluacionAplicada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evapEEvaluacionAplicada['max'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA, $evapEEvaluacionAplicada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA, $evapEEvaluacionAplicada, $comparison);
    }

    /**
     * Filter the query on the evap_t_evaluacion_aplicada column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapTEvaluacionAplicada(1234); // WHERE evap_t_evaluacion_aplicada = 1234
     * $query->filterByEvapTEvaluacionAplicada(array(12, 34)); // WHERE evap_t_evaluacion_aplicada IN (12, 34)
     * $query->filterByEvapTEvaluacionAplicada(array('min' => 12)); // WHERE evap_t_evaluacion_aplicada > 12
     * </code>
     *
     * @see       filterByTEvaluacionAplicada()
     *
     * @param     mixed $evapTEvaluacionAplicada The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapTEvaluacionAplicada($evapTEvaluacionAplicada = null, $comparison = null)
    {
        if (is_array($evapTEvaluacionAplicada)) {
            $useMinMax = false;
            if (isset($evapTEvaluacionAplicada['min'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA, $evapTEvaluacionAplicada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evapTEvaluacionAplicada['max'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA, $evapTEvaluacionAplicada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA, $evapTEvaluacionAplicada, $comparison);
    }

    /**
     * Filter the query on the evap_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapVigente(1234); // WHERE evap_vigente = 1234
     * $query->filterByEvapVigente(array(12, 34)); // WHERE evap_vigente IN (12, 34)
     * $query->filterByEvapVigente(array('min' => 12)); // WHERE evap_vigente > 12
     * </code>
     *
     * @param     mixed $evapVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapVigente($evapVigente = null, $comparison = null)
    {
        if (is_array($evapVigente)) {
            $useMinMax = false;
            if (isset($evapVigente['min'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_VIGENTE, $evapVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evapVigente['max'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_VIGENTE, $evapVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_VIGENTE, $evapVigente, $comparison);
    }

    /**
     * Filter the query on the evap_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapRFechaCreacion('2011-03-14'); // WHERE evap_r_fecha_creacion = '2011-03-14'
     * $query->filterByEvapRFechaCreacion('now'); // WHERE evap_r_fecha_creacion = '2011-03-14'
     * $query->filterByEvapRFechaCreacion(array('max' => 'yesterday')); // WHERE evap_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $evapRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapRFechaCreacion($evapRFechaCreacion = null, $comparison = null)
    {
        if (is_array($evapRFechaCreacion)) {
            $useMinMax = false;
            if (isset($evapRFechaCreacion['min'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_CREACION, $evapRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evapRFechaCreacion['max'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_CREACION, $evapRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_CREACION, $evapRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the evap_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapRFechaModificacion('2011-03-14'); // WHERE evap_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEvapRFechaModificacion('now'); // WHERE evap_r_fecha_modificacion = '2011-03-14'
     * $query->filterByEvapRFechaModificacion(array('max' => 'yesterday')); // WHERE evap_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $evapRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapRFechaModificacion($evapRFechaModificacion = null, $comparison = null)
    {
        if (is_array($evapRFechaModificacion)) {
            $useMinMax = false;
            if (isset($evapRFechaModificacion['min'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_MODIFICACION, $evapRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evapRFechaModificacion['max'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_MODIFICACION, $evapRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_MODIFICACION, $evapRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the evap_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByEvapRUsuario(1234); // WHERE evap_r_usuario = 1234
     * $query->filterByEvapRUsuario(array(12, 34)); // WHERE evap_r_usuario IN (12, 34)
     * $query->filterByEvapRUsuario(array('min' => 12)); // WHERE evap_r_usuario > 12
     * </code>
     *
     * @param     mixed $evapRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvapRUsuario($evapRUsuario = null, $comparison = null)
    {
        if (is_array($evapRUsuario)) {
            $useMinMax = false;
            if (isset($evapRUsuario['min'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_R_USUARIO, $evapRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evapRUsuario['max'])) {
                $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_R_USUARIO, $evapRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_R_USUARIO, $evapRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Dictacion object
     *
     * @param \Dictacion $dictacion The related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByDictacion($dictacion, $comparison = null)
    {
        if ($dictacion instanceof \Dictacion) {
            return $this
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD, $dictacion->getDictCActividad(), $comparison)
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION, $dictacion->getDictNumero(), $comparison);
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
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
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
     * Filter the query by a related \EEvaluacionAplicada object
     *
     * @param \EEvaluacionAplicada|ObjectCollection $eEvaluacionAplicada The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEEvaluacionAplicada($eEvaluacionAplicada, $comparison = null)
    {
        if ($eEvaluacionAplicada instanceof \EEvaluacionAplicada) {
            return $this
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA, $eEvaluacionAplicada->getEevaEstado(), $comparison);
        } elseif ($eEvaluacionAplicada instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA, $eEvaluacionAplicada->toKeyValue('PrimaryKey', 'EevaEstado'), $comparison);
        } else {
            throw new PropelException('filterByEEvaluacionAplicada() only accepts arguments of type \EEvaluacionAplicada or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EEvaluacionAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function joinEEvaluacionAplicada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EEvaluacionAplicada');

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
            $this->addJoinObject($join, 'EEvaluacionAplicada');
        }

        return $this;
    }

    /**
     * Use the EEvaluacionAplicada relation EEvaluacionAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EEvaluacionAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useEEvaluacionAplicadaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEEvaluacionAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EEvaluacionAplicada', '\EEvaluacionAplicadaQuery');
    }

    /**
     * Filter the query by a related \Evaluacion object
     *
     * @param \Evaluacion|ObjectCollection $evaluacion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByEvaluacion($evaluacion, $comparison = null)
    {
        if ($evaluacion instanceof \Evaluacion) {
            return $this
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, $evaluacion->getEvalCodigo(), $comparison);
        } elseif ($evaluacion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, $evaluacion->toKeyValue('PrimaryKey', 'EvalCodigo'), $comparison);
        } else {
            throw new PropelException('filterByEvaluacion() only accepts arguments of type \Evaluacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Evaluacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function joinEvaluacion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Evaluacion');

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
            $this->addJoinObject($join, 'Evaluacion');
        }

        return $this;
    }

    /**
     * Use the Evaluacion relation Evaluacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EvaluacionQuery A secondary query class using the current class as primary query
     */
    public function useEvaluacionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvaluacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Evaluacion', '\EvaluacionQuery');
    }

    /**
     * Filter the query by a related \TEvaluacionAplicada object
     *
     * @param \TEvaluacionAplicada|ObjectCollection $tEvaluacionAplicada The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByTEvaluacionAplicada($tEvaluacionAplicada, $comparison = null)
    {
        if ($tEvaluacionAplicada instanceof \TEvaluacionAplicada) {
            return $this
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA, $tEvaluacionAplicada->getTevaTipo(), $comparison);
        } elseif ($tEvaluacionAplicada instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA, $tEvaluacionAplicada->toKeyValue('PrimaryKey', 'TevaTipo'), $comparison);
        } else {
            throw new PropelException('filterByTEvaluacionAplicada() only accepts arguments of type \TEvaluacionAplicada or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TEvaluacionAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function joinTEvaluacionAplicada($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TEvaluacionAplicada');

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
            $this->addJoinObject($join, 'TEvaluacionAplicada');
        }

        return $this;
    }

    /**
     * Use the TEvaluacionAplicada relation TEvaluacionAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TEvaluacionAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useTEvaluacionAplicadaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTEvaluacionAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TEvaluacionAplicada', '\TEvaluacionAplicadaQuery');
    }

    /**
     * Filter the query by a related \InscripcionEvaluacionAplicada object
     *
     * @param \InscripcionEvaluacionAplicada|ObjectCollection $inscripcionEvaluacionAplicada the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function filterByInscripcionEvaluacionAplicada($inscripcionEvaluacionAplicada, $comparison = null)
    {
        if ($inscripcionEvaluacionAplicada instanceof \InscripcionEvaluacionAplicada) {
            return $this
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD, $inscripcionEvaluacionAplicada->getInevapCActividad(), $comparison)
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION, $inscripcionEvaluacionAplicada->getInevapNumeroDictacion(), $comparison)
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, $inscripcionEvaluacionAplicada->getInevapCEvaluacion(), $comparison)
                ->addUsingAlias(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION, $inscripcionEvaluacionAplicada->getInevapNumeroEvaluacion(), $comparison);
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
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
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
     * @param   ChildEvaluacionAplicada $evaluacionAplicada Object to remove from the list of results
     *
     * @return $this|ChildEvaluacionAplicadaQuery The current query, for fluid interface
     */
    public function prune($evaluacionAplicada = null)
    {
        if ($evaluacionAplicada) {
            $this->addCond('pruneCond0', $this->getAliasedColName(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD), $evaluacionAplicada->getEvapCActividad(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION), $evaluacionAplicada->getEvapNumeroDictacion(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION), $evaluacionAplicada->getEvapCEvaluacion(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION), $evaluacionAplicada->getEvapNumeroEvaluacion(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the evaluacion_aplicada table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EvaluacionAplicadaTableMap::clearInstancePool();
            EvaluacionAplicadaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EvaluacionAplicadaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EvaluacionAplicadaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EvaluacionAplicadaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EvaluacionAplicadaQuery
