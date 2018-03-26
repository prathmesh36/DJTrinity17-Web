<?
include 'admin/quiz/connect.php';
						
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>DJ Trinity</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include 'assets/static/head.php' ;?>
    <style>
		#overme {
                        overflow:hidden; 
                        white-space:nowrap; 
                        text-overflow: ellipsis;
                        }    
    @media screen and (min-width: 768px) {
        .modal-dialog {
          width: 900px; /* New width for default modal */
        }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 1200px; /* New width for large modal */
        }
    }	

	@media screen and (min-width: 10px) and (max-width: 388px){
		.xsfonts{
			font-size:120% !important;
		}
	}
    </style>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>

<body>
    <div class="fh5co-loader"></div>
    <?php include 'assets/static/nav.php';?>
    <div id="page">		
        <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(assets/gallery/images/thumbs/concert.jpg); width: 130%" data-stellar-background-ratio="0">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                                <h1 class="mb30">
									<!-- <img src="assets/main/images/logo_white.png" style="height:100px">
									href="assets/games/hextris/index.html"
								 	-->
									<div class="customP noselect" style="text-decoration: none;cursor: default;">#BBHH<br>
									<span class="visible-lg" style="font-size: 3rem">
									Best Beginnings Happen Here
									</span>
									</div>
									<!-- <span style="font-size: 0.5em;" class="customSpan text-center">Best Beginnings Happen Here</span> -->
								</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="fh5co-project">

            <div class="">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading  animate-box">
                    <span style="font-size: 2rem;color: #000; text-transform: none;">Trinity is an extravaganza beyond words, beyond description.It is the coming together of free spirits of like minded zealous youth and celebration of true artistic genius. 

Lots of opportunities to showcase your talents await you, only here at Trinity--best beginnings happen here.

