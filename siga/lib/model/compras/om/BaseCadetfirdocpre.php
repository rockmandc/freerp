<?php


abstract class BaseCadetfirdocpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddirec;


	
	protected $tipdoc;


	
	protected $numfir;


	
	protected $nomfir;


	
	protected $carfir;


	
	protected $obsfir;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getNumfir()
  {

    return $this->numfir;

  }
  
  public function getNomfir()
  {

    return trim($this->nomfir);

  }
  
  public function getCarfir()
  {

    return trim($this->carfir);

  }
  
  public function getObsfir()
  {

    return trim($this->obsfir);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = CadetfirdocprePeer::CODDIREC;
      }
  
	} 
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = CadetfirdocprePeer::TIPDOC;
      }
  
	} 
	
	public function setNumfir($v)
	{

    if ($this->numfir !== $v) {
        $this->numfir = $v;
        $this->modifiedColumns[] = CadetfirdocprePeer::NUMFIR;
      }
  
	} 
	
	public function setNomfir($v)
	{

    if ($this->nomfir !== $v) {
        $this->nomfir = $v;
        $this->modifiedColumns[] = CadetfirdocprePeer::NOMFIR;
      }
  
	} 
	
	public function setCarfir($v)
	{

    if ($this->carfir !== $v) {
        $this->carfir = $v;
        $this->modifiedColumns[] = CadetfirdocprePeer::CARFIR;
      }
  
	} 
	
	public function setObsfir($v)
	{

    if ($this->obsfir !== $v) {
        $this->obsfir = $v;
        $this->modifiedColumns[] = CadetfirdocprePeer::OBSFIR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadetfirdocprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddirec = $rs->getString($startcol + 0);

      $this->tipdoc = $rs->getString($startcol + 1);

      $this->numfir = $rs->getInt($startcol + 2);

      $this->nomfir = $rs->getString($startcol + 3);

      $this->carfir = $rs->getString($startcol + 4);

      $this->obsfir = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadetfirdocpre object", $e);
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
			$con = Propel::getConnection(CadetfirdocprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadetfirdocprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadetfirdocprePeer::DATABASE_NAME);
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
					$pk = CadetfirdocprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadetfirdocprePeer::doUpdate($this, $con);
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


			if (($retval = CadetfirdocprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetfirdocprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddirec();
				break;
			case 1:
				return $this->getTipdoc();
				break;
			case 2:
				return $this->getNumfir();
				break;
			case 3:
				return $this->getNomfir();
				break;
			case 4:
				return $this->getCarfir();
				break;
			case 5:
				return $this->getObsfir();
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
		$keys = CadetfirdocprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddirec(),
			$keys[1] => $this->getTipdoc(),
			$keys[2] => $this->getNumfir(),
			$keys[3] => $this->getNomfir(),
			$keys[4] => $this->getCarfir(),
			$keys[5] => $this->getObsfir(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetfirdocprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddirec($value);
				break;
			case 1:
				$this->setTipdoc($value);
				break;
			case 2:
				$this->setNumfir($value);
				break;
			case 3:
				$this->setNomfir($value);
				break;
			case 4:
				$this->setCarfir($value);
				break;
			case 5:
				$this->setObsfir($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetfirdocprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddirec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumfir($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomfir($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCarfir($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObsfir($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadetfirdocprePeer::DATABASE_NAME);

		if ($this->isColumnModified(CadetfirdocprePeer::CODDIREC)) $criteria->add(CadetfirdocprePeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(CadetfirdocprePeer::TIPDOC)) $criteria->add(CadetfirdocprePeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(CadetfirdocprePeer::NUMFIR)) $criteria->add(CadetfirdocprePeer::NUMFIR, $this->numfir);
		if ($this->isColumnModified(CadetfirdocprePeer::NOMFIR)) $criteria->add(CadetfirdocprePeer::NOMFIR, $this->nomfir);
		if ($this->isColumnModified(CadetfirdocprePeer::CARFIR)) $criteria->add(CadetfirdocprePeer::CARFIR, $this->carfir);
		if ($this->isColumnModified(CadetfirdocprePeer::OBSFIR)) $criteria->add(CadetfirdocprePeer::OBSFIR, $this->obsfir);
		if ($this->isColumnModified(CadetfirdocprePeer::ID)) $criteria->add(CadetfirdocprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadetfirdocprePeer::DATABASE_NAME);

		$criteria->add(CadetfirdocprePeer::ID, $this->id);

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

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setNumfir($this->numfir);

		$copyObj->setNomfir($this->nomfir);

		$copyObj->setCarfir($this->carfir);

		$copyObj->setObsfir($this->obsfir);


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
			self::$peer = new CadetfirdocprePeer();
		}
		return self::$peer;
	}

} 