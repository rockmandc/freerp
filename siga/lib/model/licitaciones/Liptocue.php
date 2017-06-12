<?php

/**
 * Subclase para representar una fila de la tabla 'liptocue'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Liptocue extends BaseLiptocue
{
    public function getNomempeje()
    {
        return H::getX('Codemp','Lidatstedet','Nomemp',$this->codempeje);
    }

    public function getNomcareje()
    {
        return H::getX('Codemp','Lidatstedet','Nomcar',$this->codempeje);
    }

    public function getDesuniste()
    {
        return H::getX('Coduniste','Lidatste','Desuniste',$this->coduniste);
    }

    public function getDirunieje()
    {
        return H::getX('Coduniste','Lidatste','Dirste',$this->coduniste);
    }

    public function getNomempadm()
    {
        return H::getX('Codemp','lidatstedet','Nomemp',$this->codempadm);
    }

    public function getNomcaradm()
    {
        return H::getX('Codemp','lidatstedet','Nomcar',$this->codempadm);
    }

    public function getDesuniadm()
    {
        return H::getX('Coduniste','lidatste','Desuniste',$this->coduniadm);
    }

    public function getDesclacomp()
    {
        return H::getX('Codclacomp','Occlacomp','Desclacomp',H::getX('Numpre','Liprebas','Codclacomp',$this->numpre));
    }

    public function getEjepre()
    {
      $sql="select to_char(fecini,'yyyy') as anofis from contaba";
      if(H::BuscarDatos($sql, $rs))
         return $rs[0]['anofis'];
      else
         return '';
    }

    public function getEnte()
    {
      $sql="select nomemp from Lidefemp";
      if(H::BuscarDatos($sql, $rs))
         return $rs[0]['nomemp'];
      else
         return '';
    }

    public function getPai()
    {
        return H::getX('Codpai','Ocpais','Nompai',H::getX('Coduniste','Lidatste','Codpai',$this->coduniste));
    }

    public function getEdo()
    {
        return H::getX('Codedo','Ocestado','Nomedo',H::getX('Coduniste','Lidatste','Codedo',$this->coduniste));
    }

    public function getMun()
    {
        return H::getX('Codmun','Ocmunici','Nommun',H::getX('Coduniste','Lidatste','Codmun',$this->coduniste));
    }

    public function getPar()
    {
        return H::getX('Codpar','Ocparroq','Nompar',H::getX('Coduniste','Lidatste','Codpar',$this->coduniste));
    }

    public function getSec()
    {
        return H::getX('Codsec','Ocsector','Nomsec',H::getX('Coduniste','Lidatste','Codsec',$this->coduniste));
    }
    
    public function getTipcom()
    {
        $val = H::GetX('Numpre','Liprebas','Tipcom',$this->numpre);
        return $val=='N' ? 'NACIONAL' : ($val=='I' ? 'INTERNACIONAL' : '' );
    }

    public function getTipcon()
    {
        $val = H::GetX('Numpre','Liprebas','Tipcon',$this->numpre);
        return $val=='B'  ? 'BIENES' : ( $val=='S' ? 'SERVICIO' : '' );
    }

    public function getActo()
    {
        $val = H::GetX('Numpre','Liprebas','Acto',$this->numpre);
        return $val=='S' ? 'SI' : ( $val=='S' ? 'NO' : '');
    }

    public function getNompre()
    {
        return H::getX('Codpre','Cpdeftit','Nompre',H::getX('Numpre','Liprebas','Codpre',$this->numpre));
    }

    public function getDesprio()
    {
        return H::getX('Codprio','Lipriocon','Desprio',H::getX('Numpre','Liprebas','Codprio',$this->numpre));
    }

    public function getMonpre()
    {
        $val = H::getX('Numpre','Liprebas','Monpre',$this->numpre);
        return   H::obtenermontoescrito($val).' ( '.H::FormatoMonto($val).' ) ';

    }

    public function getMonpreext()
    {
        $monpre = H::getX('Numpre','Liprebas','monpre',$this->numpre);
        $val = H::getX('Numpre','Liprebas','valcam',$this->numpre);
        if($val>0)
            $monpre = $monpre/$val;

        return   H::obtenermontoescrito($monpre).' ( '.H::FormatoMonto($monpre).' ) ';

    }
    
    public function getNomext()
    {
        $codfin = H::getX('Numpre','Liprebas','Codfin',$this->numpre);
        return H::getX('Codfin','Fortipfin','Nomext',$codfin);
    }
}
