<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 17:29:54
?>
<?php echo form_tag('nomdeftipret/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($nptipret, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de los Tipos de Retiros')?></legend>
<div class="form-row">
  <?php echo label_for('nptipret[codret]', __($labels['nptipret{codret}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nptipret{codret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipret{codret}')): ?>
    <?php echo form_error('nptipret{codret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptipret, 'getCodret', array (
  'size' => 5,
  'maxlength' => '2',
  'readonly'  =>  $nptipret->getId()!='' ? true : false ,
  'control_name' => 'nptipret[codret]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('nptipret[desret]', __($labels['nptipret{desret}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nptipret{desret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipret{desret}')): ?>
    <?php echo form_error('nptipret{desret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptipret, 'getDesret', array (
  'size' => 50,
  'maxlength' => '50',
  'control_name' => 'nptipret[desret]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('nptipret' => $nptipret)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($nptipret->getId()): ?>
<?php echo button_to(__('delete'), 'nomdeftipret/delete?id='.$nptipret->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
