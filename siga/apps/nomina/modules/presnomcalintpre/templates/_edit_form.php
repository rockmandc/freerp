<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/24 16:57:57
?>
<?php echo form_tag('presnomcalintpre/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($nppresoc, 'getId') ?>
<?php echo input_hidden_tag('control', '') ?>
<?php echo input_hidden_tag('entorno', $ent) ?>
<?php
echo input_hidden_tag('totfil','');
echo input_hidden_tag('totfil2','');
echo input_hidden_tag('totfil3','');
echo input_hidden_tag('codigotipocon','');
?>

<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>

<fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Datos del Trabajador')?></h2>
<div class="form-row">
  <?php echo label_for('nppresoc[codemp]', __($labels['nppresoc{codemp}']), 'class="required"  ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{codemp}')): ?>
    <?php echo form_error('nppresoc{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php //'update'   => 'id1',
echo input_auto_complete_tag('nppresoc[codemp]', $nppresoc->getCodemp(),
    'presnomcalintpre/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 12, 'size' => 12, 'onBlur'=> remote_function(array(
		   'update'   => 'id1',
		   'url'      => 'presnomcalintpre/ajax',
		   'condition' => "$('nppresoc_codemp').value != '' && $('id').value == ''",
		   'script'   => true,
		   'complete' => 'AjaxJSON(request, json),validarPres(id),llamaroculta()',
		   'with' => "'ajax=1&codemp='+this.value"
			  ))),
     array('use_style' => 'true')
  )
  ?>
&nbsp;&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphispre_Presnomcalintpre/clase/Nphojint/frame/sf_admin_edit_form/obj1/nppresoc_codemp/campo1/codemp/param1/')?>
&nbsp;
    </div>

<br>

