<?php
	require_once "/models/_check.php"; 
	require_once "/models/setting.php";
	require_once "/models/User.php";
	$msg = '';
	$msg1= '';
	if(isset($_POST["username"])){
		$username = mysql_real_escape_string($_POST["username"]);
		$password = $_POST["password"];
		$crypt_pass= User::encryptPassword($password);
		$email    = mysql_real_escape_string(trim($_POST["email"]));
		$name     = mysql_real_escape_string(trim($_POST["name"]));
		$address  = mysql_real_escape_string(trim($_POST["address"]));
		$cond = true;
		if(User::checkNumberUsername($username) > 0){
			$msg = "Username has been taken";
			$cond = false;
		}
		if(User::checkNumberEmail($email) > 0){
			$msg1 = "Email has been taken";
			$cond = false;
		}
		if($cond){
			$type = "member";
			User::addUser($username,$email,$crypt_pass,$address,$name,$type);
			$_SESSION["session_user_email"] = $email;
			$_SESSION["session_user_passwd"] = $password;
			header("Location:welcome.php");
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Uncle Tetsu</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="css/register.css" rel="stylesheet" type="text/css">
    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
	<script>
		function createCustomElement(classname, classtext){
			var child = document.createElement("p");
			child.setAttribute("class",classname);
			child.innerHTML=classtext;
			return child;
		}
		function checkList(){
			var parent = document.getElementById("msg_box");
			parent.innerHTML = "";
			var email  = document.getElementById("email");
			var name   = document.getElementById("name");
			var pass   = document.getElementById("password");
			var repass = document.getElementById("confirm");
			var address= document.getElementById("address");
			var username= document.getElementById("username");
			var tmp    = "";
			var cond   = true;
			var dig= /^[a-zA-Z\s]*$/;
			var re = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
			if(email.value == ""){
				email.style.border = "solid thin red";
				tmp = "*Email cannot be blank";
				parent.appendChild(createCustomElement("alert alert-danger",tmp));
				cond = false;
			}
			else if (!re.test(email.value)){
				email.style.border = "solid thin red";
				tmp = "*Invalid email";
				parent.appendChild(createCustomElement("alert alert-danger",tmp));
				cond = false;
			}
			else{
				email.style.border = "";
			}
			
			if(name.value == ""){
				name.style.border = "solid thin red";
				tmp = "*Name cannot be blank";
				parent.appendChild(createCustomElement("alert alert-danger",tmp));
				cond = false;
			}
			else if(!dig.test(name.value)){
				alert("Put your realname BOI");
				cond = false;
			}
			else{
				name.style.border = "";
			}
			if(username.value == ""){
				username.style.border = "solid thin red";
				tmp = "*Username cannot be blank";
				parent.appendChild(createCustomElement("alert alert-danger",tmp));
			}
			else{
				username.style.border = "";
			}
			if(address.value == ""){
				address.style.border = "solid thin red";
				tmp ="*Address cannot be blank";
				parent.appendChild(createCustomElement("alert alert-danger",tmp));
				cond = false;
			}
			else{
				address.style.border = "";
			}
			if(pass.value == ""){
				pass.style.border = "solid thin red";
				tmp ="*Password cannot be blank";
				parent.appendChild(createCustomElement("alert alert-danger",tmp));
				cond = false;
			}
			else{
				pass.style.border = "";
			}
			if(repass.value == ""){
				repass.style.border = "solid thin red";
				tmp ="*Confirm Password cannot be blank";
				parent.appendChild(createCustomElement("alert alert-danger",tmp));
				cond = false;
			}
			else{
				repass.style.border = "";
			}
			if(pass.value != repass.value){
				tmp ="*Password need to be matched";
				parent.appendChild(createCustomElement("alert alert-danger",tmp));
				cond = false
			}
			document.getElementById("msg_box").style.visibility = "visible";
			if (cond){
				document.getElementById("msg_box").style.visibility = "hidden";
			}
			return cond;
		}
	</script>
  </head>
  <body id="page-top">

    <!-- Navigation -->
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
              <a class="nav-link js-scroll-trigger" href="#regis">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	<header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Your Favorite Cheesecake company has come</strong>
            </h1>
          </div>
          <div class="col-lg-8 mx-auto">
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Our Products</a>
          </div>
        </div>
      </div>
    </header>
	<section id="regis" style="padding-top:0px;" class="bg-primary">
		<div class="container">
		<div class="col-lg-12 col-md-6">
			<div id="msg_box">
			<?php
				if($msg <> ''){
					echo'
					<div class="alert alert-danger">'
					.$msg.'
					</div>';
				}
				if($msg1 <> ''){
					echo'
					<div class="alert alert-danger">'
					.$msg1.'
					</div>';
				}
			?>
			</div>
		</div>
		<div class="col-lg-8 main-center text-center">
					<form method="post" action="register.php" onsubmit="return checkList(this)">
						<div class="row">
						<div class="form-group col-lg-6">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-lg-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>
				
						<div class="form-group col-lg-6">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group col-lg-6">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>
						<div class="form-group col-lg-6">
							<label for="username" class="cols-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-home fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="address" id="address"  placeholder="Enter your Address"/>
								</div>
							</div>
						</div>
						<div class="form-group col-lg-6">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group col-lg-6">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>
						<div class="row center">
							<div>
								<button type="submit" name="regis" class="btn btn-outline-primary btn-lg btn-block login-button" onclick="checkList()">Register</button>
							</div>
							<div>
								<a href="login.php"><button type="button" class="btn btn-outline-primary btn-lg btn-block login-button">Login</button></a>
							</div>
						</div>
						</div>
					</form>
		</div>
		<div class ="col-lg-2">
		</div>
		</div>
	</section>
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