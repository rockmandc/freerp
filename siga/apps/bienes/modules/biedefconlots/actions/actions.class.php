<?php

/**
 * biedefconlots actions.
 *
 * @package    Roraima
 * @subpackage biedefconlots
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biedefconlotsActions extends autobiedefconlotsActions
{

  private $coderror = -1;
  
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {

    parent::executeEdit();

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
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos','');
    $cajtexcom=$this->getRequestParameter('cajtexcom','');
        
    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar 
        // objetos en la vista. mas informacion en 
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        
        //Descripcion Codigo Nivel
  		//$dato=BnregsemPeer::getCodsem($codigo);		 

        
        //Codigo Activo
  		$dato1=BndefactPeer::getDesact($codigo);
  				 
  		
        $output = '[["'.$cajtexmos.'","'.$dato1.'",""]]';	 			             
        
        break;
        
      case '2':
        
  		$dato=ContabbPeer::getDescta($codigo);		 
  		
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';   			             
             
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
  
	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODACT','Bnregsem','codact',trim($this->getRequestParameter('bndefcons[codact]')));		 	
	    }else		
		if ($this->getRequestParameter('ajax')=='2')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('bndefcons[ctadepcar]')),array('cargab'),array('C'));		 	
	    }else		
		if ($this->getRequestParameter('ajax')=='3')
	    {
		 	//$this->tags=Herramientas::autocompleteAjax('CODCOB','Bncobseg','codcob',trim($this->getRequestParameter('bnsegmue[cobsegmue]')));		 	
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
  public function saveBndefcons($Bndefcons)
  {
    $coderr = -1;
        
    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);
    
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
       $coderr = Semovientes::salvarBiedefconlots($Bndefcons);
      
      // OJO ----> Eliminar esta linea al modificar este método
      //parent::saveBndefcons($Bndefcons);
      
  /*    if(is_array($coderr)){
        foreach ($coderror as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }*/
        
    } catch (Exception $ex) {

    /*  $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);*/
      
    }
    

  }


  public function deleteBndefcons($Bndefcons)
  {
    
    $coderr = -1;
        
    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);
    
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);
      
      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteBndefcons($Bndefcons);
      
      if(is_array($coderr)){
        foreach ($coderror as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderror);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }
      
        
    } catch (Exception $ex) {

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderror);
      $this->getRequest()->setError('',$err);
      
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
    $resp=-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->caajuoc = $this->getCaajuocOrCreate();
      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      
      
      
      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en 
      // el archivo errors.yml en la función handleErrorEdit()

      if($resp!=-1){
        $this->coderror = $resp; 
        return false;
      } else return true;

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
    $this->labels = $this->getLabels();
        
    $this->bndefcons= $this->getBndefconsOrCreate();
    $this->updateBndefconsFromRequest();    
    
        
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);	    
        $this->getRequest()->setError('',$err);	
      }
    }
    return sfView::SUCCESS;

  }
  


}
