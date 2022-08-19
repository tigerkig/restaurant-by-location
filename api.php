<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://worldwide-restaurants.p.rapidapi.com/reviews",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "location_id=15333482&language=en_US&limit=15&currency=USD",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: worldwide-restaurants.p.rapidapi.com",
		"X-RapidAPI-Key: 67fdd0d770msh5c423f841fd915ep1672bbjsnd1a530ce3ac2",
		"content-type: application/x-www-form-urlencoded"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}