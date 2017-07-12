<?php 
	include('banner.php'); 	
	$displayImage = Banner::displayImage();
	header('Content-Type: application/json');
	echo json_encode($displayImage);
?>