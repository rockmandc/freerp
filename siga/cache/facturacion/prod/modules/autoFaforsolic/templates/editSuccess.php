<?php
// auto-generated by PropelCidesa
// date: 2017/02/13 05:39:47
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

<h1><?php echo __('Definición de Forma de Solicitud', 
array()) ?></h1>


<div id="sf_admin_header">
<?php include_partial('faforsolic/edit_header', array('faforsol' => $faforsol, 'labels' => $labels, 'params' => $params)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('faforsolic/edit_messages', array('faforsol' => $faforsol, 'labels' => $labels, 'params' => $params)) ?>
<?php include_partial('faforsolic/edit_form', array('faforsol' => $faforsol, 'labels' => $labels, 'params' => $params)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('faforsolic/edit_footer', array('faforsol' => $faforsol, 'labels' => $labels, 'params' => $params)) ?>
</div>

</div>