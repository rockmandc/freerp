<?php
// auto-generated by PropelCidesa
// date: 2017/02/13 06:41:38
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_header.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>

<?php
$varcargar="";
$varemp =$sf_user->getAttribute('configemp');
    if ($varemp)
	  if(array_key_exists('generales',$varemp))
		 if(array_key_exists('cargaest',$varemp['generales']))
		 {
		  $varcargar=$varemp['generales']['cargaest'];
		 }
	 ?>


<br>
<br>
<br>
