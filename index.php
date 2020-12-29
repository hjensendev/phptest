<?php


$valid_code = getenv('FUNCTION_CODE'); 
$supplied_code = $_GET['code'];

set_error_handler(function () {
    throw new Exception('Error when processing');
});

if (empty($supplied_code))
{
    http_response_code(400);
    exit;
}


if ($supplied_code !== $valid_code)
{
    http_response_code(403);
    exit;
} 



try {
    //Process stuff
    $a = 5;
    $b = 0;
    $c = $a/$b;
    http_response_code(204);
} catch (Exception $e) {
    echo $e;
    http_response_code(500);
}



// $END_POINT        = get_env_name('SAS_URL') . get_env_token('SAS_TOKEN');
// $json_data        = @file_get_contents($END_POINT);
// $GLOBALS['consultants_data'] = json_decode($json_data, TRUE);

// $query_param    = $_SERVER['QUERY_STRING'] === get_env_token('SAS_TOKEN');
// $automation_url = $_SERVER["REQUEST_URI"] === '/automation/update-cv-data/';

// if ($json_data === FALSE) {
//     status_header(500, 'Internal Server Error');
//     echo '<h1>500 Internal Server Error</h1>';
// } else if($query_param) {
//     // Denne status koden status_header() 204 får jeg problemer på Postman
//     status_header(204, 'No Content');
//     echo '<h1>204 No Content</h1>';    
// } else if ($automation_url) {
//     include_once(get_theme_file_path('./includes/back-end/register_users.php'));
//     status_header(200, 'OK');
//     echo '<h1>200 OK</h1>';    
// } else if($_SERVER['QUERY_STRING']) {
//     status_header(400, 'Bad Request');
//     echo '<h1>400 Bad Request</h1>';
// } else if (count($_GET) !== 0) {
//     status_header(403, 'Forbidden');
//     echo '<h1>403 Forbidden</h1>';
// } else {
//     status_header(404, 'Not Found');
//     echo '<h1>404 Not Found</h1>';    
// }

?>
