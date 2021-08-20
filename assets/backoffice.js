import "./styles/backoffice.scss";

const $ = require('jquery');
global.$ = global.jQuery = $;
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
// require('bootstrap');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');
// require('bootstrap/js/dist/dropdown');
$(document).ready(function() {
    const dropdowns = $('[data-toggle="dropdown"]');

    if (dropdowns && dropdowns.length > 0) {
        dropdowns.dropdown();
    }
});