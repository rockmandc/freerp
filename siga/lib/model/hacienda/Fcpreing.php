<?php

/**
 * Subclass for representing a row from the 'fcpreing'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcpreing.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Fcpreing extends BaseFcpreing
{
    protected $anno="";
    protected $grid=array();
    protected $totalest="0,00";
    protected $mascara="";

   public function afterHydrate()
  {
       $cr= new Criteria();
       $cr->add(FcestingPeer::CODPAR,trim(self::getCodpar()));
       $fcesting = FcestingPeer::doSelectOne($cr);
       if($fcesting){
        $this->anno = $fcesting->getAno();

       }
  }
 
}