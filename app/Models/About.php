<?php

namespace App\Models;

class About extends Model
{
    private $attributes = ['3', '4', '5'];

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $name)
    {
        $this->attributes = $name;
    }
}
