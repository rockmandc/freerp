<?php

/**
 * biedisactinm actions.
 *
 * @package    Roraima
 * @subpackage biedisactinm
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biedisactinmActions extends autobiedisactinmActions
{
  private static $coderror1=-1;

  public function CargarTipos()
  {
  $c = new Criteria();
  $lista_tip = BndisbiePeer::doSelect($c);

  $tipos = array();

  foreach($lista_tip as $obj_tip)
  {
    $tipos += array($obj_tip->getCoddis()." - ".$obj_tip->getDesdis() => $obj_tip->getCoddis()." - ".$obj_tip->getDesdis());
  }
  return $tipos;
    }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->bndisinm = $this->getBndisinmOrCreate();
    $this->setVars();
    $this->tipos = $this->CargarTipos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndisinmFromRequest();

       if ($this->saveBndisinm($this->bndisinm)==-1)

         {

          $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

          if ($this->getRequestParameter('save_and_add'))
          {
            return $this->redirect('biedisactinm/create');
          }
          else if ($this->getRequestParameter('save_and_list'))
          {
            return $this->redirect('biedisactinm/list');
          }
          else
          {
            return $this->redirect('biedisactinm/edit?id='.$this->bndisinm->getId());
          }

         }
         else
        {
              $this->labels = $this->getLabels();
              $err = Herramientas::obtenerMensajeError($this->coderror);
              $this->getRequest()->setError('',$err);
              return sfView::SUCCESS;
        }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

public function setVars()
  {
      $this->mascaracatalogo = Herramientas::getX_vacio('codins','bndefins','ForAct','001');
      $this->mascaraformatoubi = Herramientas::getX_vacio('codins','bndefins','ForUbi','001');
      $this->mascaralonformato = Herramientas::getX_vacio('codins','bndefins','LonAct','001');
      $this->mascaralonubicacion = Herramientas::getX_vacio('codins','bndefins','LonUbi','001');
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
     $this->setVars();

    if ($this->getRequestParameter('ajax')=='1')
      {
        $js=""; $codact=$desinm=$codubi=$desubi=""; $valini="0,00";
        $c = new Criteria();
        $c->add(BnreginmPeer::CODACT,$this->getRequestParameter('codact'));
        $c->add(BnreginmPeer::CODINM,$this->getRequestParameter('codigo'));
        $bnreginm = BnreginmPeer::doSelectOne($c);
        if($bnreginm){
          if ($bnreginm->getStainm()!="D") {
            $codact=$trajo->getCodact();
            $desinm=$trajo->getDesinm();
            $codubi=$trajo->getCodubi();
            $desubi=H::getX_vacio('codubi','Bnubibie','desubi',$codubi);
        	  $valini=H::FormatoMonto($bnreginm->getValini());
          }else $js="alert('El Bien Inmueble esta Desincorporado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        } else $js="alert('El Bien Inmueble no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        
        $output = '[["javascript","'.$js.'"],["'.$cajtexmos.'","'.$codact.'",""],["'.$cajtexcom.'","'.$desinm.'"],["bndisinm_codubiori","'.$codubi.'"],["bndisinm_desubiori","'.$desubi.'"],["bndisinm_mondisinm","'.$valini.'"]]';
      }
      else if($this->getRequestParameter('ajax')=='2')
      {
        $dato=BnreginmPeer::getDescrinm($this->getRequestParameter('codigo'),$cajtexcom);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }else if($this->getRequestParameter('ajax')=='3')
      {
        $js=""; $codact=$desinm=$codubi=$desubi=""; $valini="0,00";
        if (strlen($this->mascaracatalogo)!=strlen($this->getRequestParameter('codigo')))
      	{
      		$js="alert_('El Nivel de Activo debe ser de &uacute;ltimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      	}else {
         if ($this->getRequestParameter('codinm')!="")
         {
          $c = new Criteria();
          $c->add(BnreginmPeer::CODACT,$this->getRequestParameter('codigo'));
          $c->add(BnreginmPeer::CODINM,$this->getRequestParameter('codinm'));
          $bnreginm = BnreginmPeer::doSelectOne($c);
          if($bnreginm){
            if ($bnreginm->getStainm()!="D") {
              $desinm=$trajo->getDesinm();
              $codubi=$trajo->getCodubi();
              $desubi=H::getX_vacio('codubi','Bnubibie','desubi',$codubi);
              $valini=H::FormatoMonto($bnreginm->getValini());
            }else $js="alert('El Bien Inmueble esta Desincorporado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          } else $js="alert('El Bien Inmueble no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
         }else {
          $c = new Criteria();
          $c->add(BnreginmPeer::CODACT,$this->getRequestParameter('codigo'));
          $bnreginm = BnreginmPeer::doSelectOne($c);
          if(!$bnreginm)
            $js="alert('El Código de activo no esta registrado con un Bien Inmueble'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
         }
      	}

        $output = '[["javascript","'.$js.'"],["bndisinm_desinm","'.$desinm.'"],["bndisinm_codubiori","'.$codubi.'"],["bndisinm_desubiori","'.$desubi.'"],["bndisinm_mondisinm","'.$valini.'"]]';
      }

      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateBndisinmFromRequest()
  {
    $bndisinm = $this->getRequestParameter('bndisinm');

    if (isset($bndisinm['codact']))
    {
      $this->bndisinm->setCodact($bndisinm['codact']);
    }
    if (isset($bndisinm['codmue']))
    {
      $this->bndisinm->setCodmue($bndisinm['codmue']);
    }
    if (isset($bndisinm['desinm']))
    {
      $this->bndisinm->setDesinm($bndisinm['desinm']);
    }
    if (isset($bndisinm['nrodisinm']))
    {
      $this->bndisinm->setNrodisinm($bndisinm['nrodisinm']);
    }
    if (isset($bndisinm['tipdisinm']))
    {
      $this->bndisinm->setTipdisinm($bndisinm['tipdisinm']);
    }
    if (isset($bndisinm['motdisinm']))
    {
      $this->bndisinm->setMotdisinm($bndisinm['motdisinm']);
    }
    if (isset($bndisinm['fecdisinm']))
    {
      if ($bndisinm['fecdisinm'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndisinm['fecdisinm']))
          {
            $value = $dateFormat->format($bndisinm['fecdisinm'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndisinm['fecdisinm'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndisinm->setFecdisinm($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndisinm->setFecdisinm(null);
      }
    }
    if (isset($bndisinm['fecdevdis']))
    {
      if ($bndisinm['fecdevdis'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndisinm['fecdevdis']))
          {
            $value = $dateFormat->format($bndisinm['fecdevdis'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndisinm['fecdevdis'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndisinm->setFecdevdis($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndisinm->setFecdevdis(null);
      }
    }
    if (isset($bndisinm['mondisinm']))
    {
      $this->bndisinm->setMondisinm($bndisinm['mondisinm']);
    }
    if (isset($bndisinm['detdisinm']))
    {
      $this->bndisinm->setDetdisinm($bndisinm['detdisinm']);
    }
    if (isset($bndisinm['codubiori']))
    {
      $this->bndisinm->setCodubiori($bndisinm['codubiori']);
    }
    if (isset($bndisinm['desubiori']))
    {
      $this->bndisinm->setDesubiori($bndisinm['desubiori']);
    }
    if (isset($bndisinm['codubides']))
    {
      $this->bndisinm->setCodubides($bndisinm['codubides']);
    }
    if (isset($bndisinm['desubides']))
    {
      $this->bndisinm->setDesubides($bndisinm['desubides']);
    }
    if (isset($bndisinm['obsdisinm']))
    {
      $this->bndisinm->setObsdisinm($bndisinm['obsdisinm']);
    }

      $this->bndisinm->setStadisinm('A');

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
    $this->bndisinm = $this->getBndisinmOrCreate();
    $this->updateBndisinmFromRequest();
    $this->tipos = $this->CargarTipos();
    $this->setVars();
    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
      	if($this->coderror1==529)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('bndisinm{fecdisinm}',$err);
      	}
      	if($this->coderror1==521)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('bndisinm{fecdisinm}',$err);
      	}
      	if($this->coderror1==530)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('bndisinm{fecdevdis}',$err);
      	}
        if($this->coderror1==508)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('',$err);
      	}
      }
    }

    return sfView::SUCCESS;
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
  protected function saveBndisinm($bndisinm)
  {
    $this->coderror = Inmuebles::Validar_biedisactinm($bndisinm->getFecdisinm(),$bndisinm->getFecdevdis());
    if ($this->coderror==-1)
    {
      if (!$bndisinm->getId())
      {
        self::GenerarComprobante($bndisinm, array());
        return Inmuebles::SalvarBiedisactinm($bndisinm);
      }
    }
    return $this->coderror;
  }


  public function GenerarComprobante($bndismue, $grid)
  {
      $concom=1;
      $form="sf_admin/biedisactinm/confincomgen";
      $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
      $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      if ($grabo=='S')
      {
        $i=0;
        while ($i<$concom)
        {
         $formulario[$i]=$form.$i;
         if ($this->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
         {
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
          $debito=$this->getUser()->getAttribute('debito',null,$formulario[$i]);
          $credito=$this->getUser()->getAttribute('credito',null,$formulario[$i]);
          $grid=$this->getUser()->getAttribute('grid',null,$formulario[$i]);

          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);

          $tiptra=H::getX_vacio('CODINS','Bndefins','Codtiptra','001');
          $this->numero = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]),'BIE',$tiptra);

          //$bndismue->setNumcom($this->numero);
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');

     // $grid=Herramientas::CargarDatosGridv2($this,$this->objeto,true);

  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
    $this->bndisinm = $this->getBndisinmOrCreate();
    $this->updateBndisinmFromRequest();

    $c = new Criteria();
    $c->add(BndisbiePeer::CODDIS,substr($this->bndisinm->getTipdisinm(),0,6));
    $bndisbie = BndisbiePeer::doSelectOne($c);

    if ($bndisbie){
      if ($bndisbie->getDesinc()=='S'){

        $desincorpora = true;
      }else{
        $desincorpora = false;
      }

               $concom   = 0;
               $mensaje1 = "";
               $msj1     = "";
               $msj2     = "";
               $cuentaporpagarrendicion = "";
               $mensajeuno  = "";
               $msjuno      = "";
               $msjdos      = "";
               $msjtres     = "";
               $comprobante = "";
               $this->mensajeuno = "";
               $this->msj1     = "";
               $this->msj2     = "";
               $this->mensaje1 = "";
               $this->msjuno   = "";
               $this->msjdos   = "";
               $this->msjtres  = "";
               $this->i        = "";
               $this->formulario = array();

      if ($bndisbie->getAfecon()=='S'){
        $c = new Criteria();
        $c->add(BndefconiPeer::CODACT,$this->bndisinm->getCodact());
        $c->add(BndefconiPeer::CODINM,$this->bndisinm->getCodmue());
        $bndefcon = BndefconPeer::doSelectOne($c);

          if ($bndefcon){
            $c = new Criteria();
            $c->add(BnreginmPeer::CODACT,$this->bndisinm->getCodact());
            $c->add(BnreginmPeer::CODINM,$this->bndisinm->getCodmue());
            $bnreginm = BnreginmPeer::doSelectOne($c);
              if ($bnreginm)
              {
                  $x = Inmuebles::grabarComprobante($this->bndisinm,$bnreginm,$comprobante,$desincorpora,$bndefcon);
                  $concom = $concom + 1;

                  $form = "sf_admin/biedisactinm/confincomgen";
                  $i    = 0;
                  while ($i < $concom)
                  {
                     $f[$i] = $form.$i;
                     $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
                     $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
                     $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
                     $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
                     $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
                     $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
                     $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
                     $this->getUser()->setAttribute('tipmov', '');
                     $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
                     $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
                     $i++;
                  }
                  $this->i = $concom - 1;
                  $this->formulario = $f;

              // }
              }
            }else{
              $this->msjtres="El Activo de esta Disposicion genera un Movimiento contable, pero este no puede ser realizado ya que dicho Activo no tiene Definicion Contable";
            }
          }else{
            $this->msjtres="No se Puede Generar el Movimiento Contable por el Tipo de Definicion de este Movimiento.";
        }
    }else{
      $this->msjtres="Este movimiento esta definido, que no se pueda generar movimiento contable";
    }

      $output =  '[["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }


  protected function deleteBndisinm($bndisinm)
  {
    return Inmuebles::EliminarBiedisactinm($bndisinm);
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
      $this->bndisinm = $this->getBndisinmOrCreate();
      try{ $this->updateBndisinmFromRequest();}catch(Exception $ex){}

        $c = new Criteria();
        $c->add(BnreginmPeer::CODACT,$this->getRequestParameter('bndisinm[codact]'));
        $c->add(BnreginmPeer::CODINM,$this->getRequestParameter('bndisinm[codinm]'));
        $bnreginm = BnreginmPeer::doSelectOne($c);
        if ($bnreginm)
        {
          $this->coderror1=221;
          return false;
        }

      if ($this->getRequestParameter('bndisinm[fecdisinm]')!="")
      {
      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('bndisinm[fecdisinm]'))==true)
  	  {
        $this->coderror1=529;
        return false;
  	  }

      if (Tesoreria::validarFechaPerContable($this->getRequestParameter('bndisinm[fecdisinm]')))
      {
	    $this->coderror1=521;
	    return false;
	  }
       if ($this->getRequestParameter('bndisinm[fecdevdis]')!="")
       {
		if (Tesoreria::validarFechaMayorMenor($this->getRequestParameter('bndisinm[fecdisinm]'),$this->getRequestParameter('bndisinm[fecdevdis]'),'>'))
		{
		  $this->coderror1=530;
		  return false;
		}
       }
      }

	 /*     if (self::validarGeneraComprobante())
	      {
		    $this->coderror1=508;
		    return false;
		  }*/

      return true;
    }else return true;
  }

  public function validarGeneraComprobante()
  {
    $form="sf_admin/biedisactinm/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');

    if ($grabo=='')
    { return true;}
    else { return false;}
  }

}
