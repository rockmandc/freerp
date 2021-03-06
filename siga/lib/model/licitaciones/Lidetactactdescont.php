<?php

/**
 * Subclase para representar una fila de la tabla 'lidetactactdescont'.
 *
 * Detalle de la actas por analisis de actuación y desempeño del contrato
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Lidetactactdescont extends BaseLidetactactdescont
{
  public function getCodtipact()
  {
    if(!$this->aLiactas) $this->getLiactas ();

    if($this->aLiactas){
      $c= new Criteria();
      $c->add(LitipactPeer::CODTIPACT,$this->aLiactas->getCodtipact());
      $tipact = LitipactPeer::doSelectOne($c);
      if($tipact) return $tipact->getCodtipact();
      else return '';
    }
    else return '';

  }

  public function getNomtipact()
  {
    if(!$this->aLiactas) $this->getLiactas ();

    if($this->aLiactas){
      $c= new Criteria();
      $c->add(LitipactPeer::CODTIPACT,$this->aLiactas->getCodtipact());
      $tipact = LitipactPeer::doSelectOne($c);
      if($tipact) return $tipact->getNomtipact();
      else return '';
    }
    else return '';

  }

  public function getFecreg($val)
  {
    if(!$this->aLiactas) $this->getLiactas ();

    if($this->aLiactas){
      return $this->aLiactas->getFecreg($val);
    }
    else return '';

  }
}
