<?php

namespace Map;

use \CargoGrupoSence;
use \CargoGrupoSenceQuery;
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
 * This class defines the structure of the 'cargo_grupo_sence' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CargoGrupoSenceTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CargoGrupoSenceTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'cargo_grupo_sence';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CargoGrupoSence';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CargoGrupoSence';

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
     * the column name for the cagrse_c_cargo field
     */
    const COL_CAGRSE_C_CARGO = 'cargo_grupo_sence.cagrse_c_cargo';

    /**
     * the column name for the cagrse_g_grupo_sence field
     */
    const COL_CAGRSE_G_GRUPO_SENCE = 'cargo_grupo_sence.cagrse_g_grupo_sence';

    /**
     * the column name for the cagrse_vigente field
     */
    const COL_CAGRSE_VIGENTE = 'cargo_grupo_sence.cagrse_vigente';

    /**
     * the column name for the cagrse_r_fecha_creacion field
     */
    const COL_CAGRSE_R_FECHA_CREACION = 'cargo_grupo_sence.cagrse_r_fecha_creacion';

    /**
     * the column name for the cagrse_r_fecha_modificacion field
     */
    const COL_CAGRSE_R_FECHA_MODIFICACION = 'cargo_grupo_sence.cagrse_r_fecha_modificacion';

    /**
     * the column name for the cagrse_r_usuario field
     */
    const COL_CAGRSE_R_USUARIO = 'cargo_grupo_sence.cagrse_r_usuario';

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
        self::TYPE_PHPNAME       => array('CagrseCCargo', 'CagrseGGrupoSence', 'CagrseVigente', 'CagrseRFechaCreacion', 'CagrseRFechaModificacion', 'CagrseRUsuario', ),
        self::TYPE_CAMELNAME     => array('cagrseCCargo', 'cagrseGGrupoSence', 'cagrseVigente', 'cagrseRFechaCreacion', 'cagrseRFechaModificacion', 'cagrseRUsuario', ),
        self::TYPE_COLNAME       => array(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO, CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE, CargoGrupoSenceTableMap::COL_CAGRSE_VIGENTE, CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION, CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION, CargoGrupoSenceTableMap::COL_CAGRSE_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('cagrse_c_cargo', 'cagrse_g_grupo_sence', 'cagrse_vigente', 'cagrse_r_fecha_creacion', 'cagrse_r_fecha_modificacion', 'cagrse_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CagrseCCargo' => 0, 'CagrseGGrupoSence' => 1, 'CagrseVigente' => 2, 'CagrseRFechaCreacion' => 3, 'CagrseRFechaModificacion' => 4, 'CagrseRUsuario' => 5, ),
        self::TYPE_CAMELNAME     => array('cagrseCCargo' => 0, 'cagrseGGrupoSence' => 1, 'cagrseVigente' => 2, 'cagrseRFechaCreacion' => 3, 'cagrseRFechaModificacion' => 4, 'cagrseRUsuario' => 5, ),
        self::TYPE_COLNAME       => array(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO => 0, CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE => 1, CargoGrupoSenceTableMap::COL_CAGRSE_VIGENTE => 2, CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION => 3, CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION => 4, CargoGrupoSenceTableMap::COL_CAGRSE_R_USUARIO => 5, ),
        self::TYPE_FIELDNAME     => array('cagrse_c_cargo' => 0, 'cagrse_g_grupo_sence' => 1, 'cagrse_vigente' => 2, 'cagrse_r_fecha_creacion' => 3, 'cagrse_r_fecha_modificacion' => 4, 'cagrse_r_usuario' => 5, ),
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
        $this->setName('cargo_grupo_sence');
        $this->setPhpName('CargoGrupoSence');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CargoGrupoSence');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('cagrse_c_cargo', 'CagrseCCargo', 'INTEGER' , 'cargo', 'carg_codigo', true, null, null);
        $this->addForeignPrimaryKey('cagrse_g_grupo_sence', 'CagrseGGrupoSence', 'INTEGER' , 'grupo_sence', 'grse_grupo', true, null, null);
        $this->addColumn('cagrse_vigente', 'CagrseVigente', 'INTEGER', false, 1, null);
        $this->addColumn('cagrse_r_fecha_creacion', 'CagrseRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('cagrse_r_fecha_modificacion', 'CagrseRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('cagrse_r_usuario', 'CagrseRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cargo', '\\Cargo', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':cagrse_c_cargo',
    1 => ':carg_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('GrupoSence', '\\GrupoSence', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':cagrse_g_grupo_sence',
    1 => ':grse_grupo',
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
     * @param \CargoGrupoSence $obj A \CargoGrupoSence object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getCagrseCCargo() || is_scalar($obj->getCagrseCCargo()) || is_callable([$obj->getCagrseCCargo(), '__toString']) ? (string) $obj->getCagrseCCargo() : $obj->getCagrseCCargo()), (null === $obj->getCagrseGGrupoSence() || is_scalar($obj->getCagrseGGrupoSence()) || is_callable([$obj->getCagrseGGrupoSence(), '__toString']) ? (string) $obj->getCagrseGGrupoSence() : $obj->getCagrseGGrupoSence())]);
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
     * @param mixed $value A \CargoGrupoSence object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \CargoGrupoSence) {
                $key = serialize([(null === $value->getCagrseCCargo() || is_scalar($value->getCagrseCCargo()) || is_callable([$value->getCagrseCCargo(), '__toString']) ? (string) $value->getCagrseCCargo() : $value->getCagrseCCargo()), (null === $value->getCagrseGGrupoSence() || is_scalar($value->getCagrseGGrupoSence()) || is_callable([$value->getCagrseGGrupoSence(), '__toString']) ? (string) $value->getCagrseGGrupoSence() : $value->getCagrseGGrupoSence())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \CargoGrupoSence object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CagrseCCargo', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CagrseGGrupoSence', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CagrseCCargo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CagrseCCargo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CagrseCCargo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CagrseCCargo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CagrseCCargo', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CagrseGGrupoSence', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CagrseGGrupoSence', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CagrseGGrupoSence', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CagrseGGrupoSence', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('CagrseGGrupoSence', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('CagrseCCargo', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('CagrseGGrupoSence', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CargoGrupoSenceTableMap::CLASS_DEFAULT : CargoGrupoSenceTableMap::OM_CLASS;
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
     * @return array           (CargoGrupoSence object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CargoGrupoSenceTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CargoGrupoSenceTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CargoGrupoSenceTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CargoGrupoSenceTableMap::OM_CLASS;
            /** @var CargoGrupoSence $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CargoGrupoSenceTableMap::addInstanceToPool($obj, $key);
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
            $key = CargoGrupoSenceTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CargoGrupoSenceTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CargoGrupoSence $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CargoGrupoSenceTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO);
            $criteria->addSelectColumn(CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE);
            $criteria->addSelectColumn(CargoGrupoSenceTableMap::COL_CAGRSE_VIGENTE);
            $criteria->addSelectColumn(CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION);
            $criteria->addSelectColumn(CargoGrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(CargoGrupoSenceTableMap::COL_CAGRSE_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.cagrse_c_cargo');
            $criteria->addSelectColumn($alias . '.cagrse_g_grupo_sence');
            $criteria->addSelectColumn($alias . '.cagrse_vigente');
            $criteria->addSelectColumn($alias . '.cagrse_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.cagrse_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.cagrse_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(CargoGrupoSenceTableMap::DATABASE_NAME)->getTable(CargoGrupoSenceTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CargoGrupoSenceTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CargoGrupoSenceTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CargoGrupoSenceTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CargoGrupoSence or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CargoGrupoSence object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CargoGrupoSenceTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CargoGrupoSence) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CargoGrupoSenceTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(CargoGrupoSenceTableMap::COL_CAGRSE_C_CARGO, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(CargoGrupoSenceTableMap::COL_CAGRSE_G_GRUPO_SENCE, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = CargoGrupoSenceQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CargoGrupoSenceTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CargoGrupoSenceTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the cargo_grupo_sence table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CargoGrupoSenceQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CargoGrupoSence or Criteria object.
     *
     * @param mixed               $criteria Criteria or CargoGrupoSence object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CargoGrupoSenceTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CargoGrupoSence object
        }


        // Set the correct dbName
        $query = CargoGrupoSenceQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CargoGrupoSenceTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CargoGrupoSenceTableMap::buildTableMap();
