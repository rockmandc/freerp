<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 10:56:10
?>
<?php echo form_tag('almdefart/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('tabs','SubmitClick','PopUp','Javascript','Catalogo') ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs', 'Linktogob') ?>
<?php echo javascript_include_tag('tools','ajax','dFilter') ?>

<?php echo object_input_hidden_tag($cadefart, 'getId') ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo _('Datos de la Empresa') ?></h2></legend>
<div class="form-row">
  <?php echo label_for('cadefart[nomemp]', __($labels['cadefart{nomemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{nomemp}')): ?>
    <?php echo form_error('cadefart{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getNomemp', array (
  'size' => 80,
  'control_name' => 'cadefart[nomemp]', 'disabled' => 'true',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cadefart[diremp]', __($labels['cadefart{diremp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{diremp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{diremp}')): ?>
    <?php echo form_error('cadefart{diremp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getDiremp', array (
  'size' => 100,
  'control_name' => 'cadefart[diremp]','disabled' => 'true',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cadefart[tlfemp]', __($labels['cadefart{tlfemp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{tlfemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{tlfemp}')): ?>
    <?php echo form_error('cadefart{tlfemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getTlfemp', array (
  'control_name' => 'cadefart[tlfemp]','disabled' => 'true',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<table>
   <tr>
   <th> <?php echo label_for('cadefart[tipfin]', __($labels['cadefart{tipfin}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{tipfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{tipfin}')): ?>
    <?php echo form_error('cadefart{tipfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('cadefart[tipfin]', $cadefart->getTipfin(),
    'almdefart/autocomplete?ajax=2',  array('autocomplete' => 'off','size' => 4, 'maxlength' => 4, 'onBlur'=> remote_function(array(
        'url'      => 'almdefart/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=5&cajtexmos=cadefart_nomext&cajtexcom=cadefart_tipfin&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?></div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...','/metodo/Fortipfin_Almsolegr/clase/Fortipfin/frame/sf_admin_edit_form/obj1/cadefart_tipfin/obj2/cadefart_nomext/campo1/codfin/campo2/nomext')?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($cadefart, 'getNomext', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'cadefart[nomext]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

</div>
</fieldset>
</div>
</fieldset>
<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Formatos de Códigos');?>
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Código de Artículo') ?></h2></legend>
<div class="form-row">
  <table>
   <tr>
    <th>
     <?php echo label_for('cadefart[lonart]', __($labels['cadefart{lonart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{lonart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{lonart}')): ?>
    <?php echo form_error('cadefart{lonart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getLonart', array (
  'size' => 7,
  'readonly' => true,
  'control_name' => 'cadefart[lonart]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
    <th>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
      <?php echo label_for('cadefart[rupart]', __($labels['cadefart{rupart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{rupart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{rupart}')): ?>
    <?php echo form_error('cadefart{rupart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getRupart', array (
  'size' => 7,
  'readonly' => true,
  'control_name' => 'cadefart[rupart]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
     <th>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
     <?php echo label_for('cadefart[gencorart]', __($labels['cadefart{gencorart}']), 'class="required" style="width: 200px"') ?>
      <div class="content<?php if ($sf_request->hasError('cadefart{gencorart}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('cadefart{gencorart}')): ?>
        <?php echo form_error('cadefart{gencorart}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_checkbox_tag($cadefart, 'getGencorart', array (
      'control_name' => 'cadefart[gencorart]',
    )); echo $value ? $value : '&nbsp;' ?>
    </th>
   </tr>
  </table>

<br>
<?php if ($esta!='1') {?>
  <?php echo label_for('cadefart[forart]', __($labels['cadefart{forart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{forart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{forart}')): ?>
    <?php echo form_error('cadefart{forart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getForart', array (
  'size' => 30,
  'maxlength' => 30,
  'control_name' => 'cadefart[forart]',
  'onKeyPress' => "javascript: colocar(event,this.value)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<?php } else {?>
  <?php echo label_for('cadefart[forart]', __($labels['cadefart{forart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{forart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{forart}')): ?>
    <?php echo form_error('cadefart{forart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getForart', array (
  'size' => 30,
  'maxlength' => 30,
  'readonly' => true,
  'control_name' => 'cadefart[forart]',
  'onKeyPress' => "javascript: colocar(event,this.value)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<?php } ?>
<br>

  <?php echo label_for('cadefart[desart]', __($labels['cadefart{desart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{desart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{desart}')): ?>
    <?php echo form_error('cadefart{desart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getDesart', array (
  'size' => 30,
  'maxlength' => 30,
  'control_name' => 'cadefart[desart]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Códigos de Ubicación') ?></h2></legend>
<div class="form-row">
<?php if ($esta1!='1') {?>
  <?php echo label_for('cadefart[forubi]', __($labels['cadefart{forubi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{forubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{forubi}')): ?>
    <?php echo form_error('cadefart{forubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getForubi', array (
  'size' => 30,
  'control_name' => 'cadefart[forubi]',
  'onKeyPress' => "javascript: colocar2(event,this.value)",
  'maxlength' => 30,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<?php } else {?>
  <?php echo label_for('cadefart[forubi]', __($labels['cadefart{forubi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{forubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{forubi}')): ?>
    <?php echo form_error('cadefart{forubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getForubi', array (
  'size' => 30,
  'readonly' => true,
  'control_name' => 'cadefart[forubi]',
  'onKeyPress' => "javascript: colocar2(event,this.value)",
  'maxlength' => 30,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <?php } ?>
<br>

  <?php echo label_for('cadefart[desubi]', __($labels['cadefart{desubi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{desubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{desubi}')): ?>
    <?php echo form_error('cadefart{desubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getDesubi', array (
  'size' => 30,
  'control_name' => 'cadefart[desubi]',
  'maxlength' => 30,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Código SNC') ?></h2></legend>
<div class="form-row">
  <?php echo label_for('cadefart[forsnc]', __($labels['cadefart{forsnc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{forsnc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{forsnc}')): ?>
    <?php echo form_error('cadefart{forsnc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getForsnc', array (
  'size' => 20,
  'control_name' => 'cadefart[forsnc]',
  'readonly'  =>  $esta2=='1' ? true : false ,
  'onKeyPress' => "javascript: colocar3(event,this.value)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadefart[dessnc]', __($labels['cadefart{dessnc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{dessnc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{dessnc}')): ?>
    <?php echo form_error('cadefart{dessnc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getDessnc', array (
  'size' => 20,
  'control_name' => 'cadefart[dessnc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</div>
</fieldset>
<br>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('RIF Proveedor') ?></h2></legend>
<div class="form-row">
  <?php echo label_for('cadefart[forpro]', __($labels['cadefart{forpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{forpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{forpro}')): ?>
    <?php echo form_error('cadefart{forpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getForpro', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'cadefart[forpro]',
  //'readonly'  =>  ($esta3=='1' && $cadefart->getForpro()!="")  ? true : false ,  
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadefart[despro]', __($labels['cadefart{despro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{despro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{despro}')): ?>
    <?php echo form_error('cadefart{despro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getDespro', array (
  'size' => 20,
  'maxlength' => 15,
  //'readonly'  =>  ($esta3=='1' && $cadefart->getForpro()!="")  ? true : false ,  
  'control_name' => 'cadefart[despro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</div>
</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Nombres de Formatos Preimpresos') ?></h2></legend>
<div class="form-row">
  <?php echo label_for('cadefart[reppreimpsc]', __($labels['cadefart{reppreimpsc}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{reppreimpsc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{reppreimpsc}')): ?>
    <?php echo form_error('cadefart{reppreimpsc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getReppreimpsc', array (
  'size' => 35,
  'control_name' => 'cadefart[reppreimpsc]',
  'maxlength' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br><br>
<br>
  <?php echo label_for('cadefart[reppreimpoc]', __($labels['cadefart{reppreimpoc}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{reppreimpoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{reppreimpoc}')): ?>
    <?php echo form_error('cadefart{reppreimpoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getReppreimpoc', array (
  'size' => 35,
  'control_name' => 'cadefart[reppreimpoc]',
  'maxlength' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br><br><br>
</div>
</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Úbicación de Artículos') ?></h2></legend>
<div class="form-row">
<?php echo label_for('cadefart[codubi]', __($labels['cadefart{codubi}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{codubi}')): ?>
    <?php echo form_error('cadefart{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $mascaraubi=Herramientas::ObtenerFormato('Cadefart','Forubi'); ?>
  <?php $value = object_input_tag($cadefart, 'getCodubi', array (
  'size' => 10,
  'maxlength' => strlen($mascaraubi),
  'control_name' => 'cadefart[codubi]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
  'onBlur'=> remote_function(array(
       'url'      => 'almdefart/ajax',
       'script'   => true,
       'condition' => "$('cadefart_codubi').value != ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=7&cajtexmos=cadefart_nomubi&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
 &nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cadefubi_Almregart/clase/Cadefubi/frame/sf_admin_edit_form/obj1/cadefart_codubi/obj2/cadefart_nomubi/campo1/codubi/campo2/nomubi",'','','botoncat')?>

  <?php $value = object_input_tag($cadefart, 'getNomubi', array (
  'disabled' => true,
   'size' => 60,
  'control_name' => 'cadefart[nomubi]',
)); echo $value ? $value : '&nbsp;' ?>
</div>  

<br>
</div>
</fieldset>
<br>
<div id="artnosada" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Úbicación de Artículos que no tienen Código SADA') ?></h2></legend>
<div class="form-row">
<?php echo grid_tag_v2($cadefart->getObj());
?>
</div>
</fieldset>
</div>


<br>
<div id="correlpro" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Correlativos Proveedores') ?></h2></legend>
<div class="form-row">
  <?php echo label_for('cadefart[cornac]', __($labels['cadefart{cornac}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{cornac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{cornac}')): ?>
    <?php echo form_error('cadefart{cornac}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, array('getCornac',true), array (
  'size' => 7,
  'control_name' => 'cadefart[cornac]',
  'maxlength' => 8,
  'readonly'  =>  $cadefart->getCornac()!=0 ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadefart[corext]', __($labels['cadefart{corext}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{corext}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{corext}')): ?>
    <?php echo form_error('cadefart{corext}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, array('getCorext',true), array (
  'size' => 7,
  'control_name' => 'cadefart[corext]',
  'maxlength' => 8,
  'readonly'  =>  $cadefart->getCorext()!=0 ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
</div>
<?php tabPageOpenClose("tp1", "tabPage2", 'Integración');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table align="center" width=50%>
<tr>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Imputación del Recargo') ?></h2></legend>
<div class="form-row" align="left">
 <?
if ($cadefart->getAsiparrec()=='P')  {
  ?><?php echo radiobutton_tag('cadefart[asiparrec]', 'P', true)."Código Presupuestario".'<br> <br>';
      echo radiobutton_tag('cadefart[asiparrec]', 'R', false)."Código de Partida".'<br> <br>';
      echo radiobutton_tag('cadefart[asiparrec]', 'C', false)."Costo de Artículos".'<br> <br>';  ?>

<? }else if ($cadefart->getAsiparrec()=='R'){?>
  <?php echo radiobutton_tag('cadefart[asiparrec]', 'P', false)."Código Presupuestario".'<br> <br>';
  echo radiobutton_tag('cadefart[asiparrec]', 'R', true)."Código de Partida".'<br> <br>';
  echo radiobutton_tag('cadefart[asiparrec]', 'C', false)."Costo de Artículos".'<br> <br>';?>

<? } else { ?>
    <?php echo radiobutton_tag('cadefart[asiparrec]', 'P', false)."Código Presupuestario".'<br> <br>';
    echo radiobutton_tag('cadefart[asiparrec]', 'R', false)."Código de Partida".'<br> <br>';
  echo radiobutton_tag('cadefart[asiparrec]', 'C', true)."Costo de Artículos".'<br> <br>';  ?>
  <? } ?>
  </div>
</fieldset>
</th>
</tr>
</table>
</div>
</fieldset>


<?php /* tabPageOpenClose("tp1", "tabPage3", 'Correlativos');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

  <?php echo label_for('cadefart[corcom]', __($labels['cadefart{corcom}']), 'class="required" style="width: 160px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{corcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{corcom}')): ?>
    <?php echo form_error('cadefart{corcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getCorcom', array (
  'size' => 7,
  'maxlength' => 8,
  'readonly'  =>  $cadefart->getCorcom()!=0 ? true : false ,
  'control_name' => 'cadefart[corcom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cadefart[correc2]', __($labels['cadefart{correc2}']), 'class="required" style="width: 160px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{correc2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{correc2}')): ?>
    <?php echo form_error('cadefart{correc2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getCorrec2', array (
  'size' => 7,
  'maxlength' => 8,
  'readonly'  =>  $cadefart->getCorrec2()!=0 ? true : false ,
  'control_name' => 'cadefart[correc2]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cadefart[correq2', __($labels['cadefart{correq2}']), 'class="required" style="width: 160px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{correq2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{correq2}')): ?>
    <?php echo form_error('cadefart{correq2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getCorreq2', array (
  'size' => 7,
  'maxlength' => 8,
  'readonly'  =>  $cadefart->getCorreq2()!=0 ? true : false ,
  'control_name' => 'cadefart[correq2]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cadefart[cordes2]', __($labels['cadefart{cordes2}']), 'class="required" style="width: 160px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{cordes2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{cordes2}')): ?>
    <?php echo form_error('cadefart{cordes2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getCordes2', array (
  'size' => 7,
  'maxlength' => 8,
  'readonly'  =>  $cadefart->getCordes2()!=0 ? true : false ,
  'control_name' => 'cadefart[cordes2]',
)); echo $value ? $value : '&nbsp;' ?>

  </div>

<br>

  <?php echo label_for('cadefart[corser]', __($labels['cadefart{corser}']), 'class="required" style="width: 160px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{corser}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{corser}')): ?>
    <?php echo form_error('cadefart{corser}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getCorser', array (
  'size' => 7,
  'maxlength' => 8,
  'control_name' => 'cadefart[corser]',
  'readonly'  =>  $cadefart->getCorser()!=0 ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cadefart[corsol]', __($labels['cadefart{corsol}']), 'class="required" style="width: 160px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{corsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{corsol}')): ?>
    <?php echo form_error('cadefart{corsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getCorsol', array (
  'size' => 7,
  'maxlength' => 8,
  'control_name' => 'cadefart[corsol]',
  'readonly'  =>  $cadefart->getCorsol()!=0 ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
<br>
  <?php echo label_for('cadefart[corcot2]', __($labels['cadefart{corcot2}']), 'class="required" style="width: 160px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{corcot2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{corcot2}')): ?>
    <?php echo form_error('cadefart{corcot2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getCorcot2', array (
  'size' => 7,
  'maxlength' => 8,
  'control_name' => 'cadefart[corcot2]',
  'readonly'  =>  $cadefart->getCorcot2()!=0 ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cadefart[almcorre]', __($labels['cadefart{almcorre}']), 'class="required" style="width: 160px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{almcorre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{almcorre}')): ?>
    <?php echo form_error('cadefart{almcorre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getAlmcorre', array (
  'size' => 7,
  'maxlength' => 8,
  'control_name' => 'cadefart[almcorre]',
  'readonly'  =>  $cadefart->getAlmcorre()!=0 ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  <br>
  <?php echo label_for('cadefart[corent]', __($labels['cadefart{corent}']), 'class="required" style="width: 160px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{corent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{corent}')): ?>
    <?php echo form_error('cadefart{corent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getCorent', array (
  'size' => 7,
  'maxlength' => 8,
  'control_name' => 'cadefart[corent]',
  'readonly'  =>  $cadefart->getCorent()!=0 ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  <br>
  <?php echo label_for('cadefart[corsal]', __($labels['cadefart{corsal}']), 'class="required" style="width: 160px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{corsal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{corsal}')): ?>
    <?php echo form_error('cadefart{corsal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getCorsal', array (
  'size' => 7,
  'maxlength' => 8,
  'control_name' => 'cadefart[corsal]',
  'readonly'  =>  $cadefart->getCorsal()!=0 ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<? */ ?>



<?php tabPageOpenClose("tp1", "tabPage4", 'Afectación Presupuestaria');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

 <table>
  <tr>
    <th align="left">
    <fieldset id="sf_fieldset_none" class="">
    <legend><h2><?php echo __('Solicitud de Egresos') ?></h2></legend>
    <div class="form-row" width="100%">
      <table width="100%">
      <tr>
      <th>
          <?php echo label_for('cadefart[prcasopre]', __($labels['cadefart{prcasopre}']), 'class="" style="width: 200px"') ?>
          <div class="content<?php if ($sf_request->hasError('cadefart{prcasopre}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('cadefart{prcasopre}')): ?>
            <?php echo form_error('cadefart{prcasopre}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_checkbox_tag($cadefart, 'getPrcasopre', array (
          'control_name' => 'cadefart[prcasopre]',
            'onClick' => 'prcreqapr()',
        )); echo $value ? $value : '&nbsp;' ?>
            </div>
      </th>
      </tr>

      <tr>
      <th>
          <?php echo label_for('cadefart[prcreqapr]', __($labels['cadefart{prcreqapr}']), 'class="" style="width: 200px"') ?>
          <div class="content<?php if ($sf_request->hasError('cadefart{prcreqapr}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('cadefart{prcreqapr}')): ?>
            <?php echo form_error('cadefart{prcreqapr}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_checkbox_tag($cadefart, 'getPrcreqapr', array (
          'control_name' => 'cadefart[prcreqapr]',
            'onClick' => 'prcreqapr()',
        )); echo $value ? $value : '&nbsp;' ?>
            </div>
      </th>
      </tr>
<tr>
</tr>
      </table>
              <?php echo label_for('cadefart[tipdocpre]', __($labels['cadefart{tipdocpre}']), 'class="" Style="width:200px"') ?>
		  <?php echo Catalogo($cadefart,1,array(
		  'getprincipal' => 'getTipdocpre',
		  'getsecundario' => 'getNomdocpre',
		  'campoprincipal' => 'tipdocpre',
		  'camposecundario' => 'nomdocpre',
		  'tamanoprincipal' => '6',
		  'campobase' => 'id_ipdocpre',
		  ), 'Preprecom_Cpdocprc', 'Cpdocprc', ''); ?>
      </div>
    </fieldset>
    </th>
  </tr>
  <tr>
      <th align="left">
    <fieldset id="sf_fieldset_none" class="">
    <legend><h2><?php echo __('Orden de Compra y Servicio') ?></h2></legend>
    <div class="form-row">
      <table width="100%">
      <tr>
      <th>
          <?php echo label_for('cadefart[comasopre]', __($labels['cadefart{comasopre}']), 'class="" style="width: 200px"') ?>
          <div class="content<?php if ($sf_request->hasError('cadefart{comasopre}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('cadefart{comasopre}')): ?>
            <?php echo form_error('cadefart{comasopre}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_checkbox_tag($cadefart, 'getComasopre', array (
          'control_name' => 'cadefart[comasopre]',
            'onClick' => 'comreqapr()',
        )); echo $value ? $value : '&nbsp;' ?>
            </div>
      </th>
      </tr>

      <tr>
      <th>
          <?php echo label_for('cadefart[comreqapr]', __($labels['cadefart{comreqapr}']), 'class="" style="width: 200px"') ?>
          <div class="content<?php if ($sf_request->hasError('cadefart{comreqapr}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('cadefart{comreqapr}')): ?>
            <?php echo form_error('cadefart{comreqapr}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_checkbox_tag($cadefart, 'getComreqapr', array (
          'control_name' => 'cadefart[comreqapr]',
            'onClick' => 'comreqapr()',
        )); echo $value ? $value : '&nbsp;' ?>
            </div>
      </th>
      </tr>

      <tr>
          <th>
              <div id="divdoccom" style="display:none">
               <?php echo label_for('cadefart[tipodoc]', __($labels['cadefart{tipodoc}']), 'class="" Style="width:200px"') ?>
		  <?php echo Catalogo($cadefart,2,array(
		  'getprincipal' => 'getTipodoc',
		  'getsecundario' => 'getNomdoc',
		  'campoprincipal' => 'tipodoc',
		  'camposecundario' => 'nomdoc',
		  'tamanoprincipal' => '4',
		  'campobase' => 'id_ipdocpre',
		  ), 'Cpdoccom_Predoccom', 'Cpdoccom', ''); ?>
               </div>
          </th>
      </tr>
      <tr>
          <th>
              <div id="divcodconpag" style="display:none">
               <?php echo label_for('cadefart[codconpag]', __($labels['cadefart{codconpag}']), 'class="" Style="width:200px"') ?>
		  <?php echo Catalogo($cadefart,3,array(
		  'getprincipal' => 'getCodconpag',
		  'getsecundario' => 'getDesconpag',
		  'campoprincipal' => 'codconpag',
		  'camposecundario' => 'desconpag',
		  'tamanoprincipal' => '4',
		  'campobase' => 'id_ipcodconpag',
		  ), 'Caconpag_Almordcom', 'Caconpag', ''); ?>
               </div>
          </th>
      </tr>
      <tr>
          <th>
              <div id="divcodforent" style="display:none">
               <?php echo label_for('cadefart[codforent]', __($labels['cadefart{codforent}']), 'class="" Style="width:200px"') ?>
		  <?php echo Catalogo($cadefart,4,array(
		  'getprincipal' => 'getCodforent',
		  'getsecundario' => 'getDesforent',
		  'campoprincipal' => 'codforent',
		  'camposecundario' => 'desforent',
		  'tamanoprincipal' => '4',
		  'campobase' => 'id_ipcodforent',
		  ), 'Caforent_Almordcom', 'Caforent', ''); ?>
               </div>
          </th>
      </tr>
      </table>
    </div>
    </fieldset>
    </th>
  </tr>
    <tr>
    <th align="left">
    <fieldset id="sf_fieldset_none" class="">
    <legend><h2><?php echo __('Contratos') ?></h2></legend>
    <div class="form-row" width="100%">
 <?php echo label_for('cadefart[tipdoccon]', __($labels['cadefart{tipdoccon}']), 'class="" Style="width:200px"') ?>
      <?php echo Catalogo($cadefart,6,array(
      'getprincipal' => 'getTipdoccon',
      'getsecundario' => 'getNomdoccon',
      'campoprincipal' => 'tipdoccon',
      'camposecundario' => 'nomdoccon',
      'tamanoprincipal' => '4',
      'campobase' => 'id_ipdoccom',
      ), 'Cpdoccom_Predoccom', 'Cpdoccom', ''); ?>
      </div>
    </fieldset>
    </th>
  </tr>
   <tr>
    <th align="left">
    <fieldset id="sf_fieldset_none" class="">
    <legend><h2><?php echo __('Recargos') ?></h2></legend>
    <div class="form-row" width="100%">
 <?php echo label_for('cadefart[reccoo]', __($labels['cadefart{reccoo}']), 'class="" style="width: 200px"') ?>
          <div class="content<?php if ($sf_request->hasError('cadefart{reccoo}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('cadefart{reccoo}')): ?>
            <?php echo form_error('cadefart{reccoo}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_checkbox_tag($cadefart, 'getReccoo', array (
          'control_name' => 'cadefart[reccoo]',
        )); echo $value ? $value : '&nbsp;' ?>
            </div>
      </div>
    </fieldset>
    </th>
  </tr>
  </table>
</div>
</fieldset>



<?php tabPageOpenClose("tp1", "tabPage5", 'Aprobación');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('cadefart[reqreqapr]', __($labels['cadefart{reqreqapr}']), 'class="required" style="width: 360px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{reqreqapr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{reqreqapr}')): ?>
    <?php echo form_error('cadefart{reqreqapr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

          <?php $value = object_checkbox_tag($cadefart, 'getReqreqapr', array (
          'control_name' => 'cadefart[reqreqapr]',
        )); echo $value ? $value : '&nbsp;' ?>
<br>
<br>
    </div>

  <?php echo label_for('cadefart[solreqapr]', __($labels['cadefart{solreqapr}']), 'class="required" style="width: 360px"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{solreqapr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{solreqapr}')): ?>
    <?php echo form_error('cadefart{solreqapr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

          <?php $value = object_checkbox_tag($cadefart, 'getSolreqapr', array (
          'control_name' => 'cadefart[solreqapr]',
        )); echo $value ? $value : '&nbsp;' ?>
<br>
<br>
    </div>
</div>

</fieldset>

<?php tabPageOpenClose("tp1", "tabPage6", 'Datos del Contratante');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('cadefart[percon]', __($labels['cadefart{percon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{percon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{percon}')): ?>
    <?php echo form_error('cadefart{percon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getPercon', array (
  'size' => 80,
  'control_name' => 'cadefart[percon]',
  'maxlength' => 250,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadefart[faxcon]', __($labels['cadefart{faxcon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{faxcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{faxcon}')): ?>
    <?php echo form_error('cadefart{faxcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getFaxcon', array (
  'size' => 80,
  'control_name' => 'cadefart[faxcon]',
  'maxlength' => 30,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadefart[emacon]', __($labels['cadefart{emacon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('cadefart{emacon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefart{emacon}')): ?>
    <?php echo form_error('cadefart{emacon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefart, 'getEmacon', array (
  'size' => 80,
  'control_name' => 'cadefart[emacon]',
  'maxlength' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php tabInit();?>
<?php include_partial('edit_actions', array('cadefart' => $cadefart)) ?>

</form>

<script type="text/javascript">
  var correlp='<?php echo $manprocor ?>';
  if (correlp=='S')
  {
  	$('correlpro').show();
  }
  var manorddon='<?php echo $cadefart->getManorddon();?>';
  if (manorddon=='S')
      $('divdoccom').show();

  var conpagfij='<?php echo $cadefart->getConpagfij();?>';
  if (conpagfij=='S') {
      $('divcodconpag').show();
      $('divcodforent').show();
  }
  var verartnosada='<?php echo H::getConfApp2('verartnosada', 'compras', 'almentalm');?>';
  if (verartnosada=='S') 
   $('artnosada').show();
      
  


  function colocar(e,id)
  {
    if (e.keyCode==13)
    {
    if (id.substr(1,1)=='#')
    {
      letra='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $('cadefart_lonart').value=id.length;
    val=id.split("-");
    rup=parseInt(val.length);
    $('cadefart_rupart').value=rup;

    j=0;
    res="";
    while (j<rup)
    {
      if (j==0)
      {
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      res=res+val[j];
    }
    else
    {
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      val[j]=val[j].replace('#',letra.substr(j,1));
      res=res+"-"+val[j];
    }
    j++;
    }
    $('cadefart_desart').value=res;
    }
    else
    {
      alert('El Caracter que esta usando es errado, debe el mismo debe ser #');
    }
   }
  }

  function colocar2(e,id)
  {
    if (e.keyCode==13)
    {
    if (id.substr(1,1)=='#')
    {
      letra='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    val=id.split("-");
    rup=parseInt(val.length);

    j=0;
    res="";
    while (j<rup)
    {
    if (j==0)
    {
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    res=res+val[j];
    }
    else
    {
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    res=res+"-"+val[j];
    }
    j++;
    }
    $('cadefart_desubi').value=res;
    }
    else { alert('El Caracter que esta usando es errado, debe el mismo debe ser #'); }
   }
  }

  function colocar2(e,id)
  {
    if (e.keyCode==13)
    {
    if (id.substr(1,1)=='#')
    {
      letra='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    val=id.split("-");
    rup=parseInt(val.length);

    j=0;
    res="";
    while (j<rup)
    {
    if (j==0)
    {
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    res=res+val[j];
    }
    else
    {
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    res=res+"-"+val[j];
    }
    j++;
    }
    $('cadefart_desubi').value=res;
    }
    else { alert('El Caracter que esta usando es errado, debe el mismo debe ser #'); }
   }
  }

  function colocar3(e,id)
  {
    if (e.keyCode==13)
    {
    if (id.substr(1,1)=='#')
    {
      letra='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    val=id.split("-");
    rup=parseInt(val.length);

    j=0;
    res="";
    while (j<rup)
    {
    if (j==0)
    {
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    res=res+val[j];
    }
    else
    {
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    val[j]=val[j].replace('#',letra.substr(j,1));
    res=res+"-"+val[j];
    }
    j++;
    }
    $('cadefart_dessnc').value=res;
    }
    else { alert('El Caracter que esta usando es errado, debe el mismo debe ser #'); }
   }
  }


  function prcreqapr()
  {
    if (!$('cadefart_prcasopre').checked)
    {
        $('cadefart_prcreqapr').checked=false;
    }
  }

  function comreqapr()
  {
    if (!$('cadefart_comasopre').checked)
    {
        $('cadefart_comreqapr').checked=false;
    }
  }


</script>



