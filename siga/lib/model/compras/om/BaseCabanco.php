<?php


abstract class BaseCabanco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codban;


	
	protected $desban;


	
	protected $codpagele;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodban()
  {

    return trim($this->codban);

  }
  
  public function getDesban()
  {

    return trim($this->desban);

  }
  
  public function getCodpagele()
  {

    return trim($this->codpagele);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodban($v)
	{

    if ($this->codban !== $v) {
        $this->codban = $v;
        $this->modifiedColumns[] = CabancoPeer::CODBAN;
      }
  
	} 
	
	public function setDesban($v)
	{

    if ($this->desban !== $v) {
        $this->desban = $v;
        $this->modifiedColumns[] = CabancoPeer::DESBAN;
      }
  
	} 
	
	public function setCodpagele($v)
	{

    if ($this->codpagele !== $v) {
        $this->codpagele = $v;
        $this->modifiedColumns[] = CabancoPeer::CODPAGELE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CabancoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codban = $rs->getString($startcol + 0);

      $this->desban = $rs->getString($startcol + 1);

      $this->codpagele = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cabanco object", $e);
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
			$con = Propel::getConnection(CabancoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CabancoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CabancoPeer::DATABASE_NAME);
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
					$pk = CabancoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CabancoPeer::doUpdate($this, $con);
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


			if (($retval = CabancoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CabancoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodban();
				break;
			case 1:
				return $this->getDesban();
				break;
			case 2:
				return $this->getCodpagele();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CabancoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodban(),
			$keys[1] => $this->getDesban(),
			$keys[2] => $this->getCodpagele(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CabancoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodban($value);
				break;
			case 1:
				$this->setDesban($value);
				break;
			case 2:
				$this->setCodpagele($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CabancoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodban($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesban($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpagele($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CabancoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CabancoPeer::CODBAN)) $criteria->add(CabancoPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(CabancoPeer::DESBAN)) $criteria->add(CabancoPeer::DESBAN, $this->desban);
		if ($this->isColumnModified(CabancoPeer::CODPAGELE)) $criteria->add(CabancoPeer::CODPAGELE, $this->codpagele);
		if ($this->isColumnModified(CabancoPeer::ID)) $criteria->add(CabancoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CabancoPeer::DATABASE_NAME);

		$criteria->add(CabancoPeer::ID, $this->id);

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

		$copyObj->setCodban($this->codban);

		$copyObj->setDesban($this->desban);

		$copyObj->setCodpagele($this->codpagele);


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
			self::$peer = new CabancoPeer();
		}
		return self::$peer;
	}

} 