<?php
// auto-generated by sfPropelAdmin
// date: 2007/05/30 18:33:23
?>
<td colspan="4">
    <?php echo link_to($cadphartser->getDphart() ? $cadphartser->getDphart() : __('-'), 'almdespser/edit?id='.$cadphartser->getId()) ?>
     - 
    <?php echo $cadphartser->getDesdph() ?>
     - 
    <?php echo $cadphartser->getReqart() ?>
     - 
    <?php echo ($cadphartser->getFecdph() !== null && $cadphartser->getFecdph() !== '') ? format_date($cadphartser->getFecdph(), "dd/MM/yyyy") : '' ?>
     - 
</td>