<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 06:33:12
?>
<?php

/**
 * autoAlmdefubi actions.
 *
 * @package    Roraima
 * @subpackage autoAlmdefubi 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 */
class autoAlmdefubiActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('almdefubi', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cadefubi/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Cadefubi', 15);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function executeCreate()
  {
    return $this->forward('almdefubi', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('almdefubi', 'edit');
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->cadefubi = $this->getCadefubiOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCadefubiFromRequest();

      $this->saveCadefubi($this->cadefubi);

      $this->setFlash('notice', 'Your modifications have been saved');

    $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almdefubi/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almdefubi/list');
      }
      else
      {
        return $this->redirect('almdefubi/edit?id='.$this->cadefubi->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->cadefubi = CadefubiPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->cadefubi);

    try
    {
      $this->deleteCadefubi($this->cadefubi);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('almdefubi', 'list');
    }

    return $this->redirect('almdefubi/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->cadefubi = $this->getCadefubiOrCreate();
    $this->updateCadefubiFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveCadefubi($cadefubi)
  {
    $cadefubi->save();

  }

  protected function deleteCadefubi($cadefubi)
  {
    $cadefubi->delete();
  }

  protected function updateCadefubiFromRequest()
  {
    $cadefubi = $this->getRequestParameter('cadefubi');

    if (isset($cadefubi['codubi']))
    {
      $this->cadefubi->setCodubi($cadefubi['codubi']);
    }
    if (isset($cadefubi['nomubi']))
    {
      $this->cadefubi->setNomubi($cadefubi['nomubi']);
    }
  }

  protected function getCadefubiOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $cadefubi = new Cadefubi();
    }
    else
    {
      $cadefubi = CadefubiPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($cadefubi);
    }

    return $cadefubi;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/cadefubi/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/cadefubi/filters');
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/cadefubi/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/cadefubi/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/cadefubi/sort'))
    {
      $this->getUser()->setAttribute('sort', 'codubi', 'sf_admin/cadefubi/sort');
      $this->getUser()->setAttribute('type', 'asc', 'sf_admin/cadefubi/sort');
    }
  }

   protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codubi_is_empty']))
    {
      $criterion = $c->getNewCriterion(CadefubiPeer::CODUBI, '');
      $criterion->addOr($c->getNewCriterion(CadefubiPeer::CODUBI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codubi']) && $this->filters['codubi'] !== '')
    {
      $c->add(CadefubiPeer::CODUBI, '%'.strtr($this->filters['codubi'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomubi_is_empty']))
    {
      $criterion = $c->getNewCriterion(CadefubiPeer::NOMUBI, '');
      $criterion->addOr($c->getNewCriterion(CadefubiPeer::NOMUBI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomubi']) && $this->filters['nomubi'] !== '')
    {
      $c->add(CadefubiPeer::NOMUBI, '%'.strtr($this->filters['nomubi'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
  }
  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/cadefubi/sort'))
    {
      $sort_column = CadefubiPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/cadefubi/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  protected function getLabels()
  {
    return array(
      'cadefubi{codubi}' => 'Código:',
      'cadefubi{nomubi}' => 'Descripción:',
    );
  }

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
  $valsec="";
  $valid="";
  eval('if ($peer) $valsec = $peer->get'.H::ObtenerNombreCampo($camposecundario).'();');
  eval('if ($peer) $valid = $peer->getId();');
  $output = '[["'.$cajasec.'","'.$valsec.'",""],["'.$cajaid.'","'.$valid.'",""],["","",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  public function SalvarBitacora($id, $acc)
  {
    try{
      $segbitaco= new Segbitaco();
      $fecha=date('Y-m-d');

      $segbitaco->setCodintusu($this->getUser()->getAttribute('usuario_id'));
      $segbitaco->setTipope(substr($acc, 0, 1));
      $segbitaco->setCodmod('almdefubi');
      $segbitaco->setValcla('Cadefubi');
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
    if ($this->cadefubi )
    {
      $id= $this->cadefubi->getId();
      $this->SalvarBitacora($id ,$acc);
    }
  }

}
