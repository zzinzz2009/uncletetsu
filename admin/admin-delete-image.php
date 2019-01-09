<?php
	require_once "../models/Products.php";
	$id  = $_REQUEST["id"];
	$name= $_REQUEST["tmp"];
	$result	= Products::removeProductImageWithName($id,$name);
	if($result){
		header("Location:admin-update-products-image.php?id=$id");
	}
	else{
		echo "failed";
	}
?>