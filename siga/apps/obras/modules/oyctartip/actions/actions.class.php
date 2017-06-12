<?php

/**
 * oyctartip actions.
 *
 * @package    Roraima
 * @subpackage oyctartip
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oyctartipActions extends autooyctartipActions
{

  private $coderr = -1;

 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->octipprl = $this->getOctipprlOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOctipprlFromRequest();

      $this->saveOctipprl($this->octipprl);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oyctartip/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oyctartip/list');
      }
      else
      {
        return $this->redirect('oyctartip/edit?id='.$this->octipprl->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

   /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOctipprlFromRequest()
  {
    $octipprl = $this->getRequestParameter('octipprl');

    if (isset($octipprl['codtippro']))
    {
      $this->octipprl->setCodtippro($octipprl['codtippro']);
    }
    if (isset($octipprl['destippro']))
    {
      $this->octipprl->setDestippro($octipprl['destippro']);
    }
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='')
  {
   $c = new Criteria();
   $c->add(OctartipPeer::CODTIPPRO,$codigo);
   $reg = OctartipPeer::doSelect($c);

   $opciones = new OpcionesGrid();
   $opciones->setEliminar(true);
   $opciones->setTabla('Octartip');
   $opciones->setAncho(600);
   $opciones->setAnchoGrid(600);
   $opciones->setTitulo('Tarifas Horarias');
   $opciones->setFilas(10);
   $opciones->setHTMLTotalFilas(' ');

   $col1 = new Columna('Años de Experiencia');
   $col1->setTipo(Columna::MONTO);
   $col1->setEsGrabable(true);
   $col1->setAlineacionContenido(Columna::DERECHA);
   $col1->setAlineacionObjeto(Columna::DERECHA);
   $col1->setNombreCampo('exppro');
   $col1->setEsNumerico(true);
   $col1->setHTML('type="text" size="15"');

   $col2 = new Columna('Nivel Profesional');
   $col2->setTipo(Columna::TEXTO);
   $col2->setEsGrabable(true);
   $col2->setAlineacionObjeto(Columna::CENTRO);
   $col2->setAlineacionContenido(Columna::CENTRO);
   $col2->setNombreCampo('nivpro');
   $col2->setHTML('type="text" size="30" maxlength="20"');

   $col3 = clone $col1;
   $col3->setTitulo('Valor Hora Bs.');
   $col3->setNombreCampo('valhor');
   $col3->setJScript('onKeypress="entermonto(event,this.id);"');

   $opciones->addColumna($col1);
   $opciones->addColumna($col2);
   $opciones->addColumna($col3);

   $this->obj = $opciones->getConfig($reg);

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
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    switch ($ajax){
      case '1':
         $c= new Criteria();
         $c->add(OctipprlPeer::CODTIPPRO,$codigo);
         $reg= OctipprlPeer::doSelectOne($c);
         if ($reg)
         {
           $dato=$reg->getDestippro(); $javascript="";
         }else { $dato=""; $javascript="alert('El Tipo de Profesional no Existe'); $('".$cajtexcom."').value='';";}
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
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
  public function saveOctipprl($octipprl)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    Obras::salvarOyctartip($octipprl,$grid);
  }

   protected function getOctipprlOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $octipprl = new Octipprl();
      $this->configGrid($this->getRequestParameter('octipprl[codtippro]'));
    }
    else
    {
      $octipprl = OctipprlPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($octipprl->getCodtippro());

      $this->forward404Unless($octipprl);
    }

    return $octipprl;
  }


  public function deleteOctipprl($octipprl)
  {
    $c= new Criteria();
    $c->add(OctartipPeer::CODTIPPRO,$octipprl->getCodtippro());
    OctartipPeer::doDelete($c);
  }

}
