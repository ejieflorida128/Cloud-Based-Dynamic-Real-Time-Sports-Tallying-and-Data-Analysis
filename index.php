<?php
session_start();
session_destroy();
session_start();
include('connection/conn.php');

$_SESSION['logged_in'] = false;

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- title of site -->
        <title>SLSU Realtime Sport Tallying System</title>

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
								<li class=" scroll"><a href="#matches">Matches</a></li>
								<li class=" scroll"><a href="#panagtigiModels">Mr and Ms Panagtigi 2024</a></li>
								<li class=" scroll"><a href="#Light">The Light Publication</a></li>
			                   
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
										$selectAccounts = "SELECT * FROM accounts WHERE status = 'approved'";
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
	<!<!--works start -->
<section id="panagtigiModels" class="panagtigiModels">
    <div class="container">
        <div class="section-header">
            <h2 style="color: orange; font-weight: bolder; font-size: 3rem;">Mr. and Ms. Panagtigi 2024</h2>
            <p style="font-size: 1.5rem;">Get ready to be dazzled by the stunning and dashing candidates of Mr. and Ms. Panagtigi 2024! Prepare to witness elegance, charm, and beauty like never before!</p>
        </div><!--/.section-header-->
        <div class="works-content">
            <div class="row winners justify-content-center">
                <div class="col-md-6 col-sm-12 text-center MrWinner">
				<img src="candidate/valiantBoy.jpg" class="img-fluid" style="width: 200px; height: 200px; border: 2px solid gold; border-radius: 50%;" alt="Mr. Panagtigi">
					<h2 style = "color: grey; font-weight: bolder; margin-top: 7px;">Mr. Panagtigi 2024</h2>
					<p>Mr. Justine Joe Balbon</p>

                </div>
                <div class="col-md-6 col-sm-12 text-center MsWinner">
				<img src="candidate/azureGirl.jpg" class="img-fluid" style="width: 200px; height: 200px; border: 2px solid gold; border-radius: 50%;" alt="Ms. Panagtigi">
					<h2 style = "color: grey; font-weight: bolder; margin-top: 7px;">Ms. Panagtigi 2024</h2>
					<h4 style = "color: grey; font-weight: bolder;"></h4>
					<p>Ms. Tracy Marie Handog</p>
                </div>
            </div>
			<?php
$winners = [
    ['position' => '1st Runners-Up', 'gender' => 'Mr', 'team' => 'Mr. Shawn Esguerra', 'img' => 'candidate/blazingBoy.jpg'],
    ['position' => '1st Runners-Up', 'gender' => 'Ms', 'team' => 'Ms. Rhea Galang', 'img' => 'candidate/valiantGirl.jpg'],
    ['position' => '2nd Runners-Up', 'gender' => 'Mr', 'team' => 'Mr. Bhenjie Amparo', 'img' => 'candidate/cyberBoy.jpg'],
    ['position' => '2nd Runners-Up', 'gender' => 'Ms', 'team' => 'Ms. Joanna Espanola', 'img' => 'candidate/blazingGirl.jpg'],
    ['position' => '3rd Runners-Up', 'gender' => 'Mr', 'team' => 'Mr. Nel Vincent Aves', 'img' => 'candidate/azureBoy.jpg'],
    ['position' => '3rd Runners-Up', 'gender' => 'Ms', 'team' => 'Ms. Norabeth Beceril', 'img' => 'candidate/cyberGirl.jpg'],
];
?>

<div class="row winners text-center" style="margin-top: 20px;">
    <?php foreach ($winners as $winner): ?>
        <div class="col-lg-2 col-md-4 col-sm-6 text-center <?= $winner['gender'] ?>Winner">
            <img src="<?= $winner['img'] ?>" class="img-fluid" style="width: 200px; height: 200px; border: 2px solid gold; border-radius: 50%;" alt="<?= $winner['gender'] ?> Panagtigi">
            <h2 style="color: grey; font-weight: bolder; margin-top: 7px;"><?= $winner['position'] ?></h2>
            <p><?= $winner['team'] ?></p>
        </div>
    <?php endforeach; ?>
</div>
<div class="title2" style="text-align: center; font-size: 50px; font-weight: bolder; color: orange; margin-top: 20px; margin-bottom: 30px;">
    Special Awards
</div>

<style>
    .title2 {
        font-size: 50px;
    }

    /* Adjust the font size for mobile devices */
    @media (max-width: 768px) {
        .title2 {
            font-size: 35px; /* Smaller font size for tablets */
        }
    }

    @media (max-width: 576px) {
        .title2 {
            font-size: 25px; /* Smaller font size for mobile */
        }
    }
</style>


<?php
$winners = [
   
    ['position' => 'Mr. Photogenic', 'gender' => 'Mr', 'team' => 'Mr. Bhenjie Amparo', 'img' => 'candidate/cyberBoy.jpg'],
    ['position' => 'Ms. Photogenic', 'gender' => 'Ms', 'team' => 'Ms. Tracy Marie Handog', 'img' => 'candidate/azureGirl.jpg'],
    ['position' => 'Mr. Social Media', 'gender' => 'Mr', 'team' => 'Mr. Nel Vincent Aves', 'img' => 'candidate/azureBoy.jpg'],
    ['position' => 'Ms. Social Media', 'gender' => 'Ms', 'team' => 'Ms. Tracy Marie Handog', 'img' => 'candidate/azureGirl.jpg'],
    ['position' => 'Mr. Skeen Life', 'gender' => 'Mr', 'team' => 'Mr. Shawn Esguerra', 'img' => 'candidate/blazingBoy.jpg'],
    ['position' => 'Ms. Skeen Life', 'gender' => 'Ms', 'team' => 'Ms. Joanna Espanola', 'img' => 'candidate/blazingGirl.jpg'],
    ['position' => 'Mr. Congeniality', 'gender' => 'Mr', 'team' => 'Mr. Justine Joe Balbon', 'img' => 'candidate/valiantBoy.jpg'],
    ['position' => 'Ms. Congeniality', 'gender' => 'Ms', 'team' => 'Ms. Tracy Marie Handog', 'img' => 'candidate/azureGirl.jpg'],
	['position' => 'Best in Production No.', 'gender' => 'Mr', 'team' => 'Mr. Shawn Esguerra', 'img' => 'candidate/blazingBoy.jpg'],
    ['position' => 'Best in Production No.', 'gender' => 'Ms', 'team' => 'Ms. Joanna Espanola', 'img' => 'candidate/blazingGirl.jpg'],
    ['position' => 'Best in Sport Wear', 'gender' => 'Mr', 'team' => 'Mr. Bhenjie Amparo', 'img' => 'candidate/cyberBoy.jpg'],
    ['position' => 'Best in Sport Wear', 'gender' => 'Ms', 'team' => 'Ms. Norabeth Beceril', 'img' => 'candidate/cyberGirl.jpg'],
    ['position' => 'Best in Modern Terno', 'gender' => 'Mr', 'team' => 'Mr. Shawn Esguerra', 'img' => 'candidate/blazingBoy.jpg'],
    ['position' => 'Best in Modern Terno', 'gender' => 'Ms', 'team' => 'Ms. Tracy Marie Handog', 'img' => 'candidate/azureGirl.jpg'],
];
?>

<div class="row winners text-center" style="margin-top: 20px;">
    <?php foreach ($winners as $winner): ?>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 text-center <?= $winner['gender'] ?>Winner" style="margin-bottom: 15px;">
            <img src="<?= $winner['img'] ?>" class="img-fluid" style="width: 200px; height: 200px; border: 2px solid gold; border-radius: 50%;" alt="<?= $winner['gender'] ?> Panagtigi">
            <h4 style="color: grey; font-weight: bold; margin-top: 5px; font-size: 14px;"><?= $winner['position'] ?></h4>
            <p style="font-size: 12px;"><?= $winner['team'] ?></p>
        </div>
    <?php endforeach; ?>
