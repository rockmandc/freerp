<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/17 17:34:11
?>
<?php echo form_tag('docpen/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($dfatendoc, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('dfatendoc[coddoc]', __($labels['dfatendoc{coddoc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dfatendoc{coddoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfatendoc{coddoc}')): ?>
    <?php echo form_error('dfatendoc{coddoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($dfatendoc, 'getCoddoc', array (
  'readonly' => true,
  'size' => 30,
  'control_name' => 'dfatendoc[coddoc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('dfatendoc[id_dftabtip]', __($labels['dfatendoc{id_dftabtip}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dfatendoc{id_dftabtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfatendoc{id_dftabtip}')): ?>
    <?php echo form_error('dfatendoc{id_dftabtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = input_tag('dftabtip[tipdoc]',$dfatendoc->getTipdoc(), array (
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('dfatendoc[desdoc]', __($labels['dfatendoc{desdoc}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dfatendoc{desdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfatendoc{desdoc}')): ?>
    <?php echo form_error('dfatendoc{desdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($dfatendoc, 'getDesdoc', array (
  'cols' => 60,
  'rows' => 3,
  'readonly' => true,
  'control_name' => 'dfatendoc[desdoc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('dfatendoc[status]', __($labels['dfatendoc{status}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dfatendoc{status}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfatendoc{status}')): ?>
    <?php echo form_error('dfatendoc{status}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($dfatendoc, 'getStatus', array (
  'readonly' => true,
  'size' => 50,
  'control_name' => 'dfatendoc[status]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('dfatendoc[anuate]', __($labels['dfatendoc{anuate}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dfatendoc{anuate}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfatendoc{anuate}')): ?>
    <?php echo form_error('dfatendoc{anuate}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = $dfatendoc->getAnuate(); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('dfatendocdet[desate]', __($labels['dfatendocdet{desate}']), 'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('dfatendocdet{desate}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfatendocdet{desate}')): ?>
    <?php echo form_error('dfatendocdet{desate}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($dfatendoc, 'getDesate', array (
  'rows' => '4',
  'cols' => '60',
  'control_name' => 'dfatendocdet[desate]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('dfatendocdet[id_dfmedtra]', __($labels['dfatendocdet{id_dfmedtra}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('dfatendocdet{id_dfmedtra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfatendocdet{id_dfmedtra}')): ?>
    <?php echo form_error('dfatendocdet{id_dfmedtra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($dfatendocdet, 'getIdDfmedtra', array (
  'related_class' => 'Dfmedtra',
  'control_name' => 'dfatendocdet[id_dfmedtra]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('dfatendocdet[diaent]', __($labels['dfatendocdet{diaent}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('dfatendocdet{diaent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('dfatendocdet{diaent}')): ?>
    <?php echo form_error('dfatendocdet{diaent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($dfatendocdet, 'getDiaent', array (
  'size' => 7,
  'control_name' => 'dfatendocdet[diaent]',
  'value' => '0',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('dfatendoc' => $dfatendoc)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($dfatendoc->getId()): ?>
<?php echo button_to(__('Anular'), 'docpen/delete?id='.$dfatendoc->getId(), array (
  'post' => true,
  'confirm' => __('¿Desea Anular este Documento?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
