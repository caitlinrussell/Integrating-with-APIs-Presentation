<?php
$connectUrl = "https://jsonplaceholder.typicode.com/posts";
$data = array(
	"userId" => 3,
	"title" => "POSTing with cURL",
	"body" => "It was easy!"
);

// Initalize the handler
$curlHandler = curl_init();

// Set connection URL
curl_setopt($curlHandler, CURLOPT_URL, $connectUrl);

// Set the POST body
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, json_encode($data));

// Execute the call
curl_exec($curlHandler);

curl_getinfo($curlHandler);


// Close the handler
curl_close($curlHandler);