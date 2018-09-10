<?php

namespace Map;

use \ActividadCargo;
use \ActividadCargoQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'actividad_cargo' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ActividadCargoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ActividadCargoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'actividad_cargo';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ActividadCargo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ActividadCargo';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the acca_c_actividad field
     */
    const COL_ACCA_C_ACTIVIDAD = 'actividad_cargo.acca_c_actividad';

    /**
     * the column name for the acca_c_cargo field
     */
    const COL_ACCA_C_CARGO = 'actividad_cargo.acca_c_cargo';

    /**
     * the column name for the acca_vigente field
     */
    const COL_ACCA_VIGENTE = 'actividad_cargo.acca_vigente';

    /**
     * the column name for the acca_r_fecha_creacion field
     */
    const COL_ACCA_R_FECHA_CREACION = 'actividad_cargo.acca_r_fecha_creacion';

    /**
     * the column name for the acca_r_fecha_modificacion field
     */
    const COL_ACCA_R_FECHA_MODIFICACION = 'actividad_cargo.acca_r_fecha_modificacion';

    /**
     * the column name for the acca_r_usuario field
     */
    const COL_ACCA_R_USUARIO = 'actividad_cargo.acca_r_usuario';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('AccaCActividad', 'AccaCCargo', 'AccaVigente', 'AccaRFechaCreacion', 'AccaRFechaModificacion', 'AccaRUsuario', ),
        self::TYPE_CAMELNAME     => array('accaCActividad', 'accaCCargo', 'accaVigente', 'accaRFechaCreacion', 'accaRFechaModificacion', 'accaRUsuario', ),
        self::TYPE_COLNAME       => array(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD, ActividadCargoTableMap::COL_ACCA_C_CARGO, ActividadCargoTableMap::COL_ACCA_VIGENTE, ActividadCargoTableMap::COL_ACCA_R_FECHA_CREACION, ActividadCargoTableMap::COL_ACCA_R_FECHA_MODIFICACION, ActividadCargoTableMap::COL_ACCA_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('acca_c_actividad', 'acca_c_cargo', 'acca_vigente', 'acca_r_fecha_creacion', 'acca_r_fecha_modificacion', 'acca_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('AccaCActividad' => 0, 'AccaCCargo' => 1, 'AccaVigente' => 2, 'AccaRFechaCreacion' => 3, 'AccaRFechaModificacion' => 4, 'AccaRUsuario' => 5, ),
        self::TYPE_CAMELNAME     => array('accaCActividad' => 0, 'accaCCargo' => 1, 'accaVigente' => 2, 'accaRFechaCreacion' => 3, 'accaRFechaModificacion' => 4, 'accaRUsuario' => 5, ),
        self::TYPE_COLNAME       => array(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD => 0, ActividadCargoTableMap::COL_ACCA_C_CARGO => 1, ActividadCargoTableMap::COL_ACCA_VIGENTE => 2, ActividadCargoTableMap::COL_ACCA_R_FECHA_CREACION => 3, ActividadCargoTableMap::COL_ACCA_R_FECHA_MODIFICACION => 4, ActividadCargoTableMap::COL_ACCA_R_USUARIO => 5, ),
        self::TYPE_FIELDNAME     => array('acca_c_actividad' => 0, 'acca_c_cargo' => 1, 'acca_vigente' => 2, 'acca_r_fecha_creacion' => 3, 'acca_r_fecha_modificacion' => 4, 'acca_r_usuario' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('actividad_cargo');
        $this->setPhpName('ActividadCargo');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ActividadCargo');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('acca_c_actividad', 'AccaCActividad', 'INTEGER' , 'actividad', 'acti_codigo', true, null, null);
        $this->addForeignPrimaryKey('acca_c_cargo', 'AccaCCargo', 'INTEGER' , 'cargo', 'carg_codigo', true, null, null);
        $this->addColumn('acca_vigente', 'AccaVigente', 'INTEGER', false, 1, null);
        $this->addColumn('acca_r_fecha_creacion', 'AccaRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('acca_r_fecha_modificacion', 'AccaRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('acca_r_usuario', 'AccaRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Actividad', '\\Actividad', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':acca_c_actividad',
    1 => ':acti_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Cargo', '\\Cargo', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':acca_c_cargo',
    1 => ':carg_codigo',
  ),
), null, 'CASCADE', null, false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \ActividadCargo $obj A \ActividadCargo object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getAccaCActividad() || is_scalar($obj->getAccaCActividad()) || is_callable([$obj->getAccaCActividad(), '__toString']) ? (string) $obj->getAccaCActividad() : $obj->getAccaCActividad()), (null === $obj->getAccaCCargo() || is_scalar($obj->getAccaCCargo()) || is_callable([$obj->getAccaCCargo(), '__toString']) ? (string) $obj->getAccaCCargo() : $obj->getAccaCCargo())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \ActividadCargo object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \ActividadCargo) {
                $key = serialize([(null === $value->getAccaCActividad() || is_scalar($value->getAccaCActividad()) || is_callable([$value->getAccaCActividad(), '__toString']) ? (string) $value->getAccaCActividad() : $value->getAccaCActividad()), (null === $value->getAccaCCargo() || is_scalar($value->getAccaCCargo()) || is_callable([$value->getAccaCCargo(), '__toString']) ? (string) $value->getAccaCCargo() : $value->getAccaCCargo())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \ActividadCargo object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccaCActividad', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AccaCCargo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccaCActividad', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccaCActividad', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccaCActividad', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccaCActividad', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccaCActividad', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AccaCCargo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AccaCCargo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AccaCCargo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AccaCCargo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AccaCCargo', TableMap::TYPE_PHPNAME, $indexType)])]);
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('AccaCActividad', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('AccaCCargo', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ActividadCargoTableMap::CLASS_DEFAULT : ActividadCargoTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (ActividadCargo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ActividadCargoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ActividadCargoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ActividadCargoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ActividadCargoTableMap::OM_CLASS;
            /** @var ActividadCargo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ActividadCargoTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ActividadCargoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ActividadCargoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ActividadCargo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ActividadCargoTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD);
            $criteria->addSelectColumn(ActividadCargoTableMap::COL_ACCA_C_CARGO);
            $criteria->addSelectColumn(ActividadCargoTableMap::COL_ACCA_VIGENTE);
            $criteria->addSelectColumn(ActividadCargoTableMap::COL_ACCA_R_FECHA_CREACION);
            $criteria->addSelectColumn(ActividadCargoTableMap::COL_ACCA_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(ActividadCargoTableMap::COL_ACCA_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.acca_c_actividad');
            $criteria->addSelectColumn($alias . '.acca_c_cargo');
            $criteria->addSelectColumn($alias . '.acca_vigente');
            $criteria->addSelectColumn($alias . '.acca_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.acca_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.acca_r_usuario');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ActividadCargoTableMap::DATABASE_NAME)->getTable(ActividadCargoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ActividadCargoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ActividadCargoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ActividadCargoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ActividadCargo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ActividadCargo object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadCargoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ActividadCargo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ActividadCargoTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(ActividadCargoTableMap::COL_ACCA_C_ACTIVIDAD, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(ActividadCargoTableMap::COL_ACCA_C_CARGO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = ActividadCargoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ActividadCargoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ActividadCargoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the actividad_cargo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ActividadCargoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ActividadCargo or Criteria object.
     *
     * @param mixed               $criteria Criteria or ActividadCargo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadCargoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ActividadCargo object
        }


        // Set the correct dbName
        $query = ActividadCargoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ActividadCargoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ActividadCargoTableMap::buildTableMap();
