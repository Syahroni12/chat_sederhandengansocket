const express = require("express");
const app = express();
const server = require("http").createServer(app);

const io = require("socket.io")(server, {
    cors: { origin: "*" },
});

io.on("connection", (socket) => {
    // console.log("connection");
    socket.on("send_message", (message) => {
        console.log(message);
        socket.broadcast.emit("sendChatToClient", message);
        // io.sockets.emit("sendChatToClient", message);
    });

    socket.on("disconnected", (socket) => {
        console.log("disconnected");
    });
});
server.listen(3000, () => {
    console.log("berjalan");
});
