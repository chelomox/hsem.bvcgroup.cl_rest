<?php

namespace Map;

use \EFinalizacion;
use \EFinalizacionQuery;
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
 * This class defines the structure of the 'e_finalizacion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EFinalizacionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EFinalizacionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'e_finalizacion';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EFinalizacion';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EFinalizacion';

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
     * the column name for the efin_estado field
     */
    const COL_EFIN_ESTADO = 'e_finalizacion.efin_estado';

    /**
     * the column name for the efin_t_calificacion field
     */
    const COL_EFIN_T_CALIFICACION = 'e_finalizacion.efin_t_calificacion';

    /**
     * the column name for the efin_resultado field
     */
    const COL_EFIN_RESULTADO = 'e_finalizacion.efin_resultado';

    /**
     * the column name for the efin_descripcion field
     */
    const COL_EFIN_DESCRIPCION = 'e_finalizacion.efin_descripcion';

    /**
     * the column name for the efin_cota_inferior field
     */
    const COL_EFIN_COTA_INFERIOR = 'e_finalizacion.efin_cota_inferior';

    /**
     * the column name for the efin_cota_superior field
     */
    const COL_EFIN_COTA_SUPERIOR = 'e_finalizacion.efin_cota_superior';

    /**
     * the column name for the efin_r_fecha_creacion field
     */
    const COL_EFIN_R_FECHA_CREACION = 'e_finalizacion.efin_r_fecha_creacion';

    /**
     * the column name for the efin_r_fecha_modificacion field
     */
    const COL_EFIN_R_FECHA_MODIFICACION = 'e_finalizacion.efin_r_fecha_modificacion';

    /**
     * the column name for the efin_r_usuario field
     */
    const COL_EFIN_R_USUARIO = 'e_finalizacion.efin_r_usuario';

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
        self::TYPE_PHPNAME       => array('EfinEstado', 'EfinTCalificacion', 'EfinResultado', 'EfinDescripcion', 'EfinCotaInferior', 'EfinCotaSuperior', 'EfinRFechaCreacion', 'EfinRFechaModificacion', 'EfinRUsuario', ),
        self::TYPE_CAMELNAME     => array('efinEstado', 'efinTCalificacion', 'efinResultado', 'efinDescripcion', 'efinCotaInferior', 'efinCotaSuperior', 'efinRFechaCreacion', 'efinRFechaModificacion', 'efinRUsuario', ),
        self::TYPE_COLNAME       => array(EFinalizacionTableMap::COL_EFIN_ESTADO, EFinalizacionTableMap::COL_EFIN_T_CALIFICACION, EFinalizacionTableMap::COL_EFIN_RESULTADO, EFinalizacionTableMap::COL_EFIN_DESCRIPCION, EFinalizacionTableMap::COL_EFIN_COTA_INFERIOR, EFinalizacionTableMap::COL_EFIN_COTA_SUPERIOR, EFinalizacionTableMap::COL_EFIN_R_FECHA_CREACION, EFinalizacionTableMap::COL_EFIN_R_FECHA_MODIFICACION, EFinalizacionTableMap::COL_EFIN_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('efin_estado', 'efin_t_calificacion', 'efin_resultado', 'efin_descripcion', 'efin_cota_inferior', 'efin_cota_superior', 'efin_r_fecha_creacion', 'efin_r_fecha_modificacion', 'efin_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('EfinEstado' => 0, 'EfinTCalificacion' => 1, 'EfinResultado' => 2, 'EfinDescripcion' => 3, 'EfinCotaInferior' => 4, 'EfinCotaSuperior' => 5, 'EfinRFechaCreacion' => 6, 'EfinRFechaModificacion' => 7, 'EfinRUsuario' => 8, ),
        self::TYPE_CAMELNAME     => array('efinEstado' => 0, 'efinTCalificacion' => 1, 'efinResultado' => 2, 'efinDescripcion' => 3, 'efinCotaInferior' => 4, 'efinCotaSuperior' => 5, 'efinRFechaCreacion' => 6, 'efinRFechaModificacion' => 7, 'efinRUsuario' => 8, ),
        self::TYPE_COLNAME       => array(EFinalizacionTableMap::COL_EFIN_ESTADO => 0, EFinalizacionTableMap::COL_EFIN_T_CALIFICACION => 1, EFinalizacionTableMap::COL_EFIN_RESULTADO => 2, EFinalizacionTableMap::COL_EFIN_DESCRIPCION => 3, EFinalizacionTableMap::COL_EFIN_COTA_INFERIOR => 4, EFinalizacionTableMap::COL_EFIN_COTA_SUPERIOR => 5, EFinalizacionTableMap::COL_EFIN_R_FECHA_CREACION => 6, EFinalizacionTableMap::COL_EFIN_R_FECHA_MODIFICACION => 7, EFinalizacionTableMap::COL_EFIN_R_USUARIO => 8, ),
        self::TYPE_FIELDNAME     => array('efin_estado' => 0, 'efin_t_calificacion' => 1, 'efin_resultado' => 2, 'efin_descripcion' => 3, 'efin_cota_inferior' => 4, 'efin_cota_superior' => 5, 'efin_r_fecha_creacion' => 6, 'efin_r_fecha_modificacion' => 7, 'efin_r_usuario' => 8, ),
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
        $this->setName('e_finalizacion');
        $this->setPhpName('EFinalizacion');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EFinalizacion');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('efin_estado', 'EfinEstado', 'INTEGER', true, null, null);
        $this->addForeignKey('efin_t_calificacion', 'EfinTCalificacion', 'INTEGER', 't_calificacion', 'tcal_tipo', false, null, null);
        $this->addColumn('efin_resultado', 'EfinResultado', 'VARCHAR', false, 1, null);
        $this->addColumn('efin_descripcion', 'EfinDescripcion', 'VARCHAR', false, 255, null);
        $this->addColumn('efin_cota_inferior', 'EfinCotaInferior', 'INTEGER', false, 2, null);
        $this->addColumn('efin_cota_superior', 'EfinCotaSuperior', 'VARCHAR', false, 3, null);
        $this->addColumn('efin_r_fecha_creacion', 'EfinRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('efin_r_fecha_modificacion', 'EfinRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('efin_r_usuario', 'EfinRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TCalificacion', '\\TCalificacion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':efin_t_calificacion',
    1 => ':tcal_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Inscripcion', '\\Inscripcion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':insc_e_finalizacion',
    1 => ':efin_estado',
  ),
), null, 'CASCADE', 'Inscripcions', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EfinEstado', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EfinEstado', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EfinEstado', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EfinEstado', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EfinEstado', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EfinEstado', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('EfinEstado', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EFinalizacionTableMap::CLASS_DEFAULT : EFinalizacionTableMap::OM_CLASS;
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
     * @return array           (EFinalizacion object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EFinalizacionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EFinalizacionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EFinalizacionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EFinalizacionTableMap::OM_CLASS;
            /** @var EFinalizacion $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EFinalizacionTableMap::addInstanceToPool($obj, $key);
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
            $key = EFinalizacionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EFinalizacionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EFinalizacion $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EFinalizacionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EFinalizacionTableMap::COL_EFIN_ESTADO);
            $criteria->addSelectColumn(EFinalizacionTableMap::COL_EFIN_T_CALIFICACION);
            $criteria->addSelectColumn(EFinalizacionTableMap::COL_EFIN_RESULTADO);
            $criteria->addSelectColumn(EFinalizacionTableMap::COL_EFIN_DESCRIPCION);
            $criteria->addSelectColumn(EFinalizacionTableMap::COL_EFIN_COTA_INFERIOR);
            $criteria->addSelectColumn(EFinalizacionTableMap::COL_EFIN_COTA_SUPERIOR);
            $criteria->addSelectColumn(EFinalizacionTableMap::COL_EFIN_R_FECHA_CREACION);
            $criteria->addSelectColumn(EFinalizacionTableMap::COL_EFIN_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(EFinalizacionTableMap::COL_EFIN_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.efin_estado');
            $criteria->addSelectColumn($alias . '.efin_t_calificacion');
            $criteria->addSelectColumn($alias . '.efin_resultado');
            $criteria->addSelectColumn($alias . '.efin_descripcion');
            $criteria->addSelectColumn($alias . '.efin_cota_inferior');
            $criteria->addSelectColumn($alias . '.efin_cota_superior');
            $criteria->addSelectColumn($alias . '.efin_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.efin_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.efin_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(EFinalizacionTableMap::DATABASE_NAME)->getTable(EFinalizacionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EFinalizacionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EFinalizacionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EFinalizacionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EFinalizacion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EFinalizacion object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EFinalizacionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EFinalizacion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EFinalizacionTableMap::DATABASE_NAME);
            $criteria->add(EFinalizacionTableMap::COL_EFIN_ESTADO, (array) $values, Criteria::IN);
        }

        $query = EFinalizacionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EFinalizacionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EFinalizacionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the e_finalizacion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EFinalizacionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EFinalizacion or Criteria object.
     *
     * @param mixed               $criteria Criteria or EFinalizacion object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EFinalizacionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EFinalizacion object
        }

        if ($criteria->containsKey(EFinalizacionTableMap::COL_EFIN_ESTADO) && $criteria->keyContainsValue(EFinalizacionTableMap::COL_EFIN_ESTADO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EFinalizacionTableMap::COL_EFIN_ESTADO.')');
        }


        // Set the correct dbName
        $query = EFinalizacionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EFinalizacionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EFinalizacionTableMap::buildTableMap();
