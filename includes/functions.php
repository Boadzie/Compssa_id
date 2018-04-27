<?php

function field_name_as_text($fieldname) {
	$fieldname = str_replace("_", " ", $fieldname);
	$fieldname = ucfirst($fieldname);

	return $fieldname;
}

function has_presence($value) {
	return isset($value) && $value !== "";
}

function validate_presence($fields) {

	global $errors;

	foreach($fields as $field) {
		$value = trim($_POST[$field]);

		if (!has_presence($value)) {
			$errors[$field] = field_name_as_text($field) . " can't be blank";
		}
	}
}

function escape_string($value) {
	global $connection;

	$cleaned_value = mysqli_real_escape_string($connection, $value);
	return $cleaned_value;
}

function redirect_to($location) {
	header("Location: " . $location);
}

?>