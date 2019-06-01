$(document).ready(function() {

    // Alert

    // ocultar alert
    $('.js-home-alert-close-btn').on('click', function(e) {
        e.preventDefault();

        var alert = $(this).closest('.js-home-alert');
        var id = alert.attr('data-id');

        alert.hide(400);

        Cookies.set('alert-' + id, true);

    });

    // mostrar los alerts que no hayan sido ocultados
    $('.home-alert').each(function() {
        var alert = $(this);

        var id = alert.attr('data-id');

        if (!Cookies.get('alert-' + id)) {
            alert.show();
        }

    })


    $(window).scroll(function() {
        if ($(window).scrollTop() > 80) {
            $(".fixedHeader").addClass("scrolled");
        } else if ($(window).scrollTop() < 140) {
            $(".fixedHeader").removeClass("scrolled");
        }
    });


    if ($(window).width() >= 768) {
        $(".js-header-nav-submenu-link").each(function(index) {
            $(this).on("mouseover", function(e) {
                openSubmenu(this);
            });
        });

        $(".js-header-nav-menu-link").not(".js-header-nav-submenu-link").each(function(index) {
            $(this).on("mouseover", function(e) {
                if ($("body").hasClass("-submenu-open")) {
                    $('.js-header-nav-submenu-wrapper').removeClass("-open");
                    $(".js-header-nav-submenu").removeClass("-open");
                    $("body").removeClass("-submenu-open");
                }
            });
        });
    }

    if ($(window).width() < 768) {

        $(".js-header-nav-submenu-link").each(function(index) {
            $(this).on("click", function(e) {
                if (!$("body").hasClass("-submenu-open")) {
                    e.preventDefault();
                    openSubmenu(this);
                }
            });
        });

    }


    $(".js-header-search-btn").on("click", function() {
        if ($(window).outerHeight() <= 768) {
            $('.js-header-search').toggleClass('-open');
            openMenu();
        }
    });

    $('.js-search-input').on("focus", function() {
        $('.js-header-search').addClass('-focus');
    })

    // $('.js-search-input').on("focusout", function() {
    //     $('.js-header-search').removeClass('-focus');
    // })

    $(".js-header-nav-toggle").on("click", function() {
        if ($("body").hasClass("-menu-open")) {
            if ($(".js-header-nav-submenu").hasClass("-open")) {
                $(".js-header-nav-submenu").removeClass("-open");
                $('.js-header-nav-submenu-wrapper').removeClass("-open");
                $("body").removeClass("-submenu-open");
            } else {
                closeMenu();
            }
        } else {
            openMenu();
        }
    });

    $(".js-menu-overlay").on("click", function() {
        closeMenu();
    });

    function openSubmenu(item) {

        var $submenu = $(item).find(".js-header-nav-submenu");

        if ($submenu.hasClass("-open")) {
            $(".js-header-nav-submenu").removeClass("-open");
            $('.js-header-nav-submenu-wrapper').removeClass("-open");
            $("body").removeClass("-submenu-open");            
        }

        if ($(".js-header-nav-submenu").hasClass("-open")) {
            $(".js-header-nav-submenu").removeClass("-open");
            $('.js-header-nav-submenu-wrapper').removeClass("-open");
            $("body").removeClass("-submenu-open");
        }

        $submenu.css("height", ($('.js-header-nav').outerHeight() + "px"));
        $submenu.addClass("-open");
        $(item).find('.js-header-nav-submenu-wrapper').addClass("-open");
        $("body").addClass("-submenu-open");
        // $submenu.css("max-width", ((window.innerWidth - $submenu[0].getBoundingClientRect().left) + "px"));
    };

    function closeSubmenu(itemIndex) {
        $(".js-header-nav-submenu-link").eq(itemIndex).find(".js-header-nav-submenu").removeClass("-open");
        $(".js-header-nav-submenu").removeClass("-open");
        $('.js-header-nav-submenu-wrapper').removeClass("-open");
        $("body").removeClass("-submenu-open");
    };

    function openMenu() {
        $(".js-header-nav").addClass("-open");
        $("html").addClass("-menu-open");
        $("body").addClass("-menu-open");
    };

    function closeMenu() {
        $(".js-header-nav").removeClass("-open");
        $("html").removeClass("-menu-open");
        $("body").removeClass("-menu-open");
        $(".js-header-nav-submenu").removeClass("-open")
    };
});


// Maps

function mapsInitialize() {
    console.log('mapsInitialize');

    $('.js-map').each(function() {

        var lat = $(this).attr('data-lat');
        var lng = $(this).attr('data-lng');
        var zoom = $(this).attr('data-zoom');
        var title = $(this).attr('data-title');
        var description = $(this).attr('data-description');

        console.log('Mapa Lat: ' + lat);

        var mapStyle = [{ "featureType": "all", "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "lightness": 40 }, { "color": "#266885" }] }, { "featureType": "all", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 }] }, { "featureType": "all", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "lightness": 1 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#d6e2e6" }, { "lightness": 1 }, { "weight": 1.2 }] }, { "featureType": "administrative.country", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "administrative.province", "elementType": "labels.text.fill", "stylers": [{ "color": "#36738d" }] }, { "featureType": "administrative.locality", "elementType": "geometry.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "administrative.neighborhood", "elementType": "labels.text.fill", "stylers": [{ "color": "#36738d" }] }, { "featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#d6e2e6" }, { "lightness": 1 }] }, { "featureType": "landscape", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "landscape.man_made", "elementType": "geometry.fill", "stylers": [{ "color": "#e5edf0" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#d8e3e8" }, { "lightness": 1 }] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "poi.attraction", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "poi.business", "elementType": "geometry.fill", "stylers": [{ "color": "#d8e3e8" }] }, { "featureType": "poi.government", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "poi.medical", "elementType": "geometry.fill", "stylers": [{ "color": "#d8e3e8" }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#d8e3e8" }, { "lightness": 1 }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "color": "#bdd0da" }] }, { "featureType": "poi.school", "elementType": "geometry.fill", "stylers": [{ "color": "#e5edf0" }] }, { "featureType": "poi.sports_complex", "elementType": "geometry.fill", "stylers": [{ "color": "#e5edf0" }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#d8e3e8" }, { "lightness": "0" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#a3bfcc" }, { "lightness": "0" }, { "weight": "2.00" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 18 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 16 }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2" }, { "lightness": 19 }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#e9e9e9" }, { "lightness": 17 }] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [{ "color": "#c1d3db" }] }];
        var placeholder = new google.maps.MarkerImage("/images/placeholder.png", null, null, null, new google.maps.Size(45, 45));


        // Create the map
        var map = new google.maps.Map(this, {
            zoom: parseInt(zoom),
            styles: mapStyle,
            center: new google.maps.LatLng(lat, lng)
        });

        // Add a marker
        var marker = new google.maps.Marker({
            map: map,
            icon: placeholder,
            position: new google.maps.LatLng(lat, lng)
        });

        var contentString = '<div class="map-infowindow">' +
            '<h3>' + title + '</h3>' +
            '<p>' + description + '</p></div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
        infowindow.open(map, marker);

    });

}