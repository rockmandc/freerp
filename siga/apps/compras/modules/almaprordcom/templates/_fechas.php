<?php  $value = object_input_date_tag($caordcom, 'getFechas', array (
	'rich' => true,
	'calendar_button_img' => '/sf/sf_admin/images/date.png',
	'control_name' => 'caordcom[fechas]',
	'date_format' => 'dd/MM/yyyy',
	'size' => 10,
	'maxlength' => 10,
	'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'almaprordcom/ajax',
         'script'   => true,
         'condition' => "$('caordcom_fechas').value != ''",
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&fec1='+$('caordcom_fecdes').value+'&fec2='+$('caordcom_fechas').value+'&ordcom1='+$('caordcom_ordcomdes').value+'&ordcom2='+$('caordcom_ordcomhas').value"
     ))
)); echo $value ? $value : '&nbsp;'
?>   