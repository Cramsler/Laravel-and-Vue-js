<template>
    <Header :title="chat.name"/>
    <v-progress-linear indeterminate color="green" v-if="!created" style="margin-top: 65px;" />
    <div class="chat-messages__field" v-if="created">
        <div v-if="messages.length !== 0"
             v-for="message in messages" :key="message.id"
             class="message-container"
             :class="{'my-message': message.user_id === user}"
        >
            <v-avatar v-if="message.user_id !== user" color="info" style="margin-right: 10px;">
                <v-icon icon="mdi-account-circle"></v-icon>
            </v-avatar>
            <div class="rounded-xl elevation-7 message-bubble" :class="[message.user_id === user ? 'rounded-br-0 my-message' : 'rounded-bl-0']">
                {{message.text}}
            </div>
        </div>
    </div>
    <InputGroup :connection="connection"
                @send-message="sendMessage"
                @scroll-down="scrollDown"/>
</template>

<script>
import Header from "./Header";
import InputGroup from "./Input-group";

export default {
    name: "Messages-field",
    components: {
        Header,
        InputGroup
    },
    props: {
        connection: {
            type: Object,
            default: {}
        }
    },
    data: () => ({
        user: null,
        created: false,
        chat: {
            type: Object,
            default: {}
        },
        messages: []
    }),
    async mounted () {
        this.user = Number(this.$user);
        await this.fetchChat();
        this.scrollDown();

        this.connection.onmessage = (event) => {
            this.onMessage(JSON.parse(event.data))
        }
    },
    watch: {
        '$route.params.id': {
            immediate: true,
            async handler() {
                await this.fetchChat()
            }
        }
    },
    methods: {
        async fetchChat() {
            const data = await axios.get(`API/V1/chats/${this.$route.params.id}`);
            this.chat = data.data.data;
            this.createMessagesArray(this.chat.messages)
            this.created = true;
        },

        scrollDown() {
            const div = document.querySelector('.chat-messages__field')
            div.scrollTop = div.scrollHeight;
        },

       async sendMessage (message) {
            const messageItem = {
                text: message,
                user_id: this.user,
                chat_id: this.chat.id
            }

           await axios.post(`API/V1/messages`, messageItem);

           this.messages.push(messageItem)
        },

       onMessage(message) {
           const messageItem = {
               text: message.message,
               user_id: message.user,
           }
           this.messages.push(messageItem);

           this.scrollDown();
       },

       createMessagesArray(messages)
       {
           let newMessages = [];

           messages.forEach((message) => {
               const messageItem = {
                   text: message.text,
                   user_id: message.user_id,
               }

               newMessages.push(messageItem)
           })

           this.messages = newMessages;
       }
    }
}
</script>

<style scoped>
.chat-messages__field {
    width: 100%;
    height: 100%;
    position: absolute;
    overflow-y: scroll;
    padding: 70px 33% 200px 33%;
}

.chat-messages__field::-webkit-scrollbar {
    width: 5px;
    background: none;
}

.chat-messages__field::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background-color: rgba(162, 172, 180, 0.25);
}

.chat-messages__field::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.2);
    border-radius: 10px;
    background: none;
}

.my-message {
    display: flex;
    justify-content: flex-end;
}

.message-bubble {
    max-width: 70%;
    display: inline-block;
    vertical-align: top;
    padding: 20px;
    color:  #a2acb4;
    margin-top: 10px;
    background-color: #212122;
    word-wrap: break-word;
}

.message-container {
    display: flex;
    align-items:flex-end;
}

@media(max-width: 450px) {
    .chat-messages__field {
        width: 100%;
        right: 0;
        padding-left: 10px;
        padding-right: 10px;
    }
}
</style>