</div>


					
					
		
						</div>
					</div><!--/.container-->
				</section><!--/.works-->


		
		<!--works end -->


		<!--works end -->

		<!--works start -->
		<section id="works" class="works" style = "margin-top: 40px;">
			<div class="container">
				<div class="section-header">
					<h2 style = "color: orange; font-weight: bolder;">Panagtigi List</h2>
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


		<!--works start -->
		<section id="matches" class="matches">
			<div class="container">
				<div class="section-header">
					<h2 style = "color: orange; font-weight: bolder;">Game Matches</h2>
					<p>Click the Events below to show information!</p>
				</div><!--/.section-header-->
				<div class="works-content">
					<div class="row">

					<?php 
							$selectAllEvents = "SELECT * FROM registered_game WHERE status = 'submitted'";
							$queryEvents = mysqli_query($conn,$selectAllEvents);

							while($getEvents = mysqli_fetch_assoc($queryEvents)){


									if($getEvents['game_type'] == 'Creative_Folk_Dance' || $getEvents['game_type'] == 'Pop_Dance' || $getEvents['game_type'] == 'Vocal_Duet' || $getEvents['game_type'] == 'Pop_Solo' || $getEvents['game_type'] == 'Charcoal_Rendering' || $getEvents['game_type'] == 'Pencil_Drawing' || $getEvents['game_type'] == 'Painting' || $getEvents['game_type'] == 'Poster_Making' ||$getEvents['game_type'] == 'Phone_Photography' || $getEvents['game_type'] == 'Mass_Dance' || $getEvents['game_type'] == 'Dance_Sports' || $getEvents['game_type'] == 'Mr_and_Mrs_Panagtigi' || $getEvents['game_type'] == 'Badminton_Men' || $getEvents['game_type'] == 'Badminton_Women' || $getEvents['game_type'] == 'Table_tennis_Men' || $getEvents['game_type'] == 'Table_tennis_Women' || $getEvents['game_type'] == 'Runs_Men' || $getEvents['game_type'] == 'Runs_Women' || $getEvents['game_type'] == 'Throws_Men'|| $getEvents['game_type'] == 'Throws_Women'|| $getEvents['game_type'] == 'Jumps_Men'|| $getEvents['game_type'] == 'Jumps_Women'){

									}else{

									

							
					?>
					
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
								<i class="fas fa-gamepad" style = "font-size: 50px; margin-top: 16px;"></i>

								</div>
								<h2><a href="#"><?php
										if($getEvents['game_type'] == 'Vollayball_Women'){
											$volleyName = 'Volleyball_Women';
											echo $volleyName;
										}else if($getEvents['game_type'] == 'Vollayball_Men'){
											$volleyName = 'Volleyball_Men';
											echo $volleyName;
										}else{
											echo $getEvents['game_type'];
										}
								?></a></h2>
							
								<p>
								Show the game information by clicking the button below!
								</p>
								<a href="showGames/show.php?event_id=<?php echo $getEvents['event_id']; ?>&&game_id=<?php echo $getEvents['id']; ?>&&game_type=<?php echo $getEvents['game_type']; ?>" class="welcome-hero-btn how-work-btn" style="display: inline-block; text-align: center; line-height: 34px;">View Match</a>

							</div>
						</div>

						<?php 
									}
					} ?>
						
						


					</div>
				</div>
			</div><!--/.container-->
		
		</section><!--/.works-->
		<!--works end -->

				<!--works start -->
				<section id="Light" class="Light" style = "margin-top: 40px;">
			<div class="container">
				<div class="section-header">
					<h2 style = "color: orange; font-weight: bolder; font-size: 30px; margin-top: 50px;">The Light Publication</h2>
					<p></p>
				</div><!--/.section-header-->
				<div class="works-content">

					<style>
						@media (min-width: 1024px) {
    .col-12.col-md-8 {
        width: calc(100% - 20px); /* Full width minus 20px (10px on each side) */
        margin-left: 10px;
        margin-right: 10px;
    }
}

					</style>

				<div class="row justify-content-center">								
	<!-- Start ne Sa the Light na part -->
	<div class="col-12 col-md-8">
		<a href="">
			<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
				<div class="single-how-works-icon">
					<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
				</div>
				<p style="font-size: 24px;">𝗕𝗹𝗮𝘇𝗶𝗻𝗴 𝗕𝗶𝘇 𝘄𝗶𝗻𝘀 𝗝𝗮𝘃𝗲𝗹𝗶𝗻 𝗶𝗻 𝗠𝗲𝗻'𝘀 𝗧𝗵𝗿𝗼𝘄𝘀</p>
				<p style="margin-top: -20px;">By Alfred Sean Marasigan</p>
				<p>
					Coleen Er Campilan of Blazing Biz claimed first place in the Javelin Throw in the Men's Category at Southern Leyte State University, Tomas Oppus, on September 17, as part of Panagtigi 2024.
					In the first batch, Eugene Estresa of the Azure Dragons began with a foul on his first attempt. However, he made a strong comeback with outstanding throws of 24.47 meters and 23.78 meters on his second and third attempts, respectively.
					Things became exciting with Samuel J. Endico Jr. of the Valiant Sabertooth, who initially led the first batch with impressive throws of 24.61 meters, 26.60 meters, and 23.21 meters, securing him the bronze medal.
					Renato Fortaleza from Blazing Biz committed a foul on his first throw but redeemed himself with throws of 24.28 meters and 20.10 meters on his second and third attempts.
					Jerich John Tio of Cyber Falcons threw 20.10 meters on the first attempt, followed by 25.96 meters and 23.65 meters on the second and third attempts, placing him third in the first batch.
					In the second batch, Azure Dragons had no entry, which resulted in their elimination.
					John Dave Mejor of the Valiant Sabertooth struggled in the second batch, committing fouls on all his attempts.
					Coleen Er Campilan of Blazing Biz performed exceptionally well, delivering impressive throws of 27.91 meters, 31.23 meters, and 30.21 meters, securing first place in the second batch and winning the gold medal.
					The silver medalist, Lob Lee Guzmana of Cyber Falcons, achieved remarkable throws of 25.93 meters, 28.29 meters, and 27.93 meters, placing second in the second batch and clinching silver.
				</p>
				<p style="text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
				<p>#thelightofparengtomas #PANAGTIGI2024</p>
			</div>
		</a>
	</div>
</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗩𝗦𝗧 𝘁𝗮𝗸𝗲𝘀 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗝𝗮𝘃𝗲𝗹𝗶𝗻 𝗧𝗵𝗿𝗼𝘄𝘀 𝘄𝗼𝗺𝗲𝗻'𝘀 𝗰𝗮𝘁𝗲𝗴𝗼𝗿𝘆</p>
						<p style = "margin-top: -20px;">By Alfred Sean Marasigan</p>
						<p>
						Southern Leyte, Philippines – Jay Lou Tomboc of Valiant Sabertooth (VST) claimed the gold medal in the Women's Javelin Throw at the Panagtigi 2024, held at Southern Leyte State University Tomas Oppus (SLSU-TO) on September 17, 2024.
In the humid weather on the SLSU-TO field, Denise Bjorx Basas of the Azure Dragons opened the event for the first batch but struggled with two foul attempts. However, she persisted and managed a throw of 10.8 meters.
Tomboc of VST shone despite the humid conditions, delivering astonishing throws of 16.12 meters, 19.88 meters, and 17.74 meters. Her remarkable performance secured her first place in Batch 1 and the gold medal overall.
Maria Jana Lapasanda of Blazing Biz delivered consistent throws of 10.17 meters, 5.34 meters, and 7.71 meters, respectively.
Tricia Joy Gura of the Cyber Falcons committed a foul on her first attempt but bounced back with impressive throws of 14.75 meters and 11.80 meters, earning her second place in Batch 1 and the bronze medal.
Unfortunately, three players from the Azure Dragons, VST, and Blazing Biz were unable to participate in Batch 2. However, Marchie Rabutin of the Cyber Falcons stood out as the sole participant in Batch 2, achieving a fantastic throw of 15.61 meters on her third attempt. Her performance earned her the silver medal.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>
					
				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗖𝘆𝗯𝗲𝗿 𝗙𝗮𝗹𝗰𝗼𝗻𝘀 𝘄𝗶𝗻 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗣𝗲𝗻𝗰𝗶𝗹 𝗥𝗲𝗻𝗱𝗲𝗿𝗶𝗻𝗴 𝗮𝘁 𝗣𝗮𝗻𝗮𝗴𝘁𝗶𝗴𝗶 𝟮𝟬𝟮𝟰</p>
						<p style = "margin-top: -20px;">By Aleinna Marein Macasero</p>
						<p>
						The Pencil Rendering competition, one of five contests in the Visual Arts category at Panagtigi 2024, started at 8:00 AM with four teams vying for the top spot. In a display of great skill and artistry, the Cyber Falcons emerged victorious.
Mr. John Andrei Besquillo, representing the Cyber Falcons, secured the gold medal with his masterful pencil rendering of a potted plant and a basket of stationery arranged on a table. The judges were impressed by Besquillo’s attention to detail, containing a sense of depth and realism in the artwork.
The competition concluded with the Azure Dragons taking second place, followed by Blazing Biz and Valiant Sabertooth. Each team showcased the talent and dedication of its artists, making the competition a true test of artistic skill.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗔𝘇𝘂𝗿𝗲 𝗗𝗿𝗮𝗴𝗼𝗻𝘀 𝗰𝗿𝗼𝘄𝗻 𝗽𝗼𝘀𝘁𝗲𝗿 𝗺𝗮𝗸𝗶𝗻𝗴 𝗶𝗻 𝗩𝗶𝘀𝘂𝗮𝗹 𝗔𝗿𝘁𝘀 𝘁𝗶𝗹𝘁</p>
						<p style = "margin-top: -20px;">By Edelita Amrento</p>
						<p>
						SOUTHERN LEYTE, Philippines — Heather Blayne Guasa of Azure Dragons topped first in the poster making category of Visual Arts competition during the Panagtigi 2024 at SLSU-TO, Graduate School Building on September 18, 2024. 
The poster making category started at 8:14 in the morning and ended before 12 in the afternoon. The contestants from Azure Dragons, Blazing Biz, Cyber Falcon, and Valiant Sabertooth were given the theme, "Elevating the norms in the field of sports." 
The creativity shown in the art of Heather Blayne Guasa of Azure Dragons portrayed the given theme, thus, secured the crown in the poster making category. Followed in line is the Valiant Sabertooth, Cyber Falcons, and Blazing Biz. 
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗩𝗮𝗹𝗶𝗮𝗻𝘁 𝗦𝗮𝗯𝗲𝗿𝘁𝗼𝗼𝘁𝗵 𝘀𝗲𝗰𝘂𝗿𝗲𝘀 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗯𝗼𝘁𝗵 𝗖𝗵𝗮𝗿𝗰𝗼𝗮𝗹 𝗥𝗲𝗻𝗱𝗲𝗿𝗶𝗻𝗴 𝗮𝗻𝗱 𝗣𝗮𝗶𝗻𝘁𝗶𝗻𝗴</p>
						<p style = "margin-top: -20px;">By Aleinna Marein Macasero</p>
						<p>
						The Visual Arts Category of this year’s Panagtigi 2024 Intramurals commenced at 8:00 AM on the grounds of the Graduate School Building with the Valiant Sabertooth team bagging two gold medals in the Charcoal Rendering and Painting categories.
