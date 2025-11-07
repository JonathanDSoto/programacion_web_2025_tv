<?php 

include "UsersController.php";

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
		
		<?php foreach ($all_users as $key => $value): ?>
		<td>
				
			

		</td>
		<?php endforeach ?>

	</table>

</body>
</html>