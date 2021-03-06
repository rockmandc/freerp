<?php
// auto-generated by sfViewConfigHandler
// date: 2017/02/13 05:34:19
$context  = $this->getContext();
$response = $context->getResponse();

if ($this->actionName.$this->viewName == 'indexSuccess')
{
  $templateName = $response->getParameter($this->moduleName.'_'.$this->actionName.'_template', $this->actionName, 'symfony/action/view');
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else
{
  $templateName = $response->getParameter($this->moduleName.'_'.$this->actionName.'_template', $this->actionName, 'symfony/action/view');
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}

if ($templateName.$this->viewName == 'indexSuccess')
{
  $this->setDecoratorTemplate('layout_cidesa'.$this->getExtension());
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'FREERP - Menú Principal', false, false);
  $response->addMeta('robots', 'index, follow', false, false);
  $response->addMeta('description', 'Menú Principal FREERP', false, false);
  $response->addMeta('keywords', 'FREERP, menu, principal', false, false);
  $response->addMeta('language', 'es_VE', false, false);

  $response->addStylesheet('siga', '', array ());
  $response->addJavascript('/sf/prototype/js/prototype', '');
  $response->addJavascript('/sf/prototype/js/scriptaculous', '');
  $response->addJavascript('tools', '');
  $response->addJavascript('ajax', '');
  $response->addJavascript('observe', '');
}
else
{
  if (!$context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('layout_cidesa'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'FREERP - Login', false, false);
  $response->addMeta('robots', 'index, follow', false, false);
  $response->addMeta('description', 'symfony project', false, false);
  $response->addMeta('keywords', 'symfony, project', false, false);
  $response->addMeta('language', 'en_US', false, false);

  $response->addStylesheet('siga', '', array ());
  $response->addJavascript('/sf/prototype/js/prototype', '');
  $response->addJavascript('/sf/prototype/js/scriptaculous', '');
  $response->addJavascript('tools', '');
  $response->addJavascript('ajax', '');
  $response->addJavascript('observe', '');
}

