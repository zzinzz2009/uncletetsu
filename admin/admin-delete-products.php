<?php
	require_once "../models/Products.php";
	$id = $_REQUEST["id"];
	Products::removeProductImage($id);
	$result	= Products::deleteProduct($id);
	if($result){
		$result = Products::deleteProductWithoutImage($id);
		header("Location:admin-products.php");
	}
	else{
		echo "failed";
	}
?>