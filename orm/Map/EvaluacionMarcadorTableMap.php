<?php

namespace Map;

use \EvaluacionMarcador;
use \EvaluacionMarcadorQuery;
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
 * This class defines the structure of the 'evaluacion_marcador' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EvaluacionMarcadorTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EvaluacionMarcadorTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'evaluacion_marcador';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EvaluacionMarcador';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EvaluacionMarcador';

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
     * the column name for the evma_c_evaluacion field
     */
    const COL_EVMA_C_EVALUACION = 'evaluacion_marcador.evma_c_evaluacion';

    /**
     * the column name for the evma_c_marcador field
     */
    const COL_EVMA_C_MARCADOR = 'evaluacion_marcador.evma_c_marcador';

    /**
     * the column name for the evma_vigente field
     */
    const COL_EVMA_VIGENTE = 'evaluacion_marcador.evma_vigente';

    /**
     * the column name for the evma_r_fecha_creacion field
     */
    const COL_EVMA_R_FECHA_CREACION = 'evaluacion_marcador.evma_r_fecha_creacion';

    /**
     * the column name for the evma_r_fecha_modificacion field
     */
    const COL_EVMA_R_FECHA_MODIFICACION = 'evaluacion_marcador.evma_r_fecha_modificacion';

    /**
     * the column name for the evma_r_usuario field
     */
    const COL_EVMA_R_USUARIO = 'evaluacion_marcador.evma_r_usuario';

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
        self::TYPE_PHPNAME       => array('EvmaCEvaluacion', 'EvmaCMarcador', 'EvmaVigente', 'EvmaRFechaCreacion', 'EvmaRFechaModificacion', 'EvmaRUsuario', ),
        self::TYPE_CAMELNAME     => array('evmaCEvaluacion', 'evmaCMarcador', 'evmaVigente', 'evmaRFechaCreacion', 'evmaRFechaModificacion', 'evmaRUsuario', ),
        self::TYPE_COLNAME       => array(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION, EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR, EvaluacionMarcadorTableMap::COL_EVMA_VIGENTE, EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_CREACION, EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_MODIFICACION, EvaluacionMarcadorTableMap::COL_EVMA_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('evma_c_evaluacion', 'evma_c_marcador', 'evma_vigente', 'evma_r_fecha_creacion', 'evma_r_fecha_modificacion', 'evma_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('EvmaCEvaluacion' => 0, 'EvmaCMarcador' => 1, 'EvmaVigente' => 2, 'EvmaRFechaCreacion' => 3, 'EvmaRFechaModificacion' => 4, 'EvmaRUsuario' => 5, ),
        self::TYPE_CAMELNAME     => array('evmaCEvaluacion' => 0, 'evmaCMarcador' => 1, 'evmaVigente' => 2, 'evmaRFechaCreacion' => 3, 'evmaRFechaModificacion' => 4, 'evmaRUsuario' => 5, ),
        self::TYPE_COLNAME       => array(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION => 0, EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR => 1, EvaluacionMarcadorTableMap::COL_EVMA_VIGENTE => 2, EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_CREACION => 3, EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_MODIFICACION => 4, EvaluacionMarcadorTableMap::COL_EVMA_R_USUARIO => 5, ),
        self::TYPE_FIELDNAME     => array('evma_c_evaluacion' => 0, 'evma_c_marcador' => 1, 'evma_vigente' => 2, 'evma_r_fecha_creacion' => 3, 'evma_r_fecha_modificacion' => 4, 'evma_r_usuario' => 5, ),
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
        $this->setName('evaluacion_marcador');
        $this->setPhpName('EvaluacionMarcador');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EvaluacionMarcador');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('evma_c_evaluacion', 'EvmaCEvaluacion', 'INTEGER' , 'evaluacion', 'eval_codigo', true, null, null);
        $this->addForeignPrimaryKey('evma_c_marcador', 'EvmaCMarcador', 'INTEGER' , 'marcador', 'marc_codigo', true, null, null);
        $this->addColumn('evma_vigente', 'EvmaVigente', 'INTEGER', false, 1, null);
        $this->addColumn('evma_r_fecha_creacion', 'EvmaRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('evma_r_fecha_modificacion', 'EvmaRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('evma_r_usuario', 'EvmaRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Evaluacion', '\\Evaluacion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':evma_c_evaluacion',
    1 => ':eval_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Marcador', '\\Marcador', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':evma_c_marcador',
    1 => ':marc_codigo',
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
     * @param \EvaluacionMarcador $obj A \EvaluacionMarcador object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getEvmaCEvaluacion() || is_scalar($obj->getEvmaCEvaluacion()) || is_callable([$obj->getEvmaCEvaluacion(), '__toString']) ? (string) $obj->getEvmaCEvaluacion() : $obj->getEvmaCEvaluacion()), (null === $obj->getEvmaCMarcador() || is_scalar($obj->getEvmaCMarcador()) || is_callable([$obj->getEvmaCMarcador(), '__toString']) ? (string) $obj->getEvmaCMarcador() : $obj->getEvmaCMarcador())]);
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
     * @param mixed $value A \EvaluacionMarcador object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \EvaluacionMarcador) {
                $key = serialize([(null === $value->getEvmaCEvaluacion() || is_scalar($value->getEvmaCEvaluacion()) || is_callable([$value->getEvmaCEvaluacion(), '__toString']) ? (string) $value->getEvmaCEvaluacion() : $value->getEvmaCEvaluacion()), (null === $value->getEvmaCMarcador() || is_scalar($value->getEvmaCMarcador()) || is_callable([$value->getEvmaCMarcador(), '__toString']) ? (string) $value->getEvmaCMarcador() : $value->getEvmaCMarcador())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \EvaluacionMarcador object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvmaCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvmaCMarcador', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvmaCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvmaCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvmaCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvmaCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvmaCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvmaCMarcador', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvmaCMarcador', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvmaCMarcador', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvmaCMarcador', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvmaCMarcador', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('EvmaCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('EvmaCMarcador', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EvaluacionMarcadorTableMap::CLASS_DEFAULT : EvaluacionMarcadorTableMap::OM_CLASS;
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
     * @return array           (EvaluacionMarcador object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EvaluacionMarcadorTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EvaluacionMarcadorTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EvaluacionMarcadorTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EvaluacionMarcadorTableMap::OM_CLASS;
            /** @var EvaluacionMarcador $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EvaluacionMarcadorTableMap::addInstanceToPool($obj, $key);
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
            $key = EvaluacionMarcadorTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EvaluacionMarcadorTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EvaluacionMarcador $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EvaluacionMarcadorTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION);
            $criteria->addSelectColumn(EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR);
            $criteria->addSelectColumn(EvaluacionMarcadorTableMap::COL_EVMA_VIGENTE);
            $criteria->addSelectColumn(EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_CREACION);
            $criteria->addSelectColumn(EvaluacionMarcadorTableMap::COL_EVMA_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(EvaluacionMarcadorTableMap::COL_EVMA_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.evma_c_evaluacion');
            $criteria->addSelectColumn($alias . '.evma_c_marcador');
            $criteria->addSelectColumn($alias . '.evma_vigente');
            $criteria->addSelectColumn($alias . '.evma_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.evma_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.evma_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(EvaluacionMarcadorTableMap::DATABASE_NAME)->getTable(EvaluacionMarcadorTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EvaluacionMarcadorTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EvaluacionMarcadorTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EvaluacionMarcadorTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EvaluacionMarcador or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EvaluacionMarcador object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionMarcadorTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EvaluacionMarcador) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EvaluacionMarcadorTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(EvaluacionMarcadorTableMap::COL_EVMA_C_EVALUACION, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(EvaluacionMarcadorTableMap::COL_EVMA_C_MARCADOR, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = EvaluacionMarcadorQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EvaluacionMarcadorTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EvaluacionMarcadorTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the evaluacion_marcador table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EvaluacionMarcadorQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EvaluacionMarcador or Criteria object.
     *
     * @param mixed               $criteria Criteria or EvaluacionMarcador object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionMarcadorTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EvaluacionMarcador object
        }


        // Set the correct dbName
        $query = EvaluacionMarcadorQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EvaluacionMarcadorTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EvaluacionMarcadorTableMap::buildTableMap();
