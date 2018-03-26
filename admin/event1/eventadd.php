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
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>	  
<?php 
include 'all.php'; 
?>
  <div class="container" style="margin-top:25px;">
    <ul class="collapsible "  style="border-radius:10px;" data-collapsible="accordion">
    <li>
      <div class="collapsible-header <?php if(!isset($_POST['title'])){  echo 'active';}?>" style="border-radius:10px;"><i class="material-icons">filter_drama</i>Event Add Portal</div>
      <div class="collapsible-body">
	<div class="row">
      <div class="col l8 offset-l2 s10 offset-s1" >
	    <div><br>
		</div>
        <div style="position:relative; max-width:370px; height:50px;"><i style="position:absolute;top:0px;left:0px;" class="small material-icons white-text">library_add</i><h4 style="position:absolute; left:40px; margin:0 0 1px 0;" class="white-text" >Event Add Portal</h4></div>

        <div class="card-panel hoverable" style="opacity: 0.6;border:1px solid black;border-radius:10px;">
          <div class="row">
<?php
if(isset($_SESSION['user_id']))
{
?>		  
          <form class="col s12" action="eventadd.php" method="POST"  enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                <input id="title" name="title" type="text" class="validate" required>
                <label for="title"  class="black-text">Title</label>
              </div>			
			  <div class="input-field col s12">
				<textarea id="desc" name="desc" class="materialize-textarea" required></textarea>
				<label for="desc" class="black-text">Description</label>
			  </div>
			  <div class="input-field col s12">
				<select name="cat">
				  <option value="" disabled selected>Choose your option</option>
				  <option value="C">Cultural</option>
				  <option value="T">Technical</option>
				  <option value="S">Sports</option>
				</select>
				<label  style="font-size:15px;color:black;">Event Category</label>
			  </div>	  
			  <script type="text/javascript">			  
				  $('.datepicker').pickadate({
					selectMonths: true, // Creates a dropdown to control month
					selectYears: 15 // Creates a dropdown of 15 years to control year
				  });			
			  </script>				  
			  <div class="input field col s12">
                <label for="date" class="black-text" style="font-size:15px;">Date</label>			  			  
                <input type="date" class="datepicker" name="edate" required>
			  </div>	
			  <div class="col s12">
                <br><br>
			  </div>				  
			  <div class="col s12 "style="border:1px solid silver;">
                <label for="smini" class="black-text center-align"><h5>Start Time</h5></label>			  
			  <script type="text/javascript">
				function updateTextInput(val) {
							if(val<10)
							{
								val='0'+val;
							}					
						  document.getElementById('shouri').value=val; 
						}
			  </script>				  
              <div class="range-field col s12">
				  <label for="Start hour and Minute"  class="black-text">Start Hour</label>			  
				  <input type="range" name="shour" id="shour" min="00" max="23" onchange="updateTextInput(this.value);"/>
              </div> 
			  <script type="text/javascript">
				function updateTextInput2(val) {
							if(val<10)
							{
								val='0'+val;
							}					
						  document.getElementById('smini').value=val; 
						}
			  </script>				  			  
			  <div  class="range-field col s12 ">
				  <label for="Start hour and Minute"  class="black-text">Start minute</label>			  
				  <input type="range" name="smin" id="smin" min="00" max="59" onchange="updateTextInput2(this.value);"/>
              </div> 
              <div class="col s5 center-align">
                <label for="shouri" class="black-text">HH</label>			  
                <input id="shouri" name="shouri" type="text" value="00" class="validate">
              </div> 
              <div class="col s1">
			
                <label class="black-text"><br><h5>:</h5></label>
              </div> 			  
              <div class="col s5 center-align">
                <label for="smini" class="black-text">MM</label>			  
                <input id="smini" name="smini" type="text" value="00" class="validate" >
              </div> 
			  </div>			  
			  <div class="col s12">
                <br><br>
			  </div>				  			  
			  <script type="text/javascript">
				function updateTextInput3(val) {
							if(val<10)
							{
								val='0'+val;
							}					
						  document.getElementById('ehouri').value=val; 
						}
			  </script>	
			  <div class="col s12 "style="border:1px solid silver;">
                <label for="smini" class="black-text center-align"><h5>End Time</h5></label>			  			  
              <div class="range-field col s12">
                <label for="End Hour & minute"  class="black-text">End Hour</label>			  
				  <input type="range" name="ehour" id="ehour" min="0" max="23" onchange="updateTextInput3(this.value);"/>
              </div>   
			  <script type="text/javascript">
				function updateTextInput4(val) {
							if(val<10)
							{
								val='0'+val;
							}
						  document.getElementById('emini').value=val; 
						}
			  </script>			  
              <div class="range-field col s12">		
                <label for="End Hour & minute"  class="black-text" >End minute</label>			  
				  <input type="range" name="emin" id="emin" min="0" max="59" onchange="updateTextInput4(this.value);" />
             </div>  
              <div class="col s5 center-align">
                <label for="ehouri" class="black-text">HH</label>			  
                <input id="ehouri" name="ehouri" type="text" value="00" class="validate">
              </div> 
              <div class="col s1">
				<br>
                <label class="black-text"><h5>:</h5></label>
              </div> 			  
              <div class="col s5 center-align">
                <label for="emini" class="black-text">MM</label>			  
                <input id="emini" name="emini" type="text" value="00" class="validate" >
              </div> 
			  </div>
              <div class="input-field col s12">
                <input id="venue" name="venue" type="text" class="validate">
                <label for="Venue" class="black-text">Venue</label>
              </div> 
              <div class="input-field col s12">
                <input id="pricedet" name="pricedet" type="text" class="validate" required>
                <label for="pricedet" class="black-text">Price Details</label>
              </div> 			  
			  <div class="file-field col s12">
				  <div class="btn">
					<span>Upload Poster</span>
					<input type="file" name="file">
				  </div>
				  <div class="file-path-wrapper">
					<input class="file-path validate" type="text" name="file">
				  </div>
			  </div>			  
			  <br><br>			  
              <div class="input-feild">
                &nbsp&nbsp <button class="btn waves-effect waves-light" style="border:1px solid black;border-radius:50px;" type="submit" name="action">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>  
			</form>
<?php
}
else{
          echo '<script type="text/javascript">';
		  echo 'window.location.href="login.php";';
		  echo '</script>';		  	
}
?>			
          </div>
        </div>
      </div>
    </div>
