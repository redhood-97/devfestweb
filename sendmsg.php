<?php
$key = "xxxxxx";
$secret = "xxxxx";
$phone_number="+xxxxx";
//$disaster_type="null";

//$disaster_type =$_POST['disaster_type'];
$region_code =$_POST['region11'];
if($region_code == 1)
{
	$phone_number = "+91xxx";
}
elseif($region_code == 2)
{
	$phone_number = "+91";
}
/*
if($disaster_type == "hurricane")
{
	$message = array("message"=>" A hurricane is expected to hit the city !!! ");
	
}elseif($disaster_type == "storm") {
	
	$message = array("message"=>"A storm is expected to hit the city in n days");
}elseif($disaster_type == "tsunami")
{
	$message = array("message"=>"A tsunami is headed towards the coast in n days. All the residents near the coast are ordered to move to the described panic zones");
	}
*/
$message=$_POST['message11'];
$message=array("message"=>$message);
$user = "application\\" . $key . ":" . $secret;
$data = json_encode($message);
$ch = curl_init('https://messagingapi.sinch.com/v1/sms/'. $phone_number);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_USERPWD,$user);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));


$result = curl_exec($ch);

if(curl_errno($ch)) {
	echo 'Curl error: ' . curl_error($ch);
} else {
	echo $result;
}

curl_close($ch);


?>


<html>
<form action="" method="post">
	<input type="textarea" placeholder="Enter message" name="message11">
	</br>
    </br>
    <input type="textarea" placeholder="Enter region" name="region11">
	<!--<input type="text" placeholder="situation" name="disaster_type"> -->
	<input type="submit" value="send">
</br>
</br>

<img src="map.png" width="145" height="126" alt="Planets" usemap="#planetmap">

<map name="planetmap">
  
</map>

</form>
</html>