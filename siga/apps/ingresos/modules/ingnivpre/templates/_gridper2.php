<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_gridper2.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?

	echo label_for('cidefniv[gridper]',__('Períodos'), 'class="required" Style="text-align:left; width:150px"');
	//echo grid_tag_v2($ciajuste->getGridmov());
	echo grid_tag_v2($cidefniv->getGridper2());
?>