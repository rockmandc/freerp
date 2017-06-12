<?php

/**
 * facrecliq actions.
 *
 * @package    Roraima
 * @subpackage facrecliq
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 43788 2011-04-15 19:09:27Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class facrecliqActions extends autofacrecliqActions
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
	  $this->configGrid();
	  $this->configGridb();
	  if ($this->fcdefrecint->getPromedio()=="N")
      {
        $this->fcdefrecint->setPromedio("");
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
  public function deleting($fcdefrecint)
  {
	$c = new Criteria();
	$c->add(FcrangosrecPeer::CODREC,$fcdefrecint->getCodrec());
	FcrangosrecPeer::doDelete($c);

	$c = new Criteria();
	$c->add(FcfuentesrecPeer::CODREC,$fcdefrecint->getCodrec());
	FcfuentesrecPeer::doDelete($c);

    $fcdefrecint->delete();
    return -1;

   }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FcrangosrecPeer::CODREC,$this->fcdefrecint->getCodrec());
    $per = FcrangosrecPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facrecliq/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fcdefrecint->setGrid($this->grid);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridb($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FcfuentesrecPeer::CODREC,$this->fcdefrecint->getCodrec());
    $per = FcfuentesrecPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facrecliq/'.sfConfig::get('sf_app_module_config_dir_name').'/gridb');
	$this->columnas[1][0]->setCatalogo('Fcfuepre','sf_admin_edit_form', array('codfue'=>'1','nomfue'=>'2'), 'Facrecliq_fcfuepre');
	$this->columnas[1][2]->setCatalogo('Fcfuepre','sf_admin_edit_form', array('codfue'=>'3','nomfue'=>'4'), 'Facrecliq_fcfuepre');
    $this->gridb = $this->columnas[0]->getConfig($per);
    $this->fcdefrecint->setGridb($this->gridb);
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
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtextcom = $this->getRequestParameter('cajtexcom','');
    $dato=""; $js="";

    switch ($ajax){
      case '1':
        $t= new Criteria();
        $t->add(FcfueprePeer::CODFUE,$codigo);
        $reg= FcfueprePeer::doSelectOne($t);
        if ($reg)
        {
            $dato=$reg->getNomfue();
        }else {
            $js="alert_('El C&oacute;digo de Fuente no existe'); $('$cajtextcom').value=''; $('$cajtextcom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

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
    $this->configGrid($grid[0],$grid[1]);
    $this->configGridb();
    $gridb = Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->configGridb($gridb[0],$gridb[1]);
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
  public function saving($fcdefdesc)
  {
    $fcdefdesc->save();
    if ($fcdefdesc->getModo()!="T")
    {
        $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
        Hacienda::salvar_grid_Fcdefrecint($fcdefdesc, $grid);
    }
    $gridb = Herramientas::CargarDatosGridv2($this,$this->gridb);
	Hacienda::salvar_gridb_Fcdefrecint($fcdefdesc, $gridb);
    return -1;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFcdefrecintFromRequest()
  {
    $fcdefrecint = $this->getRequestParameter('fcdefrecint');

    if (isset($fcdefrecint['codrec']))
    {
      $this->fcdefrecint->setCodrec($fcdefrecint['codrec']);
    }
    if (isset($fcdefrecint['nomrec']))
    {
      $this->fcdefrecint->setNomrec($fcdefrecint['nomrec']);
    }
    if (isset($fcdefrecint['tipo']))
    {
      $this->fcdefrecint->setTipo($fcdefrecint['tipo']);
    }
    if (isset($fcdefrecint['modo']))
    {
      $this->fcdefrecint->setModo($fcdefrecint['modo']);
    }
    if (isset($fcdefrecint['periodo']))
    {
      $this->fcdefrecint->setPeriodo($fcdefrecint['periodo']);
    }
    if (isset($fcdefrecint['promedio']))
    {
      $this->fcdefrecint->setPromedio($fcdefrecint['promedio']);
    }
    if (isset($fcdefrecint['grid']))
    {
      $this->fcdefrecint->setGrid($fcdefrecint['grid']);
    }
    if (isset($fcdefrecint['gridb']))
    {
      $this->fcdefrecint->setGridb($fcdefrecint['gridb']);
    }

    if (isset($fcdefrecint['codrec']))
    {
      $this->fcdefrecint->setCodrec($fcdefrecint['codrec']);
    }
    if (isset($fcdefrecint['nomrec']))
    {
      $this->fcdefrecint->setNomrec($fcdefrecint['nomrec']);
    }
    if (isset($fcdefrecint['tipo']))
    {
      $this->fcdefrecint->setTipo($fcdefrecint['tipo']);
    }
    if (isset($fcdefrecint['modo']))
    {
      $this->fcdefrecint->setModo($fcdefrecint['modo']);
    }
    if (isset($fcdefrecint['periodo']))
    {
      $this->fcdefrecint->setPeriodo($fcdefrecint['periodo']);
    }
    if (isset($fcdefrecint['promedio']))
    {
      $this->fcdefrecint->setPromedio($fcdefrecint['promedio']);
    }

    if (isset($fcdefrecint['codrec']))
    {
      $this->fcdefrecint->setCodrec($fcdefrecint['codrec']);
    }
    if (isset($fcdefrecint['nomrec']))
    {
      $this->fcdefrecint->setNomrec($fcdefrecint['nomrec']);
    }
    if (isset($fcdefrecint['tipo']))
    {
      $this->fcdefrecint->setTipo($fcdefrecint['tipo']);
    }
    if (isset($fcdefrecint['modo']))
    {
      $this->fcdefrecint->setModo($fcdefrecint['modo']);
    }
    if (isset($fcdefrecint['periodo']))
    {
      $this->fcdefrecint->setPeriodo($fcdefrecint['periodo']);
    }
    if (isset($fcdefrecint['promedio']))
    {
      $this->fcdefrecint->setPromedio("S");
    }
    else
    {
      $this->fcdefrecint->setPromedio("N");
    }

  }

}
