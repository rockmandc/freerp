<?php



class MangrutraMapBuilder {

	
	const CLASS_NAME = 'lib.model.mantenimiento.map.MangrutraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mangrutra');
		$tMap->setPhpName('Mangrutra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('mangrutra_SEQ');

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESGRU', 'Desgru', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 