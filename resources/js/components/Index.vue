<template>
    <v-app class="app">
        <Sidebar :chats="chats" />
        <router-view :connection="connection"/>
    </v-app>
</template>

<script>

import Sidebar from "./Sidebar";
import MessagesField from "./Messages-field";

export default {
    components: {
        Sidebar,
        MessagesField
    },
    data: () => ({
        connection: {},
        chats: [],
    }),
   async mounted() {
        this.connection = new WebSocket('ws://localhost:3000')

        this.connection.onopen = (event) => {
            console.log("Successfully connected to the echo websocket server...")
        }

        const data = await this.$axios.get('chats');
        this.chats = data.data.data
    }
}
</script>

<style scoped>
.app {
    font-family: "Colibri", sans-serif;
    font-weight: 700;
    background-color: #2c3034;
    background-repeat: no-repeat;
    background-size: 100%;
}

/*@media(max-width: 450px) {*/
/*    .app {*/
/*        background-image: url("https://i.redd.it/ts7vuoswhwf41.jpg");*/
/*    }*/
/*}*/

</style>
