<?php

include_once 'conn.php';
/*$url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 10;URL=$url1"); */

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "http://dweet.io/get/latest/dweet/for/Traffic");
$data=curl_exec($ch);
curl_close($ch);

$json = json_decode($data , true);

// $data="{
// 	\"this\":\"succeeded\",
// 	\"with\":404,
// 	\"because\":\"we couldn't find this\"
// }";
// $json = json_decode($data , true);

$this_result = $json["this"];
echo "response: ".$this_result." ";

if($this_result == "succeeded")
{

	// $data1="{
	// \"this\":\"failed\",
	// \"by\":\"getting\",
	// \"the\":\"dweets\",
	// \"with\": [{
	// 			\"thing\":\"Traffic\",
	// 			\"created\":\"2018-03-25T10:26:26.326Z\",
	// 			\"content\": {  \"D1\":1,\"D2\":1,\"D3\":1,\"D4\":1,\"T\":5,\"F\":0 }
	// 		}]
	// }";
	// $json = json_decode($data1 , true);
	
	//echo " ".$json["this"];
	//echo " ".$json["by"];
	//echo " ".$json["the"];

	$data2 = json_encode($json["with"][0]);
	
	$json2 = json_decode($data2,true);
	
	//echo " ".$json2["thing"]; 
	//echo " ".$json2["created"];

	$json3 = json_decode(json_encode($json2["content"]),true); 
	
	//echo " ".$json3["D1"]." ".$json3["D2"]." ".$json3["D3"]." ".$json3["D4"]." ".$json3["T"]." ".$json3["F"];
	
	$d1=$json3["D1"]; $d2=$json3["D2"]; $d3=$json3["D3"]; $d4=$json3["D4"]; $timing=$json3["T"]; $fault=$json3["F"];
	
	if($fault==0){
		$sensor_status = 'ON';//on
	}
	else {
		$sensor_status = 'OFF';
		$sensor_id = $fault;
	}
	
	$signal_status= 'ON';

	$sqlQuery = "UPDATE signal_mst SET density1 = $d1 , density2 = $d2 , density3 = $d3 , density4 = $d4 , sensor_fault = $fault , signal_status = '$signal_status' WHERE signal_id='S2'";
	
	$result=mysqli_query($conn,$sqlQuery);
	
	if($result)
	{
		$successmsg= "Data Updated Successfully...!!!";
		echo $successmsg;

		if($fault !=0) {
			
			$sqlQuery2 = "UPDATE sensor_mst SET sensor_status = '$sensor_status' WHERE signal_id='S2' AND sensor_id= '$sensor_id' ";
			$result2=mysqli_query($conn,$sqlQuery2);
			
			if($result2)
			{
				$successmsg= "Sensor Data Updated Successfully...!!!";
				echo $successmsg;

			}
			else
			{
				$errormsg= "Sensor Data not updated...!!!";
				echo $errormsg;
			}	
		}
		else {
			
			$successmsg= "No Sensor Fault...!!!";
			echo $successmsg;
			
			$sqlQuery3 = "UPDATE sensor_mst SET sensor_status = '$sensor_status' WHERE signal_id='S2'";
			$result3=mysqli_query($conn,$sqlQuery3);
			
			if($result3)
			{
				$successmsg= "All Sensor Active...!!!";
				echo $successmsg;

			}
			else
			{
				$errormsg= "Not updated...!!!";
				echo $errormsg;
			}
		}
		
	}
	else
	{
		$errormsg= "Data not updated...!!!";
		echo $errormsg;
	}


}
else if($this_result == "failed")
{
	$page_error="404 we couldn't find this!";
	echo $page_error;
	$signal_status = 'OFF';
	$sqlQuery2 = "UPDATE signal_mst SET signal_status = '$signal_status' WHERE signal_id='S2'";
	$result2=mysqli_query($conn,$sqlQuery2);
	
	if($result2)
	{
		$successmsg= "Signal Status Updated Successfully...!!!";
		echo $successmsg;	
	}
	else
	{
		$errormsg= "Signal Status not updated...!!!";
		echo $errormsg;
	}
}


?>


<!--
{
	"this":"failed",
	"with":404,
	"because":"we couldn't find this"
}
{
	"this":"succeeded",
	"by":"getting",
	"the":"dweets",
	"with": [{
				"thing":"Traffic",
				"created":"2018-03-09T10:26:26.326Z",
				"content": {  "D1":1,"D2":1,"D3":1,"D4":1,"T":5,"F":0 }
			}]
}
-->