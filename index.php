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
                <h3 class="box-title" style="width:100%;">
                    Direct Chat
                    <small style="padding:0px;padding-top:0px;">
                        <button type="submit" class="btn btn-success btn-flat pull-right" style="float: right;">
                            New Message
                        </button>
                    </small>
                </h3>
            </div>

            <div enabled="true" class="conversation-box box-body">
                <div class="direct-chat-messages">
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                        </div>
                        <img class="direct-chat-img media-object" src="img/default_user.png" alt="Message User Image"><!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            Is this template really for free? That's unbelievable!
                        </div>
                    </div>
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                        </div>
                        <img class="direct-chat-img media-object" src="img/default_user.png" alt="Message User Image"><!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          You better believe it!
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <form action="#" method="post">
                        <div class="input-group">
                          <input name="message" placeholder="Type Message ..." class="form-control" type="text">
                              <span class="input-group-btn">
                                <button type="button" data-room-token="" class="btn btn-primary btn-flat message-send">Send</button>
                              </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="new-conversation-box box-footer hide">
                <form action="#" method="post">
                    <div class="input-group">
                      <input name="message" placeholder="Type Message ..." class="form-control" type="text">
                          <span class="input-group-btn">
                            <button type="button" data-conversation-id="" class="btn btn-primary btn-flat message-send">Send</button>
                          </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

<?php include 'footer.php';?>
</body>
</html>