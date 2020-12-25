<?php

namespace App\Models;

class Index extends Model
{
    private $attributes = ['0', '1', '2'];

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $name)
    {
        $this->attributes = $name;
    }
}
