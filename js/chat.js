function formatState (state) {
    return "<img class='img-flag' src='img/default_user.png' style='width:20px;height:20px;margin-right:3px;'/>" + state.text;
}
$(document).ready(function(){
    //create a new WebSocket object.
    var wsUri = "ws://localhost:9000/socket-chat/server.php"; 	
    websocket = new WebSocket(wsUri); 
    
    websocket.onopen = function(ev) { // connection is open 
        $('#message_box').append("<div class=\"system_msg\">Connected!</div>"); //notify user
    }
    
    $(".message").keypress(function (event){
        if ( event.which == 13 ) {
            var message_div = $(this).parents().find('.message-div');
            var message_send = $(message_div).find('.message-send').trigger('click');
        }
    });
    
    $(".new-message").click(function(){
        $(".conversation-box").addClass('hide');
        $(".new-conversation-box").removeClass('hide');
        $("#chat_users_list").select2({
            allowClear: true,
            formatResult: formatState,
            formatSelection: formatState
        });
    });
    
    $(".chat-head").click(function(){
        $(".chat-head").removeClass('active');
        var room_token = $(this).attr('data-room-token');
        $(".conversation-box").addClass('hide');
        $(".new-conversation-box").addClass('hide');
        $("#RoomToken"+room_token).removeClass('hide');
        $(this).addClass('active');
    });
    
    $('.message-send').click(function(){
        var message_div = $(this).parents().find('.message-div:last');
        var message = $(message_div).find('.message').val();
        if($.trim(message) != ''){
            var room_token = $(this).attr('data-room-token');
            var valid_chat_room = true;
            if($.trim(room_token) == ''){
                if($.trim($("#chat_users_list").val()) != ''){
                    var user_ids = $("#chat_users_list").val();
                    user_ids.push(current_user_id);
                    var msg = {
                        message: message,
                        user_ids: user_ids,
                        room_token: room_token
                    };
                } else {
                    valid_chat_room = false;
                }
            } else {
                var msg = {
                    message: message,
                    room_token: room_token
                };
            }
            if(valid_chat_room){
                //convert and send data to server
                websocket.send(JSON.stringify(msg));
                $(message_div).find('.message').val('');
            } else {
                if($.trim($("#chat_users_list").val()) == ''){
                    alert("Please Select Users to Initiate Chat");
                    return false;
                }
            }
        }
    });
    
    websocket.onmessage = function(ev) {
        var msg = JSON.parse(ev.data);
        console.log(msg);
        if(msg.chat_type == "new"){
            var current_page_url = $(location).attr('origin')+$(location).attr('pathname');
            window.location.href = current_page_url+"?t="+$.now()+"&cid="+msg.chat_id;
        } else {
            var room_token = msg.room_token;
            var chat_html = msg.chat_html;
            $("#RoomToken"+room_token).find('div.direct-chat-messages').append(chat_html);
            //var contactTopPosition = $("#RoomToken"+room_token).find('div.direct-chat-messages').find('div.direct-chat-msg:last').offset().top;
            var contactTopPosition = $("#RoomToken"+room_token).find('div.direct-chat-messages').prop('scrollHeight');
            $("div.direct-chat-messages").animate({scrollTop: contactTopPosition});
        }
    };
});