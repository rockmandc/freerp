<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/14 14:32:36
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'tabs', 'PopUp', 'SubmitClick', 'Grid') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Registro de Ajustes y Reparos Fiscales',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('facrepfisliq/edit_header', array('fcrepfis' => $fcrepfis)); ?>
</div>

<div id="sf_admin_content">
<?php include_partial('facrepfisliq/edit_messages', array('fcrepfis' => $fcrepfis, 'labels' => $labels)); ?>
<?php include_partial('facrepfisliq/edit_form', array('fcrepfis' => $fcrepfis, 'obj' => $obj, 'obj2' => $obj2, 'labels' => $labels, 'params' => $params)); ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('facrepfisliq/edit_footer', array('fcrepfis' => $fcrepfis, 'params' => $params)) ?>
</div>

</div>
