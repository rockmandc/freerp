<?php


abstract class BaseCacorrel extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $corcom;


	
	protected $corser;


	
	protected $corsol;


	
	protected $correq;


	
	protected $correc;


	
	protected $cordes;


	
	protected $corcot;


	
	protected $cortra;


	
	protected $corent;


	
	protected $corsal;


	
	protected $corpro;


	
	protected $corpag;


	
	protected $corcont;


	
	protected $corsergen;


	
	protected $corcomext;


	
	protected $corsolser;


	
	protected $corsolman;


	
	protected $corordman;


	
	protected $corocmext;


	
	protected $corsolcot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCorcom($val=false)
  {

    if($val) return number_format($this->corcom,2,',','.');
    else return $this->corcom;

  }
  
  public function getCorser($val=false)
  {

    if($val) return number_format($this->corser,2,',','.');
    else return $this->corser;

  }
  
  public function getCorsol($val=false)
  {

    if($val) return number_format($this->corsol,2,',','.');
    else return $this->corsol;

  }
  
  public function getCorreq($val=false)
  {

    if($val) return number_format($this->correq,2,',','.');
    else return $this->correq;

  }
  
  public function getCorrec($val=false)
  {

    if($val) return number_format($this->correc,2,',','.');
    else return $this->correc;

  }
  
  public function getCordes($val=false)
  {

    if($val) return number_format($this->cordes,2,',','.');
    else return $this->cordes;

  }
  
  public function getCorcot($val=false)
  {

    if($val) return number_format($this->corcot,2,',','.');
    else return $this->corcot;

  }
  
  public function getCortra($val=false)
  {

    if($val) return number_format($this->cortra,2,',','.');
    else return $this->cortra;

  }
  
  public function getCorent($val=false)
  {

    if($val) return number_format($this->corent,2,',','.');
    else return $this->corent;

  }
  
  public function getCorsal($val=false)
  {

    if($val) return number_format($this->corsal,2,',','.');
    else return $this->corsal;

  }
  
  public function getCorpro($val=false)
  {

    if($val) return number_format($this->corpro,2,',','.');
    else return $this->corpro;

  }
  
  public function getCorpag($val=false)
  {

    if($val) return number_format($this->corpag,2,',','.');
    else return $this->corpag;

  }
  
  public function getCorcont($val=false)
  {

    if($val) return number_format($this->corcont,2,',','.');
    else return $this->corcont;

  }
  
  public function getCorsergen($val=false)
  {

    if($val) return number_format($this->corsergen,2,',','.');
    else return $this->corsergen;

  }
  
  public function getCorcomext($val=false)
  {

    if($val) return number_format($this->corcomext,2,',','.');
    else return $this->corcomext;

  }
  
  public function getCorsolser($val=false)
  {

    if($val) return number_format($this->corsolser,2,',','.');
    else return $this->corsolser;

  }
  
  public function getCorsolman($val=false)
  {

    if($val) return number_format($this->corsolman,2,',','.');
    else return $this->corsolman;

  }
  
  public function getCorordman($val=false)
  {

    if($val) return number_format($this->corordman,2,',','.');
    else return $this->corordman;

  }
  
  public function getCorocmext($val=false)
  {

    if($val) return number_format($this->corocmext,2,',','.');
    else return $this->corocmext;

  }
  
  public function getCorsolcot($val=false)
  {

    if($val) return number_format($this->corsolcot,2,',','.');
    else return $this->corsolcot;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCorcom($v)
	{

    if ($this->corcom !== $v) {
        $this->corcom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORCOM;
      }
  
	} 
	
	public function setCorser($v)
	{

    if ($this->corser !== $v) {
        $this->corser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORSER;
      }
  
	} 
	
	public function setCorsol($v)
	{

    if ($this->corsol !== $v) {
        $this->corsol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORSOL;
      }
  
	} 
	
	public function setCorreq($v)
	{

    if ($this->correq !== $v) {
        $this->correq = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORREQ;
      }
  
	} 
	
	public function setCorrec($v)
	{

    if ($this->correc !== $v) {
        $this->correc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORREC;
      }
  
	} 
	
	public function setCordes($v)
	{

    if ($this->cordes !== $v) {
        $this->cordes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORDES;
      }
  
	} 
	
	public function setCorcot($v)
	{

    if ($this->corcot !== $v) {
        $this->corcot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORCOT;
      }
  
	} 
	
	public function setCortra($v)
	{

    if ($this->cortra !== $v) {
        $this->cortra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORTRA;
      }
  
	} 
	
	public function setCorent($v)
	{

    if ($this->corent !== $v) {
        $this->corent = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORENT;
      }
  
	} 
	
	public function setCorsal($v)
	{

    if ($this->corsal !== $v) {
        $this->corsal = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORSAL;
      }
  
	} 
	
	public function setCorpro($v)
	{

    if ($this->corpro !== $v) {
        $this->corpro = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORPRO;
      }
  
	} 
	
	public function setCorpag($v)
	{

    if ($this->corpag !== $v) {
        $this->corpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORPAG;
      }
  
	} 
	
	public function setCorcont($v)
	{

    if ($this->corcont !== $v) {
        $this->corcont = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORCONT;
      }
  
	} 
	
	public function setCorsergen($v)
	{

    if ($this->corsergen !== $v) {
        $this->corsergen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORSERGEN;
      }
  
	} 
	
	public function setCorcomext($v)
	{

    if ($this->corcomext !== $v) {
        $this->corcomext = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORCOMEXT;
      }
  
	} 
	
	public function setCorsolser($v)
	{

    if ($this->corsolser !== $v) {
        $this->corsolser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORSOLSER;
      }
  
	} 
	
	public function setCorsolman($v)
	{

    if ($this->corsolman !== $v) {
        $this->corsolman = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORSOLMAN;
      }
  
	} 
	
	public function setCorordman($v)
	{

    if ($this->corordman !== $v) {
        $this->corordman = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORORDMAN;
      }
  
	} 
	
	public function setCorocmext($v)
	{

    if ($this->corocmext !== $v) {
        $this->corocmext = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::COROCMEXT;
      }
  
	} 
	
	public function setCorsolcot($v)
	{

    if ($this->corsolcot !== $v) {
        $this->corsolcot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacorrelPeer::CORSOLCOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CacorrelPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->corcom = $rs->getFloat($startcol + 0);

      $this->corser = $rs->getFloat($startcol + 1);

      $this->corsol = $rs->getFloat($startcol + 2);

      $this->correq = $rs->getFloat($startcol + 3);

      $this->correc = $rs->getFloat($startcol + 4);

      $this->cordes = $rs->getFloat($startcol + 5);

      $this->corcot = $rs->getFloat($startcol + 6);

      $this->cortra = $rs->getFloat($startcol + 7);

      $this->corent = $rs->getFloat($startcol + 8);

      $this->corsal = $rs->getFloat($startcol + 9);

      $this->corpro = $rs->getFloat($startcol + 10);

      $this->corpag = $rs->getFloat($startcol + 11);

      $this->corcont = $rs->getFloat($startcol + 12);

      $this->corsergen = $rs->getFloat($startcol + 13);

      $this->corcomext = $rs->getFloat($startcol + 14);

      $this->corsolser = $rs->getFloat($startcol + 15);

      $this->corsolman = $rs->getFloat($startcol + 16);

      $this->corordman = $rs->getFloat($startcol + 17);

      $this->corocmext = $rs->getFloat($startcol + 18);

      $this->corsolcot = $rs->getFloat($startcol + 19);

      $this->id = $rs->getInt($startcol + 20);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 21; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cacorrel object", $e);
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
			$con = Propel::getConnection(CacorrelPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CacorrelPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CacorrelPeer::DATABASE_NAME);
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
					$pk = CacorrelPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CacorrelPeer::doUpdate($this, $con);
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


			if (($retval = CacorrelPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacorrelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCorcom();
				break;
			case 1:
				return $this->getCorser();
				break;
			case 2:
				return $this->getCorsol();
				break;
			case 3:
				return $this->getCorreq();
				break;
			case 4:
				return $this->getCorrec();
				break;
			case 5:
				return $this->getCordes();
				break;
			case 6:
				return $this->getCorcot();
				break;
			case 7:
				return $this->getCortra();
				break;
			case 8:
				return $this->getCorent();
				break;
			case 9:
				return $this->getCorsal();
				break;
			case 10:
				return $this->getCorpro();
				break;
			case 11:
				return $this->getCorpag();
				break;
			case 12:
				return $this->getCorcont();
				break;
			case 13:
				return $this->getCorsergen();
				break;
			case 14:
				return $this->getCorcomext();
				break;
			case 15:
				return $this->getCorsolser();
				break;
			case 16:
				return $this->getCorsolman();
				break;
			case 17:
				return $this->getCorordman();
				break;
			case 18:
				return $this->getCorocmext();
				break;
			case 19:
				return $this->getCorsolcot();
				break;
			case 20:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CacorrelPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCorcom(),
			$keys[1] => $this->getCorser(),
			$keys[2] => $this->getCorsol(),
			$keys[3] => $this->getCorreq(),
			$keys[4] => $this->getCorrec(),
			$keys[5] => $this->getCordes(),
			$keys[6] => $this->getCorcot(),
			$keys[7] => $this->getCortra(),
			$keys[8] => $this->getCorent(),
			$keys[9] => $this->getCorsal(),
			$keys[10] => $this->getCorpro(),
			$keys[11] => $this->getCorpag(),
			$keys[12] => $this->getCorcont(),
			$keys[13] => $this->getCorsergen(),
			$keys[14] => $this->getCorcomext(),
			$keys[15] => $this->getCorsolser(),
			$keys[16] => $this->getCorsolman(),
			$keys[17] => $this->getCorordman(),
			$keys[18] => $this->getCorocmext(),
			$keys[19] => $this->getCorsolcot(),
			$keys[20] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacorrelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCorcom($value);
				break;
			case 1:
				$this->setCorser($value);
				break;
			case 2:
				$this->setCorsol($value);
				break;
			case 3:
				$this->setCorreq($value);
				break;
			case 4:
				$this->setCorrec($value);
				break;
			case 5:
				$this->setCordes($value);
				break;
			case 6:
				$this->setCorcot($value);
				break;
			case 7:
				$this->setCortra($value);
				break;
			case 8:
				$this->setCorent($value);
				break;
			case 9:
				$this->setCorsal($value);
				break;
			case 10:
				$this->setCorpro($value);
				break;
			case 11:
				$this->setCorpag($value);
				break;
			case 12:
				$this->setCorcont($value);
				break;
			case 13:
				$this->setCorsergen($value);
				break;
			case 14:
				$this->setCorcomext($value);
				break;
			case 15:
				$this->setCorsolser($value);
				break;
			case 16:
				$this->setCorsolman($value);
				break;
			case 17:
				$this->setCorordman($value);
				break;
			case 18:
				$this->setCorocmext($value);
				break;
			case 19:
				$this->setCorsolcot($value);
				break;
			case 20:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CacorrelPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCorcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCorser($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorsol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCorreq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCorrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCordes($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCorcot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCortra($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCorent($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCorsal($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCorpro($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCorpag($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCorcont($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCorsergen($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCorcomext($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCorsolser($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCorsolman($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCorordman($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCorocmext($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCorsolcot($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CacorrelPeer::DATABASE_NAME);

		if ($this->isColumnModified(CacorrelPeer::CORCOM)) $criteria->add(CacorrelPeer::CORCOM, $this->corcom);
		if ($this->isColumnModified(CacorrelPeer::CORSER)) $criteria->add(CacorrelPeer::CORSER, $this->corser);
		if ($this->isColumnModified(CacorrelPeer::CORSOL)) $criteria->add(CacorrelPeer::CORSOL, $this->corsol);
		if ($this->isColumnModified(CacorrelPeer::CORREQ)) $criteria->add(CacorrelPeer::CORREQ, $this->correq);
		if ($this->isColumnModified(CacorrelPeer::CORREC)) $criteria->add(CacorrelPeer::CORREC, $this->correc);
		if ($this->isColumnModified(CacorrelPeer::CORDES)) $criteria->add(CacorrelPeer::CORDES, $this->cordes);
		if ($this->isColumnModified(CacorrelPeer::CORCOT)) $criteria->add(CacorrelPeer::CORCOT, $this->corcot);
		if ($this->isColumnModified(CacorrelPeer::CORTRA)) $criteria->add(CacorrelPeer::CORTRA, $this->cortra);
		if ($this->isColumnModified(CacorrelPeer::CORENT)) $criteria->add(CacorrelPeer::CORENT, $this->corent);
		if ($this->isColumnModified(CacorrelPeer::CORSAL)) $criteria->add(CacorrelPeer::CORSAL, $this->corsal);
		if ($this->isColumnModified(CacorrelPeer::CORPRO)) $criteria->add(CacorrelPeer::CORPRO, $this->corpro);
		if ($this->isColumnModified(CacorrelPeer::CORPAG)) $criteria->add(CacorrelPeer::CORPAG, $this->corpag);
		if ($this->isColumnModified(CacorrelPeer::CORCONT)) $criteria->add(CacorrelPeer::CORCONT, $this->corcont);
		if ($this->isColumnModified(CacorrelPeer::CORSERGEN)) $criteria->add(CacorrelPeer::CORSERGEN, $this->corsergen);
		if ($this->isColumnModified(CacorrelPeer::CORCOMEXT)) $criteria->add(CacorrelPeer::CORCOMEXT, $this->corcomext);
		if ($this->isColumnModified(CacorrelPeer::CORSOLSER)) $criteria->add(CacorrelPeer::CORSOLSER, $this->corsolser);
		if ($this->isColumnModified(CacorrelPeer::CORSOLMAN)) $criteria->add(CacorrelPeer::CORSOLMAN, $this->corsolman);
		if ($this->isColumnModified(CacorrelPeer::CORORDMAN)) $criteria->add(CacorrelPeer::CORORDMAN, $this->corordman);
		if ($this->isColumnModified(CacorrelPeer::COROCMEXT)) $criteria->add(CacorrelPeer::COROCMEXT, $this->corocmext);
		if ($this->isColumnModified(CacorrelPeer::CORSOLCOT)) $criteria->add(CacorrelPeer::CORSOLCOT, $this->corsolcot);
		if ($this->isColumnModified(CacorrelPeer::ID)) $criteria->add(CacorrelPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CacorrelPeer::DATABASE_NAME);

		$criteria->add(CacorrelPeer::ID, $this->id);

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

		$copyObj->setCorcom($this->corcom);

		$copyObj->setCorser($this->corser);

		$copyObj->setCorsol($this->corsol);

		$copyObj->setCorreq($this->correq);

		$copyObj->setCorrec($this->correc);

		$copyObj->setCordes($this->cordes);

		$copyObj->setCorcot($this->corcot);

		$copyObj->setCortra($this->cortra);

		$copyObj->setCorent($this->corent);

		$copyObj->setCorsal($this->corsal);

		$copyObj->setCorpro($this->corpro);

		$copyObj->setCorpag($this->corpag);

		$copyObj->setCorcont($this->corcont);

		$copyObj->setCorsergen($this->corsergen);

		$copyObj->setCorcomext($this->corcomext);

		$copyObj->setCorsolser($this->corsolser);

		$copyObj->setCorsolman($this->corsolman);

		$copyObj->setCorordman($this->corordman);

		$copyObj->setCorocmext($this->corocmext);

		$copyObj->setCorsolcot($this->corsolcot);


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
			self::$peer = new CacorrelPeer();
		}
		return self::$peer;
	}

} 