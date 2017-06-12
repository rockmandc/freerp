<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/23 18:02:02
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Banco',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefespban/edit_header', array('npbancos' => $npbancos)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefespban/edit_messages', array('npbancos' => $npbancos, 'labels' => $labels)) ?>
<?php include_partial('nomdefespban/edit_form', array('npbancos' => $npbancos, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefespban/edit_footer', array('npbancos' => $npbancos)) ?>
</div>

</div>