In the Charcoal Rendering competition, Ms. Dailyn Dolorito’s stunning portrait of Campus Director, Mr. Clemente H. Cobilla, captured the judges’ attention with its significant likeness and clear imagery. “I’m truly grateful for this opportunity,” Dolorito stated gleefully after her win. “I believe everyone has unique talents and their own momentum. It’s important to enjoy what we do.”
The competition for Charcoal Rendering was fierce, with Blazing Biz taking second place, followed by Azure Dragons and Cyber Falcons.
Mr. Menard Pocot’s painting of the university’s iconic Kingfisher bird, displaying note-worthy clarity and a great attention to detail, won him the gold medal in the Painting category. “I was shocked when my friends told me I won,” Pocot shared, “It never crossed my mind. This is only my second art competition, and my first win. I’m truly grateful.”
The Painting category saw Azure Dragons secure second place, followed by Blazing Biz and Cyber Falcons.
Both Dolorito and Pocot showcased exceptional mastery of their chosen mediums, bringing home two gold medals and immense pride to their team. Their achievements highlight the talent and dedication of the Valiant Sabertooth artists.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗕𝗹𝗮𝘇𝗶𝗻𝗴 𝗕𝗶𝘇 𝘁𝗿𝗶𝘂𝗺𝗽𝗵𝘀 𝗮𝗴𝗮𝗶𝗻𝘀𝘁 𝗔𝘇𝘂𝗿𝗲 𝗗𝗿𝗮𝗴𝗼𝗻𝘀, 𝟲𝟱-𝟭𝟯</p>
						<p style = "margin-top: -20px;">By Jack Toyong</p>
						<p>
						Blazing Biz emerged victorious against Azure Dragons with a commanding score of 65-13 in the Women’s Basketball Championship during day 3 of Panagtigi 2024, held on September 18, at the SLSU-TO's covered court. The team’s relentless practice and strategic teamwork paved the way for their success, showcasing their determination to excel in the sport.
Blazing Biz' victory can be attributed to their exceptional teamwork and preparation. “The things that motivates me is just I want to show to everyone that I could do it even I am a girl, that we can excel on basketball as well," said Maryl Junio, MVP of the game. "Our team learned from previous defeat against Cyber Falcons, and this year, we focused on specific positions and practiced diligently, which fostered our teamwork and hard work," she added. 
The game kicked off with an electrifying atmosphere as the crowd cheered for both teams. Chloem Faith Marquez opened the scoring for Blazing Biz with a 2-point shot, quickly followed by a flawless 3-pointer from Maryl Junio and another 2 points from Mitchie Bohol, putting them ahead 7-0 within the first minute. 
The Azure Dragons teams responded with their signature chants, “L.H.S., Azure Dragons, L.H.S., Azure Dragons” through cheers and drums and Zean Alejah Noval managed to secure a 2-point shot, igniting the crowd. However, Blazing Biz maintained their momentum with 4 points from Vasquez, 2 points from Junio, and 2 points from Bohol, ending the quarter with a significant 17-point lead.
The second quarter saw Roselyn Vasquez dominate with 8 points, while Junio showcased her skills by effectively grabbing rebounds. The Azure Dragons struggled to score, with consistent shots from Quisado, Lansang, and Bohol failing to find the net.
In the third quarter, Azure Dragons attempted a comeback with Zean Alejah Noval hitting two 2-point shots and a 3-pointer, along with another 2-point shot from Rucat. However, Blazing Biz responded with strong plays, as Junio assisted Roselyn Vasquez, who fired 8 points, maintaining their lead.
Blazing Biz capped off the game with a 4-point shot from Rucat and Junio, solidifying their dominance on the court. They concluded the championship with a decisive victory over Azure Dragons, finishing the game with a score of 65-13. Their hard work, strategic preparation, and teamwork were key factors in their success, demonstrating their commitment to excelling in women's basketball.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗕𝗹𝗮𝘇𝗶𝗻𝗴 𝗕𝗶𝘇 𝗿𝗮𝗻𝗸𝘀 𝟭𝘀𝘁 𝗶𝗻 𝗣𝗵𝗼𝗻𝗲 𝗣𝗵𝗼𝘁𝗼𝗴𝗿𝗮𝗽𝗵𝘆</p>
						<p style = "margin-top: -20px;">By Edelita Amrento</p>
						<p>
						Julian Ocampo from Blazing Biz ranks first in Phone Photography in the Visual Arts competition during the Panagtigi 2024 at SLSU-TO, Graduate School Building on September 18, 2024.
Participating contestants from Azure Dragons, Blazing Biz, Cyber Falcons, and Valiant Sabertooth started at 8:14 in the morning, following the theme "A photo that shows togetherness, team sports, sportsmanship, and passion." 
Following the criteria, Blazing Biz' Julian Ocampo bags the first place in Phone Photography, Azure dragons ranked second, followed by Valiant Sabertooth, and Cyber Falcons. 
"I didn't expect to win because the opponents have high-end cellphones while mine was an old model," said Ocampo in an interview. 
The Phone Photography which ended the earliest among the five Visual Arts competition showcases the camaraderie of each team who have competed in different arenas of sports, highlighting the sportsmanship and passion of each and every sports enthusiast. 
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗔𝘇𝘂𝗿𝗲 𝗗𝗿𝗮𝗴𝗼𝗻𝘀, 𝗕𝗹𝗮𝘇𝗶𝗻𝗴 𝗕𝗶𝘇 𝘀𝗲𝗰𝘂𝗿𝗲 𝘄𝗼𝗺𝗲𝗻'𝘀 𝗕𝗮𝘀𝗸𝗲𝘁𝗯𝗮𝗹𝗹 𝗖𝗵𝗮𝗺𝗽𝗶𝗼𝗻𝘀𝗵𝗶𝗽 𝘀𝗹𝗼𝘁𝘀</p>
						<p style = "margin-top: -20px;">By Jack Toyong</p>
						<p>
						In a thrilling day of women's intramural basketball, the Azure Dragons and Blazing Biz both secured their spots in the championship tournament. The Azure Dragons edged out the Cyber Falcons, 22-19, while the Blazing Biz dominated the Valiant Sabertooth, 53-8.
The Azure Dragons' victory was a hard-fought battle that showcased both teams' determination and skill. The Dragons' strong defensive play and timely offensive execution proved to be the difference-makers.
The Blazing Biz' dominance was evident from the start. Their relentless offense and solid defense overwhelmed the Valiant Sabertooth.
Both the Azure Dragons and Blazing Biz have demonstrated their exceptional talent and teamwork throughout the tournament. With their championship berths secured, fans can anticipate exciting and competitive finals.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗕𝗹𝗮𝘇𝗶𝗻𝗴 𝗕𝗶𝘇, 𝗖𝘆𝗯𝗲𝗿 𝗙𝗮𝗹𝗰𝗼𝗻𝘀 𝘀𝗲𝗮𝗹 𝘀𝗽𝗼𝘁𝘀 𝗳𝗼𝗿 𝗳𝗶𝗻𝗮𝗹𝘀</p>
						<p style = "margin-top: -20px;">By Ivan Sajol</p>
						<p>
						The unstoppable Blazing Biz overwhelmed the defenseless Valiant Sabertooth with their vertical giants—John Lester Hinunangan, John Gabriel Lina, Johan Misoles, Romnick Rosales, and the scoring machine Zephyr Gantala, winning 62-43. Meanwhile, Cyber Falcon dismantled the hopes of the Azure Dragon, sweeping them away from the gold with a 49-31 victory in the Men’s Basketball Tournament during Panagtigi 2024 at the SLSU-Tomas Oppus covered court on September 18, 2024.
"Blazing Biz Burak! Blazing Biz Burak!" fueled by the cheers, Blazing Biz showed no mercy in the first quarter, showering Team VST with points led by Gantala, 20-8. Building on their momentum, Blazing Biz dominated the remaining quarters 31-16, 51-25 wrapping the game with a 19-point lead 62-43.
"We trained rigorously for the game, but now the pressure is really building as we prepare for the upcoming championship," remarked Zephyr Gantala who is very proud of winning the game.
Meanwhile, the Cyber Falcons shamed the Azure Dragon, leaving no room for them to secure any quarter, with scores of 14-9 and 28-16. With 1:31 remaining in the last quarter, head referee, Abina, discontinued the game due to unnecessary plays from the Azure Dragon, condemning them to defeat. The final score concluded the game at 49-31.
The spots in the finals are secured for both elite teams, Blazing Biz and Cyber Falcons, as they clash for the gold medal.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗕𝗹𝗮𝘇𝗶𝗻𝗴 𝗕𝗶𝘇 𝘄𝗶𝗻𝘀 𝗝𝗮𝘃𝗲𝗹𝗶𝗻 𝗶𝗻 𝗠𝗲𝗻'𝘀 𝗧𝗵𝗿𝗼𝘄𝘀</p>
						<p style = "margin-top: -20px;">By Alfred Sean Marasigan</p>
						<p>
						Renato Fortaleza of Blazing Biz claimed first place in the Javelin Throw in the Men's Category at Southern Leyte State University - Tomas Oppus, on September 17, as part of Panagtigi 2024.
