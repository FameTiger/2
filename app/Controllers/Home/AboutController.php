<?php
namespace App\Controllers\Home;

use App\Controllers\Controller;

class AboutController extends Controller
{
	public function index()
	{
		$this->generate('Home', 'About');
	}
}
