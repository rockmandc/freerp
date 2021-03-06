<?php

/**
 * Subclass for representing a row from the 'fadescart'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fadescart.php 59028 2014-10-14 19:39:08Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fadescart extends BaseFadescart
{
  protected $desdesc="";
  protected $codcta="";
  protected $cantidad="0,00";
  protected $montdesc="0,00";
  protected $tipdesc="";
  protected $tipret="";

  public function afterHydrate()
  {
    $d= new Criteria();
    $d->add(FadesctoPeer::CODDESC,self::getCoddesc());
    $resultd= FadesctoPeer::doSelectOne($d);
    if ($resultd)
    {
      $this->desdesc=$resultd->getDesdesc();
      $this->codcta=$resultd->getCodcta();
      $this->tipret=$resultd->getTipret();
      $this->tipdesc=$resultd->getTipdesc();
      $this->montdesc=$resultd->getMondesc();
    }
  }

  /*public function getDesdesc()
  {
   return Herramientas::getX('CODDESC','Fadescto','Desdesc',self::getCoddesc());
  }

  public function getCodcta()
  {
   return Herramientas::getX('CODDESC','Fadescto','Codcta',self::getCoddesc());
  }

  public function getTipret()
  {
   return Herramientas::getX('CODDESC','Fadescto','Tipret',self::getCoddesc());
  }

  public function getTipdesc()
  {
   return Herramientas::getX('CODDESC','Fadescto','Tipdesc',self::getCoddesc());
  }

  public function getMontdesc()
  {
   return Herramientas::getX('CODDESC','Fadescto','Mondesc',self::getCoddesc());
  }*/

  public function getMondesc($val=false)
  {
    if (self::getId())
    {
        $moneda=H::getX_vacio('REFFAC', 'Fafactur', 'Tipmon', self::getRefdoc());
        $valor=H::getX_vacio('REFFAC', 'Fafactur', 'Valmon', self::getRefdoc());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->mondesc/$valor;
        }else $calculo=$this->mondesc;
    }else $calculo=$this->mondesc;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

  public function setMondesc($v)
  {

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadescartPeer::MONDESC;
      }
  
  } 
}
