<?php

namespace Map;

use \Especialidad;
use \EspecialidadQuery;
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
 * This class defines the structure of the 'especialidad' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EspecialidadTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EspecialidadTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'especialidad';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Especialidad';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Especialidad';

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
     * the column name for the espe_codigo field
     */
    const COL_ESPE_CODIGO = 'especialidad.espe_codigo';

    /**
     * the column name for the espe_c_institucion field
     */
    const COL_ESPE_C_INSTITUCION = 'especialidad.espe_c_institucion';

    /**
     * the column name for the espe_sigla field
     */
    const COL_ESPE_SIGLA = 'especialidad.espe_sigla';

    /**
     * the column name for the espe_descripcion field
     */
    const COL_ESPE_DESCRIPCION = 'especialidad.espe_descripcion';

    /**
     * the column name for the espe_vigente field
     */
    const COL_ESPE_VIGENTE = 'especialidad.espe_vigente';

    /**
     * the column name for the espe_r_fecha_creacion field
     */
    const COL_ESPE_R_FECHA_CREACION = 'especialidad.espe_r_fecha_creacion';

    /**
     * the column name for the espe_r_fecha_modificacion field
     */
    const COL_ESPE_R_FECHA_MODIFICACION = 'especialidad.espe_r_fecha_modificacion';

    /**
     * the column name for the espe_r_usuario field
     */
    const COL_ESPE_R_USUARIO = 'especialidad.espe_r_usuario';

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
        self::TYPE_PHPNAME       => array('EspeCodigo', 'EspeCInstitucion', 'EspeSigla', 'EspeDescripcion', 'EspeVigente', 'EspeRFechaCreacion', 'EspeRFechaModificacion', 'EspeRUsuario', ),
        self::TYPE_CAMELNAME     => array('espeCodigo', 'espeCInstitucion', 'espeSigla', 'espeDescripcion', 'espeVigente', 'espeRFechaCreacion', 'espeRFechaModificacion', 'espeRUsuario', ),
        self::TYPE_COLNAME       => array(EspecialidadTableMap::COL_ESPE_CODIGO, EspecialidadTableMap::COL_ESPE_C_INSTITUCION, EspecialidadTableMap::COL_ESPE_SIGLA, EspecialidadTableMap::COL_ESPE_DESCRIPCION, EspecialidadTableMap::COL_ESPE_VIGENTE, EspecialidadTableMap::COL_ESPE_R_FECHA_CREACION, EspecialidadTableMap::COL_ESPE_R_FECHA_MODIFICACION, EspecialidadTableMap::COL_ESPE_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('espe_codigo', 'espe_c_institucion', 'espe_sigla', 'espe_descripcion', 'espe_vigente', 'espe_r_fecha_creacion', 'espe_r_fecha_modificacion', 'espe_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('EspeCodigo' => 0, 'EspeCInstitucion' => 1, 'EspeSigla' => 2, 'EspeDescripcion' => 3, 'EspeVigente' => 4, 'EspeRFechaCreacion' => 5, 'EspeRFechaModificacion' => 6, 'EspeRUsuario' => 7, ),
        self::TYPE_CAMELNAME     => array('espeCodigo' => 0, 'espeCInstitucion' => 1, 'espeSigla' => 2, 'espeDescripcion' => 3, 'espeVigente' => 4, 'espeRFechaCreacion' => 5, 'espeRFechaModificacion' => 6, 'espeRUsuario' => 7, ),
        self::TYPE_COLNAME       => array(EspecialidadTableMap::COL_ESPE_CODIGO => 0, EspecialidadTableMap::COL_ESPE_C_INSTITUCION => 1, EspecialidadTableMap::COL_ESPE_SIGLA => 2, EspecialidadTableMap::COL_ESPE_DESCRIPCION => 3, EspecialidadTableMap::COL_ESPE_VIGENTE => 4, EspecialidadTableMap::COL_ESPE_R_FECHA_CREACION => 5, EspecialidadTableMap::COL_ESPE_R_FECHA_MODIFICACION => 6, EspecialidadTableMap::COL_ESPE_R_USUARIO => 7, ),
        self::TYPE_FIELDNAME     => array('espe_codigo' => 0, 'espe_c_institucion' => 1, 'espe_sigla' => 2, 'espe_descripcion' => 3, 'espe_vigente' => 4, 'espe_r_fecha_creacion' => 5, 'espe_r_fecha_modificacion' => 6, 'espe_r_usuario' => 7, ),
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
        $this->setName('especialidad');
        $this->setPhpName('Especialidad');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Especialidad');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('espe_codigo', 'EspeCodigo', 'INTEGER', true, null, null);
        $this->addForeignKey('espe_c_institucion', 'EspeCInstitucion', 'INTEGER', 'institucion', 'inst_codigo', false, null, null);
        $this->addColumn('espe_sigla', 'EspeSigla', 'VARCHAR', false, 15, null);
        $this->addColumn('espe_descripcion', 'EspeDescripcion', 'VARCHAR', false, 255, null);
        $this->addColumn('espe_vigente', 'EspeVigente', 'INTEGER', false, 1, null);
        $this->addColumn('espe_r_fecha_creacion', 'EspeRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('espe_r_fecha_modificacion', 'EspeRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('espe_r_usuario', 'EspeRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Institucion', '\\Institucion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':espe_c_institucion',
    1 => ':inst_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Cargo', '\\Cargo', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':carg_c_especialidad',
    1 => ':espe_codigo',
  ),
), null, 'CASCADE', 'Cargos', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EspeCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EspeCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EspeCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EspeCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EspeCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EspeCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('EspeCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EspecialidadTableMap::CLASS_DEFAULT : EspecialidadTableMap::OM_CLASS;
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
     * @return array           (Especialidad object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EspecialidadTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EspecialidadTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EspecialidadTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EspecialidadTableMap::OM_CLASS;
            /** @var Especialidad $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EspecialidadTableMap::addInstanceToPool($obj, $key);
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
            $key = EspecialidadTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EspecialidadTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Especialidad $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EspecialidadTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EspecialidadTableMap::COL_ESPE_CODIGO);
            $criteria->addSelectColumn(EspecialidadTableMap::COL_ESPE_C_INSTITUCION);
            $criteria->addSelectColumn(EspecialidadTableMap::COL_ESPE_SIGLA);
            $criteria->addSelectColumn(EspecialidadTableMap::COL_ESPE_DESCRIPCION);
            $criteria->addSelectColumn(EspecialidadTableMap::COL_ESPE_VIGENTE);
            $criteria->addSelectColumn(EspecialidadTableMap::COL_ESPE_R_FECHA_CREACION);
            $criteria->addSelectColumn(EspecialidadTableMap::COL_ESPE_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(EspecialidadTableMap::COL_ESPE_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.espe_codigo');
            $criteria->addSelectColumn($alias . '.espe_c_institucion');
            $criteria->addSelectColumn($alias . '.espe_sigla');
            $criteria->addSelectColumn($alias . '.espe_descripcion');
            $criteria->addSelectColumn($alias . '.espe_vigente');
            $criteria->addSelectColumn($alias . '.espe_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.espe_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.espe_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(EspecialidadTableMap::DATABASE_NAME)->getTable(EspecialidadTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EspecialidadTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EspecialidadTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EspecialidadTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Especialidad or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Especialidad object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EspecialidadTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Especialidad) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EspecialidadTableMap::DATABASE_NAME);
            $criteria->add(EspecialidadTableMap::COL_ESPE_CODIGO, (array) $values, Criteria::IN);
        }

        $query = EspecialidadQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EspecialidadTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EspecialidadTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the especialidad table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EspecialidadQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Especialidad or Criteria object.
     *
     * @param mixed               $criteria Criteria or Especialidad object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EspecialidadTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Especialidad object
        }

        if ($criteria->containsKey(EspecialidadTableMap::COL_ESPE_CODIGO) && $criteria->keyContainsValue(EspecialidadTableMap::COL_ESPE_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EspecialidadTableMap::COL_ESPE_CODIGO.')');
        }


        // Set the correct dbName
        $query = EspecialidadQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EspecialidadTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EspecialidadTableMap::buildTableMap();
