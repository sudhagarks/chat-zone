<?php
    function get_all_users($exclude_user_ids = array()){
        global $conn;
        $user_rows = array();
        if(!empty($exclude_user_ids)){
            $exc_user_ids = '';
            if(!is_array($exclude_user_ids)){
                $exclude_user_ids = array($exclude_user_ids);
            }
            $exc_user_ids = implode(",",$exclude_user_ids);
            $query = "select id,fullname,user_img from users where id NOT IN (".$exc_user_ids.")";
        } else {
            $query = "select id,fullname,user_img from users";
        }
        if ($result = mysqli_query($conn, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($user_rows,$row);
            }
        }
        /*$result = $conn->query($query);
        if($result){
            while($row = $result->fetch_assoc()) {
                array_push($user_rows,$row);
            }
        }*/
        return $user_rows;
    }
    
    function get_user_chat_token($user_ids = array()){
        global $conn;
        $user_chat_rows = array();
        $chat_token = '';
        if(!empty($user_ids)){
            $inc_user_ids = $user_ids;
            if(!is_array($user_ids)){
                $inc_user_ids = array($user_ids);
            }
            $user_id_string = implode(",",$inc_user_ids);
            $query = "select * from (select chat_id, GROUP_CONCAT(user_id) as user_ids, count(*) as total from chat_users group by chat_id) as t1 
                      WHERE t1.user_ids IN (".$user_id_string.") AND t1.total=".sizeof($inc_user_ids);
            //$query = "select * from (select chat_id, GROUP_CONCAT(user_id) as user_ids, count(*) as total from chat_users where user_id IN (".$user_id_string.") group by chat_id) as t1 where t1.total=".sizeof($inc_user_ids);
            if ($result = mysqli_query($conn, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $valid_chat_flag = true;
                    $valid_match_count = 0;
                    $chat_user_ids = explode(",",$row['user_ids']);
                    foreach($chat_user_ids as $chat_user_id){
                        if(in_array($chat_user_id,$inc_user_ids)){
                            $valid_match_count++;
                        } else {
                            $valid_chat_flag = false;
                        }
                    }
                    if($valid_match_count == sizeof($inc_user_ids)){
                        $chat_token = get_token($row['chat_id']);
                        array_push($user_chat_rows,$row);
                    }
                }
            }
        }
        return $chat_token;
    }

    function get_token($chat_id){
        global $conn;
        $token = '';
        if(!empty($chat_id)){
            $query = "select chat_id,room_token from chats where chat_id = ".$chat_id;
            $result = $conn->query($query);
            if($result){
                while($row = $result->fetch_assoc()) {
                    $token = $row['room_token'];
                }
            }
        }
        return $token;
    }
    
?>
