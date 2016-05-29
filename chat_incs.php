<?php
    function get_chat_ids($user_id){
        global $conn;
        $chat_ids = array();
        $query = "select distinct(chat_id) from chat_users where user_id = ".$user_id;
        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) {
            array_push($chat_ids,$row['chat_id']);
        }
        return $chat_ids;
    }

    function get_chat_users($chat_ids, $user_id){
        global $conn;
        if(!is_array($chat_ids)){
            $chat_ids = array($chat_ids);
        }
        $user_records = array();
        $query = "select cu.*, u.* from chat_users as cu inner join users u on (u.id = cu.user_id) where cu.chat_id in (".implode(",",$chat_ids).") and cu.user_id != ".$user_id;
        $result = $conn->query($query);
        if($result){
            while($row = $result->fetch_assoc()) {
                array_push($user_records,$row);
            }
        }
        return $user_records;
    }

    function get_chat_messages($chat_ids){
        global $conn;
        if(!is_array($chat_ids)){
            $chat_ids = array($chat_ids);
        }
        $user_records = array();
        $query = "select cm.*, u.*, c.room_token from chat_messages as cm inner join users u on (u.id = cm.user_id) inner join chats c on (c.chat_id = cm.chat_id) where cm.chat_id in (".implode(",",$chat_ids).") ORDER BY cm.chat_timevalue asc, cm.chat_id DESC";
        $result = $conn->query($query);
        if($result){
            while($row = $result->fetch_assoc()) {
                array_push($user_records,$row);
            }
        }
        return $user_records;
    }
    
    function get_chat_message_timestamp($chat_message_id){
        global $conn;
        $timestamp = '';
        if(!empty($chat_message_id)){
            $query = "select chat_timevalue from chat_messages where id=".$chat_message_id;
            $result = $conn->query($query);
            while($row = $result->fetch_assoc()) {
                $timestamp = $row['chat_timevalue'];
            }
        }
        return $timestamp;
    }
    
    function get_chat_msg($detail){
        global $_SESSION;
        $pos_class = ($detail['user_id'] == $_SESSION['USERID']) ? "right" : '';
        $html = sprintf('<div class="direct-chat-msg %s">',$pos_class);
        $html .= sprintf('<div class="direct-chat-info clearfix">');
        $html .= sprintf('<span class="direct-chat-name pull-left">%s</span>',$detail['fullname']);
        //if(!empty($detail['chat_timevalue'])){
            $html .= sprintf('<span class="direct-chat-timestamp pull-right">%s</span>',date('D m Y h:i:a',$detail['chat_timevalue']));
        //}
        $html .= sprintf('</div>'); 
        $html .= sprintf('<img class="direct-chat-img media-object" src="img/default_user.png" alt="Message User Image">');
        $html .= sprintf('<div class="direct-chat-text">%s</div>',$detail['message']);
        $html .= sprintf('</div>');
        return $html;
    }
    
    function save_chat_message($chat_id, $message){
        global $_SESSION;
        global $conn;
        $auth_user_id = $_SESSION['USERID'];
        //insert chat messages
        $time = time();
        $query = "insert into chat_messages (chat_id,user_id,message,chat_timevalue) values ($chat_id,$auth_user_id,'$message',$time)";
        mysqli_query($conn,$query);
        $chat_message_id = mysqli_insert_id($conn);
        return $chat_message_id;
    }
?>

