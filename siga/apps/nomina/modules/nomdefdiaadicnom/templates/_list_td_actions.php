<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/07 15:56:23
?>
<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'nomdefdiaadicnom/edit?id='.$npdiaadicnom->getId().'&nomina='.$npdiaadicnom->getCodnom()) ?></li>
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('delete'))), 'nomdefdiaadicnom/delete?id='.$npdiaadicnom->getId().'&nomina='.$npdiaadicnom->getCodnom(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
)) ?></li>
</ul>
</td>
