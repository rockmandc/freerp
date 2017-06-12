<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp', 'Grid','Linktoapp') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'observe') ?>
<div id="sf_admin_container">
<h1><?php echo __('Revalorización', array()) ?></h1>
<div id="sf_admin_content">
<?php if ($sf_flash->has('notice')): ?>
<div class="save-ok">
<h2><?php echo __($sf_flash->get('notice')) ?></h2>
</div>
<?php endif; ?>
<?php echo form_tag('bieajuinf/index', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php echo input_hidden_tag('depcalculada', 'N') ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table width="75%" border="0">
  <tr>
    <td width="36%" rowspan="3" valign="top">
       <div align="center">
        <p><strong><u><?php echo __('Información:') ?></u></strong></p>
        <p><img src="/images/alerta.png"  ></p>
       </div>
    </td>
    <td width="64%" height="39">
     <fieldset id="sf_fieldset_none" class="">
      <div class="form-row">
        <p><font size="3" face="MS sans-serif"><?php echo __('Revalorización de Bienes') ?></font></p>
        <p><font size="3" face="MS sans-serif"><?php echo __('1.- Reexpresa el valor de los bienes a través del Ajuste por inflación (API)') ?></font><font face="Arial, Helvetica, sans-serif"></font></p>
      </div>
     </fieldset>
    </td>
  </tr>
<tr>
<th>
<div id="fechareval" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo label_for('fecha',__('Fecha de Revalorización') , 'class="required" Style="width:110px"') ?>
<?php echo input_date_tag('fecha','', array(
 'size' => 10,
 'maxlength' => 10,
 'rich' => true,
 'calendar_button_img' => '/sf/sf_admin/images/date.png',
 'date_format' => 'dd/MM/yyyy',
 'onkeyup' => "javascript: mascara(this,'/',patron,true)",
 'onKeyPress' => "javascript:if (event.keyCode==13){return false;}",
 'onBlur'=> remote_function(array(
        'url'      => 'bieajuinf/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('fecha').value != ''",
        'with' => "'ajax=2&codigo='+this.value"
        ))
),date('Y-m-d')) ?>
</div>
</fieldset>
</div>
</th>
<tr>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('API')?></legend>
<div class="form-row">
  <div align=center>
  <button id="vela" name="Submit" type="button" onclick="javascript:ajustar();" ><img src="/images/candado.png"><?php echo __('Ajustar Bienes') ?></button>
  </div>
</div>
</fieldset>
</th>
</tr>
</table>

</form>
</div>
</div>

<script language="JavaScript" type="text/javascript">
  function ajustar()
  {
    $('vela').disabled=true;
    new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1'})
  }
</script>

