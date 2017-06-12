<?php

/**
 * modalidadcestaticketempleados actions.
 *
 * @package    Roraima
 * @subpackage modalidadcestaticketempleados
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class modalidadcestaticketempleadosActions extends automodalidadcestaticketempleadosActions
{

  public function executeIndex()
  {
    return $this->redirect('modalidadcestaticketempleados/edit');
  }


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
	$this->configGrid();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codnom = '', $reg = array(), $regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
    //  $reg = array();

	  	$this->npnomina = $this->getNpnominaOrCreate();

	    $c = new Criteria();
	    $c->add(NpasicarempPeer::CODNOM,$codnom);
	    $c->add(NpasicarempPeer::STATUS,'V');
	    $c->addJoin(NpasicarempPeer::CODEMP,NphojintPeer::CODEMP);
	    $c->addAscendingOrderByColumn(NphojintPeer::CODEMP);
	    $per = NphojintPeer::doSelect($c);

	    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/modalidadcestaticketempleados/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_conceptos');
	    $this->columnas[1][2]->setCombo(Constantes::ListaModalidad());

	    $this->obj = $this->columnas[0]->getConfig($per);

	    $this->npnomina->setObjconceptos($this->obj);
    }
  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo    = $this->getRequestParameter('codigo','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
		$nomnom = H::getX('codnom','npnomina','nomnom',$codigo);
        $output = '[["'.$cajtexmos.'","'.$nomnom.'",""],["'.$cajtexcom.'","'.$codigo.'",""]]';
        $this->configGrid($codigo);
        break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    //return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    $this->configGrid('',$grid[0],$grid[1]);

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
	try{
      $grid = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjconceptos());
	  $x=$grid[0];

	  $j=0;
	  while ($j<count($x))
	  {
	    $x[$j]->save();
	    $j++;
	  }

	  $z=$grid[1];
	  $j=0;
	  while ($j<count($z))
	  {
	    $z[$j]->delete();
	    $j++;
	  }
    return -1;

	} catch (Exception $ex){
		return 0;
	}
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
