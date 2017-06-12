<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/28 10:23:00
?>
<?php echo form_tag('asignarcategoriasconceptosxempleado/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npasicatconemp, 'getId') ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipos De Nominas')?></legend>

<div class="form-row">
  <?php echo label_for('npasicatconemp[codcon]', __($labels['npasicatconemp{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicatconemp{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicatconemp{codcon}')): ?>
    <?php echo form_error('npasicatconemp{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicatconemp, 'getCodcon', array (
  'size' => 10,
  'control_name' => 'npasicatconemp[codcon]',
  'maxlength' => '10',
//  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$formatocategoria')",
//  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}",
  'readonly' => $npasicatconemp->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'condition' => "$('npasicatconemp_codcon').value!=''",
        'url'      => 'asignarcategoriasconceptosxempleado/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=npasicatconemp_nomcon&cajtexcom=npasicatconemp_codcon&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npdefcpt_asignarcategoriaxemp/clase/Npdefcpt/frame/sf_admin_edit_form/obj1/npasicatconemp_codcon/obj2/npasicatconemp_nomcon/campo1/codcon/campo2/nomcon')?>
&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_tag($npasicatconemp, 'getNomcon', array (
  'disabled' => true,
  'control_name' => 'npasicatconemp[nomcon]',
  'size' => 40,
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<br>
</div>
<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>
</fieldset>
<?php include_partial('edit_actions', array('npasicatconemp' => $npasicatconemp)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>
