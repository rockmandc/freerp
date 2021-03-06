<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/17 10:46:45
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoAlmtraalm 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: editSuccess.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Traspaso de Artículos', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almtraalm/edit_header', array('catraalm' => $catraalm)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almtraalm/edit_messages', array('catraalm' => $catraalm, 'labels' => $labels)) ?>
<?php include_partial('almtraalm/edit_form', array('catraalm' => $catraalm, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almtraalm/edit_footer', array('catraalm' => $catraalm)) ?>
</div>

</div>
