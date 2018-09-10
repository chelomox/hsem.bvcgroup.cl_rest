<?php

namespace Map;

use \AniosExperienciaCargo;
use \AniosExperienciaCargoQuery;
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
 * This class defines the structure of the 'anios_experiencia_cargo' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AniosExperienciaCargoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AniosExperienciaCargoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'anios_experiencia_cargo';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\AniosExperienciaCargo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'AniosExperienciaCargo';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the anexca_codigo field
     */
    const COL_ANEXCA_CODIGO = 'anios_experiencia_cargo.anexca_codigo';

    /**
     * the column name for the anexca_descripcion field
     */
    const COL_ANEXCA_DESCRIPCION = 'anios_experiencia_cargo.anexca_descripcion';

    /**
     * the column name for the anexca_vigente field
     */
    const COL_ANEXCA_VIGENTE = 'anios_experiencia_cargo.anexca_vigente';

    /**
     * the column name for the anexca_r_fecha_creacion field
     */
    const COL_ANEXCA_R_FECHA_CREACION = 'anios_experiencia_cargo.anexca_r_fecha_creacion';

    /**
     * the column name for the anexca_r_fecha_modificacion field
     */
    const COL_ANEXCA_R_FECHA_MODIFICACION = 'anios_experiencia_cargo.anexca_r_fecha_modificacion';

    /**
     * the column name for the anexca_r_usuario field
     */
    const COL_ANEXCA_R_USUARIO = 'anios_experiencia_cargo.anexca_r_usuario';

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
        self::TYPE_PHPNAME       => array('AnexcaCodigo', 'AnexcaDescripcion', 'AnexcaVigente', 'AnexcaRFechaCreacion', 'AnexcaRFechaModificacion', 'AnexcaRUsuario', ),
        self::TYPE_CAMELNAME     => array('anexcaCodigo', 'anexcaDescripcion', 'anexcaVigente', 'anexcaRFechaCreacion', 'anexcaRFechaModificacion', 'anexcaRUsuario', ),
        self::TYPE_COLNAME       => array(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO, AniosExperienciaCargoTableMap::COL_ANEXCA_DESCRIPCION, AniosExperienciaCargoTableMap::COL_ANEXCA_VIGENTE, AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_CREACION, AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_MODIFICACION, AniosExperienciaCargoTableMap::COL_ANEXCA_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('anexca_codigo', 'anexca_descripcion', 'anexca_vigente', 'anexca_r_fecha_creacion', 'anexca_r_fecha_modificacion', 'anexca_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('AnexcaCodigo' => 0, 'AnexcaDescripcion' => 1, 'AnexcaVigente' => 2, 'AnexcaRFechaCreacion' => 3, 'AnexcaRFechaModificacion' => 4, 'AnexcaRUsuario' => 5, ),
        self::TYPE_CAMELNAME     => array('anexcaCodigo' => 0, 'anexcaDescripcion' => 1, 'anexcaVigente' => 2, 'anexcaRFechaCreacion' => 3, 'anexcaRFechaModificacion' => 4, 'anexcaRUsuario' => 5, ),
        self::TYPE_COLNAME       => array(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO => 0, AniosExperienciaCargoTableMap::COL_ANEXCA_DESCRIPCION => 1, AniosExperienciaCargoTableMap::COL_ANEXCA_VIGENTE => 2, AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_CREACION => 3, AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_MODIFICACION => 4, AniosExperienciaCargoTableMap::COL_ANEXCA_R_USUARIO => 5, ),
        self::TYPE_FIELDNAME     => array('anexca_codigo' => 0, 'anexca_descripcion' => 1, 'anexca_vigente' => 2, 'anexca_r_fecha_creacion' => 3, 'anexca_r_fecha_modificacion' => 4, 'anexca_r_usuario' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('anios_experiencia_cargo');
        $this->setPhpName('AniosExperienciaCargo');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\AniosExperienciaCargo');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('anexca_codigo', 'AnexcaCodigo', 'INTEGER', true, null, null);
        $this->addColumn('anexca_descripcion', 'AnexcaDescripcion', 'VARCHAR', false, 255, null);
        $this->addColumn('anexca_vigente', 'AnexcaVigente', 'INTEGER', false, 1, null);
        $this->addColumn('anexca_r_fecha_creacion', 'AnexcaRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('anexca_r_fecha_modificacion', 'AnexcaRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('anexca_r_usuario', 'AnexcaRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Trabajador', '\\Trabajador', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':trab_c_anios_experiencia_cargo',
    1 => ':anexca_codigo',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AnexcaCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AnexcaCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AnexcaCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AnexcaCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AnexcaCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AnexcaCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('AnexcaCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AniosExperienciaCargoTableMap::CLASS_DEFAULT : AniosExperienciaCargoTableMap::OM_CLASS;
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
     * @return array           (AniosExperienciaCargo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AniosExperienciaCargoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AniosExperienciaCargoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AniosExperienciaCargoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AniosExperienciaCargoTableMap::OM_CLASS;
            /** @var AniosExperienciaCargo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AniosExperienciaCargoTableMap::addInstanceToPool($obj, $key);
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
            $key = AniosExperienciaCargoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AniosExperienciaCargoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AniosExperienciaCargo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AniosExperienciaCargoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO);
            $criteria->addSelectColumn(AniosExperienciaCargoTableMap::COL_ANEXCA_DESCRIPCION);
            $criteria->addSelectColumn(AniosExperienciaCargoTableMap::COL_ANEXCA_VIGENTE);
            $criteria->addSelectColumn(AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_CREACION);
            $criteria->addSelectColumn(AniosExperienciaCargoTableMap::COL_ANEXCA_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(AniosExperienciaCargoTableMap::COL_ANEXCA_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.anexca_codigo');
            $criteria->addSelectColumn($alias . '.anexca_descripcion');
            $criteria->addSelectColumn($alias . '.anexca_vigente');
            $criteria->addSelectColumn($alias . '.anexca_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.anexca_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.anexca_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(AniosExperienciaCargoTableMap::DATABASE_NAME)->getTable(AniosExperienciaCargoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AniosExperienciaCargoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AniosExperienciaCargoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AniosExperienciaCargoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AniosExperienciaCargo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AniosExperienciaCargo object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AniosExperienciaCargoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AniosExperienciaCargo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AniosExperienciaCargoTableMap::DATABASE_NAME);
            $criteria->add(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO, (array) $values, Criteria::IN);
        }

        $query = AniosExperienciaCargoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AniosExperienciaCargoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AniosExperienciaCargoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the anios_experiencia_cargo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AniosExperienciaCargoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AniosExperienciaCargo or Criteria object.
     *
     * @param mixed               $criteria Criteria or AniosExperienciaCargo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AniosExperienciaCargoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AniosExperienciaCargo object
        }

        if ($criteria->containsKey(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO) && $criteria->keyContainsValue(AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AniosExperienciaCargoTableMap::COL_ANEXCA_CODIGO.')');
        }


        // Set the correct dbName
        $query = AniosExperienciaCargoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AniosExperienciaCargoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AniosExperienciaCargoTableMap::buildTableMap();
