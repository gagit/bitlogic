/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import './styles/app.scss';
// start the Stimulus application
import './bootstrap';
import $ from 'jquery';

//const $ = require('jquery');
global.$ = global.jQuery = $;
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.css';
// import Vue from 'vue';
// import App from './vueComponents/App.vue'
//
// new Vue({
//     el:"#app",
//     components: {App}
// })
$(document).ready(
    function ()
    {
        $('[data-toggle="tooltip"]').tooltip({animation: true});
        $('#showDetail').on('shown.bs.modal', function (e) {
            const button = $(e.relatedTarget);
            const modal = $(this);
            console.log(button.data("source"))
            modal.find('.modal-body').load(button.data("source"));
        });
        $('.btn-clean').on('click', function (e) {
            document.getElementById('idFilter').reset()
        });
    }
);