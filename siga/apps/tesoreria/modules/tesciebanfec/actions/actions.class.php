<?php

/**
 * tesciebanfec actions.
 *
 * @package    siga
 * @subpackage tesciebanfec
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesciebanfecActions extends autotesciebanfecActions
{

  public function executeIndex() {
    return $this->redirect('tesciebanfec/edit');      
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
    $cajtxtmos = $this->getRequestParameter('cajtexmos','');
    $cajtxtcom = $this->getRequestParameter('cajtexcom','');
    $dato=""; $js=""; 

    switch ($ajax){
      case '1':      
        $l= new Criteria();
        $l->add(TsdefbanPeer::NUMCUE,$codigo);
        $reg= TsdefbanPeer::doSelectOne($l);
        if ($reg)
        {
            $dato=$reg->getNomcue();
        }else {
            $js="alert('El Cuenta Bancaria no existe'); $('tsciebanfec_numcue').value=''; $('$cajtxtmos').value=''; $('tsciebanfec_numcue').focus(); ";
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
       $fecdes = $this->getRequestParameter('fecdes');
       $fechas = $this->getRequestParameter('fechas');
       $banco = $this->getRequestParameter('banco');
       $dateFormat = new sfDateFormat('es_VE');
       $fec1 = $dateFormat->format($fecdes, 'i', $dateFormat->getInputPattern('d'));
       $dateFormat = new sfDateFormat('es_VE');
       $fec2 = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));
       if ($codigo=='A'){  //Se va Abrir
         $d= new Criteria();           
         $d->add(TsciebanfecPeer::NUMCUE,$banco);
         $d->add(TsciebanfecPeer::FECDES,$fecdes);
         $d->add(TsciebanfecPeer::FECHAS,$fechas);
         $resuld= TsciebanfecPeer::doSelectOne($d);
         if ($resuld){
           if ($resuld->getStatus()=='A')
             $js="alert_('El Banco ya esta Abierto'); $('tsciebanfec_numcue').value=''; $('tsciebanfec_nomcue').value=''; $('tsciebanfec_status').value=''; $('tsciebanfec_fecdes').value=''; $('tsciebanfec_fechas').value='';";
           else  {
            $resuld->setStatus('A');
            $resuld->save();
            $js="alert_('El Banco se ha Abierto con Exito.'); $('tsciebanfec_numcue').value=''; $('tsciebanfec_nomcue').value=''; $('tsciebanfec_status').value=''; $('tsciebanfec_fecdes').value=''; $('tsciebanfec_fechas').value='';";
          }
         }else {
           $new_reg= new Tsciebanfec();
           $new_reg->setNumcue($banco);
           $new_reg->setFecdes($fecdes);
           $new_reg->setFechas($fechas);
           $new_reg->setStatus('A');
           $new_reg->save();
           $js="alert_('El Banco se ha Abierto con Exito.'); $('tsciebanfec_numcue').value=''; $('tsciebanfec_nomcue').value=''; $('tsciebanfec_status').value=''; $('tsciebanfec_fecdes').value=''; $('tsciebanfec_fechas').value='';";
         }
        
       }else { //if ($codigo=='C') Se va a Cerrar
         $d= new Criteria();           
         $d->add(TsciebanfecPeer::NUMCUE,$banco);
         $d->add(TsciebanfecPeer::FECDES,$fecdes);
         $d->add(TsciebanfecPeer::FECHAS,$fechas);
         $resuld= TsciebanfecPeer::doSelectOne($d);
         if ($resuld){
          if ($resuld->getStatus()=='C')
            $js="alert_('El Banco ya esta Cerrado'); $('tsciebanfec_numcue').value=''; $('tsciebanfec_nomcue').value=''; $('tsciebanfec_status').value=''; $('tsciebanfec_fecdes').value=''; $('tsciebanfec_fechas').value='';";
          else  {
            $resuld->setStatus('C');
            $resuld->save();
            $js="alert_('El Banco se Cerr&oacute; con Exito.'); $('tsciebanfec_numcue').value=''; $('tsciebanfec_nomcue').value=''; $('tsciebanfec_status').value=''; $('tsciebanfec_fecdes').value=''; $('tsciebanfec_fechas').value='';";
          }
         }else {
           $js="alert_('El Banco no ha sido Abierto'); $('tsciebanfec_numcue').value=''; $('tsciebanfec_nomcue').value=''; $('tsciebanfec_status').value=''; $('tsciebanfec_fecdes').value=''; $('tsciebanfec_fechas').value='';";
         }         
       }
       $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
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


}
