<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 06:10:26
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoNomasicarconnom 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: editSuccess.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Asignación de Cargos y Conceptos a Empleados', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomasicarconnom/edit_header', array('npasicaremp' => $npasicaremp)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomasicarconnom/edit_messages', array('npasicaremp' => $npasicaremp, 'labels' => $labels)) ?>
<?php include_partial('nomasicarconnom/edit_form', array('npasicaremp' => $npasicaremp, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomasicarconnom/edit_footer', array('npasicaremp' => $npasicaremp)) ?>
</div>

</div>