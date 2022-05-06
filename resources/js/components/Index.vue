<template>
    <v-app class="app">
        <Header />
        <Sidebar :users="users" />
        <MessagesField :messages="messages" />

        <InputGroup :connection="connection"
                    @send-message="sendMessage"
                    @scroll-down="scrollDown"/>
    </v-app>
</template>

<script>

import Sidebar from "./Sidebar";
import Header from "./Header";
import MessagesField from "./Messages-field";
import InputGroup from "./Input-group";

export default {
    components: {
        Sidebar,
        Header,
        MessagesField,
        InputGroup
    },
    data: () => ({
        connection: {},
        users: [],
        messages: []
    }),
   async mounted() {
        this.connection = new WebSocket('ws://localhost:3000')

        this.connection.onmessage = (event) => {
            this.messages.push( {msg: event.data, my: false})
            this.scrollDown();
        }

        this.connection.onopen = function(event) {
            console.log("Successfully connected to the echo websocket server...")
        }

        const data = await axios.get('API/V1/users');
        this.users = data.data.data
    },
    methods: {
        scrollDown() {
            const div = document.querySelector('.chat-messages__field')
            div.scrollTop = div.scrollHeight;
        },

        sendMessage (message) {
            this.messages.push({msg: message, my: true})
        }
    }
}
</script>

<style scoped>
.app {
    font-family: "Colibri", sans-serif;
    font-weight: 700;
    background-image: url("https://images.pexels.com/photos/3473569/pexels-photo-3473569.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
    background-repeat: no-repeat;
    background-size: 100%;
}

.app div::-webkit-scrollbar {
    width: 5px;
    background: none;
}

.app div::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background-color: rgba(162, 172, 180, 0.25);
}

.app div::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.2);
    border-radius: 10px;
    background: none;
}

@media(max-width: 450px) {
    .app {
        background-image: url("https://i.redd.it/ts7vuoswhwf41.jpg");
    }
}

</style>
