<?php

namespace App\Models;

class UserPermissions extends Model
{
	private $atributes=[ '12','13','14'
	];
	public function getAtributes()
	{
		return $this->atributes;
	}
	public function setAtributes(array $name)
	{
		$this->atributes=$name;
	}
}