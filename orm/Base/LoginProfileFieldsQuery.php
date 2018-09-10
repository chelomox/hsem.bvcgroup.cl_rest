<?php

namespace Base;

use \LoginProfileFields as ChildLoginProfileFields;
use \LoginProfileFieldsQuery as ChildLoginProfileFieldsQuery;
use \Exception;
use \PDO;
use Map\LoginProfileFieldsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'login_profile_fields' table.
 *
 *
 *
 * @method     ChildLoginProfileFieldsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLoginProfileFieldsQuery orderBySection($order = Criteria::ASC) Order by the section column
 * @method     ChildLoginProfileFieldsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildLoginProfileFieldsQuery orderByLabel($order = Criteria::ASC) Order by the label column
 * @method     ChildLoginProfileFieldsQuery orderByPublic($order = Criteria::ASC) Order by the public column
 * @method     ChildLoginProfileFieldsQuery orderBySignup($order = Criteria::ASC) Order by the signup column
 *
 * @method     ChildLoginProfileFieldsQuery groupById() Group by the id column
 * @method     ChildLoginProfileFieldsQuery groupBySection() Group by the section column
 * @method     ChildLoginProfileFieldsQuery groupByType() Group by the type column
 * @method     ChildLoginProfileFieldsQuery groupByLabel() Group by the label column
 * @method     ChildLoginProfileFieldsQuery groupByPublic() Group by the public column
 * @method     ChildLoginProfileFieldsQuery groupBySignup() Group by the signup column
 *
 * @method     ChildLoginProfileFieldsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLoginProfileFieldsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLoginProfileFieldsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLoginProfileFieldsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLoginProfileFieldsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLoginProfileFieldsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLoginProfileFields findOne(ConnectionInterface $con = null) Return the first ChildLoginProfileFields matching the query
 * @method     ChildLoginProfileFields findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLoginProfileFields matching the query, or a new ChildLoginProfileFields object populated from the query conditions when no match is found
 *
 * @method     ChildLoginProfileFields findOneById(int $id) Return the first ChildLoginProfileFields filtered by the id column
 * @method     ChildLoginProfileFields findOneBySection(string $section) Return the first ChildLoginProfileFields filtered by the section column
 * @method     ChildLoginProfileFields findOneByType(string $type) Return the first ChildLoginProfileFields filtered by the type column
 * @method     ChildLoginProfileFields findOneByLabel(string $label) Return the first ChildLoginProfileFields filtered by the label column
 * @method     ChildLoginProfileFields findOneByPublic(int $public) Return the first ChildLoginProfileFields filtered by the public column
 * @method     ChildLoginProfileFields findOneBySignup(string $signup) Return the first ChildLoginProfileFields filtered by the signup column *

 * @method     ChildLoginProfileFields requirePk($key, ConnectionInterface $con = null) Return the ChildLoginProfileFields by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginProfileFields requireOne(ConnectionInterface $con = null) Return the first ChildLoginProfileFields matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLoginProfileFields requireOneById(int $id) Return the first ChildLoginProfileFields filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginProfileFields requireOneBySection(string $section) Return the first ChildLoginProfileFields filtered by the section column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginProfileFields requireOneByType(string $type) Return the first ChildLoginProfileFields filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginProfileFields requireOneByLabel(string $label) Return the first ChildLoginProfileFields filtered by the label column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginProfileFields requireOneByPublic(int $public) Return the first ChildLoginProfileFields filtered by the public column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLoginProfileFields requireOneBySignup(string $signup) Return the first ChildLoginProfileFields filtered by the signup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLoginProfileFields[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLoginProfileFields objects based on current ModelCriteria
 * @method     ChildLoginProfileFields[]|ObjectCollection findById(int $id) Return ChildLoginProfileFields objects filtered by the id column
 * @method     ChildLoginProfileFields[]|ObjectCollection findBySection(string $section) Return ChildLoginProfileFields objects filtered by the section column
 * @method     ChildLoginProfileFields[]|ObjectCollection findByType(string $type) Return ChildLoginProfileFields objects filtered by the type column
 * @method     ChildLoginProfileFields[]|ObjectCollection findByLabel(string $label) Return ChildLoginProfileFields objects filtered by the label column
 * @method     ChildLoginProfileFields[]|ObjectCollection findByPublic(int $public) Return ChildLoginProfileFields objects filtered by the public column
 * @method     ChildLoginProfileFields[]|ObjectCollection findBySignup(string $signup) Return ChildLoginProfileFields objects filtered by the signup column
 * @method     ChildLoginProfileFields[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LoginProfileFieldsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LoginProfileFieldsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\LoginProfileFields', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLoginProfileFieldsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLoginProfileFieldsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLoginProfileFieldsQuery) {
            return $criteria;
        }
        $query = new ChildLoginProfileFieldsQuery();
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
     * @return ChildLoginProfileFields|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LoginProfileFieldsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LoginProfileFieldsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLoginProfileFields A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, section, type, label, public, signup FROM login_profile_fields WHERE id = :p0';
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
            /** @var ChildLoginProfileFields $obj */
            $obj = new ChildLoginProfileFields();
            $obj->hydrate($row);
            LoginProfileFieldsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLoginProfileFields|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLoginProfileFieldsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LoginProfileFieldsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLoginProfileFieldsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LoginProfileFieldsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildLoginProfileFieldsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LoginProfileFieldsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LoginProfileFieldsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginProfileFieldsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the section column
     *
     * Example usage:
     * <code>
     * $query->filterBySection('fooValue');   // WHERE section = 'fooValue'
     * $query->filterBySection('%fooValue%', Criteria::LIKE); // WHERE section LIKE '%fooValue%'
     * </code>
     *
     * @param     string $section The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginProfileFieldsQuery The current query, for fluid interface
     */
    public function filterBySection($section = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($section)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginProfileFieldsTableMap::COL_SECTION, $section, $comparison);
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
     * @return $this|ChildLoginProfileFieldsQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginProfileFieldsTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the label column
     *
     * Example usage:
     * <code>
     * $query->filterByLabel('fooValue');   // WHERE label = 'fooValue'
     * $query->filterByLabel('%fooValue%', Criteria::LIKE); // WHERE label LIKE '%fooValue%'
     * </code>
     *
     * @param     string $label The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginProfileFieldsQuery The current query, for fluid interface
     */
    public function filterByLabel($label = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($label)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginProfileFieldsTableMap::COL_LABEL, $label, $comparison);
    }

    /**
     * Filter the query on the public column
     *
     * Example usage:
     * <code>
     * $query->filterByPublic(1234); // WHERE public = 1234
     * $query->filterByPublic(array(12, 34)); // WHERE public IN (12, 34)
     * $query->filterByPublic(array('min' => 12)); // WHERE public > 12
     * </code>
     *
     * @param     mixed $public The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginProfileFieldsQuery The current query, for fluid interface
     */
    public function filterByPublic($public = null, $comparison = null)
    {
        if (is_array($public)) {
            $useMinMax = false;
            if (isset($public['min'])) {
                $this->addUsingAlias(LoginProfileFieldsTableMap::COL_PUBLIC, $public['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($public['max'])) {
                $this->addUsingAlias(LoginProfileFieldsTableMap::COL_PUBLIC, $public['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginProfileFieldsTableMap::COL_PUBLIC, $public, $comparison);
    }

    /**
     * Filter the query on the signup column
     *
     * Example usage:
     * <code>
     * $query->filterBySignup('fooValue');   // WHERE signup = 'fooValue'
     * $query->filterBySignup('%fooValue%', Criteria::LIKE); // WHERE signup LIKE '%fooValue%'
     * </code>
     *
     * @param     string $signup The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLoginProfileFieldsQuery The current query, for fluid interface
     */
    public function filterBySignup($signup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($signup)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginProfileFieldsTableMap::COL_SIGNUP, $signup, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLoginProfileFields $loginProfileFields Object to remove from the list of results
     *
     * @return $this|ChildLoginProfileFieldsQuery The current query, for fluid interface
     */
    public function prune($loginProfileFields = null)
    {
        if ($loginProfileFields) {
            $this->addUsingAlias(LoginProfileFieldsTableMap::COL_ID, $loginProfileFields->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the login_profile_fields table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LoginProfileFieldsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LoginProfileFieldsTableMap::clearInstancePool();
            LoginProfileFieldsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LoginProfileFieldsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LoginProfileFieldsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LoginProfileFieldsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LoginProfileFieldsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LoginProfileFieldsQuery
