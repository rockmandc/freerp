<?php

/**
 * nomnomasiconnom actions.
 *
 * @package    Roraima
 * @subpackage nomnomasiconnom
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 59937 2014-12-11 21:38:52Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomnomasiconnomActions extends autonomnomasiconnomActions
{

 /* public function executeIndex()
  {
    return $this->redirect('nomnomasiconnom/edit');
  }*/

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npasiconemp = $this->getNpasiconempOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpasiconempFromRequest();

      $this->saveNpasiconemp($this->npasiconemp);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomnomasiconnom/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomnomasiconnom/list');
      }
      else
      {
        return $this->redirect('nomnomasiconnom/edit?id='.$this->npasiconemp->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

 /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigonomina='', $frecal='', $codigoconcepto='', $tipemp='')
 {
   if ($tipemp!=''){
     $sql="select (CASE when b.codcon is null then 0 else 1 end) as check,a.codemp as codemp,c.nomemp as nomemp,a.codcar as codcar,d.nomcar as nomcar,
        (CASE when b.codcon is null then 0.00 else  b.cantidad end) as cantidad, (CASE when b.codcon is null then 0.00 else  b.monto end) as monto,
        (CASE when b.codcon is null then to_date('1920-01-01','yyyy-mm-dd') else  b.fecini end) as fecini, (CASE when b.codcon is null then to_date('2099-12-31','yyyy-mm-dd') else  b.fecexp end) as fecexp,
        (CASE when b.codcon is null then (select frecon from npasiconnom where codnom=a.codnom and codcon='$codigoconcepto') else  b.frecon end) as frecon,
        (CASE when b.codcon is null then (select x.opecon from npdefcpt x where x.codcon='".$codigoconcepto."') else  b.asided end) as asided, (CASE when b.codcon is null then 'S' else  b.acucon end) as acucon,
        (CASE when b.codcon is null then 'S' else  b.calcon end) as calcon, (CASE when b.codcon is null then 'S' else  b.activo end) as activo,
        (CASE when b.codcon is null then 0.00 else  b.acumulado end) as acumulado, (CASE when a.codniv is null then a.grado else a.codniv end) as nivgra, c.cedemp as cedemp, 9 as id
        from nphojint c,npsitemp l,npcargos d,npasicaremp a left outer join npasiconemp b on a.codemp=b.codemp and a.codcar=b.codcar and b.codcon='".$codigoconcepto."'
        where a.codnom='".$codigonomina."' and c.codtipemp='".$tipemp."' and a.status='V' and (l.calnom='S' or l.calnomesp='t') and a.codemp=c.codemp and c.staemp=l.codsitemp and a.codcar=d.codcar  order by codemp";
   }else {
      $sql="select (CASE when b.codcon is null then 0 else 1 end) as check,a.codemp as codemp,c.nomemp as nomemp,a.codcar as codcar,d.nomcar as nomcar,
        (CASE when b.codcon is null then 0.00 else  b.cantidad end) as cantidad, (CASE when b.codcon is null then 0.00 else  b.monto end) as monto,
        (CASE when b.codcon is null then to_date('1920-01-01','yyyy-mm-dd') else  b.fecini end) as fecini, (CASE when b.codcon is null then to_date('2099-12-31','yyyy-mm-dd') else  b.fecexp end) as fecexp,
        (CASE when b.codcon is null then (select frecon from npasiconnom where codnom=a.codnom and codcon='$codigoconcepto') else  b.frecon end) as frecon,
        (CASE when b.codcon is null then (select x.opecon from npdefcpt x where x.codcon='".$codigoconcepto."') else  b.asided end) as asided, (CASE when b.codcon is null then 'S' else  b.acucon end) as acucon,
        (CASE when b.codcon is null then 'S' else  b.calcon end) as calcon, (CASE when b.codcon is null then 'S' else  b.activo end) as activo,
        (CASE when b.codcon is null then 0.00 else  b.acumulado end) as acumulado, (CASE when a.codniv is null then a.grado else a.codniv end) as nivgra, c.cedemp as cedemp, 9 as id
        from nphojint c,npsitemp l,npcargos d,npasicaremp a left outer join npasiconemp b on a.codemp=b.codemp and a.codcar=b.codcar and b.codcon='".$codigoconcepto."'
        where a.codnom='".$codigonomina."' and a.status='V' and (l.calnom='S' or l.calnomesp='t') and a.codemp=c.codemp and c.staemp=l.codsitemp and a.codcar=d.codcar  order by codemp";
    }
    $resp = Herramientas::BuscarDatos($sql,$per);

    $this->numreg=count($per);

	$opciones = new OpcionesGrid();
	$opciones->setTabla('Npasiconemp');
	$opciones->setAnchoGrid(1500);
	$opciones->setTitulo('');
	$opciones->setFilas(0);
	$opciones->setEliminar(false);
	$opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
	$col1->setTipo(Columna::CHECK);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('check');
	$col1->setHTML(' ');
  $col1->setJScript('onClick="verificarCestaticket(this.id)"');

    $col2 = new Columna('Cod. Trabajador');
	$col2->setTipo(Columna::TEXTO);
	$col2->setEsGrabable(true);
	$col2->setAlineacionObjeto(Columna::CENTRO);
	$col2->setAlineacionContenido(Columna::CENTRO);
	$col2->setNombreCampo('codemp');
	$col2->setHTML('type="text" size="10"');

	$col3 = new Columna('Nombre');
	$col3->setTipo(Columna::TEXTO);
	$col3->setEsGrabable(true);
	$col3->setAlineacionObjeto(Columna::IZQUIERDA);
	$col3->setAlineacionContenido(Columna::IZQUIERDA);
	$col3->setNombreCampo('nomemp');
	$col3->setHTML('type="text" size="35"');

	$col4 = new Columna('Código del Cargo');
	$col4->setTipo(Columna::TEXTO);
	$col4->setEsGrabable(true);
	$col4->setAlineacionObjeto(Columna::CENTRO);
	$col4->setAlineacionContenido(Columna::CENTRO);
	$col4->setNombreCampo('codcar');
	$col4->setHTML('type="text" size="10"');

	$col5 = new Columna('Descripción del Cargo');
	$col5->setTipo(Columna::TEXTO);
	$col5->setEsGrabable(true);
	$col5->setAlineacionObjeto(Columna::IZQUIERDA);
	$col5->setAlineacionContenido(Columna::IZQUIERDA);
	$col5->setNombreCampo('nomcar');
	$col5->setHTML('type="text" size="35"');

    $col6 = new Columna('Cantidad');
    $col6->setTipo(Columna::MONTO);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('cantidad');
    $col6->setEsGrabable(true);

    $col7 = new Columna('Monto');
    $col7->setTipo(Columna::MONTO);
    $col7->setAlineacionObjeto(Columna::IZQUIERDA);
    $col7->setAlineacionContenido(Columna::IZQUIERDA);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('monto');
    $col7->setJScript('onBlur="javascript: event.keyCode=13; entermontootro(event,this.id)"');

    $col8 = new Columna('Fecha de Inicio');
    $col8->setTipo(Columna::FECHA);
    $col8->setEsGrabable(true);
    $col8->setVacia(true);
    $col8->setNombreCampo('fecini');

    $col9 = new Columna('Fecha de Expiración');
    $col9->setTipo(Columna::FECHA);
    $col9->setVacia(true);
    $col9->setEsGrabable(true);
    $col9->setNombreCampo('fecexp');

    $col10 = new Columna('Frecuencia Pago');
    $col10->setTipo(Columna::COMBO);
    $col10->setEsGrabable(true);
    $col10->setNombreCampo('frecon');
    $col10->setCombo(Constantes::comboFrecuencia($frecal));
    $col10->setHTML(' ');

    $col11 = new Columna('Tipo de Operación');
    $col11->setTipo(Columna::COMBO);
    $col11->setEsGrabable(true);
    $col11->setNombreCampo('asided');
    $col11->setCombo(Constantes::comboOperacion());
    $col11->setHTML(' ');

    $col12 = new Columna('Concepto Acumulativo');
    $col12->setTipo(Columna::COMBO);
    $col12->setEsGrabable(true);
    $col12->setNombreCampo('acucon');
    $col12->setCombo(Constantes::Contratos_nomina());
    $col12->setHTML(' ');

    $col13 = new Columna('Concepto Calculable');
    $col13->setTipo(Columna::COMBO);
    $col13->setEsGrabable(true);
    $col13->setNombreCampo('calcon');
    $col13->setCombo(Constantes::Contratos_nomina());
    $col13->setHTML(' ');

    $col14 = new Columna('Concepto Activo');
    $col14->setTipo(Columna::COMBO);
    $col14->setEsGrabable(true);
    $col14->setNombreCampo('activo');
    $col14->setCombo(Constantes::Contratos_nomina());
    $col14->setHTML(' ');

    $col15 = new Columna('Acumulado');
    $col15->setTipo(Columna::MONTO);
    $col15->setAlineacionObjeto(Columna::IZQUIERDA);
    $col15->setAlineacionContenido(Columna::IZQUIERDA);
    $col15->setEsGrabable(true);
    $col15->setNombreCampo('acumulado');
    $col15->setJScript('onBlur="javascript: event.keyCode=13; entermontootro(event,this.id)"');
    
    $col16 = new Columna('Nivel o Grado');
    $col16->setTipo(Columna::TEXTO);
    $col16->setEsGrabable(true);
    $col16->setAlineacionObjeto(Columna::CENTRO);
    $col16->setAlineacionContenido(Columna::CENTRO);
    $col16->setNombreCampo('nivgra');
    $col16->setHTML('type="text" size="10" readOnly="true"'); 

    $col17 = new Columna('Ced. Trabajador');
    $col17->setTipo(Columna::TEXTO);
    $col17->setEsGrabable(true);
    $col17->setAlineacionObjeto(Columna::CENTRO);
    $col17->setAlineacionContenido(Columna::CENTRO);
    $col17->setNombreCampo('cedemp');
    $col17->setHTML('type="text" size="10"');    

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);

    $this->obj = $opciones->getConfig($per);
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
	  $dato=Herramientas::getX('CODNOM','Npnomina','Nomnom',$this->getRequestParameter('codigo'));
	  $dato2=Herramientas::getX('CODNOM','Npnomina','Frecal',$this->getRequestParameter('codigo'));
	  $output = '[["'.$cajtexmos.'","'.$dato.'",""],["frecal","'.$dato2.'",""]]';

	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	  return sfView::HEADER_ONLY;
	}
	else if ($this->getRequestParameter('ajax')=='2')
	{
      $dato=""; $com="";
      $tipemp=$this->getRequestParameter('tipemp','');
      $valcodconct=H::getConfApp2('valcodconct', 'nomina', 'nomnomasiconnom');
      $filconusu=H::getConfApp2('filconusu', 'nomina', 'npforasiconemp');
      $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
	    $c= new Criteria();
      if ($filconusu=='S') {
        $codigo=$this->getRequestParameter('codigoconcepto');
        $sql='npdefcpt.codcon=\''.$codigo.'\' and npdefcpt.codcon in (select codcon from "SIMA_USER".segconusu where loguse=\''.$loguse.'\')';
        $c->add(NpdefcptPeer::CODCON, $sql, Criteria::CUSTOM);
      }else $c->add(NpdefcptPeer::CODCON,$this->getRequestParameter('codigoconcepto'));
      $datos= NpdefcptPeer::doSelectOne($c);
      if ($datos)
      {
      	$c= new Criteria();
      	$c->add(NpasiconempPeer::CODCON,$this->getRequestParameter('codigoconcepto'));
      	$data= NpasiconempPeer::doSelect($c);
      /*	if (!$data)
      	{ */
      	$c = new Criteria();
        $c->add(NpasiconnomPeer::CODNOM,$this->getRequestParameter('codigonomina'));
        $c->add(NpasiconnomPeer::CODCON,$this->getRequestParameter('codigoconcepto'));
        $resul= NpasiconnomPeer::doSelectOne($c);
        if ($resul)
        {
          $dato=NpdefcptPeer::getDescon($this->getRequestParameter('codigoconcepto'));
          $this->configGrid($this->getRequestParameter('codigonomina'),$this->getRequestParameter('frecuencia'),$this->getRequestParameter('codigoconcepto'),$tipemp);
          $existe='S';
          if ($valcodconct=='S')
          {
             $r= new Criteria();
             $r->add(NpcestaticketsPeer::CODNOM,$this->getRequestParameter('codigonomina'));
             $r->add(NpcestaticketsPeer::CODCON,$this->getRequestParameter('codigoconcepto'));
             $regr= NpcestaticketsPeer::doSelectOne($r);
             if ($regr){
              $com=',["npasiconemp_escestaticket","S",""]';
             }else $com=',["npasiconemp_escestaticket","",""]';
          }
        }
        else
        {
      	  $existe='N';
      	  $this->configGrid();
        }
      /*	}
        else
        {
          $existe='O';
          $this->configGrid();
        }*/
      }
      else
      {
        $existe='NN';
        $this->configGrid();
      }
      $output = '[["existecon","'.$existe.'",""],["'.$cajtexmos.'","'.$dato.'",""]'.$com.']';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	  }else if ($this->getRequestParameter('ajax')=='3'){
       $codcon=$this->getRequestParameter('codcon');
       $codcar=$this->getRequestParameter('codcar');
       $cedemp=$this->getRequestParameter('cedemp');
       $codemp=$this->getRequestParameter('codemp');
       $id=$this->getRequestParameter('id');
       $js="";

       $esdocente=H::getX_vacio('Codtipcar','Nptipcar','docsn',H::getX_vacio('Codcar','Npcargos','codtip',$codcar));
       if (!$esdocente) {
         $w= new Criteria();
         $w->add(NphojintPeer::CODEMP,$codemp,Criteria::NOT_EQUAL);
         $w->add(NphojintPeer::CEDEMP,$cedemp);
         $regw= NphojintPeer:: doSelectOne($w);
         if ($regw){
           $w2= new Criteria();
           $w2->add(NpasiconempPeer::CODCON,$codcon);
           $w2->add(NpasiconempPeer::CODEMP,$regw->getCodemp());
           //$w2->add(NpasiconempPeer::CODCAR,$codcar,Criteria::NOT_EQUAL);
           $regw2= NpasiconempPeer:: doSelectOne($w2);
           if ($regw2){
             $js="alert_('El Empleado ya tiene Asignado este Concepto en otra N&oacute;mina'); $('$id').checked=false;";
           }
         }
       }
       $output = '[["javascript","'.$js.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  }

  protected function getNpasiconempOrCreate($id = 'id', $concepto = 'concepto', $nomina= 'nomina')
  {
    if (!$this->getRequestParameter($concepto))
    {
      $npasiconemp = new Npasiconemp();
      $this->configGrid($this->getRequestParameter('npasiconemp[codnom2]'),$this->getRequestParameter('frecal'),$this->getRequestParameter('npasiconemp[codcon]'),$this->getRequestParameter('npasiconemp[codtipemp]'));

    }
    else
    {
      $c = new Criteria();
  	  $c->add(NpasiconempPeer::CODCON,$this->getRequestParameter($concepto));
  	  $npasiconemp = NpasiconempPeer::doSelectOne($c);
  	  $nomina=$this->getRequestParameter($nomina);
      if ($nomina=="") $nomina=Herramientas::getX('CODCON','Npasiconnom','Codnom',$npasiconemp->getCodcon());
      $frecal=Herramientas::getX('CODNOM','Npnomina','frecal',$nomina);
      $this->configGrid($nomina,$frecal,$npasiconemp->getCodcon());
      $npasiconemp->setCodnom2($nomina);
      $this->forward404Unless($npasiconemp);
    }

    return $npasiconemp;
  }

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
/*  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npasiconemp/filters');

    // pager
    $this->pager = new sfPropelPager('Npasiconnom', 5);
    $c = new Criteria();
	$c->addJoin(NpasiconempPeer::CODCON,NpasiconnomPeer::CODCON);
	$c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }*/

   public function executeIndex()
  {
    return $this->redirect('nomnomasiconnom/edit');
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
  protected function saveNpasiconemp($npasiconemp)
  {
	$grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
        //H::PrintR($grid);
        //exit();
	Nomina::salvarNomnomasiconnom($npasiconemp,$grid);
  }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpasiconempFromRequest()
  {
    $npasiconemp = $this->getRequestParameter('npasiconemp');

    if (isset($npasiconemp['codcon']))
    {
      $this->npasiconemp->setCodcon($npasiconemp['codcon']);
    }
    if (isset($npasiconemp['nomcon']))
    {
      $this->npasiconemp->setNomcon($npasiconemp['nomcon']);
    }
    if (isset($npasiconemp['nomcar']))
    {
      $this->npasiconemp->setNomcar($npasiconemp['nomcar']);
    }
    if (isset($npasiconemp['codemp']))
    {
      $this->npasiconemp->setCodemp($npasiconemp['codemp']);
    }
    if (isset($npasiconemp['codcar']))
    {
      $this->npasiconemp->setCodcar($npasiconemp['codcar']);
    }
    if (isset($npasiconemp['nomemp']))
    {
      $this->npasiconemp->setNomemp($npasiconemp['nomemp']);
    }
    if (isset($npasiconemp['monto']))
    {
      $this->npasiconemp->setMonto($npasiconemp['monto']);
    }
    if (isset($npasiconemp['fecini']))
    {
      if ($npasiconemp['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npasiconemp['fecini']))
          {
            $value = $dateFormat->format($npasiconemp['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npasiconemp['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npasiconemp->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npasiconemp->setFecini(null);
      }
    }
    if (isset($npasiconemp['fecexp']))
    {
      if ($npasiconemp['fecexp'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npasiconemp['fecexp']))
          {
            $value = $dateFormat->format($npasiconemp['fecexp'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npasiconemp['fecexp'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npasiconemp->setFecexp($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npasiconemp->setFecexp(null);
      }
    }
    if (isset($npasiconemp['frecon']))
    {
      $this->npasiconemp->setFrecon($npasiconemp['frecon']);
    }
    if (isset($npasiconemp['asided']))
    {
      $this->npasiconemp->setAsided($npasiconemp['asided']);
    }
    if (isset($npasiconemp['acucon']))
    {
      $this->npasiconemp->setAcucon($npasiconemp['acucon']);
    }
    if (isset($npasiconemp['calcon']))
    {
      $this->npasiconemp->setCalcon($npasiconemp['calcon']);
    }
    if (isset($npasiconemp['activo']))
    {
      $this->npasiconemp->setActivo($npasiconemp['activo']);
    }
    if (isset($npasiconemp['acumulado']))
    {
      $this->npasiconemp->setAcumulado($npasiconemp['acumulado']);
    }
    if (isset($npasiconemp['codnom2']))
    {
      $this->npasiconemp->setCodnom2($npasiconemp['codnom2']);
    }
    if (isset($npasiconemp['desnom']))
    {
      $this->npasiconemp->setDesnom($npasiconemp['desnom']);
    }
    if (isset($npasiconemp['codtipemp']))
    {
      $this->npasiconemp->setCodtipemp($npasiconemp['codtipemp']);
    }
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
      $this->codigoemp ="";
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
        $this->npasiconemp = $this->getNpasiconempOrCreate();
        $this->updateNpasiconempFromRequest();

      if (!$this->npasiconemp->getId())
      {
      $valcodconct=H::getConfApp2('valcodconct', 'nomina', 'nomnomasiconnom');
       if ($valcodconct=='S') {
         $this->configGrid($this->getRequestParameter('npasiconemp[codnom2]'),$this->getRequestParameter('frecal'),$this->getRequestParameter('npasiconemp[codcon]'),$this->getRequestParameter('npasiconemp[codtipemp]'));
         $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
     
         $x = $grid[0];
         $j = 0;
         while ($j < count($x)) {
          if ($x[$j]['check']=='1') {
            $esdocente=H::getX_vacio('Codtipcar','Nptipcar','docsn',H::getX_vacio('Codcar','Npcargos','codtip',$x[$j]['codcar']));
            if (!$esdocente) {
             $cedemp=H::getX_vacio('CODEMP','Nphojint','Cedemp',$x[$j]['codemp']);
             $w= new Criteria();
             $w->add(NphojintPeer::CODEMP,$x[$j]['codemp'],Criteria::NOT_EQUAL);
             $w->add(NphojintPeer::CEDEMP,$cedemp);
             $regw= NphojintPeer:: doSelectOne($w);
             if ($regw){
               $w2= new Criteria();
               $w2->add(NpasiconempPeer::CODCON,$this->npasiconemp->getCodcon());
               $w2->add(NpasiconempPeer::CODEMP,$regw->getCodemp());
               //$w2->add(NpasiconempPeer::CODCAR,$codcar,Criteria::NOT_EQUAL);
               $regw2= NpasiconempPeer:: doSelectOne($w2);
                if ($regw2){
                  if ($this->codigoemp=='')
                    $this->codigoemp=$x[$j]['codemp'];
                  else
                    $this->codigoemp=$this->codigoemp.', '.$x[$j]['codemp'];                
               }
             }
           }
           }
           $j++;
          }
          if ($this->codigoemp!=''){
            $this->coderr=4417;               
          }
        }
      }//if (!$npasicaremp->getId())
    
        if ($this->coderr<>-1 )
        {
          return false;
        }else return true;
    }else return true;
  }  

 /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->npasiconemp = $this->getNpasiconempOrCreate();
    $this->updateNpasiconempFromRequest();

     $this->configGrid($this->getRequestParameter('npasiconemp[codnom2]'),$this->getRequestParameter('frecal'),$this->getRequestParameter('npasiconemp[codcon]'),$this->getRequestParameter('npasiconemp[codtipemp]'));

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err.' :'.$this->codigoemp);
      }
    }
    return sfView::SUCCESS;
  }  

}
