<?php

namespace Map;

use \EvaluacionAplicada;
use \EvaluacionAplicadaQuery;
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
 * This class defines the structure of the 'evaluacion_aplicada' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EvaluacionAplicadaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EvaluacionAplicadaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'evaluacion_aplicada';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EvaluacionAplicada';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EvaluacionAplicada';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the evap_c_actividad field
     */
    const COL_EVAP_C_ACTIVIDAD = 'evaluacion_aplicada.evap_c_actividad';

    /**
     * the column name for the evap_numero_dictacion field
     */
    const COL_EVAP_NUMERO_DICTACION = 'evaluacion_aplicada.evap_numero_dictacion';

    /**
     * the column name for the evap_c_evaluacion field
     */
    const COL_EVAP_C_EVALUACION = 'evaluacion_aplicada.evap_c_evaluacion';

    /**
     * the column name for the evap_numero_evaluacion field
     */
    const COL_EVAP_NUMERO_EVALUACION = 'evaluacion_aplicada.evap_numero_evaluacion';

    /**
     * the column name for the evap_titulo field
     */
    const COL_EVAP_TITULO = 'evaluacion_aplicada.evap_titulo';

    /**
     * the column name for the evap_descripcion field
     */
    const COL_EVAP_DESCRIPCION = 'evaluacion_aplicada.evap_descripcion';

    /**
     * the column name for the evap_orden field
     */
    const COL_EVAP_ORDEN = 'evaluacion_aplicada.evap_orden';

    /**
     * the column name for the evap_e_evaluacion_aplicada field
     */
    const COL_EVAP_E_EVALUACION_APLICADA = 'evaluacion_aplicada.evap_e_evaluacion_aplicada';

    /**
     * the column name for the evap_t_evaluacion_aplicada field
     */
    const COL_EVAP_T_EVALUACION_APLICADA = 'evaluacion_aplicada.evap_t_evaluacion_aplicada';

    /**
     * the column name for the evap_vigente field
     */
    const COL_EVAP_VIGENTE = 'evaluacion_aplicada.evap_vigente';

    /**
     * the column name for the evap_r_fecha_creacion field
     */
    const COL_EVAP_R_FECHA_CREACION = 'evaluacion_aplicada.evap_r_fecha_creacion';

    /**
     * the column name for the evap_r_fecha_modificacion field
     */
    const COL_EVAP_R_FECHA_MODIFICACION = 'evaluacion_aplicada.evap_r_fecha_modificacion';

    /**
     * the column name for the evap_r_usuario field
     */
    const COL_EVAP_R_USUARIO = 'evaluacion_aplicada.evap_r_usuario';

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
        self::TYPE_PHPNAME       => array('EvapCActividad', 'EvapNumeroDictacion', 'EvapCEvaluacion', 'EvapNumeroEvaluacion', 'EvapTitulo', 'EvapDescripcion', 'EvapOrden', 'EvapEEvaluacionAplicada', 'EvapTEvaluacionAplicada', 'EvapVigente', 'EvapRFechaCreacion', 'EvapRFechaModificacion', 'EvapRUsuario', ),
        self::TYPE_CAMELNAME     => array('evapCActividad', 'evapNumeroDictacion', 'evapCEvaluacion', 'evapNumeroEvaluacion', 'evapTitulo', 'evapDescripcion', 'evapOrden', 'evapEEvaluacionAplicada', 'evapTEvaluacionAplicada', 'evapVigente', 'evapRFechaCreacion', 'evapRFechaModificacion', 'evapRUsuario', ),
        self::TYPE_COLNAME       => array(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD, EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION, EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION, EvaluacionAplicadaTableMap::COL_EVAP_TITULO, EvaluacionAplicadaTableMap::COL_EVAP_DESCRIPCION, EvaluacionAplicadaTableMap::COL_EVAP_ORDEN, EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA, EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA, EvaluacionAplicadaTableMap::COL_EVAP_VIGENTE, EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_CREACION, EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_MODIFICACION, EvaluacionAplicadaTableMap::COL_EVAP_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('evap_c_actividad', 'evap_numero_dictacion', 'evap_c_evaluacion', 'evap_numero_evaluacion', 'evap_titulo', 'evap_descripcion', 'evap_orden', 'evap_e_evaluacion_aplicada', 'evap_t_evaluacion_aplicada', 'evap_vigente', 'evap_r_fecha_creacion', 'evap_r_fecha_modificacion', 'evap_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('EvapCActividad' => 0, 'EvapNumeroDictacion' => 1, 'EvapCEvaluacion' => 2, 'EvapNumeroEvaluacion' => 3, 'EvapTitulo' => 4, 'EvapDescripcion' => 5, 'EvapOrden' => 6, 'EvapEEvaluacionAplicada' => 7, 'EvapTEvaluacionAplicada' => 8, 'EvapVigente' => 9, 'EvapRFechaCreacion' => 10, 'EvapRFechaModificacion' => 11, 'EvapRUsuario' => 12, ),
        self::TYPE_CAMELNAME     => array('evapCActividad' => 0, 'evapNumeroDictacion' => 1, 'evapCEvaluacion' => 2, 'evapNumeroEvaluacion' => 3, 'evapTitulo' => 4, 'evapDescripcion' => 5, 'evapOrden' => 6, 'evapEEvaluacionAplicada' => 7, 'evapTEvaluacionAplicada' => 8, 'evapVigente' => 9, 'evapRFechaCreacion' => 10, 'evapRFechaModificacion' => 11, 'evapRUsuario' => 12, ),
        self::TYPE_COLNAME       => array(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD => 0, EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION => 1, EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION => 2, EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION => 3, EvaluacionAplicadaTableMap::COL_EVAP_TITULO => 4, EvaluacionAplicadaTableMap::COL_EVAP_DESCRIPCION => 5, EvaluacionAplicadaTableMap::COL_EVAP_ORDEN => 6, EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA => 7, EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA => 8, EvaluacionAplicadaTableMap::COL_EVAP_VIGENTE => 9, EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_CREACION => 10, EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_MODIFICACION => 11, EvaluacionAplicadaTableMap::COL_EVAP_R_USUARIO => 12, ),
        self::TYPE_FIELDNAME     => array('evap_c_actividad' => 0, 'evap_numero_dictacion' => 1, 'evap_c_evaluacion' => 2, 'evap_numero_evaluacion' => 3, 'evap_titulo' => 4, 'evap_descripcion' => 5, 'evap_orden' => 6, 'evap_e_evaluacion_aplicada' => 7, 'evap_t_evaluacion_aplicada' => 8, 'evap_vigente' => 9, 'evap_r_fecha_creacion' => 10, 'evap_r_fecha_modificacion' => 11, 'evap_r_usuario' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('evaluacion_aplicada');
        $this->setPhpName('EvaluacionAplicada');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EvaluacionAplicada');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('evap_c_actividad', 'EvapCActividad', 'INTEGER' , 'dictacion', 'dict_c_actividad', true, null, null);
        $this->addForeignPrimaryKey('evap_numero_dictacion', 'EvapNumeroDictacion', 'INTEGER' , 'dictacion', 'dict_numero', true, null, null);
        $this->addForeignPrimaryKey('evap_c_evaluacion', 'EvapCEvaluacion', 'INTEGER' , 'evaluacion', 'eval_codigo', true, null, null);
        $this->addPrimaryKey('evap_numero_evaluacion', 'EvapNumeroEvaluacion', 'INTEGER', true, null, null);
        $this->addColumn('evap_titulo', 'EvapTitulo', 'VARCHAR', true, 255, null);
        $this->addColumn('evap_descripcion', 'EvapDescripcion', 'VARCHAR', true, 255, null);
        $this->addColumn('evap_orden', 'EvapOrden', 'INTEGER', false, null, null);
        $this->addForeignKey('evap_e_evaluacion_aplicada', 'EvapEEvaluacionAplicada', 'INTEGER', 'e_evaluacion_aplicada', 'eeva_estado', false, null, null);
        $this->addForeignKey('evap_t_evaluacion_aplicada', 'EvapTEvaluacionAplicada', 'INTEGER', 't_evaluacion_aplicada', 'teva_tipo', false, null, null);
        $this->addColumn('evap_vigente', 'EvapVigente', 'INTEGER', false, 1, null);
        $this->addColumn('evap_r_fecha_creacion', 'EvapRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('evap_r_fecha_modificacion', 'EvapRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('evap_r_usuario', 'EvapRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Dictacion', '\\Dictacion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':evap_c_actividad',
    1 => ':dict_c_actividad',
  ),
  1 =>
  array (
    0 => ':evap_numero_dictacion',
    1 => ':dict_numero',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('EEvaluacionAplicada', '\\EEvaluacionAplicada', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':evap_e_evaluacion_aplicada',
    1 => ':eeva_estado',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Evaluacion', '\\Evaluacion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':evap_c_evaluacion',
    1 => ':eval_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('TEvaluacionAplicada', '\\TEvaluacionAplicada', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':evap_t_evaluacion_aplicada',
    1 => ':teva_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('InscripcionEvaluacionAplicada', '\\InscripcionEvaluacionAplicada', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':inevap_c_actividad',
    1 => ':evap_c_actividad',
  ),
  1 =>
  array (
    0 => ':inevap_numero_dictacion',
    1 => ':evap_numero_dictacion',
  ),
  2 =>
  array (
    0 => ':inevap_c_evaluacion',
    1 => ':evap_c_evaluacion',
  ),
  3 =>
  array (
    0 => ':inevap_numero_evaluacion',
    1 => ':evap_numero_evaluacion',
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
     * @param \EvaluacionAplicada $obj A \EvaluacionAplicada object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getEvapCActividad() || is_scalar($obj->getEvapCActividad()) || is_callable([$obj->getEvapCActividad(), '__toString']) ? (string) $obj->getEvapCActividad() : $obj->getEvapCActividad()), (null === $obj->getEvapNumeroDictacion() || is_scalar($obj->getEvapNumeroDictacion()) || is_callable([$obj->getEvapNumeroDictacion(), '__toString']) ? (string) $obj->getEvapNumeroDictacion() : $obj->getEvapNumeroDictacion()), (null === $obj->getEvapCEvaluacion() || is_scalar($obj->getEvapCEvaluacion()) || is_callable([$obj->getEvapCEvaluacion(), '__toString']) ? (string) $obj->getEvapCEvaluacion() : $obj->getEvapCEvaluacion()), (null === $obj->getEvapNumeroEvaluacion() || is_scalar($obj->getEvapNumeroEvaluacion()) || is_callable([$obj->getEvapNumeroEvaluacion(), '__toString']) ? (string) $obj->getEvapNumeroEvaluacion() : $obj->getEvapNumeroEvaluacion())]);
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
     * @param mixed $value A \EvaluacionAplicada object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \EvaluacionAplicada) {
                $key = serialize([(null === $value->getEvapCActividad() || is_scalar($value->getEvapCActividad()) || is_callable([$value->getEvapCActividad(), '__toString']) ? (string) $value->getEvapCActividad() : $value->getEvapCActividad()), (null === $value->getEvapNumeroDictacion() || is_scalar($value->getEvapNumeroDictacion()) || is_callable([$value->getEvapNumeroDictacion(), '__toString']) ? (string) $value->getEvapNumeroDictacion() : $value->getEvapNumeroDictacion()), (null === $value->getEvapCEvaluacion() || is_scalar($value->getEvapCEvaluacion()) || is_callable([$value->getEvapCEvaluacion(), '__toString']) ? (string) $value->getEvapCEvaluacion() : $value->getEvapCEvaluacion()), (null === $value->getEvapNumeroEvaluacion() || is_scalar($value->getEvapNumeroEvaluacion()) || is_callable([$value->getEvapNumeroEvaluacion(), '__toString']) ? (string) $value->getEvapNumeroEvaluacion() : $value->getEvapNumeroEvaluacion())]);

            } elseif (is_array($value) && count($value) === 4) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2]), (null === $value[3] || is_scalar($value[3]) || is_callable([$value[3], '__toString']) ? (string) $value[3] : $value[3])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \EvaluacionAplicada object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvapCActividad', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('EvapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('EvapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvapCActividad', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvapCActividad', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvapCActividad', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvapCActividad', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('EvapCActividad', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('EvapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('EvapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('EvapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('EvapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('EvapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('EvapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('EvapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('EvapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('EvapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('EvapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('EvapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('EvapCActividad', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('EvapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('EvapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 3 + $offset
                : self::translateFieldName('EvapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EvaluacionAplicadaTableMap::CLASS_DEFAULT : EvaluacionAplicadaTableMap::OM_CLASS;
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
     * @return array           (EvaluacionAplicada object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EvaluacionAplicadaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EvaluacionAplicadaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EvaluacionAplicadaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EvaluacionAplicadaTableMap::OM_CLASS;
            /** @var EvaluacionAplicada $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EvaluacionAplicadaTableMap::addInstanceToPool($obj, $key);
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
            $key = EvaluacionAplicadaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EvaluacionAplicadaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EvaluacionAplicada $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EvaluacionAplicadaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_TITULO);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_DESCRIPCION);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_ORDEN);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_E_EVALUACION_APLICADA);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_T_EVALUACION_APLICADA);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_VIGENTE);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_CREACION);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(EvaluacionAplicadaTableMap::COL_EVAP_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.evap_c_actividad');
            $criteria->addSelectColumn($alias . '.evap_numero_dictacion');
            $criteria->addSelectColumn($alias . '.evap_c_evaluacion');
            $criteria->addSelectColumn($alias . '.evap_numero_evaluacion');
            $criteria->addSelectColumn($alias . '.evap_titulo');
            $criteria->addSelectColumn($alias . '.evap_descripcion');
            $criteria->addSelectColumn($alias . '.evap_orden');
            $criteria->addSelectColumn($alias . '.evap_e_evaluacion_aplicada');
            $criteria->addSelectColumn($alias . '.evap_t_evaluacion_aplicada');
            $criteria->addSelectColumn($alias . '.evap_vigente');
            $criteria->addSelectColumn($alias . '.evap_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.evap_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.evap_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(EvaluacionAplicadaTableMap::DATABASE_NAME)->getTable(EvaluacionAplicadaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EvaluacionAplicadaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EvaluacionAplicadaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EvaluacionAplicadaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EvaluacionAplicada or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EvaluacionAplicada object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EvaluacionAplicada) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EvaluacionAplicadaTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(EvaluacionAplicadaTableMap::COL_EVAP_C_ACTIVIDAD, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_DICTACION, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(EvaluacionAplicadaTableMap::COL_EVAP_C_EVALUACION, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(EvaluacionAplicadaTableMap::COL_EVAP_NUMERO_EVALUACION, $value[3]));
                $criteria->addOr($criterion);
            }
        }

        $query = EvaluacionAplicadaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EvaluacionAplicadaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EvaluacionAplicadaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the evaluacion_aplicada table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EvaluacionAplicadaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EvaluacionAplicada or Criteria object.
     *
     * @param mixed               $criteria Criteria or EvaluacionAplicada object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EvaluacionAplicada object
        }


        // Set the correct dbName
        $query = EvaluacionAplicadaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EvaluacionAplicadaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EvaluacionAplicadaTableMap::buildTableMap();
