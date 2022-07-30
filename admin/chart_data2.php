<?php

session_start();

//include_once 'insertsensordata2.php';

if (isset($_SESSION['username'])=="admin") {

  require_once 'Config.php';
  $conn=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  if(!$conn)
    echo "Error: Unable to connect to MYSQL";

    $result=mysqli_query($conn,"SELECT date1, AVG(density1) d1, AVG(density2) d2, AVG(density3) d3, AVG(density4) d4 FROM `graph_status` GROUP By `date1` ORDER BY `date1`");
    
	  $jsonArray = array();

	  if (mysqli_num_rows($result) > 0) {

      while($row=mysqli_fetch_array($result)) {
  	
        $jsonArray1 = array();
        
        $jsonArray1['date'] = $row['date1'];
    		$jsonArray1['density1'] = $row['d1'];
    		$jsonArray1['density2'] = $row['d2'];
        $jsonArray1['density3'] = $row['d3'];
        $jsonArray1['density4'] = $row['d4'];
        
        array_push($jsonArray, $jsonArray1);
      }
	}

	//set the response content type as JSON
	header('Content-type: application/json');
	//output the return value of json encode using the echo function. 
	$data = json_encode($jsonArray);
  echo $data;
}
else
{
  $msg = "You can not access";
  header("location: login.php?er=4");
}                                       
?>