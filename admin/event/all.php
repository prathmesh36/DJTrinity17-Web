<div class="navbar">
<nav>
<?php
include 'connect.php';
?>
    <div class="nav-wrapper white">
		<?php
		if(isset($_SESSION['user_id']))
		{
		?>
	  &nbsp &nbsp <a href="#!" class="brand-logo black-text" style="font-size:20px;"><i class="material-icons"><img width="40px" height="40px" src="default.jpg" alt="" class="circle" style="margin-top:2px;"></i>	
		<?php		
			$user_id=$_SESSION["user_id"];
			$query="SELECT sap FROM quizadmin WHERE id='".$user_id."'";
			$query_run=$conn->query($query);
			//echo 'Admin';
			if ($query_run && $query_run->num_rows)  
			{  
			echo $lsap = $query_run->fetch_assoc()['sap'];  
			}										
			echo '</a>';
		}
		else
		{
		?>
	  &nbsp &nbsp <a href="#!" class="brand-logo black-text" style="font-size:20px;">Events Admin Panel<i class="material-icons"></i>		
	  </a>
	  <?php 
		}
	  ?>
      <a href="#" data-activates="mobile-demo" class="button-collapse  black-text"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
		<?php 
		if(isset($_SESSION['user_id'])){
		?>
		<li><a href="eventadd.php" class="black-text"><i class="material-icons left black-text">add</i>Add Events</a></li>	  
	    <li><a href="listpage.php" class="black-text"><i class="material-icons left black-text">edit</i>Events List</a></li> 						
		<li><a href="eventlist.php" class="black-text"><i class="material-icons left black-text">today</i>Upcoming Events</a></li>	  		
        <li><a href="logout.php" class="black-text"><i class="material-icons left black-text">power_settings_new</i>Logout</a></li>						
		<?php
		}else{
		?>
        <li><a href="login.php" class="black-text"><i class="material-icons left black-text">perm_identity</i>Login</a></li>
		<li><a href="eventlist.php" class="black-text"><i class="material-icons left black-text">today</i>Upcoming Events</a></li>	 				
		<?php
		}
		?>
	  </ul>
      <ul class="side-nav" id="mobile-demo">
		<?php if(isset($_SESSION['user_id']))
		{
		?>
        <li><a href="eventadd.php"  class="black-text"><i class="material-icons left  black-text">add box</i>Add Events</a></li>
	    <li><a href="listpage.php" class="black-text"><i class="material-icons left black-text">edit</i>Events List</a></li> 						
		<li><a href="eventlist.php" class="black-text"><i class="material-icons left black-text">today</i>Upcoming Events</a></li>	 		
        <li><a href="logout.php" class="black-text"><i class="material-icons left black-text">power_settings_new</i>Logout</a></li>			
		<?php	
		}
		else
		{
		?>
        <li><a href="login.php" class="black-text"><i class="material-icons left black-text">perm_identity</i>Login</a></li>
		<li><a href="eventlist.php" class="black-text"><i class="material-icons left black-text">today</i>Upcoming Events</a></li>	 				
		<?php
		}
		?>      
	  </ul>
    </div>
  </nav>
</div>