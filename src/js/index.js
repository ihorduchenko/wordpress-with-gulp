$(window).on('load', function () {
  $(".loader").fadeOut();
  $("#preloder").delay(400).fadeOut("slow");

  if ($('.portfolios-area').length > 0) {
    var containerEl = document.querySelector('.portfolios-area');
    var mixer = mixitup(containerEl, {
      selectors: {
        control: '[data-mixitup-control]'
      }
    });
  }
});


(function ($) {
  $(function () {
    var scroll = $(document).scrollTop();
    var headerHeight = $('.site-header').outerHeight();
    $(window).scroll(function () {
      var scrolled = $(document).scrollTop();
      if (scrolled > headerHeight) {
        $('.site-header').addClass('off-canvas');
      } else {
        $('.site-header').removeClass('off-canvas');
      }
      if (scrolled > scroll) {
        $('.site-header').removeClass('fixed');
      } else {
        $('.site-header').addClass('fixed');
      }
      scroll = $(document).scrollTop();
    });
  });
})(jQuery);


(function ($) {
  $('.set-bg').each(function () {
    var bg = $(this).data('setbg');
    $(this).css('background-image', 'url(' + bg + ')');
  });

  $('[data-fancybox-group]').fancybox({
    caption : function() {
      return $(this).parents('.portfolio-col').find('.portfolio-col--caption').html();
    }
  });

  $("a[data-color]").hover(
    function () {
      $(this).css({
        'color': $(this).data('color')
      });
    }, function () {
      $(this).css({
        'color': 'inherit'
      })
    }
  );
})(jQuery);

var loadButton = document.getElementById('instafeed-more');
if ( $( "#instafeed" ).length ) {
  var feed = new Instafeed({
    get: 'user',
    userId: 'xxxxxxxxxxxxxxxxxxxx', //insert your userId here
    accessToken: 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', //insert your accessToken here
    clientId: 'xxxxxxxxxxxxxxxxxxxxxxxxx', //insert your clientId here
    limit: instaCount,
    after: function() {
      if (!this.hasNext()) {
        loadButton.classList.add('d-none');
      }
    },
    resolution: 'standard_resolution',
    template: '<article class="insta-col col-6 col-md-4 col-lg-3">' +
    '<a class="insta-col--bg"  href="{{link}}" target="_blank" style="background-image: url({{image}})" >' +
    '<div class="insta-col--overlay w-100 h-100 d-flex flex-column">' +
    '<div class="insta-col--location mb-auto"><i class="icon icon-location mr-2"></i>{{location}}</div>' +
    '<div class="insta-col--info d-none d-xl-block">{{caption}}</div>' +
    '<div class="insta-col--reacts text-right">'+
    '<span class="mr-3"><i class="icon-chatboxes mr-2"></i>{{comments}}</span>'+
    '<span><i class="icon icon-heart mr-2"></i>{{likes}}</span>'+
    '</div>' +
    '</div>' +
    '</a>' +
    '</article>'
  });

  loadButton.addEventListener('click', function() {
    feed.next();
  });

  feed.run();
}