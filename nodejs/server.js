var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
 
server.listen(8890);
io.on('connection', function (socket) {
 
  console.log("client connected");
  var redisClient = redis.createClient();
  redisClient.subscribe('message');
 
  redisClient.on("message", function(channel, data) {
    console.log(data);
    msg = JSON.parse(data);
    console.log("New message add in queue "+ msg.message + " from "+msg.user +" channel");
    socket.emit(channel, data);
  });
 
  socket.on('disconnect', function() {
    redisClient.quit();
  });
 
});