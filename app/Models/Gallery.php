<?php

namespace App\Models;

class Gallery extends Model
{
	private $atributes=[ '6','7','8'
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
