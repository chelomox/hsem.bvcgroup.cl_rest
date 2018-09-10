<?php

namespace Map;

use \Trabajador;
use \TrabajadorQuery;
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
 * This class defines the structure of the 'trabajador' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TrabajadorTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TrabajadorTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'trabajador';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Trabajador';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Trabajador';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the trab_codigo field
     */
    const COL_TRAB_CODIGO = 'trabajador.trab_codigo';

    /**
     * the column name for the trab_c_persona field
     */
    const COL_TRAB_C_PERSONA = 'trabajador.trab_c_persona';

    /**
     * the column name for the trab_c_cargo field
     */
    const COL_TRAB_C_CARGO = 'trabajador.trab_c_cargo';

    /**
     * the column name for the trab_c_gerencia field
     */
    const COL_TRAB_C_GERENCIA = 'trabajador.trab_c_gerencia';

    /**
     * the column name for the trab_c_area field
     */
    const COL_TRAB_C_AREA = 'trabajador.trab_c_area';

    /**
     * the column name for the trab_c_anios_experiencia_cargo field
     */
    const COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO = 'trabajador.trab_c_anios_experiencia_cargo';

    /**
     * the column name for the trab_fecha_inicio field
     */
    const COL_TRAB_FECHA_INICIO = 'trabajador.trab_fecha_inicio';

    /**
     * the column name for the trab_fecha_termino field
     */
    const COL_TRAB_FECHA_TERMINO = 'trabajador.trab_fecha_termino';

    /**
     * the column name for the trab_vigente field
     */
    const COL_TRAB_VIGENTE = 'trabajador.trab_vigente';

    /**
     * the column name for the trab_r_fecha_creacion field
     */
    const COL_TRAB_R_FECHA_CREACION = 'trabajador.trab_r_fecha_creacion';

    /**
     * the column name for the trab_r_fecha_modificacion field
     */
    const COL_TRAB_R_FECHA_MODIFICACION = 'trabajador.trab_r_fecha_modificacion';

    /**
     * the column name for the trab_r_usuario field
     */
    const COL_TRAB_R_USUARIO = 'trabajador.trab_r_usuario';

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
        self::TYPE_PHPNAME       => array('TrabCodigo', 'TrabCPersona', 'TrabCCargo', 'TrabCGerencia', 'TrabCArea', 'TrabCAniosExperienciaCargo', 'TrabFechaInicio', 'TrabFechaTermino', 'TrabVigente', 'TrabRFechaCreacion', 'TrabRFechaModificacion', 'TrabRUsuario', ),
        self::TYPE_CAMELNAME     => array('trabCodigo', 'trabCPersona', 'trabCCargo', 'trabCGerencia', 'trabCArea', 'trabCAniosExperienciaCargo', 'trabFechaInicio', 'trabFechaTermino', 'trabVigente', 'trabRFechaCreacion', 'trabRFechaModificacion', 'trabRUsuario', ),
        self::TYPE_COLNAME       => array(TrabajadorTableMap::COL_TRAB_CODIGO, TrabajadorTableMap::COL_TRAB_C_PERSONA, TrabajadorTableMap::COL_TRAB_C_CARGO, TrabajadorTableMap::COL_TRAB_C_GERENCIA, TrabajadorTableMap::COL_TRAB_C_AREA, TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO, TrabajadorTableMap::COL_TRAB_FECHA_INICIO, TrabajadorTableMap::COL_TRAB_FECHA_TERMINO, TrabajadorTableMap::COL_TRAB_VIGENTE, TrabajadorTableMap::COL_TRAB_R_FECHA_CREACION, TrabajadorTableMap::COL_TRAB_R_FECHA_MODIFICACION, TrabajadorTableMap::COL_TRAB_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('trab_codigo', 'trab_c_persona', 'trab_c_cargo', 'trab_c_gerencia', 'trab_c_area', 'trab_c_anios_experiencia_cargo', 'trab_fecha_inicio', 'trab_fecha_termino', 'trab_vigente', 'trab_r_fecha_creacion', 'trab_r_fecha_modificacion', 'trab_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('TrabCodigo' => 0, 'TrabCPersona' => 1, 'TrabCCargo' => 2, 'TrabCGerencia' => 3, 'TrabCArea' => 4, 'TrabCAniosExperienciaCargo' => 5, 'TrabFechaInicio' => 6, 'TrabFechaTermino' => 7, 'TrabVigente' => 8, 'TrabRFechaCreacion' => 9, 'TrabRFechaModificacion' => 10, 'TrabRUsuario' => 11, ),
        self::TYPE_CAMELNAME     => array('trabCodigo' => 0, 'trabCPersona' => 1, 'trabCCargo' => 2, 'trabCGerencia' => 3, 'trabCArea' => 4, 'trabCAniosExperienciaCargo' => 5, 'trabFechaInicio' => 6, 'trabFechaTermino' => 7, 'trabVigente' => 8, 'trabRFechaCreacion' => 9, 'trabRFechaModificacion' => 10, 'trabRUsuario' => 11, ),
        self::TYPE_COLNAME       => array(TrabajadorTableMap::COL_TRAB_CODIGO => 0, TrabajadorTableMap::COL_TRAB_C_PERSONA => 1, TrabajadorTableMap::COL_TRAB_C_CARGO => 2, TrabajadorTableMap::COL_TRAB_C_GERENCIA => 3, TrabajadorTableMap::COL_TRAB_C_AREA => 4, TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO => 5, TrabajadorTableMap::COL_TRAB_FECHA_INICIO => 6, TrabajadorTableMap::COL_TRAB_FECHA_TERMINO => 7, TrabajadorTableMap::COL_TRAB_VIGENTE => 8, TrabajadorTableMap::COL_TRAB_R_FECHA_CREACION => 9, TrabajadorTableMap::COL_TRAB_R_FECHA_MODIFICACION => 10, TrabajadorTableMap::COL_TRAB_R_USUARIO => 11, ),
        self::TYPE_FIELDNAME     => array('trab_codigo' => 0, 'trab_c_persona' => 1, 'trab_c_cargo' => 2, 'trab_c_gerencia' => 3, 'trab_c_area' => 4, 'trab_c_anios_experiencia_cargo' => 5, 'trab_fecha_inicio' => 6, 'trab_fecha_termino' => 7, 'trab_vigente' => 8, 'trab_r_fecha_creacion' => 9, 'trab_r_fecha_modificacion' => 10, 'trab_r_usuario' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('trabajador');
        $this->setPhpName('Trabajador');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Trabajador');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('trab_codigo', 'TrabCodigo', 'INTEGER', true, null, null);
        $this->addForeignKey('trab_c_persona', 'TrabCPersona', 'INTEGER', 'persona', 'pers_codigo', true, null, null);
        $this->addForeignKey('trab_c_cargo', 'TrabCCargo', 'INTEGER', 'cargo', 'carg_codigo', true, null, null);
        $this->addForeignKey('trab_c_gerencia', 'TrabCGerencia', 'INTEGER', 'gerencia', 'gere_codigo', true, null, null);
        $this->addForeignKey('trab_c_area', 'TrabCArea', 'INTEGER', 'area', 'area_codigo', true, null, null);
        $this->addForeignKey('trab_c_anios_experiencia_cargo', 'TrabCAniosExperienciaCargo', 'INTEGER', 'anios_experiencia_cargo', 'anexca_codigo', true, null, null);
        $this->addColumn('trab_fecha_inicio', 'TrabFechaInicio', 'VARCHAR', false, 20, null);
        $this->addColumn('trab_fecha_termino', 'TrabFechaTermino', 'VARCHAR', false, 20, null);
        $this->addColumn('trab_vigente', 'TrabVigente', 'INTEGER', false, 1, null);
        $this->addColumn('trab_r_fecha_creacion', 'TrabRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('trab_r_fecha_modificacion', 'TrabRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('trab_r_usuario', 'TrabRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('AniosExperienciaCargo', '\\AniosExperienciaCargo', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':trab_c_anios_experiencia_cargo',
    1 => ':anexca_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Area', '\\Area', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':trab_c_area',
    1 => ':area_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Cargo', '\\Cargo', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':trab_c_cargo',
    1 => ':carg_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Gerencia', '\\Gerencia', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':trab_c_gerencia',
    1 => ':gere_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Persona', '\\Persona', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':trab_c_persona',
    1 => ':pers_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Inscripcion', '\\Inscripcion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':insc_c_trabajador',
    1 => ':trab_codigo',
  ),
), null, null, 'Inscripcions', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TrabCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TrabCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TrabCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TrabCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TrabCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TrabCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('TrabCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TrabajadorTableMap::CLASS_DEFAULT : TrabajadorTableMap::OM_CLASS;
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
     * @return array           (Trabajador object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TrabajadorTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TrabajadorTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TrabajadorTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TrabajadorTableMap::OM_CLASS;
            /** @var Trabajador $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TrabajadorTableMap::addInstanceToPool($obj, $key);
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
            $key = TrabajadorTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TrabajadorTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Trabajador $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TrabajadorTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_CODIGO);
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_C_PERSONA);
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_C_CARGO);
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_C_GERENCIA);
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_C_AREA);
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_C_ANIOS_EXPERIENCIA_CARGO);
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_FECHA_INICIO);
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_FECHA_TERMINO);
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_VIGENTE);
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_R_FECHA_CREACION);
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(TrabajadorTableMap::COL_TRAB_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.trab_codigo');
            $criteria->addSelectColumn($alias . '.trab_c_persona');
            $criteria->addSelectColumn($alias . '.trab_c_cargo');
            $criteria->addSelectColumn($alias . '.trab_c_gerencia');
            $criteria->addSelectColumn($alias . '.trab_c_area');
            $criteria->addSelectColumn($alias . '.trab_c_anios_experiencia_cargo');
            $criteria->addSelectColumn($alias . '.trab_fecha_inicio');
            $criteria->addSelectColumn($alias . '.trab_fecha_termino');
            $criteria->addSelectColumn($alias . '.trab_vigente');
            $criteria->addSelectColumn($alias . '.trab_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.trab_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.trab_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(TrabajadorTableMap::DATABASE_NAME)->getTable(TrabajadorTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TrabajadorTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TrabajadorTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TrabajadorTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Trabajador or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Trabajador object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TrabajadorTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Trabajador) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TrabajadorTableMap::DATABASE_NAME);
            $criteria->add(TrabajadorTableMap::COL_TRAB_CODIGO, (array) $values, Criteria::IN);
        }

        $query = TrabajadorQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TrabajadorTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TrabajadorTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the trabajador table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TrabajadorQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Trabajador or Criteria object.
     *
     * @param mixed               $criteria Criteria or Trabajador object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TrabajadorTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Trabajador object
        }

        if ($criteria->containsKey(TrabajadorTableMap::COL_TRAB_CODIGO) && $criteria->keyContainsValue(TrabajadorTableMap::COL_TRAB_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TrabajadorTableMap::COL_TRAB_CODIGO.')');
        }


        // Set the correct dbName
        $query = TrabajadorQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TrabajadorTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TrabajadorTableMap::buildTableMap();
