<?php

namespace App\Models;

class Users extends Model
{
	private $atributes=[ '9','10','11'
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