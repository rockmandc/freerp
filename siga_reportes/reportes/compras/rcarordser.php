<?

	require_once("pdfcarordser_new.php");

	$obj= new pdfreporte();

	 $tb=$obj->bd->select($obj->sql);
	 //if (!$tb->EOF)
	 //{ //HAY DATOS

			$obj->AliasNbPages();
			$obj->AddPage();
			$obj->Cuerpo();
			$obj->Output();
	//}
/*	else
	{ //NO HAY DATOS
	  ?>
	   <script>
	    alert('No hay informaci�n para procesar �ste reporte...');
		location=("carordser_new.php");
		</script>
      <?
	}*/

?>