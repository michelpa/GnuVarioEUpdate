require('../css/commun.scss');

import 'bootstrap';

require('@fortawesome/fontawesome-free/css/all.min.css');

const $ = require('jquery');
global.$ = global.jQuery = $;

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('.custom-file-input').on('change',function(){
        var fileName = document.getElementById("exampleInputFile").files[0].name;
        $(this).next('.form-control-file').addClass("selected").html(fileName);
      })
});

$(document).ajaxComplete(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('.custom-file-input').on('change',function(){
        var fileName = document.getElementById("exampleInputFile").files[0].name;
        $(this).next('.form-control-file').addClass("selected").html(fileName);
      })
});

