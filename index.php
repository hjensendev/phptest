<?php

// Add error handler
set_error_handler(function () {
    throw new Exception('Error when processing');
});


// Validate code before trying to download and process json
$valid_code = getenv('FUNCTION_CODE'); 
$supplied_code = $_GET['code'];

if (empty($supplied_code))
{
    http_response_code(400); // ?code is not supplied
    exit;
}

if ($supplied_code !== $valid_code)
{
    http_response_code(403); // ?code is not valid
    exit;
} 

try {
    DownloadAndProcessJSON()
    http_response_code(204);
} catch (Exception $e) {
    echo $e;
    http_response_code(500);
}

function DownloadAndProcessJSON()
{
    //Execute rest of bussiness logic here...
}

?>
