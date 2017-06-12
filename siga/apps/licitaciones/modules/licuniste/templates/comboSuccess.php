<?php

/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: comboSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript') ?>
<?php

if ($tipo == 'P') {
    echo select_tag('lidatste[codedo]', options_for_select($estados, '', 'include_custom=Seleccione'), array('onChange' => remote_function(array(
            'update' => 'divMunicipios',
            'url' => 'licuniste/combo?par=2',
            'with' => "'pais='+document.getElementById('lidatste_codpai').value+'&estado='+this.value"
    ))));
} else if ($tipo == 'E') {
    echo select_tag('lidatste[codmun]', options_for_select($municipio, '', 'include_custom=Seleccione'), array('onChange' => remote_function(array(
            'update' => 'divParroquia',
            'url' => 'licuniste/combo?par=3',
            'with' => "'pais='+document.getElementById('lidatste_codpai').value+'&estado='+document.getElementById('lidatste_codedo').value+'&municipio='+this.value"
    ))));
} else if ($tipo == 'M') {
    echo select_tag('lidatste[codpar]', options_for_select($parroquia, '', 'include_custom=Seleccione'), array('onChange' => remote_function(array(
            'update' => 'divSector',
            'url' => 'licuniste/combo?par=4',
            'with' => "'pais='+document.getElementById('lidatste_codpai').value+'&estado='+document.getElementById('lidatste_codedo').value+'&municipio='+document.getElementById('lidatste_codmun').value+'&parroquia='+this.value"
    ))));
} else if ($tipo == 'S') {
    echo select_tag('lidatste[codsec]', options_for_select($sector, '', 'include_custom=Seleccione'), array('onChange' => remote_function(array(
            'update' => 'divCasa',
            'url' => 'licuniste/combo?par=5',
            'with' => "'pais='+document.getElementById('lidatste_codpai').value+'&estado='+document.getElementById('lidatste_codedo').value+'&municipio='+document.getElementById('lidatste_codmun').value+'&parroquia='+document.getElementById('lidatste_codpar').value+'&sector='+this.value"
    ))));
    //echo input_tag('prueba','Campo de prueba','size=50, onBlur=alert("Prueba")');
}
?>