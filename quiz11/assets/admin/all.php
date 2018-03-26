<div class="navbar">
<nav>
<?php
include 'core.php';
include 'connect.php';
?>
    <div class="nav-wrapper green">
		<?php
		if(isset($_SESSION['user_id']))
		{?>
	  &nbsp &nbsp <a href="#!" class="brand-logo" style="font-size:20px;"><i class="material-icons"><img width="40px" height="40px" src="default.jpg" alt="" class="circle" style="margin-top:2px;"></i>	
		<?php		
			$user_id=$_SESSION["user_id"];
			$query="SELECT sap FROM quizadmin WHERE id='".mysql_real_escape_string($user_id)."'";
			$query_run=mysql_query($query);
			//echo 'Admin';
			echo $lsap=mysql_result($query_run,0,'sap').'</a>';
		}
		else
		{
		?>
	  &nbsp &nbsp <a href="#!" class="brand-logo" style="font-size:20px;">Quiz Admin Panel<i class="material-icons"></i>		
	  </a>
	  <?php 
		}
	  ?>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
		<?php if(isset($_SESSION['user_id'])){?>	  
	    <li><a href="index.php"><i class="material-icons left">add</i>Add Question</a></li>	  
        <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Logout</a></li>		
		<?php
		}else{?>
        <li><a href="login.php"><i class="material-icons left">perm_identity</i>Login</a></li>			
		<?php
		}
		?>
	  </ul>
      <ul class="side-nav" id="mobile-demo">
		<?php if(isset($_SESSION['user_id'])){?>	  	  
        <li><a href="index.php"><i class="material-icons left">add box</i>Add Question</a></li>
        <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Logout</a></li>
		<?php
		}else{?>
        <li><a href="login.php"><i class="material-icons left">perm_identity</i>Login</a></li>			
		<?php
		}?>      
	  </ul>
    </div>
  </nav>
</div>