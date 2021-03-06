<?php

/**
 * catdefman actions.
 *
 * @package    Roraima
 * @subpackage catdefman
 * @author     $Author:dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 33391 2009-09-24 19:19:30Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class catdefmanActions extends autocatdefmanActions
{

  public function executeCombo($codigo='')
  {
	if ($this->getRequestParameter('opcion')=='1')
	{
		 $codigo    = $this->getRequestParameter('codigo');
		 $catdivgeo = $this->getRequestParameter('catdivgeo',$codigo);

		$tablas=array('cattramo');//areglo de los joins de las tablas
		$filtros_tablas=array('cattipvia_id','catdivgeo_id');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codigo, $catdivgeo);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('id','nomtramo');// arreglos donde me traigo el nombre y el codigo

		$tablas=array('Cattipvia');//areglo de los joins de las tablas
		$filtros_tablas=array('');//arreglo donde mando los filtros de las clases
		$filtros_variales=array('');//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('id','desvia');// arreglos donde me traigo el nombre y el codigo


		$this->tipo= H::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
		$this->lindero='N';

	}else if ($this->getRequestParameter('opcion')=='2'){
		 $codigo    = $this->getRequestParameter('codigo');
		 $catdivgeo = $this->getRequestParameter('catdivgeo');

		$tablas=array('cattramo');//areglo de los joins de las tablas
		$filtros_tablas=array('cattipvia_id','catdivgeo_id');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codigo, $catdivgeo);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('id','nomtramo');// arreglos donde me traigo el nombre y el codigo

		$tablas=array('Cattipvia');//areglo de los joins de las tablas
		$filtros_tablas=array('');//arreglo donde mando los filtros de las clases
		$filtros_variales=array('');//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('id','desvia');// arreglos donde me traigo el nombre y el codigo

		$this->tipo= H::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
		$this->lindero='S';

	}else if ($this->getRequestParameter('opcion')=='3'){
		 $codigo    = $this->getRequestParameter('codigo');
		 $catdivgeo = $this->getRequestParameter('catdivgeo');

		$tablas=array('cattramo');//areglo de los joins de las tablas
		$filtros_tablas=array('cattipvia_id','catdivgeo_id');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codigo, $catdivgeo);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('id','nomtramo');// arreglos donde me traigo el nombre y el codigo

		$tablas=array('Cattipvia');//areglo de los joins de las tablas
		$filtros_tablas=array('');//arreglo donde mando los filtros de las clases
		$filtros_variales=array('');//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('id','desvia');// arreglos donde me traigo el nombre y el codigo

		$this->tipo= H::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
		$this->lindero='E';

	}else if ($this->getRequestParameter('opcion')=='4'){
		 $codigo    = $this->getRequestParameter('codigo');
		 $catdivgeo = $this->getRequestParameter('catdivgeo');

		$tablas=array('cattramo');//areglo de los joins de las tablas
		$filtros_tablas=array('cattipvia_id','catdivgeo_id');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codigo, $catdivgeo);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('id','nomtramo');// arreglos donde me traigo el nombre y el codigo

		$tablas=array('Cattipvia');//areglo de los joins de las tablas
		$filtros_tablas=array('');//arreglo donde mando los filtros de las clases
		$filtros_variales=array('');//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('id','desvia');// arreglos donde me traigo el nombre y el codigo

		$this->tipo= H::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
		$this->lindero='O';

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
	$this->setVars();

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
    $codigo    = $this->getRequestParameter('codigo','');
    $ajax      = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');

    switch ($ajax){
      case '1':
        $desdivgeo = Herramientas::getX('coddivgeo','catdivgeo','desdivgeo',$codigo);
          $iddivgeo = Herramientas::getX('coddivgeo','catdivgeo','id',$codigo);
        $output = '[["'.$cajtexmos.'","'.$desdivgeo.'",""],["catman_catdivgeo_id","'.$iddivgeo.'",""]]';
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

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
  	$this->setVars();
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
  	//echo $clasemodelo->getCattramonorId()."55";
  	//H::printR($clasemodelo);
  	//exit();
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

  /*public function setVars()
  {
  	$c = new Criteria();
  	//$c->add(CatnivcatPeer::CATPAR,'Z',Criteria::ALT_NOT_EQUAL);  // !=
  	$reg = CatnivcatPeer::doselect($c);

  	foreach ($reg as $datos)
  	{
  		if ($datos->getCatpar()=='Z')
  		{
            $this->loncc = $datos->getLonniv();
  		}else{
  			$this->nomabr = $this->nomabr .'-'.$datos->getNomabr();
  		}
  	}
  	$this->params[0] = Herramientas::getX_vacio('catpar','catnivcat','forcodcat','Z');  //Z -> Cod.Catastral
  	$this->params[1] = strlen(substr($this->params[0],0,strlen($this->params[0])-$this->loncc-1));
  	$this->params[2] = substr($this->nomabr,1,strlen($this->nomabr));
  	$this->params[3] = $this->loncc;
  }*/

  public function setVars()
  {
  	$this->loncc=0;
  	$formato="";
  	$c = new Criteria();
  	$reg = CatnivcatPeer::doselect($c);
    if ($reg) {
  	foreach ($reg as $datos)
  	{
  	  $formato= $datos->getForcodcat();
  		if ($datos->getEssector()!='S')
  		{
            $this->loncc = $this->loncc + $datos->getLonniv()+1;
            $this->nomabr = $this->nomabr .'-'.$datos->getNomabr();
  		}else{
  			$this->loncc = $this->loncc + $datos->getLonniv();
  			$this->nomabr = $this->nomabr .'-'.$datos->getNomabr();
  			break;
  		}
  	}
    }
    $arreglopar=array();
  	$arreglopar[0] = substr($formato,0,$this->loncc);
  	$arreglopar[1] = strlen($arreglopar[0]);
  	$arreglopar[2] = substr($this->nomabr,1,strlen($this->nomabr));
  	$this->params=$arreglopar;
  }

}
