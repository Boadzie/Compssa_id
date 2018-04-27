<?php
	include("../../includes/db_connection.php");
	include("../../includes/functions.php");

	if (isset($_POST['submit'])) {
		// TRACK ERRORS
		$errors = array();

		$required_fields = array("username", "pass");

		validate_presence($required_fields);

		if (empty($errors)) {
			$username = escape_string($_POST["username"]);
			$pass = escape_string($_POST["pass"]);

			$query = "SELECT * FROM admin WHERE username = '{$username}' && pass = '{$pass}' ";
			$admin_set = mysqli_query($connection, $query);

			if (!admin_set) {
				echo "Database query failed!";
			}

			if ($admin = mysqli_fetch_assoc($admin_set)) {
				$_SESSION["username"] = $admin["username"];
				redirect_to("index.php");
			} else {
				echo "Login failed";
			}


		}

		// if (isset($_POST["username"]) && $_POST["username"] !== "") {
		// 	$username = $_POST["username"];
		// } else {
		// 	$errors[] = "Username can't be blank";
		// }

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
</head>
<body>
	<h1>Admin Login</h1>

	<form method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
		<?php
			if (!empty($errors)) {
				foreach ($errors as $error) {
					echo "<li>" . $error . "</li>";
				}
			}
		?>
		<fieldset>
			<p>
				Username:
				<input type="text" name="username">
			</p>
			<p>
				Password:
				<input type="password" name="pass">
			</p>
			<input type="submit" name="submit" value="login">
		</fieldset>
	</form>
</body>
</html>