<?php

namespace Map;

use \Persona;
use \PersonaQuery;
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
 * This class defines the structure of the 'persona' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PersonaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PersonaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'persona';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Persona';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Persona';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the pers_codigo field
     */
    const COL_PERS_CODIGO = 'persona.pers_codigo';

    /**
     * the column name for the pers_t_identificador field
     */
    const COL_PERS_T_IDENTIFICADOR = 'persona.pers_t_identificador';

    /**
     * the column name for the pers_identificador field
     */
    const COL_PERS_IDENTIFICADOR = 'persona.pers_identificador';

    /**
     * the column name for the pers_dv field
     */
    const COL_PERS_DV = 'persona.pers_dv';

    /**
     * the column name for the pers_nombre1 field
     */
    const COL_PERS_NOMBRE1 = 'persona.pers_nombre1';

    /**
     * the column name for the pers_nombre2 field
     */
    const COL_PERS_NOMBRE2 = 'persona.pers_nombre2';

    /**
     * the column name for the pers_apellido_paterno field
     */
    const COL_PERS_APELLIDO_PATERNO = 'persona.pers_apellido_paterno';

    /**
     * the column name for the pers_apellido_materno field
     */
    const COL_PERS_APELLIDO_MATERNO = 'persona.pers_apellido_materno';

    /**
     * the column name for the pers_sexo field
     */
    const COL_PERS_SEXO = 'persona.pers_sexo';

    /**
     * the column name for the pers_fecha_nacimiento field
     */
    const COL_PERS_FECHA_NACIMIENTO = 'persona.pers_fecha_nacimiento';

    /**
     * the column name for the pers_c_estado_civil field
     */
    const COL_PERS_C_ESTADO_CIVIL = 'persona.pers_c_estado_civil';

    /**
     * the column name for the pers_c_escolaridad field
     */
    const COL_PERS_C_ESCOLARIDAD = 'persona.pers_c_escolaridad';

    /**
     * the column name for the pers_c_pais_origen field
     */
    const COL_PERS_C_PAIS_ORIGEN = 'persona.pers_c_pais_origen';

    /**
     * the column name for the pers_email field
     */
    const COL_PERS_EMAIL = 'persona.pers_email';

    /**
     * the column name for the pers_movil field
     */
    const COL_PERS_MOVIL = 'persona.pers_movil';

    /**
     * the column name for the pers_titulo field
     */
    const COL_PERS_TITULO = 'persona.pers_titulo';

    /**
     * the column name for the pers_grado field
     */
    const COL_PERS_GRADO = 'persona.pers_grado';

    /**
     * the column name for the pers_r_fecha_creacion field
     */
    const COL_PERS_R_FECHA_CREACION = 'persona.pers_r_fecha_creacion';

    /**
     * the column name for the pers_r_fecha_modificacion field
     */
    const COL_PERS_R_FECHA_MODIFICACION = 'persona.pers_r_fecha_modificacion';

    /**
     * the column name for the pers_r_usuario field
     */
    const COL_PERS_R_USUARIO = 'persona.pers_r_usuario';

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
        self::TYPE_PHPNAME       => array('PersCodigo', 'PersTIdentificador', 'PersIdentificador', 'PersDv', 'PersNombre1', 'PersNombre2', 'PersApellidoPaterno', 'PersApellidoMaterno', 'PersSexo', 'PersFechaNacimiento', 'PersCEstadoCivil', 'PersCEscolaridad', 'PersCPaisOrigen', 'PersEmail', 'PersMovil', 'PersTitulo', 'PersGrado', 'PersRFechaCreacion', 'PersRFechaModificacion', 'PersRUsuario', ),
        self::TYPE_CAMELNAME     => array('persCodigo', 'persTIdentificador', 'persIdentificador', 'persDv', 'persNombre1', 'persNombre2', 'persApellidoPaterno', 'persApellidoMaterno', 'persSexo', 'persFechaNacimiento', 'persCEstadoCivil', 'persCEscolaridad', 'persCPaisOrigen', 'persEmail', 'persMovil', 'persTitulo', 'persGrado', 'persRFechaCreacion', 'persRFechaModificacion', 'persRUsuario', ),
        self::TYPE_COLNAME       => array(PersonaTableMap::COL_PERS_CODIGO, PersonaTableMap::COL_PERS_T_IDENTIFICADOR, PersonaTableMap::COL_PERS_IDENTIFICADOR, PersonaTableMap::COL_PERS_DV, PersonaTableMap::COL_PERS_NOMBRE1, PersonaTableMap::COL_PERS_NOMBRE2, PersonaTableMap::COL_PERS_APELLIDO_PATERNO, PersonaTableMap::COL_PERS_APELLIDO_MATERNO, PersonaTableMap::COL_PERS_SEXO, PersonaTableMap::COL_PERS_FECHA_NACIMIENTO, PersonaTableMap::COL_PERS_C_ESTADO_CIVIL, PersonaTableMap::COL_PERS_C_ESCOLARIDAD, PersonaTableMap::COL_PERS_C_PAIS_ORIGEN, PersonaTableMap::COL_PERS_EMAIL, PersonaTableMap::COL_PERS_MOVIL, PersonaTableMap::COL_PERS_TITULO, PersonaTableMap::COL_PERS_GRADO, PersonaTableMap::COL_PERS_R_FECHA_CREACION, PersonaTableMap::COL_PERS_R_FECHA_MODIFICACION, PersonaTableMap::COL_PERS_R_USUARIO, ),
        self::TYPE_FIELDNAME     => array('pers_codigo', 'pers_t_identificador', 'pers_identificador', 'pers_dv', 'pers_nombre1', 'pers_nombre2', 'pers_apellido_paterno', 'pers_apellido_materno', 'pers_sexo', 'pers_fecha_nacimiento', 'pers_c_estado_civil', 'pers_c_escolaridad', 'pers_c_pais_origen', 'pers_email', 'pers_movil', 'pers_titulo', 'pers_grado', 'pers_r_fecha_creacion', 'pers_r_fecha_modificacion', 'pers_r_usuario', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PersCodigo' => 0, 'PersTIdentificador' => 1, 'PersIdentificador' => 2, 'PersDv' => 3, 'PersNombre1' => 4, 'PersNombre2' => 5, 'PersApellidoPaterno' => 6, 'PersApellidoMaterno' => 7, 'PersSexo' => 8, 'PersFechaNacimiento' => 9, 'PersCEstadoCivil' => 10, 'PersCEscolaridad' => 11, 'PersCPaisOrigen' => 12, 'PersEmail' => 13, 'PersMovil' => 14, 'PersTitulo' => 15, 'PersGrado' => 16, 'PersRFechaCreacion' => 17, 'PersRFechaModificacion' => 18, 'PersRUsuario' => 19, ),
        self::TYPE_CAMELNAME     => array('persCodigo' => 0, 'persTIdentificador' => 1, 'persIdentificador' => 2, 'persDv' => 3, 'persNombre1' => 4, 'persNombre2' => 5, 'persApellidoPaterno' => 6, 'persApellidoMaterno' => 7, 'persSexo' => 8, 'persFechaNacimiento' => 9, 'persCEstadoCivil' => 10, 'persCEscolaridad' => 11, 'persCPaisOrigen' => 12, 'persEmail' => 13, 'persMovil' => 14, 'persTitulo' => 15, 'persGrado' => 16, 'persRFechaCreacion' => 17, 'persRFechaModificacion' => 18, 'persRUsuario' => 19, ),
        self::TYPE_COLNAME       => array(PersonaTableMap::COL_PERS_CODIGO => 0, PersonaTableMap::COL_PERS_T_IDENTIFICADOR => 1, PersonaTableMap::COL_PERS_IDENTIFICADOR => 2, PersonaTableMap::COL_PERS_DV => 3, PersonaTableMap::COL_PERS_NOMBRE1 => 4, PersonaTableMap::COL_PERS_NOMBRE2 => 5, PersonaTableMap::COL_PERS_APELLIDO_PATERNO => 6, PersonaTableMap::COL_PERS_APELLIDO_MATERNO => 7, PersonaTableMap::COL_PERS_SEXO => 8, PersonaTableMap::COL_PERS_FECHA_NACIMIENTO => 9, PersonaTableMap::COL_PERS_C_ESTADO_CIVIL => 10, PersonaTableMap::COL_PERS_C_ESCOLARIDAD => 11, PersonaTableMap::COL_PERS_C_PAIS_ORIGEN => 12, PersonaTableMap::COL_PERS_EMAIL => 13, PersonaTableMap::COL_PERS_MOVIL => 14, PersonaTableMap::COL_PERS_TITULO => 15, PersonaTableMap::COL_PERS_GRADO => 16, PersonaTableMap::COL_PERS_R_FECHA_CREACION => 17, PersonaTableMap::COL_PERS_R_FECHA_MODIFICACION => 18, PersonaTableMap::COL_PERS_R_USUARIO => 19, ),
        self::TYPE_FIELDNAME     => array('pers_codigo' => 0, 'pers_t_identificador' => 1, 'pers_identificador' => 2, 'pers_dv' => 3, 'pers_nombre1' => 4, 'pers_nombre2' => 5, 'pers_apellido_paterno' => 6, 'pers_apellido_materno' => 7, 'pers_sexo' => 8, 'pers_fecha_nacimiento' => 9, 'pers_c_estado_civil' => 10, 'pers_c_escolaridad' => 11, 'pers_c_pais_origen' => 12, 'pers_email' => 13, 'pers_movil' => 14, 'pers_titulo' => 15, 'pers_grado' => 16, 'pers_r_fecha_creacion' => 17, 'pers_r_fecha_modificacion' => 18, 'pers_r_usuario' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $this->setName('persona');
        $this->setPhpName('Persona');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Persona');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('pers_codigo', 'PersCodigo', 'INTEGER', true, null, null);
        $this->addForeignKey('pers_t_identificador', 'PersTIdentificador', 'INTEGER', 't_identificador', 'tide_tipo', false, null, null);
        $this->addColumn('pers_identificador', 'PersIdentificador', 'INTEGER', false, 15, null);
        $this->addColumn('pers_dv', 'PersDv', 'VARCHAR', false, 1, null);
        $this->addColumn('pers_nombre1', 'PersNombre1', 'VARCHAR', false, 70, null);
        $this->addColumn('pers_nombre2', 'PersNombre2', 'VARCHAR', false, 70, null);
        $this->addColumn('pers_apellido_paterno', 'PersApellidoPaterno', 'VARCHAR', false, 79, null);
        $this->addColumn('pers_apellido_materno', 'PersApellidoMaterno', 'VARCHAR', false, 79, null);
        $this->addColumn('pers_sexo', 'PersSexo', 'VARCHAR', false, 1, null);
        $this->addColumn('pers_fecha_nacimiento', 'PersFechaNacimiento', 'VARCHAR', false, 19, null);
        $this->addForeignKey('pers_c_estado_civil', 'PersCEstadoCivil', 'INTEGER', 'estado_civil', 'esci_codigo', false, null, null);
        $this->addForeignKey('pers_c_escolaridad', 'PersCEscolaridad', 'INTEGER', 'escolaridad', 'esco_codigo', false, null, null);
        $this->addForeignKey('pers_c_pais_origen', 'PersCPaisOrigen', 'INTEGER', 'pais', 'pais_codigo', false, null, null);
        $this->addColumn('pers_email', 'PersEmail', 'VARCHAR', false, 255, null);
        $this->addColumn('pers_movil', 'PersMovil', 'VARCHAR', false, 55, null);
        $this->addColumn('pers_titulo', 'PersTitulo', 'VARCHAR', false, 55, null);
        $this->addColumn('pers_grado', 'PersGrado', 'VARCHAR', false, 55, null);
        $this->addColumn('pers_r_fecha_creacion', 'PersRFechaCreacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('pers_r_fecha_modificacion', 'PersRFechaModificacion', 'TIMESTAMP', false, null, null);
        $this->addColumn('pers_r_usuario', 'PersRUsuario', 'INTEGER', false, null, 1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Escolaridad', '\\Escolaridad', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':pers_c_escolaridad',
    1 => ':esco_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('EstadoCivil', '\\EstadoCivil', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':pers_c_estado_civil',
    1 => ':esci_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Pais', '\\Pais', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':pers_c_pais_origen',
    1 => ':pais_codigo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('TIdentificador', '\\TIdentificador', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':pers_t_identificador',
    1 => ':tide_tipo',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('Direccion', '\\Direccion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':dire_c_persona',
    1 => ':pers_codigo',
  ),
), null, 'CASCADE', 'Direccions', false);
        $this->addRelation('Facilitador', '\\Facilitador', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':faci_c_persona',
    1 => ':pers_codigo',
  ),
), null, 'CASCADE', 'Facilitadors', false);
        $this->addRelation('Trabajador', '\\Trabajador', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':trab_c_persona',
    1 => ':pers_codigo',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersCodigo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersCodigo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersCodigo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersCodigo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersCodigo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PersCodigo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('PersCodigo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? PersonaTableMap::CLASS_DEFAULT : PersonaTableMap::OM_CLASS;
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
     * @return array           (Persona object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PersonaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PersonaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PersonaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PersonaTableMap::OM_CLASS;
            /** @var Persona $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PersonaTableMap::addInstanceToPool($obj, $key);
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
            $key = PersonaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PersonaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Persona $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PersonaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_CODIGO);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_T_IDENTIFICADOR);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_IDENTIFICADOR);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_DV);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_NOMBRE1);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_NOMBRE2);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_APELLIDO_PATERNO);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_APELLIDO_MATERNO);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_SEXO);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_FECHA_NACIMIENTO);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_C_ESTADO_CIVIL);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_C_ESCOLARIDAD);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_C_PAIS_ORIGEN);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_EMAIL);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_MOVIL);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_TITULO);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_GRADO);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_R_FECHA_CREACION);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_R_FECHA_MODIFICACION);
            $criteria->addSelectColumn(PersonaTableMap::COL_PERS_R_USUARIO);
        } else {
            $criteria->addSelectColumn($alias . '.pers_codigo');
            $criteria->addSelectColumn($alias . '.pers_t_identificador');
            $criteria->addSelectColumn($alias . '.pers_identificador');
            $criteria->addSelectColumn($alias . '.pers_dv');
            $criteria->addSelectColumn($alias . '.pers_nombre1');
            $criteria->addSelectColumn($alias . '.pers_nombre2');
            $criteria->addSelectColumn($alias . '.pers_apellido_paterno');
            $criteria->addSelectColumn($alias . '.pers_apellido_materno');
            $criteria->addSelectColumn($alias . '.pers_sexo');
            $criteria->addSelectColumn($alias . '.pers_fecha_nacimiento');
            $criteria->addSelectColumn($alias . '.pers_c_estado_civil');
            $criteria->addSelectColumn($alias . '.pers_c_escolaridad');
            $criteria->addSelectColumn($alias . '.pers_c_pais_origen');
            $criteria->addSelectColumn($alias . '.pers_email');
            $criteria->addSelectColumn($alias . '.pers_movil');
            $criteria->addSelectColumn($alias . '.pers_titulo');
            $criteria->addSelectColumn($alias . '.pers_grado');
            $criteria->addSelectColumn($alias . '.pers_r_fecha_creacion');
            $criteria->addSelectColumn($alias . '.pers_r_fecha_modificacion');
            $criteria->addSelectColumn($alias . '.pers_r_usuario');
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
        return Propel::getServiceContainer()->getDatabaseMap(PersonaTableMap::DATABASE_NAME)->getTable(PersonaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PersonaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PersonaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PersonaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Persona or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Persona object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Persona) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PersonaTableMap::DATABASE_NAME);
            $criteria->add(PersonaTableMap::COL_PERS_CODIGO, (array) $values, Criteria::IN);
        }

        $query = PersonaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PersonaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PersonaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the persona table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PersonaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Persona or Criteria object.
     *
     * @param mixed               $criteria Criteria or Persona object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Persona object
        }

        if ($criteria->containsKey(PersonaTableMap::COL_PERS_CODIGO) && $criteria->keyContainsValue(PersonaTableMap::COL_PERS_CODIGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PersonaTableMap::COL_PERS_CODIGO.')');
        }


        // Set the correct dbName
        $query = PersonaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PersonaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PersonaTableMap::buildTableMap();
