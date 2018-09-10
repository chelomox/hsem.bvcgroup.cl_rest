<?php

class raRestControllerV1 extends wlRestController {

    public function getDefaultName() {
        return 'ra';
    }
 /**
     * Recibe el hash y la opcion seleccionada para registrar la respuesta
     * 
     * @param char(32) hash (md5)
     * @param int opcion
     * @return array
     */
    protected function dataPost() {
        $aData['data'] = array();
        $aData['status'] = 0;
        $aData['msg'] = "";
        $v = $this->actionParams;
        if (isset($v['hash']) && isset($v['opcion'])) {
            $aData['data'] = array();
            $hash = $v['hash'];
            $opcion = $v['opcion'];
            //validar que la evaluación esté activa.
            $iCount = RespuestaAplicadaQuery::create()->ValidaEvaluacionByHash($hash);
            if($iCount < 1)
            {
                $aData['status'] = 1001;
                $aData['msg'] = "La evaluación no existe o no está activada por el facilitador";
            }else{
                //actualizar la respuesta
                $aData['data'] = RespuestaAplicadaQuery::create()->ActualizaRespuestaEvaluacionByHash($hash, $opcion);
                $aData['msg'] = "Respuesta Actualizada";
            }
            
            
        }else{
            
            $aData['status'] = 1000;
            $aData['msg'] = "Faltan parametros";
        }
        return $aData;
    }

    /**
     * Obtiene las preguntas para presentarlas en la RA
     * 
     * @param int rut
     * @param int c_marcador
     * @return array
     */
    protected function dataGet() {

        $v = $this->actionParams;

        $aData['data'] = array();
        $ReturnPregunta = array();
        $ReturnPersona = array();
        $ReturnCargo = array();
        $ReturnEmpresa = array();

        if (isset($v['rut']) && isset($v['c_marcador'])) {

//            $PersonaQuery = new Persona();

            $PersonaQuery = PersonaQuery::create()
                    ->filterByPersIdentificador($v["rut"])
                    ->findOne();

//            $PersonaQuery = null;
            if (is_null($PersonaQuery)) {
                return "Error: ".__LINE__;
            }

            $ReturnPersona["nom"] = $PersonaQuery->toArray()["PersNombre1"];
            $ReturnPersona["nom2"] = $PersonaQuery->toArray()["PersNombre2"];
            $ReturnPersona["appat"] = $PersonaQuery->toArray()["PersApellidoPaterno"];
            $ReturnPersona["apmat"] = $PersonaQuery->toArray()["PersApellidoMaterno"];
            $ReturnPersona["rut"] = $PersonaQuery->toArray()["PersIdentificador"];
            $ReturnPersona["dv"] = $PersonaQuery->toArray()["PersDv"];

            $aData['data']["Persona"] = $ReturnPersona;

            $TrabajadorQuery = TrabajadorQuery::create()
                    ->filterByTrabCPersona(
                            $PersonaQuery
                            ->toArray()["PersCodigo"]
                    )
                    ->filterByTrabVigente(1)
                    ->findOne();

//            $TrabajadorQuery = null;
            if (is_null($TrabajadorQuery)) {
                return "Error: ".__LINE__;
            }

            $ReturnCargo["Cargo"] = $TrabajadorQuery->getCargo()->getCargDescripcion();
            $ReturnCargo["Especialidad"] = $TrabajadorQuery->getCargo()->getEspecialidad()->getEspeDescripcion();
            $ReturnCargo["Empresa"] = $TrabajadorQuery->getCargo()->getEspecialidad()->getInstitucion()->getInstNombre();

            $aData['data']["Trabajador"] = $ReturnCargo;

            $aData['data']["Marcador"] = $v['c_marcador'];

//            $EvaluacionMarcadorQuery = EvaluacionMarcadorQuery::create()
//                    ->filterByEvmaCMarcador($v['c_marcador'])
//                    ->filterByEvmaVigente(1)
//                    ->findOne();

            $aRespuestaAplicadas = RespuestaAplicadaQuery::create()
                    ->filterByReapCEvaluacion(
                            EvaluacionMarcadorQuery::create()
                            ->filterByEvmaCMarcador($v['c_marcador'])
                            ->filterByEvmaVigente(1)
                            ->findOne()
                            ->toArray()["EvmaCEvaluacion"]
                    )
                    ->filterByReapCTrabajador(
                            $TrabajadorQuery
                            ->toArray()["TrabCodigo"]
                    )
                    ->filterByReapVigente(1)
                    ->find();
            
//            $aRespuestaAplicadas = null;
            if (is_null($aRespuestaAplicadas)) {
                return "Error: ".__LINE__;
            }

//            $RespuestaAplicada = new RespuestaAplicada();
            foreach ($aRespuestaAplicadas as $key => $RespuestaAplicada) {

                $aDetallePregunta = DetallePreguntaQuery::create()
                        ->filterByDeprCPregunta($RespuestaAplicada->getReapCPregunta())
                        ->orderByDeprOrden() // ('desc')
                        ->find();

                $DetallePregunta = new DetallePregunta();

                foreach ($aDetallePregunta as $key => $DetallePregunta) {

                    if (!array_key_exists($DetallePregunta->getPregunta()->getPregCodigo(), $ReturnPregunta)) {
                        
                        $arrayPregunta["hash"] = $RespuestaAplicada
                                ->getReapHashMd5();
                        
                        $arrayPregunta["pregunta"] = $DetallePregunta
                                ->getPregunta()
                                ->getPregDescripcion();
                        
                        $arrayPregunta["contexto"] = $DetallePregunta
                                ->getPregunta()
                                ->getPregContexto();

                        $ReturnPregunta [
                                        $DetallePregunta
                                        ->getPregunta()
                                        ->getPregCodigo()
                                ] = $arrayPregunta;
                    }

//                        var_dump($DetallePregunta->getDeprEsCorrecta());
                        if( $DetallePregunta->getDeprEsCorrecta() )
                        $ReturnPregunta
                            [$DetallePregunta->getPregunta()->getPregCodigo()]["correcta"] = $DetallePregunta->getDeprCOpcionPregunta();
                        

                    $ReturnPregunta
                            [$DetallePregunta->getPregunta()->getPregCodigo()]
                            ["opcion"]
                            [$DetallePregunta->getOpcionPregunta()->getOpprCodigo()] = $DetallePregunta->getOpcionPregunta()->getOpprValor();
                }
            }


            $aData['data']["Preguntas"] = $ReturnPregunta;
        }
        return $aData;
    }

}
