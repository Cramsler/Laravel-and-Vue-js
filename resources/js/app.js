require('./bootstrap');

import {createApp} from "vue";
import {createVuetify} from "vuetify";

import * as components from 'vuetify/components';
import * as locale from 'vuetify/locale';
import * as styles from 'vuetify/styles';
import * as directives from 'vuetify/directives';
const icons = require('@mdi/font/css/materialdesignicons.css')

import router from "./router";

import Index from "./components/Index";

const app = createApp({});

const vuetify = new createVuetify({
    components,
    locale,
    styles,
    icons,
    directives,
});

const axiosInstance = axios.create({
    baseURL: 'API/V1/',
    // timeout: 1000,
    headers: {
        'Content-Type': 'application/json',
        'Accept': '*/*',
    }
});

app.component('base-app', Index);

app.config.globalProperties.$axios = axiosInstance;
app.config.globalProperties.$user = document.querySelector("meta[name='user_id']").getAttribute('content');

app.use(router);
app.use(vuetify);
app.mount('#app');
