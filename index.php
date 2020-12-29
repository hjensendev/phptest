<?php



// Validate code before trying to download and process json
$valid_code = getenv('FUNCTION_CODE'); 
echo "<p>1</p>";
$supplied_code = $_GET['code'];
echo "<p>2</p>";
if (empty($supplied_code))
{
    echo "<p>3</p>";
    http_response_code(403); // ?code is not supplied
    echo "<p>4</p>";
    exit;
}

if ($supplied_code !== $valid_code)
{
    http_response_code(403); // ?code is not valid
    exit;
} 

try {
    DownloadAndProcessJSON();
    http_response_code(204);
    exit;
} catch (Exception $e) {
    echo $e;
    http_response_code(500);
    exit;
}

function DownloadAndProcessJSON()
{
    //Execute rest of bussiness logic here...
}

?>
