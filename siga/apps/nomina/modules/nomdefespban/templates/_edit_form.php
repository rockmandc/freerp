<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/17 11:55:54
?>
<?php echo form_tag('nomdefespban/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npbancos, 'getId') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Banco') ?></legend>
<div class="form-row">
  <?php echo label_for('npbancos[codban]', __($labels['npbancos{codban}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npbancos{codban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npbancos{codban}')): ?>
    <?php echo form_error('npbancos{codban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npbancos, 'getCodban', array (
  'size' => 2,
  'control_name' => 'npbancos[codban]',
  'maxlength' => '2,',
  'readonly'  =>  $npbancos->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(2, '0',0);$('npbancos_codban').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npbancos[nomban]', __($labels['npbancos{nomban}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npbancos{nomban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npbancos{nomban}')): ?>
    <?php echo form_error('npbancos{nomban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npbancos, 'getNomban', array (
  'size' => 60,
  'maxlength' => 30,
  'control_name' => 'npbancos[nomban]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npbancos[codbanele]', __($labels['npbancos{codbanele}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npbancos{codbanele}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npbancos{codbanele}')): ?>
    <?php echo form_error('npbancos{codbanele}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npbancos, 'getCodbanele', array (
  'size' => 5,
  'maxlength' => 2,
  'control_name' => 'npbancos[codbanele]',
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
