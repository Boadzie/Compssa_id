<?php
	include("../../includes/sessions.php");
	include("../../includes/db_connection.php");
	include("../../includes/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
</head>
<body>
	<h1>Admin Dashboard</h1>
	<?php
		if (isset($_SESSION["username"])) {
			$username = $_SESSION["username"];
			echo "<p>Welcome " . $username . "</p>";
		}
	?>
	<div>
		<a href="#">Students</a>
	</div>
</body>
</html>