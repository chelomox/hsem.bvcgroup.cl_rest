<?php

namespace Base;

use \Actividad as ChildActividad;
use \ActividadQuery as ChildActividadQuery;
use \Exception;
use \PDO;
use Map\ActividadTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'actividad' table.
 *
 *
 *
 * @method     ChildActividadQuery orderByActiCodigo($order = Criteria::ASC) Order by the acti_codigo column
 * @method     ChildActividadQuery orderByActiNombre($order = Criteria::ASC) Order by the acti_nombre column
 * @method     ChildActividadQuery orderByActiImagen($order = Criteria::ASC) Order by the acti_imagen column
 * @method     ChildActividadQuery orderByActiTActividad($order = Criteria::ASC) Order by the acti_t_actividad column
 * @method     ChildActividadQuery orderByActiHora($order = Criteria::ASC) Order by the acti_hora column
 * @method     ChildActividadQuery orderByActiHoraTeorica($order = Criteria::ASC) Order by the acti_hora_teorica column
 * @method     ChildActividadQuery orderByActiHoraPractica($order = Criteria::ASC) Order by the acti_hora_practica column
 * @method     ChildActividadQuery orderByActiTHora($order = Criteria::ASC) Order by the acti_t_hora column
 * @method     ChildActividadQuery orderByActiEActividad($order = Criteria::ASC) Order by the acti_e_actividad column
 * @method     ChildActividadQuery orderByActiTModalidad($order = Criteria::ASC) Order by the acti_t_modalidad column
 * @method     ChildActividadQuery orderByActiObservacion($order = Criteria::ASC) Order by the acti_observacion column
 * @method     ChildActividadQuery orderByActiVigente($order = Criteria::ASC) Order by the acti_vigente column
 * @method     ChildActividadQuery orderByActiRFechaCreacion($order = Criteria::ASC) Order by the acti_r_fecha_creacion column
 * @method     ChildActividadQuery orderByActiRFechaModificacion($order = Criteria::ASC) Order by the acti_r_fecha_modificacion column
 * @method     ChildActividadQuery orderByActiRUsuario($order = Criteria::ASC) Order by the acti_r_usuario column
 *
 * @method     ChildActividadQuery groupByActiCodigo() Group by the acti_codigo column
 * @method     ChildActividadQuery groupByActiNombre() Group by the acti_nombre column
 * @method     ChildActividadQuery groupByActiImagen() Group by the acti_imagen column
 * @method     ChildActividadQuery groupByActiTActividad() Group by the acti_t_actividad column
 * @method     ChildActividadQuery groupByActiHora() Group by the acti_hora column
 * @method     ChildActividadQuery groupByActiHoraTeorica() Group by the acti_hora_teorica column
 * @method     ChildActividadQuery groupByActiHoraPractica() Group by the acti_hora_practica column
 * @method     ChildActividadQuery groupByActiTHora() Group by the acti_t_hora column
 * @method     ChildActividadQuery groupByActiEActividad() Group by the acti_e_actividad column
 * @method     ChildActividadQuery groupByActiTModalidad() Group by the acti_t_modalidad column
 * @method     ChildActividadQuery groupByActiObservacion() Group by the acti_observacion column
 * @method     ChildActividadQuery groupByActiVigente() Group by the acti_vigente column
 * @method     ChildActividadQuery groupByActiRFechaCreacion() Group by the acti_r_fecha_creacion column
 * @method     ChildActividadQuery groupByActiRFechaModificacion() Group by the acti_r_fecha_modificacion column
 * @method     ChildActividadQuery groupByActiRUsuario() Group by the acti_r_usuario column
 *
 * @method     ChildActividadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildActividadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildActividadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildActividadQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildActividadQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildActividadQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildActividadQuery leftJoinEActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the EActividad relation
 * @method     ChildActividadQuery rightJoinEActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EActividad relation
 * @method     ChildActividadQuery innerJoinEActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the EActividad relation
 *
 * @method     ChildActividadQuery joinWithEActividad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EActividad relation
 *
 * @method     ChildActividadQuery leftJoinWithEActividad() Adds a LEFT JOIN clause and with to the query using the EActividad relation
 * @method     ChildActividadQuery rightJoinWithEActividad() Adds a RIGHT JOIN clause and with to the query using the EActividad relation
 * @method     ChildActividadQuery innerJoinWithEActividad() Adds a INNER JOIN clause and with to the query using the EActividad relation
 *
 * @method     ChildActividadQuery leftJoinTActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the TActividad relation
 * @method     ChildActividadQuery rightJoinTActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TActividad relation
 * @method     ChildActividadQuery innerJoinTActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the TActividad relation
 *
 * @method     ChildActividadQuery joinWithTActividad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TActividad relation
 *
 * @method     ChildActividadQuery leftJoinWithTActividad() Adds a LEFT JOIN clause and with to the query using the TActividad relation
 * @method     ChildActividadQuery rightJoinWithTActividad() Adds a RIGHT JOIN clause and with to the query using the TActividad relation
 * @method     ChildActividadQuery innerJoinWithTActividad() Adds a INNER JOIN clause and with to the query using the TActividad relation
 *
 * @method     ChildActividadQuery leftJoinTHora($relationAlias = null) Adds a LEFT JOIN clause to the query using the THora relation
 * @method     ChildActividadQuery rightJoinTHora($relationAlias = null) Adds a RIGHT JOIN clause to the query using the THora relation
 * @method     ChildActividadQuery innerJoinTHora($relationAlias = null) Adds a INNER JOIN clause to the query using the THora relation
 *
 * @method     ChildActividadQuery joinWithTHora($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the THora relation
 *
 * @method     ChildActividadQuery leftJoinWithTHora() Adds a LEFT JOIN clause and with to the query using the THora relation
 * @method     ChildActividadQuery rightJoinWithTHora() Adds a RIGHT JOIN clause and with to the query using the THora relation
 * @method     ChildActividadQuery innerJoinWithTHora() Adds a INNER JOIN clause and with to the query using the THora relation
 *
 * @method     ChildActividadQuery leftJoinTModalidad($relationAlias = null) Adds a LEFT JOIN clause to the query using the TModalidad relation
 * @method     ChildActividadQuery rightJoinTModalidad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TModalidad relation
 * @method     ChildActividadQuery innerJoinTModalidad($relationAlias = null) Adds a INNER JOIN clause to the query using the TModalidad relation
 *
 * @method     ChildActividadQuery joinWithTModalidad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TModalidad relation
 *
 * @method     ChildActividadQuery leftJoinWithTModalidad() Adds a LEFT JOIN clause and with to the query using the TModalidad relation
 * @method     ChildActividadQuery rightJoinWithTModalidad() Adds a RIGHT JOIN clause and with to the query using the TModalidad relation
 * @method     ChildActividadQuery innerJoinWithTModalidad() Adds a INNER JOIN clause and with to the query using the TModalidad relation
 *
 * @method     ChildActividadQuery leftJoinActividadCargo($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActividadCargo relation
 * @method     ChildActividadQuery rightJoinActividadCargo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActividadCargo relation
 * @method     ChildActividadQuery innerJoinActividadCargo($relationAlias = null) Adds a INNER JOIN clause to the query using the ActividadCargo relation
 *
 * @method     ChildActividadQuery joinWithActividadCargo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ActividadCargo relation
 *
 * @method     ChildActividadQuery leftJoinWithActividadCargo() Adds a LEFT JOIN clause and with to the query using the ActividadCargo relation
 * @method     ChildActividadQuery rightJoinWithActividadCargo() Adds a RIGHT JOIN clause and with to the query using the ActividadCargo relation
 * @method     ChildActividadQuery innerJoinWithActividadCargo() Adds a INNER JOIN clause and with to the query using the ActividadCargo relation
 *
 * @method     ChildActividadQuery leftJoinActividadObjetivo($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActividadObjetivo relation
 * @method     ChildActividadQuery rightJoinActividadObjetivo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActividadObjetivo relation
 * @method     ChildActividadQuery innerJoinActividadObjetivo($relationAlias = null) Adds a INNER JOIN clause to the query using the ActividadObjetivo relation
 *
 * @method     ChildActividadQuery joinWithActividadObjetivo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ActividadObjetivo relation
 *
 * @method     ChildActividadQuery leftJoinWithActividadObjetivo() Adds a LEFT JOIN clause and with to the query using the ActividadObjetivo relation
 * @method     ChildActividadQuery rightJoinWithActividadObjetivo() Adds a RIGHT JOIN clause and with to the query using the ActividadObjetivo relation
 * @method     ChildActividadQuery innerJoinWithActividadObjetivo() Adds a INNER JOIN clause and with to the query using the ActividadObjetivo relation
 *
 * @method     ChildActividadQuery leftJoinDictacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dictacion relation
 * @method     ChildActividadQuery rightJoinDictacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dictacion relation
 * @method     ChildActividadQuery innerJoinDictacion($relationAlias = null) Adds a INNER JOIN clause to the query using the Dictacion relation
 *
 * @method     ChildActividadQuery joinWithDictacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dictacion relation
 *
 * @method     ChildActividadQuery leftJoinWithDictacion() Adds a LEFT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildActividadQuery rightJoinWithDictacion() Adds a RIGHT JOIN clause and with to the query using the Dictacion relation
 * @method     ChildActividadQuery innerJoinWithDictacion() Adds a INNER JOIN clause and with to the query using the Dictacion relation
 *
 * @method     \EActividadQuery|\TActividadQuery|\THoraQuery|\TModalidadQuery|\ActividadCargoQuery|\ActividadObjetivoQuery|\DictacionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildActividad findOne(ConnectionInterface $con = null) Return the first ChildActividad matching the query
 * @method     ChildActividad findOneOrCreate(ConnectionInterface $con = null) Return the first ChildActividad matching the query, or a new ChildActividad object populated from the query conditions when no match is found
 *
 * @method     ChildActividad findOneByActiCodigo(int $acti_codigo) Return the first ChildActividad filtered by the acti_codigo column
 * @method     ChildActividad findOneByActiNombre(string $acti_nombre) Return the first ChildActividad filtered by the acti_nombre column
 * @method     ChildActividad findOneByActiImagen(string $acti_imagen) Return the first ChildActividad filtered by the acti_imagen column
 * @method     ChildActividad findOneByActiTActividad(int $acti_t_actividad) Return the first ChildActividad filtered by the acti_t_actividad column
 * @method     ChildActividad findOneByActiHora(int $acti_hora) Return the first ChildActividad filtered by the acti_hora column
 * @method     ChildActividad findOneByActiHoraTeorica(int $acti_hora_teorica) Return the first ChildActividad filtered by the acti_hora_teorica column
 * @method     ChildActividad findOneByActiHoraPractica(int $acti_hora_practica) Return the first ChildActividad filtered by the acti_hora_practica column
 * @method     ChildActividad findOneByActiTHora(int $acti_t_hora) Return the first ChildActividad filtered by the acti_t_hora column
 * @method     ChildActividad findOneByActiEActividad(int $acti_e_actividad) Return the first ChildActividad filtered by the acti_e_actividad column
 * @method     ChildActividad findOneByActiTModalidad(int $acti_t_modalidad) Return the first ChildActividad filtered by the acti_t_modalidad column
 * @method     ChildActividad findOneByActiObservacion(string $acti_observacion) Return the first ChildActividad filtered by the acti_observacion column
 * @method     ChildActividad findOneByActiVigente(int $acti_vigente) Return the first ChildActividad filtered by the acti_vigente column
 * @method     ChildActividad findOneByActiRFechaCreacion(string $acti_r_fecha_creacion) Return the first ChildActividad filtered by the acti_r_fecha_creacion column
 * @method     ChildActividad findOneByActiRFechaModificacion(string $acti_r_fecha_modificacion) Return the first ChildActividad filtered by the acti_r_fecha_modificacion column
 * @method     ChildActividad findOneByActiRUsuario(int $acti_r_usuario) Return the first ChildActividad filtered by the acti_r_usuario column *

 * @method     ChildActividad requirePk($key, ConnectionInterface $con = null) Return the ChildActividad by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOne(ConnectionInterface $con = null) Return the first ChildActividad matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActividad requireOneByActiCodigo(int $acti_codigo) Return the first ChildActividad filtered by the acti_codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiNombre(string $acti_nombre) Return the first ChildActividad filtered by the acti_nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiImagen(string $acti_imagen) Return the first ChildActividad filtered by the acti_imagen column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiTActividad(int $acti_t_actividad) Return the first ChildActividad filtered by the acti_t_actividad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiHora(int $acti_hora) Return the first ChildActividad filtered by the acti_hora column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiHoraTeorica(int $acti_hora_teorica) Return the first ChildActividad filtered by the acti_hora_teorica column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiHoraPractica(int $acti_hora_practica) Return the first ChildActividad filtered by the acti_hora_practica column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiTHora(int $acti_t_hora) Return the first ChildActividad filtered by the acti_t_hora column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiEActividad(int $acti_e_actividad) Return the first ChildActividad filtered by the acti_e_actividad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiTModalidad(int $acti_t_modalidad) Return the first ChildActividad filtered by the acti_t_modalidad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiObservacion(string $acti_observacion) Return the first ChildActividad filtered by the acti_observacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiVigente(int $acti_vigente) Return the first ChildActividad filtered by the acti_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiRFechaCreacion(string $acti_r_fecha_creacion) Return the first ChildActividad filtered by the acti_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiRFechaModificacion(string $acti_r_fecha_modificacion) Return the first ChildActividad filtered by the acti_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActividad requireOneByActiRUsuario(int $acti_r_usuario) Return the first ChildActividad filtered by the acti_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActividad[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildActividad objects based on current ModelCriteria
 * @method     ChildActividad[]|ObjectCollection findByActiCodigo(int $acti_codigo) Return ChildActividad objects filtered by the acti_codigo column
 * @method     ChildActividad[]|ObjectCollection findByActiNombre(string $acti_nombre) Return ChildActividad objects filtered by the acti_nombre column
 * @method     ChildActividad[]|ObjectCollection findByActiImagen(string $acti_imagen) Return ChildActividad objects filtered by the acti_imagen column
 * @method     ChildActividad[]|ObjectCollection findByActiTActividad(int $acti_t_actividad) Return ChildActividad objects filtered by the acti_t_actividad column
 * @method     ChildActividad[]|ObjectCollection findByActiHora(int $acti_hora) Return ChildActividad objects filtered by the acti_hora column
 * @method     ChildActividad[]|ObjectCollection findByActiHoraTeorica(int $acti_hora_teorica) Return ChildActividad objects filtered by the acti_hora_teorica column
 * @method     ChildActividad[]|ObjectCollection findByActiHoraPractica(int $acti_hora_practica) Return ChildActividad objects filtered by the acti_hora_practica column
 * @method     ChildActividad[]|ObjectCollection findByActiTHora(int $acti_t_hora) Return ChildActividad objects filtered by the acti_t_hora column
 * @method     ChildActividad[]|ObjectCollection findByActiEActividad(int $acti_e_actividad) Return ChildActividad objects filtered by the acti_e_actividad column
 * @method     ChildActividad[]|ObjectCollection findByActiTModalidad(int $acti_t_modalidad) Return ChildActividad objects filtered by the acti_t_modalidad column
 * @method     ChildActividad[]|ObjectCollection findByActiObservacion(string $acti_observacion) Return ChildActividad objects filtered by the acti_observacion column
 * @method     ChildActividad[]|ObjectCollection findByActiVigente(int $acti_vigente) Return ChildActividad objects filtered by the acti_vigente column
 * @method     ChildActividad[]|ObjectCollection findByActiRFechaCreacion(string $acti_r_fecha_creacion) Return ChildActividad objects filtered by the acti_r_fecha_creacion column
 * @method     ChildActividad[]|ObjectCollection findByActiRFechaModificacion(string $acti_r_fecha_modificacion) Return ChildActividad objects filtered by the acti_r_fecha_modificacion column
 * @method     ChildActividad[]|ObjectCollection findByActiRUsuario(int $acti_r_usuario) Return ChildActividad objects filtered by the acti_r_usuario column
 * @method     ChildActividad[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ActividadQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ActividadQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Actividad', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildActividadQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildActividadQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildActividadQuery) {
            return $criteria;
        }
        $query = new ChildActividadQuery();
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
     * @return ChildActividad|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ActividadTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ActividadTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildActividad A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT acti_codigo, acti_nombre, acti_imagen, acti_t_actividad, acti_hora, acti_hora_teorica, acti_hora_practica, acti_t_hora, acti_e_actividad, acti_t_modalidad, acti_observacion, acti_vigente, acti_r_fecha_creacion, acti_r_fecha_modificacion, acti_r_usuario FROM actividad WHERE acti_codigo = :p0';
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
            /** @var ChildActividad $obj */
            $obj = new ChildActividad();
            $obj->hydrate($row);
            ActividadTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildActividad|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_CODIGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_CODIGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the acti_codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByActiCodigo(1234); // WHERE acti_codigo = 1234
     * $query->filterByActiCodigo(array(12, 34)); // WHERE acti_codigo IN (12, 34)
     * $query->filterByActiCodigo(array('min' => 12)); // WHERE acti_codigo > 12
     * </code>
     *
     * @param     mixed $actiCodigo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiCodigo($actiCodigo = null, $comparison = null)
    {
        if (is_array($actiCodigo)) {
            $useMinMax = false;
            if (isset($actiCodigo['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_CODIGO, $actiCodigo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiCodigo['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_CODIGO, $actiCodigo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_CODIGO, $actiCodigo, $comparison);
    }

    /**
     * Filter the query on the acti_nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByActiNombre('fooValue');   // WHERE acti_nombre = 'fooValue'
     * $query->filterByActiNombre('%fooValue%', Criteria::LIKE); // WHERE acti_nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actiNombre The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiNombre($actiNombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actiNombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_NOMBRE, $actiNombre, $comparison);
    }

    /**
     * Filter the query on the acti_imagen column
     *
     * Example usage:
     * <code>
     * $query->filterByActiImagen('fooValue');   // WHERE acti_imagen = 'fooValue'
     * $query->filterByActiImagen('%fooValue%', Criteria::LIKE); // WHERE acti_imagen LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actiImagen The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiImagen($actiImagen = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actiImagen)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_IMAGEN, $actiImagen, $comparison);
    }

    /**
     * Filter the query on the acti_t_actividad column
     *
     * Example usage:
     * <code>
     * $query->filterByActiTActividad(1234); // WHERE acti_t_actividad = 1234
     * $query->filterByActiTActividad(array(12, 34)); // WHERE acti_t_actividad IN (12, 34)
     * $query->filterByActiTActividad(array('min' => 12)); // WHERE acti_t_actividad > 12
     * </code>
     *
     * @see       filterByTActividad()
     *
     * @param     mixed $actiTActividad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiTActividad($actiTActividad = null, $comparison = null)
    {
        if (is_array($actiTActividad)) {
            $useMinMax = false;
            if (isset($actiTActividad['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_T_ACTIVIDAD, $actiTActividad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiTActividad['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_T_ACTIVIDAD, $actiTActividad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_T_ACTIVIDAD, $actiTActividad, $comparison);
    }

    /**
     * Filter the query on the acti_hora column
     *
     * Example usage:
     * <code>
     * $query->filterByActiHora(1234); // WHERE acti_hora = 1234
     * $query->filterByActiHora(array(12, 34)); // WHERE acti_hora IN (12, 34)
     * $query->filterByActiHora(array('min' => 12)); // WHERE acti_hora > 12
     * </code>
     *
     * @param     mixed $actiHora The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiHora($actiHora = null, $comparison = null)
    {
        if (is_array($actiHora)) {
            $useMinMax = false;
            if (isset($actiHora['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_HORA, $actiHora['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiHora['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_HORA, $actiHora['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_HORA, $actiHora, $comparison);
    }

    /**
     * Filter the query on the acti_hora_teorica column
     *
     * Example usage:
     * <code>
     * $query->filterByActiHoraTeorica(1234); // WHERE acti_hora_teorica = 1234
     * $query->filterByActiHoraTeorica(array(12, 34)); // WHERE acti_hora_teorica IN (12, 34)
     * $query->filterByActiHoraTeorica(array('min' => 12)); // WHERE acti_hora_teorica > 12
     * </code>
     *
     * @param     mixed $actiHoraTeorica The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiHoraTeorica($actiHoraTeorica = null, $comparison = null)
    {
        if (is_array($actiHoraTeorica)) {
            $useMinMax = false;
            if (isset($actiHoraTeorica['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_HORA_TEORICA, $actiHoraTeorica['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiHoraTeorica['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_HORA_TEORICA, $actiHoraTeorica['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_HORA_TEORICA, $actiHoraTeorica, $comparison);
    }

    /**
     * Filter the query on the acti_hora_practica column
     *
     * Example usage:
     * <code>
     * $query->filterByActiHoraPractica(1234); // WHERE acti_hora_practica = 1234
     * $query->filterByActiHoraPractica(array(12, 34)); // WHERE acti_hora_practica IN (12, 34)
     * $query->filterByActiHoraPractica(array('min' => 12)); // WHERE acti_hora_practica > 12
     * </code>
     *
     * @param     mixed $actiHoraPractica The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiHoraPractica($actiHoraPractica = null, $comparison = null)
    {
        if (is_array($actiHoraPractica)) {
            $useMinMax = false;
            if (isset($actiHoraPractica['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_HORA_PRACTICA, $actiHoraPractica['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiHoraPractica['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_HORA_PRACTICA, $actiHoraPractica['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_HORA_PRACTICA, $actiHoraPractica, $comparison);
    }

    /**
     * Filter the query on the acti_t_hora column
     *
     * Example usage:
     * <code>
     * $query->filterByActiTHora(1234); // WHERE acti_t_hora = 1234
     * $query->filterByActiTHora(array(12, 34)); // WHERE acti_t_hora IN (12, 34)
     * $query->filterByActiTHora(array('min' => 12)); // WHERE acti_t_hora > 12
     * </code>
     *
     * @see       filterByTHora()
     *
     * @param     mixed $actiTHora The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiTHora($actiTHora = null, $comparison = null)
    {
        if (is_array($actiTHora)) {
            $useMinMax = false;
            if (isset($actiTHora['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_T_HORA, $actiTHora['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiTHora['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_T_HORA, $actiTHora['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_T_HORA, $actiTHora, $comparison);
    }

    /**
     * Filter the query on the acti_e_actividad column
     *
     * Example usage:
     * <code>
     * $query->filterByActiEActividad(1234); // WHERE acti_e_actividad = 1234
     * $query->filterByActiEActividad(array(12, 34)); // WHERE acti_e_actividad IN (12, 34)
     * $query->filterByActiEActividad(array('min' => 12)); // WHERE acti_e_actividad > 12
     * </code>
     *
     * @see       filterByEActividad()
     *
     * @param     mixed $actiEActividad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiEActividad($actiEActividad = null, $comparison = null)
    {
        if (is_array($actiEActividad)) {
            $useMinMax = false;
            if (isset($actiEActividad['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_E_ACTIVIDAD, $actiEActividad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiEActividad['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_E_ACTIVIDAD, $actiEActividad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_E_ACTIVIDAD, $actiEActividad, $comparison);
    }

    /**
     * Filter the query on the acti_t_modalidad column
     *
     * Example usage:
     * <code>
     * $query->filterByActiTModalidad(1234); // WHERE acti_t_modalidad = 1234
     * $query->filterByActiTModalidad(array(12, 34)); // WHERE acti_t_modalidad IN (12, 34)
     * $query->filterByActiTModalidad(array('min' => 12)); // WHERE acti_t_modalidad > 12
     * </code>
     *
     * @see       filterByTModalidad()
     *
     * @param     mixed $actiTModalidad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiTModalidad($actiTModalidad = null, $comparison = null)
    {
        if (is_array($actiTModalidad)) {
            $useMinMax = false;
            if (isset($actiTModalidad['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_T_MODALIDAD, $actiTModalidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiTModalidad['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_T_MODALIDAD, $actiTModalidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_T_MODALIDAD, $actiTModalidad, $comparison);
    }

    /**
     * Filter the query on the acti_observacion column
     *
     * Example usage:
     * <code>
     * $query->filterByActiObservacion('fooValue');   // WHERE acti_observacion = 'fooValue'
     * $query->filterByActiObservacion('%fooValue%', Criteria::LIKE); // WHERE acti_observacion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actiObservacion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiObservacion($actiObservacion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actiObservacion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_OBSERVACION, $actiObservacion, $comparison);
    }

    /**
     * Filter the query on the acti_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByActiVigente(1234); // WHERE acti_vigente = 1234
     * $query->filterByActiVigente(array(12, 34)); // WHERE acti_vigente IN (12, 34)
     * $query->filterByActiVigente(array('min' => 12)); // WHERE acti_vigente > 12
     * </code>
     *
     * @param     mixed $actiVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiVigente($actiVigente = null, $comparison = null)
    {
        if (is_array($actiVigente)) {
            $useMinMax = false;
            if (isset($actiVigente['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_VIGENTE, $actiVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiVigente['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_VIGENTE, $actiVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_VIGENTE, $actiVigente, $comparison);
    }

    /**
     * Filter the query on the acti_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByActiRFechaCreacion('2011-03-14'); // WHERE acti_r_fecha_creacion = '2011-03-14'
     * $query->filterByActiRFechaCreacion('now'); // WHERE acti_r_fecha_creacion = '2011-03-14'
     * $query->filterByActiRFechaCreacion(array('max' => 'yesterday')); // WHERE acti_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $actiRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiRFechaCreacion($actiRFechaCreacion = null, $comparison = null)
    {
        if (is_array($actiRFechaCreacion)) {
            $useMinMax = false;
            if (isset($actiRFechaCreacion['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_R_FECHA_CREACION, $actiRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiRFechaCreacion['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_R_FECHA_CREACION, $actiRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_R_FECHA_CREACION, $actiRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the acti_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByActiRFechaModificacion('2011-03-14'); // WHERE acti_r_fecha_modificacion = '2011-03-14'
     * $query->filterByActiRFechaModificacion('now'); // WHERE acti_r_fecha_modificacion = '2011-03-14'
     * $query->filterByActiRFechaModificacion(array('max' => 'yesterday')); // WHERE acti_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $actiRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiRFechaModificacion($actiRFechaModificacion = null, $comparison = null)
    {
        if (is_array($actiRFechaModificacion)) {
            $useMinMax = false;
            if (isset($actiRFechaModificacion['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_R_FECHA_MODIFICACION, $actiRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiRFechaModificacion['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_R_FECHA_MODIFICACION, $actiRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_R_FECHA_MODIFICACION, $actiRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the acti_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByActiRUsuario(1234); // WHERE acti_r_usuario = 1234
     * $query->filterByActiRUsuario(array(12, 34)); // WHERE acti_r_usuario IN (12, 34)
     * $query->filterByActiRUsuario(array('min' => 12)); // WHERE acti_r_usuario > 12
     * </code>
     *
     * @param     mixed $actiRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActiRUsuario($actiRUsuario = null, $comparison = null)
    {
        if (is_array($actiRUsuario)) {
            $useMinMax = false;
            if (isset($actiRUsuario['min'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_R_USUARIO, $actiRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiRUsuario['max'])) {
                $this->addUsingAlias(ActividadTableMap::COL_ACTI_R_USUARIO, $actiRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActividadTableMap::COL_ACTI_R_USUARIO, $actiRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \EActividad object
     *
     * @param \EActividad|ObjectCollection $eActividad The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActividadQuery The current query, for fluid interface
     */
    public function filterByEActividad($eActividad, $comparison = null)
    {
        if ($eActividad instanceof \EActividad) {
            return $this
                ->addUsingAlias(ActividadTableMap::COL_ACTI_E_ACTIVIDAD, $eActividad->getEacEstado(), $comparison);
        } elseif ($eActividad instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActividadTableMap::COL_ACTI_E_ACTIVIDAD, $eActividad->toKeyValue('PrimaryKey', 'EacEstado'), $comparison);
        } else {
            throw new PropelException('filterByEActividad() only accepts arguments of type \EActividad or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EActividad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function joinEActividad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EActividad');

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
            $this->addJoinObject($join, 'EActividad');
        }

        return $this;
    }

    /**
     * Use the EActividad relation EActividad object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EActividadQuery A secondary query class using the current class as primary query
     */
    public function useEActividadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEActividad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EActividad', '\EActividadQuery');
    }

    /**
     * Filter the query by a related \TActividad object
     *
     * @param \TActividad|ObjectCollection $tActividad The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActividadQuery The current query, for fluid interface
     */
    public function filterByTActividad($tActividad, $comparison = null)
    {
        if ($tActividad instanceof \TActividad) {
            return $this
                ->addUsingAlias(ActividadTableMap::COL_ACTI_T_ACTIVIDAD, $tActividad->getTacTipo(), $comparison);
        } elseif ($tActividad instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActividadTableMap::COL_ACTI_T_ACTIVIDAD, $tActividad->toKeyValue('PrimaryKey', 'TacTipo'), $comparison);
        } else {
            throw new PropelException('filterByTActividad() only accepts arguments of type \TActividad or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TActividad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function joinTActividad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TActividad');

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
            $this->addJoinObject($join, 'TActividad');
        }

        return $this;
    }

    /**
     * Use the TActividad relation TActividad object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TActividadQuery A secondary query class using the current class as primary query
     */
    public function useTActividadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTActividad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TActividad', '\TActividadQuery');
    }

    /**
     * Filter the query by a related \THora object
     *
     * @param \THora|ObjectCollection $tHora The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActividadQuery The current query, for fluid interface
     */
    public function filterByTHora($tHora, $comparison = null)
    {
        if ($tHora instanceof \THora) {
            return $this
                ->addUsingAlias(ActividadTableMap::COL_ACTI_T_HORA, $tHora->getThoTipo(), $comparison);
        } elseif ($tHora instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActividadTableMap::COL_ACTI_T_HORA, $tHora->toKeyValue('PrimaryKey', 'ThoTipo'), $comparison);
        } else {
            throw new PropelException('filterByTHora() only accepts arguments of type \THora or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the THora relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function joinTHora($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('THora');

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
            $this->addJoinObject($join, 'THora');
        }

        return $this;
    }

    /**
     * Use the THora relation THora object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \THoraQuery A secondary query class using the current class as primary query
     */
    public function useTHoraQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTHora($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'THora', '\THoraQuery');
    }

    /**
     * Filter the query by a related \TModalidad object
     *
     * @param \TModalidad|ObjectCollection $tModalidad The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActividadQuery The current query, for fluid interface
     */
    public function filterByTModalidad($tModalidad, $comparison = null)
    {
        if ($tModalidad instanceof \TModalidad) {
            return $this
                ->addUsingAlias(ActividadTableMap::COL_ACTI_T_MODALIDAD, $tModalidad->getTmoTipo(), $comparison);
        } elseif ($tModalidad instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActividadTableMap::COL_ACTI_T_MODALIDAD, $tModalidad->toKeyValue('PrimaryKey', 'TmoTipo'), $comparison);
        } else {
            throw new PropelException('filterByTModalidad() only accepts arguments of type \TModalidad or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TModalidad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function joinTModalidad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TModalidad');

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
            $this->addJoinObject($join, 'TModalidad');
        }

        return $this;
    }

    /**
     * Use the TModalidad relation TModalidad object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TModalidadQuery A secondary query class using the current class as primary query
     */
    public function useTModalidadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTModalidad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TModalidad', '\TModalidadQuery');
    }

    /**
     * Filter the query by a related \ActividadCargo object
     *
     * @param \ActividadCargo|ObjectCollection $actividadCargo the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActividadCargo($actividadCargo, $comparison = null)
    {
        if ($actividadCargo instanceof \ActividadCargo) {
            return $this
                ->addUsingAlias(ActividadTableMap::COL_ACTI_CODIGO, $actividadCargo->getAccaCActividad(), $comparison);
        } elseif ($actividadCargo instanceof ObjectCollection) {
            return $this
                ->useActividadCargoQuery()
                ->filterByPrimaryKeys($actividadCargo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActividadCargo() only accepts arguments of type \ActividadCargo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActividadCargo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function joinActividadCargo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActividadCargo');

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
            $this->addJoinObject($join, 'ActividadCargo');
        }

        return $this;
    }

    /**
     * Use the ActividadCargo relation ActividadCargo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ActividadCargoQuery A secondary query class using the current class as primary query
     */
    public function useActividadCargoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActividadCargo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActividadCargo', '\ActividadCargoQuery');
    }

    /**
     * Filter the query by a related \ActividadObjetivo object
     *
     * @param \ActividadObjetivo|ObjectCollection $actividadObjetivo the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildActividadQuery The current query, for fluid interface
     */
    public function filterByActividadObjetivo($actividadObjetivo, $comparison = null)
    {
        if ($actividadObjetivo instanceof \ActividadObjetivo) {
            return $this
                ->addUsingAlias(ActividadTableMap::COL_ACTI_CODIGO, $actividadObjetivo->getAcobCActividad(), $comparison);
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
     * @return $this|ChildActividadQuery The current query, for fluid interface
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
     * Filter the query by a related \Dictacion object
     *
     * @param \Dictacion|ObjectCollection $dictacion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildActividadQuery The current query, for fluid interface
     */
    public function filterByDictacion($dictacion, $comparison = null)
    {
        if ($dictacion instanceof \Dictacion) {
            return $this
                ->addUsingAlias(ActividadTableMap::COL_ACTI_CODIGO, $dictacion->getDictCActividad(), $comparison);
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
     * @return $this|ChildActividadQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildActividad $actividad Object to remove from the list of results
     *
     * @return $this|ChildActividadQuery The current query, for fluid interface
     */
    public function prune($actividad = null)
    {
        if ($actividad) {
            $this->addUsingAlias(ActividadTableMap::COL_ACTI_CODIGO, $actividad->getActiCodigo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the actividad table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ActividadTableMap::clearInstancePool();
            ActividadTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ActividadTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ActividadTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ActividadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ActividadQuery
