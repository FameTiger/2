<?php

namespace Components\Orm;
class Where
{
	
	const AND_CONDITION = 'AND';
	const OR_CONDITION = 'OR';
	
	
	protected $condition;
	
	public function __construct($condition)
	{
		$this->condition = $condition;
	}
	
	
	public function where($type = self::AND_CONDITION)
	{
		$result;
		
		if (is_array($this->condition)) {
			foreach ($this->condition as $column => $condition) {
				if (empty($result)){
					$result = $column . '=' . $condition;
			} else{
				$result .=' '. $type .' '. $column . '='. $condition ;
			}
		}
		}else{
	$result	= $this->condition;
		}
		return $result;
	}
}