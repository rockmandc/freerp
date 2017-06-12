<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/29 11:41:38
?>
<?php echo form_tag('fortiting/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript', 'Grid', 'PopUp') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'formulacion/fortiting') ?>


<?php echo object_input_hidden_tag($forparing, 'getId') ?>
<?php echo input_hidden_tag('escero', '') ?>
<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('Datos de la Partida de Ingreso')?></h2>
<div class="form-row">
  <?php echo label_for('forparing[codparing]', __($labels['forparing{codparing}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forparing{codparing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forparing{codparing}')): ?>
    <?php echo form_error('forparing{codparing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($forparing, 'getCodparing', array (
  'size' => $lonpar,
  'maxlength' => $lonpar,
  'readonly'  =>  $forparing->getId()!='' ? true : false ,
  'control_name' => 'forparing[codparing]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$forpar')",
  'onBlur'=> remote_function(array(
        'url'      => 'fortiting/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('forparing_codparing').value != ''",
        'with' => "'ajax=1&cajtexmos=forparing_despar&cajtexcom=forparing_codparing&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?>

<? //// NO SE DE DONDE SACARON ESTE CODIGO ///
/*
$sql="select a.codparing as codigo , a.nomparing as nombre from fordefparing a
where length(a.codparing)=".$lonpar." and a.codparing not in (select b.codparing from forparing b)";
    $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/forparing_codparing-forparing_despar/campos/codigo-nombre';
 */ ?>
 <?php //echo  button_to_popup('...',$url,$sql,'catalogo1')?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefparing_Fortiting/clase/fordefparing/frame/sf_admin_edit_form/obj1/forparing_codparing/obj2/forparing_despar/campo1/codparing/campo2/nomparing/param1/'.$lonpar)?></th>

  <?php $value = object_input_tag($forparing, 'getDespar', array (
  'disabled' => true,
  'control_name' => 'forparing[despar]',
  'size' => 80,
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>

    </div>

<br>
<?php echo label_for('forparing[asiper]', __($labels['forparing{asiper}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forparing{asiper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forparing{asiper}')): ?>
    <?php echo form_error('forparing{asiper}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
      
<?php echo select_tag('forparing[asiper]', options_for_select(Array(''=>'Seleccione..','S'=>'Si','N'=>'No'),$forparing->getAsiper()),array(
      'onchange' => "javascript: activaSaldoActual()",
      'onclick' => "javascript: activaSaldoActual()")); ?>
  </div>
<br>

<table>
  <tr>
	<th><?php echo label_for('forparing[montoing]', __($labels['forparing{montoing}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forparing{montoing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forparing{montoing}')): ?>
    <?php echo form_error('forparing{montoing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($forparing, array('getMontoing',true), array (
  'size' => 10,
  'control_name' => 'forparing[montoing]',
  'onblur' => 'distribuirPeriodos(), toFloatVE(this.id)',
)); echo $value ? $value : '&nbsp;' ?></div> </th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th><input type="button" value="Distribución Mensual" onClick="javascript:$('distribucion').toggle(); "></th>
  </tr>
</table>

<br>

</fieldset>

<br>

<div id="distribucion" style="display:none">
<?
echo grid_tag($obj);
?>

<div id="distribucion_monto" style="display:none">
<?
echo grid_tag($objMonto);
?>
<br>

<table>
 <tr>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('',__('Total') , 'class="required"') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo input_tag('suma','0,00', 'size=15 class=grid_txtright readonly=true') ?>
</th>
<th>
&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo input_tag('suma2','0,00', 'size=15 class=grid_txtright readonly=true') ?>
</th>
 </tr>
</table>

</div>

</div>

<?php echo grid_tag($objFF); ?>

</fieldset>

<script type="text/javascript">
var id='<?php echo $forparing->getId()?>';
if (id!="")
{
  actualizarsaldos();
}

function activaSaldoActual() {
	var idActual = 'ax_0_2';
        var idActual2 = 'ax_0_3';
	var seleccion =  $('forparing_asiper').value;
	i=1;

	if (seleccion=='N') {
                $('forparing_montoing').value="0,00";
		$('forparing_montoing').readOnly=true;
		while ($(idActual)) {
                        $(idActual).value="0,00";
                        $(idActual2).value="0,00";
			$(idActual).readOnly=false;
			idActual = "ax_"+i+"_"+'2';
                        idActual2 = "ax_"+i+"_"+'3';
			i++;
		}
                distribuirPeriodos();
	} else {
		if (seleccion=='S') {
			$('forparing_montoing').readOnly=false;
			while ($(idActual)) {
				$(idActual).readOnly=true;
				idActual = "ax_"+i+"_"+'2';
				i++;
			}
		} else {
			if (seleccion=='') {
				$('forparing_montoing').readOnly=true;
				while ($(idActual)) {
					$(idActual).readOnly=true;
					idActual = "ax_"+i+"_"+'2';
					i++;
				}
			}
		}
	}
}
</script>

<?php include_partial('edit_actions', array('forparing' => $forparing)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($forparing->getId()): ?>
<?php echo button_to(__('delete'), 'fortiting/delete?id='.$forparing->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
