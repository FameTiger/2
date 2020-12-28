<?php

namespace Core;

class Router
{
    private $routingMap;

    private $requestPatch;

    public function __construct()
    {
        $this->routingMap = include_once '../app/Config/Conf.php';
        $this->requestPatch = $_SERVER['PATH_INFO'] ?? '/';
    }

    public function run()
    {
        if(in_array($this->requestPatch, array_keys ($this->routingMap))) {
            if (strpos($this->requestPatch, '/admin') === 0) {
                $classNamespace = 'App\\Controllers\\Admin\\' . $this->routingMap[$this->requestPatch] . 'Controller';
            } else {
                $classNamespace = 'App\\Controllers\\Home\\' . $this->routingMap[$this->requestPatch] . 'Controller';
            }
        } else {
            $classNamespace = 'App\\Controllers\\NotFoundController';
        }

        $classObj = new $classNamespace();
        $classObj->index();
    }
}
