<?php

namespace App\Models;

class Users extends Model
{
    private $attributes = ['9', '10', '11'];

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $name)
    {
        $this->attributes = $name;
    }
}