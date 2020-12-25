<?php

namespace App\Models;

class Index extends Model
{
	private $atributes=[ '0','1','2'
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
