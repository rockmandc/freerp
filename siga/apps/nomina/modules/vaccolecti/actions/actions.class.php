<?php

/**
 * vaccolecti actions.
 *
 * @package    Roraima
 * @subpackage vaccolecti
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class vaccolectiActions extends autovaccolectiActions
{

  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
	$this->arranos = $this->comboAnos();
	$this->arranom = $this->comboNominas();
	$this->configGrid($this->npvacdisfrute->getPerini(),'');
	$this->params=array('arranos' => $this->arranos, 'arranom' => $this->arranom);
  }
  
  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
	return $this->redirect('vaccolecti/edit');
  }

public function comboAnos()
  {

  $c = new Criteria();
  $c->add(NphojintPeer::FECING,NULL,Criteria::NOT_EQUAL);
  $c->addAscendingOrderByColumn(NphojintPeer::FECING);

  $objsNphojint = NphojintPeer::doSelect($c);

  $anodesde = 2500;

  foreach ($objsNphojint as $a)
  {
  	$fec = $a->getFecing();

      $anoemp = Herramientas::obtenerDiaMesOAno($fec,'Y-m-d','Y');

  	if ($anoemp < $anodesde)
  	{
	  $anodesde = $anoemp;
  	}

  }
    if ($anodesde)
    {

		$anohoy = Date('Y');
            $anoing = $anodesde;
		$anohasta = $anodesde + 1;
		$anofin   = (int)$anohoy - 1;

		$anoX = $anodesde;
		$arranos = array();
		$i = $anodesde;
		while (($anoX >= $anodesde) and ($anoX <= $anofin))
		{
		  $arranos[$anoX] = $anoX;
		  $anoX = $anoX + 1;
		  $i = $i + 1;
		}
     }

	return $arranos;
  }

    public function comboNominas()
  {

  $c = new Criteria();
  $c->addAscendingOrderByColumn(NpasinomcontPeer::CODNOM);
  $obj = NpasinomcontPeer::doSelect($c);
  $nominas=array(''=>'Seleccione');
  foreach($obj as $reg)
  {
  	$nominas[$reg->getCodnom()]=$reg->getCodnom();
  }

	return $nominas;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($perini = null,$nomina='',$numdia='')
    { 
	
       if($nomina!='')
	   	$arremp = V::cargar_vac_periodo_colectiva($perini,$nomina,$numdia);
	   else
        $arremp=array();
		//$resp = Herramientas::BuscarDatos($SQL,&$per);
		$filas_arreglo=0;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(false);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npvacdisfrute');
		$opciones->setName('a');
		$opciones->setAncho(800);		
		$opciones->setAnchoGrid(900);
		$opciones->setTitulo('Dias de Vacaciones');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col0 = new Columna('Marque');
	    $col0->setTipo(Columna::CHECK);
	    $col0->setEsGrabable(true);
	    $col0->setNombreCampo('check');
	    $col0->setHTML(' ');
		
		$col1 = new Columna('Código del Trabajador');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codemp');
		$col1->setHTML('type="text" size="10" readonly=true');

		$col2 = new Columna('Nombres y Apellidos del Trabajador');
		$col2->setTipo(Columna::TEXTO);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('nomemp');
		$col2->setHTML('type="text" size="50" readonly=true');

		$col3 = new Columna('Días a Disfrutar');
		$col3->setTipo(Columna::TEXTO);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
		$col3->setNombreCampo('diasdisfutar');
		$col3->setHTML('type="text" size="10" readonly= true');		

		$col4 = new Columna('Días Disfrutados');
		$col4->setTipo(Columna::TEXTO);
		$col4->setAlineacionObjeto(Columna::CENTRO);
		$col4->setAlineacionContenido(Columna::CENTRO);
		$col4->setNombreCampo('diasdisfrutados');
		$col4->setHTML('type="text" size="10" readonly= true');
		

		$col5 = new Columna('Días a Disfrutar');
		$col5->setTipo(Columna::TEXTO);
		$col5->setEsGrabable(true);
		$col5->setAlineacionObjeto(Columna::CENTRO);
		$col5->setAlineacionContenido(Columna::CENTRO);
		$col5->setNombreCampo('diaspdisfrutar');
		#$col5->setJScript('onBlur="javascript:event.keyCode=13; enternumero(event,this.id);"');
		$col5->setHTML('type="text" size="10" readonly= true');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col0);
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);
		$opciones->addColumna($col5);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($arremp);
    	$this->npvacdisfrute->setObj($this->obj);
    }
	
	
  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {

     $perini = $this->getRequestParameter('perini');
	 $cajaperfin = $this->getRequestParameter('cajaperfin');
	 $nomina = $this->getRequestParameter('nomina');
	 $this->npvacdisfrute = $this->getNpvacdisfruteOrCreate();
	 //echo $perini; echo '-'.$cajaperfin; exit;

	  if ($this->getRequestParameter('ajax')=='1')
      {

         $anosiguiente = (int)$perini + 1;

	   $output = '[["'.$cajaperfin.'","'.$anosiguiente.'",""]]';
	   
         $this->configGrid($perini,$nomina);

	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

      }
	  elseif ($this->getRequestParameter('ajax')=='2')
	  {
	  	$cajtexfechas = $this->getRequestParameter('cajtexfechas');
		$diasdisfrutar = $this->getRequestParameter('diasdisfrutar');
		$nomina = $this->getRequestParameter('nomina');
		$fechades = $this->getRequestParameter('fechades');
		$perini = $this->getRequestParameter('perini');		
		$fechahasta = V::calcularFecharegreso($diasdisfrutar, $fechades, $nomina);
		
		$this->configGrid($perini,$nomina,$diasdisfrutar);
		
	    $output = '[["'.$cajtexfechas.'","'.$fechahasta.'",""]]';
	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	  	
	  } 
	  elseif ($this->getRequestParameter('ajax')=='3')
	  {
	  	$cajtexfechas = $this->getRequestParameter('cajtexfechas');
		$diasdisfrutar = $this->getRequestParameter('diasdisfrutar');
		$nomina = $this->getRequestParameter('nomina');
		$fecha = $this->getRequestParameter('fecha');
		
		$fechahasta = V::calcularFecharegreso($diasdisfrutar, $fecha, $nomina);
		
	    $output = '[["'.$cajtexfechas.'","'.$fechahasta.'",""]]';
	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		return sfView::HEADER_ONLY;
	  	
	  }

	}


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){
    	
	   $this->npvacdisfrute = $this->getNpvacdisfruteOrCreate();
	   $this->updateNpvacdisfruteFromRequest();
	   
	   if(strtotime($this->npvacdisfrute->getFecvac())>strtotime($this->npvacdisfrute->getFecdes()))
	   {
	   	$this->coderr=469;
		return false;
	   }
	   
       $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
	   if(count($grid[0])<=0)
	   {
	   	 $this->coderr=470;
		 return false;
	   }


      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
  	$this->npvacdisfrute = $this->getNpvacdisfruteOrCreate();
	$this->updateNpvacdisfruteFromRequest();
	
  	$this->arranos = $this->comboAnos();
	$this->arranom = $this->comboNominas();
	$this->params=array('arranos' => $this->arranos, 'arranom' => $this->arranom);
	
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);

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
  protected function saveNpvacdisfrute($npvacdisfrute)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);		
    V::salvar_vaccolecti($grid,$npvacdisfrute);
	return -1;

  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }
    /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpvacdisfruteFromRequest()
  {
    $npvacdisfrute = $this->getRequestParameter('npvacdisfrute');

    if (isset($npvacdisfrute['periodonomina']))
    {
      $this->npvacdisfrute->setPeriodonomina($npvacdisfrute['periodonomina']);
    }
    if (isset($npvacdisfrute['fechasobserv']))
    {
      $this->npvacdisfrute->setFechasobserv($npvacdisfrute['fechasobserv']);
    }
    if (isset($npvacdisfrute['gridvacaciones']))
    {
      $this->npvacdisfrute->setGridvacaciones($npvacdisfrute['gridvacaciones']);
    }
    if (isset($npvacdisfrute['codnom']))
    {
      $this->npvacdisfrute->setCodnom($npvacdisfrute['codnom']);
    }
    if (isset($npvacdisfrute['perini']))
    {
      $this->npvacdisfrute->setPerini($npvacdisfrute['perini']);
    }
    if (isset($npvacdisfrute['perfin']))
    {
      $this->npvacdisfrute->setPerfin($npvacdisfrute['perfin']);
    }
    if (isset($npvacdisfrute['fecvac']))
    {
      if ($npvacdisfrute['fecvac'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npvacdisfrute['fecvac']))
          {
            $value = $dateFormat->format($npvacdisfrute['fecvac'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npvacdisfrute['fecvac'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npvacdisfrute->setFecvac($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npvacdisfrute->setFecvac(null);
      }
    }
    if (isset($npvacdisfrute['fecdes']))
    {
      if ($npvacdisfrute['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npvacdisfrute['fecdes']))
          {
            $value = $dateFormat->format($npvacdisfrute['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npvacdisfrute['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npvacdisfrute->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npvacdisfrute->setFecdes(null);
      }
    }
    if (isset($npvacdisfrute['fechas']))
    {
      if ($npvacdisfrute['fechas'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npvacdisfrute['fechas']))
          {
            $value = $dateFormat->format($npvacdisfrute['fechas'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npvacdisfrute['fechas'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npvacdisfrute->setFechas($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npvacdisfrute->setFechas(null);
      }
    }
    if (isset($npvacdisfrute['observa']))
    {
      $this->npvacdisfrute->setObserva($npvacdisfrute['observa']);
    }
    if (isset($npvacdisfrute['diasdisfrutar']))
    {
      $this->npvacdisfrute->setDiasdisfrutar($npvacdisfrute['diasdisfrutar']);
    }

    if (isset($npvacdisfrute['codemp']))
    {
      $this->npvacdisfrute->setCodemp($npvacdisfrute['codemp']);
    }
    if (isset($npvacdisfrute['perini']))
    {
      $this->npvacdisfrute->setPerini($npvacdisfrute['perini']);
    }
    if (isset($npvacdisfrute['perfin']))
    {
      $this->npvacdisfrute->setPerfin($npvacdisfrute['perfin']);
    }
    if (isset($npvacdisfrute['diasdisfutar']))
    {
      $this->npvacdisfrute->setDiasdisfutar($npvacdisfrute['diasdisfutar']);
    }
    if (isset($npvacdisfrute['diasdisfrutados']))
    {
      $this->npvacdisfrute->setDiasdisfrutados($npvacdisfrute['diasdisfrutados']);
    }

  }


}
