<?php

namespace Base;

use \LoginIntegration as ChildLoginIntegration;
use \LoginIntegrationQuery as ChildLoginIntegrationQuery;
use \Exception;
use \PDO;
use Map\LoginIntegrationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'login_integration' table.
 *
 *
 *
 * @method     ChildLoginIntegrationQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildLoginIntegrationQuery orderByFacebook($order = Criteria::ASC) Order by the facebook column
 * @method     ChildLoginIntegrationQuery orderByTwitter($order = Criteria::ASC) Order by the twitter column
 * @method     ChildLoginIntegrationQuery orderByGoogle($order = Criteria::ASC) Order by the google column
 * @method     ChildLoginIntegrationQuery orderByYahoo($order = Criteria::ASC) Order by the yahoo column
 * @method     ChildLoginIntegrationQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildLoginIntegrationQuery groupByUserId() Group by the user_id column
 * @method     ChildLoginIntegrationQuery groupByFacebook() Group by the facebook column
 * @method     ChildLoginIntegrationQuery groupByTwitter() Group by the twitter column
 * @method     ChildLoginIntegrationQuery groupByGoogle() Group by the google column
 * @method     ChildLoginIntegrationQuery groupByYahoo() Group by the yahoo column
 * @method     ChildLoginIntegrationQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildLoginIntegrationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLoginIntegrationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLoginIntegrationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLoginIntegrationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLoginIntegrationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLoginIntegrationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLoginIntegration findOne(ConnectionInterface $con = null) Return the first ChildLoginIntegration matching the query
 * @method     ChildLoginIntegration findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLoginIntegration matching the query, or a new ChildLoginIntegration object populated from the query conditions when no match is found
 *
 * @method     ChildLoginIntegration findOneByUserId(int $user_id) Return the first ChildLoginIntegration filtered by the user_id column
 * @method     ChildLoginIntegration findOneByFacebook(string $facebook) Return the first ChildLoginIntegration filtered by the facebook column
 * @method     ChildLoginIntegration findOneByTwitter(string $twitter) Return the first ChildLoginIntegration filtered by the twitter column
 * @method     ChildLoginIntegration findOneByGoogle(string $google) Return the first ChildLoginIntegration filtered by the google column
 * @method     ChildLoginIntegration findOneByYahoo(string $yahoo) Return the first ChildLoginIntegration filtered by the yahoo column
 * @method     ChildLoginIntegration findOneByTimestamp(string $timestamp) Return the first ChildLoginIntegration filtered by the timestamp column *

 * @method     ChildLoginIntegration requirePk($key, ConnectionInterface $con = null) Return the ChildLoginIntegration by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginIntegration requireOne(ConnectionInterface $con = null) Return the first ChildLoginIntegration matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLoginIntegration requireOneByUserId(int $user_id) Return the first ChildLoginIntegration filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginIntegration requireOneByFacebook(string $facebook) Return the first ChildLoginIntegration filtered by the facebook column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginIntegration requireOneByTwitter(string $twitter) Return the first ChildLoginIntegration filtered by the twitter column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginIntegration requireOneByGoogle(string $google) Return the first ChildLoginIntegration filtered by the google column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginIntegration requireOneByYahoo(string $yahoo) Return the first ChildLoginIntegration filtered by the yahoo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginIntegration requireOneByTimestamp(string $timestamp) Return the first ChildLoginIntegration filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLoginIntegration[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLoginIntegration objects based on current ModelCriteria
 * @method     ChildLoginIntegration[]|ObjectCollection findByUserId(int $user_id) Return ChildLoginIntegration objects filtered by the user_id column
 * @method     ChildLoginIntegration[]|ObjectCollection findByFacebook(string $facebook) Return ChildLoginIntegration objects filtered by the facebook column
 * @method     ChildLoginIntegration[]|ObjectCollection findByTwitter(string $twitter) Return ChildLoginIntegration objects filtered by the twitter column
 * @method     ChildLoginIntegration[]|ObjectCollection findByGoogle(string $google) Return ChildLoginIntegration objects filtered by the google column
 * @method     ChildLoginIntegration[]|ObjectCollection findByYahoo(string $yahoo) Return ChildLoginIntegration objects filtered by the yahoo column
 * @method     ChildLoginIntegration[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildLoginIntegration objects filtered by the timestamp column
 * @method     ChildLoginIntegration[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LoginIntegrationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LoginIntegrationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\LoginIntegration', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLoginIntegrationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLoginIntegrationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLoginIntegrationQuery) {
            return $criteria;
        }
        $query = new ChildLoginIntegrationQuery();
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
     * @return ChildLoginIntegration|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LoginIntegrationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LoginIntegrationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLoginIntegration A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT user_id, facebook, twitter, google, yahoo, timestamp FROM login_integration WHERE user_id = :p0';
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
            /** @var ChildLoginIntegration $obj */
            $obj = new ChildLoginIntegration();
            $obj->hydrate($row);
            LoginIntegrationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLoginIntegration|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLoginIntegrationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LoginIntegrationTableMap::COL_USER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLoginIntegrationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LoginIntegrationTableMap::COL_USER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginIntegrationQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(LoginIntegrationTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(LoginIntegrationTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginIntegrationTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the facebook column
     *
     * Example usage:
     * <code>
     * $query->filterByFacebook('fooValue');   // WHERE facebook = 'fooValue'
     * $query->filterByFacebook('%fooValue%', Criteria::LIKE); // WHERE facebook LIKE '%fooValue%'
     * </code>
     *
     * @param     string $facebook The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginIntegrationQuery The current query, for fluid interface
     */
    public function filterByFacebook($facebook = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($facebook)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginIntegrationTableMap::COL_FACEBOOK, $facebook, $comparison);
    }

    /**
     * Filter the query on the twitter column
     *
     * Example usage:
     * <code>
     * $query->filterByTwitter('fooValue');   // WHERE twitter = 'fooValue'
     * $query->filterByTwitter('%fooValue%', Criteria::LIKE); // WHERE twitter LIKE '%fooValue%'
     * </code>
     *
     * @param     string $twitter The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginIntegrationQuery The current query, for fluid interface
     */
    public function filterByTwitter($twitter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($twitter)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginIntegrationTableMap::COL_TWITTER, $twitter, $comparison);
    }

    /**
     * Filter the query on the google column
     *
     * Example usage:
     * <code>
     * $query->filterByGoogle('fooValue');   // WHERE google = 'fooValue'
     * $query->filterByGoogle('%fooValue%', Criteria::LIKE); // WHERE google LIKE '%fooValue%'
     * </code>
     *
     * @param     string $google The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginIntegrationQuery The current query, for fluid interface
     */
    public function filterByGoogle($google = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($google)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginIntegrationTableMap::COL_GOOGLE, $google, $comparison);
    }

    /**
     * Filter the query on the yahoo column
     *
     * Example usage:
     * <code>
     * $query->filterByYahoo('fooValue');   // WHERE yahoo = 'fooValue'
     * $query->filterByYahoo('%fooValue%', Criteria::LIKE); // WHERE yahoo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $yahoo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginIntegrationQuery The current query, for fluid interface
     */
    public function filterByYahoo($yahoo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($yahoo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginIntegrationTableMap::COL_YAHOO, $yahoo, $comparison);
    }

    /**
     * Filter the query on the timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByTimestamp('2011-03-14'); // WHERE timestamp = '2011-03-14'
     * $query->filterByTimestamp('now'); // WHERE timestamp = '2011-03-14'
     * $query->filterByTimestamp(array('max' => 'yesterday')); // WHERE timestamp > '2011-03-13'
     * </code>
     *
     * @param     mixed $timestamp The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginIntegrationQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(LoginIntegrationTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(LoginIntegrationTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginIntegrationTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLoginIntegration $loginIntegration Object to remove from the list of results
     *
     * @return $this|ChildLoginIntegrationQuery The current query, for fluid interface
     */
    public function prune($loginIntegration = null)
    {
        if ($loginIntegration) {
            $this->addUsingAlias(LoginIntegrationTableMap::COL_USER_ID, $loginIntegration->getUserId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the login_integration table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LoginIntegrationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LoginIntegrationTableMap::clearInstancePool();
            LoginIntegrationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LoginIntegrationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LoginIntegrationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LoginIntegrationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LoginIntegrationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LoginIntegrationQuery
