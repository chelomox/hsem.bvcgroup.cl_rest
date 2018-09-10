<?php

class evaluacionAplicadaRestControllerV1 extends wlRestController {

    public function getDefaultName() {
        return 'evaluacionAplicada';
    }

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

}