In the first batch, Eugene Estresa of the Azure Dragons began with a foul on his first attempt. However, he made a strong comeback with outstanding throws of 24.47 meters and 23.78 meters on his second and third attempts, respectively.
Things became exciting with Samuel J. Endico Jr. of the Valiant Sabertooth, who initially led the first batch with impressive throws of 24.61 meters, 26.60 meters, and 23.21 meters, securing him the bronze medal.
Er Coleen Campilan from Blazing Biz committed a foul on his first throw but redeemed himself with throws of 24.28 meters and 20.10 meters on his second and third attempts.
Lovely Guzmana of Cyber Falcons threw 20.10 meters on the first attempt, followed by 25.96 meters and 23.65 meters on the second and third attempts, placing him third in the first batch.
In the second batch, Azure Dragons had no entry, which resulted in their elimination.
John Dave Mejor of the Valiant Sabertooth struggled in the second batch, committing fouls on all his attempts.
Renato Fortaleza of Blazing Biz performed exceptionally well, delivering impressive throws of 27.91 meters, 31.23 meters, and 30.21 meters, securing first place in the second batch and winning the gold medal.
The silver medalist, Jeric John Tio of Cyber Falcons, achieved remarkable throws of 25.93 meters, 28.29 meters, and 27.93 meters, placing second in the second batch and clinching silver.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>
				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗠𝗮𝗿𝗾𝘂𝗲𝗱𝗮, 𝗞𝘂𝗶𝘇𝗼𝗻 𝘀𝗲𝗰𝘂𝗿𝗲 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗛𝗶𝗴𝗵 𝗝𝘂𝗺𝗽</p>
						<p style = "margin-top: -20px;">By Alfred Sean Marasigan</p>
						<p>
						John Paul Marqueda of the Valiant Sabertooth (VST) and Sabrina May Kuizon of the Azure Dragons won gold medals in the Men's and Women's High Jump categories at Southern Leyte State University-Tomas Oppus (SLSU-TO) on September 17, 2024.
Marqueda, who took silver in last year's event, dominated the men's high jump with an impressive leap of 1.45 meters, making only one mistake. He was followed by Celfred Mira and Vincent Torres of Blazing Biz, who cleared 1.40 meters and 1.35 meters, respectively. Reflecting on his victory, Marqueda said he had been aiming for the gold for a while, worked hard this time, and finally achieved it.
In the women's event, Sabrina May Kuizon of the Azure Dragons won gold with a jump of 1.10 meters. After missing her first attempt, she succeeded on her second try. Kuizon narrowly beat Rica Joyce Escabarte of Valiant Sabertooth, who cleared 1.05 meters for silver, while Mary Lucile Dapidran took bronze with a jump of 1.00 meter. Kuizon credited her mental preparation, saying that although she wasn’t fully prepared physically, she trained her mind to do her best.
Both high jump events were fiercely competitive, with athletes pushing their limits. Marqueda’s determination, despite having limited training equipment, and Kuizon’s resilience in overcoming early setbacks, showcased the true spirit of the said sport.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>


				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗠𝗮𝗿𝗾𝘂𝗲𝗱𝗮 𝘀𝗼𝗮𝗿𝘀 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗠𝗲𝗻'𝘀 𝗛𝗶𝗴𝗵 𝗝𝘂𝗺𝗽</p>
						<p style = "margin-top: -20px;">By Alfred Sean Marasigan</p>
						<p>
						John Paul Marqueda of the Valiant Sabertooth (VST) rose above the competition as he claimed the gold in the Men's High Jump category at Southern Leyte State University-Tomas Oppus (SLSU-TO) on September 17, 2024.
After winning silver in last year’s high jump, Marqueda set his sights on the gold for this year's Panagtigi and he succeeded. With an outstanding performance, clearing heights from 1 meter to 1.45 meters with only one error, he stood out among the competitors.
Trailing behind him were Celfred Mira and Vincent Torres from the Blazing Biz, who cleared 1.40 meters and 1.35 meters, respectively.
After earning the medal he long desired, Marqueda said, "Of course, I'm happy because I achieved my goal from Team Educ (VST). My next goal was to get the gold. I’ve been aiming for it for a while, but before, I only got silver since I didn’t have much training. So this time, I worked really hard for it and I got it."
The competition began with Adan Anthony Cabahug from the Azure Dragons, who cleared the 1-meter height and continued up to 1.20 meters. However, he failed to maintain his momentum, missing three attempts at 1.25 meters, which led to his elimination.
Alden Diola and Vincent Torres from the Cyber Falcons delivered strong performances early on. However, Torres’ journey to gold ended at 1.15 meters, while Diola, known for his distinctive “laying on the bed” landing technique, was stopped at 1.25 meters.
Marqueda's passion and determination to secure the gold left the crowd cheering as he made remarkable leaps, ultimately finishing at 1.45 meters.
Tabuada and Mira, both representing Blazing Biz, made Marqueda’s path to gold more challenging. Tabuada cleared 1.30 meters, but his competition was cut short due to a foot injury and three failed attempts at 1.35 meters. Mira gave a thrilling performance, keeping up with Marqueda but ultimately finishing with a height of 1.40 meters.
Marqueda's innovative approach to training without proper equipment, improvising with what was available in his boarding house, paid off in this competition. Reflecting on his preparation, he shared, "At first, there was no actual training because the equipment wasn’t available. So, in my boarding house, I practiced by moving around the space. I even placed a bag of soil under my feet to train my leap. In the end, I achieved my goal last time it was silver, but now, it’s gold."
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>


				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗖𝘆𝗯𝗲𝗿 𝗙𝗮𝗹𝗰𝗼𝗻𝘀 𝘀𝗵𝗶𝗻𝗲 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗺𝗲𝗻'𝘀 𝗦𝗵𝗼𝘁 𝗣𝘂𝘁 𝗲𝘃𝗲𝗻𝘁</p>
						<p style = "margin-top: -20px;">By Vlanz Buba</p>
						<p>
						On Day 2 of PANAGTIGI 2024 at the SLSU-Tomas Oppus field, Cyber Falcons delivered a standout performance in the Shot Put Men’s event, winning gold with a top throw of 9.23 meters.
Clark Delos Reyes of Cyber Falcons claimed first place with a standout throw of 9.23 meters, while Renato Fortaleza from Blazing Biz took second with 8.80 meters. Samuel Endico of Valiant Sabertooth rounded out the top three with 7.40 meters.
The Shot Put Men’s event opened with Yuan Drea Orias of Azure Dragons, who started with a throw of 5.41 meters. He fouled on his second attempt and ended with a best throw of 6.20 meters on his third, concluding his competition.
Samuel Endico from Valiant Sabertooth began with 6.80 meters and improved to 7.40 meters on his second attempt. Despite fouling on his third attempt, he secured third place overall.
Renato Fortaleza of Blazing Biz struggled with a foul on his first throw but rebounded with 8.59 meters on his second attempt. He achieved a top throw of 8.80 meters on his third attempt, earning the silver medal.
Clark Delos Reyes from Cyber Falcons set the bar high with an 8.70-meter throw on his first attempt. He surpassed that with a 9.23-meter throw on his second and finished with 9.18 meters on his third attempt, clinching the gold.
In the Men’s Shot Put, Clark Delos Reyes of Cyber Falcons won with a throw of 9.23 meters. Despite competing last, his throw was the best of the event and showed outstanding skill. His performance set a high standard and made him stand out from the rest.
<br>The Scores: 
<br>1st Placer: Clark Delos Reyes (Cyber Falcons) – 9.23 meters
<br>2nd Placer: Renato Fortaleza (Blazing Biz) – 8.80 meters
<br>3rd Placer: Samuel Endico (Valiant Sabertooth) – 7.40 meters
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>


				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗩𝗮𝗹𝗶𝗮𝗻𝘁 𝗦𝗮𝗯𝗲𝗿𝘁𝗼𝗼𝘁𝗵 𝗰𝗹𝗮𝗶𝗺𝘀 𝘃𝗶𝗰𝘁𝗼𝗿𝘆 𝗶𝗻 𝘄𝗼𝗺𝗲𝗻'𝘀 𝗦𝗵𝗼𝘁 𝗣𝘂𝘁 𝗲𝘃𝗲𝗻𝘁</p>
						<p style = "margin-top: -20px;">By Vlanz Buba</p>
						<p>
						On September 17, 2024, at the SLSU-Tomas Oppus campus field, Valiant Sabertooth powered through the competition to secure the gold medal in the Shot Put Women’s category with an impressive throw of 5.80 meters.
Glysa M. Cadiz of Valiant Sabertooth took first place with a winning throw of 5.80 meters in her first attempt, while her teammate, Jay Lou Tombok claimed second with 5.37 meters. Kristine Joy Ligutan of Cyber Falcons rounded out the top three, placing third with a 5.10-meter throw.
Starting with a throw of 4.84 meters, Azure Dragons' Denise Bjorx Basa fouled on her next two attempts, which concluded her performance.
Cadiz of Valiant Sabertooth set the leading mark with a throw of 5.80 meters on her first attempt. She fouled on her second try and finished with 4.59 meters on her third throw.
Her teammate, Tombok, opened with 5.37 meters and improved to 5.28 meters on her second attempt, though she fouled on her third.
Janica Integro of Blazing Biz achieved her best throw of 4.67 meters on her third attempt. She recorded 4.11 meters on her first attempt and fouled on her second.
Ma. Teresa Membrano, also from Blazing Biz, started with a foul, followed by a throw of 4.38 meters on her second attempt and a final throw of 4.87 meters.
Kristine Joy Ligutan from Cyber Falcons began with 4.94 meters, improved to 5.10 meters on her second attempt, and ended with 4.50 meters on her third.
Andelene Suarez, her teammate, fouled on her first attempt, then threw 4.88 meters on her second attempt and 4.87 meters on her third.
Cadiz's strong first throw secured her the win in the Shot Put Women’s category. Even with a few fouls, her early performance couldn’t be beaten. With her teammate Jay Lou Tombok taking second and Kristine Joy Ligutan finishing third, the event had tough competition, but Cadiz’s early lead gave Valiant Sabertooth the gold.
<br>The Scores: 
<br>1st Placer: Glysa M. Cadiz (Valiant Sabertooth) – 5.80 meters  
<br>2nd Placer: Jay Lou Tombok (Valiant Sabertooth) – 5.37 meters  
<br>3rd Placer: Kristine Joy Ligutan (Cyber Falcons) – 5.10 meters
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗭𝗮𝗿𝗰𝗼 𝘀𝗲𝗰𝘂𝗿𝗲𝘀 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗧𝗮𝗯𝗹𝗲 𝗧𝗲𝗻𝗻𝗶𝘀 𝘄𝗼𝗺𝗲𝗻'𝘀 𝘀𝗶𝗻𝗴𝗹𝗲</p>
						<p style = "margin-top: -20px;">By Aiesha Piamonte</p>
						<p>
						Revein Zarco of the Cyber Falcons triumphed in the women’s singles Table Tennis final, ending the game with a victorious smile.
