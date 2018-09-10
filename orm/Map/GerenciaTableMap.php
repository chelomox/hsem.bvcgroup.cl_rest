<?php

namespace Map;

use \Gerencia;
use \GerenciaQuery;
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
 * This class defines the structure of the 'gerencia' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class GerenciaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.GerenciaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'gerencia';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Gerencia';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Gerencia';

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
     * the column name for the gere_codigo field
     */
    const COL_GERE_CODIGO = 'gerencia.gere_codigo';

    /**
     * the column name for the gere_c_institucion field
     */
    const COL_GERE_C_INSTITUCION = 'gerencia.gere_c_institucion';

    /**
     * the column name for the gere_sigla field
     */
    const COL_GERE_SIGLA = 'gerencia.gere_sigla';

    /**
     * the column name for the gere_descripcion field
     */
    const COL_GERE_DESCRIPCION = 'gerencia.gere_descripcion';

    /**
     * the column name for the gere_r_fecha_creacion field
     */
    const COL_GERE_R_FECHA_CREACION = 'gerencia.gere_r_fecha_creacion';

    /**
     * the column name for the gere_r_fecha_modificacion field
     */
    const COL_GERE_R_FECHA_MODIFICACION = 'gerencia.gere_r_fecha_modificacion';

    /**
     * the column name for the gere_r_usuario field
     */
    const COL_GERE_R_USUARIO = 'gerencia.gere_r_usuario';

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
        self::TYPE_PHPNAME       => array('GereCodigo', 'GereCInstitucion', 'GereSigla', 'GereDescripcion', 'GereRFechaCreacion', 'GereRFechaModificacion', 'GereRUsuario', ),
        self::TYPE_CAMELNAME     => array('gereCodigo', 'gereCInstitucion', 'gereSigla', 'gereDescripcion', 'gereRFechaCreacion', 'gereRFechaModificacion', 'gereRUsuario', ),
        self::TYPE_COLNAME       => array(GerenciaTableMap::COL_GERE_CODIGO, GerenciaTableMap::COL_GERE_C_INSTITUCION, GerenciaTableMap::COL_GERE_SIGLA, GerenciaTableMap::COL_GERE_DESCRIPCION, GerenciaTableMap::COL_GERE_R_FECHA_CREACION, GerenciaTableMap::COL_GERE_R_FECHA_MODIFICACION, GerenciaTableMap::COL_GERE_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('gere_codigo', 'gere_c_institucion', 'gere_sigla', 'gere_descripcion', 'gere_r_fecha_creacion', 'gere_r_fecha_modificacion', 'gere_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('GereCodigo' => 0, 'GereCInstitucion' => 1, 'GereSigla' => 2, 'GereDescripcion' => 3, 'GereRFechaCreacion' => 4, 'GereRFechaModificacion' => 5, 'GereRUsuario' => 6, ),
        self::TYPE_CAMELNAME     => array('gereCodigo' => 0, 'gereCInstitucion' => 1, 'gereSigla' => 2, 'gereDescripcion' => 3, 'gereRFechaCreacion' => 4, 'gereRFechaModificacion' => 5, 'gereRUsuario' => 6, ),
        self::TYPE_COLNAME       => array(GerenciaTableMap::COL_GERE_CODIGO => 0, GerenciaTableMap::COL_GERE_C_INSTITUCION => 1, GerenciaTableMap::COL_GERE_SIGLA => 2, GerenciaTableMap::COL_GERE_DESCRIPCION => 3, GerenciaTableMap::COL_GERE_R_FECHA_CREACION => 4, GerenciaTableMap::COL_GERE_R_FECHA_MODIFICACION => 5, GerenciaTableMap::COL_GERE_R_USUARIO => 6, ),
        self::TYPE_FIELDNAME     => array('gere_codigo' => 0, 'gere_c_institucion' => 1, 'gere_sigla' => 2, 'gere_descripcion' => 3, 'gere_r_fecha_creacion' => 4, 'gere_r_fecha_modificacion' => 5, 'gere_r_usuario' => 6, ),
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
        $this->setName('gerencia');
        $this->setPhpName('Gerencia');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Gerencia');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('gere_codigo', 'GereCodigo', 'INTEGER', true, null, null);
        $this->addForeignKey('gere_c_institucion', 'GereCInstitucion', 'INTEGER', 'institucion', 'inst_codigo', false, null, null);
        $this->addColumn('gere_sigla', 'GereSigla', 'VARCHAR', false, 10, null);
        $this->addColumn('gere_descripcion', 'GereDescripcion', 'VARCHAR', false, 255, null);
        $this->addColumn('gere_r_fecha_creacion', 'GereRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('gere_r_fecha_modificacion', 'GereRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('gere_r_usuario', 'GereRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Institucion', '\\Institucion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':gere_c_institucion',
    1 => ':inst_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Trabajador', '\\Trabajador', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':trab_c_gerencia',
    1 => ':gere_codigo',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GereCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GereCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GereCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GereCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GereCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GereCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('GereCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? GerenciaTableMap::CLASS_DEFAULT : GerenciaTableMap::OM_CLASS;
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
     * @return array           (Gerencia object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = GerenciaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = GerenciaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + GerenciaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = GerenciaTableMap::OM_CLASS;
            /** @var Gerencia $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            GerenciaTableMap::addInstanceToPool($obj, $key);
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
            $key = GerenciaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = GerenciaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Gerencia $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                GerenciaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(GerenciaTableMap::COL_GERE_CODIGO);
            $criteria->addSelectColumn(GerenciaTableMap::COL_GERE_C_INSTITUCION);
            $criteria->addSelectColumn(GerenciaTableMap::COL_GERE_SIGLA);
            $criteria->addSelectColumn(GerenciaTableMap::COL_GERE_DESCRIPCION);
            $criteria->addSelectColumn(GerenciaTableMap::COL_GERE_R_FECHA_CREACION);
            $criteria->addSelectColumn(GerenciaTableMap::COL_GERE_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(GerenciaTableMap::COL_GERE_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.gere_codigo');
            $criteria->addSelectColumn($alias . '.gere_c_institucion');
            $criteria->addSelectColumn($alias . '.gere_sigla');
            $criteria->addSelectColumn($alias . '.gere_descripcion');
            $criteria->addSelectColumn($alias . '.gere_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.gere_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.gere_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(GerenciaTableMap::DATABASE_NAME)->getTable(GerenciaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(GerenciaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(GerenciaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new GerenciaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Gerencia or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Gerencia object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(GerenciaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Gerencia) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(GerenciaTableMap::DATABASE_NAME);
            $criteria->add(GerenciaTableMap::COL_GERE_CODIGO, (array) $values, Criteria::IN);
        }

        $query = GerenciaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            GerenciaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                GerenciaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the gerencia table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return GerenciaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Gerencia or Criteria object.
     *
     * @param mixed               $criteria Criteria or Gerencia object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GerenciaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Gerencia object
        }

        if ($criteria->containsKey(GerenciaTableMap::COL_GERE_CODIGO) && $criteria->keyContainsValue(GerenciaTableMap::COL_GERE_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.GerenciaTableMap::COL_GERE_CODIGO.')');
        }


        // Set the correct dbName
        $query = GerenciaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // GerenciaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
GerenciaTableMap::buildTableMap();
