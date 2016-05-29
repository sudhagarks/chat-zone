<?php
    function get_all_users($exclude_user_ids = array()){
        global $conn;
        $user_rows = array();
        if(!empty($exclude_user_ids)){
            $exc_user_ids = '';
            if(!is_array($exclude_user_ids)){
                $exc_user_ids = array($exclude_user_ids);
            }
            $exc_user_ids = implode(",",$exc_user_ids);
            $query = "select id,fullname,user_img from users where id NOT IN (".$exc_user_ids.")";
        } else {
            $query = "select id,fullname,user_img from users";
        }
        if ($result = mysqli_query($conn, $query)) {
            while ($row = mysqli_fetch_row($result)) {
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

