<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div id="app">
    <div class="status">
        @{{ status }}
    </div>
    <form>
        <label>User ID</label>
        <input type="text" v-model="user_id">
        <label>Phone Number</label>
        <input type="text" v-model="phone">
        <button @click="send">Make Call</button>
    </form>
</div>
<script src="https://unpkg.com/vue"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.js"></script>
<script>
    var socket = io('http://127.0.0.1:3000');
    new Vue({
        el: '#app',
        data: {
            user_id: '',
            phone: '',
            status: ''
        },
        mounted: function () {
            socket.on('test-channel:UserSignedUp', function (data) {
                this.status = data.status
            }.bind(this))
        },
        methods: {
            send: function (event) {
                axios.post('/post-call', {
                    'user_id': this.user_id,
                    'phone': this.phone
                })
                event.preventDefault()
            }
        }
    });
</script>
</body>
</html>