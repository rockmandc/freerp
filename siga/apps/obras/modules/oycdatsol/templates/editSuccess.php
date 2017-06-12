<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/17 17:52:21
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php javascript_include_tag('prototype.js') ?>
<?php javascript_include_tag('effects.js') ?>
<?php javascript_include_tag('window.js') ?>
<?php javascript_include_tag('window_effects.js') ?>
<?php javascript_include_tag('debug.js') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición del Solicitante',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycdatsol/edit_header', array('ocdatste' => $ocdatste)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycdatsol/edit_messages', array('ocdatste' => $ocdatste, 'labels' => $labels)) ?>
<?php include_partial('oycdatsol/edit_form', array('ocdatste' => $ocdatste, 'labels' => $labels, 'desste' => $desste, 'pais' => $pais, 'estados' => $estados, 'municipio' => $municipio, 'parroquia' => $parroquia, 'sector' => $sector, )) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycdatsol/edit_footer', array('ocdatste' => $ocdatste)) ?>
</div>

</div>
