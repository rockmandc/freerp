<?
	require_once("../../lib/general/fpdf/fpdf.php");
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

		var $tipnomdes;
		var $tipnomhas;
		var $fecdes;
		var $fechas;
		var $conf;
		var $nombre;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->tipnomhas=$_POST["tipnomhas"];			
			$this->elaborado=$_POST["elaborado"];
			$this->elaboradocar=$_POST["elaboradocar"];
			$this->revisado=$_POST["revisado"];
			$this->revisadocar=$_POST["revisadocar"];
                        $this->i=0;

			$this->especial=$_POST["especial"];

            $this->especial = $_POST["especial"];


            if ($this->especial == 'S')
            {
            	$especial = " and g.especial = 'S'";
            }
            else
            {
            	$especial = "";
            }
			$this->sql="SELECT
						I.nomnom AS nomnom,
						i.codnom as codnom,I.ultfec,I.profec,
						(CASE WHEN G.ASIDED='A' THEN coalesce(sum(G.SALDO),0) ELSE 0 END) as ASIGNA,
						(CASE WHEN G.ASIDED='D' THEN coalesce(sum(G.SALDO),0) ELSE 0 END) as DEDUC,
						(CASE WHEN G.ASIDED='P' THEN coalesce(sum(G.SALDO),0) ELSE 0 END) as APORTE
						FROM NPASICAREMP B, NPNOMCAL G, NPNOMINA I
						WHERE
						g.especial='".$this->especial."' AND
						(B.CODNOM) >= ('".$this->tipnomdes."')
						AND(B.CODNOM) <= ('".$this->tipnomhas."')
						AND G.codnom=B.codnom
						AND I.codnom=B.codnom
						AND B.STATUS='V'

						AND (G.CODNOM) >= ('".$this->tipnomdes."')
						AND (G.CODNOM) <= ('".$this->tipnomhas."')

						AND (G.CODNOM) >= RPAD('".$this->tipnomdes."',3,' ')
						AND (G.CODNOM) <= RPAD('".$this->tipnomhas."',3,' ')".$especial."

						AND rtrim(G.CODCAR)=rtrim(B.CODCAR)
						AND G.CODEMP=B.CODEMP
						group by i.codnom, i.nomnom,g.asided,i.ultfec,i.profec
						ORDER BY i.codnom";///H::PrintR($this->sql);exit;

			//H::PrintR($this->sql);


			/*SELECT
							distinct C.CODEMP as codemp,
							to_char(C.FECRET,'dd/mm/yyyy') as fecret,
							C.NOMEMP as nomemp,
							to_char(C.FECING,'dd/mm/yyyy') as fecing,
							C.NUMCUE as CUENTA_BANCO,
							B.CODCAT as CODCAT,
							D.nomcat as nomcat,
							C.CEDEMP as cedemp,
							LTRIM(RTRIM(B.CODCAR)) as CODCAR,
							B.NOMCAR as nomcar,
							(CASE WHEN C.STAEMP='A' THEN 'ACTIVO' WHEN C.STAEMP='S' THEN 'SUSPENDIDO' WHEN C.STAEMP='V' THEN 'VACACIONES' ELSE '' END) as ESTATUS,
							G.CODCAR as codcargo,
							G.CODCON as codcon,
							LTRIM(RTRIM(G.NOMCON)) AS NOMCON,
							(CASE WHEN G.ASIDED='A' THEN coalesce(G.SALDO,0) ELSE 0 END) as ASIGNA,
							(CASE WHEN G.ASIDED='D' THEN coalesce(G.SALDO,0) ELSE 0 END) as DEDUC,
							(CASE WHEN G.ASIDED='P' THEN coalesce(G.SALDO,0) ELSE 0 END) as APORTE
						FROM
							NPHOJINT C,
							NPASICAREMP B,
							NPCATPRE D,
							NPNOMCAL G,
							NPDEFCPT H,
							NPNOMINA I
						WHERE
							(B.CODNOM) >= RPAD('".$this->tipnomdes."',3,' ') AND
							(B.CODNOM) <= RPAD('".$this->tipnomhas."',3,' ')
							AND to_char(i.ultfec,'dd/mm/yyyy') >= '".$this->fecdes."'
							AND to_char(i.ultfec,'dd/mm/yyyy') <= '".$this->fechas."'
							AND to_char(i.profec,'dd/mm/yyyy') >= '".$this->fecdes."'
							AND to_char(i.profec,'dd/mm/yyyy') <= '".$this->fechas."'	AND
							D.CODCAT=B.CODCAT AND
							B.CODEMP=C.CODEMP AND
							--C.CODEMP>= RPAD('".$this->codempdes."',16,' ') AND
							--C.CODEMP <= RPAD('".$this->codemphas."',16,' ') AND
							--B.CODCAT>= RPAD('".$this->codcatdes."',32,' ') AND
							--B.CODCAT <= RPAD('".$this->codcathas."',32,' ') AND
							--B.CODCAR>= RPAD('".$this->codcardes."',16,' ') AND
							--B.CODCAR <= RPAD('".$this->codcarhas."',16,' ') AND
							B.STATUS='V' AND
							G.CODCON=H.CODCON AND
							--G.CODCON>='".$this->codcondes."' AND
							--G.CODCON<='".$this->codconhas."' AND
							(G.CODNOM) >= RPAD('".$this->tipnomdes."',3,' ') AND
							(G.CODNOM) <= RPAD('".$this->tipnomhas."',3,' ') AND
							rtrim(G.CODCAR)=rtrim(B.CODCAR) AND
							G.CODEMP=C.CODEMP
						ORDER BY
							b.codcat,C.CODEMP";
			*/
                        $this->arrp=$this->bd->select($this->sql);
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"].' - Periodo Del: '.date('d/m/Y',strtotime($this->arrp->fields['ultfec'])).' Al '.date('d/m/Y',strtotime($this->arrp->fields['profec'])),$this->conf,"s");
			$this->SetFont("Arial","B",8);
