<?php
# Preflight Check
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: *"); # Allow all external connections
    header("Access-Control-Max-Age: 60"); # Keep connections open for 1 minute


    # Check if a site is requesting access to the site:
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
        // print_response($headers['Authorization']);
        // list($a, $b) = explode(":", $headers['Authorization']);
        // print_response($a + $b);

        $base64String = substr($headers['Authorization'], 6);

        // Decode the Base64 string
        $decodedString = base64_decode($base64String);

        // Split the decoded string into username and password
        list($username, $password) = explode(':', $decodedString);
        print_response("username:" . $username . " password:" . $password);
        die; # Exit
    } else {
        print_response("Authorization header not found");
        die; # Exit
    }
    // $authHeader = null;
    // if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    //     $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
    //     print_response($authHeader);
    //     die; # Exit
    // } elseif (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
    //     $authHeader = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
    //     print_response($authHeader);
    //     die; # Exit
    // } else {
    //     print_response($_SERVER);
    //     die; # Exit
    // }
}

function print_response($dictionary = [], $error = "none")
{
    $string = "";

    # Convert our dictionary into a JSON string:
    $string = "{\"error\" : \"$error\",
                    \"command\" : \"$_REQUEST[command]\",
                    \"response\" : " . json_encode($dictionary) . "}";

    # Print out our json to Godot!
    echo $string;
}

# Make sure our command is sent properly:
if (!isset($_REQUEST['command']) or $_REQUEST['command'] === null) {
    echo "{\"error\" : \"missing_data\", \"response\" : {}}";
    die;
}

# Make sure our data is sent, even if empty:
if (!isset($_REQUEST['data']) or $_REQUEST['data'] === null) {
    print_response([], "missing_data");
    die;
}

# Set connection properties for our database:
$sql_host = "localhost";    # Where our database is located
$sql_db = "sim-game";          # Name of our database
$sql_username = "root";     # Login username for our database
$sql_password = "";          # Login password for our database

# Set up our data in a format that PDO understands:
$dsn = "mysql:dbname=$sql_db;host=$sql_host;charset=utf8mb4;port=3306";
$pdo = null;

# Attempt to connect:
try {
    $pdo = new PDO($dsn, $sql_username, $sql_password);
}

# If something went wrong, return an error to Godot:
catch (\PDOException $e) {
    print_response([], "db_login_error");
    die;
}

# Convert our Godot json string into a dictionary:
$json = json_decode($_REQUEST['data'], true);

# Check that the json was valid:
if ($json === null) {
    print_response([], "invalid_json");
    die;
}

# Execute our Godot commands:
switch ($_REQUEST['command']) {

        # Fetch a number of scores from our table:
    case "get_scores":
        // check_auth();
        # Determine which range of scores we want:
        $score_offset = 0;
        $score_number = 10;

        # Check if Godot set some preferences and adjust accordingly:
        if (isset($json['score_offset']))
            $score_start = max(0, (int) $json['score_offset']);

        if (isset($json['score_number']))
            $score_number = max(1, (int) $json['score_number']);

        # Form our SQL request template:
        // $template = "SELECT * FROM `highscores` ORDER BY score DESC LIMIT :number OFFSET :offset";
        $template = "SELECT * FROM `inventory`";

        # Prepare and send the actual request to the database:
        $sth = $pdo->prepare($template);
        $sth->bindValue("number", $score_number, PDO::PARAM_INT);
        $sth->bindValue("offset", $score_offset, PDO::PARAM_INT);
        $sth->execute();

        # Grab all the resulting data from our request:
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);

        # Add the size of our result to the Godot structure:
        $data["size"] = sizeof($data);

        print_response($data);

        die;
        break;

        # Add a score to our table:
    case "add_score":

        # Check if we had a valid nonce:
        # Check that we were given a score and username:
        if (!isset($json['score'])) {
            print_response([], "missing_score");
            die;
        }

        if (!isset($json['username'])) {
            print_response([], "missing_username");
            die;
        }

        # Make sure our username is under 24 characters:
        $username = $json['username'];
        if (strlen($username) > 24)
            $username = substr($username, 24);


        # Form our SQL request string:
        $template = "INSERT INTO `highscores` (username, score) VALUES (:username, :score) ON DUPLICATE KEY UPDATE score = GREATEST(score, VALUES(score))";
        // $template = "INSERT INTO `highscores` (username, score) VALUES (username, score)";


        # Prepare and send the request to the DB:
        $sth = $pdo->prepare($template);
        $sth->execute(["username" => $username, "score" => $json['score']]);

        # Print back an empty response saying there was no issue:
        print_response();
        die;
        break;

        # Handle invalid requests:
    default:
        print_response([], "invalid_command");
        die;
        break;
}
