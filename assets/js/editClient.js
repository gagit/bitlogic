const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';
Routing.setRoutingData(routes);
$(function () {
    $('#identifications-link').on('shown.bs.tab', function (e) {
        const url = Routing.generate('app_identifications_client_list', { id : this.dataset.person });
        $.ajax({
            url: url,
            data: {},
            method: 'GET',
        }).then(data => {
            $("#identifications-tab").html(data);
        })
    });
    $('#contacts-link').on('shown.bs.tab', function (e) {
        const url = Routing.generate('app_contacts_client_list', { id : this.dataset.person });
        $.ajax({
            url: url,
            data: {},
            method: 'GET',
        }).then(data => {
            $("#contacts-tab").html(data);
        })

    });
});
