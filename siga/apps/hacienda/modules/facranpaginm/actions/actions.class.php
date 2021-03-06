<?php

/**
 * Facranpaginm actions.
 *
 * @package    Roraima
 * @subpackage Facranpaginm
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 52085 2013-06-03 16:44:29Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FacranpaginmActions extends autoFacranpaginmActions
{
  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();
    $this->processFilters();
    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fcranpaginm/filters');
     // 15    // pager
    $this->pager = new sfPropelPager('Fcvalinm', 15);
    $c = new Criteria();
	    $c->addSelectColumn(FcvalinmPeer::CODZON);
	    $c->addSelectColumn(FcvalinmPeer::DESZON);
	    $c->addSelectColumn("0 AS CODTIP");
            $c->addSelectColumn("0 AS DESTIP");
	    $c->addSelectColumn("0 AS VALMTR");
	    $c->addSelectColumn("0 AS VALFIS");
	    $c->addSelectColumn("0 AS ALITIP");
	    $c->addSelectColumn("0 AS ANUAL");
	    $c->addSelectColumn("0 AS ALITIPT");
	    $c->addSelectColumn("0 AS ANUALT");
	    $c->addSelectColumn(FcvalinmPeer::ANOVIG);
	    $c->addSelectColumn("0 AS PORVALFIS");
	    $c->addSelectColumn("0 AS ID");
	    $c->addGroupByColumn(FcvalinmPeer::CODZON);
	    $c->addGroupByColumn(FcvalinmPeer::DESZON);
            $c->addGroupByColumn(FcvalinmPeer::ANOVIG);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  /*public function executeDelete()
  {
    $id=H::getXx_vacio(array('codzon','anovig'),'Fcvalinm','id',array($this->getRequestParameter('codzon'),$this->getRequestParameter('anovig')));
    try
    {
      $c = new Criteria();
      $c->add(FcvalinmPeer::CODZON,$this->getRequestParameter('codzon'));
      $c->add(FcvalinmPeer::ANOVIG,$this->getRequestParameter('anovig'));
      FcvalinmPeer::doDelete($c);

      $this->SalvarBitacora($id ,'Elimino');

    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se puede eliminar porque tiene registros asociados.');
      return $this->forward('facranpaginm', 'list');
    }
    return $this->forward('facranpaginm', 'list');
   }*/

  public function executeDelete()
  {
    $t= new Criteria();
    $t->add(FcvalinmPeer::CODZON,$this->getRequestParameter('codzon'));
    $t->add(FcvalinmPeer::ANOVIG,$this->getRequestParameter('anovig'));
    $this->fcvalinm= FcvalinmPeer::doSelectOne($t);


    //$this->fcvalinm = FcvalinmPeer::retrieveByPk($this->getRequestParameter('id'));

    $id= $this->fcvalinm->getId();//H::getXx_vacio(array('codzon','anovig'),'Fcvalinm','id',array($this->getRequestParameter('codzon'),$this->getRequestParameter('anovig')));
    $this->forward404Unless($this->fcvalinm);

    try
    {
      $this->deleteFcvalinm($this->fcvalinm);
      //$id= $this->fcvalinm->getId();
      $this->SalvarBitacora($id ,'Elimino');
   }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('facranpaginm', 'list');
    }


    return $this->forward('facranpaginm', 'list');
  }

  protected function getFcvalinmOrCreate($id = 'id', $codzon = 'codzon', $anovig = 'anovig')
  {
    if (!$this->getRequestParameter($codzon))
    {
      $fcvalinm = new Fcvalinm();
    }
    else
	    {
	    	$fcvalinm_valor = $this->getRequestParameter('fcvalinm');
	    	if ($this->getRequestParameter($codzon)=="")
	    	    $cod_zona=$fcvalinm_valor['codzon'];
	    	else
	    	    $cod_zona=$this->getRequestParameter($codzon);
        $id=Herramientas::getX_vacio(array('codzon','anovig'), 'Fcvalinm', 'id', array($this->getRequestParameter($codzon),$this->getRequestParameter($anovig)));
            $fcvalinm = FcvalinmPeer::retrieveByPk($id);
	        $this->forward404Unless($fcvalinm);
	    }
	    return $fcvalinm;
  }


  // Para incluir funcionalidades al executeEdit()
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
     $this->configGrid($this->fcvalinm->getCodzon(),$this->fcvalinm->getAnovig());
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
  public function deleting($fcvalinm)
  {
	$c = new Criteria();
	$c->add(FcvalinmPeer::CODZON,$fcvalinm->getCodzon());
        $c->add(FcvalinmPeer::ANOVIG,$fcvalinm->getAnovig());
	FcvalinmPeer::doDelete($c);

    return -1;

   }

 /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codzon='', $anovig='')
  {
    $c = new Criteria();
    $c->add(FcvalinmPeer::CODZON,$codzon);
    $c->add(FcvalinmPeer::ANOVIG,$anovig);
    $c->addDescendingOrderByColumn(FcvalinmPeer::DESZON);
    $per = FcvalinmPeer::doSelect($c);


    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facranpaginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fcvalinm->setGrid($this->grid);
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
    $ajax   = $this->getRequestParameter('ajax','');
    $numper="";
    $denumper="";
    $numvic="";
    $nivinm="";
    $nomext1="";
    $nomabr1="";
    $tamano1="1";
    $nomext2="";
    $nomabr2="";
    $tamano2="1";
    $nomext3="";
    $nomabr3="";
    $tamano3="1";
    $nomext4="";
    $nomabr4="";
    $tamano4="1";
    $nomext5="";
    $nomabr5="";
    $tamano5="1";
    $nomext6="";
    $nomabr6="";
    $tamano6="1";
    $nomext7="";
    $nomabr7="";
    $tamano7="1";
    $nomext8="";
    $nomabr8="";
    $tamano8="1";
    $nomext9="";
    $nomabr9="";
    $tamano9="1";
    $nomext10="";
    $nomabr10="";
    $tamano10="1";

	$parr = substr($codigo,0,4);
	$mun = substr($codigo,5,4);
	$est = substr($codigo,10,4);
	$pais = substr($codigo,15,4);

    switch ($ajax){
      case '1':
        $result=array();
        $sql = "Select " .
        		"numper,denumper,numniv,nivinm," .
        		"nomext1,nomabr1,tamano1," .
        		"nomext2,nomabr2,tamano2," .
        		"nomext3,nomabr3,tamano3," .
        		"nomext4,nomabr4,tamano4," .
        		"nomext5,nomabr5,tamano5," .
        		"nomext6,nomabr6,tamano6," .
        		"nomext7,nomabr7,tamano7," .
        		"nomext8,nomabr8,tamano8," .
        		"nomext9,nomabr9,tamano9," .
        		"nomext10,nomabr10,tamano10 " .
        		"from FCDEFNCA where ( CodPar='".$parr."' AND CodMun='".$mun."' AND CodEdo='".$est."'  AND CodPai='".$pais."')";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $numper=$result[0]['numper'];
          $denumper=$result[0]['denumper'];
        }
        $output = '[["fcdefnca_nomext1","'.$nomext1.'",""],' .
        		  '["fcdefnca_nivinm","'.$nivinm.'",""]]';
        break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
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
    if($this->getRequest()->getMethod() == sfRequest::POST){
     $this->fcvalinm = $this->getFcvalinmOrCreate();
      try{ $this->updateFcvalinmFromRequest();}
      catch (Exception $ex){}
      if ($this->getRequestParameter('id')=="")
      {
        $result=array();
        $sql = "SELECT codzon, anovig FROM fcvalinm WHERE anovig ='".$this->getRequestParameter('fcvalinm[anovig]')."' and codzon='".$this->getRequestParameter('fcvalinm[codzon]')."'";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $this->coderr=724;
        }
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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);

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
  public function saving($fcvalinm)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Hacienda::salvar_grid_Fcranpaginm($fcvalinm, $grid);
    return -1;
  }



  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->fcvalinm = $this->getFcvalinmOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcvalinmFromRequest();

      if($this->saveFcvalinm($this->fcvalinm) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

        $t= new Criteria();
        $t->add(FcvalinmPeer::CODZON,$this->fcvalinm->getCodzon());
        $t->add(FcvalinmPeer::ANOVIG,$this->fcvalinm->getAnovig());
        $reg= FcvalinmPeer::doSelectOne($t);

        $id_buscado=$reg->getId();

		 $id= $this->fcvalinm->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('facranpaginm/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('facranpaginm/list');
        }
        else
        {
            return $this->redirect('facranpaginm/edit?id='.$id_buscado.'&codzon='.$this->fcvalinm->getCodzon().'&anovig='.$this->fcvalinm->getAnovig());
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


}
