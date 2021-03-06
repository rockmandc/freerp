<?php



class FaartpvpMapBuilder {

	
	const CLASS_NAME = 'lib.model.facturacion.map.FaartpvpMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faartpvp');
		$tMap->setPhpName('Faartpvp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faartpvp_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODBAR', 'Codbar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('PVPART', 'Pvpart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESPVP', 'Despvp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 