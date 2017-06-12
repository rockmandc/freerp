<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/26 17:29:00
?>
<?php echo form_tag('nomdefespgen/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npdefgen, 'getId') ?>
<?php echo javascript_include_tag('tools','observe','ajax','dFilter') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Empresa') ?></legend>
<div class="form-row">
<table>
<tr>
<th>
  <?php echo label_for('npdefgen[codemp]', __($labels['npdefgen{codemp}']), 'class="required" ') ?>
  <?php if ($sf_request->hasError('npdefgen{codemp}')): ?>
    <?php echo form_error('npdefgen{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($npdefgen, 'getCodemp', array (
  'readonly' => true,
  'size' => 5,
  'control_name' => 'npdefgen[codemp]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
  <?php echo label_for('npdefgen[nomemp]', __($labels['npdefgen{nomemp}']), 'class="required" ') ?>
  <?php if ($sf_request->hasError('npdefgen{nomemp}')): ?>
    <?php echo form_error('npdefgen{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefgen, 'getNomemp', array (
  'readonly' => true,
  'control_name' => 'npdefgen[nomemp]', 'size' => 50,
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Formato para los Codigos') ?></legend>
<div class="form-row">
  <?php echo label_for('npdefgen[forcar]', __($labels['npdefgen{forcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{forcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{forcar}')): ?>
    <?php echo form_error('npdefgen{forcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefgen, 'getForcar', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>  $esta=='1' ? true : false ,
  'control_name' => 'npdefgen[forcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npdefgen[foremp]', __($labels['npdefgen{foremp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{foremp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{foremp}')): ?>
    <?php echo form_error('npdefgen{foremp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefgen, 'getForemp', array (
  'size' => 20,
  'maxlength' => 16,
  'readonly'  =>  $esta1=='1' ? true : false ,
  'control_name' => 'npdefgen[foremp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npdefgen[fororg]', __($labels['npdefgen{fororg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{fororg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{fororg}')): ?>
    <?php echo form_error('npdefgen{fororg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefgen, 'getFororg', array (
  'maxlength' => 16,
  'size' => 20,
  'readonly'  =>  $esta2=='1' ? true : false ,
  'control_name' => 'npdefgen[fororg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npdefgen[forced]', __($labels['npdefgen{forced}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{forced}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{forced}')): ?>
    <?php echo form_error('npdefgen{forced}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefgen, 'getForced', array (
  'size' => 15,
  'control_name' => 'npdefgen[forced]',
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npdefgen[foresc]', __($labels['npdefgen{foresc}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{foresc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{foresc}')): ?>
    <?php echo form_error('npdefgen{foresc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefgen, 'getForesc', array (
  'size' => 20,
  'maxlength' => 16,
  'control_name' => 'npdefgen[foresc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npdefgen[numrec]', __($labels['npdefgen{numrec}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{numrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{numrec}')): ?>
    <?php echo form_error('npdefgen{numrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefgen, 'getNumrec', array (
  'size' => 7,
  'maxlength' => 21,
  'control_name' => 'npdefgen[numrec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('npdefgen[corayu]', __($labels['npdefgen{corayu}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{corayu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{corayu}')): ?>
    <?php echo form_error('npdefgen{corayu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefgen, array('getCorayu',true), array (
  'size' => 10,
  'control_name' => 'npdefgen[corayu]',
  'maxlength' => 8,
  'onBlur' => 'javascript: event.keyCode=13;return formatoDecimal(event,this.id)',
  'onKeyPress' => 'return validaDecimal(event)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>  
<br>     <br>
  <?php echo label_for('npdefgen[corpto]', __($labels['npdefgen{corpto}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{corpto}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{corpto}')): ?>
    <?php echo form_error('npdefgen{corpto}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefgen, array('getCorpto',true), array (
  'size' => 10,
  'control_name' => 'npdefgen[corpto]',
  'maxlength' => 8,
  'onBlur' => 'javascript: event.keyCode=13;return formatoDecimal(event,this.id)',
  'onKeyPress' => 'return validaDecimal(event)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>  
<br><br>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Valor de la Unidad Tributaria') ?></legend>
<div class="form-row">
    <?php echo label_for('npdefgen[unitrib]', __($labels['npdefgen{unitrib}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{unitrib}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{unitrib}')): ?>
    <?php echo form_error('npdefgen{unitrib}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefgen, array('getUnitrib',true), array (
  'size' => 7,
  'maxlength' => 21,
  'control_name' => 'npdefgen[unitrib]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Valor del Sueldo Mínimo') ?></legend>
<div class="form-row">
    <?php echo label_for('npdefgen[suemin]', __($labels['npdefgen{suemin}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{suemin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{suemin}')): ?>
    <?php echo form_error('npdefgen{suemin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefgen, array('getSuemin',true), array (
  'size' => 7,
  'maxlength' => 21,
  'control_name' => 'npdefgen[suemin]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Valores por Defecto') ?></legend>
<div class="form-row">
<?php echo label_for('npdefgen[codsitemp]', __($labels['npdefgen{codsitemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{codsitemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{codsitemp}')): ?>
    <?php echo form_error('npdefgen{codsitemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
   
   <?php echo select_tag('npdefgen[codsitemp]', objects_for_select(NpsitempPeer::doSelect(new Criteria()),'getCodsitemp','getDessitemp',$npdefgen->getCodsitemp(),'include_custom=Seleccione Uno')) ?>
   </div>
<br>   
  

<?php echo label_for('npdefgen[codestemp]', __($labels['npdefgen{codestemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{codestemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{codestemp}')): ?>
    <?php echo form_error('npdefgen{codestemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo select_tag('npdefgen[codestemp]', objects_for_select(NpestempPeer::doSelect(new Criteria()),'getCodestemp','getDesestemp',$npdefgen->getCodestemp(),'include_custom=Seleccione Uno')) ?>
   </div>

<br> 

<?php echo label_for('npdefgen[codtipgas]', __($labels['npdefgen{codtipgas}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefgen{codtipgas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefgen{codtipgas}')): ?>
    <?php echo form_error('npdefgen{codtipgas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo select_tag('npdefgen[codtipgas]', objects_for_select(NptipgasPeer::doSelect(new Criteria()),'getCodtipgas','getDestipgas',$npdefgen->getCodtipgas(),'include_custom=Seleccione Uno')) ?>
   </div>
</div>
</fieldset>

<br>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th align="center">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Redondeo para los Calculos')?></legend>
<div class="form-row">
  <?php if($npdefgen->getRedmon()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('npdefgen[redmon]', 'S', $val) ?>
  <?php echo "  No ".radiobutton_tag('npdefgen[redmon]', 'N', !$val) ?>
</div>
</fieldset>
</th>
<th> &nbsp;&nbsp;&nbsp;&nbsp;</th>
<th align="center">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Presupuestar Cargos')?></legend>
<div class="form-row">
  <?php if($npdefgen->getCodpre()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('npdefgen[codpre]', 'S', $val) ?>
  <?php echo "  No ".radiobutton_tag('npdefgen[codpre]', 'N', !$val) ?>
</div>
</fieldset>
</th>
<th> &nbsp;&nbsp;&nbsp;&nbsp;</th>
<th align="center">
<fieldset>
<legend><?php echo __('Asignar Conceptos a la Nomina')?></legend>
<div class="form-row">
  <?php if($npdefgen->getAsiconnom()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('npdefgen[asiconnom]', 'S', $val) ?>
  <?php echo "  No ".radiobutton_tag('npdefgen[asiconnom]', 'N', !$val) ?>
    </div>
</div>
</fieldset>
</th>

<th> &nbsp;&nbsp;&nbsp;&nbsp;</th>
<th align="center">
<fieldset>
<legend><?php echo __('Convertir Capital de Prestaciones a Bsf. a Partir del 2008')?></legend>
<div class="form-row">
  <?php if($npdefgen->getRedondeo()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('npdefgen[redondeo]', 'S', $val) ?>
  <?php echo "  No ".radiobutton_tag('npdefgen[redondeo]', 'N', !$val) ?>
</div>
</div>
</fieldset>
</th>

</tr>
</table>
</div>
</fieldset>

</div>
</fieldset>

<?php include_partial('edit_actions', array('npdefgen' => $npdefgen)) ?>

</form>

