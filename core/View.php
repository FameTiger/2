<?php

namespace Core;

class View
{
	
	public function generate($template, $page, $data = [])
	{
		require '../web/assets/' . $template . '.php';	
	}
	
}
	