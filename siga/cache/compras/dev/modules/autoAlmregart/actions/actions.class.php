<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 06:29:04
?>
<?php

/**
 * autoAlmregart actions.
 *
 * @package    Roraima
 * @subpackage autoAlmregart 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 */
class autoAlmregartActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('almregart', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caregart/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Caregart', 15);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function executeCreate()
  {
    return $this->forward('almregart', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('almregart', 'edit');
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->caregart = $this->getCaregartOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCaregartFromRequest();

      $this->saveCaregart($this->caregart);

      $this->setFlash('notice', 'Your modifications have been saved');

    $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almregart/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almregart/list');
      }
      else
      {
        return $this->redirect('almregart/edit?id='.$this->caregart->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->caregart = CaregartPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->caregart);

    try
    {
      $this->deleteCaregart($this->caregart);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('almregart', 'list');
    }

    return $this->redirect('almregart/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->caregart = $this->getCaregartOrCreate();
    $this->updateCaregartFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveCaregart($caregart)
  {
    $caregart->save();

  }

  protected function deleteCaregart($caregart)
  {
    $caregart->delete();
  }

  protected function updateCaregartFromRequest()
  {
    $caregart = $this->getRequestParameter('caregart');

    if (isset($caregart['codart']))
    {
      $this->caregart->setCodart($caregart['codart']);
    }
    if (isset($caregart['tipo']))
    {
      $this->caregart->setTipo($caregart['tipo']);
    }
    if (isset($caregart['codcta']))
    {
      $this->caregart->setCodcta($caregart['codcta']);
    }
    if (isset($caregart['desart']))
    {
      $this->caregart->setDesart($caregart['desart']);
    }
    if (isset($caregart['ramart']))
    {
      $this->caregart->setRamart($caregart['ramart']);
    }
    if (isset($caregart['nomram']))
    {
      $this->caregart->setNomram($caregart['nomram']);
    }
    if (isset($caregart['codpar']))
    {
      $this->caregart->setCodpar($caregart['codpar']);
    }
    if (isset($caregart['unimed']))
    {
      $this->caregart->setUnimed($caregart['unimed']);
    }
    if (isset($caregart['unialt']))
    {
      $this->caregart->setUnialt($caregart['unialt']);
    }
    if (isset($caregart['relart']))
    {
      $this->caregart->setRelart($caregart['relart']);
    }
    if (isset($caregart['exitot']))
    {
      $this->caregart->setExitot($caregart['exitot']);
    }
    if (isset($caregart['fecult']))
    {
      if ($caregart['fecult'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($caregart['fecult']))
          {
            $value = $dateFormat->format($caregart['fecult'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $caregart['fecult'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->caregart->setFecult($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->caregart->setFecult(null);
      }
    }
    if (isset($caregart['cosult']))
    {
      $this->caregart->setCosult($caregart['cosult']);
    }
    if (isset($caregart['cospro']))
    {
      $this->caregart->setCospro($caregart['cospro']);
    }
    if (isset($caregart['invini']))
    {
      $this->caregart->setInvini($caregart['invini']);
    }
    if (isset($caregart['codartsnc']))
    {
      $this->caregart->setCodartsnc($caregart['codartsnc']);
    }
    if (isset($caregart['dessnc']))
    {
      $this->caregart->setDessnc($caregart['dessnc']);
    }
    if (isset($caregart['codalt']))
    {
      $this->caregart->setCodalt($caregart['codalt']);
    }
    if (isset($caregart['ctavta']))
    {
      $this->caregart->setCtavta($caregart['ctavta']);
    }
    if (isset($caregart['ctacos']))
    {
      $this->caregart->setCtacos($caregart['ctacos']);
    }
    if (isset($caregart['ctapro']))
    {
      $this->caregart->setCtapro($caregart['ctapro']);
    }
    if (isset($caregart['ctatra']))
    {
      $this->caregart->setCtatra($caregart['ctatra']);
    }
    if (isset($caregart['ctadef']))
    {
      $this->caregart->setCtadef($caregart['ctadef']);
    }
    $this->caregart->setPerbienes(isset($caregart['perbienes']) ? $caregart['perbienes'] : 0);
    if (isset($caregart['cosunipri']))
    {
      $this->caregart->setCosunipri($caregart['cosunipri']);
    }
    if (isset($caregart['staart']))
    {
      $this->caregart->setStaart($caregart['staart']);
    }
    if (isset($caregart['coding']))
    {
      $this->caregart->setCoding($caregart['coding']);
    }
    if (isset($caregart['nomcom']))
    {
      $this->caregart->setNomcom($caregart['nomcom']);
    }
    if (isset($caregart['cosact']))
    {
      $this->caregart->setCosact($caregart['cosact']);
    }
    if (isset($caregart['feccac']))
    {
      if ($caregart['feccac'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($caregart['feccac']))
          {
            $value = $dateFormat->format($caregart['feccac'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $caregart['feccac'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->caregart->setFeccac($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->caregart->setFeccac(null);
      }
    }
    $this->caregart->setConsbue(isset($caregart['consbue']) ? $caregart['consbue'] : 0);
    if (isset($caregart['tipmat']))
    {
      $this->caregart->setTipmat($caregart['tipmat']);
    }
    if (isset($caregart['clamat']))
    {
      $this->caregart->setClamat($caregart['clamat']);
    }
    if (isset($caregart['rotacion']))
    {
      $this->caregart->setRotacion($caregart['rotacion']);
    }
    if (isset($caregart['numsol']))
    {
      $this->caregart->setNumsol($caregart['numsol']);
    }
  }

  protected function getCaregartOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $caregart = new Caregart();
    }
    else
    {
      $caregart = CaregartPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($caregart);
    }

    return $caregart;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/caregart/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/caregart/filters');
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/caregart/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/caregart/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/caregart/sort'))
    {
      $this->getUser()->setAttribute('sort', 'codart', 'sf_admin/caregart/sort');
      $this->getUser()->setAttribute('type', 'asc', 'sf_admin/caregart/sort');
    }
  }

   protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codart_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaregartPeer::CODART, '');
      $criterion->addOr($c->getNewCriterion(CaregartPeer::CODART, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codart']) && $this->filters['codart'] !== '')
    {
      $c->add(CaregartPeer::CODART, '%'.strtr($this->filters['codart'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desart_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaregartPeer::DESART, '');
      $criterion->addOr($c->getNewCriterion(CaregartPeer::DESART, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desart']) && $this->filters['desart'] !== '')
    {
      $c->add(CaregartPeer::DESART, '%'.strtr($this->filters['desart'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['tipo_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaregartPeer::TIPO, '');
      $criterion->addOr($c->getNewCriterion(CaregartPeer::TIPO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['tipo']) && $this->filters['tipo'] !== '')
    {
      $c->add(CaregartPeer::TIPO, '%'.strtr($this->filters['tipo'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['ramart_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaregartPeer::RAMART, '');
      $criterion->addOr($c->getNewCriterion(CaregartPeer::RAMART, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['ramart']) && $this->filters['ramart'] !== '')
    {
      $c->add(CaregartPeer::RAMART, '%'.strtr($this->filters['ramart'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codalt_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaregartPeer::CODALT, '');
      $criterion->addOr($c->getNewCriterion(CaregartPeer::CODALT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codalt']) && $this->filters['codalt'] !== '')
    {
      $c->add(CaregartPeer::CODALT, '%'.strtr($this->filters['codalt'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['staart_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaregartPeer::STAART, '');
      $criterion->addOr($c->getNewCriterion(CaregartPeer::STAART, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['staart']) && $this->filters['staart'] !== '')
    {
      $c->add(CaregartPeer::STAART, '%'.strtr($this->filters['staart'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
  }
  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/caregart/sort'))
    {
      $sort_column = CaregartPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/caregart/sort') == 'asc')
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
      'caregart{codart}' => 'Código:',
      'caregart{tipo}' => '(A)rtículo ó (S)ervicio:',
      'caregart{codcta}' => 'Código Contable:',
      'caregart{desart}' => 'Descripción:',
      'caregart{ramart}' => 'Cod. Ramo:',
      'caregart{nomram}' => 'Nom. Ramo:',
      'caregart{codpar}' => 'Partida:',
      'caregart{unimed}' => 'Unidad Medida:',
      'caregart{unialt}' => 'Unidad Alterna:',
      'caregart{relart}' => 'Relación:',
      'caregart{exitot}' => 'Existencia Total:',
      'caregart{fecult}' => 'Fecha Últ. Compra:',
      'caregart{cosult}' => 'Último:',
      'caregart{cospro}' => 'Promedio:',
      'caregart{invini}' => 'Inicial:',
      'caregart{codartsnc}' => 'Código SNC:',
      'caregart{dessnc}' => 'Descripción SNC:',
      'caregart{codalt}' => 'Código Alternativo:',
      'caregart{ctavta}' => 'Cuenta Venta Contado:',
      'caregart{ctacos}' => 'Cuenta Costo:',
      'caregart{ctapro}' => 'Cuenta Ingresos por Venta:',
      'caregart{ctatra}' => 'Cuenta Transitoria:',
      'caregart{ctadef}' => 'Cuenta Gastos:',
      'caregart{perbienes}' => 'Pertenece a Bienes:',
      'caregart{cosunipri}' => 'Unidad Primaria:',
      'caregart{staart}' => 'Estatus:',
      'caregart{coding}' => 'Código de Ingresos:',
      'caregart{nomcom}' => 'Nombre Comercial:',
      'caregart{cosact}' => 'Actual en el Mercado:',
      'caregart{feccac}' => 'Fecha Costo Actual:',
      'caregart{consbue}' => 'Construcción de Buques Y Estructuras Flotantes:',
      'caregart{tipmat}' => 'Tipo de Material:',
      'caregart{clamat}' => 'Clase Material:',
      'caregart{rotacion}' => 'Clase Material:',
      'caregart{numsol}' => 'Catalogación de Material:',
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
      $segbitaco->setCodmod('almregart');
      $segbitaco->setValcla('Caregart');
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
    if ($this->caregart )
    {
      $id= $this->caregart->getId();
      $this->SalvarBitacora($id ,$acc);
    }
  }

}