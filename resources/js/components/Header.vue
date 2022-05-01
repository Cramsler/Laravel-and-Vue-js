<template>
    <v-app-bar class="header" style="padding-left: 13.5%;">
        <template v-slot:prepend>
            <v-avatar color="info" style="margin-right: 10px;">
                <v-icon icon="mdi-account-circle"></v-icon>
            </v-avatar>
        </template>
        <v-app-bar-title>Иванов Иван</v-app-bar-title>
        <v-spacer></v-spacer>
        <v-btn icon>
            <v-icon>mdi-magnify</v-icon>
        </v-btn>
        <v-btn icon>
            <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
    </v-app-bar>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped>
.header {
    background-color: #212122;
    color: #a2acb4;
}
</style>
