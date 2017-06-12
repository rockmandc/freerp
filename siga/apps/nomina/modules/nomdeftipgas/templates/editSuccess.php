<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/23 18:49:32
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Tipos de Gastos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdeftipgas/edit_header', array('nptipgas' => $nptipgas)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdeftipgas/edit_messages', array('nptipgas' => $nptipgas, 'labels' => $labels)) ?>
<?php include_partial('nomdeftipgas/edit_form', array('nptipgas' => $nptipgas, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdeftipgas/edit_footer', array('nptipgas' => $nptipgas)) ?>
</div>

</div>
