<?php
require_once "classes/DBConnect.php";
require_once "classes/Security.php";
require_once "classes/Constants.php";

$conn = DBConnect::getInstance();
$security = new Security($conn);

function redirect($url)
{
    header("Location: " . $url);
    exit();
}

session_start();
if (!isset($_SESSION["sap_id"])) {
    session_unset();
    session_destroy();
    redirect("home?tab=login");
}

if ($security->is_ip_blocked()) {
    redirect("../banned");
}
?>
<html>
  <head>
  	 <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style type="text/css">
      	 body{
          background: url("images/bg.jpg");
        background-size: cover;
      }
      </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Answers', 'Total Questions'],
          ['Correct',     <?=$_SESSION["right"]?>],
          ['Incorrect',      <?=$_SESSION["wrong"]?>],
          ['Not Attempted',      <?=$_SESSION["nA"]?>],
        ]);

        var options = {
          title: 'Quiz Analysis',
          backgroundColor: { fill: "#ffffff" },
          titleTextStyle: {color: "black"},
          textStyle: {color: "black"}
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

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
			background-color: #172228;
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
				    <div id="piechart" style="width: 100%; height: 50%";></div>
				   <center>
			</div>
			<div class="card-action">
             <a href="standings"><center><button class="btn btn-medium waves-effect waves-light" type="submit" name="register">
                View Department Standings<i class="material-icons right">equalizer</i>
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
