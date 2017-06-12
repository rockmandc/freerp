<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/14 15:39:51
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Parroquias',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fordefpar/edit_header', array('fordefpar' => $fordefpar)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fordefpar/edit_messages', array('fordefpar' => $fordefpar, 'labels' => $labels)) ?>
<?php include_partial('fordefpar/edit_form', array('fordefpar' => $fordefpar, 'estados' => $estados, 'municipios' => $municipios, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fordefpar/edit_footer', array('fordefpar' => $fordefpar)) ?>
</div>

</div>
