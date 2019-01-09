<?php
	require_once "models/setting.php";
	require_once "models/Products.php";
?>
<html>
<head>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
	<!-- Custom styles for this page -->
	<link href="css/product-page.css" rel="stylesheet" type="text/css">
	<style>
		.icon-shopping-cart{
			background-image:url("img/shopping-cart.png");
			height:24px;
			width:24px;
			display:inline-block;
		}
	</style>
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <!--<a class="navbar-brand js-scroll-trigger" href="#page-top">Uncle Tetsu</a>-->
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#service">Our Service</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="register.php#regis">Register</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">Sign in</a>
            </li>
			<li>
				<a href="product/product-cart.php"><p class="icon-shopping-cart"></p></a>
			</li>
          </ul>
        </div>
      </div>
    </nav>
	<div class="container-fluid" style="margin-top:20px;">
	<h1 style="text-align:center;color:hotpink;">Products</h1><br>
	<div class="container">
	<div class="tab-content" id="pills-tabContent">
	  <?php
		Products::showProductsInPortfolio();
	  ?>
	</div>
	</div>

	</div>
	<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
</body>
</html>