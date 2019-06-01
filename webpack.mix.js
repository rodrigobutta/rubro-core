let mix = require('laravel-mix');
let path = require('path');
let fs = require('fs');
let child_process = require('child_process');


// ########################
// COMMON (cosas que se usan en el publico y en el admin)
// ########################

// -> /public/js/common.js
mix.scripts([


    // vendor
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/slick-carousel/slick/slick.min.js',
    'node_modules/selectric/public/jquery.selectric.min.js',


    // custom
    'resources/assets/js/common.js' // código comun en el common, que no son librerias

], 'public/js/common.js').version();



// ########################
// APP
// ########################

// -> /public/js/app.js
mix.scripts([

    // vendor
    'node_modules/responsive-nav/responsive-nav.min.js',
    'node_modules/moment/min/moment.min.js',
    'node_modules/fullcalendar/dist/fullcalendar.min.js',
    'node_modules/fullcalendar/dist/locale/es.js',
    'node_modules/selectric/public/jquery.selectric.min.js',
    'node_modules/sticky-kit/dist/sticky-kit.min.js',
    'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js',
    'node_modules/js-cookie/src/js.cookie.js', // usado para alerts ya vistos por usuario

    // custom
    'resources/assets/js/app/search.js',
    'resources/assets/js/app.js' // código comun en el app, que no son librerias

], 'public/js/app.js').version();


// -> /public/css/app.css
mix.sass('resources/assets/sass/app.scss', 'public/css').version();



// ########################
// ADMIN
// ########################

// -> /public/js/admin.js
mix.scripts([

    // vendor
    // 'node_modules/jquery/dist/jquery.min.js', // ya está en common
    'node_modules/jquery-ui-dist/jquery-ui.min.js', // drag y resize de los windows 
    'node_modules/sortablejs/Sortable.min.js',
    // 'node_modules/jstree/dist/jstree.min.js',                   // tree en admin/folder/index
    'node_modules/html5sortable/dist/html5sortable.min.js', // para poder hacer sort en el select2
    'node_modules/jquery-contextmenu/dist/jquery.contextMenu.min.js', // para clicks derechos
    'node_modules/jquery-contextmenu/dist/jquery.ui.position.min.js', // para clicks derechos
    // 'node_modules/html2canvas/dist/html2canvas.min.js', // para sacar screens de las paginas
    // 'node_modules/blueimp-canvas-to-blob/js/canvas-to-blob.min.js', // para que los screens los pase a blob (mas performante en mysql que el base64)
    // 'node_modules/select2/dist/js/select2.full.min.js',
    // 'node_modules/select2/dist/js/i18n/es.js',
    'node_modules/jspdf/dist/jspdf.min.js',

    'node_modules/handlebars/dist/handlebars.min.js',


    // codebase core
    'resources/assets/js/admin/core/bootstrap.bundle.min.js',
    'resources/assets/js/admin/core/jquery.slimscroll.min.js',
    'resources/assets/js/admin/core/jquery.scrollLock.min.js',
    'resources/assets/js/admin/core/jquery.appear.min.js',
    'resources/assets/js/admin/core/jquery.countTo.min.js',
    'resources/assets/js/admin/core/js.cookie.min.js',
    'resources/assets/js/admin/codebase.js',

    // codebase plugins
    'resources/assets/js/admin/plugins/chartjs/Chart.bundle.min.js',
    'resources/assets/js/admin/plugins/select2/select2.full.min.js',
    'resources/assets/js/admin/plugins/jquery-validation/jquery.validate.min.js',
    'resources/assets/js/admin/plugins/jquery-validation/additional-methods.min.js',
    'resources/assets/js/admin/plugins/bootstrap-notify/bootstrap-notify.min.js',
    'resources/assets/js/admin/plugins/sweetalert2/sweetalert2.all.min.js',
    'resources/assets/js/admin/plugins/jquery-raty/jquery.raty.min.js',
    'resources/assets/js/admin/plugins/summernote/summernote-bs4.min.js',
    'resources/assets/js/admin/plugins/summernote/lang/summernote-es-ES.min.js',
    'resources/assets/js/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
    'resources/assets/js/admin/plugins/ion-rangeslider/js/ion.rangeSlider.min.js',
    'resources/assets/js/admin/plugins/moment/moment-with-locales.min.js',
    'resources/assets/js/admin/plugins/jquery-numbox/jquery.numbox-1.3.0.min.js',

    // cutom plugins modified
    'resources/assets/js/admin/custom/jsfiler.js', // tree en admin/folder/index
    'resources/assets/js/admin/custom/formRepeater.jquery.js', // repeater en componentes
    'resources/assets/js/admin/custom/formImage.jquery.js',
    'resources/assets/js/admin/custom/formFile.jquery.js',
    'resources/assets/js/admin/custom/formLink.jquery.js',
    'resources/assets/js/admin/custom/formObjectSearch.jquery.js',
    // 'resources/assets/js/admin/custom/select2.sortable.js',              // para poder ordenar los elementos seleccionados en el select2, como para la edicion del componente de tabs



    // componentes del front que necesito para render del compose
    //'node_modules/slick-carousel/slick/slick.min.js',// ya está en common.js


    // custom
    'resources/assets/js/admin.js' // código comun en el admin, que no son librerias

], 'public/js/admin.js').version().then(() => {



});


