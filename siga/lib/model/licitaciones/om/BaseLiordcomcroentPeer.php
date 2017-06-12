<?php


abstract class BaseLiordcomcroentPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liordcomcroent';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liordcomcroent';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMORD = 'liordcomcroent.NUMORD';

	
	const CODART = 'liordcomcroent.CODART';

	
	const CANTID = 'liordcomcroent.CANTID';

	
	const CODUNIADM = 'liordcomcroent.CODUNIADM';

	
	const FECENT = 'liordcomcroent.FECENT';

	
	const CONDIC = 'liordcomcroent.CONDIC';

	
	const ID = 'liordcomcroent.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numord', 'Codart', 'Cantid', 'Coduniadm', 'Fecent', 'Condic', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiordcomcroentPeer::NUMORD, LiordcomcroentPeer::CODART, LiordcomcroentPeer::CANTID, LiordcomcroentPeer::CODUNIADM, LiordcomcroentPeer::FECENT, LiordcomcroentPeer::CONDIC, LiordcomcroentPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numord', 'codart', 'cantid', 'coduniadm', 'fecent', 'condic', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numord' => 0, 'Codart' => 1, 'Cantid' => 2, 'Coduniadm' => 3, 'Fecent' => 4, 'Condic' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (LiordcomcroentPeer::NUMORD => 0, LiordcomcroentPeer::CODART => 1, LiordcomcroentPeer::CANTID => 2, LiordcomcroentPeer::CODUNIADM => 3, LiordcomcroentPeer::FECENT => 4, LiordcomcroentPeer::CONDIC => 5, LiordcomcroentPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('numord' => 0, 'codart' => 1, 'cantid' => 2, 'coduniadm' => 3, 'fecent' => 4, 'condic' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiordcomcroentMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiordcomcroentMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiordcomcroentPeer::getTableMap();
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
		return str_replace(LiordcomcroentPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiordcomcroentPeer::NUMORD);

		$criteria->addSelectColumn(LiordcomcroentPeer::CODART);

		$criteria->addSelectColumn(LiordcomcroentPeer::CANTID);

		$criteria->addSelectColumn(LiordcomcroentPeer::CODUNIADM);

		$criteria->addSelectColumn(LiordcomcroentPeer::FECENT);

		$criteria->addSelectColumn(LiordcomcroentPeer::CONDIC);

		$criteria->addSelectColumn(LiordcomcroentPeer::ID);

	}

	const COUNT = 'COUNT(liordcomcroent.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liordcomcroent.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiordcomcroentPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiordcomcroentPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiordcomcroentPeer::doSelectRS($criteria, $con);
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
		$objects = LiordcomcroentPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiordcomcroentPeer::populateObjects(LiordcomcroentPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiordcomcroentPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiordcomcroentPeer::getOMClass();
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
		return LiordcomcroentPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiordcomcroentPeer::ID); 

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
			$comparison = $criteria->getComparison(LiordcomcroentPeer::ID);
			$selectCriteria->add(LiordcomcroentPeer::ID, $criteria->remove(LiordcomcroentPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiordcomcroentPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiordcomcroentPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liordcomcroent) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiordcomcroentPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liordcomcroent $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiordcomcroentPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiordcomcroentPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiordcomcroentPeer::DATABASE_NAME, LiordcomcroentPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiordcomcroentPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiordcomcroentPeer::DATABASE_NAME);

		$criteria->add(LiordcomcroentPeer::ID, $pk);


		$v = LiordcomcroentPeer::doSelect($criteria, $con);

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
			$criteria->add(LiordcomcroentPeer::ID, $pks, Criteria::IN);
			$objs = LiordcomcroentPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiordcomcroentPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiordcomcroentMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiordcomcroentMapBuilder');
}
