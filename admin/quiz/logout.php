<?php
require 'core.php';
require 'connect.php';
$user_id=$_SESSION['user_id'];
unset($_SESSION['user_id']);
header('Location:login.php');
?>