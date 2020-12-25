<?php

namespace App\Models;

class Gallery extends Model
{
    private $attributes = ['6', '7', '8'];

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $name)
    {
        $this->attributes = $name;
    }
}
