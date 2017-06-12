<?php

/**
 * Subclass for representing a row from the 'cireging'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cireging.php 32416 2009-09-02 02:21:12Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cireging extends BaseCireging
{
   protected $grid= array();
   protected $destipmov="";
   protected $numcue="";
   protected $destip="";
   protected $nomcue="";
   protected $refere="";
   protected $blocfec="";
   protected $mansolocor="";
   protected $oculeli="";
   protected $nomcon="";
   protected $numdep2="";
   protected $fecdep2="";
   protected $grid2= array();
   protected $numliq="";

     public function afterHydrate()
  {
     if (self::getId())
     {
        $this->nomcon=Herramientas::getX('RIFCON','Ciconrep','Nomcon',self::getRifcon());

        $this->numcue=self::getCtaban();

        
     }
  }

  public function getNumliq(){
    if (self::getStaing()=='L'){
          return H::getX_vacio('Refing','Cidetliq','Refliq',self::getRefing());
    }

    return '';
  }



   public function getDestip()
	  {
	  	return Herramientas::getX('CODTIP','Citiping','Destip',self::getCodtip());
	  }

	/*public function getNomcon()
	  {
            if (self::getId()) 
	  	return Herramientas::getX('RIFCON','Ciconrep','Nomcon',self::getRifcon());
            else
               return $this->nomcon;
	  }

          public function setNomcon()
          {
                $this->nomcon;
          }*/

	public function getNomcue()
	  {
	  	return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getCtaban());
	  }

	/*public function getNumcue()
	  {
            if (self::getId())
	  	return Herramientas::getX('REFING','Cireging','Ctaban',self::getRefing());
            else
                return $this->numcue;

	  }

          public function setNumcue()
          {
                $this->numcue;
          }*/

	public function getDestipmov()
	  {
	  	return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getTipmov());
	  }

	public function getIdrefer()
      {
    	return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
      }

      public function getRefere()
      {
    	return self::getRefing();
      }
      
  public function getBlocfec()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('ingresos',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['ingresos']))
		     if(array_key_exists('ingreging',$varemp['aplicacion']['ingresos']['modulos'])){
		       if(array_key_exists('bloqfec',$varemp['aplicacion']['ingresos']['modulos']['ingreging']))
		       {
		       	$dato=$varemp['aplicacion']['ingresos']['modulos']['ingreging']['bloqfec'];
		       }
         }
     return $dato;
  }

  public function setBlocfec()
  {
  	return $this->blocfec;
  }
  
  public function getMansolocor()  
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('ingresos',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['ingresos']))
		     if(array_key_exists('ingreging',$varemp['aplicacion']['ingresos']['modulos'])){
		       if(array_key_exists('mansolocor',$varemp['aplicacion']['ingresos']['modulos']['ingreging']))
		       {
		       	$dato=$varemp['aplicacion']['ingresos']['modulos']['ingreging']['mansolocor'];
		       }
         }
     return $dato;
  }

  public function setMansolocor()
  {
  	return $this->mansolocor;
  }
  
  public function getOculeli()  
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('ingresos',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['ingresos']))
		     if(array_key_exists('ingreging',$varemp['aplicacion']['ingresos']['modulos'])){
		       if(array_key_exists('oculeli',$varemp['aplicacion']['ingresos']['modulos']['ingreging']))
		       {
		       	$dato=$varemp['aplicacion']['ingresos']['modulos']['ingreging']['oculeli'];
		       }
         }
     return $dato;
  }

  public function setOculeli()
  {
  	return $this->oculeli;
  }

  public function getMansolcor()
  {
    return H::getConfApp2('mansolcor', 'ingresos', 'ingreging');
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
            $this->modifiedColumns[] = CiregingPeer::VALMON;
          }  
    } 

      public function getDespar()
    {
      return Herramientas::getX('CODPAR','Cidefpar','Despar',self::getCodpar());
    }

}
