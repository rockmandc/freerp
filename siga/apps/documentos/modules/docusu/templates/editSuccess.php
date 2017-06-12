<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/15 09:05:13
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Usuarios', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('docusu/edit_header', array('usuarios' => $usuarios)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('docusu/edit_messages', array('usuarios' => $usuarios, 'labels' => $labels)) ?>
<?php include_partial('docusu/edit_form', array('usuarios' => $usuarios, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('docusu/edit_footer', array('usuarios' => $usuarios)) ?>
</div>

</div>
