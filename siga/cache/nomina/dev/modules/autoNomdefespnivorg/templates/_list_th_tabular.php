<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 05:45:06
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoNomdefespnivorg 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list_th_tabular.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

  <th id="sf_admin_list_th_codniv">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/npestorg/sort') == 'codniv'): ?>
      <?php echo link_to(__('Código'), 'nomdefespnivorg/list?sort=codniv&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/npestorg/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/npestorg/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Código'), 'nomdefespnivorg/list?sort=codniv&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_desniv">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/npestorg/sort') == 'desniv'): ?>
      <?php echo link_to(__('Descripción'), 'nomdefespnivorg/list?sort=desniv&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/npestorg/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/npestorg/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Descripción'), 'nomdefespnivorg/list?sort=desniv&type=asc') ?>
      <?php endif; ?>
          </th>
