<?php
// auto-generated by PropelCidesa
// date: 2008/12/11 23:35:10
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Recargos por Artículo',
array()) ?></h1>


<div id="sf_admin_header">
<?php include_partial('farecart/edit_header', array('farecart' => $farecart)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('farecart/edit_messages', array('farecart' => $farecart, 'labels' => $labels)) ?>
<?php include_partial('farecart/edit_form', array('farecart' => $farecart, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('farecart/edit_footer', array('farecart' => $farecart)) ?>
</div>

</div>
