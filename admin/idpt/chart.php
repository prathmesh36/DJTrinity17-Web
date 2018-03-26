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


//echo "end1";
  
  
?>

<!DOCTYPE html>
<html>
<head>
<title>Highcharts Tutorial</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://code.highcharts.com/highcharts.js"></script>  

</head>
<style>
dataLabels = {
   enabled: true,
   rotation: -90,
   color: '#FFFFFF',
   align: 'right',
   format: '{point.y:.1f}', // one decimal
   y: 10, // 10 pixels down from the top
   style: {
      fontSize: '13px',
      fontFamily: 'Verdana, sans-serif'
   }
}
</style>
<body>

<div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>


  <?php 
   echo '<script>
     var xbioprod = parseFloat('.intval($points[0]).') ;  
    var xcomps = parseFloat('.intval($points[1]).') ;
var xchemical = parseFloat('.intval($points[2]).') ;
var xelex = parseFloat('.intval($points[3]).') ;
var xextc = parseFloat('.intval($points[4]).') ;
var xit = parseFloat('.intval($points[5]).') ;
var xmech = parseFloat('.intval($points[6]).') ;
</script>
';
//echo "test";
?>

<script type="text/javascript">
$(document).ready(function() {  


   var chart = {
      type: 'column'
   };
   var title = {
      text: 'IDPT Standings'   
   };    
   var subtitle = {
      text: ''
   };
   var xAxis = {
      type: 'category',
      labels: {
         rotation: -45,
         style: {
            fontSize: '13px',
            fontFamily: 'Verdana, sans-serif'
         }
      }
   };
   var yAxis ={
      min: 0,
      title: {
        text: 'Points'
      }
   };  
   var tooltip = {
      pointFormat: ''
   };   
   var credits = {
      enabled: false
   };
   var series= [{
            name: 'Score',
            data: [
                ['I.t', xit],
                ['Comps',xcomps],
                ['Mech', xmech],
                ['Chemical', xchemical],
                ['Extc', xextc],
                ['Elex', xelex],
                ['Bio-Prod', xbioprod],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
   }];     
      
   var json = {};   
   json.chart = chart; 
   json.title = title;   
   json.subtitle = subtitle;
   json.xAxis = xAxis;
   json.yAxis = yAxis;   
   json.tooltip = tooltip;   
   json.credits = credits;
   json.series = series;
   $('#container').highcharts(json);
  
});
</script>

<a href="../../idpt.php">View Standings...</a>

</body>
</html>
