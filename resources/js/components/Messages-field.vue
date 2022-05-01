<template>
    <div class="chat-messages__field" ref="messagesField">
        <div v-if="messages.length !== 0"
             v-for="message in messages" :key="message"
             class="message-container"
             :class="{'my-message': message.my}"
        >
            <v-avatar v-if="!message.my" color="info" style="margin-right: 10px;">
                <v-icon icon="mdi-account-circle"></v-icon>
            </v-avatar>
            <div class="rounded-xl elevation-7 message-bubble" :class="[message.my ? 'rounded-br-0 my-message' : 'rounded-bl-0']">
                {{message.msg}}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Messages-field",
    props: {
        messages: {
            type: Array,
            default: []
        }
    }
}
</script>

<style scoped>
.chat-messages__field {
    width: 33.5%;
    height: 100%;
    position: absolute;
    right: 33.5%;
    overflow-y: scroll;
    padding-bottom: 200px;
    padding-top: 70px;
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
    margin-top: 30px;
    background-color: #212122;
    word-wrap: break-word;
}

.message-container {
    display: flex;
    align-items:flex-end;
}
</style>
