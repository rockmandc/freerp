<?php


abstract class BaseFcdetpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpag;


	
	protected $nrodet;


	
	protected $monpag;


	
	protected $tippag;


	
	protected $fecdet;


	
	protected $ctaban;


	
	protected $nomcue;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpag()
  {

    return trim($this->numpag);

  }
  
  public function getNrodet()
  {

    return trim($this->nrodet);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getTippag()
  {

    return trim($this->tippag);

  }
  
  public function getFecdet($format = 'Y-m-d')
  {

    if ($this->fecdet === null || $this->fecdet === '') {
      return null;
    } elseif (!is_int($this->fecdet)) {
            $ts = adodb_strtotime($this->fecdet);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdet] as date/time value: " . var_export($this->fecdet, true));
      }
    } else {
      $ts = $this->fecdet;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCtaban()
  {

    return trim($this->ctaban);

  }
  
  public function getNomcue()
  {

    return trim($this->nomcue);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpag($v)
	{

    if ($this->numpag !== $v) {
        $this->numpag = $v;
        $this->modifiedColumns[] = FcdetpagPeer::NUMPAG;
      }
  
	} 
	
	public function setNrodet($v)
	{

    if ($this->nrodet !== $v) {
        $this->nrodet = $v;
        $this->modifiedColumns[] = FcdetpagPeer::NRODET;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetpagPeer::MONPAG;
      }
  
	} 
	
	public function setTippag($v)
	{

    if ($this->tippag !== $v) {
        $this->tippag = $v;
        $this->modifiedColumns[] = FcdetpagPeer::TIPPAG;
      }
  
	} 
	
	public function setFecdet($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdet] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdet !== $ts) {
      $this->fecdet = $ts;
      $this->modifiedColumns[] = FcdetpagPeer::FECDET;
    }

	} 
	
	public function setCtaban($v)
	{

    if ($this->ctaban !== $v) {
        $this->ctaban = $v;
        $this->modifiedColumns[] = FcdetpagPeer::CTABAN;
      }
  
	} 
	
	public function setNomcue($v)
	{

    if ($this->nomcue !== $v) {
        $this->nomcue = $v;
        $this->modifiedColumns[] = FcdetpagPeer::NOMCUE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdetpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpag = $rs->getString($startcol + 0);

      $this->nrodet = $rs->getString($startcol + 1);

      $this->monpag = $rs->getFloat($startcol + 2);

      $this->tippag = $rs->getString($startcol + 3);

      $this->fecdet = $rs->getDate($startcol + 4, null);

      $this->ctaban = $rs->getString($startcol + 5);

      $this->nomcue = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdetpag object", $e);
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

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdetpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdetpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdetpagPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcdetpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdetpagPeer::doUpdate($this, $con);
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


			if (($retval = FcdetpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpag();
				break;
			case 1:
				return $this->getNrodet();
				break;
			case 2:
				return $this->getMonpag();
				break;
			case 3:
				return $this->getTippag();
				break;
			case 4:
				return $this->getFecdet();
				break;
			case 5:
				return $this->getCtaban();
				break;
			case 6:
				return $this->getNomcue();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdetpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpag(),
			$keys[1] => $this->getNrodet(),
			$keys[2] => $this->getMonpag(),
			$keys[3] => $this->getTippag(),
			$keys[4] => $this->getFecdet(),
			$keys[5] => $this->getCtaban(),
			$keys[6] => $this->getNomcue(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpag($value);
				break;
			case 1:
				$this->setNrodet($value);
				break;
			case 2:
				$this->setMonpag($value);
				break;
			case 3:
				$this->setTippag($value);
				break;
			case 4:
				$this->setFecdet($value);
				break;
			case 5:
				$this->setCtaban($value);
				break;
			case 6:
				$this->setNomcue($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdetpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNrodet($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonpag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTippag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdet($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCtaban($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomcue($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdetpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdetpagPeer::NUMPAG)) $criteria->add(FcdetpagPeer::NUMPAG, $this->numpag);
		if ($this->isColumnModified(FcdetpagPeer::NRODET)) $criteria->add(FcdetpagPeer::NRODET, $this->nrodet);
		if ($this->isColumnModified(FcdetpagPeer::MONPAG)) $criteria->add(FcdetpagPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(FcdetpagPeer::TIPPAG)) $criteria->add(FcdetpagPeer::TIPPAG, $this->tippag);
		if ($this->isColumnModified(FcdetpagPeer::FECDET)) $criteria->add(FcdetpagPeer::FECDET, $this->fecdet);
		if ($this->isColumnModified(FcdetpagPeer::CTABAN)) $criteria->add(FcdetpagPeer::CTABAN, $this->ctaban);
		if ($this->isColumnModified(FcdetpagPeer::NOMCUE)) $criteria->add(FcdetpagPeer::NOMCUE, $this->nomcue);
		if ($this->isColumnModified(FcdetpagPeer::ID)) $criteria->add(FcdetpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdetpagPeer::DATABASE_NAME);

		$criteria->add(FcdetpagPeer::ID, $this->id);

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

		$copyObj->setNumpag($this->numpag);

		$copyObj->setNrodet($this->nrodet);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setTippag($this->tippag);

		$copyObj->setFecdet($this->fecdet);

		$copyObj->setCtaban($this->ctaban);

		$copyObj->setNomcue($this->nomcue);


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
			self::$peer = new FcdetpagPeer();
		}
		return self::$peer;
	}

} 
