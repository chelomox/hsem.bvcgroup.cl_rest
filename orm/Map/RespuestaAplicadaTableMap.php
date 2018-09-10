<?php

namespace Map;

use \RespuestaAplicada;
use \RespuestaAplicadaQuery;
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
 * This class defines the structure of the 'respuesta_aplicada' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RespuestaAplicadaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.RespuestaAplicadaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'respuesta_aplicada';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\RespuestaAplicada';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'RespuestaAplicada';

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
     * the column name for the reap_c_actividad field
     */
    const COL_REAP_C_ACTIVIDAD = 'respuesta_aplicada.reap_c_actividad';

    /**
     * the column name for the reap_numero_dictacion field
     */
    const COL_REAP_NUMERO_DICTACION = 'respuesta_aplicada.reap_numero_dictacion';

    /**
     * the column name for the reap_c_evaluacion field
     */
    const COL_REAP_C_EVALUACION = 'respuesta_aplicada.reap_c_evaluacion';

    /**
     * the column name for the reap_numero_evaluacion field
     */
    const COL_REAP_NUMERO_EVALUACION = 'respuesta_aplicada.reap_numero_evaluacion';

    /**
     * the column name for the reap_c_trabajador field
     */
    const COL_REAP_C_TRABAJADOR = 'respuesta_aplicada.reap_c_trabajador';

    /**
     * the column name for the reap_c_pregunta field
     */
    const COL_REAP_C_PREGUNTA = 'respuesta_aplicada.reap_c_pregunta';

    /**
     * the column name for the reap_c_opcion_pregunta field
     */
    const COL_REAP_C_OPCION_PREGUNTA = 'respuesta_aplicada.reap_c_opcion_pregunta';

    /**
     * the column name for the reap_e_respuesta_aplicada field
     */
    const COL_REAP_E_RESPUESTA_APLICADA = 'respuesta_aplicada.reap_e_respuesta_aplicada';

    /**
     * the column name for the reap_vigente field
     */
    const COL_REAP_VIGENTE = 'respuesta_aplicada.reap_vigente';

    /**
     * the column name for the reap_hash_md5 field
     */
    const COL_REAP_HASH_MD5 = 'respuesta_aplicada.reap_hash_md5';

    /**
     * the column name for the reap_r_fecha_creacion field
     */
    const COL_REAP_R_FECHA_CREACION = 'respuesta_aplicada.reap_r_fecha_creacion';

    /**
     * the column name for the reap_r_fecha_modificacion field
     */
    const COL_REAP_R_FECHA_MODIFICACION = 'respuesta_aplicada.reap_r_fecha_modificacion';

    /**
     * the column name for the reap_r_usuario field
     */
    const COL_REAP_R_USUARIO = 'respuesta_aplicada.reap_r_usuario';

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
        self::TYPE_PHPNAME       => array('ReapCActividad', 'ReapNumeroDictacion', 'ReapCEvaluacion', 'ReapNumeroEvaluacion', 'ReapCTrabajador', 'ReapCPregunta', 'ReapCOpcionPregunta', 'ReapERespuestaAplicada', 'ReapVigente', 'ReapHashMd5', 'ReapRFechaCreacion', 'ReapRFechaModificacion', 'ReapRUsuario', ),
        self::TYPE_CAMELNAME     => array('reapCActividad', 'reapNumeroDictacion', 'reapCEvaluacion', 'reapNumeroEvaluacion', 'reapCTrabajador', 'reapCPregunta', 'reapCOpcionPregunta', 'reapERespuestaAplicada', 'reapVigente', 'reapHashMd5', 'reapRFechaCreacion', 'reapRFechaModificacion', 'reapRUsuario', ),
        self::TYPE_COLNAME       => array(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD, RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION, RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION, RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION, RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR, RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA, RespuestaAplicadaTableMap::COL_REAP_C_OPCION_PREGUNTA, RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA, RespuestaAplicadaTableMap::COL_REAP_VIGENTE, RespuestaAplicadaTableMap::COL_REAP_HASH_MD5, RespuestaAplicadaTableMap::COL_REAP_R_FECHA_CREACION, RespuestaAplicadaTableMap::COL_REAP_R_FECHA_MODIFICACION, RespuestaAplicadaTableMap::COL_REAP_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('reap_c_actividad', 'reap_numero_dictacion', 'reap_c_evaluacion', 'reap_numero_evaluacion', 'reap_c_trabajador', 'reap_c_pregunta', 'reap_c_opcion_pregunta', 'reap_e_respuesta_aplicada', 'reap_vigente', 'reap_hash_md5', 'reap_r_fecha_creacion', 'reap_r_fecha_modificacion', 'reap_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ReapCActividad' => 0, 'ReapNumeroDictacion' => 1, 'ReapCEvaluacion' => 2, 'ReapNumeroEvaluacion' => 3, 'ReapCTrabajador' => 4, 'ReapCPregunta' => 5, 'ReapCOpcionPregunta' => 6, 'ReapERespuestaAplicada' => 7, 'ReapVigente' => 8, 'ReapHashMd5' => 9, 'ReapRFechaCreacion' => 10, 'ReapRFechaModificacion' => 11, 'ReapRUsuario' => 12, ),
        self::TYPE_CAMELNAME     => array('reapCActividad' => 0, 'reapNumeroDictacion' => 1, 'reapCEvaluacion' => 2, 'reapNumeroEvaluacion' => 3, 'reapCTrabajador' => 4, 'reapCPregunta' => 5, 'reapCOpcionPregunta' => 6, 'reapERespuestaAplicada' => 7, 'reapVigente' => 8, 'reapHashMd5' => 9, 'reapRFechaCreacion' => 10, 'reapRFechaModificacion' => 11, 'reapRUsuario' => 12, ),
        self::TYPE_COLNAME       => array(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD => 0, RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION => 1, RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION => 2, RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION => 3, RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR => 4, RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA => 5, RespuestaAplicadaTableMap::COL_REAP_C_OPCION_PREGUNTA => 6, RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA => 7, RespuestaAplicadaTableMap::COL_REAP_VIGENTE => 8, RespuestaAplicadaTableMap::COL_REAP_HASH_MD5 => 9, RespuestaAplicadaTableMap::COL_REAP_R_FECHA_CREACION => 10, RespuestaAplicadaTableMap::COL_REAP_R_FECHA_MODIFICACION => 11, RespuestaAplicadaTableMap::COL_REAP_R_USUARIO => 12, ),
        self::TYPE_FIELDNAME     => array('reap_c_actividad' => 0, 'reap_numero_dictacion' => 1, 'reap_c_evaluacion' => 2, 'reap_numero_evaluacion' => 3, 'reap_c_trabajador' => 4, 'reap_c_pregunta' => 5, 'reap_c_opcion_pregunta' => 6, 'reap_e_respuesta_aplicada' => 7, 'reap_vigente' => 8, 'reap_hash_md5' => 9, 'reap_r_fecha_creacion' => 10, 'reap_r_fecha_modificacion' => 11, 'reap_r_usuario' => 12, ),
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
        $this->setName('respuesta_aplicada');
        $this->setPhpName('RespuestaAplicada');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\RespuestaAplicada');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('reap_c_actividad', 'ReapCActividad', 'INTEGER' , 'inscripcion_evaluacion_aplicada', 'inevap_c_actividad', true, null, null);
        $this->addForeignPrimaryKey('reap_numero_dictacion', 'ReapNumeroDictacion', 'INTEGER' , 'inscripcion_evaluacion_aplicada', 'inevap_numero_dictacion', true, null, null);
        $this->addForeignPrimaryKey('reap_c_evaluacion', 'ReapCEvaluacion', 'INTEGER' , 'inscripcion_evaluacion_aplicada', 'inevap_c_evaluacion', true, null, null);
        $this->addForeignPrimaryKey('reap_numero_evaluacion', 'ReapNumeroEvaluacion', 'INTEGER' , 'inscripcion_evaluacion_aplicada', 'inevap_numero_evaluacion', true, null, null);
        $this->addForeignPrimaryKey('reap_c_trabajador', 'ReapCTrabajador', 'INTEGER' , 'inscripcion_evaluacion_aplicada', 'inevap_c_trabajador', true, null, null);
        $this->addForeignPrimaryKey('reap_c_pregunta', 'ReapCPregunta', 'INTEGER' , 'pregunta', 'preg_codigo', true, null, null);
        $this->addColumn('reap_c_opcion_pregunta', 'ReapCOpcionPregunta', 'INTEGER', true, null, null);
        $this->addForeignKey('reap_e_respuesta_aplicada', 'ReapERespuestaAplicada', 'INTEGER', 'e_respuesta_aplicada', 'erea_estado', false, null, null);
        $this->addColumn('reap_vigente', 'ReapVigente', 'INTEGER', false, 1, null);
        $this->addColumn('reap_hash_md5', 'ReapHashMd5', 'CHAR', false, 32, null);
        $this->addColumn('reap_r_fecha_creacion', 'ReapRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('reap_r_fecha_modificacion', 'ReapRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('reap_r_usuario', 'ReapRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ERespuestaAplicada', '\\ERespuestaAplicada', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':reap_e_respuesta_aplicada',
    1 => ':erea_estado',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('InscripcionEvaluacionAplicada', '\\InscripcionEvaluacionAplicada', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':reap_c_actividad',
    1 => ':inevap_c_actividad',
  ),
  1 =>
  array (
    0 => ':reap_numero_dictacion',
    1 => ':inevap_numero_dictacion',
  ),
  2 =>
  array (
    0 => ':reap_c_evaluacion',
    1 => ':inevap_c_evaluacion',
  ),
  3 =>
  array (
    0 => ':reap_numero_evaluacion',
    1 => ':inevap_numero_evaluacion',
  ),
  4 =>
  array (
    0 => ':reap_c_trabajador',
    1 => ':inevap_c_trabajador',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Pregunta', '\\Pregunta', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':reap_c_pregunta',
    1 => ':preg_codigo',
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
     * @param \RespuestaAplicada $obj A \RespuestaAplicada object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getReapCActividad() || is_scalar($obj->getReapCActividad()) || is_callable([$obj->getReapCActividad(), '__toString']) ? (string) $obj->getReapCActividad() : $obj->getReapCActividad()), (null === $obj->getReapNumeroDictacion() || is_scalar($obj->getReapNumeroDictacion()) || is_callable([$obj->getReapNumeroDictacion(), '__toString']) ? (string) $obj->getReapNumeroDictacion() : $obj->getReapNumeroDictacion()), (null === $obj->getReapCEvaluacion() || is_scalar($obj->getReapCEvaluacion()) || is_callable([$obj->getReapCEvaluacion(), '__toString']) ? (string) $obj->getReapCEvaluacion() : $obj->getReapCEvaluacion()), (null === $obj->getReapNumeroEvaluacion() || is_scalar($obj->getReapNumeroEvaluacion()) || is_callable([$obj->getReapNumeroEvaluacion(), '__toString']) ? (string) $obj->getReapNumeroEvaluacion() : $obj->getReapNumeroEvaluacion()), (null === $obj->getReapCTrabajador() || is_scalar($obj->getReapCTrabajador()) || is_callable([$obj->getReapCTrabajador(), '__toString']) ? (string) $obj->getReapCTrabajador() : $obj->getReapCTrabajador()), (null === $obj->getReapCPregunta() || is_scalar($obj->getReapCPregunta()) || is_callable([$obj->getReapCPregunta(), '__toString']) ? (string) $obj->getReapCPregunta() : $obj->getReapCPregunta())]);
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
     * @param mixed $value A \RespuestaAplicada object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \RespuestaAplicada) {
                $key = serialize([(null === $value->getReapCActividad() || is_scalar($value->getReapCActividad()) || is_callable([$value->getReapCActividad(), '__toString']) ? (string) $value->getReapCActividad() : $value->getReapCActividad()), (null === $value->getReapNumeroDictacion() || is_scalar($value->getReapNumeroDictacion()) || is_callable([$value->getReapNumeroDictacion(), '__toString']) ? (string) $value->getReapNumeroDictacion() : $value->getReapNumeroDictacion()), (null === $value->getReapCEvaluacion() || is_scalar($value->getReapCEvaluacion()) || is_callable([$value->getReapCEvaluacion(), '__toString']) ? (string) $value->getReapCEvaluacion() : $value->getReapCEvaluacion()), (null === $value->getReapNumeroEvaluacion() || is_scalar($value->getReapNumeroEvaluacion()) || is_callable([$value->getReapNumeroEvaluacion(), '__toString']) ? (string) $value->getReapNumeroEvaluacion() : $value->getReapNumeroEvaluacion()), (null === $value->getReapCTrabajador() || is_scalar($value->getReapCTrabajador()) || is_callable([$value->getReapCTrabajador(), '__toString']) ? (string) $value->getReapCTrabajador() : $value->getReapCTrabajador()), (null === $value->getReapCPregunta() || is_scalar($value->getReapCPregunta()) || is_callable([$value->getReapCPregunta(), '__toString']) ? (string) $value->getReapCPregunta() : $value->getReapCPregunta())]);

            } elseif (is_array($value) && count($value) === 6) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2]), (null === $value[3] || is_scalar($value[3]) || is_callable([$value[3], '__toString']) ? (string) $value[3] : $value[3]), (null === $value[4] || is_scalar($value[4]) || is_callable([$value[4], '__toString']) ? (string) $value[4] : $value[4]), (null === $value[5] || is_scalar($value[5]) || is_callable([$value[5], '__toString']) ? (string) $value[5] : $value[5])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \RespuestaAplicada object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReapCActividad', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ReapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('ReapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('ReapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('ReapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('ReapCPregunta', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReapCActividad', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReapCActividad', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReapCActividad', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReapCActividad', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReapCActividad', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ReapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ReapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ReapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ReapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ReapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('ReapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('ReapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('ReapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('ReapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('ReapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('ReapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('ReapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('ReapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('ReapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('ReapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('ReapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('ReapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('ReapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('ReapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('ReapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('ReapCPregunta', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('ReapCPregunta', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('ReapCPregunta', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('ReapCPregunta', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('ReapCPregunta', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('ReapCActividad', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('ReapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('ReapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 3 + $offset
                : self::translateFieldName('ReapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 4 + $offset
                : self::translateFieldName('ReapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 5 + $offset
                : self::translateFieldName('ReapCPregunta', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? RespuestaAplicadaTableMap::CLASS_DEFAULT : RespuestaAplicadaTableMap::OM_CLASS;
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
     * @return array           (RespuestaAplicada object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RespuestaAplicadaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RespuestaAplicadaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RespuestaAplicadaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RespuestaAplicadaTableMap::OM_CLASS;
            /** @var RespuestaAplicada $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RespuestaAplicadaTableMap::addInstanceToPool($obj, $key);
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
            $key = RespuestaAplicadaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RespuestaAplicadaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var RespuestaAplicada $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RespuestaAplicadaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_C_OPCION_PREGUNTA);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_E_RESPUESTA_APLICADA);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_VIGENTE);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_HASH_MD5);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_CREACION);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(RespuestaAplicadaTableMap::COL_REAP_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.reap_c_actividad');
            $criteria->addSelectColumn($alias . '.reap_numero_dictacion');
            $criteria->addSelectColumn($alias . '.reap_c_evaluacion');
            $criteria->addSelectColumn($alias . '.reap_numero_evaluacion');
            $criteria->addSelectColumn($alias . '.reap_c_trabajador');
            $criteria->addSelectColumn($alias . '.reap_c_pregunta');
            $criteria->addSelectColumn($alias . '.reap_c_opcion_pregunta');
            $criteria->addSelectColumn($alias . '.reap_e_respuesta_aplicada');
            $criteria->addSelectColumn($alias . '.reap_vigente');
            $criteria->addSelectColumn($alias . '.reap_hash_md5');
            $criteria->addSelectColumn($alias . '.reap_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.reap_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.reap_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(RespuestaAplicadaTableMap::DATABASE_NAME)->getTable(RespuestaAplicadaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RespuestaAplicadaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RespuestaAplicadaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RespuestaAplicadaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a RespuestaAplicada or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or RespuestaAplicada object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(RespuestaAplicadaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \RespuestaAplicada) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RespuestaAplicadaTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_C_ACTIVIDAD, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_NUMERO_DICTACION, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_C_EVALUACION, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_NUMERO_EVALUACION, $value[3]));
                $criterion->addAnd($criteria->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_C_TRABAJADOR, $value[4]));
                $criterion->addAnd($criteria->getNewCriterion(RespuestaAplicadaTableMap::COL_REAP_C_PREGUNTA, $value[5]));
                $criteria->addOr($criterion);
            }
        }

        $query = RespuestaAplicadaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RespuestaAplicadaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RespuestaAplicadaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the respuesta_aplicada table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RespuestaAplicadaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a RespuestaAplicada or Criteria object.
     *
     * @param mixed               $criteria Criteria or RespuestaAplicada object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RespuestaAplicadaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from RespuestaAplicada object
        }


        // Set the correct dbName
        $query = RespuestaAplicadaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RespuestaAplicadaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RespuestaAplicadaTableMap::buildTableMap();
