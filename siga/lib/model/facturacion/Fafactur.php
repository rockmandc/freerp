<?php
/**
 * Subclass for representing a row from the 'fafactur'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fafactur.php 61842 2015-04-30 20:27:34Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

class Fafactur extends BaseFafactur {
    protected $obj1 = array();
    protected $obj2 = array();
    protected $obj3 = array();
    protected $obj4 = array();
    protected $obj5 = array();
    protected $obj6 = array();
    protected $incluircliente = "N";
    protected $rifpro = "";
    protected $nompro = "";
    protected $telpro = "";
    protected $dirpro = "";
    protected $tipper = "";
    protected $desconpag = "";
    protected $monto = "0,00";
    protected $monrgo = "0,00";
    protected $moncan = "0,00";
    protected $monres = "0,00";
    protected $tipconpag = "";
    protected $usuarios = "";
    protected $password = "";
    protected $tipo = "";
    protected $apliclades = "";
    protected $combo = "";
    protected $docrefiera = "";
    protected $ctacli = "";
    protected $tipocliente = "";
    protected $limitecredito = "";
    protected $totcanpreart = "0,00";
    protected $esretencion = "";
    protected $tottotart = "0,00";
    protected $totmonrgo = "0,00";
    protected $monedaanterior = "";
    protected $totdesc = "0,00";
    protected $totrec = "0,00";
    protected $trajo = "";
    protected $porcentajedescto = "0";
    protected $totprecio = "0,00";
    protected $lonart = "";
    protected $rgofijos = "";
    protected $listaart = "";
    protected $ctasociada = "S";
    protected $estatus = "";
    protected $despnotent = "";
    protected $codtip = "";
    protected $destip = "";
    protected $filgenmov = "";
    protected $mansolcor = "";
    protected $marrec = "";
    protected $desrec = "";
    protected $gridfaclib = "";
    protected $mancatdes = "";
    protected $notacredito = "";
    protected $numfilas = 1;
    protected $checkent = "";
    protected $filactrec = "";
    protected $filactdes = "";
    protected $fecemides = "";
    protected $fecemihas = "";
    protected $descli = "";
    protected $ajucal = "";
    protected $fecdes = "";
    protected $fechas = "";
    protected $tipcte = "";
    protected $concre = "";
    protected $codprg = "";
    protected $tipoped = "";
    protected $codalm = ""; 
    protected $tierecar=""; 
    protected $porped = "0,00";
    protected $codalmcaj = ""; 
    protected $esprecon='N';
    //protected $fecper1 = ""
    //protected $fecper2 = "";

    public function afterHydrate()
    {
        $e= new Criteria();
        $e->add(FaclientePeer::CODPRO,self::getCodcli());
        $result= FaclientePeer::doSelectOne($e);
        if ($result)
        {
            $this->rifpro=$result->getRifpro();
            $this->nompro=$result->getNompro();
            $this->tipper=$result->getTipper();
            $this->telpro=$result->getTelpro();
            $this->dirpro=$result->getDirpro();
            $this->limitecredito=$result->getLimcre();
        }else {
            $e= new Criteria();
            $e->add(FaclientePeer::RIFPRO,$this->rifpro);
            $result= FaclientePeer::doSelectOne($e);
            if ($result)
            {
                $this->rifpro=$result->getRifpro();
                $this->nompro=$result->getNompro();
                $this->tipper=$result->getTipper();
                $this->telpro=$result->getTelpro();
                $this->dirpro=$result->getDirpro();
                $this->limitecredito=$result->getLimcre();
            }
        }

        $f= new Criteria();
        $f->add(FaconpagPeer::ID,self::getCodconpag());
        $result2= FaconpagPeer::doSelectOne($f);
        if ($result2)
        {
            $this->desconpag=$result2->getDesconpag();
            $this->tipconpag=$result2->getTipconpag();
        }

        if (self::getCodcaj())
            $this->codalmcaj=H::getX_vacio('ID','Fadefcaj','Codalm',self::getCodcaj());
    }


    /*public function getRifpro() {
        
        return Herramientas::getX('CODPRO', 'Facliente', 'Rifpro', self::getCodcli());
    }
    public function getNompro() {
        
        return Herramientas::getX('CODPRO', 'Facliente', 'Nompro', self::getCodcli());
    }
    public function getTipper() {
        
        return Herramientas::getX('CODPRO', 'Facliente', 'Tipper', self::getCodcli());
    }
    public function getTelpro() {
        
        return Herramientas::getX('CODPRO', 'Facliente', 'Telpro', self::getCodcli());
    }
    public function getDirpro() {
        
        return Herramientas::getX('CODPRO', 'Facliente', 'Dirpro', self::getCodcli());
    }
    public function getLimitecredito() {
        
        return Herramientas::getX('CODPRO', 'Facliente', 'Limcre', self::getCodcli());
    }
    public function getDesconpag() {
        
        return Herramientas::getX('ID', 'Faconpag', 'Desconpag', self::getCodconpag());
    }
    public function getTipconpag() {
        
        return Herramientas::getX('ID', 'Faconpag', 'Tipconpag', self::getCodconpag());
    }*/
    public function getRefproform() {
        $nomarpro=H::getConfApp('nomarpro', 'facturacion', 'fafactur');
        $c = new Criteria();
        $per = FacorrelatPeer::doSelectOne($c);
        if ($per) {
            if ($per->getProform() == 'S' && $nomarpro!='S') 
            return true;
            else 
            return false;
        }
    }
    public function getNumcom() {
        if ($this->numcom == '' && $this->id != '') {
            
            return H::getX_vacio('Reftra', 'Contabc', 'Numcom', 'FA' . substr($this->reffac, 2));
        }
        
        return $this->numcom;
    }
    public function getMansolcor() {
        $dato = "";
        $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
        if ($varemp) if (array_key_exists('aplicacion', $varemp)) if (array_key_exists('facturacion', $varemp['aplicacion'])) if (array_key_exists('modulos', $varemp['aplicacion']['facturacion'])) if (array_key_exists('fafactur', $varemp['aplicacion']['facturacion']['modulos'])) {
            if (array_key_exists('mansolcor', $varemp['aplicacion']['facturacion']['modulos']['fafactur'])) {
                $dato = $varemp['aplicacion']['facturacion']['modulos']['fafactur']['mansolcor'];
            }
        }
        
        return $dato;
    }
    public function setMansolcor() {
        
        return $this->mansolcor;
    }
    public function getGridfaclib() {
        $dato = "";
        $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
        if ($varemp) if (array_key_exists('aplicacion', $varemp)) if (array_key_exists('facturacion', $varemp['aplicacion'])) if (array_key_exists('modulos', $varemp['aplicacion']['facturacion'])) if (array_key_exists('fafactur', $varemp['aplicacion']['facturacion']['modulos'])) {
            if (array_key_exists('gridfaclib', $varemp['aplicacion']['facturacion']['modulos']['fafactur'])) {
                $dato = $varemp['aplicacion']['facturacion']['modulos']['fafactur']['gridfaclib'];
            }
        }
        
        return $dato;
    }
    public function setGridfaclib() {
        
        return $this->gridfaclib;
    }
    public function getMancatdes() {
        $dato = "";
        $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
        if ($varemp) if (array_key_exists('aplicacion', $varemp)) if (array_key_exists('facturacion', $varemp['aplicacion'])) if (array_key_exists('modulos', $varemp['aplicacion']['facturacion'])) if (array_key_exists('fafactur', $varemp['aplicacion']['facturacion']['modulos'])) {
            if (array_key_exists('mancatdes', $varemp['aplicacion']['facturacion']['modulos']['fafactur'])) {
                $dato = $varemp['aplicacion']['facturacion']['modulos']['fafactur']['mancatdes'];
            }
        }
        
        return $dato;
    }
    public function setMancatdes() {
        
        return $this->mancatdes;
    }
    public function getDesubi() {
        
        return Herramientas::getX_vacio('CODUBI', 'Bnubica', 'Desubi', self::getCodubi());
    }
    public function getDescenaco() {
        
        return Herramientas::getX_vacio('Codcenaco', 'Cadefcenaco', 'Descenaco', self::getCodcenaco());
    }
    public function getNumfilas() {
        $dato = 1;
        $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
        if ($varemp) if (array_key_exists('aplicacion', $varemp)) if (array_key_exists('facturacion', $varemp['aplicacion'])) if (array_key_exists('modulos', $varemp['aplicacion']['facturacion'])) if (array_key_exists('fafactur', $varemp['aplicacion']['facturacion']['modulos'])) {
            if (array_key_exists('numfilas', $varemp['aplicacion']['facturacion']['modulos']['fafactur'])) {
                $dato = $varemp['aplicacion']['facturacion']['modulos']['fafactur']['numfilas'];
            }
        }
        
        return $dato;
    }
    public function setNumfilas() {
        
        return $this->numfilas;
    }
    public function getNombuq() {
        
        return Herramientas::getX_vacio('Codbuq', 'Fatipbuq', 'Nombuq', self::getBuque());
    }
    public function getNompue() {
        
        return Herramientas::getX_vacio('Codpue', 'Fatippue', 'Nompue', self::getPuedph());
    }
    public function getNompue2() {
        
        return Herramientas::getX_vacio('Codpue', 'Fatippue', 'Nompue', self::getPuedes());
    }
    public function getValmon($val = false) {
        if ($val) 
        return number_format($this->valmon, 6, ',', '.');
        else 
        return $this->valmon;
    }
    public function setValmon($v) {
        if ($this->valmon !== $v) {
            $this->valmon = Herramientas::toFloat($v, 6);
            $this->modifiedColumns[] = FafacturPeer::VALMON;
        }
    }
    public function getIdrefer() {
        
        return Herramientas::getX_vacio('numcom', 'contabc', 'id', self::getNumcom());
    }
    public function getTipcte() {
        if (self::getId()) 
        return $this->getFacliente()->getFatipcte()->getNomtipcte();
        else 
        return '';
    }
    public function getCodtipcli() {
        if (self::getId()) 
        return $this->getFacliente()->getFatipcteId();
        else 
        return '';
    }
    public function getDesalm() {
        
        return Herramientas::getX_vacio('CODALM', 'Cadefalm', 'Nomalm', $this->codalm);
    }

    public function Despachada()
    {
        $c = new Criteria();
        $c->add(CadphartPeer::REQART, $this->reffac);
        $count = CadphartPeer::doSelectOne($c);
        if($count) return true;
        else false;
    }
    public function Ajustada()
    {
        $c = new Criteria();
        $c->add(FaajustePeer::CODREF, $this->reffac);
        $count = FaajustePeer::doSelectOne($c);
        if($count) return true;
        else false;
    }

    public function getManporped()
    {
      return H::getConfApp2('manporped', 'facturacion', 'fafactur');
    }

    public function getManprecon()
    {
      return H::getConfApp2('manprecon', 'facturacion', 'fafactur');
    }

    public function getAfeinvfac()
    {
      return H::getConfApp2('afeinvfac', 'facturacion', 'fafactur');
    }

    public function getDespropat() {        
        return Herramientas::getX_vacio('CODPROPAT', 'Fapropat', 'Despropat', $this->codpropat);
    } 

    public function getDesprorad() {        
        return Herramientas::getX_vacio('CODPRORAD', 'Faprorad', 'Desprorad', $this->codprorad);
    } 

    public function getBlonumfac() {
        $c = new Criteria();
        $per = FacorrelatPeer::doSelectOne($c);
        if ($per)            
          return $per->getBlonumfac();
        else 
          return false;        
    }   

    public function getDesprod()
    {
      return Herramientas::getX('CODPROD','Fadefpro','Desprod',self::getCodprod());
    }

    public function getNomedo(){
       $codedo=H::getX_vacio('CODPRO','Facliente','Codedo',self::getCodcli());
       $nomedo=H::getX_vacio('CODEDO','Ocestado','Nomedo',$codedo);
       return $nomedo;
    }

    public function getCalrecdes()
    {
      return H::getConfApp2('calrecdes', 'facturacion', 'fafactur');
    }    

    public function getDesdirec()
    {
        return H::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
    }    

     public function getMonfac($val=false)
  {

    if (self::getId())
    {
        $moneda=self::getTipmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->monfac/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->monfac;
    }else $calculo=$this->monfac;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function getMondesc($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getTipmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->mondesc/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->mondesc;
    }else $calculo=$this->mondesc;
    
    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }


    public function setMonfac($v)
    {

    if ($this->monfac !== $v) {
        $this->monfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturPeer::MONFAC;
      }
  
    } 
    
    public function setMondesc($v)
    {

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturPeer::MONDESC;
      }
  
    } 
         
    public function fueEnviadoImprimir()
    {
        if($this->getImpfissta()=='E') return true;
        else return false;
    }

    public function fueImpresa()
    {
        if($this->getImpfissta()=='I') return true;
        else return false;
    }

    public function fueDevuelta()
    {
        if($this->getImpfissta()=='D') return true;
        else return false;
    }

    public function huboError()
    {
        if($this->getImpfissta()=='E') return true;
        else return false;
    }

    public function updateImpfissta()
    {
        // $last_logs = $this->getLastLogImp();

        if($this->getImpfissta()!=""){
            $c = new Criteria();
            $c->add(LogsImpresorasPeer::FACTURA_ID, $this->getId());
            $c->addDescendingOrderByColumn(LogsImpresorasPeer::CREATED_AT);
            $last_logs = LogsImpresorasPeer::doSelectOne($c);
        }else {
            $last_logs = null;
        }

        if($last_logs){
            if($last_logs->getNumeroFactura()!=''){
                $this->setImpfissta("I");
            }elseif ($last_logs->getNumeroDevolucion()!='') {
                $this->setImpfissta("D");
            }elseif ($last_logs->getError()!='') {
                $this->setImpfissta("E");
            }
            $this->save();
        }else{
          // print 'fuck!!!';
        }
    }

    public function getLastLogIm()
    {
        if($this->getImpfissta()!=""){
            $c = new Criteria();
            $c->add(LogsImpresorasPeer::FACTURA_ID, $this->getId());
            $c->addDescendingOrderByColumn(LogsImpresorasPeer::CREATED_AT);
            return LogsImpresorasPeer::doSelectOne($c);
        }else {
            return null;
        }
    }
}
