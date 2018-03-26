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

<body  style="background-image:url('Capture.PNG');background-size:cover;">
<?php 
include 'all.php'; 
?>
  <div class="container" style="margin-top:25px;">
    <div class="row">
      <div class="col l8 offset-l2 s12">
        <div style="position:relative; max-width:330px; height:50px;"><i style="position:absolute;top:0px;left:0px;" class="small material-icons white-text">mode_edit</i><h4 style="position:absolute; left:40px; margin:0 0 1px 0;" class="white-text" >Question Edit Panel</h4></div>
        <div><br>
		</div>	  
        <div class="card-panel hoverable"  style="opacity: 0.6;border:1px solid black;border-radius:10px;">
          <div class="row">
<?php
if(isset($_SESSION['user_id']))
{
	$qid=$_GET['id'];
	$querye="SELECT * FROM questiontbl WHERE Questionid='".mysql_real_escape_string($qid)."'";
	if($querye_run=mysql_query($querye)){
		$qdata=mysql_fetch_assoc($querye_run);
	}
?>		  
          <form class="col s12" action="edit.php?id=<?php echo $qid;?>" method="POST">
            <div class="row">
			  <div class="input-field col s12">
				<textarea id="Question" name="question" class="materialize-textarea"><?php echo $qdata['Question'];?></textarea>
				<label for="Question" class="black-text">Question</label>
			  </div>
              <div class="input-field col s12">
                <input id="Option1" name="option1" type="text" class="validate" value="<?php echo $qdata['OptionA'];?>">
                <label for="Option1" class="black-text">Option 1</label>
              </div>
              <div class="input-field col s12">
                <input id="Option2" name="option2" type="text" class="validate" value="<?php echo $qdata['OptionB'];?>">
                <label for="Option2" class="black-text">Option 2<label>
              </div>              
              <div class="input-field col s12">
                <input id="Option3" name="option3" type="text" class="validate" value="<?php echo $qdata['OptionC'];?>">
                <label for="Option3" class="black-text">Option 3<label>
              </div>              
              <div class="input-field col s12">
                <input id="Option4" name="option4" type="text" class="validate" value="<?php echo $qdata['OptionD'];?>">
                <label for="Option4" class="black-text">Option 4<label>
              </div> 
              <div class="input-field col s12">
                <input id="Answer" name="answer" type="text" class="validate" value="<?php echo $qdata['Answer'];?>">
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
		$queryu="UPDATE questiontbl SET Question='".mysql_real_escape_string($quest)."', OptionA='".mysql_real_escape_string($opt1)."', OptionB='".mysql_real_escape_string($opt2)."', OptionC='".mysql_real_escape_string($opt3)."', OptionD='".mysql_real_escape_string($opt4)."', Answer='".mysql_real_escape_string($ans)."' WHERE Questionid='".mysql_real_escape_string($qid)."'";
		if($queryu_run=mysql_query($queryu))
		{
			 echo '
				  <ul class="collection">
					<li class="collection-item active"><b>Question -: </b>'.$quest.'</a></li>
					<li class="collection-item"><div><b>Option 1 -: </b>'.$opt1.'</div></li>
					<li class="collection-item"><div><b>Option 2 -: </b>'.$opt2.'</div></li>
					<li class="collection-item"><div><b>Option 3 -: </b>'.$opt3.'</div></li>
					<li class="collection-item"><div><b>Option 4 -: </b>'.$opt4.'</div></li>
					<li class="collection-item active"><div><b>Answer -: </b>'.$ans.'</div></li>				  
				  </ul>				  
			 ';			
		}
		else{
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
 }	 
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