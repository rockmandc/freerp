<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/07 09:11:03
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición Bienes Inmuebles',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('bieregactinmd/edit_header', array('bnreginm' => $bnreginm)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('bieregactinmd/edit_messages', array('bnreginm' => $bnreginm, 'labels' => $labels)) ?>
<?php include_partial('bieregactinmd/edit_form', array('bnreginm' => $bnreginm, 'labels' => $labels, 'forubi' => $forubi, 'lonubi'=> $lonubi, 'foract' => $foract, 'lonact'=> $lonact)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('bieregactinmd/edit_footer', array('bnreginm' => $bnreginm)) ?>
</div>

</div>
