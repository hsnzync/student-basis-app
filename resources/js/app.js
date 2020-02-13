/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require("vue");
// import "./modal-window";
// import ModalWindow from "./components/ModalWindow";
Vue.component("modal-window", require("./components/ModalWindow.vue").default);

require("./bootstrap");
require("./components/cards");
require("./components/registration");

new Vue({
    el: "#app",
    // components: { ModalWindow },
    data: {
        isActiveModal: false
        // selected: []
    }
}).$mount("#app");
