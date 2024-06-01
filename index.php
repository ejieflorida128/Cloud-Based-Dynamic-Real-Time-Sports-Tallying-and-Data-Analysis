<?php
	include('connection/conn.php');
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


        <!-- title of site -->
        <title>Realtime Event Landing Page</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="template/landing_page/assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="template/landing_page/assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="template/landing_page/assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="template/landing_page/assets/css/animate.css">

		<!--flaticon.css-->
        <link rel="stylesheet" href="template/landing_page/assets/css/flaticon.css">

		<!--slick.css-->
        <link rel="stylesheet" href="template/landing_page/assets/css/slick.css">
		<link rel="stylesheet" href="template/landing_page/assets/css/slick-theme.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="template/landing_page/assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="template/landing_page/assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="template/landing_page/assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="template/landing_page/assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		
		<!--header-top start -->
		<header id="header-top" class="header-top">
			<ul>
				<li>
					<div class="header-top-left">
						<ul>
							<li class="select-opt">
								<select name="language" id="language" hidden>
									<option value="default">EN</option>
									<option value="Bangla">BN</option>
									<option value="Arabic">AB</option>
								</select>
							</li>
							<li class="select-opt">
								<select name="currency" id="currency" hidden>
									<option value="usd">USD</option>
									<option value="euro">Euro</option>
									<option value="bdt">BDT</option>
								</select>
							</li>
							<li class="select-opt">
								<a href="#"><span class="lnr lnr-magnifier" hidden></span></a>
							</li>
						</ul>
					</div>
				</li>
				<li class="head-responsive-right pull-right">
					<div class="header-top-right">
						<ul>
							<li class="header-top-contact">
								Landing Page
							</li>
							<li class="header-top-contact">
								<a href="#">sign in</a>
							</li>
							<li class="header-top-contact">
								<a href="#">register</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
					
		</header><!--/.header-top-->
		<!--header-top end -->

		<!-- top-area Start -->
		<section class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand" href="index.html">Realtime Event <span>Management</span></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                    <li class=" scroll active"><a href="#home">Event List</a></li>
			                    <li class="scroll"><a href="#contact">contact</a></li>
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->
		    <div class="clearfix"></div>

		</section><!-- /.top-area-->
		<!-- top-area End -->

		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">
			<div class="container">
				<div class="welcome-hero-txt">
					<h2>Find and Explore Realtime Event  <br> Communities and Forums </h2>
					<p>
                    Immerse yourself in the ultimate sports experience with just one click!
					</p>
				</div>
				<div class="welcome-hero-serch-box">
					<div class="welcome-hero-form">
						<div class="single-welcome-hero-form">
							<h3>Date:</h3>
							<form action="">
								<input type="text" placeholder="Ex: Date  of an Event to search" style = "width: 100vw;"/>
							</form>
							
						</div>
						
					</div>
					<div class="welcome-hero-serch">
						<button class="welcome-hero-btn">
							 search  <i data-feather="search"></i> 
						</button>
					</div>
				</div>
			</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--list-topics start -->
		<section id="list-topics" class="list-topics">
			<div class="container">
				<div class="list-topics-content">
					<ul>
						<li>
							<div class="single-list-topics-content" style = " box-shadow: 0 4px 8px rgba(0, 0, 0, 3);">
								<div class="single-list-topics-icon">
									<i class='bx bx-calendar-event' style = "font-size: 43px;"></i>
								</div>
								<h2><a href="#">Events</a></h2>
								<p>count: 150</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content" style = " box-shadow: 0 4px 8px rgba(0, 0, 0, 3);">
								<div class="single-list-topics-icon">
                                <i class='bx bx-user' style = "font-size: 43px;"></i>
								</div>
								<h2><a href="#">Admins</a></h2>
								<p>count: 20</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content" style = " box-shadow: 0 4px 8px rgba(0, 0, 0, 3);">
								<div class="single-list-topics-icon">
                                <i class='bx bx-check-square' style = "font-size: 43px;"></i>
								</div>
								<h2><a href="#" >Event finished</a></h2>
								<p>count: 98</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content" style = " box-shadow: 0 4px 8px rgba(0, 0, 0, 3);">
								<div class="single-list-topics-icon">
                                <i class='bx bx-hive' style = "font-size: 43px; "></i>
								</div>
								<h2><a href="#">Event in session</a></h2>
								<p>count: 52</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content" style = " box-shadow: 0 4px 8px rgba(0, 0, 0, 3);">
								<div class="single-list-topics-icon">
                                <i class='bx bxs-report' style = "font-size: 43px;"></i>
								</div>
								<h2><a href="#">Reports</a></h2>
								<p>count: 36</p>
							</div>
						</li>
					</ul>
				</div>
			</div><!--/.container-->

		</section><!--/.list-topics-->
		<!--list-topics end-->

		<!--works start -->
		<section id="works" class="works">
			<div class="container">
				<div class="section-header">
					<h2>how it works</h2>
					<p>Learn More about how our Realtime Event Management Website works</p>
				</div><!--/.section-header-->
				<div class="works-content">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-lightbulb-idea"></i>
								</div>
								<h2><a href="#">choose <span> your next</span> adventure</a></h2>
								<p>
								Embark on an adventure by exploring thrilling sports events worldwide, discovering new venues, live competitions, and diverse cultures.

								</p>
								<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
									read more
								</button>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-networking"></i>
								</div>
								<h2><a href="#">find <span> what event you like</span></a></h2>
								<p>
								Find your passion by exploring sports events worldwide, from sports to extreme sports without difficulties to encounter.
								</p>
								<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
									read more
								</button>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-location-on-road"></i>
								</div>
								<h2><a href="#">explore <span> informative</span> event list</a></h2>
								<p>
								Explore global events: tech conferences, workshops, and cultural festivals offer insights, connections, and inspiration for growth.
								</p>
								<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
									read more
								</button>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->
		
		</section><!--/.works-->
		<!--works end -->

		<!--explore start -->
		<section id="explore" class="explore">
			<div class="container">
				<div class="section-header">
					<h2>Event List</h2>
					<p>
