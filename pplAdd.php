<?php

require_once("nbConf.php");

$apiURL = '/api/v1/people';
$url = $nbURL.$apiURL.'?access_token='.$nbToken;

$data = array(
	'person' => array(
	'email' => $_REQUEST['email'],
	'email_opt_in' => $_REQUEST['optin'],
  ),
);
$json_data = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_TIMEOUT, '10'); 
curl_setopt($ch, CURLOPT_HTTPHEADER, 
array("Content-Type: application/json","Accept: application/json"));
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
$json_response = curl_exec($ch);
curl_close($ch);

$response = json_decode($json_response, true);
print_r($response);

?>
