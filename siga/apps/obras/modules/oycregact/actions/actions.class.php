<?php

/**
 * oycregact actions.
 *
 * @package    Roraima
 * @subpackage oycregact
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycregactActions extends autooycregactActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->ocregact = $this->getOcregactOrCreate();
    $this->configGrid($this->ocregact->getCodcon());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcregactFromRequest();

      $this->saveOcregact($this->ocregact);

      $this->setFlash('notice', 'Your modifications have been saved');

      $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycregact/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycregact/list');
      }
      else
      {
        return $this->redirect('oycregact/edit?id='.$this->ocregact->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

   /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOcregactFromRequest()
  {
    $ocregact = $this->getRequestParameter('ocregact');
    $this->configGrid($ocregact['codcon']);

    if (isset($ocregact['codcon']))
    {
      $this->ocregact->setCodcon($ocregact['codcon']);
    }
    if (isset($ocregact['descon']))
    {
      $this->ocregact->setDescon($ocregact['descon']);
    }
    if (isset($ocregact['codobr']))
    {
      $this->ocregact->setCodobr($ocregact['codobr']);
    }
    if (isset($ocregact['desobr']))
    {
      $this->ocregact->setDesobr($ocregact['desobr']);
    }
    if (isset($ocregact['codpro']))
    {
      $this->ocregact->setCodpro($ocregact['codpro']);
    }
    if (isset($ocregact['nompro']))
    {
      $this->ocregact->setNompro($ocregact['nompro']);
    }
    if (isset($ocregact['codtipact']))
    {
      $this->ocregact->setCodtipact($ocregact['codtipact']);
    }
    if (isset($ocregact['destipact']))
    {
      $this->ocregact->setDestipact($ocregact['destipact']);
    }
    if (isset($ocregact['numofi']))
    {
      $this->ocregact->setNumofi($ocregact['numofi']);
    }
    if (isset($ocregact['fecact']))
    {
      if ($ocregact['fecact'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregact['fecact']))
          {
            $value = $dateFormat->format($ocregact['fecact'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregact['fecact'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregact->setFecact($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregact->setFecact(null);
      }
    }
    if (isset($ocregact['obsact']))
    {
      $this->ocregact->setObsact($ocregact['obsact']);
    }
    if (isset($ocregact['cedins']))
    {
      $this->ocregact->setCedins($ocregact['cedins']);
    }
    if (isset($ocregact['nomins']))
    {
      $this->ocregact->setNomins($ocregact['nomins']);
    }
    if (isset($ocregact['cedtec']))
    {
      $this->ocregact->setCedtec($ocregact['cedtec']);
    }
    if (isset($ocregact['nomtec']))
    {
      $this->ocregact->setNomtec($ocregact['nomtec']);
    }
    if (isset($ocregact['cedfis']))
    {
      $this->ocregact->setCedfis($ocregact['cedfis']);
    }
    if (isset($ocregact['nomdir']))
    {
      $this->ocregact->setNomdir($ocregact['nomdir']);
    }
    if (isset($ocregact['cedres']))
    {
      $this->ocregact->setCedres($ocregact['cedres']);
    }
    if (isset($ocregact['nomper']))
    {
      $this->ocregact->setNomper($ocregact['nomper']);
    }
    if (isset($ocregact['cedtop']))
    {
      $this->ocregact->setCedtop($ocregact['cedtop']);
    }
    if (isset($ocregact['nomtop']))
    {
      $this->ocregact->setNomtop($ocregact['nomtop']);
    }
  }

    public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
    {
      $this->tags=Herramientas::autocompleteAjax('codcon','ocregcon','codcon',$this->getRequestParameter('ocregact[codcon]'));
    }
    else if ($this->getRequestParameter('ajax')=='2')
    {
      $this->tags=Herramientas::autocompleteAjax('codtipact','Octipact','codtipact',$this->getRequestParameter('ocregact[codtipact]'));
    }
    else if ($this->getRequestParameter('ajax')=='3')
    {
      $this->tags=Herramientas::autocompleteAjax('codemp','Nphojint','codemp',$this->getRequestParameter('ocregssol[cedfir]'));
    }
    else if ($this->getRequestParameter('ajax')=='4')
    {
      $this->tags=Herramientas::autocompleteAjax('codemp','Nphojint','codemp',$this->getRequestParameter('ocregact[cedfis]'));
    }

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
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');

    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(OcregconPeer::CODCON,$codigo);
        $c->add(OcregconPeer::STACON,'N',Criteria::NOT_EQUAL);
        $data=OcregconPeer::doSelectOne($c);
        if ($data)
        {
          $dato=$data->getDescon();
          $dato1=$data->getCodobr();
          $dato2=Herramientas::getX('CODOBR','Ocregobr','Desobr',$dato1);
          $dato3=$data->getCodpro();
          $dato4=Herramientas::getX('CODPRO','Caprovee','Nompro',$dato3);
          $dato5=Herramientas::getX('CODPRO','Caprovee','Rifrepleg',$dato3);
          $dato6=Herramientas::getX('CODPRO','Caprovee','Nomrepleg',$dato3);
          $c= new Criteria();
          $c->add(OcproperPeer::CODPRO,$dato3);
          $c->addJoin(OcdefperPeer::CEDPER,OcproperPeer::CEDPER);
          $c->addJoin(OctipcarPeer::CODTIPCAR,OcdefempPeer::CODINGRES);
          $c->addJoin(OcdefempPeer::CODINGRES,OcdefperPeer::CODTIPCAR);
          $c->addJoin(OctipcarPeer::CODTIPCAR,OcdefperPeer::CODTIPCAR);
          $resul= OcdefperPeer::doSelectOne($c);
          if ($resul)
          {
          	$dato7=$resul->getCedper();
          	$dato8=$resul->getNomper();
          }else { $dato7=""; $dato8="";}
          $javascript="";
        }
        else { $dato=""; $dato1=""; $dato2=""; $dato3=""; $dato4=""; $dato5=""; $dato6=""; $dato7=""; $dato8="";
        	$javascript="alert('El Número de Contrato no existe'); $('".$cajtexcom."').value";}
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["ocregact_codobr","'.$dato1.'",""],["ocregact_desobr","'.$dato2.'",""],["ocregact_codpro","'.$dato3.'",""],["ocregact_nompro","'.$dato4.'",""],["ocregact_cedtop","'.$dato5.'",""],["ocregact_nomtop","'.$dato6.'",""],["ocregact_cedres","'.$dato7.'",""],["ocregact_nomper","'.$dato8.'",""],["javascript","'.$javascript.'",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(OctipactPeer::CODTIPACT,$codigo);
        $reg= OctipactPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getDestipact();
          $javascript="";
        }else
        {
         $javascript="alert('El Tipo de Acta no Existe'); $('$cajtexcom').avlue='';";
         $dato="";
        }
		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        break;

      case '3':
        $c= new Criteria();
        $c->add(OcinginsobrPeer::CODOBR,$this->getRequestParameter('obra'));
        $reg= OcinginsobrPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getNomins();
          $javascript="";
        }else
        {
        	$dato="";
        	$javascript="alert('El Ingeniero Inspector No esta asociado a esa Obra');  $('$cajtexcom').value='';";
        }
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        break;
      case '4':
        $c= new Criteria();
        $c->add(OcressolPeer::NUMCOR,$codigo);
        $reg=OcressolPeer::doSelectOne($c);
        if ($reg)
        {
       	 $javascript="alert('El Número de Correspondencia ya esta utilizado'); $('".$cajtexcom."').value=''; $('".$cajtexcom."').focus();";
        }else { $javascript="";}

		$output = '[["javascript","'.$javascript.'",""]]';
        break;
      case '5':
      $dato="";
        $c= new Criteria();
        $c->add(NphojintPeer::CEDEMP,$codigo);
        $reg=NphojintPeer::doSelectOne($c);
        if (!$reg)
        {
       	 $javascript="alert('Este Empleado no se Encuentra Registrado'); $('".$cajtexcom."').value=''; $('".$cajtexcom."').focus();";
        }else { $javascript=""; $dato=$reg->getNomemp();}

		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codcon='')
   {
       $c = new Criteria();
       $c->add(OcasiactPeer::CODCON,$codcon);
       $reg = OcasiactPeer::doSelect($c);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(false);
       $opciones->setTabla('Ocasiact');
       $opciones->setAncho(800);
       $opciones->setAnchoGrid(800);
       $opciones->setFilas(0);
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código');
       $col1->setTipo(Columna::TEXTO);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codtipact');
       $col1->setHTML('type="text" size="10" readonly="true"');

       $col2 = clone $col1;
       $col2->setTitulo('Tipo de Acta');
       $col2->setNombreCampo('destipact');
       $col2->setHTML('type="text" size="20" readonly=true');

       $col3 = clone $col1;
       $col3->setTitulo('Número Oficio');
       $col3->setNombreCampo('numofi');
       $col3->setHTML('type="text" size="5" readonly=true');

       $col4 = new Columna('Fecha');
       $col4->setTipo(Columna::FECHA);
       $col4->setHTML('readonly="true"');
       $col4->setVacia(true);
       $col4->setNombreCampo('fecact');

       $col5 = new Columna('Observaciones');
       $col5->setTipo(Columna::TEXTO);
       $col5->setAlineacionObjeto(Columna::CENTRO);
       $col5->setAlineacionContenido(Columna::CENTRO);
       $col5->setNombreCampo('obsact');
       $col5->setHTML('type="text" size="30" readonly="true"');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);

       $this->obj = $opciones->getConfig($reg);
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
  protected function saveOcregact($ocregact)
  {

    $c= new Criteria();
    $c->add(OcasiactPeer::CODCON,$ocregact->getCodcon());
    $c->add(OcasiactPeer::CODTIPACT,$ocregact->getCodtipact());
    $resultado= OcasiactPeer::doSelectOne($c);
    if (!$resultado)
    {
       $ocasiact= new Ocasiact();
       $ocasiact->setCodcon($ocregact->getCodcon());
       $ocasiact->setCodtipact($ocregact->getCodtipact());
       $ocasiact->setNumofi($ocregact->getNumofi());
       $ocasiact->setObsact($ocregact->getObsact());
       $ocasiact->setFecact($ocregact->getFecact());
       $ocasiact->save(); //Graba Detalle de la acta

       $ocregact->save(); //Graba los datos de la acta

    }
    Obras::actualizarFechas($ocregact);
    Obras::actualizarStatus($ocregact);

  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->ocregact = OcregactPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocregact);

    $c= new Criteria();
    $c->add(OcregvalPeer::CODCON,$this->ocregact->getCodcon());
    $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
    $resul= OcregvalPeer::doSelectOne($c);
    if ($resul)
    {
      $this->getRequest()->setError('delete', 'No se pudo eliminar la Acta porque tiene registrada una Valuación');
      return $this->forward('oycregact', 'list');
    }
    else
    {
      $c= new Criteria();
      $c->add(OcasiactPeer::CODCON,$this->ocregact->getCodcon());
      $reg= OcasiactPeer::doSelect($c);
      if ($reg)
      {
      	if (count($reg)==1)
      	{
	      	$c= new Criteria();
	      	$c->add(OcregconPeer::CODCON,$this->ocregact->getCodcon());
	      	$resultado= OcregconPeer::doSelectOne($c);
	      	if ($resultado)
	      	{
	          $resultado->setStacon('A');
	          $resultado->save();
	      	}
	      	$c= new Criteria();
	      	$c->add(OcregobrPeer::CODOBR,$this->ocregact->getCodobr());
	      	$resultado= OcregobrPeer::doSelectOne($c);
	      	if ($resultado)
	      	{
	          $resultado->setStaobr('A');
	          $resultado->save();
	      	}
	      	$reg->delete();
	      	$this->deleteOcregact($this->ocregact);
      	}else
      	{
      	  $sql="select max(id) as idb from ocasiact";
          if (Herramientas::BuscarDatos($sql,$datos))
          {
            $acteli= $datos[0]['idb'];
            $c= new Criteria();
		    $c->add(OcasiactPeer::ID,$acteli);
		    OcasiactPeer::doDelete($c);
          }
      	}

		$this->Bitacora('Elimino');
      }
    }
    return $this->redirect('oycregact/list');
  }

}
