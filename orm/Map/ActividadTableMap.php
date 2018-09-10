<?php

namespace Map;

use \Actividad;
use \ActividadQuery;
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
 * This class defines the structure of the 'actividad' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ActividadTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ActividadTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'actividad';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Actividad';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Actividad';

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
     * the column name for the acti_codigo field
     */
    const COL_ACTI_CODIGO = 'actividad.acti_codigo';

    /**
     * the column name for the acti_nombre field
     */
    const COL_ACTI_NOMBRE = 'actividad.acti_nombre';

    /**
     * the column name for the acti_imagen field
     */
    const COL_ACTI_IMAGEN = 'actividad.acti_imagen';

    /**
     * the column name for the acti_t_actividad field
     */
    const COL_ACTI_T_ACTIVIDAD = 'actividad.acti_t_actividad';

    /**
     * the column name for the acti_hora field
     */
    const COL_ACTI_HORA = 'actividad.acti_hora';

    /**
     * the column name for the acti_hora_teorica field
     */
    const COL_ACTI_HORA_TEORICA = 'actividad.acti_hora_teorica';

    /**
     * the column name for the acti_hora_practica field
     */
    const COL_ACTI_HORA_PRACTICA = 'actividad.acti_hora_practica';

    /**
     * the column name for the acti_t_hora field
     */
    const COL_ACTI_T_HORA = 'actividad.acti_t_hora';

    /**
     * the column name for the acti_e_actividad field
     */
    const COL_ACTI_E_ACTIVIDAD = 'actividad.acti_e_actividad';

    /**
     * the column name for the acti_t_modalidad field
     */
    const COL_ACTI_T_MODALIDAD = 'actividad.acti_t_modalidad';

    /**
     * the column name for the acti_observacion field
     */
    const COL_ACTI_OBSERVACION = 'actividad.acti_observacion';

    /**
     * the column name for the acti_vigente field
     */
    const COL_ACTI_VIGENTE = 'actividad.acti_vigente';

    /**
     * the column name for the acti_r_fecha_creacion field
     */
    const COL_ACTI_R_FECHA_CREACION = 'actividad.acti_r_fecha_creacion';

    /**
     * the column name for the acti_r_fecha_modificacion field
     */
    const COL_ACTI_R_FECHA_MODIFICACION = 'actividad.acti_r_fecha_modificacion';

    /**
     * the column name for the acti_r_usuario field
     */
    const COL_ACTI_R_USUARIO = 'actividad.acti_r_usuario';

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
        self::TYPE_PHPNAME       => array('ActiCodigo', 'ActiNombre', 'ActiImagen', 'ActiTActividad', 'ActiHora', 'ActiHoraTeorica', 'ActiHoraPractica', 'ActiTHora', 'ActiEActividad', 'ActiTModalidad', 'ActiObservacion', 'ActiVigente', 'ActiRFechaCreacion', 'ActiRFechaModificacion', 'ActiRUsuario', ),
        self::TYPE_CAMELNAME     => array('actiCodigo', 'actiNombre', 'actiImagen', 'actiTActividad', 'actiHora', 'actiHoraTeorica', 'actiHoraPractica', 'actiTHora', 'actiEActividad', 'actiTModalidad', 'actiObservacion', 'actiVigente', 'actiRFechaCreacion', 'actiRFechaModificacion', 'actiRUsuario', ),
        self::TYPE_COLNAME       => array(ActividadTableMap::COL_ACTI_CODIGO, ActividadTableMap::COL_ACTI_NOMBRE, ActividadTableMap::COL_ACTI_IMAGEN, ActividadTableMap::COL_ACTI_T_ACTIVIDAD, ActividadTableMap::COL_ACTI_HORA, ActividadTableMap::COL_ACTI_HORA_TEORICA, ActividadTableMap::COL_ACTI_HORA_PRACTICA, ActividadTableMap::COL_ACTI_T_HORA, ActividadTableMap::COL_ACTI_E_ACTIVIDAD, ActividadTableMap::COL_ACTI_T_MODALIDAD, ActividadTableMap::COL_ACTI_OBSERVACION, ActividadTableMap::COL_ACTI_VIGENTE, ActividadTableMap::COL_ACTI_R_FECHA_CREACION, ActividadTableMap::COL_ACTI_R_FECHA_MODIFICACION, ActividadTableMap::COL_ACTI_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('acti_codigo', 'acti_nombre', 'acti_imagen', 'acti_t_actividad', 'acti_hora', 'acti_hora_teorica', 'acti_hora_practica', 'acti_t_hora', 'acti_e_actividad', 'acti_t_modalidad', 'acti_observacion', 'acti_vigente', 'acti_r_fecha_creacion', 'acti_r_fecha_modificacion', 'acti_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ActiCodigo' => 0, 'ActiNombre' => 1, 'ActiImagen' => 2, 'ActiTActividad' => 3, 'ActiHora' => 4, 'ActiHoraTeorica' => 5, 'ActiHoraPractica' => 6, 'ActiTHora' => 7, 'ActiEActividad' => 8, 'ActiTModalidad' => 9, 'ActiObservacion' => 10, 'ActiVigente' => 11, 'ActiRFechaCreacion' => 12, 'ActiRFechaModificacion' => 13, 'ActiRUsuario' => 14, ),
        self::TYPE_CAMELNAME     => array('actiCodigo' => 0, 'actiNombre' => 1, 'actiImagen' => 2, 'actiTActividad' => 3, 'actiHora' => 4, 'actiHoraTeorica' => 5, 'actiHoraPractica' => 6, 'actiTHora' => 7, 'actiEActividad' => 8, 'actiTModalidad' => 9, 'actiObservacion' => 10, 'actiVigente' => 11, 'actiRFechaCreacion' => 12, 'actiRFechaModificacion' => 13, 'actiRUsuario' => 14, ),
        self::TYPE_COLNAME       => array(ActividadTableMap::COL_ACTI_CODIGO => 0, ActividadTableMap::COL_ACTI_NOMBRE => 1, ActividadTableMap::COL_ACTI_IMAGEN => 2, ActividadTableMap::COL_ACTI_T_ACTIVIDAD => 3, ActividadTableMap::COL_ACTI_HORA => 4, ActividadTableMap::COL_ACTI_HORA_TEORICA => 5, ActividadTableMap::COL_ACTI_HORA_PRACTICA => 6, ActividadTableMap::COL_ACTI_T_HORA => 7, ActividadTableMap::COL_ACTI_E_ACTIVIDAD => 8, ActividadTableMap::COL_ACTI_T_MODALIDAD => 9, ActividadTableMap::COL_ACTI_OBSERVACION => 10, ActividadTableMap::COL_ACTI_VIGENTE => 11, ActividadTableMap::COL_ACTI_R_FECHA_CREACION => 12, ActividadTableMap::COL_ACTI_R_FECHA_MODIFICACION => 13, ActividadTableMap::COL_ACTI_R_USUARIO => 14, ),
        self::TYPE_FIELDNAME     => array('acti_codigo' => 0, 'acti_nombre' => 1, 'acti_imagen' => 2, 'acti_t_actividad' => 3, 'acti_hora' => 4, 'acti_hora_teorica' => 5, 'acti_hora_practica' => 6, 'acti_t_hora' => 7, 'acti_e_actividad' => 8, 'acti_t_modalidad' => 9, 'acti_observacion' => 10, 'acti_vigente' => 11, 'acti_r_fecha_creacion' => 12, 'acti_r_fecha_modificacion' => 13, 'acti_r_usuario' => 14, ),
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
        $this->setName('actividad');
        $this->setPhpName('Actividad');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Actividad');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('acti_codigo', 'ActiCodigo', 'INTEGER', true, null, null);
        $this->addColumn('acti_nombre', 'ActiNombre', 'VARCHAR', false, 255, null);
        $this->addColumn('acti_imagen', 'ActiImagen', 'VARCHAR', true, 255, null);
        $this->addForeignKey('acti_t_actividad', 'ActiTActividad', 'INTEGER', 't_actividad', 'tac_tipo', false, null, null);
        $this->addColumn('acti_hora', 'ActiHora', 'INTEGER', false, 3, null);
        $this->addColumn('acti_hora_teorica', 'ActiHoraTeorica', 'INTEGER', false, 2, null);
        $this->addColumn('acti_hora_practica', 'ActiHoraPractica', 'INTEGER', false, 2, null);
        $this->addForeignKey('acti_t_hora', 'ActiTHora', 'INTEGER', 't_hora', 'tho_tipo', false, null, null);
        $this->addForeignKey('acti_e_actividad', 'ActiEActividad', 'INTEGER', 'e_actividad', 'eac_estado', false, null, null);
        $this->addForeignKey('acti_t_modalidad', 'ActiTModalidad', 'INTEGER', 't_modalidad', 'tmo_tipo', false, null, null);
        $this->addColumn('acti_observacion', 'ActiObservacion', 'VARCHAR', false, 255, null);
        $this->addColumn('acti_vigente', 'ActiVigente', 'INTEGER', false, 1, null);
        $this->addColumn('acti_r_fecha_creacion', 'ActiRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('acti_r_fecha_modificacion', 'ActiRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('acti_r_usuario', 'ActiRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('EActividad', '\\EActividad', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':acti_e_actividad',
    1 => ':eac_estado',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('TActividad', '\\TActividad', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':acti_t_actividad',
    1 => ':tac_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('THora', '\\THora', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':acti_t_hora',
    1 => ':tho_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('TModalidad', '\\TModalidad', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':acti_t_modalidad',
    1 => ':tmo_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('ActividadCargo', '\\ActividadCargo', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':acca_c_actividad',
    1 => ':acti_codigo',
  ),
), null, 'CASCADE', 'ActividadCargos', false);
        $this->addRelation('ActividadObjetivo', '\\ActividadObjetivo', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':acob_c_actividad',
    1 => ':acti_codigo',
  ),
), null, 'CASCADE', 'ActividadObjetivos', false);
        $this->addRelation('Dictacion', '\\Dictacion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':dict_c_actividad',
    1 => ':acti_codigo',
  ),
), null, 'CASCADE', 'Dictacions', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActiCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActiCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActiCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActiCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActiCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActiCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ActiCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ActividadTableMap::CLASS_DEFAULT : ActividadTableMap::OM_CLASS;
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
     * @return array           (Actividad object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ActividadTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ActividadTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ActividadTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ActividadTableMap::OM_CLASS;
            /** @var Actividad $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ActividadTableMap::addInstanceToPool($obj, $key);
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
            $key = ActividadTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ActividadTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Actividad $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ActividadTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_CODIGO);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_NOMBRE);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_IMAGEN);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_T_ACTIVIDAD);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_HORA);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_HORA_TEORICA);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_HORA_PRACTICA);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_T_HORA);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_E_ACTIVIDAD);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_T_MODALIDAD);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_OBSERVACION);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_VIGENTE);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_R_FECHA_CREACION);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(ActividadTableMap::COL_ACTI_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.acti_codigo');
            $criteria->addSelectColumn($alias . '.acti_nombre');
            $criteria->addSelectColumn($alias . '.acti_imagen');
            $criteria->addSelectColumn($alias . '.acti_t_actividad');
            $criteria->addSelectColumn($alias . '.acti_hora');
            $criteria->addSelectColumn($alias . '.acti_hora_teorica');
            $criteria->addSelectColumn($alias . '.acti_hora_practica');
            $criteria->addSelectColumn($alias . '.acti_t_hora');
            $criteria->addSelectColumn($alias . '.acti_e_actividad');
            $criteria->addSelectColumn($alias . '.acti_t_modalidad');
            $criteria->addSelectColumn($alias . '.acti_observacion');
            $criteria->addSelectColumn($alias . '.acti_vigente');
            $criteria->addSelectColumn($alias . '.acti_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.acti_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.acti_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(ActividadTableMap::DATABASE_NAME)->getTable(ActividadTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ActividadTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ActividadTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ActividadTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Actividad or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Actividad object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Actividad) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ActividadTableMap::DATABASE_NAME);
            $criteria->add(ActividadTableMap::COL_ACTI_CODIGO, (array) $values, Criteria::IN);
        }

        $query = ActividadQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ActividadTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ActividadTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the actividad table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ActividadQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Actividad or Criteria object.
     *
     * @param mixed               $criteria Criteria or Actividad object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActividadTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Actividad object
        }

        if ($criteria->containsKey(ActividadTableMap::COL_ACTI_CODIGO) && $criteria->keyContainsValue(ActividadTableMap::COL_ACTI_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ActividadTableMap::COL_ACTI_CODIGO.')');
        }


        // Set the correct dbName
        $query = ActividadQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ActividadTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ActividadTableMap::buildTableMap();
