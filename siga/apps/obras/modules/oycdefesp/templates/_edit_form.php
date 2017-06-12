<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/25 18:01:48
?>
<?php echo form_tag('oycdefesp/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($octipesp, 'getId') ?>


<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('octipesp[codtipesp]', __($labels['octipesp{codtipesp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipesp{codtipesp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipesp{codtipesp}')): ?>
    <?php echo form_error('octipesp{codtipesp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipesp, 'getCodtipesp', array (
  'size' => 4,
  'maxlength' => 4,
  'control_name' => 'octipesp[codtipesp]',
  'readonly'  =>  $octipesp->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('octipesp_codtipesp').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div>    </div>
<br>
  <?php echo label_for('octipesp[destipesp]', __($labels['octipesp{destipesp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipesp{destipesp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipesp{destipesp}')): ?>
    <?php echo form_error('octipesp{destipesp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipesp, 'getDestipesp', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'octipesp[destipesp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('octipesp' => $octipesp)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($octipesp->getId()): ?>
<?php echo button_to(__('delete'), 'oycdefesp/delete?id='.$octipesp->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
