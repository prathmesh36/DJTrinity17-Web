<?php 
  
  session_start();


    
if(isset($_SESSION['uid'])){
        
           $dbhost = 'localhost';
    $dbuser = '';
    $dbpass = '';
   $dbname = '';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
 
    if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   $selected = mysql_select_db($dbname,$conn) ;
   //use $dbname;   
   $sql = 'SELECT points FROM idpt_points ORDER BY `sr` DESC LIMIT 1;';
  
   $retval = mysql_query( $sql, $conn);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   // , $conn

   while($row = mysql_fetch_array($retval)) {
      
      $score = $row['points'];
      $points = explode(',',$score);

      //now how to store the indiviual points??

      
      
   }
   

   mysql_close($conn);
 }//if end
 else
 {
  echo "<script>document.location='loginform.php' </script>";

 }

  
  
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
     var xit = parseFloat('.intval($points[0]).') ;  
    var xcomps = parseFloat('.intval($points[1]).') ;
var xmech = parseFloat('.intval($points[2]).') ;
var xchemical = parseFloat('.intval($points[3]).') ;
var xbioprod = parseFloat('.intval($points[4]).') ;
var xelex = parseFloat('.intval($points[6]).') ;
var xextc = parseFloat('.intval($points[5]).') ;
</script>
';

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
            name: 'Population',
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



</body>
</html>
