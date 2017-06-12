<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/03 11:12:03
?>
<?php echo form_tag('oycinscon/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocinscon, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe','obras/ofertas') ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Contrato')?></legend>
<div class="form-row">
  <?php echo label_for('ocinscon[codcon]', __($labels['ocinscon{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocinscon{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocinscon{codcon}')): ?>
    <?php echo form_error('ocinscon{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php echo input_auto_complete_tag('ocinscon[codcon]', $ocinscon->getCodcon(),
    'oycinscon/autocomplete?ajax=1', array('autocomplete' => 'off',
	'maxlength' => 32,
    'size' => 15,
    'readonly'  =>  $ocinscon->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
    'url'      => 'oycinscon/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('ocinscon_codcon').value != '' && $('id').value == ''",
    'with' => "'ajax=1&cajtexmos=ocinscon_descon&cajtexcom=ocinscon_codcon&codigo='+this.value"
    ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ocregcon_Oycregact/clase/Ocregcon/frame/sf_admin_edit_form/obj1/ocinscon_codcon/obj2/ocinscon_descon/obj3/ocinscon_stacon/campo1/codcon/campo2/descon/campo3/stacon','','','botoncat')?>

  <?php $value = object_input_tag($ocinscon, 'getDescon', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocinscon[descon]',
)); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('ocinscon[stacon]', $ocinscon->getStacon()) ?>
    </div>
<br>

  <?php echo label_for('ocinscon[codobr]', __($labels['ocinscon{codobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocinscon{codobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocinscon{codobr}')): ?>
    <?php echo form_error('ocinscon{codobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocinscon, 'getCodobr', array (
  'disabled' => true,
  'control_name' => 'ocinscon[codobr]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($ocinscon, 'getDesobr', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocinscon[desobr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('ocinscon[codpro]', __($labels['ocinscon{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocinscon{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocinscon{codpro}')): ?>
    <?php echo form_error('ocinscon{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocinscon, 'getCodpro', array (
  'disabled' => true,
  'control_name' => 'ocinscon[codpro]',
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
  <?php $value = object_input_tag($ocinscon, 'getNompro', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocinscon[nompro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('ocinscon[codtipins]', __($labels['ocinscon{codtipins}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocinscon{codtipins}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocinscon{codtipins}')): ?>
    <?php echo form_error('ocinscon{codtipins}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('ocinscon[codtipins]', $ocinscon->getCodtipins(),
    'oycinscon/autocomplete?ajax=2', array('autocomplete' => 'off',
	'maxlength' => 4,
    'size' => 10,
    'readonly'  =>  $ocinscon->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
    'url'      => 'oycinscon/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('ocinscon_codtipins').value != '' && $('id').value == ''",
    'with' => "'ajax=5&cajtexmos=ocinscon_destipins&cajtexcom=ocinscon_codtipins&codigo='+this.value"
    ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipins_Oycdefemp/clase/Octipins/frame/sf_admin_edit_form/obj1/ocinscon_codtipins/obj2/ocinscon_destipins/campo1/codtipins/campo2/destipins','','','botoncat')?>

  <?php $value = object_input_tag($ocinscon, 'getDestipins', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'ocinscon[destipins]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <?php echo label_for('ocinscon[numins]', __($labels['ocinscon{numins}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocinscon{numins}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocinscon{numins}')): ?>
    <?php echo form_error('ocinscon{numins}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocinscon, 'getNumins', array (
  'size' => 20,
  'readonly'  =>  $ocinscon->getId()!='' ? true : false ,
  'control_name' => 'ocinscon[numins]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('ocinscon_numins').value=valor; verificar();",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<table>
<tr>
<th>
  <?php echo label_for('ocinscon[feccom]', __($labels['ocinscon{feccom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocinscon{feccom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocinscon{feccom}')): ?>
    <?php echo form_error('ocinscon{feccom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocinscon, 'getFeccom', array (
  'rich' => true,
  'maxlength' => 10,
  'readonly'  =>  $ocinscon->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocinscon[feccom]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'oycinscon/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('id').value == ''",
        'with' => "'ajax=3&numcon='+$('ocinscon_codcon').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocinscon[fecter]', __($labels['ocinscon{fecter}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocinscon{fecter}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocinscon{fecter}')): ?>
    <?php echo form_error('ocinscon{fecter}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocinscon, 'getFecter', array (
  'rich' => true,
  'maxlength' => 10,
  'readonly'  =>  $ocinscon->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocinscon[fecter]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'oycinscon/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('id').value == ''",
        'with' => "'ajax=4&fecini='+$('ocinscon_feccom').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr></table>

<br>

  <?php echo label_for('ocinscon[portietra]', __($labels['ocinscon{portietra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocinscon{portietra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocinscon{portietra}')): ?>
    <?php echo form_error('ocinscon{portietra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocinscon, array('getPortietra',true), array (
  'size' => 7,
  'readonly' => true,
  'control_name' => 'ocinscon[portietra]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br><br>

<?php echo grid_tag($obj);?>

<br>
<?php echo label_for('',__('Total Ejecutado') , 'class="required" Style="width:100px"') ?>
<?php echo input_tag('ocinscon[toteje]',$ocinscon->getToteje(), 'size=15 class=grid_txtright readonly=true value=0,00') ?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('ocinscon' => $ocinscon)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocinscon->getId()): ?>
<?php echo button_to(__('delete'), 'oycinscon/delete?id='.$ocinscon->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script language="JavaScript" type="text/javascript">
   var nuevo='<?php echo $ocinscon->getId();?>';
   if (nuevo!="")
   {
     actualizarsaldos();
     $$('.botoncat')[0].disabled=true;
     $$('.botoncat')[1].disabled=true;
     $('trigger_ocinscon_feccom').hide();
     $('trigger_ocinscon_fecter').hide();

   }

  function verificar()
  {
  	if (nuevo=="")
  	{
  	if ($('ocinscon_codcon').value!="")
  	{
  	if ($('ocinscon_stacon').value!='E')
  	{
  	  alert('Para realizar una inspeccion el contrato debe estar en ejecución');
  	  $('ocinscon_numins').value="";
  	}
  	}
  	else
    {
    	alert('Debe introducir el Código de Contrato');
  	    $('ocinscon_numins').value="";
    }
  	}
  }
</script>