</div>
</li>
    <li>
      <div style="border-radius:10px;" class="collapsible-header<?php if(isset($_POST['title'])){ echo ' active';}?>"><i class="material-icons">filter_drama</i>Add Result</div>	  
      <div class="collapsible-body" style="border-radius:10px;">
	  <div class="row">
	  <div class="col l8 offset-l2 s10 offset-s1">
 <?php
 if(isset($_POST['title']) && isset($_POST['desc']) && isset($_POST['shouri']) && isset($_POST['smini']) && isset($_POST['ehouri']) && isset($_POST['emini']) && isset($_POST['file']) && isset($_POST['edate']) && isset($_POST['cat']) && isset($_POST['pricedet']))
 {
	 $title=$_POST['title'];
	 $desc=$_POST['desc'];
	 $shour=$_POST['shouri'];
	 $smin=$_POST['smini'];
	 $ehour=$_POST['ehouri'];
	 $emin=$_POST['emini'];
	 $venue="";
	 if(isset($_POST['venue']))
	 {
		$venue=$_POST['venue'];	
	 }
	 $file= $_POST['file'];
	 $edate=$_POST['edate'];
	 $cat=$_POST['cat'];
	 $pricedet=$_POST['pricedet'];
	 if(!empty($title) && !empty($desc) && !empty($shour) && !empty($smin) && !empty($ehour) && !empty($emin) && !empty($file) && !empty($edate) && !empty($cat) &&!empty($pricedet))
	 {
		 $stime=$shour.':'.$smin.':'.'00';
		 $etime=$ehour.':'.$emin.':'.'00';		 
		 $query="INSERT INTO event VALUES('','".mysql_real_escape_string($title)."','".mysql_real_escape_string($desc)."','".mysql_real_escape_string($edate)."','".mysql_real_escape_string($stime)."','".mysql_real_escape_string($etime)."','".mysql_real_escape_string($venue)."','".mysql_real_escape_string($cat)."','".mysql_real_escape_string($pricedet)."')";
		 if($query_run=mysql_query($query))
		 {
			$name=@$_FILES['file']['name'];
			$tmp_name=@$_FILES['file']['tmp_name'];
			$size=@$_FILES['file']['size'];
			$type=@$_FILES['file']['type'];
			$extension=strtolower(substr($name,strpos($name,'.')+1));
			//echo '<b style="color:red;">'.$name.'</b>';
			 if(isset($name))
			  {
				if(!empty($name))
				{
				   $location="eventimg/";
				   if(($extension=='jpg' || $extension=='jpeg' || $extension=='png') && ($type=='image/jpeg' || $type=='image/png'))
						{
						$queryed="SELECT id FROM event WHERE title='".mysql_real_escape_string($title)."'";
									 $queryed_run=mysql_query($queryed);
									 $eid=mysql_result($queryed_run,0,'id');							
					   if(move_uploaded_file($tmp_name,$location.$eid.'.jpg'))
					   {
									 echo '<br>
										  <ul class="collection" style="opacity: 0.8;border:1px solid black;border-radius:10px;">
											<li class="collection-item active"><b>Event </b><a href="eventedit.php?id='.$eid.'" class="secondary-content"><i class="material-icons">send</i> <span>Edit</span></a></li>										  
											<li class="collection-item "><div class="card-image waves-effect waves-block waves-light">
												<center><img class="activator" src="eventimg/'.$eid.'.jpg" height="400px"></center>
											</div></li>
											<li class="collection-item "><b>Event Title -: </b>'.$title.'</li>											
											<li class="collection-item"><div><b>Description -: </b>'.$desc.'</div></li>
											<li class="collection-item"><div><b>Event Category -: </b>'.$cat.'</div></li>											
											<li class="collection-item"><div><b>Date -: '.$edate.'</b</div></li>
											<li class="collection-item"><div><b>Timings -: </b>'.$stime.' to '.$etime.'</div></li>
											<li class="collection-item"><div><b>Venue -: </b>'.$venue.'</div></li>
											<li class="collection-item"><div><b>Price Details -: </b>'.$pricedet.'</div></li>											
										  </ul>				  
									 ';						   
					   }
						else
						{		
						echo '<b style="color:red;">&nbsp error in uploading</b>';
						}
					 }
					  else
					  {
					  echo '<b style="color:red;">&nbsp Please Upload jpeg/jpg/png file</b>';
					  }
				}
				 else
				 {
				 echo '<b style="color:red;">&nbsp Please Upload file</b>';	
				 }
			  }
			   else
			   {
				   echo '<b style="color:red;">&nbsp Please Select File</b>';
			   }
		 }
	 }
	 else
	 {
	      echo '
			<ul class="collection" style="opacity: 0.8;border:1px solid black;border-radius:10px;">		  
				<li  class="collection-item active"><span style="color:white;">&nbsp Fill all the Fields</span>
				</li>
			</ul>	
				';
	 }
 } ?>
 	</div>
	</div>
	</div>
	</div>
   </li>
   </ul>
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