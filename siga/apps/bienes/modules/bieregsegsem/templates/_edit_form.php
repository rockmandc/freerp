<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/31 09:27:11
?>
<?php echo form_tag('bieregsegsem/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bnsegsem, 'getId') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('ajax') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('bnsegsem[codact]', __($labels['bnsegsem{codact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegsem{codact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegsem{codact}')): ?>
    <?php echo form_error('bnsegsem{codact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('bnsegsem[codact]', $bnsegsem->getCodact(),
    'bieregsegsem/autocomplete?ajax=1', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'bieregsegsem/ajax',
      'complete' => 'AjaxJSON(request, json)',
          'script'   => true,
       'with' => "'ajax=1&cajtexmos=bnsegsem_codsem&cajtexcom=bnsegsem_codact&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnregsem_Bieregseginm/clase/Bnregsem/frame/sf_admin_edit_form/obj1/bnsegsem_codact/obj2/bnsegsem_codsem/obj3/dessem/campo1/codact/campo2/codsem/campo3/dessem'); ?>

  <?php echo input_tag('dessem', $bnsegsem->getDessem(),'size= 90 readonly=true') ?>

    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnsegsem[codsem]', __($labels['bnsegsem{codsem}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegsem{codsem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegsem{codsem}')): ?>
    <?php echo form_error('bnsegsem{codsem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnsegsem, 'getCodsem', array (
  'size' => 20,
  'control_name' => 'bnsegsem[codsem]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnsegsem[nrosegsem]', __($labels['bnsegsem{nrosegsem}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegsem{nrosegsem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegsem{nrosegsem}')): ?>
    <?php echo form_error('bnsegsem{nrosegsem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('bnsegsem[nrosegsem]', $bnsegsem->getNrosegsem(),
    'bieregsegsem/autocomplete?ajax=3', array('size' => 6, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'bieregsegsem/ajax',
      'complete' => 'AjaxJSON(request, json)',
          'script'   => true,
       'with' => "'ajax=2&cajtexcom=bnsegsem_nrosegsem&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnsegsem[fecsegsem]', __($labels['bnsegsem{fecsegsem}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegsem{fecsegsem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegsem{fecsegsem}')): ?>
    <?php echo form_error('bnsegsem{fecsegsem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bnsegsem, 'getFecsegsem', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnsegsem[fecsegsem]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnsegsem[nomsegsem]', __($labels['bnsegsem{nomsegsem}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegsem{nomsegsem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegsem{nomsegsem}')): ?>
    <?php echo form_error('bnsegsem{nomsegsem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnsegsem, 'getNomsegsem', array (
  'size' => 80,
  'control_name' => 'bnsegsem[nomsegsem]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnsegsem[cobsegsem]', __($labels['bnsegsem{cobsegsem}']), 'class="required"class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegsem{cobsegsem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegsem{cobsegsem}')): ?>
    <?php echo form_error('bnsegsem{cobsegsem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('bnsegsem[cobsegsem]', $bnsegsem->getCobsegsem(),
    'bieregsegsem/autocomplete?ajax=2', array('size' => 4, 'maxlength' => 4, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'bieregsegsem/ajax',
      'complete' => 'AjaxJSON(request, json)',
          'script'   => true,
       'with' => "'ajax=3&cajtexmos=bnsegsem_cobsegsem&cajtexcom=descob&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>
    <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bncobseg_Bieregseginm/clase/Bncobseg/frame/sf_admin_edit_form/obj1/bnsegsem_cobsegsem/obj2/descob/campo1/codcob/campo2/descob'); ?>

    <?php echo input_tag('descob', $bnsegsem->getDescob(),'size= 90') ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnsegsem[monsegsem]', __($labels['bnsegsem{monsegsem}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegsem{monsegsem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegsem{monsegsem}')): ?>
    <?php echo form_error('bnsegsem{monsegsem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnsegsem, 'getMonsegsem', array (
  'size' => 7,
  'control_name' => 'bnsegsem[monsegsem]',
  'onKeyPress' => "javascript:return entermontootro(event, this.id,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnsegsem[fecsegven]', __($labels['bnsegsem{fecsegven}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegsem{fecsegven}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegsem{fecsegven}')): ?>
    <?php echo form_error('bnsegsem{fecsegven}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bnsegsem, 'getFecsegven', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnsegsem[fecsegven]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnsegsem[prosegsem]', __($labels['bnsegsem{prosegsem}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegsem{prosegsem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegsem{prosegsem}')): ?>
    <?php echo form_error('bnsegsem{prosegsem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnsegsem, 'getProsegsem', array (
  'size' => 50,
  'control_name' => 'bnsegsem[prosegsem]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnsegsem[obssegsem]', __($labels['bnsegsem{obssegsem}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegsem{obssegsem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegsem{obssegsem}')): ?>
    <?php echo form_error('bnsegsem{obssegsem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($bnsegsem, 'getObssegsem', array (
  'size' => '80x3',
  'control_name' => 'bnsegsem[obssegsem]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('bnsegsem' => $bnsegsem)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bnsegsem->getId()): ?>
<?php echo button_to(__('delete'), 'bieregsegsem/delete?id='.$bnsegsem->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
