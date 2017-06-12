<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/23 16:45:54
?>
<?php echo form_tag('nomjorlabind/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npempjorlab, 'getId') ?>
<?php echo javascript_include_tag('tools','ajax','dFilter','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Empleado') ?></legend>
<div class="form-row">

  <table>
    <tr>
      <th><?php echo label_for('npempjorlab[codemp]', __($labels['npempjorlab{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npempjorlab{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npempjorlab{codemp}')): ?>
    <?php echo form_error('npempjorlab{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('npempjorlab[codemp]', $npempjorlab->getCodemp(),
    'nomjorlabind/autocomplete?ajax=1',   array('autocomplete' => 'off','maxlength' => 10, 'size' => 15,
	'onBlur'=> remote_function(array(
  			  'control_name' => 'npempjorlab[codemp]',
			  'url'      => 'nomjorlabind/ajax',
			  'complete' => 'AjaxJSON(request, json), verificar()',
			  'condition' => "$('npempjorlab_codemp').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&cajtexmos=npempjorlab_nomemp&cajtexcom=npempjorlab_codemp&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?> </div></th><th>&nbsp;&nbsp;</th><th><?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Nomjorlabind/clase/Nphojint/frame/sf_admin_edit_form/obj1/npempjorlab_codemp/obj2/npempjorlab_nomemp/campo1/codemp/campo2/nomemp','','','botoncat')?></th>
    </tr>
  </table>
<?php echo input_hidden_tag('existe', '') ?>
<br>

  <?php echo label_for('npempjorlab[nomemp]', __($labels['npempjorlab{nomemp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npempjorlab{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npempjorlab{nomemp}')): ?>
    <?php echo form_error('npempjorlab{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npempjorlab, 'getNomemp', array (
  'readonly' => true,
  'size' => 45,
  'control_name' => 'npempjorlab[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npempjorlab[nomcar]', __($labels['npempjorlab{nomcar}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npempjorlab{nomcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npempjorlab{nomcar}')): ?>
    <?php echo form_error('npempjorlab{nomcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npempjorlab, 'getNomcar', array (
  'readonly' => true,
  'size' => 45,
  'control_name' => 'npempjorlab[nomcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npempjorlab[codnom]', __($labels['npempjorlab{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npempjorlab{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npempjorlab{codnom}')): ?>
    <?php echo form_error('npempjorlab{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npempjorlab, 'getCodnom', array (
  'size' => 10,
  'maxlength' => 45,
  'control_name' => 'npempjorlab[codnom]',
)); echo $value ? $value : '&nbsp;' ?>


<?php $value = object_input_tag($npempjorlab, 'getNomnom', array (
  'size' => 45,
  'disabled' => true,
  'control_name' => 'npempjorlab[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>
</fieldset>

<br>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Jornada Laboral') ?></legend>
<div class="form-row">

  <table>
    <tr>
      <th>  <?php echo label_for('npempjorlab[idejor]', __($labels['npempjorlab{idejor}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npempjorlab{idejor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npempjorlab{idejor}')): ?>
    <?php echo form_error('npempjorlab{idejor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('npempjorlab[idejor]', $npempjorlab->getIdejor(),
    'nomjorlabind/autocomplete?ajax=2',
   array('autocomplete' => 'off',
'maxlength' => 10,
    'size' => 10,
	'onBlur'=> remote_function(array(
  			  'control_name' => 'npempjorlab[idejor]',
			  'url'      => 'nomjorlabind/ajax',
   			  'update' => 'divx',
   			  'script' => true,
			  'complete' => 'AjaxJSON(request, json), verificar3()',
			  'condition' => "$('npempjorlab_idejor').value != '' && $('id').value == '' && $('npempjorlab_codnom').value != ''",
  			  'with' => "'ajax=2&codigo='+this.value+'&nom='+$('npempjorlab_codnom').value"
			  ))
			  ),
     array('use_style' => 'true','with'=>"'x='+$('npempjorlab_codnom').value")

  )
?></div></th><th>&nbsp;&nbsp;</th><th><?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npdefjorlab_Nomjorlabind/clase/Npdefjorlab/frame/sf_admin_edit_form/obj1/npempjorlab_idejor/campo1/idejor/param1/'+$('npempjorlab_codnom').value+'",'','','botoncat')?></th>
    </tr>
  </table>

<br><?php echo input_hidden_tag('existe3', '') ?>

	<?php echo checkbox_tag('npempjorlab[lunes]','1')."   Lunes   ";?>
	&nbsp;&nbsp;
	<?php echo checkbox_tag('npempjorlab[martes]','2')."   Martes   ";?>
	&nbsp;&nbsp;
	<?php echo checkbox_tag('npempjorlab[miercoles]','3')."   Miercoles   ";?>
	&nbsp;&nbsp;
	<?php echo checkbox_tag('npempjorlab[jueves]','4')."   Jueves   ";?>
	&nbsp;&nbsp;
	<?php echo checkbox_tag('npempjorlab[viernes]','5')."   Viernes   ";?>
	&nbsp;&nbsp;
	<?php echo checkbox_tag('npempjorlab[sabado]','6')."   Sabado   ";?>
	&nbsp;&nbsp;
	<?php echo checkbox_tag('npempjorlab[domingo]','7')."   Domingo   ";?>
	&nbsp;&nbsp;

</div>
</fieldset>

<div id="divx">
</div>


<?php include_partial('edit_actions', array('npempjorlab' => $npempjorlab)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npempjorlab->getId()): ?>
<?php echo button_to(__('delete'), 'nomjorlabind/delete?id='.$npempjorlab->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">

$('npempjorlab_lunes').checked='<? print $npempjorlab->getLunes(); ?>';
$('npempjorlab_martes').checked='<? print $npempjorlab->getMartes(); ?>';
$('npempjorlab_miercoles').checked='<? print $npempjorlab->getMiercoles(); ?>';
$('npempjorlab_jueves').checked='<? print $npempjorlab->getJueves(); ?>';
$('npempjorlab_viernes').checked='<? print $npempjorlab->getViernes(); ?>';
$('npempjorlab_sabado').checked='<? print $npempjorlab->getSabado(); ?>';
$('npempjorlab_domingo').checked='<? print $npempjorlab->getDomingo(); ?>';

$('npempjorlab_lunes').disabled='true';
$('npempjorlab_martes').disabled='true';
$('npempjorlab_miercoles').disabled='true';
$('npempjorlab_jueves').disabled='true';
$('npempjorlab_viernes').disabled='true';
$('npempjorlab_sabado').disabled='true';
$('npempjorlab_domingo').disabled='true';

function verificar()
{
  if ($('existe').value=='1')
  {
  	alert('El Empleado no se encuentra Registrado');
  }
  else if ($('existe').value=='2')
  {
  	alert('El Empleado no tiene una Nomina Asociada');
  	$('npempjorlab_codemp').value="";
  	$('npempjorlab_nomemp').value="";
  	$('npempjorlab_codemp').focus();
  }
}

function verificar3()
{
  if ($('existe3').value=='S')
  {
  	alert('La Jornada Laboral no Existe');
  	$('npempjorlab_idejor').value="";
  }
}
</script>