<?php



class LicroentMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LicroentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('licroent');
		$tMap->setPhpName('Licroent');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('licroent_SEQ');

		$tMap->addColumn('NUMOFE', 'Numofe', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CANTID', 'Cantid', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODUNIADM', 'Coduniadm', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CONDIC', 'Condic', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TIPCONPUB', 'Tipconpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CANTIDENT', 'Cantident', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('LIFORPAG_ID', 'LiforpagId', 'int', CreoleTypes::INTEGER, 'liforpag', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 