<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/24 22:31:08
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Categorias Presupuestarias', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fordefcatpre/edit_header', array('fordefcatpre' => $fordefcatpre)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fordefcatpre/edit_messages', array('fordefcatpre' => $fordefcatpre, 'labels' => $labels)) ?>
<?php include_partial('fordefcatpre/edit_form', array('fordefcatpre' => $fordefcatpre, 'unidad' => $unidad, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fordefcatpre/edit_footer', array('fordefcatpre' => $fordefcatpre)) ?>
</div>

</div>
