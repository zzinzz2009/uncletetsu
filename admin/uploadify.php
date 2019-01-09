<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/
require_once "../models/Products.php";
//require_once "_check.php";
$id 	= $_REQUEST["id"];
// Define a destination
$targetFolder = '/uncletetsu.com/img'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	$photoLink = mysql_real_escape_string('../img/'.$_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		Products::insertProductsImg($id,$photoLink,$_FILES['Filedata']['name']);
	} else {
		echo 'Invalid file type.';
	}
}
?>