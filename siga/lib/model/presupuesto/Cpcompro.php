<?php

/**
 * Subclass for representing a row from the 'cpcompro'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpcompro.php 58086 2014-08-06 15:36:21Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpcompro extends BaseCpcompro {

	protected $obj = array();
	protected $check = "0";
	protected $check2 = "0";
    protected $nompro = "";
    protected $salcom = "0,00";
    protected $msganulado = "";
    protected $fecdes="";
    protected $fechas="";
    protected $cadenafec="";
    protected $tipnom="";
    protected $nomina="";
    protected $fecnom="";
    protected $gasto="";
    protected $banco="";
    protected $nomespecial="";
    protected $codnomesp="";
    protected $tipapo="";
    protected $refprcc="";
    protected $detprecom="";
    protected $obj2 = array();
    protected $toteve = "0,00";
    protected $check3 = "0";
    protected $refcomd="";
    protected $refcomh="";
    protected $numcal="";
    protected $monaju = "0,00";


    public function afterHydrate() {
		$this->nompro = Herramientas::getX('RIFPRO','Caprovee','Nompro',self::getCedrif());
		$this->salcom = H::FormatoMonto($this->getMoncom() - $this->getSalaju());
		//$this->nomext = Herramientas::getX_vacio('TIPCOM','Cpdoccom','Nomext',$this->tipcom);
		//$this->desprc = Herramientas::getX_vacio('REFPRC','Cpprecom','Desprc',self::getRefprc());
		//$this->nomben = Herramientas::getX_vacio('CEDRIF','Opbenefi','Nomben',self::getCedrif());
    $this->cadenafec= date('d/m/Y',  strtotime(self::getFeccom()));
    if (self::getAprcom()=='N')
      $this->check3="1";
    else if (self::getAprcom()=='S')
      $this->check="1";
    else if (self::getAprcom()=='R')
      $this->check2="1";

    $this->numcal=H::getX_vacio('REFCOM','Viacalviatra','Numcal',self::getRefcom());
    
      $result=array();
      /*$sql="select coalesce(sum(monaju),0) as monaju from 
      cpimpcom where refcom='".self::getRefcom()."' 
      and staimp='A'";*/
      $sql="select coalesce(sum(a.monaju),0) as monaju from cpmovaju a, cpajuste b, cpdocaju c
            where 
            a.refaju=b.refaju 
            and b.tipaju=c.tipaju
            and c.refier='C'
            and b.refere='".self::getRefcom()."' 
            and b.staaju='A'";
      if (Herramientas::BuscarDatos($sql,$result))
        $this->monaju=H::FormatoMonto($result[0]["monaju"]);
	}

	public function getRefmov() {
		return self::getRefcom();
	}

	public function getMsganulado() {
   		$c = new Criteria();
    	$c->add(CpcomproPeer::REFCOM,$this->getRefcom());
    	$reg = CpcomproPeer::doSelectOne($c);

		if($reg){
			if ($reg->getStacom()=='N'){
		   			return "ANULADO EL ".$reg->getFecanu2();
			}else return "";
		}else return "";
  	}

  	public function getFecanu2($format = 'd/m/Y') {
  		return parent::getFecanu($format);
  	}
        
       /* public function getCadenafec() {
          $format = 'd/m/Y';
  		return parent::getFeccom($format);
  	}*/
        
    public function getNomubi()
    {
        return Herramientas::getX('codubi','Bnubica','desubi',self::getCodubi());
    }  


    public function getCausado()
    {
      $result=array();
      $sql="select refere from cpimpcau where refere='".self::getRefcom()."' and staimp='A'";
      if (Herramientas::BuscarDatos($sql,$result))
        $refcau=$result[0]["refere"];
      else $refcau='';
        if ($refcau=='')
          return 'N';
        else return 'S';
    }       

        public function getDesdirec()
    {
        return Herramientas::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
    }
    public function getNomext() {
        return Herramientas::getX_vacio('TIPCOM','Cpdoccom','Nomext',self::getTipcom());
    }

    public function getDesprc() {
        return Herramientas::getX_vacio('REFPRC','Cpprecom','Desprc',self::getRefprc());
    }

    public function getNomben() {
        return Herramientas::getX_vacio('CEDRIF','Opbenefi','Nomben',self::getCedrif());
    }
}
