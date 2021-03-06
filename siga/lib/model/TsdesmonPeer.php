<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'tsdesmon'.
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
class TsdesmonPeer extends BaseTsdesmonPeer
{
	  public static function getMonedas()
  {
    $resp = array();
    $c = new Criteria();
    $m = TsdefmonPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getCodmon()] = $mon->getNommon();
      }
    }
    return $resp;
  }

  public static function getMonedasExactas()
  {
    $c = new Criteria();
    $m = TsdefmonPeer::doSelect($c);

    return $m;
  }
}
