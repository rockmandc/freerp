<?php

/**
 * viarensolvia actions.
 *
 * @package    siga
 * @subpackage viarensolvia
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viarensolviaActions extends autoviarensolviaActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }

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

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=$dato="";

    switch ($ajax){
      case '1':
        $fecsol=$fecdes=$fechas=$dessol=$empleado=$cargo=$dependencia="";
        $q= new Criteria();
        $q->add(ViasolviatraPeer::NUMSOL,$codigo);
        $regq= ViasolviatraPeer::doSelectOne($q);
        if ($regq){
          if ($regq->getStaren()=='N') {
            $fecsol=date('d/m/Y',strtotime($regq->getFecsol()));
            $fecdes=date('d/m/Y',strtotime($regq->getFecdes()));
            $fechas=date('d/m/Y',strtotime($regq->getFechas()));
            $dessol=$regq->getDessol();
            if (!$regq->getEsnoemp()){
              $l= new Criteria();
              $l->add(NphojintPeer::CODEMP,$regq->getCodemp());
              $regl= NphojintPeer::doSelectOne($l);
              if ($regl){
                $empleado=$regl->getCedemp().' - '.$regl->getNomemp();
                $cargo=$regl->getCodcar().' - '.$regl->getNomcar();
                $dependencia=$regl->getCodniv().' - '.$regl->getDesniv();
              }
            }else {
              $l= new Criteria();
              $l->add(VianoempPeer::RIFNEMP,$regq->getCodemp());
              $regl= VianoempPeer::doSelectOne($l);
              if ($regl){
                $empleado=$regl->getRifnemp().' - '.$regl->getNomnemp();
              }
            }
          }else $js="alert('La Solicitud ya esta rendida'); $('viarensolvia_dessol').value=''; $('viarensolvia_numsol').value=''; $('viarensolvia_numsol').focus();";
        }else $js="alert('La Solicitud no existe'); $('viarensolvia_dessol').value=''; $('viarensolvia_numsol').value=''; $('viarensolvia_numsol').focus();";        
       
        $output = '[["javascript","'.$js.'",""],["viarensolvia_fecsol","'.$fecsol.'",""],["viarensolvia_fecdes","'.$fecdes.'",""],["viarensolvia_fechas","'.$fechas.'",""],["viarensolvia_dessol","'.$dessol.'",""],["viarensolvia_empleado","'.$empleado.'",""],["viarensolvia_cargo","'.$cargo.'",""],["viarensolvia_dependencia","'.$dependencia.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {    
    if ($clasemodelo->getId())
      $clasemodelo->save();
    else {      
        $tienecorrelativo = false;
        if (Herramientas::getVerCorrelativo('corrensol', 'viadefgen', $r)) {
          if ($clasemodelo->getNumren() == '##########') {
            $tienecorrelativo = true;
            $encontrado = false;
            while (!$encontrado) {
              $numero = str_pad($r, 8, '0', STR_PAD_LEFT);

              $sql = "select numren from viarensolvia where numren='" . $numero . "'";
              if (Herramientas::BuscarDatos($sql, $result)) {
                $r = $r + 1;
              } else {
                $encontrado = true;
              }
            }          
            $clasemodelo->setNumren($numero);
          }
       }
      $clasemodelo->save();
      if ($tienecorrelativo)
        Herramientas::getSalvarCorrelativo('corrensol', 'viadefgen', 'Rendición de Viáticos', $r, $msg);    

      $w= new Criteria();
      $w->add(ViasolviatraPeer::NUMSOL,$clasemodelo->getNumsol());
      $regw= ViasolviatraPeer::doSelectOne($w);
      if ($regw){
        $regw->setStaren('S');
        $regw->save();
      }
    }    
    return -1;
  }

  public function deleting($clasemodelo)
  {
    $w= new Criteria();
    $w->add(ViasolviatraPeer::NUMSOL,$clasemodelo->getNumsol());
    $regw= ViasolviatraPeer::doSelectOne($w);
    if ($regw){
      $regw->setStaren('N');
      $regw->save();
    }
    return parent::deleting($clasemodelo);
  }


}
