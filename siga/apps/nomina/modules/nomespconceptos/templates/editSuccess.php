<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/26 09:53:09
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion Conceptos para Nominas Especiales',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomespconceptos/edit_header', array('npnomespnomtip' => $npnomespnomtip)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomespconceptos/edit_messages', array('npnomespnomtip' => $npnomespnomtip, 'labels' => $labels)) ?>
<?php include_partial('nomespconceptos/edit_form', array('npnomespnomtip' => $npnomespnomtip, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomespconceptos/edit_footer', array('npnomespnomtip' => $npnomespnomtip)) ?>
</div>

</div>
