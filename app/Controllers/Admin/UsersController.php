<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Users;

class UsersController extends Controller
{
    public function index($data)
    {
        $model = new Users();
        $data['models'] = $model->all();
        $this->generate('Admin', 'Users', $data);
    }
	
	
	public function remove(array $data)
	{
		try{
			if(!empty($data['id'])){
				$id = (int) $data ['id'];
				$users = new Users();
				$users->remove($id);
			}
			header ('Location: /admin/users');
	
		}catch (\Exception $e){
			echo $e->message();
		}
	}
	
	public function add(array $data)
	{
		try{
			$users = new Users();
			$users->add($data);
			header ('Location: /admin/users');
		}catch (\Exception $e){
			echo $e->message();
		}
	}
	
	public function edit(array $data)
	{
				try{
			$users = new Users();
			$users->edit($data);
		} catch (\Exception $e) {
			$error = $e->getMessage();
		}
		header ('Location: /admin/users?error=' . $error);
	}
}
