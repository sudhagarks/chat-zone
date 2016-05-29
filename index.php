<?php 
    include 'dbconnection.php';
    require_once 'chat_incs.php';
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
</head>
</head>
<body>
<?php include 'header.php';?>
    
<div class="container">
    <div class="row">
      <div class="col-lg-4">
            <?php
                $chat_ids = get_chat_ids($_SESSION['USERID']);
                $chat_users = get_chat_users($chat_ids,$_SESSION['USERID']);
                if($chat_users){
                    foreach($chat_users as $user){
            ?>
            <div class="list-group">
              <a href="#" class="list-group-item active">
                <img class="media-object" src="img/default_user.png" alt="User Name">
                <div>
                <h4 class="list-group-item-heading"><?php echo $user['fullname']; ?></h4>
                <!-- <p class="list-group-item-text">Add nearly any HTML within, even for linked list groups like the one below.</p> -->
                </div>
              </a>

            </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="list-group">
                        <a href="#" class="list-group-item active text-center">
                            No Chat History Found
                        </a>
                    </div>
                <?php } ?>
        </div><!-- /.col-lg-6 -->

        <div class="col-lg-8">
            <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                    <h3 class="box-title" style="width:100%;">
                        Direct Chat
                        <small style="padding:0px;padding-top:0px;">
                            <button type="submit" class="btn btn-success btn-flat pull-right new-message" style="float: right;">
                                New Message
                            </button>
                        </small>
                    </h3>
                </div>
                <?php
                    $chat_messages = get_chat_messages($chat_ids);
                    $all_chats = array();
                    foreach($chat_messages as $chat_message){
                        if(empty($all_chats[$chat_message['room_token']])){
                            $all_chats[$chat_message['room_token']] = array();
                            $all_chats[$chat_message['room_token']]['key'] = $chat_message['room_token'];
                            $all_chats[$chat_message['room_token']]['details'] = array();
                        }
                        $all_chats[$chat_message['room_token']]['details'][] = $chat_message;
                    }
                    foreach($all_chats as $token_key => $all_chat){
                ?>
                <div enabled="true" class="conversation-box box-body" id="RoomToken<?=$token_key?>">
                    <div class="direct-chat-messages">                    
                        <?php  $i = 1; foreach($all_chat['details'] as $detail) { ?>
                        <?php
                            echo get_chat_msg($detail);
                            /*
                            $pos_class = ($detail['user_id'] == $_SESSION['USERID']) ? "right" : '';
                        ?>
                        <div class="direct-chat-msg <?php echo $pos_class; ?>">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left"><?php echo $detail['fullname']; ?></span>
                                <span class="direct-chat-timestamp pull-right">
                                    <?php echo date('D m Y h:i:a',$detail['chat_timevalue']); ?>
                                </span>
                            </div>
                            <img class="direct-chat-img media-object" src="img/default_user.png" alt="Message User Image"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                <?php echo $detail['message']; ?>
                            </div>
                        <?php */ $i++; } ?>
                    </div>

                    <div class="box-footer">
                        <div class="input-group message-div">
                            <input name="message" placeholder="Type Message ..." class="form-control message" type="text">
                            <span class="input-group-btn">
                              <button type="button" data-room-token="<?=$token_key?>" class="btn btn-primary btn-flat message-send">Send</button>
                            </span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="new-conversation-box box-footer hide">
                <div class="input-group">
                </div>
                <div class="input-group message-div">
                    <input name="message" placeholder="Type Message ..." class="form-control message" type="text">
                    <span class="input-group-btn">
                      <button type="button" data-room-token="" class="btn btn-primary btn-flat message-send">Send</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
</body>
</html>