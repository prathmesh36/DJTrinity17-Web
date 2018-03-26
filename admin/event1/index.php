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
  <style>


  </style>
</head>

<body  class="blue lighten-2">
<?php 
	  include 'all.php';
?>
  <div class="container" style="margin-top:25px;">
    <div class="row">
	<?php
	  if(!isset($_SESSION['user_id']))
	  {	  
	?>
      <div class="col l8 offset-l2 s12" >
        <div style="position:relative; max-width:180px; height:50px;"><i style="position:absolute;top:0px;left:0px;" class="medium material-icons white-text">perm_identity</i><h3 style="position:absolute; left:55px; margin:0 0 1px 0;" class="white-text" ><u>Login</u></h3></div>
        <div><br>
		</div>
		<div class="card-panel hoverable z-depth-5" style="opacity: 0.6;border:1px solid black;border-radius:10px;">
          <div class="row">
          <form class="col s12" action="" method="POST" >
            <div class="row">
              <div class="input-field col s12">
                <input id="SAP" name="SAP" type="text" class="validate" style="">
                <label for="SAP" > &nbsp SAP ID</label>
              </div>                           
              <div class="input-field col s12" style="">
                <input id="password" name="password" type="password" class="validate">
                <label for="password"> &nbsp Password</label>
              </div>                      
              <div class="input-feild">
                &nbsp&nbsp <button class="btn waves-effect waves-light" style="border:1px solid black;border-radius:50px;" type="submit" name="action">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>  
          </form>
<?php 
if(isset($_POST['SAP']) && isset($_POST['password']))
{
 $sap=$_POST['SAP'];
 $password=$_POST['password'];
 $password_hash=$password;
 if(!empty($sap) && !empty($password))
   {
     $query="SELECT id,sap FROM quizadmin WHERE sap='".mysql_real_escape_string($sap)."' AND password='".mysql_real_escape_string($password_hash)."'";
     if($query_run=mysql_query($query))
       {
       $query_num=mysql_num_rows($query_run);
       if($query_num==0)
         {
          echo '<span style="color:red;"> &nbsp Invalid Email ID or Password</span>';
         }
       else
         {
          $user_id=mysql_result($query_run,0,'id');
          $_SESSION['user_id']=$user_id;
          echo "SUCCESS";
          exit;
          echo '<script type="text/javascript">';
		  echo 'window.location.href="eventadd.php";';
		  echo '</script>';		  
         } 
       }  
	  else
	   {
	      echo '<span style="color:red;">&nbspInvalid Details</span>';
	   }
   }
   else
   {
   echo '<span style="color:red;">&nbsp Enter the details</span>';
   }
}?>		  
          </div>
        </div>
      </div>
	<?php
	  }else
	  {
	?>
	  <div class="row">
	    <div class="col l8 offset-l2 s12" >
	    <ul class="collection s8">
		<li class="collection-item active">
		<span class="Title">Login User<span>
		</li>
		<li class="collection-item avatar">
		  <img src="default.jpg" alt="" class="circle">
		  <span class="title">Admin</span>
		  <p>
			  <?php 
			  echo $lsap;
			  ?>		  
		  </p>
		</li>
		</ul>
	  </div>	
	  </div>
	 <?php
	  }  
	?>  
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
    $(document).ready(function(){
      $('.parallax').parallax();
    });

  </script>
</body>
</html>