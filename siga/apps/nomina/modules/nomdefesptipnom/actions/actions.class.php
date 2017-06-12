<?php

/**
 * nomdefesptipnom actions.
 *
 * @package    Roraima
 * @subpackage nomdefesptipnom
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefesptipnomActions extends autonomdefesptipnomActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npnomina = $this->getNpnominaOrCreate();
    $this->listafrecpag = Constantes::ListaFrecuenciaPago();
    $this->listagenordpag = Constantes::ListaGeneraOrdenPago();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpnominaFromRequest();

      $this->saveNpnomina($this->npnomina);

      $this->npnomina->setId(Herramientas::getX_vacio('codnom','npnomina','id',$this->npnomina->getCodnom()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefesptipnom/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefesptipnom/list');
      }
      else
      {
        return $this->redirect('nomdefesptipnom/edit?id='.$this->npnomina->getId());
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
  protected function updateNpnominaFromRequest()
  {
    $npnomina = $this->getRequestParameter('npnomina');
    $this->listafrecpag = Constantes::ListaFrecuenciaPago();
		$this->listagenordpag = Constantes::ListaGeneraOrdenPago();


    if (isset($npnomina['codnom']))
    {
      $this->npnomina->setCodnom(str_pad($npnomina['codnom'], 3, '0', STR_PAD_LEFT));
    }
    if (isset($npnomina['nomnom']))
    {
      $this->npnomina->setNomnom($npnomina['nomnom']);
    }
    if (isset($npnomina['frecal']))
    {
      $this->npnomina->setFrecal($npnomina['frecal']);
    }
    if (isset($npnomina['ultfec']))
    {
      if ($npnomina['ultfec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npnomina['ultfec']))
          {
            $value = $dateFormat->format($npnomina['ultfec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npnomina['ultfec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npnomina->setUltfec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npnomina->setUltfec(null);
      }
    }
    /*if (isset($npnomina['profec_']))
    {
      if ($npnomina['profec_'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($npnomina['profec_']))
          {
          	//echo  $npnomina['profec'].'-------- ';
          	//$value = substr($npnomina['profec'],8,2) .'-'.substr($npnomina['profec'],5,2) .'-'.substr($npnomina['profec'],0,4);
            $value = $dateFormat->format($npnomina['profec_'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npnomina['profec_'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }

//          echo $value;

          $this->npnomina->setProfec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npnomina->setProfec(null);
      }
    }*/
    if (isset($npnomina['profec']))
    {
      if ($npnomina['profec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npnomina['profec']))
          {
            $value = $dateFormat->format($npnomina['profec'], 'i', $dateFormat->getInputPattern('d'));
    }
          else
          {
            $value_array = $npnomina['profec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npnomina->setProfec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npnomina->setProfec(null);
      }
    }
    if (isset($npnomina['numsem']))
    {
      $this->npnomina->setNumsem($npnomina['numsem']);
    }
    if (isset($npnomina['ordpag']))
    {
      $this->npnomina->setOrdpag($npnomina['ordpag']);
    }
    if (isset($npnomina['codban']))
    {
      $this->npnomina->setCodban($npnomina['codban']);
    }
    if (isset($npnomina['numcue']))
    {
      $this->npnomina->setNumcue($npnomina['numcue']);
    }
    if (isset($npnomina['codcta']))
    {
      $this->npnomina->setCodcta($npnomina['codcta']);
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
    $this->npnomina = $this->getNpnominaOrCreate();
    try{ $this->updateNpnominaFromRequest();}catch(Exception $ex){}


    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->npnomina = NpnominaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npnomina);


    $id=$this->getRequestParameter('id');
    $c= new Criteria();
    $c->add(NpasicarnomPeer::CODNOM,$this->npnomina->getCodnom());
    $dato=NpasicarnomPeer::doSelect($c);
    if (!$dato)
    {
      $c= new Criteria();
      $c->add(NpdefmovPeer::CODNOM,$this->npnomina->getCodnom());
      $dato2=NpdefmovPeer::doSelect($c);
      if (!$dato2)
      {
      	$this->deleteNpnomina($this->npnomina);
      	$this->Bitacora('Elimino');
      }
      else
      {
      	$this->setFlash('notice','Esta Nómina esta asociada a Definición de Movimientos.');
        return $this->redirect('nomdefesptipnom/edit?id='.$id);
      }
    }
    else
    {
      $this->setFlash('notice','Esta Nómina ya tiene Cargos asignados.');
      return $this->redirect('nomdefesptipnom/edit?id='.$id);
    }
    return $this->redirect('nomdefesptipnom/list');
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
     $js="";
    $this->codigo = $this->getRequestParameter('codigo','');
    $this->ultfech = $this->getRequestParameter('ultfec','');
    $ajax = $this->getRequestParameter('ajax','');
    $ultfec=split('/',$this->ultfech);
    $newulfec=$ultfec[2].'-'.$ultfec[1].'-'.$ultfec[0];
    $js="";
    switch ($ajax){
      case '1':
        switch($this->codigo)
	     {
		   case 'S':
			 $intervalo='ww';
			 $cant=1;
	      	 break;
		   case  'Q':
		   	 $intervalo='d';
			 $cant=15;
			 $ultfec=split('/',$this->ultfech);
			 $newulfec=$ultfec[2].'-'.$ultfec[1].'-'.$ultfec[0];
			 $tal= $ultfec[2].'-'.$ultfec[1].'-'.'01';
	   	     $fec2=Herramientas::dateAdd('d',13,$newulfec,'+');
	   	     $feccompara=split('-',$fec2);
	         $fechafin=Herramientas::dateAdd('d',1,(Herramientas::dateAdd('m',1,$tal,'+')),'-');
	   	     if ((intval($ultfec[0])>15) && (intval($ultfec[1])==intval($feccompara[1])))
	   	     {
	   	     	$cant=48;
	   	     	$newfechafin=split('-',$fechafin);
	   	     	$profec=$newfechafin[2].'/'.$newfechafin[1].'/'.$newfechafin[0];
	   	     }

	         if ((intval($ultfec[0])>15) && (intval($ultfec[1])==2))
	   	     {
	   	     	$cant=48;
	   	     	$newfechafin=split('-',$fechafin);
	   	     	$profec=$newfechafin[2].'/'.$newfechafin[1].'/'.$newfechafin[0];
	   	     }
			 break;
		   case ('M' || 'A'):
			 $intervalo='m';
			 $cant=48;//1;
			 $ultfec=split('/',$this->ultfech);
			 $newulfec=$ultfec[2].'-'.$ultfec[1].'-'.$ultfec[0];
			 /*if ((intval($ultfec[1])==2) && (intval($ultfec[0])==1))
			 {
			   $fec2=Herramientas::dateAdd('d',28,$newulfec,'+');
	   	       $feccompara=split('-',$fec2);
	   	       if (intval($feccompara[1])==3)
	   	       {
	   	       	 $intervalo='d';
			     $cant=28;
	   	       }
	   	       else
	   	       {
	   	       	 $intervalo='d';
			     $cant=29;
	   	       }
			 }
			 $fec3=Herramientas::dateAdd('d',1,$newulfec,'+');
	   	     $feccompara2=split('-',$fec3);
			 if ((intval($ultfec[1])==2) && (intval($feccompara2[1])==3))
			 {
			   $intervalo='d';
			   $cant=31;
			 }

			 if ((intval($ultfec[1])==4) || (intval($ultfec[1])==6) || (intval($ultfec[1])==9) || (intval($ultfec[1])==11) || (intval($ultfec[0])==30))
			 {
			   $intervalo='d';
			   $cant=31;
			 }

	         if ((intval($ultfec[1])==3) || (intval($ultfec[1])==5) || (intval($ultfec[1])==7) || (intval($ultfec[1])==10) || (intval($ultfec[1])==12) || (intval($ultfec[0])==31))
			 {
			   $intervalo='d';
			   $cant=30;
			 }*/
                        $sql= "Select last_day('". $newulfec."') as fecha";
                        if (Herramientas::BuscarDatos($sql,$result))
                        {
                          $fechafin = $result[0]['fecha'];
                          $newfechafin=split('-',$fechafin);
	   	         $profec=$newfechafin[2].'/'.$newfechafin[1].'/'.$newfechafin[0];
                        }
	      	 break;
		 }

		 if ($cant!=48)
		 {
		 	$fechafin=Herramientas::dateAdd('d',1,(Herramientas::dateAdd($intervalo,$cant,$newulfec,'+')),'-');
		 	$newfechafin=split('-',$fechafin);
	   	    $profec=$newfechafin[2].'/'.$newfechafin[1].'/'.$newfechafin[0];
		 }

		$sql = "SELECT extract(week from (to_date('$profec','dd/mm/yyyy'))::date) as fecha";
		if (H::BuscarDatos($sql,$output))
		{
			$numsem=$output[0]['fecha'];
		}

                if ($ultfec[0].'/'.$ultfec[1]=='01/01')
                {
                    $js="$('npnomina_profec').readOnly=false; $('trigger_npnomina_profec').show(); $('npnomina_numsem').readOnly=false;";
                    $profec='';
                    $numsem='';
                }

        $output = '[["npnomina_numsem","'.$numsem.'",""], ["npnomina_profec","'.$profec.'",""], ["javascript","'.$js.'",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

        break;
      case '2':
        $q= new Criteria();
        $q->add(ContabbPeer::CODCTA,$this->getRequestParameter('codigo'));
        $req= ContabbPeer::doSelectOne($q);
        if ($req){
          if ($req->getCargab()=='C')
            $dato=$req->getDescta();
          else{
            $dato="";
            $js="alert('La Cuenta Contable no es Cargable'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        }else {
           $dato="";
           $js="alert('La Cuenta Contable no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
        
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }
}