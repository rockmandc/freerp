<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 06:10:26
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoNomasicarconnom 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php echo form_tag('nomasicarconnom/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'return false;',
)) ?>

<?php echo object_input_hidden_tag($npasicaremp, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npasicaremp[codemp]', __($labels['npasicaremp{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codemp}')): ?>
    <?php echo form_error('npasicaremp{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodemp', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[nomemp]', __($labels['npasicaremp{nomemp}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{nomemp}')): ?>
    <?php echo form_error('npasicaremp{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getNomemp', array (
  'size' => 80,
  'control_name' => 'npasicaremp[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codnom]', __($labels['npasicaremp{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codnom}')): ?>
    <?php echo form_error('npasicaremp{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodnom', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codnom]',
  'maxlength' => 3,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[nomnom]', __($labels['npasicaremp{nomnom}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{nomnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{nomnom}')): ?>
    <?php echo form_error('npasicaremp{nomnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getNomnom', array (
  'size' => 80,
  'control_name' => 'npasicaremp[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codcar]', __($labels['npasicaremp{codcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codcar}')): ?>
    <?php echo form_error('npasicaremp{codcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodcar', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[nomcar]', __($labels['npasicaremp{nomcar}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{nomcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{nomcar}')): ?>
    <?php echo form_error('npasicaremp{nomcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getNomcar', array (
  'size' => 80,
  'control_name' => 'npasicaremp[nomcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[paso]', __($labels['npasicaremp{paso}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{paso}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{paso}')): ?>
    <?php echo form_error('npasicaremp{paso}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getPaso', array (
  'size' => 20,
  'control_name' => 'npasicaremp[paso]',
  'maxlength' => 3,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[despaso]', __($labels['npasicaremp{despaso}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{despaso}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{despaso}')): ?>
    <?php echo form_error('npasicaremp{despaso}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getDespaso', array (
  'disabled' => true,
  'control_name' => 'npasicaremp[despaso]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[fecasi]', __($labels['npasicaremp{fecasi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{fecasi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{fecasi}')): ?>
    <?php echo form_error('npasicaremp{fecasi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npasicaremp, 'getFecasi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npasicaremp[fecasi]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codtipgas]', __($labels['npasicaremp{codtipgas}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codtipgas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codtipgas}')): ?>
    <?php echo form_error('npasicaremp{codtipgas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodtipgas', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codtipgas]',
  'maxlength' => 3,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[destipgas]', __($labels['npasicaremp{destipgas}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{destipgas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{destipgas}')): ?>
    <?php echo form_error('npasicaremp{destipgas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getDestipgas', array (
  'disabled' => true,
  'control_name' => 'npasicaremp[destipgas]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codcat]', __($labels['npasicaremp{codcat}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codcat}')): ?>
    <?php echo form_error('npasicaremp{codcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodcat', array (
  'size' => 32,
  'control_name' => 'npasicaremp[codcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[nomcat]', __($labels['npasicaremp{nomcat}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{nomcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{nomcat}')): ?>
    <?php echo form_error('npasicaremp{nomcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getNomcat', array (
  'size' => 80,
  'control_name' => 'npasicaremp[nomcat]',
  'maxlength' => 3,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codtipded]', __($labels['npasicaremp{codtipded}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codtipded}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codtipded}')): ?>
    <?php echo form_error('npasicaremp{codtipded}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodtipded', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codtipded]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codtipcat]', __($labels['npasicaremp{codtipcat}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codtipcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codtipcat}')): ?>
    <?php echo form_error('npasicaremp{codtipcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodtipcat', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codtipcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codtie]', __($labels['npasicaremp{codtie}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codtie}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codtie}')): ?>
    <?php echo form_error('npasicaremp{codtie}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodtie', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codtie]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codcen]', __($labels['npasicaremp{codcen}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codcen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codcen}')): ?>
    <?php echo form_error('npasicaremp{codcen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodcen', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codcen]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[nivel]', __($labels['npasicaremp{nivel}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{nivel}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{nivel}')): ?>
    <?php echo form_error('npasicaremp{nivel}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getNivel', array (
  'disabled' => true,
  'control_name' => 'npasicaremp[nivel]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codtipcar]', __($labels['npasicaremp{codtipcar}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codtipcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codtipcar}')): ?>
    <?php echo form_error('npasicaremp{codtipcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodtipcar', array (
  'disabled' => true,
  'control_name' => 'npasicaremp[codtipcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[grado]', __($labels['npasicaremp{grado}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{grado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{grado}')): ?>
    <?php echo form_error('npasicaremp{grado}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getGrado', array (
  'size' => 20,
  'control_name' => 'npasicaremp[grado]',
  'maxlength' => 3,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[carlibnom]', __($labels['npasicaremp{carlibnom}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{carlibnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{carlibnom}')): ?>
    <?php echo form_error('npasicaremp{carlibnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($npasicaremp, 'getCarlibnom', array (
  'control_name' => 'npasicaremp[carlibnom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[sueldocar]', __($labels['npasicaremp{sueldocar}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{sueldocar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{sueldocar}')): ?>
    <?php echo form_error('npasicaremp{sueldocar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getSueldocar', array (
  'disabled' => true,
  'control_name' => 'npasicaremp[sueldocar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codtipemp]', __($labels['npasicaremp{codtipemp}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codtipemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codtipemp}')): ?>
    <?php echo form_error('npasicaremp{codtipemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodtipemp', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codtipemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codnivc]', __($labels['npasicaremp{codnivc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codnivc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codnivc}')): ?>
    <?php echo form_error('npasicaremp{codnivc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodnivc', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codnivc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[codeve]', __($labels['npasicaremp{codeve}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codeve}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codeve}')): ?>
    <?php echo form_error('npasicaremp{codeve}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodeve', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codeve]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npasicaremp[numpta]', __($labels['npasicaremp{numpta}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{numpta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{numpta}')): ?>
    <?php echo form_error('npasicaremp{numpta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getNumpta', array (
  'disabled' => true,
  'control_name' => 'npasicaremp[numpta]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('npasicaremp' => $npasicaremp)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npasicaremp->getId()): ?>
<?php echo button_to(__('delete'), 'nomasicarconnom/delete?id='.$npasicaremp->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
