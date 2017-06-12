<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/26 15:51:35
?>
<?php echo form_tag('empleadosbanco/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npempleados_banco, 'getId') ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipos De Nominas')?></legend>
<div class="form-row">
  <?php echo label_for('npempleados_banco[codnom]', __($labels['npempleados_banco{codnom}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npempleados_banco{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npempleados_banco{codnom}')): ?>
    <?php echo form_error('npempleados_banco{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npempleados_banco, 'getCodnom', array (
  'size' => 20,
  'readonly' => $npempleados_banco->getId()!='' ? true : false ,
  'control_name' => 'npempleados_banco[codnom]',
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'condition' => "$('npempleados_banco_codnom').value!=''",
        'url'      => 'empleadosbanco/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=npempleados_banco_desnom&cajtexcom=npempleados_banco_codnom&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Empleadobanco_Npnomina/clase/Npnomina/frame/sf_admin_edit_form/obj1/npempleados_banco_codnom/obj2/npempleados_banco_desnom/campo1/codnom/campo2/nomnom/param1/')?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php $value = object_input_tag($npempleados_banco, 'getDesnom', array (
  'size' => 30,  
  'readonly' => $npempleados_banco->getId()!='' ? true : false ,
  'control_name' => 'npempleados_banco[desnom]',
)); echo $value ? $value : '&nbsp;' ?></div>
</div>

<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>


</fieldset>


<?php include_partial('edit_actions', array('npempleados_banco' => $npempleados_banco)) ?>

</form>

