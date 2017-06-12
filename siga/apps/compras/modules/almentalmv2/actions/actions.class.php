<?php
/**
 * almentalm actions.
 *
 * @package    Roraima
 * @subpackage almentalm
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

class almentalmv2Actions extends autoalmentalmv2Actions {
    private $coderror = - 1;
    public function getCadetent($rcpart) {
        $c = new Criteria();
        $c->add(CadetentPeer::RCPART, $rcpart);
        
        return CadetentPeer::doSelect($c);
    }
    /**
     * Función principal para el manejo de las acciones create y edit
     * del formulario.
     *
     */
    public function executeEdit() {
        $this->caentalm = $this->getCaentalmOrCreate();
        $this->setVars();
        $this->configGrid();
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $this->updateCaentalmFromRequest();
            if ($this->saveCaentalm($this->caentalm) == - 1) {
                $this->setFlash('notice', 'Your modifications have been saved');
                $this->Bitacora('Guardo');
                if ($this->getRequestParameter('save_and_add')) {
                    
                    return $this->redirect('almentalmv2/create');
                } else if ($this->getRequestParameter('save_and_list')) {
                    
                    return $this->redirect('almentalmv2/list');
                } else {
                    
                    return $this->redirect('almentalmv2/edit?id=' . $this->caentalm->getId());
                }
            } else {
                $this->labels = $this->getLabels();
                if ($this->coderror != - 1) {
                    $err = Herramientas::obtenerMensajeError($this->coderror);
                    $this->getRequest()->setError('', $err);
                }
                
                return sfView::SUCCESS;
            }
        } else {
            $this->labels = $this->getLabels();
        }
    }
    /**
     * Función para manejar el salvado del formulario.
     * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
     * llama internamente a la función $this->saving
     * Esta función saving siempre debe retornar un valor >=-1.
     * En esta funcción se debe realizar el proceso de guardado de informacion
     * del negocio en la base de datos. Este proceso debe ser realizado llamado
     * a funciones de las clases del negocio que se encuentran en lib/bussines
     * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
     *
     */
    protected function saveCaentalm($caentalm) {
        if ($caentalm->getId()) $grid = array();
        else $grid = Herramientas::CargarDatosGridv2($this, $this->obj);
        $coderr = Articulos::salvarAlmentalm($caentalm, $grid);
        $this->coderror = $coderr;
        
        return $coderr;
    }
    protected function deleteCaentalm($caentalm) {
        Articulos::eliminarAlmentalm($caentalm);
    }
    /**
     * Función principal para procesar la eliminación de registros
     * en el formulario.
     *
     */
    public function executeDelete() {
        $this->caentalm = CaentalmPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->caentalm);
        $id = $this->getRequestParameter('id');
      /*  if (Articulos::Hay_DevolucionRCP($this->caentalm)) {
            $this->setFlash('notice', 'La Entrada no puede ser eliminada ya que existe una Devolución, se recomienda borrar en primer lugar la Devolución y luego ejecutar la operación');
            
            return $this->redirect('almentalmv2/edit?id=' . $id);
        } else {*/
            try {
                $this->deleteCaentalm($this->caentalm);
                $this->Bitacora('Elimino');
            }
            catch(PropelException $e) {
                $this->getRequest()->setError('delete', 'Could not delete the selected Caentalm. Make sure it does not have any associated items.');
                
                return $this->forward('almentalmv2', 'list');
            }
            
            return $this->redirect('almentalmv2/list');
        //}
    }
    /**
     * Actualiza la informacion que viene de la vista
     * luego de un get/post en el objeto principal del modelo base del formulario.
     *
     */
    protected function updateCaentalmFromRequest() {
        $caentalm = $this->getRequestParameter('caentalm');
        $fields = CaentalmPeer::getFieldNames();
        if (array_search('Codalmusu', $fields)) {
            if (isset($caentalm['codalmusu'])) {
                $this->caentalm->setCodalmusu($caentalm['codalmusu']);
            }
        }
        if (isset($caentalm['rcpart'])) {
            $this->caentalm->setRcpart($caentalm['rcpart']);
        }
        if (isset($caentalm['codpro'])) {
            //buscar el codigo del proveedor, ya que lo que el usuario llena es el RIF
            $this->caentalm->setCodpro($caentalm['codpro']);
        }
        if (isset($caentalm['desrcp'])) {
            $this->caentalm->setDesrcp($caentalm['desrcp']);
        }
        if (isset($caentalm['monrcp'])) {
            $this->caentalm->setMonrcp($caentalm['monrcp']);
        }
        if (isset($caentalm['tipmov'])) {
            $this->caentalm->setTipmov($caentalm['tipmov']);
        }
        if (isset($caentalm['fecrcp'])) {
            if ($caentalm['fecrcp']) {
                try {
                    $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                    if (!is_array($caentalm['fecrcp'])) {
                        $value = $dateFormat->format($caentalm['fecrcp'], 'i', $dateFormat->getInputPattern('d'));
                    } else {
                        $value_array = $caentalm['fecrcp'];
                        $value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset($value_array['second']) ? ':' . $value_array['second'] : '') : '');
                    }
                    $this->caentalm->setFecrcp($value);
                }
                catch(sfException $e) {
                    // not a date
                    
                }
            } else {
                $this->caentalm->setFecrcp(null);
            }
        }
        if (isset($caentalm['codcen'])) {
            $this->caentalm->setCodcen($caentalm['codcen']);
        }
        $this->caentalm->setStarcp('A');
    }
    protected function getCaentalmOrCreate($id = 'id') {
        if (!$this->getRequestParameter($id)) {
            $caentalm = new Caentalm();
        } else {
            $caentalm = CaentalmPeer::retrieveByPk($this->getRequestParameter($id));
            $this->forward404Unless($caentalm);
        }
        
        return $caentalm;
    }

    public function executeAjaxfila() {
      $name = $this->getRequestParameter('grid','a');
      $grid = $this->getRequestParameter('grid'.$name,'');
      $fila = $this->getRequestParameter('fila','');
      $col = $this->getRequestParameter('columna', '');
      $javascript="";  $jsonextra="";
      $manaartlot = H::getConfApp2('manartlot', 'compras', 'almregart');
      switch ($col) {
            case '1':
              $codart = $grid[$fila][0];
              $codalm = $this->getRequestParameter('caentalm_codalmusu', '');
              if($codart!=''){
                $c = new Criteria();
                $c->add(CaregartPeer::CODART,$codart);
                if($codalm!=''){
                  $c->addJoin(CaregartPeer::CODART, CaartalmubiPeer::CODART);
                  $c->add(CaartalmubiPeer::CODALM, $codalm);
                }
                $caregart = CaregartPeer::doSelectOne($c);
                if($caregart){
                  $grid[$fila][1]=$caregart->getDesart();
                  $grid[$fila][3]=$caregart->getCosult(true);
                  if($codalm!=''){
                    // Busco el almacen cuando está enlazado con el usuario (codalmusu)
                    $c = new Criteria();
                    $c->add(CaartalmubiPeer::CODALM,$codalm);
                    $c->add(CaartalmubiPeer::CODART,$codart);
                    $caartalmubi = CaartalmubiPeer::doSelectOne($c);
                    if($caartalmubi){
                      $grid[$fila][5] = $codalm;
                      $grid[$fila][6] = $caartalmubi->getNomalm();
                      // ubicación
                      $grid[$fila][7] = $caartalmubi->getCodubi();
                      $grid[$fila][8] = $caartalmubi->getNomubi();                          
                      if ($manaartlot == 'S') $grid[$fila][12] = $caartalmubi->getNumlot();
                    }
                  }else{
                    // Se busca si el almacen y la ubicación es única
                    $c = new Criteria();
                    $c->add(CaartalmubiPeer::CODART,$codart);
                    $count = $caartalmubi = CaartalmubiPeer::doCount($c);
                    if($count==1){
                      $caartalmubi = CaartalmubiPeer::doSelectOne($c);
                      $grid[$fila][5] = $codalm;
                      $grid[$fila][6] = $caartalmubi->getNomalm();
                      $grid[$fila][7] = $caartalmubi->getCodubi();
                      $grid[$fila][8] = $caartalmubi->getNomubi();
                      if ($manaartlot == 'S') $grid[$fila][12] = $caartalmubi->getNumlot();
                    }
                  }
                }else{
                  $jsonextra = ',["javascript","alert(\'No existe el artículo para el almacen\');",""]';
                  $grid[$fila][0]='';
                }
              }
              break;
            case '6':
              $codart = $grid[$fila][0];
              $codalm = $this->getRequestParameter('caentalm_codalmusu', '');
              if($codart!=''){
                $c = new Criteria();
                $c->add(CaregartPeer::CODART,$codart);
                if($codalm!=''){
                  $c->addJoin(CaregartPeer::CODART, CaartalmubiPeer::CODART);
                  $c->add(CaartalmubiPeer::CODALM, $codalm);
                }
                $caregart = CaregartPeer::doSelectOne($c);
                if($caregart){
                  $grid[$fila][1]=$caregart->getDesart();
                  $grid[$fila][3]=$caregart->getCosult(true);
                  if($codalm!=''){
                    // Busco el almacen cuando está enlazado con el usuario (codalmusu)
                    $c = new Criteria();
                    $c->add(CaartalmubiPeer::CODALM,$codalm);
                    $c->add(CaartalmubiPeer::CODART,$codart);
                    $caartalmubi = CaartalmubiPeer::doSelectOne($c);
                    if($caartalmubi){
                      $grid[$fila][5] = $codalm;
                      $grid[$fila][6] = $caartalmubi->getNomalm();
                      // ubicación
                      $grid[$fila][7] = $caartalmubi->getCodubi();
                      $grid[$fila][8] = $caartalmubi->getNomubi();
                      if ($manaartlot == 'S') $grid[$fila][12] = $caartalmubi->getNumlot();
                    }else{
                      $jsonextra = ',["javascript","alert(\'No existe el artículo para el almacen\');",""]';
                      $grid[$fila][0]='';
                    }
                  }else{
                    // Se busca si el almacen y la ubicación es única
                    $c = new Criteria();
                    $c->add(CaartalmubiPeer::CODART,$codart);
                    $count = $caartalmubi = CaartalmubiPeer::doCount($c);
                    if($count==1){
                      $caartalmubi = CaartalmubiPeer::doSelectOne($c);
                      $grid[$fila][5] = $codalm;
                      $grid[$fila][6] = $caartalmubi->getNomalm();
                      $grid[$fila][7] = $caartalmubi->getCodubi();
                      $grid[$fila][8] = $caartalmubi->getNomubi();
                      if ($manaartlot == 'S') $grid[$fila][12] = $caartalmubi->getNumlot();
                    }
                  }
                }else{
                  $jsonextra = ',["javascript","alert(\'No existe el artículo para el almacen\');",""]';
                  $grid[$fila][0]='';
                }
              }else{
                  $jsonextra = ',["javascript","alert(\'Debe seleccionar un artículo para poder seleccionar un almacen\');",""]';
                  $grid[$fila][5]='';
              }
              break;
            case '8':
              $codart = $grid[$fila][0];
              $codalm = $grid[$fila][5];
              $codubi = $grid[$fila][7];
              $codalmusu = $this->getRequestParameter('caentalm_codalmusu', '');
              if($codart!='' && $codalm!=''){
                $c = new Criteria();
                $c->add(CaregartPeer::CODART,$codart);
                if($codalmusu!=''){
                  $c->addJoin(CaregartPeer::CODART, CaartalmubiPeer::CODART);
                  $c->add(CaartalmubiPeer::CODALM, $codalmusu);
                }
                $caregart = CaregartPeer::doSelectOne($c);
                if($caregart){
                  $grid[$fila][1]=$caregart->getDesart();
                  $grid[$fila][3]=$caregart->getCosult(true);
                  $c = new Criteria();
                  $c->add(CaartalmubiPeer::CODALM,$codalm);
                  $c->add(CaartalmubiPeer::CODART,$codart);
                  $c->add(CaartalmubiPeer::CODUBI,$codubi);
                  $caartalmubi = CaartalmubiPeer::doSelectOne($c);
                  if($caartalmubi){
                    $grid[$fila][5] = $codalm;
                    $grid[$fila][6] = $caartalmubi->getNomalm();
                    // ubicación
                    $grid[$fila][7] = $caartalmubi->getCodubi();
                    $grid[$fila][8] = $caartalmubi->getNomubi();
                    if ($manaartlot == 'S') $grid[$fila][12] = $caartalmubi->getNumlot();
                  }else{
                    $jsonextra = ',["javascript","alert(\'La ubicación no existe para el almacen y artículo seleccionado\');",""]';
                    $grid[$fila][7]='';
                    $grid[$fila][8]='';
                  }
                }else{
                  $jsonextra = ',["javascript","alert(\'No existe el artículo para el almacen\');",""]';
                  $grid[$fila][5]='';
                  $grid[$fila][6]='';
                  $grid[$fila][7]='';
                  $grid[$fila][8]='';
                }
              }else{
                  $jsonextra = ',["javascript","alert(\'Debe seleccionar un artículo y un almacen para poder seleccionar la ubicación\');",""]';
                  $grid[$fila][7]='';
              }            
              break;
            default:
              break;
          }

      $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

      return sfView::HEADER_ONLY;

    }




    /**
     * Función para procesar _todas_ las funciones Ajax del formulario
     * Cada función esta identificada con el valor de la vista "ajax"
     * el cual traerá el indice de lo que se quiere procesar.
     *
     */
    public function executeAjax() {
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        $cajtexcom = $this->getRequestParameter('cajtexcom');
        $manaartlot = H::getConfApp2('manartlot', 'compras', 'almregart');
        if ($this->getRequestParameter('ajax') == '1') {
            $aux = split('_', $cajtexmos);
            $name = $aux[0];
            $fil = $aux[1];
            $cajtexcom = $name . "_" . $fil . "_6";
            $cajcodubi = $name . "_" . $fil . "_8";
            $cajnomubi = $name . "_" . $fil . "_9";
            if ($manaartlot == 'S') $cajnumlot = $name . "_" . $fil . "_13";
            $codalm = $this->getRequestParameter('codalm');
            $codart = $this->getRequestParameter('codart');
            $codalm = str_pad($codalm, 6, '0', STR_PAD_LEFT);
            $c = new Criteria();
            $c->add(CadefalmPeer::CODALM, $codalm);
            $datos = CadefalmPeer::doSelectOne($c);
            if ($datos) {
                $nomalm = $datos->getNomalm();
                //busco la primera ubicacion para el almacen seleccionado, para el articulo tipeado
                $c = new Criteria();
                $c->add(CaartalmubiPeer::CODALM, $codalm);
                $c->add(CaartalmubiPeer::CODART, $codart);
                $c->addAscendingOrderByColumn(CaartalmubiPeer::CODUBI);
                $alm = CaartalmubiPeer::doSelectOne($c);
                if ($alm) {
                    $codubi = $alm->getCodubi();
                    $nomubi = CadefubiPeer::getDesubicacion($codubi);
                    if ($manaartlot == 'S') $numlot = $alm->getNumlot();
                    if ($manaartlot == 'S') $output = '[["' . $cajtexmos . '","' . $nomalm . '",""],["' . $cajtexcom . '","6","c"],["' . $cajcodubi . '","' . $codubi . '",""],["' . $cajnomubi . '","' . $nomubi . '",""],["' . $cajnumlot . '","' . $numlot . '",""]]';
                    else $output = '[["' . $cajtexmos . '","' . $nomalm . '",""],["' . $cajtexcom . '","6","c"],["' . $cajcodubi . '","' . $codubi . '",""],["' . $cajnomubi . '","' . $nomubi . '",""]]';
                } else
                //el almacen seleccionado no existe para el articulo introducido por el usuario
                {
                    $javascript = "alert('El articulo : " . $codart . ", no existe en el Almacen seleccionado: " . $codalm . " ')";
                    if ($manaartlot == 'S') $output = '[["' . $cajtexmos . '","",""],["' . $cajcodubi . '","",""],["' . $cajnomubi . '","",""],["' . $cajtexcom . '","",""],["' . $cajnumlot . '","",""],["javascript","' . $javascript . '",""]]';
                    else $output = '[["' . $cajtexmos . '","",""],["' . $cajcodubi . '","",""],["' . $cajnomubi . '","",""],["' . $cajtexcom . '","",""],["javascript","' . $javascript . '",""]]';
                }
            } else {
                $nomalm = "";
                $javascript = "alert('Codigo del Almacen no existe...')";
                if ($manaartlot == 'S') $output = '[["' . $cajtexmos . '","' . $nomalm . '",""],["' . $cajcodubi . '","",""],["' . $cajnomubi . '","",""],["' . $cajtexcom . '","",""],["' . $cajnumlot . '","",""],["javascript","' . $javascript . '",""]]';
                else $output = '[["' . $cajtexmos . '","' . $nomalm . '",""],["' . $cajcodubi . '","",""],["' . $cajnomubi . '","",""],["' . $cajtexcom . '","",""],["javascript","' . $javascript . '",""]]';
            } // if ($datos)
            
        } else if ($this->getRequestParameter('ajax') == '2') {
            $modulo = sfContext::getInstance()->getUser()->getAttribute('menu', '', 'autenticacion');
            if ($modulo == 'facturacion' || $modulo == 'facturacionv2') $dato = eregi_replace("[\n|\r|\n\r]", "", Herramientas::getXx('Facliente', array(
                'rifpro'
            ) , array(
                $this->getRequestParameter('codigo')
            ) , 'Nompro'));
            else $dato = eregi_replace("[\n|\r|\n\r]", "", Herramientas::getXx('Caprovee', array(
                'codpro',
                'estpro'
            ) , array(
                $this->getRequestParameter('codigo') ,
                'A'
            ) , 'Nompro'));
            $output = '[["' . $cajtexmos . '","' . $dato . '",""]]';
        } else if ($this->getRequestParameter('ajax') == '3') {
            $dato = CatipentPeer::getNomtip($this->getRequestParameter('codigo'));
            $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $cajtexcom . '","3","c"]]';
        } else if ($this->getRequestParameter('ajax') == '4') {
            $c = new Criteria();
            $c->add(CaregartPeer::CODART, $this->getRequestParameter('codigo'));
            $caregart = CaregartPeer::doSelectOne($c);
            if ($caregart) {
                $dato = $caregart->getDesart();
                $costo = $caregart->getCosult(true);
            }
            $dis = explode('_', $cajtexmos);
            $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $dis[0] . '_' . $dis[1] . '_4' . '","' . $costo . '",""]]';
        } else if ($this->getRequestParameter('ajax') == '5') {
            $aux = split('_', $cajtexmos);
            $name = $aux[0];
            $fil = $aux[1];
            $cajcodubi = $name . "_" . $fil . "_8";
            $cajnomubi = $name . "_" . $fil . "_9";
            if ($manaartlot == 'S') $cajnumlot = $name . "_" . $fil . "_13";
            $codalm = $this->getRequestParameter('codalm');
            $codubi = $this->getRequestParameter('codigo');
            $codart = $this->getRequestParameter('codart');
            if (trim($codalm) != "") {
                $c = new Criteria();
                $c->add(CaartalmubiPeer::CODALM, $codalm);
                $c->add(CaartalmubiPeer::CODUBI, $codubi);
                $c->add(CaartalmubiPeer::CODART, $codart);
                $alm = CaartalmubiPeer::doSelectOne($c);
                if ($alm) {
                    $dato = CadefubiPeer::getDesubicacion($codubi);
                    if ($manaartlot == 'S') $numlot = $alm->getNumlot();
                    $javascript = "";
                } else {
                    $javascript = "alert('La ubicacion : " . $codubi . ", no existe para el almacen seleccionado: " . $codalm . " y el articulo " . $codart . " ')";
                    $dato = "";
                    $codubi = "";
                    if ($manartlot == 'S') $numlot = "";
                }
                if ($manartlot == 'S') $output = '[["' . $cajnomubi . '","' . $dato . '",""],["' . $cajcodubi . '","' . $codubi . '",""],["' . $cajnumlot . '","' . $numlot . '",""],["javascript","' . $javascript . '",""]]';
                else $output = '[["' . $cajnomubi . '","' . $dato . '",""],["' . $cajcodubi . '","' . $codubi . '",""],["javascript","' . $javascript . '",""]]';
            } else {
                $javascript = "alert('Primero debe seleccionar un Almacen...');";
                $dato = "";
                $codubi = "";
                if ($manartlot == 'S') $numlot = "";
                if ($manartlot == 'S') $output = '[["' . $cajnomubi . '","' . $dato . '",""],["' . $cajcodubi . '","' . $codubi . '",""],["' . $cajnumlot . '","' . $numlot . '",""],["javascript","' . $javascript . '",""]]';
                else $output = '[["' . $cajnomubi . '","' . $dato . '",""],["' . $cajcodubi . '","' . $codubi . '",""],["javascript","' . $javascript . '",""]]';
            }
        } else if ($this->getRequestParameter('ajax') == '7') {
            $q = new Criteria();
            $q->add(CadefcenPeer::CODCEN, $this->getRequestParameter('codigo'));
            $reg = CadefcenPeer::doSelectOne($q);
            if ($reg) {
                $dato = $reg->getDescen();
                $javascript = "";
            } else {
                $dato = "";
                $javascript = "alert('El Centro de Costo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
            }
            $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
        }
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        
        return sfView::HEADER_ONLY;
    }
    public function executeAutocomplete() {
        if ($this->getRequestParameter('ajax') == '1') {
            $this->tags = Herramientas::autocompleteAjax('CODALM', 'Cadefalm', 'Codalm', trim($this->getRequestParameter('caentalm[codalm]')));
        } else if ($this->getRequestParameter('ajax') == '2') {
            $modulo = sfContext::getInstance()->getUser()->getAttribute('menu', '', 'autenticacion');
            if ($modulo == 'facturacion') $this->tags = Herramientas::autocompleteAjax('RIFPRO', 'Facliente', 'Rifpro', trim($this->getRequestParameter('caentalm[codpro]')));
            else $this->tags = Herramientas::autocompleteAjax('RIFPRO', 'Caprovee', 'Rifpro', trim($this->getRequestParameter('caentalm[codpro]')));
        } else if ($this->getRequestParameter('ajax') == '3') {
            $this->tags = Herramientas::autocompleteAjax('CODTIPENT', 'Catipent', 'Codtipent', trim($this->getRequestParameter('caentalm[tipmov]')));
        } else if ($this->getRequestParameter('ajax') == '4') {
            //nada
            
        }
    }
    /**
     * Esta función permite definir la configuración del grid de datos
     * que contiene el formulario. Esta función debe ser llamada
     * en las acciones, create, edit y handleError para recargar en todo momento
     * los datos del grid.
     *
     */
    public function configGrid() {
        $c = new Criteria();
        $c->add(CadetentPeer::RCPART, $this->caentalm->getRcpart());
        $per = CadetentPeer::doSelect($c);
        $mascaraarticulo = $this->mascaraarticulo;
        // $i18n = $this->getContext()->getI18N();
        // Se crea el objeto principal de la clase OpcionesGrid
        $opciones = new OpcionesGrid();
        // Se configuran las opciones globales del Grid
        if ($this->caentalm->getId()) $opciones->setEliminar(false);
        else $opciones->setEliminar(true);
        $opciones->setTabla('Cadetent');
        $opciones->setAnchoGrid(900);
        $opciones->setAncho(1900);
        $opciones->setTitulo('Detalle de la Entrada');
        $opciones->setName('a');
        $opciones->setHTMLTotalFilas(' ');
        if ($this->caentalm->getId()) {
            $opciones->setFilas(0);
        } else {
            $opciones->setFilas(5);
        }
        // Se generan las columnas
        $col1 = new Columna('Cod. Artículo');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('Codart');
        if ($this->caentalm->getId()) {
            $col1->setHTML('type="text" size="12" readonly=true');
        } else {
            if (H::getConfApp2('usualms', 'autenticacion', 'login') == 'S') {
                $arr_params = array(
                    'param1' => "'+($('caentalm_codalmusu')==null ? '' : $('caentalm_codalmusu').value)+'"
                );
                $col1->setAjaxadicionales(array('caentalm_codalmusu'));
            } else $arr_params = array();
            $col1->setCatalogo('Caregart', 'sf_admin_edit_form', array(
                'codart' => 1,
                'desart' => 2
            ) , 'Caregart_Almentalm', $arr_params);
            //$col1->setJScript('onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
            $col1->setHTML('type="text" size="12" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascaraarticulo . chr(39) . ')" ');
            //$col1->setAjax('almentalm',4,2);
            $col1->setAjaxfila(true);
        }
        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTAREA);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('Desart');
        $col2->setHTML('type="text" size="25x1" readonly=true');
        $col3 = new Columna('Cantidad');
        $col3->setNombreCampo('Canrec');
        $col3->setTipo(Columna::MONTO);
        $col3->setEsGrabable(true);
        $col3->setAlineacionObjeto(Columna::DERECHA);
        $col3->setAlineacionContenido(Columna::DERECHA);
        $col3->setEsNumerico(true);
        if ($this->caentalm->getId()) {
            $col3->setHTML('type="text" size=6 readonly=true');
        } else {
            $col3->setHTML('type="text" size=6 onKeypress="costoenter(event,this.id)"');
            //$col3->setJScript('onKeypress="costoenter(event,this.id)"');
            
        }
        $col4 = new Columna('Costo');
        $col4->setNombreCampo('Cosart');
        $col4->setTipo(Columna::MONTO);
        $col4->setEsGrabable(true);
        $col4->setAlineacionObjeto(Columna::DERECHA);
        $col4->setAlineacionContenido(Columna::DERECHA);
        $col4->setEsNumerico(true);
        if ($this->caentalm->getId()) {
            $col4->setHTML('type="text" size=10 readonly=true');
        } else {
            $col4->setHTML('type="text" size=10 onKeypress="costoenter(event,this.id)"');
            //$col4->setJScript('onKeypress="costoenter(event,this.id)"');
            
        }
        $col5 = new Columna('Total');
        $col5->setNombreCampo('Montot');
        $col5->setTipo(Columna::MONTO);
        $col5->setEsGrabable(true);
        $col5->setAlineacionObjeto(Columna::DERECHA);
        $col5->setAlineacionContenido(Columna::DERECHA);
        $col5->setHTML('type="text" size=10 readonly=true');
        $col5->setEsTotal(true, 'caentalm_monrcp');
        $objalm = array(
            'codalm' => '6',
            'nomalm' => '7'
        );
        $col6 = new Columna('Codigo del Almacen');
        $col6->setTipo(Columna::TEXTO);
        $col6->setAlineacionObjeto(Columna::CENTRO);
        $col6->setAlineacionContenido(Columna::CENTRO);
        $col6->setEsGrabable(true);
        $col6->setNombreCampo('codalm');
        if ($this->caentalm->getId()) {
          $col6->setHTML('type="text" size="8" readonly=true');
        } else {
            if (H::getConfApp2('usualms', 'autenticacion', 'login') == 'S') {
                $arr_params = array(
                    'param1' => "'+($('caentalm_codalmusu')==null ? '' : $('caentalm_codalmusu').value)+'"
                );
                $col6->setAjaxadicionales(array('caentalm_codalmusu'));
            } else $arr_params = array();          
            $col6->setHTML('type="text" size="8" ');
            $col6->setCatalogo('Cadefalm', 'sf_admin_edit_form', $objalm, 'Cadelfalm_Almordrec', $arr_params);
            //$col6->setJScript('ejecutaajaxalm(this.id)');
            $col6->setAjaxfila(true);
        }
        $col7 = new Columna('Nombre Almacén');
        $col7->setTipo(Columna::TEXTAREA);
        $col7->setEsGrabable(true);
        $col7->setNombreCampo('nomalm');
        $col7->setAlineacionObjeto(Columna::CENTRO);
        $col7->setAlineacionContenido(Columna::CENTRO);
        $col7->setHTML('type="text" size="30x1" readonly=true');
        $objubi = array(
            'codubi' => '8',
            'nomubi' => '9'
        );
        $params = array(
            "'+$(this.id).up().previous(1).descendants()[0].value+'",
            'val2'
        );
        $col8 = new Columna('Codigo de Ubicacion');
        $col8->setTipo(Columna::TEXTO);
        $col8->setAlineacionObjeto(Columna::CENTRO);
        $col8->setAlineacionContenido(Columna::CENTRO);
        $col8->setEsGrabable(true);
        $col8->setNombreCampo('codubi');
        if ($this->caentalm->getId()) {
            $col8->setHTML('type="text" size="10" readonly=true');
        } else {
            if (H::getConfApp2('usualms', 'autenticacion', 'login') == 'S') {
                $params['param1'] = "'+($('caentalm_codalmusu')==null ? '' : $('caentalm_codalmusu').value)+'";
                $col8->setAjaxadicionales(array('caentalm_codalmusu'));
            }
            $col8->setHTML('type="text" size="10" maxlength="' . chr(39) . $this->lonubi . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $this->mascaraubi . chr(39) . ')"');
            $col8->setCatalogo('Cadefubi', 'sf_admin_edit_form', $objubi, 'Cadefubi_Almdes', $params);
            $col8->setAjaxfila(true); // Para implementar ejecutaajax(this.id)
            //$col8->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$this->mascaraubi.chr(39).')"  onBlur="ejecutaajax(this.id)"');            
        }
        $col9 = new Columna('Nombre Ubicación');
        $col9->setTipo(Columna::TEXTAREA);
        $col9->setEsGrabable(true);
        $col9->setNombreCampo('nomubi');
        $col9->setAlineacionObjeto(Columna::CENTRO);
        $col9->setAlineacionContenido(Columna::CENTRO);
        $col9->setHTML('type="text" size="30x1" readonly=true');
        $col10 = new Columna('Fecha de Vencimiento');
        $col10->setTipo(Columna::FECHA);
        $col10->setEsGrabable(true);
        $col10->setNombreCampo('fecven');
        $col10->setAlineacionObjeto(Columna::CENTRO);
        $col10->setAlineacionContenido(Columna::CENTRO);
        $col10->setHTML('type="text" size="10" ');
        $col11 = new Columna('Número de Jaulas');
        $col11->setTipo(Columna::MONTO);
        $col11->setEsGrabable(true);
        $col11->setNombreCampo('numjau');
        $col11->setAlineacionObjeto(Columna::CENTRO);
        $col11->setAlineacionContenido(Columna::CENTRO);
        $col11->setHTML('type="text" size="10" ');
        $col12 = new Columna('Tamaño Métrico');
        $col12->setTipo(Columna::MONTO);
        $col12->setEsGrabable(true);
        $col12->setNombreCampo('tammet');
        $col12->setAlineacionObjeto(Columna::CENTRO);
        $col12->setAlineacionContenido(Columna::CENTRO);
        $col12->setHTML('type="text" size="10" ');
        if ($this->recmer == 'S') {
            $col11->setOculta(false);
            $col12->setOculta(false);
        }
        $manartlot = H::getConfApp2('manartlot', 'compras', 'almregart');
        $col13 = new Columna('Número de Lote');
        $col13->setTipo(Columna::TEXTO);
        $col13->setEsGrabable(true);
        $col13->setAlineacionObjeto(Columna::CENTRO);
        $col13->setAlineacionContenido(Columna::CENTRO);
        $col13->setNombreCampo('numlot');
        if ($this->caentalm->getId()) {
            $col13->setHTML('type="text" size="15" readonly=true');
        } else {
            $col13->setHTML('type="text" size="15" maxlength="100"');
        }
        if ($manartlot != 'S') $col13->setOculta(true);
        $col14 = new Columna('Fecha de Elaboración');
        $col14->setTipo(Columna::FECHA);
        $col14->setEsGrabable(true);
        $col14->setNombreCampo('fecela');
        $col14->setAlineacionObjeto(Columna::CENTRO);
        $col14->setAlineacionContenido(Columna::CENTRO);
        $col14->setHTML('type="text" size="10" ');
        // Se guardan las columnas en el objetos de opciones
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
        $opciones->addColumna($col8);
        $opciones->addColumna($col9);
        $opciones->addColumna($col10);
        $opciones->addColumna($col11);
        $opciones->addColumna($col12);
        $opciones->addColumna($col13);
        $opciones->addColumna($col14);
        // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per);
    }
    /**
     *
     * Función que se ejecuta luego los validadores del negocio (validators)
     * Para realizar validaciones específicas del negocio del formulario
     * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
     *
     */
    public function validateEdit() {
        $resp = - 1;
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $this->caentalm = $this->getCaentalmOrCreate();
            try {
                $this->updateCaentalmFromRequest();
            }
            catch(Exception $ex) {
            }
            $this->setVars();
            $this->configGrid();
            $grid = Herramientas::CargarDatosGridv2($this, $this->obj);
            if ($this->caentalm->getId()) {
            } else //Nuevo Registro
            {
                $caentalm = $this->getRequestParameter('caentalm');
                $modulo = sfContext::getInstance()->getUser()->getAttribute('menu', '', 'autenticacion');
                if ($modulo == 'facturacion' || $modulo == 'facturacionv2') $trajo = H::getX_vacio('RIFPRO', 'Facliente', 'Nompro', $this->getRequestParameter('caentalm[codpro]'));
                else $trajo = H::getX_vacio('CODPRO', 'Caprovee', 'Nompro', $this->getRequestParameter('caentalm[codpro]'));
                if ($trajo == '') {
                    $mierr = Herramientas::obtenerMensajeError('2104');
                    $this->getRequest()->setError('', $mierr);
                    
                    return false;
                }
                if (Tesoreria::validarFechaPerContable($this->getRequestParameter('caentalm[fecrcp]'))) {
                    $mierr = Herramientas::obtenerMensajeError('521');
                    $this->getRequest()->setError('', $mierr);
                    
                    return false;
                }
                //verificar en el grid de articulos que todos los articulos pertenezcan al almacen y ubicacion indicada
                //y verificar que al menos un articulo del grid tenga cantidad mayo que cero.
                $grid = Herramientas::CargarDatosGridv2($this, $this->obj);
                $manartlot = H::getConfApp2('manartlot', 'compras', 'almregart');
                $msg = "";
                $x = $grid[0];
                $j = 0;
                $h = 0;
                $encontro = false;
                
                while ($j < count($x)) {
                    if ($x[$j]->getCanrec() > 0) {
                        $encontro = true;
                        if ($manartlot == 'S') {
                            if ($x[$j]->getCodalm() == "" or $x[$j]->getCodubi() == "" or $x[$j]->getNumlot() == "") {
                                $msg = "Debe indicar el Código del Almacén, la Ubicación y el Nro. del Lote de todos los Artículos de la Entradas en el Almacen";
                                $this->getRequest()->setError('', $msg);
                                
                                return false;
                            } // if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="")
                            
                        } else {
                            if ($x[$j]->getCodalm() == "" or $x[$j]->getCodubi() == "") {
                                $msg = "Debe indicar el Código del Almacén y la Ubicación todos los Artículos de la Entradas en el Almacen";
                                $this->getRequest()->setError('', $msg);
                                
                                return false;
                            } // if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="")
                            
                        }
                    } //if ($x[$j]->getCanrecgri()>0)
                    $j++;
                } //while ($j<count($x))
                if (!$encontro) {
                    $mierr = Herramientas::obtenerMensajeError('162');
                    $this->getRequest()->setError('', $mierr);
                    
                    return false;
                }
                
                return true;
            }
            
            return true;
        } else 
        return true;
    }
    /**
     * Función para manejar la captura de errores del negocio, tanto que se
     * produzcan por algún validator y por un valor false retornado por el validateEdit
     * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
     *
     */
    public function handleErrorEdit() {
        $this->preExecute();
        $this->caentalm = $this->getCaentalmOrCreate();
        try {
            $this->updateCaentalmFromRequest();
        }
        catch(Exception $ex) {
        }
        $this->labels = $this->getLabels();
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            if ($this->coderror != - 1) {
                $err = Herramientas::obtenerMensajeError($this->coderror);
                $this->getRequest()->setError('', $err);
            }
        }
        
        return sfView::SUCCESS;
    }
    public function setVars() {
        $this->mascaraarticulo = Herramientas::getMascaraArticulo();
        $this->mascaraubi = Herramientas::ObtenerFormato('Cadefart', 'Forubi');
        $this->lonubi = strlen($this->mascaraubi);
        $this->mansolocor = "";
        $this->bloqfec = "";
        $this->oculeli = "";
        $this->recmer = "";
        $varemp = $this->getUser()->getAttribute('configemp');
        if ($varemp) if (array_key_exists('aplicacion', $varemp)) if (array_key_exists('compras', $varemp['aplicacion'])) if (array_key_exists('modulos', $varemp['aplicacion']['compras'])) if (array_key_exists('almentalm', $varemp['aplicacion']['compras']['modulos'])) {
            if (array_key_exists('mansolocor', $varemp['aplicacion']['compras']['modulos']['almentalm'])) {
                $this->mansolocor = $varemp['aplicacion']['compras']['modulos']['almentalm']['mansolocor'];
            }
            if (array_key_exists('bloqfec', $varemp['aplicacion']['compras']['modulos']['almentalm'])) {
                $this->bloqfec = $varemp['aplicacion']['compras']['modulos']['almentalm']['bloqfec'];
            }
            if (array_key_exists('oculeli', $varemp['aplicacion']['compras']['modulos']['almentalm'])) {
                $this->oculeli = $varemp['aplicacion']['compras']['modulos']['almentalm']['oculeli'];
            }
            if (array_key_exists('recmer', $varemp['aplicacion']['compras']['modulos']['almentalm'])) {
                $this->recmer = $varemp['aplicacion']['compras']['modulos']['almentalm']['recmer'];
            }
        }
    }
    protected function addFiltersCriteria($c) {
        if (isset($this->filters['rcpart_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::RCPART, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::RCPART, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['rcpart']) && $this->filters['rcpart'] !== '') {
            $c->add(CaentalmPeer::RCPART, '%' . strtr($this->filters['rcpart'], '*', '%') . '%', Criteria::LIKE);
            $c->setIgnoreCase(true);
        }
        $modulo = sfContext::getInstance()->getUser()->getAttribute('menu', '', 'autenticacion');
        if (isset($this->filters['rifpro_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::RIFPRO, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::RIFPRO, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['rifpro']) && $this->filters['rifpro'] !== '') {
            if ($modulo == 'facturacion') {
                $c->add(FaclientePeer::RIFPRO, strtr("%" . $this->filters['rifpro'] . "%", '*', '%') , Criteria::LIKE);
                $c->addJoin(CaentalmPeer::CODPRO, FaclientePeer::CODPRO);
            } else {
                $c->add(CaproveePeer::RIFPRO, strtr("%" . $this->filters['rifpro'] . "%", '*', '%') , Criteria::LIKE);
                $c->addJoin(CaentalmPeer::CODPRO, CaproveePeer::CODPRO);
            }
        }
        if (isset($this->filters['fecrcp_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::FECRCP, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::FECRCP, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['fecrcp'])) {
            if (isset($this->filters['fecrcp']['from']) && $this->filters['fecrcp']['from'] !== '') {
                $criterion = $c->getNewCriterion(CaentalmPeer::FECRCP, date('Y-m-d', $this->filters['fecrcp']['from']) , Criteria::GREATER_EQUAL);
            }
            if (isset($this->filters['fecrcp']['to']) && $this->filters['fecrcp']['to'] !== '') {
                if (isset($criterion)) {
                    $criterion->addAnd($c->getNewCriterion(CaentalmPeer::FECRCP, date('Y-m-d', $this->filters['fecrcp']['to']) , Criteria::LESS_EQUAL));
                } else {
                    $criterion = $c->getNewCriterion(CaentalmPeer::FECRCP, date('Y-m-d', $this->filters['fecrcp']['to']) , Criteria::LESS_EQUAL);
                }
            }
            if (isset($criterion)) {
                $c->add($criterion);
            }
        }
        if (isset($this->filters['desrcp_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::DESRCP, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::DESRCP, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['desrcp']) && $this->filters['desrcp'] !== '') {
            $c->add(CaentalmPeer::DESRCP, '%' . strtr($this->filters['desrcp'], '*', '%') . '%', Criteria::LIKE);
            $c->setIgnoreCase(true);
        }
        if (isset($this->filters['codcen_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::CODCEN, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::CODCEN, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['codcen']) && $this->filters['codcen'] !== '') {
            $c->add(CaentalmPeer::CODCEN, '%' . strtr($this->filters['codcen'], '*', '%') . '%', Criteria::LIKE);
            $c->setIgnoreCase(true);
        }
        if (isset($this->filters['descen_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::DESCEN, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::DESCEN, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['descen']) && $this->filters['descen'] !== '') {
            $c->add(CadefcenPeer::DESCEN, '%' . strtr($this->filters['descen'], '*', '%') . '%', Criteria::LIKE);
            $c->addJoin(CaentalmPeer::CODCEN, CadefcenPeer::CODCEN);
            $c->setIgnoreCase(true);
        }
        if (isset($this->filters['codalm_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::RCPART, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::RCPART, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['codalm']) && $this->filters['codalm'] !== '') {
            $c->add(CadetentPeer::CODALM, strtr("%" . $this->filters['codalm'] . "%", '*', '%') , Criteria::LIKE);
            $c->addJoin(CaentalmPeer::RCPART, CadetentPeer::RCPART);
            $c->setIgnoreCase(true);
        }
        if (isset($this->filters['nomalm_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::NOMALM, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::NOMALM, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['nomalm']) && $this->filters['nomalm'] !== '') {
            $c->add(CadefalmPeer::NOMALM, strtr("%" . $this->filters['nomalm'] . "%", '*', '%') , Criteria::LIKE);
            $c->addJoin(CadetentPeer::CODALM, CadefalmPeer::CODALM);
            $c->addJoin(CaentalmPeer::RCPART, CadetentPeer::RCPART);
            $c->setIgnoreCase(true);
        }
        if (isset($this->filters['codedo_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::CODEDO, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::CODEDO, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['codedo']) && $this->filters['codedo'] !== '') {
            $c->add(CadefalmPeer::CODEDO, $this->filters['codedo']);
            $c->addJoin(CadetentPeer::CODALM, CadefalmPeer::CODALM);
            $c->addJoin(CaentalmPeer::RCPART, CadetentPeer::RCPART);
        }
        if (isset($this->filters['nomedo_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::NOMEDO, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::NOMEDO, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['nomedo']) && $this->filters['nomedo'] !== '') {
            $c->add(OcestadoPeer::NOMEDO, strtr("%" . $this->filters['nomedo'] . "%", '*', '%') , Criteria::LIKE);
            $c->addJoin(CadefalmPeer::CODEDO, OcestadoPeer::CODEDO);
            $c->addJoin(CadetentPeer::CODALM, CadefalmPeer::CODALM);
            $c->addJoin(CaentalmPeer::RCPART, CadetentPeer::RCPART);
            $c->setIgnoreCase(true);
        }
        if (isset($this->filters['nompro_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::NOMPRO, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::NOMPRO, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['nompro']) && $this->filters['nompro'] !== '') {
            if ($modulo == 'facturacion') {
                $c->add(FaclientePeer::NOMPRO, strtr("%" . $this->filters['nompro'] . "%", '*', '%') , Criteria::LIKE);
                $c->addJoin(CaentalmPeer::CODPRO, FaclientePeer::CODPRO);
            } else {
                $c->add(CaproveePeer::NOMPRO, strtr("%" . $this->filters['nompro'] . "%", '*', '%') , Criteria::LIKE);
                $c->addJoin(CaentalmPeer::CODPRO, CaproveePeer::CODPRO);
            }
        }
        if (isset($this->filters['codpro_is_empty'])) {
            $criterion = $c->getNewCriterion(CaentalmPeer::CODPRO, '');
            $criterion->addOr($c->getNewCriterion(CaentalmPeer::CODPRO, null, Criteria::ISNULL));
            $c->add($criterion);
        } else if (isset($this->filters['codpro']) && $this->filters['codpro'] !== '') {
            $c->add(CaentalmPeer::CODPRO, '%' . strtr($this->filters['codpro'], '*', '%') . '%', Criteria::LIKE);
            $c->setIgnoreCase(true);
        }
    }
    public function executeList() {
        $this->processSort();
        $this->processFilters();
        $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caentalm/filters');
        // 15    // pager
        $this->pager = new sfPropelPager('Caentalm', 15);
        $c = new Criteria();
        $almacenes = $this->getUser()->getAttribute('usualms', array());
        $arr_or = array();
        if (count($almacenes) > 0) {
            
            foreach ($almacenes as $cod => $alm) {
                $arr_or[] = CaentalmPeer::CODALMUSU . "='$cod'";
            }
            $c->addOr(CaentalmPeer::CODALMUSU, '('.implode(' OR ', $arr_or).')' , Criteria::CUSTOM);
        } else $c->add(CaentalmPeer::CODALMUSU, null);
        $this->addSortCriteria($c);
        $this->addFiltersCriteria($c);
        $this->pager->setCriteria($c);
        $this->pager->setPage($this->getRequestParameter('page', 1));
        $this->pager->init();
    }
}

