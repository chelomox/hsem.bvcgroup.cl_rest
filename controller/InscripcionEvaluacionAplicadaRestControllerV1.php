<?php

class InscripcionEvaluacionAplicadaRestControllerV1 extends wlRestController {

    public function getDefaultName() {
        return 'inevap';
    }
    
    private $aOutputInscripcionEvaluacionAplicada = array(
            "InevapCActividad"
            , "InevapNumeroDictacion"
            , "InevapCEvaluacion"
            , "InevapNumeroEvaluacion"
            , "InevapCTrabajador"
            , "InevapEInscripcionEvaluacionAplicada"
            , "InevapVigente"
            , "EieaEstado"
            , "EieaDescripcion"
            , "EvapTitulo"
            , "EvapDescripcion"
            , "EvapOrden"
            , "EvapEEvaluacionAplicada"
            , "EevaEstado"
            , "EevaDescripcion"
            , "EevaVigente"
            , "EvapTEvaluacionAplicada"
            , "TevaTipo"
            , "TevaDescripcion"
        );
    
    protected function ByDictacionTrabajadorGet(){
        $aData['data'] = array();
        $v = $this->actionParams;
        if(isset($v['acti']))
        {
            $aInscEvalApli = InscripcionEvaluacionAplicadaQuery::create()
                ->filterByInevapCActividad($v['acti'])
                ->filterByInevapCTrabajador($v['trab'])
                ->filterByInevapNumeroDictacion($v['ndic'])
                ->find();
            $oInscripcionEvaluacionAplicada = new InscripcionEvaluacionAplicada();
            foreach ($aInscEvalApli as $oInscripcionEvaluacionAplicada) {
                $oInscripcionEvaluacionAplicada->getEInscripcionEvaluacionAplicada();
                $oInscripcionEvaluacionAplicada->getEvaluacionAplicada();
                $oInscripcionEvaluacionAplicada->getEvaluacionAplicada()->getEEvaluacionAplicada();
                $oInscripcionEvaluacionAplicada->getEvaluacionAplicada()->getEvaluacion();
                $oInscripcionEvaluacionAplicada->getEvaluacionAplicada()->getTEvaluacionAplicada();
                
                array_push(
                    $aData["data"], Util::cleanupData(
                            $oInscripcionEvaluacionAplicada->toArray(Map\InscripcionEvaluacionAplicadaTableMap::TYPE_PHPNAME, true, array(), true), $this->aOutputInscripcionEvaluacionAplicada
                    )
                );
            }
        }
           return $aData;
    }

    /**
     * 
     * @return type array
     */
    protected function ByPKGet() {
        $v = $this->actionParams;
//        $v['acti'];
//        $v['ndic'];
//        $v['eval'];
//        $v['neva'];
//        $v['trab'];

        // $aEvaluacionAplicada = array();

        $ret = InscripcionEvaluacionAplicadaQuery::create()
                ->findPk(array($v['acti'],$v['ndic'],$v['eval'],$v['neva'],$v['trab']))
                ->useEvaluacion
                ;

        return array("data" => $ret->toArray());
    }


}
