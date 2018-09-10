<?php

namespace Map;

use \Inscripcion;
use \InscripcionQuery;
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
 * This class defines the structure of the 'inscripcion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InscripcionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.InscripcionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'inscripcion';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Inscripcion';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Inscripcion';

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
     * the column name for the insc_c_actividad field
     */
    const COL_INSC_C_ACTIVIDAD = 'inscripcion.insc_c_actividad';

    /**
     * the column name for the insc_numero_dictacion field
     */
    const COL_INSC_NUMERO_DICTACION = 'inscripcion.insc_numero_dictacion';

    /**
     * the column name for the insc_c_trabajador field
     */
    const COL_INSC_C_TRABAJADOR = 'inscripcion.insc_c_trabajador';

    /**
     * the column name for the insc_e_inscripcion field
     */
    const COL_INSC_E_INSCRIPCION = 'inscripcion.insc_e_inscripcion';

    /**
     * the column name for the insc_e_finalizacion field
     */
    const COL_INSC_E_FINALIZACION = 'inscripcion.insc_e_finalizacion';

    /**
     * the column name for the insc_grupo field
     */
    const COL_INSC_GRUPO = 'inscripcion.insc_grupo';

    /**
     * the column name for the insc_asistencia field
     */
    const COL_INSC_ASISTENCIA = 'inscripcion.insc_asistencia';

    /**
     * the column name for the insc_nota field
     */
    const COL_INSC_NOTA = 'inscripcion.insc_nota';

    /**
     * the column name for the insc_resultado field
     */
    const COL_INSC_RESULTADO = 'inscripcion.insc_resultado';

    /**
     * the column name for the insc_r_fecha_creacion field
     */
    const COL_INSC_R_FECHA_CREACION = 'inscripcion.insc_r_fecha_creacion';

    /**
     * the column name for the insc_r_fecha_modificacion field
     */
    const COL_INSC_R_FECHA_MODIFICACION = 'inscripcion.insc_r_fecha_modificacion';

    /**
     * the column name for the insc_r_usuario field
     */
    const COL_INSC_R_USUARIO = 'inscripcion.insc_r_usuario';

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
        self::TYPE_PHPNAME       => array('InscCActividad', 'InscNumeroDictacion', 'InscCTrabajador', 'InscEInscripcion', 'InscEFinalizacion', 'InscGrupo', 'InscAsistencia', 'InscNota', 'InscResultado', 'InscRFechaCreacion', 'InscRFechaModificacion', 'InscRUsuario', ),
        self::TYPE_CAMELNAME     => array('inscCActividad', 'inscNumeroDictacion', 'inscCTrabajador', 'inscEInscripcion', 'inscEFinalizacion', 'inscGrupo', 'inscAsistencia', 'inscNota', 'inscResultado', 'inscRFechaCreacion', 'inscRFechaModificacion', 'inscRUsuario', ),
        self::TYPE_COLNAME       => array(InscripcionTableMap::COL_INSC_C_ACTIVIDAD, InscripcionTableMap::COL_INSC_NUMERO_DICTACION, InscripcionTableMap::COL_INSC_C_TRABAJADOR, InscripcionTableMap::COL_INSC_E_INSCRIPCION, InscripcionTableMap::COL_INSC_E_FINALIZACION, InscripcionTableMap::COL_INSC_GRUPO, InscripcionTableMap::COL_INSC_ASISTENCIA, InscripcionTableMap::COL_INSC_NOTA, InscripcionTableMap::COL_INSC_RESULTADO, InscripcionTableMap::COL_INSC_R_FECHA_CREACION, InscripcionTableMap::COL_INSC_R_FECHA_MODIFICACION, InscripcionTableMap::COL_INSC_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('insc_c_actividad', 'insc_numero_dictacion', 'insc_c_trabajador', 'insc_e_inscripcion', 'insc_e_finalizacion', 'insc_grupo', 'insc_asistencia', 'insc_nota', 'insc_resultado', 'insc_r_fecha_creacion', 'insc_r_fecha_modificacion', 'insc_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('InscCActividad' => 0, 'InscNumeroDictacion' => 1, 'InscCTrabajador' => 2, 'InscEInscripcion' => 3, 'InscEFinalizacion' => 4, 'InscGrupo' => 5, 'InscAsistencia' => 6, 'InscNota' => 7, 'InscResultado' => 8, 'InscRFechaCreacion' => 9, 'InscRFechaModificacion' => 10, 'InscRUsuario' => 11, ),
        self::TYPE_CAMELNAME     => array('inscCActividad' => 0, 'inscNumeroDictacion' => 1, 'inscCTrabajador' => 2, 'inscEInscripcion' => 3, 'inscEFinalizacion' => 4, 'inscGrupo' => 5, 'inscAsistencia' => 6, 'inscNota' => 7, 'inscResultado' => 8, 'inscRFechaCreacion' => 9, 'inscRFechaModificacion' => 10, 'inscRUsuario' => 11, ),
        self::TYPE_COLNAME       => array(InscripcionTableMap::COL_INSC_C_ACTIVIDAD => 0, InscripcionTableMap::COL_INSC_NUMERO_DICTACION => 1, InscripcionTableMap::COL_INSC_C_TRABAJADOR => 2, InscripcionTableMap::COL_INSC_E_INSCRIPCION => 3, InscripcionTableMap::COL_INSC_E_FINALIZACION => 4, InscripcionTableMap::COL_INSC_GRUPO => 5, InscripcionTableMap::COL_INSC_ASISTENCIA => 6, InscripcionTableMap::COL_INSC_NOTA => 7, InscripcionTableMap::COL_INSC_RESULTADO => 8, InscripcionTableMap::COL_INSC_R_FECHA_CREACION => 9, InscripcionTableMap::COL_INSC_R_FECHA_MODIFICACION => 10, InscripcionTableMap::COL_INSC_R_USUARIO => 11, ),
        self::TYPE_FIELDNAME     => array('insc_c_actividad' => 0, 'insc_numero_dictacion' => 1, 'insc_c_trabajador' => 2, 'insc_e_inscripcion' => 3, 'insc_e_finalizacion' => 4, 'insc_grupo' => 5, 'insc_asistencia' => 6, 'insc_nota' => 7, 'insc_resultado' => 8, 'insc_r_fecha_creacion' => 9, 'insc_r_fecha_modificacion' => 10, 'insc_r_usuario' => 11, ),
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
        $this->setName('inscripcion');
        $this->setPhpName('Inscripcion');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Inscripcion');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('insc_c_actividad', 'InscCActividad', 'INTEGER' , 'dictacion', 'dict_c_actividad', true, null, null);
        $this->addForeignPrimaryKey('insc_numero_dictacion', 'InscNumeroDictacion', 'INTEGER' , 'dictacion', 'dict_numero', true, null, null);
        $this->addForeignPrimaryKey('insc_c_trabajador', 'InscCTrabajador', 'INTEGER' , 'trabajador', 'trab_codigo', true, null, null);
        $this->addForeignKey('insc_e_inscripcion', 'InscEInscripcion', 'INTEGER', 'e_inscripcion', 'eins_estado', false, null, null);
        $this->addForeignKey('insc_e_finalizacion', 'InscEFinalizacion', 'INTEGER', 'e_finalizacion', 'efin_estado', false, null, null);
        $this->addColumn('insc_grupo', 'InscGrupo', 'INTEGER', false, null, null);
        $this->addColumn('insc_asistencia', 'InscAsistencia', 'INTEGER', false, 3, null);
        $this->addColumn('insc_nota', 'InscNota', 'VARCHAR', false, 10, null);
        $this->addColumn('insc_resultado', 'InscResultado', 'VARCHAR', false, 10, null);
        $this->addColumn('insc_r_fecha_creacion', 'InscRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('insc_r_fecha_modificacion', 'InscRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('insc_r_usuario', 'InscRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Dictacion', '\\Dictacion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':insc_c_actividad',
    1 => ':dict_c_actividad',
  ),
  1 =>
  array (
    0 => ':insc_numero_dictacion',
    1 => ':dict_numero',
  ),
), null, null, null, false);
        $this->addRelation('EFinalizacion', '\\EFinalizacion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':insc_e_finalizacion',
    1 => ':efin_estado',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('EInscripcion', '\\EInscripcion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':insc_e_inscripcion',
    1 => ':eins_estado',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Trabajador', '\\Trabajador', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':insc_c_trabajador',
    1 => ':trab_codigo',
  ),
), null, null, null, false);
        $this->addRelation('InscripcionEvaluacionAplicada', '\\InscripcionEvaluacionAplicada', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':inevap_c_actividad',
    1 => ':insc_c_actividad',
  ),
  1 =>
  array (
    0 => ':inevap_numero_dictacion',
    1 => ':insc_numero_dictacion',
  ),
  2 =>
  array (
    0 => ':inevap_c_trabajador',
    1 => ':insc_c_trabajador',
  ),
), null, 'CASCADE', 'InscripcionEvaluacionAplicadas', false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Inscripcion $obj A \Inscripcion object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getInscCActividad() || is_scalar($obj->getInscCActividad()) || is_callable([$obj->getInscCActividad(), '__toString']) ? (string) $obj->getInscCActividad() : $obj->getInscCActividad()), (null === $obj->getInscNumeroDictacion() || is_scalar($obj->getInscNumeroDictacion()) || is_callable([$obj->getInscNumeroDictacion(), '__toString']) ? (string) $obj->getInscNumeroDictacion() : $obj->getInscNumeroDictacion()), (null === $obj->getInscCTrabajador() || is_scalar($obj->getInscCTrabajador()) || is_callable([$obj->getInscCTrabajador(), '__toString']) ? (string) $obj->getInscCTrabajador() : $obj->getInscCTrabajador())]);
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
     * @param mixed $value A \Inscripcion object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Inscripcion) {
                $key = serialize([(null === $value->getInscCActividad() || is_scalar($value->getInscCActividad()) || is_callable([$value->getInscCActividad(), '__toString']) ? (string) $value->getInscCActividad() : $value->getInscCActividad()), (null === $value->getInscNumeroDictacion() || is_scalar($value->getInscNumeroDictacion()) || is_callable([$value->getInscNumeroDictacion(), '__toString']) ? (string) $value->getInscNumeroDictacion() : $value->getInscNumeroDictacion()), (null === $value->getInscCTrabajador() || is_scalar($value->getInscCTrabajador()) || is_callable([$value->getInscCTrabajador(), '__toString']) ? (string) $value->getInscCTrabajador() : $value->getInscCTrabajador())]);

            } elseif (is_array($value) && count($value) === 3) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Inscripcion object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InscCActividad', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InscNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InscCTrabajador', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InscCActividad', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InscCActividad', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InscCActividad', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InscCActividad', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InscCActividad', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InscNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InscNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InscNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InscNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InscNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InscCTrabajador', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InscCTrabajador', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InscCTrabajador', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InscCTrabajador', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InscCTrabajador', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('InscCActividad', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('InscNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('InscCTrabajador', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? InscripcionTableMap::CLASS_DEFAULT : InscripcionTableMap::OM_CLASS;
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
     * @return array           (Inscripcion object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InscripcionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InscripcionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InscripcionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InscripcionTableMap::OM_CLASS;
            /** @var Inscripcion $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InscripcionTableMap::addInstanceToPool($obj, $key);
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
            $key = InscripcionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InscripcionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Inscripcion $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InscripcionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_C_ACTIVIDAD);
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_NUMERO_DICTACION);
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_C_TRABAJADOR);
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_E_INSCRIPCION);
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_E_FINALIZACION);
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_GRUPO);
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_ASISTENCIA);
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_NOTA);
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_RESULTADO);
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_R_FECHA_CREACION);
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(InscripcionTableMap::COL_INSC_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.insc_c_actividad');
            $criteria->addSelectColumn($alias . '.insc_numero_dictacion');
            $criteria->addSelectColumn($alias . '.insc_c_trabajador');
            $criteria->addSelectColumn($alias . '.insc_e_inscripcion');
            $criteria->addSelectColumn($alias . '.insc_e_finalizacion');
            $criteria->addSelectColumn($alias . '.insc_grupo');
            $criteria->addSelectColumn($alias . '.insc_asistencia');
            $criteria->addSelectColumn($alias . '.insc_nota');
            $criteria->addSelectColumn($alias . '.insc_resultado');
            $criteria->addSelectColumn($alias . '.insc_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.insc_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.insc_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(InscripcionTableMap::DATABASE_NAME)->getTable(InscripcionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InscripcionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InscripcionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InscripcionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Inscripcion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Inscripcion object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InscripcionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Inscripcion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InscripcionTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(InscripcionTableMap::COL_INSC_C_ACTIVIDAD, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(InscripcionTableMap::COL_INSC_NUMERO_DICTACION, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(InscripcionTableMap::COL_INSC_C_TRABAJADOR, $value[2]));
                $criteria->addOr($criterion);
            }
        }

        $query = InscripcionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InscripcionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InscripcionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the inscripcion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InscripcionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Inscripcion or Criteria object.
     *
     * @param mixed               $criteria Criteria or Inscripcion object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InscripcionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Inscripcion object
        }


        // Set the correct dbName
        $query = InscripcionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InscripcionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InscripcionTableMap::buildTableMap();
