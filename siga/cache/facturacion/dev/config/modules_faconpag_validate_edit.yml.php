<?php
// auto-generated by sfValidatorConfigHandler
// date: 2017/02/13 06:39:40

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  $validators = array();
  $context->getRequest()->setAttribute('fillin', array (
), 'symfony/filter');
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $validators = array();
  $validators['Vstring_1_255_0'] = new sfStringValidator();
  $validators['Vstring_1_255_0']->initialize($context, array (
  'min' => 1,
  'min_error' => 'La descripción no puede tener menos de 1 caracteres',
  'max' => 255,
  'max_error' => 'La descripción no puede tener más de 255 caracteres',
));
  $validatorManager->registerName('desconpag', 1, 'Debe insertar la descripción de la condición de pago', 'faconpag', null, false);
  $validatorManager->registerValidator('desconpag', $validators['Vstring_1_255_0'], 'faconpag');
  $validatorManager->registerName('numdia', 0, 'Required', 'faconpag', null, false);
  $context->getRequest()->setAttribute('fillin', array (
), 'symfony/filter');
}
