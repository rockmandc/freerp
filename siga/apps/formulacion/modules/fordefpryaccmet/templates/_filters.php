<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_filters.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/19 12:42:22
?>
<?php use_helper('Object', 'Javascript') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fordefpryaccmet/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codpro"><?php echo __('Proyecto o Acción') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codpro]', isset($filters['codpro']) ? $filters['codpro'] : null, array (
  'size' => 15,
  'onBlur' => "javascript:cadena=rayitas(this.value);document.getElementById('filters_codpro').value=cadena;",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraproyecto')",
)) ?>
    </div>

<br>

    <label for="codaccesp"><?php echo __('Acción Específica') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codaccesp]', isset($filters['codaccesp']) ? $filters['codaccesp'] : null, array (
  'size' => 15,
  'onBlur' => "javascript:cadena=rayitas(this.value);document.getElementById('filters_codaccesp').value=cadena;",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraaccion')",
)) ?>
    </div>   
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordefpryaccmet/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
