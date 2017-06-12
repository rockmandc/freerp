<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/08 14:14:21
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Compensación de cargos OCP',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('npcomocp/edit_header', array('npcomocp' => $npcomocp)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('npcomocp/edit_messages', array('npcomocp' => $npcomocp, 'labels' => $labels)) ?>
<?php include_partial('npcomocp/edit_form', array('npcomocp' => $npcomocp, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('npcomocp/edit_footer', array('npcomocp' => $npcomocp)) ?>
</div>

</div>
