<?php
// auto-generated by sfPropelAdmin
// date: 2015/01/28 13:43:18
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoPagemiord 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: listSuccess.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1>
<?php 
$camnomfor=H::getConfApp2('camnomfor', 'tesoreria', 'pagemiord');
if ($camnomfor!="") {?>
<?php echo __($camnomfor,
array()) ?>
<?php }else {?>
<?php echo __('Ordenes de Pago',
array()) ?>
<?php }?>
</h1>

<div id="sf_admin_header">
<?php include_partial('pagemiord/list_header', array('pager' => $pager)) ?>
<?php include_partial('pagemiord/list_messages', array('pager' => $pager)) ?>
</div>

<div id="sf_admin_bar">
<?php include_partial('filters', array('filters' => $filters)) ?>
</div>

<div id="sf_admin_content">
<?php if (!$pager->getNbResults()): ?>
<?php echo __('no result') ?>
<?php else: ?>
<?php include_partial('pagemiord/list', array('pager' => $pager)) ?>
<?php endif; ?>
<?php include_partial('list_actions') ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pagemiord/list_footer', array('pager' => $pager)) ?>
</div>

</div>
