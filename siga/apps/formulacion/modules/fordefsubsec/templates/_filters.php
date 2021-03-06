<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_filters.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/13 08:52:56
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fordefsubsec/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codsec"><?php echo __('Sector:') ?></label>
    <div class="content">
    <?php echo select_tag('filters[codsec]', objects_for_select(FordefsecPeer::doSelect(new Criteria()),'getCodsec','getNomsec',isset($filters['codsec']) ? $filters['codsec'] : null,'include_custom=Seleccione')) ?>  

    </div>
  
  <br>
  
    <label for="codsubsec"><?php echo __('Código:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codsubsec]', isset($filters['codsubsec']) ? $filters['codsubsec'] : null, array (
  'size' => 4,
  'maxlength' => 4,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('filters_codsubsec').value=valor;",
)) ?>
    </div>
  
  <br>
  
    <label for="nomsubsec"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomsubsec]', isset($filters['nomsubsec']) ? $filters['nomsubsec'] : null, array (
  'size' => 15,
  'maxlength' => 250,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordefsubsec/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
