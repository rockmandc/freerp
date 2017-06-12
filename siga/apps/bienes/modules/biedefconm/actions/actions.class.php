<?php

/**
 * biedefconm actions.
 *
 * @package    Roraima
 * @subpackage biedefconm
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biedefconmActions extends autobiedefconmActions
{

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos','');
    $cajtexcom=$this->getRequestParameter('cajtexcom','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        //Descripcion Codigo Nivel
        // $dato=BndefconiPeer::getDescta($codigo);

        $dato=BndefactPeer::getDesact($codigo);


        //$output = '[["'.$cajtexmos.'","'.$dato.'",""], ["bndefcon_desmue","'.$dato1.'",""]]';
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        break;

      case '2':

      //$dato=ContabbPeer::getDescta($codigo);
      $js="";
      $p= new Criteria();
      $p->add(ContabbPeer::CODCTA,$codigo);
      $result= ContabbPeer::doSelectOne($p);
      if ($result)
      {
         if ($result->getCargab()=='C')
            $dato=$result->getDescta();
         else 
            $js="alert('La Cuenta Contable  no es Cargable'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }else 
        $js="alert('La Cuenta Contable no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '3':
         $codcta=$this->getRequestParameter('codigo2','');

         $dato=BnregmuePeer::getDesmue($codcta,$codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
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

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODACT','Bndefact','codact',trim($this->getRequestParameter('bndefcon[codact]')));
      }else
    if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('codigo')),array('cargab'),array('C'));
      }else
    if ($this->getRequestParameter('ajax')=='3')
      {
       //$this->tags=Herramientas::autocompleteAjax('CODCOB','Bncobseg','codcob',trim($this->getRequestParameter('bnsegmue[cobsegmue]')));
      }
  }

 public function setVars()
  {
    $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
    $lengthmask = strlen($this->mascaracontabilidad);
    $this->getUser()->setAttribute('lengthmask',$lengthmask);
  }


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->bndefcon = $this->getBndefconOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndefconFromRequest();

      $this->saveBndefcon($this->bndefcon);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('biedefconm/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('biedefconm/list');
      }
      else
      {
        return $this->redirect('biedefconm/edit?id='.$this->bndefcon->getId());
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
  protected function updateBndefconFromRequest()
  {
    $bndefcon = $this->getRequestParameter('bndefcon');
    $this->setVars();

    if (isset($bndefcon['codact']))
    {
      $this->bndefcon->setCodact(trim($bndefcon['codact']));
    }
    if (isset($bndefcon['codmue']))
    {
      $this->bndefcon->setCodmue(trim($bndefcon['codmue']));
    }
    if (isset($bndefcon['desmue']))
    {
      $this->bndefcon->setDesmue(trim($bndefcon['desmue']));
    }
    if (isset($bndefcon['ctadepcar']))
    {
      $this->bndefcon->setCtadepcar(trim($bndefcon['ctadepcar']));
    }
    if (isset($bndefcon['descta']))
    {
      $this->bndefcon->setDescta(trim($bndefcon['descta']));
    }
    if (isset($bndefcon['ctadepabo']))
    {
      $this->bndefcon->setCtadepabo(trim($bndefcon['ctadepabo']));
    }
    if (isset($bndefcon['desctaabo']))
    {
      $this->bndefcon->setDesctaabo(trim($bndefcon['desctaabo']));
    }
    if (isset($bndefcon['ctaajucar']))
    {
      $this->bndefcon->setCtaajucar(trim($bndefcon['ctaajucar']));
    }
    if (isset($bndefcon['desctaajucar']))
    {
      $this->bndefcon->setDesctaajucar(trim($bndefcon['desctaajucar']));
    }
    if (isset($bndefcon['ctaajuabo']))
    {
      $this->bndefcon->setCtaajuabo(trim($bndefcon['ctaajuabo']));
    }
    if (isset($bndefcon['desctaajuabo']))
    {
      $this->bndefcon->setDesctaajuabo(trim($bndefcon['desctaajuabo']));
    }
    if (isset($bndefcon['ctarevcar']))
    {
      $this->bndefcon->setCtarevcar(trim($bndefcon['ctarevcar']));
    }
    if (isset($bndefcon['desctarevcar']))
    {
      $this->bndefcon->setDesctarevcar(trim($bndefcon['desctarevcar']));
    }
    if (isset($bndefcon['ctarevabo']))
    {
      $this->bndefcon->setCtarevabo(trim($bndefcon['ctarevabo']));
    }
    if (isset($bndefcon['desctarevabo']))
    {
      $this->bndefcon->setDesctarevabo(trim($bndefcon['desctarevabo']));
    }
    if (isset($bndefcon['ctapercar']))
    {
      $this->bndefcon->setCtapercar(trim($bndefcon['ctapercar']));
    }
    if (isset($bndefcon['desctapercar']))
    {
      $this->bndefcon->setDesctapercar(trim($bndefcon['desctapercar']));
    }
    if (isset($bndefcon['ctaperabo']))
    {
      $this->bndefcon->setCtaperabo(trim($bndefcon['ctaperabo']));
    }
    if (isset($bndefcon['desctaperabo']))
    {
      $this->bndefcon->setDesctaperabo(trim($bndefcon['desctaperabo']));
    }
    if (!isset($bndefcon['stacta']))
    {
      $this->bndefcon->setStacta('A');
    }
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
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
       $this->bndefcon = $this->getBndefconOrCreate();
       $this->updateBndefconFromRequest();

       if ($this->bndefcon->getId()=='')
       {
          Muebles::validarBndefcon($this->bndefcon,$msj);
          $this->coderror=$msj;
          if ($this->coderror<>-1)
          {
            return false;
          }else return true;
       }
       return true;
    }else return true;
  }


  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->bndefcon = $this->getBndefconOrCreate();
    $this->updateBndefconFromRequest();
    $this->setVars();

     $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('bndefcon{codmue}',$err);
      }
    }
    return sfView::SUCCESS;

  }

}
