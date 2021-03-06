<?php

/**
 * Subclase para representar una fila de la tabla 'segperesp'.
 *
 * Configuración de permisos especiales por usuario
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Segperesp extends BaseSegperesp

{
    protected $grid=array();
    protected $marca="";

    public static function getNomusu($codigo)
  {
   return Herramientas::getX('CEDEMP','Usuarios','Nomuse',$codigo);
  }

}
