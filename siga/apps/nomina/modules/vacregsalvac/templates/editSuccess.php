<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/26 20:32:18
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición del Registro y control de Vacaciones', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('vacregsalvac/edit_header', array('nphojint' => $nphojint)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('vacregsalvac/edit_messages', array('nphojint' => $nphojint, 'labels' => $labels)) ?>
<?php include_partial('vacregsalvac/edit_form', array('nphojint' => $nphojint, 'labels' => $labels, 'PagerNpvacregsalActuales' => $PagerNpvacregsalActuales, 'PagerNpvacregsalHistoricos' => $PagerNpvacregsalHistoricos)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('vacregsalvac/edit_footer', array('nphojint' => $nphojint)) ?>
</div>

</div>
