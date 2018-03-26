<?php include 'core.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Event Portal</title>
      <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body class="blue lighten-2">
<?php 
include 'all.php'; 
?>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('.carousel').carousel();
    });
</script>
<script  type="text/javascript">	
  $('.carousel.carousel-slider').carousel({fullWidth: true});
</script>
<div class="container" style="margin-top:25px;">
   <div class="row">
      <div class="col l8 offset-l2 s12">
        <div style="position:relative; max-width:630px; height:50px;"><i style="position:absolute;top:0px;left:0px;" class="small material-icons white-text">mode_edit</i><h4 style="position:absolute; left:40px; margin:0 0 1px 0;" class="white-text center">Upcoming Events</h4></div>
        <div class="card-panel hoverable" style="opacity: 0.9;border:1px solid black;border-radius:10px;">
          <div class="row">		
		  <div class="carousel slider center s12">
			<?php
			echo $cdate=date('Y-m-d');
			$query="SELECT * FROM event WHERE evtdate>='".$cdate."' ORDER BY evtdate,stime Limit 0,3";
			$query_run=$conn->query($query);
			while($edata=$query_run->fetch_assoc())
			{
			?>					  
			<div class="carousel-item " style="width:300px;" >  
				  <div class="card">
					<div class="card-image waves-effect waves-block waves-light">
					  <img class="activator" src="eventimg/<?php echo $edata['id'];?>.jpg">
					</div>
					<div class="card-content">
					  <span class="card-title activator black-text text-darken-4"><?php echo $edata['title'];?><i class="material-icons right">more_vert</i></span>
					  <p><a href="#">Register</a></p>
					</div>
					<div class="card-reveal">
					  <span class="card-title grey-text text-darken-4"><?php echo $edata['title'];?><i class="material-icons right">close</i></span>
					  <p><?php echo $edata['descrip'];?></p>
					</div>
				  </div>
			</div>
			<?php
			}
			?>
		  </div>
		  </div>
		  </div>
      </div>
    </div>
  </div> 
      <!--Import jQuery before materialize.js-->
  <script>
    $(".button-collapse").sideNav();
    $(document).ready(function() {
    $('select').material_select();
     });

  </script>
</body>
</html>			  