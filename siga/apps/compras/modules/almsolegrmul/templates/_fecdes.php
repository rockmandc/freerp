<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php  $value = object_input_date_tag($casolart, 'getFecdes', array (
	'rich' => true,
	'calendar_button_img' => '/sf/sf_admin/images/date.png',
	'control_name' => 'casolart[fecdes]',
	'date_format' => 'dd/MM/yyyy',
	'size' => 10,
	'maxlength' => 10,
	'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'almsolegrmul/ajax',
         'script'   => true,
         'condition' => "$('casolart_fecdes').value != ''",
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=3&cajtexmos=casolart_fechas&fecha='+$('casolart_fechas').value+'&unires='+$('casolart_unires').value+'&tipreq='+$('casolart_tipreq').value+'&tipmon='+$('casolart_tipmon').value+'&codigo='+this.value"
     ))
)); echo $value ? $value : '&nbsp;'
?>    