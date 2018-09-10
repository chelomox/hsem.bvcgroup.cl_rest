<?php

use Base\RespuestaAplicadaQuery as BaseRespuestaAplicadaQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'respuesta_aplicada' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class RespuestaAplicadaQuery extends BaseRespuestaAplicadaQuery
{
    public function insertaRespuestaAplicadaByInscEvalApli(InscripcionEvaluacionAplicada $oInscripcionEvaluacionAplicada)
    {
        if(!$this->existeRespuestaAplicadaByIcEvalApli($oInscripcionEvaluacionAplicada))
        {
            //echo  "no existe <br>";
            $this->insertaRespuestaAplicadaByTipoEval($oInscripcionEvaluacionAplicada);
        }
    }
    
    public function existeRespuestaAplicadaByIcEvalApli(InscripcionEvaluacionAplicada $oInscripcionEvaluacionAplicada)
    {
        $codActividad = $oInscripcionEvaluacionAplicada->getInevapCActividad();
        $numDictacion = $oInscripcionEvaluacionAplicada->getInevapNumeroDictacion();
        $codTrab = $oInscripcionEvaluacionAplicada->getInevapCTrabajador();
        $codEvaluacion = $oInscripcionEvaluacionAplicada->getInevapCEvaluacion();
        $numEvaluacion = $oInscripcionEvaluacionAplicada->getInevapNumeroEvaluacion();
        
        $iContReg = RespuestaAplicadaQuery::create()
                ->filterByArray(array("ReapCActividad"=>$codActividad
                ,"ReapNumeroDictacion"=> $numDictacion
                ,"ReapCEvaluacion"=> $codEvaluacion
                ,"ReapNumeroEvaluacion"=>  $numEvaluacion
                ,"ReapCTrabajador"=>  $codTrab))
                ->count();

        if ($iContReg > 0)
        {
            return true;
        }
        return false;
        
    }
    
    public function insertaRespuestaAplicadaByTipoEval(InscripcionEvaluacionAplicada $oInscripcionEvaluacionAplicada)
    {
        $tipoEval = $oInscripcionEvaluacionAplicada->getEvaluacionAplicada()->getEvaluacion()->getEvalTEvaluacion(); 
        
        switch ($tipoEval)
        {
            case 1:     //sin informacion
                break;
            case 2:  //echo "teorica<br>";   //teorica
                $this->insertaRespuestaAplicadaByTipoEvalTeorica($oInscripcionEvaluacionAplicada);
                break;
            case 3:   //echo "practica<br>";   //practica
                break;
            case 4:  //echo "encuesta<br>";    //encuesta
                $this->copiaEvaluacion($oInscripcionEvaluacionAplicada);
                break;
            
        }
    }
    
    public function insertaRespuestaAplicadaByTipoEvalTeorica(InscripcionEvaluacionAplicada $oInscripcionEvaluacionAplicada)
    {
        $numEvaluacion = $oInscripcionEvaluacionAplicada->getInevapNumeroEvaluacion();
        
        if($numEvaluacion == 1)
        {
            $this->generaEvaluacionTeorica($oInscripcionEvaluacionAplicada);
        }else{
            $this->copiaRespuestaAplicada($oInscripcionEvaluacionAplicada);
        }
    }
    
    public function generaEvaluacionTeorica(InscripcionEvaluacionAplicada $oInscripcionEvaluacionAplicada)
    {
        $codActividad = $oInscripcionEvaluacionAplicada->getInevapCActividad();
        $numDictacion = $oInscripcionEvaluacionAplicada->getInevapNumeroDictacion();
        $codTrab = $oInscripcionEvaluacionAplicada->getInevapCTrabajador();
        $codEvaluacion = $oInscripcionEvaluacionAplicada->getInevapCEvaluacion();
        $numEvaluacion = $oInscripcionEvaluacionAplicada->getInevapNumeroEvaluacion();
        
        //obtener objetivos y cantidad de preguntas
        $aActividadObjetivo = ActividadObjetivoQuery::create()
                ->filterByAcobCActividad($codActividad)
                ->find();
        $oActividadObjetivo = new ActividadObjetivo();
        foreach ($aActividadObjetivo as $oActividadObjetivo) {
            $codObjetivo = $oActividadObjetivo->getAcobCObjetivo();
            $cantPreguntas = $oActividadObjetivo->getAcobCantidadPreguntas();
            $conPreguntas = \Propel\Runtime\Propel::getWriteConnection(\Map\RespuestaAplicadaTableMap::DATABASE_NAME);
            $sqlEvalPreg = "INSERT INTO RESPUESTA_APLICADA "
                    . "(reap_c_actividad"
                    . ",reap_numero_dictacion"
                    . ",reap_c_evaluacion"
                    . ",reap_numero_evaluacion"
                    . ",reap_c_trabajador"
                    . ",reap_c_pregunta"
                    . ",reap_c_opcion_pregunta"
                    . ",reap_e_respuesta_aplicada"
                    . ",reap_vigente"
                    . ",reap_r_fecha_creacion)"
                    . " SELECT "
                    .$codActividad." as reap_c_actividad"
                    .",".$numDictacion." as reap_numero_dictacion"
                    .",".$codEvaluacion." as reap_c_evaluacion"
                    .",".$numEvaluacion." as reap_numero_evaluacion"
                    .",".$codTrab." as reap_c_trabajador"
                    .",evpr_c_pregunta as reap_c_pregunta"
                    .",NULL as reap_c_opcion_pregunta"
                    .",1 as reap_e_respuesta_aplicada"
                    .",1 as reap_vigente"
                    .",now() as reap_r_fecha_creacion"
                    . " FROM evaluacion_pregunta "
                    . "where `evpr_c_evaluacion` = $codEvaluacion "
                    . "and `evpr_c_objetivo` = $codObjetivo "
                    . "ORDER BY RAND() LIMIT $cantPreguntas";
            //echo $sql."---";
            $stmtEvalPreg = $conPreguntas->prepare($sqlEvalPreg);
            /*$resSQl = $stmt->execute(array(':cEval' => $codEvaluacion
                                            ,':cObj' => $codObjetivo
                                            ,':cantPreg' => $cantPreguntas));*/
            $stmtEvalPreg->execute();
        }
    }
    
    public function copiaRespuestaAplicada(InscripcionEvaluacionAplicada $oInscripcionEvaluacionAplicada)
    {
        $codActividad = $oInscripcionEvaluacionAplicada->getInevapCActividad();
        $numDictacion = $oInscripcionEvaluacionAplicada->getInevapNumeroDictacion();
        $codTrab = $oInscripcionEvaluacionAplicada->getInevapCTrabajador();
        $codEvaluacion = $oInscripcionEvaluacionAplicada->getInevapCEvaluacion();
        $numEvaluacion = $oInscripcionEvaluacionAplicada->getInevapNumeroEvaluacion();
        
        $sqlRespApli = "INSERT INTO RESPUESTA_APLICADA "
                . "(reap_c_actividad"
                . ",reap_numero_dictacion"
                . ",reap_c_evaluacion"
                . ",reap_numero_evaluacion"
                . ",reap_c_trabajador"
                . ",reap_c_pregunta"
                . ",reap_c_opcion_pregunta"
                . ",reap_e_respuesta_aplicada"
                . ",reap_vigente"
                . ",reap_r_fecha_creacion)"
                . " SELECT reap_c_actividad"
                . ", reap_numero_dictacion"
                . ", reap_c_evaluacion"
                . ", $numEvaluacion as reap_numero_evaluacion"
                . ", reap_c_trabajador"
                . ", reap_c_pregunta"
                . ", reap_c_opcion_pregunta"
                . ", 1 as reap_e_respuesta_aplicada"
                . ", 1 as reap_vigente"
                . ", now() as reap_r_fecha_creacion "
                . " FROM respuesta_aplicada"
                . " where reap_c_actividad = $codActividad "
                . " and reap_numero_dictacion = $numDictacion"
                . " and reap_c_evaluacion = $codEvaluacion"
                . " and reap_numero_evaluacion = 1"
                . " and reap_c_trabajador = $codTrab";
        $conRespApli = \Propel\Runtime\Propel::getWriteConnection(\Map\RespuestaAplicadaTableMap::DATABASE_NAME);
        $stmtRespApli = $conRespApli->prepare($sqlRespApli);
        $stmtRespApli->execute();
        
    }
    
    /*
     * Marcelo Aranda, a partir de una EVALUACION se copian sus registros a RESPUESTA_APLICADA
     */
    public function copiaEvaluacion(InscripcionEvaluacionAplicada $oInscripcionEvaluacionAplicada)
    {
        $codActividad = $oInscripcionEvaluacionAplicada->getInevapCActividad();
        $numDictacion = $oInscripcionEvaluacionAplicada->getInevapNumeroDictacion();
        $codTrab = $oInscripcionEvaluacionAplicada->getInevapCTrabajador();
        $codEvaluacion = $oInscripcionEvaluacionAplicada->getInevapCEvaluacion();
        $numEvaluacion = $oInscripcionEvaluacionAplicada->getInevapNumeroEvaluacion();
        
        $sqlRespApli = "INSERT INTO RESPUESTA_APLICADA "
                . "(reap_c_actividad"
                . ",reap_numero_dictacion"
                . ",reap_c_evaluacion"
                . ",reap_numero_evaluacion"
                . ",reap_c_trabajador"
                . ",reap_c_pregunta"
                . ",reap_c_opcion_pregunta"
                . ",reap_e_respuesta_aplicada"
                . ",reap_vigente"
                . ",reap_r_fecha_creacion)" 
                . " SELECT "
                    .$codActividad." as reap_c_actividad"
                    .",".$numDictacion." as reap_numero_dictacion"
                    .",".$codEvaluacion." as reap_c_evaluacion"
                    .",".$numEvaluacion." as reap_numero_evaluacion"
                    .",".$codTrab." as reap_c_trabajador"
                    .",evpr_c_pregunta as reap_c_pregunta"
                    .",NULL as reap_c_opcion_pregunta"
                    .",1 as reap_e_respuesta_aplicada"
                    .",1 as reap_vigente"
                    .",now() as reap_r_fecha_creacion"
                    . " FROM evaluacion_pregunta "
                    . "where `evpr_c_evaluacion` = $codEvaluacion ";
        //echo "sqlRespApli:".$sqlRespApli;
        $conRespApli = \Propel\Runtime\Propel::getWriteConnection(\Map\RespuestaAplicadaTableMap::DATABASE_NAME);
        $stmtRespApli = $conRespApli->prepare($sqlRespApli);
        $stmtRespApli->execute();
    }
    
    //valida por hash si está activa la evaluacion
    public function ValidaEvaluacionByHash($hash)
    {
        $sqlValEvalByHash = "SELECT count(1) as iCont FROM respuesta_aplicada as reap"
                . " INNER JOIN evaluacion_aplicada as evap on"
                . " ("
                . " reap.reap_c_actividad = evap.evap_c_actividad"
                . " and reap.reap_numero_dictacion = evap.evap_numero_dictacion"
                . " and reap.reap_c_evaluacion = evap.evap_c_evaluacion"
                . " and reap.reap_numero_evaluacion = evap.evap_numero_evaluacion"
                . " )"
                . " where reap.reap_hash_md5 = \"$hash\""
                . " and evap.evap_e_evaluacion_aplicada = 2";
        $conRespApli = \Propel\Runtime\Propel::getWriteConnection(\Map\RespuestaAplicadaTableMap::DATABASE_NAME);
        $stmtRespApli = $conRespApli->prepare($sqlValEvalByHash);
        $stmtRespApli->execute();
        foreach ($stmtRespApli->fetchAll(PDO::FETCH_ASSOC) as $regValRespApli) {
           return $regValRespApli['iCont'];
        }
        return 0;
    
    }
    
    //valida por hash si está activa la evaluacion
    public function ActualizaRespuestaEvaluacionByHash($hash,$opcion)
    {
        $sqlValEvalByHash = "UPDATE respuesta_aplicada "
                . " SET reap_c_opcion_pregunta = $opcion"
                . " , reap_e_respuesta_aplicada = 2"
                . " where reap_hash_md5 = '$hash'";
        $conRespApli = \Propel\Runtime\Propel::getWriteConnection(\Map\RespuestaAplicadaTableMap::DATABASE_NAME);
        $stmtRespApli = $conRespApli->prepare($sqlValEvalByHash);
        $stmtRespApli->execute();
        return $stmtRespApli->rowCount();
        
    }

}
