<?php
	session_start();

	if (!isset($_SESSION['token'])) { 
		$_SESSION['token'] =  md5(uniqid(mt_rand(), true));
	}

	#Mostrar errores en php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL); 

	#traer todos los usuarios
	include "./app/UsersController.php";
	$usersC = new UsersController();
	$all_users = $usersC->getAll();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<table>
		
		<tr>
			<th>
				ID
			</th>
			<th>
				Nombre
			</th>
			<th>
				Correo 
			</th>
			<th>
				Contraseña
			</th>
			<th>
				Acciones
			</th>
		</tr>

		<?php if( isset($all_users) && count($all_users) ): ?>
		<?php  foreach ($all_users as $user  ): ?>
		<tr>
			<td>
				<?= $user['id'] ?>
			</td>
			<td>
				<?= $user['name'] ?>
			</td>
			<td>
				<?= $user['email'] ?>
			</td>
			<td>
				<?= $user['password'] ?>
			</td>
			<td>
				<button onclick="editUser(this)" data-user='<?= json_encode($user) ?>'  >
					Editar
				</button>
				<button onclick="removeUser(<?= $user['id'] ?>)"  >
					Eliminar
				</button>
			</td>
		</tr>
		<?php  endforeach  ?>
		<?php  endif  ?>
	</table>

	<hr>

	<form method="post" action="./app/UsersController.php">
		<div> 
			<label>
				Nombre
			</label>
			<input type="text" placeholder="write here" name="name"> 
		</div> 
		<div> 
			<label>
				Apellidos
			</label>
			<input type="text" placeholder="write here" name="lastname"> 
		</div> 
		<div> 
			<label>
				Email
			</label>
			<input type="email" placeholder="write here" name="email">
		</div>
		<div>
			<label>
				Password
			</label>
			<input type="password" placeholder="write here" name="password">
		</div>
		<button type="submit">
			Guardar datos
		</button>
		<input type="hidden" name="action" value="create_user">
		<input type="hidden" name="ftoken" value="<?= $_SESSION['token'] ?>">
	</form>

	<form method="post" action="./app/UsersController.php">
		<div> 
			<label>
				Nombre
			</label>
			<input type="text" placeholder="write here" id="name" name="name"> 
		</div> 
		<div> 
			<label>
				Apellidos
			</label>
			<input type="text" placeholder="write here" id="lastname" name="lastname"> 
		</div> 
		<div> 
			<label>
				Email
			</label>
			<input type="email" placeholder="write here" id="email" name="email">
		</div> 
		<button type="submit">
			Actualizar datos
		</button>
		<input type="hidden" name="action" value="update_users">
		<input type="hidden" name="user_id" id="user_id" value="">
		<input type="hidden" name="ftoken" value="<?= $_SESSION['token'] ?>">
	</form>

	<form id="form_to_delete" method="post" action="./app/UsersController.php"> 
		<input type="hidden" name="action" value="remove_users">
		<input type="hidden" name="user_id" id="remove_user_id" value="">
		<input type="hidden" name="ftoken" value="<?= $_SESSION['token'] ?>">
	</form>

</body>
</html>