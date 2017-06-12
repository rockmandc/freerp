<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/26 20:32:18
?>
<?php echo form_tag('vacregsalvac/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($nphojint, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('nphojint[codemp]', __($labels['nphojint{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codemp}')): ?>
    <?php echo form_error('nphojint{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCodemp', array (
  'disabled' => true,
  'size' => 20,
  'control_name' => 'nphojint[codemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('nphojint[nomemp]', __($labels['nphojint{nomemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{nomemp}')): ?>
    <?php echo form_error('nphojint{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getNomemp', array (
  'disabled' => true,  
  'size' => 80,
  'control_name' => 'nphojint[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('nphojint[fecing]', __($labels['nphojint{fecing}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fecing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fecing}')): ?>
    <?php echo form_error('nphojint{fecing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getFecing', array (
  'disabled' => true,  
  'size' => 10,
  'control_name' => 'nphojint[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('nphojint[codcar]', __($labels['nphojint{codcar}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codcar}')): ?>
    <?php echo form_error('nphojint{codcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCodcar', array (
  'disabled' => true,
  'control_name' => 'nphojint[codcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('nphojint[nomcar]', __($labels['nphojint{nomcar}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{nomcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{nomcar}')): ?>
    <?php echo form_error('nphojint{nomcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getNomcar', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'nphojint[nomcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('nphojint[codnom]', __($labels['nphojint{codnom}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codnom}')): ?>
    <?php echo form_error('nphojint{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCodnom', array (
  'disabled' => true,
  'control_name' => 'nphojint[codnom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('nphojint[nomnom]', __($labels['nphojint{nomnom}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{nomnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{nomnom}')): ?>
    <?php echo form_error('nphojint{nomnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getNomnom', array (
  'disabled' => true,
  'control_name' => 'nphojint[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

</fieldset>

<!-- Modifique estas variables y luego coloque las columnas y registros que desee -->
<?php $tituloTabla = __('Datos Para el Disfrute de Vacaciones'); ?>
<?php $pagerTabla = $PagerNpvacregsalActuales; ?>
<?php $modulo = $sf_context->getModuleName(); ?>
<?php $accion = 'edit'; ?>
<!-- Datos Actuales -->
<fieldset>
<legend><?php echo $tituloTabla; ?></legend>
<table border="0" class="sf_admin_list">
<thead>
	<tr>
		<!-- Nombre de las Columnas -->
	    <th><?php echo NpfalperPeer::getColumName(NpfalperPeer::FECDES ) ?></th>
	    <th><?php echo NpfalperPeer::getColumName(NpfalperPeer::FECHAS )  ?></th>
	    <th><?php echo NpfalperPeer::getColumName(NpfalperPeer::CODMOT )  ?></th>
	    <th><?php echo NpfalperPeer::getColumName(NpmotfalPeer::DESMOTFAL )  ?></th>
	</tr>
</thead>
<tbody>
	<?php $i = 1; foreach ($pagerTabla->getResults() as $registro): $odd = fmod(++$i, 2) ?>
	<tr class="sf_admin_row_<?php echo $odd ?>">
		<!-- Registros de la tabla -->
	    <td><?php echo $registro->getFecdes()  ?></td>
	    <td><?php echo $registro->getFechas() ?></td>
	    <td><?php echo $registro->getCodmot() ?></td>
	    <td><?php echo $registro->getDesmotfal() ?></td>
	</tr>
	<?php endforeach; ?>	
</tbody>

<tfoot>
<tr><th colspan="5">
<div class="float-right">
<?php if ($pagerTabla->haveToPaginate()): ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/first.png', array('align' => 'absmiddle', 'alt' => __('First'), 'title' => __('First'))), $modulo.'/'.$accion.'?pageactual=1') ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/previous.png', array('align' => 'absmiddle', 'alt' => __('Previous'), 'title' => __('Previous'))), $modulo.'/'.$accion.'?pageactual='.$pagerTabla->getPreviousPage()) ?>

  <?php foreach ($pagerTabla->getLinks() as $page): ?>
    <?php echo link_to_unless($page == $pagerTabla->getPage(), $page, $modulo.'/list?page='.$page) ?>
  <?php endforeach; ?>

	<?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/next.png', array('align' => 'absmiddle', 'alt' => __('Next'), 'title' => __('Next'))), $modulo.'/'.$accion.'?pageactual='.$pagerTabla->getNextPage()) ?>
	<?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/last.png', array('align' => 'absmiddle', 'alt' => __('Last'), 'title' => __('Last'))), $modulo.'/'.$accion.'?pageactual='.$pagerTabla->getLastPage()) ?>
<?php endif; ?>
</div>
<?php echo format_number_choice('[0] '.__('no result').'|[1] 1 '.__('result').'|(1,+Inf] %1% '.__('results'), array('%1%' => $pagerTabla->getNbResults()), $pagerTabla->getNbResults()) ?>
</th></tr>
</tfoot>

</table>
</fieldset>

<!-- Modifique estas variables y luego coloque las columnas y registros que desee -->
<?php $tituloTabla = __('Información Histórica'); ?>
<?php $pagerTabla = $PagerNpvacregsalHistoricos; ?>
<?php $modulo = $sf_context->getModuleName(); ?>
<?php $accion = 'edit'; ?>
<!-- Datos Actuales -->
<fieldset>
<legend><?php echo $tituloTabla; ?></legend>
<table border="0" class="sf_admin_list">
<thead>
	<tr>
		<!-- Nombre de las Columnas -->
	    <th><?php echo NpfalperPeer::getColumName(NpfalperPeer::FECDES ) ?></th>
	    <th><?php echo NpfalperPeer::getColumName(NpfalperPeer::FECHAS )  ?></th>
	    <th><?php echo NpfalperPeer::getColumName(NpfalperPeer::CODMOT )  ?></th>
	    <th><?php echo NpfalperPeer::getColumName(NpmotfalPeer::DESMOTFAL )  ?></th>
	</tr>
</thead>
<tbody>
	<?php $i = 1; foreach ($pagerTabla->getResults() as $registro): $odd = fmod(++$i, 2) ?>
	<tr class="sf_admin_row_<?php echo $odd ?>">
		<!-- Registros de la tabla -->
	    <td><?php echo $registro->getFecdes()  ?></td>
	    <td><?php echo $registro->getFechas() ?></td>
	    <td><?php echo $registro->getCodmot() ?></td>
	    <td><?php echo $registro->getDesmotfal() ?></td>
	</tr>
	<?php endforeach; ?>	
</tbody>

<tfoot>
<tr><th colspan="5">
<div class="float-right">
<?php if ($pagerTabla->haveToPaginate()): ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/first.png', array('align' => 'absmiddle', 'alt' => __('First'), 'title' => __('First'))), $modulo.'/'.$accion.'?pagehistorico=1') ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/previous.png', array('align' => 'absmiddle', 'alt' => __('Previous'), 'title' => __('Previous'))), $modulo.'/'.$accion.'?pagehistorico='.$pagerTabla->getPreviousPage()) ?>

  <?php foreach ($pagerTabla->getLinks() as $page): ?>
    <?php echo link_to_unless($page == $pagerTabla->getPage(), $page, $modulo.'/list?page='.$page) ?>
  <?php endforeach; ?>

	<?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/next.png', array('align' => 'absmiddle', 'alt' => __('Next'), 'title' => __('Next'))), $modulo.'/'.$accion.'?pagehistorico='.$pagerTabla->getNextPage()) ?>
	<?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/last.png', array('align' => 'absmiddle', 'alt' => __('Last'), 'title' => __('Last'))), $modulo.'/'.$accion.'?pagehistorico='.$pagerTabla->getLastPage()) ?>
<?php endif; ?>
</div>
<?php echo format_number_choice('[0] '.__('no result').'|[1] 1 '.__('result').'|(1,+Inf] %1% '.__('results'), array('%1%' => $pagerTabla->getNbResults()), $pagerTabla->getNbResults()) ?>
</th></tr>
</tfoot>

</table>
</fieldset>



<?php include_partial('edit_actions', array('nphojint' => $nphojint)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($nphojint->getId()): ?>
<?php //echo button_to(__('delete'), 'vacregsalvac/delete?id='.$nphojint->getId(), array (
  //'post' => true,
  //'confirm' => __('Are you sure?'),
  //'class' => 'sf_admin_action_delete',
//)) ?><?php endif; ?>
</li>
  </ul>
