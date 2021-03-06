<?php
// auto-generated by PropelCidesa
// date: 2017/02/13 06:39:17
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

<?php echo form_tag('faestado/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'return false;',
)) ?>

<?php echo object_input_hidden_tag($faestado, 'getId') ?>

<?php
  $fields = FaestadoPeer::getFieldNames();

  if(array_search('Codalmusu', $fields))
  {  ?>
  <h2 class="h2" onclick="javascript: return $('divusualms').toggle();"><?php echo __('Almacenes') ?></h2>
  <fieldset id="sf_fieldset_usualms" class="">
  <div class="form-row" id="divusualms">
    <?php echo label_for('faestado[codalmusu]', __('Almacenes Por Usuario: '), 'class="required" Style="text-align:left; width:150px"') ?>
    <div class="content">
    <?php
      $almacenes = $sf_user->getAttribute('usualms',array());
      if(count($almacenes)>0){
        $keys = array_keys($almacenes);
        $codalm = $keys[0];
      }else $codalm = '';
      if($codalm == '') echo label_for('faestado[codalmusu]', __('Usuario sin Almacen Asociado'), 'class="required" Style="text-align:left; width:150px"').'<br><br><br>';
      else echo select_tag('faestado[codalmusu]',options_for_select($almacenes,$faestado->getCodalmusu()!='' ? $faestado->getCodalmusu() : $codalm), ( ($faestado->getId()) ? 'disabled=true' : '').' style=width:500px');
    ?>
    </div>
  </div>
  </fieldset>
<?php } ?>



<fieldset id="sf_fieldset_none" class="">

<div class="form-row" id="divNONE">
<div id="divfapais_id">
  <?php if($labels['faestado{fapais_id}']!='.:') { ?>
  <?php echo label_for('faestado[fapais_id]', __($labels['faestado{fapais_id}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('faestado{fapais_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('faestado{fapais_id}')): ?>
    <?php echo form_error('faestado{fapais_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_select_tag($faestado, 'getFapaisId', array (
  'related_class' => 'Fapais',
  'control_name' => 'faestado[fapais_id]',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['faestado{fapais_id}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divnomedo">
  <?php if($labels['faestado{nomedo}']!='.:') { ?>
  <?php echo label_for('faestado[nomedo]', __($labels['faestado{nomedo}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('faestado{nomedo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('faestado{nomedo}')): ?>
    <?php echo form_error('faestado{nomedo}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($faestado, 'getNomedo', array (
  'size' => 30,
  'control_name' => 'faestado[nomedo]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['faestado{nomedo}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<?php include_partial('edit_actions', array('faestado' => $faestado)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($faestado->getId()): ?>
<?php echo button_to(__('delete'), 'faestado/delete?id='.$faestado->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

