<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/25 17:32:02
?>
<?php echo form_tag('oycdefequ/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($ocdefequ, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('ocdefequ[codequ]', __($labels['ocdefequ{codequ}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefequ{codequ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefequ{codequ}')): ?>
    <?php echo form_error('ocdefequ{codequ}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefequ, 'getCodequ', array (
  'size' => 4,
  'maxlength' => 4,
  'control_name' => 'ocdefequ[codequ]',
  'readonly'  =>  $ocdefequ->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('ocdefequ_codequ').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
<br>
  <?php echo label_for('ocdefequ[desequ]', __($labels['ocdefequ{desequ}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefequ{desequ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefequ{desequ}')): ?>
    <?php echo form_error('ocdefequ{desequ}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefequ, 'getDesequ', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'ocdefequ[desequ]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocdefequ[codtipequ]', __($labels['ocdefequ{codtipequ}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocdefequ{codtipequ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocdefequ{codtipequ}')): ?>
    <?php echo form_error('ocdefequ{codtipequ}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocdefequ, 'getCodtipequ', array (
  'size' => 7,
  'control_name' => 'ocdefequ[codtipequ]',
  'maxlength' => 3,
  'onBlur'=> remote_function(array(
			  'url'      => 'oycdefequ/ajax',
              'before'   => 'var variable=document.getElementById("ocdefequ_codtipequ").value;variable=variable.pad(3, "0",0);document.getElementById("ocdefequ_codtipequ").value=variable;',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=1&cajtexcom=ocdefequ_codtipequ&cajtexmos=ocdefequ_destipequ&codigo='+this.value",
			  )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipequ_Oycdefequ/clase/Octipequ/frame/sf_admin_edit_form/obj1/ocdefequ_codtipequ/obj2/ocdefequ_destipequ/campo1/codtipequ/campo2/destipequ')?>

  <?php $value = object_input_tag($ocdefequ, 'getDestipequ', array (
  'disabled' => true,
  'size' => 80,
  'control_name' => 'ocdefequ[destipequ]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('ocdefequ' => $ocdefequ)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocdefequ->getId()): ?>
<?php echo button_to(__('delete'), 'oycdefequ/delete?id='.$ocdefequ->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
