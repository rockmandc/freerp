<?php

/**
 * liccropag actions.
 *
 * @package    siga
 * @subpackage liccropag
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class liccropagActions extends autoliccropagActions
{

  public function listing()
  {
      $this->c = new Criteria();
      $sql = "(Licontrat.tipconpub='O')";
      $this->c->add(LicontratPeer::TIPCONPUB,$sql,Criteria::CUSTOM);
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridForPag();
    $this->configGridCroEnt();
    $this->configGridActas();
  }

   public function configGridForPag($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiregforpagcontPeer::NUMCONT,$this->licontrat->getNumcont());
      $reg_regforpagcont = LiregforpagcontPeer::doSelect($c);

      if(count($reg_regforpagcont)==0){
        $c = new Criteria();
        $c->add(LiforpagPeer::NUMOFE,$this->licontrat->getNumofe());
        $reg_forpag = LiforpagPeer::doSelect($c);
        foreach($reg_forpag as $forpag){
          $Liregforpagcont = new Liregforpagcont();
          $Liregforpagcont->setLiforpagId($forpag->getId());
          $Liregforpagcont->setDesant($forpag->getDesant());
          $Liregforpagcont->setFecant($forpag->getSubtot());
          $Liregforpagcont->setPorant($forpag->getPorant());
          $Liregforpagcont->setMontot($forpag->getMontot());
          $Liregforpagcont->setMonrec($forpag->getMonrec());
          $Liregforpagcont->setPoramoant($forpag->getPoramoant());
          $Liregforpagcont->setNetpag($forpag->getNetpag());

          $reg[] = $Liregforpagcont;
        }

      }else{
        $reg = $reg_regforpagcont;
      }

    }
    $this->obj3 = Herramientas::getConfigGrid('gridforpag');

    $this->obj3 = $this->obj3[0]->getConfig($reg);
    $this->licontrat->setGridforpag($this->obj3);

   }

   public function configGridCroEnt($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LicroentPeer::NUMOFE,$this->licontrat->getNumofe());
      $reg = LicroentPeer::doSelect($c);
    }
    $this->obj4 = Herramientas::getConfigGrid('gridcroent');

    $this->obj4 = $this->obj4[0]->getConfig($reg);
    $this->licontrat->setGridcroent($this->obj4);

   }
   
   public function configGridActas($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LidetactforpagPeer::NUMCONT,$this->licontrat->getNumcont());
      $reg = LidetactforpagPeer::doSelectJoinLiactas($c);

    }
    $obj = Herramientas::getConfigGrid('gridactas');

    $obj = $obj[0]->getConfig($reg);

    //$regobj['gridactas'] =
    $this->objactas = $obj;

    $this->params['gridactas'] = $obj;

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
    
    $this->editing();

  }

  public function saving($clasemodelo)
  {
    $gridforpag = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $gridactas = Herramientas::CargarDatosGridv2($this,$this->objactas);

    $ret = Licitacion::SalvarGridRegForPag($clasemodelo, $gridforpag);

    if($ret!=-1) return $ret;

    return Licitacion::SalvarGridRegActasFianzas($clasemodelo, $gridactas);
  }

  public function deleting($clasemodelo)
  {
    return -1;
  }


}
