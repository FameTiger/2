<?php

namespace App\Models;

class UserPermissions extends Model
{
	protected $tableName = 'user_permission';
    private $attributes = ['12', '13', '14'];

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $name)
    {
        $this->attributes = $name;
    }
}