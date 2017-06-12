<?php

/**
 * Subclass for representing a row from the 'caartsol'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Caartsol extends BaseCaartsol
{
  protected $codpre = "";
  private $canaju = 0.00;
  private $check = '';
  private $fecent = '';
  private $montot2 = 0.00;
  private $monrgo2 = 0.00;
  protected $codigopre="";
  protected $desartsol="";
  protected $canord2=0.00;
  protected $datosrecargo="";
  protected $cancost="0,00";
  protected $numreqori="";
  private $check2 = '';

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
     parent::hydrate($rs, $startcol);
     $this->codigopre= self::getCodcat() ."-". self::getCodpar();
     
    //Cargar en el campo datosrecargo del Grid Recargos, los recargo por artículo de la tabla Cadisrgo
      if (self::getId()) {
         $this->canord2=H::FormatoMonto($this->canreq-$this->canord); 
          if (self::getDesart())
          $this->desartsol = self::getDesart();
        else
          $this->desartsol =Herramientas::getX('CODART','Caregart','Desart',self::getCodart());      
      }

     $calculo= H::toFloat($this->canord2) * self::getCosto();

     $this->cancost=number_format($calculo,6,',','.');
     $this->datosrecargo="";
     $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
     $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
     $c= new Criteria();
	 $c->add(CadisrgoPeer::REQART,self::getReqart());
	 $c->add(CadisrgoPeer::CODART,self::getCodart());
         if ($claartdes=='S') $c->add(CadisrgoPeer::DESART,trim(self::getDesart()));
	 $c->add(CadisrgoPeer::CODCAT,self::getCodcat());
	 $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
	 $result=CadisrgoPeer::doSelect($c);
	 if ($result)
	 {
        foreach ($result as $datos)
        {
           $monrgo=number_format($datos->getMonrgo(),4,',','.');
           $monrgoc=number_format($datos->getMonrgoc(),2,',','.');
           $this->datosrecargo=$this->datosrecargo . $datos->getCodrgo().'_' . $datos->getNomrgo().'_' . $monrgoc .'_'. $datos->getTiprgo().'_' . $monrgo .'_'. $datos->getCodpar(). '!';
        }
	 }

      $this->codpre=self::getCodpar();

   }


  public function getUnimed2()
  {
    return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
  }

  public function getCospro()
  {
    return Herramientas::getX('CODART','Caregart','Cospro',self::getCodart());
  }

    public function setCheck($val)
    {
    $this->check = $val;
  }

  public function getCheck()
  {
    if (self::getMonrgo()!=0 && self::getId()!="")
    { $this->check=1;}
    else { $this->check;}
    return $this->check;
  }

  public function getTotdet()
  {
      $totdet= self::getCanreq() * self::getCosto();     
    return number_format($totdet,2,',','.');
  }

  public function setTotdet($val){

    $this->Totdev= $val;
  }

   public function setFecent($val)
    {
    $this->fecent = $val;
  }

  public function getFecent()
  {
    return $this->fecent;
  }

  public function getCanaju()
  {
    $var = number_format(0,2,',','.');
    return $var;
  }


  public function getCanaju_()
  {
    return $this->canaju;
  }


    public function setCanaju($val)
    {
       $this->canaju = $val;
    }



  /*public function getCodPre()
  {
     $var=self::getCodpar();

    return $var;
  }*/


  public function getCodPre_()
  {
    return $this->codpre;
  }


    /*public function setCodPre($val)
    {
       $this->codpre = $val;
    }*/

  public function getMontot2($va=false)
  {
    if (self::getId()!="")
    {
     $var = parent::getMontot($va);
    }
    else
    {
      $var= $this->montot2;
    }
    return $var;
  }

  public function setMontot2($val)
    {
       $this->montot2 = $val;
    }

    public function getMonrgo2($va=false)
  {
    if (self::getId()!="")
    {
      $var = parent::getMonrgo($va);
    }
    else
    {
      $var=$this->monrgo2;
    }
    return $var;
  }

  public function setMonrgo2($val)
    {
       $this->monrgo2 = $val;
    }

  public function getCosto($val=false)
  {
    if (self::getId())
        {
            $moneda=H::getX_vacio('REQART', 'Casolart', 'Tipmon', self::getReqart());
            $valor=H::getX_vacio('REQART', 'Casolart', 'Valmon', self::getReqart());
            $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
            if ($moneda2!=$moneda)
            {
                if($valor >0) {
                $calculo=$this->costo/$valor;

                }else{
                    $calculo=0;
                }
            }else $calculo=$this->costo;
        }else $calculo=$this->costo;

    if($val) return number_format($calculo,6,',','.');
    else return $calculo;

 }

	public function setCosto($v)
	{

    if ($this->costo !== $v) {
        $this->costo = Herramientas::toFloat($v,6);
        $this->modifiedColumns[] = CaartsolPeer::COSTO;
      }

	}


      public function getMontot($val=false)
      {
        if (self::getId())
        {
            $moneda=H::getX_vacio('REQART', 'Casolart', 'Tipmon', self::getReqart());
            $valor=H::getX_vacio('REQART', 'Casolart', 'Valmon', self::getReqart());
            $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
            if ($moneda2!=$moneda)
            {  if($valor>0){
                $calculo=$this->montot/$valor;

                }else{
                    $calculo=0;
                }
            }else $calculo=$this->montot;
        }else $calculo=$this->montot;
    
        if($val) return number_format($calculo,6,',','.');
        else return $calculo;

      }

      	public function setMontot($v)
	{
          if ($this->montot !== $v) {
             $this->montot = Herramientas::toFloat($v,6);
            $this->modifiedColumns[] = CaartsolPeer::MONTOT;
          }

	} 

      public function getMonrgo($val=false)
      {
        if (self::getId())
        {
            $moneda=H::getX_vacio('REQART', 'Casolart', 'Tipmon', self::getReqart());
            $valor=H::getX_vacio('REQART', 'Casolart', 'Valmon', self::getReqart());
            $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
            if ($moneda2!=$moneda)
            {  if($valor>0){
                $calculo=$this->monrgo/$valor;

                }else{
                    $calculo=0;
 }
            }else $calculo=$this->monrgo;
        }else $calculo=$this->monrgo;
    
        if($val) return number_format($calculo,4,',','.');
        else return $calculo;

      }

      	public function setMonrgo($v)
	{
          if ($this->monrgo !== $v) {
             $this->monrgo = Herramientas::toFloat($v,4);
            $this->modifiedColumns[] = CaartsolPeer::MONRGO;
          }

	} 
        
        public function getDesunimed()
    {
            return Herramientas::getX_vacio('CODUNIMED','Cadefunimed','Desunimed',self::getCodunimed());
    }        

   /* public function getDesartsol()
    {
      if (self::getDesart())
        $this->desartsol = self::getDesart();
      else
        $this->desartsol =Herramientas::getX('CODART','Caregart','Desart',self::getCodart());

      return $this->desartsol;
    }*/
        
}
