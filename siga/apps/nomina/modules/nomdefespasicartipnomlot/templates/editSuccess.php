<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/07 15:17:27
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Asignación de Cargos a Nomina',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefespasicartipnomlot/edit_header', array('npasicarnom' => $npasicarnom)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefespasicartipnomlot/edit_messages', array('npasicarnom' => $npasicarnom, 'labels' => $labels)) ?>
<?php include_partial('nomdefespasicartipnomlot/edit_form', array('npasicarnom' => $npasicarnom, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefespasicartipnomlot/edit_footer', array('npasicarnom' => $npasicarnom)) ?>
</div>

</div>
