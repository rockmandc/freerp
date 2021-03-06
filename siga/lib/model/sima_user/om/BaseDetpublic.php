<?php


abstract class BaseDetpublic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $titpub;


	
	protected $despub;


	
	protected $linkpub;


	
	protected $id_pub;


	
	protected $created_at;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTitpub()
  {

    return trim($this->titpub);

  }
  
  public function getDespub()
  {

    return trim($this->despub);

  }
  
  public function getLinkpub()
  {

    return trim($this->linkpub);

  }
  
  public function getIdPub()
  {

    return trim($this->id_pub);

  }
  
  public function getCreatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->created_at === null || $this->created_at === '') {
      return null;
    } elseif (!is_int($this->created_at)) {
            $ts = adodb_strtotime($this->created_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
      }
    } else {
      $ts = $this->created_at;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return trim($this->id);

  }
	
	public function setTitpub($v)
	{

    if ($this->titpub !== $v) {
        $this->titpub = $v;
        $this->modifiedColumns[] = DetpublicPeer::TITPUB;
      }
  
	} 
	
	public function setDespub($v)
	{

    if ($this->despub !== $v) {
        $this->despub = $v;
        $this->modifiedColumns[] = DetpublicPeer::DESPUB;
      }
  
	} 
	
	public function setLinkpub($v)
	{

    if ($this->linkpub !== $v) {
        $this->linkpub = $v;
        $this->modifiedColumns[] = DetpublicPeer::LINKPUB;
      }
  
	} 
	
	public function setIdPub($v)
	{

    if ($this->id_pub !== $v) {
        $this->id_pub = $v;
        $this->modifiedColumns[] = DetpublicPeer::ID_PUB;
      }
  
	} 
	
	public function setCreatedAt($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->created_at !== $ts) {
      $this->created_at = $ts;
      $this->modifiedColumns[] = DetpublicPeer::CREATED_AT;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = DetpublicPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->titpub = $rs->getString($startcol + 0);

      $this->despub = $rs->getString($startcol + 1);

      $this->linkpub = $rs->getString($startcol + 2);

      $this->id_pub = $rs->getString($startcol + 3);

      $this->created_at = $rs->getTimestamp($startcol + 4, null);

      $this->id = $rs->getString($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Detpublic object", $e);
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
			$con = Propel::getConnection(DetpublicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DetpublicPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(DetpublicPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DetpublicPeer::DATABASE_NAME);
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
					$pk = DetpublicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DetpublicPeer::doUpdate($this, $con);
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


			if (($retval = DetpublicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DetpublicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTitpub();
				break;
			case 1:
				return $this->getDespub();
				break;
			case 2:
				return $this->getLinkpub();
				break;
			case 3:
				return $this->getIdPub();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DetpublicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTitpub(),
			$keys[1] => $this->getDespub(),
			$keys[2] => $this->getLinkpub(),
			$keys[3] => $this->getIdPub(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DetpublicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTitpub($value);
				break;
			case 1:
				$this->setDespub($value);
				break;
			case 2:
				$this->setLinkpub($value);
				break;
			case 3:
				$this->setIdPub($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DetpublicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTitpub($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDespub($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLinkpub($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdPub($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DetpublicPeer::DATABASE_NAME);

		if ($this->isColumnModified(DetpublicPeer::TITPUB)) $criteria->add(DetpublicPeer::TITPUB, $this->titpub);
		if ($this->isColumnModified(DetpublicPeer::DESPUB)) $criteria->add(DetpublicPeer::DESPUB, $this->despub);
		if ($this->isColumnModified(DetpublicPeer::LINKPUB)) $criteria->add(DetpublicPeer::LINKPUB, $this->linkpub);
		if ($this->isColumnModified(DetpublicPeer::ID_PUB)) $criteria->add(DetpublicPeer::ID_PUB, $this->id_pub);
		if ($this->isColumnModified(DetpublicPeer::CREATED_AT)) $criteria->add(DetpublicPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(DetpublicPeer::ID)) $criteria->add(DetpublicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DetpublicPeer::DATABASE_NAME);

		$criteria->add(DetpublicPeer::ID, $this->id);

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

		$copyObj->setTitpub($this->titpub);

		$copyObj->setDespub($this->despub);

		$copyObj->setLinkpub($this->linkpub);

		$copyObj->setIdPub($this->id_pub);

		$copyObj->setCreatedAt($this->created_at);


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
			self::$peer = new DetpublicPeer();
		}
		return self::$peer;
	}

} 