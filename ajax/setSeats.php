<?php require '../config.php'; 
	$el= $_GET['sel'];
	$movie= $_GET['movie'];
	$date= $_GET['dateof'];
	// // echo $el;

	$_SESSION['seats'][$date][$movie]=[];
	foreach ($el as $key => $value) {
		$_SESSION['seats'][$date][$movie][$key]= $value;
	}

	
?>