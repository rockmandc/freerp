<?php
// auto-generated by PropelCidesa
// date: 2017/02/13 06:42:06
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: editSuccess.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Título presupuestario', 
array()) ?></h1>


<div id="sf_admin_header">
<?php include_partial('pretitpre/edit_header', array('cpdeftit' => $cpdeftit, 'labels' => $labels, 'params' => $params)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pretitpre/edit_messages', array('cpdeftit' => $cpdeftit, 'labels' => $labels, 'params' => $params)) ?>
<?php include_partial('pretitpre/edit_form', array('cpdeftit' => $cpdeftit, 'labels' => $labels, 'params' => $params)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pretitpre/edit_footer', array('cpdeftit' => $cpdeftit, 'labels' => $labels, 'params' => $params)) ?>
</div>

</div>
