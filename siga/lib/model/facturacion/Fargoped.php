<?php

/**
 * Subclase para representar una fila de la tabla 'fargoped'.
 *
 * Tabla que graba los recargos de los pedidos
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fargoped extends BaseFargoped
{
	 protected $nomrgo="";
  protected $codcta="";
  protected $recfij="";
  protected $tipo="";
  protected $monrgo2="0,00";

  public function getNomrgo()
  {
   return Herramientas::getX('CODRGO','Farecarg','Nomrgo',self::getCodrgo());
  }

  public function getRecfij()
  {
  	$re=Herramientas::getX('CODRGO','Farecarg','Calcul',self::getCodrgo());
  	if ($re=='S')
  	{
  		$valor="Si";
  	}else $valor="No";
   return $valor;
  }

  public function getCodcta()
  {
   return Herramientas::getX('CODRGO','Farecarg','Codcta',self::getCodrgo());
  }

  public function getTipo()
  {
   return Herramientas::getX('CODRGO','Farecarg','Tiprgo',self::getCodrgo());
  }

  public function getMonrgo2()
  {
   return number_format(Herramientas::getX('CODRGO','Farecarg','Monrgo',self::getCodrgo()), 2, ',', '.');
  }
}
