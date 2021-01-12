<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Users;

class UsersController extends Controller
{
    public function index()
    {
        $model = new Users();
        $data = $model->all();
        $this->generate('Admin', 'Users', $data);
    }
}
