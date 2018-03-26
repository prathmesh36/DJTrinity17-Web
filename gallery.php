<!DOCTYPE HTML>

<html>
	<head>
		<title>Gallery</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/gallery/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/gallery/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/gallery/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/gallery/css/ie8.css" /><![endif]-->
	</head>
	<body>
	<?php

		$servername = "localhost";
		$username = "";
		$password = "";
		$dbname = "";

		
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

		$sql = 'SELECT event_url FROM event_gallery;';
   		$result = $conn->query($sql);
   		$count = 1;
	?>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="gallery.php"><strong>D.J. Trinity</strong> Gallery</a></h1>
					   
							
						<nav>
							<ul>
								<!--<li><a href="#footer" class="icon fa-info-circle">About</a></li>-->
							</ul>
							<ul>
<li><a href="home.php">Home</a></li>
						
						</nav>
					</header>

				<!-- Main -->
					<div id="main">
						<?php
							while ($row=$result->fetch_assoc()) {
								
						?>
						    <article class="thumb">
								<a href="<?php echo $row['event_url'];?>" class="image"><img src="<?php echo $row['event_url'];?>" alt="" /></a>	
								<h2>
									<?php
										if ($count<13) { echo "IC CAR"; }
										elseif ($count>=13) { echo "IDPT DANCE"; }
										else{}
									?>
								</h2>
								
							</article>
						<?php
							$count = $count + 1; 
							} 
						?>
					</div>
			</div>

		<!-- Scripts -->
			<script src="assets/gallery/js/jquery.min.js"></script>
			<script src="assets/gallery/js/jquery.poptrox.min.js"></script>
			<script src="assets/gallery/js/skel.min.js"></script>
			<script src="assets/gallery/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/gallery/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/gallery/js/main.js"></script>

	</body>
</html>