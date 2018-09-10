<?php

class respuestaAplicadaRestControllerV1 extends wlRestController {

    private $aOutputDetallePregunta = array(
//        "DeprCPregunta"
//        , "DeprCOpcionPregunta"
//        ,
        "OpprCodigo"
        , "OpprValor"
        , "PregCodigo"
        , "PregTPregunta"
        , "PregContexto"
        , "PregDescripcion"
    );

    public function getDefaultName() {
        return 'reap';
    }

    protected function pregGet() {
        $aData['data'] = array();
        $v = $this->actionParams;
//        $v['eval'];

        if (isset($v['eval'])) {

            $RespuestaAplicadas = RespuestaAplicadaQuery::create()
                    ->filterByReapCActividad($v['acti'])
                    ->filterByReapNumeroDictacion($v['ndic'])
                    ->filterByReapCEvaluacion($v['eval'])
                    ->filterByReapNumeroDictacion($v['neva'])
                    ->filterByReapCTrabajador($v['trab'])
                    ->find();

            foreach ($RespuestaAplicadas as $RespuestaAplicada) {

                $aDetallePregunta = DetallePreguntaQuery::create()
                        ->filterByDeprCPregunta($RespuestaAplicada->getReapCPregunta())
                        ->find();

                $DetallePregunta = new DetallePregunta();

                foreach ($aDetallePregunta as $DetallePregunta) {
                    $DetallePregunta->getPregunta();
                    $DetallePregunta->getOpcionPregunta();


                    array_push(
                            $aData["data"], Util::cleanupData(
                                    $DetallePregunta->toArray(Map\DetallePreguntaTableMap::TYPE_PHPNAME, true, array(), true), $this->aOutputDetallePregunta
                            )
                    );
                }
            }
        }
        return $aData;
    }

}
