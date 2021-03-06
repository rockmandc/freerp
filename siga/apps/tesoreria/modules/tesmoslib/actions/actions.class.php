<?php

/**
 * tesmoslib actions.
 *
 * @package    Roraima
 * @subpackage tesmoslib
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesmoslibActions extends autotesmoslibActions
{

  public function executeIndex()
  {
  	$this->forward('tesmoslib','edit');
  }


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->tsmovban = $this->getTsmovbanOrCreate();

    $this->callback='_dobleList';
    $this->c=new Criteria();
    $this->c->add(TsmovlibPeer::CODCTA,'0er0');

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsmovbanFromRequest();

      $save=$this->saveTsmovban($this->tsmovban);
      if ($save=="")
      $this->setFlash('notice', 'Your modifications have been saved');
      else $this->setFlash('notice', $save);

$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesmoslib/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesmoslib/list');
      }
      else
      {
        return $this->redirect('tesmoslib/edit?id='.$this->tsmovban->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $output = '[["","",""],["","",""],["","",""]]';
    switch ($ajax){
      case '1':
      	{
      		$result=array();
      		$sql="select numcue,nomcue from tsdefban where numcue=trim('".$codigo."')";
  	    	if (Herramientas::BuscarDatos($sql,$result))
  	    	{
  	    		$dato1=$result[0]["numcue"];
  	    		$dato2=$result[0]["nomcue"];
  	    		$output = '[["'.$cajtexmos.'","'.$dato1.'",""],["'.$cajtexcom.'","'.$dato2.'",""]]';
  	    	}else
  	    	{
  	    		$output = '[["","",""],["","",""],["","",""]]';
  	    	}
  	    	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  		    return sfView::HEADER_ONLY;
  		    break;
      	}
      	case '2':
      	{
          $nrocta=$this->getRequestParameter('nrocta');
      		$this->getUser()->setAttribute('tes_numcue',$nrocta);
			    $mes=$this->getRequestParameter('mes');
          $tipmovdes=$this->getRequestParameter('tipmovdes');
          $tipmovhas=$this->getRequestParameter('tipmovhas');
          $mostipmov=H::getConfApp2('mostipmov', 'tesoreria', 'tesmoslib');
          $cadena="";
          if ($mostipmov=='S'){
            if ($tipmovdes!='' && $tipmovhas!='')
              $cadena=" and (tsmovlib.tipmov>='".$tipmovdes."' and tsmovlib.tipmov<='".$tipmovhas."')";
          }

			    $sql1="select * from cpdefniv";
    			if (Herramientas::BuscarDatos($sql1,$result))
	      	{
			    	$periodo=substr($result[0]["fecini"],0,4);
	    	  }else
	    	  {
	    		  $periodo=date("Y");
	    	  }

			    if ($mes!='')
    			{
  			    $fechacon=$mes .'/'.$periodo;
          //  print $fechacon;
        		$this->c=new Criteria();
      		  // $this->c->add(TsmovlibPeer::NUMCUE,trim($nrocta));
      		  $this->c->add(TsmovlibPeer::STACON,'N');
      		  $this->sql="numcue=('".$nrocta."') and (TipMov not in ('ANUC','ANUD')) and (NumCue||RefLib||TipMov not in (select b.NumCue||b.RefLibpad||b.TipMovpad from tsmovlib as b Where b.NumCue= trim('".$nrocta."') and b.RefLibpad is not null)) and to_date(to_char(FecLib,'mm/yyyy'),'mm/yyyy') <= to_date('".$fechacon."','mm/yyyy') and NumCue||RefLib||TipMov NOT IN (Select NumCue||RefBan||TipMov From TsMovBan Where NumCue= ('".$nrocta."')) $cadena";
            $this->c->add(TsmovlibPeer::NUMCUE,$this->sql,Criteria::CUSTOM);
      		  //$this->c->addAscendingOrderByColumn(' SUBSTR('.TsmovlibPeer::REFLIB.',4,4'.')');
                  $this->c->addAscendingOrderByColumn(TsmovlibPeer::REFLIB);
      		  $reg= TsmovlibPeer::doSelect($this->c);
      		  if (!$reg)
      		  {
      		  	$this->js=true;
      		  }else { $this->js=false;}

    			}else
    			{
    			  $this->c=new Criteria();
        		 // $this->c->add(TsmovlibPeer::NUMCUE,trim($nrocta));
        		  $this->c->add(TsmovlibPeer::STACON,'N');
        		  $this->sql="numcue=trim('".$nrocta."') and (NumCue||RefLib||TipMov not in (select b.NumCue||b.RefLibpad||b.TipMovpad from tsmovlib as b Where b.NumCue= trim('".$nrocta."') and b.RefLibpad is not null)) and NumCue||RefLib||TipMov NOT IN (Select NumCue||RefBan||TipMov From TsMovBan Where NumCue= trim('".$nrocta."')) $cadena";
                  $this->c->add(TsmovlibPeer::NUMCUE,$this->sql,Criteria::CUSTOM);
        		  //$this->c->addAscendingOrderByColumn(' SUBSTR('.TsmovlibPeer::REFLIB.',4,4'.')');
                          $this->c->addAscendingOrderByColumn(TsmovlibPeer::REFLIB);
        		  $reg= TsmovlibPeer::doSelect($this->c);
        		  if (!$reg)
        		  {
        		  	$this->js=true;
        		  }else { $this->js=false;}
    			}
      		$this->tsmovban = $this->getTsmovbanOrCreate();
      		$this->labels= $this->getLabels();
  	  		$this->callback='_dobleList';
	     		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          break;
      	}
      	case '3':
      	{
      		$objvalor = TsmovlibPeer::retrieveByPK($codigo);

      		if ($objvalor)
	    	{
	    		$r=strtotime($objvalor->getFeclib());
	    		$dato1 = date("d/m/Y",$r);
                         $dato2=htmlspecialchars($objvalor->getDeslib());
                         $dato2=eregi_replace("[\n|\r|\n\r]", "", $dato2);
	    		$dato3 =$objvalor->getTipmov();
	    		$dato4 =$dato1;//$objvalor->getFeclib();

	    		$sql="select destip from tstipmov where codtip=trim('".$dato3."')";
		    	if (Herramientas::BuscarDatos($sql,$result))
		    	{
					$dato5=$result[0]["destip"];
		    	}else
		    	{
		    		$dato5='';
		    	}
	    		$dato6 =$objvalor->getMonmov(true);
                //fechas modificadas
                $cadena=split('!',$this->getRequestParameter('cadena',''));
	       		$r=0;
	       		$seguir=true;
	       		while ($r<(count($cadena)-1) and $seguir)
		       	{
		       	  $aux=$cadena[$r];
		       	  $auxfec=split('_',$aux);
		       	  if ($auxfec[0]==$codigo)
		       	  {
		       	  	$dato1=$auxfec[1];
                    $seguir=false;
		       	  }
		       	  $r++;
		       	}//while ($r<(count($cadena)-1))
	    		$output = '[["fecban","'.$dato1.'",""],["desmov","'.$dato2.'",""],["codche","'.$dato3.'",""],["fecban2","'.$dato4.'",""],["monmov","'.$dato6.'",""],["desche","'.$dato5.'",""],["nromovlib","'.$codigo.'",""]]';
	    	}else
	    	{
	    		$output = '[["","",""],["","",""],["","",""]]';
	    	}
	    	$this->js=false;
	    	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;

		    break;
		  }
      case '4':
        $js=""; $dato="";
        $t= new Criteria();
        $t->add(TstipmovPeer::CODTIP,$codigo);
        $regt= TstipmovPeer::doSelectOne($t);
        if ($regt){
          $dato=$regt->getDestip();
        }else $js="alert('El tipo de Movimiento no existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '5':
        $js="";
        $unifecban=H::getConfApp2('unifecban', 'tesoreria', 'tesmoslib');
        $numcue=$this->getRequestParameter('numcue');
        $id=$this->getRequestParameter('id');
        $fechamov=$this->getRequestParameter('fecmov');

        $dateFormat = new sfDateFormat($this->getUser()->getCulture());
        $fecban = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));

        $dateFormat = new sfDateFormat($this->getUser()->getCulture());
        $fecmov = $dateFormat->format($fechamov, 'i', $dateFormat->getInputPattern('d'));
        if ($unifecban=='S'){
           if (Tesoreria::validaPeriodoCerradoBanco($codigo,$numcue)==false)
            { 
              $js="alert('La Cuenta Bancaria se encuentran Conciliada para ese Periodo');$('fecban').value='';$('fecban').focus();";
            }else { 
              if (Tesoreria::validarFechaPerContable($codigo))
              {
                $js="alert('La Fecha Banco debe estar dentro del periodo Definido');$('fecban').value='';$('fecban').focus();";
              }else $js="actualizarfecha('$id')";
            }
        }else {
          if ($fecban<$fecmov)
            $js="alert('La Fecha Banco no puede ser menor a la del Movimiento'); $('fecban').value='';$('fecban').focus();";
          else{
            if (Tesoreria::validaPeriodoCerradoBanco($codigo,$numcue)==false)
            { 
              $js="alert('La Cuenta Bancaria se encuentran Conciliada para ese Periodo');$('fecban').value='';$('fecban').focus();";
            }else { 
              if (Tesoreria::validarFechaPerContable($codigo))
              {
                $js="alert('La Fecha Banco debe estar dentro del periodo Definido');$('fecban').value='';$('fecban').focus();";
              }else $js="actualizarfecha('$id')";
            }
          }
      }
        $output = '[["javascript","'.$js.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		return sfView::HEADER_ONLY;
        break;
    }
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
  public function saveTsmovban($Tsmovban)
  {
    $lista= $this->getRequestParameter('associated_libros_selec');
	  $numcue = $this->getUser()->getAttribute('tes_numcue');
    $cadena= $this->getRequestParameter('cadfecban');
    $fechaban= $this->getRequestParameter('fecban');
    $mensajes="";
	if ($lista)
	{
	  foreach ($lista as $list)
	  {
			$objlist = TsmovlibPeer::retrieveByPK($list);

			$c = new Criteria();
			$c->add(TsmovbanPeer::NUMCUE,$numcue);
			$c->add(TsmovbanPeer::REFBAN,$objlist->getReflib());
			$c->add(TsmovbanPeer::TIPMOV,$objlist->getTipmov());
			$objs = TsmovbanPeer::doSelectOne($c);


			if (count($objs)==0)
			{
				self::incluirBancos($objlist,$msj,$cadena,$fechaban);
			}

     if ($msj=="") {
			$c = new Criteria();
			$c->add(TsdefbanPeer::NUMCUE,$numcue);
			$objs2 = TsdefbanPeer::doSelectOne($c);
			$id = $objs2->getId();

			if ($objs2)
			{
				$c = new Criteria();
				$c->add(TstipmovPeer::CODTIP,$objlist->getTipmov());
				$objs3 = TstipmovPeer::doSelectOne($c);

				if ($objs3)
				{
					$debcre = $objs3->getDebcre();
				}
				else
				{
					$debcre = '';
				}
				$this->actualizaBancos('A',$debcre,$id,$objlist);
			}
    }else{
      $mensajes=$mensajes.$msj." ";
	  }
	}
  if ($mensajes!="") $mensajes="Los Movimientos según Libros siguientes, no se incluyeron en Banco, debido a que se encuentran dentro de un periodo cerrado o ya está Conciliado: ".$mensajes;
	}

      return $mensajes;

  }
  public function actualizaBancos($accion,$debcre,$id,$objlis)
  {
  		$tsdefban = TsdefbanPeer::retrieveByPk($id);


		switch ($debcre){
			case 'D':{
				if ($accion=='A')
				{
					$debito = $tsdefban->getDebban();
					$total = $debito + $objlis->getMonmov();
					$tsdefban->setDebban($total);
				}
				if ($accion=='E')
				{
					$debito = $tsdefban->getDebban();
					$total = $debito - $objlis->getMonmov();
					$tsdefban->setDebban($total);
				}
			break;
			}
			case 'E':{
				if ($accion=='A')
				{
					$credito = $tsdefban->getCreban();
					$total = $credito + $objlis->getMonmov();
					$tsdefban->setCreban($total);
				}
				if ($accion=='E')
				{
					$credito = $tsdefban->getCreban();
					$total = $credito - $objlis->getMonmov();
					$tsdefban->setCreban($total);
				}
			break;
			}
		}
		$tsdefban->save();
  }

  public function incluirBancos($obj,&$msj,$cadena="",$fechaban)
  {
    $unifecban=H::getConfApp2('unifecban', 'tesoreria', 'tesmoslib');
    $fecha=$obj->getFeclib();
    $auxf=split('-',$obj->getFeclib());
    $fecaux=$auxf[2]."/".$auxf[1]."/".$auxf[0];

    $msj="";
    if ($unifecban=='S'){
        $fecaux=$fechaban;
        $dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());
        $fecha = $dateFormat->format($fechaban, 'i', $dateFormat->getInputPattern('d'));
    }else {
      $cadena=split('!',$cadena);
    	$r=0;
    	$seguir=true;
    	while ($r<(count($cadena)-1) and $seguir)
     	{
     	  $aux=$cadena[$r];
     	  $auxfec=split('_',$aux);
     	  if ($auxfec[0]==$obj->getId())
     	  {
     	  	$fec=$auxfec[1];
          $fecaux=$auxfec[1];
     	  	$dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());
          $fecha = $dateFormat->format($fec, 'i', $dateFormat->getInputPattern('d'));
          $seguir=false;
     	  }
     	  $r++;
     	}//while ($r<(count($cadena)-1))
   }


   $novalpercon=H::getConfApp2('novalpercon', 'tesoreria', 'tesmoslib');
   if ($novalpercon=='S')
   {
         $tsmovban = new Tsmovban();
         $tsmovban->setNumcue($this->getRequestParameter('nrocta'));
         $tsmovban->setRefban($obj->getReflib());
         $tsmovban->setFecban($fecha);
         $tsmovban->setDesban($obj->getDeslib());
         $tsmovban->setTipmov($obj->getTipmov());
         $tsmovban->setCodmon($obj->getCodmon());
         $tsmovban->setValmon($obj->getValmon());
         $tsmovban->setMonmov($obj->getMonmov()*$obj->getValmon());
         $tsmovban->setCodCta(null);
         $tsmovban->setStatus('C');
         $tsmovban->setStacon('N');
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $tsmovban->setLoguse($loguse);
         $tsmovban->setCoddirec($obj->getCoddirec());
         $tsmovban->setCodmon($obj->getCodmon());
         $tsmovban->setValmon($obj->getValmon());
         $tsmovban->save();
   }else {
     if (Tesoreria::validaPeriodoCerrado($fecaux)!=true)
     {
      if (Tesoreria::validarFechaPerContable($fecaux)!=true)
     {
       if (Tesoreria::validaPeriodoCerradoBanco($fecaux,$this->getRequestParameter('nrocta'))!=false)
       {
         $tsmovban = new Tsmovban();
         $tsmovban->setNumcue($this->getRequestParameter('nrocta'));
         $tsmovban->setRefban($obj->getReflib());
         $tsmovban->setFecban($fecha);
         $tsmovban->setDesban($obj->getDeslib());
         $tsmovban->setTipmov($obj->getTipmov());
         $tsmovban->setCodmon($obj->getCodmon());
         $tsmovban->setValmon($obj->getValmon());
         $tsmovban->setMonmov($obj->getMonmov()*$obj->getValmon());
         $tsmovban->setCodCta(null);
         $tsmovban->setStatus('C');
         $tsmovban->setStacon('N');
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $tsmovban->setLoguse($loguse);
         $tsmovban->setCoddirec($obj->getCoddirec());
         $tsmovban->setCodmon($obj->getCodmon());
         $tsmovban->setValmon($obj->getValmon());
         $tsmovban->save();
       }else {
           $msj=$obj->getReflib();
         }
       }
       else
       {
          $msj=$obj->getReflib();
       }
     }else {
         $msj=$obj->getReflib();
       }
}
  }

protected function getLabels()
  {
    return array(
      'tsmovban{numcue}' => 'Cuentas Bancarias:',
      'tsmovban{codcta}' => 'Codcta:',
      'tsmovban{refban}' => 'Refban:',
      'tsmovban{fecban}' => 'Fecban:',
      'tsmovban{tipmov}' => 'Tipmov:',
      'tsmovban{desban}' => 'Desban:',
      'tsmovban{monmov}' => 'Monmov:',
      'tsmovban{status}' => 'Status:',
      'tsmovban{stacon}' => 'Stacon:',
      'tsmovban{transito}' => 'Transito:',
      'tsmovban{stacon1}' => 'Stacon1:',
      'tsmovban{tipmovdesd}' => 'Tipo Mov. Desde:',
      'tsmovban{tipmovhast}' => 'Tipo Mov. Hasta:',
      'tsmovban{id}' => 'Id:',
    );
  }

}
