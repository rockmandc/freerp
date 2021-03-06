<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 05:36:53
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoApliuser 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php echo form_tag('apliuser/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'return false;',
)) ?>

<?php echo object_input_hidden_tag($apli_user, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('apli_user[cedemp]', __($labels['apli_user{cedemp}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{cedemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{cedemp}')): ?>
    <?php echo form_error('apli_user{cedemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getCedemp', array (
  'disabled' => true,
  'control_name' => 'apli_user[cedemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('apli_user[nomuse]', __($labels['apli_user{nomuse}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{nomuse}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{nomuse}')): ?>
    <?php echo form_error('apli_user{nomuse}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getNomuse', array (
  'disabled' => true,
  'control_name' => 'apli_user[nomuse]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('apli_user[diremp]', __($labels['apli_user{diremp}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{diremp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{diremp}')): ?>
    <?php echo form_error('apli_user{diremp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getDiremp', array (
  'disabled' => true,
  'control_name' => 'apli_user[diremp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('apli_user[telemp]', __($labels['apli_user{telemp}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{telemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{telemp}')): ?>
    <?php echo form_error('apli_user{telemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getTelemp', array (
  'disabled' => true,
  'control_name' => 'apli_user[telemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('apli_user[loguse]', __($labels['apli_user{loguse}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{loguse}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{loguse}')): ?>
    <?php echo form_error('apli_user{loguse}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getLoguse', array (
  'size' => 50,
  'control_name' => 'apli_user[loguse]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('apli_user[pasuse]', __($labels['apli_user{pasuse}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{pasuse}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{pasuse}')): ?>
    <?php echo form_error('apli_user{pasuse}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getPasuse', array (
  'disabled' => true,
  'control_name' => 'apli_user[pasuse]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('apli_user[codapl]', __($labels['apli_user{codapl}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{codapl}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{codapl}')): ?>
    <?php echo form_error('apli_user{codapl}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getCodapl', array (
  'size' => 20,
  'control_name' => 'apli_user[codapl]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('apli_user[codemp]', __($labels['apli_user{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{codemp}')): ?>
    <?php echo form_error('apli_user{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getCodemp', array (
  'size' => 20,
  'control_name' => 'apli_user[codemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('apli_user[nomopc]', __($labels['apli_user{nomopc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{nomopc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{nomopc}')): ?>
    <?php echo form_error('apli_user{nomopc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getNomopc', array (
  'size' => 50,
  'control_name' => 'apli_user[nomopc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('apli_user[priuse]', __($labels['apli_user{priuse}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{priuse}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{priuse}')): ?>
    <?php echo form_error('apli_user{priuse}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getPriuse', array (
  'size' => 20,
  'control_name' => 'apli_user[priuse]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('apli_user[administrador]', __($labels['apli_user{administrador}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('apli_user{administrador}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apli_user{administrador}')): ?>
    <?php echo form_error('apli_user{administrador}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apli_user, 'getAdministrador', array (
  'disabled' => true,
  'control_name' => 'apli_user[administrador]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('apli_user' => $apli_user)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>
