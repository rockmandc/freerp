<?php
/*
 * Created on 12/02/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<div id="divparroquias">
  <?php echo select_tag('atciudadano[atparroquias_id]', options_for_select($atciudadano->getParroquias(),$atciudadano->getAtparroquiasId()),array(

  )); ?>
</div>
