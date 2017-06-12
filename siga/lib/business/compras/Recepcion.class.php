<?php
/**
 * Recepción: Clase estática para el manejo de las recepciones de almacén
 *
 * @package    Roraima
 * @subpackage compras
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Recepcion
{

/**
	 * Función Principal para guardar datos del formulario AlmOrdRec
	 * TODO Esta función (y todas las demás de su clase) deben retornar un
	 * código de error para validar cualquier problema al guardar los datos.
	 *
	 * @static
	 * @param $recepcion Object Recepcion a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function salvarAlmrec($recepcion,$grid){
     $msj=-1;
      
      $gencom=H::getConfApp2('gencom', 'compras', 'almordrec');
      if ($gencom=='S' && (!$recepcion->getId()))
      {
        if (!self::generarasientos($recepcion,$grid,$arrasientos,$acumdeb,$pos,$msj3))
           {
               return $msj3;
           }else {  
                self::Grabar_Recepcion($recepcion,$grid);
                self::Generar_Comprobante_Contable($recepcion,$arrasientos,$acumdeb,$pos);
           }
      }
      else {
          self::Grabar_Recepcion($recepcion,$grid);
      }        

      return $msj;
    }

/**
	 * Función para Registrar Recepciones
	 *
	 * @static
	 * @param $recepcion Object Recepcion a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Grabar_Recepcion($recepcion,$grid){
      $tiecorr=false;
      if (Herramientas::getVerCorrelativo('correc','cacorrel',$r))
      {
        if ($recepcion->getRcpart()=='########')
        {
                $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $sql="select rcpart from Carcpart where rcpart='".$numero."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
                $r=$r+1;
          }
          else
          {
                $encontrado=true;
          }
        }
        $tiecorr=true;
        $recepcion->setRcpart(str_pad($r, 8, '0', STR_PAD_LEFT));
        }

	  //Se graba la Recepcion
	   $recepcion->save();

	  // Se graban los articulos dela recepcion
	  self::Grabar_RecepcionArticulos($recepcion,$grid);
	  if ($tiecorr) Herramientas::getSalvarCorrelativo('correc','cacorrel','Recepcion',$r,$msg);
	  if (self::Actualizar_Articulos($recepcion,$grid,$msj))
	  {
    	    self::Actualizar_ArticulosOrden($recepcion,$grid);
	  }
     }
    }

/**
	 * Función para registrar el despacho de los articulos
	 *
	 * @static
	 * @param $recepcion Object Despacho a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Grabar_RecepcionArticulos($recepcion,$grid)
    {
	  $codrec=$recepcion->getRcpart();
	  $ordcom=$recepcion->getOrdcom();
          $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
          $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
	  $x=$grid[0];
	  $j=0;

	  while ($j<count($x))
		  {
		  	  //marcado como articulo cerrado para recepcion
		  	  $marcado= $x[$j]->getCerart();
              if ($marcado!=1 and $x[$j]->getCanrecgri()>0)
              {
			      $detalle = new Caartrcp();
			   	  $detalle->setRcpart($codrec);
			   	  $detalle->setCodart($x[$j]->getCodart());
                                  $detalle->setDesart($x[$j]->getDesart());
			   	  $detalle->setOrdcom($ordcom);
			  	  $detalle->setCanrec($x[$j]->getCanrecgri());
			  	  $detalle->setCandev($x[$j]->getCandev());
			  	  $detalle->setCantot($x[$j]->getPreart());
			  	  $detalle->setMondes($x[$j]->getDtoart());
			  	  $detalle->setMonrgo($x[$j]->getRgoart());
			  	  $detalle->setMontot($x[$j]->getMontot());
			  	  $detalle->setCodcat($x[$j]->getCodcat());
			  	  $detalle->setCodalm($x[$j]->getCodalm());
			  	  $detalle->setCodubi($x[$j]->getCodubi());
                                  $detalle->setCodunimed($x[$j]->getCodunimed());
                                  if ($manartlot=='S')
                                      $detalle->setNumlot($x[$j]->getNumlot());
				  if (trim($x[$j]->getFecest())!='') $detalle->setFecest($x[$j]->getFecest());
			  	  if (trim($x[$j]->getCodfal())!='') $detalle->setCodfal($x[$j]->getCodfal());
                                  if (trim($x[$j]->getSerial())!='') $detalle->setSerial($x[$j]->getSerial());
                                  if (trim($x[$j]->getMarca())!='') $detalle->setMarca($x[$j]->getMarca());
                                  if (trim($x[$j]->getModelo())!='') $detalle->setModelo($x[$j]->getModelo());
				  $detalle->save();
              }

	  	     if ($marcado == 1)
	  	      {
	  	      	$c = new Criteria();
				$c->add(CaartordPeer::ORDCOM,$ordcom);
				$c->add(CaartordPeer::CODART,$x[$j]->getCodart());
                                if ($claartdes=='S') $c->add(CaartordPeer::DESART,trim($x[$j]->getDesart()));
				$c->add(CaartordPeer::CODCAT,$x[$j]->getCodcat());
				$per = CaartordPeer::doSelectOne($c);
				if ($per)
				{   $per->setCerart('C');
     				$per->save();
				}
	  	      }

		      $j++;
		    }
     }


/**
	 * Función para  Actualizar los articulos
	 *
	 * @static
	 * @param $recepcion Object Despacho a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Actualizar_Articulos($recepcion,$grid,&$msj)
    {
         // $calmacen=$recepcion->getCodalm();
         // $cubicacion=$recepcion->getCodubi();
         $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
         $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
         $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
	      $x=$grid[0];
		  $j=0;
                  $acumcanrec=0;
		  while ($j<count($x))
		  {
		    $codarti=$x[$j]->getCodart();
		    $dart=$x[$j]->getDesart();
		    $cantd=$x[$j]->getCanrecgri();
		    $costo=$x[$j]->getCosart();
		    $marcado= $x[$j]->getCerart();
		    $calmacen=$x[$j]->getCodalm();
		    $cubicacion=$x[$j]->getCodubi();
                    if ($manartlot=='S')
                        $numlot=$x[$j]->getNumlot();
		    if (($codarti!="") and ($cantd>0) and ($marcado!=1))
		     {
		  	   $c = new Criteria();
		  	   $c->add(CaregartPeer::CODART,$codarti);
		       $arti = CaregartPeer::doSelectOne($c);
		        if ($arti)
		        {
		    	  $tipoart=$arti->getTipo();
                          
                          if ($manunialt=='S')
                          {
                              if ($x[$j]->getCodunimed()!="")
                              {
                                 if ($x[$j]->getCodunimed()!=$arti->getCodunimed())
                                 {
                                     $k= new Criteria();                                     
                                     $k->add(CaunialartPeer::CODART,$codarti);
                                     $k->add(CaunialartPeer::CODUNIMED,$x[$j]->getCodunimed());
                                     $result3= CaunialartPeer::doSelectOne($k);
                                     if ($result3)
                                     {
                                         $cantd=$cantd*$result3->getRelart();
                                     }
                                 }
                              }else {
                                 $r= new Criteria();
                                 $r->add(CaartordPeer::ORDCOM,$recepcion->getOrdcom());
                                 $r->add(CaartordPeer::CODART,$codarti);
                                 if ($claartdes=='S') $r->add(CaartordPeer::DESART,trim($dart));
                                 $result= CaartordPeer::doSelectOne($r);
                                 if ($result)
                                 {
                                     if ($result->getUnimed()!=$arti->getUnimed())
                                     {
                                         if ($arti->getUnialt()!="" && $arti->getRelart()!="" && $result->getUnimed()==$arti->getUnialt())
                                         {
                                            $cantd=$cantd*$arti->getRelart();
                                         }else {
                                         $k= new Criteria();                                     
                                         $k->add(CaunialartPeer::CODART,$codarti);
                                         $k->add(CaunialartPeer::UNIALT,$result->getUnimed());
                                         $result3= CaunialartPeer::doSelectOne($k);
                                         if ($result3)
                                         {
                                             $cantd=$cantd*$result3->getRelart();
                                         }
                                       }
                                     }
                                 }
                              }
                          }


		    	   if ($tipoart=='A')
		    	   {
		    	     $act1=$arti->getExitot() + $cantd;
		       	     $arti->setExitot($act1);
                             $c = new Criteria();
                             $c->add(CaartalmubiPeer::CODART,$codarti);
                             $c->add(CaartalmubiPeer::CODALM,$calmacen);
                             $c->add(CaartalmubiPeer::CODUBI,$cubicacion);
                             if ($manartlot=='S')
                                 $c->add(CaartalmubiPeer::NUMLOT,$numlot);
                             $alm = CaartalmubiPeer::doSelectOne($c);
                             if ($alm)
                             {
                                  $act2=$alm->getExiact() + $cantd;
                                  $alm->setExiact($act2);
                                  $alm->save();
                                  $c = new Criteria();
                                  $c->add(CaregartPeer::CODART,$codarti);
                                  $arti = CaregartPeer::doSelectOne($c);
                                  if ($arti)
                                  {
                                         $act1=$arti->getExitot() + $cantd;
                                         $dis1=$arti->getDistot() + $cantd;
                                         $arti->setExitot($act1);
                                         $arti->setDistot($dis1);
                                         $arti->setCosult($costo);
                                         $arti->save();
                                   }
                            }// if ($alm)
                            else {
                                if ($manartlot=='S')
                                {
                                      $caartalmubi= new Caartalmubi();
                                      $caartalmubi->setCodart($codarti);
                                      $caartalmubi->setCodalm($calmacen);
                                      $caartalmubi->setCodubi($cubicacion);
                                      $caartalmubi->setExiact($cantd);
                                      $caartalmubi->setNumlot($numlot);
                                      $caartalmubi->save();
                                }
                            }
                                 $c = new Criteria();
		  	         $c->add(CaartalmPeer::CODART,$codarti);
		  	         $c->add(CaartalmPeer::CODALM,$calmacen);
                                 $reg = CaartalmPeer::doSelectOne($c);
                                  if ($reg)
                                  {
                                          $act2=$reg->getExiact() + $cantd;
                                          $reg->setExiact($act2);
                                          $reg->save();
                                   }
		            }// if ($tipoart='A')
		       	      $arti->setCosult($costo);



		              if ($arti->getExitot()== 0)
		              {
		                   $arti->setCospro($costo);
		              }
		              else
		              {
		                   $costocal = (($cantd * $costo) + ($costo * ($arti->getExitot()- $cantd))) / $arti->getExitot();
                           $arti->setCospro($costocal);
		              }
		              $arti->save();

                              $manforent=H::getConfApp2('manforent', 'compras', 'almordcom');
                              if ($manforent=='S')
                              {
                                  $t= new Criteria();
                                  $t->add(CaentordPeer::ORDCOM,$recepcion->getOrdcom());
                                  $t->add(CaentordPeer::CODART,$codarti);
                                  $t->add(CaentordPeer::CODALM,$recepcion->getCodalm());
                                  $dat= CaentordPeer::doSelectOne($t);
                                  if ($dat)
                                  {
                                      $dat->setCanrec($dat->getCanrec()+$cantd);
                                      $dat->save();
                                  }
                              }
		         }
		      }//  if (($codarti!="") and ($cantd>0) and ($marcado!=1))
		    $j++;
		  }

                  
     return true;
   }

/**
	 * Función para Actualizar los articulos por Orden
	 *
	 * @static
	 * @param $recepcion Object Despacho a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Actualizar_ArticulosOrden($recepcion,$grid){
	  $codrec=$recepcion->getRcpart();
	  $ordcom=$recepcion->getOrdcom();
          $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');


	      $x=$grid[0];
		  $j=0;
		  while ($j<count($x)) {
		  $codarti=$x[$j]->getCodart();
		  $cantd=$x[$j]->getCanrecgri();
		  $codcat=$x[$j]->getCodcat();
          $marcado= $x[$j]->getCerart();
		   if (($codarti!="") and ($cantd>0) and ($marcado!=1))
		    {
		  	  $c = new Criteria();
		  	  $c->add(CaartordPeer::ORDCOM,$ordcom);
		      $c->add(CaartordPeer::CODART,$codarti);
                      if ($claartdes=='S') $c->add(CaartordPeer::DESART,trim($x[$j]->getDesart()));
		      $c->add(CaartordPeer::CODCAT,$codcat);

	          $ordarti = CaartordPeer::doSelectOne($c);
	           if ($ordarti)
	           {
	             $act3=$ordarti->getCanrec() + $cantd;
	             $ordarti->setCanrec($act3);
	             $ordarti->save();
		      }
		    }// if (($codarti!="") and ($cantd>0) and ($marcado!=1))
		    $j++;
		  }
    }

   public static function eliminarAlmrec($recepcion,&$msg)
   {
      $msg="";
      if (self::eliminarRecepcion($recepcion,$msg))
			return true;
      else
			return false;
   }

  public static function eliminarRecepcion($recepcion,&$msg)
   {
   	if (self::ValidaEliminaRec($recepcion,$msg))
   	{
             self::devolverArticulos($recepcion);
	     self::devolverArticulosOrCom($recepcion);
	     self::eliminarRecepcionArticulos($recepcion);
             $gencom=H::getConfApp2('gencom', 'compras', 'almordrec');
             if ($gencom=='S')
             {
                 Herramientas::EliminarRegistro('Contabc1','Numcom',$recepcion->getNumcom());
                 Herramientas::EliminarRegistro('Contabc','Numcom',$recepcion->getNumcom());
             }

	     $recepcion->delete();

	     return true;
   	}
   	else
   	{
   		return false;
   	}
   }

   public static function ValidaEliminaRec($recepcion,&$msg)
    {
      $msg="";
      $codrec=$recepcion->getRcpart();
      $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
      $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
      $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
      //$codalmacen=$recepcion->getCodalm();
      //$codubicacion=$recepcion->getCodubi();
	  $c= new Criteria();
	  $c->add(CaartrcpPeer::RCPART,$codrec);
	  $detalle= CaartrcpPeer::doselect($c);
	  foreach ($detalle as $arreglo)
	  {
	  	$codarticulo=$arreglo->getCodart();
      $desarticulo=$arreglo->getDesart();
	  	$cantrec=$arreglo->getCanrec();
	  	$codalmacen=$arreglo->getCodalm();
        $codubicacion=$arreglo->getCodubi();
        if ($manartlot=='S')
            $numlot=$arreglo->getNumlot();
	  	if ($codarticulo!="" and $cantrec>0)
	  	{
	  		$c = new Criteria();
		    $c->add(CaregartPeer::CODART,$codarticulo);
		    $articulo = CaregartPeer::doSelectOne($c);
		    if ($articulo)
		    {
          if ($manunialt=='S')
          {
              if ($arreglo->getCodunimed()!="")
              {
                 if ($arreglo->getCodunimed()!=$articulo->getCodunimed())
                 {
                     $k= new Criteria();                                     
                     $k->add(CaunialartPeer::CODART,$codarticulo);
                     $k->add(CaunialartPeer::CODUNIMED,$arreglo->getCodunimed());
                     $result3= CaunialartPeer::doSelectOne($k);
                     if ($result3)
                     {
                         $cantrec=$cantrec*$result3->getRelart();
                     }
                 }
              }else {
                 $r= new Criteria();
                 $r->add(CaartordPeer::ORDCOM,$recepcion->getOrdcom());
                 $r->add(CaartordPeer::CODART,$codarticulo);
                 if ($claartdes=='S') $r->add(CaartordPeer::DESART,trim($desarticulo));
                 $result= CaartordPeer::doSelectOne($r);
                 if ($result)
                 {
                     if ($result->getUnimed()!=$articulo->getUnimed())
                     {
                         if ($articulo->getUnialt()!="" && $articulo->getRelart()!="" && $result->getUnimed()==$articulo->getUnialt())
                         {
                            $cantrec=$cantrec*$articulo->getRelart();
                         }else {
                         $k= new Criteria();                                     
                         $k->add(CaunialartPeer::CODART,$codarticulo);
                         $k->add(CaunialartPeer::UNIALT,$result->getUnimed());
                         $result3= CaunialartPeer::doSelectOne($k);
                         if ($result3)
                         {
                             $cantrec=$cantrec*$result3->getRelart();
                         }
                       }
                     }
                 }
              }
          }
		    	if($articulo->getTipo()=='A')
		    	{
                            if ($manartlot=='S')
                            {
                                 	if (!Despachos::verificaexisydisp($codarticulo,$codalmacen,$codubicacion,$cantrec,$msg,$numlot))
				 	    return false;
                            }else {
				 	if (!Despachos::verificaexisydisp($codarticulo,$codalmacen,$codubicacion,$cantrec,$msg))
				 	    return false;
                            }
		    	  }//  if($articulo->getTipo()=='A')
		    	}//if ($articulo)
		    }// 	if ($codarticulo!="" and $cantrec>0)
	  	 }//foreach ($detalle as $arreglo)
	 return true;
    }


   public static function devolverArticulos($recepcion)
    {
      $codrec=$recepcion->getRcpart();
      $ordcom=H::getX_vacio('RCPART','Carcpart','Ordcom',$codrec);
      $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
      $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
      $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
      //$codalmacen=$recepcion->getCodalm();
      //$codubicacion=$recepcion->getCodubi();
	  $c= new Criteria();
	  $c->add(CaartrcpPeer::RCPART,$codrec);
	  $detalle= CaartrcpPeer::doselect($c);
	  foreach ($detalle as $arreglo)
	  {
	  	$codarticulo=$arreglo->getCodart();
      $desarticulo=$arreglo->getDesart();
	  	$cantrec=$arreglo->getCanrec();
	  	$codalmacen=$arreglo->getCodalm();
        $codubicacion=$arreglo->getCodubi();
        if ($manartlot=='S')
            $numlot=$arreglo->getNumlot();
	  	if ($codarticulo!="" and $cantrec>0)
	  	{
	  		$ca = new Criteria();
		    $ca->add(CaregartPeer::CODART,$codarticulo);
		    $articulo = CaregartPeer::doSelectOne($ca);
		    if ($articulo)
		    {
          if ($manunialt=='S')
          {
              if ($arreglo->getCodunimed()!="")
              {
                 if ($arreglo->getCodunimed()!=$articulo->getCodunimed())
                 {
                     $k= new Criteria();                                     
                     $k->add(CaunialartPeer::CODART,$codarticulo);
                     $k->add(CaunialartPeer::CODUNIMED,$arreglo->getCodunimed());
                     $result3= CaunialartPeer::doSelectOne($k);
                     if ($result3)
                     {
                         $cantrec=$cantrec*$result3->getRelart();
                     }
                 }
              }else {
                 $r= new Criteria();
                 $r->add(CaartordPeer::ORDCOM,$ordcom);
                 $r->add(CaartordPeer::CODART,$codarticulo);
                 if ($claartdes=='S') $r->add(CaartordPeer::DESART,trim($desarticulo));
                 $result= CaartordPeer::doSelectOne($r);
                 if ($result)
                 {
                     if ($result->getUnimed()!=$articulo->getUnimed())
                     {
                         if ($articulo->getUnialt()!="" && $articulo->getRelart()!="" && $result->getUnimed()==$articulo->getUnialt())
                         {
                            $cantrec=$cantrec*$articulo->getRelart();
                         }else {
                         $k= new Criteria();                                     
                         $k->add(CaunialartPeer::CODART,$codarticulo);
                         $k->add(CaunialartPeer::UNIALT,$result->getUnimed());
                         $result3= CaunialartPeer::doSelectOne($k);
                         if ($result3)
                         {
                             $cantrec=$cantrec*$result3->getRelart();
                         }
                       }
                     }
                 }
              }
          }

		    	if($articulo->getTipo()=='A')
		    	{
				 	if (($articulo->getExitot() - $cantrec) >= 0)
				 	{
	                   	$cuenta=$articulo->getExitot() - $cantrec;
			    		$articulo->setExitot($cuenta);
			    		$articulo->save();
				 	}
		    		//actualizo almacen
		    		 $c = new Criteria();
	                 $c->add(CaartalmubiPeer::CODART,$codarticulo);
	                 $c->add(CaartalmubiPeer::CODALM,$codalmacen);
	                 $c->add(CaartalmubiPeer::CODUBI,$codubicacion);
                         if ($manartlot=='S')
                             $c->add(CaartalmubiPeer::NUMLOT,$numlot);
	                 $alm = CaartalmubiPeer::doSelectOne($c);
	                 if ($alm)
	                 {
				     	if (($alm->getExiact() - $cantrec) >= 0)
	                       {
			            	$cuenta2=$alm->getExiact() - $cantrec;
			            	$alm->setExiact($cuenta2);
			            	$alm->save();
	                       }
		             }// if ($alm)

		    		$c = new Criteria();
		  	        $c->add(CaartalmPeer::CODART,$codarticulo);
		  	        $c->add(CaartalmPeer::CODALM,$codalmacen);
		            $datos = CaartalmPeer::doSelectOne($c);
		            if ($datos)
		            {
                       if (($datos->getExiact() - $cantrec) >= 0)
                       {
		            	$cuenta2=$datos->getExiact() - $cantrec;
		            	$datos->setExiact($cuenta2);
		            	$datos->save();
                       }
		            } //if ($datos)
		    	  }//  if($articulo->getTipo()=='A')
		    	}//if ($articulo)
		    }// 	if ($codarticulo!="" and $cantrec>0)
	  	 }//foreach ($detalle as $arreglo)
    }

  public static function devolverArticulosOrCom($recepcion)
   {
	  $codrec=$recepcion->getRcpart();
	  $ordcom=$recepcion->getOrdcom();
          $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');

	  $c= new Criteria();
	  $c->add(CaartrcpPeer::RCPART,$codrec);
	  $detalle= CaartrcpPeer::doselect($c);
	  foreach ($detalle as $arreglo)
	  {
	  	  $codart=$arreglo->getCodart();
		  $canrec=$arreglo->getCanrec();
		  $codcat=$arreglo->getCodcat();

  		  $c = new Criteria();
	  	  $c->add(CaartordPeer::ORDCOM,$ordcom);
	      $c->add(CaartordPeer::CODART,$codart);
              if ($claartdes=='S') $c->add(CaartordPeer::DESART,trim($arreglo->getDesart()));
	      $c->add(CaartordPeer::CODCAT,$codcat);
	      $datos = CaartordPeer::doSelectOne($c);
	      if ($datos)
	      {
	      	$cuenta3=$datos->getCanrec() - $canrec;
	      	if ($cuenta3==0) $cuenta3="0,00";
	      	$datos->setCanrec($cuenta3);
	      	$datos->save();
	      }
	  }
   }

   public static function eliminarRecepcionArticulos($recepcion)
    {
      $codrec=$recepcion->getRcpart();
	   $c= new Criteria();
	  $c->add(CaartrcpPeer::RCPART,$codrec);
	  $detalle= CaartrcpPeer::doselect($c);
	  foreach ($detalle as $arreglo)
	  {
	  	$arreglo->delete();
	  }
    }

    public static function verificaexiartalmubi($codart,$codalm,$codubi,&$msg)
    {
    	 	 $msg="";
    	 	 $c = new Criteria();
             $c->add(CaartalmubiPeer::CODART,$codart);
             $c->add(CaartalmubiPeer::CODALM,$codalm);
             $c->add(CaartalmubiPeer::CODUBI,$codubi);
             $alm = CaartalmubiPeer::doSelectOne($c);
             if (!$alm)
             {
             	$msg='El Articulo '.$codart.' no esta definido en el Almacen '.$codalm.' para la Ubicacion '.$codubi.".";
             	return false;
             }
             else
             {
             	return true;
             }
    }

   public static function generarasientos($recepcion,$grid,&$arrasientos,&$acumdeb,&$pos,&$msj3)
   {

       $arrasientos=array();
        $pos=0;
        $msj3=-1;

        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          $c= new Criteria();
          $c->add(CaregartPeer::CODART,$x[$j]->getCodart());
          $regis = CaregartPeer::doSelectOne($c);
          if ($regis)
          {
            if($regis->getCodcta()!='')
            {
              $cuenta=$regis->getCodcta();
            }else {$cuenta='';}

            $b= new Criteria();
            $b->add(ContabbPeer::CODCTA,$cuenta);
            $regis2 = ContabbPeer::doSelectOne($b);
            if ($regis2)
            {
                if (!Factura::buscarAsientos($cuenta,'D',$x[$j]->getMontot(),$arrasientos,$pos))
                {
                  Factura::guardarAsientos($cuenta,$regis2->getDescta(),'D',$x[$j]->getMontot(),$arrasientos,$pos);
                }
            }
            else{
            	$msj3=210;
      	        return false;
            }

            if($regis->getCtatra()!='')
            {
              $cuenta2=$regis->getCtatra();
            }else {$cuenta2='';}

            $b= new Criteria();
            $b->add(ContabbPeer::CODCTA,$cuenta2);
            $regis2 = ContabbPeer::doSelectOne($b);
            if ($regis2)
            {
                if (!Factura::buscarAsientos($cuenta2,'C',$x[$j]->getMontot(),$arrasientos,$pos))
                {
                  Factura::guardarAsientos($cuenta2,$regis2->getDescta(),'C',$x[$j]->getMontot(),$arrasientos,$pos);
                }
            }
            else{
            	$msj3=211;
      	        return false;
            }
          }
          $j++;
        }

        $i=0;
          $acumdeb=0;
          $acumcre=0;
          while ($i<=($pos-1))
          {
                if ($arrasientos[$i]["2"]!="")
                {
                  if ($arrasientos[$i]["2"]=='D')
                  {
                      $acumdeb= $acumdeb + $arrasientos[$i]["3"];
                  }
                  else
                  {
                        $acumcre= $acumcre + $arrasientos[$i]["3"];
                  }
                }
                $i++;
          }
          if (H::toFloat($acumdeb)!=H::toFloat($acumcre))
          {
             $msj3=519;
              return false;
          }
          
       return true;
   }

    public static function Generar_Comprobante_Contable(&$recepcion,$arrasientos,$acumdeb,$pos)
    {
        $reftra="R".substr($recepcion->getRcpart(),2,7);
        $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
        {
          $numerocomprob= $reftra;
        }else $numerocomprob= Comprobante::Buscar_Correlativo($recepcion->getFecrcp());


        $contabc = new Contabc();
        $contabc->setNumcom($numerocomprob);
        $contabc->setReftra($reftra);
        $contabc->setFeccom($recepcion->getFecrcp());
        $contabc->setDescom("RECEP. S/FACT. ".$recepcion->getDesrcp());
        $contabc->setStacom('D');
        $contabc->setTipcom('ALM');
        $contabc->setMoncom($recepcion->getMonrcp());
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $contabc->setLoguse($loguse);
        $contabc->save();
        
        if ($pos!=0)
        {
          $i=0;
          while ($i<=($pos-1))
          {
                if ($arrasientos[$i]["2"]!="")
                {
                  $contabc1= new Contabc1();
                  $contabc1->setNumcom($numerocomprob);
                  $contabc1->setFeccom($recepcion->getFecrcp());
                  $contabc1->setCodcta($arrasientos[$i]["0"]);
                  $numasi= $i +1;
                  $contabc1->setNumasi($numasi);
                  $contabc1->setRefasi($reftra);
                  $contabc1->setDesasi($arrasientos[$i]["1"]);
                  if ($arrasientos[$i]["2"]=='D')
                  {
                        $contabc1->setDebcre('D');
                        $contabc1->setMonasi($arrasientos[$i]["3"]);
                  }
                  else
                  {
                        $contabc1->setDebcre('C');
                        $contabc1->setMonasi($arrasientos[$i]["3"]);
                  }
                  $contabc1->save();
                }
                $i++;
          }
          
          $recepcion->setNumcom($numerocomprob);  //actualizo el numero de comprobante en la recepcion
          $recepcion->save();
        }
    return true;
    }
    
    public static function buscarDetalleOC($ordcom,$refpda,&$arreglo)
    {
        $arreglo=array();
        $t= new Criteria();
        $t->add(CaartordPeer::ORDCOM,$ordcom);
        $resul=CaartordPeer::doSelect($t);
        if ($resul)
        {
            foreach ($resul as $objdetord)
            {
                $p= new Criteria();
                $p->add(CadetpdaPeer::REFPDA,$refpda);
                $p->add(CadetpdaPeer::ORDCOM,$ordcom);
                $p->add(CadetpdaPeer::CODART,$objdetord->getCodart());
                $resul2= CadetpdaPeer::doSelect($p);
                if ($resul2)
                {
                    foreach ($resul2 as $objdetpda)
                    {
                        $h= new Criteria();
                        $h->add(CaalmpdaPeer::REFPDA,$refpda);
                        $h->add(CaalmpdaPeer::ID_REG,$objdetpda->getId());
                        $h->add(CaalmpdaPeer::CODART,$objdetpda->getCodart());
                        $resul3= CaalmpdaPeer::doSelect($h);
                        if ($resul3)
                        {
                            /*$pos=self::posicion_en_el_grid($arreglo,$resul3->getCodart(),$resul3->getCandis(),$resul3->getCodalm(),$resul3->getCodubi());
                            if ($pos==0)
                            {*/
                            foreach ($resul3 as $objdis) {
                             $j=count($arreglo)+1;
                             $arreglo[$j-1]["codart"]=$objdis->getCodart();
                             $arreglo[$j-1]["desart"]=Herramientas::getX('CODART','Caregart','Desart',$objdis->getCodart());
                             $arreglo[$j-1]["canrecgri"]=number_format($objdis->getCandis(),2,',','.');
                             $arreglo[$j-1]["canfal"]="0,00";
                             $arreglo[$j-1]["candev"]="0,00";
                             $arreglo[$j-1]["preart"]=number_format($objdetord->getPreart(),2,',','.');
                             $arreglo[$j-1]["dtoart"]=number_format($objdetord->getDtoart(),2,',','.');
                             $arreglo[$j-1]["rgoart"]=number_format($objdetord->getRgoart(),2,',','.');
                             $cal=H::toFloat($arreglo[$j-1]["canrecgri"])*$objdetord->getPreart()-$objdetord->getDtoart()+$objdetord->getRgoart();
                             $arreglo[$j-1]["montot"]=number_format($cal,2,',','.');
                             $arreglo[$j-1]["codcat"]=$objdetord->getCodcat();
                             $arreglo[$j-1]["codfal"]="";
                             $arreglo[$j-1]["fecest"]=$objdetpda->getFecent();
                             $arreglo[$j-1]["canord"]=number_format($objdis->getCandis(),2,',','.');
                             $arreglo[$j-1]["codalm"]=$objdis->getCodalm();
                             $arreglo[$j-1]["nomalm"]=Herramientas::getX('CODALM','cadefalm','Nomalm', $arreglo[$j-1]["codalm"]);
                             $arreglo[$j-1]["codubi"]=$objdis->getCodubi();
                             $arreglo[$j-1]["nomubi"]=Herramientas::getX('CODUBI','cadefubi','Nomubi',$objdis->getCodubi());
                             $arreglo[$j-1]["id"]="9";
                            }
                            /*}
                            else
                            {
                              $valor=H::toFloat($arreglodet[$pos-1]["canrecgri"]);
                              $arreglo[$pos-1]["canrecgri"]=number_format(($valor+$result[$i]["canrecgri"]),2,',','.');
                              $arreglo[$pos-1]["canrecgrireal"]=number_format(($valor+$result[$i]["canrecgrireal"]),2,',','.');
                            }*/
                        }
                    }
                }
            }
        }
        
    }
    
  public static function posicion_en_el_grid($arreglo,$codigo,$can,$codalm,$codubi)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
        if ($arreglo[$ind]["codart"]==$codigo  && $refere[$ind+1]==$referencia)
        { 
            $enc=true;
            
        }
      
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

  /*********************************Versiones2*********************************/

      public static function salvarAlmrec2($recepcion,$grid){
     $msj=-1;

      $gencom=H::getConfApp2('gencom', 'compras', 'almordrec');
      if ($gencom=='S' && (!$recepcion->getId()))
      {
        if (!self::generarasientos($recepcion,$grid,$arrasientos,$acumdeb,$pos,$msj3))
           {
               return $msj3;
           }else {
                self::Grabar_Recepcion2($recepcion,$grid);
                self::Generar_Comprobante_Contable($recepcion,$arrasientos,$acumdeb,$pos);
           }
      }
      else {
          self::Grabar_Recepcion2($recepcion,$grid);
      }

      return $msj;
    }

