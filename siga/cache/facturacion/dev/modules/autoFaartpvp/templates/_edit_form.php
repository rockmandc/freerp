<?php
// auto-generated by PropelCidesa
// date: 2017/02/17 10:38:16
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>

<?php echo form_tag('faartpvp/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'return false;',
)) ?>

<?php echo object_input_hidden_tag($faartpvp, 'getId') ?>

<?php
  $fields = FaartpvpPeer::getFieldNames();

  if(array_search('Codalmusu', $fields))
  {  ?>
  <h2 class="h2" onclick="javascript: return $('divusualms').toggle();"><?php echo __('Almacenes') ?></h2>
  <fieldset id="sf_fieldset_usualms" class="">
  <div class="form-row" id="divusualms">
    <?php echo label_for('faartpvp[codalmusu]', __('Almacenes Por Usuario: '), 'class="required" Style="text-align:left; width:150px"') ?>
    <div class="content">
    <?php
      $almacenes = $sf_user->getAttribute('usualms',array());
      if(count($almacenes)>0){
        $keys = array_keys($almacenes);
        $codalm = $keys[0];
      }else $codalm = '';
      if($codalm == '') echo label_for('faartpvp[codalmusu]', __('Usuario sin Almacen Asociado'), 'class="required" Style="text-align:left; width:150px"').'<br><br><br>';
      else echo select_tag('faartpvp[codalmusu]',options_for_select($almacenes,$faartpvp->getCodalmusu()!='' ? $faartpvp->getCodalmusu() : $codalm), ( ($faartpvp->getId()) ? 'disabled=true' : '').' style=width:500px');
    ?>
    </div>
  </div>
  </fieldset>
<?php } ?>



<h2 class="h2" onclick="javascript: return $('divDatos del Artículo').toggle();"><?php echo __('Datos del Artículo') ?></h2>
<fieldset id="sf_fieldset_datos_del_art__culo" class="">

<div class="form-row" id="divDatos del Artículo">
<div id="divcodart">
  <?php if($labels['faartpvp{codart}']!='.:') { ?>
  <?php echo label_for('faartpvp[codart]', __($labels['faartpvp{codart}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('faartpvp{codart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('faartpvp{codart}')): ?>
    <?php echo form_error('faartpvp{codart}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($faartpvp, 'getCodart', array (
  'size' => 20,
  'control_name' => 'faartpvp[codart]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['faartpvp{codart}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divdesart">
  <?php if($labels['faartpvp{desart}']!='.:') { ?>
  <?php echo label_for('faartpvp[desart]', __($labels['faartpvp{desart}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('faartpvp{desart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('faartpvp{desart}')): ?>
    <?php echo form_error('faartpvp{desart}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($faartpvp, 'getDesart', array (
  'disabled' => true,
  'control_name' => 'faartpvp[desart]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['faartpvp{desart}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodbar">
  <?php if($labels['faartpvp{codbar}']!='.:') { ?>
  <?php echo label_for('faartpvp[codbar]', __($labels['faartpvp{codbar}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('faartpvp{codbar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('faartpvp{codbar}')): ?>
    <?php echo form_error('faartpvp{codbar}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($faartpvp, 'getCodbar', array (
  'size' => 32,
  'control_name' => 'faartpvp[codbar]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['faartpvp{codbar}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<?php include_partial('edit_actions', array('faartpvp' => $faartpvp)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($faartpvp->getId()): ?>
<?php echo button_to(__('delete'), 'faartpvp/delete?id='.$faartpvp->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

