<?php
include 'database.php';

# Preflight Check
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Max-Age: 60");

    if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
        header("Access-Control-Allow-Methods: POST, OPTIONS");
        header("Access-Control-Allow-Headers: Authorization, Content-Type, Accept, Origin, cache-control");
        http_response_code(200);
        die;
    }
}

# Let's prevent anything other than POST requests to go past this point:
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    http_response_code(405);
    die;
}

# Set Authorization Header
header('Authorization: Basic');


function check_auth()
{
    global $username, $password;
    $headers = getallheaders();
    if (isset($headers['Authorization']) == null) {
        print_response("Authorization header not found");
        die;
    }
    $base64String = substr($headers['Authorization'], 6);
    $decodedString = base64_decode($base64String);
    list($username, $password) = explode(':', $decodedString);
}

function print_response($message, $dictionary = [], $error = "none")
{
    $string = json_encode([
        "error" => $error,
        "command" => $_REQUEST['command'],
        "message" => $message,
        "data" => $dictionary,
    ]);

    echo $string;
    die;
}

# Initialize Database
$db = new Database();

# Execute our Godot commands:
switch ($_REQUEST['command']) {
    case "get_inventories":
        // list($username, $password) = check_auth();

        $score_offset = 0;
        $score_number = 10;

        if (isset($json['score_offset'])) {
            $score_offset = max(0, (int) $json['score_offset']);
        }

        if (isset($json['score_number'])) {
            $score_number = max(1, (int) $json['score_number']);
        }

        try {
            $data = $db->getInventory();
            print_response("sucess", $data);
        } catch (PDOException $e) {
            print_response([], "database_error");
        }

        break;

    case "login":
        check_auth();
        try {
            $data = $db->login($username, $password);
            if (empty($data)) {
                print_response("error", $data, "username atau password salah");
            }
            print_response("success", $data);
        } catch (PDOException $e) {
            print_response("error", [], "database_error");
        }
        break;

    default:
        print_response([], "invalid_command");
        break;
}
