<?php
	require_once "_check.php";
	require_once "../models/setting.php";
	require_once "../models/Products.php";
	if(isset($_POST["btn_submit"])){
		$name = mysql_real_escape_string(trim($_POST["name"]));
		$price= mysql_real_escape_string(trim($_POST["price"]));
		$desc = mysql_real_escape_string(trim($_POST["desc"]));
		if($name && $price && $desc){
			$result = Products::insertProducts($name,$desc,$price);
			if($result){
				$lastest_product = Products::getLastestProductID();
				$lastest_id      = $lastest_product['id'];
				$msg  = '<div class="alert alert-success" role="alert">Success to add product. <a href="admin-upload-products-image.php?id='.$lastest_id.'">Upload Image!</a></div>';
			}
			else{
				$msg  = '<div class="alert alert-danger" role="alert">Failed to add product!</div>';
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin::<?php $active = "Add Product"; echo $active; ?></title>
    <?php include_once "_meta.php";?>
    <script type="text/javascript" src="../lib/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="../editor/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../editor/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="../editor/ckeditor/config.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <?php include_once "_header.php";?>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include_once "_left.php";?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Add new product</h1>
          <?php 
            if(isset($msg)) echo $msg;
          ?>
          <div class="row">
              <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                <div class="form-group col-lg-12">
					<label>Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product name" name="name" required autofocus>
                </div>
				<div class="form-group col-lg-12">
					<label>Price</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Product price" name="price" required autofocus>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <!--<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mô tả" name="desc" required>-->
                  <textarea class="jquery_ckeditor form-control" name="desc" cols="80" rows="1" placeholder="Description"></textarea>
                </div>
                <input class="btn btn-large btn-primary" type="submit" name="btn_submit" value="Submit">
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include_once "_script.php";?>
  </body>
</html>