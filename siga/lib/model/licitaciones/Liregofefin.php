<?php

/**
 * Subclase para representar una fila de la tabla 'liregofefin'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Liregofefin extends BaseLiregofefin
{
    public function getDescri()
    {
        return H::GetX('Codcri','Liaspfincrieva','Descri',$this->codcri);
    }
    public function getLimit()
    {
        $c = new Criteria();
        $c->add(LiregofePeer::NUMOFE,$this->numofe);
        $c->addJoin(LipliecrifinPeer::NUMEXP,  LiregofePeer::NUMEXP);
        $c->add(LipliecrifinPeer::CODCRI,$this->codcri);
        $per = LipliecrifinPeer::doSelectOne($c);
        if($per)
            return $per->getLimita()!='S' ? 'NO' : 'SI';
        else
            return '';
    }
}
