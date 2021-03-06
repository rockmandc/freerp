<?php
// auto-generated by sfValidatorConfigHandler
// date: 2017/02/17 10:35:44

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  $validators = array();
  $context->getRequest()->setAttribute('fillin', array (
), 'symfony/filter');
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $validators = array();
  $validators['CorrelValidator'] = new CidesaStringValidator();
  $validators['CorrelValidator']->initialize($context, array (
  'values' => 
  array (
    0 => '/^[0-9]*$/',
  ),
  'values_error' => 'Los Correlativos solo puede contener valores númericos',
));
  $validators['StringValidator_forart'] = new sfStringValidator();
  $validators['StringValidator_forart']->initialize($context, array (
  'min' => 2,
  'min_error' => 'El formato del Artículo no puede tener menos de 1 caracter',
  'max' => 30,
  'max_error' => 'El formato del Artículo no puede pasar mas de 30 caracteres',
));
  $validators['StringValidator_desart'] = new sfStringValidator();
  $validators['StringValidator_desart']->initialize($context, array (
  'min' => 2,
  'min_error' => 'La descripción del Artículo no puede tener menos de 1 caracter',
  'max' => 30,
  'max_error' => 'La descripción del Artículo no puede pasar mas de 30 caracteres',
));
  $validators['StringValidator_forubi'] = new sfStringValidator();
  $validators['StringValidator_forubi']->initialize($context, array (
  'min' => 2,
  'min_error' => 'El formato de la Ubicación no puede tener menos de 1 caracter',
  'max' => 30,
  'max_error' => 'El formato de la Ubicación no puede pasar mas de 30 caracteres',
));
  $validators['StringValidator_desubi'] = new sfStringValidator();
  $validators['StringValidator_desubi']->initialize($context, array (
  'min' => 2,
  'min_error' => 'La descripción de la Ubicación no puede tener menos de 1 caracter',
  'max' => 30,
  'max_error' => 'La descripción de la Ubicación no puede pasar mas de 30 caracteres',
));
  $validators['TipodocValidator'] = new CidesaExistValidator();
  $validators['TipodocValidator']->initialize($context, array (
  'class' => 'Cpdoccom',
  'column' => 'tipcom',
  'unique_error' => 'El Tipo de OC Donación debe Existir.',
));
  $validators['codconpagValidator'] = new CidesaExistValidator();
  $validators['codconpagValidator']->initialize($context, array (
  'class' => 'Caconpag',
  'column' => 'codconpag',
  'unique_error' => 'La Condición de Pago debe Existir.',
));
  $validators['codforentValidator'] = new CidesaExistValidator();
  $validators['codforentValidator']->initialize($context, array (
  'class' => 'Caforent',
  'column' => 'codforent',
  'unique_error' => 'La Forma de Entrega debe Existir.',
));
  $validatorManager->registerName('lonart', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('lonart', $validators['CorrelValidator'], 'cadefart');
  $validatorManager->registerName('rupart', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('rupart', $validators['CorrelValidator'], 'cadefart');
  $validatorManager->registerName('forart', 1, 'El Formato del Artículo no puedo estar en Blanco', 'cadefart', null, false);
  $validatorManager->registerValidator('forart', $validators['StringValidator_forart'], 'cadefart');
  $validatorManager->registerName('desart', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('desart', $validators['StringValidator_desart'], 'cadefart');
  $validatorManager->registerName('forubi', 1, 'El Formato de la Ubicación no puedo estar en Blanco', 'cadefart', null, false);
  $validatorManager->registerValidator('forubi', $validators['StringValidator_forubi'], 'cadefart');
  $validatorManager->registerName('desubi', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('desubi', $validators['StringValidator_desubi'], 'cadefart');
  $validatorManager->registerName('corcom', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('corcom', $validators['CorrelValidator'], 'cadefart');
  $validatorManager->registerName('correc2', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('correc2', $validators['CorrelValidator'], 'cadefart');
  $validatorManager->registerName('correq2', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('correq2', $validators['CorrelValidator'], 'cadefart');
  $validatorManager->registerName('cordes2', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('cordes2', $validators['CorrelValidator'], 'cadefart');
  $validatorManager->registerName('corser', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('corser', $validators['CorrelValidator'], 'cadefart');
  $validatorManager->registerName('corsol', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('corsol', $validators['CorrelValidator'], 'cadefart');
  $validatorManager->registerName('corcot2', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('corcot2', $validators['CorrelValidator'], 'cadefart');
  $validatorManager->registerName('tipodoc', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('tipodoc', $validators['TipodocValidator'], 'cadefart');
  $validatorManager->registerName('codconpag', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('codconpag', $validators['codconpagValidator'], 'cadefart');
  $validatorManager->registerName('codforent', 0, 'Required', 'cadefart', null, false);
  $validatorManager->registerValidator('codforent', $validators['codforentValidator'], 'cadefart');
  $context->getRequest()->setAttribute('fillin', array (
), 'symfony/filter');
}
