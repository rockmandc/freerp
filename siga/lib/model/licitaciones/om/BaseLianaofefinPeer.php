<?php


abstract class BaseLianaofefinPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lianaofefin';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Lianaofefin';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMANAOFE = 'lianaofefin.NUMANAOFE';

	
	const CODCRI = 'lianaofefin.CODCRI';

	
	const PUNEMP = 'lianaofefin.PUNEMP';

	
	const POREMP = 'lianaofefin.POREMP';

	
	const OBSERV = 'lianaofefin.OBSERV';

	
	const TIPCONPUB = 'lianaofefin.TIPCONPUB';

	
	const ID = 'lianaofefin.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numanaofe', 'Codcri', 'Punemp', 'Poremp', 'Observ', 'Tipconpub', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LianaofefinPeer::NUMANAOFE, LianaofefinPeer::CODCRI, LianaofefinPeer::PUNEMP, LianaofefinPeer::POREMP, LianaofefinPeer::OBSERV, LianaofefinPeer::TIPCONPUB, LianaofefinPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numanaofe', 'codcri', 'punemp', 'poremp', 'observ', 'tipconpub', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numanaofe' => 0, 'Codcri' => 1, 'Punemp' => 2, 'Poremp' => 3, 'Observ' => 4, 'Tipconpub' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (LianaofefinPeer::NUMANAOFE => 0, LianaofefinPeer::CODCRI => 1, LianaofefinPeer::PUNEMP => 2, LianaofefinPeer::POREMP => 3, LianaofefinPeer::OBSERV => 4, LianaofefinPeer::TIPCONPUB => 5, LianaofefinPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('numanaofe' => 0, 'codcri' => 1, 'punemp' => 2, 'poremp' => 3, 'observ' => 4, 'tipconpub' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LianaofefinMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LianaofefinMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LianaofefinPeer::getTableMap();
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
		return str_replace(LianaofefinPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LianaofefinPeer::NUMANAOFE);

		$criteria->addSelectColumn(LianaofefinPeer::CODCRI);

		$criteria->addSelectColumn(LianaofefinPeer::PUNEMP);

		$criteria->addSelectColumn(LianaofefinPeer::POREMP);

		$criteria->addSelectColumn(LianaofefinPeer::OBSERV);

		$criteria->addSelectColumn(LianaofefinPeer::TIPCONPUB);

		$criteria->addSelectColumn(LianaofefinPeer::ID);

	}

	const COUNT = 'COUNT(lianaofefin.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lianaofefin.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LianaofefinPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LianaofefinPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LianaofefinPeer::doSelectRS($criteria, $con);
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
		$objects = LianaofefinPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LianaofefinPeer::populateObjects(LianaofefinPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LianaofefinPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LianaofefinPeer::getOMClass();
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
		return LianaofefinPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LianaofefinPeer::ID); 

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
			$comparison = $criteria->getComparison(LianaofefinPeer::ID);
			$selectCriteria->add(LianaofefinPeer::ID, $criteria->remove(LianaofefinPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LianaofefinPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LianaofefinPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lianaofefin) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LianaofefinPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lianaofefin $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LianaofefinPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LianaofefinPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LianaofefinPeer::DATABASE_NAME, LianaofefinPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LianaofefinPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LianaofefinPeer::DATABASE_NAME);

		$criteria->add(LianaofefinPeer::ID, $pk);


		$v = LianaofefinPeer::doSelect($criteria, $con);

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
			$criteria->add(LianaofefinPeer::ID, $pks, Criteria::IN);
			$objs = LianaofefinPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLianaofefinPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LianaofefinMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LianaofefinMapBuilder');
}
