<?php

/**
 * genordpaghisnom actions.
 *
 * @package    siga
 * @subpackage genordpaghisnom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class genordpaghisnomActions extends autogenordpaghisnomActions
{
  public function executeIndex()
  {
    return $this->redirect('genordpaghisnom/edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // AquÃ­ va el cÃ³digo para traernos los registros que contendrÃ¡ el grid
      $reg = array();
      // AquÃ­ va el cÃ³digo para generar arreglo de configuraciÃ³n del grid
    $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuraciÃ³n del grid de un archivo yml
    // y se le pasa el parÃ¡metro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuraciÃ³n del grid de un .yml, sedebe hacer a pie.
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

    $col2 = new Columna('DescripciÃ³n');
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

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $dato=""; $js="";
    switch ($ajax){
      case '1':
        $y= new Criteria();
        $y->add(NpnominaPeer::CODNOM, $codigo);
        $reg= NpnominaPeer::doSelectOne($y);
        if ($reg)
        {
          $dato=$reg->getNomnom();
        }else $js="alert('La N&oacute;mina no existe'); $('npnomina_codnom').value=''; $('npnomina_codnom').focus();";

        $output = '[["npnomina_nomnom","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        $y= new Criteria();
        $y->add(NpdefcptPeer::CODCON, $codigo);
        $reg= NpdefcptPeer::doSelectOne($y);
        if ($reg)
        {
          $dato=$reg->getNomcon();
        }else $js="alert('La Concepto no existe'); $('npnomina_codcon').value=''; $('npnomina_codcon').focus();";

        $output = '[["npnomina_nomcon","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $codnom = $this->getRequestParameter('codnom','');
        $y= new Criteria();
        $y->add(NpnomesptiposPeer::CODNOMESP, $codigo);
        $reg= NpnomesptiposPeer::doSelectOne($y);
        if ($reg)
        {
           $y1= new Criteria();
           $y1->add(NpnomespnomtipPeer::CODNOMESP, $codigo);
           $y1->add(NpnomespnomtipPeer::CODNOM, $codnom);
           $reg1= NpnomespnomtipPeer::doSelectOne($y1);
           if ($reg1)
           {
               $dato=$reg->getDesnomesp();
           }else $js="alert('La N&oacute;mina Especial no esta asociada a la N&oacute;mina Ordinaria '); $('npnomina_codnomesp').value=''; $('npnomina_desnomesp').value=''; $('npnomina_codnomesp').focus();";
        }else $js="alert('La N&oacute;mina Especial no existe'); $('npnomina_codnomesp').value=''; $('npnomina_desnomesp').value=''; $('npnomina_codnomesp').focus();";

        $output = '[["npnomina_desnomesp","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serÃ¡n usados en las funciones de validaciÃ³n.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los mÃ©todos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al cÃ³digo que retorna
      // Todas las funciones de validaciÃ³n y procesos del negocio
      // deben retornar cÃ³digos >= -1. Estos cÃ³digo serÃ¡m buscados en
      // el archivo errors.yml en la funciÃ³n handleErrorEdit()

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $err=Tesoreria::generarOrdenPagoHistorico($clasemodelo);
    return $err;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

    public function executeEdit()
  {
    $this->params=array();
    $this->npnomina = $this->getNpnominaOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpnominaFromRequest();

      if($this->saveNpnomina($this->npnomina) ==-1){
        {$this->setFlash('notice', 'Proceso de Migración Culminado Exitosamente.');

         $id= $this->npnomina->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('genordpaghisnom/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('genordpaghisnom/list');
        }
        else
        {
            return $this->redirect('genordpaghisnom/edit?id='.$this->npnomina->getId());
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


}
