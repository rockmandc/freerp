<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_filters.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/07 16:57:29
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('fordefsubsubobj/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codequ"><?php if ($etiq!="") $et=$etiq; else $et='Directriz'; echo  __($et.':') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codequ]', isset($filters['codequ']) ? $filters['codequ'] : null, array (
  'size' => 2,
   'onBlur'  => "javascript: valor=this.value; valor=valor.pad(2, '0',0);document.getElementById('filters_codequ').value=valor;",
)) ?>
    </div>
<br>
    <label for="codsubobj"><?php if ($etiq2!="") $et2=$etiq2; else $et2='Estrategia'; echo  __($et2.':') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codsubobj]', isset($filters['codsubobj']) ? $filters['codsubobj'] : null, array (
  'size' => 3,
   'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('filters_codsubobj').value=valor;",
)) ?>
    </div>
<br>
    <label for="codsubsubobj"><?php if ($etiqueta!="") $et3=$etiqueta; else $et3='Política'; echo  __($et3.':') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codsubsubobj]', isset($filters['codsubsubobj']) ? $filters['codsubsubobj'] : null, array (
  'size' => 3,
   'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('filters_codsubsubobj').value=valor;",
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fordefsubsubobj/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
