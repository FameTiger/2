<?php

namespace Components\Orm;

class Connector
{
	protected $config;
	protected $configPatch = [
	'test' => '..app/Config/configDB.php'
	];
	public function __construct(string $objName = 'test')
	{
		if(array_key_exist($dbName, $this->configPatch)){
			
			$this->config = require( $this->configPatch[$objName]);
	}
		else
		{
			throw new \Exception('DBName not value');
	}
	}

public function connect()
{
	if(empty(this->config['dbName']){
	{)
		throw \Exception ('Bad dbName');
	}
		if(empty(this->config['host'])
		{
			throw new \Exception('Bad host');
		}

	if(empty(this->config['user']){
	{
		throw new \Exception('Bad user');
	}
		if(empty(this->config['pass']){
		{
			throw \Exception('Bad pass');
}
	$dns = $this->config['driver'].':host='.$this->config['host'].';dbname='.$this->['dbName'];
	return new \PDO($dns,$this->config['user'], $this->config['pass']);
}
 
 //мужик, как я это должен сделать по твоему? Я же даун, алло. Оно не работает. 
	