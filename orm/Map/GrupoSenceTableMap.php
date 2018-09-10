<?php

namespace Map;

use \GrupoSence;
use \GrupoSenceQuery;
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
 * This class defines the structure of the 'grupo_sence' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class GrupoSenceTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.GrupoSenceTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'grupo_sence';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\GrupoSence';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'GrupoSence';

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
     * the column name for the grse_grupo field
     */
    const COL_GRSE_GRUPO = 'grupo_sence.grse_grupo';

    /**
     * the column name for the grse_codigo_sence field
     */
    const COL_GRSE_CODIGO_SENCE = 'grupo_sence.grse_codigo_sence';

    /**
     * the column name for the grse_nombre_grupo field
     */
    const COL_GRSE_NOMBRE_GRUPO = 'grupo_sence.grse_nombre_grupo';

    /**
     * the column name for the grse_vigente field
     */
    const COL_GRSE_VIGENTE = 'grupo_sence.grse_vigente';

    /**
     * the column name for the cagrse_r_fecha_creacion field
     */
    const COL_CAGRSE_R_FECHA_CREACION = 'grupo_sence.cagrse_r_fecha_creacion';

    /**
     * the column name for the cagrse_r_fecha_modificacion field
     */
    const COL_CAGRSE_R_FECHA_MODIFICACION = 'grupo_sence.cagrse_r_fecha_modificacion';

    /**
     * the column name for the cagrse_r_usuario field
     */
    const COL_CAGRSE_R_USUARIO = 'grupo_sence.cagrse_r_usuario';

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
        self::TYPE_PHPNAME       => array('GrseGrupo', 'GrseCodigoSence', 'GrseNombreGrupo', 'GrseVigente', 'CagrseRFechaCreacion', 'CagrseRFechaModificacion', 'CagrseRUsuario', ),
        self::TYPE_CAMELNAME     => array('grseGrupo', 'grseCodigoSence', 'grseNombreGrupo', 'grseVigente', 'cagrseRFechaCreacion', 'cagrseRFechaModificacion', 'cagrseRUsuario', ),
        self::TYPE_COLNAME       => array(GrupoSenceTableMap::COL_GRSE_GRUPO, GrupoSenceTableMap::COL_GRSE_CODIGO_SENCE, GrupoSenceTableMap::COL_GRSE_NOMBRE_GRUPO, GrupoSenceTableMap::COL_GRSE_VIGENTE, GrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION, GrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION, GrupoSenceTableMap::COL_CAGRSE_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('grse_grupo', 'grse_codigo_sence', 'grse_nombre_grupo', 'grse_vigente', 'cagrse_r_fecha_creacion', 'cagrse_r_fecha_modificacion', 'cagrse_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('GrseGrupo' => 0, 'GrseCodigoSence' => 1, 'GrseNombreGrupo' => 2, 'GrseVigente' => 3, 'CagrseRFechaCreacion' => 4, 'CagrseRFechaModificacion' => 5, 'CagrseRUsuario' => 6, ),
        self::TYPE_CAMELNAME     => array('grseGrupo' => 0, 'grseCodigoSence' => 1, 'grseNombreGrupo' => 2, 'grseVigente' => 3, 'cagrseRFechaCreacion' => 4, 'cagrseRFechaModificacion' => 5, 'cagrseRUsuario' => 6, ),
        self::TYPE_COLNAME       => array(GrupoSenceTableMap::COL_GRSE_GRUPO => 0, GrupoSenceTableMap::COL_GRSE_CODIGO_SENCE => 1, GrupoSenceTableMap::COL_GRSE_NOMBRE_GRUPO => 2, GrupoSenceTableMap::COL_GRSE_VIGENTE => 3, GrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION => 4, GrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION => 5, GrupoSenceTableMap::COL_CAGRSE_R_USUARIO => 6, ),
        self::TYPE_FIELDNAME     => array('grse_grupo' => 0, 'grse_codigo_sence' => 1, 'grse_nombre_grupo' => 2, 'grse_vigente' => 3, 'cagrse_r_fecha_creacion' => 4, 'cagrse_r_fecha_modificacion' => 5, 'cagrse_r_usuario' => 6, ),
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
        $this->setName('grupo_sence');
        $this->setPhpName('GrupoSence');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\GrupoSence');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('grse_grupo', 'GrseGrupo', 'INTEGER', true, null, null);
        $this->addColumn('grse_codigo_sence', 'GrseCodigoSence', 'VARCHAR', false, 25, null);
        $this->addColumn('grse_nombre_grupo', 'GrseNombreGrupo', 'VARCHAR', false, 255, null);
        $this->addColumn('grse_vigente', 'GrseVigente', 'INTEGER', false, 1, null);
        $this->addColumn('cagrse_r_fecha_creacion', 'CagrseRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('cagrse_r_fecha_modificacion', 'CagrseRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('cagrse_r_usuario', 'CagrseRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CargoGrupoSence', '\\CargoGrupoSence', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':cagrse_g_grupo_sence',
    1 => ':grse_grupo',
  ),
), null, 'CASCADE', 'CargoGrupoSences', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GrseGrupo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GrseGrupo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GrseGrupo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GrseGrupo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GrseGrupo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GrseGrupo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('GrseGrupo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? GrupoSenceTableMap::CLASS_DEFAULT : GrupoSenceTableMap::OM_CLASS;
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
     * @return array           (GrupoSence object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = GrupoSenceTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = GrupoSenceTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + GrupoSenceTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = GrupoSenceTableMap::OM_CLASS;
            /** @var GrupoSence $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            GrupoSenceTableMap::addInstanceToPool($obj, $key);
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
            $key = GrupoSenceTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = GrupoSenceTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var GrupoSence $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                GrupoSenceTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(GrupoSenceTableMap::COL_GRSE_GRUPO);
            $criteria->addSelectColumn(GrupoSenceTableMap::COL_GRSE_CODIGO_SENCE);
            $criteria->addSelectColumn(GrupoSenceTableMap::COL_GRSE_NOMBRE_GRUPO);
            $criteria->addSelectColumn(GrupoSenceTableMap::COL_GRSE_VIGENTE);
            $criteria->addSelectColumn(GrupoSenceTableMap::COL_CAGRSE_R_FECHA_CREACION);
            $criteria->addSelectColumn(GrupoSenceTableMap::COL_CAGRSE_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(GrupoSenceTableMap::COL_CAGRSE_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.grse_grupo');
            $criteria->addSelectColumn($alias . '.grse_codigo_sence');
            $criteria->addSelectColumn($alias . '.grse_nombre_grupo');
            $criteria->addSelectColumn($alias . '.grse_vigente');
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
        return Propel::getServiceContainer()->getDatabaseMap(GrupoSenceTableMap::DATABASE_NAME)->getTable(GrupoSenceTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(GrupoSenceTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(GrupoSenceTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new GrupoSenceTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a GrupoSence or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or GrupoSence object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(GrupoSenceTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \GrupoSence) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(GrupoSenceTableMap::DATABASE_NAME);
            $criteria->add(GrupoSenceTableMap::COL_GRSE_GRUPO, (array) $values, Criteria::IN);
        }

        $query = GrupoSenceQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            GrupoSenceTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                GrupoSenceTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the grupo_sence table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return GrupoSenceQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a GrupoSence or Criteria object.
     *
     * @param mixed               $criteria Criteria or GrupoSence object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GrupoSenceTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from GrupoSence object
        }

        if ($criteria->containsKey(GrupoSenceTableMap::COL_GRSE_GRUPO) && $criteria->keyContainsValue(GrupoSenceTableMap::COL_GRSE_GRUPO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.GrupoSenceTableMap::COL_GRSE_GRUPO.')');
        }


        // Set the correct dbName
        $query = GrupoSenceQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // GrupoSenceTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
GrupoSenceTableMap::buildTableMap();
