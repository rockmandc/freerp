<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('foringdefniv[nivobr]', options_for_select(Array(' ','1','2','3','4','5','6','7'),$foringdefniv->getNivobr()),array(
)); ?>