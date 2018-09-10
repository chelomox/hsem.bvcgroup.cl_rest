<?php

namespace Map;

use \Area;
use \AreaQuery;
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
 * This class defines the structure of the 'area' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AreaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AreaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'area';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Area';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Area';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the area_codigo field
     */
    const COL_AREA_CODIGO = 'area.area_codigo';

    /**
     * the column name for the area_c_institucion field
     */
    const COL_AREA_C_INSTITUCION = 'area.area_c_institucion';

    /**
     * the column name for the area_sigla field
     */
    const COL_AREA_SIGLA = 'area.area_sigla';

    /**
     * the column name for the area_descripcion field
     */
    const COL_AREA_DESCRIPCION = 'area.area_descripcion';

    /**
     * the column name for the area_r_fecha_creacion field
     */
    const COL_AREA_R_FECHA_CREACION = 'area.area_r_fecha_creacion';

    /**
     * the column name for the area_r_fecha_modificacion field
     */
    const COL_AREA_R_FECHA_MODIFICACION = 'area.area_r_fecha_modificacion';

    /**
     * the column name for the area_r_usuario field
     */
    const COL_AREA_R_USUARIO = 'area.area_r_usuario';

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
        self::TYPE_PHPNAME       => array('AreaCodigo', 'AreaCInstitucion', 'AreaSigla', 'AreaDescripcion', 'AreaRFechaCreacion', 'AreaRFechaModificacion', 'AreaRUsuario', ),
        self::TYPE_CAMELNAME     => array('areaCodigo', 'areaCInstitucion', 'areaSigla', 'areaDescripcion', 'areaRFechaCreacion', 'areaRFechaModificacion', 'areaRUsuario', ),
        self::TYPE_COLNAME       => array(AreaTableMap::COL_AREA_CODIGO, AreaTableMap::COL_AREA_C_INSTITUCION, AreaTableMap::COL_AREA_SIGLA, AreaTableMap::COL_AREA_DESCRIPCION, AreaTableMap::COL_AREA_R_FECHA_CREACION, AreaTableMap::COL_AREA_R_FECHA_MODIFICACION, AreaTableMap::COL_AREA_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('area_codigo', 'area_c_institucion', 'area_sigla', 'area_descripcion', 'area_r_fecha_creacion', 'area_r_fecha_modificacion', 'area_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('AreaCodigo' => 0, 'AreaCInstitucion' => 1, 'AreaSigla' => 2, 'AreaDescripcion' => 3, 'AreaRFechaCreacion' => 4, 'AreaRFechaModificacion' => 5, 'AreaRUsuario' => 6, ),
        self::TYPE_CAMELNAME     => array('areaCodigo' => 0, 'areaCInstitucion' => 1, 'areaSigla' => 2, 'areaDescripcion' => 3, 'areaRFechaCreacion' => 4, 'areaRFechaModificacion' => 5, 'areaRUsuario' => 6, ),
        self::TYPE_COLNAME       => array(AreaTableMap::COL_AREA_CODIGO => 0, AreaTableMap::COL_AREA_C_INSTITUCION => 1, AreaTableMap::COL_AREA_SIGLA => 2, AreaTableMap::COL_AREA_DESCRIPCION => 3, AreaTableMap::COL_AREA_R_FECHA_CREACION => 4, AreaTableMap::COL_AREA_R_FECHA_MODIFICACION => 5, AreaTableMap::COL_AREA_R_USUARIO => 6, ),
        self::TYPE_FIELDNAME     => array('area_codigo' => 0, 'area_c_institucion' => 1, 'area_sigla' => 2, 'area_descripcion' => 3, 'area_r_fecha_creacion' => 4, 'area_r_fecha_modificacion' => 5, 'area_r_usuario' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('area');
        $this->setPhpName('Area');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Area');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('area_codigo', 'AreaCodigo', 'INTEGER', true, null, null);
        $this->addForeignKey('area_c_institucion', 'AreaCInstitucion', 'INTEGER', 'institucion', 'inst_codigo', true, null, null);
        $this->addColumn('area_sigla', 'AreaSigla', 'VARCHAR', false, 10, null);
        $this->addColumn('area_descripcion', 'AreaDescripcion', 'VARCHAR', false, 255, null);
        $this->addColumn('area_r_fecha_creacion', 'AreaRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('area_r_fecha_modificacion', 'AreaRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('area_r_usuario', 'AreaRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Institucion', '\\Institucion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':area_c_institucion',
    1 => ':inst_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Trabajador', '\\Trabajador', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':trab_c_area',
    1 => ':area_codigo',
  ),
), null, 'CASCADE', 'Trabajadors', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AreaCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AreaCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AreaCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AreaCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AreaCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AreaCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('AreaCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AreaTableMap::CLASS_DEFAULT : AreaTableMap::OM_CLASS;
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
     * @return array           (Area object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AreaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AreaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AreaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AreaTableMap::OM_CLASS;
            /** @var Area $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AreaTableMap::addInstanceToPool($obj, $key);
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
            $key = AreaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AreaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Area $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AreaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AreaTableMap::COL_AREA_CODIGO);
            $criteria->addSelectColumn(AreaTableMap::COL_AREA_C_INSTITUCION);
            $criteria->addSelectColumn(AreaTableMap::COL_AREA_SIGLA);
            $criteria->addSelectColumn(AreaTableMap::COL_AREA_DESCRIPCION);
            $criteria->addSelectColumn(AreaTableMap::COL_AREA_R_FECHA_CREACION);
            $criteria->addSelectColumn(AreaTableMap::COL_AREA_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(AreaTableMap::COL_AREA_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.area_codigo');
            $criteria->addSelectColumn($alias . '.area_c_institucion');
            $criteria->addSelectColumn($alias . '.area_sigla');
            $criteria->addSelectColumn($alias . '.area_descripcion');
            $criteria->addSelectColumn($alias . '.area_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.area_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.area_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(AreaTableMap::DATABASE_NAME)->getTable(AreaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AreaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AreaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AreaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Area or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Area object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AreaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Area) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AreaTableMap::DATABASE_NAME);
            $criteria->add(AreaTableMap::COL_AREA_CODIGO, (array) $values, Criteria::IN);
        }

        $query = AreaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AreaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AreaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the area table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AreaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Area or Criteria object.
     *
     * @param mixed               $criteria Criteria or Area object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AreaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Area object
        }

        if ($criteria->containsKey(AreaTableMap::COL_AREA_CODIGO) && $criteria->keyContainsValue(AreaTableMap::COL_AREA_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AreaTableMap::COL_AREA_CODIGO.')');
        }


        // Set the correct dbName
        $query = AreaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AreaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AreaTableMap::buildTableMap();
