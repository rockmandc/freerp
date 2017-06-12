<?php



class ManidegruMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.ManidegruMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('manidegru');
		$tMap->setPhpName('Manidegru');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('manidegru_SEQ');

		$tMap->addColumn('CODIDE', 'Codide', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESIDE', 'Deside', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 