<!DOCTYPE html>
<html>
<head>
<title>Event List Page</title>
      <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body  class="blue lighten-2">
<?php 
include 'all.php'; 
if(isset($_SESSION['user_id']))
{
?>
<div class="container" style="margin-top:25px;">
   <div class="row">
      <div class="col l8 offset-l2 s12">
        <div style="position:relative; max-width:330px; height:50px;"><i style="position:absolute;top:0px;left:0px;" class="small material-icons white-text">mode_edit</i><h4 style="position:absolute; left:40px; margin:0 0 1px 0;" class="white-text" >Events List</h4></div>
        <div><br>
		</div>	  
        <div class="card-panel hoverable"  style="opacity: 0.8;border:1px solid black;border-radius:10px;">
          <div class="row">		
		  
<?php			
			$queryed="SELECT * FROM event";
			$queryed_run=mysql_query($queryed);
			while($rows=mysql_fetch_assoc($queryed_run))
			{						 
									 echo '<br>
										  <ul class="collection" style=";border:1px solid black;border-radius:10px;">
											<li class="collection-item active"><b>Event </b><a href="eventedit.php?id='.$rows['id'].'" class="secondary-content"><i class="material-icons">send</i> <span>Edit</span></a></li>										  
											<li class="collection-item "><div class="card-image waves-effect waves-block waves-light">
												<center><img class="activator" src="eventimg/'.$rows['id'].'.jpg" height="400px"></center>
											</div></li>
											<li class="collection-item "><b>Event Title -: </b>'.$rows['title'].'</li>											
											<li class="collection-item"><div><b>Description -: </b>'.$rows['descrip'].'</div></li>
											<li class="collection-item"><div><b>Event Category -: </b>'.$rows['category'].'</div></li>											
											<li class="collection-item"><div><b>Date -: '.$rows['evtdate'].'</b</div></li>
											<li class="collection-item"><div><b>Timings -: </b>'.$rows['stime'].' to '.$rows['etime'].'</div></li>
											<li class="collection-item"><div><b>Venue -: </b>'.$rows['venue'].'</div></li>
											<li class="collection-item"><div><b>Cost -: </b>'.$rows['price'].'</div></li>											
										  </ul>				  
									 ';	
			}
?>
         </div>
        </div>
      </div>
    </div>
  </div> 
  <?php
}
else{
          echo '<script type="text/javascript">';
		  echo 'window.location.href="login.php";';
		  echo '</script>';		  	
}
  ?>
      <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    $(".button-collapse").sideNav();
    $(document).ready(function() {
    $('select').material_select();
     });

  </script>
</body>
</html>			  									 