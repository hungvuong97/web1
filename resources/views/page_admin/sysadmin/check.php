<?php
	$checkbox ="";
	$checkbox = $_POST['checkbox']; // Lấy giá trị action
	//dd($checkbox);	
//	$conn = mysqli_connect('localhost', 'root','','bkcs');
	
	for($i=0; $i<count($checkbox); $i++){
		echo $check[$i];
	}


?>