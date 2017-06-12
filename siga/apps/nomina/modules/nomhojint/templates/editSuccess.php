<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/22 16:50:23
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date',  'Grid', 'tabs', 'Javascript', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Datos Personales',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomhojint/edit_header', array('nphojint' => $nphojint)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomhojint/edit_messages', array('nphojint' => $nphojint, 'labels' => $labels)) ?>
<?php include_partial('nomhojint/edit_form', array('nphojint' => $nphojint, 'listaestadocivil' => $listaestadocivil, 'estados' => $estados, 'municipios' => $municipios, 'parroquias' => $parroquias, 'estados2' => $estados2, 'municipios2' => $municipios2, 'parroquias2' => $parroquias2, 'listaestatus' => $listaestatus, 'listaformapago' => $listaformapago, 'bancos' => $bancos, 'listatipocuenta' => $listatipocuenta, 'obj' => $obj, 'obj2' => $obj2, 'obj3' => $obj3, 'obj4' => $obj4, 'obj5' => $obj5, 'listatalla' => $listatalla, 'listagruposanguineo' => $listagruposanguineo, 'estados3' => $estados3, 'municipios3' => $municipios3, 'parroquias3' => $parroquias3, 'grupol' => $grupol, 'listaformatraslado' => $listaformatraslado, 'listatipovivienda' => $listatipovivienda, 'listaformatenencia' => $listaformatenencia, 'listaservicios' => $listaservicios, 'mascaranivel' => $mascaranivel, 'lonnivel' => $lonnivel, 'mascaraemp' => $mascaraemp, 'lonemp' => $lonemp,'c' => $c, 'labels' => $labels, 'listasituacion' => $listasituacion, 'listanivelestudio' => $listanivelestudio, 'listtipemp' => $listtipemp, 'mascaraubi' => $mascaraubi, 'lonnivel2' => $lonnivel2, 'obj6' => $obj6, 'obj7' => $obj7, 'obj8' => $obj8)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomhojint/edit_footer', array('nphojint' => $nphojint)) ?>
</div>

</div>
<?php echo javascript_tag("
  salvarsave=function()
	{
      f=document.sf_admin_edit_form;
	  ObjetosSelectMultiple(f.associated_incapacidades);
	  f.action=location.pathname;
      f.submit();
	}


") ?>
