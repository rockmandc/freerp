<?php


abstract class BaseLianaofe extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numanaofe;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $numofe;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $docane4;


	
	protected $prepor;


	
	protected $cargopre;


	
	protected $lisicact_id;


	
	protected $detdecmod;


	
	protected $anapor;


	
	protected $cargoana;


	
	protected $status;


	
	protected $fecdecla;


	
	protected $porleg;


	
	protected $portec;


	
	protected $porfin;


	
	protected $porfia;


	
	protected $portipemp;


	
	protected $portot;


	
	protected $tipconpub;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumanaofe()
  {

    return trim($this->numanaofe);

  }
  
  public function getNumplie()
  {

    return trim($this->numplie);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getCodempadm()
  {

    return trim($this->codempadm);

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getCodempeje()
  {

    return trim($this->codempeje);

  }
  
  public function getCoduniste()
  {

    return trim($this->coduniste);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDias()
  {

    return $this->dias;

  }
  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumofe()
  {

    return trim($this->numofe);

  }
  
  public function getDocane1()
  {

    return trim($this->docane1);

  }
  
  public function getDocane2()
  {

    return trim($this->docane2);

  }
  
  public function getDocane3()
  {

    return trim($this->docane3);

  }
  
  public function getDocane4()
  {

    return trim($this->docane4);

  }
  
  public function getPrepor()
  {

    return trim($this->prepor);

  }
  
  public function getCargopre()
  {

    return trim($this->cargopre);

  }
  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getDetdecmod()
  {

    return trim($this->detdecmod);

  }
  
  public function getAnapor()
  {

    return trim($this->anapor);

  }
  
  public function getCargoana()
  {

    return trim($this->cargoana);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getFecdecla($format = 'Y-m-d')
  {

    if ($this->fecdecla === null || $this->fecdecla === '') {
      return null;
    } elseif (!is_int($this->fecdecla)) {
            $ts = adodb_strtotime($this->fecdecla);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdecla] as date/time value: " . var_export($this->fecdecla, true));
      }
    } else {
      $ts = $this->fecdecla;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getPorleg($val=false)
  {

    if($val) return number_format($this->porleg,2,',','.');
    else return $this->porleg;

  }
  
  public function getPortec($val=false)
  {

    if($val) return number_format($this->portec,2,',','.');
    else return $this->portec;

  }
  
  public function getPorfin($val=false)
  {

    if($val) return number_format($this->porfin,2,',','.');
    else return $this->porfin;

  }
  
  public function getPorfia($val=false)
  {

    if($val) return number_format($this->porfia,2,',','.');
    else return $this->porfia;

  }
  
  public function getPortipemp($val=false)
  {

    if($val) return number_format($this->portipemp,2,',','.');
    else return $this->portipemp;

  }
  
  public function getPortot($val=false)
  {

    if($val) return number_format($this->portot,2,',','.');
    else return $this->portot;

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumanaofe($v)
	{

    if ($this->numanaofe !== $v) {
        $this->numanaofe = $v;
        $this->modifiedColumns[] = LianaofePeer::NUMANAOFE;
      }
  
	} 
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LianaofePeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LianaofePeer::NUMEXP;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LianaofePeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LianaofePeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LianaofePeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LianaofePeer::CODUNISTE;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = LianaofePeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LianaofePeer::DIAS;
      }
  
	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = LianaofePeer::FECVEN;
    }

	} 
	
	public function setNumofe($v)
	{

    if ($this->numofe !== $v) {
        $this->numofe = $v;
        $this->modifiedColumns[] = LianaofePeer::NUMOFE;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LianaofePeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LianaofePeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LianaofePeer::DOCANE3;
      }
  
	} 
	
	public function setDocane4($v)
	{

    if ($this->docane4 !== $v) {
        $this->docane4 = $v;
        $this->modifiedColumns[] = LianaofePeer::DOCANE4;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LianaofePeer::PREPOR;
      }
  
	} 
	
	public function setCargopre($v)
	{

    if ($this->cargopre !== $v) {
        $this->cargopre = $v;
        $this->modifiedColumns[] = LianaofePeer::CARGOPRE;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LianaofePeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LianaofePeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LianaofePeer::ANAPOR;
      }
  
	} 
	
	public function setCargoana($v)
	{

    if ($this->cargoana !== $v) {
        $this->cargoana = $v;
        $this->modifiedColumns[] = LianaofePeer::CARGOANA;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LianaofePeer::STATUS;
      }
  
	} 
	
	public function setFecdecla($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdecla] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdecla !== $ts) {
      $this->fecdecla = $ts;
      $this->modifiedColumns[] = LianaofePeer::FECDECLA;
    }

	} 
	
	public function setPorleg($v)
	{

    if ($this->porleg !== $v) {
        $this->porleg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaofePeer::PORLEG;
      }
  
	} 
	
	public function setPortec($v)
	{

    if ($this->portec !== $v) {
        $this->portec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaofePeer::PORTEC;
      }
  
	} 
	
	public function setPorfin($v)
	{

    if ($this->porfin !== $v) {
        $this->porfin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaofePeer::PORFIN;
      }
  
	} 
	
	public function setPorfia($v)
	{

    if ($this->porfia !== $v) {
        $this->porfia = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaofePeer::PORFIA;
      }
  
	} 
	
	public function setPortipemp($v)
	{

    if ($this->portipemp !== $v) {
        $this->portipemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaofePeer::PORTIPEMP;
      }
  
	} 
	
	public function setPortot($v)
	{

    if ($this->portot !== $v) {
        $this->portot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaofePeer::PORTOT;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LianaofePeer::TIPCONPUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LianaofePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numanaofe = $rs->getString($startcol + 0);

      $this->numplie = $rs->getString($startcol + 1);

      $this->numexp = $rs->getString($startcol + 2);

      $this->codempadm = $rs->getString($startcol + 3);

      $this->coduniadm = $rs->getString($startcol + 4);

      $this->codempeje = $rs->getString($startcol + 5);

      $this->coduniste = $rs->getString($startcol + 6);

      $this->fecreg = $rs->getDate($startcol + 7, null);

      $this->dias = $rs->getInt($startcol + 8);

      $this->fecven = $rs->getDate($startcol + 9, null);

      $this->numofe = $rs->getString($startcol + 10);

      $this->docane1 = $rs->getString($startcol + 11);

      $this->docane2 = $rs->getString($startcol + 12);

      $this->docane3 = $rs->getString($startcol + 13);

      $this->docane4 = $rs->getString($startcol + 14);

      $this->prepor = $rs->getString($startcol + 15);

      $this->cargopre = $rs->getString($startcol + 16);

      $this->lisicact_id = $rs->getInt($startcol + 17);

      $this->detdecmod = $rs->getString($startcol + 18);

      $this->anapor = $rs->getString($startcol + 19);

      $this->cargoana = $rs->getString($startcol + 20);

      $this->status = $rs->getString($startcol + 21);

      $this->fecdecla = $rs->getDate($startcol + 22, null);

      $this->porleg = $rs->getFloat($startcol + 23);

      $this->portec = $rs->getFloat($startcol + 24);

      $this->porfin = $rs->getFloat($startcol + 25);

      $this->porfia = $rs->getFloat($startcol + 26);

      $this->portipemp = $rs->getFloat($startcol + 27);

      $this->portot = $rs->getFloat($startcol + 28);

      $this->tipconpub = $rs->getString($startcol + 29);

      $this->id = $rs->getInt($startcol + 30);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 31; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lianaofe object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

  
  public function get($m, $a)
    {

      if(method_exists($this,$m)){
        $obj_fk = $this->$m();
        if($obj_fk) return $obj_fk->$a();
      } return '';
    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LianaofePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LianaofePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LianaofePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aLisicact !== null) {
				if ($this->aLisicact->isModified()) {
					$affectedRows += $this->aLisicact->save($con);
				}
				$this->setLisicact($this->aLisicact);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LianaofePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LianaofePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aLisicact !== null) {
				if (!$this->aLisicact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLisicact->getValidationFailures());
				}
			}


			if (($retval = LianaofePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LianaofePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumanaofe();
				break;
			case 1:
				return $this->getNumplie();
				break;
			case 2:
				return $this->getNumexp();
				break;
			case 3:
				return $this->getCodempadm();
				break;
			case 4:
				return $this->getCoduniadm();
				break;
			case 5:
				return $this->getCodempeje();
				break;
			case 6:
				return $this->getCoduniste();
				break;
			case 7:
				return $this->getFecreg();
				break;
			case 8:
				return $this->getDias();
				break;
			case 9:
				return $this->getFecven();
				break;
			case 10:
				return $this->getNumofe();
				break;
			case 11:
				return $this->getDocane1();
				break;
			case 12:
				return $this->getDocane2();
				break;
			case 13:
				return $this->getDocane3();
				break;
			case 14:
				return $this->getDocane4();
				break;
			case 15:
				return $this->getPrepor();
				break;
			case 16:
				return $this->getCargopre();
				break;
			case 17:
				return $this->getLisicactId();
				break;
			case 18:
				return $this->getDetdecmod();
				break;
			case 19:
				return $this->getAnapor();
				break;
			case 20:
				return $this->getCargoana();
				break;
			case 21:
				return $this->getStatus();
				break;
			case 22:
				return $this->getFecdecla();
				break;
			case 23:
				return $this->getPorleg();
				break;
			case 24:
				return $this->getPortec();
				break;
			case 25:
				return $this->getPorfin();
				break;
			case 26:
				return $this->getPorfia();
				break;
			case 27:
				return $this->getPortipemp();
				break;
			case 28:
				return $this->getPortot();
				break;
			case 29:
				return $this->getTipconpub();
				break;
			case 30:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LianaofePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumanaofe(),
			$keys[1] => $this->getNumplie(),
			$keys[2] => $this->getNumexp(),
			$keys[3] => $this->getCodempadm(),
			$keys[4] => $this->getCoduniadm(),
			$keys[5] => $this->getCodempeje(),
			$keys[6] => $this->getCoduniste(),
			$keys[7] => $this->getFecreg(),
			$keys[8] => $this->getDias(),
			$keys[9] => $this->getFecven(),
			$keys[10] => $this->getNumofe(),
			$keys[11] => $this->getDocane1(),
			$keys[12] => $this->getDocane2(),
			$keys[13] => $this->getDocane3(),
			$keys[14] => $this->getDocane4(),
			$keys[15] => $this->getPrepor(),
			$keys[16] => $this->getCargopre(),
			$keys[17] => $this->getLisicactId(),
			$keys[18] => $this->getDetdecmod(),
			$keys[19] => $this->getAnapor(),
			$keys[20] => $this->getCargoana(),
			$keys[21] => $this->getStatus(),
			$keys[22] => $this->getFecdecla(),
			$keys[23] => $this->getPorleg(),
			$keys[24] => $this->getPortec(),
			$keys[25] => $this->getPorfin(),
			$keys[26] => $this->getPorfia(),
			$keys[27] => $this->getPortipemp(),
			$keys[28] => $this->getPortot(),
			$keys[29] => $this->getTipconpub(),
			$keys[30] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LianaofePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumanaofe($value);
				break;
			case 1:
				$this->setNumplie($value);
				break;
			case 2:
				$this->setNumexp($value);
				break;
			case 3:
				$this->setCodempadm($value);
				break;
			case 4:
				$this->setCoduniadm($value);
				break;
			case 5:
				$this->setCodempeje($value);
				break;
			case 6:
				$this->setCoduniste($value);
				break;
			case 7:
				$this->setFecreg($value);
				break;
			case 8:
				$this->setDias($value);
				break;
			case 9:
				$this->setFecven($value);
				break;
			case 10:
				$this->setNumofe($value);
				break;
			case 11:
				$this->setDocane1($value);
				break;
			case 12:
				$this->setDocane2($value);
				break;
			case 13:
				$this->setDocane3($value);
				break;
			case 14:
				$this->setDocane4($value);
				break;
			case 15:
				$this->setPrepor($value);
				break;
			case 16:
				$this->setCargopre($value);
				break;
			case 17:
				$this->setLisicactId($value);
				break;
			case 18:
				$this->setDetdecmod($value);
				break;
			case 19:
				$this->setAnapor($value);
				break;
			case 20:
				$this->setCargoana($value);
				break;
			case 21:
				$this->setStatus($value);
				break;
			case 22:
				$this->setFecdecla($value);
				break;
			case 23:
				$this->setPorleg($value);
				break;
			case 24:
				$this->setPortec($value);
				break;
			case 25:
				$this->setPorfin($value);
				break;
			case 26:
				$this->setPorfia($value);
				break;
			case 27:
				$this->setPortipemp($value);
				break;
			case 28:
				$this->setPortot($value);
				break;
			case 29:
				$this->setTipconpub($value);
				break;
			case 30:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LianaofePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumanaofe($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumplie($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumexp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduniadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodempeje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduniste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecreg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDias($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecven($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumofe($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDocane1($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDocane2($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDocane3($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDocane4($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setPrepor($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCargopre($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setLisicactId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDetdecmod($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setAnapor($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCargoana($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setStatus($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFecdecla($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setPorleg($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPortec($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setPorfin($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setPorfia($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setPortipemp($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setPortot($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTipconpub($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setId($arr[$keys[30]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LianaofePeer::DATABASE_NAME);

		if ($this->isColumnModified(LianaofePeer::NUMANAOFE)) $criteria->add(LianaofePeer::NUMANAOFE, $this->numanaofe);
		if ($this->isColumnModified(LianaofePeer::NUMPLIE)) $criteria->add(LianaofePeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LianaofePeer::NUMEXP)) $criteria->add(LianaofePeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LianaofePeer::CODEMPADM)) $criteria->add(LianaofePeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LianaofePeer::CODUNIADM)) $criteria->add(LianaofePeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LianaofePeer::CODEMPEJE)) $criteria->add(LianaofePeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LianaofePeer::CODUNISTE)) $criteria->add(LianaofePeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LianaofePeer::FECREG)) $criteria->add(LianaofePeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LianaofePeer::DIAS)) $criteria->add(LianaofePeer::DIAS, $this->dias);
		if ($this->isColumnModified(LianaofePeer::FECVEN)) $criteria->add(LianaofePeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LianaofePeer::NUMOFE)) $criteria->add(LianaofePeer::NUMOFE, $this->numofe);
		if ($this->isColumnModified(LianaofePeer::DOCANE1)) $criteria->add(LianaofePeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LianaofePeer::DOCANE2)) $criteria->add(LianaofePeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LianaofePeer::DOCANE3)) $criteria->add(LianaofePeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LianaofePeer::DOCANE4)) $criteria->add(LianaofePeer::DOCANE4, $this->docane4);
		if ($this->isColumnModified(LianaofePeer::PREPOR)) $criteria->add(LianaofePeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LianaofePeer::CARGOPRE)) $criteria->add(LianaofePeer::CARGOPRE, $this->cargopre);
		if ($this->isColumnModified(LianaofePeer::LISICACT_ID)) $criteria->add(LianaofePeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LianaofePeer::DETDECMOD)) $criteria->add(LianaofePeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LianaofePeer::ANAPOR)) $criteria->add(LianaofePeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LianaofePeer::CARGOANA)) $criteria->add(LianaofePeer::CARGOANA, $this->cargoana);
		if ($this->isColumnModified(LianaofePeer::STATUS)) $criteria->add(LianaofePeer::STATUS, $this->status);
		if ($this->isColumnModified(LianaofePeer::FECDECLA)) $criteria->add(LianaofePeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LianaofePeer::PORLEG)) $criteria->add(LianaofePeer::PORLEG, $this->porleg);
		if ($this->isColumnModified(LianaofePeer::PORTEC)) $criteria->add(LianaofePeer::PORTEC, $this->portec);
		if ($this->isColumnModified(LianaofePeer::PORFIN)) $criteria->add(LianaofePeer::PORFIN, $this->porfin);
		if ($this->isColumnModified(LianaofePeer::PORFIA)) $criteria->add(LianaofePeer::PORFIA, $this->porfia);
		if ($this->isColumnModified(LianaofePeer::PORTIPEMP)) $criteria->add(LianaofePeer::PORTIPEMP, $this->portipemp);
		if ($this->isColumnModified(LianaofePeer::PORTOT)) $criteria->add(LianaofePeer::PORTOT, $this->portot);
		if ($this->isColumnModified(LianaofePeer::TIPCONPUB)) $criteria->add(LianaofePeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LianaofePeer::ID)) $criteria->add(LianaofePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LianaofePeer::DATABASE_NAME);

		$criteria->add(LianaofePeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNumanaofe($this->numanaofe);

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setNumofe($this->numofe);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setDocane4($this->docane4);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setCargopre($this->cargopre);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setAnapor($this->anapor);

		$copyObj->setCargoana($this->cargoana);

		$copyObj->setStatus($this->status);

		$copyObj->setFecdecla($this->fecdecla);

		$copyObj->setPorleg($this->porleg);

		$copyObj->setPortec($this->portec);

		$copyObj->setPorfin($this->porfin);

		$copyObj->setPorfia($this->porfia);

		$copyObj->setPortipemp($this->portipemp);

		$copyObj->setPortot($this->portot);

		$copyObj->setTipconpub($this->tipconpub);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new LianaofePeer();
		}
		return self::$peer;
	}

	
	public function setLisicact($v)
	{


		if ($v === null) {
			$this->setLisicactId(NULL);
		} else {
			$this->setLisicactId($v->getId());
		}


		$this->aLisicact = $v;
	}


	
	public function getLisicact($con = null)
	{
		if ($this->aLisicact === null && ($this->lisicact_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLisicactPeer.php';

      $c = new Criteria();
      $c->add(LisicactPeer::ID,$this->lisicact_id);
      
			$this->aLisicact = LisicactPeer::doSelectOne($c, $con);

			
		}
		return $this->aLisicact;
	}

} 