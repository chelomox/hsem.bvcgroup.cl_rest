<?php

class evaluacionPreguntaRestControllerV1 extends wlRestController {

    public function getDefaultName() {
        return 'evpr';
    }

    protected function ByEvalGet() {
        $aData['data'] = array();
        $v = $this->actionParams;

        if (isset($v['eval'])) {

            $ret = Base\EvaluacionPreguntaQuery::create()
                    ->filterByEvprCEvaluacion($v['eval'])
                    ->find();

            array_push($aData["data"], $ret->toArray());
        }
        return $aData;
    }

}