// -> /public/css/admin.css
mix.sass('resources/assets/sass/admin/admin.scss', 'public/css').version();






function precompileHandlebars(startPath, filter, ourPath) {

    if (!fs.existsSync(startPath)) {
        console.log("no dir ", startPath);
        return;
    }

    var files = fs.readdirSync(startPath);
    for (var i = 0; i < files.length; i++) {

        var filename = path.join(startPath, files[i]);
        var stat = fs.lstatSync(filename);

        if (stat.isDirectory()) {
            precompileHandlebars(filename, filter, ourPath); //recurse
        } else if (filename.indexOf(filter) >= 0) {

            console.log('-- found: ', filename);

            // paso ruta completa del archivo a puntos, para poder accederlo a lo blade style
            var name = filename.replace(/\//g, '.').replace(/\\/g, '.');
            name = name.replace('resources.views.', '');

            mix.copy(filename, ourPath + name);

            // .then(() => {
            //     console.log('algo en el THEN DEL RECUR')
            // });


        };

    };

};




console.log('HANDLEBARS TIME')


// watch externo de handlebars
child_process.exec('handlebars-watch -c handlebars-config.json', {}, function(error, stdout, stderr) {
    if (error) throw error;
    console.log(stdout, stderr);
});


// copia inicial de todos los hbs a una unica carpeta con los nombres en nomenclatura copada
precompileHandlebars('resources/views/admin/', '.hbs', 'public/tmp/templates/');

// primer corrida de compilación
// child_process.exec('handlebars  ./public/tmp/templates/ -f ./public/js/templates.js --extension "hbs"', {}, function(error, stdout, stderr) {
//     if (error) throw error;
//     console.log(stdout, stderr);
// });




// ########################
// CUSTOM COMPONENTS DISCOVER
// ########################

// /public/css/components.css
compileComponentsStyles();

function compileComponentsStyles() {
    let fs = require('fs');
    var relative_path = "resources/views/components/";
    var paths = fs.readdirSync(relative_path);
    var dests = [];

    for (var i = 0; i < paths.length; i++) {

        var source_path = relative_path + paths[i] + '/style.scss';
        var dest_path = 'public/css/tmp/' + paths[i] + '.css';

        console.log(source_path);

        if (fs.existsSync(source_path)) {
            mix.sass(source_path, dest_path);
            dests.push(dest_path);
        }

    }

    mix.combine(dests, 'public/css/components.css').version();

}