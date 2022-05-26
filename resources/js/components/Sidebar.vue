<template>
    <v-navigation-drawer
        permanent
        class="test"
        position="left"
        style="background-color: #212122;
        color: #a2acb4;
          overflow-y: hidden;
           @media(min-width: 450px) {width: 25%;}"
    >
        <div  class="sidebar scroll-bar">
            <div v-for="chat in chats" :key="chat.id">
                <router-link :to="{ name: 'chat', params: { id: chat.id }}" class="user-item">
                    <v-avatar color="info" style="margin-right: 10px;">
                        <v-icon icon="mdi-account-circle"></v-icon>
                    </v-avatar>
                    <div>
                        <v-list-item-title>{{chat.name}}</v-list-item-title>
                    </div>
                </router-link>
            </div>
        </div>
    </v-navigation-drawer>
</template>

<script>
export default {
    name: "Sidebar",
    props: {
        chats: {
            type: Array,
            default: []
        }
    },
    mounted() {
       const sidebar = document.querySelector('.v-navigation-drawer__content');
       sidebar.style.overflow = 'hidden'
    }
}
</script>

<style scoped>
.user-item {
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    flex-direction: row;
    border-radius: 10px;
    padding: 10px;
}

.user-item:hover {
    background-color: #2d2d2d;
}

.sidebar {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    padding: 10px;
}

.scroll-bar {
    overflow: auto;
}

.scroll-bar::-webkit-scrollbar {
    width: 5px;
    background: none;
}

.scroll-bar::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background-color: rgba(162, 172, 180, 0.25);
}

.scroll-bar::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.2);
    border-radius: 10px;
    background: none;
}

@media (max-width: 450px) {
    .user-item {
        width: max-content;
    }
}
</style>
