<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/13 21:15:22
?>
<?php echo form_tag('oycdefret/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php echo javascript_include_tag('dFilter', 'tools','observe', 'ajax') ?>
<?php echo object_input_hidden_tag($octipret, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos Tipo de Retencion') ?></legend>
<div class="form-row">
  <?php echo label_for('octipret[codtip]', __($labels['octipret{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipret{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{codtip}')): ?>
    <?php echo form_error('octipret{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipret, 'getCodtip', array (
  'size' => 20,
  'maxlength'=>3,
  'readonly'  =>  $octipret->getId()!='' ? true : false ,
  'control_name' => 'octipret[codtip]',
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('octipret_codtip').value=cadena",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('octipret[destip]', __($labels['octipret{destip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipret{destip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{destip}')): ?>
    <?php echo form_error('octipret{destip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipret, 'getDestip', array (
  'size' => 80,
  'maxlength'=>250,
  'control_name' => 'octipret[destip]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 <br>
  <?php echo label_for('octipret[consustra]', __($labels['octipret{consustra}']), 'class="required" ') ?>
   <div class="content<?php if ($sf_request->hasError('octipret{destip}')): ?> form-error<?php endif; ?>">
  <?php if($octipret->getConsustra()=='S') $val = true; else $val=false; ?>

  <?php echo " Si " . radiobutton_tag('octipret[consustra]', 'S', $val, array('onClick'=> remote_function(array(
       'update'   => 'divDatos',
       'url'      => 'oycdefret/datos',
       'script'   => true,
           'with' => "'ajax=S&unitri='+document.getElementById('octipret_unitri').value+'&factor='+document.getElementById('octipret_factor').value+'&porsus='+document.getElementById('octipret_porsus').value+'&basimp='+document.getElementById('octipret_basimp').value+'&basimp1='+document.getElementById('octipret_basimp1').value+'&stamon='+document.getElementById('buton').value+'&porret='+document.getElementById('octipret_porret').value"
        )))) ?>
  &nbsp;&nbsp;
  <?php echo "  No" . radiobutton_tag('octipret[consustra]', 'N', !$val, array('onClick'=> remote_function(array(
       'update'   => 'divDatos',
       'url'      => 'oycdefret/datos',
       'script'   => true,
         'with' => "'ajax=N&unitri='+document.getElementById('octipret_unitri').value+'&factor='+document.getElementById('octipret_factor').value+'&porsus='+document.getElementById('octipret_porsus').value+'&basimp='+document.getElementById('octipret_basimp').value+'&basimp1='+document.getElementById('octipret_basimp1').value+'&stamon='+$('buton').value+'&porret='+document.getElementById('octipret_porret').value"
        ))))?>
    </div>
<br>
<br>


<div id="divDatos">
<div id='sinsustra' style="<?if ($octipret->getConsustra()=='N') echo 'display:block'; else  echo 'display:none'; ?>">
 <fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
 <?php echo label_for('octipret[porret]', __($labels['octipret{porret}']),'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('octipret{porret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{porret}')): ?>
    <?php echo form_error('octipret{porret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
    <?php $value = object_input_tag($octipret, array('getPorret',true), array (
  'size' => 7,
  'control_name' => 'octipret[porret]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
   <?php echo label_for('sobreel', __('Sobre el '),'class="required"') ?>
  <?php $value = object_input_tag($octipret, array('getBasimp',true), array (
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
<?php if($octipret->getStamon()=='N') $val = true; else $val=false; ?>
    <?php echo  radiobutton_tag('octipret[stamon]', 'N', $val,'id="buton"')."Monto Neto"."<br>"?>
     <?php echo radiobutton_tag('octipret[stamon]', 'T', !$val, 'id="buton"')."Monto Total"."</br>" ?>
</th>
</tr>
</table>
</div>
</fieldset>
</div>
<div id='consustra' style="<?if ($octipret->getConsustra()=='S') echo 'display:block'; else echo 'display:none'; ?>">
<fieldset id="sf_fieldset_none" class="">
<legend><? echo __('Sustraendo')?></legend>
<div class="form-row">
<table>
<th>
  <?php echo label_for('octipret[unitri]', __($labels['octipret{unitri}']),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('octipret{unitri}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{unitri}')): ?>
    <?php echo form_error('octipret{unitri}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
    <?php $value = object_input_tag($octipret, array('getUnitri',true), array (
  'size' => 7,
  'control_name' => 'octipret[unitri]',
   'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</th>
<th>&nbsp;&nbsp;&nbsp;</th>
<th>
  <?php echo label_for('octipret[factor]', __('X '.'&nbsp;&nbsp;' .$labels['octipret{factor}']),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('octipret{factor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{factor}')): ?>
    <?php echo form_error('octipret{factor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($octipret, array('getFactor',true), array (
  'size' => 7,
  'control_name' => 'octipret[factor]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
<th>&nbsp;&nbsp;&nbsp;</th>
<th>
  <?php echo label_for('octipret[porsus]', __('X '.'&nbsp;&nbsp;'.$labels['octipret{porsus}']),'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('octipret{porsus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{porsus}')): ?>
  <?php echo form_error('octipret{porsus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($octipret, array('getPorsus',true), array (
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
  <?php echo label_for('octipret[basimp1]', __($labels['octipret{basimp}']),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('octipret{basimp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{basimp}')): ?>
    <?php echo form_error('octipret{basimp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($octipret, array('getBasimp',true), array (
  'size' => 7,
  'control_name' => 'octipret[basimp1]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'.'%'?>
   </div>
</th>
</tr>
</table>
</div>
</fieldset>
</div>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend><?echo __('Datos Contable') ?></legend>
<div class="form-row">
  <?php echo label_for('octipret[codcon]', __($labels['octipret{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipret{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{codcon}')): ?>
    <?php echo form_error('octipret{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipret, 'getCodcon', array (
  'size' => 32,
  'maxlength'=> $loncta,
  'control_name' => 'octipret[codcon]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
        'url'      => 'oycdefret/ajax',
        'complete' => 'AjaxJSON(request, json), verificar()',
        'condition' => "$('octipret_codcon').value != '' && $('id').value == ''",
          'with' => "'ajax=1&cajtexmos=octipret_descta&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?> <?php echo input_hidden_tag('cargable', '') ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Pagtipret/clase/Contabb/frame/sf_admin_edit_form/obj1/octipret_descta/obj2/octipret_codcon/obj3/cargable/campo1/descta/campo2/codcta/campo3/cargab')?>
    </div>
<br>
  <?php echo label_for('octipret[descta]', __($labels['octipret{descta}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('octipret{descta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipret{descta}')): ?>
    <?php echo form_error('octipret{descta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipret, 'getDescta', array (
  'disabled' => true,
  'size'=>60,
  'control_name' => 'octipret[descta]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<?php include_partial('edit_actions', array('octipret' => $octipret)) ?>


</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($octipret->getId()): ?>
<?php echo button_to(__('delete'), 'oyctipret/delete?id='.$octipret->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script type="text/javascript">
function verificar()
{
  if ($('cargable').value!='C' && $('octipret_codcon').value!='')
  {
  	alert('La Cuenta Contable no es Cargable, Por favor Cambiela por una Cuenta Cargable');
  	$('octipret_codcon').value="";
  	$('octipret_descta').value="";
  }
}
</script>