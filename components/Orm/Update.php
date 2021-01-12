<?php

 namespace Components\Orm;
	
 class Update
 {
	 protected $condition;
	 protected $type;
	 protected $tableName;
	 protected $columns=[];
	 protected $values=[];
 
	public function where($condition, $type = null)
	{
		$this->condition = $condition;
		$this->type = $type;
	}
 
 	public function table($tableName){
	$this->tableName=$tableName;
	return $this;
	}
	
	public function set($values){
		foreach ($values as $column=>$value){
			$this->columns[]=$column;
			$this->values[]=$value;
		}
		return $this; 
	}
	
	private function createSql():string
	{
		return ' UPDATE '.
		$this->prepareTableName().' '.
		' SET '.$this->prepareSet().' '.
		$this->prepareWhere();
	}
	
	private function prepareTableName()
	{

		return $this->tableName;
	}
	
	private function prepareSet() 
	{
		$result='';
		if(is_array($this->columns)){
			foreach($this->columns as $key=>$value){
					$piece = $value . ' = '. $this->values[$key];
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
	
	private function prepareWhere()
	{
		if(empty($this->condition)) {
			return '';
		}
		$where = new Where($this->condition);
		if(empty($this->type)){
			$result = $where->where();
		}else{
			$result = $where->where($this->type);
		}
		return' WHERE '. $result;
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