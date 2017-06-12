<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp') ?>
<div id='sinsustra' style="<?if ($mansus=='N') echo 'display:block'; else  echo 'display:none'; ?>">
 <fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
 <?php echo label_for('octipret[porret]', __('Porcentaje a Retener'),'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('octipret{porret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{porret}')): ?>
    <?php echo form_error('octipret{porret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
    <?php $value = input_tag('octipret[porret]', $porret, array (
  'size' => 7,
  'control_name' => 'octipret[porret]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
   <?php echo label_for('sobreel', __('Sobre el '),'class="required"') ?>
  <?php $value = input_tag('octipret[basimp]', $basimp, array (
  'size' => 7,
  'control_name' => 'octipret[basimp]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
  <?php echo label_for('montot', __('% del Monto Total'),'class="required"') ?>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php if($stamon=='N') $val = true; else $val=false; ?>
    <?php echo  radiobutton_tag('octipret[stamon]', 'N', $val,'id="buton"')."Monto Neto"."<br>" ?>
     <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;".radiobutton_tag('octipret[stamon]', 'T', !$val,'id="buton"')."Monto Total"."</br>" ?>
</th>
</tr>
</table>
</div>
</fieldset>
</div>
<div id='consustra' style="<?if ($mansus=='S') echo 'display:block'; else echo 'display:none'; ?>">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Sustraendo') ?></legend>
<div class="form-row">
<table>
<th>
  <?php echo label_for('octipret[unitri]', __('Unidades Tributarias'),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('octipret{unitri}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{unitri}')): ?>
    <?php echo form_error('octipret{unitri}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
    <?php $value = input_tag('octipret[unitri]', $unitri, array (
  'size' => 7,
  'control_name' => 'octipret[unitri]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</th>
<th>&nbsp;&nbsp;&nbsp;</th>
<th>
	<?php echo label_for('octipret[factor]', __('X '.'&nbsp;&nbsp;' .'Factor'),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('octipret{factor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{factor}')): ?>
    <?php echo form_error('octipret{factor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = input_tag('octipret[factor]', $factor, array (
  'size' => 7,
  'control_name' => 'octipret[factor]',
  'onBlur' => "javascript:event.keyCode=13; return entermontofactor(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
<th>&nbsp;&nbsp;&nbsp;</th>
<th>
  <?php echo label_for('octipret[porsus]', __('X '.'&nbsp;&nbsp;'.'Porc. Sustraendo'),'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('octipret{porsus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{porsus}')): ?>
  <?php echo form_error('octipret{porsus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = input_tag('octipret[porsus]', $porsus, array (
  'size' => 7,
  'control_name' => 'octipret[porsus]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;'.'%'?>
 </div>
</th>
</tr>
</table>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<th>
  <?php echo label_for('octipret[basimp]', __('Base  Imponible'),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('octipret{basimp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{basimp}')): ?>
    <?php echo form_error('octipret{basimp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = input_tag('octipret[basimp1]', $basimp1, array (
  'size' => 7,
  'control_name' => 'octipret[basimp1]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'.'% del Monto Total'?>
   </div>
</th>
</tr>
</table>
</div>
</fieldset>
</div>
