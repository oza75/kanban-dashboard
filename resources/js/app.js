import './bootstrap';
import Vue from "vue";
import App from './components/App.vue'
import VModal from 'vue-js-modal'

Vue.prototype.$axios = window.axios;

Vue.use(VModal)

const app = new Vue({
    el: "#app",
    render: h => h(App)
})
