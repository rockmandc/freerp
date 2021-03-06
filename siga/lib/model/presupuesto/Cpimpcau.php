<?php

/**
 * Subclass for representing a row from the 'cpimpcau'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpimpcau.php 46723 2011-11-29 15:55:51Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpimpcau extends BaseCpimpcau
{

   protected $salpcau="0,00";
   
  public function afterHydrate(){
      $disponible = H::Monto_disponible(H::getCodPreDis($this->codpre));
      $this->salpcau= H::FormatoMonto($disponible-$this->monimp);
  }
   
   
	  public function __toString(){
	  	return $this->getRefcau();
	  }
	  
    public function getCodpredis()
    {
      return H::GetCodPreDis($this->getCodpre());
    }
    	  
}
