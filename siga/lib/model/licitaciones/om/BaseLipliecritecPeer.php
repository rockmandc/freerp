<?php


abstract class BaseLipliecritecPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lipliecritec';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Lipliecritec';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPLIE = 'lipliecritec.NUMPLIE';

	
	const NUMEXP = 'lipliecritec.NUMEXP';

	
	const CODCRI = 'lipliecritec.CODCRI';

	
	const PUNTUA = 'lipliecritec.PUNTUA';

	
	const PORCEN = 'lipliecritec.PORCEN';

	
	const LIMITA = 'lipliecritec.LIMITA';

	
	const TIPCONPUB = 'lipliecritec.TIPCONPUB';

	
	const ID = 'lipliecritec.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie', 'Numexp', 'Codcri', 'Puntua', 'Porcen', 'Limita', 'Tipconpub', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LipliecritecPeer::NUMPLIE, LipliecritecPeer::NUMEXP, LipliecritecPeer::CODCRI, LipliecritecPeer::PUNTUA, LipliecritecPeer::PORCEN, LipliecritecPeer::LIMITA, LipliecritecPeer::TIPCONPUB, LipliecritecPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie', 'numexp', 'codcri', 'puntua', 'porcen', 'limita', 'tipconpub', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie' => 0, 'Numexp' => 1, 'Codcri' => 2, 'Puntua' => 3, 'Porcen' => 4, 'Limita' => 5, 'Tipconpub' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (LipliecritecPeer::NUMPLIE => 0, LipliecritecPeer::NUMEXP => 1, LipliecritecPeer::CODCRI => 2, LipliecritecPeer::PUNTUA => 3, LipliecritecPeer::PORCEN => 4, LipliecritecPeer::LIMITA => 5, LipliecritecPeer::TIPCONPUB => 6, LipliecritecPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie' => 0, 'numexp' => 1, 'codcri' => 2, 'puntua' => 3, 'porcen' => 4, 'limita' => 5, 'tipconpub' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LipliecritecMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LipliecritecMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LipliecritecPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(LipliecritecPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LipliecritecPeer::NUMPLIE);

		$criteria->addSelectColumn(LipliecritecPeer::NUMEXP);

		$criteria->addSelectColumn(LipliecritecPeer::CODCRI);

		$criteria->addSelectColumn(LipliecritecPeer::PUNTUA);

		$criteria->addSelectColumn(LipliecritecPeer::PORCEN);

		$criteria->addSelectColumn(LipliecritecPeer::LIMITA);

		$criteria->addSelectColumn(LipliecritecPeer::TIPCONPUB);

		$criteria->addSelectColumn(LipliecritecPeer::ID);

	}

	const COUNT = 'COUNT(lipliecritec.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lipliecritec.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LipliecritecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LipliecritecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LipliecritecPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = LipliecritecPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LipliecritecPeer::populateObjects(LipliecritecPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LipliecritecPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LipliecritecPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return LipliecritecPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LipliecritecPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(LipliecritecPeer::ID);
			$selectCriteria->add(LipliecritecPeer::ID, $criteria->remove(LipliecritecPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(LipliecritecPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(LipliecritecPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lipliecritec) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LipliecritecPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Lipliecritec $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LipliecritecPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LipliecritecPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(LipliecritecPeer::DATABASE_NAME, LipliecritecPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LipliecritecPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(LipliecritecPeer::DATABASE_NAME);

		$criteria->add(LipliecritecPeer::ID, $pk);


		$v = LipliecritecPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(LipliecritecPeer::ID, $pks, Criteria::IN);
			$objs = LipliecritecPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLipliecritecPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LipliecritecMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LipliecritecMapBuilder');
}
