<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/17 10:34:30
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoAlminvfis 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list_th_tabular.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

  <th id="sf_admin_list_th_codalm">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/cainvfis/sort') == 'codalm'): ?>
      <?php echo link_to(__('Almacen'), 'alminvfis/list?sort=codalm&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/cainvfis/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/cainvfis/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Almacen'), 'alminvfis/list?sort=codalm&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_fecinv">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/cainvfis/sort') == 'fecinv'): ?>
      <?php echo link_to(__('Fecha Inventario'), 'alminvfis/list?sort=fecinv&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/cainvfis/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/cainvfis/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Fecha Inventario'), 'alminvfis/list?sort=fecinv&type=asc') ?>
      <?php endif; ?>
          </th>