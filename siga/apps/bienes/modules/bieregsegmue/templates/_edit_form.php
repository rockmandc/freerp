<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/03 12:20:15
?>
<?php echo form_tag('bieregsegmue/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bnsegmue, 'getId') ?>

<?php use_helper('Javascript') ?>
<?php use_helper('tabs') ?>
<?php use_helper('Date') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php use_helper('Grid'); ?>
<?php use_helper('PopUp') ?>


<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('bnsegmue[codact]', __($labels['bnsegmue{codact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegmue{codact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegmue{codact}')): ?>
    <?php echo form_error('bnsegmue{codact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($bnsegmue, 'getCodact', array (
  'size' => 15,
  'control_name' => 'bnsegmue[codact]',
  'onKeypress' => "javascript:cadena=rayitas(this.value);document.getElementById('bnsegmue_codact').value=cadena;",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracatalogo')",

)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnregmue_Bieregsegmue1/clase/Bnregmue/frame/sf_admin_edit_form/obj1/bnsegmue_codmue/obj2/bnsegmue_codact/obj3/bnsegmue_desmue/campo1/codmue/campo2/codact/campo3/desmue/param1/')?>
 </div>
</th>
<th></th>
<th>
<?php echo label_for('bnsegmue[codmue]', __($labels['bnsegmue{codmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegmue{codmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegmue{codmue}')): ?>
    <?php echo form_error('bnsegmue{codmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($bnsegmue, 'getCodmue', array (
  'size' => 15,
  'control_name' => 'bnsegmue[codmue]',
 // 'onBlur'=> "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('bnsegmue_codmue').value=valor;document.getElementById('bnsegmue_codmue').disabled=false; ".remote_function(array(
    'onBlur'=> "javascript: document.getElementById('bnsegmue_codmue').disabled=false; ".remote_function(array(
  			'url'      => 'bieregsegmue/ajax',
  			'complete' => 'AjaxJSON(request, json)',
  			'with' => "'ajax=1&codactivo='+$('bnsegmue_codact').value+'&cajtexmos=bnsegmue_desmue&cajtexcom=bnsegmue_codmue&codigo='+this.value",
       		)),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnregmue_Bieregsegmue/clase/Bnregmue/frame/sf_admin_edit_form/obj1/bnsegmue_codmue/obj2/bnsegmue_codact/obj3/bnsegmue_desmue/campo1/codmue/campo2/codact/campo3/desmue/param1/'); ?>
  </div>
</th>
</tr>
</table>

<br>
<?php echo label_for('bnsegmue[desmue]', __('Descripción'), 'class="required" ') ?>
   <?php $value = object_input_tag($bnsegmue, 'getDesmue', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'bnsegmue[desmue]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</fieldset>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Póliza de Seguro')?></legend>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('bnsegmue[nrosegmue]', __($labels['bnsegmue{nrosegmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegmue{nrosegmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegmue{nrosegmue}')): ?>
    <?php echo form_error('bnsegmue{nrosegmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('bnsegmue[nrosegmue]', $bnsegmue->getNrosegmue(),
    'bieregsegmue/autocomplete?ajax=3',array('size' => 6, 'autocomplete' => 'off','onBlur'=> remote_function(array(
      'url'      => 'bieregsegmue/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'onBlur' =>  "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('bnsegmue_nrosegmue').value=valor;document.getElementById('bnsegmue_nrosegmue').disabled=false;",
      'script'   => true,
      'with' => "'ajax=2&cajtexcom=bnsegmue_nrosegmue&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>
  </div>
</th>
<th></th>
<th>
<?php echo label_for('bnsegmue[fecsegmue]', __($labels['bnsegmue{fecsegmue}']), 'class="required"') ?>
 <div class="content<?php if ($sf_request->hasError('bnsegmue{fecsegmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegmue{fecsegmue}')): ?>
    <?php echo form_error('bnsegmue{fecsegmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_date_tag($bnsegmue, 'getFecsegmue', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnsegmue[fecsegmue]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
</div>
</th>
</tr>
</table>
<br>

<?php echo label_for('bnsegmue[nomsegmue]', __($labels['bnsegmue{nomsegmue}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegmue{nomsegmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegmue{nomsegmue}')): ?>
    <?php echo form_error('bnsegmue{nomsegmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($bnsegmue, 'getNomsegmue', array (
  'size' => 80,
  'control_name' => 'bnsegmue[nomsegmue]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
<?php echo label_for('bnsegmue[numdeppol]', __($labels['bnsegmue{numdeppol}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegmue{numdeppol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegmue{numdeppol}')): ?>
    <?php echo form_error('bnsegmue{numdeppol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnsegmue, 'getNumdeppol', array (
  'size' => 15,
  'maxlength' => 25,
  'control_name' => 'bnsegmue[numdeppol]',
  )); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
<table>
    <tr>
        <th>
            <?php echo label_for('bnsegmue[fecvigdes]', __($labels['bnsegmue{fecvigdes}']), 'class="required"') ?>
         <div class="content<?php if ($sf_request->hasError('bnsegmue{fecvigdes}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('bnsegmue{fecvigdes}')): ?>
            <?php echo form_error('bnsegmue{fecvigdes}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>
          <?php $value = object_input_date_tag($bnsegmue, 'getFecvigdes', array (
          'rich' => true,
          'maxlength' => 10,
          'calendar_button_img' => '/sf/sf_admin/images/date.png',
          'control_name' => 'bnsegmue[fecvigdes]',
          'date_format' => 'dd/MM/yyyy',
          'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        )); echo $value ? $value : '&nbsp;' ?>
        </div>
        </th>
        
        <th></th>        
        <th>
            <?php echo label_for('bnsegmue[fecvighas]', __($labels['bnsegmue{fecvighas}']), 'class="required"') ?>
             <div class="content<?php if ($sf_request->hasError('bnsegmue{fecvighas}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('bnsegmue{fecvighas}')): ?>
                <?php echo form_error('bnsegmue{fecvighas}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>
              <?php $value = object_input_date_tag($bnsegmue, 'getFecvighas', array (
              'rich' => true,
              'maxlength' => 10,
              'calendar_button_img' => '/sf/sf_admin/images/date.png',
              'control_name' => 'bnsegmue[fecvighas]',
              'date_format' => 'dd/MM/yyyy',
              'onkeyup' => "javascript: mascara(this,'/',patron,true)",
            )); echo $value ? $value : '&nbsp;' ?>
            </div>
        </th>
      </tr>
      <tr>
        <th>
<?php echo label_for('bnsegmue[fecsegven]', __($labels['bnsegmue{fecsegven}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegmue{fecsegven}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegmue{fecsegven}')): ?>
    <?php echo form_error('bnsegmue{fecsegven}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bnsegmue, 'getFecsegven', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnsegmue[fecsegven]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  )); echo $value ? $value : '&nbsp;' ?>
  </div>
</th>
    </tr>
    
</table>
<br>
<?php echo label_for('bnsegmue[prosegmue]', __($labels['bnsegmue{prosegmue}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegmue{prosegmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegmue{prosegmue}')): ?>
    <?php echo form_error('bnsegmue{prosegmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnsegmue, 'getProsegmue', array (
  'size' => 50,
  'control_name' => 'bnsegmue[prosegmue]',
  )); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
<?php echo label_for('bnsegmue[obssegmue]', __($labels['bnsegmue{obssegmue}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnsegmue{obssegmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnsegmue{obssegmue}')): ?>
    <?php echo form_error('bnsegmue{obssegmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($bnsegmue, 'getObssegmue', array (
  'size' => '80x3',
  'control_name' => 'bnsegmue[obssegmue]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
<?php echo input_hidden_tag('fecha_actual', date("d/m/Y")) ?>
</div>
</fieldset>

<fieldset>
<div class="form-row">
<?php echo grid_tag($obj);?>
</div>
</fieldset>
<?php include_partial('edit_actions', array('bnsegmue' => $bnsegmue)) ?>
</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bnsegmue->getId()): ?>
<?php echo button_to(__('delete'), 'bieregsegmue/delete?id='.$bnsegmue->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
