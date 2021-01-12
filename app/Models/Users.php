<?php

namespace App\Models;

use Components\Orm\Select;

class Users extends Model
{	




	protected $tableName = 'users';
    private $attributes = ['9', '10', '11'];

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $name)
    {
        $this->attributes = $name;
    }
	
	public function all()
	{
		//$this->select()->from($this->tableName)->execute();
		//return $select->execute();
		//
		$select = new Select;
		$select->from($this->tableName);
		//var_export($select->getSqlString());
		return $select->execute();
	}
}