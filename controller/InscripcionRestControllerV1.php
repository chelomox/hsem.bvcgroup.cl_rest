<?php

class inscripcionRestControllerV1 extends wlRestController {

    public function getDefaultName() {
        return 'inscripcion';
    }

    private $aOutputInscripcion = array(
            "InscCActividad"
            , "InscNumeroDictacion"
            , "InscCTrabajador"
            , "InscEInscripcion"
            , "InscEFinalizacion"
            , "InscGrupo"
            , "InscAsistencia"
            , "InscNota"
            , "InscResultado"
            , "DictFechaInicio"
            , "DictFechaTermino"
            , "DictEDictacion"
            , "DictValor"
            , "DictCupo"
            , "DictEmail"
            , "DictVigente"
            , "ActiNombre"
            , "PersIdentificador"
            , "PersDv"
            , "PersNombre1"
            , "PersNombre2"
            , "PersApellidoPaterno"
            , "PersApellidoMaterno"
        );

    /**
     * 
     * @return type array
     */
    protected function evaluacionAplicadaByActividadGet() {
        $v = $this->actionParams;
        $v['c_actividad'];
        $v['num_dictacion'];

        // $aEvaluacionAplicada = array();

        $aEvaluacionAplicada = EvaluacionAplicadaQuery::create()
                ->filterByEvapCActividad($v['c_actividad'])
                ->filterByEvapNumeroDictacion($v['num_dictacion'])
                ->find();

        return array("data" => $aEvaluacionAplicada->toArray());
    }

    /**
     * 
     * @return type array
     */
    protected function evaluacionAplicadaByEvaluacionGet() {
        $v = $this->actionParams;
        $v['c_evaluacion'];
        $v['num_evaluacion'];

        // $aEvaluacionAplicada = array();

        $aEvaluacionAplicada = EvaluacionAplicadaQuery::create()
                ->filterByEvapCEvaluacion($v['c_evaluacion'])
                ->filterByEvapNumeroEvaluacion($v['num_evaluacion'])
                ->find();

        return array("data" => $aEvaluacionAplicada->toArray());
    }

    /**
     * Marcelo Aranda Tapia 20180820
     * inscripcionByTrabajador, 
     * @return type array
     */
    protected function inscripcionByTrabajadorGet() {
        $v = $this->actionParams;
        $aData['data'] = array();
        if(isset($v['trab']) && $v['trab'] != null)
        {
            $c_trab = $v['trab'];

            $aInscripcion = InscripcionQuery::create()
                ->filterByInscCTrabajador($c_trab)
                ->find();

                $inscripcion = new inscripcion();
                foreach ($aInscripcion as $inscripcion) {
                        // $inscripcion->getDictacion();
                    //$inscripcion->getDictacion()->setActividad(ActividadQuery::create()->findPK($inscripcion->getInscCActividad()));
                    $inscripcion->getDictacion()->getActividad();
                        $inscripcion->getTrabajador()->setPersona(PersonaQuery::create()->findPK($inscripcion->getTrabajador()->getTrabCPersona()));


                        array_push(
                                $aData["data"], Util::cleanupData(
                                        $inscripcion->toArray(Map\InscripcionTableMap::TYPE_PHPNAME, true, array(), true)
                                        , $this->aOutputInscripcion)
                        );
                    }


//var_dump($aInscripcion);
            // $aData['data'] = $aInscripcion->toArray(Map\InscripcionTableMap::TYPE_PHPNAME, true, array(), true);
        }

        // $aEvaluacionAplicada = array();

        
//        $aData["key"] = $this->getService()->getSettings()->getValue('service_key') ;
        return array($aData);
    }
    
    /**
     * Marcelo Aranda Tapia 20180820
     * inscripcionByTrabajador, 
     * @return type array
     */
    protected function inscripcionPost() {
        $v = $this->actionParams;
        $aData['data'] = array();
        
        if(isset($v['acti']) && isset($v['ndic']) && isset($v['trab']))
        {
            //insertar la inscripcion.
            $oInscripcion = new Inscripcion();
            $oInscripcion->setInscCActividad($v['acti']);
            $oInscripcion->setInscNumeroDictacion($v['ndic']);
            $oInscripcion->setInscCTrabajador($v['trab']);
            $oInscripcion->setInscEInscripcion(1);
            $oInscripcion->setInscGrupo(1);
            $oInscripcion->setInscRFechaCreacion(date("Y-m-d H:i:s"));
            $oInscripcion->setInscRUsuario(1);
            //guarda inscrito
            $iGuardado = 0;
            //si no existe, guarda el registro
            if(!InscripcionQuery::create()->existeInscripcion($oInscripcion))
            {
                $iGuardado = $oInscripcion->save();
                InscripcionEvaluacionAplicadaQuery::create()->insertaInscripcionEvaluacionByInscrito($oInscripcion);
                
            }
            
            array_push($aData["data"], $iGuardado);
        }
        
        return array($aData);
    }

}
