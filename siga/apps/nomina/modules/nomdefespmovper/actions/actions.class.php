<?php

/**
 * nomdefespmovper actions.
 *
 * @package    Roraima
 * @subpackage nomdefespmovper
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespmovperActions extends autonomdefespmovperActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npdefmov/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomina', 10);
    $c = new Criteria();
    $c->addJoin(NpdefmovPeer::CODNOM,NpnominaPeer::CODNOM);
	$c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npdefmov = $this->getNpdefmovOrCreate();
    $this->configGrid($this->npdefmov->getCodnom());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpdefmovFromRequest();

      $this->saveNpdefmov($this->npdefmov);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespmovper/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespmovper/list');
      }
      else
      {
        return $this->redirect('nomdefespmovper/edit?id='.$this->npdefmov->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function getNpdefmovOrCreate($id = 'id', $nomina = 'nomina')
  {
    if (!$this->getRequestParameter($nomina))
    {
      $npdefmov = new Npdefmov();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(NpdefmovPeer::CODNOM,$this->getRequestParameter($nomina));
  	  $npdefmov = NpdefmovPeer::doSelectOne($c);
      $this->forward404Unless($npdefmov);
    }

    return $npdefmov;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpdefmovFromRequest()
  {
    $npdefmov = $this->getRequestParameter('npdefmov');
    $this->configGrid($npdefmov['codnom']);

    if (isset($npdefmov['codnom']))
    {
      $this->npdefmov->setCodnom($npdefmov['codnom']);
    }
    if (isset($npdefmov['nomnom']))
    {
      $this->npdefmov->setNomnom($npdefmov['nomnom']);
    }
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
    $this->npdefmov = $this->getNpdefmovOrCreate();
    $this->updateNpdefmovFromRequest();

    $this->labels = $this->getLabels();

    Herramientas::CargarDatosGrid($this,$this->obj);

    return sfView::SUCCESS;
  }

   /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $c = new Criteria();
  	$c->add(NpdefmovPeer::CODNOM,$this->getRequestParameter('nomina'));
    $this->npdefmov = NpdefmovPeer::doSelectOne($c);

    $this->forward404Unless($this->npdefmov);

    try
    {
      $this->deleteNpdefmov($this->npdefmov);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npdefmov. Make sure it does not have any associated items.');
      return $this->forward('nomdefespmovper', 'list');
    }

    return $this->redirect('nomdefespmovper/list');
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
  protected function saveNpdefmov($npdefmov)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
	Nomina::salvarNomdefmov($npdefmov,$grid);
  }

  protected function deleteNpdefmov($npdefmov)
  {
    $npdefmov->delete();
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
	    $dato="";
	    $existe="N";
		$c= new Criteria();
		$c->add(NpdefmovPeer::CODNOM,$this->getRequestParameter('codigo'));
		$data= NpdefmovPeer::doSelect($c);
		if (empty($data))
		{
		 $dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
		 $this->configGrid($this->getRequestParameter('codigo'));
		 $output = '[["dupli","'.$existe.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		}
		else
		{
		  $existe="S";
		  $this->configGrid();
		  $output = '[["dupli","'.$existe.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
		  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		  //return sfView::HEADER_ONLY;
		}

	  }
	}


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codnom= '')
  {
    $sql="Select a.codcon as codcon ,b.nomcon as nomcon, coalesce((select 1 as checkm
		  from  npdefmov where codnom='".$codnom."' and status='M' and a.codnom = codnom and codcon = a.codcon  ),0) as monto,
          coalesce((select 1 as checkc from  npdefmov where codnom='".$codnom."' and status='C' and a.codnom = codnom and codcon = a.codcon  ),0) as cantidad,
          9 as id	 from Npasiconnom a, npdefcpt b
          where a.codnom='".$codnom."' and a.codcon=b.codcon order by a.codcon";

	$resp = Herramientas::BuscarDatos($sql,$reg);

	$opciones = new OpcionesGrid();
	$opciones->setTabla('Npdefmov');
	$opciones->setAnchoGrid(500);
	$opciones->setTitulo('');
	$opciones->setHTMLTotalFilas(' ');
	$opciones->setFilas(0);

	$col1 = new Columna('Código');
	$col1->setTipo(Columna::TEXTO);
	$col1->setAlineacionObjeto(Columna::IZQUIERDA);
	$col1->setAlineacionContenido(Columna::IZQUIERDA);
	$col1->setNombreCampo('Codcon');
	$col1->setEsGrabable(true);
	$col1->setHTML('type="text" size="5" readonly=true');

	$col2 = new Columna('Nombre del Concepto');
	$col2->setTipo(Columna::TEXTO);
	$col2->setAlineacionObjeto(Columna::IZQUIERDA);
	$col2->setAlineacionContenido(Columna::IZQUIERDA);
	$col2->setNombreCampo('Nomcon');
	$col2->setHTML('type="text" size="45" readonly=true');

	$col3 = new Columna('Monto');
	$col3->setTipo(Columna::CHECK);
	$col3->setEsGrabable(true);
	$col3->setNombreCampo('monto');
	$col3->setHTML(' ');

	$col4 = new Columna('Cantidad');
	$col4->setTipo(Columna::CHECK);
	$col4->setEsGrabable(true);
	$col4->setNombreCampo('cantidad');
	$col4->setHTML(' ');

	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);

	$this->obj = $opciones->getConfig($reg);
   }

  public function executeAutocomplete()
  {
	if ($this->getRequestParameter('ajax')=='1')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npdefmov[codnom]'));
	}
  }

}
