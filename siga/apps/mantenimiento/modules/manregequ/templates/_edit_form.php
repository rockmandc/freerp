<?php
// auto-generated by PropelCidesa
// date: 2015/02/24 17:08:34
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

<?php echo form_tag('manregequ/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'return false;',
)) ?>

<?php echo object_input_hidden_tag($manregequ, 'getId') ?>

<?php
  $fields = ManregequPeer::getFieldNames();

  if(array_search('Codalmusu', $fields))
  {  ?>
  <h2 class="h2" onclick="javascript: return $('divusualms').toggle();"><?php echo __('Almacenes') ?></h2>
  <fieldset id="sf_fieldset_usualms" class="">
  <div class="form-row" id="divusualms">
    <?php echo label_for('manregequ[codalmusu]', __('Almacenes Por Usuario: '), 'class="required" Style="text-align:left; width:150px"') ?>
    <div class="content">
    <?php
      $almacenes = $sf_user->getAttribute('usualms',array());
      if(count($almacenes)>0){
        $keys = array_keys($almacenes);
        $codalm = $keys[0];
      }else $codalm = '';
      if($codalm == '') echo label_for('manregequ[codalmusu]', __('Usuario sin Almacen Asociado'), 'class="required" Style="text-align:left; width:150px"').'<br><br><br>';
      else echo select_tag('manregequ[codalmusu]',options_for_select($almacenes,$manregequ->getCodalmusu()!='' ? $manregequ->getCodalmusu() : $codalm), ( ($manregequ->getId()) ? 'disabled=true' : '').' style=width:500px');
    ?>
    </div>
  </div>
  </fieldset>
<?php } ?>

<?php echo object_input_hidden_tag($manregequ, 'getValmon', array('id' => 'manregequ_valmon', 'name' => 'manregequ[valmon]')) ?>
<?php echo object_input_hidden_tag($manregequ, 'getLoguse', array('id' => 'manregequ_loguse', 'name' => 'manregequ[loguse]')) ?>
<?php echo object_input_hidden_tag($manregequ, 'getLongitud', array('id' => 'manregequ_longitud', 'name' => 'manregequ[longitud]')) ?>


<fieldset id="sf_fieldset_none" class="">

