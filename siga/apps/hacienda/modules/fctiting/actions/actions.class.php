<?php

/**
 * fctiting actions.
 *
 * @package    Roraima
 * @subpackage fctiting
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 52085 2013-06-03 16:44:29Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fctitingActions extends autofctitingActions
{

  public function editing()
  {
    $this->fcpreing->setMascara(Herramientas::getX('Codemp','Cidefniv','Forpre','001'));
    $this->configGrid($this->fcpreing->getCodpar());
    if ($this->fcpreing->getAcum()=='N')
        $this->fcpreing->setAcum('');
  }

  public function configGrid($codpar='',$arreglo=array())
  {
     $detalle=array();
     if (count($arreglo)>0)
     {
       $i=0;
       while ($i<count($arreglo))
       {
           $fcesting= new Fcesting();
           $fcesting->setPerest2($arreglo[$i]["perest2"]);
           $fcesting->setMonto($arreglo[$i]["monto"]);
           $detalle[]=$fcesting;
           $i++;
       }
     }else if($codpar!=''){
         $c= new Criteria();
         $c->add(FcestingPeer::CODPAR, $codpar);
         $c->add(FcestingPeer::PEREST, '00',Criteria::NOT_EQUAL);
         $c->addAscendingOrderByColumn(FcestingPeer::PEREST);
         $detalle=FcestingPeer::doSelect($c);
          for ($i = 0; $i < count($detalle); $i++) {
              $valor=$detalle[$i]->getPerest();
            switch ($valor){
            case '01':
                $detalle[$i]->setPerest2("ENERO");
                break;
            case '02':
                 $detalle[$i]->setPerest2("FEBRERO");
                 break;
            case '03':
                $detalle[$i]->setPerest2("MARZO");
                 break;
            case '04':
                 $detalle[$i]->setPerest2("ABRIL");
                 break;
            case '05':
                 $detalle[$i]->setPerest2("MAYO");
                 break;
            case '06':
                 $detalle[$i]->setPerest2("JUNIO");
                 break;
            case '07':
                 $detalle[$i]->setPerest2("JULIO");
                 break;
            case '08':
                 $detalle[$i]->setPerest2("AGOSTO");
                 break;
            case '09':
                 $detalle[$i]->setPerest2("SEPTIEMBRE");
                 break;
            case '10':
                $detalle[$i]->setPerest2("OCTUBRE");
                 break;
            case '11':
                 $detalle[$i]->setPerest2("NOVIEMBRE");
                 break;
            case '12':
                 $detalle[$i]->setPerest2("DICIEMBRE");
                 break;

                 }
           }

         }else{
           $fcesting= new Fcesting();
           $fcesting->setPerest2("ENERO");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;
           $fcesting= new Fcesting();
           $fcesting->setPerest2("FEBRERO");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;
           $fcesting= new Fcesting();
           $fcesting->setPerest2("MARZO");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;
           $fcesting= new Fcesting();
           $fcesting->setPerest2("ABRIL");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;
           $fcesting= new Fcesting();
           $fcesting->setPerest2("MAYO");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;
           $fcesting= new Fcesting();
           $fcesting->setPerest2("JUNIO");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;
           $fcesting= new Fcesting();
           $fcesting->setPerest2("JULIO");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;
           $fcesting= new Fcesting();
           $fcesting->setPerest2("AGOSTO");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;
           $fcesting= new Fcesting();
           $fcesting->setPerest2("SEPTIEMBRE");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;
           $fcesting= new Fcesting();
           $fcesting->setPerest2("OCTUBRE");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;
           $fcesting= new Fcesting();
           $fcesting->setPerest2("NOVIEMBRE");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;
           $fcesting= new Fcesting();
           $fcesting->setPerest2("DICIEMBRE");
           $fcesting->setMonto("0,00");
           $detalle[]=$fcesting;

     }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fctiting/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    if ($this->fcpreing->getEstcie()=='S')
       $this->columnas[1][1]->setHTML('type="text" size="17" readOnly="true"');
    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->fcpreing->setGrid($this->obj);
  }

 /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
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
    $ajax = $this->getRequestParameter('ajax','');
    $js="";
    $sw=true;
    switch ($ajax){
      case '1':
         $formato=Herramientas::getX('Codemp','Cidefniv','Forpre','001');
          Herramientas::FormarCodigoPadre($codigo,$nivelcodigo,$ultimo,$formato);
            $c= new Criteria();
            $c->add(CideftitPeer::CODPRE,$ultimo);
            $fordefparing= CideftitPeer::doSelectOne($c);
            if (!$fordefparing)
            {
               if ($nivelcodigo == 0) {
                $js="alert_('El Nivel Anterior No Existe'); $('fcpreing_codpar').value=''; $('fcpreing_codpar').focus();";
               }else {
               if (strlen($codigo) != strlen($formato))
                $js="alert_('El C&oacute;digo de la Partida no es de Ultimo Nivel'); $('fcpreing_codpar').value=''; $('fcpreing_codpar').focus();";
               }
            }else {
              if (strlen($codigo) != strlen($formato))
                $js="alert_('El C&oacute;digo de la Partida no es de Ultimo Nivel'); $('fcpreing_codpar').value=''; $('fcpreing_codpar').focus();";
            }
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
       break;
      case '2':
          $this->fcpreing = $this->getFcpreingOrCreate();
          $codpar=$this->getRequestParameter('codpar');
          $this->params=array();
          $this->labels = $this->getLabels();
          if (!checkdate(intval('01'), intval('01'), intval($codigo)) )
          {
            $js="alert('El Año es Invalido'); $('fcpreing_anno').value=''; $('fcpreing_anno').focus();";
            $totest="0,00";
            $this->configGrid('',$arreglo);
            $sw=false;
          }else {
            Hacienda::buscarEstIng($codpar,$codigo,$totest,$arreglo);
            $this->configGrid('',$arreglo);
            $sw=false;
          }

        $output = '[["fcpreing_totalest","'.$totest.'",""],["javascript","'.$js.'",""],["","",""]]';
       break;
      default:
          $this->fcpreing = $this->getFcpreingOrCreate();
          $totest=$this->getRequestParameter('fcpreing[totalest]');
          $this->params=array();
          $this->labels = $this->getLabels();
          Hacienda::distribuirPeriodos($totest,$arreglo);
          $this->configGrid('',$arreglo);
          $sw=false;
        $output = '[["","",""],["","",""],["","",""]]';
       break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;

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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Hacienda::grabarClasificadorIngresos($clasemodelo,$grid);
    return -1;
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
    $c= new Criteria();
    $c->add(FcestingPeer::CODPAR,$clasemodelo->getCodpar());
    FcestingPeer::doDelete($c);

    $clasemodelo->delete();

    return -1;
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

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
        $this->fcpreing = $this->getFcpreingOrCreate();
        try{ $this->updateFcpreingFromRequest();}
        catch (Exception $ex){}

        $this->configGrid();
        $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

        $x=$grid[0];
        $i=0;
        if (count($x)>0)
        {
          if ($this->getRequestParameter('fcpreing[anno]')=="")
          {
              $this->coderr=727;
              return false;
          }
          if (!checkdate(intval('01'), intval('01'), intval($this->getRequestParameter('fcpreing[anno]'))) )
          {
              $this->coderr=726;
              return false;
          }
        }
     }
     return true;
  }

}
