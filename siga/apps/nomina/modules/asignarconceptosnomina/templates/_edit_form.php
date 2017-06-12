<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/01 10:54:11
?>
<?php echo form_tag('asignarconceptosnomina/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript') ?>
<?php use_helper('Grid') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('SubmitClick') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('observe') ?>
<?php use_helper('wait') ?>


<?php echo object_input_hidden_tag($npnomina, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npnomina[codnom]', __($labels['npnomina{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{codnom}')): ?>
    <?php echo form_error('npnomina{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomina, 'getCodnom', array (
  'size' => 3,
  'control_name' => 'npnomina[codnom]',
  'readonly' => 1,
)); echo $value ? $value : '&nbsp;' ?>
  <?php $value = object_input_tag($npnomina, 'getNomnom', array (
  'size' => 50,
  'control_name' => 'npnomina[nomnom]',
  'readonly' => 1,
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>

<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>
<br>
<strong><?php echo __('Frecuencia en Lote: ') ?></strong>
&nbsp;&nbsp;
 <?php echo radiobutton_tag('marca', '1', false, array('onClick'=> 'marcarTodo(1);'))."Marcar Todo Opción 1".'&nbsp;&nbsp;';
      echo radiobutton_tag('marca', '2', false, array('onClick'=> 'marcarTodo(2);'))."Marcar Todo Opción 2".'&nbsp;&nbsp;';
      echo radiobutton_tag('marca', '3', false, array('onClick'=> 'marcarTodo(3);'))."Marcar Todo Opción 3".'&nbsp;&nbsp;';
      echo radiobutton_tag('marca', '4', false, array('onClick'=> 'desmarcarTodo();'))."Desmarcar Todo".'&nbsp;&nbsp;'; ?>
<br>
<div id="grid" class="form-row">
<?
echo grid_tag($obj2);
?>
</div>


</fieldset>

<?php include_partial('edit_actions', array('npnomina' => $npnomina)) ?>

</form>

<script language="JavaScript" type="text/javascript">
  function chequearemplaedo(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);
  
    var codcon=$(name+"_"+fil+"_2").value;
    var codnom=$('npnomina_codnom').value;

    if ($(id).checked==false)
    {
       new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codigo='+id+'&codnom='+codnom+'&codcon='+codcon})
    }
  }

function marcarTodo(valor)
{
    var am=obtener_filas_grid('b',2);
    if (valor==1)
    {
     var fil=0;
     while (fil<am)
     {
      var id="bx"+"_"+fil+"_4";
      $(id).value='P';
      fil++;
     }
    }
    else if (valor==2)
    {
     var fil=0;
     while (fil<am)
     {
       var id="bx"+"_"+fil+"_4";
       $(id).value='S';

       fil++;
     }
   }
   else
   {
     var fil=0;
     while (fil<am)
     {
      var id="bx"+"_"+fil+"_4";
      $(id).value='D';
      fil++;
     }
   }
  }

  function desmarcarTodo()
  {
    var am=obtener_filas_grid('b',2);
    fil=0;
    while (fil<am)
    {
     var id="bx"+"_"+fil+"_4";
     $(id).value="";
     fil++;
    }
  }
</script>
  
