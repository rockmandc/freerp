<?php
// auto-generated by sfPropelAdmin
// date: 2015/03/27 10:28:09
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoAlmreq 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list_actions.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<ul class="sf_admin_actions">
<?php if ($nomfor!='') {?>
  <li><?php echo button_to(__('create'), 'almreq/create', array (
  'class' => 'sf_admin_action_create',
)) ?></li>
<?php }else{ ?>
  <li><?php echo button_to(__('create'), 'almreq/create', array (
  'class' => 'sf_admin_action_create',
)) ?></li>
<?php } ?>
</ul>
