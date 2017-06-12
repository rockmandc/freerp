<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/28 10:23:00
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Asignación de Categorias por Empleados', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('asignarcategoriasconceptosxempleado/edit_header', array('npasicatconemp' => $npasicatconemp)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('asignarcategoriasconceptosxempleado/edit_messages', array('npasicatconemp' => $npasicatconemp, 'labels' => $labels)) ?>
<?php include_partial('asignarcategoriasconceptosxempleado/edit_form', array('npasicatconemp' => $npasicatconemp, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('asignarcategoriasconceptosxempleado/edit_footer', array('npasicatconemp' => $npasicatconemp)) ?>
</div>

</div>
