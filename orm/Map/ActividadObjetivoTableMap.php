<?php

namespace Map;

use \ActividadObjetivo;
use \ActividadObjetivoQuery;
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
 * This class defines the structure of the 'actividad_objetivo' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ActividadObjetivoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ActividadObjetivoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'actividad_objetivo';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ActividadObjetivo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ActividadObjetivo';

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
     * the column name for the acob_c_actividad field
     */
    const COL_ACOB_C_ACTIVIDAD = 'actividad_objetivo.acob_c_actividad';

    /**
     * the column name for the acob_c_objetivo field
     */
    const COL_ACOB_C_OBJETIVO = 'actividad_objetivo.acob_c_objetivo';

    /**
     * the column name for the acob_cantidad_preguntas field
     */
    const COL_ACOB_CANTIDAD_PREGUNTAS = 'actividad_objetivo.acob_cantidad_preguntas';

    /**
     * the column name for the acob_vigente field
     */
    const COL_ACOB_VIGENTE = 'actividad_objetivo.acob_vigente';

    /**
     * the column name for the acob_r_fecha_creacion field
     */
    const COL_ACOB_R_FECHA_CREACION = 'actividad_objetivo.acob_r_fecha_creacion';

    /**
     * the column name for the acob_r_fecha_modificacion field
     */
    const COL_ACOB_R_FECHA_MODIFICACION = 'actividad_objetivo.acob_r_fecha_modificacion';

    /**
     * the column name for the acob_r_usuario field
     */
    const COL_ACOB_R_USUARIO = 'actividad_objetivo.acob_r_usuario';

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
        self::TYPE_PHPNAME       => array('AcobCActividad', 'AcobCObjetivo', 'AcobCantidadPreguntas', 'AcobVigente', 'AcobRFechaCreacion', 'AcobRFechaModificacion', 'AcobRUsuario', ),
        self::TYPE_CAMELNAME     => array('acobCActividad', 'acobCObjetivo', 'acobCantidadPreguntas', 'acobVigente', 'acobRFechaCreacion', 'acobRFechaModificacion', 'acobRUsuario', ),
        self::TYPE_COLNAME       => array(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD, ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO, ActividadObjetivoTableMap::COL_ACOB_CANTIDAD_PREGUNTAS, ActividadObjetivoTableMap::COL_ACOB_VIGENTE, ActividadObjetivoTableMap::COL_ACOB_R_FECHA_CREACION, ActividadObjetivoTableMap::COL_ACOB_R_FECHA_MODIFICACION, ActividadObjetivoTableMap::COL_ACOB_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('acob_c_actividad', 'acob_c_objetivo', 'acob_cantidad_preguntas', 'acob_vigente', 'acob_r_fecha_creacion', 'acob_r_fecha_modificacion', 'acob_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('AcobCActividad' => 0, 'AcobCObjetivo' => 1, 'AcobCantidadPreguntas' => 2, 'AcobVigente' => 3, 'AcobRFechaCreacion' => 4, 'AcobRFechaModificacion' => 5, 'AcobRUsuario' => 6, ),
        self::TYPE_CAMELNAME     => array('acobCActividad' => 0, 'acobCObjetivo' => 1, 'acobCantidadPreguntas' => 2, 'acobVigente' => 3, 'acobRFechaCreacion' => 4, 'acobRFechaModificacion' => 5, 'acobRUsuario' => 6, ),
        self::TYPE_COLNAME       => array(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD => 0, ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO => 1, ActividadObjetivoTableMap::COL_ACOB_CANTIDAD_PREGUNTAS => 2, ActividadObjetivoTableMap::COL_ACOB_VIGENTE => 3, ActividadObjetivoTableMap::COL_ACOB_R_FECHA_CREACION => 4, ActividadObjetivoTableMap::COL_ACOB_R_FECHA_MODIFICACION => 5, ActividadObjetivoTableMap::COL_ACOB_R_USUARIO => 6, ),
        self::TYPE_FIELDNAME     => array('acob_c_actividad' => 0, 'acob_c_objetivo' => 1, 'acob_cantidad_preguntas' => 2, 'acob_vigente' => 3, 'acob_r_fecha_creacion' => 4, 'acob_r_fecha_modificacion' => 5, 'acob_r_usuario' => 6, ),
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
        $this->setName('actividad_objetivo');
        $this->setPhpName('ActividadObjetivo');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ActividadObjetivo');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('acob_c_actividad', 'AcobCActividad', 'INTEGER' , 'actividad', 'acti_codigo', true, null, null);
        $this->addForeignPrimaryKey('acob_c_objetivo', 'AcobCObjetivo', 'INTEGER' , 'objetivo', 'obje_codigo', true, null, null);
        $this->addColumn('acob_cantidad_preguntas', 'AcobCantidadPreguntas', 'INTEGER', true, null, null);
        $this->addColumn('acob_vigente', 'AcobVigente', 'INTEGER', false, 1, null);
        $this->addColumn('acob_r_fecha_creacion', 'AcobRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('acob_r_fecha_modificacion', 'AcobRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('acob_r_usuario', 'AcobRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Actividad', '\\Actividad', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':acob_c_actividad',
    1 => ':acti_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Objetivo', '\\Objetivo', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':acob_c_objetivo',
    1 => ':obje_codigo',
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
     * @param \ActividadObjetivo $obj A \ActividadObjetivo object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getAcobCActividad() || is_scalar($obj->getAcobCActividad()) || is_callable([$obj->getAcobCActividad(), '__toString']) ? (string) $obj->getAcobCActividad() : $obj->getAcobCActividad()), (null === $obj->getAcobCObjetivo() || is_scalar($obj->getAcobCObjetivo()) || is_callable([$obj->getAcobCObjetivo(), '__toString']) ? (string) $obj->getAcobCObjetivo() : $obj->getAcobCObjetivo())]);
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
     * @param mixed $value A \ActividadObjetivo object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \ActividadObjetivo) {
                $key = serialize([(null === $value->getAcobCActividad() || is_scalar($value->getAcobCActividad()) || is_callable([$value->getAcobCActividad(), '__toString']) ? (string) $value->getAcobCActividad() : $value->getAcobCActividad()), (null === $value->getAcobCObjetivo() || is_scalar($value->getAcobCObjetivo()) || is_callable([$value->getAcobCObjetivo(), '__toString']) ? (string) $value->getAcobCObjetivo() : $value->getAcobCObjetivo())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \ActividadObjetivo object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AcobCActividad', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AcobCObjetivo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AcobCActividad', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AcobCActividad', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AcobCActividad', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AcobCActividad', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AcobCActividad', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AcobCObjetivo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AcobCObjetivo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AcobCObjetivo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AcobCObjetivo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('AcobCObjetivo', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('AcobCActividad', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('AcobCObjetivo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ActividadObjetivoTableMap::CLASS_DEFAULT : ActividadObjetivoTableMap::OM_CLASS;
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
     * @return array           (ActividadObjetivo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ActividadObjetivoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ActividadObjetivoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ActividadObjetivoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ActividadObjetivoTableMap::OM_CLASS;
            /** @var ActividadObjetivo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ActividadObjetivoTableMap::addInstanceToPool($obj, $key);
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
            $key = ActividadObjetivoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ActividadObjetivoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ActividadObjetivo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ActividadObjetivoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD);
            $criteria->addSelectColumn(ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO);
            $criteria->addSelectColumn(ActividadObjetivoTableMap::COL_ACOB_CANTIDAD_PREGUNTAS);
            $criteria->addSelectColumn(ActividadObjetivoTableMap::COL_ACOB_VIGENTE);
            $criteria->addSelectColumn(ActividadObjetivoTableMap::COL_ACOB_R_FECHA_CREACION);
            $criteria->addSelectColumn(ActividadObjetivoTableMap::COL_ACOB_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(ActividadObjetivoTableMap::COL_ACOB_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.acob_c_actividad');
            $criteria->addSelectColumn($alias . '.acob_c_objetivo');
            $criteria->addSelectColumn($alias . '.acob_cantidad_preguntas');
            $criteria->addSelectColumn($alias . '.acob_vigente');
            $criteria->addSelectColumn($alias . '.acob_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.acob_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.acob_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(ActividadObjetivoTableMap::DATABASE_NAME)->getTable(ActividadObjetivoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ActividadObjetivoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ActividadObjetivoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ActividadObjetivoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ActividadObjetivo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ActividadObjetivo object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadObjetivoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ActividadObjetivo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ActividadObjetivoTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(ActividadObjetivoTableMap::COL_ACOB_C_ACTIVIDAD, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(ActividadObjetivoTableMap::COL_ACOB_C_OBJETIVO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = ActividadObjetivoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ActividadObjetivoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ActividadObjetivoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the actividad_objetivo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ActividadObjetivoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ActividadObjetivo or Criteria object.
     *
     * @param mixed               $criteria Criteria or ActividadObjetivo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadObjetivoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ActividadObjetivo object
        }


        // Set the correct dbName
        $query = ActividadObjetivoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ActividadObjetivoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ActividadObjetivoTableMap::buildTableMap();
