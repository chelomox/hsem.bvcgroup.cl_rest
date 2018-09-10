<?php

namespace Base;

use \TRelacionFaena as ChildTRelacionFaena;
use \TRelacionFaenaQuery as ChildTRelacionFaenaQuery;
use \Exception;
use \PDO;
use Map\TRelacionFaenaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_relacion_faena' table.
 *
 *
 *
 * @method     ChildTRelacionFaenaQuery orderByTrefaTipo($order = Criteria::ASC) Order by the trefa_tipo column
 * @method     ChildTRelacionFaenaQuery orderByTrefaSigla($order = Criteria::ASC) Order by the trefa_sigla column
 * @method     ChildTRelacionFaenaQuery orderByTrefaDescripcion($order = Criteria::ASC) Order by the trefa_descripcion column
 * @method     ChildTRelacionFaenaQuery orderByTrefaVigente($order = Criteria::ASC) Order by the trefa_vigente column
 * @method     ChildTRelacionFaenaQuery orderByTrefaRFechaCreacion($order = Criteria::ASC) Order by the trefa_r_fecha_creacion column
 * @method     ChildTRelacionFaenaQuery orderByTrefaRFechaModificacion($order = Criteria::ASC) Order by the trefa_r_fecha_modificacion column
 * @method     ChildTRelacionFaenaQuery orderByTrefaRUsuario($order = Criteria::ASC) Order by the trefa_r_usuario column
 *
 * @method     ChildTRelacionFaenaQuery groupByTrefaTipo() Group by the trefa_tipo column
 * @method     ChildTRelacionFaenaQuery groupByTrefaSigla() Group by the trefa_sigla column
 * @method     ChildTRelacionFaenaQuery groupByTrefaDescripcion() Group by the trefa_descripcion column
 * @method     ChildTRelacionFaenaQuery groupByTrefaVigente() Group by the trefa_vigente column
 * @method     ChildTRelacionFaenaQuery groupByTrefaRFechaCreacion() Group by the trefa_r_fecha_creacion column
 * @method     ChildTRelacionFaenaQuery groupByTrefaRFechaModificacion() Group by the trefa_r_fecha_modificacion column
 * @method     ChildTRelacionFaenaQuery groupByTrefaRUsuario() Group by the trefa_r_usuario column
 *
 * @method     ChildTRelacionFaenaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTRelacionFaenaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTRelacionFaenaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTRelacionFaenaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTRelacionFaenaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTRelacionFaenaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTRelacionFaenaQuery leftJoinCargo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cargo relation
 * @method     ChildTRelacionFaenaQuery rightJoinCargo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cargo relation
 * @method     ChildTRelacionFaenaQuery innerJoinCargo($relationAlias = null) Adds a INNER JOIN clause to the query using the Cargo relation
 *
 * @method     ChildTRelacionFaenaQuery joinWithCargo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cargo relation
 *
 * @method     ChildTRelacionFaenaQuery leftJoinWithCargo() Adds a LEFT JOIN clause and with to the query using the Cargo relation
 * @method     ChildTRelacionFaenaQuery rightJoinWithCargo() Adds a RIGHT JOIN clause and with to the query using the Cargo relation
 * @method     ChildTRelacionFaenaQuery innerJoinWithCargo() Adds a INNER JOIN clause and with to the query using the Cargo relation
 *
 * @method     \CargoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTRelacionFaena findOne(ConnectionInterface $con = null) Return the first ChildTRelacionFaena matching the query
 * @method     ChildTRelacionFaena findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTRelacionFaena matching the query, or a new ChildTRelacionFaena object populated from the query conditions when no match is found
 *
 * @method     ChildTRelacionFaena findOneByTrefaTipo(int $trefa_tipo) Return the first ChildTRelacionFaena filtered by the trefa_tipo column
 * @method     ChildTRelacionFaena findOneByTrefaSigla(string $trefa_sigla) Return the first ChildTRelacionFaena filtered by the trefa_sigla column
 * @method     ChildTRelacionFaena findOneByTrefaDescripcion(string $trefa_descripcion) Return the first ChildTRelacionFaena filtered by the trefa_descripcion column
 * @method     ChildTRelacionFaena findOneByTrefaVigente(int $trefa_vigente) Return the first ChildTRelacionFaena filtered by the trefa_vigente column
 * @method     ChildTRelacionFaena findOneByTrefaRFechaCreacion(string $trefa_r_fecha_creacion) Return the first ChildTRelacionFaena filtered by the trefa_r_fecha_creacion column
 * @method     ChildTRelacionFaena findOneByTrefaRFechaModificacion(string $trefa_r_fecha_modificacion) Return the first ChildTRelacionFaena filtered by the trefa_r_fecha_modificacion column
 * @method     ChildTRelacionFaena findOneByTrefaRUsuario(int $trefa_r_usuario) Return the first ChildTRelacionFaena filtered by the trefa_r_usuario column *

 * @method     ChildTRelacionFaena requirePk($key, ConnectionInterface $con = null) Return the ChildTRelacionFaena by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTRelacionFaena requireOne(ConnectionInterface $con = null) Return the first ChildTRelacionFaena matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTRelacionFaena requireOneByTrefaTipo(int $trefa_tipo) Return the first ChildTRelacionFaena filtered by the trefa_tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTRelacionFaena requireOneByTrefaSigla(string $trefa_sigla) Return the first ChildTRelacionFaena filtered by the trefa_sigla column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTRelacionFaena requireOneByTrefaDescripcion(string $trefa_descripcion) Return the first ChildTRelacionFaena filtered by the trefa_descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTRelacionFaena requireOneByTrefaVigente(int $trefa_vigente) Return the first ChildTRelacionFaena filtered by the trefa_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTRelacionFaena requireOneByTrefaRFechaCreacion(string $trefa_r_fecha_creacion) Return the first ChildTRelacionFaena filtered by the trefa_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTRelacionFaena requireOneByTrefaRFechaModificacion(string $trefa_r_fecha_modificacion) Return the first ChildTRelacionFaena filtered by the trefa_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTRelacionFaena requireOneByTrefaRUsuario(int $trefa_r_usuario) Return the first ChildTRelacionFaena filtered by the trefa_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTRelacionFaena[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTRelacionFaena objects based on current ModelCriteria
 * @method     ChildTRelacionFaena[]|ObjectCollection findByTrefaTipo(int $trefa_tipo) Return ChildTRelacionFaena objects filtered by the trefa_tipo column
 * @method     ChildTRelacionFaena[]|ObjectCollection findByTrefaSigla(string $trefa_sigla) Return ChildTRelacionFaena objects filtered by the trefa_sigla column
 * @method     ChildTRelacionFaena[]|ObjectCollection findByTrefaDescripcion(string $trefa_descripcion) Return ChildTRelacionFaena objects filtered by the trefa_descripcion column
 * @method     ChildTRelacionFaena[]|ObjectCollection findByTrefaVigente(int $trefa_vigente) Return ChildTRelacionFaena objects filtered by the trefa_vigente column
 * @method     ChildTRelacionFaena[]|ObjectCollection findByTrefaRFechaCreacion(string $trefa_r_fecha_creacion) Return ChildTRelacionFaena objects filtered by the trefa_r_fecha_creacion column
 * @method     ChildTRelacionFaena[]|ObjectCollection findByTrefaRFechaModificacion(string $trefa_r_fecha_modificacion) Return ChildTRelacionFaena objects filtered by the trefa_r_fecha_modificacion column
 * @method     ChildTRelacionFaena[]|ObjectCollection findByTrefaRUsuario(int $trefa_r_usuario) Return ChildTRelacionFaena objects filtered by the trefa_r_usuario column
 * @method     ChildTRelacionFaena[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TRelacionFaenaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TRelacionFaenaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TRelacionFaena', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTRelacionFaenaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTRelacionFaenaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTRelacionFaenaQuery) {
            return $criteria;
        }
        $query = new ChildTRelacionFaenaQuery();
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
     * @return ChildTRelacionFaena|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TRelacionFaenaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TRelacionFaenaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTRelacionFaena A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT trefa_tipo, trefa_sigla, trefa_descripcion, trefa_vigente, trefa_r_fecha_creacion, trefa_r_fecha_modificacion, trefa_r_usuario FROM t_relacion_faena WHERE trefa_tipo = :p0';
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
            /** @var ChildTRelacionFaena $obj */
            $obj = new ChildTRelacionFaena();
            $obj->hydrate($row);
            TRelacionFaenaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTRelacionFaena|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_TIPO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_TIPO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the trefa_tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTrefaTipo(1234); // WHERE trefa_tipo = 1234
     * $query->filterByTrefaTipo(array(12, 34)); // WHERE trefa_tipo IN (12, 34)
     * $query->filterByTrefaTipo(array('min' => 12)); // WHERE trefa_tipo > 12
     * </code>
     *
     * @param     mixed $trefaTipo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function filterByTrefaTipo($trefaTipo = null, $comparison = null)
    {
        if (is_array($trefaTipo)) {
            $useMinMax = false;
            if (isset($trefaTipo['min'])) {
                $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_TIPO, $trefaTipo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trefaTipo['max'])) {
                $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_TIPO, $trefaTipo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_TIPO, $trefaTipo, $comparison);
    }

    /**
     * Filter the query on the trefa_sigla column
     *
     * Example usage:
     * <code>
     * $query->filterByTrefaSigla('fooValue');   // WHERE trefa_sigla = 'fooValue'
     * $query->filterByTrefaSigla('%fooValue%', Criteria::LIKE); // WHERE trefa_sigla LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trefaSigla The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function filterByTrefaSigla($trefaSigla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trefaSigla)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_SIGLA, $trefaSigla, $comparison);
    }

    /**
     * Filter the query on the trefa_descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByTrefaDescripcion('fooValue');   // WHERE trefa_descripcion = 'fooValue'
     * $query->filterByTrefaDescripcion('%fooValue%', Criteria::LIKE); // WHERE trefa_descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trefaDescripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function filterByTrefaDescripcion($trefaDescripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trefaDescripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_DESCRIPCION, $trefaDescripcion, $comparison);
    }

    /**
     * Filter the query on the trefa_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByTrefaVigente(1234); // WHERE trefa_vigente = 1234
     * $query->filterByTrefaVigente(array(12, 34)); // WHERE trefa_vigente IN (12, 34)
     * $query->filterByTrefaVigente(array('min' => 12)); // WHERE trefa_vigente > 12
     * </code>
     *
     * @param     mixed $trefaVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function filterByTrefaVigente($trefaVigente = null, $comparison = null)
    {
        if (is_array($trefaVigente)) {
            $useMinMax = false;
            if (isset($trefaVigente['min'])) {
                $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_VIGENTE, $trefaVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trefaVigente['max'])) {
                $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_VIGENTE, $trefaVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_VIGENTE, $trefaVigente, $comparison);
    }

    /**
     * Filter the query on the trefa_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTrefaRFechaCreacion('2011-03-14'); // WHERE trefa_r_fecha_creacion = '2011-03-14'
     * $query->filterByTrefaRFechaCreacion('now'); // WHERE trefa_r_fecha_creacion = '2011-03-14'
     * $query->filterByTrefaRFechaCreacion(array('max' => 'yesterday')); // WHERE trefa_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $trefaRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function filterByTrefaRFechaCreacion($trefaRFechaCreacion = null, $comparison = null)
    {
        if (is_array($trefaRFechaCreacion)) {
            $useMinMax = false;
            if (isset($trefaRFechaCreacion['min'])) {
                $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_R_FECHA_CREACION, $trefaRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trefaRFechaCreacion['max'])) {
                $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_R_FECHA_CREACION, $trefaRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_R_FECHA_CREACION, $trefaRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the trefa_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByTrefaRFechaModificacion('2011-03-14'); // WHERE trefa_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTrefaRFechaModificacion('now'); // WHERE trefa_r_fecha_modificacion = '2011-03-14'
     * $query->filterByTrefaRFechaModificacion(array('max' => 'yesterday')); // WHERE trefa_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $trefaRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function filterByTrefaRFechaModificacion($trefaRFechaModificacion = null, $comparison = null)
    {
        if (is_array($trefaRFechaModificacion)) {
            $useMinMax = false;
            if (isset($trefaRFechaModificacion['min'])) {
                $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_R_FECHA_MODIFICACION, $trefaRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trefaRFechaModificacion['max'])) {
                $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_R_FECHA_MODIFICACION, $trefaRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_R_FECHA_MODIFICACION, $trefaRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the trefa_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByTrefaRUsuario(1234); // WHERE trefa_r_usuario = 1234
     * $query->filterByTrefaRUsuario(array(12, 34)); // WHERE trefa_r_usuario IN (12, 34)
     * $query->filterByTrefaRUsuario(array('min' => 12)); // WHERE trefa_r_usuario > 12
     * </code>
     *
     * @param     mixed $trefaRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function filterByTrefaRUsuario($trefaRUsuario = null, $comparison = null)
    {
        if (is_array($trefaRUsuario)) {
            $useMinMax = false;
            if (isset($trefaRUsuario['min'])) {
                $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_R_USUARIO, $trefaRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trefaRUsuario['max'])) {
                $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_R_USUARIO, $trefaRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_R_USUARIO, $trefaRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Cargo object
     *
     * @param \Cargo|ObjectCollection $cargo the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function filterByCargo($cargo, $comparison = null)
    {
        if ($cargo instanceof \Cargo) {
            return $this
                ->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_TIPO, $cargo->getCargTRelacionFaena(), $comparison);
        } elseif ($cargo instanceof ObjectCollection) {
            return $this
                ->useCargoQuery()
                ->filterByPrimaryKeys($cargo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCargo() only accepts arguments of type \Cargo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cargo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function joinCargo($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cargo');

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
            $this->addJoinObject($join, 'Cargo');
        }

        return $this;
    }

    /**
     * Use the Cargo relation Cargo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CargoQuery A secondary query class using the current class as primary query
     */
    public function useCargoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCargo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cargo', '\CargoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTRelacionFaena $tRelacionFaena Object to remove from the list of results
     *
     * @return $this|ChildTRelacionFaenaQuery The current query, for fluid interface
     */
    public function prune($tRelacionFaena = null)
    {
        if ($tRelacionFaena) {
            $this->addUsingAlias(TRelacionFaenaTableMap::COL_TREFA_TIPO, $tRelacionFaena->getTrefaTipo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_relacion_faena table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TRelacionFaenaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TRelacionFaenaTableMap::clearInstancePool();
            TRelacionFaenaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TRelacionFaenaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TRelacionFaenaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TRelacionFaenaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TRelacionFaenaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TRelacionFaenaQuery