Zarco demonstrated exceptional skill and precision, defeating her opponent, Azure Dragon, with a convincing scoreline of 11-6, 11-7.
Her commanding performance throughout the match was marked by effortless ball control and powerful strikes.
Zarco's victory was sealed in the gold medal match, where her consistent training and strategic gameplay were evident. Her impressive 3rd ball attack, which proved decisive in the final round, left Azure Dragon struggling to respond. 
Despite the intense competition, Zarco maintained her composure and focus. Her approach to the game, as she noted, emphasized the importance of consistent practice and mental resilience. "Consistent training is one of the keys to winning," Zarco said humbly after securing her title. 
Azure Dragons, who took second place, faced challenges in countering Zarco's aggressive plays. The intense back-and-forth in the match highlighted Zarco’s superior technique and strategic advantage.
In her advice to aspiring players, Zarco emphasized the significance of staying calm under pressure. "Don’t be nervous, just play the game," she shared, encouraging others to approach their matches with confidence and focus.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>


				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗖𝗮𝘀𝘁𝗮𝗻̃𝗼𝘀, 𝗖𝗮𝗯𝗮𝗹𝗲𝘀 𝘄𝗶𝗻 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗧𝗮𝗯𝗹𝗲 𝗧𝗲𝗻𝗻𝗶𝘀 𝘄𝗼𝗺𝗲𝗻'𝘀 𝗱𝗼𝘂𝗯𝗹𝗲𝘀, 𝟮-𝟭 𝘃𝗶𝗰𝘁𝗼𝗿𝘆</p>
						<p style = "margin-top: -20px;">By Aiesha Piamonte</p>
						<p>
						Valiant Sabertooth captures the gold medal in women's table tennis doubles, securing a 2-1 victory over Team Blazing Biz. 
The match was a hard-fought battle, with Presleyn Castaños and Shara Cabales triumphing in three intense sets: 5-11, 11-10, 3-11, propelling their team to the final round. 
The competition intensified as both teams unleashed their full force, each aiming to end the game as quickly as possible. 
"This isn't my first time winning this competition, but consistent practice and applying my coach's techniques have been key," Castaños said with a smile. 
Cabales also expressed her happiness, noting that teamwork truly made the difference.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>


				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗔𝘇𝘂𝗿𝗲 𝗗𝗿𝗮𝗴𝗼𝗻𝘀 𝗯𝗿𝗶𝗻𝗴 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗧𝗿𝗶𝗽𝗹𝗲 𝗝𝘂𝗺𝗽𝘀 𝘄𝗼𝗺𝗲𝗻'𝘀 𝗰𝗮𝘁𝗲𝗴𝗼𝗿𝘆</p>
						<p style = "margin-top: -20px;">By Shanneah Necesito</p>
						<p>
						In a thrilling of athleticism at the Intramurals 2024, held on September 17, at the SLSU-TO campus field, Iris Mira of the Azure Dragons emerged victorious in the Triple Jumps women’s category. Mira secured first place with a remarkable leap of 6.88 meters, surpassing competitors from the Cyber Falcons and Blazing Biz.
Mira demonstrated her impressive jumping skills, achieving a 6.88-meter jump after a deep breath and focused preparation. The second-place position was claimed by Michelle Besmonte of Blazing Biz, who jumped 5.76 meters, while Melody Amor Olayvar of Cyber Falcons took third place with a leap of 5.70 meters.
"I wasn’t very confident going into the competition since it was my first time participating, but I did my best to secure a win for the Azure Dragons," Mira said in an interview, highlighting her dedication and focus on her team’s success.
During the event, Mira initially attempted a 6.94-meter jump but fell short. She later achieved a 7-meter leap on her second try, though her third attempt settled at 6.88 meters.
Michelle Besmonte’s performance began with a 5.40-meter jump, improved to 5.56 meters on her second attempt, and ultimately reached 5.70 meters. 
Melody Amor Olayvar started strong with a 5.73-meter leap, improved to 5.76 meters, but fouled on her final attempt.
Mira’s outstanding performance and steady determination were key to her victory, exposing the strength and resilience of the Azure Dragons. The friendly competition between Besmonte and Olayvar added intensity to the event, making Mira’s win all the more impressive.
<br>The Score:
<br>1st Place - Iris Mira (Azure Dragons) - 6.88 meters
<br>2nd place - Michelle Besmonte (Blazing Biz) - 5.76 meters
<br>3rd place - Melody Amor Olayvar (Cyber Falcons) - 5.79 meters
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗔𝘇𝘂𝗿𝗲 𝗗𝗿𝗮𝗴𝗼𝗻𝘀 𝗯𝗿𝗶𝗻𝗴 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗧𝗿𝗶𝗽𝗹𝗲 𝗝𝘂𝗺𝗽𝘀 𝘄𝗼𝗺𝗲𝗻'𝘀 𝗰𝗮𝘁𝗲𝗴𝗼𝗿𝘆</p>
						<p style = "margin-top: -20px;">By Shanneah Necesito</p>
						<p>
						In a thrilling of athleticism at the Intramurals 2024, held on September 17, at the SLSU-TO campus field, Iris Mira of the Azure Dragons emerged victorious in the Triple Jumps women’s category. Mira secured first place with a remarkable leap of 6.88 meters, surpassing competitors from the Cyber Falcons and Blazing Biz.
Mira demonstrated her impressive jumping skills, achieving a 6.88-meter jump after a deep breath and focused preparation. The second-place position was claimed by Michelle Besmonte of Blazing Biz, who jumped 5.76 meters, while Melody Amor Olayvar of Cyber Falcons took third place with a leap of 5.70 meters.
"I wasn’t very confident going into the competition since it was my first time participating, but I did my best to secure a win for the Azure Dragons," Mira said in an interview, highlighting her dedication and focus on her team’s success.
During the event, Mira initially attempted a 6.94-meter jump but fell short. She later achieved a 7-meter leap on her second try, though her third attempt settled at 6.88 meters.
Michelle Besmonte’s performance began with a 5.40-meter jump, improved to 5.56 meters on her second attempt, and ultimately reached 5.70 meters. 
Melody Amor Olayvar started strong with a 5.73-meter leap, improved to 5.76 meters, but fouled on her final attempt.
Mira’s outstanding performance and steady determination were key to her victory, exposing the strength and resilience of the Azure Dragons. The friendly competition between Besmonte and Olayvar added intensity to the event, making Mira’s win all the more impressive.
<br>The Score:
<br>1st Place - Iris Mira (Azure Dragons) - 6.88 meters
<br>2nd place - Michelle Besmonte (Blazing Biz) - 5.76 meters
<br>3rd place - Melody Amor Olayvar (Cyber Falcons) - 5.79 meters
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗕𝗹𝗮𝘇𝗶𝗻𝗴 𝗕𝗶𝘇 𝗿𝗮𝗹𝗹𝗶𝗲𝘀 𝘁𝗼 𝘀𝘁𝘂𝗻 𝗖𝘆𝗯𝗲𝗿 𝗙𝗮𝗹𝗰𝗼𝗻𝘀 𝗳𝗼𝗿 𝗴𝗼𝗹𝗱 𝗶𝗻 𝗧𝗮𝗯𝗹𝗲 𝗧𝗲𝗻𝗻𝗶𝘀 𝗺𝗲𝗻'𝘀 𝘀𝗶𝗻𝗴𝗹𝗲𝘀</p>
						<p style = "margin-top: -20px;">By Nesyl Kaye Tukib</p>
						<p>
						September 17, 2024 - 9:30 AM — Vicente Estomo of the Blazing Biz stepped up his attack against Martin Orais Jr. of the Cyber Falcons during the golden game of men's table tennis singles, scoring 11-4, 11-9 at the campus' covered court.
Estomo and Orais fell into a serious stance as they concentrated their drives in the most critical game of their division. Estomo’s proper footwork provided him advantage in his service aces and the long rallies in all of the sets. He delivered multiple counter-drives, gripping his racket in a tight yet flexible manner. With his techniques and aggressive gameplay, Estomo stunned sets one and two with a gigantic seven point lead.
“I am happy with how the game turned out as my efforts paid off. And I'm happier because I didn't expect to be the champion.” 
— Vicente Estomo
Orais on the other hand, seemed to lose his usual composure, lapsing into a series of errors, earning his opponent a few points lead. 
Nonetheless, the crowd cheered for both athletes as they showed sportsmanship and accepted the outcome of the game.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗔𝘇𝘂𝗿𝗲 𝗗𝗿𝗮𝗴𝗼𝗻𝘀 𝗹𝗲𝗮𝗽 𝘁𝗵𝗲 𝗹𝗶𝗻𝗲 𝗳𝗼𝗿 𝗚𝗼𝗹𝗱 𝗶𝗻 𝘁𝗵𝗲 𝗛𝗶𝗴𝗵 𝗝𝘂𝗺𝗽 𝗰𝗼𝗺𝗽𝗲𝘁𝗶𝘁𝗶𝗼𝗻</p>
						<p style = "margin-top: -20px;">By Yhanna Mae Deliman</p>
						<p>
						In a thrilling high jump competition at Southern Leyte State University - Tomas Oppus, the Azure Dragons emerged victorious with a stunning gold medal performance. The event, which commenced at 1:30 PM on September 17, 2024, saw Sabrina May Kuizon of the Azure Dragons soar to new heights, clearing 1.10 meters to clinch the top spot.
