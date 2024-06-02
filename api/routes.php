<?php
include 'auth.php';
include 'database.php';
# Preflight Check
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: *"); # Allow all external connections
    header("Access-Control-Max-Age: 60"); # Keep connections open for 1 minute

    if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
        header("Access-Control-Allow-Methods: POST, OPTIONS"); # Only allow these kinds of connections
        header("Access-Control-Allow-Headers: Authorization, Content-Type, Accept, Origin, cache-control");
        http_response_code(200); # Report that they are good to make their request now
        die; # Quit here until they send a followup!
    }
}

# Let's prevent anything other than POST requests to go past this point:
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    http_response_code(405); # Report that they were denied access
    die; # End things here.
}


header('Authorization: Basic');

$username = "";
$password = "";

function check_auth()
{
    $headers = getallheaders();
    if (isset($headers['Authorization'])) {
        $base64String = substr($headers['Authorization'], 6);
        $decodedString = base64_decode($base64String);
        list($username, $password) = explode(':', $decodedString);
        print_response("username:" . $username . " password:" . $password);
        die; # Exit
    } else {
        print_response("Authorization header not found");
        die; # Exit
    }
}

function print_response($dictionary = [], $error = "none")
{
    $string = "";

    $string = "{\"error\" : \"$error\",
                    \"command\" : \"$_REQUEST[command]\",
                    \"response\" : " . json_encode($dictionary) . "}";

    echo $string;
}
if (!isset($_REQUEST['command']) or $_REQUEST['command'] === null) {
    echo "{\"error\" : \"missing_data\", \"response\" : {}}";
    die;
}
if (!isset($_REQUEST['data']) or $_REQUEST['data'] === null) {
    print_response([], "missing_data");
    die;
}

$json = json_decode($_REQUEST['data'], true);
if ($json === null) {
    print_response([], "invalid_json");
    die;
}

# Execute our Godot commands:
switch ($_REQUEST['command']) {
    case "get_inventories":
        $score_offset = 0;
        $score_number = 10;
        if (isset($json['score_offset']))
            $score_start = max(0, (int) $json['score_offset']);

        if (isset($json['score_number']))
            $score_number = max(1, (int) $json['score_number']);

        $data = getInventory();
        die("im here");
        if ($data == null) {
            die;
        }
        print_response($data);

        die;
        break;

        # Handle invalid requests:
    default:
        print_response([], "invalid_command");
        die;
        break;
}
