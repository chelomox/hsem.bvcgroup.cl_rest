<?php

namespace Map;

use \Region;
use \RegionQuery;
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
 * This class defines the structure of the 'region' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RegionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.RegionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'region';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Region';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Region';

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
     * the column name for the regi_codigo field
     */
    const COL_REGI_CODIGO = 'region.regi_codigo';

    /**
     * the column name for the regi_nombre field
     */
    const COL_REGI_NOMBRE = 'region.regi_nombre';

    /**
     * the column name for the regi_iso_3166_2_cl field
     */
    const COL_REGI_ISO_3166_2_CL = 'region.regi_iso_3166_2_cl';

    /**
     * the column name for the regi_r_fecha_creacion field
     */
    const COL_REGI_R_FECHA_CREACION = 'region.regi_r_fecha_creacion';

    /**
     * the column name for the regi_r_fecha_modificacion field
     */
    const COL_REGI_R_FECHA_MODIFICACION = 'region.regi_r_fecha_modificacion';

    /**
     * the column name for the regi_r_usuario field
     */
    const COL_REGI_R_USUARIO = 'region.regi_r_usuario';

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
        self::TYPE_PHPNAME       => array('RegiCodigo', 'RegiNombre', 'RegiIso31662Cl', 'RegiRFechaCreacion', 'RegiRFechaModificacion', 'RegiRUsuario', ),
        self::TYPE_CAMELNAME     => array('regiCodigo', 'regiNombre', 'regiIso31662Cl', 'regiRFechaCreacion', 'regiRFechaModificacion', 'regiRUsuario', ),
        self::TYPE_COLNAME       => array(RegionTableMap::COL_REGI_CODIGO, RegionTableMap::COL_REGI_NOMBRE, RegionTableMap::COL_REGI_ISO_3166_2_CL, RegionTableMap::COL_REGI_R_FECHA_CREACION, RegionTableMap::COL_REGI_R_FECHA_MODIFICACION, RegionTableMap::COL_REGI_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('regi_codigo', 'regi_nombre', 'regi_iso_3166_2_cl', 'regi_r_fecha_creacion', 'regi_r_fecha_modificacion', 'regi_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('RegiCodigo' => 0, 'RegiNombre' => 1, 'RegiIso31662Cl' => 2, 'RegiRFechaCreacion' => 3, 'RegiRFechaModificacion' => 4, 'RegiRUsuario' => 5, ),
        self::TYPE_CAMELNAME     => array('regiCodigo' => 0, 'regiNombre' => 1, 'regiIso31662Cl' => 2, 'regiRFechaCreacion' => 3, 'regiRFechaModificacion' => 4, 'regiRUsuario' => 5, ),
        self::TYPE_COLNAME       => array(RegionTableMap::COL_REGI_CODIGO => 0, RegionTableMap::COL_REGI_NOMBRE => 1, RegionTableMap::COL_REGI_ISO_3166_2_CL => 2, RegionTableMap::COL_REGI_R_FECHA_CREACION => 3, RegionTableMap::COL_REGI_R_FECHA_MODIFICACION => 4, RegionTableMap::COL_REGI_R_USUARIO => 5, ),
        self::TYPE_FIELDNAME     => array('regi_codigo' => 0, 'regi_nombre' => 1, 'regi_iso_3166_2_cl' => 2, 'regi_r_fecha_creacion' => 3, 'regi_r_fecha_modificacion' => 4, 'regi_r_usuario' => 5, ),
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
        $this->setName('region');
        $this->setPhpName('Region');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Region');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('regi_codigo', 'RegiCodigo', 'INTEGER', true, null, 0);
        $this->addColumn('regi_nombre', 'RegiNombre', 'VARCHAR', false, 55, null);
        $this->addColumn('regi_iso_3166_2_cl', 'RegiIso31662Cl', 'VARCHAR', false, 10, null);
        $this->addColumn('regi_r_fecha_creacion', 'RegiRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('regi_r_fecha_modificacion', 'RegiRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('regi_r_usuario', 'RegiRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Provincia', '\\Provincia', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':prov_c_region',
    1 => ':regi_codigo',
  ),
), null, 'CASCADE', 'Provincias', false);
    } // buildRelations()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RegiCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RegiCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RegiCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RegiCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RegiCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('RegiCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('RegiCodigo', TableMap::TYPE_PHPNAME, $indexType)
        ];
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
        return $withPrefix ? RegionTableMap::CLASS_DEFAULT : RegionTableMap::OM_CLASS;
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
     * @return array           (Region object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RegionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RegionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RegionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RegionTableMap::OM_CLASS;
            /** @var Region $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RegionTableMap::addInstanceToPool($obj, $key);
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
            $key = RegionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RegionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Region $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RegionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(RegionTableMap::COL_REGI_CODIGO);
            $criteria->addSelectColumn(RegionTableMap::COL_REGI_NOMBRE);
            $criteria->addSelectColumn(RegionTableMap::COL_REGI_ISO_3166_2_CL);
            $criteria->addSelectColumn(RegionTableMap::COL_REGI_R_FECHA_CREACION);
            $criteria->addSelectColumn(RegionTableMap::COL_REGI_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(RegionTableMap::COL_REGI_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.regi_codigo');
            $criteria->addSelectColumn($alias . '.regi_nombre');
            $criteria->addSelectColumn($alias . '.regi_iso_3166_2_cl');
            $criteria->addSelectColumn($alias . '.regi_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.regi_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.regi_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(RegionTableMap::DATABASE_NAME)->getTable(RegionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RegionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RegionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RegionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Region or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Region object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(RegionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Region) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RegionTableMap::DATABASE_NAME);
            $criteria->add(RegionTableMap::COL_REGI_CODIGO, (array) $values, Criteria::IN);
        }

        $query = RegionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RegionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RegionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the region table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RegionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Region or Criteria object.
     *
     * @param mixed               $criteria Criteria or Region object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RegionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Region object
        }


        // Set the correct dbName
        $query = RegionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RegionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RegionTableMap::buildTableMap();
