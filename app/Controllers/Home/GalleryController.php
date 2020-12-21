<?php
namespace App\Controllers\Home;

use App\Controllers\Controller;

class GalleryController extends Controller
{
	public function index()
	{
		$this->generate('Home', 'Gallery');
	}
}
