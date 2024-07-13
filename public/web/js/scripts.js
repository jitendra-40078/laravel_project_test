/*  ---------- ON-SCROLL ANIMATION ------------  */
var $animation_elements = $('.animateThis');
var $window = $(window);

function check_if_in_view() {
  var window_height = $window.height();
  var window_top_position = $window.scrollTop();
  var window_bottom_position = (window_top_position + window_height);
 
  $.each($animation_elements, function() {
    var $element = $(this);
    var element_height = $element.outerHeight();
    var element_top_position = $element.offset().top;
    var element_bottom_position = (element_top_position + element_height);
 
    if ((element_top_position <= window_bottom_position))  {
      $element.addClass('in-view');
    } else {
      $element.removeClass('in-view');
    }
  });

}

$window.on('scroll resize', check_if_in_view);
$window.trigger('scroll');


$('.menuListing > li').find('.dropdown').siblings('a').attr('role','button').removeAttr('href');

if($(window).width()<991) {
  
    $('.menuBtn').click(function(){
        $(this).toggleClass('active');
        $('.mobileMenuBox').fadeToggle()
    });

    $('.menuListing > li > a').click(function(){
        $(this).next('.dropdown').slideToggle();
        $(this).parent('li').siblings('li').find('.dropdown').slideUp();
        $(this).toggleClass('active')
        $(this).parent('li').siblings('li').find('a').removeClass('active');
    })

   
}


$(document).on('click', 'a[href^="#"]', function (event) {
  event.preventDefault();

  $('html, body').animate({
      scrollTop: $($.attr(this, 'href')).offset().top-80
  }, 1500);
});