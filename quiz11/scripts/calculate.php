<?php

	
	@session_start();
	include 'connection.php';
	$ans[0] = isset($_POST["ans1"])?$_POST["ans1"]:"NULL";
	$ans[1] = isset($_POST["ans2"])?$_POST["ans2"]:"NULL";
	$ans[2] = isset($_POST["ans3"])?$_POST["ans3"]:"NULL";
	$ans[3] = isset($_POST["ans4"])?$_POST["ans4"]:"NULL";
	$ans[4] = isset($_POST["ans5"])?$_POST["ans5"]:"NULL";
	$ans[5] = isset($_POST["ans6"])?$_POST["ans6"]:"NULL";
	$ans[6] = isset($_POST["ans7"])?$_POST["ans7"]:"NULL";
	$ans[7] = isset($_POST["ans8"])?$_POST["ans8"]:"NULL";
	$ans[8] = isset($_POST["ans9"])?$_POST["ans9"]:"NULL";
	$ans[9] = isset($_POST["ans10"])?$_POST["ans10"]:"NULL";


                      // foreach( $ans as $value ) {
                      //       echo "Value is $value <br />";
                      //    }
			$qIds = "";
			//echo $_SESSION["SAP"];
			$sql = "SELECT QuestionsList FROM users WHERE SapId = ".$_SESSION["SAP"];
			$result = $conn->query($sql);
		    if ($result->num_rows > 0) 
		    {
		        // output data of each row
		        while($row = $result->fetch_assoc())
		         {
		            $qIds = $row["QuestionsList"];
		        }
		    }
		    else
		    {
		        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		         echo "<script type='text/javascript'>alert('An error was encountered');</script>";
				 header("location:../index.php");
		    }
		    
		    $questionID = explode(',', $qIds);

		    $count = 0;
			$right = 0;
		    $wrong = 0;
		    $nA = 0;

         	$sql = "SELECT Answer FROM questiontbl WHERE QuestionId IN (".$qIds.")";
         	$result = $conn->query($sql);
		    if ($result->num_rows > 0) {
		        // output data of each row
		        while($row = $result->fetch_assoc())
		        {
		           if ($ans[$count] == $row["Answer"]) 
		           {
		           		$right++;
		           }
		           elseif ($ans[$count]=="NULL") {
		           		$nA++;
		           }
		           else
		           {
		           		$wrong++;
		           }
		           $count++;
		        }
		    }
		    else
		    {
		        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		        echo "<script type='text/javascript'>alert('An error was encountered');</script>";
				 header("location:../index.php");					 
		    }
		    $total = $right+$wrong+$nA;
		   // echo "Score = ".$right." / ".$total; 
		    $_SESSION["score"]=$right; 
		    $_SESSION["right"]=$right;
		    $_SESSION["wrong"]=$wrong;
		    $_SESSION["nA"]=$nA;
		    //echo "r - ".$_SESSION["right"];
		    //echo "<br>w- ".$_SESSION["wrong"];
		    header("location:../pie.php");  
?>