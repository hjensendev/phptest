<h1>Test PHP Application</h1>

<?php



$END_POINT      = get_env_name('SAS_URL') . get_env_token('SAS_TOKEN');
$query_param    = $_SERVER['QUERY_STRING'] === get_env_token('SAS_TOKEN');
$automation_url = $_SERVER["REQUEST_URI"] === '/automation/update-cv-data/';

echo "END_POINT:" . $END_POINT;
echo "query_param:" . $query_param;
echo "automation_url:" . $automation_url;

phpinfo(INFO_VARIABLES);
phpinfo(INFO_ENVIRONMENT);

function get_env_name($envname)
{
    return getenv($envname);
}

function get_env_token($envname)
{
    return "?sv=" . get_env_token($envname);
}





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


// $json_data        = @file_get_contents($END_POINT);
// $GLOBALS['consultants_data'] = json_decode($json_data, TRUE);



?>
