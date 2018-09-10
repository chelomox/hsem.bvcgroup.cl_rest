<?php

namespace Map;

use \Evaluacion;
use \EvaluacionQuery;
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
 * This class defines the structure of the 'evaluacion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EvaluacionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EvaluacionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'evaluacion';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Evaluacion';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Evaluacion';

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
     * the column name for the eval_codigo field
     */
    const COL_EVAL_CODIGO = 'evaluacion.eval_codigo';

    /**
     * the column name for the eval_t_evaluacion field
     */
    const COL_EVAL_T_EVALUACION = 'evaluacion.eval_t_evaluacion';

    /**
     * the column name for the eval_titulo field
     */
    const COL_EVAL_TITULO = 'evaluacion.eval_titulo';

    /**
     * the column name for the eval_descripcion field
     */
    const COL_EVAL_DESCRIPCION = 'evaluacion.eval_descripcion';

    /**
     * the column name for the eval_vigente field
     */
    const COL_EVAL_VIGENTE = 'evaluacion.eval_vigente';

    /**
     * the column name for the eval_r_fecha_creacion field
     */
    const COL_EVAL_R_FECHA_CREACION = 'evaluacion.eval_r_fecha_creacion';

    /**
     * the column name for the eval_r_fecha_modificacion field
     */
    const COL_EVAL_R_FECHA_MODIFICACION = 'evaluacion.eval_r_fecha_modificacion';

    /**
     * the column name for the eval_r_usuario field
     */
    const COL_EVAL_R_USUARIO = 'evaluacion.eval_r_usuario';

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
        self::TYPE_PHPNAME       => array('EvalCodigo', 'EvalTEvaluacion', 'EvalTitulo', 'EvalDescripcion', 'EvalVigente', 'EvalRFechaCreacion', 'EvalRFechaModificacion', 'EvalRUsuario', ),
        self::TYPE_CAMELNAME     => array('evalCodigo', 'evalTEvaluacion', 'evalTitulo', 'evalDescripcion', 'evalVigente', 'evalRFechaCreacion', 'evalRFechaModificacion', 'evalRUsuario', ),
        self::TYPE_COLNAME       => array(EvaluacionTableMap::COL_EVAL_CODIGO, EvaluacionTableMap::COL_EVAL_T_EVALUACION, EvaluacionTableMap::COL_EVAL_TITULO, EvaluacionTableMap::COL_EVAL_DESCRIPCION, EvaluacionTableMap::COL_EVAL_VIGENTE, EvaluacionTableMap::COL_EVAL_R_FECHA_CREACION, EvaluacionTableMap::COL_EVAL_R_FECHA_MODIFICACION, EvaluacionTableMap::COL_EVAL_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('eval_codigo', 'eval_t_evaluacion', 'eval_titulo', 'eval_descripcion', 'eval_vigente', 'eval_r_fecha_creacion', 'eval_r_fecha_modificacion', 'eval_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('EvalCodigo' => 0, 'EvalTEvaluacion' => 1, 'EvalTitulo' => 2, 'EvalDescripcion' => 3, 'EvalVigente' => 4, 'EvalRFechaCreacion' => 5, 'EvalRFechaModificacion' => 6, 'EvalRUsuario' => 7, ),
        self::TYPE_CAMELNAME     => array('evalCodigo' => 0, 'evalTEvaluacion' => 1, 'evalTitulo' => 2, 'evalDescripcion' => 3, 'evalVigente' => 4, 'evalRFechaCreacion' => 5, 'evalRFechaModificacion' => 6, 'evalRUsuario' => 7, ),
        self::TYPE_COLNAME       => array(EvaluacionTableMap::COL_EVAL_CODIGO => 0, EvaluacionTableMap::COL_EVAL_T_EVALUACION => 1, EvaluacionTableMap::COL_EVAL_TITULO => 2, EvaluacionTableMap::COL_EVAL_DESCRIPCION => 3, EvaluacionTableMap::COL_EVAL_VIGENTE => 4, EvaluacionTableMap::COL_EVAL_R_FECHA_CREACION => 5, EvaluacionTableMap::COL_EVAL_R_FECHA_MODIFICACION => 6, EvaluacionTableMap::COL_EVAL_R_USUARIO => 7, ),
        self::TYPE_FIELDNAME     => array('eval_codigo' => 0, 'eval_t_evaluacion' => 1, 'eval_titulo' => 2, 'eval_descripcion' => 3, 'eval_vigente' => 4, 'eval_r_fecha_creacion' => 5, 'eval_r_fecha_modificacion' => 6, 'eval_r_usuario' => 7, ),
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
        $this->setName('evaluacion');
        $this->setPhpName('Evaluacion');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Evaluacion');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('eval_codigo', 'EvalCodigo', 'INTEGER', true, null, null);
        $this->addForeignKey('eval_t_evaluacion', 'EvalTEvaluacion', 'INTEGER', 't_evaluacion', 'tev_tipo', false, null, null);
        $this->addColumn('eval_titulo', 'EvalTitulo', 'VARCHAR', false, 255, null);
        $this->addColumn('eval_descripcion', 'EvalDescripcion', 'VARCHAR', false, 255, null);
        $this->addColumn('eval_vigente', 'EvalVigente', 'INTEGER', false, 1, null);
        $this->addColumn('eval_r_fecha_creacion', 'EvalRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('eval_r_fecha_modificacion', 'EvalRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('eval_r_usuario', 'EvalRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TEvaluacion', '\\TEvaluacion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':eval_t_evaluacion',
    1 => ':tev_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('EvaluacionAplicada', '\\EvaluacionAplicada', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':evap_c_evaluacion',
    1 => ':eval_codigo',
  ),
), null, 'CASCADE', 'EvaluacionAplicadas', false);
        $this->addRelation('EvaluacionMarcador', '\\EvaluacionMarcador', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':evma_c_evaluacion',
    1 => ':eval_codigo',
  ),
), null, 'CASCADE', 'EvaluacionMarcadors', false);
        $this->addRelation('EvaluacionPregunta', '\\EvaluacionPregunta', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':evpr_c_evaluacion',
    1 => ':eval_codigo',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvalCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvalCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvalCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvalCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvalCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvalCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('EvalCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EvaluacionTableMap::CLASS_DEFAULT : EvaluacionTableMap::OM_CLASS;
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
     * @return array           (Evaluacion object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EvaluacionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EvaluacionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EvaluacionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EvaluacionTableMap::OM_CLASS;
            /** @var Evaluacion $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EvaluacionTableMap::addInstanceToPool($obj, $key);
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
            $key = EvaluacionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EvaluacionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Evaluacion $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EvaluacionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EvaluacionTableMap::COL_EVAL_CODIGO);
            $criteria->addSelectColumn(EvaluacionTableMap::COL_EVAL_T_EVALUACION);
            $criteria->addSelectColumn(EvaluacionTableMap::COL_EVAL_TITULO);
            $criteria->addSelectColumn(EvaluacionTableMap::COL_EVAL_DESCRIPCION);
            $criteria->addSelectColumn(EvaluacionTableMap::COL_EVAL_VIGENTE);
            $criteria->addSelectColumn(EvaluacionTableMap::COL_EVAL_R_FECHA_CREACION);
            $criteria->addSelectColumn(EvaluacionTableMap::COL_EVAL_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(EvaluacionTableMap::COL_EVAL_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.eval_codigo');
            $criteria->addSelectColumn($alias . '.eval_t_evaluacion');
            $criteria->addSelectColumn($alias . '.eval_titulo');
            $criteria->addSelectColumn($alias . '.eval_descripcion');
            $criteria->addSelectColumn($alias . '.eval_vigente');
            $criteria->addSelectColumn($alias . '.eval_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.eval_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.eval_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(EvaluacionTableMap::DATABASE_NAME)->getTable(EvaluacionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EvaluacionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EvaluacionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EvaluacionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Evaluacion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Evaluacion object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Evaluacion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EvaluacionTableMap::DATABASE_NAME);
            $criteria->add(EvaluacionTableMap::COL_EVAL_CODIGO, (array) $values, Criteria::IN);
        }

        $query = EvaluacionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EvaluacionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EvaluacionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the evaluacion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EvaluacionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Evaluacion or Criteria object.
     *
     * @param mixed               $criteria Criteria or Evaluacion object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Evaluacion object
        }

        if ($criteria->containsKey(EvaluacionTableMap::COL_EVAL_CODIGO) && $criteria->keyContainsValue(EvaluacionTableMap::COL_EVAL_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EvaluacionTableMap::COL_EVAL_CODIGO.')');
        }


        // Set the correct dbName
        $query = EvaluacionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EvaluacionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EvaluacionTableMap::buildTableMap();
