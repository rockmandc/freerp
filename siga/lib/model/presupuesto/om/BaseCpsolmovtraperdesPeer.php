<?php


abstract class BaseCpsolmovtraperdesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpsolmovtraperdes';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpsolmovtraperdes';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFTRA = 'cpsolmovtraperdes.REFTRA';

	
	const CODDES = 'cpsolmovtraperdes.CODDES';

	
	const PERPRE = 'cpsolmovtraperdes.PERPRE';

	
	const MONMOV = 'cpsolmovtraperdes.MONMOV';

	
	const ID = 'cpsolmovtraperdes.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reftra', 'Coddes', 'Perpre', 'Monmov', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpsolmovtraperdesPeer::REFTRA, CpsolmovtraperdesPeer::CODDES, CpsolmovtraperdesPeer::PERPRE, CpsolmovtraperdesPeer::MONMOV, CpsolmovtraperdesPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reftra', 'coddes', 'perpre', 'monmov', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reftra' => 0, 'Coddes' => 1, 'Perpre' => 2, 'Monmov' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (CpsolmovtraperdesPeer::REFTRA => 0, CpsolmovtraperdesPeer::CODDES => 1, CpsolmovtraperdesPeer::PERPRE => 2, CpsolmovtraperdesPeer::MONMOV => 3, CpsolmovtraperdesPeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('reftra' => 0, 'coddes' => 1, 'perpre' => 2, 'monmov' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpsolmovtraperdesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpsolmovtraperdesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpsolmovtraperdesPeer::getTableMap();
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
		return str_replace(CpsolmovtraperdesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpsolmovtraperdesPeer::REFTRA);

		$criteria->addSelectColumn(CpsolmovtraperdesPeer::CODDES);

		$criteria->addSelectColumn(CpsolmovtraperdesPeer::PERPRE);

		$criteria->addSelectColumn(CpsolmovtraperdesPeer::MONMOV);

		$criteria->addSelectColumn(CpsolmovtraperdesPeer::ID);

	}

	const COUNT = 'COUNT(cpsolmovtraperdes.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpsolmovtraperdes.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpsolmovtraperdesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpsolmovtraperdesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpsolmovtraperdesPeer::doSelectRS($criteria, $con);
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
		$objects = CpsolmovtraperdesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpsolmovtraperdesPeer::populateObjects(CpsolmovtraperdesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpsolmovtraperdesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpsolmovtraperdesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCpsoltrasla(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpsolmovtraperdesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpsolmovtraperdesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpsolmovtraperdesPeer::REFTRA, CpsoltraslaPeer::REFTRA);

		$rs = CpsolmovtraperdesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCpsoltrasla(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpsolmovtraperdesPeer::addSelectColumns($c);
		$startcol = (CpsolmovtraperdesPeer::NUM_COLUMNS - CpsolmovtraperdesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpsoltraslaPeer::addSelectColumns($c);

		$c->addJoin(CpsolmovtraperdesPeer::REFTRA, CpsoltraslaPeer::REFTRA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpsolmovtraperdesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpsoltraslaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpsoltrasla(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpsolmovtraperdes($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpsolmovtraperdess();
				$obj2->addCpsolmovtraperdes($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpsolmovtraperdesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpsolmovtraperdesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CpsolmovtraperdesPeer::REFTRA, CpsoltraslaPeer::REFTRA);
	
		$rs = CpsolmovtraperdesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpsolmovtraperdesPeer::addSelectColumns($c);
		$startcol2 = (CpsolmovtraperdesPeer::NUM_COLUMNS - CpsolmovtraperdesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpsoltraslaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpsoltraslaPeer::NUM_COLUMNS;
	
			$c->addJoin(CpsolmovtraperdesPeer::REFTRA, CpsoltraslaPeer::REFTRA);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpsolmovtraperdesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CpsoltraslaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpsoltrasla(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpsolmovtraperdes($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCpsolmovtraperdess();
					$obj2->addCpsolmovtraperdes($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return CpsolmovtraperdesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpsolmovtraperdesPeer::ID); 

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
			$comparison = $criteria->getComparison(CpsolmovtraperdesPeer::ID);
			$selectCriteria->add(CpsolmovtraperdesPeer::ID, $criteria->remove(CpsolmovtraperdesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpsolmovtraperdesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpsolmovtraperdesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpsolmovtraperdes) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpsolmovtraperdesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpsolmovtraperdes $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpsolmovtraperdesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpsolmovtraperdesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpsolmovtraperdesPeer::DATABASE_NAME, CpsolmovtraperdesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpsolmovtraperdesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpsolmovtraperdesPeer::DATABASE_NAME);

		$criteria->add(CpsolmovtraperdesPeer::ID, $pk);


		$v = CpsolmovtraperdesPeer::doSelect($criteria, $con);

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
			$criteria->add(CpsolmovtraperdesPeer::ID, $pks, Criteria::IN);
			$objs = CpsolmovtraperdesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpsolmovtraperdesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpsolmovtraperdesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpsolmovtraperdesMapBuilder');
}