The competition began with all participants effortlessly clearing heights of 0.85 and 0.90 meters, except for Ivy Grace Bisnar of the Cyber Falcons. Bisnar struggled with both heights, failing to advance to the subsequent rounds. The contest intensified as the remaining competitors faced the 1.00-meter and 1.05-meter jumps.
Sabrina May Kuizon initially fell short of the 1.10-meter mark on her first attempt but demonstrated impressive resolve by clearing it on her second try. Her performance edged out Mary Lucile Dapidran of the Blazing Biz, who, despite a strong showing and securing the bronze medal by clearing up to 1.00 meters, could not surpass the 1.05-meter height.
Rica Joyce Escabarte of the Valiant Sabertooth achieved a commendable 1.05 meters to claim the silver medal. However, her inability to clear 1.10 meters left the door open for Kuizon’s gold medal performance.
“I feel shocked because I did not fully prepare for this,” Kuizon said in an interview. "However, I trained my mind to try my best and play.” While she express shock due to a lack of complete preparation, she also emphasize that mental training and commitment to giving best effort is important. 
The victory was met with enthusiastic cheers from hundreds of Azure Dragons supporters, who celebrated their team’s triumph with chants of “L. H. S. AZURE DRAGONS!”
The victory not only highlights Sabrina May Kuizon's individual skill and perseverance but also underscores the resilience and competitive spirit of the Azure Dragons team. This event serves as a testament to the fact that true success often requires both mental fortitude and the courage to rise to the occasion.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗦𝗟𝗦𝗨-𝗧𝗢 𝗵𝗼𝗹𝗱𝘀 𝘆𝗲𝗮𝗿𝗹𝘆 𝗕𝗮𝗱𝗺𝗶𝗻𝘁𝗼𝗻 𝘁𝗼𝘂𝗿𝗻𝗮𝗺𝗲𝗻𝘁 𝗱𝘂𝗿𝗶𝗻𝗴 𝗣𝗮𝗻𝗮𝗴𝘁𝗶𝗴𝗶 𝟮𝟬𝟮𝟰</p>
						<p style = "margin-top: -20px;">By John Lord Garvez</p>
						<p>
						The Valiant Sabertooth claimed the gold medal in the men's doubles badminton competition held at SLSU-TO covered court. The Sabertooth defeated the Cyber Falcons in a thrilling final match, winning 2-0.
