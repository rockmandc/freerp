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
<?php use_helper('Object', 'Validation', 'Javascript') ?>
<?php if ($tipo=='E')
{
echo select_tag('nphojint[codest]', options_for_select($municipios,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divParroquias',
		'url'      => 'nomhojint/combo?par=2',
		'with' => "'estado='+document.getElementById('nphojint_codpai').value+'&municipio='+this.value"
  ))));

}
else if ($tipo=='M')
{
	echo select_tag('nphojint[codciu]', options_for_select($parroquias,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divotro',
		'url'      => 'nomhojint/combo?par=3',
		'with' => "'estado='+document.getElementById('nphojint_codpai').value+'&municipio='+document.getElementById('nphojint_codest').value+'&parroquia='+this.value"
  ))));
}
?>

<?php if ($tipo=='E2')
{
 echo select_tag('nphojint[codes2]', options_for_select($municipios2,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divParroquias2',
		'url'      => 'nomhojint/combo?par=5',
		'with' => "'estado2='+document.getElementById('nphojint_codpa2').value+'&municipio2='+this.value"
  ))));
}
else if ($tipo=='M2')
{
echo select_tag('nphojint[codci2]', options_for_select($parroquias2,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divOtro2',
		'url'      => 'nomhojint/combo?par=6',
		'with' => "'estado2='+document.getElementById('nphojint_codpa2').value+'&municipio2='+document.getElementById('nphojint_codes2').value+'&parroquia2='+this.value"
  ))));
}
?>

<?php if ($tipo=='E3')
{
 echo select_tag('nphojint[codregest]', options_for_select($municipios3,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divParroquias3',
		'url'      => 'nomhojint/combo?par=8',
		'with' => "'estado3='+document.getElementById('nphojint_codregpai').value+'&municipio3='+this.value"
  ))));
}
else if ($tipo=='M3')
{
echo select_tag('nphojint[codregciu]', options_for_select($parroquias3,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divOtro3',
		'url'      => 'nomhojint/combo?par=9',
		'with' => "'estado3='+document.getElementById('nphojint_codregpai').value+'&municipio3='+document.getElementById('nphojint_codregest').value+'&parroquia3='+this.value"
  ))));
}
?>