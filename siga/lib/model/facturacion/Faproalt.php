<?php

/**
 * Subclass for representing a row from the 'faproalt'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faproalt.php 47350 2012-02-16 14:29:19Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faproalt extends BaseFaproalt
{
    public function getDesart()
    {
  	    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }
}
