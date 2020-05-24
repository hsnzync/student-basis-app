import Vue from "vue";
import ModalWindow from "./ModalWindow";

new Vue({
    el: "#app",
    components: { ModalWindow },
    data() {
        return {
            showModal: false
        };
    }
});
