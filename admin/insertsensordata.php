<?php
include_once 'conn.php';
date_default_timezone_set("Asia/Kolkata");
/*$url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 10;URL=$url1");*/

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "http://dweet.io/get/latest/dweet/for/Traffic");

$data=curl_exec($ch);

curl_close($ch);


$json = json_decode($data , true);

/*$data="{
	\"this\":\"succeeded\",
	\"with\":404,
	\"because\":\"we couldn't find this\"
}";
$json = json_decode($data , true);*/

$this_result = $json["this"];
//echo "response: ".$this_result." ";
if($this_result == "succeeded")
{
   	/*$data1="{
	\"this\":\"succeeded\",
	\"by\":\"getting\",
	\"the\":\"dweets\",
	\"with\": [{
				\"thing\":\"Traffic\",
				\"created\":\"2018-03-09T10:26:26.326Z\",
				\"content\": {  \"D1\":2,\"D2\":3,\"D3\":1,\"D4\":4,\"T\":5,\"F\":0 }
			}]
	}";
	$json = json_decode($data1 , true);*/
	
	//echo " ".$json["this"];
	//echo " ".$json["by"];
	//echo " ".$json["the"];

	$data2 = json_encode($json["with"][0]);
	$json2 = json_decode($data2,true);
	
	//echo " ".$json2["thing"]; 
	//echo " ".$json2["created"];
	$date = date("Y-m-d");
	$time = date("h:i:sa");
	
	$status_time = $json2["created"];

	$json3 = json_decode(json_encode($json2["content"]),true); 

	//echo " ".$json3["D1"]." ".$json3["D2"]." ".$json3["D3"]." ".$json3["D4"]." ".$json3["T"]." ".$json3["F"];
	
	$d1=$json3["D1"]; $d2=$json3["D2"]; $d3=$json3["D3"]; $d4=$json3["D4"]; $timing=$json3["T"]; $fault=$json3["F"];
	
	$sqlQuery = "INSERT INTO dummy_status(signal_id,status_time,date1,time1,density1,density2,density3,density4,sensor_fault) VALUES ('S2','$status_time','$date','$time', $d1,$d2,$d3,$d4,$fault)";
	$result=mysqli_query($conn,$sqlQuery);
	if($result)
	{
		$successmsg= "Data Inserted Successfully...!!!";
		echo $successmsg;
	}
	else
	{
		$errormsg= "Data not Inserted...!!!";
		echo $errormsg;
	}

}
else if($this_result == "failed")
{
	$page_error="404 we couldn't find this!";
	echo $page_error;
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