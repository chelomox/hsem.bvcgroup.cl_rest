<?php

namespace Map;

use \Objetivo;
use \ObjetivoQuery;
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
 * This class defines the structure of the 'objetivo' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ObjetivoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ObjetivoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'objetivo';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Objetivo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Objetivo';

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
     * the column name for the obje_codigo field
     */
    const COL_OBJE_CODIGO = 'objetivo.obje_codigo';

    /**
     * the column name for the obje_sigla field
     */
    const COL_OBJE_SIGLA = 'objetivo.obje_sigla';

    /**
     * the column name for the obje_descripcion field
     */
    const COL_OBJE_DESCRIPCION = 'objetivo.obje_descripcion';

    /**
     * the column name for the obje_r_fecha_creacion field
     */
    const COL_OBJE_R_FECHA_CREACION = 'objetivo.obje_r_fecha_creacion';

    /**
     * the column name for the obje_r_fecha_modificacion field
     */
    const COL_OBJE_R_FECHA_MODIFICACION = 'objetivo.obje_r_fecha_modificacion';

    /**
     * the column name for the obje_r_usuario field
     */
    const COL_OBJE_R_USUARIO = 'objetivo.obje_r_usuario';

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
        self::TYPE_PHPNAME       => array('ObjeCodigo', 'ObjeSigla', 'ObjeDescripcion', 'ObjeRFechaCreacion', 'ObjeRFechaModificacion', 'ObjeRUsuario', ),
        self::TYPE_CAMELNAME     => array('objeCodigo', 'objeSigla', 'objeDescripcion', 'objeRFechaCreacion', 'objeRFechaModificacion', 'objeRUsuario', ),
        self::TYPE_COLNAME       => array(ObjetivoTableMap::COL_OBJE_CODIGO, ObjetivoTableMap::COL_OBJE_SIGLA, ObjetivoTableMap::COL_OBJE_DESCRIPCION, ObjetivoTableMap::COL_OBJE_R_FECHA_CREACION, ObjetivoTableMap::COL_OBJE_R_FECHA_MODIFICACION, ObjetivoTableMap::COL_OBJE_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('obje_codigo', 'obje_sigla', 'obje_descripcion', 'obje_r_fecha_creacion', 'obje_r_fecha_modificacion', 'obje_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ObjeCodigo' => 0, 'ObjeSigla' => 1, 'ObjeDescripcion' => 2, 'ObjeRFechaCreacion' => 3, 'ObjeRFechaModificacion' => 4, 'ObjeRUsuario' => 5, ),
        self::TYPE_CAMELNAME     => array('objeCodigo' => 0, 'objeSigla' => 1, 'objeDescripcion' => 2, 'objeRFechaCreacion' => 3, 'objeRFechaModificacion' => 4, 'objeRUsuario' => 5, ),
        self::TYPE_COLNAME       => array(ObjetivoTableMap::COL_OBJE_CODIGO => 0, ObjetivoTableMap::COL_OBJE_SIGLA => 1, ObjetivoTableMap::COL_OBJE_DESCRIPCION => 2, ObjetivoTableMap::COL_OBJE_R_FECHA_CREACION => 3, ObjetivoTableMap::COL_OBJE_R_FECHA_MODIFICACION => 4, ObjetivoTableMap::COL_OBJE_R_USUARIO => 5, ),
        self::TYPE_FIELDNAME     => array('obje_codigo' => 0, 'obje_sigla' => 1, 'obje_descripcion' => 2, 'obje_r_fecha_creacion' => 3, 'obje_r_fecha_modificacion' => 4, 'obje_r_usuario' => 5, ),
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
        $this->setName('objetivo');
        $this->setPhpName('Objetivo');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Objetivo');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('obje_codigo', 'ObjeCodigo', 'INTEGER', true, null, null);
        $this->addColumn('obje_sigla', 'ObjeSigla', 'VARCHAR', false, 15, null);
        $this->addColumn('obje_descripcion', 'ObjeDescripcion', 'VARCHAR', false, 255, null);
        $this->addColumn('obje_r_fecha_creacion', 'ObjeRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('obje_r_fecha_modificacion', 'ObjeRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('obje_r_usuario', 'ObjeRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ActividadObjetivo', '\\ActividadObjetivo', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':acob_c_objetivo',
    1 => ':obje_codigo',
  ),
), null, 'CASCADE', 'ActividadObjetivos', false);
        $this->addRelation('EvaluacionPregunta', '\\EvaluacionPregunta', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':evpr_c_objetivo',
    1 => ':obje_codigo',
  ),
), null, 'CASCADE', 'EvaluacionPreguntas', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ObjeCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ObjeCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ObjeCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ObjeCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ObjeCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ObjeCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ObjeCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ObjetivoTableMap::CLASS_DEFAULT : ObjetivoTableMap::OM_CLASS;
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
     * @return array           (Objetivo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ObjetivoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ObjetivoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ObjetivoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ObjetivoTableMap::OM_CLASS;
            /** @var Objetivo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ObjetivoTableMap::addInstanceToPool($obj, $key);
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
            $key = ObjetivoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ObjetivoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Objetivo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ObjetivoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ObjetivoTableMap::COL_OBJE_CODIGO);
            $criteria->addSelectColumn(ObjetivoTableMap::COL_OBJE_SIGLA);
            $criteria->addSelectColumn(ObjetivoTableMap::COL_OBJE_DESCRIPCION);
            $criteria->addSelectColumn(ObjetivoTableMap::COL_OBJE_R_FECHA_CREACION);
            $criteria->addSelectColumn(ObjetivoTableMap::COL_OBJE_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(ObjetivoTableMap::COL_OBJE_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.obje_codigo');
            $criteria->addSelectColumn($alias . '.obje_sigla');
            $criteria->addSelectColumn($alias . '.obje_descripcion');
            $criteria->addSelectColumn($alias . '.obje_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.obje_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.obje_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(ObjetivoTableMap::DATABASE_NAME)->getTable(ObjetivoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ObjetivoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ObjetivoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ObjetivoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Objetivo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Objetivo object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ObjetivoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Objetivo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ObjetivoTableMap::DATABASE_NAME);
            $criteria->add(ObjetivoTableMap::COL_OBJE_CODIGO, (array) $values, Criteria::IN);
        }

        $query = ObjetivoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ObjetivoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ObjetivoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the objetivo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ObjetivoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Objetivo or Criteria object.
     *
     * @param mixed               $criteria Criteria or Objetivo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ObjetivoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Objetivo object
        }

        if ($criteria->containsKey(ObjetivoTableMap::COL_OBJE_CODIGO) && $criteria->keyContainsValue(ObjetivoTableMap::COL_OBJE_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ObjetivoTableMap::COL_OBJE_CODIGO.')');
        }


        // Set the correct dbName
        $query = ObjetivoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ObjetivoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ObjetivoTableMap::buildTableMap();
