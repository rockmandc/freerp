<?php
// auto-generated by PropelCidesa
// date: 2015/02/25 16:24:41
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

<h1><?php 
$cambiareti=H::getConfApp2('cameti', 'viaticos', 'viasolviatra');
if ($cambiareti=="S")
 echo __('Aprobación de Ordenes de Comisión',
array());
else
echo __('Aprobación de Solicitud de Viáticos', 
array()); ?></h1>


<div id="sf_admin_header">
<?php include_partial('viaaprsolviatra/edit_header', array('viasolviatra' => $viasolviatra, 'labels' => $labels, 'params' => $params)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('viaaprsolviatra/edit_messages', array('viasolviatra' => $viasolviatra, 'labels' => $labels, 'params' => $params)) ?>
<?php include_partial('viaaprsolviatra/edit_form', array('viasolviatra' => $viasolviatra, 'labels' => $labels, 'params' => $params)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('viaaprsolviatra/edit_footer', array('viasolviatra' => $viasolviatra, 'labels' => $labels, 'params' => $params)) ?>
</div>

</div>
