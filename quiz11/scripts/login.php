<?php
	@session_start();
	//include 'scripts/connection.php';
	if (isset($_POST["register"])) 
	{
		header("location:../registration.php");
	}
	if (isset($_POST["login"]))
	{
		$sap=$_POST['sap']
                $pass=sha1($_POST['pass'])
		
                $conn = mysqli_connect("localhost", "", "", "") or die("Connection failed: " . mysqli_connect_error());
		$sql = "SELECT Name, Department, Flag FROM users WHERE SapId = '".$sap."' AND Password = '".$pass."';";
		//echo $sql;

		$result = $conn->query($sql);
	    if ($result->num_rows > 0) 
	    {
	        // output data of each row
	        while($row = $result->fetch_assoc()) 
	        {
	        	$_SESSION["SAP"]=$sap;
	        	$name = $row["Name"];
	        	
	        	if($row["Flag"] == -999){
	        		echo "<script type='text/javascript'>window.alert('You have already taken the quiz, ".$name."');window.location.href = '../index.php';</script>";
	        	}else{
	        		echo "<script type='text/javascript'>window.alert('Login Successful. Welcome,".$name."');
				window.location.href = '../rules&regulation.php';</script>";
			}
	        }
	    }
	    else
	    {
	       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
               echo "<script type='text/javascript'>window.alert('Login Unuccessful.(e)');window.location.href = '../index.php';</script>";
	        //header("location:index.php");
	    }
	}


?>