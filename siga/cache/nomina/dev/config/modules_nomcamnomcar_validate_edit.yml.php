<?php
// auto-generated by sfValidatorConfigHandler
// date: 2017/02/13 05:46:50

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  $validators = array();
  $context->getRequest()->setAttribute('fillin', array (
), 'symfony/filter');
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $validators = array();
  $validators['FechaValidator'] = new sfRegexValidator();
  $validators['FechaValidator']->initialize($context, array (
  'match' => true,
  'pattern' => '/^(3[01]|2?[0-9]|1?[0-9]|0?[1-9]|[12]d)\\/(0?[1-9]|1[012])\\/(\\d{4})$/',
  'match_error' => 'La Fecha  introducida es invalida',
));
  $validatorManager->registerName('feccam', 1, 'La Fecha Desde no puede estar en Blanco', 'npasicaremp', null, false);
  $validatorManager->registerValidator('feccam', $validators['FechaValidator'], 'npasicaremp');
  $context->getRequest()->setAttribute('fillin', array (
), 'symfony/filter');
}
