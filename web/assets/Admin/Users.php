<table>
<tr>
	<th>
		ID
	</th>
	<th>
		First Name
	</th>
	<th>
		Second Name
	</th>
	<th>
		Email
	</th>
	<th>
		User Role
	</th>
	<th>
		Create At
	</th>
	<th>
		Update At
	</th>
</tr>

<?php
	foreach ($data['models'] as $row):
?>
<form action="/admin/users/edit"> 
<tr>
	<td> <input name="ID" type="hidden" value="<?= $row['ID']?>"><?= $row['ID']?> </td>
	<td> <input name="First_name" value="<?= $row['First_name']?>"> </td>
	<td> <input name="Second_name" value="<?= $row['Second_name']?>"> </td>
	<td> <input name="E_mail" value="<?= $row['E_mail']?>"> </td>
	<td> <input name="ID_user_permission" value="<?= $row['ID_user_permission']?>"> </td>
	<td> <?= $row['Create_at']?> </td>
	<td> <?= $row['Update_at']?> </td>
	<td> <a href = "/admin/users/remove?id=<?= $row['ID']?>">X</a></td>
	<td><input type="submit"></td>
</tr>
</form>
<?php endforeach; ?>
</table> 
<hr><form action="/admin/users/add"> <b>Создать:</b>
<table>
<tr>
<td><label for="First_name"> First Name: </label></td>
<td><input name="First_name"></td>
</tr>
<tr>
<td><label for="Second_name"> Second Name: </label></td>
<td><input name="Second_name"></td>
</tr>
<tr>
<td><label for="E_mail"> Email: </label></td>
<td><input name="E_mail"></td>
</tr>
<tr>
<td><label for="Pass"> password: </label></td>
<td><input name="Pass"></td>
</tr>
<tr>
<td><label for="ID_user_permission"> User ID Roll: </label></td>
<td><input name="ID_user_permission"></td>
</tr>
</table>
<input type="submit">
</form>