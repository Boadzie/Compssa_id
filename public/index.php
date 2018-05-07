<?php
	include("../includes/sessions.php");
	include("../includes/db_connection.php");
	include("../includes/functions.php");

	if (isset($_POST["submit"])) {
		$search_field = escape_string($_POST["search"]);

		$query = "SELECT * FROM students WHERE index_number = '{$search_field}'";
		$results = mysqli_query($connection, $query);

		if ($results) {
			while ($rows = mysqli_fetch_assoc($results)) {
				echo $rows["index_number"];
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Compssa Identification System</title>
</head>
<body>
	<h1>Compssa ID</h1>
	<form method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
		<input type="search" name="search" placeholder="Enter your Student Id...">
		<input type="submit" name="submit" value="search">
	</form>
</body>
</html>