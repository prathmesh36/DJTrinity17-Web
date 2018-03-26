<?php
	@session_start();
	include 'connection.php';
	if (isset($_POST["register"])) 
	{

		$sap = mysqli_real_escape_string($conn, $_POST["sap"]);
		$name= mysqli_real_escape_string($conn, $_POST["name"]);
		$dept= mysqli_real_escape_string($conn, $_POST["dep"]);
		$year= mysqli_real_escape_string($conn, $_POST["year"]);
		$pass= mysqli_real_escape_string($conn, $_POST["pass"]);

if (strpos($sap, '=') !== false or strpos($name, '=') !== false or strpos($pass, '=') !== false or strpos($sap, '"') !== false or strpos($name, '"') !== false or strpos($pass, '"') !== false) {
  echo "<script type='text/javascript'>window.alert('Sql Injection Detected.Fuck You. :)');
                window.location.href = '../index.php';</script>";
                die();
}
        
		if(!strlen($sap)==11)
		{
echo "<script type='text/javascript'>window.alert('Registration UnSuccessful. Invalid Sap Id(11)');
                window.location.href = '../index.php';</script>";
                die();

		}
        if(substr( $sap, 0, 3 ) == "6000")
        {
              echo "<script type='text/javascript'>window.alert('Registration UnSuccessful. Invalid Sap Id(0-4)');window.location.href = '../index.php';</script>";
                die();

        }

        if(strlen($pass)<8)
        {
              echo "<script type='text/javascript'>window.alert('Registration UnSuccessful. Password has to be more than 8 characters');
                window.location.href = '../index.php';</script>";
die();

        }
$pass= sha1($pass);
		$counter = 0;
		$qarray = array();

		$sql = "SELECT QuestionId FROM questiontbl ORDER BY RAND() LIMIT 10";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            // output data of each row
            while($row = $result->fetch_assoc())
            {
                $qarray[$counter++] = $row["QuestionId"];
            }
        }
        else
        {
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
echo "<script type='text/javascript'>alert('An error was encountered');</script>";
				 header("location:../index.php");
            die();

        }


        $questionId = implode(",", $qarray);
        //echo $questionId;

        $timestamp = date("G:i:s", time());
        $key = $sap;
        $img = 0;
        $flag = 0;
       
try {
                $conn = new PDO("mysql:host=;dbname=", "", "");
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // prepare sql and bind parameters
               $stmt = $conn->prepare("INSERT INTO `users`(`SapId`, `Password`, `LoginId`, `Image`, `Name`, `Department`, `Year`, `QuestionsList`, `RegistrationTime`, `Flag`,`Score` ) VALUES (:sap,:pass,:id,:img,:name,:dept,:year,:ql,:t,:flag,:score);");
                $stmt->bindParam(':sap', $sap);
                $stmt->bindParam(':pass', $pass);
                $stmt->bindParam(':id', $key);
                $stmt->bindParam(':img', $img);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':dept', $dept);
                $stmt->bindParam(':year', $year);
                $stmt->bindParam(':ql', $questionId);
                $stmt->bindParam(':t', $timestamp);
                $stmt->bindParam(':flag', $flag);
                $stmt->bindParam(':score', $flag);
                $stmt->execute();


            }
            catch(PDOException $e)
                {
              //  echo "Error: " . $e->getMessage();
                echo "<script type='text/javascript'>window.alert('Registration UnSuccessful. (c-e)');window.location.href = '../index.php';</script>";

                }
                $_SESSION["SAP"] = $sap;
                //echo $_SESSION["SAP"];
                echo "<script type='text/javascript'>window.location.href = '../googleLogin.php';</script>";
    }
?>