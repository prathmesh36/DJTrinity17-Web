<?php
ob_start();
session_save_path('tmp/'); 
@session_start();
$filename=$_SERVER['SCRIPT_NAME'];
$referer=@$_SERVER['HTTP_REFERER'];


?>