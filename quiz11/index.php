<html>
	<head>
		<title>IDPT QUIZ-DJ Trinity</title>
      <meta name="description" content="A party for all the filmy ones to brainstorm their minds and prove their love for the industry and fandoms to the stars with a quirky, filmy Quiz!">
<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style type="text/css">
      	body {
      		background: url("img/bg.jpg");
  		background-size: cover;
      	}
   select{
        overflow-y: auto !important;
    }
      	.error{
      		color: red !important;
      	}

      </style>
	 
    </head>

    <body>
      	<!--Login form-->
		<div class="v-wrapper row" style="min-height:100vh">
			<div class="v-box row">
				<div class="center">
					<img src="img/logo2.png" style="height: 200px">
    			</div>
    			<div class=" col m4 offset-m4"> 
				<div class="card teal">
    				<!-- <div class="card-content white-text center">
      					<h4>IDPT QUIZ</h4>
      					
    				</div> -->
    				<div class="card-tabs ">
      					<ul class="tabs tabs-fixed-width tabs-transparent">
        					<li class="tab"><a class="active" href="#login">Login</a></li>
        					<li class="tab"><a href="#register">Register</a></li>
      					</ul>
    				</div>
    				<div class="card-content white lighten-4">
      					<div id="login">
      						<form method="post" class="center" action="scripts/login.php">
								<input type="text"  placeholder="Sap Id" name="sap"  />
								<input type="password" placeholder="Password" name="pass"/>
								<!-- <div class="col m12 center-align button-field back">
								
								<button class="col m6 green lighten-1 white-text btn-flat waves-effect waves-teal grey-text" style="margin-bottom:15px;margin-left:50px;border-radius: 20px !important;" name="register">
									Register
								</button>
							</div> -->
								<button class="btn btn-medium waves-effect waves-light" type="submit" name="login">
								Submit<i class="material-icons right">send</i>
  								</button>
							</form>	
						</div>
      				<div id="register">
      					<form method="post" action="scripts/register.php" class="center" required />
							<input type="text" placeholder="Sap Id" name="sap" required />
							<input type="text" placeholder="Name" name="name" required />
							<select name="dep" required>
								<option value="" disabled selected>Department</option>
								<option value="Bio-Prod Engineering">Bio-Prod Engineering</option>
								<option value="Computer Engineering">Computer Engineering</option>
								<option value="Chemical Engineering">Chemical Engineering</option>
								<option value="Electronic Engineering">Electronic Engineering</option>
								<option value="EXTC">Electronics And Telecomunications</option>
								<option value="Information Technology">Information Technology</option>
								<option value="Mechanical Engineering">Mechanical Engineering</option>
							</select>
							<select name="year" required>
								<option disabled value="" selected>Year</option>
								<option value="FE">First Year</option>
								<option value="SE">Second Year</option>
								<option value="TE">Third Year</option>
								<option value="BE">Fourth Year</option>
							</select>		
							<input type="password" placeholder="Password" name="pass" required />
							<p style="color:red">Note: Password should have minimum 8 characters.<br>Only points of the quiz played between 8pm to 12am will be counted.<br><br><br></p>
							<button class="btn btn-medium waves-effect waves-light" type="submit" name="register">
								Submit<i class="material-icons right">send</i>
  							</button>

					</form>
      				</div>
    			</div>
 			</div>
 			</div>
				
			</div>
		</div>
		 	<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <!-- Compiled and minified JavaScript -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
          
		<script type="text/javascript">
			
  $(document).ready(function() {
    $('select').material_select();

    $("#register_button").click(function(){
    	console.log("in click");
    	var pass = $("#pass").val();
    	if(pass.length < 8){
    		$("#pass").addClass("error");
    		alert('Password has to be minimum 8 characters.');
    		$("#form_register").submit(function(e){
    			e.preventDefault();
    		});
    		return;
    	}
    	else{
    		$("#form_register").unbind('submit').submit();
    		$("#pass").removeClass("error");

    	}
    });
  });

    
		</script>
	</body>
</html>
<?php
	@session_start();
	include 'scripts/connection.php';

		$sql = "DELETE FROM  `users` WHERE LoginId = SapId;";
			if ($conn->query($sql) === TRUE) 
		    {
		    	//echo "deleted";
		    	 //echo "window.location.href = '../index.php';</script>";
			    //header("location:../index.php");
			}
			else
			{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
?>