<?php

	namespace Components\Orm;
	
 class Insert
 {
	 protected $tableName;
	 protected $columns=[];
	 protected $values=[];
 
 	public function into($tableName){
	$this->tableName=$tableName;
	return $this;
	}
	
	public function values($values){
		foreach ($values as $column=>$value){
			$this->columns[]=$column;
			$this->values[]=$value;
		}
		return $this; 
	}
	
	private function createSql():string
	{
		return 'INSERT INTO '.
		$this->prepareTableName().' ('.
		$this->prepareColumns().' )'.
		' VALUES (' . $this->prepareValues().' )';
	}
	
	private function prepareTableName()
	{

		return $this->tableName;
	}
	
	private function prepareColumns() 
	{
		$result='';
		if(is_array($this->columns)){
			foreach($this->columns as $value){
					$piece = $value;
				if (empty($result))
				{
					$result = $piece;
				}else{
					$result .=', ' . $piece;
				}
			}
		}
		return $result;
	}
	
	private function prepareValues() 
	{
		$result='';
		if(is_array($this->values)){
			foreach($this->values as $value){
					$piece = $value;
				if (empty($result))
				{
					$result = $piece;
				}else{
					$result .=', ' . $piece;
				}
			}
		}
		return $result;
		}
		
	public function execute()
	{
		$sql = $this->createSql();
		//echo $sql;
		return $this->connector->query($sql);
	}
	
	public function __construct()
	{
		$connector= new Connector();
		$this->connector = $connector->connect();
	}
 }