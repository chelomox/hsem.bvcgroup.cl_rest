<?php

namespace Map;

use \Direccion;
use \DireccionQuery;
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
 * This class defines the structure of the 'direccion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DireccionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DireccionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'direccion';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Direccion';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Direccion';

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
     * the column name for the dire_c_persona field
     */
    const COL_DIRE_C_PERSONA = 'direccion.dire_c_persona';

    /**
     * the column name for the dire_t_direccion field
     */
    const COL_DIRE_T_DIRECCION = 'direccion.dire_t_direccion';

    /**
     * the column name for the dire_c_comuna field
     */
    const COL_DIRE_C_COMUNA = 'direccion.dire_c_comuna';

    /**
     * the column name for the dire_c_pais field
     */
    const COL_DIRE_C_PAIS = 'direccion.dire_c_pais';

    /**
     * the column name for the dire_detalle field
     */
    const COL_DIRE_DETALLE = 'direccion.dire_detalle';

    /**
     * the column name for the dire_codigo_postal field
     */
    const COL_DIRE_CODIGO_POSTAL = 'direccion.dire_codigo_postal';

    /**
     * the column name for the dire_telefono field
     */
    const COL_DIRE_TELEFONO = 'direccion.dire_telefono';

    /**
     * the column name for the dire_r_fecha_creacion field
     */
    const COL_DIRE_R_FECHA_CREACION = 'direccion.dire_r_fecha_creacion';

    /**
     * the column name for the dire_r_fecha_modificacion field
     */
    const COL_DIRE_R_FECHA_MODIFICACION = 'direccion.dire_r_fecha_modificacion';

    /**
     * the column name for the dire_r_usuario field
     */
    const COL_DIRE_R_USUARIO = 'direccion.dire_r_usuario';

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
        self::TYPE_PHPNAME       => array('DireCPersona', 'DireTDireccion', 'DireCComuna', 'DireCPais', 'DireDetalle', 'DireCodigoPostal', 'DireTelefono', 'DireRFechaCreacion', 'DireRFechaModificacion', 'DireRUsuario', ),
        self::TYPE_CAMELNAME     => array('direCPersona', 'direTDireccion', 'direCComuna', 'direCPais', 'direDetalle', 'direCodigoPostal', 'direTelefono', 'direRFechaCreacion', 'direRFechaModificacion', 'direRUsuario', ),
        self::TYPE_COLNAME       => array(DireccionTableMap::COL_DIRE_C_PERSONA, DireccionTableMap::COL_DIRE_T_DIRECCION, DireccionTableMap::COL_DIRE_C_COMUNA, DireccionTableMap::COL_DIRE_C_PAIS, DireccionTableMap::COL_DIRE_DETALLE, DireccionTableMap::COL_DIRE_CODIGO_POSTAL, DireccionTableMap::COL_DIRE_TELEFONO, DireccionTableMap::COL_DIRE_R_FECHA_CREACION, DireccionTableMap::COL_DIRE_R_FECHA_MODIFICACION, DireccionTableMap::COL_DIRE_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('dire_c_persona', 'dire_t_direccion', 'dire_c_comuna', 'dire_c_pais', 'dire_detalle', 'dire_codigo_postal', 'dire_telefono', 'dire_r_fecha_creacion', 'dire_r_fecha_modificacion', 'dire_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('DireCPersona' => 0, 'DireTDireccion' => 1, 'DireCComuna' => 2, 'DireCPais' => 3, 'DireDetalle' => 4, 'DireCodigoPostal' => 5, 'DireTelefono' => 6, 'DireRFechaCreacion' => 7, 'DireRFechaModificacion' => 8, 'DireRUsuario' => 9, ),
        self::TYPE_CAMELNAME     => array('direCPersona' => 0, 'direTDireccion' => 1, 'direCComuna' => 2, 'direCPais' => 3, 'direDetalle' => 4, 'direCodigoPostal' => 5, 'direTelefono' => 6, 'direRFechaCreacion' => 7, 'direRFechaModificacion' => 8, 'direRUsuario' => 9, ),
        self::TYPE_COLNAME       => array(DireccionTableMap::COL_DIRE_C_PERSONA => 0, DireccionTableMap::COL_DIRE_T_DIRECCION => 1, DireccionTableMap::COL_DIRE_C_COMUNA => 2, DireccionTableMap::COL_DIRE_C_PAIS => 3, DireccionTableMap::COL_DIRE_DETALLE => 4, DireccionTableMap::COL_DIRE_CODIGO_POSTAL => 5, DireccionTableMap::COL_DIRE_TELEFONO => 6, DireccionTableMap::COL_DIRE_R_FECHA_CREACION => 7, DireccionTableMap::COL_DIRE_R_FECHA_MODIFICACION => 8, DireccionTableMap::COL_DIRE_R_USUARIO => 9, ),
        self::TYPE_FIELDNAME     => array('dire_c_persona' => 0, 'dire_t_direccion' => 1, 'dire_c_comuna' => 2, 'dire_c_pais' => 3, 'dire_detalle' => 4, 'dire_codigo_postal' => 5, 'dire_telefono' => 6, 'dire_r_fecha_creacion' => 7, 'dire_r_fecha_modificacion' => 8, 'dire_r_usuario' => 9, ),
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
        $this->setName('direccion');
        $this->setPhpName('Direccion');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Direccion');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('dire_c_persona', 'DireCPersona', 'INTEGER' , 'persona', 'pers_codigo', true, null, null);
        $this->addForeignPrimaryKey('dire_t_direccion', 'DireTDireccion', 'INTEGER' , 't_direccion', 'tdir_tipo', true, null, null);
        $this->addForeignKey('dire_c_comuna', 'DireCComuna', 'INTEGER', 'comuna', 'comu_codigo', false, null, null);
        $this->addForeignKey('dire_c_pais', 'DireCPais', 'INTEGER', 'pais', 'pais_codigo', false, null, null);
        $this->addColumn('dire_detalle', 'DireDetalle', 'VARCHAR', false, 255, null);
        $this->addColumn('dire_codigo_postal', 'DireCodigoPostal', 'VARCHAR', false, 10, null);
        $this->addColumn('dire_telefono', 'DireTelefono', 'VARCHAR', false, 15, null);
        $this->addColumn('dire_r_fecha_creacion', 'DireRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('dire_r_fecha_modificacion', 'DireRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('dire_r_usuario', 'DireRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Comuna', '\\Comuna', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':dire_c_comuna',
    1 => ':comu_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Pais', '\\Pais', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':dire_c_pais',
    1 => ':pais_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Persona', '\\Persona', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':dire_c_persona',
    1 => ':pers_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('TDireccion', '\\TDireccion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':dire_t_direccion',
    1 => ':tdir_tipo',
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
     * @param \Direccion $obj A \Direccion object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getDireCPersona() || is_scalar($obj->getDireCPersona()) || is_callable([$obj->getDireCPersona(), '__toString']) ? (string) $obj->getDireCPersona() : $obj->getDireCPersona()), (null === $obj->getDireTDireccion() || is_scalar($obj->getDireTDireccion()) || is_callable([$obj->getDireTDireccion(), '__toString']) ? (string) $obj->getDireTDireccion() : $obj->getDireTDireccion())]);
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
     * @param mixed $value A \Direccion object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Direccion) {
                $key = serialize([(null === $value->getDireCPersona() || is_scalar($value->getDireCPersona()) || is_callable([$value->getDireCPersona(), '__toString']) ? (string) $value->getDireCPersona() : $value->getDireCPersona()), (null === $value->getDireTDireccion() || is_scalar($value->getDireTDireccion()) || is_callable([$value->getDireTDireccion(), '__toString']) ? (string) $value->getDireTDireccion() : $value->getDireTDireccion())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Direccion object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DireCPersona', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DireTDireccion', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DireCPersona', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DireCPersona', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DireCPersona', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DireCPersona', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DireCPersona', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DireTDireccion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DireTDireccion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DireTDireccion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DireTDireccion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DireTDireccion', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('DireCPersona', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('DireTDireccion', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? DireccionTableMap::CLASS_DEFAULT : DireccionTableMap::OM_CLASS;
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
     * @return array           (Direccion object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DireccionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DireccionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DireccionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DireccionTableMap::OM_CLASS;
            /** @var Direccion $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DireccionTableMap::addInstanceToPool($obj, $key);
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
            $key = DireccionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DireccionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Direccion $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DireccionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DireccionTableMap::COL_DIRE_C_PERSONA);
            $criteria->addSelectColumn(DireccionTableMap::COL_DIRE_T_DIRECCION);
            $criteria->addSelectColumn(DireccionTableMap::COL_DIRE_C_COMUNA);
            $criteria->addSelectColumn(DireccionTableMap::COL_DIRE_C_PAIS);
            $criteria->addSelectColumn(DireccionTableMap::COL_DIRE_DETALLE);
            $criteria->addSelectColumn(DireccionTableMap::COL_DIRE_CODIGO_POSTAL);
            $criteria->addSelectColumn(DireccionTableMap::COL_DIRE_TELEFONO);
            $criteria->addSelectColumn(DireccionTableMap::COL_DIRE_R_FECHA_CREACION);
            $criteria->addSelectColumn(DireccionTableMap::COL_DIRE_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(DireccionTableMap::COL_DIRE_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.dire_c_persona');
            $criteria->addSelectColumn($alias . '.dire_t_direccion');
            $criteria->addSelectColumn($alias . '.dire_c_comuna');
            $criteria->addSelectColumn($alias . '.dire_c_pais');
            $criteria->addSelectColumn($alias . '.dire_detalle');
            $criteria->addSelectColumn($alias . '.dire_codigo_postal');
            $criteria->addSelectColumn($alias . '.dire_telefono');
            $criteria->addSelectColumn($alias . '.dire_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.dire_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.dire_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(DireccionTableMap::DATABASE_NAME)->getTable(DireccionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DireccionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DireccionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DireccionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Direccion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Direccion object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DireccionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Direccion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DireccionTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(DireccionTableMap::COL_DIRE_C_PERSONA, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(DireccionTableMap::COL_DIRE_T_DIRECCION, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = DireccionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DireccionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DireccionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the direccion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DireccionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Direccion or Criteria object.
     *
     * @param mixed               $criteria Criteria or Direccion object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DireccionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Direccion object
        }


        // Set the correct dbName
        $query = DireccionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DireccionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DireccionTableMap::buildTableMap();
