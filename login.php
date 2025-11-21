<?php 
	session_start();

	if (!isset($_SESSION['token'])) { 
		$_SESSION['token'] =  md5(uniqid(mt_rand(), true));
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/styles/login.css">
</head>
<body>

	<div class="main_container">
		
		<div class="login_container">
			
			<h1>
				Bienvenido
			</h1>

			<form method="POST" action="./app/AuthController.php"> 

				<div class="input_group">
					
					<input type="text" name="username" pattern="[A-Za-z]+" title="Solo utilice letras" placeholder="Username" required oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" minlength="5" maxlength="80" onkeypress="return soloLetras(event)">

					<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
					  <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
					</svg> 

				</div>


				<div class="input_group">
					
					<input placeholder="Password" type="password" name="password" required oncut="return false" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false" minlength="5" maxlength="80">

					<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
					  <path fill-rule="evenodd" d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
					</svg>


				</div>

				<div class="form_footer">
					
					<div>
						<input type="checkbox" name="">
						<label>
							Remember me
						</label>
					</div>

					<a href="">
						Forgot password?
					</a>

				</div>

				<button class="login_button">
					Login
				</button>

				<input type="hidden" name="action" value="login">
				<input type="hidden" name="ftoken" value="<?= $_SESSION['token'] ?>">

			</form>

			<label class="dont_account">
				Don´t have an account? 
				<a href="">
					Register
				</a>
			</label>
			

		</div>

	</div>

	<script src="assets/js/validations.js"></script>
</body>
</html>