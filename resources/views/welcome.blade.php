<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Styles -->

    <style>
        .chat-row {
            margin: 50px;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        ul li {
            padding: 8px;
            background: #f2f2f2;
            margin-bottom: 20px;
        }

        ul li:nth-child(2n-2) {
            background: cornflowerblue;

        }


        .chat-input {
            border: 1px solid lightgray;
            border-top-right-radius: 5px;
            border-top-left-radius: 5px;
            border-bottom: none;
        }
    </style>

</head>

<body>
    <div class="row chat-row">
        <div class="chat-content">
            <ul>
                <li>
                    sdjsjdisj
                </li>
            </ul>
        </div>
        <div class="chat-section">
            <div class="chat-box">
                <div class="chat-input bg-white" id="chatInput" contenteditable=""></div>
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.socket.io/4.8.0/socket.io.min.js"
    integrity="sha384-OoIbkvzsFFQAG88r+IqMAjyOtYDPGO0cqK5HF5Uosdy/zUEGySeAzytENMDynREd" crossorigin="anonymous">
</script>

<script>
    $(function() {
        let ip_address = '127.0.0.1';
        let socket_port = '3000';

        let socket = io(ip_address + ':' + socket_port);

        let chatInput = $('#chatInput');
        chatInput.on('keypress', function(e) {
            let message = $(this).html();
            console.log(message);

            if (e.which == 13 && !e.shiftKey) {
                // alert(message);
                socket.emit('send_message', message);
                chatInput.html('');
                return false;
                // $(this).html('');
                // return false;
            }
        });

        socket.on('sendChatToClient', (message) => {
            // console.log(data);
            $('.chat-content ul').append(`<li>${message}</li>`);
        });

        socket.on('connection');
    })
</script>

</html>
