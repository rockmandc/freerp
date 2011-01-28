<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codforent1;
		var $codforent2;
		var $comodin;
		var $refiere;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
				$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codforent1=H::GetPost("codforent1");
			$this->codforent2=H::GetPost("codforent2");
			$this->comodin=H::GetPost("comodin");
			///nombre de tabla: predocprc
			$this->sql="SELECT codforent as codforent,desforent
						FROM caforent
						WHERE ( codforent >='".$this->codforent1."' AND codforent <='".$this->codforent2."' )
						ORDER BY codforent";
			$this->llenartitulosmaestro();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Tipo Condiciones";
				$this->titulos[1]="Descripción";
				//$this->titulos[3]="Refiere";
				$this->anchos[0]=10;
				$this->anchos[1]=30;

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i]+40,10,$this->titulos[$i]);
			}
				//$this->setXY(182,40);
				//$this->cell(30,5,'Refiere');

				// $this->cell($this->anchos[0]-10,10,"Refiere");

			$this->ln(4);
			$this->Line(10,45,270,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(5);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",7);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8);
				 $this->cell($this->anchos[0]+40,10,$tb->fields["codforent"]);
				 $this->cell($this->anchos[1]+40,10,$tb->fields["desforent"]);
				$tb->MoveNext();
			    $this->ln(4);
			}
		}
	}
?>