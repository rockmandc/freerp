<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 05:45:56
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoNomdefespprofes 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: editSuccess.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Profesiones', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefespprofes/edit_header', array('npprofesion' => $npprofesion)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefespprofes/edit_messages', array('npprofesion' => $npprofesion, 'labels' => $labels)) ?>
<?php include_partial('nomdefespprofes/edit_form', array('npprofesion' => $npprofesion, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefespprofes/edit_footer', array('npprofesion' => $npprofesion)) ?>
</div>

</div>
