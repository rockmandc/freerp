<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 10:38:01
?>
<?php echo form_tag('tesdefcueban/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('tools','observe','ajax','dFilter') ?>
<?php echo object_input_hidden_tag($tsdefban, 'getId') ?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo input_hidden_tag('tsdefban[fecreg]', date('d/m/Y')) ?>
<?php echo input_hidden_tag('tsdefban[debban]', $tsdefban->getDebban()) ?>
<?php echo input_hidden_tag('tsdefban[creban]', $tsdefban->getCreban()) ?>
<?php echo input_hidden_tag('tsdefban[deblib]', $tsdefban->getDeblib()) ?>
<?php echo input_hidden_tag('tsdefban[crelib]', $tsdefban->getCrelib()) ?>
<?php if ($tsdefban->getMossalmin()=='S' && $tsdefban->getId()!="") { ?>
<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo $tsdefban->getEtiqueta() ;?></font></strong></th>
  </tr>
</table>
<?php } ?>

<fieldset id="sf_fieldset_none" class="">
<legend><? echo __('Datos del Banco') ?></legend>
<div class="form-row">
  <?php echo label_for('tsdefban[numcue]', __($labels['tsdefban{numcue}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{numcue}')): ?>
    <?php echo form_error('tsdefban{numcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getNumcue', array (
  'size' => 30,
  'control_name' => 'tsdefban[numcue]',
  'maxlength' => 20,
  'readonly' => $tsdefban->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('tsdefban[nomcue]', __($labels['tsdefban{nomcue}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{nomcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{nomcue}')): ?>
    <?php echo form_error('tsdefban{nomcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getNomcue', array (
  'size' => 60,
  'control_name' => 'tsdefban[nomcue]',
  'maxlength' => 40,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
<div id="adicional" style="display:none">
  <?php echo label_for('tsdefban[codadi]', __($labels['tsdefban{codadi}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{codadi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{codadi}')): ?>
    <?php echo form_error('tsdefban{codadi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getCodadi', array (
  'size' => 5,
  'control_name' => 'tsdefban[codadi]',
  'maxlength' => 2,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
</div>


  <?php echo label_for('tsdefban[tipcue]', __($labels['tsdefban{tipcue}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{tipcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{tipcue}')): ?>
    <?php echo form_error('tsdefban{tipcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo input_auto_complete_tag('tsdefban[tipcue]', $tsdefban->getTipcue(),
    'tesdefcueban/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 3,'onBlur'=> remote_function(array(
       'url'      => 'tesdefcueban/ajax',
       'complete' => 'AjaxJSON(request, json)',
       'condition' => "$('tsdefban_tipcue').value != '' && $('id').value == ''",
       'with' => "'ajax=1&cajtexmos=tsdefban_destip&cajtexcom=tsdefban_tipcue&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
  ?>
&nbsp;
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tstipcue_tesdefcueban/clase/Tstipcue/frame/sf_admin_edit_form/obj1/tsdefban_tipcue/obj2/tsdefban_destip/campo1/codtip/campo2/destip')?>
&nbsp;
  <?php $value = object_input_tag($tsdefban, 'getDestip', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'tsdefban[destip]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<table>
<tr>
<th>
  <?php echo label_for('tsdefban[codcta]', __($labels['tsdefban{codcta}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{codcta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{codcta}')): ?>
    <?php echo form_error('tsdefban{codcta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($tsdefban, 'getCodcta', array (
  'size' => 32,
  'maxlength'=> $loncta,
  'control_name' => 'tsdefban[codcta]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
        'url'      => 'tesdefcueban/ajax',
        'complete' => 'AjaxJSON(request, json), verificar()',
        'condition' => "$('tsdefban_codcta').value != ''",
          'with' => "'ajax=5&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?> <?php echo input_hidden_tag('cargable', '') ?>
&nbsp;
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_tesdefcueban/clase/Contabb/frame/sf_admin_edit_form/obj1/tsdefban_codcta/obj2/cargable/campo1/codcta/campo2/cargab')?>
    </div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
  <?php echo label_for('tsdefban[valche]', __($labels['tsdefban{valche}']), 'class="required" Style="width:180px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{valche}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{valche}')): ?>
    <?php echo form_error('tsdefban{valche}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getValche', array (
  'size' => 7,
  'maxlength' => 7,
  'control_name' => 'tsdefban[valche]',
  'onkeypress' =>"javascript:return num(event)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>

<table>
<tr>
<th>
  <?php echo label_for('tsdefban[fecper]', __($labels['tsdefban{fecper}']), 'class="required" Style="width:140px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{fecper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{fecper}')): ?>
    <?php echo form_error('tsdefban{fecper}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsdefban, 'getFecper', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yy',
  'control_name' => 'tsdefban[fecper]',
  'readonly' => $tsdefban->getId()!='' ? true : false ,
   'onkeyup' => "javascript: mascara(this,'/',patron,true)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('tsdefban[fecven]', __($labels['tsdefban{fecven}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{fecven}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{fecven}')): ?>
    <?php echo form_error('tsdefban{fecven}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsdefban, 'getFecven', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yy',
  'control_name' => 'tsdefban[fecven]',
 'onkeyup' => "javascript: mascara(this,'/',patron,true)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 </th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('tsdefban[concil]', __($labels['tsdefban{concil}']), 'class="required" Style="width:20px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{concil}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{concil}')): ?>
    <?php echo form_error('tsdefban{concil}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($tsdefban->getConcil()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('tsdefban[concil]', 'S', $val) ?>&nbsp;
  <?php echo "No ".radiobutton_tag('tsdefban[concil]', 'N', !$val) ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('tsdefban[conformable]', __($labels['tsdefban{conformable}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{conformable}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{conformable}')): ?>
    <?php echo form_error('tsdefban{conformable}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($tsdefban->getConformable()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('tsdefban[conformable]', 'S', $val) ?>&nbsp;
  <?php echo "No ".radiobutton_tag('tsdefban[conformable]', 'N', !$val) ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('tsdefban[monconfor]', __($labels['tsdefban{monconfor}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{monconfor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{monconfor}')): ?>
    <?php echo form_error('tsdefban{monconfor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php $value = object_input_tag($tsdefban, array('getMonconfor',true), array (
  'size' => 15,
  'control_name' => 'tsdefban[monconfor]',
   'onBlur' => "javascript:event.keyCode=13; return mientermonto(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>

<table>
<tr>
<th>
  <?php echo label_for('tsdefban[renaut]', __($labels['tsdefban{renaut}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{renaut}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{renaut}')): ?>
    <?php echo form_error('tsdefban{renaut}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($tsdefban->getRenaut()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('tsdefban[renaut]', 'S', $val) ?>&nbsp;
  <?php echo "No ".radiobutton_tag('tsdefban[renaut]', 'N', !$val) ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('tsdefban[fecape]', __($labels['tsdefban{fecape}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{fecape}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{fecape}')): ?>
    <?php echo form_error('tsdefban{fecape}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsdefban, 'getFecape', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yy',
  'control_name' => 'tsdefban[fecape]',
 'onkeyup' => "javascript: mascara(this,'/',patron,true)",
 'onBlur'=> remote_function(array(
        'url'      => 'tesdefcueban/ajax',
        'complete' => 'AjaxJSON(request, json), verificar1()',
        'condition' => "$('tsdefban_fecape').value != '' && $('id').value == ''",
          'with' => "'ajax=6&cuenta='+$('tsdefban_numcue').value+'&codigo='+this.value",
        )),
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('valida', '') ?> <?php echo input_hidden_tag('numche2', '') ?>

    </div>
</th>
<th>
&nbsp;
 <?php echo  button_to_popup('Cheques Emitidos',cross_app_link_to('herramientas','catalogo').'/metodo/Tscheemi_Tesdefcueban/clase/Tscheemi/frame/sf_admin_edit_form/obj1/tsdefban_numche2/campo1/numche/param1/'.$tsdefban->getNumcue())?>
&nbsp;
</th>
<?php if ($tsdefban->getMossalmin()=='S') {?>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<div class="content<?php if ($sf_request->hasError('tsdefban{salmin}')): ?> form-error<?php endif; ?>">
  <?php echo label_for('tsdefban[salmin]', __($labels['tsdefban{salmin}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{salmin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{salmin}')): ?>
    <?php echo form_error('tsdefban{salmin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, array('getSalmin',true), array (
  'size' => 15,  
  'control_name' => 'tsdefban[salmin]',
  'onBlur' => "javascript:event.keyCode=13; return mientermonto(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</th>
<?php } ?>
</tr>
</table>


  <?php echo label_for('tsdefban[agenban]', __($labels['tsdefban{agenban}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{agenban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{agenban}')): ?>
    <?php echo form_error('tsdefban{agenban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getAgenban', array (
  'size' => 80,
  'control_name' => 'tsdefban[agenban]',
  'maxlength' => 500,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
 <?php echo label_for('tsdefban[codtiptra]', __($labels['tsdefban{codtiptra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{codtiptra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{codtiptra}')): ?>
    <?php echo form_error('tsdefban{codtiptra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo Catalogo($tsdefban,8,array(
  'getprincipal' => 'getCodtiptra',
  'getsecundario' => 'getDestiptra',
  'campoprincipal' => 'codtiptra',
  'camposecundario' => 'destiptra',
  'campobase' => 'codtiptra_id',
  ), 'ConFinActCom_Cotiptra', 'Cotiptra', '', ''); ?>

</div>
<br>
 <?php echo label_for('tsdefban[coddirec]', __($labels['tsdefban{coddirec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{coddirec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{coddirec}')): ?>
    <?php echo form_error('tsdefban{coddirec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo Catalogo($tsdefban,10,array(
  'getprincipal' => 'getCoddirec',
  'getsecundario' => 'getDesdirec',
  'campoprincipal' => 'coddirec',
  'camposecundario' => 'desdirec',
  'campobase' => 'coddirec_id',
  ), 'Tesdefcueban_coddirec', 'Cadefdirec', '', ''); ?>

</div>
<br>
<?php echo label_for('tsdefban[escajchi]', __($labels['tsdefban{escajchi}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{escajchi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{escajchi}')): ?>
    <?php echo form_error('tsdefban{escajchi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($tsdefban->getEscajchi()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('tsdefban[escajchi]', 'S', $val) ?>&nbsp;
  <?php echo "No ".radiobutton_tag('tsdefban[escajchi]', 'N', !$val) ?>
    </div>
<br>
</div>
</fieldset>


<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Información General');?>
<fieldset>
<legend><? echo __('Informacion General') ?></legend>
<div class="form-row">
<table>
 <tr>
  <th>
  <fieldset>
  <div class="form-row">
  <?php echo label_for('tsdefban[tipint]', __($labels['tsdefban{tipint}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{tipint}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{tipint}')): ?>
    <?php echo form_error('tsdefban{tipint}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php echo select_tag('tsdefban[tipint]', options_for_select($grupo,$tsdefban->getTipint(),'include_custom=Seleccione Uno')) ?>
    </div>

    <br>

    <?php echo label_for('tsdefban[usocue]', __($labels['tsdefban{usocue}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{usocue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{usocue}')): ?>
    <?php echo form_error('tsdefban{usocue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getUsocue', array (
  'size' => 20,
   'maxlength' => 20,
  'control_name' => 'tsdefban[usocue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>

   <table>
     <tr>
     <th>
      <?php echo label_for('tsdefban[tipren]', __($labels['tsdefban{tipren}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{tipren}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{tipren}')): ?>
    <?php echo form_error('tsdefban{tipren}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo input_auto_complete_tag('tsdefban[tipren]', $tsdefban->getTipren(),
    'tesdefcueban/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 3,'onBlur'=> remote_function(array(
       'url'      => 'tesdefcueban/ajax',
       'complete' => 'AjaxJSON(request, json)',
       'condition' => "$('tsdefban_tipren').value != '' && $('id').value == ''",
       'with' => "'ajax=2&cajtexmos=tsdefban_destipren&cajtexcom=tsdefban_tipren&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
  ?></div>
     </th>
     <th>
     &nbsp;
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tstipren_tesdefcueban/clase/Tstipren/frame/sf_admin_edit_form/obj1/tsdefban_tipren/obj2/tsdefban_destipren/campo1/codtip/campo2/destip')?>
     </th>
     </tr>
    </table>

    <br>

    <?php $value = object_input_tag($tsdefban, 'getDestipren', array (
  'disabled' => true,
 'size' => 60,
  'control_name' => 'tsdefban[destipren]',
)); echo $value ? $value : '&nbsp;' ?>
    
      <br>
      <br>
          <?php echo label_for('tsdefban[nomrep]', __($labels['tsdefban{nomrep}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{nomrep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{nomrep}')): ?>
    <?php echo form_error('tsdefban{nomrep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getNomrep', array (
  'size' => 30,
   'maxlength' => 50,
  'control_name' => 'tsdefban[nomrep]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
      <br><br>

<br>

 <?php echo label_for('tsdefban[codmon]', __($labels['tsdefban{codmon}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{codmon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{codmon}')): ?>
    <?php echo form_error('tsdefban{codmon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('tsdefban[codmon]', options_for_select(TsdesmonPeer::getMonedas(),$tsdefban->getCodmon(),'include_custom=Seleccione una...')) ?>
  </div>

<br>

  <?php echo label_for('tsdefban[codcom]', __($labels['tsdefban{codcom}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{codcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{codcom}')): ?>
    <?php echo form_error('tsdefban{codcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
      
    <?php $value = object_input_tag($tsdefban, 'getCodcom', array (
  'size' => 10,
   'maxlength' => 3,
  'control_name' => 'tsdefban[codcom]',
  'onBlur'=> remote_function(array(
       'url'      => 'tesdefcueban/ajax',
       'complete' => 'AjaxJSON(request, json)',
       'condition' => "$('tsdefban_codcom').value != ''",
       'with' => "'ajax=7&cajtexmos=tsdefban_descom&cajtexcom=tsdefban_codcom&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?> 
      

&nbsp;
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tscomban_tesdefcueban/clase/Tscomban/frame/sf_admin_edit_form/obj1/tsdefban_codcom/obj2/tsdefban_descom/campo1/codcom/campo2/descom')?>
&nbsp; <br>
  <?php $value = object_input_tag($tsdefban, 'getDescom', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'tsdefban[descom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('tsdefban[codubi]', __($labels['tsdefban{codubi}']), 'class="required" Style="width:100px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{codubi}')): ?>
    <?php echo form_error('tsdefban{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
      
    <?php $value = object_input_tag($tsdefban, 'getCodubi', array (
  'size' => 30,
   'maxlength' => $lonubi,
  'control_name' => 'tsdefban[codubi]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
  'onBlur'=> remote_function(array(
       'url'      => 'tesdefcueban/ajax',
       'before'  => "cadena=rayitas(this.value);document.getElementById('tsdefban_codubi').value=cadena;",
       'complete' => 'AjaxJSON(request, json)',
       'condition' => "$('tsdefban_codubi').value != ''",
       'with' => "'ajax=9&cajtexmos=tsdefban_desubi&cajtexcom=tsdefban_codubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?> 
      

&nbsp;
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_Pagemiord/clase/Bnubica/frame/sf_admin_edit_form/obj1/tsdefban_codubi/obj2/tsdefban_desubi/campo1/codubi/campo2/desubi/param1/'.$lonubi)?>
&nbsp; <br>
  <?php $value = object_input_tag($tsdefban, 'getDesubi', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'tsdefban[desubi]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>      
    <br>      
</div>
</fieldset>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
  <fieldset>
<legend><? echo __('Saldo de la Cuenta') ?></legend>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('vacio', __(''), 'class="required"') ?>
</th>
<th>
<?php echo label_for('vacio', __(''), 'class="required"') ?>
<?php echo label_for('Bancos', __('Bancos'), 'class="required"') ?>
</th>
<th>
 <?php echo label_for('vacio', __(''), 'class="required"') ?>
 <?php echo label_for('Bancos', __('Libros'), 'class="required"') ?>
</th>
</tr>
<tr>
<th>
<?php echo label_for('saldoanterior', __('Saldo Anterior'), 'class="required" style="width:95px" ') ?>
</th>
<th>
<div class="content<?php if ($sf_request->hasError('tsdefban{antban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{antban}')): ?>
    <?php echo form_error('tsdefban{antban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, array('getAntban',true), array (
  'size' => 15,
  'readonly' => ($tsdefban->getId()!='' && $tsdefban->getAntban()>0) ? true : false ,
  'control_name' => 'tsdefban[antban]',
  'onBlur' => "javascript:event.keyCode=13; return mientermonto(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</th>
<th>
  <div class="content<?php if ($sf_request->hasError('tsdefban{antlib}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{antlib}')): ?>
    <?php echo form_error('tsdefban{antlib}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, array('getAntlib',true), array (
  'size' => 15,
  'readonly' => ($tsdefban->getId()!='' && $tsdefban->getAntlib()>0) ? true : false ,
  'control_name' => 'tsdefban[antlib]',
   'onBlur' => "javascript:event.keyCode=13; return mientermontoLib(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
<tr>
<th>
<?php echo label_for('debitos', __('Débitos'), 'class="required" ') ?>
</th>
<th>
<div class="content<?php if ($sf_request->hasError('tsdefban{debbandis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{debbandis}')): ?>
    <?php echo form_error('tsdefban{debbandis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, array('getDebbandis',true), array (
  'size' => 15,
  'readonly' => $tsmovban_credito_debito,
  'control_name' => 'tsdefban[debbandis]',
  'onBlur' => "javascript:event.keyCode=13; return  mientermonto(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</th>
<th>
<div class="content<?php if ($sf_request->hasError('tsdefban{deblibdis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{deblibdis}')): ?>
    <?php echo form_error('tsdefban{deblibdis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getDeblibdis', array (
  'size' => 15,
  'readonly' => $tsmovlib_credito_debito,
  'control_name' => 'tsdefban[deblibdis]',
  'onBlur' => "javascript:event.keyCode=13; return mientermontoLib(event, this.id )",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
<tr>
<th>
<?php echo label_for('creditos', __('Créditos'), 'class="required" ') ?>
</th>
<th>
<div class="content<?php if ($sf_request->hasError('tsdefban{crebandis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{crebandis}')): ?>
    <?php echo form_error('tsdefban{crebandis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, array('getCrebandis',true), array (
  'size' => 15,
  'readonly' => $tsmovban_credito_debito,
  'control_name' => 'tsdefban[crebandis]',
   'onBlur' => "javascript:event.keyCode=13; return mientermonto(event, this.id)",
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
     <div class="content<?php if ($sf_request->hasError('tsdefban{crelibdis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{crelibdis}')): ?>
    <?php echo form_error('tsdefban{crelibdis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getCrelibdis', array (
  'size' => 15,
  'readonly' => $tsmovlib_credito_debito,
  'control_name' => 'tsdefban[crelibdis]',
    'onBlur' => "javascript:event.keyCode=13; return mientermontoLib(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
<tr>
<th colspan=3 height=2></th>
</tr>
<tr>
<th colspan=3 height=2 style=background-color:#CCCCCC></th>
</tr>
<tr>
<th colspan=3 height=2></th>
</tr>
<th>
<?php echo label_for('saldoactual', __('Saldo Actual'), 'class="required" ') ?>
</th>
<th>
 <?php echo label_for('vacio', __(''), 'class="required"') ?>
  <?php $value = object_input_tag($tsdefban, 'getSaltotban', array (
  'size' => 15,
  'readonly' => $tsdefban->getId()!='' ? true : false ,
  'control_name' => 'tsdefban[saltotban]',
  'disabled' => 'true',
  )); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
 <?php echo label_for('vacio', __(''), 'class="required"') ?>
  <?php $value = object_input_tag($tsdefban, 'getSaltotlib', array (
  'size' => 15,
  'readonly' => $tsdefban->getId()!='' ? true : false ,
  'control_name' => 'tsdefban[saltotlib]',
  'disabled' => 'true',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>
</div>
</fieldset>
  </th>
 </tr>
</table>
</div>
</fieldset>


<?php tabPageOpenClose("tp1", "tabPage2", 'Manejo de Chequeras');?>
<fieldset>
<legend><? echo __('Manejo de Chequeras') ?></legend>
<div class="form-row">
<table>
<tr>
<th>
  <?php echo label_for('tsdefban[cantdig]', __($labels['tsdefban{cantdig}']), 'class="required" Style="width:250px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{cantdig}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{cantdig}')): ?>
    <?php echo form_error('tsdefban{cantdig}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getCantdigact', array (
  'size' => 7,
  'maxlength' => 2,
  'readonly' => $tsdefban->getId()!='' ? true : false ,
  'control_name' => 'tsdefban[cantdig]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('tsdefban[endosable]', __($labels['tsdefban{endosable}']), 'class="required" Style="width:20px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{endosable}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{endosable}')): ?>
    <?php echo form_error('tsdefban{endosable}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($tsdefban->getEndosable()=='S') $val = true; else $val=false; ?>
  <?php echo "Si ".radiobutton_tag('tsdefban[endosable]', 'S', $val) ?>&nbsp;
  <?php echo "No ".radiobutton_tag('tsdefban[endosable]', 'N', !$val) ?>
    </div>
</th>
</tr>
</table>
<br>
 <?php echo label_for('tsdefban[corchetran]', __($labels['tsdefban{corchetran}']), 'class="required" Style="width:250px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{corchetran}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{corchetran}')): ?>
    <?php echo form_error('tsdefban{corchetran}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getCorchetran', array (
  'size' => 7,
  'maxlength' => 8,
  'control_name' => 'tsdefban[corchetran]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br><br>
<?php echo grid_tag($obj);?>

</div>
</fieldset>

<?php if ($tsdefban->getTieimpcarban()=='S') tabPageOpenClose("tp1", "tabPage3", 'Datos para Imprimir Cartas al Banco');?>
<div class="form-row" id="datimpcarban" style="display:none">
<?php echo label_for('tsdefban[nomciu]', __($labels['tsdefban{nomciu}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{nomciu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{nomciu}')): ?>
    <?php echo form_error('tsdefban{nomciu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getNomciu', array (
  'size' => 80,
  'control_name' => 'tsdefban[nomciu]',
  'maxlength' => 1000,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('tsdefban[arerep]', __($labels['tsdefban{arerep}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{arerep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{arerep}')): ?>
    <?php echo form_error('tsdefban{arerep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getArerep', array (
  'size' => 80,
  'control_name' => 'tsdefban[arerep]',
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('tsdefban[aterep]', __($labels['tsdefban{aterep}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{aterep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{aterep}')): ?>
    <?php echo form_error('tsdefban{aterep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getAterep', array (
  'size' => 80,
  'control_name' => 'tsdefban[aterep]',
  'maxlength' => 1000,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <?php echo label_for('tsdefban[cuebcv]', __($labels['tsdefban{cuebcv}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tsdefban{cuebcv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsdefban{cuebcv}')): ?>
    <?php echo form_error('tsdefban{cuebcv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsdefban, 'getCuebcv', array (
  'size' => 25,
  'control_name' => 'tsdefban[cuebcv]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>    
</div>


<?php tabInit('tp1','0');?>

<?php include_partial('edit_actions', array('tsdefban' => $tsdefban)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($tsdefban->getId()): ?>
<?php echo button_to(__('delete'), 'tesdefcueban/delete?id='.$tsdefban->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

  <script type="text/javascript">

 var tieadi='<?php echo $tsdefban->getTiecodadi();?>';
 if (tieadi=='S')
  $('adicional').show();

 var tieimpcarban='<?php echo $tsdefban->getTieimpcarban();?>';
 if (tieimpcarban=='S')
  $('datimpcarban').show();

    String.prototype.pad = function(l, s, t){
        return s || (s = " "), (l -= this.length) > 0 ? (s = new Array(Math.ceil(l / s.length)
    + 1).join(s)).substr(0, t = !t ? l : t == 1 ? 0 : Math.ceil(l / 2))
    + this + s.substr(0, l - t) : this;
         };

function validarEntero(id)
{
     valor = $(id).value;
     valor = parseInt(valor);

      if (isNaN(valor))
      {
            $(id).value='';
            $(id).focus();
      }
      else
      {
         $(id).value=valor;
      }
}

function num(e) {
    evt = e ? e : event;
    tcl = (window.Event) ? evt.which : evt.keyCode;
    if ((tcl < 48 || tcl > 57 ) && tcl != '8')
    {
        return false;
    }
    return true;
}


  function ConChe(id)  //Consultar Chequera
  {
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var numchedes="ax_"+fil+"_"+'2';
  var numchehas="ax_"+fil+"_"+'4';

  if (document.getElementById(numchedes).value!='' && document.getElementById(numchehas).value!='' )
  {
      obj1= document.getElementById(numchedes).value;
      obj2= document.getElementById(numchehas).value;
      obj3= document.getElementById('tsdefban_numcue').value;
     window.open('/tesoreria'+getEnv()+'.php/tesdefcueban/gridcheques?numchedes='+obj1+'&numchehas='+obj2+'&numcue='+obj3,'...','menubar=no,toolbar=no,scrollbars=no,width=950,height=500,resizable=yes,left=200,top=150')
  }
  }

 function mientermonto(e,id)
   {
  if (e.keyCode==13)
   {
    if (validarnumero(id)==true)
     {
       if (id=='tsdefban_debbandis'){
         $('tsdefban_debban').value=$(id).value;
       }else if (id=='tsdefban_crebandis'){
         $('tsdefban_creban').value=$(id).value;
       }

       var num=toFloat(id);

       document.getElementById(id).value=format(num.toFixed(2),'.',',','.');
       //Obtener Saldo Actual para Bancos

       var antban=toFloat('tsdefban_antban');
       var debban=toFloat('tsdefban_debbandis');
       var creban=toFloat('tsdefban_crebandis');

       var salactban=antban+debban-creban;
       document.getElementById('tsdefban_saltotban').value=format(salactban.toFixed(2),'.',',','.');
       }
      else
     {
       //alert("Dato Invalido");
      document.getElementById(id).value='0,00';
      document.getElementById(id).focus();
      document.getElementById(id).select();
       }
   }
   } //end function

  function mientermontoLib(e,id)
  {
   if (e.keyCode==13)
   {
    if (validarnumero(id)==true)
     {
       if (id=='tsdefban_deblibdis'){
         $('tsdefban_deblib').value=$(id).value;
       }else if (id=='tsdefban_crelibdis'){
         $('tsdefban_crelib').value=$(id).value;
       }

       var num=toFloat(id);
       document.getElementById(id).value=format(num.toFixed(2),'.',',','.');

       //Obtener Saldo Actual paralibros

       var antban=toFloat('tsdefban_antlib');
       var debban=toFloat('tsdefban_deblibdis');
       var creban=toFloat('tsdefban_crelibdis');

       var salactlib=antban+debban-creban;
       document.getElementById('tsdefban_saltotlib').value=format(salactlib.toFixed(2),'.',',','.');
       }
      else
     {
       //alert("Dato Invalido");
      document.getElementById(id).value='0,00';
      document.getElementById(id).focus();
      document.getElementById(id).select();
       }
   }
   } //end function


function verificar()
{
  if ($('cargable').value!='C' && $('tsdefban_codcta').value!="")
  {
  	alert('La Cuenta Contable no es Cargable, Por favor Cambiela por una Cuenta Cargable');
  	$('tsdefban_codcta').value="";
  }
}

 function verificar1()
{
  if ($('valida').value=='S' && $('tsdefban_fecape').value!="")
  {
  	alert('La Fecha debe ser menor a la de los Movimientos del Banco');
  	$('tsdefban_fecape').value="";
  }
}

 function activar(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var valor=$(id).value

   if (activa_repetido(id))
   {
     alert('Ya existe una Chequera Activa');
	 $(id).value='NO';
   }
 }

 function activa_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var activa_repetido='SI';

   var activarepetido=false;
   var am=totalregistros('ax',1,50);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_5";

    var activa_repetido2=$(codigo).value;
    if (i!=fila)
    {
      if (activa_repetido==activa_repetido2)
      {
        activarepetido=true;
        break;
      }
    }
   i++;
   }
   return activarepetido;
 }

 function totalregistros(letra,posicion,filas)
  {
    var fil=0;
    var total=0;
    while (fil<filas)
    {
      var chk=letra+"_"+fil+"_"+posicion;
      if ($(chk).value!="")
      { total=total + 1; }
     fil++;
    }
    return total;
  }

  function generarnrochefin(id)
  {
	  var aux = id.split("_");
	  var name=aux[0];
	  var fil=aux[1];
	  var col=parseInt(aux[2]);

	  var numchedes=name+"_"+fil+"_2";
	  var numchehas=name+"_"+fil+"_4";

    if ($(id).value!="" && $(numchedes).value!="")
    {
      var canche=toFloat(id);
      var valchedes=toFloat(numchedes);

      var valchefin=valchedes+canche-1;
      var valor= valchefin.toString();
      valor=valor.pad("8", "0",0);
      $(numchehas).value=valor;
     }
  }
</script>
