<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/Tsrvoucher_cc.class.php");

	class pdfreporte extends fpdf
	{
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sql1;
		var $sql1b;
		var $sql1c;
		var $sql2;
		var $sql3;
		var $sqlb;
		var $che1;
		var $che2;
		var $hecho;
		var $revi;
		var $conta;
		var $audi;

		var $mes;
		var $ano;
		var $apro;
		var $ela;
		var $cod1;
		var $cod2;
		var $deb;
		var $cre;
		var $status;
		var $auxd=0;
		var $car;
		var $acumsalant=0;
		var $acumdeb=0;
		var $acumlib=0;
		var $acumban=0;
		var $acumlib2=0;
		var $acumban2=0;
		var $sal=0;
		var $fecha;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Legal");
			//$this->bd=new basedatosAdo();
			$this->bd=new Tsrvoucher_cc();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numchedes=str_replace('*',' ',H::GetPost("codmin"));
			$this->numcue=str_replace('*',' ',H::GetPost("numcuemin"));
			$this->hecho=str_replace('*',' ',H::GetPost("hecho"));
			$this->revi=str_replace('*',' ',H::GetPost("revi"));
			$this->apro=str_replace('*',' ',H::GetPost("apro"));
			$this->conta=str_replace('*',' ',H::GetPost("conta"));
			$this->audi=str_replace('*',' ',H::GetPost("audi"));
			$this->arrp=$this->bd->sqlp($this->numchedes,$this->numcue);
			$this->arrp2=$this->bd->sqlp2($this->numchedes,$this->numcue);
			$this->arrp3=$this->bd->sqlpx($this->numchedes,$this->numcue);
			$this->arrp4=$this->bd->sqlpz($this->numchedes,$this->numcue);
			$this->llenartitulosmaestro();
		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Cuenta";
				$this->titulos[2]="Uso";
				$this->titulos[3]="Saldo Anterior";
				$this->titulos[4]="Débitos";
				$this->titulos[5]="Créditos";
				$this->titulos[6]="Saldo Segun Libros";

		}

		function Header()
		{
			$this->setFont("Arial","B",11);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
	/*		$this->rect(20,205,170,60);
			$this->line(20,212,190,212);
			$this->line(40,205,40,265);
			$this->line(60,205,60,265);
			$this->line(80,205,80,265);
			$this->line(100,205,100,265);
			$this->line(120,205,120,265);
			$this->line(142,205,142,265);
			$this->line(165,205,165,265);
			$this->setFont("Arial","B",8);
			$this->SetXY(20,206);
			$this->cell(20,5,"Partida",0,0,'C');
			$this->cell(20,5,"Generica",0,0,'C');
			$this->cell(20,5,"Especifica",0,0,'C');
			$this->cell(20,5,"Sub.Especifica",0,0,'C');
			$this->cell(20,5,"Credito",0,0,'C');
			$this->cell(21,5,"Asiento",0,0,'C');
			$this->cell(25,5,"Orden de Pago",0,0,'C');
			$this->cell(20,5,"Monto",0,0,'C');
			$this->SetXY(20,208);
			$this->cell(80,5,"",0,0,'C');
			$this->cell(20,5,"Adicional",0,0,'C');
			$this->cell(20,5,"Presupuestario",0,0,'C');
			$this->SetXY(22,265);
			$this->cell(120,5,"",0,0,'C');
			$this->cell(23,5,"TOTAL Bs.",1,0,'R');
			$this->SetXY(22,270);
			$this->cell(120,5,"",0,0,'C');
			$this->cell(23,5,"RETENCIONES",1,0,'R');
			$this->SetXY(22,275);
			$this->cell(120,5,"",0,0,'C');
			$this->cell(23,5,"NETO A PAGAR",1,0,'R');

			$this->rect(20,285,170,15);
			$this->line(20,290,190,290);
			$this->line(55,285,55,300);
			$this->line(95,285,95,300);
			$this->line(135,285,135,300);
			$this->setFont("Arial","",8);
			$this->SetXY(20,286);
			$this->cell(33,5,"Elaborado por: ",0,0,'C');
			$this->cell(40,5,"Contabilidad: ",0,0,'C');
			$this->cell(45,5,"Presupuesto: ",0,0,'C');
			$this->cell(40,5,"Conciliacion Bancaria: ",0,0,'C');

			$this->rect(20,305,170,20);
			$this->line(20,310,190,310);
			$this->line(53,305,53,325);
			$this->line(85,305,85,325);
			$this->line(110,305,110,325);
			$this->line(110,315,190,315);
			$this->line(110,320,190,320);
			$this->line(110,325,190,325);
			$this->setFont("Arial","",8);
			$this->SetXY(20,306);
			$this->cell(30,5,"Gerencia de Finanzas ",0,0,'C');
			$this->cell(40,5,"Dir. Admon. y Finanzas ",0,0,'C');
			$this->cell(18,5,"Auditoria Interna ",0,0,'C');
			$this->cell(60,5,"Beneficiario ",0,0,'C');
			$this->setFont("Arial","",7);
			$this->SetXY(110,311);
			$this->cell(30,5,"Apellido y Nombre:");
			$this->SetXY(110,316);
			$this->cell(30,5,"C.I:");
			$this->SetXY(110,321);
			$this->cell(50,5,"Firma y Sello:");
			$this->cell(10,5,"Fecha:");	             */

			$this->setFont("Arial","B",11);

		} 

		function Cuerpo()
		{
			$this->setFont("Arial","B",9);
			$i=0;
			$a=0;
			$b=0;
			$cont=0;
			$this->van=0;
			//------------------------------------------------------------------------------------------------
			foreach($this->arrp as $cheque)//while
			{
				$this->numcom=$cheque["numcom"];
				$this->setFont("Arial","B",9);
                     

                     //------------- BANCO VENEZUELA ---------------------

				$this->SetXY(140,20);
				$this->cell(30,2,str_pad($cheque["monchestr"], 20, "*", STR_PAD_LEFT));
                    //--------------------------------------------------------------------------
				$this->setFont("Arial","",10);
				$this->SetXY(34,36);
				$this->cell(130,5,'***'.strtoupper($cheque["nomben"]).'***');
				$this->SetXY(38,42);
				$this->MultiCell(130,6,(str_pad(H::obtenermontoescrito($cheque["monche"]),75, "*",STR_PAD_RIGHT)));
				$this->setFont("Arial","",9);
				$this->SetXY(24,54);
				$this->cell(30,5,"CARACAS,   ");
				$this->cell(26,5,$cheque["dia"]."/".$cheque["mes"]);
				//$this->cell(30,5,"11");
				//$this->cell(30,5," ".$cheque["ano"]);

                             $this->cell(30,5,substr($cheque["ano"],2,4),0,0);
                  //-----------BANCO VENEZUELA ------------------------
                           $this->SetXY(50,71);
			      $this->cell(10,5,'CADUCA A LOS 60 DIAS');
				$this->SetXY(50,75);
			      $this->cell(10,5,'       NO ENDOSABLE');

                  //--------------------------------------------------------------------

				$this->SetXY(40,62);
                      	//$this->MultiCell(130,5,strtoupper($cheque["desord"]),0,'',0);
				//$y1=$this->GetY();
			   	$cheques["numcom"]=$cheque["numcom"];


				$y1=135;
				$cont=0;
				$y2=$this->GetY();
				$this->setFont("Arial","B",12);
				$this->SetXY(80,$y1+35);
			//	$this->cell(50,5,'Datos del Cheque',0,0,'C');
				$this->ln();
				$this->ln();
				$this->setFont("Arial","",9);
				$this->SetX(18);
			//	$this->cell(50,5,'BANCO: ');
			//	$this->line(20,$this->GetY()+9,60,$this->GetY()+9);
			//	$this->cell(70,5,'CTA. CORRIENTE Nro: ');
			//	$this->line(70,$this->GetY()+9,130,$this->GetY()+9);
			//	$this->cell(50,5,'CHEQUE Nro: ');
			//	$this->line(140,$this->GetY()+9,180,$this->GetY()+9);
				$this->ln();
$this->ln();
				$this->cell(10,5,'');
				

				$this->cell(50,5,trim($cheque["nomcue"]),0,0,'C');
				$this->cell(66,5,trim($cheque["numcue"]),0,0,'R');
				$this->cell(45,5,trim($cheque["numche"]),0,0,'R');



				$op["numche"]=$cheque["numche"];

				$y3=$y1;
				$yy=70;
				//$this->SetXY(20,$yy+18);
				//$this->MultiCell(150,5,strtoupper($this->arrp3["descon"]),0,'J',0);
				$vv=0;
				$contador=0;
				foreach ($this->arrp3 as $op)
			    {
			    	$contador++;
					if($cheque["numche"]==$op["numche"])
					{
						if($vv==0)
						{
						  $this->setFont("Arial","B",12);
				//		  $this->Image("../../img/logo_1.jpg",22,$yy+12,20);
						  $this->SetXY(80,$yy+12);
				//		  $this->cell(40,5,'Comprobante de Egreso',0,0,'C');
						  $this->ln();
						  $this->ln(39);
						  $this->setFont("Arial","",9);
						  $this->SetX(20);
						  $this->MultiCell(170,5,strtoupper($op["deslib"]),0,'J',0);
						  $this->ln(20);
						  $this->SetXY(30,163);
						  $this->MultiCell(175,8,H::obtenermontoescrito($cheque["monche"]).'   Bs. ',0,'J',0);
  						  $this->SetXY(160,168);
						  //$this->MultiCell(25,8,number_format($cheque["monche"],2,',','.'),0,0,'R');

                                            $this->cell(25,8,str_pad($cheque["monchestr"], 20, "*", STR_PAD_LEFT));




						}
						$yy=$this->GetY();
						$this->SetXY(20,$y3+35);
						$this->cell(30,5,'');
						$this->cell(40,5,'');
						$this->cell(40,5,'');
						//$this->cell(30,5,trim($op["numord"]),0,0,'R');
						$b++;
						$vv++;
						$y3=$this->GetY()-30;
					}
				}
				if ($contador==0){//ojo  aqui esta el parche del monto cuando es extra presupuesto
					      $this->SetXY(80,67+12);
						  $this->ln();
						  $this->ln(40);
						  $this->setFont("Arial","",9);
						  $this->SetX(20);
						  $this->MultiCell(170,5,strtoupper($cheque["descon"]),0,'J',0);
				}//aqui termina
				

                            $this->SetXY(1,204); 
                           // $this->cell(70,5,'');
				foreach ($this->arrp4 as $imp)
				{
					if($cheque["numche"]==$imp["numche"])
					{
						$this->setFont("Arial","",8);
			//----------------------------------------
						
						//$this->cell(120,5,$imp["par"],0,0,'C');
						//$this->cell(20,5,$imp["gen"],0,0,'C');
						//$this->cell(20,5,$imp["es"],0,0,'C');
						//$this->cell(20,5,$imp["subes"],0,0,'C');
			//---------------------------------------	
		                     
						$this->cell(115,94,$imp["cre"],0,0,'R');
						$this->cell(45,4,'',0,0,'R');
                                          $this->SetX(145);
						$this->cell(11,4,$imp["numord"],0,0,'R');
						//$this->cell(19,4,number_format($imp["monord"],2,',','.'),0,0,'R');
						$this->van+=$imp["monord"];
						if ($this->gety()>235){
						  $this->SetXY(23,265); 
						  $this->cell(113,5,"",0,0,'R');
						  $this->cell(30,5,"Van...",0,0,'L');
						  $this->esta='Vienen...';
						  $this->cell(24,5,number_format($this->van,2,',','.'),0,0,'R');
						   $this->addpage();
						   $this->SetXY(23,202);
						  $this->cell(128,5,"",0,0,'R');
						  $this->cell(15,5, $this->esta,0,0,'L');
						  $this->cell(24,5,number_format($this->van,2,',','.'),0,0,'R');
						  $this->setFont("Arial","B",12);
						  $this->SetXY(80,$yy+12);
						  $this->ln();
						  $this->ln(40);
						  $this->setFont("Arial","",9);
						  $this->SetXY(20,124);
						  $this->MultiCell(170,5,strtoupper($op["deslib"]),0,'J',0);
						  $this->ln(20);
						  $this->SetXY(30,160);
						  $this->MultiCell(175,5,H::obtenermontoescrito($cheque["monche"]).'   Bs. ',0,'J',0);
  						  $this->SetXY(150,169);
						  $this->MultiCell(25,5,number_format($cheque["monche"],2,',','.'),0,0,'R');
						  		$this->SetY(185);
						$this->cell(10,5,'');
						$this->cell(50,5,trim($cheque["nomcue"]),0,0,'C');
						$this->cell(60,5,trim($cheque["numcue"]),0,0,'R');
						$this->cell(45,5,trim($cheque["numche"]),0,0,'R');
						  	$this->SetXY(10,202);
						}

						$total=$total+$imp["monord"];
						$this->ln();
					}
				}
        $this->sql = "select   numord from   opordche      where  trim(numche) = '".trim($cheque["numche"])."' ";
        $tbdesord = $this->bd->select($this->sql);
        $this->cont = count( $tbdesord);
		$ordenes=array();
	    $this->numord=array();
        $this->i=0;
        $this->SetXY(84,199);
        foreach($tbdesord as $desor)
        {
				   $this->sqlret="select b.destip , a.monret from opretord a join optipret b on a.codtip=b.codtip where numord='".$desor["numord"]."'";
                  		 $tbdret = $this->bd->select($this->sqlret);
			        foreach($tbdret as $ret)
			        {
			           $this->ret+=$ret["monret"];
			      	}
	                $this->numord=explode("-",trim($desor["numord"]));

                       /* if ($this->contotal==0){
                        	$this->setx(84);
                        	$this->multicell(25,3, $desor["numord"],0,'L',0);
                        	$this->ln(2);
		//		                               }*/

        }
				$i++;
				$this->SetXY(23,235);
				$this->cell(143,5,"",0,0,'C');
				$this->sqlparch="select sum(monpag) as monto from opordpag where numche='".$cheque["numche"]."'  and status='I' ";
				$tbdparch = $this->bd->select($this->sqlparch);
				 foreach($tbdparch as $parch)
			        {
			           $this->parch=$parch["monto"];
			      	}
				 //print $this->sqlparch;

	//parche
                         
        //--------------------------   CICLO DE LA NOTA              
				 	//if($total==$cheque["monche"])
              	                                                    
                            	//{
                                   //    $this->cell(40,5,'DENTRO DEL IF',0,0,'C');
                                    // }
                                    //else
                                   //{
                                       // $this->cell(40,5,'DENTRO DEL ELSE'.$imp["monret"].'aaa');
                                        //$this->cell(80,5,$cheque["monche"],0,0,'C');


                                    //}
                                    

// $this->SetXY(153,257);
       	                      // $this->cell(23,5,number_format($cheque["monche"],2,',','.'),0,0,'R');
                                     
					  //$this->cell(143,5,"",0,0,'C');
                                   //}
                                     //if($total!=$cheque["monche"])
  
                                  //{
                            	$this->SetXY(9,210);
                            	//$this->cell(80,40,$cheque["monche"]);
                            	//$this->cell(80,40,$total);
                            	//$this->MultiCell(180,50,'BS: '.$imp["monret"]. ' CORRESPONDE A RETENCIONES/IMPUESTOS RETENIDOS AL BENEFICIARIO');
				
                                                  
//----------------------imprime total

  	              	       $this->SetXY(153,257);
       	                     $this->cell(23,5,number_format($cheque["monche"],2,',','.'),0,0,'R');
					$this->cell(143,5,"",0,0,'C');
  
                                   //}
                              
                                  
//-----------------------------------------------




                 ///////----------------------------------------------RETENCION FIJA

                             //$this->SetXY(112,240);

                            //$this->cell(143,5,"245,82",0,0,'C');
              /////////----------------------------------------------FIN RETENCION FIJA


				//$this->cell(23,5,number_format($this->ret,2,',','.'),0,0,'R');
                            //$this->auxd=$total-$cheque["monche"];

                            $this->SetXY(23,250);
                            $this->cell(143,5,"",0,0,'C');

				//$this->cell(23,5,number_format($cheque["monche"],2,',','.'),0,0,'R');


                           //--------------- para las ordenes de anticipo
				//$this->SetXY(177,236);

                            //$this->cell(70,5,'3059,11 ');

                           //$this->SetXY(177,244);

                            //$this->cell(70,5,'2813,29 ');
                       ///--------------




				$this->cell(143,5,"",0,0,'C');
				//$this->cell(23,5,number_format($cheque["monche"]-$this->ret,2,',','.'),0,0,'R');
				//$this->cell(23,5,number_format($this->parch-$this->ret,2,',','.'),0,0,'R');
				
//-------------------------------------------
				//if ($contador==0)
                              //{
                            //ojo aqui esta el parche del monto cuando es extra presupuesto
				  // $this->SetXY(23,235);
                             // $this->cell(23,5,'ESTA DENTRO DEL IF');
                              //$this->cell(143,5,"",0,0,'C');
                             //$this->cell(23,5,number_format($cheque["monche"],2,',','.'),0,0,'R');
				// $this->SetXY(23,245);
				// $this->cell(143,5,"",0,0,'C');
				//  $this->cell(23,5,number_format($cheque["monche"],2,',','.'),0,0,'R');
                             // $this->cell(23,5,number_format($this->ret,2,',','.'),0,0,'R');
                             // $this->auxd=$total-$cheque["monche"];
	              		//$this->SetXY(23,245);
			     		//$this->cell(143,5,"",0,0,'C');
					//$this->cell(23,5,number_format($cheque["monche"]-$this->ret,2,',','.'),0,0,'R');
					//$this->cell(23,5,number_format($this->parch-$this->ret,2,',','.'),0,0,'R');
				//}
// aqui termina
   //fin parche
				$total=0;
				if($i < count($this->arrp))
				{
					$this->AddPage();
				}
			}
		}
	}
?>
