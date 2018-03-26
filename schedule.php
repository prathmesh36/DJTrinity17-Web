<!DOCTYPE HTML>
<html>
	<head>
        <title>Schedule</title>
        <meta name="description" content="">
        <?php include 'assets/static/head.php' ;?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<style>
			@media screen and (min-width: 10px) and (max-width: 388px){
				.xsfonts{
					font-size:120% !important;
				}
			}				
		</style>
	</head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100i,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="assets/main/css/sch.css">
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
		
	<?php include 'assets/static/nav.php';?>
        
	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(assets/main/images/contact.jpg); width:130%;" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-left">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
							<h1 class="mb30">Schedule</h1>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	

	<div id="fh5co-services">
		<div class="container">
			<div class="row row-pb-md" style="padding-bottom:0px !important;">
				<div class="col-md-8 col-md-offset-2 text-left animate-box" data-animate-effect="fadeInUp">
					<div class="fh5co-heading text-center">
						<span>DJ Trinity 2017</span>
						<span class="glyphicon glyphicon-calendar" style="font-size:50px;"></span>
						<h2>Schedule DJ Trinity 2017</h2>
						<p>Know the dates well !</p>
					</div>
				</div>
			</div>
			<div class="row">
			<div class="">
			  <section class="timeline">
				  <div class="timeline-item" style="height:50px;">

					<div id="start" class="timeline-img text-center" style="position:absolute;left:42.8%;width:200px;color:white;font-weight:bold;font-size:20px;padding:10px;border-radius:10px;margin-top:0px;">Trinity Begins</div>
				  </div>   			  
				<div class="container">
				  <?php 
				  include 'admin/event/connect.php';
				  $query="SELECT * FROM event order by evtdate,stime ";
				  $query_run=$conn->query($query);
				  $i=0;
				  while($data=$query_run->fetch_assoc())
				  {
							$rstime=substr($data['stime'],0,strpos($data['stime'],':'));
							  $retime=substr($data['etime'],0,strpos($data['stime'],':'));				  
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
								 $strtime=$rstime.':'.substr($data['stime'],3,2).$sflag.' '; 
								 if($data['etime']!="00:00:00")
								  $strtime = $strtime;										 
							  }	
							   else
							   {
								 $strtime=$rstime.':'.substr($data['stime'],3,2).'am '; 
								 if($data['etime']!="00:00:00")
								 $strtime= $strtime.'am</p>';										 					   
							   }					  
                      $date=date_create($data['evtdate']);
					  $evtdated=date_format($date,"d");
					  $evtdateth=date_format($date,"S");	
					  $evtdatem=date_format($date,"M");
					  $odate=date_format($date,"dS");
					  if($i%2==0)
					  {
				  ?>
				  <div class="timeline-item">

					<div class="timeline-img text-center" style="color:white;font-weight:bold;font-size:20px;padding-top:8px;"><?php echo ltrim($odate,'0');?></div>

					<div class="timeline-content timeline-card js--fadeInRight">
						<div class="timeline-img-header" style="background:linear-gradient(transparent, rgba(0, 0, 0, 0.4)), url('admin/event/eventimg/<?php echo $data['id'];?>.jpg') center center no-repeat;background-size:cover;">
						<h3><?php echo $data['title'];?></h3>
						</div>
						<div class="date"><font style="font-family:Times new roman;font-size:30px;margin:0px;"><?php 
							   echo ltrim($evtdated,'0'); 
						?></font><?php echo $evtdateth." ".$evtdatem;?></div>
					  <p><?php echo $data['one_liners'];?></p>
					  <a class="bnt-more" href="javascript:void(0)"><button class="btn btn-primary" style="margin-bottom:20px;background-color:#008b8b;padding:10px;font-size:18px;" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="window.location='#<?php echo $data['id'];?>'; modalfunc();">Details</button></a>
					</div>
				  </div>   
					  <?php }else
					        {
						  
						  ?>				  
				  <div class="timeline-item">

					<div class="timeline-img text-center" style="color:white;font-weight:bold;font-size:20px;padding-top:8px;"><?php echo ltrim($odate,'0');?></div>

					<div class="timeline-content timeline-card js--fadeInLeft">
						<div class="timeline-img-header"  style="background:linear-gradient(transparent, rgba(0, 0, 0, 0.4)), url('admin/event/eventimg/<?php echo $data['id'];?>.jpg') center center no-repeat;background-size:cover;">
						<h3><?php echo $data['title'];?></h3>
						</div>
						<div class="date"><font style="font-family:Times new roman;font-size:30px;margin:0px;"><?php 
							   echo ltrim($evtdated,'0'); 
						?></font><?php echo $evtdateth." ".$evtdatem;?></div>
					  <p><?php echo $data['one_liners'];?></p>
					  <a class="bnt-more" href="javascript:void(0)"><button class="btn btn-primary" style="margin-bottom:20px;background-color:#008b8b;padding:10px;font-size:18px;" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="window.location='#<?php echo $data['id'];?>'; modalfunc();">Details</button></a>
					</div>
				  </div>   
					<?php
							}
					$i++;
				  }
					?>
				</div>
			  </section>
			</div>
			</div>
		</div>
	</div>


 <?php include 'assets/static/footer.php';?>
	</div>
    <div class="modal fade bd-example-modal-lg" id="evtmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg1">	  
			<div class="modal-content">			
			<?php 
				  echo '<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title" id="response">'.$data['title'].'</h3>
				  </div>';	  
				  echo '<div class="modal-body xsfonts"  style="font-size:140%;color:grey;">
				    <img id="img" class="img-responsive img-rounded " style="margin:0 auto;width:100%;height:100%;" src="">
					<br>
					<hr><p><span class="glyphicon glyphicon-list-alt" style="font-size:20px;"></span><b>&nbsp Description</b></p><hr><span id= "desc" style="color:grey;"></span><hr>
					<p><span class="glyphicon glyphicon-tasks" style="font-size:20px;"></span><b>&nbsp Other Details</b></p><hr>					
					<div class="row"><div class="col-xs-4 text-left" style="padding-left:2%;padding-right:0px;" ><span class="glyphicon glyphicon-calendar"></span><b>&nbsp Date: </b></div><div class="col-xs-8 text-left" style="padding-left:0px;"><p id="date"></p></div></div>		
					<div class="row"><div class="col-xs-4 text-left" style="padding-left:2%;padding-right:0px;"><span class="glyphicon glyphicon-time"></span><b>&nbsp Time: </b></div><div class="col-xs-8 text-left" style="padding-left:0px;"><p id="time"></p></div></div>					
					<div class="row" id="hide"><div class="col-xs-4 text-left" style="padding-left:2%;padding-right:0px;" ><span class="glyphicon glyphicon-picture"></span><b>&nbsp Venue: </b></div><div class="col-xs-8 text-left" style="padding-left:0px;"><p id="venue"></p></div></div>
					<div class="row"><div class="col-xs-4 text-left" style="padding-left:2%;padding-right:0px;"><span class="glyphicon glyphicon-usd"></span><b>&nbsp Fees: </b></div><div class="col-xs-8 text-left" style="padding-left:0px;"><p id="price"></p></div></div>					
					<div class="row"><div class="col-xs-4 text-left" style="padding-left:2%;padding-right:0px;"><span class="glyphicon glyphicon-user"></span><b>&nbsp Contact: </b></div><div class="col-xs-8 text-left" style="padding-left:0px;"><p id="coord"></p></div></div>					
					</div>
				  <div class="modal-footer">
					<span id="reg"></span>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>					
				  </div>';						  
			?>	
			
			</div>
		  </div>
		</div>	
		<script type="text/javascript">		
		function modalfunc(){			
		var xmlhttp=new XMLHttpRequest();
		var url=location.hash;
		url=url.replace('#','');
		var filterurl=url.replace(/ /g,"_").toLowerCase();		
		xmlhttp.open("GET","getevt.php?id="+filterurl,false);
		xmlhttp.send(null);
		var evtdata=xmlhttp.responseText;
		var evtarr = evtdata.split("~");
		if(evtarr[1]!="undefined")
		{	
		document.getElementById("response").innerHTML=evtarr[1];
		document.getElementById("img").src="admin/event/eventimg/"+evtarr[0]+".jpg";
		document.getElementById("desc").innerHTML=evtarr[2];
		if(evtarr[3]!="NA")
		{
		document.getElementById("hide").style.display="block";			
			document.getElementById("venue").innerHTML=evtarr[3];
		}
		else
		{
		document.getElementById("hide").style.display="none";
		}
		document.getElementById("date").innerHTML=evtarr[4];
		document.getElementById("time").innerHTML=evtarr[5];
		document.getElementById("price").innerHTML=evtarr[6];				
		document.getElementById("coord").innerHTML=evtarr[7];
		document.title = evtarr[1];
		//var metas = document.getElementsByTagName("meta");
		//metas[1].setAttribute("content",evtarr[1]);
		//alert(metas[1].getAttribute("content"));
		if(evtarr[8]!="NA")
		{		
		document.getElementById("reg").innerHTML='<button type="button" class="btn btn-default" style="background:green;color:white;" onClick="location.href=\''+evtarr[8]+'\';">Register</button>';	
		}
		else
		{
		document.getElementById("reg").style.display="none";			
		}
		}
		else{
			alert("asdknk");
		}
		}
		</script>		
	<!-- <div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div> -->
<script src='https://cdn.jsdelivr.net/scrollreveal.js/3.3.1/scrollreveal.min.js'></script>
    <script src="assets/main/js/index.js"></script>	
	<?php include 'assets/static/scripts.php'; ?>
	</body>
</html>

