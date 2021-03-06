<?php



class LidetactinsMapBuilder {

	
	const CLASS_NAME = 'lib.model.licitaciones.map.LidetactinsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lidetactins');
		$tMap->setPhpName('Lidetactins');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lidetactins_SEQ');

		$tMap->addForeignKey('NUMINS', 'Numins', 'string', CreoleTypes::VARCHAR, 'liinspecciones', 'NUMINS', false, 8);

		$tMap->addForeignKey('NUMACT', 'Numact', 'string', CreoleTypes::VARCHAR, 'liactas', 'NUMACT', false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 