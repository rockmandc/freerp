<?php
// auto-generated by PropelCidesa
// date: 2017/02/17 10:31:16
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list_th_tabular.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>

  <th id="sf_admin_list_th_reffac">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/fafactur/sort') == 'reffac'): ?>
      <?php echo link_to(__('Número'), 'fafactur/list?sort=reffac&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/fafactur/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/fafactur/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Número'), 'fafactur/list?sort=reffac&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_fecfac">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/fafactur/sort') == 'fecfac'): ?>
      <?php echo link_to(__('Fecha Emisión'), 'fafactur/list?sort=fecfac&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/fafactur/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/fafactur/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Fecha Emisión'), 'fafactur/list?sort=fecfac&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_rifpro">
        <?php echo __('C.I/R.I.F Cliente') ?>
          </th>
  <th id="sf_admin_list_th_nompro">
        <?php echo __('Nombre') ?>
          </th>
  <th id="sf_admin_list_th_nomedo">
        <?php echo __('Estado') ?>
          </th>