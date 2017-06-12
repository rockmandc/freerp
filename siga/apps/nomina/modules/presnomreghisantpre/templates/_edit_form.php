<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 37463 2010-04-09 15:38:55Z lhernandez $
 */
// date: 2008/02/14 11:49:27
?>
<?php echo form_tag('presnomreghisantpre/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npantpre, 'getId') ?>
<?php use_helper('Javascript','wait','Grid','PopUp','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos Del Anticipo Sobre Prestamos Otorgados')?></legend>
<div class="form-row">
<br>
  <?php echo label_for('npantpre[codemp]', __($labels['npantpre{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npantpre{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npantpre{codemp}')): ?>
    <?php echo form_error('npantpre{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npantpre, 'getCodemp', array (
    'size' => 20,
    'readonly' => $npantpre->getId()!='' ? true : false ,
    'control_name' => 'npantpre[codemp]',
    'onBlur'=> remote_function(array(
          'update'   => 'mensaje',
          'condition' =>  " $('npantpre_codemp').value != '' && $('id').value == ''",
          'url'      => 'presnomreghisantpre/ajax',
          'complete' => 'AjaxJSON(request, json)',
          'script' => true,
          'with' => "'ajax=1&cajtexmos=npantpre_nomemp&cajtexcom=npantpre_codemp&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;&nbsp;
<?php /*echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Presnomreghisantpre_npantpre/clase/Npantpre/frame/sf_admin_edit_form/obj1/npantpre_codemp/obj2/npantpre_nomemp/obj3/npantpre_fecant/obj4/npantpre_monant/campo1/codemp/campo2/nomemp/campo3/fecant/campo4/monant")*/?>
<?php if(!$npantpre->getId()){
	echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Presnomreghisantpre_nphojint/clase/Nphojint/frame/sf_admin_edit_form/obj1/npantpre_codemp/obj2/npantpre_nomemp/campo1/codemp/campo2/nomemp");}
?>
&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_tag($npantpre, 'getNomemp', array (
  'readonly' => true,
  'size' => 30,
  'control_name' => 'npantpre[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br><br>
<table>
    <tr>
        <th>
            <?php echo label_for('npantpre[fecsolant]', __($labels['npantpre{fecsolant}']), 'class="required" ') ?>
                  <div class="content<?php if ($sf_request->hasError('npantpre{fecsolant}')): ?> form-error<?php endif; ?>">
                  <?php if ($sf_request->hasError('npantpre{fecsolant}')): ?>
                    <?php echo form_error('npantpre{fecsolant}', array('class' => 'form-error-msg')) ?>
                  <?php endif; ?>

                  <?php $value = object_input_date_tag($npantpre, 'getFecsolant', array (
                  'rich' => true,
                  'readonly' => $npantpre->getId()!='' ? true : false ,
                  'calendar_button_img' => '/sf/sf_admin/images/date.png',
                  'control_name' => 'npantpre[fecsolant]',
                  'date_format' => 'dd/MM/yyyy',
                  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
                )); echo $value ? $value : '&nbsp;' ?>
                    </div>
        </th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>
            <?php echo label_for('npantpre[salpre]', __($labels['npantpre{salpre}']), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('npantpre{salpre}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('npantpre{salpre}')): ?>
                <?php echo form_error('npantpre{salpre}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($npantpre, array('getSalpre',true), array (
              'size' => 20,
              'control_name' => 'npantpre[salpre]',
              'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
            )); echo $value ? $value : '&nbsp;' ?>
                </div>
        </th>
    </tr>
</table>

<br><br>

<table>
    <tr>
        <th>
            <?php echo label_for('npantpre[fecant]', __($labels['npantpre{fecant}']), 'class="required" ') ?>
                  <div class="content<?php if ($sf_request->hasError('npantpre{fecant}')): ?> form-error<?php endif; ?>">
                  <?php if ($sf_request->hasError('npantpre{fecant}')): ?>
                    <?php echo form_error('npantpre{fecant}', array('class' => 'form-error-msg')) ?>
                  <?php endif; ?>

                  <?php $value = object_input_date_tag($npantpre, 'getFecant', array (
                  'rich' => true,
                  'readonly' => $npantpre->getId()!='' ? true : false ,
                  'calendar_button_img' => '/sf/sf_admin/images/date.png',
                  'control_name' => 'npantpre[fecant]',
                  'date_format' => 'dd/MM/yyyy',
                  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
                  'onChange'=> remote_function(array(
                  //        'update'   => 'mensaje',
                          'condition' =>  " $('npantpre_fecant').value != '' && $('id').value == ''",
                          'url'      => 'presnomreghisantpre/ajax',
                          'complete' => 'AjaxJSON(request, json)',
                          'script' => true,
                          'with' => "'ajax=2&cajtexmos=npantpre_monant&cajtexcom=npantpre_fecant&cod='+$('npantpre_codemp').value+'&codigo='+this.value",
                        )),
                )); echo $value ? $value : '&nbsp;' ?>
                    </div>
        </th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>
            <?php echo label_for('npantpre[poroto]', __($labels['npantpre{poroto}']), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('npantpre{poroto}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('npantpre{poroto}')): ?>
                <?php echo form_error('npantpre{poroto}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($npantpre, array('getPoroto',true), array (
              'size' => 20,
              'control_name' => 'npantpre[poroto]',
              'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
            )); echo $value ? $value : '&nbsp;' ?>
                </div>
        </th>
    </tr>
</table>

<br><br>

  <?php echo label_for('npantpre[monant]', __($labels['npantpre{monant}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npantpre{monant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npantpre{monant}')): ?>
    <?php echo form_error('npantpre{monant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npantpre, array('getMonant',true), array (
  'size' => 20,
  'readonly' => $npantpre->getId()!='' ? true : false ,
  'control_name' => 'npantpre[monant]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)"
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br><br>
    <?php echo label_for('npantpre[observacion]', __($labels['npantpre{observacion}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npantpre{observacion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npantpre{observacion}')): ?>
    <?php echo form_error('npantpre{observacion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($npantpre, 'getObservacion', array (
  'size' => '80x4',
  'control_name' => 'npantpre[observacion]',
)); echo $value ? $value : '&nbsp;' ?>

</div>



</fieldset>

<?php include_partial('edit_actions', array('npantpre' => $npantpre)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npantpre->getId()): ?>
<?php echo button_to(__('delete'), 'presnomreghisantpre/delete?id='.$npantpre->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
<li class="float-left"><?php if (!$npantpre->getId()): ?>
<?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
)) ?><?php endif; ?>
</li>
  </ul>
