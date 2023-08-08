<?php 
	include ('header.php');
	include ('link.html');
	require_once "connection.php" ;
	$conn = connect();
?>
<head>
	
	<link href="assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="assets/plugins/owl-carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owl-carousel/dist/assets/owl.theme.default.min.css">

    <!-- CSS Global -->
    <!--build:css assets/css/theme.min.css-->
    <link rel="stylesheet" href="assets/css/theme.css">
	
</head>
    <!-- CONTENT
      ================================================== -->
 <body id="about__page">

		<!-- Modal
    ================================================== -->
	 
    <section class="section__home" id="section__home">
    	<div class="container">
    		<div class="row">
  	    	<div class="col-sm-12">
  	    		<div class="welcome__content">
							<h2 class="welcome_content__title">About us</h2>
	  					<p class="welcome_content__desc">The Patel  Hotel   at Maldives.</p>
		  			</div> <!-- .welcome__content -->
    	    </div>
	    	</div> <!-- / .row -->
    	</div> <!-- / .container -->
			<div class="home__bg"></div>
    </section> <!-- / .section__home -->
	   
	<!-- section about -->
    <section class="section__about">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-12"> 		  	
    				<h2 class="section__title">Welcome to <strong>The Patel Hotel</strong></h2>
    				<div class="divider">
    					<hr class="line1">
    					<hr class="line2">
    					<hr class="line1">
    				</div> <!-- / .divider -->
    			</div>
    		</div> <!-- / .row -->
    	</div> <!-- / .container -->
    	<div class="container">
    		<div class="row">
		    	<div class="section_about__content">
		    	  <div class="col-md-6">
		    	  	<div class="about__pic">
		    				<img src="assets\img\about_img.jpg" class="img-responsive" alt="..." >
		    			</div> <!-- / .about__pic -->
		    	  </div>
		    	  <div class="col-md-6">
			    	  <div class="about__desc">
			  				<h3 class="about_desc__title">Probably the best place to enjoy your life</h3>
								<p class="about_desc__desc">
At The patel, our passion is to connect our guest to the very best of our destination. From the foot hills of sakha to the Temple and the wavy beach to enjoy romantic views.


Our hotel offers guests extraordinary places created by combining unique architecture and structure. At great service, and the result is an unforgetable guest experience.

<br>
While we aim to give you an authentic experience of the local whenever you stay with us, we also guarentee consistant high standard throughout our collection of hotel.
								</p>
			  			</div> <!-- / .about__desc -->
		    	  </div>
		    	</div> <!-- / .section_about__content -->
		    </div> <!-- / .row -->
    	</div> <!-- / .container -->
    </section> <!-- / .section__about -->

		<!-- section data -->
    <section class="section__data">
    	<div class="container">
		    <div class="row">
					<div class="col-xs-12 col-sm-3">
						<div class="section-data__item">
							<p class="section-data__nbr">1024</p>
							<h2 class="section-data__title">Guests stay</h2>
						</div> <!-- .section-data__item -->
					</div>
					<div class="col-xs-12 col-sm-3">
						<div class="section-data__item">
							<p class="section-data__nbr">245</p>
							<h2 class="section-data__title">Rooms</h2>
						</div> <!-- .section-data__item -->
					</div>
					<div class="col-xs-12 col-sm-3">
						<div class="section-data__item">
							<p class="section-data__nbr">37</p>
							<h2 class="section-data__title">Awards</h2>
						</div> <!-- .section-data__item -->
					</div>
					<div class="col-xs-12 col-sm-3">
						<div class="section-data__item">
							<p class="section-data__nbr">3700</p>
							<h2 class="section-data__title">Meal served</h2>
						</div> <!-- .section-data__item -->
					</div>
		    </div> <!-- / .row -->
	    </div> <!-- / .container -->
    </section> <!-- / .section__data -->

    <!-- section services -->
    <section class="section__services">
    	<div class="container">
		    <div class="row">
					<div class="col-sm-5">
						<h2 class="section__title services__title">Our <strong>Services</strong></h2>
						<p class="services__text">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc.</p>
						<div class="services__img">
							<a href="#services__modal" data-toggle="modal">
								<img src="assets/img/about_services.jpg" class="img-responsive" alt="...">	
							</a>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="row">
							<div class="col-sm-6">
								<div class="services__item">
									<div class="services_item__logo">
										<i class="icon ion-model-s"></i>
									</div>
									<div class="services_item__title">
										<h3>Parking</h3>
									</div>
									<div class="services_item__desc">
									 Amazing large parking to for all the vehicals easily. alternate car parking with high end security makes your vehicles safe and secured. 
									</div>
								</div> <!-- .services__item -->
							</div>
							  <div class="col-sm-6">
							  	<div class="services__item">
										<div class="services_item__logo">
											<i class="icon ion-android-bicycle"></i>
										</div>
										<div class="services_item__title">
											<h3>Fitness Hall</h3>
										</div>
										<div class="services_item__desc">
											Keeping up with your fitness regime during your holiday is simple at our Fitness. Discover a state-of-the-art fitness centre that is the only one of its kind in maldives.
										</div>
									</div> <!-- .services__item -->
							  </div>
						</div> <!-- .row -->
						<div class="row">
						  <div class="col-sm-6">
						  	<div class="services__item">
									<div class="services_item__logo">
										<i class="icon ion-android-restaurant"></i>
									</div>
									<div class="services_item__title">
										<h3>Restaurant</h3>
									</div>
									<div class="services_item__desc">
										We are proud to present a wealth of options when it comes to fine Asian Dining, including the world famous Nobu known for it's amazing Sushi and Japanese Cuisine. nominated the 2015 best Asian restaurant in maldives.
									</div>
								</div> <!-- .services__item -->
						  </div>
						  <div class="col-sm-6">
						  	<div class="services__item">
									<div class="services_item__logo">
										<i class="icon ion-android-sunny"></i>
									</div>
									<div class="services_item__title">
										<h3>Party & Weddding Event</h3>
									</div>
									<div class="services_item__desc">
										With a huge variety of boardrooms, conference halls and outdoor venues to choose from, the location and theme for your next function is limited only by your imagination.
									</div>
								</div> <!-- .services__item -->
							</div>  
						</div> <!-- / .row -->
					</div>
		    </div> <!-- / .row -->
	    </div> <!-- / .container -->
    </section> <!-- / .section__services -->

    
   <!-- section quote -->
    <section class="section__quote">
    	

			<iframe src="https://www.google.com/maps/embed?pb=!4v1534105204756!6m8!1m7!1sCAoSLEFGMVFpcE54UlRsdmdrTzUzaWVpN1c4X2Y0V2RFWVFmNnEteG95Z2tfZ3dL!2m2!1d0.5856856!2d73.0931708!3f217.92907939265012!4f-5.721835347362656!5f0.7820865974627469" width="100%" height="650" frameborder="0" style="border:0" allowfullscreen></iframe>
		    
	    
    </section> <!-- / .section__quote -->
   <?php 

    include 'footer.html';
    ?>

  </body>

<!-- Mirrored from gamin.simpleqode.com/Sunset/1.0.2/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2017 12:30:40 GMT -->
</html>