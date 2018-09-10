<?php

use Base\InscripcionEvaluacionAplicadaQuery as BaseInscripcionEvaluacionAplicadaQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'inscripcion_evaluacion_aplicada' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 * 
 */
class InscripcionEvaluacionAplicadaQuery extends BaseInscripcionEvaluacionAplicadaQuery
{
    /*
     * Marcelo Aranda 20180828, se agrega insertaInscripcionEvaluacionByInscrito para registrar las evaluaciones
     */
    
    public function insertaInscripcionEvaluacionByInscrito(inscripcion $oInscripcion)
    {
        $codActividad = $oInscripcion->getInscCActividad();
        $numDictacion = $oInscripcion->getInscNumeroDictacion();
        $codTrab = $oInscripcion->getInscCTrabajador();
        $aEvaluacionAplicada = EvaluacionAplicadaQuery::create()
                ->filterByEvapCActividad($codActividad)
                ->filterByEvapNumeroDictacion($numDictacion)
                ->find();
        $oEvaluacionAplicada = new EvaluacionAplicada();
        foreach ($aEvaluacionAplicada as $oEvaluacionAplicada) {
            $codEvaluacion = $oEvaluacionAplicada->getEvapCEvaluacion();
            $numEvaluacion = $oEvaluacionAplicada->getEvapNumeroEvaluacion();
            //$tipoEval = $oEvaluacionAplicada->getEvaluacion()->getEvalTEvaluacion();
            
            $oInscripcionEvaluacionAplicada = new InscripcionEvaluacionAplicada();
            $oInscripcionEvaluacionAplicada->setInevapCActividad($codActividad);
            $oInscripcionEvaluacionAplicada->setInevapNumeroDictacion($numDictacion);
            $oInscripcionEvaluacionAplicada->setInevapCTrabajador($codTrab);
            $oInscripcionEvaluacionAplicada->setInevapCEvaluacion($codEvaluacion);
            $oInscripcionEvaluacionAplicada->setInevapNumeroEvaluacion($numEvaluacion);
            $oInscripcionEvaluacionAplicada->setInevapEInscripcionEvaluacionAplicada(1); //pendiente respuesta
            
            //valida si existe registro en INSCRIPCION_EVALUACION_APLICADA
            if(!$this->existeInscripcionEvaluacionAplicada($oInscripcionEvaluacionAplicada))
            {
                //sino existe se inserta el registro en INSCRIPCION_EVALUACION_APLICADA
                $oInscripcionEvaluacionAplicada->save();
                //llamar a la inserción de RESPUESTA_APLICADA
                RespuestaAplicadaQuery::create()->insertaRespuestaAplicadaByInscEvalApli($oInscripcionEvaluacionAplicada);
            }
            
        }
    }
    
    public function existeInscripcionEvaluacionAplicada(InscripcionEvaluacionAplicada $oInscripcionEvaluacionAplicada)
    {
//        $oInscripcion = $oInscripcionEvaluacionAplicada->getInscripcion();
        $codActividad = $oInscripcionEvaluacionAplicada->getInevapCActividad();
        $numDictacion = $oInscripcionEvaluacionAplicada->getInevapNumeroDictacion();
        $codTrab = $oInscripcionEvaluacionAplicada->getInevapCTrabajador();
//        $oEvaluacionAplicada = $oInscripcionEvaluacionAplicada->getEvaluacionAplicada();
        $codEvaluacion = $oInscripcionEvaluacionAplicada->getInevapCEvaluacion();
        $numEvaluacion = $oInscripcionEvaluacionAplicada->getInevapNumeroEvaluacion();
        //$tipoEval = $oEvaluacionAplicada->getEvaluacion()->getEvalTEvaluacion();
        $iContReg = count(InscripcionEvaluacionAplicadaQuery::create()->findPk(array($codActividad, $numDictacion, $codEvaluacion, $numEvaluacion, $codTrab)));
        
        if ($iContReg === 1)
        {
            return true;
        }
        return false;
        
    }

}
