<?php
// auto-generated by PropelCidesa
// date: 2017/02/17 10:32:03
?>
<?php

/**
 * autoFapedido actions.
 *
 * @package    Roraima
 * @subpackage autoFapedido 
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 43817 2011-04-22 21:28:42Z cramirez $
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 * @copyright  Copyright 2007, Cide S.A.
 */
class autoFapedidoActions extends sfActions
{

  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
  protected $coderr = -1;

  public function executeIndex()
  {
    return $this->forward('fapedido', 'list');
  }

  /**
   * Función para incluir funcionalidades adicionales en el executeList.
   * Esta funcion debe ser reescrita en la clase que hereda.
   *
   */
  protected function listing()
  {     


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

    $this->listing();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fapedido/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Fapedido', 15);
    $c = new Criteria();
    $this->c ? $c=$this->c : '';
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function executeCreate()
  {
    return $this->forward('fapedido', 'edit');
  }

  /**
   * Función principal para el manejo de la acción save
   * del formulario.
   *
   */
  public function executeSave()
  {

    return $this->forward('fapedido', 'edit');

  }

  /**
   * Función para incluir funcionalidades adicionales en el executeEdit.
   * Esta funcion debe ser reescrita en la clase que hereda.
   *
   */
  protected function editing()
  {


  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->fapedido = $this->getFapedidoOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFapedidoFromRequest();

      if($this->saveFapedido($this->fapedido) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->fapedido->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('fapedido/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('fapedido/list');
        }
        else
        {
            return $this->redirect('fapedido/edit?id='.$this->fapedido->getId());
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

  public function executeDelete()
  {
    $this->fapedido = FapedidoPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->fapedido);

    try
    {
      $this->deleteFapedido($this->fapedido);
      $id= $this->fapedido->getId();
      $this->SalvarBitacora($id ,'Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('fapedido', 'list');
    }


    return $this->forward('fapedido', 'list');
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->fapedido = $this->getFapedidoOrCreate();
    $this->updateFapedidoFromRequest();
	$this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  }

  /**
   * Función para manejar de el salvado de registros del formulario.
   * cabe destacar que llama internamente a la función $this->saving
   * que es reescrita en la clase que hereda con el proceso que el usuario
   * necesite implementar.
   * Esta función saving siempre debe retornar un valor >=-1.
   *
   */
  protected function saveFapedido($fapedido)
  {

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      $this->coderr = $this->saving($fapedido);


      if(is_array($this->coderr)){
        foreach ($this->coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->updateError();}
          return sfView::SUCCESS;
      }elseif($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
        $this->updateError();
        return sfView::SUCCESS;
      }else
      return -1;

    } catch (Exception $ex) {

      $this->coderr = 0;
      $err = Herramientas::obtenerMensajeError($this->coderr);
      $this->getRequest()->setError('',$err);
      $this->updateError();
    return sfView::SUCCESS;
    }


  }

  /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de guardado adecuado para cada formulario.
   *
   */
  protected function saving($fapedido)
  {
    $fapedido->save();
    return -1;

  }

  /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de eliminación adecuado para cada formulario.
   *
   */
  protected function deleting($fapedido)
  {
  	$fapedido->delete();
    return -1;

  }

  /**
   * Función para manejar la eliminación de registros del formulario.
   * cabe destacar que llama internamente a la función $this->deleting
   * que es reescrita en la clase que hereda con el proceso que el usuario
   * necesite implementar.
   * Esta función deleting siempre debe retornar un valor >=-1.
   *
   */
  protected function deleteFapedido($fapedido)
  {
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      $this->coderr = $this->deleting($fapedido);

      if(is_array($this->coderr)){
        foreach ($this->coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('delete',$err);
          $this->updateError();
        }
      }elseif($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('delete',$err);
        $this->updateError();
      }

      //return -1;

    } catch (Exception $ex) {
      $this->coderr = 6;
      $err = Herramientas::obtenerMensajeError($this->coderr);
      $this->getRequest()->setError('delete',$err);
      $this->updateError();
    }

  }

  // Funcion para validar los datos de la vista luego de detectado un error
  // se usa por ejemplo para recargar la informacion y configuración de un grid
  protected function updateError()
  {
    return true;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el obejto del modelo base del formulario.
   *
   */
  protected function updateFapedidoFromRequest()
  {
    $fapedido = $this->getRequestParameter('fapedido');

    $fields = FapedidoPeer::getFieldNames();

    if(array_search('Codalmusu', $fields))
    {
      if (isset($fapedido['codalmusu']))
      {
        $this->fapedido->setCodalmusu($fapedido['codalmusu']);
      }
    }
    if (isset($fapedido['nroped']))
    {
      $this->fapedido->setNroped($fapedido['nroped']);
    }
    if (isset($fapedido['fecped']))
    {
      if ($fapedido['fecped'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['fecped']))
          {
            $value = $dateFormat->format($fapedido['fecped'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fapedido['fecped'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setFecped($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setFecped(null);
      }
    }
    if (isset($fapedido['tipref']))
    {
      $this->fapedido->setTipref($fapedido['tipref']);
    }
    if (isset($fapedido['refped']))
    {
      $this->fapedido->setRefped($fapedido['refped']);
    }
    if (isset($fapedido['rifpro']))
    {
      $this->fapedido->setRifpro($fapedido['rifpro']);
    }
    if (isset($fapedido['nitcli']))
    {
      $this->fapedido->setNitcli($fapedido['nitcli']);
    }
    if (isset($fapedido['dircli']))
    {
      $this->fapedido->setDircli($fapedido['dircli']);
    }
    if (isset($fapedido['telcli']))
    {
      $this->fapedido->setTelcli($fapedido['telcli']);
    }
    if (isset($fapedido['desped']))
    {
      $this->fapedido->setDesped($fapedido['desped']);
    }
    if (isset($fapedido['coddirec']))
    {
      $this->fapedido->setCoddirec($fapedido['coddirec']);
    }
    if (isset($fapedido['codprg']))
    {
      $this->fapedido->setCodprg($fapedido['codprg']);
    }
    if (isset($fapedido['monped']))
    {
      $this->fapedido->setMonped($fapedido['monped']);
    }
    if (isset($fapedido['combo']))
    {
      $this->fapedido->setCombo($fapedido['combo']);
    }
    if (isset($fapedido['fecicon']))
    {
      if ($fapedido['fecicon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['fecicon']))
          {
            $value = $dateFormat->format($fapedido['fecicon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fapedido['fecicon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setFecicon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setFecicon(null);
      }
    }
    if (isset($fapedido['fecfcon']))
    {
      if ($fapedido['fecfcon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['fecfcon']))
          {
            $value = $dateFormat->format($fapedido['fecfcon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fapedido['fecfcon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setFecfcon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setFecfcon(null);
      }
    }
    if (isset($fapedido['exeiva']))
    {
      $this->fapedido->setExeiva($fapedido['exeiva']);
    }
    if (isset($fapedido['fecdes']))
    {
      if ($fapedido['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['fecdes']))
          {
            $value = $dateFormat->format($fapedido['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fapedido['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setFecdes(null);
      }
    }
    if (isset($fapedido['fechas']))
    {
      if ($fapedido['fechas'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['fechas']))
          {
            $value = $dateFormat->format($fapedido['fechas'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fapedido['fechas'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setFechas($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setFechas(null);
      }
    }
    if (isset($fapedido['codedo']))
    {
      $this->fapedido->setCodedo($fapedido['codedo']);
    }
    if (isset($fapedido['codciu']))
    {
      $this->fapedido->setCodciu($fapedido['codciu']);
    }
    if (isset($fapedido['codmun']))
    {
      $this->fapedido->setCodmun($fapedido['codmun']);
    }
    if (isset($fapedido['codpar']))
    {
      $this->fapedido->setCodpar($fapedido['codpar']);
    }
    if (isset($fapedido['grid_fargoped']))
    {
      $this->fapedido->setGridFargoped($fapedido['grid_fargoped']);
    }
    if (isset($fapedido['totrec']))
    {
      $this->fapedido->setTotrec($fapedido['totrec']);
    }
    if (isset($fapedido['grid']))
    {
      $this->fapedido->setGrid($fapedido['grid']);
    }
    if (isset($fapedido['grid_fafecped']))
    {
      $this->fapedido->setGridFafecped($fapedido['grid_fafecped']);
    }
    if (isset($fapedido['obsped']))
    {
      $this->fapedido->setObsped($fapedido['obsped']);
    }

    if (isset($fapedido['nroped']))
    {
      $this->fapedido->setNroped($fapedido['nroped']);
    }
    if (isset($fapedido['fecped']))
    {
      if ($fapedido['fecped'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['fecped']))
          {
            $value = $dateFormat->format($fapedido['fecped'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fapedido['fecped'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setFecped($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setFecped(null);
      }
    }
    if (isset($fapedido['refped']))
    {
      $this->fapedido->setRefped($fapedido['refped']);
    }
    if (isset($fapedido['tipref']))
    {
      $this->fapedido->setTipref($fapedido['tipref']);
    }
    if (isset($fapedido['codcli']))
    {
    $this->fapedido->setCodcli($fapedido['codcli'] ? $fapedido['codcli'] : null);
    }
    if (isset($fapedido['desped']))
    {
      $this->fapedido->setDesped($fapedido['desped']);
    }
    if (isset($fapedido['monped']))
    {
      $this->fapedido->setMonped($fapedido['monped']);
    }
    if (isset($fapedido['obsped']))
    {
      $this->fapedido->setObsped($fapedido['obsped']);
    }
    if (isset($fapedido['reapor']))
    {
      $this->fapedido->setReapor($fapedido['reapor']);
    }
    if (isset($fapedido['status']))
    {
      $this->fapedido->setStatus($fapedido['status']);
    }
    if (isset($fapedido['fecanu']))
    {
      if ($fapedido['fecanu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['fecanu']))
          {
            $value = $dateFormat->format($fapedido['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fapedido['fecanu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setFecanu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setFecanu(null);
      }
    }
    if (isset($fapedido['fecicon']))
    {
      if ($fapedido['fecicon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['fecicon']))
          {
            $value = $dateFormat->format($fapedido['fecicon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fapedido['fecicon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setFecicon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setFecicon(null);
      }
    }
    if (isset($fapedido['fecfcon']))
    {
      if ($fapedido['fecfcon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['fecfcon']))
          {
            $value = $dateFormat->format($fapedido['fecfcon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fapedido['fecfcon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setFecfcon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setFecfcon(null);
      }
    }
    if (isset($fapedido['codprg']))
    {
      $this->fapedido->setCodprg($fapedido['codprg']);
    }
    if (isset($fapedido['conpag_id']))
    {
      $this->fapedido->setConpagId($fapedido['conpag_id']);
    }
    if (isset($fapedido['numcar']))
    {
      $this->fapedido->setNumcar($fapedido['numcar']);
    }
    if (isset($fapedido['nrodon']))
    {
      $this->fapedido->setNrodon($fapedido['nrodon']);
    }
    if (isset($fapedido['codalmusu']))
    {
    $this->fapedido->setCodalmusu($fapedido['codalmusu'] ? $fapedido['codalmusu'] : null);
    }
    if (isset($fapedido['created_at']))
    {
      if ($fapedido['created_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['created_at']))
          {
            $value = $dateFormat->format($fapedido['created_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $fapedido['created_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setCreatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setCreatedAt(null);
      }
    }
    if (isset($fapedido['updated_at']))
    {
      if ($fapedido['updated_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['updated_at']))
          {
            $value = $dateFormat->format($fapedido['updated_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $fapedido['updated_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setUpdatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setUpdatedAt(null);
      }
    }
    if (isset($fapedido['created_by_user']))
    {
      $this->fapedido->setCreatedByUser($fapedido['created_by_user']);
    }
    if (isset($fapedido['updated_by_user']))
    {
      $this->fapedido->setUpdatedByUser($fapedido['updated_by_user']);
    }
    if (isset($fapedido['fecdes']))
    {
      if ($fapedido['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['fecdes']))
          {
            $value = $dateFormat->format($fapedido['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fapedido['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setFecdes(null);
      }
    }
    if (isset($fapedido['fechas']))
    {
      if ($fapedido['fechas'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fapedido['fechas']))
          {
            $value = $dateFormat->format($fapedido['fechas'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fapedido['fechas'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fapedido->setFechas($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fapedido->setFechas(null);
      }
    }
    if (isset($fapedido['codedo']))
    {
      $this->fapedido->setCodedo($fapedido['codedo']);
    }
    if (isset($fapedido['codciu']))
    {
      $this->fapedido->setCodciu($fapedido['codciu']);
    }
    if (isset($fapedido['codmun']))
    {
      $this->fapedido->setCodmun($fapedido['codmun']);
    }
    if (isset($fapedido['codpar']))
    {
      $this->fapedido->setCodpar($fapedido['codpar']);
    }
    if (isset($fapedido['coddirec']))
    {
      $this->fapedido->setCoddirec($fapedido['coddirec']);
    }

    if (isset($fapedido['reapor']))
    {
      $this->fapedido->setReapor($fapedido['reapor']);
    }
    if (isset($fapedido['codcli']))
    {
    $this->fapedido->setCodcli($fapedido['codcli'] ? $fapedido['codcli'] : null);
    }
    if (isset($fapedido['entrega']))
    {
      $this->fapedido->setEntrega($fapedido['entrega']);
    }
    if (isset($fapedido['codpai']))
    {
      $this->fapedido->setCodpai($fapedido['codpai']);
    }
    if (isset($fapedido['filactrec']))
    {
      $this->fapedido->setFilactrec($fapedido['filactrec']);
    }
    if (isset($fapedido['trajo']))
    {
      $this->fapedido->setTrajo($fapedido['trajo']);
    }

  }

  /**
   * Retorna el registro del modelo del formulario
   * Identifica si es un registro nuevo o actual, y lo retorna
   *
   */
  protected function getFapedidoOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $fapedido = new Fapedido();
    }
    else
    {
      $fapedido = FapedidoPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($fapedido);
    }

    return $fapedido;
  }

  /**
   * Función para procesar los filtros aplicados a la lista de registros
   *
   */
  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');
      if (isset($filters['fecped']['from']) && $filters['fecped']['from'] !== '')
      {
        $filters['fecped']['from'] = sfI18N::getTimestampForCulture($filters['fecped']['from'], $this->getUser()->getCulture());
      }
      if (isset($filters['fecped']['to']) && $filters['fecped']['to'] !== '')
      {
        $filters['fecped']['to'] = sfI18N::getTimestampForCulture($filters['fecped']['to'], $this->getUser()->getCulture());
      }

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/fapedido/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/fapedido/filters');
    }
  }

  /**
   * Función para procesar el orden de los registros en la lista
   *
   */
  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/fapedido/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/fapedido/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/fapedido/sort'))
    {
      $this->getUser()->setAttribute('sort', 'nroped', 'sf_admin/fapedido/sort');
      $this->getUser()->setAttribute('type', 'asc', 'sf_admin/fapedido/sort');
    }
  }

  /**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['nroped_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapedidoPeer::NROPED, '');
      $criterion->addOr($c->getNewCriterion(FapedidoPeer::NROPED, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nroped']) && $this->filters['nroped'] !== '')
    {
      $c->add(FapedidoPeer::NROPED, strtr("%".$this->filters['nroped']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecped_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapedidoPeer::FECPED, '');
      $criterion->addOr($c->getNewCriterion(FapedidoPeer::FECPED, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecped']))
    {
      if (isset($this->filters['fecped']['from']) && $this->filters['fecped']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(FapedidoPeer::FECPED, date('Y-m-d', $this->filters['fecped']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecped']['to']) && $this->filters['fecped']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(FapedidoPeer::FECPED, date('Y-m-d', $this->filters['fecped']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(FapedidoPeer::FECPED, date('Y-m-d', $this->filters['fecped']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['codcli_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapedidoPeer::CODCLI, '');
      $criterion->addOr($c->getNewCriterion(FapedidoPeer::CODCLI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcli']) && $this->filters['codcli'] !== '')
    {
      $c->add(FapedidoPeer::CODCLI, strtr("%".$this->filters['codcli']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nompro_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapedidoPeer::NOMPRO, '');
      $criterion->addOr($c->getNewCriterion(FapedidoPeer::NOMPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nompro']) && $this->filters['nompro'] !== '')
    {
      $c->add(FapedidoPeer::NOMPRO, $this->filters['nompro']);
    }
    if (isset($this->filters['refped_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapedidoPeer::REFPED, '');
      $criterion->addOr($c->getNewCriterion(FapedidoPeer::REFPED, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['refped']) && $this->filters['refped'] !== '')
    {
      $c->add(FapedidoPeer::REFPED, strtr("%".$this->filters['refped']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapedidoPeer::CODEDO, '');
      $criterion->addOr($c->getNewCriterion(FapedidoPeer::CODEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codedo']) && $this->filters['codedo'] !== '')
    {
      $c->add(FapedidoPeer::CODEDO, strtr("%".$this->filters['codedo']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapedidoPeer::NOMEDO, '');
      $criterion->addOr($c->getNewCriterion(FapedidoPeer::NOMEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomedo']) && $this->filters['nomedo'] !== '')
    {
      $c->add(FapedidoPeer::NOMEDO, $this->filters['nomedo']);
    }
    if (isset($this->filters['desped_is_empty']))
    {
      $criterion = $c->getNewCriterion(FapedidoPeer::DESPED, '');
      $criterion->addOr($c->getNewCriterion(FapedidoPeer::DESPED, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desped']) && $this->filters['desped'] !== '')
    {
      $c->add(FapedidoPeer::DESPED, strtr("%".$this->filters['desped']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
  }

  /**
   * Función para colocar el criterio de ordenación de la lista de registros
   * en la acción List
   *
   */
  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/fapedido/sort'))
    {
      $sort_column = FapedidoPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/fapedido/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  /**
   * Función para retornar las etiquetas del formulario
   *
   */
  protected function getLabels()
  {
    $arreglo=array(
                  'fapedido{nroped}' => 'Número:',
              'fapedido{fecped}' => 'Fecha:',
              'fapedido{tipref}' => 'Refiere a:',
              'fapedido{refped}' => 'Referencia:',
              'fapedido{rifpro}' => 'C.I/R.I.F Cliente:',
              'fapedido{nitcli}' => 'N.I.T:',
              'fapedido{dircli}' => 'Dirección:',
              'fapedido{telcli}' => 'Teléfono:',
              'fapedido{desped}' => 'Descripción:',
              'fapedido{coddirec}' => 'Dirección:',
              'fapedido{codprg}' => 'Programa:',
              'fapedido{monped}' => 'Monto Total:',
              'fapedido{combo}' => 'Cargar Artículos en Combos:',
              'fapedido{fecicon}' => 'Fecha Ini. Con.:',
              'fapedido{fecfcon}' => 'Fecha Fin Con.:',
              'fapedido{exeiva}' => '¿Exento de Iva?:',
              'fapedido{fecdes}' => 'Desde:',
              'fapedido{fechas}' => 'Hasta:',
              'fapedido{codedo}' => 'Estado:',
              'fapedido{codciu}' => 'Ciudad:',
              'fapedido{codmun}' => 'Municipio:',
              'fapedido{codpar}' => 'Parroquia:',
                      'fapedido{grid_fargoped}' => '.:',
              'fapedido{totrec}' => 'Total Recargos:',
              'fapedido{grid}' => '.:',
                      'fapedido{grid_fafecped}' => '.:',
                      'fapedido{obsped}' => 'Observaciones:',
                          'fapedido{nroped}' => 'Número:',
              'fapedido{fecped}' => 'Fecha:',
              'fapedido{refped}' => 'Referencia:',
              'fapedido{tipref}' => 'Refiere a:',
              'fapedido{codcli}' => 'Cod. Cliente:',
              'fapedido{desped}' => 'Descripción:',
              'fapedido{monped}' => 'Monto Total:',
              'fapedido{obsped}' => 'Observaciones:',
              'fapedido{reapor}' => 'Reapor:',
              'fapedido{status}' => 'Status:',
              'fapedido{fecanu}' => 'Fecanu:',
              'fapedido{fecicon}' => 'Fecha Ini. Con.:',
              'fapedido{fecfcon}' => 'Fecha Fin Con.:',
              'fapedido{codprg}' => 'Programa:',
              'fapedido{conpag_id}' => 'Conpag:',
              'fapedido{numcar}' => 'Numcar:',
              'fapedido{nrodon}' => 'Nrodon:',
              'fapedido{codalmusu}' => 'Codalmusu:',
              'fapedido{created_at}' => 'Created at:',
              'fapedido{updated_at}' => 'Updated at:',
              'fapedido{created_by_user}' => 'Created by user:',
              'fapedido{updated_by_user}' => 'Updated by user:',
              'fapedido{fecdes}' => 'Desde:',
              'fapedido{fechas}' => 'Hasta:',
              'fapedido{codedo}' => 'Estado:',
              'fapedido{codciu}' => 'Ciudad:',
              'fapedido{codmun}' => 'Municipio:',
              'fapedido{codpar}' => 'Parroquia:',
              'fapedido{coddirec}' => 'Dirección:',
              'fapedido{id}' => 'Id:',
            );
   return $arreglo;
  }



  /**
   * Función para manejar el llamado Ajax automático con el
   * Helper Catalogo.
   *
   */
  public function executeCatalogo()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $clase = $this->getRequestParameter('clase','');
    $nombre = $this->getRequestParameter('name','');
    $campobase = $this->getRequestParameter('campobase','');
    $campoprincipal = $this->getRequestParameter('campoprincipal','');
    $camposecundario = $this->getRequestParameter('camposecundario','');

    $c = new Criteria();
    eval('$c->add('.ucfirst(strtolower($clase)).'Peer::'.strtoupper($campoprincipal).','.chr(39).$codigo.chr(39).');');
    eval('$peer = '.ucfirst(strtolower($clase)).'Peer::doSelectOne($c);');

  eval('$cajasec = "'.strtolower($nombre).'_'.strtolower($camposecundario).'";');
  eval('$cajaid = "'.strtolower($nombre).'_'.strtolower($campobase).'";');
  if ($peer){
  eval('$valsec = $peer->get'.H::ObtenerNombreCampo($camposecundario).'();');
  eval('$valid = $peer->getId();');}
  else{
    $valsec='';
    $valid='';
  }
  $output = '[["'.$cajasec.'","'.$valsec.'",""],["'.$cajaid.'","'.$valid.'",""],["","",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  /**
   * Función para guardar la bitacora de la aplicacion
   * TODO: mejorar la carga de información en la bitacora
   * Actualmente esta planteada información no muy relevante
   *
   */
 public function SalvarBitacora($id, $acc)
  {
    try{
      $segbitaco= new Segbitaco();
      $fecha=date('Y-m-d');

      $segbitaco->setCodintusu($this->getUser()->getAttribute('usuario_id'));
      $segbitaco->setTipope(substr($acc, 0, 1));
      $segbitaco->setCodmod('fapedido');
      $segbitaco->setValcla('Fapedido');
      $segbitaco->setCodapl(substr(SF_APP, 0, 3));
      $segbitaco->setFecope($fecha);
      $segbitaco->setHorope(time('h:i:s'));
      $segbitaco->setRefmov($id);
      $segbitaco->save();
    }catch(Exception $e){

    }
  }

  public function Bitacora($acc)
  {
	$id= $this->fapedido->getId();
    $this->SalvarBitacora($id ,$acc);
  }






}

