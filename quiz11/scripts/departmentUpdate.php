<?php    
    @session_start();
  include 'connection.php';
  if(!isset($_SESSION["SAP"])){
    header("location:../index.php");
  }

	$dept = "";

	$sql = "SELECT Department FROM users WHERE SapId = ".$_SESSION["SAP"].";";
	$result = $conn->query($sql);
    if ($result->num_rows > 0)
     {
        // output data of each row
        while($row = $result->fetch_assoc())
         {
            $dept = $row["Department"];
        }
    }
    else
    {
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);

echo "<script type='text/javascript'>alert('An error was encountered');</script>";
				 header("location:../index.php");
        
    }

   // echo $dept;

    $score = 0;
    $entries = 0;
    $sql = "SELECT Score, Entries FROM departmentstandings WHERE DepartmentName LIKE '".$dept."';";
	$result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            $score = $row["Score"];
            $entries = $row["Entries"];
        }
    }
    else
    {

echo "<script type='text/javascript'>alert('An error was encountered');</script>";
				 header("location:../index.php");
    }

    $score = $score + $_SESSION["score"];
    $entries++;
    $tally = $score/$entries;
    
    $sql =  "UPDATE departmentstandings SET Score=".$score.",Entries=".$entries.",Tally=".$tally." WHERE DepartmentName LIKE '".$dept."'"; 

    	//echo "<br><br>".$sql."<br><br>";

    if ($conn->query($sql) === TRUE) 
    {
	    //echo "Record updated successfully";
	} else 
	{
	    //echo "Error updating record: " . $conn->error;
echo "<script type='text/javascript'>alert('An error was encountered');</script>";
				 header("location:../index.php");
	}
    $sql =  "UPDATE users SET Score=".$_SESSION["score"]." WHERE SapId LIKE ".$_SESSION["SAP"].";"; 

    	//echo "<br><br>".$sql."<br><br>";

    if ($conn->query($sql) === TRUE) 
    {
	    //echo "Record updated successfully";
	} else 
	{
	    //echo "Error updating record: " . $conn->error;
echo "<script type='text/javascript'>alert('An error was encountered');</script>";
				 header("location:../index.php");
	}
   // @session_destroy();
    header("location:../interdepartment.php")
?>