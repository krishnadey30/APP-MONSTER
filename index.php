<!DOCTYPE html>
<?php
        $username = "root";
        $servername = "localhost";
        $password = "krishna";
        $dbname = "play_store";
        $conn = mysqli_connect($servername , $username , $password , $dbname);
        if(!$conn)
        {
          die("oops connection failed :".mysqli_connect_error());
        }
  ?>
<html lang="en">
<head>
<title>APP MONSTER</title>
<!-- meta-tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wacky Trip Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta-tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/lightbox.css">
<!--web-fonts-->
<link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Tangerine:400,700" rel="stylesheet">
<!--//web-fonts-->
</head>
<body>
<!-- banner -->
	<div  id="home">

<div class="container">
		<!-- header -->
		<header>
			<!-- navigation -->
			<div class="w3_navigation">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="w3_navigation_pos">
						<h1><a href="index.html"><span>A</span>PP <span>m</span>ONSTER</a></h1>
					</div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<!-- <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-4" id="cl-effect-4">
						<ul class="nav navbar-nav menu__list">
							<li><a href="index.html">Home</a></li>
							<li><a href="#about" class=" scroll">About</a></li>
							<li><a href="#team" class=" scroll">Team</a></li>
							<li><a href="#gallery" class=" scroll">Destinations</a></li>
							<li><a href="#contact" class=" scroll">Contact</a></li>
						</ul>
					</nav>
				</div> -->
			</nav>	
	</div>
	<div class="clearfix"></div>
		<!-- //navigation -->
		</header>
	<!-- //header -->
	<!-- banner-text -->
		<div class="banner-text" > 
			<div class="book-form" id="register">
			<p>Pick your App</p><br><br><br><br>
			   <form action="app.php" method="post" name="dropdown">

					<div class="col-md-3 form-time-w3layouts">
							<label>Genre</label>
							<select class="form-control"  name="genredrop" onChange="this.form.submit()">
								<?php
									$q="SELECT * from genre";
									$r=mysqli_query($conn,$q);
									?> <option style="display:none"></option><?php
									while($row=mysqli_fetch_assoc($r))
									{
										?><option value=<?php echo $row["gid"]; ?>><?php echo $row["gname"]; ?></option><?php
									}
								?>
							</select>
					</div>
				</form>
				<form action="app.php" method="post" name="search">
					<div class="col-md-3 form-left-agileits-w3layouts">
			        	<label>App Name</label>
						<input name="app" type="text" placeholder="App Name">
					</div>

					<div class="col-md-3 form-left-agileits-w3layouts">
			        	<label>Developer Name</label>
						<input name="developer" type="text" placeholder="Developer Name">
					</div>

					<div class="col-md-3 form-left-agileits-submit">
						  <input type="submit" value="search">
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
			<!-- <div class="banner-btm-agileits">
				<div class="col-md-4 bann-left-w3-agile">
					<h3><span>24/7</span>Support</h3>
				</div>
				<div class="col-md-4 button-agileits">
					<a href="#contact" class="hvr-ripple-out scroll">Get in touch</a>
				</div>
				<div class="col-md-4 bann-right-wthree">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
					<a href="mailto:info@example.com">info@example.com</a>
				</div>
			</div> -->
		</div>
	</div>
</div>
<!-- //banner -->
<!-- about -->
<!-- banner-bottom -->
	
<!-- //Footer -->
<script src="js/jquery-2.2.3.min.js"></script> 

					<script src="js/lightbox-plus-jquery.min.js"></script>	
			<!-- Owl-Carousel-JavaScript -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel ({
				items : 4,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});
		});
	</script>
	<!-- //Owl-Carousel-JavaScript -->  
	<!-- flexSlider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				  </script>
				<!-- //flexSlider -->
 <!-- Move-top-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- Move-top-scrolling -->
<!-- Calendar -->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->
<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>