<?php

/**
 * forcreaasiini actions.
 *
 * @package    Roraima
 * @subpackage forcreaasiini
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * @version    SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 */
class forcreaasiiniActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //$this->forward('default', 'module');
  	if(SF_ENVIRONMENT=='dev'){
    	$this->ent='_dev';
    }else
    {
    	$this->ent='';
    }
  }

  public function executeCrear()
  {
	try{
			$var=$this->getRequestParameter('ajax');
			$param=$this->getRequestParameter('ajax');
   		    
   		    $this->coderr=$coderr=Migracion::Generar('cpasiini',$param);
   		    if ($coderr!='') $js="alert('$coderr');";
   		    else $js='';
            
            $output = '[["javascript","'.$js.'",""]]';
			$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			return sfView::HEADER_ONLY;

	} catch (Exception $ex) {

		$coderr = 0;
		$err = Herramientas :: obtenerMensajeError($coderr);
		$this->getRequest()->setError('', $err);
	}
  }


	/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
	{

		if ($this->getRequestParameter('ajax') == '1')
		{
			$c=new Criteria();
			$reg= CpasiiniPeer::doSelectOne($c);

			if ($reg)  //Si tiene Datos
			{
				$datos='1';
			}else{
				$datos='0';
			}
			$output = '[["sw","'.$datos.'",""]]';
			$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			return sfView::HEADER_ONLY;
		}
	}
}
