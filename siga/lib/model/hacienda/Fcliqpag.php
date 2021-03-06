<?php

/**
 * Subclase para representar una fila de la tabla 'fcliqpag'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.hacienda
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fcliqpag extends BaseFcliqpag
{
    protected $grid = array();
    protected $fechaini='';
    protected $fechafin='';
    protected $nomcue='';
    protected $botones='';

    public function getNomcue(){
      return H::getX_vacio('NUMCUE', 'Tsdefban', 'Nomcue',  self::getCtaban());
  }
}
