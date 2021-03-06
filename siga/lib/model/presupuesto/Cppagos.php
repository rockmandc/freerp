<?php

/**
 * Subclass for representing a row from the 'cppagos'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cppagos.php 57592 2014-07-03 18:24:50Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cppagos extends BaseCppagos
{
	protected $reflib = '';
	protected $numcue = '';
	protected $salpag = 0.00;
	protected $salaju2 = 0.00;
	protected $totnet = 0.00;
	protected $msganulado = "";
  protected $refer="";
  protected $obj2=array();
  protected $toteve="0,00";


  public function afterHydrate(){
    $this->reflib = Herramientas::getX('refpag','tsmovlib','reflib',self::getRefpag());
    $this->numcue = Herramientas::getX('refpag','tsmovlib','numcue',self::getRefpag());
    $this->salpag = H::FormatoMonto($this->getMonpag() - $this->getSalaju());
    $this->nomext = Herramientas::getX('TIPPAG','Cpdocpag','Nomext',self::getTippag());
    $this->descau = Herramientas::getX_vacio('REFCAU','Cpcausad','Descau',self::getRefcau());
    $this->nomben = Herramientas::getX_vacio('CEDRIF','Opbenefi','Nomben',self::getCedrif());
  }

  public function getRefmov()
  {
    return self::getRefpag();
  }

  public function getMsganulado() {

    if (self::getStapag()=='N')
      return "ANULADO EL ".$this->getFecanu2();
    else
      return "";
  }

  	public function getFecanu2($format = 'd/m/Y') {
  		return parent::getFecanu($format);
  	}

  	public function getSalaju2(){
  		if (parent::getSalaju()<0){
  			return $this->salaju2 = H::FormatoMonto((-1)*parent::getSalaju());
  		}else return $this->salaju2 = H::FormatoMonto(parent::getSalaju());
  	}

        public function getDesdirec()
    {
        return Herramientas::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
    }
}
