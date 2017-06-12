<?php

/**
 * farecart actions.
 *
 * @package    Roraima
 * @subpackage farecart
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class farecartActions extends autofarecartActions
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

        $mascaraarticulo=$this->mascaraarticulo;
        $longart=strlen($this->mascaraarticulo);

        $c = new Criteria();
        if ($this->getRequestParameter('recargo') != "")
                $criterio = $this->getRequestParameter('recargo');
        else
            $criterio = $this->farecart->getCodrgo();
        $c->add(FarecartPeer::CODRGO,$criterio);
        $per = FarecartPeer::doSelect($c);

        $mascaraarticulo=$this->mascaraarticulo;

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/farecart/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_art');

        $this->obj = $this->columnas[0]->getConfig($per);

        $this->farecart->setObj($this->obj);

  }


	/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	    {
			$dato=FarecargPeer::getRecargo($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
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

    //$this->configGrid($grid[0],$grid[1]);

  }


  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $c = new Criteria();
    $c->add(FarecartPeer::CODRGO,$this->getRequestParameter('recargo'));
    $datos = FarecartPeer::doSelect($c);
    $this->forward404Unless($datos);

    try
    {
       if ($datos)
       {
    	foreach ($datos as $farecart)
    	{
           $farecart->delete();
    	}
    	$this->SalvarBitacora($this->getRequestParameter('id') ,'Elimino');
    }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Faartpvp. Make sure it does not have any associated items.');
      return $this->forward('farecart', 'list');
    }

    return $this->redirect('farecart/list');
  }

   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->farecart = $this->getFarecartOrCreate();

    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFarecartFromRequest();
      $this->saveFarecart($this->farecart);

      $this->farecart->setId(Herramientas::getX_vacio('codrgo','farecart','id',$this->farecart->getCodrgo()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

 	  if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('farecart/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('farecart/list');
      }
      else
      {
        //return $this->redirect('farecart/edit?id='.$this->farecart->getId());
        return $this->redirect('farecart/edit?id='.$this->farecart->getId().'&recargo='.$this->farecart->getCodrgo());
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

 /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveFarecart($farecart)
  {
		$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
		Facturacionv2::salvarFarecart($farecart,$grid,$this->farecart->getCodrgo());
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->farecart = $this->getFarecartOrCreate();
    $this->updateFarecartFromRequest();
   	$this->configGrid();

    $this->labels = $this->getLabels();
	if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('',$err);
      }
    return sfView::SUCCESS;
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

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       $this->farecart = $this->getFarecartOrCreate();
       try{
	     $this->updateFarecartFromRequest();
          }

    catch(Exception $ex){}

       if ($this->farecart->getCodrgo() == ""){
          $this->coderror=1101;
          return false;
       }
   	   $this->configGrid();

       $grid=Herramientas::CargarDatosGridv2($this,$this->obj);


       if ($this->ValidarDatosVaciosenGrid($grid,&$error))
           {
              $this->coderror=$error;
              return false;
           }
       return true;
      } else return true;
  }

   public function ValidarDatosVaciosenGrid($grid,&$error)
   {
      $error=-1;
      $x=$grid[0];
      $j=0;
      $codcatvacio=false;

      if (count($x)==0)
      {
         $error=178;
         return true;
      }
      if ($codcatvacio)
        return true;
      else
        return false;
  }

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/farecart/filters');

	$this->pager = new sfPropelPager('Farecart', 10);
	$c = new Criteria();
	$c->clearSelectColumns();
	$c->clearGroupByColumns();
	$c->Setdistinct();
	$c->addSelectColumn(FarecartPeer::CODRGO);
	$c->addSelectColumn(FarecargPeer::NOMRGO);
	$c->addSelectColumn('0');
	$c->addJoin(FarecartPeer::CODRGO,FarecargPeer::CODRGO);
	$c->addGroupByColumn(FarecartPeer::CODRGO);
	$c->addGroupByColumn(FarecargPeer::NOMRGO);
	$this->addSortCriteria($c);
	$this->addFiltersCriteria($c);
	$this->pager->setCriteria($c);
	$this->pager->setPage($this->getRequestParameter('page', 1));
	$this->pager->init();

  }

  protected function getFarecartOrCreate($id = 'id', $recargo = 'recargo')
  {
    if (!$this->getRequestParameter($recargo) )
    {
      $farecart = new Farecart();
    }
    else
    {
      //$caretser = CaretserPeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
  	  $c->add(FarecartPeer::CODRGO,$this->getRequestParameter($recargo));
  	  $farecart = FarecartPeer::doSelectOne($c);
      $this->forward404Unless($farecart);
    }

    return $farecart;
  }
  
    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";

    switch ($col) {
          case '1':
            $varop=$grid[$fila][$col-1];
            $c= new Criteria();
            $c->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
            $reg= CaregartPeer::doSelectOne($c);
            if ($reg) {
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                  $grid[$fila][1]=$reg->getDesart();
              }else {
                 $grid[$fila][$col-1]="";
                 $grid[$fila][1]="";
                 $javascript="alert('El Articulo esta Repetido');";
              }
            }else {
                $grid[$fila][$col-1]="";
                $grid[$fila][1]="";
                $javascript="alert('El Articulo no Existe ...');";
            }
       
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }  


}
