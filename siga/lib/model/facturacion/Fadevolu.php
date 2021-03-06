<?php

/**
 * Subclass for representing a row from the 'fadevolu'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fadevolu.php 58404 2014-08-26 18:56:34Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fadevolu extends BaseFadevolu
{
	public $obj = array();

	protected $codpro = '';
        protected $pasuse="";

 /*public function afterHydrate()
  {
     $c = new Criteria();
     $c->add(CadphartPeer::DPHART,self::getRefdes());
     $datos = CadphartPeer::doSelectOne($c);

    if ($datos->getTipdph() == 'P'){
            $c1 = new Criteria();
            $c1->add(FapedidoPeer::NROPED, self::getCodref());
            $reg1 = FapedidoPeer::doSelectOne($c1);
            if ($reg1){
                    $this->codpro = $reg1->getCodcli();
            }
    }
    else if ($datos->getTipdph() == 'R'){
            $c1 = new Criteria();
            $c1->add(CadphartPeer::DPHART,self::getRefdes());
            $reg1 = CadphartPeer::doSelectOne($c);
            if ($reg1){
                    $this->codpro = $reg1->getCodcli();
            }
    }
    else if ($datos->getTipdph() == 'F'){
            $c1 = new Criteria();
            $c1->add(FafacturPeer::REFFAC, self::getCodref());
            $reg1 = FafacturPeer::doSelectOne($c1);
            if ($reg1){
                    $this->codpro = $reg1->getCodcli();
            }
    }
  }*/

	public function getCodpro()
    {
      $codpro = '';
        $c = new Criteria();
  		$c->add(CadphartPeer::DPHART,self::getRefdes());
  		$datos = CadphartPeer::doSelectOne($c);

  		if ($datos){
			if ($datos->getTipdph() == 'R'){
				$codpro = $datos->getCodcli();
			}
			else if ($datos->getTipref() == 'P'){
				$c1 = new Criteria();
				$c1->add(FapedidoPeer::NROPED, $datos->getReqart());
				$reg1 = FapedidoPeer::doSelectOne($c1);
				if ($reg1){
					$codpro = $reg1->getCodcli();
				}
			}
			else if ($datos->getTipref() == 'F'){
				$c1 = new Criteria();
				$c1->add(FafacturPeer::REFFAC, $datos->getReqart());
				$reg1 = FafacturPeer::doSelectOne($c1);
				if ($reg1){
					$codpro = $reg1->getCodcli();
				}
			}
  		}
  		else{
  			$codpro = '';
  		}

        return $codpro;
    }

	public function getRifpro()
    {
        return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodpro());
    }

    public function getNompro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodpro());
    }

    public function getDirpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Dirpro',self::getCodpro());
    }

    public function getTelpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Telpro',self::getCodpro());
    }
    
        public function getNomalm()
    {
	  return Herramientas::getX('CODALM','Cadefalm','Nomalm',$this->getCodalm());
    }

    public function getDesdirec()
    {
        return H::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
    }    

  public function getEstatus()
  {
    if ($this->stadph=='N') return 'Devolución Anulada  el '.date('d/m/Y',strtotime(self::getFecanu()));
    else return '';
  }

  
}
