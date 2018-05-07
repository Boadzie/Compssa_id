<?php
	include("../../includes/sessions.php");
	include("../../includes/db_connection.php");
	include("../../includes/functions.php");

	confirm_admin_login();

	$student_set = find_all_students();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
</head>
<body>
	<h1>Manage Students</h1>
	<a href="create_student.php">Add Students</a>
	<br><br>
	<table style="border:2px solid #000">
		<tr>
			<th>Student's ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th></th>
			<th></th>
		</tr>
		<?php while ($student = mysqli_fetch_assoc($student_set)): ?>
		<tr>
			<td><?php echo $student["index_number"]; ?></td>
			<td><?php echo $student["first_name"]; ?></td>
			<td><?php echo $student["last_name"]; ?></td>
			<td><?php echo $student["email"]; ?></td>
			<td><?php echo $student["phone_number"]; ?></td>
			<td><a href="edit_student.php?student_id=<?php echo $student['id']; ?>">Edit</a></td>
			<td><a href="delete_student.php?student_id=<?php echo $student['id']; ?>" onclick="alert('Are you sure?');">
					Delete
				</a>
			</td>
		</tr>
		<?php endwhile; ?>
	</table>
</body>
</html>