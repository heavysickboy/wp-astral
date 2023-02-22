/*  ---------- ON-SCROLL ANIMATION ------------  */
var $animation_elements = $('.animateThis');
var $window = $(window);

function check_if_in_view() {
  var window_height = $window.height();
  var window_top_position = $window.scrollTop();
  var window_bottom_position = (window_top_position + window_height - 40);
 
  $.each($animation_elements, function() {
    var $element = $(this);
    var element_height = $element.outerHeight();
    var element_top_position = $element.offset().top+100;
    var element_bottom_position = (element_top_position + element_height);
 
    //check to see if this current container is within viewport ----           
    // if ((element_top_position <= window_bottom_position) && (element_bottom_position >= window_top_position))  {

    if ((element_top_position <= window_bottom_position))  {
      $element.addClass('in-view');
    } else {
      $element.removeClass('in-view');
    }
  });
}

$window.on('scroll resize', check_if_in_view);
$window.trigger('scroll');

/*  ---------- ON-SCROLL header ------------  */
function sticky_relocate() {    
  var window_top = $(window).scrollTop();
  var div_top = $('#sticky-anchor').offset().top;
  if (window_top > div_top) {
    $('.bodyWrapper').addClass('stick');
  } else {
    $('.bodyWrapper').removeClass('stick');
  }   
}
$(function () {
  $(window).scroll(sticky_relocate);
  sticky_relocate();
});

/* ---------  Navigation  --------- */

/*  ---------- Menu Btn ------------  */

$('.menuList li').find('.subMenuContainer').siblings('a').attr({href:"javascript:;",role:"button"});

if($(window).width()<991.98) {

	$('.menuBtn').on('click',function(){
		$('.navigHolder').slideToggle().toggleClass('open');
    //$(this).toggleClass('active');
    $('.pageHeader').addClass('open');
	});

	$('.menuList a[role="button"]').on('click', function(e){
		$(this).parents('li').siblings().find('.subMenuContainer').slideUp();
		$(this).next('.subMenuContainer').slideToggle();
		$(this).toggleClass('open');
		$(this).parents('li').siblings().find('a').removeClass('open');
    
	});

  $('.subMenuLinks li a').on('click', function(e){
    $(this).parents('li').siblings().find('.subMenuLinks2').slideUp();
    $(this).next('.subMenuLinks2').slideToggle();
    $(this).toggleClass('open');
    $(this).parents('li').siblings().find('a').removeClass('open');
});
				
}
//Search Script
$(".search_btn").click(function(){
  $(".search_wrp").slideToggle();
  $(".search_btn").toggleClass('cancel');
  
});