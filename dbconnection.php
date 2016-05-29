<?php
include 'session_ctrl.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatzone";

// session_start();

$_SESSION['USERID'] = 2;

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
    $result->close();
    return $countRows;
}




?>