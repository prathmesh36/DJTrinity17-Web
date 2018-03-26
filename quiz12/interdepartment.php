<?php

	@session_start();
  include 'functions/connection.php';
  if(!isset($_SESSION["SAP"])){
    header("location:home.php");
  }
	$sql = "SELECT DepartmentName, Tally FROM departmentstandings";
	$result = $conn->query($sql);
	$deptNames = array();
	$tallyMarks = array();
	$counter = 0;
    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
        		$deptNames[$counter] = $row["DepartmentName"];
        		$tallyMarks[$counter] = $row["Tally"];
        		$counter++;
		}
    }
    else
    {
        echo "<script type='text/javascript'>alert('An error was encountered');</script>";
        header("location:home.php");
    }
    // foreach( $deptNames as $value ) {
    //         echo "Value is $value <br />";
    //      }
   // @session_destroy();
 ?>      



<html>
  <head>
   <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Department', 'Score'],
          ['I.T.',     <?=$tallyMarks[0]?>],
          ['Comp. Engg.',      <?=$tallyMarks[1]?>],
          ['Mech. Engg.',  <?=$tallyMarks[2]?>],
          ['Chem. Engg.', <?=$tallyMarks[3]?>],
          ['EXTC', <?=$tallyMarks[4]?>],
          ['Elec. Engg.', <?=$tallyMarks[5]?>],
          ['Bio-Prod Engg.', <?=$tallyMarks[6]?>],

        ]);

        var options = {
          title: 'Quiz Analysis'
        };

        var chart = new google.visualization.BarChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      history.pushState(null, null, document.URL);
      window.addEventListener('popstate', function () {
          history.pushState(null, null, document.URL);
      });
    </script>
    <style type="text/css">
       body{
          background: url("images/bg.jpg");
        background-size: cover;
      }
      .row{
        padding-top: 8%;
      }
    </style>
  </head>
  <body>
    <div class="row">
        <div class="col s12 m4 offset-m4">
          <div class="card">
            <div class="card-content">
            <div id="piechart" style="width: 100%; height: 50%;"></div>
           <center>
      </div>
      <div class="card-action">
             <a href="functions/logout.php"><center><button class="btn btn-medium waves-effect waves-light" type="submit" name="register">Logout<i class="material-icons">exit_to_app</i>
                </button></center></a>
            </div>
    </div>
  </div>
  </div>
    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>
