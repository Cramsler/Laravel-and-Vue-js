<template>
    <div class="type-message__group">
            <textarea
                v-model="message"
                @keypress.enter.prevent.exact="sendMessage(message)"
                @keyup.ctrl.enter.prevent="newLine"
                class="type-message__input"
                placeholder="Сообщение...">

            </textarea>
        <v-btn
            class="ma-2 type-message__send"
            icon="mdi-send"
            @click="sendMessage(message)"
        ></v-btn>
    </div>
</template>

<script>
export default {
    name: "Input-group",
    props: {
        connection: {
            type: Object,
            default: {}
        }
    },
    data: () => ({
        message: '',
    }),
    methods: {
        sendMessage(message) {
            message = message.trim();
            if (message.length !== 0) {
                this.connection.send(JSON.stringify({
                    'message': message,
                    'user': this.$user
                }));
                this.$emit('scroll-down')
                this.$emit('send-message', message)
                this.message = '';
            }
        },

        newLine (e) {
            let caret = e.target.selectionStart;
            e.target.setRangeText("\n", caret, caret, "end");
            this.text = e.target.value;
        }
    }
}
</script>

<style scoped>

.type-message__group {
    position: absolute;
    bottom: 0;
    height: 75px;
    width: 100%;
    padding: 10px;
    background-color: #212122;
    display: flex;
    align-items: center;
    justify-content: center;
}

.type-message__input {
    width: 30%;
    height: 80%;
    border-radius: 10px;
    padding: 10px;
    background-color: #212122;
    resize: none;
    overflow: hidden;
    color: #a2acb4;
    box-shadow: 0 0 10px;
}

.type-message__send {
    background-color: #212122;
    color: #a2acb4;
    box-shadow: 0 0 10px;
}

@media(max-width: 450px) {
    .type-message__input {
        width: 100%;
    }
}
</style>
