<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}


</head>
<body>
<div id="app">
    <h1>New Users</h1>
    <ul>
        <li v-for="user in users">
            @{{ user.username }}
        </li>
    </ul>
</div>
<script src="https://unpkg.com/vue"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
<script>
    var socket = io('http://127.0.0.1:3000');
    new Vue({
        el: '#app',
        data: {
            users: []
        },
        mounted: function () {
            socket.on('test-channel:App\\Events\\UserSignedUp', function (data) {
                console.log(data)
                this.users.push(data)
            }.bind(this))
        }
    });
</script>
</body>
</html>
