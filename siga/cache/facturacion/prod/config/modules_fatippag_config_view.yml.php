<?php
// auto-generated by sfViewConfigHandler
// date: 2017/02/13 05:36:04
$context  = $this->getContext();
$response = $context->getResponse();


  $templateName = $response->getParameter($this->moduleName.'_'.$this->actionName.'_template', $this->actionName, 'symfony/action/view');
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!$context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Módulo de Facturación', false, false);
  $response->addMeta('robots', 'index, follow', false, false);
  $response->addMeta('description', 'Módulo de Facturación', false, false);
  $response->addMeta('keywords', 'Módulo de Facturación', false, false);
  $response->addMeta('language', 'en', false, false);

  $response->addStylesheet('main', '', array ());
  $response->addJavascript('/sf/prototype/js/prototype', '');
  $response->addJavascript('/sf/prototype/js/scriptaculous', '');
  $response->addJavascript('tools', '');
  $response->addJavascript('ajax', '');
  $response->addJavascript('observer', '');