/**
	 * Función para Registrar Recepciones
	 *
	 * @static
	 * @param $recepcion Object Recepcion a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Grabar_Recepcion2($recepcion,$grid){
      $tiecorr=false;
      if (Herramientas::getVerCorrelativo('correc','cacorrel',$r))
      {
        if ($recepcion->getRcpart()=='########')
        {
                $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $sql="select rcpart from Carcpart where rcpart='".$numero."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
                $r=$r+1;
          }
          else
          {
                $encontrado=true;
          }
        }
        $tiecorr=true;
        $recepcion->setRcpart(str_pad($r, 8, '0', STR_PAD_LEFT));
        }

	  //Se graba la Recepcion
	   $recepcion->save();

	  // Se graban los articulos dela recepcion
	  self::Grabar_RecepcionArticulos2($recepcion,$grid);
	  if ($tiecorr) Herramientas::getSalvarCorrelativo('correc','cacorrel','Recepcion',$r,$msg);
	  if (self::Actualizar_Articulos2($recepcion,$grid,$msj))
	  {
    	    self::Actualizar_ArticulosOrden2($recepcion,$grid);
	  }
     }
    }

/**
	 * Función para registrar el despacho de los articulos
	 *
	 * @static
	 * @param $recepcion Object Despacho a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Grabar_RecepcionArticulos2($recepcion,$grid)
    {
        $codrec=$recepcion->getRcpart();
        $ordcom=$recepcion->getOrdcom();
        $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
        $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
        $x=$grid[0];
        $j=0;

        while ($j<count($x))
        {
            //marcado como articulo cerrado para recepcion
            $marcado= $x[$j]->getCerart();
            if ($marcado!=1 and $x[$j]->getCanrecgri()>0)
            {
                $detalle = new Caartrcp();
                $detalle->setRcpart($codrec);
                $detalle->setCodart($x[$j]->getCodart());
                $detalle->setDesart($x[$j]->getDesart());
                $detalle->setOrdcom($ordcom);
                $detalle->setCanrec($x[$j]->getCanrecgri());
                $detalle->setCandev($x[$j]->getCandev());
                $detalle->setCantot($x[$j]->getCanord());
                $detalle->setMondes($x[$j]->getDtoart());
                $detalle->setMonrgo($x[$j]->getRgoart());
                $detalle->setMontot($x[$j]->getCanord()*($x[$j]->getPreart()-$x[$j]->getMonrgo()));
                $detalle->setCodcat($x[$j]->getCodcat());
                $detalle->setCodalm($x[$j]->getCodalm());
                $detalle->setCodubi($x[$j]->getCodubi());
                $detalle->setCodunimed($x[$j]->getCodunimed());
                if ($manartlot=='S')
                    $detalle->setNumlot($x[$j]->getNumlot());
                if (trim($x[$j]->getFecest())!='') $detalle->setFecest($x[$j]->getFecest());
                if (trim($x[$j]->getCodfal())!='') $detalle->setCodfal($x[$j]->getCodfal());
                if (trim($x[$j]->getSerial())!='') $detalle->setSerial($x[$j]->getSerial());
                if (trim($x[$j]->getMarca())!='') $detalle->setMarca($x[$j]->getMarca());
                if (trim($x[$j]->getModelo())!='') $detalle->setModelo($x[$j]->getModelo());
                $detalle->save();
            }

            if ($marcado == 1)
            {
                $c = new Criteria();
                $c->add(FaartordPeer::ORDCOM,$ordcom);
                $c->add(FaartordPeer::CODART,$x[$j]->getCodart());
                if ($claartdes=='S') $c->add(FaartordPeer::DESART,trim($x[$j]->getDesart()));
                $per = FaartordPeer::doSelectOne($c);
                if ($per){
                    $per->setCerart('C');
                    $per->save();
                }
            }
        $j++;
        }
    }


/**
	 * Función para  Actualizar los articulos
	 *
	 * @static
	 * @param $recepcion Object Despacho a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Actualizar_Articulos2($recepcion,$grid,&$msj)
    {
         // $calmacen=$recepcion->getCodalm();
         // $cubicacion=$recepcion->getCodubi();
         $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
         $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
	      $x=$grid[0];
		  $j=0;
                  $acumcanrec=0;
		  while ($j<count($x))
		  {
		    $codarti=$x[$j]->getCodart();
		    $dart=$x[$j]->getDesart();
		    $cantd=$x[$j]->getCanrecgri();
		    $costo=$x[$j]->getCosart();
		    $marcado= $x[$j]->getCerart();
		    $calmacen=$x[$j]->getCodalm();
		    $cubicacion=$x[$j]->getCodubi();
                    if ($manartlot=='S')
                        $numlot=$x[$j]->getNumlot();
		    if (($codarti!="") and ($cantd>0) and ($marcado!=1))
		     {
		  	   $c = new Criteria();
		  	   $c->add(CaregartPeer::CODART,$codarti);
		       $arti = CaregartPeer::doSelectOne($c);
		        if ($arti)
		        {
		    	  $tipoart=$arti->getTipo();
                          $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
                          if ($manunialt=='S')
                          {
                              if ($x[$j]->getCodunimed()!="")
                              {
                                 if ($x[$j]->getCodunimed()!=$arti->getCodunimed())
                                 {
                                     $k= new Criteria();
                                     $k->add(CaunialartPeer::CODART,$codarti);
                                     $k->add(CaunialartPeer::CODUNIMED,$x[$j]->getCodunimed());
                                     $result3= CaunialartPeer::doSelectOne($k);
                                     if ($result3)
                                     {
                                         $cantd=$cantd/$result3->getRelart();
                                     }
                                 }
                              }else {
                                 $r= new Criteria();
                                 $r->add(FaartordPeer::ORDCOM,$recepcion->getOrdcom());
                                 $r->add(FaartordPeer::CODART,$codarti);
                                 if ($claartdes=='S') $r->add(FaartordPeer::DESART,trim($dart));
                                 $result= FaartordPeer::doSelectOne($r);
                                 if ($result)
                                 {
                                     if ($result->getDesunimed()!=$arti->getUnimed())
                                     {
                                         if ($arti->getUnialt()!="" && $arti->getRelart()!="" && $result->getUnimed()==$arti->getUnialt())
                                         {
                                            $cantd=$cantd*$arti->getRelart();
                                         }
                                         $k= new Criteria();
                                         $k->add(CaunialartPeer::CODART,$codarti);
                                         $k->add(CaunialartPeer::UNIALT,$result->getUnimed());
                                         $result3= CaunialartPeer::doSelectOne($k);
                                         if ($result3)
                                         {
                                             $cantd=$cantd*$result3->getRelart();
                                         }
                                     }
                                 }
                              }
                          }


		    	   if ($tipoart=='A')
		    	   {
		    	     $act1=$arti->getExitot() + $cantd;
		       	     $arti->setExitot($act1);
                             $c = new Criteria();
                             $c->add(CaartalmubiPeer::CODART,$codarti);
                             $c->add(CaartalmubiPeer::CODALM,$calmacen);
                             $c->add(CaartalmubiPeer::CODUBI,$cubicacion);
                             if ($manartlot=='S')
                                 $c->add(CaartalmubiPeer::NUMLOT,$numlot);
                             $alm = CaartalmubiPeer::doSelectOne($c);
                             if ($alm)
                             {
                                  $act2=$alm->getExiact() + $cantd;
                                  $alm->setExiact($act2);
                                  $alm->save();
                                  $c = new Criteria();
                                  $c->add(CaregartPeer::CODART,$codarti);
                                  $arti = CaregartPeer::doSelectOne($c);
                                  if ($arti)
                                  {
                                         $act1=$arti->getExitot() + $cantd;
                                         $dis1=$arti->getDistot() + $cantd;
                                         $arti->setExitot($act1);
                                         $arti->setDistot($dis1);
                                         $arti->setCosult($costo);
                                         $arti->save();
                                   }
                            }// if ($alm)
                            else {
                                if ($manartlot=='S')
                                {
                                      $caartalmubi= new Caartalmubi();
                                      $caartalmubi->setCodart($codarti);
                                      $caartalmubi->setCodalm($calmacen);
                                      $caartalmubi->setCodubi($cubicacion);
                                      $caartalmubi->setExiact($cantd);
                                      $caartalmubi->setNumlot($numlot);
                                      $caartalmubi->save();
                                }
                            }
                                 $c = new Criteria();
		  	         $c->add(CaartalmPeer::CODART,$codarti);
		  	         $c->add(CaartalmPeer::CODALM,$calmacen);
                                 $reg = CaartalmPeer::doSelectOne($c);
                                  if ($reg)
                                  {
                                          $act2=$reg->getExiact() + $cantd;
                                          $reg->setExiact($act2);
                                          $reg->save();
                                   }
		            }// if ($tipoart='A')
		       	      $arti->setCosult($costo);



		              if ($arti->getExitot()== 0)
		              {
		                   $arti->setCospro($costo);
		              }
		              else
		              {
		                   $costocal = (($cantd * $costo) + ($costo * ($arti->getExitot()- $cantd))) / $arti->getExitot();
                           $arti->setCospro($costocal);
		              }
		              $arti->save();

                              $manforent=H::getConfApp2('manforent', 'compras', 'almordcom');
                              if ($manforent=='S')
                              {
                                  $t= new Criteria();
                                  $t->add(CaentordPeer::ORDCOM,$recepcion->getOrdcom());
                                  $t->add(CaentordPeer::CODART,$codarti);
                                  $t->add(CaentordPeer::CODALM,$recepcion->getCodalm());
                                  $dat= CaentordPeer::doSelectOne($t);
                                  if ($dat)
                                  {
                                      $dat->setCanrec($dat->getCanrec()+$cantd);
                                      $dat->save();
                                  }
                              }
		         }
		      }//  if (($codarti!="") and ($cantd>0) and ($marcado!=1))
		    $j++;
		  }


     return true;
   }

/**
	 * Función para Actualizar los articulos por Orden
	 *
	 * @static
	 * @param $recepcion Object Despacho a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Actualizar_ArticulosOrden2($recepcion,$grid){
        $codrec=$recepcion->getRcpart();
        $ordcom=$recepcion->getOrdcom();
        $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');


        $x=$grid[0];
        $j=0;
        while ($j<count($x)) {
            $codarti=$x[$j]->getCodart();
            $cantd=$x[$j]->getCanrecgri();
            $codcat=$x[$j]->getCodcat();
            $marcado= $x[$j]->getCerart();
            if (($codarti!="") and ($cantd>0) and ($marcado!=1))
            {
                $c = new Criteria();
                $c->add(FaartordPeer::ORDCOM,$ordcom);
                $c->add(FaartordPeer::CODART,$codarti);
                $ordarti = FaartordPeer::doSelectOne($c);
                if ($ordarti)
                {
                    $act3=$ordarti->getCanrec() + $cantd;
                    $ordarti->setCanrec($act3);
                    $ordarti->save();
                }
            }// if (($codarti!="") and ($cantd>0) and ($marcado!=1))
            $j++;
        }
    }

    public static function eliminarAlmrec2($recepcion,&$msg)
   {
      $msg="";
      if (self::eliminarRecepcion2($recepcion,$msg))
			return true;
      else
			return false;
   }

  public static function eliminarRecepcion2($recepcion,&$msg)
   {
   	if (self::ValidaEliminaRec($recepcion,$msg))
   	{
             self::devolverArticulos2($recepcion);
	     self::devolverArticulosOrCom2($recepcion);
	     self::eliminarRecepcionArticulos($recepcion);
             $gencom=H::getConfApp2('gencom', 'compras', 'almordrec');
             if ($gencom=='S')
             {
                 Herramientas::EliminarRegistro('Contabc1','Numcom',$recepcion->getNumcom());
                 Herramientas::EliminarRegistro('Contabc','Numcom',$recepcion->getNumcom());
             }

	     $recepcion->delete();

	     return true;
   	}
   	else
   	{
   		return false;
   	}
   }

   public static function devolverArticulosOrCom2($recepcion)
   {
        $codrec=$recepcion->getRcpart();
        $ordcom=$recepcion->getOrdcom();
        $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');

        $c= new Criteria();
        $c->add(CaartrcpPeer::RCPART,$codrec);
        $detalle= CaartrcpPeer::doselect($c);
        foreach ($detalle as $arreglo)
        {
            $codart=$arreglo->getCodart();
            $canrec=$arreglo->getCanrec();
            $codcat=$arreglo->getCodcat();

            $c = new Criteria();
            $c->add(FaartordPeer::ORDCOM,$ordcom);
            $c->add(FaartordPeer::CODART,$codart);
            $datos = FaartordPeer::doSelectOne($c);
            if ($datos)
            {
            $cuenta3=$datos->getCanrec() - $canrec;
            if ($cuenta3==0) $cuenta3="0,00";
            $datos->setCanrec($cuenta3);
            $datos->save();
            }
        }
   }

    public static function devolverArticulos2($recepcion)
    {
        $codrec=$recepcion->getRcpart();
        $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
        //$codalmacen=$recepcion->getCodalm();
        //$codubicacion=$recepcion->getCodubi();
        $c= new Criteria();
        $c->add(CaartrcpPeer::RCPART,$codrec);
        $detalle= CaartrcpPeer::doselect($c);
        foreach ($detalle as $arreglo)
        {
            $codarticulo=$arreglo->getCodart();
            $cantrec=$arreglo->getCanrec();
            $codalmacen=$arreglo->getCodalm();
            $codubicacion=$arreglo->getCodubi();
            if ($manartlot=='S')
                $numlot=$arreglo->getNumlot();
            if ($codarticulo!="" and $cantrec>0)
            {
                $c = new Criteria();
                $c->add(CaregartPeer::CODART,$codarticulo);
                $articulo = CaregartPeer::doSelectOne($c);
                if ($articulo)
                {
                    if($articulo->getTipo()=='A')
                    {
                        if($arreglo->getCodunimed()!=$articulo->getCodunimed())
                        {
                            $k= new Criteria();
                            $k->add(CaunialartPeer::CODART,$codarticulo);
                            $k->add(CaunialartPeer::CODUNIMED,$arreglo->getCodunimed());
                            $result= CaunialartPeer::doSelectOne($k);
                            if ($result)
                                $cantrec=$cantrec/$result->getRelart();
                        }
                        if (($articulo->getExitot() - $cantrec) >= 0)
                        {
                            $cuenta=$articulo->getExitot() - $cantrec;
                            $articulo->setExitot($cuenta);
                            $articulo->save();
                        }
                        //actualizo almacen
                        $c = new Criteria();
                        $c->add(CaartalmubiPeer::CODART,$codarticulo);
                        $c->add(CaartalmubiPeer::CODALM,$codalmacen);
                        $c->add(CaartalmubiPeer::CODUBI,$codubicacion);
                        if ($manartlot=='S')
                            $c->add(CaartalmubiPeer::NUMLOT,$numlot);
                        $alm = CaartalmubiPeer::doSelectOne($c);
                        if ($alm)
                        {
                            if (($alm->getExiact() - $cantrec) >= 0)
                            {
                                $cuenta2=$alm->getExiact() - $cantrec;
                                $alm->setExiact($cuenta2);
                                $alm->save();
                            }
                        }// if ($alm)

                        $c = new Criteria();
                        $c->add(CaartalmPeer::CODART,$codarticulo);
                        $c->add(CaartalmPeer::CODALM,$codalmacen);
                        $datos = CaartalmPeer::doSelectOne($c);
                        if ($datos)
                        {
                            if (($datos->getExiact() - $cantrec) >= 0)
                            {
                                $cuenta2=$datos->getExiact() - $cantrec;
                                $datos->setExiact($cuenta2);
                                $datos->save();
                            }
                        } //if ($datos)
                    }//  if($articulo->getTipo()=='A')
                }//if ($articulo)
            }// 	if ($codarticulo!="" and $cantrec>0)
        }//foreach ($detalle as $arreglo)
    }
}
?>