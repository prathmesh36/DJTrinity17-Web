<?php 

        
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
         
        if(! $conn ) {
          die('Could not connect: ' . mysql_error());
       }
  
   $sql = 'SELECT points FROM idpt_points ORDER BY `sr` DESC LIMIT 1;';
   $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            // output data of each row
            while($row = $result->fetch_assoc())
            {
                     $score = $row['points'];
            }
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            die();

        }

   
      $points = explode(',',$score);


     // print_r($points);



  
?>
<!DOCTYPE HTML>
<html>
<head>
        <title>Interdepartmental Points Table</title>
        <meta name="description" content="">
        <?php include 'assets/static/head.php' ;?>
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script src="https://www.amcharts.com/lib/3/serial.js"></script>
		<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
		<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
		<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
        <style type="text/css">
	        #chartdiv {
				margin-top: 20px;
				width		: 100%;
				height		: 500px;
				font-size	: 11px;
			}

        </style>
        <script type="text/javascript">
        	var chart = AmCharts.makeChart( "chartdiv", {
			  "type": "serial",
			  "theme": "light",
			  "dataProvider": [ {
			    "country": "BioPro",
			    "visits": <?=intval($points[0])?>
			  }, {
			    "country": "CE",
			    "visits": <?=intval($points[1])?>
			  }, {
			    "country": "Chem",
			    "visits": <?=intval($points[2])?>
			  }, {
			    "country": "Elec",
			    "visits": <?=intval($points[3])?>
			  }, {
			    "country": "EXTC",
			    "visits": <?=intval($points[4])?>
			  }, {
			    "country": "IT",
			    "visits": <?=intval($points[5])?>
			  }, {
			    "country": "Mech",
			    "visits": <?=intval($points[6])?>
			  }, ],
			  "valueAxes": [ {
			    "gridColor": "#FFFFFF",
			    "gridAlpha": 0.2,
			    "dashLength": 0
			  } ],
			  "gridAboveGraphs": true,
			  "startDuration": 1,
			  "graphs": [ {
			    "balloonText": "[[category]]: <b>[[value]]</b>",
			    "fillAlphas": 0.8,
			    "lineAlpha": 0.2,
			    "type": "column",
			    "valueField": "visits"
			  } ],
			  "chartCursor": {
			    "categoryBalloonEnabled": false,
			    "cursorAlpha": 0,
			    "zoomable": false
			  },
			  "categoryField": "country",
			  "categoryAxis": {
			    "gridPosition": "start",
			    "gridAlpha": 0,
			    "tickPosition": "start",
			    "tickLength": 20
			  },
			  "export": {
			    "enabled": true
			  }

			} );
        </script>
</head>
<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	
	<?php include 'assets/static/nav.php';?>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(assets/main/images/idpt.jpg);max-width: 120%;" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-left">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
							<h1 class="mb30">IDPT</h1>
							<h2><span class=" mb30 text-center" style="text-transform: none;">"Aa dekhe zaara , kisme kitna hai dum"</span></h2>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	

	

	<div id="fh5co-project">
            <!-- <div class="container">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading  animate-box">
                    <span style="font-size: 15px;">The Interdepartmental wars are such that each Department has to go against other Department and win ,to score points. They are especially designed for the FEs to instill the enthusiasm and grab maximum participation from them - be it in debates, jam , speeches , dance or streetplay competitions.</span>
                </div>
            </div> -->
            <div class="container z-depth-1"><div id="chartdiv"></div></div>
        </div>
    </div>
    <?php include 'assets/static/footer.php';?>
	
	<!-- <div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div> -->
	
	<?php include 'assets/static/scripts.php'; ?>
	</body>
</html>

