<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
if ($fcdeclar->getId()=='')
{?>
  <?php $value = object_input_tag($fcdeclar, 'getNumdec', array (
  'size' => 10,
  'control_name' => 'fcdeclar[numdec]',
  'maxlength' => 10,
  'onBlur'  => "javascript: valor=this.value; valor='INCLUSION';document.getElementById('fcdeclar_numdec').value=valor;document.getElementById('fcdeclar_numdec').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
else
{
?>
  <?php $value = object_input_tag($fcdeclar, 'getNumdec', array (
  'size' => 10,
  'readonly' => 'readonly',
  'control_name' => 'fcdeclar[numdec]',
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
?>