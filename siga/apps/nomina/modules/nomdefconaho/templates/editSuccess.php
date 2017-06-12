<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/24 14:00:17
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">


<h1><?php echo __('Edición de Conceptos de Ahorro Habitacional',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefconaho/edit_header', array('npconaho' => $npconaho)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefconaho/edit_messages', array('npconaho' => $npconaho, 'labels' => $labels)) ?>
<?php include_partial('nomdefconaho/edit_form', array('npconaho' => $npconaho, 'obj' => $obj , 'labels' => $labels, 'deduccion' => $deduccion, 'aporte' => $aporte, 'ajudeduccion' => $ajudeduccion, 'ajuaporte' => $ajuaporte)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefconaho/edit_footer', array('npconaho' => $npconaho)) ?>
</div>

</div>
