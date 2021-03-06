<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 38732 2010-06-10 21:31:17Z dmartinez $
 */
// date: 2007/06/04 16:53:16
?>
<?php echo form_tag('almordcomv2/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs', 'Linktogob') ?>
<?php echo javascript_include_tag('dFilter','compras/almordcomv2','ajax','tools', 'observe', 'event.simulate') ?>
<?php echo object_input_hidden_tag($caordcom, 'getId') ?>
  <?php $value = object_input_hidden_tag($caordcom, 'getStaord', array (
  'control_name' => 'caordcom[staord]',
)); echo $value ? $value : '&nbsp;' ?>
<input id="fecha_egresos" name="fecha_egresos" value="0" type="hidden">
<input id="periodo" name="periodo" value="" type="hidden">
<input id="parcial" name="parcial" value="N" type="hidden">
<input id="cancotpril" name="cancotpril" value="0" type="hidden">
<input id="numero_filas_recargos" name="numero_filas_recargos" value="10" type="hidden">
<input id="numero_filas_orden" name="numero_filas_orden" value="<?php echo $caordcom->getNumfilas(); ?>" type="hidden">
<input id="sumatoria_recargos" name="sumatoria_recargos" type="hidden">
<input id="sumatoria_detalle_orden" name="sumatoria_detalle_orden" type="hidden">
<input id="sumatoria_recargos" name="sumatoria_recargos" type="hidden">
<input id="sumatoria_descuentos" name="sumatoria_descuentos" type="hidden">
<?php echo input_hidden_tag('caordcom[codigoproveedor]', $caordcom->getCodigoproveedor()) ?>
<input id="tasacambio" name="tasacambio" type="hidden">
<input id="codconpag_dos" name="codconpag_dos" type="hidden">
<input id="mensaje_proveedor" name="mensaje_proveedor"  type="hidden">
<input id="codforent_dos" name="codforent_dos" type="hidden">
<input id="moneref" name="moneref" type="hidden">
<?php echo input_hidden_tag('caordcom[partrec]', $caordcom->getPartrec()) ?>
<?php echo input_hidden_tag('caordcom[genctaord]', $caordcom->getGenctaord()) ?>
<?php echo input_hidden_tag('caordcom[gencomalc]', $caordcom->getGencomalc()) ?>
<?php echo input_hidden_tag('caordcom[eti]', $caordcom->getEti()) ?>
<?php echo input_hidden_tag('caordcom[tipopro]', $caordcom->getTipopro()) ?>
<?php echo input_hidden_tag('caordcom[compro]', $caordcom->getCompro()) ?>
<?php echo input_hidden_tag('fechaanuserv', $fechaanuserv) ?>
<?php echo input_hidden_tag('caordcom[manorddon]', $caordcom->getManorddon()) ?>
<?php echo input_hidden_tag('caordcom[manunialt]', $caordcom->getManunialt()) ?>
<?php echo input_hidden_tag('caordcom[claartdes]', $caordcom->getClaartdes()) ?>
<?php echo input_hidden_tag('caordcom[finpre]', $caordcom->getFinpre()) ?>
<input id="codigo_presupuestario_sin_disponibilidad" name="codigo_presupuestario_sin_disponibilidad" type="hidden">
<script language="JavaScript" type="text/javascript">
    entrar();
    noActualizarInputs = true;
</script>
<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php print $caordcom->getEti();?></font></strong></th>
  </tr>
</table>

<fieldset id="sf_fieldset_datos_de_la_orden" class="">
<h2><?php echo __('Datos de la Orden') ?></h2>

