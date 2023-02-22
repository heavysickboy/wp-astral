$(document).ready(function(){
  $(".bullet").on("click",function(e){
    e.preventDefault();
       image_id = $(this).data('image');
       $(this).parent().parent().siblings(".prodImg").children('.productPic').hide().removeClass("active");
       $(this).parent().parent().siblings(".prodImg").children(".prod_"+image_id).show().addClass("active");

  });
});

$(document).ready(function(){
  $('.prodImg').mouseover(function(){
    $(this).children(".active").children(":first-child").hide();
    $(this).children(".active").children(":last-child").show();
  });
  $('.prodImg').mouseout(function(){
    $(this).children(".active").children(":last-child").hide();
    $(this).children(".active").children(":first-child").show();

  });
});

var selector = '.prodImageSlider .slick-slide:not(.slick-cloned) a';
    $().fancybox({ selector:selector,backFocus:false,smallBtn:false,buttons:["close"],transitionEffect:"slide" });
    $(selector).on('click', '.slick-cloned', function(e) {
      $(selector)
        .eq( ( $(e.currentTarget).attr("data-slick-index") || 0) % $(selector).length )
        .trigger("click.fb-start", {
          $trigger: $(this)
        });
      return false;
    });
    $('.prodImageSlider').slick({asNavFor:'.prodThumbSlider',slidesToShow:1,slidesToScroll:1,arrows:true,dots:false,infinite:false,responsive:[
          {breakpoint:991.98,settings:{dots:true}}
      ]});
    $('.prodThumbSlider').slick({asNavFor:'.prodImageSlider',slidesToShow:4,slidesToScroll:1,arrows:true,dots:false,vertical:true,verticalSwiping:true,focusOnSelect:true,infinite:true});

// Adding Class    

jQuery(document).ready(function($){
  $( "li.product-category" ).removeClass( "product first last" ).addClass( "col-md-4 col-sm-6 col-12 mb-4" );
 });

/*Form Condition*/

jQuery(document).ready(function($){
 $('#oindia').click(function(){
  $("#domestic").hide();
  $("#international").show();    
});
$('#cindia').click(function(){
 $("#domestic").show();
 $("#international").hide();    
}); 
});

// Loader JS
$(document).ready(function(){
    $("#status").fadeOut();       
    $("#preloader").delay(1000).fadeOut("slow");
});
