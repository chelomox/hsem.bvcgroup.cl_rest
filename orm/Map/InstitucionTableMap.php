<?php

namespace Map;

use \Institucion;
use \InstitucionQuery;
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
 * This class defines the structure of the 'institucion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InstitucionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.InstitucionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'institucion';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Institucion';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Institucion';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the inst_codigo field
     */
    const COL_INST_CODIGO = 'institucion.inst_codigo';

    /**
     * the column name for the inst_identificador field
     */
    const COL_INST_IDENTIFICADOR = 'institucion.inst_identificador';

    /**
     * the column name for the inst_dv field
     */
    const COL_INST_DV = 'institucion.inst_dv';

    /**
     * the column name for the inst_nombre field
     */
    const COL_INST_NOMBRE = 'institucion.inst_nombre';

    /**
     * the column name for the inst_t_institucion field
     */
    const COL_INST_T_INSTITUCION = 'institucion.inst_t_institucion';

    /**
     * the column name for the inst_c_comuna field
     */
    const COL_INST_C_COMUNA = 'institucion.inst_c_comuna';

    /**
     * the column name for the inst_c_pais field
     */
    const COL_INST_C_PAIS = 'institucion.inst_c_pais';

    /**
     * the column name for the inst_telefono field
     */
    const COL_INST_TELEFONO = 'institucion.inst_telefono';

    /**
     * the column name for the inst_email field
     */
    const COL_INST_EMAIL = 'institucion.inst_email';

    /**
     * the column name for the inst_tratamiento field
     */
    const COL_INST_TRATAMIENTO = 'institucion.inst_tratamiento';

    /**
     * the column name for the inst_direccion field
     */
    const COL_INST_DIRECCION = 'institucion.inst_direccion';

    /**
     * the column name for the inst_giro field
     */
    const COL_INST_GIRO = 'institucion.inst_giro';

    /**
     * the column name for the inst_r_fecha_creacion field
     */
    const COL_INST_R_FECHA_CREACION = 'institucion.inst_r_fecha_creacion';

    /**
     * the column name for the inst_r_fecha_modificacion field
     */
    const COL_INST_R_FECHA_MODIFICACION = 'institucion.inst_r_fecha_modificacion';

    /**
     * the column name for the inst_r_usuario field
     */
    const COL_INST_R_USUARIO = 'institucion.inst_r_usuario';

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
        self::TYPE_PHPNAME       => array('InstCodigo', 'InstIdentificador', 'InstDv', 'InstNombre', 'InstTInstitucion', 'InstCComuna', 'InstCPais', 'InstTelefono', 'InstEmail', 'InstTratamiento', 'InstDireccion', 'InstGiro', 'InstRFechaCreacion', 'InstRFechaModificacion', 'InstRUsuario', ),
        self::TYPE_CAMELNAME     => array('instCodigo', 'instIdentificador', 'instDv', 'instNombre', 'instTInstitucion', 'instCComuna', 'instCPais', 'instTelefono', 'instEmail', 'instTratamiento', 'instDireccion', 'instGiro', 'instRFechaCreacion', 'instRFechaModificacion', 'instRUsuario', ),
        self::TYPE_COLNAME       => array(InstitucionTableMap::COL_INST_CODIGO, InstitucionTableMap::COL_INST_IDENTIFICADOR, InstitucionTableMap::COL_INST_DV, InstitucionTableMap::COL_INST_NOMBRE, InstitucionTableMap::COL_INST_T_INSTITUCION, InstitucionTableMap::COL_INST_C_COMUNA, InstitucionTableMap::COL_INST_C_PAIS, InstitucionTableMap::COL_INST_TELEFONO, InstitucionTableMap::COL_INST_EMAIL, InstitucionTableMap::COL_INST_TRATAMIENTO, InstitucionTableMap::COL_INST_DIRECCION, InstitucionTableMap::COL_INST_GIRO, InstitucionTableMap::COL_INST_R_FECHA_CREACION, InstitucionTableMap::COL_INST_R_FECHA_MODIFICACION, InstitucionTableMap::COL_INST_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('inst_codigo', 'inst_identificador', 'inst_dv', 'inst_nombre', 'inst_t_institucion', 'inst_c_comuna', 'inst_c_pais', 'inst_telefono', 'inst_email', 'inst_tratamiento', 'inst_direccion', 'inst_giro', 'inst_r_fecha_creacion', 'inst_r_fecha_modificacion', 'inst_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('InstCodigo' => 0, 'InstIdentificador' => 1, 'InstDv' => 2, 'InstNombre' => 3, 'InstTInstitucion' => 4, 'InstCComuna' => 5, 'InstCPais' => 6, 'InstTelefono' => 7, 'InstEmail' => 8, 'InstTratamiento' => 9, 'InstDireccion' => 10, 'InstGiro' => 11, 'InstRFechaCreacion' => 12, 'InstRFechaModificacion' => 13, 'InstRUsuario' => 14, ),
        self::TYPE_CAMELNAME     => array('instCodigo' => 0, 'instIdentificador' => 1, 'instDv' => 2, 'instNombre' => 3, 'instTInstitucion' => 4, 'instCComuna' => 5, 'instCPais' => 6, 'instTelefono' => 7, 'instEmail' => 8, 'instTratamiento' => 9, 'instDireccion' => 10, 'instGiro' => 11, 'instRFechaCreacion' => 12, 'instRFechaModificacion' => 13, 'instRUsuario' => 14, ),
        self::TYPE_COLNAME       => array(InstitucionTableMap::COL_INST_CODIGO => 0, InstitucionTableMap::COL_INST_IDENTIFICADOR => 1, InstitucionTableMap::COL_INST_DV => 2, InstitucionTableMap::COL_INST_NOMBRE => 3, InstitucionTableMap::COL_INST_T_INSTITUCION => 4, InstitucionTableMap::COL_INST_C_COMUNA => 5, InstitucionTableMap::COL_INST_C_PAIS => 6, InstitucionTableMap::COL_INST_TELEFONO => 7, InstitucionTableMap::COL_INST_EMAIL => 8, InstitucionTableMap::COL_INST_TRATAMIENTO => 9, InstitucionTableMap::COL_INST_DIRECCION => 10, InstitucionTableMap::COL_INST_GIRO => 11, InstitucionTableMap::COL_INST_R_FECHA_CREACION => 12, InstitucionTableMap::COL_INST_R_FECHA_MODIFICACION => 13, InstitucionTableMap::COL_INST_R_USUARIO => 14, ),
        self::TYPE_FIELDNAME     => array('inst_codigo' => 0, 'inst_identificador' => 1, 'inst_dv' => 2, 'inst_nombre' => 3, 'inst_t_institucion' => 4, 'inst_c_comuna' => 5, 'inst_c_pais' => 6, 'inst_telefono' => 7, 'inst_email' => 8, 'inst_tratamiento' => 9, 'inst_direccion' => 10, 'inst_giro' => 11, 'inst_r_fecha_creacion' => 12, 'inst_r_fecha_modificacion' => 13, 'inst_r_usuario' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $this->setName('institucion');
        $this->setPhpName('Institucion');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Institucion');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('inst_codigo', 'InstCodigo', 'INTEGER', true, null, null);
        $this->addColumn('inst_identificador', 'InstIdentificador', 'INTEGER', false, 15, null);
        $this->addColumn('inst_dv', 'InstDv', 'VARCHAR', false, 1, null);
        $this->addColumn('inst_nombre', 'InstNombre', 'VARCHAR', false, 255, null);
        $this->addForeignKey('inst_t_institucion', 'InstTInstitucion', 'INTEGER', 't_institucion', 'tins_tipo', false, null, null);
        $this->addColumn('inst_c_comuna', 'InstCComuna', 'VARCHAR', false, 11, null);
        $this->addColumn('inst_c_pais', 'InstCPais', 'VARCHAR', false, 11, null);
        $this->addColumn('inst_telefono', 'InstTelefono', 'VARCHAR', false, 25, null);
        $this->addColumn('inst_email', 'InstEmail', 'VARCHAR', false, 255, null);
        $this->addColumn('inst_tratamiento', 'InstTratamiento', 'VARCHAR', false, 1, null);
        $this->addColumn('inst_direccion', 'InstDireccion', 'VARCHAR', false, 255, null);
        $this->addColumn('inst_giro', 'InstGiro', 'VARCHAR', false, 55, null);
        $this->addColumn('inst_r_fecha_creacion', 'InstRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('inst_r_fecha_modificacion', 'InstRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('inst_r_usuario', 'InstRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TInstitucion', '\\TInstitucion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':inst_t_institucion',
    1 => ':tins_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Area', '\\Area', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':area_c_institucion',
    1 => ':inst_codigo',
  ),
), null, 'CASCADE', 'Areas', false);
        $this->addRelation('Especialidad', '\\Especialidad', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':espe_c_institucion',
    1 => ':inst_codigo',
  ),
), null, 'CASCADE', 'Especialidads', false);
        $this->addRelation('Gerencia', '\\Gerencia', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':gere_c_institucion',
    1 => ':inst_codigo',
  ),
), null, 'CASCADE', 'Gerencias', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InstCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InstCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InstCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InstCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InstCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InstCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('InstCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? InstitucionTableMap::CLASS_DEFAULT : InstitucionTableMap::OM_CLASS;
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
     * @return array           (Institucion object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InstitucionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InstitucionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InstitucionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InstitucionTableMap::OM_CLASS;
            /** @var Institucion $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InstitucionTableMap::addInstanceToPool($obj, $key);
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
            $key = InstitucionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InstitucionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Institucion $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InstitucionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_CODIGO);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_IDENTIFICADOR);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_DV);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_NOMBRE);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_T_INSTITUCION);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_C_COMUNA);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_C_PAIS);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_TELEFONO);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_EMAIL);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_TRATAMIENTO);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_DIRECCION);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_GIRO);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_R_FECHA_CREACION);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(InstitucionTableMap::COL_INST_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.inst_codigo');
            $criteria->addSelectColumn($alias . '.inst_identificador');
            $criteria->addSelectColumn($alias . '.inst_dv');
            $criteria->addSelectColumn($alias . '.inst_nombre');
            $criteria->addSelectColumn($alias . '.inst_t_institucion');
            $criteria->addSelectColumn($alias . '.inst_c_comuna');
            $criteria->addSelectColumn($alias . '.inst_c_pais');
            $criteria->addSelectColumn($alias . '.inst_telefono');
            $criteria->addSelectColumn($alias . '.inst_email');
            $criteria->addSelectColumn($alias . '.inst_tratamiento');
            $criteria->addSelectColumn($alias . '.inst_direccion');
            $criteria->addSelectColumn($alias . '.inst_giro');
            $criteria->addSelectColumn($alias . '.inst_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.inst_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.inst_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(InstitucionTableMap::DATABASE_NAME)->getTable(InstitucionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InstitucionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InstitucionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InstitucionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Institucion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Institucion object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InstitucionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Institucion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InstitucionTableMap::DATABASE_NAME);
            $criteria->add(InstitucionTableMap::COL_INST_CODIGO, (array) $values, Criteria::IN);
        }

        $query = InstitucionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InstitucionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InstitucionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the institucion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InstitucionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Institucion or Criteria object.
     *
     * @param mixed               $criteria Criteria or Institucion object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstitucionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Institucion object
        }

        if ($criteria->containsKey(InstitucionTableMap::COL_INST_CODIGO) && $criteria->keyContainsValue(InstitucionTableMap::COL_INST_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.InstitucionTableMap::COL_INST_CODIGO.')');
        }


        // Set the correct dbName
        $query = InstitucionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InstitucionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InstitucionTableMap::buildTableMap();
