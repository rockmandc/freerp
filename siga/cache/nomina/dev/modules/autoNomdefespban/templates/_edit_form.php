<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 05:45:12
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoNomdefespban 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php echo form_tag('nomdefespban/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'return false;',
)) ?>

<?php echo object_input_hidden_tag($npbancos, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npbancos[codban]', __($labels['npbancos{codban}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npbancos{codban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npbancos{codban}')): ?>
    <?php echo form_error('npbancos{codban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npbancos, 'getCodban', array (
  'size' => 2,
  'control_name' => 'npbancos[codban]',
  'maxlength' => 2,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npbancos[nomban]', __($labels['npbancos{nomban}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npbancos{nomban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npbancos{nomban}')): ?>
    <?php echo form_error('npbancos{nomban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npbancos, 'getNomban', array (
  'size' => 20,
  'control_name' => 'npbancos[nomban]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npbancos[codbanele]', __($labels['npbancos{codbanele}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npbancos{codbanele}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npbancos{codbanele}')): ?>
    <?php echo form_error('npbancos{codbanele}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npbancos, 'getCodbanele', array (
  'size' => 5,
  'control_name' => 'npbancos[codbanele]',
  'maxlength' => 2,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('npbancos' => $npbancos)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npbancos->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefespban/delete?id='.$npbancos->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