<div class="form-row">
<table>
 <tr>
  <th>
  <?php echo label_for('caordcom[ordcom]', __($labels['caordcom{ordcom}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{ordcom}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{ordcom}')): ?> <?php echo form_error('caordcom{ordcom}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caordcom, 'getOrdcom', array (
'readonly'  =>  $caordcom->getId()!='' ? true : false ,
'size' => 10,
'maxlength' => 8,
'control_name' => 'caordcom[ordcom]',
'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",
'tabindex' => 100,
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 8 caracteres') ?></div>
</div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
  <?php echo label_for('caordcom[fecord]', __($labels['caordcom{fecord}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{fecord}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{fecord}')): ?> <?php echo form_error('caordcom{fecord}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_date_tag($caordcom, 'getFecord', array (
  'size' => 11,
  'maxlength' => 10,  'rich' => true,
//  //'readonly' => $readonly,
  //'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caordcom[fecord]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'tabindex' => 101,
  'onBlur'=> remote_function(array(
        'url'      => 'almordcomv2/ajax',
        'complete' => 'AjaxJSON(request, json), Mostrar_mensaje_periodo()',
        'condition' => "$('caordcom_fecord').value != '' && $('id').value == ''",
        'with' => "'ajax=14&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Introducir una Fecha valida') ?></div>
</div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
  <?php if ($caordcom->getTipmon()=='') $var=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'); else $var=$caordcom->getTipmon();?>
<?php echo label_for('caordcom[tipmon]', __($labels['caordcom{tipmon}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{tipmon}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{tipmon}')): ?> <?php echo form_error('caordcom{tipmon}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
  <?php echo select_tag('caordcom[tipmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$var,'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=23&cajtexmos=caordcom_valmon&nuevo='+$('id').value+'&variable=$var&refsol='+$('moneref').value+'&moneref='+$('moneref').value+'&valmone='+$('caordcom_valmon').value+'&codigo='+this.value"
      ))
  )) ?>
</div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
        <?php echo label_for('caordcom[valmon]', __($labels['caordcom{valmon}']), 'class="required" ') ?>
        <div class="content<?php if ($sf_request->hasError('caordcom{valmon}')): ?> form-error<?php endif; ?>">
        <?php if ($sf_request->hasError('caordcom{valmon}')): ?> <?php echo form_error('caordcom{valmon}', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>
       <?php $value = object_input_tag($caordcom, array('getValmon',true), array (
        'size' => 15,
        'control_name' => 'caordcom[valmon]',
        'readonly'  =>  $caordcom->getId()!='' ? true : false ,
        'onBlur' => "javascript:event.keyCode=13; return entermontodecimal(event, this.id,6)",
      )); echo $value ? $value : '&nbsp;' ?>
        </div>


</th>
 </tr>
</table>

<br>

<?php echo label_for('caordcom[doccom]', __($labels['caordcom{doccom}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{doccom}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{doccom}')): ?> <?php echo form_error('caordcom{doccom}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getDoccom', array (
  'size' => 6,
  'maxlength' => 4,
  'control_name' => 'caordcom[doccom]',
  'tabindex' => 103,
  'onBlur'=> remote_function(array(
              'url' => 'almordcomv2/ajax',
              'condition' => "$('caordcom_doccom').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
          'with' => "'ajax=2&cajtexmos=caordcom_nomext&cajtexcom=caordcom_doccom&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdoccom_Almordcom/clase/Cpdoccom/frame/sf_admin_edit_form/obj1/caordcom_doccom/obj2/caordcom_nomext/campo1/tipcom/campo2/nomext/param1/')?>


<?php $value = object_input_tag($caordcom, 'getNomext', array (
'size' => 60,
'control_name' => 'caordcom[nomext]',
'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div>
<br>

  <?php echo label_for('caordcom[refprc]', __($labels['caordcom{refprc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{refprc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{refprc}')): ?>
    <?php echo form_error('caordcom{refprc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php if($caordcom->getRefprc()=='S') $val = true; else $val=false; ?>
    <?php echo "Si ".radiobutton_tag('caordcom[refprc]', 'S',  $val, array('id'=>'caordcom_refprc_s' , 'onClick'=> "$('div_solicitud').show();", 'tabindex' => 104,)); ?>&nbsp;
  <?php echo "No ".radiobutton_tag('caordcom[refprc]', 'N', !$val, array('id'=>'caordcom_refprc_n', 'onClick'=> "$('div_solicitud').hide();",'tabindex' => 104,)) ?>

<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>
    </div>
    <br>
<?php //if (($caordcom->getId()!='') and ($caordcom->getRefsol()!='')) {?>
<div  id="div_solicitud">
 <?php echo label_for('caordcom[refsol]', __($labels['caordcom{refsol}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{refsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{refsol}')): ?>
    <?php echo form_error('caordcom{refsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php

echo input_tag('caordcom[refsol]', $caordcom->getRefsol(), array (
 'size' => 9,
 'maxlength' => 8,
 'control_name' => 'caordcom[refsol]',
 'tabindex' => 105,
 'onBlur'=> remote_function(array(
          'update'   => 'grid',
          'script' => true,
          'condition' => "$('caordcom_refsol').value != '' && $('id').value == ''",
          'url' => 'almordcomv2/grid?ajax=1&referencia=1',
          'complete' => 'AjaxJSON(request, json), Mostrar_mensaje_fecha_egresos_invalidad(),$("botonesmarcar").hide(),limpiardatos(),actualizarsaldos()',
          'with' => "'cajtexmos=caordcom_monord&filas_orden=numero_filas_orden&cajtexmos2=caordcom_rifpro&cajtexmos3=caordcom_nompro&ordcom='+this.value+'&fecord='+document.getElementById('caordcom_fecord').value+'&doccom='+document.getElementById('caordcom_doccom').value.replace(/\//gi,'*')+'&refsol='+document.getElementById('caordcom_refsol').value",
        ))))
 . '&nbsp;'. button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Casolart_Almcotiza/clase/Casolart/frame/sf_admin_edit_form/obj1/caordcom_refsol/campo1/reqart/param1/'+$('caordcom_doccom').value.replace(/\//gi,'*')+'",'','','botoncat')
?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 8 caracteres') ?></div>
</div>
</div>
<?php //}?>
<br>
  <?php echo label_for('caordcom[monord]', __($labels['caordcom{monord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{monord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{monord}')): ?>
    <?php echo form_error('caordcom{monord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, array('getMonord',true), array (
  'readonly' => 'readonly',
  'size' => 10,
  'control_name' => 'caordcom[monord]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>


<?php echo label_for('caordcom[rifpro]', __($labels['caordcom{rifpro}']), 'class="required" Style="width:200px"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{rifpro}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{rifpro}')): ?> <?php echo form_error('caordcom{rifpro}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getRifpro', array (
  'size' => 16,
  'maxlength' => 15,
  'control_name' => 'caordcom[rifpro]',
  'tabindex' => 106,
  'onBlur'=> remote_function(array(
        'condition' => "$('caordcom_rifpro').value != '' && $('id').value == ''",
        'script' => true,
        'before' => "cadena=rayitas(this.value);document.getElementById('caordcom_rifpro').value=cadena;",
        'url'      => 'almordcomv2/grid_recargos',
        'complete' => 'AjaxJSON(request, json),mensaje_rif_cambiado(),cargar_grid_orden_detalle_orden()',
        'with' => "'ajax=1&cajtexmos=caordcom_nompro&cancotpril=cancotpril&cajtexcom=caordcom_rifpro&cajtexcom=caordcom_rifpro&cajtexcom=caordcom_rifpro&numfilas=numero_filas_recargos&codconpag_codigo=codconpag_dos&codforent_codigo=codforent_dos&codconpag=caordcom_codconpag&codforent=caordcom_codforent&codconpag_des=caordcom_desconpag&codforent_des=caordcom_desforent&codigo_provee=caordcom_codigoproveedor&msg=mensaje_proveedor&refsol='+document.getElementById('caordcom_refsol').value+'&parcial='+document.getElementById('parcial').value+'&codigo='+this.value",
        )),

)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Caprovee_Almordcom/clase/Caprovee/frame/sf_admin_edit_form/obj1/caordcom_rifpro/obj2/caordcom_nompro/obj3/caordcom_codigoproveedor/campo1/rifpro/campo2/nompro/campo3/codpro/param1/'+$('caordcom_refsol').value+'",'','','botoncat')?>

<?php $value = object_input_tag($caordcom, 'getNompro', array (
  'size' => 80,
  'control_name' => 'caordcom[nompro]',
  )); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 15 caracteres') ?></div>
  </div>

<br>

<?php echo label_for('caordcom[desord]', __($labels['caordcom{desord}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{desord}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{desord}')): ?> <?php echo form_error('caordcom{desord}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php $value = object_textarea_tag($caordcom, 'getDesord', array (
  'size' => '106x3',
  'control_name' => 'caordcom[desord]',
  'maxlength'=> 1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'tabindex' => 107,
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Introduzca una Descripción Valida') ?></div></div>


<br>

<div id="div_tipo_orden">
<?php echo label_for('caordcom[tipord]', __($labels['caordcom{tipord}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{tipord}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{tipord}')): ?> <?php echo form_error('caordcom{tipord}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php echo select_tag('caordcom[tipord]', options_for_select($listatipocompra,$caordcom->getTipord(),'include_custom=Seleccione'),array('tabindex' => 108,));?>
<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>  </div>
</div>

<br>
  <?php echo label_for('caordcom[tipo]', __($labels['caordcom{tipo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{tipo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{tipo}')): ?>
    <?php echo form_error('caordcom{tipo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php if ($caordcom->getTipo()=='A')
{
  $v1=true; $v2=false; $v3=false; $v4=false; $v5=false;
}
elseif ($caordcom->getTipo()=='L')
{
  $v1=false; $v2=true; $v3=false; $v4=false; $v5=false;
}
elseif ($caordcom->getTipo()=='C')
{
  $v1=false; $v2=false; $v3=true; $v4=false; $v5=false;
}
elseif ($caordcom->getTipo()=='E')
{
  $v1=false; $v2=false; $v3=false; $v4=true; $v5=false;
}
elseif ($caordcom->getTipo()=='T')
{
  $v1=false; $v2=false; $v3=false; $v4=false; $v5=true;
}
elseif ($caordcom->getTipo()=='P')
{
  $v1=false; $v2=true; $v3=false; $v4=false; $v5=false;
}
else
{
  $v1=false; $v2=false; $v3=true; $v4=false; $v5=false;
}

?> <?php echo __(" Adjudicación Directa ").radiobutton_tag('caordcom[tipo]', 'A', $v1) ?>&nbsp;
<?php 
$ocullic=H::getConfApp2('ocullic', 'compras', 'almordcom');
if ($ocullic!='S')
  echo __(" Licitación ").radiobutton_tag('caordcom[tipo]', 'L', $v2) ?>&nbsp;
<?php echo __(" Compra ").radiobutton_tag('caordcom[tipo]', 'C', $v3) ?>&nbsp;
<?php echo __(" Compra Eventual ").radiobutton_tag('caordcom[tipo]', 'E', $v4) ?>
<?php echo __(" Contratación ").radiobutton_tag('caordcom[tipo]', 'T', $v5) ?>
<?php echo __(" Consulta de Precio ").radiobutton_tag('caordcom[tipo]', 'P', $v2) ?>
<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>  </div>
<br>
  <?php echo label_for('caordcom[tipo]', __('Descuento:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{tipo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{tipo}')): ?>
    <?php echo form_error('caordcom{tipo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php echo __("Tipo Porcentaje ").radiobutton_tag('descuenta', 'p', 'true', array('onClick'=> "inizializo_descuentos();")) ?>
    <?php echo __("Tipo Monto ").radiobutton_tag('descuenta', 'm', 'false', array('onClick'=> "inizializo_descuentos();")) ?>
    <?php echo __("Tipo Total ").radiobutton_tag('descuenta', 't', 'false', array('onClick'=> "inizializo_descuentos();")) ?>
<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php if ($caordcom->getId()=='' && ($caordcom->getGenctaord()=='S')) { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'almordcomv2/ajaxcomprobante',
         'script'   => true,
         'submit' => 'sf_admin_edit_form',
         )) ?>
<?php } ?> <div id="comp"></div>
<?php if ($caordcom->getId()!='' and $aprobacion=='S' and $caordcom->getCompro()=='N' and $caordcom->getGencompre()!='S') { ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo submit_to_remote('Submit2', 'Generar Compromiso', array(
         'url'      => 'almordcomv2/ajaxcompromiso',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)' ),array('id' => 'btncomp')
         ) ?>

<?php }?>

<?php if ($caordcom->getId()!='') { ?>
  <input type="button" name="Submit" value="Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
  &nbsp;&nbsp;
 <?php echo link_to_seniat($caordcom->getRifpro()) ?>
  &nbsp;&nbsp;
 <?php echo link_to_snc($caordcom->getRifpro()) ?>
<?php } ?>


  </div>
<br>

<div id="div_fechas_entregas" class="form-row" style="display:none">
<?php //echo grid_tag_v2($obj_fechas);?>
</div>

</div>
</fieldset>
<br>

<fieldset id="sf_fieldset_detalle" class="">
<h2><?php echo __('Detalle') ?></h2>
  <div id="divBtnCarOC" style="display:none">
  <?php echo label_for('caordcom[ordcomvie]', __($labels['caordcom{ordcomvie}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{ordcomvie}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{ordcomvie}')): ?> <?php echo form_error('caordcom{ordcomvie}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getOrdcomvie', array (
  'size' => 10,
  'maxlength' => 8,
  'control_name' => 'caordcom[ordcomvie]',
  'onBlur'=> remote_function(array(
    'url' => 'almordcomv2/ajax',
    'update'=> 'grid',
    'condition' => "$('caordcom_ordcomvie').value != '' && $('id').value == ''",
    'complete' => 'AjaxJSON(request, json)',
    'script' => true,
    'with' => "'ajax=27&cajtexcom=caordcom_ordcomvie&codigo='+this.value",
    )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caordcom_Almordcomv2/clase/Caordcom/frame/sf_admin_edit_form/obj1/caordcom_ordcomvie/campo1/ordcom')?>
 </div>
  </div>
  <?php echo include_partial('detalle', array('caordcom' => $caordcom, 'obj'=>$obj, 'labels' => $labels, 'obj_recargos' => $obj_recargos)); ?>
</fieldset>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Condiciones de Pago/Proyecto');?>
<fieldset><legend><?php echo __('Condición de Pago') ?></legend>
<div class="form-row">
<?php echo label_for('caordcom[codconpag]', __($labels['caordcom{codconpag}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{codconpag}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{codconpag}')): ?> <?php echo form_error('caordcom{codconpag}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($caordcom, 'getCodconpag', array (
  'size' => 8,
  'maxlength' => 4,
  'control_name' => 'caordcom[codconpag]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcomv2/ajax',
              'before'   => 'var codconpag=document.getElementById("caordcom_codconpag").value;codconpag=codconpag.pad(4, "0",0);document.getElementById("caordcom_codconpag").value=codconpag;',
        'complete' => 'AjaxJSON(request, json),actualizar_codconpag_dos()',
          'with' => "'ajax=6&cajtexmos=caordcom_desconpag&cajtexmos2=codconpag_dos&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caconpag_Almordcom/clase/Caconpag/frame/sf_admin_edit_form/obj1/caordcom_codconpag/obj2/caordcom_desconpag/campo1/codconpag/campo2/desconpag')?></th>

<?php $value = object_input_tag($caordcom, 'getDesconpag', array (
'size' => 60,
'disabled' => true,
'control_name' => 'caordcom[desconpag]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div>
</div>
</fieldset>
<br>
<fieldset><legend><?php echo __('Proyecto')?></legend>
<div class="form-row">
<?php echo label_for('caordcom[tippro]', __($labels['caordcom{tippro}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{tippro}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{tippro}')): ?> <?php echo form_error('caordcom{tippro}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getTippro', array (
  'size' => 8,
  'maxlength' => 20,
  'control_name' => 'caordcom[tippro]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcomv2/ajax',
              'condition' => "$('caordcom_tippro').value != ''",
              //'before'   => 'var tippro=document.getElementById("caordcom_tippro").value;tippro=tippro.pad(4, "0",0);document.getElementById("caordcom_tippro").value=tippro;',
        'complete' => 'AjaxJSON(request, json)',//,habilitar_boton_comprobante()',
          'with' => "'ajax=8&cajtexmos=caordcom_despro&cajtexcom=caordcom_tippro&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>
<?php
$catprofor=H::getConfApp2('catprofor', 'compras', 'almordcom');
if ($catprofor=='S') {?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefpry_Forpoa/clase/Fordefpry/frame/sf_admin_edit_form/obj1/caordcom_tippro/obj2/caordcom_despro/campo1/codpro/campo2/nompro')?>
<?php }else {?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catippro_Almordcom/clase/Catippro/frame/sf_admin_edit_form/obj1/caordcom_tippro/obj2/caordcom_despro/campo1/codpro/campo2/despro')?>
<?php }?>
</th>

<?php $value = object_input_tag($caordcom, 'getDespro', array (
'size' => 60,
'disabled' => true,
'control_name' => 'caordcom[despro]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Forma de Entrega');?>

<fieldset>
<div class="form-row">
<?php echo label_for('caordcom[codforent]', __($labels['caordcom{codforent}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('caordcom{codforent}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{codforent}')): ?> <?php echo form_error('caordcom{codforent}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
  <?php $value = object_input_tag($caordcom, 'getCodforent', array (
  'size' => 8,
  'maxlength' => 4,
  'control_name' => 'caordcom[codforent]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcomv2/ajax',
              'before'   => 'var codforent=document.getElementById("caordcom_codforent").value;codforent=codforent.pad(4, "0",0);document.getElementById("caordcom_codforent").value=codforent;',
        'complete' => 'AjaxJSON(request, json),actualizar_codforent_dos()',
          'with' => "'ajax=7&cajtexmos=caordcom_desforent&cajtexmos2=codforent_dos&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caforent_Almordcom/clase/Caforent/frame/sf_admin_edit_form/obj1/caordcom_codforent/obj2/caordcom_desforent/campo1/codforent/campo2/desforent')?></th>

<?php $value = object_input_tag($caordcom, 'getDesforent', array (
'size' => 60,
'disabled' => true,
'control_name' => 'caordcom[desforent]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div>

<br>
<?php echo label_for('caordcom[lugfec]', __($labels['caordcom{lugfec}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{lugfec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{lugfec}')): ?>
    <?php echo form_error('caordcom{lugfec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php 
$comlugfec=H::getConfApp2('comlugfec', 'compras', 'almordcom');
if ($comlugfec!='S') {?>
  <?php $value = object_textarea_tag($caordcom, 'getLugfec', array (
  'size' => '80x3',
  'maxlength' => 250,
  'control_name' => 'caordcom[lugfec]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
<?php }else {?>
<?php echo select_tag('caordcom[lugfec]', options_for_select(array('EDIF SEDE-ALMACÉN DE PROVEEDURÍA' => 'EDIF SEDE-ALMACÉN DE PROVEEDURÍA', 'ALMACÉN CENTRAL' => 'ALMACÉN CENTRAL'),$caordcom->getLugfec(),'include_custom=Seleccione Uno')) ?>
<?php }?>
    </div>
<br>
  <?php echo label_for('caordcom[dirent]', __($labels['caordcom{dirent}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{dirent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{dirent}')): ?>
    <?php echo form_error('caordcom{dirent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($caordcom, 'getDirent', array (
  'size' => '80x3',
  'maxlength' => 250,
  'control_name' => 'caordcom[dirent]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>    
  <?php echo label_for('caordcom[numpro]', __($labels['caordcom{numpro}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{numpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{numpro}')): ?>
    <?php echo form_error('caordcom{numpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getNumpro', array (
  'size' => 50,
  'maxlength' => 30,
  'control_name' => 'caordcom[numpro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<br>
<fieldset><legend><?php echo __('Justificación') ?></strong></legend>
<div class="form-row">
<?php echo label_for('caordcom[justif]', __($labels['caordcom{justif}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{justif}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{justif}')): ?> <?php echo form_error('caordcom{justif}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<?php $value = object_textarea_tag($caordcom, 'getJustif', array (
  'size' => '106x3',
  'control_name' => 'caordcom[justif]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Introduzca una Descripción Valida') ?></div></div>
</div>
</fieldset>
<br>
<fieldset>
<legend><?php echo __('Tipo Financiamiento') ?></legend>
<div class="form-row">
<?php echo label_for('caordcom[tipfin]', __($labels['caordcom{tipfin}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{tipfin}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{tipfin}')): ?> <?php echo form_error('caordcom{tipfin}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getTipfin', array (
  'size' => 8,
  'maxlength' => 4,
  'control_name' => 'caordcom[tipfin]',
  'onBlur'=> remote_function(array(
        'url' => 'almordcomv2/ajax',
        'before'   => 'var tipfin=document.getElementById("caordcom_tipfin").value;tipfin=tipfin.pad(4, "0",0);document.getElementById("caordcom_tipfin").value=tipfin;',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=9&cajtexmos=caordcom_nomfin&cajtexcom=caordcom_tipfin&refere='+$('caordcom_refprc_s').checked+'&codpre1='+$('ax_0_15').value+'&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Fortipfin_Almordcom/clase/Fortipfin/frame/sf_admin_edit_form/obj1/caordcom_tipfin/obj2/caordcom_nomfin/campo1/codfin/campo2/nomext/param1/'+$('ax_0_15').value+'")?></th>

<?php $value = object_input_tag($caordcom, 'getNomfin', array (
'size' => 60,
'disabled' => true,
'control_name' => 'caordcom[nomfin]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div>
</div>
</fieldset>
<br>
<fieldset>
<legend><?php echo __('Garantía') ?></legend>
<div class="form-row">
<?php echo label_for('caordcom[codgar]', __($labels['caordcom{codgar}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{codgar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{codgar}')): ?> <?php echo form_error('caordcom{codgar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCodgar', array (
  'size' => 8,
  'maxlength' => 3,
  'control_name' => 'caordcom[codgar]',
  'onBlur'=> remote_function(array(
    'url' => 'almordcomv2/ajax',
    'condition' => "$('caordcom_codgar').value != ''",
    'complete' => 'AjaxJSON(request, json)',
    'with' => "'ajax=28&cajtexcom=caordcom_codgar&cajtexmos=caordcom_desgar&codigo='+this.value",
  )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefgar_Almordcom/clase/Cadefgar/frame/sf_admin_edit_form/obj1/caordcom_codgar/obj2/caordcom_desgar/campo1/codgar/campo2/desgar')?></th>

<?php $value = object_input_tag($caordcom, 'getDesgar', array (
'size' => 60,
'disabled' => true,
'control_name' => 'caordcom[desgar]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>
</fieldset>


<?php tabPageOpenClose("tp1", "tabPage3", 'Resumen');?>
<fieldset>
<div class="form-row">
  <?php if(!$caordcom->getId() ||  $aprobacion=='S') : ?>
    <?php echo button_to_function('Generar Resumen', "generarResumen()"); ?>
  <?php endif; ?>
  <br>  <br>
  <?php echo include_partial('resumen', array('obj_resumen' => $obj_resumen)); ?>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'Entregas');?>
<fieldset>
<div class="form-row">
  <?php if(!$caordcom->getId() ||  $aprobacion=='S') : ?>
    <?php echo button_to_function('Generar Entregas', "generarEntregas()"); ?>
  <?php endif; ?>
  <br>  <br>  
  <?php echo include_partial('entregas', array('obj_entregas' => $obj_entregas)); ?>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage5", 'Responsables');?>
<fieldset>
<div class="form-row">
<?php echo label_for('caordcom[coduni]', __($labels['caordcom{coduni}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('caordcom{coduni}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{coduni}')): ?> <?php echo form_error('caordcom{coduni}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCoduni', array (
  'size' => 8,
  'maxlength' => 3,
  'control_name' => 'caordcom[coduni]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcom/ajax',
              'before'   => 'var coduni=document.getElementById("caordcom_coduni").value;coduni=coduni.pad(3, "0",0);document.getElementById("caordcom_coduni").value=coduni;',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=10&cajtexmos=caordcom_desubi&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_Almordcom/clase/Bnubica/frame/sf_admin_edit_form/obj1/caordcom_coduni/obj2/caordcom_desubi/campo1/codubi/campo2/desubi')?></th>

<?php $value = object_input_tag($caordcom, 'getDesubi', array (
'size' => 50,
'maxlength' => 50,
'disabled' => true,
'control_name' => 'caordcom[desubi]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 3 caracteres') ?></div></div>

<br>
<?php echo label_for('caordcom[codemp]', __($labels['caordcom{codemp}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('caordcom{codemp}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{codemp}')): ?> <?php echo form_error('caordcom{codemp}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCodemp', array (
  'size' => 16,
  'maxlength' => 16,
  'control_name' => 'caordcom[codemp]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcomv2/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=11&cajtexmos=caordcom_nomemp&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Almordcom/clase/Nphojint/frame/sf_admin_edit_form/obj1/caordcom_codemp/obj2/caordcom_nomemp/campo1/codemp/campo2/nomemp')?></th>

 <?php $value = object_input_tag($caordcom, 'getNomemp', array (
'size' => 50,
'maxlength' => 50,
'disabled' => true,
'control_name' => 'caordcom[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 16 caracteres') ?></div></div>

<br>
<div id="centrocosto">
<?php echo label_for('caordcom[codcen]', __($labels['caordcom{codcen}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('caordcom{codcen}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{codcen}')): ?> <?php echo form_error('caordcom{codcen}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCodcen', array (
  'size' => 10,
  'maxlength' => 32,
  'control_name' => 'caordcom[codcen]',
  'onBlur'=> remote_function(array(
              'url' => 'almordcomv2/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=17&cajtexmos=caordcom_descen&cajtexcom=caordcom_codcen&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefcen_Almsolegr/clase/Cadefcen/frame/sf_admin_edit_form/obj1/caordcom_codcen/obj2/caordcom_descen/campo1/codcen/campo2/descen')?>

<?php $value = object_input_tag($caordcom, 'getDescen', array (
'size' => 50,
'maxlength' => 50,
'disabled' => true,
'control_name' => 'caordcom[descen]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div></div></div>
<br>
<div id="eventos" style="display:none">
<table>
    <tr>
   <th> <?php echo label_for('caordcom[codeve]', __($labels['caordcom{codeve}']), 'class="required" style="width:100px') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{codeve}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{codeve}')): ?>
    <?php echo form_error('caordcom{codeve}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCodeve', array (
  'size' => 10,
  'maxlength' => 6,
  'control_name' => 'caordcom[codeve]',
  'onBlur'=> remote_function(array(
        'url'      => 'almordcomv2/ajax',
        'complete' => 'AjaxJSON(request, json)',
         'condition' => "$('caordcom_codeve').value != ''",
         'script' => true,
        'with' => "'ajax=26&cajtexmos=caordcom_deseve&cajtexcom=caordcom_codeve&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...',"/metodo/Preprecom_Cpevepre/clase/Cpevepre/frame/sf_admin_edit_form/obj1/caordcom_codeve/obj2/caordcom_deseve/campo1/codeve/campo2/deseve")?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($caordcom, 'getDeseve', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'caordcom[deseve]',
)); echo $value ? $value : '&nbsp;' ?></th>
    </tr>
</table>
</div>
<br>
<div id="divcoddirec" style="display:none">
<?php echo label_for('caordcom[coddirec]', __($labels['caordcom{coddirec}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('caordcom{coddirec}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{coddirec}')): ?> <?php echo form_error('caordcom{coddirec}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCoddirec', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'caordcom[coddirec]',
  'onBlur'=> remote_function(array(
        'url' => 'almordcomv2/ajax',
        'condition' => "$('caordcom_coddirec').value != ''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=38&cajtexmos=caordcom_desdirec&cajtexcom=caordcom_coddirec&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefdirec_Almdefdiv/clase/Cadefdirec/frame/sf_admin_edit_form/obj1/caordcom_coddirec/obj2/caordcom_desdirec/campo1/coddirec/campo2/desdirec')?>

<?php $value = object_input_tag($caordcom, 'getDesdirec', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'caordcom[desdirec]',
)); echo $value ? $value : '&nbsp;' ?></div> 
</div>
<br>
<div id="divcoddivi" style="display:none">
<?php echo label_for('caordcom[coddivi]', __($labels['caordcom{coddivi}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('caordcom{coddivi}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{coddivi}')): ?> <?php echo form_error('caordcom{coddivi}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCoddivi', array (
  'size' => 10,
  'maxlength' => 6,
  'control_name' => 'caordcom[coddivi]',
  'onBlur'=> remote_function(array(
        'url' => 'almordcomv2/ajax',
        'condition' => "$('caordcom_coddivi').value != ''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=25&cajtexmos=caordcom_desdivi&coddirec='+$('caordcom_coddirec').value+'&cajtexcom=caordcom_coddivi&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cadefdivi_Almordcom/clase/Cadefdivi/frame/sf_admin_edit_form/obj1/caordcom_coddivi/obj2/caordcom_desdivi/campo1/coddivi/campo2/desdivi/param1/'+$('caordcom_coddirec').value+'")?>

<?php $value = object_input_tag($caordcom, 'getDesdivi', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'caordcom[desdivi]',
)); echo $value ? $value : '&nbsp;' ?></div> 
</div>

</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage6", 'Nota');?>
<fieldset>
<div class="form-row">
<?php echo label_for('caordcom[notord]', __($labels['caordcom{notord}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{notord}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{notord}')): ?> <?php echo form_error('caordcom{notord}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caordcom, 'getNotord', array (
'size' => 80,
'control_name' => 'caordcom[notord]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Introduzca una Nota Valida') ?></div></div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage7", 'SNC');?>
<fieldset>
<div class="form-row">
 <table>
  <tr>
   <th>
     <?php echo label_for('caordcom[codmedcom]', __($labels['caordcom{codmedcom}']), 'class="required" Style="width:80px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{codmedcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{codmedcom}')): ?>
    <?php echo form_error('caordcom{codmedcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('caordcom[codmedcom]', objects_for_select(CamedcomPeer::doSelect(new Criteria()),'getCodmedcom','getDesmedcom',$caordcom->getCodmedcom(),'include_custom=Seleccione')) ?>
  </div>
   </th>
   <th>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
     <?php echo label_for('caordcom[codprocom]', __($labels['caordcom{codprocom}']), 'class="required" Style="width:80px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{codprocom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{codprocom}')): ?>
    <?php echo form_error('caordcom{codprocom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('caordcom[codprocom]', objects_for_select(CaprocomPeer::doSelect(new Criteria()),'getCodprocom','getDesprocom',$caordcom->getCodprocom(),'include_custom=Seleccione')) ?>
    </div>
   </th>
  </tr>
 </table>

<br>

 <table>
  <tr>
   <th>  <?php echo label_for('caordcom[codpai]', __($labels['caordcom{codpai}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{codpai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{codpai}')): ?>
    <?php echo form_error('caordcom{codpai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo select_tag('caordcom[codpai]', options_for_select($pais,$caordcom->getCodpai(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
    'update'   => 'divEstados',
    'url'      => 'almordcomv2/combosnc?par=1',
    'with' => "'pais='+this.value"
  ))));?>
    </div>
   </th>
   <th>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
   <?php echo label_for('caordcom[codedo]', __($labels['caordcom{codedo}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{codedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{codedo}')): ?>
    <?php echo form_error('caordcom{codedo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<div id="divEstados">
<?php echo select_tag('caordcom[codedo]', options_for_select($estados,$caordcom->getCodedo(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
    'update'   => 'divMunicipios',
    'url'      => 'almordcomv2/combosnc?par=2',
    'with' => "'pais='+document.getElementById('caordcom_codpai').value+'&estado='+this.value"
  ))));?></div>
    </div>
   </th>
   <th>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
     <?php echo label_for('caordcom[codmun]', __($labels['caordcom{codmun}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{codmun}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{codmun}')): ?>
    <?php echo form_error('caordcom{codmun}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<div id="divMunicipios">
<?php echo select_tag('caordcom[codmun]', options_for_select($municipio,$caordcom->getCodmun(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
    'update'   => 'divParroquia',
    'url'      => 'almordcomv2/combosnc?par=3',
    'with' => "'pais='+document.getElementById('caordcom_codpai').value+'&estado='+document.getElementById('caordcom_codedo').value+'&municipio='+this.value"
  ))));?></div>
    </div>
   </th>
  </tr>
 </table>

<br>

<fieldset>
<legend><strong><?php 
$etidec1=H::getConfApp2('etidec1', 'compras', 'almordcom');
if ($etidec1!='')
echo __('Decreto '.$etidec1);
else echo __('Decreto 4000');?></strong></legend>
<div class="form-row">
  <?php echo label_for('caordcom[aplart]', __($labels['caordcom{aplart}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{aplart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{aplart}')): ?>
    <?php echo form_error('caordcom{aplart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if ($caordcom->getAplart()=='S')
  {
    $v=true;
  }
  else
  {
    $v=false;
  }
?> <?php echo "Si ".radiobutton_tag('caordcom[aplart]', 'S', $v) ?>&nbsp;
<?php echo "No ".radiobutton_tag('caordcom[aplart]', 'N', !$v) ?>&nbsp;
<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>
    </div>
</div>
</fieldset>

<br>

<fieldset>
<legend><strong><?php 
$etidec2=H::getConfApp2('etidec2', 'compras', 'almordcom');
if ($etidec2!='')
  echo __('Decreto '.$etidec2);
else echo __('Decreto 3798'); ?></strong></legend>
<div class="form-row">
  <?php echo label_for('caordcom[aplart6]', __($labels['caordcom{aplart6}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{aplart6}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{aplart6}')): ?>
    <?php echo form_error('caordcom{aplart6}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php if ($caordcom->getAplart6()=='S')
  {
    $v=true;
  }
  else
  {
    $v=false;
  }
?> <?php echo "Si ".radiobutton_tag('caordcom[aplart6]', 'S', $v) ?>&nbsp;
<?php echo "No ".radiobutton_tag('caordcom[aplart6]', 'N', !$v) ?>&nbsp;
<div class="sf_admin_edit_help"><?php echo __('Seleccione una Opción') ?></div>
    </div>
</div>
</fieldset>

</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage8", 'SIGECOF');?>
<fieldset>
<div class="form-row">
<?php echo label_for('caordcom[numsigecof]', __($labels['caordcom{numsigecof}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{numsigecof}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{numsigecof}')): ?> <?php echo form_error('caordcom{numsigecof}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($caordcom, 'getNumsigecof', array (
'size' => 8,
'readonly'  =>  $caordcom->getId()!='' ? true : false ,
'control_name' => 'caordcom[numsigecof]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Introduzca un Nombre Valido') ?></div></div>
</div>

<div class="form-row">
<?php echo label_for('caordcom[fecsigecof]', __($labels['caordcom{fecsigecof}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{fecsigecof}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{fecsigecof}')): ?> <?php echo form_error('caordcom{fecsigecof}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_date_tag($caordcom, 'getFecsigecof', array (
  'size' => 11,
  'maxlength' => 10,  'rich' => true,
  'readonly' => $readonly,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caordcom[fecsigecof]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'almordcomv2/ajax',
        'complete' => 'AjaxJSON(request, json), Mostrar_mensaje_periodo()',
        'condition' => "$('caordcom_fecsigecof').value != '' && $('id').value == ''",
        'with' => "'ajax=14&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Seleccione la Fecha en el Calendario') ?></div></div>
</div>

<div class="form-row">
<?php echo label_for('caordcom[expsigecof]', __($labels['caordcom{expsigecof}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('caordcom{expsigecof}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('caordcom{expsigecof}')): ?> <?php echo form_error('caordcom{expsigecof}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($caordcom, 'getExpsigecof', array (
'size' => 8,
'readonly'  =>  $caordcom->getId()!='' ? true : false ,
'control_name' => 'caordcom[expsigecof]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Maximo 8 Caracteres ') ?></div></div>
</div>

</fieldset>


<?php tabPageOpenClose("tp1", "tabPage9", 'Forma de Entrega o Despacho de la Orden');?>
<fieldset>
<div class="form-row">
  <?php echo include_partial('despachos', array('obj_formas' => $obj_formas)); ?>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage10", 'Resumen por Partida Presupuestaria');?>
<fieldset>
<div class="form-row">
  <?php if(!$caordcom->getId() || $aprobacion=='S') : ?>
    <?php echo button_to_function('Generar Resumen', "generarResumenPartidas()"); ?>
  <?php endif; ?>
  <br>  <br>
  <?php echo include_partial('resumenpartidas', array('obj_respartidas' => $obj_respartidas)); ?>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage11", 'Datos Adicionales');?>
<fieldset>
<div class="form-row" id="datadi" style="display:none">
  <?php echo label_for('caordcom[percon]', __($labels['caordcom{percon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{percon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{percon}')): ?>
    <?php echo form_error('caordcom{percon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getPercon', array (
  'size' => 80,
  'control_name' => 'caordcom[percon]',
  'maxlength' => 500,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('caordcom[telcon]', __($labels['caordcom{telcon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{telcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{telcon}')): ?>
    <?php echo form_error('caordcom{telcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getTelcon', array (
  'size' => 60,
  'control_name' => 'caordcom[telcon]',
  'maxlength' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('caordcom[faxcon]', __($labels['caordcom{faxcon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{faxcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{faxcon}')): ?>
    <?php echo form_error('caordcom{faxcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getFaxcon', array (
  'size' => 60,
  'control_name' => 'caordcom[faxcon]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('caordcom[emacon]', __($labels['caordcom{emacon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{emacon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{emacon}')): ?>
    <?php echo form_error('caordcom{emacon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getEmacon', array (
  'size' => 60,
  'control_name' => 'caordcom[emacon]',
  'maxlength' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>  

</fieldset>

<?php if ($caordcom->getManorddon()=='S') tabPageOpenClose("tp1", "tabPage12", 'Datos del Beneficiario de la Donación');?>
<div id="datbendon" style="display:none">
<fieldset>
<div class="form-row">
<?php echo label_for('caordcom[tipocom]', __($labels['caordcom{tipocom}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{tipocom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{tipocom}')): ?>
    <?php echo form_error('caordcom{tipocom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getTipocom', array (
  'size' => 60,
  'maxlength' => 50,
  'control_name' => 'caordcom[tipocom]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('caordcom[ceddon]', __($labels['caordcom{ceddon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{ceddon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{ceddon}')): ?>
    <?php echo form_error('caordcom{ceddon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getCeddon', array (
  'size' => 15,
  'maxlength' => 15,
  'control_name' => 'caordcom[ceddon]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('caordcom[nomdon]', __($labels['caordcom{nomdon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{nomdon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{nomdon}')): ?>
    <?php echo form_error('caordcom{nomdon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getNomdon', array (
  'size' => 60,
  'maxlength' => 50,
  'control_name' => 'caordcom[nomdon]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('caordcom[sexdon]', __($labels['caordcom{sexdon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{sexdon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{sexdon}')): ?>
    <?php echo form_error('caordcom{sexdon}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php if ($caordcom->getSexdon()=='M')  { ?>
      <?php echo radiobutton_tag('caordcom[sexdon]', 'M', true)        ."   Masculino".'&nbsp;&nbsp;';
          echo radiobutton_tag('caordcom[sexdon]', 'F', false)."     Femenino";?>
    <?php }else{
      echo radiobutton_tag('caordcom[sexdon]', 'M', false)        ."Masculino".'&nbsp;&nbsp;';
      echo radiobutton_tag('caordcom[sexdon]', 'F', true)."   Femenino";

    } ?>
  </div>

<br>

<?php echo label_for('caordcom[fecdon]', __($labels['caordcom{fecdon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{fecdon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{fecdon}')): ?>
    <?php echo form_error('caordcom{fecdon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($caordcom, 'getFecdon', array (
  'rich' => true,
  'maxlength' => 10,
  'size' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caordcom[fecdon]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onChange'=> remote_function(array(
        'url'      => 'almordcomv2/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=18&cajtexmos=caordcom_edadon&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('caordcom[edadon]', __($labels['caordcom{edadon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{edadon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{edadon}')): ?>
    <?php echo form_error('caordcom{edadon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcom, 'getEdaact', array (
  'size' => 3,
  'readonly' => true,
  'control_name' => 'caordcom[edadon]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

 <?php echo label_for('caordcom[serdon]', __($labels['caordcom{serdon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('caordcom{serdon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcom{serdon}')): ?>
    <?php echo form_error('caordcom{serdon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('caordcom[serdon]', options_for_select(array('M' => 'Medicina', 'T' => 'Materiales', 'O' => 'Otro'),$caordcom->getSerdon(),'include_custom=Seleccione Uno')) ?>
  </div>
</div>
</fieldset>
</div>

<?php if ($caordcom->getManorddon()=='S' && $caordcom->getManpda()=='S') tabPageOpenClose("tp1", "tabPage13", 'Solicitud de Distribución'); elseif ($caordcom->getManorddon()!='S' && $caordcom->getManpda()=='S') tabPageOpenClose("tp1", "tabPage12", 'Solicitud de Distribución');?>
<div id="datpda" style="display:none">
<fieldset>
<div class="form-row">
  <?php if(!$caordcom->getId() ||  $aprobacion=='S') : ?>
    <?php echo button_to_function('Generar SD', "generarEntrePDA()"); ?>
  <?php endif; ?>
  <br>  <br>  
  <?php echo include_partial('entregapda', array('obj_entrepda' => $obj_entrepda)); ?>
</div>
</fieldset>
</div>
<?php $oculcencos=H::getConfApp2('oculcencos', 'compras', 'almsolegr');?>
<?php 
   $pdfjasper="N";
   $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';
   $configyml = sfYaml::load($dirrepconfig);
   if(is_array($configyml)){
     if(array_key_exists('compras',$configyml)) {
       if(array_key_exists('almordcom',$configyml['compras'])) {     
         if(array_key_exists('parameterjasper',$configyml['compras']["almordcom"])) 
           $pdfjasper= $configyml["compras"]["almordcom"]["parameterjasper"];
      }
    }
  }
 ?>
<?php tabInit(); ?>
<?php include_partial('edit_actions', array('caordcom' => $caordcom)) ?>
</form>


<ul class="sf_admin_actions">
      <li class="float-left">
      <?php if ($oculeli!="S"): ?>
        <?php if ($caordcom->getId() and $caordcom->getStaord()!='N') : ?>
          <?php echo button_to(__('delete'), 'almordcomv2/delete?id='.$caordcom->getId(), array (
            'post' => true,
            'confirm' => __('Are you sure?'),
            'class' => 'sf_admin_action_delete',
          )) ?>
        <?php endif; ?> 
      <?php endif; ?>
</li>

<?php if ($caordcom->getId()!='' and $caordcom->getStaord()!='N') { ?>
<li>
<div id="anul">
<input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:Anular_orden();" />
</div>
</li>
<?php } ?>
  </ul>


<script type="text/javascript">
nuevo='<?php echo $caordcom->getId() ?>';
if (nuevo!="")
{
	//actualizarsaldos();
  ActualizarSaldosGrid("a",ArrTotales_a);
  total_completo();
}else{
     var manesolcorr='<?php echo $mansolocor; ?>';
     if (manesolcorr=='S')
     {
        $('caordcom_ordcom').value='########';
     	$('caordcom_ordcom').readOnly=true;
        $('caordcom_doccom').focus();
     }
  }

     var valor='<?php echo H::getX_vacio('CODMON','Tsdesmon','Valmon',H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'));?>';
      if (valor!="")
      {
          calculo=toFloat2(valor);
          var num2=toFloat('caordcom_valmon');
          if (num2==0)
             $('caordcom_valmon').value=format(calculo.toFixed(6),'.',',','.');
      }

  var deshab='<?php echo $bloqfec; ?>';
  if (deshab=='S')
  {
  	$('trigger_caordcom_fecord').hide();
  	$('caordcom_fecord').readOnly=true;
  }

  var manorddon='<?php echo $caordcom->getManorddon();?>';
  if (manorddon=='S')
      $('datbendon').show();

  var oculcencos='<?php echo $oculcencos;?>';
  if (oculcencos=='S')
      $('centrocosto').hide();    

  var manpda='<?php echo $caordcom->getManpda();?>';
  if (manpda=='S') {
      $('datpda').show();
  }


  var tienedirdiv='<?php echo $caordcom->getTienedirdiv();?>';
  if (tienedirdiv=='S') {
     $('divcoddirec').show();
     $('divcoddivi').show();
  }

  var manevento='<?php echo H::getConfApp2('manevento', 'compras', 'almsolegr');?>';
  if (manevento=='S')
    $('eventos').show();

  var mosdatadiext='<?php echo H::getConfApp2('mosdatadiext', 'compras', 'almordcom');?>';
  var monofi='<?php echo H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');?>';
  if (mosdatadiext=='S' && $('caordcom_tipmon').value!=monofi){
    $('tab10').show();  
    $('datadi').show();  
  }else {
    $('tab10').hide();  
    $('datadi').hide(); 
  }

 // if ($('caordcom_refsol').value=='') $('div_solicitud').hide();
   if ($('id').value=='' ||  $('caordcom_refsol').value=='')  $('div_solicitud').hide();
   var idordcom=$('id').value;
   $('tab9').innerHTML = '<a id="tab9" onClick="javascript:GenerarResumenPartidas(idordcom)" href="#">Resumen por Partida Presupuestaria</a>';


function enter(e,valor)
 {

   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('caordcom_ordcom').value=valor;
     var ordcomdesh='<?php echo $ordcomdesh; ?>';
     if (ordcomdesh=='S')
     {
     	$('caordcom_ordcom').readOnly=true;
     }
   }
 }

   function comprobante(formulario)
  {
      window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

 function Mostrar_orden_preimpresa()
  {
      /*var f=0;
      var primer_art=$("ax_0_2").value;
      var ultimo_art=$("ax_0_2").value;
      while ($("ax_"+f+"_2").value!="")
      {
        ultimo_art=$("ax_"+f+"_2").value;
        f++;
      }*/
      if(confirm("¿Desea imprimir la orden Pre-Impresa?"))
      {
            var ordcomdes=$('caordcom_ordcom').value;
            var ordcomhas=$('caordcom_ordcom').value;
            var codprodes='<?php echo $caordcom->getCodpro()?>';
            var codprohas='<?php echo $caordcom->getCodpro()?>';
            //var codartdes=primer_art;
            //var codarthas=ultimo_art;
            var fecorddes=$('caordcom_fecord').value;
            var fecordhas=$('caordcom_fecord').value;
            var status='Activas';
            var tipcom=$('caordcom_doccom').value;
        var nombrerep='<?php echo $caordcom->getNomreporte();?>';
        var  ruta='http://'+'<?php echo $this->getContext()->getRequest()->getHost();?>';
        var  mostrarjasper='<?php echo $pdfjasper;?>';
        var monofi='<?php echo H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');?>';
        var repmonext='<?php echo H::getConfApp2('repmonext', 'compras', 'almordcom');?>';
        var moneord='<?php echo $caordcom->getTipmon()?>';
        if (repmonext=='S') {
          if (moneord!=monofi)
          {
             pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=compras&r=carordpreext.php&s=<?php echo $sf_user->getAttribute('schema');?>&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
          }else {
            if (nombrerep!=''){     
              if (mostrarjasper=='S') 
                  pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=compras&r="+nombrerep+".php&s=<?php echo $sf_user->getAttribute('schema');?>&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
              else
                pagina=ruta+"/reportes/reportes/compras/r.php=?r="+nombrerep+".php&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
            }else {
              if (mostrarjasper=='S') 
                  pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=compras&r=<?php echo $caordcom->getReptipcom();?>&s=<?php echo $sf_user->getAttribute('schema');?>&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
              else
                pagina=ruta+"/reportes/reportes/compras/r.php=?r=<?php echo $caordcom->getReptipcom(); ?>&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
            }
          }
        }else {
          if (nombrerep!=''){     
              if (mostrarjasper=='S') 
                  pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=compras&r="+nombrerep+".php&s=<?php echo $sf_user->getAttribute('schema');?>&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
              else
                pagina=ruta+"/reportes/reportes/compras/r.php?r="+nombrerep+".php&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
            }else {
              if (mostrarjasper=='S') 
                  pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=compras&r=<?php echo $caordcom->getReptipcom();?>&s=<?php echo $sf_user->getAttribute('schema');?>&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
              else
                pagina=ruta+"/reportes/reportes/compras/r.php?r=<?php echo $caordcom->getReptipcom(); ?>&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
            }
        }
        window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
      }
  }

</script>
