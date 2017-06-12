<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/01 21:02:19
?>
<?php echo form_tag('oycdefpro/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($octippro, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('octippro[codtippro]', __($labels['octippro{codtippro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octippro{codtippro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octippro{codtippro}')): ?>
    <?php echo form_error('octippro{codtippro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octippro, 'getCodtippro', array (
  'size' => 6,
  'maxlength' => 4,
  'control_name' => 'octippro[codtippro]',
  'readonly'  =>  $octippro->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('octippro_codtippro').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div>    </div>
<br>
  <?php echo label_for('octippro[destippro]', __($labels['octippro{destippro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octippro{destippro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octippro{destippro}')): ?>
    <?php echo form_error('octippro{destippro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octippro, 'getDestippro', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'octippro[destippro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('octippro' => $octippro)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($octippro->getId()): ?>
<?php echo button_to(__('delete'), 'oycdefpro/delete?id='.$octippro->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
