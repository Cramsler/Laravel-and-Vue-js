import {createRouter, createWebHistory} from "vue-router";
import Chat from "./components/Chat";

const routes = [
    {
        path: '/:id',
        name: 'chat',
        component: Chat
    }
];

const router = new createRouter({
    history: createWebHistory(process.env.APP_URL),
    routes
});

export default router;
