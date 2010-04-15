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
		var $codconpag1;
		var $codconpag2;
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
			$this->codconpag1=H::GetPost("codconpag1");
			$this->codconpag2=H::GetPost("codconpag2");
			$this->comodin=H::GetPost("comodin");
			///nombre de tabla: predocprc
			$this->sql="SELECT codconpag as codconpag,desconpag
						FROM caconpag
						WHERE ( codconpag >='".$this->codconpag1."' AND codconpag <='".$this->codconpag2."' )
						ORDER BY codconpag";
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
			$this->ln(7);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",7);
		    $tb=$this->bd->select($this->sql);
		    $this->tb2=$tb;
			$ref="";
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8);
				 $this->cell($this->anchos[0]+40,3,$tb->fields["codconpag"]);
				 $x=$this->GetX();
				 $this->cell(70);
				 $this->SetX($x);
				 $this->Multicell($this->anchos[1]+60,3,$tb->fields["desconpag"]);
				$tb->MoveNext();
			    $this->ln(4);
			    $y=$this->GetY();
			    if ($y>= 170)
			    {
			    	$this->AddPage();
			    }
			}
		}
	}
?>