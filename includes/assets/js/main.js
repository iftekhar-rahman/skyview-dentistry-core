;(function($){
    'use strict';

// Project Slider Style 2
$('.service-slider-wrapper').slick({
  centerMode: false,
  slidesToShow: 5,
  slidesToScroll:1,
  dots: false,
  swipe: true,
  infinite: true,
  swipeToSlide: true,
  adaptiveHeight: true,
  arrows: true,
  centerPadding: 20,

  responsive: [
    {
      breakpoint: 1600,
      settings: {
      slidesToShow: 5,
      slidesToScroll: 1,
      }
    },
    {
      breakpoint: 1400,
      settings: {
      slidesToShow: 5,
      slidesToScroll: 1,
      }
    },
    {
      breakpoint: 1300,
      settings: {
      slidesToShow: 4,
      slidesToScroll: 1,
      }
    },
    {
      breakpoint: 992,
      settings: {
      slidesToShow: 4,
      slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 1
      }
    },
    {
      breakpoint: 574,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 1
      }
    }
    ]
  });
 
   
    

})(jQuery); // End of use strict