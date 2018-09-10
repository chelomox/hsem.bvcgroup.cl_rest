<?php

namespace Base;

use \LoginProfiles as ChildLoginProfiles;
use \LoginProfilesQuery as ChildLoginProfilesQuery;
use \Exception;
use \PDO;
use Map\LoginProfilesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'login_profiles' table.
 *
 *
 *
 * @method     ChildLoginProfilesQuery orderByPId($order = Criteria::ASC) Order by the p_id column
 * @method     ChildLoginProfilesQuery orderByPfieldId($order = Criteria::ASC) Order by the pfield_id column
 * @method     ChildLoginProfilesQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildLoginProfilesQuery orderByProfileValue($order = Criteria::ASC) Order by the profile_value column
 *
 * @method     ChildLoginProfilesQuery groupByPId() Group by the p_id column
 * @method     ChildLoginProfilesQuery groupByPfieldId() Group by the pfield_id column
 * @method     ChildLoginProfilesQuery groupByUserId() Group by the user_id column
 * @method     ChildLoginProfilesQuery groupByProfileValue() Group by the profile_value column
 *
 * @method     ChildLoginProfilesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLoginProfilesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLoginProfilesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLoginProfilesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLoginProfilesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLoginProfilesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLoginProfiles findOne(ConnectionInterface $con = null) Return the first ChildLoginProfiles matching the query
 * @method     ChildLoginProfiles findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLoginProfiles matching the query, or a new ChildLoginProfiles object populated from the query conditions when no match is found
 *
 * @method     ChildLoginProfiles findOneByPId(string $p_id) Return the first ChildLoginProfiles filtered by the p_id column
 * @method     ChildLoginProfiles findOneByPfieldId(int $pfield_id) Return the first ChildLoginProfiles filtered by the pfield_id column
 * @method     ChildLoginProfiles findOneByUserId(string $user_id) Return the first ChildLoginProfiles filtered by the user_id column
 * @method     ChildLoginProfiles findOneByProfileValue(string $profile_value) Return the first ChildLoginProfiles filtered by the profile_value column *

 * @method     ChildLoginProfiles requirePk($key, ConnectionInterface $con = null) Return the ChildLoginProfiles by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginProfiles requireOne(ConnectionInterface $con = null) Return the first ChildLoginProfiles matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLoginProfiles requireOneByPId(string $p_id) Return the first ChildLoginProfiles filtered by the p_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginProfiles requireOneByPfieldId(int $pfield_id) Return the first ChildLoginProfiles filtered by the pfield_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginProfiles requireOneByUserId(string $user_id) Return the first ChildLoginProfiles filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginProfiles requireOneByProfileValue(string $profile_value) Return the first ChildLoginProfiles filtered by the profile_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLoginProfiles[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLoginProfiles objects based on current ModelCriteria
 * @method     ChildLoginProfiles[]|ObjectCollection findByPId(string $p_id) Return ChildLoginProfiles objects filtered by the p_id column
 * @method     ChildLoginProfiles[]|ObjectCollection findByPfieldId(int $pfield_id) Return ChildLoginProfiles objects filtered by the pfield_id column
 * @method     ChildLoginProfiles[]|ObjectCollection findByUserId(string $user_id) Return ChildLoginProfiles objects filtered by the user_id column
 * @method     ChildLoginProfiles[]|ObjectCollection findByProfileValue(string $profile_value) Return ChildLoginProfiles objects filtered by the profile_value column
 * @method     ChildLoginProfiles[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LoginProfilesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LoginProfilesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\LoginProfiles', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLoginProfilesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLoginProfilesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLoginProfilesQuery) {
            return $criteria;
        }
        $query = new ChildLoginProfilesQuery();
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
     * @return ChildLoginProfiles|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LoginProfilesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LoginProfilesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLoginProfiles A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT p_id, pfield_id, user_id, profile_value FROM login_profiles WHERE p_id = :p0';
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
            /** @var ChildLoginProfiles $obj */
            $obj = new ChildLoginProfiles();
            $obj->hydrate($row);
            LoginProfilesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLoginProfiles|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLoginProfilesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LoginProfilesTableMap::COL_P_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLoginProfilesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LoginProfilesTableMap::COL_P_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the p_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPId(1234); // WHERE p_id = 1234
     * $query->filterByPId(array(12, 34)); // WHERE p_id IN (12, 34)
     * $query->filterByPId(array('min' => 12)); // WHERE p_id > 12
     * </code>
     *
     * @param     mixed $pId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginProfilesQuery The current query, for fluid interface
     */
    public function filterByPId($pId = null, $comparison = null)
    {
        if (is_array($pId)) {
            $useMinMax = false;
            if (isset($pId['min'])) {
                $this->addUsingAlias(LoginProfilesTableMap::COL_P_ID, $pId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pId['max'])) {
                $this->addUsingAlias(LoginProfilesTableMap::COL_P_ID, $pId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginProfilesTableMap::COL_P_ID, $pId, $comparison);
    }

    /**
     * Filter the query on the pfield_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPfieldId(1234); // WHERE pfield_id = 1234
     * $query->filterByPfieldId(array(12, 34)); // WHERE pfield_id IN (12, 34)
     * $query->filterByPfieldId(array('min' => 12)); // WHERE pfield_id > 12
     * </code>
     *
     * @param     mixed $pfieldId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginProfilesQuery The current query, for fluid interface
     */
    public function filterByPfieldId($pfieldId = null, $comparison = null)
    {
        if (is_array($pfieldId)) {
            $useMinMax = false;
            if (isset($pfieldId['min'])) {
                $this->addUsingAlias(LoginProfilesTableMap::COL_PFIELD_ID, $pfieldId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pfieldId['max'])) {
                $this->addUsingAlias(LoginProfilesTableMap::COL_PFIELD_ID, $pfieldId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginProfilesTableMap::COL_PFIELD_ID, $pfieldId, $comparison);
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
     * @return $this|ChildLoginProfilesQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(LoginProfilesTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(LoginProfilesTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginProfilesTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the profile_value column
     *
     * Example usage:
     * <code>
     * $query->filterByProfileValue('fooValue');   // WHERE profile_value = 'fooValue'
     * $query->filterByProfileValue('%fooValue%', Criteria::LIKE); // WHERE profile_value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $profileValue The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginProfilesQuery The current query, for fluid interface
     */
    public function filterByProfileValue($profileValue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($profileValue)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginProfilesTableMap::COL_PROFILE_VALUE, $profileValue, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLoginProfiles $loginProfiles Object to remove from the list of results
     *
     * @return $this|ChildLoginProfilesQuery The current query, for fluid interface
     */
    public function prune($loginProfiles = null)
    {
        if ($loginProfiles) {
            $this->addUsingAlias(LoginProfilesTableMap::COL_P_ID, $loginProfiles->getPId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the login_profiles table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LoginProfilesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LoginProfilesTableMap::clearInstancePool();
            LoginProfilesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LoginProfilesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LoginProfilesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LoginProfilesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LoginProfilesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LoginProfilesQuery
