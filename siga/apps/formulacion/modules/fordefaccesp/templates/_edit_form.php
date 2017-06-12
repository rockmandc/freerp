<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 45299 2011-07-26 15:41:21Z dmartinez $
 */
// date: 2007/06/18 12:23:52
?>
<?php echo form_tag('fordefaccesp/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('tools') ?>
<?php use_helper('SubmitClick') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('Grid') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo object_input_hidden_tag($fordefaccesp, 'getId') ?>
<?php echo input_hidden_tag('totpes', '0,00') ?>

<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('Proyecto ó Acción Centralizada') ?></h2>
<div class="form-row">
  <table>
   <tr>
    <th>
 <?php echo label_for('fordefaccesp[codpro]', __($labels['fordefaccesp{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefaccesp{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefaccesp{codpro}')): ?>
    <?php echo form_error('fordefaccesp{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php
  $value = object_input_tag($fordefaccesp, 'getCodpro', array (
  'size' => $longitudproyecto,
  'control_name' => 'fordefaccesp[codpro]',
  'maxlength' => $longitudproyecto,
  'readonly'  =>  $fordefaccesp->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$formatoproyecto');",
  'onBlur'=> remote_function(array(
              'update'  => 'divajax',
			  'url'      => 'fordefaccesp/ajax',
			  'script' => true,
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('fordefaccesp_codpro').value != '' && $('id').value == ''",
  			  'with' => "'ajax=1&codigo='+this.value"
			  ))
  )); echo $value ? $value : '&nbsp;' ?>

   </div></th>
<?php
	if (!$fordefaccesp->getId())
	{?>
    <th>
      <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefpry_Fordefaccesp/clase/Fordefpry/frame/sf_admin_edit_form/obj1/fordefaccesp_codpro/obj2/fordefaccesp_nompro/campo1/codpro/campo2/nompro')?>
    </th>
<?php
	} ?>
    <th>
     <?php $value = object_input_tag($fordefaccesp, 'getProacc', array (
  'disabled' => true,
  'control_name' => 'fordefaccesp[proacc]',
  )); echo $value ? $value : '&nbsp;' ?>
  </th>
   </tr>
  </table>
 <br>
 <?php echo label_for('fordefaccesp[nompro]', __($labels['fordefaccesp{nompro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefaccesp{nompro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefaccesp{nompro}')): ?>
    <?php echo form_error('fordefaccesp{nompro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefaccesp, 'getNompro', array (
  'size' => '80x2',
  'readOnly' => true,
  'control_name' => 'fordefaccesp[nompro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<br>
<fieldset>
<h2><?php echo __('Ubicación Geográfica de cada Acción Específica') ?></h2>
  <div class="form-row">
   <table>
   <tr>
    <th><?php echo label_for('estado', __('Estado: '), 'class="required" ') ?>
  <div class="content">
  <?php echo select_tag('estado', options_for_select($estados,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divMunicipios',
    'url'      => 'fordefaccesp/combo?par=1',
    'with' => "'estado='+this.value"
  ))));?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

 <th> <?php echo label_for('municipio', __('Municipio: '), 'class="required" ') ?>
  <div class="content">
 <div id="divMunicipios">
<?php echo select_tag('municipio', options_for_select($municipios,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divParroquias',
    'url'      => 'fordefaccesp/combo?par=2',
    'with' => "'estado='+$('estado').value+'&municipio='+this.value"
  ))));?></div>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('parroquia', __('Parroquia: '), 'class="required" ') ?>
  <div class="content">

<div id="divParroquias">
<?php echo select_tag('parroquia', options_for_select($parroquias,'','include_custom=Seleccione Uno'));?></div>
    </div></th>

   </tr>
  </table>
  </div>
  </fieldset>
  <br>

<br>
<form name="form1" id="form1"><?
	echo grid_tag($obj);
	?></form>
<br>

<div id='divajax'>
</div>
<?php include_partial('edit_actions', array('fordefaccesp' => $fordefaccesp)) ?>

</form>

<ul class="sf_admin_actions">
	<li class="float-left"><?php if ($fordefaccesp->getId()): ?>
	<?php echo button_to(__('delete'), 'fordefaccesp/delete?id='.$fordefaccesp->getId(), array (
	  'post' => true,
	  'confirm' => __('Are you sure?'),
	  'class' => 'sf_admin_action_delete',
	)) ?><?php endif; ?>
	</li>
</ul>

<script language="JavaScript" type="text/javascript" >

  function validartotal(id)
  {
      var num1=toFloat('totpes');
      if (num1>1)
      {
         alert('La Sumatoria del Factor Peso no debe ser mayor a 1');
         var num2=toFloat(id);
         var cal=num1-num2;
         $('totpes').value=format(cal.toFixed(2),'.',',','.');
         $(id).value='0,00';
         $(id).focus();
      }
  }

  function agregargrid(id)
  {
  	if  ($('parroquia').value!="")
	{
	     //VARIABLES A PASAR AL GRID
	     var index=$('estado').selectedIndex;
	     var text=$('estado').options[index].text;
	     var cod = $('estado').value;

	     var index2=$('municipio').selectedIndex;
	     var text2=$('municipio').options[index2].text;
	     var cod2 = $('municipio').value;

	     var index3=$('parroquia').selectedIndex;
	     var text3=$('parroquia').options[index3].text;
	     var cod3 = $('parroquia').value;

		//PROCEDIMIENTO PARA METER VALORES AL GRID

	    // var fil2=0;
	    //   var cuentafil=0;
	    //   while (fil2<50)
	    //   {
	    //    var ida="ax"+"_"+fil2+"_1";
	    //    if ($(ida).value=="")
	    //    {
	    //     cuentafil=fil2;
	    //     fil2=50;
	    //    }
	    //   fil2++;
	    //   }

           var aux = id.split("_");
           var name=aux[0];
           var cuentafil=aux[1];
           var col=parseInt(aux[2]);

           var ida="ax"+"_"+cuentafil+"_1";
	       if ($(ida).value!="")
	       {
	         var caj1="ax"+"_"+cuentafil+"_10";
	         var caj2="ax"+"_"+cuentafil+"_11";
	         var caj3="ax"+"_"+cuentafil+"_12";
	         var caj4="ax"+"_"+cuentafil+"_13";
	         var caj5="ax"+"_"+cuentafil+"_14";
	         var caj6="ax"+"_"+cuentafil+"_15";
	         $(caj1).value=cod;
	         $(caj2).value=text;
	         $(caj3).value=cod2;
	         $(caj4).value=text2;
	         $(caj5).value=cod3;
	         $(caj6).value=text3;
	       }
	}else
	 {
	 	alert ('Debe seleccionar una parroquia...');
	 }
  }
 </script>

