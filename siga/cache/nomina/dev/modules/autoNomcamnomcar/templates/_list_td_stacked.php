<?php
// auto-generated by PropelCidesa
// date: 2017/02/13 05:46:41
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list_td_stacked.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>

<td colspan="6">
    <?php echo link_to($npasicaremp->getCodemp() ? $npasicaremp->getCodemp() : __('-'), 'nomcamnomcar/edit?id='.$npasicaremp->getId()) ?>
     - 
    <?php echo $npasicaremp->getNomemp() ?>
     - 
    <?php echo $npasicaremp->getCodnom() ?>
     - 
    <?php echo $npasicaremp->getNomnom() ?>
     - 
    <?php echo $npasicaremp->getCodcar() ?>
     - 
    <?php echo $npasicaremp->getNomcar() ?>
     - 
</td>