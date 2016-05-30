<?php
include 'session_ctrl.php';
$configs = parse_ini_file("config.ini");
$SITE_CONFIGS = $configs;

$servername = $configs['DB_HOST'];
$username = $configs['DB_USER'];
$password = $configs['DB_PASSWORD'];
$dbname = $configs['DB_CHAT'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function get_count($query){
    global $conn;
    $result = $conn->query($query);
    $countRows = $result->num_rows;
    return $countRows;
}
?>
