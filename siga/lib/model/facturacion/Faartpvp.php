<?php

/**
 * Subclass for representing a row from the 'faartpvp'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faartpvp.php 52811 2013-07-22 20:57:34Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faartpvp extends BaseFaartpvp
{
	public $obj = array();
  protected $tipo="";
  protected $precio="";
  protected $monaum='0,00';

    public function getDesart()
    {
  	    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }

        public function getCodbar()
    {
        return Herramientas::getX('CODART','Caregart','Codbar',self::getCodart());
    }

  public function getDesartdesde()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getArtdesde());
  }

  public function getDesarthasta()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getArthasta());
  }

  public function getArtdesde()///
  {
	   return '';
  }

  public function getArthasta()
  {
	   return '';
  }  

}
