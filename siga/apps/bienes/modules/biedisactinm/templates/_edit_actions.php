<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/06 10:17:56
?>
<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'biedisactinm/list?id='.$bndisinm->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?php if ($bndisinm->getId()==''){ ?>
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
)) ?></li>
  <?php } ?>
    <li><?php echo button_to(__('create'), 'biedisactinm/create', array (
  'class' => 'sf_admin_action_create',
)) ?></li>
  </ul>
