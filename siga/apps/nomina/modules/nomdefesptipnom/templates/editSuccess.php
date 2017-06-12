<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/20 20:25:45
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Tipos de Nómina',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefesptipnom/edit_header', array('npnomina' => $npnomina)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefesptipnom/edit_messages', array('npnomina' => $npnomina, 'labels' => $labels)) ?>
<?php include_partial('nomdefesptipnom/edit_form', array('npnomina' => $npnomina, 'labels' => $labels, 'listafrecpag' => $listafrecpag, 'listagenordpag' => $listagenordpag)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefesptipnom/edit_footer', array('npnomina' => $npnomina)) ?>
</div>

</div>
