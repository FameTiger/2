<ul>
  <li><a href="/admin/">Admin</a></li>
  <li><a href="/admin/users">Users</a></li>
  <li><a href="/admin/user-permissions">User Permissions</a></li>
</ul>

<ul>
  <li><a href="/">Home</a></li>
</ul>

<?php
if(!empty($data['error'])):
?>
<div> Ошибочка: <?=$data['error']?></div> 
<?php 
endif;
require 'Admin/' . $page . '.php';
?>
