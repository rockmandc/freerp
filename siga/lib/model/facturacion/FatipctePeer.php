<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'fatipcte'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: storres $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: FatipctePeer.php 48517 2012-06-20 21:43:32Z storres $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FatipctePeer extends BaseFatipctePeer
{
  public static function TiposCliente() {
        $resp = array();
        $c = new Criteria();
        $lista_tip = FatipctePeer::doSelect($c);
        if ($lista_tip) {
            foreach ($lista_tip as $obj_tip) {
                $resp[$obj_tip->getId()] = $obj_tip->getNomtipcte();
            }
        }

        return $resp;
    }

}
