<?php

namespace Base;

use \LoginConfirm as ChildLoginConfirm;
use \LoginConfirmQuery as ChildLoginConfirmQuery;
use \Exception;
use \PDO;
use Map\LoginConfirmTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'login_confirm' table.
 *
 *
 *
 * @method     ChildLoginConfirmQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLoginConfirmQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildLoginConfirmQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildLoginConfirmQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildLoginConfirmQuery orderByKey($order = Criteria::ASC) Order by the key column
 * @method     ChildLoginConfirmQuery orderByType($order = Criteria::ASC) Order by the type column
 *
 * @method     ChildLoginConfirmQuery groupById() Group by the id column
 * @method     ChildLoginConfirmQuery groupByData() Group by the data column
 * @method     ChildLoginConfirmQuery groupByUsername() Group by the username column
 * @method     ChildLoginConfirmQuery groupByEmail() Group by the email column
 * @method     ChildLoginConfirmQuery groupByKey() Group by the key column
 * @method     ChildLoginConfirmQuery groupByType() Group by the type column
 *
 * @method     ChildLoginConfirmQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLoginConfirmQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLoginConfirmQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLoginConfirmQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLoginConfirmQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLoginConfirmQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLoginConfirm findOne(ConnectionInterface $con = null) Return the first ChildLoginConfirm matching the query
 * @method     ChildLoginConfirm findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLoginConfirm matching the query, or a new ChildLoginConfirm object populated from the query conditions when no match is found
 *
 * @method     ChildLoginConfirm findOneById(int $id) Return the first ChildLoginConfirm filtered by the id column
 * @method     ChildLoginConfirm findOneByData(string $data) Return the first ChildLoginConfirm filtered by the data column
 * @method     ChildLoginConfirm findOneByUsername(string $username) Return the first ChildLoginConfirm filtered by the username column
 * @method     ChildLoginConfirm findOneByEmail(string $email) Return the first ChildLoginConfirm filtered by the email column
 * @method     ChildLoginConfirm findOneByKey(string $key) Return the first ChildLoginConfirm filtered by the key column
 * @method     ChildLoginConfirm findOneByType(string $type) Return the first ChildLoginConfirm filtered by the type column *

 * @method     ChildLoginConfirm requirePk($key, ConnectionInterface $con = null) Return the ChildLoginConfirm by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginConfirm requireOne(ConnectionInterface $con = null) Return the first ChildLoginConfirm matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLoginConfirm requireOneById(int $id) Return the first ChildLoginConfirm filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginConfirm requireOneByData(string $data) Return the first ChildLoginConfirm filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginConfirm requireOneByUsername(string $username) Return the first ChildLoginConfirm filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginConfirm requireOneByEmail(string $email) Return the first ChildLoginConfirm filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginConfirm requireOneByKey(string $key) Return the first ChildLoginConfirm filtered by the key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginConfirm requireOneByType(string $type) Return the first ChildLoginConfirm filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLoginConfirm[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLoginConfirm objects based on current ModelCriteria
 * @method     ChildLoginConfirm[]|ObjectCollection findById(int $id) Return ChildLoginConfirm objects filtered by the id column
 * @method     ChildLoginConfirm[]|ObjectCollection findByData(string $data) Return ChildLoginConfirm objects filtered by the data column
 * @method     ChildLoginConfirm[]|ObjectCollection findByUsername(string $username) Return ChildLoginConfirm objects filtered by the username column
 * @method     ChildLoginConfirm[]|ObjectCollection findByEmail(string $email) Return ChildLoginConfirm objects filtered by the email column
 * @method     ChildLoginConfirm[]|ObjectCollection findByKey(string $key) Return ChildLoginConfirm objects filtered by the key column
 * @method     ChildLoginConfirm[]|ObjectCollection findByType(string $type) Return ChildLoginConfirm objects filtered by the type column
 * @method     ChildLoginConfirm[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LoginConfirmQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LoginConfirmQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\LoginConfirm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLoginConfirmQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLoginConfirmQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLoginConfirmQuery) {
            return $criteria;
        }
        $query = new ChildLoginConfirmQuery();
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
     * @return ChildLoginConfirm|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LoginConfirmTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LoginConfirmTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLoginConfirm A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, data, username, email, key, type FROM login_confirm WHERE id = :p0';
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
            /** @var ChildLoginConfirm $obj */
            $obj = new ChildLoginConfirm();
            $obj->hydrate($row);
            LoginConfirmTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLoginConfirm|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLoginConfirmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LoginConfirmTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLoginConfirmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LoginConfirmTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginConfirmQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LoginConfirmTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LoginConfirmTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginConfirmTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByData('fooValue');   // WHERE data = 'fooValue'
     * $query->filterByData('%fooValue%', Criteria::LIKE); // WHERE data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $data The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginConfirmQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($data)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginConfirmTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginConfirmQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginConfirmTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginConfirmQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginConfirmTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the key column
     *
     * Example usage:
     * <code>
     * $query->filterByKey('fooValue');   // WHERE key = 'fooValue'
     * $query->filterByKey('%fooValue%', Criteria::LIKE); // WHERE key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginConfirmQuery The current query, for fluid interface
     */
    public function filterByKey($key = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginConfirmTableMap::COL_KEY, $key, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginConfirmQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginConfirmTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLoginConfirm $loginConfirm Object to remove from the list of results
     *
     * @return $this|ChildLoginConfirmQuery The current query, for fluid interface
     */
    public function prune($loginConfirm = null)
    {
        if ($loginConfirm) {
            $this->addUsingAlias(LoginConfirmTableMap::COL_ID, $loginConfirm->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the login_confirm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LoginConfirmTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LoginConfirmTableMap::clearInstancePool();
            LoginConfirmTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LoginConfirmTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LoginConfirmTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LoginConfirmTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LoginConfirmTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LoginConfirmQuery
