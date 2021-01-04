<?php


//
	namespace Components\Orm;
	
 class Select
 {
	protected $tableName;
	protected $columns='*';
	protected $order;
	protected $group;
	protected $offset;
	protected $limit;
	protected $joinTableName;
	protected $joinColumns='*';
	protected $joinOn;
	
	public function joinTable($columns, $table, $on){
		$this->joinTableName=$table;
		$this->joinColumns=$columns;
		$this->joinOn=$on;
		return $this;
	}
	
	public function from($tableName){
		$this->tableName=$tableName;
		return $this;
	}
	
	public function columns($columns){
	$this->columns=$columns;
	return $this;
	}
	
	
	public function orderBy($order){
		$this->order=$order;
	return $this;
	}
	
	
	public function groupBy($group){
		$this->group=$group;
	return $this;
	}
	
	
	public function offset(int $offset){
		$this->offset=$offset;
	return $this;
	}
	
	
	public function limit(int $limit){
		$this->limit=$limit;
	return $this;
	}
	
	
	
	private function createSql():string
	{
		return 'SELECT '.
		$this->prepareColumns().
		$this->prepareJoinColumns().
		' FROM ' . $this->prepareTableName().
		$this->prepareJoinTable().
		$this->prepareOrder().
		$this->prepareGroup().
		$this->prepareOffset().
		$this->prepareLimit();
	}
	
	
	
	private function prepareOrder(){
		if(empty($this->order)){
			return '';
		}
		return ' ORDER BY '. $this->order; 
	}
	
	
	private function prepareGroup(){
		if(empty($this->group)){
			return '';
		}
		$result='';
		if(is_array($this->group)){
			foreach($this->group as $value){
					$piece= $value;
				if (empty($result))
				{
					$result = $piece;
				}else{
					$result .=', ' . $piece;
				}
			}
		} else{
			$result=$this->group;
		}
		return ' GROUP BY '. $result;
	}
	
	
	
	private function prepareOffset(){
		if(empty($this->offset)){
			return '';
		}
			return ' OFFSET '. $this->offset; 
	}
	
	
	
	private function prepareLimit(){
		if(empty($this->limit)){
			return '';
		}
		return ' LIMIT '. $this->limit; 
	}
	
	
	private function prepareColumns() ////////////Urrrrrrrrr
	{
		$result='';
		if(is_array($this->columns)){
			foreach($this->columns as $alias=>$value){
				if(is_int($alias)){
					$piece = $this->getTableName().'.'. $value;
				} else {
					$piece = $this->getTableName().'.'. $value . ' AS ' .$alias;
				}
				if (empty($result))
				{
					$result = $piece;
				}else{
					$result .=', ' . $piece;
				}
			}
		} else{
			$result = $this->getTableName().'.'. $this->columns;
		}
		return $result;
	}
	
	
		private function prepareJoinColumns()
	{
		if(empty($this->joinColumns)){
			return'';
		}
		$result='';
		if(is_array($this->joinColumns)){
			foreach($this->joinColumns as $alias=>$value){
				if(is_int($alias)){
					$piece = $this->getJoinTableName().'.'. $value;
				} else {
					$piece = $this->getJoinTableName().'.'. $value . ' AS ' .$alias;
				}
				if (empty($result))
				{
					$result = $piece;
				}else{
					$result .=', ' . $piece;
				}
			}
		} else{
			$result = $this->getJoinTableName().'.'. $this->joinColumns;
		}
		return ', ' . $result;
		
	}
	
	
	
	
	
	
	
	private function getTableName(){
		$result='';
		if(is_array($this->tableName)){
			foreach($this->tableName as $alias=>$value){
				if(is_int($alias)){
					$piece= $value;
				} else {
					$piece = $alias;
				}
				$result = $piece;
				break;
			}
		} else{
			$result=$this->tableName;
		}
		return $result;
	}
	
	
	
	private function getJoinTableName(){
		$result='';
		if(is_array($this->joinTableName)){
			foreach($this->joinTableName as $alias=>$value){
				if(is_int($alias)){
					$piece= $value;
				} else {
					$piece = $alias;
				}
				$result = $piece;
				break;
			}
		} else{
			$result=$this->joinTableName;
		}
		return $result;
	}
	
	
	private function prepareJoinTable(){
		if(empty($this->joinTableName)|| empty($this->joinOn)){
			return'';
		}
		$result = ' JOIN '. $this->prepareJoinTableName().' ON ';
		$on = '';
		foreach($this->joinOn as $column=>$joinColumn){
			$piece=$this->getTableName().'.'. $column.'='.
			$this->getJoinTableName().'.'. $joinColumn;
			if(empty($on)){
				$on=$piece;
			}
			else{
				$on.=' AND '. $piece;
			}
		}
		return $result.$on; //////////////////////////UURRRRRRRR
	}
	
	
	
	private function prepareJoinTableName()
	{
		$result='';
		if(is_array($this->joinTableName)){
			foreach($this->joinTableName as $alias=>$value){
				if(is_int($alias)){
					$piece= $value;
				} else {
					$piece = $value . ' AS ' .$alias;
				}
				$result = $piece;
				break;
			}
		} else{
			$result=$this->joinTableName;
		}
		return $result;
	}
	
	
	
	
	
	
	
	private function prepareTableName()
	{
		$result='';
		if(is_array($this->tableName)){
			foreach($this->tableName as $alias=>$value){
				if(is_int($alias)){
					$piece= $value;
				} else {
					$piece = $value . ' AS ' .$alias;
				}
				$result = $piece;
				break;
			}
		} else{
			$result=$this->tableName;
		}
		return $result;
	}
	
	
	
	public function __construct()
	{
		$connector= new Connector();
		$this->connector = $connector->connect();
	}
	
	
	
	public function execute()
	{
		$sql = $this->createSql();
		//echo $sql;
		return $this->connector->query($sql);
	}
	}
	
	
	
	
	
	
	
	