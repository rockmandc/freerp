<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/27 13:57:05
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Conceptos para Aportes',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefconaportes/edit_header', array('npcontipaporet' => $npcontipaporet)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefconaportes/edit_messages', array('npcontipaporet' => $npcontipaporet, 'labels' => $labels)) ?>
<?php include_partial('nomdefconaportes/edit_form', array('npcontipaporet' => $npcontipaporet, 'grid' => $grid, 'labels' => $labels )) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefconaportes/edit_footer', array('npcontipaporet' => $npcontipaporet)) ?>
</div>

</div>
