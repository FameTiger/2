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
	
	
	public function remove(array $data)
	{
		try{
			if(!empty($data['id'])){
				$id = (int) $data ['id'];
				$permissions = new UserPermissions();
				echo "Removing permission [id = $id]";
				$permissions->remove($id);
			}
			header ('Location: /admin/user-permissions');
	
		}catch (\Exeption $e){
		$e->message();
		}
	}
}
