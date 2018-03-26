  <!DOCTYPE HTML>
<html>
<head>
		<?php
		include 'admin/event/connect.php';		
		if(isset($_GET["id"]))
		{
			$id=$_GET["id"];
			if(!empty($id))
			{
				if(is_numeric($id))
				{
					$query="SELECT title, one_liners from event WHERE id='".$conn->real_escape_string($id)."'";
					$query_run=$conn->query($query);
					if ($query_run && $query_run->num_rows)  
					{  				
					$title=$query_run->fetch_assoc();
					echo '<title>'.$title['title'].'</title>';
					echo '<b:if cond="data:blog.pageType == “index”>
							<meta expr:content="data:blog.title" property="og:site_name"/>
							<meta content="en_US" property="og:locale"/>
							<meta content="en_GB" property="og:locale:alternate"/>
							<meta expr:content="data:blog.canonicalUrl" property="og:url"/>
							<meta expr:content="data:blog.pageTitle" property="og:title"/>
							<meta content="blog" property="og:type"/>
							<b:else/>
							<meta expr:content="data:blog.title" property="og:site_name"/>
							<meta content="en_US" property="og:locale"/>
							<meta content="en_GB" property="og:locale:alternate"/>
							<meta expr:content="data:blog.canonicalUrl" property="og:url"/>
							<meta expr:content="data:blog.pageName" property="og:title"/>
							<meta content="article" property="og:type"/>
							</b:if>
							<b:if cond="data:blog.metaDescription">
							<meta expr:content="data:blog.metaDescription" property="og:description"/>
							<b:else/>
							<meta expr:content="data:post.snippet" property="og:description"/>
							</b:if>
							<b:if cond="data:blog.postImageUrl">
							<meta expr:content="data:blog.postImageUrl" property="og:image"/>
							<b:else/>
							<b:if cond="data:blog.postImageThumbnailUrl">
							<meta expr:content="data:blog.postThumbnailUrl" property="og:image"/>
							<b:else/>
							<meta content="YOUR-BLOG-LOGO-IMAGE-URL-HERE" property="og:image"/>
							</b:if>
							</b:if>
							<b:if cond="data:blog.metaDescription">
							<meta expr:content="data:blog.metaDescription" property="og:description"/>
							<b:else/>
							<meta content="'.$title['one_liners'].'" property="og:description"/>
							</b:if>';
					}
				}
				else
				{
					  echo '<script type="text/javascript">';
					  echo 'window.location.href="events.php";';
					  echo '</script>';		  
				}				
			}
		}
		else{
				echo '<title>Events</title>';
			}
		?>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <meta name="description" content="">
        <?php include 'assets/static/head.php';?>
		<style>
		.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
			color: #555555;
			background-color: #fff;
			border: 2px solid #229a9a !important;
			border-bottom-color: transparent !important;
			cursor: default;
		}
		.nav-tabs > li > a, .nav-tabs > li > a:hover, .nav-tabs > li > a:focus {
			color: #555555;
			background-color: #fff;
			border-bottom:2px solid #229a9a!important;
			cursor: default;
		}	
	@media screen and (min-width: 10px) and (max-width: 388px){
		.xsfonts{
			font-size:120% !important;
		}
	}
			.btn-group-sm .btn-fab{
			  position: fixed !important;
			  right: 60px;
			}
			.btn-group .btn-fab{
			  position: fixed !important;
			  right: 20px;
			}
			#main{
			  bottom: 12px;
			  border-radius:46%;
			  border-color:silver;			  
			  background:#f0f0f0;
			  color:black;
			  box-shadow:3px 3px 3px #a0a0a0;
			  padding:12px 17px 12px 17px;
			  opacity:1.0;
			}
			#main:hover{
				background:white !important;
				border-color:grey !important;
			}
			@media screen and (max-width:650px)
			{
				#main > span{
					font-size:120% !important;
				}
			}									
		</style>
