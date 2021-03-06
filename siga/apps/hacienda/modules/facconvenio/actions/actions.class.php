<?php

/**
 * facconvenio actions.
 *
 * @package    Roraima
 * @subpackage facconvenio
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 59202 2014-10-24 21:29:18Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class facconvenioActions extends autofacconvenioActions {

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function editing() {
    $this->params = array();
    $this->setVars();
    $this->configGrid();
    $this->configGridConvenio($this->fcconpag->getRefcon());
    $this->configGridRubro($this->fcconpag->getRefcon());
  }

  public function setVars() {
    $this->fcconpag->setFeccon(date("Y-m-d"));
    $this->fcconpag->setFecrec(date("Y-m-d"));
    $this->fcconpag->setFunrec($this->fcconpag->getFunrec() == '' ? $this->getUser()->getAttribute('loguse') : $this->fcconpag->getFunrec());
  }

  public function configGrid($rifcon='', $numref='', $criterio='', $sw=false) {
    $datos = array();
    if ($sw) {      
      $c = new Criteria();
      $c->add(FcdeclarPeer :: RIFCON, $rifcon);
      $c->add(FcdeclarPeer::EDODEC, array('X', 'P'), Criteria::NOT_IN);
      if ($numref != '') {
        if ($criterio != 'O') {
          $c->add(FcdeclarPeer::NUMREF, $numref);
        } else {
          $c->add(FcdeclarPeer::NUMDEC, $numref);
        }
      }
      $c->addAscendingOrderByColumn(FcdeclarPeer::NUMREF);
      $c->addAscendingOrderByColumn(FcdeclarPeer::TIPO);
      $c->addAscendingOrderByColumn(FcdeclarPeer::NUMERO);
      $c->addAscendingOrderByColumn(FcdeclarPeer::FECVEN);
      $c->addAscendingOrderByColumn(FcdeclarPeer::NUMDEC);
      $datos = FcdeclarPeer :: doSelect($c);
      if ($datos){
        for ($i = 0; $i < count($datos); $i++) {
          $datos[$i]->setMontopag(H :: FormatoMonto($datos[$i]->getMondec() + $datos[$i]->getMora() - $datos[$i]->getProntopg()));
          $datos[$i]->setMontopagcon(H :: FormatoMonto($datos[$i]->getMondec() + $datos[$i]->getMora() - $datos[$i]->getProntopg())); //(H :: FormatoMonto($datos[$i]->getAutliq()));
          $datos[$i]->setSaldo(H :: FormatoMonto($datos[$i]->getMondec() + $datos[$i]->getMora() - $datos[$i]->getProntopg() - $datos[$i]->getMontopagcon()));

          if ($datos[$i]->getEdodec() == 'P') {
            $datos[$i]->setCheck('1');
          } else {
            $datos[$i]->setCheck('0');
          }
        }
      }
    } else {
      $c = new Criteria();
      $c->add(FcdeuconPeer :: REFCON, $this->fcconpag->getRefcon());
      $c->addJoin(FcdeclarPeer :: NUMDEC, FcdeuconPeer :: NUMDEC);
      $c->addJoin(FcdeclarPeer :: NUMERO, FcdeuconPeer :: NUMERO);
      $c->addJoin(FcdeclarPeer :: FECVEN, FcdeuconPeer :: FECVEN);
      $c->addJoin(FcdeclarPeer :: FUEING, FcdeuconPeer :: FUEING);
      $c->addAscendingOrderByColumn(FcdeclarPeer::NUMREF);
      $c->addAscendingOrderByColumn(FcdeclarPeer::TIPO);
      $c->addAscendingOrderByColumn(FcdeclarPeer::NUMERO);
      $c->addAscendingOrderByColumn(FcdeclarPeer::FECVEN);
      $c->addAscendingOrderByColumn(FcdeclarPeer::NUMDEC);
      $datos = FcdeclarPeer :: doSelect($c);
      if ($datos) {
        for ($i = 0; $i < count($datos); $i++) {
          $datos[$i]->setMontopag(H :: FormatoMonto($datos[$i]->getMondec() + $datos[$i]->getMora() - $datos[$i]->getProntopg()));
          $datos[$i]->setMontopagcon(0);
          $datos[$i]->setSaldo(H :: FormatoMonto($datos[$i]->getMondec() + $datos[$i]->getMora() - $datos[$i]->getProntopg() - $datos[$i]->getMontopagcon()));

          if ($datos[$i]->getEdodec() == 'P') {
            $datos[$i]->setCheck('1');
          } else {
            $datos[$i]->setCheck('0');
          }
        }
      }
    }


    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facconvenio/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');
    if($this->fcconpag->getId()!=''){
      $this->columnas[1][0]->setHTML('readonly="true"');
    }else{
      $this->columnas[1][0]->setHTML('onClick="actualizarTotales();"');
    }

    $this->params['grid'] = $this->columnas[0]->getConfig($datos);
  }

  public function configGridConvenio($refcon='', $arreglo= array()) {
    $datos = array();
    if (count($arreglo) > 0) {      
      $y = 0;
      while ($y < count($arreglo)) {
        $fcdetcon = new Fcdetcon();
        $fcdetcon->setFecven($arreglo[$y]['fecven']);
        $fcdetcon->setNumcuo($arreglo[$y]['numcuo']);
        $fcdetcon->setObscuo($arreglo[$y]['obscuo']);
        $fcdetcon->setMoncuo($arreglo[$y]['moncuo']);
        $datos[] = $fcdetcon;
        $y++;
      }
    } else {
      $c = new Criteria();
      $c->add(FcdetconPeer :: REFCON, $refcon);
      $c->addAscendingOrderByColumn(FcdetconPeer::FECVEN);
      $datos = FcdetconPeer :: doSelect($c);
      if ($datos) {
      for ($i = 0; $i < count($datos); $i++) {
        if ($datos[$i]->getNumcuo() == '01') {
          $datos[$i]->setNumcuo('Inicial');
        } else {
          $datos[$i]->setNumcuo('Cuota Nº ' . $i);
        }
      }
     }
    }
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facconvenio/' . sfConfig :: get('sf_app_module_config_dir_name') . '/gridconvenio');
    $this->params['gridconvenio'] = $this->columnas[0]->getConfig($datos);
  }

  public function configGridRubro($refcon='', $arreglo=array()) {
    $datos = array();
    if (count($arreglo) > 0) {      
      $y = 0;
      while ($y < count($arreglo)) {
        $fcdetconfue = new Fcdetconfue();
        $fcdetconfue->setFecven($arreglo[$y]['fecven']);
        $fcdetconfue->setNumcuo($arreglo[$y]['numcuo']);
        $fcdetconfue->setObscuo($arreglo[$y]['obscuo']);
        $fcdetconfue->setMoncuo($arreglo[$y]['moncuo']);
        $fcdetconfue->setNomfue($arreglo[$y]['nomfue']);
        $fcdetconfue->setDescuo($arreglo[$y]['descripcion']);
        $fcdetconfue->setFuente($arreglo[$y]['fuente']);
        $datos[] = $fcdetconfue;
        $y++;
      }
    } else {
      $c = new Criteria();
      $c->add(FcdetconfuePeer :: REFCON, $refcon);
      $c->addAscendingOrderByColumn(FcdetconfuePeer::FECVEN);
      $datos = FcdetconfuePeer :: doSelect($c);
      if ($datos) {
      for ($i = 0; $i < count($datos); $i++) {
        if ($datos[$i]->getNumcuo() == '01') {
          $datos[$i]->setDescripcion('Inicial');
        } else {
          $datos[$i]->setDescripcion('Cuota Nº ' . $i);
        }
      }
    }
    }
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facconvenio/' . sfConfig :: get('sf_app_module_config_dir_name') . '/gridrubro');
    $this->params['gridrubro'] = $this->columnas[0]->getConfig($datos);
  }

  public function executeAjax() {

    $codigo = $this->getRequestParameter('codigo', '');
    $javascript = "";
    $ajax = $this->getRequestParameter('ajax', '');
    $cajtexmos = $this->getRequestParameter('cajtexmos', '');
    $this->ajax = $ajax;
    switch ($ajax) {

      case '1':
        $nomcon = '';
        $dircon = '';
        $numref = $this->getRequestParameter('seleccion', '');
        $criterio = $this->getRequestParameter('criterio', '');
        $c = new Criteria();
        $c->add(FcconrepPeer::RIFCON, trim($codigo));
        $c->add(FcconrepPeer::REPCON, 'C');
        $fcconrep2 = FcconrepPeer::doSelectOne($c);

        if (count($fcconrep2) > 0) {

          $nomcon = $fcconrep2->getNomcon();
          $dircon = $fcconrep2->getDircon();
          if ($fcconrep2->getNaccon() == 'V') {
            $javascript = $javascript . "$('fcconpag_nacconcon_V').checked=true; ";
          } else {
            $javascript = $javascript . "$('fcconpag_nacconcon_E').checked=true; ";
          }
          if ($fcconrep2->getTipcon() == 'N') {
            $javascript = $javascript . "$('fcconpag_tipconcon_N').checked=true; ";
          } else {
            $javascript = $javascript . "$('fcconpag_tipconcon_J').checked=true; ";
          }

          //Deuda
          $cr = new Criteria();
          $cr->add(FcdeclarPeer :: RIFCON, trim($codigo));
          if ($numref != '') {
            if ($criterio != 'O') {
              $cr->add(FcdeclarPeer :: NUMREF, trim($numref));
            } else {
              $cr->add(FcdeclarPeer :: NUMDEC, trim($numref));
            }
          }
          $fcdeclar = FcdeclarPeer :: doSelectOne($cr);
          if ($fcdeclar) {
            $this->params = array();
            $this->fcconpag = $this->getFcconpagOrCreate();
            $this->updateFcconpagFromRequest();
            $this->labels = $this->getLabels();
            $this->configGrid($codigo, $numref, $criterio, true);
            $javascript = $javascript . "actualizarTotales();";
          } else {
            $javascript = $javascript . "alert('Contribuyente no Tiene Deuda');";
            $this->params = array();
            $this->fcconpag = $this->getFcconpagOrCreate();
            $this->updateFcconpagFromRequest();
            $this->labels = $this->getLabels();
            $this->configGriddetalles('', '', '', true);
          }
        } else {
          $javascript = $javascript . "alert('El Contribuyente no Existe, incluya todos sus Datos Basicos');";
        }

        $output = '[["fcconpag_nomcon","' . $nomcon . '",""],["fcconpag_dircon","' . $dircon . '",""],["javascript","' . $javascript . '",""]]';
        break;
      default :
        $this->params = array();
        $this->fcconpag = $this->getFcconpagOrCreate();
        $this->updateFcconpagFromRequest();
        $this->labels = $this->getLabels();
        $this->ajax = '2';
        $diferencia = 0;
        $arreglo = array();
        $montoinicial = 0;
        $montofinanciado = 0;
        $montocuota = 0;
        $porini = $this->getRequestParameter('fcconpag[porini]');
        $monini = $this->getRequestParameter('fcconpag[monini]');
        $porfin = $this->getRequestParameter('fcconpag[porfin]');
        $totalcon = $this->getRequestParameter('fcconpag[totalcon]');
        $codigo = $this->getRequestParameter('fcconpag[rifcon]');
        $numref = $this->getRequestParameter('fcconpag[seleccion]');
        $criterio = $this->getRequestParameter('fcconpag[criterio]');
        $numcuo = $this->getRequestParameter('fcconpag[numcuo]');
        $feccon = $this->getRequestParameter('fcconpag[feccon]');
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this, $this->grid);
        $this->configGrid($codigo, $numref, $criterio, true);
        if ($feccon != '') {
          //Calcular Convenio
          if ($porini != 0) {
            $montoinicial = (H::toFloat($porini) / 100) * H::toFloat($totalcon);
            if ($porfin==0)
              $porfin=100-$porini;

          } else {
            $montoinicial = H::toFloat($monini);
          }
          if ($porfin != 0 ) {
            $montofinanciado = (H::toFloat($totalcon)) * (H::toFloat($porfin) / 100);
          }else {

          }
          if ($numcuo != 0) {
            $montocuota = (H::toFloat($totalcon) - H::toFloat($montoinicial)) / $numcuo; // + $montofinanciado) / $numcuo;
            $diferencia = H::toFloat($montocuota) * $numcuo;
            //Distribuir Convenio
            Hacienda::DistribuirConvenio($numcuo, $arreglo, $feccon, $montoinicial, $montocuota);
            //VerificarConvenio
            $i = 0;
            $ndif = 0;
            $monto2 = H::toFloat($diferencia) - H::toFloat($montofinanciado); //+ H::toFloat($montoinicial);
            
            /*if (H::toFloat($totalcon) != H::toFloat($monto2) && H::toFloat($monto2)!=0) {
              $ndif = $monto2 - H::toFloat($totalcon);
            }*/
            if ($monto2!=0.00)
              $ndif = $monto2;

            while ($i < count($arreglo)) {
              if ($arreglo[$i]['numcuo'] == 'Cuota Nro 1') {
                $arreglo[$i]['moncuo'] = H::toFloat($arreglo[$i]['moncuo']) - $ndif;
                $monto2 = H::toFloat($diferencia) - $ndif;
                $diferencia = $monto2;
              }
              $i++;
            }
            $this->configGridConvenio('', $arreglo);
          } else {
            $this->configGridConvenio();
          }

          $javascript = $javascript . "actualizarTotales();";
        } else {
          $this->configGridConvenio();
          $javascript = $javascript . "alert('La Fecha de Registro esta en blanco');";
        }

        $output = '[["javascript","' . $javascript . '",""],["fcconpag_monini","' . number_format($montoinicial, 2, ',', '.') . '",""],
               ["fcconpag_monfin","' . number_format($montofinanciado, 2, ',', '.') . '",""],["fcconpag_porfin","' .$porfin . '",""], ["fcconpag_moncuo","' . number_format($montocuota, 2, ',', '.') . '",""],
               ["fcconpag_totcuo","' . number_format($diferencia, 2, ',', '.') . '",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
    //return sfView::HEADER_ONLY;
  }

  public function executeAjaxgrid() {
    $name = $this->getRequestParameter('grid', 'a');
    $grid = $this->getRequestParameter('grid' . $name, '');
    $nuevo = $this->getRequestParameter('id', '');
    $fila = $this->getRequestParameter('fila', '');
    $col = $this->getRequestParameter('columna', '');
    $arreglofuente = array();
    $gridrubros = array();
    $javascript = '';
    $this->params = array();
    $this->fcconpag = $this->getFcconpagOrCreate();
    $this->updateFcconpagFromRequest();
    $this->labels = $this->getLabels();
    $codigo = $this->getRequestParameter('fcconpag_rifcon');
    $numref = $this->getRequestParameter('fcconpag_seleccion]');
    $criterio = $this->getRequestParameter('fcconpag_criterio');
    $totalcon = $this->getRequestParameter('fcconpag_totalcon');
    $gridconvenio = $this->getRequestParameter('gridb', '');
    //Acumular Fuente
    Hacienda::AcumularFuentesCon($grid, $arreglofuente);
    if (count($arreglofuente)>0)    //Distribuir Rubros
      Hacienda::DistribuirRubrosCon($gridconvenio, $arreglofuente, $gridrubros, $totalcon);
    //Hacienda::ajustesfinales(&$gridrubros, $arreglofuente, $gridconvenio);
    $this->configGridRubro('', $gridrubros);
    $javascript = $javascript . "actualizarTotales();";
    $output = '[["javascript","' . $javascript . '",""],["","",""],["","",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError() {
    $this->setVars();
    $this->params = array();
    $this->configGrid();
    $this->configGridConvenio();
    $this->configGridRubro();
    $grid = Herramientas::CargarDatosGridv2($this, $this->params['grid']);
    $gridconvenio = Herramientas::CargarDatosGridv2($this, $this->params['gridconvenio']);
    $gridrubro = Herramientas::CargarDatosGridv2($this, $this->params['gridrubro']);
  }

  public function saving($clasemodelo) {
    $grid = Herramientas::CargarDatosGridv2($this, $this->params['grid']);
    $gridconvenio = Herramientas::CargarDatosGridv2($this, $this->params['gridconvenio']);
    $gridrubro = Herramientas::CargarDatosGridv2($this, $this->params['gridrubro']);
    $error = Hacienda::SalvarFacconvenio($clasemodelo, $gridconvenio, $gridrubro, $grid);

    return -1;
  }

  public function deleting($clasemodelo) {
    if (Hacienda::verificarConvenio($clasemodelo->getRefcon())) {
      return 766;
    } else {

      return Hacienda::EliminarFacconvenio($clasemodelo);
    }
  }

}
