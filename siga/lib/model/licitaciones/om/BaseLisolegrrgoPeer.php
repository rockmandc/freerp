<?php


abstract class BaseLisolegrrgoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lisolegrrgo';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Lisolegrrgo';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOL = 'lisolegrrgo.NUMSOL';

	
	const CODCAT = 'lisolegrrgo.CODCAT';

	
	const CODART = 'lisolegrrgo.CODART';

	
	const CODRGO = 'lisolegrrgo.CODRGO';

	
	const MONRGO = 'lisolegrrgo.MONRGO';

	
	const CODPRE = 'lisolegrrgo.CODPRE';

	
	const TIPCONPUB = 'lisolegrrgo.TIPCONPUB';

	
	const ID = 'lisolegrrgo.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol', 'Codcat', 'Codart', 'Codrgo', 'Monrgo', 'Codpre', 'Tipconpub', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LisolegrrgoPeer::NUMSOL, LisolegrrgoPeer::CODCAT, LisolegrrgoPeer::CODART, LisolegrrgoPeer::CODRGO, LisolegrrgoPeer::MONRGO, LisolegrrgoPeer::CODPRE, LisolegrrgoPeer::TIPCONPUB, LisolegrrgoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol', 'codcat', 'codart', 'codrgo', 'monrgo', 'codpre', 'tipconpub', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol' => 0, 'Codcat' => 1, 'Codart' => 2, 'Codrgo' => 3, 'Monrgo' => 4, 'Codpre' => 5, 'Tipconpub' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (LisolegrrgoPeer::NUMSOL => 0, LisolegrrgoPeer::CODCAT => 1, LisolegrrgoPeer::CODART => 2, LisolegrrgoPeer::CODRGO => 3, LisolegrrgoPeer::MONRGO => 4, LisolegrrgoPeer::CODPRE => 5, LisolegrrgoPeer::TIPCONPUB => 6, LisolegrrgoPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol' => 0, 'codcat' => 1, 'codart' => 2, 'codrgo' => 3, 'monrgo' => 4, 'codpre' => 5, 'tipconpub' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LisolegrrgoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LisolegrrgoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LisolegrrgoPeer::getTableMap();
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
		return str_replace(LisolegrrgoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LisolegrrgoPeer::NUMSOL);

		$criteria->addSelectColumn(LisolegrrgoPeer::CODCAT);

		$criteria->addSelectColumn(LisolegrrgoPeer::CODART);

		$criteria->addSelectColumn(LisolegrrgoPeer::CODRGO);

		$criteria->addSelectColumn(LisolegrrgoPeer::MONRGO);

		$criteria->addSelectColumn(LisolegrrgoPeer::CODPRE);

		$criteria->addSelectColumn(LisolegrrgoPeer::TIPCONPUB);

		$criteria->addSelectColumn(LisolegrrgoPeer::ID);

	}

	const COUNT = 'COUNT(lisolegrrgo.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lisolegrrgo.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LisolegrrgoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LisolegrrgoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LisolegrrgoPeer::doSelectRS($criteria, $con);
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
		$objects = LisolegrrgoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LisolegrrgoPeer::populateObjects(LisolegrrgoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LisolegrrgoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LisolegrrgoPeer::getOMClass();
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
		return LisolegrrgoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LisolegrrgoPeer::ID); 

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
			$comparison = $criteria->getComparison(LisolegrrgoPeer::ID);
			$selectCriteria->add(LisolegrrgoPeer::ID, $criteria->remove(LisolegrrgoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LisolegrrgoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LisolegrrgoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lisolegrrgo) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LisolegrrgoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lisolegrrgo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LisolegrrgoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LisolegrrgoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LisolegrrgoPeer::DATABASE_NAME, LisolegrrgoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LisolegrrgoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LisolegrrgoPeer::DATABASE_NAME);

		$criteria->add(LisolegrrgoPeer::ID, $pk);


		$v = LisolegrrgoPeer::doSelect($criteria, $con);

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
			$criteria->add(LisolegrrgoPeer::ID, $pks, Criteria::IN);
			$objs = LisolegrrgoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLisolegrrgoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LisolegrrgoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LisolegrrgoMapBuilder');
}
