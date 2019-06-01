@extends ('master.app')

@section('content')


    @include('folder.print', ['holder' => 'main', 'action' => 'print', 'item' => $item])




<script>

    // Alert

    function closeAlert() {
        $(this).closest('.js-home-alert').hide(400);
    };


    // News Sliders

    var newsSliderOptions = {
        infinite: true,
        slidesToShow: 2,
        arrows: false,
        centerMode: true,
        centerPadding: '3rem',
        responsive: [{
            breakpoint: 560,
            settings: {
                centerPadding: '1rem'
            }
        }, {
            breakpoint: 768,
            settings: {
                centerPadding: '2rem'
            }
        }]
    };

    function createNewsSlider() {
        var $slider = $(".js-news-slider");
        var isInitialized =  $slider.hasClass('slick-initialized');
        if ($(document).width() <= 768) {
            if (!isInitialized) {
                $slider.slick(newsSliderOptions);
            }
        } else {
            if (isInitialized) {
                $slider.slick('unslick');
            }
        }
    };

    createNewsSlider();


    // Services Sliders

    var servicesSliderOptions = {
        infinite: true,
        slidesToShow: 3,
        arrows: false,
        centerMode: true,
        centerPadding: '2rem',
        responsive: [{
            breakpoint: 560,
            settings: {
                slidesToShow: 2
            }
        }]
    };

    function createServicesSlider() {
        var $slider = $(".js-services-slider");
        var isInitialized =  $slider.hasClass('slick-initialized');
        if ($(document).width() <= 768) {
            if (!isInitialized) {
                $slider.slick(servicesSliderOptions);
            }
        } else {
            if (isInitialized) {
                $slider.slick('unslick');
            }
        }
    };

    createServicesSlider();


    // Events

    function handleResize() {
        createNewsSlider();
        createServicesSlider();
    }

    $('.js-home-alert-close-btn').on('click', closeAlert);

    $(window).on('resize', handleResize);

</script>

@endsection