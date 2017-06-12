<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/27 17:25:29
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'tabs', 'Javascript', 'PopUp', 'Grid', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Proyectos y Acciones Centralizadas',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fordefproyecto/edit_header', array('fordefpry' => $fordefpry)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fordefproyecto/edit_messages', array('fordefpry' => $fordefpry, 'labels' => $labels)) ?>
<?php include_partial('fordefproyecto/edit_form', array('fordefpry' => $fordefpry, 'mascaraproyecto' => $mascaraproyecto, 'estados' => $estados, 'municipios' => $municipios, 'parroquias' => $parroquias, 'directriz' => $directriz,'pacc' => $pacc, 'unidad' => $unidad, 'obj' => $obj, 'obj2' => $obj2, 'subobjetivo' => $subobjetivo, 'subsubobjetivo' => $subsubobjetivo, 'sector' => $sector, 'subsector' => $subsector, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fordefproyecto/edit_footer', array('fordefpry' => $fordefpry)) ?>
</div>

</div>
