<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/08/17 17:53:42
?>
<?php echo form_tag('forcargos/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'double_list_submit(); return true;'
)) ?>

<?php echo object_input_hidden_tag($forcargos, 'getId') ?>
<?php echo javascript_include_tag('ajax', 'tools', 'observe', 'dFilter') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Cargo')?></legend>
<div class="form-row">
  <?php echo label_for('forcargos[codcar]', __($labels['forcargos{codcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forcargos{codcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forcargos{codcar}')): ?>
    <?php echo form_error('forcargos{codcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php $value = object_input_tag($forcargos, 'getCodcar', array (
  'size' => 8,
  'control_name' => 'forcargos[codcar]',
  'maxlength' =>  $lonmascar,
  'readonly'  =>  $forcargos->getId()!='' ? true : false ,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracargo')",
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
  <?php echo label_for('forcargos[nomcar]', __($labels['forcargos{nomcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forcargos{nomcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forcargos{nomcar}')): ?>
    <?php echo form_error('forcargos{nomcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($forcargos, 'getNomcar', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'forcargos[nomcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('forcargos[codtip]', __($labels['forcargos{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forcargos{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forcargos{codtip}')): ?>
    <?php echo form_error('forcargos{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('forcargos[codtip]', $forcargos->getCodtip(),
    'forcargos/autocomplete?ajax=1',  array(
    'autocomplete' => 'off',
    'maxlength' => 3,
    'onBlur'=> remote_function(array(
        'url'      => 'forcargos/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=forcargos_nomtip&cajtexcom=forcargos_codtip&codtip='+this.value"
        ))),
     array('use_style' => 'true')
  )
?>&nbsp;&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Forcargos_forcargos/clase/Nptipcar/frame/sf_admin_edit_form/obj1/forcargos_nomtip/obj2/forcargos_codtip/campo1/destipcar/campo2/codtipcar/param1/Y')?>
&nbsp;
<?php $value = object_input_tag($forcargos, 'getNomtip', array (
  'readonly' => true,
  'size'=> 50,
  'control_name' => 'forcargos[nomtip]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>

<br>

  <?php echo label_for('forcargos[graocp]', __($labels['forcargos{graocp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forcargos{graocp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forcargos{graocp}')): ?>
    <?php echo form_error('forcargos{graocp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('forcargos[graocp]', $forcargos->getGraocp(),
    'forcargos/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 3,
  'onBlur'=> remote_function(array(
        'url'      => 'forcargos/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=1&cajtexmos=forcargos_suecar&cajtexcom=forcargos_graocp&codgra='+this.value+'&codtipcar='+$('forcargos_codtip').value"
        ))),
     array('use_style' => 'true')
  )
?> &nbsp;&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Forcargos_forcargos/clase/Npcomocp/frame/sf_admin_edit_form/obj1/forcargos_graocp/obj2/forcargos_suecar/campo1/gracar/campo2/suecar/param1/'+$('forcargos_codtip').value+'")?>

    </div>

<br>
<table>
	<tr>
		<td>
			<?php echo label_for('forcargos[suecar]', __($labels['forcargos{suecar}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('forcargos{suecar}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('forcargos{suecar}')): ?>
			    <?php echo form_error('forcargos{suecar}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>
			
			  <?php $value = object_input_tag($forcargos, array('getSuecar',true), array (
			  'size' => 7,
			  'maxlength' => 21,
			  'control_name' => 'forcargos[suecar]',
			  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
			)); echo $value ? $value : '&nbsp;' ?>
			    </div>
		</td>
		<td>
			<?php echo label_for('forcargos[comcar]', __($labels['forcargos{comcar}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('forcargos{comcar}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('forcargos{comcar}')): ?>
			    <?php echo form_error('forcargos{comcar}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>
			
			  <?php $value = object_input_tag($forcargos, array('getComcar',true), array (
			  'size' => 7,
			  'maxlength' => 21,
			  'control_name' => 'forcargos[comcar]',
			  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
			)); echo $value ? $value : '&nbsp;' ?>
    </div>
		</td>
		<td>
			<?php echo label_for('forcargos[pricar]', __($labels['forcargos{pricar}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('forcargos{pricar}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('forcargos{pricar}')): ?>
			    <?php echo form_error('forcargos{pricar}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>
			
			  <?php $value = object_input_tag($forcargos, array('getPricar',true), array (
			  'size' => 7,
			  'maxlength' => 21,
			  'control_name' => 'forcargos[pricar]',
			  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
			)); echo $value ? $value : '&nbsp;' ?>
			    </div>
		</td>
	</tr>	
	<tr>
		<td>
			<?php echo label_for('forcargos[canmuj]', __($labels['forcargos{canmuj}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('forcargos{canmuj}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('forcargos{canmuj}')): ?>
			    <?php echo form_error('forcargos{canmuj}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>
			
			  <?php $value = object_input_tag($forcargos, array('getCanmuj',true), array (
			  'size' => 7,
			  'maxlength' => 21,
			  'control_name' => 'forcargos[canmuj]',
			)); echo $value ? $value : '&nbsp;' ?>
		</td>
		<td><?php echo label_for('forcargos[canhom]', __($labels['forcargos{canhom}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('forcargos{canhom}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('forcargos{canhom}')): ?>
			    <?php echo form_error('forcargos{canhom}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>
			
			  <?php $value = object_input_tag($forcargos, array('getCanhom',true), array (
			  'size' => 7,
			  'maxlength' => 21,
			  'control_name' => 'forcargos[canhom]', 
			)); echo $value ? $value : '&nbsp;'?> 
		</td>			
	</tr>
</table>
  

<br>
<table>
<tr>
<th>
</th>
</tr>
</table>


<table>
<tr>
<th>
</th>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Puntuación Mínima para optar por el Cargo')?></legend>
<div class="form-row" align="center">
  <?php $value = object_input_tag($forcargos, array('getPunmin',true), array (
  'size' => 15,
  'maxlength' => 21,
  'control_name' => 'forcargos[punmin]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</fieldset>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Categoría del Cargo')?></legend>
<div class="form-row" align="center">
<?php  if($forcargos->getStacar()=='O') $val = true; else $val=false; ?>
  <?php echo "Empleado ".radiobutton_tag('forcargos[stacar]', 'E', !$val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'?>
  <?php echo "  Obrero ".radiobutton_tag('forcargos[stacar]', 'O', $val ).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
</div>
</fieldset>
</th>
</tr>
</table>
</div>
</fieldset>
</div>
</fieldset>

<br>
<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Profesiones que optan por el Cargo');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('forcargos[profecargo]', __($labels['forcargos{profecargo}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('forcargos{profecargo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forcargos{profecargo}')): ?>
    <?php echo form_error('forcargos{profecargo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_double_list($forcargos, 'getProfecargo', array (
  'control_name' => 'forcargos[profecargo]',
  'through_class' => 'Forprocar',
  'unassociated_label' => 'Profesiones',
  'associated_label' => 'Profesiones por Cargo'
)); echo $value ? $value : '&nbsp;' ?>
    </div>		  
</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage2", 'Perfiles que requieren el Cargo');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?
echo grid_tag($obj);
?>
</div>
</fieldset>
<?php tabInit('tp1','0');?>
<?php include_partial('edit_actions', array('forcargos' => $forcargos)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($forcargos->getId()): ?>
<?php echo button_to(__('delete'), 'forcargos/delete?id='.$forcargos->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
   function validargrid(id)
 {
    var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
    var descripcion=name+"_"+fila+"_"+coldes;

  if (perfil_repetido(id))
  {
    alert('El Perfil se encuentra repetido');
    $(id).value="";
    $(descripcion).value="";
  }

 }

 function perfil_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var perfil=$(id).value;

   var perfilrepetido=false;
   var am=totalregistros('ax',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var perfil2=$(codigo).value;

    if (i!=fila)
    {
      if (perfil==perfil2)
      {
        perfilrepetido=true;
        break;
      }
    }
   i++;
   }
   return perfilrepetido;
 }

  function ajax(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var descripcion=name+"_"+fil+"_"+coldes;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {

    new Ajax.Request('/nomina'+getEnv()+'.php/forcargos/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validargrid(id); }, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
 }
 }
</script>

