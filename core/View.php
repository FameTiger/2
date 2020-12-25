<?php

namespace Core;

class View
{
    public static function generate($template, $page, $data = [])
    {
        require '../web/assets/' . $template . '.php';
    }
}
