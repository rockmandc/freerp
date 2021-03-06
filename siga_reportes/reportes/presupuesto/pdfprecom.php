<?
    require_once("../../lib/general/fpdf/fpdf.php");
    require_once("../../lib/bd/basedatosAdo.php");
    require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/presupuesto/Precom.class.php");

    class pdfreporte extends fpdf
    {
        var $titulos;
        var $titulos2;
        var $pre1;
        var $pre2;
        var $fecprc1;
        var $fecprc2;
        var $tipprc1;
        var $tipprc2;
        var $combodes;
        var $codpre1;
        var $codpre2;

        function pdfreporte()
        {
            $this->fpdf("l","mm","Letter");
            $this->titulos=array();
            $this->titulos2=array();
            $this->campos=array();
            $this->anchos=array();
            $this->anchos2=array();
            $this->cab=new cabecera();

            // nro de compromiso
            $this->pre1=H::GetPost("pre1");
            $this->pre2=H::GetPost("pre2");
            // fecha del compromiso
            $this->fecprc1=H::GetPost("fecprc1");
            $this->fecprc2=H::GetPost("fecprc2");
            // tipo
            $this->tipprc1=H::GetPost("tipprc1");
            $this->tipprc2=H::GetPost("tipprc2");
            // combo
            $this->combodes=H::GetPost("combodes");
            // codigo presupuestario
            $this->codpre1=H::GetPost("codpre1");
            $this->codpre2=H::GetPost("codpre2");
            //comodin
            $this->comodin=H::GetPost("comodin");


           $this->precom= new Precom();
           $this->arrp=$this->precom->sqlp($this->fecprc1,$this->fecprc2,$this->tipprc1,$this->tipprc2,$this->pre1,$this->pre2,$this->codpre1,$this->codpre2,$this->comodin,$this->combodes);
        //  H::printR($this->arrp);
             $this->llenartitulosmaestro();
            $this->llenartitulosmaestro2();
            $this->llenaranchos();
            $this->llenaranchos2();
    }

        function llenartitulosmaestro()
        {
                $this->titulos[0]="Referencia";
                $this->titulos[1]="Tipo";
                $this->titulos[2]="Fecha";
                $this->titulos[3]="Descripción";
                $this->titulos[4]="Beneficiario";
                $this->titulos[5]="Estatus";
                //$this->titulos[5]="Monto";
        }

        function llenartitulosmaestro2()
        {
                $this->titulos2[0]="Imputaciones Presupuestarias";
                $this->titulos2[1]="";
                $this->titulos2[2]="Comprometido";
                $this->titulos2[3]="Ajustado";
                $this->titulos2[4]="Monto Ajustado";
                $this->titulos2[5]="Causado";
                $this->titulos2[6]="Pagado";

        }
  function llenaranchos2()
    {
        $this->anchos2=array();
        $this->anchos2[0]=100;
        $this->anchos2[1]=25;
        $this->anchos2[2]=25;
        $this->anchos2[3]=25;
        $this->anchos2[4]=25;
        $this->anchos2[5]=25;
        $this->anchos2[6]=25;

    }
  function llenaranchos()
    {
        $this->anchos=array();
        $this->anchos[0]=20;
        $this->anchos[1]=20;
        $this->anchos[2]=20;
        $this->anchos[3]=100;
        $this->anchos[4]=70;
        $this->anchos[5]=20;
        //$this->anchos[5]=25;


    }


        function Header()
        {
            $this->cab->poner_cabecera_f_b($this,$_POST["titulo"],$this->conf,"s","s");
        //    $this->getCabecera(H::GetPost("titulo"),"");
            $this->setFont("Arial","B",9);
            $ncampos=count($this->titulos);
            $ncampos2=count($this->titulos2);


            for($i=0;$i<= 5;$i++)
            {
                $this->cell($this->anchos[$i],10,$this->titulos[$i],0,0,'L');
            }
            $this->ln();
            for($i=0;$i<= 6;$i++)
            {
                $this->cell($this->anchos2[$i],10,$this->titulos2[$i],0,0,'C');
            }
            $this->ln();
            $this->ln();
            $this->Line(10,60,270,60);

        }

        function Cuerpo()
        {
            $ref="";
                    $acum_pre2=0;
                       $acum_cau2=0;
                    $acum_pag2=0;
                    $acum_a2=0;
                    $acum_com2=0;
            $pri=true;
            foreach($this->arrp as $dato)
            {
                if($dato["referencia"]!=$ref)
                {
                    if(!$pri) {
		      
                    $this->line(135,$this->gety(),270,$this->gety());
                    $this->setx(100);
                    $this->cell(20,4,"MONTO",0,0,'R');
                    $this->setx(135);
                    $this->cell(20,4,H::FormatoMonto($acum_pre2),0,0,'R');
                    $this->cell(20,4,H::FormatoMonto($acum_cau2),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($acum_pag2),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($acum_a2),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($acum_com2),0,0,'R');
                    $acum_pre2=0;
                       $acum_cau2=0;
                    $acum_pag2=0;
                    $acum_a2=0;
                    $acum_com2=0;
                    $this->ln();}
                    $this->line(10,$this->gety(),270,$this->gety());
                $pri=false;
                $this->referencia=$dato["referencia"];
                $this->descripcion=$dato["descripcion"];
                $this->tipo=$dato["tipo"];
                $this->fecha=$dato["fecha"];
                $this->benefi=$dato["nomben"];
		  $numtot=$numtot+1;

                    if ($dato["estat"]=='A'){$this->estat='Activo';}else
                if ($dato["estat"]=='N') $this->estat="Anulado"; else $this->estat="";
                $this->monto=$dato["monto"];
                if($this->gety()>170){$this->addpage();}
                     $this->setFont("Arial","B",7);
                    $this->cell(20,4,$this->referencia);
                    $this->cell(20,4,$this->tipo);
                    $this->cell(20,4,$this->fecha);
                    $y=$this->gety();
                    $this->setxy(70,$y);
                    $this->multicell(120,4,$this->descripcion);
                    $this->setxy(195,$y);
                    $this->multicell(50,4,$this->benefi);
                    $this->setxy(245,$y);
                    $this->multicell(25,4,( $this->estat),0,"L",0);
                    $this->setxy(245,$y);
                //    $this->multicell(25,4,H::FormatoMonto( $this->monto),0,"R",0);
                    $this->ln();$aver=strlen($this->descripcion)/60;
                    $this->ln($aver*3);
                    //if(strlen($this->descripcion)>150){$this->ln();}
                    if(strlen($this->benefi)>24){$this->ln();}

                }
                $ref=$dato["referencia"];
                $this->codpre=$dato["codigo"];
                $this->nompre=$dato["nompre"];
                $this->imputado=$dato["imputado"];
                $this->causado=$dato["causado"];
                $this->pagado=$dato["pagado"];
                $this->ajuste=$dato["ajuste"];
                $this->mon_aju=$dato["imputado"]-$dato["ajuste"];
                    $this->setFont("Arial","",7);
                    $this->cell($this->anchos2[0],4,$this->codpre);
                    $this->setx(135);
                    $this->cell(20,4,H::FormatoMonto($this->imputado),0,0,'R');
                    $this->cell(20,4,H::FormatoMonto($this->ajuste),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($this->mon_aju),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($this->causado),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($this->pagado),0,0,'R');
                    $this->setx(55);
                    $this->multicell(80,4,$this->nompre);
                $this->ln(5);
                $acum_pre=$acum_pre + $this->imputado;
                $acum_cau=$acum_cau + $this->ajuste;
                $acum_pag=$acum_pag + $this->mon_aju;
                $acum_a=$acum_a + $this->causado;
                $acum_com=$acum_com + $this->pagado;
                $acum_pre2+=$this->imputado;
                   $acum_cau2+=$this->ajuste;
                $acum_pag2+=$this->mon_aju;
                $acum_a2+=$this->causado;
                $acum_com2+= $this->pagado;
		  


            }
                    $this->line(135,$this->gety(),270,$this->gety());
                    $this->setx(100);
                    $this->cell(20,4,"MONTO",0,0,'R');
                    $this->setx(135);
                    $this->cell(20,4,H::FormatoMonto($acum_pre2),0,0,'R');
                    $this->cell(20,4,H::FormatoMonto($acum_cau2),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($acum_pag2),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($acum_a2),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($acum_com2),0,0,'R');
                    $this->ln();
            $this->ln();
            $this->Line(10,$this->GetY(),270,$this->GetY());
            $this->ln();
            $this->setx(75);
            $this->setFont("Arial","B",7);
	     $this->setx(35);

	     $this->cell(2,4,"NÚMERO DE COMPROMISOS:  ".$numtot);
	     $this->setx(115);


            $this->cell($this->anchos4[0]+10,4,'TOTALES.......... ');
            $this->setx(135);
                    $this->cell(20,4,H::FormatoMonto($acum_pre),0,0,'R');
                    $this->cell(20,4,H::FormatoMonto($acum_cau),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($acum_pag),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($acum_a),0,0,'R');
                    $this->cell(25,4,H::FormatoMonto($acum_com),0,0,'R');
            //---------------------------------------------------------------------
                unset($this->precom);

        }
    }
?>