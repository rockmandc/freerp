<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'cpcausad'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: CpcausadPeer.php 60244 2015-01-23 13:17:23Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class CpcausadPeer extends BaseCpcausadPeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CpcausadPeer::REFCAU => 'Referencia', CpcausadPeer::DESCAU => 'Descripción', CpcausadPeer::CEDRIF => 'Cedula', CpcausadPeer::FECCAU => 'Fecha', CpcausadPeer::ID => 'Id'),);

	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}

	static public function getColumsNames()
	{
		return self::$columsname[self::COLUMNS];
	}
	
	
	static public function getArrayFieldsNames()
	{
		$col = self::$columsname[self::COLUMNS];
		$columnas = array();
		foreach($col as $key => $value)
		{
			$punto = strpos($key,'.');
			$tabla = substr($key,0,$punto);
			$campo = substr($key,$punto+1);
			$columnas[] = ucfirst(strtolower($campo));
			
		}
		return $columnas;
	}

}
