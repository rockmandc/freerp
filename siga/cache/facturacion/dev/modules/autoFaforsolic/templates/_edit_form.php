<?php
// auto-generated by PropelCidesa
// date: 2017/02/17 10:36:14
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

<?php echo form_tag('faforsolic/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'return false;',
)) ?>

<?php echo object_input_hidden_tag($faforsol, 'getId') ?>

<?php
  $fields = FaforsolPeer::getFieldNames();

  if(array_search('Codalmusu', $fields))
  {  ?>
  <h2 class="h2" onclick="javascript: return $('divusualms').toggle();"><?php echo __('Almacenes') ?></h2>
  <fieldset id="sf_fieldset_usualms" class="">
  <div class="form-row" id="divusualms">
    <?php echo label_for('faforsol[codalmusu]', __('Almacenes Por Usuario: '), 'class="required" Style="text-align:left; width:150px"') ?>
    <div class="content">
    <?php
      $almacenes = $sf_user->getAttribute('usualms',array());
      if(count($almacenes)>0){
        $keys = array_keys($almacenes);
        $codalm = $keys[0];
      }else $codalm = '';
      if($codalm == '') echo label_for('faforsol[codalmusu]', __('Usuario sin Almacen Asociado'), 'class="required" Style="text-align:left; width:150px"').'<br><br><br>';
      else echo select_tag('faforsol[codalmusu]',options_for_select($almacenes,$faforsol->getCodalmusu()!='' ? $faforsol->getCodalmusu() : $codalm), ( ($faforsol->getId()) ? 'disabled=true' : '').' style=width:500px');
    ?>
    </div>
  </div>
  </fieldset>
<?php } ?>



<fieldset id="sf_fieldset_none" class="">

<div class="form-row" id="divNONE">
<div id="divnomsol">
  <?php if($labels['faforsol{nomsol}']!='.:') { ?>
  <?php echo label_for('faforsol[nomsol]', __($labels['faforsol{nomsol}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('faforsol{nomsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('faforsol{nomsol}')): ?>
    <?php echo form_error('faforsol{nomsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($faforsol, 'getNomsol', array (
  'size' => 40,
  'control_name' => 'faforsol[nomsol]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['faforsol{nomsol}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<?php include_partial('edit_actions', array('faforsol' => $faforsol)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($faforsol->getId()): ?>
<?php echo button_to(__('delete'), 'faforsolic/delete?id='.$faforsol->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
