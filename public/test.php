<?php 
	
$con = mysqli_connect('localhost','root','','database_bkcs1');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM event order by timestamp desc limit 5";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
    echo $row['address'];
    echo '|';
    echo $row['event'];
    echo '|';
    echo $row['timestamp'];
    echo '|';
    
}

?>