<?php

/**
 * Subclase para representar una fila de la tabla 'segcajusu'.
 *
 * Asociación de Ubicación administrativa a Usuario
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Segcajusu extends BaseSegcajusu
{
	protected $check="";

	public function getDescaj()
    {
        return Herramientas::getX_vacio('ID','Fadefcaj','Descaj',self::getCodcaj());
    }
}
