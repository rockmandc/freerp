<?php


abstract class BaseLiplieactPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liplieact';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liplieact';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPLIE = 'liplieact.NUMPLIE';

	
	const NUMEXP = 'liplieact.NUMEXP';

	
	const DESACT = 'liplieact.DESACT';

	
	const FECDES = 'liplieact.FECDES';

	
	const HORDES = 'liplieact.HORDES';

	
	const FECHAS = 'liplieact.FECHAS';

	
	const HORHAS = 'liplieact.HORHAS';

	
	const LUGAR = 'liplieact.LUGAR';

	
	const DIREC = 'liplieact.DIREC';

	
	const TIPCONPUB = 'liplieact.TIPCONPUB';

	
	const ID = 'liplieact.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie', 'Numexp', 'Desact', 'Fecdes', 'Hordes', 'Fechas', 'Horhas', 'Lugar', 'Direc', 'Tipconpub', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiplieactPeer::NUMPLIE, LiplieactPeer::NUMEXP, LiplieactPeer::DESACT, LiplieactPeer::FECDES, LiplieactPeer::HORDES, LiplieactPeer::FECHAS, LiplieactPeer::HORHAS, LiplieactPeer::LUGAR, LiplieactPeer::DIREC, LiplieactPeer::TIPCONPUB, LiplieactPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie', 'numexp', 'desact', 'fecdes', 'hordes', 'fechas', 'horhas', 'lugar', 'direc', 'tipconpub', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie' => 0, 'Numexp' => 1, 'Desact' => 2, 'Fecdes' => 3, 'Hordes' => 4, 'Fechas' => 5, 'Horhas' => 6, 'Lugar' => 7, 'Direc' => 8, 'Tipconpub' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (LiplieactPeer::NUMPLIE => 0, LiplieactPeer::NUMEXP => 1, LiplieactPeer::DESACT => 2, LiplieactPeer::FECDES => 3, LiplieactPeer::HORDES => 4, LiplieactPeer::FECHAS => 5, LiplieactPeer::HORHAS => 6, LiplieactPeer::LUGAR => 7, LiplieactPeer::DIREC => 8, LiplieactPeer::TIPCONPUB => 9, LiplieactPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie' => 0, 'numexp' => 1, 'desact' => 2, 'fecdes' => 3, 'hordes' => 4, 'fechas' => 5, 'horhas' => 6, 'lugar' => 7, 'direc' => 8, 'tipconpub' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiplieactMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiplieactMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiplieactPeer::getTableMap();
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
		return str_replace(LiplieactPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiplieactPeer::NUMPLIE);

		$criteria->addSelectColumn(LiplieactPeer::NUMEXP);

		$criteria->addSelectColumn(LiplieactPeer::DESACT);

		$criteria->addSelectColumn(LiplieactPeer::FECDES);

		$criteria->addSelectColumn(LiplieactPeer::HORDES);

		$criteria->addSelectColumn(LiplieactPeer::FECHAS);

		$criteria->addSelectColumn(LiplieactPeer::HORHAS);

		$criteria->addSelectColumn(LiplieactPeer::LUGAR);

		$criteria->addSelectColumn(LiplieactPeer::DIREC);

		$criteria->addSelectColumn(LiplieactPeer::TIPCONPUB);

		$criteria->addSelectColumn(LiplieactPeer::ID);

	}

	const COUNT = 'COUNT(liplieact.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liplieact.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiplieactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiplieactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiplieactPeer::doSelectRS($criteria, $con);
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
		$objects = LiplieactPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiplieactPeer::populateObjects(LiplieactPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiplieactPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiplieactPeer::getOMClass();
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
		return LiplieactPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiplieactPeer::ID); 

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
			$comparison = $criteria->getComparison(LiplieactPeer::ID);
			$selectCriteria->add(LiplieactPeer::ID, $criteria->remove(LiplieactPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiplieactPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiplieactPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liplieact) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiplieactPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liplieact $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiplieactPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiplieactPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiplieactPeer::DATABASE_NAME, LiplieactPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiplieactPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiplieactPeer::DATABASE_NAME);

		$criteria->add(LiplieactPeer::ID, $pk);


		$v = LiplieactPeer::doSelect($criteria, $con);

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
			$criteria->add(LiplieactPeer::ID, $pks, Criteria::IN);
			$objs = LiplieactPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiplieactPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiplieactMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiplieactMapBuilder');
}
