<?php


abstract class BaseCodeftiplot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codlot;


	
	protected $deslot;


	
	protected $numlot;


	
	protected $tipcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodlot()
  {

    return trim($this->codlot);

  }
  
  public function getDeslot()
  {

    return trim($this->deslot);

  }
  
  public function getNumlot()
  {

    return trim($this->numlot);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodlot($v)
	{

    if ($this->codlot !== $v) {
        $this->codlot = $v;
        $this->modifiedColumns[] = CodeftiplotPeer::CODLOT;
      }
  
	} 
	
	public function setDeslot($v)
	{

    if ($this->deslot !== $v) {
        $this->deslot = $v;
        $this->modifiedColumns[] = CodeftiplotPeer::DESLOT;
      }
  
	} 
	
	public function setNumlot($v)
	{

    if ($this->numlot !== $v) {
        $this->numlot = $v;
        $this->modifiedColumns[] = CodeftiplotPeer::NUMLOT;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = CodeftiplotPeer::TIPCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CodeftiplotPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codlot = $rs->getString($startcol + 0);

      $this->deslot = $rs->getString($startcol + 1);

      $this->numlot = $rs->getString($startcol + 2);

      $this->tipcom = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Codeftiplot object", $e);
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
			$con = Propel::getConnection(CodeftiplotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CodeftiplotPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CodeftiplotPeer::DATABASE_NAME);
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
					$pk = CodeftiplotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CodeftiplotPeer::doUpdate($this, $con);
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


			if (($retval = CodeftiplotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CodeftiplotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodlot();
				break;
			case 1:
				return $this->getDeslot();
				break;
			case 2:
				return $this->getNumlot();
				break;
			case 3:
				return $this->getTipcom();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CodeftiplotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodlot(),
			$keys[1] => $this->getDeslot(),
			$keys[2] => $this->getNumlot(),
			$keys[3] => $this->getTipcom(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CodeftiplotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodlot($value);
				break;
			case 1:
				$this->setDeslot($value);
				break;
			case 2:
				$this->setNumlot($value);
				break;
			case 3:
				$this->setTipcom($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CodeftiplotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodlot($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDeslot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumlot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipcom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CodeftiplotPeer::DATABASE_NAME);

		if ($this->isColumnModified(CodeftiplotPeer::CODLOT)) $criteria->add(CodeftiplotPeer::CODLOT, $this->codlot);
		if ($this->isColumnModified(CodeftiplotPeer::DESLOT)) $criteria->add(CodeftiplotPeer::DESLOT, $this->deslot);
		if ($this->isColumnModified(CodeftiplotPeer::NUMLOT)) $criteria->add(CodeftiplotPeer::NUMLOT, $this->numlot);
		if ($this->isColumnModified(CodeftiplotPeer::TIPCOM)) $criteria->add(CodeftiplotPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(CodeftiplotPeer::ID)) $criteria->add(CodeftiplotPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CodeftiplotPeer::DATABASE_NAME);

		$criteria->add(CodeftiplotPeer::ID, $this->id);

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

		$copyObj->setCodlot($this->codlot);

		$copyObj->setDeslot($this->deslot);

		$copyObj->setNumlot($this->numlot);

		$copyObj->setTipcom($this->tipcom);


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
			self::$peer = new CodeftiplotPeer();
		}
		return self::$peer;
	}

} 