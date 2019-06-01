$(document).ready(function() {
    console.log('admin.js ready!')

    initSearch();

    generalBinds();

    handleSidebar();

    
    initPageSearch();


});

var handleSidebar = function() {

    $('nav#sidebar li a.active').closest('ul').parent().addClass('open');

}


var initPageSearch = function() {

    var pageSearchFormatSelection = function(data) {
        return data.text || data.id;
    }

    var pageSearchFormat =  {
        text: 'text',
        id: 'id',
    };


    var pageSearchSelect2 = $('select#page_search').select2({
        placeholder: 'empiece a escribir el nombre de la pagina..',
        allowClear: true,
        templateResult: function(data) {
            if (data.loading) return data.text;

            var markup = "<div class='select2-result-data clearfix'>" +
            "<div class='select2-result-data__meta'>" +
              "<div class='select2-result-data__title'>" + data.text + "</div>" ;

            if(data.subtitle){
                markup += "<div class='select2-result-data__subtitle'>" + data.subtitle + "</div>";
            }

            markup += "</div></div>";

            return markup;
        },
        templateSelection: pageSearchFormatSelection,
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        maximumInputLength: 50,
        language: {
             noResults: function(term) {
                return 'sin resultados para ' + term;
            }
        },
        ajax: {
            dataType: 'json',
            url: '/admin/folder/search',
            delay: 250,
            type: 'GET',
            data: function(params) {
                return {
                    term: params.term
                }
            },
            processResults: function (data, page) {

                for (var i = 0; i < data.length; i++) {
                    data[i].text = data[i][pageSearchFormat.text];
                    // data[i].extra = data[i][pageSearchFormat.extra];
                };

                return {
                    results: data
                };
            }
        }

    }).on('select2:select', function (e) {
        var data = e.params.data;
        // console.log(data);
        window.location.href = data.edit;
    });

}

var initSearch = function() {

    var pageSearchFormatSelection = function(data) {
        return data.text || data.id;
    }

    var pageSearchFormat = {
        text: 'text',
        id: 'id',
    };


    var pageSearchSelect2 = $('select#page_search').select2({
        placeholder: 'empiece a escribir..',
        allowClear: true,
        templateResult: function(data) {
            if (data.loading) return data.text;

            var markup = "<div class='select2-result-data clearfix'>" +
                "<div class='select2-result-data__meta'>" +
                "<div class='select2-result-data__title'>" + data.text + "</div>";

            if (data.subtitle) {
                markup += "<div class='select2-result-data__subtitle'>" + data.subtitle + "</div>";
            }

            markup += "</div></div>";

            return markup;
        },
        templateSelection: pageSearchFormatSelection,
        escapeMarkup: function(markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        maximumInputLength: 50,
        language: {
            noResults: function(term) {
                return 'sin resultados para ' + term;
            }
        },
        ajax: {
            dataType: 'json',
            url: '/admin/service/search',
            delay: 250,
            type: 'GET',
            data: function(params) {
                return {
                    term: params.term
                }
            },
            processResults: function(data, page) {

                for (var i = 0; i < data.length; i++) {
                    data[i].text = data[i][pageSearchFormat.text];
                    // data[i].extra = data[i][pageSearchFormat.extra];
                };

                return {
                    results: data
                };
            }
        }

    }).on('select2:select', function(e) {
        var data = e.params.data;
        // console.log(data);
        window.location.href = data.edit;
    });

}


var generalBinds = function() {

    // guardar loqueo del sidebar izquierda
    $('button[data-action="sidebar_toggle"]').on('click', function() {
        if ($('#page-container').hasClass('sidebar-o')) {
            $('#btn_sidebar_lock').removeClass('text-danger');
            saveUserConfig('sidebar-locked', '0');
        } else {
            $('#btn_sidebar_lock').addClass('text-danger');
            saveUserConfig('sidebar-locked', '1');
        }
    })



}


// guarda parametros custom en la tabla de config del usuario, por ej para pos de ventanas y demas
var saveUserConfig = function(name, value) {

    var data = {};
    data.name = name;
    data.value = value;

    $.ajax({
        url: '/admin/user/config', // {{ route('admin.user.config') }}
        type: 'POST',
        data: data,
        dataType: 'JSON',
        success: function(response) {
            // console.log(response)
        }
    });

}