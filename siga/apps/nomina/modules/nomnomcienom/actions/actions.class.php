<?php

/**
 * nomnomcienom actions.
 *
 * @package    Roraima
 * @subpackage nomnomcienom
 * @author     $Author:jlobaton $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 34527 2009-11-06 15:17:11Z jlobaton $
 * @version    SVN: $Id:actions.class.php 34527 2009-11-06 15:17:11Z jlobaton $
 */
class nomnomcienomActions extends sfActions
{
  public function executeIndex()
  {
    //return $this->redirect('nomnomcienom/index');
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
    $codigo   = $this->getRequestParameter('codigo');

	if ($this->getRequestParameter('ajax')=='1')
	{ $dato="";
	  $dato2="";
	  $dato3="";
	  $dato4="";
	  $datos="";
	  $fre="";
	  $validafechacierre="";
	  $this->visible="";
	  $dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
	  if ($dato!='<!Registro no Encontrado o Vacio!>')
	  {
	  	/*$dato2=NpnominaPeer::getDato($this->getRequestParameter('codigo'),'Ultfec');
	  	$datos=date('d/m/Y',strtotime(NpnominaPeer::getDato($this->getRequestParameter('codigo'),'Ultfec')));
	    $dato3=NpnominaPeer::getDato($this->getRequestParameter('codigo'),'Profec');
	    $dato4=NpnominaPeer::getDato($this->getRequestParameter('codigo'),'Frecal');
		*/

	  	$dato2=Herramientas::getX('CODNOM','Npnomina','Ultfec',$codigo);
	  	$datos=date('d/m/Y',strtotime($dato2));
	  	$dato3=Herramientas::getX('CODNOM','Npnomina','Profec',$codigo);
	  	$dato4=Herramientas::getX('CODNOM','Npnomina','Frecal',$codigo);


        if ($dato4=='S')
        { $fre='Nomina Semanal';}
        else if ($dato4=='Q')
        { $fre='Nomina Quincenal';}
        else if ($dato4=='M')
        { $fre='Nomina Mensual';}

	    CierredeNomina::Consulta($this->getRequestParameter('codigo'),$dato2,$dato3,$visible);
	    if (CierredeNomina::Consulta2($this->getRequestParameter('codigo'),$dato3))
	    {
	     $validafechacierre='S';
	    }else {$validafechacierre='N';}
	    $this->visible=$visible;
	  }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["fecha","'.$datos.'",""],["proxcalculo","'.$dato3.'",""],["frecuencia","'.$dato4.'",""],["pago","'.$fre.'",""],["valida","'.$validafechacierre.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

	}
  }

  public function executeRealizarcierre()
  {
	$codigo=$this->getRequestParameter('codigo');
	$fecha=$this->getRequestParameter('fecha');

	$intpre = 'N';     //Integracion con Presupuesto
	$varemp = $this->getUser()->getAttribute('configemp');
	if(is_array($varemp))
	if(array_key_exists('aplicacion',$varemp))
		  if(array_key_exists('nomina',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
	     if(array_key_exists('nomnomcienom',$varemp['aplicacion']['nomina']['modulos']))
	       if(array_key_exists('intpre',$varemp['aplicacion']['nomina']['modulos']['nomnomcienom']))
			       $intpre = $varemp['aplicacion']['nomina']['modulos']['nomnomcienom']['intpre'];

   $valgencom=H::getConfApp2('valgencom', 'nomina', 'nomnomcienom');
   $gencom=H::getConfApp2('gencom', 'nomina', 'nomnomcienom');
   if ($valgencom=='S'){
      $fec1 = $this->getRequestParameter('proxcalculo');

      $t= new Criteria();
      $t->add(NpnomcomPeer::CODNOM,$codigo);
      $t->add(NpnomcomPeer::FECNOM,$fec1);
      $t->add(NpnomcomPeer::ESPECIAL,'N');
      $result= NpnomcomPeer::doSelectOne($t);
      if (!$result)
      	$this->setFlash('error', 'La Nómina no puede ser cerrada. Debe Generar el Compromiso de la Misma.');
      else {
   		CierredeNomina::procesoCierre($codigo,$fecha,$msj,$intpre, $cod);
		if ($msj=='1')
		{
			//$this->setFlash('notice', 'La Nómina no puede ser cerrada');
	            if ($cod!="")
	              $this->setFlash('error', 'La Nómina no puede ser cerrada. El Siguiente Código Presupuestario no tiene Asignación Inicial ó Disponibilidad ó no existe '. $cod);
	            else
	                $this->setFlash('error', 'La Nómina no puede ser cerrada.');
		}elseif ($msj=='497')
		{
	        $err = Herramientas::obtenerMensajeError($msj);
	        $this->setFlash('error', $err);

		}else if ($msj==''){
			$this->setFlash('notice', 'La Nómina fue Cerrada Satisfactoriamente');
		}   	
      }

   }else {
   	    if ($gencom=='S'){
          $c= new Criteria();
		  $c->add(CpdefnivPeer::CODEMP,'001');
		  $resulc= CpdefnivPeer::doSelectOne($c);
		  if ($resulc){
		    if ($resulc->getCedrif()=='' || $resulc->getTipcom()==''){
			   $err = Herramientas::obtenerMensajeError(4006);
	           $this->setFlash('error', $err);
		    }else {
		    	CierredeNomina::procesoCierre($codigo,$fecha,$msj,$intpre, $cod);
				if ($msj=='1')
				{
					//$this->setFlash('notice', 'La Nómina no puede ser cerrada');
			            if ($cod!="")
			              $this->setFlash('error', 'La Nómina no puede ser cerrada. El Siguiente Código Presupuestario no tiene Asignación Inicial ó Disponibilidad ó no existe '. $cod);
			            else
			                $this->setFlash('error', 'La Nómina no puede ser cerrada.');
				}elseif ($msj=='497')
				{
			        $err = Herramientas::obtenerMensajeError($msj);
			        $this->setFlash('error', $err);

				}else if ($msj==''){
					$this->setFlash('notice', 'La Nómina fue Cerrada Satisfactoriamente');
				}
		    }
		  }
   	    }else {
		CierredeNomina::procesoCierre($codigo,$fecha,$msj,$intpre, $cod);
		if ($msj=='1')
		{
			//$this->setFlash('notice', 'La Nómina no puede ser cerrada');
	            if ($cod!="")
	              $this->setFlash('error', 'La Nómina no puede ser cerrada. El Siguiente Código Presupuestario no tiene Asignación Inicial ó Disponibilidad ó no existe '. $cod);
	            else
	                $this->setFlash('error', 'La Nómina no puede ser cerrada.');
		}elseif ($msj=='497')
		{
	        $err = Herramientas::obtenerMensajeError($msj);
	        $this->setFlash('error', $err);

		}else if ($msj==''){
			$this->setFlash('notice', 'La Nómina fue Cerrada Satisfactoriamente');
		}
	}
   }

	return $this->redirect('nomnomcienom/index');
  }
}
