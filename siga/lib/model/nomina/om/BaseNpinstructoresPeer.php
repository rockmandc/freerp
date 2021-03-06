<?php


abstract class BaseNpinstructoresPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npinstructores';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npinstructores';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDPRO = 'npinstructores.CEDPRO';

	
	const NOMPRO = 'npinstructores.NOMPRO';

	
	const TIPPRO = 'npinstructores.TIPPRO';

	
	const ID = 'npinstructores.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedpro', 'Nompro', 'Tippro', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpinstructoresPeer::CEDPRO, NpinstructoresPeer::NOMPRO, NpinstructoresPeer::TIPPRO, NpinstructoresPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedpro', 'nompro', 'tippro', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedpro' => 0, 'Nompro' => 1, 'Tippro' => 2, 'Id' => 3, ),
		BasePeer::TYPE_COLNAME => array (NpinstructoresPeer::CEDPRO => 0, NpinstructoresPeer::NOMPRO => 1, NpinstructoresPeer::TIPPRO => 2, NpinstructoresPeer::ID => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('cedpro' => 0, 'nompro' => 1, 'tippro' => 2, 'id' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpinstructoresMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpinstructoresMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpinstructoresPeer::getTableMap();
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
		return str_replace(NpinstructoresPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpinstructoresPeer::CEDPRO);

		$criteria->addSelectColumn(NpinstructoresPeer::NOMPRO);

		$criteria->addSelectColumn(NpinstructoresPeer::TIPPRO);

		$criteria->addSelectColumn(NpinstructoresPeer::ID);

	}

	const COUNT = 'COUNT(npinstructores.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npinstructores.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpinstructoresPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpinstructoresPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpinstructoresPeer::doSelectRS($criteria, $con);
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
		$objects = NpinstructoresPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpinstructoresPeer::populateObjects(NpinstructoresPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpinstructoresPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpinstructoresPeer::getOMClass();
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
		return NpinstructoresPeer::CLASS_DEFAULT;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(NpinstructoresPeer::DATABASE_NAME);

		$criteria->add(NpinstructoresPeer::ID, $pk);


		$v = NpinstructoresPeer::doSelect($criteria, $con);

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
			$criteria->add(NpinstructoresPeer::ID, $pks, Criteria::IN);
			$objs = NpinstructoresPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpinstructoresPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpinstructoresMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpinstructoresMapBuilder');
}
