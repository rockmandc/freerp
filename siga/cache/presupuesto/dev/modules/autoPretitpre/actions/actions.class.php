<?php
// auto-generated by PropelCidesa
// date: 2017/02/13 06:42:05
?>
<?php

/**
 * autoPretitpre actions.
 *
 * @package    Roraima
 * @subpackage autoPretitpre 
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 43817 2011-04-22 21:28:42Z cramirez $
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 * @copyright  Copyright 2007, Cide S.A.
 */
class autoPretitpreActions extends sfActions
{

  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
  protected $coderr = -1;

  public function executeIndex()
  {
    return $this->forward('pretitpre', 'list');
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpdeftit/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Cpdeftit', 15);
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
    return $this->forward('pretitpre', 'edit');
  }

  /**
   * Función principal para el manejo de la acción save
   * del formulario.
   *
   */
  public function executeSave()
  {

    return $this->forward('pretitpre', 'edit');

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
    $this->cpdeftit = $this->getCpdeftitOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCpdeftitFromRequest();

      if($this->saveCpdeftit($this->cpdeftit) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->cpdeftit->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('pretitpre/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('pretitpre/list');
        }
        else
        {
            return $this->redirect('pretitpre/edit?id='.$this->cpdeftit->getId());
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
    $this->cpdeftit = CpdeftitPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->cpdeftit);

    try
    {
      $this->deleteCpdeftit($this->cpdeftit);
      $id= $this->cpdeftit->getId();
      $this->SalvarBitacora($id ,'Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('pretitpre', 'list');
    }


    return $this->forward('pretitpre', 'list');
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
    $this->cpdeftit = $this->getCpdeftitOrCreate();
    $this->updateCpdeftitFromRequest();
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
  protected function saveCpdeftit($cpdeftit)
  {

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      $this->coderr = $this->saving($cpdeftit);


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
  protected function saving($cpdeftit)
  {
    $cpdeftit->save();
    return -1;

  }

  /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de eliminación adecuado para cada formulario.
   *
   */
  protected function deleting($cpdeftit)
  {
  	$cpdeftit->delete();
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
  protected function deleteCpdeftit($cpdeftit)
  {
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      $this->coderr = $this->deleting($cpdeftit);

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
  protected function updateCpdeftitFromRequest()
  {
    $cpdeftit = $this->getRequestParameter('cpdeftit');

    $fields = CpdeftitPeer::getFieldNames();

    if(array_search('Codalmusu', $fields))
    {
      if (isset($cpdeftit['codalmusu']))
      {
        $this->cpdeftit->setCodalmusu($cpdeftit['codalmusu']);
      }
    }
    if (isset($cpdeftit['codpre']))
    {
      $this->cpdeftit->setCodpre($cpdeftit['codpre']);
    }
    if (isset($cpdeftit['nompre']))
    {
      $this->cpdeftit->setNompre($cpdeftit['nompre']);
    }
    if (isset($cpdeftit['descta']))
    {
      $this->cpdeftit->setDescta($cpdeftit['descta']);
    }

    if (isset($cpdeftit['codpre']))
    {
      $this->cpdeftit->setCodpre($cpdeftit['codpre']);
    }
    if (isset($cpdeftit['nompre']))
    {
      $this->cpdeftit->setNompre($cpdeftit['nompre']);
    }
    if (isset($cpdeftit['codcta']))
    {
    $this->cpdeftit->setCodcta($cpdeftit['codcta'] ? $cpdeftit['codcta'] : null);
    }
    if (isset($cpdeftit['stacod']))
    {
      $this->cpdeftit->setStacod($cpdeftit['stacod']);
    }
    if (isset($cpdeftit['coduni']))
    {
      $this->cpdeftit->setCoduni($cpdeftit['coduni']);
    }
    if (isset($cpdeftit['estatus']))
    {
      $this->cpdeftit->setEstatus($cpdeftit['estatus']);
    }
    if (isset($cpdeftit['codtip']))
    {
      $this->cpdeftit->setCodtip($cpdeftit['codtip']);
    }

    if (isset($cpdeftit['codpre']))
    {
      $this->cpdeftit->setCodpre($cpdeftit['codpre']);
    }
    if (isset($cpdeftit['nompre']))
    {
      $this->cpdeftit->setNompre($cpdeftit['nompre']);
    }
    if (isset($cpdeftit['codcta']))
    {
    $this->cpdeftit->setCodcta($cpdeftit['codcta'] ? $cpdeftit['codcta'] : null);
    }
    if (isset($cpdeftit['stacod']))
    {
      $this->cpdeftit->setStacod($cpdeftit['stacod']);
    }
    if (isset($cpdeftit['coduni']))
    {
      $this->cpdeftit->setCoduni($cpdeftit['coduni']);
    }
    if (isset($cpdeftit['estatus']))
    {
      $this->cpdeftit->setEstatus($cpdeftit['estatus']);
    }
    if (isset($cpdeftit['codtip']))
    {
      $this->cpdeftit->setCodtip($cpdeftit['codtip']);
    }

  }

  /**
   * Retorna el registro del modelo del formulario
   * Identifica si es un registro nuevo o actual, y lo retorna
   *
   */
  protected function getCpdeftitOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $cpdeftit = new Cpdeftit();
    }
    else
    {
      $cpdeftit = CpdeftitPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($cpdeftit);
    }

    return $cpdeftit;
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

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/cpdeftit/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/cpdeftit/filters');
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
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/cpdeftit/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/cpdeftit/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/cpdeftit/sort'))
    {
      $this->getUser()->setAttribute('sort', 'codpre', 'sf_admin/cpdeftit/sort');
      $this->getUser()->setAttribute('type', 'asc', 'sf_admin/cpdeftit/sort');
    }
  }

  /**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codpre_is_empty']))
    {
      $criterion = $c->getNewCriterion(CpdeftitPeer::CODPRE, '');
      $criterion->addOr($c->getNewCriterion(CpdeftitPeer::CODPRE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codpre']) && $this->filters['codpre'] !== '')
    {
      $c->add(CpdeftitPeer::CODPRE, strtr("%".$this->filters['codpre']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nompre_is_empty']))
    {
      $criterion = $c->getNewCriterion(CpdeftitPeer::NOMPRE, '');
      $criterion->addOr($c->getNewCriterion(CpdeftitPeer::NOMPRE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nompre']) && $this->filters['nompre'] !== '')
    {
      $c->add(CpdeftitPeer::NOMPRE, strtr("%".$this->filters['nompre']."%", '*', '%'), Criteria::LIKE);
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
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/cpdeftit/sort'))
    {
      $sort_column = CpdeftitPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/cpdeftit/sort') == 'asc')
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
                  'cpdeftit{codpre}' => 'Código:',
              'cpdeftit{nompre}' => 'Nombre:',
                      'cpdeftit{descta}' => 'Codigo contable:',
                          'cpdeftit{codpre}' => 'Código:',
              'cpdeftit{nompre}' => 'Nombre:',
              'cpdeftit{codcta}' => 'Codcta:',
              'cpdeftit{stacod}' => 'Stacod:',
              'cpdeftit{coduni}' => 'Coduni:',
              'cpdeftit{estatus}' => 'Estatus:',
              'cpdeftit{codtip}' => 'Codtip:',
              'cpdeftit{id}' => 'Id:',
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
      $segbitaco->setCodmod('pretitpre');
      $segbitaco->setValcla('Cpdeftit');
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
	$id= $this->cpdeftit->getId();
    $this->SalvarBitacora($id ,$acc);
  }






}

