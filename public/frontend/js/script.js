$(document).ready(function() {

    // Mobile Nav
    $("#menu1").metisMenu();
    // MObile Nav End


    // Side menubar
    $("#close-btn, .toggle-btn").click(function() {
        $("#mySidenav, body").toggleClass("active");
    });

    // Search Toggle
    $("#search, #search1").click(function() {
        $(".search-toggle").slideToggle('fast');
    });
    // Search Toggle End


    // Tilt js;
    var tilt = $('.js-tilt');
    if (tilt.length) {
        const tilt = $('.js-tilt').tilt();
    }


    $('.course_carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false
            }
        }
    })


    $('.testimonial_carousel').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: false,
                loop: false
            }
        }
    })


    $('.knowledge_carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        dots:true,
        responsive: {
            0: {
                items: 2,
                nav: false
            },
            600: {
                items: 4,
                nav: false
            },
            1000: {
                items: 6,
                nav: false,
                loop: false
            }
        }
    });


    $('.message_carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: true,
        dots: false,
        navText: ["<i class='las la-angle-left'></i>", "<i class='las la-angle-right'></i>"],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    });



    // Search
    $(".sift_menu_bar i").on("click", function() {
        $(".search-overlay").toggleClass("search-overlay-active");
    });
    $(".search-overlay-close").on("click", function() {
        $(".search-overlay").removeClass("search-overlay-active");
    });


    //  Dropdown
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        }
    );
    // Dropdown End

    // Skip Ads
    $(".skip-ads-wrap .btn").on("click", function() {
        $(this).closest('.skip-ads').addClass('active');
        // $(".skip-ads").addClass("active");
    });

    $(function() {
        setTimeout(function() {
            $(".skip-ads").fadeOut(1000);
        }, 10000);
    });

    // Skip Ads End


    // Animation
    new WOW().init();
    // Animation End


    // Counter
    $('.counter').counterUp({
        delay: 20,
        time: 1000
    });
    // Counter End


    // Scroll Top Js
    $(function() {
        // Scroll Event
        $(window).on('scroll', function() {
            var scrolled = $(window).scrollTop();
            if (scrolled > 600) $('.go-top').addClass('active');
            if (scrolled < 600) $('.go-top').removeClass('active');
        });
        // Click Event
        $('.go-top').on('click', function() {
            $("html, body").animate({ scrollTop: "0" }, 300);
        });
    });


    // Gallery
    $(document).ready(function() {
        $('#image-gallery').lightGallery();
    });
    // Gallery End

    // WOW Animation JS
    if ($('.wow').length) {
        var wow = new WOW({
            mobile: false
        });
        wow.init();
    }
    // Scroll Top Js ENd



});
