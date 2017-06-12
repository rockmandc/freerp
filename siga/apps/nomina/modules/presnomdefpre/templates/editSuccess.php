<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/31 17:42:26
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición Presupuestaria de liquidación', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('presnomdefpre/edit_header', array('npdefpreliq' => $npdefpreliq)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('presnomdefpre/edit_messages', array('npdefpreliq' => $npdefpreliq, 'labels' => $labels)) ?>
<?php include_partial('presnomdefpre/edit_form', array('npdefpreliq' => $npdefpreliq, 'labels' => $labels, 'listaconceptos' => $listaconceptos, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('presnomdefpre/edit_footer', array('npdefpreliq' => $npdefpreliq)) ?>
</div>

</div>
