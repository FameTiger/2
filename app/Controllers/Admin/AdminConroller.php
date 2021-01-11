<?php

namespace App\Controllers\Admin;

use App\Models\users;
use App\Controllers\Controller

class AdminController extends Controller
{
	public finction indexAction()
	{
		$objUsers = new Users();
		$data = $objUsers->all();
		parent::generate('Admin', 'Index', $data);
	}
}