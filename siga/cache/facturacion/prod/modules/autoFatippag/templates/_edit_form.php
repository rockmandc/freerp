<?php
// auto-generated by PropelCidesa
// date: 2017/02/13 05:36:02
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

<?php echo form_tag('fatippag/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'return false;',
)) ?>

<?php echo object_input_hidden_tag($fatippag, 'getId') ?>

<?php
  $fields = FatippagPeer::getFieldNames();

  if(array_search('Codalmusu', $fields))
  {  ?>
  <h2 class="h2" onclick="javascript: return $('divusualms').toggle();"><?php echo __('Almacenes') ?></h2>
  <fieldset id="sf_fieldset_usualms" class="">
  <div class="form-row" id="divusualms">
    <?php echo label_for('fatippag[codalmusu]', __('Almacenes Por Usuario: '), 'class="required" Style="text-align:left; width:150px"') ?>
    <div class="content">
    <?php
      $almacenes = $sf_user->getAttribute('usualms',array());
      if(count($almacenes)>0){
        $keys = array_keys($almacenes);
        $codalm = $keys[0];
      }else $codalm = '';
      if($codalm == '') echo label_for('fatippag[codalmusu]', __('Usuario sin Almacen Asociado'), 'class="required" Style="text-align:left; width:150px"').'<br><br><br>';
      else echo select_tag('fatippag[codalmusu]',options_for_select($almacenes,$fatippag->getCodalmusu()!='' ? $fatippag->getCodalmusu() : $codalm), ( ($fatippag->getId()) ? 'disabled=true' : '').' style=width:500px');
    ?>
    </div>
  </div>
  </fieldset>
<?php } ?>



<fieldset id="sf_fieldset_none" class="">

<div class="form-row" id="divNONE">
<div id="divdestippag">
  <?php if($labels['fatippag{destippag}']!='.:') { ?>
  <?php echo label_for('fatippag[destippag]', __($labels['fatippag{destippag}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fatippag{destippag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fatippag{destippag}')): ?>
    <?php echo form_error('fatippag{destippag}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($fatippag, 'getDestippag', array (
  'size' => 30,
  'control_name' => 'fatippag[destippag]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['fatippag{destippag}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divgenmov">
  <?php if($labels['fatippag{genmov}']!='.:') { ?>
  <?php echo label_for('fatippag[genmov]', __($labels['fatippag{genmov}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fatippag{genmov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fatippag{genmov}')): ?>
    <?php echo form_error('fatippag{genmov}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('genmov', array('type' => 'edit', 'fatippag' => $fatippag,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['fatippag{genmov}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divtipcan">
  <?php if($labels['fatippag{tipcan}']!='.:') { ?>
  <?php echo label_for('fatippag[tipcan]', __($labels['fatippag{tipcan}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fatippag{tipcan}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fatippag{tipcan}')): ?>
    <?php echo form_error('fatippag{tipcan}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('tipcan', array('type' => 'edit', 'fatippag' => $fatippag,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['fatippag{tipcan}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<?php include_partial('edit_actions', array('fatippag' => $fatippag)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fatippag->getId()): ?>
<?php echo button_to(__('delete'), 'fatippag/delete?id='.$fatippag->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
