<?php

namespace Map;

use \Pais;
use \PaisQuery;
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
 * This class defines the structure of the 'pais' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PaisTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PaisTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'pais';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Pais';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Pais';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the pais_codigo field
     */
    const COL_PAIS_CODIGO = 'pais.pais_codigo';

    /**
     * the column name for the nombre_comun field
     */
    const COL_NOMBRE_COMUN = 'pais.nombre_comun';

    /**
     * the column name for the nombre_iso field
     */
    const COL_NOMBRE_ISO = 'pais.nombre_iso';

    /**
     * the column name for the codigo_alfa2 field
     */
    const COL_CODIGO_ALFA2 = 'pais.codigo_alfa2';

    /**
     * the column name for the codigo_alfa3 field
     */
    const COL_CODIGO_ALFA3 = 'pais.codigo_alfa3';

    /**
     * the column name for the codigo_numerico field
     */
    const COL_CODIGO_NUMERICO = 'pais.codigo_numerico';

    /**
     * the column name for the observaciones field
     */
    const COL_OBSERVACIONES = 'pais.observaciones';

    /**
     * the column name for the pais_r_fecha_creacion field
     */
    const COL_PAIS_R_FECHA_CREACION = 'pais.pais_r_fecha_creacion';

    /**
     * the column name for the pais_r_fecha_modificacion field
     */
    const COL_PAIS_R_FECHA_MODIFICACION = 'pais.pais_r_fecha_modificacion';

    /**
     * the column name for the pais_r_usuario field
     */
    const COL_PAIS_R_USUARIO = 'pais.pais_r_usuario';

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
        self::TYPE_PHPNAME       => array('PaisCodigo', 'NombreComun', 'NombreIso', 'CodigoAlfa2', 'CodigoAlfa3', 'CodigoNumerico', 'Observaciones', 'PaisRFechaCreacion', 'PaisRFechaModificacion', 'PaisRUsuario', ),
        self::TYPE_CAMELNAME     => array('paisCodigo', 'nombreComun', 'nombreIso', 'codigoAlfa2', 'codigoAlfa3', 'codigoNumerico', 'observaciones', 'paisRFechaCreacion', 'paisRFechaModificacion', 'paisRUsuario', ),
        self::TYPE_COLNAME       => array(PaisTableMap::COL_PAIS_CODIGO, PaisTableMap::COL_NOMBRE_COMUN, PaisTableMap::COL_NOMBRE_ISO, PaisTableMap::COL_CODIGO_ALFA2, PaisTableMap::COL_CODIGO_ALFA3, PaisTableMap::COL_CODIGO_NUMERICO, PaisTableMap::COL_OBSERVACIONES, PaisTableMap::COL_PAIS_R_FECHA_CREACION, PaisTableMap::COL_PAIS_R_FECHA_MODIFICACION, PaisTableMap::COL_PAIS_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('pais_codigo', 'nombre_comun', 'nombre_iso', 'codigo_alfa2', 'codigo_alfa3', 'codigo_numerico', 'observaciones', 'pais_r_fecha_creacion', 'pais_r_fecha_modificacion', 'pais_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PaisCodigo' => 0, 'NombreComun' => 1, 'NombreIso' => 2, 'CodigoAlfa2' => 3, 'CodigoAlfa3' => 4, 'CodigoNumerico' => 5, 'Observaciones' => 6, 'PaisRFechaCreacion' => 7, 'PaisRFechaModificacion' => 8, 'PaisRUsuario' => 9, ),
        self::TYPE_CAMELNAME     => array('paisCodigo' => 0, 'nombreComun' => 1, 'nombreIso' => 2, 'codigoAlfa2' => 3, 'codigoAlfa3' => 4, 'codigoNumerico' => 5, 'observaciones' => 6, 'paisRFechaCreacion' => 7, 'paisRFechaModificacion' => 8, 'paisRUsuario' => 9, ),
        self::TYPE_COLNAME       => array(PaisTableMap::COL_PAIS_CODIGO => 0, PaisTableMap::COL_NOMBRE_COMUN => 1, PaisTableMap::COL_NOMBRE_ISO => 2, PaisTableMap::COL_CODIGO_ALFA2 => 3, PaisTableMap::COL_CODIGO_ALFA3 => 4, PaisTableMap::COL_CODIGO_NUMERICO => 5, PaisTableMap::COL_OBSERVACIONES => 6, PaisTableMap::COL_PAIS_R_FECHA_CREACION => 7, PaisTableMap::COL_PAIS_R_FECHA_MODIFICACION => 8, PaisTableMap::COL_PAIS_R_USUARIO => 9, ),
        self::TYPE_FIELDNAME     => array('pais_codigo' => 0, 'nombre_comun' => 1, 'nombre_iso' => 2, 'codigo_alfa2' => 3, 'codigo_alfa3' => 4, 'codigo_numerico' => 5, 'observaciones' => 6, 'pais_r_fecha_creacion' => 7, 'pais_r_fecha_modificacion' => 8, 'pais_r_usuario' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('pais');
        $this->setPhpName('Pais');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Pais');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('pais_codigo', 'PaisCodigo', 'INTEGER', true, null, null);
        $this->addColumn('nombre_comun', 'NombreComun', 'VARCHAR', false, 155, null);
        $this->addColumn('nombre_iso', 'NombreIso', 'VARCHAR', false, 100, null);
        $this->addColumn('codigo_alfa2', 'CodigoAlfa2', 'VARCHAR', false, 3, null);
        $this->addColumn('codigo_alfa3', 'CodigoAlfa3', 'VARCHAR', false, 4, null);
        $this->addColumn('codigo_numerico', 'CodigoNumerico', 'INTEGER', false, 3, null);
        $this->addColumn('observaciones', 'Observaciones', 'VARCHAR', false, 455, null);
        $this->addColumn('pais_r_fecha_creacion', 'PaisRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('pais_r_fecha_modificacion', 'PaisRFechaModificacion', 'TIMESTAMP', true, null, null);
        $this->addColumn('pais_r_usuario', 'PaisRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Direccion', '\\Direccion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':dire_c_pais',
    1 => ':pais_codigo',
  ),
), null, 'CASCADE', 'Direccions', false);
        $this->addRelation('Persona', '\\Persona', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':pers_c_pais_origen',
    1 => ':pais_codigo',
  ),
), null, 'CASCADE', 'Personas', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PaisCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PaisCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PaisCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PaisCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PaisCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PaisCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('PaisCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? PaisTableMap::CLASS_DEFAULT : PaisTableMap::OM_CLASS;
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
     * @return array           (Pais object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PaisTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PaisTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PaisTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PaisTableMap::OM_CLASS;
            /** @var Pais $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PaisTableMap::addInstanceToPool($obj, $key);
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
            $key = PaisTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PaisTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Pais $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PaisTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PaisTableMap::COL_PAIS_CODIGO);
            $criteria->addSelectColumn(PaisTableMap::COL_NOMBRE_COMUN);
            $criteria->addSelectColumn(PaisTableMap::COL_NOMBRE_ISO);
            $criteria->addSelectColumn(PaisTableMap::COL_CODIGO_ALFA2);
            $criteria->addSelectColumn(PaisTableMap::COL_CODIGO_ALFA3);
            $criteria->addSelectColumn(PaisTableMap::COL_CODIGO_NUMERICO);
            $criteria->addSelectColumn(PaisTableMap::COL_OBSERVACIONES);
            $criteria->addSelectColumn(PaisTableMap::COL_PAIS_R_FECHA_CREACION);
            $criteria->addSelectColumn(PaisTableMap::COL_PAIS_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(PaisTableMap::COL_PAIS_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.pais_codigo');
            $criteria->addSelectColumn($alias . '.nombre_comun');
            $criteria->addSelectColumn($alias . '.nombre_iso');
            $criteria->addSelectColumn($alias . '.codigo_alfa2');
            $criteria->addSelectColumn($alias . '.codigo_alfa3');
            $criteria->addSelectColumn($alias . '.codigo_numerico');
            $criteria->addSelectColumn($alias . '.observaciones');
            $criteria->addSelectColumn($alias . '.pais_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.pais_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.pais_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(PaisTableMap::DATABASE_NAME)->getTable(PaisTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PaisTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PaisTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PaisTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Pais or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Pais object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PaisTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Pais) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PaisTableMap::DATABASE_NAME);
            $criteria->add(PaisTableMap::COL_PAIS_CODIGO, (array) $values, Criteria::IN);
        }

        $query = PaisQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PaisTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PaisTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the pais table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PaisQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Pais or Criteria object.
     *
     * @param mixed               $criteria Criteria or Pais object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaisTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Pais object
        }

        if ($criteria->containsKey(PaisTableMap::COL_PAIS_CODIGO) && $criteria->keyContainsValue(PaisTableMap::COL_PAIS_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PaisTableMap::COL_PAIS_CODIGO.')');
        }


        // Set the correct dbName
        $query = PaisQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PaisTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PaisTableMap::buildTableMap();
