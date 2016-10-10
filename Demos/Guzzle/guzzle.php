<?php
require 'vendor/autoload.php';

// Create a new Guzzle client
$guzzleClient = new GuzzleHttp\Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com'
]);

$body = array(
	"userId" => 3,
	"title" => "POSTing with cURL",
	"body" => "It was easy!"
);


// Create a new POST
$guzzleResult = $guzzleClient->request(
            "POST", 
            "/posts", 
            ['body' => json_encode($body)]
        );

echo $guzzleResult->getStatusCode() . "\n";
echo $guzzleResult->getBody()->getContents();