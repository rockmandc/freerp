<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");

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
		var $per1;
		var $per2;
		var $cod1;
		var $cod2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->codn1=$_POST["codn1"];
			$this->codn2=$_POST["codn2"];

			$this->sql2="select b.codcar, count (a.codemp) as canemp, c.nomcar, c.suecar, c.canmix,  d.nomnom, b.codnom, c.carvan
						from npasicaremp a, npasicarnom b  , npcargos c, npnomina d, NPHOJINT e
						where (a.codcar = b.codcar and 
						a.codnom = b.codnom) and
						b.codcar = c.codcar and 
						b.codnom = d.codnom and
						rtrim(b.codcar) >= rtrim('".$this->cod1."') and 
						rtrim(b.codcar) <= rtrim('".$this->cod2."')
						and rtrim(b.codnom) >= rtrim('".$this->codn1."') and 
						rtrim(b.codnom) <= rtrim('".$this->codn2."')  and 
						a.codemp=e.codemp and
	                                   e.staemp='A' and a.status='V'
						group by b.codcar, c.nomcar, c.suecar, c.canmix, d.nomnom, b.codnom, c.carvan order by b.codnom";

						$this->sql="
							   select count (x.canemp) as canemp,  x.codcar, x.nomcar, x.suecar, x.nomnom, x.codnom, x.carvan from
						(select  distinct (a.codemp) as canemp, b.codcar, c.nomcar, c.suecar, d.nomnom, b.codnom, c.carvan
						from npasicaremp a, npasicarnom b  , npcargos c, npnomina d, NPHOJINT e
						where (a.codcar = b.codcar and a.codnom = b.codnom) and
						b.codcar = c.codcar and b.codnom = d.codnom and
						rtrim(b.codcar) >=rtrim('".$this->cod1."')  
						and rtrim(b.codcar) <= rtrim('".$this->cod2."')
						and rtrim(b.codnom) >= rtrim('".$this->codn1."') 	
						and rtrim(b.codnom) <= rtrim('".$this->codn2."')  
						and a.codemp=e.codemp and
						e.staemp='A' and a.status='V'
						group by a.codemp,b.codcar, c.nomcar, c.suecar, d.nomnom, b.codnom, c.carvan) x
        					group by x.codcar, x.nomcar, x.suecar, x.nomnom, x.codnom, x.carvan order by x.codnom";


		//print '<pre>'; print $this->sql2; exit;

			$this->llenartitulosmaestro();
			$this->getAncho();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo Cargo";
				$this->titulos[1]="Descripcion Cargo";
				$this->titulos[2]="Sueldo Cargo";
                            $this->titulos[3]="Cargos Disponibles";
				$this->titulos[4]="Cargos Asignados";
				$this->titulos[5]="Cargos Vacantes";
		}
		function getAncho()
		{

			$this->anchos[0]=28;
			$this->anchos[1]=85;
			$this->anchos[2]=23;
			$this->anchos[3]=23;
			$this->anchos[4]=23;
                     $this->anchos[5]=23;
  
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$this->setwidths($this->anchos);
			$this->setAligns(array("C","C","C","C","C","C"));
			$this->Row($this->titulos);
			$this->setwidths($this->anchos);
			$this->setAligns(array("C","L","R","C","C","C"));
			$this->Line(10,45,210,45);
			$this->ln();

		}
		function Cuerpo()
		{
                     $tb2=$this->bd->select($this->sql2);

		       $tb=$this->bd->select($this->sql);
		       $totnom=0;
		       $empnom=0;
		       $total=0;
		       $totalemp=0;
			$this->setFont("Arial","",8);
			$ref=$tb->fields["codnom"];
			if(!$tb->EOF)
			{
				$this->MCplus(180,4,' <@ Código Nómina:  '.$tb->fields["codnom"].'<,>arial,B,10,155,0,0 @>');
				$this->MCplus(180,4,' <@ Descripción Nómina:  '.$tb->fields["nomnom"].'<,>arial,B,10,155,0,0 @> ');
				$this->ln(3);
			}
			while (!$tb->EOF)
			{
				if($ref!=$tb->fields["codnom"])
				{
					$this->ln(6);
					//$this->MCplus(180,4,' <@Total Nómina  '.trim($nomref).' : '.H::FormatoMonto($totnom).' <,>arial,B,10,155,0,0  @>');
					$this->MCplus(180,4,' <@Total Empleados de la Nómina   : '.($empnom).' <,>arial,B,10,155,0,0  @>');
					$totnom=0;
					$empnom=0;
					$this->ln(8);
					$this->MCplus(180,4,' <@ Código Nómina:  '.$tb->fields["codnom"].'<,>arial,B,10,155,0,0 @>');
					$this->MCplus(180,4,' <@ Descripción Nómina:  '.$tb->fields["nomnom"].'<,>arial,B,10,155,0,0 @> ');
					$this->ln(3);
				}
				//if ($tb->fields["carvan"]=='0'){
					//$tb->fields["carvan"]='';
				//}
                            $totalas=$tb2->fields["canmix"]-$tb->fields["canemp"];


				$this->Row(array("".$tb->fields["codcar"],trim($tb->fields["nomcar"]),H::FormatoMonto($tb->fields["suecar"]),
						      $tb2->fields["canmix"],$tb->fields["canemp"],trim($totalas)));
				$totnom+=$tb->fields["suecar"];
				$empnom+=$tb->fields["canemp"];
				$totalemp+=$tb->fields["canemp"];
                            $totalvac+=$tb->fields["carvan"];

				$total+=$tb->fields["suecar"];
				$nomref=$tb->fields["nomnom"];
				$ref=$tb->fields["codnom"];
				$tb->MoveNext();
                            $tb2->MoveNext();
			}
			$this->ln(6);
			//$this->MCplus(180,4,' <@Total Nómina  '.trim($nomref).' : '.H::FormatoMonto($totnom).' <,>arial,B,10,155,0,0  @>');
			$this->MCplus(180,4,' <@Total Empleados de la Nómina   : '.($empnom).' <,>arial,B,10,155,0,0  @>');
			$this->ln(6);
			//$this->MCplus(180,4,' <@Total General   : '.H::FormatoMonto($total).' <,>arial,B,11,0,0,155 @>');
			$this->MCplus(180,4,' <@Total de Cargos Asignados: '.($totalemp).' <,>arial,B,11,0,0,155 @>');
                     $this->MCplus(180,4,' <@Total de Cargos Vacantes: '.($totalvac).' <,>arial,B,11,0,0,155 @>');
			$this->bd->closed();
		}
	}
?>
