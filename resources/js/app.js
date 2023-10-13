require('./bootstrap');

require('alpinejs');

import VueSweetalert2 from 'vue-sweetalert2';

import 'sweetalert2/dist/sweetalert2.min.css';
// import Datepicker from 'vue3-date-time-picker';
// import 'vue3-date-time-picker/dist/main.css'

import { createApp } from "vue";
import router from './router/index.js'
import store from './store/index';
import vSelect from 'vue-select';
import "vue-select/dist/vue-select.css";
import Navigation from "./components/Layouts/Navigation";


createApp({}).use(store).use(VueSweetalert2).use(router).component('v-select', vSelect).component('Navigation', Navigation).mount('#app')