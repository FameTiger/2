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
 
 	public function from($tableName){
	$this->tableName=$tableName;
	return $this;
	}
	
	private function createSql():string
	{
		return ' DELETE FROM '.
		$this->prepareTableName().' '.
		$this->prepareWhere();
	}
	
	private function prepareTableName()
	{

		return $this->tableName;
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