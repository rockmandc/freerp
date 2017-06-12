<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/26 15:03:59
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición Permisos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomfalperper/edit_header', array('nphojint' => $nphojint)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomfalperper/edit_messages', array('nphojint' => $nphojint, 'labels' => $labels)) ?>
<?php include_partial('nomfalperper/edit_form', array('nphojint' => $nphojint, 'labels' => $labels, 'pagerNpfalper' => $pagerNpfalper, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomfalperper/edit_footer', array('nphojint' => $nphojint)) ?>
</div>

</div>
