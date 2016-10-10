<?php
require 'vendor/autoload.php';

// Create a new Guzzle client
$guzzleClient = new GuzzleHttp\Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com'
]);

// Create a new POST
$guzzleResult = $guzzleClient->request(
            "POST", 
            "/posts", 
            ['body' => $requestBody]
        );

$guzzleResult->getStatusCode();
$guzzleResult->getBody()->getContents();

