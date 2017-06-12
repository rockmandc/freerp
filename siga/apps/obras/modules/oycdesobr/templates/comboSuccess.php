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

<?php if ($tipo=='P')
{
 echo select_tag('ocregobr[codedo]', options_for_select($estados,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
'update'   => 'divMunicipios',
'url'      => 'oycdesobr/combo?par=2',
'with' => "'pais='+document.getElementById('ocregobr_codpai').value+'&estado='+this.value"
  ))));
}
else if ($tipo=='E')
{
	echo select_tag('ocregobr[codmun]', options_for_select($municipio,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
	'update'   => 'divParroquia',
	'url'      => 'oycdesobr/combo?par=3',
	'with' => "'pais='+document.getElementById('ocregobr_codpai').value+'&estado='+document.getElementById('ocregobr_codedo').value+'&municipio='+this.value"
  ))));
}
else if ($tipo=='M')
{
	echo select_tag('ocregobr[codpar]', options_for_select($parroquia,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
	'update'   => 'divSector',
	'url'      => 'oycdesobr/combo?par=4',
	'with' => "'pais='+document.getElementById('ocregobr_codpai','include_custom=Seleccione').value+'&estado='+document.getElementById('ocregobr_codedo').value+'&municipio='+document.getElementById('ocregobr_codmun').value+'&parroquia='+this.value"
  ))));
}
else if ($tipo=='S')
{
	echo select_tag('ocregobr[codsec]', options_for_select($sector,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
	'update'   => 'divCasa',
	'url'      => 'oycdesobr/combo?par=5',
	'with' => "'pais='+document.getElementById('ocregobr_codpai').value+'&estado='+document.getElementById('ocregobr_codedo').value+'&municipio='+document.getElementById('ocregobr_codmun').value+'&parroquia='+document.getElementById('ocregobr_codpar').value+'&sector='+this.value"
  ))));
}
?>
