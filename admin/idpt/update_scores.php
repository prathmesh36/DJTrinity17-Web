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

<body  class="blue lighten-2">

  <div class="container" style="margin-top:25px;">
    <div class="row">
      <div class="col l8 offset-l2 s12" >
        <div style="position:relative; max-width:370px; height:50px;"><i style="position:absolute;top:0px;left:0px;" class="small material-icons white-text">library_add</i><h4 style="position:absolute; left:40px; margin:0 0 1px 0;" class="white-text" >Update Score</h4></div>
        <div><br>
    </div>
        <div class="card-panel hoverable" style="opacity: 0.6;border:1px solid black;border-radius:10px;">
          <div class="row">
    
          <form class="col s12 m6 offset-m3" action="#" method="POST">
            <div class="row">
              <div class="input-field col s12">
                <input id="IT" name="IT" type="text" class="validate">
                <label for="IT"  class="black-text">IT</label>
              </div>
              <div class="input-field col s12">
                <input id="Comps" name="Comps" type="text" class="validate">
                <label for="Comps"  class="black-text">Comps<label>
              </div>              
              <div class="input-field col s12">
                <input id="Mech" name="Mech" type="text" class="validate">
                <label for="Mech"  class="black-text">Mech<label>
              </div>              
              <div class="input-field col s12">
                <input id="Chem" name="Chem" type="text" class="validate">
                <label for="Chem" class="black-text">Chem<label>
              </div> 
              <div class="input-field col s12">
                <input id="EXTC" name="EXTC" type="text" class="validate">
                <label for="EXTC" class="black-text">EXTC<label>
              </div> 
               <div class="input-field col s12">
                <input id="Elex" name="Elex" type="text" class="validate">
                <label for="Elex"  class="black-text">Elex</label>
              </div>
               <div class="input-field col s12">
                <input id="Bio-Prod" name="Bio-Prod" type="text" class="validate">
                <label for="Bio-Prod"  class="black-text">Bio-Prod</label>
              </div>  

        <br><br>        
              <div class="input-feild">
                &nbsp&nbsp <button class="btn waves-effect waves-light" style="border:1px solid black;border-radius:50px;" type="submit" name="Submit">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>  
      </form>
    
          </div>
        </div>
      </div>
    </div>
  <div class="row">
    <div class="col l8 offset-l2 s12" >
     
 
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

<?php 
@session_start();

   
   if(isset($_POST['Submit'])){

     $it = $_POST['IT'];
      $comps = $_POST['Comps'];
        $mech = $_POST['Mech'];
        $chemical = $_POST['Chem'];
        $bioprod = $_POST['Bio-Prod'];
        $extc = $_POST['EXTC'];
        $elex = $_POST['Elex'];
       //$scores =  $it.','.$comps.','.$mech.','.$chemical.','.$bioprod.','.$extc.','.$elex;
       $score = $bioprod.','.$comps.','.$chemical.','.$elex.','.$extc.','.$it.','.$mech;
       echo $score;

          //its not going in here i guess

$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
         
        if(! $conn ) {
          die('Could not connect: ' . mysql_error());
       }
 echo "cdfefre";  
       $sql = "INSERT into idpt_points(points,date_time) values('".$score."',NOW());";
       echo $sql;

if ($conn->query($sql) === TRUE) 
    {
	    //echo "Record updated successfully";
	} else 
	{
	    echo "Error updating record: " . $conn->error;
	}
      
       

       //mysql_close($conn);
echo "<script type='text/javascript'>window.location.href = 'chart.php';</script>";
       //header("location:chart.php");

    }//end of if


?>
