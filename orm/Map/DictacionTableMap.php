<?php

namespace Map;

use \Dictacion;
use \DictacionQuery;
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
 * This class defines the structure of the 'dictacion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DictacionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DictacionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'dictacion';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Dictacion';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Dictacion';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 27;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 27;

    /**
     * the column name for the dict_c_actividad field
     */
    const COL_DICT_C_ACTIVIDAD = 'dictacion.dict_c_actividad';

    /**
     * the column name for the dict_numero field
     */
    const COL_DICT_NUMERO = 'dictacion.dict_numero';

    /**
     * the column name for the dict_fecha_inicio field
     */
    const COL_DICT_FECHA_INICIO = 'dictacion.dict_fecha_inicio';

    /**
     * the column name for the dict_fecha_termino field
     */
    const COL_DICT_FECHA_TERMINO = 'dictacion.dict_fecha_termino';

    /**
     * the column name for the dict_e_dictacion field
     */
    const COL_DICT_E_DICTACION = 'dictacion.dict_e_dictacion';

    /**
     * the column name for the dict_c_resolucion field
     */
    const COL_DICT_C_RESOLUCION = 'dictacion.dict_c_resolucion';

    /**
     * the column name for the dict_t_certificado field
     */
    const COL_DICT_T_CERTIFICADO = 'dictacion.dict_t_certificado';

    /**
     * the column name for the dict_certificado_participacion field
     */
    const COL_DICT_CERTIFICADO_PARTICIPACION = 'dictacion.dict_certificado_participacion';

    /**
     * the column name for the dict_t_calificacion field
     */
    const COL_DICT_T_CALIFICACION = 'dictacion.dict_t_calificacion';

    /**
     * the column name for the dict_asistencia_minima field
     */
    const COL_DICT_ASISTENCIA_MINIMA = 'dictacion.dict_asistencia_minima';

    /**
     * the column name for the dict_nota_minima field
     */
    const COL_DICT_NOTA_MINIMA = 'dictacion.dict_nota_minima';

    /**
     * the column name for the dict_cobertura field
     */
    const COL_DICT_COBERTURA = 'dictacion.dict_cobertura';

    /**
     * the column name for the dict_valor field
     */
    const COL_DICT_VALOR = 'dictacion.dict_valor';

    /**
     * the column name for the dict_t_moneda field
     */
    const COL_DICT_T_MONEDA = 'dictacion.dict_t_moneda';

    /**
     * the column name for the dict_c_comuna field
     */
    const COL_DICT_C_COMUNA = 'dictacion.dict_c_comuna';

    /**
     * the column name for the dict_direccion field
     */
    const COL_DICT_DIRECCION = 'dictacion.dict_direccion';

    /**
     * the column name for the dict_telefono field
     */
    const COL_DICT_TELEFONO = 'dictacion.dict_telefono';

    /**
     * the column name for the dict_fax field
     */
    const COL_DICT_FAX = 'dictacion.dict_fax';

    /**
     * the column name for the dict_email field
     */
    const COL_DICT_EMAIL = 'dictacion.dict_email';

    /**
     * the column name for the dict_cupo field
     */
    const COL_DICT_CUPO = 'dictacion.dict_cupo';

    /**
     * the column name for the dict_t_evaluacion field
     */
    const COL_DICT_T_EVALUACION = 'dictacion.dict_t_evaluacion';

    /**
     * the column name for the dict_t_capacitacion field
     */
    const COL_DICT_T_CAPACITACION = 'dictacion.dict_t_capacitacion';

    /**
     * the column name for the dict_observacion field
     */
    const COL_DICT_OBSERVACION = 'dictacion.dict_observacion';

    /**
     * the column name for the dict_vigente field
     */
    const COL_DICT_VIGENTE = 'dictacion.dict_vigente';

    /**
     * the column name for the dict_r_fecha_creacion field
     */
    const COL_DICT_R_FECHA_CREACION = 'dictacion.dict_r_fecha_creacion';

    /**
     * the column name for the dict_r_fecha_modificacion field
     */
    const COL_DICT_R_FECHA_MODIFICACION = 'dictacion.dict_r_fecha_modificacion';

    /**
     * the column name for the dict_r_usuario field
     */
    const COL_DICT_R_USUARIO = 'dictacion.dict_r_usuario';

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
        self::TYPE_PHPNAME       => array('DictCActividad', 'DictNumero', 'DictFechaInicio', 'DictFechaTermino', 'DictEDictacion', 'DictCResolucion', 'DictTCertificado', 'DictCertificadoParticipacion', 'DictTCalificacion', 'DictAsistenciaMinima', 'DictNotaMinima', 'DictCobertura', 'DictValor', 'DictTMoneda', 'DictCComuna', 'DictDireccion', 'DictTelefono', 'DictFax', 'DictEmail', 'DictCupo', 'DictTEvaluacion', 'DictTCapacitacion', 'DictObservacion', 'DictVigente', 'DictRFechaCreacion', 'DictRFechaModificacion', 'DictRUsuario', ),
        self::TYPE_CAMELNAME     => array('dictCActividad', 'dictNumero', 'dictFechaInicio', 'dictFechaTermino', 'dictEDictacion', 'dictCResolucion', 'dictTCertificado', 'dictCertificadoParticipacion', 'dictTCalificacion', 'dictAsistenciaMinima', 'dictNotaMinima', 'dictCobertura', 'dictValor', 'dictTMoneda', 'dictCComuna', 'dictDireccion', 'dictTelefono', 'dictFax', 'dictEmail', 'dictCupo', 'dictTEvaluacion', 'dictTCapacitacion', 'dictObservacion', 'dictVigente', 'dictRFechaCreacion', 'dictRFechaModificacion', 'dictRUsuario', ),
        self::TYPE_COLNAME       => array(DictacionTableMap::COL_DICT_C_ACTIVIDAD, DictacionTableMap::COL_DICT_NUMERO, DictacionTableMap::COL_DICT_FECHA_INICIO, DictacionTableMap::COL_DICT_FECHA_TERMINO, DictacionTableMap::COL_DICT_E_DICTACION, DictacionTableMap::COL_DICT_C_RESOLUCION, DictacionTableMap::COL_DICT_T_CERTIFICADO, DictacionTableMap::COL_DICT_CERTIFICADO_PARTICIPACION, DictacionTableMap::COL_DICT_T_CALIFICACION, DictacionTableMap::COL_DICT_ASISTENCIA_MINIMA, DictacionTableMap::COL_DICT_NOTA_MINIMA, DictacionTableMap::COL_DICT_COBERTURA, DictacionTableMap::COL_DICT_VALOR, DictacionTableMap::COL_DICT_T_MONEDA, DictacionTableMap::COL_DICT_C_COMUNA, DictacionTableMap::COL_DICT_DIRECCION, DictacionTableMap::COL_DICT_TELEFONO, DictacionTableMap::COL_DICT_FAX, DictacionTableMap::COL_DICT_EMAIL, DictacionTableMap::COL_DICT_CUPO, DictacionTableMap::COL_DICT_T_EVALUACION, DictacionTableMap::COL_DICT_T_CAPACITACION, DictacionTableMap::COL_DICT_OBSERVACION, DictacionTableMap::COL_DICT_VIGENTE, DictacionTableMap::COL_DICT_R_FECHA_CREACION, DictacionTableMap::COL_DICT_R_FECHA_MODIFICACION, DictacionTableMap::COL_DICT_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('dict_c_actividad', 'dict_numero', 'dict_fecha_inicio', 'dict_fecha_termino', 'dict_e_dictacion', 'dict_c_resolucion', 'dict_t_certificado', 'dict_certificado_participacion', 'dict_t_calificacion', 'dict_asistencia_minima', 'dict_nota_minima', 'dict_cobertura', 'dict_valor', 'dict_t_moneda', 'dict_c_comuna', 'dict_direccion', 'dict_telefono', 'dict_fax', 'dict_email', 'dict_cupo', 'dict_t_evaluacion', 'dict_t_capacitacion', 'dict_observacion', 'dict_vigente', 'dict_r_fecha_creacion', 'dict_r_fecha_modificacion', 'dict_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('DictCActividad' => 0, 'DictNumero' => 1, 'DictFechaInicio' => 2, 'DictFechaTermino' => 3, 'DictEDictacion' => 4, 'DictCResolucion' => 5, 'DictTCertificado' => 6, 'DictCertificadoParticipacion' => 7, 'DictTCalificacion' => 8, 'DictAsistenciaMinima' => 9, 'DictNotaMinima' => 10, 'DictCobertura' => 11, 'DictValor' => 12, 'DictTMoneda' => 13, 'DictCComuna' => 14, 'DictDireccion' => 15, 'DictTelefono' => 16, 'DictFax' => 17, 'DictEmail' => 18, 'DictCupo' => 19, 'DictTEvaluacion' => 20, 'DictTCapacitacion' => 21, 'DictObservacion' => 22, 'DictVigente' => 23, 'DictRFechaCreacion' => 24, 'DictRFechaModificacion' => 25, 'DictRUsuario' => 26, ),
        self::TYPE_CAMELNAME     => array('dictCActividad' => 0, 'dictNumero' => 1, 'dictFechaInicio' => 2, 'dictFechaTermino' => 3, 'dictEDictacion' => 4, 'dictCResolucion' => 5, 'dictTCertificado' => 6, 'dictCertificadoParticipacion' => 7, 'dictTCalificacion' => 8, 'dictAsistenciaMinima' => 9, 'dictNotaMinima' => 10, 'dictCobertura' => 11, 'dictValor' => 12, 'dictTMoneda' => 13, 'dictCComuna' => 14, 'dictDireccion' => 15, 'dictTelefono' => 16, 'dictFax' => 17, 'dictEmail' => 18, 'dictCupo' => 19, 'dictTEvaluacion' => 20, 'dictTCapacitacion' => 21, 'dictObservacion' => 22, 'dictVigente' => 23, 'dictRFechaCreacion' => 24, 'dictRFechaModificacion' => 25, 'dictRUsuario' => 26, ),
        self::TYPE_COLNAME       => array(DictacionTableMap::COL_DICT_C_ACTIVIDAD => 0, DictacionTableMap::COL_DICT_NUMERO => 1, DictacionTableMap::COL_DICT_FECHA_INICIO => 2, DictacionTableMap::COL_DICT_FECHA_TERMINO => 3, DictacionTableMap::COL_DICT_E_DICTACION => 4, DictacionTableMap::COL_DICT_C_RESOLUCION => 5, DictacionTableMap::COL_DICT_T_CERTIFICADO => 6, DictacionTableMap::COL_DICT_CERTIFICADO_PARTICIPACION => 7, DictacionTableMap::COL_DICT_T_CALIFICACION => 8, DictacionTableMap::COL_DICT_ASISTENCIA_MINIMA => 9, DictacionTableMap::COL_DICT_NOTA_MINIMA => 10, DictacionTableMap::COL_DICT_COBERTURA => 11, DictacionTableMap::COL_DICT_VALOR => 12, DictacionTableMap::COL_DICT_T_MONEDA => 13, DictacionTableMap::COL_DICT_C_COMUNA => 14, DictacionTableMap::COL_DICT_DIRECCION => 15, DictacionTableMap::COL_DICT_TELEFONO => 16, DictacionTableMap::COL_DICT_FAX => 17, DictacionTableMap::COL_DICT_EMAIL => 18, DictacionTableMap::COL_DICT_CUPO => 19, DictacionTableMap::COL_DICT_T_EVALUACION => 20, DictacionTableMap::COL_DICT_T_CAPACITACION => 21, DictacionTableMap::COL_DICT_OBSERVACION => 22, DictacionTableMap::COL_DICT_VIGENTE => 23, DictacionTableMap::COL_DICT_R_FECHA_CREACION => 24, DictacionTableMap::COL_DICT_R_FECHA_MODIFICACION => 25, DictacionTableMap::COL_DICT_R_USUARIO => 26, ),
        self::TYPE_FIELDNAME     => array('dict_c_actividad' => 0, 'dict_numero' => 1, 'dict_fecha_inicio' => 2, 'dict_fecha_termino' => 3, 'dict_e_dictacion' => 4, 'dict_c_resolucion' => 5, 'dict_t_certificado' => 6, 'dict_certificado_participacion' => 7, 'dict_t_calificacion' => 8, 'dict_asistencia_minima' => 9, 'dict_nota_minima' => 10, 'dict_cobertura' => 11, 'dict_valor' => 12, 'dict_t_moneda' => 13, 'dict_c_comuna' => 14, 'dict_direccion' => 15, 'dict_telefono' => 16, 'dict_fax' => 17, 'dict_email' => 18, 'dict_cupo' => 19, 'dict_t_evaluacion' => 20, 'dict_t_capacitacion' => 21, 'dict_observacion' => 22, 'dict_vigente' => 23, 'dict_r_fecha_creacion' => 24, 'dict_r_fecha_modificacion' => 25, 'dict_r_usuario' => 26, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
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
        $this->setName('dictacion');
        $this->setPhpName('Dictacion');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Dictacion');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('dict_c_actividad', 'DictCActividad', 'INTEGER' , 'actividad', 'acti_codigo', true, null, null);
        $this->addPrimaryKey('dict_numero', 'DictNumero', 'INTEGER', true, null, null);
        $this->addColumn('dict_fecha_inicio', 'DictFechaInicio', 'VARCHAR', false, 20, null);
        $this->addColumn('dict_fecha_termino', 'DictFechaTermino', 'VARCHAR', false, 20, null);
        $this->addForeignKey('dict_e_dictacion', 'DictEDictacion', 'INTEGER', 'e_dictacion', 'edi_estado', false, null, null);
        $this->addColumn('dict_c_resolucion', 'DictCResolucion', 'INTEGER', false, null, null);
        $this->addForeignKey('dict_t_certificado', 'DictTCertificado', 'INTEGER', 't_certificado', 'tce_tipo', false, null, null);
        $this->addColumn('dict_certificado_participacion', 'DictCertificadoParticipacion', 'INTEGER', false, 1, null);
        $this->addForeignKey('dict_t_calificacion', 'DictTCalificacion', 'INTEGER', 't_calificacion', 'tcal_tipo', false, null, null);
        $this->addColumn('dict_asistencia_minima', 'DictAsistenciaMinima', 'INTEGER', false, 3, null);
        $this->addColumn('dict_nota_minima', 'DictNotaMinima', 'INTEGER', false, 3, null);
        $this->addColumn('dict_cobertura', 'DictCobertura', 'VARCHAR', false, 1, null);
        $this->addColumn('dict_valor', 'DictValor', 'VARCHAR', false, 10, null);
        $this->addForeignKey('dict_t_moneda', 'DictTMoneda', 'INTEGER', 't_moneda', 'tmon_tipo', false, null, null);
        $this->addForeignKey('dict_c_comuna', 'DictCComuna', 'INTEGER', 'comuna', 'comu_codigo', false, null, null);
        $this->addColumn('dict_direccion', 'DictDireccion', 'VARCHAR', false, 10, null);
        $this->addColumn('dict_telefono', 'DictTelefono', 'VARCHAR', false, 10, null);
        $this->addColumn('dict_fax', 'DictFax', 'VARCHAR', false, 10, null);
        $this->addColumn('dict_email', 'DictEmail', 'VARCHAR', false, 19, null);
        $this->addColumn('dict_cupo', 'DictCupo', 'INTEGER', false, 2, null);
        $this->addForeignKey('dict_t_evaluacion', 'DictTEvaluacion', 'INTEGER', 't_evaluacion', 'tev_tipo', false, null, null);
        $this->addColumn('dict_t_capacitacion', 'DictTCapacitacion', 'INTEGER', false, null, null);
        $this->addColumn('dict_observacion', 'DictObservacion', 'VARCHAR', false, 255, null);
        $this->addColumn('dict_vigente', 'DictVigente', 'INTEGER', false, 1, null);
        $this->addColumn('dict_r_fecha_creacion', 'DictRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('dict_r_fecha_modificacion', 'DictRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('dict_r_usuario', 'DictRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Actividad', '\\Actividad', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':dict_c_actividad',
    1 => ':acti_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Comuna', '\\Comuna', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':dict_c_comuna',
    1 => ':comu_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('EDictacion', '\\EDictacion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':dict_e_dictacion',
    1 => ':edi_estado',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('TCalificacion', '\\TCalificacion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':dict_t_calificacion',
    1 => ':tcal_tipo',
  ),
), null, null, null, false);
        $this->addRelation('TCertificado', '\\TCertificado', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':dict_t_certificado',
    1 => ':tce_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('TEvaluacion', '\\TEvaluacion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':dict_t_evaluacion',
    1 => ':tev_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('TMoneda', '\\TMoneda', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':dict_t_moneda',
    1 => ':tmon_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('EvaluacionAplicada', '\\EvaluacionAplicada', RelationMap::ONE_TO_MANY, array (
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
), null, 'CASCADE', 'EvaluacionAplicadas', false);
        $this->addRelation('Facilitador', '\\Facilitador', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':faci_c_actividad',
    1 => ':dict_c_actividad',
  ),
  1 =>
  array (
    0 => ':faci_numero_dictacion',
    1 => ':dict_numero',
  ),
), null, 'CASCADE', 'Facilitadors', false);
        $this->addRelation('Inscripcion', '\\Inscripcion', RelationMap::ONE_TO_MANY, array (
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
), null, null, 'Inscripcions', false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Dictacion $obj A \Dictacion object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getDictCActividad() || is_scalar($obj->getDictCActividad()) || is_callable([$obj->getDictCActividad(), '__toString']) ? (string) $obj->getDictCActividad() : $obj->getDictCActividad()), (null === $obj->getDictNumero() || is_scalar($obj->getDictNumero()) || is_callable([$obj->getDictNumero(), '__toString']) ? (string) $obj->getDictNumero() : $obj->getDictNumero())]);
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
     * @param mixed $value A \Dictacion object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Dictacion) {
                $key = serialize([(null === $value->getDictCActividad() || is_scalar($value->getDictCActividad()) || is_callable([$value->getDictCActividad(), '__toString']) ? (string) $value->getDictCActividad() : $value->getDictCActividad()), (null === $value->getDictNumero() || is_scalar($value->getDictNumero()) || is_callable([$value->getDictNumero(), '__toString']) ? (string) $value->getDictNumero() : $value->getDictNumero())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Dictacion object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DictCActividad', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DictNumero', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DictCActividad', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DictCActividad', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DictCActividad', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DictCActividad', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('DictCActividad', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DictNumero', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DictNumero', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DictNumero', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DictNumero', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DictNumero', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                : self::translateFieldName('DictCActividad', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('DictNumero', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? DictacionTableMap::CLASS_DEFAULT : DictacionTableMap::OM_CLASS;
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
     * @return array           (Dictacion object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DictacionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DictacionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DictacionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DictacionTableMap::OM_CLASS;
            /** @var Dictacion $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DictacionTableMap::addInstanceToPool($obj, $key);
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
            $key = DictacionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DictacionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Dictacion $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DictacionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_C_ACTIVIDAD);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_NUMERO);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_FECHA_INICIO);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_FECHA_TERMINO);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_E_DICTACION);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_C_RESOLUCION);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_T_CERTIFICADO);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_CERTIFICADO_PARTICIPACION);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_T_CALIFICACION);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_ASISTENCIA_MINIMA);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_NOTA_MINIMA);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_COBERTURA);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_VALOR);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_T_MONEDA);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_C_COMUNA);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_DIRECCION);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_TELEFONO);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_FAX);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_EMAIL);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_CUPO);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_T_EVALUACION);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_T_CAPACITACION);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_OBSERVACION);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_VIGENTE);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_R_FECHA_CREACION);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(DictacionTableMap::COL_DICT_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.dict_c_actividad');
            $criteria->addSelectColumn($alias . '.dict_numero');
            $criteria->addSelectColumn($alias . '.dict_fecha_inicio');
            $criteria->addSelectColumn($alias . '.dict_fecha_termino');
            $criteria->addSelectColumn($alias . '.dict_e_dictacion');
            $criteria->addSelectColumn($alias . '.dict_c_resolucion');
            $criteria->addSelectColumn($alias . '.dict_t_certificado');
            $criteria->addSelectColumn($alias . '.dict_certificado_participacion');
            $criteria->addSelectColumn($alias . '.dict_t_calificacion');
            $criteria->addSelectColumn($alias . '.dict_asistencia_minima');
            $criteria->addSelectColumn($alias . '.dict_nota_minima');
            $criteria->addSelectColumn($alias . '.dict_cobertura');
            $criteria->addSelectColumn($alias . '.dict_valor');
            $criteria->addSelectColumn($alias . '.dict_t_moneda');
            $criteria->addSelectColumn($alias . '.dict_c_comuna');
            $criteria->addSelectColumn($alias . '.dict_direccion');
            $criteria->addSelectColumn($alias . '.dict_telefono');
            $criteria->addSelectColumn($alias . '.dict_fax');
            $criteria->addSelectColumn($alias . '.dict_email');
            $criteria->addSelectColumn($alias . '.dict_cupo');
            $criteria->addSelectColumn($alias . '.dict_t_evaluacion');
            $criteria->addSelectColumn($alias . '.dict_t_capacitacion');
            $criteria->addSelectColumn($alias . '.dict_observacion');
            $criteria->addSelectColumn($alias . '.dict_vigente');
            $criteria->addSelectColumn($alias . '.dict_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.dict_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.dict_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(DictacionTableMap::DATABASE_NAME)->getTable(DictacionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DictacionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DictacionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DictacionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Dictacion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Dictacion object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DictacionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Dictacion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DictacionTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(DictacionTableMap::COL_DICT_NUMERO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = DictacionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DictacionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DictacionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the dictacion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DictacionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Dictacion or Criteria object.
     *
     * @param mixed               $criteria Criteria or Dictacion object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DictacionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Dictacion object
        }


        // Set the correct dbName
        $query = DictacionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DictacionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DictacionTableMap::buildTableMap();
