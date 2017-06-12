<?php
// auto-generated by sfValidatorConfigHandler
// date: 2017/02/17 10:34:35

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
  'match_error' => 'La Fecha introducida es invalida',
));
  $validators['ExistValidator'] = new CidesaExistValidator();
  $validators['ExistValidator']->initialize($context, array (
  'class' => 'caregart',
  'column' => 'codart',
  'unique_error' => 'El Codigo del Articulo debe existir.',
));
  $validators['ExistValidator1'] = new CidesaExistValidator();
  $validators['ExistValidator1']->initialize($context, array (
  'class' => 'cadefalm',
  'column' => 'codalm',
  'unique_error' => 'El Codigo del Almacen debe existir.',
));
  $validatorManager->registerName('fecinv', 1, 'La Fecha no puedo estar en Blanco', 'cainvfis', null, false);
  $validatorManager->registerValidator('fecinv', $validators['FechaValidator'], 'cainvfis');
  $validatorManager->registerName('artdesde', 1, 'El Codigo del Articulo no puedo estar en Blanco', 'cainvfis', null, false);
  $validatorManager->registerValidator('artdesde', $validators['ExistValidator'], 'cainvfis');
  $validatorManager->registerName('arthasta', 1, 'El Codigo del Articulo no puedo estar en Blanco', 'cainvfis', null, false);
  $validatorManager->registerValidator('arthasta', $validators['ExistValidator'], 'cainvfis');
  $validatorManager->registerName('codalm', 1, 'El Codigo del Almacen no puedo estar en Blanco', 'cainvfis', null, false);
  $validatorManager->registerValidator('codalm', $validators['ExistValidator1'], 'cainvfis');
  $context->getRequest()->setAttribute('fillin', array (
), 'symfony/filter');
}