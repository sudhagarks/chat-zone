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
</head>
<body class="login-page">
<?php include 'dbconnection.php';?>

	<div class="container">
		<div class="wrapper">
			<form action="" method="post" name="Login_Form" class="form-signin">       
			    <h3 class="form-signin-heading">Sign In</h3>
		 		 <hr class="colorgraph"><br>
				  
				  <input type="text" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
				  <input type="password" class="form-control" name="Password" placeholder="Password" required=""/>     		  
				 
				  <button class="btn btn-lg btn-primary btn-block btn-blocksss"  name="Submit" value="Login" type="Submit">Login</button>  

				  <div class="social-auth-links text-center" style="margin-bottom: 15px;">
    
     			 <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google</a>
   				 </div>	
				<a href="signup.php" class="text-center">Register a new membership</a>
			</form>		
		</div>
	</div>

<style type="text/css">

</style>
</body>
</html>