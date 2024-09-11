<?php
session_start();
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
        
        <!-- title of site -->
        <title>Directory Landing Page</title>

        <!-- For favicon png -->
		<link rel="icon" type="image/png" href="template/AdminTemplate/assets/img/favicon.png">
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

		<!--flaticon.css-->
        <link rel="stylesheet" href="assets/css/flaticon.css">

		<!--slick.css-->
        <link rel="stylesheet" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/slick-theme.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
		

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
								Cloud Based Real Time Sports Tallying
							</li>
						</ul>
					</div>
				</li>
				<li class="head-responsive-right pull-right">
					<div class="header-top-right">
						<ul>
						
							<li class="header-top-contact">
								<a href="loadToLogin.php">sign in</a>
							</li>
							<li class="header-top-contact">
								<a href="loadToRegister.php">register</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
					
		</header><!--/.header-top-->
		<!--header-top end -->
		<!-- new new -->
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
			                <a class="navbar-brand" href="index.html">Panagtigi<span>Webpage</span></a>

			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                    <li class=" scroll active"><a href="#home">home</a></li>
			                    <li class="scroll"><a href="#works">Panagtigi</a></li>
			                   
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
				<div class="welcome-hero-txt" style = "color: orange;">
				<h2 >Discover the Ultimate Sport Tallying System <br> for All Your Needs</h2> <br><br><br><p> Find the best tools, apps, and solutions for tracking sports scores, stats, and performance in just one click. Whether you're managing a team or analyzing game data, our comprehensive sport tallying system has you covered. </p>
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
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
								<i class="fa fa-calendar" style = "font-size: 50px;"></i>

								</div>
								<h2><a href="#">Events</a></h2>
								<p><?php
										$selectEvents = "SELECT * FROM events";
										$queryEvents = mysqli_query($conn,$selectEvents);
										$event_count = 0;
										while($resultEvents = mysqli_fetch_assoc($queryEvents)){
												$event_count++;
										}
										echo $event_count;
								?></p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
								<i class="fa fa-gamepad" style = "font-size: 50px;"></i>
								</div>
								<h2><a href="#">Game Matches</a></h2>
								<p><?php
										$selectMatches = "SELECT * FROM game_matches";
										$queryMatches = mysqli_query($conn,$selectMatches);
										$matches_count = 0;
										while($resultMatches = mysqli_fetch_assoc($queryMatches)){
												$matches_count++;
										}
										echo $matches_count;
								?></p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
								<i class="fa fa-list" style = "font-size: 50px;"></i>
								</div>
								<h2><a href="#">Players</a></h2>
								<p><?php
										$selectPlayers = "SELECT * FROM players";
										$queryPlayers = mysqli_query($conn,$selectPlayers);
										$players_count = 0;
										while($resultPlayers = mysqli_fetch_assoc($queryPlayers)){
												$players_count++;
										}
										echo $players_count;
								?></p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
								<i class="fa fa-users"  style = "font-size: 50px;"></i>
								</div>
								<h2><a href="#">Event Coordinator</a></h2>
								<p><?php
										$selectAccounts = "SELECT * FROM accounts";
										$queryAccounts = mysqli_query($conn,$selectAccounts);
										$accounts_count = 0;
										while($resultAccounts = mysqli_fetch_assoc($queryAccounts)){
												$accounts_count++;
										}
										echo $accounts_count;
								?></p>
							</div>
						</li>
						
					</ul>
				</div>
			</div><!--/.container-->

		</section><!--/.list-topics-->

		<style>
			/* Base styles for the list-topics */
.list-topics {
    padding: 20px 0; /* Add padding for spacing */
}

.list-topics-content ul {
    list-style: none; /* Remove default list styling */
    padding: 0; /* Remove default padding */
    margin: 0; /* Remove default margin */
    display: flex; /* Use flexbox for alignment */
    flex-wrap: wrap; /* Allow items to wrap */
    justify-content: space-around; /* Space items evenly */
}

.single-list-topics-content {
    text-align: center; /* Center text within each item */
    margin: 20px; /* Add margin around each item */
}

.single-list-topics-icon {
    margin-bottom: 10px; /* Space between icon and text */
}

/* Responsive styles for mobile view */
@media (max-width: 768px) {
    .list-topics-content ul {
        display: flex; /* Ensure flexbox is used */
        flex-direction: column; /* Stack items vertically */
        align-items: center; /* Center items horizontally */
        justify-content: center; /* Center items vertically */
    }

    .single-list-topics-content {
        margin: 10px 0; /* Adjust margin for vertical stacking */
    }
}

		</style>
		<!--list-topics end-->

		<!--works start -->
		<section id="works" class="works">
			<div class="container">
				<div class="section-header">
					<h2>Panagtigi List</h2>
					<p>Click check taly for medal infomatiom!</p>
				</div><!--/.section-header-->
				<div class="works-content">
					<div class="row">

					<?php 
							$selectAllEvents = "SELECT * FROM events";
							$queryEvents = mysqli_query($conn,$selectAllEvents);

							while($getEvents = mysqli_fetch_assoc($queryEvents)){

							
					?>
					
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-lightbulb-idea"></i>
								</div>
								<h2><a href="#"><?php echo $getEvents['event_name']; ?></a></h2>
								<p>
								For additional information
								</p>
								<a href="tallyBoard.php?event_id=<?php echo $getEvents['id']; ?>" class="welcome-hero-btn how-work-btn" style="display: inline-block; text-align: center; line-height: 34px;">Check Tally</a>

							</div>
						</div>

						<?php  } ?>
						
						


					</div>
				</div>
			</div><!--/.container-->
		
		</section><!--/.works-->
		<!--works end -->

	

	
		<!-- statistics strat -->
		

	

		

		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="footer-menu">
		           	<div class="row">
			           	<div class="col-sm-3">
			           		 <div class="navbar-header">
				                <a class="navbar-brand" href="index.html">Sports<span>Day</span></a>
				            </div><!--/.navbar-header-->
			           	</div>
			           	<div class="col-sm-9">
			           		<ul class="footer-menu-item">
			                  
			                </ul><!--/.nav -->
			           	</div>
		           </div>
				</div>
				<div class="hm-footer-copyright">
					<div class="row">
						<div class="col-sm-5">
							
						</div>
						<div class="col-sm-7">
							<div class="footer-social">
			
							</div>
						</div>
					</div>
					
				</div><!--/.hm-footer-copyright-->
			</div><!--/.container-->

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