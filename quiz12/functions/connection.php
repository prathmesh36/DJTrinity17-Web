<?php
@session_start();
$servername = "localhost";
$username = "";
$password= "";
$dbname = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
?>