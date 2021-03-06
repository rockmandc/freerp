<?php

/**
 * facestcueint actions.
 *
 * @package    siga
 * @subpackage facestcueint
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 47239 2012-02-07 13:54:36Z dmartinez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facestcueintActions extends autofacestcueintActions
{

 public function executeIndex()
  {
    return $this->forward('facestcueint', 'edit');
  }
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();

  }

  public function configGrid($rifcon ="",$feccon="",$numref="")
  {

       $c = new Criteria();
       $c->add(FcdeclarPeer::RIFCON,$rifcon);
       if ($feccon != '')
       $c->add(FcdeclarPeer::FECDEC,$feccon,Criteria::LESS_EQUAL);
       if ($numref != '')
           $c->add(FcdeclarPeer::NUMREF,$numref);
       $reg = FcdeclarPeer::doSelect($c);
      //Para el control de la númeración de los registros mostrados en la grid
      for ($i = 1; $i <= count($reg); $i++) {
        $reg[$i-1]-> setNroreg($i);
       }
      $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facestcueint/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
   
      $this->obj = $this->columnas[0]->getConfig($reg);
      $this->fcconrep->setGrid($this->obj);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $numref = $this->getRequestParameter('ref','');
    $fecha = $this->getRequestParameter('fecha','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dircon="";
    $javascript="";
    $nomcon="";
    $fcconrep="";
    $fcdeclar="";
    switch ($ajax){
     case '1':
    $c= new Criteria();
    $c->add(FcconrepPeer::RIFCON,trim($codigo));
    $c->add(FcconrepPeer::REPCON,'C');
    $fcconrep= FcconrepPeer::doSelectOne($c);
       if (count($fcconrep)>0)
        {
           //Búsqueda de la existencia de declaraciones asociadas al beneficiario          
            $cd= new Criteria();
            $cd->add(FcdeclarPeer::RIFCON,trim($codigo));
            $fcdeclar= FcdeclarPeer::doSelectOne($cd);

            if (count($fcdeclar)>0)
            {
                  $nomcon=$fcconrep->getNomcon();
                  $dircon=$fcconrep->getDircon();
            //Verificación de la nacionalidad
              if ($fcconrep->getNaccon()=='V')
              {
              $javascript = $javascript . "$('fcconrep_naccon_V').checked=true; ";
              }
              else
              {
              $javascript = $javascript . "$('fcconrep_naccon_E').checked=true; ";
              }
              if ($fcconrep->getTipcon()=='N')
              {
              $javascript = $javascript . "$('fcconrep_tipcon_N').checked=true; ";
              }
              else
              {
              $javascript = $javascript . "$('fcconrep_tipcon_J').checked=true; ";
              }

               $this->params=array();
               $this->fcconrep = $this->getFcconrepOrCreate();
               $this->labels = $this->getLabels();
               //Formato a la fecha
               $dateFormat = new sfDateFormat('es_VE');
               $fecdes = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
               $this->configGrid($codigo,$fecdes,$numref);
            }else{
               $javascript = $javascript . "alert('El Contribuyente no ha declarado'); $('fcconrep_rifcon').value=''; $('fcconrep_rifcon').focus();";
               $this->params=array();
               $this->fcconrep = $this->getFcconrepOrCreate();
               $this->labels = $this->getLabels();
               $this->configGrid();
            }

           }else{
               $javascript = $javascript . "alert('El Contribuyente no Existe, incluya todos sus Datos Basicos');";
               $this->params=array();
               $this->fcconrep = $this->getFcconrepOrCreate();
               $this->labels = $this->getLabels();
               $this->configGrid();
           }
           $output = '[["fcconrep_nomcon","'.$nomcon.'",""],["fcconrep_dircon","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';

      break;
     case '2':
         switch ($codigo){
         //Caso cuando se seleccione Industria y comercio
          case 'I':
                   $c= new Criteria();
                   $c->add(FcsollicPeer::NUMLIC,trim($numref));
                   $reg= FcsollicPeer::doSelectOne($c);
                  
                   break;
          //Caso cuando se seleccione Vehiculo
          case 'V':
                   $c= new Criteria();
                   $c->add(FcregvehPeer::PLAVEH,trim($numref));
                   $reg= FcregvehPeer::doSelectOne($c);
                  
                   break;
          //Caso cuando se seleccione Inmuebles Urbanos
          case 'U':
                   $c= new Criteria();
                   $c->add(FcreginmPeer::NROINM,trim($numref));
                   $c->add(FcreginmPeer::RIFCON,$this->getRequestParameter('rifcon',''));
                   $reg= FcreginmPeer::doSelectOne($c);
                   
                   break;
          //Caso cuando se seleccione Apuestas licitas
          case 'A':
                   $c= new Criteria();
                   $c->add(FcapulicPeer::NROCON,trim($numref));
                   $reg= FcapulicPeer::doSelectOne($c);
                   break;
          }
          $rifcon="";
          if(count($reg)>0){

              $rifcon=$reg->getRifcon();
             //Se llama al ajax 1 para que ejecute las consultas solicitadas ahora con numref lleno
              $javascript="toAjaxUpdater('divgrid',1,getUrlModulo()+'ajax','$rifcon','','&fecha='+$('fcconrep_feccon').value+'&ref=".$numref."');";
              $output ='[["fcconrep_rifcon","'.$rifcon.'",""],["javascript","' . $javascript . '",""]]';
          }else{

               $javascript = $javascript . "alert('No Existen Datos Asociados al Criterio Seleccionado');";
               $output ='[["javascript","' . $javascript . '",""]]';
          }

      break;
     default:
        $output = '[["","",""],["","",""],["","",""]]';

    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if( ($ajax)!=1)
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
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