//			$this->ln();
			$this->SetX(10);
			$this->Cell(10,5,'PROGRAMA');
			$this->SetX(65);
			$this->Cell(10,5,'DESCRIPCIÓN');
			$this->SetX(125);
			$this->Cell(10,5,'ASIGNACIONES');
			$this->SetX(160);
			$this->Cell(10,5,'DEDUCCIONES');
			$this->SetX(193);
			$this->Cell(10,5,'APORTES');
			$this->SetX(215);
			$this->Cell(10,5,'NETO A PAGAR');
                     $this->SetX(240);
			$this->Cell(10,5,'GASTO DE NÓMINA');



			$this->Line(10,$this->GetY()+8,270,$this->GetY()+8);
			/*$this->setFont("Arial","B",8);
			$rs=$this->bd->select("select upper(nomnom) as nombre from NPASICAREMP where codnom='".$this->tipnom."'");
			if(!$rs->EOF)
			{
				$this->nombre=$rs->fields["nombre"];
			}
			$sr=$this->bd->select("SELECT to_char(ULTFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnom."',3,' ')");
			if(!$sr->EOF)
			{
				$fechad=$sr->fields["fecha"];
			}
			$ss=$this->bd->select("SELECT to_char(PROFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnom."',3,' ')");
			if(!$ss->EOF)
			{
				$fechah=$ss->fields["fecha"];
			}
			$this->cell(100,5,'NOMINA: '.$this->tipnom.' - '.$this->nombre);
			$this->cell(60,5,'PERIODO DEL: '.$fechad.' AL '.$fechah);
			*/$this->ln(5);

		}
		function Cuerpo()
		{

			$this->setFont("Arial","B",8);
		        #$this->arrp=$this->arrp;
			$this->SetY(50);
				$tasigna=0;
				$tdeduc=0;
				$ttotal=0;

			while (!$this->arrp->EOF) {

				$cod=$this->arrp->fields["codnom"];
				$nom=$this->arrp->fields["nomnom"];
				$y=$this->GetY();
				if ($y >= 170) {
					$this->AddPage();
					$y=50;
				}
				$this->SetXY(14,$y);

				$this->Cell(10,3,$this->arrp->fields["codnom"]);
				$this->SetX(40);
				$this->MultiCell(90,3,$this->arrp->fields["nomnom"]);
				$asigna=0;
				$deduc=0;
				$aporte=0;
				$total=0;
				$y1=$this->GetY();
					while ($this->arrp->fields["codnom"]==$cod && $this->arrp->fields["nomnom"]==$nom) {
						$asigna+=$this->arrp->fields["asigna"];
						$deduc+=$this->arrp->fields["deduc"];
                                          $aporte+=$this->arrp->fields["aporte"];
						$this->arrp->MoveNext();
					}
				$total=$asigna-$deduc;
				$this->SetXY(125,$y);
				$this->Cell(29,3,number_format($asigna,2,',','.'),0,0,'R');
				$this->Cell(30,3,number_format($deduc,2,',','.'),0,0,'R');
                            $this->Cell(25,3,number_format($aporte,2,',','.'),0,0,'R');
				$this->Cell(30,3,number_format($total,2,',','.'),0,0,'R');

                            $totgas=$asigna+$aporte;
                            $this->Cell(25,3,number_format($totgas,2,',','.'),0,0,'R');
				
				$this->SetY($y1);

				$this->ln();
				$tasigna+=$asigna;
				$tdeduc+=$deduc;
				$taport+=$aporte;
				$ttotal+=$total;
				$ttotgas+=$totgas;
                                 $this->i++;
			}
				$this->ln();
				$this->Line(120,$this->GetY(),270,$this->GetY());
				$this->SetX(125);
				$this->Cell(30,6,number_format($tasigna,2,',','.'),0,0,'R');
				$this->Cell(29,6,number_format($tdeduc,2,',','.'),0,0,'R');
                            $this->Cell(26,6,number_format($taport,2,',','.'),0,0,'R');

				$this->Cell(30,6,number_format($ttotal,2,',','.'),0,0,'R');
				$this->Cell(25,6,number_format($ttotgas,2,',','.'),0,0,'R');

				$this->ln();
				$this->SetX(40);
				$this->Cell(10,6,' ');
				$this->SetX(125);
				$this->Cell(30);
				$this->Cell(47);
				//$this->Cell(52,6,number_format($ttotal,2,',','.'),0,0,'R');

			 $this->setXY(40,180);
			 $this->setFont("Arial","B",9);
			 $this->cell(50,5,'Elaborado Por',0,0,'C');
			 $this->cell(90,5,"");
			 $this->cell(50,5,'Revisado Por',0,0,'C');
			 $this->ln(5);
			 $this->setFont("Arial","BU",8);
			 $this->setX(40);
			 $this->cell(50,5,$this->elaborado,0,0,'C');
			 $this->cell(90,5,"");
			 $this->cell(50,5,$this->revisado,0,0,'C');
		     $this->ln(4);
		     $this->setFont("Arial","B",8);
		     $this->setX(40);
			 $this->cell(50,5,$this->elaboradocar,0,0,'C');
			 $this->cell(90,5,"");
			 $this->cell(50,5,$this->revisadocar,0,0,'C');


/*			$this->setFont("Arial","B",8);
		    $this->arrp=$this->bd->select($this->sql);
		    $this->arrp2=$this->bd->select($this->sql);
			$ref="";
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$totacum1=0;
			$totacum2=0;
			$totacum3=0;
			$acumulado=0;
			$cont=0;
			$contador=0;
			$total1=0;
			$total2=0;
			$total3=0;
			$neto=0;
			$totalneto=0;
			if(!$this->arrp2->EOF)
			{
				 $ref=$this->arrp2->fields["codemp"];
				 $cat=$this->arrp2->fields["codcat"];
				 $contador=$contador+1;
				 $this->setFont("Arial","B",8);
				 $this->cell(80,5,$this->arrp2->fields["codcat"].' '.strtoupper($this->arrp2->fields["nomcat"]));
				 $nomcat=$this->arrp2->fields["nomcat"];
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->SetFillColor(195,195,195);
				 $this->cell(20,3,'Cedula',0,0,'',1);
				 $this->cell(70,3,'Apellidos y Nombres',0,0,'',1);
				 $this->cell(20,3,'Fecha Ingreso',0,0,'',1);
				 $this->cell(30,3,'C.Cargo',0,0,'',1);
				 $this->cell(50,3,'Descripcion del Cargo',0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","",8);
				 $this->cell(20,5,$this->arrp2->fields["codemp"]);
				 $this->cell(70,5,$this->arrp2->fields["nomemp"]);
				 $this->cell(20,5,$this->arrp2->fields["fecing"]);
				 $this->cell(30,5,$this->arrp2->fields["codcar"]);
				 $this->cell(50,5,$this->arrp2->fields["nomcar"]);
				 $this->ln(5);
				 //$this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","BU",8);
				 $this->cell(20,5,'Codigo');
				 $this->cell(75,5,'Nombre del Concepto');
				 $this->cell(30,5,'Asignaciones');
				 $this->cell(30,5,'Deducciones');
				 $this->cell(30,5,'Aporte');
				 $this->ln(4);
				 //$this->line(10,$this->getY(),200,$this->getY());
			}
			while(!$this->arrp->EOF)
			{
				if($this->arrp->fields["codemp"]!=$ref)
				{
				 $this->setFont("Arial","B",8);
				 $this->ln(2);
				 $this->line(100,$this->getY(),200,$this->getY());
				 //totales
				 $cont=$cont+1;
				 $this->cell(20,5,'');
				 $this->cell(65,5,'Totales Bs.',0,0,'R');
//				 $this->cell(10,5,'');
				 $this->cell(30,5,number_format($acum1,2,'.',','),0,0,'R');
				 $this->cell(30,5,number_format($acum2,2,'.',','),0,0,'R');
				 $this->cell(27,5,number_format($acum3,2,'.',','),0,0,'R');
				 $totacum1=$totacum1+$acum1;
				 $totacum2=$totacum2+$acum2;
				 $totacum3=$totacum3+$acum3;
				 $this->ln(4);
				 $this->cell(20,5,'');
				 $this->cell(65,5,'Neto a Cobrar Bs.',0,0,'R');
				 //$this->cell(10,3,'');
				 $this->SetFillColor(195,195,195);
				 $this->cell(30,3,number_format(($acum1-$acum2),2,'.',','),0,0,'R',1);
				 $neto=$neto+$acum1-$acum2;
				 $this->SetFillColor(0,0,0);
				 $this->cell(30,5,'');
				 $this->ln(5);
				 $acum1=0;
				 $acum2=0;
				 $acum3=0;
				 //
				 if($this->arrp->fields["codcat"]!=$cat)
				 {
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->cell(85,5,'TOTAL:  '.ucwords($nomcat));
				 	$this->cell(30,5,number_format($totacum1,2,'.',','),0,0,'R');
				 	$this->cell(30,5,number_format($totacum2,2,'.',','),0,0,'R');
				 	$this->cell(27,5,number_format($totacum3,2,'.',','),0,0,'R');
					$total1=$total1+$totacum1;
					$total2=$total2+$totacum2;
					$total3=$total3+$totacum3;
				 	$totacum1=0;
				 	$totacum2=0;
				 	$totacum3=0;
				 	//
				 	$acumulado=0;
					$this->ln(4);
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->cell(110,5,'CANTIDAD DE TRABAJADORES: '.$cont);
					$cont=0;
				 	//$this->cell(50,5,'TOTAL A PAGAR: '.number_format($neto,2,'.',','));
					$totalneto=$totalneto+$neto;
					$neto=0;
					$this->ln(4);
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->ln(8);
				 	$this->cell(80,5,$this->arrp->fields["codcat"].' '.strtoupper($this->arrp->fields["nomcat"]));
				 	$nomcat=$this->arrp->fields["nomcat"];
				 	$this->ln(5);
				 }
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $cat=$this->arrp->fields["codcat"];
				 $this->SetFillColor(195,195,195);
				 $this->cell(20,3,'Cedula',0,0,'',1);
				 $this->cell(70,3,'Apellidos y Nombres',0,0,'',1);
				 $this->cell(20,3,'Fecha Ingreso',0,0,'',1);
				 $this->cell(30,3,'C.Cargo',0,0,'',1);
				 $this->cell(50,3,'Descripcion del Cargo',0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","",8);
				 $this->cell(20,5,$this->arrp->fields["codemp"]);
				 $this->cell(70,5,$this->arrp->fields["nomemp"]);
				 $this->cell(20,5,$this->arrp->fields["fecing"]);
				 $this->cell(30,5,$this->arrp->fields["codcar"]);
				 $this->cell(50,5,$this->arrp->fields["nomcar"]);
				 $this->ln(5);
				 //$this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","BU",8);
				 $this->cell(20,5,'Codigo');
				 $this->cell(75,5,'Nombre del Concepto');
				 $this->cell(30,5,'Asignaciones');
				 $this->cell(30,5,'Deducciones');
				 $this->cell(30,5,'Aporte');
				 $this->ln(4);
				 //$this->line(10,$this->getY(),200,$this->getY());
				 $contador=$contador + 1;
				} //end If

				 $this->setFont("Arial","",8);
				 $this->cell(20,5,$this->arrp->fields["codcon"]);
				 $x=$this->GetX();
				 $this->cell(65,5,$this->arrp->fields["nomcon"]);
				 $this->cell(30,5,number_format($this->arrp->fields["asigna"],2,'.',','),0,0,'R');
				 $acum1=$acum1+$this->arrp->fields["asigna"];
				 $this->cell(30,5,number_format($this->arrp->fields["deduc"],2,'.',','),0,0,'R');
				 $acum2=$acum2+$this->arrp->fields["deduc"];
				 $this->cell(27,5,number_format($this->arrp->fields["aporte"],2,'.',','),0,0,'R');
				 $acum3=$acum3+$this->arrp->fields["aporte"];

				 $ref=$this->arrp->fields["codemp"];
				 $this->arrp->MoveNext();
			     $this->ln(3);

			}//end While
				 $this->setFont("Arial","B",8);
				 $this->ln(2);
				 $this->line(100,$this->getY(),200,$this->getY());

				 //totales
				 $this->cell(20,5,'');
				 $this->cell(65,5,'Totales Bs.',0,0,'R');
//				 $this->cell(10,5,' ');
				 $this->cell(30,5,number_format($acum1,2,'.',','),0,0,'R');
				 $this->cell(30,5,number_format($acum2,2,'.',','),0,0,'R');
				 $this->cell(27,5,number_format($acum3,2,'.',','),0,0,'R');
				 $totacum1=$totacum1+$acum1;
				 $totacum2=$totacum2+$acum2;
				 $totacum3=$totacum3+$acum3;
				 $this->ln(4);
				 $this->cell(20,5,'');
				 $this->cell(65,5,'Neto a Cobrar Bs.',0,0,'R');
//				 $this->cell(10,3,'');
				 $this->SetFillColor(195,195,195);
				 $this->cell(30,3,number_format(($acum1-$acum2),2,'.',','),0,0,'',1);
				 $neto=$neto+($acum1-$acum2);
				 $this->SetFillColor(0,0,0);
				 $this->cell(30,5,'');
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(85,5,'TOTAL:  '.$nomcat);
				 $this->cell(30,5,number_format($totacum1,2,'.',','),0,0,'R');
				 $acum1=0;
				 $this->cell(30,5,number_format($totacum2,2,'.',','),0,0,'R');
				 $acum2=0;
				 $this->cell(27,5,number_format($totacum3,2,'.',','),0,0,'R');
				 $total1=$total1+$totacum1;
				 $total2=$total2+$totacum2;
				 $total3=$total3+$totacum3;
				 $totacum1=0;
				 $totacum2=0;
				 $totacum3=0;
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(110,5,'CANTIDAD DE TRABAJADORES: '.($cont+1));
				 $cont=0;
				 //$this->cell(50,5,'TOTAL A PAGAR: '.number_format($neto,2,'.',','));
				 $totalneto=$totalneto+$neto;
				 //$neto=0;
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(8);
				 $this->cell(85,5,'TOTAL NOMINA:  '.$this->nombre);
				 $this->cell(30,5,number_format($total1,2,'.',','),0,0,'R');
				 $acum1=0;
				 $this->cell(30,5,number_format($total2,2,'.',','),0,0,'R');
				 $acum2=0;
				 $this->cell(27,5,number_format($total3,2,'.',','),0,0,'R');
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(110,5,'TOTAL DE TRABAJADORES: '.($contador));
				 //$this->cell(50,5,'TOTAL A PAGAR: '.number_format($totalneto,2,'.',','));
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(5);
				 $this->setFont("Arial","BU",8);
				 $this->cell(150,5,$this->elaborado);
				 $this->cell(50,5,$this->revisado);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(150,5,'						Elaborado Por');
				 $this->cell(50,5,'							Revisado Por');
				 $this->ln(3);
				 $this->setFont("Arial","BU",8);
				 $this->cell(110,5,$this->autorizado,0,0,'R');
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(110,5,'Autorizado Por						',0,0,'R');
	*/		 //
		}
	}
?>
