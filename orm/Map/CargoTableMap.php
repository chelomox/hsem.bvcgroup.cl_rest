<?php

namespace Map;

use \Cargo;
use \CargoQuery;
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
 * This class defines the structure of the 'cargo' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CargoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CargoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'cargo';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Cargo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Cargo';

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
     * the column name for the carg_codigo field
     */
    const COL_CARG_CODIGO = 'cargo.carg_codigo';

    /**
     * the column name for the carg_c_especialidad field
     */
    const COL_CARG_C_ESPECIALIDAD = 'cargo.carg_c_especialidad';

    /**
     * the column name for the carg_t_relacion_faena field
     */
    const COL_CARG_T_RELACION_FAENA = 'cargo.carg_t_relacion_faena';

    /**
     * the column name for the carg_sigla field
     */
    const COL_CARG_SIGLA = 'cargo.carg_sigla';

    /**
     * the column name for the carg_descripcion field
     */
    const COL_CARG_DESCRIPCION = 'cargo.carg_descripcion';

    /**
     * the column name for the carg_vigente field
     */
    const COL_CARG_VIGENTE = 'cargo.carg_vigente';

    /**
     * the column name for the carg_r_fecha_creacion field
     */
    const COL_CARG_R_FECHA_CREACION = 'cargo.carg_r_fecha_creacion';

    /**
     * the column name for the carg_r_fecha_modificacion field
     */
    const COL_CARG_R_FECHA_MODIFICACION = 'cargo.carg_r_fecha_modificacion';

    /**
     * the column name for the carg_r_usuario field
     */
    const COL_CARG_R_USUARIO = 'cargo.carg_r_usuario';

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
        self::TYPE_PHPNAME       => array('CargCodigo', 'CargCEspecialidad', 'CargTRelacionFaena', 'CargSigla', 'CargDescripcion', 'CargVigente', 'CargRFechaCreacion', 'CargRFechaModificacion', 'CargRUsuario', ),
        self::TYPE_CAMELNAME     => array('cargCodigo', 'cargCEspecialidad', 'cargTRelacionFaena', 'cargSigla', 'cargDescripcion', 'cargVigente', 'cargRFechaCreacion', 'cargRFechaModificacion', 'cargRUsuario', ),
        self::TYPE_COLNAME       => array(CargoTableMap::COL_CARG_CODIGO, CargoTableMap::COL_CARG_C_ESPECIALIDAD, CargoTableMap::COL_CARG_T_RELACION_FAENA, CargoTableMap::COL_CARG_SIGLA, CargoTableMap::COL_CARG_DESCRIPCION, CargoTableMap::COL_CARG_VIGENTE, CargoTableMap::COL_CARG_R_FECHA_CREACION, CargoTableMap::COL_CARG_R_FECHA_MODIFICACION, CargoTableMap::COL_CARG_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('carg_codigo', 'carg_c_especialidad', 'carg_t_relacion_faena', 'carg_sigla', 'carg_descripcion', 'carg_vigente', 'carg_r_fecha_creacion', 'carg_r_fecha_modificacion', 'carg_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CargCodigo' => 0, 'CargCEspecialidad' => 1, 'CargTRelacionFaena' => 2, 'CargSigla' => 3, 'CargDescripcion' => 4, 'CargVigente' => 5, 'CargRFechaCreacion' => 6, 'CargRFechaModificacion' => 7, 'CargRUsuario' => 8, ),
        self::TYPE_CAMELNAME     => array('cargCodigo' => 0, 'cargCEspecialidad' => 1, 'cargTRelacionFaena' => 2, 'cargSigla' => 3, 'cargDescripcion' => 4, 'cargVigente' => 5, 'cargRFechaCreacion' => 6, 'cargRFechaModificacion' => 7, 'cargRUsuario' => 8, ),
        self::TYPE_COLNAME       => array(CargoTableMap::COL_CARG_CODIGO => 0, CargoTableMap::COL_CARG_C_ESPECIALIDAD => 1, CargoTableMap::COL_CARG_T_RELACION_FAENA => 2, CargoTableMap::COL_CARG_SIGLA => 3, CargoTableMap::COL_CARG_DESCRIPCION => 4, CargoTableMap::COL_CARG_VIGENTE => 5, CargoTableMap::COL_CARG_R_FECHA_CREACION => 6, CargoTableMap::COL_CARG_R_FECHA_MODIFICACION => 7, CargoTableMap::COL_CARG_R_USUARIO => 8, ),
        self::TYPE_FIELDNAME     => array('carg_codigo' => 0, 'carg_c_especialidad' => 1, 'carg_t_relacion_faena' => 2, 'carg_sigla' => 3, 'carg_descripcion' => 4, 'carg_vigente' => 5, 'carg_r_fecha_creacion' => 6, 'carg_r_fecha_modificacion' => 7, 'carg_r_usuario' => 8, ),
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
        $this->setName('cargo');
        $this->setPhpName('Cargo');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Cargo');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('carg_codigo', 'CargCodigo', 'INTEGER', true, null, null);
        $this->addForeignKey('carg_c_especialidad', 'CargCEspecialidad', 'INTEGER', 'especialidad', 'espe_codigo', false, null, null);
        $this->addForeignKey('carg_t_relacion_faena', 'CargTRelacionFaena', 'INTEGER', 't_relacion_faena', 'trefa_tipo', false, null, null);
        $this->addColumn('carg_sigla', 'CargSigla', 'VARCHAR', false, 10, null);
        $this->addColumn('carg_descripcion', 'CargDescripcion', 'VARCHAR', false, 255, null);
        $this->addColumn('carg_vigente', 'CargVigente', 'INTEGER', false, 1, null);
        $this->addColumn('carg_r_fecha_creacion', 'CargRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('carg_r_fecha_modificacion', 'CargRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('carg_r_usuario', 'CargRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Especialidad', '\\Especialidad', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':carg_c_especialidad',
    1 => ':espe_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('TRelacionFaena', '\\TRelacionFaena', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':carg_t_relacion_faena',
    1 => ':trefa_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('ActividadCargo', '\\ActividadCargo', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':acca_c_cargo',
    1 => ':carg_codigo',
  ),
), null, 'CASCADE', 'ActividadCargos', false);
        $this->addRelation('CargoGrupoSence', '\\CargoGrupoSence', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':cagrse_c_cargo',
    1 => ':carg_codigo',
  ),
), null, 'CASCADE', 'CargoGrupoSences', false);
        $this->addRelation('Trabajador', '\\Trabajador', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':trab_c_cargo',
    1 => ':carg_codigo',
  ),
), null, 'CASCADE', 'Trabajadors', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CargCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CargCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CargCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CargCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CargCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CargCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('CargCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CargoTableMap::CLASS_DEFAULT : CargoTableMap::OM_CLASS;
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
     * @return array           (Cargo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CargoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CargoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CargoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CargoTableMap::OM_CLASS;
            /** @var Cargo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CargoTableMap::addInstanceToPool($obj, $key);
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
            $key = CargoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CargoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Cargo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CargoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CargoTableMap::COL_CARG_CODIGO);
            $criteria->addSelectColumn(CargoTableMap::COL_CARG_C_ESPECIALIDAD);
            $criteria->addSelectColumn(CargoTableMap::COL_CARG_T_RELACION_FAENA);
            $criteria->addSelectColumn(CargoTableMap::COL_CARG_SIGLA);
            $criteria->addSelectColumn(CargoTableMap::COL_CARG_DESCRIPCION);
            $criteria->addSelectColumn(CargoTableMap::COL_CARG_VIGENTE);
            $criteria->addSelectColumn(CargoTableMap::COL_CARG_R_FECHA_CREACION);
            $criteria->addSelectColumn(CargoTableMap::COL_CARG_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(CargoTableMap::COL_CARG_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.carg_codigo');
            $criteria->addSelectColumn($alias . '.carg_c_especialidad');
            $criteria->addSelectColumn($alias . '.carg_t_relacion_faena');
            $criteria->addSelectColumn($alias . '.carg_sigla');
            $criteria->addSelectColumn($alias . '.carg_descripcion');
            $criteria->addSelectColumn($alias . '.carg_vigente');
            $criteria->addSelectColumn($alias . '.carg_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.carg_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.carg_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(CargoTableMap::DATABASE_NAME)->getTable(CargoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CargoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CargoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CargoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Cargo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Cargo object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CargoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Cargo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CargoTableMap::DATABASE_NAME);
            $criteria->add(CargoTableMap::COL_CARG_CODIGO, (array) $values, Criteria::IN);
        }

        $query = CargoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CargoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CargoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the cargo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CargoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Cargo or Criteria object.
     *
     * @param mixed               $criteria Criteria or Cargo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CargoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Cargo object
        }

        if ($criteria->containsKey(CargoTableMap::COL_CARG_CODIGO) && $criteria->keyContainsValue(CargoTableMap::COL_CARG_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CargoTableMap::COL_CARG_CODIGO.')');
        }


        // Set the correct dbName
        $query = CargoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CargoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CargoTableMap::buildTableMap();
