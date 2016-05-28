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

<style type="text/css">
	.box.box-primary {
    border-top-color: #3c8dbc;
}
.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}
.box-header > .fa, .box-header > .glyphicon, .box-header > .ion, .box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}
.direct-chat .box-body {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    position: relative;
    overflow-x: hidden;
    padding: 0;
}
.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}
.direct-chat-messages, .direct-chat-contacts {
    -webkit-transition: -webkit-transform .5s ease-in-out;
    -moz-transition: -moz-transform .5s ease-in-out;
    -o-transition: -o-transform .5s ease-in-out;
    transition: transform .5s ease-in-out;
}
.direct-chat-messages {
    -webkit-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    padding: 10px;
    height: 250px;
    overflow: auto;
}
.direct-chat-msg {
    margin-bottom: 10px;
}
.direct-chat-msg, .direct-chat-text {
    display: block;
}
.direct-chat-info {
    display: block;
    margin-bottom: 2px;
    font-size: 12px;
}
.direct-chat-name {
    font-weight: 600;
}
.pull-left {
    float: left !important;
}
.direct-chat-timestamp {
    color: #999;
}
.pull-right {
    float: right !important;
}
.direct-chat-img {
    border-radius: 50%;
    float: left;
    width: 40px;
    height: 40px;
}
.direct-chat-text {
    border-radius: 5px;
    position: relative;
    padding: 5px 10px;
    background: #d2d6de;
    border: 1px solid #d2d6de;
    margin: 5px 0 0 50px;
    color: #444;
}
.direct-chat-msg, .direct-chat-text {
    display: block;
}
.direct-chat-msg {
    margin-bottom: 10px;
}
.direct-chat-info {
    display: block;
    margin-bottom: 2px;
    font-size: 12px;
}
.right .direct-chat-img {
    float: right;
}
.direct-chat-primary .right > .direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
}
.right .direct-chat-text {
    margin-right: 50px;
    margin-left: 0;
}
</style>
<?php include 'footer.php';?>
</body>
</html>