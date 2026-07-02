<?php

$cainfo = ini_get('curl.cainfo');
if (empty($cainfo)) {
    // Try standard locations based on OS
    if (DIRECTORY_SEPARATOR === '\\') {
        $cainfo = 'C:\cacert.pem'; // Windows path
    } else {
        $cainfo = '/etc/ssl/certs/ca-certificates.crt';  // Linux
        if (!file_exists($cainfo)) {
            $cainfo = '/etc/pki/tls/certs/ca-bundle.crt'; // RHEL/CentOS
        }
    }
}

//require("key.php");
require_once(__DIR__ . '/key.php');

//Uncomment below if you wish to enable authentication
//require("login.php");

$lib_id = isset($_GET['lib_id']) ? $_GET['lib_id'] : '';
// For setup/debugging, you can temporarily hardcode a library ID here (example: 'hsse').
//$lib_id = 'RCL_RRL';
if ($lib_id === '') {
	http_response_code(400);
	echo json_encode(array('error' => 'Missing lib_id'));
	exit;
}
if (!preg_match('/^[A-Za-z0-9_-]+$/', $lib_id)) {
	http_response_code(400);
	echo json_encode(array('error' => 'Invalid lib_id. Allowed characters: letters, numbers, underscore, hyphen.'));
	exit;
}
$ch = curl_init();
$url = 'https://api-na.hosted.exlibrisgroup.com/almaws/v1/conf/libraries/' . urlencode($lib_id) . '/locations';
$queryParams = '?' . urlencode('lang') . '=' . urlencode('en') . '&' . urlencode('apikey') . '=' . ALMA_SHELFLIST_API_KEY;
curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);

// Check if cURL failed at all (network, timeout, etc.)
if (curl_errno($ch)) {
    $error = curl_error($ch);
    curl_close($ch); // Close again just in case
    http_response_code(503); 
    echo json_encode(array('error' => 'cURL Connection Error: ' . htmlspecialchars($error)));
    exit;
}

// If the API returns an HTTP error (like 400, 401, 404), cURL will still return the body.
// We need to check the actual HTTP status code returned by the server.
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code !== 200) {
    http_response_code($http_code);
    // If it's a known client error (4xx), we report the API message.
    if (strpos($http_code, '4') === 0) {
        echo json_encode(array('error' => "API Error {$http_code}: The request was bad.", 'details' => $response));
    } else {
        // For server errors (5xx), report a generic failure.
        echo json_encode(array('error' => "Server API Failure: Status Code {$http_code}", 'details' => $response));
    }
    exit;
}

$xml_result = simplexml_load_string($response);

// PARSE RESULTS
$locations = [];
foreach($xml_result->location as $location)
{
	$location_obj = new stdClass();
	$location_obj->code = (string) $location->code;
	$location_obj->name = (string) $location->name;
	//Add this loation to the array of locations using the unique location code as the index value
  $locations[trim($location->code)] = $location_obj;
}
//strip top level unique id from array
$out = array_values($locations);
$main = array('locationData'=>$out);
echo json_encode($main);
?>
