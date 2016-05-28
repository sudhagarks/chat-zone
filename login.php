<?php 
	session_start();
	include 'dbconnection.php';
	// if($_GET && $_GET['link'] && $_GET['link'] == 'logout'){
	// 	session_destroy();
	// }
	if($_SESSION && $_SESSION['is_logged_in']){
		header('Location: /chat-zone/index.php');
	}

	if($_REQUEST && !empty($_REQUEST['email'] && !empty($_REQUEST['password']))) {
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		// $receiver_data  = array('email' => $email, 'password' => $password);
		// $output = array('status'=>'failed', 'message' => 'Something went wrong','receiver_data' => $receiver_data);

		$sql = "SELECT * FROM users WHERE email='".$email."' AND password='".$password."'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			$_SESSION["is_logged_in"] = true;
			while($row = $result->fetch_assoc()) {
		        $_SESSION["fullname"] = $row["fullname"];
				$_SESSION["email"]    = $row["email"];
				$_SESSION["user_img"] = $row["user_img"];
		    }
	
			header('Location: /chat-zone/index.php');
		} else {
			session_destroy();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat Zone - SignIn</title>
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
<?php include 'dbconnection.php';?>

	<div class="container">
		<div class="wrapper">
			<form action="" method="post" name="Login_Form" class="form-signin">       
			    <h3 class="form-signin-heading">Sign In</h3>
		 		 <hr class="colorgraph"><br>
				  
				<input type="text" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
				<input type="password" class="form-control" name="password" placeholder="Password" required=""/>     		  
				 
				  <button class="btn btn-lg btn-primary btn-block btn-blocksss"  name="Submit" value="Login" type="Submit">Login</button>  

				  <div class="social-auth-links text-center" style="margin-bottom: 15px;">
    
     			 <div id="my-signin2" data-with="100%" data-background-color="#dd4b39"></div>
   				 </div>	
				<a href="signup.php" class="text-center">Register a new membership</a>
			</form>		
		</div>
	</div>

<style type="text/css">

</style>
</body>
<script type="text/javascript">
	function onSuccess(googleUser) {
      // console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
      	var profile = googleUser.getBasicProfile();
		var data = {
			"google_id" : profile.getId(),
			"name" : profile.getName(),
			"user_img" : profile.getImageUrl(),
			"email" : profile.getEmail(),
			"gmail_login" : true
		}

		console.log('user data: ' + JSON.stringify(data));
		$.ajax({
	        url: '/chat-zone/gmail_login.php',
	        type: 'POST',
	        data: data,
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
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }

	function signOut() {
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut().then(function () {
			console.log('User signed out.');
		});
  	}
</script>
</html>