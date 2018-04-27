<?php
	include("../../includes/sessions.php");
	include("../../includes/db_connection.php");
	include("../../includes/functions.php");

	confirm_admin_login();

	if (isset($_GET["student_id"])) {
		$student_id = $_GET["student_id"];
	}


	// FIND STUDENT BASED ON ID
	$find_student = "SELECT * FROM students WHERE id = $student_id";
	$student_set = mysqli_query($connection, $find_student);
	$student = mysqli_fetch_assoc($student_set);


	if (isset($_POST["submit"])) {
		// TRACK ERRORS
		$errors = array();

		$required_fields = array("first_name", "last_name", "index_number", "email", 
								"phone_number");

		validate_presence($required_fields);

		if (empty($errors)) {
			$first_name   = escape_string($_POST["first_name"]);
			$last_name    = escape_string($_POST["last_name"]);
			$index_number = escape_string($_POST["index_number"]);
			$email        = escape_string($_POST["email"]);
			$phone_number = escape_string($_POST["phone_number"]);

			$query  = "UPDATE students SET ";
			$query .= "first_name = '{$first_name}', last_name = '{$index_number}', ";
			$query .= "email = '{$email}', phone_number = '{$phone_number}' WHERE id = ";
			$query .= "$student_id LIMIT 1";

			$results = mysqli_query($connection, $query);

			if ($results) {
				$_SESSION["message"] = "Student Updated Successfully";
				redirect_to("index.php");
			} else {
				$errors[] = "Failed to update new Student";
			}
		}

	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel</title>
</head>
<body>
	<h1>Admin Dashboard</h1>
		<?php
			if (isset($errors)) {
				foreach ($errors as $error) {
					echo "<li>". $error . "</li>";
				}
			}
		?>
	<form method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
		<fieldset>
			<h3>Add Student</h3>
			<p>
				First Name:
				<input type="text" name="first_name" 
				value="<?php echo $student["first_name"]; ?>">
			</p>
			<p>
				Last Name:
				<input type="text" name="last_name" 
				value="<?php echo $student["last_name"]; ?>">
			</p>
			<p>
				Student ID:
				<input type="text" name="index_number" 
				value="<?php echo $student["index_number"]; ?>">
			</p>
			<p>
				Email: 
				<input type="email" name="email" 
				value="<?php echo $student["email"]; ?>">
			</p>
			<p>
				Phone Number: 
				<input type="text" name="phone_number" 
				value="<?php echo $student["phone_number"]; ?>">
			</p>
			<p>
				<input type="submit" name="submit" value="Edit Student">
				<a href="students.php">Cancel</a>
			</p>
		</fieldset>
	</form>
</body>
</html>