<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Team</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<?php include 'assets/static/head.php' ;?>

		<!-- TEAM -->
		<meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Gamma Gallery - A Responsive Image Gallery Experiment"/>
        <meta name="keywords" content="html5, responsive, image gallery, masonry, picture, images, sizes, fluid, history api, visibility api"/>
        <meta name="author" content="Codrops"/>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="GammaGallery/css/style.css"/>
		<script src="GammaGallery/js/modernizr.custom.70736.js"></script>
		<noscript><link rel="stylesheet" type="text/css" href="GammaGallery/css/noJS.css"/></noscript>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style type="text/css">
			h1{
				
				color: white;
				/*position: relative;*/
				visibility: inherit;
			}
		</style>
    </head>
    <body>
    <?php include 'assets/static/nav.php';?>

	<div class="row"><header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(img/back.png); width:130%;" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-7 text-left">
							<div class="display-t">
								<div class="display-tc animate-box" data-animate-effect="fadeInUp">
									<h1 class="mb30">Our Team</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header></div>
        <div class="container imgGallery">	
			<div class="main">
				
				<div class="gamma-container gamma-loading" id="gamma-container">

					<ul class="gamma-gallery">

						<li>
							<div data-alt="img03" data-description="<h3>Editorial</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="img/edi.jpg"></div>
								<noscript>
									<img src="img/edi.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Logistics</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="img/logs.jpg"></div>
								<noscript>
									<img src="img/logs.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>OTH</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="img/oc.jpg"></div>
								<noscript>
									<img src="img/oc.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Creatives</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="img/creative.jpg"></div>
								<noscript>
									<img src="img/creative.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>core</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="img/core.jpg"></div>
								<noscript>
									<img src="img/core.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						<li>
							<div data-alt="img03" data-description="<h3>Infotech</h3>" data-max-width="1800" data-max-height="1350">
								
								<div data-src="img/info.jpg"></div>
								<noscript>
									<img src="img/info.jpg" alt="img03"/>
								</noscript>
							</div>
						</li>
						
					</ul>

					<div class="gamma-overlay"></div>

					

				</div>

			</div><!--/main-->
		</div>
		<?php include 'assets/static/footer.php';?>
	
	<!-- <div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div> -->
	
	<?php include 'assets/static/scripts.php'; ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="GammaGallery/js/jquery.masonry.min.js"></script>
		<script src="GammaGallery/js/jquery.history.js"></script>
		<script src="GammaGallery/js/js-url.min.js"></script>
		<script src="GammaGallery/js/jquerypp.custom.js"></script>
		<script src="GammaGallery/js/gamma.js"></script>
		<script type="text/javascript">
			
			$(function() {

				var GammaSettings = {
						// order is important!
						viewport : [ {
							width : 1200,
							columns : 5
						}, {
							width : 900,
							columns : 4
						}, {
							width : 500,
							columns : 3
						}, { 
							width : 320,
							columns : 2
						}, { 
							width : 0,
							columns : 2
						} ]
				};

				Gamma.init( GammaSettings, fncallback );


				// Example how to add more items (just a dummy):

				// var page = 0,
				// 	items = ['<li><div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Sky high</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li>']

				function fncallback() {

					$( '#loadmore' ).show().on( 'click', function() {

						++page;
						var newitems = items[page-1]
						if( page <= 1 ) {
							
							Gamma.add( $( newitems ) );

						}
						if( page === 1 ) {

							$( this ).remove();

						}

					} );

				}

			});

		</script>	
	</body>
</html>
