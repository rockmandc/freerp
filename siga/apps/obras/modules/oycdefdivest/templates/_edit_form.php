<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/31 12:32:58
?>
<?php echo form_tag('oycdefdivest/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('Grid') ?>
<?php echo javascript_include_tag('dFilter','observe') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>
<?php use_helper('tabs') ?>
<?php echo object_input_hidden_tag($ocestado, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('ocestado[codpai]', __($labels['ocestado{codpai}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocestado{codpai}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocestado{codpai}')): ?> <?php echo form_error('ocestado{codpai}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php echo select_tag('ocestado[codpai]', options_for_select($pais,$ocestado->getCodpai(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'url'      => 'oycdefdivest/combo?par=1',
		'with' => "'pais='+this.value"
  ))));?>
</div>
<br>
  <?php echo label_for('ocestado[codedo]', __($labels['ocestado{codedo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocestado{codedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocestado{codedo}')): ?>
    <?php echo form_error('ocestado{codedo}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_tag($ocestado, 'getCodedo', array (
    'size' => 5,
    'maxlength' => 4,
    'control_name' => 'ocestado[codedo]',
    'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('ocestado_codedo').value=valor;document.getElementById('ocestado_codedo').disabled=false;",
    )); echo $value ? $value : '&nbsp;' ?>

   </div>
<br>
  <?php echo label_for('ocestado[nomedo]', __($labels['ocestado{nomedo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocestado{nomedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocestado{nomedo}')): ?>
    <?php echo form_error('ocestado{nomedo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocestado, 'getNomedo', array (
  'size' => 30,
  'control_name' => 'ocestado[nomedo]',
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('ocestado' => $ocestado)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocestado->getId()): ?>
<?php echo button_to(__('delete'), 'oycdefdivest/delete?id='.$ocestado->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
