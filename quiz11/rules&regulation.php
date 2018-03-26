<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style type="text/css">
        body {
          background: url("img/bg.jpg");
        background-size: cover;
        }
        .row{
          padding-top: 4%;
        }
      </style>
    </head>
    <?php
        @session_start();
        include 'scripts/connection.php';
        $sql = "SELECT Name, Department, Year, Image FROM users WHERE SapId = '".$_SESSION["SAP"]."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
          // output data of each row
          while($row = $result->fetch_assoc()) 
          {
            $name = $row["Name"];
            $dept = $row["Department"];
            $year = $row["Year"];
            $url = $row["Image"];
          }
        }
        else
        {
          //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          //header("location:index.php");
        }
    ?>

    <body>
      <div class="row">
        <div class="col s12 m4 offset-m4">
          <div class="card">
            <div class="card-content">
            <div class="col s2 m2"><img src=<?=$url?> class="circle responsive-img"></div>
             <div class="col s10 m10"><span class="card-title right-align"> <?=$name?></span><br>
             <?=$_SESSION["SAP"]?><br><?=$year?>, <?=$dept?><br><br></div><hr>
              <span class="card-title">Rules and Regulations</span>
              <p><span class="left-align">
              <ol type="1" >
                <li>You will be asked objective questions</li>
                <li>You are required to answer each question in the stipulated time.</li>
                <li>If you fail to answer, the question is forfieted</li>
                <li>Once you have selected your answer, you can procced to the next question.</li>
                <li>Remaining time is not carried forward</li>
                <li>The end result of your test will be displayed</li>
              </ol>
            </span></p>
            </div>
            <div class="card-action">
              <form method="POST" action="#">
                <center><button class="btn btn-medium waves-effect waves-light" type="submit" name="begin" id="btn_submit" value="Begin">Begin<i class="material-icons right">send</i></button></center> <br>
              </form>
              <a href="scripts/logout.php"><center><button class="btn btn-medium waves-effect waves-light" type="submit" name="register">Logout<i class="material-icons">exit_to_app</i>
                </button></center></a> 
                <div id="test"></div>
            </div>
          </div>
        </div>
      </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">  
          var today, startday, endday, text;
          today = new Date();
          startday = new Date("January 30, 2017 22:00:00");
          endday = new Date("January 30, 2017 23:59:00");

          if (startday < today && endday > today ) {
             // text = "start";
          } else {
              //text = "wait";
            //document.getElementById("btn_submit").disabled = true;
            document.getElementById("btn_submit").value = 'Coming Soon';

          }
          //document.write(text);

      </script>
    </body>
  </html>

  <?php
    @session_start();
    include 'scripts/connection.php';
    if(isset($_POST["begin"]))
    {
      $time = date("h:i:s");
      $start_time = DateTime::createFromFormat('g:i:s', $time);
      $end_time= DateTime::createFromFormat('g:i:s', $time);
      $start_time= $start_time->format('g:i:s');
      //echo $_SESSION["start_time"];
      $end_time->modify('+15 minutes');
      $end_time = $end_time->format('g:i:s');
      //echo "<br>";
      echo $end_time ;
      
      $sql ="UPDATE users SET RegistrationTime='".$end_time."' WHERE SapId ='".$_SESSION["SAP"]."';";

      //echo "<br><br>".$sql."<br><br>";

      if ($conn->query($sql) === TRUE) 
      {
          //echo "Record updated successfully";
      } 
      else 
      {
          //echo "Error updating record: " . $conn->error;
echo "<script type='text/javascript'>alert('An error was encountered');</script>";
				 header("location:../index.php");
      }
      $_SESSION["setTest"]="true";
echo $_SESSION["setTest"];
     echo "<script type='text/javascript'>window.location.href = 'quiz.php';</script>";
    }
  ?>