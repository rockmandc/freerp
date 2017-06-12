<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/22 20:30:32
?>
<?php echo form_tag('nomasicaremplot/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'observe') ?>
<?php echo object_input_hidden_tag($npnomina, 'getId') ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipo de Nomina')?></legend>
<div class="form-row">
  <?php echo label_for('npnomina[codnom]','Codigo', 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{codnom}')): ?>
    <?php echo form_error('npnomina{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomina, 'getCodnom', array (
  'size' => 20,
  'control_name' => 'npnomina[codnom]',
  'maxlength' => 3,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npnomina_codnom').value=cadena",
  'onBlur'=> remote_function(array(
     'update'   => 'divGrid',
     'url'      => 'nomasicaremplot/ajax',
	 'complete' => 'AjaxJSON(request, json)',
	 'script' => true,
  	 'with' => "'ajax=1&cajtexmos=npnomina_nomnom&cajtexcom=npnomina_codnom&codigo='+this.value"
			  )),
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npdefcpt_nomdefconaho/clase/Npnomina/frame/sf_admin_edit_form/obj1/npnomina_codnom/obj2/npnomina_nomnom/campo1/codnom/campo2/nomnom/param1/1/param2/y')?>
&nbsp;&nbsp;
  <?php $value = object_input_tag($npnomina, 'getNomnom', array (
  'size' => 80,
  'control_name' => 'npnomina[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<div class="form-row" id="divGrid">
<?
echo grid_tag($obj);
?>
</div>
</div>
</fieldset>
<?php include_partial('edit_actions', array('npnomina' => $npnomina)) ?>

</form>

