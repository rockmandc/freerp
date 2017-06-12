<?php

require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/general/cabecera.php");
require_once("../../lib/modelo/sqls/nomina/Nprrecpag.class.php");


class pdfreporte extends fpdf
{
  function pdfreporte()
  {
    parent::FPDF("P");
    $this->cabe='s';
      $this->index=0;
      $this->codempdes= H::GetPost('codempdes');
      $this->codemphas= H::GetPost('codemphas');
      $this->codcardes= H::GetPost('codcardes');
      $this->codcarhas= H::GetPost('codcarhas');
      $this->codnomdes= H::GetPost('codnomdes');
      $this->codcondes= H::GetPost('codcondes');
      $this->codconhas= H::GetPost('codconhas');
      $this->fecnomdes= H::GetPost('fecnomdes');
      $this->fecnomhas= H::GetPost('fecnomhas');
      $this->nomminesp= H::GetPost('nomminesp');
	$this->nommaxesp= H::GetPost('nommaxesp');
      $this->consecutivo=strtoupper(H::GetPost('consedes'));
      $this->especial=H::GetPost('especial');

      $this->objNprrecpag = new Nprrecpag();
      $this->arrp = $this->objNprrecpag->SQLp($this->codnomdes,$this->codempdes,$this->codemphas,$this->codcardes,$this->codcarhas,$this->codcondes,$this->codconhas,$this->especial,$this->nomminesp,$this->nommaxesp);

    $this->SetAutoPageBreak(true,25);
    	$this->cab=new cabecera();
  }

  function br()
  {
    $arrnumrec = $this->objNprrecpag->sqlnumrel();
    $this->numrec=$arrnumrec[$this->index]["ultrec"];
    if (is_null($this->numrec) || ($this->numrec < 0) || (trim($this->numrec)==''))
      $this->numrec=0;

    if (strtoupper($this->consecutivo)=='S')
    {
      $arrcont = $this->objNprrecpag->sqlcontador($this->codnomdes,$this->codempdes,$this->codemphas,
      											  $this->codcardes,$this->codcarhas,$this->codcondes,$this->codconhas);
      $numrecnew = $this->numrec + $arrcont[0]["numemp"];
      $this->objNprrecpag->sqlnpdefgen($numrecnew);

    }else
    {
      $this->numrec=0;
    }

    }
    function Header()
    {
       //$this->getCabecera(H::GetPost("titulo"),"");
       	$this->cab->poner_cabecera($this,"RECIBO DE PAGO","p","n");
       $this->setwidths(array(84,21,34,30));
       $this->setAligns(array("L","R","R","R"));
    }

