<?php

/**
 * Faccodcatfis actions.
 *
 * @package    Roraima
 * @subpackage Faccodcatfis
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 52085 2013-06-03 16:44:29Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FaccodcatfisActions extends autoFaccodcatfisActions
{

  public function executeIndex()
  {
        $c= new Criteria();
  	$resul= FcdefncaPeer::doSelectOne($c);
  	if ($resul)
  	{
  	 $id=$resul->getId();
  	 return $this->redirect('faccodcatfis/edit?id='.$id);
  	}
  	else
  	{
  	  return $this->redirect('faccodcatfis/edit');
  	}
  }

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


  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuración del grid de un archivo yml
    // y se le pasa el parámetro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuración del grid de un .yml, sedebe hacer a pie.
    // Por ejemplo:

    /*
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Caartalm');
    $opciones->setAnchoGrid(1150);
    $opciones->setTitulo('Existencia por Almacenes');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Cod. Almacen');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codalm');
    $col1->setCatalogo('cadefalm','sf_admin_edit_form','2');
    $col1->setAjax(2,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('codalm');
    $col2->setHTML('type="text" size="25" disabled=true');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
     */


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
    $ajax   = $this->getRequestParameter('ajax','');
    $numper="";
    $denumper="";
    $numniv="";
    $nivinm="";
    $nomext1="";
    $nomabr1="";
    $tamano1="1";
    $nomext2="";
    $nomabr2="";
    $tamano2="1";
    $nomext3="";
    $nomabr3="";
    $tamano3="1";
    $nomext4="";
    $nomabr4="";
    $tamano4="1";
    $nomext5="";
    $nomabr5="";
    $tamano5="1";
    $nomext6="";
    $nomabr6="";
    $tamano6="1";
    $nomext7="";
    $nomabr7="";
    $tamano7="1";
    $nomext8="";
    $nomabr8="";
    $tamano8="1";
    $nomext9="";
    $nomabr9="";
    $tamano9="1";
    $nomext10="";
    $nomabr10="";
    $tamano10="1";

	$parr = substr($codigo,0,4);
	$mun = substr($codigo,5,4);
	$est = substr($codigo,10,4);
	$pais = substr($codigo,15,4);

    switch ($ajax){
      case '1':
        $result=array();
        $sql = "Select " .
        		"numper,denumper,numniv,nivinm," .
        		"nomext1,nomabr1,tamano1," .
        		"nomext2,nomabr2,tamano2," .
        		"nomext3,nomabr3,tamano3," .
        		"nomext4,nomabr4,tamano4," .
        		"nomext5,nomabr5,tamano5," .
        		"nomext6,nomabr6,tamano6," .
        		"nomext7,nomabr7,tamano7," .
        		"nomext8,nomabr8,tamano8," .
        		"nomext9,nomabr9,tamano9," .
        		"nomext10,nomabr10,tamano10 " .
        		"from FCDEFNCA where ( CodPar='".$parr."' AND CodMun='".$mun."' AND CodEdo='".$est."'  AND CodPai='".$pais."')";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $numper=$result[0]['numper'];
          $denumper=$result[0]['denumper'];
          $numniv=$result[0]['numniv'];
          $nivinm=$result[0]['nivinm'];

          $nomext1=$result[0]['nomext1'];
          $nomabr1=$result[0]['nomabr1'];
          $tamano1=$result[0]['tamano1'];

          $nomext1=$result[0]['nomext1'];
          $nomabr1=$result[0]['nomabr1'];
          $tamano1=$result[0]['tamano1'];

          $nomext2=$result[0]['nomext2'];
          $nomabr2=$result[0]['nomabr2'];
          $tamano2=$result[0]['tamano2'];

          $nomext3=$result[0]['nomext3'];
          $nomabr3=$result[0]['nomabr3'];
          $tamano3=$result[0]['tamano3'];

          $nomext4=$result[0]['nomext4'];
          $nomabr4=$result[0]['nomabr4'];
          $tamano4=$result[0]['tamano4'];

          $nomext5=$result[0]['nomext5'];
          $nomabr5=$result[0]['nomabr5'];
          $tamano5=$result[0]['tamano5'];

          $nomext6=$result[0]['nomext6'];
          $nomabr6=$result[0]['nomabr6'];
          $tamano6=$result[0]['tamano6'];

          $nomext7=$result[0]['nomext7'];
          $nomabr7=$result[0]['nomabr7'];
          $tamano7=$result[0]['tamano7'];

          $nomext8=$result[0]['nomext8'];
          $nomabr8=$result[0]['nomabr8'];
          $tamano8=$result[0]['tamano8'];

          $nomext9=$result[0]['nomext9'];
          $nomabr9=$result[0]['nomabr9'];
          $tamano9=$result[0]['tamano9'];

          $nomext10=$result[0]['nomext10'];
          $nomabr10=$result[0]['nomabr10'];
          $tamano10=$result[0]['tamano10'];

        }
        $output = '[["fcdefnca_nomext1","'.$nomext1.'",""],' .
        		  '["fcdefnca_nomabr1","'.$nomabr1.'",""],' .
        		  '["fcdefnca_tamano1","'.$tamano1.'",""],' .
                  '["fcdefnca_nomext2","'.$nomext2.'",""],' .
        		  '["fcdefnca_nomabr2","'.$nomabr2.'",""],' .
        		  '["fcdefnca_tamano2","'.$tamano2.'",""],' .
                  '["fcdefnca_nomext3","'.$nomext3.'",""],' .
        		  '["fcdefnca_nomabr3","'.$nomabr3.'",""],' .
        		  '["fcdefnca_tamano3","'.$tamano3.'",""],' .
                  '["fcdefnca_nomext4","'.$nomext4.'",""],' .
        		  '["fcdefnca_nomabr4","'.$nomabr4.'",""],' .
        		  '["fcdefnca_tamano4","'.$tamano4.'",""],' .
                  '["fcdefnca_nomext5","'.$nomext5.'",""],' .
        		  '["fcdefnca_nomabr5","'.$nomabr5.'",""],' .
        		  '["fcdefnca_tamano5","'.$tamano5.'",""],' .
                  '["fcdefnca_nomext6","'.$nomext6.'",""],' .
        		  '["fcdefnca_nomabr6","'.$nomabr6.'",""],' .
        		  '["fcdefnca_tamano6","'.$tamano6.'",""],' .
                  '["fcdefnca_nomext7","'.$nomext7.'",""],' .
        		  '["fcdefnca_nomabr7","'.$nomabr7.'",""],' .
        		  '["fcdefnca_tamano7","'.$tamano7.'",""],' .
                  '["fcdefnca_nomext8","'.$nomext8.'",""],' .
        		  '["fcdefnca_nomabr8","'.$nomabr8.'",""],' .
        		  '["fcdefnca_tamano8","'.$tamano8.'",""],' .
                  '["fcdefnca_nomext9","'.$nomext9.'",""],' .
        		  '["fcdefnca_nomabr9","'.$nomabr9.'",""],' .
        		  '["fcdefnca_tamano9","'.$tamano9.'",""],' .
                  '["fcdefnca_nomext10","'.$nomext10.'",""],' .
        		  '["fcdefnca_nomabr10","'.$nomabr10.'",""],' .
        		  '["fcdefnca_tamano10","'.$tamano10.'",""],' .
        		  '["fcdefnca_numper","'.$numper.'",""],' .
                  '["fcdefnca_denumper","'.$denumper.'",""],' .
        		  '["fcdefnca_numniv","'.$numniv.'",""],' .
        		  '["fcdefnca_nivinm","'.$nivinm.'",""]]';
        break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
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
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

    $this->fcdefnca = $this->getFcdefncaOrCreate();
      try { $this->updateFcdefncaFromRequest();}
      catch (Exception $ex){}

    if ($this->getRequestParameter('fcdefnca[codpar1]')=="")
    {
        $this->coderr=716;
        return false;
    }else {

      if (!$this->fcdefnca->getId()) {
        $codigo=$this->getRequestParameter('fcdefnca[codpar1]');
        $parr = substr($codigo,0,4);
	$mun = substr($codigo,5,4);
	$est = substr($codigo,10,4);
	$pais = substr($codigo,15,4);

        $t= new Criteria();
        $t->add(FcdefncaPeer::CODPAR,$parr);
        $t->add(FcdefncaPeer::CODMUN,$mun);
        $t->add(FcdefncaPeer::CODEDO,$est);
        $t->add(FcdefncaPeer::CODPAI,$pais);
        $regi= FcdefncaPeer::doSelectOne($t);
        if ($regi)
        {
            $this->coderr=717;
            return false;
        }
      }
    }

    if ($this->getRequestParameter('fcdefnca[nivinm]')>$this->getRequestParameter('fcdefnca[numniv]'))
    {
        $this->coderr=722;
        return false;
    }

    $niveles=$this->getRequestParameter('fcdefnca[numniv]');
    $nocoincide=true;
    for ($i = 1; $i <= $niveles; $i++) {
        if ($this->getRequestParameter('fcdefnca[nomext'.$i.']')=="")
        {
            $this->coderr=718;
            return false;
        }

        if ($this->getRequestParameter('fcdefnca[nomabr'.$i.']')=="")
        {
            $this->coderr=721;
            return false;
        }

        if ($this->getRequestParameter('fcdefnca[tamano'.$i.']')=="")
        {
            $this->coderr=720;
            return false;
        }

        if (strlen($this->getRequestParameter('fcdefnca[nomabr'.$i.']'))!=$this->getRequestParameter('fcdefnca[tamano'.$i.']'))
        {
          $this->coderr=719;
          return false;
        }
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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

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
  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
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
  protected function updateFcdefncaFromRequest()
  {
    $fcdefnca = $this->getRequestParameter('fcdefnca');

    if (isset($fcdefnca['empresa']))
    {
      $this->fcdefnca->setEmpresa($fcdefnca['empresa']);
    }
    if (isset($fcdefnca['codpar1']))
    {
        $this->fcdefnca->setCodpar(substr($fcdefnca['codpar1'],0,4));
        $this->fcdefnca->setCodmun(substr($fcdefnca['codpar1'],5,4));
        $this->fcdefnca->setCodedo(substr($fcdefnca['codpar1'],10,4));
        $this->fcdefnca->setCodpai(substr($fcdefnca['codpar1'],15,4));
    }
    /*else
    {
            if (isset($fcdefnca['codpar']))
		    {
		      $this->fcdefnca->setCodpar($fcdefnca['codpar']);
		    }
		    if (isset($fcdefnca['codmun']))
		    {
		      $this->fcdefnca->setCodmun($fcdefnca['codmun']);
		    }
		    if (isset($fcdefnca['codedo']))
		    {
		      $this->fcdefnca->setCodedo($fcdefnca['codedo']);
		    }
		    if (isset($fcdefnca['codpai']))
		    {
		      $this->fcdefnca->setCodpai($fcdefnca['codpai']);
		    }
    }*/
    if (isset($fcdefnca['numniv']))
    {
      $this->fcdefnca->setNumniv($fcdefnca['numniv']);
    }
    if (isset($fcdefnca['nomext1']))
    {
      $this->fcdefnca->setNomext1($fcdefnca['nomext1']);
    }
    if (isset($fcdefnca['nomabr1']))
    {
      $this->fcdefnca->setNomabr1($fcdefnca['nomabr1']);
    }
    if (isset($fcdefnca['tamano1']))
    {
      $this->fcdefnca->setTamano1($fcdefnca['tamano1']);
    }
    if (isset($fcdefnca['nomext2']))
    {
      $this->fcdefnca->setNomext2($fcdefnca['nomext2']);
    }
    if (isset($fcdefnca['nomabr2']))
    {
      $this->fcdefnca->setNomabr2($fcdefnca['nomabr2']);
    }
    if (isset($fcdefnca['tamano2']))
    {
      $this->fcdefnca->setTamano2($fcdefnca['tamano2']);
    }
    if (isset($fcdefnca['nomext3']))
    {
      $this->fcdefnca->setNomext3($fcdefnca['nomext3']);
    }
    if (isset($fcdefnca['nomabr3']))
    {
      $this->fcdefnca->setNomabr3($fcdefnca['nomabr3']);
    }
    if (isset($fcdefnca['tamano3']))
    {
      $this->fcdefnca->setTamano3($fcdefnca['tamano3']);
    }
    if (isset($fcdefnca['nomext4']))
    {
      $this->fcdefnca->setNomext4($fcdefnca['nomext4']);
    }
    if (isset($fcdefnca['nomabr4']))
    {
      $this->fcdefnca->setNomabr4($fcdefnca['nomabr4']);
    }
    if (isset($fcdefnca['tamano4']))
    {
      $this->fcdefnca->setTamano4($fcdefnca['tamano4']);
    }
    if (isset($fcdefnca['nomext5']))
    {
      $this->fcdefnca->setNomext5($fcdefnca['nomext5']);
    }
    if (isset($fcdefnca['nomabr5']))
    {
      $this->fcdefnca->setNomabr5($fcdefnca['nomabr5']);
    }
    if (isset($fcdefnca['tamano5']))
    {
      $this->fcdefnca->setTamano5($fcdefnca['tamano5']);
    }
    if (isset($fcdefnca['nomext6']))
    {
      $this->fcdefnca->setNomext6($fcdefnca['nomext6']);
    }
    if (isset($fcdefnca['nomabr6']))
    {
      $this->fcdefnca->setNomabr6($fcdefnca['nomabr6']);
    }
    if (isset($fcdefnca['tamano6']))
    {
      $this->fcdefnca->setTamano6($fcdefnca['tamano6']);
    }
    if (isset($fcdefnca['nomext7']))
    {
      $this->fcdefnca->setNomext7($fcdefnca['nomext7']);
    }
    if (isset($fcdefnca['nomabr7']))
    {
      $this->fcdefnca->setNomabr7($fcdefnca['nomabr7']);
    }
    if (isset($fcdefnca['tamano7']))
    {
      $this->fcdefnca->setTamano7($fcdefnca['tamano7']);
    }
    if (isset($fcdefnca['nomext8']))
    {
      $this->fcdefnca->setNomext8($fcdefnca['nomext8']);
    }
    if (isset($fcdefnca['nomabr8']))
    {
      $this->fcdefnca->setNomabr8($fcdefnca['nomabr8']);
    }
    if (isset($fcdefnca['tamano8']))
    {
      $this->fcdefnca->setTamano8($fcdefnca['tamano8']);
    }
    if (isset($fcdefnca['nomext9']))
    {
      $this->fcdefnca->setNomext9($fcdefnca['nomext9']);
    }
    if (isset($fcdefnca['nomabr9']))
    {
      $this->fcdefnca->setNomabr9($fcdefnca['nomabr9']);
    }
    if (isset($fcdefnca['tamano9']))
    {
      $this->fcdefnca->setTamano9($fcdefnca['tamano9']);
    }
    if (isset($fcdefnca['nomext10']))
    {
      $this->fcdefnca->setNomext10($fcdefnca['nomext10']);
    }
    if (isset($fcdefnca['nomabr10']))
    {
      $this->fcdefnca->setNomabr10($fcdefnca['nomabr10']);
    }
    if (isset($fcdefnca['tamano10']))
    {
      $this->fcdefnca->setTamano10($fcdefnca['tamano10']);
    }
    if (isset($fcdefnca['nivinm']))
    {
      $this->fcdefnca->setNivinm($fcdefnca['nivinm']);
    }
    if (isset($fcdefnca['numper']))
    {
      $this->fcdefnca->setNumper($fcdefnca['numper']);
    }
    if (isset($fcdefnca['denumper']))
    {
      $this->fcdefnca->setDenumper($fcdefnca['denumper']);
    }


  }


}
