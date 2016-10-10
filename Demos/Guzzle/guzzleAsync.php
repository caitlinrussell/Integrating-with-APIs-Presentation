<?php
require 'vendor/autoload.php';

// Create a new Guzzle client
$guzzleClient = new GuzzleHttp\Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com'
]);

// Create a new async GET request
$promise = sendAsyncRequest("/posts/1", $guzzleClient);
$promise2 = sendAsyncRequest("/posts/2", $guzzleClient);

// Do something else while that's working its magic
echo "Working...";

$response = \GuzzleHttp\Promise\unwrap(array($promise, $promise2));

foreach ($response as $responseItem) {
    echo $responseItem->getBody();
}

/**
* This function creates the async call
* It will return the promise object immediately,
* without waiting for the response
*
* @param string $endpoint The API endpoint to hit
*
* @return GuzzleHttp\Promise $promise The promise
*/
function sendAsyncRequest($endpoint, $client) {
    $promise = $client->requestAsync(
            "GET",
            $endpoint
    )->then (
        // If the async request succeeded
        function ($result) {
            return $result;
        },
        // If the async request failed
        function ($reason) {
            error_log("Async call failed: " . $reason->getMessage());
        }
    );
    return $promise;
}