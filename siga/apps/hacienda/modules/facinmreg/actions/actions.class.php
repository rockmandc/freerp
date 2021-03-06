
<?php


/**
 * Facinmreg actions.
 *
 * @package    Roraima
 * @subpackage Facinmreg
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 52085 2013-06-03 16:44:29Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FacinmregActions extends autoFacinmregActions {

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
  public function editing() {
		$this->setVars();
		$this->fcreginm->setMascara($this->mascara);
                $this->fcreginm->setFormatostring($this->formastrin);
		$this->configGrid();
		$this->configGridComplemento($this->fcreginm->getAnoava(),$this->fcreginm->getNroinm());
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array (), $regelim = array ()) {
		$c = new Criteria();
		$c->add(FcdetinmPeer :: NROINM, $this->fcreginm->getNroinm());
                $per = FcdetinmPeer :: doSelect($c);
                $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facinmreg/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');
		$this->columnas[1][0]->setCatalogo('fcvalinm','sf_admin_edit_form', array('codtip'=>'1','destip'=>'2','Anual'=>'5','Valmtr'=>'4'), 'Facinmreg_Fcvalinm', array('param1' => "'+$('fcreginm_anoava').value+'", 'param2' => "'+$('fcreginm_codzon').value+'"));
		$this->grid = $this->columnas[0]->getConfig($per);
		$this->fcreginm->setGrid($this->grid);
	}


	public function configGridComplemento($anoava='', $nroinm='')
	{
		$c = new Criteria();
		$c->add(FcinmcomPeer :: ANOAVA, $anoava);
		$c->add(FcinmcomPeer :: NROINM, $nroinm);
		$per = FcinmcomPeer :: doSelect($c);
		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facinmreg/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_complemento');
                $this->columnas[1][0]->setCatalogo('fccominm','sf_admin_edit_form', array('Codcom'=>'1','Descom'=>'2','Valcom'=>'3'), 'Facinmreg_Fccominm');
		$this->grid = $this->columnas[0]->getConfig($per);
		$this->fcreginm->setGridcomplemento($this->grid);
	}

	public function setVars() {
		$this->mascara = Hacienda :: Cargar_mascara($formato);
                $this->formastrin=$formato;
                $this->fcreginm->setFecrec(date("Y-m-d"));
		$sql = "Select Max(length(rtrim(codcatfis))) as maximo from Fccatfis";

		$result = array ();
			if (Herramientas :: BuscarDatos($sql, $result))
				$longitud = $result[0]["maximo"];
			else
				$longitud = 0;

		$this->params[0] = $longitud;
		$this->params[1] = $this->fcreginm->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcreginm->getFunrec();
	}

	/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax() {

		$codigo = $this->getRequestParameter('codigo', '');
		$ajax = $this->getRequestParameter('ajax', '');
                $javascript='';
		switch ($ajax) {

			case '1' :

				      $c= new Criteria();
				      $c->add(FcconrepPeer::RIFCON,trim($codigo));
				      $fcconrep2 = FcconrepPeer::doSelectOne($c);

					  $nomcon='';

				      if (count($fcconrep2)>0)
				      {
				          $nomcon=$fcconrep2->getNomcon();
				          $dircon=$fcconrep2->getDircon();
				          if ($fcconrep2->getNaccon()=='V')
				          {
				          	$javascript = $javascript . "$('fcreginm_nacconrep_V').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcreginm_nacconrep_E').checked=true; ";
				          }
				          if ($fcconrep2->getTipcon()=='N')
				          {
				          	$javascript = $javascript . "$('fcreginm_tipconrep_N').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcreginm_tipconrep_J').checked=true; ";
				          }
				      }
				      else
				      {
                                          $javascript = $javascript ."activarRep()";



				      }
                                       $this->params=array();
                                       $this->fcreginm = $this->getFcreginmOrCreate();
                                       $this->labels = $this->getLabels();

				      $output = '[["fcreginm_rifrep","'.$codigo.'",""],["fcreginm_nomconrep","'.$nomcon.'",""],["fcreginm_dirconrep","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';
			              $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			              return sfView::HEADER_ONLY;

			      break;

			case '2' :
					$anoava = $this->getRequestParameter('anoava', '');
					$nroinm = $this->getRequestParameter('nroinm', '');
                                        $this->params=array();
                                        $this->labels = $this->getLabels();
					$this->fcreginm  =  $this->getFcreginmOrCreate();
			                $this->configGridComplemento($anoava, $nroinm);
			                break;

			case '3' :

				      $c= new Criteria();
				      $c->add(FcconrepPeer::RIFCON,trim($codigo));
				      $fcconrep2 = FcconrepPeer::doSelectOne($c);
					  $javascript='';
					  $nomcon='';

				      if (count($fcconrep2)>0)
				      {

				          $nomcon=$fcconrep2->getNomcon();
				          $dircon=$fcconrep2->getDircon();
				          if ($fcconrep2->getNaccon()=='V')
				          {
				          	$javascript = $javascript . "$('fcreginm_nacconcon_V').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcreginm_nacconcon_E').checked=true; ";
				          }
				          if ($fcconrep2->getTipcon()=='N')
				          {
				          	$javascript = $javascript . "$('fcreginm_tipconcon_N').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcreginm_tipconcon_J').checked=true; ";
				          }
				      }
				      else
				      {

                                        $javascript = $javascript ."activarCont()";

				      }

                                      $this->params=array();
                                      $this->fcreginm = $this->getFcReginmOrCreate();
                                      $this->labels = $this->getLabels();

				      $output = '[["fcreginm_rifcon","'.$codigo.'",""],["fcreginm_nomcon","'.$nomcon.'",""],["fcreginm_dirconcon","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';
			              $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			              return sfView::HEADER_ONLY;
			              break;
                          case '4' :
                                    $nomcatfis='';
                                    $c= new Criteria();
                                    $c->add(FccatfisPeer::CODCATFIS,$codigo);
                                    $fccatfis1 = FccatfisPeer::doSelectOne($c);                                    
                                    if ($fccatfis1){
                                        $nomcatfis = $fccatfis1->getNomcatfis();          
                                 }else{
                                        $javascript = "alert('El Código de Catastro no Existe');";
                                    }
                                     $output = '[["fcreginm_nomcatfis","'.$nomcatfis.'",""],["javascript","' . $javascript . '",""]]';
			             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                                     return sfView::HEADER_ONLY;
			             break;

                           case '5' :
                                    $c= new Criteria();
                                    $c->add(FccarinmPeer::CODCARINM,trim($codigo));
                                    $fccarinm = FccarinmPeer::doSelectOne($c);
                                    $nomcarinm='';
                                    if(count($fccarinm)>0){
                                        $nomcarinm =$fccarinm->getNomcarinm();
                                        $this->params=array();
                                        $this->fcreginm = $this->getFcreginmOrCreate();
                                        $this->labels = $this->getLabels();


                                    }else{
                                        $javascript = $javascript . "alert('El código de la Característica no Existe');";
                                    }
                                     $output = '[["fcreginm_nomcarinm","'.$nomcarinm.'",""],["javascript","' . $javascript . '",""]]';
			             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                                     return sfView::HEADER_ONLY;
			             break;
                           case '6' :
                                    $c= new Criteria();
                                    $c->add(FcestinmPeer::CODESTINM,trim($codigo));
                                    $fccarinm = FcestinmPeer::doSelectOne($c);
                                    $desestinm='';
                                    if(count($fccarinm)>0){
                                        $desestinm =$fccarinm->getDesestinm();
                                        $this->params=array();
                                        $this->fcreginm = $this->getFcreginmOrCreate();
                                        $this->labels = $this->getLabels();


                                    }else{
                                        $javascript = $javascript . "alert('El Estado del Inmueble no Existe');";
                                    }
                                     $output = '[["fcreginm_desestinm","'.$desestinm.'",""],["javascript","' . $javascript . '",""]]';
			             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                                     return sfView::HEADER_ONLY;
			             break;
                             case '7' :
                                    $c= new Criteria();
                                    $c->add(FcsitjurinmPeer::CODSITINM,trim($codigo));
                                    $fcsitjurinm = FcsitjurinmPeer::doSelectOne($c);
                                    $descodsit='';
                                    if(count($fcsitjurinm)>0){
                                        $descodsit =$fcsitjurinm->getNomsitinm();
                                        $this->params=array();
                                        $this->fcreginm = $this->getFcreginmOrCreate();
                                        $this->labels = $this->getLabels();


                                    }else{
                                        $javascript = $javascript . "alert('El código de situación juridica no Existe');";
                                    }
                                     $output = '[["fcreginm_nomsitinm","'.$descodsit.'",""],["javascript","' . $javascript . '",""]]';
			             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                                     return sfView::HEADER_ONLY;
			             break;

                             case '8' :
                                    $c= new Criteria();
                                    $c->add(FcusoinmPeer::CODUSOINM,trim($codigo));
                                    $fcusoinm = FcusoinmPeer::doSelectOne($c);
                                    $nomusoinm='';
                                    if(count($fcusoinm)>0){
                                        $nomusoinm =$fcusoinm->getNomusoinm();
                                        $this->params=array();
                                        $this->fcreginm = $this->getFcreginmOrCreate();
                                        $this->labels = $this->getLabels();


                                    }else{
                                        $javascript = $javascript . "alert('El código de uso no Existe');";
                                    }
                                     $output = '[["fcreginm_nomusoinm","'.$nomusoinm.'",""],["javascript","' . $javascript . '",""]]';
			             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                                     return sfView::HEADER_ONLY;
			             break;
                              case '9' :
                                   $deszon='';
                                   $sql = "Select deszon From FCValInm A,(Select Max(CodZon) as CodZon, MAX(AnoVig) as AnoVig From FCValInm Where CodZon='". $codigo."') B Where A.CodZon='".$codigo."' and A.Codzon=B.CodZon And A.AnoVig=B.AnoVig";
                                    if (Herramientas::BuscarDatos($sql,$result)){
                                         $deszon = $result[0]['deszon'];

                                         $this->params=array();
                                         $this->fcreginm = $this->getFcreginmOrCreate();
                                         $this->labels = $this->getLabels();
                                    }else{
                                        $javascript = $javascript . "alert('La zona no Existe');";
                                    }
                                     $output = '[["fcreginm_deszon","'.$deszon.'",""],["javascript","' . $javascript . '",""]]';
			             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                                     return sfView::HEADER_ONLY;
			             break;

                              case '10' :
                                      $caj = $this->getRequestParameter('cajtexmos', '');
				      $c= new Criteria();
				      $c->add(FcconrepPeer::RIFCON,trim($codigo));
				      $fcconrep2 = FcconrepPeer::doSelectOne($c);
					  $javascript='';
					  $nomcon='';

				      if (count($fcconrep2)>0)
				      {
				          $nomcon=$fcconrep2->getNomcon();
				      }
				      else
				      {

                                        $javascript = $javascript . "alert('La persona no Existe, incluya todos sus Datos Basicos');";

				      }

                                      $this->params=array();
                                      $this->fcreginm = $this->getFcReginmOrCreate();
                                      $this->labels = $this->getLabels();
                                      if($caj =='fcreginm_nomconant'){
                                            $output = '[["fcreginm_nomconant","'.$nomcon.'",""],["javascript","' . $javascript . '",""]]';

                                      }else{
                                            $output = '[["fcreginm_nomrepant","'.$nomcon.'",""],["javascript","' . $javascript . '",""]]';
                                      }
			              $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			              return sfView::HEADER_ONLY;
			              break;
                                 case 11:
                                            $valor ='N';

                                           if(Hacienda::VerificarSolvencia($codigo)){
                                              $valor ='S';
                                              $javascript=$javascript ."Mostrar_Negacion()";
                                           }else{
                                              $javascript = $javascript ."alert('El Inmueble se encuentra en Mora con el municipio, Se deben cancelar las deudas antes de realizar el Traspaso');";
                                           }
                                          $this->params=array();
                                          $this->fcreginm = $this->getFcReginmOrCreate();
                                          $this->labels = $this->getLabels();
                                          $output = '[["fcreginm_traspaso","'.$valor.'",""],["javascript","' . $javascript . '",""]]';
                                          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                                          return sfView::HEADER_ONLY;

                                     break;

			default :
				$output = '[["","",""],["","",""],["","",""]]';
		}
	}
    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $anoava= $this->getRequestParameter('fcreginm_anoava','');
    $codestinm= $this->getRequestParameter('fcreginm_codestinm','');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $dpr="";
    $javascript="";  $jsonextra="";


    switch ($col) {
          case ('8'):
            $mtoc=0;
            $dpr =0;
            if ($grid[$fila][7]!="")
            {
              $valorrec=0;
              $producto=0;
              $avaluo =0;
              $antiguedad= $anoava -H::toFloat($grid[$fila][2]);
              //Cálculo de Bs/M2 Construcción
              $mtoc = H::toFloat($grid[$fila][4])*H::toFloat($grid[$fila][7]);
              $grid[$fila][8] = number_format($mtoc,2,',','.');
              //Cálculo de la depreciación
              if ($antiguedad<0)
              {   $javascript = "alert('El año del avaluo debe ser mayor o igual al año en construcción');";


              }else{
                    $sql = "Select mondpr from fcdprinm where AnoVig=(Select MAX(AnoVig) from FCDprInm) and CodEstInm='".$codestinm."' and AntInm=".$antiguedad;
                     if (Herramientas::BuscarDatos($sql,$result)){
                         $mondpr = $result[0]['mondpr'];
                         $dpr = $mtoc -($mtoc * $mondpr);
                         $grid[$fila][9] = number_format($dpr,2,',','.');
                         }
                  }

            }
            //Cálculo Total Bs/Ms Construcción
            $grid[$fila][10] = number_format(($mtoc + $dpr),2,',','.');
            //Cálculo del avalúo
            $avaluo = number_format((H::toFloat($grid[$fila][6]) +$mtoc),2,',','.');
            $jsonextra = ',["fcreginm_totalavaluo","'.$avaluo.'",""],["javascript","' . $javascript . '",""]';
            break;

          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }

  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit() {
		$this->coderr = -1;


		if ($this->getRequest()->getMethod() == sfRequest :: POST) {
                        if ($this->getRequestParameter('fcreginm[traspaso]')=="S"){
                            if ($this->getRequestParameter('fcreginm[numtra]')==""){
                                  $this->coderr=711;
                                 return false;
                            }
                             if ($this->getRequestParameter('fcreginm[fectra]')==""){
                                  $this->coderr=712;
                                 return false;
                            }
                              if ($this->getRequestParameter('fcreginm[funrectra]')==""){
                                  $this->coderr=713;
                                 return false;
                            }
                             if ($this->getRequestParameter('fcreginm[rifconant]')==""){
                                  $this->coderr=714;
                                 return false;
                            }
                            if ($this->getRequestParameter('fcreginm[numtra]')!=""){
                                  $numtra =$this->getRequestParameter('fcreginm[numtra]');
                                  $nroinm=$this->getRequestParameter('fcreginm[nroinm]');
                                    if (Hacienda::verificar_Traspaso($numtra,$nroinm)){
                                       $this->coderr=715;
                                       return false;
                                    }
                            }


                        }

			if ($this->coderr != -1) {
				return false;
			} else
				return true;

		} else
			return true;

	}

	/**
	 * Función para actualziar el grid en el post si ocurre un error
	 * Se pueden colocar aqui los grids adicionales
	 *
	 */
	public function updateError() {
		$this->configGrid();
		$this->configGridComplemento();

		$grid = Herramientas::CargarDatosGridv2($this,$this->Grid);
		$grid = Herramientas::CargarDatosGridv2($this,$this->Gridcomplemento);

	}

	/**
   * Función para colocar el codigo necesario para
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo) {

	    $gridAvaluo = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGrid());
	    $gridComplemento = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGridcomplemento());
	    return Hacienda::SalvarFacinmreg($clasemodelo,$gridAvaluo,$gridComplemento);



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
  public function deleting($clasemodelo) {
		return Hacienda::eliminarFacinmreg($clasemodelo);
	}


  public function executeDesincorporacion()
  {
    $this->fcreginm = FcreginmPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->fcreginm);

    if (Hacienda::VerificarSolvencia($this->fcreginm->getNroinm()))
    {
	Hacienda::FacinmegDesincorporar($this->fcreginm);

	return $this->forward('facinmreg', 'list');
    }else {
        $this->getRequest()->setError('delete', 'El Inmueble se encuentra insolvente con el municipio, Se deben cancelar las deudas antes de realizar la desincorporación.');
        return $this->forward('facinmreg', 'list');
    }

  }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el obejto del modelo base del formulario.
   *
   */
  protected function updateFcreginmFromRequest()
  {
    $fcreginm = $this->getRequestParameter('fcreginm');

    if (isset($fcreginm['nroinm']))
    {
      $this->fcreginm->setNroinm($fcreginm['nroinm']);
    }
    if (isset($fcreginm['fecreg']))
    {
      if ($fcreginm['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcreginm['fecreg']))
          {
            $value = $dateFormat->format($fcreginm['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcreginm['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcreginm->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcreginm->setFecreg(null);
      }
    }
    if (isset($fcreginm['mensaje']))
    {
      $this->fcreginm->setMensaje($fcreginm['mensaje']);
    }
    if (isset($fcreginm['opciones']))
    {
      $this->fcreginm->setOpciones($fcreginm['opciones']);
    }
    if (isset($fcreginm['rifcon']))
    {
      $this->fcreginm->setRifcon($fcreginm['rifcon']);
    }
    if (isset($fcreginm['dirconcon']))
    {
      $this->fcreginm->setDirconcon($fcreginm['dirconcon']);
    }
    if (isset($fcreginm['nacconcon']))
    {
      $this->fcreginm->setNacconcon($fcreginm['nacconcon']);
    }
    if (isset($fcreginm['tipconcon']))
    {
      $this->fcreginm->setTipconcon($fcreginm['tipconcon']);
    }
    if (isset($fcreginm['rifrep']))
    {
      $this->fcreginm->setRifrep($fcreginm['rifrep']);
    }
    if (isset($fcreginm['nomconrep']))
    {
      $this->fcreginm->setNomconrep($fcreginm['nomconrep']);
    }
    if (isset($fcreginm['dirconrep']))
    {
      $this->fcreginm->setDirconrep($fcreginm['dirconrep']);
    }
    if (isset($fcreginm['nacconrep']))
    {
      $this->fcreginm->setNacconrep($fcreginm['nacconrep']);
    }
    if (isset($fcreginm['tipconrep']))
    {
      $this->fcreginm->setTipconrep($fcreginm['tipconrep']);
    }
    if (isset($fcreginm['codcatfis']))
    {
      $this->fcreginm->setCodcatfis($fcreginm['codcatfis']);
    }
    if (isset($fcreginm['codcatinm']))
    {
      $this->fcreginm->setCodcatinm($fcreginm['codcatinm']);
    }
    if (isset($fcreginm['codcarinm']))
    {
      $this->fcreginm->setCodcarinm($fcreginm['codcarinm']);
    }
    if (isset($fcreginm['codestinm']))
    {
      $this->fcreginm->setCodestinm($fcreginm['codestinm']);
    }
    if (isset($fcreginm['aveinm']))
    {
      $this->fcreginm->setAveinm($fcreginm['aveinm']);
    }
    if (isset($fcreginm['nrociv']))
    {
      $this->fcreginm->setNrociv($fcreginm['nrociv']);
    }
    if (isset($fcreginm['urbinm']))
    {
      $this->fcreginm->setUrbinm($fcreginm['urbinm']);
    }
    if (isset($fcreginm['dirinm']))
    {
      $this->fcreginm->setDirinm($fcreginm['dirinm']);
    }
    if (isset($fcreginm['linnor']))
    {
      $this->fcreginm->setLinnor($fcreginm['linnor']);
    }
    if (isset($fcreginm['linsur']))
    {
      $this->fcreginm->setLinsur($fcreginm['linsur']);
    }
    if (isset($fcreginm['linest']))
    {
      $this->fcreginm->setLinest($fcreginm['linest']);
    }
    if (isset($fcreginm['linoes']))
    {
      $this->fcreginm->setLinoes($fcreginm['linoes']);
    }
    if (isset($fcreginm['codsitinm']))
    {
      $this->fcreginm->setCodsitinm($fcreginm['codsitinm']);
    }
    if (isset($fcreginm['codusoinm']))
    {
      $this->fcreginm->setCodusoinm($fcreginm['codusoinm']);
    }
    if (isset($fcreginm['tipope']))
    {
      $this->fcreginm->setTipope($fcreginm['tipope']);
    }
    if (isset($fcreginm['prodoc']))
    {
      $this->fcreginm->setProdoc($fcreginm['prodoc']);
    }
    if (isset($fcreginm['fecdoc']))
    {
      if ($fcreginm['fecdoc'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcreginm['fecdoc']))
          {
            $value = $dateFormat->format($fcreginm['fecdoc'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcreginm['fecdoc'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcreginm->setFecdoc($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcreginm->setFecdoc(null);
      }
    }
    if (isset($fcreginm['valinm']))
    {
      $this->fcreginm->setValinm($fcreginm['valinm']);
    }
    if (isset($fcreginm['folio']))
    {
      $this->fcreginm->setFolio($fcreginm['folio']);
    }
    if (isset($fcreginm['numdoc']))
    {
      $this->fcreginm->setNumdoc($fcreginm['numdoc']);
    }
    if (isset($fcreginm['tomo']))
    {
      $this->fcreginm->setTomo($fcreginm['tomo']);
    }
    if (isset($fcreginm['tridoc']))
    {
      $this->fcreginm->setTridoc($fcreginm['tridoc']);
    }
    if (isset($fcreginm['aredoc']))
    {
      $this->fcreginm->setAredoc($fcreginm['aredoc']);
    }
    if (isset($fcreginm['linnordoc']))
    {
      $this->fcreginm->setLinnordoc($fcreginm['linnordoc']);
    }
    if (isset($fcreginm['linsurdoc']))
    {
      $this->fcreginm->setLinsurdoc($fcreginm['linsurdoc']);
    }
    if (isset($fcreginm['linestdoc']))
    {
      $this->fcreginm->setLinestdoc($fcreginm['linestdoc']);
    }
    if (isset($fcreginm['linoesdoc']))
    {
      $this->fcreginm->setLinoesdoc($fcreginm['linoesdoc']);
    }
    if (isset($fcreginm['anoava']))
    {
      $this->fcreginm->setAnoava($fcreginm['anoava']);
    }
    if (isset($fcreginm['codzon']))
    {
      $this->fcreginm->setCodzon($fcreginm['codzon']);
    }
    if (isset($fcreginm['grid']))
    {
      $this->fcreginm->setGrid($fcreginm['grid']);
    }
    if (isset($fcreginm['mtrter']))
    {
      $this->fcreginm->setMtrter($fcreginm['mtrter']);
    }
    if (isset($fcreginm['bster']))
    {
      $this->fcreginm->setBster($fcreginm['bster']);
    }
    if (isset($fcreginm['mtrcon']))
    {
      $this->fcreginm->setMtrcon($fcreginm['mtrcon']);
    }
    if (isset($fcreginm['bscon']))
    {
      $this->fcreginm->setBscon($fcreginm['bscon']);
    }
    if (isset($fcreginm['totalavaluo']))
    {
      $this->fcreginm->setTotalavaluo($fcreginm['totalavaluo']);
    }
    if (isset($fcreginm['fecpag']))
    {
      if ($fcreginm['fecpag'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcreginm['fecpag']))
          {
            $value = $dateFormat->format($fcreginm['fecpag'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcreginm['fecpag'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcreginm->setFecpag($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcreginm->setFecpag(null);
      }
    }
    if (isset($fcreginm['feccal']))
    {
      if ($fcreginm['feccal'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcreginm['feccal']))
          {
            $value = $dateFormat->format($fcreginm['feccal'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcreginm['feccal'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcreginm->setFeccal($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcreginm->setFeccal(null);
      }
    }
    if (isset($fcreginm['gridcomplemento']))
    {
      $this->fcreginm->setGridcomplemento($fcreginm['gridcomplemento']);
    }
    if (isset($fcreginm['fcconreprifcon']))
    {
      $this->fcreginm->setFcconreprifcon($fcreginm['fcconreprifcon']);
    }
    if (isset($fcreginm['fcconrepnomcon']))
    {
      $this->fcreginm->setFcconrepnomcon($fcreginm['fcconrepnomcon']);
    }
    if (isset($fcreginm['fcconrepdircon']))
    {
      $this->fcreginm->setFcconrepdircon($fcreginm['fcconrepdircon']);
    }
    if (isset($fcreginm['funrec']))
    {
      $this->fcreginm->setFunrec($fcreginm['funrec']);
    }
    if (isset($fcreginm['fecrec']))
    {
      if ($fcreginm['fecrec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcreginm['fecrec']))
          {
            $value = $dateFormat->format($fcreginm['fecrec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcreginm['fecrec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcreginm->setFecrec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcreginm->setFecrec(null);
      }
    }

    if (isset($fcreginm['nroinm']))
    {
      $this->fcreginm->setNroinm($fcreginm['nroinm']);
    }
    if (isset($fcreginm['codcatfis']))
    {
      $this->fcreginm->setCodcatfis($fcreginm['codcatfis']);
    }
    if (isset($fcreginm['coduso']))
    {
      $this->fcreginm->setCoduso($fcreginm['coduso']);
    }
    if (isset($fcreginm['codcarinm']))
    {
      $this->fcreginm->setCodcarinm($fcreginm['codcarinm']);
    }
    if (isset($fcreginm['codsitinm']))
    {
      $this->fcreginm->setCodsitinm($fcreginm['codsitinm']);
    }
    if (isset($fcreginm['rifcon']))
    {
      $this->fcreginm->setRifcon($fcreginm['rifcon']);
    }
    if (isset($fcreginm['fecpag']))
    {
      if ($fcreginm['fecpag'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcreginm['fecpag']))
          {
            $value = $dateFormat->format($fcreginm['fecpag'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcreginm['fecpag'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcreginm->setFecpag($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcreginm->setFecpag(null);
      }
    }
    if (isset($fcreginm['feccal']))
    {
      if ($fcreginm['feccal'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcreginm['feccal']))
          {
            $value = $dateFormat->format($fcreginm['feccal'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcreginm['feccal'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcreginm->setFeccal($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcreginm->setFeccal(null);
      }
    }
    if (isset($fcreginm['fecreg']))
    {
      if ($fcreginm['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcreginm['fecreg']))
          {
            $value = $dateFormat->format($fcreginm['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcreginm['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcreginm->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcreginm->setFecreg(null);
      }
    }
    if (isset($fcreginm['dirinm']))
    {
      $this->fcreginm->setDirinm($fcreginm['dirinm']);
    }
    if (isset($fcreginm['linnor']))
    {
      $this->fcreginm->setLinnor($fcreginm['linnor']);
    }
    if (isset($fcreginm['linsur']))
    {
      $this->fcreginm->setLinsur($fcreginm['linsur']);
    }
    if (isset($fcreginm['linest']))
    {
      $this->fcreginm->setLinest($fcreginm['linest']);
    }
    if (isset($fcreginm['linoes']))
    {
      $this->fcreginm->setLinoes($fcreginm['linoes']);
    }
    if (isset($fcreginm['mtrter']))
    {
      $this->fcreginm->setMtrter($fcreginm['mtrter']);
    }
    if (isset($fcreginm['mtrcon']))
    {
      $this->fcreginm->setMtrcon($fcreginm['mtrcon']);
    }
    if (isset($fcreginm['bster']))
    {
      $this->fcreginm->setBster($fcreginm['bster']);
    }
    if (isset($fcreginm['bscon']))
    {
      $this->fcreginm->setBscon($fcreginm['bscon']);
    }
    if (isset($fcreginm['rifrep']))
    {
      $this->fcreginm->setRifrep($fcreginm['rifrep']);
    }
    if (isset($fcreginm['funrec']))
    {
      $this->fcreginm->setFunrec($fcreginm['funrec']);
    }
    if (isset($fcreginm['fecrec']))
    {
      if ($fcreginm['fecrec'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcreginm['fecrec']))
          {
            $value = $dateFormat->format($fcreginm['fecrec'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcreginm['fecrec'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcreginm->setFecrec($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcreginm->setFecrec(null);
      }
    }
    if (isset($fcreginm['estinm']))
    {
      $this->fcreginm->setEstinm($fcreginm['estinm']);
    }
    if (isset($fcreginm['estdec']))
    {
      $this->fcreginm->setEstdec($fcreginm['estdec']);
    }
    if (isset($fcreginm['codcatinm']))
    {
      $this->fcreginm->setCodcatinm($fcreginm['codcatinm']);
    }
    if (isset($fcreginm['nomcon']))
    {
      $this->fcreginm->setNomcon($fcreginm['nomcon']);
    }
    if (isset($fcreginm['dircon']))
    {
      $this->fcreginm->setDircon($fcreginm['dircon']);
    }
    if (isset($fcreginm['valinm']))
    {
      $this->fcreginm->setValinm($fcreginm['valinm']);
    }
    if (isset($fcreginm['folio']))
    {
      $this->fcreginm->setFolio($fcreginm['folio']);
    }
    if (isset($fcreginm['tomo']))
    {
      $this->fcreginm->setTomo($fcreginm['tomo']);
    }
    if (isset($fcreginm['numdoc']))
    {
      $this->fcreginm->setNumdoc($fcreginm['numdoc']);
    }
    if (isset($fcreginm['fecdoc']))
    {
      if ($fcreginm['fecdoc'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcreginm['fecdoc']))
          {
            $value = $dateFormat->format($fcreginm['fecdoc'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcreginm['fecdoc'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcreginm->setFecdoc($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcreginm->setFecdoc(null);
      }
    }
    if (isset($fcreginm['usoinm']))
    {
      $this->fcreginm->setUsoinm($fcreginm['usoinm']);
    }
    if (isset($fcreginm['deszon']))
    {
      $this->fcreginm->setDeszon($fcreginm['deszon']);
    }
    if (isset($fcreginm['aveinm']))
    {
      $this->fcreginm->setAveinm($fcreginm['aveinm']);
    }
    if (isset($fcreginm['nrociv']))
    {
      $this->fcreginm->setNrociv($fcreginm['nrociv']);
    }
    if (isset($fcreginm['urbinm']))
    {
      $this->fcreginm->setUrbinm($fcreginm['urbinm']);
    }
    if (isset($fcreginm['tipope']))
    {
      $this->fcreginm->setTipope($fcreginm['tipope']);
    }
    if (isset($fcreginm['prodoc']))
    {
      $this->fcreginm->setProdoc($fcreginm['prodoc']);
    }
    if (isset($fcreginm['tridoc']))
    {
      $this->fcreginm->setTridoc($fcreginm['tridoc']);
    }
    if (isset($fcreginm['aredoc']))
    {
      $this->fcreginm->setAredoc($fcreginm['aredoc']);
    }
    if (isset($fcreginm['linnordoc']))
    {
      $this->fcreginm->setLinnordoc($fcreginm['linnordoc']);
    }
    if (isset($fcreginm['linsurdoc']))
    {
      $this->fcreginm->setLinsurdoc($fcreginm['linsurdoc']);
    }
    if (isset($fcreginm['linestdoc']))
    {
      $this->fcreginm->setLinestdoc($fcreginm['linestdoc']);
    }
    if (isset($fcreginm['linoesdoc']))
    {
      $this->fcreginm->setLinoesdoc($fcreginm['linoesdoc']);
    }

    if (isset($fcreginm['traspaso']))
    {
      $this->fcreginm->setTraspaso($fcreginm['traspaso']);
    }
    if (isset($fcreginm['funrectra']))
    {
      $this->fcreginm->setFunrectra($fcreginm['funrectra']);
    }
    if (isset($fcreginm['numtra']))
    {
      $this->fcreginm->setNumtra($fcreginm['numtra']);
    }
      if (isset($fcreginm['rifconant']))
    {
      $this->fcreginm->setRifconant($fcreginm['rifconant']);
    }
      if (isset($fcreginm['rifrepant']))
    {
      $this->fcreginm->setRifrepant($fcreginm['rifrepant']);
    }
     if (isset($fcreginm['rifpre']))
    {
      $this->fcreginm->setRifpre($fcreginm['rifpre']);
    }
     if (isset($fcreginm['fcconrepnomcon']))
    {
      $this->fcreginm->setFcconrepnomcon($fcreginm['fcconrepnomcon']);
    }
     if (isset($fcreginm['fcconrepdircon']))
    {
      $this->fcreginm->setFcconrepdircon($fcreginm['fcconrepdircon']);
    }

     if (isset($fcreginm['fectra']))
    {
      if ($fcreginm['fectra'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcreginm['fectra']))
          {
            $value = $dateFormat->format($fcreginm['fectra'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcreginm['fectra'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcreginm->setFectra($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcreginm->setFectra(null);
      }

  }

  }}