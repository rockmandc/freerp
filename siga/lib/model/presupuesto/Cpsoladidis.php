<?php

/**
 * Subclass for representing a row from the 'cpsoladidis'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpsoladidis.php 58914 2014-10-08 15:30:12Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Cpsoladidis extends BaseCpsoladidis
{
    protected $movimiento = array();
    protected $longitud="";
    protected $mascara="";
    protected $etiqueta="";

       protected $artStacon = "";
    protected $artStapre = "";
    protected $artStagob = "";
    protected $artStaniv4 = "";
    protected $artStaniv5 = "";
    protected $artStaniv6 = "";

    protected $aprStacon = "";
    protected $aprStapre = "";
    protected $aprStagob = "";
    protected $aprStaniv4 = "";
    protected $aprStaniv5 = "";
    protected $aprStaniv6 = "";

    protected $abrStacon = "";
    protected $abrStapre = "";
    protected $abrStagob = "";
    protected $abrStaniv4 = "";
    protected $abrStaniv5 = "";
    protected $abrStaniv6 = "";
    protected $grid= array();
    protected $desart="";
    protected $obj2=array();
    protected $toteve="0,00";
    protected $obj3=array();
    protected $actualfila="";

    public function getEtiqueta()
    {
        if($this->getId() != '')
        {
            if (strtoupper($this->getStaadi()) == "A" ){
                $defApr = CpdefaprPeer::doSelectOne(new Criteria());

                if($defApr){
                  if ($this->getStacon() == "" && $this->getStagob() == "" && $this->getStapre() == ""  ){
                       $etiqueta = " Elaborado el ".$this->getFecadi('d/m/Y');
                  }else if ($this->getStacon() == "" && $this->getStagob() == "" && $this->getStapre() == "S"  ){
                       $etiqueta = "Conformado por ".$defApr->getStapre()." el ".$this->getFecpre('d/m/Y');
                  }else if ($this->getStacon() == "" && $this->getStagob() == "S" && $this->getStapre() == ""  ){
                       $etiqueta = "Conformado por ".$defApr->getStagob()." el ".$this->getFecgob('d/m/Y');
                  }else if ($this->getStacon() == "S" && $this->getStagob() == "" && $this->getStapre() == ""  ){
                       $etiqueta = "Conformado por ".$defApr->getStacon()." el ".$this->getFeccon('d/m/Y');
                  }else if ($this->getStacon() == "S" && $this->getStagob() == "" && $this->getStapre() == "S"  ){
                       $etiqueta = "Conformado por ".$defApr->getStapre()." el ".$this->getFecpre('d/m/Y')." Aprobado por el ".$defApr->getStacon()." el ".$this->getFeccon('d/m/Y');
                  }else if ($this->getStacon() == "" && $this->getStagob() == "S" && $this->getStapre() == "S"  ){
                       $etiqueta = "Conformado por ".$defApr->getStapre()." el ".$this->getFecpre('d/m/Y').", Autorizado por ".$defApr->getStagob()." el ".$this->getFecgob('d/m/Y');
                  }else if ($this->getStacon() == "S" && $this->getStagob() == "S" && $this->getStapre() == ""  ){
                       $etiqueta = "Autorizado por ".$defApr->getStagob()." el  ".$this->getFecgob('d/m/Y').", Conformado por ".$defApr->getStacon()." el ".$this->getFeccon('d/m/Y');
                  }else if ($this->getStacon() == "S" && $this->getStagob() == "S" && $this->getStapre() == "S"  ){
                       $etiqueta = "Conformado por ".$defApr->getStapre()." el ".$this->getFecpre('d/m/Y').", Autorizado por ".$defApr->getStagob()." el  ".$this->getFecgob('d/m/Y').", Aprobado por ".$defApr->getStacon()." el ".$this->getFeccon('d/m/Y');
}

                  if ($this->getStaniv4() == "S"){
                    $etiqueta = $etiqueta.", Conformado por ".$defApr->getStaniv4()." el ".$this->getFecniv4('d/m/Y');
                  }else if ($this->getStaniv5() == "S"){
                    $etiqueta = $etiqueta.", Conformado por ".$defApr->getStaniv5()." el ".$this->getFecniv5('d/m/Y');
                  }else if ($this->getStaniv6() == "S"){
                    $etiqueta = $etiqueta.", Conformado por ".$defApr->getStaniv6()." el ".$this->getFecniv6('d/m/Y');
                  }else if ($this->getStacon() == "N" || $this->getStagob() == "N" || $this->getStapre() == "N" || $this->getStaniv4() == "N" || $this->getStaniv5() == "N" || $this->getStaniv6() == "N"){
                       $etiqueta = "NO APROBADO";
                  }else if ($this->getStacon() == "" || $this->getStagob() == "" || $this->getStapre() == "" || $this->getStaniv4() == "" || $this->getStaniv5() == "" || $this->getStaniv6() == ""){
                       $etiqueta = $etiqueta;
                  }
                }else
                {
                    $etiqueta = "Elaborado el ".$this->getFecadi('d/m/Y');
                }
            }else
            {
                $etiqueta = "Anulado el ".$this->getFecanu('d/m/Y');
            }
        }else
        {
            $etiqueta = "";
        }

        return $etiqueta;
    }

    public function getBotonAprGob()
    {
        //Caso: 2do Nivel de Aprobación "Stagob"
        $c = new Criteria();
        $c->add(CpartleyPeer::CODART, $this->getCodart());
        $artLey = CpartleyPeer::doSelectOne($c);

        if ($artLey)
        {
            if ($artLey->getStagob() == 'S' && $artLey->getStacon() == 'S')
            {
                if ($this->getStacon() == 'S')
                {
                    $aprStagob = 'S';
                }else
                {
                    $aprStagob = 'N';
                }
            }else
            {
                $aprStagob = 'S';
            }
        }

        return $aprStagob;
    }

    public function getBotonAprPre()
    {
        //Caso: 3er Nivel de Aprobación "Stapre"
        $c = new Criteria();
        $c->add(CpartleyPeer::CODART, $this->getCodart());
        $artLey = CpartleyPeer::doSelectOne($c);

        if ($artLey)
        {
            if (($artLey->getStapre() == 'S' && $artLey->getStagob() == 'S' && $artLey->getStacon() == 'S') || ($artLey->getStapre() == 'S' && $artLey->getStagob() == 'S'))
            {
                if ($this->getStagob() == 'S')
                {
                    $aprStapre = 'S';
                }else
                {
                    $aprStapre = 'N';
                }
            }else if ($artLey->getStapre() == 'S' && $artLey->getStacon() == 'S')
            {
                if ($this->getStacon() == 'S')
                {
                    $aprStapre = 'S';
                }else
                {
                    $aprStapre = 'N';
                }
            }else
            {
                $aprStapre = 'S';
            }
        }

        return $aprStapre;
    }

    public function getBotonAprStaniv4()
    {
        //Caso: 4to Nivel de Aprobación "Staniv4"
        $c = new Criteria();
        $c->add(CpartleyPeer::CODART, $this->getCodart());
        $artLey = CpartleyPeer::doSelectOne($c);

        if ($artLey)
        {
            if (($artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S' && $artLey->getStacon() == 'S') || ($artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S') || ($artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S'))
            {
                if ($this->getStapre() == 'S')
                {
                    $aprStaniv4 = 'S';
                }else
                {
                    $aprStaniv4 = 'N';
                }
            }else if (($artLey->getStaniv4() == 'S' && $artLey->getStagob() == 'S' && $artLey->getStacon() == 'S') || ($artLey->getStaniv4() == 'S' && $artLey->getStagob() == 'S'))
            {
                if ($this->getStagob() == 'S')
                {
                    $aprStaniv4 = 'S';
                }else
                {
                    $aprStaniv4 = 'N';
                }
            }else if ($artLey->getStaniv4() == 'S' && $artLey->getStacon() == 'S')
            {
                if ($this->getStacon() == 'S')
                {
                    $aprStaniv4 = 'S';
                }else
                {
                    $aprStaniv4 = 'N';
                }
            }else
            {
                $aprStaniv4 = 'N';
            }
        }

        return $aprStaniv4;

    }

    public function getBotonAprStaniv5()
    {
        //Caso: 5to Nivel de Aprobación "Staniv5"
        $c = new Criteria();
        $c->add(CpartleyPeer::CODART, $this->getCodart());
        $artLey = CpartleyPeer::doSelectOne($c);

        if ($artLey)
        {
            if (($artLey->getStaniv5() == 'S' && $artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S' && $artLey->getStacon() == 'S') || ($artLey->getStaniv5() == 'S' && $artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S') || ($artLey->getStaniv5() == 'S' && $artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S') || ($artLey->getStaniv5() == 'S' && $artLey->getStaniv4() == 'S'))
            {
                if ($this->getStaniv4() == 'S')
                {
                    $aprStaniv5 = 'S';
                }else
                {
                    $aprStaniv5 = 'N';
                }
            }else if (($artLey->getStaniv5() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S' && $artLey->getStacon() == 'S') || ($artLey->getStaniv5() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S') || ($artLey->getStaniv5() == 'S' && $artLey->getStapre() == 'S'))
            {
                if ($this->getStapre() == 'S')
                {
                    $aprStaniv5 = 'S';
                }else
                {
                    $aprStaniv5 = 'N';
                }
            }else if (($artLey->getStaniv5() == 'S' && $artLey->getStagob() == 'S' && $artLey->getStacon() == 'S' ) || ($artLey->getStaniv5() == 'S' && $artLey->getStagob() == 'S'))
            {
                if ($this->getStagob() == 'S')
                {
                    $aprStaniv5 = 'S';
                }else
                {
                    $aprStaniv5 = 'N';
                }
            }else if ($artLey->getStaniv5 == 'S' && $artLey->getStacon() == 'S')
            {
                if ($this->getStacon() == 'S'){
                    $aprStaniv5 = 'S';
                }else
                {
                    $aprStaniv5 = 'N';
                }
            }else
            {
                $aprStaniv5 = 'S';
            }
        }

        return $aprStaniv5;
    }

    public function getBotonAprStaniv6()
    {
        //Caso: 6to Nivel de Aprobación "Staniv6"
        $c = new Criteria();
        $c->add(CpartleyPeer::CODART, $this->getCodart());
        $artLey = CpartleyPeer::doSelectOne($c);

        if ($artLey)
        {
            if (($artLey->getStaniv6() == 'S' && $artLey->getStaniv5() == 'S' && $artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S' && $artLey->getStacon() == 'S') || ($artLey->getStaniv6() == 'S' && $artLey->getStaniv5() == 'S' && $artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S') || ($artLey->getStaniv6() == 'S' && $artLey->getStaniv5() == 'S' && $artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S') || ($artLey->getStaniv6() == 'S' && $artLey->getStaniv5() == 'S' && $artLey->getStaniv4() == 'S') || ($artLey->getStaniv6() == 'S' && $artLey->getStaniv5() == 'S'))
            {
                if ($this->getStaniv5() == 'S')
                {
                    $aprStaniv6 = 'S';
                }else
                {
                    $aprStaniv6 = 'N';
                }
            }else if ( ($artLey->getStaniv6() == 'S' && $artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S' && $artLey->getStacon() == 'S') || ($artLey->getStaniv6() == 'S' && $artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S') || ($artLey->getStaniv6() == 'S' && $artLey->getStaniv4() == 'S' && $artLey->getStapre() == 'S') || ($artLey->getStaniv6() == 'S' && $artLey->getStaniv4() == 'S'))
            {
                if ($this->getStaniv4() == 'S')
                {
                    $aprStaniv6 = 'S';
                }else
                {
                    $aprStaniv6 = 'N';
                }
            }else if ( ($artLey->getStaniv6() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S' && $artLey->getStacon() == 'S') || ($artLey->getStaniv6() == 'S' && $artLey->getStapre() == 'S' && $artLey->getStagob() == 'S') || ($artLey->getStaniv6() == 'S' && $artLey->getStapre() == 'S'))
            {
                if ($this->getStapre() == 'S')
                {
                    $aprStaniv6 = 'S';
                }else
                {
                    $aprStaniv6 = 'N';
                }
            }else if ( ($artLey->getStaniv6() == 'S' && $artLey->getStagob() == 'S' && $artLey->getStacon() == 'S') || ($artLey->getStaniv6() == 'S' && $artLey->getStagob() == 'S'))
            {
                if ($this->getStagob() == 'S')
                {
                    $aprStaniv6 = 'S';
                }else
                {
                    $aprStaniv6 = 'N';
                }
            }else if (($artLey->getStaniv6() == 'S' && $artLey->getStacon() == 'S'))
            {
                if ($this->getStagob() == 'S')
                {
                    $aprStaniv6 = 'S';
                }else
                {
                    $aprStaniv6 = 'N';
                }
            }else
            {
                $aprStaniv6 = 'S';
            }

        }

        return $aprStaniv6;
    }

    public function cargarDefiniciones()
    {
        $def = CpdefaprPeer::doSelectOne(new Criteria());

        if ($def){
            $this->abrStacon = $def->getAbrstacon();
            $this->abrStapre = $def->getAbrstapre();
            $this->abrStagob = $def->getAbrstagob();
            $this->abrStaniv4 = $def->getAbrstaniv4();
            $this->abrStaniv5 = $def->getAbrstaniv5();
            $this->abrStaniv6 = $def->getAbrstaniv5();
        }
        return "1";
    }

    public function getAbrStacon()
    {
        return $this->abrStacon;
    }

    public function getAbrStapre()
    {
        return $this->abrStapre;
    }

    public function getAbrStagob()
    {
        return $this->abrStagob;
    }

    public function getAbrStaniv4()
    {
        return $this->abrStaniv4;
    }

    public function getAbrStaniv5()
    {
        return $this->abrStaniv5;
    }

    public function getAbrStaniv6()
    {
        return $this->abrStaniv6;
    }

    public function cargarArtLey()
    {
        $c = new Criteria();
        $c->add(CpartleyPeer::CODART, $this->getCodart());
        $artLey = CpartleyPeer::doSelectOne($c);

        if ($artLey){
            $this->artStacon = $artLey->getStacon();
            $this->artStapre = $artLey->getStapre();
            $this->artStagob = $artLey->getStagob();
            $this->artStaniv4 = $artLey->getStaniv4();
            $this->artStaniv5 = $artLey->getStaniv5();
            $this->artStaniv6 = $artLey->getStaniv6();
        }

    }

    public function getArtStacon()
    {
        return $this->artStacon;
    }

    public function getArtStapre()
    {
        return $this->artStapre;
    }

    public function getArtStagob()
    {
        return $this->artStagob;
    }

    public function getArtStaniv4()
    {
        return $this->artStaniv4;
    }

    public function getArtStaniv5()
    {
        return $this->artStaniv5;
    }

    public function getArtStaniv6()
    {
        return $this->artStaniv6;
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
   public function getDesart()
  {
    return Herramientas::getX('CODART', 'Cpartley', 'Desart', self::getCodart());
  }

      public function getDesdirec()
    {
        return Herramientas::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
    }

}
