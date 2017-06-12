<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/24 18:34:07
?>
<?php echo form_tag('oycdefrec/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','compras/almordcom','ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($carecaud, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('carecaud[codrec]', __($labels['carecaud{codrec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carecaud{codrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carecaud{codrec}')): ?>
    <?php echo form_error('carecaud{codrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carecaud, 'getCodrec', array (
  'size' => 12,
  'maxlength' => 10,
  'control_name' => 'carecaud[codrec]',
  'readonly'  =>  $carecaud->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('carecaud_codrec').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('carecaud[desrec]', __($labels['carecaud{desrec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carecaud{desrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carecaud{desrec}')): ?>
    <?php echo form_error('carecaud{desrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carecaud, 'getDesrec', array (
  'size' => 80,
  'control_name' => 'carecaud[desrec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('carecaud[codtiprec]', __($labels['carecaud{codtiprec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carecaud{codtiprec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carecaud{codtiprec}')): ?>
    <?php echo form_error('carecaud{codtiprec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php $value = object_input_tag($carecaud, 'getCodtiprec', array (
  'size' => 5,
  'maxlength' => 4,
  'control_name' => 'carecaud[codtiprec]',
  'onBlur'=> remote_function(array(
			  'url'      => 'oycdefrec/ajax',
              'before'   => 'var variable=document.getElementById("carecaud_codtiprec").value;variable=variable.pad(4, "0",0);document.getElementById("carecaud_codtiprec").value=variable;',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=1&cajtexcom=carecaud_codtiprec&cajtexmos=carecaud_destiprec&codigo='+this.value",
			  )),
)); echo $value ? $value : '&nbsp;' ?>


 &nbsp;
 <?php echo  button_to_popup_('...','/metodo/Catiprec_Oycdefrec/clase/Catiprec/frame/sf_admin_edit_form/obj1/carecaud_codtiprec/obj2/carecaud_destiprec/campo1/codtiprec/campo2/destiprec')?>
 &nbsp;

  <?php $value = object_input_tag($carecaud, 'getDestiprec', array (
  'size' => 80,
  'control_name' => 'carecaud[destiprec]',
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div>
    </div>
<br>
  <?php echo label_for('carecaud[limrec]', __($labels['carecaud{limrec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carecaud{limrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carecaud{limrec}')): ?>
    <?php echo form_error('carecaud{limrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
	<?php
	if($carecaud->getLimrec()=='S')
	{
		$val = true;
	}
	else
	{
		$val = false;
	}
	?>
	<?php echo "Si ".radiobutton_tag('carecaud[limrec]', 'S', $val) ?>
	&nbsp;
	<?php echo "No ".radiobutton_tag('carecaud[limrec]', 'N', !$val) ?>
    </div>
<br>
  <?php echo label_for('carecaud[canutr]', __($labels['carecaud{canutr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carecaud{canutr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carecaud{canutr}')): ?>
    <?php echo form_error('carecaud{canutr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carecaud, array('getCanutr',true), array (
  'size' => 7,
  'control_name' => 'carecaud[canutr]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>&nbsp;&nbsp;UT
    </div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('carecaud' => $carecaud)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($carecaud->getId()): ?>
<?php echo button_to(__('delete'), 'oycdefrec/delete?id='.$carecaud->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
