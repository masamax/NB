<?php

require_once("nbConf.php");

$pplID = $_REQUEST['id'];
$apiURL = '/api/v1/people/'.$pplID;
$url = $nbURL.$apiURL.'?access_token='.$nbToken;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, '10');
$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response, true);
print_r($response);

?>
