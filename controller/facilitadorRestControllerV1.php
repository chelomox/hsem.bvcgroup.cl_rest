<?php

class facilitadorRestControllerV1 extends wlRestController {

    public function getDefaultName() {
        return 'facilitador';
    }
    
    private $aOutputfacilitadorPersona = array(
            "FaciCActividad"
            , "FaciNumeroDictacion"
            , "FaciCPersona"
            , "PersDv"
            , "PersNombre1"
            , "PersNombre2"
            , "PersApellidoPaterno"
            , "PersApellidoMaterno"
        );

    protected function facilitadorByPersonaGet() {
        $aData['data'] = array();
        $params = $this->actionParams;

// $facilitador = new facilitador();

        if (isset($params['c_persona'])) {
            $iCodPersona = $params['c_persona'];

            $facilitadores = FacilitadorQuery::create()
                    ->filterByfaciCPersona($iCodPersona)
                    ->find();
            
            $facilitador = new Facilitador();
// $facilitadores->toArray(); NO FUNCIONA
            foreach ($facilitadores as $facilitador) {
                //Obtiene al facilitador incluyendo los datos de la actividad.
                $facilitador->getDictacion()->setActividad(ActividadQuery::create()->findPK($facilitador->getFaciCActividad()));
                //obtiene los datos de la persona.
                $facilitador->getPersona();

                //otros intentos fallidos XD
                // $DictacionQuery = DictacionQuery::create()->findPK(array($facilitador->getFaciCActividad(),$facilitador->getFaciNumeroDictacion()));
                // var_dump($DictacionQuery);
                // $facilitadores = ActividadQuery::create()->filterByfaciCPersona($iCodPersona)->find();
                //$facilitador->setDictacion( $facilitador->getDictacion() );
                // $facilitador->setPersona($facilitador->getPersona());
                // var_dump($facilitador);
                // $facilitador->Dictacion($facilitador->getDictacion()->toArray());
                // array_push($aData["data"],$facilitador->toArray($keyType = null, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = null));
                // array_push($aData["data"],$facilitador->toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false);
                // array_push($aData["data"],$facilitador->toArray(Map\FacilitadorTableMap::TYPE_PHPNAME, true, null, TRUE));
                //agrega los datos obteneidos al array de salida JSON
                array_push($aData["data"], $facilitador->toArray());
            }
        }
        return $aData;
    }
    
    //MAT20180822, obtiene facilitadores de una disctacion
    //requiere acti, ndic
    
     protected function facilitadorByDictacionGet() {
        $aData['data'] = array();
        $params = $this->actionParams;
        
        if(isset($params['acti']) && isset($params['ndic']))
        {
            $acti = $params['acti'];
            $ndic = $params['ndic'];
            $oDictacion = new Dictacion();
            $oActividad = new Actividad();
            $oActividad->setActiCodigo($acti);
            $oDictacion->setActividad($oActividad);
            $oDictacion->setDictNumero($ndic);
            $aFacilitadores = FacilitadorQuery::create()->filterByDictacion($oDictacion)
                                ->find();
            
            $facilitador = new facilitador();
            foreach ($aFacilitadores as $facilitador) {
                    $facilitador->getPersona();
                    array_push(
                                $aData["data"], Util::cleanupData(
                                        $facilitador->toArray(Map\FacilitadorTableMap::TYPE_PHPNAME, true, array(), true)
                                        , $this->aOutputfacilitadorPersona)
                        );
            }
            
        }
        return $aData;
     }

}
