<?php 
// check user and password
$crypt_pass = User::encryptPassword($_SESSION["session_user_passwd"]);
$result     = User::checkLogin($_SESSION["session_user_email"],$crypt_pass);
$row        = mysql_fetch_array($result);
?>
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="admin-news.php">Uncle Tetsu</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="admin-update-passwd.php"><?php echo $row["name"];?></a></li>
            <li><a href="../logout.php">Logout</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>