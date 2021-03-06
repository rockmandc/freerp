<?php
// auto-generated by PropelCidesa
// date: 2017/02/17 10:35:44
?>
<?php

/**
 * autoAlmdefart actions.
 *
 * @package    Roraima
 * @subpackage autoAlmdefart 
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 43817 2011-04-22 21:28:42Z cramirez $
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 * @copyright  Copyright 2007, Cide S.A.
 */
class autoAlmdefartActions extends sfActions
{

  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
  protected $coderr = -1;

  public function executeIndex()
  {
    return $this->forward('almdefart', 'list');
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



     // 15    // pager
    $this->pager = new sfPropelPager('Cadefart', 15);
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
    return $this->forward('almdefart', 'edit');
  }

  /**
   * Función principal para el manejo de la acción save
   * del formulario.
   *
   */
  public function executeSave()
  {

    return $this->forward('almdefart', 'edit');

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
    $this->cadefart = $this->getCadefartOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCadefartFromRequest();

      if($this->saveCadefart($this->cadefart) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->cadefart->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('almdefart/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('almdefart/list');
        }
        else
        {
            return $this->redirect('almdefart/edit?id='.$this->cadefart->getId());
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
    $this->cadefart = CadefartPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->cadefart);

    try
    {
      $this->deleteCadefart($this->cadefart);
      $id= $this->cadefart->getId();
      $this->SalvarBitacora($id ,'Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('almdefart', 'list');
    }


    return $this->forward('almdefart', 'list');
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
    $this->cadefart = $this->getCadefartOrCreate();
    $this->updateCadefartFromRequest();
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
  protected function saveCadefart($cadefart)
  {

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      $this->coderr = $this->saving($cadefart);


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
  protected function saving($cadefart)
  {
    $cadefart->save();
    return -1;

  }

  /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de eliminación adecuado para cada formulario.
   *
   */
  protected function deleting($cadefart)
  {
  	$cadefart->delete();
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
  protected function deleteCadefart($cadefart)
  {
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      $this->coderr = $this->deleting($cadefart);

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
  protected function updateCadefartFromRequest()
  {
    $cadefart = $this->getRequestParameter('cadefart');

    $fields = CadefartPeer::getFieldNames();

    if(array_search('Codalmusu', $fields))
    {
      if (isset($cadefart['codalmusu']))
      {
        $this->cadefart->setCodalmusu($cadefart['codalmusu']);
      }
    }
    if (isset($cadefart['codemp']))
    {
      $this->cadefart->setCodemp($cadefart['codemp']);
    }
    if (isset($cadefart['nomemp']))
    {
      $this->cadefart->setNomemp($cadefart['nomemp']);
    }
    if (isset($cadefart['diremp']))
    {
      $this->cadefart->setDiremp($cadefart['diremp']);
    }
    if (isset($cadefart['tlfemp']))
    {
      $this->cadefart->setTlfemp($cadefart['tlfemp']);
    }
    if (isset($cadefart['tipfin']))
    {
      $this->cadefart->setTipfin($cadefart['tipfin']);
    }
    if (isset($cadefart['lonart']))
    {
      $this->cadefart->setLonart($cadefart['lonart']);
    }
    if (isset($cadefart['rupart']))
    {
      $this->cadefart->setRupart($cadefart['rupart']);
    }
    if (isset($cadefart['forart']))
    {
      $this->cadefart->setForart($cadefart['forart']);
    }
    if (isset($cadefart['desart']))
    {
      $this->cadefart->setDesart($cadefart['desart']);
    }
    if (isset($cadefart['forubi']))
    {
      $this->cadefart->setForubi($cadefart['forubi']);
    }
    if (isset($cadefart['desubi']))
    {
      $this->cadefart->setDesubi($cadefart['desubi']);
    }
    if (isset($cadefart['generaop']))
    {
      $this->cadefart->setGeneraop($cadefart['generaop']);
    }
    if (isset($cadefart['generacom']))
    {
      $this->cadefart->setGeneracom($cadefart['generacom']);
    }
    if (isset($cadefart['asiparrec']))
    {
      $this->cadefart->setAsiparrec($cadefart['asiparrec']);
    }
    if (isset($cadefart['corcom']))
    {
      $this->cadefart->setCorcom($cadefart['corcom']);
    }
    if (isset($cadefart['correc2']))
    {
      $this->cadefart->setCorrec2($cadefart['correc2']);
    }
    if (isset($cadefart['correq2']))
    {
      $this->cadefart->setCorreq2($cadefart['correq2']);
    }
    if (isset($cadefart['cordes2']))
    {
      $this->cadefart->setCordes2($cadefart['cordes2']);
    }
    if (isset($cadefart['corser']))
    {
      $this->cadefart->setCorser($cadefart['corser']);
    }
    if (isset($cadefart['corsol']))
    {
      $this->cadefart->setCorsol($cadefart['corsol']);
    }
    if (isset($cadefart['corcot2']))
    {
      $this->cadefart->setCorcot2($cadefart['corcot2']);
    }
    if (isset($cadefart['prcasopre']))
    {
      $this->cadefart->setPrcasopre($cadefart['prcasopre']);
    }
    if (isset($cadefart['prcreqapr']))
    {
      $this->cadefart->setPrcreqapr($cadefart['prcreqapr']);
    }
    if (isset($cadefart['comasopre']))
    {
      $this->cadefart->setComasopre($cadefart['comasopre']);
    }
    if (isset($cadefart['comreqapr']))
    {
      $this->cadefart->setComreqapr($cadefart['comreqapr']);
    }
    if (isset($cadefart['almcorre']))
    {
      $this->cadefart->setAlmcorre($cadefart['almcorre']);
    }
    if (isset($cadefart['forsnc']))
    {
      $this->cadefart->setForsnc($cadefart['forsnc']);
    }
    if (isset($cadefart['dessnc']))
    {
      $this->cadefart->setDessnc($cadefart['dessnc']);
    }
    if (isset($cadefart['reqreqapr']))
    {
      $this->cadefart->setReqreqapr($cadefart['reqreqapr']);
    }
    if (isset($cadefart['solreqapr']))
    {
      $this->cadefart->setSolreqapr($cadefart['solreqapr']);
    }
    if (isset($cadefart['corent']))
    {
      $this->cadefart->setCorent($cadefart['corent']);
    }
    if (isset($cadefart['corsal']))
    {
      $this->cadefart->setCorsal($cadefart['corsal']);
    }
    if (isset($cadefart['gencorart']))
    {
      $this->cadefart->setGencorart($cadefart['gencorart']);
    }
    if (isset($cadefart['tipdocpre']))
    {
      $this->cadefart->setTipdocpre($cadefart['tipdocpre']);
    }
    if (isset($cadefart['cornac']))
    {
      $this->cadefart->setCornac($cadefart['cornac']);
    }
    if (isset($cadefart['corext']))
    {
      $this->cadefart->setCorext($cadefart['corext']);
    }
    if (isset($cadefart['tipodoc']))
    {
      $this->cadefart->setTipodoc($cadefart['tipodoc']);
    }
    if (isset($cadefart['codconpag']))
    {
      $this->cadefart->setCodconpag($cadefart['codconpag']);
    }
    if (isset($cadefart['codforent']))
    {
      $this->cadefart->setCodforent($cadefart['codforent']);
    }
    if (isset($cadefart['forpro']))
    {
      $this->cadefart->setForpro($cadefart['forpro']);
    }
    if (isset($cadefart['despro']))
    {
      $this->cadefart->setDespro($cadefart['despro']);
    }
    if (isset($cadefart['reppreimpsc']))
    {
      $this->cadefart->setReppreimpsc($cadefart['reppreimpsc']);
    }
    if (isset($cadefart['reppreimpoc']))
    {
      $this->cadefart->setReppreimpoc($cadefart['reppreimpoc']);
    }
    if (isset($cadefart['percon']))
    {
      $this->cadefart->setPercon($cadefart['percon']);
    }
    if (isset($cadefart['faxcon']))
    {
      $this->cadefart->setFaxcon($cadefart['faxcon']);
    }
    if (isset($cadefart['emacon']))
    {
      $this->cadefart->setEmacon($cadefart['emacon']);
    }
    if (isset($cadefart['tipdoccon']))
    {
      $this->cadefart->setTipdoccon($cadefart['tipdoccon']);
    }
    if (isset($cadefart['codubi']))
    {
      $this->cadefart->setCodubi($cadefart['codubi']);
    }
    if (isset($cadefart['reccoo']))
    {
      $this->cadefart->setReccoo($cadefart['reccoo']);
    }
    if (isset($cadefart['grid']))
    {
      $this->cadefart->setGrid($cadefart['grid']);
    }

    if (isset($cadefart['codemp']))
    {
      $this->cadefart->setCodemp($cadefart['codemp']);
    }
    if (isset($cadefart['lonart']))
    {
      $this->cadefart->setLonart($cadefart['lonart']);
    }
    if (isset($cadefart['rupart']))
    {
      $this->cadefart->setRupart($cadefart['rupart']);
    }
    if (isset($cadefart['forart']))
    {
      $this->cadefart->setForart($cadefart['forart']);
    }
    if (isset($cadefart['desart']))
    {
      $this->cadefart->setDesart($cadefart['desart']);
    }
    if (isset($cadefart['forubi']))
    {
      $this->cadefart->setForubi($cadefart['forubi']);
    }
    if (isset($cadefart['desubi']))
    {
      $this->cadefart->setDesubi($cadefart['desubi']);
    }
    if (isset($cadefart['correq']))
    {
      $this->cadefart->setCorreq($cadefart['correq']);
    }
    if (isset($cadefart['corord']))
    {
      $this->cadefart->setCorord($cadefart['corord']);
    }
    if (isset($cadefart['correc']))
    {
      $this->cadefart->setCorrec($cadefart['correc']);
    }
    if (isset($cadefart['cordes']))
    {
      $this->cadefart->setCordes($cadefart['cordes']);
    }
    if (isset($cadefart['generaop']))
    {
      $this->cadefart->setGeneraop($cadefart['generaop']);
    }
    if (isset($cadefart['asiparrec']))
    {
      $this->cadefart->setAsiparrec($cadefart['asiparrec']);
    }
    if (isset($cadefart['generacom']))
    {
      $this->cadefart->setGeneracom($cadefart['generacom']);
    }
    if (isset($cadefart['mercon']))
    {
      $this->cadefart->setMercon($cadefart['mercon']);
    }
    if (isset($cadefart['ctadev']))
    {
      $this->cadefart->setCtadev($cadefart['ctadev']);
    }
    if (isset($cadefart['ctavco']))
    {
      $this->cadefart->setCtavco($cadefart['ctavco']);
    }
    if (isset($cadefart['univta']))
    {
      $this->cadefart->setUnivta($cadefart['univta']);
    }
    if (isset($cadefart['artven']))
    {
      $this->cadefart->setArtven($cadefart['artven']);
    }
    if (isset($cadefart['artins']))
    {
      $this->cadefart->setArtins($cadefart['artins']);
    }
    if (isset($cadefart['artser']))
    {
      $this->cadefart->setArtser($cadefart['artser']);
    }
    if (isset($cadefart['codalmven']))
    {
      $this->cadefart->setCodalmven($cadefart['codalmven']);
    }
    if (isset($cadefart['recart']))
    {
      $this->cadefart->setRecart($cadefart['recart']);
    }
    if (isset($cadefart['ordcom']))
    {
      $this->cadefart->setOrdcom($cadefart['ordcom']);
    }
    if (isset($cadefart['reqart']))
    {
      $this->cadefart->setReqart($cadefart['reqart']);
    }
    if (isset($cadefart['dphart']))
    {
      $this->cadefart->setDphart($cadefart['dphart']);
    }
    if (isset($cadefart['ordser']))
    {
      $this->cadefart->setOrdser($cadefart['ordser']);
    }
    if (isset($cadefart['tipimprec']))
    {
      $this->cadefart->setTipimprec($cadefart['tipimprec']);
    }
    if (isset($cadefart['artvenhas']))
    {
      $this->cadefart->setArtvenhas($cadefart['artvenhas']);
    }
    if (isset($cadefart['corcot']))
    {
      $this->cadefart->setCorcot($cadefart['corcot']);
    }
    if (isset($cadefart['solart']))
    {
      $this->cadefart->setSolart($cadefart['solart']);
    }
    if (isset($cadefart['apliclades']))
    {
      $this->cadefart->setApliclades($cadefart['apliclades']);
    }
    if (isset($cadefart['solcom']))
    {
      $this->cadefart->setSolcom($cadefart['solcom']);
    }
    if (isset($cadefart['unidad']))
    {
      $this->cadefart->setUnidad($cadefart['unidad']);
    }
    if (isset($cadefart['prcasopre']))
    {
      $this->cadefart->setPrcasopre($cadefart['prcasopre']);
    }
    if (isset($cadefart['prcreqapr']))
    {
      $this->cadefart->setPrcreqapr($cadefart['prcreqapr']);
    }
    if (isset($cadefart['comasopre']))
    {
      $this->cadefart->setComasopre($cadefart['comasopre']);
    }
    if (isset($cadefart['comreqapr']))
    {
      $this->cadefart->setComreqapr($cadefart['comreqapr']);
    }
    if (isset($cadefart['almcorre']))
    {
      $this->cadefart->setAlmcorre($cadefart['almcorre']);
    }
    if (isset($cadefart['forsnc']))
    {
      $this->cadefart->setForsnc($cadefart['forsnc']);
    }
    if (isset($cadefart['dessnc']))
    {
      $this->cadefart->setDessnc($cadefart['dessnc']);
    }
    if (isset($cadefart['reqreqapr']))
    {
      $this->cadefart->setReqreqapr($cadefart['reqreqapr']);
    }
    if (isset($cadefart['solreqapr']))
    {
      $this->cadefart->setSolreqapr($cadefart['solreqapr']);
    }
    if (isset($cadefart['gencorart']))
    {
      $this->cadefart->setGencorart($cadefart['gencorart']);
    }
    if (isset($cadefart['tipdocpre']))
    {
      $this->cadefart->setTipdocpre($cadefart['tipdocpre']);
    }
    if (isset($cadefart['cornac']))
    {
      $this->cadefart->setCornac($cadefart['cornac']);
    }
    if (isset($cadefart['corext']))
    {
      $this->cadefart->setCorext($cadefart['corext']);
    }
    if (isset($cadefart['tipodoc']))
    {
      $this->cadefart->setTipodoc($cadefart['tipodoc']);
    }
    if (isset($cadefart['codconpag']))
    {
      $this->cadefart->setCodconpag($cadefart['codconpag']);
    }
    if (isset($cadefart['codforent']))
    {
      $this->cadefart->setCodforent($cadefart['codforent']);
    }
    if (isset($cadefart['forpro']))
    {
      $this->cadefart->setForpro($cadefart['forpro']);
    }
    if (isset($cadefart['despro']))
    {
      $this->cadefart->setDespro($cadefart['despro']);
    }
    if (isset($cadefart['tipfin']))
    {
      $this->cadefart->setTipfin($cadefart['tipfin']);
    }
    if (isset($cadefart['codmon']))
    {
      $this->cadefart->setCodmon($cadefart['codmon']);
    }
    if (isset($cadefart['reppreimpsc']))
    {
      $this->cadefart->setReppreimpsc($cadefart['reppreimpsc']);
    }
    if (isset($cadefart['reppreimpoc']))
    {
      $this->cadefart->setReppreimpoc($cadefart['reppreimpoc']);
    }
    if (isset($cadefart['codtiptra']))
    {
      $this->cadefart->setCodtiptra($cadefart['codtiptra']);
    }
    if (isset($cadefart['percon']))
    {
      $this->cadefart->setPercon($cadefart['percon']);
    }
    if (isset($cadefart['faxcon']))
    {
      $this->cadefart->setFaxcon($cadefart['faxcon']);
    }
    if (isset($cadefart['emacon']))
    {
      $this->cadefart->setEmacon($cadefart['emacon']);
    }
    if (isset($cadefart['tipdoccon']))
    {
      $this->cadefart->setTipdoccon($cadefart['tipdoccon']);
    }
    if (isset($cadefart['codubi']))
    {
      $this->cadefart->setCodubi($cadefart['codubi']);
    }
    if (isset($cadefart['reccoo']))
    {
      $this->cadefart->setReccoo($cadefart['reccoo']);
    }

    if (isset($cadefart['codemp']))
    {
      $this->cadefart->setCodemp($cadefart['codemp']);
    }
    if (isset($cadefart['lonart']))
    {
      $this->cadefart->setLonart($cadefart['lonart']);
    }
    if (isset($cadefart['rupart']))
    {
      $this->cadefart->setRupart($cadefart['rupart']);
    }
    if (isset($cadefart['forart']))
    {
      $this->cadefart->setForart($cadefart['forart']);
    }
    if (isset($cadefart['desart']))
    {
      $this->cadefart->setDesart($cadefart['desart']);
    }
    if (isset($cadefart['forubi']))
    {
      $this->cadefart->setForubi($cadefart['forubi']);
    }
    if (isset($cadefart['desubi']))
    {
      $this->cadefart->setDesubi($cadefart['desubi']);
    }
    if (isset($cadefart['correq']))
    {
      $this->cadefart->setCorreq($cadefart['correq']);
    }
    if (isset($cadefart['corord']))
    {
      $this->cadefart->setCorord($cadefart['corord']);
    }
    if (isset($cadefart['correc']))
    {
      $this->cadefart->setCorrec($cadefart['correc']);
    }
    if (isset($cadefart['cordes']))
    {
      $this->cadefart->setCordes($cadefart['cordes']);
    }
    if (isset($cadefart['generaop']))
    {
      $this->cadefart->setGeneraop($cadefart['generaop']);
    }
    if (isset($cadefart['asiparrec']))
    {
      $this->cadefart->setAsiparrec($cadefart['asiparrec']);
    }
    if (isset($cadefart['generacom']))
    {
      $this->cadefart->setGeneracom($cadefart['generacom']);
    }
    if (isset($cadefart['mercon']))
    {
      $this->cadefart->setMercon($cadefart['mercon']);
    }
    if (isset($cadefart['ctadev']))
    {
      $this->cadefart->setCtadev($cadefart['ctadev']);
    }
    if (isset($cadefart['ctavco']))
    {
      $this->cadefart->setCtavco($cadefart['ctavco']);
    }
    if (isset($cadefart['univta']))
    {
      $this->cadefart->setUnivta($cadefart['univta']);
    }
    if (isset($cadefart['artven']))
    {
      $this->cadefart->setArtven($cadefart['artven']);
    }
    if (isset($cadefart['artins']))
    {
      $this->cadefart->setArtins($cadefart['artins']);
    }
    if (isset($cadefart['artser']))
    {
      $this->cadefart->setArtser($cadefart['artser']);
    }
    if (isset($cadefart['codalmven']))
    {
      $this->cadefart->setCodalmven($cadefart['codalmven']);
    }
    if (isset($cadefart['recart']))
    {
      $this->cadefart->setRecart($cadefart['recart']);
    }
    if (isset($cadefart['ordcom']))
    {
      $this->cadefart->setOrdcom($cadefart['ordcom']);
    }
    if (isset($cadefart['reqart']))
    {
      $this->cadefart->setReqart($cadefart['reqart']);
    }
    if (isset($cadefart['dphart']))
    {
      $this->cadefart->setDphart($cadefart['dphart']);
    }
    if (isset($cadefart['ordser']))
    {
      $this->cadefart->setOrdser($cadefart['ordser']);
    }
    if (isset($cadefart['tipimprec']))
    {
      $this->cadefart->setTipimprec($cadefart['tipimprec']);
    }
    if (isset($cadefart['artvenhas']))
    {
      $this->cadefart->setArtvenhas($cadefart['artvenhas']);
    }
    if (isset($cadefart['corcot']))
    {
      $this->cadefart->setCorcot($cadefart['corcot']);
    }
    if (isset($cadefart['solart']))
    {
      $this->cadefart->setSolart($cadefart['solart']);
    }
    if (isset($cadefart['apliclades']))
    {
      $this->cadefart->setApliclades($cadefart['apliclades']);
    }
    if (isset($cadefart['solcom']))
    {
      $this->cadefart->setSolcom($cadefart['solcom']);
    }
    if (isset($cadefart['unidad']))
    {
      $this->cadefart->setUnidad($cadefart['unidad']);
    }
    if (isset($cadefart['prcasopre']))
    {
      $this->cadefart->setPrcasopre($cadefart['prcasopre']);
    }
    if (isset($cadefart['prcreqapr']))
    {
      $this->cadefart->setPrcreqapr($cadefart['prcreqapr']);
    }
    if (isset($cadefart['comasopre']))
    {
      $this->cadefart->setComasopre($cadefart['comasopre']);
    }
    if (isset($cadefart['comreqapr']))
    {
      $this->cadefart->setComreqapr($cadefart['comreqapr']);
    }
    if (isset($cadefart['almcorre']))
    {
      $this->cadefart->setAlmcorre($cadefart['almcorre']);
    }
    if (isset($cadefart['forsnc']))
    {
      $this->cadefart->setForsnc($cadefart['forsnc']);
    }
    if (isset($cadefart['dessnc']))
    {
      $this->cadefart->setDessnc($cadefart['dessnc']);
    }
    if (isset($cadefart['reqreqapr']))
    {
      $this->cadefart->setReqreqapr($cadefart['reqreqapr']);
    }
    if (isset($cadefart['solreqapr']))
    {
      $this->cadefart->setSolreqapr($cadefart['solreqapr']);
    }
    if (isset($cadefart['gencorart']))
    {
      $this->cadefart->setGencorart($cadefart['gencorart']);
    }
    if (isset($cadefart['tipdocpre']))
    {
      $this->cadefart->setTipdocpre($cadefart['tipdocpre']);
    }
    if (isset($cadefart['cornac']))
    {
      $this->cadefart->setCornac($cadefart['cornac']);
    }
    if (isset($cadefart['corext']))
    {
      $this->cadefart->setCorext($cadefart['corext']);
    }
    if (isset($cadefart['tipodoc']))
    {
      $this->cadefart->setTipodoc($cadefart['tipodoc']);
    }
    if (isset($cadefart['codconpag']))
    {
      $this->cadefart->setCodconpag($cadefart['codconpag']);
    }
    if (isset($cadefart['codforent']))
    {
      $this->cadefart->setCodforent($cadefart['codforent']);
    }
    if (isset($cadefart['forpro']))
    {
      $this->cadefart->setForpro($cadefart['forpro']);
    }
    if (isset($cadefart['despro']))
    {
      $this->cadefart->setDespro($cadefart['despro']);
    }
    if (isset($cadefart['tipfin']))
    {
      $this->cadefart->setTipfin($cadefart['tipfin']);
    }
    if (isset($cadefart['codmon']))
    {
      $this->cadefart->setCodmon($cadefart['codmon']);
    }
    if (isset($cadefart['reppreimpsc']))
    {
      $this->cadefart->setReppreimpsc($cadefart['reppreimpsc']);
    }
    if (isset($cadefart['reppreimpoc']))
    {
      $this->cadefart->setReppreimpoc($cadefart['reppreimpoc']);
    }
    if (isset($cadefart['codtiptra']))
    {
      $this->cadefart->setCodtiptra($cadefart['codtiptra']);
    }
    if (isset($cadefart['percon']))
    {
      $this->cadefart->setPercon($cadefart['percon']);
    }
    if (isset($cadefart['faxcon']))
    {
      $this->cadefart->setFaxcon($cadefart['faxcon']);
    }
    if (isset($cadefart['emacon']))
    {
      $this->cadefart->setEmacon($cadefart['emacon']);
    }
    if (isset($cadefart['tipdoccon']))
    {
      $this->cadefart->setTipdoccon($cadefart['tipdoccon']);
    }
    if (isset($cadefart['codubi']))
    {
      $this->cadefart->setCodubi($cadefart['codubi']);
    }
    if (isset($cadefart['reccoo']))
    {
      $this->cadefart->setReccoo($cadefart['reccoo']);
    }

  }

  /**
   * Retorna el registro del modelo del formulario
   * Identifica si es un registro nuevo o actual, y lo retorna
   *
   */
  protected function getCadefartOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $cadefart = new Cadefart();
    }
    else
    {
      $cadefart = CadefartPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($cadefart);
    }

    return $cadefart;
  }

  /**
   * Función para procesar los filtros aplicados a la lista de registros
   *
   */
  protected function processFilters()
  {
  }

  /**
   * Función para procesar el orden de los registros en la lista
   *
   */
  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/cadefart/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/cadefart/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/cadefart/sort'))
    {
    }
  }

  /**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
  }

  /**
   * Función para colocar el criterio de ordenación de la lista de registros
   * en la acción List
   *
   */
  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/cadefart/sort'))
    {
      $sort_column = CadefartPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/cadefart/sort') == 'asc')
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
                  'cadefart{codemp}' => 'Código Empresa:',
              'cadefart{nomemp}' => 'Nombre de la  Institución:',
              'cadefart{diremp}' => 'Dirección:',
              'cadefart{tlfemp}' => 'Teléfono:',
              'cadefart{tipfin}' => 'Financiamiento:',
              'cadefart{lonart}' => 'Longitud del Código:',
              'cadefart{rupart}' => 'Rupturas de Control:',
              'cadefart{forart}' => 'Formato:',
              'cadefart{desart}' => 'Descripción:',
              'cadefart{forubi}' => 'Formato:',
              'cadefart{desubi}' => 'Descripción:',
              'cadefart{generaop}' => 'Generar Orden de Pago al Momento de la Recepción:',
              'cadefart{generacom}' => 'Generar Comprobantes contables al momento de la Recepcion y el Despacho:',
              'cadefart{asiparrec}' => 'Imputacón del Recargo:',
              'cadefart{corcom}' => 'Orden de Compra:',
              'cadefart{correc2}' => 'Recepciones:',
              'cadefart{correq2}' => 'Requisiciones:',
              'cadefart{cordes2}' => 'Despachos:',
              'cadefart{corser}' => 'Ordenes de Servicio:',
              'cadefart{corsol}' => 'Requisiciones por Departamento (Solicitud de Egreso):',
              'cadefart{corcot2}' => 'Cotizaciones:',
              'cadefart{prcasopre}' => 'Afectación Presupuestaria (Precompromiso):',
              'cadefart{prcreqapr}' => 'Requiere Aprobación:',
              'cadefart{comasopre}' => 'Afectación Presupuestaria (Compromiso):',
              'cadefart{comreqapr}' => 'Requiere Aprobación:',
              'cadefart{almcorre}' => 'Traspaso de Artículos:',
              'cadefart{forsnc}' => 'Formato:',
              'cadefart{dessnc}' => 'Descripción:',
              'cadefart{reqreqapr}' => 'Aprobación de la Requisición para poder ser Despachada:',
              'cadefart{solreqapr}' => 'Aprobación de Solicitud de Egreso para poder realizar la Orden de Compra:',
              'cadefart{corent}' => 'Entradas de Almacén:',
              'cadefart{corsal}' => 'Salidas de Almacén:',
              'cadefart{gencorart}' => 'Se genera correlativo en el Código del Artículo:',
              'cadefart{tipdocpre}' => 'Tipo de Documento:',
              'cadefart{cornac}' => 'Nacionales:',
              'cadefart{corext}' => 'Extranjeros:',
              'cadefart{tipodoc}' => 'Tipo OC de Donación:',
              'cadefart{codconpag}' => 'Condición de Pago por Defecto:',
              'cadefart{codforent}' => 'Forma de Entrega por Defecto:',
              'cadefart{forpro}' => 'Formato:',
              'cadefart{despro}' => 'Descripción:',
              'cadefart{reppreimpsc}' => 'Nombre Reporte PreImpreso SC:',
              'cadefart{reppreimpoc}' => 'Nombre Reporte PreImpreso OC:',
              'cadefart{percon}' => 'Persona Contacto:',
              'cadefart{faxcon}' => 'Fax:',
              'cadefart{emacon}' => 'Email:',
              'cadefart{tipdoccon}' => 'Tipo de Documento:',
              'cadefart{codubi}' => 'Fríos:',
              'cadefart{reccoo}' => 'Aplica Recargos a Cooperativas:',
              'cadefart{grid}' => '.:',
                          'cadefart{codemp}' => 'Código Empresa:',
              'cadefart{lonart}' => 'Longitud del Código:',
              'cadefart{rupart}' => 'Rupturas de Control:',
              'cadefart{forart}' => 'Formato:',
              'cadefart{desart}' => 'Descripción:',
              'cadefart{forubi}' => 'Formato:',
              'cadefart{desubi}' => 'Descripción:',
              'cadefart{correq}' => 'Correq:',
              'cadefart{corord}' => 'Corord:',
              'cadefart{correc}' => 'Correc:',
              'cadefart{cordes}' => 'Cordes:',
              'cadefart{generaop}' => 'Generar Orden de Pago al Momento de la Recepción:',
              'cadefart{asiparrec}' => 'Imputacón del Recargo:',
              'cadefart{generacom}' => 'Generar Comprobantes contables al momento de la Recepcion y el Despacho:',
              'cadefart{mercon}' => 'Mercon:',
              'cadefart{ctadev}' => 'Ctadev:',
              'cadefart{ctavco}' => 'Ctavco:',
              'cadefart{univta}' => 'Univta:',
              'cadefart{artven}' => 'Artven:',
              'cadefart{artins}' => 'Artins:',
              'cadefart{artser}' => 'Artser:',
              'cadefart{codalmven}' => 'Codalmven:',
              'cadefart{recart}' => 'Recart:',
              'cadefart{ordcom}' => 'Ordcom:',
              'cadefart{reqart}' => 'Reqart:',
              'cadefart{dphart}' => 'Dphart:',
              'cadefart{ordser}' => 'Ordser:',
              'cadefart{tipimprec}' => 'Tipimprec:',
              'cadefart{artvenhas}' => 'Artvenhas:',
              'cadefart{corcot}' => 'Corcot:',
              'cadefart{solart}' => 'Solart:',
              'cadefart{apliclades}' => 'Apliclades:',
              'cadefart{solcom}' => 'Solcom:',
              'cadefart{unidad}' => 'Unidad:',
              'cadefart{prcasopre}' => 'Afectación Presupuestaria (Precompromiso):',
              'cadefart{prcreqapr}' => 'Requiere Aprobación:',
              'cadefart{comasopre}' => 'Afectación Presupuestaria (Compromiso):',
              'cadefart{comreqapr}' => 'Requiere Aprobación:',
              'cadefart{almcorre}' => 'Traspaso de Artículos:',
              'cadefart{forsnc}' => 'Formato:',
              'cadefart{dessnc}' => 'Descripción:',
              'cadefart{reqreqapr}' => 'Aprobación de la Requisición para poder ser Despachada:',
              'cadefart{solreqapr}' => 'Aprobación de Solicitud de Egreso para poder realizar la Orden de Compra:',
              'cadefart{gencorart}' => 'Se genera correlativo en el Código del Artículo:',
              'cadefart{tipdocpre}' => 'Tipo de Documento:',
              'cadefart{cornac}' => 'Nacionales:',
              'cadefart{corext}' => 'Extranjeros:',
              'cadefart{tipodoc}' => 'Tipo OC de Donación:',
              'cadefart{codconpag}' => 'Condición de Pago por Defecto:',
              'cadefart{codforent}' => 'Forma de Entrega por Defecto:',
              'cadefart{forpro}' => 'Formato:',
              'cadefart{despro}' => 'Descripción:',
              'cadefart{tipfin}' => 'Financiamiento:',
              'cadefart{codmon}' => 'Codmon:',
              'cadefart{reppreimpsc}' => 'Nombre Reporte PreImpreso SC:',
              'cadefart{reppreimpoc}' => 'Nombre Reporte PreImpreso OC:',
              'cadefart{codtiptra}' => 'Codtiptra:',
              'cadefart{percon}' => 'Persona Contacto:',
              'cadefart{faxcon}' => 'Fax:',
              'cadefart{emacon}' => 'Email:',
              'cadefart{tipdoccon}' => 'Tipo de Documento:',
              'cadefart{codubi}' => 'Fríos:',
              'cadefart{reccoo}' => 'Aplica Recargos a Cooperativas:',
              'cadefart{id}' => 'Id:',
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
      $segbitaco->setCodmod('almdefart');
      $segbitaco->setValcla('Cadefart');
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
	$id= $this->cadefart->getId();
    $this->SalvarBitacora($id ,$acc);
  }






}

