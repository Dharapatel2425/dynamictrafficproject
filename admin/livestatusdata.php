<?php
require_once 'Config.php';
$conn=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if(!$conn){
	
	echo "<div class=\"error-code\"></div>";
	echo "<div class=\"error-text\">";
		echo "Error: Unable to connect to MYSQL";   
	echo "</div>";
   
}

$response = array();
$get_data=mysqli_query($conn,"SELECT * FROM signal_mst");
while($row=mysqli_fetch_array($get_data)){
	$response[] = $row;
}

echo json_encode(array("data"=>$response));
?>