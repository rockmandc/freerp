<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/03/28 10:06:27
?>
<?php echo form_tag('fordefpryaccsubaccivss/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($forasopryaccespsubacc, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend>Proyecto o Accion Centralizada</legend>
<div class="form-row">
  <?php echo label_for('forasopryaccespsubacc[codpro]', __($labels['forasopryaccespsubacc{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forasopryaccespsubacc{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forasopryaccespsubacc{codpro}')): ?>
    <?php echo form_error('forasopryaccespsubacc{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($forasopryaccespsubacc, 'getCodpro', array (
  'size' => 20,
  'control_name' => 'forasopryaccespsubacc[codpro]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;
<?php echo button_to('...','#')?>
&nbsp;&nbsp;&nbsp;
<?php echo input_tag('nombre',$pproac,'size=50,disabled=true') ?>
&nbsp;
</div>
</div>
<div class="form-row">
<br><strong>Descripcion</strong>
<?php echo textarea_tag('',$pnom ,'size=80x5 disabled=true')?>
</div>
</fieldset>


<fieldset id="sf_fieldset_none" class="">
<legend>Accion Especifica</legend>
<div class="form-row">
  <?php echo label_for('forasopryaccespsubacc[codaccesp]', __($labels['forasopryaccespsubacc{codaccesp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forasopryaccespsubacc{codaccesp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forasopryaccespsubacc{codaccesp}')): ?>
    <?php echo form_error('forasopryaccespsubacc{codaccesp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($forasopryaccespsubacc, 'getCodaccesp', array (
  'size' => 20,
  'control_name' => 'forasopryaccespsubacc[codaccesp]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo button_to('...','#')?>

    </div>    
</div>

<div class="form-row">
<br><strong>Descripcion</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo textarea_tag('', $descripcion,'size=80x5 disabled=true')?>
</div>

<div class="form-row">
  <?php echo label_for('forasopryaccespsubacc[codsubacc]', __($labels['forasopryaccespsubacc{codsubacc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forasopryaccespsubacc{codsubacc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forasopryaccespsubacc{codsubacc}')): ?>
    <?php echo form_error('forasopryaccespsubacc{codsubacc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($forasopryaccespsubacc, 'getCodsubacc', array (
  'size' => 20,
  'control_name' => 'forasopryaccespsubacc[codsubacc]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;

    </div>
</div>
</fieldset>

<div class="grid01" id="grid01">
<fieldset><legend>Acciones POA</legend> <? if ($rs!='')
{ ?>
<table border="0" class="sf_admin_list">
	<? 
$titulo=array(0 => 'Codigo', 1 => 'Descripcion');

if ( count($rs)>0){
$i=0;
foreach ($rs as $k=>$fila) {
    $i++;
    if($i==1){?>
	<thead>
		<tr>
			<? foreach ($fila as $key => $value){?>
			<th><?=$titulo[$key]?></th>
			<? }?>
		</tr>
	</thead>
	<? }?>
	<tr>
		<? foreach ($fila as $key => $value){?>
		<td><?=$value?></td>
		<? }?>
	</tr>
	<? }
  }
?>
</table>
<?
}
?></fieldset>
</div>

<?php include_partial('edit_actions', array('forasopryaccespsubacc' => $forasopryaccespsubacc)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($forasopryaccespsubacc->getId()): ?>
<?php echo button_to(__('delete'), 'fordefpryaccsubaccivss/delete?id='.$forasopryaccespsubacc->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