Discover global sports events showcasing new venues, thrilling competitions, diverse cultures, and more</p>
				</div><!--/.section-header-->
				<div class="explore-content">
					<div class="row">
						<!-- start sa usa ka box -->
								<?php

										$allEvents = "SELECT * FROM events";

										$result = mysqli_query($conn,$allEvents);
										while($test = mysqli_fetch_assoc($result)){

											$image = $test['image'];
											$t1 = $test['teamOne'];
											$t2 = $test['teamTwo'];
											$date = $test['date'];
											$g_type = $test['game_type'];
											$location = $test['location'];

											if($test['status'] == 'completed'){
												$status = '<p style = "color: green;">Match Concluded</p>';
											}else{
												$status = '<p style = "color: orange;" >Currently Underway</p>';
											}


											echo "
											<div class='col-md-4 col-sm-6' >
											<div class='single-explore-item' style = 'height: 500px;'>
												<div class='single-explore-img'>
													<img src='$image' alt='explore image' style = 'width: 100%; height: 210px;'>
													<div class='single-explore-img-info'>
														<button onclick='window.location.href='#''>best rated</button>
														<div class='single-explore-image-icon-box'>
															<ul>
																<li>
																	<div class='single-explore-image-icon'>
																		<i class='fa fa-arrows-alt'></i>
																	</div>
																</li>
																<li>
																	<div class='single-explore-image-icon'>
																		<i class='fa fa-bookmark-o'></i>
																	</div>
																</li>
															</ul>
														</div>
													</div>
												</div>
												<div class='single-explore-txt bg-theme-1'>
													<h4 style = 'display: flex; justify-content: center;'><a href='#' style ='font-size: 10px;'>$t1 <span style = 'color: orange; font-size: 15px;'>VS</span>  $t2</a></h4>
													<br>
													<div class='explore-person'>
														<div class='row'>
															<div class='col-sm-2'>
																<div class='explore-person-img'>
																	<a href='#'>
																		<img src='template/landing_page/assets/images/explore/person.png' alt='explore person'>
																	</a>
																</div>
															</div>
															<div class='col-sm-10'>
																<p>
																The thrilling $g_type match, held on $date, at the picturesque court in $location, showcased the intense rivalry between the two teams in the event.
																</p>
															</div>
														</div>
														
													</div>
													<div class='explore-open-close-part' style = 'position: absolute; top: 420px;'>
														<div class='row'>
															<div class='col-sm-5' style = 'width: 300px;'>
																$status
														
															</div>
															<div class='col-sm-7'>
																<div class='explore-map-icon'>
																	<a href='#'><i data-feather='map-pin'></i></a>
																	<a href='#'><i data-feather='upload'></i></a>
																	<a href='#'><i data-feather='heart'></i></a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
											";
										}

								?>
						<!-- end sa usa ka box -->
						
						
						
						
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.explore-->
		<!--explore end -->

		<footer>

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-->
		<!--footer end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

        <!--feather.min.js-->
        <script  src="assets/js/feather.min.js"></script>

        <!-- counter js -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>

        <!--slick.min.js-->
        <script src="assets/js/slick.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		     
        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        
    </body>
	
</html>