<?php
// auto-generated by PropelCidesa
// date: 2017/02/13 06:39:11
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

  <th id="sf_admin_list_th_nompai">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/fapais/sort') == 'nompai'): ?>
      <?php echo link_to(__('Nombre'), 'fapais/list?sort=nompai&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/fapais/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/fapais/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Nombre'), 'fapais/list?sort=nompai&type=asc') ?>
      <?php endif; ?>
          </th>