<?php

/**
 * tesdeftipren actions.
 *
 * @package    Roraima
 * @subpackage tesdeftipren
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesdeftiprenActions extends autotesdeftiprenActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->tstipren = $this->getTstiprenOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTstiprenFromRequest();

      $this->saveTstipren($this->tstipren);

       $this->tstipren->setId(Herramientas::getX_vacio('codtip','tstipren','id',$this->tstipren->getCodtip()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdeftipren/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdeftipren/list');
      }
      else
      {
        return $this->redirect('tesdeftipren/edit?id='.$this->tstipren->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->tstipren = TstiprenPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->tstipren);

    try
    {
      $tiene = H::getX_vacio('Tipren','Tsdefban','Tipren',$this->tstipren->getCodtip());
      if ($tiene==''){
        $this->deleteTstipren($this->tstipren);
        $this->Bitacora('Elimino');
      }else{
        $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
        return $this->forward('tesdeftipren', 'list');
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('tesdeftipren', 'list');
    }

    return $this->redirect('tesdeftipren/list');
  }
}
