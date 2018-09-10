<?php

namespace Map;

use \TInstitucion;
use \TInstitucionQuery;
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
 * This class defines the structure of the 't_institucion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TInstitucionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TInstitucionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 't_institucion';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\TInstitucion';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'TInstitucion';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the tins_tipo field
     */
    const COL_TINS_TIPO = 't_institucion.tins_tipo';

    /**
     * the column name for the tins_descripcion field
     */
    const COL_TINS_DESCRIPCION = 't_institucion.tins_descripcion';

    /**
     * the column name for the tins_r_fecha_creacion field
     */
    const COL_TINS_R_FECHA_CREACION = 't_institucion.tins_r_fecha_creacion';

    /**
     * the column name for the tins_r_fecha_modificacion field
     */
    const COL_TINS_R_FECHA_MODIFICACION = 't_institucion.tins_r_fecha_modificacion';

    /**
     * the column name for the tins_r_usuario field
     */
    const COL_TINS_R_USUARIO = 't_institucion.tins_r_usuario';

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
        self::TYPE_PHPNAME       => array('TinsTipo', 'TinsDescripcion', 'TinsRFechaCreacion', 'TinsRFechaModificacion', 'TinsRUsuario', ),
        self::TYPE_CAMELNAME     => array('tinsTipo', 'tinsDescripcion', 'tinsRFechaCreacion', 'tinsRFechaModificacion', 'tinsRUsuario', ),
        self::TYPE_COLNAME       => array(TInstitucionTableMap::COL_TINS_TIPO, TInstitucionTableMap::COL_TINS_DESCRIPCION, TInstitucionTableMap::COL_TINS_R_FECHA_CREACION, TInstitucionTableMap::COL_TINS_R_FECHA_MODIFICACION, TInstitucionTableMap::COL_TINS_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('tins_tipo', 'tins_descripcion', 'tins_r_fecha_creacion', 'tins_r_fecha_modificacion', 'tins_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('TinsTipo' => 0, 'TinsDescripcion' => 1, 'TinsRFechaCreacion' => 2, 'TinsRFechaModificacion' => 3, 'TinsRUsuario' => 4, ),
        self::TYPE_CAMELNAME     => array('tinsTipo' => 0, 'tinsDescripcion' => 1, 'tinsRFechaCreacion' => 2, 'tinsRFechaModificacion' => 3, 'tinsRUsuario' => 4, ),
        self::TYPE_COLNAME       => array(TInstitucionTableMap::COL_TINS_TIPO => 0, TInstitucionTableMap::COL_TINS_DESCRIPCION => 1, TInstitucionTableMap::COL_TINS_R_FECHA_CREACION => 2, TInstitucionTableMap::COL_TINS_R_FECHA_MODIFICACION => 3, TInstitucionTableMap::COL_TINS_R_USUARIO => 4, ),
        self::TYPE_FIELDNAME     => array('tins_tipo' => 0, 'tins_descripcion' => 1, 'tins_r_fecha_creacion' => 2, 'tins_r_fecha_modificacion' => 3, 'tins_r_usuario' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('t_institucion');
        $this->setPhpName('TInstitucion');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\TInstitucion');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('tins_tipo', 'TinsTipo', 'INTEGER', true, null, null);
        $this->addColumn('tins_descripcion', 'TinsDescripcion', 'VARCHAR', false, 255, null);
        $this->addColumn('tins_r_fecha_creacion', 'TinsRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('tins_r_fecha_modificacion', 'TinsRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('tins_r_usuario', 'TinsRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Institucion', '\\Institucion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':inst_t_institucion',
    1 => ':tins_tipo',
  ),
), null, 'CASCADE', 'Institucions', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TinsTipo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TinsTipo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TinsTipo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TinsTipo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TinsTipo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TinsTipo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('TinsTipo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TInstitucionTableMap::CLASS_DEFAULT : TInstitucionTableMap::OM_CLASS;
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
     * @return array           (TInstitucion object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TInstitucionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TInstitucionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TInstitucionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TInstitucionTableMap::OM_CLASS;
            /** @var TInstitucion $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TInstitucionTableMap::addInstanceToPool($obj, $key);
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
            $key = TInstitucionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TInstitucionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var TInstitucion $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TInstitucionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TInstitucionTableMap::COL_TINS_TIPO);
            $criteria->addSelectColumn(TInstitucionTableMap::COL_TINS_DESCRIPCION);
            $criteria->addSelectColumn(TInstitucionTableMap::COL_TINS_R_FECHA_CREACION);
            $criteria->addSelectColumn(TInstitucionTableMap::COL_TINS_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(TInstitucionTableMap::COL_TINS_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.tins_tipo');
            $criteria->addSelectColumn($alias . '.tins_descripcion');
            $criteria->addSelectColumn($alias . '.tins_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.tins_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.tins_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(TInstitucionTableMap::DATABASE_NAME)->getTable(TInstitucionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TInstitucionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TInstitucionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TInstitucionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a TInstitucion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or TInstitucion object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TInstitucionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \TInstitucion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TInstitucionTableMap::DATABASE_NAME);
            $criteria->add(TInstitucionTableMap::COL_TINS_TIPO, (array) $values, Criteria::IN);
        }

        $query = TInstitucionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TInstitucionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TInstitucionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the t_institucion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TInstitucionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a TInstitucion or Criteria object.
     *
     * @param mixed               $criteria Criteria or TInstitucion object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TInstitucionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from TInstitucion object
        }

        if ($criteria->containsKey(TInstitucionTableMap::COL_TINS_TIPO) && $criteria->keyContainsValue(TInstitucionTableMap::COL_TINS_TIPO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TInstitucionTableMap::COL_TINS_TIPO.')');
        }


        // Set the correct dbName
        $query = TInstitucionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TInstitucionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TInstitucionTableMap::buildTableMap();