<div class="form-row" id="divNONE">
<div id="divnumequ">
  <?php if($labels['manregequ{numequ}']!='.:') { ?>
  <?php echo label_for('manregequ[numequ]', __($labels['manregequ{numequ}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{numequ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{numequ}')): ?>
    <?php echo form_error('manregequ{numequ}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, 'getNumequ', array (
  'size' => 10,
  'control_name' => 'manregequ[numequ]',
  'maxlength' => 10,
  'onFocus' => 'readonly(this.id)',
  'onBlur'=> remote_function(array(
    'url'      => 'manregequ/ajax',
    'script' => true,
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('manregequ_numequ').value != ''",
      'with' => "'ajax=2&cajtexmos=manregequ_nomequ&codigo='+this.value"
    ))
)); echo $value ? $value : '&nbsp;' ?>
      <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Mantenimiento_Manregequ/clase/Manregequ/frame/sf_admin_edit_form/obj1/manregequ_numequ/campo1/numequ','','','botoncat')?>
		
  <?php if($labels['manregequ{numequ}']!='.:') { ?>  

  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divnomequ">
  <?php if($labels['manregequ{nomequ}']!='.:') { ?>
  <?php echo label_for('manregequ[nomequ]', __($labels['manregequ{nomequ}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{nomequ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{nomequ}')): ?>
    <?php echo form_error('manregequ{nomequ}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, 'getNomequ', array (
  'size' => 80,
  'control_name' => 'manregequ[nomequ]',
  'maxlength' => 500,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{nomequ}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Ficha Técnica');?>
<fieldset id="sf_fieldset_ficha_t__cnica" class="">

<div class="form-row" id="divFicha Técnica">
<div id="divserequ">
  <?php if($labels['manregequ{serequ}']!='.:') { ?>
  <?php echo label_for('manregequ[serequ]', __($labels['manregequ{serequ}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{serequ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{serequ}')): ?>
    <?php echo form_error('manregequ{serequ}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, 'getSerequ', array (
  'size' => 50,
  'control_name' => 'manregequ[serequ]',
  'maxlength' => 50,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{serequ}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodteq">
  <?php if($labels['manregequ{codteq}']!='.:') { ?>
  <?php echo label_for('manregequ[codteq]', __($labels['manregequ{codteq}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codteq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codteq}')): ?>
    <?php echo form_error('manregequ{codteq}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodteq',
  'getsecundario' => 'getDesteq',
  'campoprincipal' => 'codteq',
  'camposecundario' => 'desteq',
  'campobase' => 'id',
),  'Mantenimiento_Mantipequ',  'Mantipequ',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codteq}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodide">
  <?php if($labels['manregequ{codide}']!='.:') { ?>
  <?php echo label_for('manregequ[codide]', __($labels['manregequ{codide}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codide}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codide}')): ?>
    <?php echo form_error('manregequ{codide}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodide',
  'getsecundario' => 'getDeside',
  'campoprincipal' => 'codide',
  'camposecundario' => 'deside',
  'campobase' => 'id',
),  'Mantenimiento_Manidegru',  'Manidegru',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codide}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodcla">
  <?php if($labels['manregequ{codcla}']!='.:') { ?>
  <?php echo label_for('manregequ[codcla]', __($labels['manregequ{codcla}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codcla}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codcla}')): ?>
    <?php echo form_error('manregequ{codcla}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodcla',
  'getsecundario' => 'getDescla',
  'campoprincipal' => 'codcla',
  'camposecundario' => 'descla',
  'campobase' => 'id',
),  'Mantenimiento_Manclaequ',  'Manclaequ',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codcla}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodtal">
  <?php if($labels['manregequ{codtal}']!='.:') { ?>
  <?php echo label_for('manregequ[codtal]', __($labels['manregequ{codtal}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codtal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codtal}')): ?>
    <?php echo form_error('manregequ{codtal}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodtal',
  'getsecundario' => 'getDestal',
  'campoprincipal' => 'codtal',
  'camposecundario' => 'destal',
  'campobase' => 'id',
),  'Mantenimiento_Mantipali',  'Mantipali',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codtal}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodtta">
  <?php if($labels['manregequ{codtta}']!='.:') { ?>
  <?php echo label_for('manregequ[codtta]', __($labels['manregequ{codtta}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codtta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codtta}')): ?>
    <?php echo form_error('manregequ{codtta}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodtta',
  'getsecundario' => 'getDestta',
  'campoprincipal' => 'codtta',
  'camposecundario' => 'destta',
  'campobase' => 'id',
),  'Mantenimiento_Mantiptra',  'Mantiptra',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codtta}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodfab">
  <?php if($labels['manregequ{codfab}']!='.:') { ?>
  <?php echo label_for('manregequ[codfab]', __($labels['manregequ{codfab}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codfab}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codfab}')): ?>
    <?php echo form_error('manregequ{codfab}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodfab',
  'getsecundario' => 'getDesfab',
  'campoprincipal' => 'codfab',
  'camposecundario' => 'desfab',
  'campobase' => 'id',
),  'Mantenimiento_Mandeffab',  'Mandeffab',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codfab}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divfecfab">
  <?php if($labels['manregequ{fecfab}']!='.:') { ?>
  <?php echo label_for('manregequ[fecfab]', __($labels['manregequ{fecfab}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{fecfab}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{fecfab}')): ?>
    <?php echo form_error('manregequ{fecfab}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_date_tag($manregequ, 'getFecfab', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'manregequ[fecfab]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{fecfab}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcoddis">
  <?php if($labels['manregequ{coddis}']!='.:') { ?>
  <?php echo label_for('manregequ[coddis]', __($labels['manregequ{coddis}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{coddis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{coddis}')): ?>
    <?php echo form_error('manregequ{coddis}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCoddis',
  'getsecundario' => 'getDesdis',
  'campoprincipal' => 'coddis',
  'camposecundario' => 'desdis',
  'campobase' => 'id',
),  'Bndisbie_Bieregactinmd',  'Bndisbie',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{coddis}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodmon">
  <?php if($labels['manregequ{codmon}']!='.:') { ?>
  <?php echo label_for('manregequ[codmon]', __($labels['manregequ{codmon}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codmon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codmon}')): ?>
    <?php echo form_error('manregequ{codmon}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('codmon', array('type' => 'edit', 'manregequ' => $manregequ,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{codmon}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcosequ">
  <?php if($labels['manregequ{cosequ}']!='.:') { ?>
  <?php echo label_for('manregequ[cosequ]', __($labels['manregequ{cosequ}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{cosequ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{cosequ}')): ?>
    <?php echo form_error('manregequ{cosequ}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, array('getCosequ',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'manregequ[cosequ]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{cosequ}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodtga">
  <?php if($labels['manregequ{codtga}']!='.:') { ?>
  <?php echo label_for('manregequ[codtga]', __($labels['manregequ{codtga}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codtga}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codtga}')): ?>
    <?php echo form_error('manregequ{codtga}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodtga',
  'getsecundario' => 'getDestga',
  'campoprincipal' => 'codtga',
  'camposecundario' => 'destga',
  'campobase' => 'id',
),  'Mantenimiento_Mantipgar',  'Mantipgar',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codtga}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divvalgar">
  <?php if($labels['manregequ{valgar}']!='.:') { ?>
  <?php echo label_for('manregequ[valgar]', __($labels['manregequ{valgar}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{valgar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{valgar}')): ?>
    <?php echo form_error('manregequ{valgar}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, array('getValgar',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'manregequ[valgar]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{valgar}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divfecgar">
  <?php if($labels['manregequ{fecgar}']!='.:') { ?>
  <?php echo label_for('manregequ[fecgar]', __($labels['manregequ{fecgar}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{fecgar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{fecgar}')): ?>
    <?php echo form_error('manregequ{fecgar}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_date_tag($manregequ, 'getFecgar', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'manregequ[fecgar]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{fecgar}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodume">
  <?php if($labels['manregequ{codume}']!='.:') { ?>
  <?php echo label_for('manregequ[codume]', __($labels['manregequ{codume}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codume}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codume}')): ?>
    <?php echo form_error('manregequ{codume}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodume',
  'getsecundario' => 'getDesume',
  'campoprincipal' => 'codume',
  'camposecundario' => 'desume',
  'campobase' => 'id',
),  'Mantenimiento_Manunimed',  'Manunimed',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codume}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divlubric">
  <?php if($labels['manregequ{lubric}']!='.:') { ?>
  <?php echo label_for('manregequ[lubric]', __($labels['manregequ{lubric}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{lubric}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{lubric}')): ?>
    <?php echo form_error('manregequ{lubric}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('lubric', array('type' => 'edit', 'manregequ' => $manregequ,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{lubric}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcombus">
  <?php if($labels['manregequ{combus}']!='.:') { ?>
  <?php echo label_for('manregequ[combus]', __($labels['manregequ{combus}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{combus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{combus}')): ?>
    <?php echo form_error('manregequ{combus}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('combus', array('type' => 'edit', 'manregequ' => $manregequ,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{combus}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodest">
  <?php if($labels['manregequ{codest}']!='.:') { ?>
  <?php echo label_for('manregequ[codest]', __($labels['manregequ{codest}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codest}')): ?>
    <?php echo form_error('manregequ{codest}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodest',
  'getsecundario' => 'getDesest',
  'campoprincipal' => 'codest',
  'camposecundario' => 'desest',
  'campobase' => 'id',
),  'Mantenimiento_Manestequ',  'Manestequ',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codest}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>


<?php tabPageOpenClose("tp1", "tabPage2", 'Ubicación/Responsable ');?>
<fieldset id="sf_fieldset_ubicaci__n_responsable" class="">

<div class="form-row" id="divUbicación/Responsable">
<div id="divcodubi">
  <?php if($labels['manregequ{codubi}']!='.:') { ?>
  <?php echo label_for('manregequ[codubi]', __($labels['manregequ{codubi}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codubi}')): ?>
    <?php echo form_error('manregequ{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodubi',
  'getsecundario' => 'getDesubi',
  'campoprincipal' => 'codubi',
  'camposecundario' => 'desubi',
  'campobase' => 'id',
),  'Bnubibie_Bieregactinmd',  'Bnubibie',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codubi}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodniv">
  <?php if($labels['manregequ{codniv}']!='.:') { ?>
  <?php echo label_for('manregequ[codniv]', __($labels['manregequ{codniv}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codniv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codniv}')): ?>
    <?php echo form_error('manregequ{codniv}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodniv',
  'getsecundario' => 'getDesniv',
  'campoprincipal' => 'codniv',
  'camposecundario' => 'desniv',
  'campobase' => 'id',
),  'Npestorg_Nomhojint',  'Npestorg',  '/param1/'."'+$('manregequ_longitud').value+'".'',  '',  '');?>

  	
  <?php if($labels['manregequ{codniv}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcoduni">
  <?php if($labels['manregequ{coduni}']!='.:') { ?>
  <?php echo label_for('manregequ[coduni]', __($labels['manregequ{coduni}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{coduni}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{coduni}')): ?>
    <?php echo form_error('manregequ{coduni}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCoduni',
  'getsecundario' => 'getDesuni',
  'campoprincipal' => 'coduni',
  'camposecundario' => 'desuni',
  'campobase' => 'id',
),  'Mantenimiento_Manunipro',  'Manunipro',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{coduni}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodcencos">
  <?php if($labels['manregequ{codcencos}']!='.:') { ?>
  <?php echo label_for('manregequ[codcencos]', __($labels['manregequ{codcencos}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codcencos}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codcencos}')): ?>
    <?php echo form_error('manregequ{codcencos}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodcencos',
  'getsecundario' => 'getDescencos',
  'campoprincipal' => 'codcencos',
  'camposecundario' => 'descencos',
  'campobase' => 'id',
),  'Codefcencos_Conasigcencos',  'Codefcencos',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codcencos}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcarcos">
  <?php if($labels['manregequ{carcos}']!='.:') { ?>
  <?php echo label_for('manregequ[carcos]', __($labels['manregequ{carcos}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{carcos}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{carcos}')): ?>
    <?php echo form_error('manregequ{carcos}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('carcos', array('type' => 'edit', 'manregequ' => $manregequ,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{carcos}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodcar">
  <?php if($labels['manregequ{codcar}']!='.:') { ?>
  <?php echo label_for('manregequ[codcar]', __($labels['manregequ{codcar}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{codcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{codcar}')): ?>
    <?php echo form_error('manregequ{codcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($manregequ, 0, array (
  'getprincipal' => 'getCodcar',
  'getsecundario' => 'getNomcar',
  'campoprincipal' => 'codcar',
  'camposecundario' => 'nomcar',
  'campobase' => 'id',
),  'Viadettabcar_Npcargos',  'Npcargos',  '',  '',  '');?>

  	
  <?php if($labels['manregequ{codcar}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Dimensión/Capacidad ');?>
<h2 class="h2" onclick="javascript: return $('divDimensiones').toggle();"><?php echo __('Dimensiones') ?></h2>
<fieldset id="sf_fieldset_dimensiones" class="">

<div class="form-row" id="divDimensiones">
<div id="divpeso">
  <?php if($labels['manregequ{peso}']!='.:') { ?>
  <?php echo label_for('manregequ[peso]', __($labels['manregequ{peso}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{peso}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{peso}')): ?>
    <?php echo form_error('manregequ{peso}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, array('getPeso',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'manregequ[peso]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{peso}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divlongit">
  <?php if($labels['manregequ{longit}']!='.:') { ?>
  <?php echo label_for('manregequ[longit]', __($labels['manregequ{longit}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{longit}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{longit}')): ?>
    <?php echo form_error('manregequ{longit}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, array('getLongit',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'manregequ[longit]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{longit}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divaltura">
  <?php if($labels['manregequ{altura}']!='.:') { ?>
  <?php echo label_for('manregequ[altura]', __($labels['manregequ{altura}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{altura}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{altura}')): ?>
    <?php echo form_error('manregequ{altura}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, array('getAltura',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'manregequ[altura]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{altura}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divancho">
  <?php if($labels['manregequ{ancho}']!='.:') { ?>
  <?php echo label_for('manregequ[ancho]', __($labels['manregequ{ancho}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{ancho}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{ancho}')): ?>
    <?php echo form_error('manregequ{ancho}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, array('getAncho',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'manregequ[ancho]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{ancho}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<h2 class="h2" onclick="javascript: return $('divCapacidad').toggle();"><?php echo __('Capacidad') ?></h2>
<fieldset id="sf_fieldset_capacidad" class="">

<div class="form-row" id="divCapacidad">
<div id="divbalde">
  <?php if($labels['manregequ{balde}']!='.:') { ?>
  <?php echo label_for('manregequ[balde]', __($labels['manregequ{balde}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{balde}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{balde}')): ?>
    <?php echo form_error('manregequ{balde}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, array('getBalde',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'manregequ[balde]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{balde}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divtolba">
  <?php if($labels['manregequ{tolba}']!='.:') { ?>
  <?php echo label_for('manregequ[tolba]', __($labels['manregequ{tolba}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{tolba}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{tolba}')): ?>
    <?php echo form_error('manregequ{tolba}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, array('getTolba',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'manregequ[tolba]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{tolba}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divllenad">
  <?php if($labels['manregequ{llenad}']!='.:') { ?>
  <?php echo label_for('manregequ[llenad]', __($labels['manregequ{llenad}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{llenad}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{llenad}')): ?>
    <?php echo form_error('manregequ{llenad}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($manregequ, array('getLlenad',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'manregequ[llenad]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{llenad}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'Nombres Alternos');?>
<fieldset id="sf_fieldset_nombres_alternos" class="">

<div class="form-row" id="divNombres Alternos">
<div id="divgrid">
  <?php if($labels['manregequ{grid}']!='.:') { ?>
  <?php echo label_for('manregequ[grid]', __($labels['manregequ{grid}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{grid}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{grid}')): ?>
    <?php echo form_error('manregequ{grid}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('grid', array('type' => 'edit', 'manregequ' => $manregequ,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{grid}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'Componentes');?>
<fieldset id="sf_fieldset_componentes" class="">

<div class="form-row" id="divComponentes">
<div id="divgrid2">
  <?php if($labels['manregequ{grid2}']!='.:') { ?>
  <?php echo label_for('manregequ[grid2]', __($labels['manregequ{grid2}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('manregequ{grid2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('manregequ{grid2}')): ?>
    <?php echo form_error('manregequ{grid2}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('grid2', array('type' => 'edit', 'manregequ' => $manregequ,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['manregequ{grid2}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<?php tabInit('tp1','0');?>

<?php include_partial('edit_actions', array('manregequ' => $manregequ)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($manregequ->getId()): ?>
<?php echo button_to(__('delete'), 'manregequ/delete?id='.$manregequ->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript" lang="JavaScript"> 
function CargarNombres(numequ)
 {
    toAjaxUpdater('divgrid',3,getUrlModuloAjax(),'valor','','&codigo='+numequ+'');    
 }

function CargarComponentes(numequ)
 {
    toAjaxUpdater('divgrid2',4,getUrlModuloAjax(),'valor','','&codigo='+numequ+'');    
 } 
</script>
