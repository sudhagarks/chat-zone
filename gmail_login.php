<?php 
session_start();
include 'dbconnection.php';

if($_REQUEST && !empty($_REQUEST['email'])) {
	$email = $_REQUEST['email'];
	$name = $_REQUEST['name'];
	$user_img = $_REQUEST['user_img'];

	$sql = "SELECT id, email FROM users WHERE email='".$email."'";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		$sql1 = "INSERT INTO users (fullname, email, user_img) VALUES ('".$name."', '".$email."', '".$user_img."')";	
		$conn->query($sql1);
	}

	$_SESSION["fullname"]     = $name;
	$_SESSION["email"]        = $email;
	$_SESSION["is_logged_in"] = true;

	$output = array('status'=>'success', 'message' => 'successfully user logged in');
	echo json_encode($output, false);
	exit();
	
}

?>