<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/07/17 11:03:30
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Comprobante Contable',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('confincomgen/edit_header', array('contabc' => $contabc)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('confincomgen/edit_messages', array('contabc' => $contabc, 'labels' => $labels)) ?>
<?php include_partial('confincomgen/edit_form', array('arreglo_montos' => $arreglo_montos, 'arreglo_mov' => $arreglo_mov, 'monto' => $monto, 'reftra' => $reftra, 'numcom' => $numcom, 'fectra' => $fectra, 'destra' => $destra, 'obj' => $obj, 'contabc' => $contabc, 'labels' => $labels, 'ctas' => $ctas, 'desc_ctas' => $desc_ctas, 'formulario' => $formulario)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('confincomgen/edit_footer', array('contabc' => $contabc)) ?>
</div>

</div>
