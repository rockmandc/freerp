<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/19 12:53:43
?>
<?php echo form_tag('nomdefespguarde/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npguarde, 'getId') ?>
<?php echo javascript_include_tag('ajax','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Guarderias') ?></legend>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('npguarde[codcon]', __($labels['npguarde{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npguarde{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npguarde{codcon}')): ?>
    <?php echo form_error('npguarde{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('npguarde[codcon]', $npguarde->getCodcon(),
    'nomdefespguarde/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => '3', 'size'	=> '5',
	'onBlur'=> remote_function(array(

              'condition' => "$('npguarde_codcon').value != '' 	",
			  'url'      => 'nomdefespguarde/ajax',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=1&cajtexmos=npguarde_nomcon&cajtexcom=npguarde_codcon&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?>
 </div>
</th>
<th>
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npdefcpt_nomdefespguarde/clase/Npdefcpt/frame/sf_admin_edit_form/obj1/npguarde_codcon/obj2/npguarde_nomcon')?>
  </th>
<th>
<?php $value = object_input_tag($npguarde, 'getNomcon', array (
  'readonly' => true,
  'size'=> 30,
  'control_name' => 'npguarde[nomcon]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>

<br>

<?php echo label_for('npguarde[nomgua]', __($labels['npguarde{nomgua}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npguarde{nomgua}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npguarde{nomgua}')): ?>
    <?php echo form_error('npguarde{nomgua}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npguarde, 'getNomgua', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'npguarde[nomgua]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npguarde[rifgua]', __($labels['npguarde{rifgua}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npguarde{rifgua}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npguarde{rifgua}')): ?>
    <?php echo form_error('npguarde{rifgua}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npguarde, 'getRifgua', array (
  'size' => 20,
  'control_name' => 'npguarde[rifgua]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
  <?php echo label_for('npguarde[ninsme]', __($labels['npguarde{ninsme}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npguarde{ninsme}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npguarde{ninsme}')): ?>
    <?php echo form_error('npguarde{ninsme}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npguarde, 'getNinsme', array (
  'size' => 20,
  'control_name' => 'npguarde[ninsme]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
  <?php echo label_for('npguarde[solmevig]', __($labels['npguarde{solmevig}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('npguarde{solmevig}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npguarde{solmevig}')): ?>
    <?php echo form_error('npguarde{solmevig}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($npguarde, 'getSolmevig', array (
  'control_name' => 'npguarde[solmevig]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
</div>
</fieldset>

<?php include_partial('edit_actions', array('npguarde' => $npguarde)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npguarde->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefespguarde/delete?id='.$npguarde->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
