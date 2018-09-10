<?php

use Base\InscripcionQuery as BaseInscripcionQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'inscripcion' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class InscripcionQuery extends BaseInscripcionQuery
{
    public function existeInscripcion(inscripcion $oInscripcion)
    {
        $codActi = $oInscripcion->getInscCActividad();
        $codNumDic = $oInscripcion->getInscNumeroDictacion();
        $codTrab = $oInscripcion->getInscCTrabajador();
        $iContReg = count(InscripcionQuery::create()->findPk(array($codActi,$codNumDic,$codTrab)));
        //echo "iContReg:".$iContReg;
        if ($iContReg === 1)
        {
            return true;
        }
        return false;
        
    }
}
