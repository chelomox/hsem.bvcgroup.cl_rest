<?php


class dictacionRestControllerV1 extends wlRestController {

    public function getDefaultName() {
        return 'dictacion';
    }

    protected function dictacionGet() {
         $aData['data'] = array();
         
         $dictacion = new Dictacion();
            $aDictaciones = $oDictacionSql->queryAll();
            $oDictacion = new Dictacion();
            $oEstadoDictacion = new EDictacion();
            foreach($aDictaciones as $clave => $oDictacion)
            {
                $iEstadoDictacion = $oDictacion->dictEDictacion;
                $oEstadoDictacionSQL = new EDictacionMySqlExtDAO();
                $oEstadoDictacion = $oEstadoDictacionSQL->load($iEstadoDictacion);
                //var_dump($oEstadoDictacion);
                $oDictacion->oEDictacion = $oEstadoDictacion;
                //actividd
                $iCodActividad = $oDictacion->dictCActividad;
                $iNumDictacion = $oDictacion->dictNumero;
                $oActividad = new ActividadMySqlExtDAO();
                $oDictacion->oActividad = $oActividad->load($iCodActividad);
                $oInscripcionSql = new InscripcionMySqlExtDAO();
                $aCuentaInscritos = $oInscripcionSql->__cuentaInscripcionByDictacion($iCodActividad, $iNumDictacion);
                //var_dump($aCuentaInscritos);
                $oDictacion->iCantidadInscritos = $aCuentaInscritos[0]['CUENTA_INSCRIPCION'];
                $aDictaciones[$clave] = $oDictacion;
                
            }
            $aData['data'] = $aDictaciones;
            return $aData;
    }
    
    
    
}
