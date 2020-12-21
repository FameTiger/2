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
		if(in_array($this->requestPatch, array_keys ($this->routingMap)))
		{
			$ClassNamespace = 'App\\Controllers\\' .$this->routingMap[$this->requestPatch] .'Controller';
		}
		else{
			$ClassNamespace = 'App\\Controllers\\NotFoundController';
		}
			$ClassObj = new $ClassNamespace(); 
			$ClassObj->index();
	}
}