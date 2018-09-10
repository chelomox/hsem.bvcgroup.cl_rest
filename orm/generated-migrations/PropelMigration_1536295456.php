<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1536295456.
 * Generated on 2018-09-07 06:44:16 
 */
class PropelMigration_1536295456
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
		$sql = 'UPDATE `respuesta_aplicada` SET `reap_hash_md5` = MD5(CONCAT( CONVERT(`reap_c_actividad`,CHAR), "_" ,CONVERT(`reap_numero_dictacion`,CHAR), "_" ,CONVERT(`reap_numero_evaluacion`,CHAR),"_" ,CONVERT(`reap_c_trabajador`,CHAR), "_" ,CONVERT(`reap_c_pregunta`,CHAR), "_" ,CONVERT(`reap_c_opcion_pregunta`,CHAR) ) )';
		$pdo = $manager->getAdapterConnection('default');
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
	
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;


ALTER TABLE `respuesta_aplicada`

  DROP PRIMARY KEY,

  ADD `reap_hash_md5` CHAR(32) AFTER `reap_vigente`,

  ADD PRIMARY KEY (`reap_c_actividad`,`reap_numero_dictacion`,`reap_c_evaluacion`,`reap_numero_evaluacion`,`reap_c_trabajador`,`reap_c_pregunta`);

ALTER TABLE `respuesta_aplicada` ADD CONSTRAINT `respuesta_aplicada_pregunta`
    FOREIGN KEY (`reap_c_pregunta`)
    REFERENCES `pregunta` (`preg_codigo`)
    ON UPDATE CASCADE;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `respuesta_aplicada` DROP FOREIGN KEY `respuesta_aplicada_pregunta`;

ALTER TABLE `respuesta_aplicada`

  DROP PRIMARY KEY,

  DROP `reap_hash_md5`,

  ADD PRIMARY KEY (`reap_c_actividad`,`reap_numero_dictacion`,`reap_c_evaluacion`,`reap_numero_evaluacion`,`reap_c_trabajador`,`reap_c_pregunta`,`reap_c_opcion_pregunta`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}