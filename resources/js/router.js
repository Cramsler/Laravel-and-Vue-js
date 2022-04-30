import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/test',
        name: 'test',
        component: () => import('./components/Test')
    }
];

const router = new createRouter({
    history: createWebHistory(process.env.APP_URL),
    routes
});

export default router;
