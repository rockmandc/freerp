<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'farecarg/list?id='.$farecarg->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
)) ?></li>
<li><?php echo button_to(__('create'), 'farecarg/create', array (
  'class' => 'sf_admin_action_create',
)) ?></li>
  </ul>