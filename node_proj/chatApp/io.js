var express = require('express');
var changeCase = require('change-case');
var app = express();
var server = require('http').createServer(app);
var io = require('socket.io')(server);



var usernames = {};
var numUsers = 0;

function mached_name (){
    var names = [];
    for(var key in usernames) {
        if (usernames.hasOwnProperty(key)) {
            names.push(key.toString());
        }
    }
    return names;
}


function remove() {
    for (var key in usernames) {
        if (usernames.hasOwnProperty(key)) {
            var added_user = [];
            added_user.push(usernames[key]);
            if( added_user) {
                added_user.splice(0, 1);

            }
        }
    }
    return this;

}



io.on('connection', function(socket) {
    var addedUser = false;

    // listens and executes the chat message type by the user
    socket.on('new message', function (data) {

        var message = data.toString();
        var user = mached_name();
        user.forEach(function (entry){
            var lowerName = changeCase.lowerCase(message);
            if (lowerName.indexOf(entry) > -1){
                socket.on('name mentioned', function (data) {
                    log(data.username + ' mentioned' + entry + 'in a comment');
                });
                socket.broadcast.emit('name mentioned', {
                    username: socket.username,
                    message: data,
                    entry: entry
                });
            }
        });




            socket.broadcast.emit('new message', {
                username: socket.username,
                message: data
            });
    });



// when the client emits 'add user', this listens and executes
    socket.on('add user', function (username) {

        // we store the username in the socket session for this user
        socket.username = username;
        ++numUsers;
        // add the client's username to the global list
        usernames[username] = username;
        addedUser = true;
        socket.emit('login', {
            numUsers: numUsers
        });
        // echo globally (all clients) that a person has connected
        socket.broadcast.emit('user joined', {
            username: socket.username,
            numUsers: numUsers
        });
    });
    // when the client emits typing
    socket.on('typing', function (){
       socket.broadcast.emit('typing', {
           username: socket.username
       });
    });

    // when the client emits stop typing, we broadcast it to others
    socket.on('stop typing', function () {
        socket.broadcast.emit('stop typing', {
            username: socket.username
        });
    });

    socket.on('disconnect', function (){
        // remove the username from global usernames list
        addedUser = true;
        if(addedUser) {
            remove();
            if(( numUsers > 0 )){
                --numUsers;
            } else if (socket.username == 'undefined') {
                !(--numUsers);
            }

            // Disconnect socket when leaving.

            // echo globally that this client has left
            socket.broadcast.emit('user left', {
                username: socket.username,
                numUsers: numUsers
            });
        }
    });
});

module.exports = io;