</head>
<body>
    <div class="fh5co-loader"></div>
    <div id="page">
        <?php include 'assets/static/nav.php';?>
        
        <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(assets/main/images/events.jpg);width: 120%;" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 text-left">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                                <h1 class="mb30 text-left">Events & Attractions</h1>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="fh5co-project">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-md-8 col-md-offset-2 text-left fh5co-heading  animate-box">
                        <h2 class="text-center">List of Events</h2>
                    </div>
                </div>
                <!-- EVENTS -->
         <!--        <div class="row">
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="assets/main/images/night.jpg" data-lightbox="gallery" data-title="THE CAPTION/DESCRIPTION" ><img src="assets/main/images/night.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="assets/main/images/lion.jpg" data-lightbox="gallery" ><img src="assets/main/images/lion.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="assets/main/images/hd.jpg" data-lightbox="gallery" ><img src="assets/main/images/hd.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
				</div>

				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href=assets/main/images/work-4.jpg" data-lightbox="gallery" ><img src=assets/main/images/work-4.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href=assets/main/images/work-5.jpg" data-lightbox="gallery" ><img src=assets/main/images/work-5.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href=assets/main/images/work-6.jpg" data-lightbox="gallery" ><img src=assets/main/images/work-6.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
				</div>

				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href=assets/main/images/work-1.jpg" data-lightbox="gallery" ><img src=assets/main/images/work-1.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href=assets/main/images/work-2.jpg" data-lightbox="gallery" ><img src=assets/main/images/work-2.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href=assets/main/images/work-3.jpg" data-lightbox="gallery" ><img src=assets/main/images/work-3.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
					</a>
				</div>

				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href=assets/main/images/work-4.jpg" data-lightbox="gallery" ><img src=assets/main/images/work-4.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href=assets/main/images/work-5.jpg" data-lightbox="gallery"><img src=assets/main/images/work-5.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href=assets/main/images/work-6.jpg" data-lightbox="gallery" ><img src=assets/main/images/work-6.jpg" class="img-responsive"/>
						<div class="fh5co-copy">
							<h3>Clipboard Office</h3>
							<p>Web Design</p>
						</div>
					</a>
				</div>


				<div class="col-md-12 text-center">
					<nav aria-label="Page navigation">
					  <ul class="pagination">
					    <li>
					      <a href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <li class="active"><a href="#">1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li><a href="#">4</a></li>
					    <li><a href="#">5</a></li>
					    <li>
					      <a href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
					</nav>
				</div>

			</div>-->
                <ul class="nav nav-tabs nav-justified containers" >
                    <li class="active col-sm-3" ><a  data-toggle="pill" href="#tech" style="font-weight:bold;font-size:19px;color:#229a9a;">Technical</a></li>
                    <li class="col-sm-3 "><a data-toggle="pill" href="#cult" style="font-weight:bold;font-size:19px;color:#229a9a;">Cultural</a></li>
                    <li class="col-sm-3"><a data-toggle="pill" href="#spt" style="font-weight:bold;font-size:19px;color:#229a9a;">Sports</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tech" class="tab-pane fade in active">

						<?php 
						$query="SELECT * FROM event WHERE category='T'";
						$query_run=$conn->query($query);
						$i=0;
						echo '<div class="row" style="margin-top:50px;  display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; flex-wrap: wrap;">';	
						while($qdata=$query_run->fetch_assoc())
						{
						?>
							<div class="card col-md-4 col-sm-6 fh5co-project text-center center-block" style="width: 35rem;margin:0px auto;  display: flex; flex-direction: column;">
							  <a href="admin/event/eventimg/<?php echo $qdata['id'];?>.jpg"  style="display:inline;" data-lightbox="gallery" data-title="<?php echo $qdata['descrip'];?>"><img class="card-img-top img-responsive" style="box-shadow:7px 7px 7px #111111;" src="admin/event/eventimg/<?php echo $qdata['id'];?>.jpg" alt="Card image cap"></a>
							  <div class="card-block">
								<h3 class="card-title" style="margin-top:20px;margin-bottom:7px;"><?php echo $qdata['title'];;?></h3>
								<p class="card-text" style="margin-bottom:5px;" id="overme"><?php echo $qdata['one_liners'];?></p>
								<button class="btn btn-primary" style="margin-bottom:20px;" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="window.location='#<?php echo $qdata['id'];?>'; modalfunc();">Details</button>
							  </div>
							</div>						
						<?php 
						}
						echo '</div>';														
						?>	
                        <!-- Row -->
                    </div>
                    <!-- CULTURAL -->
                    <div id="cult" class="tab-pane fade">				
						<?php 
						$query="SELECT * FROM event WHERE category='C'";
						$query_run=$conn->query($query);
						echo '<div class="row" style="margin-top:50px;  display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; flex-wrap: wrap;">';	
						while($qdata=$query_run->fetch_assoc())
						{
						?>
							<div class="card col-md-4 col-sm-6 fh5co-project text-center center-block" style="width:35rem;margin:0px auto;  display: flex; flex-direction: column;">
							  <a href="admin/event/eventimg/<?php echo $qdata['id'];?>.jpg"  style="display:inline;" data-lightbox="gallery" data-title="<?php echo $qdata['descrip'];?>"><img class="card-img-top img-responsive" style="box-shadow:7px 7px 7px #111111;" src="admin/event/eventimg/<?php echo $qdata['id'];?>.jpg" alt="Card image cap"></a>
							  <div class="card-block">
								<h3 class="card-title" style="margin-top:20px;margin-bottom:7px"><?php echo $qdata['title'];;?></h3>
								<p class="card-text" style="margin-bottom:5px;"><?php echo $qdata['one_liners'];?></p>
								<button class="btn btn-primary" style="margin-bottom:20px;" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="window.location='#<?php echo $qdata['id'];?>'; modalfunc();">Details</button>
							  </div>
							</div>
						<?php 
						}
						echo '</div>';						
						?>
                        <!-- Row -->
                    </div>
                    <!-- SPORTS -->
                    <div id="spt" class="tab-pane fade">
						<?php 
						$query="SELECT * FROM event WHERE category='S'";
						$query_run=$conn->query($query);
						$i=0;
						echo '<div class="row" style="margin-top:50px;  display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; flex-wrap: wrap;">';	
						while($qdata=$query_run->fetch_assoc())
						{
						?>
							<div class="card col-md-4 col-sm-6 fh5co-project text-center center-block" style="width:35rem;margin:0 auto;   display: flex; flex-direction: column;">
							  <a href="admin/event/eventimg/<?php echo $qdata['id'];?>.jpg"  style="display:inline;" data-lightbox="gallery" data-title="<?php echo $qdata['descrip'];?>"><img class="card-img-top img-responsive" style="box-shadow:7px 7px 7px #111111;" src="admin/event/eventimg/<?php echo $qdata['id'];?>.jpg" alt="Card image cap"></a>
							  <div class="card-block">
								<h3 class="card-title" style="margin-top:20px;margin-bottom:7px;"><?php echo $qdata['title'];;?></h3>
								<p class="card-text" style="margin-bottom:5px;"><?php echo $qdata['one_liners'];?></p>
								<button class="btn btn-primary" style="margin-bottom:20px;" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="window.location='#<?php echo $qdata['id'];?>'; modalfunc();">Details</button>
							  </div>
							</div>
						<?php 
						}
						?>
                        </div>
                        <!-- Row 
                        <div class="col-md-12 text-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->
                    </div>
				</div>
                </div>
            </div>
        </div>
     <?php include 'assets/static/footer.php';?>
    </div>

	<!-- <div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>	 -->		    
    <div class="modal fade bd-example-modal-lg" id="evtmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg1">	  
			<div class="modal-content">			
			<?php 
				  echo '<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title" id="response">'.$qdata['title'].'</h3>
				  </div>';	  
				  echo '<div class="modal-body xsfonts"  style="font-size:140%;">
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
		window.onload = function() {
			loadmodal();
		};		
		function loadmodal()
		{
			//var url=location.hash;
			var query = window.location.search.substring(1);
			var pair = query.split("=");
			var url=pair[1];
			//alert(url);
			//url=url.replace('#','');
			if(url)
			{
				var xmlhttp=new XMLHttpRequest();
				$('#evtmodal').modal('show');
				//var filterurl=url.replace(/ /g,"_").toLowerCase();		
				xmlhttp.open("GET","getevt.php?id="+url,false);
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
		}
		
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
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md-12">
	      <div class="btn-group">
	        <a href="schedule.php" class="btn btn-success btn-fab" id="main">
				<span class="glyphicon glyphicon-calendar" style="font-size:150%;"></span>
	        </a>
	      </div>
	    </div>
	  </div>
	</div>				
		<?php include 'assets/static/scripts.php'; ?>
    </body>
		
</html>
