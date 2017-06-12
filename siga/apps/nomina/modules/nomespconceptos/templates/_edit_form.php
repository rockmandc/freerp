<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/26 09:53:09
?>
<?php echo form_tag('nomespconceptos/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npnomespnomtip, 'getId') ?>

<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npnomespnomtip[codnomesp]', __($labels['npnomespnomtip{codnomesp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomespnomtip{codnomesp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomespnomtip{codnomesp}')): ?>
    <?php echo form_error('npnomespnomtip{codnomesp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomespnomtip, 'getCodnomesp', array (
  'size' => 12,
  'control_name' => 'npnomespnomtip[codnomesp]',
  'readonly' => $npnomespnomtip->getId()!='' ? true : false ,
  'maxlength' => 3,
  'onBlur'=> remote_function(array(
        'url'      => 'nomespconceptos/ajax',
        'condition' =>  "$('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=2&cajanomnom=npnomespnomtip_nomnomesp&codnomesp='+this.value"
        ))

)); echo $value ? $value : '&nbsp;' ?> &nbsp;

<?php if (!$npnomespnomtip->getId()) echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npnomesptipos_nomespdefinicion/clase/Npnomesptipos/frame/sf_admin_edit_form/obj1/npnomespnomtip_codnomesp/obj2/npnomespnomtip_nomnomesp/campo1/codnomesp/campo2/desnomesp/param1/")?>
&nbsp;

  <?php $value = object_input_tag($npnomespnomtip, 'getNomnomesp', array (
  'size' => 50	,
  'disabled' => true,
  'control_name' => 'npnomespnomtip[nomnomesp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npnomespnomtip[codnom]', __($labels['npnomespnomtip{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomespnomtip{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomespnomtip{codnom}')): ?>
    <?php echo form_error('npnomespnomtip{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomespnomtip, 'getCodnom', array (
  'size' => 12,
  'control_name' => 'npnomespnomtip[codnom]',
  'readonly' => $npnomespnomtip->getId()!='' ? true : false ,
  'maxlength' => 3,
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'condition' =>  "$('id').value == ''",
        'url'      => 'nomespconceptos/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajanomnom=npnomespnomtip_nomnom&codnomesp='+$('npnomespnomtip_codnomesp').value+'&codnom='+this.value"
        ))

)); echo $value ? $value : '&nbsp;' ?> &nbsp;

<?php if (!$npnomespnomtip->getId()) echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npnomespnomtip_nomespconceptos/clase/Npnomina/frame/sf_admin_edit_form/obj1/npnomespnomtip_codnom/obj2/npnomespnomtip_nomnom/campo1/codnom/campo2/nomnom/param1/'+$('npnomespnomtip_codnomesp').value+'")?>
&nbsp;
  <?php $value = object_input_tag($npnomespnomtip, 'getNomnom', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'npnomespnomtip[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>


</fieldset>

<?php include_partial('edit_actions', array('npnomespnomtip' => $npnomespnomtip)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npnomespnomtip->getId()): ?>
<?php echo button_to(__('delete'), 'nomespconceptos/delete?id='.$npnomespnomtip->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

   <script type="text/javascript">

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

 function codcon_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var codret=$(id).value;

   var codretrepetido=false;
   var am=totalregistros('ax',1,20);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var codret2=$(codigo).value;

    if (i!=fila)
    {
      if (codret==codret2)
      {
        codretrepetido=true;
        break;
      }
    }
   i++;
   }
   return codretrepetido;
}

function verificar_codcon(e,id)
{
  if (codcon_repetido(id))
    {
	 alert('El Codigo de la Nomina se encuentra repetido');
	 $(id).value="";

	var aux = id.split("_");
   	var name=aux[0];
   	var fila=aux[1];
   	var col=parseInt(aux[2]);

      var coldes=col+1;
      var nombre=name+"_"+fila+"_"+coldes;

      $(nombre).value="";

    }
}


  </script>
