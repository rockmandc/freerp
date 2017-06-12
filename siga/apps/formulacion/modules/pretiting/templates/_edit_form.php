<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/18 15:41:44
?>
<?php echo form_tag('pretiting/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php if ($sf_flash->has('notice1')): ?>
<div class="form-errors">
<h2><?php echo __($sf_flash->get('notice1')) ?></h2>
</div>
<?php endif; ?>

<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>

<?php echo object_input_hidden_tag($fordefparing, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend>Datos de la Partida</legend>
<div class="form-row">
   <?php echo label_for('vacio',' ') ?>
 <strong><?php echo '&nbsp;'.$etiquetamascarapartida;?></strong>
  <?php echo label_for('fordefparing[codparing]', __($labels['fordefparing{codparing}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefparing{codparing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefparing{codparing}')): ?>
    <?php echo form_error('fordefparing{codparing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefparing, 'getCodparing', array (
  'size' => $lonmaspar,
  'control_name' => 'fordefparing[codparing]',
  'maxlength' => $lonmaspar,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascarapartida')",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fordefparing[nomparing]', __($labels['fordefparing{nomparing}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefparing{nomparing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefparing{nomparing}')): ?>
    <?php echo form_error('fordefparing{nomparing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefparing, 'getNomparing', array (
  'size' => 80,
  'control_name' => 'fordefparing[nomparing]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fordefparing' => $fordefparing)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fordefparing->getId()): ?>
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
<?php endif; ?>
</li>
  </ul>

<script type="text/javascript">
  function eliminar()
  {
    var cod=$('fordefparing_codparing').value;
    var id=$('id').value;

    location.href='/formulacion'+getEnv()+'.php/pretiting/eliminar?cod='+cod+'&id='+id;
  }
 </script>

