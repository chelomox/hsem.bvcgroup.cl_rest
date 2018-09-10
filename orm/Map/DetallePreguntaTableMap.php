<?php

namespace Map;

use \DetallePregunta;
use \DetallePreguntaQuery;
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
 * This class defines the structure of the 'detalle_pregunta' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DetallePreguntaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DetallePreguntaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'detalle_pregunta';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\DetallePregunta';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'DetallePregunta';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the depr_c_pregunta field
     */
    const COL_DEPR_C_PREGUNTA = 'detalle_pregunta.depr_c_pregunta';

    /**
     * the column name for the depr_c_opcion_pregunta field
     */
    const COL_DEPR_C_OPCION_PREGUNTA = 'detalle_pregunta.depr_c_opcion_pregunta';

    /**
     * the column name for the depr_es_correcta field
     */
    const COL_DEPR_ES_CORRECTA = 'detalle_pregunta.depr_es_correcta';

    /**
     * the column name for the depr_orden field
     */
    const COL_DEPR_ORDEN = 'detalle_pregunta.depr_orden';

    /**
     * the column name for the depr_vigente field
     */
    const COL_DEPR_VIGENTE = 'detalle_pregunta.depr_vigente';

    /**
     * the column name for the depr_r_fecha_creacion field
     */
    const COL_DEPR_R_FECHA_CREACION = 'detalle_pregunta.depr_r_fecha_creacion';

    /**
     * the column name for the depr_r_fecha_modificacion field
     */
    const COL_DEPR_R_FECHA_MODIFICACION = 'detalle_pregunta.depr_r_fecha_modificacion';

    /**
     * the column name for the depr_r_usuario field
     */
    const COL_DEPR_R_USUARIO = 'detalle_pregunta.depr_r_usuario';

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
        self::TYPE_PHPNAME       => array('DeprCPregunta', 'DeprCOpcionPregunta', 'DeprEsCorrecta', 'DeprOrden', 'DeprVigente', 'DeprRFechaCreacion', 'DeprRFechaModificacion', 'DeprRUsuario', ),
        self::TYPE_CAMELNAME     => array('deprCPregunta', 'deprCOpcionPregunta', 'deprEsCorrecta', 'deprOrden', 'deprVigente', 'deprRFechaCreacion', 'deprRFechaModificacion', 'deprRUsuario', ),
        self::TYPE_COLNAME       => array(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA, DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA, DetallePreguntaTableMap::COL_DEPR_ES_CORRECTA, DetallePreguntaTableMap::COL_DEPR_ORDEN, DetallePreguntaTableMap::COL_DEPR_VIGENTE, DetallePreguntaTableMap::COL_DEPR_R_FECHA_CREACION, DetallePreguntaTableMap::COL_DEPR_R_FECHA_MODIFICACION, DetallePreguntaTableMap::COL_DEPR_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('depr_c_pregunta', 'depr_c_opcion_pregunta', 'depr_es_correcta', 'depr_orden', 'depr_vigente', 'depr_r_fecha_creacion', 'depr_r_fecha_modificacion', 'depr_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('DeprCPregunta' => 0, 'DeprCOpcionPregunta' => 1, 'DeprEsCorrecta' => 2, 'DeprOrden' => 3, 'DeprVigente' => 4, 'DeprRFechaCreacion' => 5, 'DeprRFechaModificacion' => 6, 'DeprRUsuario' => 7, ),
        self::TYPE_CAMELNAME     => array('deprCPregunta' => 0, 'deprCOpcionPregunta' => 1, 'deprEsCorrecta' => 2, 'deprOrden' => 3, 'deprVigente' => 4, 'deprRFechaCreacion' => 5, 'deprRFechaModificacion' => 6, 'deprRUsuario' => 7, ),
        self::TYPE_COLNAME       => array(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA => 0, DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA => 1, DetallePreguntaTableMap::COL_DEPR_ES_CORRECTA => 2, DetallePreguntaTableMap::COL_DEPR_ORDEN => 3, DetallePreguntaTableMap::COL_DEPR_VIGENTE => 4, DetallePreguntaTableMap::COL_DEPR_R_FECHA_CREACION => 5, DetallePreguntaTableMap::COL_DEPR_R_FECHA_MODIFICACION => 6, DetallePreguntaTableMap::COL_DEPR_R_USUARIO => 7, ),
        self::TYPE_FIELDNAME     => array('depr_c_pregunta' => 0, 'depr_c_opcion_pregunta' => 1, 'depr_es_correcta' => 2, 'depr_orden' => 3, 'depr_vigente' => 4, 'depr_r_fecha_creacion' => 5, 'depr_r_fecha_modificacion' => 6, 'depr_r_usuario' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('detalle_pregunta');
        $this->setPhpName('DetallePregunta');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\DetallePregunta');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('depr_c_pregunta', 'DeprCPregunta', 'INTEGER' , 'pregunta', 'preg_codigo', true, null, null);
        $this->addForeignPrimaryKey('depr_c_opcion_pregunta', 'DeprCOpcionPregunta', 'INTEGER' , 'opcion_pregunta', 'oppr_codigo', true, null, null);
        $this->addColumn('depr_es_correcta', 'DeprEsCorrecta', 'INTEGER', false, 1, null);
        $this->addColumn('depr_orden', 'DeprOrden', 'INTEGER', false, 2, null);
        $this->addColumn('depr_vigente', 'DeprVigente', 'INTEGER', false, 1, null);
        $this->addColumn('depr_r_fecha_creacion', 'DeprRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('depr_r_fecha_modificacion', 'DeprRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('depr_r_usuario', 'DeprRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('OpcionPregunta', '\\OpcionPregunta', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':depr_c_opcion_pregunta',
    1 => ':oppr_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Pregunta', '\\Pregunta', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':depr_c_pregunta',
    1 => ':preg_codigo',
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
     * @param \DetallePregunta $obj A \DetallePregunta object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getDeprCPregunta() || is_scalar($obj->getDeprCPregunta()) || is_callable([$obj->getDeprCPregunta(), '__toString']) ? (string) $obj->getDeprCPregunta() : $obj->getDeprCPregunta()), (null === $obj->getDeprCOpcionPregunta() || is_scalar($obj->getDeprCOpcionPregunta()) || is_callable([$obj->getDeprCOpcionPregunta(), '__toString']) ? (string) $obj->getDeprCOpcionPregunta() : $obj->getDeprCOpcionPregunta())]);
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
     * @param mixed $value A \DetallePregunta object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \DetallePregunta) {
                $key = serialize([(null === $value->getDeprCPregunta() || is_scalar($value->getDeprCPregunta()) || is_callable([$value->getDeprCPregunta(), '__toString']) ? (string) $value->getDeprCPregunta() : $value->getDeprCPregunta()), (null === $value->getDeprCOpcionPregunta() || is_scalar($value->getDeprCOpcionPregunta()) || is_callable([$value->getDeprCOpcionPregunta(), '__toString']) ? (string) $value->getDeprCOpcionPregunta() : $value->getDeprCOpcionPregunta())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \DetallePregunta object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DeprCPregunta', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DeprCOpcionPregunta', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DeprCPregunta', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DeprCPregunta', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DeprCPregunta', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DeprCPregunta', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DeprCPregunta', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DeprCOpcionPregunta', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DeprCOpcionPregunta', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DeprCOpcionPregunta', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DeprCOpcionPregunta', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DeprCOpcionPregunta', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('DeprCPregunta', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('DeprCOpcionPregunta', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? DetallePreguntaTableMap::CLASS_DEFAULT : DetallePreguntaTableMap::OM_CLASS;
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
     * @return array           (DetallePregunta object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DetallePreguntaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DetallePreguntaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DetallePreguntaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DetallePreguntaTableMap::OM_CLASS;
            /** @var DetallePregunta $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DetallePreguntaTableMap::addInstanceToPool($obj, $key);
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
            $key = DetallePreguntaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DetallePreguntaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var DetallePregunta $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DetallePreguntaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA);
            $criteria->addSelectColumn(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA);
            $criteria->addSelectColumn(DetallePreguntaTableMap::COL_DEPR_ES_CORRECTA);
            $criteria->addSelectColumn(DetallePreguntaTableMap::COL_DEPR_ORDEN);
            $criteria->addSelectColumn(DetallePreguntaTableMap::COL_DEPR_VIGENTE);
            $criteria->addSelectColumn(DetallePreguntaTableMap::COL_DEPR_R_FECHA_CREACION);
            $criteria->addSelectColumn(DetallePreguntaTableMap::COL_DEPR_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(DetallePreguntaTableMap::COL_DEPR_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.depr_c_pregunta');
            $criteria->addSelectColumn($alias . '.depr_c_opcion_pregunta');
            $criteria->addSelectColumn($alias . '.depr_es_correcta');
            $criteria->addSelectColumn($alias . '.depr_orden');
            $criteria->addSelectColumn($alias . '.depr_vigente');
            $criteria->addSelectColumn($alias . '.depr_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.depr_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.depr_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(DetallePreguntaTableMap::DATABASE_NAME)->getTable(DetallePreguntaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DetallePreguntaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DetallePreguntaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DetallePreguntaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a DetallePregunta or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or DetallePregunta object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DetallePreguntaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \DetallePregunta) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DetallePreguntaTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(DetallePreguntaTableMap::COL_DEPR_C_PREGUNTA, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(DetallePreguntaTableMap::COL_DEPR_C_OPCION_PREGUNTA, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = DetallePreguntaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DetallePreguntaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DetallePreguntaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the detalle_pregunta table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DetallePreguntaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a DetallePregunta or Criteria object.
     *
     * @param mixed               $criteria Criteria or DetallePregunta object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DetallePreguntaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from DetallePregunta object
        }


        // Set the correct dbName
        $query = DetallePreguntaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DetallePreguntaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DetallePreguntaTableMap::buildTableMap();
