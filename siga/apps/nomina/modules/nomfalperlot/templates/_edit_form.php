<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/21 14:46:34
?>
<?php echo form_tag('nomfalperlot/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>
<?php echo object_input_hidden_tag($npfalper, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npfalper[fecdes]', __($labels['npfalper{fecdes}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{fecdes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{fecdes}')): ?>
    <?php echo form_error('npfalper{fecdes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npfalper, 'getFecdes', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npfalper[fecdes]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npfalper[codnom]', __($labels['npfalper{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{codnom}')): ?>
    <?php echo form_error('npfalper{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getCodnom', array (
  'size' => 5,
  'control_name' => 'npfalper[codnom]',
  'maxlength' => 4,
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'url'      => 'nomfalperlot/grid',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexcom=npfalper_codnom&cajtexmos=npfalper_nomnom&codigo='+this.value+'&fecha='+document.getElementById('npfalper_fecdes').value",
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npnomina_Nomdiaext/clase/Npnomina/frame/sf_admin_edit_form/obj1/npfalper_codnom/obj2/npfalper_nomnom/campo1/codnom/campo2/nomnom/param1/')?>
&nbsp;


  <?php $value = object_input_tag($npfalper, 'getNomnom', array (
  'readonly' => true,
  'control_name' => 'npfalper[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>




<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>

</fieldset>

<?php include_partial('edit_actions', array('npfalper' => $npfalper)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npfalper->getId()): ?>
<?php echo button_to(__('delete'), 'nomfalperlot/delete?id='.$npfalper->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
