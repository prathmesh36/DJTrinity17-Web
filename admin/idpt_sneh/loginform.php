<?php 

    session_start();


    if(isset($_POST['name']) AND isset($_POST['pass'])){

        $user = $_POST['name']; 
    $pass = $_POST['pass'];
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
   $sql = 'SELECT * FROM idptlogin';
  
   $retval = mysql_query( $sql, $conn);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   // , $conn

   while($row = mysql_fetch_array($retval)) {
      $cname=$row['username']; //c for correct
      $cpass=$row['password'];
      
      
      if($cname==$user && $cpass==$pass)
      {
        $_SESSION['uid'] = $row['sr'];
         echo "<script>document.location='update_scores.php' </script>";

      }
      else
      {
         echo "Wrong Creds.";
      }
   }
   

   mysql_close($conn);

    }//end of if

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
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

  <div class="container" style="margin-top:25px;">
    <div class="row">
      <div class="col s12 m4 offset-m4" >
        <div style="position:relative; max-width:180px; height:50px;"><i style="position:absolute;top:0px;left:0px;" class="medium material-icons white-text">perm_identity</i><h3 style="position:absolute; left:55px; margin:0 0 1px 0;" class="white-text" ><u>Login</u></h3></div>
        <div><br>
    </div>
    <div class="card-panel hoverable z-depth-5" style="opacity: 0.6;border:1px solid black;border-radius:10px;">
          <div class="row">
          <form class="col s12" action="#" method="POST" >
            <div class="row">
              <div class="input-field col s12">
                <input id="SAP" name="name" type="text" class="validate" style="">
                <label for="SAP" >Username</label>
              </div>                           
              <div class="input-field col s12" style="">
                <input id="password" name="pass" type="password" class="validate">
                <label for="password">Password</label>
              </div>                      
              <div class="input-feild">
                &nbsp&nbsp <button class="btn waves-effect waves-light" style="border:1px solid black;border-radius:50px;" type="submit" name="action">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>  
          </form>

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
    $(document).ready(function(){
      $('.parallax').parallax();
    });

  </script>
</body>
</html>
