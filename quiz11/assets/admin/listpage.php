<!DOCTYPE html>
<html>
<head>
<title>Quiz App</title>
      <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body style="background-image:url('Capture.PNG');background-size:cover;">
<?php 
include 'all.php'; 
?>
<div class="container" style="margin-top:25px;">
   <div class="row">
      <div class="col l8 offset-l2 s12">
        <div style="position:relative; max-width:330px; height:50px;"><i style="position:absolute;top:0px;left:0px;" class="small material-icons white-text">mode_edit</i><h4 style="position:absolute; left:40px; margin:0 0 1px 0;" class="white-text" >Question Lists</h4></div>
        <div><br>
		</div>	  
        <div class="card-panel hoverable"  style="opacity: 0.6;border:1px solid black;border-radius:10px;">
          <div class="row">
			<?php
			 $queryed="SELECT * FROM questiontbl";
			 $queryed_run=mysql_query($queryed);
			while($rows=mysql_fetch_assoc($queryed_run))
			{
			 echo '
				  <ul class="collection" style="opacity: 0.8;border:1px solid black;border-radius:10px;">
					<li class="collection-item active"><b>Question '.$rows['QuestionId'].'-: </b>'.$rows['Question'].'<a href="edit.php?id='.$rows['QuestionId'].'" class="secondary-content"><i class="material-icons">send</i> <span>Edit</span></a></li>
					<li class="collection-item"><div><b>Option 1 -: </b>'.$rows['OptionA'].'</div></li>
					<li class="collection-item"><div><b>Option 2 -: </b>'.$rows['OptionB'].'</div></li>
					<li class="collection-item"><div><b>Option 3 -: </b>'.$rows['OptionC'].'</div></li>
					<li class="collection-item"><div><b>Option 4 -: </b>'.$rows['OptionD'].'</div></li>
					<li class="collection-item active"><div><b>Answer -: </b>'.$rows['Answer'].'</div></li>				  
				  </ul>				  
			 ';
			}
			?>		  
          </div>
        </div>
      </div>
    </div>
  </div> 
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