The Cyber Falcons, took home the silver medal after a hard-fought battle against the Valiant Sabertooth in the semifinals. The Blazing Biz clashed with the Azure Dragons for the bronze medal but lost gripped of it, and thus handing it to the Azure Dragons.
In the women's doubles competition, the Azure Dragons captured the gold medal with a breeze, defeating the Blazing Biz. The Blazing Biz took home the silver shortly after being defeated. The Valiant Sabertooth clenched its hand on the bronze medal against the Cyber Falcons in a battle of passivity and carefulness.
The tournament was a showcase of intense competition and impressive athleticism from all the teams.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗔𝘇𝘂𝗿𝗲 𝗗𝗿𝗮𝗴𝗼𝗻𝘀 𝘀𝘄𝗲𝗽𝘁 𝗼𝘃𝗲𝗿 𝘁𝗵𝗲 𝗕𝗹𝗮𝘇𝗶𝗻𝗴 𝗕𝗶𝘇 𝗮𝘁𝘁𝗲𝗺𝗽𝘁𝘀 𝘁𝗼 𝘃𝗶𝗰𝘁𝗼𝗿𝘆</p>
						<p style = "margin-top: -20px;">By John Lord Garvez</p>
						<p>
						The Azure Dragons soared to victory in the women's doubles badminton championship at the 2024 PANAGTIGI, showcasing their dominance with a resounding 21-5, 21-9 win over the Blazing Biz. The match, held at the SLSU-TO covered court, was a testament to the Dragons' powerful play and unwavering teamwork.
						Apphia Olvina and her partner, Chrysall Nicole Rosales, displayed a masterful combination of offensive and defensive strategies, leaving the Blazing Biz struggling to keep up. The Dragons' earth-shaking smashes, coupled with their impeccable communication and coordination, proved too much for their opponents to handle.
						"Communication is key," stated Olvina after the match. "It breeds teamwork, and without it, we wouldn't have been able to deliver those blows." The duo's synchronized movements and strategic calls were evident throughout the match, demonstrating their deep understanding of each other's strengths and weaknesses.
						Rosales, the defensive powerhouse of the pair, provided unwavering support for Olvina's aggressive attacks. "I was happy to be able to support my teammate and provide backup for her to unleash her attacks," Rosales commented.
						The Azure Dragons' victory was a clear demonstration of their superior skill and teamwork. Their dominant performance has solidified their position as a force to be reckoned with in the badminton world, leaving spectators in awe of their impressive display of athleticism and strategy.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗩𝗮𝗹𝗶𝗮𝗻𝘁 𝗦𝗮𝗯𝗲𝗿𝘁𝗼𝗼𝘁𝗵 𝗰𝗹𝗮𝘄𝘀 𝘁𝗵𝗲𝗶𝗿 𝘄𝗮𝘆 𝘁𝗼 𝘃𝗶𝗰𝘁𝗼𝗿𝘆 𝗮𝗴𝗮𝗶𝗻𝘀𝘁 𝘁𝗵𝗲 𝗖𝘆𝗯𝗲𝗿 𝗙𝗮𝗹𝗰𝗼𝗻𝘀</p>
						<p style = "margin-top: -20px;">By John Lord Garvez</p>
						<p>
						In a thrilling display of competitive gaming, Valiant Sabertooth emerged victorious over the Cyber Falcons in the championship match with a dominant 2-0 series during the 2024 PANAGTIGI, held at the SLSU covered court.
						The first set saw the Cyber Falcons as the dominating team, toying and teasing their enemies with their playful flicks of the shuttlecock, but eventually, Valiant Sabertooth turned serious and crawled their ways and managed to win by a tight rope of a score, 21-20. 
						The second set was where the Valiant Sabertooth showed its fangs and how dangerous it can be when it is hunting, by mixing feats of flexibility and agility to defend against smashes, which turned to be fruitful. With a little bit of elbow grease, Valiant Sabertooth made the second set a tad bit easier, racking their score to 21-15.
						“I did not expect to win, especially against strong opponents but through luck and determination, we pushed through," said Clifford Narbaiz, a key player to the team.
						“What carried me and my partner is not skill but hardwork and stubbornness of not accepting defeat so easily," he added. 
						The championship match was a captivating display of competitiveness, showcasing their prowesses and dedication of both teams. The Valiant Sabertooth's victory is a testament to not giving in easily even when circumstances do not favor you, and by pushing through hardship, you will achieve your goals.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>


				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗔𝘂𝗱𝗶𝘁𝗼𝗿, 𝗠𝗮𝗿𝗮𝗼𝗻 𝘁𝗿𝗶𝘂𝗺𝗽𝗵𝘀 𝗕𝗮𝗱𝗺𝗶𝗻𝘁𝗼𝗻 𝗦𝗶𝗻𝗴𝗹𝗲 𝗠𝗲𝗻, 𝗪𝗼𝗺𝗲𝗻 𝗗𝗶𝘃𝗶𝘀𝗶𝗼𝗻</p>
						<p style = "margin-top: -20px;">By Maricel Budiongan</p>
						<p>
						Blazing Biz and Cyber Falcon's shuttlers emerged victorious in Badminton Men and Women Single Division on Panagtigi 2024 at SLSU-TO covered court, on September 17, 2024. 
						Gerald Auditor of Blazing Biz, powdered Cyber Falcon's Mikhael Gadiz, 2-0 (21-11, 21-6) in the first game of Men's Badminton Single Division. Blazing Biz used his swift movement and drops as a technique becoming a formidable opponent for Falcons.
						Furthermore, Valiant Sabertooth's Anthony Quinn Tordaguila defeats Azure Dragon's Nel Vincent Aves in 2-0 (21- 11, 21-17). The two shuttlers made the crowed hyped in cheer with their kills and strong smash.  Tordaguila of VST will compete for the championship. 
						On the other hand, Nel Vincent Aves of Azure Dragons' clobbered Cyber Falcon's Mikhael Gradiz, 2-0 (21-6, 21-5) in the battle for bronze. 
						Gerald Blazing Biz' Gerald Auditor proved his outstanding skills in Badminton as he conquered gold against Valiant Sabertooth's Tordaguila, 2-1 (21-17, 20-22, 15-9). Auditor made the opponent move quickly by making shots to the corners giving Tordaguila a difficult time. 
						In the women's single division. Cyber Falcon's Rohna Mae Maraon nipped Rhyzel Joy Sotto of Blazing Biz, 2-0 (22-20, 21-14). The first set of the game is a close call for Blazing Biz to win but Maraon pushed through gaining the momentum of the first set and continue to dominate the second set of the game. Sotto of Blazing Biz will compete for the battle of bronze. 
						Moreover, Azure Dragons' Alesha Isaiah Uy beat Valiant Sabertooth's Crystal Espere, 2-0 (21-14, 21-17).  According to Uy, she used placing as a technique to win against the opponent, a technique where she looked at her the opponents place and carry the shuttlecock towards her rival . “I feel a little nervous because in the battle for championship, my opponent will be much harder” Uy added. The VST will play against Blazing Biz for the battle of Bronze. 
						Moreover, Sotto of Blazing Biz edged out Crystal Espere of VST, 2-1 (21-19, 12-21, 15-13) in the battle for bronze in Women's Badminton Single Division. Sotto won the first set with her long and deep serves. But Espere carried out the second set resulting for the set 3 to place. Blazing Biz emerged victorious and bag the bronze medal. 
						Rohna Mae Maraon of Cyber Falcon's sustain her enthusiasm to win gold as she prevail over Alesha Uy of Azure Dragons 2-0 (21-11, 21-13).
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>


				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗕𝗹𝗮𝘇𝗶𝗻𝗴 𝗕𝗶𝘇 𝗰𝗼𝗻𝗾𝘂𝗲𝗿𝘀 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗠𝗲𝗻'𝘀 𝗕𝗮𝗱𝗺𝗶𝗻𝘁𝗼𝗻 𝗦𝗶𝗻𝗴𝗹𝗲 𝗗𝗶𝘃𝗶𝘀𝗶𝗼𝗻</p>
						<p style = "margin-top: -20px;">By Maricel Budiongan</p>
						<p>
						Gerald Auditor of Blazing Biz defeated Anthony Quinn Tardaguila 2-1 (21-17, 20-22, 15-9) in Men Badminton Single Division championship at SLSU-TO covered court on September 17, 2024. 
						Auditor walloped team Cyber Falcons' Mikhael Gadiz 2-0 (21-11, 21-6) in the first game leaving a huge gap of scores in both set. 
						"I would like to thank God, our team, for their unwavering support and dedication of our players even though we don't win all of the golds but I can see that they gave everything they had," said Auditor in his interview.
						The first set started smoothly allowing players to stay calm and composed with their rackets waving back and forth. 
						The tension started in the second set of the game when Tardaguila claimed the second set with his enthusiasm to bag for gold. The game was in call for third set. 
						"Go, Blazing Biz!" shouted fans as the thrill and pressure started to build up. 
						According to Auditor, "The cheer of my teammates can boost my confidence because I was able to remember my game and how it went."
						The shuttler of Blazing Biz amazed the crowd with his fast reflexes and feints making the opponent to move quickly by using different shots. These move has made him the champion of Men's Badminton Single Division. 
						"I hope that Blazing Biz wins, but if we are not lucky enough to claim the overall champion, the important thing is that our athletes enjoy their game," he added.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗖𝘆𝗯𝗲𝗿 𝗙𝗮𝗹𝗰𝗼𝗻𝘀 𝗯𝗮𝗴 𝗚𝗼𝗹𝗱 𝗳𝗼𝗿 𝗕𝗮𝗱𝗺𝗶𝗻𝘁𝗼𝗻 𝘄𝗼𝗺𝗲𝗻'𝘀 𝘀𝗶𝗻𝗴𝗹𝗲 𝗱𝗶𝘃𝗶𝘀𝗶𝗼𝗻</p>
						<p style = "margin-top: -20px;">By Maricel Budiongan</p>
						<p>
						With her kills and strong smash, Rohna Mae Maraon of Cyber Falcon bagged gold against Azure Dragon's Alesha Isaiah Uy, 2-0 (21-11, 21-13) in Women's Badminton Single Division at SLSU-TO covered court on September 17, 2024.
						"Speechless jud kay kaingon ko'g mapildi ko kay kusog baja ang Azure Dragons" (I was speechless because I thought I was going to lose since Azure Dragons is a strong opponent,) said Maraon in an interview. 
						The first set of the game was carried by Maraon's back and forth swings and strong smash of her racket, dominating the first set of the championship game. Uy tried with all her might to close the gap of their score. 
						According to her, “Nag thank you ko nilang tanan sa ilang support, update sa among GAM. Specially sa among GAM kay focus jod sija namong mga player.” (I thank them all for their support, updates from our GAM. Especially to our GAM because he gave all his attention to our players.) 
						The crowd was hyped with Cyber Falcons Maraon's kills and fast reflexes that dominated the game with another 21 points and was proclaimed as champions. 
						"Our biggest aim is to be the overall champion,” Maraon added.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>
			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗖𝘆𝗯𝗲𝗿 𝗙𝗮𝗹𝗰𝗼𝗻𝘀 𝗱𝗼𝗺𝗶𝗻𝗮𝘁𝗲𝘀 𝗶𝗻 𝗧𝗿𝗶𝗽𝗹𝗲 𝗝𝘂𝗺𝗽𝘀 𝗠𝗲𝗻 𝗖𝗮𝘁𝗲𝗴𝗼𝗿𝘆</p>
						<p style = "margin-top: -20px;">By Shanneah Necesito</p>
						<p>
						John Arvie Capulo of Cyber Falcons clinched victory in the Men’s Triple Jump category, triumphing over competitors from Blazing Biz and Valiant Sabertooth. The exciting jumps took place at the SLSU-TO campus field on September 17, during the second day of Intramurals 2024.
						Capulo showcased impressive speed and power with a remarkable 8.90-meter leap, underscoring his determination to claim gold. Every jump he made was a display of his prowess. Following him was Cesar Espana of Blazing Biz with a leap of 8.58 meters, and Gino Paolo De Borja of Valiant Sabertooth with a jump of 7.52 meters.
						“I first sought strength and guidance through prayers, as I felt nervous entering the field. Then, I believed in myself, and of course, I felt happy and overwhelmed since the Lord granted my prayers,” Capulo shared, reflecting on his victory and the role of his faith.
						The field witnessed Capulo’s explosive takeoff, starting with an 8.52-meter jump. Although he fell just short of 8.51 meters on his second attempt, he delivered a stunning 8.90-meter leap on his final try, securing his win.
						Cesar Espana of Blazing Biz demonstrated consistent improvement with each jump. He started with 8.41 meters on his first attempt, improved to 8.42 meters on his second, and ultimately earned the silver with his final jump of 8.58 meters.
						Gino Paolo De Borja of Valiant Sabertooth had a challenging day. His first attempt of 7.52 meters was his best, followed by 6.65 meters on his second attempt and 6.59 meters on his third. Despite the tough competition, his initial leap secured his place in the field.
						<br>The Scores:
						<br>1st Placer : John Arvie Capulo (Cyber Falcons) - 8.90 meters
						<br>2nd Placer : Cesar España (Blazing Biz) - 8.58 meters
						<br>3rd Placer : Gino Paolo De Borja (Valiant Sabertooth) - 7.52 meters
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>

			</div>
			

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗗𝗿𝗮𝗴𝗼𝗻𝘀 𝘁𝗼𝗽𝗽𝗹𝗲 𝗙𝗮𝗹𝗰𝗼𝗻𝘀, 𝗲𝗮𝗿𝗻𝘀 𝗚𝗼𝗹𝗱 𝗶𝗻 𝗧𝗮𝗯𝗹𝗲 𝗧𝗲𝗻𝗻𝗶𝘀 𝗺𝗲𝗻'𝘀 𝗱𝗼𝘂𝗯𝗹𝗲𝘀</p>
						<p style = "margin-top: -20px;">By Nesyl Kaye Tukib</p>
						<p>
						September 17, 2024 - 9:47 AM — Jairo Gan and Ivan Refugio of the Azure Dragons fires a two to four point lead over Panugaling and Damolo of the Cyber Falcons in the championship match of men's table tennis doubles, scoring 11-9, 5-11, 11-7, at SLSU-TO covered court. 
						The game was heated as supporters from each team screamed at the top of their lungs. The dynamic duos display their brilliant ball-handling skills, strengthening their holds in each rally. Screaming “choo-lee!” everytime they kill a point, sending the entire hall on fire. The Azure Dragons lead the match.
						“I'm super happy, considering that table tennis isn't really my forte. I thought that I'll be a burden to my partner. But when we played, it turned out fine, easing my nervousness.” 
						— Jairo Gan
						In terms of their training, Gan said that they had individual preparations. He went to Sogod, Southern Leyte to train and practice as he wants to do his best during the intramural meet.
						Gan and Refugio’s brilliance partnered with technique pushed through. With powerful drives and strokes, the Dragons showcased their great scoring blitz, countering the attacks of the Falcons, landing the ball to gold with the hits from their blades.
						</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>

			</div>

				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗔𝘇𝘂𝗿𝗲 𝗗𝗿𝗮𝗴𝗼𝗻𝘀 𝘁𝗮𝗸𝗲 𝗴𝗼𝗹𝗱 𝗶𝗻 𝗟𝗼𝗻𝗴 𝗝𝘂𝗺𝗽 𝘄𝗼𝗺𝗲𝗻'𝘀 𝗲𝘃𝗲𝗻𝘁</p>
						<p style = "margin-top: -20px;">By Vlanz Buba</p>
						<p>
						Azure Dragons claimed the top spot in the Long Jump Women’s category with a jump of 2.72 meters, overcoming two fouls to secure the victory on September 17, 2024, at SLSU-TO's campus field. 
						Despite a shaky start, Andrea Allyne Tolibas of Azure Dragons rose to the challenge and won the competition with a second-attempt leap of 2.72 meters. Riza Gavilan and Dona Dagaro of Cyber Falcons finished second and third, respectively, both putting in consistent performances.
						"I’m really happy with this win," Tolibas said. She trained hard for this competition, and it feels great to see all that effort pay off.
						The competition began with the Cyber Falcons' duo, Riza Gavilan and Dona Dagaro. Gavilan started with a solid jump of 2.45 meters, improving to 2.63 meters on her second attempt, and finishing strong with 2.59 meters in her third try. Dagaro, on the other hand, opened with 2.57 meters, peaking with 2.62 meters in her second attempt, but dropped to 2.20 meters on her final try.
						Tolibas of Azure Dragons had a tough beginning, fouling on her first attempt. However, she responded with a 2.72-meter leap in her second try, which ultimately secured her the win. She fouled again on her third attempt but had already done enough to claim victory.
						Elvie Bulahan of Valiant Sabertooth struggled to keep up with the leaders, posting jumps of 2.00 meters, 2.37 meters, and 2.08 meters. Venus Galanida from Blazing Biz came close to challenging for a podium spot with jumps of 2.37 meters and 2.36 meters, but narrowly missed out.
						Tolibas showed great determination in the Long Jump women’s event, recovering from early fouls to win the gold with a strong jump. Her calm under pressure and solid technique helped her outshine the competition. Though, Gavilan and Dagaro put up a strong fight, Tolibas’ performance for the Azure Dragons made her the standout athlete in an exciting contest.
						<br>The Scores: 
						<br>1st Placer: Andrea Allyne Tolibas (Azure Dragons) – 2.72 meters  
						<br>2nd Placer: Riza Gavilan (Cyber Falcon) – 2.63 meters  
						<br>3rd Placer: Dona Dagaro (Cyber Falcon) – 2.62 meters
							</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>

			</div>


				<div class="row justify-content-center">								
			<!-- Start ne Sa the Light na part -->
				<div class="col-12 col-md-8">
				<a href="">
					<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
						<div class="single-how-works-icon">
							<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
						</div>
						<p style = "font-size: 24px;">𝗚𝗮𝗻𝘁𝗮𝗹𝗮'𝘀 𝗴𝗼𝗹𝗱𝗲𝗻 𝗰𝗼𝗺𝗲𝗯𝗮𝗰𝗸 𝘄𝗶𝗻𝘀 𝗟𝗼𝗻𝗴 𝗝𝘂𝗺𝗽 𝗮𝗳𝘁𝗲𝗿 𝗹𝗮𝘀𝘁 𝘆𝗲𝗮𝗿'𝘀 𝘀𝗲𝘁𝗯𝗮𝗰𝗸</p>
						<p style = "margin-top: -20px;">By Vlanz Buba</p>
						<p >	On September 17, 2024, Zephyr Gantala of Blazing Biz soared to victory in the Long Jump men’s category, redeeming himself after falling short last year. Gantala's impressive leap of 4.54 meters secured the win, marking a triumphant return to form, at the SLSU-TO's campus field. 
							After last year’s disappointment, Gantala seized his moment in this year’s competition, out-jumping his rivals and claiming the gold. His win was followed by John Lloyd Tibon of Valiant Sabertooth at 4.40 meters and Jeffrey Mahinay of Cyber Falcons, who finished third with a jump of 3.96 meters.
							“It was an emotional win for me. After missing out last year, this was my golden comeback,” Gantala said, reflecting on his hard-earned victory.
							The competition opened with Mahinay from Cyber Falcon setting the pace, landing a solid first attempt of 3.93 meters. His second attempt was his best at 3.96 meters, but he couldn’t push beyond that, rounding out his day with a 3.91-meter jump.
							John Lloyd Tibon of Valiant Sabertooth showed consistent improvement throughout his attempts, starting with 4.31 meters, followed by 4.39 meters, and finally securing second place with a jump of 4.40 meters.
							Gantala, representing Blazing Biz, stunned the crowd with his first attempt, an explosive 4.54 meters, which ultimately secured his victory. Though his second attempt dipped to 4.17 meters, he regained his form in the third, jumping 4.45 meters.
							The Azure Dragons Team struggled to find their rhythm, with jumps of 3.60 meters, 3.56 meters, and 3.51 meters, falling short of the podium.
							As the event progressed, Mahinay attempted to close the gap but couldn’t improve on his initial jump. Tibon made a final effort to reclaim the top spot, but Gantal’s earlier leap proved unbeatable, sealing his comeback victory.
							"Preparing for this competition involved a lot of dedication and hard work," Gantal shared. "I spent a lot of time in the gym, worked on my technique, and made sure to stay focused and fit. All that effort helped me perform well today." Gantal’s preparation, which included intensive gym workouts and technique training, was key to his success and marked a well-earned redemption. 
							<br>The scores: 
							<br>1st Placer: Zephyr Gantal (Blazing Biz) – 4.54 meters
							<br>2nd Placer: John Lloyd Tibon (Valiant Sabertooth) – 4.40 meters
							<br>Third Placer: Jeffrey Mahinay (Cyber Falcon) – 3.96 meters
							#thelightofparengtomas
							</p>
						<p>
						<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
						</p>
						<p>#thelightofparengtomas 
						#PANAGTIGI2024</p>
					
						</p>
					</div>
				</a>
			</div>

			</div>
					<div class="row justify-content-center">

					
					<!-- Start ne Sa the Light na part -->
						<div class="col-12 col-md-8">
						<a href="">
							<div class="single-how-works d-flex flex-column align-items-center" style="text-align: center; width: 100%;">
								<div class="single-how-works-icon">
									<i class="fas fa-bullhorn" style="font-size: 40px; position:relative; top: 8px;"></i>
								</div>
								<p style = "font-size: 24px;">𝗦𝗮𝗯𝗲𝗿𝘁𝗼𝗼𝘁𝗵, 𝗗𝗿𝗮𝗴𝗼𝗻𝘀 𝗰𝗿𝗼𝘄𝗻𝗲𝗱 𝗠𝗿 𝗮𝗻𝗱 𝗠𝘀 𝗣𝗮𝗻𝗮𝗴𝘁𝗶𝗴𝗶 𝟮𝟬𝟮𝟰</p>
								<p style = "margin-top: -20px;">By Eureka Ausa</p>
								<p>
								The crowd erupts in cheers during the crowning moment, as Justine Joe Balbon from Valiant Sabertooth and Tracy Handog from Azure Dragons proudly receives their crown after being announce as the grand winner of this year’s Mr. and Ms. Panagtigi 2024 held at SLSU-TO.
								The final question for the women weighing the final judgment as who will bring home the crown was, “In today’s world, social media plays a huge role on how we connect in each other. How would you use social media platform as Ms. Panagtigi to promote healthy lifestyle, sportsmanship, and positive student engagement at Southern Leyte State University?”
								Ms. Handog responded, “As a Ms. Panagtigi, 2024, I would use social media to advocate for innovation, and excellence. This will follow a collective action, makes a community for excellence, where everyone can strive for excellence and progress becomes the new standard. This action makes SLSU closer to our mission of becoming a university for the future."
								Questioned by their host, the final question for the men was, “Sportsmanship goes beyond winning or losing, it’s all about respect, fairness, and community. As Mr. Panagtigi how will you inspire your fellow students to value sportsmanship on and off the field?” 
								Among the other contestants, Mr. Balbon secured the crown with his grand winning answer, “Thank you again for the very wonderful question. As the person who inspired others, I will be the advocate or the front liner who will embody what it means to be true sportsman, it means that sportsmanship is indeed a very relevant thing in our community in playing sports, something that accepts defeat, something to brag about winning but I won’t be like that. If I will become Mr. Panagtigi, I will show everyone what it means to truly win, and to truly lose and to influence others by inspiring that despite losing at every odd you can get back up and even if you win you keep your feet on the ground, standing equals among others.”
								Despite the final result of who won the crown, all candidates were awarded with minor and major awards. For the Minor Awards, Mr. and Ms. Photogenic was awarded to Mr. Bhenjie Amparo from the Cyber Falcons and Ms. Tracy Marie Handog from Azure Dragons. Best in Social Media was won by both of the candidates from the Azure Dragons. Mr. and Ms. Congeniality was given to the candidates of Valiant Sabertooth Mr. Justine Joe Balbon and Ms. Joanna Espanola from Blazing Biz. The Cyber Falcons reigned as Best in Sportswear while the winner for the Modern Terno was Ms. Handog from the Azure dragons and Mr. Esguerra of the Blazing Biz. Lastly, Special Award from Skeen Life was secured by the candidates from the Blazing Biz.
								Aside from the grand winners of Mr. and Ms. Panagtigi 2024, first runners up was claimed by Ms. Galang from Valiant Sabertooth and Mr. Esguerra from Blazing Biz while the second runners up were Mr. Amparo of Cyber Falcons and Ms. Joanna Espanola from Blazing Biz. Our third runners up was won by the male candidate of Azure Dragons Mr. Aves and Ms. Mantillo from the Cyber Falcons.<br>
								
								<p style = "text-decoration: none; font-weight: bolder;">Source: The Light Publication</p>
								<p>#thelightofparengtomas 
								#PANAGTIGI2024</p>
							
								</p>
							</div>
						</a>
					</div>

					</div>
				</div>
			</div><!--/.container-->
		
		</section><!--/.works-->

	

	
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
							<p>
							Created by: Mr. Ejie Cabales Florida BSIT-301

							</p><!--/p-->
						</div>
						<div class="col-sm-7">
						<div class="footer-social">
						<span><i class="fa fa-phone">+639627905690</i></span>
							<a href="https://web.facebook.com/ejie.florida.7/" target="_blank"><i class="fa fa-facebook"></i></a>    
							<a href="https://x.com/EjieF77916" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="https://www.linkedin.com/in/ejie-florida-b70100277/" target="_blank"><i class="fa fa-linkedin"></i></a>
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