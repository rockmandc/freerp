<?php


abstract class BaseContacuetit extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtitdet;


	
	protected $codcta;


	
	protected $descta;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtitdet()
  {

    return trim($this->codtitdet);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getDescta()
  {

    return trim($this->descta);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtitdet($v)
	{

    if ($this->codtitdet !== $v) {
        $this->codtitdet = $v;
        $this->modifiedColumns[] = ContacuetitPeer::CODTITDET;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = ContacuetitPeer::CODCTA;
      }
  
	} 
	
	public function setDescta($v)
	{

    if ($this->descta !== $v) {
        $this->descta = $v;
        $this->modifiedColumns[] = ContacuetitPeer::DESCTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ContacuetitPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtitdet = $rs->getString($startcol + 0);

      $this->codcta = $rs->getString($startcol + 1);

      $this->descta = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Contacuetit object", $e);
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
			$con = Propel::getConnection(ContacuetitPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContacuetitPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContacuetitPeer::DATABASE_NAME);
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
					$pk = ContacuetitPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContacuetitPeer::doUpdate($this, $con);
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


			if (($retval = ContacuetitPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContacuetitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtitdet();
				break;
			case 1:
				return $this->getCodcta();
				break;
			case 2:
				return $this->getDescta();
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
		$keys = ContacuetitPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtitdet(),
			$keys[1] => $this->getCodcta(),
			$keys[2] => $this->getDescta(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContacuetitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtitdet($value);
				break;
			case 1:
				$this->setCodcta($value);
				break;
			case 2:
				$this->setDescta($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContacuetitPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtitdet($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContacuetitPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContacuetitPeer::CODTITDET)) $criteria->add(ContacuetitPeer::CODTITDET, $this->codtitdet);
		if ($this->isColumnModified(ContacuetitPeer::CODCTA)) $criteria->add(ContacuetitPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(ContacuetitPeer::DESCTA)) $criteria->add(ContacuetitPeer::DESCTA, $this->descta);
		if ($this->isColumnModified(ContacuetitPeer::ID)) $criteria->add(ContacuetitPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContacuetitPeer::DATABASE_NAME);

		$criteria->add(ContacuetitPeer::ID, $this->id);

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

		$copyObj->setCodtitdet($this->codtitdet);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setDescta($this->descta);


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
			self::$peer = new ContacuetitPeer();
		}
		return self::$peer;
	}

} 