<table>
<tr>
<th>
  <?php echo label_for('nppresoc[cedemp]', __($labels['nppresoc{cedemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{cedemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{cedemp}')): ?>
    <?php echo form_error('nppresoc{cedemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nppresoc, 'getCedemp', array (
  'disabled' => true,
  'control_name' => 'nppresoc[cedemp]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>

<th>
  <?php echo label_for('nppresoc[nomemp]', __($labels['nppresoc{nomemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{nomemp}')): ?>
    <?php echo form_error('nppresoc{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nppresoc, 'getNomemp', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'nppresoc[nomemp]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</th>
</tr>
</table>

<br>

<table>
<tr>
<th>
 <?php echo label_for('nppresoc[fecing]', __($labels['nppresoc{fecing}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{fecing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{fecing}')): ?>
    <?php echo form_error('nppresoc{fecing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($nppresoc, 'getFecing', array (
  'disabled' => true,
  'control_name' => 'nppresoc[fecing]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
 <?php echo label_for('nppresoc[feccalpres]', __($labels['nppresoc{feccalpres}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{feccalpres}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{feccalpres}')): ?>
    <?php echo form_error('nppresoc{feccalpres}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php $value = object_input_tag($nppresoc, 'getFeccalpres', array (

  'control_name' => 'nppresoc[feccalpres]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
<br>
<table>
<tr>
<th>
  <?php echo label_for('nppresoc[destipcon]', __($labels['nppresoc{destipcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{destipcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{destipcon}')): ?>
    <?php echo form_error('nppresoc{destipcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nppresoc, 'getDestipcon', array (
  'disabled' => true,
  'size' => 35,
  'control_name' => 'nppresoc[destipcon]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</th>
<th>
&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('nppresoc[mesinicio]', __($labels['nppresoc{mesinicio}']), 'class="required" style="width:80px" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{mesinicio}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{mesinicio}')): ?>
    <?php echo form_error('nppresoc{mesinicio}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nppresoc, 'getMesinicio', array (
  'size' => 3,
  'align'=> 'left',
  'control_name' => 'nppresoc[mesinicio]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</th>
</tr>
</table>
<table>
<tr>
	<th>
	  <?php echo label_for('nppresoc[codniv]', __($labels['nppresoc{codniv}']), 'class="required" style="width:80px" ') ?>
	  <div class="content<?php if ($sf_request->hasError('nppresoc{codniv}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('nppresoc{codniv}')): ?>
	    <?php echo form_error('nppresoc{codniv}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($nppresoc, 'getCodniv', array (
	  'size' => 20,
	  'readonly'=>true,
	  'control_name' => 'nppresoc[codniv]',
	  'style' => "border-style:none;",
	)); echo $value ? $value : '&nbsp;' ?>
	</th>
	<th>
		&nbsp;&nbsp;
	</th>
	<th>
		<?php echo label_for('nppresoc[desniv]', __($labels['nppresoc{desniv}']), 'class="required" style="width:80px" ') ?>
	  <div class="content<?php if ($sf_request->hasError('nppresoc{desniv}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('nppresoc{desniv}')): ?>
	    <?php echo form_error('nppresoc{desniv}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($nppresoc, 'getDesniv', array (
	  'size' => 80,
	  'readonly'=>true,
	  'control_name' => 'nppresoc[desniv]',
	  'style' => "border-style:none;",
	)); echo $value ? $value : '&nbsp;' ?>
	</th>
</tr>
<tr>
	<th>
	  <?php echo label_for('nppresoc[codcar]', __($labels['nppresoc{codcar}']), 'class="required" style="width:80px" ') ?>
	  <div class="content<?php if ($sf_request->hasError('nppresoc{codcar}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('nppresoc{codcar}')): ?>
	    <?php echo form_error('nppresoc{codcar}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($nppresoc, 'getCodcar', array (
	  'size' => 20,
	  'readonly'=>true,
	  'control_name' => 'nppresoc[codcar]',
	  'style' => "border-style:none;",
	)); echo $value ? $value : '&nbsp;' ?>
	</th>
	<th>
		&nbsp;&nbsp;
	</th>
	<th>
		<?php echo label_for('nppresoc[nomcar]', __($labels['nppresoc{nomcar}']), 'class="required" style="width:80px" ') ?>
	  <div class="content<?php if ($sf_request->hasError('nppresoc{nomcar}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('nppresoc{nomcar}')): ?>
	    <?php echo form_error('nppresoc{nomcar}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($nppresoc, 'getNomcar', array (
	  'size' => 80,
	  'readonly'=>true,
	  'control_name' => 'nppresoc[nomcar]',
	  'style' => "border-style:none;",
	)); echo $value ? $value : '&nbsp;' ?>
	</th>
</tr>
</table>
</div>
</fieldset>


<h2 class="h2"><? echo __('Datos del Cálculo')?></h2>
<div class="form-row" style="border-style:solid;border-width:1px;border-color:#DDDDDD">
<table>
<tr>
<th>
  <?php echo label_for('nppresoc[feccor]', __($labels['nppresoc{feccor}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{feccor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{feccor}')): ?>
    <?php echo form_error('nppresoc{feccor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nppresoc, 'getFeccor', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nppresoc[feccor]',
  'date_format' => 'dd/MM/yy',
  'size' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>

<?php echo "Año (365/366)"."&nbsp;&nbsp;" . radiobutton_tag('anno', '365', false) ?>
  <?php echo "&nbsp;&nbsp;&nbsp;". "Año 360 " . radiobutton_tag('anno', '360', true)?>

</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
 <?php echo label_for('lbcapitalizacion', __("Capitalización de Interes"), 'class="required" ') ?>
 <?php echo select_tag('capitalizacion', options_for_select($capitalizacion,'01','')) ?>
</th>
</tr>
</table>
<br>
<?php
$diaserrn="";$messerrn="";$anoserrn="";$totalrn="";
$diaserra="";$messerra="";$anoserra="";$totalra="";
if ($nppresoc->getId()!='')
{
	$diaserrn=$nppresoc->getDiaser();
	$messerrn=$nppresoc->getMesser();
	$anoserrn=$nppresoc->getAnoser();
	$diaserra=$nppresoc->getDiaserra();
	$messerra=$nppresoc->getMesserra();
	$anoserra=$nppresoc->getAnoserra();
	$totalra=$nppresoc->getMonpre();

}
?>
<table>
<tr>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><? echo __('Tiempo de Servicio R. Anterior')?></legend>
<div class="form-row">
  <?php echo label_for('nppresoc[diaser]', __($labels['nppresoc{diaser}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{diaser}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{diaser}')): ?>
    <?php echo form_error('nppresoc{diaser}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = input_tag('diaserra', $diaserra, array (
  'size' => 10,
  'disabled' => true,
  'control_name' => 'diaserra',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

  <?php echo label_for('nppresoc[messer]', __($labels['nppresoc{messer}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{messer}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{messer}')): ?>
    <?php echo form_error('nppresoc{messer}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = input_tag('messerra', $messerra, array (
  'size' => 10,
  'disabled' => true,
  'control_name' => 'messerra',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>

</div>

<br>

  <?php echo label_for('nppresoc[anoser]', __($labels['nppresoc{anoser}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{anoser}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{anoser}')): ?>
    <?php echo form_error('nppresoc{anoser}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = input_tag('anoserra', $anoserra, array (
  'size' => 10,
  'disabled' => true,
  'control_name' => 'anoserra',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>

</div>
</div>
</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<legend><? echo __('Tiempo de Servicio R. Nuevo') ?></legend>
<div class="form-row">

  <?php echo label_for('nppresoc[diaser]', __($labels['nppresoc{diaser}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{diaser}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{diaser}')): ?>
    <?php echo form_error('nppresoc{diaser}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = input_tag('diaserrn', $diaserrn, array (
  'size' => 10,
  'disabled' => true,
  'control_name' => 'diaserrn',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>

</div>

<br>

  <?php echo label_for('nppresoc[messer]', __($labels['nppresoc{messer}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{messer}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{messer}')): ?>
    <?php echo form_error('nppresoc{messer}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = input_tag('messerrn', $messerrn, array (
  'size' => 10,
  'disabled' => true,
  'control_name' => 'messerrn',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>

</div>

<br>

  <?php echo label_for('nppresoc[anoser]', __($labels['nppresoc{anoser}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{anoser}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{anoser}')): ?>
    <?php echo form_error('nppresoc{anoser}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = input_tag('anoserrn', $anoserrn, array (
  'size' => 10,
  'disabled' => true,
  'control_name' => 'anoserrn',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>

</div>
</div>
</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<legend><? echo __('Tiempo Neto Trabajado') ?></legend>
<div class="form-row">
  <?php echo label_for('nppresoc[diatra]', __($labels['nppresoc{diatra}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{diatra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{diatra}')): ?>
    <?php echo form_error('nppresoc{diatra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nppresoc, 'getDiatra', array (
  'size' => 10,
  'disabled' => true,
  'control_name' => 'nppresoc[diatra]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>

</div>

<br>

  <?php echo label_for('nppresoc[mestra]', __($labels['nppresoc{mestra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{mestra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{mestra}')): ?>
    <?php echo form_error('nppresoc{mestra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nppresoc, 'getMestra', array (
  'size' => 10,
  'disabled' => true,
  'control_name' => 'nppresoc[mestra]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>

</div>

<br>

  <?php echo label_for('nppresoc[anotra]', __($labels['nppresoc{anotra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppresoc{anotra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppresoc{anotra}')): ?>
    <?php echo form_error('nppresoc{anotra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nppresoc, 'getAnotra', array (
  'size' => 10,
  'disabled' => true,
  'control_name' => 'nppresoc[anotra]',
  'style' => "border-style:none;",
)); echo $value ? $value : '&nbsp;' ?>

</div>
</div>
</fieldset>
</th>
<th>
<?php tabMainJS("tp1","tabPane1", "tabPage1", 'LOT Art. 108');?>
<div id="id1">
<? echo grid_tag($obj); ?>

<table>
   <tr>
    <th><?php echo label_for('Totales', __('TOTALES'), 'class="required" ') ?></th>

	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Antiguedad Acumulada
	<?php echo input_tag('totcapitalact', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?>
   </th>

    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Dias Art.108
	<?php echo input_tag('totmonpres', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?>
   </th>


    <th>&nbsp;&nbsp;</th>
    <th>
    Interes Acumulado
  <?php echo input_tag('totintacu', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?></th>



	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Adelanto Anticipo
	<?php echo input_tag('totmonant', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?>
   </th>

    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Adelanto Intereses
    <?php echo input_tag('totmonadeint', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?></th>


   </tr>
</table>



</div>

<?php tabPageOpenClose("tp1", "tabPage2", 'LOTTT Art. 142');?>
<div id="id142">
<? echo grid_tag($obj142); ?>
</div>
<table>
   <tr>
    <th><?php echo label_for('Totales', __('TOTALES'), 'class="required" ') ?></th>

  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Antiguedad Acumulada
  <?php echo input_tag('totcapitalact142', '', array(
  'size'=> 15,
  'class'=> 'grid_txtright',
  'readonly'=> true,
  )) ?>
   </th>

    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Dias Art.142
  <?php echo input_tag('totmonpres142', '', array(
  'size'=> 15,
  'class'=> 'grid_txtright',
  'readonly'=> true,
  )) ?>
   </th>


    <th>&nbsp;&nbsp;</th>
    <th>
    Interes Acumulado
  <?php echo input_tag('totintacu142', '', array(
  'size'=> 15,
  'class'=> 'grid_txtright',
  'readonly'=> true,
  )) ?></th>



  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Adelanto Anticipo
  <?php echo input_tag('totmonant142', '', array(
  'size'=> 15,
  'class'=> 'grid_txtright',
  'readonly'=> true,
  )) ?>
   </th>

    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Adelanto Intereses
    <?php echo input_tag('totmonadeint142', '', array(
  'size'=> 15,
  'class'=> 'grid_txtright',
  'readonly'=> true,
  )) ?></th>


   </tr>
</table>

<?php tabPageOpenClose("tp1", "tabPage3", 'Régimen Antiguo');?>
<div id="id2">
<?php echo grid_tag($obj2); ?>
</div>
<table>
   <tr>
    <th><?php echo label_for('Totales2', __('TOTALES'), 'class="required" ') ?></th>

	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Antiguedad Acumulada
	<?php echo input_tag('totcapitalact2', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?>
   </th>

    <th>&nbsp;&nbsp;</th>
    <th>
    Interes Acumulado
  <?php echo input_tag('totintacu2', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?></th>



	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Adelanto Anticipo
	<?php echo input_tag('totmonant2', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?>
   </th>

    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    Adelanto Intereses
    <?php echo input_tag('totmonadeint2', '', array(
	'size'=> 15,
	'class'=> 'grid_txtright',
	'readonly'=> true,
	)) ?></th>


   </tr>
</table>
<?php tabPageOpenClose("tp1", "tabPage4", 'Intereses Sobre Capital');?>
<div id="id3">
<? echo grid_tag($obj3); ?>
</div>
</th>
</tr>
</table>
<br>
<table>
<tr>
<th>
<fieldset>
<legend><? echo __('Tipo de Interes para el Cálculo')?></legend>
<div class="form-row">

  <?php echo  radiobutton_tag('nppresoc[interes]', 'S', true)." Simple"  ?>
  &nbsp;&nbsp;
  <?php echo  radiobutton_tag('nppresoc[interes]', 'C', false)." Compuesto"?>
  &nbsp;&nbsp;
  <?php echo  radiobutton_tag('nppresoc[interes]', 'M', false)." Matemática Financiera"?>

</div>
</fieldset>
</th>
<th>
<fieldset>
<legend><? echo __('Salario Dias Adicionales de Antiguedad')?></legend>
<div class="form-row">
  <?php  echo  radiobutton_tag('nppresoc[salario]', 'P', true)." Promedio del Año"
    ?>
  &nbsp;&nbsp;
  <?php echo  radiobutton_tag('nppresoc[salario]', 'U', false)." Ultimo Salario Devengado"?>
</div>
</fieldset>
</th>
</tr>
</table>


<?php /*echo submit_to_remote('btnCalcular', 'Calcular', array(
  		   'update'   => 'id1',
		   'url'      => 'presnomcalintpre/ajax',
		   'script'   => true,
		   'complete' => 'AjaxJSON(request, json)',
		   'with' => "'ajax=5&codemp='+$('nppresoc_cedemp').value+'&feccor='+$('nppresoc_feccor').value+'&fecing='+$('nppresoc_fecing').value+'&capita='+$('capitalizacion').value"
))*/

//'with' => "'ajax=2&codemp='+$('nppresoc_cedemp').value+'&feccor='+$('nppresoc_feccor').value+'&fecing='+$('nppresoc_fecing').value+'&mesini='+$('nppresoc_mesinicio').value"
?>


<ul class="sf_admin_actions">
  <li ><?php echo submit_to_remote('btnCalcular', 'Calcular', array(
  		   'update'   => 'id1',
		   'url'      => 'presnomcalintpre/ajax',
		   'script'   => true,
		   'complete' => 'AjaxJSON(request, json)',
		   'with' => "'ajax=5&codemp='+$('nppresoc_codemp').value+'&feccor='+$('nppresoc_feccor').value+'&salario='+$('nppresoc_salario_P').checked+'&fecing='+$('nppresoc_fecing').value+'&capita='+$('capitalizacion').value+'&anno='+$('anno_365').checked"
)) ?></li>
</ul>


<?php include_partial('edit_actions', array('nppresoc' => $nppresoc)); ?>
<? ?>
<?php tabInit('tp1','0');?>


</div>




</form>

<script language="JavaScript" type="text/javascript">
  function llamaroculta()
  {
  	var tot = obtener_filas_grid('a',1);
  	var i=0;
  	while (i<tot)
  	{
  		$('trigger_ax_'+i+'_1').hide();
  		$('trigger_ax_'+i+'_2').hide();
  		i++;
  	}

  	/*var tot2 = $('totfil2').value;
  	var i=0;
  	while (i<tot2)
  	{
  		$('trigger_bx_'+i+'_1').hide();
  		$('trigger_bx_'+i+'_2').hide();
  		i++;
  	}

  	var tot3 = $('totfil3').value;
  	var i=0;
  	while (i<tot3)
  	{
  		$('trigger_cx_'+i+'_1').hide();
  		$('trigger_cx_'+i+'_2').hide();
  		i++;
  	}*/
  }

 function ocultarfecha2()
  {
  	alert('llego');

  }

  function validarPres(id)
  {
  	if ($(id).value!='')
  	{
  		if ($('control').value=='nodatos')
  		{
  			alert('No existe el Codigo del Empleado');
  			$('nppresoc_codemp').focus();
  			$('nppresoc_codemp').value='';
  			$('nppresoc_cedemp').value='';
  			$('nppresoc_nomemp').value='';
  			$('nppresoc_fecing').value='';
  			$('nppresoc_feccalpres').value='';
  			$('nppresoc_destipcon').value='';
  			$('nppresoc_feccor').value='';
  			$('nppresoc_diaserra').value='';
  			$('nppresoc_messerra').value='';
  			$('nppresoc_anoserra').value='';
  			$('nppresoc_diaserrn').value='';
  			$('nppresoc_messerrn').value='';
  			$('nppresoc_anoserrn').value='';


  		}else if ($('control').value=='vacio')
  		{
  			alert('Trabajador no tiene Asociado Contrato por lo cual no puede calcularsele las prestaciones');
  			$('nppresoc_codemp').focus();
  			$('nppresoc_codemp').value='';
  			$('nppresoc_cedemp').value='';
  			$('nppresoc_nomemp').value='';
  			$('nppresoc_fecing').value='';
  			$('nppresoc_feccalpres').value='';
  			$('nppresoc_destipcon').value='';
  			$('nppresoc_feccor').value='';
  			$('nppresoc_diaserra').value='';
  			$('nppresoc_messerra').value='';
  			$('nppresoc_anoserra').value='';
  			$('nppresoc_diaserrn').value='';
  			$('nppresoc_messerrn').value='';
  			$('nppresoc_anoserrn').value='';
  		}
  	}
  }
</script>
