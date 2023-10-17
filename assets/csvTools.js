/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import Vue from 'vue';
import Upload from './vueComponents/Upload.vue'
import Csv from './vueComponents/CsvToText.vue'
import App from './vueComponents/App.vue'
new Vue({
    el:"#uiCsvTools",
    components: {App,Csv}
})
