<?php

namespace App\Models;

use Components\Orm\Select;

class Users extends Model
{	




	protected $tableName = 'users';
    private $attributes = ['9', '10', '11'];

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $name)
    {
        $this->attributes = $name;
    }
	
	public function validate($data)
	{
		if(empty($data['First_name']))
		{
			return 'Имя не указано';
		}
		if(empty($data['Second_name']))
		{
			return 'Увувуув!';
		}
		if (!filter_var($data['E_mail'], FILTER_VALIDATE_EMAIL))
		{
			return 'Email указан неверно';
		}
		if(isset($data['Pass']) && empty($data['Pass']))
		{
			return 'Введите пароль';
		}
		$permissions = new UserPermissions();
		if (empty($data['ID_user_permission']) || is_null($permissions->find($data['ID_user_permission'])))
		{
			return 'Неверный ID';
		}
		return true;
	}
}