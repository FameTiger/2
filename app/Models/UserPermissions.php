<?php

namespace App\Models;

class UserPermissions extends Model
{
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