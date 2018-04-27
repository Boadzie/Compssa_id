<?php
	include("../../includes/sessions.php");
	include("../../includes/db_connection.php");
	include("../../includes/functions.php");

	confirm_admin_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
</head>
<body>
	<h1>Admin Dashboard</h1>
	<a href="logout.php">logout</a>
	<?php
		if (isset($_SESSION["username"])) {
			echo "Welcome " . $_SESSION["username"];
			$_SESSION["username"] = NULL;
		} else {
			echo "";
		}

		if (isset($_SESSION["message"])) {
			echo $_SESSION["message"];
			$_SESSION["message"] = NULL;
		} else {
			echo "";
		}
	?>
	<div>
		<a href="students.php">Students</a>
	</div>
</body>
</html>