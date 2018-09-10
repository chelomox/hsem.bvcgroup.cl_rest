<?php

class trabajadorRestControllerV1 extends wlRestController {

    public function getDefaultName() {
        return 'trabajador';
    }
    
    private $aOutputTrabajador = array(
            "TrabCodigo"
            , "TrabCPersona"
            , "TrabCCargo"
            , "TrabCGerencia"
            , "TrabCArea"
            , "TrabCAniosExperienciaCargo"
            , "TrabFechaInicio"
            , "TrabFechaTermino"
            , "TrabVigente"
            , "PersCodigo"
            , "PersIdentificador"
            , "PersDv"
            , "PersNombre1"
            , "PersNombre2"
            , "PersApellidoPaterno"
            , "PersApellidoMaterno"
            , "PersSexo"
            , "CargDescripcion"
        );
    
      /**
     * Marcelo Aranda Tapia 20180820, obtiene trabajar vigente a partir del rut
     * trabajadorVigenteByRutGet, 
     * @return type array
     */
    protected function trabajadorVigenteByRutGet() {
        $v = $this->actionParams;
        $aData['data'] = array();
        if(isset($v['rut']))
        {
            $aTrabajador = TrabajadorQuery::create()
                            ->filterByTrabVigente(1)
                            ->usePersonaQuery()
                                ->filterByPersIdentificador($v['rut'])
                            ->endUse()
                            ->find();
            $trabajador = new trabajador();
            foreach ($aTrabajador as $trabajador) {
                $trabajador->getPersona();
                $trabajador->getCargo();
                array_push(
                                $aData["data"], Util::cleanupData(
                                        $trabajador->toArray(Map\TrabajadorTableMap::TYPE_PHPNAME, true, array(), true)
                                        , $this->aOutputTrabajador)
                        );
            }
        }
        
        return array($aData);
    }
    
}

