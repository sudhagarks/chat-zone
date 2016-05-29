<?php 
session_start();
include 'dbconnection.php';

if($_REQUEST && !empty($_REQUEST['email'])) {
	$email = $_REQUEST['email'];
	$name = $_REQUEST['name'];
	$user_img = !empty($_REQUEST['user_img']) ? $_REQUEST['user_img'] : '';

	$sql = "SELECT id, email FROM users WHERE email='".$email."'";
	$result = $conn->query($sql);
        if($result){
            while($row = $result->fetch_assoc()) {
                $ins_user_id = $row['id'];
            }
        }
        if ($result->num_rows == 0) {
            $sql1 = "INSERT INTO users (fullname, email, user_img) VALUES ('".$name."', '".$email."', '".$user_img."')";	
            //$conn->query($sql1);
            mysqli_query($conn,$sql1);
            $ins_user_id = mysqli_insert_id($conn);
        }
        $_SESSION['USERID'] = $ins_user_id;
	$_SESSION["fullname"]     = $name;
	$_SESSION["email"]        = $email;
	$_SESSION["is_logged_in"] = true;

	$output = array('status'=>'success', 'message' => 'successfully user logged in');
	echo json_encode($output, false);
	exit();
	
}

?>