<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 06:29:04
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoAlmregart 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list_th_tabular.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

  <th id="sf_admin_list_th_codart">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/caregart/sort') == 'codart'): ?>
      <?php echo link_to(__('Código'), 'almregart/list?sort=codart&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/caregart/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/caregart/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Código'), 'almregart/list?sort=codart&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_desart">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/caregart/sort') == 'desart'): ?>
      <?php echo link_to(__('Descripción'), 'almregart/list?sort=desart&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/caregart/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/caregart/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Descripción'), 'almregart/list?sort=desart&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_tipo">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/caregart/sort') == 'tipo'): ?>
      <?php echo link_to(__('(A)rtículo ó (S)ervicio'), 'almregart/list?sort=tipo&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/caregart/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/caregart/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('(A)rtículo ó (S)ervicio'), 'almregart/list?sort=tipo&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_ramart">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/caregart/sort') == 'ramart'): ?>
      <?php echo link_to(__('Cod. Ramo'), 'almregart/list?sort=ramart&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/caregart/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/caregart/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Cod. Ramo'), 'almregart/list?sort=ramart&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_nomram">
        <?php echo __('Nom. Ramo') ?>
          </th>
  <th id="sf_admin_list_th_codalt">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/caregart/sort') == 'codalt'): ?>
      <?php echo link_to(__('Código Alternativo'), 'almregart/list?sort=codalt&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/caregart/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/caregart/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Código Alternativo'), 'almregart/list?sort=codalt&type=asc') ?>
      <?php endif; ?>
          </th>