import {createRouter, createWebHistory} from "vue-router";
import MessagesField from "./components/Messages-field";

const routes = [
    {
        path: '/:id',
        name: 'chat',
        component: MessagesField
    }
];

const router = new createRouter({
    history: createWebHistory(process.env.APP_URL),
    routes
});

export default router;
