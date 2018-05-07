<?php
	include("../../includes/sessions.php");
	include("../../includes/db_connection.php");
	include("../../includes/functions.php");

	confirm_admin_login();

	if (isset($_GET["student_id"])) {
		$student_id = $_GET["student_id"];
	}

	// DELETE STUDENT
	$query = "DELETE FROM students WHERE id = $student_id";
	$results = mysqli_query($connection, $query);

	if ($results) {
		$_SESSION["message"] = "Student Deleted Successfully";
		redirect_to("students.php");
	} else {
		$_SESSION["message"] = "Failed To Delete Student";
		redirect_to("students.php");
	}
?>