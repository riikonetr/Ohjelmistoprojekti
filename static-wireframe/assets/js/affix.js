$(document).ready(function() {

  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the
      //nav bar to stick.
      //console.log($(window).scrollTop())
    if ($(window).scrollTop() > 500) {
      $('#navbar-wrapper').addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 501) {
      $('#navbar-wrapper').removeClass('navbar-fixed');
    }
  });
});
