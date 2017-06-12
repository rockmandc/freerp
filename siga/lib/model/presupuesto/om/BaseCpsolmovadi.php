<?php


abstract class BaseCpsolmovadi extends BaseObject  implements Persistent {



	protected static $peer;



	protected $refadi;



	protected $codpre;



	protected $perpre;



	protected $monmov;



	protected $stamov;



	protected $nrores;



	protected $fecres;



	protected $tipo;



	protected $monto;



	protected $iva;



	protected $id;


	protected $aCpsoladidis;


	protected $alreadyInSave = false;


	protected $alreadyInValidation = false;


  public function getRefadi()
  {

    return trim($this->refadi);

  }

  public function getCodpre()
  {

    return trim($this->codpre);

  }

  public function getPerpre()
  {

    return trim($this->perpre);

  }

  public function getMonmov($val=false)
  {

    if($val) return number_format($this->monmov,2,',','.');
    else return $this->monmov;

  }

  public function getStamov()
  {

    return trim($this->stamov);

  }

  public function getNrores()
  {

    return trim($this->nrores);

  }

  public function getFecres($format = 'Y-m-d')
  {

    if ($this->fecres === null || $this->fecres === '') {
      return null;
    } elseif (!is_int($this->fecres)) {
            $ts = adodb_strtotime($this->fecres);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecres] as date/time value: " . var_export($this->fecres, true));
      }
    } else {
      $ts = $this->fecres;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }


  public function getTipo()
  {

    return trim($this->tipo);

  }

  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }

  public function getIva($val=false)
  {

    if($val) return number_format($this->iva,2,',','.');
    else return $this->iva;

  }

  public function getId()
  {

    return $this->id;

  }

	public function setRefadi($v)
	{

    if ($this->refadi !== $v) {
        $this->refadi = $v;
        $this->modifiedColumns[] = CpsolmovadiPeer::REFADI;
      }

		if ($this->aCpsoladidis !== null && $this->aCpsoladidis->getRefadi() !== $v) {
			$this->aCpsoladidis = null;
		}

	}

	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CpsolmovadiPeer::CODPRE;
      }

	}

	public function setPerpre($v)
	{

    if ($this->perpre !== $v) {
        $this->perpre = $v;
        $this->modifiedColumns[] = CpsolmovadiPeer::PERPRE;
      }

	}

	public function setMonmov($v)
	{

    if ($this->monmov !== $v) {
        $this->monmov = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpsolmovadiPeer::MONMOV;
      }

	}

	public function setStamov($v)
	{

    if ($this->stamov !== $v) {
        $this->stamov = $v;
        $this->modifiedColumns[] = CpsolmovadiPeer::STAMOV;
      }

	}

	public function setNrores($v)
	{

    if ($this->nrores !== $v) {
        $this->nrores = $v;
        $this->modifiedColumns[] = CpsolmovadiPeer::NRORES;
      }

	}

	public function setFecres($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecres] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecres !== $ts) {
      $this->fecres = $ts;
      $this->modifiedColumns[] = CpsolmovadiPeer::FECRES;
    }

	}

	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CpsolmovadiPeer::TIPO;
      }

	}

	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpsolmovadiPeer::MONTO;
      }

	}

	public function setIva($v)
	{

    if ($this->iva !== $v) {
        $this->iva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpsolmovadiPeer::IVA;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpsolmovadiPeer::ID;
      }

	}

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refadi = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->perpre = $rs->getString($startcol + 2);

      $this->monmov = $rs->getFloat($startcol + 3);

      $this->stamov = $rs->getString($startcol + 4);

      $this->nrores = $rs->getString($startcol + 5);

      $this->fecres = $rs->getDate($startcol + 6, null);

      $this->tipo = $rs->getString($startcol + 7);

      $this->monto = $rs->getFloat($startcol + 8);

      $this->iva = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11;
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpsolmovadi object", $e);
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
			$con = Propel::getConnection(CpsolmovadiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpsolmovadiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpsolmovadiPeer::DATABASE_NAME);
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



			if ($this->aCpsoladidis !== null) {
				if ($this->aCpsoladidis->isModified()) {
					$affectedRows += $this->aCpsoladidis->save($con);
				}
				$this->setCpsoladidis($this->aCpsoladidis);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CpsolmovadiPeer::doInsert($this, $con);
					$affectedRows += 1;
					$this->setId($pk);
					$this->setNew(false);
				} else {
					$affectedRows += CpsolmovadiPeer::doUpdate($this, $con);
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



			if ($this->aCpsoladidis !== null) {
				if (!$this->aCpsoladidis->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpsoladidis->getValidationFailures());
				}
			}


			if (($retval = CpsolmovadiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}


	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpsolmovadiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}


	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefadi();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getPerpre();
				break;
			case 3:
				return $this->getMonmov();
				break;
			case 4:
				return $this->getStamov();
				break;
			case 5:
				return $this->getNrores();
				break;
			case 6:
				return $this->getFecres();
				break;
			case 7:
				return $this->getTipo();
				break;
			case 8:
				return $this->getMonto();
				break;
			case 9:
				return $this->getIva();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}


	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpsolmovadiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefadi(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getPerpre(),
			$keys[3] => $this->getMonmov(),
			$keys[4] => $this->getStamov(),
			$keys[5] => $this->getNrores(),
			$keys[6] => $this->getFecres(),
			$keys[7] => $this->getTipo(),
			$keys[8] => $this->getMonto(),
			$keys[9] => $this->getIva(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}


	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpsolmovadiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}


	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefadi($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setPerpre($value);
				break;
			case 3:
				$this->setMonmov($value);
				break;
			case 4:
				$this->setStamov($value);
				break;
			case 5:
				$this->setNrores($value);
				break;
			case 6:
				$this->setFecres($value);
				break;
			case 7:
				$this->setTipo($value);
				break;
			case 8:
				$this->setMonto($value);
				break;
			case 9:
				$this->setIva($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}


	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpsolmovadiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefadi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonmov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStamov($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNrores($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecres($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonto($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIva($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}


	public function buildCriteria()
	{
		$criteria = new Criteria(CpsolmovadiPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpsolmovadiPeer::REFADI)) $criteria->add(CpsolmovadiPeer::REFADI, $this->refadi);
		if ($this->isColumnModified(CpsolmovadiPeer::CODPRE)) $criteria->add(CpsolmovadiPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpsolmovadiPeer::PERPRE)) $criteria->add(CpsolmovadiPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(CpsolmovadiPeer::MONMOV)) $criteria->add(CpsolmovadiPeer::MONMOV, $this->monmov);
		if ($this->isColumnModified(CpsolmovadiPeer::STAMOV)) $criteria->add(CpsolmovadiPeer::STAMOV, $this->stamov);
		if ($this->isColumnModified(CpsolmovadiPeer::NRORES)) $criteria->add(CpsolmovadiPeer::NRORES, $this->nrores);
		if ($this->isColumnModified(CpsolmovadiPeer::FECRES)) $criteria->add(CpsolmovadiPeer::FECRES, $this->fecres);
		if ($this->isColumnModified(CpsolmovadiPeer::TIPO)) $criteria->add(CpsolmovadiPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CpsolmovadiPeer::MONTO)) $criteria->add(CpsolmovadiPeer::MONTO, $this->monto);
		if ($this->isColumnModified(CpsolmovadiPeer::IVA)) $criteria->add(CpsolmovadiPeer::IVA, $this->iva);
		if ($this->isColumnModified(CpsolmovadiPeer::ID)) $criteria->add(CpsolmovadiPeer::ID, $this->id);

		return $criteria;
	}


	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpsolmovadiPeer::DATABASE_NAME);

		$criteria->add(CpsolmovadiPeer::ID, $this->id);

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

		$copyObj->setRefadi($this->refadi);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setPerpre($this->perpre);

		$copyObj->setMonmov($this->monmov);

		$copyObj->setStamov($this->stamov);

		$copyObj->setNrores($this->nrores);

		$copyObj->setFecres($this->fecres);

		$copyObj->setTipo($this->tipo);

		$copyObj->setMonto($this->monto);

		$copyObj->setIva($this->iva);


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
			self::$peer = new CpsolmovadiPeer();
		}
		return self::$peer;
	}


	public function setCpsoladidis($v)
	{


		if ($v === null) {
			$this->setRefadi(NULL);
		} else {
			$this->setRefadi($v->getRefadi());
		}


		$this->aCpsoladidis = $v;
	}



	public function getCpsoladidis($con = null)
	{
		if ($this->aCpsoladidis === null && (($this->refadi !== "" && $this->refadi !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpsoladidisPeer.php';

      $c = new Criteria();
      $c->add(CpsoladidisPeer::REFADI,$this->refadi);

			$this->aCpsoladidis = CpsoladidisPeer::doSelectOne($c, $con);


		}
		return $this->aCpsoladidis;
	}

}