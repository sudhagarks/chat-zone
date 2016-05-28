<?php include 'dbconnection.php';
    
$sql = "SELECT id, fullname, email, user_img FROM users";
$result = $conn->query($sql);

// echo "<pre>"; print_r($result); 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat Zone</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/chat.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/bootstrap_chosen.css">
</head>
</head>
<body>
<?php include 'header.php';?>

<div class="container">

<div class="row">
  <div class="col-lg-4">

	<div class="list-group">
	 
	  <a href="#" class="list-group-item active">
	  <img class="media-object" src="img/default_user.png" alt="User Name">
	  	<div>
	    <h4 class="list-group-item-heading">S. Arun Kumar</h4>
	    <!-- <p class="list-group-item-text">Add nearly any HTML within, even for linked list groups like the one below.</p> -->
	    </div>
	  </a>

	   <a href="#" class="list-group-item ">
	  <img class="media-object" src="img/default_user.png" alt="User Name">
	  <div>
	    <h4 class="list-group-item-heading">User Name</h4>
	    <!-- <p class="list-group-item-text">Add nearly any HTML within, even for linked list groups like the one below.</p> -->
	    </div>
	  </a>

	   <a href="#" class="list-group-item ">
	  <img class="media-object" src="img/default_user.png" alt="User Name">
	  <div>
	    <h4 class="list-group-item-heading">User Name</h4>
	    <!-- <p class="list-group-item-text">Add nearly any HTML within, even for linked list groups like the one below.</p> -->
	    </div>
	  </a>

	   <a href="#" class="list-group-item ">
	  <img class="media-object" src="img/default_user.png" alt="User Name">
	  <div>
	    <h4 class="list-group-item-heading">User Name</h4>
	    <!-- <p class="list-group-item-text">Add nearly any HTML within, even for linked list groups like the one below.</p> -->
	    </div>
	  </a>

	</div>

  </div><!-- /.col-lg-6 -->



  <div class="col-lg-8">

   <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Direct Chat</h3>

            <button type="submit" id="newmsg" class="btn btn-success btn-flat" style="float: right;"><i class="fa fa-plus"></i> New Message</button>

    <select name="user[]" id="user" data-placeholder="Choose a Users" class="form-control input-sm chosen-select" multiple tabindex="4" style="">
        <?php  if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
            <option value="<?php echo $row["id"]; ?>" ><?php echo $row["fullname"]; ?></option>
        <?php } } ?>
    </select>

            </div>
            <!-- /.box-header -->
            <div enabled="true" class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Alexander Pierce</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img media-object" src="img/default_user.png" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Is this template really for free? That's unbelievable!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">Sarah Bullock</span>
                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img media-object" src="img/default_user.png" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    You better believe it!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
              </div>
              <!--/.direct-chat-messages-->
              
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="#" method="post">
                <div class="input-group">
                  <input name="message" placeholder="Type Message ..." class="form-control" type="text">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>


  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

</div>
</div>
<script src="js/chosen.jquery.js"></script>
<script type="text/javascript">

    $( document ).ready(function() {
        $('.chosen-select').chosen();

    $( "#newmsg" ).click(function() {
        $('.chosen-select').chosen();
        $('#user').show( "slow" );
    });

        
       
    });

</script>
<?php include 'footer.php';?>
</body>
</html>