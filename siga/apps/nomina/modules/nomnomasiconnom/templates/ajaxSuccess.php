<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'Javascript', 'Linktoapp') ?>
<?php echo input_hidden_tag('fila', $numreg) ?>
<?php
  echo grid_tag($obj);
?>

<script language="JavaScript" type="text/javascript">
validar();

  function validar()
  {
	if ($('existecon').value=='NN')
	{
	  alert('El concepto no existe o no esta asociado al Usuario');
	  $('npasiconemp_codcon').value="";
	  $('npasiconemp_nomcon').value="";
	}
	else if ($('existecon').value=='N')
	{
	  alert('El concepto no esta a la Nómina seleccionada');
	  $('npasiconemp_codcon').value="";
	  $('npasiconemp_nomcon').value="";
	}
	else if ($('existecon').value=='O')
	{
	  alert('El concepto ya se encuentra asociado a empleados');
	  $('npasiconemp_codcon').value="";
	  $('npasiconemp_nomcon').value="";
	}
  }
</script>