Come and witness the biggest fest you can attend!</span>
                </div>
                
            </div>

        </div>
        </div> 
        <div id="fh5co-services" class="fh5co-bg-section border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 ">
                        <div class="feature-center animate-box" data-animate-effect="fadeInUp">
                            <span class="icon">
							<i class="fa fa-trophy"></i>
						</span>
                            <h3>Sports</h3>
                            <p>The sports festival experiences students all over Mumbai to compete in various sports like badminton, table tennis, cricket, football witth zeal, enthusiasm and a never-dying spirit.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 ">
                        <div class="feature-center animate-box" data-animate-effect="fadeInUp">
                            <span class="icon">
							<i class="fa fa-cogs" aria-hidden="true"></i>
						</span>
                            <h3>Technical</h3>
                            <p>The technical festival observes innovators who come together and strive to make technological advancements. It makes sure to fill everybody up with the spirit.</p>
                        </div>
                    </div>
                    <div class="clearfix visible-sm-block"></div>
                    <div class="col-md-4 col-sm-6 ">
                        <div class="feature-center animate-box" data-animate-effect="fadeInUp">
                            <span class="icon">
							<i class="icon-music"></i>
						</span>
                            <h3>Cultural</h3>
                            <p>The cultural festival has lot of fun events in store. It gives students a chance to showcase their talent- be it dancng, singing, sketching or acting. It gives students a chance to rejoice and have fun.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- ----------------EVENTS SECTION CODE HERE------ -->
				
        <div id="fh5co-project">
            <div class="container" align="center" style="padding-left:15px;">
                <div class="row">
                    <span class="glyphicon glyphicon-calendar" style="font-size:50px;"></span><h1 class="text-center">Upcoming Events</h1>
                </div>
                <br>
                <div class="row">				
						<?php
						include 'admin/event/connect.php';
						$cdate=date('Y-m-d');
						$query="SELECT * FROM event WHERE evtdate>='".$cdate."' ORDER BY evtdate,stime Limit 0,3";
						$query_run=$conn->query($query);
						while($qdata=$query_run->fetch_assoc())
						{
						?>					  
							<div class="card col-md-4 col-sm-6 fh5co-project text-center center-block" style="margin: 0px auto;display: flex; flex-direction: column;">
							  <a href="admin/event/eventimg/<?php echo $qdata['id'];?>.jpg" style="display:inline;" data-lightbox="gallery" data-title="<?php echo $qdata['descrip'];?>"><img class="card-img-top img-responsive center-block" style="margin:0px auto;box-shadow:2px 2px 2px #111111;" src="admin/event/eventimg/<?php echo $qdata['id'];?>.jpg" alt="Card image cap"></a>
							  <div class="card-block">
								<h3 class="card-title" style="margin-top:20px;margin-bottom:7px;"><?php echo $qdata['title'];;?></h3>
								<p class="card-text" style="margin-bottom:5px;" id="overme"><?php echo $qdata['one_liners'];?></p>
								<button class="btn btn-primary" style="margin-bottom:20px;" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $qdata['id']?>">Details</button>
							  </div>
							</div>							
						<?php
						}
						?>
						</div>
			</div>
        </div>	
        <?php include 'assets/static/footer.php';?>
		</div>
		<!-- ----------- MODAL CODE HERE---------------- -->
  <!-- Detail modal -->
	<?php
						include 'admin/quiz/connect.php';
						$cdate=''.date('Y-m-d');
						$sql="SELECT * FROM event WHERE evtdate>='".$cdate."' ORDER BY evtdate,stime Limit 0,3";
						$result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                              while($qdata = $result->fetch_assoc()) {
                                              	$date=date_create($qdata['evtdate']);
							$evtdate=date_format($date,"dS, M Y");
			  ?>	
		<div class="modal fade bd-example-modal-lg<?php echo $qdata['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg1">	  
			<div class="modal-content" style="width:100%:">		
			<?php 
				  echo '<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h3 class="modal-title  text-center"><b>'.$qdata['title'].'</b></h3>

				  </div>';
				  echo '<div class="modal-body xsfonts" style="font-size:140%;">
				    <img class="img-responsive img-rounded " style="margin:0 auto;width:100%;height:100%;" src="admin/event/eventimg/'.$qdata['id'].'.jpg">
					<hr><b><span style="color:black;"><span class="glyphicon glyphicon-list-alt" style="font-size:20px;"></span>&nbsp Description</span></b><hr>'.$qdata['descrip'].'<hr>
					<b><span style="color:black;"><span class="glyphicon glyphicon-tasks" style="font-size:20px;"></span>&nbsp Other Details</span></b><hr>
					<div class="row">
					<div class="col-xs-4 text-left" style="padding-left:3%;padding-right:0px;"><b><span class="glyphicon glyphicon-calendar"></span>&nbsp Date : </b></div><div class="col-xs-8 text-left" style="padding-left:0px;"><p>'.$evtdate.'</p></div></div>';
				  $rstime=substr($qdata['stime'],0,strpos($qdata['stime'],':'));
				  $retime=substr($qdata['etime'],0,strpos($qdata['stime'],':'));				  
				  if($rstime>=12 || $retime>=12)
				  {
					 $sflag="am";
					 $eflag="am";
					 if($rstime>12)	
					 {
					 $rstime=$rstime-12;
					 $sflag="pm";
					 }
				     if($retime>12)
					 {
					 $retime=$retime-12;	 
					 $eflag="pm";
					 }
					if($rstime==12)
						$sflag="pm";
					if($retime==12)
						$eflag="pm";					 
					 echo '<div class="row"><div class="col-xs-4 text-left" style="padding-left:3%;padding-right:0px;"><b><span class="glyphicon glyphicon-time"></span>&nbsp Time : </b></div><div class="col-xs-8 text-left" style="padding-left:0px;"><p>'.$rstime.':'.substr($qdata['stime'],3,2).$sflag; 
					 if($qdata['etime']!="00:00:00")
					 {
					  echo ' to '.$retime.':'.substr($qdata['etime'],3,2).$eflag.'</p></div></div>';
					 }
					else
					{
					 echo '</div></div>';
					}
				  }	
				   else
				   {
					 echo '<div class="row"><div class="col-xs-4 text-left" style="padding-left:3%;padding-right:0px;"><b><span class="glyphicon glyphicon-time"></span>&nbsp Time : </b></div><div class="col-xs-8 text-left" style="padding-left:0px;"><p>'.$rstime.':'.substr($qdata['stime'],3,2).'am '; 
					 if($qdata['etime']!="00:00:00")
					 {
					  echo 'to '.$retime.':'.substr($qdata['etime'],3,2).'am</p></div></div>';	
					 }
					else
					{
					 echo '</div></div>';
					}				  
				   }
				   if($qdata['venue']!="NA")
				  echo '<div class="row"><div class="col-xs-4" text-left" style="padding-left:3%;padding-right:0px;"><b><span class="glyphicon glyphicon-picture"></span>&nbsp Venue : </b></div><div class="col-xs-8 text-left" style="padding-left:0px;"><p>'.$qdata['venue'].'</p></div></div>';
				  echo '<div class="row"><div class="col-xs-4" text-left" style="padding-left:3%;padding-right:0px;"><b><span class="glyphicon glyphicon-usd"></span>&nbsp Cost : </b></div><div class="col-xs-8 text-left" style="padding-left:0px;"><p>'.$qdata['price'].'</p></div></div>';	
				  echo '<div class="row"><div class="col-xs-4" text-left" style="padding-left:3%;padding-right:0px;"><b><span class="glyphicon glyphicon-user"></span>&nbsp <span>Contact :</span> </b></div><div class="col-xs-8 text-left" style="padding-left:0px;"><p>'.$qdata['coord'].' <a href="tel:'.$qdata['coord_no'].'"><span class="glyphicon glyphicon-earphone"></span> '.$qdata['coord_no'].'</a></p></div></div>';			  				  
				  $regurl=$qdata['regurl'];
				  echo '
				  <div class="modal-footer">';
				  if($regurl!="NA")
				  {
				  	echo '<button type="button" class="btn btn-default" style="background:green;color:white;" onClick="location.href=\''.$regurl.'\';">Register</button>';
				  }
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>';				  
			?>	
			
			</div>
		  </div>
		</div>
		</div>
			  <?php 
			     }
} else {
    echo "";
}
			?>
	<!-- <div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div> -->
    <?php include 'assets/static/scripts.php'; ?>
    <script type="text/javascript">
    	$(document).ready(function () {
    		$('.customP').click(function() {
				console.log("dsfsfd");
    			$.magnificPopup.open({
  items: {
	     src: 'slots/index.html'
     },
  type: 'iframe',
  iframe: {
	    	markup: '<div class="mfp-iframe-scaler">'+
            		'<div class="mfp-close"></div>'+
            		'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
            		'</div>', 
        
		     srcAction: 'iframe_src', 
     }
});
    		});
    	});
    </script>

	</body>
</html>
