<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/facturacion/Farrecpart.class.php");

	class pdfreporte extends fpdf
	{

		var $bd;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");

	        $this->arrp=array("no_vacio");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();


			$this->coddes=H::GetPost("coddes");
			$this->codhas=H::GetPost("codhas");
			$this->codpades=H::GetPost("codpades");

			$this->farrecpart = new Farrecpart();
		    $this->arrp = $this->farrecpart->sqlp($this->coddes,$this->codhas);
			$this->llenartitulosmaestro();
			$this->llenaranchos();

		}

	function llenartitulosmaestro()		{

				$this->titulosm[0]="Código del Recargo";
				$this->titulosm[1]="Descripción del Recargo";

				$this->titulosm[2]="Código del Artículo";
				$this->titulosm[3]="Descripción del Artículo";
				$this->titulosm[4]="";
		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=110;
		$this->anchos[1]=50;
		$this->anchos[2]=40;
		$this->anchos[3]=80;
		$this->anchos[5]=90;
		$this->anchos[6]=10;

	}

function Header()
		{
		    	$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
			    $this->setFont("Arial","B",9);
			    $this->SetWidths(array($this->anchos[3],$this->anchos[0]));
    	        $this->SetAligns(array("L","L"));
    	        $this->SetFillColor(230,230,230);
		        $this->SetFillTable(1);
    	        $this->setBorder("L");
    	        $this->Row(array($this->titulosm[0],$this->titulosm[1]));
                $this->Ln();
                $this->SetWidths(array($this->anchos[5]+10,$this->anchos[5]));
    	         $this->SetAligns(array("C","C"));
    	         $this->SetFillColor(230,230,230);
		        $this->SetFillTable(1);
    	        $this->setBorder(1);
    	        $this->Row(array($this->titulosm[2],$this->titulosm[3]));
    	         //$this->SetFillColor(230,230,230);
		        $this->SetFillTable(0);
                $this->Ln();

		}

function Cuerpo()

		{
	    $k=0;
	    $reg=1;
		$codrecargo="";
		$codarticulo="";
		$registro=count($this->arrp);
		foreach($this->arrp as $dato)
            {

             $reg++;
             if($dato["codrecargo"]!=$codrecargo)
              {
              	if ($k>0)
              	{
              	$this->Ln();
              	$this->Ln();
              	}
                $k++;
                $this->setFont("Arial","",9);
                $this->SetWidths(array($this->anchos[3],$this->anchos[0]));
    	        $this->SetAligns(array("L","L"));
    	        $this->setBorder(1);
    	        $this->Row(array($dato["codrecargo"],$dato["recargo"]));

                $codrecargo=$dato["codrecargo"];

                $this->Ln();


                $this->arrp1 = $this->farrecpart->sqlp1($codrecargo);

                foreach($this->arrp1 as $dato1)
                 {

               if($dato1["codigo"]!=$codarticulo)
              {
                $this->setFont("Arial","",9);
                $this->SetWidths(array($this->anchos[5]+10,$this->anchos[5]));
    	        $this->SetAligns(array("C","C"));
    	        $this->setBorder(1);
    	        $this->Row(array($dato1["codigo"],$dato1["nombre"]));

                }
                }


              }

            }

            if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }
		}

}//fin de la clase
?>
