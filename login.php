<?php
session_start(); 
require_once "models/User.php";
if(isset($_GET["url"])){
	$_SESSION["url"] = $_GET["url"];
}
if(isset($_POST["btn_submit"]))
{
	
  $email  = $_POST["email"];
  $passwd = $_POST["passwd"];
  if ($email && $passwd) {
    $crypt_pass = User::encryptPassword($passwd);
    $result     = User::checkLogin($email,$crypt_pass);
    $row        = mysql_fetch_array($result);
    $num        = mysql_num_rows($result);
    if ($num > 0) {
      $_SESSION["session_user_id"]    = $row["id"];
      $_SESSION["session_user_email"] = $email;
      $_SESSION["session_user_passwd"]= $passwd;
      $_SESSION["session_user_type"]  = $row["type"];
	  if(isset($_SESSION["url"])){
		  $url = $_SESSION["url"];
		  unset($_SESSION["url"]);
		  header('Location:'.$url);
	  }
	  else{
		  header("Location:welcome.php");
	  }
    }
    else{
      $msg = '<p class="text-danger">Invalid email and password</p>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/earth.png">

    <title>Signin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Login Page</h2>
        <label for="inputEmail" class="sr-only">Your email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Your email here" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Your password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Your password here" name="passwd" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn_submit">Login</button>
        <div class="checkbox">
          <label>
            <?php if (isset($msg)) echo $msg; ?>
          </label>
        </div>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
