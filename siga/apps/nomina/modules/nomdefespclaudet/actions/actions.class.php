<?php

/**
 * nomdefespclaudet actions.
 *
 * @package    siga
 * @subpackage nomdefespclaudet
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomdefespclaudetActions extends autonomdefespclaudetActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $nomsalint = H::getConfAppGen('nomsalint');
    $this->arrsal=array('UD'=>'Ultimo Devengado',
                       'SP'=>'Salario Promedio',
					   'SI'=> $nomsalint=='S' ? 'Salario Base' : 'Salario Integral',
					   'SN'=>'Salario Normal');
    $this->configGridClau();

  }

  public function configGridClau($reg=array())
  {
      $c = new Criteria();
      $c->add(NpdefespclaudetPeer::CODNOM,$this->npdefespclaudet->getCodnom());
      $reg = NpdefespclaudetPeer::doSelect($c);
      $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomdefespclaudet/'.sfConfig::get('sf_app_module_config_dir_name').'/gridclau');
      $this->obj[1][10]->setCombo($this->arrsal);
      $this->obj[1][11]->setCombo(array('N'=>'NO','S'=>'SI'));
      $this->obj = $this->obj[0]->getConfig($reg);
      $this->npdefespclaudet->setObjclau($this->obj);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
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
    $nomsalint = H::getConfAppGen('nomsalint');
    $this->arrsal=array('UD'=>'Ultimo Devengado',
                       'SP'=>'Salario Promedio',
					   'SI'=> $nomsalint=='S' ? 'Salario Base' : 'Salario Integral',
					   'SN'=>'Salario Normal');
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->configGridClau();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $objupdate = $grid[0];
        foreach($objupdate as $x)
        {
                $x->setCodnom($clasemodelo->getCodnom());
                $x->getTotret()==1 ? $x->setTotret('S') : $x->setTotret(null);
                $x->getPormesant()==1 ? $x->setPormesant('S') : $x->setPormesant(null);
                $x->getPoranoant()==1 ? $x->setPoranoant('S') : $x->setPoranoant(null);
                $x->save();
        }
    $objdelete = $grid[1];
        foreach($objdelete as $z)
        {
                $z->delete();
        }
        return -1;
  }

  public function deleting($clasemodelo)
  {
    $c = new Criteria();
    $c->add(NpdefespclaudetPeer::CODNOM,$clasemodelo->getCodnom());
    $per = NpdefespclaudetPeer::doSelect($c);
    foreach($per as $r)
    {
        $r->delete();
    }
    return '-1';
  }


}
