<?

	require_once("pdfBNRLISBIESEM.php");
	require_once("anchoBNRLISBIESEM.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();

	for($i=0;$i<count($obj->titulos);$i++)
	{
		$obj->anchos[$i]=$objrep->getAncho($i);
	}

	if ($obj->tb2->EOF)
	{
		?>
		<script>
		alert("No hay informacion para procesar este reporte...");
		location=("oprordemitidaspartidas.php");
		</script>
		<?
	}


	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>