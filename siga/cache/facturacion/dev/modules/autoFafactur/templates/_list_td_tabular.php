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
 * @version    SVN: $Id: _list_td_tabular.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>

    <td><?php echo link_to($fafactur->getReffac() ? $fafactur->getReffac() : __('-'), 'fafactur/edit?id='.$fafactur->getId()) ?></td>
    <td><?php echo ($fafactur->getFecfac() !== null && $fafactur->getFecfac() !== '') ? format_date($fafactur->getFecfac(), "dd/MM/yyyy") : '' ?></td>
      <td><?php echo $fafactur->getRifpro() ?></td>
      <td><?php echo $fafactur->getNompro() ?></td>
      <td><?php echo $fafactur->getNomedo() ?></td>
  