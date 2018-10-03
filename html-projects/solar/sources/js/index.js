function fixHeader() {
    var sTop = $(this).scrollTop(),
        header = $('.header');

    if (sTop >= 100) {
        header.addClass('fix-bg');
    } else {
        header.removeClass('fix-bg')
    }
}

jQuery(document).ready(function($){
    fixHeader();
    //move nav element position according to window width
    moveNavigation();
    $(window).on('resize', function(){
        (!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
    });

    //mobile version - open/close navigation
    $('.header-nav--trigger').on('click', function(event){
        event.preventDefault();
        if($('header').hasClass('nav-is-visible')) $('.moves-out').removeClass('moves-out');

        $('header').toggleClass('nav-is-visible');
        $('.header-nav').toggleClass('nav-is-visible');
        $('.site-main').toggleClass('nav-is-visible');
    });

    //mobile version - go back to main navigation
    $('.go-back').on('click', function(event){
        event.preventDefault();
        $('.header-nav').removeClass('moves-out');
    });

    function moveNavigation(){
        var navigation = $('.header-nav--wrapper');
        var screenSize = checkWindowWidth();
        if ( screenSize ) {
            //desktop screen - insert navigation inside header element
            navigation.detach();
            navigation.insertBefore('.header-nav--trigger');
        } else {
            //mobile screen - insert navigation after .site-main element
            navigation.detach();
            navigation.insertAfter('.site-main');
        }
    }

    function checkWindowWidth() {
        var mq = window.getComputedStyle(document.querySelector('header'), '::before').getPropertyValue('content').replace(/"/g, '').replace(/'/g, "");
        return ( mq == 'mobile' ) ? false : true;
    }
});

$(window).scroll(function () {
    fixHeader();
});

var testiSlider = new Swiper ('.testimonials .swiper-container', {
    loop: true,
    pagination: {
        el: '.testimonials-carousel--pagination',
        clickable: true
    },
    navigation: {
        nextEl: '.testimonials-carousel--control.mod-next',
        prevEl: '.testimonials-carousel--control.mod-prev',
    }
});

var feedbackSlider = new Swiper ('.feedback .swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30,
    navigation: {
        nextEl: '.feedback-carousel--control.mod-next',
        prevEl: '.feedback-carousel--control.mod-prev',
    },
    breakpoints: {
        768: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        1200: {
            slidesPerView: 2,
            spaceBetween: 30
        }
    }
});

//Youtube script
var tag = document.createElement('script');
tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

onYouTubeIframeAPIReady = function () {
    player = new YT.Player('yt-video', {
        videoId: 'ScMzIvxBSi4',
        events: {
            'onStateChange': onPlayerStateChange
        }
    });
}

onPlayerStateChange = function (event) {
    if (event.data == YT.PlayerState.ENDED) {
        $('#play-video').fadeIn('normal');
    }
}

$(document).on('click', '#play-video', function () {
    $(this).fadeOut('normal');
    player.playVideo();
});
