<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_filters.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/29 09:09:22
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('dFilter') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fordefcatpre/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codcat"><?php echo __('Código') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codcat]', isset($filters['codcat']) ? $filters['codcat'] : null, array (
  'size' => 15,
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('filters_codcat').value=cadena;}",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$unidad')",
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordefcatpre/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
