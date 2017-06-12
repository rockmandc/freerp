<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/17 15:35:41
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Seguro [Muebles]',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('bieregsegmue/edit_header', array('bnsegmue' => $bnsegmue)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('bieregsegmue/edit_messages', array('bnsegmue' => $bnsegmue, 'labels' => $labels)) ?>
<?php include_partial('bieregsegmue/edit_form', array('bnsegmue' => $bnsegmue, 'labels' => $labels, 'mascaracatalogo' => $mascaracatalogo, 'mascaraformatoubi' => $mascaraformatoubi, 'mascaralonformato' => $mascaralonformato, 'mascaralonubicacion' => $mascaralonubicacion, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('bieregsegmue/edit_footer', array('bnsegmue' => $bnsegmue)) ?>
</div>

</div>
