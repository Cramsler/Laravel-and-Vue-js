<template>
    <v-app style="z-index: 0">
        <v-app-bar color="grey-lighten-2"></v-app-bar>
        <v-main class="chat">
            <v-container fluid class="messages-table">
                <ul v-if="messages.length !== 0"
                     v-for="message in messages" :key="message"
                     class="message-container"
                    :class="{'my-message': message.my}">
                    <li class="rounded-xl elevation-7 message-bubble" :class="[message.my ? 'rounded-br-0 my-message' : 'rounded-bl-0']">
                        {{message.msg}}
                    </li>
                </ul>
            </v-container>

            <v-card class="input-bar">
                <v-spacer />
                <textarea ref="messageInput" class="message-input" v-model="message"></textarea>
                <v-btn
                    class="ma-2"
                    color="indigo"
                    icon="mdi-send"
                    @click="sendMessage(message)"
                ></v-btn>
                <v-spacer />
            </v-card>
        </v-main>
    </v-app>
</template>

<script>
export default {
    data: () => ({
        messages: [],
        message: '',
        connection: {}
    }),
    mounted() {
        console.log("Starting connection to WebSocket Server")
        this.connection = new WebSocket('ws://localhost:3000')

        this.connection.onmessage = (event) => {
            this.messages.push( {msg: event.data, my: false})
            console.log(event);
        }

        this.connection.onopen = function(event) {
            console.log(event)
            console.log("Successfully connected to the echo websocket server...")
        }

    },
    computed: {

    },
    methods: {
        sendMessage(message) {
            message = message.trim();
            if (message.length !== 0) {
                this.connection.send(message);
                this.messages.push({msg: message, my: true})
                this.message = '';
                this.$refs.messageInput.value = '';
            }
        }
    }
}
</script>

<style scoped>
.input-bar {
    display: flex;
    width: 100%;
    padding: 20px;
    position: absolute;
    bottom: 0;
    background-color: rgba(83, 104, 119, 0.98);
    align-items: center;
}

.message-input{
    width: 50%;
    height: 40px;
    display: flex;
    align-items: center;
    padding: 5px;
    border: solid grey 1px;
    color: white;
    margin-right: 10px;
}

.message-bubble {
    max-width: 40%;
    display: inline-block;
    vertical-align: top;
    padding: 20px;
    color: white;
    margin-bottom: 30px;
    background-color: rgba(83, 104, 119, 0.98);
}
.chat {
    background-image: url('https://blog.1a23.com/wp-content/uploads/sites/2/2020/02/Desktop.png');
    background-repeat: no-repeat;
    background-size: 100%;
}

.messages-table {
    width: 40%;
}

.my-message {
    display: flex;
    justify-content: flex-end;
}
</style>
