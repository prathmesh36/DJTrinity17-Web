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
<?php 
include 'all.php'; 
?>
  <div class="container" style="margin-top:25px;">
    <div class="row">
      <div class="col l8 offset-l2 s12" >
        <div style="position:relative; max-width:370px; height:50px;"><i style="position:absolute;top:0px;left:0px;" class="small material-icons white-text">library_add</i><h4 style="position:absolute; left:40px; margin:0 0 1px 0;" class="white-text" >Question Add Panel</h4></div>
        <div><br>
		</div>
        <div class="card-panel hoverable" style="opacity: 0.6;border:1px solid black;border-radius:10px;">
          <div class="row">
<?php
if(isset($_SESSION['user_id']))
{
?>		  
          <form class="col s12" action="index.php" method="POST">
            <div class="row">
			  <div class="input-field col s12">
				<textarea id="Question" name="question" class="materialize-textarea"></textarea>
				<label for="Question" class="black-text">Question</label>
			  </div>
              <div class="input-field col s12">
                <input id="Option1" name="option1" type="text" class="validate">
                <label for="Option1"  class="black-text">Option 1</label>
              </div>
              <div class="input-field col s12">
                <input id="Option2" name="option2" type="text" class="validate">
                <label for="Option2"  class="black-text">Option 2<label>
              </div>              
              <div class="input-field col s12">
                <input id="Option3" name="option3" type="text" class="validate">
                <label for="Option3"  class="black-text">Option 3<label>
              </div>              
              <div class="input-field col s12">
                <input id="Option4" name="option4" type="text" class="validate">
                <label for="Option4" class="black-text">Option 4<label>
              </div> 
              <div class="input-field col s12">
                <input id="Answer" name="answer" type="text" class="validate">
                <label for="Answer" class="black-text">Answer<label>
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
	<div class="row">
	  <div class="col l8 offset-l2 s12" >
		 
 <?php
 if(isset($_POST['question']) && isset($_POST['option1']) && isset($_POST['option2']) && isset($_POST['option3']) && isset($_POST['option4']) && isset($_POST['answer']))
 {
	 $quest=$_POST['question'];
	 $opt1=$_POST['option1'];
	 $opt2=$_POST['option2'];
	 $opt3=$_POST['option3'];
	 $opt4=$_POST['option4'];
	 $ans=$_POST['answer'];
	 if(!empty($quest) && !empty($opt1) && !empty($opt2) && !empty($opt3) && !empty($opt4) && !empty($ans))
	 {
		 $query="INSERT INTO questiontbl VALUES('','".mysql_real_escape_string($quest)."','".mysql_real_escape_string($opt1)."','".mysql_real_escape_string($opt2)."','".mysql_real_escape_string($opt3)."','".mysql_real_escape_string($opt4)."','".mysql_real_escape_string($ans)."')";
		 if($query_run=mysql_query($query))
		 {
			 $queryed="SELECT Questionid FROM questiontbl WHERE Question='".mysql_real_escape_string($quest)."'";
			 $queryed_run=mysql_query($queryed);
			 $qid=mysql_result($queryed_run,0,'Questionid');
			 echo '
				  <ul class="collection" style="opacity: 0.8;border:1px solid black;border-radius:10px;">
					<li class="collection-item active"><b>Question -: </b>'.$quest.'<a href="edit.php?id='.$qid.'" class="secondary-content"><i class="material-icons">send</i> <span>Edit</span></a></li>
					<li class="collection-item"><div><b>Option 1 -: </b>'.$opt1.'</div></li>
					<li class="collection-item"><div><b>Option 2 -: </b>'.$opt2.'</div></li>
					<li class="collection-item"><div><b>Option 3 -: </b>'.$opt3.'</div></li>
					<li class="collection-item"><div><b>Option 4 -: </b>'.$opt4.'</div></li>
					<li class="collection-item active"><div><b>Answer -: </b>'.$ans.'</div></li>				  
				  </ul>				  
			 ';
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