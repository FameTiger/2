<?php

namespace Core;

class Router
{
	protected $var = 10;
	private $routingMap;
	private $requestPatch;
	
//var_export($_server)

	public function __construct() 
	{
		$this->routingMap = include_once '../app/Config/Conf.php';
		$this->requestPatch = $_SERVER['PATH_INFO'] ?? '/';
	}
	
	public function run()
	{
		var_export($this->requestPatch);
		var_export(in_array($this->requestPatch, array_keys ($this->routingMap)));
		if(in_array($this->requestPatch, array_keys ($this->routingMap)))
		{
			$ClassNamespace = 'App\\Controllers\\' .$this->routingMap[$this->requestPatch] .'Controller';
		}
		else{
			$ClassNamespace = 'App\\Controllers\\NotFoundController';
		}
			$ClassObj = new $ClassNamespace(); 
	}
}