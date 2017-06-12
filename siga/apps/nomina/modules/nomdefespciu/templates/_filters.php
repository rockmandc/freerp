<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/04 15:51:32
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('nomdefespciu/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codpai"><?php echo __('Cód. Estado:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codpai]', isset($filters['codpai']) ? $filters['codpai'] : null, array (
  'size' => 4,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="codedo"><?php echo __('Cód. Municipio:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codedo]', isset($filters['codedo']) ? $filters['codedo'] : null, array (
  'size' => 4,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="codciu"><?php echo __('Cód. Parroquia:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codciu]', isset($filters['codciu']) ? $filters['codciu'] : null, array (
  'size' => 4,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="nomciu"><?php echo __('Nombre:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomciu]', isset($filters['nomciu']) ? $filters['nomciu'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'nomdefespciu/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
