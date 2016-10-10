<?php

// Create a new Guzzle client
$guzzleClient = new GuzzleHttp\Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com'
]);

// Create a new async GET request
$promise = $guzzleClient->requestAsync(
            "GET",
            "/posts/1"
)->then (
	// If the async request succeeded
    function ($result) {
        echo $result->getBody()->getContents();
    },
    // If the async request failed
    function ($reason) {
        error_log("Async call failed: " . $reason->getMessage());
    }
);

// Do something else while ^^^ is working its magic
echo "Working...";

