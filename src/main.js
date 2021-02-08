import Vue from "vue";
import Components from "./components";
import "./sass/reset.scss";
import "./sass/fonts.scss";
import "./sass/style.scss";

Vue.config.productionTip = false;

new Vue({
  el: "#app",
  delimiters: ["${", "}"]
});
