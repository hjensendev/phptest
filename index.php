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
    ProcessStuff()
    http_response_code(204);
} catch (Exception $e) {
    echo $e;
    http_response_code(500);
}

function ProcessStuff()
{
    $END_POINT = get_env_name('SAS_URL') . get_env_token('SAS_TOKEN');
    $query_param = $_SERVER['QUERY_STRING'] === get_env_token('SAS_TOKEN');
    $json_data = @file_get_contents($END_POINT);
    $GLOBALS['consultants_data'] = json_decode($json_data, TRUE);
    //Execute rest of bussiness logic here...
}

?>
