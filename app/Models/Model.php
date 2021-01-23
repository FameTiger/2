<?php

namespace App\Models;
use Components\Orm\Delete;
use Components\Orm\Select;
use Components\Orm\Insert;
use Components\Orm\Update;
class Model
{
	public function remove(int $id)
	{
		$delete = new Delete;
		$delete->from($this->tableName)->where(['ID'=>$id]);
		return $delete->execute();
	}
	
	public function all()
	{
		$select = new Select;
		$select->from($this->tableName);
		return $select->execute();
	}
	
	public function add($data)
	{
		$valid = $this->validate($data);
		if ($valid!==true){
			throw \Exception($valid);
		}
		$insert = new Insert;
		$insert->into($this->tableName)->values($data);
		return $insert->execute();
	}
	
	public function edit($data)
	{
		$valid = $this->validate($data);
		if ($valid!==true){
			throw new \Exception($valid);
		}
	if (empty($data['ID']) || empty($this->find($data['ID'])))
		{
			throw new \Exception('НЕМА');
		}
		$id = $data['ID'];
		unset ($data['ID']);
		$data['Update_at']=date('Y-m-d H:i:s');
		$update = new Update;
		$update->table($this->tableName)->set($data)->where(['ID'=>$id]);
		return $update->execute();
	}
	
	public function find($id)
	{
		$select = new Select;
		$select->from($this->tableName)->where(['ID'=>$id]);
		foreach($select->execute() as $row)
		{
			return $row;
		}
		return null;
	} 
}