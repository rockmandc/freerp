<?php

/**
 * catreginm actions.
 *
 * @package    Roraima
 * @subpackage catreginm
 * @author     $Author:dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 33145 2009-09-16 20:26:17Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class catreginmActions extends autocatreginmActions
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
  $this->configGridP();  //Personas
  $this->configGridT();  //Terreno
  $this->configGridC();  //Construccion
  $this->configGridU();  //Uso Especifico
  $this->setVars();

  }

  public function setVars()
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
  	$arreglo=array();
  	$arreglo[0] = Herramientas::getX_vacio('catpar','catnivcat','forcodcat','Z');  //Z -> Cod.Catastral
  	$arreglo[1] = strlen(substr($arreglo[0],0,strlen($arreglo[0])-$this->loncc-1));
  	$arreglo[2] = substr($this->nomabr,1,strlen($this->nomabr));
  	$arreglo[3] = $this->loncc;
  	$this->params=$arreglo;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridC()
  {
     $c = new Criteria();
     $c->add(CatcarconinmPeer::CATREGINM_ID,$this->catreginm->getId());
     $per = CatcarconinmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catreginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catcarconinm');
     $this->columnas[1][0]->setCombo(Constantes::ListaCaractConst());
     $this->columnas[1][1]->setCatalogo('catcarcon','sf_admin_edit_form', array('id'=>'2' ,'nomcarcon'=>'3'), 'Catreginm_Catcarcon', array( 'param1'=>"'+getCeldav2(this.id,-1)+'" ) );

     $this->objC = $this->columnas[0]->getConfig($per);

     $this->catreginm->setObjconstruccion($this->objC);
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridT()
  {
     $c = new Criteria();
     $c->add(CatcarterinmPeer::CATREGINM_ID,$this->catreginm->getId());
     $per = CatcarterinmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catreginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catcarterinm');
     //$this->columnas[1][0]->setCombo(Catcarterinm::CargarTerrenos());
     $this->columnas[1][0]->setCombo(Constantes::ListaCaractTierra());
     $this->columnas[1][1]->setCatalogo('catcarter','sf_admin_edit_form', array('id'=>'2' ,'dester'=>'3'), 'Catreginm_Catcarter', array( 'param1'=>"'+getCeldav2(this.id,-1)+'" ) );
     //echo $this->columnas[1][0]->getCatcarterid();

     //$this->columnas[1][0]->setCombo(Catcarterinm::CargarTerrenos());
     $this->objT = $this->columnas[0]->getConfig($per);

     $this->catreginm->setObjterreno($this->objT);
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridU()
  {
     $c = new Criteria();
     $c->add(CatusoespinmPeer::CATREGINM_ID,$this->catreginm->getId());
     $per = CatusoespinmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catreginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catusoespinm');
     $this->columnas[1][0]->setCombo(Constantes::ListaCaract());
     $this->columnas[1][1]->setCombo(Catusoespinm::Tipocons());
     //$this->columnas[1][1]->setCombo(Constantes::ListaCaract());
     ///$this->columnas[1][1]->setCatalogo('catcarter','sf_admin_edit_form', array('id'=>'2' ,'dester'=>'3'), 'Catreginm_Catcarter', array( 'param1'=>"'+getCeldav2(this.id,-1)+'" ) );
     $this->objU = $this->columnas[0]->getConfig($per);

     $this->catreginm->setObjusoespec($this->objU);
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridP()
  {
     $c = new Criteria();
     $c->add(CatperinmPeer::CATREGINM_ID,$this->catreginm->getId());
     $per = CatperinmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catreginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catperinm');
     $this->columnas[1][4]->setCombo(Constantes::ListaCondOcupac());

     $this->objP = $this->columnas[0]->getConfig($per);

     $this->catreginm->setObjpersonas($this->objP);
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
        $output = '[["'.$cajtexmos.'","'.$desdivgeo.'",""]]';

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
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
       $this->catreginm  =  $this->getCatreginmOrCreate();

    /*$this->configGridC();
    $this->configGridP();
    $this->configGridT();
       if (($this->coderr=Herramientas::ValidarGrid(Herramientas::CargarDatosGridv2($this,$this->catreginm->getObjconstruccion)))!=-1){ return false; }
       if (($this->coderr=Herramientas::ValidarGrid(Herramientas::CargarDatosGridv2($this,$this->catreginm->getObjterreno)))!=-1){ return false; }
       if (($this->coderr=Herramientas::ValidarGrid(Herramientas::CargarDatosGridv2($this,$this->catreginm->getObjpersonas)))!=-1){ return false; }

*/

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
    $this->configGridC();
    $this->configGridP();
    $this->configGridT();
    $this->configGridU();  //Uso Especifico
    $this->setVars();

    $grid = Herramientas::CargarDatosGridv2($this,$this->objC);
    $grid = Herramientas::CargarDatosGridv2($this,$this->objP);
    $grid = Herramientas::CargarDatosGridv2($this,$this->objT);
    $grid = Herramientas::CargarDatosGridv2($this,$this->objU);

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
    $gridP = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjpersonas());
    $gridC = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjconstruccion());
    $gridT = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjterreno());
    $gridU = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjusoespec());
    return Inmueblescatastro::SalvarCatreginm($clasemodelo,$gridP,$gridC,$gridT,$gridU);
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
 protected function updateCatreginmFromRequest()
  {
    $catreginm = $this->getRequestParameter('catreginm');


    if (isset($catreginm['coddivgeo']))
    {
      $this->catreginm->setCoddivgeo($catreginm['coddivgeo']);
}
    if (isset($catreginm['nrocas']))
    {
      $this->catreginm->setNrocas($catreginm['nrocas']);
    }
    if (isset($catreginm['fecreg']))
    {
      if ($catreginm['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($catreginm['fecreg']))
          {
            $value = $dateFormat->format($catreginm['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $catreginm['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->catreginm->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->catreginm->setFecreg(null);
      }
    }
    if (isset($catreginm['nroinc']))
    {
      $this->catreginm->setNroinc($catreginm['nroinc']);
    }
    if (isset($catreginm['asireg']))
    {
      $this->catreginm->setAsireg($catreginm['asireg']);
    }
    if (isset($catreginm['folio']))
    {
      $this->catreginm->setFolio($catreginm['folio']);
    }
    if (isset($catreginm['nromat']))
    {
      $this->catreginm->setNromat($catreginm['nromat']);
    }
    if (isset($catreginm['codcatant']))
    {
      $this->catreginm->setCodcatant($catreginm['codcatant']);
    }
    if (isset($catreginm['fecregant']))
    {
      if ($catreginm['fecregant'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($catreginm['fecregant']))
          {
            $value = $dateFormat->format($catreginm['fecregant'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $catreginm['fecregant'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->catreginm->setFecregant($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->catreginm->setFecregant(null);
      }
    }
    if (isset($catreginm['numregant']))
    {
      $this->catreginm->setNumregant($catreginm['numregant']);
    }
    if (isset($catreginm['folioant']))
    {
      $this->catreginm->setFolioant($catreginm['folioant']);
    }
    if (isset($catreginm['triant']))
    {
      $this->catreginm->setTriant($catreginm['triant']);
    }
    if (isset($catreginm['proant']))
    {
      $this->catreginm->setProant($catreginm['proant']);
    }
    if (isset($catreginm['nivinm']))
    {
      $this->catreginm->setNivinm($catreginm['nivinm']);
    }
    if (isset($catreginm['unihab']))
    {
      $this->catreginm->setUnihab($catreginm['unihab']);
    }
    if (isset($catreginm['edicas']))
    {
      $this->catreginm->setEdicas($catreginm['edicas']);
    }
    if (isset($catreginm['pisinm']))
    {
      $this->catreginm->setPisinm($catreginm['pisinm']);
    }
    if (isset($catreginm['numinm']))
    {
      $this->catreginm->setNuminm($catreginm['numinm']);
    }
    if (isset($catreginm['ubigex']))
    {
      $this->catreginm->setUbigex($catreginm['ubigex']);
    }
    if (isset($catreginm['ubigey']))
    {
      $this->catreginm->setUbigey($catreginm['ubigey']);
    }
    if (isset($catreginm['ubigez']))
    {
      $this->catreginm->setUbigez($catreginm['ubigez']);
    }
    if (isset($catreginm['numhab']))
    {
      $this->catreginm->setNumhab($catreginm['numhab']);
    }
    if (isset($catreginm['numper']))
    {
      $this->catreginm->setNumper($catreginm['numper']);
    }
    if (isset($catreginm['numsan']))
    {
      $this->catreginm->setNumsan($catreginm['numsan']);
    }
    if (isset($catreginm['numtom']))
    {
      $this->catreginm->setNumtom($catreginm['numtom']);
    }
    if (isset($catreginm['arever']))
    {
      $this->catreginm->setArever($catreginm['arever']);
    }
    if (isset($catreginm['loccom']))
    {
      $this->catreginm->setLoccom($catreginm['loccom']);
    }
    if (isset($catreginm['locind']))
    {
      $this->catreginm->setLocind($catreginm['locind']);
    }
    if (isset($catreginm['captan']))
    {
      $this->catreginm->setCaptan($catreginm['captan']);
    }
    if (isset($catreginm['cappis']))
    {
      $this->catreginm->setCappis($catreginm['cappis']);
    }
    if (isset($catreginm['trapis']))
    {
      $this->catreginm->setTrapis($catreginm['trapis']);
    }
    if (isset($catreginm['numtel']))
    {
      $this->catreginm->setNumtel($catreginm['numtel']);
    }
    if (isset($catreginm['nomarccro']))
    {
      $this->catreginm->setNomarccro($catreginm['nomarccro']);
    }
    if (isset($catreginm['oficom']))
    {
      $this->catreginm->setOficom($catreginm['oficom']);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/fotos/".$this->catreginm->getFotinm();
    if (!$this->getRequest()->hasErrors() && isset($catreginm['fotinm_remove']))
    {
      $this->catreginm->setFotinm('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('catreginm[fotinm]'))
    {
      $fileName = md5($this->getRequest()->getFileName('catreginm[fotinm]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('catreginm[fotinm]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('catreginm[fotinm]', sfConfig::get('sf_upload_dir')."/fotos/".$fileName.$ext);
      $this->catreginm->setFotinm($fileName.$ext);
    }

    if (isset($catreginm['lineste']))
    {
      $this->catreginm->setLineste($catreginm['lineste']);
    }
    if (isset($catreginm['linnor']))
    {
      $this->catreginm->setLinnor($catreginm['linnor']);
    }
    if (isset($catreginm['linoes']))
    {
      $this->catreginm->setLinoes($catreginm['linoes']);
    }
    if (isset($catreginm['linsur']))
    {
      $this->catreginm->setLinsur($catreginm['linsur']);
    }

  }


}
