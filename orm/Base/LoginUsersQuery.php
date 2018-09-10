<?php

namespace Base;

use \LoginUsers as ChildLoginUsers;
use \LoginUsersQuery as ChildLoginUsersQuery;
use \Exception;
use \PDO;
use Map\LoginUsersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'login_users' table.
 *
 *
 *
 * @method     ChildLoginUsersQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildLoginUsersQuery orderByUserLevel($order = Criteria::ASC) Order by the user_level column
 * @method     ChildLoginUsersQuery orderByPersonaId($order = Criteria::ASC) Order by the persona_id column
 * @method     ChildLoginUsersQuery orderByRestricted($order = Criteria::ASC) Order by the restricted column
 * @method     ChildLoginUsersQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildLoginUsersQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildLoginUsersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildLoginUsersQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildLoginUsersQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 *
 * @method     ChildLoginUsersQuery groupByUserId() Group by the user_id column
 * @method     ChildLoginUsersQuery groupByUserLevel() Group by the user_level column
 * @method     ChildLoginUsersQuery groupByPersonaId() Group by the persona_id column
 * @method     ChildLoginUsersQuery groupByRestricted() Group by the restricted column
 * @method     ChildLoginUsersQuery groupByUsername() Group by the username column
 * @method     ChildLoginUsersQuery groupByName() Group by the name column
 * @method     ChildLoginUsersQuery groupByEmail() Group by the email column
 * @method     ChildLoginUsersQuery groupByPassword() Group by the password column
 * @method     ChildLoginUsersQuery groupByTimestamp() Group by the timestamp column
 *
 * @method     ChildLoginUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLoginUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLoginUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLoginUsersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLoginUsersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLoginUsersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLoginUsers findOne(ConnectionInterface $con = null) Return the first ChildLoginUsers matching the query
 * @method     ChildLoginUsers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLoginUsers matching the query, or a new ChildLoginUsers object populated from the query conditions when no match is found
 *
 * @method     ChildLoginUsers findOneByUserId(int $user_id) Return the first ChildLoginUsers filtered by the user_id column
 * @method     ChildLoginUsers findOneByUserLevel(string $user_level) Return the first ChildLoginUsers filtered by the user_level column
 * @method     ChildLoginUsers findOneByPersonaId(int $persona_id) Return the first ChildLoginUsers filtered by the persona_id column
 * @method     ChildLoginUsers findOneByRestricted(int $restricted) Return the first ChildLoginUsers filtered by the restricted column
 * @method     ChildLoginUsers findOneByUsername(string $username) Return the first ChildLoginUsers filtered by the username column
 * @method     ChildLoginUsers findOneByName(string $name) Return the first ChildLoginUsers filtered by the name column
 * @method     ChildLoginUsers findOneByEmail(string $email) Return the first ChildLoginUsers filtered by the email column
 * @method     ChildLoginUsers findOneByPassword(string $password) Return the first ChildLoginUsers filtered by the password column
 * @method     ChildLoginUsers findOneByTimestamp(string $timestamp) Return the first ChildLoginUsers filtered by the timestamp column *

 * @method     ChildLoginUsers requirePk($key, ConnectionInterface $con = null) Return the ChildLoginUsers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginUsers requireOne(ConnectionInterface $con = null) Return the first ChildLoginUsers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLoginUsers requireOneByUserId(int $user_id) Return the first ChildLoginUsers filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginUsers requireOneByUserLevel(string $user_level) Return the first ChildLoginUsers filtered by the user_level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginUsers requireOneByPersonaId(int $persona_id) Return the first ChildLoginUsers filtered by the persona_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginUsers requireOneByRestricted(int $restricted) Return the first ChildLoginUsers filtered by the restricted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginUsers requireOneByUsername(string $username) Return the first ChildLoginUsers filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginUsers requireOneByName(string $name) Return the first ChildLoginUsers filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginUsers requireOneByEmail(string $email) Return the first ChildLoginUsers filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginUsers requireOneByPassword(string $password) Return the first ChildLoginUsers filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginUsers requireOneByTimestamp(string $timestamp) Return the first ChildLoginUsers filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLoginUsers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLoginUsers objects based on current ModelCriteria
 * @method     ChildLoginUsers[]|ObjectCollection findByUserId(int $user_id) Return ChildLoginUsers objects filtered by the user_id column
 * @method     ChildLoginUsers[]|ObjectCollection findByUserLevel(string $user_level) Return ChildLoginUsers objects filtered by the user_level column
 * @method     ChildLoginUsers[]|ObjectCollection findByPersonaId(int $persona_id) Return ChildLoginUsers objects filtered by the persona_id column
 * @method     ChildLoginUsers[]|ObjectCollection findByRestricted(int $restricted) Return ChildLoginUsers objects filtered by the restricted column
 * @method     ChildLoginUsers[]|ObjectCollection findByUsername(string $username) Return ChildLoginUsers objects filtered by the username column
 * @method     ChildLoginUsers[]|ObjectCollection findByName(string $name) Return ChildLoginUsers objects filtered by the name column
 * @method     ChildLoginUsers[]|ObjectCollection findByEmail(string $email) Return ChildLoginUsers objects filtered by the email column
 * @method     ChildLoginUsers[]|ObjectCollection findByPassword(string $password) Return ChildLoginUsers objects filtered by the password column
 * @method     ChildLoginUsers[]|ObjectCollection findByTimestamp(string $timestamp) Return ChildLoginUsers objects filtered by the timestamp column
 * @method     ChildLoginUsers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LoginUsersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LoginUsersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\LoginUsers', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLoginUsersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLoginUsersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLoginUsersQuery) {
            return $criteria;
        }
        $query = new ChildLoginUsersQuery();
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
     * @return ChildLoginUsers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LoginUsersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LoginUsersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLoginUsers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT user_id, user_level, persona_id, restricted, username, name, email, password, timestamp FROM login_users WHERE user_id = :p0';
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
            /** @var ChildLoginUsers $obj */
            $obj = new ChildLoginUsers();
            $obj->hydrate($row);
            LoginUsersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLoginUsers|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LoginUsersTableMap::COL_USER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LoginUsersTableMap::COL_USER_ID, $keys, Criteria::IN);
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
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(LoginUsersTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(LoginUsersTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginUsersTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the user_level column
     *
     * Example usage:
     * <code>
     * $query->filterByUserLevel('fooValue');   // WHERE user_level = 'fooValue'
     * $query->filterByUserLevel('%fooValue%', Criteria::LIKE); // WHERE user_level LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userLevel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function filterByUserLevel($userLevel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userLevel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginUsersTableMap::COL_USER_LEVEL, $userLevel, $comparison);
    }

    /**
     * Filter the query on the persona_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonaId(1234); // WHERE persona_id = 1234
     * $query->filterByPersonaId(array(12, 34)); // WHERE persona_id IN (12, 34)
     * $query->filterByPersonaId(array('min' => 12)); // WHERE persona_id > 12
     * </code>
     *
     * @param     mixed $personaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function filterByPersonaId($personaId = null, $comparison = null)
    {
        if (is_array($personaId)) {
            $useMinMax = false;
            if (isset($personaId['min'])) {
                $this->addUsingAlias(LoginUsersTableMap::COL_PERSONA_ID, $personaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personaId['max'])) {
                $this->addUsingAlias(LoginUsersTableMap::COL_PERSONA_ID, $personaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginUsersTableMap::COL_PERSONA_ID, $personaId, $comparison);
    }

    /**
     * Filter the query on the restricted column
     *
     * Example usage:
     * <code>
     * $query->filterByRestricted(1234); // WHERE restricted = 1234
     * $query->filterByRestricted(array(12, 34)); // WHERE restricted IN (12, 34)
     * $query->filterByRestricted(array('min' => 12)); // WHERE restricted > 12
     * </code>
     *
     * @param     mixed $restricted The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function filterByRestricted($restricted = null, $comparison = null)
    {
        if (is_array($restricted)) {
            $useMinMax = false;
            if (isset($restricted['min'])) {
                $this->addUsingAlias(LoginUsersTableMap::COL_RESTRICTED, $restricted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($restricted['max'])) {
                $this->addUsingAlias(LoginUsersTableMap::COL_RESTRICTED, $restricted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginUsersTableMap::COL_RESTRICTED, $restricted, $comparison);
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
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginUsersTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginUsersTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginUsersTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginUsersTableMap::COL_PASSWORD, $password, $comparison);
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
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(LoginUsersTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(LoginUsersTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginUsersTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLoginUsers $loginUsers Object to remove from the list of results
     *
     * @return $this|ChildLoginUsersQuery The current query, for fluid interface
     */
    public function prune($loginUsers = null)
    {
        if ($loginUsers) {
            $this->addUsingAlias(LoginUsersTableMap::COL_USER_ID, $loginUsers->getUserId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the login_users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LoginUsersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LoginUsersTableMap::clearInstancePool();
            LoginUsersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LoginUsersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LoginUsersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LoginUsersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LoginUsersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LoginUsersQuery
