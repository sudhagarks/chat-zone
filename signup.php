<?php include 'dbconnection.php';
	if($_REQUEST && !empty($_REQUEST['email'] && !empty($_REQUEST['name']))) {
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$repassword = $_REQUEST['repassword'];
		$user_img = $_REQUEST['user_img'];
		$gmail_login = $_REQUEST['gmail_login'];
		// echo "name"; print_r($name);
		$run = false;
		if($gmail_login){
			$sql = "INSERT INTO users (fullname, password, email, user_img) VALUES ('".$name."', '".$password."', '".$email."', '".$user_img."')";
			$run = true;
		}else{
			if($password == $repassword){
				$sql = "INSERT INTO users (fullname, password, email) VALUES ('".$name."', '".$password."', '".$email."')";
				$run = true;
			}
		}

		$receiver_data  = array(
			'name' => $name,
			'email' => $email,
			'password' => $password,
			'repassword' => $repassword,
			'user_img' => $user_img,
			'gmail_login' => $gmail_login
		);
		$output = array('status'=>'failed', 'message' => 'Something went wrong','receiver_data' => $receiver_data);

		if($run){
			if ($conn->query($sql) === TRUE) {
			   // header( 'Location: index.php' );
				$output = array('status'=>'success', 'message' => 'successfully user created','receiver_data' => $receiver_data);
			}
		}
	    echo json_encode($output, false);
	    exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat Zone - SignUp</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/chat.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body class="login-page">
	<div class="container">
		<div class="wrapper">
			<form action="" method="post" name="Login_Form" class="form-signin">       
			    <h3 class="form-signin-heading">Sign Up</h3>
					<hr class="colorgraph"><br>

					<input type="text" class="form-control" name="name" placeholder="Full Name" required="" autofocus="" /> 
					<input type="text" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
					<input type="text" class="form-control" name="user_img" style="display: none" />
					<input type="text" class="form-control" name="gmail_login" style="display: none" />
					<input type="password" class="form-control" name="password" placeholder="Password" required=""/>  
					<input type="password" class="form-control" name="repassword" placeholder="Retype password" required=""/>     		  
					<button class="btn btn-lg btn-primary btn-block btn-blocksss"  name="Submit" value="Login" type="Submit">SignUp</button>  

					<div class="social-auth-links text-center" style="margin-bottom: 15px;">
					<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
					Google</a>
					</div>	
					<a href="login.php" class="text-center">I already have a membership</a>
			</form>		

		</div>
	</div>
</body>
</html>