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
    });
    
    $('.message-send').click(function(){
        console.log("ad");
        var message_div = $(this).parents().find('.message-div');
        var message = $(message_div).find('.message').val();
        if($.trim(message) != ''){
            var room_token = $(this).attr('data-room-token');
            var msg = {
                message: message,
                user_ids: [2],
                room_token: room_token
            };
            //convert and send data to server
            websocket.send(JSON.stringify(msg));
            $(message_div).find('.message').val('');
        }
    });
    
    websocket.onmessage = function(ev) {
        var msg = JSON.parse(ev.data); 
        console.log(msg);
        var room_token = msg.room_token;
        var chat_html = msg.chat_html;
        $("#RoomToken"+room_token).find('div.direct-chat-messages').append(chat_html);
        //var contactTopPosition = $("#RoomToken"+room_token).find('div.direct-chat-messages').find('div.direct-chat-msg:last').offset().top;
        var contactTopPosition = $("#RoomToken"+room_token).find('div.direct-chat-messages').prop('scrollHeight');
        $("div.direct-chat-messages").animate({scrollTop: contactTopPosition});
    };
});