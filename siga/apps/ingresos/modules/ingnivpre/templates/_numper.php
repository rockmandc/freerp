<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php
  $hay=Ingresos::movimientos();
echo select_tag('cidefniv[numper]', options_for_select(Constantes::ListaNumPeriodos(),$cidefniv->getNumper()),array(
   'onchange' => "javascript: cargargridper()",
   'disabled' => $hay == 1 ? true : false ,
)); ?>

