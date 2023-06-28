<?php
// Create a new cURL resource
$curl = curl_init();

if (!isset($_GET['url']) || empty($_GET['url'])) {
    echo 'Please enter a URL';
    exit;
}else{
    $url = $_GET['url'];
    // Set the cURL options
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (only for testing purposes)

    // Execute the cURL request
    $response = curl_exec($curl);

    // Check for cURL errors
    if(curl_errno($curl)) {
        echo 'cURL error: ' . curl_error($curl);
        // You can handle the error as per your requirement
    }

    // Close the cURL resource
    curl_close($curl);

    // Print the response as HTML
    echo $response;
}

?>
