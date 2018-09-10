<?php

namespace Map;

use \EvaluacionPregunta;
use \EvaluacionPreguntaQuery;
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
 * This class defines the structure of the 'evaluacion_pregunta' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EvaluacionPreguntaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EvaluacionPreguntaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'evaluacion_pregunta';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EvaluacionPregunta';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EvaluacionPregunta';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the evpr_codigo field
     */
    const COL_EVPR_CODIGO = 'evaluacion_pregunta.evpr_codigo';

    /**
     * the column name for the evpr_c_evaluacion field
     */
    const COL_EVPR_C_EVALUACION = 'evaluacion_pregunta.evpr_c_evaluacion';

    /**
     * the column name for the evpr_c_pregunta field
     */
    const COL_EVPR_C_PREGUNTA = 'evaluacion_pregunta.evpr_c_pregunta';

    /**
     * the column name for the evpr_c_objetivo field
     */
    const COL_EVPR_C_OBJETIVO = 'evaluacion_pregunta.evpr_c_objetivo';

    /**
     * the column name for the evpr_c_seccion field
     */
    const COL_EVPR_C_SECCION = 'evaluacion_pregunta.evpr_c_seccion';

    /**
     * the column name for the evpr_orden field
     */
    const COL_EVPR_ORDEN = 'evaluacion_pregunta.evpr_orden';

    /**
     * the column name for the evpr_r_fecha_creacion field
     */
    const COL_EVPR_R_FECHA_CREACION = 'evaluacion_pregunta.evpr_r_fecha_creacion';

    /**
     * the column name for the evpr_r_fecha_modificacion field
     */
    const COL_EVPR_R_FECHA_MODIFICACION = 'evaluacion_pregunta.evpr_r_fecha_modificacion';

    /**
     * the column name for the evpr_r_usuario field
     */
    const COL_EVPR_R_USUARIO = 'evaluacion_pregunta.evpr_r_usuario';

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
        self::TYPE_PHPNAME       => array('EvprCodigo', 'EvprCEvaluacion', 'EvprCPregunta', 'EvprCObjetivo', 'EvprCSeccion', 'EvprOrden', 'EvprRFechaCreacion', 'EvprRFechaModificacion', 'EvprRUsuario', ),
        self::TYPE_CAMELNAME     => array('evprCodigo', 'evprCEvaluacion', 'evprCPregunta', 'evprCObjetivo', 'evprCSeccion', 'evprOrden', 'evprRFechaCreacion', 'evprRFechaModificacion', 'evprRUsuario', ),
        self::TYPE_COLNAME       => array(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO, EvaluacionPreguntaTableMap::COL_EVPR_C_EVALUACION, EvaluacionPreguntaTableMap::COL_EVPR_C_PREGUNTA, EvaluacionPreguntaTableMap::COL_EVPR_C_OBJETIVO, EvaluacionPreguntaTableMap::COL_EVPR_C_SECCION, EvaluacionPreguntaTableMap::COL_EVPR_ORDEN, EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_CREACION, EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_MODIFICACION, EvaluacionPreguntaTableMap::COL_EVPR_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('evpr_codigo', 'evpr_c_evaluacion', 'evpr_c_pregunta', 'evpr_c_objetivo', 'evpr_c_seccion', 'evpr_orden', 'evpr_r_fecha_creacion', 'evpr_r_fecha_modificacion', 'evpr_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('EvprCodigo' => 0, 'EvprCEvaluacion' => 1, 'EvprCPregunta' => 2, 'EvprCObjetivo' => 3, 'EvprCSeccion' => 4, 'EvprOrden' => 5, 'EvprRFechaCreacion' => 6, 'EvprRFechaModificacion' => 7, 'EvprRUsuario' => 8, ),
        self::TYPE_CAMELNAME     => array('evprCodigo' => 0, 'evprCEvaluacion' => 1, 'evprCPregunta' => 2, 'evprCObjetivo' => 3, 'evprCSeccion' => 4, 'evprOrden' => 5, 'evprRFechaCreacion' => 6, 'evprRFechaModificacion' => 7, 'evprRUsuario' => 8, ),
        self::TYPE_COLNAME       => array(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO => 0, EvaluacionPreguntaTableMap::COL_EVPR_C_EVALUACION => 1, EvaluacionPreguntaTableMap::COL_EVPR_C_PREGUNTA => 2, EvaluacionPreguntaTableMap::COL_EVPR_C_OBJETIVO => 3, EvaluacionPreguntaTableMap::COL_EVPR_C_SECCION => 4, EvaluacionPreguntaTableMap::COL_EVPR_ORDEN => 5, EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_CREACION => 6, EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_MODIFICACION => 7, EvaluacionPreguntaTableMap::COL_EVPR_R_USUARIO => 8, ),
        self::TYPE_FIELDNAME     => array('evpr_codigo' => 0, 'evpr_c_evaluacion' => 1, 'evpr_c_pregunta' => 2, 'evpr_c_objetivo' => 3, 'evpr_c_seccion' => 4, 'evpr_orden' => 5, 'evpr_r_fecha_creacion' => 6, 'evpr_r_fecha_modificacion' => 7, 'evpr_r_usuario' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('evaluacion_pregunta');
        $this->setPhpName('EvaluacionPregunta');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EvaluacionPregunta');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('evpr_codigo', 'EvprCodigo', 'INTEGER', true, null, null);
        $this->addForeignKey('evpr_c_evaluacion', 'EvprCEvaluacion', 'INTEGER', 'evaluacion', 'eval_codigo', true, null, null);
        $this->addForeignKey('evpr_c_pregunta', 'EvprCPregunta', 'INTEGER', 'pregunta', 'preg_codigo', true, null, null);
        $this->addForeignKey('evpr_c_objetivo', 'EvprCObjetivo', 'INTEGER', 'objetivo', 'obje_codigo', true, null, null);
        $this->addForeignKey('evpr_c_seccion', 'EvprCSeccion', 'INTEGER', 'seccion', 'secc_codigo', true, null, null);
        $this->addColumn('evpr_orden', 'EvprOrden', 'INTEGER', false, 1, null);
        $this->addColumn('evpr_r_fecha_creacion', 'EvprRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('evpr_r_fecha_modificacion', 'EvprRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('evpr_r_usuario', 'EvprRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Evaluacion', '\\Evaluacion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':evpr_c_evaluacion',
    1 => ':eval_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Objetivo', '\\Objetivo', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':evpr_c_objetivo',
    1 => ':obje_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Pregunta', '\\Pregunta', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':evpr_c_pregunta',
    1 => ':preg_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Seccion', '\\Seccion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':evpr_c_seccion',
    1 => ':secc_codigo',
  ),
), null, 'CASCADE', null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvprCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvprCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvprCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvprCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvprCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvprCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('EvprCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EvaluacionPreguntaTableMap::CLASS_DEFAULT : EvaluacionPreguntaTableMap::OM_CLASS;
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
     * @return array           (EvaluacionPregunta object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EvaluacionPreguntaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EvaluacionPreguntaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EvaluacionPreguntaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EvaluacionPreguntaTableMap::OM_CLASS;
            /** @var EvaluacionPregunta $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EvaluacionPreguntaTableMap::addInstanceToPool($obj, $key);
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
            $key = EvaluacionPreguntaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EvaluacionPreguntaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EvaluacionPregunta $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EvaluacionPreguntaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO);
            $criteria->addSelectColumn(EvaluacionPreguntaTableMap::COL_EVPR_C_EVALUACION);
            $criteria->addSelectColumn(EvaluacionPreguntaTableMap::COL_EVPR_C_PREGUNTA);
            $criteria->addSelectColumn(EvaluacionPreguntaTableMap::COL_EVPR_C_OBJETIVO);
            $criteria->addSelectColumn(EvaluacionPreguntaTableMap::COL_EVPR_C_SECCION);
            $criteria->addSelectColumn(EvaluacionPreguntaTableMap::COL_EVPR_ORDEN);
            $criteria->addSelectColumn(EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_CREACION);
            $criteria->addSelectColumn(EvaluacionPreguntaTableMap::COL_EVPR_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(EvaluacionPreguntaTableMap::COL_EVPR_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.evpr_codigo');
            $criteria->addSelectColumn($alias . '.evpr_c_evaluacion');
            $criteria->addSelectColumn($alias . '.evpr_c_pregunta');
            $criteria->addSelectColumn($alias . '.evpr_c_objetivo');
            $criteria->addSelectColumn($alias . '.evpr_c_seccion');
            $criteria->addSelectColumn($alias . '.evpr_orden');
            $criteria->addSelectColumn($alias . '.evpr_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.evpr_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.evpr_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(EvaluacionPreguntaTableMap::DATABASE_NAME)->getTable(EvaluacionPreguntaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EvaluacionPreguntaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EvaluacionPreguntaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EvaluacionPreguntaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EvaluacionPregunta or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EvaluacionPregunta object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionPreguntaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EvaluacionPregunta) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EvaluacionPreguntaTableMap::DATABASE_NAME);
            $criteria->add(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO, (array) $values, Criteria::IN);
        }

        $query = EvaluacionPreguntaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EvaluacionPreguntaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EvaluacionPreguntaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the evaluacion_pregunta table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EvaluacionPreguntaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EvaluacionPregunta or Criteria object.
     *
     * @param mixed               $criteria Criteria or EvaluacionPregunta object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionPreguntaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EvaluacionPregunta object
        }

        if ($criteria->containsKey(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO) && $criteria->keyContainsValue(EvaluacionPreguntaTableMap::COL_EVPR_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EvaluacionPreguntaTableMap::COL_EVPR_CODIGO.')');
        }


        // Set the correct dbName
        $query = EvaluacionPreguntaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EvaluacionPreguntaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EvaluacionPreguntaTableMap::buildTableMap();
