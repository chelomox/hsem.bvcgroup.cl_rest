<?php

namespace Map;

use \TCertificado;
use \TCertificadoQuery;
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
 * This class defines the structure of the 't_certificado' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TCertificadoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TCertificadoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 't_certificado';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\TCertificado';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'TCertificado';

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
     * the column name for the tce_tipo field
     */
    const COL_TCE_TIPO = 't_certificado.tce_tipo';

    /**
     * the column name for the tce_descripcion field
     */
    const COL_TCE_DESCRIPCION = 't_certificado.tce_descripcion';

    /**
     * the column name for the tce_r_fecha_creacion field
     */
    const COL_TCE_R_FECHA_CREACION = 't_certificado.tce_r_fecha_creacion';

    /**
     * the column name for the tce_r_fecha_modificacion field
     */
    const COL_TCE_R_FECHA_MODIFICACION = 't_certificado.tce_r_fecha_modificacion';

    /**
     * the column name for the tce_r_usuario field
     */
    const COL_TCE_R_USUARIO = 't_certificado.tce_r_usuario';

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
        self::TYPE_PHPNAME       => array('TceTipo', 'TceDescripcion', 'TceRFechaCreacion', 'TceRFechaModificacion', 'TceRUsuario', ),
        self::TYPE_CAMELNAME     => array('tceTipo', 'tceDescripcion', 'tceRFechaCreacion', 'tceRFechaModificacion', 'tceRUsuario', ),
        self::TYPE_COLNAME       => array(TCertificadoTableMap::COL_TCE_TIPO, TCertificadoTableMap::COL_TCE_DESCRIPCION, TCertificadoTableMap::COL_TCE_R_FECHA_CREACION, TCertificadoTableMap::COL_TCE_R_FECHA_MODIFICACION, TCertificadoTableMap::COL_TCE_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('tce_tipo', 'tce_descripcion', 'tce_r_fecha_creacion', 'tce_r_fecha_modificacion', 'tce_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('TceTipo' => 0, 'TceDescripcion' => 1, 'TceRFechaCreacion' => 2, 'TceRFechaModificacion' => 3, 'TceRUsuario' => 4, ),
        self::TYPE_CAMELNAME     => array('tceTipo' => 0, 'tceDescripcion' => 1, 'tceRFechaCreacion' => 2, 'tceRFechaModificacion' => 3, 'tceRUsuario' => 4, ),
        self::TYPE_COLNAME       => array(TCertificadoTableMap::COL_TCE_TIPO => 0, TCertificadoTableMap::COL_TCE_DESCRIPCION => 1, TCertificadoTableMap::COL_TCE_R_FECHA_CREACION => 2, TCertificadoTableMap::COL_TCE_R_FECHA_MODIFICACION => 3, TCertificadoTableMap::COL_TCE_R_USUARIO => 4, ),
        self::TYPE_FIELDNAME     => array('tce_tipo' => 0, 'tce_descripcion' => 1, 'tce_r_fecha_creacion' => 2, 'tce_r_fecha_modificacion' => 3, 'tce_r_usuario' => 4, ),
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
        $this->setName('t_certificado');
        $this->setPhpName('TCertificado');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\TCertificado');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('tce_tipo', 'TceTipo', 'INTEGER', true, null, null);
        $this->addColumn('tce_descripcion', 'TceDescripcion', 'VARCHAR', false, 255, null);
        $this->addColumn('tce_r_fecha_creacion', 'TceRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('tce_r_fecha_modificacion', 'TceRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('tce_r_usuario', 'TceRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Dictacion', '\\Dictacion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':dict_t_certificado',
    1 => ':tce_tipo',
  ),
), null, 'CASCADE', 'Dictacions', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TceTipo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TceTipo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TceTipo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TceTipo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TceTipo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TceTipo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('TceTipo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TCertificadoTableMap::CLASS_DEFAULT : TCertificadoTableMap::OM_CLASS;
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
     * @return array           (TCertificado object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TCertificadoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TCertificadoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TCertificadoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TCertificadoTableMap::OM_CLASS;
            /** @var TCertificado $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TCertificadoTableMap::addInstanceToPool($obj, $key);
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
            $key = TCertificadoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TCertificadoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var TCertificado $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TCertificadoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TCertificadoTableMap::COL_TCE_TIPO);
            $criteria->addSelectColumn(TCertificadoTableMap::COL_TCE_DESCRIPCION);
            $criteria->addSelectColumn(TCertificadoTableMap::COL_TCE_R_FECHA_CREACION);
            $criteria->addSelectColumn(TCertificadoTableMap::COL_TCE_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(TCertificadoTableMap::COL_TCE_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.tce_tipo');
            $criteria->addSelectColumn($alias . '.tce_descripcion');
            $criteria->addSelectColumn($alias . '.tce_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.tce_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.tce_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(TCertificadoTableMap::DATABASE_NAME)->getTable(TCertificadoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TCertificadoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TCertificadoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TCertificadoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a TCertificado or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or TCertificado object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TCertificadoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \TCertificado) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TCertificadoTableMap::DATABASE_NAME);
            $criteria->add(TCertificadoTableMap::COL_TCE_TIPO, (array) $values, Criteria::IN);
        }

        $query = TCertificadoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TCertificadoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TCertificadoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the t_certificado table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TCertificadoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a TCertificado or Criteria object.
     *
     * @param mixed               $criteria Criteria or TCertificado object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TCertificadoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from TCertificado object
        }

        if ($criteria->containsKey(TCertificadoTableMap::COL_TCE_TIPO) && $criteria->keyContainsValue(TCertificadoTableMap::COL_TCE_TIPO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TCertificadoTableMap::COL_TCE_TIPO.')');
        }


        // Set the correct dbName
        $query = TCertificadoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TCertificadoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TCertificadoTableMap::buildTableMap();
