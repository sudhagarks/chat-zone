<?php 
	session_start();
	include 'dbconnection.php';

	if($_SESSION && isset($_SESSION['is_logged_in'])){
		header('Location: /chat-zone/index.php');
	}

	$nameErr = $emailErr = $pwdErr = "";
	if($_REQUEST) {
		$run = true;
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "Only letters and white space allowed"; 
				$run = false;
			}
		}
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format"; 
				$run = false;
			}
		}
		$password   = $_REQUEST['password'];
		$repassword = $_REQUEST['repassword'];
		if($run && $password == $repassword){
			$sql = "INSERT INTO users (fullname, password, email) VALUES ('".$name."', '".$password."', '".$email."')";
			$result = $conn->query($sql);
			$_SESSION["fullname"]     = $name;
			$_SESSION["email"]        = $email;
			$_SESSION["is_logged_in"] = true;
			header('Location: /chat-zone/index.php');
		}else{
			$pwdErr = "Password is wrong";
		}
	}

	function test_input($data) {
		$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	  	return $data;
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
	<!-- Google Login -->
	<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
	<meta name="google-signin-client_id" content="500096944978-99393b2kmjehngsir5ocbdpai7h4bmaa.apps.googleusercontent.com">
</head>
<body class="login-page">
	<div class="container">
		<div class="wrapper">
			<form action="" method="post" name="Login_Form" class="form-signin">       
			    <h3 class="form-signin-heading">Sign Up</h3>
					<hr class="colorgraph"><br>

					<input type="text" class="form-control" name="name" placeholder="name" required="" autofocus="" /> 
					<span class="error"><?php echo $nameErr;?></span>
					<input type="text" class="form-control" name="email" placeholder="email" required="" autofocus="" />
					<span class="error"><?php echo $emailErr;?></span>
					<input type="text" class="form-control" name="user_img" style="display: none" />
					<input type="text" class="form-control" name="gmail_login" style="display: none" />
					<input type="password" class="form-control" name="password" placeholder="password" required=""/>  
					<span class="error"><?php echo $pwdErr;?></span>
					<input type="password" class="form-control" name="repassword" placeholder="confirm password" required=""/>     		  
					<button class="btn btn-lg btn-primary btn-block btn-blocksss"  name="Submit" value="Login" type="Submit">SignUp</button>  

					<div class="social-auth-links text-center" style="margin-bottom: 15px;">
						<div id="my-signin2"></div>
					</div>	
					<a href="login.php" class="text-center">I already have a account</a>
			</form>		

		</div>
	</div>
</body>

<script type="text/javascript">

	function onSuccess(googleUser) {
      	var profile = googleUser.getBasicProfile();
		var data = {
			"name"        : profile.getName(),
			"user_img"    : profile.getImageUrl(),
			"email"       : profile.getEmail(),
			"gmail_login" : true
		}

		console.log('user data: ' + JSON.stringify(data));
		$.ajax({
	        url  : '/chat-zone/gmail_login.php',
	        type : 'POST',
	        data : data,
	        success: function(data, status){
	        	var data = JSON.parse(data);
	        	console.log(data);
	        	if(data.status == 'success'){
	        		window.location = "/chat-zone/index.php";
	        	}else{
	        		alert(data.message);
	        	}
	        },
	        error: function(xhr, desc, err) {
	          console.log('ajax error', xhr);
	      
	        }
      	});
    }

    function onFailure(error) {
      console.log(error);
    }

    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope'    : 'profile email',
        'width'    : 240,
        'height'   : 50,
        'longtitle': true,
        'theme'    : 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
</script>

</html>