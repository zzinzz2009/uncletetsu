<?php
require_once "_check.php";
require_once "../models/setting.php";
require_once "../models/Products.php";
$id   = $_REQUEST["id"];
$get  = Products::getProductsInfo($id);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin::<?php $active = "Add Product"; echo $active; ?></title>
    <?php include_once "_meta.php";?>
    <script src="../lib/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../lib/uploadify/uploadify.css">
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
          <h1 class="page-header">Include images</h1>
          <div class="row placeholders">
              <h1>Upload image for"<?php echo $get["name"];?>" </h1>
                <form>
                  <div id="queue"></div>
                  <input id="file_upload" name="file_upload" type="file" multiple="true">
                </form>

                <script type="text/javascript">
                  <?php $timestamp = time(); ?>
                  $(function() {
                    $('#file_upload').uploadify({
                      'formData'     : {
                        'timestamp' : '<?php echo $timestamp;?>',
                        'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                      },
                      'swf'      : '../lib/uploadify/uploadify.swf',
                      'uploader' : 'uploadify.php<?php echo "?id=$id";?>'
                    });
                    
                  });
                  
                </script>
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
