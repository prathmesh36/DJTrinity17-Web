<?php
	include 'connection.php';
	@session_destroy();
	$conn->close();
	header("location:../index.php");
?>