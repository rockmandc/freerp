<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/29 18:57:51
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Registro de Solicitudes de Vacaciones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('vacsalidas/edit_header', array('npvacsalidas' => $npvacsalidas)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('vacsalidas/edit_messages', array('npvacsalidas' => $npvacsalidas, 'labels' => $labels)) ?>
<?php include_partial('vacsalidas/edit_form', array('npvacsalidas' => $npvacsalidas, 'obj' => $obj, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('vacsalidas/edit_footer', array('npvacsalidas' => $npvacsalidas)) ?>
</div>

</div>
