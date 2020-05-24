// window.Vue = require("vue");
import Vue from "vue";

// Vue.component(
//     "login-window",
//     require("./components/platform/LoginWindow.vue").default
// );

/** PLATFORM COMPONENTS */
require("./bootstrap");
require("./components/platform/cards");
require("./components/platform/registration");

/** ADMIN COMPONENTS */
require("./components/admin/modal-window");

let app = new Vue({
    el: "#app",
    data() {
        return {
            hasLogin: false
        };
    }
}).$mount(app);
