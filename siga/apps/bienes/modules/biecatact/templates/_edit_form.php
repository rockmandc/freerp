<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/01 10:02:07
?>
<?php echo form_tag('biecatact/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('tools','observe','dFilter','ajax') ?>
<?php echo object_input_hidden_tag($bndefact, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('bndefact[codact]', __($labels['bndefact{codact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndefact{codact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefact{codact}')): ?>
    <?php echo form_error('bndefact{codact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndefact, 'getCodact', array (
  'size' => 30,
  'control_name' => 'bndefact[codact]',
  'maxlength' => $lonact,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$foract')",
  'readonly' => $bndefact->getId()!='' ? true : false ,
'onBlur'=> remote_function(array(
          'url'      => 'biecatact/ajax',
          'condition' => "$('bndefact_codact').value != '' && $('id').value == ''",
          'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=2&cajtexcom=bndefact_codact&codigo='+this.value",
    )),
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bndefact[desact]', __($labels['bndefact{desact}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bndefact{desact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefact{desact}')): ?>
    <?php echo form_error('bndefact{desact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndefact, 'getDesact', array (
  'size' => 80,
  'control_name' => 'bndefact[desact]',
  'maxlength'=>250,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bndefact[viduti]', __($labels['bndefact{viduti}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bndefact{viduti}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefact{viduti}')): ?>
    <?php echo form_error('bndefact{viduti}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndefact, array('getViduti',true), array (
  'size' => 7,
  'control_name' => 'bndefact[viduti]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bndefact[canact]', __($labels['bndefact{canact}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bndefact{canact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefact{canact}')): ?>
    <?php echo form_error('bndefact{canact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndefact, array('getCanact',true), array (
  'size' => 7,
  'control_name' => 'bndefact[canact]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('bndefact' => $bndefact)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bndefact->getId()): ?>
<?php echo button_to(__('delete'), 'biecatact/delete?id='.$bndefact->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
