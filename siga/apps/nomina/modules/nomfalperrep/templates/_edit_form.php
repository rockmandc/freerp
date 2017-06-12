<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 42871 2011-03-02 23:02:05Z cramirez $
 */
// date: 2007/03/26 15:54:53
?>
<?php echo form_tag('nomfalperrep/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>
<?php echo object_input_hidden_tag($nphojint, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('nphojint[codemp]', __($labels['nphojint{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codemp}')): ?>
    <?php echo form_error('nphojint{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCodemp', array (
  'size' => 20,
  'control_name' => 'nphojint[codemp]',
  'maxlength' => 9,
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'url'      => 'nomfalperrep/grid',
        'complete' => 'AjaxJSON(request, json)',
		'condition' => "$(this.id).value!=''",
        'script' => true,
        'with' => "'ajax=1&cajtexmos=nphojint_nomemp&codmot='+$('nphojint_codmotfal').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Nomfalperper/clase/Nphojint/frame/sf_admin_edit_form/obj1/nphojint_codemp/obj2/nphojint_nomemp/campo1/codemp/campo2/nomemp/param1/')?>

    </div>


  <div class="content<?php if ($sf_request->hasError('nphojint{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{nomemp}')): ?>
    <?php echo form_error('nphojint{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 

  <?php $value = object_input_tag($nphojint, 'getNomemp', array (
  'readonly' => 'true',
  'size' => 80,
  'control_name' => 'nphojint[nomemp]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>

    
   <?php echo label_for('nphojint[nomcar]', __($labels['nphojint{nomcar}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('nphojint{nomcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{nomcar}')): ?>
    <?php echo form_error('nphojint{nomcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <br>

  <?php $value = object_input_tag($nphojint, 'getNomcar', array (
  'readonly' => 'true',
  'size' => 80,
  'control_name' => 'nphojint[nomcar]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>



<?php echo label_for('nphojint[desniv]', __($labels['nphojint{desniv}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('nphojint{desniv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{desniv}')): ?>
    <?php echo form_error('nphojint{desniv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <br>

  <?php $value = object_input_tag($nphojint, 'getDesniv', array (
  'readonly' => 'true',
  'size' => 80,
  'control_name' => 'nphojint[desniv]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>

<?php echo label_for('nphojint[codmotfal]', __($labels['nphojint{codmotfal}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codmotfal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codmotfal}')): ?>
    <?php echo form_error('nphojint{codmotfal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCodmotfal', array (
  'size' => 20,
  'control_name' => 'nphojint[codmotfal]',
  'maxlength' => 9,
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'url'      => 'nomfalperrep/grid',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$(this.id).value!=''",
        'script' => true,
        'with' => "'ajax=1&cajtexmos=nphojint_nomemp&codigo='+$('nphojint_codemp').value+'&codmot='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npmotfal_Nomfalpersal/clase/Npmotfal/frame/sf_admin_edit_form/obj1/nphojint_codmotfal/obj2/nphojint_desmotfal/campo1/codmotfal/campo2/desmotfal/param1/')?>

    </div>


  <div class="content<?php if ($sf_request->hasError('nphojint{desmotfal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{desmotfal}')): ?>
    <?php echo form_error('nphojint{desmotfal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <br>

  <?php $value = object_input_tag($nphojint, 'getDesmotfal', array (
  'readonly' => 'true',
  'size' => 80,
  'control_name' => 'nphojint[desmotfal]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>


    <br>

<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>


</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($nphojint->getId()): ?>
<?php endif; ?>
</li>
  </ul>
<script language="JavaScript">
	if($('nphojint_codemp').value!='')
	{
		$('nphojint_codemp').focus();
                $('nphojint_codmotfal').focus();
	}
	
</script>  