<?php


abstract class BaseLianaofetipemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numanaofe;


	
	protected $codtipemp;


	
	protected $punemp;


	
	protected $poremp;


	
	protected $observ;


	
	protected $tipconpub;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumanaofe()
  {

    return trim($this->numanaofe);

  }
  
  public function getCodtipemp()
  {

    return trim($this->codtipemp);

  }
  
  public function getPunemp($val=false)
  {

    if($val) return number_format($this->punemp,2,',','.');
    else return $this->punemp;

  }
  
  public function getPoremp($val=false)
  {

    if($val) return number_format($this->poremp,2,',','.');
    else return $this->poremp;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

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
        $this->modifiedColumns[] = LianaofetipempPeer::NUMANAOFE;
      }
  
	} 
	
	public function setCodtipemp($v)
	{

    if ($this->codtipemp !== $v) {
        $this->codtipemp = $v;
        $this->modifiedColumns[] = LianaofetipempPeer::CODTIPEMP;
      }
  
	} 
	
	public function setPunemp($v)
	{

    if ($this->punemp !== $v) {
        $this->punemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaofetipempPeer::PUNEMP;
      }
  
	} 
	
	public function setPoremp($v)
	{

    if ($this->poremp !== $v) {
        $this->poremp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaofetipempPeer::POREMP;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = LianaofetipempPeer::OBSERV;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LianaofetipempPeer::TIPCONPUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LianaofetipempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numanaofe = $rs->getString($startcol + 0);

      $this->codtipemp = $rs->getString($startcol + 1);

      $this->punemp = $rs->getFloat($startcol + 2);

      $this->poremp = $rs->getFloat($startcol + 3);

      $this->observ = $rs->getString($startcol + 4);

      $this->tipconpub = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lianaofetipemp object", $e);
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
			$con = Propel::getConnection(LianaofetipempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LianaofetipempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LianaofetipempPeer::DATABASE_NAME);
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
					$pk = LianaofetipempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LianaofetipempPeer::doUpdate($this, $con);
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


			if (($retval = LianaofetipempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LianaofetipempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumanaofe();
				break;
			case 1:
				return $this->getCodtipemp();
				break;
			case 2:
				return $this->getPunemp();
				break;
			case 3:
				return $this->getPoremp();
				break;
			case 4:
				return $this->getObserv();
				break;
			case 5:
				return $this->getTipconpub();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LianaofetipempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumanaofe(),
			$keys[1] => $this->getCodtipemp(),
			$keys[2] => $this->getPunemp(),
			$keys[3] => $this->getPoremp(),
			$keys[4] => $this->getObserv(),
			$keys[5] => $this->getTipconpub(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LianaofetipempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumanaofe($value);
				break;
			case 1:
				$this->setCodtipemp($value);
				break;
			case 2:
				$this->setPunemp($value);
				break;
			case 3:
				$this->setPoremp($value);
				break;
			case 4:
				$this->setObserv($value);
				break;
			case 5:
				$this->setTipconpub($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LianaofetipempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumanaofe($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodtipemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPunemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPoremp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObserv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipconpub($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LianaofetipempPeer::DATABASE_NAME);

		if ($this->isColumnModified(LianaofetipempPeer::NUMANAOFE)) $criteria->add(LianaofetipempPeer::NUMANAOFE, $this->numanaofe);
		if ($this->isColumnModified(LianaofetipempPeer::CODTIPEMP)) $criteria->add(LianaofetipempPeer::CODTIPEMP, $this->codtipemp);
		if ($this->isColumnModified(LianaofetipempPeer::PUNEMP)) $criteria->add(LianaofetipempPeer::PUNEMP, $this->punemp);
		if ($this->isColumnModified(LianaofetipempPeer::POREMP)) $criteria->add(LianaofetipempPeer::POREMP, $this->poremp);
		if ($this->isColumnModified(LianaofetipempPeer::OBSERV)) $criteria->add(LianaofetipempPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(LianaofetipempPeer::TIPCONPUB)) $criteria->add(LianaofetipempPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LianaofetipempPeer::ID)) $criteria->add(LianaofetipempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LianaofetipempPeer::DATABASE_NAME);

		$criteria->add(LianaofetipempPeer::ID, $this->id);

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

		$copyObj->setCodtipemp($this->codtipemp);

		$copyObj->setPunemp($this->punemp);

		$copyObj->setPoremp($this->poremp);

		$copyObj->setObserv($this->observ);

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
			self::$peer = new LianaofetipempPeer();
		}
		return self::$peer;
	}

} 