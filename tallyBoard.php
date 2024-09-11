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
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
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
        
        <style>
            .text-center {
                text-align: center;
            }

            .d-flex {
                display: flex;
            }

            .justify-content-center {
                justify-content: center;
            }

            .align-items-center {
                align-items: center;
            }

            .medal-icon {
                width: 20px;
                height: 20px;
                margin-left: 5px; /* Space between text and image */
            }

            /* Optional: Style for table cells */
            td {
                vertical-align: middle; /* Center text vertically if necessary */
            }

        </style>
		

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
			                    <li><a href="index.php">home</a></li>
			                 
			                   
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->
		    <div class="clearfix"></div>

		</section><!-- /.top-area-->
		<!-- top-area End -->

	

	
		<!--works start -->
        <section id="works" class="works">
    <div class="container">
            
            <a href="" style = "border: green 1px solid; padding: 10px; border-radius: 10px; background-color: #557C56; color: white; font-weight: bold; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 
              0 6px 20px rgba(0, 0, 0, 0.19); margin-top: 20px;">DOWNLOAD SCORE TALLY</a>
        <div class="card-body px-0 pt-0 pb-2" style = "margin-top: 50px;">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Team Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Team Logo</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">GOLD</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SILVER</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BRONZE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            $id = $_GET['event_id'];
                            $selectTeams = "SELECT * FROM tally WHERE event_id = $id";
                            $queryTeams = mysqli_query($conn, $selectTeams);

                            while($getTeam = mysqli_fetch_assoc($queryTeams)){
                                $org = '';
                                if($getTeam['team_name'] == 'Cyber Falcon'){
                                    $org = 'BSIT';
                                }else if($getTeam['team_name'] == 'Blazing Biz'){
                                    $org = 'BSBA';
                                }else if($getTeam['team_name'] == 'Azure Dragons'){
                                    $org = 'Lab High';
                                }else{
                                    $org = 'Education';
                                }
                                
                                $team_name = $getTeam['team_name'];

                                $getLogo = "SELECT * FROM teams WHERE event_id = '$id' AND team_name = '$team_name'";
                                $getLogoQuery = mysqli_query($conn,$getLogo);
                                $result = mysqli_fetch_assoc($getLogoQuery);

                                $logo = $result['logo'];
                                if (substr($logo, 0, 3) === '../') {
                                    $logo = substr($logo, 3); // Remove the first 3 characters
                                }
                
                                

                                
                               
                                
                        ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center" style = "display: block;">
                                        <h6 class="mb-0 text-sm"><?php echo $getTeam['team_name']; ?></h6>
                                        <p class="text-xs text-secondary mb-0" style = "font-weight: bolder; color: orange;"><?php echo $org; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center" style = "display: block;">
                                           
                                            <img src = '<?php echo $logo; ?> ' style = "width: 40px; hieght: 40px;">
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center" style = "position: relative; top: 10px;">
                                    <p class="text-xs font-weight-bold mb-0"><?php echo $getTeam['GOLD']; ?></p>
                                    <img src="background_image/gold.png" alt="gold" class="medal-icon">
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center" style = "position: relative; top: 10px;">
                                    <p class="text-xs font-weight-bold mb-0"><?php echo $getTeam['SILVER']; ?></p>
                                    <img src="background_image/silver.png" alt="silver" class="medal-icon">
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center" style = "position: relative; top: 10px;">
                                    <p class="text-xs font-weight-bold mb-0"><?php echo $getTeam['BRONZE']; ?></p>
                                    <img src="background_image/bronze.png" alt="bronze" class="medal-icon">
                                </div>
                            </td>
                        </tr>
                        <?php  } ?>
                    </tbody>
                </table>
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
				                
				            </div><!--/.navbar-header-->
			           	</div>
			           	<div class="col-sm-9">
			           		<ul class="footer-menu-item">
			                    <li class="scroll"><a href="#works">how it works</a></li>
			                    <li class="scroll"><a href="#explore">explore</a></li>
			                    <li class="scroll"><a href="#reviews">review</a></li>
			                    <li class="scroll"><a href="#blog">blog</a></li>
			                    <li class="scroll"><a href="#contact">contact</a></li>
			                    <li class=" scroll"><a href="#contact">my account</a></li>
			                </ul><!--/.nav -->
			           	</div>
		           </div>
				</div>
				<div class="hm-footer-copyright">
					<div class="row">
						<div class="col-sm-5">
							<p>
								&copy;copyright. designed and developed by <a href="https://www.themesine.com/">themesine</a>
							</p><!--/p-->
						</div>
						<div class="col-sm-7">
							<div class="footer-social">
								<span><i class="fa fa-phone"> +1  (222) 777 8888</i></span>
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
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