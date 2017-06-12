<?php

/**
 * Subclase para representar una fila de la tabla 'faestven'.
 *
 * Tabla que graba las estimaciones por ventas
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Faestven extends BaseFaestven
{
	protected $obj=array();
	protected $difer='0,00';

	public function afterHydrate()
	{
		$this->difer=H::FormatoMonto($this->monest-$this->monfac);
	}
}