    function Cuerpo()
    {
      $this->br();
      $i=0;
      $obj=$this->arrp[$i];
      $acumasigna=0;
      $acumdeduc=0;
      $ref=$obj["codemp"];
      $this->numrec++;
      if ($this->consecutivo=='S')
      {
        $arrcorrel = $this->objNprrecpag->sqlbuscacorrel($obj["codemp"],$obj["codcar"],$obj["codnom"]);
        $nro=$arrcorrel[$this->index]["numero"];

        if (is_null($nro) || ($nro<=0))
        {
          $nro=$this->numrec;
        }
        else
        {
          $this->objNprrecpag->sqlnpnomcal($this->numrec,$obj["codemp"],$obj["codcar"],$obj["codnom"]);
          $this->numrec--;
        }
      }else
      {
        $nro=$this->numrec;
      }
      $this->setFont("Arial","B",10);
      $this->cell(150,5,"");
      $this->cell(10,5,"NRO.   ".$nro);
      $this->ln();
      $this->cell(5,5,"");
      $this->cell(110,5,"Nómina:   ".strtoupper($obj["nomnom"]));
      $this->cell(25,5,"Fecha Desde:");
      $this->setFont("Arial","",10);
      $this->cell(20,5,$obj["fecdes"]);
      $this->setFont("Arial","B",8);
      $this->cell(10,5,"Hasta:");
      $this->setFont("Arial","",10);
      $this->cell(20,5,$obj["fechas"]);
      $this->setFont("Arial","B",10);
      /*$this->setFont("Arial","B",10);
      $this->cell(10,5,"Hasta");
      $this->setFont("Arial","",10);
      $this->cell(20,5,$this->fecnomhas);*/
      $this->setFont("Arial","B",8);
      $this->ln(6);
      $this->cell(5,5,"");
      $this->cell(32,5,"Cédula Identidad");
      $this->cell(115,5,"Nombre del Trabajador");
      $this->cell(32,5,"Sueldo");
      $this->ln();
      $this->setFont("Arial","",10);
      $this->SetFillColor(170,170,170);
      //$this->Rect(16,$this->GetY(),22,4,"F"); sombrea cedula
      //$this->Rect(48,$this->GetY(),75,4,"F"); sombrea nombre
      $this->cell(9,5,"");
      $this->cell(28,5,$obj["codemp"]);
      $this->cell(104,5,strtoupper($obj["nomemp"]));

      $arrsueldo = $this->objNprrecpag->sqlcalulasueldo($obj["codemp"],$obj["codnom"]);
      $arrsueldo = $this->objNprrecpag->sqlcalulasueldo($obj["codcar"]);
      //$this->cell(30,5,H::FormatoMonto($arrsueldo[$this->index]["valor"]),0,0,"R");
      $arrsueldo = $this->objNprrecpag->sqlcalulasueldo2($obj["codemp"]);
      $arrsueldo = $this->objNprrecpag->sqlcalulasueldo($obj["nomina2"],$obj["codemp"]);

      $this->cell(30,5,H::FormatoMonto(($arrsueldo[$this->index]["valor"])*2),0,0,"R");

      $this->setFont("Arial","B",8);
      $this->ln();
      $this->cell(5,5,"");
      $this->cell(85,5,"Cargo");
      $this->cell(30,5,"Unidad de Adscripción");
      $this->ln(4);
      $this->setFont("Arial","",10);
      $this->cell(5,5,"");
      $this->cell(75,5,"");$this->setx(100);
      $this->cell(80,5,$obj["desniv"]);
      $this->setx(15);
      $this->multicell(50,5,strtoupper($obj["nomcar"]));
      $this->ln();
      $this->setFont("Arial","B",8);
      $this->cell(5,5,"");
      $this->cell(85,5,"Centro de Pago");
      $this->cell(40,5,"Nro Cuenta");
      $this->cell(30,5,"Fecha Ingreso");
      $this->ln(4);
      $this->setFont("Arial","",10);
      $this->cell(5,5,"");
      $this->cell(75,5,strtoupper($obj["nomban"]));
      $this->cell(55,5,strtoupper($obj["numcue"]));
      $this->cell(40,5,strtoupper($obj["fecing"]));
      $this->setFont("Arial","B",10);
      $this->ln(7);
      $this->cell(16,5,"");
      $this->cell(74,5,"Nombre del Concepto");
      $this->cell(35,5,"Asignaciones");
      $this->cell(40,5,"Deducciones");
      $this->cell(30,5,"");
        //$this->cell(30,5,"Saldo");
      $this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
      $y=$this->GetY();
      $this->ln();
     // $this->addpage();

      foreach($this->arrp as $obj)
      {
        if ($obj["codemp"]!=$ref)
        {
         // $this->setAutoPageBreak(false);
          $this->ln(6);
          $this->Line(92,$this->GetY(),195,$this->GetY());
          $this->cell(5,5,"");
          $this->setFont("Arial","B",10);
          $this->cell(60,5,"");
          $this->cell(13,5,"TOTALES");
          $this->cell(34,5,H::FormatoMonto($acumasigna),0,0,"R");
          $this->cell(34,5,H::FormatoMonto($acumdeduc),0,0,"R");
          $this->ln(7);
          $this->cell(80,5,"");
          $this->cell(40,5,"NETO A COBRAR");
          //$this->Rect(117,$this->GetY(),30,4,"F"); --sombrea monto
          $this->cell(13,5,H::FormatoMonto($acumasigna-$acumdeduc),0,0,"R");
          //PRESTAMOS OTORGADOS
           $this->arrpcuotas = $this->objNprrecpag->sqlcuotas($ref);
     //H::PrintR($this->arrpcuotas);exit;
      //$this->arrpcoutas
      	if (count($this->arrpcuotas) > 0)
      	{
      		$this->ln(10);

      	$this->setFont("Arial","B",10);
			$this->SetWidths(array(180));
			$this->SetAligns(array("C"));
			//$this->SetFillTable(1);
			//$this->SetBorder(1);
			$this->Row(array("PRESTAMOS OTORGADOS"));
			//$this->SetBorder(0);
	    	//$this->SetFillTable(0);

	    	$this->setFont("Arial","B",10);
			$this->SetWidths(array(60,60,60));
			$this->SetAligns(array("C","C","C"));
			//$this->SetFillTable(1);
			$this->SetBorder(1);
			$this->Row(array("PRESTAMO","SALDO","CUOTAS PENDIENTES"));
			//$this->SetBorder(0);
	    	$this->SetFillTable(0);


      	foreach ($this->arrpcuotas as $dato)
      	{
      		//print "alfo";exit;

	    	$this->setFont("Arial","",10);
			$this->SetWidths(array(60,60,60));
			$this->SetAligns(array("L","R","R"));
			//$this->SetFillTable(1);
			$this->SetBorder(1);
			$this->Row(array($dato["descripcion"],H::FormatoMonto($dato["saldo"]),$dato["cuotas_pendientes"]));
			$this->SetBorder(0);
	    	//$this->SetFillTable(0);


      	}

      	}
      	//FIN DE PRESTAMOS OTORGADOS
   $this->ln(20);
      	  $this->cell(0,5,"Recibe :_____________________________________________",0,'C');
          //$this->setAutoPageBreak(true,25);
          $y2=$this->GetY();
           //if ($y2>180) {
           //	  $this->ln();
              $this->AddPage();
           //}
          $this->ln(10);
          $acumasigna=0;
          $acumdeduc=0;
          /*if ($this->GetY()>180)
          {
            $this->ln(100);
          }
          else
          {
            $this->ln(10);
          }*/

          $this->numrec++;
          if ($this->consecutivo=='S')
          {
            $arrcorrel = $this->objNprrecpag->sqlbuscacorrel($obj["codemp"],$obj["codcar"],$obj["codnom"]);
            $nro=$arrcorrel[0]["numero"];

            if (is_null($nro) || ($nro<=0))
            {
              $nro=$this->numrec;
            }
            else
            {
              $this->objNprrecpag->sqlnpnomcal($this->numrec,$obj["codemp"],$obj["codcar"],$obj["codnom"]);
              $this->numrec--;
            }
          }else
          {
            $nro=$this->numrec;
          }
          $this->setFont("Arial","B",8);
          //if ($this->GetY()>=1)
            //$this->addPage();
          $this->setFont("Arial","B",10);
          $this->cell(150,5,"");
          $this->cell(10,5,"NRO.   ".$nro);
          $this->ln();
          $this->cell(5,5,"");
          $this->cell(110,5,"Nomina:   ".strtoupper($obj["nomnom"]));
          $this->cell(25,5,"Fecha Desde:");
          $this->setFont("Arial","",10);
          $this->cell(20,5,$obj["fecdes"]);
          $this->setFont("Arial","B",10);
          $this->cell(10,5,"Hasta:");
          $this->setFont("Arial","",10);
          $this->cell(20,5,$obj["fechas"]);
          $this->setFont("Arial","B",10);
          /*$this->cell(10,5,"Hasta");
          $this->setFont("Arial","",10);
          $this->cell(20,5,$this->fecnomhas);*/
          $this->setFont("Arial","B",8);
          $this->ln(6);
          $this->cell(5,5,"");
          $this->cell(32,5,"Cedula Identidad");
          $this->cell(115,5,"Nombre del Trabajador");
          $this->cell(32,5,"Sueldo");
          $this->ln();
          $this->setFont("Arial","",10);
          $this->SetFillColor(170,170,170);
          //$this->Rect(16,$this->GetY(),22,4,"F");
          //$this->Rect(48,$this->GetY(),75,4,"F");
          $this->cell(9,5,"");
          $this->cell(28,5,$obj["codemp"]);
          $this->cell(104,5,strtoupper($obj["nomemp"]));

          $arrsueldo = $this->objNprrecpag->sqlcalulasueldo2($obj["codemp"]);
          $arrsueldo = $this->objNprrecpag->sqlcalulasueldo($obj["nomina2"],$obj["codemp"]);
          $this->cell(30,5,H::FormatoMonto(($arrsueldo[$this->index]["valor"])*2),0,0,"R");

          $this->setFont("Arial","B",10);
          $this->ln();
          $this->cell(5,5,"");
          $this->cell(85,5,"Cargo");
          $this->cell(30,5,"Unidad de Adscripcion");
          $this->ln(4);
          $this->setFont("Arial","",10);
          $this->cell(5,5,"");
          $this->cell(75,5,"");    $this->setx(100);
          $this->cell(80,5,$obj["desniv"]);
          $this->setx(15);
          $this->multicell(70,5,strtoupper($obj["nomcar"]));


          $this->ln();
          $this->setFont("Arial","B",8);
          $this->cell(5,5,"");
          $this->cell(85,5,"Centro de Pago");
          $this->cell(40,5,"Nro Cuenta");
      	  $this->cell(30,5,"Fecha Ingreso");
          $this->ln(4);
          $this->setFont("Arial","",10);
          $this->cell(5,5,"");
          $this->cell(75,5,strtoupper($obj["nomban"]));
          $this->cell(55,5,strtoupper($obj["numcue"]));
      	  $this->cell(40,5,strtoupper($obj["fecing"]));
          $this->setFont("Arial","B",10);
          $this->ln(7);
          $this->cell(16,5,"");
          $this->cell(74,5,"Nombre del Concepto");
          $this->cell(35,5,"Asignaciones");
          $this->cell(40,5,"Deducciones");
          $this->cell(30,5,"");
          //  $this->cell(30,5,"Saldo");
          $this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
          //aki
          $this->ln();
          $filas  = 0;

        }
        //Detalle
        $ref=$obj["codemp"];
        $this->setFont("Arial","",10);
        //$this->cell(16,5,"");
        //$this->cell(74,5,strtoupper($obj["nomcon"]));
        //$this->cell(21,5,H::FormatoMonto($obj["asigna"]),0,0,"R");
        $acumasigna=$acumasigna+$obj["asigna"];
        //$this->cell(34,5,H::FormatoMonto($obj["deduc"]),0,0,"R");
        $acumdeduc=$acumdeduc+$obj["deduc"];

        $arrprestamos = $this->objNprrecpag->sqlprestamos($obj["codcon"]);
        $arrnpasiconemp =  $this->objNprrecpag->sqlnpasiconemp($obj["codemp"],$obj["codcar"],$obj["codcon"]);

        if (!$arrprestamos)
        {
          $saldo=0;
        }
        else
        {
          $saldo=$arrnpasiconemp[0]["saldo"];
        }
        //$this->cell(30,5,H::FormatoMonto($saldo),0,0,"R");
        $this->setx(16);
        if(!(($obj["asigna"]==0 && $obj["deduc"]==0 && $saldo==0)))
        	$this->rowm(array(strtoupper($obj["nomcon"]),H::FormatoMonto($obj["asigna"]),H::FormatoMonto($obj["deduc"])));

      }
      $this->setAutoPageBreak(false);
      $this->ln(6);
      $this->Line(92,$this->GetY(),195,$this->GetY());
      $this->cell(5,5,"");
      $this->setFont("Arial","B",10);
      $this->cell(60,5,"");
      $this->cell(13,5,"TOTALES");
      $this->cell(34,5,H::FormatoMonto($acumasigna),0,0,"R");
      $this->cell(34,5,H::Formatomonto($acumdeduc),0,0,"R");
      $this->ln(7);
      $this->cell(80,5,"");
      $this->cell(40,5,"NETO A COBRAR");
      $this->setAutoPageBreak(true,25);
      //$this->Rect(117,$this->GetY(),30,4,"F"); -- sombrea monto
      $this->cell(13,5,H::FormatoMonto($acumasigna-$acumdeduc),0,0,"R");

      $this->arrpcuotas = $this->objNprrecpag->sqlcuotas($obj["codemp"]);
     //H::PrintR($this->arrpcuotas);exit;
      //$this->arrpcoutas

//--------------------------------------------------------------
      	if (count($this->arrpcuotas) > 0)
      	{
      		$this->ln(10);

      	$this->setFont("Arial","B",10);
			$this->SetWidths(array(180));
			$this->SetAligns(array("C"));
			//***$this->SetFillTable(1);
			//***$this->SetBorder(1);
			$this->Row(array("PRESTAMOS OTORGADOS"));
			//****$this->SetBorder(0);
	    	//****$this->SetFillTable(0);

	    	$this->setFont("Arial","B",10);
		$this->SetWidths(array(60,60,60));
			$this->SetAligns(array("C","C","C"));
			//****$this->SetFillTable(1);
			$this->SetBorder(1);
			$this->Row(array("PRESTAMO","SALDO","CUOTAS PENDIENTES"));
			//***$this->SetBorder(0);
	    	$this->SetFillTable(0);


      	foreach ($this->arrpcuotas as $dato)
      	{
      		//***print "alfo";exit;

	    	$this->setFont("Arial","",10);
			$this->SetWidths(array(60,60,60));
			$this->SetAligns(array("L","R","R"));
			//***$this->SetFillTable(1);
			$this->SetBorder(1);
			$this->Row(array($dato["descripcion"],H::FormatoMonto($dato["saldo"]),$dato["cuotas_pendientes"]));
			$this->SetBorder(0);
	    	//***$this->SetFillTable(0);


      	}

      	}

 $this->ln(20);
      	  $this->cell(0,5,"Recibe :_____________________________________________",0,'C');


    }

  }
?>