<?php


abstract class BaseFadefcajPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fadefcaj';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Fadefcaj';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DESCAJ = 'fadefcaj.DESCAJ';

	
	const CORCAJ = 'fadefcaj.CORCAJ';

	
	const CORFAC = 'fadefcaj.CORFAC';

	
	const CORNUMCTR = 'fadefcaj.CORNUMCTR';

	
	const CODALM = 'fadefcaj.CODALM';

	
	const CONPAG = 'fadefcaj.CONPAG';

	
	const IMPFISNAME = 'fadefcaj.IMPFISNAME';

	
	const IMPFISHOST = 'fadefcaj.IMPFISHOST';

	
	const ID = 'fadefcaj.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Descaj', 'Corcaj', 'Corfac', 'Cornumctr', 'Codalm', 'Conpag', 'Impfisname', 'Impfishost', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FadefcajPeer::DESCAJ, FadefcajPeer::CORCAJ, FadefcajPeer::CORFAC, FadefcajPeer::CORNUMCTR, FadefcajPeer::CODALM, FadefcajPeer::CONPAG, FadefcajPeer::IMPFISNAME, FadefcajPeer::IMPFISHOST, FadefcajPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('descaj', 'corcaj', 'corfac', 'cornumctr', 'codalm', 'conpag', 'impfisname', 'impfishost', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Descaj' => 0, 'Corcaj' => 1, 'Corfac' => 2, 'Cornumctr' => 3, 'Codalm' => 4, 'Conpag' => 5, 'Impfisname' => 6, 'Impfishost' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (FadefcajPeer::DESCAJ => 0, FadefcajPeer::CORCAJ => 1, FadefcajPeer::CORFAC => 2, FadefcajPeer::CORNUMCTR => 3, FadefcajPeer::CODALM => 4, FadefcajPeer::CONPAG => 5, FadefcajPeer::IMPFISNAME => 6, FadefcajPeer::IMPFISHOST => 7, FadefcajPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('descaj' => 0, 'corcaj' => 1, 'corfac' => 2, 'cornumctr' => 3, 'codalm' => 4, 'conpag' => 5, 'impfisname' => 6, 'impfishost' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FadefcajMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FadefcajMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FadefcajPeer::getTableMap();
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
		return str_replace(FadefcajPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FadefcajPeer::DESCAJ);

		$criteria->addSelectColumn(FadefcajPeer::CORCAJ);

		$criteria->addSelectColumn(FadefcajPeer::CORFAC);

		$criteria->addSelectColumn(FadefcajPeer::CORNUMCTR);

		$criteria->addSelectColumn(FadefcajPeer::CODALM);

		$criteria->addSelectColumn(FadefcajPeer::CONPAG);

		$criteria->addSelectColumn(FadefcajPeer::IMPFISNAME);

		$criteria->addSelectColumn(FadefcajPeer::IMPFISHOST);

		$criteria->addSelectColumn(FadefcajPeer::ID);

	}

	const COUNT = 'COUNT(fadefcaj.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fadefcaj.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadefcajPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadefcajPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FadefcajPeer::doSelectRS($criteria, $con);
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
		$objects = FadefcajPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FadefcajPeer::populateObjects(FadefcajPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FadefcajPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FadefcajPeer::getOMClass();
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
		return FadefcajPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FadefcajPeer::ID); 

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
			$comparison = $criteria->getComparison(FadefcajPeer::ID);
			$selectCriteria->add(FadefcajPeer::ID, $criteria->remove(FadefcajPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FadefcajPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FadefcajPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fadefcaj) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FadefcajPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fadefcaj $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FadefcajPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FadefcajPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FadefcajPeer::DATABASE_NAME, FadefcajPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FadefcajPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FadefcajPeer::DATABASE_NAME);

		$criteria->add(FadefcajPeer::ID, $pk);


		$v = FadefcajPeer::doSelect($criteria, $con);

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
			$criteria->add(FadefcajPeer::ID, $pks, Criteria::IN);
			$objs = FadefcajPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFadefcajPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FadefcajMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FadefcajMapBuilder');
}
