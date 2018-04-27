<?php
	include("../../includes/sessions.php");
	include("../../includes/db_connection.php");
	include("../../includes/functions.php");

	$_SESSION["admin_id"] = null;
	redirect_to("login.php");

?>