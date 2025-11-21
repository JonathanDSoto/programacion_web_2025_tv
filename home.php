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
</head>
<body>

	<h1>
		Dashboard
	</h1>

	<ul>
		<li>
			<a href="./users.php">
				Users
			</a>
		</li>
	</ul>
</body>
</html>