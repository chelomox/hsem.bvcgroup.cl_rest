<?php

namespace Map;

use \InscripcionEvaluacionAplicada;
use \InscripcionEvaluacionAplicadaQuery;
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
 * This class defines the structure of the 'inscripcion_evaluacion_aplicada' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InscripcionEvaluacionAplicadaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.InscripcionEvaluacionAplicadaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'inscripcion_evaluacion_aplicada';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\InscripcionEvaluacionAplicada';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'InscripcionEvaluacionAplicada';

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
     * the column name for the inevap_c_actividad field
     */
    const COL_INEVAP_C_ACTIVIDAD = 'inscripcion_evaluacion_aplicada.inevap_c_actividad';

    /**
     * the column name for the inevap_numero_dictacion field
     */
    const COL_INEVAP_NUMERO_DICTACION = 'inscripcion_evaluacion_aplicada.inevap_numero_dictacion';

    /**
     * the column name for the inevap_c_evaluacion field
     */
    const COL_INEVAP_C_EVALUACION = 'inscripcion_evaluacion_aplicada.inevap_c_evaluacion';

    /**
     * the column name for the inevap_numero_evaluacion field
     */
    const COL_INEVAP_NUMERO_EVALUACION = 'inscripcion_evaluacion_aplicada.inevap_numero_evaluacion';

    /**
     * the column name for the inevap_c_trabajador field
     */
    const COL_INEVAP_C_TRABAJADOR = 'inscripcion_evaluacion_aplicada.inevap_c_trabajador';

    /**
     * the column name for the inevap_e_inscripcion_evaluacion_aplicada field
     */
    const COL_INEVAP_E_INSCRIPCION_EVALUACION_APLICADA = 'inscripcion_evaluacion_aplicada.inevap_e_inscripcion_evaluacion_aplicada';

    /**
     * the column name for the inevap_vigente field
     */
    const COL_INEVAP_VIGENTE = 'inscripcion_evaluacion_aplicada.inevap_vigente';

    /**
     * the column name for the inevap_r_fecha_creacion field
     */
    const COL_INEVAP_R_FECHA_CREACION = 'inscripcion_evaluacion_aplicada.inevap_r_fecha_creacion';

    /**
     * the column name for the inevap_r_fecha_modificacion field
     */
    const COL_INEVAP_R_FECHA_MODIFICACION = 'inscripcion_evaluacion_aplicada.inevap_r_fecha_modificacion';

    /**
     * the column name for the inevap_r_usuario field
     */
    const COL_INEVAP_R_USUARIO = 'inscripcion_evaluacion_aplicada.inevap_r_usuario';

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
        self::TYPE_PHPNAME       => array('InevapCActividad', 'InevapNumeroDictacion', 'InevapCEvaluacion', 'InevapNumeroEvaluacion', 'InevapCTrabajador', 'InevapEInscripcionEvaluacionAplicada', 'InevapVigente', 'InevapRFechaCreacion', 'InevapRFechaModificacion', 'InevapRUsuario', ),
        self::TYPE_CAMELNAME     => array('inevapCActividad', 'inevapNumeroDictacion', 'inevapCEvaluacion', 'inevapNumeroEvaluacion', 'inevapCTrabajador', 'inevapEInscripcionEvaluacionAplicada', 'inevapVigente', 'inevapRFechaCreacion', 'inevapRFechaModificacion', 'inevapRUsuario', ),
        self::TYPE_COLNAME       => array(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_E_INSCRIPCION_EVALUACION_APLICADA, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_VIGENTE, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_CREACION, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_MODIFICACION, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('inevap_c_actividad', 'inevap_numero_dictacion', 'inevap_c_evaluacion', 'inevap_numero_evaluacion', 'inevap_c_trabajador', 'inevap_e_inscripcion_evaluacion_aplicada', 'inevap_vigente', 'inevap_r_fecha_creacion', 'inevap_r_fecha_modificacion', 'inevap_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('InevapCActividad' => 0, 'InevapNumeroDictacion' => 1, 'InevapCEvaluacion' => 2, 'InevapNumeroEvaluacion' => 3, 'InevapCTrabajador' => 4, 'InevapEInscripcionEvaluacionAplicada' => 5, 'InevapVigente' => 6, 'InevapRFechaCreacion' => 7, 'InevapRFechaModificacion' => 8, 'InevapRUsuario' => 9, ),
        self::TYPE_CAMELNAME     => array('inevapCActividad' => 0, 'inevapNumeroDictacion' => 1, 'inevapCEvaluacion' => 2, 'inevapNumeroEvaluacion' => 3, 'inevapCTrabajador' => 4, 'inevapEInscripcionEvaluacionAplicada' => 5, 'inevapVigente' => 6, 'inevapRFechaCreacion' => 7, 'inevapRFechaModificacion' => 8, 'inevapRUsuario' => 9, ),
        self::TYPE_COLNAME       => array(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD => 0, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION => 1, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION => 2, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION => 3, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR => 4, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_E_INSCRIPCION_EVALUACION_APLICADA => 5, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_VIGENTE => 6, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_CREACION => 7, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_MODIFICACION => 8, InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_USUARIO => 9, ),
        self::TYPE_FIELDNAME     => array('inevap_c_actividad' => 0, 'inevap_numero_dictacion' => 1, 'inevap_c_evaluacion' => 2, 'inevap_numero_evaluacion' => 3, 'inevap_c_trabajador' => 4, 'inevap_e_inscripcion_evaluacion_aplicada' => 5, 'inevap_vigente' => 6, 'inevap_r_fecha_creacion' => 7, 'inevap_r_fecha_modificacion' => 8, 'inevap_r_usuario' => 9, ),
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
        $this->setName('inscripcion_evaluacion_aplicada');
        $this->setPhpName('InscripcionEvaluacionAplicada');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\InscripcionEvaluacionAplicada');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('inevap_c_actividad', 'InevapCActividad', 'INTEGER' , 'evaluacion_aplicada', 'evap_c_actividad', true, null, null);
        $this->addForeignPrimaryKey('inevap_c_actividad', 'InevapCActividad', 'INTEGER' , 'inscripcion', 'insc_c_actividad', true, null, null);
        $this->addForeignPrimaryKey('inevap_numero_dictacion', 'InevapNumeroDictacion', 'INTEGER' , 'evaluacion_aplicada', 'evap_numero_dictacion', true, null, null);
        $this->addForeignPrimaryKey('inevap_numero_dictacion', 'InevapNumeroDictacion', 'INTEGER' , 'inscripcion', 'insc_numero_dictacion', true, null, null);
        $this->addForeignPrimaryKey('inevap_c_evaluacion', 'InevapCEvaluacion', 'INTEGER' , 'evaluacion_aplicada', 'evap_c_evaluacion', true, null, null);
        $this->addForeignPrimaryKey('inevap_numero_evaluacion', 'InevapNumeroEvaluacion', 'INTEGER' , 'evaluacion_aplicada', 'evap_numero_evaluacion', true, null, null);
        $this->addForeignPrimaryKey('inevap_c_trabajador', 'InevapCTrabajador', 'INTEGER' , 'inscripcion', 'insc_c_trabajador', true, null, null);
        $this->addForeignKey('inevap_e_inscripcion_evaluacion_aplicada', 'InevapEInscripcionEvaluacionAplicada', 'INTEGER', 'e_inscripcion_evaluacion_aplicada', 'eiea_estado', false, null, null);
        $this->addColumn('inevap_vigente', 'InevapVigente', 'INTEGER', false, 1, null);
        $this->addColumn('inevap_r_fecha_creacion', 'InevapRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('inevap_r_fecha_modificacion', 'InevapRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('inevap_r_usuario', 'InevapRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('EInscripcionEvaluacionAplicada', '\\EInscripcionEvaluacionAplicada', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':inevap_e_inscripcion_evaluacion_aplicada',
    1 => ':eiea_estado',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('EvaluacionAplicada', '\\EvaluacionAplicada', RelationMap::MANY_TO_ONE, array (
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
), null, 'CASCADE', null, false);
        $this->addRelation('Inscripcion', '\\Inscripcion', RelationMap::MANY_TO_ONE, array (
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
), null, 'CASCADE', null, false);
        $this->addRelation('RespuestaAplicada', '\\RespuestaAplicada', RelationMap::ONE_TO_MANY, array (
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
), null, 'CASCADE', 'RespuestaAplicadas', false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \InscripcionEvaluacionAplicada $obj A \InscripcionEvaluacionAplicada object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getInevapCActividad() || is_scalar($obj->getInevapCActividad()) || is_callable([$obj->getInevapCActividad(), '__toString']) ? (string) $obj->getInevapCActividad() : $obj->getInevapCActividad()), (null === $obj->getInevapNumeroDictacion() || is_scalar($obj->getInevapNumeroDictacion()) || is_callable([$obj->getInevapNumeroDictacion(), '__toString']) ? (string) $obj->getInevapNumeroDictacion() : $obj->getInevapNumeroDictacion()), (null === $obj->getInevapCEvaluacion() || is_scalar($obj->getInevapCEvaluacion()) || is_callable([$obj->getInevapCEvaluacion(), '__toString']) ? (string) $obj->getInevapCEvaluacion() : $obj->getInevapCEvaluacion()), (null === $obj->getInevapNumeroEvaluacion() || is_scalar($obj->getInevapNumeroEvaluacion()) || is_callable([$obj->getInevapNumeroEvaluacion(), '__toString']) ? (string) $obj->getInevapNumeroEvaluacion() : $obj->getInevapNumeroEvaluacion()), (null === $obj->getInevapCTrabajador() || is_scalar($obj->getInevapCTrabajador()) || is_callable([$obj->getInevapCTrabajador(), '__toString']) ? (string) $obj->getInevapCTrabajador() : $obj->getInevapCTrabajador())]);
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
     * @param mixed $value A \InscripcionEvaluacionAplicada object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \InscripcionEvaluacionAplicada) {
                $key = serialize([(null === $value->getInevapCActividad() || is_scalar($value->getInevapCActividad()) || is_callable([$value->getInevapCActividad(), '__toString']) ? (string) $value->getInevapCActividad() : $value->getInevapCActividad()), (null === $value->getInevapNumeroDictacion() || is_scalar($value->getInevapNumeroDictacion()) || is_callable([$value->getInevapNumeroDictacion(), '__toString']) ? (string) $value->getInevapNumeroDictacion() : $value->getInevapNumeroDictacion()), (null === $value->getInevapCEvaluacion() || is_scalar($value->getInevapCEvaluacion()) || is_callable([$value->getInevapCEvaluacion(), '__toString']) ? (string) $value->getInevapCEvaluacion() : $value->getInevapCEvaluacion()), (null === $value->getInevapNumeroEvaluacion() || is_scalar($value->getInevapNumeroEvaluacion()) || is_callable([$value->getInevapNumeroEvaluacion(), '__toString']) ? (string) $value->getInevapNumeroEvaluacion() : $value->getInevapNumeroEvaluacion()), (null === $value->getInevapCTrabajador() || is_scalar($value->getInevapCTrabajador()) || is_callable([$value->getInevapCTrabajador(), '__toString']) ? (string) $value->getInevapCTrabajador() : $value->getInevapCTrabajador())]);

            } elseif (is_array($value) && count($value) === 5) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2]), (null === $value[3] || is_scalar($value[3]) || is_callable([$value[3], '__toString']) ? (string) $value[3] : $value[3]), (null === $value[4] || is_scalar($value[4]) || is_callable([$value[4], '__toString']) ? (string) $value[4] : $value[4])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \InscripcionEvaluacionAplicada object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InevapCActividad', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InevapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InevapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('InevapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('InevapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InevapCActividad', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InevapCActividad', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InevapCActividad', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InevapCActividad', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InevapCActividad', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InevapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InevapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InevapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InevapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InevapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InevapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InevapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InevapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InevapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('InevapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('InevapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('InevapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('InevapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('InevapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('InevapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('InevapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('InevapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('InevapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('InevapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('InevapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('InevapCActividad', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('InevapNumeroDictacion', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('InevapCEvaluacion', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 3 + $offset
                : self::translateFieldName('InevapNumeroEvaluacion', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 4 + $offset
                : self::translateFieldName('InevapCTrabajador', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? InscripcionEvaluacionAplicadaTableMap::CLASS_DEFAULT : InscripcionEvaluacionAplicadaTableMap::OM_CLASS;
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
     * @return array           (InscripcionEvaluacionAplicada object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InscripcionEvaluacionAplicadaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InscripcionEvaluacionAplicadaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InscripcionEvaluacionAplicadaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InscripcionEvaluacionAplicadaTableMap::OM_CLASS;
            /** @var InscripcionEvaluacionAplicada $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InscripcionEvaluacionAplicadaTableMap::addInstanceToPool($obj, $key);
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
            $key = InscripcionEvaluacionAplicadaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InscripcionEvaluacionAplicadaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var InscripcionEvaluacionAplicada $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InscripcionEvaluacionAplicadaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD);
            $criteria->addSelectColumn(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION);
            $criteria->addSelectColumn(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION);
            $criteria->addSelectColumn(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION);
            $criteria->addSelectColumn(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR);
            $criteria->addSelectColumn(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_E_INSCRIPCION_EVALUACION_APLICADA);
            $criteria->addSelectColumn(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_VIGENTE);
            $criteria->addSelectColumn(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_CREACION);
            $criteria->addSelectColumn(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.inevap_c_actividad');
            $criteria->addSelectColumn($alias . '.inevap_numero_dictacion');
            $criteria->addSelectColumn($alias . '.inevap_c_evaluacion');
            $criteria->addSelectColumn($alias . '.inevap_numero_evaluacion');
            $criteria->addSelectColumn($alias . '.inevap_c_trabajador');
            $criteria->addSelectColumn($alias . '.inevap_e_inscripcion_evaluacion_aplicada');
            $criteria->addSelectColumn($alias . '.inevap_vigente');
            $criteria->addSelectColumn($alias . '.inevap_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.inevap_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.inevap_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(InscripcionEvaluacionAplicadaTableMap::DATABASE_NAME)->getTable(InscripcionEvaluacionAplicadaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InscripcionEvaluacionAplicadaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InscripcionEvaluacionAplicadaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a InscripcionEvaluacionAplicada or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or InscripcionEvaluacionAplicada object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \InscripcionEvaluacionAplicada) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_ACTIVIDAD, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_DICTACION, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_EVALUACION, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_NUMERO_EVALUACION, $value[3]));
                $criterion->addAnd($criteria->getNewCriterion(InscripcionEvaluacionAplicadaTableMap::COL_INEVAP_C_TRABAJADOR, $value[4]));
                $criteria->addOr($criterion);
            }
        }

        $query = InscripcionEvaluacionAplicadaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InscripcionEvaluacionAplicadaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InscripcionEvaluacionAplicadaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the inscripcion_evaluacion_aplicada table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InscripcionEvaluacionAplicadaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a InscripcionEvaluacionAplicada or Criteria object.
     *
     * @param mixed               $criteria Criteria or InscripcionEvaluacionAplicada object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InscripcionEvaluacionAplicadaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from InscripcionEvaluacionAplicada object
        }


        // Set the correct dbName
        $query = InscripcionEvaluacionAplicadaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InscripcionEvaluacionAplicadaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InscripcionEvaluacionAplicadaTableMap::buildTableMap();
