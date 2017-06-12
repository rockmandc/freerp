<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/26 16:20:50
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definicion de Empresa', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('biedefemp/edit_header', array('bndefins' => $bndefins)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('biedefemp/edit_messages', array('bndefins' => $bndefins, 'labels' => $labels)) ?>
<?php include_partial('biedefemp/edit_form', array('bndefins' => $bndefins, 'labels' => $labels, 'new' => $new, 'defact'=> $defact, 'ubibie' => $ubibie)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('biedefemp/edit_footer', array('bndefins' => $bndefins)) ?>
</div>

</div>
