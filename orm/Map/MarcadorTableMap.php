<?php

namespace Map;

use \Marcador;
use \MarcadorQuery;
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
 * This class defines the structure of the 'marcador' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MarcadorTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MarcadorTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'marcador';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Marcador';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Marcador';

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
     * the column name for the marc_codigo field
     */
    const COL_MARC_CODIGO = 'marcador.marc_codigo';

    /**
     * the column name for the marc_codigo_marcador field
     */
    const COL_MARC_CODIGO_MARCADOR = 'marcador.marc_codigo_marcador';

    /**
     * the column name for the marc_descripcion field
     */
    const COL_MARC_DESCRIPCION = 'marcador.marc_descripcion';

    /**
     * the column name for the marc_imagen field
     */
    const COL_MARC_IMAGEN = 'marcador.marc_imagen';

    /**
     * the column name for the marc_vigente field
     */
    const COL_MARC_VIGENTE = 'marcador.marc_vigente';

    /**
     * the column name for the marc_r_fecha_creacion field
     */
    const COL_MARC_R_FECHA_CREACION = 'marcador.marc_r_fecha_creacion';

    /**
     * the column name for the marc_r_fecha_modificacion field
     */
    const COL_MARC_R_FECHA_MODIFICACION = 'marcador.marc_r_fecha_modificacion';

    /**
     * the column name for the marc_r_usuario field
     */
    const COL_MARC_R_USUARIO = 'marcador.marc_r_usuario';

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
        self::TYPE_PHPNAME       => array('MarcCodigo', 'MarcCodigoMarcador', 'MarcDescripcion', 'MarcImagen', 'MarcVigente', 'MarcRFechaCreacion', 'MarcRFechaModificacion', 'MarcRUsuario', ),
        self::TYPE_CAMELNAME     => array('marcCodigo', 'marcCodigoMarcador', 'marcDescripcion', 'marcImagen', 'marcVigente', 'marcRFechaCreacion', 'marcRFechaModificacion', 'marcRUsuario', ),
        self::TYPE_COLNAME       => array(MarcadorTableMap::COL_MARC_CODIGO, MarcadorTableMap::COL_MARC_CODIGO_MARCADOR, MarcadorTableMap::COL_MARC_DESCRIPCION, MarcadorTableMap::COL_MARC_IMAGEN, MarcadorTableMap::COL_MARC_VIGENTE, MarcadorTableMap::COL_MARC_R_FECHA_CREACION, MarcadorTableMap::COL_MARC_R_FECHA_MODIFICACION, MarcadorTableMap::COL_MARC_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('marc_codigo', 'marc_codigo_marcador', 'marc_descripcion', 'marc_imagen', 'marc_vigente', 'marc_r_fecha_creacion', 'marc_r_fecha_modificacion', 'marc_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('MarcCodigo' => 0, 'MarcCodigoMarcador' => 1, 'MarcDescripcion' => 2, 'MarcImagen' => 3, 'MarcVigente' => 4, 'MarcRFechaCreacion' => 5, 'MarcRFechaModificacion' => 6, 'MarcRUsuario' => 7, ),
        self::TYPE_CAMELNAME     => array('marcCodigo' => 0, 'marcCodigoMarcador' => 1, 'marcDescripcion' => 2, 'marcImagen' => 3, 'marcVigente' => 4, 'marcRFechaCreacion' => 5, 'marcRFechaModificacion' => 6, 'marcRUsuario' => 7, ),
        self::TYPE_COLNAME       => array(MarcadorTableMap::COL_MARC_CODIGO => 0, MarcadorTableMap::COL_MARC_CODIGO_MARCADOR => 1, MarcadorTableMap::COL_MARC_DESCRIPCION => 2, MarcadorTableMap::COL_MARC_IMAGEN => 3, MarcadorTableMap::COL_MARC_VIGENTE => 4, MarcadorTableMap::COL_MARC_R_FECHA_CREACION => 5, MarcadorTableMap::COL_MARC_R_FECHA_MODIFICACION => 6, MarcadorTableMap::COL_MARC_R_USUARIO => 7, ),
        self::TYPE_FIELDNAME     => array('marc_codigo' => 0, 'marc_codigo_marcador' => 1, 'marc_descripcion' => 2, 'marc_imagen' => 3, 'marc_vigente' => 4, 'marc_r_fecha_creacion' => 5, 'marc_r_fecha_modificacion' => 6, 'marc_r_usuario' => 7, ),
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
        $this->setName('marcador');
        $this->setPhpName('Marcador');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Marcador');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('marc_codigo', 'MarcCodigo', 'INTEGER', true, null, null);
        $this->addColumn('marc_codigo_marcador', 'MarcCodigoMarcador', 'VARCHAR', false, 255, null);
        $this->addColumn('marc_descripcion', 'MarcDescripcion', 'VARCHAR', false, 255, null);
        $this->addColumn('marc_imagen', 'MarcImagen', 'VARCHAR', true, 255, null);
        $this->addColumn('marc_vigente', 'MarcVigente', 'INTEGER', false, 1, null);
        $this->addColumn('marc_r_fecha_creacion', 'MarcRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('marc_r_fecha_modificacion', 'MarcRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('marc_r_usuario', 'MarcRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('EvaluacionMarcador', '\\EvaluacionMarcador', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':evma_c_marcador',
    1 => ':marc_codigo',
  ),
), null, 'CASCADE', 'EvaluacionMarcadors', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MarcCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MarcCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MarcCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MarcCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MarcCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('MarcCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('MarcCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? MarcadorTableMap::CLASS_DEFAULT : MarcadorTableMap::OM_CLASS;
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
     * @return array           (Marcador object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MarcadorTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MarcadorTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MarcadorTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MarcadorTableMap::OM_CLASS;
            /** @var Marcador $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MarcadorTableMap::addInstanceToPool($obj, $key);
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
            $key = MarcadorTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MarcadorTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Marcador $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MarcadorTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MarcadorTableMap::COL_MARC_CODIGO);
            $criteria->addSelectColumn(MarcadorTableMap::COL_MARC_CODIGO_MARCADOR);
            $criteria->addSelectColumn(MarcadorTableMap::COL_MARC_DESCRIPCION);
            $criteria->addSelectColumn(MarcadorTableMap::COL_MARC_IMAGEN);
            $criteria->addSelectColumn(MarcadorTableMap::COL_MARC_VIGENTE);
            $criteria->addSelectColumn(MarcadorTableMap::COL_MARC_R_FECHA_CREACION);
            $criteria->addSelectColumn(MarcadorTableMap::COL_MARC_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(MarcadorTableMap::COL_MARC_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.marc_codigo');
            $criteria->addSelectColumn($alias . '.marc_codigo_marcador');
            $criteria->addSelectColumn($alias . '.marc_descripcion');
            $criteria->addSelectColumn($alias . '.marc_imagen');
            $criteria->addSelectColumn($alias . '.marc_vigente');
            $criteria->addSelectColumn($alias . '.marc_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.marc_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.marc_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(MarcadorTableMap::DATABASE_NAME)->getTable(MarcadorTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MarcadorTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MarcadorTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MarcadorTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Marcador or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Marcador object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MarcadorTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Marcador) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MarcadorTableMap::DATABASE_NAME);
            $criteria->add(MarcadorTableMap::COL_MARC_CODIGO, (array) $values, Criteria::IN);
        }

        $query = MarcadorQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MarcadorTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MarcadorTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the marcador table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MarcadorQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Marcador or Criteria object.
     *
     * @param mixed               $criteria Criteria or Marcador object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MarcadorTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Marcador object
        }

        if ($criteria->containsKey(MarcadorTableMap::COL_MARC_CODIGO) && $criteria->keyContainsValue(MarcadorTableMap::COL_MARC_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MarcadorTableMap::COL_MARC_CODIGO.')');
        }


        // Set the correct dbName
        $query = MarcadorQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MarcadorTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MarcadorTableMap::buildTableMap();
