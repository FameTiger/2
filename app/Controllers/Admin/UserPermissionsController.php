<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\UserPermissions;

class UserPermissionsController extends Controller
{
    public function index()
    {
        $model = new UserPermissions();
        $data = $model->getAttributes();
        $this->generate('Admin', 'UserPermissions', $data);
    }
}
