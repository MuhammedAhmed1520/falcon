$(document).ready(function () {


//    side bar
//    loader


//    side toggler
    $sidebar = $('.skeleton-nav');
    $dropBack = $('.drop-backup');
    $dropBack.click(function () {
        $(".header-toggle").trigger('click')
        $sidebar.removeClass('toggled');
        $('#notification_container').removeClass('toggled')
        $('#search_container').removeClass('toggled');
        $('#logger_container').removeClass('toggled');
        $('.logger-loader').fadeOut()
        $dropBack.hide()
    });
    $(".header-toggle").click(function () {
        Hamburger();
        if ($sidebar.hasClass('toggled')) {
            $dropBack.hide()
            $sidebar.removeClass('toggled');
            $dropBack.removeClass('toggled');
            // $('body').removeClass('toggled-desktop');
        } else {
            $dropBack.show()
            $sidebar.addClass('toggled');
            $dropBack.addClass('toggled');
            // $('body').addClass('toggled-desktop');
        }
    });

    $(document).keydown(function (event) {
        if (event.key == "Escape") {
            Hamburger();
        }
    });

    $('#desktop_toggle').on('click', function () {
        $('body').toggleClass('toggled-desktop');
    });

// multi level menu
    $('.my-menu').sliderMenu();

//    meun link aside
    $('.menulink').on('click', function (e) {
        e.preventDefault();
        $ref = $(this).attr('data-toggle');
        setTimeout(function() {
            $('.logger-loader').fadeOut(500);
        }, 200);
        $($ref).addClass('toggled');
        if ($(window).width() >= 767) {
            $dropBack.addClass('toggled').show();
        }
    });

    $('.dismis-icon').on('click', function (e) {
        e.preventDefault();
        if ($(window).width() >= 767) {
            $dropBack.removeClass('toggled').hide();
        }
        $ref = $(this).attr('data-dismis');
        $($ref).removeClass('toggled')
    });
});

// side humburger
function Hamburger() {

    if ($(".hamburger-container").hasClass("menu")) {


        $(".mid").animate({left: '25px', opacity: '0'}, 100);
        $(".top").animate({left: '20px', opacity: '0'}, 200);
        // animating bottom icon up makes for smoother animation
        $(".bottom").animate({left: '10px', opacity: '0', bottom: '6px'}, 300);


        $(".top").animate({left: '0px', opacity: '1', top: '6px'}, {
            step: function () {
                $(this).css('transform', 'rotate(45deg)');
            }
        }, 100);

        $(".bottom").animate({left: '0px', opacity: '1', bottom: '6px'}, {
            step: function () {
                $(this).css('transform', 'rotate(-45deg)');
            }
        }, 300);

        $(".hamburger-container").removeClass("menu").addClass("cancel");

    } else {

        $(".top").animate({left: '25px', opacity: '0', top: '0px'}, 200);
        $(".bottom").animate({left: '10px', opacity: '0', bottom: '0px'}, 200);

        $(".top").animate({left: '0px', opacity: '1', top: '0px'}, {
            step: function () {
                $(this).css('transform', 'rotate(180deg)');
            }
        }, 100);
        $(".mid").animate({left: '0px', opacity: '1'}, 500);
        $(".bottom").animate({left: '0px', opacity: '1', bottom: '0px'}, {
            step: function () {
                $(this).css('transform', 'rotate(0deg)');
            }
        }, 300);

        $(".hamburger-container").removeClass("cancel").addClass("menu");
    }
}
