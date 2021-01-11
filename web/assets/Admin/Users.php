<table>
<tr>
	<th>
		ID
	</th>
	<th>
		First Name
	</th>
	<th>
		email
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
	foreach ($data as $row):
?>

<tr>
	<td> <?= $row['ID']?> </td>
	<td> <?= $row['First_name']?> </td>
	<td> <?= $row['Second_name']?> </td>
	<td> <?= $row['E_mail']?> </td>
	<td> <?= $row['ID_user_permission']?> </td>
	<td> <?= $row['Create_at']?> </td>
	<td> <?= $row['Update_at']?> </td>
</tr>
<?php endforeach; ?>
</table> 