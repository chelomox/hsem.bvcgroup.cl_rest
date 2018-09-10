<?php

namespace Map;

use \Comuna;
use \ComunaQuery;
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
 * This class defines the structure of the 'comuna' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ComunaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ComunaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'comuna';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Comuna';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Comuna';

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
     * the column name for the comu_codigo field
     */
    const COL_COMU_CODIGO = 'comuna.comu_codigo';

    /**
     * the column name for the comu_nombre field
     */
    const COL_COMU_NOMBRE = 'comuna.comu_nombre';

    /**
     * the column name for the comu_c_provincia field
     */
    const COL_COMU_C_PROVINCIA = 'comuna.comu_c_provincia';

    /**
     * the column name for the comu_r_fecha_creacion field
     */
    const COL_COMU_R_FECHA_CREACION = 'comuna.comu_r_fecha_creacion';

    /**
     * the column name for the comu_r_fecha_modificacion field
     */
    const COL_COMU_R_FECHA_MODIFICACION = 'comuna.comu_r_fecha_modificacion';

    /**
     * the column name for the comu_r_usuario field
     */
    const COL_COMU_R_USUARIO = 'comuna.comu_r_usuario';

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
        self::TYPE_PHPNAME       => array('ComuCodigo', 'ComuNombre', 'ComuCProvincia', 'ComuRFechaCreacion', 'ComuRFechaModificacion', 'ComuRUsuario', ),
        self::TYPE_CAMELNAME     => array('comuCodigo', 'comuNombre', 'comuCProvincia', 'comuRFechaCreacion', 'comuRFechaModificacion', 'comuRUsuario', ),
        self::TYPE_COLNAME       => array(ComunaTableMap::COL_COMU_CODIGO, ComunaTableMap::COL_COMU_NOMBRE, ComunaTableMap::COL_COMU_C_PROVINCIA, ComunaTableMap::COL_COMU_R_FECHA_CREACION, ComunaTableMap::COL_COMU_R_FECHA_MODIFICACION, ComunaTableMap::COL_COMU_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('comu_codigo', 'comu_nombre', 'comu_c_provincia', 'comu_r_fecha_creacion', 'comu_r_fecha_modificacion', 'comu_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ComuCodigo' => 0, 'ComuNombre' => 1, 'ComuCProvincia' => 2, 'ComuRFechaCreacion' => 3, 'ComuRFechaModificacion' => 4, 'ComuRUsuario' => 5, ),
        self::TYPE_CAMELNAME     => array('comuCodigo' => 0, 'comuNombre' => 1, 'comuCProvincia' => 2, 'comuRFechaCreacion' => 3, 'comuRFechaModificacion' => 4, 'comuRUsuario' => 5, ),
        self::TYPE_COLNAME       => array(ComunaTableMap::COL_COMU_CODIGO => 0, ComunaTableMap::COL_COMU_NOMBRE => 1, ComunaTableMap::COL_COMU_C_PROVINCIA => 2, ComunaTableMap::COL_COMU_R_FECHA_CREACION => 3, ComunaTableMap::COL_COMU_R_FECHA_MODIFICACION => 4, ComunaTableMap::COL_COMU_R_USUARIO => 5, ),
        self::TYPE_FIELDNAME     => array('comu_codigo' => 0, 'comu_nombre' => 1, 'comu_c_provincia' => 2, 'comu_r_fecha_creacion' => 3, 'comu_r_fecha_modificacion' => 4, 'comu_r_usuario' => 5, ),
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
        $this->setName('comuna');
        $this->setPhpName('Comuna');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Comuna');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('comu_codigo', 'ComuCodigo', 'INTEGER', true, null, null);
        $this->addColumn('comu_nombre', 'ComuNombre', 'VARCHAR', false, 55, null);
        $this->addForeignKey('comu_c_provincia', 'ComuCProvincia', 'INTEGER', 'provincia', 'prov_codigo', false, null, null);
        $this->addColumn('comu_r_fecha_creacion', 'ComuRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('comu_r_fecha_modificacion', 'ComuRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('comu_r_usuario', 'ComuRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Provincia', '\\Provincia', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':comu_c_provincia',
    1 => ':prov_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Dictacion', '\\Dictacion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':dict_c_comuna',
    1 => ':comu_codigo',
  ),
), null, 'CASCADE', 'Dictacions', false);
        $this->addRelation('Direccion', '\\Direccion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':dire_c_comuna',
    1 => ':comu_codigo',
  ),
), null, 'CASCADE', 'Direccions', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ComuCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ComuCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ComuCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ComuCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ComuCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ComuCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ComuCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ComunaTableMap::CLASS_DEFAULT : ComunaTableMap::OM_CLASS;
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
     * @return array           (Comuna object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ComunaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ComunaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ComunaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ComunaTableMap::OM_CLASS;
            /** @var Comuna $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ComunaTableMap::addInstanceToPool($obj, $key);
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
            $key = ComunaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ComunaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Comuna $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ComunaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ComunaTableMap::COL_COMU_CODIGO);
            $criteria->addSelectColumn(ComunaTableMap::COL_COMU_NOMBRE);
            $criteria->addSelectColumn(ComunaTableMap::COL_COMU_C_PROVINCIA);
            $criteria->addSelectColumn(ComunaTableMap::COL_COMU_R_FECHA_CREACION);
            $criteria->addSelectColumn(ComunaTableMap::COL_COMU_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(ComunaTableMap::COL_COMU_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.comu_codigo');
            $criteria->addSelectColumn($alias . '.comu_nombre');
            $criteria->addSelectColumn($alias . '.comu_c_provincia');
            $criteria->addSelectColumn($alias . '.comu_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.comu_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.comu_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(ComunaTableMap::DATABASE_NAME)->getTable(ComunaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ComunaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ComunaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ComunaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Comuna or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Comuna object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ComunaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Comuna) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ComunaTableMap::DATABASE_NAME);
            $criteria->add(ComunaTableMap::COL_COMU_CODIGO, (array) $values, Criteria::IN);
        }

        $query = ComunaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ComunaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ComunaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the comuna table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ComunaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Comuna or Criteria object.
     *
     * @param mixed               $criteria Criteria or Comuna object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ComunaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Comuna object
        }

        if ($criteria->containsKey(ComunaTableMap::COL_COMU_CODIGO) && $criteria->keyContainsValue(ComunaTableMap::COL_COMU_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ComunaTableMap::COL_COMU_CODIGO.')');
        }


        // Set the correct dbName
        $query = ComunaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ComunaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ComunaTableMap::buildTableMap();
