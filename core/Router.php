<?php

namespace Core;

class Router
{
    private $routingMap;

    private $requestPatch;
	
	private $query;

    public function __construct()
    {
        $this->routingMap = include_once '../app/Config/Conf.php';
        $this->requestPatch = $_SERVER['PATH_INFO'] ?? '/';
        parse_str($_SERVER['QUERY_STRING'], $this->query);
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
        
        $action = 'index';
        $requestParts = explode('/', $this->requestPatch);
        if (strpos($this->requestPatch, '/admin') === 0) {
            if (isset($requestParts[3])) {
                $action = $requestParts[3];
            }
        } else {
            if (isset($requestParts[2])) {
                $action = $requestParts[2];
            }
        }

        $classObj = new $classNamespace();
        
        if (method_exists($classObj, $action)) {
            $classObj->$action($this->query);
        } else {
            $classNamespace = 'App\\Controllers\\NotFoundController';
            $classObj = new $classNamespace();
            $classObj->index($this->query);
        }
    }
}
