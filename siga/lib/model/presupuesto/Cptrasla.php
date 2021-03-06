<?php

/**
 * Subclass for representing a row from the 'cptrasla'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cptrasla.php 58940 2014-10-08 21:13:22Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cptrasla extends BaseCptrasla
{
    protected $obj=array();
    protected $grid=array();
    protected $longitud="";
    protected $mascara="";
    protected $etiqueta="";
    protected $nomcodpre="";
    protected $obj2=array();
    protected $obj3=array();

    public function getEtiqueta()
    { $valor = "";
        if($this->getReftra() != '')
        {
            if (strtoupper($this->getStatra()) == "A" ){
               $valor = "Elaborado el ".$this->getFectra('d/m/Y');
            }else if (strtoupper($this->getStatra()) == "N" )
            {
                $valor = "Anulado el ".$this->getFecanu('d/m/Y');
            }
        }

        return $valor;
    }

  public function getRefmov()
  {
    return parent::getReftra();
  }

    public function getLongitud()
   {
     return strlen(H::formatoPresupuesto());
}

   public function setLongitud()
   {
     return $this->longitud;
   }

   public function getMascara()
   {
     return H::formatoPresupuesto();
   }

   public function setMascara()
   {
     return $this->mascara;
   }

   public function __toString()
  {
    return $this->reftra;
  }

      public function getDesdirec()
    {
        return Herramientas::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
    }
}
