<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/06/30 15:24:25
?>
<?php echo form_tag('oycregact/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocregact, 'getId') ?>
<?php echo javascript_include_tag('ajax','tools','dFilter','observe') ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Contrato')?></legend>
<div class="form-row">
  <?php echo label_for('ocregact[codcon]', __($labels['ocregact{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{codcon}')): ?>
    <?php echo form_error('ocregact{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('ocregact[codcon]', $ocregact->getCodcon(),
    'oycregact/autocomplete?ajax=1', array('autocomplete' => 'off',
	'maxlength' => 32,
    'size' => 15,
    'readonly'  =>  $ocregact->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
    'url'      => 'oycregact/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('ocregact_codcon').value != '' && $('id').value == ''",
    'with' => "'ajax=1&cajtexmos=ocregact_descon&cajtexcom=ocregact_codcon&codigo='+this.value"
    ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ocregcon_Oycregact/clase/Ocregcon/frame/sf_admin_edit_form/obj1/ocregact_codcon/obj2/ocregact_descon/campo1/codcon/campo2/descon','','','botoncat')?>

  <?php $value = object_input_tag($ocregact, 'getDescon', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocregact[descon]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
  <?php echo label_for('ocregact[codobr]', __($labels['ocregact{codobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{codobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{codobr}')): ?>
    <?php echo form_error('ocregact{codobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregact, 'getCodobr', array (
  'readonly' => true,
  'control_name' => 'ocregact[codobr]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($ocregact, 'getDesobr', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocregact[desobr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregact[codpro]', __($labels['ocregact{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{codpro}')): ?>
    <?php echo form_error('ocregact{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregact, 'getCodpro', array (
  'disabled' => true,
  'control_name' => 'ocregact[codpro]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($ocregact, 'getNompro', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocregact[nompro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>
<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Datos del Acta');?>
<fieldset>
<div class="form-row">
  <?php echo label_for('ocregact[codtipact]', __($labels['ocregact{codtipact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{codtipact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{codtipact}')): ?>
    <?php echo form_error('ocregact{codtipact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('ocregact[codtipact]', $ocregact->getCodtipact(),
    'oycregact/autocomplete?ajax=2', array('autocomplete' => 'off',
	'maxlength' => 4,
    'size' => 10,
    'onBlur'=> remote_function(array(
    'url'      => 'oycregact/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('ocregact_codtipact').value != ''",
    'with' => "'ajax=2&cajtexmos=ocregact_destipact&cajtexcom=ocregact_codtipact&codigo='+this.value"
    ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipact_Oycdefemp/clase/Octipact/frame/sf_admin_edit_form/obj1/ocregact_codtipact/obj2/ocregact_destipact/campo1/codtipact/campo2/destipact','','','botoncat')?>

  <?php $value = object_input_tag($ocregact, 'getDestipact', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocregact[destipact]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
 <table>
 <tr>
  <th>
  <?php echo label_for('ocregact[numofi]', __($labels['ocregact{numofi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{numofi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{numofi}')): ?>
    <?php echo form_error('ocregact{numofi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregact, 'getNumofi', array (
  'size' => 15,
  'maxlength' => 15,
  'control_name' => 'ocregact[numofi]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
</th>
<th>
  <?php echo label_for('ocregact[fecact]', __($labels['ocregact{fecact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{fecact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{fecact}')): ?>
    <?php echo form_error('ocregact{fecact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregact, 'getFecact', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregact[fecact]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
<br>
  <?php echo label_for('ocregact[obsact]', __($labels['ocregact{obsact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{obsact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{obsact}')): ?>
    <?php echo form_error('ocregact{obsact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($ocregact, 'getObsact', array (
  'size' => '60x5',
  'maxlength' => 100,
  'control_name' => 'ocregact[obsact]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Personal Autorizado');?>
<fieldset>
<div class="form-row">
  <?php echo label_for('ocregact[cedins]', __($labels['ocregact{cedins}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{cedins}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{cedins}')): ?>
    <?php echo form_error('ocregact{cedins}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregact, 'getCedins', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'ocregact[cedins]',
  'onBlur'=> remote_function(array(
      'url'      => 'oycregact/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('ocregact_cedins').value != '' && $('id').value == ''",
      'with' => "'ajax=3&cajtexmos=ocregact_nomins&cajtexcom=ocregact_cedins&obra='+$('ocregact_codobr').value+'&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Ocinginsobr_Oycregact/clase/Ocinginsobr/frame/sf_admin_edit_form/obj1/ocregact_cedins/obj2/ocregact_nomins/campo1/cedins/campo2/nomins/param1/'+$('ocregact_codobr').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($ocregact, 'getNomins', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocregact[nomins]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregact[cedtec]', __($labels['ocregact{cedtec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{cedtec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{cedtec}')): ?>
    <?php echo form_error('ocregact{cedtec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('ocregact[cedtec]', $ocregact->getCedtec(),
    'oycregact/autocomplete?ajax=3', array('autocomplete' => 'off',
	'maxlength' => 15,
    'size' => 20,
    'onBlur'=> remote_function(array(
    'url'      => 'oycregact/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('ocregact_cedtec').value != ''",
    'with' => "'ajax=5&cajtexmos=ocregact_nomtec&cajtexcom=ocregact_cedtec&codigo='+this.value"
    ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Nomasicarconnom/clase/Nphojint/frame/sf_admin_edit_form/obj1/ocregact_cedtec/obj2/ocregact_nomtec/campo1/codemp/campo2/nomemp','','','botoncat')?>

  <?php $value = object_input_tag($ocregact, 'getNomtec', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocregact[nomtec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregact[cedfis]', __($labels['ocregact{cedfis}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{cedfis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{cedfis}')): ?>
    <?php echo form_error('ocregact{cedfis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php echo input_auto_complete_tag('ocregact[cedfis]', $ocregact->getCedfis(),
    'oycregact/autocomplete?ajax=4', array('autocomplete' => 'off',
	'maxlength' => 15,
    'size' => 20,
    'onBlur'=> remote_function(array(
    'url'      => 'oycregact/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('ocregact_cedfis').value != ''",
    'with' => "'ajax=5&cajtexmos=ocregact_nomdir&cajtexcom=ocregact_cedfis&codigo='+this.value"
    ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Nomasicarconnom/clase/Nphojint/frame/sf_admin_edit_form/obj1/ocregact_cedfis/obj2/ocregact_nomdir/campo1/codemp/campo2/nomemp','','','botoncat')?>

  <?php $value = object_input_tag($ocregact, 'getNomdir', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocregact[nomdir]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregact[cedres]', __($labels['ocregact{cedres}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{cedres}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{cedres}')): ?>
    <?php echo form_error('ocregact{cedres}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregact, 'getCedres', array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'ocregact[cedres]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;

  <?php $value = object_input_tag($ocregact, 'getNomper', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocregact[nomper]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregact[cedtop]', __($labels['ocregact{cedtop}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregact{cedtop}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregact{cedtop}')): ?>
    <?php echo form_error('ocregact{cedtop}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregact, 'getCedtop', array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'ocregact[cedtop]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;

  <?php $value = object_input_tag($ocregact, 'getNomtop', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocregact[nomtop]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Historial de Actas');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo grid_tag($obj);?>
</div>
</fieldset>

<?php tabInit('tp1','0');?>

<?php include_partial('edit_actions', array('ocregact' => $ocregact)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocregact->getId()): ?>
<?php echo button_to(__('delete'), 'oycregact/delete?id='.$ocregact->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
