<?php

/**
 * aciciudadano actions.
 *
 * @package    Roraima
 * @subpackage aciciudadano
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class aciciudadanoActions extends autoaciciudadanoActions
{

  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
    $misio = new Atmisiones;
    $c= new Criteria();
    $misio= AtmisionesPeer::doSelect($c);
    $this->atmisiones=$misio;
    
    $muni = Ciudadanos::getMunicipios($this->getRequestParameter('atciudadano[atestados_id]',''));
    $parr = Ciudadanos::getParroquias($this->getRequestParameter('atciudadano[atmunicipios_id]',''));
//    H::PrintR($muni);
    $this->atciudadano->setMunicipios($muni);
    $this->atciudadano->setParroquias($parr);

    $this->configGrid();

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {

    // Detalle de grupo familiar

    if($this->atciudadano->getId()){

      $c = new Criteria();
      $c->add(AtgrufamPeer::ATCIUDADANO_ID,$this->atciudadano->getId());

      $reg = AtgrufamPeer::doSelect($c);

    }else $reg = Array();

    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/aciciudadano/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atgrufam',$reg);

    $this->setFlash('atgrufam', $this->obj);

  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');

    $ajax = $this->getRequestParameter('ajax','');
    $this->ajax = $ajax;


    switch ($ajax){
      case '1':

        $output = '[["","",""],["","",""],["","",""]]';

        $this->atciudadano = $this->getAtciudadanoOrCreate($codigo);
        $this->atciudadano->setMunicipios(Ciudadanos::getMunicipios($codigo));

        break;
      case '2':
        $output = '[["","",""],["","",""],["","",""]]';

        $this->atciudadano = $this->getAtciudadanoOrCreate();
        $this->atciudadano->setParroquias(Ciudadanos::getParroquias($codigo));

      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');


  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;


    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->atciudadano = $this->getAtciudadanoOrCreate();
      $this->updateAtciudadanoFromRequest();

      $prefijo = substr($this->atciudadano->getCedciu(), 0, 1);
      if($prefijo!='0' && $prefijo!='1' && $prefijo!='2' && $prefijo!='3' && $prefijo!='4' && $prefijo!='5' && $prefijo!='6' && $prefijo!='7' && $prefijo!='8' && $prefijo!='9' && $prefijo!='R'){
        $this->coderr = 1403;
        return false;
      }


      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->editing();

    $grid = Herramientas::CargarDatosGrid($this,$this->obj);

  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo)
  {
    $this->configGrid();
    $clasemodelo->setTipo('P');
    $gridgrufam = Herramientas::CargarDatosGridv2($this,$this->obj);

    return Ciudadanos::salvarAciciudadano($clasemodelo,$gridgrufam);
  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
