<?php
	@session_start();
	include 'connection.php';
	//echo $_GET["email"];
	//echo $_GET["img"];
	$url = $_GET["img"];
	if(isset($_GET["email"])&&isset($_GET["img"]))
	{
		$email = $_GET["email"];
		//echo $var;
		$sql = "UPDATE users SET LoginId='".$email."', Image='".$url."' WHERE SapId = ".$_SESSION["SAP"].";";
		//echo $sql;
		//exit();
		if ($conn->query($sql) === TRUE) 
	    {
	    	 echo "<script type='text/javascript'>window.alert('Registration Successful.');
                window.location.href = '../index.php';</script>";
		   // header("location:index.php");
		}
		else 
		{
		    //echo "Error updating record: " . $conn->error;
		    $sql = "DELETE FROM `users` WHERE SapId = ".$_SESSION["SAP"].";";
			if ($conn->query($sql) === TRUE) 
		    {
		    	 echo "<script type='text/javascript'>window.alert('Registration UnSuccessful. Email Id already exists');
                window.location.href = '../index.php';</script>";
			    //header("location:../index.php");
			}
		}
		@session_destroy();
	}
?>
