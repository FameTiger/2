<?php

namespace App\Models;

class About extends Model
{
	private $atributes=[ '3','4','5'
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
