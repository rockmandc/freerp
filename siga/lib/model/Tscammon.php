<?php

/**
 * Subclase para representar una fila de la tabla 'tscammon'.
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
class Tscammon extends BaseTscammon
{
    
    public function getNommon()
    {
        return H::GetX('Codmon','Tsdesmon','Nommon',$this->codmon);
    }

    public function getFeccam()
    {
        return date('d/m/Y H:i:s',strtotime(self::getFecmon()));
    }

    public function getValcam()
    {
        return self::getValmon();
    }

     public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,6,',','.');
    else return $this->valmon;

  }
  
    public function setValmon($v)
    {

        if ($this->valmon !== $v) {
            $this->valmon = Herramientas::toFloat($v,6);
            $this->modifiedColumns[] = TscammonPeer::VALMON;
          }  
    } 
}
