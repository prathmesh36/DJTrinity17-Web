<!DOCTYPE HTML>
<html>
	<head>
        <title>Sponsors</title>
        <meta name="description" content="">
        <?php include 'assets/static/head.php' ;?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="assets/main/css/scrolling-nav.css">		
	</head>

	<body>	
	<div class="fh5co-loader"></div>
	<div id="page">
	
	<?php include 'assets/static/nav.php';?>
        
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url('assets/main/images/contact.jpg');width:130%;" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-left">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
							<h1 class="mb30">Our Partners</h1>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

    <!-- About Section -->
	<div id="fh5co-project">	
        <div class="container"  id="allspon">
			 <!--div class="row ">
                 <div class="col-md-12 text-left fh5co-heading  animate-box">
                    <h2 class="text-center">Our Partners</h2>
					<br>
					<div class="row" style="padding-left:47px;">
                    <h3>Different Sponsors</h3>
                    <a class="btn btn-default page-scroll" href="#allspon">Check our Sponsors</a>
                    <a class="btn btn-default page-scroll" href="#allspon">Co-Sponsors</a>
                    <a class="btn btn-default page-scroll" href="#allspon">Banking Partners</a>	
					</div>
                 </div>
             </div-->
             <div class="col-lg-12">
						<?php 
						include 'admin/event/connect.php';								
						$query="SELECT * FROM sponsors";
						$query_run=$conn->query($query);
						echo '<div class="row" style="margin-top:0px;  display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; flex-wrap: wrap;">';	
						while($qdata=$query_run->fetch_assoc())
						{
						?>
							<div class="card col-md-4 col-sm-6 fh5co-project text-center center-block" style="width: 35rem;margin:20px auto;  display: flex; flex-direction: column;">
							  <a href="<?php echo $qdata['site'];?>" target="_blank" style="box-shadow:4px 4px 4px grey;"><img class="card-img-top img-responsive" src="assets/sponsors/<?php echo $qdata['id'];?>.jpg" style="background:#DDD"></a>
							  <div class="card-block">
								<h3 class="card-title" style="margin-top:20px;margin-bottom:7px;"><?php echo $qdata['name'];?></h3>
							  </div>
							</div>	
					    <?php }
						?>
				</div>
             </div>
        </div>
    </div>
	</div>

    <!-- Services Section 
	<div id="fh5co-services">	
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Services Section</h1>
                </div>
            </div>
        </div>
    </section>
	</div>

    <!-- Contact Section -
	<div id="fh5co-services" style="background:#eeeeee;">	
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact Section</h1>
                </div>
            </div>
        </div>
    </section>
	</div>-->

	
	

 <?php include 'assets/static/footer.php';?>
	</div>	
<!-- 
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	 -->
	<?php include 'assets/static/scripts.php'; ?>
	<script type="text/javascript" src="assets/main/js/scrolling-nav.js">	
	</body>
</html>
