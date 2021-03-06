<?php

/**
 * Facprotip actions.
 *
 * @package    Roraima
 * @subpackage Facprotip
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 52085 2013-06-03 16:44:29Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FacprotipActions extends autoFacprotipActions
{

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
		$this->configGrid();
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
  public function deleting($fctippro)
  {
   if ($fctippro->getId()!="")
   {
	$c = new Criteria();
	$c->add(FctipprodetPeer::TIPPRO,$fctippro->getTippro());
	FctipprodetPeer::doDelete($c);
    $fctippro->delete();
    return -1;
   }
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
    $c = new Criteria();
    $c->add(FctipprodetPeer::TIPPRO,$this->fctippro->getTippro());
    $per = FctipprodetPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facprotip/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fctippro->setGrid($this->grid);
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
    $this->fctippro = $this->getFctipproOrCreate();
    $this->updateFctipproFromRequest();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
        if (!checkdate(intval('01'), intval('01'), intval($this->getRequestParameter('fctippro[anovig]'))) )
        {
          $this->coderr=726;
          return false;
        }

      if ($this->getRequestParameter('id')=="")
      {
        $result=array();
        $sql = "SELECT anovig FROM fctippro WHERE anovig ='".$this->getRequestParameter('fctippro[anovig]')."' and tippro='".$this->getRequestParameter('fctippro[tippro]')."'";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $this->coderr=701;
          return false;
        }

      }
     }
     return true;
  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $filas = array ();
    $simbolosrepetidos = array ("++","*+","/+","--","-+","*-","**","*/","//","/*","/-","+*","+/");
    $errorenformula=false;
    $formula = array ();
    $error="";
    $codigo = strtoupper($this->getRequestParameter('fctippro[parpro]'));
    $fctippro = $this->getRequestParameter('fctippro');
	$this->fctippro = $this->getFctipproOrCreate();
	$this->getRequestParameter('ajax','');
    $this->updateFctipproFromRequest();
	$this->configGrid();
	$grid = Herramientas::CargarDatosGridv2($this,$this->grid);

	//valido que las variables del grid esten en la formula
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
        if ($x[$j]->getTipvar()!="")
        {
           $filas[]=$x[$j]->getTipvar();
        }
	 $j++;
    }
    $cadena_modificada= str_replace("+","_",strtoupper($codigo));
    $cadena_modificada=str_replace("*","_",$cadena_modificada);
    $cadena_modificada=str_replace("-","_",$cadena_modificada);
    $cadena_modificada=str_replace("/","_",$cadena_modificada);
    $formula=explode("_", $cadena_modificada);
    $formula_sin_vacios = array_values(array_diff($formula, array('')));
    $j=0;
    while ($j<count($formula_sin_vacios))
    {
	   if (in_array($formula_sin_vacios[$j],$filas)) $errorenformula=false;
	   else
       {
	     $errorenformula=true;
	     break;
       }
	 $j++;
    }
    if ($errorenformula) $error="Variable  Desconocida, Verifique";
    else
    {
	    //Valido si hay signos repetidos
	   $x=0;
	   while ($x<=strlen($codigo))
	   {
	     $simbolo=substr($codigo,$x,2);
		 if (in_array($simbolo,$simbolosrepetidos))
	     {
			 $errorenformula=true;
		     break;
	     }
		 else $errorenformula=false;
	     $x++;
	   }
	   if ($errorenformula) $error="Signos Repetidos, Verifique";
	   else
       {
       	   //verifico si la cadena tiene solonumeros y letras
		   $buscarcaracter= str_replace("+","",strtoupper($codigo));
		   $buscarcaracter= str_replace("-","",strtoupper($buscarcaracter));
		   $buscarcaracter= str_replace("*","",strtoupper($buscarcaracter));
		   $buscarcaracter= str_replace("/","",strtoupper($buscarcaracter));
		   if (ereg("^[a-zA-Z0-9_]+$",$buscarcaracter)) $errorenformula=false;
		   else $errorenformula=true;
		   if ($errorenformula) $error="Caracter no permitido en formula, Verifique";
	   }
    }
    $javascript="alert('".$error."');";
    if ($errorenformula)
       $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
    else
       $output = '[["","",""],["","",""],["","",""]]';

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);

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
  public function saving($fctippro)
  {
    $fctippro->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Hacienda::salvar_grid_Fcprotip($fctippro, $grid);
	return -1;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFctipproFromRequest()
  {
    $fctippro = $this->getRequestParameter('fctippro');

    if (isset($fctippro['tippro']))
    {
      $this->fctippro->setPormon("P");
      $this->fctippro->setTippro($fctippro['tippro']);
    }
    if (isset($fctippro['anovig']))
    {
      $this->fctippro->setAnovig($fctippro['anovig']);
    }
    if (isset($fctippro['destip']))
    {
      $this->fctippro->setDestip($fctippro['destip']);
    }
    if (isset($fctippro['unipar']))
    {
      $this->fctippro->setUnipar($fctippro['unipar']);
    }
    if (isset($fctippro['frepar']))
    {
      $this->fctippro->setFrepar($fctippro['frepar']);
    }
    if (isset($fctippro['parpro']))
    {
      $this->fctippro->setParpro($fctippro['parpro']);
    }
    if (isset($fctippro['grid']))
    {
      $this->fctippro->setGrid($fctippro['grid']);
    }

    if (isset($fctippro['tippro']))
    {
      $this->fctippro->setTippro($fctippro['tippro']);
    }
    if (isset($fctippro['anovig']))
    {
      $this->fctippro->setAnovig($fctippro['anovig']);
    }
    if (isset($fctippro['destip']))
    {
      $this->fctippro->setDestip($fctippro['destip']);
    }
    if (isset($fctippro['alimon']))
    {
      $this->fctippro->setAlimon($fctippro['alimon']);
    }
    if (isset($fctippro['statip']))
    {
      $this->fctippro->setStatip($fctippro['statip']);
    }
    if (isset($fctippro['unipar']))
    {
      $this->fctippro->setUnipar($fctippro['unipar']);
    }
    if (isset($fctippro['frepar']))
    {
      $this->fctippro->setFrepar($fctippro['frepar']);
    }
    if (isset($fctippro['parpro']))
    {
      $this->fctippro->setParpro($fctippro['parpro']);
    }

    if (isset($fctippro['tippro']))
    {
      $this->fctippro->setTippro($fctippro['tippro']);
    }
    if (isset($fctippro['anovig']))
    {
      $this->fctippro->setAnovig($fctippro['anovig']);
    }
    if (isset($fctippro['destip']))
    {
      $this->fctippro->setDestip($fctippro['destip']);
    }

    if (isset($fctippro['alimon']))
    {
      $this->fctippro->setAlimon($fctippro['alimon']);
    }
    if (isset($fctippro['statip']))
    {
      $this->fctippro->setStatip($fctippro['statip']);
    }
    if (isset($fctippro['unipar']))
    {
      $this->fctippro->setUnipar($fctippro['unipar']);
    }
    if (isset($fctippro['frepar']))
    {
      $this->fctippro->setFrepar($fctippro['frepar']);
    }
    if (isset($fctippro['parpro']))
    {
      $this->fctippro->setParpro($fctippro['parpro']);
    }

  }


}
